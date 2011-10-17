<?php

/**
 * Internationalization file for the Contest extension.
 *
 * @since 0.1
 *
 * @file Contest.i18n.php
 * @ingroup Contest
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	'contest-desc' => 'Contest extension that allows users to participate in admin defined contest challenges. Via a judging interface, judges can discuss and vote on submissions.',

	// Misc
	'contest-toplink' => 'My contests',

	// Rights
	'right-contestadmin' => 'Manage contests',
	'right-contestparticipant' => 'Participate in contests',
	'right-contestjudge' => 'Judge contest submissions',

	// Groups
	'group-contestadmin' => 'Contest admins',
	'group-contestadmin-member' => '{{GENDER:$1|contest admin}}',
	'grouppage-contestadmin' => 'Project:Contest_admins',

	'group-contestparticipant' => 'Contest participants',
	'group-contestparticipant-member' => '{{GENDER:$1|contest participant}}',
	'grouppage-contestparticipant' => 'Project:Contest_participants',

	'group-contestjudge' => 'Contest judges',
	'group-contestjudge-member' => '{{GENDER:$1|contest judge}}',
	'grouppage-contestjudge' => 'Project:Contest_judges',

	// Preferences
	'prefs-contest' => 'Contests',
	'contest-prefs-showtoplink' => 'Show a link to [[Special:MyContests|My Contests]] in the top menu.',

	// Contest statuses
	'contest-status-draft' => 'Draft (disabled)',
	'contest-status-active' => 'Active (enabled)',
	'contest-status-expired' => 'Expired (enabled, past end date)',
	'contest-status-finished' => 'Finished (disabled)',

	// Special page names
	'special-contest' => 'View a contest',
	'special-contests' => 'Manage contests',
	'special-contestsignup' => 'Sign up for a contest',
	'special-contestwelcome' => 'View a contest',
	'special-editcontest' => 'Edit a contest',
	'special-mycontests' => 'My contests',
	'specialpages-group-contest' => 'Contests',

	// Navigation links
	'contest-nav-contests' => 'Contests list',
	'contest-nav-editcontest' => 'Edit contest',
	'contest-nav-contest' => 'Summary and participants',
	'contest-nav-contestwelcome' => 'Landing page',
	'contest-nav-contestsignup' => 'Signup page',

	// Special:Contests
	'contest-special-addnew' => 'Add a new contest',
	'contest-special-namedoc' => 'The name of the contest is the identifier used in URLs. ie "name" in Special:Contest/name',
	'contest-special-newname' => 'Contest name',
	'contest-special-add' => 'Add contest',
	'contest-special-existing' => 'Existing contests',
	
	'contest-special-name' => 'Name',
	'contest-special-status' => 'Status',
	'contest-special-submissioncount' => 'Submission count',
	'contest-special-edit' => 'Edit',
	'contest-special-delete' => 'Delete',

	'contest-special-confirm-delete' => 'Are you sure you want to delete this contest?',
	'contest-special-delete-failed' => 'Failed to delete the contest.',

	// Special:EditContest
	'editcontest-text' => 'You are editing a contest.',
	'editcontest-legend' => 'Contest',
	'contest-edit-name' => 'Contest name',
	'contest-edit-status' => 'Contest status',
	'contest-edit-intro' => 'Introduction page',
	'contest-edit-opportunities' => 'Opportunities page',
	'contest-edit-rulespage' => 'Rules page',
	'contest-edit-help' => 'Help page',
	'contest-edit-signup' => 'Signup e-mail page',
	'contest-edit-reminder' => 'Reminder e-mail page',
	'contest-edit-end' => 'Contest end',
	'contest-edit-exists-already' => 'Note: you are editing an already existing contest, not creating a new one.',
	'contest-edit-submit' => 'Submit',

	'contest-edit-challenges' => 'Contest challenges',
	'contest-edit-delete' => 'Delete challenge',
	'contest-edit-add-first' => 'Add a challenge',
	'contest-edit-add-another' => 'Add another challenge',
	'contest-edit-confirm-delete' => 'Are you sure you want to delete this challenge?',
	'contest-edit-challenge-title' => 'Challenge title',
	'contest-edit-challenge-text' => 'Challenge text',
	'contest-edit-challenge-oneline' => 'Short description',

	// Special:ContestWelcome
	'contest-welcome-unknown' => 'There is no contest with the provided name.',
	'contest-welcome-rules' => 'In order to participate, you are required to agree to', // js i18n
	'contest-welcome-rules-link' => 'the contest rules', // js i18n
	'contest-welcome-signup' => 'Signup now',
	'contest-welcome-js-off' => 'The contest user interface uses JavaScript for an improved interface. Your browser either does not support JavaScript or has JavaScript turned off.',
	'contest-welcome-accept-challenge' => 'Challenge accepted',

	'contest-welcome-select-header' => 'Select your challenge:',

	// Special:ContestSignup & Special:ContestSubmission
	'contest-signup-unknown' => 'There is no contest with the provided name.',
	'contest-signup-submit' => 'Sign up',
	'contest-signup-header' => 'Please fill out the form to complete your registration for $1.',
	'contest-signup-email' => 'Your e-mail address',
	'contest-signup-realname' => 'Your real name',
	'contest-signup-volunteer' => 'I am interested in volunteer opportunities',
	'contest-signup-wmf' => 'I am interested in working for the Wikimedia Foundation',
	'contest-signup-cv' => 'Link to your CV',
	'contest-signup-readrules' => 'I confirm that I have read, and agree to, [[$1|the contest rules]]',
	'contest-signup-challenge' => 'What challenge do you want to take on?',
	'contest-signup-finished' => 'This contest has ended. Thanks for your participation!',
	'contest-signup-draft' => 'This contest has not started yet. Please be patient.',
	'contest-signup-country' => 'Your country',

	'contest-signup-require-rules' => 'You need to agree to the contest rules.',
	'contest-signup-require-country' => 'You need to provide your country of residence.',
	'contest-signup-invalid-email' => 'The e-mail address you provided is not valid.',
	'contest-signup-invalid-name' => 'The name you provided is too short.',
	'contest-signup-require-challenge' => 'You must select a challenge.',
	'contest-signup-invalid-cv' => 'You entered an invalid URL.',
	
	// Special:Contest
	'contest-contest-title' => 'Contest: $1',
	'contest-contest-no-results' => 'There are no contestants to display.',
	'contest-contest-name' => 'Name',
	'contest-contest-status' => 'Status',
	'contest-contest-submissioncount' => 'Amount of participants',
	'contest-contest-contestants' => 'Contest contestants',
	'contest-contest-contestants-text' => 'To judge an individual entry, click on the entry ID in the left column.',

	// Contestant pager
	'contest-contestant-id' => 'ID',
	'contest-contestant-challenge-name' => 'Challenge name',
	'contest-contestant-volunteer' => 'Volunteer',
	'contest-contestant-wmf' => 'WMF',
	'contest-contestant-no' => 'No',
	'contest-contestant-yes' => 'Yes',
	'contest-contestant-commentcount' => 'Comments',
	'contest-contestant-overallrating' => 'Rating',
	'contest-contestant-rating' => '$1 ($2 {{PLURAL:$2|vote|votes}})',
	
	// Special:Contestant
	'contest-contestant-title' => 'Contestant $1 ($2)',
	'contest-contestant-header-id' => 'Contestant ID',
	'contest-contestant-header-contest' => 'Contest name',
	'contest-contestant-header-challenge' => 'Challenge name',
	'contest-contestant-header-submission' => 'Submission link',
	'contest-contestant-header-country' => 'Contestant country',
	'contest-contestant-header-wmf' => 'Interested in WMF job',
	'contest-contestant-header-volunteer' => 'Interested in volunteer opportunities',
	'contest-contestant-header-rating' => 'Rating',
	'contest-contestant-header-comments' => 'Amount of comments',
	'contest-contestant-submission-url' => 'Submission',
	'contest-contestant-notsubmitted' => 'Not submitted yet',
	'contest-contestant-comments' => 'Comments',
	'contest-contestant-submit' => 'Save changes',
	'contest-contestant-comment-by' => 'Comment by $1',
	'contest-contestant-rate' => 'Rate this contestant',
	'contest-contestant-not-voted' => 'You have not voted on this participant yet.',
	'contest-contestant-voted' => 'Your current vote is $1.',
	'contest-contestant-permalink' => 'Permalink',

	// Emails
	'contest-email-signup-title' => 'Thanks for joining the challenge!',
	'contest-email-reminder-title' => 'Only $1 {{PLURAL:$1|day|days}} until the end of the challenge!',

	// Special:MyContests
	'contest-mycontests-toplink' => 'My contests',
	'contest-mycontests-no-contests' => 'You are not participating in any contest.',
	'contest-mycontests-active-header' => 'Running contests',
	'contest-mycontests-finished-header' => 'Passed contests',
	'contest-mycontests-active-text' => 'These are the contests you are currently participating in.',
	'contest-mycontests-finished-text' => 'These are the passed contests you have participated in.',
	'contest-mycontests-header-contest' => 'Contest',
	'contest-mycontests-header-challenge' => 'Challenge',
	'contest-mycontests-signup-success' => 'You have successfully signed up for this contest.',
	'contest-mycontests-addition-success' => 'You have successfully posted your submission! Thanks for participating in this contest.',
	'contest-mycontests-updated-success' => 'You have successfully modified your submission.',
	'contest-mycontests-sessionfail' => 'Your submission could not be saved due to loss of session data. Please try again.',

	'contest-submission-submit' => 'Submit',
	'contest-submission-unknown' => 'There is no contest with the provided name.',
	'contest-submission-header' => 'Thanks for participating in this contest! Once you have completed the challenge, you can add a link to your submission below.',
	'contest-submission-finished' => 'This contest has ended. Thanks for your participation!',

	'contest-submission-submission' => 'Link to your submission',
	'contest-submission-invalid-url' => 'This URL does not match one of the allowed formats.',
	'contest-submission-new-submission' => 'You still need to enter the URL to your submission. This needs to be done before the deadline.',
	'contest-submission-current-submission' => 'This is the URL to your submission, which you can modify untill the deadline.',
	
	// TODO: how can this be done properly in JS?
	'contest-submission-domains' => 'Submissions are restricted to these sites: $1',
);

/** Message documentation (Message documentation)
 * @author Jeroen De Dauw
 */
