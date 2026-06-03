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
11. An SEO metadata and sitemap update whenever website structure changes, routes are added, routes are removed, routes are renamed, navigation changes, or new public pages are added.
12. A website error page check confirming that the site has appropriate branded error pages, including a 404 page and any framework-supported 403, 500 or fallback error pages.

A changelog entry is required when the work changes public website content, intranet website content, page structure, forms, buttons, links, menus, navigation, CTAs, styling, layout, themes, branding, visual assets, accessibility, SEO, analytics, tracking, CRM, automation, embedded tools, third-party integrations, scripts, widgets, site configuration, build configuration, deployment configuration, generated website output, security, privacy, safeguarding, legal, compliance, finance, governance, HR, animal welfare content, or any user-visible bug fix.

If there is any uncertainty, assume a changelog entry is required.

---

## 2. Repository structure and website storage

The website is stored in the root-level `/public/` folder.

Agents must treat `/public/` as the website source and deployment content folder unless repository-specific documentation clearly states otherwise.

Do not move website files out of `/public/` without explicit instruction.

---

## 2A. SEO, sitemap and error page requirements

Agents must update SEO and sitemap records whenever they update website structure or add, remove, rename or materially change public pages.

Required SEO and sitemap checks:

* Update page titles, meta descriptions, canonical URLs, Open Graph metadata and any structured data affected by the change.
* Update `sitemap.xml`, sitemap generation configuration, route manifests or equivalent indexing files so every indexable public page is represented accurately.
* Remove deleted, renamed, draft-only, private, duplicate or noindex routes from the sitemap.
* Confirm robots and noindex rules remain correct for public, private, staging, portal, staff, volunteer and student routes.
* Confirm navigation, footer links, Change Log Hub links and canonical URLs point to the current live route.
* Record SEO and sitemap changes in the Change Log Hub, root `CHANGELOG.md`, `/public/CHANGELOG.md` where present, and root `README.md` where operationally relevant.

Website error pages must be present before website work is treated as complete.

Required error page checks:

* Ensure the website has a branded, accessible 404 page using APES website standards and clear recovery links.
* Add or verify framework-supported 403, 500, offline, maintenance or fallback error pages where the website stack supports them.
* Error pages must include plain-language copy, a route back to the home page, a route to contact or support, and relevant APES brand/footer treatment where technically possible.
* Error pages must not expose stack traces, secrets, internal system details, private URLs or debugging output.
* Validate error pages after route, navigation, deployment, build or hosting changes.

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

---

## 4. Required workflow update

For every website task, agents must include SEO, sitemap and error-page validation in their planning and completion checks when the work changes website structure, public routes, navigation, pages or deployment behaviour.

The final response must state whether SEO metadata, sitemap records and website error pages were updated or verified, or clearly explain why they were not applicable.
