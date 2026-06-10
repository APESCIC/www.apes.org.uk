# APES CIC Codex Agent Instructions

Use this file as the Codex-facing operating profile for APES CIC website repositories and related website codebases maintained by the Association of Protecting Exotic Species CIC.

This is an `AGENTS.md` file, so it must contain instructions for AI coding agents only. Do not use this file as a human onboarding guide, general setup manual, policy handbook, or broad project explainer. Put human-facing setup steps, background information, tutorials, walkthroughs, and extended operational notes in `INSTRUCTIONS.md`, `README.md`, or a dedicated guidance document, then keep only the agent action rule or routing instruction here.

Codex should load this guidance alongside any repository-local `AGENTS.md`, `README.md`, contribution guide, issue, pull request, workspace file, or task-specific instruction. If local guidance conflicts with this profile, do not weaken APES CIC compliance, changelog, Change Log Hub, versioning, SEO, sitemap, footer, error-page, Cloudron LAMP, issue-tracking, repository public-folder, local-preview, or documentation requirements without explicit user approval.

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

Before completion, check whether the task requires:

1. Website Change Log Hub update.
2. Root `CHANGELOG.md` update.
3. `/public/CHANGELOG.md` update where a `/public/` folder exists.
4. Version update where the repository uses versioning.
5. GitHub Issue start, progress, completion, or closure update where issue tracking is used.
6. Root `README.md` update.
7. APES website brand and feature standards review.
8. APES Newsroom routing check.
9. APES universal footer check.
10. Donation, Privacy Policy, Terms of Service, and Change Log Hub footer link check.
11. SEO metadata and sitemap update.
12. Branded error-page check, including 404 and any supported 403, 500, offline, maintenance, or fallback pages.
13. Repository `public/` folder structure and local-preview compatibility check.
14. Cloudron LAMP compatibility review where the site is expected to run in the Cloudron LAMP app.

If uncertain, assume changelog, documentation, hosting compatibility, release-record, local-preview, repository-structure, and issue-tracking checks are required, then explain what evidence supports or limits that decision.

---

## 6. Issue-Tracked Work

Use an issue-first workflow when work is non-trivial, public-facing, operationally relevant, compliance relevant, or likely to need an audit trail.

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
4. Release-record status.
5. Hosting status.
6. Local-preview and public-folder status where relevant.
7. Known limitations.
8. Linked issue status.

Merge only after explicit user approval, passing or intentionally waived checks, satisfied review requirements, aligned release records, and confirmed issue-closing behaviour.

---

## 8. Version And Release Records

At the start of planning for website work, verify the repository's current release state where files exist:

1. Root `VERSION`.
2. `/public/VERSION`.
3. Root `CHANGELOG.md`.
4. `/public/CHANGELOG.md`.
5. Website Change Log Hub source page or data.
6. README current-release notes.
7. Release metadata files or generated output that render footer version text, public release cards, or static snapshots.
8. Hosting and local-preview notes.

Record the verified release state in the plan, issue update, or working notes: current version, beta or stable status, expected version bump type, required release-record updates, hosting assumptions, local-preview assumptions, and mismatches.

Do not complete work while version records, changelogs, Change Log Hub records, README current-release notes, footer version text, generated output, or documented hosting/local-preview requirements disagree unless the user explicitly approves deferral.

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

Apply this generic standard to any APES CIC public website, microsite, landing page, campaign site, service site, static website, PHP-backed public website, frontend-only website, or website intended to be previewed locally in VS Code.

Do not describe this section as applying only to the current website. It is a reusable template for all APES CIC website repositories.

### Core Standard

For every applicable APES CIC website repository:

```text
public/
```

is the website folder and public web root.

All files intended to be served by the browser must be stored inside:

```text
public/
```

Do not use:

```text
content/
```

Do not scatter website files across the repository root.

Do not create nested public folders such as:

```text
public/public/
```

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

### Target Repository Structure

A compliant generic website repository should look like this:

```text
website-repository/
  public/
    index.html
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

### When Codex Should Apply This Template

Apply this template when the repository is for:

1. A public website.
2. A microsite.
3. A campaign site.
4. A landing page.
5. A service page collection.
6. A static website.
7. A PHP-backed public website.
8. A frontend-only website.
9. A website intended to be previewed locally in VS Code.

Do not apply this template to backend-only services, internal staff-only systems, non-website repositories, pure libraries or packages, or repositories where another framework-specific public root is explicitly documented.

### Local Preview Command

Applicable repositories should support local preview with:

```bash
php -S 127.0.0.1:8080 -t public dev/router.php
```

Preview URL:

```text
http://127.0.0.1:8080/
```

VS Code preview must use the forwarded HTTP port. Do not preview by opening `index.html` directly using `file://`.

### Required Local Router Template

Create or maintain:

```text
dev/router.php
```

with this generic behaviour:

1. Resolve the public root from `../public`.
2. Serve real static files normally.
3. Prevent directory traversal.
4. Stub known local-only dynamic endpoints.
5. Fall back to `index.html` or `index.php`.
6. Return a clear error if `public/`, `index.html`, and `index.php` are missing.

