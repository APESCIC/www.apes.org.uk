<?php
declare(strict_types=1);

require_once __DIR__ . '/site-data.php';

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
    $target = !empty($link['external']) ? ' target="_blank" rel="noreferrer"' : '';

    return '<a class="' . $class . '" href="' . $href . '"' . $target . '>' . $label . '</a>';
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

[$site, $page] = apes_current_page();
$canonical_url = apes_page_url($page);
$is_search_page = ($page_key ?? '') === 'search';
[$search_query, $search_results] = $is_search_page ? apes_search_results($site['pages']) : ['', []];
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
  <meta name="theme-color" content="#008C8C" />
  <link rel="stylesheet" href="<?= htmlspecialchars(apes_asset('css/site.css'), ENT_QUOTES) ?>" />
</head>
<body data-page-key="<?= htmlspecialchars((string) ($page_key ?? 'unknown'), ENT_QUOTES) ?>">
  <a class="skip-link" href="#main-content">Skip to main content</a>
  <header class="site-header">
    <div class="topbar">
      <div class="topbar-inner">
        <p><a href="mailto:<?= htmlspecialchars(APES_CONTACT_EMAIL, ENT_QUOTES) ?>"><?= htmlspecialchars(APES_CONTACT_EMAIL, ENT_QUOTES) ?></a></p>
        <p><a href="tel:03003020998"><?= htmlspecialchars($site['contact_phone_display'], ENT_QUOTES) ?></a></p>
      </div>
    </div>
    <div class="nav-shell">
      <div class="brand-block">
        <a class="brand-mark" href="/">
          <span class="brand-initials">APES</span>
          <span class="brand-copy">
            <strong><?= htmlspecialchars($site['site_short_name'], ENT_QUOTES) ?></strong>
            <span>Shelter, rescue, pet care and support services.</span>
          </span>
        </a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-nav">Menu</button>
      </div>
      <nav id="primary-nav" class="primary-nav" aria-label="Primary">
        <ul>
          <?php foreach ($site['nav'] as $item): ?>
            <li class="<?= isset($item['children']) ? 'has-children' : '' ?>">
              <?php if (isset($item['children'])): ?>
                <details>
                  <summary><?= htmlspecialchars($item['label'], ENT_QUOTES) ?></summary>
                  <ul class="subnav">
                    <?php foreach ($item['children'] as $child): ?>
                      <li><?= apes_render_link($child, 'nav-link') ?></li>
                    <?php endforeach; ?>
                  </ul>
                </details>
              <?php else: ?>
                <?= apes_render_link($item, 'nav-link') ?>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </div>
  </header>

  <main id="main-content">
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
            <li><a href="https://www.apesshelter.org.uk/" target="_blank" rel="noreferrer">APES Shelter &amp; Rescue</a></li>
            <li><a href="https://www.apespetcare.org.uk/" target="_blank" rel="noreferrer">APES Pet Care Clinic</a></li>
            <li><a href="https://www.apesshop.co.uk/" target="_blank" rel="noreferrer">APES Pet Shop</a></li>
            <li><a href="https://www.myapes.me.uk/" target="_blank" rel="noreferrer">MyAPES</a></li>
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
              <a class="button button-secondary" href="https://contact.apes.org.uk/" target="_blank" rel="noreferrer">Contact centre</a>
              <a class="button button-secondary" href="https://help.apes.org.uk/" target="_blank" rel="noreferrer">Help Centre</a>
            </div>
          </div>
        </aside>
      <?php endif; ?>
    </section>
  </main>

  <footer class="site-footer">
    <div class="footer-grid">
      <?php foreach ($site['footer_columns'] as $column): ?>
        <section>
          <h2><?= htmlspecialchars($column['title'], ENT_QUOTES) ?></h2>
          <ul class="clean-list">
            <?php foreach ($column['items'] as $item): ?>
              <li><?= apes_render_link($item) ?></li>
            <?php endforeach; ?>
          </ul>
        </section>
      <?php endforeach; ?>
    </div>
    <div class="footer-meta">
      <p>Part of <?= htmlspecialchars(APES_SITE_NAME, ENT_QUOTES) ?>.</p>
      <p>Website version: <a href="/change-log-hub/">APES CIC <?= htmlspecialchars(APES_VERSION, ENT_QUOTES) ?></a> · Change Log Hub</p>
      <p>&copy; <?= htmlspecialchars((string) $site['year'], ENT_QUOTES) ?> <?= htmlspecialchars(APES_SITE_NAME, ENT_QUOTES) ?> · CIC No: <?= htmlspecialchars(APES_CIC_NUMBER, ENT_QUOTES) ?> · APES CIC website · <?= htmlspecialchars(APES_VERSION, ENT_QUOTES) ?></p>
    </div>
  </footer>

  <script src="<?= htmlspecialchars(apes_asset('js/site.js'), ENT_QUOTES) ?>" defer></script>
</body>
</html>
