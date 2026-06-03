# APES CIC content audit

## Audit scope

- Scope date: `2026-06-03`
- Source used: current public `https://www.apes.org.uk` surface, attached migration brief, and rebuilt route inventory
- Audit goal: decide which public content should be preserved, reviewed, redirected, or kept external during the Cloudron LAMP rebuild

## Page-by-page audit

| Route | Main purpose | Key CTA or journey | Decision | Content issues or notes | APES review priority |
| --- | --- | --- | --- | --- | --- |
| `/` | Parent APES gateway and service overview | Donate, Newsroom, service discovery | Preserve and rebuild | Legacy branding inconsistency resolved in rebuild | Medium |
| `/help-us-move` | Relocation and continuity appeal | Donate, follow updates | Preserve and rebuild | Time-sensitive public appeal should continue to be monitored | Medium |
| `/apes-pet-shop` | Pet-shop landing and fulfilment info | Visit external shop | Preserve and rebuild | Placeholder gallery labels such as "Title" and "Caption" documented | High |
| `/pet-boarding` | Boarding overview and pricing | Open boarding portal | Preserve and rebuild | External PetManager flow intentionally retained | Medium |
| `/services/lost-n-found-pets` | Lost and found pet guidance | Open Shelter Manager forms | Preserve and rebuild | External reporting forms intentionally retained | Medium |
| `/24-7-services` | Out-of-hours support and community routes | Contact support channels | Preserve and rebuild | Community and messaging routes remain external | Medium |
| `/services/animal-therapy` | Therapy programme overview | Contact APES | Preserve and rebuild | Welfare-facing copy should remain plain-language | Medium |
| `/educational-visits` | Outreach and educational-visit service | Make an enquiry | Preserve and rebuild | External enquiry flow retained | Medium |
| `/donate` | Main donation route | Donate now | Preserve and rebuild | Core fundraising page; avoid unapproved copy rewrites | High |
| `/donating/fundraising` | Fundraising priorities and needs | Support a campaign | Preserve and rebuild | Finance and fundraising wording should remain APES-reviewed | High |
| `/animal-causes` | Cause-led welfare and conservation messaging | Donate or support APES | Preserve and rebuild | Keep aligned with welfare-first framing | Medium |
| `/mailing-lists` | Newsletter and updates signposting | Join a list | Preserve and rebuild | No local mailing-list backend introduced | Medium |
| `/enterprise-mailing-list` | Enterprise or partner updates sign-up | Register interest | Preserve and rebuild | External Zoho form retained | Medium |
| `/volunteer` | Volunteer and student placement recruitment | Register interest | Preserve and rebuild | Volunteer-facing wording could use editorial smoothing | Medium |
| `/mission/our-main-mission-statement` | Public mission and values | Learn about APES | Preserve as-is in substance | Mission wording should not be substantively rewritten without review | Low |
| `/mission/support-ethical-rehabilitation` | Rehabilitation and welfare philosophy | Donate or contact APES | Preserve as-is in substance | Welfare-facing content should remain APES-approved | Medium |
| `/the-center` | Location walkthrough and facilities overview | Contact APES | Preserve and rebuild | Unfinished captions and "currently developing" style content documented | High |
| `/bookings` | Booking routes and contact guidance | Contact APES or use external tools | Preserve and rebuild | Connected-service routing must remain accurate | Medium |
| `/opening-times` | Public opening-hours guidance | Contact APES | Preserve and rebuild | Opening hours and address details may vary across routes | High |
| `/sponsors` | Sponsor recognition and partnership framing | Support APES | Preserve and rebuild | Light editorial review still useful | Low |
| `/about-us` | Organisation overview and history | Contact APES, Donate | Preserve and rebuild | Spelling and terminology inconsistencies documented | High |
| `/socials` | Public social and media route hub | Open APES Social or YouTube | Preserve and rebuild | External social and media channels intentionally retained | Medium |
| `/apes-communities` | Public community route hub | Join Discord, open APES Social | Preserve and rebuild | Community platforms remain external | Medium |
| `/staff` | Public-facing team and volunteer framing | Read about APES, Volunteer | Preserve and rebuild | Keep high-level only; do not publish personal staff data | Medium |
| `/contact-centre` | Bridge to the main support platform | Open contact centre | Preserve and rebuild | External support tooling intentionally retained | Medium |
| `/policies/terms-of-service` | Terms and conditions | Read policy | Preserve as-is in substance | Legal wording not substantively rewritten | High |
| `/policies/privacy` | Public privacy guidance | Read policy | Preserve as-is in substance | Privacy wording not substantively rewritten | High |
| `/policies/adoption-policy` | Adoption conditions | Read policy | Preserve but review | Source wording appears partially exposed or incomplete | High |
| `/policies/re-homing-policy` | Re-homing conditions | Read policy | Preserve as-is in substance | Sensitive policy wording kept narrow | High |
| `/policies/euthanasia-policy` | Sensitive policy page | Read policy | Preserve but review | Live source showed a broken heading; presentation fixed only | High |
| `/policies/cookies` | Cookie and browser guidance | Read policy | Preserve but review | Source route not cleanly recoverable during crawl | High |
| `/contact` | Main support route | Open contact centre | Preserve and rebuild | Contact information preserved; external support tooling retained | High |
| `/search` | Public site search | Search routes and content | Preserve and rebuild | Rebuilt as local search utility | Low |
| `/news/` | Legacy local news bridge | Open APES Newsroom | Preserve as bridge | Main news journey should route to APES Newsroom | Medium |
| `/news/post/Introducing-the-new-APES-CareBase/` | Legacy news bridge | Open APES Newsroom or CareBase | Preserve as bridge | External CareBase journey retained | Low |
| `/news/post/Urgent-APES-Must-Relocate-by-3-March-2026/` | Legacy relocation article | Donate, open APES Newsroom | Preserve as bridge | Time-sensitive appeal archive retained | Medium |
| `/news/post/APES-Partners-with-Double-the-Donation-to-Double-Your-Donation-Impact/` | Legacy fundraising article | Donate | Preserve as bridge | Fundraising archive retained | Medium |
| `/news/post/important-update-temporary-move-what-it-means-for-you/` | Legacy continuity update | Open APES Newsroom, Contact APES | Preserve as bridge | Interim move archive retained | Medium |
| `/news/post/fundraising-appeal-help-apes-invest-in-essential-welfare-management-software/` | Legacy fundraising article | Open fundraising page | Preserve as bridge | Infrastructure-funding archive retained | Medium |
| `/news/tag/moving-properties/` | Legacy relocation archive | Open relocation stories | Preserve as bridge | Archive route retained for continuity | Low |
| `/news/tag/funds/` | Legacy fundraising archive | Open fundraising stories | Preserve as bridge | Archive route retained for continuity | Low |
| `/change-log-hub/` | Public release record | Review website changes | Added in rebuild | Required by AGENTS.md | Low |

