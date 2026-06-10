# INSTRUCTIONS.md

## Purpose

This file is the human-facing guide for the Codex Agent folder.

Use it to explain what the folder is for, how to maintain the files inside it, and how staff or maintainers should organise Codex-related documentation.

Agent operating rules must not be stored here. Put those rules in `AGENTS.md` instead.

## File roles

| File | Purpose | Primary audience |
|---|---|---|
| `AGENTS.md` | Repository or folder-level instructions that Codex and other coding agents should follow automatically | AI coding agents |
| `INSTRUCTIONS.md` | Human-facing setup, maintenance, and usage guidance for this folder | Staff, directors, maintainers, developers |
| `README.md` | General overview, where used | Humans |
| `CHANGELOG.md` | Release, audit, and change history, where used | Humans, auditors, maintainers |

## What belongs in this file

Keep this file limited to human-operational guidance, such as:

1. What the Codex Agent folder contains.
2. How maintainers should organise Codex-related files.
3. When `AGENTS.md` should be updated.
4. How to review, approve, archive, or replace instruction files.
5. Any non-technical setup notes needed by staff.
6. Cross-references to related documents.

## What does not belong in this file

Do not place agent execution rules in this file.

The following belongs in `AGENTS.md`, not `INSTRUCTIONS.md`:

1. Rules beginning with wording such as “Codex must”, “Codex should”, or “Codex must not”.
2. Required coding workflows.
3. Required validation steps for website, repository, deployment, or pull request work.
4. Build, test, lint, accessibility, type-check, or deployment commands intended for automatic agent use.
5. Versioning rules that Codex must apply during implementation.
6. Changelog rules that Codex must apply during implementation.
7. Pull request, commit, GitHub Issue, or release-response rules for Codex.
8. Final response checklists for Codex.
9. Directory-specific coding standards intended to steer agent behaviour.
10. Safety, permission, sandbox, generated-file, or automation limits intended for agent execution.

## Recommended maintenance process

When updating this folder:

1. Review whether the content is for humans or agents.
2. Put agent-facing operational rules in `AGENTS.md`.
3. Put human-facing folder guidance in `INSTRUCTIONS.md`.
4. Avoid duplicating the same rule across both files.
5. Keep links and references current.
6. Preserve useful historic notes unless they are outdated or misleading.
7. Record material changes in the appropriate changelog if this folder is part of a versioned repository or website release process.

## Review checklist

Before saving changes to this file, check that:

1. The content is understandable to a human maintainer.
2. The content does not instruct Codex how to perform implementation work.
3. Any agent-specific rules have been moved to `AGENTS.md`.
4. The file uses UK English.
5. The structure is clear, concise, and not duplicative.
6. Any references to APES CIC processes remain accurate and current.

## Relationship with `AGENTS.md`

`AGENTS.md` is the authoritative location for coding-agent instructions in this folder or repository.

`INSTRUCTIONS.md` may explain that `AGENTS.md` exists and how humans should maintain it, but it should not duplicate or override the agent rules stored there.

When there is a conflict between this file and `AGENTS.md`, treat the conflict as a documentation maintenance issue. Review both files and move the relevant content to the correct location.

## Suggested folder layout

```txt
Codex Agent/
├── AGENTS.md
├── INSTRUCTIONS.md
├── README.md
├── CHANGELOG.md
└── references/
```

Use the `references/` folder for supporting material, examples, screenshots, archived drafts, or implementation briefs that should not be treated as active agent instructions.

## Archiving older versions

When replacing an older instruction file:

1. Keep the current active file at the folder root.
2. Move superseded drafts into an archive or references folder where appropriate.
3. Name archived files clearly with dates or version labels.
4. Do not leave multiple active instruction files with conflicting guidance.

## Notes for maintainers

Use plain English and keep this file short. Long operational rules reduce clarity and should normally be moved into a dedicated policy, playbook, or `AGENTS.md`, depending on the audience.
