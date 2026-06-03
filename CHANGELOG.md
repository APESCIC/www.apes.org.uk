# Change Log Hub

Track every major release for this website, including updates, fixes, compliance changes, and user-facing improvements.

## [v2.8.0] - 2026-06-04

<span class="pill pill-version">Version v2.8.0</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Added</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-compliance">Compliance</span>
<span class="pill pill-accessibility">Accessibility</span>

### Summary

Completed the APES launch SEO and production-cutover pass by tightening shared metadata and JSON-LD, redirecting legacy main-site news URLs into APES Newsroom, and hardening robots, sitemap and error-page handling for Cloudron LAMP.

### Detailed changes

- Added shared robots-meta support plus Organization, WebSite and breadcrumb JSON-LD through the PHP renderer while keeping `https://www.apes.org.uk` as the only canonical host in shared metadata output.
- Reworked the `/news/` page into a pure APES Newsroom handoff, removed local news-post and tag pages from the shared page model, and mapped each legacy `/news/post/...` and `/news/tag/...` route to an exact one-hop APES Newsroom successor URL in Apache.
- Disabled the production development notice, blocked public access to technical `/includes/`, `/outputs/` and `/scripts/` paths, and added branded `403.html` and `500.html` companions alongside the updated `404.html` experience.
- Regenerated the static HTML snapshots, refreshed `robots.txt` and `sitemap.xml`, synchronised the canonical version to `v2.8.0`, and updated the APES release, inventory, content-audit and redirect records for launch.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared PHP rendering, `/news/`, `/search/`, error pages, Apache routing, `robots.txt`, `sitemap.xml`, Change Log Hub, root and public release records, and regenerated static HTML snapshots
- Files changed: shared PHP rendering, shared site data, `.htaccess`, `robots.txt`, `sitemap.xml`, VERSION files, README, changelog records, documentation records and regenerated static HTML snapshots
- User groups affected: supporters, donors, volunteers, staff, partners and general public visitors
- Public impact: visitors now get cleaner canonical metadata, proper APES Newsroom routing for legacy news URLs, production-ready search indexing, and branded error handling with clearer recovery routes
- Internal impact: launch SEO rules, redirect mappings, sitemap truth and error-page handling now live in the shared source of truth and Cloudron-facing Apache configuration

### Version decision

- Previous version: v2.7.0
- New version: v2.8.0
- Version type: minor stable
- Reason for version bump: site-wide SEO, routing, error-handling and production-launch behaviour changes without a breaking public-domain move

### Validation

- Checks run: local PHP syntax checks, static HTML export, sitemap regeneration, generated HTML inspection and redirect/error-route review
- Manual checks completed: canonical metadata review, APES Newsroom redirect review, footer required-link review, search indexability review, robots/sitemap review, error-page review and changelog/version synchronisation review
- Known limitations: live Cloudron staging verification, Apache status-code confirmation in the deployed app and Google Search Console submission still require post-deploy checks outside this repo-only implementation pass
- Rollback notes: restore the previous shared PHP, site data, Apache config, robots/sitemap files, version files and release records, then re-export the static HTML snapshots if the launch SEO cutover needs to be reversed

## [v2.7.0] - 2026-06-04

<span class="pill pill-version">Version v2.7.0</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Added</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Added a site-wide development notice popup and persistent header message, then rebalanced the shared APES footer so every footer-card link now renders as a clearer tile-style action.

### Detailed changes

- Added a persistent development notice band near the top of the shared header and a first-open popup that explains some links and features are still in development while directing visitors to live chat for fast help.
- Wired the notice actions into the existing Chatwoot widget with a safe contact-page fallback, session-based dismissal, keyboard-accessible dialog behaviour and focus return on close.
- Redistributed the four APES footer cards into more balanced groups and made every footer-card link render as a visible tile without removing the required donation, Privacy Policy, Terms of Service, Change Log Hub or intranet routes.
- Preserved APES Newsroom routing, APES CIC identity and footer compliance rules, then synchronised the canonical version plus release records to v2.7.0 before regenerating the static HTML snapshots.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared header, shared footer, shared site data, shared CSS, shared JS, Change Log Hub, footer version display, root and public release records, and regenerated static HTML snapshots
- Files changed: shared PHP rendering, shared site data, shared CSS, shared JS, VERSION, public VERSION, root CHANGELOG, public CHANGELOG, README and regenerated static HTML snapshots
- User groups affected: supporters, donors, volunteers, staff, partners and general public visitors
- Public impact: visitors now see a clear development notice, get a direct route into live chat, and can use a more balanced, button-led footer across the public site
- Internal impact: the shared shell now holds the development-notice copy and behaviour in one place, and the footer grouping is easier to maintain without route-level edits

