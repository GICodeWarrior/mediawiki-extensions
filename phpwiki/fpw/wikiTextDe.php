<?
# ATTENTION:
# To fit your local settings, PLEASE edit wikiSettings.php and wikiLocalSettings.php ONLY!
# Change settings here ONLY if they're to become global in all wikipedias!

$wikiLanguage = "de" ;
include_once ( "utf8Case.php" ) ;

# This contains the strings for international/specialized wikis
#---------------------------------------------------------------

# Basic character set and locale settings
$wikiCharset = "iso-8859-1" ;
$wikiUpperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ���������������������������������";
$wikiLowerChars = "abcdefghijklmnopqrstuvwxyz���������������������������������";

# Misc stuff
$wikiMainPage = "Hauptseite" ; # This is actual the title of the article in the database
$wikiErrorPageTitle = "Verflixt! Ein Fehler!" ;
$wikiErrorMessage = "<h2>$1!</h2>Zur�ck zur [[:Hauptseite|Hauptseite]]!" ;
$wikiAllowedSpecialPages = array("userlogin","userlogout","newpages","recentchanges","upload","statistics","lonelypages","popularpages","wantedpages","allpages","randompage","shortpages","longpages","listusers","watchlist","special_pages","editusersettings","deletepage","movepage","protectpage","contributions","whatlinkshere","recentchangeslinked","sqldump","vote");
$wikiRecentChangesText = "Diese Seite wird beim Laden automatisch aktualisiert. Angezeigt werden Seiten, die zuletzt bearbeitet bzw. ge�ndert wurden, sowie die Zeit und der Name des Autors. Falls Du neu hier bist, dann schau Dir bitte die [[Wikipedia Willkommen|Willkommensseite]] der Wikipedia an, dort bekommst Du eine erste Einf�hrung. Falls Du willst, dass Wikipedia zu einem Erfolg wird, dann f�ge bitte keine Texte hinzu, die dem Urheberrecht anderer unterliegen. Dies k�nnte dem Projekt sonst schweren Schaden zuf�gen." ;
$wikiMetaDescription = "$1... Lesen Sie mehr hier auf Wikipedia, der freien Enzyklop�die!" ;

# Used in header/footer
$wikiWikipediaHelp = "wikipedia:Hilfe" ;
$wikiMainPageTitle = "Wikipedia : Die freie Enzyklop�die" ; # This is the title that is displayed on the main page
$wikiHeaderSubtitle = "Die freie Enzykolp�die" ;
$wikiArticleSubtitle = "Von Wikipedia, der freien Enzyklop�die." ;
$wikiPrintable = "Druckversion" ;
$wikiWatch = "Diesen Artikel f�r mich beobachten." ;
$wikiNoWatch = "Diesen Artikel nicht mehr f�r mich beobachten." ;
$wikiTitleTag = "$1: Enzykolp�dieartikel von Wikipedia" ;
$wikiLogIn = "Einloggen" ;
$wikiLogOut = "Ausloggen" ;
$wikiHelp = "Hilfe" ;
$wikiHelpLink = "wikipedia:Hilfe" ;
$wikiPreferences = "Einstellungen" ;
$wikiWhatLinksHere = "Was linkt hierhin" ;
$wikiPrintLinksMarkup = "i" ; # will be used as <$wikiPrintLinksMarkup> and </$wikiPrintLinksMarkup>
#$wikiAllowedNamespaces = array ( "wikipedia" , "diskussion" , "benutzer" , "" , "wikipedia diskussion" , "benutzer diskussion" ) ;
$wikiTalk = "diskussion" ;
$wikiUser = "benutzer" ;
$wikiNamespaceTalk = "$1 Diskussion" ;
$wikiWikipedia = "wikipedia" ;
$wikiAllowedNamespaces = array ( $wikiWikipedia , $wikiTalk , $wikiUser , "" , "wikipedia $wikiTalk" , "$wikiUser $wikiTalk" ) ;
$wikiSkins = array ( "Normal" => "" , "Star Trek" => "Star Trek" , "Nostalgie" => "Nostalgy" , "Cologne Blue" => "Cologne Blue" ) ;
$wikiMyOptions = "Meine Optionen" ;
$wikiMySettings = "Meine Einstellungen" ;
$wikiMyself = "Meine Seite" ;
$wikiShortPages = "Kurze Seiten" ;
$wikiLongPages = "Lange Seiten" ;
$wikiUserList = "Benutzerverzeichnis" ;
$wikiEditingHistory = "Revisionen" ;
$wikiAddToWatchlist = "Beobachten" ;
$wikiEditPage = "Jetzt bearbeiten" ;
$wikiHome = "Hauptseite" ;
$wikiAbout = "�ber" ;
$wikiFAQ = "FAQ" ;
$wikiPageInfo = "Seiteninformation" ;
$wikiLinkedPages = "Verlinkte Seiten" ;
$wikiShowDiff = "zeige Unterschiede" ;
$wikiRequests = "Anfragen: $1" ;
$wikiEdit = "Bearbeiten" ;
$wikiPageOptions = "Seitenoptionen" ;
$wikiBrowse = "Bl�ttern" ;
$wikiFind = "Finden" ;
$wikiOK = "OK" ;
$wikiFindMore = "Mehr finden";
$wikiWikipediaHome = "Hauptseite" ;
$wikiAboutWikipedia = "�ber Wikipedia" ;
$wikiAutoWikify = "Auto-wikifikation (umsichtig benutzen!)" ;
$wikiTopics = "Themen" ;
$wikiWikipediaFAQ = "wikipedia:FAQ" ;
$wikiVoteForPage = "Abstimmen" ;

