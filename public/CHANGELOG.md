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

## [v2.4.5] - 2026-06-03

<span class="pill pill-version">Version v2.4.5</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-type">Removed</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Removed unused plugin-generated export artefacts from the repository, confirmed there were no remaining video-plugin dependencies to remove, and synchronised the stable release record across the website.

### Detailed changes

- Deleted the unreferenced `outputs/moodboards/apes-rebuild` bundle, including generated board assets, runtime configuration, logs and plugin-authored metadata.
- Re-ran repository searches for the removed plugin identifiers and plugin URI patterns to confirm no remaining website references exist.
- Confirmed no live HTML, PHP, CSS or JS routes depended on the removed artefacts before deletion, so no public page structure, navigation, forms or calls to action changed.
- Left APES Newsroom routing, footer structure, required donation, Privacy Policy, Terms of Service and Change Log Hub links, and intranet link rules unchanged while promoting the site back to a stable patch release.
- Regenerated the exported static HTML snapshots and synchronised the canonical version, website Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: Change Log Hub, shared footer version display, release metadata and removed unused repository artefacts
- Files changed: shared site data, VERSION, root CHANGELOG, regenerated static HTML snapshots and deleted unused plugin export files
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: no intended visitor-facing behaviour change; public pages now display the stable v2.4.5 release record and matching footer version
- Internal impact: unused plugin export output has been removed and release metadata no longer points at the previous beta version

### Version decision

- Previous version: v2.4.4b
- New version: v2.4.5
- Version type: patch stable
- Reason for version bump: repository cleanup and release-record synchronisation after removing unused plugin-generated artefacts without changing live route behaviour

### Validation

- Checks run: repository reference search, live-site dependency search, local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: Change Log Hub review, representative footer required link review, APES Newsroom route review and changelog/version alignment review
- Known limitations: staged deployment, remote cache verification and external link monitoring were out of scope for this repo-only implementation pass
- Rollback notes: restore the deleted `outputs/moodboards/apes-rebuild` bundle plus the previous version and changelog entries, then re-export the static HTML snapshots if needed

## [v2.4.4b] - 2026-06-03

<span class="pill pill-version">Version v2.4.4b</span>
<span class="pill pill-status">Beta</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-accessibility">Accessibility</span>

### Summary

Refined the shared homepage hero and mega-menu responsive sizing so desktop layouts feel less oversized while tablet and mobile headers fit more cleanly.

### Detailed changes

- Appended a shared CSS override layer that reduces homepage hero headline scale, desktop navigation spacing, logo sizing and mega-menu density without changing PHP templates, routes or menu copy.
- Narrowed the desktop mega-menu panel width and reduced the heading, description, pill, badge and link typography so Information, Services and Support APES feel more compact on large viewports.
- Added tighter tablet and mobile refinements for the top bar, social icons, branding block, menu button and hero copy so smaller screens fit cleanly without overlap.
- Left APES Newsroom routing, footer structure, required donation, Privacy Policy, Terms of Service and Change Log Hub links, and intranet link rules unchanged.
- Regenerated the exported static HTML snapshots and synchronised the canonical version, website Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared homepage hero, shared header navigation, Change Log Hub and regenerated static HTML snapshots
- Files changed: shared CSS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: visitors now see a smaller homepage hero and denser shared mega menus across desktop, tablet and mobile widths
- Internal impact: responsive hero and navigation sizing now come from a final shared CSS override layer

### Version decision

- Previous version: v2.4.3
- New version: v2.4.4b
- Version type: patch beta
- Reason for version bump: small public-facing responsive sizing refinement released as a beta patch without route, template or content restructuring

### Validation

- Checks run: shared CSS inspection, local PHP syntax checks, static HTML export, generated HTML inspection and local browser responsive verification
- Manual checks completed: homepage hero review, Information/Services/Support APES mega-menu review at 1920px, 1440px, 1024px, 768px and 390px, footer required link review, APES Newsroom route review and changelog/version alignment review
- Known limitations: staged Cloudron deployment and asset-cache verification were out of scope for this repo-only implementation pass
- Rollback notes: restore the previous shared CSS and release metadata, then re-export the static HTML snapshots if needed

## [v2.4.3] - 2026-06-03

<span class="pill pill-version">Version v2.4.3</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-accessibility">Accessibility</span>

### Summary

Widened the shared APES desktop mega menus and removed horizontal panel scrolling so navigation cards fit more comfortably on normal desktop viewports.

### Detailed changes

