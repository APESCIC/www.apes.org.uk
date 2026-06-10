# APES CIC Codex Agent Instructions

Use this file as the Codex-facing operating profile for APES CIC website repositories and related website codebases maintained by the Association of Protecting Exotic Species CIC.

This is an `AGENTS.md` file, so it must contain instructions for AI coding agents only. Do not use this file as a human onboarding guide, general setup manual, policy handbook, or broad project explainer. Keep only the agent action rule or routing instruction here.

Codex should load this guidance alongside any repository-local `AGENTS.md`, contribution guide, issue, pull request, workspace file, or task-specific instruction. If local guidance conflicts with this profile, do not weaken APES CIC compliance, changelog, Change Log Hub, versioning, SEO, sitemap, footer, error-page, Cloudron LAMP, issue-tracking, repository public-folder, local-preview, or documentation requirements without explicit user approval.

---

## 1. Purpose And Scope

These instructions apply when Codex is asked to work on APES CIC website, repository, documentation, release, changelog, SEO, sitemap, footer, Newsroom, compliance, local-preview, repository-structure, or hosting tasks.

Use `AGENTS.md` for:

1. Agent role, scope, and decision rules.
2. Repository inspection requirements.
3. Build, test, lint, validation, and completion expectations for agents.
4. Coding, documentation, changelog, release, issue, and pull request rules.
5. Safety limits, do-not rules, and verification requirements.
6. Routing guidance to more detailed files.

Do not use `AGENTS.md` for:

1. Human onboarding or training material.
2. Long setup tutorials.
3. General project background that is not needed for agent execution.
4. Secrets, credentials, private personal data, or deployment keys.

Where detailed guidance is needed, reference the owning document instead of copying it into this file.

---

## 2. Operating Principles

Before making changes, inspect the repository and identify:

1. The user's requested outcome.
2. The current branch and working-tree state, when a local clone is available.
3. Repository-local instructions and documentation.
4. The target site, package, route, or file area.
5. Issue or pull request context, where applicable.
6. Release, changelog, documentation, SEO, sitemap, footer, Newsroom, error-page, hosting, local-preview, repository-structure, and compliance impact.

Make the smallest safe change that satisfies the request while preserving APES CIC standards, accessibility, release records, website reliability, issue traceability, and the approved website repository structure.

Do not invent repository facts, deployment processes, issue numbers, version numbers, routes, hosting support, runtimes, branch names, or technical requirements. Inspect first. If evidence is still missing, state the assumption and choose the safest general approach.

Do not remove or weaken mandatory APES CIC requirements unless the user explicitly asks for that specific removal.

---

## 3. Setup, Build, And Validation Commands

Use repository-defined commands first. Inspect `package.json`, lockfiles, build scripts, framework configuration, Makefiles, CI files, and local documentation before choosing commands.

For Node-based APES CIC website repositories, common commands may include:

```bash
npm install
npm run lint
npm run typecheck
npm run test:e2e
npm run build
```

For generic APES CIC static or PHP-backed website repositories using the standard `public/` website folder, local preview should usually support:

```bash
php -S 127.0.0.1:8080 -t public dev/router.php
```

Run only commands supported by the repository. If a script is missing, run the closest documented validation command and report the gap. Do not add temporary tools, dependencies, or deployment scripts unless the user approves.

Treat development-server commands such as `npm run dev` or `php -S` as local inspection and validation tools, not deployment evidence.

---

## 4. Safety Rules

Do not edit production secrets, credentials, API keys, private tokens, or unrelated environment files.

Do not deploy automatically.

Do not commit, push, open pull requests, merge, close issues, rewrite history, force-push, or delete branches unless the user explicitly asks or clearly approves that action.

Before any state-changing GitHub or Git action, show the relevant diff, validation result, risk, and recommended next step where practical.

Never overwrite local user work. If uncommitted or unrelated changes exist, stop and explain the safest options.

---

## 5. Primary Website Rule

Every APES CIC website update must be assessed for release, documentation, compliance, website quality, repository public-folder, local-preview, and hosting impact.

When creating a new website or migrating an existing website, Codex must ask what type of website the user wants unless the request already clearly specifies it. Establish whether the site is a static site, PHP site, WordPress-style or CMS site, campaign or landing page, public information hub, knowledge hub, simple form-led website, built frontend-only single page application, custom PHP and database-backed site, or a system that requires a non-PHP runtime. Use the answer to assess Cloudron LAMP suitability before planning implementation or migration.

