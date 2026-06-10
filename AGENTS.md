# APES CIC VS Code, Codex And GitHub Agent Instructions

Use these instructions as the default working profile for APES CIC website repositories and related codebases maintained by the Association of Protecting Exotic Species CIC.

These instructions combine the APES CIC GitHub repository workflow, Codex working profile, and Visual Studio Code workflow. They apply when an agent is working in VS Code, Codex, GitHub, or a VS Code-based coding environment on website, repository, documentation, release, changelog, SEO, sitemap, footer, Newsroom, compliance, hosting, issue, pull request, or maintenance tasks.

If a repository contains its own `AGENTS.md`, `README.md`, contribution guide, `.vscode/` settings, workspace file, task-specific instruction, or issue or pull request guidance, follow that local guidance as well. If local guidance conflicts with this profile, ask the user before weakening any APES CIC compliance, changelog, Change Log Hub, versioning, SEO, sitemap, footer, error-page, issue-tracking, Cloudron LAMP hosting, or documentation requirement.

---

## Project

This is a website project unless repository evidence clearly says otherwise.

Make changes on a new branch only after the user confirms the branch plan. Do not create, switch, commit, push, open pull requests, merge, deploy, or close issues unless the user has explicitly asked for that action or clearly agreed to it.

## Setup

Inspect the repository before running commands. If the repository uses Node and provides a package manifest, run:

```bash
npm install
```

If `npm install` fails, report the exact terminal error output, stop dependent actions, and offer concrete remediation options such as installing missing packages, using a compatible Node version, or asking the user for environment details.

## Local Development

When the repository provides the script, run:

```bash
npm run dev
```

If the repository uses a different stack or script, follow the actual repository evidence and document the command used.

## Checks Before Completion

When these scripts exist, run:

```bash
npm run lint
npm run typecheck
npm run test:e2e
```

If a script is missing, inspect `package.json` and run the closest repository-supported validation command instead. If validation cannot be run, state why, name the commands attempted, and describe what was checked manually.

## Safety

Do not edit production secrets. Do not add secrets to the repository. Do not deploy automatically.

If build, test, install, or deployment-related commands require credentials or environment variables that are not available, do not invent values. Report which credentials or variables are missing and ask the user to provide secure access or run the remote step.

Before any commit or push, show the final diff summary and validation results. Commit only after explicit approval. Push only after explicit approval.

---

## 1. Operating Principles

Before changing a repository, understand the repository structure, the user's request, the current branch or remote state where relevant, and the likely public, operational, hosting, compliance, release, or maintenance impact of the work.

Make the smallest safe change that satisfies the request while preserving APES CIC standards, accessibility, release records, documentation quality, website reliability, and the approved hosting model.

Prefer narrow edits. If the requested fix requires broad refactoring, shared component changes, architecture changes, more than three files, or more than about 200 changed lines, pause and explain the scope before proceeding unless the user already approved that scale.

Do not invent repository facts, deployment processes, issue numbers, version numbers, routes, branch names, technical requirements, hosting support, runtimes, third-party services, or test results. Inspect first. If the repository does not contain enough evidence, explain the assumption and choose the safest general approach.

Do not remove or weaken mandatory APES CIC requirements unless the user explicitly asks for that specific removal.

---

## 2. Workspace And VS Code Working Method

When starting work in VS Code or a VS Code-based environment:

1. Inspect the repository tree, local `AGENTS.md`, `README.md`, package scripts, nearest config files, `.vscode/` folder, workspace files, and task-specific instructions before editing.
2. If the workspace is a local clone and the user has not confirmed it is current, ask whether to pull the latest changes before planning.
3. Check whether there is an existing GitHub Issue. Ask for the issue number or link if one exists.
4. If no issue is provided, offer clear options: create a new issue, draft issue text for the user, or proceed without an issue for a trivial correction.
5. Verify release state and repository rules before editing. Check versions, changelogs, Change Log Hub records, README current-release notes, generated output, hosting notes, and repository-specific instructions where present.
6. Confirm the branch path before editing when branch work is needed.
7. Use VS Code Explorer, workspace search, diagnostics, source-control diff views, and integrated terminal tasks to ground the work. If running outside interactive VS Code, use CLI equivalents such as `rg`, `git status`, `git diff`, package scripts, linters, typecheckers, and test runners.
8. Save intended changes before running validation or summarising work.
9. Treat VS Code warnings, TypeScript errors, lint diagnostics, test failures, and failed terminal tasks as signals to investigate before completing work.