$messages['qqq'] = array(
	'contest-special-name' => 'Table column header',
	'contest-special-status' => 'Table column header',
	'contest-special-submissioncount' => 'Table column header',
	'contest-special-edit' => 'Table column header',
	'contest-special-delete' => 'Table column header',
	'editcontest-text' => 'Short text displayed at the top of the page notifying the user they are editting a contest',
	'contest-edit-name' => 'form field label',
	'contest-edit-status' => 'form field label',
	'contest-edit-intro' => 'Form field label',
	'contest-edit-opportunities' => 'Form field label',
	'contest-edit-rulespage' => 'Form field label',
	'contest-edit-help' => 'Form field label',
	'contest-edit-signup' => 'Form field label',
	'contest-edit-reminder' => 'Form field label',
	'contest-edit-end' => 'Form field label',
	'contest-edit-exists-already' => 'Warning message to show when the contest already exists',
	'contest-edit-submit' => 'Submit button text',
	'contest-edit-delete' => 'Delete challange button text',
	'contest-edit-add-first' => 'Add a challenge button text',
	'contest-edit-add-another' => 'Add another challenge button text',
	'contest-edit-confirm-delete' => 'Challange deletion confirmation message',
	'contest-edit-challenge-title' => 'Form field label',
	'contest-edit-challenge-text' => 'Form field label',
	'contest-edit-challenge-oneline' => 'Form field label',
	'contest-contest-title' => 'Page title',
	'contest-contest-no-results' => 'Message displayed instead of a table when there are no contests',
	'contest-contest-name' => 'Table row header',
	'contest-contest-status' => 'Table row header',
	'contest-contest-submissioncount' => 'Table row header',
	'contest-contest-contestants' => 'Page section header',
	'contest-contestant-id' => 'Table column header',
	'contest-contestant-volunteer' => 'Table column header',
	'contest-contestant-wmf' => 'Table column header',
	'contest-contestant-no' => 'Table cell value',
	'contest-contestant-yes' => 'Table cell value',
	'contest-contestant-commentcount' => 'Table column header',
	'contest-contestant-overallrating' => 'Table column header',
	'contest-contestant-rating' => '$1 is the avarage rating, $2 is the amount of votes',
	'contest-contestant-title' => 'Page title with contestant id $1 and contest name $2',
	'contest-contestant-header-id' => 'Table row header',
	'contest-contestant-header-contest' => 'Table row header',
	'contest-contestant-header-challenge' => 'Table row header',
	'contest-contestant-header-submission' => 'Table row header',
	'contest-contestant-header-country' => 'Table row header',
	'contest-contestant-header-wmf' => 'Table row header',
	'contest-contestant-header-volunteer' => 'Table row header',
	'contest-contestant-header-rating' => 'Table row header',
	'contest-contestant-header-comments' => 'Table row header',
	'contest-contestant-submission-url' => 'Text for the link to the submission',
	'contest-contestant-comments' => 'Page header (h2)',
	'contest-contestant-submit' => 'Submit button text',
	'contest-contestant-comment-by' => '$1 the user name, linked to the user page, followed by talk, contrib and block links',
	'contest-contestant-rate' => 'Page header (h2)',
	'contest-contestant-voted' => '$1 is an integer',
	'contest-contestant-permalink' => 'Hover-text for comment permalinks',
	'contest-email-signup-title' => 'Title for signup e-mails',
	'contest-email-reminder-title' => 'Title for reminder e-mails',
	'contest-mycontests-toplink' => 'Text for link in the top menu (ie where watchlist and preferences are linked)',
	'contest-mycontests-no-contests' => 'Message indicating there are no contests for the user, displayed instead of a list.',
	'contest-mycontests-active-header' => 'Page header (h2)',
	'contest-mycontests-finished-header' => 'Page header (h2)',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'contest-desc' => 'Ermöglicht Wettbewerbe sowie die anschließende Ermittlung der Gewinner durch Juroren',
	'contest-toplink' => 'Meine Wettbewerbe',
	'right-contestadmin' => 'Wettbewerbe verwalten',
	'right-contestparticipant' => 'An Wettbewerben teilnehmen',
	'right-contestjudge' => 'Wettbewerbsbeiträge beurteilen',
	'group-contestadmin' => 'Wettbewerbsadministratoren',
	'group-contestadmin-member' => '{{GENDER:$1|Wettbewerbsadministrator|Wettbewerbsadministratorin}}',
	'grouppage-contestadmin' => 'Project:Wettbewerbsadministratoren',
	'group-contestparticipant' => 'Wettbewerbsteilnehmer',
	'group-contestparticipant-member' => '{{GENDER:$1|Wettbewerbsteilnehmer|Wettbewerbsteilnehmerin}}',
	'grouppage-contestparticipant' => 'Project:Wettbewerbsteilnehmer',
	'group-contestjudge' => 'Wettbewerbsjuroren',
	'group-contestjudge-member' => '{{GENDER:$1|Wettbewerbsjuror|Wettbewerbsjurorin}}',
	'grouppage-contestjudge' => 'Project:Wettbewerbsjuroren',
	'prefs-contest' => 'Wettbewerbe',
);

