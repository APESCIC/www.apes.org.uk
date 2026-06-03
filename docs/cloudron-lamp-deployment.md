# Cloudron LAMP deployment

- Target hostname: `[TARGET_HOSTNAME]`
- Cloudron app ID: `[CLOUDRON_APP_ID]`
- Target public webroot: `/app/data/public`
- Apache override path: `/app/data/apache/app.conf`
- PHP assumption: standard Cloudron LAMP PHP runtime
- MySQL usage: not required for this rebuild
- SMTP usage: not required for this rebuild
- phpMyAdmin: not required

## Deployment method

- Preferred: upload only the contents of `public/` into `/app/data/public`
- Local staging helper: run `.\scripts\stage-cloudron-public.ps1` from the repository root to create a deployment-ready copy that excludes mood-board utilities and local server logs
- Optional packaging helper: run `powershell -ExecutionPolicy Bypass -File .\scripts\package-cloudron-public.ps1` to produce a `dist\cloudron-public.zip` upload bundle
- Optional CI helper: `.github/workflows/build-cloudron-public-bundle.yml` builds the same ZIP bundle as a GitHub Actions artifact without embedding any Cloudron secrets
- Optional validation helper: run `powershell -ExecutionPolicy Bypass -File .\scripts\validate-public-site.ps1` before staging or production upload
- Do not publish `docs/`, `remotion/`, root governance files other than intentionally copied web files, or local Creative Production outputs

## Staging steps

1. Create or choose a staging hostname.
2. Back up the current Cloudron app before replacing any files.
3. Run `powershell -ExecutionPolicy Bypass -File .\scripts\stage-cloudron-public.ps1` or otherwise prepare a clean copy of `public/`.
4. Run `powershell -ExecutionPolicy Bypass -File .\scripts\validate-public-site.ps1` to lint the PHP files and smoke-check core routes locally.
5. Optionally run `powershell -ExecutionPolicy Bypass -File .\scripts\package-cloudron-public.ps1` if the deployment workflow prefers a ZIP bundle.
6. Upload the rebuilt public bundle to `/app/data/public`.
7. Confirm `.htaccess`, `robots.txt`, `sitemap.xml`, `index.php`, `assets/` and `includes/` are present.
8. Visit the preserved route set and check navigation, footer links, search and legacy news bridges.

## Optional GitHub Actions starting point

- Use `.github/workflows/build-cloudron-public-bundle.yml` to generate a deployable ZIP artifact from the repository without publishing docs or private notes.
- If APES later wants automated Cloudron upload, keep the upload step separate and use repository or environment secrets such as `CLOUDRON_FQDN`, `CLOUDRON_TOKEN` and `CLOUDRON_APP_ID`.
- Do not add real Cloudron credentials to the repository, workflow file, logs or changelog.

## Production cutover

1. Re-run the staging checks.
2. Take a fresh Cloudron backup.
3. Re-run `powershell -ExecutionPolicy Bypass -File .\scripts\stage-cloudron-public.ps1` if the public bundle has changed since staging.
4. Re-run `powershell -ExecutionPolicy Bypass -File .\scripts\validate-public-site.ps1` before production upload.
5. Rebuild the ZIP bundle if needed with `powershell -ExecutionPolicy Bypass -File .\scripts\package-cloudron-public.ps1`.
6. Upload the approved public bundle to production.
7. Confirm the homepage, donate page, contact page, policy pages and Change Log Hub load correctly.
8. Confirm APES Newsroom routing and footer links.

## Rollback

1. Restore the prior Cloudron backup or redeploy the previous public bundle.
2. Re-check the main homepage, donate, contact and policy routes.
3. Announce rollback status internally before attempting another cutover.
