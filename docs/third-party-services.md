# APES CIC third-party and connected services

| Service | Destination | Purpose | Placement | Tab behaviour | Personal data risk | Migration handling |
| --- | --- | --- | --- | --- | --- | --- |
| APES Shelter & Rescue | `https://www.apesshelter.org.uk/` | Linked service website | Main nav and content | New tab preferred | External service manages its own flows | Kept external |
| APES Pet Care Clinic | `https://www.apespetcare.org.uk/` | Linked service website | Main nav and content | New tab preferred | External service manages its own flows | Kept external |
| APES Shop | `https://www.apesshop.co.uk/` | Online shop | Pet Shop content | New tab preferred | External checkout and customer data | Kept external |
| APES donor route | `https://www.apesdonor.social/` | Donation journey | Donate page and footer-linked journey | Same tab acceptable, new tab also acceptable | Yes | Kept external |
| Contact centre | `https://contact.apes.org.uk/` | General enquiries | Contact page and footer | Same tab acceptable | Yes | Kept external |
| Help centre | `https://help.apes.org.uk/` | Support content | Contact page and footer | Same tab acceptable | Possible | Kept external |
| Shelter Manager | `https://service.sheltermanager.com/` | Lost and found pet reporting | Service content | Same tab acceptable | Yes | Kept external |
| PetManager | `https://petmanager.app/` | Boarding bookings | Boarding page | Same tab acceptable | Yes | Kept external |
| Zoho public forms | `https://forms.zohopublic.eu/` | Enterprise mailing-list sign-up | Enterprise mailing list page | Same tab acceptable | Yes | Kept external |
| APES CareBase | `https://carebase.apes.org.uk/` | Welfare data platform | Legacy news bridge | New tab preferred | Possible | Kept external |
| APES Newsroom | `https://www.apesnews.org.uk/` | Central public news destination | Nav, bridge pages and update CTAs | Same tab acceptable | Low | Kept external |
| APES Social | `https://social.apes.org.uk/` | Community or social route | Homepage and footer context | New tab preferred | Possible | Kept external |
| MyAPES | `https://www.myapes.me.uk/` | Portal or member-facing area | Legacy connected-service context | New tab preferred | Yes | Kept external |
| Network status | `https://ourstatus.apes.org.uk/` | Operational status route | Connected-service context | New tab preferred | Low | Kept external |
| Discord | `https://discord.gg/` | Community support | 24/7 services and homepage context | New tab preferred | Yes | Kept external |
| YouTube | `https://www.youtube.com/` | Live stream or public media | Homepage context | New tab preferred | Low | Kept external |
| WhatsApp | `https://whatsapp.com/` | Messaging route where publicly linked | Connected-service context | New tab preferred | Yes | Kept external |
| WorkDrive | `https://workdrive.zoho.eu/` | Document-sharing route where publicly linked | Connected-service context | New tab preferred | Possible | Kept external |
| Raklet | `https://apescic.raklet.com/` | Membership or community tooling where publicly linked | Connected-service context | New tab preferred | Yes | Kept external |

## Notes

- The rebuild intentionally keeps transactional, support and community tooling outside the Cloudron LAMP site unless APES later requests a local replacement.
- External services that may process personal data are documented here so the rebuilt site does not introduce an unreviewed local data-capture backend.
