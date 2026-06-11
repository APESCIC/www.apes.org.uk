# APES CIC validation report

- Validation date: `2026-06-11`
- Release: `v4.0.0b`

## Automated and scripted checks

- PHP lint checks for the shared runtime:
  - `public/index.php`
  - `public/includes/render-page.php`
  - `public/includes/footer.php`
  - `public/includes/site-data.php`
  - `dev/router.php`
- Optional shared PHP static export with `powershell -ExecutionPolicy Bypass -File .\scripts\export-static-site.ps1`
- Local HTTP smoke test through `dev/router.php`
- Reusable PowerShell validation script for PHP-first route, asset, footer, version and error-page checks
- Cloudron staging helper and ZIP packaging helper
- GitHub Actions workflow scaffolds for validation and bundle build

## Results

- Confirmed from the current worktree that shared PHP rendering remains the source of truth and checked-in static route snapshots have been removed from `public/`.
- Confirmed from the current worktree that the public root now contains `index.php`, `includes/`, `theme/`, `assets/`, branded fallback error pages, and the expected public metadata files.
- Confirmed from the current worktree that obsolete static-first route snapshots, generated page-owned bundles, and static-only helper scripts have been removed.
- Confirmed from the current worktree that repo-root helper scripts now exist for PHP preview, optional export, validation, staging, and packaging.
- PHP-powered lint and HTTP route verification are still pending because this workstation does not currently expose `php.exe`, so the validator stops at PHP discovery before route-by-route runtime checks can be completed.

## Known review items

- Final browser QA on the deployed Cloudron staging app
- Live Apache response verification after upload, including final `ErrorDocument` behavior
- Local PHP lint and local PHP HTTP preview still need to be run in a PHP-enabled environment
