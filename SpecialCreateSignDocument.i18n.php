<?php
$allMessages = array(
	'en' => array( 
		'createsigndocument'         => 'Enable Document Signing',
		'createsigndoc-head'         => 
"Use this form to create a 'Sign Document' page for the provided article, such that
users will be able to sign it via [[Special:SignDocument]]. Please specify the name
of the article on which you wish to enable digital signing, members of which 
usergroup should be allowed to sign it, which fields you wish to be visible to users 
and which should be optional, a minimum age to require users to be to sign the 
document (no minimum if omitted), and a brief introductory text describing the 
document and providing instructions to users.

<b>There is presently no way to delete or modify signature documents after they are
created</b> without direct database access. Additionally, the text of the article 
displayed on the signature page will be the ''current'' text of the page, regardless
of changes made to it after today. Please be absolutely positive that the document
is to a point of stability for signing, and please also be sure that you specify
all fields exactly as they should be, ''before submitting this form''.",
		'createsigndoc-pagename'     => 'Page:',
		'createsigndoc-allowedgroup' => 'Allowed group:',
		'createsigndoc-email'        => 'E-mail address:',
		'createsigndoc-address'      => 'House Address:',
		'createsigndoc-extaddress'   => 'City, State, Country:',
		'createsigndoc-phone'        => 'Phone number:',
		'createsigndoc-bday'         => 'Birthdate:',
		'createsigndoc-minage'       => 'Minimum age:',
		'createsigndoc-introtext'    => 'Introduction:',
		'createsigndoc-hidden'       => 'Hidden',
		'createsigndoc-optional'     => 'Optional',
		'createsigndoc-create'       => 'Create',
		'createsigndoc-error-generic'=> 'Error: $1',
		'createsigndoc-error-pagenoexist' => 'Error: The page [[$1]] does not exist.',
		'createsigndoc-success'      => 'Document signing has been successfully enabled
on [[$1]]. To test it, please visit [{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} this page].',
	),
	'ang' => array(
		'createsigndoc-pagename' => 'Tramet:',
	),
	'ar' => array(
		'createsigndocument' => 'فعل توقيع الوثيقة',
		'createsigndoc-head' => 'استخدم هذه الوثيقة لإنشاء صفحة \'Sign Document\' للمقالة المعطاة، بحيث
يمكن للمستخدمين توقيعها من خلال [[Special:SignDocument]]. من فضلك حدد اسم
المقالة التي تود تفعيل التوقيع الرقمي عليها، أعضاء أي 
مجموعة مستخدم مسموح لهم بتوقيعها، أي حقول تود أن تكون مرئية للمستخدمين 
وأي يجب أن تكون اختيارية، عمر أدنى لمستخدمين ليمكن لهم توقيع 
الوثيقة (لا حد أدنى لو حذفت)، ونص تقديمي مختصر يصف 
الوثيقة ويوفر التعليمات للمستخدمين.

<b>لا توجد حاليا أية طريقة لحذف أو تعديل توقيعات الوثائق بعد
إنشائها</b> بدون دخول قاعدة البيانات مباشرة. إضافة إلى ذلك، نص المقالة 
المعروض في صفحة التوقيع سيكون النص \'\'الحالي\'\' للصفحة، بغض النظر عن
التغييرات بها بعد اليوم. من فضلك كن متأكدا تماما من أن الوثيقة
وصلت لنقطو ثبات للتوقيع، ومن فضلك أيضا تأكد أنك حددت
كل الحقول تماما كما يجب أن تكون، \'\'قبل تنفيذ هذه الاستمارة\'\'.',
		'createsigndoc-pagename' => 'صفحة:',
		'createsigndoc-allowedgroup' => 'المجموعة المسموحة:',
		'createsigndoc-email' => 'عنوان البريد الإلكتروني:',
		'createsigndoc-address' => 'عنوان المنزل:',
		'createsigndoc-extaddress' => 'المدينة، الولاية، البلد:',
		'createsigndoc-phone' => 'رقم الهاتف:',
		'createsigndoc-bday' => 'تاريخ الميلاد:',
		'createsigndoc-minage' => 'العمر الأدنى:',
		'createsigndoc-introtext' => 'مقدمة:',
		'createsigndoc-hidden' => 'مخفية',
		'createsigndoc-optional' => 'اختياري',
		'createsigndoc-create' => 'أنشيء',
		'createsigndoc-error-generic' => 'خطأ: $1',
		'createsigndoc-error-pagenoexist' => 'خطأ: الصفحة [[$1]] غير موجودة.',
		'createsigndoc-success' => 'توقيع الوثيقة تم تفعيله بنجاح على [[$1]]. لاختباره، من فضلك زر [{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} هذه الصفحة].',
	),
	'bcl' => array(
		'createsigndoc-pagename' => 'Páhina:',
		'createsigndoc-bday' => 'Kamondágan:',
		'createsigndoc-create' => 'Maggibo',
		'createsigndoc-error-generic' => 'Salâ: $1',
	),
	'ext' => array(
		'createsigndoc-pagename' => 'Páhina:',
		'createsigndoc-allowedgroup' => 'Alabán premitiu:',
		'createsigndoc-optional' => 'Ocional',
		'createsigndoc-create' => 'Creal',
		'createsigndoc-error-pagenoexist' => 'Marru: La páhina [[$1]] nu desisti.',
	),
	'fr' => array(
		'createsigndocument' => 'Activer l\'authentification des documents',
		'createsigndoc-head' => 'Utiliser ce formulaire pour créer une page d\'authentification de documents pour l\'article en question, de façon que chaque utilisateur sera capable d\'authentifier via [[Special:SignDocument]]. Prière d\'indiquer le nom de l\'article pour lequel vous souhaitez activer la fonction, les membres du groupe d\'utilisateurs, quels champs seront accessibles aux utilisateurs (lesquels seront optionnels), l\'âge minimal pour être membre du groupe (pas de minimum sinon) et un bref document expliquant le document et donnant des instructions aux utilisateurs.

\'\'\'Présentement, il n\'y a aucun moyen d\'effacer les documents une fois créés\'\'\', sauf en éditant la base de données du wiki. De plus, le texte de l\'article affiché sur la page authentifiée sera le texte \'\'courant\'\', peu importe les modifications faites par après. Pour cette raison, soyez certain que le document est sufisamment stable pour être authentifié et, \'\'avant de soumettre le formulaire\'\', vérifiez que vous avez bien choisi les champs tels que vous souhaitez qu\'ils soient.',
		'createsigndoc-pagename' => 'Page :',
		'createsigndoc-allowedgroup' => 'Groupe authorisé :',
		'createsigndoc-email' => 'Addresse de courriel :',
		'createsigndoc-address' => 'Adresse résidentielle :',
		'createsigndoc-extaddress' => 'Ville, état (département ou province), pays :',
		'createsigndoc-phone' => 'Numéro de téléphone :',
		'createsigndoc-bday' => 'Date de naissance :',
		'createsigndoc-minage' => 'Âge minimum :',
		'createsigndoc-introtext' => 'Introduction :',
		'createsigndoc-hidden' => 'Caché',
		'createsigndoc-optional' => 'Optionnel',
		'createsigndoc-create' => 'Créer',
		'createsigndoc-error-generic' => 'Erreur : $1',
		'createsigndoc-error-pagenoexist' => 'La page [[$1]] n\'existe pas.',
		'createsigndoc-success' => 'L\'authentification des documents est activée sur [[$1]]. Pour la tester, voir [{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} cette page].',
	),
	'gl' => array(
		'createsigndocument' => 'Habilitar a Sinatura de Documentos',
		'createsigndoc-head' => 'Empregue este formulario para crear unha páxina "Asinar Documento" para o artigo relacionado, de tal
xeito que os usuarios o poidan asinar mediante [[Special:SignDocument]]. Especifique o nome
do artigo no que quere activar a sinatura dixital, os membros de que grupo de usuariores poden
asinalo, que campos lles resultan visíbeis aos usuarios e cales han de ser optativos, a idade
mínima que se lles esixe aos usuarios para asinar o documento (sen mínimo se se omitir) e un
texto introdutorio breve que describa o documento e lles dea instrucións aos usuarios.

<b>Actualmente non resulta posíbel eliminar ou modificar os documentos de sinatura unha vez que sexan
creados</b> sen acceso directo á base de datos. Ademais, o texto do artigo que se mostra na páxina de
sinaturas será o texto \'\'actual\'\' da páxina, independentemente das modificacións que se lle fagan despois
de hoxe. Asegúrese ben de que o documento está en situación de estabilidade antes de asinalo e asegúrese
tamén de que especifica todos os campos exactamente como han de ser \'\'antes de enviar este formulario\'\'.',
		'createsigndoc-pagename' => 'Páxina:',
		'createsigndoc-allowedgroup' => 'Grupo permitido:',
		'createsigndoc-email' => 'Enderezo electrónico:',
		'createsigndoc-address' => 'Enderezo familiar:',
		'createsigndoc-extaddress' => 'Cidade, Estado, País:',
		'createsigndoc-phone' => 'Número de teléfono:',
		'createsigndoc-bday' => 'Aniversario:',
		'createsigndoc-minage' => 'Idade minima:',
		'createsigndoc-introtext' => 'Introdución:',
		'createsigndoc-hidden' => 'Oculto',
		'createsigndoc-optional' => 'Opcional',
		'createsigndoc-create' => 'Crear',
		'createsigndoc-error-generic' => 'Erro: $1',
		'createsigndoc-error-pagenoexist' => 'Erro: A páxina [[$1]] non existe.',
		'createsigndoc-success' => 'O documento asinado foi habilitado con exito en [[$1]]. Para comprobalo, visite [{{SERVER}}{{localurl: Special: SignDocument|doc=$2}} esta páxina].',
	),
	'hsb' => array(
		'createsigndocument' => 'Podpisanje dokumentow zmóžnić',
		'createsigndoc-head' => 'Wužij tutón formular, zo by stronu \'Podpisny dokument\' za wotpowědny nastawk wutworił, zo by wužiwarjo přez [[Special:Signdocument]] podpisać móhli. Prošu podaj mjeno nastawka, na kotrymž chceš digatalny podpis zmóžnił, kotři čłonojo kotreje wužiwarskeje skupiny smědźa tam podpisać, kotre pola wužiwarjo smědźa widźeć a kotre měli opcionalne być, trěbnu minimalnu starobu za podpisanje dokumenta (njeje minimum, jeli žane podaće njeje) a krótki zawodny tekst, kotryž tutón dokumement wopisuje a wužiwarjam pokiwy poskića.

<b>Tuchwilu bjez přistupa k datowej bance žana móžnosć njeje, zo bychu so podpisne dokumenty zničili abo změnili, po tym zo su wutworjene.</b> Nimo toho budźe tekst, kotryž so na podpisnej stronje zwobraznja, \'\'aktualny\'\' tekst strony, njedźiwajo na změny ščinjene pozdźišo. Prošu budźe tebi absolutnje wěsty, zo je tutón dokument za podpisanje stabilny dosć, a zawěsć so tež, zo sy wšě pola takle kaž trjeba wupjelnił, \'\'prjedy hač tutón formular wotesćele\'\'.',
		'createsigndoc-pagename' => 'Strona:',
		'createsigndoc-allowedgroup' => 'Dowolena skupina:',
		'createsigndoc-email' => 'E-mejlowa adresa:',
		'createsigndoc-address' => 'Bydlenska adresa:',
		'createsigndoc-extaddress' => 'Město, stat, kraj:',
		'createsigndoc-phone' => 'Telefonowe čisło:',
		'createsigndoc-bday' => 'Narodniny:',
		'createsigndoc-minage' => 'Minimalna staroba:',
		'createsigndoc-introtext' => 'Zawod:',
		'createsigndoc-hidden' => 'Schowany',
		'createsigndoc-optional' => 'Opcionalny',
		'createsigndoc-create' => 'Wutworić',
		'createsigndoc-error-generic' => 'Zmylk: $1',
		'createsigndoc-error-pagenoexist' => 'Zmylk: Strona [[$1]] njeeksistuje.',
		'createsigndoc-success' => 'Podpisanje dokumentow bu wuspěšnje na [[$1]]aktiwizowane. Zo by je testował, wopytaj prošu [{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} tutu stronu:].',
	),
	'la' => array(
		'createsigndoc-pagename' => 'Pagina:',
		'createsigndoc-error-pagenoexist' => 'Error: Pagina [[$1]] non existit.',
	),
	'nl' => array( 
		'createsigndocument'         => 'Documentondertekening inschakelen',
		'createsigndoc-head'         => 
"Gebruik dit formulier om een pagina 'Document ondertekenen' voor een gegeven
pagina te maken, zodat gebruikers het kunnen ondertekenen via
[[Special:SignDocument]]. Geef alstublieft op voor welke pagina u digitaal
ondertekenen wilt inschakelen, welke gebruikersgroepen kunnen ondertekeken,
welke velden zichtbaar moeten zijn voor gebruikers en welke optioneel zijn,
een minimale leeftijd waaraan gebruikers moeten voldoen alvorens te kunnen
ondertekenen (geen beperkingen als leeg gelaten), en een korte inleidende
tekst over het document en instructies voor de gebruikers.

<b>Er is op het moment geen mogelijkheid om te ondertekenen documenten te
verwijderen of te wijzigen nadat ze zijn aangemaakt</b> zonder directe
toegang tot de database. Daarnaast is de tekst van de pagina die wordt
weergegeven op de ondertekeningspagina de ''huidige'' tekst van de pagina,
ongeacht de wijzigingen die erna gemaakt worden. Zorg er alstublieft voor
dat het document een stabiele versie heeft voordat u ondertekenen inschakelt,
en zorg er alstublieft voor dat alle velden de juiste waarden hebben
''voordat u het formulier instuurt''.",
		'createsigndoc-pagename'     => 'Pagina:',
		'createsigndoc-allowedgroup' => 'Toegelaten groep:',
		'createsigndoc-email'        => 'E-mailadres:',
		'createsigndoc-address'      => 'Adres:',
		'createsigndoc-extaddress'   => 'Stad, staat, land:',
		'createsigndoc-phone'        => 'Telefoonnummer:',
		'createsigndoc-bday'         => 'Geboortedatum:',
		'createsigndoc-minage'       => 'Minimum leeftijd:',
		'createsigndoc-introtext'    => 'Inleiding:',
		'createsigndoc-hidden'       => 'Verborgen',
		'createsigndoc-optional'     => 'Optioneel',
		'createsigndoc-create'       => 'Aanmaken',
		'createsigndoc-error-generic'=> 'Fout: $1',
		'createsigndoc-error-pagenoexist' => 'Error: De pagina [[$1]] bestaat niet.',
		'createsigndoc-success'      => 'Documentondertekening is ingeschakeld op
[[$1]]. Ga alstublieft naar [{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} deze pagina] om het te testen.',
	),
	'pl' => array(
		'createsigndoc-pagename' => 'Strona:',
		'createsigndoc-email' => 'Adres e-mail:',
		'createsigndoc-phone' => 'Numer telefonu:',
		'createsigndoc-bday' => 'Data urodzenia:',
		'createsigndoc-error-generic' => 'Błąd: $1',
		'createsigndoc-error-pagenoexist' => 'Błąd: Strona [[$1]] nie istnieje',
	),
	'pms' => array(
		'createsigndocument' => 'Visché la firma digital ëd na pàgina coma document',
		'createsigndoc-head' => 'Ch\'a dòvra la domanda ambelessì sota për visché l\'opsion ëd \'Firma Digital\' ëd n\'artìcol, ch\'a lassa che j\'utent a peulo firmé ën dovrand la fonsion ëd [[Special:SignDocument|firma digital]]. 

Për piasì, ch\'an buta:
*ël nòm dl\'artìcol andova ch\'a veul visché la fonsion ëd firma digital, 
*ij component ëd che partìa d\'utent ch\'a resto aotorisà a firmé, 
*che camp ch\'a debio smon-se a j\'utent e coj ch\'a debio resté opsionaj, 
*n\'eta mìnima përché n\'utent a peula firmé (a peulo tuti s\'a buta nen ël mìnim), 
*un cit ëspiegon ch\'a disa lòn ch\'a l\'é ës document e ch\'a-j disa a j\'utent coma fé. 

Anans che dovré sossì ch\'a ten-a present che:
#<b>Për adess a-i é gnun-a manera dë scancelé ò modifiché ij document ch\'as mando an firma, na vira ch\'a sio stait creà</b> sensa dovej travajé ant sla base dat da fòra. 
#Ël test smonù ant sla pàgina an firma a resta col ëd quand as anandio a cheuje le firme, donca la version \'\'corenta\'\' al moment ch\'as fa sossì, e qualsëssìa modìfica ch\'as fasa peuj \'\'\'an firma a la riva pì nen\'\'\'. 

Për piasì, ch\'a varda d\'avej controlà sò test coma ch\'as dev anans che mandelo an firma, e ch\'a varda che tuti ij camp a sio coma ch\'a-j ven-o bin a chiel, \'\'anans dë mandé la domanda\'\'.',
		'createsigndoc-pagename' => 'Pàgina:',
		'createsigndoc-allowedgroup' => 'Partìe d\'utent ch\'a peulo firmé:',
		'createsigndoc-email' => 'Adrëssa ëd pòsta eletrònica',
		'createsigndoc-address' => 'Adrëssa ëd ca:',
		'createsigndoc-extaddress' => 'Sità, Provinsa, Stat:',
		'createsigndoc-phone' => 'Nùmer ëd telèfono:',
		'createsigndoc-bday' => 'Nait(a) dël:',
		'createsigndoc-minage' => 'Età mìnima:',
		'createsigndoc-introtext' => 'Spiegon:',
		'createsigndoc-hidden' => 'Stërmà',
		'createsigndoc-optional' => 'Opsional',
		'createsigndoc-create' => 'Buté an firma',
		'createsigndoc-error-generic' => 'Eror: $1',
		'createsigndoc-error-pagenoexist' => 'Eror: a-i é pa gnun-a pàgina ch\'as ciama [[$1]].',
		'createsigndoc-success' => 'La procedura për buté an firma [[$1]] a l\'é andaita a bonfin. Për provela, për piasì ch\'a varda [{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} ambelessì].',
	),
);
?>