Before broad edits, check whether the workspace defines:

- `.vscode/settings.json`
- `.vscode/tasks.json`
- `.vscode/launch.json`
- `.code-workspace` files
- lint, format, build, test, typecheck, or end-to-end test configuration
- repository scripts that should be preferred over ad hoc commands

---

## 3. GitHub Repository Workflow

For GitHub-backed work, follow a traceable lifecycle unless the user gives a different workflow:

1. Understand the request and inspect the repository.
2. Confirm whether to pull latest changes when working in a local clone.
3. Identify or create the GitHub Issue workflow with the user's approval.
4. Triage scope, priority, affected files or routes, acceptance criteria, labels, assignees, milestone, blockers, release impact, compliance impact, hosting impact, branch strategy, and pull request expectations.
5. Verify release state, changelog state, README current-release notes, generated output, hosting constraints, and repository-specific instructions.
6. Confirm branch strategy before creating or switching branches.
7. Record issue start or progress notes when issue tracking is being used.
8. Implement the smallest safe change.
9. Update documentation, changelog, version, Change Log Hub, README, generated output, SEO, sitemap, footer, Newsroom, error pages, and hosting records where required.
10. Run relevant checks and inspect the final diff.
11. Prepare a completion summary and issue or pull request update where applicable.
12. Provide a concise proposed commit message before committing.
13. Commit only after approval.
14. Push only after approval.
15. Open or update a pull request only after approval or when the agreed workflow requires it.
16. Merge only after the user asks, required checks and reviews are satisfied, release records are aligned, and issue-closing behavior is confirmed.
17. Close issues only after user approval or an agreed workflow clearly allows closure.

Ask concise questions before GitHub actions that change remote state. Do not create issues, create or switch branches, commit, push, open pull requests, merge, or close issues without explicit permission.

---

## 4. Primary Website Rule

Every APES CIC website update must be planned, versioned where relevant, recorded, validated, checked against APES website standards, checked against APES Newsroom routing rules where relevant, checked against APES universal footer standards, checked against the approved hosting model, and reflected in relevant GitHub Issues where issue tracking is being used.

Before completing website or repository work, check whether the following are required:

1. Website Change Log Hub update.
2. Root-level `CHANGELOG.md` update.
3. `/public/CHANGELOG.md` update where a `/public/` folder exists.
4. Canonical version update where the repository uses versioning.
5. GitHub Issue start, progress, completion, or closure update where issue tracking is used.
6. Root-level `README.md` update describing release, setup, hosting, operational, or maintenance impact.
7. Repository-specific documentation updates.
8. APES brand and feature standards review.
9. APES Newsroom routing check for news, update, announcement, newsletter, footer, navigation, or article-related changes.
10. APES universal footer compliance check.
11. Footer link check for donation, Privacy Policy, Terms of Service, and Change Log Hub links.
12. SEO metadata, sitemap, robots or noindex, and error-page checks when routes, navigation, deployment behavior, public pages, or website structure change.
13. Generated-output, release metadata, static snapshot, or footer version display updates where the repository produces public build output.
14. Cloudron LAMP compatibility review where the website is expected to run on Cloudron LAMP.

If there is uncertainty, assume documentation, changelog, version, release-record, hosting compatibility, and issue-tracking checks are required until repository evidence or the user says otherwise.

---

## 5. Release Verification

At the start of planning any APES CIC website or repository change, verify current release state before deciding scope or implementation order.

Inspect, where present:

- root `VERSION`
- `/public/VERSION`
- root `CHANGELOG.md`
- `/public/CHANGELOG.md`
- website Change Log Hub page or source data
- README current-release notes
- release metadata files or site data that render footer version text, Change Log Hub entries, public release cards, or generated static snapshots
- hosting and deployment notes, including Cloudron LAMP assumptions where relevant

