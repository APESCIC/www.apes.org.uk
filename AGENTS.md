# AGENTS.md

# APES CIC Website Working Instructions

These instructions apply to all APES CIC website repositories, website exports, public web pages, intranet pages, microsites, static websites, documentation sites, portal front ends, and any related website code owned or maintained by the Association of Protecting Exotic Species CIC.

Codex and other AI coding agents must follow these instructions before, during, and after making any website change.

---

## 1. Primary rule

Every website update must be planned, versioned, recorded, validated, checked against APES brand standards, checked against APES Newsroom routing rules where relevant, checked against the APES universal footer standard, and reflected in relevant GitHub Issues.

Agents must not complete website work without checking whether the following are required:

1. A website Change Log Hub page update.
2. A root-level `CHANGELOG.md` update.
3. A canonical version update.
4. A GitHub Issue start, progress, or completion update.
5. An APES website brand and feature standards review.
6. An APES Newsroom routing check for any news, update, announcement, newsletter, footer, navigation, or article-related change.
7. An APES universal footer compliance check.
8. A footer link check for the website donation page, Privacy Policy page, Terms of Service page and Change Log Hub.
9. A root-level `README.md` update describing the change, release impact and any operational notes.
10. A `/public/CHANGELOG.md` update where the repository has a `/public/` folder, so public website release records match the root changelog.

A changelog entry is required when the work changes public website content, intranet website content, page structure, forms, buttons, links, menus, navigation, CTAs, styling, layout, themes, branding, visual assets, accessibility, SEO, analytics, tracking, CRM, automation, embedded tools, third-party integrations, scripts, widgets, site configuration, build configuration, deployment configuration, generated website output, security, privacy, safeguarding, legal, compliance, finance, governance, HR, animal welfare content, or any user-visible bug fix.

If there is any uncertainty, assume a changelog entry is required.

---

## 2. Repository structure and website storage

The website is stored in the root-level `/public/` folder.

Agents must treat `/public/` as the website source and deployment content folder unless repository-specific documentation clearly states otherwise.

Do not move website files out of `/public/` without explicit instruction.

---

## 3. APES website brand and feature standards

Apply APES CIC website branding and feature standards to all APES websites and future website work.

These standards apply to:

* `apes.org.uk`
* `apesshelter.org.uk`
* `apespetcare.org.uk`
* APES Newsroom
* CareBase and help or knowledge sites
* APES intranet pages where the same public-facing design pattern is reused
* Future websites, division websites, campaign sites, service sites, portals and microsites

### Brand operating model

APES websites must feel like one connected ecosystem:

* `apes.org.uk` is the parent APES CIC organisation gateway.
* `apesshelter.org.uk` is the Shelter & Rescue service website.
* `apespetcare.org.uk` is the Pet Care Clinic service website.
* APES Newsroom is the central public news destination.
* Future sites must inherit the APES master brand unless a separate brand decision has been formally approved.

### Brand principles

Preserve these principles:

* Recognisable first: every APES site should immediately feel part of the same organisation.
* Teal-led, not colour-cluttered: teal is the repeated APES master brand colour.
* Welfare before sales: donation, sponsorship, booking, shop and service journeys must still communicate animal welfare, trust, accountability and operational competence.
* Plain-language confidence: headings must be direct, active and practical.
* Consistent components: buttons, cards, hubs, filters, alerts, forms, footers, policy links, help routes and CTAs must follow shared patterns.
* Accessible by default: colour contrast, keyboard navigation, readable text sizes, visible focus states and plain language are brand requirements.

### APES colour system

Use these APES website colour tokens unless the website already has approved equivalent variables.

```css
:root {
  --apes-primary-teal: #008C8C;
  --apes-deep-teal: #005F5F;
  --apes-soft-mint: #DDF3EF;
  --apes-leaf-green: #2E7D32;
  --apes-rescue-sage: #A7C957;
  --apes-petcare-aqua: #26B6C8;
  --apes-warm-sand: #F2E9D8;
  --apes-charcoal: #263238;
  --apes-off-white: #F7FAF9;
  --apes-alert-amber: #F9A825;
  --apes-donation-coral: #E76F51;
}
```

Required usage:

