# APES CIC Visual Studio Code Agent Instructions

Use these instructions as the default Visual Studio Code working profile for APES CIC website repositories and related website codebases maintained by the Association of Protecting Exotic Species CIC.

These instructions apply when working in Visual Studio Code, the Codex IDE extension, or another VS Code-based coding environment on APES CIC website, repository, documentation, release, changelog, SEO, sitemap, footer, Newsroom, compliance, hosting, or maintenance tasks.

If a repository contains its own `AGENTS.md`, `README.md`, contribution guide, workspace settings, extension recommendations, issue, pull request, or task-specific instruction, follow that local guidance as well. If local guidance conflicts with this profile, ask the user before weakening any APES CIC compliance, changelog, Change Log Hub, versioning, SEO, sitemap, footer, error-page, issue-tracking, Cloudron LAMP hosting, or documentation requirement.

Use companion `INSTRUCTIONS.md` files as day-to-day maintainer playbooks. Use `AGENTS.md` files as durable agent rules. Codex reads `AGENTS.md` before work, so keep this file concise, operational, and suitable for both local VS Code extension sessions and Codex handoffs.

When GitHub work is involved, the VS Code agent must guide the user through the best next GitHub action at each stage. Prompt the user before pull, issue creation, branch creation or switching, commit, push, pull request creation or update, merge, deployment, and issue closure. Give the user concise options, recommend the safest next step, and explain why that action is appropriate now.

---

## Project

This is a website project. Confirm with the user before creating or switching branches; do not change branches without explicit agreement.

## Setup

Run repository-defined setup commands first. For Node-based APES CIC website repositories, start with:

```bash
npm install
```

If `npm install` fails, capture and report the terminal error output, stop further actions that depend on installed packages, and offer concrete remediation options.

## Local Development

Use repository-defined development commands first. For Node-based APES CIC website repositories, the common command is:

```bash
npm run dev
```

## Checks Before Completion

Run repository-defined checks first. For Node-based APES CIC website repositories, run the scripts that exist:

```bash
npm run lint
npm run typecheck
npm run test:e2e
```

If a script is missing, inspect `package.json` and run the closest repository-supported validation command. Do not add temporary scripts or dependencies unless the user approves.

## Safety

Do not edit production secrets. If build or setup requires credentials or environment variables that are not present locally, do not add secrets. Report what is missing and ask the user to provide secure access or run the remote step.

Do not deploy automatically. Do not create issues, create or switch branches, pull, commit, push, open pull requests, merge, or close issues unless explicitly asked or clearly approved. Before any GitHub action that changes local history, remote branches, issues, pull requests, releases, deployments, or repository state, provide the diff summary or current state, validation output where relevant, the recommended next step, and clear options for the user to choose from.

---

## 1. Operating Principles

Before changing a repository, understand the repository structure, the user's request, the current branch, the issue or pull request context, and the likely public, operational, compliance, hosting, or maintenance impact of the work.

Prefer focused edits. Avoid broad refactors unless they are necessary for the task. If the fix grows beyond the agreed scope, touches shared components, or changes more than a few files, pause and ask the user before expanding scope.

Do not invent repository facts, deployment processes, issue numbers, version numbers, routes, branch names, technical requirements, hosting support, runtimes, or third-party services. If required context is missing, inspect the repository first. If the repository does not contain enough evidence, explain the assumption and choose the safest general approach.

Do not remove or weaken mandatory APES CIC requirements unless the user explicitly asks for that specific removal.

When a GitHub decision is due, do not leave the user to infer the next action. State the recommended GitHub step, the reason it is the right moment, what will change if approved, and what can safely wait.

---

## 2. Codex IDE Extension Working Method

Use the Codex IDE extension as the preferred VS Code coding partner when available. Treat it as a local implementation and review surface that works beside the editor, Source Control, terminal, diagnostics, and file tree.

When using the Codex extension:

1. Open the correct repository root or workspace folder before starting the session.
2. Start a fresh Codex session after changing `AGENTS.md`, `INSTRUCTIONS.md`, `.vscode/`, workspace files, or Codex configuration so the active context is current.
3. Make sure the Codex session has the correct task, repository, branch, issue or pull request link, scope, non-scope, validation expectations, and GitHub action boundaries.
4. Prefer local Codex work for interactive editing, inspection, diff review, validation, and quick iteration.
5. Use Codex Cloud or delegated work only when the user explicitly chooses that path or the task is suitable for asynchronous execution; review returned changes locally before treating them as finished.
6. Use VS Code Explorer, Search, Problems, Source Control, terminal output, and file diffs as evidence. Do not rely only on a chat summary from Codex.
7. If Codex proposes edits, make sure they are applied, saved, and visible in Source Control before validation or handoff.
8. If Codex cannot run a command, inspect a file, or access required context, record the limitation and decide whether to continue locally, ask the user, or stop.

