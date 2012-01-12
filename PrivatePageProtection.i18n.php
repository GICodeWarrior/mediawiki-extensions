<?php
/**
 * Internationalisation for PrivatePageProtection extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Daniel Kinzler
 */
$messages['en'] = array(
	'privatepp-desc' => 'Allowes restricting page access based on user group',
	
	'privatepp-lockout-prevented' => 'Lockout prevented: You have tried to restrict access to this page to {{PLURAL:$2|the group|one of the groups}} $1. '
									. 'Since you are not a member of {{PLURAL:$2|this group|any of these groups}}, you would not be able to access the page after saving it. '
									. 'Saving was aborted to avoid this.',

);

/** Message documentation (Message documentation)
 * @author Daniel Kinzler
 */
$messages['qqq'] = array(
	'privatepp-desc' => '{{desc}}',
);

/** German (Deutsch)
 * @author Daniel Kinzler
 */
$messages['de'] = array(
	'privatepp-desc' => 'Beschränkt den Zugang zu Wikiseite auf der Basis von benutzergruppen.',
	
	'privatepp-lockout-prevented' => 'Aussperrung verhindert: Du hast versucht, den Zugang zu dieser Seite auf {{PLURAL:$2|die Gruppe|die gruppen}} $1 zu beschränken. '
									. 'Da du kein Mitglied {{PLURAL:$2|dieser Gruppe|einer dieser Gruppen}} bist, könntest du nach dem Speichern nicht mehr auf die Seite zugreifen. '
									. 'Um dies zu vermeiden wurde das Speichern abgebrochen.',
);

/** German (Deutsch)
 * @author Daniel Kinzler
 */
$messages['de_formal'] = array(
	'privatepp-lockout-prevented' => 'Aussperrung verhindert: Sie haben versucht, den Zugang zu dieser Seite auf {{PLURAL:$2|die Gruppe|die gruppen}} $1 zu beschränken. '
									. 'Da sie kein Mitglied {{PLURAL:$2|dieser Gruppe|einer dieser Gruppen}} sind, könnten sie nach dem Speichern nicht mehr auf die Seite zugreifen. '
									. 'Um dies zu vermeiden wurde das Speichern abgebrochen.',
);