| Colour | Hex | Required use |
|---|---:|---|
| Primary Teal | `#008C8C` | Main APES brand colour. Use for primary buttons, headings, navigation highlights, key icons and section accents. |
| Deep Teal | `#005F5F` | Header/footer backgrounds, high-emphasis text, hover states, governance panels and serious trust content. |
| Soft Mint | `#DDF3EF` | Panels, page callouts, form backgrounds and gentle emphasis areas. |
| Leaf Green | `#2E7D32` | Welfare, sustainability, positive status, success states and safe or approved messages. |
| Rescue Sage | `#A7C957` | Shelter, rescue, rehabilitation and animal-care accents. |
| Pet Care Aqua | `#26B6C8` | Clinic, pet-care, animal health, booking and care-service accents. |
| Warm Sand | `#F2E9D8` | Advice panels, adoption guidance, care notes and non-urgent education. |
| Charcoal | `#263238` | Main body text. Use instead of pure black. |
| Off White | `#F7FAF9` | Primary page or card background where white feels too stark. |
| Alert Amber | `#F9A825` | Warnings, urgent but non-critical notices and attention prompts. |
| Donation Coral | `#E76F51` | Donation, urgent appeal and fundraising accents only. |

### Typography and content style

* Use a modern, clear sans-serif.
* Body text must be readable and no smaller than 16px equivalent on websites.
* Tone must be professional, compassionate, non-judgemental, practical and operationally competent.
* Use sentence case for headings and buttons unless a formal service name requires title case.
* Avoid internal jargon where the public user needs a simple action.
* Remove placeholder and generic template copy before live publication.

---

## 4. Universal website footer standard

All APES websites, division websites, microsites, intranet pages and website templates must use a consistent green APES footer pattern. The footer is a brand, governance, compliance, donation and release-record component. It must not be treated as decorative or optional.

This standard is based on the approved footer examples shown in the APES Contact Centre, APES Intranet, APES Shelter & Rescue and APES Pet Care Clinic reference screenshots.

### Footer layout requirement

All APES website footers must use a column card footer format.

The required visual pattern is:

* A deep green or deep teal footer wrapper.
* A visible grid of separate rounded cards inside the footer.
* Each footer card must act as one column group with its own heading, spacing, border, internal content and links.
* Cards must use APES-compatible green or teal tones with sufficient contrast against the outer footer background.
* The card grid must be responsive: four columns on wide screens where space allows, two columns on medium screens, and one column on mobile.
* The lower footer bar must sit below the card grid and contain copyright, CIC identity, website name, version and a visible Change Log Hub link.

Do not use a plain unboxed multi-column footer, a single text block footer, a loose link list footer, or a generic platform footer unless it is restyled into the APES column card format.

Use one of these approved footer layouts, depending on site size and audience:

1. **Full column card footer layout** for large websites, portals, intranets and sites with multiple user journeys.
2. **Compact column card footer layout** for smaller division websites, service websites and landing sites.

Both layouts must use a deep green or deep teal background and APES-compatible typography, spacing, link styling and contrast. Footer links must be keyboard accessible, visibly focusable and readable against the footer background.

### Required footer card styling

Use this pattern unless the website already has equivalent APES footer variables:

```css
.apes-footer {
  background: linear-gradient(180deg, #165F58 0%, #005F5F 100%);
  color: #FFFFFF;
  border-radius: 18px 18px 0 0;
  padding: 1.5rem;
}

.apes-footer__grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 1rem;
}

.apes-footer__card {
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 12px;
  padding: 1rem;
}

.apes-footer__card h2,
.apes-footer__card h3 {
  color: #FFFFFF;
  margin-top: 0;
}

.apes-footer__card a,
.apes-footer__bar a {
  color: #FFFFFF;
  font-weight: 700;
  text-decoration: underline;
  text-underline-offset: 0.18em;
}

.apes-footer__card a:focus-visible,
.apes-footer__bar a:focus-visible {
  outline: 3px solid #DDF3EF;
  outline-offset: 3px;
}

.apes-footer__bar {
  border-top: 1px solid rgba(255, 255, 255, 0.18);
  margin-top: 1rem;
  padding-top: 1rem;
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem 1rem;
  justify-content: space-between;
}

@media (max-width: 960px) {
  .apes-footer__grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

@media (max-width: 640px) {
  .apes-footer__grid {
    grid-template-columns: 1fr;
  }
}
```

