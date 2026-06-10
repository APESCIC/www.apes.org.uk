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
4. Record the incident in GitHub issue `#2` and keep the issue open until the failed change is understood.

