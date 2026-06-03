<p align="center">
  <a href="https://www.apes.org.uk/" target="_blank" rel="noopener noreferrer">
    <img src="https://www.apes.org.uk/APES_logo_3D_440x250.png" alt="APES CIC Logo" width="220">
  </a>
</p>

<h1 align="center">APES CIC Website Repository</h1>

<p align="center">
  <strong>Official development and maintenance repository for the APES CIC public website at https://www.apes.org.uk.</strong>
</p>

<p align="center">
  <img alt="Repository" src="https://img.shields.io/badge/repository-www.apes.org.uk-2E7D32">
  <img alt="Theme" src="https://img.shields.io/badge/theme-APES_Habitat-43A047">
  <img alt="Accessibility" src="https://img.shields.io/badge/accessibility-WCAG_AA_target-00796B">
  <img alt="Language" src="https://img.shields.io/badge/language-UK_English-00695C">
  <img alt="Governance" src="https://img.shields.io/badge/governance-change_log_required-005F5F">
</p>

---

## 🌿 Purpose

This repository supports the development, maintenance and governance of the APES CIC public website at <https://www.apes.org.uk/>. It provides a consistent baseline for public pages, service routing, organisational information, donation routes, welfare guidance, contact pathways and related front-end development owned or maintained by the Association of Protecting Exotic Species CIC.

Use this README as the working standard for this repository so that website work remains aligned with:

* APES CIC website working instructions in `AGENTS.md`.
* A predictable repository structure.
* GitHub Issue Forms for bugs and feature updates.
* APES Habitat design direction and brand expectations.
* UK English, accessibility, governance, security and data protection expectations.
* Changelog, versioning and release-record expectations for website work.

---

## 🐾 Intended website scope

This repository may cover:

| Website area | Examples |
|---|---|
| Parent organisation site | APES CIC organisation gateway, governance pages and public service routing. |
| Public service information | Rescue, surrender, adoption, fostering, pet care, support and contact pathways. |
| Campaign or fundraising content | Fundraising appeals, education campaigns, relocation projects or public information campaigns. |
| Documentation or help routing | CareBase, knowledge bases, support centres, policy hubs and user guidance routes. |
| Connected APES platforms | Links and signposting to APES Newsroom, MyAPES, service portals and support systems. |

---

## 🎨 APES Habitat design direction

APES websites should feel like one connected ecosystem: green led, teal-led, accessible, welfare focused and operationally competent.

### Core principles

* **Recognisable APES identity:** every site should clearly belong to the APES CIC family.
* **Welfare before sales:** booking, adoption, donation, sponsorship and service journeys must still communicate trust, accountability and animal welfare.
* **Plain English:** headings, CTAs, form guidance and service copy should be practical, direct and written in UK English.
* **Accessible by default:** colour contrast, keyboard navigation, readable typography and clear focus states are core requirements.
* **Reusable components:** buttons, cards, hubs, filters, alerts, forms, footers, policy links, help routes and CTAs should follow shared patterns.

### Recommended colour tokens

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

Use teal as the master APES colour. Service accents may support the user journey, but they must not overpower the shared APES identity.

---

## 🧩 Recommended repository structure

Adapt this structure to the confirmed framework, but keep the repository predictable.

```text
.
├── .github/
│   ├── ISSUE_TEMPLATE/
│   │   ├── bug_report.yml
│   │   ├── feature_update.yml
│   │   └── config.yml
│   ├── workflows/
│   │   ├── ci.yml
│   │   └── deploy.yml
│   ├── pull_request_template.md
│   └── dependabot.yml
├── docs/
│   ├── accessibility/
│   ├── architecture/
│   ├── brand/
│   ├── compliance/
│   ├── content/
│   └── decisions/
├── public/
│   └── assets/
│       ├── images/
│       └── logo/
├── src/
│   ├── components/
│   ├── config/
│   ├── content/
│   ├── features/
│   ├── layouts/
│   ├── pages/
│   ├── services/
│   ├── styles/
│   └── utils/
├── tests/
│   ├── accessibility/
│   ├── integration/
│   └── unit/
├── AGENTS.md
├── CHANGELOG.md
├── CODE_OF_CONDUCT.md
├── CONTRIBUTING.md
├── LICENSE
├── README.md
├── SECURITY.md
└── VERSION
```

---

## 🚀 Getting started

Replace these commands with the confirmed production stack if the implementation changes.

### 1. Clone the repository

```bash
git clone https://github.com/APESCIC/www.apes.org.uk.git
cd www.apes.org.uk
```

### 2. Install dependencies

```bash
npm install
```

### 3. Create the local environment file

```bash
cp .env.example .env.local
```

### 4. Start the development server

```bash
npm run dev
```

### 5. Run checks before committing

```bash
npm run lint
npm run test
npm run build
```

---

## 🔐 Environment variables

Do not commit secrets, credentials, API tokens, payment keys, booking credentials, CRM credentials or live service keys.

Document required variables in `.env.example` using safe placeholder values only.

| Variable | Purpose | Required | Example |
|---|---|---:|---|
| `APP_ENV` | Application environment. | Yes | `local` |
| `APP_URL` | Local or deployed application URL. | Yes | `http://localhost:3000` |
| `PUBLIC_SITE_URL` | Public website URL. | Yes | `https://www.apes.org.uk` |
| `NEWSLETTER_SIGNUP_URL` | Newsletter signup route or external provider URL. | If used | `https://www.apesnews.org.uk/` |
| `CONTACT_EMAIL` | Public contact email. | Yes | `info@apes.org.uk` |
| `CONTACT_PHONE` | Public contact number. | Yes | `0300 302 0998` |

