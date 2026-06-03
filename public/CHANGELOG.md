## [v2.1.0b] - 2026-06-03

<span class="pill pill-version">Version v2.1.0b</span>
<span class="pill pill-status">Beta</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-type">Added</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Rebuilt the APES CIC website into a more graphical HTML5-first experience with richer editorial panels, stronger hierarchy, a more compliant footer, clearer public journeys and static HTML snapshots that now serve as the default site output.

### Detailed changes

- Introduced a more editorial homepage hero and spotlight band so the public front page feels graphical and easier to scan.
- Refined the shared HTML5 structure and surface styles to create clearer section hierarchy, stronger cards, better spacing and more intentional call-to-action treatment.
- Updated the footer into a card-based APES compliance pattern with direct donation, policy and Change Log Hub links plus staff, volunteer and student intranet access.
- Kept APES Newsroom as the canonical news destination while preserving the existing public routes and legacy bridge pages.
- Exported the current public routes to static HTML snapshots and switched Apache to prefer `index.html` before `index.php` so HTML5 is now the default delivery path.
- Bumped the canonical website version and synchronised the release record across the website Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared site-wide header, hero sections, footer, homepage, change-log hub and release metadata
- Files changed: shared PHP templates, shared site data, CSS, JS, static HTML snapshots, Apache routing, root VERSION and root CHANGELOG
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: clearer navigation, stronger visual hierarchy, improved footer compliance and a more polished first-impression experience
- Internal impact: canonical versioning now lives in a root VERSION file and release records are synchronised across public and repository changelogs

### Version decision

- Previous version: v2.0.0b
- New version: v2.1.0b
- Version type: minor beta
- Reason for version bump: additional public-facing delivery change to HTML5 static snapshots and HTML-first routing, on top of the shared shell redesign

### Validation

- Checks run: local PHP syntax checks, footer-link review, navigation review, homepage layout review, static export generation and release-record alignment review
- Manual checks completed: APES Newsroom routing, footer required links, intranet link targets, release filter logic, responsive section stacking, static HTML snapshots and version display alignment
- Known limitations: the PHP renderer remains in the repository as the source of truth for future exports and fallback rendering
- Rollback notes: remove the generated HTML snapshots, restore the previous Apache DirectoryIndex order and redeploy the prior bundle if needed
