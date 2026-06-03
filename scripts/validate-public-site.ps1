param(
    [string]$PhpPath = "",
    [int]$Port = 8110
)

$ErrorActionPreference = "Stop"
Add-Type -AssemblyName System.Net.Http

$repoRoot = Split-Path -Parent $PSScriptRoot
$publicRoot = Join-Path $repoRoot "public"

if ([string]::IsNullOrWhiteSpace($PhpPath)) {
    $candidates = @(
        "php",
        "C:\Program Files\Ampps\php82\php.exe"
    )

    foreach ($candidate in $candidates) {
        try {
            if ($candidate -eq "php") {
                $resolved = (Get-Command php -ErrorAction Stop).Source
                $PhpPath = $resolved
                break
            }

            if (Test-Path $candidate) {
                $PhpPath = $candidate
                break
            }
        }
        catch {
        }
    }
}

if ([string]::IsNullOrWhiteSpace($PhpPath)) {
    throw "PHP executable not found. Pass -PhpPath explicitly."
}

$phpFiles = Get-ChildItem -Path $publicRoot -Recurse -Filter *.php -File
$lintResults = @()

foreach ($file in $phpFiles) {
    $output = & $PhpPath -l $file.FullName 2>&1
    $exitCode = $LASTEXITCODE
    $lintResults += [pscustomobject]@{
        file = $file.FullName.Replace($repoRoot + "\", "")
        ok = ($exitCode -eq 0)
        output = ($output -join "`n").Trim()
    }
}

$failedLint = $lintResults | Where-Object { -not $_.ok }
if ($failedLint.Count -gt 0) {
    $failedLint | ConvertTo-Json -Depth 4
    throw "PHP lint failed."
}

$serverPsi = New-Object System.Diagnostics.ProcessStartInfo
$serverPsi.FileName = $PhpPath
$serverPsi.Arguments = "-S 127.0.0.1:$Port -t `"$publicRoot`""
$serverPsi.UseShellExecute = $false
$serverPsi.CreateNoWindow = $true
$serverPsi.RedirectStandardOutput = $true
$serverPsi.RedirectStandardError = $true

$server = New-Object System.Diagnostics.Process
$server.StartInfo = $serverPsi
$null = $server.Start()
Start-Sleep -Seconds 2

if ($server.HasExited) {
    $stderr = $server.StandardError.ReadToEnd()
    throw "PHP development server exited early. $stderr"
}

$routeScript = Join-Path ([System.IO.Path]::GetTempPath()) "apes-public-routes.php"
@"
<?php
require '$($publicRoot.Replace('\', '/'))/includes/site-data.php';
echo json_encode(apes_public_routes(), JSON_UNESCAPED_SLASHES);
"@ | Set-Content -LiteralPath $routeScript -Encoding UTF8

$allRoutesJson = & $PhpPath $routeScript
Remove-Item -LiteralPath $routeScript -Force
$allRoutes = $allRoutesJson | ConvertFrom-Json

$smokeRoutes = @(
    @{ path = "/"; expected = 200 },
    @{ path = "/change-log-hub/"; expected = 200 },
    @{ path = "/policies/privacy/"; expected = 200 },
    @{ path = "/policies/terms-of-service/"; expected = 200 },
    @{ path = "/contact/"; expected = 200 },
    @{ path = "/contact-centre/"; expected = 200 },
    @{ path = "/news/"; expected = 200 },
    @{ path = "/socials/"; expected = 200 },
    @{ path = "/apes-communities/"; expected = 200 },
    @{ path = "/staff/"; expected = 200 },
    @{ path = "/search/?q=donate"; expected = 200 },
    @{ path = "/donate"; expected = 301 }
)

$aliasRoutes = @(
    @{ path = "/index"; expected = 301 }
)

$routeResults = @()
$coverageResults = @()
$handler = New-Object System.Net.Http.HttpClientHandler
$handler.AllowAutoRedirect = $false
$client = New-Object System.Net.Http.HttpClient($handler)
$client.Timeout = [TimeSpan]::FromMinutes(10)
$client.DefaultRequestHeaders.ConnectionClose = $true

try {
    foreach ($route in $smokeRoutes) {
        $response = $client.GetAsync("http://127.0.0.1:$Port$($route.path)").GetAwaiter().GetResult()
        $statusCode = [int]$response.StatusCode

        $routeResults += [pscustomobject]@{
            path = $route.path
            expected = $route.expected
            actual = $statusCode
            ok = ($statusCode -eq $route.expected)
        }
    }

    foreach ($route in $aliasRoutes) {
        $response = $client.GetAsync("http://127.0.0.1:$Port$($route.path)").GetAwaiter().GetResult()
        $statusCode = [int]$response.StatusCode

        $routeResults += [pscustomobject]@{
            path = $route.path
            expected = $route.expected
            actual = $statusCode
            ok = ($statusCode -eq $route.expected)
        }
    }
}
finally {
    if (-not $server.HasExited) {
        $server.Kill()
    }
    $server.WaitForExit()
    $client.Dispose()
}

$failedRoutes = $routeResults | Where-Object { -not $_.ok }
if ($failedRoutes.Count -gt 0) {
    $routeResults | ConvertTo-Json -Depth 4
    throw "Route smoke checks failed."
}

$htaccessPath = Join-Path $publicRoot ".htaccess"
$htaccessText = Get-Content -Raw $htaccessPath
$rewriteChecks = @(
    @{ name = "missions main mission redirect"; pattern = "RewriteRule ^missions/our-main-mission-statement/?$ /mission/our-main-mission-statement/ [R=301,L]" },
    @{ name = "missions rehabilitation redirect"; pattern = "RewriteRule ^missions/support-ethical-rehabilitation/?$ /mission/support-ethical-rehabilitation/ [R=301,L]" },
    @{ name = "changelog redirect"; pattern = "RewriteRule ^changelog/?$ /change-log-hub/ [R=301,L]" },
    @{ name = "change-log redirect"; pattern = "RewriteRule ^change-log/?$ /change-log-hub/ [R=301,L]" }
)

[array]$failedRewriteChecks = $rewriteChecks | Where-Object { -not $htaccessText.Contains($_.pattern) }
if ($failedRewriteChecks.Count -gt 0) {
    $failedRewriteChecks | ConvertTo-Json -Depth 4
    throw ".htaccess rewrite checks failed."
}

[string]$coverageScript = Join-Path ([System.IO.Path]::GetTempPath()) "apes-render-route.php"
@'
<?php
$_SERVER['REQUEST_URI'] = $argv[1];
$_SERVER['QUERY_STRING'] = (string) (parse_url($argv[1], PHP_URL_QUERY) ?? '');
$_GET = [];
parse_str($_SERVER['QUERY_STRING'], $_GET);
ob_start();
require '__PUBLIC_ROOT__/index.php';
$html = ob_get_clean();
$status = http_response_code();
if ($status === false || $status < 100) {
    $status = 200;
}
echo json_encode([
    'path' => $argv[1],
    'status' => $status,
    'hasDonate' => str_contains($html, 'Donate'),
    'hasPrivacy' => str_contains($html, 'Privacy Policy'),
    'hasTerms' => str_contains($html, 'Terms of Service'),
    'hasChangeLog' => str_contains($html, 'Change Log Hub'),
    'hasCic' => str_contains($html, 'CIC No: 16253848'),
    'hasVersion' => str_contains($html, 'v1.0.0b'),
], JSON_UNESCAPED_SLASHES);
'@.Replace('__PUBLIC_ROOT__', $publicRoot.Replace('\', '/')) | Set-Content -LiteralPath $coverageScript -Encoding UTF8

foreach ($route in $allRoutes) {
    $coverageJson = & $PhpPath $coverageScript $route
    $coverage = $coverageJson | ConvertFrom-Json

    $coverageResults += [pscustomobject]@{
        path = $coverage.path
        status = [int]$coverage.status
        ok = ([int]$coverage.status -eq 200)
        hasDonate = [bool]$coverage.hasDonate
        hasPrivacy = [bool]$coverage.hasPrivacy
        hasTerms = [bool]$coverage.hasTerms
        hasChangeLog = [bool]$coverage.hasChangeLog
        hasCic = [bool]$coverage.hasCic
        hasVersion = [bool]$coverage.hasVersion
    }
}

Remove-Item -LiteralPath $coverageScript -Force

[array]$failedCoverage = $coverageResults | Where-Object {
    (-not $_.ok) -or (-not $_.hasDonate) -or (-not $_.hasPrivacy) -or (-not $_.hasTerms) -or (-not $_.hasChangeLog) -or (-not $_.hasCic) -or (-not $_.hasVersion)
}
if ($failedCoverage.Count -gt 0) {
    $failedCoverage | ConvertTo-Json -Depth 4
    throw "Full route coverage or footer checks failed."
}

[pscustomobject]@{
    php = $PhpPath
    linted_files = $lintResults.Count
    routes_checked = $routeResults.Count
    rewrite_checks = $rewriteChecks.Count
    full_routes_checked = $coverageResults.Count
    results = $routeResults
    rewrite_results = $rewriteChecks
    full_route_results = $coverageResults
} | ConvertTo-Json -Depth 4
