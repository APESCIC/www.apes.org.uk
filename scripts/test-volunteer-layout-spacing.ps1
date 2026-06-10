[CmdletBinding()]
param()

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

$repoRoot = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
$cssPath = Join-Path $repoRoot "public/theme/layouts/html5-refresh.css"
$volunteerSnapshotPath = Join-Path $repoRoot "public/volunteer/index.html"

$cssContent = Get-Content $cssPath -Raw
$volunteerSnapshot = Get-Content $volunteerSnapshotPath -Raw

$requiredCssSnippets = @(
    "body[data-page-key=""volunteer""] .page-body > .section-shell:first-child {",
    "padding: 1.4rem;",
    "gap: 1rem;"
)

foreach ($snippet in $requiredCssSnippets) {
    if (-not $cssContent.Contains($snippet)) {
        throw "Volunteer spacing regression: missing expected CSS snippet '$snippet' in public/theme/layouts/html5-refresh.css"
    }
}

if (-not $volunteerSnapshot.Contains("Apply through the approved volunteer form")) {
    throw "Volunteer spacing regression: public/volunteer/index.html does not contain the expected volunteer application panel."
}

$removedVolunteerIntro = "Public APES copy repeatedly explains that staff are unpaid volunteers and asks supporters to treat them with respect. Volunteering and placements form part of how APES keeps services moving across rescue, care, support and education work."

if ($volunteerSnapshot.Contains($removedVolunteerIntro)) {
    throw "Volunteer copy regression: public/volunteer/index.html still contains the removed volunteer intro paragraph."
}

Write-Host "Volunteer layout spacing regression check passed."
