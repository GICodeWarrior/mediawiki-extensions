<?php
/**
 * Internationalization file for InviteContacts extension.
 *
 * @file
 * @ingroup Extensions
 */
$messages = array();

/** English
 * @author Aaron Wright <aaron.wright@gmail.com>
 * @author David Pean <david.pean@gmail.com>
 */
$messages['en'] = array(
	'invitecontacts' => 'Find Your Friends',
	'invite-subject' => '$1 wants you to join {{SITENAME}}! ',
	'invite-body' => 'Hi!

Your friend, $1, wants you to join {{SITENAME}}. Check it out at http://{{SERVERNAME}}

To join, just click this link and sign up!

$4

The {{SITENAME}} Team',
	'invite-emailanontext' => 'Please $1 to send out invite emails.',
	'invite-notloggedin' => 'Not logged in',
	'invite-sharearticle' => 'Share Your Article With Your Friends!',
	'invite-sent-page-title' => 'Messages Sent!',
	'invite-email-list-header' => 'Emails went out to the following addresses',
	'invite-go-to-profile' => 'Let\'s Go To Your Profile!',
	'invite-network-fans' => 'Are Your Friends $1 Fans? Invite Them.',
	'invite-message' => '{{SITENAME}} is more fun with your friends.  Invite your friends to join {{SITENAME}} by simply entering email addresses and an invitiation message and clicking "Send Email"',
	'invite-privacy-message' => 'We are serious about keeping your private information private.  We do not store the e-mail address or password provided to us.',
	'invite-form-email' => 'Email Address',
	'invite-form-password' => 'Password',
	'invite-btn-addfriends' => 'Add Friends',
	'invite-no-webmail' => 'Don\'t have web-mail?',
	'invite-click-here' => 'Click Here',
	'invite-skip-step' => 'Skip This Step',
	'invite-csv-size-limit' => 'There is a 2MB limit for your .csv file',
	'invite-csv-select-file' => 'Select File',
	'invite-csv-btn-upload' => 'Upload Your Contacts',
	'invite-csv-have-webmail' => 'Have webmail?',
	'invite-sent' => 'Your Invitation Has Been Sent!',
	'invite-back-to-userpage' => '&lt; Back to Your User Page',
	'invite-sent-thanks' => 'Thanks for spreading the word about {{SITENAME}}!',
	'invite-more-friends' => 'Invite More Friends',
	'invite-myfriends' => 'Invite My Friends',
	'invite-nothanks' => 'No Thanks',
	'invite-your-friends' => 'Invite Your Friends',
	'invite-enter-emails' => 'Enter Emails',
	'invite-comma-separated' => '(comma seperated for multiple addresses)',
	'invite-customize-email' => 'Customize Your Email',
	'invite-customize-subject' => 'Subject',
	'invite-customize-body' => 'Email Body',
	'invite-customize-send' => 'Send Email',
	'invite-emailswentout' => 'Emails went out to the following addresses',
	'invite-entervalidemail' => 'You must enter an email address',
	'invite-youruserpage' => 'Your User Page',
	'invite-yourprofile' => 'Your Profile',
	'invite-subject' => '$1 wants you to join {{SITENAME}}!',
	'invite-find-friends' => 'Find Your Friends',
	//'invite-donthaveemail' => 'Don\'t have webmail? No problem, upload your contacts file!',
	'invite-contact-passwd' => 'Password',
	'invite-uploadyourcontacts' => 'Upload Your Contacts',
	'invite-csvfilelimit' => 'There is a 2MB limit for your .csv file',
	'invite-selectcsvfile' => 'Select File',
	'invite-selectemailclient' => 'Select Email Client',
	'invite-verifyemail' => 'Verify Your Email Address',
	//'invite-queshavewebmail' => 'Have webmail?',
	'invite-friends' => 'Invite Your Friends',
	'invite-uncheckallbtn' => 'uncheck all',
	'invite-friendsname' => 'Friend\'s Name',
	'invite-emailaddr' => 'Email',
	'invite-uploadfiletoolarge' => 'The file you uploaded is too large',
	'invite-yourcontacts' => 'Your contacts',
	'invite-sharefriends' => 'Share {{SITENAME}} with your friends.  They will thank you.  The more friends you invite, the less bored you will be.',
	'invite-getcontactsmaintitle' => '{{SITENAME}} is more fun with your friends.  Invite all of them. Enter your e-mail and password below to load your contacts. <br /><b>We are serious about keeping your private information private.  We do not store the e-mail address or password provided to us</b>',
	'invite-msg-sent' => 'Messages Sent!',
	'send-new-article-to-friends-message' => 'Awesome. Now, let\'s get you some reads? Share your article with your friends. Just click below!',

	# Subjects
	'invite-rate-subject' => '$1 wants you to rate $2 on {{SITENAME}}',
	'invite-edit-subject' => '$1 wants you to edit $2 on {{SITENAME}}',
	'invite-view-subject' => '$1 wants you to read *$2* on {{SITENAME}}',

	# Emails
	'invite-edit-body' => 'Hi!

Your friend, $1, wants your help in editing $4 on {{SITENAME}}.

Click here to edit

$5

And don\'t forget to add $2 as your {{SITENAME}} friend, at $3

The {{SITENAME}} Team',

	'invite-body' => 'Hey!

Your friend, $1, wants you to join {{SITENAME}}! Check it out at http://{{SERVERNAME}}

To join, just click this link and sign up!
$4

The {{SITENAME}} Team',

	'invite-rate-body' => 'Hi!

Your friend, $1, wants you to rate $4 on {{SITENAME}}.

Click here to rate

$5

And don\'t forget to add $2 as your {{SITENAME}} friend, at $3

The {{SITENAME}} Team',

	'invite-view-body' => 'Hi!

Your friend, $1, has just written a new article {{SITENAME}}, and wants you to check it out!

Click here to view

$5

And don\'t forget to add $2 as your {{SITENAME}} friend, at $3

The {{SITENAME}} Team',
);