The Codex extension can help implement, explain, debug, and review code, but the VS Code agent remains responsible for deciding when the work is complete enough to move to GitHub actions.

---

## 3. Visual Studio Code Working Method

When starting work in Visual Studio Code:

1. Inspect the repository tree, local `AGENTS.md`, `INSTRUCTIONS.md`, `README.md`, package scripts, `.vscode/`, workspace files, changelogs, version files, and any task-specific instructions before editing.
2. Check the current branch and working tree in VS Code Source Control or with `git status`.
3. If the workspace is a local clone, ask whether to pull the latest changes before planning when the user has not already confirmed the repository is current.
4. Check whether there is an existing GitHub Issue. Ask for the issue number or link if one exists.
5. If no issue is provided, guide the user through the issue decision: open a new issue before implementation, draft issue text for review, or proceed without an issue only when the change is genuinely trivial.
6. Triage the issue or proposed issue by confirming scope, priority, affected files or routes, acceptance criteria, labels, assignees, milestone, blockers, branch or pull request linkage, release impact, compliance impact, and hosting impact.
7. Verify the release state and repository rules before editing. Check versions, changelogs, Change Log Hub records, README current-release notes, generated output, hosting constraints, and repository-specific instructions where present.
8. Confirm the branch path before editing. Use an existing branch only after confirming it with the user, or create a short task-specific branch when the user approves branch creation.
9. Use VS Code Explorer, workspace search, diagnostics, integrated terminal tasks, Codex extension context, and Source Control diff views to keep the work grounded in the actual repository. If running outside interactive VS Code, use CLI equivalents such as `git status`, `git diff`, `rg`, linters, typecheckers, and test runners, and state which commands replaced editor actions.
10. Implement the smallest safe change that satisfies the request while preserving APES CIC requirements and local repository conventions.
11. At each transition point, prompt for the next GitHub action only when the repository evidence supports it: issue update after scope is clear, branch before editing, commit after validation and diff review, push after commit, pull request after push, merge after review and checks, and issue closure after completion is documented.
12. Keep issue, pull request, and final notes aligned with changed files, validation performed, release-record status, hosting status, known limitations, and next steps.

When editing:

- Preserve existing structure and style where it is clear and usable.
- Keep changes focused on the user's request.
- Avoid broad refactors unless they are necessary for the task.
- Do not revert unrelated user, branch, workspace, or repository changes.
- Prefer clear, auditable wording for policy, compliance, changelog, versioning, hosting, and release notes.
- Treat VS Code warnings, TypeScript errors, lint diagnostics, test failures, failed terminal tasks, and Codex-reported limitations as signals to investigate before completing the work.
- Do not depend on unsaved editor buffers. Make sure intended changes are accepted, applied, and saved before running validation or summarising work.

---

## 4. Safe To Move On Gate

Codex or VS Code work is not finished just because an edit was made or a Codex response says it is done. Treat implementation as finished only when the safe-to-move-on gate is met.

Before recommending commit, push, pull request, merge, issue closure, or no further action, confirm:

- the requested scope is complete, or remaining work is clearly named as deferred or blocked
- all intended Codex or VS Code edits are applied and saved
- Source Control or `git diff` shows only intended changes
- unrelated user or branch changes are identified and left untouched
- repository-defined validation has passed, or failures are explained with cause and next options
- VS Code Problems, terminal output, and Codex limitations have been reviewed where relevant
- release records, README, changelog, Change Log Hub, SEO, sitemap, footer, Newsroom, error-page, generated-output, and Cloudron LAMP impacts have been checked where relevant
- issue and pull request notes are ready or updated when the work is issue-tracked
- the changed-file summary and proposed commit message are ready

When this gate is met, state clearly: "Implementation is complete and it is safe to move on to the next GitHub step." Then recommend exactly one next step, such as issue update, commit, push, pull request, review, merge, issue closure, or no further action.

If the gate is not met, do not recommend committing or pushing yet. State what remains to be checked, fixed, saved, validated, or decided.

---

## 5. Issue-First Workflow

Use this workflow whenever work might be more than a trivial correction, affects public content or repository behavior, or benefits from an audit trail.