# Editing
$wikiEditingHelp = "Hilfe zum Bearbeiten" ;
$wikiWikipediaEditingHelp = "wikipedia:Wie bearbeite ich einen Artikel" ;
$wikiEditTitle = "Bearbeiten von $1" ;
$wikiCannotEditPage = "<h3>Sie k�nnen diese Seite nicht bearbeiten!</h3>" ;
$wikiEditConflictMessage = "<h1>Edit conflict!</h1>\n<b>Jemand hat eine neue Version dieser Seite gespeichert, w�hrend Sie sie bearbeitet haben. Der obere Kasten enth�lt die aktuelle Version, der untere Ihre �nderungen. Nur der obere Text wird gespeichert werden!</b><br>\n" ;
$wikiPreviewAppend = "<hr>\n<h2>Voransicht :</h2>\n$1<hr><h3>Achtung: Dies ist nur eine Voransicht, der Text wurde noch nicht gespeichert!</h3>" ;
$wikiSummary = "Zusammenfassung:" ;
$wikiDescription = "Beschreibung:" ;
$wikiMinorEdit = "Es wurden nur Kleinigkeiten ver�ndert." ;
$wikiCopyrightNotice = "Bitte beachte, dass alle Beitr�ge zur Wikipedia unter der \"GNU Freie Dokumentationslizenz\" stehen. Falls Du nicht willst, dass Dein Geschriebenes von anderen ver�ndert und weiterverbreitet wird, dann solltest Du nicht auf \"Speichern\" dr�cken. Du gibst uns au�erdem Deine Zusage, dass Du den Text selbst verfasst hast, oder es von einer Quelle kopiert hast, die sich in �ffentlichem Besitz befindet (public domain). <b>BENUTZE KEINE URHEBERRECHTLICH GESCH�TZTEN WERKE OHNE ERLAUBNIS DES AUTORS!</b>";
$wikiSave = "Speichern" ;
$wikiPreview = "Vorschau" ;
$wikiReset = "Zur�cksetzten" ;
$wikiDontSaveChanges = "<i>Abbrechen</i>" ;
$wikiDescribePage = "Beschreibe hier die neue Seite." ;

# wikiUser
$wikiNoSuchUser = "<font color=red>Unbekannter Benutzer '$1'!</font>" ;
$wikiWrongPassword = "<font color=red>Falsches Passwort f�r Benutzer '$1'!</font>" ;
$wikiYouAreLoggedIn = "$1, sie sind eingeloggt!" ; 
$wikiUserError = "Problem mit '$1'" ;

# wikiPage
$wikiNoSuchSpecialPage = "<h1>Es gibt keine Spezielle Seite \"$1\"!</h1>" ;
$wikiOldVersion = "<br><font size=\"-1\">Dies ist die alte Version #$1; die aktuelle Version befindet sich <a href=\"$THESCRIPT?title=$2\">hier</a></font>" ;
$wikiRedirectFrom = "(weitergeleitet von $1)" ;
$wikiRecentChanges = "Letzte �nderungen" ;
$wikiRecentChangesLink = "RecentChanges" ; # "special:" is added automatically
$wikiRecentLinked = "Ge�nderte Verweise" ;
$wikiRecentLinkedLink = "Recentchangeslinked" ;
$wikiSpecialPagesLink = "Special_pages" ; # "special:" is added automatically
$wikiEditThisPage = "Jetzt bearbeiten" ;
$wikiMoveThisPage = "Seite veschieben" ;
$wikiDeleteThisPage = "Seite l�schen" ;
$wikiUpload = "Dateien hochladen" ;
$wikiHistory = "Revisionen" ;
$wikiRandomPage = "Zuf�llige Seite" ;
$wikiSpecialPages = "Spezielle Seiten" ;
$wikiEditHelp = "<i>Hilfe zum Bearbeiten</i>" ;
$wikiEditHelpLink = "wikipedia:Wie_bearbeite_ich_einen_Artikel" ;
$wikiStatistics = "Statistik" ;
$wikiNewPages = "Neue Seiten" ;
$wikiOrphans = "Verwaiste Seiten" ;
$wikiMostWanted = "Gew�nschte Seiten" ;
$wikiAllPages = "Alle Seiten" ;
$wikiStubs = "Kurze Seiten" ;
$wikiLongPages = "Lange Seiten" ;
$wikiListUsers = "Benutzerverzeichnis" ;
$wikiMyWatchlist = "Meine watchlist" ;
$wikiBeginDiff = "ANFANG DER UNTERSCHIEDE" ;
$wikiEndDiff = "ENDE DER UNTERSCHIEDE" ;
$wikiDiffLegend = "<font color=#2AAA2A>Text in Gr�n</font> wurde hinzugef�gt oder ver�ndert, <font color=#AAAA00>Text in Gelb</font> wurde ver�ndert oder gel�scht." ;
$wikiDiffFirstVersion = "Dies ist die erste Revision dieses Artikels. Der Text ist komplett neu!<br>\n" ;
$wikiDiffImpossible = "Dies ist die erste Revision dieses Artikels. Der Text ist komplett neu!<br>\n" ;
$wikiSearch = "Suchen" ;
$wikiOtherNamespaces = "<b>Andere Namensr�ume :</b> " ;
$wikiCategories = "<b>Kategorien :</b> " ;
$wikiThisCategory = "Artikel in dieser Kategorie" ;
$wikiCounter = "Auf diese Seite wurde $1mal zugegriffen." ;
$wikiBlockIPTitle = "IP-Adresse blockieren (nur f�r Systemadministratoren)" ;
$wikiBlockIPText = "IP $1 wurde von $2 blockiert" ;
$wikiIPblocked = "<font color=red size='+1'>Ihre IP-Adresse wurde blockiert! Ihre �nderungen werden nicht gespeichert werden. Bitte kontaktieren die einen Systemadministrator, um die Blockierung aufzuheben, oder versuchen Sie es sp�ter noch einmal.</font>" ;
$wikiBugReports = "Beobachtere Fehler" ;
$wikiBugReportsLink = "wikipedia:Beobachtete Fehler" ;
$wikiPrintFooter = "<hr>Dieser Artikel stammt von <b>Wikipedia</b> (<a href=\"$1\">$1</a>), der freien Online-Enzylop�die. Sie k�nnen diesen Artikel online finden unter <a href=\"$2\">$2</a>" ;

