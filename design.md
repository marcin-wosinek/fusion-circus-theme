# Design — Fusion Circus

Locked design system. Future design work (Hallmark runs, templates, patterns)
reads this file first and defers to it. Amend intentionally — the file is the
rule. In this repo `theme.json` is canonical for tokens (WordPress reads it);
this file is the narrative record and rationale.

<!-- Hallmark · studied: yes · DNA-source: image (user's own v1 mockups) · date: 2026-07-26 -->

## System

- Genre · atmospheric (photo-led night-party mood on light lavender paper)
- Macrostructure · Photographic — every major band is image-led; text annotates
  or overlays. Above the fold it leans Marquee Hero (statement over full-bleed photo).
- Theme · studied-DNA (source: own Figma/mockup exports, v1, 5 pages)
- Axes · light paper (chromatic-violet) / roman editorial serif display / dual accent magenta + violet

## Provenance

Extracted from five user-attached mockup images (home, event, code of conduct,
collaborations, blog post) on 2026-07-26. Image mode: **tokens are estimated**
from the source images' colour bands; **fonts are role-based with named
candidates** from the free canon — confirm against the mockup file and replace
if the real faces differ. Rhythm read from a vision pass on the captures.

## Tokens (estimated — persist into `theme.json` presets; theme.json is canonical)

```css
:root {
  --color-paper:      oklch(93% 0.025 300);  /* lavender page background */
  --color-paper-2:    oklch(89% 0.035 300);  /* deeper lavender wells (form panels) */
  --color-card:       oklch(99% 0.005 300);  /* floating white cards */
  --color-ink:        oklch(20% 0.02 300);   /* near-black body text */
  --color-ink-2:      oklch(45% 0.02 300);   /* muted secondary text */
  --color-rule:       oklch(85% 0.02 300);
  --color-accent:     oklch(58% 0.24 350);   /* magenta — headings & identity ONLY */
  --color-accent-2:   oklch(48% 0.21 295);   /* violet — interactive elements ONLY */
  --color-accent-ink: oklch(99% 0 0);        /* text on filled accents */
  --color-focus:      oklch(48% 0.21 295);
  --color-scrim:      oklch(25% 0.09 320 / 0.75); /* duotone photo overlay base */
  --gradient-flood:   linear-gradient(90deg, oklch(48% 0.21 295), oklch(58% 0.24 350));
                      /* header scrims + footer band ONLY — never section backgrounds */

  --font-display: "Playfair Display", serif; /* candidate — alt: Fraunces. Roman only. */
  --font-body:    "Jost", sans-serif;        /* candidate — alt: Poppins */

  --radius-card: 24px;  --radius-pill: 999px;  --radius-input: 999px;

  --ease-out: cubic-bezier(0.16, 1, 0.3, 1);
  --dur-fast: 180ms;  --dur-base: 240ms;
}
```

## Signature moves (the brand's fingerprint — keep)

- Duotone magenta→violet scrims over full-bleed party/location photos.
- Giant **ghost serif watermark type** bleeding across photos ("fusion dance",
  country names on event banners).
- **Floating white cards** (24px radius, soft shadow) overlapping section edges.
- **Circular badge motif** — round logo splitting the nav link row (3 left ·
  2 right, transparent over photo header); round date stamps on blog cards.
- Section heads: centred magenta serif heading hanging in negative space, short
  centred intro line beneath. No eyebrows, no numbering, no rules.
- Footer: single copyright line over the gradient flood band (Ft2).

## CTA voice

- Primary · violet fill (`--color-accent-2`) · pill radius · display-serif label
  (serif-in-buttons is a deliberate brand quirk — keep it).
- Secondary (on photos) · white fill, ink text, pill — must meet contrast on
  busy imagery (see Notes).

## Motion stance

- Motion-cut: no JS animation libraries (build-step-free theme). CSS-only
  transitions on interactive elements; at most one fade-up reveal if ever added.
- Reduced-motion fallback · ≤150 ms opacity crossfade.

## Notes — anti-patterns from v1 NOT to carry over (locked 2026-07-26)

- **Accent discipline, formalised:** magenta = headings/identity, violet =
  interactive. Never swap; gradient floods capped at header scrim + footer.
- **Left-align long prose.** v1 centres multi-paragraph text (event "About",
  blog posts) — headings stay centred, body copy goes left-aligned.
- **Vary section rhythm.** v1 pads every section equally, which reads
  templated — alternate spacing steps between bands.
- **Fix chip contrast on photos.** v1's small white "See more" chips and white
  nav links sit on busy imagery; guarantee the scrim behind them or enlarge/
  restyle to meet contrast + 44px hit targets.
- Italic never appears in headings; emphasis via weight or magenta.

## Applied to theme.json (locked 2026-07-26)

Tokens persisted as presets in `fusion-circus/theme.json`. OKLCH values were
converted to sRGB hex (the Site Editor color UI needs concrete values);
theme.json is now canonical for the exact numbers.

- Palette slugs · `paper #eae4f7` · `paper-2 #ded6ef` · `card #fcfbff` ·
  `ink #17141e` · `ink-2 #57535f` · `rule #cfcbd9` · `accent #d7068e` ·
  `accent-2 #6b32c4` · `accent-ink #fcfcfc` · `scrim #330e3cbf` (75 % alpha).
- Gradient preset `flood` (90°, violet→magenta) — header scrim + footer only.
- Duotone preset `night-flood` (`#330e3c` → `#d7068e`) for photo scrims.
- Fonts self-hosted in `assets/fonts/` (latin-subset variable woff2 from the
  Google Fonts CDN, registered via `fontFace`): Playfair Display 400–900
  roman (`display`), Jost 100–900 roman + italic (`body`). Candidates from
  the Provenance section confirmed as the pick.
- Type scale · `sm 0.875` → `5xl 4.77rem`, ratio ~1.25, fluid on `xl`+;
  default palette/font-sizes/spacing disabled so the editor offers only ours.
- Spacing scale · `2xs 0.25rem` → `3xl clamp(5rem,12vw,8rem)`; the three
  clamp steps (`xl`–`3xl`) exist to vary section rhythm between bands.
- Radii + motion under `settings.custom` → `--wp--custom--radius--card|pill|input`,
  `--wp--custom--ease--out`, `--wp--custom--duration--fast|base`.
- Default styles · body = Jost on `paper`; headings = Playfair 600 roman in
  `accent`; links = `accent-2`; buttons = violet pill, Playfair label
  (serif-in-buttons quirk), 2px violet focus outline. Button hover treatment
  deferred to the CSS/pattern stage.

## Header (locked 2026-07-26)

Built as `parts/header.html` → pattern `fusion-circus/header`, implementing the
badge-split nav from Signature moves.

- Row · Home · Events · Blog ‖ round badge ‖ Collaborations · Code of Conduct
  (the five v1 mockup pages; badge also links home). Desktop: nav halves get
  equal flex so the badge stays dead-centre despite the 3/2 split. Mobile
  (<782 px): badge on top, link rows centred beneath — verified no horizontal
  scroll at 320/375.
- Band background · the `flood` gradient (its header-scrim allowance) on photo
  and non-photo pages alike, so link contrast never depends on the imagery.
- Logo asset · `assets/images/fusion-circus-badge-inverse.png` — the inverse
  (dark-ground) round symbol, whitespace-trimmed, 360 px source. Display width
  is the token `custom.size.badge` = clamp(4.5rem, 9vw, 6.5rem).
- v1 contrast fix applied · white Jost `md` links with ≥44 px hit targets
  (token `custom.size.tap` = 2.75rem), hover underline, `accent-ink`
  focus-visible ring (tokens `custom.focus.width/offset`).
- Nav URLs point at `/events/`, `/blog/`, `/collaborations/`,
  `/code-of-conduct/` — those pages don't exist yet; create them as content
  work proceeds.
- `functions.php` now also loads `style.css` as editor style so the Site
  Editor mirrors the hand-written header CSS.

## Exports

`theme.json` (settings.color.palette, typography, spacing) is the source of
truth in this repo. Hand-written CSS references presets only
(`var(--wp--preset--…)`). For a standalone `tokens.css`, Tailwind `@theme`, or
DTCG `tokens.json`, ask to extend design.md with that export.
