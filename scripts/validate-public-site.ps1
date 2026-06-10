[CmdletBinding()]
param(
    [int] $Port = 8080,
    [string] $BindHost = "127.0.0.1"
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

. (Join-Path $PSScriptRoot "ApesPhpTools.ps1")

function Invoke-ApesHttpRequest {
    [CmdletBinding()]
    param(
        [Parameter(Mandatory = $true)]
        [string] $Uri,

        [switch] $NoRedirect
    )

    if ($NoRedirect) {
        $request = [System.Net.WebRequest]::Create($Uri)
        $request.AllowAutoRedirect = $false

        try {
            $response = $request.GetResponse()
        } catch [System.Net.WebException] {
            $response = $_.Exception.Response

            if ($null -eq $response) {
                throw
            }
        }

        $stream = $response.GetResponseStream()
        $reader = New-Object System.IO.StreamReader($stream)

        $statusCode = [int] $response.StatusCode
        $headers = $response.Headers

        try {
            $content = $reader.ReadToEnd()
        } finally {
            $reader.Dispose()
            $stream.Dispose()
            $response.Dispose()
        }

        return [pscustomobject]@{
            StatusCode = $statusCode
            Headers = $headers
            Content = $content
            Uri = $Uri
        }
    }

    try {
        $parameters = @{
            Uri = $Uri
            UseBasicParsing = $true
        }

        $response = Invoke-WebRequest @parameters

        return [pscustomobject]@{
            StatusCode = [int] $response.StatusCode
            Headers = $response.Headers
            Content = [string] $response.Content
            Uri = $Uri
        }
    } catch {
        $response = $_.Exception.Response

        if ($null -eq $response) {
            throw
        }

        $stream = $response.GetResponseStream()
        $reader = New-Object System.IO.StreamReader($stream)

        try {
            $content = $reader.ReadToEnd()
        } finally {
            $reader.Dispose()
            $stream.Dispose()
        }

        return [pscustomobject]@{
            StatusCode = [int] $response.StatusCode
            Headers = $response.Headers
            Content = $content
            Uri = $Uri
        }
    }
}

function Assert-ApesStatus {
    param(
        [Parameter(Mandatory = $true)]
        [pscustomobject] $Response,

        [Parameter(Mandatory = $true)]
        [int] $ExpectedStatusCode,

        [Parameter(Mandatory = $true)]
        [string] $Label
    )

    if ($Response.StatusCode -ne $ExpectedStatusCode) {
        throw "$Label expected HTTP $ExpectedStatusCode but received $($Response.StatusCode)."
    }
}

function Assert-ApesContains {
    param(
        [Parameter(Mandatory = $true)]
        [string] $Content,

        [Parameter(Mandatory = $true)]
        [string] $ExpectedText,

        [Parameter(Mandatory = $true)]
        [string] $Label
    )

    if ($Content -notlike "*$ExpectedText*") {
        throw "$Label did not contain expected text: $ExpectedText"
    }
}

$repoRoot = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
$phpPath = Get-ApesPhpPath
$version = (Get-Content (Join-Path $repoRoot "VERSION") -Raw).Trim()
$routerPath = (Resolve-Path (Join-Path $repoRoot "dev/router.php")).Path
$documentRoot = (Resolve-Path (Join-Path $repoRoot "public")).Path
$exportScript = (Resolve-Path (Join-Path $repoRoot "public/scripts/export-static-site.php")).Path

$phpFiles = @(
    "public/index.php",
    "public/includes/render-page.php",
    "public/includes/footer.php",
    "public/includes/site-data.php",
    "public/scripts/export-static-site.php",
    "dev/router.php"
)

foreach ($relativePath in $phpFiles) {
    $absolutePath = (Resolve-Path (Join-Path $repoRoot $relativePath)).Path
    Write-Host "Linting $relativePath"
    & $phpPath -l $absolutePath | Out-Host

    if ($LASTEXITCODE -ne 0) {
        throw "PHP lint failed for $relativePath"
    }
}

Write-Host "Exporting static HTML snapshots from shared PHP source"
& $phpPath $exportScript | Out-Host

if ($LASTEXITCODE -ne 0) {
    throw "Static HTML export failed."
}

$requiredFiles = @(
    "public/.htaccess",
    "public/index.php",
    "public/robots.txt",
    "public/sitemap.xml",
    "public/site.webmanifest",
    "public/theme/site.css",
    "public/theme/js/site.js",
    "public/403.html",
    "public/404.html",
    "public/500.html",
    "VERSION",
    "public/VERSION"
)

foreach ($relativePath in $requiredFiles) {
    $absolutePath = Join-Path $repoRoot $relativePath

    if (-not (Test-Path -LiteralPath $absolutePath -PathType Leaf)) {
        throw "Required public file is missing: $relativePath"
    }
}

Write-Host "Running volunteer layout regression check"
& powershell -ExecutionPolicy Bypass -File (Join-Path $repoRoot "scripts/test-volunteer-layout-spacing.ps1") | Out-Host

if ($LASTEXITCODE -ne 0) {
    throw "Volunteer layout regression check failed."
}

$errorPageExpectations = @{
    "public/403.html" = "Access denied"
    "public/404.html" = "The page you requested could not be found."
    "public/500.html" = "Something went wrong while loading this page."
}

foreach ($relativePath in $errorPageExpectations.Keys) {
    $content = Get-Content (Join-Path $repoRoot $relativePath) -Raw
    Assert-ApesContains -Content $content -ExpectedText $errorPageExpectations[$relativePath] -Label $relativePath
}

$preview = Start-ApesPhpPreview -PhpPath $phpPath -DocumentRoot $documentRoot -RouterPath $routerPath -BindHost $BindHost -Port $Port -WorkingDirectory $repoRoot

try {
    $baseUri = $preview.BaseUri
    $responses = @{}

    $okRoutes = @(
        "/",
        "/services/",
        "/donate/",
        "/contact/",
        "/search/",
        "/news/",
        "/policies/privacy/",
        "/mission/our-main-mission-statement/",
        "/change-log-hub/",
        "/24-7-services/",
        "/robots.txt",
        "/sitemap.xml",
        "/theme/site.css",
        "/theme/js/site.js"
    )

    foreach ($route in $okRoutes) {
        $response = Invoke-ApesHttpRequest -Uri ($baseUri + $route)
        Assert-ApesStatus -Response $response -ExpectedStatusCode 200 -Label $route
        $responses[$route] = $response
    }

    $indexRedirect = Invoke-ApesHttpRequest -Uri ($baseUri + "/index") -NoRedirect
    Assert-ApesStatus -Response $indexRedirect -ExpectedStatusCode 301 -Label "/index"

    if ($indexRedirect.Headers["Location"] -ne "/") {
        throw "/index redirect target should be '/' but was '$($indexRedirect.Headers["Location"])'."
    }

    $legacyNewsRoute = "/news/post/Urgent-APES-Must-Relocate-by-3-March-2026/"
    $legacyRedirect = Invoke-ApesHttpRequest -Uri ($baseUri + $legacyNewsRoute) -NoRedirect
    Assert-ApesStatus -Response $legacyRedirect -ExpectedStatusCode 301 -Label $legacyNewsRoute

    if ($legacyRedirect.Headers["Location"] -ne "https://www.apesnews.org.uk/tag/apes-cic/") {
        throw "$legacyNewsRoute did not redirect to the expected APES Newsroom URL."
    }

    $missingRoute = Invoke-ApesHttpRequest -Uri ($baseUri + "/definitely-missing-route/")
    Assert-ApesStatus -Response $missingRoute -ExpectedStatusCode 404 -Label "missing route"
    Assert-ApesContains -Content $missingRoute.Content -ExpectedText "The page you requested could not be found." -Label "missing route"

    $forbiddenRoute = Invoke-ApesHttpRequest -Uri ($baseUri + "/includes/site-data.php")
    Assert-ApesStatus -Response $forbiddenRoute -ExpectedStatusCode 403 -Label "forbidden route"
    Assert-ApesContains -Content $forbiddenRoute.Content -ExpectedText "You do not have access to that page." -Label "forbidden route"

    if ($responses["/theme/site.css"].Headers["Content-Type"] -notlike "text/css*") {
        throw "/theme/site.css did not return a CSS content type."
    }

    if ($responses["/theme/js/site.js"].Headers["Content-Type"] -notlike "application/javascript*") {
        throw "/theme/js/site.js did not return a JavaScript content type."
    }

    foreach ($footerRoute in @("/", "/donate/", "/contact/", "/change-log-hub/")) {
        $content = $responses[$footerRoute].Content
        Assert-ApesContains -Content $content -ExpectedText "Privacy Policy" -Label "$footerRoute footer"
        Assert-ApesContains -Content $content -ExpectedText "Terms of Service" -Label "$footerRoute footer"
        Assert-ApesContains -Content $content -ExpectedText "Change Log Hub" -Label "$footerRoute footer"
        Assert-ApesContains -Content $content -ExpectedText "CIC No: 16253848" -Label "$footerRoute footer"
        Assert-ApesContains -Content $content -ExpectedText "APES CIC $version" -Label "$footerRoute version"
    }

    Write-Host "Validation passed:"
    Write-Host "- Linted $($phpFiles.Count) PHP files including dev/router.php"
    Write-Host "- Exported static HTML snapshots from shared PHP source"
    Write-Host "- Checked $($okRoutes.Count) representative HTTP 200 routes and asset endpoints"
    Write-Host "- Confirmed canonical and legacy redirect behavior"
    Write-Host "- Confirmed branded 403 and 404 responses plus branded error-page source files"
    Write-Host "- Confirmed footer-required links, CIC number and website version text on representative rendered pages"
} finally {
    Stop-ApesPreviewProcess -Process $preview.Process
}