# Interwiki links
$wikiInterwiki = array ( "w"=>"http://www.wikipedia.com/wiki/$1" , "m"=>"http://meta.wikipedia.com/wiki.phtml?title=$1" ) ;

# Language interwiki links
$wikiOtherLanguages = array (
    "ar"=>"http://ar.wikipedia.com/wiki.cgi?$1" ,
    "ca"=>"http://ca.wikipedia.com/wiki.cgi?$1" ,
    "zh"=>"http://zh.wikipedia.com/wiki.cgi?$1" ,
    "dk"=>"http://dk.wikipedia.com/wiki.cgi?$1" ,
    "nl"=>"http://nl.wikipedia.com/wiki.cgi?$1" ,
    "de"=>"http://de.wikipedia.com/wiki.cgi?$1" ,
    "eo"=>"http://eo.wikipedia.com/wiki/$1" ,
    "fr"=>"http://fr.wikipedia.com/wiki.cgi?$1" ,
    "he"=>"http://he.wikipedia.com/wiki.cgi?$1" ,
    "hu"=>"http://hu.wikipedia.com/wiki.cgi?$1" ,
    "it"=>"http://it.wikipedia.com/wiki.cgi?$1" ,
    "ja"=>"http://ja.wikipedia.com/wiki/$1" ,
    "pl"=>"http://pl.wikipedia.com/wiki.cgi?$1" ,
    "pt"=>"http://pt.wikipedia.com/wiki.cgi?$1" ,
    "ru"=>"http://ru.wikipedia.com/wiki.cgi?$1" ,
    "simple"=>"http://simple.wikipedia.com/wiki.cgi?$1" ,
    "es"=>"http://es.wikipedia.com/wiki.cgi?$1" ,
    "sv"=>"http://sv.wikipedia.com/wiki.cgi?$1" ,
    "en"=>"http://www.wikipedia.com/wiki/$1"
    ) ;

# Language interwiki names
$wikiLanguageNames = array (
#    "ar"=>"Arabic (Araby)" ,
#    "ca"=>"Catalan (Catala)" ,
#    "zh"=>"Chinese (Hanyu)" ,
#    "dk"=>"Danish (Dansk)" ,
#    "nl"=>"Dutch (Nederlands)" ,
#    "de"=>"German (Deutsch)" ,
#    "eo"=>"Esperanto" ,
#    "fr"=>"French (Francais)" ,
#    "he"=>"Hebrew (Ivrit)" ,
#    "hu"=>"Hungarian (Magyar)" ,
#    "it"=>"Italian (Italiano)" ,
#    "ja"=>"Japanese (Nihongo)" ,
#    "pl"=>"Polish (Polska)" ,
#    "pt"=>"Portuguese (Portuguese)" ,
#    "ru"=>"Russian (Russkiy)" ,
#    "simple"=>"Simplified English" ,
#    "es"=>"Spanish (Castellano)" ,
#    "sv"=>"Swedish (Svenska)" ,
#    "en"=>"English"
	"af" => "Afrikaans",
	"ar" => "Araby",
	"es" => "Castellano",
	"ca" => "Catal&agrave;",
	"sh" => "Croatoserbian",
	"dk" => "Dansk",
	"de" => "Deutsch",
	"en" => "English",
	"simple" => "English (simplified)",
	"eu" => "Euskara",
	"fr" => "Fran&ccedil;ais",
	"zh" => "Hanyu",
	"ia" => "Interlingua",
	"it" => "Italiano",
	"he" => "Ivrit",
	"hu" => "Magyar",
	"nl" => "Nederlands",
	"ja" => "Nihongo",
	"no" => "Norsk",
	"pl" => "Polska",
	"pt" => "Portugu&ecirc;s",
	"ru" => "Russkiy",
	"sv" => "Svensk",
	"vo" => "Volap&uuml;k"
    ) ;
$wikiOtherLanguagesText = "Andere Sprachen : $1" ;