When working on any repository, update the repository being worked on so its documentation and release records stay aligned with the change. This includes updating `README.md`, `CHANGELOG.md`, `/public/CHANGELOG.md` where present, version files, generated release metadata, local-preview documentation, hosting notes, public-facing release pages, and any other file that is affected by the work or required to keep the repository accurate. If a file exists but does not need a change, state why. If an expected file is missing, state that clearly and do not invent one unless the user approves or repository conventions require it.

Before completion, check whether the task requires:

1. Website Change Log Hub update.
2. Repository `README.md` update.
3. Root `CHANGELOG.md` update.
4. `/public/CHANGELOG.md` update where a `/public/` folder exists.
5. Version update where the repository uses versioning.
6. GitHub Issue start, progress, completion, or closure update where issue tracking is used.
7. APES website brand and feature standards review.
8. APES Newsroom routing check.
9. APES universal footer check.
10. Donation, Privacy Policy, Terms of Service, and Change Log Hub footer link check.
11. SEO metadata and sitemap update.
12. Branded error-page check, including 404 and any supported 403, 500, offline, maintenance, or fallback pages.
13. Repository `public/` folder structure and local-preview compatibility check.
14. Cloudron LAMP compatibility review where the site is expected to run in the Cloudron LAMP app.
15. Any repository-specific documentation, configuration, generated output, index, manifest, metadata, or operational note affected by the change.

If uncertain, assume changelog, README, documentation, hosting compatibility, release-record, local-preview, repository-structure, and issue-tracking checks are required, then explain what evidence supports or limits that decision.

---

## 6. Issue-Tracked Work

Use an issue-first workflow when work is non-trivial, public-facing, operationally relevant, compliance relevant, or likely to need an audit trail.

Creating or drafting a new issue is an issue-filing action only. Do not treat issue creation as approval to start implementation, create a branch, assign yourself, post a work-started update, change issue status, edit files, commit, push, open a pull request, or otherwise begin work on that issue unless the user explicitly asks you to start work or the existing instruction clearly requires both actions.

When starting work, ask the user to confirm the release classification before implementation begins. The required classification is:

1. Work type: Major, Minor, or Patch.
2. Release status: Beta or Stable.

Do not begin implementation, create a work branch, change files, commit, push, open a pull request, or mark an issue as started until the user has confirmed both the work type and release status, unless the user explicitly instructs you to proceed using a stated assumption.

When opening or drafting a new issue, include:

1. Summary.
2. Expected outcome.
3. Scope and non-scope.
4. Acceptance criteria.
5. Release impact.
6. Hosting impact.
7. Local-preview and repository-structure impact where relevant.
8. Validation plan.
9. Relevant labels, assignees, milestone, blockers, related issues, or pull requests where known.

When starting an existing issue, read it before planning and identify missing scope, acceptance criteria, branch expectations, release impact, hosting impact, local-preview requirements, validation requirements, and blockers.

When updating an issue, include a `Files changed` section. List each changed file path with a short note. If no files changed, say so explicitly.

Post or prepare issue updates when work starts, files change, scope changes, validation completes or fails, blockers appear, implementation is ready for review, or work is completed or deferred.

Do not close an issue until it has a clear completion note covering changed files, validation, release-record status, hosting status, local-preview status, remaining limitations, and follow-up work.

---

## 7. Git And Pull Request Rules

Use a short task-specific branch for non-trivial work unless the user tells you to use an existing branch.

Prefer `git pull --ff-only` when pulling latest changes in a local clone, after checking branch and working-tree state.

Commit only after inspecting the diff and running relevant validation.

Push only after user approval.

Open or update a pull request only after user approval or when the agreed workflow requires it.

Pull request text must summarise:

1. Change made.
2. Files or routes affected.
3. Validation completed or not completed.
4. README, changelog, version, release-record, and generated-output status.
5. Hosting status.
6. Local-preview and public-folder status where relevant.
7. Known limitations.
8. Linked issue status.

Merge only after explicit user approval, passing or intentionally waived checks, satisfied review requirements, aligned release records, and confirmed issue-closing behaviour.

---

## 8. Repository Documentation, Version, And Release Records

At the start of planning for repository work, verify the repository's current documentation, version, and release state where files exist:

1. Repository `README.md`.
2. Root `VERSION`.
3. `/public/VERSION`.
4. Root `CHANGELOG.md`.
5. `/public/CHANGELOG.md`.
6. Website Change Log Hub source page or data.
7. Release metadata files or generated output that render footer version text, public release cards, or static snapshots.
8. Hosting and local-preview notes.
9. Any repository-specific documentation, generated output, package metadata, manifest, sitemap, index, configuration, or operational note affected by the change.

Record the verified release state in the plan, issue update, or working notes: current version, beta or stable status, expected version bump type, required README and release-record updates, hosting assumptions, local-preview assumptions, and mismatches.

Do not complete work while `README.md`, version records, changelogs, Change Log Hub records, footer version text, generated output, or documented hosting/local-preview requirements disagree unless the user explicitly approves deferral.

Use APES CIC semantic website versioning:

```text
vMAJOR.MINOR.PATCH
vMAJOR.MINOR.PATCHb
```

Use the `b` suffix while a site is in beta. Stable versions omit it.

Major changes are breaking route, architecture, public journey, data, compliance, platform, hosting, or operational changes. Minor changes add user-visible features, public routes, broad content expansions, shared components, or meaningful workflow additions. Patch changes are fixes, copy edits, styling polish, metadata corrections, dependency or configuration fixes, hosting clarifications, local-preview clarifications, generated-output syncs, and small maintenance changes.

Do not update a version without a matching changelog decision and entry.

---

## 9. Change Log Hub And Changelog Entries

The Change Log Hub is the public website release record. Update it for every website change affecting users, operations, compliance, release metadata, generated output, public maintenance history, hosting assumptions, local-preview assumptions, or user-visible behaviour.

Use the `www.apes.org.uk` Change Log Hub pattern unless repository-specific guidance says otherwise.

Each Change Log Hub, root `CHANGELOG.md`, and `/public/CHANGELOG.md` entry should include:

1. Version and date.
2. Status and change-type pills where supported.
3. Summary.
4. Detailed changes.
5. Affected areas.
6. Version decision.
7. Validation.
8. Known limitations.
9. Rollback notes.

Do not create a changelog entry without a grounded version decision.

---

## 10. Generic APES CIC Website Public Folder And Local Preview Standard

Apply this generic standard to any APES CIC public website, microsite, landing page, campaign site, service site, static website, PHP-backed public website, frontend-only website, or website intended to be previewed locally by Codex or another coding agent.

Do not describe this section as applying only to the current website. It is a reusable template for all APES CIC website repositories.

### Core Standard

For every applicable APES CIC website repository, `public/` is the website folder and public web root.

All files intended to be served by the browser must be stored inside `public/`.

Do not use `content/` as the public web root, do not scatter website files across the repository root, and do not create nested public folders such as `public/public/`.

### Files That Belong Inside `public/`

Store all browser-served website files inside `public/`, including where applicable:

```text
index.html
index.php
.htaccess
robots.txt
sitemap.xml
sitemap-cms.xml
site-conf.json
favicon.ico
favicon.png
logo files
CSS files
JavaScript files
images
fonts
uploads
downloads
search assets
page HTML files
page PHP files
public assets
embedded widget assets
form assets
service-worker.js
OneSignalSDKWorker.js
manifest.json
```

### Files That Stay Outside `public/`

Keep repository, development, documentation, and tooling files outside `public/`, including:

```text
README.md
.gitignore
.gitattributes
.github/
dev/
docs/
tests/
package.json
package-lock.json
composer.json
composer.lock
node_modules/
vendor/
.env
*.local
```

### Required Repository Pattern

A compliant generic website repository should have this pattern where applicable:

```text
website-repository/
  public/
    index.html or index.php
    .htaccess
    robots.txt
    sitemap.xml
    css/
    js/
    images/
  dev/
    router.php
    apache-vhost.conf
    smoke-test.sh
    check-public-root.sh
  docs/
    local-preview.md
    preview-checklist.md
  README.md
  .gitignore
```

If a website uses PHP as its entry point, `public/index.php` may be used instead of `public/index.html`.

If certain public files are not applicable, do not create dummy files unless the project requires them.

### Local Preview Requirements

Applicable repositories should support local preview with:

```bash
php -S 127.0.0.1:8080 -t public dev/router.php
```

Preview URL:

```text
http://127.0.0.1:8080/
```

Local preview must use the HTTP loopback URL. Do not preview by opening `index.html` directly using `file://`.

