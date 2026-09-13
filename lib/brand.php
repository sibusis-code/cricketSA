<?php
/* Everything that makes this installation Cricket SA rather than one of the other
 * academies.
 *
 * THIS IS THE ONLY PER-SITE PHP FILE. Every other .php file in this repository
 * is shared verbatim with SPS, Fungi and the rest, and is written here by
 * tools/sync-backend.php in the SPS repository, which overwrites without
 * asking. It refuses to touch this one.
 *
 * So: if you want to edit a page because "Cricket SA says X and SPS says Y", the
 * answer is a new key in here and brand('key') in the shared page — added to SPS
 * and synced back out. Edit the page here instead and the next sync reverts you.
 *
 * Nothing secret belongs here — this file is deployed into the web root with
 * everything else. Credentials live in ~/private/cricketsaacademy-config.php.
 *
 * STOOD UP 13 Sep 2026, cloned from Equinix, whose nav is a small square mark
 * beside a wordmark — the shape Cricket South Africa's own mark needs. Every
 * value below marked PLACEHOLDER was not supplied and must be before this site
 * is announced.
 *
 * NOT TO BE CONFUSED WITH ../cricketsainterview, which is a separate application:
 * the volunteer recruitment portal for the ICC Men's Cricket World Cup 2027. It
 * shares no code with this site. Its folder is where the brand assets below were
 * taken from, and nothing more.
 */

return [

  /* "Cricket SA", the short form the volunteer portal Centenary built for them
     already uses, so the two sites name the organisation the same way. The full
     name is kept for places that need the organisation itself. */
  'academy'       => 'Cricket SA Academy',
  'company'       => 'Cricket South Africa',

  /* Used mid-sentence — "for Cricket SA staff", "Fully funded by Cricket SA". */
  'company_short' => 'Cricket SA',

  /* The icon-only mark (the green and gold ball, without the CRICKET SOUTH AFRICA
     lettering), from ../cricketsainterview/public/assets/cricket-sa-icon-512.png.
     Resized from 1200px / 124 KB to 136px / 12 KB, which is ~4x the 34px it is
     shown at; nothing else about it was changed. The full lockup with lettering is
     in _brand-source/ for anywhere the name is not already written beside it. */
  'logo'          => 'cricketsa-logo.png',
  'logo_alt'      => 'Cricket South Africa',

  /* Set beside the logo on the PHP pages, as the static pages already do — the mark
     is the ball alone, with no lettering, so without this the sign-in, contact and
     admin pages never said whose academy they were. See chrome_wordmark(). */
  'wordmark'      => 'CRICKET SA',

  /* Centenary runs the academy for every organisation, so registrations and reset
     notifications go to Centenary, not to the client. */
  'academy_email'   => 'kgomotso@centenarynetworks.com',

  /* Optional; omitted rather than rendered blank. */
  'enquiries_email' => '',

  /* PLACEHOLDER — nobody has supplied a Cricket SA switchboard for this site. This
     is the same dummy number every academy started with. It must be replaced
     before anyone is told the site is finished, or a learner will dial it. */
  'phone'         => '012 345 6789',
  'phone_href'    => '0123456789',
  'office_hours'  => 'Monday–Friday, 08:00–17:00 SAST',

  /* PLACEHOLDER examples in the registration form. Cricket SA's real staff
     number format is not known; this only shows the field's shape. */
  'empno_example' => 'e.g. CSA1234',
  'dept_example'  => 'e.g. Cricket Operations, Events, Commercial',

  /* Centenary Networks' accreditation, not the client's. Identical on every site
     because it is one accreditation held by one provider. */
  'accred_no'     => '07-QCTO/SDP180526182035',
  'accred_valid'  => '15 May 2026 – 14 May 2031',

  /* Bumped on any release that changes styles.css or a .js file.
     See asset() in lib/chrome.php for why this is not optional. */
  'asset_version' => '20260913',
];
