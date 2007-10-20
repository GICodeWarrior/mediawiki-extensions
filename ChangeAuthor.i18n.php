<?php
# Alert the user that this is not a valid entry point to MediaWiki if they try to access the extension file directly.
if (!defined('MEDIAWIKI')) {
		echo <<<EOT
To install the ChangeAuthor extension, put the following line in LocalSettings.php:
require_once( "$IP/extensions/ChangeAuthor/ChangeAuthor.setup.php" );
EOT;
		exit(1);
}

$allMessages = array(
		'en' => array( 
				'changeauthor' => 'Change revision author',
				'changeauthor-short' => 'ChangeAuthor',
				'changeauthor-title' => 'Change the author of a revision',
				'changeauthor-search-box' => 'Search revisions',
				'changeauthor-pagename-or-revid' => 'Article name or revision ID:',
				'changeauthor-pagenameform-go' => 'Go',
				'changeauthor-comment' => 'Comment:',
				'changeauthor-changeauthors-multi' => 'Change author(s)',
				'changeauthor-explanation-multi' => 'With this form you can change revision authors. ' .
								'Simply change one or more usernames in the list below, add a comment (optional) ' .
								'and click the \'Change author(s)\' button.',
				'changeauthor-changeauthors-single' => 'Change author',
				'changeauthor-explanation-single' => 'With this form you can change a revision author. ' .
								'Simply change the username below, add a comment (optional) ' .
								'and click the \'Change author\' button.',
				'changeauthor-invalid-username' => 'Invalid username "$1".',
				'changeauthor-nosuchuser' => 'No such user "$1".',
				'changeauthor-revview' => 'Revision #$1 of $2',
				'changeauthor-nosuchtitle' => 'There is no article called "$1".',
				'changeauthor-weirderror' => 'A very strange error occurred. Please retry your request. ' .
								'If this error keeps showing up, the database is probably broken.',
				'changeauthor-invalidform' => 'Please use the form provided by Special:ChangeAuthor rather than a custom form.',
				'changeauthor-success' => 'Your request has been processed successfully.',
				'changeauthor-logentry' => 'Changed author of $2 of $1 from $3 to $4',
				'changeauthor-logpagename' => 'Author change log',
				'changeauthor-logpagetext' => '',
				'changeauthor-rev' => 'r$1',
		),
		'nl' => array(
				'changeauthor' => 'Verander bewerkingsauteur',
				'changeauthor-short' => 'VeranderAuteur',
				'changeauthor-title' => 'Verander de auteur van een bewerking',
				'changeauthor-search-box' => 'Zoek bewerkingen',
				'changeauthor-pagename-or-revid' => 'Naam van artikel of bewerkingsID:',
				'changeauthor-pagenameform-go' => 'Ga',
				'changeauthor-comment' => 'Toelichting:',
				'changeauthor-changeauthors' => 'Verander auteur(s)',
				'changeauthor-explanation-multi' => 'Met dit formulier kunt u de auteur van een bewerking veranderen. ' .
								'Verander simpelweg ��n of meer gebruikersnamen in de lijst hieronder, voeg een ' .
								'toelichting toe (niet verplicht) en klik op de knop \'Verander auteur(s)\'.',
				'changeauthor-invalid-username' => 'Ongeldige gebruikersnaam "$1".',
				'changeauthor-nosuchuser' => 'Gebruiker "$1" bestaat niet.',
				'changeauthor-revview' => 'Bewerking no. $1 van $2',
				'changeauthor-nosuchtitle' => 'Er is geen artikel genaamd "$1".',
				'changeauthor-weirderror' => 'Er is een erg vreemde fout opgetreden. Probeer het a.u.b. nogmaals. ' .
								'Als u deze foutmelding elke keer weer ziet, is er waarschijnlijk iets mis met de database.',
				'changeauthor-invalidform' => 'Gebruik a.u.b. het formulier van Speciaal:VeranderAuteur, in plaats van een aangepast formulier.',
				'changeauthor-success' => 'Uw verzoek is succesvol verwerkt.',
				'changeauthor-logentry' => 'Auteur van $2 van $1 veranderd van $3 naar $4',
				'changeauthor-logpagename' => 'Auteursveranderingenlogboek',
				'changeauthor-logpagetext' => '',
				'changeauthor-rev' => 'r$1',
		),
);