- Increased the shared mega-menu desktop width cap so Services, Support APES and Information open as wider centred panels without changing routes, labels or menu structure.
- Added shared `border-box` sizing to the mega-menu panel so panel padding stays inside the declared width and no longer triggers avoidable horizontal overflow.
- Kept the existing fixed-position desktop behaviour, mobile full-width panel behaviour and vertical overflow fallback while restricting desktop panel scrolling to the y-axis.
- Left APES Newsroom routing, footer structure and the required donation, Privacy Policy, Terms of Service and Change Log Hub links unchanged.
- Regenerated the exported static HTML snapshots and synchronised the canonical version, website Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared header navigation, homepage, content routes, Change Log Hub and regenerated static HTML snapshots
- Files changed: shared CSS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: visitors now get wider desktop mega menus with no horizontal scrolling requirement for the shared navigation panels
- Internal impact: shared menu sizing and overflow behaviour now come from a single central CSS rule set

### Version decision

- Previous version: v2.4.2
- New version: v2.4.3
- Version type: patch stable
- Reason for version bump: small public-facing navigation layout correction with no route, content or taxonomy change

### Validation

- Checks run: shared CSS inspection, local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: Services, Support APES and Information menu width review, footer required link review, APES Newsroom route review and changelog/version alignment review
- Known limitations: validation in this environment is based on generated output and code inspection rather than a full interactive browser comparison for every route
- Rollback notes: restore the previous shared CSS, release metadata and version files, then re-export the static HTML snapshots if needed

## [v2.4.2] - 2026-06-03

<span class="pill pill-version">Version v2.4.2</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-accessibility">Accessibility</span>

### Summary

Refreshed the shared APES mega menus to use patterned light panels, per-section colour themes, descriptive headers, quick-topic pills and richer destination cards without changing any routes.

### Detailed changes

- Extended the shared navigation data so Services, Support APES and Information each define their own eyebrow text, heading, supporting description, quick-topic pills, colour theme and destination badge labels.
- Rebuilt the shared mega-menu markup so each panel now shows a richer header area and destination cards with left-hand badge blocks, clearer copy hierarchy and a stronger directional arrow affordance.
- Replaced the old dark tray styling with lighter patterned panels and section-specific APES colour treatments for service routes, supporter journeys and guidance content while keeping responsive single-column behaviour.
- Kept the existing `details` / `summary` navigation pattern, APES Newsroom routing, footer structure and required donation, Privacy Policy, Terms of Service and Change Log Hub links unchanged.
- Regenerated the exported static HTML snapshots and synchronised the canonical version, website Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared header navigation, homepage, content routes, Change Log Hub and regenerated static HTML snapshots
- Files changed: shared header PHP, shared CSS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: visitors now see more descriptive APES-branded mega menus with clearer route grouping, stronger visual hierarchy and section-specific styling
- Internal impact: shared menu presentation now comes from one central data structure and one shared header pattern

### Version decision

- Previous version: v2.4.1
- New version: v2.4.2
- Version type: patch stable
- Reason for version bump: small public-facing navigation redesign with no route or taxonomy change

### Validation

- Checks run: shared CSS and PHP inspection, local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: Services, Support APES and Information menu review, panel theme comparison, mobile single-column navigation review, footer required link review, APES Newsroom route review and changelog/version alignment review
- Known limitations: validation in this environment is based on generated output and code inspection rather than an interactive browser comparison against the supplied screenshot
- Rollback notes: restore the previous shared header, CSS, navigation data, release metadata and version files, then re-export the static HTML snapshots if needed

## [v2.4.1] - 2026-06-03

<span class="pill pill-version">Version v2.4.1</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-accessibility">Accessibility</span>

### Summary

Restyled the shared APES mega menu to use a stronger teal-led panel design and capped desktop layouts at a maximum of three columns without changing any menu destinations.

### Detailed changes

- Updated the shared mega-menu panel styling so desktop navigation better reflects the requested reference direction while staying inside APES teal, mint and off-white brand colours.
- Added shared column logic in the central header so shorter menus render in one or two columns and larger menus expand to no more than three columns.
- Kept the existing `details` / `summary` navigation pattern, APES Newsroom routing, footer structure and required donation, Privacy Policy, Terms of Service and Change Log Hub links unchanged.
- Regenerated the exported static HTML snapshots and synchronised the canonical version, website Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared header navigation, homepage, content routes, Change Log Hub and regenerated static HTML snapshots
- Files changed: shared header PHP, shared CSS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: visitors now see a more structured APES-branded mega menu with clearer card spacing and no desktop panel exceeding three columns
- Internal impact: shared navigation layout rules now scale by menu size from a single source of truth

### Version decision

- Previous version: v2.4.0
- New version: v2.4.1
- Version type: patch stable
- Reason for version bump: small public-facing navigation layout and styling improvement with no route or content change

### Validation

- Checks run: shared CSS and PHP inspection, local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: Services, Support APES and Information menu column review, mobile single-column navigation review, footer required link review, APES Newsroom route review and changelog/version alignment review
- Known limitations: final pixel-level comparison against the unavailable reference screenshot was not possible in this environment, so the implementation follows the requested direction rather than an exact visual clone
- Rollback notes: restore the previous shared header, CSS, release metadata and version files, then re-export the static HTML snapshots if needed

