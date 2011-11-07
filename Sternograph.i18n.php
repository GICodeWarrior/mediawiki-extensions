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

/**
 * Translation documentation.
 */
$messages['qqq'] = array(
	'sternograph-desc'=>'Description of the Sternograph extension; displayed on the Special:Extensions page only.',
	'sternograph-empty' => 'Error message when an empty tag is detected on the wiki-formatted page.  The tag name to display is parsed to this function as the first parameter.',
	'sternograph-nested'=>'Error message when a sternograph tag occurs within an existing sternograph tag on the wiki-formatted page.  The tag name to display is the first parameter.',
	'sternograph-speaker-is' => 'Error message when a speaker block does not contain the speaker delimeter on the wiki-formatted page.  The tag name to display is the first parameter; the character that is required is the second parameter.',

	'sternograph-speaker-pre'=>'Text that will always occur before the name of a speaker in the formatted text.  This text is formatted by the sternographName CSS class.',
	'sternograph-speaker-post'=>'Text that will always occur after the name of a speaker in the formatted text.  This text is formatted by the sternographName CSS class.',
	'sternograph-block-pre'=>'Text that will always occur before a stage direction block in the formatted text.  This text is formatted by the sternographDirection and sternographDirectionBlock CSS classes.',
	'sternograph-block-post'=>'Text that will always occur after a stage direction block in the formatted text.  This text is formatted by the sternographDirection and sternographDirectionBlock CSS classes.',
	'sternograph-inline-pre'=>'Text that will always occur before an in-line stage direction in the formatted text.  This text is formatted by the sternographDirection and sternographDirectionInline CSS classes.',
	'sternograph-inline-post'=>'Text that will always occur after an in-line stage direction in the formatted text.  This text is formatted by the sternographDirection and sternographDirectionInline CSS classes.',
	'sternograph-context-pre'=>'Text that will always occur before the context block in the formatted text.  This text is formatted by the sternographContext CSS class.',
	'sternograph-context-post'=>'Text that will always occur after the context block in the formatted text.  This text is formatted by the sternographContext CSS class.'
);

