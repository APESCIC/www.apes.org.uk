param(
    [string]$OutputZip = "",
    [string]$StagingRoot = ""
)

$repoRoot = Split-Path -Parent $PSScriptRoot
$stageScript = Join-Path $PSScriptRoot "stage-cloudron-public.ps1"

if ([string]::IsNullOrWhiteSpace($StagingRoot)) {
    $StagingRoot = Join-Path $repoRoot "dist\cloudron-public"
}

if ([string]::IsNullOrWhiteSpace($OutputZip)) {
    $OutputZip = Join-Path $repoRoot "dist\cloudron-public.zip"
}

& $stageScript -OutputRoot $StagingRoot

$zipDirectory = Split-Path -Parent $OutputZip
if (-not (Test-Path $zipDirectory)) {
    New-Item -ItemType Directory -Path $zipDirectory | Out-Null
}

if (Test-Path $OutputZip) {
    Remove-Item -LiteralPath $OutputZip -Force
}

Compress-Archive -Path (Join-Path $StagingRoot '*') -DestinationPath $OutputZip -Force

Write-Host "Cloudron public bundle packaged at $OutputZip"