# date
$wikiDate = array () ;
$wikiDate["monday"] = "Montag" ;
$wikiDate["tuesday"] = "Dienstag" ;
$wikiDate["wednesday"] = "Mittwoch" ;
$wikiDate["thursday"] = "Donnerstag" ;
$wikiDate["friday"] = "Freitag" ;
$wikiDate["saturday"] = "Sonnabend" ;
$wikiDate["sunday"] = "Sontag" ;
$wikiDate["january"] = "Januar" ;
$wikiDate["february"] = "Februar" ;
$wikiDate["march"] = "M�rz" ;
$wikiDate["april"] = "April" ;
$wikiDate["may"] = "Mai" ;
$wikiDate["june"] = "Juni" ;
$wikiDate["july"] = "Juli" ;
$wikiDate["august"] = "August" ;
$wikiDate["september"] = "September" ;
$wikiDate["october"] = "Oktober" ;
$wikiDate["november"] = "November" ;
$wikiDate["december"] = "Dezember" ;

#-----------------------------------------------------------------------
## strings for specialFunctions.php

# Moving
$wikiMoveRedirectMessage = "Verschoben nach $1" ;
$wikiMoveMoved = "$1 wurde erfolgreich nach $2 verschoben." ;
$wikiMoveRedirected = " EIne Weiterleitung wurde erzeugt." ;
$wikiMoveWarning = "<font color=red><b>'$1' existiert bereits! Bitte w�hlen Sie einen anderen Namen.</b></font><br><br>\n" ;
$wikiMoveForm = "
<h2>Sie sind dabei, '$1' und alle Revisionen zu einem neuen Titel zu verschieben.</h2>\n
<FORM method=post>\n
Neuer Titel : <INPUT type=text value='$2' name=newname size=40 maxlength=250><br><br>\n
<INPUT type=checkbox$3 name=doredirect>Eine Weiterleitung von '$1' zum neuen Titel generieren<br><br>\n
<INPUT type=submit name=doit value='Verschieben'>\n
</FORM>\n" ;

# Log out / log in
$wikiGoodbye = "<h1>Bis bald, $1!</h1>" ;
$wikiWelcomeCreation = "<h1>Willkommen, $1!</h1><font color=red>Vergessen Sie nicht, Ihre pers�nlichen Einstellungen anzupassen!</font><br>Ihr Benutzerkonto wurde erzeugt. Bitte klicken Sie auf \"Einloggen\", um endg�ltig einzuloggen!" ; ;
$wikiLoginPageTitle = "Einloggen" ;
$wikiYourName = "Ihr Benutzername&nbsp; : " ;
$wikiYourPassword = "Ihr Passwort&nbsp; : " ;
$wikiYourPasswordAgain = "Passwort (erneut) : " ;
$wikiNewUsersOnly = " (nur neue Benutzer)" ;
$wikiRememberMyPassword = "Mein Passwort als Cookie speichern." ;
$wikiLoginProblem = "<b>Es gab ein Problem beim Einloggen.</b><br>Bitte versuchen Sie es noch einmal!" ;
$wikiAlreadyLoggedIn = "<font color=red><b>$1, Sie sind bereits eingeloggt!</b></font><br>\n" ;
$wikiPleaseLogIn = "<h1>Bitte einloggen:</h1>\n" ;
$wikiAreYouNew = "Wenn Sie neu bei EIkipedia sind und ein Benutzerkonto m�chten, geben Sie bitte einen Benutzernamen und ein Passwort ein. Wiederholen Sie das Passwort.
Die Angabe einer email-Adresse ist freiwillig; falls Sie Ihr Passwort verlieren, kann Ihnen ein neues zu dieser Adresse geschickt werden.<br>\n" ;
$wikiLogIn = "Einloggen" ;
$wikiCreateAccount = "Ein neues Benutzerkonto anlegen" ;

# User preferences
$wikiUserSettings = "Benutzereinstellungen" ;
$wikiUserSettingsError = "Sie sind nicht eingeloggt! [[special:userLogin|Loggen Sie sich ein]] oder gehen sie zur [[:Hauptseite|Hauptseite]]" ;
$wikiUserSettingsNewPasswordError = "<h1><font color=red>Die beiden Passw�rter sind verschieden. DAS PASSWORT WURDE NICHT GE�NDERT!</font></h1>\n" ;
$wikiUserSettingsSaved = "<font color=red size=\"+1\">Ihre Einstellungen wurden gespeichert!</font>" ;
$wikiLoggedInAs = "<b>Sie sind eingeloggt als [[benutzer:$1|$1]]. ";
$wikiID_Help = "Ihre interne ID ist $1.</b> [[wikipedia:Hilfe/Benutzereinstellungen|Hier]] werden Sie geholfen :)" ;
$wikiQuickBarSettings = "Seitenleiste :" ;
$wikiSettingsStandard = "Standard" ;
$wikiSettingsNone = "Keine" ;
$wikiSettingsLeft = "Links" ;
$wikiSettingsRight = "Rechts" ;
$wikiOldPassword = "Altes Passwort&nbsp; &nbsp; : " ;
$wikiNewPassword = "Neues Passwort&nbsp; &nbsp; : " ;
$wikiSkin = "Skin :" ;
$wikiStarTrek = "Star Trek" ;
$wikiShowHoverBox = "Schwebender Titel �ber Wikipedia-Verweisen" ;
$wikiUnderlineLinks = "Verweise unterstreichen" ;
$wikiNewTopicsRed = "Nicht existierende Themen in Rot zeigen" ;
$wikiJustifyParagraphs = "B�ndige Abs�tze" ;
$wikiShowRecentChangesTable = "<i>Letzte �nderungen</i> als Tabelle zeigen" ;
$wikiHideMinorEdits = "Kleinere �nderungen nicht in den <i>letzten �nderungen</i> anzeigen" ;
$wikiDoNumberHeadings = "�berschriften automatisch nummerieren" ;
$wikiViewWithFrames = "Seiten als Frames anzeigen <i>(experimentell, NUR im Linux-Konqueror!)</i>" ;
$wikiTurnedOn = "ja" ;
$wikiTurnedOff = "nein" ;
$wikiTextboxDimensions = "Gr��e des Textrahmens beim Bearbeiten :" ;
$wikiCols = "Spalten : " ;
$wikiRows = "Zeilen&nbsp; : " ;
$wikiYourEmail = "Ihre email : " ;
$wikiResultsPerPage = "Bis zu $1 Suchergebnisse pro Seite anzeigen" ;
$wikiTimeDiff = "Zeitunterschied zum Server : $1 Stunden" ;
$wikiViewRecentChanges = "Die letzten $1 ''letzten �nderungen'' anzeigen" ;
$wikiOutputEncoding = "Ausgabeeinstellungen : ";

