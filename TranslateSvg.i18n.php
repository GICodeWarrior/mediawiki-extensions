<?php
/**
 * Internationalisation for TranslateSVG extension
 *
 * @file
 * @ingroup Extensions
 */
 
$messages = array();

/** English
 * @author jarry1250
 */
$messages['en'] = array(
	'translatesvg'         => 'TranslateSVG', //Ignore
	'translatesvg-desc'    => 'Provides a native-style interface for translating SVGs in line with the SVG1.1 specification',
	'translatesvg-legend'  => 'File path',
	'translatesvg-page'    => 'File:',
	'translatesvg-submit'  => 'Go',
	'translatesvg-summary' => 'This special page allows you to add, remove and modify translations embedded within a given SVG image file.',
	'translatesvg-add'     => 'If your language is not listed already, you can [[#addlanguage|add it]].',
	'translatesvg-xcoordinate-pre' => 'X-coordinate (horizontal):',
	'translatesvg-ycoordinate-pre' => 'Y-coordinate (vertical):',
	'translatesvg-specify' => 'Specify new language code (e.g. en, fr, de, es...)',
	'translatesvg-fallbackdesc' => 'Default (no language specified)',
	'translatesvg-qqqdesc' => 'Advice to translators',
	'translatesvg-nodesc'  => '(no description)',
);

/** Message documentation (Message documentation)
 * @author jarry1250
 */
$messages['qqq'] = array(
	'translatesvg-desc'    => '{{desc}}',
	'translatesvg-legend'  => 'Form legend; general description of the purposes of the form (to ask for a file path)',
	'translatesvg-page'    => 'Label for a form input',
	'translatesvg-submit'  => 'Text of a button to progress onto next stage of the translation',
	'translatesvg-summary' => 'General description of the special page, displayed at the top of it so users know what they are looking at',
	'translatesvg-add'     => 'Introduction sentence available to JavaScript-enabled users including a link to add translations in a new language. The anchor (#addlanguage) does not need translation.',
	'translatesvg-xcoordinate-pre' => 'Label for a form input for the adjustment of the X-coordinate (horizontal position) of the text being translated',
	'translatesvg-ycoordinate-pre' => 'Label for a form input for the adjustment of the Y-coordinate (vertical position) of the text being translated',
	'translatesvg-specify' => 'Prompt asking for the two or three letter code (or similar) of the language they wish to translate into',
	'translatesvg-fallbackdesc' => 'The heading of the section that contains translations representing the fallback (default) language. The fallback language is used when translations aren\'t available. Comparable to other language headings such as "English", "Deutsch", etc.',
	'translatesvg-qqqdesc' => 'The heading of the section that contains descriptions of the context of each translation (i.e. translations into the language with code "qqq"). Comparable to other language headings such as "English", "Deutsch", etc.',
	'translatesvg-nodesc'  => 'The text that appears next to a translation when no description (translation into language qqq) exists.',
);
