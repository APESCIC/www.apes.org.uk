<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/site-data.php';

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$requestPath = apes_path_from_request_uri($requestUri);
$newsroomRedirect = apes_newsroom_redirects()[$requestPath] ?? null;

if ($newsroomRedirect !== null) {
    header('Location: ' . $newsroomRedirect, true, 301);
    exit;
}

$page_key = apes_page_key_from_request($requestUri) ?? 'missing';
$canonicalRoute = apes_canonical_route_for_key($page_key);

if ($canonicalRoute !== null && $requestPath !== $canonicalRoute) {
    $queryString = $_SERVER['QUERY_STRING'] ?? '';
    $target = $canonicalRoute . ($queryString !== '' ? '?' . $queryString : '');
    header('Location: ' . $target, true, 301);
    exit;
}

require_once __DIR__ . '/includes/render-page.php';
