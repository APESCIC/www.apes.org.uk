<header class="site-header">
  <div class="topbar">
    <div class="topbar-inner">
      <div class="topbar-contact" aria-label="APES contact details">
        <p><a href="mailto:<?= htmlspecialchars(APES_CONTACT_EMAIL, ENT_QUOTES) ?>"><?= htmlspecialchars(APES_CONTACT_EMAIL, ENT_QUOTES) ?></a></p>
        <p><a href="tel:03003020998"><?= htmlspecialchars($site['contact_phone_display'], ENT_QUOTES) ?></a></p>
      </div>
      <?php $headerSocialLinks = apes_social_links_for_placement($site['social_profiles'] ?? [], 'header'); ?>
      <?php if (!empty($headerSocialLinks)): ?>
        <div class="topbar-social" aria-label="APES social media links">
          <?php foreach ($headerSocialLinks as $socialLink): ?>
            <?= apes_render_social_icon_link($socialLink) ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="nav-shell">
    <div class="brand-block">
      <a class="brand-mark" href="/">
        <picture class="brand-logo-wrap">
          <source srcset="<?= htmlspecialchars($site['brand']['logo_nav_webp'], ENT_QUOTES) ?>" type="image/webp" />
          <img class="brand-logo" src="<?= htmlspecialchars($site['brand']['logo_nav_png'], ENT_QUOTES) ?>" alt="Association of Protecting Exotic Species CIC logo" width="92" height="72" />
        </picture>
        <span class="brand-copy">
          <strong><?= htmlspecialchars($site['site_short_name'], ENT_QUOTES) ?></strong>
          <span><?= htmlspecialchars($site['brand']['subtitle'], ENT_QUOTES) ?></span>
        </span>
      </a>
      <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-nav">Menu</button>
    </div>
    <nav id="primary-nav" class="primary-nav" aria-label="Primary">
      <ul>
        <?php foreach ($site['nav'] as $item): ?>
          <?php
            $groupKey = match ($item['label']) {
                'Home' => 'home',
                'Services' => 'services',
                'Support APES' => 'support',
                'Information' => 'information',
                'Contact' => 'contact',
                default => '',
            };
            $isActive = $groupKey !== '' && $active_nav_group === $groupKey;
          ?>
          <li class="<?= isset($item['children']) ? 'has-children' : '' ?><?= !empty($item['cta']) ? ' nav-cta-item' : '' ?>">
            <?php if (isset($item['children'])): ?>
              <details class="mega-menu<?= $isActive ? ' is-active' : '' ?>">
                <summary class="mega-summary"><?= htmlspecialchars($item['label'], ENT_QUOTES) ?></summary>
                <div class="mega-panel">
                  <p class="mega-heading"><?= htmlspecialchars($item['panel_heading'] ?? $item['label'], ENT_QUOTES) ?></p>
                  <ul class="mega-links">
                    <?php foreach ($item['children'] as $child): ?>
                      <li>
                        <a class="mega-link" href="<?= htmlspecialchars($child['href'], ENT_QUOTES) ?>"<?php if (!empty($child['external'])): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?>>
                          <span class="mega-link-title"><?= htmlspecialchars($child['label'], ENT_QUOTES) ?></span>
                          <span class="mega-link-description"><?= htmlspecialchars($child['description'] ?? '', ENT_QUOTES) ?></span>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </details>
            <?php else: ?>
              <a class="<?= !empty($item['cta']) ? 'button button-primary nav-cta-link' : 'nav-link' ?>" href="<?= htmlspecialchars($item['href'], ENT_QUOTES) ?>"<?= $isActive ? ' aria-current="page"' : '' ?>><?= htmlspecialchars($item['label'], ENT_QUOTES) ?></a>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>
