# APES CIC rollback plan

## Trigger conditions

- Broken main navigation
- Missing donation, Privacy Policy, Terms of Service or Change Log Hub footer links
- Routing failures on preserved public paths
- Serious mobile or accessibility regression
- Incorrect policy or governance content publication

## Rollback steps

1. Stop the rollout and preserve the failing bundle for investigation.
2. Restore the previous Cloudron backup or redeploy the previous `/app/data/public` bundle.
3. Verify:
   - homepage
   - donate
   - contact
   - policy pages
   - footer compliance
   - Change Log Hub
   - branded 403/404 handling
4. If this PHP-first migration is the failing release, restore the previous approved `v3.0.0b` public bundle before reattempting rollout.
5. Record the incident in GitHub issue `#2` and keep the issue open until the failed change is understood.

