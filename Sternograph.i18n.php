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

/** Message documentation (Message documentation)
 * @author Siebrand
 */
$messages['qqq'] = array(
	'sternograph-desc' => 'Description of the Sternograph extension; displayed on the Special:Extensions page only.',
	'sternograph-empty' => 'Error message when an empty tag is detected on the wiki-formatted page.  The tag name to display is parsed to this function as the first parameter.',
	'sternograph-nested' => 'Error message when a sternograph tag occurs within an existing sternograph tag on the wiki-formatted page.  The tag name to display is the first parameter.',
	'sternograph-speaker-is' => 'Error message when a speaker block does not contain the speaker delimeter on the wiki-formatted page. Parameters:
* $1 is the tag name to display
* $2 is the character that is required.',
);

/** Breton (Brezhoneg)
 * @author Y-M D
 */
$messages['br'] = array(
	'sternograph-desc' => "Balizenn <nowiki><sterno></nowiki> evit treuzskirvañ ar c'homzoù (c'hoarioù, atersadennoù, hag all)",
	'sternograph-empty' => "Ne c'hell ket bezañ goullo ar balizenn <$1>.",
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

/** French (Français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'sternograph-desc' => 'Balises <nowiki><sterno></nowiki> pour transcrire des paroles (jeux, interviews, etc.)',
	'sternograph-empty' => 'La balise <$1> ne peut pas être vide.',
	'sternograph-nested' => 'La balise <$1> ne peut pas être imbriquée.',
	'sternograph-speaker-is' => 'Les lignes du bloc de discours <$1> doivent avoir le caractère $2.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'sternograph-desc' => 'Etiquetas <nowiki><sterno></nowiki> para transcribir discursos (xogos, entrevistas etc.)',
	'sternograph-empty' => 'A etiqueta <$1> non pode estar baleira.',
	'sternograph-nested' => 'A etiqueta <$1> non pode estar aniñada.',
	'sternograph-speaker-is' => 'As liñas do bloque de discurso <$1> deben conter o carácter "$2".',
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

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'sternograph-desc' => "<nowiki><sterno></nowiki> Tagen fir d'Ëmschreiwe vu geschwate Wierder (Theaterstécker, Interviewen, asw.)",
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'sternograph-desc' => 'Ознаки <nowiki><sterno></nowiki> за препис (стенограми) на говор (драмски дела, интервјуа и тн.)',
	'sternograph-empty' => 'Ознаката <$1> не може да стои празна.',
	'sternograph-nested' => 'Ознаката <$1> не може да се вгнезди.',
	'sternograph-speaker-is' => 'Редовите во блокот <$1> (за говорник) мора да го содржат знакот „$2“.',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'sternograph-desc' => 'Tag <nowiki><sterno></nowiki> untuk transkrip perbualan (drama, wawancara, dsb)',
	'sternograph-empty' => 'Tag <$1> tidak boleh dibiarkan kosong.',
	'sternograph-nested' => 'Tag <$1> tidak boleh disarangkan.',
	'sternograph-speaker-is' => 'Baris blok penutur <$1> mesti mempunyai aksara $2.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'sternograph-desc' => '<nowiki><sterno></nowiki>-labels voor de transcriptie van gesproken woorden (toneelstukken, interviews, enzovoort)',
	'sternograph-empty' => 'Het label <$1> mag niet leeg zijn.',
	'sternograph-nested' => 'Het label <$1> mag niet genest worden.',
	'sternograph-speaker-is' => 'Het sprekerblok <$1> moet het teken $2 bevatten.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'sternograph-empty' => '<$1> ట్యాగు ఖాళీగా ఉండకూడదు.',
);

