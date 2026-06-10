# Cloudron LAMP deployment

- Target hostname: `[TARGET_HOSTNAME]`
- Cloudron app ID: `[CLOUDRON_APP_ID]`
- Target public webroot: `/app/data/public`
- Apache override path: `/app/data/apache/app.conf`
- PHP assumption: standard Cloudron LAMP PHP runtime
- MySQL usage: not required for this rebuild
- SMTP usage: not required for this rebuild
- phpMyAdmin: not required

## Source-of-truth rendering workflow

- Shared PHP under `public/index.php` and `public/includes/` remains the canonical source of truth.
- Local HTTP preview parity now runs through `dev/router.php` with:
  `php -S 127.0.0.1:8080 -t public dev/router.php`
- Exported HTML snapshots are regenerated with:
  `php public/scripts/export-static-site.php`
- Static snapshot review can still use the PowerShell helper that serves `public/` as the web root.

## Repository helpers

- Preview shared PHP locally: `powershell -ExecutionPolicy Bypass -File .\scripts\preview-php-source-site.ps1`
- Export static snapshots: `powershell -ExecutionPolicy Bypass -File .\scripts\export-static-html-snapshots.ps1`
- Validate the public site: `powershell -ExecutionPolicy Bypass -File .\scripts\validate-public-site.ps1`
- Stage a deployable public bundle: `powershell -ExecutionPolicy Bypass -File .\scripts\stage-cloudron-public.ps1`
- Package a ZIP bundle: `powershell -ExecutionPolicy Bypass -File .\scripts\package-cloudron-public.ps1`

## Deployment method

- Preferred: upload only the contents of `public/` into `/app/data/public`
- Staging helper output: `dist/cloudron-public`
- ZIP bundle output: `dist/cloudron-public.zip`
- GitHub workflow scaffold: `.github/workflows/build-cloudron-public-bundle.yml`
- Validation workflow scaffold: `.github/workflows/validate-public-site.yml`

Do not publish `docs/`, root governance files outside the intended public bundle, local logs, or private notes.

## Staging steps

1. Preview the shared PHP source site over HTTP and confirm representative routes render correctly.
2. Run `powershell -ExecutionPolicy Bypass -File .\scripts\validate-public-site.ps1`.
3. Run `powershell -ExecutionPolicy Bypass -File .\scripts\stage-cloudron-public.ps1`.
4. Optionally run `powershell -ExecutionPolicy Bypass -File .\scripts\package-cloudron-public.ps1` if the deployment workflow prefers a ZIP upload.
5. Back up the current Cloudron app before replacing any files.
6. Upload the staged bundle contents to `/app/data/public`.
7. Confirm `.htaccess`, `index.php`, `robots.txt`, `sitemap.xml`, `site.webmanifest`, `theme/`, `assets/`, `includes/`, and the branded error pages are present.
8. Visit the homepage, Services hub, Donate page, Contact page, Change Log Hub, policy routes, one legacy news redirect, and one missing route.

## Production cutover

1. Re-run `powershell -ExecutionPolicy Bypass -File .\scripts\validate-public-site.ps1`.
2. Take a fresh Cloudron backup.
3. Re-run `powershell -ExecutionPolicy Bypass -File .\scripts\stage-cloudron-public.ps1` if the public bundle changed after staging review.
4. Rebuild `dist/cloudron-public.zip` with `powershell -ExecutionPolicy Bypass -File .\scripts\package-cloudron-public.ps1` if needed.
5. Upload the approved bundle to production.
6. Confirm the homepage, donate page, contact page, policy pages, Newsroom bridge, robots, sitemap and Change Log Hub load correctly.

## Workflow notes

- Keep the production runtime Apache + PHP + static assets only. No Node, Python, worker or background service runtime is required for this site.
- The local PHP router exists only for preview parity. Production still relies on Cloudron Apache plus `public/.htaccess`.
- If APES later wants automated Cloudron upload, keep deployment credentials out of the repository and use GitHub or environment secrets such as `CLOUDRON_FQDN`, `CLOUDRON_TOKEN`, and `CLOUDRON_APP_ID`.

## Rollback

1. Restore the prior Cloudron backup or redeploy the previous public bundle.
2. Re-check the homepage, donate page, contact page, change-log route, and policy routes.
3. Announce rollback status internally before attempting another cutover.
