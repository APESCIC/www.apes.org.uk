[CmdletBinding()]
param(
    [int] $Port = 8080,
    [string] $BindHost = "127.0.0.1"
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

. (Join-Path $PSScriptRoot "ApesPhpTools.ps1")

$repoRoot = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
$phpPath = Get-ApesPhpPath
$documentRoot = (Resolve-Path (Join-Path $repoRoot "public")).Path
$routerPath = (Resolve-Path (Join-Path $repoRoot "dev/router.php")).Path

Write-Host "Serving APES PHP source site from $documentRoot"
Write-Host "Open http://$BindHost`:$Port/ in VS Code Simple Browser or your local browser."
Write-Host "Press Ctrl+C in this terminal to stop the preview server."

Push-Location $repoRoot

try {
    & $phpPath -S "$BindHost`:$Port" -t $documentRoot $routerPath
    exit $LASTEXITCODE
} finally {
    Pop-Location
}
