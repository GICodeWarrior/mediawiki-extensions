<?php
/**
 * Internationalisation file for Sternograph extension.
 */
$messages = array();

/**
 * English
 */
$messages['en'] = array(
	'sternograph-desc' => '<nowiki><sterno></nowiki> tags for transcripts of spokens words (plays, interviews, etc)',
	'sternograph-empty' => '<$1> tag cannot be empty.',
	'sternograph-nested' => '<$1> tag cannot be nested.',
	'sternograph-speaker-is' => '<$1> speaker block lines must have $2 character.',

	'sternograph-speaker-pre' => '',
	'sternograph-speaker-post' => ':&nbsp;',
	'sternograph-block-pre' => '',
	'sternograph-block-post' => '',
	'sternograph-inline-pre' => '[',
	'sternograph-inline-post' => ']',
	'sternograph-context-pre' => '&mdash;',
	'sternograph-context-post' => ''
);

/** Message documentation (Message documentation) */
$messages['qqq'] = array(
	'sternograph-desc' => 'Description of the Sternograph extension; displayed on the Special:Extensions page only.',
	'sternograph-empty' => 'Error message when an empty tag is detected on the wiki-formatted page.  The tag name to display is parsed to this function as the first parameter.',
	'sternograph-nested' => 'Error message when a sternograph tag occurs within an existing sternograph tag on the wiki-formatted page.  The tag name to display is the first parameter.',
	'sternograph-speaker-is' => 'Error message when a speaker block does not contain the speaker delimeter on the wiki-formatted page.  The tag name to display is the first parameter; the character that is required is the second parameter.',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'sternograph-desc' => 'Ermöglicht <nowiki><sterno></nowiki>-Tags für Niederschriften von Gesprochenem (Theaterstücke, Interviews, usw.)',
	'sternograph-empty' => 'Das <$1>-Tag darf nicht leer sein.',
	'sternograph-nested' => 'Das <$1>-Tag darf nicht verschachtelt sein.',
	'sternograph-speaker-is' => 'Die Zeilen des <$1>-Blocks müssen das Zeichen „$2“ enthalten.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'sternograph-desc' => 'Etiquettas <nowiki><sterno></nowiki> pro transcriptos de parolas parlate (dramas, interviews, etc.)',
	'sternograph-empty' => 'Le etiquetta <$1> non pote esser vacue.',
	'sternograph-nested' => 'Le etiquetta <$1> non pote esser usate recursivemente.',
	'sternograph-speaker-is' => 'Le delimitator de bloco de parlator pro <$1> debe haber le character $2.',
);

