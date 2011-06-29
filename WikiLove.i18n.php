<?php
/**
 * Internationalisation for WikiLove extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Ryan Kaldari, Jan Paul Posma
 */
$messages['en'] = array(
	'wikilove-desc' => 'Adds an interface for facilitating positive user feedback to user talk pages',
	'wikilove' => 'WikiLove',
	'wikilove-enable-preference' => 'Enable showing appreciation for other users with the WikiLove tab (experimental)',
	'wikilove-tab-text' => 'WikiLove',
	'tooltip-ca-wikilove' => 'Post a message for this user showing your appreciation',
	'wikilove-dialog-title' => 'WikiLove – Send a message of appreciation to another user',
	'wikilove-select-type' => 'Select type',
	'wikilove-get-started-header' => "Let's get started!",
	'wikilove-get-started-list-1' => 'Select the type of WikiLove you wish to send',
	'wikilove-get-started-list-2' => 'Add details to your WikiLove',
	'wikilove-get-started-list-3' => 'Send your WikiLove!',
	'wikilove-add-details' => 'Add details',
	'wikilove-image' => 'Enter an image filename:',
	'wikilove-select-image' => 'Select an image:',
	'wikilove-header' => 'Enter a header:',
	'wikilove-title' => 'Enter an award title:',
	'wikilove-enter-message' => 'Enter a message:',
	'wikilove-omit-sig' => '(without a signature)',
	'wikilove-image-example' => '(example: Trophy.png)',
	'wikilove-button-preview' => 'Preview',
	'wikilove-preview' => 'Preview',
	'wikilove-notify' => 'Notify the user by e-mail',
	'wikilove-button-send' => 'Send WikiLove',
	'wikilove-type-makeyourown' => 'Make your own',
	'wikilove-err-header' => 'Please enter a header.',
	'wikilove-err-title' => 'Please enter a title.',
	'wikilove-err-msg' => 'Please enter a message.',
	'wikilove-err-image' => 'Please select an image.',
	'wikilove-err-image-bad' => 'Image does not exist.',
	'wikilove-err-image-api' => 'Something went wrong when retrieving the image. Please try again.',
	'wikilove-err-sig' => 'Please do not include a signature in the message.',
	'wikilove-err-gallery' => 'Something went wrong when loading the images.',
	'wikilove-err-gallery-again' => 'Try again',
	'wikilove-err-preview-api' => 'Something went wrong during previewing. Please try again.',
	'wikilove-err-send-api' => 'Something went wrong when sending the message. Please try again.',
	'wikilove-summary' => '/* $1 */ new WikiLove message',
	'wikilove-what-is-this' => "What is this?",
	'wikilove-anon-warning' => 'Note: This user is not registered, he or she many not notice this message.',
	'wikilove-commons-text' => 'You can find images by browsing $1.',
	'wikilove-commons-link' => 'Wikimedia Commons',
	'wikilove-commons-url' => 'http://commons.wikimedia.org',
);

/** Message documentation (Message documentation)
 * @author McDutchie
 */
