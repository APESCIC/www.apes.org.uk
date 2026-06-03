## [v1.1.0b] - 2026-06-03

<span class="pill pill-version">Version v1.1.0b</span>
<span class="pill pill-status">Beta</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-compliance">Compliance</span>

### Summary

Updated the APES CIC website to use the approved logo pack, shelter-style footer, wider 90%-screen layout, descriptive mega menus, and a sponsor page that recognises software and service support.

### Detailed changes

- Replaced the text-only brand mark with the approved APES logo pack, including favicon, manifest and social-sharing assets.
- Expanded the shared desktop layout to approximately 90% of the viewport width while preserving comfortable padding and responsive mobile collapse rules.
- Reworked the global navigation into descriptive mega menus for Services, Support APES and Information, while keeping APES Newsroom as the primary news destination.
- Redesigned the footer to follow the APES Shelter full-footer pattern with four columns, direct governance links, a visible Change Log Hub reference and a partnership strip.
- Upgraded the Sponsors page to feature Zoho, Shopify, Akamai and cPanel with logos, descriptions, external links and plain-English summaries of how they help APES.

### Affected areas

- Website: www.apes.org.uk
- Page or route: shared site-wide header, footer, sponsors page, change-log page and release metadata
- Files changed: shared PHP templates, shared site data, CSS, JS, root VERSION, root CHANGELOG, favicons and sponsor or partner logo assets
- User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors
- Public impact: clearer navigation, stronger branding, improved sponsor visibility, and a more connected footer and partnership presentation
- Internal impact: canonical versioning now lives in a root VERSION file and release records are synchronised across public and repository changelogs

### Version decision

- Previous version: v1.0.0b
- New version: v1.1.0b
- Version type: minor beta
- Reason for version bump: public-facing feature additions across branding, layout, footer, sponsor content and navigation

### Validation

- Checks run: local PHP syntax checks, footer-link review, navigation review, sponsor-route review, and manual brand and layout checks
- Manual checks completed: header logo usage, mega-menu descriptions, footer required links, partnership strip, sponsor page content, APES Newsroom routing and version display alignment
- Known limitations: sponsor descriptions are based on the supplied logo set and may need later editorial expansion if APES wants fuller recognition copy
- Rollback notes: redeploy previous public bundle or restore prior Cloudron backup before cutover
