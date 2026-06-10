[CmdletBinding()]
param(
    [int] $Port = 8080,
    [string] $BindHost = "127.0.0.1"
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

& (Join-Path $PSScriptRoot "preview-static-site.ps1") -Port $Port -BindHost $BindHost
exit $LASTEXITCODE