# Search Page
$wikiSearchTitle = "Suche" ;
$wikiSearchedVoid = "Da Sie nach nichts gesucht haben, haben Sie nichts gefunden." ;
$wikiNoSearchResult = "Es wurden keine Artikel mit \"$1\" im Titel oder Text gefunden." ;
$wikiSearchHelp = "Bitte beachten Sie den [[wikipedia:Suchen|Hilfstext zum Suchen]]." ;
$wikiFoundHeading = "Artikel im der deutschen Wikipedia" ;
$wikiFoundText = "Die Anfrage ''$2'' ergab $1 Artikel. F�r jeden dieser Artikel sehen Sie den ersten Absatz und einen Absatz, der mindestens einen der Suchbegriffe enth�lt." ;
# keywords used for boolean search operators
# note: these must consist of character, no symbols allowed
$and = "und";
$or = "oder";
$not = "nicht";
# syntax errors for parser of boolean search queries
$srchSyntErr = array (
                    "SYNTAXFEHLER: fehlendes '$1'; eingef�gt",
                    "SYNTAXFEHLER: unerwartetes '$1'; ignoriert",
                    "SYNTAXFEHLER: nicht erlaubtes Symbol '$1'; ignoriert",
                    "SYNTAXFEHLER: das Wort '$1' ist zu kurz, der Index enth�lt nur Worte ab $2 Zeichen L�nge",
                    "SYNTAXFEHLER: fehlendes Suchwort; eingef�gt"
               ) ;   
$wikiSearchError = "Entschuldigung, Ihre Suchanfrage enthielt die folgenden Fehler : " ;

# Misc
$wikiLonelyPagesTitle = "Verwaiste Artikel" ;
$wikiLonelyPagesText = "'''Diese Artikel existieren, aber kein anderer Artikel verweist auf sie!'''<br>''Diskussionsseiten, leere Seiten und #REDIRECT-Seiten werden hier '''nicht''' angezeigt.''\n\n" ;
$wikiAllPagesTitle = "Alle Seiten" ;
$wikiAllPagesText = "'''Dies sind alle Seiten in der Datenbank!'''\n\n" ;
$wikiUnsuccessfulSearch = "Ergebnislose Suche nach '$1'" ;
$wikiUnsuccessfulSearches = "wikipedia:Ergebnislose Suchanfragen ($1)" ; # $1 becomes "YEAR-MONTH"
$wikiUserlistTitle = "Benutzerverzeichnis" ;
$wikiUserlistText = "'''Dies sind alle eingetragenen Benutzer der deutschen Wikipedia!'''" ;
$wikiRecentChangesTitle = "Letzte �nderungen" ;
$wikiRecentChangesLastDays = "Dies sind die letzten <b>$1</b> �nderungen, die in den letzten <b>$2</b> Tagen hier gemacht wurden." ;
$wikiRecentChangesSince = "Dies sind die letzten <b>$1</b> �nderungen seit dem <b>$2</b>." ;
$wikiEditTypes = array ( "0"=>"" , "1"=>"<font color=cyan>K</font>" , "2"=>"<font color=green>N</font>" ) ; #Abbreviations for minor edits (1) and new pages (2) to be used on RecentChanges
$wikiViewLastDays = "Zeige die letzten $1 Tage an" ;
$wikiViewMaxNum = "Zeige die letzten $1 �nderungen an" ;
$wikiListOnlyNewChanges = "Nur neue �nderungen zeigen" ;
$wikiNewPagesTitle = "Neue Seiten" ;
$wikiNewPagesText = "Dies sind die letzten <b>$1</b> neuen Seiten, die in den letzten <b>$2</b> Tagen erstellt wurden." ;
$wikiRCLegend = " <b>Legende :</b> $1=Kleine �nderung ; $2=Neuer Artikel." ;
$wikiDiff = "(Unterschiede)" ;
$wikiChange = "�nderung" ;
$wikiChanges = "�nderungen" ;
$wikiWatchYes = "\"$1\" wurde zu Ihrer [[special:WatchList|watchlist]] hinzugef�gt." ;
$wikiWatchNo = "\"$1\" wurde von Ihrer [[special:WatchList|watch list]] entfernt." ;
$wikiWatchlistTitle = "Watchlist" ;
$wikiWatchlistExistText = "'''Im Moment beobachtet das System die folgenden Artikel f�r Sie :'''" ;
$wikiWatchlistNotExistText = "'''Im Moment beobachten Sie die folgenden nichtexistierenden Artikel :'''" ;

