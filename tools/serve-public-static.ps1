param(
    [int] $Port = 8080,
    [string] $Root = (Join-Path $PSScriptRoot "..\public")
)

$ErrorActionPreference = "Stop"

$resolvedRoot = (Resolve-Path -LiteralPath $Root).Path
$rootPrefix = $resolvedRoot.TrimEnd("\", "/") + [System.IO.Path]::DirectorySeparatorChar
$headerEncoding = [System.Text.Encoding]::ASCII

$contentTypes = @{
    ".css" = "text/css; charset=utf-8"
    ".gif" = "image/gif"
    ".html" = "text/html; charset=utf-8"
    ".ico" = "image/x-icon"
    ".jpg" = "image/jpeg"
    ".jpeg" = "image/jpeg"
    ".js" = "application/javascript; charset=utf-8"
    ".json" = "application/json; charset=utf-8"
    ".png" = "image/png"
    ".svg" = "image/svg+xml; charset=utf-8"
    ".txt" = "text/plain; charset=utf-8"
    ".webmanifest" = "application/manifest+json; charset=utf-8"
    ".webp" = "image/webp"
    ".woff2" = "font/woff2"
    ".xml" = "application/xml; charset=utf-8"
}

function Get-ContentType {
    param([string] $Path)

    $extension = [System.IO.Path]::GetExtension($Path).ToLowerInvariant()

    if ($contentTypes.ContainsKey($extension)) {
        return $contentTypes[$extension]
    }

    return "application/octet-stream"
}

function Resolve-PublicPath {
    param([string] $RequestPath)

    $decodedPath = [System.Uri]::UnescapeDataString($RequestPath)
    $relativePath = $decodedPath.TrimStart("/") -replace "/", [System.IO.Path]::DirectorySeparatorChar
    $isDirectoryRequest = $decodedPath.EndsWith("/")

    if ([string]::IsNullOrWhiteSpace($relativePath)) {
        $relativePath = "index.html"
        $isDirectoryRequest = $false
    }

    $candidatePath = Join-Path $resolvedRoot $relativePath

    if ($isDirectoryRequest -or (Test-Path -LiteralPath $candidatePath -PathType Container)) {
        $candidatePath = Join-Path $candidatePath "index.html"
    }

    return [System.IO.Path]::GetFullPath($candidatePath)
}

function Write-HttpResponse {
    param(
        [System.IO.Stream] $Stream,
        [int] $StatusCode,
        [string] $Reason,
        [string] $ContentType,
        [byte[]] $Body,
        [bool] $IncludeBody = $true
    )

    $headers = @(
        "HTTP/1.1 $StatusCode $Reason",
        "Content-Type: $ContentType",
        "Content-Length: $($Body.Length)",
        "Cache-Control: no-store",
        "Connection: close",
        "",
        ""
    ) -join "`r`n"

    $headerBytes = $headerEncoding.GetBytes($headers)
    $Stream.Write($headerBytes, 0, $headerBytes.Length)

    if ($IncludeBody -and $Body.Length -gt 0) {
        $Stream.Write($Body, 0, $Body.Length)
    }
}

function Send-File {
    param(
        [System.IO.Stream] $Stream,
        [string] $Path,
        [int] $StatusCode = 200,
        [string] $Reason = "OK",
        [bool] $IncludeBody = $true
    )

    $bytes = [System.IO.File]::ReadAllBytes($Path)
    Write-HttpResponse -Stream $Stream -StatusCode $StatusCode -Reason $Reason -ContentType (Get-ContentType -Path $Path) -Body $bytes -IncludeBody $IncludeBody
}

function Send-Text {
    param(
        [System.IO.Stream] $Stream,
        [int] $StatusCode,
        [string] $Reason,
        [string] $Message,
        [bool] $IncludeBody = $true
    )

    $bytes = [System.Text.Encoding]::UTF8.GetBytes($Message)
    Write-HttpResponse -Stream $Stream -StatusCode $StatusCode -Reason $Reason -ContentType "text/plain; charset=utf-8" -Body $bytes -IncludeBody $IncludeBody
}

$listener = [System.Net.Sockets.TcpListener]::new([System.Net.IPAddress]::Loopback, $Port)

try {
    $listener.Start()
    Write-Host "Serving APES public site from $resolvedRoot"
    Write-Host "Open http://localhost:$Port/ in VS Code Simple Browser or your local browser."
    Write-Host "Press Ctrl+C in this terminal to stop the preview server."

    while ($true) {
        $client = $listener.AcceptTcpClient()
        $stream = $null
        $reader = $null

        try {
            $stream = $client.GetStream()
            $reader = [System.IO.StreamReader]::new($stream, $headerEncoding, $false, 1024, $true)
            $requestLine = $reader.ReadLine()

            while ($true) {
                $headerLine = $reader.ReadLine()

                if ($null -eq $headerLine -or $headerLine -eq "") {
                    break
                }
            }

            if ([string]::IsNullOrWhiteSpace($requestLine)) {
                continue
            }

            $requestParts = $requestLine.Split(" ")

            if ($requestParts.Count -lt 2) {
                Send-Text -Stream $stream -StatusCode 400 -Reason "Bad Request" -Message "Bad request"
                continue
            }

            $method = $requestParts[0].ToUpperInvariant()
            $requestTarget = $requestParts[1]
            $requestPath = $requestTarget.Split("?")[0]
            $includeBody = $method -ne "HEAD"

            if ($method -notin @("GET", "HEAD")) {
                Send-Text -Stream $stream -StatusCode 405 -Reason "Method Not Allowed" -Message "Method not allowed" -IncludeBody $includeBody
                continue
            }

            $fullPath = Resolve-PublicPath -RequestPath $requestPath

            if (!$fullPath.StartsWith($rootPrefix, [System.StringComparison]::OrdinalIgnoreCase)) {
                $fallback403 = Join-Path $resolvedRoot "403.html"

                if (Test-Path -LiteralPath $fallback403 -PathType Leaf) {
                    Send-File -Stream $stream -Path $fallback403 -StatusCode 403 -Reason "Forbidden" -IncludeBody $includeBody
                } else {
                    Send-Text -Stream $stream -StatusCode 403 -Reason "Forbidden" -Message "Forbidden" -IncludeBody $includeBody
                }
            } elseif (Test-Path -LiteralPath $fullPath -PathType Leaf) {
                Send-File -Stream $stream -Path $fullPath -IncludeBody $includeBody
            } else {
                $fallback404 = Join-Path $resolvedRoot "404.html"

                if (Test-Path -LiteralPath $fallback404 -PathType Leaf) {
                    Send-File -Stream $stream -Path $fallback404 -StatusCode 404 -Reason "Not Found" -IncludeBody $includeBody
                } else {
                    Send-Text -Stream $stream -StatusCode 404 -Reason "Not Found" -Message "Not found" -IncludeBody $includeBody
                }
            }
        } catch {
            if ($stream) {
                $fallback500 = Join-Path $resolvedRoot "500.html"

                if (Test-Path -LiteralPath $fallback500 -PathType Leaf) {
                    Send-File -Stream $stream -Path $fallback500 -StatusCode 500 -Reason "Internal Server Error"
                } else {
                    Send-Text -Stream $stream -StatusCode 500 -Reason "Internal Server Error" -Message "Internal server error"
                }
            }
        } finally {
            if ($reader) {
                $reader.Dispose()
            }

            if ($stream) {
                $stream.Dispose()
            }

            $client.Close()
        }
    }
} finally {
    $listener.Stop()
}