$messages['qqq'] = array(
	'wikilove-image-example' => 'The filename should be an actual image on Wikimedia Commons.',
	'wikilove-button-preview' => 'Button text. Verb.',
	'wikilove-preview' => 'Title. Noun.',
	'wikilove-commons-text' => '$1 gets replaced by a link with wikilove-commons-link as caption and wikilove-commons-url as URL.',
	'wikilove-commons-url' => 'This URL can be changed to point at a localised page on Wikimedia Commons.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'wikilove' => 'УикиОбич',
	'wikilove-tab-text' => 'УикиОбич',
	'wikilove-dialog-title' => 'УикиОбич - Изпращане на благодарствено съобщение на друг потребител',
	'wikilove-add-details' => 'Добавяне на подробности',
	'wikilove-select-image' => 'Избиране на изображение:',
	'wikilove-omit-sig' => '(без подпис)',
	'wikilove-image-example' => '(пример: Trophy.png)',
	'wikilove-button-preview' => 'Предварителен преглед',
	'wikilove-preview' => 'Предварителен преглед',
	'wikilove-notify' => 'Уведомяване на потребителя на електронната поща',
	'wikilove-button-send' => 'Изпращане на УикиОбич',
	'wikilove-err-image-bad' => 'Изображението не съществува.',
	'wikilove-err-sig' => 'В съобщението не трябва да се вклчва подпис.',
	'wikilove-err-gallery' => 'Възникна грешка при зареждане на изображенията!',
	'wikilove-err-gallery-again' => 'Опитайте отново',
	'wikilove-summary' => '/* $1 */ ново съобщение за УикиОбич',
	'wikilove-what-is-this' => 'Какво е това?',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'wikilove-desc' => 'Ouzhpennañ a ra un etrefas evit aesaat merkañ evezhiadennoù pozitivel war pajenn gaozeal un implijer',
	'wikilove' => 'WikiLove',
	'wikilove-enable-preference' => 'Aotren a ra diskouez priziadennoù evit implijerien all gant an ivinell WikiLove (arnodel)',
	'wikilove-tab-text' => 'WikiLove',
	'tooltip-ca-wikilove' => 'Lakaat ur gemennadenn evit an implijer-mañ da ziskouez e priziit an traoù',
	'wikilove-dialog-title' => "WikiLove – Kas ur gemennadenn pe ur soñj bennak d'un implijer all",
	'wikilove-select-type' => 'Diuzañ ur seurt',
	'wikilove-get-started-header' => 'Krogomp ganti !',
	'wikilove-get-started-list-1' => "Diuzit ar seurt WikiLove hoc'h eus c'hoant da gas",
	'wikilove-get-started-list-2' => "Ouzhpennit titouroù d'ho WikiLove",
	'wikilove-get-started-list-3' => 'Kasit ho WikiLove !',
	'wikilove-add-details' => 'Ouzhpennañ titouroù',
	'wikilove-image' => 'Lakat ur skeudenn eus Wikimedia Commons :',
	'wikilove-select-image' => 'Diuzañ ur skeudenn :',
	'wikilove-header' => 'Lakaat un talbenn :',
	'wikilove-title' => 'Lakaat un titl :',
	'wikilove-enter-message' => 'Lakaat ur gemennadenn',
	'wikilove-omit-sig' => '(hep sinadur)',
	'wikilove-button-preview' => 'Rakwelet',
	'wikilove-preview' => 'Rakwelet',
	'wikilove-notify' => "Kas ur c'hemenn dre bostel d'an implijer",
	'wikilove-button-send' => 'Kas ar WikiLove',
	'wikilove-type-makeyourown' => "Krouit ho-hini deoc'h-c'hwi",
	'wikilove-err-header' => 'Merkit un talbenn.',
	'wikilove-err-title' => 'Merkit un titl.',
	'wikilove-err-msg' => 'Merkit ur gemennadenn.',
	'wikilove-err-image' => 'Diuzit ur skeudenn.',
	'wikilove-err-sig' => 'Arabat sinañ ar gemennadenn.',
	'wikilove-err-gallery' => "Un dra bennak a-dreuz zo c'hoarvezet en ur gargañ ar skeudennoù !",
	'wikilove-err-gallery-again' => 'Klask en-dro',
	'wikilove-summary' => '/* $1 */ kemennadenn WikiLove nevez',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'wikilove-select-type' => 'Odaberite vrstu',
	'wikilove-add-details' => 'Dodaj detalje',
	'wikilove-enter-message' => 'Unesite poruku:',
	'wikilove-button-preview' => 'Pregled',
	'wikilove-preview' => 'Pregled',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'wikilove-desc' => 'Ergänzt ein Hilfsmittel zum Ausdrücken persönlicher Wertschätzung gegenüber einem Benutzer auf dessen Diskussionsseite',
	'wikilove' => 'Wertschätzung',
	'wikilove-enable-preference' => 'Menüreiter für das Hilfsmittel zum Ausdrücken persönlicher Wertschätzung gegenüber einem anderen Benutzer aktivieren (experimentell)',
	'wikilove-tab-text' => 'Wertschätzen',
	'tooltip-ca-wikilove' => 'Diesem Benutzer die persönliche Wertschätzung in Form einer Nachricht hinterlassen',
	'wikilove-dialog-title' => 'Eine Nachricht der Wertschätzung an einen anderen Benutzer senden',
	'wikilove-select-type' => 'Art auswählen',
	'wikilove-get-started-header' => 'Los geht’s!',
	'wikilove-get-started-list-1' => 'Die Art der persönlichen Wertschätzung auswählen, die ausgedrückt werden soll',
	'wikilove-get-started-list-2' => 'Persönliche Wertschätzung ergänzen',
	'wikilove-get-started-list-3' => 'Persönliche Wertschätzung senden',
	'wikilove-add-details' => 'Ergänzungen hinzufügen',
	'wikilove-image' => 'Gib den Namen der Bilddatei an:',
	'wikilove-select-image' => 'Wähle ein Bild aus:',
	'wikilove-header' => 'Gib den Inhalt des Kopfbereichs ein:',
	'wikilove-title' => 'Gib den Titel für die Wertschätzung ein:',
	'wikilove-enter-message' => 'Gibt eine Nachricht ein:',
	'wikilove-omit-sig' => '(ohne Signatur)',
	'wikilove-image-example' => '(Beispiel: Drei Sonnenblumen im Feld.JPG)',
	'wikilove-button-preview' => 'Vorschau',
	'wikilove-preview' => 'Vorschau',
	'wikilove-notify' => 'Den Benutzer per E-Mail benachrichtigen',
	'wikilove-button-send' => 'Persönliche Wertschätzung senden',
	'wikilove-type-makeyourown' => 'Eigene Art der Wertschätzung erstellen',
	'wikilove-err-header' => 'Bitte den Inhalt für den Kopfbereich eingeben.',
	'wikilove-err-title' => 'Bitte einen Titel eingeben.',
	'wikilove-err-msg' => 'Bitte eine Nachricht eingeben.',
	'wikilove-err-image' => 'Bitte ein Bild auswählen.',
	'wikilove-err-image-bad' => 'Das Bild ist nicht vorhanden.',
	'wikilove-err-image-api' => 'Während des Abrufens des Bildes ist ein Fehler aufgetreten. Bitte versuche es erneut.',
	'wikilove-err-sig' => 'Bitte keine Signatur im Nachrichtentext eingeben.',
	'wikilove-err-gallery' => 'Während des Ladens der Bilder ist ein Fehler aufgetreten.',
	'wikilove-err-gallery-again' => 'Bitte versuche es erneut.',
	'wikilove-err-preview-api' => 'Während der Vorschau ist ein Fehler aufgetreten. Bitte versuche es erneut.',
	'wikilove-err-send-api' => 'Während des Sendens der Wertschätzung ist ein Fehler aufgetreten. Bitte versuche es erneut.',
	'wikilove-summary' => '/* $1 */ neue persönliche Wertschätzung',
	'wikilove-what-is-this' => 'Worum handelt es sich?',
	'wikilove-anon-warning' => 'Hinweis: Es handelt sich um einen Benutzer ohne Benutzerkonto. Daher wird er oder sie die Nachricht wahrscheinlich nicht bemerken.',
	'wikilove-commons-text' => 'Bilder können gefunden werden, indem man $1 durchsucht.',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'wikilove-image' => 'Geben Sie den Namen der Bilddatei an:',
	'wikilove-select-image' => 'Wählen Sie ein Bild aus:',
	'wikilove-header' => 'Geben Sie den Inhalt des Kopfbereichs ein:',
	'wikilove-title' => 'Geben Sie den Titel für die Wertschätzung ein:',
	'wikilove-enter-message' => 'Geben Sie eine Nachricht ein:',
	'wikilove-err-image-api' => 'Während des Abrufens des Bildes ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut.',
	'wikilove-err-gallery' => 'Während des Ladens der Bilder ist ein Fehler aufgetreten.',
	'wikilove-err-gallery-again' => 'Bitte versuchen Sie es erneut.',
	'wikilove-err-preview-api' => 'Während der Vorschau ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut.',
	'wikilove-err-send-api' => 'Während des Sendens der Wertschätzung ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut.',
);

/** French (Français)
 * @author Crochet.david
 * @author IAlex
 * @author Jean-Frédéric
 * @author Sherbrooke
 */
