<?php
/*
*
*	If you want your extension to be used on wikis that have a multi-lingual readership, we will need to add internationalization support to the extension. 
*
*	1.For any text string displayed to the user, define a message. MediaWiki supports parameterized messages and that feature should be used when a message is dependent on information generated at runtime. Assign each message a lowercase message id.
*	2.In the setup and implementation code, replace each literal use of the message with a call to wfMsg( $msgID, $param1, $param2, ... ). Example : wfMsg( 'addition', '1', '2', '3' )
*	3.Store the message definition in the internalization file (WikiBhasha.i18n.php) . This is normally done by setting up an array that maps language and message id to each string. Each message id should be lowercase and they may not contain spaces
*
*
*/
$messages = array();

/**
 * English
 */
$messages['en'] = array(
	'wikibhasha' => 'WikiBhasha',
	'wikibhasha-desc' => 'Application to create multilingual content leveraging the English Wikipedia content',
	'wikiBhashaLink' => 'WikiBhasha (Beta)',
);

/** Message documentation (Message documentation)
 * @author Raymond
 */
$messages['qqq'] = array(
	'wikibhasha' => '{{Optional}}',
	'wikiBhashaLink' => '{{Optional}}',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'wikibhasha-desc' => 'Program koji pravi višejezični sadržaj tako da bi se bolje iskoristio sadržaj Wikipedije na engleskom jeziku',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'wikibhasha-desc' => 'Stellt eine Anwendung bereit, mit der fremdsprachige Inhalte erstellt und so die der englischsprachigen Wikipedia besser genutzt werden können',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'wikibhasha-desc' => 'Aplicación para crear contidos multilingües a partir dos presentes na Wikipedia en inglés',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'wikibhasha-desc' => 'Application pro crear contento multilingue a base del contento de Wikipedia in anglese',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'wikibhasha-desc' => 'Toepassing om inhoud te maken in meerdere talen om zo de inhoud van de Engelstalige Wikipedia beter te gebruiken',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'wikibhasha-desc' => 'Program for å opprette mangespråklig innhold som har innflytelse over innholdet på den engelske Wikipedia',
);