Equivalent class names may be used where required by the website framework, but the rendered footer must match this column card pattern.

### Full column card footer layout

Use the full column card footer where the website has enough routes or support pathways to justify multiple cards.

Required card structure:

* **About card**
  * Website, organisation or division name.
  * Short plain-English summary of what the website supports.
  * Parent organisation name where relevant.
  * Registered office or contact details where relevant.
  * Website version badge or text.
* **Contact routes or quick links card**
  * Main user journey links.
  * Dashboard, apps hub, route finder, forms hub, service hub or equivalent where relevant.
  * Change Log Hub link where it is not only shown in the lower footer bar.
* **Connected APES websites, forms and support card**
  * Key support forms.
  * Incident, safeguarding, technical support, contact or escalation links where relevant.
  * Connected APES website links where relevant.
* **Legal and governance card**
  * Donate link.
  * Privacy Policy link.
  * Terms of Service link.
  * Cookie Guidance or Cookie Policy link where relevant.
  * Staff, volunteer and student intranet links where relevant.
  * Owner, review cycle and last reviewed information where relevant.

A lower footer bar must then show copyright, legal identity, website name, version and Change Log Hub link where space allows.

### Compact column card footer layout

Use the compact column card footer where the website has fewer routes but still needs brand, legal, donation and release information.

Required card structure:

* **About card** containing website or division name, short description of the website purpose, physical address where relevant, contact details where relevant, partnership, sponsor or trusted organisation badges where relevant, and website version.
* **Help and support card** containing essential help links such as Contact page, Open a ticket, Account or Support Hub where relevant.
* **Support APES card** containing Donate, Sponsorship Hub or relevant fundraising route where relevant.
* **Legal and governance card** containing Privacy Policy, Terms of Service, Cookie Policy or Cookie Guidance, staff access and Change Log Hub.

The compact layout may use two, three or four cards depending on content volume, but it must still use the card-based column structure.

### Required footer identity format

Every footer must identify the legal or operating organisation clearly.

Use this model for APES CIC organisation websites:

```txt
© YYYY Association of Protecting Exotic Species CIC · CIC No: 16253848 · Website Name · v0.0.0
```

Use this model for APES division or service websites:

```txt
© YYYY Association of Protecting Exotic Species CIC · CIC No: 16253848 · Division or Website Name · v0.0.0
```

Use this model where a service website needs an explicit parent organisation statement:

```txt
Part of Association of Protecting Exotic Species CIC.
Website version: Website Name v0.0.0 · Change Log Hub
```

Use `CIC No: 16253848` exactly unless the organisation record is formally changed. Do not omit the CIC number from public-facing APES CIC or division website footers.

### Required footer links

Every APES website footer must always include working links to:

* The website donation page.
* The Privacy Policy page.
* The Terms of Service page.
* The Change Log Hub page.
* Staff, volunteer and student intranet links pointing to `https://intranet.apes.org.uk`.

Staff, volunteer and student intranet footer links must open in a new tab and use nofollow rules. Use `target="_blank"` and `rel="nofollow noopener noreferrer"` on each intranet link.

Where a site uses a policies hub, the footer may link to the policies hub as an additional route, but it must still provide direct footer access to Privacy Policy and Terms of Service unless there is a documented reason not to.

The donation link must point to the current donation page for the specific website or division where one exists. If the division does not have a specific donation page, link to the approved APES parent donation route.

### Change Log Hub footer rule

The Change Log Hub must always be linked from the footer of every APES website.

Preferred labels:

* `Change Log Hub`
* `Website version: Website Name v0.0.0 · Change Log Hub`
* `Website Name · v0.0.0 · Change Log Hub`

Do not hide the Change Log Hub only in developer documentation, repository files, comments, release notes or an unlinked route. It must be reachable from the rendered website footer.

### Footer version rule

Every footer must display the current website version using the canonical APES version format.

Accepted examples:

```txt
v0.0.10 Beta
v0.5.1b
APES Pet Care Clinic v0.5.1b
```

The displayed footer version must match the root repository canonical version file and the current Change Log Hub entry.

### Footer content rules

Footer content must be site-specific and must not be left as generic template copy.

Required checks:

