<footer class="site-footer">
  <div class="footer-shell">
    <div class="footer-grid">
      <?php foreach ($site['footer_columns'] as $column): ?>
        <section class="footer-card">
          <h2><?= htmlspecialchars($column['title'], ENT_QUOTES) ?></h2>
          <ul class="clean-list">
            <?php foreach ($column['items'] as $item): ?>
              <?php if (($item['type'] ?? 'link') === 'subheading'): ?>
                <li class="footer-item footer-item-subheading"><span class="footer-subheading"><?= htmlspecialchars($item['label'], ENT_QUOTES) ?></span></li>
              <?php else: ?>
                <?php $linkClass = ($item['variant'] ?? '') === 'tile' ? 'text-link footer-link-tile' : 'text-link'; ?>
                <li class="footer-item"><?= apes_render_link($item, $linkClass) ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </section>
      <?php endforeach; ?>
    </div>
    <div class="footer-partners">
      <span class="footer-partners-label">Working in partnership with:</span>
      <div class="footer-partner-list">
        <?php foreach ($site['footer_partners'] as $partner): ?>
          <a class="partner-chip" href="<?= htmlspecialchars($partner['href'], ENT_QUOTES) ?>" target="_blank" rel="noopener noreferrer">
            <img src="<?= htmlspecialchars($partner['logo'], ENT_QUOTES) ?>" alt="<?= htmlspecialchars($partner['logo_alt'], ENT_QUOTES) ?>" />
            <span><?= htmlspecialchars($partner['label'], ENT_QUOTES) ?></span>
          </a>
        <?php endforeach; ?>
      </div>
      <?php $footerSocialLinks = apes_social_links_for_placement($site['social_profiles'] ?? [], 'footer'); ?>
      <?php if (!empty($footerSocialLinks)): ?>
        <div class="footer-social">
          <span class="footer-partners-label">Follow APES:</span>
          <div class="footer-social-list">
            <?php foreach ($footerSocialLinks as $socialLink): ?>
              <?= apes_render_social_icon_link($socialLink, 'social-icon-link footer-social-link') ?>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <div class="footer-bar">
      <div class="footer-bar__identity">
        <p>Part of <?= htmlspecialchars(APES_SITE_NAME, ENT_QUOTES) ?>.</p>
        <p>&copy; <?= htmlspecialchars((string) $site['year'], ENT_QUOTES) ?> <?= htmlspecialchars(APES_SITE_NAME, ENT_QUOTES) ?> &middot; CIC No: <?= htmlspecialchars(APES_CIC_NUMBER, ENT_QUOTES) ?></p>
        <p>Registered office: <?= htmlspecialchars($site['registered_address'], ENT_QUOTES) ?></p>
        <p>Public contact: <a class="footer-inline-link" href="mailto:<?= htmlspecialchars($site['contact_email'], ENT_QUOTES) ?>"><?= htmlspecialchars($site['contact_email'], ENT_QUOTES) ?></a> &middot; <a class="footer-inline-link" href="tel:03003020998"><?= htmlspecialchars($site['contact_phone_display'], ENT_QUOTES) ?></a></p>
      </div>
      <p class="footer-bar__links">
        <?php foreach ($site['footer_required_links'] as $index => $link): ?>
          <?= apes_render_link($link, 'footer-inline-link') ?><?= $index < count($site['footer_required_links']) - 1 ? '<span aria-hidden="true"> &middot; </span>' : '' ?>
        <?php endforeach; ?>
      </p>
      <p class="footer-bar__version">Website version: <?= apes_render_link(['label' => 'APES CIC ' . $site['version'], 'href' => '/change-log-hub/'], 'footer-inline-link') ?> &middot; Change Log Hub</p>
    </div>
  </div>
</footer>

<script src="<?= htmlspecialchars(apes_asset('js/site.js'), ENT_QUOTES) ?>" defer></script>
