[CmdletBinding()]
param(
    [string] $OutputPath = "dist/cloudron-public"
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

$repoRoot = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
$publicRoot = (Resolve-Path (Join-Path $repoRoot "public")).Path
$outputPathResolved = if ([System.IO.Path]::IsPathRooted($OutputPath)) {
    [System.IO.Path]::GetFullPath($OutputPath)
} else {
    [System.IO.Path]::GetFullPath((Join-Path $repoRoot $OutputPath))
}
$distRoot = Split-Path -Parent $outputPathResolved

if (-not $outputPathResolved.StartsWith($repoRoot, [System.StringComparison]::OrdinalIgnoreCase)) {
    throw "Refusing to stage outside the repository root: $outputPathResolved"
}

if (-not (Test-Path -LiteralPath $distRoot -PathType Container)) {
    New-Item -ItemType Directory -Path $distRoot -Force | Out-Null
}

if (Test-Path -LiteralPath $outputPathResolved) {
    Remove-Item -LiteralPath $outputPathResolved -Recurse -Force
}

New-Item -ItemType Directory -Path $outputPathResolved -Force | Out-Null

Get-ChildItem -LiteralPath $publicRoot -Force | ForEach-Object {
    Copy-Item -LiteralPath $_.FullName -Destination (Join-Path $outputPathResolved $_.Name) -Recurse -Force
}

Write-Host "Staged Cloudron public bundle at $outputPathResolved"
