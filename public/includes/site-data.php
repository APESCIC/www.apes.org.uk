<?php
declare(strict_types=1);

const APES_FALLBACK_VERSION = 'v2.1.0b';
const APES_SITE_NAME = 'Association of Protecting Exotic Species CIC';
const APES_CIC_NUMBER = '16253848';
const APES_CONTACT_EMAIL = 'info@apes.org.uk';
const APES_CONTACT_PHONE = '0300 302 0998';
const APES_PRIMARY_DOMAIN = 'https://www.apes.org.uk';
const APES_NEWSROOM_URL = 'https://www.apesnews.org.uk/';

function apes_version(): string
{
    static $version;

    if ($version !== null) {
        return $version;
    }

    $versionFile = dirname(__DIR__) . '/VERSION';

    if (is_file($versionFile)) {
        $fileVersion = trim((string) file_get_contents($versionFile));

        if ($fileVersion !== '') {
            $version = $fileVersion;

            return $version;
        }
    }

    $version = APES_FALLBACK_VERSION;

    return $version;
}

function apes_site_data(): array
{
    static $data;

    if ($data !== null) {
        return $data;
    }

    $year = (int) date('Y');
    $siteVersion = apes_version();
    $newsroom_copy = 'News and updates from APES CIC and our services are now published through APES Newsroom. Visit APES Newsroom to read the latest organisation updates, Shelter & Rescue news, Pet Care Clinic updates, service notices, appeals and guidance from across the APES network.';

    $data = [
        'version' => $siteVersion,
        'site_name' => APES_SITE_NAME,
        'site_short_name' => 'APES CIC',
        'cic_number' => APES_CIC_NUMBER,
        'contact_email' => APES_CONTACT_EMAIL,
        'contact_phone' => APES_CONTACT_PHONE,
        'contact_phone_display' => '0300 302 0998',
        'postal_address' => [
            '40 Morris Street',
            'St Helens',
            'WA9 3EN',
            'United Kingdom',
        ],
        'registered_address' => 'Cross House, Unit 7, Sutton Road, St Helens, WA9 3YH',
        'year' => $year,
        'canonical_domain' => APES_PRIMARY_DOMAIN,
        'brand' => [
            'logo_nav_png' => '/assets/logos/apes-logo-navbar-72h.png',
            'logo_nav_webp' => '/assets/logos/apes-logo-navbar-72h.webp',
            'logo_feature_png' => '/assets/logos/apes-logo-primary-trimmed-640w.png',
            'logo_feature_webp' => '/assets/logos/apes-logo-primary-trimmed-640w.webp',
            'og_image' => '/assets/logos/apes-og-image-1200x630.jpg',
            'twitter_image' => '/assets/logos/apes-twitter-card-1200x600.jpg',
            'subtitle' => 'Rescue, rehabilitation, rehoming and public support across the APES network.',
        ],
        'newsroom_copy' => $newsroom_copy,
        'social_links' => [
            ['label' => 'APES Newsroom', 'href' => APES_NEWSROOM_URL],
            ['label' => 'APES Social', 'href' => 'https://social.apes.org.uk/'],
            ['label' => 'Discord community', 'href' => 'https://discord.gg/'],
            ['label' => 'YouTube live stream', 'href' => 'https://www.youtube.com/'],
        ],
        'nav' => [
            [
                'label' => 'Home',
                'href' => '/',
            ],
            [
                'label' => 'Services',
                'panel_heading' => 'Services across the APES network',
                'children' => [
                    ['label' => 'Services overview', 'description' => 'Start with the public-facing routes for rescue, care, support, education and connected services.', 'href' => '/'],
                    ['label' => 'Shelter, rescue and adoptions', 'description' => 'Open the APES Shelter & Rescue website for rehoming, surrender guidance and welfare support.', 'href' => 'https://www.apesshelter.org.uk/', 'external' => true],
                    ['label' => 'Pet care clinic', 'description' => 'Visit APES Pet Care Clinic for low-cost support, care plans, bookings and pet health guidance.', 'href' => 'https://www.apespetcare.org.uk/', 'external' => true],
                    ['label' => 'Pet shop', 'description' => 'Browse APES pet-shop information and connected shopping routes that help fund welfare work.', 'href' => '/apes-pet-shop/'],
                    ['label' => 'Pet boarding', 'description' => 'Find reptile boarding information and the approved external booking journey.', 'href' => '/pet-boarding/'],
                    ['label' => 'Lost and found pets', 'description' => 'Use APES support routes to report a lost pet or help reconnect a found animal.', 'href' => '/services/lost-n-found-pets/'],
                    ['label' => '24/7 support services', 'description' => 'See around-the-clock support and welfare routes for urgent practical help.', 'href' => '/24-7-services/'],
                    ['label' => 'Animal therapy', 'description' => 'Learn about animal-therapy support and public benefit activity delivered through APES.', 'href' => '/services/animal-therapy/'],
                    ['label' => 'Educational visits', 'description' => 'Book educational visits and species-focused public learning experiences.', 'href' => '/educational-visits/'],
                ],
            ],
            [
                'label' => 'Support APES',
                'panel_heading' => 'Fundraising, volunteering and sponsorship',
                'children' => [
                    ['label' => 'Donate', 'description' => 'Support daily welfare work, relocation needs and rescue operations through the main donation route.', 'href' => '/donate/'],
                    ['label' => 'Fundraising priorities', 'description' => 'See the equipment, software and operational priorities APES is currently raising funds for.', 'href' => '/donating/fundraising/'],
                    ['label' => 'Volunteer', 'description' => 'Find out how volunteer-led work keeps APES services running with care and accountability.', 'href' => '/volunteer/'],
                    ['label' => 'Sponsors', 'description' => 'Meet the organisations helping APES with software, infrastructure and practical services.', 'href' => '/sponsors/'],
                    ['label' => 'Enterprise mailing list', 'description' => 'Register interest for business, partner, grant and social-enterprise communications.', 'href' => '/enterprise-mailing-list/'],
                    ['label' => 'Help Us Move', 'description' => 'Read the relocation appeal and the practical support still needed to protect continuity of care.', 'href' => '/help-us-move/'],
                ],
            ],
            [
                'label' => 'Information',
                'panel_heading' => 'About, policies, updates and APES Newsroom',
                'children' => [
                    ['label' => 'About APES', 'description' => 'Learn about APES CIC, the three Rs and the organisation’s welfare-first operating model.', 'href' => '/about-us/'],
                    ['label' => 'APES Newsroom', 'description' => 'Read organisation updates, service notices, appeals and cross-division stories in APES Newsroom.', 'href' => APES_NEWSROOM_URL, 'external' => true],
                    ['label' => 'Change Log Hub', 'description' => 'Track public website releases, fixes, compliance changes and layout improvements.', 'href' => '/change-log-hub/'],
                    ['label' => 'Privacy Policy', 'description' => 'Review how APES handles personal data, communications and public website information.', 'href' => '/policies/privacy/'],
                    ['label' => 'Terms of Service', 'description' => 'Read the public terms that govern use of APES services, routes and website content.', 'href' => '/policies/terms-of-service/'],
                    ['label' => 'Cookie guidance', 'description' => 'See the current APES cookie guidance and website preference information.', 'href' => '/policies/cookies/'],
                ],
            ],
            [
                'label' => 'Contact',
                'href' => '/contact/',
            ],
            [
                'label' => 'Donate',
                'href' => '/donate/',
                'cta' => true,
            ],
        ],
        'footer_columns' => [
            [
                'title' => 'About APES CIC',
                'items' => [
                    ['label' => 'Association of Protecting Exotic Species CIC', 'href' => '/about-us/'],
                    ['label' => 'Rescue, rehabilitation, rehoming and education across exotic animal welfare.', 'href' => '/mission/our-main-mission-statement/'],
                    ['label' => 'Support urgent welfare work, long-term residents and the next stage of the APES move.', 'href' => '/help-us-move/'],
                ],
            ],
            [
                'title' => 'Get help',
                'items' => [
                    ['label' => 'Contact page', 'href' => '/contact/'],
                    ['label' => 'Contact centre', 'href' => 'https://contact.apes.org.uk/', 'external' => true],
                    ['label' => 'Help Centre', 'href' => 'https://help.apes.org.uk/', 'external' => true],
                    ['label' => '40 Morris Street, St Helens, WA9 3EN', 'href' => '/contact/'],
                ],
            ],
            [
                'title' => 'Support',
                'items' => [
                    ['label' => 'Donate', 'href' => '/donate/'],
                    ['label' => 'Fundraising priorities', 'href' => '/donating/fundraising/'],
                    ['label' => 'Who sponsors us', 'href' => '/sponsors/'],
                    ['label' => 'Enterprise mailing list', 'href' => '/enterprise-mailing-list/'],
                ],
            ],
            [
                'title' => 'Stay connected',
                'items' => [
                    ['label' => 'APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true],
                    ['label' => 'Privacy Policy', 'href' => '/policies/privacy/'],
                    ['label' => 'Terms of Service', 'href' => '/policies/terms-of-service/'],
                    ['label' => 'Change Log Hub', 'href' => '/change-log-hub/'],
                    ['label' => 'Staff intranet', 'href' => 'https://intranet.apes.org.uk', 'external' => true, 'nofollow' => true],
                    ['label' => 'Volunteer intranet', 'href' => 'https://intranet.apes.org.uk', 'external' => true, 'nofollow' => true],
                    ['label' => 'Student intranet', 'href' => 'https://intranet.apes.org.uk', 'external' => true, 'nofollow' => true],
                ],
            ],
        ],
        'footer_partners' => [
            ['label' => 'British Arachnological Society', 'href' => 'https://britishspiders.org.uk/', 'logo' => '/assets/logos/partners/bas-logo.png', 'logo_alt' => 'British Arachnological Society logo'],
            ['label' => 'FBH', 'href' => 'https://www.thefbh.org/', 'logo' => '/assets/logos/partners/fbh-logo.webp', 'logo_alt' => 'Federation of British Herpetologists logo'],
            ['label' => 'Merseyside Police', 'href' => 'https://www.merseyside.police.uk/', 'logo' => '/assets/logos/partners/merseyside-police-logo.png', 'logo_alt' => 'Merseyside Police logo'],
        ],
        'footer_required_links' => [
            ['label' => 'Donate', 'href' => '/donate/'],
            ['label' => 'Privacy Policy', 'href' => '/policies/privacy/'],
            ['label' => 'Terms of Service', 'href' => '/policies/terms-of-service/'],
            ['label' => 'Change Log Hub', 'href' => '/change-log-hub/'],
        ],
        'sponsors' => [
            ['label' => 'Zoho', 'href' => 'https://www.zoho.com/', 'logo' => '/assets/logos/sponsors/zoho-logo.png', 'logo_alt' => 'Zoho logo'],
            ['label' => 'Shopify', 'href' => 'https://www.shopify.com/', 'logo' => '/assets/logos/sponsors/shopify-logo.jpg', 'logo_alt' => 'Shopify logo'],
            ['label' => 'Akamai', 'href' => 'https://www.akamai.com/', 'logo' => '/assets/logos/sponsors/akamai-logo.png', 'logo_alt' => 'Akamai logo'],
            ['label' => 'cPanel', 'href' => 'https://www.cpanel.net/', 'logo' => '/assets/logos/sponsors/cpanel-logo.png', 'logo_alt' => 'cPanel logo'],
        ],
        'pages' => [
            'home' => [
                'route' => '/',
                'meta_title' => 'APES CIC | Protecting exotic species across rescue, care and education',
                'title' => 'Association of Protecting Exotic Species CIC',
                'description' => 'APES CIC supports exotic animal welfare through rescue, rehabilitation, rehoming, education, pet care and practical public support.',
                'hero_kicker' => 'APES CIC',
                'hero_title' => 'Rescue, rehabilitate and rehome with care, clarity and compassion.',
                'hero_summary' => 'The refreshed APES CIC website keeps the PHP delivery layer but presents the public site through richer HTML5 sections, clearer journeys and a more editorial APES visual style.',
                'hero_actions' => [
                    ['label' => 'Donate today', 'href' => '/donate/', 'variant' => 'primary'],
                    ['label' => 'Read APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Major beta release', 'HTML5-first structure', 'APES Newsroom linked'],
                'body_html' => <<<'HTML'
<section class="alert-band">
  <p><strong>Urgent operational update:</strong> APES continues to share relocation and continuity updates through APES Newsroom and the Help Us Move appeal. Supporters can help through donations, fundraising and practical sponsorship.</p>
  <p><a class="text-link" href="/help-us-move/">Read the relocation appeal</a></p>
</section>

<section class="spotlight-band">
  <div class="spotlight-copy">
    <p class="eyebrow">HTML5-first rebuild</p>
    <h2>A calmer, more visual home for rescue, care and support.</h2>
    <p>The refreshed APES CIC front page keeps the PHP delivery layer but gives the public site a richer HTML5 structure, stronger editorial hierarchy and clearer routes to help, donate and read updates.</p>
  </div>
  <div class="spotlight-grid">
    <article class="spotlight-card">
      <span class="spotlight-kicker">News</span>
      <h3>APES Newsroom</h3>
      <p>All organisation updates and service notices now live in the central newsroom.</p>
    </article>
    <article class="spotlight-card">
      <span class="spotlight-kicker">Support</span>
      <h3>Donate or get help</h3>
      <p>Donation, contact and relocation routes remain visible in every major journey.</p>
    </article>
    <article class="spotlight-card">
      <span class="spotlight-kicker">Design</span>
      <h3>Editorial and accessible</h3>
      <p>Rounded cards, clearer spacing and stronger focus states guide the interface.</p>
    </article>
  </div>
</section>

<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">What APES does</p>
    <h2>Specialist welfare support for exotic species and their keepers.</h2>
  </div>
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Rescue and shelter</h3>
      <p>APES responds when exotic animals are abandoned, unsafe, displaced or in urgent need of species-appropriate care.</p>
      <a class="text-link" href="https://www.apesshelter.org.uk/" target="_blank" rel="noreferrer">Visit Shelter &amp; Rescue</a>
    </article>
    <article class="info-card">
      <h3>Pet care and support</h3>
      <p>The wider APES network supports keepers with practical care services, boarding, educational visits and everyday welfare guidance.</p>
      <a class="text-link" href="/pet-boarding/">Explore care services</a>
    </article>
    <article class="info-card">
      <h3>Education and public benefit</h3>
      <p>APES shares guidance, live support routes, policy information and educational sessions that help people keep animals safely and responsibly.</p>
      <a class="text-link" href="/educational-visits/">Book an educational visit</a>
    </article>
  </div>
</section>

<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">Quick access</p>
    <h2>Main public journeys</h2>
  </div>
  <div class="card-grid card-grid-three">
    <article class="service-card">
      <h3>Donate</h3>
      <p>Support rescue operations, rehabilitation, relocation work and day-to-day welfare services.</p>
      <a class="button button-primary" href="/donate/">Donate now</a>
    </article>
    <article class="service-card">
      <h3>Lost and found pets</h3>
      <p>Use the APES forms and contact routes to report a lost pet or help reconnect a found animal with its owner.</p>
      <a class="button button-secondary" href="/services/lost-n-found-pets/">Access support</a>
    </article>
    <article class="service-card">
      <h3>Volunteer and student placements</h3>
      <p>Find out how volunteer-led support powers APES services and how to register your interest responsibly.</p>
      <a class="button button-secondary" href="/volunteer/">See opportunities</a>
    </article>
    <article class="service-card">
      <h3>Pet boarding</h3>
      <p>Specialist reptile boarding and linked portal access remain available through the approved external booking system.</p>
      <a class="button button-secondary" href="/pet-boarding/">Boarding information</a>
    </article>
    <article class="service-card">
      <h3>Fundraising</h3>
      <p>See current equipment and technology priorities that directly improve animal care, operations and supporter service.</p>
      <a class="button button-secondary" href="/donating/fundraising/">View fundraising needs</a>
    </article>
    <article class="service-card">
      <h3>Policies and governance</h3>
      <p>Read the current public policy pages, service terms and privacy guidance in one consistent APES layout.</p>
      <a class="button button-secondary" href="/policies/terms-of-service/">Review policies</a>
    </article>
  </div>
</section>

<section class="section-shell split-panel">
  <div>
    <p class="eyebrow">About APES CIC</p>
    <h2>Exotic animal welfare with operational transparency.</h2>
    <p>APES CIC is focused on the welfare, protection and conservation of exotic species. The organisation works across rescue, rehabilitation, rehoming, education, public guidance, conservation awareness and practical support for keepers and communities.</p>
    <p>The current public mission remains rooted in compassionate, non-judgemental support. APES combines welfare-first services with plain-language information so people can act quickly when an animal or owner needs help.</p>
  </div>
  <div class="metrics-grid">
    <article class="metric-card">
      <strong>Rescue</strong>
      <span>Respond to abandonment, unsafe keeping and urgent welfare needs.</span>
    </article>
    <article class="metric-card">
      <strong>Rehabilitate</strong>
      <span>Provide species-appropriate care, recovery support and careful handling.</span>
    </article>
    <article class="metric-card">
      <strong>Rehome</strong>
      <span>Match animals to informed adopters through responsible checks and guidance.</span>
    </article>
    <article class="metric-card">
      <strong>Educate</strong>
      <span>Share practical welfare knowledge through visits, support routes and public resources.</span>
    </article>
  </div>
</section>

<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">News and connected services</p>
    <h2>Follow live updates through APES Newsroom.</h2>
  </div>
  <div class="card-grid card-grid-two">
    <article class="info-card">
      <h3>APES Newsroom</h3>
      <p>News and updates from APES CIC and our services are now published through APES Newsroom. Visit APES Newsroom to read the latest organisation updates, Shelter &amp; Rescue news, Pet Care Clinic updates, service notices, appeals and guidance from across the APES network.</p>
      <a class="button button-secondary" href="https://www.apesnews.org.uk/" target="_blank" rel="noreferrer">Open APES Newsroom</a>
    </article>
    <article class="info-card">
      <h3>Live stream and public channels</h3>
      <p>The live site also promotes APES streaming, social and supporter channels. These remain connected services rather than being rebuilt inside the Cloudron site.</p>
      <ul class="clean-list">
        <li><a class="text-link" href="https://www.youtube.com/" target="_blank" rel="noreferrer">YouTube live stream</a></li>
        <li><a class="text-link" href="https://social.apes.org.uk/" target="_blank" rel="noreferrer">APES Social</a></li>
        <li><a class="text-link" href="https://discord.gg/" target="_blank" rel="noreferrer">Discord community</a></li>
      </ul>
    </article>
  </div>
</section>

<section class="cta-band">
  <div>
    <p class="eyebrow">Support the work</p>
    <h2>Every donation, referral and responsible rehoming enquiry helps protect more animals.</h2>
  </div>
  <div class="action-row">
    <a class="button button-primary" href="/donate/">Donate</a>
    <a class="button button-secondary" href="/contact/">Contact APES</a>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Help Us Move', 'href' => '/help-us-move/'],
                    ['label' => 'Volunteer and student placements', 'href' => '/volunteer/'],
                    ['label' => 'APES Pet Care Clinic', 'href' => 'https://www.apespetcare.org.uk/', 'external' => true],
                    ['label' => 'APES Shelter & Rescue', 'href' => 'https://www.apesshelter.org.uk/', 'external' => true],
                ],
            ],
            'help-us-move' => [
                'route' => '/help-us-move/',
                'meta_title' => 'Help Us Move | APES CIC relocation appeal',
                'title' => 'Help Us Move',
                'description' => 'Support the APES CIC relocation appeal and help protect continuity of animal care during premises changes.',
                'hero_kicker' => 'Operational appeal',
                'hero_title' => 'Help APES protect continuity of care during relocation.',
                'hero_summary' => 'The live APES website has shared urgent updates about moving premises and safeguarding uninterrupted welfare support for animals already in care.',
                'hero_actions' => [
                    ['label' => 'Donate to APES', 'href' => '/donate/', 'variant' => 'primary'],
                    ['label' => 'Read legacy news posts', 'href' => '/news/', 'variant' => 'secondary'],
                ],
                'pills' => ['Public-facing', 'Fundraising appeal', 'Needs ongoing review'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>The public appeal explains that APES was asked to vacate its previous premises with limited time to relocate while continuing to care for animals already depending on the organisation.</p>
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Limited time</h3>
      <p>The organisation reported a fixed deadline to move operations and secure continuity plans quickly.</p>
    </article>
    <article class="info-card">
      <h3>Premises challenge</h3>
      <p>APES needed a suitable location, ideally in the St Helens area, to continue specialist welfare services safely.</p>
    </article>
    <article class="info-card">
      <h3>Animals in care</h3>
      <p>The appeal emphasised that many animals rely on daily housing, monitoring and species-appropriate support.</p>
    </article>
  </div>
</section>

<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">How supporters can help</p>
    <h2>Give, share and keep watching APES Newsroom.</h2>
  </div>
  <ul class="tick-list">
    <li>Donate through the main APES donation route.</li>
    <li>Share the appeal with people who may be able to support premises, transport or fundraising.</li>
    <li>Follow APES Newsroom for the latest continuity and premises updates.</li>
  </ul>
</section>

<section class="cta-band">
  <div>
    <p class="eyebrow">Important note</p>
    <h2>This rebuilt page keeps the appeal live while routing ongoing updates through APES Newsroom.</h2>
  </div>
  <div class="action-row">
    <a class="button button-primary" href="/donate/">Support APES</a>
    <a class="button button-secondary" href="https://www.apesnews.org.uk/" target="_blank" rel="noreferrer">Read APES Newsroom</a>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Donate', 'href' => '/donate/'],
                    ['label' => 'Fundraising priorities', 'href' => '/donating/fundraising/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ],
            'apes-pet-shop' => [
                'route' => '/apes-pet-shop/',
                'meta_title' => 'APES Pet Shop | Products that support animal welfare',
                'title' => 'APES Pet Shop',
                'description' => 'The APES Pet Shop supports the organisation through pet product sales, click and collect, and local delivery where available.',
                'hero_kicker' => 'Pet products',
                'hero_title' => 'Shop products that help fund APES animal care.',
                'hero_summary' => 'The public shop page links to the external APES online shop while also describing in-person collections, local delivery and product sourcing.',
                'hero_actions' => [
                    ['label' => 'Visit the online shop', 'href' => 'https://www.apesshop.co.uk/', 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Fundraising priorities', 'href' => '/donating/fundraising/', 'variant' => 'secondary'],
                ],
                'pills' => ['Connected service', 'Placeholder content preserved in audit'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>The pet shop helps APES bring in funds for the animals in its care. The live site also includes a large gallery area with repeated placeholder labels such as "Title" and "Caption". Those placeholders have been intentionally documented in the audit rather than silently rewritten.</p>
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Online orders</h3>
      <p>Browse products through the approved external APES shop.</p>
    </article>
    <article class="info-card">
      <h3>Free local delivery</h3>
      <p>Legacy public copy states that customers within six miles may qualify for free local delivery.</p>
    </article>
    <article class="info-card">
      <h3>Click and collect</h3>
      <p>Customers can order and pay online, then collect when the order is ready.</p>
    </article>
  </div>
</section>

<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">Product sourcing</p>
    <h2>Not in stock? APES may be able to bring items in to order.</h2>
  </div>
  <p>The live page says APES can source requested products through distribution centres and then either dispatch them onward or make them available for collection once ready.</p>
</section>

<section class="note-panel">
  <h2>Content review note</h2>
  <p>The legacy product gallery currently uses repeated placeholder cards. This rebuild preserves that issue in the release audit and avoids inventing product copy that APES has not approved.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Online shop', 'href' => 'https://www.apesshop.co.uk/', 'external' => true],
                    ['label' => 'Donate', 'href' => '/donate/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ],
            'pet-boarding' => [
                'route' => '/pet-boarding/',
                'meta_title' => 'Pet boarding | APES reptile boarding services',
                'title' => 'APES pet boarding services',
                'description' => 'View current reptile boarding rates, support for UV and non-UV species, and the external boarding portal.',
                'hero_kicker' => 'Boarding',
                'hero_title' => 'Specialist reptile boarding with linked portal access.',
                'hero_summary' => 'APES currently advertises reptile boarding tiers and manages bookings through the approved external petmanager.app service.',
                'hero_actions' => [
                    ['label' => 'Book boarding', 'href' => 'https://petmanager.app/', 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Read APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['External booking platform', 'Public rates preserved'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="card-grid card-grid-three">
    <article class="pricing-card">
      <h3>No UV required reptiles</h3>
      <p class="price">GBP 5 per night</p>
      <p>Specialist boarding for reptiles without UV requirements while owners are away.</p>
    </article>
    <article class="pricing-card">
      <h3>UV required reptiles</h3>
      <p class="price">GBP 7 per night</p>
      <p>Boarding that includes suitable UV lighting to support safe day-to-day welfare.</p>
    </article>
    <article class="pricing-card">
      <h3>Small animals</h3>
      <p class="price">Setup in progress</p>
      <p>The live site states that this service is being set up and directs people to sign up for updates.</p>
    </article>
  </div>
</section>

<section class="section-shell split-panel">
  <div>
    <p class="eyebrow">Boarding portal</p>
    <h2>Manage stays through the approved external system.</h2>
    <p>The public page states that the boarding portal lets owners manage a pet’s stay, add packages and handle related booking details.</p>
  </div>
  <div class="action-stack">
    <a class="button button-primary" href="https://petmanager.app/" target="_blank" rel="noreferrer">Book now</a>
    <a class="button button-secondary" href="https://petmanager.app/" target="_blank" rel="noreferrer">Boarding portal login</a>
    <a class="button button-secondary" href="https://www.apesnews.org.uk/" target="_blank" rel="noreferrer">Sign up for updates</a>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Lost and found pets', 'href' => '/services/lost-n-found-pets/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                    ['label' => 'Petmanager portal', 'href' => 'https://petmanager.app/', 'external' => true],
                ],
            ],
            'lost-n-found-pets' => [
                'route' => '/services/lost-n-found-pets/',
                'meta_title' => 'Lost and found pets | APES reporting routes',
                'title' => 'Lost and found pets',
                'description' => 'Use the APES lost pet and found pet reporting routes or contact handlers for help.',
                'hero_kicker' => 'Reporting routes',
                'hero_title' => 'Report a lost pet or help reconnect a found animal.',
                'hero_summary' => 'The current APES service uses approved external Shelter Manager forms and the APES contact route so people can act quickly without creating a new local data store.',
                'hero_actions' => [
                    ['label' => 'Lost pet questionnaire', 'href' => 'https://service.sheltermanager.com/', 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Found pet questionnaire', 'href' => 'https://service.sheltermanager.com/', 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['External forms remain external', 'No local personal-data capture'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="card-grid card-grid-two">
    <article class="info-card">
      <h3>Lost pets</h3>
      <p>Complete the online lost pet form. The public page explains that APES can help match your report if someone later submits a found pet report with related details.</p>
      <a class="text-link" href="https://service.sheltermanager.com/" target="_blank" rel="noreferrer">Open the lost pet questionnaire</a>
    </article>
    <article class="info-card">
      <h3>Found pets</h3>
      <p>If you can keep hold of the animal temporarily while searching for the owner, APES asks you to complete the approved found pet form.</p>
      <a class="text-link" href="https://service.sheltermanager.com/" target="_blank" rel="noreferrer">Open the found pet questionnaire</a>
    </article>
  </div>
</section>

<section class="cta-band">
  <div>
    <p class="eyebrow">Need a person instead?</p>
    <h2>Contact the APES call handlers for direct support.</h2>
  </div>
  <div class="action-row">
    <a class="button button-primary" href="/contact/">Contact APES</a>
    <a class="button button-secondary" href="https://contact.apes.org.uk/" target="_blank" rel="noreferrer">Open contact centre</a>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => '24/7 services', 'href' => '/24-7-services/'],
                    ['label' => 'Shelter & Rescue', 'href' => 'https://www.apesshelter.org.uk/', 'external' => true],
                ],
            ],
            '24-7-services' => [
                'route' => '/24-7-services/',
                'meta_title' => '24/7 services | Emergency support guidance from APES',
                'title' => '24/7 services',
                'description' => 'Read the current APES out-of-hours contact routes, emergency support definitions and veterinary advice signposting.',
                'hero_kicker' => 'Out-of-hours support',
                'hero_title' => 'Advice, emergency channels and urgent support routes.',
                'hero_summary' => 'The live APES page explains where people can seek advice outside normal hours and which circumstances may qualify as urgent support requests.',
                'hero_actions' => [
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'primary'],
                    ['label' => 'Open Discord', 'href' => 'https://discord.gg/', 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Public guidance only', 'Emergency veterinary care signposted externally'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>The live page lists several ways to contact APES for advice and support, including live chat, email through the contact page, Discord and WhatsApp.</p>
  <ul class="tick-list">
    <li>Live chat on the website.</li>
    <li>Email via the contact page or contact centre.</li>
    <li>Discord community support.</li>
    <li>WhatsApp for urgent shelter and rescue updates.</li>
  </ul>
</section>

<section class="section-shell split-panel">
  <div>
    <p class="eyebrow">What counts as an emergency?</p>
    <ul class="clean-list">
      <li>Made homeless by fire or flood.</li>
      <li>Kicked out from your home.</li>
      <li>Disconnection from utilities.</li>
    </ul>
  </div>
  <div class="note-panel">
    <h2>Emergency veterinary guidance</h2>
    <p>The public page signposts Rutland House Emergency Care and lists an emergency number of <strong>01744 853510</strong> for veterinary emergencies.</p>
    <p>This page remains guidance-only and does not create a new local clinical triage workflow.</p>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                    ['label' => 'Discord community', 'href' => 'https://discord.gg/', 'external' => true],
                    ['label' => 'WhatsApp support', 'href' => 'https://api.whatsapp.com/', 'external' => true],
                ],
            ],
            'animal-therapy' => [
                'route' => '/services/animal-therapy/',
                'meta_title' => 'Animal therapy | APES therapy and wellbeing support',
                'title' => 'APES animal therapy programme',
                'description' => 'Learn how APES describes the benefits of therapy animals for stress, confidence and emotional support.',
                'hero_kicker' => 'Human welfare',
                'hero_title' => 'Therapy animals as calm, non-judgemental support.',
                'hero_summary' => 'The public APES page explains how carefully supported animal interaction can help reduce stress and support wellbeing for some service users.',
                'hero_actions' => [
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'primary'],
                    ['label' => 'Book educational visits', 'href' => '/educational-visits/', 'variant' => 'secondary'],
                ],
                'pills' => ['Human welfare service', 'Public information preserved'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>The live page describes therapy animals as a calming presence for some service users experiencing stress, anxiety or low mood. It explains that people may benefit from holding, stroking, grooming or simply sitting with an animal when appropriate and supervised.</p>
  <blockquote class="quote-card">
    <p>Animals are a great icebreaker in both one-to-one and group therapy sessions. They lift people’s spirits, and just petting or stroking an animal can do wonders for blood pressure and stress levels.</p>
  </blockquote>
  <blockquote class="quote-card">
    <p>The reason animals make such an impact is because people do not feel judged by them. Animals offer unconditional acceptance, which helps service users feel more confident in confronting their issues.</p>
  </blockquote>
</section>

<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">Programme focus</p>
    <h2>Comfort, confidence and supported interaction.</h2>
  </div>
  <ul class="tick-list">
    <li>Build calmer one-to-one and group sessions.</li>
    <li>Support confidence and self-esteem through gentle animal interaction.</li>
    <li>Offer a welfare-first, non-judgemental setting.</li>
  </ul>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Educational visits', 'href' => '/educational-visits/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ],
            'educational-visits' => [
                'route' => '/educational-visits/',
                'meta_title' => 'Educational visits | APES outreach and learning sessions',
                'title' => 'Educational visits',
                'description' => 'APES educational visits bring welfare-led talks and exotic species learning experiences to schools, groups and community settings.',
                'hero_kicker' => 'Education',
                'hero_title' => 'Bring exotic wildlife learning directly to your venue.',
                'hero_summary' => 'APES educational visits are described as age-appropriate, welfare-led sessions for schools, colleges, youth groups, care homes and community organisations.',
                'hero_actions' => [
                    ['label' => 'Contact APES about a visit', 'href' => '/contact/', 'variant' => 'primary'],
                    ['label' => 'Support the programme', 'href' => '/donate/', 'variant' => 'secondary'],
                ],
                'pills' => ['Public-facing', 'Community education'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>APES CIC educational visits bring the wonders of exotic wildlife directly to the venue, whether that is a school, college, youth club, care home or community group. The live public copy describes experienced animal educators arriving with a diverse selection of safely handled species and offering age-appropriate talks on biology, behaviour and habitat.</p>
  <p>Through hands-on encounters and interactive questions, the aim is to build appreciation for animal welfare, highlight the risks of the illegal wildlife trade and encourage conservation-minded care.</p>
</section>

<section class="section-shell">
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Tailored visits</h3>
      <p>Sessions can be adapted to group interests and learning objectives.</p>
    </article>
    <article class="info-card">
      <h3>Welfare and conservation</h3>
      <p>Content focuses on responsible ownership, habitat awareness and practical animal welfare.</p>
    </article>
    <article class="info-card">
      <h3>Community benefit</h3>
      <p>Visits are suitable for public learning, wellbeing sessions and responsible care awareness.</p>
    </article>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Animal therapy', 'href' => '/services/animal-therapy/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ],
            'donate' => [
                'route' => '/donate/',
                'meta_title' => 'Donate | Support APES CIC animal welfare work',
                'title' => 'Donate',
                'description' => 'Donate to APES CIC and help keep rescue, rehabilitation, support and education work moving.',
                'hero_kicker' => 'Support APES',
                'hero_title' => 'Donate today and help keep more animals safe.',
                'hero_summary' => 'The public donation route remains a core support journey for welfare work, relocation needs, rehabilitation and operational continuity.',
                'hero_actions' => [
                    ['label' => 'Open donation route', 'href' => 'https://www.apesdonor.social/', 'external' => true, 'variant' => 'primary'],
                    ['label' => 'See fundraising priorities', 'href' => '/donating/fundraising/', 'variant' => 'secondary'],
                ],
                'pills' => ['Donation route required in footer', 'Public-facing'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>The live page asks supporters to donate today and help the animals while allowing APES to keep up the work it does. In the rebuilt version, the donation journey remains visible in navigation, footer links and fundraising support panels.</p>
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Rescue and rehabilitation</h3>
      <p>Support species-appropriate housing, transport, recovery and daily welfare costs.</p>
    </article>
    <article class="info-card">
      <h3>Relocation and continuity</h3>
      <p>Help APES maintain safe operations during periods of premises change and service pressure.</p>
    </article>
    <article class="info-card">
      <h3>Education and public support</h3>
      <p>Fund guidance, outreach, volunteer coordination and practical public-facing services.</p>
    </article>
  </div>
</section>

<section class="cta-band">
  <div>
    <p class="eyebrow">Give with confidence</p>
    <h2>APES routes supporters to approved external donation and supporter services.</h2>
  </div>
  <div class="action-row">
    <a class="button button-primary" href="https://www.apesdonor.social/" target="_blank" rel="noreferrer">Donate through APES</a>
    <a class="button button-secondary" href="/donating/fundraising/">View fundraising items</a>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Fundraising', 'href' => '/donating/fundraising/'],
                    ['label' => 'Help Us Move', 'href' => '/help-us-move/'],
                ],
            ],
            'fundraising' => [
                'route' => '/donating/fundraising/',
                'meta_title' => 'Fundraising | APES equipment and technology priorities',
                'title' => 'Fundraising',
                'description' => 'Review current fundraising priorities that support APES welfare operations, equipment and supporter services.',
                'hero_kicker' => 'Fundraising priorities',
                'hero_title' => 'Help fund equipment, systems and practical welfare tools.',
                'hero_summary' => 'The live fundraising page lists items that need investment so APES can keep services running and improve operational resilience.',
                'hero_actions' => [
                    ['label' => 'Donate', 'href' => '/donate/', 'variant' => 'primary'],
                    ['label' => 'View change log', 'href' => '/change-log-hub/', 'variant' => 'secondary'],
                ],
                'pills' => ['Public-facing', 'Connected donation services'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>The legacy page says that from time to time things break down, new technology is needed, and practical equipment has to be replaced quickly to keep services moving.</p>
  <div class="card-grid card-grid-two">
    <article class="info-card">
      <h3>Members software</h3>
      <p>Software and systems that support supporter and member administration.</p>
    </article>
    <article class="info-card">
      <h3>Till system</h3>
      <p>The live page links this item to improving client and customer service.</p>
    </article>
    <article class="info-card">
      <h3>Scales</h3>
      <p>Essential monitoring equipment to support routine welfare and care standards.</p>
    </article>
    <article class="info-card">
      <h3>iPads and steel tables</h3>
      <p>Operational tools that help APES work with animals, track needs and improve daily handling workflows.</p>
    </article>
  </div>
</section>

<section class="note-panel">
  <h2>Fundraising content note</h2>
  <p>The public page contains repeated donor-wall placeholders and some duplicated supporting wording. This rebuild keeps the priorities visible while recording those content issues in the audit for APES review.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Donate', 'href' => '/donate/'],
                    ['label' => 'Enterprise mailing list', 'href' => '/enterprise-mailing-list/'],
                ],
            ],
            'animal-causes' => [
                'route' => '/animal-causes/',
                'meta_title' => 'Animal causes | Welfare priorities supported by APES',
                'title' => 'Animal causes',
                'description' => 'Animal welfare, conservation and responsible ownership causes supported by APES CIC.',
                'hero_kicker' => 'Causes',
                'hero_title' => 'Support causes that strengthen welfare, education and conservation.',
                'hero_summary' => 'This route groups the recurring themes visible across the live APES site: rescue, rehabilitation, responsible ownership, ethical rehoming and public education.',
                'hero_actions' => [
                    ['label' => 'Donate', 'href' => '/donate/', 'variant' => 'primary'],
                    ['label' => 'Volunteer', 'href' => '/volunteer/', 'variant' => 'secondary'],
                ],
                'pills' => ['Cause-led content', 'Public-facing'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Emergency rescue</h3>
      <p>Responding when exotic pets or other animals are abandoned, displaced or unsafe.</p>
    </article>
    <article class="info-card">
      <h3>Rehabilitation and rehoming</h3>
      <p>Helping animals recover, stabilise and move toward long-term welfare outcomes.</p>
    </article>
    <article class="info-card">
      <h3>Education and prevention</h3>
      <p>Reducing avoidable harm through practical guidance, outreach and responsible ownership support.</p>
    </article>
  </div>
</section>

<section class="section-shell">
  <p>Across the current public website, APES also emphasises conservation awareness, non-judgemental support, sustainability and accountability. This rebuilt page acts as a clear cause overview without inventing new policy commitments.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Our main mission statement', 'href' => '/mission/our-main-mission-statement/'],
                    ['label' => 'Donate', 'href' => '/donate/'],
                ],
            ],
            'mailing-lists' => [
                'route' => '/mailing-lists/',
                'meta_title' => 'Mailing lists | Stay updated with APES CIC',
                'title' => 'Mailing lists',
                'description' => 'Keep up with APES CIC updates through approved newsletter and mailing-list routes.',
                'hero_kicker' => 'Updates',
                'hero_title' => 'Choose the right APES updates route for you.',
                'hero_summary' => 'The live site promotes mailing lists for general supporters and a separate route for enterprise and social-enterprise audiences.',
                'hero_actions' => [
                    ['label' => 'Visit APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Enterprise mailing list', 'href' => '/enterprise-mailing-list/', 'variant' => 'secondary'],
                ],
                'pills' => ['Newsletter prompts routed to APES Newsroom'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>For general public news, APES now routes update prompts through APES Newsroom so supporters can read current stories, guidance and notices in one central public destination.</p>
  <div class="card-grid card-grid-two">
    <article class="info-card">
      <h3>General updates</h3>
      <p>Use APES Newsroom for public announcements, appeals, service notices and cross-division updates.</p>
    </article>
    <article class="info-card">
      <h3>Enterprise and partners</h3>
      <p>Use the enterprise mailing-list route for corporate, social-enterprise and partnership-focused communications.</p>
    </article>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true],
                    ['label' => 'Enterprise mailing list', 'href' => '/enterprise-mailing-list/'],
                ],
            ],
            'enterprise-mailing-list' => [
                'route' => '/enterprise-mailing-list/',
                'meta_title' => 'Enterprise mailing list | APES CIC business and partner updates',
                'title' => 'Enterprise mailing list',
                'description' => 'Register interest in enterprise and partner-focused APES updates through the approved sign-up route.',
                'hero_kicker' => 'Partnership updates',
                'hero_title' => 'Business, partner and social-enterprise communications.',
                'hero_summary' => 'The public footer and service pages link to an enterprise mailing-list sign-up route hosted on the approved Zoho form service.',
                'hero_actions' => [
                    ['label' => 'Open enterprise sign-up', 'href' => 'https://forms.zohopublic.eu/', 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Read fundraising priorities', 'href' => '/donating/fundraising/', 'variant' => 'secondary'],
                ],
                'pills' => ['Third-party form remains external'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>This route remains a simple bridge to the approved external form used for corporate, social-enterprise, sponsor and wider partnership communications. The rebuild does not duplicate that workflow locally.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'External enterprise sign-up', 'href' => 'https://forms.zohopublic.eu/', 'external' => true],
                    ['label' => 'Sponsors', 'href' => '/sponsors/'],
                ],
            ],
            'volunteer' => [
                'route' => '/volunteer/',
                'meta_title' => 'Volunteer and student placements | Support APES CIC',
                'title' => 'Volunteer and student placements',
                'description' => 'Find out how volunteer-led support and placements help APES CIC deliver animal welfare services.',
                'hero_kicker' => 'Volunteer-led organisation',
                'hero_title' => 'Help APES deliver specialist support with practical, respectful volunteering.',
                'hero_summary' => 'The live APES website highlights that staff are volunteers and that respectful, welfare-first support underpins the organisation’s services.',
                'hero_actions' => [
                    ['label' => 'Contact APES about volunteering', 'href' => '/contact/', 'variant' => 'primary'],
                    ['label' => 'Support through fundraising', 'href' => '/donating/fundraising/', 'variant' => 'secondary'],
                ],
                'pills' => ['Public-facing', 'Volunteer-led service model'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>Public APES copy repeatedly explains that staff are unpaid volunteers and asks supporters to treat them with respect. Volunteering and placements form part of how APES keeps services moving across rescue, care, support and education work.</p>
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Animal welfare support</h3>
      <p>Support day-to-day care, cleaning, handling preparation and practical routines.</p>
    </article>
    <article class="info-card">
      <h3>Public support routes</h3>
      <p>Help people access information, signposting and welfare-focused services clearly.</p>
    </article>
    <article class="info-card">
      <h3>Student placements</h3>
      <p>Placement pathways should be coordinated through approved APES contact routes rather than through unreviewed local forms.</p>
    </article>
  </div>
</section>

<section class="note-panel">
  <h2>Before you apply</h2>
  <p>Because volunteering can involve public-facing support and animal welfare activity, APES may need to assess suitability, training needs, availability and role fit before confirming a placement.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Contact centre', 'href' => 'https://contact.apes.org.uk/', 'external' => true],
                    ['label' => 'Help centre', 'href' => 'https://help.apes.org.uk/', 'external' => true],
                ],
            ],
            'our-main-mission-statement' => [
                'route' => '/mission/our-main-mission-statement/',
                'meta_title' => 'Our main mission statement | APES CIC',
                'title' => 'Our main mission statement',
                'description' => 'Read the public APES CIC mission focused on protection, rescue, rehabilitation, education and responsible support.',
                'hero_kicker' => 'Mission',
                'hero_title' => 'Protecting exotic pets and empowering owners.',
                'hero_summary' => 'APES presents its mission around rescue, rehabilitation, rehoming, education-led prevention and non-judgemental support for people who need help.',
                'hero_actions' => [
                    ['label' => 'Support ethical rehabilitation', 'href' => '/mission/support-ethical-rehabilitation/', 'variant' => 'primary'],
                    ['label' => 'Donate', 'href' => '/donate/', 'variant' => 'secondary'],
                ],
                'pills' => ['Mission content', 'Public-facing'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="card-grid card-grid-three">
    <article class="metric-card">
      <strong>Rescue</strong>
      <span>Respond when exotic pets are abandoned, at risk or in distress.</span>
    </article>
    <article class="metric-card">
      <strong>Rehabilitate</strong>
      <span>Provide housing, nutrition and recovery support that is appropriate to the species.</span>
    </article>
    <article class="metric-card">
      <strong>Rehome</strong>
      <span>Match animals with responsible adopters who are prepared for the realities of specialist care.</span>
    </article>
  </div>
</section>

<section class="section-shell">
  <p>The public mission also emphasises advice, education and support that help owners keep pets at home safely where appropriate, alongside stronger understanding of conservation, welfare and responsible ownership.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Support ethical rehabilitation', 'href' => '/mission/support-ethical-rehabilitation/'],
                    ['label' => 'About APES', 'href' => '/about-us/'],
                ],
            ],
            'support-ethical-rehabilitation' => [
                'route' => '/mission/support-ethical-rehabilitation/',
                'meta_title' => 'Support ethical exotic animal rehabilitation | APES CIC',
                'title' => 'Support ethical exotic animal rehabilitation',
                'description' => 'Read how APES describes ethical rehabilitation, responsible care and welfare-first recovery.',
                'hero_kicker' => 'Ethical care',
                'hero_title' => 'Recovery that protects welfare, dignity and long-term outcomes.',
                'hero_summary' => 'Ethical rehabilitation in the APES context means species-appropriate recovery, responsible ownership support and practical decisions that prioritise welfare over convenience.',
                'hero_actions' => [
                    ['label' => 'Donate to rehabilitation work', 'href' => '/donate/', 'variant' => 'primary'],
                    ['label' => 'Read re-homing policy', 'href' => '/policies/re-homing-policy/', 'variant' => 'secondary'],
                ],
                'pills' => ['Welfare-first', 'Mission content'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <ul class="tick-list">
    <li>Species-appropriate housing, nutrition and handling during recovery.</li>
    <li>Thoughtful assessment before rehoming or long-term sanctuary decisions.</li>
    <li>Owner education and non-judgemental support where prevention can keep animals safe.</li>
    <li>Clear links between rehabilitation, conservation awareness and public trust.</li>
  </ul>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Main mission statement', 'href' => '/mission/our-main-mission-statement/'],
                    ['label' => 'Adoption policy', 'href' => '/policies/adoption-policy/'],
                ],
            ],
            'the-center' => [
                'route' => '/the-center/',
                'meta_title' => 'The centre | APES public location overview',
                'title' => 'The centre',
                'description' => 'A public walkthrough of the APES centre, including reception, animal spaces and accessibility notes.',
                'hero_kicker' => 'Location overview',
                'hero_title' => 'A simple public walkthrough of the APES centre.',
                'hero_summary' => 'The live site says the page is still being developed, but it already introduces key spaces and public wayfinding information.',
                'hero_actions' => [
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'primary'],
                    ['label' => 'Opening times', 'href' => '/opening-times/', 'variant' => 'secondary'],
                ],
                'pills' => ['Page still developing', 'Public-facing route preserved'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Front entrance</h3>
      <p>The public copy notes a small car park and ramp access at the entrance.</p>
    </article>
    <article class="info-card">
      <h3>Reception</h3>
      <p>Visitors are welcomed and directed from reception.</p>
    </article>
    <article class="info-card">
      <h3>Small animal walkthrough</h3>
      <p>A public-facing walkthrough area for some adoption-ready animals.</p>
    </article>
    <article class="info-card">
      <h3>Stairs and wayfinding</h3>
      <p>The legacy page includes partially completed image captions for stairs and access routes.</p>
    </article>
    <article class="info-card">
      <h3>Exotic adoption room</h3>
      <p>Described as the space where healthy, adoptable animals wait for their forever homes.</p>
    </article>
    <article class="info-card">
      <h3>Pet products area</h3>
      <p>The centre also connects with the APES Pet Shop offering.</p>
    </article>
  </div>
</section>

<section class="note-panel">
  <h2>Content review note</h2>
  <p>The current public page includes unfinished captions and a “currently developing” message. Those issues are logged in the content audit rather than silently overwritten.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                    ['label' => 'About APES', 'href' => '/about-us/'],
                ],
            ],
            'bookings' => [
                'route' => '/bookings/',
                'meta_title' => 'Bookings | APES service booking routes',
                'title' => 'Bookings',
                'description' => 'Use APES contact and connected service routes to arrange visits, support and other bookings.',
                'hero_kicker' => 'Booking routes',
                'hero_title' => 'Book through the right APES service channel.',
                'hero_summary' => 'APES uses different approved routes for different services, including external portals for boarding and direct enquiries for other requests.',
                'hero_actions' => [
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'primary'],
                    ['label' => 'Boarding portal', 'href' => 'https://petmanager.app/', 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Connected service routing', 'Public-facing'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Pet boarding</h3>
      <p>Use the external boarding portal for boarding stays and packages.</p>
    </article>
    <article class="info-card">
      <h3>Educational visits and support</h3>
      <p>Use the APES contact route for education, outreach and general enquiries.</p>
    </article>
    <article class="info-card">
      <h3>Specialist services</h3>
      <p>Where a service is still developing or availability changes, APES Newsroom and the contact team remain the best routes for current information.</p>
    </article>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                    ['label' => 'Educational visits', 'href' => '/educational-visits/'],
                    ['label' => 'Pet boarding', 'href' => '/pet-boarding/'],
                ],
            ],
            'opening-times' => [
                'route' => '/opening-times/',
                'meta_title' => 'Opening times | APES public hours and contact guidance',
                'title' => 'Opening times',
                'description' => 'Current public opening hours for APES CIC and guidance on contacting the organisation outside standard hours.',
                'hero_kicker' => 'Public hours',
                'hero_title' => 'Current public hours and contact guidance.',
                'hero_summary' => 'Across the current live site, APES publicly displays centre hours of 10:00 AM to 5:00 PM and explains that some out-of-hours calls are redirected to advisors.',
                'hero_actions' => [
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'primary'],
                    ['label' => '24/7 services', 'href' => '/24-7-services/', 'variant' => 'secondary'],
                ],
                'pills' => ['Public-facing', 'Operational details may change'],
                'body_html' => <<<'HTML'
<section class="section-shell split-panel">
  <div class="note-panel">
    <h2>Public opening hours</h2>
    <p><strong>Monday to Sunday:</strong> 10:00 AM to 5:00 PM</p>
    <p>The legacy site also contains inconsistent wording such as “Centre” and “Center”. The rebuilt page keeps the hours clear and records those copy inconsistencies in the audit.</p>
  </div>
  <div class="note-panel">
    <h2>Out-of-hours note</h2>
    <p>The public footer states that some out-of-hours calls are directed to out-of-hours advisors and that some staff may be working from home.</p>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                    ['label' => 'The centre', 'href' => '/the-center/'],
                ],
            ],
            'sponsors' => [
                'route' => '/sponsors/',
                'meta_title' => 'Sponsors | Partner support for APES CIC',
                'title' => 'Sponsors',
                'description' => 'APES recognises the role of supporters, sponsors and partner organisations in sustaining welfare services.',
                'hero_kicker' => 'Partners and sponsors',
                'hero_title' => 'Support from sponsors helps APES do more good.',
                'hero_summary' => 'APES works with technology, commerce and infrastructure partners whose software and services strengthen public support, operations and digital resilience.',
                'hero_actions' => [
                    ['label' => 'Enterprise mailing list', 'href' => '/enterprise-mailing-list/', 'variant' => 'primary'],
                    ['label' => 'Fundraising priorities', 'href' => '/donating/fundraising/', 'variant' => 'secondary'],
                ],
                'pills' => ['Public-facing', 'Sponsor recognition', 'Software and service support'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">Technology and service support</p>
    <h2>Software and infrastructure support helps APES stay responsive.</h2>
  </div>
  <p>APES thanks the organisations helping strengthen digital services, supporter journeys, operations and online resilience across the wider APES network.</p>
  <div class="card-grid card-grid-two sponsor-grid">
    <article class="sponsor-card">
      <div class="sponsor-card-logo-wrap">
        <img class="sponsor-card-logo" src="/assets/logos/sponsors/zoho-logo.png" alt="Zoho logo">
      </div>
      <h3>Zoho</h3>
      <p>Zoho provides APES-friendly software routes for forms, website services, CRM-style workflows and supporter communications.</p>
      <p><strong>How they help APES:</strong> Supports forms, operational workflows and connected digital services used across the organisation.</p>
      <a class="button button-secondary" href="https://www.zoho.com/" target="_blank" rel="noreferrer">Visit Zoho</a>
    </article>
    <article class="sponsor-card">
      <div class="sponsor-card-logo-wrap sponsor-card-logo-dark">
        <img class="sponsor-card-logo" src="/assets/logos/sponsors/shopify-logo.jpg" alt="Shopify logo">
      </div>
      <h3>Shopify</h3>
      <p>Shopify powers connected ecommerce routes that help APES sell products and build supporter-facing retail journeys.</p>
      <p><strong>How they help APES:</strong> Helps APES run online shop experiences that can contribute funds toward welfare and operational work.</p>
      <a class="button button-secondary" href="https://www.shopify.com/" target="_blank" rel="noreferrer">Visit Shopify</a>
    </article>
    <article class="sponsor-card">
      <div class="sponsor-card-logo-wrap">
        <img class="sponsor-card-logo" src="/assets/logos/sponsors/akamai-logo.png" alt="Akamai logo">
      </div>
      <h3>Akamai</h3>
      <p>Akamai is recognised for cloud delivery, performance and security services that help organisations protect digital experiences.</p>
      <p><strong>How they help APES:</strong> Strengthens website performance, content delivery and online resilience for public-facing services.</p>
      <a class="button button-secondary" href="https://www.akamai.com/" target="_blank" rel="noreferrer">Visit Akamai</a>
    </article>
    <article class="sponsor-card">
      <div class="sponsor-card-logo-wrap">
        <img class="sponsor-card-logo" src="/assets/logos/sponsors/cpanel-logo.png" alt="cPanel logo">
      </div>
      <h3>cPanel</h3>
      <p>cPanel is widely used for website and hosting management, helping teams look after domains, files, email and server-side administration.</p>
      <p><strong>How they help APES:</strong> Supports hosting management and practical website administration for connected APES services.</p>
      <a class="button button-secondary" href="https://www.cpanel.net/" target="_blank" rel="noreferrer">Visit cPanel</a>
    </article>
  </div>
</section>

<section class="section-shell split-panel">
  <div class="note-panel">
    <h2>Why sponsorship matters</h2>
    <p>Sponsorship helps APES cover software, website infrastructure, communications tooling and operational systems that keep welfare services visible and usable.</p>
  </div>
  <div class="note-panel">
    <h2>How to express interest</h2>
    <p>Use the enterprise mailing-list route or the APES contact page for sponsorship, grant, software support or wider partnership conversations.</p>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Enterprise mailing list', 'href' => '/enterprise-mailing-list/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ],
            'about-us' => [
                'route' => '/about-us/',
                'meta_title' => 'About APES CIC | Rescue, rehabilitation and public support',
                'title' => 'About APES',
                'description' => 'Learn about APES CIC, the three Rs, volunteer-led operations and the welfare-first approach behind the organisation.',
                'hero_kicker' => 'About the organisation',
                'hero_title' => 'A volunteer-led APES CIC committed to the three Rs.',
                'hero_summary' => 'Public site copy frames APES around Rescue, Rehabilitate and Rehome, while also emphasising transparency, non-profit operation and respect for unpaid volunteers.',
                'hero_actions' => [
                    ['label' => 'Read the mission statement', 'href' => '/mission/our-main-mission-statement/', 'variant' => 'primary'],
                    ['label' => 'Volunteer with APES', 'href' => '/volunteer/', 'variant' => 'secondary'],
                ],
                'pills' => ['Public-facing', 'Legacy copy issues documented in audit'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">The three Rs</p>
    <h2>Rescue, rehabilitate and rehome.</h2>
  </div>
  <p>The live page describes APES as a small shelter and rescue service supporting people with specialist exotic pets. It explains rescue as responding when animals are in need, rehabilitation as helping them recover with proper care, and rehoming as finding suitable adoptive homes.</p>
</section>

<section class="section-shell">
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Transparency</h3>
      <p>The public copy says APES tries to be transparent and publish data that it can share publicly.</p>
    </article>
    <article class="info-card">
      <h3>All staff are volunteers</h3>
      <p>The live site asks the public to treat unpaid volunteers with respect.</p>
    </article>
    <article class="info-card">
      <h3>Non-profit operation</h3>
      <p>Fees, product sales and donations support the rescue centre and related services.</p>
    </article>
  </div>
</section>

<section class="note-panel">
  <h2>Content review note</h2>
  <p>The live page contains copy issues such as "Satuday", "center" and other wording inconsistencies. Those are captured in the content audit for APES review rather than silently rewritten into policy-like commitments.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Mission statement', 'href' => '/mission/our-main-mission-statement/'],
                    ['label' => 'The centre', 'href' => '/the-center/'],
                ],
            ],
            'socials' => [
                'route' => '/socials/',
                'meta_title' => 'Socials | Official APES public channels',
                'title' => 'Socials',
                'description' => 'Find the main public APES social, streaming and community routes in one place.',
                'hero_kicker' => 'Public channels',
                'hero_title' => 'Official APES social and supporter channels.',
                'hero_summary' => 'The live website links to several public APES channels, including APES Social, YouTube and supporter communities. This rebuilt page keeps those journeys easy to find without turning them into local features.',
                'hero_actions' => [
                    ['label' => 'Open APES Social', 'href' => 'https://social.apes.org.uk/', 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Watch on YouTube', 'href' => 'https://www.youtube.com/', 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Connected services', 'Public-facing route preserved'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">Our socials</p>
    <h2>Public APES channels across the web.</h2>
  </div>
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Facebook</h3>
      <p>The live page lists both a Facebook Page and Facebook Group as public community routes for APES followers.</p>
    </article>
    <article class="info-card">
      <h3>Instagram and X</h3>
      <p>Instagram and X are shown as outward-facing social channels used for updates and wider public visibility.</p>
    </article>
    <article class="info-card">
      <h3>Threads and Bluesky</h3>
      <p>The live page also references Threads and Bluesky, alongside older or placeholder-style social entries that need APES review.</p>
    </article>
  </div>
</section>
<section class="note-panel">
  <h2>Content review note</h2>
  <p>The live socials page mixes real channel listings with weaker placeholder-style copy blocks. The rebuilt route keeps the public social structure visible while recording those weaker sections for APES review.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'APES communities', 'href' => '/apes-communities/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                    ['label' => 'APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true],
                ],
            ],
            'apes-communities' => [
                'route' => '/apes-communities/',
                'meta_title' => 'APES communities | Public supporter and community routes',
                'title' => 'APES communities',
                'description' => 'Browse the main public APES community routes, supporter spaces and connected social channels.',
                'hero_kicker' => 'Community routes',
                'hero_title' => 'Find the APES communities that best fit your role.',
                'hero_summary' => 'The current public site points supporters, volunteers and service users toward several connected communities. This page keeps those public journeys visible while leaving the community platforms themselves external.',
                'hero_actions' => [
                    ['label' => 'Join Discord community', 'href' => 'https://discord.gg/', 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Open APES Social', 'href' => 'https://social.apes.org.uk/', 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Connected services', 'External communities retained'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>APES uses external community spaces for conversation, supporter updates and engagement. The rebuilt site keeps those routes visible, but does not recreate account systems, moderation tools or message history locally.</p>
  <div class="card-grid card-grid-two">
    <article class="info-card">
      <h3>Supporter and public communities</h3>
      <p>Use public social and Discord channels for general updates, community discussion and outward-facing engagement.</p>
    </article>
    <article class="info-card">
      <h3>Members and portal journeys</h3>
      <p>Routes such as MyAPES remain external because they belong to separate APES account or portal systems.</p>
    </article>
  </div>
</section>
<section class="note-panel">
  <h2>Live-site review note</h2>
  <p>The current public APES Communities page contains obvious placeholder copy such as “The face of the moon was in shadow”. The rebuild replaces that with a neutral community-route overview and records the placeholder issue in the content audit.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Socials', 'href' => '/socials/'],
                    ['label' => 'MyAPES', 'href' => 'https://www.myapes.me.uk/', 'external' => true],
                    ['label' => 'Volunteer', 'href' => '/volunteer/'],
                ],
            ],
            'staff' => [
                'route' => '/staff/',
                'meta_title' => 'Staff and volunteers | APES CIC public team overview',
                'title' => 'Staff and volunteers',
                'description' => 'Public information about the volunteer-led APES CIC team and how the organisation frames its staffing model.',
                'hero_kicker' => 'Team overview',
                'hero_title' => 'A volunteer-led organisation with public-facing transparency notes.',
                'hero_summary' => 'The live APES public copy says that the team is volunteer-led and asks visitors to treat staff and volunteers with respect. This rebuilt page keeps that public framing without exposing personal staff records.',
                'hero_actions' => [
                    ['label' => 'Read about APES', 'href' => '/about-us/', 'variant' => 'primary'],
                    ['label' => 'Volunteer with APES', 'href' => '/volunteer/', 'variant' => 'secondary'],
                ],
                'pills' => ['Public-facing', 'No personal staff data published'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="section-heading">
    <p class="eyebrow">The board</p>
    <h2>Public names and roles currently shown on the live staff page.</h2>
  </div>
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Board roles</h3>
      <p>The live page currently lists Mr Murphy as Director, alongside organisation-secretary roles including Mr A Carman, Mr D Smith, Miss A Sidwell and Barry Chadwick.</p>
    </article>
    <article class="info-card">
      <h3>Management and supervisors</h3>
      <p>Public management names currently shown include Mrs A Chadwick as Reception Manager and supervisors such as Rae Hitchcock, Matthew Bolas and Abi Gilpin.</p>
    </article>
    <article class="info-card">
      <h3>Volunteer-led operations</h3>
      <p>The wider public site says APES is volunteer-led and asks visitors to treat staff and volunteers respectfully while services operate under pressure.</p>
    </article>
  </div>
</section>
<section class="note-panel">
  <h2>Content review note</h2>
  <p>The live staff page uses “Book Appointment” calls to action for listed people. The rebuild preserves the public team structure but does not recreate personal booking flows locally.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'About APES', 'href' => '/about-us/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ],
            'terms-of-service' => [
                'route' => '/policies/terms-of-service/',
                'meta_title' => 'Terms of Service | APES CIC',
                'title' => 'Terms of service',
                'description' => 'Public terms and conditions for APES CIC websites.',
                'hero_kicker' => 'Policy',
                'hero_title' => 'Terms and conditions for APES CIC public websites.',
                'hero_summary' => 'This rebuilt policy page preserves the structure and public wording visible on the live site while improving layout and accessibility.',
                'hero_actions' => [
                    ['label' => 'Privacy Policy', 'href' => '/policies/privacy/', 'variant' => 'primary'],
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'secondary'],
                ],
                'pills' => ['Policy page', 'Public wording preserved'],
                'body_html' => <<<'HTML'
<section class="policy-stack">
  <article class="policy-block">
    <h2>Effective date</h2>
    <p>11 April 2025</p>
  </article>
  <article class="policy-block">
    <h2>1. Introduction</h2>
    <p>These Terms and Conditions govern your use of websites operated by Association of Protecting Exotic Species CIC, including but not limited to www.apes.org.uk, www.apesshelter.org.uk, www.apespetcare.org.uk, www.apesshop.co.uk and www.myapes.me.uk.</p>
  </article>
  <article class="policy-block">
    <h2>2. Acceptance of terms</h2>
    <p>By accessing or using any APES website, you agree to be bound by these terms and the Privacy Policy. If you do not agree, please refrain from using the websites.</p>
  </article>
  <article class="policy-block">
    <h2>3. Modifications to terms</h2>
    <p>APES CIC may modify or update these terms at any time. Continued use after changes constitutes acceptance of the updated terms.</p>
  </article>
  <article class="policy-block">
    <h2>4. Use of the websites</h2>
    <p>You agree to use the websites only for lawful purposes. Content is provided for informational purposes only and should not be treated as legal, financial or professional advice.</p>
  </article>
  <article class="policy-block">
    <h2>5. Intellectual property</h2>
    <p>All content, trademarks, logos and materials on the websites are owned by APES CIC or used with permission. They may not be reproduced or distributed without written consent.</p>
  </article>
  <article class="policy-block">
    <h2>6. User accounts</h2>
    <p>If you create an account on any APES website, you are responsible for accurate information, credential confidentiality and reporting suspected unauthorised use.</p>
  </article>
  <article class="policy-block">
    <h2>7. Payments and partnership with Stripe</h2>
    <p>Some APES websites offer products, services or donations involving online payments. Payment processing may be handled by Stripe, and related payment activity is governed by Stripe terms.</p>
  </article>
  <article class="policy-block">
    <h2>8. Limitation of liability</h2>
    <p>To the fullest extent permitted by law, APES CIC is not liable for direct, indirect, incidental, consequential or punitive damages arising from or related to use of the websites.</p>
  </article>
  <article class="policy-block">
    <h2>9. Indemnification</h2>
    <p>You agree to indemnify and hold harmless APES CIC and its affiliates, officers, volunteers and agents from claims or losses connected with your use of the websites or breach of these terms.</p>
  </article>
  <article class="policy-block">
    <h2>10. Governing law and jurisdiction</h2>
    <p>These terms are governed by the laws of England and Wales, and disputes are subject to the exclusive jurisdiction of the courts of England and Wales.</p>
  </article>
  <article class="policy-block">
    <h2>11. Dispute resolution</h2>
    <p>The public page states that parties should first attempt to resolve disputes through mediation or arbitration prior to pursuing legal remedies.</p>
  </article>
  <article class="policy-block">
    <h2>12. Third-party links</h2>
    <p>APES websites may contain links to third-party sites for convenience. APES does not endorse or assume responsibility for those external sites, and access is at your own risk.</p>
  </article>
  <article class="policy-block">
    <h2>13. Termination</h2>
    <p>APES CIC may terminate or suspend access to the websites at any time, without notice, including for breach of the terms.</p>
  </article>
  <article class="policy-block">
    <h2>14. Severability</h2>
    <p>If any provision is invalid or unenforceable, the remaining provisions remain in force.</p>
  </article>
  <article class="policy-block">
    <h2>15. Contact information</h2>
    <ul class="clean-list">
      <li>Address: Cross House, Unit 7, Sutton Road, St Helens, WA9 3YH</li>
      <li>Email: legal@apes.org.uk</li>
      <li>Phone: 0300 302 0998</li>
    </ul>
  </article>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Privacy Policy', 'href' => '/policies/privacy/'],
                    ['label' => 'Cookie guidance', 'href' => '/policies/cookies/'],
                ],
            ],
            'privacy' => [
                'route' => '/policies/privacy/',
                'meta_title' => 'Privacy Policy | APES CIC',
                'title' => 'Privacy Policy',
                'description' => 'Public privacy guidance for APES CIC websites and connected services.',
                'hero_kicker' => 'Policy',
                'hero_title' => 'Privacy guidance for APES CIC public websites.',
                'hero_summary' => 'This page preserves the structure of the public privacy policy while moving it into the rebuilt APES layout.',
                'hero_actions' => [
                    ['label' => 'Terms of Service', 'href' => '/policies/terms-of-service/', 'variant' => 'primary'],
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'secondary'],
                ],
                'pills' => ['Policy page', 'Public wording preserved'],
                'body_html' => <<<'HTML'
<section class="policy-stack">
  <article class="policy-block">
    <h2>Effective date</h2>
    <p>11 October 2023</p>
  </article>
  <article class="policy-block">
    <h2>1. Introduction</h2>
    <p>Association of Protecting Exotic Species CIC is committed to protecting your privacy. The live policy applies to APES public websites including www.apes.org.uk, www.apesshelter.org.uk, www.apespetcare.org.uk, www.apesshop.co.uk and www.myapes.me.uk.</p>
  </article>
  <article class="policy-block">
    <h2>2. Information we collect</h2>
    <p>The public policy says APES may collect personal information such as name, email, postal address, phone number, payment details handled by a secure payment partner, and account credentials where accounts exist.</p>
    <p>It also describes non-personal information such as browser type, operating system, IP address, device details and website usage data.</p>
  </article>
  <article class="policy-block">
    <h2>3. How APES uses information</h2>
    <ul class="clean-list">
      <li>Provide, operate and maintain the websites.</li>
      <li>Process transactions and payments with partners such as Stripe.</li>
      <li>Improve and personalise services.</li>
      <li>Communicate updates and service information.</li>
      <li>Understand website usage and help prevent fraud.</li>
    </ul>
  </article>
  <article class="policy-block">
    <h2>4. Cookies and tracking technologies</h2>
    <p>The public privacy policy says APES may use cookies and similar tracking technologies, and that some site functions may not work properly if cookies are refused.</p>
  </article>
  <article class="policy-block">
    <h2>5. Disclosure of your information</h2>
    <p>The public policy states that information may be shared with service providers, disclosed to meet legal requirements, or transferred as part of a merger, acquisition or sale of assets.</p>
  </article>
  <article class="policy-block">
    <h2>6. Third-party services</h2>
    <p>APES works with third-party services such as Stripe for secure payment handling, and those providers have their own privacy policies.</p>
  </article>
  <article class="policy-block">
    <h2>7. Data security</h2>
    <p>Standard security measures are used, but the policy notes that no electronic transmission or storage method can be guaranteed as completely secure.</p>
  </article>
  <article class="policy-block">
    <h2>8. Retention</h2>
    <p>Personal information is retained only for as long as necessary for the purposes described in the policy, unless law requires or permits longer retention.</p>
  </article>
  <article class="policy-block">
    <h2>9. Your rights</h2>
    <p>Depending on jurisdiction, users may have rights to access, correct, update or request deletion of personal information.</p>
  </article>
  <article class="policy-block">
    <h2>10. International data transfers</h2>
    <p>The public policy notes that information may be transferred to or maintained on systems outside the user’s local jurisdiction.</p>
  </article>
  <article class="policy-block">
    <h2>11. Changes to the policy</h2>
    <p>APES may update the Privacy Policy at any time, and changes are effective on publication with an updated effective date.</p>
  </article>
  <article class="policy-block">
    <h2>12. Contact information</h2>
    <ul class="clean-list">
      <li>Address: Cross House, Unit 7, Sutton Road, St Helens, WA9 3YH</li>
      <li>Email: legal@apes.org.uk</li>
      <li>Phone: 0300 302 0998</li>
    </ul>
  </article>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Terms of Service', 'href' => '/policies/terms-of-service/'],
                    ['label' => 'Cookie guidance', 'href' => '/policies/cookies/'],
                ],
            ],
            'adoption-policy' => [
                'route' => '/policies/adoption-policy/',
                'meta_title' => 'Adoption Policy | APES CIC',
                'title' => 'Adoption Policy',
                'description' => 'Public adoption conditions published by APES CIC.',
                'hero_kicker' => 'Policy',
                'hero_title' => 'Animal adoption scheme conditions.',
                'hero_summary' => 'This page preserves the key public adoption wording available on the live site and marks the page for APES review because some deeper adoption conditions are not fully visible in the crawl.',
                'hero_actions' => [
                    ['label' => 'Re-homing policy', 'href' => '/policies/re-homing-policy/', 'variant' => 'primary'],
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'secondary'],
                ],
                'pills' => ['Policy page', 'Needs APES review'],
                'body_html' => <<<'HTML'
<section class="policy-stack">
  <article class="policy-block">
    <h2>Animal adoption scheme conditions</h2>
    <p>Public adoption information is shared in good faith to help guide adopters through the process. The live page says this information may include details from previous owners, the Association inspectorate or observations made while the animal was in APES care.</p>
    <p>The page also states that while APES makes every effort to ensure information is accurate, it cannot guarantee that accuracy, and users should also review the re-homing policy.</p>
  </article>
  <article class="policy-block">
    <h2>Health and treatment note</h2>
    <p>The visible public condition says the animal is deemed to be in normal health when leaving the facility unless specific conditions are noted on the Animal Adoption Form. Future veterinary or treatment costs become the adopter’s responsibility except where another clause states otherwise.</p>
  </article>
  <article class="policy-block">
    <h2>Review note</h2>
    <p>Because the source page exposes only part of the longer adoption wording in crawlable public output, this rebuilt page preserves the visible text and records the need for APES review before any deeper legal rewrite.</p>
  </article>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Re-homing policy', 'href' => '/policies/re-homing-policy/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ],
            're-homing-policy' => [
                'route' => '/policies/re-homing-policy/',
                'meta_title' => 'Re-homing Policy | APES CIC',
                'title' => 'Re-Homing Policy',
                'description' => 'Public re-homing policy guidance from APES CIC.',
                'hero_kicker' => 'Policy',
                'hero_title' => 'Matching animals to homes that protect long-term welfare.',
                'hero_summary' => 'The current public re-homing policy explains how APES approaches rescue intake, assessments, age checks and home visits before rehoming.',
                'hero_actions' => [
                    ['label' => 'Adoption Policy', 'href' => '/policies/adoption-policy/', 'variant' => 'primary'],
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'secondary'],
                ],
                'pills' => ['Policy page', 'Public wording preserved'],
                'body_html' => <<<'HTML'
<section class="policy-stack">
  <article class="policy-block">
    <h2>Overview</h2>
    <p>The public policy says these arrangements help APES ensure every animal finds the best possible home where it can live a happy, healthy life.</p>
  </article>
  <article class="policy-block">
    <h2>Key public points</h2>
    <ul class="clean-list">
      <li>Most animals in APES care have been rescued by animal control officers, and strays are transferred by the relevant local authority.</li>
      <li>Stray animals are kept for at least seven days to allow owners a fair chance to reclaim them.</li>
      <li>APES states that it will not import animals from other countries for re-homing in England and Wales.</li>
      <li>Before adoption, every animal undergoes a clinical examination by a qualified member of the animal care team.</li>
      <li>Animals can only be re-homed when proof is provided that the adopter is over 18 years old.</li>
      <li>The policy says APES takes reasonable steps to make sure animals are not re-homed without confidence that they can enjoy a good quality of life.</li>
      <li>Home visits by trained volunteers are described as part of checking that adopters understand the responsibilities of ownership.</li>
    </ul>
  </article>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Adoption Policy', 'href' => '/policies/adoption-policy/'],
                    ['label' => 'Support ethical rehabilitation', 'href' => '/mission/support-ethical-rehabilitation/'],
                ],
            ],
            'euthanasia-policy' => [
                'route' => '/policies/euthanasia-policy/',
                'meta_title' => 'Euthanasia Policy | APES CIC',
                'title' => 'Euthanasia Policy',
                'description' => 'Public euthanasia policy guidance from APES CIC.',
                'hero_kicker' => 'Policy',
                'hero_title' => 'Public euthanasia policy guidance.',
                'hero_summary' => 'The legacy page contains a broken placeholder-style heading. This rebuild corrects the presentation while preserving the visible public policy substance.',
                'hero_actions' => [
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'primary'],
                    ['label' => 'Privacy Policy', 'href' => '/policies/privacy/', 'variant' => 'secondary'],
                ],
                'pills' => ['Policy page', 'Legacy heading issue fixed in presentation'],
                'body_html' => <<<'HTML'
<section class="policy-stack">
  <article class="policy-block">
    <h2>When APES says euthanasia may be considered</h2>
    <p>The live page explains that although APES tries to give animals the best possible chance to return to good health, there are times when euthanasia may be used after individual assessment.</p>
    <ul class="clean-list">
      <li>If the animal is in pain that cannot be controlled and would otherwise face a slow, painful death.</li>
      <li>If the animal has an inoperable health condition with serious quality-of-life implications.</li>
      <li>If the animal is injured and assessed as non-recoverable.</li>
    </ul>
  </article>
  <article class="policy-block">
    <h2>Presentation note</h2>
    <p>The source page shows a clearly broken heading. That presentation issue is corrected here while the public policy content is kept narrow and unchanged in substance.</p>
  </article>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Re-homing Policy', 'href' => '/policies/re-homing-policy/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ],
            'cookies' => [
                'route' => '/policies/cookies/',
                'meta_title' => 'Cookie guidance | APES CIC',
                'title' => 'Cookie guidance',
                'description' => 'Public cookie and browser guidance for APES CIC websites.',
                'hero_kicker' => 'Policy',
                'hero_title' => 'Cookie guidance for APES public websites.',
                'hero_summary' => 'The live footer links to a cookies route, but the public crawl did not reliably expose the full source page. This rebuilt page keeps a cautious public guidance summary and marks the route for APES review.',
                'hero_actions' => [
                    ['label' => 'Privacy Policy', 'href' => '/policies/privacy/', 'variant' => 'primary'],
                    ['label' => 'Terms of Service', 'href' => '/policies/terms-of-service/', 'variant' => 'secondary'],
                ],
                'pills' => ['Policy page', 'Needs APES review'],
                'body_html' => <<<'HTML'
<section class="policy-stack">
  <article class="policy-block">
    <h2>Cookie use</h2>
    <p>The current public privacy wording says APES may use cookies and similar tracking technologies to support website operation and hold certain information.</p>
  </article>
  <article class="policy-block">
    <h2>Browser controls</h2>
    <p>Users can instruct their browser to refuse cookies, though parts of APES websites may not function properly as a result.</p>
  </article>
  <article class="policy-block">
    <h2>Review note</h2>
    <p>Because the original cookies page was not reliably retrievable in the public crawl, this rebuilt route intentionally stays narrow and should be reviewed against the authoritative APES policy text before publication.</p>
  </article>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Privacy Policy', 'href' => '/policies/privacy/'],
                    ['label' => 'Terms of Service', 'href' => '/policies/terms-of-service/'],
                ],
            ],
            'contact' => [
                'route' => '/contact/',
                'meta_title' => 'Contact APES | Find support and contact routes',
                'title' => 'Contact APES',
                'description' => 'Contact APES through the public contact centre, telephone, address and connected support routes.',
                'hero_kicker' => 'Contact and support',
                'hero_title' => 'Use the best APES route for help, support and enquiries.',
                'hero_summary' => 'The live site says the contact centre and live chat are the best ways to contact APES, while also publishing telephone and address details.',
                'hero_actions' => [
                    ['label' => 'Open contact centre', 'href' => 'https://contact.apes.org.uk/', 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Help centre', 'href' => 'https://help.apes.org.uk/', 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Footer compliance critical', 'Public-facing'],
                'body_html' => <<<'HTML'
<section class="section-shell split-panel">
  <div class="note-panel">
    <h2>Best contact route</h2>
    <p>Please use the live chat or contact centre where possible. The public site describes these as the best ways to contact APES.</p>
    <p><a class="text-link" href="https://contact.apes.org.uk/" target="_blank" rel="noreferrer">Contact APES via the contact centre</a></p>
  </div>
  <div class="note-panel">
    <h2>Direct details</h2>
    <ul class="clean-list">
      <li>Email: info@apes.org.uk</li>
      <li>Phone: 0300 302 0998</li>
      <li>Address: 40 Morris Street, St Helens, WA9 3EN</li>
    </ul>
  </div>
</section>

<section class="section-shell">
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Working hours</h3>
      <p>Weekdays and weekends are both publicly listed as 10 AM to 5 PM.</p>
    </article>
    <article class="info-card">
      <h3>Important links</h3>
      <p>Donate, volunteer and connected services remain visible from this page because it acts as a support hub in the live site.</p>
    </article>
    <article class="info-card">
      <h3>Connected platforms</h3>
      <p>MyAPES, members area, public resources and APES Social remain external journeys rather than local rebuild features.</p>
    </article>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Contact centre', 'href' => 'https://contact.apes.org.uk/', 'external' => true],
                    ['label' => 'Help centre', 'href' => 'https://help.apes.org.uk/', 'external' => true],
                    ['label' => 'MyAPES', 'href' => 'https://www.myapes.me.uk/', 'external' => true],
                ],
            ],
            'contact-centre' => [
                'route' => '/contact-centre/',
                'meta_title' => 'Contact centre | External APES support route',
                'title' => 'Contact centre',
                'description' => 'Bridge page for the external APES contact centre and linked support routes.',
                'hero_kicker' => 'Support bridge',
                'hero_title' => 'Open the APES contact centre.',
                'hero_summary' => 'The live public site promotes the APES contact centre as the main route for general support. This rebuilt page keeps that route visible while leaving the actual support platform external.',
                'hero_actions' => [
                    ['label' => 'Open contact centre', 'href' => 'https://contact.apes.org.uk/', 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Open Help centre', 'href' => 'https://help.apes.org.uk/', 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Connected service', 'External support platform'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>Use the external APES contact centre for general enquiries, live-chat support and the best available routing into the wider APES help system.</p>
  <div class="card-grid card-grid-two">
    <article class="info-card">
      <h3>Open a ticket</h3>
      <p>The live contact-centre page routes visitors to ticket flows for APES CIC, Shelter &amp; Rescue, Pet Care Clinic, Pet Shop, legal, marketing, public relations, MyAPES support and reception.</p>
    </article>
    <article class="info-card">
      <h3>Call or self-serve</h3>
      <p>The live page also offers phone routes for different APES services and links to knowledgebase content for people who prefer self-serve support.</p>
    </article>
  </div>
</section>
<section class="section-shell">
  <div class="card-grid card-grid-three">
    <article class="info-card">
      <h3>Main APES CIC line</h3>
      <p>0300 302 0998</p>
    </article>
    <article class="info-card">
      <h3>Shelter &amp; Rescue line</h3>
      <p>0300 302 0227</p>
    </article>
    <article class="info-card">
      <h3>Pet Care Clinic line</h3>
      <p>0300 302 0228</p>
    </article>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                    ['label' => 'Help centre', 'href' => 'https://help.apes.org.uk/', 'external' => true],
                ],
            ],
            'search' => [
                'route' => '/search/',
                'meta_title' => 'Search | Find APES CIC pages and guidance',
                'title' => 'Search',
                'description' => 'Search the rebuilt APES CIC public website by page title, route or content.',
                'hero_kicker' => 'Site search',
                'hero_title' => 'Find pages, routes and guidance quickly.',
                'hero_summary' => 'Use the built-in search to look across recreated public routes, support pages and policy content.',
                'hero_actions' => [],
                'pills' => ['Local site search'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <form class="search-form" action="/search/" method="get">
    <label for="site-search" class="search-label">Search the APES CIC website</label>
    <div class="search-row">
      <input id="site-search" name="q" type="search" value="" placeholder="Try donate, policy, volunteer or boarding" />
      <button class="button button-primary" type="submit">Search</button>
    </div>
  </form>
  <div id="search-results-anchor"></div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                    ['label' => 'Change Log Hub', 'href' => '/change-log-hub/'],
                ],
            ],
            'news' => [
                'route' => '/news/',
                'meta_title' => 'News | APES Newsroom and legacy archive routes',
                'title' => 'News',
                'description' => 'APES Newsroom is the central public destination for updates, with legacy archive routes preserved here for continuity.',
                'hero_kicker' => 'APES Newsroom',
                'hero_title' => 'Public news now lives in APES Newsroom.',
                'hero_summary' => $newsroom_copy,
                'hero_actions' => [
                    ['label' => 'Open APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Browse legacy news cards', 'href' => '#legacy-news', 'variant' => 'secondary'],
                ],
                'pills' => ['News routing updated', 'Legacy routes preserved'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>The rebuilt site follows the APES Newsroom standard. Main public news navigation, newsletter prompts and update calls to action now direct people to APES Newsroom for current information.</p>
</section>

<section class="section-shell" id="legacy-news">
  <div class="section-heading">
    <p class="eyebrow">Legacy archive bridges</p>
    <h2>Current preserved legacy news routes</h2>
  </div>
  <div class="card-grid card-grid-two">
    <article class="info-card">
      <h3>Introducing APES CareBase</h3>
      <p>APES shared the move from NED to APES CareBase and directed people to the new welfare data platform.</p>
      <a class="text-link" href="/news/post/Introducing-the-new-APES-CareBase/">Open legacy route</a>
    </article>
    <article class="info-card">
      <h3>Urgent: APES must relocate by 3 March 2026</h3>
      <p>A relocation appeal explaining the need for support, time pressure and continuity of care.</p>
      <a class="text-link" href="/news/post/Urgent-APES-Must-Relocate-by-3-March-2026/">Open legacy route</a>
    </article>
    <article class="info-card">
      <h3>Double the Donation partnership</h3>
      <p>APES announced a matching-gifts partnership intended to increase the impact of supporter donations.</p>
      <a class="text-link" href="/news/post/APES-Partners-with-Double-the-Donation-to-Double-Your-Donation-Impact/">Open legacy route</a>
    </article>
    <article class="info-card">
      <h3>Temporary move update</h3>
      <p>Supporters were updated on interim arrangements while APES continued to search for a permanent base.</p>
      <a class="text-link" href="/news/post/important-update-temporary-move-what-it-means-for-you/">Open legacy route</a>
    </article>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true],
                    ['label' => 'Help Us Move', 'href' => '/help-us-move/'],
                ],
            ],
            'news-carebase' => [
                'route' => '/news/post/Introducing-the-new-APES-CareBase/',
                'meta_title' => 'Introducing APES CareBase | Legacy APES news route',
                'title' => 'Introducing APES CareBase: a new home for animal welfare data',
                'description' => 'Legacy APES news route covering the move from NED to APES CareBase.',
                'hero_kicker' => 'Legacy news bridge',
                'hero_title' => 'Introducing APES CareBase: a new home for animal welfare data.',
                'hero_summary' => 'This preserved legacy route bridges to APES Newsroom while keeping the key public summary available.',
                'hero_actions' => [
                    ['label' => 'Open APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Visit APES CareBase', 'href' => 'https://carebase.apes.org.uk/', 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Legacy route', 'Bridge page'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>APES announced that the long-standing database previously known as NED had evolved into APES CareBase, broadening its focus from exotic species only to animal welfare data across species, settings and care environments.</p>
  <p>The public story emphasised consistent welfare records, evidence-based decision making, transparency and collaboration. It also stated that registration had opened for the platform.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true],
                    ['label' => 'APES CareBase', 'href' => 'https://carebase.apes.org.uk/', 'external' => true],
                ],
            ],
            'news-move-appeal' => [
                'route' => '/news/post/Urgent-APES-Must-Relocate-by-3-March-2026/',
                'meta_title' => 'Urgent relocation appeal | Legacy APES news route',
                'title' => 'Urgent: APES must relocate by 3 March 2026',
                'description' => 'Legacy APES appeal route about premises relocation and continuity of animal care.',
                'hero_kicker' => 'Legacy news bridge',
                'hero_title' => 'Urgent: APES must relocate by 3 March 2026.',
                'hero_summary' => 'This bridge preserves the public summary of the relocation appeal while directing current readers to APES Newsroom and the donation route.',
                'hero_actions' => [
                    ['label' => 'Donate', 'href' => '/donate/', 'variant' => 'primary'],
                    ['label' => 'Read APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Legacy route', 'Bridge page'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>The public appeal stated that the landlord had requested APES vacate its premises, giving the organisation limited time to relocate while continuing to care for animals already depending on its services.</p>
  <ul class="tick-list">
    <li>Very limited time to relocate.</li>
    <li>No confirmed new premises at that point.</li>
    <li>Many animals depending on daily care.</li>
  </ul>
  <p>The original article asked supporters to donate, share the appeal and help protect the work APES does.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Help Us Move', 'href' => '/help-us-move/'],
                    ['label' => 'Donate', 'href' => '/donate/'],
                ],
            ],
            'news-double-donation' => [
                'route' => '/news/post/APES-Partners-with-Double-the-Donation-to-Double-Your-Donation-Impact/',
                'meta_title' => 'Double the Donation partnership | Legacy APES news route',
                'title' => 'APES partners with Double the Donation to increase supporter impact',
                'description' => 'Legacy APES news route summarising the matching-gifts partnership announcement.',
                'hero_kicker' => 'Legacy news bridge',
                'hero_title' => 'Double the Donation matching-gift partnership.',
                'hero_summary' => 'This legacy route keeps the public matching-gifts summary visible while current news moves to APES Newsroom.',
                'hero_actions' => [
                    ['label' => 'Donate', 'href' => '/donate/', 'variant' => 'primary'],
                    ['label' => 'Open APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Legacy route', 'Bridge page'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>APES announced a partnership with Double the Donation to help supporters unlock matching gifts through employer programmes. The public article framed this as a way to increase the impact of every pound donated without extra cost to the donor.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Donate', 'href' => '/donate/'],
                    ['label' => 'Fundraising', 'href' => '/donating/fundraising/'],
                ],
            ],
            'news-temporary-move' => [
                'route' => '/news/post/important-update-temporary-move-what-it-means-for-you/',
                'meta_title' => 'Temporary move update | Legacy APES news route',
                'title' => 'Important update: temporary move and what it means for you',
                'description' => 'Legacy APES news route about interim premises arrangements and service continuity.',
                'hero_kicker' => 'Legacy news bridge',
                'hero_title' => 'Temporary move update and service continuity.',
                'hero_summary' => 'This route preserves the public summary of interim premises arrangements while current updates move to APES Newsroom.',
                'hero_actions' => [
                    ['label' => 'Read APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Contact APES', 'href' => '/contact/', 'variant' => 'secondary'],
                ],
                'pills' => ['Legacy route', 'Bridge page'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>APES updated supporters to explain that, while a permanent premises had not yet been secured, interim arrangements were allowing the organisation to continue operating while the search for a longer-term home continued.</p>
  <p>The public update emphasised continuity of care, communication with supporters and careful management of service changes during the interim period.</p>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Help Us Move', 'href' => '/help-us-move/'],
                    ['label' => 'Contact APES', 'href' => '/contact/'],
                ],
            ],
            'news-fundraising-software' => [
                'route' => '/news/post/fundraising-appeal-help-apes-invest-in-essential-welfare-management-software/',
                'meta_title' => 'Fundraising appeal for APES welfare software | Legacy APES news route',
                'title' => 'Fundraising appeal: help APES secure membership software for adoption and public members',
                'description' => 'Legacy APES fundraising news route about securing welfare management software and supporter infrastructure.',
                'hero_kicker' => 'Legacy news bridge',
                'hero_title' => 'Fundraising appeal for welfare management software.',
                'hero_summary' => 'This bridge preserves the public fundraising summary while current news moves to APES Newsroom.',
                'hero_actions' => [
                    ['label' => 'Open fundraising page', 'href' => '/donating/fundraising/', 'variant' => 'primary'],
                    ['label' => 'Read APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Legacy route', 'Bridge page'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <p>The public article explains that APES wants to invest in structured welfare-management and membership-support software to improve transparent governance, secure record keeping and responsible supporter handling.</p>
  <ul class="tick-list">
    <li>Structured welfare oversight and tracking.</li>
    <li>Clearer communication and governance support.</li>
    <li>Infrastructure investment framed as part of best-practice animal welfare.</li>
  </ul>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Fundraising priorities', 'href' => '/donating/fundraising/'],
                    ['label' => 'Donate', 'href' => '/donate/'],
                ],
            ],
            'news-moving-properties-tag' => [
                'route' => '/news/tag/moving-properties/',
                'meta_title' => 'Moving Properties tag | Legacy APES news archive',
                'title' => 'Moving Properties',
                'description' => 'Legacy APES tag archive for relocation and premises-related updates.',
                'hero_kicker' => 'Legacy news archive',
                'hero_title' => 'Relocation and premises updates.',
                'hero_summary' => 'This legacy tag archive groups relocation-related APES stories while current news routing moves to APES Newsroom.',
                'hero_actions' => [
                    ['label' => 'Open APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'primary'],
                    ['label' => 'Read Help Us Move', 'href' => '/help-us-move/', 'variant' => 'secondary'],
                ],
                'pills' => ['Legacy archive', 'Tag page'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="card-grid card-grid-two">
    <article class="info-card">
      <h3>Urgent relocation appeal</h3>
      <p>The archive groups stories about the loss of premises, temporary relocation and continuity of care.</p>
      <a class="text-link" href="/news/post/Urgent-APES-Must-Relocate-by-3-March-2026/">Open relocation appeal</a>
    </article>
    <article class="info-card">
      <h3>Temporary move update</h3>
      <p>Later updates explain interim arrangements while APES searches for a longer-term site.</p>
      <a class="text-link" href="/news/post/important-update-temporary-move-what-it-means-for-you/">Open temporary move update</a>
    </article>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'News', 'href' => '/news/'],
                    ['label' => 'Help Us Move', 'href' => '/help-us-move/'],
                ],
            ],
            'news-funds-tag' => [
                'route' => '/news/tag/funds/',
                'meta_title' => 'Funds tag | Legacy APES news archive',
                'title' => 'Funds',
                'description' => 'Legacy APES tag archive for appeals, fundraising and relocation funding updates.',
                'hero_kicker' => 'Legacy news archive',
                'hero_title' => 'Fundraising and support archives.',
                'hero_summary' => 'This legacy tag archive groups fundraising and funding-related APES stories while primary news moves to APES Newsroom.',
                'hero_actions' => [
                    ['label' => 'Open fundraising page', 'href' => '/donating/fundraising/', 'variant' => 'primary'],
                    ['label' => 'Read APES Newsroom', 'href' => APES_NEWSROOM_URL, 'external' => true, 'variant' => 'secondary'],
                ],
                'pills' => ['Legacy archive', 'Tag page'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="card-grid card-grid-two">
    <article class="info-card">
      <h3>Urgent appeal</h3>
      <p>This archive includes the relocation appeal and related funding updates.</p>
      <a class="text-link" href="/news/post/Urgent-APES-Must-Relocate-by-3-March-2026/">Open relocation appeal</a>
    </article>
    <article class="info-card">
      <h3>Software funding appeal</h3>
      <p>The archive also includes infrastructure and membership-software fundraising updates.</p>
      <a class="text-link" href="/news/post/fundraising-appeal-help-apes-invest-in-essential-welfare-management-software/">Open fundraising software appeal</a>
    </article>
  </div>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Fundraising priorities', 'href' => '/donating/fundraising/'],
                    ['label' => 'Donate', 'href' => '/donate/'],
                ],
            ],
            'change-log-hub' => [
                'route' => '/change-log-hub/',
                'meta_title' => 'Change Log Hub | APES CIC website releases',
                'title' => 'Change Log Hub',
                'description' => 'Track every major release for this website, including updates, fixes, compliance changes, and user-facing improvements.',
                'hero_kicker' => 'Release records',
                'hero_title' => 'Change Log Hub',
                'hero_summary' => 'Track every major release for this website, including updates, fixes, compliance changes, and user-facing improvements.',
                'hero_actions' => [
                    ['label' => 'Expand all releases', 'href' => '#release-list', 'variant' => 'primary'],
                    ['label' => 'View current release', 'href' => '#release-v210b', 'variant' => 'secondary'],
                ],
                'pills' => ['Current version ' . $siteVersion, 'Minor beta', 'Public-facing'],
                'body_html' => <<<'HTML'
<section class="section-shell">
  <div class="release-tools">
    <label class="search-label" for="release-search">Search release notes</label>
    <input id="release-search" class="release-search" type="search" placeholder="Search version, changes, compliance or footer" data-release-search />
    <div class="filter-row">
      <button class="chip-button is-active" type="button" data-release-filter="all">All releases</button>
      <button class="chip-button" type="button" data-release-filter="current">Current release</button>
      <button class="chip-button" type="button" data-release-filter="beta">Beta</button>
      <button class="chip-button" type="button" data-release-filter="added">Added</button>
      <button class="chip-button" type="button" data-release-filter="changed">Changed</button>
      <button class="chip-button" type="button" data-release-filter="fixed">Fixed</button>
      <button class="chip-button" type="button" data-release-filter="removed">Removed</button>
      <button class="chip-button" type="button" data-release-filter="security">Security</button>
      <button class="chip-button" type="button" data-release-filter="compliance">Compliance</button>
      <button class="chip-button" type="button" data-release-filter="accessibility">Accessibility</button>
      <button class="chip-button" type="button" data-release-filter="public-facing">Public-facing</button>
      <button class="chip-button" type="button" data-release-filter="internal-only">Internal-only</button>
    </div>
    <div class="action-row">
      <button class="button button-secondary" type="button" data-expand-all>Expand all</button>
      <button class="button button-secondary" type="button" data-collapse-all>Collapse all</button>
    </div>
  </div>
</section>

<section class="section-shell" id="release-list">
  <details class="release-card" data-release-card data-tags="current beta added changed fixed compliance accessibility public-facing" open id="release-v210b">
    <summary>
      <span class="release-version">v2.1.0b</span>
      <span class="release-date">2026-06-03</span>
    </summary>
    <div class="release-body">
      <div class="pill-row">
        <span class="pill pill-version">Version v2.1.0b</span>
        <span class="pill pill-status">Beta</span>
        <span class="pill pill-type">Changed</span>
        <span class="pill pill-fix">Fix</span>
        <span class="pill pill-type">Added</span>
        <span class="pill pill-compliance">Compliance</span>
      </div>
      <h3>Summary</h3>
      <p>Rebuilt the APES CIC website into a more graphical HTML5-first experience with richer editorial panels, stronger hierarchy, a more compliant footer, clearer public journeys and static HTML snapshots that now serve as the default site output.</p>
      <h3>Detailed changes</h3>
      <ul class="clean-list">
        <li>Introduced a more editorial homepage hero and spotlight band so the public front page feels graphical and easier to scan.</li>
        <li>Refined the shared HTML5 structure and surface styles to create clearer section hierarchy, stronger cards, better spacing and more intentional call-to-action treatment.</li>
        <li>Updated the footer into a card-based APES compliance pattern with direct donation, policy and Change Log Hub links plus staff, volunteer and student intranet access.</li>
        <li>Kept APES Newsroom as the canonical news destination while preserving the existing public routes and legacy bridge pages.</li>
        <li>Exported the current public routes to static HTML snapshots and switched Apache to prefer `index.html` before `index.php` so HTML5 is now the default delivery path.</li>
        <li>Bumped the canonical website version and synchronised the release record across the website Change Log Hub and root changelog.</li>
      </ul>
      <h3>Affected areas</h3>
      <ul class="clean-list">
        <li>Website: www.apes.org.uk</li>
        <li>Page or route: shared site-wide header, hero sections, footer, homepage, change-log hub and release metadata</li>
        <li>Files changed: shared PHP templates, shared site data, CSS, JS, root VERSION and root CHANGELOG</li>
        <li>User groups affected: supporters, adopters, service users, volunteers, partners and general public visitors</li>
        <li>Public impact: clearer navigation, stronger visual hierarchy, improved footer compliance and a more polished first-impression experience</li>
        <li>Internal impact: canonical versioning now lives in a root VERSION file and release records are synchronised across public and repository changelogs</li>
      </ul>
      <h3>Version decision</h3>
      <ul class="clean-list">
        <li>Previous version: v2.0.0b</li>
        <li>New version: v2.1.0b</li>
        <li>Version type: minor beta</li>
        <li>Reason for version bump: additional public-facing delivery change to HTML5 static snapshots and HTML-first routing, on top of the shared shell redesign</li>
      </ul>
      <h3>Validation</h3>
      <ul class="clean-list">
        <li>Checks run: local PHP syntax checks, footer-link review, navigation review, homepage layout review, static export generation and release-record alignment review</li>
        <li>Manual checks completed: APES Newsroom routing, footer required links, intranet link targets, release filter logic, responsive section stacking, static HTML snapshots and version display alignment</li>
        <li>Known limitations: the PHP renderer remains in the repository as the source of truth for future exports and fallback rendering</li>
        <li>Rollback notes: remove the generated HTML snapshots, restore the previous Apache DirectoryIndex order and redeploy the prior bundle if needed</li>
      </ul>
    </div>
  </details>
</section>
HTML,
                'related_links' => [
                    ['label' => 'Donate', 'href' => '/donate/'],
                    ['label' => 'Privacy Policy', 'href' => '/policies/privacy/'],
                    ['label' => 'Terms of Service', 'href' => '/policies/terms-of-service/'],
                ],
            ],
        ],
    ];

    return $data;
}

function apes_route_map(): array
{
    $map = [
        '/' => 'home',
        '/index' => 'home',
        '/index/' => 'home',
    ];

    foreach (apes_site_data()['pages'] as $key => $page) {
        $route = $page['route'];
        $map[$route] = $key;

        if ($route !== '/') {
            $map[rtrim($route, '/')] = $key;
        }
    }

    return $map;
}

function apes_path_from_request_uri(string $requestUri): string
{
    $path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
    $path = '/' . ltrim($path, '/');

    return $path === '' ? '/' : $path;
}

function apes_page_key_from_request(string $requestUri): ?string
{
    return apes_route_map()[apes_path_from_request_uri($requestUri)] ?? null;
}

function apes_canonical_route_for_key(string $pageKey): ?string
{
    return apes_site_data()['pages'][$pageKey]['route'] ?? null;
}

function apes_public_routes(): array
{
    $routes = [];

    foreach (apes_site_data()['pages'] as $page) {
        $routes[] = $page['route'];
    }

    return $routes;
}
