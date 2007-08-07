<?php
/**
 * Internationalisation file for ConfirmAccount extension.
 *
 * @addtogroup Extensions
*/

$wgConfirmAccountMessages = array();

$wgConfirmAccountMessages['en'] = array(
	# Request account page
	'requestaccount'          => 'Request account',
	'requestacount-text'      => '\'\'\'Complete and submit the following form to request a user account\'\'\'. 
	
	Make sure that you first read the [[{{NS:PROJECT}}:Terms of Service|Terms of Service]] before requesting an account.
	
	Once the account is approved, you will be emailed a notification message and the account will be usable at 
	[[Special:Userlogin]].',
	'requestaccount-dup'      => '\'\'\'Note: You already are logged in with a registered account.\'\'\'',
	'requestacount-legend1'   => 'User account:',
	'requestacount-legend2'   => 'Personal information:',
	'requestacount-legend3'   => 'Other information:',
	'requestacount-acc-text'  => 'Your email address will be sent a confirmation message once this request is submited. Please respond by clicking 
	on the confirmation link provided by the the email. Also, your password will be emailed to you when your account is created.',
	'requestacount-ext-text'  => 'The following information is kept private and will only be used for this request. 
	You may want to list contacts such a phone number to aid in identify confirmation.',
	'requestaccount-bio-text' => "Your biography will be set as the default content for your userpage. Try to include 
	any credentials. Make sure you are comfortable publishing such information. Your name can be changed via [[Special:Preferences]].",
	'requestaccount-real'     => 'Real name:',
	'requestaccount-same'     => '(same as real name)',
	'requestaccount-email'    => 'Email address:',
	'requestaccount-bio'      => 'Personal biography:',
	'requestaccount-notes'    => 'Additional notes:',
	'requestaccount-urls'     => 'List of websites (separated by newlines):',
	'requestaccount-agree'    => 'You must certify that your real name is correct and that you agree to our Terms of Service.',
	'requestaccount-inuse'    => 'Username is already in use in a pending account request.',
	'requestaccount-tooshort' => 'Your biography must be at least be $1 words long.',
	'requestaccount-tos'      => 'I have read and agree to abide by the Terms of Service of {{SITENAME}}.',
	'requestaccount-correct'  => 'I certify that the name I have specified under "Real name" is in fact my own real name.',
	'requestacount-submit'    => 'Request account',
	'requestaccount-sent'     => 'Your account request has successfully been sent and is now pending review.',
	'request-account-econf'   => 'Your e-mail address has been confirmed and will be listed as such in your account 
	request.',
	'requestaccount-email-subj' => '{{SITENAME}} e-mail address confirmation',
	'requestaccount-email-body' => 'Someone, probably you from IP address $1, has requested an
account "$2" with this e-mail address on {{SITENAME}}.

To confirm that this account really does belong to you on {{SITENAME}}, open this link in your browser:

$3

If the account is created, only you will be emailed the password. If this is *not* you, don\'t follow the link. 
This confirmation code will expire at $4.',

	'acct_request_throttle_hit' => "Sorry, you have already requested $1 accounts. You can't make any more requests.",
	
	# Add to Special:Login
	'requestacount-loginnotice' => 'To obtain a user account, you must \'\'\'[[Special:RequestAccount|request one]]\'\'\'.',
	
	# Confirm account page
	'confirmaccounts'       => 'Confirm account requests', 
	'confirmacount-list'    => 'Below is a list of account requests awaiting approval. 
	Approved accounts will be created and removed from this list. Rejected accounts will simply be deleted from this 
	list.',
	'confirmacount-list2'    => 'Below is a list recently rejected account requests which may automatically be deleted 
	once several days old. They can still be approved into accounts, though you may want to first consult the rejecting 
	admin before doing so.',
	'confirmacount-text'    => 'This is a pending request for a user account at \'\'\'{{SITENAME}}\'\'\'. Carefully 
	review and if needed, confirm, all the below information. Note that you can choose to create the account under a 
	different username. Use this only to avoid 	collisions with other names.
	
	If you simply leave this page without confirming or denying this request, it will remain pending.',
	'confirmacount-none'    => 'There are currently no pending account requests.',
	'confirmacount-none2'   => 'There are currently no recently rejected account requests.',
	'confirmaccount-badid'  => 'There is no pending request corresponding to the given ID. It may have already been handled.',
	'confirmaccount-back'   => 'View pending account list',
	'confirmaccount-back2'  => 'View recently rejected account list',
	'confirmaccount-name'   => 'Username',
	'confirmaccount-real'   => 'Name',
	'confirmaccount-email'  => 'Email',
	'confirmaccount-bio'    => 'Biography',
	'confirmaccount-urls'   => 'List of websites:',
	'confirmaccount-nourls' => '(None provided)',
	'confirmaccount-review' => 'Approve/Reject',
	'confirmacount-confirm' => 'Use the buttons below to accept this request or deny it.',
	'confirmaccount-econf'  => '(confirmed)',
	'confirmaccount-reject' => '(rejected by [[User:$1|$1]] on $2)',
	'confirmacount-create'  => 'Accept (create account)',
	'confirmacount-deny'    => 'Reject (delist)',
	'requestaccount-reason' => 'Comment (will be included in email):',
	'confirmacount-submit'  => 'Confirm',
	'confirmaccount-acc'    => 'Account request confirmed successfully; created new user account [[User:$1]].',
	'confirmaccount-rej'    => 'Account request rejected successfully.',
	'confirmaccount-summary' => 'Creating user page with biography of new user.',
	'confirmaccount-welc'   => "'''Welcome to ''{{SITENAME}}''!''' We hope you will contribute much and well. 
	You'll probably want to read [[{{NS:PROJECT}}:Getting started|Getting started]]. Again, welcome and have fun! 
	~~~~",
	'confirmaccount-wsum'   => 'Welcome!',
	'confirmaccount-email-subj' => '{{SITENAME}} account request',
	'confirmaccount-email-body' => 'Your request for an account has been approved on {{SITENAME}}.

Account name: $1

Password: $2

For security reasons you will need to change your password on first login. To login, please go to 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2' => 'Your request for an account has been approved on {{SITENAME}}.

Account name: $1

Password: $2

$3

For security reasons you will need to change your password on first login. To login, please go to 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3' => 'Sorry, your request for an account "$1" has been rejected on {{SITENAME}}.

There are several ways this can happen. You may not have filled out the form correctly, did not provide adequate 
length in your responses, or otherwise failed to meet some policy criteria. There may be contact lists on site that 
you can use if you want to know more about user account policy.',
	'confirmaccount-email-body4' => 'Sorry, your request for an account "$1" has been rejected on {{SITENAME}}.

$2

There may be contact lists on site that you can use if you want to know more about user account policy.',
);
// German translations (by Rrosenfeld)
$wgConfirmAccountMessages['de'] = array(
	# Request account page
	'requestaccount'          => 'Benutzerkonto beantragen',
	'requestacount-text'      => '\'\'\'F�lle das folgende Formular aus und schick es ab, um ein Benutzerkonto zu beantragen\'\'\'. 
	
	Bitte lies zun�chst die [[{{NS:PROJECT}}:Nutzungsbedingungen|Nutzungsbedingungen]] bevor Du ein Benutzerkonto beantragst.
	
	Sobald das Konto best�tigt wurde, wirst Du per E-Mail benachrichtigt und Du kannst Dich unter [[Spezial:Anmelden]] einloggen.',
	'requestaccount-dup'      => '\'\'\'Achtung: Du bist bereits mit einem registrierten Benutzerkonto eingeloggt.\'\'\'',
	'requestacount-legend1'   => 'Benutzerkonto:',
	'requestacount-legend2'   => 'Pers�nliche Informationen:',
	'requestacount-legend3'   => 'Weitere Informationen:',
	'requestacount-acc-text'  => 'An Deine E-Mail-Adresse wird nach dem Absenden dieses Formulars eine Best�tigungsmail geschickt. 
	Bitte reagiere darauf, indem Du auf den in dieser Mail enthaltenen Best�tigungs-Link klickst. Sobald Dein Konto angelegt wurde,
	wird Dir Dein Passwort per E-Mail zugeschickt.',
	'requestacount-ext-text'  => 'Die folgenden Informationen werden vertraulich behandelt und ausschlie�lich f�r diesen Antrag
	verwendet. Du kannst Kontakt-Angaben wie eine Telefonnummer machen, um die Bearbeitung Deines Antrags zu vereinfachen.',
	'requestaccount-bio-text' => "Deine Biographie wird als initialer Inhalt Deiner Benutzerseite gespeichert. Versuche alle n�tigen
	Empfehlungen zu erw�hnen, aber stelle sicher, dass Du die Informationen auch wirklich ver�ffentlichen m�chtest. Du kannst Deinen
	Namen unter [[Spezial:Einstellungen]] �ndern.",
	'requestaccount-real'     => 'Real-Name:',
	'requestaccount-same'     => '(wie der Real-Name)',
	'requestaccount-email'    => 'E-Mail Adresse:',
	'requestaccount-bio'      => 'Pers�nliche Biographie:',
	'requestaccount-notes'    => 'Zus�tzliche Angaben:',
	'requestaccount-urls'     => 'Liste von Webseiten (durch Zeilenumbr�che getrennt):',
	'requestaccount-agree'    => 'Du musst best�tigen, dass Dein Real-Name korrekt ist und Du die Benutzerbedingungen akzeptierst.',
	'requestaccount-inuse'    => 'Der Benutzername ist bereits in einem anderen Benutzerantrag in Verwendung.',
	'requestaccount-tooshort' => 'Deine Biographie sollte mindestens $1 Worte lang sein.',
	'requestaccount-tos'      => 'Ich habe die Benutzerbedingungen von {{SITENAME}} gelesen und akzeptiere sie.',
	'requestaccount-correct'  => 'Ich best�tige, dass der Name, den ich unter "Real-Name" angegeben habe, mein wirklicher Name ist.',
	'requestacount-submit'    => 'Benutzerkonto beantragen',
	'requestaccount-sent'     => 'Dein Antrag wurde erfolgreich verschickt und muss nun noch �berpr�ft werden.',
	'request-account-econf'   => 'Deine E-Mail Adresse wurde best�tigt und wird nun als solche in Deinem Account-Antrag gef�hrt.',
	'requestaccount-email-subj' => '{{SITENAME}} E-Mail Adressen Pr�fung',
	'requestaccount-email-body' => 'Jemand, mit der IP Adresse $1, m�glicherweise Du, hat bei {{SITENAME}} 
das Benutzerkonto "$2" mit Deiner E-Mail Adresse beantragt.

Um zu best�tigen, dass wirklich Du dieses Konto bei {{SITENAME}}
beantragt hast, �ffne bitte folgenden Link in Deinem Browser:

$3

Wenn das Benutzerkonto erstellt wurde, bekommst Du eine weitere E-Mail
mit dem Passwort.

Wenn Du das Benutzerkonto *nicht* beantragt hast, �ffne den Link bitte nicht!

Dieser Best�tigungscode wird um $4 ung�ltig.',

	'acct_request_throttle_hit' => "Du hast bereits $1 Benutzerkonten beantragt, Du kannst momentan keine weiteren beantragen.",
	
	# Add to Special:Login
	'requestacount-loginnotice' => 'Um ein neues Benutzerkonto zu erhalten, musst Du es \'\'\'[[SpeZial:RequestAccount|beantragen]]\'\'\'.',
	
	# Confirm account page
	'confirmaccounts'       => 'Benutzerkonto-Antr�ge best�tigen', 
	'confirmacount-list'    => 'Unten findest Du eine Liste von noch zu bearbeitenden Benutzerkonto-Antr�gen.
	Best�tigte Konten werden angelegt und aus der Liste entfernt. Abgelehnte Konten werden einfach aus der Liste gel�scht.',
	'confirmacount-list2'    => 'Below is a list recently rejected account requests which may automatically be deleted 
	once several days old. They can still be approved into accounts, though you may want to first consult the rejecting 
	admin before doing so.',
	'confirmacount-text'    => 'Dies ist ein Antrag auf ein Benutzerkonto bei \'\'\'{{SITENAME}}\'\'\'. Pr�fe alle unten
	stehenden Informationen gr�ndlich und best�tige die Informationen wenn m�glich. Bitte beachte, dass Du den Zugang bei Bedarf unter
	einem anderen Benutzernamen anlegen kannst. Du solltest dies nur nutzen, um Kollisionen mit anderen Namen zu vermeiden.
	
	Wenn Du diese Seite verl�sst, ohne das Konto zu best�tigen oder abzulehnen, wird der Antrag offen stehen bleiben.',
	'confirmacount-none'    => 'Momentan gibt es keine offenen Benutzerantr�ge.',
	'confirmacount-none2'   => 'Momentan gibt es keine k�rzlich abgelehnten Benutzerantr�ge.',
	'confirmaccount-badid'  => 'Momentan gibt es keinen Benutzerantrag zur angegebenen ID. M�glicherweise wurde er bereits bearbeitet.',
	'confirmaccount-back'   => 'Liste der offenen Antr�ge ansehen',
	'confirmaccount-back2'  => 'Liste der k�rzlich abgelehnten Antr�ge ansehen',
	'confirmaccount-name'   => 'Benutzername',
	'confirmaccount-real'   => 'Name',
	'confirmaccount-email'  => 'E-Mail',
	'confirmaccount-bio'    => 'Biographie',
	'confirmaccount-urls'   => 'Liste der Webseiten:',
	'confirmaccount-nourls' => '(Nichts angegeben)',
	'confirmaccount-review' => 'Best�tigen/Ablehnen',
	'confirmacount-confirm' => 'Benutze die folgende Auswahl, um den Antrag zu akzeptieren oder abzulehnen.',
	'confirmaccount-econf'  => '(best�tigt)',
	'confirmaccount-reject' => '(rejected by [[User:$1|$1]] on $2)',
	'confirmacount-create'  => 'Best�tigen (Konto anlegen)',
	'confirmacount-deny'    => 'Ablehnen (Antrag l�schen)',
	'requestaccount-reason' => 'Kommentar (wird in die Mail an den Antragsteller eingef�gt):',
	'confirmacount-submit'  => 'Abschicken',
	'confirmaccount-acc'    => 'Benutzerantrag erfolgreich best�tigt; Benutzer [[Benutzer:$1]] wurde angelegt.',
	'confirmaccount-rej'    => 'Benutzerantrag wurde abgelehnt.',
	'confirmaccount-summary' => 'Erzeuge Benutzerseite mit der Biographie des neuen Benutzers.',
	'confirmaccount-welc'   => "'''Willkommen bei ''{{SITENAME}}''!''' Wir hoffen, dass Du viele gute Informationen beisteuerst.
	M�glicherweise m�chtest Du zun�chst [[{{NS:PROJECT}}:Erste Schritte|Erste Schritte]]. Nochmal: Willkommen und hab' Spa�! 
	~~~~",
	'confirmaccount-wsum'   => 'Willkommen!',
	'confirmaccount-email-subj' => '{{SITENAME}} Antrag auf Benutzerkonto',
	'confirmaccount-email-body' => 'Dein Antrag auf ein Benutzerkonto bei {{SITENAME}} wurde best�tigt.

Benutzername: $1

Passwort: $2

Aus Sicherheitsgr�nden solltest Du Dein Passwort unbedingt beim ersten
Einloggen �ndern. Um Dich einzuloggen gehst Du auf die Seite
{{fullurl:Spezial:Anmelden}}.',
	'confirmaccount-email-body2' => 'Dein Antrag auf ein Benutzerkonto bei {{SITENAME}} wurde best�tigt.

Benutzername: $1

Passwort: $2

$3

Aus Sicherheitsgr�nden solltest Du Dein Passwort unbedingt beim ersten
Einloggen �ndern. Um Dich einzuloggen gehst Du auf die Seite
{{fullurl:Spezial:Anmelden}}.',
	'confirmaccount-email-body3' => 'Leider wurde Dein Antrag auf eine Benutzerkonto "$1" 
bei {{SITENAME}} abgelehnt.

Dies kann viele Gr�nde haben. M�glicherweise hast Du das Antragsformular
nicht richtig ausgef�llt, hast nicht gen�gend Angaben gemacht oder hast
die Anforderungen auf andere Weise nicht erf�llt.

M�glicherweise gibt es auf der Seite Kontaktadressen, an die Du Dich wenden
kannst, wenn Du mehr �ber die Anforderungen wissen m�chtest.',
	'confirmaccount-email-body4' => 'Leider wurde Dein Antrag auf eine Benutzerkonto "$1" 
bei {{SITENAME}} abgelehnt.

$2

M�glicherweise gibt es auf der Seite Kontaktadressen, an die Du Dich wenden
kannst, wenn Du mehr �ber die Anforderungen wissen m�chtest.',
);