# Statistics
$wikiStatisticsTitle = "Artikelstatistik" ;
$wikiStatTotalPages = "Es gibt $1 Seiten in der Datenbank." ;
$wikiStatTalkPages = "Es gibt $1 Diskussions-Seiten." ;
$wikiStatCommaPages = "Es gibt $1 Seiten, die ein Komma enthalten und ''keine'' '''Diskussion'''s-Seiten sind." ;
$wikiStatWikipediaNoTalk = "Es gibt $1 Seiten, die \"ikipedi\" im Titel haben und ''keine'' '''Diskussion'''s-Seiten sind." ;
$wikiStatSubNoTalk = "Es gibt $1 Unterseiten, die ''keine'' '''Diskussion'''s-Seiten sind." ;
$wikiStatNoTalk = "Das heisst, es gibt ca. $1 Artikel, Unterseiten eingeschlossen." ;
$wikiStatArticles = "Oder, es gibt ca. $1 Artikel (ohne Unterseiten)!" ;
$wikiStatRedirect = "Es gibt etwa $1 #REDIRECT-Seiten." ;
$wikiStatSkin = "<font color=red>$1</font> von ihnen benutzen das \"$2\"-Skin." ;
$wikiStatJunk = "Schliesslich gibt es etwa $1 Schrottseiten :-(" ;
$wikiStatOld = "Und, es gibt $1 alte Versionen von Artikel in der Datenbank, oder etwa $2 alte auf eine aktuelle Seite." ;
$wikiUserStatistics = "Benutzerstatistik" ;
$wikiStatUsers = "Es gibt $1 [[special:ListUsers|eingetragene Benutzer]]." ;
$wikiStatSysops = "$1 von ihnen sind Systemadministratoren." ;

# Upload
$wikiUploadTitle = "Auf dieser Seite k�nnen Sie Dateien ins System hochladen" ;
$wikiUploadDenied = "Sie sind weder ein Systemadministrator noch ein Editor. Kehren sie zur <a href=\"$THESCRIPT?action=upload\">Upload-Seite</a> zur�ck." ;
$wikiUploadDeleted = "Datei <b>$1</b> wurde gel�scht!" ;
$wikiUploadDelMsg1 = "*Benutzer [[user:$1|$1]] hat die Datei '''$2''' gel�scht ($3)\n" ;
$wikiUploadDelMsg2 = "'$1' wurde gel�scht" ;
$wikiUploadAffirm = "<nowiki>Sie m�ssen angeben, dass diese Datei kein Copyright verletzt. Kehren Sie zur <a href=\"$THESCRIPT?title=special:upload\">Upload-Seite</a> zur�ck</nowiki>" ;
$wikiUploadRestrictions = "<nowiki>Um eine Datei hichzuladen, m�ssen Sie sich einloggen!</nowiki>" ;
$wikiUploadFull = "Die Platte ist voll :(" ;
$wikiUploadSuccess = "Die Datei <b>$1</b> wurde erfolgreich hochgeladen!" ;
$wikiUploadSuccess1 = "*Benutzer $2 hat die Datei '''$3'''$4 hochgeladen ($1)\n" ;
$wikiUploadSuccess2 = "Datei '$1' wurde hochgeladen" ;
$wikiUploadText = "<h2>Anleitung:</h2><ul>\n" ;
$wikiUploadText .= "<li><strong>Benutzen Sie dieses Formular, um Dateien hochzuladen</strong></li>\n";
$wikiUploadText .= "<li>Um eine alte Datei zu ersetzen, k�nnen Sie einfach eine\n";
$wikiUploadText .= "neue Datei mit dem selben Namen hochladen.\n";
$wikiUploadText .= "<li><strong>Und so funktioniert es. </strong>Click\n";
$wikiUploadText .= "&quot;Finden...&quot; Sie die Datei auf ihrer Festpolatte \n";
$wikiUploadText .= "in einem Dateidialog.</li>\n";
$wikiUploadText .= "<li>Klicken Sie dann auf &quot;�ffnen.&quot;\n";
$wikiUploadText .= "<li>Vergessen Sie nicht, das Copyright zu best�tigen!</li>\n";
$wikiUploadText .= "<li>Klicken SIe dann aud &quot;Hochladen.&quot; Das kann eine Weile dauern.</li>\n";
$wikiUploadText .= "<li>Das System wird das erfolgreiche Hochladen best�tigen.</li>\n";
$wikiUploadText .= "<li>Sie k�nnen so viele Dateien hochladen wie Sie wollen.</li>\n";
$wikiUploadText .= "<li>Jedes Hochladen und L�schen wird im <a href=\"$THESCRIPT?title=Log:Uploads\">Uploads-Log</a> vermerkt.</li>\n";
$wikiUploadText .= "</ul>\n";
$wikiUploadAffirmText = "Hiermit best�tige ich, dass diese Datei <b>keinem Copyright unterliegt</b>, oder dass ich das Copyright f�r diese Datei besitzt und diese hiermit unter GFDL-Lizenz stelle." ;
$wikiUploadButton = "Hochladen" ;
$wikiUploadPrev = "Bereits hochgeladene Dateien:" ;
$wikiUploadSize = "Gr��e (byte)" ;
$wikiFileRemoval = "Datei l�schen" ;
$wikiUploadRemove = "Hier klicken, um $1 zu l�schen." ;