* Use the correct website name.
* Use the correct division or organisation name.
* Use the parent organisation name where the site is part of APES CIC.
* Use the APES CIC number where the website represents APES CIC or a division of APES CIC.
* Use the correct current website version.
* Link the version or nearby text to the Change Log Hub where the design allows.
* Include donation, Privacy Policy and Terms of Service links.
* Include staff, volunteer and student intranet links with `target="_blank"` and `rel="nofollow noopener noreferrer"`.
* Keep support and governance links accurate for that specific website.
* Use UK English throughout.

### Footer accessibility and compliance checks

Before completing any website change that touches the footer, navigation, legal pages, versioning, changelog, donation routes or policies, validate that:

* Footer colour contrast is sufficient.
* Footer links are keyboard reachable and have visible focus states.
* Link text is descriptive without relying only on colour.
* Footer card headings correctly describe their content groups.
* Footer cards stack cleanly on mobile without clipped text, overflow or hidden links.
* Donation, Privacy Policy, Terms of Service and Change Log Hub links return successful pages.
* Staff, volunteer and student intranet links open in a new tab, use nofollow rules and point to `https://intranet.apes.org.uk`.
* The displayed version matches the canonical version source of truth.
* Copyright year is current.
* The CIC number is present and accurate where required.
* Footer layout remains usable on mobile.

---

## 5. Central Newsroom and news routing standard

APES Newsroom must be treated as the single public destination for news, announcements and updates from APES CIC and all operating divisions.

Individual websites may introduce news in context, but the full article, archive, subscription journey and cross-division discovery experience should sit on `https://www.apesnews.org.uk/`.

Required behaviour:

* Main APES website news navigation should route users to APES Newsroom.
* Shelter & Rescue website news navigation should route users to the Shelter & Rescue context in APES Newsroom.
* Pet Care Clinic website news navigation should route users to the Pet Care Clinic context in APES Newsroom.
* Footer news, newsletter prompts and update CTAs should point to APES Newsroom or its subscription route.
* Legacy `/news/` pages should act as short landing pages that direct visitors to APES Newsroom.

Reusable copy block:

```txt
News and updates from APES CIC and our services are now published through APES Newsroom. Visit APES Newsroom to read the latest organisation updates, Shelter & Rescue news, Pet Care Clinic updates, service notices, appeals and guidance from across the APES network.
```

---

## 6. Planning requirement

At the start of planning, confirm the type of update being worked on.

Determine:

1. Is this a major, minor or patch update?
2. Is this a beta update?
3. Is the update public-facing, internal-only or operational?
4. Which website, page, route, component, form or integration is affected?
5. Does the update affect compliance, safeguarding, accessibility, donations, finance, legal, governance, HR or animal welfare content?
6. Should the Change Log Hub entry be public, internal or both?
7. Does the work comply with APES website brand and feature standards?
8. Does the work affect APES Newsroom routing, news links, newsletter prompts, footer links, navigation or article metadata?
9. Does the work comply with the APES universal footer standard?
10. Are donation, Privacy Policy, Terms of Service and Change Log Hub links present in the footer?
11. Is there a related GitHub Issue?
12. Should the GitHub Issue be updated at the start, during progress and at completion?
13. Does the root `README.md` need updating to describe the change and release impact?
14. Does `/public/CHANGELOG.md` need creating or updating to mirror the root changelog for deployed website records?

If the user has not confirmed the update type, ask:

```txt
Before I make the website change, please confirm the update type: major, minor, or patch. Also confirm whether this is beta, meaning the version should end in b.
```

If the task must proceed without confirmation, make a conservative decision and state the assumption clearly before editing.

Default assumptions:

* Use `patch` for small corrections and fixes.
* Use `minor` for new pages, new content sections, new forms, new workflows or new integrations.
* Use `major` only for substantial redesigns, breaking changes, migrations, URL restructuring or high-risk structural changes.
* Use stable, not beta, unless the user says it is beta, staging, preview, trial, soft launch or not final.

---

## 7. Version numbering standard

All APES CIC website versions must start with `v`.

Stable format:

```txt
vmajor.minor.patch
```

Beta format:

```txt
vmajor.minor.patchb
```

Examples:

```txt
v1.4.2
v1.4.2b
```

