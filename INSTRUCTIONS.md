# APES CIC VS Code Website And GitHub Repository Management Instructions

Use this file as the practical VS Code playbook for managing APES CIC websites and GitHub repositories. It is written for maintainers and agents working together in Visual Studio Code, the Codex IDE extension, Codex, GitHub, or another VS Code-based coding environment.

These instructions support the companion `AGENTS.md` file. Use `AGENTS.md` for durable agent rules and this file for day-to-day website and repository management steps.

The VS Code workflow should guide the user through GitHub actions at the right time. Do not wait until the end to ask about issues, branches, commits, pushes, pull requests, merges, or issue closure. At each transition, explain the best next step, why it is the right moment, what will change if approved, and which action can safely wait.

When using the Codex IDE extension, treat Codex as the local coding partner inside VS Code. Codex can help inspect, edit, debug, validate, and review, but the work is not ready for GitHub actions until the safe-to-move-on checklist in this file is satisfied.

---

## 1. Start Every Task With Orientation

Before editing anything:

1. Confirm the target repository, site, branch, task goal, urgency, and hosting target.
2. Inspect `AGENTS.md`, `INSTRUCTIONS.md`, `README.md`, `package.json`, `.vscode/`, workspace files, changelogs, version files, and any issue or pull request instructions.
3. Check the current Git state in VS Code Source Control or with `git status`.
4. Check whether the repository is current. If working from a local clone, decide with the user whether to pull the latest changes before planning.
5. Check whether there is an existing GitHub Issue. If not, decide with the user whether to create one, draft one, or proceed without one for a genuinely trivial correction.
6. Identify whether the change affects public content, routes, navigation, styling, forms, scripts, release records, generated output, hosting, compliance, privacy, safeguarding, governance, finance, HR, SEO, sitemap, footer, Newsroom routing, or error pages.
7. Recommend the next GitHub action before implementation begins: issue decision, pull decision, branch decision, or no GitHub action yet.

Use VS Code Explorer and workspace search to locate the owning files. Use the integrated terminal for repository-defined commands. Use the Source Control view or `git diff` to review changes before completion.

---

## 2. VS Code And Codex Extension Setup

Use this workflow when pairing with the Codex IDE extension:

1. Open the repository root or correct workspace folder before starting Codex.
2. Start a fresh Codex session when instructions, workspace files, or task scope change materially.
3. Give Codex the target repository, branch, issue or pull request link, scope, non-scope, validation expectations, and GitHub action boundaries.
4. Keep Codex local for quick inspect-edit-validate-review loops unless the user explicitly wants to delegate work to a cloud session.
5. If work is delegated to Codex Cloud or another asynchronous agent, review the returned branch, diff, validation output, and changed-file summary locally before treating the work as complete.
6. Use Codex together with VS Code Explorer, Search, Problems, Source Control, and terminal output. Do not rely only on a Codex chat summary.
7. Make sure Codex edits are accepted or applied, saved to disk, and visible in Source Control before running checks.
8. If Codex cannot access a command, file, dependency, credential, or environment variable, record the limitation and decide whether to continue, ask the user, or stop.

Codex extension work is best for local iteration, explaining unfamiliar files, drafting narrow edits, reviewing diffs, interpreting validation failures, and preparing handoff notes. GitHub actions remain separate approval points.

---

## 3. VS Code Files To Check

For most website work, inspect these files or folders when present:

- `AGENTS.md`
- `INSTRUCTIONS.md`
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

## 4. Safe To Move On Checklist

Use this checklist before telling the user it is safe to commit, push, open a pull request, merge, close an issue, or take no further action.

Codex or VS Code implementation is complete only when:

1. The requested scope is complete, or remaining work is explicitly marked blocked, deferred, or out of scope.
2. All intended Codex edits are applied, accepted where needed, and saved.
3. VS Code Source Control or `git diff` shows only intended changes.
4. Unrelated user, branch, generated, or editor-only changes are identified and excluded from the recommended GitHub action.
5. Required repository checks have run and passed, or failures are explained with cause, impact, and next options.
6. VS Code Problems, terminal output, and Codex-reported limitations have been reviewed.
7. Website release records, README, changelog, Change Log Hub, version files, generated output, SEO, sitemap, footer, Newsroom, error pages, and Cloudron LAMP impact have been checked where relevant.
8. Issue and pull request notes are ready or updated when the work is issue-tracked.
9. A changed-file summary is ready.
10. A proposed commit message is ready when committing is the recommended next step.

