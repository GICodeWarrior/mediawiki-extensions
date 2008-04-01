<?php
/**
 * Internationalisation file for extension EditMessages.
 *
 * @addtogroup Extensions
 */

$messages = array();

$messages['en'] = array(
	'editmessages-desc'        => '[[Special:EditMessages|Web-based editing]] of large numbers of Messages*.php files',
	'editmessages'             => 'Edit messages',
	'editmsg-target'           => 'Target message: ',
	'editmsg-search'           => 'Search',
	'editmsg-show-list'        => 'Showing values for message name "$1"',
	'editmsg-get-patch'        => 'Generate patch',
	'editmsg-new-search'       => 'New search',
	'editmsg-warning-parse1'   => '* Message name regex not matched: $1',
	'editmsg-warning-parse2'   => '* Quote character expected after arrow: $1',
	'editmsg-warning-parse3'   => '* End of value string not found: $1',
	'editmsg-warning-file'     => '* File read errors were encountered for the following languages: $1',
	'editmsg-warning-mismatch' => '* The original text did not have the expected value for the following languages: $1',
	'editmsg-apply-patch'      => 'Apply patch',
	'editmsg-no-patch'         => 'Unable to execute "patch" command',
	'editmsg-patch-failed'     => 'Patch failed with exit status $1',
	'editmsg-patch-success'    => 'Successfully patched.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'editmessages-desc'  => '[[Special:EditMessages|Уеб-базиран интерфейс]] за редактиране на голям брой файлове Messages*.php',
	'editmessages'       => 'Редактиране на съобщенията',
	'editmsg-target'     => 'Целево съобщение:',
	'editmsg-search'     => 'Търсене',
	'editmsg-new-search' => 'Ново търсене',
);

/** Bengali (বাংলা)
 * @author Zaheen
 */
$messages['bn'] = array(
	'editmsg-search' => 'অনুসন্ধান',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'editmsg-search' => 'Søg',
);

/** German (Deutsch)
 * @author Raimond Spekking
 */
$messages['de'] = array(
	'editmessages-desc'        => '[[Special:EditMessages|Webbasiertes Bearbeiten]] einer großen Anzahl an Messages*.php-Dateien',
	'editmessages'             => 'Systemnachricht bearbeiten',
	'editmsg-target'           => 'Zu bearbeitende Systemnachricht:',
	'editmsg-search'           => 'Suche',
	'editmsg-show-list'        => 'Inhalte der Systemnachricht „$1“',
	'editmsg-get-patch'        => 'Erstelle Patch',
	'editmsg-new-search'       => 'Neue Suche',
	'editmsg-warning-parse1'   => '* Regex trifft auf keine Systemnachrichten zu: $1',
	'editmsg-warning-parse2'   => '* Quote character expected after arrow: $1',
	'editmsg-warning-parse3'   => '* Ende der Zeichenkette nicht gefunden: $1',
	'editmsg-warning-file'     => '* Es ist ein Dateilesefehler für die folgenden Sprachen aufgetreten: $1',
	'editmsg-warning-mismatch' => '* Der Originaltext hat nicht den erwarteten Wert für die folgenden Sprachen: $1',
	'editmsg-apply-patch'      => 'Patch anwenden',
	'editmsg-no-patch'         => 'Patch-Kommando kann nicht angewendet werden.',
	'editmsg-patch-failed'     => 'Patch ist fehlgeschlagen mit dem exit-Status $1.',
	'editmsg-patch-success'    => 'Erfolgreich gepatcht.',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'editmsg-new-search' => 'Νέα αναζήτηση',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'editmessages'          => 'Redeaktu mesaĝojn',
	'editmsg-target'        => 'Cela mesaĝo:',
	'editmsg-search'        => 'Serĉu',
	'editmsg-get-patch'     => 'Generu flikaĵon',
	'editmsg-new-search'    => 'Nova serĉo',
	'editmsg-apply-patch'   => 'Apliku flikaĵon',
	'editmsg-no-patch'      => 'Ne eblas starti "flikan" komandon',
	'editmsg-patch-failed'  => 'Flikaĵo malsukcesis kun statuso $1',
	'editmsg-patch-success' => 'Sukcese flikita.',
);

/** French (Français)
 * @author Grondin
 */