Maintain `dev/router.php`, `public/.htaccess`, `docs/local-preview.md`, `docs/preview-checklist.md`, `dev/smoke-test.sh`, and `dev/check-public-root.sh` where applicable. Use `Guidance/Repository-Structure-And-Contents.md`, `Guidance/cloudron-lamp-container-website-types.md`, `Guidance/Cloudron-LAMP-Container-Guidance.md`, and repository-local instructions for the full reusable templates.

### Validation Commands

After implementation, run where supported:

```bash
php -l dev/router.php
dev/check-public-root.sh
php -S 127.0.0.1:8080 -t public dev/router.php
dev/smoke-test.sh
```

Also manually verify where applicable:

```text
http://127.0.0.1:8080/
http://127.0.0.1:8080/index.html
http://127.0.0.1:8080/robots.txt
http://127.0.0.1:8080/sitemap.xml
```

### Final Acceptance Criteria For This Template

The work is complete when:

1. The repository uses `public/` as the browser-served website folder.
2. All browser-served website files are stored inside `public/`.
3. Repository support files remain outside `public/`.
4. The repository can run locally with the standard PHP local-preview command.
5. The repository includes `public/.htaccess` where Apache compatibility is required.
6. The repository documents local preview and the `public/` folder rule.
7. Public-folder validation and local smoke tests pass where present.
8. The local preview checklist is available.
9. No nested `public/public/` structure is created.
10. No browser-served website files are left in the repository root.
11. No provider-specific platform names are added to the generic public-folder standard.
12. No secrets, local-only files, or development-only debug pages are exposed under `public/`.

---

## 11. Repository Structure And Cloudron LAMP Hosting

For APES CIC website repositories, treat root-level `/public/` as the browser-served website folder unless repository-specific documentation clearly states otherwise.

For multi-site or monorepo repositories, confirm the target site and path before assuming the first `public/` folder is correct.

Use `Guidance/cloudron-lamp-container-website-types.md` as the source guidance for Cloudron LAMP website-type suitability. Keep this section operational and defer extended explanation to that guidance file.

For websites expected to run on Cloudron LAMP, treat the Cloudron LAMP app as a traditional Linux, Apache, MySQL or MariaDB, and PHP hosting environment. It is not a general-purpose application runtime for persistent non-PHP services.

When creating a website or migrating a website, ask what type of website the user wants unless the website type is already explicit in the request, issue, repository documentation, or migration source. Record the selected website type in the plan, issue update, pull request summary, or final response where relevant.

### Cloudron LAMP Decision Rule

Use the Cloudron LAMP container when the website can run from `public/` using `index.html`, `index.php`, Apache, `.htaccess`, PHP, and optionally MySQL or MariaDB.

Do not approve a Cloudron LAMP hosting assumption until repository inspection confirms that production routes do not depend on an unsupported runtime server.

### Website Types To Identify Before Creation Or Migration

Before planning a new website or website migration, identify which category best describes the requested site:

1. Static HTML, CSS, and JavaScript website.
2. PHP website.
3. Public information website.
4. Microsite, campaign site, appeal page, or landing page.
5. WordPress-style or CMS-backed PHP website.
6. Custom PHP and MySQL or MariaDB application.
7. Knowledge base or help centre.
8. Simple form-led website.
9. Built frontend-only single page application served as static files.
10. Application requiring a persistent non-PHP runtime or real-time service.
11. High-traffic transactional, large media, sensitive records, or payment-heavy system requiring further hosting review.

### Good Fits For Cloudron LAMP

Cloudron LAMP is suitable for:

1. Static HTML, CSS, and JavaScript websites.
2. Browser-served single page application builds where the built static files are deployed into `public/`.
3. PHP websites using `public/index.php` or PHP page files.
4. Apache-served public websites, microsites, campaign sites, service sites, landing pages, information hubs, and knowledge hubs.
5. WordPress-style or CMS-style PHP websites, subject to plugin security, update, and maintenance controls.
6. Custom PHP and MySQL or MariaDB applications.
7. Modest public directories, listings, resource hubs, adoption listings, care article indexes, or service directories.
8. PHP form handlers, provided UK GDPR, consent, email handling, retention, and security requirements are designed and documented.
9. Composer-based PHP dependencies where the repository and Cloudron LAMP deployment process support them.
10. PHP CLI maintenance scripts where they are part of the documented deployment or maintenance workflow.
11. Redis-backed PHP features where repository evidence confirms support.
12. SMTP email through application libraries where credentials and production configuration are handled securely outside the repository.
13. `.htaccess` rules and Apache-compatible configuration supported by the Cloudron LAMP app.

### Poor Fits For Cloudron LAMP