$messages['fr'] = array(
	'wikilove-desc' => "Ajoute une interface pour faciliter la rétroaction positive sur la page de discussion d'un utilisateur",
	'wikilove' => 'WikiLove',
	'wikilove-enable-preference' => "Active l'onglet WikiLove servant à signifier aux autres contributeurs votre appréciation (expérimental)",
	'wikilove-tab-text' => 'Montrer votre appréciation',
	'tooltip-ca-wikilove' => 'Poster un message à cet utilisateur pour indiquer votre appréciation',
	'wikilove-dialog-title' => 'WikiLove',
	'wikilove-select-type' => 'Sélectionnez le type',
	'wikilove-get-started-header' => 'Commençons !',
	'wikilove-get-started-list-1' => 'Sélectionnez le type de WikiLove que vous souhaitez envoyer',
	'wikilove-get-started-list-2' => 'Ajoutez des détails à votre WikiLove',
	'wikilove-get-started-list-3' => 'Envoyez votre WikiLove !',
	'wikilove-add-details' => 'Ajouter des détails',
	'wikilove-image' => 'Image :',
	'wikilove-header' => 'En-tête :',
	'wikilove-title' => 'Entrez un titre :',
	'wikilove-enter-message' => 'Entrez un message :',
	'wikilove-omit-sig' => '(sans signature)',
	'wikilove-button-preview' => 'Prévisualiser',
	'wikilove-preview' => 'Prévisualiser',
	'wikilove-notify' => 'Notifier l’utilisateur par courriel',
	'wikilove-button-send' => 'Envoyer le WikiLove',
	'wikilove-type-makeyourown' => 'Créez votre propre',
	'wikilove-err-header' => "S'il vous plaît inscrire un en-tête.",
	'wikilove-err-title' => "S'il vous plaît inscrire un titre.",
	'wikilove-err-msg' => "S'il vous plaît inscrire un message.",
	'wikilove-err-image' => "S'il vous plaît sélectionner une image.",
	'wikilove-err-sig' => "S'il vous plaît ne pas inclure une signature dans le message.",
	'wikilove-err-gallery' => "Quelque chose n'a pas fonctionné lors du chargement des images !",
	'wikilove-err-gallery-again' => 'Essayez à nouveau',
	'wikilove-summary' => '/* $1 */ nouveau message WikiLove',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'wikilove' => 'VouiquiAmôr',
	'wikilove-tab-text' => 'Montrar voutra aprèciacion',
	'wikilove-dialog-title' => 'VouiquiAmôr',
	'wikilove-select-type' => 'Chouèsésséd lo tipo',
	'wikilove-get-started-header' => 'Comencens !',
	'wikilove-get-started-list-1' => 'Chouèsésséd lo tipo de VouiquiAmôr que vos souhètâd mandar',
	'wikilove-get-started-list-2' => 'Apondéd des dètalys a voutron VouiquiAmôr',
	'wikilove-get-started-list-3' => 'Mandâd voutron VouiquiAmôr !',
	'wikilove-add-details' => 'Apondre des dètalys',
	'wikilove-image' => 'Émâge :',
	'wikilove-header' => 'En-téta :',
	'wikilove-title' => 'Titro :',
	'wikilove-enter-message' => 'Buchiéd un mèssâjo :',
	'wikilove-omit-sig' => '(sen signatura)',
	'wikilove-button-preview' => 'Prèvisualisar',
	'wikilove-preview' => 'Prèvisualisacion',
	'wikilove-notify' => 'Notifiar l’utilisator per mèssageria èlèctronica',
	'wikilove-button-send' => 'Mandar lo VouiquiAmôr',
	'wikilove-type-makeyourown' => 'Féte voutron prôpro',
	'wikilove-err-header' => 'Volyéd buchiér un en-téta.',
	'wikilove-err-title' => 'Volyéd buchiér un titro.',
	'wikilove-err-msg' => 'Volyéd buchiér un mèssâjo.',
	'wikilove-err-image' => 'Volyéd chouèsir una émâge.',
	'wikilove-err-sig' => 'Volyéd pas encllure una signatura dens lo mèssâjo.',
	'wikilove-err-gallery-again' => 'Tornâd èprovar',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'wikilove-desc' => 'Engade unha interface para facilitar a mostra de aprecio cara a un usuario na súa páxina de conversa',
	'wikilove' => 'Amor wiki',
	'wikilove-enable-preference' => 'Activar o envío de mostras de aprecio aos outros usuarios mediante a lapela de amor wiki (experimental)',
	'wikilove-tab-text' => 'Amor wiki',
	'tooltip-ca-wikilove' => 'Déixelle unha mensaxe a este usuario mostrando o seu aprecio',
	'wikilove-dialog-title' => 'Amor wiki - Envíe unha mensaxe de aprecio a outro usuario',
	'wikilove-select-type' => 'Seleccione o tipo',
	'wikilove-get-started-header' => 'Comecemos!',
	'wikilove-get-started-list-1' => 'Seleccione tipo de amor wiki que queira enviar',
	'wikilove-get-started-list-2' => 'Engadir detalles ao seu amor wiki',
	'wikilove-get-started-list-3' => 'Enviar o seu amor wiki!',
	'wikilove-add-details' => 'Engadir detalles',
	'wikilove-image' => 'Insira unha imaxe da Wikimedia Commons:',
	'wikilove-select-image' => 'Seleccione unha imaxe:',
	'wikilove-header' => 'Insira unha cabeceira:',
	'wikilove-title' => 'Insira un título:',
	'wikilove-enter-message' => 'Escriba unha mensaxe:',
	'wikilove-omit-sig' => '(sen sinatura)',
	'wikilove-button-preview' => 'Vista previa',
	'wikilove-preview' => 'Vista previa',
	'wikilove-notify' => 'Informar ao usuario por correo electrónico',
	'wikilove-button-send' => 'Enviar o amor wiki',
	'wikilove-type-makeyourown' => 'Faga o seu',
	'wikilove-err-header' => 'Escriba unha cabeceira.',
	'wikilove-err-title' => 'Escriba un título.',
	'wikilove-err-msg' => 'Escriba unha mensaxe.',
	'wikilove-err-image' => 'Seleccione unha imaxe.',
	'wikilove-err-sig' => 'Non incluír a sinatura na mensaxe.',
	'wikilove-err-gallery' => 'Houbo un problema ao cargar as imaxes!',
	'wikilove-err-gallery-again' => 'Inténteo de novo',
	'wikilove-summary' => '/* $1 */ nova mensaxe de amor wiki',
	'wikilove-what-is-this' => 'Que é isto?',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'wikilove-desc' => 'הוספת ממשק לשליחת תגובות חיוביות לדפי שיחת משתמש',
	'wikilove' => 'ויקי־אהבה',
	'wikilove-enable-preference' => 'הפעלה של הצגת הערכה למשתמשים אחרים באמצעות לשונית ויקי־אהבה (ניסיוני)',
	'wikilove-tab-text' => 'ויקי־אהבה',
	'tooltip-ca-wikilove' => 'לשלוח למשתמש הזה הודעה שמראה את הערכתך',
	'wikilove-dialog-title' => 'ויקי־אהבה – שליחת הודעת הערכה למשתמש אחר',
	'wikilove-select-type' => 'בחירת סוג',
	'wikilove-get-started-header' => 'בואו נתחיל!',
	'wikilove-get-started-list-1' => 'איזה סוג של ויקי‏־אהבה לשלוח',
	'wikilove-get-started-list-2' => 'להוסיף פרטים להודעת ויקי־‏אהבה',
	'wikilove-get-started-list-3' => 'לשלוח ויקי־אהבה!',
	'wikilove-add-details' => 'הוספת פרטים',
	'wikilove-image' => 'שם קובץ תמונה:',
	'wikilove-select-image' => 'בחירת תמונה:',
	'wikilove-header' => 'כותרת פסקה:',
	'wikilove-title' => 'שם הצל"ש:',
	'wikilove-enter-message' => 'הודעה:',
	'wikilove-omit-sig' => '(ללא חתימה)',
	'wikilove-button-preview' => 'תצוגה מקדימה',
	'wikilove-preview' => 'תצוגה מקדימה',
	'wikilove-notify' => 'להודיע למשתמש בדואר אלקטרוני',
	'wikilove-button-send' => 'לשלוח ויקי־אהבה',
	'wikilove-type-makeyourown' => 'יצירה אישית',
	'wikilove-err-header' => 'נא להזין כותרת פסקה.',
	'wikilove-err-title' => 'נא להזין שם לצל"ש.',
	'wikilove-err-msg' => 'נא להזין הודעה.',
	'wikilove-err-image' => 'נא לבחור תמונה.',
	'wikilove-err-sig' => 'נא לא לכתוב חתימה בהודעה.',
	'wikilove-err-gallery' => 'משהו השתבש בעת טעינת התמונות!',
	'wikilove-err-gallery-again' => 'לנסות שוב',
	'wikilove-summary' => '/* $1 */ הודעת ויקי־אהבה חדשה',
	'wikilove-what-is-this' => 'מה זה?',
);