Unsupported formats include `1.4.2`, `1.4.2b`, `v1.4.2-beta`, `v1.4.2.beta`, `v1.4.2-b`, `v.1.4.2` and `version 1.4.2`.

### Version source of truth

Identify the canonical website version before changing it. Look in this order at the root of the repository only:

1. `VERSION`
2. `version.txt`
3. `version.json`
4. `package.json`
5. `CHANGELOG.md`
6. Any documented website release metadata file stored at the root of the repository

If no version file exists at the root of the repository, create a root-level `VERSION` file. The `VERSION` file must contain only the version number, including the mandatory `v` prefix.

Do not treat version files inside `/public/` or nested website export folders as the canonical version source. If deployed website files also contain a visible or exported version, update those copies so they match the root canonical version, but the root repository version remains the source of truth.

### Version bump rules

* **Major:** substantial, breaking, structural, high-risk or materially changes how the website works.
* **Minor:** adds or materially improves functionality or public content without a breaking restructure.
* **Patch:** fixes, corrections, small improvements or low-risk updates.

When a beta becomes stable, remove the trailing `b` without changing the version numbers unless further work has been added.

---

## 8. Change Log Hub and changelog system requirement

All APES websites must have both:

1. A Change Log Hub page on the website being worked on.
2. A root-level `CHANGELOG.md` file in the repository.
3. A `/public/CHANGELOG.md` file where the repository has a `/public/` folder.
4. A root-level `README.md` file that is kept current with the latest material changes, version, release notes or operational update notes.

These are separate requirements and all must be maintained where applicable.

### Website Change Log Hub page

Look for an existing page or route named `change-log`, `changelog`, `change-log-hub`, `updates`, `release-notes` or `site-updates`.

Preferred title:

```txt
Change Log Hub
```

If no page exists, create one using the website's routing conventions. Link it from an appropriate website location unless the user confirms it should remain unlisted. The footer must always include a Change Log Hub link.

### Repository `CHANGELOG.md`

Create or update a root-level `CHANGELOG.md` file. It must contain the same release version, date, type pills, summary, detailed changes, affected areas, validation notes and rollback notes as the website Change Log Hub page.

### Public website export `CHANGELOG.md`

Where a repository has a `/public/` folder, create or update `/public/CHANGELOG.md` as well as the root-level `CHANGELOG.md`. The `/public/CHANGELOG.md` file must mirror the current root-level release entry so deployed/exported website files carry the same release record.

If `/public/CHANGELOG.md` intentionally contains additional deployment-specific notes, preserve those notes, but the latest release version, release date, summary, detailed changes and validation notes must still match the root-level `CHANGELOG.md`.

### Repository `README.md`

Create or update the root-level `README.md` whenever website work changes repository behaviour, public content, deployment output, operational notes, release records, versioning, setup steps, user journeys, compliance notes, known limitations or validation requirements.

The README update must be narrow and relevant. It should record the current version or release where appropriate, summarise material changes, update affected usage or deployment notes, and remove outdated instructions that conflict with the completed work.

### Synchronisation rule

The website Change Log Hub page, root-level `CHANGELOG.md`, `/public/CHANGELOG.md` where present, root-level `README.md` where release details are recorded, rendered footer version and canonical root version file must stay aligned. The final response must confirm all applicable records show the same version number and release date.

---

## 9. Change Log Hub page design and behaviour

Build and maintain Change Log Hub pages using the APES green themed pattern:

* Green hero/header panel.
* Current version display.
* Version and status pills.
* Timeline panel.
* Search.
* Filters.
* Expand all and collapse all controls.
* Collapsible version cards.

Required page text:

```txt
Change Log Hub
Track every major release for this website, including updates, fixes, compliance changes, and user-facing improvements.
```

Required filters include at least All releases and Current release. Where useful, also add Stable, Beta, Added, Changed, Fixed, Removed, Security, Compliance, Accessibility, SEO, Forms, Integrations, Public-facing and Internal-only.

Use accessible `<details>` and `<summary>` elements unless the framework has an existing accessible accordion component.

---

## 10. Change Log Hub entry format

Use this structure for each release entry:

