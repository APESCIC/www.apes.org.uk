<footer class="site-footer">
  <div class="footer-shell">
    <div class="footer-grid">
      <?php foreach ($site['footer_columns'] as $column): ?>
        <section class="footer-card">
          <h2><?= htmlspecialchars($column['title'], ENT_QUOTES) ?></h2>
          <ul class="clean-list">
            <?php foreach ($column['items'] as $item): ?>
              <li><?= apes_render_link($item) ?></li>
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
    </div>
    <div class="footer-bar">
      <div class="footer-bar__identity">
        <p>Part of <?= htmlspecialchars(APES_SITE_NAME, ENT_QUOTES) ?>.</p>
        <p>&copy; <?= htmlspecialchars((string) $site['year'], ENT_QUOTES) ?> <?= htmlspecialchars(APES_SITE_NAME, ENT_QUOTES) ?> &middot; CIC No: <?= htmlspecialchars(APES_CIC_NUMBER, ENT_QUOTES) ?></p>
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
