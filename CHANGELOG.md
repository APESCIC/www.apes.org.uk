# Change Log Hub

Track every major release for this website, including updates, fixes, compliance changes, and user-facing improvements.

## [v1.0.0b] - 2026-06-03

<span class="pill pill-version">Version v1.0.0b</span>
<span class="pill pill-status">Beta</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-type">Compliance</span>

### Summary

Completed the first governed rebuild of the APES CIC website for Cloudron LAMP using shared PHP templates, a unified APES design system, preserved route families, a compliant footer, and APES Newsroom-aligned news routing.

### Detailed changes

- Rebuilt the public route set under a shared PHP template system with consistent APES branding and accessible layouts.
- Added a compliant universal footer with donation, Privacy Policy, Terms of Service and Change Log Hub links plus version display.
- Preserved public page families for services, fundraising, policy routes, mission content, contact, search and legacy news bridge pages.
- Routed primary news and newsletter journeys to APES Newsroom while retaining legacy `news/post` paths as bridge pages.
- Corrected user-visible presentation issues such as the euthanasia policy heading while documenting content-review items that still need APES approval.
- Added Cloudron-ready public support files including `.htaccess`, `robots.txt`, `sitemap.xml`, route normalization and output protection.
- Added root governance and migration documentation covering information architecture, public inventory, redirects, deployment, rollback, validation and third-party services.
- Stored the Creative Production mood-board reference pack inside repository documentation and added a reusable Cloudron staging script for deployment handoff.
- Added a Cloudron packaging helper and expanded the site inventory, redirect map and third-party-service evidence to align the repository more closely with the issue #2 migration brief.
- Added an optional GitHub Actions workflow that builds the deployable Cloudron public-bundle artifact without storing secrets in the repository.
- Added a reusable public-site validation script, a CI validation workflow scaffold, and a fuller page-by-page content audit to strengthen acceptance evidence.
- Added rebuilt public routes for `socials`, `apes-communities`, `staff` and `contact-centre`, plus legacy `missions/*` redirects discovered during the stricter live-site audit.
- Added legacy fundraising and tag archive bridges discovered during the stricter live-site audit, and improved the fidelity of social, staff and contact-centre content.
- Expanded the validator so it now lint-checks public PHP, verifies key smoke routes, checks Apache rewrite rules and renders the full rebuilt route set for footer and version compliance.
- Added optional Remotion source files for an APES branded hero-loop motion pack that can be rendered later without becoming a runtime dependency.

### Affected areas

- Website: `www.apes.org.uk`
- Page or route: site-wide rebuild under `public/`
- Files changed: shared templates, route handling, CSS, JS, public Change Log Hub, robots, sitemap, governance files and deployment docs
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: improved navigation, clearer support journeys, consistent footer and APES Newsroom routing
- Internal impact: easier Cloudron deployment, clearer route inventory and documented migration assumptions

### Version decision

- Previous version: none governed in repository
- New version: `v1.0.0b`
- Version type: major beta
- Reason for version bump: first major rebuilt public release structure for Cloudron LAMP

### Validation

- Checks run: local PHP smoke checks, footer link review, route inventory review, manual accessibility and navigation review, secrets scan
- Manual checks completed: navigation, footer, Newsroom routing, policy availability, contact routes, legacy bridge pages and search flow
- Known limitations: some source pages still contain placeholders or incomplete wording that require APES editorial review before a stable launch
- Rollback notes: redeploy the previous public bundle or restore the prior Cloudron backup before cutover
