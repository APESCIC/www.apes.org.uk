## [v2.2.1] - 2026-06-03

<span class="pill pill-version">Version v2.2.1</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Updated the shared hero layout so hero titles and descriptions now span the full available width of the main hero card across the APES website.

### Detailed changes

- Removed the shared max-width constraints from hero headings and hero summary text so each hero card uses the full available text column.
- Kept the existing two-column hero layout, CTA rows, pill styling and hero aside stack intact while applying the fix site-wide through the shared stylesheet.
- Regenerated the exported static HTML snapshots from the shared PHP renderer so the widened hero layout appears consistently across public pages and release records.
- Bumped the canonical version and synchronised the website Change Log Hub, root changelog and footer version display.

### Affected areas

- Website: www.apes.org.uk
- Page or route: homepage, content pages, policy pages, legacy news pages, Change Log Hub and shared release metadata
- Files changed: shared CSS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: hero titles and descriptions are easier to read because they now span the full width available within each hero card
- Internal impact: the shared hero layout now behaves consistently across the full exported site without per-page template overrides

### Version decision

- Previous version: v2.2.0b
- New version: v2.2.1
- Version type: patch stable
- Reason for version bump: shared public-facing layout fix with no route, schema or structural change

### Validation

- Checks run: local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: homepage hero, representative content and policy heroes, legacy news hero, Change Log Hub hero and footer version/link review
- Known limitations: validation is based on source-rendered output and representative page inspection rather than exhaustive browser checks on every route
- Rollback notes: restore the previous shared CSS, version and changelog entries, then re-export the static HTML snapshots if needed

## [v2.2.0b] - 2026-06-03

<span class="pill pill-version">Version v2.2.0b</span>
<span class="pill pill-status">Beta</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Refreshed site-wide hero copy and page calls to action so each public route now leads with clearer, service-specific guidance instead of release or rebuild messaging.

### Detailed changes

- Rewrote the homepage hero and spotlight section around APES CIC public purpose, support journeys and welfare services.
- Updated shared hero summaries and pill labels across service, support, policy, contact, news and archive pages to make them more page-specific and user-facing.
- Adjusted hero buttons so each page points to the most relevant next action, including donation, booking, contact, policy and APES Newsroom routes.
- Kept the shared footer structure and required links intact while synchronising the canonical version, Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: homepage, service pages, support pages, policy pages, contact routes, news bridges, legacy archives and release metadata
- Files changed: shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: page introductions and top-level actions are now clearer, more relevant to each route and less technical in tone
- Internal impact: shared hero content is now more consistent across the full exported site

### Version decision

- Previous version: v2.1.2b
- New version: v2.2.0b
- Version type: minor beta
- Reason for version bump: broad public-facing content and CTA refresh across many shared routes without a structural or URL-breaking change

### Validation

- Checks run: local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: homepage copy review, representative service and policy page review, news bridge review, footer link presence and release display alignment
- Known limitations: validation focused on source-driven export and spot-checking rather than exhaustive browser testing of every route
- Rollback notes: restore the previous shared copy, version and changelog entries, then re-export the static HTML snapshots if needed

## [v2.1.2b] - 2026-06-03

<span class="pill pill-version">Version v2.1.2b</span>
<span class="pill pill-status">Beta</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Updated the shared navigation script so the mobile menu closes when visitors activate any primary navigation link or open a new page, including back-forward cache restores, while keeping the shared header and footer shell intact.

### Detailed changes

- Updated the shared navigation script so any primary navigation link activation closes the mobile menu immediately.
- Added page transition guards so the menu state resets on navigation and back-forward cache restores, preventing stale open menus after moving to a new page.
- Kept the existing shared header and footer structure intact so the fix applies site-wide without per-page markup changes.
- Bumped the canonical website version and synchronised the release record across the website Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared site-wide navigation, homepage, content pages, change-log hub and release metadata
- Files changed: shared JS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: the mobile menu now closes reliably when visitors move to a new page, reducing confusion and accidental obstruction of content
- Internal impact: the shared navigation behaviour now stays consistent across all rendered pages

### Version decision

- Previous version: v2.1.1b
- New version: v2.1.2b
- Version type: patch beta
- Reason for version bump: small shared-behaviour fix with no breaking URL or content restructure

### Validation

- Checks run: local PHP syntax checks, static HTML export, generated HTML inspection and browser interaction verification
- Manual checks completed: mobile menu close-on-link activation, new-page navigation reset and back-forward cache restore
- Known limitations: the browser test used the local development renderer and the static HTML export is regenerated from the PHP source of truth
- Rollback notes: restore the previous JS and version/changelog entries, then re-export the static HTML snapshots if needed

## [v2.1.1b] - 2026-06-03

<span class="pill pill-version">Version v2.1.1b</span>
<span class="pill pill-status">Beta</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Split the shared APES site shell into reusable header and footer partials, added social icon links in the top bar, tightened menu behaviour and kept the HTML5-first delivery model in sync with the exported static site.

### Detailed changes

- Split the site shell into `includes/header.php` and `includes/footer.php` so the shared navigation, footer and social links can be updated once and reused across every page.
- Added a top-bar social icon strip for APES Social, Discord and YouTube with icon-style SVG marks and accessible labels.
- Updated the menu script so clicking a nav item closes the menu and cached page restores do not leave the mobile menu open.
- Kept the Services mega menu centered in the viewport on desktop and constrained it so it stays on screen.
- Regenerated the static HTML snapshots so the HTML-first delivery path mirrors the new shared partials.
- Bumped the canonical release record and synchronised the root `VERSION`, website Change Log Hub and repository changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared site-wide header, footer, navigation, homepage, change-log hub and release metadata
- Files changed: shared PHP partials, shared site data, CSS, JS, static HTML snapshots, root VERSION and root CHANGELOG
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: clearer navigation, improved header social access, better mobile behaviour and a more polished first-impression experience
- Internal impact: shared shell components are now easier to update without touching every page

### Version decision

- Previous version: v2.1.0b
- New version: v2.1.1b
- Version type: patch beta
- Reason for version bump: structural shared-shell refactor and user-visible navigation polish without a breaking URL or content restructure

### Validation

- Checks run: local PHP syntax checks, Node syntax check, static HTML export, generated HTML inspection and browser interaction verification
- Manual checks completed: top-bar social icon strip, footer links, mobile menu close-on-click, Services mega menu centering and release display alignment
- Known limitations: the browser test used a local Chrome executable and the site still relies on the PHP renderer as the source of truth for future exports
- Rollback notes: remove the regenerated snapshots, restore the previous partials and JS if needed, and redeploy the prior bundle
