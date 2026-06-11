[CmdletBinding()]
param(
    [int] $Port = 8080,
    [string] $BindHost = "127.0.0.1"
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

. (Join-Path $PSScriptRoot "ApesPhpTools.ps1")

$repoRoot = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
$publicRoot = (Resolve-Path (Join-Path $repoRoot "public")).Path
$routerPath = (Resolve-Path (Join-Path $repoRoot "dev/router.php")).Path
$phpPath = Get-ApesPhpPath

Write-Host "Serving the APES PHP source site from $publicRoot"
Write-Host "Open http://$BindHost`:$Port/ in your browser."
Write-Host "Press Ctrl+C in this terminal to stop the preview server."

Push-Location $repoRoot

try {
    & $phpPath -S "$BindHost`:$Port" -t $publicRoot $routerPath
    exit $LASTEXITCODE
} finally {
    Pop-Location
}