The VS Code agent should actively help the user decide whether an issue is needed. It should recommend an issue when the change affects public content, code behavior, repository workflow, release records, hosting, compliance, SEO, sitemap, footer, Newsroom routing, error pages, dependencies, generated output, or more than one file.

### Opening A New Issue

Before creating a new GitHub Issue, confirm the target repository, site or package, problem, expected outcome, urgency, and whether the user wants the issue opened now or drafted for review.

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

Ask before opening the issue unless the user has already explicitly asked you to open it. After opening it, report the issue number and link, then use that issue as the trace for branch, commits, pull request, validation, merge, and closure.

### Starting Work On An Existing Issue

When the user provides an existing issue, read it before planning. Confirm the issue is still current and identify missing acceptance criteria, scope questions, branch expectations, labels, assignees, milestone, release impact, hosting impact, or blockers.

Before editing files, post or prepare a start note that includes:

- current understanding of the task
- planned scope and non-scope
- branch to use or create
- expected changed areas
- validation commands and manual checks
- release-record, README, SEO, sitemap, footer, Newsroom, error-page, and Cloudron LAMP checks that appear applicable

Keep the issue updated when work starts or resumes, a file changes, scope changes, validation completes or fails, a blocker appears, the implementation is ready for review, or work is completed or deferred.

### Proceeding Without An Issue

Proceed without an issue only when the user approves or the change is genuinely trivial. A trivial change is small, low-risk, and usually limited to typo fixes or tiny documentation corrections with no release, hosting, route, SEO, sitemap, footer, generated-output, compliance, dependency, or user-facing behavior impact.

If no issue is supplied, give the user these options:

1. Open a new issue before implementation. Recommend this for most non-trivial work.
2. Draft issue text for the user to review before anything is opened.
3. Proceed without an issue because the change is trivial.
4. Let the user describe a different tracking preference.

---

## 6. Guided GitHub Workflow For VS Code

Use VS Code Source Control and the integrated terminal together. Keep Git and GitHub actions explicit, reversible where possible, and tied to the current stage of work.

The VS Code agent must not simply ask generic Git questions. It should explain the best next GitHub action in context, for example: pull before planning against a local clone, create or confirm an issue before non-trivial work, create a branch before edits, commit after validation, push after commit, open a pull request after push, merge after review and checks, and close or update the issue only after completion is documented.

Do not ask to commit, push, open a pull request, merge, or close an issue until the safe-to-move-on gate has been checked and the user has been told whether the work is ready.

### Pulling Latest Changes

Pull at the start of work, before planning against local files, when the workspace is a local clone and the user wants the latest remote state included.

Best steps:

1. Check the current branch and working tree with Source Control or `git status`.
2. If there are uncommitted changes, identify whether they are user work, previous agent work, or part of this task before pulling.
3. Ask whether to pull latest changes when the user has not already confirmed the clone is current.
4. Prefer `git pull --ff-only` on the confirmed branch so history is not rewritten or merged unexpectedly.
5. If fast-forward pull fails, stop and explain the divergence. Ask whether to rebase, merge, create a new branch, or leave the branch unchanged.
6. Never overwrite local changes to make a pull succeed unless the user explicitly asks for that exact discard.

Prompt when: starting from a local clone, resuming old work, preparing to branch, or when the user asks whether the repository is current.

### Creating Or Maintaining Issues

Create or update GitHub Issues before implementation when the work needs traceability. Maintain the issue as the work changes rather than saving all context for the final response.

Best steps:

1. Search or ask for an existing issue before opening a new one.
2. Draft a clear issue with summary, scope, acceptance criteria, release impact, hosting impact, validation plan, and metadata.
3. Ask whether to open the issue now or keep it as drafted text.
4. Add a start note when implementation begins.
5. Add progress notes when files change, scope changes, validation runs, blockers appear, or review is ready.
6. Add a completion note before asking whether to close the issue.

Prompt when: the task is non-trivial, public-facing, multi-file, release-related, hosting-related, compliance-related, or likely to need follow-up.

### Branching

Use a short task-specific branch for non-trivial work unless the user tells you to use an existing branch.

Best steps:

1. Confirm the base branch, usually `main`, and whether it is current.
2. Name the branch from the issue or task, for example `fix/footer-links` or `issue-123-release-notes`.
3. Link the branch to the issue in issue updates, commits, and pull request text.
4. Do not switch away from a branch with uncommitted work until the user confirms what should happen to those changes.

Prompt when: scope is understood and before making edits that should not land directly on the current branch.

### Commit And Push

Commit and push are separate approval points.

Best steps:

1. Confirm the safe-to-move-on gate is met.
2. Save intended files and inspect the Source Control diff or `git diff`.
3. Run relevant validation or explain why validation cannot run.
4. Prepare a changed-file summary and a concise commit message.
5. Ask whether to commit using that message.
6. After the commit succeeds, ask whether to push the branch.
7. If the push is rejected because the remote moved, stop. Explain whether a pull, rebase, merge, or new branch is safest; do not force-push unless the user explicitly approves and the branch ownership is clear.
8. Never push secrets, generated junk, editor-only files, or unrelated changes.

Prompt to commit when: the implementation is complete, the safe-to-move-on gate is met, the diff has been reviewed, and validation is done or honestly blocked.

Prompt to push when: the local commit exists and the user is ready to publish the branch for backup, CI, review, or pull request creation.

### Pull Requests And Review Support

Open or update a pull request only when requested or when the agreed workflow requires it.

Best steps:

1. Confirm the branch has been pushed.
2. Link the pull request to the issue.
3. Summarize the change, affected files or routes, validation, release-record status, hosting status, and known limitations.
4. Ask whether to open the pull request as draft or ready for review when the repository workflow supports both.
5. Keep the pull request updated when commits, validation results, review responses, or issue status change.
6. Address review comments with focused commits and rerun relevant checks.

Prompt when: the branch is pushed and the work needs review, CI, discussion, or merge tracking.

### Merging And Issue Closure

Merge only after the user approves merging, required checks pass or are intentionally waived, review requirements are satisfied, release records are aligned, and issue-closing behavior is confirmed.

Best steps:

1. Confirm CI, review status, release-record alignment, hosting notes, and known limitations.
2. Confirm the repository's preferred merge method. If none is documented, ask whether to use squash, merge commit, or rebase merge.
3. Confirm whether the merge should close the linked issue automatically or whether the issue should remain open.
4. Merge only after explicit approval.
5. After merge, update or close the linked issue with changed files, validation, release-record status, hosting status, and follow-up work.

Prompt when: the pull request is reviewed, checks are complete, release records are aligned, and the user needs a clear merge-readiness decision.

Preferred GitHub prompts:

1. Would you like me to pull the latest changes before I start? Recommended when this is a local clone or resumed work.
2. Is there an existing GitHub Issue for this work, or should I draft one? Recommended for non-trivial work.
3. Would you like me to open the issue now, keep it as drafted text, or proceed without an issue because this is trivial?
4. What priority, labels, assignees, milestone, acceptance criteria, and hosting impact should the issue use?
5. Should I create a task-specific branch from the current base, or use an existing branch?
6. Codex implementation is complete and the safe-to-move-on gate is met. Would you like me to update the issue, run another review, or proceed to commit preparation?
7. Would you like me to commit these changes using this proposed commit message?
8. Would you like me to push the branch now so it is backed up and ready for CI or review?
9. Would you like me to open or update a pull request as draft or ready for review?
10. The pull request appears ready. Would you like me to merge it, wait for more review, or update the issue first?
11. After merge, should I close the linked issue, leave it open for follow-up, or post a completion note only?

---

## 7. Primary Website Rule

Every APES CIC website update must be planned, versioned where relevant, recorded, validated, checked against APES brand standards, checked against APES Newsroom routing rules where relevant, checked against APES universal footer standards, checked against hosting assumptions, and reflected in relevant GitHub Issues where issue tracking is being used.

Before completing any APES CIC website work, always check whether the following are required:

- Change Log Hub, root `CHANGELOG.md`, `/public/CHANGELOG.md`, version records, generated output, and README current-release notes.
- GitHub Issue start, progress, completion, or closure updates with a changed-file list.
- README updates for setup, workflow, release impact, hosting impact, or operational notes.
- APES brand, Newsroom routing, universal footer, donation, Privacy Policy, Terms of Service, and Change Log Hub footer link checks.
- SEO metadata, sitemap, robots or noindex, and branded error-page checks when routes, navigation, deployment behavior, public pages, or website structure change.
- Cloudron LAMP compatibility checks where the site is expected to run under Apache, PHP, static assets, MySQL, Redis, SMTP, and `.htaccess` constraints.

If there is any uncertainty, assume documentation, changelog, version, release-record, hosting, and issue-tracking checks are required.

---

## 8. Issue Updates And Changed-File Reporting

When a task is attached to a GitHub Issue, keep that issue updated throughout the work rather than saving all context for the final reply.

