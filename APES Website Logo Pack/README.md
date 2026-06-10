# APES CIC Website Logo Pack

Prepared for `www.apes.org.uk` from the supplied APES logo artwork.

## Recommended usage

### Header / navigation

Use the header WebP files in normal page chrome. Keep PNG fallbacks for older browsers.

```html
<picture>
  <source srcset="/assets/logos/apes-logo-header-320w.webp 320w,
                  /assets/logos/apes-logo-header-440w.webp 440w,
                  /assets/logos/apes-logo-header-660w.webp 660w"
          type="image/webp">
  <img src="/assets/logos/apes-logo-header-440w.png"
       alt="Association of Protecting Exotic Species CIC"
       width="440"
       height="250">
</picture>
```

For a compact navigation bar, use one of the `apes-logo-navbar-*h` files.

### Primary brand areas

Use `apes-logo-primary-trimmed-640w.webp` or `apes-logo-primary-trimmed-900w.webp` for hero sections where a transparent background is needed.

### Favicons

Place the contents of `03-favicons-app-icons` into `/favicons/`, and place `site.webmanifest` at the website root or update the paths in `html-head-snippet.html`.

### Social sharing

Use `apes-og-image-1200x630.jpg` for Open Graph, `apes-twitter-card-1200x600.jpg` for Twitter/X cards, and `apes-social-square-1080.jpg` for square previews.

## Notes

PNG files retain transparency. WebP files are compressed for faster website loading. JPG social assets use a solid dark background because Open Graph platforms handle transparent images inconsistently. `apes-logo-raster.svg` is an SVG wrapper around the raster artwork, not a manually redrawn vector logo.