The planning note should identify:

- current version
- beta or stable status
- expected version bump type: major, minor, or patch
- required Change Log Hub, changelog, README, version, generated-output, hosting, and issue updates
- whether GitHub Issues need start, progress, completion, or closure updates
- any mismatched version, release records, hosting assumptions, or runtime requirements that must be fixed before completion

Do not complete the task while version records, changelogs, Change Log Hub records, README current-release notes, footer version text, generated output, or documented hosting requirements disagree unless the user explicitly asks to defer that sync.

---

## 6. README Maintenance

Use `APESCIC/Website-Repo-Template` `README.md` as the default source template for APES CIC website repository README files.

When a website repository has no root `README.md`, create one from the template and adapt it to the actual repository before completion. Do not leave placeholders such as `{{PROJECT_NAME}}`, `{{PUBLIC_WEBSITE_URL}}`, `{{VERSION}}`, `{{INSTALL_COMMAND}}`, or `{{STATUS}}` unresolved unless the value is genuinely unknown and the final summary or issue update names the missing information.

Every APES CIC website repository README should include a centered badge row near the top when repository evidence supports it. Badges should be relevant to the actual repository and may include website, status, theme, accessibility, version, licence, build or CI, deployment host, tests, coverage, framework, package, security, maintenance, documentation, hosting, or review status.

Maintain existing useful README content. Refresh setup commands, environment variables, development workflow, repository structure, website areas, connected services, testing expectations, documentation standards, security, compliance, roadmap, release impact, hosting notes, Cloudron LAMP compatibility, and operational maintenance guidance when the change affects them.

Mention README creation, material updates, or intentional deferral in GitHub Issue updates, pull request descriptions, release notes, and final summaries.

---

## 7. Repository Structure

For APES CIC website repositories, treat the root-level `/public/` folder as the website source and deployment content folder when repository evidence supports that structure. If the repository contains multiple `/public/` folders or multiple sites, ask the user to specify the target site and path.

Do not recommend moving core website files out of `/public/` without explicit instruction.

When a repository uses a different framework or source structure, follow the actual repository evidence while preserving APES CIC validation, documentation, release, and hosting expectations.

Keep repository documentation current with setup, local development, build, deployment, content management, release, changelog, issue tracking, support, compliance, safeguarding, governance, animal welfare, finance, HR, hosting, and maintenance workflows where relevant.

---

## 8. Cloudron LAMP Hosting Standard

Use `Cloudron-LAMP-Container-Guidance.md` as the canonical APES CIC reference when a website is expected to run in the Cloudron LAMP app.

Treat Cloudron LAMP as a Linux, Apache, MySQL and PHP hosting environment. It is suitable for Apache-served static websites, browser JavaScript, PHP websites, PHP CLI maintenance scripts, Composer-based PHP dependencies, MySQL-backed PHP applications, Redis-backed PHP features, SMTP email via application libraries, `.htaccess` rules, and Apache-compatible configuration supported by the Cloudron LAMP app.

Do not treat Cloudron LAMP as a general Python, Node, Ruby, Go, Java, WebSocket, worker, or arbitrary long-running process container.

Required Cloudron LAMP rules:

- Build production website work as static HTML, CSS, browser JavaScript, and PHP unless repository evidence confirms another approved deployment target.
- Keep public website files in `/public/` unless local repository guidance clearly says otherwise.
- Prefer Apache-compatible routing, links, assets, redirects, and `.htaccess` rules over framework server routing.
- Do not add production dependencies that require Flask, Django, FastAPI, Celery, Python workers, persistent Python processes, Express, Next.js server mode, Vite dev server mode, WebSocket servers, queue workers, custom daemons, Docker-in-Docker, or unsupported runtime services.
- Treat Python and Node as build-time or local-development tooling only unless repository evidence confirms a different production stack.
- Do not add `requirements.txt`, Python application frameworks, Node server frameworks, or server-only build outputs as production requirements for a LAMP-hosted site.
- Use Cloudron-supplied MySQL, Redis, and SMTP credentials through documented environment variables or configuration files. Do not commit secrets.
- Avoid runtime writes to arbitrary source folders. Use Cloudron documented writable data paths and application configuration patterns where writes are unavoidable.
- Document PHP version assumptions, required PHP extensions, Apache rules, MySQL, Redis, SMTP, writable paths, and build-time tooling in the README where relevant.

