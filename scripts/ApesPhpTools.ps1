Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

function Get-ApesPhpPath {
    [CmdletBinding()]
    param(
        [string[]] $AdditionalCandidates = @()
    )

    $candidates = [System.Collections.Generic.List[string]]::new()

    if ($env:APES_PHP) {
        $candidates.Add($env:APES_PHP)
    }

    foreach ($commandName in @("php", "php.exe", "php8.exe", "php8.2.exe")) {
        $command = Get-Command $commandName -ErrorAction SilentlyContinue | Select-Object -First 1

        if ($null -ne $command -and $command.Source) {
            $candidates.Add($command.Source)
        }
    }

    foreach ($candidate in $AdditionalCandidates) {
        if ($candidate) {
            $candidates.Add($candidate)
        }
    }

    foreach ($candidate in @(
        "C:\xampp\php\php.exe",
        "C:\xampp\php\windowsXamppPhp\php.exe",
        "C:\php\php.exe",
        "C:\Program Files\PHP\php.exe"
    )) {
        $candidates.Add($candidate)
    }

    foreach ($candidate in $candidates | Select-Object -Unique) {
        if (Test-Path -LiteralPath $candidate -PathType Leaf) {
            return (Resolve-Path -LiteralPath $candidate).Path
        }
    }

    throw "Unable to locate php.exe. Add PHP to PATH, set APES_PHP, or install a supported local PHP runtime."
}

function Wait-ApesHttpEndpoint {
    [CmdletBinding()]
    param(
        [Parameter(Mandatory = $true)]
        [string] $Uri,

        [int] $TimeoutSeconds = 15
    )

    $deadline = (Get-Date).AddSeconds($TimeoutSeconds)

    while ((Get-Date) -lt $deadline) {
        try {
            Invoke-WebRequest -Uri $Uri -UseBasicParsing -TimeoutSec 2 | Out-Null
            return
        } catch {
            Start-Sleep -Milliseconds 250
        }
    }

    throw "Timed out waiting for $Uri"
}

function Start-ApesPhpPreview {
    [CmdletBinding()]
    param(
        [Parameter(Mandatory = $true)]
        [string] $PhpPath,

        [Parameter(Mandatory = $true)]
        [string] $DocumentRoot,

        [Parameter(Mandatory = $true)]
        [string] $RouterPath,

        [string] $BindHost = "127.0.0.1",

        [int] $Port = 8080,

        [string] $WorkingDirectory = (Get-Location).Path
    )

    $stdoutPath = Join-Path ([System.IO.Path]::GetTempPath()) ("apes-php-preview-$Port-stdout.log")
    $stderrPath = Join-Path ([System.IO.Path]::GetTempPath()) ("apes-php-preview-$Port-stderr.log")

    foreach ($logPath in @($stdoutPath, $stderrPath)) {
        if (Test-Path -LiteralPath $logPath) {
            Remove-Item -LiteralPath $logPath -Force
        }
    }

    $arguments = @("-S", "$BindHost`:$Port", "-t", $DocumentRoot, $RouterPath) | ForEach-Object {
        if ($_ -match '[\s"]') {
            '"' + ($_ -replace '"', '\"') + '"'
        } else {
            $_
        }
    }

    $process = Start-Process `
        -FilePath $PhpPath `
        -ArgumentList $arguments `
        -WorkingDirectory $WorkingDirectory `
        -RedirectStandardOutput $stdoutPath `
        -RedirectStandardError $stderrPath `
        -PassThru `
        -WindowStyle Hidden

    Wait-ApesHttpEndpoint -Uri "http://$BindHost`:$Port/"

    return [pscustomobject]@{
        Process = $process
        Host = $BindHost
        Port = $Port
        StdOut = $stdoutPath
        StdErr = $stderrPath
        BaseUri = "http://$BindHost`:$Port"
    }
}

function Stop-ApesPreviewProcess {
    [CmdletBinding()]
    param(
        [Parameter(Mandatory = $true)]
        [System.Diagnostics.Process] $Process
    )

    if (-not $Process.HasExited) {
        Stop-Process -Id $Process.Id -Force
        $Process.WaitForExit()
    }
}
