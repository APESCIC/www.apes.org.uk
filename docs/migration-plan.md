# APES CIC migration plan

## Selected mode

- **Mode B: static or minimally dynamic rebuild**

## Reason

- The repository did not contain a reusable public site source tree.
- The writable `public/` directory was empty at the start of implementation.
- The live website provided enough public content and route structure to rebuild safely without relying on a private CMS or database export.

## Build approach

- Use a minimal PHP front controller and shared includes for all public routes.
- Keep the runtime compatible with Cloudron LAMP and Apache.
- Preserve legacy paths through a route map and `.htaccess` normalization.
- Keep all third-party services external unless explicitly requested otherwise later.

## Creative and motion support

- Use Creative Production mood-board work to lock the visual direction before refining the APES CSS system.
- Include an optional Remotion source pack for future branded hero-loop or launch-video exports without making Remotion a live site dependency.

## Data-protection stance

- No production database access.
- No local form backend added.
- No secrets, personal data, staff records, donor records, or animal case data introduced.