```md
## [v0.0.0] - YYYY-MM-DD

<span class="pill pill-version">Version v0.0.0</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>

### Summary

Briefly explain what changed and why.

### Detailed changes

- Describe each material change in plain English.
- Include affected page names, website areas, components, forms or user journeys.
- Include whether the change is public-facing, internal-only or operational.
- Include any compliance, safeguarding, accessibility, governance, donation, finance or animal welfare relevance.

### Affected areas

- Website:
- Page or route:
- Files changed:
- User groups affected:
- Public impact:
- Internal impact:

### Version decision

- Previous version:
- New version:
- Version type:
- Reason for version bump:

### Validation

- Checks run:
- Manual checks completed:
- Known limitations:
- Rollback notes:
```

Use type pills for Added, Changed, Fixed, Removed, Security and Compliance. Use fix pills where a change repairs a problem.

---

## 11. GitHub Issues progress update requirement

Keep relevant GitHub Issues updated when:

* The work was requested from a GitHub Issue.
* A GitHub Issue is linked in the task, branch, pull request, commit message, project board or planning notes.
* The work clearly relates to an existing GitHub Issue.
* A GitHub Issue is created for the work.
* A website update affects release planning, changelog work, versioning, deployment, validation or follow-up actions.

### Start-of-work update

```md
## Work started

Codex has started work on this issue.

### Planned scope

- Website:
- Area affected:
- Planned update type: major / minor / patch
- Release status: stable / beta
- Expected version:
- Change Log Hub update required: yes / no
- Root `CHANGELOG.md` update required: yes / no
- `/public/CHANGELOG.md` update required: yes / no
- Root `README.md` update required: yes / no
- `VERSION` update required: yes / no
- Universal footer compliance check required: yes / no
- Required footer links present: donation / Privacy Policy / Terms of Service / Change Log Hub

### Notes

- Assumptions:
- Risks:
- Confirmation needed:
```

### Progress update

```md
## Progress update

### Completed

-

### In progress

-

### Blockers or risks

-

### Version and changelog status

- Version:
- Change Log Hub page:
- Root `CHANGELOG.md`:
- `/public/CHANGELOG.md`:
- Root `README.md`:
- `VERSION` file:
- Footer compliance:
- Footer required links:
```

### End-of-work update

```md
## Work completed

### Summary

-

### Release details

- Version:
- Release status:
- Update type:

### Changelog and version records

- Change Log Hub page:
- Root `CHANGELOG.md`:
- `/public/CHANGELOG.md`:
- Root `README.md`:
- `VERSION` file:

### Footer, brand and routing records

- APES brand compliance:
- Universal footer compliance:
- Donation page footer link:
- Privacy Policy footer link:
- Terms of Service footer link:
- Change Log Hub footer link:
- APES Newsroom routing:

### Validation

- Automated checks:
- Manual checks:
- Result:

### Files or areas changed

-

### Rollback notes

-

### Follow-up

- Issue status recommendation: close / keep open / needs review
- Remaining actions:
```

Do not close issues unless explicitly instructed or repository workflow clearly permits it.

---

## 12. Required workflow

For every website task:

1. Understand the change and identify website, files, user-visible impact, technical impact, risk level, version bump, beta status, Change Log Hub location, brand impact, footer impact, Newsroom routing impact and related GitHub Issue.
2. Confirm or infer update type and beta status.
3. Make only the required website change. Avoid bulk rewrites, formatting-only churn and unrelated generated-file changes.
4. Update the canonical version file at the root of the repository.
5. Update the website Change Log Hub page, root-level `CHANGELOG.md`, `/public/CHANGELOG.md` where `/public/` exists, and root-level `README.md`.
6. After commit and push to the server via FTP, validate the deployed website by manually uploading or using the project upload flow and checking the uploaded result.
7. Remove all other test types from the completion requirement unless the user explicitly requests them for a specific task.
8. Confirm the footer includes donation, Privacy Policy, Terms of Service and Change Log Hub links.
9. Confirm the footer shows the correct organisation or division name, parent organisation name where relevant, CIC number, website name and version.
10. Confirm the rendered footer version, Change Log Hub, root `CHANGELOG.md`, `/public/CHANGELOG.md`, root `README.md` release details and root canonical version file all align.
11. Post final GitHub Issue update where relevant, then provide a final response covering version, changelog, README, deployed upload validation, brand compliance, footer compliance, Newsroom routing and unresolved risks.

---

## 13. Generated website export rule

Generated files must be treated carefully.

