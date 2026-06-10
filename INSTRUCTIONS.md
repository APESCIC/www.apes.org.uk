# APES CIC VS Code Website And GitHub Repository Management Instructions

Use this file as a practical VS Code playbook for managing APES CIC websites and GitHub repositories. It is written for maintainers and agents working together in Visual Studio Code, Codex, GitHub, or a VS Code-based coding environment.

These instructions support the companion `AGENTS.md` file. Use `AGENTS.md` for durable agent rules and this file for day-to-day website and repository management steps.

---

## 1. Start Every Task With Orientation

Before editing anything:

1. Confirm the target repository, site, branch, and task goal.
2. Inspect `AGENTS.md`, `README.md`, `package.json`, `.vscode/`, workspace files, changelogs, version files, and any issue or pull request instructions.
3. Check whether the repository is current. If working from a local clone, decide whether to pull the latest changes before planning.
4. Check whether there is an existing GitHub Issue. If not, decide whether to create one, draft one, or proceed without one for a trivial correction.
5. Identify whether the change affects public content, routes, navigation, styling, forms, scripts, release records, generated output, hosting, compliance, privacy, safeguarding, governance, animal welfare, finance, HR, SEO, sitemap, footer, Newsroom routing, or error pages.

Use VS Code Explorer and workspace search to locate the owning files. Use the integrated terminal for repository-defined commands. Use the Source Control view or `git diff` to review changes before completion.

---

## 2. VS Code Files To Check

For most website work, inspect these files or folders when present:

- `AGENTS.md`
- `README.md`
- `VERSION`
- `public/VERSION`
- `CHANGELOG.md`
- `public/CHANGELOG.md`
- `package.json`
- `.vscode/settings.json`
- `.vscode/tasks.json`
- `.vscode/launch.json`
- `.code-workspace` files
- `public/`
- sitemap, robots, route manifest, SEO, release metadata, footer, and Change Log Hub source files

For multi-site or monorepo repositories, do not assume the first `public/` folder is the target. Confirm the target site and path.

---

## 3. GitHub Work Lifecycle

Use this order for GitHub-backed repository work unless the user chooses a different workflow:

1. Intake: confirm request, target repository, target site, urgency, and hosting target.
2. Issue: identify an existing issue, create one with approval, draft issue text, or proceed without one for a trivial change.
3. Triage: confirm scope, affected files or routes, acceptance criteria, release impact, hosting impact, compliance impact, labels, assignees, milestone, and blockers.
4. Branch: confirm the branch to use or create a short task-specific branch with approval.
5. Release verification: check versions, changelogs, Change Log Hub, README release notes, generated output, and hosting assumptions.
6. Implementation: make the smallest safe change.
7. Validation: run repository scripts and manual checks relevant to the change.
8. Documentation and release records: update README, changelogs, Change Log Hub, version records, sitemap, SEO, footer, generated output, and hosting notes where required.
9. Review: inspect the diff and prepare a changed-file summary.
10. Commit: propose a commit message and commit only after approval.
11. Publish: push only after approval.
12. Pull request: open or update a pull request only after approval or when the agreed workflow requires it.
13. Merge and closure: merge or close issues only after checks, review, release-record alignment, and user approval.

Keep GitHub Issues and pull requests updated with changed files, validation performed, release-record status, hosting status, known limitations, and follow-up work.

---

## 4. Standard Commands

Use repository-defined scripts first. For Node-based website repositories, the common commands are:

```bash
npm install
npm run dev
npm run lint
npm run typecheck
npm run test:e2e
```

If a script is missing, inspect `package.json` and run the closest supported command. Do not add temporary scripts or dependencies unless the user approves.

If validation fails:

1. Stop and read the failure.
2. Identify whether the failure was caused by the current change, missing environment setup, pre-existing repository state, or unavailable credentials.
3. Fix current-change failures when the fix is within scope.
4. Report pre-existing failures honestly and include the relevant output.
5. Do not claim the work is tested unless the checks actually passed.

---

## 5. Website Release Checks

At the start of planning, check release state where files exist:

- root `VERSION`
- `public/VERSION`
- root `CHANGELOG.md`
- `public/CHANGELOG.md`
- Change Log Hub page or source data
- README current-release notes
- footer version display
- generated static snapshots or release metadata

For changes that affect public content, routes, components, forms, navigation, styling, layout, scripts, site configuration, generated output, hosting, compliance, SEO, accessibility, or user-visible behavior, expect to update release records.

Do not update a version without a matching changelog entry. Do not create a changelog entry without a version decision when the repository uses versioning.

When the user has not chosen the bump, ask:

1. Is this a Major, Minor, or Patch update?
2. Should the new version be Stable, formatted like `v0.0.0`, or Beta, formatted like `v0.0.0b`?

---

## 6. Changelog And Change Log Hub

Use this release-entry shape for Change Log Hub, root changelog, and public changelog entries unless repository-specific guidance says otherwise:

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

Keep root changelog, public changelog, Change Log Hub, README current-release notes, version files, footer version text, and generated output aligned.

---

## 7. README Management

Use `APESCIC/Website-Repo-Template` `README.md` as the default structure for APES CIC website repositories.

When a repository has no README, create one from the template and adapt it to the actual repository. Do not leave placeholders unresolved unless the value is genuinely unknown and the final summary names the missing information.