# Misc
$wikiHistoryTitle = "Revisionen von $1" ;
$wikiHistoryHeader = "Dies sind alle Revisionen von <a href=\"$THESCRIPT?title=$1\">$2</a>" ;
$wikiCurrentVersion = "aktuell" ;
$wikiSpecialTitle = "Spezielle Seiten" ;
$wikiSpecialText = "<b>Dies ist eine Liste spezieller Seiten.</b> Einige von ihnen stehen nur eingeloggten Benutzern zur Verf�gung. Wenn Sie eingeloggt sind, k�nnen Sie einen Teil dieser Liste stets als Seitenleiste eingeblendet lassen.<br><br>" ;
$wikiStubTitle = "Kurze Artikel" ;
$wikiLongPagesTitle = "Die l�ngsten Artikel" ;
$wikiStubText = "'''Dies sind alle Artikel in der Datenbank, sortiert nach L�nge, mit den k�rzesten zuerst.'''<br>''Weitergeleitete (#REDIRECTed) Seiten und Seiten in Namensr�umen (z.B. Diskussion:) werden hier '''nicht''' angezeigt!''\n\n" ;
$wikiLongPagesText = "'''Dies sind alle Artikel in der Datenbank, sortiert nach L�nge, mit den l�ngsten zuerst.'''<br>''Weitergeleitete (#REDIRECTed) Seiten und Seiten in Namensr�umen (z.B. Diskussion:) werden hier '''nicht''' angezeigt!''\n\n" ;
$wikiStubChars = "$1 Zeichen" ;
$wikiAskSQL = "MySQL-Zugang" ;
$wikiAskSQLtext = "Diese Funktion ist nur f�r Systemadministratoren zug�nglich.<br>''Bitte nicht Eingabe dr�cken, '''immer''' nur mit der Maus auf den Knopf klicken!''" ;
$wikiSQLSafetyMessage = "Da Sie keinen Entwicklerstatus haben, k�nnen Sie nur SELECT-Kommandos ausf�hren." ;
$wikiStubDelete = "<b>Diese Seite l�schen!</b>" ;
$wikiStubLinkHere = "$1 Artikel verweisen auf diesen." ;
$wikiStubShowLinks = "Die \"Verweisanzeige\" umschalten" ;
$wikiShowLinks = "Zeige Seiten, die nach \"$1\" verweisen" ;
$wikiRecentChangesLinkedTitle = "Die letzten �nderungen auf Seiten, zu denen '$1' verweist" ;
$wikiDeleteTitle = "L�schen des Artikels '$1'" ;
$wikiDeleteDenied = "<font size=\"+3\">Sie sind nicht berechtigt, diese Seite zu l�schen!</font>" ;
$wikiDeleteSuccess = "'$1' wurde gel�scht." ;
$wikiDeleteMsg1 = "*[[user:$2|$2]] hat die Seite '''$3''' permanent gel�scht ($1)\n" ;
$wikiDeleteMsg2 = "Permanente L�schung von '$1'" ;
$wikiDeleteAsk = "Sie sind dabei, den Artikel \"$1\" und alle seine Revisionen zu l�schen!<br>\nWenn Sie genau wissen, was Sie tun, klicken Sie bitte <a href=\"$2&iamsure=yes\">hier</a>." ;
$wikiProtectTitle = "Sch�tzen des Artikels '$1'" ;
$wikiProtectDenied = "<font size=\"+3\">Sie sind nicht berechtigt, diese Seite zu sch�tzen!</font>" ;
$wikiProtectNow = "Die Seite '$1' ist nun gesch�tzt ($2)." ;
$wikiProtectText = "<font size=\"+2\">Sie k�nnen nun die Seite '$1' sch�tzen</font><br><i>Zum Bleistift, \"is_sysop\" wird verhindern, dass jemand anderes als ein Systemadministrator diese Seite �ndert. Mehrere Berechtigungen werden durch \",\" getrennt.</i>" ;
$wikiProtectCurrent = "Gegenw�rtiger Schutz : " ;
$wikiContribTitle = "Beitr�ge von $1" ;
$wikiContribText = "<h1>Beitr�ge von $1' :</h1>\n(Ausnahmen: Kleine Ver�nderungen sowie ''Disskussion'' und ''Log''-Seiten)" ;
$wikiContribDenied = "Geben Sie einen Benutzernamen an!" ;
$wikiLinkhereTitle = "Seiten, die nach '$1' verweisen" ;
$wikiLinkhereBacklink = "[[$1]] verweist zur�ck auf diese Artikel:" ;
$wikiLinkhereNoBacklink = "[[$1]] verweist ''nicht'' zur�ck auf diese Artikel:" ;
$wikiBacklinkNolink = "Es gibt keine Artikel, die nach [[$1]] verweisen!" ;
$wikiBacklinkFollowing = "Die folgenden Artikel verweisen auf [[$1]]:" ;
$wikiWantedTitle = "Die am meisten gew�nschten Seiten" ;
$wikiWantedText = "'''Diese Artikel existieren noch nicht, aber andere Artikel verweisen auf sie!''' (die \"Top 50\")<br>\n" ;
$wikiWantedToggleNumbers = "Hier klicken, um die Anzeige von Artikeln, die mit Ziffern beginnen, umzuschalten (momentan $1)" ;
$wikiWantedLine = "<b>$2</b> Artikel verweisen auf $1 <nowiki>(<a href=\"$3\">diese Seiten verweisen auf \"$4\"</a></nowiki>)" ;
$wikiLastChange = "Letzte �nderung: $1" ;
$wikiLastChangeCologne = "Letzte �nderung dieser Seite: $1" ;
$wikiShowLastChange = "Die letzten �nderungen" ;
$wikiProtectThisPage = "Diese Seite sch�tzen" ;
$wikiPopularPages = "Popul�re Seiten" ;
$wikiPopularTitle = "Die popul�rsten Seiten" ;
$wikiRefreshThisPage = "Seite neu laden" ;
$wikiResourcesWarning = "(Bitte nur, wenn notwendig, da diese Funktion viel Rechenkapazit�t ben�tigt)" ;
$wikiNoRefresh = "(Diese Seite wurde erst von $1 Minuten aufrefrischt; bitte warten sie noch $2 Minuten und versuchen Sie es dann erneut.)" ;
$wikiLastRefreshed = "Zuletzt aufgefrischt: $1" ;
$wikiValidate = "Den HTML-Code dieser Seite �berpr�fen" ;
$wikiBlockIP = "Diese IP-Adresse blockieren" ;
$wikiNostalgy = "Nostalgie" ;
$wikiCologneBlue = "Cologne Blue" ;
$wikiUndiff = "Unterschiede ausblenden" ;
$wikiReadOnlyText = "Diese Kopie von Wikipedia ist nur zum Lesen gedacht. Selbstverst�ndlich k�nnen Sie diesen Artikel in der <a href=\"http://de.wikipedia.com/wiki/$1&action=edit\">deutschen Wikipedia</a> bearbeiten!" ;