## [v2.4.0] - 2026-06-03

<span class="pill pill-version">Version v2.4.0</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Added</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Added a new Services hub with a shared route finder, replaced placeholder public social links with verified APES channels, strengthened mission and welfare-policy content, and aligned opening-hours, visit and footer guidance across the site.

### Detailed changes

- Created a new public `/services/` hub and shared route-finder component, then reused the same route data on the homepage compact finder and the expanded Services page search and filter interface.
- Updated shared navigation, footer content and breadcrumb routing so the Services hub, mission routes, visit guidance, opening times and welfare policies are easier to find.
- Replaced placeholder header social links with verified `apesorguk` Facebook, Instagram, X, YouTube, Threads and Bluesky profiles, while keeping community-only channels on the Socials page.
- Expanded the mission, ethical rehabilitation, visit, opening-times, volunteer, boarding, educational, therapy, fundraising, sponsor and welfare-policy routes using current repo truth plus review notes where external verification is still needed.
- Kept APES Newsroom as the central public news destination, preserved required footer links and APES CIC identity, and synchronised the canonical version, Change Log Hub and root changelog before re-exporting static HTML snapshots.

### Affected areas

- Website: www.apes.org.uk
- Page or route: homepage, Services hub, bookings, mission routes, visit/opening-times routes, welfare policy routes, socials, footer, header, Change Log Hub and regenerated static HTML snapshots
- Files changed: shared PHP rendering, shared site data, shared CSS, shared JS, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: visitors now have clearer route selection, verified public social channels, stronger welfare-policy visibility and more consistent visit/contact guidance
- Internal impact: shared route-finder and social-profile data now drive multiple public components from one source of truth

### Version decision

- Previous version: v2.3.3
- New version: v2.4.0
- Version type: minor stable
- Reason for version bump: new public routing features, broader content expansion and shared navigation/footer improvements without breaking route removals

### Validation

- Checks run: local PHP syntax checks, static HTML export, shared JS/CSS inspection and generated HTML inspection
- Manual checks completed: homepage route finder, Services hub search/filter output, welfare-policy visibility, footer required links, verified social placement and changelog/version alignment review
- Known limitations: visual QA depends on local rendered inspection in this environment, and some externally hosted service claims remain intentionally conservative until APES approves stronger source text
- Rollback notes: restore the previous shared site data, rendering/CSS/JS changes, version and changelog entries, then re-export the static HTML snapshots if needed

## [v2.3.3] - 2026-06-03

<span class="pill pill-version">Version v2.3.3</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>

### Summary

Adjusted the Change Log Hub hero-side card container so the nested contact and connected service cards sit in from the parent panel edges instead of running flush to the outer shell.

### Detailed changes

- Added internal padding to the shared hero aside and page sidebar container styles so stacked mini-panels keep a visible gutter from the enclosing background card.
- Kept the existing mini-panel markup, APES teal-led branding, footer structure, required legal links and APES Newsroom routing unchanged while applying the spacing fix through shared CSS.
- Bumped the canonical website version and synchronised the release record across the website Change Log Hub and root changelog.
- Regenerated the exported static HTML snapshots so the corrected spacing and footer version display stay aligned across the published site.

### Affected areas

- Website: www.apes.org.uk
- Page or route: Change Log Hub hero aside, homepage shared hero aside pattern, page sidebar pattern and regenerated static HTML snapshots
- Files changed: shared CSS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: aside mini-panels now keep a clearer inset from the parent card edges, improving layout balance and readability
- Internal impact: shared aside container spacing is now consistent anywhere the mini-panel stack pattern is reused

### Version decision

- Previous version: v2.3.2
- New version: v2.3.3
- Version type: patch stable
- Reason for version bump: small public-facing layout correction with no structural, content or URL change

### Validation

- Checks run: shared CSS inspection, local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: Change Log Hub hero aside spacing review, footer required link review, footer version alignment review and changelog synchronisation review
- Known limitations: final visual confirmation in the in-app browser depends on the local rendered route rather than every exported page being opened individually
- Rollback notes: restore the previous shared CSS, version and changelog entries, then re-export the static HTML snapshots if needed

## [v2.3.2] - 2026-06-03

<span class="pill pill-version">Version v2.3.2</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>

### Summary

Corrected broken apostrophe rendering in shared navigation and affected page copy so public text displays cleanly across the exported site.

### Detailed changes