$messages['fr'] = array(
	'editmessages-desc'        => '[[Special:EditMessages|Édition basée sur Internet]] d’un grand nombre de fichiers Messages*.php',
	'editmessages'             => 'Modifier les messages',
	'editmsg-target'           => 'Message cible :',
	'editmsg-search'           => 'Rechercher',
	'editmsg-show-list'        => 'Affichage des valeurs pour le nom du message « $1 »',
	'editmsg-get-patch'        => 'Créer un patch',
	'editmsg-new-search'       => 'Nouvelle recherche',
	'editmsg-warning-parse1'   => '* Expression courante du nom de message non détectée : $1',
	'editmsg-warning-parse2'   => '* Caractère de citation attendu après la flèche : $1',
	'editmsg-warning-parse3'   => '* Fin de la chaîne de caractères non trouvée : $1',
	'editmsg-warning-file'     => '* Des erreurs de lecture du fichier ont été relevées pour les langues suivantes : $1',
	'editmsg-warning-mismatch' => '* Le texte original n’a pas pris la valeur attendue pour les langues suivantes : $1',
	'editmsg-apply-patch'      => 'Appliquer le patch',
	'editmsg-no-patch'         => 'Impossible pour exécuter la commande du « patch »',
	'editmsg-patch-failed'     => 'Échec du patch avec l’erreur de sortie $1',
	'editmsg-patch-success'    => 'Patch appliqué avec succès.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'editmessages'       => 'Editar mensaxes',
	'editmsg-search'     => 'Procurar',
	'editmsg-new-search' => 'Nova busca',
);

/** Hungarian (Magyar)
 * @author Dani
 */