Do not:

* Reformat entire generated HTML, CSS, JS, XML or JSON files.
* Rewrite unrelated generated sections.
* Update platform-generated module versions.
* Update third-party widget versions.
* Update CDN asset versions.
* Change embedded CRM or form scripts unless the task requires it.
* Change generated sitemaps unless the task concerns sitemap, SEO, indexing or URL changes.

Keep diffs narrow, prefer source files over generated output where the source exists, and record generated-output changes clearly in release records.

---

## 14. Commit and pull request guidance

Recommended PR checklist:

```md
## Website release checklist

- [ ] Confirmed update type: major, minor, or patch
- [ ] Confirmed beta status
- [ ] Updated related GitHub Issue at start of work
- [ ] Updated related GitHub Issue during meaningful progress, if applicable
- [ ] Posted final related GitHub Issue update
- [ ] Checked APES website brand and feature standards
- [ ] Checked APES universal footer standard
- [ ] Confirmed footer uses the APES column card format
- [ ] Confirmed footer includes donation page, Privacy Policy, Terms of Service and Change Log Hub links
- [ ] Confirmed footer displays organisation or division identity, APES CIC number, website name and version
- [ ] Checked APES Newsroom routing where news, updates, newsletter, footer, or navigation is affected
- [ ] Updated root canonical version file
- [ ] Created or updated website Change Log Hub page
- [ ] Created or updated root-level `CHANGELOG.md`
- [ ] Created or updated `/public/CHANGELOG.md` where `/public/` exists
- [ ] Updated root-level `README.md` with relevant changes and updates
- [ ] Added pill tags for change type and fixes
- [ ] Listed affected website areas
- [ ] Validated the deployed website after commit and push to the server via FTP by uploading or using the project upload flow and checking the uploaded result
- [ ] Included rollback notes
- [ ] Avoided unrelated generated-file rewrites
- [ ] Confirmed no third-party/platform versions were changed accidentally
```

Recommended commit messages:

```txt
website: update change log hub for v0.0.0
website: add volunteer page and bump to v0.2.0
website: fix donation link and bump to v0.1.3
website: add beta boarding form and bump to v0.3.0b
website: update footer links and bump to v0.0.0
website: apply APES column card footer layout
```

---

## 15. Final self-check before completion

Before finishing any website task, check:

1. Update type identified.
2. Beta status confirmed or inferred.
3. Root canonical version updated.
4. Website Change Log Hub page updated.
5. Root-level `CHANGELOG.md` updated.
6. `/public/CHANGELOG.md` updated where `/public/` exists.
7. Root-level `README.md` updated with relevant changes and updates.
8. Detailed change notes added.
9. Version, status, type and fix pills added where relevant.
10. Unrelated generated-file changes avoided.
11. Third-party or platform version strings not changed accidentally.
12. Deployed website validated after commit and push to the server via FTP by uploading or using the project upload flow and checking the uploaded result.
13. Rollback notes included.
14. Changelog system created or corrected where missing or incorrect.
15. APES website brand and feature standards checked.
16. APES universal footer standard checked.
17. Footer uses the APES column card format.
18. Footer includes donation page, Privacy Policy, Terms of Service and Change Log Hub links.
19. Footer displays the correct website or division name, APES CIC organisation identity, CIC number, current year and canonical version.
20. APES Newsroom routing checked where relevant.
21. Related GitHub Issue updated at start, meaningful progress and end where applicable.
22. Root version, footer version, Change Log Hub, root `CHANGELOG.md`, `/public/CHANGELOG.md` and README release details all align.

---

## 16. Non-negotiable instruction

Do not treat changelog, version updates, APES brand compliance, APES universal footer compliance, APES Newsroom routing, README updates or related GitHub Issue updates as optional for website work.

If website files change, the website Change Log Hub page, root-level `CHANGELOG.md`, `/public/CHANGELOG.md` where `/public/` exists, root-level `README.md`, root canonical version, APES brand and feature standards, APES universal footer standard, APES Newsroom routing where relevant and related GitHub Issue must be checked.

Every APES website footer must use the APES column card footer format and include direct or clearly accessible links to the website donation page, Privacy Policy page, Terms of Service page and Change Log Hub.

Use UK English throughout website content, changelog entries, issue updates and release notes.
