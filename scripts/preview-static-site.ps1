[CmdletBinding()]
param(
    [int] $Port = 8080,
    [string] $BindHost = "127.0.0.1"
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

$repoRoot = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
$documentRoot = (Resolve-Path (Join-Path $repoRoot "public")).Path
$serverScript = (Resolve-Path (Join-Path $repoRoot "scripts/static-preview-server.js")).Path
$nodeCommand = Get-Command node -ErrorAction SilentlyContinue | Select-Object -First 1

if ($null -eq $nodeCommand -or -not $nodeCommand.Source) {
    throw "Unable to locate node.exe for static preview."
}

Write-Host "Serving the APES static site from $documentRoot"
Write-Host "Open http://$BindHost`:$Port/ in your browser."
Write-Host "Press Ctrl+C in this terminal to stop the preview server."

Push-Location $repoRoot

try {
    & $nodeCommand.Source $serverScript $BindHost $Port $documentRoot
    exit $LASTEXITCODE
} finally {
    Pop-Location
}