Use this template unless repository-specific guidance requires another router:

```php
<?php

$root = realpath(__DIR__ . '/../public');
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';

if (!$root) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Local preview error: public directory was not found.';
    return true;
}

$file = realpath($root . $path);

if ($file && str_starts_with($file, $root) && is_file($file)) {
    return false;
}

$stubbedRoutes = [
    '/siteapps/forms',
    '/siteapps/crm',
    '/siteapps/newsletter',
    '/api/forms',
    '/api/contact',
    '/api/newsletter',
    '/api/donate',
    '/api/volunteer',
    '/api/search'
];

if (in_array($path, $stubbedRoutes, true)) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'localPreview' => true,
        'status' => 'stubbed',
        'path' => $path,
        'message' => 'This endpoint is stubbed locally. Test live submission behaviour in the appropriate live environment.'
    ]);
    return true;
}

$indexHtml = $root . '/index.html';
$indexPhp = $root . '/index.php';

if (is_file($indexHtml)) {
    require $indexHtml;
    return true;
}

if (is_file($indexPhp)) {
    require $indexPhp;
    return true;
}

http_response_code(404);
header('Content-Type: text/plain; charset=utf-8');
echo 'Local preview error: index.html or index.php was not found in the public directory.';
return true;
```

### Required `.htaccess` Template

Create or update:

```text
public/.htaccess
```

with this baseline unless repository-specific guidance requires otherwise:

```apache
Options -Indexes

DirectoryIndex index.html index.php

<IfModule mod_headers.c>
    Header always set X-Content-Type-Options "nosniff"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

<IfModule mod_rewrite.c>
    RewriteEngine On

    # Preserve real files and directories
    RewriteCond %{REQUEST_FILENAME} -f [OR]
    RewriteCond %{REQUEST_FILENAME} -d
    RewriteRule ^ - [L]

    # Keep standard public files directly reachable
    RewriteRule ^(site-conf\.json|robots\.txt|sitemap\.xml|sitemap-cms\.xml|OneSignalSDKWorker\.js|service-worker\.js|manifest\.json|favicon\.ico|favicon\.png|logo\.png)$ - [L]

    # Static fallback for clean URLs and single-page style routing
    RewriteRule ^ index.html [L]
</IfModule>
```

### Local Apache Virtual Host Template

Where useful, create:

```text
dev/apache-vhost.conf
```

with this generic template:

```apache
<VirtualHost *:8080>
    ServerName apes-local.test
    DocumentRoot "/absolute/path/to/website-repository/public"

    <Directory "/absolute/path/to/website-repository/public">
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
        DirectoryIndex index.html index.php
        FallbackResource /index.html
    </Directory>

    ErrorLog "/tmp/apes-local-error.log"
    CustomLog "/tmp/apes-local-access.log" combined
</VirtualHost>
```

The template must not affect environments where Apache is not used locally.

### Local Preview Documentation

Create or update:

```text
docs/local-preview.md
```

It must explain:

1. `public/` is the browser-served website folder.
2. All browser-served website files belong inside `public/`.
3. Repository support files stay outside `public/`.
4. The standard command is `php -S 127.0.0.1:8080 -t public dev/router.php`.
5. The preview URL is `http://127.0.0.1:8080/`.
6. VS Code should use the Ports view to forward port `8080`.
7. `file://` previews are not acceptable.
8. Local preview tests browser rendering, static assets, clean URLs, and local endpoint stubs.
9. Local preview does not fully test SSL, server email, server database credentials, production Apache configuration, live form submissions, production-only third-party integrations, or server-level redirects.

### Local Preview Checklist

Create or update:

```text
docs/preview-checklist.md
```

It must include public-folder checks and local-rendering checks covering:

1. Repository contains `public/`.
2. `public/index.html` or `public/index.php` exists.
3. All browser-served website files are inside `public/`.
4. No duplicate public files exist in the repository root.
5. No nested `public/public/` folder exists.
6. No credentials are stored inside `public/`.
7. The website runs with `php -S 127.0.0.1:8080 -t public dev/router.php`.
8. Homepage, CSS, JavaScript, images, navigation, clean URLs, forms where applicable, newsletters where applicable, `robots.txt`, and `sitemap.xml` render or are marked not applicable.
9. No directory listing.
10. No critical console errors.
11. Stubbed endpoints do not break layout.

### README Local Preview Section

Update the repository `README.md` with a generic section stating:

1. Browser-served website files live in `public/`.
2. Repository support files such as `README.md`, `docs/`, `dev/`, tests, and local tooling remain outside `public/`.
3. Local preview command: `php -S 127.0.0.1:8080 -t public dev/router.php`.
4. Preview URL: `http://127.0.0.1:8080/`.
5. Do not open `index.html` directly from the filesystem.
6. See `docs/local-preview.md` and `docs/preview-checklist.md`.

### Optional Smoke Test Script

Where useful, create:

```text
dev/smoke-test.sh
```

It should check the local preview base URL, defaulting to `http://127.0.0.1:8080`, and verify key paths such as `/`, `/index.html`, `/robots.txt`, and `/sitemap.xml`, adapting optional files as needed.

