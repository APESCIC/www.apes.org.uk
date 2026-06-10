# APES CIC validation report

- Validation date: `2026-06-10`
- Release: `v2.9.2`

## Automated and scripted checks

- PHP lint checks for the shared runtime:
  - `public/index.php`
  - `public/includes/render-page.php`
  - `public/includes/footer.php`
  - `public/includes/site-data.php`
  - `public/scripts/export-static-site.php`
  - `dev/router.php`
- Shared PHP static export with `php public/scripts/export-static-site.php`
- Local HTTP smoke test through `dev/router.php`
- Reusable PowerShell validation script for route, asset, footer, version and error-page checks
- Cloudron staging helper and ZIP packaging helper
- GitHub Actions workflow scaffolds for validation and bundle build

## Results

- Shared PHP rendering remained the source of truth and exported successfully into the static snapshot set under `public/`.
- Representative HTTP 200 checks passed for:
  - `/`
  - `/services/`
  - `/donate/`
  - `/contact/`
  - `/search/`
  - `/news/`
  - `/policies/privacy/`
  - `/mission/our-main-mission-statement/`
  - `/change-log-hub/`
  - `/24-7-services/`
  - `/robots.txt`
  - `/sitemap.xml`
  - `/theme/site.css`
  - `/theme/js/site.js`
- Canonical redirect checks passed for `/index` to `/`.
- Legacy Newsroom redirect checks passed for `/news/post/Urgent-APES-Must-Relocate-by-3-March-2026/`.
- Branded `403` handling passed for `/includes/site-data.php`.
- Branded `404` handling passed for a missing route.
- Footer checks passed on representative rendered pages for:
  - donation link
  - Privacy Policy link
  - Terms of Service link
  - Change Log Hub link
  - `CIC No: 16253848`
  - website version text for `v2.9.2`
- Repo-root helper scripts now exist for preview, export, validation, staging and packaging.
- GitHub workflow scaffolds now exist for Cloudron public-bundle build and shared public-site validation.

## Known review items

- Final browser QA on the deployed Cloudron staging app
- Live Apache response verification after upload, including final `ErrorDocument` behavior
- Post-upload cache verification for shared CSS, JS and release metadata
