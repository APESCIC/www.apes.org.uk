<?php
declare(strict_types=1);

$publicRoot = dirname(__DIR__);

require_once $publicRoot . '/includes/site-data.php';

$site = apes_site_data();

function apes_export_rendered_page(string $publicRoot, string $pageKey, string $requestUri, string $targetPath): void
{
    global $page_key;

    $page_key = $pageKey;
    $_SERVER['REQUEST_URI'] = $requestUri;
    $_SERVER['QUERY_STRING'] = '';
    $_SERVER['DOCUMENT_ROOT'] = $publicRoot;
    $_GET = [];

    ob_start();
    require $publicRoot . '/includes/render-page.php';
    $html = ob_get_clean();

    if ($html === false) {
        throw new RuntimeException('Failed to capture rendered HTML for ' . $requestUri);
    }

    $directory = dirname($targetPath);
    if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
        throw new RuntimeException('Failed to create directory: ' . $directory);
    }

    file_put_contents($targetPath, $html);
}

foreach ($site['pages'] as $pageKey => $page) {
    $route = $page['route'];
    $relative = trim($route, '/');
    $targetPath = $publicRoot . '/' . ($relative === '' ? 'index.html' : $relative . '/index.html');
    apes_export_rendered_page($publicRoot, $pageKey, $route, $targetPath);
}

apes_export_rendered_page($publicRoot, 'missing', '/404/', $publicRoot . '/404.html');

echo 'Exported static HTML snapshots for ' . count($site['pages']) . " routes.\n";
