# APES CIC validation report

- Validation date: 2026-06-03
- Release: `v1.0.0b`

## Automated and scripted checks

- PHP CLI render checks for the rebuilt route set
- Local HTTP smoke test with the PHP development server
- Reusable PowerShell validation script for PHP lint plus route smoke checks
- Cloudron staging-bundle generation via the PowerShell deployment helpers
- GitHub Actions bundle workflow scaffold added for repeatable artifact generation
- GitHub Actions validation workflow scaffold added for repeatable PHP and route checks
- Footer link review
- Search flow review
- APES Newsroom routing review
- Secrets scan
- Route normalization review
- Live-site route and content comparison against the attached rebuild brief

## Results

- 35 preserved public routes rendered successfully through the shared PHP template stack.
- 35 of 35 preserved routes included:
  - donation link
  - Privacy Policy link
  - Terms of Service link
  - Change Log Hub link
  - `CIC No: 16253848`
  - `v1.0.0b`
- Local HTTP smoke test confirmed:
  - `/` returned `200`
  - `/search/?q=donate` returned `200`
  - `/news/post/Urgent-APES-Must-Relocate-by-3-March-2026/` returned `200`
  - `/donate` returned `301` to the canonical trailing-slash route
- `scripts/validate-public-site.ps1` completed successfully in the current workspace, linting all public PHP files, passing 13 smoke-route checks, verifying 4 Apache rewrite rules, and rendering 42 rebuilt public routes while confirming footer links, version text and the CIC number on every route.
- A reusable validation script now lints public PHP files and re-checks key public routes for maintainable repeat testing.
- The staging helper produced a clean deployable bundle containing only the public web files expected for `/app/data/public`.
- A GitHub Actions workflow scaffold now reproduces the same ZIP artifact build without embedding Cloudron credentials.
- A GitHub Actions validation workflow scaffold now runs the reusable public-site validation script under PHP 8.2 on Windows.
- Route map checks passed for `/index`, `/donate` and legacy news bridges.
- The Creative Production reference pack is now stored in `docs/assets/creative-direction/` with a mirrored board specification in `docs/creative-direction-board-spec.json`.
- The attached rebuild brief and current live site were re-audited to enrich the route inventory, redirect map and third-party-services record.
- Secrets scan produced no committed credentials or private keys. The only matches were:
  - a local Creative Production run-token helper inside the generated mood-board utility
  - documentation placeholders such as `[CLOUDRON_APP_ID]`

## Known review items

- Pet Shop placeholder gallery content
- Adoption Policy source completeness
- Cookie guidance source wording
- Centre/Center language inconsistency
- Final browser QA on the actual deployed Cloudron staging app
- Local browser automation was attempted, but the bundled Playwright package in this workspace does not include `playwright-core`, so no persistent browser-level render check could be completed here.
- Visual QA was completed structurally and via rendered HTML output, but not through a persistent browser session because the local PHP server did not remain alive after the spawning shell exited on this Windows setup