Update README content when changes affect:

- setup commands
- local development workflow
- environment variables
- repository structure
- website areas
- connected services
- design direction
- component standards
- testing expectations
- issue workflow
- documentation standards
- security or compliance
- release impact
- current version
- Change Log Hub status
- changelog status
- deployment notes
- hosting assumptions
- Cloudron LAMP compatibility
- operational maintenance guidance

README badges should reflect repository evidence, not guesses. Useful badges can include website, status, theme, accessibility, version, licence, CI, deployment host, tests, security, documentation, hosting, or review status.

---

## 8. Cloudron LAMP Rules

When a site is expected to run on Cloudron LAMP, build for static files and PHP under Apache unless repository evidence confirms another approved target.

Cloudron LAMP supports:

- static HTML, CSS, images, fonts, and browser JavaScript served by Apache
- PHP websites and PHP applications
- PHP CLI maintenance scripts within container constraints
- Composer-based PHP dependencies where allowed
- MySQL-backed PHP applications using Cloudron credentials
- Redis-backed PHP features where configured
- SMTP email from PHP libraries or application code
- Apache configuration and `.htaccess` behavior supported by Cloudron LAMP

Do not add production requirements for Flask, Django, FastAPI, Celery, long-running Python workers, Node/Express, Next.js server mode, Vite dev server mode, WebSocket servers, queue workers, custom daemons, Docker-in-Docker, or arbitrary persistent processes.

Treat Python and Node as build-time or local development tooling only unless the repository documents a different production stack.

Before completing Cloudron LAMP work, confirm:

- the deployed site can run as static files or PHP under Apache
- no production route depends on a Python or Node runtime server
- MySQL, Redis, and SMTP use Cloudron-supplied credentials or documented configuration
- `.htaccess`, Apache, PHP, and public asset assumptions are compatible
- README, changelog, Change Log Hub, version records, generated output, and issue updates reflect hosting impact

---

## 9. SEO, Sitemap, Footer And Error-Page Checks

Run these checks whenever routes, public pages, navigation, deployment behavior, generated output, or website structure changes:

- Update page titles, meta descriptions, canonical URLs, Open Graph metadata, and structured data.
- Update `sitemap.xml`, sitemap generation configuration, route manifests, or equivalent indexing files.
- Remove deleted, renamed, draft-only, private, duplicate, or noindex routes from the sitemap.
- Confirm robots and noindex rules remain correct.
- Confirm navigation, footer links, Change Log Hub links, and canonical URLs point to current live routes.
- Confirm the APES universal footer remains present, accurate, accessible, and consistent.
- Confirm donation, Privacy Policy, Terms of Service, and Change Log Hub footer links.
- Confirm APES Newsroom routes for news, updates, announcements, newsletters, footer, navigation, and article-related changes.
- Verify branded, accessible 404 pages and any supported 403, 500, offline, maintenance, or fallback pages.

Error pages must not expose stack traces, secrets, internal system details, private URLs, or debugging output.

---

## 10. VS Code Validation Loop

Use this loop while working:

1. Search and inspect before editing.
2. Make the smallest safe change.
3. Save all intended files.
4. Run the relevant repository scripts.
5. Check VS Code Problems and terminal output.
6. Inspect the Source Control diff.
7. Update release records, docs, issue notes, and PR notes where required.
8. Re-run checks after meaningful fixes.
9. Prepare the final changed-file summary and proposed commit message.

If working outside VS Code, use CLI equivalents and state which commands replaced editor actions.

---

## 11. Changed-File Reporting

For issue-tracked work, every issue update, pull request update, review response, merge summary, release note, and final summary should include:

```markdown
### Files changed

- `path/to/file`: short plain-language explanation of the change.
```

Also include:

- validation performed
- release-record status
- README and documentation status
- hosting and Cloudron LAMP status where relevant
- SEO, sitemap, footer, Newsroom, and error-page status where relevant
- known limitations or follow-up work
- next GitHub step

---

## 12. Commit And Pull Request Guidance

Before committing:

1. Inspect `git status`.
2. Inspect `git diff` or the VS Code Source Control diff.
3. Confirm validation results.
4. Prepare a concise commit message.
5. Ask the user for approval.

Before opening or updating a pull request, prepare:

- summary of the change
- linked issue
- files changed
- validation performed
- release-record and version status
- README and documentation status
- hosting and Cloudron LAMP status
- SEO, sitemap, footer, Newsroom, and error-page status where relevant
- known limitations and follow-up work

Do not merge until the user asks, required checks and reviews are satisfied, release records are aligned, and issue-closing behavior is confirmed.

---

## 13. Final Handoff Checklist

A complete handoff should answer:

- What changed?
- Which files changed?
- What validation ran?
- Were changelog, Change Log Hub, version, README, and generated output updates completed or not applicable?
- Were hosting and Cloudron LAMP assumptions checked or not applicable?
- Were SEO, sitemap, footer, Newsroom, robots, noindex, and error pages checked or not applicable?
- Were GitHub Issues or pull requests updated, left open, or not applicable?
- What remains risky, blocked, or deferred?
- What is the proposed commit message?
- What is the next recommended GitHub step?

Keep the handoff concise and evidence-based. Do not claim work was tested, committed, pushed, deployed, merged, or issue-closed unless that action actually happened.
