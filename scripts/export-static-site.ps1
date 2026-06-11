[CmdletBinding()]
param(
    [string] $OutputPath = (Join-Path "dist" "static-export")
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

. (Join-Path $PSScriptRoot "ApesPhpTools.ps1")

$repoRoot = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
$phpPath = Get-ApesPhpPath
$exportScriptPath = (Resolve-Path (Join-Path $PSScriptRoot "export-static-site.php")).Path
$resolvedOutputPath = if ([System.IO.Path]::IsPathRooted($OutputPath)) {
    [System.IO.Path]::GetFullPath($OutputPath)
} else {
    [System.IO.Path]::GetFullPath((Join-Path $repoRoot $OutputPath))
}

Push-Location $repoRoot

try {
    & $phpPath $exportScriptPath $resolvedOutputPath
    exit $LASTEXITCODE
} finally {
    Pop-Location
}