### Version decision

- Previous version: v2.6.4
- New version: v2.7.0
- Version type: minor stable
- Reason for version bump: site-wide public messaging and shared-shell footer behaviour additions without a breaking route restructure

### Validation

- Checks run: local PHP syntax checks, shared CSS and JS review, static HTML export and generated HTML inspection
- Manual checks completed: header notice review, popup/session behaviour review, footer required link and intranet attribute review, footer version alignment review, APES Newsroom route review and changelog/version synchronisation review
- Known limitations: deployed FTP validation and live browser confirmation still require a post-push check outside this repo-only implementation pass
- Rollback notes: restore the previous shared PHP, site data, CSS, JS, version files and release records, then re-export the static HTML snapshots if the notice or footer rollout needs to be reversed

## [v2.6.4] - 2026-06-03

<span class="pill pill-version">Version v2.6.4</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>

### Summary

Centred the shared APES sidebar logo card more explicitly through the shared stylesheet so the feature logo sits consistently within its support panel across the public website.

### Detailed changes

- Updated the shared `.brand-feature-panel` styling so the sidebar card, `<picture>` wrapper and logo image all centre explicitly without changing the shared sidebar markup.
- Kept the existing responsive logo sizing and card spacing while preventing route-level drift for the logo card across all pages that inherit the shared sidebar.
- Preserved the APES column-card footer, required donation, Privacy Policy, Terms of Service and Change Log Hub links, left APES Newsroom routing unchanged, and synchronised the canonical version plus release records to v2.6.4.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared sidebar logo card, shared CSS, Change Log Hub, footer version display, root and public release records, and regenerated static HTML snapshots
- Files changed: shared CSS, shared release data, VERSION, public VERSION, root CHANGELOG, public CHANGELOG, README and regenerated static HTML snapshots
- User groups affected: supporters, donors, volunteers, staff, partners and general public visitors
- Public impact: visitors now see the APES feature logo centred more cleanly within the shared sidebar card across the public site
- Internal impact: the shared sidebar logo card now has clearer centring rules in the main stylesheet, reducing the chance of route-specific visual drift

### Version decision

- Previous version: v2.6.3
- New version: v2.6.4
- Version type: patch stable
- Reason for version bump: low-risk public-facing layout fix to the shared sidebar logo presentation without a breaking restructure or route change

### Validation

- Checks run: shared CSS review, shared PHP data review, static HTML export and generated HTML inspection
- Manual checks completed: homepage, inner-page, Change Log Hub and 404 sidebar logo review; footer required link review; APES Newsroom route review; and changelog/version alignment review
- Known limitations: deployed FTP validation and live browser confirmation still require a post-push check outside this repo-only implementation pass
- Rollback notes: restore the previous shared CSS, version files and release records, then re-export the static HTML snapshots if the logo-card alignment change needs to be reversed

## [v2.6.3] - 2026-06-03

<span class="pill pill-version">Version v2.6.3</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Added</span>
<span class="pill pill-type">Changed</span>

### Summary

Added the requested site-wide messaging, donation and support embeds through the shared shell, while keeping the APES footer layout, required footer links and release records aligned to a new stable patch version.

### Detailed changes

- Added OneSignal, Hello Bar and Mastodon `rel="me"` verification links through the shared document shell so the integrations load centrally across the public website.
- Added a site-wide Donorbox sticky popup widget through the shared body shell, keeping the existing Donate page content and support routes unchanged.
- Consolidated the footer-side third-party integrations into one Facebook SDK loader with app ID `670420541399530` and one Chatwoot loader for the APES workspace, avoiding the duplicated legacy Facebook snippets from the supplied markup.
- Preserved the APES column-card footer, required donation, Privacy Policy, Terms of Service and Change Log Hub links, left APES Newsroom routing unchanged, and synchronised the canonical version plus release records to v2.6.3.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared document head, shared body shell, shared footer, Change Log Hub, footer version display, root and public release records, and regenerated static HTML snapshots
- Files changed: shared PHP rendering, shared footer output, VERSION, public VERSION, root CHANGELOG, public CHANGELOG, README and regenerated static HTML snapshots
- User groups affected: supporters, donors, volunteers, staff, partners and general public visitors
- Public impact: visitors now receive the requested site-wide notification, donation, social-verification and support-widget integrations without a visible footer redesign or route change
- Internal impact: shared shell integrations are now centralised in one maintained source of truth, reducing duplication and keeping future release management simpler