Before completing Cloudron LAMP targeted work, confirm that the deployed site can run as static files or PHP under Apache, no production route depends on a Python or Node runtime server, `.htaccess` and Apache assumptions are compatible, and release records, README, generated output, and issue updates reflect hosting impact.

---

## 9. SEO, Sitemap, Footer, Newsroom And Error Pages

Apply these checks whenever website content, structure, navigation, routes, public pages, deployment behavior, generated output, release metadata, or user-visible behavior changes:

- Update page titles, meta descriptions, canonical URLs, Open Graph metadata, and structured data affected by the change.
- Update `sitemap.xml`, sitemap generation configuration, route manifests, or equivalent indexing files.
- Remove deleted, renamed, draft-only, private, duplicate, or noindex routes from the sitemap.
- Confirm robots and noindex rules remain correct for public, private, staging, portal, staff, volunteer, and student routes.
- Confirm navigation, footer links, Change Log Hub links, and canonical URLs point to the current live route.
- Confirm the APES universal footer remains present, accurate, accessible, and consistent across affected pages.
- Confirm footer links for the donation page, Privacy Policy page, Terms of Service page, and Change Log Hub remain present and correct where applicable.
- Confirm APES Newsroom routes remain correct for news, update, announcement, newsletter, footer, navigation, and article-related changes.
- Ensure branded, accessible error pages are present and validated after route, navigation, deployment, build, or hosting changes.

Error pages must include plain-language copy, a route back to the home page, a route to contact or support, and relevant APES brand or footer treatment where technically possible. Error pages must not expose stack traces, secrets, internal system details, private URLs, or debugging output.

---

## 10. Change Log Hub And Release Record Format

The Change Log Hub is the public website release record. It must show every website change that affects users, operations, compliance, release metadata, generated output, public maintenance history, hosting assumptions, or user-visible behavior.

Use the `www.apes.org.uk` Change Log Hub setup as the APES reference pattern. Each Change Log Hub, root `CHANGELOG.md`, and `/public/CHANGELOG.md` entry should use this structure unless repository-specific guidance says otherwise:

```markdown
## [vX.Y.Z] - YYYY-MM-DD

<span class="pill pill-version">Version vX.Y.Z</span>
<span class="pill pill-status">Stable</span>
<span class="pill pill-type">Changed</span>
<span class="pill pill-fix">Fix</span>
<span class="pill pill-accessibility">Accessibility</span>

### Summary

Short plain-language description of the release.

### Detailed changes

- Specific implementation, content, route, styling, configuration, hosting, release-record, or documentation changes.

### Affected areas

- Website: website hostname
- Page or route: affected routes, shared components, generated output, or release records
- Files changed: relevant files or file groups
- User groups affected: relevant visitors, staff, volunteers, supporters, partners, or internal users
- Public impact: user-facing result
- Internal impact: maintenance, operational, compliance, hosting, or workflow result

### Version decision

- Previous version: vX.Y.Z
- New version: vX.Y.Z
- Version type: major, minor, or patch; beta or stable
- Reason for version bump: concise reason grounded in the change

### Validation

- Checks run: commands, source reviews, generated-output checks, hosting checks, or verification-only reviews
- Manual checks completed: routes, breakpoints, footer, Newsroom, sitemap, robots, error pages, Cloudron LAMP compatibility, or other relevant checks
- Known limitations: anything not fully verified
- Rollback notes: how to reverse the change if needed
```

Use pill classes consistently:

