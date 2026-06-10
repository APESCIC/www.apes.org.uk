[CmdletBinding()]
param()

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

. (Join-Path $PSScriptRoot "ApesPhpTools.ps1")

$repoRoot = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
$phpPath = Get-ApesPhpPath
$exportScript = (Resolve-Path (Join-Path $repoRoot "public/scripts/export-static-site.php")).Path

Push-Location $repoRoot

try {
    & $phpPath $exportScript
    exit $LASTEXITCODE
} finally {
    Pop-Location
}
