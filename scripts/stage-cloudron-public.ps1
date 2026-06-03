param(
    [string]$OutputRoot = ""
)

$repoRoot = Split-Path -Parent $PSScriptRoot
$publicRoot = Join-Path $repoRoot "public"

if ([string]::IsNullOrWhiteSpace($OutputRoot)) {
    $OutputRoot = Join-Path $repoRoot "dist\cloudron-public"
}

if (Test-Path $OutputRoot) {
    Remove-Item -LiteralPath $OutputRoot -Recurse -Force
}

New-Item -ItemType Directory -Path $OutputRoot | Out-Null

$excludePatterns = @(
    "outputs",
    "php-server.stdout.log",
    "php-server.stderr.log"
)

Get-ChildItem -LiteralPath $publicRoot -Force | ForEach-Object {
    if ($excludePatterns -contains $_.Name) {
        return
    }

    $destination = Join-Path $OutputRoot $_.Name

    if ($_.PSIsContainer) {
        Copy-Item -LiteralPath $_.FullName -Destination $destination -Recurse -Force
    }
    else {
        Copy-Item -LiteralPath $_.FullName -Destination $destination -Force
    }
}

Write-Host "Cloudron public bundle staged at $OutputRoot"
