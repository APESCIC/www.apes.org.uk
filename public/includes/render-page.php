<?php
declare(strict_types=1);

require_once __DIR__ . '/site-data.php';

if (!function_exists('apes_current_page')) {
    function apes_current_page(): array
    {
        global $page_key;

        $site = apes_site_data();
        $page = $site['pages'][$page_key] ?? null;

        if ($page === null) {
            http_response_code(404);
            $page = [
                'route' => '/404/',
                'meta_title' => 'Page not found | APES CIC',
                'title' => 'Page not found',
                'description' => 'The page you tried to reach could not be found.',
                'hero_kicker' => '404',
                'hero_title' => 'The page you requested could not be found.',
                'hero_summary' => 'Please use the main navigation, site search or contact route to continue.',
                'hero_actions' => [
                    ['label' => 'Go to homepage', 'href' => '/', 'variant' => 'primary'],
                    ['label' => 'Search the site', 'href' => '/search/', 'variant' => 'secondary'],
                ],
                'pills' => ['Not found'],
                'body_html' => '<section class="section-shell"><p>The requested page may have moved as part of the rebuild. Legacy routes are being preserved or redirected intentionally where possible.</p></section>',
                'related_links' => [
                    ['label' => 'Homepage', 'href' => '/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ];
        }

        return [$site, $page];
    }

    function apes_asset(string $path): string
    {
        return '/assets/' . ltrim($path, '/');
    }

    function apes_page_url(array $page): string
    {
        return rtrim(APES_PRIMARY_DOMAIN, '/') . $page['route'];
    }

    function apes_render_link(array $link, string $class = 'text-link'): string
    {
        $href = htmlspecialchars($link['href'], ENT_QUOTES);
        $label = htmlspecialchars($link['label'], ENT_QUOTES);
        $attributes = [];

        if (!empty($link['external'])) {
            $attributes[] = 'target="_blank"';
            $relParts = ['noopener', 'noreferrer'];

            if (!empty($link['nofollow'])) {
                $relParts[] = 'nofollow';
            }

            $attributes[] = 'rel="' . implode(' ', array_unique($relParts)) . '"';
        }

        if (!empty($link['target']) && empty($link['external'])) {
            $attributes[] = 'target="' . htmlspecialchars((string) $link['target'], ENT_QUOTES) . '"';
        }

        if (!empty($link['rel'])) {
            $attributes[] = 'rel="' . htmlspecialchars((string) $link['rel'], ENT_QUOTES) . '"';
        }

        return '<a class="' . $class . '" href="' . $href . '"' . (empty($attributes) ? '' : ' ' . implode(' ', $attributes)) . '>' . $label . '</a>';
    }

    function apes_render_breadcrumb_item(array $crumb): string
    {
        $label = htmlspecialchars((string) ($crumb['label'] ?? ''), ENT_QUOTES);

        if (!empty($crumb['current'])) {
            return '<span aria-current="page">' . $label . '</span>';
        }

        if (!empty($crumb['href'])) {
            $href = htmlspecialchars((string) $crumb['href'], ENT_QUOTES);

            return '<a href="' . $href . '">' . $label . '</a>';
        }

        return '<span>' . $label . '</span>';
    }

    function apes_search_results(array $pages): array
    {
        $query = trim((string) ($_GET['q'] ?? ''));

        if ($query === '') {
            return [$query, []];
        }

        $needle = mb_strtolower($query);
        $results = [];

        foreach ($pages as $key => $page) {
            $haystack = mb_strtolower(
                $page['title'] . ' ' .
                $page['description'] . ' ' .
                $page['route'] . ' ' .
                strip_tags($page['body_html'])
            );

            if (str_contains($haystack, $needle)) {
                $results[$key] = $page;
            }
        }

        return [$query, $results];
    }

    function apes_primary_nav_group(string $pageKey): string
    {
        return match ($pageKey) {
            'about-us', 'news', 'change-log-hub', 'search' => 'information',
            'sponsors', 'volunteer', 'donate', 'enterprise-mailing-list', 'help-us-move' => 'support',
            'contact' => 'contact',
            'home' => 'home',
            default => 'services',
        };
    }

    function apes_social_icon_markup(string $icon): string
    {
        return match ($icon) {
            'apes-social' => <<<'SVG'
<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
  <circle cx="12" cy="12" r="3.2" fill="currentColor" />
  <circle cx="5.5" cy="8" r="1.7" fill="currentColor" opacity="0.85" />
  <circle cx="18.2" cy="7.4" r="1.7" fill="currentColor" opacity="0.85" />
  <circle cx="17.5" cy="17" r="1.7" fill="currentColor" opacity="0.85" />
  <path d="M7 8.8 10.1 10.7M14.4 10.4 16.8 8.5M14.1 14.8 16.1 15.9M8.8 13.8 6.8 10.1" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" />
</svg>
SVG,
            'discord' => <<<'SVG'
<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
  <path d="M7.6 6.2c1.3-.9 2.7-1.3 4.4-1.4.2 0 .4.1.6.2.2.1.4.2.6.2 1.7.1 3.1.5 4.4 1.4 1.1 1.8 1.7 3.9 1.8 6.2-.8 1.6-1.8 2.8-3 3.8l-.4-.7c.8-.4 1.4-.9 1.9-1.5-.5.2-1 .4-1.6.6-.5.2-1 .3-1.5.4-.9.2-1.9.2-2.8.2s-1.9-.1-2.8-.2c-.5-.1-1-.2-1.5-.4-.6-.2-1.1-.4-1.6-.6.5.6 1.1 1.1 1.9 1.5l-.4.7c-1.2-1-2.2-2.2-3-3.8.1-2.3.7-4.4 1.8-6.2Zm2 4.2c-.6 0-1 .5-1 1.1s.5 1.1 1 1.1 1-.5 1-1.1-.4-1.1-1-1.1Zm4.8 0c-.6 0-1 .5-1 1.1s.5 1.1 1 1.1 1-.5 1-1.1-.4-1.1-1-1.1Z" fill="currentColor" />
</svg>
SVG,
            'youtube' => <<<'SVG'
<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
  <path d="M21.4 7.4c.3 1 .6 2.4.6 4.6s-.2 3.6-.6 4.6c-.2.6-.7 1-1.3 1.2-.9.3-4.5.5-8.1.5s-7.2-.2-8.1-.5c-.6-.2-1.1-.6-1.3-1.2-.3-1-.6-2.4-.6-4.6s.2-3.6.6-4.6c.2-.6.7-1 1.3-1.2.9-.3 4.5-.5 8.1-.5s7.2.2 8.1.5c.6.2 1.1.6 1.3 1.2ZM14.7 12l-4.8-2.8v5.6Z" fill="currentColor" />
</svg>
SVG,
            default => '',
        };
    }
}

[$site, $page] = apes_current_page();
$canonical_url = apes_page_url($page);
$is_search_page = ($page_key ?? '') === 'search';
[$search_query, $search_results] = $is_search_page ? apes_search_results($site['pages']) : ['', []];
$active_nav_group = apes_primary_nav_group((string) ($page_key ?? ''));
$absolute_og_image = rtrim(APES_PRIMARY_DOMAIN, '/') . $site['brand']['og_image'];
$absolute_twitter_image = rtrim(APES_PRIMARY_DOMAIN, '/') . $site['brand']['twitter_image'];
$breadcrumbs = apes_breadcrumbs_for_page($page, isset($page_key) ? (string) $page_key : null);
?><!DOCTYPE html>
<html lang="en-GB">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($page['meta_title'], ENT_QUOTES) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page['description'], ENT_QUOTES) ?>" />
  <link rel="canonical" href="<?= htmlspecialchars($canonical_url, ENT_QUOTES) ?>" />
  <meta property="og:title" content="<?= htmlspecialchars($page['meta_title'], ENT_QUOTES) ?>" />
  <meta property="og:description" content="<?= htmlspecialchars($page['description'], ENT_QUOTES) ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?= htmlspecialchars($canonical_url, ENT_QUOTES) ?>" />
  <meta property="og:image" content="<?= htmlspecialchars($absolute_og_image, ENT_QUOTES) ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= htmlspecialchars($page['meta_title'], ENT_QUOTES) ?>" />
  <meta name="twitter:description" content="<?= htmlspecialchars($page['description'], ENT_QUOTES) ?>" />
  <meta name="twitter:image" content="<?= htmlspecialchars($absolute_twitter_image, ENT_QUOTES) ?>" />
  <meta name="theme-color" content="#008C8C" />
  <link rel="icon" href="/assets/favicons/favicon.ico" sizes="any" />
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicons/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicons/favicon-16x16.png" />
  <link rel="apple-touch-icon" href="/assets/favicons/apple-touch-icon.png" />
  <link rel="manifest" href="/site.webmanifest" />
  <link rel="stylesheet" href="<?= htmlspecialchars(apes_asset('css/site.css'), ENT_QUOTES) ?>" />
</head>
<body data-page-key="<?= htmlspecialchars((string) ($page_key ?? 'unknown'), ENT_QUOTES) ?>">
  <a class="skip-link" href="#main-content">Skip to main content</a>
  <?php require __DIR__ . '/header.php'; ?>

  <main id="main-content" class="site-main">
    <?php if (!empty($breadcrumbs)): ?>
      <nav class="breadcrumb-shell" aria-label="Breadcrumb">
        <ol class="breadcrumb-list">
          <?php foreach ($breadcrumbs as $crumb): ?>
            <li class="breadcrumb-item"><?= apes_render_breadcrumb_item($crumb) ?></li>
          <?php endforeach; ?>
        </ol>
      </nav>
    <?php endif; ?>

    <section class="hero-shell">
      <div class="hero-panel">
        <p class="eyebrow"><?= htmlspecialchars($page['hero_kicker'], ENT_QUOTES) ?></p>
        <h1><?= htmlspecialchars($page['hero_title'], ENT_QUOTES) ?></h1>
        <p class="hero-summary"><?= htmlspecialchars($page['hero_summary'], ENT_QUOTES) ?></p>
        <?php if (!empty($page['pills'])): ?>
          <div class="pill-row">
            <?php foreach ($page['pills'] as $pill): ?>
              <span class="pill"><?= htmlspecialchars($pill, ENT_QUOTES) ?></span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($page['hero_actions'])): ?>
          <div class="action-row">
            <?php foreach ($page['hero_actions'] as $action): ?>
              <?php $class = ($action['variant'] ?? 'secondary') === 'primary' ? 'button button-primary' : 'button button-secondary'; ?>
              <?= apes_render_link($action, $class) ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <aside class="hero-aside">
        <div class="mini-panel brand-feature-panel">
          <picture>
            <source srcset="<?= htmlspecialchars($site['brand']['logo_feature_webp'], ENT_QUOTES) ?>" type="image/webp" />
            <img src="<?= htmlspecialchars($site['brand']['logo_feature_png'], ENT_QUOTES) ?>" alt="Association of Protecting Exotic Species CIC logo" width="320" height="277" />
          </picture>
        </div>
        <div class="mini-panel">
          <p class="eyebrow">Contact APES</p>
          <ul class="clean-list">
            <li><a href="mailto:<?= htmlspecialchars(APES_CONTACT_EMAIL, ENT_QUOTES) ?>"><?= htmlspecialchars(APES_CONTACT_EMAIL, ENT_QUOTES) ?></a></li>
            <li><a href="tel:03003020998"><?= htmlspecialchars($site['contact_phone_display'], ENT_QUOTES) ?></a></li>
            <li>40 Morris Street, St Helens, WA9 3EN</li>
          </ul>
        </div>
        <div class="mini-panel">
          <p class="eyebrow">Connected services</p>
          <ul class="clean-list">
            <li><a href="https://www.apesshelter.org.uk/" target="_blank" rel="noopener noreferrer">APES Shelter &amp; Rescue</a></li>
            <li><a href="https://www.apespetcare.org.uk/" target="_blank" rel="noopener noreferrer">APES Pet Care Clinic</a></li>
            <li><a href="https://www.apesshop.co.uk/" target="_blank" rel="noopener noreferrer">APES Pet Shop</a></li>
            <li><a href="https://www.myapes.me.uk/" target="_blank" rel="noopener noreferrer">MyAPES</a></li>
          </ul>
        </div>
      </aside>
    </section>

    <section class="page-shell">
      <article class="page-body">
        <?= $page['body_html'] ?>

        <?php if ($is_search_page): ?>
          <section class="section-shell">
            <div class="section-heading">
              <p class="eyebrow">Results</p>
              <h2><?= $search_query === '' ? 'Search the site to see results.' : 'Search results for "' . htmlspecialchars($search_query, ENT_QUOTES) . '"' ?></h2>
            </div>
            <?php if ($search_query !== '' && $search_results === []): ?>
              <p>No pages matched that search. Try broader terms such as donate, policy, contact or volunteer.</p>
            <?php elseif ($search_query !== ''): ?>
              <div class="card-grid card-grid-two">
                <?php foreach ($search_results as $result): ?>
                  <article class="info-card">
                    <h3><?= htmlspecialchars($result['title'], ENT_QUOTES) ?></h3>
                    <p><?= htmlspecialchars($result['description'], ENT_QUOTES) ?></p>
                    <a class="text-link" href="<?= htmlspecialchars($result['route'], ENT_QUOTES) ?>">Open page</a>
                  </article>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </section>
        <?php endif; ?>
      </article>

      <?php if (!empty($page['related_links'])): ?>
        <aside class="page-sidebar">
          <div class="mini-panel">
            <p class="eyebrow">Related links</p>
            <ul class="clean-list">
              <?php foreach ($page['related_links'] as $link): ?>
                <li><?= apes_render_link($link) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="mini-panel">
            <p class="eyebrow">Need help?</p>
            <p>Use the APES contact centre or Help Centre if you are unsure which route fits your situation best.</p>
            <div class="action-stack">
                <a class="button button-secondary" href="https://contact.apes.org.uk/" target="_blank" rel="noopener noreferrer">Contact centre</a>
                <a class="button button-secondary" href="https://help.apes.org.uk/" target="_blank" rel="noopener noreferrer">Help Centre</a>
            </div>
          </div>
        </aside>
      <?php endif; ?>
    </section>
  </main>

  <?php require __DIR__ . '/footer.php'; ?>
</body>
</html>
