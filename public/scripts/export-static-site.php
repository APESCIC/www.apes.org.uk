<?php
declare(strict_types=1);

$publicRoot = dirname(__DIR__);

require_once $publicRoot . '/includes/site-data.php';

$site = apes_site_data();

function apes_export_rendered_page(string $publicRoot, string $pageKey, string $requestUri, string $targetPath, ?array $overridePage = null): void
{
    global $page_key;
    global $apes_override_page;

    $page_key = $pageKey;
    $apes_override_page = $overridePage;
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
    $targetPath = $publicRoot . '/' . ($relative === '' ? 'index.html' : (str_contains(basename($relative), '.') ? $relative : $relative . '/index.html'));
    apes_export_rendered_page($publicRoot, $pageKey, $route, $targetPath);
}

foreach (apes_error_pages() as $pageKey => $page) {
    $route = $page['route'];
    $targetPath = $publicRoot . '/' . ltrim($route, '/');
    apes_export_rendered_page($publicRoot, $pageKey, $route, $targetPath, $page);
}

echo 'Exported static HTML snapshots for ' . (count($site['pages']) + count(apes_error_pages())) . " routes.\n";