/** French (Français) */
$messages['fr'] = array(
	'contest-contestant-no' => 'Non',
	'contest-contestant-yes' => 'Oui',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 */
$messages['nl'] = array(
	'contest-toplink' => 'Mijn wedstrijden',
	'right-contestadmin' => 'Wedstrijden beheren',
	'right-contestparticipant' => 'Deelnemen aan wedstrijden',
	'group-contestadmin' => 'Wedstrijdbeheerders',
	'group-contestadmin-member' => '{{GENDER:$1|wedstrijdbeheerder}}',
	'grouppage-contestadmin' => 'Project:Wedstrijdbeheerders',
	'group-contestparticipant' => 'Wedstrijddeelnemers',
	'group-contestparticipant-member' => '{{GENDER:$1|wedstrijddeelnemer|wedstrijddeelneemster}}',
	'grouppage-contestparticipant' => 'Project:Wedstrijddeelnemers',
	'prefs-contest' => 'Wedstrijden',
	'contest-prefs-showtoplink' => 'Een verwijzing naar [[Special:MyContests|mijn wedstrijden]] weergeven in het bovenste menu.',
	'contest-status-draft' => 'Ontwerp (uitgeschakeld)',
	'contest-status-active' => 'Actief (ingeschakeld)',
	'contest-status-expired' => 'Verlopen (ingeschakeld, voorbij de einddatum)',
	'contest-status-finished' => 'Gedaan (uitgeschakeld)',
	'special-contest' => 'Een wedstrijd bekijken',
	'special-contests' => 'Wedstrijden beheren',
	'special-contestsignup' => 'Inschrijven voor een wedstrijd',
	'special-contestwelcome' => 'Een wedstrijd bekijken',
	'special-editcontest' => 'Een wedstrijd bewerken',
	'special-mycontests' => 'Mijn wedstrijden',
	'specialpages-group-contest' => 'Wedstrijden',
	'contest-nav-contests' => 'Lijst van wedstrijden',
	'contest-nav-editcontest' => 'Wedstrijd bewerken',
	'contest-nav-contest' => 'Samenvatting en deelnemers',
	'contest-special-addnew' => 'Een nieuwe wedstrijd toevoegen',
	'contest-special-newname' => 'Wedstrijdnaam',
	'contest-special-add' => 'Wedstrijd toevoegen',
	'contest-special-existing' => 'Bestaande wedstrijden',
	'contest-special-name' => 'Naam',
	'contest-special-status' => 'Status',
	'contest-special-submissioncount' => 'Aantal inzendingen',
	'contest-special-edit' => 'Bewerken',
	'contest-special-delete' => 'Verwijderen',
	'contest-special-confirm-delete' => 'Weet u zeker dat u deze wedstrijd wilt verwijderen?',
	'contest-special-delete-failed' => 'Fout bij het verwijderen van de wedstrijd.',
	'editcontest-text' => 'U bent een wedstrijd aan het bewerken.',
	'editcontest-legend' => 'Wedstrijd',
	'contest-edit-name' => 'Wedstrijdnaam',
	'contest-edit-status' => 'Status van de wedstrijd',
	'contest-edit-end' => 'Einde van wedstrijd',
	'contest-edit-exists-already' => 'Opmerking: u bent geen nieuwe wedstrijd aan het maken, maar een bestaande aan het bewerken.',
	'contest-edit-submit' => 'Opslaan',
	'contest-edit-challenges' => 'Wedstrijduitdagingen',
	'contest-edit-delete' => 'Uitdaging verwijderen',
	'contest-edit-add-first' => 'Een uitdaging toevoegen',
	'contest-edit-add-another' => 'Een andere uitdaging toevoegen',
	'contest-edit-confirm-delete' => 'Weet u zeker dat u deze uitdaging wilt verwijderen?',
	'contest-edit-challenge-title' => 'Uitdagingstitel',
	'contest-edit-challenge-text' => 'Uitdagingstekst',
	'contest-edit-challenge-oneline' => 'Korte beschrijving',
	'contest-welcome-unknown' => 'Er is geen wedstrijd met de opgegeven naam.',
	'contest-welcome-rules' => 'Om te kunnen deelnemen bent u verplicht akkoord te gaan met',
	'contest-welcome-rules-link' => 'de wedstrijdregels',
	'contest-welcome-signup' => 'Nu inschrijven',
	'contest-welcome-accept-challenge' => 'Uitdaging aanvaard',
	'contest-welcome-select-header' => 'Selecteer uw uitdaging:',
	'contest-signup-unknown' => 'Er is geen wedstrijd met de opgegeven naam.',
	'contest-signup-submit' => 'Inschrijven',
	'contest-signup-header' => 'Vul het formulier in om uw inschrijving voor $1 te voltooien.',
	'contest-signup-email' => 'Uw e-mailadres',
	'contest-signup-realname' => 'Uw echte naam',
	'contest-signup-cv' => 'Verwijzing naar uw CV',
	'contest-signup-readrules' => 'Ik bevestig dat ik [[$1|de wedstrijdregels]] heb gelezen en ermee akkoord ga',
	'contest-signup-challenge' => 'Welke uitdaging wilt u aangaan?',
	'contest-signup-finished' => 'Deze wedstrijd is afgelopen. Bedankt voor uw deelname!',
	'contest-signup-draft' => 'Deze wedstrijd is nog niet begonnen.',
	'contest-signup-country' => 'Uw land',
	'contest-signup-require-rules' => 'U moet akkoord gaan met de wedstrijdregels.',
	'contest-signup-require-country' => 'U moet het land waarin u verblijft opgeven.',
	'contest-signup-invalid-email' => 'Het e-mailadres dat u hebt opgegeven is niet geldig.',
	'contest-signup-invalid-name' => 'De naam die u hebt opgegeven is te kort.',
	'contest-signup-require-challenge' => 'U moet een uitdaging selecteren.',
	'contest-signup-invalid-cv' => 'U hebt een ongeldige URL ingevoerd.',
	'contest-contest-title' => 'Wedstrijd: $1',
	'contest-contest-name' => 'Naam',
	'contest-contest-status' => 'Status',
	'contest-contest-submissioncount' => 'Aantal deelnemers',
	'contest-contestant-challenge-name' => 'Naam van de uitdaging',
	'contest-contestant-volunteer' => 'Vrijwilliger',
	'contest-contestant-wmf' => 'WMF',
	'contest-contestant-no' => 'Nee',
	'contest-contestant-yes' => 'Ja',
	'contest-contestant-commentcount' => 'Opmerkingen',
	'contest-contestant-overallrating' => 'Waardering',
	'contest-contestant-rating' => '$1 ($2 {{PLURAL:$2|stem|stemmen}})',
	'contest-contestant-header-contest' => 'Wedstrijdnaam',
	'contest-contestant-header-challenge' => 'Naam van de uitdaging',
	'contest-contestant-header-wmf' => 'Geïnteresseerd in een job bij WMF',
	'contest-contestant-header-volunteer' => 'Geïnteresseerd in kansen als vrijwilliger',
	'contest-contestant-header-rating' => 'Waardering',
	'contest-contestant-header-comments' => 'Aantal opmerkingen',
	'contest-contestant-submission-url' => 'Inzending',
	'contest-contestant-notsubmitted' => 'Nog niet ingediend',
	'contest-contestant-comments' => 'Opmerkingen',
	'contest-contestant-submit' => 'Wijzigingen opslaan',
	'contest-contestant-comment-by' => 'Opmerking van $1',
	'contest-contestant-not-voted' => 'U hebt nog niet gestemd op deze deelnemer.',
	'contest-contestant-voted' => 'Uw huidige stem is $1.',
	'contest-email-reminder-title' => 'Nog maar $1 {{PLURAL:$1|dag|dagen}} tot het einde van deze uitdaging!',
	'contest-mycontests-toplink' => 'Mijn wedstrijden',
	'contest-mycontests-no-contests' => 'U neemt niet deel aan een wedstrijd.',
	'contest-mycontests-active-header' => 'Lopende wedstrijden',
	'contest-mycontests-active-text' => 'Dit zijn de wedstrijden waar u momenteel aan deelneemt.',
	'contest-mycontests-header-contest' => 'Wedstrijd',
	'contest-mycontests-header-challenge' => 'Uitdaging',
	'contest-mycontests-signup-success' => 'U bent ingeschreven voor deze wedstrijd.',
	'contest-mycontests-addition-success' => 'Uw inzending is ingediend! Bedankt voor uw deelname aan deze wedstrijd.',
	'contest-mycontests-updated-success' => 'Uw inzending is gewijzigd.',
	'contest-submission-submit' => 'Opslaan',
	'contest-submission-unknown' => 'Er is geen wedstrijd met de opgegeven naam.',
	'contest-submission-finished' => 'Deze wedstrijd is afgelopen. Bedankt voor uw deelname!',
	'contest-submission-submission' => 'Verwijzing naar uw inzending',
);