Use this status language:

- Ready: "Codex implementation is complete. The safe-to-move-on checklist is met, and the recommended next step is [issue update / commit / push / pull request / review / merge / issue closure / no further action]."
- Blocked: "Codex implementation is not ready to move on yet because [reason]. The next safe step is [specific check, fix, user decision, or validation]."
- Review needed: "The implementation appears complete, but user review is needed before GitHub actions because [reason]."

Do not recommend committing or pushing while the checklist is incomplete.

---

## 5. Guided GitHub Decision Points

Use this section as the quick prompt map. The agent should recommend the safest next step, then ask for approval before taking any action that changes repository state.

| Stage | Best GitHub action | When to prompt the user | Evidence to show first |
| --- | --- | --- | --- |
| Intake | Decide whether to use an issue | Before planning non-trivial work | Task scope, affected areas, risk level |
| Local orientation | Pull latest changes | Before planning from a local clone or resumed branch | Current branch and working tree state |
| Triage | Create, draft, or update an issue | Before implementation when traceability helps | Proposed title, scope, acceptance criteria, labels, milestone if known |
| Pre-edit | Create or confirm branch | After scope is understood and before edits | Base branch, current branch, issue number or task name |
| Implementation complete | Run safe-to-move-on checklist | Before issue update, commit, push, PR, merge, or closure prompts | Saved files, diff, validation, release-impact status |
| Progress | Update issue | When scope changes, files change, blockers appear, or validation runs | Changed files, current status, blocker or validation result |
| Review | Run checks and inspect diff | After implementation and before commit | Saved files, changed-file list, commands to run |
| Commit | Commit changes | After safe-to-move-on checklist, diff review, and validation | Diff summary, validation output, proposed commit message |
| Publish | Push branch | After local commit succeeds | Commit SHA or message, target branch, reason to publish |
| Collaboration | Open or update pull request | After push, when review, CI, or merge tracking is needed | PR title/body draft, linked issue, validation summary |
| Review response | Address PR comments | When review comments or failed checks arrive | Comment list, failed check output, affected files |
| Merge | Merge pull request | After checks pass or are intentionally waived and review is complete | PR status, checks, release-record status, known risks |
| Closure | Close or update issue | After merge or validated completion | Completion note, files changed, validation, follow-up work |

Default recommendation:

1. Use an issue for anything non-trivial.
2. Pull before planning from a local clone when the repository may be stale.
3. Use a task-specific branch before implementation.
4. Run the safe-to-move-on checklist when Codex or VS Code says implementation is done.
5. Commit only after validation and diff review.
6. Push only after the commit is approved.
7. Open a pull request after push when review, checks, or merge tracking are needed.
8. Merge only after explicit approval, checks, review, and release records are aligned.
9. Close an issue only after a completion note exists.

---

## 6. GitHub Issue Workflow

Use an issue-first workflow for any change that is more than a trivial correction, affects public content or repository behavior, or benefits from an audit trail.

Recommend an issue when the change affects code behavior, public content, more than one file, routes, navigation, release records, generated output, hosting, Cloudron LAMP assumptions, compliance, privacy, safeguarding, SEO, sitemap, footer, Newsroom routing, error pages, dependencies, GitHub workflow, or documentation that maintainers rely on.

### Opening A New Issue

Before creating a new GitHub Issue, confirm:

1. Target repository and site or package.
2. Problem, request, or opportunity.
3. Expected outcome.
4. Urgency and priority.
5. Whether the user wants the issue opened now or drafted first.

A good issue should include:

- title: short, action-oriented, and specific
- summary: what is wrong, missing, or requested
- expected outcome: what should be true when complete
- scope: affected files, routes, pages, workflows, or repository areas
- acceptance criteria: concrete checks for completion
- release impact: whether version, changelog, Change Log Hub, generated output, README, SEO, sitemap, footer, or hosting notes may need updates
- hosting impact: Cloudron LAMP, Apache, PHP, static output, build tooling, credentials, or deployment assumptions
- validation plan: commands and manual checks expected
- metadata: priority, labels, assignees, milestone, blockers, related issues, and related pull requests where known

Ask before opening the issue unless the user has already explicitly asked for it. After opening it, record the issue number and link in the working notes and use it as the trace for the branch, commits, pull request, validation, merge, and closure.

Best prompt:

1. Open the issue now with this draft. Recommended for non-trivial work.
2. Keep this as drafted issue text for you to review.
3. Proceed without an issue because this is trivial.
4. Use a different tracking approach you specify.

### Starting Work On An Existing Issue

When an existing issue is supplied:

1. Read the issue before planning.
2. Confirm the issue is still current.
3. Identify missing acceptance criteria, scope questions, branch expectations, labels, assignees, milestone, release impact, hosting impact, or blockers.
4. Check linked pull requests, previous issues, and related comments.
5. Add or prepare a start note before editing.

The start note should include:

- current understanding of the task
- planned scope and non-scope
- branch to use or create
- expected changed areas
- validation commands and manual checks
- release-record, README, SEO, sitemap, footer, Newsroom, error-page, and Cloudron LAMP checks that appear applicable

Keep the issue updated when work starts or resumes, a file changes, scope changes, validation completes or fails, a blocker appears, the implementation is ready for review, or work is completed or deferred.

### Proceeding Without An Issue

Proceed without an issue only when the user approves or the change is genuinely trivial. A trivial change is small, low-risk, and usually limited to typo fixes or tiny documentation corrections with no release, hosting, route, SEO, sitemap, footer, generated-output, compliance, dependency, or user-facing behavior impact.

If no issue is supplied, offer:

1. Open a new issue before implementation.
2. Draft issue text for review.
3. Proceed without an issue because the change is trivial.
4. Or let the user describe a different preference.

---

## 7. GitHub Work Lifecycle

Use this order for GitHub-backed repository work unless the user chooses a different workflow:

1. Intake: confirm request, target repository, target site, urgency, hosting target, and whether the work is issue-tracked.
2. Pull decision: if working from a local clone, ask whether to pull latest changes before planning.
3. Issue decision: identify an existing issue, create one with approval, draft issue text, or proceed without one only for a trivial correction.
4. Triage: confirm scope, affected files or routes, acceptance criteria, release impact, hosting impact, compliance impact, labels, assignees, milestone, blockers, branch strategy, and pull request expectations.
5. Release verification: check versions, changelogs, Change Log Hub, README release notes, generated output, SEO, sitemap, footer, Newsroom, error pages, hosting assumptions, and repository-specific rules.
6. Branch: confirm the branch to use or create a short task-specific branch with approval.
7. Start note: update the issue with scope, branch, planned validation, hosting checks, and expected release-record work.
8. Implementation: make the smallest safe change with VS Code and Codex extension support where useful.
9. Safe-to-move-on check: confirm implementation is complete, saved, reviewed, validated or blocked with explanation, and ready for the next GitHub action.
10. Progress notes: keep the issue current as files change, validation runs, blockers appear, or scope changes.
11. Documentation and release records: update README, changelogs, Change Log Hub, version records, generated output, SEO, sitemap, footer, Newsroom, error-page, and hosting notes where required.
12. Validation: run repository scripts and manual checks relevant to the change.
13. Review: inspect the diff and prepare a changed-file summary.
14. Completion note: prepare or post an issue update with changed files, validation, release-record status, hosting status, known limitations, and follow-up work.
15. Commit: propose a commit message and commit only after approval.
16. Publish: push only after approval.
17. Pull request: open or update a pull request only after approval or when the agreed workflow requires it.
18. Review support: respond to comments, update the branch, rerun checks, and keep the issue and pull request accurate.
19. Merge: merge only after user approval, passing or intentionally waived checks, satisfied review requirements, aligned release records, and confirmed issue-closing behavior.
20. Closure: close the issue only when the user approves or the agreed workflow clearly allows closure after validated completion or merge.
21. Final summary: state changed files, validation, safe-to-move-on status, issue status, pull request or merge status, release-record status, hosting status, remaining risks, and the commit message used or proposed.