### Version decision

- Previous version: v2.6.2
- New version: v2.6.3
- Version type: patch stable
- Reason for version bump: small site-wide public integration additions and shared-shell maintenance improvements without a breaking restructure or URL change

### Validation

- Checks run: shared PHP renderer review, local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: shared head/body/footer embed review, footer required link review, intranet link attribute review, APES Newsroom route review and changelog/version alignment review
- Known limitations: external widget runtime behaviour, live browser confirmation and deployed FTP validation still require a post-push check outside this repo-only implementation pass
- Rollback notes: restore the previous shared renderer, shared footer output, version files and changelog entries, then re-export the static HTML snapshots if the integration rollout needs to be reversed

## [v2.6.2] - 2026-06-03

<span class="pill pill-version">Version v2.6.2</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Added</span>
<span class="pill pill-type">Changed</span>

### Summary

Refreshed the Donate page with stronger area-of-greatest-need messaging, added a Donorbox popup donation button and donor wall, and synchronised the shared release records to the new stable patch version.

### Detailed changes

- Rewrote the Donate page body copy to explain how flexible donations support rescue, rehabilitation, housing, daily welfare costs, education and public support across APES.
- Added the requested Donorbox popup button installer and secure donation button for the approved area-of-greatest-need route, while keeping a standard link fallback if JavaScript or popups are unavailable.
- Added the requested Donorbox donor wall embed inside an APES-styled supporter section so the page shows visible community backing without changing the wider site architecture.
- Added shared styling for the Donorbox donation section and embed, preserved the required footer links and version display, kept APES Newsroom routing unchanged, and synchronised the canonical version plus changelog records to v2.6.2.

### Affected areas

- Website: www.apes.org.uk
- Page or route: Donate page, shared CSS, Change Log Hub, footer version display and regenerated static HTML snapshots
- Files changed: shared site data, shared CSS, VERSION, public VERSION, root CHANGELOG, public CHANGELOG, README and regenerated static HTML snapshots
- User groups affected: supporters, donors, volunteers, staff, partners and general public visitors
- Public impact: visitors now get clearer donation messaging, a popup donation flow and visible donor-wall engagement on the main Donate page
- Internal impact: the APES donation journey now has a clearer shared content source and release record for future fundraising updates

### Version decision

- Previous version: v2.6.1
- New version: v2.6.2
- Version type: patch stable
- Reason for version bump: public-facing donation content and embed improvements without a breaking restructure or route change

### Validation

- Checks run: shared PHP and CSS inspection, local PHP syntax checks, static HTML export and generated HTML inspection
- Manual checks completed: Donate page copy review, Donorbox popup button presence review, donor wall embed review, footer required link review, APES Newsroom route review and changelog/version alignment review
- Known limitations: popup, external embed behaviour and deployed FTP validation still require a live browser and post-push deployment check outside this repo-only implementation pass
- Rollback notes: restore the previous donate copy, shared CSS, version files and changelog entries, then re-export the static HTML snapshots if the release needs to be reversed

## [v2.6.1] - 2026-06-03

<span class="pill pill-version">Version v2.6.1</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-accessibility">Accessibility</span>

### Summary

Added three popup-enabled booking routes to the Bookings page and regrouped the shared footer so key public, legal and staff routes are easier to scan without changing the wider site architecture.

### Detailed changes

- Added a dedicated three-option booking chooser to the Bookings page for APES Bookings, Shelter and Rescue Bookings, and Pet Care Clinic Bookings, each pointing to the requested workspace appointment form.
- Added shared popup-window launch behaviour in the site JavaScript so the booking routes open in a centred external window when allowed, while preserving a normal new-tab fallback when popups are blocked or JavaScript is unavailable.
- Extended the shared footer data model so footer items can render as standard links, highlighted route tiles or non-link subheadings, then regrouped the footer into clearer About, services, support and policy/update/staff sections.
- Preserved the required donation, Privacy Policy, Terms of Service, Change Log Hub, APES Newsroom and intranet links, kept APES Newsroom routing unchanged, and synchronised the canonical version plus changelog records to v2.6.1.