## Preserve as-is in substance

- Mission pages
- Terms of Service
- Privacy Policy
- Re-Homing Policy
- Donation and fundraising framing
- Contact information and support routes

## Preserve but review

- Adoption Policy
  - Public wording appears partially exposed in the live route.
  - Do not perform a substantive legal rewrite without APES confirmation.
- Cookie guidance
  - Source route was not cleanly recoverable during the public crawl.
  - Rebuilt route intentionally stays narrow and should be checked against the authoritative APES wording.
- Euthanasia Policy
  - Public source page showed a broken heading.
  - Presentation fixed in rebuild; underlying policy substance kept narrow.

## Placeholder or low-quality content flagged

- APES Pet Shop repeated placeholder gallery text such as "Title" and "Caption".
- The Centre page includes unfinished captions and "currently developing" style content.
- About APES contains spelling and terminology inconsistencies.
- Opening-hours and location details may vary across pages and footer wording.
- Legacy generated Sign In, Sign Up and Sign Out links appear on the live site even where they do not support a meaningful public journey.
- Legacy footer and release-record presentation does not expose a proper APES Change Log Hub or consistent current-version treatment.

## Copy inconsistencies flagged for APES review

- "Center" versus "Centre"
- "Satuday" and similar typos
- Volunteer-facing phrasing that may need editorial smoothing

## External services intentionally not migrated

- Contact centre
- Help centre
- APES donor route
- Shelter Manager forms
- PetManager boarding
- Zoho sign-up flows
- APES CareBase
- APES Shelter & Rescue
- APES Pet Care Clinic