At each numbered stage, state whether a GitHub action is due now, can wait, or is not needed. This keeps the user in control without forcing them to remember the workflow.

---

## 8. Pulling, Branching, Committing, Pushing, PRs, And Merging

Use VS Code Source Control and the integrated terminal together. Keep Git actions explicit and reversible.

### Pulling Latest Changes

Pull at the start of work, before planning against local files, when the workspace is a local clone and the user wants the latest remote state included.

Best steps:

1. Check the current branch and working tree with Source Control or `git status`.
2. If there are uncommitted changes, identify whether they are user work, previous agent work, or part of this task before pulling.
3. Ask whether to pull latest changes when the user has not already confirmed the clone is current.
4. Prefer `git pull --ff-only` on the confirmed branch so history is not rewritten or merged unexpectedly.
5. If fast-forward pull fails, stop and explain the divergence. Ask whether to rebase, merge, create a new branch, or leave the branch unchanged.
6. Never overwrite local changes to make a pull succeed unless the user explicitly asks for that exact discard.

Prompt when:

- beginning work in a local clone
- resuming an old branch
- creating a branch from a base that may be stale
- preparing to review or merge changes from remote

Do not prompt to pull when working directly through GitHub file edits unless the task also involves a local clone.

### Branching

Use a short task-specific branch for non-trivial work unless the user tells you to use an existing branch.

Best steps:

1. Confirm the base branch, usually `main`, and whether it is current.
2. Name the branch from the issue or task, for example `fix/footer-links` or `issue-123-release-notes`.
3. Link the branch to the issue in issue updates, commits, and pull request text.
4. Do not switch away from a branch with uncommitted work until the user confirms what should happen to those changes.

Prompt when:

- the scope is clear
- an issue exists or the user has approved proceeding without one
- editing on the current branch would make review, rollback, or merge tracking harder

### Commit

Commit only after the implementation has been reviewed and validation has passed or has been honestly blocked.

Best steps:

1. Confirm the safe-to-move-on checklist is met.
2. Save all intended files.
3. Inspect the Source Control diff or `git diff`.
4. Run relevant validation.
5. Confirm no secrets, generated junk, editor-only files, or unrelated changes are included.
6. Prepare a changed-file summary.
7. Propose a concise commit message.
8. Ask the user whether to commit using that message.

Prompt when:

- Codex or VS Code implementation is complete
- the safe-to-move-on checklist is met
- the diff is understood
- checks have run or cannot run for a stated reason
- the user needs a clean checkpoint before push or pull request work

### Push

Push only after a local commit exists and the user approves publishing it.

Best steps:

1. Confirm the branch name and latest commit message.
2. Explain why pushing is useful now: backup, CI, review, pull request, or remote handoff.
3. Ask whether to push the branch.
4. If the push is rejected because the remote moved, stop. Explain whether a pull, rebase, merge, or new branch is safest.
5. Do not force-push unless the user explicitly approves and branch ownership is clear.

Prompt when:

- the branch has a commit that should be shared
- CI or review requires a remote branch
- the user wants a pull request

### Pull Requests

Open or update a pull request only when requested or when the agreed workflow requires it.

Best steps:

1. Confirm the branch has been pushed.
2. Link the pull request to the issue.
3. Prepare a title and body with summary, affected files or routes, validation, release-record status, hosting status, and known limitations.
4. Ask whether to open as draft or ready for review when the repository supports both.
5. Keep the pull request updated when commits, validation results, review responses, or issue status change.

Prompt when:

- the branch is pushed
- review, CI, discussion, or merge tracking is needed
- an existing pull request should be updated after follow-up commits

### Review Support

Support pull request review by keeping changes focused and evidence-backed.

Best steps:

1. Read review comments and failed checks before editing.
2. Identify whether each comment requires a code change, documentation change, explanation, or follow-up issue.
3. Make focused edits.
4. Rerun relevant validation.
5. Update the pull request and issue with what changed.
6. Ask whether to resolve comments when the platform requires explicit resolution.

Prompt when:

- review comments arrive
- CI fails
- a reviewer asks for clarification
- a comment should become a follow-up issue rather than part of the current pull request

### Merge

Merge only after user approval, passing or intentionally waived checks, satisfied review requirements, aligned release records, and confirmed issue-closing behavior.

Best steps:

1. Confirm pull request status, required checks, review state, release-record status, hosting status, and known limitations.
2. Confirm the repository's preferred merge method. If none is documented, ask whether to use squash, merge commit, or rebase merge.
3. Confirm whether the merge should close the linked issue automatically or whether the issue should remain open.
4. Merge only after explicit approval.
5. After merge, update or close the linked issue with changed files, validation, release-record status, hosting status, and follow-up work.

Prompt when:

- review is complete
- checks have passed or the user is intentionally waiving them
- release records and documentation are aligned
- the user needs a clear merge-readiness decision

---

## 9. Preferred GitHub Prompts

Use these prompts when guiding the user. Keep them concise, and recommend the best option for the current stage.

1. Pull: "Would you like me to pull the latest changes before I start? Recommended because this is a local clone and we should plan from the current remote state."
2. Issue: "Is there an existing GitHub Issue for this work, or should I draft one? Recommended because this is more than a trivial correction."
3. Open issue: "Would you like me to open this issue now, keep it as drafted text, or proceed without an issue because this is trivial?"
4. Triage: "What priority, labels, assignees, milestone, acceptance criteria, and hosting impact should this issue use?"
5. Branch: "Should I create a task-specific branch from the current base, or use an existing branch? Recommended before editing so the work is reviewable."
6. Start note: "Would you like me to post a start note on the issue before implementation begins? Recommended when this issue is being actively worked."
7. Progress: "Files have changed and validation is next. Would you like me to update the issue now or wait until checks complete?"
8. Validation: "Would you like me to run the repository checks now? Recommended before commit."
9. Safe to move on: "Codex implementation is complete and the safe-to-move-on checklist is met. Would you like me to prepare the commit, update the issue, or pause for your review?"
10. Commit: "Would you like me to commit these changes using this proposed commit message?"
11. Push: "Would you like me to push this branch now so it is backed up and ready for CI or review?"
12. Pull request: "Would you like me to open or update a pull request as draft or ready for review?"
13. Review response: "Would you like me to address these review comments now, reply with context, or turn any of them into follow-up issues?"
14. Merge: "The pull request appears ready. Would you like me to merge it, wait for more review, or update the issue first?"
15. Closure: "After merge, should I close the linked issue, leave it open for follow-up, or post a completion note only?"

When the user asks for the best next step, choose one recommendation and explain it briefly instead of listing every possible GitHub action.

---

## 10. Issue Updates And Changed-File Reporting

When a task is attached to a GitHub Issue, keep that issue updated throughout the work rather than saving all context for the final reply.

Every issue update, pull request update, review response, merge summary, and final reply for issue-tracked work must include a `Files changed` section. List each changed file path and add a short note explaining what changed in that file. If no files changed since the previous update, say so explicitly.

Post an issue update when:

- work starts or resumes
- a file is changed
- scope, assumptions, or acceptance criteria change
- validation is completed or cannot be completed
- a blocker, risk, or follow-up item is discovered
- the implementation is ready for review
- work is completed, deferred, or handed back to the user

Do not close an issue until it contains a clear completion note with changed files, validation performed, release-record status, hosting status, remaining limitations, and any follow-up work.

---

## 11. Standard Commands

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

## 12. Website Release Checks

At the start of planning, check release state where files exist:

- root `VERSION`
- `public/VERSION`
- root `CHANGELOG.md`
- `public/CHANGELOG.md`
- Change Log Hub page or source data
- README current-release notes
- footer version display
- generated static snapshots or release metadata
- hosting and Cloudron LAMP notes where relevant

