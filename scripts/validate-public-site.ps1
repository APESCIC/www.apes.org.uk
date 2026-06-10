[CmdletBinding()]
param(
    [int] $Port = 8080,
    [string] $BindHost = "127.0.0.1"
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

function Wait-ApesHttpEndpoint {
    [CmdletBinding()]
    param(
        [Parameter(Mandatory = $true)]
        [string] $Uri,

        [int] $TimeoutSeconds = 15
    )

    $deadline = (Get-Date).AddSeconds($TimeoutSeconds)

    while ((Get-Date) -lt $deadline) {
        try {
            Invoke-WebRequest -Uri $Uri -UseBasicParsing -TimeoutSec 2 | Out-Null
            return
        } catch {
            Start-Sleep -Milliseconds 250
        }
    }

    throw "Timed out waiting for $Uri"
}

function Get-ApesNodePath {
    [CmdletBinding()]
    param()

    $nodeCommand = Get-Command node -ErrorAction SilentlyContinue | Select-Object -First 1

    if ($null -eq $nodeCommand -or -not $nodeCommand.Source) {
        throw "Unable to locate node.exe for static preview validation."
    }

    return $nodeCommand.Source
}

function Start-ApesStaticPreview {
    [CmdletBinding()]
    param(
        [Parameter(Mandatory = $true)]
        [string] $NodePath,

        [Parameter(Mandatory = $true)]
        [string] $ServerScriptPath,

        [Parameter(Mandatory = $true)]
        [string] $DocumentRoot,

        [string] $BindHost = "127.0.0.1",

        [int] $Port = 8080,

        [string] $WorkingDirectory = (Get-Location).Path
    )

    $stdoutPath = Join-Path ([System.IO.Path]::GetTempPath()) ("apes-static-preview-$Port-stdout.log")
    $stderrPath = Join-Path ([System.IO.Path]::GetTempPath()) ("apes-static-preview-$Port-stderr.log")

    foreach ($logPath in @($stdoutPath, $stderrPath)) {
        if (Test-Path -LiteralPath $logPath) {
            Remove-Item -LiteralPath $logPath -Force
        }
    }

    $arguments = @($ServerScriptPath, $BindHost, $Port.ToString(), $DocumentRoot) | ForEach-Object {
        if ($_ -match '[\s"]') {
            '"' + ($_ -replace '"', '\"') + '"'
        } else {
            $_
        }
    }

    $process = Start-Process `
        -FilePath $NodePath `
        -ArgumentList $arguments `
        -WorkingDirectory $WorkingDirectory `
        -RedirectStandardOutput $stdoutPath `
        -RedirectStandardError $stderrPath `
        -PassThru `
        -WindowStyle Hidden

    Wait-ApesHttpEndpoint -Uri "http://$BindHost`:$Port/"

    return [pscustomobject]@{
        Process = $process
        BaseUri = "http://$BindHost`:$Port"
    }
}

function Stop-ApesPreviewProcess {
    [CmdletBinding()]
    param(
        [Parameter(Mandatory = $true)]
        [System.Diagnostics.Process] $Process
    )

    if (-not $Process.HasExited) {
        Stop-Process -Id $Process.Id -Force
        $Process.WaitForExit()
    }
}

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
        $response = Invoke-WebRequest -Uri $Uri -UseBasicParsing

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
$nodePath = Get-ApesNodePath
$version = (Get-Content (Join-Path $repoRoot "VERSION") -Raw).Trim()
$serverScriptPath = (Resolve-Path (Join-Path $repoRoot "scripts/static-preview-server.js")).Path
$documentRoot = (Resolve-Path (Join-Path $repoRoot "public")).Path
$searchIndexPath = Join-Path $repoRoot "public/assets/data/search-index.json"
$htmlFiles = Get-ChildItem (Join-Path $repoRoot "public") -Recurse -File -Filter "*.html"

$requiredFiles = @(
    "public/.htaccess",
    "public/index.html",
    "public/page.css",
    "public/page.js",
    "public/403.html",
    "public/403.css",
    "public/403.js",
    "public/404.html",
    "public/404.css",
    "public/404.js",
    "public/500.html",
    "public/500.css",
    "public/500.js",
    "public/assets/data/search-index.json",
    "public/robots.txt",
    "public/sitemap.xml",
    "public/site.webmanifest",
    "VERSION",
    "public/VERSION"
)

foreach ($relativePath in $requiredFiles) {
    $absolutePath = Join-Path $repoRoot $relativePath

    if (-not (Test-Path -LiteralPath $absolutePath -PathType Leaf)) {
        throw "Required file is missing: $relativePath"
    }
}

if (-not (Test-Path -LiteralPath $searchIndexPath -PathType Leaf)) {
    throw "Static search index is missing."
}

$searchIndex = Get-Content -LiteralPath $searchIndexPath -Raw | ConvertFrom-Json

if ($searchIndex.Count -lt 30) {
    throw "Search index looks incomplete. Expected at least 30 entries but found $($searchIndex.Count)."
}

foreach ($htmlFile in $htmlFiles) {
    $content = Get-Content -LiteralPath $htmlFile.FullName -Raw

    if ($content -match 'href="[^"]*theme/site\.css"' -or $content -match 'src="[^"]*theme/js/site\.js"') {
        throw "$($htmlFile.FullName) still contains live references to the removed shared theme assets."
    }

    if ($content -match 'href="[^"]*assets/css/site\.css"' -or $content -match 'src="[^"]*assets/js/site\.js"') {
        throw "$($htmlFile.FullName) still contains live references to the compatibility shims."
    }

    if ($content -match 'href="[^"]*includes/' -or $content -match 'src="[^"]*includes/' -or $content -match 'href="[^"]*index\.php"' -or $content -match 'src="[^"]*index\.php"') {
        throw "$($htmlFile.FullName) still contains live references to removed PHP source-of-truth routes."
    }

    $directory = Split-Path -Parent $htmlFile.FullName
    $fileName = Split-Path -Leaf $htmlFile.FullName
    $expectedCss = if ($fileName -ieq "index.html") { "page.css" } else { ([System.IO.Path]::GetFileNameWithoutExtension($fileName) + ".css") }
    $expectedJs = if ($fileName -ieq "index.html") { "page.js" } else { ([System.IO.Path]::GetFileNameWithoutExtension($fileName) + ".js") }

    if (-not (Test-Path -LiteralPath (Join-Path $directory $expectedCss) -PathType Leaf)) {
        throw "$($htmlFile.FullName) is missing its page-owned stylesheet $expectedCss."
    }

    if (-not (Test-Path -LiteralPath (Join-Path $directory $expectedJs) -PathType Leaf)) {
        throw "$($htmlFile.FullName) is missing its page-owned script $expectedJs."
    }
}

$preview = Start-ApesStaticPreview -NodePath $nodePath -ServerScriptPath $serverScriptPath -DocumentRoot $documentRoot -BindHost $BindHost -Port $Port -WorkingDirectory $repoRoot

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
        "/page.css",
        "/page.js",
        "/assets/data/search-index.json"
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

    if ($responses["/page.css"].Headers["Content-Type"] -notlike "text/css*") {
        throw "/page.css did not return a CSS content type."
    }

    if ($responses["/page.js"].Headers["Content-Type"] -notlike "application/javascript*") {
        throw "/page.js did not return a JavaScript content type."
    }

    if ($responses["/assets/data/search-index.json"].Headers["Content-Type"] -notlike "application/json*") {
        throw "/assets/data/search-index.json did not return a JSON content type."
    }

    foreach ($footerRoute in @("/", "/donate/", "/contact/", "/change-log-hub/")) {
        $content = $responses[$footerRoute].Content
        Assert-ApesContains -Content $content -ExpectedText "Privacy Policy" -Label "$footerRoute footer"
        Assert-ApesContains -Content $content -ExpectedText "Terms of Service" -Label "$footerRoute footer"
        Assert-ApesContains -Content $content -ExpectedText "Change Log Hub" -Label "$footerRoute footer"
        Assert-ApesContains -Content $content -ExpectedText "CIC No: 16253848" -Label "$footerRoute footer"
        Assert-ApesContains -Content $content -ExpectedText "APES CIC $version" -Label "$footerRoute version"
    }

    Assert-ApesContains -Content $responses["/search/"].Content -ExpectedText "data-static-search-results" -Label "/search/"

    Write-Host "Validation passed:"
    Write-Host "- Confirmed static required files, page-owned CSS/JS assets, and generated search index"
    Write-Host "- Checked representative HTTP routes, redirects, branded error responses, and static asset endpoints"
    Write-Host "- Confirmed representative footer-required links, CIC number, and website version text"
} finally {
    Stop-ApesPreviewProcess -Process $preview.Process
}