$messages['hu'] = array(
	'editmessages-desc'     => '[[Special:EditMessages|Web-alapú szerkesztő]] nagy mennyiségű Messages*.php fájl szerkesztéséhez',
	'editmessages'          => 'Üzenetek szerkesztése',
	'editmsg-search'        => 'Keresés',
	'editmsg-show-list'     => '„$1” értékeinek megjelenítése',
	'editmsg-get-patch'     => 'Javítás készítése',
	'editmsg-new-search'    => 'Új keresés',
	'editmsg-warning-file'  => 'A következő nyelvekhez tartozó fájlok olvasásakor hiba lépett fel: $1',
	'editmsg-apply-patch'   => 'Javítás alkalmazása',
	'editmsg-no-patch'      => 'A „patch” parancs nem hajtható végre',
	'editmsg-patch-failed'  => 'A javítás sikertelen, visszatérési értéke: $1',
	'editmsg-patch-success' => 'A javítás sikeresen befejeződött.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'editmessages-desc'        => "[[Special:EditMessages|Änneren am Web]] vun enger grousser Zuel vu ''Messages*.php-Dateien''",
	'editmessages'             => 'Systemmessage änneren',
	'editmsg-target'           => 'Systemmessage dee geännert soll ginn:',
	'editmsg-search'           => 'Sich',
	'editmsg-show-list'        => 'Inhalt vum Systemmessage "$1"',
	'editmsg-get-patch'        => 'Patch maachen',
	'editmsg-new-search'       => 'Nei Sich',
	'editmsg-warning-parse1'   => '* Geleefege Numm vum Systemmessage gouf net fonnt: $1',
	'editmsg-warning-parse3'   => '* Ënn vun der Zeechekette gouf net fonnt: $1',
	'editmsg-warning-mismatch' => '* Den Originaltext hat net den erwaartene Wert fir dës Sproochen: $1',
	'editmsg-apply-patch'      => 'Patch uwenden',
	'editmsg-patch-failed'     => 'Patch huet net fonctionnéiert mat dem Feelermessage $1',
	'editmsg-patch-success'    => 'gepatched!',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'editmsg-search' => 'തിരയുക',
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'editmessages-desc'        => 'Messages*.php संचिकेतील संदेश संपादण्यासाठी [[Special:EditMessages|आंतरजालावर आधारीत संपादन सुविधा]]',
	'editmessages'             => 'संदेश संपादा',
	'editmsg-target'           => 'लक्ष्य संदेश:',
	'editmsg-search'           => 'शोधा',
	'editmsg-show-list'        => '"$1" या नावाने असणारे संदेश दाखवित आहे',
	'editmsg-get-patch'        => 'पॅच तयार करा',
	'editmsg-new-search'       => 'नवीन शोध',
	'editmsg-warning-parse1'   => '* संदेशाचे नाव जुळले नाही: $1',
	'editmsg-warning-parse2'   => '* बाणानंतर अवतरण चिन्ह पाहिजे: $1',
	'editmsg-warning-parse3'   => '* किमतीच्या शेवटचे चिन्ह (end of string character) सापडले नाही: $1',
	'editmsg-warning-file'     => '* खालील भाषांकरीता संचिका वाचण्यात त्रुटी आलेल्या आहेत: $1',
	'editmsg-warning-mismatch' => '* खालील भाषांमध्ये मूळ मजकूरात अपेक्षित किमती सापडल्या नाहीत: $1',
	'editmsg-apply-patch'      => 'पॅच लावा',
	'editmsg-no-patch'         => '"patch" क्रिया करता आलेली नाही',
	'editmsg-patch-failed'     => '$1 अशी स्थिती दाखवून पॅच रद्द झालेला आहे',
	'editmsg-patch-success'    => 'पॅच यशस्वी.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'editmessages-desc'        => '[[Special:EditMessages|Webgebaseerd bewerken]] van grote aantallen Messages*.php-bestanden',
	'editmessages'             => 'Berichten bewerken',
	'editmsg-target'           => 'Doelbericht:',
	'editmsg-search'           => 'Zoeken',
	'editmsg-show-list'        => 'De waarden voor bericht "$1" worden weergegeven',
	'editmsg-get-patch'        => 'Patch maken',
	'editmsg-new-search'       => 'Opnieuw zoeken',
	'editmsg-warning-parse1'   => '* Berichtnaamregex niet van toepassing: $1',
	'editmsg-warning-parse2'   => '* Apostrof verwacht na pijl: $1',
	'editmsg-warning-parse3'   => '* Eind van waarde string niet gevonden: $1',
	'editmsg-warning-file'     => '* Er zijn fouten gevonden bij het lezen van de volgende talen: $1',
	'editmsg-warning-mismatch' => '* De oorspronkelijke tekst had niet de verwachte waarde voor de volgende talen: $1',
	'editmsg-apply-patch'      => 'Aanpassingen uitvoeren',
	'editmsg-no-patch'         => 'Het commando "patch" kan niet uitgevoerd worden',
	'editmsg-patch-failed'     => 'Aanpassen is mislukt met als foutcode $1',
	'editmsg-patch-success'    => 'Aanpassen geslaagd.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'editmsg-search' => 'Søk',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'editmessages-desc'        => '[[Special:EditMessages|Nettbasert redigering]] av et stort antall Messages*.php-filer',
	'editmessages'             => 'Rediger beskjeder',
	'editmsg-target'           => 'Målbeskjed:',
	'editmsg-search'           => 'Søk',
	'editmsg-show-list'        => 'Vis verdier for beskjednavnet «$1»',
	'editmsg-get-patch'        => 'Lag oppdatering',
	'editmsg-new-search'       => 'Nytt søk',
	'editmsg-warning-parse1'   => '* Regulært uttrykk for beskjednavn passer ikke: $1',
	'editmsg-warning-parse2'   => '* Sitattegn forventet etter pil: $1',
	'editmsg-warning-parse3'   => '* Slutten på verditekst ikke funnet: $1',
	'editmsg-warning-file'     => '* Fillesingsfeil ble funnet for følgende språk: $1',
	'editmsg-warning-mismatch' => '* Originalteksten hadde ikke den forventede verdien for følgende språk: $1',
	'editmsg-apply-patch'      => 'Bruk oppdatering',
	'editmsg-no-patch'         => 'Kunne ikke utføre «patch»-kommando',
	'editmsg-patch-failed'     => 'Oppdatering mislyktes med avslutningsstatus $1',
	'editmsg-patch-success'    => 'Oppdatert.',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'editmessages-desc'        => '[[Special:EditMessages|Edicion basada sur Internet]] d’un grand nombre de fichièrs Messatges*.php',
	'editmessages'             => 'Modificar los messatges',
	'editmsg-target'           => 'Messatge cibla :',
	'editmsg-search'           => 'Recercar',
	'editmsg-show-list'        => 'Afichatge de las valors pel nom del messatge « $1 »',
	'editmsg-get-patch'        => 'Crear un patch',
	'editmsg-new-search'       => 'Recèrca novèla',
	'editmsg-warning-parse1'   => '* Expression correnta del nom de messatge pas detectada : $1',
	'editmsg-warning-parse2'   => '* Caractèr de citacion esperat aprèp la sageta : $1',
	'editmsg-warning-parse3'   => '* Fin de la cadena de caractèrs pas trobada : $1',
	'editmsg-warning-file'     => "* D'errors de lectura del fichièr son estadas trobadas per las lengas seguentas : $1",
	'editmsg-warning-mismatch' => '* Lo tèxt original a pas pres la valor prevista per las lengas seguentas : $1',
	'editmsg-apply-patch'      => 'Aplicar lo patch',
	'editmsg-no-patch'         => "Impossible d'executar la comanda del « patch »",
	'editmsg-patch-failed'     => 'Fracàs del patch amb l’error de sortida $1',
	'editmsg-patch-success'    => 'Patch aplicat amb succès.',
);

/** Russian (Русский)
 * @author .:Ajvol:.
 */