For changes that affect public content, routes, components, forms, navigation, styling, layout, scripts, site configuration, generated output, hosting, compliance, SEO, accessibility, or user-visible behavior, expect to update release records.

Do not update a version without a matching changelog entry. Do not create a changelog entry without a version decision when the repository uses versioning.

When the user has not chosen the bump, ask:

1. Is this a Major, Minor, or Patch update?
2. Should the new version be Stable, formatted like `v0.0.0`, or Beta, formatted like `v0.0.0b`?

---

## 13. Changelog And Change Log Hub

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

## 14. README Management

Use `APESCIC/Website-Repo-Template` `README.md` as the default structure for APES CIC website repositories.

When a repository has no README, create one from the template and adapt it to the actual repository. Do not leave placeholders unresolved unless the value is genuinely unknown and the final summary names the missing information.

Update README content when changes affect setup commands, local development workflow, environment variables, repository structure, website areas, connected services, design direction, component standards, testing expectations, issue workflow, documentation standards, security or compliance, release impact, current version, Change Log Hub status, changelog status, deployment notes, hosting assumptions, Cloudron LAMP compatibility, or operational maintenance guidance.

README badges should reflect repository evidence, not guesses. Useful badges can include website, status, theme, accessibility, version, licence, CI, deployment host, tests, security, documentation, hosting, or review status.

---

## 15. Cloudron LAMP Rules

When a site is expected to run on Cloudron LAMP, build for static files and PHP under Apache unless repository evidence confirms another approved target.

Cloudron LAMP supports static HTML, CSS, images, fonts, browser JavaScript, PHP websites, PHP CLI maintenance scripts within container constraints, Composer-based PHP dependencies where allowed, MySQL-backed PHP applications using Cloudron credentials, Redis-backed PHP features where configured, SMTP email from PHP libraries or application code, Apache configuration, and `.htaccess` behavior supported by Cloudron LAMP.

Do not add production requirements for Flask, Django, FastAPI, Celery, long-running Python workers, Node/Express, Next.js server mode, Vite dev server mode, WebSocket servers, queue workers, custom daemons, Docker-in-Docker, or arbitrary persistent processes.

Treat Python and Node as build-time or local development tooling only unless the repository documents a different production stack.

Before completing Cloudron LAMP work, confirm the deployed site can run as static files or PHP under Apache, no production route depends on a Python or Node runtime server, MySQL, Redis, and SMTP use Cloudron-supplied credentials or documented configuration, `.htaccess`, Apache, PHP, and public asset assumptions are compatible, and README, changelog, Change Log Hub, version records, generated output, and issue updates reflect hosting impact.

---

## 16. SEO, Sitemap, Footer And Error-Page Checks

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

## 17. VS Code And Codex Validation Loop

Use this loop while working:

1. Search and inspect before editing.
2. Make the smallest safe change with Codex extension assistance where useful.
3. Apply, accept, and save all intended edits.
4. Run the relevant repository scripts.
5. Check VS Code Problems, terminal output, Codex limitations, and Source Control.
6. Inspect the Source Control diff.
7. Update release records, docs, issue notes, and PR notes where required.
8. Re-run checks after meaningful fixes.
9. Run the safe-to-move-on checklist.
10. Prepare the final changed-file summary and proposed commit message.
11. Ask for the next GitHub action: issue update, commit, push, pull request, merge readiness, issue closure, or no further action.

If working outside VS Code, use CLI equivalents and state which commands replaced editor actions.

---

## 18. Completion Summary

Before handing work back, prepare a concise summary that includes:

- what changed
- whether Codex or VS Code implementation is complete, blocked, or ready for user review
- whether the safe-to-move-on checklist is met
- `Files changed`, with a short note for each path
- validation performed and any checks that could not run
- issue status and whether the issue should be updated or closed
- pull request, merge, and branch status
- release-record, README, hosting, SEO, sitemap, footer, Newsroom, and error-page status where relevant
- known limitations or follow-up work
- proposed commit message or commit message used when committing is appropriate
- next recommended step: issue update, commit, push, pull request, review, merge, issue closure, or no further action

The final line should make the recommended next GitHub action clear, even when the recommendation is to take no further action.
