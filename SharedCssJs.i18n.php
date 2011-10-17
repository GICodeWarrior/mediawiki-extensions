<?php
/**
 * Localisation file for the SharedCssJs extension
 *
 * @since 1.0
 *
 * @file SharedCssJs.i18n.php
 * @ingroup SharedCssJs
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @author Tim Weyer (SVG) <svg@tim-weyer.org>
 */

$messages = array();

/** English
 * @author SVG
 */
$messages['en'] = array(
	'sharedcssjs-desc'    => 'Enables fetching of global wiki and user CSS and JS from central wiki',
	'sharedcssjs-error'   => 'This page is included from central wiki by another way and can only editing there.',
	'global.css'          => '/* CSS placed here will be applied to all skins on all wikis of the wiki farm */',
	'global.js'           => '/* JavaScript placed here will be applied to all skins on all wikis of the wiki farm */',
);

/** Message documentation (Message documentation)
 * @author SVG
 */
$messages['qqq'] = array(
	'sharedcssjs-desc' => '{{desc}}',
	'sharedcssjs-error' => '{{msg-mw|sharedcssjs-error}}

Similar to {{msg-mw|protectedpagetext}}',
	'global.css' => '{{msg-mw|global.css}}',
	'global.js' => '{{msg-mw|global.js}}',
);

/** German (Deutsch)
 * @author SVG
 */
$messages['de'] = array(
	'sharedcssjs-desc' => 'Ermöglicht das Nutzen von globalen Wiki- und Benutzer-CSS und JS-Dateien aus dem Zentral Wiki',
	'sharedcssjs-error' => 'Diese Seite ist aus dem Zentral Wiki auf einem anderen Weg eingebunden und kann auch nur dort bearbeitet werden.',
	'global.css' => '/* Das folgende CSS wird für alle Benutzeroberflächen auf allen Wikis der Wiki-Farm geladen */',
	'global.js' => '/* Das folgende JavaScript wird für alle Benutzeroberflächen auf allen Wikis der Wiki-Farm geladen */',
);