$messages['ru'] = array(
	'editmessages-desc'        => '[[Special:EditMessages|Редактирование через веб-интерфейс]] большого количества файлов Messages*.php',
	'editmessages'             => 'Редактирование сообщений',
	'editmsg-target'           => 'Целевое сообщение:',
	'editmsg-search'           => 'Поиск',
	'editmsg-show-list'        => 'Отображение значений для сообщения с именем «$1»',
	'editmsg-get-patch'        => 'Создать патч',
	'editmsg-new-search'       => 'Новый поиск',
	'editmsg-warning-parse1'   => '* Не подходит регулярное выражение имени сообщения: $1',
	'editmsg-warning-parse2'   => '* Ожидается символ кавычки после стрелки: $1',
	'editmsg-warning-parse3'   => '* Не найдено окончание строки: $1',
	'editmsg-warning-file'     => '* Ошибки чтения файлов для следующих языков: $1',
	'editmsg-warning-mismatch' => '* Оригинальный текст не имеет ожидаемого значения для следующих языков: $1',
	'editmsg-apply-patch'      => 'Применить патч',
	'editmsg-no-patch'         => 'Невозможно выполнить команду «patch»',
	'editmsg-patch-failed'     => 'Применение патча завершено с ошибой, код возврата $1',
	'editmsg-patch-success'    => 'Патч успешно применён.',
);

/** Swedish (Svenska)
 * @author M.M.S.
 * @author Micke
 */
$messages['sv'] = array(
	'editmessages-desc'        => '[[Special:EditMessages|Nätbaserad redigering]] av ett stort antal Messages*.php-filer',
	'editmessages'             => 'Redigera meddelanden',
	'editmsg-target'           => 'Målmeddelande:',
	'editmsg-search'           => 'Sök',
	'editmsg-show-list'        => 'Visar värden för meddelandenamnet "$1"',
	'editmsg-get-patch'        => 'Skapa uppdatering',
	'editmsg-new-search'       => 'Ny sökning',
	'editmsg-warning-parse1'   => '* Regulärt uttryck för meddelandenamn passar inte: $1',
	'editmsg-warning-parse2'   => '* Citattecken förväntat efter pil: $1',
	'editmsg-warning-parse3'   => '* Slutet på värdetext inte hittat: $1',
	'editmsg-warning-file'     => '* Filläsningsfel hittades för följande språk: $1',
	'editmsg-warning-mismatch' => '* Orginaltexten hade inte det förväntade värdet vad gäller följande språk: $1',
	'editmsg-apply-patch'      => 'Använd uppdatering',
	'editmsg-no-patch'         => 'Kunde inte utföra "patch"-kommando',
	'editmsg-patch-failed'     => 'Uppdatering misslyckades med avslutningsstatus $1',
	'editmsg-patch-success'    => 'Uppdateringen lyckades.',
);

/** Silesian (ślůnski)
 * @author Herr Kriss
 */
$messages['szl'] = array(
	'editmsg-search' => 'Šnupej',
);

/** Tamil (தமிழ்)
 * @author Trengarasu
 */
$messages['ta'] = array(
	'editmsg-search' => 'தேடுக',
);

/** Thai (ไทย)
 * @author Passawuth
 */
$messages['th'] = array(
	'editmsg-search'       => 'ค้นหา',
	'editmsg-warning-file' => '* มีการอ่านไฟล์ผิดพลาดในภาษาดังกล่าว : $1',
);

/** Vietnamese (Tiếng Việt)
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'editmessages-desc'        => '[[Special:EditMessages|Sửa đổi]] nhiều tập tin Messages*.php cùng lúc bằng web',
	'editmessages'             => 'Sửa thông điệp',
	'editmsg-target'           => 'Thông điệp đích:',
	'editmsg-search'           => 'Tìm kiếm',
	'editmsg-show-list'        => 'Hiển thị các giá trị cho thông điệp có tên “$1”',
	'editmsg-get-patch'        => 'Tạo bản vá',
	'editmsg-new-search'       => 'Tìm kiếm mới',
	'editmsg-warning-parse1'   => '* Biểu thức chính quy của tên thông điệp không có kết quả: $1',
	'editmsg-warning-parse2'   => '* Thiếu dấu nháy sao mũi tên: $1',
	'editmsg-warning-parse3'   => '* Không tìm thấy chuỗi giá trị cuối: $1',
	'editmsg-warning-file'     => '* Lỗi đọc tập tin đối với các ngôn ngữ sau: $1',
	'editmsg-warning-mismatch' => '* Văn bản gốc không có giá trị mong đợi cho các ngôn ngữ sau: $1',
	'editmsg-apply-patch'      => 'Áp dụng bản vá',
	'editmsg-no-patch'         => 'Không thể thực hiện lệnh "vá"',
	'editmsg-patch-failed'     => 'Vá thất bại, lỗi trả về $1',
	'editmsg-patch-success'    => 'Vá thành công.',
);