# Vote
$wikiVoteReason = "Grund f�r diese Stimme : " ;
$wikiVoteBecause = ", denn : <i>$1</i>" ;
$wikiVoteMessage = "Stimme von $1 f�r $2" ;
$wikiVoteWarn = "<font size=+2>Sie haben nicht gesagt, wof�r Sie stimmen m�chten! <a href=\"$1\">Nochmal versuchen</a>.</font>" ;
$wikiVotes = array ( "deletion"=>"Stimmen f�r 'L�schen'" , "rewrite"=>"Stimmen f�r 'Neu Schreiben'" , "wikify"=>"Stimmen f�r 'wikifizieren'" , "NPOV"=>"Stimmen f�r 'NPOV'" , "aotd"=>"Stimmen f�r 'Artikel des Tages'" ) ;
$wikiVoteAdded = "<font size=+2>$1 wurde zu <a href=\"$2\">$3</a> hinzugef�gt!</font>" ;
$wikiVoteError = "<font size=+2>Hier ist was richtig schiefgelaufen!</font>" ;
$wikiVoteChoices = "
<input type=radio value=delete name=voted>l�schen<br>
<input type=radio value=rewrite name=voted>neu schreiben<br>
<input type=radio value=NPOV name=voted>NPOV<br>
<input type=radio value=wikify name=voted>wikifizieren<br>
<input type=radio value=aotd name=voted>Artikel des Tages<br><br>
Grund f�r diese Stimme : <input type=text value=\"\" name=CommentBox size=20> <input type=submit value=\"Vote\" name=doVote>
" ;




#---------------------------
#Functions
function wikiGetDateDe ( $x ) { # Used in RecentChangesLayout in special_functions.php
    global $wikiDate ;
    $dayName = $wikiDate [ strtolower ( date ( "l" , $x ) ) ];
    $monthName = $wikiDate [ strtolower ( date ( "F" , $x ) ) ];
    $dayNumber = date ( "j" , $x ) ;
    $year = date ( "Y" , $x ) ;
    return "$dayName, $dayNumber. $monthName, $year" ;
    }
function wikiGetBriefDateDe () { #Brief date for link in sidebar
    global $wikiDate ;
    $monthName = $wikiDate [ strtolower ( date ( "F" ) ) ];
    $dayNumber = date ( "j" ) ;
    $year = date ( "Y" ) ;
    return "$dayNumber. $monthName, $year" ;
    }
$wikiGetDate = 'wikiGetDateDe';
$wikiGetBriefDate = 'wikiGetBriefDateDe' ;

# In theory, this could be expanded to allow general conversion of the
# character encoding used in the database to another encoding optionally
# used on the browser end.

# Define these arrays if you need to set up conversion.
# $wikiEncodingCharsets = array("iso-8859-1");
# $wikiEncodingNames = array("Latin-1"); # Localised names

function wikiRecodeOutputDe($text) {
  # Stub
  # global $user;  # $user->options["encoding"] is an index into the above arrays
  return $text;
}

function wikiRecodeInputDe($text) {
  # Stub
  return $text;
}

$wikiRecodeOutput = 'wikiRecodeOutputDe';
$wikiRecodeInput = 'wikiRecodeInputDe';
?>