---

## 🛠 GitHub workflow

### Branch naming

Use short, descriptive branch names.

```text
feature/service-card-layout
feature/change-log-hub
feature/booking-flow-update
fix/mobile-navigation-overflow
fix/accessibility-focus-state
docs/update-policy-links
hotfix/contact-details
```

### Commit style

Use clear commit messages that explain the change and the reason.

```text
website: add service landing page
website: update booking policy links
website: fix mobile header navigation
website: improve contrast on service cards
website: document website content model
```

### Issues

Use GitHub Issues for planned changes, bugs, content work, accessibility improvements, governance tasks and maintenance items.

Issue templates live in:

```text
.github/ISSUE_TEMPLATE/
```

Included issue forms:

| Template | Use when |
|---|---|
| `bug_report.yml` | A defect, regression, unexpected behaviour or operational fault needs triage. |
| `feature_update.yml` | A new feature, enhancement, workflow change, documentation update or governance requirement is needed. |
| `config.yml` | Disables blank issues and routes urgent or sensitive matters away from public issue text. |

### Pull requests

Every pull request should include:

* Summary of the change.
* Linked issue, using closing keywords only where closure is intended.
* Reason for the change.
* Screenshots or screen recordings for user interface changes.
* Accessibility considerations.
* Security and data protection considerations.
* Testing completed.
* Deployment and rollback notes.
* Changelog and version details for website changes.

---

## ✅ Definition of done

A website change is not ready to merge until it meets the relevant checklist.

### Functional quality

* [ ] Feature meets the agreed acceptance criteria.
* [ ] User-facing copy is clear, accurate and written in UK English.
* [ ] Empty, loading, success and error states are handled.
* [ ] Mobile, tablet and desktop layouts have been checked.
* [ ] Links, buttons, forms and routes behave as expected.
* [ ] Public contact details are accurate.

### Accessibility

* [ ] Normal text meets at least **4.5:1** contrast.
* [ ] Large text and meaningful graphical elements meet at least **3:1** contrast where applicable.
* [ ] Colour is not the only method used to show meaning, status or urgency.
* [ ] Keyboard focus is visible and logical.
* [ ] Form fields have labels, helper text and error messages.
* [ ] Images and icons have suitable accessible names or alternative text.
* [ ] Motion is minimal and respects reduced motion preferences.
* [ ] Pages use one clear `h1` and logical `h2` and `h3` sections.

### Data protection and security

* [ ] No secrets, credentials, payment keys, personal data or confidential records are committed.
* [ ] Form submissions collect only necessary information.
* [ ] Personal data is handled in line with UK GDPR and the Data Protection Act 2018.
* [ ] Client, supporter, staff, volunteer, welfare, safeguarding, HR, finance and governance data are treated as sensitive by default.
* [ ] Logs do not expose personal data, booking details or confidential case information.
* [ ] External links use safe attributes where applicable.

### Governance and release records

* [ ] Update type has been confirmed or inferred: major, minor or patch.
* [ ] Beta status has been confirmed where relevant.
* [ ] Canonical version file has been updated.
* [ ] Website Change Log Hub page has been created or updated.
* [ ] Root `CHANGELOG.md` has been created or updated.
* [ ] Related GitHub Issue has been updated at start, progress and completion points where applicable.
* [ ] APES Newsroom routing has been checked for news, updates, newsletter prompts, footer links or navigation changes.

---

## 🧪 Testing expectations

Use the strongest practical test coverage for the change.

| Change type | Expected checks |
|---|---|
| UI component | Unit tests, keyboard check, responsive check and contrast check. |
| Service page | Content accuracy review, mobile review, link check and metadata check. |
| Form or booking workflow | Validation tests, error state tests, success state tests and data minimisation review. |
| Content update | Link check, spelling check, owner check and review date check. |
| Policy update | Legal or governance review, version check and publication date check. |
| Payment or billing link | Security review, test mode check and confirmation that no secret key is exposed. |
| Data handling | Input validation, output escaping, logging review and retention considerations. |

---

## 🧯 Sensitive information rule

Do not open public issues, commits or pull requests containing:

* Credentials, API keys or tokens.
* Personal data.
* Safeguarding details.
* Animal welfare case details.
* Client booking records.
* Payment or billing details.
* Vulnerability exploit steps that could create immediate risk.
* HR, finance, governance or legal correspondence.

Use approved internal escalation routes for urgent operational, safeguarding, welfare or security matters.

---

## 🏢 Organisation

**Association of Protecting Exotic Species CIC (APES CIC)**  
CIC No: `16253848`  
Registered Office: `40 Morris Street, St Helens, WA9 3EN`  
Main Website: <https://www.apes.org.uk/>  
Newsroom: <https://www.apesnews.org.uk/>  
Telephone: `0300 302 0998`

---

## 📄 Licence and reuse

This template and its contents are maintained for APES CIC website development, public service delivery and authorised operational purposes.

Unless a separate licence file states otherwise, do not reuse APES CIC branding, public service materials, internal documents, source code, operational workflows or service materials outside authorised APES CIC purposes.

---

<p align="center">
  <strong>Built to keep APES websites clear, compliant, accessible and welfare focused.</strong>
</p>
