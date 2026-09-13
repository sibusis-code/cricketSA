# Cricket SA Academy

The in-house training academy of **Cricket South Africa**, run in association with
Centenary Networks. The seventh academy on the platform, after SPS, Fungi, Maziv,
Equinix, Tracker and M&T.

Stood up on **13 September 2026**. Built and tested locally; **not yet live** — see
[Standing it up](#standing-it-up) for the steps that need credentials and a decision.

> **Not the same thing as `../cricketsainterview`.** That is a separate Node.js
> application — the volunteer recruitment portal for the ICC Men's Cricket World Cup
> 2027 — and shares no code with this site. This academy only took Cricket South
> Africa's logo from it. Nothing in that folder was changed.

---

## What this is

The same application as every other academy. The back end — accounts, enrolment,
material, reading, quizzes with the 80% pass mark, the trainer role, in-person
registers — is shared, and **SPS is the source of truth**. Every shared file here is
written by `tools/sync-backend.php` in the SPS repository, which overwrites without
asking.

So: never fix a shared `.php` or `.js` here. Fix it in SPS and sync it out. See
`DEPLOY-XNEELO.md` for which files are genuinely this site's own.

**Who it is written for.** Like the other academies, it speaks to Cricket SA's own
staff: "fully funded by Cricket SA", "register your interest with HR". If it is meant
for the World Cup volunteers instead, the structure is right but about a dozen lines
of copy change — the audience line on the homepage, the about page, the footer
disclaimer and the calls to action.

## Where it came from

Cloned from **Equinix**, whose nav is a small square mark beside a wordmark — the
shape Cricket South Africa's own mark needs. Everything Equinix's was then taken out,
following what building M&T Academy the day before had taught:

- **Copy about Equinix's business was rewritten, not renamed.** A rename would have
  had Cricket SA training "data-centre technicians" and growing into "an AI-first
  infrastructure business". The replacement copy is deliberately thin, because what we
  have to go on is thin — see *What is placeholder*.
- **No named leader.** The template's homepage names a chief executive with a
  photograph. Equinix's named Equinix's real CEO. Cricket SA's block has no name, title,
  photograph or first-person words until Cricket SA supply an approved message.
- **Equinix's hard-coded colours** — ~150 hex values in the course-card artwork — were
  mapped to Cricket SA's by role.

## Brand

Sampled from Cricket South Africa's own logo, not guessed. The volunteer portal
Centenary built for them already used the same two values, so two sources agree.

| Token | Value | Where it came from |
|---|---|---|
| `--orange` (primary) | `#026637` | The CRICKET SOUTH AFRICA lettering |
| `--orange-light` | `#0a713b` | The green of the ball |
| `--gold` | `#ffcc07` | The solid end of the gold swoosh |
| `--dark` | `#0b2a1a` | Deep green for footer and dark sections |
| `--header` | `#fbf6e3` | Warm cream behind the nav (SPS already uses pale green) |

**Both of the template's colour ramps are green**, because green is Cricket SA's colour
and also reads as "done". But the template uses the two ramps as *pairs of states* in
six places — in progress vs done, late vs present on the register, international vs
local accreditation, part-funded, a draft warning. With both green, each pair would
collapse into one colour. So the second state of each pair is **amber** drawn from the
gold, in a `STATES` block at the very end of `styles.css`. It sits after the shared
block on purpose: rules above it lose to shared rules of equal specificity.

**Gold is the accent on dark sections** — eyebrows, links, list ticks — at 10.21:1.

**Logo:** `cricketsa-logo.png` is the icon-only mark, resized from Cricket SA's 1200px
file to 136px (12 KB) and otherwise unaltered. The full lockup with lettering is in
`_brand-source/`, which is gitignored. The mark is transparent, but its dark green
would sink into the deep-green footer, so there it sits on a white chip.

## What is placeholder

Must be supplied or confirmed before the site is announced:

- [ ] **Audience** — staff (as built) or World Cup volunteers? See above.
- [ ] **Phone number** — `lib/brand.php` carries the dummy `012 345 6789`.
- [ ] **Registered name** — `lib/brand.php` says "Cricket South Africa"; the legal
      entity is needed for the copyright line and the privacy notice.
- [ ] **Staff number format** — the form's example `CSA1234` is invented.
- [ ] **Leadership message** — approved words, a name and a photograph.
- [ ] **About-page roles** — "match-day and venue operations, events and team liaison,
      coaching and development, commercial, media and administration". Only the first two
      come from anything Cricket SA wrote (the volunteer portal); the rest are the
      ordinary functions of a national sporting body. Cricket SA should read it.
- [ ] **"Investing Our Profits, In Our People"** — the house headline on every academy's
      about page. It reads oddly for a national governing body; Cricket SA may want it
      changed.
- [ ] **Mentorship copy** — the about page promises "mentorship with senior leaders and
      technical experts", house wording on every client academy. Needs confirming.
- [ ] **Hero photograph** — the same stock image every academy uses, which Kgomotso has
      asked to replace with one showing black, white, Indian and coloured people.
- [ ] **About-page photographs** — `images/poster-1.svg` and `poster-2.svg`.

## Standing it up

Nothing below has been done. Each step needs a credential or a decision.

1. **GitHub repository** — for example `kgomotso-Bolide/cricketsa.academy` — and push
   this repo's `xneelo-backend` branch (not `main`; see `DEPLOY-XNEELO.md`).
2. **Repository secrets** — `CRICKETSA_FTP_SERVER`, `CRICKETSA_FTP_USERNAME`,
   `CRICKETSA_FTP_PASSWORD`.
3. **Server folder** — `public_html/cricketsaacademy` on Xneelo.
4. **Configuration** — `~/private/cricketsaacademy-config.php`, with
   `'tenant' => 'cricketsa'`. That one line is the entire separation between Cricket SA's
   learners and every other organisation's.
5. **Deploy**, dry run first — GitHub → Actions → *Deploy Cricket SA Academy*.
6. **Migrate** — fresh `setup_token`, open `/cricketsaacademy/setup`, run it, empty the token.
7. **Check** — follow *Check before telling anyone* in `DEPLOY-XNEELO.md`.

The `cricketsa` tenant is seeded by `install_seed_tenants()` in the shared
`lib/install.php`, so the migration creates it; there is no separate data step.