Cloudron LAMP is not suitable as the primary production runtime for:

1. Node.js applications that require a persistent Node server.
2. Python, Django, Flask, Ruby, Rails, Go, Java, or similar non-PHP server applications.
3. WebSocket-heavy or real-time applications.
4. Queue workers, schedulers, daemons, or arbitrary long-running background processes unless repository and hosting evidence confirms a supported mechanism.
5. High-traffic transactional platforms that require horizontal scaling, dedicated services, or specialised infrastructure.
6. Large file or media platforms where storage, backup, upload limits, bandwidth, and retention controls are the core workload.
7. Sensitive case-management, safeguarding, HR, finance, client-record, or animal-welfare record systems unless access control, audit logging, retention, backup, incident response, and UK GDPR controls are explicitly designed and approved.
8. Payment-heavy systems or any implementation that stores card data. Prefer hosted Stripe/payment-provider flows where possible.

### Build-Time Tooling Rule

Treat Node, Python, Ruby, Go, Java, and similar tools as build-time or local-development tooling only unless repository evidence confirms they are supported in production.

A React, Vue, Vite, Astro, Eleventy, or similar frontend project may be Cloudron LAMP-compatible only when the production output is static files served from `public/` and no production Node server is required.

### APES CIC Preferred Cloudron LAMP Use Cases

Prefer Cloudron LAMP for APES CIC:

1. Public information websites.
2. Division, service, and campaign microsites.
3. Fundraising, appeal, volunteer, adoption, rescue, and sponsorship landing pages.
4. Static or PHP-backed care guides, policy pages, FAQs, and welfare knowledge hubs.
5. Modest searchable resource directories or listing pages.
6. Form-led public journeys where privacy, consent, validation, spam protection, and retention are documented.

Avoid Cloudron LAMP for complex staff systems, sensitive operational records, real-time applications, high-risk booking systems, payment-heavy systems, or services that require persistent non-PHP runtimes.

### Required Cloudron LAMP Compatibility Checks

Before completing Cloudron LAMP-targeted work, Codex must check and report:

1. Whether browser-served files live under `public/`.
2. Whether the site entry point is `public/index.html` or `public/index.php`.
3. Whether `.htaccess` is present and Apache-compatible where required.
4. Whether clean URLs work through Apache fallback rules or PHP routing.
5. Whether any route requires a persistent Node, Python, Ruby, Go, Java, WebSocket, worker, or daemon process.
6. Whether database use is PHP-compatible and documented.
7. Whether forms, email, uploads, and third-party integrations avoid exposing secrets in `public/` or the repository.
8. Whether UK GDPR, consent, retention, security, and audit implications are noted for forms or stored personal data.
9. Whether README, changelog, Change Log Hub, version records, generated output, and issue updates reflect the hosting impact.
10. Whether local preview remains aligned with Cloudron LAMP assumptions.

If evidence is missing, state the missing evidence and use the safest assumption: static/PHP-only content is acceptable; persistent non-PHP production services are not acceptable.

---

## 12. SEO, Sitemap, Footer, Newsroom, And Error Pages

Update SEO and sitemap records whenever public pages are added, removed, renamed, moved, or materially changed.

Check page titles, meta descriptions, canonical URLs, Open Graph metadata, structured data, robots rules, noindex rules, navigation, footer links, Change Log Hub links, and canonical URLs.

Confirm the APES universal footer remains present, accurate, accessible, and consistent.

Confirm donation, Privacy Policy, Terms of Service, and Change Log Hub footer links.

Confirm APES Newsroom routing for news, updates, announcements, newsletters, footer, navigation, and article-related changes.

Verify branded, accessible 404 pages and any supported 403, 500, offline, maintenance, or fallback pages.

Error pages must not expose stack traces, secrets, internal system details, private URLs, or debugging output.

---

## 13. Final Response Requirements

For every APES CIC website task, the final response must state:

1. What changed.
2. Files changed, with each path and a short explanation.
3. Checks run.
4. README, Change Log Hub, root changelog, public changelog, version-record, and generated-output status.
5. Public-folder and local-preview status.
6. Cloudron LAMP and hosting status where relevant.
7. GitHub Issue status where relevant.
8. SEO, sitemap, footer, Newsroom, and error-page status where relevant.
9. Whether work remains uncommitted or unpushed, or what commit and push action was completed after user approval.
10. Next recommended GitHub step.
11. Proposed commit message.

Keep final responses concise, practical, and transparent about outstanding user decisions.
