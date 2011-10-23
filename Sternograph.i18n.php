<?php
/**
 * Internationalisation file for Sternograph extension.
 */
$messages = array();

/**
 * Translation documentation.
 */
$messages['qqq'] = array(
	'descriptionmsg'=>'Description of the Sternograph extension; displayed on the Special:Extensions page only.',
	'empty' => 'Error message when an empty &lt;sterno> tag is detected on the wiki-formatted page.',
	'nested'=>'Error message when a &lt;sterno> tag occurs within an existing &lt;sterno> tag on the wiki-formatted page.',
	'speakerIs' => 'Error message when a speaker block does not contain the speaker delimeter on the wiki-formatted page.  The character to include is defined by the Sternograph::SPEAKER_IS variable, and should be included in the error message.',

	'speakerPre'=>'Text that will always occur before the name of a speaker in the formatted text.  This text is formatted by the sternographName CSS class.',
	'speakerPost'=>'Text that will always occur after the name of a speaker in the formatted text.  This text is formatted by the sternographName CSS class.',
	'blockPre'=>'Text that will always occur before a stage direction block in the formatted text.  This text is formatted by the sternographDirection and sternographDirectionBlock CSS classes.',
	'blockPost'=>'Text that will always occur after a stage direction block in the formatted text.  This text is formatted by the sternographDirection and sternographDirectionBlock CSS classes.',
	'inlinePre'=>'Text that will always occur before an in-line stage direction in the formatted text.  This text is formatted by the sternographDirection and sternographDirectionInline CSS classes.',
	'inlinePost'=>'Text that will always occur after an in-line stage direction in the formatted text.  This text is formatted by the sternographDirection and sternographDirectionInline CSS classes.',
	'contextPre'=>'Text that will always occur before the context block in the formatted text.  This text is formatted by the sternographContext CSS class.',
	'contextPost'=>'Text that will always occur after the context block in the formatted text.  This text is formatted by the sternographContext CSS class.'
);

/**
 * English
 */
$messages['en'] = array(
	'descriptionmsg'=>'&lt;sterno> tags for transcripts of spokens words (plays, interviews, etc).',
	'empty' => '<sterno> tag cannot be empty.',
	'nested'=>'<sterno> tag cannot be nested.',
	'speakerIs' => '<sterno> speaker block lines must have $1 character.',

	'speakerPre'=>'',
	'speakerPost'=>':&nbsp;',
	'blockPre'=>'',
	'blockPost'=>'',
	'inlinePre'=>'[',
	'inlinePost'=>']',
	'contextPre'=>'&mdash;',
	'contextPost'=>''
);