- `pill pill-version` for the version label
- `pill pill-status` for `Stable` or `Beta`
- `pill pill-type` for added, changed, removed, or other release categories
- `pill pill-fix` for fixes
- `pill pill-accessibility` for accessibility changes
- `pill pill-compliance` for compliance, policy, safeguarding, legal, governance, privacy, or operational-risk changes

Keep the website Change Log Hub, root changelog, public changelog mirror, README current-release notes, footer version text, generated output, and hosting notes aligned before completing the task.

---

## 11. Versioning Rules

Use APES CIC semantic website versioning in this format:

```text
vMAJOR.MINOR.PATCH
vMAJOR.MINOR.PATCHb
```

The `v` prefix means version. The three numbers mean major updates, minor updates, and patches. The optional `b` suffix means the website is in beta.

Version bump rules:

- Major: breaking route, architecture, public journey, data, compliance, platform, hosting, or operational changes.
- Minor: new user-visible features, new public routes, broad content expansions, new shared components, or meaningful workflow additions that do not break existing journeys.
- Patch: fixes, copy edits, styling polish, metadata corrections, dependency or configuration fixes, hosting configuration clarifications, generated-output syncs, and small maintenance changes.
- Beta suffix: keep `b` on versions while the website is in beta, for example `v2.2.0b`; remove it only when the website is intentionally promoted to stable.
- Stable versions omit the suffix, for example `v2.8.6`.

When a versioned change is required and the user has not specified the version bump or release channel, ask:

1. Is this a Major, Minor, or Patch update?
2. Should the new version be Stable, formatted like `v0.0.0`, or Beta, formatted like `v0.0.0b`?

Use the user's answers as the version decision. Do not create a changelog entry without a matching version decision, and do not update a version without a matching changelog entry.

---

## 12. Issue, Pull Request And Changed-File Reporting

When a task is attached to a GitHub Issue, keep that issue updated throughout the work rather than saving all context for the final reply.

Post an issue update when work starts or resumes, a file is changed, scope or assumptions change, validation completes or cannot complete, a blocker or follow-up is discovered, the implementation is ready for review, or work is completed, deferred, or handed back.

Every issue update, pull request update, review response, merge summary, release note, and final reply for issue-tracked work must include a `Files changed` section. List each changed file path and add a short note explaining what changed in that file. If no files changed since the previous update, say so explicitly.

Do not close an issue until the issue contains a clear completion note with changed files, validation performed, release-record status, hosting status, remaining limitations, and follow-up work.

---

## 13. Final Response Requirements

When reporting completed repository work, clearly state:

- what was created, updated, reviewed, or left unchanged
- files changed, with each file path and a short explanation
- validation performed and any remaining risks
- whether Change Log Hub, root changelog, public changelog, version records, README current-release notes, and generated release output were updated or why they were not applicable
- whether Cloudron LAMP compatibility, hosting assumptions, PHP/Apache compatibility, runtime dependency constraints, and README hosting notes were updated or verified where relevant
- whether GitHub Issues were updated, should be updated, closed, left open, or were not applicable
- for website repositories, whether APES brand standards, Newsroom routing, universal footer compliance, footer links, SEO metadata, sitemap records, robots or noindex rules, and error pages were updated or verified, or why they were not applicable
- whether the work was applied locally, applied directly to GitHub, prepared for pull request review, merged, or left pending user confirmation
- the next recommended step
- a concise proposed commit message

Keep final responses concise, practical, and transparent about user decisions still needed.

---

## 14. Maintaining This File

When updating this file, preserve APES CIC operational rules unless the user explicitly asks to replace them.

Prefer revisions that:

- keep the file suitable for VS Code, Codex, and GitHub repository workflows
- separate editor-specific workflow guidance from repository-wide rules
- preserve mandatory APES CIC changelog, Change Log Hub, README, issue tracking, versioning, SEO, sitemap, universal footer, footer link, Newsroom routing, generated-output, error-page, and Cloudron LAMP requirements
- avoid GitHub-only, Codex-only, or VS Code-only wording unless that distinction is operationally important
- stay aligned with actual repository structure and release workflow

Do not invent repository facts, deployment steps, hosting support, technical requirements, or third-party services that are not supported by the repository or the user's instructions.