/** Hungarian (Magyar)
 * @author Dani
 */
$messages['hu'] = array(
	'wikilove' => 'Wikibók',
	'wikilove-tab-text' => 'Wikibók',
	'tooltip-ca-wikilove' => 'Elismerő üzenet küldése ennek a felhasználónak',
	'wikilove-dialog-title' => 'Wikibók – Küldj elismerő üzenetet egy másik felhasználónak',
	'wikilove-select-type' => 'Válassz típust',
	'wikilove-get-started-header' => 'Kezdjük!',
	'wikilove-get-started-list-1' => 'Válaszd ki a wikibók típusát',
	'wikilove-get-started-list-2' => 'Töltsd ki a részleteket',
	'wikilove-get-started-list-3' => 'Küldd el a wikibókot!',
	'wikilove-add-details' => 'Részletek',
	'wikilove-image' => 'Képfájl a Wikimédia Commonsról:',
	'wikilove-select-image' => 'Válassz egy képet:',
	'wikilove-header' => 'A fejléc tartalma:',
	'wikilove-title' => 'Cím:',
	'wikilove-enter-message' => 'Üzenet:',
	'wikilove-omit-sig' => '(aláírás nélkül)',
	'wikilove-image-example' => '(példa: Trophy.png)',
	'wikilove-button-preview' => 'Előnézet',
	'wikilove-preview' => 'Előnézet',
	'wikilove-notify' => 'Felhasználó értesítése e-mailben',
	'wikilove-button-send' => 'Wikibók elküldése',
	'wikilove-type-makeyourown' => 'Egyedi készítése',
	'wikilove-err-header' => 'Add meg a fejlécet!',
	'wikilove-err-title' => 'Add meg a címet!',
	'wikilove-err-msg' => 'Add meg az üzenetet!',
	'wikilove-err-image' => 'Válassz egy képet!',
	'wikilove-err-image-bad' => 'A kép nem létezik.',
	'wikilove-err-image-api' => 'Képellenőrzés sikertelen.',
	'wikilove-err-sig' => 'Ne helyezz el aláírást az üzenetben!',
	'wikilove-err-gallery' => 'Valami hiba történt a képek betöltése közben!',
	'wikilove-err-gallery-again' => 'Újrapróbálkozás',
	'wikilove-summary' => '/* $1 */ Új wikibók',
	'wikilove-what-is-this' => 'Mi ez?',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'wikilove-desc' => 'Adde un interfacie pro exprimer appreciation in le paginas de discussion de usatores',
	'wikilove' => 'WikiLove',
	'wikilove-enable-preference' => 'Permitter monstrar appreciation pro altere usatores con le scheda WikiLove (experimental)',
	'wikilove-tab-text' => 'WikiLove',
	'tooltip-ca-wikilove' => 'Publicar un message pro iste usator que monstra tu appreciation',
	'wikilove-dialog-title' => 'WikiLove: Inviar un message de appreciation a un altere usator',
	'wikilove-select-type' => 'Selige typo',
	'wikilove-get-started-header' => 'Nos comencia!',
	'wikilove-get-started-list-1' => 'Selige le typo de WikiLove que tu vole inviar',
	'wikilove-get-started-list-2' => 'Adde detalios a tu WikiLove',
	'wikilove-get-started-list-3' => 'Invia tu WikiLove!',
	'wikilove-add-details' => 'Adder detalios',
	'wikilove-image' => 'Entra le nomine de file de un imagine:',
	'wikilove-select-image' => 'Selige un imagine:',
	'wikilove-header' => 'Entra un texto de capite:',
	'wikilove-title' => 'Entra le titulo de un premio:',
	'wikilove-enter-message' => 'Entra un message:',
	'wikilove-omit-sig' => '(sin signatura)',
	'wikilove-image-example' => '(exemplo: Stella-Auro-Interlingua.jpg)',
	'wikilove-button-preview' => 'Previsualisar',
	'wikilove-preview' => 'Previsualisation',
	'wikilove-notify' => 'Notificar le usator per e-mail',
	'wikilove-button-send' => 'Inviar WikiLove',
	'wikilove-type-makeyourown' => 'Crear le tue',
	'wikilove-err-header' => 'Per favor entra un capite.',
	'wikilove-err-title' => 'Per favor entra un titulo.',
	'wikilove-err-msg' => 'Per favor entra un message.',
	'wikilove-err-image' => 'Per favor selige un imagine.',
	'wikilove-err-image-bad' => 'Le imagine non existe.',
	'wikilove-err-image-api' => 'Un problema occurreva durante le obtention del imagine. Per favor reproba.',
	'wikilove-err-sig' => 'Per favor non include un signatura in le message.',
	'wikilove-err-gallery' => 'Un problema occurreva durante le cargamento del imagines!',
	'wikilove-err-gallery-again' => 'Reprobar',
	'wikilove-err-preview-api' => 'Un problema occurreva durante le previsualisation. Per favor reproba.',
	'wikilove-err-send-api' => 'Un problema occurreva durante le invio del message. Per favor reproba.',
	'wikilove-summary' => '/* $1 */ nove message de WikiLove',
	'wikilove-what-is-this' => 'Que es isto?',
	'wikilove-anon-warning' => 'Nota: Iste usator non es registrate, e ille o illa non recipera notification de iste message.',
	'wikilove-commons-text' => 'Tu pote trovar imagines in $1.',
	'wikilove-commons-link' => 'Wikimedia Commons',
	'wikilove-commons-url' => 'http://commons.wikimedia.org/wiki/Pagina_principal?uselang=ia',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'wikilove-desc' => 'Määd et müjjelesch, einem sing Aanäkännong ußzeshpräsche, övver däm sing Klaafsigg em Wiki.',
	'wikilove' => 'Leev Wiki',
	'wikilove-enable-preference' => 'Määd et müjjelesch, einem sing Aanäkännong ußzeshpräsche (för zom Ußprobeere)',
	'wikilove-tab-text' => 'Donn Ding Aanerkennog ußdröcke',
	'tooltip-ca-wikilove' => 'Donn Ding Aanerkennong en ene päsöönlesche Nohreesch ußdröcke',
	'wikilove-dialog-title' => 'Aanäkännong em Wiki',
	'wikilove-select-type' => 'Donn en Zoot ußwähle',
	'wikilove-get-started-header' => 'Lom_mer ens med aanfange!',
	'wikilove-get-started-list-1' => 'Donn de Aad udder Zoot vun Dinge Aanäkännong ußwähle, di de över et Wiki schecke wells',
	'wikilove-get-started-list-2' => 'Donn Einzelheite övver Ding päsöönlesche Aanäkännong dobei',
	'wikilove-get-started-list-3' => 'Donn Ding Aanäkännong övverjävve',
	'wikilove-add-details' => 'Don noch Einzelheite dobei',
	'wikilove-title' => 'Tittel:',
	'wikilove-enter-message' => 'Jiv ene Täx en',
	'wikilove-omit-sig' => '(der ohne en Ongerschreff)',
	'wikilove-button-preview' => 'Vör-Aansesch',
	'wikilove-preview' => 'Vör-Aansesch',
	'wikilove-button-send' => 'Donn e joot Jeföhl schecke',
	'wikilove-type-makeyourown' => 'Maach Ding eije',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'wikilove' => 'WikiLove',
	'wikilove-tab-text' => 'Bewäertung weisen',
	'wikilove-dialog-title' => 'WikiLove',
	'wikilove-get-started-header' => 'Elo geet et lass!',
	'wikilove-add-details' => 'Detailer derbäisetzen',
	'wikilove-image' => 'Gitt e Bild un:',
	'wikilove-select-image' => 'Sicht e Bild eraus:',
	'wikilove-title' => 'Gitt en Titel un:',
	'wikilove-enter-message' => 'Gitt e Message an:',
	'wikilove-omit-sig' => '(ouni Ënnerschrëft)',
	'wikilove-button-preview' => 'Kucken ouni ofzespäicheren',
	'wikilove-preview' => 'Kucken ouni ofzespäicheren',
	'wikilove-notify' => 'De Benotzer per Mail informéieren',
	'wikilove-type-makeyourown' => 'Maacht Ären Eegenen',
	'wikilove-err-image' => 'Sicht w.e.g. e Bild eraus.',
	'wikilove-err-gallery-again' => 'Probéiert nach emol',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'wikilove-desc' => 'Додава посредник за искажување на позитивни мислења и поддршка на кориснички страници за разговор',
	'wikilove' => 'ВикиЉубов',
	'wikilove-enable-preference' => 'Овозможи оддавање на признанија и заслуги со јазичето ВикиЉубов (експериментално)',
	'wikilove-tab-text' => 'ВикиЉубов',
	'tooltip-ca-wikilove' => 'Оставете му порака на корисников кажувајќи му дека го цените',
	'wikilove-dialog-title' => 'ВикиЉубов - испратете порака на корисник, оддавајќи му признание за работата',
	'wikilove-select-type' => 'Одберете тип',
	'wikilove-get-started-header' => 'Да почнеме!',
	'wikilove-get-started-list-1' => 'Одберете го типот на ВикиЉубов што сакате да ја испратите',
	'wikilove-get-started-list-2' => 'Внесете содржина на ВикиЉубов-та',
	'wikilove-get-started-list-3' => 'Испратете ја вашата ВикиЉубов',
	'wikilove-add-details' => 'Внесете содржина',
	'wikilove-image' => 'Внесете име на слика:',
	'wikilove-select-image' => 'Одберете слика:',
	'wikilove-header' => 'Внесете заглавие:',
	'wikilove-title' => 'Внесете назив на наградата:',
	'wikilove-enter-message' => 'Внесете порака:',
	'wikilove-omit-sig' => '(без потпис)',
	'wikilove-image-example' => '(пример: Trophy.png)',
	'wikilove-button-preview' => 'Преглед',
	'wikilove-preview' => 'Преглед',
	'wikilove-notify' => 'Извести го корисникот по е-пошта',
	'wikilove-button-send' => 'Испрати ВикиЉубов',
	'wikilove-type-makeyourown' => 'Направете своја',
	'wikilove-err-header' => 'Внесете заглавие.',
	'wikilove-err-title' => 'Внесете наслов.',
	'wikilove-err-msg' => 'Внесете порака.',
	'wikilove-err-image' => 'Одберете слика.',
	'wikilove-err-image-bad' => 'Сликата не постои.',
	'wikilove-err-image-api' => 'Се појави проблем при преземањето на сликата. Обидете се повторно.',
	'wikilove-err-sig' => 'Не ставајте потпис во пораката.',
	'wikilove-err-gallery' => 'Се појави грешка при вчитувањето на сликите!',
	'wikilove-err-gallery-again' => 'Обиди се повторно',
	'wikilove-err-preview-api' => 'Се појави проблем при прегледувањето. Обидете се повторно.',
	'wikilove-err-send-api' => 'Се појави проблем при испраќањето на пораката. Обидете се повторно.',
	'wikilove-summary' => '/* $1 */ нова порака (ВикиЉубов)',
	'wikilove-what-is-this' => 'Што е ова?',
	'wikilove-anon-warning' => 'Напомена: Корисникот не е регистриран, па затоа може да не ја примети поракава.',
	'wikilove-commons-text' => 'Слики можете да најдете во проектот $1.',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'wikilove-desc' => 'ഉപയോക്താക്കൾക്ക് സംവാദം താളുകൾ വഴി ഗുണാത്മക അഭിപ്രായങ്ങൾ പ്രകടിപ്പിക്കാനുള്ള സമ്പർക്കമുഖം കൂട്ടിച്ചേർക്കുന്നു',
	'wikilove' => 'വിക്കിലവ്',
	'wikilove-enable-preference' => 'വിക്കിലവ് റ്റാബ് ഉപയോഗിച്ച് മറ്റ് ഉപയോക്താക്കളെ അഭിനന്ദനങ്ങൾ അറിയിക്കൽ സജ്ജമാക്കുക (പരീക്ഷണാടിസ്ഥാനം)',
	'wikilove-tab-text' => 'വിക്കിലവ്',
	'tooltip-ca-wikilove' => 'താങ്കളുടെ അഭിനന്ദനം അറിയിക്കാൻ ഈ ഉപയോക്താവിന് ഒരു സന്ദേശയമയ്ക്കുക',
	'wikilove-dialog-title' => 'വിക്കിലവ് - മറ്റൊരു ഉപയോക്താവിനെ അഭിനന്ദനം അറിയിക്കാനൊരു സന്ദേശം നൽകുക',
	'wikilove-select-type' => 'ഇനം തിരഞ്ഞെടുക്കുക',
	'wikilove-get-started-header' => 'നമുക്ക് തുടങ്ങാം!',
	'wikilove-get-started-list-1' => 'താങ്കൾ അയയ്ക്കാനാഗ്രഹിക്കുന്ന തരം വിക്കിലവ് തിരഞ്ഞെടുക്കുക',
	'wikilove-get-started-list-2' => 'താങ്കളുടെ വിക്കിലവിലേയ്ക്ക് കൂടുതൽ വിവരങ്ങൾ കൂട്ടിച്ചേർക്കുക',
	'wikilove-get-started-list-3' => 'താങ്കളുടെ വിക്കിലവ് അയയ്ക്കുക!',
	'wikilove-add-details' => 'അധികവിവരങ്ങൾ ചേർക്കുക',
	'wikilove-image' => 'വിക്കിമീഡിയ കോമൺസിൽ നിന്നുമുള്ള ഒരു ചിത്രം നൽകുക:',
	'wikilove-select-image' => 'ചിത്രം തിരഞ്ഞെടുക്കുക:',
	'wikilove-header' => 'തലക്കുറി നൽകുക:',
	'wikilove-title' => 'തലക്കെട്ട് നൽകുക:',
	'wikilove-enter-message' => 'സന്ദേശം നൽകുക:',
	'wikilove-omit-sig' => '(ഒപ്പ് ചേർക്കേണ്ടതില്ല)',
	'wikilove-button-preview' => 'എങ്ങനെയുണ്ടെന്നു കാണുക',
	'wikilove-preview' => 'എങ്ങനെയുണ്ടെന്നു കാണുക',
	'wikilove-notify' => 'ഉപയോക്താവിനെ ഇമെയിൽ വഴി അറിയിക്കുക',
	'wikilove-button-send' => 'വിക്കിലവ് അയയ്ക്കുക',
	'wikilove-type-makeyourown' => 'താങ്കളുടെ സ്വന്തമായ ഒരെണ്ണം സൃഷ്ടിക്കുക',
	'wikilove-err-header' => 'ദയവായി ഒരു തലക്കുറി ചേർക്കുക.',
	'wikilove-err-title' => 'ദയവായി തലക്കെട്ട് നൽകുക.',
	'wikilove-err-msg' => 'ദയവായി ഒരു സന്ദേശം ചേർക്കുക.',
	'wikilove-err-image' => 'ദയവായി ചിത്രം തിരഞ്ഞെടുക്കുക.',
	'wikilove-err-sig' => 'ദയവായി സന്ദേശത്തിൽ ഒപ്പ് ഉൾപ്പെടുത്തരുത്.',
	'wikilove-err-gallery' => 'ചിത്രങ്ങൾ ശേഖരിച്ചുകൊണ്ടിരിക്കെ എന്തോ കുഴപ്പമുണ്ടായി!',
	'wikilove-err-gallery-again' => 'വീണ്ടും ശ്രമിക്കുക',
	'wikilove-summary' => '/* $1 */ പുതിയ വിക്കിലവ് സന്ദേശം',
	'wikilove-what-is-this' => 'എന്താണിത്?',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 * @author Tjcool007
 */
$messages['nl'] = array(
	'wikilove-desc' => "Voegt een interface toe voor het geven van positieve terugkoppeling op overlegpagina's van gebruikers",
	'wikilove' => 'Wikiwaardering',
	'wikilove-enable-preference' => 'Waardering geven aan andere gebruikers via Wikiwaardering inschakelen (experimenteel)',
	'wikilove-tab-text' => 'Wikiwaardering',
	'tooltip-ca-wikilove' => 'Plaats een bericht voor deze gebruiker om uw waardering te tonen',
	'wikilove-dialog-title' => 'Wikiwaardering - stuur een boodschap van waardering naar een andere gebruiker',
	'wikilove-select-type' => 'Selecteer type',
	'wikilove-get-started-header' => 'Begin ermee!',
	'wikilove-get-started-list-1' => 'Selecteer het type Wikiwaardering dat u wilt achterlaten',
	'wikilove-get-started-list-2' => 'Voegt gegevens toe aan uw Wikiwaardering',
	'wikilove-get-started-list-3' => 'Uw Wikiwaardering verzenden!',
	'wikilove-add-details' => 'Gegevens toevoegen',
	'wikilove-image' => 'Geef de bestandsnaam van een afbeelding op:',
	'wikilove-select-image' => 'Kies een afbeelding',
	'wikilove-header' => 'Geef een koptekst op:',
	'wikilove-title' => 'Geef een onderwerp op:',
	'wikilove-enter-message' => 'Voer een bericht in:',
	'wikilove-omit-sig' => '(zonder ondertekening)',
	'wikilove-button-preview' => 'Voorvertoning',
	'wikilove-preview' => 'Voorvertoning',
	'wikilove-notify' => 'De gebruiker een bericht sturen via e-mail',
	'wikilove-button-send' => 'Wikiwaardering versturen',
	'wikilove-type-makeyourown' => 'Uw eigen Wikiwaardering maken',
	'wikilove-err-header' => 'Geef een koptekst op.',
	'wikilove-err-title' => 'Geef een naam op.',
	'wikilove-err-msg' => 'Geef een bericht op.',
	'wikilove-err-image' => 'Selecteer een afbeelding.',
	'wikilove-err-image-bad' => 'Afbeelding bestaat niet.',
	'wikilove-err-sig' => 'Neem geen ondertekening op in dit bericht.',
	'wikilove-err-gallery' => 'Er iets misgegaan bij het laden van de afbeeldingen.',
	'wikilove-err-gallery-again' => 'Probeer het opnieuw',
	'wikilove-summary' => '/* $1 */ nieuw Wikiwaarderingbericht',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'wikilove-image' => 'انځور:',
	'wikilove-title' => 'سرليک:',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'wikilove-desc' => 'Adiciona uma interface para facilitar a colocação de demonstrações de apreço nas páginas de discussão dos utilizadores',
	'wikilove' => 'WikiApreço',
	'wikilove-enable-preference' => 'Permite enviar demonstrações de apreço a outros utilizadores usando o separador "WikiApreço" (experimental)',
	'wikilove-tab-text' => 'WikiApreço',
	'tooltip-ca-wikilove' => 'Envie uma mensagem a este utilizador demonstrando o seu apreço',
	'wikilove-dialog-title' => 'WikiApreço - Envie uma mensagem de apreço a outro utilizador',
	'wikilove-select-type' => 'Escolha o tipo',
	'wikilove-get-started-header' => 'Vamos começar!',
	'wikilove-get-started-list-1' => 'Escolha o tipo de WikiApreço que pretende enviar',
	'wikilove-get-started-list-2' => 'Acrescente detalhes ao seu WikiApreço',
	'wikilove-get-started-list-3' => 'Enviar o seu WikiApreço!',
	'wikilove-add-details' => 'Adicionar detalhes',
	'wikilove-image' => 'Introduza o nome de uma imagem:',
	'wikilove-select-image' => 'Seleccione uma imagem:',
	'wikilove-header' => 'Introduza um cabeçalho:',
	'wikilove-title' => 'Introduza o título de um prémio:',
	'wikilove-enter-message' => 'Introduza uma mensagem:',
	'wikilove-omit-sig' => '(sem assinatura)',
	'wikilove-image-example' => '(exemplo: Troféu.png)',
	'wikilove-button-preview' => 'Antever',
	'wikilove-preview' => 'Antevisão',
	'wikilove-notify' => 'Notificar o utilizador por correio electrónico',
	'wikilove-button-send' => 'Enviar WikiApreço',
	'wikilove-type-makeyourown' => 'Crie o seu',
	'wikilove-err-header' => 'Introduza um cabeçalho, por favor.',
	'wikilove-err-title' => 'Introduza um título, por favor.',
	'wikilove-err-msg' => 'Introduza uma mensagem, por favor.',
	'wikilove-err-image' => 'Escolha uma imagem, por favor.',
	'wikilove-err-image-bad' => 'A imagem não existe.',
	'wikilove-err-image-api' => 'Ocorreu um erro ao aceder à imagem. Tente novamente, por favor.',
	'wikilove-err-sig' => 'Não inclua uma assinatura na mensagem, por favor.',
	'wikilove-err-gallery' => 'Ocorreu um erro ao carregar as imagens!',
	'wikilove-err-gallery-again' => 'Tente novamente',
	'wikilove-err-preview-api' => 'Ocorreu um erro durante a antevisão. Tente novamente, por favor.',
	'wikilove-err-send-api' => 'Ocorreu um erro ao enviar a mensagem. Tente novamente, por favor.',
	'wikilove-summary' => '/* $1 */ nova mensagem de WikiApreço',
	'wikilove-what-is-this' => 'O que é isto?',
	'wikilove-anon-warning' => 'Nota: Este utilizador não está registado e poderá não se aperceber desta mensagem.',
	'wikilove-commons-text' => 'Pode encontrar imagens pesquisando-as em $1.',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'wikilove-err-gallery-again' => 'Pruève arrete',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'wikilove-desc' => 'Добавляет интерфейс для упрощения добавления положительных отзывов на страницы обсуждения участников',
	'wikilove' => 'ВикиСимпатия',
	'wikilove-enable-preference' => 'Включить вкладку ВикиСимпатия для выражения признательности другим пользователям (экспериментальная)',
	'wikilove-tab-text' => 'ВикиСимпатия',
	'tooltip-ca-wikilove' => 'Отправить сообщение для этого участника, выразить ему признательность',
	'wikilove-dialog-title' => 'ВикиСимпатия — выразите признательность другому участнику',
	'wikilove-select-type' => 'Выберите тип',
	'wikilove-get-started-header' => 'Давайте начнём!',
	'wikilove-get-started-list-1' => 'Выберите тип ВикиСимпатии, которую вы хотите выразить',
	'wikilove-get-started-list-2' => 'Добавьте подробности к вашей ВикиСимпатии',
	'wikilove-get-started-list-3' => 'Отправьте вашу ВикиСимпатию!',
	'wikilove-add-details' => 'Добавить подробности',
	'wikilove-image' => 'Введите имя файла с изображением:',
	'wikilove-select-image' => 'Выберите изображение:',
	'wikilove-header' => 'Введите заголовок:',
	'wikilove-title' => 'Введите название награды:',
	'wikilove-enter-message' => 'Введите сообщение:',
	'wikilove-omit-sig' => '(без подписи)',
	'wikilove-image-example' => '(например: Trophy.png)',
	'wikilove-button-preview' => 'Предпросмотр',
	'wikilove-preview' => 'Предпросмотр',
	'wikilove-notify' => 'Уведомить участника по электронной почте',
	'wikilove-button-send' => 'Отправить ВикиСимпатию',
	'wikilove-type-makeyourown' => 'Сделать свой собственный',
	'wikilove-err-header' => 'Пожалуйста, введите заголовок.',
	'wikilove-err-title' => 'Пожалуйста, введите название.',
	'wikilove-err-msg' => 'Пожалуйста, введите сообщение.',
	'wikilove-err-image' => 'Пожалуйста, выберите изображение.',
	'wikilove-err-image-bad' => 'Нет такого изображения.',
	'wikilove-err-image-api' => 'Что-то пошло не так, при получении изображения. Пожалуйста, попробуйте ещё раз.',
	'wikilove-err-sig' => 'Пожалуйста, не включайте подпись в сообщение.',
	'wikilove-err-gallery' => 'Что-то пошло не так при загрузке изображений!',
	'wikilove-err-gallery-again' => 'Попробуйте ещё раз',
	'wikilove-err-preview-api' => 'Что-то пошло не так во время предпросмотра. Пожалуйста, попробуйте ещё раз.',
	'wikilove-err-send-api' => 'Что-то пошло не так при отправке сообщения. Пожалуйста, попробуйте ещё раз.',
	'wikilove-summary' => '/ * $1 * / новая ВикиСимпатия',
	'wikilove-what-is-this' => 'Что это?',
	'wikilove-anon-warning' => 'Примечание. Этот участник не зарегистрирован, он или она может не заметить это сообщение.',
	'wikilove-commons-text' => 'Вы можете найти изображения в проекте $1.',
	'wikilove-commons-link' => 'Викисклад',
	'wikilove-commons-url' => 'http://commons.wikimedia.org/wiki/Main_Page?uselang=ru',
);

/** Slovenian (Slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'wikilove-desc' => 'Doda vmesnik za olajšanje pozitivne povratne informacije uporabnika na uporabniških pogovornih straneh',
	'wikilove' => 'WikiLjubezen',
	'wikilove-enable-preference' => 'Omogoči izkazovanje hvaležnosti drugim uporabnikom z zavihkom WikiLjubezen (preizkusno)',
	'wikilove-tab-text' => 'WikiLjubezen',
	'tooltip-ca-wikilove' => 'Objavite sporočilo za tega uporabnika, s katerim boste izkazali svojo hvaležnost',
	'wikilove-dialog-title' => 'WikiLjubezen – Pošljite drugemu uporabniku sporočilo hvaležnosti',
	'wikilove-select-type' => 'Izberite vrsto',
	'wikilove-get-started-header' => 'Začnimo!',
	'wikilove-get-started-list-1' => 'Izberite vrsto WikiLjubezni, ki jo želite poslati',
	'wikilove-get-started-list-2' => 'Dodajte podrobnosti svoji WikiLjubezni',
	'wikilove-get-started-list-3' => 'Pošljite svojo WikiLjubezen!',
	'wikilove-add-details' => 'Dodaj podrobnosti',
	'wikilove-image' => 'Vnesite ime datoteke slike:',
	'wikilove-select-image' => 'Izberite sliko:',
	'wikilove-header' => 'Vnesite glavo:',
	'wikilove-title' => 'Vnesite naslov nagrade:',
	'wikilove-enter-message' => 'Vnesite sporočilo:',
	'wikilove-omit-sig' => '(brez podpisa)',
	'wikilove-image-example' => '(primer: Trophy.png)',
	'wikilove-button-preview' => 'Predoglej',
	'wikilove-preview' => 'Predogled',
	'wikilove-notify' => 'Obvesti uporabnika po e-pošti',
	'wikilove-button-send' => 'Pošljite WikiLjubezen',
	'wikilove-type-makeyourown' => 'Naredite svojo',
	'wikilove-err-header' => 'Prosimo, vnesite glavo.',
	'wikilove-err-title' => 'Prosimo, vnesite naslov.',
	'wikilove-err-msg' => 'Prosimo, vnesite sporočilo.',
	'wikilove-err-image' => 'Prosimo, izberite sliko.',
	'wikilove-err-image-bad' => 'Slika ne obstaja.',
	'wikilove-err-image-api' => 'Med pridobivanjem slike je nekaj šlo narobe. Prosimo, poskusite znova.',
	'wikilove-err-sig' => 'Prosimo, da v sporočilo ne vključite svojega podpisa.',
	'wikilove-err-gallery' => 'Nekaj je šlo narobe pri nalaganju slik!',
	'wikilove-err-gallery-again' => 'Poskusite znova',
	'wikilove-err-preview-api' => 'Med predogledom je nekaj šlo narobe. Prosimo, poskusite znova.',
	'wikilove-err-send-api' => 'Med pošiljanjem sporočila je nekaj šlo narobe. Prosimo, poskusite znova.',
	'wikilove-summary' => '/* $1 */ novo sporočilo WikiLjubezen',
	'wikilove-what-is-this' => 'Kaj je to?',
	'wikilove-anon-warning' => 'Opomba: Uporabnik ni registriran, zato sporočila morda ne bo opazil.',
	'wikilove-commons-text' => 'Slike lahko najdete z brskanjem po $1.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'wikilove-add-details' => 'వివరాలను చేర్చు',
	'wikilove-title' => 'ఒక శీర్షికను ఇవ్వండి:',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'wikilove-desc' => 'Nagdaragdag ng isang ugnayang-mukha para sa pagpapadali ng positibong puna ng tagagamit sa mga pahina ng usapan',
	'wikilove' => 'WikiLove',
	'wikilove-enable-preference' => 'Paganahin ang pagpapakita ng pagpapahalaga para sa iba pang mga tagagamit sa pamamagitan ng panglaylay na WikiLove (sinusubukan)',
	'wikilove-tab-text' => 'Magpakita ng pagpapahalaga',
	'tooltip-ca-wikilove' => 'Magpaskil ng isang mensahe para sa tagagamit na ito na nagpapakita ng pagpapahalaga mo',
	'wikilove-dialog-title' => 'WikiLove',
	'wikilove-select-type' => 'Piliin ang uri',
	'wikilove-get-started-header' => 'Magsimula na tayo!',
	'wikilove-get-started-list-1' => 'Piliin ang uri ng WikiLove na nais mong ipadala',
	'wikilove-get-started-list-2' => 'Magdagdag ng mga detalye sa WikiLove mo',
	'wikilove-get-started-list-3' => 'Ipadala ang WikiLove mo!',
	'wikilove-add-details' => 'Magdagdag ng mga detalye',
	'wikilove-title' => 'Pamagat:',
	'wikilove-enter-message' => 'Magpasok ng isang mensahe:',
	'wikilove-omit-sig' => '(walang lagda)',
	'wikilove-button-preview' => 'Paunang tingin',
	'wikilove-preview' => 'Paunang tingin',
	'wikilove-button-send' => 'Ipadala ang WikiLove',
	'wikilove-type-makeyourown' => 'Gumawa ng sarili mo',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'wikilove-desc' => 'Thêm một giao diện cho phép gửi phản hồi khen ngợi cho người dùng khác qua các trang thảo luận cá nhân',
	'wikilove' => 'WikiLove',
	'wikilove-enable-preference' => 'Cho phép bày tỏ sự biết ơn cho người dùng khác qua thẻ WikiLove (thử nghiệm)',
	'wikilove-tab-text' => 'WikiLove',
	'tooltip-ca-wikilove' => 'Đăng một thông điệp cho người dùng này để cho biết sự đánh giá cao của bạn',
	'wikilove-dialog-title' => 'WikiLove – Gửi thông điệp bày tỏ sự đánh giá cao cho người dùng khác',
	'wikilove-select-type' => 'Chọn loại',
	'wikilove-get-started-header' => 'Hãy bắt đầu!',
	'wikilove-get-started-list-1' => 'Chọn loại WikiLove để gửi',
	'wikilove-get-started-list-2' => 'Thêm chi tiết vào WikiLove của bạn',
	'wikilove-get-started-list-3' => 'Gửi WikiLove!',
	'wikilove-add-details' => 'Thêm chi tiết',
	'wikilove-image' => 'Nhập một tên hình:',
	'wikilove-select-image' => 'Chọn một hình ảnh:',
	'wikilove-header' => 'Nhập đầu đề:',
	'wikilove-title' => 'Nhập một tên giải thưởng:',
	'wikilove-enter-message' => 'Nhập tin nhắn:',
	'wikilove-omit-sig' => '(không ký tên)',
	'wikilove-image-example' => '(ví dụ: Trophy.png)',
	'wikilove-button-preview' => 'Xem trước',
	'wikilove-preview' => 'Xem trước',
	'wikilove-notify' => 'Báo người dùng qua thư điện tử',
	'wikilove-button-send' => 'Gửi WikiLove',
	'wikilove-type-makeyourown' => 'Làm lấy',
	'wikilove-err-header' => 'Vui lòng đưa vào đầu đề.',
	'wikilove-err-title' => 'Vui lòng đưa vào tựa đề.',
	'wikilove-err-msg' => 'Vui lòng đưa vào tin nhắn.',
	'wikilove-err-image' => 'Vui lòng chọn một hình ảnh.',
	'wikilove-err-image-bad' => 'Hình không tồn tại.',
	'wikilove-err-image-api' => 'Đã gặp một lỗi bất ngờ trong việc lấy hình ảnh. Hãy thử lại.',
	'wikilove-err-sig' => 'Xin vui lòng đừng đưa một chữ ký vào tin nhắn.',
	'wikilove-err-gallery' => 'Đã gặp lỗi khi tải các hình ảnh!',
	'wikilove-err-gallery-again' => 'Thử lại',
	'wikilove-err-preview-api' => 'Đã gặp một lỗi bất ngờ trong việc xem trước. Hãy thử lại.',
	'wikilove-err-send-api' => 'Đã gặp một lỗi bất ngờ trong việc gửi thông điệp. Hãy thử lại.',
	'wikilove-summary' => '/* $1 */ thông điệp WikiLove mới',
	'wikilove-what-is-this' => 'Này là gì?',
	'wikilove-anon-warning' => 'Lưu ý: Người dùng này chưa đăng ký, nên họ có thể không nhận thấy được thông điệp này.',
	'wikilove-commons-text' => 'Có thể tìm kiếm hình ảnh tại $1.',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Waihorace
 */
$messages['zh-hant'] = array(
	'wikilove-desc' => '加入一個界面以使用戶向其他用戶提供正面的意見',
	'wikilove' => '維基友愛',
	'wikilove-enable-preference' => '顯示維基友愛標籤以便讚賞其他用戶（試驗性）',
	'wikilove-tab-text' => '維基友愛',
	'tooltip-ca-wikilove' => '張貼一條信息以表示你的欣賞',
	'wikilove-dialog-title' => '維基友愛－向其他用戶發送欣賞信息',
	'wikilove-select-type' => '選擇類型',
	'wikilove-get-started-header' => '開始吧！',
	'wikilove-get-started-list-1' => '選擇想發送的維基友愛類型',
	'wikilove-get-started-list-2' => '對你的維基友愛加入細節',
	'wikilove-get-started-list-3' => '發送你的友愛！',
	'wikilove-add-details' => '加入詳情',
	'wikilove-image' => '輸入一個來自維基共享資源的圖像名：',
	'wikilove-select-image' => '選擇一個圖片：',
	'wikilove-header' => '輸入頭部：',
	'wikilove-title' => '輸入標題：',
	'wikilove-enter-message' => '輸入信息：',
	'wikilove-omit-sig' => '（沒有簽名）',
	'wikilove-button-preview' => '預覽',
	'wikilove-preview' => '預覽',
	'wikilove-notify' => '通過電郵通知這位用戶',
	'wikilove-button-send' => '發送友愛',
	'wikilove-type-makeyourown' => '製作你自己的',
	'wikilove-err-header' => '請輸入頭部。',
	'wikilove-err-title' => '請輸入標題。',
	'wikilove-err-msg' => '請輸入信息。',
	'wikilove-err-image' => '請選擇圖片。',
	'wikilove-err-sig' => '請不要在信息中包含簽名。',
	'wikilove-err-gallery' => '加載圖片時發生了錯誤。',
	'wikilove-err-gallery-again' => '再試一次',
	'wikilove-summary' => '/* $1 */ 新的維基友愛信息',
	'wikilove-what-is-this' => '這是甚麼？',
);