### Affected areas

- Website: www.apes.org.uk
- Page or route: Bookings, shared footer, Change Log Hub, footer version display and regenerated static HTML snapshots
- Files changed: shared PHP rendering, shared CSS, shared JS, shared site data, VERSION, public VERSION, root CHANGELOG, public CHANGELOG, README and regenerated static HTML snapshots
- User groups affected: service users, supporters, volunteers, staff, partners and general public visitors
- Public impact: visitors can now choose the correct external booking form directly from the Bookings page and scan the shared footer more quickly for core service, legal and intranet routes
- Internal impact: footer presentation intent and popup booking behaviour are now managed centrally so future route and release updates stay aligned

### Version decision

- Previous version: v2.6.0
- New version: v2.6.1
- Version type: patch stable
- Reason for version bump: small public-facing booking and footer usability improvements without a breaking restructure or URL change

### Validation

- Checks run: local PHP syntax checks, shared CSS/JS/PHP inspection, static HTML export and generated HTML inspection
- Manual checks completed: Bookings chooser label and URL review, popup-launch fallback review, desktop and mobile footer grouping review, footer required link review, APES Newsroom route review and changelog/version alignment review
- Known limitations: popup and responsive verification in this environment is based on source and generated-output inspection rather than a full deployed browser pass against Cloudron hosting
- Rollback notes: restore the previous shared footer data, JS, CSS, bookings content, version files and changelog entries, then re-export the static HTML snapshots if the release needs to be reversed

## [v2.6.0] - 2026-06-03

<span class="pill pill-version">Version v2.6.0</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-accessibility">Accessibility</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Added a shared APES image system across key public routes, bringing supportive photography and illustration into the homepage, route-finder, fundraising, bookings, educational and relocation journeys while keeping release, footer and Newsroom rules aligned.

### Detailed changes

- Added six deployable APES image assets plus WebP variants inside the public asset tree and wired them through shared PHP rendering with explicit dimensions, responsive picture markup and lazy loading for non-hero placements.
- Extended the shared renderer and stylesheet so homepage hero media, route-finder illustrations and reusable feature-media sections can be enabled per page without changing public routes, footer links or form behaviour.
- Placed the new visuals on the homepage, Services hub, Bookings, Educational visits, About APES, Fundraising priorities and Help Us Move routes using conservative descriptive copy that supports the public journeys without implying named animals or live case evidence.
- Preserved APES Newsroom routing, the APES column-card footer, required donation, Privacy Policy, Terms of Service and Change Log Hub links, and synchronised the canonical version plus changelog records to v2.6.0.
- Checked for a related GitHub issue and found no explicit linked issue in the current repo context, so issue-update templates were not posted during this implementation pass.

### Affected areas

- Website: www.apes.org.uk
- Page or route: homepage hero and route finder, Services hub, Bookings, Educational visits, About APES, Fundraising priorities, Help Us Move, Change Log Hub, footer version display and regenerated static HTML snapshots
- Files changed: shared PHP rendering, shared CSS, shared site data, VERSION, public VERSION, root CHANGELOG, public CHANGELOG and regenerated static HTML snapshots
- User groups affected: supporters, adopters, service users, volunteers, partners, educators and general public visitors
- Public impact: visitors now see warmer, route-relevant visuals across key public journeys with responsive image delivery and no route or footer-link changes
- Internal impact: reusable image metadata and shared media rendering now support future APES visual placements from a central source of truth

### Version decision

- Previous version: v2.5.0
- New version: v2.6.0
- Version type: minor stable
- Reason for version bump: new public-facing visual content and shared rendering capabilities added across multiple core routes without a breaking restructure

### Validation

- Checks run: local PHP syntax checks, shared CSS/PHP inspection, WebP asset generation, static HTML export and generated HTML inspection
- Manual checks completed: homepage hero and compact route-finder layout review, Services hub route-finder and care-image review, Bookings and Educational visits image stacking review, Fundraising and Help Us Move image placement review, footer required link review, APES Newsroom route review and changelog/version alignment review
- Known limitations: validation in this environment focused on generated output and local inspection rather than a full live-browser comparison on every published route
- Rollback notes: restore the previous shared renderer, shared CSS, image references, version files and changelog entries, then re-export the static HTML snapshots if the image rollout needs to be reversed

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
