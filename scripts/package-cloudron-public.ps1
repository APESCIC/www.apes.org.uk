[CmdletBinding()]
param(
    [string] $StagePath = (Join-Path "dist" "cloudron-public"),
    [string] $ZipPath = (Join-Path "dist" "cloudron-public.zip")
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

$repoRoot = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
$stageScript = (Resolve-Path (Join-Path $PSScriptRoot "stage-cloudron-public.ps1")).Path
$resolvedStagePath = if ([System.IO.Path]::IsPathRooted($StagePath)) {
    [System.IO.Path]::GetFullPath($StagePath)
} else {
    [System.IO.Path]::GetFullPath((Join-Path $repoRoot $StagePath))
}
$resolvedZipPath = if ([System.IO.Path]::IsPathRooted($ZipPath)) {
    [System.IO.Path]::GetFullPath($ZipPath)
} else {
    [System.IO.Path]::GetFullPath((Join-Path $repoRoot $ZipPath))
}

& $stageScript -OutputPath $resolvedStagePath | Out-Null

if (-not $resolvedZipPath.StartsWith($repoRoot, [System.StringComparison]::OrdinalIgnoreCase)) {
    throw "Refusing to write package outside the repository root: $resolvedZipPath"
}

$zipDirectory = Split-Path -Parent $resolvedZipPath

if (-not (Test-Path -LiteralPath $zipDirectory -PathType Container)) {
    New-Item -ItemType Directory -Path $zipDirectory -Force | Out-Null
}

if (Test-Path -LiteralPath $resolvedZipPath) {
    Remove-Item -LiteralPath $resolvedZipPath -Force
}

$archiveInputs = Get-ChildItem -LiteralPath $resolvedStagePath -Force | Select-Object -ExpandProperty FullName

if (-not $archiveInputs) {
    throw "Nothing was staged for packaging at $resolvedStagePath"
}

Compress-Archive -Path $archiveInputs -DestinationPath $resolvedZipPath -Force

Write-Host "Packaged Cloudron public bundle at $resolvedZipPath"
