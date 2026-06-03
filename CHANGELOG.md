# Change Log Hub

Track every major release for this website, including updates, fixes, compliance changes, and user-facing improvements.

## [v2.5.0] - 2026-06-03

<span class="pill pill-version">Version v2.5.0</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-accessibility">Accessibility</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Promoted the shared hero into a full-width site header panel, moved the previous hero-side support cards into the lower sidebar across all rendered public routes, and synchronised the release metadata to the new minor stable version.

### Detailed changes

- Updated the shared PHP page renderer so the hero panel now spans the full content width while the logo, contact and connected-service cards render in the lower page sidebar above page-specific related links.
- Reworked the shared stylesheet so the new full-width hero and lower two-column body/sidebar layout behave consistently across the homepage, inner content routes, Change Log Hub and 404 page without changing route copy or CTA destinations.
- Preserved APES Newsroom routing, footer structure, required donation, Privacy Policy, Terms of Service and Change Log Hub links, and intranet link rules while applying the shared layout shift.
- Bumped the canonical version and synchronised the website Change Log Hub, root changelog, public changelog mirror and exported static HTML snapshots to v2.5.0.

### Affected areas

- Website: www.apes.org.uk
- Page or route: homepage hero, all shared inner-page hero/sidebar layouts, Change Log Hub, 404 page, footer version display and regenerated static HTML snapshots
- Files changed: shared PHP rendering, shared CSS, shared site data, VERSION, public VERSION, root CHANGELOG, public CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: visitors now see a full-width hero followed by a clearer lower content/sidebar layout that keeps support cards available without crowding the page header
- Internal impact: the shared renderer now owns a single full-width hero pattern across all exported public routes and the release metadata is aligned at v2.5.0

### Version decision

- Previous version: v2.4.6
- New version: v2.5.0
- Version type: minor stable
- Reason for version bump: site-wide public layout change across the shared rendering system without route or content-model changes

### Validation

- Checks run: shared PHP renderer review, shared CSS review, local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: homepage, representative top-level route, nested route, Change Log Hub and 404 layout review; footer required link review; intranet link attribute review; APES Newsroom route review; changelog/version alignment review
- Known limitations: final browser QA is limited to local rendered/output inspection in this environment rather than a full live-browser pass across every route
- Rollback notes: restore the previous shared renderer, CSS and release metadata, then re-export the static HTML snapshots if the new layout needs to be reverted

## [v2.4.6] - 2026-06-03

<span class="pill pill-version">Version v2.4.6</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-compliance">Compliance</span>
<span class="pill pill-accessibility">Accessibility</span>

### Summary

Tightened the shared hero layout so the primary content panel no longer leaves an oversized gap below the call-to-action buttons, and synchronised the release metadata back to the canonical site version.

### Detailed changes

- Updated the shared hero grid so the hero panel aligns to its content instead of stretching to match the taller hero aside, which removes the empty space beneath the hero buttons on the homepage and all shared inner-page hero variants.
- Applied the change in the shared stylesheet only, leaving route content, hero copy, buttons, footer structure and APES Newsroom destinations untouched.
- Re-synchronised the canonical version, website Change Log Hub and root changelog after correcting the existing mismatch between the repository `VERSION` file and the rendered site release metadata.
- Regenerated the exported static HTML snapshots and synchronised the canonical version, website Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: homepage shared hero, inner-page shared hero pattern, Change Log Hub, footer version display and regenerated static HTML snapshots
- Files changed: shared CSS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: visitors now see a tighter hero layout with less empty space beneath hero actions, while footer version text and release records now consistently show v2.4.6
- Internal impact: shared hero sizing now behaves consistently across rendered routes and the repository release metadata matches the generated site output again

### Version decision

- Previous version: v2.4.5
- New version: v2.4.6
- Version type: patch stable
- Reason for version bump: small public-facing layout fix across the shared hero component with no route or content restructure

### Validation

- Checks run: shared CSS inspection, local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: homepage and representative inner-page hero spacing review, footer required link review, footer version alignment review, APES Newsroom route review and changelog synchronisation review
- Known limitations: final browser QA depends on local rendered output spot checks rather than opening every exported route individually
- Rollback notes: restore the previous shared CSS and release metadata, then re-export the static HTML snapshots if needed