- Replaced corrupted mojibake apostrophes in shared APES content source strings, including the About APES mega-menu description used across the site header.
- Corrected affected public page copy in the pet boarding, animal therapy and staff routes so the same text issue no longer appears in exported page bodies.
- Kept APES branding, footer structure, required legal links and APES Newsroom routing unchanged while applying the text-only fix.
- Regenerated the exported static HTML snapshots and synchronised the canonical version, Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared header navigation, homepage, pet boarding, animal therapy, staff, Change Log Hub and regenerated static HTML snapshots
- Files changed: shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: broken apostrophes now render correctly in shared navigation and affected page copy
- Internal impact: the PHP content source is now clean, so future exports inherit the corrected text consistently

### Version decision

- Previous version: v2.3.1
- New version: v2.3.2
- Version type: patch stable
- Reason for version bump: small public-facing text correction across shared content with no structural or URL change

### Validation

- Checks run: local PHP syntax checks, static HTML export, source text scan and generated HTML inspection
- Manual checks completed: homepage, pet boarding, animal therapy, staff and Change Log Hub output review plus footer version/link alignment review
- Known limitations: browser-based visual QA was unavailable in this session, so validation relied on source inspection and regenerated HTML review
- Rollback notes: restore the previous shared site data, version and changelog entries, then re-export the static HTML snapshots if needed

## [v2.3.1] - 2026-06-03

<span class="pill pill-version">Version v2.3.1</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>

### Summary

Adjusted the homepage spotlight component spacing so the nested mission cards sit in from the parent panel edges and read more clearly across desktop, tablet and mobile layouts.

### Detailed changes

- Updated the shared spotlight grid CSS so nested spotlight cards keep visible inner gutter spacing instead of reading edge-to-edge inside the parent mission panel.
- Kept the existing homepage spotlight markup unchanged and applied the fix through the reusable component classes so any future page using the same pattern inherits the corrected spacing.
- Preserved the existing responsive layout behaviour while keeping the APES teal-led branding, footer structure and APES Newsroom routing unchanged.
- Regenerated the exported static HTML snapshots and synchronised the canonical version, Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: homepage spotlight mission panel, shared spotlight component styling, Change Log Hub and release metadata
- Files changed: shared CSS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: spotlight sub-cards now keep clearer spacing from the parent panel edges, improving readability and visual polish
- Internal impact: shared spotlight component styling now applies the inset consistently wherever the pattern is reused

### Version decision

- Previous version: v2.3.0
- New version: v2.3.1
- Version type: patch stable
- Reason for version bump: small public-facing layout and accessibility polish with no structural or URL change

### Validation

- Checks run: shared CSS inspection, static HTML export and generated HTML inspection
- Manual checks completed: spotlight component usage search, footer required link review, footer version alignment review and Change Log Hub synchronisation review
- Known limitations: in-app browser validation was unavailable in this session, so final verification relied on source inspection and regenerated output review rather than a rendered browser screenshot
- Rollback notes: restore the previous shared CSS, version and changelog entries, then re-export the static HTML snapshots if needed

## [v2.3.0] - 2026-06-03

<span class="pill pill-version">Version v2.3.0</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Added</span>
<span class="pill pill-fix">Fix</span>

### Summary

Added a site-wide breadcrumb trail, kept the shared navigation closed after menu clicks, and corrected the FileZilla deployment target so uploads point at the public site root instead of generated artefacts.

### Detailed changes

- Added a breadcrumb trail above the hero on every non-home page using the shared page metadata and route-aware section labels so nested routes stay readable.
- Kept the menu closed after clicking a navigation item by removing the automatic open state from the shared header while preserving active-section styling.
- Corrected the FileZilla deployment profile so uploads target the website root instead of the nested `outputs/.../.codex-exec/...` path and do not keep queueing non-public artefacts.
- Regenerated the exported static HTML snapshots and synchronised the canonical version, Change Log Hub and root changelog.

### Affected areas

- Website: www.apes.org.uk
- Page or route: homepage, all non-home pages, nested service and policy routes, legacy news routes, Change Log Hub and shared release metadata
- Files changed: shared PHP rendering, shared CSS, shared site data, VERSION, root CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: visitors now get an immediate sense of location on the site, and menu navigation closes more predictably after selection
- Internal impact: the shared navigation state is simpler and the deployment profile no longer points uploads at generated preflight artefacts

### Version decision

- Previous version: v2.2.1
- New version: v2.3.0
- Version type: minor stable
- Reason for version bump: new breadcrumb navigation and shared navigation/deployment corrections without URL restructuring

### Validation

- Checks run: local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: breadcrumb placement on representative routes, menu close behaviour, Change Log Hub hero and footer version/link review, FileZilla queue target inspection
- Known limitations: FileZilla upload verification is based on profile inspection in this environment rather than an interactive FTP session
- Rollback notes: restore the previous shared PHP, CSS, version and changelog entries, then re-export the static HTML snapshots if needed

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