/** Finnish (Suomi)
 * @author Jack Phoenix
 */
$messages['fi'] = array(
	'invitecontacts' => 'Löydä ystäväsi',
	'invite-subject' => '$1 haluaa sinun liittyvän {{GRAMMAR:illative|{{SITENAME}}}}! ',
	'invite-body' => 'Hei!

Ystäväsi, $1, haluaa sinun liittyvän {{GRAMMAR:illative|{{SITENAME}}}}. Käy katsomassa se osoitteessa http://{{SERVERNAME}}

Liittyäksesi mukaan, napsauta vain tätä linkkiä ja luo tunnus!

$4

{{GRAMMAR:genitive|{{SITENAME}}}} tiimi',
	'invite-emailanontext' => 'Sinun tulee $1 lähettääksesi kutsusähköposteja.',
	'invite-notloggedin' => 'Et ole sisäänkirjautunut',
	'invite-sharearticle' => 'Jaa artikkelisi ystäviesi kanssa!',
	'invite-sent-page-title' => 'Viestit lähetetty!',
	'invite-email-list-header' => 'Sähköpostit lähetettiin seuraaviin osotteisiin',
	'invite-go-to-profile' => 'Mennään profiiliisi!',
	'invite-network-fans' => 'Ovatko ystäväsi $1-faneja? Kutsu heidät.',
	'invite-message' => '{{SITENAME}} on hauskempi ystäviesi kanssa. Kutsu ystäväsi liittymään mukaan {{GRAMMAR:illative|{{SITENAME}}}} yksinkertaisesti antamalla sähköpostiosoitteet ja kutsukirjeen ja napsauttamalla "Lähetä sähköposti".',
	'invite-privacy-message' => 'Olemme vakavissamme yksityisten tietojesi pitämisestä yksityisenä. Emme tallenna meille tarjottuja sähköpostiosoitteita tai salasanoja.',
	'invite-form-email' => 'Sähköpostiosoite',
	'invite-form-password' => 'Salasana',
	'invite-btn-addfriends' => 'Lisää ystäviä',
	'invite-no-webmail' => 'Etkö omista sähköpostia?',
	'invite-click-here' => 'Napsauta tästä',
	'invite-skip-step' => 'Ohita tämä vaihe',
	'invite-csv-size-limit' => '.csv-tiedostollasi on 2 MB:n kokorajoitus',
	'invite-csv-select-file' => 'Valitse tiedosto',
	'invite-csv-btn-upload' => 'Tallenna yhteystietojasi',
	'invite-csv-have-webmail' => 'Omistatko sähköpostiosoitteen?',
	'invite-sent' => 'Kutsusi on lähetetty!',
	'invite-back-to-userpage' => '&lt; Takaisin käyttäjäsivullesi',
	'invite-sent-thanks' => 'Kiitos, kun levitit sanaa {{GRAMMAR:elative|{{SITENAME}}}}!',
	'invite-more-friends' => 'Kutsu lisää ystäviä',
	'invite-myfriends' => 'Kutsu ystäviäni',
	'invite-nothanks' => 'Ei kiitos',
	'invite-your-friends' => 'Kutsu ystäväsi',
	'invite-enter-emails' => 'Anna sähköpostiosoitteet',
	'invite-comma-separated' => '(pilkuin eroteltuina usempien osoitteiden tapauksessa)',
	'invite-customize-email' => 'Tuunaa sähköpostiasi',
	'invite-customize-subject' => 'Otsikko',
	'invite-customize-body' => 'Sähköpostin vartalo',
	'invite-customize-send' => 'Lähetä sähköposti',
	'invite-emailswentout' => 'Sähköpostit lähetettiin seuraaviin osotteisiin',
	'invite-entervalidemail' => 'Sinun tulee antaa sähköpostiosoite',
	'invite-youruserpage' => 'Käyttäjäsivusi',
	'invite-yourprofile' => 'Käyttäjäprofiilisi',
	'invite-subject' => '$1 haluaa sinun liittyvän {{GRAMMAR:illative|{{SITENAME}}}}!',
	'invite-find-friends' => 'Löydä ystäväsi',
	//'invite-donthaveemail' => 'Etkö omista sähköpostiosoitetta? Ei hätää, tallenna yhteystietotiedostosi!',
	'invite-contact-passwd' => 'Salasana',
	'invite-uploadyourcontacts' => 'Tallenna yhteystietotiedostosi',
	'invite-csvfilelimit' => '.csv-tiedostollasi on 2 MB:n kokorajoitus',
	'invite-selectcsvfile' => 'Valitse tiedosto',
	'invite-selectemailclient' => 'Valitse sähköpostiohjelma',
	'invite-verifyemail' => 'Varmista sähköpostiosoitteesi',
	//'invite-queshavewebmail' => 'Omistatko sähköpostiosoitteen?',
	'invite-friends' => 'Kutsu ystäviäsi',
	'invite-uncheckallbtn' => 'poista valinta kaikista',
	'invite-friendsname' => 'Ystävän nimi',
	'invite-emailaddr' => 'Sähköposti',
	'invite-uploadfiletoolarge' => 'Tallentamasi tiedosto on liian iso',
	'invite-yourcontacts' => 'Yhteystietosi',
	'invite-sharefriends' => 'Jaa {{SITENAME}} ystäviesi kanssa.  He kiittävät sinua.  Mitä enemmän ystäviä kutsut, sitä vähemmän tylsistyneempi olet.',
	'invite-getcontactsmaintitle' => '{{SITENAME}} on hauskempi ystäviesi kanssa.  Kutsu heidät kaikki. Anna sähköpostiosoitteesi ja salasanasi alempana ladataksesi yhteystietosi. <br /><b>Olemme vakavissamme yksityisten tietojesi pitämisestä yksityisenä. Emme tallenna meille tarjottuja sähköpostiosoitteita tai salasanoja.</b>',
	'invite-msg-sent' => 'Viestit lähetetty!',
	'send-new-article-to-friends-message' => 'Mahtavaa. Hankittaisiinko nyt sinulle joitakin lukijoita? Jaa artikkelisi ystäviesi kanssa. Napsauta vain alapuolella olevia painikkeita!',
	'invite-rate-subject' => '$1 haluaa sinun arvostelevan artikkelin $2 {{GRAMMAR:inessive|{{SITENAME}}}}',
	'invite-edit-subject' => '$1 haluaa sinun muokkaavan artikkelia $2 {{GRAMMAR:inessive|{{SITENAME}}}}',
	'invite-view-subject' => '$1 haluaa sinun lukevan artikkelin *$2* {{GRAMMAR:inessive|{{SITENAME}}}}',
	'invite-edit-body' => 'Hei!

Ystäväsi, $1, haluaa apuasi artikkelin $4 muokkaamisessa {{GRAMMAR:inessive|{{SITENAME}}}}.

Napsauta tästä muokataksesi

$5

Äläkä unohda lisätä käyttäjää $2 {{GRAMMAR:genitive|{{SITENAME}}}} ystäväksesi, osoitteessa $3

{{GRAMMAR:genitive|{{SITENAME}}}} tiimi',

	'invite-body' => 'Hei!

Ystäväsi, $1, haluaa sinun liityvän {{GRAMMAR:illative|{{SITENAME}}}}! Löydät sen osoitteesta http://{{SERVERNAME}}

Liittyäksesi napsauta vain tätä linkkiä ja rekisteröidy!
$4

{{GRAMMAR:genitive|{{SITENAME}}}} tiimi',

	'invite-rate-body' => 'Hei!

Ystäväsi, $1, haluaa sinun arvostelevan artikkelin $4 {{GRAMMAR:inessive|{{SITENAME}}}}.

Napsauta tästä arvostellaksesi

$5

Äläkä unohda lisätä käyttäjää $2 {{GRAMMAR:genitive|{{SITENAME}}}} ystäväksesi, osoitteessa $3

{{GRAMMAR:genitive|{{SITENAME}}}} tiimi',

	'invite-view-body' => 'Hei!

Ystäväsi, $1, on juuri kirjoittanut uuden artikkelin {{GRAMMAR:illative|{{SITENAME}}}}, ja haluaa sinun katsovan sen!

Napsauta tästä katsoaksesi

$5

Äläkä unohda lisätä käyttäjää $2 {{GRAMMAR:genitive|{{SITENAME}}}} ystäväksesi, osoitteessa $3

{{GRAMMAR:genitive|{{SITENAME}}}} tiimi',
);