Every issue update, pull request update, review response, merge summary, and final reply for issue-tracked work must include a `Files changed` section. List each changed file path and add a short note explaining what changed in that file. If no files changed since the previous update, say so explicitly.

Post an issue update when work starts or resumes, a file is changed, scope or acceptance criteria change, validation completes or cannot be completed, a blocker or follow-up appears, the implementation is ready for review, or work is completed, deferred, or handed back.

Do not close an issue until it contains a clear completion note with changed files, validation performed, release-record status, hosting status, remaining limitations, and any follow-up work.

---

## 9. README, Release, Hosting, SEO, And Validation Rules

Use `APESCIC/Website-Repo-Template` `README.md` as the default source template for APES CIC website repository README files. Preserve accurate repository-specific content, keep badges grounded in repository evidence, and keep README current-release notes aligned with version records, changelogs, Change Log Hub records, footer version text, generated output, and hosting notes.

At the start of planning, inspect root `VERSION`, `/public/VERSION`, root `CHANGELOG.md`, `/public/CHANGELOG.md`, Change Log Hub records, README current-release notes, generated output, release metadata, and hosting notes where present. Do not complete the task while those records disagree unless the user explicitly asks to defer the sync.

Use APES CIC semantic website versioning: `vMAJOR.MINOR.PATCH` for stable and `vMAJOR.MINOR.PATCHb` for beta. Ask the user for Major, Minor, or Patch and Stable or Beta before changing version records when the bump is not already specified.

Use `Cloudron-LAMP-Container-Guidance.md` as the canonical APES CIC reference when a website is expected to run in the Cloudron LAMP app. Treat Cloudron LAMP as Apache, PHP, static assets, MySQL, Redis, SMTP, and `.htaccess`, not as a general Python, Node, WebSocket, worker, or arbitrary long-running process host.

Update SEO, sitemap, footer, Newsroom, robots/noindex, and error-page records whenever website structure, routes, navigation, deployment behavior, generated output, public pages, or user-visible behavior changes.

Use VS Code validation feedback and repository scripts together. Prefer repository-defined scripts. If validation cannot be run, say why and describe what was checked manually. Do not claim work is tested, safe, deployed, published, committed, pushed, merged, or issue-closed unless that action actually completed and was verified.

---

## 10. Final Response Requirements

When reporting completed repository work, clearly state:

- what was created, updated, reviewed, or left unchanged
- whether Codex or VS Code implementation is complete, blocked, or ready for user review
- whether the safe-to-move-on gate is met before recommending commit, push, pull request, merge, or issue closure
- files changed, with each file path and a short explanation of the change made in that file
- what validation was performed and any remaining risks or follow-up work
- whether Change Log Hub, root changelog, public changelog, version records, README current-release notes, and generated release output were updated or why they were not applicable
- whether Cloudron LAMP compatibility, hosting assumptions, PHP/Apache compatibility, runtime dependency constraints, and README hosting notes were updated or verified where relevant
- whether GitHub Issues were updated, should be updated, closed, left open, or were not applicable
- for website repositories, whether APES brand standards, Newsroom routing, universal footer compliance, footer links, SEO metadata, sitemap records, robots or noindex rules, and error pages were updated or verified, or why they were not applicable
- whether the work was applied locally, applied directly to GitHub, prepared for pull request review, merged, or left pending user confirmation
- the next recommended step, such as issue update, commit, push, pull request, review, merge, issue closure, or no further action
- a concise proposed commit message covering all work completed in the task when committing is appropriate

Keep the final response concise, practical, and transparent about anything that still needs the user's decision.

---

## 11. Maintaining This AGENTS.md File

When updating this file, preserve APES CIC operational rules unless the user explicitly asks to replace them.

Prefer revisions that keep the file suitable for Visual Studio Code, the Codex IDE extension, and VS Code-based coding-agent execution, make issue and GitHub workflows explicit, teach the agent when to prompt for pull, issue, branch, commit, push, pull request, review, merge, and issue-closure actions, clearly define when Codex or VS Code implementation is complete enough to move to GitHub actions, preserve mandatory APES CIC changelog, Change Log Hub, README, issue tracking, versioning, SEO, sitemap, universal footer, footer link, Newsroom routing, generated-output, error-page, and Cloudron LAMP requirements, separate editor-specific workflow guidance from repository-wide rules, and stay aligned with `GitHub Agent/AGENTS.md` and `Codex Agent/AGENTS.md` where shared standards are intentionally common.

Do not invent repository facts, deployment steps, technical requirements, hosting support, or third-party services that are not supported by the repository or the user's instructions.
