<?php
/**
 * Internationalisation file for extension Wikimedia Messages
 *
 * @addtogroup Extensions
 * @comment TODO:
 * @comment + Remove current events and community portal from the default sidebar
 * @comment + and add those messages to here
 * @comment + Make the help links on non-Wikimedia sites point to mediawiki.org?
 */

$messages = array();

$messages['en'] = array(
	'wikimediamessages-desc' => 'Wikimedia specific messages',
	'sitesupport-url'        => 'http://wikimediafoundation.org/wiki/Donate/Now/en?utm_source=donate&utm_medium=sidebar&utm_campaign=spontaneous_donation', # do not translate this URL to other languages until a donation page, approved by Wikimedia Foundation, exists
	'sitesupport'            => 'Donate',
	'tooltip-n-sitesupport'  => 'Support us',
	'sidebar'                =>  '* navigation
** mainpage|mainpage-description
** portal-url|portal
** currentevents-url|currentevents
** recentchanges-url|recentchanges
** randompage-url|randompage
** helppage|help
** sitesupport-url|sitesupport', # do not translate or duplicate this message to other languages

	# Per http://lists.wikimedia.org/pipermail/wikitech-l/2008-September/039454.html
	'robots.txt'  => '# Lines here will be added to the global robots.txt', # do not translate or duplicate this message to other languages

	# Wikimedia specific usergroups
	'group-abusefilter'           => 'Abuse filter editors',
	'group-accountcreator'        => 'Account creators',
	'group-autopatroller'         => 'Autopatrollers',
	'group-autoreviewer'          => 'Autoreviewers',
	'group-bigexport'             => 'Big exporters',
	'group-confirmed'             => 'Confirmed users',
	'group-founder'               => 'Founders',
	'group-import'                => 'Importers',
	'group-ipblock-exempt'        => 'IP block exemptions',
	'group-rollbacker'            => 'Rollbackers',
	'group-transwiki'             => 'Transwiki importers',

	'group-abusefilter-member'    => 'abuse filter editor',
	'group-accountcreator-member' => 'account creator',
	'group-autopatroller-member'  => 'autopatroller',
	'group-autoreviewer-member'   => 'autoreviewer',
	'group-bigexport-member'      => 'big exporter',
	'group-confirmed-member'      => 'confirmed user',
	'group-founder-member'        => 'founder',
	'group-import-member'         => 'importer',
	'group-ipblock-exempt-member' => 'IP block exempt',
	'group-rollbacker-member'     => 'rollbacker',
	'group-transwiki-member'      => 'transwiki importer',

	'grouppage-abusefilter'    => '{{ns:project}}:Abuse filter editors',
	'grouppage-accountcreator' => '{{ns:project}}:Account creators',
	'grouppage-autopatroller'  => '{{ns:project}}:Autopatrollers',
	'grouppage-autoreviewer'   => '{{ns:project}}:Autoreviewers',
	'grouppage-bigexport'      => '{{ns:project}}:Big exporters',
	'grouppage-confirmed'      => '{{ns:project}}:Confirmed users',
	'grouppage-founder'        => '{{ns:project}}:Founders',
	'grouppage-import'         => '{{ns:project}}:Importers',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP block exemption',
	'grouppage-rollbacker'     => '{{ns:project}}:Rollbackers',
	'grouppage-transwiki'      => '{{ns:project}}:Transwiki importers',

	# Global Wikimedia specific usergroups (defined on http://meta.wikimedia.org/wiki/Special:GlobalGroupPermissions)

	'group-steward'         => 'Stewards',
	'group-sysadmin'        => 'System administrators',
	'group-Editinterface'   => 'Interface editors',
	'group-Global_bot'      => 'Global bots',
	'group-Global_rollback' => 'Global rollbackers',
	'group-Ombudsmen'       => 'Ombudsmen',
	'group-Staff'           => 'Staffs',

	'group-steward-member'         => 'steward',
	'group-sysadmin-member'        => 'system administrator',
	'group-Editinterface-member'   => 'interface editor',
	'group-Global_bot-member'      => 'global bot',
	'group-Global_rollback-member' => 'global rollbacker',
	'group-Ombudsmen-member'       => 'ombudsman',
	'group-Staff-member'           => 'staff',

	'grouppage-steward'         => 'm:Stewards', # only translate this message to other languages if you have to change it
	'grouppage-sysadmin'        => 'm:System administrators', # only translate this message to other languages if you have to change it
	'grouppage-Global_bot'      => 'm:Global bot', # only translate this message to other languages if you have to change it
	'grouppage-Global_rollback' => 'm:Global rollback', # only translate this message to other languages if you have to change it
	'grouppage-Ombudsmen'       => 'm:Ombudsman commission', # only translate this message to other languages if you have to change it
	'grouppage-Staff'           => 'Foundation:Staff', # only translate this message to other languages if you have to change it

	# mediawiki.org specific user group

	'group-coder'        => 'Coders',
	'group-coder-member' => 'coder',
	'grouppage-coder'    => 'Project:Coder', # only translate this message to other languages if you have to change it

	# Private and fishbowl wikis
	'group-inactive'        => 'Inactive users',
	'group-inactive-member' => 'inactive user',
	'grouppage-inactive'    => '{{ns:project}}:Inactive users',

	# The name for the common shared repo 'shared'
	'shared-repo-name-shared' => 'Wikimedia Commons', # only translate this message to other languages if you have to change it

	# Copyright fun!
	'wikimedia-copyright' => 'Text is available under the <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a>;
additional terms may apply.
See <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Terms of Use</a> for details.',
	'wikimedia-copyrightwarning' => 'By saving, you agree to irrevocably release your contribution under the [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] and the [http://www.gnu.org/copyleft/fdl.html GFDL].
You agree to be credited by re-users, at minimum, through a hyperlink or URL to the page you are contributing to.
See the [http://wikimediafoundation.org/wiki/Terms_of_Use Terms of Use] for details.',
	'wikimedia-editpage-tos-summary' => 'If you do not want your writing to be edited and redistributed at will, then do not submit it here.
If you did not write this yourself, it must be available under terms consistent with the [http://wikimediafoundation.org/wiki/Terms_of_Use Terms of Use], and you agree to follow any relevant licensing requirements.',
);

/** Message documentation (Message documentation)
 * @author Aotake
 * @author Fryed-peach
 * @author Jon Harald Søby
 * @author Meno25
 * @author Purodha
 * @author SPQRobin
 * @author Seb35
 * @author Siebrand
 * @author Sp5uhe
 * @author Tagimata
 */
$messages['qqq'] = array(
	'wikimediamessages-desc' => '{{desc}}',
	'sitesupport-url' => 'Wikimedia-specific message used in the sidebar.
{{doc-important|Only change the link if it has a translation!|([http://wikimediafoundation.org/wiki/Special:Prefixindex/Donate/ check])}}',
	'sitesupport' => "Display name for the 'Donations' page, shown in the sidebar menu of all pages. The target page is meant to be the page where users can see how they can contribute financially to the wiki site.",
	'tooltip-n-sitesupport' => 'The tooltip when hovering over the {{msg|sitesupport}} link in the sidebar.',
	'group-accountcreator' => 'A specific group of the English Wikipedia; see [[wikipedia:Special:ListUsers/accountcreator]]. See also {{msg|group-accountcreator-member}}.',
	'group-autopatroller' => 'bantay-automatiko',
	'group-bigexport' => 'Big export user has a right to: {{int:right-override-export-depth}}',
	'group-founder' => 'A specific group of the English Wikipedia; see [[wikipedia:Special:ListUsers/founder]] (used exclusively for [[wikipedia:User:Jimbo Wales|Jimbo Wales]]). See also {{msg|group-founder-member}}.',
	'group-import' => 'Mga Naga-import',
	'group-rollbacker' => '{{Identical|Rollback}}',
	'group-accountcreator-member' => 'A member of the group {{msg|group-accountcreator}}.',
	'group-bigexport-member' => 'Big export user has a right to: {{int:Right-override-export-depth}}',
	'group-founder-member' => 'A member in the group {{msg|group-founder}} (used exclusively for [[wikipedia:User:Jimbo Wales|Jimbo Wales]]).',
	'group-rollbacker-member' => '{{Identical|Rollback}}',
	'grouppage-bigexport' => 'To be used in wikitext inside double square brackets, that is, as a link to a descriptive page. Do not alter or translate "<code>{<nowiki />{ns:project}}:</code>".

Big export user has a right to: {{int:right-override-export-depth}}',
	'grouppage-rollbacker' => '{{Identical|Rollback}}',
	'group-Global_rollback' => '{{Identical|Rollback}}',
	'group-Global_rollback-member' => '{{Identical|Rollback}}',
	'grouppage-steward' => '{{Global grouppage}}',
	'grouppage-Global_bot' => '{{Global grouppage}}',
	'grouppage-Global_rollback' => '{{Global grouppage}}',
	'grouppage-Ombudsmen' => '{{Global grouppage}}',
	'group-inactive' => '{{Identical|Inactive user}}',
	'group-inactive-member' => '{{Identical|Inactive user}}',
	'grouppage-inactive' => '{{Identical|Inactive user}}',
	'wikimedia-copyright' => 'This message is displayed on the site footer and is for the new licensing policy.',
);

/** Säggssch (Säggssch)
 * @author Thogo
 */
$messages['sxu'] = array(
	'sitesupport' => 'Schbändn',
	'group-steward' => 'Schdewards',
	'group-steward-member' => 'Schdeward',
	'grouppage-steward' => '{{ns:project}}:Schdewards',
);

/** Test (site admin only) (Test (site admin only)) */
$messages['test'] = array(
	'sitesupport-url' => 'x',
	'sitesupport' => 'x',
	'tooltip-n-sitesupport' => 'x',
);

/** Dalecarlian (Övdalską) */
$messages['dlc'] = array(
	'sitesupport' => 'Stjaintja',
	'tooltip-n-sitesupport' => 'Styða {{SITENAME}}',
);

/** Behase Mentawei (Behase Mentawei)
 * @author Päge bintën
 */
$messages['mwv'] = array(
	'tooltip-n-sitesupport' => 'Dukung kami',
);

/** Niuean (ko e vagahau Niuē)
 * @author Jose77
 */
$messages['niu'] = array(
	'sitesupport' => 'Tupe fakalofa mo e lagomatai',
);

/** Achinese (Acèh)
 * @author Andri.h
 */
$messages['ace'] = array(
	'tooltip-n-sitesupport' => 'Dukông kamoë',
);

/** Afrikaans (Afrikaans)
 * @author Meno25
 * @author Naudefj
 * @author SPQRobin
 * @author Spacebirdy
 */
$messages['af'] = array(
	'wikimediamessages-desc' => 'Wikimedia spesifieke boodskappe',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/af',
	'sitesupport' => 'Skenkings',
	'tooltip-n-sitesupport' => 'Ondersteun ons',
	'group-abusefilter' => 'misbruikfilter-redakteurs',
	'group-accountcreator' => 'Gebruikersrekening-skeppers',
	'group-bigexport' => 'Groot eksporteurs',
	'group-confirmed' => 'bevestigde gebruikers',
	'group-founder' => 'Grondleggers',
	'group-import' => 'Importeurders',
	'group-ipblock-exempt' => 'uitgesonderdes van IP-adresblokkades',
	'group-rollbacker' => 'Terugrollers',
	'group-transwiki' => 'Transwiki-importeurs',
	'group-abusefilter-member' => 'misbruikfilter-redakteur',
	'group-accountcreator-member' => 'gebruikersrekening-skepper',
	'group-bigexport-member' => 'groot eksporteur',
	'group-confirmed-member' => 'bevestigde gebruiker',
	'group-founder-member' => 'Grondlegger',
	'group-import-member' => 'Importeurder',
	'group-ipblock-exempt-member' => 'uitgesonder van IP-adresblokkades',
	'group-rollbacker-member' => 'terugroller',
	'group-transwiki-member' => 'transwiki-importeur',
	'grouppage-abusefilter' => '{{ns:project}}:Misbruikfilter-redakteurs',
	'grouppage-accountcreator' => '{{ns:project}}:Gebruikersrekening-skeppers',
	'grouppage-bigexport' => '{{ns:project}}:Groot eksporteurs',
	'grouppage-confirmed' => '{{ns:project}}:Bevestigde gebruikers',
	'grouppage-founder' => '{{ns:project}}:Grondleggers',
	'grouppage-import' => '{{ns:project}}:Importeurders',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Uitgesonderdes van IP-adresblokkades',
	'grouppage-rollbacker' => '{{ns:project}}:Terugrollers',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-importeurs',
	'group-steward' => 'Waarde',
	'group-sysadmin' => 'Stelseladministrateurs',
	'group-Editinterface' => 'Koppelvlakontwerpers',
	'group-Global_bot' => 'Globale botte',
	'group-Global_rollback' => 'Globale terugrollers',
	'group-Ombudsmen' => 'Ombudsmanne',
	'group-Staff' => 'Personeel',
	'group-steward-member' => 'Waard',
	'group-sysadmin-member' => 'Stelseladministrateur',
	'group-Editinterface-member' => 'koppelvlak-redakteur',
	'group-Global_bot-member' => 'globale bot',
	'group-Global_rollback-member' => 'globale terugroller',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'Personeellid',
	'grouppage-steward' => '{{ns:project}}:Waarde',
	'group-coder' => 'Programmeerders',
	'group-coder-member' => 'programmeerder',
	'group-inactive' => 'Onaktiewe gebruikers',
	'group-inactive-member' => 'onaktiewe gebruiker',
	'grouppage-inactive' => '{{ns:project}}:Onaktiewe gebruikers',
);

/** Gheg Albanian (Gegë)
 * @author Bresta
 * @author Cradel
 */
$messages['aln'] = array(
	'wikimediamessages-desc' => 'Mesazhet specifike për wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/Now/en?utm_source=donate&utm_medium=sidebar&utm_campaign=spontaneous_donation',
	'sitesupport' => 'Jep donacion',
	'tooltip-n-sitesupport' => 'Përkrahnani',
	'group-abusefilter' => 'Redaktuesit e filtrave të keqpërdorimit',
	'group-accountcreator' => 'Krijuesit e llogarive',
	'group-autopatroller' => 'Autopatrulluesit',
	'group-autoreviewer' => 'Autorishikuesit',
	'group-bigexport' => 'Eksportuesit e mëdhêj',
	'group-founder' => 'Themeluesit',
	'group-import' => 'Importuesit',
	'group-ipblock-exempt' => "Përjashtimet e bllokimeve të IP've",
	'group-rollbacker' => 'Mbrapakthyesit',
	'group-transwiki' => 'Importuesit transwiki',
	'group-abusefilter-member' => 'redaktues i filtrave të keqpërdorimit',
	'group-accountcreator-member' => 'krijues i llogarisë',
	'group-autopatroller-member' => 'autopatrulluesi',
	'group-autoreviewer-member' => 'autorishikues',
	'group-bigexport-member' => 'eksportues i madh',
	'group-founder-member' => 'themelues',
	'group-import-member' => 'importues',
	'group-ipblock-exempt-member' => "përjashtim nga bllokimi i IP've",
	'group-rollbacker-member' => 'mbrapakthyes',
	'group-transwiki-member' => 'importues transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Redaktuesit e filtrave të keqpërdorimit',
	'grouppage-accountcreator' => '{{ns:project}}:Krijues llogarish',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrullues',
	'grouppage-autoreviewer' => '{{ns:project}}:Autorishikuesit',
	'grouppage-bigexport' => '{{ns:project}}:Eksportuesit e mëdhêj',
	'grouppage-founder' => '{{ns:project}}:Themeluesit',
	'grouppage-import' => '{{ns:project}}:Importuesit',
	'grouppage-ipblock-exempt' => "{{ns:project}}:përjashtim prej bllokimit të IP've",
	'grouppage-rollbacker' => '{{ns:project}}:Mbrapakthyesit',
	'grouppage-transwiki' => '{{ns:project}}:Importuesit transwiki',
	'group-steward' => 'Përcjellësit',
	'group-sysadmin' => 'Administruesit e sistemit',
	'group-Global_bot' => 'Botat global',
	'group-Global_rollback' => 'Mbrapakthyesit global',
	'group-Ombudsmen' => 'Ombudspersonat',
	'group-Staff' => 'Staffi',
	'group-steward-member' => 'përcjellës',
	'group-sysadmin-member' => 'administrues i sistemit',
	'group-Global_bot-member' => 'bot global',
	'group-Global_rollback-member' => 'mbrapakthyes global',
	'group-Ombudsmen-member' => 'ombudsperson',
	'group-Staff-member' => 'antar i staffit',
	'group-coder' => 'Programerat',
	'group-coder-member' => 'programer',
	'group-inactive' => 'Përdoruesit joaktiv',
	'group-inactive-member' => 'përdorues joaktiv',
	'grouppage-inactive' => '{{ns:project}}:Përdoruesit joaktiv',
	'wikimedia-copyright' => 'Ky tekst âsht vû në dispozicion nën licencën <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a>; mundet me pasë klauzola shtesë që vijnë në shprehje. Shih <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Kushtet e përdorimit</a> për mâ shumë detaje.',
	'wikimedia-copyrightwarning' => "Me t'regjistrue faqen, ju pajtoheni me lëshue kontributin tuej parevokueshëm nën [http://creativecommons.org/licenses/by-sa/3.0/ Licencën Creative Commons Attribution/Share-Alike 3.0] dhe [http://www.gnu.org/copyleft/fdl.html GFDL]. Pajtoheni që ri-përdoruesit mujnë me shprehë mirënjohjen së paku përmjet nji vegze apo URL'je te faqja, në të cilën po kontribuoni. Shih [http://wikimediafoundation.org/wiki/Terms_of_Use Kushtet e përdorimit] për detaje.",
	'wikimedia-editpage-tos-summary' => 'Nëse nuk doni që shkrimi juej me mujtë me u redaktue dhe ridistribuue arbitrarisht, mos postoni këtu. Nëse nuk e keni shkrue këtë shkrim vetë, duheni me u sigurue që ai âsht i disponueshëm nën kushtet që përmbahen në [http://wikimediafoundation.org/wiki/Terms_of_Use Kushtet e përdorimit], dhe me u pajtue për me iu përmbajtë tâna kërkesave të licencimit.',
);

/** Amharic (አማርኛ)
 * @author Codex Sinaiticus
 */
$messages['am'] = array(
	'sitesupport' => 'መዋጮ ለመስጠት',
	'tooltip-n-sitesupport' => 'የገንዘብ ስጦታ ለዊኪሜድያ ይስጡ',
	'group-founder' => 'መስራች',
	'group-founder-member' => 'መስራች',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'wikimediamessages-desc' => 'Mensaches espezificos de Wikimedia',
	'sitesupport-url' => 'Project:Donazions',
	'sitesupport' => 'Donazions',
	'tooltip-n-sitesupport' => 'Refirme o procheuto',
	'group-abusefilter' => "Editors de filtro d'abuso",
	'group-accountcreator' => 'Creyadors de cuentas',
	'group-autopatroller' => 'Autopatrullers',
	'group-autoreviewer' => 'Autorebisadors',
	'group-bigexport' => 'Grans esportadors',
	'group-founder' => 'Fundadors',
	'group-import' => 'Importadors',
	'group-ipblock-exempt' => 'Exenzion de bloqueyo IP',
	'group-rollbacker' => 'Esfedors',
	'group-transwiki' => 'Importadors de transwiki',
	'group-abusefilter-member' => "editor de filtro d'abuso",
	'group-accountcreator-member' => 'Creyador de cuenta',
	'group-autopatroller-member' => 'autopatrullero',
	'group-autoreviewer-member' => 'autorebisador',
	'group-bigexport-member' => 'gran esportador',
	'group-founder-member' => 'Fundador',
	'group-import-member' => 'Importador',
	'group-ipblock-exempt-member' => 'Exenzion de bloqueyo IP',
	'group-rollbacker-member' => 'Rebertidor',
	'group-transwiki-member' => 'Importador transwiki',
	'grouppage-abusefilter' => "{{ns:project}}:Editors de filtro d'abuso",
	'grouppage-accountcreator' => '{{ns:project}}:Creyadors de cuenta',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrullers',
	'grouppage-autoreviewer' => '{{ns:project}}:Autorrebisadors',
	'grouppage-bigexport' => '{{ns:project}}:Grans esportadors',
	'grouppage-founder' => '{{ns:project}}:Fundadors',
	'grouppage-import' => '{{ns:project}}:Importadors',
	'grouppage-ipblock-exempt' => "{{ns:project}}:Exenzión d'o bloqueyo d'IP",
	'grouppage-rollbacker' => '{{ns:project}}:Esfedors',
	'grouppage-transwiki' => '{{ns:project}}:Importardors transwiki',
	'group-steward' => 'Stewards',
	'group-sysadmin' => "Almenistradors d'o sistemas",
	'group-Global_bot' => 'Bots globals',
	'group-Global_rollback' => 'Esfedors globals',
	'group-Ombudsmen' => 'Chustizias',
	'group-Staff' => "Personal d'o wiki",
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => "almenistrador d'o sistema",
	'group-Global_bot-member' => 'Bot global',
	'group-Global_rollback-member' => 'Esfedor global',
	'group-Ombudsmen-member' => 'Chustizia',
	'group-Staff-member' => "Miembro d'o personal",
	'group-coder' => 'Codificadors',
	'group-coder-member' => 'codificador',
	'group-inactive' => 'Usuarios inautibos',
	'group-inactive-member' => 'usuario inautibo',
	'grouppage-inactive' => '{{ns:project}}:Usuarios inautibos',
	'wikimedia-copyright' => 'O testo ye disponible baixo a <a href="http://creativecommons.org/licenses/by-sa/3.0/">Lizenzia Creative Commons Atribuzión/Compartir-Igual</a>;
puet que sigan d\'aplizazión clausulas adizionals.
Mire-se <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">os termins d\'uso</a> ta conoixer más detalles.',
	'wikimedia-copyrightwarning' => "En alzar o testo, ye azeutando a zesión irrefusable d'as suyas contribuzions baixo a [http://creativecommons.org/licenses/by-sa/3.0/ Lizenzia Creative Commons Atribuzión/Compartir-Igual 3.0] y a [http://www.gnu.org/copyleft/fdl.html lizenzia GFDL].
Tamién ye azeutando poder estar zitato, como menimo, por meyo d'un iperbinclo t'a pachina en do ha contribuyiu.
Mire-se [http://wikimediafoundation.org/wiki/Terms_of_Use l'alcuerdo de utilizazión] ta conoixer más detalles.",
	'wikimedia-editpage-tos-summary' => "Si no deseya que os suyos escritos sigan editatos y redistribuyitos librement, alabez no los alze aquí. Si o testo no lo ha escrito busté, ha d'estar disponible baixo as condizions espezificadas en [http://wikimediafoundation.org/wiki/Terms_of_Use as condizions d'utilizazión] y busté azeuta seguir cualsiquier requesta que li siga desichita en relazión á las lizenzias.",
);

/** Old English (Anglo-Saxon) */
$messages['ang'] = array(
	'sitesupport' => 'Gieldgiefa',
);

/** Arabic (العربية)
 * @author Ciphers
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'wikimediamessages-desc' => 'رسائل خاصة بويكيميديا',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/%D8%AC%D9%85%D8%B9_%D8%AA%D8%A8%D8%B1%D8%B9%D8%A7%D8%AA',
	'sitesupport' => 'تبرع',
	'tooltip-n-sitesupport' => 'ادعمنا',
	'group-abusefilter' => 'معدلو مرشحات الإساءة',
	'group-accountcreator' => 'منشئو الحسابات',
	'group-autopatroller' => 'مراجعون تلقائيون',
	'group-autoreviewer' => 'مراجعون تلقائيون',
	'group-bigexport' => 'مصدرون كبار',
	'group-confirmed' => 'مستخدمون مؤكدون',
	'group-founder' => 'مؤسسون',
	'group-import' => 'مستوردون',
	'group-ipblock-exempt' => 'مستثنون من منع الأيبي',
	'group-rollbacker' => 'مسترجعون',
	'group-transwiki' => 'مستوردون عبر الويكي',
	'group-abusefilter-member' => 'معدل مرشح الإساءة',
	'group-accountcreator-member' => 'منشئ حساب',
	'group-autopatroller-member' => 'مراجع تلقائي',
	'group-autoreviewer-member' => 'مراجع تلقائي',
	'group-bigexport-member' => 'مصدر كبير',
	'group-confirmed-member' => 'مستخدم مؤكد',
	'group-founder-member' => 'مؤسس',
	'group-import-member' => 'مستورد',
	'group-ipblock-exempt-member' => 'مستثنى من منع الأيبي',
	'group-rollbacker-member' => 'مسترجع',
	'group-transwiki-member' => 'مستورد عبر الويكي',
	'grouppage-abusefilter' => '{{ns:project}}:معدلو مرشح الإساءة',
	'grouppage-accountcreator' => '{{ns:project}}:منشئو الحسابات',
	'grouppage-autopatroller' => '{{ns:project}}:مراجعون تلقائيون',
	'grouppage-autoreviewer' => '{{ns:project}}:مراجع تلقائي',
	'grouppage-bigexport' => '{{ns:project}}:مصدرون كبار',
	'grouppage-confirmed' => '{{ns:project}}:مستخدمون مؤكدون',
	'grouppage-founder' => '{{ns:project}}:مؤسسون',
	'grouppage-import' => '{{ns:project}}:مستوردون',
	'grouppage-ipblock-exempt' => '{{ns:project}}:استثناء من منع الأيبي',
	'grouppage-rollbacker' => '{{ns:project}}:مسترجعون',
	'grouppage-transwiki' => '{{ns:project}}:مستوردون عبر الويكي',
	'group-steward' => 'مضيفون',
	'group-sysadmin' => 'إداريو النظام',
	'group-Editinterface' => 'محرّرو الواجهة',
	'group-Global_bot' => 'بوتات عامة',
	'group-Global_rollback' => 'مسترجعون عامون',
	'group-Ombudsmen' => 'أومبدسمين',
	'group-Staff' => 'مشرفون',
	'group-steward-member' => 'مضيف',
	'group-sysadmin-member' => 'إداري نظام',
	'group-Editinterface-member' => 'محرر واجهة',
	'group-Global_bot-member' => 'بوت عام',
	'group-Global_rollback-member' => 'مسترجع عام',
	'group-Ombudsmen-member' => 'أومبدسمان',
	'group-Staff-member' => 'عضو من المشرفين',
	'grouppage-steward' => 'm:Stewards/ar',
	'grouppage-Global_rollback' => 'm:Global rollback/ar',
	'grouppage-Staff' => 'Foundation:الطاقم',
	'group-coder' => 'مكودون',
	'group-coder-member' => 'مكود',
	'grouppage-coder' => 'Project:مكود',
	'group-inactive' => 'مستخدمون غير نشطين',
	'group-inactive-member' => 'مستخدم غير نشط',
	'grouppage-inactive' => '{{ns:project}}:مستخدمون غير نشطين',
	'shared-repo-name-shared' => 'ويكيميديا كومنز',
	'wikimedia-copyright' => 'النصوص متوفرة تحت <a href="http://creativecommons.org/licenses/by-sa/3.0/">رخصة المُشاع المُبدع نسبة المُصنّف إلى مؤلفه - المشاركة على قدم المساواة</a>.
قد تنطبق بنود أخرى أيضًا.
انظر <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">شروط الاستخدام</a> للتفاصيل.',
	'wikimedia-copyrightwarning' => 'بحفظ الصفحة، فأنت توافق على إصدار مساهمتك بلا رجعة تحت [http://creativecommons.org/licenses/by-sa/3.0/ رخصة المشاع المبدع نسبة المصنف إلى مؤلفه - المشاركة على قدم المساواة] و[http://www.gnu.org/copyleft/fdl.html رخصة جنو للوثائق الحرة].
أنت توافق على أن يشير إليك معيدو الاستخدام على الأقل عبر وصلة فائقة أو مسار إلى الصفحة التي تساهم فيها.
انظر [http://wikimediafoundation.org/wiki/Terms_of_Use شروط الاستخدام] للتفاصيل.',
	'wikimedia-editpage-tos-summary' => 'لو أنك لا تريد لكتابتك أن تعدل ويعاد توزيعها، فلا ترسلها هنا.
لو أنك لم تكتب هذا بنفسك، فيجب أن يكون متوفرا تحت شروط متوافقة مع [http://wikimediafoundation.org/wiki/Terms_of_Use شروط الاستخدام]، وأنت توافق على اتباع أي متطلبات ترخيص متعلقة.',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'sitesupport' => 'ܕܒܘܚ ܠܢ',
	'group-founder-member' => 'ܫܬܐܣܢܐ',
	'grouppage-founder' => '{{ns:project}}:ܫܬܐܣܢ̈ܐ',
	'grouppage-import' => '{{ns:project}}:ܡܥܠܢ̈ܐ',
	'group-sysadmin' => 'ܡܕܒܪ̈ܢܐ ܕܛܟܣܐ',
);

/** Araucanian (Mapudungun)
 * @author Lin linao
 */
$messages['arn'] = array(
	'sitesupport' => 'Elungechi',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 * @author Ramsis II
 */
$messages['arz'] = array(
	'wikimediamessages-desc' => 'رسايل خاصه بويكيميديا',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/%D8%AC%D9%85%D8%B9_%D8%AA%D8%A8%D8%B1%D8%B9%D8%A7%D8%AA',
	'sitesupport' => 'التبرعات',
	'tooltip-n-sitesupport' => 'ساندنا',
	'group-abusefilter' => 'معدلين فيلتر الاساءه',
	'group-accountcreator' => 'مؤسسين الحسابات',
	'group-autopatroller' => 'اوتوباترولارز',
	'group-autoreviewer' => 'اوتوريفيورات',
	'group-bigexport' => 'المصدرين الكبار',
	'group-confirmed' => 'يوزرات متأكدين',
	'group-founder' => 'مؤسسين',
	'group-import' => 'مستوردين',
	'group-ipblock-exempt' => 'مستثنيين من منع الااى بى',
	'group-rollbacker' => 'مسترجعين',
	'group-transwiki' => 'مستوردين عبر الويكى',
	'group-abusefilter-member' => 'محرر فيلتر الاساءه',
	'group-accountcreator-member' => 'مؤسس حساب',
	'group-autopatroller-member' => 'اوتوباترولار',
	'group-autoreviewer-member' => 'مراجع اوتوماتيكى',
	'group-bigexport-member' => 'مصدر كبير',
	'group-confirmed-member' => 'يوزر متأكد',
	'group-founder-member' => 'مؤسس',
	'group-import-member' => 'مستورد',
	'group-ipblock-exempt-member' => 'مستثنى من منع الاايبى',
	'group-rollbacker-member' => 'مسترجع',
	'group-transwiki-member' => 'مستورد عبر الويكى',
	'grouppage-abusefilter' => '{{ns:project}}:محررين فيلتر الاساءه',
	'grouppage-accountcreator' => '{{ns:project}}:منشئين الحسابات',
	'grouppage-autopatroller' => '{{ns:project}}:اوتوباترولارز',
	'grouppage-autoreviewer' => '{{ns:project}}:مراجعين اوتوماتيكيين',
	'grouppage-bigexport' => '{{ns:project}}:مصدرين كبار',
	'grouppage-confirmed' => '{{ns:project}}:يوزرات متأكدين',
	'grouppage-founder' => '{{ns:project}}:مؤسسين',
	'grouppage-import' => '{{ns:project}}:مستوردين',
	'grouppage-ipblock-exempt' => '{{ns:project}}:استثناء من منع الااى بى',
	'grouppage-rollbacker' => '{{ns:project}}:مسترجعين',
	'grouppage-transwiki' => '{{ns:project}}:مستوردين عبر الويكى',
	'group-steward' => 'مضيفين',
	'group-sysadmin' => 'اداريين النظام',
	'group-Global_bot' => 'بوتات عامه',
	'group-Global_rollback' => 'مسترجعين عامين',
	'group-Ombudsmen' => 'اومبادزمين',
	'group-Staff' => 'مشرفون',
	'group-steward-member' => 'مضيف',
	'group-sysadmin-member' => 'ادارى نظام',
	'group-Global_bot-member' => 'بوت عام',
	'group-Global_rollback-member' => 'مسترجع عام',
	'group-Ombudsmen-member' => 'اومبدادزمان',
	'group-Staff-member' => 'عضو من المشرفين',
	'grouppage-steward' => 'm:Stewards/ar',
	'grouppage-Global_rollback' => 'm:Global rollback/ar',
	'grouppage-Staff' => 'Foundation:الطاقم',
	'group-coder' => 'مكودون',
	'group-coder-member' => 'مكود',
	'grouppage-coder' => 'Project:مكود',
	'group-inactive' => 'يوزرات مش ناشطين',
	'group-inactive-member' => 'يوزر مش نشيط',
	'grouppage-inactive' => '{{ns:project}}:يوزرات مش نشطين',
	'wikimedia-copyright' => 'النصوص متوفرة تحت <a href="http://creativecommons.org/licenses/by-sa/3.0/">رخصة التشارك الإبداع العزو/المشاركة بالمثل</a>;
ممكن تطبيق شروط إضافية.
بص على <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">شروط الاستخدام</a> للتفاصيل.',
	'wikimedia-copyrightwarning' => 'بتسييڤ التعديلات بتاعتك، انت بتوافق على إصدار مساهمتك بلا رجعه تحت [http://creativecommons.org/licenses/by-sa/3.0/ رخصة التشارك الإبداعى العزو/المشاركة بالمثل 3.0] و [http://www.gnu.org/copyleft/fdl.html رخصة جنو للوثائق الحرة].
أنت توافق على أن يتم الإشارة لك بواسطة معيدى الاستخدام، على الأقل، من خلال وصلة فائقة أو لينك للصفحة اللى ساهمت فيها.   بص على [http://wikimediafoundation.org/wiki/Terms_of_Use شروط الاستخدام] للتفاصيل.',
	'wikimedia-editpage-tos-summary' => 'لو ماكنتش عايز كتاباتك تتعدل و تتوزع بحريه ، لو سمحت ما تحطهاش هنا.
لو ما كنتش انتا اللى كات الكلام دا بنفسك, فلازم يكون متوفر تحت شروط متوافقه مع[http://wikimediafoundation.org/wiki/Terms_of_Use شروط الاستعمال] ، و انك بتوافق انك تلتزم متطلبات ترخيص ليها علاقه..',
);

/** Assamese (অসমীয়া)
 * @author Psneog
 * @author Rajuonline
 */
$messages['as'] = array(
	'sitesupport' => 'দান-বৰঙনি',
	'tooltip-n-sitesupport' => 'আমাক সহায় কৰক!',
	'group-Staff' => 'কর্মীবৃন্দ',
	'group-Staff-member' => 'কর্মচাৰী',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$messages['ast'] = array(
	'wikimediamessages-desc' => 'Mensaxes específicos de Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donativos',
	'sitesupport' => 'Donativos',
	'tooltip-n-sitesupport' => 'Sofítanos',
	'group-accountcreator' => 'Creadores de cuentes',
	'group-founder' => 'Fundadores',
	'group-import' => 'Importadores',
	'group-ipblock-exempt' => 'Exenciones de bloqueos IP',
	'group-rollbacker' => 'Revertidores',
	'group-transwiki' => 'Importadores treswiki',
	'group-accountcreator-member' => 'creador de cuentes',
	'group-founder-member' => 'fundador',
	'group-import-member' => 'importador',
	'group-ipblock-exempt-member' => 'exentu de bloqueos IP',
	'group-rollbacker-member' => 'revertidor',
	'group-transwiki-member' => 'importador treswiki',
	'grouppage-accountcreator' => '{{ns:project}}:Creadores de cuentes',
	'grouppage-founder' => '{{ns:project}}:Fundadores',
	'grouppage-import' => '{{ns:project}}:Importadores',
	'grouppage-ipblock-exempt' => '{{ns:project}}:exención de bloqueos IP',
	'grouppage-rollbacker' => '{{ns:project}}:Revertidores',
	'grouppage-transwiki' => '{{ns:project}}:Importadores treswiki',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Alministradores del sistema',
	'group-Global_bot' => 'Bots globales',
	'group-Global_rollback' => 'Revertidores globales',
	'group-Ombudsmen' => 'Comisarios',
	'group-Staff' => 'Personal',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'alministrador del sistema',
	'group-Global_bot-member' => 'bot global',
	'group-Global_rollback-member' => 'revertidor global',
	'group-Ombudsmen-member' => 'comisariu',
	'group-Staff-member' => 'Miembru del personal',
	'grouppage-steward' => '{{ns:project}}:Stewards',
	'group-coder' => 'Codificadores',
	'group-coder-member' => 'codificador',
);

/** Avaric (Авар) */
$messages['av'] = array(
	'sitesupport' => 'Садакъа',
);

/** Kotava (Kotava)
 * @author Wikimistusik
 */
$messages['avk'] = array(
	'sitesupport' => 'Zobera',
	'tooltip-n-sitesupport' => 'Va cin zobel !',
);

/** Aymara (Aymar aru) */
$messages['ay'] = array(
	'sitesupport' => 'Ramañanaka',
);

/** Azerbaijani (Azərbaycan) */
$messages['az'] = array(
	'sitesupport' => 'Bağışlar',
);

/** Bashkir (Башҡорт) */
$messages['ba'] = array(
	'sitesupport' => 'Ярҙам итеү',
);

/** Samogitian (Žemaitėška)
 * @author Hugo.arg
 * @author Zordsdavini
 */
$messages['bat-smg'] = array(
	'sitesupport' => 'Pagelba',
	'group-steward' => 'Gaspaduorē',
	'group-sysadmin' => 'Sėstėmas admėnėstratuorē',
	'group-Global_bot' => 'Gluobalūs buotā',
	'group-Global_bot-member' => 'gluobalus buots',
);

/** Southern Balochi (بلوچی مکرانی)
 * @author Mostafadaneshvar
 */
$messages['bcc'] = array(
	'wikimediamessages-desc' => 'کوله یان مخصوص ویکی‌مدیا',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'مدتان',
	'tooltip-n-sitesupport' => 'ما را حمایت کنیت',
	'group-accountcreator' => 'حساب شرکنوکان',
	'group-founder' => 'بنگیج کنوکان',
	'group-import' => 'وارد کنوکان',
	'group-ipblock-exempt' => 'معافیت محدودیت آی پی',
	'group-rollbacker' => 'عقب ترینوک',
	'group-transwiki' => 'واردکنوکان بین‌ویکی',
	'group-accountcreator-member' => 'حساب شرکنوک',
	'group-founder-member' => 'بنگیج کنوک',
	'group-import-member' => 'واردکنوک',
	'group-ipblock-exempt-member' => 'استثنای محدودیت آی پی',
	'group-rollbacker-member' => 'ترینوک',
	'group-transwiki-member' => 'واردکنوک بین‌ویکی',
	'grouppage-accountcreator' => '{{ns:project}}:حساب شرکنوکان',
	'grouppage-founder' => '{{ns:project}}:بنگیج کنوکان',
	'grouppage-import' => '{{ns:project}}:واردکنوکان',
	'grouppage-ipblock-exempt' => '{{ns:project}}:استثناء محدودیت آی پی',
	'grouppage-rollbacker' => '{{ns:project}}:واردکنوکان',
	'grouppage-transwiki' => '{{ns:project}}:واردکنوکان بین ویکی',
	'group-steward' => 'نگهبانان',
	'group-sysadmin' => 'مدیران سیستم',
	'group-Global_bot' => 'رباتان سراسری',
	'group-Global_rollback' => 'ترینوک سراسری',
	'group-Staff' => 'کارمند',
	'group-steward-member' => 'نگهبان',
	'group-sysadmin-member' => 'مدیر سیستم',
	'group-Global_bot-member' => 'ربات سراسری',
	'group-Global_rollback-member' => 'ترینوک سراسری',
	'group-Staff-member' => 'عضو کارمند',
);

/** Bikol Central (Bikol Central)
 * @author Filipinayzd
 */
$messages['bcl'] = array(
	'sitesupport' => 'Mga donasyon',
	'tooltip-n-sitesupport' => 'Suportaran kami',
);

/** Belarusian (Беларуская)
 * @author Yury Tarasievich
 */
$messages['be'] = array(
	'sitesupport' => 'Ахвяраванні',
	'tooltip-n-sitesupport' => 'Падтрымайце нас',
	'grouppage-abusefilter' => '{{ns:project}}:Abuse filter editors',
	'grouppage-accountcreator' => '{{ns:project}}:Account creators',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrollers',
	'grouppage-autoreviewer' => '{{ns:project}}:Autoreviewers',
	'grouppage-bigexport' => '{{ns:project}}:Big exporters',
	'grouppage-founder' => '{{ns:project}}:Founders',
	'grouppage-import' => '{{ns:project}}:Importers',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP block exemption',
	'grouppage-rollbacker' => '{{ns:project}}:Rollbackers',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki importers',
	'grouppage-inactive' => '{{ns:project}}:Inactive users',
	'wikimedia-copyright' => 'Тэкст даступны на ўмовах ліцэнзіі <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike</a>;
таксама могуць дзейнічаць дадатковыя ўмовы.
Падрабязней гл. <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Умовы карыстання</a>.',
	'wikimedia-copyrightwarning' => "Замацоўваючы гэта, вы згаджаецеся беззваротна выпусціць свой уклад на ўмовах ліцэнзій [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] і [http://www.gnu.org/copyleft/fdl.html GFDL].
Вы згаджаецеся на адзначэнне вашага аўтарства пры паўторным выкарыстанні гэтай старонкі, у мінімальным аб'ёме гіпер-спасылкі або адрасу URL гэтай старонкі, у якую вы робіце ўклад.
Падрабязней гл. [http://wikimediafoundation.org/wiki/Terms_of_Use Умовы карыстання].",
	'wikimedia-editpage-tos-summary' => 'Калі вы не жадаеце, каб ваш тэкст свабодна правіўся і распаўсюджваўся, не ўкладвайце яго сюды.
Калі вы самі не пісалі гэтага тэксту, ён мусіць быць даступным на ўмовах, якія сумяшчальныя з [http://wikimediafoundation.org/wiki/Terms_of_Use Умовамі карыстання], а вы мусіце даць згоду на ўсе наступныя змяненні ліцэнзійных патрабаванняў, якія маюць дачыненне да гэтага тэксту.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author Cesco
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 * @author Zedlik
 */
$messages['be-tarask'] = array(
	'wikimediamessages-desc' => 'Спэцыфічныя паведамленьні фундацыі «Вікімэдыя»',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Ахвяраваньні',
	'tooltip-n-sitesupport' => 'Падтрымайце нас',
	'group-abusefilter' => 'Рэдактары фільтру злоўжываньняў',
	'group-accountcreator' => 'Стваральнікі рахункаў',
	'group-autopatroller' => 'Аўтапатрулюемыя',
	'group-autoreviewer' => 'Аўтарэцэнзэнты',
	'group-bigexport' => 'Значныя экспарцёры',
	'group-confirmed' => 'Пацьверджаныя ўдзельнікі',
	'group-founder' => 'Фундатары',
	'group-import' => 'Імпартэры',
	'group-ipblock-exempt' => 'Выключэньні з блякаваньняў ІР-адрасоў',
	'group-rollbacker' => 'Адкатвальнікі',
	'group-transwiki' => 'Імпартэры зь іншых вікі',
	'group-abusefilter-member' => 'рэдактар фільтру злоўжываньняў',
	'group-accountcreator-member' => 'стваральнік рахункаў',
	'group-autopatroller-member' => 'аўтапатрулюемыя',
	'group-autoreviewer-member' => 'аўтарэцэнзэнт',
	'group-bigexport-member' => 'значныя экспарцёры',
	'group-confirmed-member' => 'пацьверджаны ўдзельнік',
	'group-founder-member' => 'фундатар',
	'group-import-member' => 'імпартэр',
	'group-ipblock-exempt-member' => 'выключэньне з блякаваньняў ІР-адрасоў',
	'group-rollbacker-member' => 'адкатвальнік',
	'group-transwiki-member' => 'імпартэр зь іншых вікі',
	'grouppage-abusefilter' => '{{ns:project}}:Рэдактары фільтру злоўжываньняў',
	'grouppage-accountcreator' => '{{ns:project}}:Стваральнікі рахункаў',
	'grouppage-autopatroller' => '{{ns:project}}:Аўтапатрулюемыя',
	'grouppage-autoreviewer' => '{{ns:project}}:Аўтарэцэнзэнты',
	'grouppage-bigexport' => '{{ns:project}}:Значныя экспарцёры',
	'grouppage-confirmed' => '{{ns:project}}:Пацьверджаныя ўдзельнікі',
	'grouppage-founder' => '{{ns:project}}:Фундатары',
	'grouppage-import' => '{{ns:project}}:Імпартэры',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Выключэньні з блякаваньняў ІР-адрасоў',
	'grouppage-rollbacker' => '{{ns:project}}:Адкатвальнікі',
	'grouppage-transwiki' => '{{ns:project}}:Імпартэры зь іншых вікі',
	'group-steward' => 'Сьцюарды',
	'group-sysadmin' => 'Сыстэмныя адміністратары',
	'group-Editinterface' => 'Рэдактары інтэрфэйса',
	'group-Global_bot' => 'Глябальныя робаты',
	'group-Global_rollback' => 'Глябальныя адкатвальнікі',
	'group-Ombudsmen' => 'праваабаронцы',
	'group-Staff' => 'Супрацоўнікі',
	'group-steward-member' => 'сьцюард',
	'group-sysadmin-member' => 'сыстэмны адміністратар',
	'group-Editinterface-member' => 'рэдактар інтэрфэйса',
	'group-Global_bot-member' => 'глябальны робат',
	'group-Global_rollback-member' => 'глябальны адкатвальнік',
	'group-Ombudsmen-member' => 'праваабаронца',
	'group-Staff-member' => 'супрацоўнік',
	'group-coder' => 'Праграмісты',
	'group-coder-member' => 'праграміст',
	'group-inactive' => 'Неактыўныя ўдзельнікі',
	'group-inactive-member' => 'неактыўны ўдзельнік',
	'grouppage-inactive' => '{{ns:project}}:Неактыўныя ўдзельнікі',
	'wikimedia-copyright' => 'Гэты тэкст даступны на ўмовах <a href="http://creativecommons.org/licenses/by-sa/3.0/">ліцэнзіі Creative Commons Attribution/Share-Alike</a>; могуць ужывацца дадатковыя ўмовы. Глядзіце падрабязнасьці ва <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">ўмовах выкарыстаньня</a>.',
	'wikimedia-copyrightwarning' => 'Захоўваючы свае зьмены, Вы пагаджаецеся на іх апублікаваньне згодна ўмовах ліцэнзіяў [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] і [http://www.gnu.org/copyleft/fdl.html GFDL]. Вы пагаджаецеся, што іншыя пры выкарыстаньні гэтага матэрыялу будуць спасылацца на Вашае аўтарства як мінімум праз гіпэрспасылку на старонку, якую Вы рэдагавалі. Падрабязнасьці глядзіце ва [http://wikimediafoundation.org/wiki/Terms_of_Use ўмовах выкарыстаньня].',
	'wikimedia-editpage-tos-summary' => 'Калі Вы не жадаеце, каб Вашыя тэксты вольна рэдагаваліся і распаўсюджваліся, не зьмяшчайце іх сюды. Калі Вы не зьяўляецеся аўтарам гэтага тэксту, то ён павінен быць даступны на ўмовах сумяшчальных з [http://wikimediafoundation.org/wiki/Terms_of_Use умовамі выкарыстаньня], і Вы згодны прытрымлівацца ўсім патрабаваньням ліцэнзіяў.',
);

/** Bulgarian (Български)
 * @author Borislav
 * @author DCLXVI
 * @author Meno25
 * @author Spiritia
 */
$messages['bg'] = array(
	'wikimediamessages-desc' => 'Съобщения, специфични за Уикимедия',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/bg',
	'sitesupport' => 'Дарения',
	'tooltip-n-sitesupport' => 'Подкрепете ни',
	'group-autopatroller' => 'Автопатрульори',
	'group-founder' => 'Основатели',
	'group-autopatroller-member' => 'Автопатрульор',
	'group-founder-member' => 'Основател',
	'grouppage-founder' => '{{ns:project}}:Основатели',
	'group-steward' => 'Стюарди',
	'group-sysadmin' => 'Системни администратори',
	'group-Global_bot' => 'Глобални ботове',
	'group-Ombudsmen' => 'Омбудсмани',
	'group-steward-member' => 'Стюард',
	'group-sysadmin-member' => 'системен администратор',
	'group-Global_bot-member' => 'глобален бот',
	'group-Ombudsmen-member' => 'омбудсман',
	'grouppage-steward' => '{{ns:project}}:Стюарди',
	'group-coder' => 'Програмисти',
	'group-coder-member' => 'програмист',
	'group-inactive' => 'Неактивни потребители',
	'group-inactive-member' => 'неактивен потребител',
	'grouppage-inactive' => '{{ns:project}}:Неактивни потребители',
	'wikimedia-copyright' => 'Текстът е достъпен при условията на лиценза <a href="http://creativecommons.org/licenses/by-sa/3.0/">Криейтив Комънс Признание — Споделяне на споделеното 3.0</a>;
в сила може да има и допълнителни условия.
За подробности вижте <a href="http://wikimediafoundation.org/wiki/Terms_of_Use/bg">Условията за ползване</a>.',
	'wikimedia-copyrightwarning' => 'Със съхраняването на редакцията, се съгласявате безвъзвратно да отдадете своя принос под лиценза [http://creativecommons.org/licenses/by-sa/3.0/ Криейтив Комънс Признание — Споделяне на споделеното 3.0] и [http://www.gnu.org/copyleft/fdl.html Лиценза за свободна документация на GNU].
Съгласявате се минималното признание на авторството ви, при ползване на материала от други потребители, да става с хипервръзка към страницата, към която допринасяте.
За подробности вижте [http://wikimediafoundation.org/wiki/Terms_of_Use/bg Условията за ползване].',
	'wikimedia-editpage-tos-summary' => 'Ако не желаете материалът ви да бъде редактиран и разпространяван без ограничения, тогава не го поставяйте тук.
Ако материалът не е написан лично от вас, то за да остане тук, трябва да е съвместим с [http://wikimediafoundation.org/wiki/Terms_of_Use/bg Условията за ползване], и вие да сте съгласни да изпълните всички евентуално приложими лицензионни изисквания.',
);

/** Bambara (Bamanankan) */
$messages['bm'] = array(
	'sitesupport' => 'Banumanke',
);

/** Bengali (বাংলা)
 * @author Abdullah Harun Jewel
 * @author Bellayet
 * @author Zaheen
 */
$messages['bn'] = array(
	'wikimediamessages-desc' => 'উইকিমিডিয়া নির্ধারিত বার্তা',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'দান করুন',
	'tooltip-n-sitesupport' => 'আমাদের সহায়তা করুন',
	'group-accountcreator' => 'অ্যাকাউন্ট তৈরি করেন যারা',
	'group-autopatroller' => 'স্বয়ংক্রীয়-পর্যবেক্ষকবৃন্দ',
	'group-confirmed' => 'নিশ্চিতকৃত ব্যবহারকারী',
	'group-founder' => 'উদ্যোক্তা',
	'group-import' => 'আমদানীকারক',
	'group-ipblock-exempt' => 'আইপি নিষেধাজ্ঞা রহিতকরণ',
	'group-rollbacker' => 'রোলব্যাকারগণ',
	'group-transwiki' => 'ট্রান্সউইকি ইম্পোর্টারগণ',
	'group-accountcreator-member' => 'অ্যাকাউন্ট তৈরি করেন যিনি',
	'group-autopatroller-member' => 'স্বয়ংক্রীয় পর্যবেক্ষক',
	'group-confirmed-member' => 'নিশ্চিতকৃত ব্যবহারকারী',
	'group-founder-member' => 'প্রতিষ্ঠাতা',
	'group-import-member' => 'ইম্পোর্টার',
	'group-ipblock-exempt-member' => 'আইপি নিষেধাজ্ঞা রহিত',
	'group-rollbacker-member' => 'রোলব্যাকার',
	'group-transwiki-member' => 'ট্রান্সউইকি ইম্পোর্টার',
	'grouppage-accountcreator' => '{{ns:project}}:একাউন্ট সৃষ্টিকারীগণ',
	'grouppage-autopatroller' => '{{ns:project}}:স্বয়ংক্রীয় পরীক্ষকগণ',
	'grouppage-confirmed' => '{{ns:project}}:নিশ্চিতকৃত ব্যবহারকারীরা',
	'grouppage-founder' => '{{ns:project}}:প্রতিষ্ঠাতাগণ',
	'grouppage-import' => '{{ns:project}}:ইম্পোর্টারগণ',
	'grouppage-ipblock-exempt' => '{{ns:project}}:আইপি নিষেধাজ্ঞা রহিত',
	'grouppage-rollbacker' => '{{ns:project}}:রোলব্যাকার',
	'grouppage-transwiki' => '{{ns:project}}:ট্রান্সউইকি ইম্পোর্টারগণ',
	'group-steward' => 'স্ট্যুয়ার্ডগণ',
	'group-sysadmin' => 'সিস্টেম প্রশাসকগণ',
	'group-Editinterface' => 'ইন্টারফেস সম্পাদক',
	'group-Global_bot' => 'গ্লোবাল বটসমূহ',
	'group-Global_rollback' => 'গ্লোবাল রোলব্যাকারগণ',
	'group-Ombudsmen' => 'ন্যায়পাল',
	'group-Staff' => 'স্টাফগণ',
	'group-steward-member' => 'স্টিউয়ার্ড',
	'group-sysadmin-member' => 'সিস্টেম প্রশাসক',
	'group-Editinterface-member' => 'ইন্টারফেস সম্পাদক',
	'group-Global_bot-member' => 'গ্লোবাল বট',
	'group-Global_rollback-member' => 'গ্লোবাল রোলব্যাকার',
	'group-Ombudsmen-member' => 'ন্যায়পাল সদস্য',
	'group-Staff-member' => 'স্টাফ',
	'group-coder' => 'কোডার',
	'group-coder-member' => 'কোডার',
	'group-inactive' => 'নিস্ক্রিয় ব্যবহারকারী',
	'group-inactive-member' => 'নিস্ক্রিয় ব্যবহারকারী',
	'grouppage-inactive' => '{{ns:project}}:নিস্ক্রিয় ব্যবহারকারীগণ',
	'wikimedia-copyright' => 'লেখাগুলো <a href="http://creativecommons.org/licenses/by-sa/3.0/">ক্রিয়েটিভ কমন্স অ্যাট্রিবিউশন/শেয়ার-আলাইক লাইসেন্সের</a> আওতাভুক্ত;
এর সাথে বাড়তি পদ প্রযোজ্য হতে পারে।
 <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">ব্যবহারের শর্তাবলীতে</a> বিস্তারিত দেখুন।',
	'wikimedia-copyrightwarning' => 'সংরক্ষণের মাধ্যমে, আপনি এই বিষয়ে একমত হচ্ছেন যে, আপনার অবদান, ক্রিয়েটিভ কমন্স [http://creativecommons.org/licenses/by-sa/3.0/ অ্যাট্রিবিউশন/শেয়ার-আলাইক লাইসেন্স ৩.০] এবং [http://www.gnu.org/copyleft/fdl.html গনু ফ্রি ডকুমেন্টেশন লাইসেন্স (জিএফডিএল)] -এর আওতাভুক্ত। এছাড়া আরও একমত হচ্ছেন যে, এটি অন্য কোথাও যেভাবেই ব্যবহৃত হোক না কেন, আপনার অবদানের স্বীকৃতি দিতে হবে, তা পাতার হাইপারলিঙ্ক বা ইউআরএল উল্লেখ করে হতে পারে। [http://wikimediafoundation.org/wiki/Terms_of_Use ব্যবহারের শর্তাবলীতে] বিস্তারিত দেখুন।',
);

/** Tibetan (བོད་ཡིག) */
$messages['bo'] = array(
	'sitesupport' => 'ཞལ་འདེབས།',
);

/** Bishnupria Manipuri (ইমার ঠার/বিষ্ণুপ্রিয়া মণিপুরী) */
$messages['bpy'] = array(
	'sitesupport' => 'দান দেনা',
);

/** Bakhtiari (بختياري)
 * @author Behdarvandyani
 */
$messages['bqi'] = array(
	'wikimediamessages-desc' => 'پیام‌های مخصوص ویکی‌مدیا',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/bqi',
	'sitesupport' => 'کمک مالی',
	'tooltip-n-sitesupport' => 'حمایت زه ایما',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author לערי ריינהארט
 */
$messages['br'] = array(
	'wikimediamessages-desc' => 'Kemennoù dibar Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Roadoù',
	'tooltip-n-sitesupport' => "Harpit ac'hanomp",
	'group-abusefilter' => 'Aozerioù siloù dinoazañ',
	'group-accountcreator' => 'Krouerien kontoù',
	'group-bigexport' => 'Ezporzhierien vras',
	'group-confirmed' => 'Implijerien kadarnaet',
	'group-founder' => 'Diazezourien',
	'group-import' => 'Enporzhierien',
	'group-ipblock-exempt' => "Nemedennoù bloc'hadoù IP",
	'group-rollbacker' => 'Assaverien',
	'group-transwiki' => 'Enporzherien treuzwiki',
	'group-accountcreator-member' => 'Krouer kontoù',
	'group-bigexport-member' => 'ezporzhier bras',
	'group-confirmed-member' => 'implijer kadarnaet',
	'group-founder-member' => 'Diazezer',
	'group-import-member' => 'Enporzhier',
	'group-ipblock-exempt-member' => "Nemedenn bloc'had IP",
	'group-rollbacker-member' => 'Assaver',
	'group-transwiki-member' => 'Enporzhier treuzwiki',
	'grouppage-accountcreator' => '{{ns:project}}: Krouerien kontoù',
	'grouppage-founder' => '{{ns:project}}:Diazezerien',
	'grouppage-import' => '{{ns:project}}:Enporzherien',
	'grouppage-ipblock-exempt' => "{{ns:project}}:Nemedenn bloc'had IP",
	'grouppage-rollbacker' => '{{ns:project}}:Assaverien',
	'grouppage-transwiki' => '{{ns:project}}:Enporzherien treuzwiki',
	'group-sysadmin' => 'Merourien ar reizhiad',
	'group-Editinterface' => 'Aozañ etrefas',
	'group-Global_bot' => 'Botoù hollek',
	'group-Ombudsmen' => 'Hanterourien',
	'group-Staff' => 'skipailh',
	'group-Editinterface-member' => 'aozer an etrefas',
	'group-Global_bot-member' => 'bot hollek',
	'group-Ombudsmen-member' => 'hanterour',
	'group-Staff-member' => "Ezel eus ar c'hoskor",
	'group-coder' => 'Koderien',
	'group-coder-member' => 'koder',
	'group-inactive' => 'Implijerien dioberiant',
	'group-inactive-member' => 'implijer dioberiant',
	'grouppage-inactive' => '{{ns:project}}:Implijerien dioberiant',
);

/** Bosnian (Bosanski)
 * @author CERminator
 * @author Demicx
 * @author Kal-El
 * @author Smooth O
 * @author לערי ריינהארט
 */
$messages['bs'] = array(
	'wikimediamessages-desc' => 'Posebne poruke Wikimedije',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/bs',
	'sitesupport' => 'Donacije',
	'tooltip-n-sitesupport' => 'Podržite nas',
	'group-abusefilter' => 'Uređivači filtera zloupotrebe',
	'group-accountcreator' => 'Kreatori računa',
	'group-autopatroller' => 'Automatski nadzornici',
	'group-autoreviewer' => 'Autonadzornici',
	'group-bigexport' => 'Veliki izvoznici',
	'group-confirmed' => 'Potvrđeni korisnici',
	'group-founder' => 'Osnivači',
	'group-import' => 'Uvoznici',
	'group-ipblock-exempt' => 'Izuzeci IP blokada',
	'group-rollbacker' => 'Povratioci',
	'group-transwiki' => 'Transwiki uvoznici',
	'group-abusefilter-member' => 'uređivač filtera zloupotrebe',
	'group-accountcreator-member' => 'kreator računa',
	'group-autopatroller-member' => 'automatski patroler',
	'group-autoreviewer-member' => 'autonadzornik',
	'group-bigexport-member' => 'veliki izvoznik',
	'group-confirmed-member' => 'potvrđeni korisnik',
	'group-founder-member' => 'osnivač',
	'group-import-member' => 'uvoznik',
	'group-ipblock-exempt-member' => 'Izuzeci IP blokada',
	'group-rollbacker-member' => 'povratioc',
	'group-transwiki-member' => 'transwiki uvoznik',
	'grouppage-abusefilter' => '{{ns:project}}:Uređivači filtera zloupotrebe',
	'grouppage-accountcreator' => '{{ns:project}}:Kreatori računa',
	'grouppage-autopatroller' => '{{ns:project}}:Automatski patroleri',
	'grouppage-autoreviewer' => '{{ns:project}}:Autonadzornici',
	'grouppage-bigexport' => '{{ns:project}}:Veliki izvoznici',
	'grouppage-confirmed' => '{{ns:project}}:Potvrđeni korisnici',
	'grouppage-founder' => '{{ns:project}}:Osnivači',
	'grouppage-import' => '{{ns:project}}:Uvoznici',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Izuzeci IP blokada',
	'grouppage-rollbacker' => '{{ns:project}}:Povratioci',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki uvoznici',
	'group-steward' => 'Stjuardi',
	'group-sysadmin' => 'Sistemski administratori',
	'group-Editinterface' => 'Urednici sučelja',
	'group-Global_bot' => 'Globalni botovi',
	'group-Global_rollback' => 'Globalni povratioci',
	'group-Ombudsmen' => 'Ombudsmeni',
	'group-Staff' => 'Osoblje',
	'group-steward-member' => 'stujard',
	'group-sysadmin-member' => 'sistemski administrator',
	'group-Editinterface-member' => 'urednik sučelja',
	'group-Global_bot-member' => 'globalni bot',
	'group-Global_rollback-member' => 'globalni povratioc',
	'group-Ombudsmen-member' => 'ombudsmen',
	'group-Staff-member' => 'članovi osoblja',
	'grouppage-steward' => 'm:Stewards',
	'group-coder' => 'Koderi',
	'group-coder-member' => 'koder',
	'group-inactive' => 'Neaktivni korisnici',
	'group-inactive-member' => 'neaktivni korisnik',
	'grouppage-inactive' => '{{ns:project}}:Neaktivni korisnici',
	'wikimedia-copyright' => 'Tekst je dostupan pod <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike licencom</a>;
dodatni uslovi se mogu primijeniti.
Za detalje pogledajte <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">uslove korištenja</a>.',
	'wikimedia-copyrightwarning' => 'Ako spremite promjene, nepovratno se slažete da Vaš doprinos objavljujete pod [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike licencom 3.0] i [http://www.gnu.org/copyleft/fdl.html GFDL].
Slažete se da Vaš doprinos može biti izmijenjen od drugih korisnika, najmanje preko linka ili URLa.
Za dalje detalje pogledajte [http://wikimediafoundation.org/wiki/Terms_of_Use Pravila korištenja].',
	'wikimedia-editpage-tos-summary' => 'Ako ne želite da se Vaše izmjene i doprinos mijenjaju ili distribuiraju po želji, onda ih ne šaljite ovdje.
Ako ovo niste napisali lično, ove izmjene moraju biti dostupne pod uslovima u skladu sa [http://wikimediafoundation.org/wiki/Terms_of_Use Pravilima korištenja], i slažete se da će te slijediti sve relevantne licencne zahtjeve.',
);

/** Catalan (Català)
 * @author Aleator
 * @author Juanpabl
 * @author Martorell
 * @author Paucabot
 * @author SMP
 * @author Solde
 * @author Vriullop
 */
$messages['ca'] = array(
	'wikimediamessages-desc' => 'Missatges específics de Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/ca',
	'sitesupport' => 'Donatius',
	'tooltip-n-sitesupport' => 'Ajudau-nos',
	'group-accountcreator' => 'Creadors de comptes',
	'group-bigexport' => 'Grans exportadors',
	'group-confirmed' => 'Usuaris confirmats',
	'group-founder' => 'Fundadors',
	'group-import' => 'Importadors',
	'group-ipblock-exempt' => "Exempts del bloqueig d'IP",
	'group-rollbacker' => 'Revertidors ràpids',
	'group-transwiki' => 'Importadors transwiki',
	'group-accountcreator-member' => 'Creador de comptes',
	'group-bigexport-member' => 'Gran exportador',
	'group-confirmed-member' => 'Usuari confirmat',
	'group-founder-member' => 'Fundador',
	'group-import-member' => 'Importador',
	'group-ipblock-exempt-member' => "Exempt del bloqueig d'IP",
	'group-rollbacker-member' => 'Revertidor ràpid',
	'group-transwiki-member' => 'Importador transwiki',
	'grouppage-accountcreator' => '{{ns:project}}:Creadors de comptes',
	'grouppage-bigexport' => '{{ns:project}}:Grans exportadors',
	'grouppage-founder' => '{{ns:project}}:Fundadors',
	'grouppage-import' => '{{ns:project}}:Importadors',
	'grouppage-ipblock-exempt' => "{{ns:project}}:Exempts del bloqueig d'IP",
	'grouppage-rollbacker' => '{{ns:project}}:Revertidors ràpids',
	'grouppage-transwiki' => '{{ns:project}}:Importadors transwiki',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Administradors del sistema',
	'group-Editinterface' => 'Editors de la interfície',
	'group-Global_bot' => 'Bots globals',
	'group-Global_rollback' => 'Revertidors ràpids globals',
	'group-Ombudsmen' => 'Síndics de greuges',
	'group-Staff' => 'Personal',
	'group-steward-member' => 'Majordom',
	'group-sysadmin-member' => 'administrador del sistema',
	'group-Editinterface-member' => 'editor de la interfície',
	'group-Global_bot-member' => 'Bot global',
	'group-Global_rollback-member' => 'Revertidor ràpid global',
	'group-Ombudsmen-member' => 'síndic de greuges',
	'group-Staff-member' => 'Personal del wiki',
	'group-inactive' => 'Usuaris inactius',
	'group-inactive-member' => 'usuari inactiu',
	'grouppage-inactive' => '{{ns:project}}:Usuaris inactius',
	'wikimedia-copyright' => 'El text està disponible sota la <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.ca">Llicència de Creative Commons Reconeixement/Compartir-Igual</a>; es poden aplicar termes addicionals.
Vegeu les <a href="http://wikimediafoundation.org/wiki/Condicions_d%27%C3%BAs">condicions d\'ús</a> per a més informació.',
	'wikimedia-copyrightwarning' => "Quan deseu, esteu acceptant alliberar irrevocablement la vostra contribució sota la [http://creativecommons.org/licenses/by-sa/3.0/deed.ca Llicència de Creative Commons Reconeixement i Compartir-Igual 3.0] i la [http://www.gnu.org/copyleft/fdl.html GFDL].
Accepteu ser atribuït, com a mínim, a través d'un hiperenllaç o URL a la pàgina on esteu contribuint.
Vegeu les [http://wikimediafoundation.org/wiki/Condicions_d%27%C3%BAs condicions d'ús] per a més informació.",
	'wikimedia-editpage-tos-summary' => "Si no voleu que el vostre text sigui editat i redistribuït a voluntat, llavors no el lliureu aquí.
Si no l'heu escrit vós mateix, ha d'estar disponible sota termes compatibles amb les [http://wikimediafoundation.org/wiki/Terms_of_Use condicions d'ús], i accepteu seguir tots els requisits de la llicència.",
);

/** Min Dong Chinese (Mìng-dĕ̤ng-ngṳ̄) */
$messages['cdo'] = array(
	'sitesupport' => 'Dà̤-giŏng',
);

/** Chechen (Нохчийн) */
$messages['ce'] = array(
	'sitesupport' => 'Сайтан сагIа',
);

/** Cebuano (Cebuano)
 * @author Abastillas
 */
$messages['ceb'] = array(
	'sitesupport' => 'Mga donasyon',
	'tooltip-n-sitesupport' => 'Tabangi kami',
);

/** Chamorro (Chamoru)
 * @author Gadao01
 */
$messages['ch'] = array(
	'sitesupport' => "Nina'i siha",
	'tooltip-n-sitesupport' => 'Supotta ham',
);

/** Cherokee (ᏣᎳᎩ) */
$messages['chr'] = array(
	'sitesupport' => 'ᎠᎵᏍᎪᎸᏙᏗ',
);

/** Sorani (Arabic script) (‫کوردی (عەرەبی)‬)
 * @author Asoxor
 * @author Ferhad y
 * @author Marmzok
 * @author رزگار
 */
$messages['ckb-arab'] = array(
	'wikimediamessages-desc' => 'پەیامە تایبەتەکانی ویکیمیدیا',
	'sitesupport' => 'پشتیوانی لە ویکیپیدیا',
	'tooltip-n-sitesupport' => 'پاڵپشتی‌کردنی ئێمە',
	'group-accountcreator' => 'دروست‌کەری هەژمارە',
	'group-accountcreator-member' => 'درووست‌که‌ری هه‌ژماره‌',
	'group-founder-member' => 'دۆزەر',
	'group-sysadmin' => 'به‌ڕێوبه‌رانی سیسته‌م',
	'group-Staff' => 'کارمەندان',
	'group-sysadmin-member' => 'بەڕێوبەری سیستەم',
	'group-Staff-member' => 'کارمەند',
	'group-inactive' => 'بەکارهێنەرانی ناچالاک',
	'group-inactive-member' => 'بەکارهێنەری ناچالاک',
	'grouppage-inactive' => '{{ns:project}}: بەکارهێنەرانی ناچالاک',
	'wikimedia-copyright' => 'دەقەکە لەژێر <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a> لەبەردەست‌دا یە؛
لەوانەیە مەرجی تریش پێ زیاد بێ.
سەیری <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">مەرجەکان بەکارھێنان</a> بکە بۆ وردەکارییەکان.',
	'wikimedia-copyrightwarning' => 'بە پاشەکەوت کردن، بە بێگەڕانەوە قەبووڵ دەکەی کە بەشدارییەکەت لەژێر [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] و [http://www.gnu.org/copyleft/fdl.html GFDL] بڵاو ببێتەوە.
قەبووڵ دەکەی، لانی کەم، بە URL یان ھایپەرلینکێک بەو پەڕە بەشداری تێدا دەکەن بەکارھێنەرانی تر ناوتان لێببەن.
سەیری [http://wikimediafoundation.org/wiki/Terms_of_Use مەرجەکانی بەکارھێنان] بکەن بۆ وردەکارییەکان.',
	'wikimedia-editpage-tos-summary' => 'ئەگەر ناتەوێ نووسراوەکەت بە ئارەزوو دەستکاری بکرێ و تێکبدرێت، لەگرە پێشکەشی مەکە.
ئەگەر خۆت ئەمەت نەنووسیوە، ئەشێ لە ژێر [http://wikimediafoundation.org/wiki/Terms_of_Use مەرجەکانی بەکارھێنان لە ویکیمیدیا] لە بەردەست دا بێت و قەبووڵ ئەکەیت کە لە ھەر پێداویستییەکی پەیوەندی‌‌داری لایسەنس پەیڕەوی بکەی.',
);

/** Corsican (Corsu) */
$messages['co'] = array(
	'sitesupport' => 'Dunazione',
	'group-steward' => 'Steward',
	'grouppage-steward' => '{{ns:project}}:Steward',
);

/** Crimean Turkish (Latin) (Qırımtatarca (Latin)) */
$messages['crh-latn'] = array(
	'sitesupport' => 'Bağışlar',
);

/** Crimean Turkish (Cyrillic) (Qırımtatarca (Cyrillic)) */
$messages['crh-cyrl'] = array(
	'sitesupport' => 'Багъышлар',
);

/** Czech (Česky)
 * @author Danny B.
 * @author Li-sung
 * @author Matěj Grabovský
 * @author Mormegil
 * @author Ragimiri
 */
$messages['cs'] = array(
	'wikimediamessages-desc' => 'Hlášení specifická pro projekty nadace Wikimedia Foundation',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Sponzorstv%C3%AD',
	'sitesupport' => 'Podpořte nás',
	'tooltip-n-sitesupport' => 'Podpořte nás',
	'group-abusefilter' => 'Správci filtrů zneužívání',
	'group-accountcreator' => 'Zakladatelé účtů',
	'group-autopatroller' => 'Strážci',
	'group-autoreviewer' => 'Autokontroloři',
	'group-bigexport' => 'Velkoexportéři',
	'group-confirmed' => 'Schválení uživatelé',
	'group-founder' => 'Zakladatelé',
	'group-import' => 'Importéři',
	'group-ipblock-exempt' => 'Nepodléhající blokování IP adres',
	'group-rollbacker' => 'Revertovatelé',
	'group-transwiki' => 'Transwiki importéři',
	'group-abusefilter-member' => 'správce filtrů zneužívání',
	'group-accountcreator-member' => 'zakladatel účtů',
	'group-autopatroller-member' => 'strážce',
	'group-autoreviewer-member' => 'autokontrolor',
	'group-bigexport-member' => 'velkoexportér',
	'group-confirmed-member' => 'schválený uživatel',
	'group-founder-member' => 'zakladatel',
	'group-import-member' => 'importér',
	'group-ipblock-exempt-member' => 'nepodléhající blokování IP adres',
	'group-rollbacker-member' => 'revertovatel',
	'group-transwiki-member' => 'transwiki importér',
	'grouppage-abusefilter' => '{{ns:project}}:Správci filtrů zneužívání',
	'grouppage-accountcreator' => '{{ns:project}}:Zakladatelé účtů',
	'grouppage-autopatroller' => '{{ns:project}}:Strážci',
	'grouppage-autoreviewer' => '{{ns:project}}:Autokontroloři',
	'grouppage-bigexport' => '{{ns:project}}:Velkoexportéři',
	'grouppage-confirmed' => '{{ns:project}}:Schválení uživatelé',
	'grouppage-founder' => '{{ns:project}}:Zakladatelé',
	'grouppage-import' => '{{ns:project}}:Importéři',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Výjimky z blokování IP adres',
	'grouppage-rollbacker' => '{{ns:project}}:Revertovatelé',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki importéři',
	'group-steward' => 'Stevardi',
	'group-sysadmin' => 'Správcové serveru',
	'group-Editinterface' => 'Editoři uživatelského rozhraní',
	'group-Global_bot' => 'Globální boti',
	'group-Global_rollback' => 'Globální revertovatelé',
	'group-Ombudsmen' => 'Ombudsmani',
	'group-Staff' => 'Personál',
	'group-steward-member' => 'stevard',
	'group-sysadmin-member' => 'správce serveru',
	'group-Editinterface-member' => 'editor uživatelského rozhraní',
	'group-Global_bot-member' => 'globální bot',
	'group-Global_rollback-member' => 'globální revertovatel',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'člen personálu',
	'group-coder' => 'Programátoři',
	'group-coder-member' => 'programátor',
	'group-inactive' => 'Neaktivní uživatelé',
	'group-inactive-member' => 'neaktivní uživatel',
	'grouppage-inactive' => '{{ns:project}}:Neaktivní uživatelé',
	'wikimedia-copyright' => 'Text je dostupný pod <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.cs">licencí Creative Commons Uveďte autora&nbsp;– Zachovejte licenci</a>, případně za dalších podmínek. Podrobnosti naleznete na stránce <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Podmínky užití</a>.',
	'wikimedia-copyrightwarning' => 'Uložením svůj příspěvek neodvolatelně uvolňujete pod licencemi [http://creativecommons.org/licenses/by-sa/3.0/deed.cs Creative Commons Uveďte autora&nbsp;– Zachovejte licenci&nbsp;3.0] a&nbsp;[http://www.gnu.org/copyleft/fdl.html GFDL]. Souhlasíte s&nbsp;tím, aby další uživatelé vaše autorství uváděli alespoň formou hypertextového odkazu nebo adresy na stránku, do které přispíváte. Podrobnosti naleznete v&nbsp;[http://wikimediafoundation.org/wiki/Terms_of_Use Podmínkách užití].',
	'wikimedia-editpage-tos-summary' => 'Pokud si nepřejete, aby váš příspěvek byl nemilosrdně upravován a&nbsp;volně šířen, pak ho sem neukládejte. Pokud nejste autorem textu, musí být dostupný za podmínek slučitelných s&nbsp;našimi [http://wikimediafoundation.org/wiki/Terms_of_Use Podmínkami užití] a&nbsp;vy souhlasíte se všemi příslušnými licenčními požadavky.',
);

/** Church Slavic (Словѣ́ньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ)
 * @author ОйЛ
 */
$messages['cu'] = array(
	'sitesupport' => 'даꙗ́ниꙗ',
);

/** Chuvash (Чӑвашла)
 * @author PCode
 */
$messages['cv'] = array(
	'sitesupport' => 'Пожертвованисем',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'wikimediamessages-desc' => 'Negeseuon neilltuol Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/cy',
	'sitesupport' => 'Rhoi arian',
	'tooltip-n-sitesupport' => "Ein cefnogi'n ariannol",
	'group-accountcreator' => 'Gwneuthurwyr cyfrifon',
	'group-founder' => 'Sefydlwyr',
	'group-import' => 'Mewnforwyr',
	'group-ipblock-exempt' => 'Wedi eithrio rhag bod eu cyfeiriadau IP yn cael eu blocio',
	'group-transwiki' => 'Mewnforwyr trawswici',
	'group-accountcreator-member' => 'gwneuthurwr cyfrifon',
	'group-founder-member' => 'sefydlydd',
	'group-import-member' => 'mewnforwr',
	'group-ipblock-exempt-member' => 'Wedi eithrio rhag bod ei gyfeiriad IP yn cael ei flocio',
	'group-transwiki-member' => 'mewnforwr trawswici',
	'grouppage-accountcreator' => '{{ns:project}}:Gwneuthurwyr cyfrifon',
	'grouppage-founder' => '{{ns:project}}:Sefydlwyr',
	'grouppage-import' => '{{ns:project}}:Mewnforwyr',
	'grouppage-ipblock-exempt' => "{{ns:project}}:Eithrio rhag blocio'r IP",
	'grouppage-transwiki' => '{{ns:project}}:Mewnforwyr trawswici',
	'group-steward' => 'Stiwardiaid',
	'group-sysadmin' => 'Gweinyddwyr y system',
	'group-Global_bot' => 'Botiau wici-gyfan',
	'group-Ombudsmen' => 'Ombwdsmyn',
	'group-Staff' => "Aelodau o'r staff",
	'group-steward-member' => 'stiward',
	'group-sysadmin-member' => 'gweinyddwr y system',
	'group-Global_bot-member' => 'bot wici-gyfan',
	'group-Ombudsmen-member' => 'ombwdsmon',
	'group-Staff-member' => 'staff',
	'group-coder' => 'Codyddion',
	'group-coder-member' => 'codydd',
	'group-inactive' => 'Defnyddwyr segur',
	'group-inactive-member' => 'defnyddiwr segur',
	'grouppage-inactive' => '{{ns:project}}:Defnyddwyr segur',
	'wikimedia-copyright' => 'Rhoddir testun y dudalen ar gael ar delerau\'r drwydded <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike</a>;
gall fod telerau ychwanegol yn perthyn i\'r testun.
Gweler <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Telerau Defnyddio\'r Drwydded</a> am fanylion pellach.',
	'wikimedia-copyrightwarning' => "Wrth roi'r dudalen ar gadw, rydych yn cytuno, a hynny'n ddi-alw'n-ôl, i ryddhau eich cyfraniad ar drwyddedau'r [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] a'r [http://www.gnu.org/copyleft/fdl.html GFDL].
Yr ydych yn cytuno i gael eich cydnabod pan gaiff y cyfraniad ei ail-ddefnyddio, o leiaf trwy osod hypergyswllt neu URL at y dudalen yr ydych yn cyfrannu ato.
Gweler [http://wikimediafoundation.org/wiki/Terms_of_Use Telerau Defnyddio'r Drwydded] am fanylion pellach.",
	'wikimedia-editpage-tos-summary' => "Os nad ydych am weld eich cyfraniad yn cael ei olygu a'i ail-ddefnyddio gan rywun-rywun, yna gwell peidio â chyfrannu yma.
Os nad chi ysgrifennodd y cyfraniad hwn, rhaid iddo fod ar gael ar delerau sy'n gyson â <a href=\"http://wikimediafoundation.org/wiki/Terms_of_Use\">Thelerau Defnyddio'r Drwydded</a>, ac rydych yn cytuno i ddilyn unrhyw ofynion y drwydded berthnasol.",
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 * @author Kaare
 * @author Masz
 */
$messages['da'] = array(
	'wikimediamessages-desc' => 'Wikimedia-specifikke meddelelser',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/da',
	'sitesupport' => 'Donationer',
	'tooltip-n-sitesupport' => 'Støt os',
	'group-abusefilter' => 'Operatører af misbrugsfilteret',
	'group-accountcreator' => 'Kontooprettere',
	'group-autopatroller' => 'Autopatruljanter',
	'group-bigexport' => 'Storeksportører',
	'group-confirmed' => 'Bekræftede brugere',
	'group-founder' => 'Grundlæggere',
	'group-import' => 'Importører',
	'group-ipblock-exempt' => 'IP-blokeringsundtagelser',
	'group-rollbacker' => 'Tilbagerullere',
	'group-transwiki' => 'Transwiki-importører',
	'group-abusefilter-member' => 'Operatør af misbrugsfilteret',
	'group-accountcreator-member' => 'Kontoopretter',
	'group-autopatroller-member' => 'autopatruljant',
	'group-bigexport-member' => 'masse-eksportører',
	'group-confirmed-member' => 'bekræftet bruger',
	'group-founder-member' => 'Grundlægger',
	'group-import-member' => 'Importør',
	'group-ipblock-exempt-member' => 'IP-blokeringsundtagelse',
	'group-rollbacker-member' => 'Tilbageruller',
	'group-transwiki-member' => 'Transwiki-importør',
	'grouppage-abusefilter' => '{{ns:project}}:Operatører af misbrugsfilteret',
	'grouppage-accountcreator' => '{{ns:project}}:Kontooprettere',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatruljanter',
	'grouppage-bigexport' => '{{ns:project}}:Storeksportører',
	'grouppage-confirmed' => '{{ns:project}}:Bekræftede brugere',
	'grouppage-founder' => '{{ns:project}}:Grundlæggere',
	'grouppage-import' => '{{ns:project}}:Importører',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-blokeringsundtagelser',
	'grouppage-rollbacker' => '{{ns:project}}:Tilbagerullere',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-importører',
	'group-steward' => 'Forvaltere',
	'group-sysadmin' => 'Systemadministratorer',
	'group-Editinterface' => 'Brugerfladeændrere',
	'group-Global_bot' => 'Globale robotter',
	'group-Global_rollback' => 'Globale tilbagerullere',
	'group-Ombudsmen' => 'Ombudsmænd',
	'group-Staff' => 'Ansatte',
	'group-steward-member' => 'forvalter',
	'group-sysadmin-member' => 'systemadministrator',
	'group-Editinterface-member' => 'brugerfladeændrer',
	'group-Global_bot-member' => 'global robot',
	'group-Global_rollback-member' => 'global tilbageruller',
	'group-Ombudsmen-member' => 'ombudsmand',
	'group-Staff-member' => 'ansat',
	'grouppage-steward' => 'm:Stewards/nb',
	'grouppage-Global_rollback' => 'm:Global rollback/nb',
	'group-coder' => 'Kodere',
	'group-coder-member' => 'koder',
	'group-inactive' => 'Inaktive brugere',
	'group-inactive-member' => 'inaktiv bruger',
	'grouppage-inactive' => '{{ns:project}}:Inaktive brugere',
	'wikimedia-copyright' => 'Tekst er tilgængelig under <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.da">Creative Commons-licensen Navngivelse/Del på samme vilkår</a>; yderligere betingelser kan være gældende. Se <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Brugsbetingelser</a> for flere oplysninger.',
	'wikimedia-copyrightwarning' => 'Når du gemmer, indvilliger du uigenkaldeligt i at udgive dit bidrag under [http://creativecommons.org/licenses/by-sa/3.0/deed.da Creative Commons-licensen Navngivelse/Del på samme vilkår 3.0] og [http://www.gnu.org/copyleft/fdl.html GFDL]. Du indvilliger i at blive angivet som kilde af genbrugere, som minimum gennem et hyperlink eller URL til artiklen, du bidrog til. Se [http://wikimediafoundation.org/wiki/Terms_of_Use Brugsbetingelser] for flere oplysninger.',
	'wikimedia-editpage-tos-summary' => 'Ønsker du ikke at dit værk redigeres og redistribueres efter forgodtbefindende, skal du ikke indsende det her. Har du ikke selv skrevet det, skal det være tilgængeligt under betingelser i overensstemmelse med [http://wikimediafoundation.org/wiki/Terms_of_Use Brugsbetingelser], og du bekræfter at leve op til alle relevante licenskrav.',
);

/** German (Deutsch)
 * @author Church of emacs
 * @author Khaledelmansoury
 * @author Melancholie
 * @author Metalhead64
 * @author Pill
 * @author Purodha
 * @author Raimond Spekking
 * @author Spacebirdy
 * @author Umherirrender
 * @author Απεργός
 */
$messages['de'] = array(
	'wikimediamessages-desc' => 'Spezifische Systemnachrichten für Projekte der Wikimedia Foundation',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Spenden',
	'sitesupport' => 'Spenden',
	'tooltip-n-sitesupport' => 'Unterstütze uns',
	'group-abusefilter' => 'Missbrauchsfilter-Bearbeiter',
	'group-accountcreator' => 'Benutzerkonten-Ersteller',
	'group-autopatroller' => 'Automatische Prüfer',
	'group-autoreviewer' => 'Automatische Nachprüfer',
	'group-bigexport' => 'Großexporteure',
	'group-confirmed' => 'Bestätigte Benutzer',
	'group-founder' => 'Gründer',
	'group-import' => 'Importeure',
	'group-ipblock-exempt' => 'IP-Sperre-Ausnahmen',
	'group-rollbacker' => 'Zurücksetzer',
	'group-transwiki' => 'Transwiki-Importeure',
	'group-abusefilter-member' => 'Missbrauchsfilter-Bearbeiter',
	'group-accountcreator-member' => 'Benutzerkonten-Ersteller',
	'group-autopatroller-member' => 'Automatischer Prüfer',
	'group-autoreviewer-member' => 'Automatischer Nachprüfer',
	'group-bigexport-member' => 'Großexporteur',
	'group-confirmed-member' => 'Bestätigter Benutzer',
	'group-founder-member' => 'Gründer',
	'group-import-member' => 'Importeur',
	'group-ipblock-exempt-member' => 'IP-Sperre-Ausnahme',
	'group-rollbacker-member' => 'Zurücksetzer',
	'group-transwiki-member' => 'Transwiki-Importeur',
	'grouppage-abusefilter' => '{{ns:project}}:Missbrauchsfilter-Bearbeiter',
	'grouppage-accountcreator' => '{{ns:project}}:Benutzerkonten-Ersteller',
	'grouppage-autopatroller' => '{{ns:project}}:Automatische Prüfer',
	'grouppage-autoreviewer' => '{{ns:project}}:Automatische Nachprüfer',
	'grouppage-bigexport' => '{{ns:project}}:Großexporteure',
	'grouppage-confirmed' => '{{ns:project}}:Bestätigte Benutzer',
	'grouppage-founder' => '{{ns:project}}:Gründer',
	'grouppage-import' => '{{ns:project}}:Importeure',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-Sperre-Ausnahme',
	'grouppage-rollbacker' => '{{ns:project}}:Zurücksetzer',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-Importeure',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Systemadministratoren',
	'group-Editinterface' => 'Benutzeroberflächenbearbeiter',
	'group-Global_bot' => 'Globale Bots',
	'group-Global_rollback' => 'Globale Zurücksetzer',
	'group-Ombudsmen' => 'Ombudspersonen',
	'group-Staff' => 'Mitarbeiter',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'Systemadministrator',
	'group-Editinterface-member' => 'Benutzeroberflächenbearbeiter',
	'group-Global_bot-member' => 'Globaler Bot',
	'group-Global_rollback-member' => 'Globaler Zurücksetzer',
	'group-Ombudsmen-member' => 'Ombudsperson',
	'group-Staff-member' => 'Mitarbeiter',
	'grouppage-steward' => 'm:Stewards/de',
	'group-coder' => 'Programmierer',
	'group-coder-member' => 'Programmierer',
	'group-inactive' => 'Inaktive Benutzer',
	'group-inactive-member' => 'Inaktiver Benutzer',
	'grouppage-inactive' => '{{ns:project}}:Inaktive Benutzer',
	'wikimedia-copyright' => 'Der Text ist unter der Lizenz <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.de">„Creative Commons Attribution/Share-Alike“</a> verfügbar; zusätzliche Bedingungen können anwendbar sein.
Siehe die <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Nutzungsbedingungen</a> für Details.',
	'wikimedia-copyrightwarning' => 'Mit dem Speichern lizenzierst du deine Bearbeitung unwiderruflich unter der [http://creativecommons.org/licenses/by-sa/3.0/deed.de „Creative Commons Attribution/Share-Alike“-Lizenz 3.0] und der [http://www.gnu.org/copyleft/fdl.html GFDL].
Du stimmst zu, dass eine Weiterverwendung mindestens durch einen Hyperlink oder einer URL zur Seite, die du bearbeitest, erfolgen darf.
Siehe die [http://wikimediafoundation.org/wiki/Terms_of_Use Nutzungsbedingungen] für Details.',
	'wikimedia-editpage-tos-summary' => 'Wenn du nicht möchtest, dass dein Text weiterbearbeitet und weiterverbreitet wird, dann speichere ihn nicht.
Falls du den Text nicht selbst verfasst hast, muss er unter den [http://wikimediafoundation.org/wiki/Terms_of_Use Nutzungsbedingungen] verfügbar sein und du stimmst zu, notwendigen Lizenzanforderungen zu folgen.',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Raimond Spekking
 */
$messages['de-formal'] = array(
	'tooltip-n-sitesupport' => 'Unterstützen Sie uns',
	'wikimedia-copyrightwarning' => 'Mit dem Speichern lizenzieren Sie Ihre Bearbeitung unwiderruflich unter die [http://creativecommons.org/licenses/by-sa/3.0/ „Creative Commons Attribution/Share-Alike“-Lizenz 3.0] und der [http://www.gnu.org/copyleft/fdl.html GFDL].
Sie stimmen zu, dass eine Weiterverwendung mindestens durch durch einen Hyperlink oder einer URL zur Seite, die Sie bearbeiten, erfolgen darf.
Siehe die [http://wikimediafoundation.org/wiki/Terms_of_Use Nutzungsbedingungen] für Details.',
	'wikimedia-editpage-tos-summary' => 'Wenn Sie nicht möchten, dass Ihr Text weiterbearbeitet und weiterverbreitet wird, dann speichern Sie ihn nicht.
Falls Sie den Text nicht selber verfasst haben, muss er unter den [http://wikimediafoundation.org/wiki/Terms_of_Use Nutzungsbedingungen] verfügbar sein und Sie stimmen zu, notwendigen Lizenzanforderungen zu folgen.',
);

/** Zazaki (Zazaki)
 * @author Mirzali
 */
$messages['diq'] = array(
	'sitesupport' => 'Beğş',
	'group-Staff' => 'Emegdari',
	'group-Staff-member' => 'Emegdar',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 * @author Pe7er
 * @author Qualia
 */
$messages['dsb'] = array(
	'wikimediamessages-desc' => 'Zdźělenja specifiske za Wikimediju',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/dsb',
	'sitesupport' => 'Dary',
	'tooltip-n-sitesupport' => 'Pódpěraj nas',
	'group-abusefilter' => 'Wobźěłarje znjewužywańskego filtra',
	'group-accountcreator' => 'Kontowe załožarje',
	'group-autopatroller' => 'Awtomatiske doglědowarje',
	'group-autoreviewer' => 'Awtomatiske kontrolery',
	'group-bigexport' => 'Wjelikoeksportery',
	'group-confirmed' => 'Wobkšuśone wužywarje',
	'group-founder' => 'Załožarje',
	'group-import' => 'Importery',
	'group-ipblock-exempt' => 'Wuwześe z blokěrowanja IP',
	'group-rollbacker' => 'Slědkstajarje',
	'group-transwiki' => 'Transwiki importery',
	'group-abusefilter-member' => 'Wobźěłaŕ znjewužywańskego filtra',
	'group-accountcreator-member' => 'kontowy załožaŕ',
	'group-autopatroller-member' => 'awtomatiski doglědowaŕ',
	'group-autoreviewer-member' => 'awtomatiski kontroler',
	'group-bigexport-member' => 'wjelikoeksporter',
	'group-confirmed-member' => 'wobkšuśony wužywaŕ',
	'group-founder-member' => 'załožaŕ',
	'group-import-member' => 'importer',
	'group-ipblock-exempt-member' => 'Z blokěrowanja IP wuwzety',
	'group-rollbacker-member' => 'slědkstajaŕ',
	'group-transwiki-member' => 'transwiki importer',
	'grouppage-abusefilter' => '{{ns:project}}:Wobźěłarje znjewužywańskego filtra',
	'grouppage-accountcreator' => '{{ns:project}}:Kontowe załožarje',
	'grouppage-autopatroller' => '{{ns:project}}:Automatiske doglědowarje',
	'grouppage-autoreviewer' => '{{ns:project}}:Awotomatiske kontrolery',
	'grouppage-bigexport' => '{{ns:project}}:Wjelikoeksportery',
	'grouppage-confirmed' => '{{ns:project}}:Wobkšuśone wužywarje',
	'grouppage-founder' => '{{ns:project}}:Załožarje',
	'grouppage-import' => '{{ns:project}}:Importery',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Wuwześe z blokěrowanja IP',
	'grouppage-rollbacker' => '{{ns:project}}:Slědkstajarje',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki importery',
	'group-steward' => 'Stewardy',
	'group-sysadmin' => 'Systemowe administratory',
	'group-Editinterface' => 'Wužywarski pówjerch wobźěłaś',
	'group-Global_bot' => 'Globalne bośiki',
	'group-Global_rollback' => 'Globalne slědkstajarje',
	'group-Ombudsmen' => 'Ombudsniki',
	'group-Staff' => 'Sobuźěłaśerje',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'systemowy administrator',
	'group-Editinterface-member' => 'wužywarski pówjerch wobźěłaś',
	'group-Global_bot-member' => 'göobalny bośik',
	'group-Global_rollback-member' => 'globalny slědkstajaŕ',
	'group-Ombudsmen-member' => 'Ombudsnik',
	'group-Staff-member' => 'sobuźěłaśerje',
	'group-coder' => 'Programěrarje',
	'group-coder-member' => 'programěraŕ',
	'group-inactive' => 'Njeaktiwne wužywarje',
	'group-inactive-member' => 'njeaktiwny wužywaŕ',
	'grouppage-inactive' => '{{ns:project}}:Njeaktiwne wužywarje',
	'wikimedia-copyright' => 'Tekst stoj pód <a href="http://creativecommons.org/licenses/by-sa/3.0/">licencu Creative Commons Attribution/Share-Alike</a> k dispoziciji; pśidatne wuměnjenja mógu se nałožowaś. Glědaj <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Wužywańske wuměnjenja</a> za drobnostki.',
	'wikimedia-copyrightwarning' => 'Ze składowanim definitiwnje stajiš swój pśinosk pód [http://creativecommons.org/licenses/by-sa/3.0/ licencu Creative Commons Attribution/Share-Alike 3.0] a [http://www.gnu.org/copyleft/fdl.html GFDL].
Sy wobjadny, až dalšne wužywarje bok, kótaryž sy pśinosował, nanejmjenjej pśez wótkaz abo URL pśipóznawaju.
Glědaj [http://wikimediafoundation.org/wiki/Terms_of_Use wužywańske wuměnjenja] za drobnostki.',
	'wikimedia-editpage-tos-summary' => 'Jolic njocoš, až se twój tekst wobźěłujo a rozdźělujo pó dobrozdaśu, njewózjaw jen how.
Jolic njejsy to sam spisał, musy pód wuměnjenjami k dispoziciji staś, kótarež makaju se z [http://wikimediafoundation.org/wiki/Terms_of_Use wužywańskimi wuměnjenjami], a pśigłosujoš se wótpowědnych licencnych pominanjow źaržaś.',
);

/** Divehi (ދިވެހިބަސް) */
$messages['dv'] = array(
	'sitesupport' => 'ޚައިރާތުތައް',
);

/** Dzongkha (ཇོང་ཁ)
 * @author Tenzin
 */
$messages['dz'] = array(
	'sitesupport' => 'ཕན་འདེབས།',
	'tooltip-n-sitesupport' => 'ང་བཅས་ལུ་རྒྱབ་སྐྱོར་འབད།',
);

/** Ewe (Eʋegbe)
 * @author Natsubee
 */
$messages['ee'] = array(
	'sitesupport' => 'Wɔ nunana',
	'tooltip-n-sitesupport' => 'Kpe ɖe mía ŋu',
	'group-accountcreator' => 'Ŋkɔ ŋlɔlawo',
	'group-founder' => 'Eɖolawo',
	'group-accountcreator-member' => 'ŋkɔ ŋlɔla',
	'wikimedia-editpage-tos-summary' => 'Ne wò me di bena woa trɔ wò nuŋlɔŋlɔwo alo woa ma wo fãa o la, megaŋlɔe ɖe afisia o.<br />
Ne menye wò ŋutɔ ye ŋlɔ nusiawo o la, ekema ele be mɔɖeɖewo si ku ɖe woŋu ne sɔ kple [http://wikimediafoundation.org/wiki/Terms_of_Use Mɔɖeɖewo], eye wò lɔ̃ bena yeawɔ se siwo katã ku ɖe woŋu la dzi.',
);

/** Greek (Ελληνικά)
 * @author Badseed
 * @author Consta
 * @author Crazymadlover
 * @author Dead3y3
 * @author Geraki
 * @author Omnipaedista
 * @author ZaDiak
 * @author Απεργός
 */
$messages['el'] = array(
	'wikimediamessages-desc' => 'Μηνύματα ειδικά για το Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/el',
	'sitesupport' => 'Δωρεές',
	'tooltip-n-sitesupport' => 'Υποστηρίξτε μας',
	'group-abusefilter' => 'Τροποποιητές φίλτρων καταχρήσεων',
	'group-accountcreator' => 'Δημιουργοί λογαριασμών',
	'group-autopatroller' => 'Αυτόματοι περίπολοι',
	'group-autoreviewer' => 'Αυτοελεγκτές',
	'group-bigexport' => 'Μεγάλοι εξαγωγείς',
	'group-confirmed' => 'Eπιβεβαιωμένοι χρήστες',
	'group-founder' => 'Ιδρυτές',
	'group-import' => 'Εισαγωγείς',
	'group-ipblock-exempt' => 'Απαλλαγές από φραγή IP',
	'group-rollbacker' => 'Αναιρέτες',
	'group-transwiki' => 'Εισαγωγείς Transwiki',
	'group-abusefilter-member' => 'τροποποιητής φίλτρων καταχρήσεων',
	'group-accountcreator-member' => 'δημιουργός λογαριασμού',
	'group-autopatroller-member' => 'αυτόματη περίπολος',
	'group-autoreviewer-member' => 'αυτοελεγκτής',
	'group-bigexport-member' => 'Μεγάλος εξαγωγέας',
	'group-confirmed-member' => 'επιβεβαιωμένος χρήστης',
	'group-founder-member' => 'Ιδρυτής',
	'group-import-member' => 'εισαγωγέας',
	'group-ipblock-exempt-member' => 'απαλλαγή από φραγή IP',
	'group-rollbacker-member' => 'αναιρέτης',
	'group-transwiki-member' => 'εισαγωγέας transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Τροποποιητές φίλτρων καταχρήσεων',
	'grouppage-accountcreator' => '{{ns:project}}:Δημιουργοί λογαριασμών',
	'grouppage-autopatroller' => '{{ns:project}}:Αυτόματοι περίπολοι',
	'grouppage-autoreviewer' => '{{ns:project}}:Αυτοελεγκτές',
	'grouppage-bigexport' => '{{ns:project}}:Μεγάλοι εξαγωγείς',
	'grouppage-confirmed' => '{{ns:project}}:Επιβεβαιωμένοι χρήστες',
	'grouppage-founder' => '{{ns:project}}:Ιδρυτές',
	'grouppage-import' => '{{ns:project}}:Εισαγωγείς',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Προνόμια αποκλεισμού των IP',
	'grouppage-rollbacker' => '{{ns:project}}:Αναιρέτες',
	'grouppage-transwiki' => '{{ns:project}}:Εισαγωγείς Transwiki',
	'group-steward' => 'Επίτροποι',
	'group-sysadmin' => 'Διαχειριστές συστήματος',
	'group-Editinterface' => 'Επεξεργασία της διεπαφής',
	'group-Global_bot' => 'Καθολικά bots',
	'group-Global_rollback' => 'Καθολικοί rollbackers',
	'group-Ombudsmen' => 'Συνήγοροι του πολίτη',
	'group-Staff' => 'Προσωπικό',
	'group-steward-member' => 'επίτροπος',
	'group-sysadmin-member' => 'διαχειριστής συστήματος',
	'group-Editinterface-member' => 'επεξεργασία της διεπαφής',
	'group-Global_bot-member' => 'καθολικό bot',
	'group-Global_rollback-member' => 'καθολικός rollbacker',
	'group-Ombudsmen-member' => 'συνήγορος του πολίτη',
	'group-Staff-member' => 'Μέλος προσωπικού',
	'group-coder' => 'Κωδικογράφοι',
	'group-coder-member' => 'κωδικογράφος',
	'group-inactive' => 'Ανενεργοί χρήστες',
	'group-inactive-member' => 'Ανενεργός χρήστης',
	'grouppage-inactive' => '{{ns:project}}:Ανενεργοί χρήστες',
	'wikimedia-copyright' => 'Όλα τα κείμενα είναι διαθέσιμα υπό την <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.el">Creative Commons Attribution/Share-Alike License</a>· μπορεί να ισχύουν και πρόσθετοι όροι. Δείτε τους <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Όρους Χρήσης</a> για λεπτομέρειες.',
	'wikimedia-copyrightwarning' => "Αποθηκεύοντας, συμφωνείτε χωρίς δικαίωμα ανάκλησης την δημοσίευση του υλικού υπό τους όρους της [http://creativecommons.org/licenses/by-sa/3.0/deed.el Creative Commons Attribution/Share-Alike License 3.0] και της [http://www.gnu.org/copyleft/fdl.html GFDL]. Συμφωνείτε να σας αποδίδεται η πατρότητα από τρίτους χρήστες, κατ'ελάχιστο, μέσω ενός υπερσύνδεσμου ή URL προς την σελίδα στην οποία συνεισφέρετε. Δείτε τους [http://wikimediafoundation.org/wiki/Terms_of_Use Όρους Χρήσης] για λεπτομέρειες.",
	'wikimedia-editpage-tos-summary' => 'Αν δεν θέλετε το κείμενό σας να υποστεί επεξεργασία και να αναδιανεμηθεί κατά βούληση, τότε μην το καταχωρείτε εδώ. Αν δεν το γράψατε ο ίδιος, τότε πρέπει να είναι διαθέσιμο υπό όρους σύμφωνους με τους [http://wikimediafoundation.org/wiki/Terms_of_Use Όρους Χρήσης], και συμφωνείτε να ακολουθήσετε οποιεσδήποτε απαιτήσεις αδειοδότησης.',
);

/** Emiliano-Romagnolo (Emiliàn e rumagnòl) */
$messages['eml'] = array(
	'sitesupport' => 'Donaziòun',
);

/** Esperanto (Esperanto)
 * @author Marcos
 * @author Michawiki
 * @author Tlustulimu
 * @author Yekrats
 */
$messages['eo'] = array(
	'wikimediamessages-desc' => 'Specifaj mesaĝoj de Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Monkolektado',
	'sitesupport' => 'Donaci',
	'tooltip-n-sitesupport' => 'Subteni nin per mono',
	'group-abusefilter' => 'Redaktantoj de misuzadaj filtriloj',
	'group-accountcreator' => 'Kreintoj de kontoj',
	'group-autopatroller' => 'Aŭtomataj patrolantoj',
	'group-autoreviewer' => 'Aŭtomataj kontrolantoj',
	'group-bigexport' => 'Grandaj eksportantoj',
	'group-confirmed' => 'Konfirmitaj uzantoj',
	'group-founder' => 'Fondintoj',
	'group-import' => 'Importantoj',
	'group-ipblock-exempt' => 'Sendevigoj por IP-forbaroj',
	'group-rollbacker' => 'Restarigantoj',
	'group-transwiki' => 'Importintoj de Transvikio',
	'group-abusefilter-member' => 'redaktanto de misuzadaj filtriloj',
	'group-accountcreator-member' => 'Kreinto de konto',
	'group-autopatroller-member' => 'Aŭtomata patrolanto',
	'group-autoreviewer-member' => 'aŭtomata kontrolanto',
	'group-bigexport-member' => 'granda eksportanto',
	'group-confirmed-member' => 'konfirmita uzanto',
	'group-founder-member' => 'Fondinto',
	'group-import-member' => 'Importanto',
	'group-ipblock-exempt-member' => 'maldeviga de IP-forbaro',
	'group-rollbacker-member' => 'Restariganto',
	'group-transwiki-member' => 'Transvikia importanto',
	'grouppage-abusefilter' => '{{ns:project}}:Redaktantoj de misuzadaj filtriloj',
	'grouppage-accountcreator' => '{{ns:project}}:Kreintoj de kontoj',
	'grouppage-autopatroller' => '{{ns:project}}:Aŭtomataj patrolantoj',
	'grouppage-autoreviewer' => '{{ns:project}}:Aŭtomataj kontrolantoj',
	'grouppage-bigexport' => '{{ns:project}}:Grandaj eksportantoj',
	'grouppage-confirmed' => '{{ns:project}}:Konfirmitaj uzantoj',
	'grouppage-founder' => '{{ns:project}}:Fondintoj',
	'grouppage-import' => '{{ns:project}}:Importantoj',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Sendevigo por IP-forbaro',
	'grouppage-rollbacker' => '{{ns:project}}:Restarigantoj',
	'grouppage-transwiki' => '{{ns:project}}:Transvikiaj importantoj',
	'group-steward' => 'Stevardoj',
	'group-sysadmin' => 'Sistemaj administrantoj',
	'group-Editinterface' => 'Redakti interfacon',
	'group-Global_bot' => 'Ĝeneralaj robotoj',
	'group-Global_rollback' => 'Transvikia restariganto',
	'group-Ombudsmen' => 'Arbitraciistoj',
	'group-Staff' => 'Dungitaro',
	'group-steward-member' => 'Stevardo',
	'group-sysadmin-member' => 'sistema administranto',
	'group-Editinterface-member' => 'redakti interfacon',
	'group-Global_bot-member' => 'Ĝenerala roboto',
	'group-Global_rollback-member' => 'transvikia restariganto',
	'group-Ombudsmen-member' => 'Arbitraciisto',
	'group-Staff-member' => 'dungito',
	'group-coder' => 'Programistoj',
	'group-coder-member' => 'programisto',
	'group-inactive' => 'Neaktivaj uzantoj',
	'group-inactive-member' => 'neaktiva uzanto',
	'grouppage-inactive' => '{{ns:project}}:Neaktivaj uzantoj',
	'wikimedia-copyright' => 'La teksto estas havebla sub la <a href="http://creativecommons.org/licenses/by-sa/3.0/">Permesilo Commons Attribution/Share-Alike</a>; eble aldonaj kondiĉoj aplikeblas. Vidu <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">rajtojn de uzado</a> por detaloj.',
	'wikimedia-copyrightwarning' => 'Konservante, vi konsentas senlime doni vian kontribuon laŭ la [http://creativecommons.org/licenses/by-sa/3.0/ Permesilo Creative Commons Attribution-ShareAlike 3.0] kaj la [http://www.gnu.org/copyleft/fdl.html GFDL]. 
Vi konsentas esti agnoskata de reuzantoj almenaŭ per ligilo aŭ URL al la paĝo kontribuita. Vidu la [http://wikimediafoundation.org/wiki/Terms_of_Use Rajtojn de Uzado] por detaloj.',
	'wikimedia-editpage-tos-summary' => 'Se vi ne volas ke via verkado estu redaktata kaj redistruita laŭvole, tiam ne enigu ĝin ĉi tie. Se vi ne verkis ĝin mem, ĝi devas esti havebla kun rajtoj kiuj ne kontraŭas la [http://wikimediafoundation.org/wiki/Terms_of_Use Rajtojn de Uzado], kaj vi konsentas sekvi ĉiujn ĉi-temajn permesilajn devigojn.',
);

/** Spanish (Español)
 * @author AlimanRuna
 * @author Ascánder
 * @author Crazymadlover
 * @author Dferg
 * @author Locos epraix
 * @author Platonides
 * @author Sanbec
 */
$messages['es'] = array(
	'wikimediamessages-desc' => 'Mensajes específicos de Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donaciones',
	'sitesupport' => 'Donaciones',
	'tooltip-n-sitesupport' => 'Apóyenos',
	'group-abusefilter' => 'Editores de filtro de abuso',
	'group-accountcreator' => 'Creadores de cuentas',
	'group-autopatroller' => 'Autopatrulleros',
	'group-autoreviewer' => 'Autorrevisores',
	'group-bigexport' => 'Grandes exportadores',
	'group-confirmed' => 'Usuarios confirmados',
	'group-founder' => 'Fundadores',
	'group-import' => 'Importadores',
	'group-ipblock-exempt' => 'Exentos de bloqueo a IP',
	'group-rollbacker' => 'Reversores',
	'group-transwiki' => 'Importadores transwiki',
	'group-abusefilter-member' => 'Editor de filtro de abuso',
	'group-accountcreator-member' => 'Creador de cuentas',
	'group-autopatroller-member' => 'autopatrullero',
	'group-autoreviewer-member' => 'autorrevisor',
	'group-bigexport-member' => 'gran exportador',
	'group-confirmed-member' => 'Usuario confirmado',
	'group-founder-member' => 'Fundador',
	'group-import-member' => 'Importador',
	'group-ipblock-exempt-member' => 'Exento de bloqueo IP',
	'group-rollbacker-member' => 'Reversor',
	'group-transwiki-member' => 'Importador transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Editores de filtro de abuso',
	'grouppage-accountcreator' => '{{ns:project}}:Creadores de cuentas',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrulleros',
	'grouppage-autoreviewer' => '{{ns:project}}:Autorrevisores',
	'grouppage-bigexport' => '{{ns:project}}:Grandes exportadores',
	'grouppage-confirmed' => '{{ns:project}}:Usuarios confirmados',
	'grouppage-founder' => '{{ns:project}}:Fundadores',
	'grouppage-import' => '{{ns:project}}:Importadores',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Exento de bloqueo a IP',
	'grouppage-rollbacker' => '{{ns:project}}:Reversores',
	'grouppage-transwiki' => '{{ns:project}}:Importadores transwiki',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'administradores del sistema',
	'group-Editinterface' => 'Editores de interfaz',
	'group-Global_bot' => 'bots globales',
	'group-Global_rollback' => 'Reversores globales',
	'group-Ombudsmen' => 'Defensores de la comunidad',
	'group-Staff' => 'Staff',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'administrador del sistema',
	'group-Editinterface-member' => 'editor de interfaz',
	'group-Global_bot-member' => 'bot global',
	'group-Global_rollback-member' => 'Reversor global',
	'group-Ombudsmen-member' => 'defensor de la comunidad',
	'group-Staff-member' => 'Miembro del staff',
	'group-coder' => 'Programadores',
	'group-coder-member' => 'programador',
	'group-inactive' => 'Usuarios inactivos',
	'group-inactive-member' => 'usuario inactivo',
	'grouppage-inactive' => '{{ns:project}}:Usuarios inactivos',
	'wikimedia-copyright' => 'El texto está disponible bajo la <a href="http://creativecommons.org/licenses/by-sa/3.0/">Licencia Creative Commons Atribución/Compartir-Igual 3.0</a>;
cláusulas adicionales pueden aplicar.
Véase <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">los términos de uso</a> para más detalles.',
	'wikimedia-copyrightwarning' => 'Guardando el texto, usted acepta ceder de manera irrevocable sus contribuciones bajo la [http://creativecommons.org/licenses/by-sa/3.0/ Licencia Creative Commons Atribución/Compartir-Igual 3.0] y la [http://www.gnu.org/copyleft/fdl.html licencia GFDL].
Usted acepta a ser citado, como mínimo, por medio de un hipervínculo a la página donde ha contribuido.
Véase los [http://wikimediafoundation.org/wiki/Terms_of_Use términos de uso] para más detalles.',
	'wikimedia-editpage-tos-summary' => 'Si usted no desea que sus escritos sean editados y redistribuidos a voluntad, entonces no los guarde aquí.
Si el texto no lo ha escrito usted, debe estar disponible bajo las condiciones especificadas en los [http://wikimediafoundation.org/wiki/Terms_of_Use términos de uso], y usted acepta seguir cualquier requerimiento en relación a las licencias que le pudiese ser exigido.',
);

/** Estonian (Eesti)
 * @author Avjoska
 * @author KalmerE.
 * @author Ker
 * @author Pikne
 * @author WikedKentaur
 */
$messages['et'] = array(
	'wikimediamessages-desc' => 'Wikimedia-eriomased teated',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Annetused',
	'sitesupport' => 'Annetused',
	'tooltip-n-sitesupport' => 'Toeta meid',
	'group-abusefilter' => 'Väärtarvituse filtri muutjad',
	'group-accountcreator' => 'Kontoloojad',
	'group-autopatroller' => 'Automaatkontrollijad',
	'group-confirmed' => 'Kinnitatud kasutajad',
	'group-founder' => 'Asutajad',
	'group-import' => 'Importijad',
	'group-ipblock-exempt' => 'IP-aadressi blokeerimise erandid',
	'group-rollbacker' => 'Tühistajad',
	'group-abusefilter-member' => 'väärtarvituse filtri muutja',
	'group-accountcreator-member' => 'kontolooja',
	'group-autopatroller-member' => 'automaatkontrollija',
	'group-confirmed-member' => 'kinnitatud kasutaja',
	'group-founder-member' => 'asutaja',
	'group-import-member' => 'importija',
	'group-ipblock-exempt-member' => 'IP-aadressi blokeerimise erand',
	'group-rollbacker-member' => 'tühistaja',
	'grouppage-abusefilter' => '{{ns:project}}:Väärtarvituse filtri muutjad',
	'grouppage-accountcreator' => '{{ns:project}}:Kontoloojad',
	'grouppage-autopatroller' => '{{ns:project}}:Automaatkontrollijad',
	'grouppage-confirmed' => '{{ns:project}}:Kinnitatud kasutajad',
	'grouppage-founder' => '{{ns:project}}:Asutajad',
	'grouppage-import' => '{{ns:project}}:Importijad',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-aadressi blokeerimise erandid',
	'grouppage-rollbacker' => '{{ns:project}}:Tühistajad',
	'group-steward' => 'Stjuuardid',
	'group-sysadmin' => 'Süsteemiülemad',
	'group-Global_bot' => 'Globaalsed robotid',
	'group-Global_rollback' => 'Globaalsed tühistajad',
	'group-Ombudsmen' => 'Õigusvahemehed',
	'group-Staff' => 'Koosseis',
	'group-steward-member' => 'stjuuard',
	'group-sysadmin-member' => 'süsteemiülem',
	'group-Global_bot-member' => 'globaalne robot',
	'group-Global_rollback-member' => 'globaalne tühistaja',
	'group-Ombudsmen-member' => 'õigusvahemees',
	'group-Staff-member' => 'koosseisu liige',
	'group-inactive' => 'Passiivsed kasutajad',
	'group-inactive-member' => 'passiivne kasutaja',
	'grouppage-inactive' => '{{ns:project}}:Ebaaktiivsed kasutajad',
	'wikimedia-copyright' => 'Tekst on kasutatav <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike</a>-litsentsi tingimustel;
sellele võivad lisanduda täiendavad tingimused.
Täpsemalt vaata <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Wikimedia kasutamistingimusi</a>.',
	'wikimedia-copyrightwarning' => 'Salvestamisega annate te nõusoleku oma kaastöö pöördumatuks avaldamiseks [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike 3.0-] ning [http://www.gnu.org/copyleft/fdl.html GFDL-litsentside] alusel.
Te nõustute, et Teie autorlusele osutatakse vähemalt veebiaadressi või lingiga lehele, millele Te praegu kaastööd teete.
Täpsemalt vaadake [http://wikimediafoundation.org/wiki/Terms_of_Use Wikimedia kasutamistingimusi].',
	'wikimedia-editpage-tos-summary' => 'Kui te ei soovi, et teie kirjutatut halastamatult redigeeritakse ja oma äranägemise järgi kasutatakse, siis ärge seda siia salvestage. 
Kui Te ei kirjutanud seda teksti ise, siis peab see olema kasutatav vastavalt [http://wikimediafoundation.org/wiki/Terms_of_Use kasutustingimustes] toodud nõuetele ning te kohustute täitma vastavaid litsentsi tingimusi.',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Theklan
 * @author Unai Fdz. de Betoño
 */
$messages['eu'] = array(
	'wikimediamessages-desc' => 'Wikimediaren mezu espezifikoak',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Dohaintzak',
	'sitesupport' => 'Dohaintzak',
	'tooltip-n-sitesupport' => 'Lagundu gaitzazu',
	'group-abusefilter' => 'Abusu-iragazkien editoreak',
	'group-accountcreator' => 'Kontu sortzailea',
	'group-autopatroller' => 'Autopatruilariak',
	'group-autoreviewer' => 'Aztertzaile automatikoak',
	'group-bigexport' => 'Esportatzaile handiak',
	'group-confirmed' => 'Egiaztatutako erabiltzaileak',
	'group-founder' => 'Fundatzaileak',
	'group-import' => 'Inportatzaileak',
	'group-ipblock-exempt' => 'IP blokeo salbuespenak',
	'group-rollbacker' => 'Desegin dezakete',
	'group-transwiki' => 'Transwiki inportatzaileak',
	'group-abusefilter-member' => 'abusu-iragazkiaren editorea',
	'group-accountcreator-member' => 'kontu sortzaileak',
	'group-autopatroller-member' => 'autopatruilalaria',
	'group-autoreviewer-member' => 'aztertzaile automatikoa',
	'group-bigexport-member' => 'esportatzaile handia',
	'group-confirmed-member' => 'egiaztatutako erabiltzailea',
	'group-founder-member' => 'fundatzailea',
	'group-import-member' => 'inportatzailea',
	'group-ipblock-exempt-member' => 'IP blokeo salbuespena',
	'group-rollbacker-member' => 'desegin dezake',
	'group-transwiki-member' => 'transwiki inportatzailea',
	'grouppage-abusefilter' => '{{ns:project}}:Abusu-iragazkien editoreak',
	'grouppage-accountcreator' => '{{ns:project}}:Kontu sortzaileak',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatruilariak',
	'grouppage-autoreviewer' => '{{ns:project}}:Aztertzaile automatikoak',
	'grouppage-bigexport' => '{{ns:project}}:Esportatzaile handiak',
	'grouppage-confirmed' => '{{ns:project}}:Egiaztatutako erabiltzaileak',
	'grouppage-founder' => '{{ns:project}}:Fundatzaileak',
	'grouppage-import' => '{{ns:project}}:Inportatzaileak',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP blokeo salbuespenak',
	'grouppage-rollbacker' => '{{ns:project}}:Desegin dezakete',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki inportatzaileak',
	'group-steward' => 'Stewardak',
	'group-sysadmin' => 'Sistemaren kudeatzaileak',
	'group-Editinterface' => 'Interfazeko editoreak',
	'group-Global_bot' => 'Bot globalak',
	'group-Global_rollback' => 'Globalki desegin dezakete',
	'group-Ombudsmen' => 'Komunitatearen babesleak',
	'group-Staff' => 'Langileak',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'sistemaren garatzaileak',
	'group-Editinterface-member' => 'interfazeko editorea',
	'group-Global_bot-member' => 'bot globala',
	'group-Global_rollback-member' => 'globalki desegin dezakete',
	'group-Ombudsmen-member' => 'komunitatearen babeslea',
	'group-Staff-member' => 'langilea',
	'grouppage-steward' => 'm:Stewards',
	'group-coder' => 'Kode egileak',
	'group-coder-member' => 'kode garatzailea',
	'group-inactive' => 'Erabiltzaile ez-aktiboak',
	'group-inactive-member' => 'erabiltzaile ez-aktiboa',
	'grouppage-inactive' => '{{ns:project}}:Erabiltzaile ez-aktiboak',
	'wikimedia-copyright' => 'Testua <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.eu">Creative Commons Aitortu/Partekatu Lizentziapean</a> erabil daiteke;
klausula gehigarriak aplikatu daitezke.
Xehetasunetarako, ikus <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Erabilera-baldintzak</a>.',
	'wikimedia-copyrightwarning' => 'Aldaketak gordez, zure ekarpena [http://creativecommons.org/licenses/by-sa/3.0/deed.eu Creative Commons Aitortu/Partekatu 3.0] eta [http://www.gnu.org/copyleft/fdl.html GFDL] lizentzien pean modu ezeztaezinean laga egiten duzula onartzen duzu.
Aldatu duzun orrialdera doan hiperlotura edo URL baten bidez, gutxienez, aitortua izatea onartzen duzu.
Xehetasunetarako, ikus [http://wikimediafoundation.org/wiki/Terms_of_Use Erabilera-baldintzak].',
	'wikimedia-editpage-tos-summary' => 'Zure ekarpena nahi den bezala aldatua eta birbanatua izan dadin ez baduzu nahi, orduan ez gorde.
Ekarpena ez baduzu zuk zeuk idatzi, [http://wikimediafoundation.org/wiki/Terms_of_Use Erabilera-baldintzetan] zehazten diren kondizioetan eskuragarri egon beharko du, eta edozein lizentzia-eskakizun garrantzitsu betetzea onartuko duzu.',
);

/** Extremaduran (Estremeñu)
 * @author Better
 */
$messages['ext'] = array(
	'sitesupport' => 'Donacionis',
	'tooltip-n-sitesupport' => 'Ayúamus',
);

/** Persian (فارسی)
 * @author Huji
 * @author Ladsgroup
 * @author Mardetanha
 */
$messages['fa'] = array(
	'wikimediamessages-desc' => 'پیغام‌های مخصوص ویکی‌مدیا',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/fa',
	'sitesupport' => 'کمک مالی',
	'tooltip-n-sitesupport' => 'حمایت از ما',
	'group-abusefilter' => 'ویرایشگران پالایهٔ خرابکاری',
	'group-accountcreator' => 'سازندگان حساب کاربری',
	'group-autopatroller' => 'گشت‌زنان خودکار',
	'group-confirmed' => 'کاربران تائیدشده',
	'group-founder' => 'بنیان‌گذاران',
	'group-import' => 'واردکنندگان',
	'group-ipblock-exempt' => 'استثناهای قطع دسترسی نشانی اینترنتی',
	'group-rollbacker' => 'واگردانی‌کنندگان',
	'group-transwiki' => 'واردکنندگان تراویکی',
	'group-abusefilter-member' => 'ویرایشگر پالایهٔ خرابکاری',
	'group-accountcreator-member' => 'ایجادکنندهٔ حساب کاربری',
	'group-autopatroller-member' => 'گشت‌زن خودکار',
	'group-confirmed-member' => 'کاربران تائید شده',
	'group-founder-member' => 'بنیان‌گذار',
	'group-import-member' => 'واردکننده',
	'group-ipblock-exempt-member' => 'استثنای قطع دسترسی نشانی اینترنتی',
	'group-rollbacker-member' => 'واگردانی‌کننده',
	'group-transwiki-member' => 'واردکنندهٔ تراویکی',
	'grouppage-accountcreator' => '{{ns:project}}:سازندگان حساب کاربری',
	'grouppage-autopatroller' => '{{ns:project}}:گشت‌زنان خودکار',
	'grouppage-founder' => '{{ns:project}}:بنیان‌گذاران',
	'grouppage-import' => '{{ns:project}}:واردکنندگان',
	'grouppage-ipblock-exempt' => '{{ns:project}}:استثنای قطع دسترسی نشانی اینترنتی',
	'grouppage-rollbacker' => '{{ns:project}}:واگردانی‌کنندگان',
	'grouppage-transwiki' => '{{ns:project}}:واردکنندگان تراویکی',
	'group-steward' => 'ویکیبدان',
	'group-sysadmin' => 'مدیران سیستم',
	'group-Global_bot' => 'ربات‌های سراسری',
	'group-Global_rollback' => 'واگردانی‌کنندگان سراسری',
	'group-Ombudsmen' => 'دادآوران',
	'group-Staff' => 'پرسنل',
	'group-steward-member' => 'ویکیبد',
	'group-sysadmin-member' => 'مدیر سیستم',
	'group-Global_bot-member' => 'ربات سراسری',
	'group-Global_rollback-member' => 'واگردانی‌کنندهٔ سراسری',
	'group-Ombudsmen-member' => 'دادآور',
	'group-Staff-member' => 'عضو پرسنل',
	'group-coder' => 'برنامه‌نویسان',
	'group-coder-member' => 'برنامه‌نویس',
	'group-inactive' => 'کاربران غیرفعال',
	'group-inactive-member' => 'کاربر غیرفعال',
	'grouppage-inactive' => '{{ns:project}}:کاربران غیرفعال',
	'wikimedia-copyrightwarning' => 'با ذخیره‌سازی شما قبول می‌کنید که مشارکت‌هایتان را به صورت غیر قابل فسخ با اجازه‌نامه‌های [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] و [http://www.gnu.org/copyleft/fdl.html GFDL] منتشر کنید.
شما موافقت می‌کنید که مصرف‌کنندگان ثانوی، دست‌کم از طریق گذاشتن ابرپیوند یا درج نشانی صفحه‌ای که در آن مشارکت می‌کنید، از شما یاد کنند.
برای دیدن جزئیات [http://wikimediafoundation.org/wiki/Terms_of_Use شرایط استفاده] را ببینید.',
);

/** Fulah (Fulfulde) */
$messages['ff'] = array(
	'sitesupport' => 'Dokkal',
);

/** Finnish (Suomi)
 * @author Agony
 * @author Cimon Avaro
 * @author Crt
 * @author Jaakonam
 * @author Nike
 * @author Str4nd
 * @author Tarmo
 * @author Varusmies
 */
$messages['fi'] = array(
	'wikimediamessages-desc' => 'Wikimedian käyttämiä järjestelmäviestejä.',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/fi',
	'sitesupport' => 'Lahjoitukset',
	'tooltip-n-sitesupport' => 'Tue meitä',
	'group-abusefilter' => 'väärinkäyttösuodattimen muokkaajat',
	'group-accountcreator' => 'käyttäjätunnusten luojat',
	'group-autopatroller' => 'automaattisesti tarkastavat',
	'group-autoreviewer' => 'automaattiset arvioivat',
	'group-bigexport' => 'suuret viejät',
	'group-confirmed' => 'hyväksytyt käyttäjät',
	'group-founder' => 'perustajat',
	'group-import' => 'sivujen tuojat',
	'group-ipblock-exempt' => 'IP-estoista vapautetut',
	'group-rollbacker' => 'palauttajat',
	'group-transwiki' => 'toisesta wikistä sivujen tuojat',
	'group-abusefilter-member' => 'väärinkäyttösuodattimen muokkaaja',
	'group-accountcreator-member' => 'käyttäjätunnusten luoja',
	'group-autopatroller-member' => 'automaattisesti tarkastava',
	'group-autoreviewer-member' => 'automaattisesti arvioiva',
	'group-bigexport-member' => 'suuri viejä',
	'group-confirmed-member' => 'hyväksytty käyttäjä',
	'group-founder-member' => 'perustaja',
	'group-import-member' => 'sivujen tuoja',
	'group-ipblock-exempt-member' => 'IP-estosta vapautettu',
	'group-rollbacker-member' => 'palauttaja',
	'group-transwiki-member' => 'toisesta wikistä sivujen tuoja',
	'grouppage-abusefilter' => '{{ns:project}}:Väärinkäyttösuodattimen muokkaajat',
	'grouppage-accountcreator' => '{{ns:project}}:Käyttäjätunnusten luojat',
	'grouppage-autopatroller' => '{{ns:project}}:Automaattisesti tarkastavat',
	'grouppage-autoreviewer' => '{{ns:project}}:Automaattisesti arvioivat',
	'grouppage-bigexport' => '{{ns:project}}:Suuret viejät',
	'grouppage-confirmed' => '{{ns:project}}:Hyväksytyt käyttäjät',
	'grouppage-founder' => '{{ns:project}}:Perustajat',
	'grouppage-import' => '{{ns:project}}:Sivujen tuojat',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-estoista vapautetut',
	'grouppage-rollbacker' => '{{ns:project}}:Palauttajat',
	'grouppage-transwiki' => '{{ns:project}}:Toisista wikeistä sivujen tuojat',
	'group-steward' => 'ylivalvojat',
	'group-sysadmin' => 'järjestelmän ylläpitäjät',
	'group-Editinterface' => 'Muokkaa käyttöliittymää',
	'group-Global_bot' => 'globaalit botit',
	'group-Global_rollback' => 'globaalit palauttajat',
	'group-Ombudsmen' => 'edustajat',
	'group-Staff' => 'projektin ylläpitäjät',
	'group-steward-member' => 'ylivalvoja',
	'group-sysadmin-member' => 'järjestelmän ylläpitäjä',
	'group-Editinterface-member' => 'muokkaa käyttöliittymää',
	'group-Global_bot-member' => 'globaalibotti',
	'group-Global_rollback-member' => 'globaalipalauttaja',
	'group-Ombudsmen-member' => 'edustaja',
	'group-Staff-member' => 'projektin ylläpitäjä',
	'grouppage-steward' => 'm:Stewards/fi',
	'group-coder' => 'ohjelmoijat',
	'group-coder-member' => 'ohjelmoija',
	'group-inactive' => 'epäaktiiviset käyttäjät',
	'group-inactive-member' => 'epäaktiivinen käyttäjä',
	'grouppage-inactive' => '{{ns:project}}:Epäaktiiviset käyttäjät',
	'wikimedia-copyright' => 'Teksti on saatavilla <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike</a> -lisenssillä; lisäehtoja voi sisältyä. Katso <a href="http://wikimediafoundation.org/wiki/Käyttöehdot">käyttöehdot</a>.',
	'wikimedia-copyrightwarning' => 'Tallentamalla hyväksyt julkaiset muokkauksesi peruuttamattomasti [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike 3.0-] ja [http://www.gnu.org/copyleft/fdl.html GFDL-lisensseillä]. Aineiston myöhemmät käyttäjät saattavat mainita käyttäjätunnuksesi, vähintään linkin tai osoitteen kautta muokkaamaasi artikkeliin. Lisätietoja löytyy [http://wikimediafoundation.org/wiki/Terms_of_Use käyttöehdoista].',
	'wikimedia-editpage-tos-summary' => 'Jos et halua kirjoitustasi muiden muokattavaksi ja levitettäväksi, älä tallenna sitä tänne. Jos et kirjoittanut tätä itse, tekstin tulee olla saatavilla [http://wikimediafoundation.org/wiki/Terms_of_Use käyttöehtojen] mukaisin ehdoin ja hyväksyt asiaankuuluvien lisenssivaatimusten noudattamisen.',
);

/** Fijian (Na Vosa Vakaviti) */
$messages['fj'] = array(
	'sitesupport' => 'Soli',
);

/** Faroese (Føroyskt)
 * @author Spacebirdy
 */
$messages['fo'] = array(
	'tooltip-n-sitesupport' => 'Stuðla okkum',
	'group-steward' => 'Ternur',
	'group-steward-member' => 'Terna',
	'grouppage-steward' => '{{ns:project}}:Ternur',
);

/** French (Français)
 * @author Crochet.david
 * @author Grondin
 * @author Guillom
 * @author IAlex
 * @author Kropotkine 113
 * @author Meno25
 * @author PieRRoMaN
 * @author Seb35
 * @author Sherbrooke
 * @author Verdy p
 * @author Yekrats
 * @author Zetud
 * @author לערי ריינהארט
 */
$messages['fr'] = array(
	'wikimediamessages-desc' => 'Messages spécifiques de Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/fr',
	'sitesupport' => 'Faire un don',
	'tooltip-n-sitesupport' => 'Aidez-nous',
	'group-abusefilter' => 'Modificateurs de filtre antiabus',
	'group-accountcreator' => 'Créateurs de comptes',
	'group-autopatroller' => 'Patrouilleurs automatiques',
	'group-autoreviewer' => 'Relecteurs automatiques',
	'group-bigexport' => 'Grands exportateurs',
	'group-confirmed' => 'Utilisateurs confirmés',
	'group-founder' => 'Fondateurs',
	'group-import' => 'Importateurs',
	'group-ipblock-exempt' => 'Exemptés de blocage d’IP',
	'group-rollbacker' => 'Révocateurs',
	'group-transwiki' => 'Importateurs transwiki',
	'group-abusefilter-member' => 'modificateur de filtre antiabus',
	'group-accountcreator-member' => 'Créateur de comptes',
	'group-autopatroller-member' => 'Patrouilleur automatique',
	'group-autoreviewer-member' => 'Relecteur automatique',
	'group-bigexport-member' => 'grand exportateur',
	'group-confirmed-member' => 'utilisateur confirmé',
	'group-founder-member' => 'Fondateur',
	'group-import-member' => 'Importateur',
	'group-ipblock-exempt-member' => 'Exempté de blocage d’IP',
	'group-rollbacker-member' => 'Révocateur',
	'group-transwiki-member' => 'Importateur transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Modificateurs de filtre antiabus',
	'grouppage-accountcreator' => '{{ns:project}}:Créateurs de comptes',
	'grouppage-autopatroller' => '{{ns:project}}:Patrouilleurs automatiques',
	'grouppage-autoreviewer' => '{{ns:project}}:Relecteurs automatiques',
	'grouppage-bigexport' => '{{ns:project}}:Grands exportateurs',
	'grouppage-confirmed' => '{{ns:project}}:Utilisateurs confirmés',
	'grouppage-founder' => '{{ns:project}}:Fondateurs',
	'grouppage-import' => '{{ns:project}}:Importateurs',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Exemption de blocage d’IP',
	'grouppage-rollbacker' => '{{ns:project}}:Révocateurs',
	'grouppage-transwiki' => '{{ns:project}}:Importateurs transwiki',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Administrateurs système',
	'group-Editinterface' => "Modificateurs de l'interface",
	'group-Global_bot' => 'Bots globaux',
	'group-Global_rollback' => 'Révocateurs globaux',
	'group-Ombudsmen' => 'Médiateurs',
	'group-Staff' => 'Personnel',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'Administrateur système',
	'group-Editinterface-member' => "modificateur de l'interface",
	'group-Global_bot-member' => 'Bot global',
	'group-Global_rollback-member' => 'Révocateur global',
	'group-Ombudsmen-member' => 'Médiateur',
	'group-Staff-member' => 'Membre du personnel',
	'grouppage-steward' => 'm:Stewards/fr',
	'grouppage-Global_bot' => 'm:Bot policy/fr',
	'grouppage-Global_rollback' => 'm:Global rollback/fr',
	'group-coder' => 'Codeurs',
	'group-coder-member' => 'Codeur',
	'group-inactive' => 'Utilisateurs inactifs',
	'group-inactive-member' => 'utilisateur inactif',
	'grouppage-inactive' => '{{ns:project}}:Utilisateurs inactifs',
	'wikimedia-copyright' => 'Les textes sont disponibles sous <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.fr">licence Creative Commons paternité - partage à l’identique des conditions initiales</a> ; d’autres conditions peuvent s’appliquer. Voyez les <a href="http://wikimediafoundation.org/wiki/conditions_d\'utilisation">conditions d’utilisation</a> pour plus de détails.',
	'wikimedia-copyrightwarning' => 'En cliquant sur « publier », vous acceptez de placer irrévocablement votre contribution sous [http://creativecommons.org/licenses/by-sa/3.0/ licence Creative Commons attribution partage à l’identique 3.0] et [http://www.gnu.org/copyleft/fdl.html GFDL]. Vous acceptez d’être crédité par les ré-utilisateurs au minimum via un hyperlien ou une URL vers l’article sur lequel vous contribuez. Voyez les [http://wikimediafoundation.org/wiki/Terms_of_Use conditions d’utilisation] pour plus de détails.',
	'wikimedia-editpage-tos-summary' => 'Si vous ne désirez pas que vos écrits soient modifiés et redistribués à volonté, alors ne les soumettez pas ici. Si vous ne les avez pas écrits vous-même, ils doivent être disponibles sous des termes compatibles avec les [http://wikimediafoundation.org/wiki/Terms_of_Use termes d’utilisation], et vous acceptez de suivre toutes les exigences de la licence.',
);

/** Cajun French (Français cadien)
 * @author JeanVoisin
 */
$messages['frc'] = array(
	'sitesupport' => "Donner de l'argent",
);

/** Franco-Provençal (Arpetan)
 * @author Cedric31
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'wikimediamessages-desc' => 'Mèssâjos spèceficos de Wikimedia.',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/fr',
	'sitesupport' => 'Balyér',
	'tooltip-n-sitesupport' => 'Édiéd-nos !',
	'group-abusefilter' => 'Changiors de filtro d’abus',
	'group-accountcreator' => 'Crèators de comptos',
	'group-autopatroller' => 'Patrolyors ôtomaticos',
	'group-autoreviewer' => 'Rèvisors ôtomaticos',
	'group-bigexport' => 'Grants èxportators',
	'group-confirmed' => 'Utilisators confirmâs',
	'group-founder' => 'Fondators',
	'group-import' => 'Importators',
	'group-ipblock-exempt' => 'Ègzencions de blocâjo d’adrèce IP',
	'group-rollbacker' => 'Rèvoquiors',
	'group-transwiki' => 'Importators entèrvouiqui',
	'group-abusefilter-member' => 'Changior de filtro d’abus',
	'group-accountcreator-member' => 'Crèator de comptos',
	'group-autopatroller-member' => 'Patrolyor ôtomatico',
	'group-autoreviewer-member' => 'Rèvisor ôtomatico',
	'group-bigexport-member' => 'Grant èxportator',
	'group-confirmed-member' => 'Utilisator confirmâ',
	'group-founder-member' => 'Fondator',
	'group-import-member' => 'Importator',
	'group-ipblock-exempt-member' => 'Ègzencion de blocâjo d’adrèce IP',
	'group-rollbacker-member' => 'Rèvoquior',
	'group-transwiki-member' => 'Importator entèrvouiqui',
	'grouppage-abusefilter' => '{{ns:project}}:Changiors de filtro d’abus',
	'grouppage-accountcreator' => '{{ns:project}}:Crèators de comptos',
	'grouppage-autopatroller' => '{{ns:project}}:Patrolyors ôtomaticos',
	'grouppage-autoreviewer' => '{{ns:project}}:Rèvisors ôtomaticos',
	'grouppage-bigexport' => '{{ns:project}}:Grants èxportators',
	'grouppage-confirmed' => '{{ns:project}}:Utilisators confirmâs',
	'grouppage-founder' => '{{ns:project}}:Fondators',
	'grouppage-import' => '{{ns:project}}:Importators',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Ègzencion de blocâjo d’adrèce IP',
	'grouppage-rollbacker' => '{{ns:project}}:Rèvoquiors',
	'grouppage-transwiki' => '{{ns:project}}:Importators entèrvouiqui',
	'group-steward' => 'Stevârds',
	'group-sysadmin' => 'Administrators sistèmo',
	'group-Global_bot' => 'Bots globâls',
	'group-Global_rollback' => 'Rèvoquiors globâls',
	'group-Ombudsmen' => 'Mèdiators',
	'group-Staff' => 'Gens',
	'group-steward-member' => 'Stevârd',
	'group-sysadmin-member' => 'Administrator sistèmo',
	'group-Global_bot-member' => 'Bot globâl',
	'group-Global_rollback-member' => 'Rèvoquior globâl',
	'group-Ombudsmen-member' => 'Mèdiator',
	'group-Staff-member' => 'Membro a les gens',
	'grouppage-steward' => 'm:Stewards',
	'group-coder' => 'Codiors',
	'group-coder-member' => 'Codior',
	'group-inactive' => 'Utilisators que font ren du tot',
	'group-inactive-member' => 'Utilisator que fât ren du tot',
	'grouppage-inactive' => '{{ns:project}}:Utilisators que font ren du tot',
	'wikimedia-copyright' => 'Los tèxtos sont disponiblos desot <a href="http://creativecommons.org/licenses/by-sa/3.0/">licence Creative Commons atribucion partâjo u mémo</a> ; d’ôtres condicions pôvont s’aplicar. Vêde les <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">condicions d’usâjo</a> por més de dètalys.',
);

/** Friulian (Furlan)
 * @author Klenje
 */
$messages['fur'] = array(
	'sitesupport' => 'Doninus',
	'tooltip-n-sitesupport' => 'Judinus',
	'group-founder' => 'Fondadôrs',
	'group-founder-member' => 'Fondadôr',
);

/** Western Frisian (Frysk)
 * @author Pyt
 * @author Snakesteuben
 */
$messages['fy'] = array(
	'sitesupport' => 'Donaasjes',
	'tooltip-n-sitesupport' => 'Stypje ús',
);

/** Irish (Gaeilge)
 * @author Alison
 */
$messages['ga'] = array(
	'wikimediamessages-desc' => 'Teachtaireachtaí sainiúil an Viciméid',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/ga',
	'sitesupport' => 'Síntiúis',
	'tooltip-n-sitesupport' => 'Tacaigh linn',
	'group-accountcreator' => 'Cuntas cruthóirí',
	'group-autopatroller' => 'Uathphatrólóirí',
	'group-founder' => 'Bunaitheoirí',
	'group-import' => 'Iompórtálaithe',
	'group-ipblock-exempt' => 'Díolúintí coisc IP',
	'group-rollbacker' => 'Tar-rolltóirí',
	'group-transwiki' => 'Iompórtálaithe traisvicí',
	'group-accountcreator-member' => 'cuntas cruthóir',
	'group-autopatroller-member' => 'uathphatrólóir',
	'group-founder-member' => 'bunaitheoir',
	'group-import-member' => 'iompórtálaí',
	'group-ipblock-exempt-member' => 'Díolúine coisc IP',
	'group-rollbacker-member' => 'tar-rolltóir',
	'group-transwiki-member' => 'iompórtálaí traisvicí',
	'grouppage-accountcreator' => '{{ns:project}}:Cuntas cruthóirí',
	'grouppage-autopatroller' => '{{ns:project}}:Uathphatrólóirí',
	'grouppage-founder' => '{{ns:project}}:Bunaitheoirí',
	'grouppage-import' => '{{ns:project}}:Iompórtálaithe',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Díolúine coisc IP',
	'grouppage-rollbacker' => '{{ns:project}}:Tar-rolltóirí',
	'grouppage-transwiki' => '{{ns:project}}:Iompórtálaithe traisvicí',
	'group-steward' => 'Maoir',
	'group-sysadmin' => 'Riarthóirí',
	'group-Global_bot' => 'Róbónna domhanda',
	'group-Global_rollback' => 'Tar-rolltóirí domhanda',
	'group-Ombudsmen' => 'Daoine an Phobail',
	'group-Staff' => 'Foireann',
	'group-steward-member' => 'maor',
	'group-sysadmin-member' => 'riarthóir',
	'group-Global_bot-member' => 'róbó domhanda',
	'group-Global_rollback-member' => 'tar-rolltóir domhanda',
	'group-Ombudsmen-member' => 'Duine an Phobail',
	'group-Staff-member' => 'ball foirne',
	'group-coder' => 'Códóirí',
	'group-coder-member' => 'códóir',
	'shared-repo-name-shared' => 'an Cómhaoin Vicíméid',
);

/** Gagauz (Gagauz)
 * @author Cuman
 */
$messages['gag'] = array(
	'sitesupport' => 'Baaşişlär',
	'tooltip-n-sitesupport' => 'Material destek',
);

/** Gan (贛語)
 * @author Symane
 */
$messages['gan'] = array(
	'sitesupport' => '贊助',
	'tooltip-n-sitesupport' => '資援偶嗰俚',
);

/** Traditional Gan script (贛語(繁體))
 * @author Symane
 */
$messages['gan-hant'] = array(
	'wikimediamessages-desc' => 'Wikimedia嗰特定訊息',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/{{urlencode:捐助}}',
	'sitesupport' => '捐助',
	'tooltip-n-sitesupport' => '支持我俚',
	'group-abusefilter' => '濫用過濾器編者',
	'group-accountcreator' => '開戶專員',
	'group-autopatroller' => '自動巡查員',
	'group-bigexport' => '大量匯出者',
	'group-founder' => '創辦者',
	'group-import' => '匯入者',
	'group-ipblock-exempt' => 'IP封鎖例外者',
	'group-rollbacker' => '返退員',
	'group-transwiki' => 'Transwiki匯入者',
	'group-abusefilter-member' => '濫用過濾器編者',
	'group-accountcreator-member' => '開戶專員',
	'group-bigexport-member' => '大量匯出者',
	'group-founder-member' => '創辦者',
	'group-import-member' => '匯入者',
	'group-ipblock-exempt-member' => 'IP封鎖例外',
	'group-rollbacker-member' => '返退員',
	'group-transwiki-member' => 'Transwiki匯入者',
	'grouppage-abusefilter' => '{{ns:project}}:濫用過濾器編者',
	'grouppage-accountcreator' => '{{ns:project}}:開戶專員',
	'grouppage-bigexport' => '{{ns:project}}:大量匯出者',
	'grouppage-founder' => '{{ns:project}}:創辦者',
	'grouppage-import' => '{{ns:project}}:匯入者',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP封鎖例外',
	'grouppage-rollbacker' => '{{ns:project}}:返退員',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki匯入者',
	'group-steward' => '執行員',
	'group-sysadmin' => '系統管理員',
	'group-Global_bot' => '全域機器人',
	'group-Global_rollback' => '全域返退員',
	'group-Ombudsmen' => '申訴專員',
	'group-Staff' => '成員',
	'group-steward-member' => '執行員',
	'group-sysadmin-member' => '系統管理員',
	'group-Global_bot-member' => '全域機器人',
	'group-Global_rollback-member' => '全域返退員',
	'group-Ombudsmen-member' => '申訴專員',
	'group-Staff-member' => '成員',
	'group-coder' => '編碼員',
	'group-coder-member' => '編碼員',
	'group-inactive' => '不活躍嗰用戶',
	'group-inactive-member' => '不活躍嗰用戶',
	'grouppage-inactive' => '{{ns:project}}:不活躍嗰用戶',
	'wikimedia-copyright' => '箇首嗰所有文字係揸得<a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike 牌照</a>嗰條款發佈；可能會有附加嗰條款。
望吖<a href="http://wikimediafoundation.org/wiki/Terms_of_Use">使用條款</a>嗰細節。',
	'wikimedia-copyrightwarning' => '倷捺下「{{int:savearticle}}」嗰時間，就係話倷同意搦自家嗰貢獻揸得[http://creativecommons.org/licenses/by-sa/3.0/ CC-by-sa-3.0]同得[http://www.gnu.org/copyleft/fdl.html GFDL]嗰條款內容發表。
倷准別嗰用者編輯佢，至少，通過隻超連結或網址到倷嗰貢獻頁。
望吖[http://wikimediafoundation.org/wiki/Terms_of_Use 使用條款]嗰細節。',
	'wikimedia-editpage-tos-summary' => '要係倷不歡喜自家寫嗰文字拕別人編輯或再發佈嗰話，許就莫到箇首提交。
要係箇不係倷自簡寫嗰文字嗰話，佢一定要同[http://wikimediafoundation.org/wiki/Terms_of_Use 使用條款]相合，跟得倷要同意任何相關嗰發牌條件。',
);

/** Scottish Gaelic (Gàidhlig) */
$messages['gd'] = array(
	'sitesupport' => 'Tabhartasan',
);

/** Galician (Galego)
 * @author Alma
 * @author Meno25
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'wikimediamessages-desc' => 'Mensaxes específicas da Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/gl',
	'sitesupport' => 'Doazóns',
	'tooltip-n-sitesupport' => 'Apóienos',
	'group-abusefilter' => 'Editores do filtro de abusos',
	'group-accountcreator' => 'Creadores de contas',
	'group-autopatroller' => 'Autopatrullas',
	'group-autoreviewer' => 'Autorrevisores',
	'group-bigexport' => 'Grandes exportadores',
	'group-confirmed' => 'Usuarios confirmados',
	'group-founder' => 'Fundadores',
	'group-import' => 'Importadores',
	'group-ipblock-exempt' => 'Exención de bloqueo IP',
	'group-rollbacker' => 'Revertidores',
	'group-transwiki' => 'Importadores transwiki',
	'group-abusefilter-member' => 'editor do filtro de abusos',
	'group-accountcreator-member' => 'Creador de contas',
	'group-autopatroller-member' => 'autopatrulla',
	'group-autoreviewer-member' => 'autorrevisor',
	'group-bigexport-member' => 'gran exportador',
	'group-confirmed-member' => 'usuario confirmado',
	'group-founder-member' => 'Fundador',
	'group-import-member' => 'Importador',
	'group-ipblock-exempt-member' => 'Exento de bloqueo IP',
	'group-rollbacker-member' => 'Revertidor',
	'group-transwiki-member' => 'Importador transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Editores do filtro de abusos',
	'grouppage-accountcreator' => '{{ns:project}}:Creadores de contas',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrullas',
	'grouppage-autoreviewer' => '{{ns:project}}:Autorrevisores',
	'grouppage-bigexport' => '{{ns:project}}:Grandes exportadores',
	'grouppage-confirmed' => '{{ns:project}}:Usuarios confirmados',
	'grouppage-founder' => '{{ns:project}}:Fundadores',
	'grouppage-import' => '{{ns:project}}:Importadores',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Exención de bloqueo IP',
	'grouppage-rollbacker' => '{{ns:project}}:Revertidores',
	'grouppage-transwiki' => '{{ns:project}}:Importadores transwiki',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Administradores do sistema',
	'group-Editinterface' => 'Editores da interface',
	'group-Global_bot' => 'Bots globais',
	'group-Global_rollback' => 'Revertedores globais',
	'group-Ombudsmen' => 'Comisarios',
	'group-Staff' => 'Membros',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'administrador do sistema',
	'group-Editinterface-member' => 'editor da interface',
	'group-Global_bot-member' => 'bot global',
	'group-Global_rollback-member' => 'revertedor global',
	'group-Ombudsmen-member' => 'comisario',
	'group-Staff-member' => 'membro',
	'group-coder' => 'Codificadores',
	'group-coder-member' => 'codificador',
	'group-inactive' => 'Usuarios inactivos',
	'group-inactive-member' => 'usuario inactivo',
	'grouppage-inactive' => '{{ns:project}}:Usuarios inactivos',
	'shared-repo-name-shared' => 'Wikimedia Commons',
	'wikimedia-copyright' => 'Todo o texto está dispoñible baixo a <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.gl">Licenza Creative Commons Attribution/Share-Alike</a>; pódense aplicar termos adicionais. Consulte os <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Termos de uso</a> para obter máis información.',
	'wikimedia-copyrightwarning' => 'Ao gardar acepta liberar irrevogablemente a súa contribución baixo a [http://creativecommons.org/licenses/by-sa/3.0/deed.gl Licenza Creative Commons Attribution/Share-Alike 3.0] e a [http://www.gnu.org/copyleft/fdl.html GFDL]. Está de acordo en acreditar a reutilización por parte doutros, como mínimo, por medio dunha hiperligazón ou URL ao artigo ao que está contribuíndo. Consulte os [http://wikimediafoundation.org/wiki/Terms_of_Use Termos de uso] para obter máis información.',
	'wikimedia-editpage-tos-summary' => 'Se non quere que o seu texto sexa editado e redistribuído, non o envíe. Se non escribiu isto, este texto debería estar dispoñible baixo termos compatibles cos [http://wikimediafoundation.org/wiki/Terms_of_Use Termos de uso] e vostede debe estar de acordo en seguir todas as esixencias das licenzas.',
);

/** Gilaki (گیلکی)
 * @author AminSanaei
 */
$messages['glk'] = array(
	'sitesupport' => 'بال زئن',
);

/** Guarani (Avañe'ẽ) */
$messages['gn'] = array(
	'sitesupport' => "Me'ẽ rei",
);

/** Gothic (Gothic)
 * @author Jocke Pirat
 * @author LeighvsOptimvsMaximvs
 * @author Omnipaedista
 */
$messages['got'] = array(
	'sitesupport' => 'Hairtiþaskatts',
	'tooltip-n-sitesupport' => 'Hairtiþ uns',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author LeighvsOptimvsMaximvs
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'wikimediamessages-desc' => 'Μηνύματα ἴδια τοῦ Wikimedia',
	'sitesupport' => 'Δῶρα',
	'tooltip-n-sitesupport' => 'Τρέφειν ἡμᾶς',
	'group-abusefilter' => 'Μεταγραφεῖς διηθητηρίων καταχρήσεων',
	'group-accountcreator' => 'Ποιηταὶ λογισμῶν',
	'group-autopatroller' => 'Αὐτόματοι περιποληταί',
	'group-autoreviewer' => 'Ἐπιθεωρηταὶ αὐτόματοι',
	'group-bigexport' => 'Μεγάλοι ἐξαγωγεῖς',
	'group-confirmed' => 'Ἐπιβεβαιωθέντες χρώμενοι',
	'group-founder' => 'Ἱδρυταί',
	'group-import' => 'Εἰσαγωγεῖς',
	'group-ipblock-exempt' => 'Ἀπαλλαγαὶ ὑπὸ φραγῆς τῆς IP',
	'group-rollbacker' => 'Μεταστροφεῖς',
	'group-transwiki' => 'Ὑπερδιαβικι-εισαγωγεῖς',
	'group-abusefilter-member' => 'μεταγραφεύς διηθητηρίων καταχρήσεων',
	'group-accountcreator-member' => 'ποιητὴς λογισμῶν',
	'group-autopatroller-member' => 'αὐτόματος περιπολητής',
	'group-autoreviewer-member' => 'αὐτόματος ἐπιθεωρητής',
	'group-bigexport-member' => 'μέγας ἐξαγωγεύς',
	'group-confirmed-member' => 'ἐπιβεβαιωθεὶς χρώμενος',
	'group-founder-member' => 'ἱδρυτής',
	'group-import-member' => 'εἰσαγωγεύς',
	'group-ipblock-exempt-member' => 'Ἀπαλλάσσειν ὑπὸ φραγῆς τῆς IP',
	'group-rollbacker-member' => 'μεταστροφεύς',
	'group-transwiki-member' => 'ὑπερδιαβικι-εισαγωγεύς',
	'grouppage-abusefilter' => '{{ns:project}}:Μεταγραφεῖς διηθητηρίων καταχρήσεων',
	'grouppage-accountcreator' => '{{ns:project}}:Ποιηταὶ λογισμῶν',
	'grouppage-autopatroller' => '{{ns:project}}:Αὐτόματοι περιποληταί',
	'grouppage-autoreviewer' => '{{ns:project}}:Αὐτόματοι ἐπιθεωρηταί',
	'grouppage-bigexport' => '{{ns:project}}:Μεγάλοι ἐξαγωγεῖς',
	'grouppage-confirmed' => '{{ns:project}}:Ἐπιβεβαιωθέντες χρώμενοι',
	'grouppage-founder' => '{{ns:project}}:Ἱδρυταί',
	'grouppage-import' => '{{ns:project}}:Εἰσαγωγεῖς',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Προνόμιον κλῄσεων IP',
	'grouppage-rollbacker' => '{{ns:project}}:Μεταστροφεῖς',
	'grouppage-transwiki' => '{{ns:project}}:Ὑπερδιαβικι-εισαγωγεῖς',
	'group-steward' => 'Φροντισταί',
	'group-sysadmin' => 'Ἐπίτροποι συστήματος',
	'group-Editinterface' => 'Διεπαφὴν μεταγράφειν',
	'group-Global_bot' => 'Καθολικὰ αὐτόματα',
	'group-Global_rollback' => 'Καθολικοί μεταστροφεῖς',
	'group-Ombudsmen' => 'Δέκται διαμαρτυριῶν',
	'group-Staff' => 'Στελέχη',
	'group-steward-member' => 'φροντιστής',
	'group-sysadmin-member' => 'ἐπίτροπος συστήματος',
	'group-Editinterface-member' => 'διεπαφὴν μεταγράφειν',
	'group-Global_bot-member' => 'καθολικὸν αὐτόματον',
	'group-Global_rollback-member' => 'καθολικὸς μεταστροφεύς',
	'group-Ombudsmen-member' => 'δέκτης διαμαρτυριῶν',
	'group-Staff-member' => 'στέλεχος',
	'group-coder' => 'Κωδικεύοντες',
	'group-coder-member' => 'κωδικεύς',
	'group-inactive' => 'Ἀνενεργοὶ χρώμενοι',
	'group-inactive-member' => 'ἀνενεργὸς χρώμενος',
	'grouppage-inactive' => '{{ns:project}}:Ἀνενεργοὶ χρώμενοι',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 * @author Melancholie
 */
$messages['gsw'] = array(
	'wikimediamessages-desc' => 'Wikimediaspezifischi Syschtemnochrichte',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Spenden',
	'sitesupport' => 'Finanzielli Hilf',
	'tooltip-n-sitesupport' => 'Unterstitz is',
	'group-abusefilter' => 'Missbruuchsfilter-Bearbeiter',
	'group-accountcreator' => 'Benutzerkonte-Aaleger',
	'group-autopatroller' => 'Automatischi Priefer',
	'group-autoreviewer' => 'Autoreviewer',
	'group-bigexport' => 'Großexporteur',
	'group-confirmed' => 'Bstätigti Benutzer',
	'group-founder' => 'Grinder',
	'group-import' => 'Importeur',
	'group-ipblock-exempt' => 'IP-Sperri-Usnahme',
	'group-rollbacker' => 'Zrucksetzer',
	'group-transwiki' => 'Transwiki-Importeur',
	'group-abusefilter-member' => 'Missbruuchsfilter-Bearbeiter',
	'group-accountcreator-member' => 'Benutzerkonte-Aaleger',
	'group-autopatroller-member' => 'Automatische Priefer',
	'group-autoreviewer-member' => 'Autoreviewer',
	'group-bigexport-member' => 'Großexporteur',
	'group-confirmed-member' => 'Bstätigte Benutzer',
	'group-founder-member' => 'Grinder',
	'group-import-member' => 'Importeur',
	'group-ipblock-exempt-member' => 'IP-Sperri-Usnahm',
	'group-rollbacker-member' => 'Zrucksetzer',
	'group-transwiki-member' => 'Transwiki-Importeur',
	'grouppage-abusefilter' => '{{ns:project}}:Missbruuchsfilter-Bearbeiter',
	'grouppage-accountcreator' => '{{ns:project}}:Benutzerkonte-Aaleger',
	'grouppage-autopatroller' => '{{ns:project}}:Automatischi Priefer',
	'grouppage-autoreviewer' => '{{ns:project}}:Autoreviewer',
	'grouppage-bigexport' => '{{ns:project}}:Großexporteur',
	'grouppage-confirmed' => '{{ns:project}}:Bstätigti Benutzer',
	'grouppage-founder' => '{{ns:project}}:Grinder',
	'grouppage-import' => '{{ns:project}}:Importeur',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-Sperri-Usnahm',
	'grouppage-rollbacker' => '{{ns:project}}:Zrucksetzer',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-Importeur',
	'group-steward' => 'Steward',
	'group-sysadmin' => 'Syschtemadminischtratore',
	'group-Editinterface' => 'Benutzeroberflächi bearbeite',
	'group-Global_bot' => 'Wältwyti Bötli',
	'group-Global_rollback' => 'Wältwyti Zrucksetzer',
	'group-Ombudsmen' => 'Ombudsmanne',
	'group-Staff' => 'Mitarbeiter',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'Syschtemadminischtrator',
	'group-Editinterface-member' => 'Benutzeroberflächi bearbeite',
	'group-Global_bot-member' => 'Wältwyt Bötli',
	'group-Global_rollback-member' => 'Wältwyte Zrucksetzer',
	'group-Ombudsmen-member' => 'Ombudsmann',
	'group-Staff-member' => 'Mitarbeiter',
	'group-coder' => 'Programmierer',
	'group-coder-member' => 'Programmierer',
	'group-inactive' => 'Inaktivi Benutzer',
	'group-inactive-member' => 'Inaktiver Benutzer',
	'grouppage-inactive' => '{{ns:project}}:Inactivi Benutzer',
	'wikimedia-copyright' => 'Tekscht isch verfiegbar unter dr <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.de">Creative Commons Attribution/Share-Alike License</a>; s cha syy, ass es zuesätzligi Bedingige git. Lueg d <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Nutzigsbedingige</a> fir Einzelheite.',
	'wikimedia-copyrightwarning' => 'Mit em Spychere stimmsch uuwiderrueflig zue, ass Dyyni Byytreg unter dr [http://creativecommons.org/licenses/by-sa/3.0/deed.de Creative Commons Attribution/Share-Alike License 3.0] un dr [http://www.gnu.org/copyleft/fdl.html GFDL] vereffentligt wäre. Du stimmsch zue, ass Du chasch zitiert wäre dur anderi Nutzer, zmindescht dur e Hyperlink oder URL zue dr Syte, wu du ebis byytrait hesch. Lueg d [http://wikimediafoundation.org/wiki/Terms_of_Use Nutzigsbedingige] fir Einzelheite.',
	'wikimedia-editpage-tos-summary' => 'Wänn du nit wit, ass des, was du gschribe hesch, vu andere bearbeitet un wyter verbreitet wird, no stell Dyy Byytrag nit do yyne. Wänn Du s nit sälber gschribe hesch, muess es verfiegbar syy unter Bedingige, wu zue dr [http://wikimediafoundation.org/wiki/Terms_of_Use Nutzigsbedingige] passe, un Du stimmsch zue, ass Du alli erforderlige Lizänz-Aaforderige yyhaltsch.',
);

/** Gujarati (ગુજરાતી)
 * @author Aksi great
 * @author Dsvyas
 * @author לערי ריינהארט
 */
$messages['gu'] = array(
	'sitesupport' => 'દાન',
	'tooltip-n-sitesupport' => 'અમારું સમર્થન કરો',
);

/** Manx (Gaelg)
 * @author MacTire02
 */
$messages['gv'] = array(
	'sitesupport' => 'Toyrtyssyn',
	'tooltip-n-sitesupport' => 'Cooin lhien',
	'group-Staff' => 'Fwirran',
	'group-Staff-member' => 'oltey fwirran',
);

/** Hakka (Hak-kâ-fa)
 * @author Hakka
 */
$messages['hak'] = array(
	'sitesupport' => 'Chan-chhu',
	'tooltip-n-sitesupport' => 'Chṳ̂-chhu',
);

/** Hawaiian (Hawai`i)
 * @author Singularity
 */
$messages['haw'] = array(
	'sitesupport' => 'E lūlū mai',
	'tooltip-n-sitesupport' => 'Kāko‘o mai',
	'group-steward' => 'Nā kuene',
	'group-steward-member' => 'Kuene',
);

/** Hebrew (עברית)
 * @author Rotem Liss
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'wikimediamessages-desc' => 'הודעות המיוחדות לוויקימדיה',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/תרומות',
	'sitesupport' => 'תרומות',
	'tooltip-n-sitesupport' => 'תרומה',
	'group-abusefilter' => 'עורכי מסנן ההשחתה',
	'group-accountcreator' => 'יוצרי חשבונות',
	'group-autopatroller' => 'בודקי עריכות אוטומטית',
	'group-autoreviewer' => 'בוחני עריכות אוטומטית',
	'group-bigexport' => 'מבצעי ייצוא גדול',
	'group-confirmed' => 'משתמשים מאומתים',
	'group-founder' => 'מייסדים',
	'group-import' => 'מייבאים',
	'group-ipblock-exempt' => 'חסיני חסימות IP',
	'group-rollbacker' => 'משחזרים',
	'group-transwiki' => 'מייבאים בין־אתריים',
	'group-abusefilter-member' => 'עורך מסנן ההשחתה',
	'group-accountcreator-member' => 'יוצר חשבונות',
	'group-autopatroller-member' => 'בודק עריכות אוטומטית',
	'group-autoreviewer-member' => 'בוחן עריכות אוטומטית',
	'group-bigexport-member' => 'מבצע ייצוא גדול',
	'group-confirmed-member' => 'משתמש מאומת',
	'group-founder-member' => 'מייסד',
	'group-import-member' => 'מייבא',
	'group-ipblock-exempt-member' => 'חסין חסימות IP',
	'group-rollbacker-member' => 'משחזר',
	'group-transwiki-member' => 'מייבא בין־אתרי',
	'grouppage-abusefilter' => '{{ns:project}}:עורך מסנן ההשחתה',
	'grouppage-accountcreator' => '{{ns:project}}:יוצר חשבונות',
	'grouppage-autopatroller' => '{{ns:project}}:בודק עריכות אוטומטית',
	'grouppage-autoreviewer' => '{{ns:project}}:בוחן עריכות אוטומטית',
	'grouppage-bigexport' => '{{ns:project}}:מבצע ייצוא גדול',
	'grouppage-confirmed' => '{{ns:project}}:משתמש מאומת',
	'grouppage-founder' => '{{ns:project}}:מייסד',
	'grouppage-import' => '{{ns:project}}:מייבא',
	'grouppage-ipblock-exempt' => '{{ns:project}}:חסין חסימות IP',
	'grouppage-rollbacker' => '{{ns:project}}:משחזר',
	'grouppage-transwiki' => '{{ns:project}}:מייבא בין-אתרי',
	'group-steward' => 'דיילים',
	'group-sysadmin' => 'מנהלי מערכת',
	'group-Editinterface' => 'עורכי הממשק',
	'group-Global_bot' => 'בוטים גלובליים',
	'group-Global_rollback' => 'משחזרים גלובליים',
	'group-Ombudsmen' => 'נציבי תלונות הציבור',
	'group-Staff' => 'אנשי צוות',
	'group-steward-member' => 'דייל',
	'group-sysadmin-member' => 'מנהל מערכת',
	'group-Editinterface-member' => 'עורך הממשק',
	'group-Global_bot-member' => 'בוט גלובלי',
	'group-Global_rollback-member' => 'משחזר גלובלי',
	'group-Ombudsmen-member' => 'נציב תלונות הציבור',
	'group-Staff-member' => 'איש צוות',
	'group-coder' => 'מתכנתים',
	'group-coder-member' => 'מתכנת',
	'group-inactive' => 'משתמשים בלתי פעילים',
	'group-inactive-member' => 'משתמש בלתי פעיל',
	'grouppage-inactive' => '{{ns:project}}:משתמש בלתי פעיל',
	'shared-repo-name-shared' => 'ויקישיתוף',
	'wikimedia-copyright' => 'הטקסט מוגש בכפוף לרישיון <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.he">Creative Commons ייחוס-שיתוף זהה 3.0</a>; ייתכן שיש תנאים נוספים. ראו <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">תנאי שימוש</a> לפרטים.',
	'wikimedia-copyrightwarning' => 'בשמירת הדף, הנכם מסכימים באופן סופי לשחרר את תרומתכם בכפוף לרישיון [http://creativecommons.org/licenses/by-sa/3.0/deed.he Creative Commons ייחוס-שיתוף זהה 3.0] ולרישיון [http://www.gnu.org/copyleft/fdl.html GFDL]. הנכם מסכימים לכך שמשתמשים נוספים יתנו לפחות קישור או כתובת URL לדף שאתם תורמים לו. ראו [http://wikimediafoundation.org/wiki/Terms_of_Use תנאי שימוש] לפרטים.',
	'wikimedia-editpage-tos-summary' => 'אם אינכם רוצים שעריכתכם תיערך ותופץ מחדש, אל תפרסמו אותה כאן. אם לא כתבתם אותה בעצמכם, היא חייבת להיות זמינה בתנאים התואמים ל[http://wikimediafoundation.org/wiki/Terms_of_Use תנאי השימוש], והנכם חייבים לפעול לפי כל הדרישות הרלוונטיות ברישיון החל עליה.',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 * @author לערי ריינהארט
 * @author आलोक
 */
$messages['hi'] = array(
	'wikimediamessages-desc' => 'विशिष्ट रूप से विकिमीडिया के संदेश',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/Now/hi?utm_source=donate&utm_medium=sidebar&utm_campaign=spontaneous_donation',
	'sitesupport' => 'दान',
	'tooltip-n-sitesupport' => 'हमें सहायता दें',
	'group-abusefilter' => 'दुरुपयोग छननी संपादक',
	'group-accountcreator' => 'खाता निर्माता',
	'group-autopatroller' => 'स्वचालित निगरानी करने वाले',
	'group-autoreviewer' => 'स्वचालित समीक्षक',
	'group-bigexport' => 'बड़े निर्यातक',
	'group-confirmed' => 'पुष्टट सदस्य',
	'group-founder' => 'संस्थापक',
	'group-import' => 'आयातक',
	'group-ipblock-exempt' => 'आईपी अवरोध मुक्त',
	'group-rollbacker' => 'वापस पुरानी स्थिति में लाने वाले',
	'group-transwiki' => 'विकियों के बीच आयात करने वाले',
	'group-abusefilter-member' => 'दुरुपयोग छननी संपादक',
	'group-accountcreator-member' => 'खाता निर्माता',
	'group-autopatroller-member' => 'स्वचालित निगरानी रखने वाले',
	'group-autoreviewer-member' => 'स्वचालित समीक्षक',
	'group-bigexport-member' => 'बड़ा निर्यातक',
	'group-confirmed-member' => 'पुष्ट सदस्य',
	'group-founder-member' => 'संस्थापक',
	'group-import-member' => 'आयातक',
	'group-ipblock-exempt-member' => 'आईपी पता अवरोध मुक्त',
	'group-rollbacker-member' => 'वापस पुरानी स्थिति पर लाने वाला',
	'group-transwiki-member' => 'अंतर-विकि आयातक',
	'grouppage-abusefilter' => '{{ns:project}}:दुरुपयोग छननी संपादक',
	'grouppage-accountcreator' => '{{ns:project}}:खाता निर्माता',
	'grouppage-autopatroller' => '{{ns:project}}:स्वचालित निगरानी रखने वाले',
	'grouppage-autoreviewer' => '{{ns:project}}:स्वचालित समीक्षक',
	'grouppage-bigexport' => '{{ns:project}}:बड़े निर्यातक',
	'grouppage-confirmed' => '{{ns:project}}:पुष्ट सदस्य',
	'grouppage-founder' => '{{ns:project}}:संस्थापक',
	'grouppage-import' => '{{ns:project}}:आयातक',
	'grouppage-ipblock-exempt' => '{{ns:project}}:आईपी अवरोध मुक्त',
	'grouppage-rollbacker' => '{{ns:project}}:वापस पुरानी स्थिति पर लाने वाले',
	'grouppage-transwiki' => '{{ns:project}}:अंतर-विकि आयातक',
	'group-steward' => 'परिचालक',
	'group-sysadmin' => 'प्रणाली प्रशासक',
	'group-Editinterface' => 'अंतरापृष्ठ संपादक',
	'group-Global_bot' => 'वैश्विक यंत्र',
	'group-Global_rollback' => 'वैश्विक पुरानी स्थित पर लाने वाले',
	'group-Ombudsmen' => 'लोक आयुक्त',
	'group-Staff' => 'कर्मचारी',
	'group-Staff-member' => 'स्टाफ़ सदस्य',
);

/** Fiji Hindi (Latin) (Fiji Hindi (Latin))
 * @author Girmitya
 * @author Thakurji
 */
$messages['hif-latn'] = array(
	'wikimediamessages-desc' => 'Wikimedia specific sandes',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Daan',
	'tooltip-n-sitesupport' => 'Ham log ke sahara do',
	'group-abusefilter' => 'Abuse filter ke badle waala',
	'group-accountcreator' => 'Account ke banae waala',
	'group-autopatroller' => 'Autopatrollers',
	'group-autoreviewer' => 'Autoreviewers',
	'group-bigexport' => 'Barraa exporters',
	'group-founder' => 'Founders',
	'group-import' => 'Importers',
	'group-ipblock-exempt' => 'IP block exemptions',
	'group-rollbacker' => 'Rollbackers',
	'group-transwiki' => 'Transwiki importers',
	'group-abusefilter-member' => 'abuse filter ke badle waala',
	'group-accountcreator-member' => 'account creator',
	'group-autopatroller-member' => 'autopatroller',
	'group-autoreviewer-member' => 'autoreviewer',
	'group-bigexport-member' => 'barraa exporter',
	'group-founder-member' => 'founder',
	'group-import-member' => 'importer',
	'group-ipblock-exempt-member' => 'IP block exempt',
	'group-rollbacker-member' => 'rollbacker',
	'group-transwiki-member' => 'transwiki importer',
	'grouppage-abusefilter' => '{{ns:project}}:Abuse filter ke badle waala',
	'grouppage-accountcreator' => '{{ns:project}}:Account creators',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrollers',
	'grouppage-bigexport' => '{{ns:project}}:Barraa exporter kare waala',
	'grouppage-founder' => '{{ns:project}}:Founders',
	'grouppage-import' => '{{ns:project}}:Importers',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP block exemption',
	'grouppage-rollbacker' => '{{ns:project}}:Rollbackers',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki importers',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'System administrators',
	'group-Global_bot' => 'Global bots',
	'group-Global_rollback' => 'Global rollbackers',
	'group-Ombudsmen' => 'Ombudsmen',
	'group-Staff' => 'Message definition (Wikimedia Messages)Staffs',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'system administrator',
	'group-Global_bot-member' => 'global bot',
	'group-Global_rollback-member' => 'global rollbacker',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'staff',
	'group-coder' => 'Coders',
	'group-coder-member' => 'coder',
	'group-inactive' => 'Sadasya jon ki abhi haali koi edit nai karis hai',
	'group-inactive-member' => 'Sadasya jon ki abhi haali ekko edit nai karis hai',
	'grouppage-inactive' => '{{ns:project}}:Sadasya jon ki abhi haali ekko edit nai karin hai',
);

/** Hiligaynon (Ilonggo)
 * @author Jose77
 * @author Kguirnela
 * @author Tagimata
 */
$messages['hil'] = array(
	'wikimediamessages-desc' => 'ang ginatukoy nga mensahe sang Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/Now/en?utm_source=donate&utm_medium=sidebar&utm_campaign=spontaneous_donation',
	'sitesupport' => 'Donasyon',
	'tooltip-n-sitesupport' => 'Sakdaga kami',
	'group-abusefilter' => 'Abusar sala editor',
	'group-accountcreator' => 'Mga Gahimo Akawnt',
	'group-autopatroller' => 'Mga AutoBantay',
	'group-autoreviewer' => 'Autorebyuwer',
	'group-bigexport' => 'Mga Dagkong eksporter',
	'group-confirmed' => 'Ginsugtan nga mga user',
	'group-founder' => 'Mga Nagpatukod',
	'group-import' => 'Mga Nagakuha sa Guha',
	'group-ipblock-exempt' => 'IP eksempted harangan',
	'group-rollbacker' => 'Mga Ginabalik',
	'group-transwiki' => 'Mga Transwiki nga Gakuha sa guha',
	'group-abusefilter-member' => 'abusar nga pagsala editor',
	'group-accountcreator-member' => 'nagapanghimo account',
	'group-autopatroller-member' => 'autobantay',
	'group-autoreviewer-member' => 'autorebyuwer',
	'group-bigexport-member' => 'daku nga gadala paguha',
	'group-confirmed-member' => 'ginpasugtan nga user',
	'group-founder-member' => 'nagpatukod',
	'group-import-member' => 'gapasulod',
	'group-ipblock-exempt-member' => 'IP eksemptado harang',
	'group-rollbacker-member' => 'manugbalik',
	'group-transwiki-member' => 'transwiki gapasulod',
	'grouppage-abusefilter' => '{{ns:project}}:Abusar manugsala nga mga editor',
	'grouppage-accountcreator' => '{{ns:project}}:Mga gahimo Account',
	'grouppage-autopatroller' => '{{ns:project}}:Autobantay',
	'grouppage-autoreviewer' => '{{ns:project}}:Autorebyuwer',
	'grouppage-bigexport' => '{{ns:project}}:Daku nga mga gapaguha',
	'grouppage-confirmed' => '{{ns:project}}:Ginpasugtan nga mga user',
	'grouppage-founder' => '{{ns:project}}:Mga Nagpatukod',
	'grouppage-import' => '{{ns:project}}:Mga Gapasulod',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP harang eksempsiyon',
	'grouppage-rollbacker' => '{{ns:project}}:Mga Manugbalik',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki nga mga gapasulod',
	'group-steward' => 'Manugtago',
	'group-sysadmin' => 'Mga Sistema administrador',
	'group-Editinterface' => 'Mga ga-ilis sang interface',
	'group-Global_bot' => 'Kalibutan bots',
	'group-Global_rollback' => 'Kalibutan manugbalik',
	'group-Ombudsmen' => 'Mga Ombudsman',
	'group-Staff' => 'Mga Gabulig',
	'group-steward-member' => 'manughalong',
	'group-sysadmin-member' => 'sistema administrador',
	'group-Editinterface-member' => 'Mga ga-ilis sang interface',
	'group-Global_bot-member' => 'kalibutan bot',
	'group-Global_rollback-member' => 'kalibutan manugbalik',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'gabulig',
	'group-coder' => 'Koders',
	'group-coder-member' => 'koder',
	'group-inactive' => 'Di-aktibo nga mga user',
	'group-inactive-member' => 'di-aktibo nga user',
	'grouppage-inactive' => '{{ns:project}}:Di-aktibo nga mga user',
	'wikimedia-copyright' => 'Ang teksto ay pwede mo makit-an sa idalum sang <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a>;
nanga-dugang nga kasulatan pwede man pagabatunon. Palihog lang bisita sa<a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Terms of Use</a> para sa madamu nga detalye.',
	'wikimedia-copyrightwarning' => 'Kung ini ipasulod nimo, nagapasugot ka nga ipagalapta ang imo kontribusyon nga naga pai-dalum sa [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] kag ang [http://www.gnu.org/copyleft/fdl.html GFDL].
Nagapasugot ka nga kilalanon sa mga nagagamit liwat, sa pinaka kubos, nga nagapamaagi sa hyperlink o URL sa pahina nga gina kontribyut mo.
Palihog lang bisita sa [http://wikimediafoundation.org/wiki/Terms_of_Use Terms of Use] para sa madamu nga detalye.',
	'wikimedia-editpage-tos-summary' => 'Kung indi mo gusto nga ang imo gina sulat ma islan kag palaptahon sa imo pagkinagusto, indi pag ipadala diri.
Kung indi kag nagsulat sini sa imo kaugalingon, kilanlan nga para ina sa tanan nga naga sunod upod sa [http://wikimediafoundation.org/wiki/Terms_of_Use Terms of Use], kag naga sugot ka nga magpati sa lisensyang kilanlanon.',
);

/** Croatian (Hrvatski)
 * @author CERminator
 * @author Dalibor Bosits
 * @author SpeedyGonsales
 * @author Suradnik13
 */
$messages['hr'] = array(
	'wikimediamessages-desc' => 'Posebne poruke Wikimedije',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donacije',
	'sitesupport' => 'Novčani prilozi',
	'tooltip-n-sitesupport' => 'Podržite nas',
	'group-abusefilter' => 'Urednici filtra zloporaba',
	'group-accountcreator' => 'Otvaratelji računa',
	'group-autopatroller' => 'Automatski patrolirani',
	'group-autoreviewer' => 'Samoocjenjivači',
	'group-bigexport' => 'Veliki izvoznici',
	'group-confirmed' => 'Potvrđeni suradnici',
	'group-founder' => 'Osnivači',
	'group-import' => 'Unositelji',
	'group-ipblock-exempt' => 'IP blok iznimke',
	'group-rollbacker' => 'Uklonitelji',
	'group-transwiki' => 'Međuwiki unositelji',
	'group-abusefilter-member' => 'urednik filtra zloporaba',
	'group-accountcreator-member' => 'otvaratelj računa',
	'group-autopatroller-member' => 'automatski patroliran',
	'group-autoreviewer-member' => 'samoocjenjivač',
	'group-bigexport-member' => 'veliki izvoznik',
	'group-confirmed-member' => 'potvrđeni suradnik',
	'group-founder-member' => 'osnivač',
	'group-import-member' => 'unositelj',
	'group-ipblock-exempt-member' => 'IP blok iznimka',
	'group-rollbacker-member' => 'uklonitelj',
	'group-transwiki-member' => 'međuwiki unositelj',
	'grouppage-abusefilter' => '{{ns:project}}:Urednici filtra zloporaba',
	'grouppage-accountcreator' => '{{ns:project}}:Otvaratelji računa',
	'grouppage-autopatroller' => '{{ns:project}}:Automatski patrolirani',
	'grouppage-autoreviewer' => '{{ns:project}}:Samoocjenjivači',
	'grouppage-bigexport' => '{{ns:project}}:Veliki izvoznici',
	'grouppage-confirmed' => '{{ns:project}}:Potvrđeni suradnici',
	'grouppage-founder' => '{{ns:project}}:Osnivači',
	'grouppage-import' => '{{ns:project}}:Unositelji',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP blok iznimka',
	'grouppage-rollbacker' => '{{ns:project}}:Uklonitelji',
	'grouppage-transwiki' => '{{ns:project}}:Međuwiki unositelji',
	'group-steward' => 'Stjuardi',
	'group-sysadmin' => 'Sistem administratori',
	'group-Editinterface' => 'Uređivači sučelja',
	'group-Global_bot' => 'Globalni bot',
	'group-Global_rollback' => 'Globalni uklonitelji',
	'group-Ombudsmen' => 'Ombudsman',
	'group-Staff' => 'Osoblje',
	'group-steward-member' => 'Stjuard',
	'group-sysadmin-member' => 'sistem administrator',
	'group-Editinterface-member' => 'urednik sučelja',
	'group-Global_bot-member' => 'globalni bot',
	'group-Global_rollback-member' => 'globalni uklonitelj',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'član osoblja',
	'grouppage-steward' => '{{ns:project}}:Stjuardi',
	'group-coder' => 'Programeri',
	'group-coder-member' => 'programer',
	'group-inactive' => 'Neaktivni suradnici',
	'group-inactive-member' => 'neaktivan suradnik',
	'grouppage-inactive' => '{{ns:project}}:Neaktivni suradnici',
	'wikimedia-copyright' => 'Tekst je dostupan pod licencijom <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike</a>; dodatni uvjeti se mogu primjenjivati. Pogledajte <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Uvjete korištenja</a> za detalje.',
	'wikimedia-copyrightwarning' => 'Pritiskom na "sačuvaj stranicu", neopozivo ste suglasni da svoje doprinose dajte pod uvjetima iz licencije [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] i [http://www.gnu.org/copyleft/fdl.html GFDL]. Slažete se da ćete biti naznačeni kao autor od strane korisnika najmanje preko poveznice ili URL-a na stranicu na kojoj ste doprinosili. Pogledajte [http://wikimediafoundation.org/wiki/Terms_of_Use Uvjete korištenja] za detalje.',
	'wikimedia-editpage-tos-summary' => 'Ukoliko ne želite da se vaš tekst nemilosrdno uređuje i slobodno raspačava, nemojte ga slati ovdje. Ako ovo niste sami napisali, tada ovaj tekst mora biti dostupan pod uvjetima koji su u skladu s [http://wikimediafoundation.org/wiki/Terms_of_Use Uvjetima korištenja], a vi se suglasni da slijedite sve odgovarajuće uvjete licenciranja.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'wikimediamessages-desc' => 'Specifiske zdźělenki Wikimedije',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/hsb',
	'sitesupport' => 'Dary',
	'tooltip-n-sitesupport' => 'Podpěrajće nas',
	'group-abusefilter' => 'Wobdźěłarjo za znjewužiwanske filtry',
	'group-accountcreator' => 'Kontowi załožerjo',
	'group-autopatroller' => 'Awtomatiscy dohladowarjo',
	'group-autoreviewer' => 'Awtomatiscy kontrolerojo',
	'group-bigexport' => 'Wulkowuwožowarjo',
	'group-confirmed' => 'Wobkrućeni wužiwarjo',
	'group-founder' => 'Załožerjo',
	'group-import' => 'Importerojo',
	'group-ipblock-exempt' => 'Wuwzaća z blokowanja IP',
	'group-rollbacker' => 'Wróćostajerjo',
	'group-transwiki' => 'Transwiki importerojo',
	'group-abusefilter-member' => 'wobdźěłar za znjewužiwanski filter',
	'group-accountcreator-member' => 'Kontowe załožer',
	'group-autopatroller-member' => 'awtomatiski dohladowar',
	'group-autoreviewer-member' => 'awtomatiski kontroler',
	'group-bigexport-member' => 'wulkowuwožowar',
	'group-confirmed-member' => 'wobkrućeny wužiwar',
	'group-founder-member' => 'załožer',
	'group-import-member' => 'importer',
	'group-ipblock-exempt-member' => 'Z blokowanja IP wuwzaty',
	'group-rollbacker-member' => 'wróćostajer',
	'group-transwiki-member' => 'transwiki importer',
	'grouppage-abusefilter' => '{{ns:project}}:Wobdźěłarjo za njewužiwanske filtry',
	'grouppage-accountcreator' => '{{ns:project}}:Kontowi załožerjo',
	'grouppage-autopatroller' => '{{ns:project}}:Awtomatiscy dohladowarjo',
	'grouppage-autoreviewer' => '{{ns:project}}:Awtomatiscy kontrolerojo',
	'grouppage-bigexport' => '{{ns:project}}:Wulkowuwožowarjo',
	'grouppage-confirmed' => '{{ns:project}}:Wobkrućeni wužiwarjo',
	'grouppage-founder' => '{{ns:project}}:Załožerjo',
	'grouppage-import' => '{{ns:project}}:Importerojo',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Wuwzaće z blokowanja IP',
	'grouppage-rollbacker' => '{{ns:project}}:Wróćostajerjo',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki importerojo',
	'group-steward' => 'Stewardźa',
	'group-sysadmin' => 'Systemowi administratorojo',
	'group-Editinterface' => 'Wužiwarski powjerch wobdźěłać',
	'group-Global_bot' => 'Globalne boćiki',
	'group-Global_rollback' => 'Globalni wróćostajerjo',
	'group-Ombudsmen' => 'Ombudsnicy',
	'group-Staff' => 'Sobudźěłaćerjo',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'systemowy administrator',
	'group-Editinterface-member' => 'wužiwarski powjerch wobdźěłać',
	'group-Global_bot-member' => 'globalny boćik',
	'group-Global_rollback-member' => 'globalny wróćostajer',
	'group-Ombudsmen-member' => 'ombudsnik',
	'group-Staff-member' => 'sobudźěłaćerjo',
	'group-coder' => 'Programowarjo',
	'group-coder-member' => 'programowar',
	'group-inactive' => 'Njeaktiwni wužiwarjo',
	'group-inactive-member' => 'njeaktiwny wužiwar',
	'grouppage-inactive' => '{{ns:project}}:Njeaktiwni wužiwarjo',
	'wikimedia-copyright' => 'Tekst steji pod <a href="http://creativecommons.org/licenses/by-sa/3.0/">licencu Creative Commons Attribution/Share-Alike</a> k dispoziciji; přidatne wuměnjenja hodźa so nałožować. Hlej <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Wužiwanske wuměnjenja</a> za podrobnosće.',
	'wikimedia-copyrightwarning' => 'Ze składowanjom definitiwnje stajiš swój přinošk pod [http://creativecommons.org/licenses/by-sa/3.0/ licencu Creative Commons Attribution/Share-Alike 3.0] a [http://www.gnu.org/copyleft/fdl.html GFDL].
Sy přezjedny, zo dalši wužiwarjo stronu, kotruž sy přinošował, znajmjeńša přez wotkaz abo URL připóznawaja. 
Hlej [http://wikimediafoundation.org/wiki/Terms_of_Use wužiwanske wuměnjenja] za podrobnosće.',
	'wikimedia-editpage-tos-summary' => 'Jeli nochceš, zo so twój tekst po dobrozdaću wobdźěłuje a rozdźěluje, da njewozjew jón tu. Jeli njejsy jón sam spisał, dyrbi pod wuměnjenjemi k dispoziciji stać, kotrež su přezjedne z [http://wikimediafoundation.org/wiki/Terms_of_Use wužiwanskimi wuměnjenjemi] a přihłosuješ so po wotpowědnych licencnych žadanjach měć.',
);

/** Haitian (Kreyòl ayisyen)
 * @author Masterches
 */
$messages['ht'] = array(
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Fè yon don',
	'tooltip-n-sitesupport' => 'Soutni pwojè a',
);

/** Hungarian (Magyar)
 * @author Bdamokos
 * @author Dani
 * @author Glanthor Reviol
 * @author Tgr
 */
$messages['hu'] = array(
	'wikimediamessages-desc' => 'Wikimedia-specifikus üzenetek',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/hu',
	'sitesupport' => 'Adományok',
	'tooltip-n-sitesupport' => 'Támogatás',
	'group-abusefilter' => 'vandálszűrő-szerkesztők',
	'group-accountcreator' => 'fióklétrehozók',
	'group-autopatroller' => 'automatikus járőrök',
	'group-autoreviewer' => 'automatikusan megtekintők',
	'group-bigexport' => 'nagy mennyiségben exportálók',
	'group-confirmed' => 'megerősített szerkesztők',
	'group-founder' => 'alapítók',
	'group-import' => 'importálók',
	'group-ipblock-exempt' => 'IP-blokkok alól mentesülők',
	'group-rollbacker' => 'visszaállítók',
	'group-transwiki' => 'wikiközi importálók',
	'group-abusefilter-member' => 'vandálszűrő-szerkesztő',
	'group-accountcreator-member' => 'fióklétrehozó',
	'group-autopatroller-member' => 'automatikus járőr',
	'group-autoreviewer-member' => 'automatikusan megtekintő',
	'group-bigexport-member' => 'nagy mennyiségben exportáló',
	'group-confirmed-member' => 'megerősített szerkesztő',
	'group-founder-member' => 'alapító',
	'group-import-member' => 'importáló',
	'group-ipblock-exempt-member' => 'IP-blokkok alól mentesülő',
	'group-rollbacker-member' => 'visszaállító',
	'group-transwiki-member' => 'wikiközi importáló',
	'grouppage-abusefilter' => '{{ns:project}}:Vandálszűrő-szerkesztők',
	'grouppage-accountcreator' => '{{ns:project}}:Fióklétrehozók',
	'grouppage-autopatroller' => '{{ns:project}}:Automatikus járőrök',
	'grouppage-autoreviewer' => '{{ns:project}}:Automatikusan megtekintők',
	'grouppage-bigexport' => '{{ns:project}}:Nagy mennyiségben exportálók',
	'grouppage-confirmed' => '{{ns:project}}:Megerősített szerkesztők',
	'grouppage-founder' => '{{ns:project}}:Alapítók',
	'grouppage-import' => '{{ns:project}}:Importálók',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Mentesülés az IP-blokkok alól',
	'grouppage-rollbacker' => '{{ns:project}}:Visszaállítók',
	'grouppage-transwiki' => '{{ns:project}}:Wikiközi importálók',
	'group-steward' => 'helytartók',
	'group-sysadmin' => 'rendszeradminisztrátorok',
	'group-Editinterface' => 'felületszerkesztők',
	'group-Global_bot' => 'globális botok',
	'group-Global_rollback' => 'globális visszaállítók',
	'group-Ombudsmen' => 'ombudsmanok',
	'group-Staff' => 'személyzet',
	'group-steward-member' => 'helytartó',
	'group-sysadmin-member' => 'rendszeradminisztrátor',
	'group-Editinterface-member' => 'felületszerkesztő',
	'group-Global_bot-member' => 'globális bot',
	'group-Global_rollback-member' => 'globális visszaállító',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'személyzeti tag',
	'grouppage-steward' => '{{ns:project}}:Helytartók',
	'group-coder' => 'programozók',
	'group-coder-member' => 'programozó',
	'group-inactive' => 'inaktív szerkesztők',
	'group-inactive-member' => 'inaktív szerkesztő',
	'grouppage-inactive' => '{{ns:project}}:Inaktív szerkesztők',
	'shared-repo-name-shared' => 'Wikimedia Commons',
	'wikimedia-copyright' => 'A lap szövege <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.hu">Creative Commons Nevezd meg! – Így add tovább! 3.0</a> licenc alatt van; egyes esetekben más módon is felhasználható. Részletekért lásd a <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">felhasználási feltételeket</a>.',
	'wikimedia-copyrightwarning' => 'A szöveg elküldésével visszavonhatatlan engedélyt adsz annak felhasználására a [http://creativecommons.org/licenses/by-sa/3.0/deed.hu Creative Commons Nevezd meg! – Így add tovább! 3.0] licenc és – ha magad írtad – a [http://www.gnu.org/copyleft/fdl.htm GFDL] szerint, és elfogadod, hogy az újrafelhasználóknak elég közvetve, a wikioldalra mutató linken vagy URL-en keresztül hivatkozniuk rád.  Részletesebben lásd a [http://wikimediafoundation.org/wiki/Terms_of_Use felhasználási feltételekben].',
	'wikimedia-editpage-tos-summary' => 'Ha nem akarod, hogy az írásodat könyörtelenül átszerkesszék vagy tetszés szerint terjesszék, ne küldd be! Ha nem te írtad, a [http://wikimediafoundation.org/wiki/Terms_of_Use felhasználási feltételekkel] összeférő engedéllyel kell rendelkezned a beküldésére, és be kell tartanod az összes releváns licenckövetelményt.',
);

/** Armenian (Հայերեն)
 * @author Teak
 */
$messages['hy'] = array(
	'sitesupport' => 'Դրամական նվիրատվություն',
);

/** Interlingua (Interlingua)
 * @author Malafaya
 * @author McDutchie
 */
$messages['ia'] = array(
	'wikimediamessages-desc' => 'Messages specific de Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/ia',
	'sitesupport' => 'Donationes',
	'tooltip-n-sitesupport' => 'Sustene nos',
	'group-abusefilter' => 'Modificatores del filtros anti-abuso',
	'group-accountcreator' => 'Creatores de contos',
	'group-autopatroller' => 'Autopatruliatores',
	'group-autoreviewer' => 'Autorevisores',
	'group-bigexport' => 'Grande exportatores',
	'group-confirmed' => 'Usatores confirmate',
	'group-founder' => 'Fundatores',
	'group-import' => 'Importatores',
	'group-ipblock-exempt' => 'Exemptiones de blocos IP',
	'group-rollbacker' => 'Revertitores',
	'group-transwiki' => 'Importatores transwiki',
	'group-abusefilter-member' => 'modificator del filtros anti-abuso',
	'group-accountcreator-member' => 'Creator de contos',
	'group-autopatroller-member' => 'autopatruliator',
	'group-autoreviewer-member' => 'autorevisor',
	'group-bigexport-member' => 'grande exportator',
	'group-confirmed-member' => 'usator confirmate',
	'group-founder-member' => 'Fundator',
	'group-import-member' => 'Importator',
	'group-ipblock-exempt-member' => 'Exemption de bloco IP',
	'group-rollbacker-member' => 'Revertitor',
	'group-transwiki-member' => 'Importator transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Modificatores del filtros anti-abuso',
	'grouppage-accountcreator' => '{{ns:project}}:Creatores de contos',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatruliatores',
	'grouppage-autoreviewer' => '{{ns:project}}:Autorevisores',
	'grouppage-bigexport' => '{{ns:project}}:Grande exportatores',
	'grouppage-confirmed' => '{{ns:project}}:Usatores confirmate',
	'grouppage-founder' => '{{ns:project}}:Fundatores',
	'grouppage-import' => '{{ns:project}}:Importatores',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Exemption de blocos IP',
	'grouppage-rollbacker' => '{{ns:project}}:Revertitores',
	'grouppage-transwiki' => '{{ns:project}}:Importatores transwiki',
	'group-steward' => 'Stewardes',
	'group-sysadmin' => 'Administratores de systema',
	'group-Editinterface' => 'Modificar interfacie',
	'group-Global_bot' => 'Bots global',
	'group-Global_rollback' => 'Revocatores global',
	'group-Ombudsmen' => 'Mediatores',
	'group-Staff' => 'Personal',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'administrator de systema',
	'group-Editinterface-member' => 'modificar interfacie',
	'group-Global_bot-member' => 'bot global',
	'group-Global_rollback-member' => 'revocator global',
	'group-Ombudsmen-member' => 'mediator',
	'group-Staff-member' => 'Membro del personal',
	'group-coder' => 'Programmatores',
	'group-coder-member' => 'programmator',
	'grouppage-coder' => 'Project:Programmator',
	'group-inactive' => 'Usatores inactive',
	'group-inactive-member' => 'usator inactive',
	'grouppage-inactive' => '{{ns:project}}:Usatores inactive',
	'wikimedia-copyright' => 'Le texto es disponibile sub le <a href="http://creativecommons.org/licenses/by-sa/3.0/"> licentia Creative Commons Attribution/Share-Alike</a>; additional conditiones pote esser in vigor. Vide <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Conditiones de uso</a> pro detalios.',
	'wikimedia-copyrightwarning' => 'Per contribuer, tu consenti al publication irrevocabile de tu contribution sub le [http://creativecommons.org/licenses/by-sa/3.0/ licentia Creative Commons Attribution/Share-Alike 3.0] e sub le [http://www.gnu.org/copyleft/fdl.html GFDL]. Tu consenti a esser recognoscite per re-usatores, al minimo, per medio de un hyperligamine o un adresse URL verso le articulo continente tu contribution. Vide le [http://wikimediafoundation.org/wiki/Terms_of_Use Conditiones de uso] pro detalios.',
	'wikimedia-editpage-tos-summary' => 'Si tu non vole que tu scripto sia modificate e redistribuite a voluntate, alora non submitte lo hic. Si tu non es le autor de isto, le contribution debe ja esser disponibile sub conditiones compatibile con le [http://wikimediafoundation.org/wiki/Terms_of_Use Conditiones de uso], e tu consenti a obedir a omne relevante requisitos de licentia.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author IvanLanin
 * @author Rex
 */
$messages['id'] = array(
	'wikimediamessages-desc' => 'Pesan-pesan spesifik Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Penggalangan_dana',
	'sitesupport' => 'Menyumbang',
	'tooltip-n-sitesupport' => 'Dukung kami',
	'group-abusefilter' => 'Editor filter penyalahgunaan',
	'group-accountcreator' => 'Pembuat akun',
	'group-autopatroller' => 'Patroli otomatis',
	'group-autoreviewer' => 'Autotinjau',
	'group-bigexport' => 'Eksportir besar',
	'group-confirmed' => 'Pengguna terkonfirmasi',
	'group-founder' => 'Pendiri',
	'group-import' => 'Importir',
	'group-ipblock-exempt' => 'Pengecualian pemblokiran IP',
	'group-rollbacker' => 'Pengembali revisi',
	'group-transwiki' => 'Importir transwiki',
	'group-abusefilter-member' => 'editor filter penyalahgunaan',
	'group-accountcreator-member' => 'Pembuat akun',
	'group-autopatroller-member' => 'patroli otomatis',
	'group-autoreviewer-member' => 'autotinjau',
	'group-bigexport-member' => 'eksportir besar',
	'group-confirmed-member' => 'pengguna terkonfirmasi',
	'group-founder-member' => 'Pendiri',
	'group-import-member' => 'Importir',
	'group-ipblock-exempt-member' => 'Pengecualian pemblokiran IP',
	'group-rollbacker-member' => 'Pengembali revisi',
	'group-transwiki-member' => 'Importir transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Editor filter penyalahgunaan',
	'grouppage-accountcreator' => '{{ns:project}}:Pembuat akun',
	'grouppage-autopatroller' => '{{ns:project}}:Patroli otomatis',
	'grouppage-autoreviewer' => '{{ns:project}}:Autotinjau',
	'grouppage-bigexport' => '{{ns:project}}:Eksportir besar',
	'grouppage-confirmed' => '{{ns:project}}:Pengguna terkonfirmasi',
	'grouppage-founder' => '{{ns:project}}:Pendiri',
	'grouppage-import' => '{{ns:project}}:Importir',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Pengecualian pemblokiran IP',
	'grouppage-rollbacker' => '{{ns:project}}:Pengembali revisi',
	'grouppage-transwiki' => '{{ns:project}}:Importir transwiki',
	'group-steward' => 'Steward',
	'group-sysadmin' => 'Administrator sistem',
	'group-Editinterface' => 'Penyunting antarmuka',
	'group-Global_bot' => 'Bot global',
	'group-Global_rollback' => 'Pengembali revisi global',
	'group-Ombudsmen' => 'Ombudsman',
	'group-Staff' => 'Staf',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'administrator sistem',
	'group-Editinterface-member' => 'penyunting antarmuka',
	'group-Global_bot-member' => 'Bot global',
	'group-Global_rollback-member' => 'Pengembali revisi global',
	'group-Ombudsmen-member' => 'Ombudsman',
	'group-Staff-member' => 'Anggota staf',
	'grouppage-steward' => 'm:Stewards/id',
	'group-coder' => 'Programer',
	'group-coder-member' => 'programer',
	'group-inactive' => 'Pengguna tidak aktif',
	'group-inactive-member' => 'pengguna tidak aktif',
	'grouppage-inactive' => '{{ns:project}}:Pengguna tidak aktif',
	'wikimedia-copyright' => 'Teks tersedia di bawah <a href="http://creativecommons.org/licenses/by-sa/3.0/">Lisensi Atribusi/Berbagi Serupa Creative Commons</a>; ketentuan tambahan mungkin berlaku. Lihat <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Ketentuan Penggunaan</a> untuk lebih jelasnya.',
	'wikimedia-copyrightwarning' => 'Dengan menekan tombol simpan, Anda setuju untuk melepas kontribusi Anda seterusnya di bawah [http://creativecommons.org/licenses/by-sa/3.0/ Lisensi Atribusi/Berbagi Serupa Creative Commons 3.0] dan [http://www.gnu.org/copyleft/fdl.html GFDL]. Anda setuju untuk diberi kredit oleh pengguna ulang, minimal, melalui pranala atau URL ke halaman yang Anda kontribusikan. Lihat [http://wikimediafoundation.org/wiki/Terms_of_Use Ketentuan Penggunaan] untuk lebih jelasnya.',
	'wikimedia-editpage-tos-summary' => 'Jika Anda tidak ingin tulisan Anda disunting dan didistribusikan ulang jika diinginkan, jangan kirimkan tulisan Anda ke sini. Jika Anda tidak menulisnya sendiri, tulisan ini harus tersedia dengan ketentuan yang sesuai dengan [http://wikimediafoundation.org/wiki/Terms_of_Use Ketentuan Penggunaan], dan Anda setuju untuk mengikuti semua persyaratan perizinan yang relevan.',
);

/** Interlingue (Interlingue)
 * @author Malafaya
 */
$messages['ie'] = array(
	'sitesupport' => 'Donationes',
);

/** Eastern Canadian (Unified Canadian Aboriginal Syllabics) (ᐃᓄᒃᑎᑐᑦ) */
$messages['ike-cans'] = array(
	'sitesupport' => 'ᑐᓐᓂᖅᑯᓯᐊᑦ ᑮᓇᐅᔭᐃᑦ',
);

/** Iloko (Ilokano)
 * @author Saluyot
 * @author לערי ריינהארט
 */
$messages['ilo'] = array(
	'sitesupport' => 'Donasion',
	'tooltip-n-sitesupport' => 'Suportarandakami',
);

/** Ingush (ГІалгІай Ğalğaj)
 * @author Tagir
 */
$messages['inh'] = array(
	'sitesupport' => 'СагIа',
);

/** Ido (Ido)
 * @author Malafaya
 * @author Wyvernoid
 * @author לערי ריינהארט
 */
$messages['io'] = array(
	'sitesupport' => 'Donacaji',
	'tooltip-n-sitesupport' => 'Suportez ni',
	'group-accountcreator' => 'Konto-kreanti',
	'group-rollbacker' => 'Retrorulanti',
	'group-sysadmin' => 'Sistemo-administranti',
	'wikimedia-copyright' => 'La kontenajo esas sub la <a href="http://creativecommons.org/licenses/by-sa/3.0/"><i>Creative Commons Attribution/Share-Alike License</i></a>;
suplementala reguli forsan aplikesas.
Videz <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Reguli di Uzado</a> por detali.',
	'wikimedia-copyrightwarning' => "Per registrago, vu konkordas nerevokeble distributar vua kontributaji sub la [http://creativecommons.org/licenses/by-sa/3.0/ ''Creative Commons Attribution/Share-Alike License 3.0''] e la [http://www.gnu.org/copyleft/fdl.html GFDL]. Vu konkordas kreditesar da ri-uzanti, adminime, per ligilo od URL a la pagino quan vu kontributas ad. Videz la [http://wikimediafoundation.org/wiki/Terms_of_Use Reguli di Uzado] por detali.",
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 * @author Spacebirdy
 * @author לערי ריינהארט
 */
$messages['is'] = array(
	'sitesupport' => 'Fjárframlög',
	'tooltip-n-sitesupport' => 'Fjárframlagssíða',
	'group-autoreviewer' => 'Sjálfritdómarar',
	'group-Staff' => 'Starfsfólk',
	'group-Staff-member' => 'Starfsmaður',
);

/** Italian (Italiano)
 * @author BrokenArrow
 * @author Brownout
 * @author Darth Kule
 * @author Melos
 * @author Nemo bis
 * @author Pietrodn
 * @author Stefano-c
 */
$messages['it'] = array(
	'wikimediamessages-desc' => 'Messaggi specifici di Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donazioni',
	'sitesupport' => 'Donazioni',
	'tooltip-n-sitesupport' => 'Sostienici',
	'group-abusefilter' => 'Gestori filtri anti abusi',
	'group-accountcreator' => 'Creatori di account',
	'group-autopatroller' => 'Autopatroller',
	'group-autoreviewer' => 'Autorevisori',
	'group-bigexport' => 'Esportatori in blocco',
	'group-confirmed' => 'Utenti confermati',
	'group-founder' => 'Fondatori',
	'group-import' => 'Importatori',
	'group-ipblock-exempt' => 'esente dal blocco IP',
	'group-rollbacker' => 'Rollbacker',
	'group-transwiki' => 'Importatori transwiki',
	'group-abusefilter-member' => 'gestore filtri anti abusi',
	'group-accountcreator-member' => 'creatore di account',
	'group-autopatroller-member' => 'autopatroller',
	'group-autoreviewer-member' => 'autorevisore',
	'group-bigexport-member' => 'esportatore in blocco',
	'group-confirmed-member' => 'utente confermato',
	'group-founder-member' => 'fondatore',
	'group-import-member' => 'importatore',
	'group-ipblock-exempt-member' => 'esente dal blocco IP',
	'group-rollbacker-member' => 'rollbacker',
	'group-transwiki-member' => 'importatore transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Gestori filtri anti abusi',
	'grouppage-accountcreator' => '{{ns:project}}:Creatori di account',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatroller',
	'grouppage-autoreviewer' => '{{ns:project}}:Autorevisori',
	'grouppage-bigexport' => '{{ns:project}}:Esportatori in blocco',
	'grouppage-confirmed' => '{{ns:project}}:Utenti confermati',
	'grouppage-founder' => '{{ns:project}}:Founders',
	'grouppage-import' => '{{ns:project}}:Importatori',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Esenti dal blocco IP',
	'grouppage-rollbacker' => '{{ns:project}}:Rollbackers',
	'grouppage-transwiki' => '{{ns:project}}:Importatori transwiki',
	'group-steward' => 'Steward',
	'group-sysadmin' => 'Amministratori di sistema',
	'group-Editinterface' => "Editori dell'interfaccia",
	'group-Global_bot' => 'Bot globali',
	'group-Global_rollback' => 'Rollbacker globali',
	'group-Ombudsmen' => 'Ombudsmen',
	'group-Staff' => 'Staff',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'amministratore di sistema',
	'group-Editinterface-member' => "editore dell'interfaccia",
	'group-Global_bot-member' => 'bot globale',
	'group-Global_rollback-member' => 'rollbacker globale',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'Membro dello staff',
	'grouppage-steward' => 'm:Stewards/it',
	'grouppage-Global_rollback' => 'm:Global rollback/it',
	'group-coder' => 'Coder',
	'group-coder-member' => 'coder',
	'group-inactive' => 'Utenti inattivi',
	'group-inactive-member' => 'utente inattivo',
	'grouppage-inactive' => '{{ns:project}}:Utenti inattivi',
	'wikimedia-copyright' => 'Il testo è disponibile secondo la <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.it">licenza Creative Commons Attribuzione-Condividi allo stesso modo</a>; possono applicarsi condizioni ulteriori. Vedi le <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">condizioni d\'uso</a> per i dettagli.',
	'wikimedia-copyrightwarning' => "Salvando, accetti irrevocabilmente di rilasciare il tuo contributo sotto le licenze [http://creativecommons.org/licenses/by-sa/3.0/deed.it Creative Commons Attribuzione-Condividi allo stesso modo 3.0] e [http://www.gnu.org/copyleft/fdl.html GFDL]. Accetti che i riutilizzatori te lo attribuiscano almeno mediante un collegamento ipertestuale o un URL alla pagina a cui hai contribuito. Consulta le [http://wikimediafoundation.org/wiki/Terms_of_Use condizioni d'uso] per i dettagli.",
	'wikimedia-editpage-tos-summary' => "Se non desideri che il tuo testo possa essere modificato e ridistribuito a volontà, allora non inserirlo qui. Se non l'hai scritto tu, deve essere disponibile a condizioni compatibili con le [http://wikimediafoundation.org/wiki/Terms_of_Use condizioni d'uso], e accetti di seguire tutti i requisiti di licenza.",
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fievarsty
 * @author Fryed-peach
 * @author Hosiryuhosi
 * @author JtFuruhata
 * @author Meno25
 * @author Suisui
 * @author 青子守歌
 */
$messages['ja'] = array(
	'wikimediamessages-desc' => 'ウィキメディア固有のメッセージ',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/ja?utm_source=donate&utm_medium=sidebar&utm_campaign=spontaneous_donation',
	'sitesupport' => '寄付',
	'tooltip-n-sitesupport' => 'ご支援ください',
	'group-abusefilter' => '不正利用フィルター編集者',
	'group-accountcreator' => 'アカウント作成権限保持者',
	'group-autopatroller' => '自動パトロール権限保持者',
	'group-autoreviewer' => '自動査読者',
	'group-bigexport' => '大規模エクスポート権限保持者',
	'group-confirmed' => '承認された利用者',
	'group-founder' => '創設者',
	'group-import' => 'インポート権限保持者',
	'group-ipblock-exempt' => 'IPブロック適用除外者',
	'group-rollbacker' => 'ロールバック権限保持者',
	'group-transwiki' => 'トランスウィキ・インポート権限保持者',
	'group-abusefilter-member' => '不正利用フィルター編集者',
	'group-accountcreator-member' => 'アカウント作成権限保持者',
	'group-autopatroller-member' => '自動パトロール権限保持者',
	'group-autoreviewer-member' => '自動査読者',
	'group-bigexport-member' => '大規模エクスポート権限保持者',
	'group-confirmed-member' => '承認された利用者',
	'group-founder-member' => '創設者',
	'group-import-member' => 'インポート権限保持者',
	'group-ipblock-exempt-member' => 'IPブロック適用除外者',
	'group-rollbacker-member' => 'ロールバック権限保持者',
	'group-transwiki-member' => 'トランスウィキ・インポート権限保持者',
	'grouppage-abusefilter' => '{{ns:project}}:不正利用フィルター編集者',
	'grouppage-accountcreator' => '{{ns:project}}:アカウント作成権限保持者',
	'grouppage-autopatroller' => '{{ns:project}}:自動パトロール権限保持者',
	'grouppage-autoreviewer' => '{{ns:project}}:自動査読者',
	'grouppage-bigexport' => '{{ns:project}}:大規模エクスポート権限保持者',
	'grouppage-confirmed' => '{{ns:project}}:承認された利用者',
	'grouppage-founder' => '{{ns:project}}:創設者',
	'grouppage-import' => '{{ns:project}}:インポート権限保持者',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IPブロック適用除外',
	'grouppage-rollbacker' => '{{ns:project}}:ロールバック権限保持者',
	'grouppage-transwiki' => '{{ns:project}}:トランスウィキ・インポート権限保持者',
	'group-steward' => 'スチュワード',
	'group-sysadmin' => 'システム管理者',
	'group-Editinterface' => 'インタフェース編集者',
	'group-Global_bot' => 'グローバル・ボット',
	'group-Global_rollback' => 'グローバル・ロールバック権限保持者',
	'group-Ombudsmen' => 'オンブズマン',
	'group-Staff' => 'スタッフ',
	'group-steward-member' => 'スチュワード',
	'group-sysadmin-member' => 'システム管理者',
	'group-Editinterface-member' => 'インタフェース編集者',
	'group-Global_bot-member' => 'グローバル・ボット',
	'group-Global_rollback-member' => 'グローバル・ロールバック権限保持者',
	'group-Ombudsmen-member' => 'オンブズマン',
	'group-Staff-member' => 'スタッフ',
	'grouppage-steward' => 'm:Stewards/ja',
	'group-coder' => 'コーダー',
	'group-coder-member' => 'コーダー',
	'group-inactive' => '活動停止中の利用者',
	'group-inactive-member' => '活動停止中の利用者',
	'grouppage-inactive' => '{{ns:project}}:活動停止中の利用者',
	'shared-repo-name-shared' => 'ウィキメディア・コモンズ',
	'wikimedia-copyright' => 'テキストは<a href="http://creativecommons.org/licenses/by-sa/3.0/deed.ja">クリエイティブ・コモンズ 表示-継承ライセンス</a>の下で利用可能です。追加の条件が適用される場合があります。詳細は<a href="http://wikimediafoundation.org/wiki/%E5%88%A9%E7%94%A8%E8%A6%8F%E7%B4%84">利用規約</a>を参照してください。',
	'wikimedia-copyrightwarning' => '保存すると、あなたは自身の投稿を[http://creativecommons.org/licenses/by-sa/3.0/deed.ja クリエイティブ・コモンズ 表示-継承ライセンス 3.0] かつ [http://www.gnu.org/copyleft/fdl.html GFDL] の下で公開することに同意したことになります。この公開は取り消せません。あなたは再利用者によって、最低でもあなたが投稿しているページへのハイパーリンクか URL を通して、クレジット表示されることに同意したとみなされます。詳細は[http://wikimediafoundation.org/wiki/%E5%88%A9%E7%94%A8%E8%A6%8F%E7%B4%84 利用規約]を参照してください。',
	'wikimedia-editpage-tos-summary' => 'もしあなたが自身の文章を勝手に編集や再配布してほしくないのなら、ここに投稿しないでください。文章があなた自身で書いたものでない場合、その文章はこの[http://wikimediafoundation.org/wiki/%E5%88%A9%E7%94%A8%E8%A6%8F%E7%B4%84 利用規約]と整合する条件のもとで利用可能である必要があります。また、その場合、あなたは全ての関係するライセンス要件に従うことに同意しなければなりません。',
);

/** Lojban (Lojban)
 * @author OldakQuill
 */
$messages['jbo'] = array(
	'sitesupport' => 'jdini sidju',
);

/** Jutish (Jysk)
 * @author Ælsån
 */
$messages['jut'] = array(
	'sitesupport' => 'Støtside',
	'tooltip-n-sitesupport' => 'Støt os',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 * @author Pras
 */
$messages['jv'] = array(
	'wikimediamessages-desc' => 'Pesen-pesen spesifik Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Panggalangan_dana',
	'sitesupport' => 'Nyumbang dana',
	'tooltip-n-sitesupport' => 'Sokongen kita',
	'group-abusefilter' => 'Panyunting saringan salah-guna',
	'group-accountcreator' => 'Sing gawé akun',
	'group-autopatroller' => 'Patroli otomatis',
	'group-autoreviewer' => 'Pamriksa otomatis',
	'group-bigexport' => 'Èksportir gedhé',
	'group-confirmed' => 'Panganggo wis dikonfirmasi',
	'group-founder' => 'Pendhiri',
	'group-import' => 'Importir',
	'group-ipblock-exempt' => 'Pambébasan saka pamblokiran IP',
	'group-rollbacker' => 'Sing mbalèkaké révisi',
	'group-transwiki' => 'Importir transwiki',
	'group-abusefilter-member' => 'panyunting saringan salah-guna',
	'group-accountcreator-member' => 'Sing gawé akun',
	'group-autopatroller-member' => 'patroli otomatis',
	'group-autoreviewer-member' => 'pamriksa otomatis',
	'group-bigexport-member' => 'èksportir gedhé',
	'group-confirmed-member' => 'panganggo wis dikonfirmasi',
	'group-founder-member' => 'Pandhiri',
	'group-import-member' => 'importir',
	'group-ipblock-exempt-member' => 'Pambébasan saka pamblokiran IP',
	'group-rollbacker-member' => 'Sing mbalèkaké révisi',
	'group-transwiki-member' => 'importir transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Panyunting saringan salah-guna',
	'grouppage-accountcreator' => '{{ns:project}}:Sing gawé akun',
	'grouppage-autopatroller' => '{{ns:project}}:Patroli otomatis',
	'grouppage-autoreviewer' => '{{ns:project}}:Pamriksa otomatis',
	'grouppage-bigexport' => '{{ns:project}}:Èksportir gedhé',
	'grouppage-confirmed' => '{{ns:project}}:Panganggo wis dikonfirmasi',
	'grouppage-founder' => '{{ns:project}}:Pandhiri',
	'grouppage-import' => '{{ns:project}}:Importir',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Pambébasan saka pamblokiran IP',
	'grouppage-rollbacker' => '{{ns:project}}:Sing mbalèkaké révisi',
	'grouppage-transwiki' => '{{ns:project}}:Importir transwiki',
	'group-steward' => 'Steward',
	'group-sysadmin' => 'Administrator sistem',
	'group-Editinterface' => 'Panyunting adu-rai',
	'group-Global_bot' => 'Bot global',
	'group-Global_rollback' => 'Sing mbalèkaké révisi global',
	'group-Ombudsmen' => 'Ombudsman',
	'group-Staff' => 'Staf',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'administrator sistem',
	'group-Editinterface-member' => 'panyunting adu-rai',
	'group-Global_bot-member' => 'bot global',
	'group-Global_rollback-member' => 'Sing mbalèkaké révisi global',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'staf',
	'grouppage-steward' => 'm:Stewards',
	'grouppage-sysadmin' => 'm:System administrators',
	'grouppage-Global_bot' => 'm:Global bot',
	'grouppage-Global_rollback' => 'm:Global rollback',
	'grouppage-Ombudsmen' => 'm:Ombudsman commission',
	'group-coder' => 'Programer',
	'group-coder-member' => 'programer',
	'grouppage-coder' => 'Project:Programer',
	'group-inactive' => 'Panganggo ora aktif',
	'group-inactive-member' => 'panganggo ora aktif',
	'grouppage-inactive' => '{{ns:project}}:Panganggo ora aktif',
	'wikimedia-copyright' => 'Tèks cumawis wonten ing saandhaping <a href="http://creativecommons.org/licenses/by-sa/3.0/">Lisensi Atribusi/Berbagi Serupa Creative Commons</a>; mbokmanawi ugi wonten wewaton tambahan. Pirsani <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Katentuan Pangginaan</a> supados langkung gamblang.',
	'wikimedia-copyrightwarning' => 'Kanthi nge-klik tombol simpen, panjenengan sarujuk nglepasaken kontribusi panjenengan salajengipun wonten ing saandhaping [http://creativecommons.org/licenses/by-sa/3.0/ Lisensi Atribusi/Berbagi Serupa Creative Commons 3.0] lan [http://www.gnu.org/copyleft/fdl.html GFDL]. Panjenengan sarujuk dipun-paringi krédit déning panganggé sanès, sakbotenipun, lumantar pranala utawi URL dhumateng kaca ingkang panjenengan kontribusèkaken. Pirsani [http://wikimediafoundation.org/wiki/Terms_of_Use Katentuan Pangginaan] supados langkung gamblang.',
	'wikimedia-editpage-tos-summary' => 'Manawi panjenengan boten ngersakaken seratan panjenengan bakal dipunsuntig lan dipunsebar malih manawi dipunkersakaken, sampun ngantos ngirim seratan ing ngriki.
Manawi punika sanès seratan panjenengan piyambak, seratan punika kedah kasediakaken wonten ing saandhaping [http://wikimediafoundation.org/wiki/Terms_of_Use Katentuan pangginaan], lan panjenengan sarujuk manut dhumateng sadaya persaratan lisènsi ingkang kagandhèng.',
);

/** Georgian (ქართული)
 * @author Alsandro
 * @author David1010
 * @author Malafaya
 * @author Sopho
 * @author Temuri rajavi
 * @author לערי ריינהארט
 * @author გიორგიმელა
 */
$messages['ka'] = array(
	'wikimediamessages-desc' => 'ვიკიმედიის სპეციფიკური წერილები',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/ka',
	'sitesupport' => 'შეწირულობები',
	'tooltip-n-sitesupport' => 'მხარდაჭერა',
	'group-abusefilter' => 'ბოროტად გამოყენების ფილტრის მეპატრულე',
	'group-accountcreator' => 'ანგარიში შემქმნელები',
	'group-autopatroller' => 'ავტომეპატრულები',
	'group-autoreviewer' => 'ავტომხილველები',
	'group-bigexport' => 'დიდი ექსპორტორები',
	'group-confirmed' => 'დადასტურებული მომხმარებლები',
	'group-founder' => 'დამაარსებლები',
	'group-import' => 'იმპორტირებე',
	'group-ipblock-exempt' => 'IP-ბლოკირებების გამონაკლისები',
	'group-rollbacker' => 'გაუქმებლები',
	'group-transwiki' => 'Transwiki-ს იმპორტორები',
	'group-abusefilter-member' => 'ბოროტად გამოყენებსის ფილტრის რედაქტორი',
	'group-accountcreator-member' => 'ანგარიშის შემქმნელები',
	'group-autopatroller-member' => 'ავტომოპატრულე',
	'group-autoreviewer-member' => 'ავტომხილველი',
	'group-bigexport-member' => 'დიდი ექსპორტორი',
	'group-confirmed-member' => 'დადასტურებული მომხმარებელი',
	'group-founder-member' => 'დამაარსებელი',
	'group-import-member' => 'იმპორტორი',
	'group-ipblock-exempt-member' => 'IP ბლოკირების გამონაკლისები',
	'group-rollbacker-member' => 'გამაუქმებელი',
	'group-transwiki-member' => 'Transwiki-ს იმპორტორი',
	'grouppage-abusefilter' => '{{ns:project}}:ბოროტად გამოყენების ფილტრის რედაქტორები',
	'grouppage-accountcreator' => '{{ns:project}}:ანგარიშების შემქმნელები',
	'grouppage-autopatroller' => '{{ns:project}}:ავტომეპატრულე',
	'grouppage-autoreviewer' => '{{ns:project}}:ავტომხილველები',
	'grouppage-bigexport' => '{{ns:project}}:დიდი ექსპორტიორები',
	'grouppage-confirmed' => '{{ns:project}}:დადასტურებული მომხმარებლები',
	'grouppage-founder' => '{{ns:project}}:დამაარსებლები',
	'grouppage-import' => '{{ns:project}}:იმპორტიორები',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-დაბლოკვების გამონაკლისები',
	'grouppage-rollbacker' => '{{ns:project}}:გამმაუქმებლები',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-ს იმპორტორები',
	'group-steward' => 'სტიუარდები',
	'group-sysadmin' => 'სისტემური ადმინისტრატორები',
	'group-Editinterface' => 'ინტერფეისის რედაქტორები',
	'group-Global_bot' => 'გლობალური ბოტები',
	'group-Global_rollback' => 'გლობალური გამმაუქმებლები',
	'group-Ombudsmen' => 'ომბუცმენები',
	'group-Staff' => 'თანამშრომლები',
	'group-steward-member' => 'სტიუარდი',
	'group-sysadmin-member' => 'სისტემური ადმინისტრატორი',
	'group-Editinterface-member' => 'ინტერფეისის რედაქტორი',
	'group-Global_bot-member' => 'გლობალური ბოტი',
	'group-Global_rollback-member' => 'გლობალური გამმაუქმებელი',
	'group-Ombudsmen-member' => 'ობუცმენი',
	'group-Staff-member' => 'თანამშრომელი',
	'group-coder' => 'პროგრამისტი',
	'group-coder-member' => 'პროგრამისტი',
	'group-inactive' => 'არააქტიური მომხმარებლები',
	'group-inactive-member' => 'არააქტიური მომხმარებელი',
	'grouppage-inactive' => '{{ns:project}}:არააქტიური მომხმარებლები',
	'wikimedia-copyright' => 'მოცემული ტექსტი წარმოდგენილია <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike ლიცენზიით</a>; შესაძლოა დამატებითი პირობების არსებობა. დეტალებისთვის იხილეთ <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">გამოყენების წესები</a>.',
	'wikimedia-copyrightwarning' => '<table width="95%" class="mw-alerte" id="cpwarn" style="clear:both; padding:2px; background-color:#FFE4E1; border-color: #700050; color: #700050;">
 <tr>
  <td style="text-align:center">[[Image:AnimatedStop.gif|55px|ავტორის გაფრთხილება|link=]]</td>
  <td>
<b><span style="font-size:115%;">→ ნუ გადმოწერთ ტექსტს აქ სხვა ვებსაიტიდან </span></b>: პატივი ეცით [[ვიკიპედია:საავტორო უფლებები|საავტორო უფლებებს]] ([[დახმარება:რეპუბლიკაცია|დახმარება]]);<br />
<b><span style="font-size:115%;">→ მიუთითეთ თქვენს ინფორმაციას გადამოწმებადი წყაროები </span></b>: [[ვიკიპედია:გადამოწმებადობა|გადამოწმებადობა]] ([[დახმარება:წყაროს მითითება|დახმარება]]).
<p style="font-size:90%" align="center">ღილაკზე « \'\'\'გვერდის შენახვა\'\'\' » დაწკაპუნებით, თქვენ თანახმა ხართ შეუქცევად განათავსოთ თქვენი წვლილი [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike (ვერსია 3.0)] და [http://www.gnu.org/copyleft/fdl.html GFDL] ლიცენზიებით. თქვენ ასევე თანახმა ხართ, რომ სხვა მომხმარებელთა მიერ თქვენს მიერ შეცვლილი გვერდის გამოყენებისას თქვენი წვლილი დამოწმდება მინიმუმ ჰიპერბმულის ან URL-ის მეშვეობით. იხილეთ ასევე [http://wikimediafoundation.org/wiki/Terms_of_Use გამოყენების პირობები] დამატებითი ინფორმაციისთვის.</p>
  </td>
 </tr>
</table>',
	'wikimedia-editpage-tos-summary' => '<div style="border: 1px solid #aaa;margin: 1em 0;padding: 0 0.4em 0 0.4em;">
თუ არ გსურთ, რომ თქვენი ნაწერი თავისუფლად გავრცელდეს და ჩასწორდეს, აქ მას ნუ შემოიტანთ. თუ ეს ტექსტი თქვენი დაწერილი არ არის, იგი უნდა აკმაყოფილებდეს [http://wikimediafoundation.org/wiki/Terms_of_Use გამოყენების წესებს], ხოლო თქვენ თანახმა ხართ დაემორჩილოთ ნებისმიერ დაკავშირებულ სალიცენზიო მოთხოვნას.
</div>',
);

/** Kara-Kalpak (Qaraqalpaqsha)
 * @author AlefZet
 */
$messages['kaa'] = array(
	'sitesupport' => "Ja'rdem berıw",
	'tooltip-n-sitesupport' => "Bizge ja'rdem berin'",
);

/** Kabyle (Taqbaylit)
 * @author Agurzil
 * @author Berkus Tiwal
 */
$messages['kab'] = array(
	'wikimediamessages-desc' => 'Iznan usligen n Wikimedia',
	'sitesupport' => 'Efk-aɣ idrimen',
	'tooltip-n-sitesupport' => 'Ellil-aɣ',
	'group-accountcreator' => 'Imeskaren n imiḍanen',
	'group-founder' => 'Imeskar imenza',
	'grouppage-founder' => '{{ns:project}}:Imeskar Imenza',
	'group-Staff-member' => 'Amaslad (membre) n terbaεt',
);

/** Kazakh (Arabic script) (‫قازاقشا (تٴوتە)‬) */
$messages['kk-arab'] = array(
	'sitesupport' => 'دەمەۋشىلىك',
);

/** Kazakh (Cyrillic) (Қазақша (Cyrillic))
 * @author AlefZet
 * @author GaiJin
 */
$messages['kk-cyrl'] = array(
	'sitesupport' => 'Демеушілік',
	'group-import' => 'Сырттан алушылар',
	'group-import-member' => 'сырттан алушы',
	'group-sysadmin' => 'Жүйе әкімшілері',
	'group-Staff' => 'Басқарма',
	'group-sysadmin-member' => 'жүйе әкімшісі',
	'group-Staff-member' => 'Басқарма мүшесі',
);

/** Kazakh (Latin) (Қазақша (Latin)) */
$messages['kk-latn'] = array(
	'sitesupport' => 'Demewşilik',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Kiensvay
 * @author Lovekhmer
 * @author Thearith
 * @author គីមស៊្រុន
 * @author វ័ណថារិទ្ធ
 */
$messages['km'] = array(
	'wikimediamessages-desc' => 'សារយថាប្រភេទរបស់វិគីមេឌា',
	'sitesupport-url' => 'Project:ទំព័រគាំទ្រ',
	'sitesupport' => 'វិភាគទាន',
	'tooltip-n-sitesupport' => 'គាំទ្រ​យើងខ្ញុំ',
	'group-abusefilter' => 'កម្មវិធី​កែ​សម្រួល​តម្រងការបំពានច្បាប់',
	'group-accountcreator' => 'អ្នកបង្កើតគណនី',
	'group-autopatroller' => 'អ្នកល្បាត​ស្វ័យប្រវត្តិ',
	'group-autoreviewer' => 'ក្រុម​អ្នកត្រួតពិនិត្យឡើងវិញដោយ​ស្វ័យប្រវត្តិ​',
	'group-bigexport' => 'ក្រុម​អ្នកនាំចេញ​ធំ​',
	'group-confirmed' => 'អ្នកប្រើប្រាស់ទាំងឡាយ​ដែលត្រូវបាន​ទទួលស្គាល់',
	'group-founder' => 'ស្ថាបនិក',
	'group-import' => 'អ្នកនាំចូល',
	'group-transwiki' => 'អ្នកនាំចូលអន្តរវិគី',
	'group-abusefilter-member' => 'កម្មវិធី​កែ​សម្រួល​តម្រងការបំពានច្បាប់',
	'group-accountcreator-member' => 'អ្នកបង្កើតគណនី',
	'group-autopatroller-member' => 'អ្នកល្បាត​ស្វ័យប្រវត្តិ',
	'group-autoreviewer-member' => '​អ្នកត្រួតពិនិត្យឡើងវិញដោយ​ស្វ័យប្រវត្តិ​',
	'group-bigexport-member' => 'អ្នក​នាំចេញ​ធំ​',
	'group-confirmed-member' => 'អ្នកប្រើប្រាស់​ដែលត្រូវបាន​ទទួលស្គាល់',
	'group-founder-member' => 'ស្ថាបនិក',
	'group-import-member' => 'អ្នកនាំចូល',
	'group-transwiki-member' => 'អ្នកនាំចូលអន្តរវិគី',
	'grouppage-abusefilter' => '{{ns:project}}:កម្មវិធី​កែ​សម្រួល​តម្រងការបំពានច្បាប់',
	'grouppage-accountcreator' => '{{ns:project}}:អ្នកបង្កើតគណនី',
	'grouppage-autopatroller' => '{{ns:project}}:អ្នកល្បាត​ស្វ័យប្រវត្តិ',
	'grouppage-autoreviewer' => '{{ns:project}}:អ្នកត្រួតពិនិត្យឡើងវិញដោយ​ស្វ័យ​ប្រវត្តិ​',
	'grouppage-bigexport' => '{{ns:project}}:ក្រុមអ្នកនាំចេញ​ធំ​',
	'grouppage-confirmed' => '{{ns:project}}:អ្នកប្រើប្រាស់ទាំងឡាយដែលត្រូវបាន​ទទួលស្គាល់',
	'grouppage-founder' => '{{ns:project}}:ស្ថាបនិក',
	'grouppage-import' => '{{ns:project}}:អ្នកនាំចូល',
	'grouppage-transwiki' => '{{ns:project}}:អ្នកនាំចូលអន្តរវិគី',
	'group-sysadmin' => 'អ្នកអភិបាលប្រព័ន្ឋ',
	'group-Editinterface' => 'កែប្រែអន្តរមុខ',
	'group-Global_bot' => 'រូបយន្ត​សកល',
	'group-Ombudsmen' => 'អមប៊ុដហ្ស៍ម៉ឹន',
	'group-Staff' => 'បុគ្គលិកបម្រើការ',
	'group-sysadmin-member' => 'អ្នកអភិបាលប្រព័ន្ឋ',
	'group-Editinterface-member' => 'កែប្រែអន្តរមុខ',
	'group-Global_bot-member' => 'រូបយន្ត​សកល',
	'group-Ombudsmen-member' => 'អមប៊ុដហ្ស៍ម៉ឹន',
	'group-Staff-member' => 'សមាជិកដែលជាបុគ្គលិកបម្រើការ',
	'group-coder' => 'អ្នកសរសេរកូដ',
	'group-coder-member' => 'អ្នកសរសេរកូដ',
	'group-inactive' => 'ក្រុម​អ្នក​ប្រើ​ប្រាស់​អសកម្ម​',
	'group-inactive-member' => 'អ្នក​ប្រើ​ប្រាស់​អសកម្ម​',
	'grouppage-inactive' => '{{ns:project}}:អ្នកប្រើប្រាស់អសកម្ម',
	'wikimedia-copyright' => 'អត្ថបទ​នេះ​អាចរកបាន ក្រោម​[http://creativecommons.org/licenses/by-sa/3.0/ អាជ្ញាបណ្ណ Creative Commons Attribution/Share-Alike]។ លក្ខខណ្ឌបន្ថែម​ផ្សេងៗទៀតក៏នឹងអាចត្រូវបានអនុវត្ត។​
សូមមើល [http://wikimediafoundation.org/wiki/Terms_of_Use/ លក្ខខណ្ឌ​ក្នុងការ​ប្រើប្រាស់] សម្រាប់​ព័ត៌មានលម្អិត​។',
	'wikimedia-copyrightwarning' => 'តាមរយៈ​ការរក្សាទុកនេះ អ្នកយល់ព្រមដោយឥតកែប្រែក្នុងការ​ដាក់បញ្ចូល​ការរួមចំណែក​របស់អ្នក ឲ្យស្ថិតក្រោម​​[http://creativecommons.org/licenses/by-sa/3.0/ អាជ្ញាបណ្ណ​ 3.0 នៃ Creative Commons Attribution/Share-Alike] និង[http://www.gnu.org/copyleft/fdl.html អាជ្ញាបណ្ណ​ GFDL].
អ្នកយល់ព្រមក្នុងការដែលត្រូវបានទទួលស្គាល់ដោយអ្នកប្រើប្រាស់ដទៃទៀត យ៉ាងហោចណាស់តាមរយៈតំណបណ្ដាញ ឬ URL ទៅកាន់ទំព័រដែលអ្នកបានចូលរួមចំណែក​។
សូមមើល [http://wikimediafoundation.org/wiki/Terms_of_Use/ លក្ខខណ្ឌ​ក្នុងការ​ប្រើប្រាស់] សម្រាប់​ព័ត៌មានលម្អិត​។',
	'wikimedia-editpage-tos-summary' => 'If you do not want your writing to be edited and redistributed at will, then do not submit it here.
If you did not write this yourself, it must be available under terms consistent with the [http://wikimediafoundation.org/wiki/Terms_of_Use Terms of Use], and you agree to follow any relevant licensing requirements.

ប្រសិបបើ​អ្នក​មិនចង់ឲ្យ​សំនេរ​របស់អ្នកត្រូវបាន​កែប្រែ និងចែកចាញដោយ​ឆន្ទះ នោះសូមកុំ​ដាក់បញ្ចូលមកទីនេះ​។
ប្រសិនបើ​អ្នកមិនបានសរសេរ​ដោយខ្លួនឯងផ្ទាល់ទេ សំនេរនេះ​ត្រូវតែអាចរកបានក្រាមអាជ្ញាបណ្ណទាំងឡាយ​ណាដែលមានលក្ខណៈ​ស្របនឹង [http://wikimediafoundation.org/wiki/Terms_of_Use លក្ខខណ្ឌ​ក្នុងការ​ប្រើប្រាស់] ហើយអ្នកយល់ព្រមក្នុងការគោរពតាម​តម្រូវការនានាក្នុងការដាក់ចូលអាជ្ញាបណ្ណដែលពាក់ព័ន្ធ​ណាមួយ។',
);

/** Kannada (ಕನ್ನಡ)
 * @author Shushruth
 * @author לערי ריינהארט
 */
$messages['kn'] = array(
	'sitesupport' => 'ದೇಣಿಗೆ',
	'tooltip-n-sitesupport' => 'ನಮ್ಮನ್ನು ಬೆಂಬಲಿಸಿ',
);

/** Korean (한국어)
 * @author Albamhandae
 * @author Ficell
 * @author ITurtle
 * @author Ilovesabbath
 * @author Klutzy
 * @author Kwj2772
 * @author ToePeu
 * @author Yknok29
 */
$messages['ko'] = array(
	'wikimediamessages-desc' => '위키미디어 전용 메시지',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/ko',
	'sitesupport' => '기부 안내',
	'tooltip-n-sitesupport' => '지원을 기다립니다',
	'group-abusefilter' => '어뷰즈 필터 편집자',
	'group-accountcreator' => '계정 생성자',
	'group-autopatroller' => '자동 검토',
	'group-bigexport' => '대량 문서 익스포터',
	'group-confirmed' => '자동 인증된 사용자',
	'group-founder' => '설립자',
	'group-import' => '임포터',
	'group-ipblock-exempt' => 'IP 차단 면제자',
	'group-rollbacker' => '롤배커',
	'group-transwiki' => '트랜스위키 임포터',
	'group-abusefilter-member' => '어뷰즈 필터 편집자',
	'group-accountcreator-member' => '계정 생성자',
	'group-autopatroller-member' => '자동 검토자',
	'group-bigexport-member' => '대량 문서 익스포터',
	'group-confirmed-member' => '자동 인증된 사용자',
	'group-founder-member' => '설립자',
	'group-import-member' => '임포터',
	'group-ipblock-exempt-member' => 'IP 차단 면제자',
	'group-rollbacker-member' => '롤배커',
	'group-transwiki-member' => '트랜스위키 임포터',
	'grouppage-abusefilter' => '{{ns:project}}:권한 남용 감시 편집자',
	'grouppage-accountcreator' => '{{ns:project}}:계정 생성자',
	'grouppage-autopatroller' => '{{ns:project}}:자동 검토자',
	'grouppage-bigexport' => '{{ns:project}}:대용량 문서 전파자',
	'grouppage-confirmed' => '{{ns:project}}:자동 인증된 사용자',
	'grouppage-founder' => '{{ns:project}}:설립자',
	'grouppage-import' => '{{ns:project}}:임포터',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP 차단 면제',
	'grouppage-rollbacker' => '{{ns:project}}:롤배커',
	'grouppage-transwiki' => '{{ns:project}}:트랜스위키 임포터',
	'group-steward' => '사무장',
	'group-sysadmin' => '시스템 관리자',
	'group-Editinterface' => '인터페이스 수정',
	'group-Global_bot' => '글로벌 봇',
	'group-Global_rollback' => '글로벌 롤배커',
	'group-Ombudsmen' => '옴부즈맨',
	'group-Staff' => '임원',
	'group-steward-member' => '사무장',
	'group-sysadmin-member' => '시스템 관리자',
	'group-Editinterface-member' => '인터페이스 에디터',
	'group-Global_bot-member' => '글로벌 봇',
	'group-Global_rollback-member' => '글로벌 롤배커',
	'group-Ombudsmen-member' => '옴부즈맨',
	'group-Staff-member' => '임원',
	'grouppage-steward' => 'm:Stewards/ko',
	'group-coder' => '코더',
	'group-coder-member' => '코더',
	'group-inactive' => '활동하지 않는 사용자',
	'group-inactive-member' => '활동하지 않는 사용자',
	'grouppage-inactive' => '{{ns:project}}:활동하지 않는 사용자',
	'shared-repo-name-shared' => '위키미디어 공용',
	'wikimedia-copyright' => '모든 문서는 <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.ko">크리에이티브 커먼즈 저작자표시-동일조건변경허락 3.0</a>에 따라 사용할 수 있습니다. 추가적인 조건이 적용될 수 있습니다. 자세한 내용은 <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">이용 규약</a>을 참고하십시오.',
	'wikimedia-copyrightwarning' => '문서를 편집할 때 기여를 영구히 [http://creativecommons.org/licenses/by-sa/3.0/deed.ko 크리에이티브 커먼즈 저작자표시-동일조건변경허락 3.0]과 자유 소프트웨어 재단이 작성한 [http://www.gnu.org/copyleft/fdl.html GNU 자유 문서 사용 허가서](GFDL)로 배포하는 데 동의하여야 합니다. 이 저작물의 사용자는 이 저작물의 기여자가 저작자라는 사실을 표시해야 하며, 적어도 기여한 저작물이 있는 URL이나 하이퍼링크를 표시해야 합니다. 자세한 내용은 [http://wikimediafoundation.org/wiki/Terms_of_Use 이용 규약]을 참고하십시오.',
	'wikimedia-editpage-tos-summary' => '작성한 문서가 편집되거나 배포되는 것을 원하지 않는다면, 저장하지 마십시오. 이 글을 직접 작성한 것이 아니라면 [http://wikimediafoundation.org/wiki/Terms_of_Use 이용 규약]에 따라 사용 가능해야 하며, 관련된 라이선스 조건에 따르는 데 동의해야 합니다.',
);

/** Kinaray-a (Kinaray-a)
 * @author RonaldPanaligan
 */
$messages['krj'] = array(
	'sitesupport' => 'Donasyon',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 * @author Απεργός
 */
$messages['ksh'] = array(
	'wikimediamessages-desc' => 'Systemnohrechte un Tex för de Wikimedia Shtefftung ier Wikis.',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Spende',
	'sitesupport' => 'Spende',
	'tooltip-n-sitesupport' => 'Donn uns Ungerstötze!',
	'group-abusefilter' => 'Meßbruchsfelter-Baaß',
	'group-accountcreator' => 'Metmaacher-Maachere',
	'group-autopatroller' => 'Sellver-Nohloorer',
	'group-autoreviewer' => 'Automattesch Nohkiker',
	'group-bigexport' => 'Jroß-Expotöre',
	'group-confirmed' => 'Beshtäteschte Metmaacher',
	'group-founder' => 'Jröndere',
	'group-import' => 'Emportöre',
	'group-ipblock-exempt' => 'IP-Jruppe-Sperre-Ußnahme',
	'group-rollbacker' => 'Zeröcknemmere',
	'group-transwiki' => 'Transwiki-Emportöre',
	'group-abusefilter-member' => 'Meßbruchsfelter-Baaß',
	'group-accountcreator-member' => 'Metmaacher-Maacher',
	'group-autopatroller-member' => 'Sellver-Nohloorer',
	'group-autoreviewer-member' => 'Automattesch Nohkiker',
	'group-bigexport-member' => 'Jroß-Expotör',
	'group-confirmed-member' => 'beshtäteschte Metmaacher',
	'group-founder-member' => 'Jrönder',
	'group-import-member' => 'Emportör',
	'group-ipblock-exempt-member' => 'IP-Jruppe-Sperre-Ußnahm',
	'group-rollbacker-member' => 'Zeröcknemmer',
	'group-transwiki-member' => 'Transwiki-Emportör',
	'grouppage-abusefilter' => '{{ns:project}}:Meßbruchsfelter-Baaß',
	'grouppage-accountcreator' => '{{ns:project}}:Metmaacher-Maacher',
	'grouppage-autopatroller' => '{{ns:project}}:Sellver-Nohloorer',
	'grouppage-autoreviewer' => '{{ns:project}}:{{MediaWiki:Group-autoreviewer}}',
	'grouppage-bigexport' => '{{ns:project}}:Jroß-Expotöre',
	'grouppage-confirmed' => '{{ns:project}}:{{int:group-confirmed}}',
	'grouppage-founder' => '{{ns:project}}:Jrönder',
	'grouppage-import' => '{{ns:project}}:Emportör',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-Jruppe-Sperre-Ußnahm',
	'grouppage-rollbacker' => '{{ns:project}}:Zeröcknemmer',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-Emportör',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Wiki-Köbesse',
	'group-Editinterface' => 'Engerfäjßbeärbeider',
	'group-Global_bot' => 'Bots för all Wikis',
	'group-Global_rollback' => 'Zeröcknämmere för all Wikis',
	'group-Ombudsmen' => 'Vermeddeler',
	'group-Staff' => 'Päsonaal',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'Wiki-Köbes',
	'group-Editinterface-member' => 'Engerfäjßbeärbeider',
	'group-Global_bot-member' => 'Bot för all Wikis',
	'group-Global_rollback-member' => 'Zeröcknämmer för all Wikis',
	'group-Ombudsmen-member' => 'Vermeddeler',
	'group-Staff-member' => 'Päsonaal',
	'grouppage-steward' => 'm:Stewards/ksh',
	'grouppage-Global_bot' => 'm:Global bot/ksh',
	'grouppage-Global_rollback' => 'm:Global rollback/ksh',
	'grouppage-Ombudsmen' => 'm:Ombudsman commission/ksh',
	'group-coder' => 'Projrammierer',
	'group-coder-member' => 'Projrammierer',
	'grouppage-coder' => 'Project:Projrammierer',
	'group-inactive' => 'Metmaacher, die nix donn',
	'group-inactive-member' => 'Metmaacher, dä nix deiht',
	'grouppage-inactive' => '{{ns:project}}:{{int:group-inactive}}',
	'shared-repo-name-shared' => '<i lang="en">Wikimedia Commons</i>',
	'wikimedia-copyright' => 'Dä Tex heh kann jebruch wääde unger dä <a href="http://creativecommons.org/licenses/by-sa/3.0/">Lizänz: <i lang="en">Creative Commons Attribution/Share-Alike</i></a>. Zohsäzlejje Beshtemmunge künne jälte. Loor op dä Sigg övver de <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Lizänz_Beshtemmunge</a>, doh shtonn mieh Einzelheite.',
	'wikimedia-copyrightwarning' => 'Endämm De jet avspeichere deihs, jiß De Dinge Beidraach unger de [http://creativecommons.org/licenses/by-sa/3.0/ Lizänz <i lang="en">Creative Commons Attribution/Share-Alike</i> 3.0] un de [http://www.gnu.org/copyleft/fdl.html GFDL] frei, un shtemms zoh, dat ander Dir et Lob doför jävve, zoh_winnischß övver ene Lengk op udder en URL vun däm Atikel, woh De draan am schriive bes. Loor op dä Sigg övver de [http://wikimediafoundation.org/wiki/Terms_of_Use Lizänz_Beshtemmunge], doh shtonn mieh Einzelheite.',
	'wikimedia-editpage-tos-summary' => 'Wann De nit han wells, dat Dinge Tex ömjemodelt weed, un söns wohin verdeilt, dun en hee nit speichere. Wann De dä nit sellver jeschreve häs, moß_e onger Bedengunge ze han sin, di zo de [http://wikimediafoundation.org/wiki/Terms_of_Use Lizänz_Beshtemmunge] paß, un Do shtemms zoh, alle nüüdeje un rellevante Saache ze follje un ze donn för di Lizänz.',
);

/** Kurdish (Latin) (Kurdî / كوردی (Latin)) */
$messages['ku-latn'] = array(
	'sitesupport' => 'Ji bo Weqfa Wikimedia Beş',
);

/** Cornish (Kernewek)
 * @author Malafaya
 */
$messages['kw'] = array(
	'sitesupport' => 'Riansow',
);

/** Kirghiz (Кыргызча) */
$messages['ky'] = array(
	'sitesupport' => 'Демөөр',
);

/** Latin (Latina)
 * @author UV
 * @author לערי ריינהארט
 */
$messages['la'] = array(
	'sitesupport' => 'Donationes',
	'group-rollbacker' => 'Revertores',
	'group-rollbacker-member' => 'revertor',
	'grouppage-rollbacker' => '{{ns:project}}:Revertores',
	'shared-repo-name-shared' => 'Vicimedia Communia',
);

/** Ladino (Ladino)
 * @author לערי ריינהארט
 */
$messages['lad'] = array(
	'sitesupport' => 'Donasiones',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Kaffi
 * @author Les Meloures
 * @author Robby
 * @author לערי ריינהארט
 */
$messages['lb'] = array(
	'wikimediamessages-desc' => 'Spezifesch Systemmessage fir Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/lb',
	'sitesupport' => 'Donatiounen',
	'tooltip-n-sitesupport' => 'Ënnerstëtzt eis',
	'group-abusefilter' => 'Editeure vu Mëssbrauchsfilteren',
	'group-accountcreator' => 'Benotzer déi Benotzerkonten uleeën däerfen',
	'group-autopatroller' => 'Benotzer déi selwer iwwerkucken',
	'group-autoreviewer' => 'Benotzer déi automatesch nokucken',
	'group-bigexport' => 'Grouss Exportateuren',
	'group-confirmed' => 'Confirméiert Benotzer',
	'group-founder' => 'Grënner',
	'group-import' => 'Importateuren',
	'group-ipblock-exempt' => 'Ausnahme vun IP-Spären',
	'group-rollbacker' => 'Zrécksetzer',
	'group-transwiki' => 'Transwiki-Importateuren',
	'group-abusefilter-member' => 'Editeur vum Mëssbrauchsfilter',
	'group-accountcreator-member' => 'Benotzer dee Benotzerkonten uleeën däerf',
	'group-autopatroller-member' => 'Benotzer deen automatesch iwwerkuckt',
	'group-autoreviewer-member' => 'Benotzer deen automatesch nokuckt',
	'group-bigexport-member' => 'groussen Exportateur',
	'group-confirmed-member' => 'Confirméierte Benotzer',
	'group-founder-member' => 'Grënner',
	'group-import-member' => 'Importateur',
	'group-ipblock-exempt-member' => 'Ausnam vun der IP-Spär',
	'group-rollbacker-member' => 'Zrécksetzer',
	'group-transwiki-member' => 'Transwiki-Importateur',
	'grouppage-abusefilter' => '{{ns:project}}:Editeure vu Mëssbrauchsfilteren',
	'grouppage-accountcreator' => '{{ns:project}}:Benotzer déi Benotzerkonten uleeën däerfen',
	'grouppage-autopatroller' => '{{ns:project}}:Automatesch Préifer',
	'grouppage-autoreviewer' => '{{ns:project}}:Automatesch Nopréifer',
	'grouppage-bigexport' => '{{ns:project}}:Grouss Exportateuren',
	'grouppage-confirmed' => '{{ns:project}}:Confirméiert Benotzer',
	'grouppage-founder' => '{{ns:project}}:Grënner',
	'grouppage-import' => '{{ns:project}}:Importateuren',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Ausnahm vun der IP-Spär',
	'grouppage-rollbacker' => '{{ns:project}}:Zrécksetzer',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-Importateuren',
	'group-steward' => 'Stewarden',
	'group-sysadmin' => 'Systemadministrateuren',
	'group-Editinterface' => 'Interface änneren',
	'group-Global_bot' => 'Global Botten',
	'group-Global_rollback' => 'Global Zrécksetzer',
	'group-Ombudsmen' => 'Ombudsmänner',
	'group-Staff' => 'Mataarbechter',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'Systemadministrateur',
	'group-Editinterface-member' => 'Interface änneren',
	'group-Global_bot-member' => 'Globale Bot',
	'group-Global_rollback-member' => 'Globalen Zrécksetzer',
	'group-Ombudsmen-member' => 'Ombudsmann',
	'group-Staff-member' => 'Mataarbechter',
	'grouppage-steward' => '{{ns:project}}:Stewarden',
	'grouppage-sysadmin' => 'm:System Administrateuren',
	'grouppage-Global_bot' => 'm:Global bot',
	'grouppage-Staff' => 'Foundation:Personal',
	'group-coder' => 'Programméierer',
	'group-coder-member' => 'Programméierer',
	'group-inactive' => 'Benotzer déi net aktiv sinn',
	'group-inactive-member' => 'net aktive Benotzer',
	'grouppage-inactive' => '{{ns:project}}:Net aktiv Benotzer',
	'wikimedia-copyright' => 'Den Text ass disponibel ënnert der <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike Lizens</a>; zousätzlech Bedingunge kënnen applicabel sinn.
Kuckt <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Notzungsbedingungen</a> fir méi Detailer.',
	'wikimedia-copyrightwarning' => "Wann Dir ofspäichert, sidd Dir domat d'accord fir Äre Beitrag ënner der [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike Lizens 3.0] an der [http://www.gnu.org/copyleft/fdl.html GFDL] fräizeginn.
Dir sidd d'accord datt Dir vun denen déi dëst weiderbenotze, mindestens, duerch en Hyperlink oder URL op déi Säit op däer Dir matschafft honréiert gitt.
Kuckt d'[http://wikimediafoundation.org/wiki/Terms_of_Use Notzungsbedingungen] fir méi Detailer.",
	'wikimedia-editpage-tos-summary' => "Wann Dir net wëllt datt Ären Text vun Anere verännert a weiderverdeelt gëtt, da späichert et net hei of. Wann Dir dëst net selwer geschriwwen hutt, da muss et ënnert Konditiounen déi am Aklang mat [http://wikimediafoundation.org/wiki/Terms_of_Use Benotzungsbedingunge] sinn and Dir musst domat averstan sinn fir all Ufuederungen vun der Lizenz z'erfëllen.",
);

/** Lingua Franca Nova (Lingua Franca Nova)
 * @author Cgboeree
 */
$messages['lfn'] = array(
	'sitesupport' => 'Donas',
	'tooltip-n-sitesupport' => 'suporta nos',
);

/** Ganda (Luganda)
 * @author Kizito
 */
$messages['lg'] = array(
	'sitesupport' => 'Okutonera wiki',
	'tooltip-n-sitesupport' => "Nyiga wano ob'oyagala wiki okugiwa obuyambi obw'ensimbi",
);

/** Limburgish (Limburgs)
 * @author Matthias
 * @author Ooswesthoesbes
 * @author Pahles
 * @author לערי ריינהארט
 */
$messages['li'] = array(
	'wikimediamessages-desc' => 'Wikimedia-specifieke berichte',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Donaties',
	'tooltip-n-sitesupport' => 'Óngersteun ós financieel',
	'group-abusefilter' => 'misbroekfilterredaktäörs',
	'group-accountcreator' => 'Gebroekeraanmakers',
	'group-autopatroller' => 'autopatrollers',
	'group-autoreviewer' => 'Autoeindredactie',
	'group-bigexport' => 'groete exportäörs',
	'group-confirmed' => 'Gekonférmeerde gebroekers',
	'group-founder' => 'Gróndlègkers',
	'group-import' => 'Importäörs',
	'group-ipblock-exempt' => 'Oetgezunjerde van IP-adresblokkades',
	'group-rollbacker' => 'Trökdriejers',
	'group-transwiki' => 'Transwikiimportäörs',
	'group-abusefilter-member' => 'misbroekfilterredaktäör',
	'group-accountcreator-member' => 'Gebroekeraanmaker',
	'group-autopatroller-member' => 'autopatroller',
	'group-autoreviewer-member' => 'autoeindredactie',
	'group-bigexport-member' => 'groete exportäör',
	'group-confirmed-member' => 'Gekonférmeerde gebroeker',
	'group-founder-member' => 'Gróndlègker',
	'group-import-member' => 'Importäör',
	'group-ipblock-exempt-member' => 'Oetgezunjerde van IP-adresblokkades',
	'group-rollbacker-member' => 'Trökdriejer',
	'group-transwiki-member' => 'Transwikiimportäör',
	'grouppage-abusefilter' => '{{ns:project}}:Misbroekfilterredaktäöre',
	'grouppage-accountcreator' => '{{ns:project}}:Gebroekeraanmakers',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrollers',
	'grouppage-autoreviewer' => '{{ns:project}}:Autoeindredactie',
	'grouppage-bigexport' => '{{ns:project}}:Groete exportäörs',
	'grouppage-confirmed' => '{{ns:project}}:Gekonférmeerde gebroekers',
	'grouppage-founder' => '{{ns:project}}:Gróndlègkers',
	'grouppage-import' => '{{ns:project}}:Importäörs',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Oetgezunjerde van IP-adresblokkades',
	'grouppage-rollbacker' => '{{ns:project}}:Trökdriejers',
	'grouppage-transwiki' => '{{ns:project}}:Transwikiimportäörs',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Systeemwèrkers',
	'group-Editinterface' => 'Gebroekersinterfacebewirkers',
	'group-Global_bot' => 'Globale bots',
	'group-Global_rollback' => 'Globale trökdriejers',
	'group-Ombudsmen' => 'Ombudsmanne',
	'group-Staff' => 'Sjtaaf',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'Systeemwèrker',
	'group-Editinterface-member' => 'Gebroekersinterfacebewirker',
	'group-Global_bot-member' => 'Globale bot',
	'group-Global_rollback-member' => 'Globale trökdriejer',
	'group-Ombudsmen-member' => 'Ombudsman',
	'group-Staff-member' => 'Sjtaaflid',
	'grouppage-steward' => '{{ns:project}}:Stewards',
	'group-coder' => 'Pregrammäörs',
	'group-coder-member' => 'Pregrammäör',
	'group-inactive' => 'Neet-actieve gebroekers',
	'group-inactive-member' => 'Neet-actieve gebroeker',
	'grouppage-inactive' => '{{ns:project}}:Neet-actieve gebroekers',
	'wikimedia-copyright' => 'De teks is besjikbaar ónger de <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Naomsvermelding/Geliek Deile</a> licentie.
\'t Is mäögelik dat aanvöllende veurwaarde van toepassing zeen.
Betrach de <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Algemein Veurwaarde</a> veur mie informatie.',
	'wikimedia-copyrightwarning' => "Door dees bewirking op te sjlaon, geis doe akkoord mit 't ónherropelik vriegaeve van dien biedrage ónger de [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Noamsvermelding/Geliek Deile licentie] en de [http://www.gnu.org/copyleft/fdl.html GFDL].
Doe geis demit akkoord door hergebroekers minimaal geneump te waere via 'ne hyperlink of URL nao de pagina woe-aans diech biedreugs. Betrach de [http://wikimediafoundation.org/wiki/Terms_of_Use Algemein Veurwaarde] veur mie informatie.",
	'wikimedia-editpage-tos-summary' => 'Es doe neet wils dat dien biedraag bewirk of gedistribueerd wird, moos doe ze neet opsjlaon.
Es dien bewirking neet door dichzelf gesjreve is, moot de biedraag besjikbaar zien ónger condities die consistent zien mit de [http://wikimediafoundation.org/wiki/Terms_of_Use Algemein Veurwaarde] en geis doe akkoord mit alle relevante licentieveurwaarde.',
);

/** Líguru (Líguru)
 * @author ZeneizeForesto
 */
$messages['lij'] = array(
	'sitesupport' => 'Donasioin',
	'tooltip-n-sitesupport' => 'Agiûttine',
);

/** Lumbaart (Lumbaart)
 * @author Dakrismeno
 */
$messages['lmo'] = array(
	'sitesupport' => 'Dunazziun',
	'tooltip-n-sitesupport' => 'Dàss una man',
	'wikimedia-editpage-tos-summary' => "Se te vör mía che 'l to test 'l sia mudifegaa o redistribüii a vuluntà, alura metel mía chì denter.<br> Se te l'è no scrivüü tì medesim, 'l gh'ha de vess dispunibil suta di cundizión che i henn cumpatibil cun i [http://wikimediafoundation.org/wiki/Terms_of_Use cundizión d'usagg], e t'see d'acordi d'andà adree a tüt i requisii de la licenza.",
);

/** Lingala (Lingála) */
$messages['ln'] = array(
	'sitesupport' => 'Kofutela',
);

/** Lao (ລາວ)
 * @author Tuinui
 */
$messages['lo'] = array(
	'wikimediamessages-desc' => 'ຂໍ້ຄວາມສະເພາະ ວິກິພີເດຍ',
	'sitesupport' => 'ບໍລິຈາກ',
	'tooltip-n-sitesupport' => 'ສະໜັບສະໜຸນພວກເຮົາ',
	'group-Staff' => 'ພະນັກງານ',
	'group-Staff-member' => 'ພະນັກງານ',
);

/** Lozi (Silozi)
 * @author Ooswesthoesbes
 * @author SF-Language
 */
$messages['loz'] = array(
	'sitesupport' => 'Adonetarina',
	'tooltip-n-sitesupport' => 'Sepotisize',
);

/** Lithuanian (Lietuvių)
 * @author Homo
 * @author Hugo.arg
 * @author Matasg
 * @author Vpovilaitis
 */
$messages['lt'] = array(
	'wikimediamessages-desc' => 'Vikimedijos specialieji pranešimai',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/Now/lt?utm_source=donate&utm_medium=sidebar&utm_campaign=spontaneous_donation',
	'sitesupport' => 'Parama',
	'tooltip-n-sitesupport' => 'Palaikymas',
	'group-abusefilter' => 'Piktnaudžiavimo filtrų redaktoriai',
	'group-accountcreator' => 'Paskyrų kūrėjai',
	'group-autopatroller' => 'Autopatruliai',
	'group-autoreviewer' => 'Autoperžiūrėtojai',
	'group-bigexport' => 'Didieji eksportuotojai',
	'group-confirmed' => 'Patvirtinti naudotojai',
	'group-founder' => 'Įkūrėjai',
	'group-import' => 'Importuotojai',
	'group-ipblock-exempt' => 'IP blokavimo išimtys',
	'group-rollbacker' => 'Atmetėjai',
	'group-transwiki' => 'Transwiki įkėlėjai',
	'group-abusefilter-member' => 'piktnaudžiavimo filtrų redaktorius',
	'group-accountcreator-member' => 'sąskaitų kūrėjai',
	'group-autopatroller-member' => 'autopatrulis',
	'group-autoreviewer-member' => 'autoperžiūrėtojas',
	'group-bigexport-member' => 'didieji eksportuotojai',
	'group-confirmed-member' => 'patvirtintas naudotojas',
	'group-founder-member' => 'įkūrėjai',
	'group-import-member' => 'įkėlėjas',
	'group-ipblock-exempt-member' => 'atleistasis nuo IP blokavimo',
	'group-rollbacker-member' => 'atmesti',
	'group-transwiki-member' => 'transwiki įkėlėjai',
	'grouppage-abusefilter' => '{{ns:project}}:Piktnaudžiavimo filtrų redaktorius',
	'grouppage-accountcreator' => '{{ns:project}}:Sąskaitų kūrėjai',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatruliai',
	'grouppage-autoreviewer' => '{{ns:project}}:Autoperžiūrėtojai',
	'grouppage-bigexport' => '{{ns:project}}:Didieji eksportuotojai',
	'grouppage-confirmed' => '{{ns:project}}:Patvirtinti naudotojai',
	'grouppage-founder' => '{{ns:project}}:Įkūrėjai',
	'grouppage-import' => '{{ns:project}}:Importuotojai',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Atleistasis nuo IP blokavimo',
	'grouppage-rollbacker' => '{{ns:project}}:Atmetėjai',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki importuotojai',
	'group-steward' => 'Ūkvedžiai',
	'group-sysadmin' => 'Sistemos administratoriai',
	'group-Editinterface' => 'Sąsajos redaktoriai',
	'group-Global_bot' => 'Globalūs botai',
	'group-Global_rollback' => 'Visuotiniai keitimų grąžintojai',
	'group-Ombudsmen' => 'Ombudsmenai',
	'group-Staff' => 'Darbuotojai',
	'group-steward-member' => 'ūkvedys',
	'group-sysadmin-member' => 'sistemos administratorius',
	'group-Editinterface-member' => 'sąsajos redaktorius',
	'group-Global_bot-member' => 'visuotinis botas',
	'group-Global_rollback-member' => 'visuotinis atmetėjas',
	'group-Ombudsmen-member' => 'ombudsmenas',
	'group-Staff-member' => 'Darbuotojas',
	'group-coder' => 'Koduotojai',
	'group-coder-member' => 'koduotojas',
	'group-inactive' => 'Neaktyvūs naudotojai',
	'group-inactive-member' => 'neaktyvus naudotojas',
	'grouppage-inactive' => '{{ns:project}}:Neaktyvūs naudotojai',
	'wikimedia-copyright' => 'Turinys pateikiamas pagal <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike licenciją</a>;
gali galioti kitos nuostatos.
Norėdami sužinoti daugiau, žiūrėkite <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Naudojimo sąlygas</a>.',
	'wikimedia-copyrightwarning' => 'Išsaugodamas šį puslapį, Jūs sutinkate negrąžinamai platinti savo indėlį su [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] bei [http://www.gnu.org/copyleft/fdl.html GFDL] licencijomis.
Jūs sutinkate, kad būtumėte nurodytas mažiausiai per nuorodą ar URL, puslapyje, kuriame taisote.
Norėdami sužinoti daugiau, žiūrėkite [http://wikimediafoundation.org/wiki/Terms_of_Use Naudojimo sąlygas]',
	'wikimedia-editpage-tos-summary' => 'Jei nenorite, kad Jūsų darbas būtų negailestingai redaguojamas ir perskirstytas, jo čia nepublikuokite.
Jei šio darbo neparašėte Jūs, šis darbas turi būti suderinamas su [http://wikimediafoundation.org/wiki/Terms_of_Use Naudojimo sąlygomis]; Jūs sutinkate vykdyti visus svarbius licencijavimo reikalavimus.',
);

/** Latvian (Latviešu)
 * @author Papuass
 * @author Xil
 * @author Yyy
 */
$messages['lv'] = array(
	'wikimediamessages-desc' => 'Wikimedia raksturīgi paziņojumi',
	'sitesupport' => 'Ziedojumi',
	'tooltip-n-sitesupport' => 'Atbalsti mūs',
	'grouppage-import' => '{{ns:project}}:Importētāji',
	'group-inactive' => 'Neaktīvi lietotāji',
	'group-inactive-member' => 'neaktīvs lietotājs',
	'grouppage-inactive' => '{{ns:project}}:Neaktīvi lietotāji',
	'wikimedia-copyright' => 'Teksts ir pieejams saskaņā ar <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike licenci</a>;
var pastāvēt papildus ierobežojumi.
Plašākai informācijai skatīt <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Pielietošanas noteikumus</a>.',
	'wikimedia-copyrightwarning' => 'Saglabājot izmaiņas, jūs piekrītat savu ieguldījumu licencēt saskaņā ar [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike 3.0] un [http://www.gnu.org/copyleft/fdl.html GFDL] licenci.
Jūs piekrītat, ka satura izmantotāji uz jūsu darbu atsauksies vismaz ar saiti uz lapu, kurā jūs veicat izmaiņas.
Plašākai informācijai skatīt [http://wikimediafoundation.org/wiki/Terms_of_Use Pielietošanas noteikumus].',
	'wikimedia-editpage-tos-summary' => 'Ja jūs nevēlaties, lai jūsu rakstīto labo un izplata bez ierobežojumiem, neiesniedziet to šeit.
Ja šo tekstu nerakstījāt jūs, tam ir jābūt pieejamam ar nosacījumiem, kas saskan ar [http://wikimediafoundation.org/wiki/Terms_of_Use pielietošanas noteikumiem] un jūs piekrītat izpildīt visas saistošās licencēšanas prasības.',
);

/** Literary Chinese (文言) */
$messages['lzh'] = array(
	'wikimediamessages-desc' => '維基媒體特集',
	'sitesupport' => '捐助集',
	'tooltip-n-sitesupport' => '濟資財、施續命、傳美皓',
	'wikimedia-copyright' => '凡我維基之文，悉為<a href="http://creativecommons.org/licenses/by-sa/3.0/">共享創意授權</a>。翻印增刪，皆須引據，並同道為之。然條款繁多，不一而足。
請閱<a href="http://wikimediafoundation.org/wiki/Terms_of_Use">全文</a>，以得其詳。',
);

/** Maithili (मैथिली)
 * @author Ggajendra
 */
$messages['mai'] = array(
	'tooltip-n-sitesupport' => 'हमरा सभकेँ सहयोग करू',
);

/** Basa Banyumasan (Basa Banyumasan)
 * @author לערי ריינהארט
 */
$messages['map-bms'] = array(
	'sitesupport' => 'Sumbang dana',
);

/** Moksha (Мокшень)
 * @author Kranch
 * @author Numulunj pilgae
 */
$messages['mdf'] = array(
	'sitesupport' => 'Лезкс максома',
	'tooltip-n-sitesupport' => 'Макст тейнек лезкс',
	'group-Staff' => 'Персонал',
	'group-Staff-member' => 'Персоналста ломань',
);

/** Malagasy (Malagasy)
 * @author Jagwar
 */
$messages['mg'] = array(
	'wikimediamessages-desc' => 'Afatra manokana ny Wikimedia',
	'sitesupport' => 'Fanomezana',
	'tooltip-n-sitesupport' => 'Ampio izahay',
	'group-abusefilter' => "Mpanova ''Abuse filter''",
	'group-accountcreator' => 'Mpanokatra kaonty',
	'group-autopatroller' => 'Rôbô mpijery',
	'group-autoreviewer' => 'Mpamaky',
	'group-bigexport' => 'Mpamoaka be',
	'group-confirmed' => 'Mpikambana voamarina',
	'group-founder' => 'Mpamorina',
	'group-import' => 'Mpanafatra',
	'group-ipblock-exempt' => "Tsy afaka voasakana amin'ny adiresy IP",
	'group-rollbacker' => 'Mpamafa',
	'group-transwiki' => 'Mpanafatra transwiki',
	'group-abusefilter-member' => 'Mpanova filtre antiabus',
	'group-accountcreator-member' => 'Mpamokatra kaonty',
	'group-autopatroller-member' => 'Mpitsidika rôbô',
	'group-autoreviewer-member' => 'Mpamaky (rôbô)',
	'group-confirmed-member' => 'Mpikambana voamarina',
	'group-founder-member' => 'Mpamorina',
	'group-import-member' => 'Mpanafatra',
	'group-ipblock-exempt-member' => "Mpikambana tsy afaka voasakana amin'ny IP-ny",
	'group-rollbacker-member' => 'Mpamafa',
	'group-transwiki-member' => 'Mpanafatra transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:mpanova filtre antiabus',
	'grouppage-accountcreator' => '{{ns:project}}:Mpamokatra kaonty',
	'grouppage-autopatroller' => '{{ns:project}}:Rôbô Mpijery',
	'grouppage-autoreviewer' => '{{ns:project}}:Mpamaky mande hoazy',
	'grouppage-bigexport' => '{{ns:project}}:Mpamoaka be',
	'grouppage-founder' => '{{ns:project}}:Mpamorina',
	'group-steward' => 'Steward',
	'group-sysadmin' => 'Mpandrindra ny sistema',
	'group-Editinterface' => 'Mpanova ny interface',
	'group-Global_bot' => "Rôbô amin'ny ankapobe ny wiki",
	'group-Global_rollback' => "Mpamafa amin'ny ankapobe ny wiki",
	'group-Staff' => 'Staff',
	'group-steward-member' => 'Mpiambona (steward)',
	'group-sysadmin-member' => 'Mpandrindra ny Sistema',
	'group-Editinterface-member' => 'mpanova ny interface',
	'group-Staff-member' => "mpikamban'ny Staff",
	'group-coder' => 'Mpanakaody',
	'group-coder-member' => 'mpanakaody',
	'group-inactive' => 'mpikambana tsy miasa',
	'group-inactive-member' => 'mpikambana tsy miasa',
);

/** Eastern Mari (Олык Марий)
 * @author Amdf
 */
$messages['mhr'] = array(
	'sitesupport' => 'Надыр',
);

/** Maori (Māori) */
$messages['mi'] = array(
	'sitesupport' => 'Koha',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 * @author Brainmachine
 * @author Brest
 * @author Misos
 */
$messages['mk'] = array(
	'wikimediamessages-desc' => 'Пораки кои се однесуваат на Викимедија',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Донации',
	'tooltip-n-sitesupport' => 'Поддржете нè',
	'group-abusefilter' => 'Уредници на филтерот на злоупотреба',
	'group-accountcreator' => 'Создавачи на сметки',
	'group-autopatroller' => 'Автоматски патролирани',
	'group-autoreviewer' => 'Автооценувачи',
	'group-bigexport' => 'Големи извозници',
	'group-confirmed' => 'Потврдени корисници',
	'group-founder' => 'Основачи',
	'group-import' => 'Увезувачи',
	'group-ipblock-exempt' => 'IP блок исклучоци',
	'group-rollbacker' => 'Враќачи',
	'group-transwiki' => 'Трансвики увезувачи',
	'group-abusefilter-member' => 'уредник на филтерот за за злоупотреби',
	'group-accountcreator-member' => 'создавач на сметка',
	'group-autopatroller-member' => 'автоматски патролирач',
	'group-autoreviewer-member' => 'автооценувач',
	'group-bigexport-member' => 'голем извозник',
	'group-confirmed-member' => 'потврден корисник',
	'group-founder-member' => 'основач',
	'group-import-member' => 'увозник',
	'group-ipblock-exempt-member' => 'IP блок исклучок',
	'group-rollbacker-member' => 'враќач',
	'group-transwiki-member' => 'трансвики увозник',
	'grouppage-abusefilter' => '{{ns:project}}:Уредници на филтер на злоупотреби',
	'grouppage-accountcreator' => '{{ns:project}}:Создавачи на сметки',
	'grouppage-autopatroller' => '{{ns:project}}:Автоматски патролирачи',
	'grouppage-autoreviewer' => '{{ns:project}}:Автооценувачи',
	'grouppage-bigexport' => '{{ns:project}}:Големи извозници',
	'grouppage-confirmed' => '{{ns:project}}:Потврдени корисници',
	'grouppage-founder' => '{{ns:project}}:Основачи',
	'grouppage-import' => '{{ns:project}}:Увезувачи',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP блок исклучок',
	'grouppage-rollbacker' => '{{ns:project}}:Враќачи',
	'grouppage-transwiki' => '{{ns:project}}:Трансвики увезувачи',
	'group-steward' => 'Стјуарди',
	'group-sysadmin' => 'Систем администратори',
	'group-Editinterface' => 'Уредници на интерфејс',
	'group-Global_bot' => 'Глобални ботови',
	'group-Global_rollback' => 'Глобални враќачи',
	'group-Ombudsmen' => 'Правозастапници',
	'group-Staff' => 'Персонал',
	'group-steward-member' => 'стјуард',
	'group-sysadmin-member' => 'систем администратор',
	'group-Editinterface-member' => 'уредник на интерфејс',
	'group-Global_bot-member' => 'глобален бот',
	'group-Global_rollback-member' => 'глобален враќач',
	'group-Ombudsmen-member' => 'правозастапник',
	'group-Staff-member' => 'член на персонал',
	'grouppage-steward' => 'm:Стјуарди',
	'grouppage-sysadmin' => 'm:Систем администратори',
	'grouppage-Global_bot' => 'm:Глобален бот',
	'grouppage-Global_rollback' => 'm:Глобално враќање',
	'grouppage-Ombudsmen' => 'm:Ombudsman commission',
	'group-coder' => 'Програмери',
	'group-coder-member' => 'програмер',
	'grouppage-coder' => 'Project:Програмер',
	'group-inactive' => 'Неактивни корисници',
	'group-inactive-member' => 'неактивен корисник',
	'grouppage-inactive' => '{{ns:project}}:Нективни корисници',
	'wikimedia-copyright' => 'Текстот е достапен под условите на <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.mk">Creative Commons Attribution/Share-Alike License</a>;
можат да важат и дополнителни услови.
Видете ги <a href="http://wikimediafoundation.org/wiki/%D0%A3%D1%81%D0%BB%D0%BE%D0%B2%D0%B8_%D0%BD%D0%B0_%D1%83%D0%BF%D0%BE%D1%82%D1%80%D0%B5%D0%B1%D0%B0">условите на употреба</a> за детали.',
	'wikimedia-copyrightwarning' => 'Со зачувувањето на страницата Вие неотповикливо се согласувате дека ги објавувате Вашите придонеси под условите на [http://creativecommons.org/licenses/by-sa/3.0/deed.mk Creative Commons Attribution/Share-Alike License 3.0] и на [http://www.gnu.org/copyleft/fdl.html GFDL].
Вие се согласувате да добиете заслуга од наредните употребувачи на оваа содржина најмалку преку хиперврска или URL до страницата на која придонесувате. 
Видете ги [http://wikimediafoundation.org/wiki/%D0%A3%D1%81%D0%BB%D0%BE%D0%B2%D0%B8_%D0%BD%D0%B0_%D1%83%D0%BF%D0%BE%D1%82%D1%80%D0%B5%D0%B1%D0%B0 условите на употреба] за детали.',
	'wikimedia-editpage-tos-summary' => 'Ако не сакате Вашиот текст да биде уредуван и дистрибуиран во секое време, тогаш не го поднесувајте овде.
Ако Вие самите не го напишавте текстот, тогаш тој мора да биде достапен под услови кои се согласни со [http://wikimediafoundation.org/wiki/%D0%A3%D1%81%D0%BB%D0%BE%D0%B2%D0%B8_%D0%BD%D0%B0_%D1%83%D0%BF%D0%BE%D1%82%D1%80%D0%B5%D0%B1%D0%B0 условите на употреба] и се согласувате дека ќе следите било какви барања за лиценцирање.',
);

/** Malayalam (മലയാളം)
 * @author Anoopan
 * @author Junaidpv
 * @author Meno25
 * @author Praveenp
 * @author ShajiA
 * @author Shijualex
 * @author Vssun
 * @author לערי ריינהארט
 */
$messages['ml'] = array(
	'wikimediamessages-desc' => 'വിക്കിമീഡിയയുമായി ബന്ധപ്പെട്ട സന്ദേശങ്ങള്‍',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/ml',
	'sitesupport' => 'സംഭാവന',
	'tooltip-n-sitesupport' => 'ഞങ്ങളെ പിന്തുണക്കുക',
	'group-accountcreator' => 'അക്കൗണ്ട് സ്രഷ്ടാക്കള്‍',
	'group-founder' => 'സ്ഥാപകര്‍',
	'group-steward' => 'സ്റ്റ്യൂവാര്‍ഡുകള്‍',
	'group-Global_bot' => 'ആഗോള യന്ത്രങ്ങള്‍',
	'group-steward-member' => 'സ്റ്റ്യൂവാര്‍ഡ്',
	'group-Global_bot-member' => 'ആഗോള ബോട്ട്',
	'group-inactive' => 'സജീവരല്ലാത്ത ഉപയോക്താക്കൾ',
	'group-inactive-member' => 'സജീവമല്ലാത്ത ഉപയോക്താവ്',
	'grouppage-inactive' => '{{ns:project}}:സജീവരല്ലാത്ത ഉപയോക്താക്കൾ',
	'wikimedia-copyright' => 'ഈ താള്‍ <a href="http://creativecommons.org/licenses/by-sa/3.0/">ക്രിയേറ്റീവ് കോമണ്‍സ് ആട്രിബ്യൂഷന്‍/ഷെയര്‍-എലൈക്ക് പകര്‍പ്പവകാശ നിയമത്തിനു കീഴില്‍</a> ലഭ്യമാണ്. കൂടുതല്‍ നിബന്ധനകള്‍ ചിലപ്പോള്‍ ഉണ്ടാവാം. കൂടുതല്‍ വിവരങ്ങള്‍ക്ക് <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">നിബന്ധനാ പ്രമാണം</a> കാണുക.',
	'wikimedia-copyrightwarning' => 'സേവ് ചെയ്യുന്നതിനു മുന്‍പ്, നിങ്ങള്‍ എഴുതിച്ചേര്‍ത്തത് [http://creativecommons.org/licenses/by-sa/3.0/ ക്രിയേറ്റീവ് കോമണ്‍സ്/ഷെയര്‍ എലൈക് 3.0], [http://www.gnu.org/copyleft/fdl.html ജി.എഫ്.ഡി.എല്‍.] എന്നീ അനുമതിപത്രങ്ങള്‍ പ്രകാരം പിന്നീട് മാറ്റാന്‍ പറ്റാത്തവിധം വിതരണം ചെയ്യുന്നതിനായി അംഗീകരിച്ചിരിക്കണം. നിങ്ങള്‍ മാറ്റങ്ങള്‍ വരുത്തിയ താളിനെ പുനരുപയോഗിക്കുന്നവര്‍, കുറഞ്ഞ പക്ഷം അതിലേക്ക് ഒരു ഹൈപ്പര്‍ലിങ്കോ യു.ആര്‍.എല്ലോ ഉപയോഗിച്ച് കടപ്പാട് നല്‍കുമെന്നും മനസിലാക്കിയിരിക്കണം. 
കൂടുതല്‍ വിവരങ്ങള്‍ക്ക് [http://wikimediafoundation.org/wiki/Terms_of_Use ഉപയോഗിക്കാനുള്ള നിബന്ധനകള്‍] കാണുക.',
	'wikimedia-editpage-tos-summary' => 'താങ്കളുടെ എഴുത്ത് തിരുത്തുകയും പുനർവിതരണം ചെയ്യുന്നതും അനുവദിക്കാനാകില്ലങ്കിൽ, അത് ഇവിടെ സമർപ്പിക്കാതിരിക്കുക.
ഇത് താങ്കൾ തന്നെ എഴുതിയതല്ലങ്കിൽ, നിർബന്ധമായും [http://wikimediafoundation.org/wiki/Terms_of_Use നിബന്ധനാ പ്രമാണത്തിനു] വിധേയമായി ലഭ്യമായിരിക്കണം, ഒപ്പം ബന്ധപ്പെട്ട അനുമതികൾ താങ്കൾ അംഗീകരിക്കേണ്ടതുമാണ്.',
);

/** Mongolian (Монгол)
 * @author Chinneeb
 * @author לערי ריינהארט
 */
$messages['mn'] = array(
	'sitesupport' => 'Хандив',
	'tooltip-n-sitesupport' => 'Биднийг дэмжээрэй',
	'group-rollbacker' => 'Буцаагчид',
	'group-rollbacker-member' => 'буцаагч',
	'grouppage-rollbacker' => '{{ns:project}}:Буцаагчид',
	'group-Global_rollback' => 'Глобал буцаагчид',
	'group-Global_rollback-member' => 'глобал буцаагч',
);

/** Moldavian (Молдовеняскэ)
 * @author Node ue
 */
$messages['mo'] = array(
	'tooltip-n-sitesupport' => 'Сприжиниць-не',
);

/** Marathi (मराठी)
 * @author Mahitgar
 */
$messages['mr'] = array(
	'wikimediamessages-desc' => 'विकिमीडियाबद्दलचे विशीष्ट संदेश',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/Chapters/mr',
	'sitesupport' => 'दान',
	'tooltip-n-sitesupport' => 'आम्हाला पाठबळ द्या',
	'group-abusefilter' => 'दुरूपयोग गाळ्णी संपादक',
	'group-accountcreator' => 'खाते विकसक',
	'group-autopatroller' => 'स्वयंचलीतगस्तदार',
	'group-bigexport' => 'मोठे निर्यातक',
	'group-founder' => 'संस्थापक',
	'group-import' => 'आयातदार',
	'group-ipblock-exempt' => 'अंकपत्ता प्रतिबंधन सूट',
	'group-rollbacker' => 'द्रूतमाघारकार',
	'group-transwiki' => 'आंतरविकि आयातदार',
	'group-abusefilter-member' => 'दुरूपयोग गाळणी संपादक',
	'group-accountcreator-member' => 'खाते विकसक',
	'group-autopatroller-member' => 'स्वयंचलीतगस्तदार',
	'group-bigexport-member' => 'मोठे निर्यातदार',
	'group-founder-member' => 'संस्थापक',
	'group-import-member' => 'आयातदार',
	'group-ipblock-exempt-member' => 'अंकपत्ता प्रतिबंधन सूट',
	'group-rollbacker-member' => 'द्रूतमाघारकार',
	'group-transwiki-member' => 'आंतरविकि आयातदार',
	'grouppage-abusefilter' => '{{ns:project}}:दुरूपयोग गाळणी संपादक',
	'grouppage-accountcreator' => '{{ns:project}}:खाते विकसक',
	'grouppage-autopatroller' => '{{ns:project}}:स्वयंचलीतगस्तदार',
	'grouppage-bigexport' => '{{ns:project}}:मोठे निर्यातक',
	'grouppage-founder' => '{{ns:project}}:संस्थापक',
	'grouppage-import' => '{{ns:project}}:आयातदार',
	'grouppage-ipblock-exempt' => '{{ns:project}}:अंकपत्ता प्रतिबंधन अपवाद',
	'grouppage-rollbacker' => '{{ns:project}}:माघारकार',
	'grouppage-transwiki' => '{{ns:project}}:आंतरविकि चढवैय्ये',
	'group-steward' => 'प्रतिपालक',
	'group-sysadmin' => 'प्रचालक',
	'group-Global_bot' => 'वैश्विक सांगकामे',
	'group-Global_rollback' => 'वैश्विक माघारकार',
	'group-Ombudsmen' => 'लोकाआयूक्त',
	'group-Staff' => 'स्टाफ',
	'group-steward-member' => 'प्रतिपालक',
	'group-sysadmin-member' => 'प्रचालक',
	'group-Global_bot-member' => 'वैश्विक सांगकाम्या',
	'group-Global_rollback-member' => 'वैश्विक द्रूतमाघारकार',
	'group-Ombudsmen-member' => 'लोकआयूक्त',
	'group-Staff-member' => 'स्टाफ सदस्य',
	'group-coder' => 'संहिता(कोडर्स)',
	'group-coder-member' => 'संहिता(कोडर)',
	'group-inactive' => 'निष्क्रीय सदस्य',
	'group-inactive-member' => 'निष्क्रीय सदस्य',
	'grouppage-inactive' => '{{ns:project}}:निष्क्रीय सदस्य',
);

/** Malay (Bahasa Melayu)
 * @author Aurora
 * @author Aviator
 * @author Izzudin
 * @author Kurniasan
 */
$messages['ms'] = array(
	'wikimediamessages-desc' => 'Pesanan-pesanan Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Derma',
	'tooltip-n-sitesupport' => 'Derma',
	'group-abusefilter' => 'Penyunting penapis salah laku',
	'group-accountcreator' => 'Pencipta akaun',
	'group-autopatroller' => 'Autoperonda',
	'group-autoreviewer' => 'Pemeriksaautomatik',
	'group-bigexport' => 'Pengeksport besar',
	'group-confirmed' => 'Pengguna sah',
	'group-founder' => 'Pengasas',
	'group-import' => 'Pengimport',
	'group-ipblock-exempt' => 'Pengecualian sekatan IP',
	'group-rollbacker' => 'Pengundur',
	'group-transwiki' => 'Pengimport rentas wiki',
	'group-abusefilter-member' => 'penyunting penapis salah laku',
	'group-accountcreator-member' => 'Pencipta akaun',
	'group-autopatroller-member' => 'autoperonda',
	'group-autoreviewer-member' => 'pemeriksaautomatik',
	'group-bigexport-member' => 'pengeksport besar',
	'group-confirmed-member' => 'Pengguna sah',
	'group-founder-member' => 'Pengasas',
	'group-import-member' => 'Pengimport',
	'group-ipblock-exempt-member' => 'Pengecualian sekatan IP',
	'group-rollbacker-member' => 'Pengundur',
	'group-transwiki-member' => 'Pengimport rentas wiki',
	'grouppage-abusefilter' => '{{ns:project}}:Penyunting penapis salah laku',
	'grouppage-accountcreator' => '{{ns:project}}:Pencipta akaun',
	'grouppage-autopatroller' => '{{ns:project}}:Autoperonda',
	'grouppage-autoreviewer' => '{{ns:project}}:Pemeriksaautomatik',
	'grouppage-bigexport' => '{{ns:project}}:Pengeksport besar',
	'grouppage-confirmed' => '{{ns:project}}:Pengguna sah',
	'grouppage-founder' => '{{ns:project}}:Pengasas',
	'grouppage-import' => '{{ns:project}}:Pengimport',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Pengecualian sekatan IP',
	'grouppage-rollbacker' => '{{ns:project}}:Pengundur suntingan',
	'grouppage-transwiki' => '{{ns:project}}:Pengimport rentas wiki',
	'group-steward' => 'Pengelola',
	'group-sysadmin' => 'Pentadbir sistem',
	'group-Global_bot' => 'Bot sejagat',
	'group-Global_rollback' => 'Pengundur suntingan sejagat',
	'group-Ombudsmen' => 'Ombudsman',
	'group-Staff' => 'Kakitangan',
	'group-steward-member' => 'Pengelola',
	'group-sysadmin-member' => 'pentadbir sistem',
	'group-Global_bot-member' => 'Bot sejagat',
	'group-Global_rollback-member' => 'Pengundur suntingan sejagat',
	'group-Ombudsmen-member' => 'Ombudsman',
	'group-Staff-member' => 'kakitangan',
	'group-coder' => 'Pengekod',
	'group-coder-member' => 'pengekod',
	'group-inactive' => 'Pengguna tak aktif',
	'group-inactive-member' => 'pengguna tak aktif',
	'grouppage-inactive' => '{{ns:project}}:Pengguna tak aktif',
	'wikimedia-copyright' => 'Teks boleh didapati di bawah <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a>;
syarat tambahan mungkin terpakai.
Lihat <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Terma Penggunaan</a> untuk perincian.',
	'wikimedia-copyrightwarning' => 'Dengan menyimpan, anda bersetuju untuk mengeluarkan sumbangan anda di bawah [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] dan [http://www.gnu.org/copyleft/fdl.html GFDL] dan tidak menarik baliknya.
Anda bersetuju untuk dikreditkan oleh pengguna semula, secara minimum, melalui pautan hiper atau URL ke laman di mana anda menyumbang.
Lihat [http://wikimediafoundation.org/wiki/Terms_of_Use Terma Penggunaan] untuk perincian.',
	'wikimedia-editpage-tos-summary' => 'Jika anda tidak mahu tulisan anda disunting dan diedarkan secara bebas oleh orang lain, maka jangan kirimkannya di sini.
Jika anda tidak menulisnya sendiri, ia mestilah dapat diperolehi di bawah syarat yang sejajar dengan [http://wikimediafoundation.org/wiki/Terms_of_Use Terma Penggunaan], dan anda bersetuju mengikuti sebarang keperluan pelesenan yang berkaitan.',
);

/** Maltese (Malti)
 * @author Chrisportelli
 * @author Giangian15
 */
$messages['mt'] = array(
	'wikimediamessages-desc' => "Messaġġi speċifiki ta' Wikimedija",
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donazzjonijiet',
	'sitesupport' => 'Donazzjonijiet',
	'tooltip-n-sitesupport' => 'Appoġġjana',
	'group-accountcreator' => "Kreaturi ta' kontijiet",
	'group-founder' => 'Fundaturi',
	'group-import' => 'Importaturi',
	'group-ipblock-exempt' => 'eżenzjonijiet tal-blokki tal-IP',
	'group-bigexport-member' => 'esportatur kbir',
	'group-confirmed-member' => 'utent konfermat',
	'group-founder-member' => 'fundatur',
	'group-import-member' => 'importatur',
	'group-ipblock-exempt-member' => 'eżenti mill-blokk IP',
	'group-rollbacker-member' => 'rollbacker',
	'group-transwiki-member' => 'importatur transwiki',
	'grouppage-founder' => '{{ns:project}}:Fundaturi',
	'grouppage-import' => '{{ns:project}}:Importaturi',
	'group-steward' => 'Stwetti',
	'group-sysadmin' => 'Amministraturi tas-sistema',
	'group-Global_bot' => 'Bots globali',
	'group-Ombudsmen' => 'Ombudsmen',
	'group-Staff' => 'Uffiċjal',
	'group-steward-member' => 'stwett',
	'group-sysadmin-member' => 'amministratur tas-sistema',
	'group-Global_bot-member' => 'bot globali',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'Membru uffiċjal',
	'group-inactive' => 'utenti inattivi',
	'group-inactive-member' => 'utent inattiv',
	'grouppage-inactive' => '{{ns:project}}:Utenti inattivi',
	'wikimedia-copyright' => 'It-test huwa disponibbli taħt il-<a href="http://creativecommons.org/licenses/by-sa/3.0/">Liċenzja Creative Commons Attribution/Share-Alike</a>;
termini addizjonali jistgħu japplikaw.
Ara t-<a href="http://wikimediafoundation.org/wiki/Terms_of_Use">termini ta\' użu</a> għal aktar dettalji.',
	'wikimedia-copyrightwarning' => "Billi ssalva l-paġna, int tkun qed taqbel li tirrilaxxa rrevokabilment il-kontribuzzjoni tiegħek taħt il-liċenzja [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] u l-[http://www.gnu.org/copyleft/fdl.html GFDL].
Inti taqbel li bħala minimu tiġi kreditat minn utenti oħra permezz ta' ħolqa jew URL lejn il-paġna li inti qed tikkontribwixxi fuq.
Ara t-[http://wikimediafoundation.org/wiki/Terms_of_Use termini ta' użu] għal aktar dettalji.",
	'wikimedia-editpage-tos-summary' => "Jekk ma tridx li l-ktiba tiegħek tiġi modifikata jew ridistribwita skont dak mixtieq, allura ddaħħalhiex hawnhekk. Jekk inti ma ktibx din il-ktiba, din trid tkun disponibbli taħt it-termini konsistenti mat-[http://wikimediafoundation.org/wiki/Terms_of_Use termini ta' użu], u trid taċċetta li ssegwi r-rekwiżiti kollha ta' liċenzja.",
);

/** Mirandese (Mirandés)
 * @author Cecílio
 * @author MCruz
 */
$messages['mwl'] = array(
	'sitesupport' => 'Donaçones',
	'tooltip-n-sitesupport' => 'Ajuda-mos',
);

/** Burmese (မြန်မာဘာသာ)
 * @author Hakka
 * @author Hintha
 */
$messages['my'] = array(
	'sitesupport' => 'လှု​ဒါန်း​မှု​',
	'tooltip-n-sitesupport' => 'အားပေးပါ',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 * @author Sura
 */
$messages['myv'] = array(
	'sitesupport' => 'Лезксйармаконь максома',
	'tooltip-n-sitesupport' => 'Макста миненек нежедематарка',
	'group-confirmed' => 'Кемекстань сёрмадыцят',
	'group-founder' => 'Лувонь путыйть',
	'group-confirmed-member' => 'кемекстань сёрмадыця',
	'group-founder-member' => 'лувонь путый',
	'group-import-member' => 'тевень совавтый',
	'grouppage-confirmed' => '{{ns:project}}:Кемекстань сёрмадыцят',
	'grouppage-founder' => '{{ns:project}}:Лувонь путыйть',
	'grouppage-import' => '{{ns:project}}:Тевень совавтыйть',
	'group-steward' => 'Туросторт',
	'group-sysadmin' => 'Системань администраторт',
	'group-Editinterface' => 'Интерчамань витнийть-петнийть',
	'group-steward-member' => 'туростор',
	'group-Editinterface-member' => 'интерчамань витний-петний',
);

/** Mazanderani (مَزِروني)
 * @author Spacebirdy
 */
$messages['mzn'] = array(
	'sitesupport' => 'پیلی کایر',
);

/** Nauru (Dorerin Naoero) */
$messages['na'] = array(
	'sitesupport' => 'Eadu a me',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'sitesupport' => 'Tēyocatiliztli',
	'tooltip-n-sitesupport' => 'Xitēchtēpalēhuia',
	'group-founder-member' => 'Chīhualōni',
	'group-Staff' => 'Olōlli',
	'group-Staff-member' => 'Olōllācatl',
);

/** Min Nan Chinese (Bân-lâm-gú) */
$messages['nan'] = array(
	'sitesupport' => 'Kià-hù',
);

/** Neapolitan (Nnapulitano)
 * @author Cryptex
 */
$messages['nap'] = array(
	'sitesupport' => 'Donazzione',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 * @author לערי ריינהארט
 */
$messages['nds'] = array(
	'wikimediamessages-desc' => 'Systemnarichten för Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Spennen',
	'tooltip-n-sitesupport' => 'Ünnerstütt uns',
	'group-abusefilter' => 'Missbruukfilter-Autorn',
	'group-accountcreator' => 'Brukerkonten-Opstellers',
	'group-autopatroller' => 'Autopatrollers',
	'group-bigexport' => 'Grootexportörs',
	'group-founder' => 'Grünners',
	'group-import' => 'Importörs',
	'group-ipblock-exempt' => 'IP-Sperr-Utnahmen',
	'group-rollbacker' => 'Trüchsetters',
	'group-transwiki' => 'Transwiki-Importörs',
	'group-abusefilter-member' => 'Missbruukfilter-Autor',
	'group-accountcreator-member' => 'Brukerkonten-Opsteller',
	'group-autopatroller-member' => 'Autopatroller',
	'group-bigexport-member' => 'Grootexportör',
	'group-founder-member' => 'Grünner',
	'group-import-member' => 'Importör',
	'group-ipblock-exempt-member' => 'IP-Sperr-Utnahm',
	'group-rollbacker-member' => 'Trüchsetter',
	'group-transwiki-member' => 'Transwiki-Importör',
	'grouppage-abusefilter' => '{{ns:project}}:Missbruukfilter-Autorn',
	'grouppage-accountcreator' => '{{ns:project}}:Brukerkonten-Opstellers',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrollers',
	'grouppage-bigexport' => '{{ns:project}}:Grootexportörs',
	'grouppage-founder' => '{{ns:project}}:Grünners',
	'grouppage-import' => '{{ns:project}}:Importörs',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-Sperr-Utnahm',
	'grouppage-rollbacker' => '{{ns:project}}:Trüchsetters',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-Importörs',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'System-Administraters',
	'group-Global_bot' => 'Globale Bots',
	'group-Global_rollback' => 'Globale Trüchsetters',
	'group-Ombudsmen' => 'Ombudslüüd',
	'group-Staff' => 'Mitarbeiders',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'System-Administrater',
	'group-Global_bot-member' => 'Global Bot',
	'group-Global_rollback-member' => 'Global Trüchsetter',
	'group-Ombudsmen-member' => 'Ombudsmann',
	'group-Staff-member' => 'Mitarbeider',
	'group-coder' => 'Programmerers',
	'group-coder-member' => 'Programmerer',
	'group-inactive' => 'Inaktive Brukers',
	'group-inactive-member' => 'Inaktiven Bruker',
	'grouppage-inactive' => '{{ns:project}}:Inaktive Brukers',
);

/** Nedersaksisch (Nedersaksisch)
 * @author Servien
 * @author לערי ריינהארט
 */
$messages['nds-nl'] = array(
	'wikimediamessages-desc' => 'Systeemteksen veur Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/Now/nds-nl',
	'sitesupport' => 'Financiële steun',
	'tooltip-n-sitesupport' => 'Gef oons geald',
	'group-abusefilter' => 'misbruukfilterredacteuren',
	'group-accountcreator' => 'gebrukeranmakers',
	'group-autopatroller' => 'autopatrollers',
	'group-autoreviewer' => 'auto-eindredactie',
	'group-bigexport' => 'grote uutvoerders',
	'group-confirmed' => 'bevestigen gebrukers',
	'group-founder' => 'grondlegers',
	'group-import' => 'invoerders',
	'group-ipblock-exempt' => 'uutzunderingen van IP-adresblokkeringen',
	'group-rollbacker' => 'weerummedreiers',
	'group-transwiki' => 'transwiki-invoerders',
	'group-accountcreator-member' => 'gebrukeranmaker',
	'group-autopatroller-member' => 'autopatroller',
	'group-confirmed-member' => 'bevestigen gebruker',
	'group-founder-member' => 'grondleger',
	'group-import-member' => 'invoerder',
	'group-ipblock-exempt-member' => 'uutzundering van IP-adresblokkeringen',
	'group-rollbacker-member' => 'weerummedreier',
	'group-transwiki-member' => 'transwiki-invoerder',
	'grouppage-accountcreator' => '{{ns:project}}:Gebrukeranmakers',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrollers',
	'grouppage-founder' => '{{ns:project}}:Grondlegers',
	'grouppage-import' => '{{ns:project}}:Invoerders',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Uutzunderingen van IP-adresblokkeringen',
	'grouppage-rollbacker' => '{{ns:project}}:Weerummedreiers',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-invoerders',
	'group-steward' => 'rechenbeheerders',
	'group-sysadmin' => 'systeembeheerder',
	'group-Global_bot' => 'globale bots',
	'group-Global_rollback' => 'globale weerummedreiers',
	'group-Ombudsmen' => 'ombudsluui',
	'group-Staff' => 'staf',
	'group-steward-member' => 'rechenbeheerder',
	'group-sysadmin-member' => 'systeembeheerder',
	'group-Global_bot-member' => 'globale bot',
	'group-Global_rollback-member' => 'globale weerummedreier',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'staflid',
	'group-coder' => 'progremmeurs',
	'group-coder-member' => 'progremmeur',
	'wikimedia-copyright' => 'De tekse ku-j naolezen onder de licentie <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Naamvermelding/Gelieke delen</a>.
\'t Kan ween dat nog meer veurweerden van toepassing bin.
Bekiek de <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Algemene Veurweerden</a> veur meer infermasie.',
	'wikimedia-copyrightwarning' => "A-j disse bewarking opslaon, dan stem je in mit 't vriegeven van joew biedrage onder de licentie [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Naamvermelding/Gelieke delen] en de [http://www.gnu.org/copyleft/fdl.html GFDL], dit ku-w neet weerummedreien.
Je stemmen dermee in deur hergebrukers op z'n mins eneumd te wonnen via een verwiezing naor de pagina waor je an biedragen.
Bekiek de [http://wikimediafoundation.org/wiki/Terms_of_Use Algemene Veurweerden] veur meer infermasie.",
	'wikimedia-editpage-tos-summary' => "A-j neet willen dat joew biedrage bewark of verspreit wonnen, slao 't dan neet op.
A-j de tekse neet zelf eschreven hemmen, dan mut de biedrage beschikbaor ween onder de [http://wikimediafoundation.org/wiki/Terms_of_Use Algemene Veurweerden] en stem je in mit alle rillevante licentieveurweerden.",
);

/** Nepali (नेपाली) */
$messages['ne'] = array(
	'sitesupport' => 'चन्दा',
);

/** Newari (नेपाल भाषा)
 * @author Eukesh
 */
$messages['new'] = array(
	'sitesupport' => 'दान',
);

/** Dutch (Nederlands)
 * @author Mwpnl
 * @author Niels
 * @author Pahles
 * @author SPQRobin
 * @author Siebrand
 * @author Troefkaart
 * @author Tvdm
 */
$messages['nl'] = array(
	'wikimediamessages-desc' => 'Berichten voor Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Giften',
	'sitesupport' => 'Donaties',
	'tooltip-n-sitesupport' => 'Ondersteun ons financieel',
	'group-abusefilter' => 'misbruikfilterredacteuren',
	'group-accountcreator' => 'gebruikersaanmakers',
	'group-autopatroller' => 'autopatrollers',
	'group-autoreviewer' => 'autoeindredactie',
	'group-bigexport' => 'grote exporteurs',
	'group-confirmed' => 'bevestigde gebruikers',
	'group-founder' => 'grondleggers',
	'group-import' => 'importeurs',
	'group-ipblock-exempt' => 'uitgezonderden van IP-adresblokkades',
	'group-rollbacker' => 'terugdraaiers',
	'group-transwiki' => 'transwiki-importeurs',
	'group-abusefilter-member' => 'misbruikfilterredacteur',
	'group-accountcreator-member' => 'gebruikersaanmaker',
	'group-autopatroller-member' => 'autopatroller',
	'group-autoreviewer-member' => 'autoeindredactie',
	'group-bigexport-member' => 'grote exporteur',
	'group-confirmed-member' => 'bevestigde gebruiker',
	'group-founder-member' => 'grondlegger',
	'group-import-member' => 'importeur',
	'group-ipblock-exempt-member' => 'uitgezonderde van IP-adresblokkades',
	'group-rollbacker-member' => 'terugdraaier',
	'group-transwiki-member' => 'transwiki-importeur',
	'grouppage-abusefilter' => '{{ns:project}}:Misbruikfilterredacteuren',
	'grouppage-accountcreator' => '{{ns:project}}:Gebruikersaanmakers',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrollers',
	'grouppage-autoreviewer' => '{{ns:project}}:Autoeindredactie',
	'grouppage-bigexport' => '{{ns:project}}:Grote exporteurs',
	'grouppage-confirmed' => '{{ns:project}}:Bevestigde gebruikers',
	'grouppage-founder' => '{{ns:project}}:Grondleggers',
	'grouppage-import' => '{{ns:project}}:Importeurs',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Uitgezonderden van IP-adresblokkades',
	'grouppage-rollbacker' => '{{ns:project}}:Terugdraaiers',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-importeurs',
	'group-steward' => 'stewards',
	'group-sysadmin' => 'systeembeheerders',
	'group-Editinterface' => 'gebruikersinterfacebewerkers',
	'group-Global_bot' => 'globale bots',
	'group-Global_rollback' => 'globale terugdraaiers',
	'group-Ombudsmen' => 'ombudsmannen',
	'group-Staff' => 'staf',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'systeembeheerder',
	'group-Editinterface-member' => 'gebruikersinterfacebewerker',
	'group-Global_bot-member' => 'globale bot',
	'group-Global_rollback-member' => 'globale terugdraaier',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'staflid',
	'grouppage-steward' => 'm:Stewards/nl',
	'grouppage-Global_rollback' => 'm:Global rollback/nl',
	'group-coder' => 'programmeurs',
	'group-coder-member' => 'programmeur',
	'grouppage-coder' => 'Project:Programmeur',
	'group-inactive' => 'inactieve gebruikers',
	'group-inactive-member' => 'inactieve gebruiker',
	'grouppage-inactive' => '{{ns:project}}:Inactieve gebruikers',
	'wikimedia-copyright' => 'De tekst is beschikbaar onder de licentie <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Naamsvermelding/Gelijk delen</a>.
Het is mogelijk dat aanvullende voorwaarden van toepassing zijn.
Zie de <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Gebruiksvoorwaarden</a> voor meer informatie.',
	'wikimedia-copyrightwarning' => 'Door uw bewerking op te slaan, gaat u akkoord met het onherroepelijk vrijgeven van uw bijdrage onder de licentie [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Naamsvermelding/Gelijk delen] en de [http://www.gnu.org/copyleft/fdl.html GFDL].
U gaat ermee akkoord door hergebruikers minimaal genoemd te worden via een hyperlink of URL naar de pagina waaraan u bijdraagt.
Zie de [http://wikimediafoundation.org/wiki/Terms_of_Use gebruiksvoorwaarden] voor meer informatie.',
	'wikimedia-editpage-tos-summary' => 'Als u niet wilt dat uw bijdrage bewerkt of gedistribueerd wordt, sla deze dan niet op.
Als uw bewerking niet door uzelf is geschreven, dan moet uw toevoeging beschikbaar zijn onder condities die consistent zijn met de [http://wikimediafoundation.org/wiki/Terms_of_Use Algemene Voorwaarden] en gaat u akkoord met alle relevante licentievoorwaarden.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Frokor
 * @author Gunnernett
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'wikimediamessages-desc' => 'Wikimedia-spesifikke meldingar',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/nn',
	'sitesupport' => 'Gåver',
	'tooltip-n-sitesupport' => 'Støtt oss',
	'group-abusefilter' => 'Redigerarar av misbruksfilteret',
	'group-accountcreator' => 'Kontoopprettarar',
	'group-autopatroller' => 'Automatisk godkjende bidrag',
	'group-autoreviewer' => 'Automatiske granskarar',
	'group-bigexport' => 'Store eksportørar',
	'group-confirmed' => 'Stadfesta brukarar',
	'group-founder' => 'Grunnleggarar',
	'group-import' => 'Importørar',
	'group-ipblock-exempt' => 'Unntak frå IP-blokkering',
	'group-rollbacker' => 'Attenderullarar',
	'group-transwiki' => 'Transwiki-importørar',
	'group-abusefilter-member' => 'redigerar av misbruksfilteret',
	'group-accountcreator-member' => 'Kontoopprettar',
	'group-autopatroller-member' => 'automatisk godkjende bidrag',
	'group-autoreviewer-member' => 'automeldar',
	'group-bigexport-member' => 'stor eksportør',
	'group-confirmed-member' => 'stadfesta brukar',
	'group-founder-member' => 'grunnleggar',
	'group-import-member' => 'importør',
	'group-ipblock-exempt-member' => 'Unteke frå IP-blokkering',
	'group-rollbacker-member' => 'attenderullar',
	'group-transwiki-member' => 'transwiki-importør',
	'grouppage-abusefilter' => '{{ns:project}}:Redigerarar av misbruksfilteret',
	'grouppage-accountcreator' => '{{ns:project}}:Kontoopprettarar',
	'grouppage-autopatroller' => '{{ns:project}}:Automatisk godkjende bidrag',
	'grouppage-autoreviewer' => '{{ns:project}}:Automatiske granskarar',
	'grouppage-bigexport' => '{{ns:project}}:Store eksportørar',
	'grouppage-confirmed' => '{{ns:project}}:Stadfeste brukarar',
	'grouppage-founder' => '{{ns:project}}:Grunnleggarar',
	'grouppage-import' => '{{ns:project}}:Importørar',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Unnatekne frå IP-blokkering',
	'grouppage-rollbacker' => '{{ns:project}}:Attenderullarar',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-importørar',
	'group-steward' => 'Stewardar',
	'group-sysadmin' => 'Systemadministratorar',
	'group-Editinterface' => 'Brukargrensesnitt endringar',
	'group-Global_bot' => 'Globale robotar',
	'group-Global_rollback' => 'Globale attenderullarar',
	'group-Ombudsmen' => 'Ombodsmenn',
	'group-Staff' => 'Personale',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'systemadministrator',
	'group-Editinterface-member' => 'brukargrensesnitt endring',
	'group-Global_bot-member' => 'global robot',
	'group-Global_rollback-member' => 'global attenderullar',
	'group-Ombudsmen-member' => 'ombodsmann',
	'group-Staff-member' => 'personal',
	'grouppage-steward' => 'm:Stewards/nb',
	'grouppage-sysadmin' => 'm:Systemadministratorar',
	'grouppage-Global_bot' => 'm:Global robot',
	'grouppage-Global_rollback' => 'm:Global rollback/nb',
	'group-coder' => 'Kodarar',
	'group-coder-member' => 'kodar',
	'grouppage-coder' => 'Project:Kodar',
	'group-inactive' => 'Ikkje-aktive brukarar',
	'group-inactive-member' => 'ikkje aktiv brukar',
	'grouppage-inactive' => '{{ns:project}}:Ikkje aktive brukarar',
	'wikimedia-copyright' => 'Innhaldet er tilgjengeleg under <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-alike License</a>; ytterlegare vilkår kan gjelda. Sjå <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Vilkår</a> for detaljar.',
	'wikimedia-copyrightwarning' => 'Når du lagrar gjev du ugjenkalleleg løyve til å gje ut ditt bidrag under [http://creativecommons.org/licenses/by-sa/3.0/deed.no Creative Commons-lisensen Namngjeving-Del på same vilkår 3.0] og [http://www.gnu.org/copyleft/fdl.html GFDL]. Du går òg med på å verta oppgjeven som ein opphavsperson av gjenbrukarar, som eit minimum, gjennom ei hyperlenke eller URL til artikkelen du var med på å utarbeida. Sjå [http://wikimediafoundation.org/wiki/Terms_of_Use bruksvilkåra] for fleire opplysingar.',
	'wikimedia-editpage-tos-summary' => 'Ynskjer du ikkje at verket ditt vert redigert og redistribuert, skal du ikkje lagra det her. Har du ikkje sjølv skrive det, skal det vera tilgjengeleg under vilkåra i samsvar med [http://wikimediafoundation.org/wiki/Terms_of_Use Bruksvilkåra], og du stadfestar å fylgja alle relevante lisenskrav.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Laaknor
 * @author Nghtwlkr
 * @author Stigmj
 */
$messages['no'] = array(
	'wikimediamessages-desc' => 'Wikimedia-spesifikke beskjeder',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/nb',
	'sitesupport' => 'Donasjoner',
	'tooltip-n-sitesupport' => 'Støtt oss',
	'group-abusefilter' => 'Redaktører av misbruksfilteret',
	'group-accountcreator' => 'Kontoopprettere',
	'group-autopatroller' => 'Selvpatruljør',
	'group-autoreviewer' => 'Autogranskede',
	'group-bigexport' => 'Stor eksport',
	'group-confirmed' => 'Bekreftede brukere',
	'group-founder' => 'Grunnleggere',
	'group-import' => 'Importører',
	'group-ipblock-exempt' => 'Untatte fra IP-blokkering',
	'group-rollbacker' => 'Tilbakestillere',
	'group-transwiki' => 'Transwiki-importører',
	'group-abusefilter-member' => 'redaktør av misbruksfilteret',
	'group-accountcreator-member' => 'Kontooppretter',
	'group-autopatroller-member' => 'selvpatruljør',
	'group-autoreviewer-member' => 'autogransket',
	'group-bigexport-member' => 'stor eksportør',
	'group-confirmed-member' => 'bekreftet bruker',
	'group-founder-member' => 'Grunnlegger',
	'group-import-member' => 'Importør',
	'group-ipblock-exempt-member' => 'Unttatt fra IP-blokkering',
	'group-rollbacker-member' => 'Tilbakestiller',
	'group-transwiki-member' => 'Transwiki-importør',
	'grouppage-abusefilter' => '{{ns:project}}:Redaktører av misbruksfilteret',
	'grouppage-accountcreator' => '{{ns:project}}:Kontoopprettere',
	'grouppage-autopatroller' => '{{ns:project}}:Patruljering',
	'grouppage-autoreviewer' => '{{ns:project}}:Automatisk gransket',
	'grouppage-bigexport' => '{{ns:project}}:Store eksportører',
	'grouppage-confirmed' => '{{ns:project}}:Bekreftede brukere',
	'grouppage-founder' => '{{ns:project}}:Grunnleggere',
	'grouppage-import' => '{{ns:project}}:Importører',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Unntatte fra IP-blokkering',
	'grouppage-rollbacker' => '{{ns:project}}:Tilbakestillere',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-importører',
	'group-steward' => 'Forvaltere',
	'group-sysadmin' => 'Systemadministratorer',
	'group-Editinterface' => 'Grensesnittredigerer',
	'group-Global_bot' => 'Globale roboter',
	'group-Global_rollback' => 'Globale tilbakestillere',
	'group-Ombudsmen' => 'Ombudsmenn',
	'group-Staff' => 'Ansatte',
	'group-steward-member' => 'forvalter',
	'group-sysadmin-member' => 'systemadministrator',
	'group-Editinterface-member' => 'grensesnittredigerer',
	'group-Global_bot-member' => 'global robot',
	'group-Global_rollback-member' => 'global tilbakestiller',
	'group-Ombudsmen-member' => 'ombudsmann',
	'group-Staff-member' => 'ansatt',
	'grouppage-steward' => 'm:Stewards/nb',
	'grouppage-Global_rollback' => 'm:Global rollback/nb',
	'group-coder' => 'Kodere',
	'group-coder-member' => 'koder',
	'group-inactive' => 'Inaktive brukere',
	'group-inactive-member' => 'inaktiv bruker',
	'grouppage-inactive' => '{{ns:project}}:Inaktive brukere',
	'wikimedia-copyright' => 'Innholdet er tilgjengelig under <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons-lisensen Navngivelse-Del på samme vilkår</a>, men ytterligere betingelser kan gjelde. Se <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">bruksvilkårene</a> for detaljer.',
	'wikimedia-copyrightwarning' => 'Når du lagrer innvilger du ugjenkallelig å gi ut ditt bidrag under [http://creativecommons.org/licenses/by-sa/3.0/deed.no Creative Commons-lisensen Navngivelse-Del på samme vilkår 3.0] og [http://www.gnu.org/copyleft/fdl.html GFDL]. Du går også med på å bli angitt som en opphavsperson av gjenbrukere, som et minimum, gjennom en hyperlenke eller URL til artikkelen du bidro til. Se [http://wikimediafoundation.org/wiki/Terms_of_Use bruksvilkårene] for flere opplysninger.',
	'wikimedia-editpage-tos-summary' => 'Ønsker du ikke at verket ditt blir redigert og redistribuert, skal du ikke lagre det her. Har du ikke selv skrevet det, skal det være tilgjengelig under betingelsene i overensstemmelse med [http://wikimediafoundation.org/wiki/Terms_of_Use bruksvilkårene], og du bekrefter å følge alle relevante lisenskrav.',
);

/** Novial (Novial)
 * @author Malafaya
 */
$messages['nov'] = array(
	'sitesupport' => 'Donationes',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'sitesupport' => 'Dineelo',
	'tooltip-n-sitesupport' => 'Re thekge',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'wikimediamessages-desc' => 'Messatges especifics de Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/oc',
	'sitesupport' => 'Far un don',
	'tooltip-n-sitesupport' => 'Sostenètz lo projècte',
	'group-abusefilter' => "Modificators dels filtres d'abuses",
	'group-accountcreator' => 'Creators de comptes',
	'group-autopatroller' => 'Patrolhadors automatics',
	'group-autoreviewer' => 'Revisadors automatics',
	'group-bigexport' => 'Grands exportaires',
	'group-confirmed' => 'Utilizaires confirmats',
	'group-founder' => 'Fondators',
	'group-import' => 'Importaires',
	'group-ipblock-exempt' => 'Exempcions de blòts IP',
	'group-rollbacker' => 'Revocaires',
	'group-transwiki' => 'Importaires Transwiki',
	'group-abusefilter-member' => "modificator dels filtres d'abuses",
	'group-accountcreator-member' => 'Creator de comptes',
	'group-autopatroller-member' => 'Patrolhador automatic',
	'group-autoreviewer-member' => 'revisador automatic',
	'group-bigexport-member' => 'grand exportaire',
	'group-confirmed-member' => 'utilizaire confirmat',
	'group-founder-member' => 'Fondator',
	'group-import-member' => 'Importaire',
	'group-ipblock-exempt-member' => 'Exempcion de blòt IP',
	'group-rollbacker-member' => 'Revocaire',
	'group-transwiki-member' => 'Importaire Transwiki',
	'grouppage-abusefilter' => "{{ns:project}}:Modificators dels filtres d'abuses",
	'grouppage-accountcreator' => '{{ns:project}}:Creators de comptes',
	'grouppage-autopatroller' => '{{ns:project}}:Patrolhadors automatics',
	'grouppage-autoreviewer' => '{{ns:project}}:Revisador automatic',
	'grouppage-bigexport' => '{{ns:project}}:Grands exportaires',
	'grouppage-confirmed' => '{{ns:project}}:Utilizaires confirmats',
	'grouppage-founder' => '{{ns:project}}:Fondators',
	'grouppage-import' => '{{ns:project}}:Importaires',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Exempcion de blòt IP',
	'grouppage-rollbacker' => '{{ns:project}}:Revocaires',
	'grouppage-transwiki' => '{{ns:project}}:Importaires Transwiki',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Administrators del sistèma',
	'group-Editinterface' => "Modificators de l'interfàcia",
	'group-Global_bot' => 'Bòts globals',
	'group-Global_rollback' => 'Revocaires globals',
	'group-Ombudsmen' => 'Comissaris',
	'group-Staff' => 'Personal',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'administrator del sistèma',
	'group-Editinterface-member' => "modificator de l'interfàcia",
	'group-Global_bot-member' => 'Bòt global',
	'group-Global_rollback-member' => 'Revocaire global',
	'group-Ombudsmen-member' => 'Comissari',
	'group-Staff-member' => 'Membre del personal',
	'group-coder' => 'Encodaires',
	'group-coder-member' => 'encodaire',
	'group-inactive' => 'Utilizaires inactius',
	'group-inactive-member' => 'Utilizaire inactiu',
	'grouppage-inactive' => '{{ns:project}}: Utilizaires inactius',
	'wikimedia-copyright' => 'Los tèxtes son disponibles jos <a href="http://creativecommons.org/licenses/by-sa/3.0/">licence Creative Commons atribucion pertatge a l’identica</a> ; d’autres tèrmes se pòdon aplicar. Vejatz los <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">tèrmes d’utilizacion</a> per mai de detalhs.',
	'wikimedia-copyrightwarning' => 'En clicant sus « publicar », acceptatz de plaçar irrevocablament vòstra contribucion jos [http://creativecommons.org/licenses/by-sa/3.0/ licence Creative Commons atribucion pertatge a l’identica 3.0] e [http://www.gnu.org/copyleft/fdl.html GFDL]. Acceptatz d’èsser creditat al minimum via un iperligam o URL cap a l’article sul qual contribuissètz. Vejatz los [http://wikimediafoundation.org/wiki/Terms_of_Use tèrmes d’utilizacion] per mai de detalhs.',
	'wikimedia-editpage-tos-summary' => 'Se volètz pas que vòstres escriches sián modificats e redistribuits a volontat, alara los sometatz pas ici. Se los avètz pas escriches vos-meteis, devon èsser disponibles jos de tèrmes compatibles amb los [http://wikimediafoundation.org/wiki/Terms_of_Use tèrmes d’utilizacion], e acceptatz de seguir totas las exigéncias de la licéncia.',
);

/** Oriya (ଓଡ଼ିଆ)
 * @author Jose77
 */
$messages['or'] = array(
	'sitesupport' => 'ଦାନ',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'sitesupport' => 'Мысайнаг',
	'tooltip-n-sitesupport' => 'Баххуыс нын кæн',
	'group-founder' => 'Бындурæвæрджытæ',
	'group-founder-member' => 'бындурæвæрæг',
	'grouppage-founder' => '{{ns:project}}:Бындурæвæрджытæ',
);

/** Punjabi (ਪੰਜਾਬੀ) */
$messages['pa'] = array(
	'sitesupport' => 'ਦਾਨ',
);

/** Pangasinan (Pangasinan) */
$messages['pag'] = array(
	'sitesupport' => 'Donasyon',
);

/** Pampanga (Kapampangan)
 * @author Katimawan2005
 */
$messages['pam'] = array(
	'sitesupport' => 'Donasiun',
	'tooltip-n-sitesupport' => 'Saupan yu kami',
	'wikimedia-copyrightwarning' => "Nung mag-save ka, mamayun kang itabili me at e mu ne bawian ing kekang ambag king lalam ning [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] ampo ning [http://www.gnu.org/copyleft/fdl.html GFDL].
Mamayun kang kilalanan da ka deng talagamit a gagamit pasibayu kaniti (''re-users''), king paralan a e kulang king pamangabit hyperlink o URL king bulung nung nu ka manambag.
Lon me ing [http://wikimediafoundation.org/wiki/Terms_of_Use Terms of Use] para kareng detalle.",
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'group-founder' => 'Grinder',
	'group-founder-member' => 'Grinder',
	'grouppage-founder' => '{{ns:project}}:Grinder',
	'group-steward' => 'Stewards',
	'group-Global_bot' => 'Globale Bots',
	'group-steward-member' => 'Steward',
	'group-Global_bot-member' => 'Globaler Bot',
);

/** Plautdietsch (Plautdietsch)
 * @author Slomox
 */
$messages['pdt'] = array(
	'sitesupport' => 'Gowe',
	'tooltip-n-sitesupport' => 'Unjastett onns',
);

/** Pfälzisch (Pfälzisch)
 * @author SPS
 */
$messages['pfl'] = array(
	'sitesupport' => 'Spende',
	'group-steward' => 'Stewards',
	'group-steward-member' => 'Steward',
	'grouppage-steward' => '{{ns:project}}:Steward',
);

/** Norfuk / Pitkern (Norfuk / Pitkern) */
$messages['pih'] = array(
	'sitesupport' => 'Doenaiishun',
);

/** Polish (Polski)
 * @author Beau
 * @author Derbeth
 * @author Leinad
 * @author Meno25
 * @author Sp5uhe
 * @author ToSter
 */
$messages['pl'] = array(
	'wikimediamessages-desc' => 'Komunikaty unikalne dla projektów Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/pl',
	'sitesupport' => 'Darowizny',
	'tooltip-n-sitesupport' => 'Pomóż nam',
	'group-abusefilter' => 'Operatorzy filtru nadużyć',
	'group-accountcreator' => 'Tworzący konta',
	'group-autopatroller' => 'Patrolujący automatycznie',
	'group-autoreviewer' => 'Automatycznie przeglądający',
	'group-bigexport' => 'Masowi eksporterzy',
	'group-confirmed' => 'Zatwierdzeni użytkownicy',
	'group-founder' => 'Założyciele',
	'group-import' => 'Importerzy',
	'group-ipblock-exempt' => 'Uprawnieni do logowania się z zablokowanych adresów IP',
	'group-rollbacker' => 'Uprawnieni do wycofywania edycji',
	'group-transwiki' => 'Importerzy transwiki',
	'group-abusefilter-member' => 'operator filtru nadużyć',
	'group-accountcreator-member' => 'twórca kont',
	'group-autopatroller-member' => 'patrolujący automatycznie',
	'group-autoreviewer-member' => 'automatycznie przeglądający',
	'group-bigexport-member' => 'masowy eksporter',
	'group-confirmed-member' => 'zatwierdzony użytkownik',
	'group-founder-member' => 'założyciel',
	'group-import-member' => 'importer',
	'group-ipblock-exempt-member' => 'uprawniony do zalogowania się z zablokowanego adresu IP',
	'group-rollbacker-member' => 'uprawniony do wycofania edycji',
	'group-transwiki-member' => 'importer transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Operatorzy filtru nadużyć',
	'grouppage-accountcreator' => '{{ns:project}}:Twórcy kont',
	'grouppage-autopatroller' => '{{ns:project}}:Patrolujący automatycznie',
	'grouppage-autoreviewer' => '{{ns:project}}:Automatycznie przeglądający',
	'grouppage-bigexport' => '{{ns:project}}:Masowi eksporterzy',
	'grouppage-confirmed' => '{{ns:project}}:Zatwierdzeni użytkownicy',
	'grouppage-founder' => '{{ns:project}}:Założyciele',
	'grouppage-import' => '{{ns:project}}:Importerzy',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Uprawnieni do logowania się z zablokowanych adresów IP',
	'grouppage-rollbacker' => '{{ns:project}}:Uprawnieni do wycofywania edycji',
	'grouppage-transwiki' => '{{ns:project}}:Importerzy transwiki',
	'group-steward' => 'Stewardzi',
	'group-sysadmin' => 'Administratorzy systemu',
	'group-Editinterface' => 'Edytorzy interfejsu',
	'group-Global_bot' => 'Boty globalne',
	'group-Global_rollback' => 'Globalnie uprawnieni do wycofywania edycji',
	'group-Ombudsmen' => 'Rzecznicy praw',
	'group-Staff' => 'Pracownicy',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'administrator systemu',
	'group-Editinterface-member' => 'edytor interfejsu',
	'group-Global_bot-member' => 'bot globalny',
	'group-Global_rollback-member' => 'globalnie uprawniony do wycofywania edycji',
	'group-Ombudsmen-member' => 'rzecznik praw',
	'group-Staff-member' => 'pracownik',
	'grouppage-steward' => 'm:Stewards/pl',
	'group-coder' => 'Programiści',
	'group-coder-member' => 'programista',
	'group-inactive' => 'Użytkownicy nieaktywni',
	'group-inactive-member' => 'użytkownik nieaktywny',
	'grouppage-inactive' => '{{ns:project}}:Użytkownicy nieaktywni',
	'wikimedia-copyright' => 'Tekst udostępniany na <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.pl">licencji Creative Commons: uznanie autorstwa, na tych samych warunkach</a>, z możliwością obowiązywania dodatkowych ograniczeń.
Zobacz szczegółowe informacje o <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">warunkach korzystania</a>.',
	'wikimedia-copyrightwarning' => 'Zapisując zmiany wyrażasz nieodwołalną zgodę na udostępnienie Twojego wkładu na licencjach [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons: uznanie autorstwa, na tych samych warunkach, wersja licencji 3.0] oraz na licencji [http://www.gnu.org/copyleft/fdl.html GFDL]. Zgadzasz się na wykorzystanie swojego wkładu również w innych serwisach pod warunkiem podania w nich adresu URL do edytowanej przez Ciebie strony. Zobacz szczegółowe informacje o [http://wikimediafoundation.org/wiki/Terms_of_Use warunkach korzystania].',
	'wikimedia-editpage-tos-summary' => 'Jeśli nie chcesz, aby Twój tekst mógł być dowolnie zmieniany przez każdego oraz rozpowszechniany bez ograniczeń, nie umieszczaj go tutaj. Jeśli tekst nie został napisany przez Ciebie samodzielnie, musi on być dostępny na zasadach zgodnych z [http://wikimediafoundation.org/wiki/Terms_of_Use warunkami wykorzystania] oraz musisz zgodzić się na wszystkie istotne wymogi licencyjne.',
);

/** Piedmontese (Piemontèis) */
$messages['pms'] = array(
	'sitesupport' => 'Oferte',
);

/** Pontic (Ποντιακά)
 * @author Sinopeus
 */
$messages['pnt'] = array(
	'sitesupport' => 'Δωρεάς',
	'tooltip-n-sitesupport' => 'Βοηθέστεν το έργον.',
	'group-sysadmin' => 'Διαχειριστάδες συστηματί',
	'group-sysadmin-member' => 'διαχειριστάς συστηματί',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'wikimediamessages-desc' => 'د ويکيمېډيا ځانګړي پيغامونه',
	'sitesupport' => 'بسپنې',
	'tooltip-n-sitesupport' => 'زموږ ملاتړ وکړی',
	'group-accountcreator' => 'کارن-حساب جوړونکي',
	'group-founder' => 'بنسټګران',
	'group-accountcreator-member' => 'کارن-حساب جوړونکی',
	'group-founder-member' => 'بنسټګر',
	'grouppage-accountcreator' => '{{ns:project}}:کارن-حساب جوړونکي',
	'group-sysadmin' => 'د غونډال پازوالان',
	'group-Staff' => 'امله',
	'group-sysadmin-member' => 'د غونډال پازوال',
	'group-Staff-member' => 'د املې غړی',
	'group-inactive' => 'ناچارنده کارنان',
	'group-inactive-member' => 'ناچارنده کارن',
	'wikimedia-editpage-tos-summary' => 'که چېرته تاسې نه غواړۍ چې ستاسو په ليکنو کې خپلسري بدلون، سمون او بياخپرونه وشي، نو دلته يې مه خپروۍ. که چېرته تاسې دا متن پخپله نه وي ليکلی، نو پکار ده چې ستاسې دا مېنځپانګه [http://wikimediafoundation.org/wiki/Terms_of_Use د کارولو دريځ] سره سمه وي او تاسې هم د اړونده لايسنس غوښتنې منلې وي.',
);

/** Portuguese (Português)
 * @author 555
 * @author Capmo
 * @author Crazymadlover
 * @author David0811
 * @author Giro720
 * @author Lijealso
 * @author Malafaya
 * @author Sir Lestaty de Lioncourt
 */
$messages['pt'] = array(
	'wikimediamessages-desc' => 'Mensagens específicas à Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/pt',
	'sitesupport' => 'Doações',
	'tooltip-n-sitesupport' => 'Ajude-nos',
	'group-abusefilter' => 'Editores de filtros de abuso',
	'group-accountcreator' => 'Criadores de contas',
	'group-autopatroller' => 'Auto-patrulhadores',
	'group-autoreviewer' => 'Autocríticos',
	'group-bigexport' => 'Grandes exportadores',
	'group-confirmed' => 'Utilizadores confirmados',
	'group-founder' => 'Fundadores',
	'group-import' => 'Importadores',
	'group-ipblock-exempt' => 'IPs não bloqueados',
	'group-rollbacker' => 'Reversores',
	'group-transwiki' => 'Importadores Transwiki',
	'group-abusefilter-member' => 'editor de filtros de abuso',
	'group-accountcreator-member' => 'criador da conta',
	'group-autopatroller-member' => 'auto-patrulhador',
	'group-autoreviewer-member' => 'autocrítico',
	'group-bigexport-member' => 'grande exportador',
	'group-confirmed-member' => 'usuário confirmado',
	'group-founder-member' => 'fundador',
	'group-import-member' => 'importador',
	'group-ipblock-exempt-member' => 'IPs não bloqueados',
	'group-rollbacker-member' => 'reversor',
	'group-transwiki-member' => 'importador transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Editores de filtros de abuso',
	'grouppage-accountcreator' => '{{ns:project}}:Criadores de contas',
	'grouppage-autopatroller' => '{{ns:project}}:Auto-patrulhadores',
	'grouppage-autoreviewer' => '{{ns:project}}:Autocríticos',
	'grouppage-bigexport' => '{{ns:project}}:Grandes exportadores',
	'grouppage-confirmed' => '{{ns:project}}:Utilizadores confirmados',
	'grouppage-founder' => '{{ns:project}}:Fundadores',
	'grouppage-import' => '{{ns:project}}:Importadores',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP não bloqueado',
	'grouppage-rollbacker' => '{{ns:project}}:Revertedores',
	'grouppage-transwiki' => '{{ns:project}}:Importadores transwiki',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Administradores de sistema',
	'group-Editinterface' => 'Editores de interface',
	'group-Global_bot' => 'Robôs globais',
	'group-Global_rollback' => 'Revertedores globais',
	'group-Ombudsmen' => 'Mediadores',
	'group-Staff' => 'Pessoal',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'administrador de sistema',
	'group-Editinterface-member' => 'editor de interface',
	'group-Global_bot-member' => 'robô global',
	'group-Global_rollback-member' => 'reversor global',
	'group-Ombudsmen-member' => 'mediador',
	'group-Staff-member' => 'membro do pessoal',
	'grouppage-steward' => 'm:Stewards/pt',
	'group-coder' => 'Codificadores',
	'group-coder-member' => 'codificador',
	'group-inactive' => 'Utilizadores inativos',
	'group-inactive-member' => 'Utilizador inativo',
	'grouppage-inactive' => '{{ns:project}}:Utilizadores inativos',
	'wikimedia-copyright' => 'O texto está disponível sob a licença <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a>; condições adicionais podem-se aplicar. Veja <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Condições de Uso</a> para detalhes.',
	'wikimedia-copyrightwarning' => 'Ao gravar/salvar uma página, você está irrevogavelmente a libertar as suas contribuições sob as licenças [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] e [http://www.gnu.org/copyleft/fdl.html GFDL]. Você concorda em ser creditado por reutilizadores, no mínimo, através de uma hiperligação ou de um URL para a página que está a contribuir. Veja [http://wikimediafoundation.org/wiki/Terms_of_Use Condições de Uso] para detalhes.',
	'wikimedia-editpage-tos-summary' => 'Se você não quiser que a sua escrita seja editada e redistribuída, por favor, não a submeta aqui. Se você não escreveu este conteúdo, ele deverá estar disponível segundo condições consistentes com as [http://wikimediafoundation.org/wiki/Terms_of_Use Condições de Uso] e você concorda em seguir quaisquer requerimentos de licenciamento relevantes.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author 555
 * @author Capmo
 * @author Carla404
 * @author Eduardo.mps
 * @author Everton137
 * @author Heldergeovane
 */
$messages['pt-br'] = array(
	'wikimediamessages-desc' => 'Mensagens específicas da Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/pt',
	'sitesupport' => 'Doações',
	'tooltip-n-sitesupport' => 'Ajude-nos',
	'group-abusefilter' => 'Editores de filtros de abuso',
	'group-accountcreator' => 'Criadores de contas',
	'group-autopatroller' => 'Auto-patrulhadores',
	'group-autoreviewer' => 'Autorevisores',
	'group-bigexport' => 'Grandes exportadores',
	'group-confirmed' => 'Usuários confirmados',
	'group-founder' => 'Fundadores',
	'group-import' => 'Importadores',
	'group-ipblock-exempt' => 'IPs não bloqueados',
	'group-rollbacker' => 'Revertedores',
	'group-transwiki' => 'Importadores Transwiki',
	'group-abusefilter-member' => 'editores de filtros de abuso',
	'group-accountcreator-member' => 'Criador de contas',
	'group-autopatroller-member' => 'auto-patrulhador',
	'group-autoreviewer-member' => 'autorevisor',
	'group-bigexport-member' => 'grande exportador',
	'group-confirmed-member' => 'Usuário confirmado',
	'group-founder-member' => 'Fundador',
	'group-import-member' => 'Importador',
	'group-ipblock-exempt-member' => 'IP não bloqueado',
	'group-rollbacker-member' => 'Revertedor',
	'group-transwiki-member' => 'importador transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Editores de filtros de abuso',
	'grouppage-accountcreator' => '{{ns:project}}:Criadores de contas',
	'grouppage-autopatroller' => '{{ns:project}}:Auto-patrulhadores',
	'grouppage-autoreviewer' => '{{ns:project}}:Autorevisores',
	'grouppage-bigexport' => '{{ns:project}}:Grandes exportadores',
	'grouppage-confirmed' => '{{ns:project}}:Usuários confirmados',
	'grouppage-founder' => '{{ns:project}}:Fundadores',
	'grouppage-import' => '{{ns:project}}:Importadores',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP não bloqueado',
	'grouppage-rollbacker' => '{{ns:project}}:Revertedores',
	'grouppage-transwiki' => '{{ns:project}}:Importadores transwiki',
	'group-steward' => 'Stewards',
	'group-sysadmin' => 'Administradores de sistema',
	'group-Editinterface' => 'Editores de interface',
	'group-Global_bot' => 'Robôs globais',
	'group-Global_rollback' => 'Revertedores globais',
	'group-Ombudsmen' => 'Mediadores',
	'group-Staff' => 'Equipe',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'administrador de sistema',
	'group-Editinterface-member' => 'editor de interface',
	'group-Global_bot-member' => 'robô global',
	'group-Global_rollback-member' => 'revertedor global',
	'group-Ombudsmen-member' => 'mediador',
	'group-Staff-member' => 'membro da equipe',
	'group-coder' => 'Codificadores',
	'group-coder-member' => 'codificador',
	'group-inactive' => 'Utilizadores inativos',
	'group-inactive-member' => 'Utilizador inativo',
	'grouppage-inactive' => '{{ns:project}}:Utilizadores inativos',
	'wikimedia-copyright' => 'O texto está disponível sob a licença <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a>; condições adicionais podem-se aplicar. Veja <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Condições de Uso</a> para detalhes.',
	'wikimedia-copyrightwarning' => 'Ao salvar, você concorda irrevogavelmente a liberar as suas contribuições sob as licenças [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] e [http://www.gnu.org/copyleft/fdl.html GFDL]. Você concorda em ser creditado por reutilizadores, no mínimo, através de uma hiperligação ou URL para a página na qual está contribuindo. Veja [http://wikimediafoundation.org/wiki/Terms_of_Use Condições de Uso] para detalhes.',
	'wikimedia-editpage-tos-summary' => 'Se você quer que a sua escrita seja editada e redistribuída, por favor, não a submeta aqui. Se você não escreveu este conteúdo, ele deverá estar disponível segundo condições consistentes com as [http://wikimediafoundation.org/wiki/Terms_of_Use Condições de Uso] e você concorda em seguir quaisquer requerimentos de licenciamento relevantes.',
);

/** Quechua (Runa Simi)
 * @author AlimanRuna
 */
$messages['qu'] = array(
	'wikimediamessages-desc' => 'Wikimedia sapaq willaykuna',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Qarana',
	'tooltip-n-sitesupport' => 'Yanapawayku',
	'group-abusefilter' => "Millay ruray suysuna llamk'apuqkuna",
	'group-accountcreator' => 'Rakiquna kamariqkuna',
	'group-autopatroller' => 'Kikinmanta patrullaqkuna',
	'group-autoreviewer' => 'Kikin llanchiqkuna',
	'group-bigexport' => 'Hatun hawaman quqkuna',
	'group-confirmed' => 'Rakiqunayuq ruraqkuna',
	'group-founder' => 'Kamariqkuna',
	'group-import' => 'Hawamanta chaskiqkuna',
	'group-ipblock-exempt' => "IP hark'aymanta qispisqakuna",
	'group-rollbacker' => 'Kutichiqkuna',
	'group-transwiki' => 'Wikipura hawamanta chaskiqkuna',
	'group-abusefilter-member' => "millay ruray suysuna llamk'apuq",
	'group-accountcreator-member' => 'rakiquna kamariq',
	'group-autopatroller-member' => 'kikinmanta patrullaq',
	'group-autoreviewer-member' => 'kikin llanchiq',
	'group-bigexport-member' => 'hatun hawaman quq',
	'group-confirmed-member' => 'rakiqunayuq ruraq',
	'group-founder-member' => 'kamariq',
	'group-import-member' => 'hawamanta chaskiq',
	'group-ipblock-exempt-member' => "IP hark'aymanta qispisqa",
	'group-rollbacker-member' => 'kutichiq',
	'group-transwiki-member' => 'wikipura hawamanta chaskiq',
	'grouppage-abusefilter' => "{{ns:project}}:Millay ruray suysuna llamk'apuqkuna",
	'grouppage-accountcreator' => '{{ns:project}}:Rakiquna kamariqkuna',
	'grouppage-autopatroller' => '{{ns:project}}:Kikinmanta patrullaqkuna',
	'grouppage-autoreviewer' => '{{ns:project}}:Kikin llanchiqkuna',
	'grouppage-bigexport' => '{{ns:project}}:Hatun hawaman quqkuna',
	'grouppage-confirmed' => '{{ns:project}}:Rakiqunayuq ruraqkuna',
	'grouppage-founder' => '{{ns:project}}:Kamariqkuna',
	'grouppage-import' => '{{ns:project}}:Hawamanta chaskiqkuna',
	'grouppage-ipblock-exempt' => "{{ns:project}}:IP hark'aymanta qispisqakuna",
	'grouppage-rollbacker' => '{{ns:project}}:Kutichiqkuna',
	'grouppage-transwiki' => '{{ns:project}}:Wikipura hawamanta chaskiqkuna',
	'group-steward' => 'Steward nisqakuna',
	'group-sysadmin' => 'Llika kamachiqkuna',
	'group-Editinterface' => "Uyapurata llamk'apuy",
	'group-Global_bot' => 'Sapsi rurana antachakuna',
	'group-Global_rollback' => 'Sapsi kutichiqkuna',
	'group-Ombudsmen' => 'Ayllu amachaqkuna',
	'group-Staff' => "Llamk'aqninkuna",
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'llika kamachiq',
	'group-Editinterface-member' => "uyapurata llamk'apuy",
	'group-Global_bot-member' => 'sapsi rurana antacha',
	'group-Global_rollback-member' => 'sapsi kutichiq',
	'group-Ombudsmen-member' => 'ayllu amachaq',
	'group-Staff-member' => "llamk'aqninkuna",
	'group-coder' => 'Wakichi qillqaqkuna',
	'group-coder-member' => 'wakichi qillqaq',
	'group-inactive' => 'Puñuchkaq ruraqkuna',
	'group-inactive-member' => 'puñuchkaq ruraq',
	'grouppage-inactive' => '{{ns:project}}:Puñuchkaq ruraqkuna',
	'wikimedia-copyright' => 'Kay qillqataqa <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a> nisqapi ch\'uyanchasqa saqillaykamam chaskinki;
yapasqa phatakunachá kanqaku.
<a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Llamk\'apuypaq phatakuna</a> p\'anqapi qhaway astawan willasunaykipaq.',
	'wikimedia-copyrightwarning' => "Kay qillqata waqaychaspaykiqa, llamk'asqaykikunata mana kutinalla [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] nisqa saqillayman, [http://www.gnu.org/copyleft/fdl.html GFDL] nisqa saqillaymanpas saqimpunki.
Arí ninki musuq llamk'apuqkunap qillqasqaykimanta willaspan mast'arinanman, llikapi tiyaypura llamk'apusqayki p'anqaman t'inkimuqwan, chaytaq lliwmanta aswan pisi.
[http://wikimediafoundation.org/wiki/Terms_of_Use Llamk'apuypaq phatakuna] p'anqapi astawan willasunaykipaq qhaway.",
	'wikimedia-editpage-tos-summary' => "Llamk'asqaykikunata huk runakunap allinchayninta qispilla mast'ariyninta mana munaspaykiqa, ama kayman qillqamuychu.
Qamtaq kayta mana qillqarqaptiykiqa, kay qillqa [http://wikimediafoundation.org/wiki/Terms_of_Use llamk'apuypaq phatakuna] nisqapi ch'uyanchasqakama saqillasqa kananmi, qampataq chaypi ima saqillana phata kaqkunaman arí ninaykim.",
);

/** Tarifit (Tarifit)
 * @author Agzennay
 */
$messages['rif'] = array(
	'tooltip-n-sitesupport' => 'Ɛawn-anɣ',
);

/** Rhaeto-Romance (Rumantsch)
 * @author Gion-andri
 */
$messages['rm'] = array(
	'sitesupport' => 'Donaziuns',
	'tooltip-n-sitesupport' => 'Ans sustegna',
);

/** Romani (Romani)
 * @author Desiphral
 * @author לערי ריינהארט
 */
$messages['rmy'] = array(
	'sitesupport' => 'Denimata',
	'group-steward' => 'Stewardurya',
	'group-steward-member' => 'Stewardo',
	'grouppage-steward' => '{{ns:project}}:Stewardurya',
);

/** Romanian (Română)
 * @author Emily
 * @author Firilacroco
 * @author KlaudiuMihaila
 * @author Laurap
 * @author Mihai
 */
$messages['ro'] = array(
	'wikimediamessages-desc' => 'Mesaje specifice Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/Now/ro?utm_source=donate&utm_medium=sidebar&utm_campaign=spontaneous_donation',
	'sitesupport' => 'Donaţii',
	'tooltip-n-sitesupport' => 'Sprijină-ne',
	'group-abusefilter' => 'Editori filtru abuz',
	'group-accountcreator' => 'Creator de conturi',
	'group-autopatroller' => 'Patrule automate',
	'group-autoreviewer' => 'Autorecenzori',
	'group-bigexport' => 'Exportatori mari',
	'group-confirmed' => 'Utilizatori confirmaţi',
	'group-founder' => 'Fondatori',
	'group-import' => 'Importatori',
	'group-ipblock-exempt' => 'Excepţie blocare IP',
	'group-rollbacker' => 'Revocatori',
	'group-transwiki' => 'Importatori între wiki',
	'group-abusefilter-member' => 'editor filtru abuz',
	'group-accountcreator-member' => 'creator de conturi',
	'group-autopatroller-member' => 'patrulă automată',
	'group-autoreviewer-member' => 'autorecenzor',
	'group-bigexport-member' => 'mare exportator',
	'group-confirmed-member' => 'utilizator confirmat',
	'group-founder-member' => 'Fondator',
	'group-import-member' => 'importator',
	'group-ipblock-exempt-member' => 'excepţie blocare IP',
	'group-rollbacker-member' => 'revocator',
	'group-transwiki-member' => 'importator între wiki',
	'grouppage-abusefilter' => '{{ns:project}}:Editori ai filtrului abuz',
	'grouppage-accountcreator' => '{{ns:project}}:Creatori de conturi',
	'grouppage-autopatroller' => '{{ns:project}}:Patrulatori automaţi',
	'grouppage-autoreviewer' => '{{ns:project}}:Autorecenzori',
	'grouppage-bigexport' => '{{ns:project}}:Mari exportatori',
	'grouppage-confirmed' => '{{ns:project}}:Utilizatori confirmaţi',
	'grouppage-founder' => '{{ns:project}}:Fondatori',
	'grouppage-import' => '{{ns:project}}:Importatori',
	'grouppage-ipblock-exempt' => '{{ns:project}}:exceptare blocare IP',
	'grouppage-rollbacker' => '{{ns:project}}:Revocatori',
	'grouppage-transwiki' => '{{ns:project}}:Importatori între wiki',
	'group-steward' => 'Stewarzi',
	'group-sysadmin' => 'Administratori de sistem',
	'group-Global_bot' => 'Roboţi globali',
	'group-Global_rollback' => 'Revocatori globali',
	'group-Ombudsmen' => 'Mijlocitor independent',
	'group-Staff' => 'Angajaţi',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'administrator de sistem',
	'group-Global_bot-member' => 'robot global',
	'group-Global_rollback-member' => 'revocator global',
	'group-Ombudsmen-member' => 'mijlocitor independent',
	'group-Staff-member' => 'angajat',
	'group-coder' => 'Codificatori',
	'group-coder-member' => 'codificator',
	'group-inactive' => 'Utilizatori inactivi',
	'group-inactive-member' => 'utilizator inactiv',
	'grouppage-inactive' => '{{ns:project}}:Utilizatori inactivi',
	'wikimedia-copyright' => 'Acest text este disponibil sub licenţa <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Atribuire-Distribuire în condiţii identice</a>;
termeni suplimentari se pot aplica.
Vedeţi <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Termenii de utilizare</a> pentru detalii.',
	'wikimedia-copyrightwarning' => 'Salvând, sunteţi de acord să eliberaţi irevocabil contribuţia dumneavoastră sub licenţele [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Atribuire-Distribuire în condiţii identice 3.0] şi [http://www.gnu.org/copyleft/fdl.html GFDL].
Sunteţi de acord să fiţi creditat de către reutilizator, cel puţin, printr-o hiperlegătură sau URL către pagina la care contribuiţi.
Vedeţi [http://wikimediafoundation.org/wiki/Terms_of_Use Termenii de utilizare] pentru detalii.',
	'wikimedia-editpage-tos-summary' => 'Dacă nu doriţi ca textul dumneavoastră să fie modificat şi redistribuit, atunci nu îl trimiteţi aici.
Dacă nu l-aţi scris dumneavoastră, acesta trebuie să fie disponibil în concordanţă cu [http://wikimediafoundation.org/wiki/Terms_of_Use termenii de utilizare], şi sunteţi de acord să urmaţi orice altă cerinţă de licenţiere.',
);

/** Aromanian (Armãneashce)
 * @author Hakka
 */
$messages['roa-rup'] = array(
	'sitesupport' => 'Donatsiur',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'wikimediamessages-desc' => 'Wikimedia specific messages',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Done',
	'tooltip-n-sitesupport' => 'Aiutene',
	'group-abusefilter' => "Cangiatore de le filtre d'abbuse",
	'group-accountcreator' => 'Ccrejature de cunde utinde',
	'group-autopatroller' => 'Auto condrollore',
	'group-autoreviewer' => 'Auto revisitature',
	'group-bigexport' => 'Gruèsse esportature',
	'group-confirmed' => 'Utinde confirmatarije',
	'group-founder' => 'Fondature',
	'group-import' => "'Mbortature",
	'group-ipblock-exempt' => "IP escluse da 'u blocche",
	'group-rollbacker' => 'Annullature',
	'group-transwiki' => "'Mbortature 'mbrà Uicchi",
	'group-abusefilter-member' => 'cangiatore de filtre de abbuse',
	'group-accountcreator-member' => 'ccreatore de cunde utende',
	'group-autopatroller-member' => 'auto condrollore',
	'group-autoreviewer-member' => 'auto revisitatore',
	'group-bigexport-member' => 'granne esportatore',
	'group-confirmed-member' => 'utende confirmatarije',
	'group-founder-member' => 'fondatore',
	'group-import-member' => "'mbortatore",
	'group-ipblock-exempt-member' => 'IP senza blocche',
	'group-rollbacker-member' => 'annullatore',
	'group-transwiki-member' => 'Importatore de transuicchi',
	'grouppage-abusefilter' => '{{ns:project}}:Cangiature de filtre de abbuse',
	'grouppage-accountcreator' => '{{ns:project}}:Ccrejature de cunde utinde',
	'grouppage-autopatroller' => '{{ns:project}}:Auto condrollore',
	'grouppage-autoreviewer' => '{{ns:project}}:Auto revisitature',
	'grouppage-bigexport' => '{{ns:project}}:Gruèsse esportature',
	'grouppage-confirmed' => '{{ns:project}}:Utinde confirmatarije',
	'grouppage-founder' => '{{ns:project}}:Fondature',
	'grouppage-import' => "{{ns:project}}:'Mbortature",
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP senza blocche',
	'grouppage-rollbacker' => '{{ns:project}}:Annullature',
	'grouppage-transwiki' => "{{ns:project}}:'Mbortature de TransUicchi",
	'group-steward' => 'Steward',
	'group-sysadmin' => "Amministrature d'u sisteme",
	'group-Editinterface' => 'Cangiature de inderfacce',
	'group-Global_bot' => 'Bot globele',
	'group-Global_rollback' => 'Annullature globale',
	'group-Ombudsmen' => 'Mediature',
	'group-Staff' => "'U personele",
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'amministratore de sisteme',
	'group-Editinterface-member' => 'Cangiatore de inderfacce',
	'group-Global_bot-member' => 'bot globele',
	'group-Global_rollback-member' => 'annullatore globale',
	'group-Ombudsmen-member' => 'mediatore',
	'group-Staff-member' => "cristiàne d'u personele",
	'group-coder' => 'Codificature',
	'group-coder-member' => 'codificatore',
	'group-inactive' => 'Utinde inattive',
	'group-inactive-member' => 'utende inattive',
	'grouppage-inactive' => '{{ns:project}}:Utinde inattive',
	'wikimedia-copyright' => "'U teste ète disponibbile sotte 'a <a href=\"http://creativecommons.org/licenses/by-sa/3.0/\"> licenze ''Creative Commons Attribution/Condivide a 'u stesse mode</a>;
termine addizionale pò essere applicate.
Vide <a href=\"http://wikimediafoundation.org/wiki/Terms_of_Use\">Termine de Utilizze</a> pe cchiù 'mbormaziune.",
	'wikimedia-copyrightwarning' => "Reggistranne, tu ste accette irrevocabbilmende de relassà 'u condrebbute tue sotte le licenze [http://creativecommons.org/licenses/by-sa/3.0/deed.it Creative Commons Attribbuzzione-Condivide a 'u stesse mode 3.0] e [http://www.gnu.org/copyleft/fdl.html GFDL].
Ste dice pure ca accette ca le utinde ca volene cu ausane le condrebbute tue, mettane almene 'nu collegamende ipertestuale o 'na URL a 'a pàgene addò tu è condrebbuite.
Vide pure [http://wikimediafoundation.org/wiki/Terms_of_Use condizziune d'ause] pe cchiù 'mbormaziune.",
	'wikimedia-editpage-tos-summary' => "Ce non ge vuè ca 'u teste pò essere cangiate o redistribbuite a mundone, allore 'u sè ce stè no 'u sce mettènne aqquà. Ce non ge l'è scritte tu, allore addà essere disponibbile cu condiziune combatibbele cu le [http://wikimediafoundation.org/wiki/Terms_of_Use condiziune d'ause] e accette pure tutte le requisite de licenze.",
);

/** Russian (Русский)
 * @author Ahonc
 * @author Aleksandrit
 * @author AlexSm
 * @author Ferrer
 * @author Flrn
 * @author HalanTul
 * @author Lockal
 * @author Putnik
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'wikimediamessages-desc' => 'Сообщения, специфичные для Викимедиа',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Сделать_пожертвование',
	'sitesupport' => 'Пожертвования',
	'tooltip-n-sitesupport' => 'Поддержите нас',
	'group-abusefilter' => 'Редакторы фильтра злоупотреблений',
	'group-accountcreator' => 'Создатели учётных записей',
	'group-autopatroller' => 'Автопатрулируемые',
	'group-autoreviewer' => 'Автодосматриваемые',
	'group-bigexport' => 'Крупные экспортёры',
	'group-confirmed' => 'Подтверждённые участники',
	'group-founder' => 'Основатели',
	'group-import' => 'Импортирующие',
	'group-ipblock-exempt' => 'Исключения из IP-блокировок',
	'group-rollbacker' => 'Откатывающие',
	'group-transwiki' => 'Межвики-импортирующие',
	'group-abusefilter-member' => 'редактор фильтра злоупотреблений',
	'group-accountcreator-member' => 'создатель учётных записей',
	'group-autopatroller-member' => 'автопатрулируемый',
	'group-autoreviewer-member' => 'автодосматриваемый',
	'group-bigexport-member' => 'крупный экспортёр',
	'group-confirmed-member' => 'подтверждённый участник',
	'group-founder-member' => 'основатель',
	'group-import-member' => 'импортирующий',
	'group-ipblock-exempt-member' => 'исключение из IP-блокировок',
	'group-rollbacker-member' => 'откатывающий',
	'group-transwiki-member' => 'межвики-импортирующий',
	'grouppage-abusefilter' => '{{ns:project}}:Редакторы фильтра злоупотреблений',
	'grouppage-accountcreator' => '{{ns:project}}:Создатели учётных записей',
	'grouppage-autopatroller' => '{{ns:project}}:Автопатрулируемые',
	'grouppage-autoreviewer' => '{{ns:project}}:Автодосматриваемые',
	'grouppage-bigexport' => '{{ns:project}}:Крупные экспортёры',
	'grouppage-confirmed' => '{{ns:project}}:Подтверждённые участники',
	'grouppage-founder' => '{{ns:project}}:Основатели',
	'grouppage-import' => '{{ns:project}}:Импортирующие',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Исключение из IP-блокировок',
	'grouppage-rollbacker' => '{{ns:project}}:Откатывающие',
	'grouppage-transwiki' => '{{ns:project}}:Межвики-импортирующие',
	'group-steward' => 'Стюарды',
	'group-sysadmin' => 'Системные администраторы',
	'group-Editinterface' => 'Редакторы интерфейса',
	'group-Global_bot' => 'Глобальные боты',
	'group-Global_rollback' => 'Глобальные откатывающие',
	'group-Ombudsmen' => 'Омбудсмены',
	'group-Staff' => 'Сотрудники',
	'group-steward-member' => 'стюард',
	'group-sysadmin-member' => 'системный администратор',
	'group-Editinterface-member' => 'редактор интерфейса',
	'group-Global_bot-member' => 'глобальный бот',
	'group-Global_rollback-member' => 'глобальный откатывающий',
	'group-Ombudsmen-member' => 'омбудсмен',
	'group-Staff-member' => 'сотрудник',
	'grouppage-steward' => 'm:Stewards/ru',
	'group-coder' => 'Программисты',
	'group-coder-member' => 'программист',
	'group-inactive' => 'Неактивные участники',
	'group-inactive-member' => 'неактивный участник',
	'grouppage-inactive' => '{{ns:project}}:Неактивные участники',
	'shared-repo-name-shared' => 'Викисклада',
	'wikimedia-copyright' => 'Текст доступен на условиях лицензии <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike</a>, в отдельных случаях могут действовать дополнительные условия. Подробнее см. <a href="http://wikimediafoundation.org/wiki/Terms_of_Use/ru">Условия использования</a>.',
	'wikimedia-copyrightwarning' => 'Сохраняя свои изменения, вы соглашаетесь на их неотзывную публикацию на условиях лицензий [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike 3.0] и [http://www.gnu.org/copyleft/fdl.html GFDL]. Вы соглашаетесь, что при использовании страницы, в которую вы вносили изменения, на вас будут ссылаться, как минимум, посредством гиперссылки или URL на соответствующую страницу. Подробнее см. [http://wikimediafoundation.org/wiki/Terms_of_Use/ru Условия использования].',
	'wikimedia-editpage-tos-summary' => 'Если вы не хотите, чтобы ваши тексты свободно редактировались и распространялись любым желающим, не помещайте их сюда.
Если вы не являетесь автором размещаемого текста, то он должен быть доступен на условиях, совместимых с [http://wikimediafoundation.org/wiki/Terms_of_Use/ru Условиями использования], и вы соглашаетесь следовать всем соответствующим требованиям лицензии.',
);

/** Megleno-Romanian (Cyrillic) (Vlăheşte (Cyrillic))
 * @author Кумулај Маркус
 * @author Макѕе
 */
$messages['ruq-cyrl'] = array(
	'sitesupport' => 'Донационс',
	'tooltip-n-sitesupport' => 'Супора-ностре',
);

/** Megleno-Romanian (Latin) (Vlăheşte (Latin))
 * @author Кумулај Маркус
 * @author Макѕе
 */
$messages['ruq-latn'] = array(
	'sitesupport' => 'Donacions',
	'tooltip-n-sitesupport' => 'Supora-nostre',
);

/** Yakut (Саха тыла)
 * @author Bert Jickty
 * @author HalanTul
 */
$messages['sah'] = array(
	'wikimediamessages-desc' => 'Викимедиаҕа эрэ сыһыаннаах этиилэр',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Харчынан_көмө',
	'sitesupport' => 'Бу сири өйөө',
	'tooltip-n-sitesupport' => 'Өйөбүл',
	'group-abusefilter' => 'Омсо сиидэтин эрэдээктэрдэрэ',
	'group-accountcreator' => 'Кыттааччылар ааттарын айааччылар/бигэргэтээччилэр',
	'group-autopatroller' => 'Аптамаатынан ботуруулланааччылар',
	'group-autoreviewer' => 'Аптамаатынан бигэргэтиллэр',
	'group-bigexport' => 'Улахан экспортёрдар',
	'group-confirmed' => 'Бигэргэммит кыттааччылар',
	'group-founder' => 'Тэрийээччилэр',
	'group-import' => 'Импортааччылар',
	'group-ipblock-exempt' => 'Хааччахтааһыҥҥа киирбэт IP-лаахтар',
	'group-rollbacker' => 'Төннөрөөччүлэр',
	'group-transwiki' => 'Transwiki`ттан импортааччылар',
	'group-abusefilter-member' => 'омсо сиидэтин эрэдээктэрэ',
	'group-accountcreator-member' => 'Кыттаачылар ааттарын бигэргэтээччи/оҥорооччу',
	'group-autopatroller-member' => 'аптамаатынан ботуруулланааччы',
	'group-autoreviewer-member' => 'аптамаатынан бигэргэнэр',
	'group-bigexport-member' => 'улахан экспортёр',
	'group-confirmed-member' => 'бигэргэммит кыттааччы',
	'group-founder-member' => 'Тэрийээччи',
	'group-import-member' => 'Импортааччы',
	'group-ipblock-exempt-member' => 'IP-та хааччахтаммат кыттааччы',
	'group-rollbacker-member' => 'Төннөрөөччү',
	'group-transwiki-member' => 'transwiki`ттан импортааччы',
	'grouppage-abusefilter' => '{{ns:project}}:Омсо сиидэтин эрэдээктэрдэрэ',
	'grouppage-accountcreator' => '{{ns:project}}:Кыттааччылар ааттарын бигэргэтээччилэр/айааччылар',
	'grouppage-autopatroller' => '{{ns:project}}:Аптамаатынан ботуруулланааччылар',
	'grouppage-autoreviewer' => '{{ns:project}}:Аптамаатынан бигэргэнэр',
	'grouppage-bigexport' => '{{ns:project}}:Улахан экспортёрдар',
	'grouppage-confirmed' => '{{ns:project}}:Бигэргэммит кыттааччылар',
	'grouppage-founder' => '{{ns:project}}:Тэрийээччилэр',
	'grouppage-import' => '{{ns:project}}:Импортааччылар',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-лара хааччахтаммат кыттааччылар',
	'grouppage-rollbacker' => '{{ns:project}}:Төннөрөөччүлэр',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki`ттан көһөрөөччүлэр',
	'group-steward' => 'Үстүйээрдэр',
	'group-sysadmin' => 'Тиһик (систиэмэ) дьаһабыллара',
	'group-Editinterface' => 'Интерфейс эрэдээктэрдэрэ',
	'group-Global_bot' => 'Бырайыактар ыккардынааҕы руобаттар',
	'group-Global_rollback' => 'Бырайыактар ыккардынааҕы төннөрөөччүлэр',
	'group-Ombudsmen' => 'Омбудсменнар',
	'group-Staff' => 'Үлэһиттэр',
	'group-steward-member' => 'үстүйээрдэр',
	'group-sysadmin-member' => 'дьаһабыл',
	'group-Editinterface-member' => 'интерфейс эрэдээктэрэ',
	'group-Global_bot-member' => 'бырайыактар ыккардынааҕы руобаттар',
	'group-Global_rollback-member' => 'бырайыактар ыккардынааҕы төннөрөөччүлэр',
	'group-Ombudsmen-member' => 'омбудсман',
	'group-Staff-member' => 'үлэһит',
	'group-coder' => 'Программистар',
	'group-coder-member' => 'программист',
	'group-inactive' => 'Көҕө суох кыттааччылар',
	'group-inactive-member' => 'көҕө суох кыттааччы',
	'grouppage-inactive' => '{{ns:project}}:Көҕө суох кыттааччылар',
	'wikimedia-copyright' => 'Тиэкис <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike</a> лицензия усулуобуйатынан тарҕанар, сорох түбэлтэҕэ эбии көрдөбүллэр баар буолуохтарын сөп. Сиһилии [http://wikimediafoundation.org/wiki/Terms_of_Use/ru Условия использования] көр.',
	'wikimedia-copyrightwarning' => 'Бэйэҥ уларытыыгын киллэрдэххинэ суруйбуккун [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike 3.0] уонна [http://www.gnu.org/copyleft/fdl.html GFDL] лицензияларынан тарҕанарыгар сөбүлэҥҥин биэрэҕин, онтуҥ төннүбэт. Бу сирэйи атын дьон туһанар түгэннэригэр, эйиэхэ гипер сигэ эбэтэр URL көмөтүнэн сигэниэхтэрэ, ону кытта сөбүлэһэҕин. Сиһилии [http://wikimediafoundation.org/wiki/Terms_of_Use/ru Условия использования] көр.',
	'wikimedia-editpage-tos-summary' => 'Эн тиэкистэриҥ көҥүл уларытыллыахтарын уонна ханнык баҕарар ньыманнан тарҕаныахтарын баҕарбат буоллаххына манна угума.
Угар тиэкиһиҥ ааптара буолбатах буоллаххына, ол тиэкис бу лицензия көрдөбүллэригэр сөп түбэһиэхтээх:[http://wikimediafoundation.org/wiki/Terms_of_Use/ru Условия использования] ону таһынан лицензия көрдөбүллэрин толоруом диэн бэйэҥ сөбүлэһэҕин.',
);

/** Sardinian (Sardu)
 * @author Marzedu
 */
$messages['sc'] = array(
	'sitesupport' => 'Donaduras',
	'group-steward' => 'Stewards',
);

/** Sicilian (Sicilianu)
 * @author Gmelfi
 * @author Melos
 * @author Santu
 * @author לערי ריינהארט
 */
$messages['scn'] = array(
	'wikimediamessages-desc' => 'Missaggi spicifici di Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/Now/scn',
	'sitesupport' => 'Dunazzioni',
	'tooltip-n-sitesupport' => 'Sustinìticci',
	'group-accountcreator' => 'Criatura di cunti',
	'group-founder' => 'Funnatura',
	'group-import' => 'Mpurtatura',
	'group-ipblock-exempt' => 'Esenti dû bloccu IP',
	'group-rollbacker' => 'Ripristinatura',
	'group-transwiki' => 'Mpurtaturi transwiki',
	'group-accountcreator-member' => 'Criaturi di cuntu',
	'group-founder-member' => 'Funnaturi',
	'group-import-member' => 'Mpurtaturi',
	'group-ipblock-exempt-member' => 'Esenti dû bloccu IP',
	'group-rollbacker-member' => 'Ripristinaturi',
	'group-transwiki-member' => 'Mpurtaturi transwiki',
	'grouppage-accountcreator' => '{{ns:project}}:Criatura di cunti',
	'grouppage-founder' => '{{ns:project}}:Funnatura',
	'grouppage-import' => '{{ns:project}}:Mpurtatura',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Esenti dû bloccu IP',
	'grouppage-rollbacker' => '{{ns:project}}:Ripristinatura',
	'grouppage-transwiki' => '{{ns:project}}:Mpurtatura transwiki',
	'group-steward' => 'Stiùwart',
	'group-sysadmin' => 'Amministratura di sistema',
	'group-Global_bot' => 'Bot glubbali',
	'group-Global_rollback' => 'Ripristinatura glubbali',
	'group-Ombudsmen' => 'Difinsura civici',
	'group-Staff' => 'Staff',
	'group-steward-member' => 'Stiùwart',
	'group-sysadmin-member' => 'amministraturi di sistema',
	'group-Editinterface-member' => 'Editori dâ interfaccia',
	'group-Global_bot-member' => 'bot glubbali',
	'group-Global_rollback-member' => 'ripristinaturi glubbali',
	'group-Ombudsmen-member' => 'difinsuri cìvicu',
	'group-Staff-member' => 'Cumpunenti dû staff',
	'grouppage-steward' => 'm:Stewards',
	'grouppage-sysadmin' => 'm:System administrators',
	'group-coder' => 'Cudificatura',
	'group-coder-member' => 'cudificaturi',
	'group-inactive' => 'Utenti inattivi',
	'group-inactive-member' => 'utenti inattivu',
	'grouppage-inactive' => '{{ns:project}}:Utenti inattivi',
	'wikimedia-copyright' => 'Lu testu è dispunibbili sutta la <a href="http://creativecommons.org/licenses/by-sa/3.0/">Licenza Creative Commons Attribuzzioni/Spartuta â stissa manera</a>;
si pònnu applicàrisi àutri cunnizzioni.
Talìa li <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">cunnizzioni di usu</a> pi li dittagli.',
	'wikimedia-copyrightwarning' => "Sarvannu, siti d'accordu di rènniri dispunìbbili lu vostru cuntribbutu sutta la [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] e la [http://www.gnu.org/copyleft/fdl.html GFDL].
Siti d'accordu puru ca àutri riutilizzatura b'accreditanu lu vostru travagghiu, cu lu liami o cu na URL â pàggina â quali stai cuntribbuennu.
Talia lu [http://wikimediafoundation.org/wiki/Terms_of_Use Terms of Use] pi sapìrinni cchiossai.",
	'wikimedia-editpage-tos-summary' => "Siddu nun vuoi ca lu tò scrittu nun è canciatu e ridistrubuitu a vuluntà, allura nun lu suttamettiri ccà.
Siddu nun lu scrivistu tu, havi a essiri dispunibbili a cunnizzioni ca arrispetta li [http://wikimediafoundation.org/wiki/Terms_of_Use Termini di Usu], e ca tu si d'accordu di rispittari li riquisiti di licenza.",
);

/** Scots (Scots)
 * @author OchAyeTheNoo
 */
$messages['sco'] = array(
	'sitesupport' => 'Propines',
);

/** Sindhi (سنڌي)
 * @author Aursani
 */
$messages['sd'] = array(
	'sitesupport' => 'مالي امداد',
	'tooltip-n-sitesupport' => 'اسان جي مدد ڪريو',
);

/** Sassaresu (Sassaresu)
 * @author Felis
 */
$messages['sdc'] = array(
	'sitesupport' => 'Dunazioni',
	'tooltip-n-sitesupport' => 'Supporthazi',
);

/** Northern Sami (Sámegiella)
 * @author Skuolfi
 */
$messages['se'] = array(
	'sitesupport' => 'Skeaŋkkat',
	'tooltip-n-sitesupport' => 'Doarrjo siidduid doaimma',
);

/** Cmique Itom (Cmique Itom)
 * @author SeriCtam
 */
$messages['sei'] = array(
	'sitesupport' => 'Donación',
	'tooltip-n-sitesupport' => 'Donacíonhuíiitl',
);

/** Tachelhit (Tašlḥiyt)
 * @author Dalinanir
 * @author Zanatos
 */
$messages['shi'] = array(
	'sitesupport' => 'Aws',
	'tooltip-n-sitesupport' => 'Awsaɣ',
	'group-import' => 'Willi di tawin',
);

/** Sinhala (සිංහල)
 * @author නන්දිමිතුරු
 */
$messages['si'] = array(
	'wikimediamessages-desc' => 'විකිමාධ්‍ය විශේෂී පණිවුඩයන්',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'පරිත්‍යාග',
	'tooltip-n-sitesupport' => 'අප හට අනුග්‍රහ සපයන්න',
	'group-accountcreator' => 'ගිණුම් තතනන්නන්',
	'group-founder' => 'ප්‍රාරම්භකයන්',
	'group-import' => 'ආයාතකරුවන්',
	'group-ipblock-exempt' => 'අන්තර්ජාල වාරණ විවර්ජනයන්',
	'group-rollbacker' => 'පසුපෙරළන්නන්',
	'group-transwiki' => 'අන්තර්විකී ආයාතකරුවන්',
	'group-accountcreator-member' => 'ගිණුම් තනන්නා',
	'group-founder-member' => 'ප්‍රාර්ම්භක',
	'group-import-member' => 'ආයාතකරු',
	'group-ipblock-exempt-member' => 'අන්තර්ජාල වාරණ විවර්ජනය',
	'group-rollbacker-member' => 'පසුපෙරළන්නා',
	'group-transwiki-member' => 'අන්තර්විකි ආයාතකරු',
	'grouppage-accountcreator' => '{{ns:project}}:ගිණුම් තනන්නන්',
	'grouppage-founder' => '{{ns:project}}:ප්‍රාරම්භකයන්',
	'grouppage-import' => '{{ns:project}}:ආයාත කරුවන්',
	'grouppage-ipblock-exempt' => '{{ns:project}}:අන්තර්ජාල වාරණ විවර්ජනය',
	'grouppage-rollbacker' => '{{ns:project}}:පසුපෙරළන්නන්',
	'grouppage-transwiki' => '{{ns:project}}:අන්තර්විකි ආයාතකරුවන්',
	'group-steward' => 'භාරකරුවන්',
	'group-sysadmin' => 'පද්ධති පරිපාලකයන්',
	'group-Global_bot' => 'ගෝලීය රොබෝවරුන්',
	'group-Global_rollback' => 'ගෝලීය පසුපෙරළන්නන්',
	'group-Ombudsmen' => 'දුග්ගන්නාරාළවරුන්',
	'group-Staff' => 'සේවක මඩුල්ල',
	'group-steward-member' => 'භාරකරු',
	'group-sysadmin-member' => 'පද්ධති පරිපාලකවරයා',
	'group-Global_bot-member' => 'ගෝලීය රොබෝවරයා',
	'group-Global_rollback-member' => 'ගෝලීය පසුපෙරළන්නා',
	'group-Ombudsmen-member' => 'දුග්ගන්නාරාළ',
	'group-Staff-member' => 'සේවක මණ්ඩල සාමාජිකයා',
	'grouppage-steward' => 'm:භාරකරුවන්',
	'grouppage-sysadmin' => 'm:පද්ධති පරිපාලකවරුන්',
	'grouppage-Global_bot' => 'm:ගෝලීය රොබෝවරයා',
	'grouppage-Global_rollback' => 'm:ගෝලීය පසුපෙරළීම',
	'grouppage-Ombudsmen' => 'm:දුග්ගන්නාරාළ කොමිසම',
	'group-coder' => 'කේතකරුවන්',
	'group-coder-member' => 'කේතකරු',
	'grouppage-coder' => 'Project:කේතකරු',
);

/** Slovak (Slovenčina)
 * @author Helix84
 * @author Απεργός
 */
$messages['sk'] = array(
	'wikimediamessages-desc' => 'Správy špecifické pre Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Zbieranie_príspevkov',
	'sitesupport' => 'Podpora',
	'tooltip-n-sitesupport' => 'Podporte nás',
	'group-abusefilter' => 'Redaktori filtrov zneužití',
	'group-accountcreator' => 'Tvorcovia účtov',
	'group-autopatroller' => 'Strážcovia',
	'group-autoreviewer' => 'Autokontrolóri',
	'group-bigexport' => 'Hromadní exportéri',
	'group-confirmed' => 'Potvrdení používatelia',
	'group-founder' => 'Zakladatelia',
	'group-import' => 'Importéri',
	'group-ipblock-exempt' => 'Výnimky z blokovaní IP',
	'group-rollbacker' => 'S právom rollback',
	'group-transwiki' => 'Transwiki importéri',
	'group-abusefilter-member' => 'redaktor filtrov zneužití',
	'group-accountcreator-member' => 'Tvorca účtu',
	'group-autopatroller-member' => 'strážca',
	'group-autoreviewer-member' => 'autokontrolór',
	'group-bigexport-member' => 'hromadní exportér',
	'group-confirmed-member' => 'potvrdený používateľ',
	'group-founder-member' => 'Zakladateľ',
	'group-import-member' => 'Importér',
	'group-ipblock-exempt-member' => 'Výnimka z blokovaní IP',
	'group-rollbacker-member' => 'S právom rollback',
	'group-transwiki-member' => 'Transwiki importér',
	'grouppage-abusefilter' => '{{ns:project}}:Redaktori filtrov zneužití',
	'grouppage-accountcreator' => '{{ns:project}}:Tvorcovia účtov',
	'grouppage-autopatroller' => '{{ns:project}}:Strážcovia',
	'grouppage-autoreviewer' => '{{ns:project}}:Autokontrolóri',
	'grouppage-bigexport' => '{{ns:project}}:Hromadní exportéri',
	'grouppage-confirmed' => '{{ns:project}}:Potvrdení používatelia',
	'grouppage-founder' => '{{ns:project}}:Zakladatelia',
	'grouppage-import' => '{{ns:project}}:Importéri',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Výnimky z blokovaní IP',
	'grouppage-rollbacker' => '{{ns:project}}:S právom rollback',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki importéri',
	'group-steward' => 'Stewardi',
	'group-sysadmin' => 'Správcovia systému',
	'group-Editinterface' => 'Editori rozhrania',
	'group-Global_bot' => 'Globálni roboti',
	'group-Global_rollback' => 'Globálni rollbackeri',
	'group-Ombudsmen' => 'Ombudsmani',
	'group-Staff' => 'Zamestnanci',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'správca systému',
	'group-Editinterface-member' => 'editor rozhrania',
	'group-Global_bot-member' => 'Globálny robot',
	'group-Global_rollback-member' => 'Globálny rollbacker',
	'group-Ombudsmen-member' => 'Ombudsman',
	'group-Staff-member' => 'zamestnanec',
	'group-coder' => 'Kóderi',
	'group-coder-member' => 'kóder',
	'group-inactive' => 'Neaktívni používatelia',
	'group-inactive-member' => 'neaktívny používateľ',
	'grouppage-inactive' => '{{ns:project}}:Neaktívni používatelia',
	'wikimedia-copyright' => 'Text je dostupný za podmienok <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a>; prípadne za ďalších podmienok. Podrobnejšie informácie nájdete na stránke <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Podmienky použitia</a>.',
	'wikimedia-copyrightwarning' => 'Uložením stránky neodvolateľne súhlasíte s uvoľnením svojho príspevku za podmienok [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] a [http://www.gnu.org/copyleft/fdl.html GFDL]. Súhlasíte, že používatelia tohto obsahu vás musia uviesť ako autora a to minimálne hyperodkazom alebo URL na článok do ktorého prispievate. Podrobnejšie informácie nájdete na stránke [http://wikimediafoundation.org/wiki/Terms_of_Use Podmienky použitia].',
	'wikimedia-editpage-tos-summary' => 'Ak nesúhlasíte s tým, že váš príspevok môže byť ľubovoľne upravovaný a šírený, nezverejňujte ho tu. Ak ste tento text nenapísali sami, musí byť dostupný za podmienok v súlade s [http://wikimediafoundation.org/wiki/Terms_of_Use Podmienkami použitia] a musíte dodržiavať všetky súvisiace licenčné požiadavky.',
);

/** Slovenian (Slovenščina)
 * @author Smihael
 * @author Yerpo
 */
$messages['sl'] = array(
	'wikimediamessages-desc' => 'Posebna sporočila Wikimedie',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/Now/sl?utm_source=donate&utm_medium=sidebar&utm_campaign=spontaneous_donation',
	'sitesupport' => 'Denarni prispevki',
	'tooltip-n-sitesupport' => 'Podprite nas',
	'group-abusefilter' => 'Uredniki filtrov zlorabe',
	'group-accountcreator' => 'Ustvarjalci računov',
	'group-autopatroller' => 'Samodejni nadzorniki',
	'group-autoreviewer' => 'Samodejni pregledovalci',
	'group-bigexport' => 'Veliki izvozniki',
	'group-confirmed' => 'Potrjeni uporabniki',
	'group-founder' => 'Ustanovitelji',
	'group-import' => 'Uvozniki',
	'group-rollbacker' => 'Vračalci urejanj',
	'group-transwiki' => 'Transwiki uvozniki',
	'group-abusefilter-member' => 'urednik filtrov zlorabe',
	'group-accountcreator-member' => 'ustvarjalec računov',
	'group-autopatroller-member' => 'samodejni nadzornik',
	'group-autoreviewer-member' => 'samodejni pregledovalec',
	'group-bigexport-member' => 'velik izvoznik',
	'group-confirmed-member' => 'potrjen uporabnik',
	'group-founder-member' => 'ustanovitelj',
	'group-import-member' => 'uvoznik',
	'group-rollbacker-member' => 'vračalec urejanj',
	'group-transwiki-member' => 'transwiki uvoznik',
	'grouppage-abusefilter' => '{{ns:project}}:Uredniki filtrov zlorabe',
	'grouppage-accountcreator' => '{{ns:project}}:Ustvarjalci računov',
	'grouppage-autopatroller' => '{{ns:project}}:Samodejni nadzorniki',
	'grouppage-autoreviewer' => '{{ns:project}}:Samodejni pregledovalci',
	'grouppage-bigexport' => '{{ns:project}}:Veliki izvozniki',
	'grouppage-confirmed' => '{{ns:project}}:Potrjeni uporabniki',
	'grouppage-founder' => '{{ns:project}}:Ustanovitelji',
	'grouppage-import' => '{{ns:project}}:Uvozniki',
	'grouppage-rollbacker' => '{{ns:project}}:Vračalci urejanj',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki uvozniki',
	'group-steward' => 'Upravniki',
	'group-sysadmin' => 'Sistemski administratorji',
	'group-Editinterface' => 'Urejevalci vmesnika',
	'group-Global_bot' => 'Globalni boti',
	'group-Global_rollback' => 'Globalni vračalci urejanj',
	'group-Ombudsmen' => 'Ombudsmani',
	'group-Staff' => 'Osebje',
	'group-steward-member' => 'upravnik',
	'group-sysadmin-member' => 'sistemski administrator',
	'group-Editinterface-member' => 'urejevalec vmesnika',
	'group-Global_bot-member' => 'globalni bot',
	'group-Global_rollback-member' => 'globalni vračalec urejanj',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'zaposlen',
	'group-coder' => 'Koderji',
	'group-coder-member' => 'koder',
	'group-inactive' => 'Neaktivni uporabniki',
	'group-inactive-member' => 'neaktiven uporabnik',
	'grouppage-inactive' => '{{ns:project}}:Neaktivni uporabniki',
	'shared-repo-name-shared' => 'Wikimedijine Zbirke',
	'wikimedia-copyright' => 'Besedilo je na razpolago pod <a href="http://creativecommons.org/licenses/by-sa/3.0/">dovoljenjem Creative Commons 
Priznanje avtorstva-Deljenje pod enakimi pogoji 3.0</a>; dodatni pogoji se lahko uveljavljajo. Glej <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Pogoje uporabe</a> za podrobnosti.',
	'wikimedia-copyrightwarning' => 'S klikom na »Shrani stran« se strinjate z nepreklicno objavo svojega prispevka v skladu z licencama [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Priznanje avtorstva-Deljenje pod enakimi pogoji 3.0] in [http://www.gnu.org/copyleft/fdl.html GFDL].
Strinjate se, da se, ob morebitni ponovni uporabi prispevka, navede vsaj povezavo oz. URL do strani h kateri pravkar prispevate.
Glej [http://wikimediafoundation.org/wiki/Terms_of_Use Pogoje uporabe] za podrobnosti.',
	'wikimedia-editpage-tos-summary' => 'Če ne želite, da so vaši prispevki kadarkoli preurejeni ali redistribuirani, ga ne prispevajte. 
Če prispevka niste napisali sami, mora biti na razpolago pod pogoji, skladnimi s [http://wikimediafoundation.org/wiki/Terms_of_Use Pogoji uporabe]. Poleg tega s shranjevanjem potrjujete, da upoštevate vse zahteve licence izvirne objave.',
);

/** Lower Silesian (Schläsch)
 * @author Schläsinger
 */
$messages['sli'] = array(
	'sitesupport' => 'Spenda',
	'group-coder' => 'Programmierer',
);

/** Samoan (Gagana Samoa) */
$messages['sm'] = array(
	'sitesupport' => 'Meaalofa tupe',
);

/** Southern Sami (Åarjelsaemien)
 * @author M.M.S.
 */
$messages['sma'] = array(
	'sitesupport' => 'Vedtedh beetnegh',
	'tooltip-n-sitesupport' => '{{SITENAME}} dåarjedidh',
);

/** Shona (chiShona)
 * @author Hakka
 */
$messages['sn'] = array(
	'sitesupport' => 'Zvipo',
);

/** Somali (Soomaaliga)
 * @author Mimursal
 */
$messages['so'] = array(
	'sitesupport' => 'Tabarucid',
	'tooltip-n-sitesupport' => 'Nacaawi',
);

/** Albanian (Shqip)
 * @author Dori
 * @author Puntori
 */
$messages['sq'] = array(
	'sitesupport' => 'Dhurime',
	'tooltip-n-sitesupport' => 'Na përmbajë',
	'group-accountcreator' => 'Krijuesit e kontove',
	'group-founder' => 'Themeluesit',
	'group-import' => 'Importuesit',
	'group-founder-member' => 'themelues',
	'group-import-member' => 'importues',
	'group-steward' => 'Përgjegjës',
	'group-Staff' => 'Stafi',
	'group-steward-member' => 'Përgjegjës',
	'group-Staff-member' => 'anëtar i stafit',
	'group-coder' => 'Koduesit',
	'group-coder-member' => 'kodues',
);

/** Serbian Cyrillic ekavian (Српски (ћирилица))
 * @author Millosh
 * @author Red Baron
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'wikimediamessages-desc' => 'Поруке специфичне за Викимедију.',
	'sitesupport' => 'Донације',
	'tooltip-n-sitesupport' => 'подржи нас',
	'group-accountcreator' => 'ствараоци налога',
	'group-autopatroller' => 'Аутопатролисани',
	'group-founder' => 'оснивачи',
	'group-import' => 'уносници',
	'group-ipblock-exempt' => 'изузеци од ИП блокова',
	'group-rollbacker' => 'враћачи',
	'group-transwiki' => 'међувики уносници',
	'group-accountcreator-member' => 'стваралац налога',
	'group-autopatroller-member' => 'аутопатролисан',
	'group-founder-member' => 'оснивач',
	'group-import-member' => 'уносник',
	'group-ipblock-exempt-member' => 'изузетак од ИП блокова',
	'group-rollbacker-member' => 'враћач',
	'group-transwiki-member' => 'међувики уносник',
	'grouppage-accountcreator' => '{{ns:project}}:Стварачи налога',
	'grouppage-autopatroller' => '{{ns:project}}:Аутопатролисани',
	'grouppage-founder' => '{{ns:project}}:Оснивачи',
	'grouppage-import' => '{{ns:project}}:Уносници',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Изузетак од ИП блокова',
	'grouppage-rollbacker' => '{{ns:project}}:Враћачи',
	'grouppage-transwiki' => '{{ns:project}}:Међувики уносници',
	'group-steward' => 'Стјуарди',
	'group-sysadmin' => 'Системски администратори',
	'group-Global_bot' => 'Глобални ботови',
	'group-Global_rollback' => 'Глобални враћачи',
	'group-steward-member' => 'Стјуард',
	'group-sysadmin-member' => 'системски администратор',
	'group-Global_bot-member' => 'глобални бот',
	'group-Global_rollback-member' => 'глобални враћач',
	'group-coder' => 'Кодери',
	'group-coder-member' => 'кодер',
	'group-inactive-member' => 'неактиван корисник',
);

/** Serbian Latin ekavian (Srpski (latinica))
 * @author Michaello
 */
$messages['sr-el'] = array(
	'wikimediamessages-desc' => 'Poruke specifične za Vikimediju.',
	'sitesupport' => 'Donacije',
	'tooltip-n-sitesupport' => 'podrži nas',
	'group-accountcreator' => 'stvaraoci naloga',
	'group-autopatroller' => 'Autopatrolisani',
	'group-founder' => 'osnivači',
	'group-import' => 'unosnici',
	'group-ipblock-exempt' => 'izuzeci od IP blokova',
	'group-rollbacker' => 'vraćači',
	'group-transwiki' => 'međuviki unosnici',
	'group-accountcreator-member' => 'stvaralac naloga',
	'group-autopatroller-member' => 'autopatrolisan',
	'group-founder-member' => 'osnivač',
	'group-import-member' => 'unosnik',
	'group-ipblock-exempt-member' => 'izuzetak od IP blokova',
	'group-rollbacker-member' => 'vraćač',
	'group-transwiki-member' => 'međuviki unosnik',
	'grouppage-accountcreator' => '{{ns:project}}:Stvarači naloga',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrolisani',
	'grouppage-founder' => '{{ns:project}}:Osnivači',
	'grouppage-import' => '{{ns:project}}:Unosnici',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Izuzetak od IP blokova',
	'grouppage-rollbacker' => '{{ns:project}}:Vraćači',
	'grouppage-transwiki' => '{{ns:project}}:Međuviki unosnici',
	'group-steward' => 'Stjuardi',
	'group-sysadmin' => 'Sistemski administratori',
	'group-Global_bot' => 'Globalni botovi',
	'group-Global_rollback' => 'Globalni vraćači',
	'group-steward-member' => 'Stjuard',
	'group-sysadmin-member' => 'sistemski administrator',
	'group-Global_bot-member' => 'globalni bot',
	'group-Global_rollback-member' => 'globalni vraćač',
	'group-coder' => 'Koderi',
	'group-coder-member' => 'koder',
	'group-inactive-member' => 'neaktivan korisnik',
);

/** Sranan Tongo (Sranantongo)
 * @author Adfokati
 */
$messages['srn'] = array(
	'sitesupport' => 'Yibi a finansi',
	'tooltip-n-sitesupport' => 'Gi wi wan finansi',
);

/** Southern Sotho (Sesotho) */
$messages['st'] = array(
	'sitesupport' => 'Dimpho',
);

/** Seeltersk (Seeltersk)
 * @author Maartenvdbent
 * @author Pyt
 */
$messages['stq'] = array(
	'wikimediamessages-desc' => 'Wikimediaspezifiske Systemättergjuchten',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Spändje',
	'sitesupport' => 'Spenden',
	'tooltip-n-sitesupport' => 'Unnerstutse uus',
	'group-abusefilter' => 'Misbruukssieuwe-Beoarbaidere',
	'group-accountcreator' => 'Benutserkonten-Moakere',
	'group-autopatroller' => 'Automatiske Wröigere',
	'group-autoreviewer' => 'Autowröigere',
	'group-bigexport' => 'Grootexporteure',
	'group-founder' => 'Gruundere',
	'group-import' => 'Importeur',
	'group-ipblock-exempt' => 'IP-Speere-Uutnoamen',
	'group-rollbacker' => 'Touräächsättere',
	'group-transwiki' => 'Transwiki-Importeure',
	'group-abusefilter-member' => 'Misbruukssieuwe-Beoarbaider',
	'group-accountcreator-member' => 'Benutserkonten-Moaker',
	'group-autopatroller-member' => 'Automatisken Wröiger',
	'group-bigexport-member' => 'Grootexporteur',
	'group-founder-member' => 'Gruunder',
	'group-import-member' => 'Importeur',
	'group-ipblock-exempt-member' => 'IP-Speere-Uutnoame',
	'group-rollbacker-member' => 'Touräächsätter',
	'group-transwiki-member' => 'Transwiki-Importeur',
	'grouppage-accountcreator' => '{{ns:project}}:Benutserkonten-Moakere',
	'grouppage-autopatroller' => '{{ns:project}}:Automatiske Wröigere',
	'grouppage-founder' => '{{ns:project}}:Gruundere',
	'grouppage-import' => '{{ns:project}}:Importeure',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP-Speere-Uutnoame',
	'grouppage-rollbacker' => '{{ns:project}}:Touräächsättere',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-Importeure',
	'group-steward' => 'Stewarde',
	'group-sysadmin' => 'Systemadministratore',
	'group-Global_bot' => 'Globoale Bots',
	'group-Global_rollback' => 'Globoale Touräächsättere',
	'group-Ombudsmen' => 'Ombudsljuude',
	'group-Staff' => 'Mee-Oarbaidere',
	'group-steward-member' => 'Steward',
	'group-sysadmin-member' => 'Systemadministrator',
	'group-Global_bot-member' => 'Globoalen Bot',
	'group-Global_rollback-member' => 'Globoalen Touräächsätter',
	'group-Ombudsmen-member' => 'Ombudspersoon',
	'group-Staff-member' => 'Mee-Oarbaider',
	'grouppage-steward' => '{{ns:project}}:Stewards',
	'group-coder' => 'Programmierdere',
	'group-coder-member' => 'Programmierder',
);

/** Sundanese (Basa Sunda)
 * @author Irwangatot
 * @author Kandar
 */
$messages['su'] = array(
	'wikimediamessages-desc' => 'Talatah-talatah spesifik Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Penggalangan_dana',
	'sitesupport' => 'Sumbangan',
	'tooltip-n-sitesupport' => 'Bobotohan',
	'group-accountcreator' => 'Nu nyieun rekening',
	'group-founder' => 'Nu ngadegkeun',
	'group-import' => 'Importir',
	'group-ipblock-exempt' => 'Peungpeuk kajaba IP',
	'group-rollbacker' => 'Malikeun révisi',
	'group-transwiki' => 'Importir transwiki',
	'group-accountcreator-member' => 'nu nyieun rekening',
	'group-founder-member' => 'nu ngadegkeun',
	'group-import-member' => 'importir',
	'group-ipblock-exempt-member' => 'Peungpeuk kajaba IP',
	'group-rollbacker-member' => 'Malikeun révisi',
	'group-transwiki-member' => 'importir transwiki',
	'grouppage-accountcreator' => '{{ns:project}}:Nu nyieun rekening',
	'grouppage-founder' => '{{ns:project}}:Nu ngadegkeun',
	'grouppage-import' => '{{ns:project}}:Importir',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Peungpeuk kajaba IP',
	'grouppage-rollbacker' => '{{ns:project}}:Malikeun révisi',
	'grouppage-transwiki' => '{{ns:project}}:Importir transwiki',
	'group-steward' => 'Steward',
	'group-sysadmin' => 'Kuncén sistem',
	'group-Global_bot' => 'Bot global',
	'group-Global_rollback' => 'Malikeun révisi global',
	'group-Ombudsmen' => 'Ombudsman',
	'group-Staff' => 'Staf',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'kuncén sistem',
	'group-Global_bot-member' => 'bot global',
	'group-Global_rollback-member' => 'Malikeun révisi global',
	'group-Ombudsmen-member' => 'Ombudsman',
	'group-Staff-member' => 'Anggota staf',
	'grouppage-steward' => '{{ns:project}}:Steward',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Fluff
 * @author Jon Harald Søby
 * @author Lejonel
 * @author M.M.S.
 * @author Najami
 * @author Rotsee
 * @author Sannab
 */
$messages['sv'] = array(
	'wikimediamessages-desc' => 'Wikimedia-specifika meddelanden',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/sv',
	'sitesupport' => 'Donationer',
	'tooltip-n-sitesupport' => 'Stöd oss',
	'group-abusefilter' => 'Redigerare av missbruksfilter',
	'group-accountcreator' => 'Kontoskapare',
	'group-autopatroller' => 'Autopatrullerare',
	'group-autoreviewer' => 'Automatiska granskare',
	'group-bigexport' => 'Stora exporterare',
	'group-confirmed' => 'Bekräftade användare',
	'group-founder' => 'Grundare',
	'group-import' => 'Importörer',
	'group-ipblock-exempt' => 'Undantagna från IP-blockering',
	'group-rollbacker' => 'Tillbakarullare',
	'group-transwiki' => 'Transwiki-importörer',
	'group-abusefilter-member' => 'redigerare av missbruksfilter',
	'group-accountcreator-member' => 'kontoskapare',
	'group-autopatroller-member' => 'autopatrullerare',
	'group-autoreviewer-member' => 'automatisk granskare',
	'group-bigexport-member' => 'stor exporterare',
	'group-confirmed-member' => 'bekräftad användare',
	'group-founder-member' => 'grundare',
	'group-import-member' => 'importör',
	'group-ipblock-exempt-member' => 'undantagen från IP-blockering',
	'group-rollbacker-member' => 'tillbakarullare',
	'group-transwiki-member' => 'transwiki-importör',
	'grouppage-abusefilter' => '{{ns:project}}:Redigerare av missbruksfilter',
	'grouppage-accountcreator' => '{{ns:project}}:Kontoskapare',
	'grouppage-autopatroller' => '{{ns:project}}:Autopatrullerare',
	'grouppage-autoreviewer' => '{{ns:project}}:Automatiska granskare',
	'grouppage-bigexport' => '{{ns:project}}:Stora exporterare',
	'grouppage-confirmed' => '{{ns:project}}:Bekräftade användare',
	'grouppage-founder' => '{{ns:project}}:Grundare',
	'grouppage-import' => '{{ns:project}}:Importörer',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Undantagna från IP-blockering',
	'grouppage-rollbacker' => '{{ns:project}}:Tillbakarullare',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-importörer',
	'group-steward' => 'Stewarder',
	'group-sysadmin' => 'Systemadministratörer',
	'group-Editinterface' => 'Gränssnitts-redigeringar',
	'group-Global_bot' => 'Globala robotar',
	'group-Global_rollback' => 'Globala tillbakarullare',
	'group-Ombudsmen' => 'Ombudsmän',
	'group-Staff' => 'Personal',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'systemadministratör',
	'group-Editinterface-member' => 'gränssnitts-redigering',
	'group-Global_bot-member' => 'global robot',
	'group-Global_rollback-member' => 'global tillbakarullare',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'personal',
	'grouppage-steward' => 'm:Stewards/nb',
	'grouppage-Global_rollback' => 'm:Global rollback/nb',
	'group-coder' => 'Kodare',
	'group-coder-member' => 'kodare',
	'group-inactive' => 'Inaktiva användare',
	'group-inactive-member' => 'inaktiv användare',
	'grouppage-inactive' => '{{ns:project}}:Inaktiva användare',
	'wikimedia-copyright' => 'Text är tillgänglig under <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.sv">Creative Commons Erkännande-Dela Lika-licens</a>; ytterligare villkor kan gälla. Se <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Villkor</a> för detaljer.',
	'wikimedia-copyrightwarning' => 'Genom att spara släpper du oåterkalligen dina bidrag under [http://creativecommons.org/licenses/by-sa/3.0/deed.sv Creative Commons-licensen Erkännande-Dela Lika 3.0] och [http://www.gnu.org/copyleft/fdl.html GFDL].
Du går med på att bli krediterat av återanvändare med minst en hyperlänk eller URL till sidan du bidrar till.
Se [http://wikimediafoundation.org/wiki/Terms_of_Use Terms of Use] för mer upplysningar.',
	'wikimedia-editpage-tos-summary' => 'Om du inte vill att det du skriver ska bli redigerat och återanvänt ska du inte spara det här.
Om du inte själv skrev det här, så måste det vara tillgängligt under villkor som är i överensstämmelse med [http://wikimediafoundation.org/wiki/Terms_of_Use Användarvillkoren], och du bekräftar att uppfylla alla relevanta licenskrav.',
);

/** Swahili (Kiswahili)
 * @author Lloffiwr
 * @author Malangali
 * @author לערי ריינהארט
 */
$messages['sw'] = array(
	'sitesupport' => 'Michango',
	'tooltip-n-sitesupport' => 'Tuunge mkono',
	'wikimedia-copyright' => 'Maandishi yanapatikana chini ya leseni ya <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a>; matakwa mengine yanaweza kutakiwa.
Tazama maelezo zaidi ya <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Matakwa ya Utumiaji</a>.',
	'wikimedia-copyrightwarning' => 'Unapohifadhi maandishi yako, unakubali (kwa jinsi isiotenguka) mchango wako utolewe chini ya leseni ya [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] pamoja na [http://www.gnu.org/copyleft/fdl.html GFDL].
Unakubali utambuliwe wakati maandishi haya yatumika na wengine, angalau kwa nia ya kiungo (hyperlink) au URL kwenye ukurasa uliouchangia.
Tazama maelezo zaidi ya [http://wikimediafoundation.org/wiki/Terms_of_Use Matakwa ya Utumiaji].',
	'wikimedia-editpage-tos-summary' => 'Ikiwa hutaki maandashi yako yahaririwe na yatumike kwa hiari, basi usiyaweke hapa.
Ikiwa hukuandika mchango huu mwenyewe, lazima upatikane chini ya matakwa yanayolingana na [http://wikimediafoundation.org/wiki/Terms_of_Use Matakwa ya Utumiaji] yanayotumika hapa, na unakubali kufuata matakwa yeyote ya leseni yake.',
);

/** Silesian (Ślůnski)
 * @author Herr Kriss
 * @author Lajsikonik
 */
$messages['szl'] = array(
	'wikimediamessages-desc' => 'Kůmůńikaty ůńikalne lů projektůw Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/pl',
	'sitesupport' => 'Śćepa',
	'tooltip-n-sitesupport' => 'Wspůmůž nas',
	'group-accountcreator' => 'Tworzůncy kůnta',
	'group-autopatroller' => 'Patrolujůncy autůmatyczńy',
	'group-founder' => 'Zołożyćele',
	'group-import' => 'Importery',
	'group-ipblock-exempt' => 'Uprowńyńi do logowańo śe s zawartych adresůw IP',
	'group-rollbacker' => 'Uprowńyńi do wycofywańo sprowjyń',
	'group-transwiki' => 'Importery transwiki',
	'group-accountcreator-member' => 'twůrca kůnt',
	'group-autopatroller-member' => 'patrolujůncy autůmatyczńy',
	'group-founder-member' => 'zołożyćel',
	'group-import-member' => 'importer',
	'group-ipblock-exempt-member' => 'uprowńůny do logowańo śe s zawartego adresa IP',
	'group-rollbacker-member' => 'uprowńůny do wycofywańo sprowjyń',
	'group-transwiki-member' => 'importer transwiki',
	'grouppage-accountcreator' => '{{ns:project}}:Twůrcy kůnt',
	'grouppage-autopatroller' => '{{ns:project}}:Patrolujůncy autůmatyczńy',
	'grouppage-founder' => '{{ns:project}}:Zołożyćele',
	'grouppage-import' => '{{ns:project}}:Importery',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Uprowńyńi do logowańo śe s zawartych adresůw IP',
	'grouppage-rollbacker' => '{{ns:project}}:Uprowńyńi do wycofywańo sprowjyń',
	'grouppage-transwiki' => '{{ns:project}}:Importery transwiki',
	'group-steward' => 'Stewardy',
	'group-sysadmin' => 'Admińistratory systymu',
	'group-Global_bot' => 'Boty globalne',
	'group-Global_rollback' => 'Globalńy uprowńyńi do wycofywańo sprowjyń',
	'group-Ombudsmen' => 'Rzeczńiki prow',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'admińistrator systyma',
	'group-Global_bot-member' => 'bot globalny',
	'group-Global_rollback-member' => 'globalńy uprowńony do wycofywańo sprowjyń',
	'group-Ombudsmen-member' => 'rzeczńik prow',
	'group-coder' => 'Programisty',
	'group-coder-member' => 'programista',
	'wikimedia-copyright' => 'Tekst je udostympńany na <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.pl">licencyji Creative Commons: uznańe autorstwa, na jednakich warunkach</a>, ze możebnośćům uobowjůnzywańo ekstra uograńiczyń.
Uobejzdrzij blank dokłodne informacyje uo <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">warunkach korzystańo</a>.',
	'wikimedia-copyrightwarning' => 'Bez spamjyntańe půmjyńań dowosz ńyodwołalno zgoda na udostympńańe Twojygo wkłodu na licencyjach [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons: uznańe autorstwa, na jednakich warůnkach, wersyja licencyji 3.0] a tyż na licencyji [http://www.gnu.org/copyleft/fdl.html GFDL]. Wyrażosz zgoda na wykorzystańe pod warunkem co najmnńyj podańo necowygo uodwołańo abo adresa URL do zajty na keryj powstoła treść. Uobejzdrzij blank dokładne informacyje uo [http://wikimediafoundation.org/wiki/Terms_of_Use warunkach korzystańo].',
	'wikimedia-editpage-tos-summary' => 'Eli ńy chcesz, coby Twůj tekst můg być dowolńe půmjyńany uod kożdygo a tyż rozpowszechńany bez uograńiczeńůw, ńy wćepuj go sam. Jeli tekst ńy uostoł naszkryflany uod Ćebje samygo, muśi uůn być dostympny pode zasadůma zgodnymi ze [http://wikimediafoundation.org/wiki/Terms_of_Use warunkami wykorzistańo] a muśisz dać zgoda na wszyjske istotne licencyjne wymogi.',
);

/** Tamil (தமிழ்)
 * @author Mayooranathan
 * @author Trengarasu
 */
$messages['ta'] = array(
	'sitesupport' => 'நன்கொடை',
	'tooltip-n-sitesupport' => 'நன்கொடைகளை வழங்குங்கள்',
);

/** Telugu (తెలుగు)
 * @author Kiranmayee
 * @author Mpradeep
 * @author Ravichandra
 * @author Veeven
 */
$messages['te'] = array(
	'wikimediamessages-desc' => 'వికీమీడియా సంబంధిత సందేశాలు',
	'sitesupport' => 'విరాళములు',
	'tooltip-n-sitesupport' => 'మాకు తోడ్పడండి',
	'group-accountcreator' => 'ఖాతా తయారీదార్లు',
	'group-autopatroller' => 'ఆటోపాట్రోలర్స్',
	'group-autoreviewer' => 'ఆటోరివ్యూవర్స్',
	'group-bigexport' => 'పెద్ద ఎగుమతిదారులు',
	'group-confirmed' => 'నిర్థారిత వాడుకరులు',
	'group-founder' => 'వ్యవస్థాపకులు',
	'group-import' => 'దిగుమతిదార్లు',
	'group-ipblock-exempt' => 'ఐపీ నిరోధపు మినహాయింపులు',
	'group-rollbacker' => 'రద్దుచేసినవారు',
	'group-transwiki' => 'ట్రాన్స్ వికీ దిగుమతిదారులు',
	'group-accountcreator-member' => 'ఖాతా సృష్టికర్త',
	'group-autopatroller-member' => 'ఆటోపాట్రోలర్',
	'group-autoreviewer-member' => 'ఆటోరివ్యూవర్',
	'group-bigexport-member' => 'పెద్ద ఎగుమతిదారుడు',
	'group-confirmed-member' => 'నిర్ధారించబడిన వాడుకరి',
	'group-founder-member' => 'వ్యవస్థాపకుడు',
	'group-import-member' => 'దిగుమతిదారు',
	'group-ipblock-exempt-member' => 'ఐపీ నిరోధపు మినహాయింపు',
	'group-rollbacker-member' => 'రద్దుచేసినవారు',
	'group-transwiki-member' => 'ట్రాన్స్ వికీ దిగుమతిదారుడు',
	'grouppage-accountcreator' => '{{ns:project}}:ఖాతా సృష్టికర్తలు',
	'grouppage-autoreviewer' => '{{ns:project}}: ఆటోరివ్యూవర్స్',
	'grouppage-bigexport' => '{{ns:project}}:పెద్ద ఎగుమతిదారులు',
	'grouppage-confirmed' => '{{ns:project}}:నిర్థారించబడిన వాడుకరులు',
	'grouppage-founder' => '{{ns:project}}:వ్యవస్థాపకులు',
	'grouppage-import' => '{{ns:project}}:దిగుమతిదార్లు',
	'grouppage-ipblock-exempt' => '{{ns:project}}:ఐపీ నిరోధపు మినహాయింపు',
	'grouppage-rollbacker' => '{{ns:project}}:రద్దుచేసినవారు',
	'grouppage-transwiki' => '{{ns:project}}:ట్రాన్స్ వికీ దిగుమతిదార్లు',
	'group-steward' => 'స్టీవార్డులు',
	'group-sysadmin' => 'వ్యవస్థ నిర్వాహకులు',
	'group-Editinterface' => 'ఇంటర్ఫేస్ ఎడిటర్లు',
	'group-Global_bot' => 'సార్వత్రిక బాట్లు',
	'group-Global_rollback' => 'విశ్వ వెనకకి మళ్లింపుదారులు',
	'group-Ombudsmen' => 'అంబుడ్స్మెన్',
	'group-Staff' => 'సిబ్బంది',
	'group-steward-member' => 'స్టీవార్డు',
	'group-sysadmin-member' => 'నిర్వహణాధికారి',
	'group-Editinterface-member' => 'ఇంటర్ఫేస్ ఎడిటరు',
	'group-Global_bot-member' => 'విశ్వ బాటు',
	'group-Global_rollback-member' => 'విశ్వ వెనకకి మళ్లింపుదారు',
	'group-Ombudsmen-member' => 'అంబుడ్స్మన్',
	'group-Staff-member' => 'సిబ్బంది',
	'group-coder' => 'కోడర్లు',
	'group-coder-member' => 'కోడర్',
	'group-inactive' => 'అచేతన వాడుకరులు',
	'group-inactive-member' => 'అచేతన వాడుకరి',
	'grouppage-inactive' => '{{ns:project}}:అచేతన వాడుకరులు',
	'wikimedia-editpage-tos-summary' => 'మీ రచనలను వేరొకరు మార్చకూడదు, పంచిపెట్టకూడదు అని మీరు అనుకుంటే, మీ రచనలను ఇక్కడ సమర్పించవద్దు. ఈ రచనకు మీరు స్వంతదారులు కాకపోతే ఇది [http://wikimediafoundation.org/wiki/Terms_of_Use Terms of Use] క్రింద ఇది సమర్పించబడి ఉండాలి. అలానే, సంబంధించిన లైసెన్స్ షరతులకు మీరు ఒప్పుకోవాలి.',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'sitesupport' => 'Fó donativu ida',
	'tooltip-n-sitesupport' => 'Tulun ami',
	'group-steward' => 'Steward sira',
	'group-steward-member' => 'Steward',
	'grouppage-steward' => '{{ns:project}}:Steward sira',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 * @author לערי ריינהארט
 */
$messages['tg-cyrl'] = array(
	'wikimediamessages-desc' => 'Пайғомҳои махсуси Викимедиа',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Кӯмаки молӣ',
	'tooltip-n-sitesupport' => 'Моро дастгири намоед',
	'group-accountcreator' => 'Эҷодгарони ҳисоб',
	'group-autopatroller' => 'Гаштзанони худкор',
	'group-founder' => 'Бунёдгузорон',
	'group-import' => 'Воридкунандагон',
	'group-ipblock-exempt' => 'Истиснои қатъи дастрасии нишонаи IP',
	'group-rollbacker' => 'Вогардоникунандагон',
	'group-transwiki' => 'Воридкунандагони трансвики',
	'group-accountcreator-member' => 'эҷодкунандаи ҳисоб',
	'group-autopatroller-member' => 'гаштзани худкор',
	'group-founder-member' => 'асосгузор',
	'group-import-member' => 'воридкунанда',
	'group-ipblock-exempt-member' => 'Истиснои қатъи дастрасии нишонаи интернетӣ',
	'group-rollbacker-member' => 'вогардоникунанда',
	'group-transwiki-member' => 'воридкунандаи трансвики',
	'grouppage-accountcreator' => '{{ns:project}}:Созандагони ҳисоби корбарӣ',
	'grouppage-autopatroller' => '{{ns:project}}:Гаштзанони худкор',
	'grouppage-founder' => '{{ns:project}}:Асосгузорон',
	'grouppage-import' => '{{ns:project}}:Воридкунандагон',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Истиснои қатъи дастрасии нишонаи IP',
	'grouppage-rollbacker' => '{{ns:project}}:Вогардоникунандагон',
	'grouppage-transwiki' => '{{ns:project}}:Воридкунандагони трансвики',
	'group-steward' => 'Википедон',
	'group-sysadmin' => 'Мудирони систем',
	'group-Global_bot' => 'Ботҳои саросарӣ',
	'group-Global_rollback' => 'Вогардоникунандагони саросарӣ',
	'group-Ombudsmen' => 'Додоварон',
	'group-steward-member' => 'википед',
	'group-sysadmin-member' => 'мудири систем',
	'group-Global_bot-member' => 'боти саросарӣ',
	'group-Global_rollback-member' => 'вогардоникунандаи саросарӣ',
	'group-Ombudsmen-member' => 'додовар',
	'group-coder' => 'барноманависон',
	'group-coder-member' => 'барноманавис',
	'group-inactive' => 'Корбарони ғайрифаъол',
	'group-inactive-member' => 'корбарони ғайрифаъол',
);

/** Thai (ไทย)
 * @author Manop
 * @author Mopza
 * @author Octahedron80
 * @author Passawuth
 * @author Woraponboonkerd
 */
$messages['th'] = array(
	'wikimediamessages-desc' => 'ข้อความเฉพาะของวิกิมีเดีย',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/th',
	'sitesupport' => 'สนับสนุน',
	'tooltip-n-sitesupport' => 'สนับสนุนเรา',
	'group-founder' => 'ผู้ก่อตั้ง',
	'group-founder-member' => 'ผู้ก่อตั้ง',
	'group-steward' => 'ผู้ดูแลโครงการ',
	'group-sysadmin' => 'ผู้ดูแลระบบ',
	'group-Ombudsmen' => 'ผู้ตรวจการ',
	'group-Staff' => 'ผู้แปล',
	'group-steward-member' => 'ผู้ดูแลโครงการ',
	'group-sysadmin-member' => 'ผู้ดูแลระบบ',
	'group-Ombudsmen-member' => 'ผู้ตรวจการ',
	'group-Staff-member' => 'ทีมงาน',
);

/** Turkmen (Türkmençe)
 * @author Runningfridgesrule
 */
$messages['tk'] = array(
	'sitesupport' => 'Haýyr-sawahatlar',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 * @author לערי ריינהארט
 */
$messages['tl'] = array(
	'wikimediamessages-desc' => 'Tiyak na mga mensahe ng Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate',
	'sitesupport' => 'Mag-ambag',
	'tooltip-n-sitesupport' => 'Tangkilikin kami',
	'group-abusefilter' => 'Mga patnugot ng pansala ng pang-aabuso',
	'group-accountcreator' => 'Mga tagapalikha ng kuwenta/akawnt',
	'group-autopatroller' => 'Mga kusa/awtomatikong tagapatrolya (awtopatrolyador)',
	'group-bigexport' => 'Malalaking mga tagapagluwas',
	'group-founder' => 'Mga tagapagtatag',
	'group-import' => 'Mga tagapagangkat',
	'group-ipblock-exempt' => 'Mga hindi kasali sa paghaharang/paghahadlang ng IP',
	'group-rollbacker' => 'Mga tagagpagpagulong pabalik sa dati',
	'group-transwiki' => 'Mga tagapagangkat na panglipat-wiki/transwiki',
	'group-abusefilter-member' => 'patnugot ng pansala ng pang-aabuso',
	'group-accountcreator-member' => 'tagapaglikha ng kuwenta/akawnt',
	'group-autopatroller-member' => 'kusang tagapatrolya/awtopatrolyador',
	'group-bigexport-member' => 'malaking tagapagluwas',
	'group-founder-member' => 'tagapagtatag',
	'group-import-member' => 'tagapagangkat',
	'group-ipblock-exempt-member' => 'Hindi kasali sa pagharang/paghadlang ng IP',
	'group-rollbacker-member' => 'tagapagpagulong pabalik sa dati',
	'group-transwiki-member' => 'tagapagangkat na pangtranswiki/lipat-wiki',
	'grouppage-abusefilter' => '{{ns:project}}:Mga patnugot ng pansala ng pang-aabuso',
	'grouppage-accountcreator' => '{{ns:project}}:Mga tagapaglikha ng akawnt/kuwenta',
	'grouppage-autopatroller' => '{{ns:project}}:Mga awtopatrolyador',
	'grouppage-bigexport' => '{{ns:project}}:Malalaking mga tagapagluwas',
	'grouppage-founder' => '{{ns:project}}:Mga tagapagtatag',
	'grouppage-import' => '{{ns:project}}:Mga tagapagangkat',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Hind kasali sa paghadlang na pang-IP',
	'grouppage-rollbacker' => '{{ns:project}}:Mga tagapagpagulong pabalik sa dati',
	'grouppage-transwiki' => '{{ns:project}}:Mga tagapagangkat na pangtranswiki/panglipat-wiki',
	'group-steward' => 'Mga bandahali',
	'group-sysadmin' => 'Mga tagapangasiwa ng sistema',
	'group-Global_bot' => "Pandaigdigang mga ''bot''",
	'group-Global_rollback' => 'Pandaigdigang mga tagapagpagulong pabalik sa dati',
	'group-Ombudsmen' => 'Mga tanod-bayan',
	'group-Staff' => 'Mga tauhan',
	'group-steward-member' => 'bandahali',
	'group-sysadmin-member' => 'tagapangasiwa ng sistema',
	'group-Global_bot-member' => "pandaigdigang ''bot''",
	'group-Global_rollback-member' => 'pandaigdigang tagapagpagulong pabalik sa dati',
	'group-Ombudsmen-member' => 'tanod-bayan',
	'group-Staff-member' => 'kasaping tauhan',
	'grouppage-steward' => 'm:Mga bandahali',
	'grouppage-sysadmin' => 'm:Mga tagapangasiwa ng sistema',
	'grouppage-Global_bot' => 'm:Pandaigdigang bot',
	'grouppage-Global_rollback' => 'm:Pandaigdigang pagpapagulong-pabalik sa dati',
	'grouppage-Ombudsmen' => 'm:Komisyon ng tanod-bayan',
	'group-coder' => 'Mga tagapagkodigo',
	'group-coder-member' => 'tagapagkodigo',
	'grouppage-coder' => 'Project:Tagapagkodigo',
);

/** Tswana (Setswana)
 * @author Hakka
 */
$messages['tn'] = array(
	'sitesupport' => 'Dimpho',
);

/** Tonga (lea faka-Tonga) */
$messages['to'] = array(
	'sitesupport' => 'Ngaahi meʻa ʻofa',
	'group-steward' => 'Kau setuate',
	'group-steward-member' => 'Setuate',
);

/** Toki Pona (Toki Pona) */
$messages['tokipona'] = array(
	'sitesupport' => 'o pana e mani',
);

/** Tok Pisin (Tok Pisin)
 * @author לערי ריינהארט
 */
$messages['tpi'] = array(
	'sitesupport' => 'Givim moni',
);

/** Turkish (Türkçe)
 * @author Joseph
 * @author Karduelis
 * @author Metal Militia
 */
$messages['tr'] = array(
	'wikimediamessages-desc' => 'Vikimedya özel mesajları',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/tr',
	'sitesupport' => 'Bağışlar',
	'tooltip-n-sitesupport' => 'Bizi destekleyin',
	'group-abusefilter' => 'Suistimal filtresi editörleri',
	'group-accountcreator' => 'Hesap oluşturucular',
	'group-autopatroller' => 'Oto-kontrolcüler',
	'group-autoreviewer' => 'Oto-eleştirmenler',
	'group-bigexport' => 'Büyük ihraççılar',
	'group-confirmed' => 'Onaylı kullanıcılar',
	'group-founder' => 'Kurucular',
	'group-import' => 'İçe aktarıcılar',
	'group-ipblock-exempt' => 'IP engelleme muafiyetleri',
	'group-rollbacker' => 'Geri döndürücüler',
	'group-transwiki' => 'Vikilerarası içe aktarıcılar',
	'group-abusefilter-member' => 'Suistimal filtresi editörü',
	'group-accountcreator-member' => 'Hesap oluşturucu',
	'group-autopatroller-member' => 'Oto-kontrolcü',
	'group-autoreviewer-member' => 'Oto-eleştirmen',
	'group-bigexport-member' => 'Büyük ihraççı',
	'group-confirmed-member' => 'Onaylı kullanıcı',
	'group-founder-member' => 'Kurucu',
	'group-import-member' => 'İçe aktarıcı',
	'group-ipblock-exempt-member' => 'IP engelleme muafı',
	'group-rollbacker-member' => 'Geri döndürücü',
	'group-transwiki-member' => 'Vikilerarası içe aktarıcı',
	'grouppage-abusefilter' => '{{ns:project}}:Suistimal filtresi editörleri',
	'grouppage-accountcreator' => '{{ns:project}}:Hesap oluşturucular',
	'grouppage-autopatroller' => '{{ns:project}}:Oto-kontrolcü',
	'grouppage-autoreviewer' => '{{ns:project}}:Oto-eleştirmenler',
	'grouppage-bigexport' => '{{ns:project}}:Büyük ihraççılar',
	'grouppage-confirmed' => '{{ns:project}}:Onaylı kullanıcılar',
	'grouppage-founder' => '{{ns:project}}:Kurucular',
	'grouppage-import' => '{{ns:project}}:İçe aktarıcılar',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP engelleme muafiyeti',
	'grouppage-rollbacker' => '{{ns:project}}:Geri döndürücüler',
	'grouppage-transwiki' => '{{ns:project}}:Vikilerarası içe aktarıcılar',
	'group-steward' => 'Kâhyalar',
	'group-sysadmin' => 'Sistem yöneticileri',
	'group-Editinterface' => 'Arayüzey editörleri',
	'group-Global_bot' => 'Küresel botlar',
	'group-Global_rollback' => 'Küresel geri döndürücüler',
	'group-Ombudsmen' => 'Bağımsız hakemler',
	'group-Staff' => 'Görevliler',
	'group-steward-member' => 'Kâhya',
	'group-sysadmin-member' => 'Sistem yöneticisi',
	'group-Editinterface-member' => 'arayüz editörü',
	'group-Global_bot-member' => 'Küresel bot',
	'group-Global_rollback-member' => 'Küresel geri döndürücü',
	'group-Ombudsmen-member' => 'Bağımsız hakem',
	'group-Staff-member' => 'Görevli',
	'grouppage-steward' => '{{ns:project}}:Stewardlar',
	'grouppage-sysadmin' => 'm:Sistem yöneticileri',
	'grouppage-Global_bot' => 'm:Küresel bot',
	'group-coder' => 'Kodlayıcılar',
	'group-coder-member' => 'Kodlayıcı',
	'group-inactive' => 'Etkin olmayan kullanıcılar',
	'group-inactive-member' => 'Etkin olmayan kullanıcı',
	'grouppage-inactive' => '{{ns:project}}:Etkin olmayan kullanıcılar',
	'shared-repo-name-shared' => 'Vikipedi Commons',
	'wikimedia-copyright' => 'Metin <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike Lisansı</a> altındadır; ek koşullar uygulanabilir. Ayrıntılar için <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Kullanım Koşulları</a>na bakın.',
	'wikimedia-copyrightwarning' => 'Sayfayı kaydetmekle katkınızı geri dönülmez şekilde [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike License 3.0] ve [http://www.gnu.org/copyleft/fdl.html GFDL] ile lisanslamayı kabul etmiş olacaksınız. Böylece içeriği daha sonra kullananların size en azından katkıda bulunduğunuz sayfanın url cinsinden bağlantısıyla atıfta bulunacağını da kabul etmiş olursunuz. Ayrıntılar için [http://wikimediafoundation.org/wiki/ Kullanım Koşullarına] bakınız.',
	'wikimedia-editpage-tos-summary' => 'Eğer yazınızın istendiğinde değiştirilmesini ya da yeniden dağıtılmasını istemiyorsanız, burada göndermeyiniz.
Eğer bunu siz yazmadıysanız, yazınız [http://wikimediafoundation.org/wiki/Terms_of_Use Kullanım Koşulları] ile uyumlu şartlar altında olmalıdır, ve herhangi bir ilgili lisans gereksinimine uymayı kabul ediyorsunuz.',
);

/** Tsonga (Xitsonga)
 * @author Thuvack
 */
$messages['ts'] = array(
	'sitesupport' => 'Nyikela mali',
	'tooltip-n-sitesupport' => 'Hi seketeli',
);

/** Tatar (Cyrillic) (Татарча/Tatarça (Cyrillic))
 * @author Rinatus
 * @author Ерней
 */
$messages['tt-cyrl'] = array(
	'sitesupport' => 'Иганә',
	'tooltip-n-sitesupport' => 'Безгә ярдәм итегез',
	'group-inactive' => 'Актив булмаган катнашучылар',
);

/** Tatar (Latin) (Татарча/Tatarça (Latin)) */
$messages['tt-latn'] = array(
	'sitesupport' => 'Ximäyäçegä',
);

/** Tahitian (Reo Mā`ohi) */
$messages['ty'] = array(
	'sitesupport' => 'Pūpū i te ō',
);

/** Tuvinian (Тыва дыл) */
$messages['tyv'] = array(
	'sitesupport' => 'Белектер',
);

/** Udmurt (Удмурт)
 * @author ОйЛ
 */
$messages['udm'] = array(
	'sitesupport' => 'Проектлы юрттон',
);

/** Uighur (Uyghurche‎ / ئۇيغۇرچە) */
$messages['ug'] = array(
	'sitesupport' => 'Iana Toplash',
);

/** ئۇيغۇرچە (ئۇيغۇرچە)
 * @author Sahran
 */
$messages['ug-arab'] = array(
	'wikimediamessages-desc' => 'Wikimedia تەپسىلىي ئۇچۇرلىرى',
	'sitesupport' => 'ئىئانە',
	'tooltip-n-sitesupport' => 'بىزنى قوللاڭ',
	'group-abusefilter' => 'سۈزگۈچتىن قالايمىقان پايدىلانغان تەھرىرلىگۈچى',
	'group-accountcreator' => 'ھېسابات قۇرغۇچى',
	'group-autopatroller' => 'ئۆزلۈكىدىن چارلىغۇچى',
	'group-autoreviewer' => 'ئۆزلۈكىدىن باھالىغۇچىلار',
	'group-founder' => 'ئاساس سالغۇچىلار',
	'group-import' => 'ئەكىرگۈچى',
	'group-ipblock-exempt' => 'IP چەكلەنمەيدىغانلار',
	'group-rollbacker' => 'ئەسلىگە قايتۇرغۇچى',
	'group-transwiki' => 'wiki ھالقىغان ئەكىرگۈچى',
	'group-abusefilter-member' => 'سۈزگۈچتىن قالايمىقان پايدىلانغان تەھرىرلىگۈچى',
	'group-accountcreator-member' => 'ھېسابات قۇرغۇچى',
	'group-autopatroller-member' => 'ئۆزلۈكىدىن چارلىغۇچى',
	'group-autoreviewer-member' => 'ئۆزلۈكىدىن باھالىغۇچى',
	'group-founder-member' => 'ئاساس سالغۇچىلار',
	'group-import-member' => 'ئەكىرگۈچى',
	'group-ipblock-exempt-member' => 'IP چەكلەنمەيدىغانلار',
	'group-rollbacker-member' => 'ئەسلىگە قايتۇرغۇچى',
	'group-transwiki-member' => 'wiki ھالقىغان ئەكىرگۈچى',
	'grouppage-abusefilter' => '{{ns:project}}:سۈزگۈچتىن قالايمىقان پايدىلانغان تەھرىرلىگۈچى',
	'grouppage-accountcreator' => '{{ns:project}}: ھېسابات قۇرغۇچى',
	'grouppage-autopatroller' => '{{ns:project}}:ئۆزلۈكىدىن چارلىغۇچى',
	'grouppage-autoreviewer' => '{{ns:project}}:ئۆزلۈكىدىن باھالىغۇچى',
	'grouppage-founder' => '{{ns:project}}:ئاساس سالغۇچىلار',
	'grouppage-import' => '{{ns:project}}:ئەكىرگۈچى',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP چەكلەنمەيدىغانلار',
	'grouppage-rollbacker' => '{{ns:project}}:ئەسلىگە قايتۇرغۇچى',
	'grouppage-transwiki' => '{{ns:project}}:wiki ھالقىغان ئەكىرگۈچى',
	'group-steward' => 'تەشكىللىگۈچى',
	'group-sysadmin' => 'سىستېما باشقۇرغۇچى',
	'group-Global_bot' => 'پۈتۈن دائىرىلىك ماشىنا ئادەم',
	'group-Global_rollback' => 'پۈتكۈل دائىرىلىك ئەسلىگە قايتۇرغۇچى',
	'group-sysadmin-member' => 'سىستېما باشقۇرغۇچى',
	'group-Global_bot-member' => 'پۈتكۈل دائىرىلىك ماشىنا ئادەم',
	'group-Global_rollback-member' => 'پۈتكۈل دائىرىلىك ئەسلىگە قايتۇرغۇچى',
	'group-coder' => 'پروگراممىچىلار',
	'group-coder-member' => 'پروگراممىچى',
	'group-inactive' => 'پاسسىپ ئىشلەتكۈچىلەر',
	'group-inactive-member' => 'پاسسىپ ئىشلەتكۈچى',
	'grouppage-inactive' => '{{ns:project}}:پاسسىپ ئىشلەتكۈچىلەر',
);

/** Uighur (Latin) (Uyghurche‎ / ئۇيغۇرچە (Latin)) */
$messages['ug-latn'] = array(
	'sitesupport' => 'Iana Toplash',
);

/** Ukrainian (Українська)
 * @author A1
 * @author AS
 * @author Ahonc
 * @author Ickis
 * @author NickK
 */
$messages['uk'] = array(
	'wikimediamessages-desc' => 'Повідомлення, характерні для Вікімедіа',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/uk',
	'sitesupport' => 'Пожертвування',
	'tooltip-n-sitesupport' => 'Підтримайте проект',
	'group-abusefilter' => 'Редактори фільтра зловживань',
	'group-accountcreator' => 'Створювачі облікових записів',
	'group-autopatroller' => 'Автопатрульні',
	'group-autoreviewer' => 'Авторедактори',
	'group-bigexport' => 'Крупні експортери',
	'group-confirmed' => 'Підтверджені користувачі',
	'group-founder' => 'Засновники',
	'group-import' => 'Імпортери',
	'group-ipblock-exempt' => 'Виключення з IP-блокувань',
	'group-rollbacker' => 'Відкочувачі',
	'group-transwiki' => 'Transwiki-імпортери',
	'group-abusefilter-member' => 'редактор фільтра зловживань',
	'group-accountcreator-member' => 'створювач облікових записів',
	'group-autopatroller-member' => 'автопатрульний',
	'group-autoreviewer-member' => 'авторедактор',
	'group-bigexport-member' => 'крупний експортер',
	'group-confirmed-member' => 'підтверджений користувач',
	'group-founder-member' => 'засновник',
	'group-import-member' => 'імпортер',
	'group-ipblock-exempt-member' => 'виключення з IP-блокування',
	'group-rollbacker-member' => 'відкочувач',
	'group-transwiki-member' => 'Transwiki-імпортер',
	'grouppage-abusefilter' => '{{ns:project}}:Редактори фільтра зловживань',
	'grouppage-accountcreator' => '{{ns:project}}:Створювачі облікових записів',
	'grouppage-autopatroller' => '{{ns:project}}:Автопатрульні',
	'grouppage-autoreviewer' => '{{ns:project}}:Авторедактори',
	'grouppage-bigexport' => '{{ns:project}}:Крупні експортери',
	'grouppage-confirmed' => '{{ns:project}}:Підтверджені користувачі',
	'grouppage-founder' => '{{ns:project}}:Засновники',
	'grouppage-import' => '{{ns:project}}:Імпортери',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Виключення з IP-блокування',
	'grouppage-rollbacker' => '{{ns:project}}:Відкочувачі',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki-імпортери',
	'group-steward' => 'Стюарди',
	'group-sysadmin' => 'Системні адміністратори',
	'group-Editinterface' => 'Редактори інтерфейсу',
	'group-Global_bot' => 'Глобальні боти',
	'group-Global_rollback' => 'Глобальні відкочувачі',
	'group-Ombudsmen' => 'Омбудсмени',
	'group-Staff' => 'Співробітники',
	'group-steward-member' => 'стюард',
	'group-sysadmin-member' => 'системний адміністратор',
	'group-Editinterface-member' => 'редактор інтерфейсу',
	'group-Global_bot-member' => 'глобальний бот',
	'group-Global_rollback-member' => 'глобальний відкочувач',
	'group-Ombudsmen-member' => 'омбудсмен',
	'group-Staff-member' => 'співробітник',
	'grouppage-steward' => '{{ns:project}}:Стюарди',
	'group-coder' => 'Програмісти',
	'group-coder-member' => 'програміст',
	'group-inactive' => 'Неактивні користувачі',
	'group-inactive-member' => 'неактивний користувач',
	'grouppage-inactive' => '{{ns:project}}:Неактивні користувачі',
	'shared-repo-name-shared' => 'Вікісховища',
	'wikimedia-copyright' => 'Текст доступний на умовах ліцензії <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike</a>, також можуть діяти додаткові умови. Детальніше див. <a href="http://wikimediafoundation.org/wiki/Умови_використання">умови використання</a>.',
	'wikimedia-copyrightwarning' => 'Зберігаючи свої зміни, ви погоджуєтесь на їх невідкличну публікацію на умовах ліцензій [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution/Share-Alike 3.0] та [http://www.gnu.org/copyleft/fdl.html GFDL]. Ви погоджуєтесь на використання свого внеску за умови вказання URL-адреси на сторінку, яку ви редагували. Детальніше див. [http://wikimediafoundation.org/wiki/Умови_використання умови використання].',
	'wikimedia-editpage-tos-summary' => 'Якщо ви не бажаєте, щоб ваші тексти вільно редагувалися і розповсюджувалися будь-ким, не поміщайте їх сюди.
Якщо ви не є автором цього тексту, він повинен бути доступний на умовах, сумісних із [http://wikimediafoundation.org/wiki/Умови_використання умовами використання], і ви погоджуєтесь дотримуватись усіх відповідних ліцензійних вимог.',
);

/** Urdu (اردو) */
$messages['ur'] = array(
	'sitesupport' => 'رابطہ',
);

/** Uzbek (O'zbek) */
$messages['uz'] = array(
	'sitesupport' => "Loyihaga ko'mak",
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'wikimediamessages-desc' => 'Messagi specifici de Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Donate/vec',
	'sitesupport' => 'Donassion',
	'tooltip-n-sitesupport' => 'Jùtane',
	'group-abusefilter' => 'Gestori filtri anti abusi',
	'group-accountcreator' => 'Creatori de account',
	'group-autopatroller' => 'Patujadori automàteghi',
	'group-autoreviewer' => 'Autoreviewer',
	'group-bigexport' => 'Grando esportador',
	'group-confirmed' => 'Utenti confermà',
	'group-founder' => 'Fondatori',
	'group-import' => 'Inportadori',
	'group-ipblock-exempt' => "Esenzioni dal bloco de l'IP",
	'group-rollbacker' => 'Ripristinadori',
	'group-transwiki' => 'Inportadori transwiki',
	'group-abusefilter-member' => 'gestor filtri anti abusi',
	'group-accountcreator-member' => 'Creator de account',
	'group-autopatroller-member' => 'patujador automàtego',
	'group-autoreviewer-member' => 'autoreviewer',
	'group-bigexport-member' => 'grando esportador',
	'group-confirmed-member' => 'utente confermà',
	'group-founder-member' => 'Fondator',
	'group-import-member' => 'Inportador',
	'group-ipblock-exempt-member' => 'esente dal bloco IP',
	'group-rollbacker-member' => 'ripristinador',
	'group-transwiki-member' => 'Inportador transwiki',
	'grouppage-abusefilter' => '{{ns:project}}:Gestori filtri anti abusi',
	'grouppage-accountcreator' => '{{ns:project}}:Creatori de account',
	'grouppage-autopatroller' => '{{ns:project}}:Patujadori automàteghi',
	'grouppage-autoreviewer' => '{{ns:project}}:Autoreviewer',
	'grouppage-bigexport' => '{{ns:project}}:Grandi esportadori',
	'grouppage-confirmed' => '{{ns:project}}:Utenti confermà',
	'grouppage-founder' => '{{ns:project}}:Fondatori',
	'grouppage-import' => '{{ns:project}}:Inportadori',
	'grouppage-ipblock-exempt' => "{{ns:project}}:Esenzion dal bloco de l'IP",
	'grouppage-rollbacker' => '{{ns:project}}:Ripristinadori',
	'grouppage-transwiki' => '{{ns:project}}:Inportadori transwiki',
	'group-steward' => 'Steward',
	'group-sysadmin' => 'Aministradori de sistema',
	'group-Editinterface' => "Editori de l'interfacia",
	'group-Global_bot' => 'Bot globali',
	'group-Global_rollback' => 'Ripristinadori globali',
	'group-Ombudsmen' => 'Ombudsman',
	'group-Staff' => 'Staff',
	'group-steward-member' => 'steward',
	'group-sysadmin-member' => 'aministrador de sistema',
	'group-Editinterface-member' => "editor de l'interfacia",
	'group-Global_bot-member' => 'bot globale',
	'group-Global_rollback-member' => 'ripristinador globale',
	'group-Ombudsmen-member' => 'ombudsman',
	'group-Staff-member' => 'Menbro del staff',
	'group-coder' => 'Programatori',
	'group-coder-member' => 'programator',
	'group-inactive' => 'Utenti inativi',
	'group-inactive-member' => 'utente inativo',
	'grouppage-inactive' => '{{ns:project}}:Utenti inativi',
	'wikimedia-copyright' => 'El testo el xe disponibile soto la <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.it">licensa Creative Commons Attribution/Share-Alike</a>; a questa podarìa zontarse ulteriori condizioni. Varda le <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">condizioni d\'uso</a> par tuti i detagli.',
	'wikimedia-copyrightwarning' => "Salvando, te acèti in maniera irevocabile de rilassiar el to contributo soto le license [http://creativecommons.org/licenses/by-sa/3.0/deed.it Creative Commons Attribution/Share-Alike 3.0] e [http://www.gnu.org/copyleft/fdl.html GFDL]. Te acèti anca che i riutilizadori te lo atribuìssa almanco mediante un colegamento ipertestuale o un URL a la pagina a cui te ghè contribuìo. Consulta le [http://wikimediafoundation.org/wiki/Terms_of_Use condizioni d'uso] par tuti i detagli.",
	'wikimedia-editpage-tos-summary' => "Se no te voli che el to testo el possa vegner modificà e ridistribuìo a volontà, alora no sta inserirlo qua. Se no te lo ghè scrito ti, el ga da èssar disponibile a condizioni conpatibili co le [http://wikimediafoundation.org/wiki/Terms_of_Use condizioni d'uso], e te acèti de seguir tuti i requisiti de licensa.",
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'wikimediamessages-desc' => 'WikiMedial kävutadud specifižed tedotused',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Tehta_rahalahj',
	'sitesupport' => 'Rahalahjad',
	'tooltip-n-sitesupport' => "Pid'oitelgat meid",
	'group-abusefilter' => "Abidočendan fil'tran redaktorad",
	'group-accountcreator' => 'Registrirujad',
	'group-autopatroller' => 'Avtomatižešti patruliruidud',
	'group-autoreviewer' => 'avtomatižed arvostelijad',
	'group-bigexport' => 'Järedad eksportörad',
	'group-confirmed' => 'vahvištoittud kävutajad',
	'group-founder' => 'Alusenpanijad',
	'group-import' => 'Importörad',
	'group-ipblock-exempt' => 'Erindad IP-blokiruindoišpäi',
	'group-rollbacker' => 'Endištajad',
	'group-transwiki' => 'Importörad Transwikišpäi',
	'group-abusefilter-member' => "pahan kävutamižen fil'tr",
	'group-accountcreator-member' => 'Registrirujad',
	'group-autopatroller-member' => 'Avtomatižešti patruliruidud',
	'group-autoreviewer-member' => 'avtomatine arvostelii',
	'group-bigexport-member' => 'järed eksportör',
	'group-confirmed-member' => 'vahvištoittud kävutai',
	'group-founder-member' => 'alusenpanii',
	'group-import-member' => 'importör',
	'group-ipblock-exempt-member' => 'Erind IP-blokiruindoišpäi',
	'group-rollbacker-member' => 'endištai',
	'group-transwiki-member' => 'importör Transwikišpäi',
	'grouppage-abusefilter' => "{{ns:project}}:Abidoičendan fil'tran redaktorad",
	'grouppage-accountcreator' => '{{ns:project}}:Registrirujad',
	'grouppage-autopatroller' => '{{ns:project}}:Avtomatižešti patruliruidud',
	'grouppage-autoreviewer' => '{{ns:project}}:Avtomatižed arvostelijad',
	'grouppage-bigexport' => '{{ns:project}}:Järedad eksportörad',
	'grouppage-confirmed' => '{{ns:project}}:Vahvištoittud kävutajad',
	'grouppage-founder' => '{{ns:project}}:Alusenpanijad',
	'grouppage-import' => '{{ns:project}}:Importörad',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Erind IP-blokiruindoišpäi',
	'grouppage-rollbacker' => '{{ns:project}}:Endištajad',
	'grouppage-transwiki' => '{{ns:project}}:Importörad Transwikišpäi',
	'group-steward' => 'Stüardad',
	'group-sysadmin' => 'Sisteman administratorad',
	'group-Editinterface' => 'Interfeisan redaktorad',
	'group-Global_bot' => 'Globaližed botad',
	'group-Global_rollback' => 'Globaližed endištajad',
	'group-Ombudsmen' => 'Ombudsmenad',
	'group-Staff' => 'projektan radnikad',
	'group-steward-member' => 'stüard',
	'group-sysadmin-member' => 'sisteman administratorad',
	'group-Editinterface-member' => 'interfeisan redaktor',
	'group-Global_bot-member' => 'globaline bot',
	'group-Global_rollback-member' => 'globaline endištai',
	'group-Ombudsmen-member' => 'ombudsmen',
	'group-Staff-member' => 'projektan radnik',
	'group-coder' => 'Programmistad',
	'group-coder-member' => 'programmist',
	'group-inactive' => 'Kävutajad aktivižuseta',
	'group-inactive-member' => 'kävutai aktivižuseta',
	'grouppage-inactive' => '{{ns:project}}:Kävutajad aktivižuseta',
	'wikimedia-copyright' => 'Tekst sab sada <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike License</a>-licenzijan mödhe; erasti voib olesketa ližaarvoimižid. 
Kacu mugažo: <a href="http://wikimediafoundation.org/wiki/Käyttöehdot">käyttöehdot</a>.',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 * @author לערי ריינהארט
 */
$messages['vi'] = array(
	'wikimediamessages-desc' => 'Các thông báo đặc trưng cho Wikimedia',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/Quy%C3%AAn_g%C3%B3p',
	'sitesupport' => 'Quyên góp',
	'tooltip-n-sitesupport' => 'Hãy hỗ trợ chúng tôi',
	'group-abusefilter' => 'Người sửa bộ lọc lạm dụng',
	'group-accountcreator' => 'Người mở tài khoản',
	'group-autopatroller' => 'Tuần tra viên tự động',
	'group-autoreviewer' => 'Người tự duyệt',
	'group-bigexport' => 'Thành viên được phép xuất nhiều trang',
	'group-confirmed' => 'Thành viên được xác nhận',
	'group-founder' => 'Nhà sáng lập',
	'group-import' => 'Người nhập trang',
	'group-ipblock-exempt' => 'Người được miễn cấm IP',
	'group-rollbacker' => 'Người lùi sửa',
	'group-transwiki' => 'Người nhập trang giữa wiki',
	'group-abusefilter-member' => 'người sửa bộ lọc lạm dụng',
	'group-accountcreator-member' => 'Người mở tài khoản',
	'group-autopatroller-member' => 'tuần tra viên tự động',
	'group-autoreviewer-member' => 'người tự duyệt',
	'group-bigexport-member' => 'xuất nhiều trang',
	'group-confirmed-member' => 'thành viên được xác nhận',
	'group-founder-member' => 'Nhà sáng lập',
	'group-import-member' => 'Người nhập trang',
	'group-ipblock-exempt-member' => 'Người được miễn cấm IP',
	'group-rollbacker-member' => 'Người lùi sửa',
	'group-transwiki-member' => 'Người nhập trang giữa wiki',
	'grouppage-abusefilter' => '{{ns:project}}:Người sửa bộ lọc lạm dụng',
	'grouppage-accountcreator' => '{{ns:project}}:Người mở tài khoản',
	'grouppage-autopatroller' => '{{ns:project}}:Tuần tra viên tự động',
	'grouppage-autoreviewer' => '{{ns:project}}:Người tự duyệt',
	'grouppage-bigexport' => '{{ns:project}}:Thành viên được phép xuất nhiều trang',
	'grouppage-confirmed' => '{{ns:project}}:Thành viên được xác nhận',
	'grouppage-founder' => '{{ns:project}}:Nhà sáng lập',
	'grouppage-import' => '{{ns:project}}:Người nhập trang',
	'grouppage-ipblock-exempt' => '{{ns:project}}:Người được miễn cấm IP',
	'grouppage-rollbacker' => '{{ns:project}}:Người lùi sửa',
	'grouppage-transwiki' => '{{ns:project}}:Người nhập trang giữa wiki',
	'group-steward' => 'Tiếp viên',
	'group-sysadmin' => 'Người quản lý hệ thống',
	'group-Editinterface' => 'Sửa giao diện',
	'group-Global_bot' => 'Robot toàn cầu',
	'group-Global_rollback' => 'Thành viên lùi sửa toàn cầu',
	'group-Ombudsmen' => 'Thanh tra viên',
	'group-Staff' => 'Nhân viên',
	'group-steward-member' => 'Tiếp viên',
	'group-sysadmin-member' => 'người quản lý hệ thống',
	'group-Editinterface-member' => 'sửa giao diện',
	'group-Global_bot-member' => 'robot toàn cầu',
	'group-Global_rollback-member' => 'người lùi sửa toàn cầu',
	'group-Ombudsmen-member' => 'thanh tra viên',
	'group-Staff-member' => 'Nhân viên',
	'group-coder' => 'Lập trình viên',
	'group-coder-member' => 'lập trình viên',
	'group-inactive' => 'Thành viên không tích cực',
	'group-inactive-member' => 'thành viên không tích cực',
	'grouppage-inactive' => '{{ns:project}}:Thành viên không tích cực',
	'wikimedia-copyright' => 'Văn bản được phát hành theo <a href="http://creativecommons.org/licenses/by-sa/3.0/">Giấy phép Creative Commons Ghi công/Chia sẻ tương tự</a>; có thể áp dụng điều khoản bổ sung. Xem <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">Điều khoản Sử dụng</a> để biết thêm chi tiết.',
	'wikimedia-copyrightwarning' => 'Với việc lưu trang, bạn đồng ý phát hành, không thể hủy bỏ, đóng góp của mình theo [http://creativecommons.org/licenses/by-sa/3.0/ Giấy phép Creative Commons Ghi công/Chia sẻ tương tự 3.0] và [http://www.gnu.org/copyleft/fdl.html GFDL]. Bạn đồng ý được ghi công bởi những người tái sử dụng, ở mức tối thiểu là thông qua một siêu liên kết hoặc URL đến trang bạn đang đóng góp vào. Xem [http://wikimediafoundation.org/wiki/Terms_of_Use Điều khoản Sử dụng] để biết thêm chi tiết.',
	'wikimedia-editpage-tos-summary' => 'Nếu không muốn những gì bạn viết bị tùy ý chỉnh sửa và tái phân phối, xin đừng đăng nó ở đây. Nếu nội dung đưa vào không phải do chính bạn viết ra, nội dung đó phải được phát hành theo những điều khoản nhất quán với [http://wikimediafoundation.org/wiki/Terms_of_Use Điều khoản Sử dụng], và bạn đồng ý tuân theo các yêu cầu cấp phép bản quyền thích hợp.',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$messages['vo'] = array(
	'sitesupport' => 'Födagivots',
	'tooltip-n-sitesupport' => 'Stütolös obsi',
	'group-accountcreator' => 'Kalijafans',
	'group-founder' => 'Fünans',
	'group-import' => 'Nüveigans',
	'group-rollbacker' => 'Sädunans',
	'group-accountcreator-member' => 'kalijafan',
	'group-founder-member' => 'fünan',
	'group-import-member' => 'nüveigan',
	'group-rollbacker-member' => 'sädunan',
	'group-transwiki-member' => 'nüveigan vüvükik',
	'grouppage-accountcreator' => '{{ns:project}}:Kalijafans',
	'grouppage-founder' => '{{ns:project}}:Fünans',
	'grouppage-import' => '{{ns:project}}:Nüveigans',
	'grouppage-rollbacker' => '{{ns:project}}:Sädunans',
	'group-sysadmin' => 'Sitiguvans',
	'group-sysadmin-member' => 'sitiguvan',
	'group-Global_bot-member' => 'bot valöpik',
	'group-coder' => 'Kotans',
	'group-coder-member' => 'kotan',
);

/** Võro (Võro)
 * @author Võrok
 */
$messages['vro'] = array(
	'sitesupport' => 'Tugõminõ',
	'tooltip-n-sitesupport' => 'Tukõq mi tüüd',
);

/** Walloon (Walon)
 * @author Lucyin
 * @author Srtxg
 */
$messages['wa'] = array(
	'wikimediamessages-desc' => 'Messaedjes rén k\' pol waibe "Wikimedia"',
	'sitesupport' => 'Ecwårlaedje',
	'tooltip-n-sitesupport' => 'Sotnez nos',
	'group-abusefilter' => "Candjeus d' passetes",
	'group-accountcreator' => "Ahiveus d' contes",
	'group-autopatroller' => 'Robots naxheus',
	'group-autoreviewer' => 'Coridjreces otomatikes',
	'group-bigexport' => "Grands epoirteus d' pådjes",
	'group-founder' => 'Askepieus do Wiki e-n inglès',
	'group-import' => 'Ristitcheus',
	'group-ipblock-exempt' => 'IP nén rboutåve',
	'group-rollbacker' => 'Disfijheus',
	'group-transwiki' => 'Ricopieus inte les wikis',
	'group-abusefilter-member' => 'Ricandjeu(se) des passetes',
	'group-accountcreator-member' => "Ahiveu d' contes",
	'group-autopatroller-member' => 'Robot naxheu',
	'group-autoreviewer-member' => 'Coridjrece otomatike',
	'group-bigexport-member' => 'Grand(e) epoirteu(se) di pådjes',
	'group-founder-member' => 'Askepieu',
	'group-import-member' => 'Ristitcheu(se)',
	'group-ipblock-exempt-member' => 'IP nén rboutåve',
	'group-rollbacker-member' => 'Ridisfijheu(se)',
	'group-transwiki-member' => "Ricopieu(se) d' on wiki a l' ôte",
	'grouppage-abusefilter' => '{{ns:project}}:Ricandjeus des passetes',
	'grouppage-accountcreator' => '{{ns:project}}:Manaedjeus',
	'grouppage-autopatroller' => '{{ns:project}}:Robots naxheus',
	'grouppage-autoreviewer' => '{{ns:project}}:Ricoridjreces otomatikes',
	'grouppage-bigexport' => "{{ns:project}}:Grands epoirteus d' pådjes",
	'grouppage-founder' => '{{ns:project}}:Mwaisse-manaedjeus',
	'grouppage-import' => "{{ns:project}}:Apoirteus d' pådjes",
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP nén rboutåve',
	'grouppage-rollbacker' => '{{ns:project}}:Ridisfijheus',
	'grouppage-transwiki' => "{{ns:project}}:Apoirteus d' pådjes d' èn ôte wiki",
	'group-steward' => 'Mwaisse-manaedjeus tot avå',
	'group-sysadmin' => 'Manaedjeus',
	'group-Global_bot' => 'Programeus totavå',
	'group-Global_rollback' => 'Ridisfijheus totavå',
	'group-Ombudsmen' => 'Arindjeus des bidons',
	'group-Staff' => 'Eployîs',
	'group-steward-member' => 'mwaisse-manaedjeu tot avå',
	'group-sysadmin-member' => 'Manaedjeu(se)',
	'group-Global_bot-member' => 'Programeu(se) totavå',
	'group-Global_rollback-member' => 'Ridisfijheu(se) totavå',
	'group-Ombudsmen-member' => 'Arindjeu(se) des bidons',
	'group-Staff-member' => 'Eployî, eployeye',
	'group-coder' => "Fijheus d' côdes",
	'group-coder-member' => 'Fijheu(se) di côdes',
	'group-inactive' => "Uzeu ki n' boutèt nén",
	'group-inactive-member' => "Uzeu(se) ki n' boute nén",
	'grouppage-inactive' => "{{ns:project}}:Uzeus ki n' boutnut nén",
	'wikimedia-copyright' => "Les tecses polèt esse ricopyîs dizo l' [http://creativecommons.org/licenses/by-sa/3.0/ licince \"''Creative Commons''\" atribucion pårtaedje a l’ idintike 3.0]\".
Loukîz les [http://wikimediafoundation.org/wiki/Terms_of_Use condicions d’ eployaedje] po saveur les ca et les ma.",
	'wikimedia-copyrightwarning' => "Si vos clitchîz so «Schaper l' pådje», vos acceptez, sins poleur rivni e-n erî, di mete vosse sicrijhaedje dizo l'&nbsp;
[http://creativecommons.org/licenses/by-sa/3.0/ licince \"''Creative Commons\"'' atribucion pårtaedje a l’ idintike 3.0] eyet [http://www.gnu.org/copyleft/fdl.html GFDL]. 
Et esse sifwaitmint d' acoird d’ esse ricnoxhou (-owe) come sicrijheu(se) di ces racsegnes la, pol moens pa ene hårdêye ou èn URL aviè l’ årtike ki vos avoz scrît ou ki vos î avoz bodjî. 
Loukîz les [http://wikimediafoundation.org/wiki/Terms_of_Use condicions d’ eployaedje] po saveur les ca et les ma.",
	'wikimedia-editpage-tos-summary' => "Si vos n' vôrîz nén, télfeye, ki vos scrijhaedjes fouxhénxhe ricandjîs, et spårdous totavå, adon, n' elzès metoz nén droci. 
Tant k' ås tecses ki n' serént nén da vosse, po les riscrire cial, i dvèt esse ricopiåves sorlon les [http://wikimediafoundation.org/wiki/Terms_of_Use condicions d' eployaedje håynêyes vaici]. 
Eto seroz vos d' acoird po shuve totes les clawes di cisse licince la.",
);

/** Waray (Winaray)
 * @author לערי ריינהארט
 */
$messages['war'] = array(
	'sitesupport' => 'Mga Donasyon',
);

/** Wolof (Wolof)
 * @author Ibou
 */
$messages['wo'] = array(
	'sitesupport' => 'Joxe ag ndimbal',
);

/** Wu (吴语) */
$messages['wuu'] = array(
	'sitesupport' => '捐款',
);

/** Kalmyk (Хальмг)
 * @author Huuchin
 */
$messages['xal'] = array(
	'sitesupport' => 'Өгх',
);

/** Xhosa (isiXhosa) */
$messages['xh'] = array(
	'sitesupport' => 'Amalizo',
);

/** Mingrelian (მარგალური)
 * @author Alsandro
 * @author Dato deutschland
 */
$messages['xmf'] = array(
	'sitesupport' => 'აზარა',
	'tooltip-n-sitesupport' => 'ხუჯ დომკინით',
);

/** Yiddish (ייִדיש)
 * @author Yidel
 * @author פוילישער
 */
$messages['yi'] = array(
	'wikimediamessages-desc' => 'וויקימעדיע ספעציפֿישע מעלדונגען',
	'sitesupport' => 'ביישטייערונגן',
	'tooltip-n-sitesupport' => 'שטיצט אונז',
	'group-accountcreator' => 'קאָנטע באַשאַפֿער',
	'group-confirmed' => 'באַשטעטיגטע באַניצער',
	'group-founder' => 'גרינדער',
	'group-import' => 'אימפארטירערס',
	'group-accountcreator-member' => 'קאָנטע באַשאַפֿער',
	'group-autopatroller-member' => 'אויטאפאַטראלירער',
	'group-confirmed-member' => 'באַשטעטיגטער באַניצער',
	'group-founder-member' => 'גרינדער',
	'group-import-member' => 'אימפארטירער',
	'group-steward' => 'סטואַרדן',
	'group-sysadmin' => 'סיסאפן',
	'group-steward-member' => 'סטואַרד',
	'wikimedia-copyright' => 'טעקסט איז פאראן לויטן <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons צושרייבן/טייל-גלייך ליצענץ</a>; קען אפשר זיין נאך תנאים.
זעט <a href="http://wikimediafoundation.org/wiki/Terms_of_Use">תנאים פון באניצן</a> פֿאר פרטים.',
	'wikimedia-copyrightwarning' => 'מיטן אויפהיטן, זענט איר מסכים אומאפענדערלעך צו באפרייען אייער ביישטייערונג אונטערן [http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons צושרייבן/טייל-גלייך ליצענץ 3.0] און דעם [http://www.gnu.org/copyleft/fdl.html GFDL].
איר שטימט צו אז ווידער-באניצער זאלן קרעדיטירן, לכל הפחות, דורך א היפערלינק אדער URL צום בלאט צו וואס איר ביישטייערט.
זעט די [http://wikimediafoundation.org/wiki/Terms_of_Use תנאים פון באניץ] פאר פרטים.',
);

/** Yoruba (Yorùbá)
 * @author Demmy
 */
$messages['yo'] = array(
	'sitesupport' => 'Ṣe ìgbọ̀wọ́',
	'tooltip-n-sitesupport' => 'Tíwálẹ́yìn',
);

/** Yue (粵語) */
$messages['yue'] = array(
	'wikimediamessages-desc' => 'Wikimedia特定訊息',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/{{urlencode:捐贈}}',
	'sitesupport' => '慷慨解囊',
	'tooltip-n-sitesupport' => '資持我哋',
	'group-abusefilter' => '濫用過濾器編者',
	'group-accountcreator' => '開戶專員',
	'group-autopatroller' => '自動巡查員',
	'group-autoreviewer' => '自動覆查者',
	'group-bigexport' => '大型倒出者',
	'group-confirmed' => '確認用戶',
	'group-founder' => '創辦人',
	'group-import' => '匯入者',
	'group-ipblock-exempt' => 'IP封鎖例外者',
	'group-rollbacker' => '反轉者',
	'group-transwiki' => 'Transwiki匯入者',
	'group-abusefilter-member' => '濫用過濾器編者',
	'group-accountcreator-member' => '開戶專員',
	'group-autopatroller-member' => '自動巡查員',
	'group-autoreviewer-member' => '自動覆查者',
	'group-bigexport-member' => '大型倒出者',
	'group-confirmed-member' => '確認用戶',
	'group-founder-member' => '創辦人',
	'group-import-member' => '匯入者',
	'group-ipblock-exempt-member' => 'IP封鎖例外',
	'group-rollbacker-member' => '反轉者',
	'group-transwiki-member' => 'Transwiki匯入者',
	'grouppage-abusefilter' => '{{ns:project}}:濫用過濾器編者',
	'grouppage-accountcreator' => '{{ns:project}}:開戶專員',
	'grouppage-autopatroller' => '{{ns:project}}:自動巡查員',
	'grouppage-autoreviewer' => '{{ns:project}}:自動覆查者',
	'grouppage-bigexport' => '{{ns:project}}:大型倒出者',
	'grouppage-confirmed' => '{{ns:project}}:確認用戶',
	'grouppage-founder' => '{{ns:project}}:創辦人',
	'grouppage-import' => '{{ns:project}}:匯入者',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP封鎖例外',
	'grouppage-rollbacker' => '{{ns:project}}:反轉者',
	'grouppage-transwiki' => '{{ns:project}}:Transwiki匯入者',
	'group-steward' => '執行員',
	'group-sysadmin' => '系統管理員',
	'group-Editinterface' => '界面編輯者',
	'group-Global_bot' => '全域機械人',
	'group-Global_rollback' => '全域反轉者',
	'group-Ombudsmen' => '申訴專員',
	'group-Staff' => '職員',
	'group-steward-member' => '執行員',
	'group-sysadmin-member' => '系統管理員',
	'group-Editinterface-member' => '界面編輯者',
	'group-Global_bot-member' => '全域機械人',
	'group-Global_rollback-member' => '全域反轉者',
	'group-Ombudsmen-member' => '申訴專員',
	'group-Staff-member' => '職員',
	'group-coder' => '編碼員',
	'group-coder-member' => '編碼員',
	'group-inactive' => '唔活躍嘅用戶',
	'group-inactive-member' => '唔活躍嘅用戶',
	'grouppage-inactive' => '{{ns:project}}:唔活躍嘅用戶',
	'wikimedia-copyright' => '呢度嘅所有文字係根據<a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution/Share-Alike 牌照</a>嘅條款發佈；可能會有附加嘅條款。
睇吓<a href="http://wikimediafoundation.org/wiki/Terms_of_Use">使用條款</a>嘅細節。',
	'wikimedia-copyrightwarning' => '當保存嗰陣，你同意將你嘅貢獻喺[http://creativecommons.org/licenses/by-sa/3.0/ 共享創意 署名－相同方式共享 3.0]同埋[http://www.gnu.org/copyleft/fdl.html GNU自由文檔協議]發表。
你同意加你個名畀再利用者，最少，經過嘅超連結或者網址到你貢獻嘅版。
睇吓[http://wikimediafoundation.org/wiki/Terms_of_Use 使用條款]嘅細節。',
	'wikimedia-editpage-tos-summary' => '如果你唔想將你寫嘅嘢畀人編輯同埋再發佈嘅話，噉就唔好響呢度遞交。
唔果你唔係自己去寫呢篇嘢嘅話，佢一定要同[http://wikimediafoundation.org/wiki/Terms_of_Use 使用條款]可以提供嘅情況之下提供，同埋你同意跟住任何有關嘅發牌條件。',
);

/** Zeeuws (Zeêuws)
 * @author NJ
 */
$messages['zea'] = array(
	'sitesupport' => 'Donaoties',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Bencmq
 * @author Gaoxuewei
 * @author Jimmy xu wrk
 * @author William915
 * @author Wmr89502270
 */
$messages['zh-hans'] = array(
	'wikimediamessages-desc' => '维基媒体特定信息',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/{{urlencode:赞助}}',
	'sitesupport' => '资助',
	'tooltip-n-sitesupport' => '资助我们',
	'group-abusefilter' => '防滥用过滤器编辑者',
	'group-accountcreator' => '账户创建员',
	'group-autopatroller' => '自动巡查员',
	'group-autoreviewer' => '自动覆查员',
	'group-bigexport' => '大量导出者',
	'group-confirmed' => '已确认用户',
	'group-founder' => '创办人',
	'group-import' => '导入者',
	'group-ipblock-exempt' => 'IP查封例外者',
	'group-rollbacker' => '回退员',
	'group-transwiki' => '跨维基导入者',
	'group-abusefilter-member' => '滥用过滤器编辑者',
	'group-accountcreator-member' => '账户创建员',
	'group-autopatroller-member' => '自动巡查员',
	'group-autoreviewer-member' => '自动覆查员',
	'group-bigexport-member' => '大量导出者',
	'group-confirmed-member' => '已确认用户',
	'group-founder-member' => '创办人',
	'group-import-member' => '导入者',
	'group-ipblock-exempt-member' => 'IP查封例外',
	'group-rollbacker-member' => '回退员',
	'group-transwiki-member' => '跨维基导入者',
	'grouppage-abusefilter' => '{{ns:project}}:反滥用过滤器编辑者',
	'grouppage-accountcreator' => '{{ns:project}}:账户创建员',
	'grouppage-autopatroller' => '{{ns:project}}:自动巡查员',
	'grouppage-autoreviewer' => '{{ns:project}}:自动覆查员',
	'grouppage-bigexport' => '{{ns:project}}:大量导出者',
	'grouppage-confirmed' => '{{ns:project}}:已确认用户',
	'grouppage-founder' => '{{ns:project}}:创办人',
	'grouppage-import' => '{{ns:project}}:导入者',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP查封例外',
	'grouppage-rollbacker' => '{{ns:project}}:回退员',
	'grouppage-transwiki' => '{{ns:project}}:跨维基导入者',
	'group-steward' => '监管员',
	'group-sysadmin' => '系统管理员',
	'group-Editinterface' => '界面编辑者',
	'group-Global_bot' => '全域机器人',
	'group-Global_rollback' => '全域回退员',
	'group-Ombudsmen' => '申诉专员',
	'group-Staff' => '基金会工作人员',
	'group-steward-member' => '监管员',
	'group-sysadmin-member' => '系统管理员',
	'group-Editinterface-member' => '界面编辑者',
	'group-Global_bot-member' => '全域机器人',
	'group-Global_rollback-member' => '全域回退员',
	'group-Ombudsmen-member' => '申诉专员',
	'group-Staff-member' => '成员',
	'group-coder' => '编程人员',
	'group-coder-member' => '编程人员',
	'group-inactive' => '不活跃的用户',
	'group-inactive-member' => '不活跃的用户',
	'grouppage-inactive' => '{{ns:project}}:不活跃的用户',
	'shared-repo-name-shared' => '维基共享资源',
	'wikimedia-copyright' => '本站的全部文字在<a class="internal" href="{{localurle:Wikipedia:CC-by-sa-3.0协议文本}}" title="Wikipedia:CC-by-sa-3.0协议文本">知识共享 署名-相同方式共享 3.0协议</a>之条款下提供，附加条款亦可能应用。（请参阅<a href="http://wikimediafoundation.org/wiki/Terms_of_Use">使用条款</a>）<br />
Wikipedia&reg;和维基百科标志是<a href="http://wikimediafoundation.org">维基媒体基金会</a>的注册商标；维基&trade;是维基媒体基金会的商标。<br />维基媒体基金会是在美国佛罗里达州登记的501（c）（3）<a href="http://wikimediafoundation.org/wiki/%E8%B5%84%E5%8A%A9%E7%9A%84%E5%85%8D%E7%A8%8E%E6%94%BF%E7%AD%96">免税</a>、非营利、慈善机构。<br />',
	'wikimedia-copyrightwarning' => "点击'''{{int:savearticle}}'''按钮以后，就表示您同意依据[[Wikipedia:CC-by-sa-3.0协议文本|'''CC-by-sa-3.0''']]和[[Wikipedia:GNU自由文档许可证文本|'''GFDL''']]不可逆轉地释出貢獻。如您不欲文章被其它用户编辑或转载，请勿提交。您的贡献内容一经提交，其他人在引用您的贡献内容时，即须通过超级链接或其它形式进行署名，参见我们的[http://wikimediafoundation.org/wiki/Terms_of_Use 使用条款]。",
	'wikimedia-editpage-tos-summary' => '请勿提交任何阁下不欲予人编辑或重新发布的内容。当提交非由阁下编写的内容时，请确保这些内容的版权与[http://wikimediafoundation.org/wiki/Terms_of_Use 使用条款]一致，及阁下同意遵行一切相关的版权条款。',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Alexsh
 * @author William915
 * @author Wong128hk
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'wikimediamessages-desc' => '維基媒體特定信息',
	'sitesupport-url' => 'http://wikimediafoundation.org/wiki/{{urlencode:資助}}',
	'sitesupport' => '贊助',
	'tooltip-n-sitesupport' => '資助我們',
	'group-abusefilter' => '濫用過瀘器編輯者',
	'group-accountcreator' => '賬戶創建員',
	'group-autopatroller' => '自動巡視員',
	'group-autoreviewer' => '自動覆查員',
	'group-bigexport' => '大量匯出者',
	'group-confirmed' => '已確認用戶',
	'group-founder' => '創辦人',
	'group-import' => '匯入者',
	'group-ipblock-exempt' => 'IP查封例外者',
	'group-rollbacker' => '回退員',
	'group-transwiki' => '跨維基匯入者',
	'group-abusefilter-member' => '濫用過濾器編輯者',
	'group-accountcreator-member' => '賬戶創建員',
	'group-autopatroller-member' => '自動巡視員',
	'group-autoreviewer-member' => '自動覆查員',
	'group-bigexport-member' => '大量匯出者',
	'group-confirmed-member' => '已確認用戶',
	'group-founder-member' => '創辦人',
	'group-import-member' => '匯入者',
	'group-ipblock-exempt-member' => 'IP查封例外',
	'group-rollbacker-member' => '回退員',
	'group-transwiki-member' => '跨維基匯入者',
	'grouppage-abusefilter' => '{{ns:project}}:濫用過濾器編輯者',
	'grouppage-accountcreator' => '{{ns:project}}:賬戶創建員',
	'grouppage-autopatroller' => '{{ns:project}}:自動巡視員',
	'grouppage-autoreviewer' => '{{ns:project}}:自動覆查員',
	'grouppage-bigexport' => '{{ns:project}}:大量匯出者',
	'grouppage-confirmed' => '{{ns:project}}:已確認用戶',
	'grouppage-founder' => '{{ns:project}}:創辦人',
	'grouppage-import' => '{{ns:project}}:匯入者',
	'grouppage-ipblock-exempt' => '{{ns:project}}:IP查封例外',
	'grouppage-rollbacker' => '{{ns:project}}:反轉者',
	'grouppage-transwiki' => '{{ns:project}}:跨維基匯入者',
	'group-steward' => '監管員',
	'group-sysadmin' => '系統管理員',
	'group-Editinterface' => '界面編輯者',
	'group-Global_bot' => '全域機器人',
	'group-Global_rollback' => '全域反轉者',
	'group-Ombudsmen' => '申訴專員',
	'group-Staff' => '內部成員',
	'group-steward-member' => '監管員',
	'group-sysadmin-member' => '系統管理員',
	'group-Editinterface-member' => '界面編輯者',
	'group-Global_bot-member' => '全域機器人',
	'group-Global_rollback-member' => '全域反轉者',
	'group-Ombudsmen-member' => '申訴專員',
	'group-Staff-member' => '成員',
	'group-coder' => '程式編輯者',
	'group-coder-member' => '程式編輯者',
	'group-inactive' => '不活躍的用戶',
	'group-inactive-member' => '不活躍的用戶',
	'grouppage-inactive' => '{{ns:project}}:不活躍的用戶',
	'shared-repo-name-shared' => '維基共享資源',
	'wikimedia-copyrightwarning' => "點擊'''{{int:savearticle}}'''按鈕以後，就表示您同意依據[http://creativecommons.org/licenses/by-sa/3.0/ CC-by-sa-3.0]和[http://www.gnu.org/copyleft/fdl.html GFDL]協議不可逆轉地釋出貢獻。如您不欲文章被其它用戶編輯或轉載，請勿提交。您的貢獻內容一經提交，其他人在引用您的貢獻內容時，即須通過超連結或其它形式進行署名，參見我們的[[wmf:Terms of Use|使用條款]]。",
);

/** Chinese (Hong Kong) (‪中文(香港)‬) */
$messages['zh-hk'] = array(
	'group-Global_bot' => '全域機械人',
	'group-Global_bot-member' => '全域機械人',
);

/** Zulu (isiZulu)
 * @author לערי ריינהארט
 */
$messages['zu'] = array(
	'sitesupport' => 'Izipho',
);

