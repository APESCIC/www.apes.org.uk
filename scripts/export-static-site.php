<?php
declare(strict_types=1);

$repoRoot = dirname(__DIR__);
$publicRoot = $repoRoot . '/public';
$outputRootArgument = $argv[1] ?? ($repoRoot . '/dist/static-export');
$outputRoot = str_replace('\\', '/', $outputRootArgument);

require_once $publicRoot . '/includes/site-data.php';

$site = apes_site_data();

function apes_export_delete_directory(string $path): void
{
    if (!is_dir($path)) {
        return;
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($iterator as $item) {
        if ($item->isDir()) {
            rmdir($item->getPathname());
        } else {
            unlink($item->getPathname());
        }
    }

    rmdir($path);
}

function apes_export_copy_path(string $sourcePath, string $destinationPath): void
{
    if (is_dir($sourcePath)) {
        if (!is_dir($destinationPath) && !mkdir($destinationPath, 0777, true) && !is_dir($destinationPath)) {
            throw new RuntimeException('Failed to create directory: ' . $destinationPath);
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($sourcePath, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $item) {
            $target = $destinationPath . '/' . $iterator->getSubPathName();

            if ($item->isDir()) {
                if (!is_dir($target) && !mkdir($target, 0777, true) && !is_dir($target)) {
                    throw new RuntimeException('Failed to create directory: ' . $target);
                }
            } else {
                $targetDirectory = dirname($target);

                if (!is_dir($targetDirectory) && !mkdir($targetDirectory, 0777, true) && !is_dir($targetDirectory)) {
                    throw new RuntimeException('Failed to create directory: ' . $targetDirectory);
                }

                copy($item->getPathname(), $target);
            }
        }

        return;
    }

    $targetDirectory = dirname($destinationPath);

    if (!is_dir($targetDirectory) && !mkdir($targetDirectory, 0777, true) && !is_dir($targetDirectory)) {
        throw new RuntimeException('Failed to create directory: ' . $targetDirectory);
    }

    copy($sourcePath, $destinationPath);
}

function apes_export_prepare_output_root(string $publicRoot, string $outputRoot): void
{
    apes_export_delete_directory($outputRoot);

    if (!is_dir($outputRoot) && !mkdir($outputRoot, 0777, true) && !is_dir($outputRoot)) {
        throw new RuntimeException('Failed to create output root: ' . $outputRoot);
    }

    foreach ([
        '.htaccess',
        'robots.txt',
        'sitemap.xml',
        'site.webmanifest',
        'CHANGELOG.md',
        'VERSION',
        'assets',
        'theme',
    ] as $relativePath) {
        $sourcePath = $publicRoot . '/' . $relativePath;

        if (file_exists($sourcePath)) {
            apes_export_copy_path($sourcePath, $outputRoot . '/' . $relativePath);
        }
    }
}

function apes_export_relative_prefix(string $outputRoot, string $targetPath): string
{
    $outputRoot = str_replace('\\', '/', realpath($outputRoot) ?: $outputRoot);
    $targetDirectory = str_replace('\\', '/', dirname($targetPath));
    $relativeDirectory = trim(str_replace($outputRoot, '', $targetDirectory), '/');

    if ($relativeDirectory === '') {
        return '';
    }

    return str_repeat('../', count(array_filter(explode('/', $relativeDirectory), 'strlen')));
}

function apes_export_file_url(string $url, string $relativePrefix): string
{
    if ($url === '' || $url[0] !== '/' || str_starts_with($url, '//')) {
        return $url;
    }

    $parts = parse_url($url);

    if ($parts === false) {
        return $url;
    }

    $path = $parts['path'] ?? '';

    if ($path === '') {
        return $url;
    }

    $relativePath = ltrim($path, '/');

    if ($relativePath === '') {
        $relativePath = 'index.html';
    } elseif (!str_contains(basename($relativePath), '.')) {
        $relativePath = rtrim($relativePath, '/') . '/index.html';
    }

    $fileUrl = $relativePrefix . $relativePath;

    if (isset($parts['query']) && $parts['query'] !== '') {
        $fileUrl .= '?' . $parts['query'];
    }

    if (isset($parts['fragment']) && $parts['fragment'] !== '') {
        $fileUrl .= '#' . $parts['fragment'];
    }

    return $fileUrl;
}

function apes_export_rewrite_srcset(string $srcset, string $relativePrefix): string
{
    $candidates = array_map('trim', explode(',', $srcset));
    $rewritten = [];

    foreach ($candidates as $candidate) {
        if ($candidate === '') {
            continue;
        }

        $parts = preg_split('/\s+/', $candidate, 2);
        $url = $parts[0] ?? '';
        $descriptor = $parts[1] ?? '';
        $rewritten[] = trim(apes_export_file_url($url, $relativePrefix) . ' ' . $descriptor);
    }

    return implode(', ', $rewritten);
}

function apes_export_rewrite_route_alternatives(string $value, string $relativePrefix): string
{
    $decoded = html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $alternatives = json_decode($decoded, true);

    if (!is_array($alternatives)) {
        return $value;
    }

    foreach ($alternatives as &$alternative) {
        if (is_array($alternative) && isset($alternative['href']) && empty($alternative['external'])) {
            $alternative['href'] = apes_export_file_url((string) $alternative['href'], $relativePrefix);
        }
    }
    unset($alternative);

    $json = json_encode($alternatives, JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES);

    if ($json === false) {
        return $value;
    }

    return htmlspecialchars($json, ENT_QUOTES, 'UTF-8');
}

function apes_export_rewrite_static_html(string $html, string $outputRoot, string $targetPath): string
{
    $relativePrefix = apes_export_relative_prefix($outputRoot, $targetPath);
    $urlAttributes = [
        'href',
        'src',
        'poster',
        'action',
        'data-route-primary-href',
        'data-route-secondary-href',
    ];

    foreach ($urlAttributes as $attribute) {
        $html = preg_replace_callback(
            '/\b' . preg_quote($attribute, '/') . '=(["\'])(\/(?!\/)[^"\']*)\1/i',
            static function (array $matches) use ($attribute, $relativePrefix): string {
                return $attribute . '=' . $matches[1] . htmlspecialchars(apes_export_file_url($matches[2], $relativePrefix), ENT_QUOTES, 'UTF-8') . $matches[1];
            },
            $html
        ) ?? $html;
    }

    $html = preg_replace_callback(
        '/\bsrcset=(["\'])(\/(?!\/)[^"\']*)\1/i',
        static function (array $matches) use ($relativePrefix): string {
            return 'srcset=' . $matches[1] . htmlspecialchars(apes_export_rewrite_srcset($matches[2], $relativePrefix), ENT_QUOTES, 'UTF-8') . $matches[1];
        },
        $html
    ) ?? $html;

    return preg_replace_callback(
        '/\bdata-route-alternatives=(["\'])(.*?)\1/is',
        static function (array $matches) use ($relativePrefix): string {
            return 'data-route-alternatives=' . $matches[1] . apes_export_rewrite_route_alternatives($matches[2], $relativePrefix) . $matches[1];
        },
        $html
    ) ?? $html;
}

function apes_export_rendered_page(string $publicRoot, string $outputRoot, string $pageKey, string $requestUri, string $targetPath, ?array $overridePage = null): void
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

    $html = apes_export_rewrite_static_html($html, $outputRoot, $targetPath);

    $directory = dirname($targetPath);
    if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
        throw new RuntimeException('Failed to create directory: ' . $directory);
    }

    file_put_contents($targetPath, $html);
}

apes_export_prepare_output_root($publicRoot, $outputRoot);

foreach ($site['pages'] as $pageKey => $page) {
    $route = $page['route'];
    $relative = trim($route, '/');
    $targetPath = $outputRoot . '/' . ($relative === '' ? 'index.html' : (str_contains(basename($relative), '.') ? $relative : $relative . '/index.html'));
    apes_export_rendered_page($publicRoot, $outputRoot, $pageKey, $route, $targetPath);
}

foreach (apes_error_pages() as $pageKey => $page) {
    $route = $page['route'];
    $targetPath = $outputRoot . '/' . ltrim($route, '/');
    apes_export_rendered_page($publicRoot, $outputRoot, $pageKey, $route, $targetPath, $page);
}

echo 'Exported static HTML snapshots for ' . (count($site['pages']) + count(apes_error_pages())) . ' routes to ' . $outputRoot . ".\n";
