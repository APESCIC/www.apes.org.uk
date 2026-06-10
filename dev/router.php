<?php
declare(strict_types=1);

$publicRoot = realpath(__DIR__ . '/../public');

if ($publicRoot === false) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Unable to resolve the public web root.';

    return true;
}

require_once $publicRoot . '/includes/site-data.php';

function apes_router_error_page(string $publicRoot, int $statusCode, string $fallbackMessage): void
{
    http_response_code($statusCode);

    $errorPagePath = match ($statusCode) {
        403 => $publicRoot . '/403.html',
        404 => $publicRoot . '/404.html',
        default => $publicRoot . '/500.html',
    };

    if (is_file($errorPagePath)) {
        header('Content-Type: text/html; charset=utf-8');
        readfile($errorPagePath);

        return;
    }

    header('Content-Type: text/plain; charset=utf-8');
    echo $fallbackMessage;
}

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$requestPath = apes_path_from_request_uri($requestUri);
$decodedPath = rawurldecode($requestPath);

$forbiddenPrefixes = [
    '/includes',
    '/outputs',
    '/scripts',
];

foreach ($forbiddenPrefixes as $prefix) {
    if ($decodedPath === $prefix || str_starts_with($decodedPath, $prefix . '/')) {
        apes_router_error_page($publicRoot, 403, 'Forbidden');

        return true;
    }
}

if (str_starts_with($decodedPath, '/.')) {
    apes_router_error_page($publicRoot, 403, 'Forbidden');

    return true;
}

$pathHasExtension = pathinfo($decodedPath, PATHINFO_EXTENSION) !== '';

if ($pathHasExtension) {
    $candidate = realpath($publicRoot . '/' . ltrim($decodedPath, '/'));

    if ($candidate !== false && str_starts_with($candidate, $publicRoot) && is_file($candidate)) {
        return false;
    }
}

$newsroomRedirect = apes_newsroom_redirects()[$requestPath] ?? null;

if ($newsroomRedirect !== null) {
    header('Location: ' . $newsroomRedirect, true, 301);

    return true;
}

$_SERVER['DOCUMENT_ROOT'] = $publicRoot;

try {
    require $publicRoot . '/index.php';
} catch (Throwable $throwable) {
    error_log('APES local preview router failure: ' . $throwable->getMessage());
    apes_router_error_page($publicRoot, 500, 'Internal server error');
}

return true;