### Public Folder Guard Script

Where useful, create:

```text
dev/check-public-root.sh
```

It must fail if:

1. `public/` is missing.
2. `public/index.html` and `public/index.php` are both missing.
3. `public/public/` exists.
4. Browser-served website files are found in the repository root.
5. Sensitive or local-only files such as `.env`, `*.local`, or `*.log` are found inside `public/`.

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

### Pull Request Requirements For This Template

When this template is applied to a repository, the pull request should include, where applicable:

1. `dev/router.php`.
2. `dev/apache-vhost.conf`.
3. `dev/smoke-test.sh`.
4. `dev/check-public-root.sh`.
5. `public/.htaccess`.
6. `docs/local-preview.md`.
7. `docs/preview-checklist.md`.
8. Updated `README.md`.
9. Updated `.gitignore` if needed.

Suggested pull request title:

```text
Standardise public folder structure and local website preview
```

Suggested pull request summary:

```markdown
## Summary

This PR standardises the local website development workflow for this website repository.

It confirms `public/` as the browser-served website folder and ensures website files live inside `public/`.

It adds:

1. A reusable PHP local preview router.
2. A standard `.htaccess`.
3. Local Apache template configuration.
4. Local preview documentation.
5. Local preview checklist.
6. Optional smoke test script.
7. Public folder validation script.
8. README instructions for local preview and public folder structure.

## Testing

Tested with:

```bash
php -l dev/router.php
dev/check-public-root.sh
php -S 127.0.0.1:8080 -t public dev/router.php
dev/smoke-test.sh
```
```

### Final Acceptance Criteria For This Template

The work is complete when:

1. The repository uses `public/` as the browser-served website folder.
2. All browser-served website files are stored inside `public/`.
3. Repository support files remain outside `public/`.
4. The repository can run locally with `php -S 127.0.0.1:8080 -t public dev/router.php`.
5. The repository includes `public/.htaccess` where Apache compatibility is required.
6. The repository documents local preview and the `public/` folder rule.
7. The public folder validation script passes where present.
8. The local smoke test passes where present.
9. The local preview checklist is available.
10. The website can be opened in VS Code through a forwarded port.
11. No nested `public/public/` structure is created.
12. No browser-served website files are left in the repository root.
13. No provider-specific platform names are added to the standard.
14. No secrets, local-only files, or development-only debug pages are exposed under `public/`.

---

## 11. Repository Structure And Hosting

For APES CIC website repositories, treat root-level `/public/` as the browser-served website folder unless repository-specific documentation clearly states otherwise.

For multi-site or monorepo repositories, confirm the target site and path before assuming the first `public/` folder is correct.

For websites expected to run on Cloudron LAMP, treat Cloudron LAMP as a Linux, Apache, MySQL, and PHP hosting environment.

Cloudron LAMP is suitable for Apache-served static websites, browser JavaScript, PHP websites, PHP CLI maintenance scripts, Composer-based PHP dependencies where allowed, MySQL-backed PHP applications, Redis-backed PHP features, SMTP email through application libraries, `.htaccess` rules, and Apache-compatible configuration supported by the Cloudron LAMP app.

Do not treat Cloudron LAMP as a general Python, Node, Ruby, Go, Java, WebSocket, worker, or arbitrary long-running process container. Treat Python and Node as build-time or local-development tooling only unless repository evidence confirms a different production stack.

Before completion for Cloudron LAMP-targeted work, confirm that no production route depends on an unsupported runtime server and that README, changelog, Change Log Hub, version records, generated output, and issue updates reflect hosting impact.

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
4. Change Log Hub, root changelog, public changelog, version-record, README, and generated-output status.
5. Public-folder and local-preview status.
6. Cloudron LAMP and hosting status where relevant.
7. GitHub Issue status where relevant.
8. SEO, sitemap, footer, Newsroom, and error-page status where relevant.
9. Whether work remains uncommitted or unpushed, or what commit and push action was completed after user approval.
10. Next recommended GitHub step.
11. Proposed commit message.

Keep final responses concise, practical, and transparent about outstanding user decisions.

---

## 14. Maintaining This File

Keep this file concise and operational where possible. If guidance becomes too long, example-heavy, human-facing, or explanatory, move it to `INSTRUCTIONS.md`, `README.md`, or a dedicated file in `Guidance/`, then reference it here only where it changes agent behaviour.

When updating this file, preserve mandatory APES CIC changelog, Change Log Hub, README, issue-tracking, versioning, SEO, sitemap, universal footer, footer link, Newsroom routing, generated-output, error-page, public-folder, local-preview, and Cloudron LAMP requirements unless the user explicitly asks to change them.

Keep this file aligned with `GitHub Agent/AGENTS.md`, `Guidance/Repository-Structure-And-Contents.md`, `Guidance/Cloudron-LAMP-Container-Guidance.md`, and `Guidance/Visual-Studio-Code-Codex-AGENTS-Guidance.md` where shared standards intentionally overlap.

Do not invent repository facts, deployment steps, hosting support, technical requirements, or third-party services that are not supported by the repository or the user's instructions.
