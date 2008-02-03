<?php
/**
 * Internationalisation file for extension ImportFreeImages.
 *
 * @addtogroup Extensions
*/

$messages = array();

/* English
 * @author ravis Derouin
 */
$messages['en'] = array(
	'importfreeimages'                => 'Import Free Images',
	'importfreeimages_description'    => 'This page allows you to search properly licensed photos from flickr and import them into your wiki.',
	'importfreeimages_noapikey'       => 'You have not configured your Flickr API Key. To do so, please obtain a API key from  [http://www.flickr.com/services/api/misc.api_keys.html here] and set wgFlickrAPIKey in ImportFreeImages.php.',
	'importfreeimages_nophotosfound'  => 'No photos were found for your search criteria \'$1\', please try again.',
	'importfreeimages_owner'          => 'Author',
	'importfreeimages_importthis'     => 'import this',
	'importfreeimages_next'           => 'Next $1',
	'importfreeimages_filefromflickr' => '$1 by user <b>[$2]</b> from flickr. Original URL',
	'importfreeimages_promptuserforfilename' => 'Please enter a destination filename:',
	'importfreeimages_returntoform'   => 'Or, click <a href=\'$1\'>here</a> to return to your search results',
);

$messages['ar'] = array(
	'importfreeimages'              => 'استيراد صور حرة',
	'importfreeimages_description'  => 'هذه الصفحة تسمح لك بالبحث في الصور المرخصة جيدا من فلكر واستيرادها إلى الويكي الخاص بك.',
	'importfreeimages_noapikey'     => 'لم تقم بضبط مفتاح API فلكر الخاص بك. لفعل هذا، من فضلك احصل على مفتاح API من  [http://www.flickr.com/services/api/misc.api_keys.html هنا] واضبط wgFlickrAPIKey في ImportFreeImages.php.',
	'importfreeimages_nophotosfound' => 'لا صور تم العثور عليها لمدخلة البحث الخاصة بك \'$1\'، من فضلك حاول مرة ثانية.',
	'importfreeimages_owner'        => 'المؤلف',
	'importfreeimages_importthis'   => 'استورد هذا',
	'importfreeimages_next'         => '$1 التالي',
	'importfreeimages_filefromflickr' => '$1 بواسطة المستخدم <b>[$2]</b> من فلكر. المسار الأصلي',
	'importfreeimages_promptuserforfilename' => 'من فضلك أدخل اسما لتخزين الملف به:',
	'importfreeimages_returntoform' => 'أو، اضغط <a href=\'$1\'>هنا</a> للعودة إلى نتائج بحثك',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Spiritia
 */
$messages['bg'] = array(
	'importfreeimages'                       => 'Внасяне на свободни картинки',
	'importfreeimages_description'           => 'Тази страница позволява търсенето на подходящо лицензирани картинки от flickr и качването им в уикито.',
	'importfreeimages_noapikey'              => 'Не е конфигуриран Flickr API ключ. Такъв API ключ може да се получи [http://www.flickr.com/services/api/misc.api_keys.html оттук], след което е необходимо да се настрои wgFlickrAPIKey в ImportFreeImages.php.',
	'importfreeimages_nophotosfound'         => "Не бяха открити резултати за търсенето ви по критерия '$1'. Моля, опитайте отново.",
	'importfreeimages_owner'                 => 'Автор',
	'importfreeimages_next'                  => 'Следващи $1',
	'importfreeimages_promptuserforfilename' => 'Моля, въведете целево име на файла:',
	'importfreeimages_returntoform'          => "Или щракнете <a href='$1'>тук</a> за да се върнете към резултати от търсенето си",
);

$messages['de'] = array(
	'importfreeimages'                => 'Import freier Bilder',
	'importfreeimages_description'    => 'Diese Seite erlaubt dir, auf Flickr nach Bildern unter einer freien Lizenz zu suchen und diese in dein Wiki zu importieren.',
	'importfreeimages_noapikey'       => 'Du hast noch keinen Flickr-API-Schlüssel konfiguriert. Bitte beantrage ihn [http://www.flickr.com/services/api/misc.api_keys.html hier] und setze ihn in $wgFlickrAPIKey in ImportFreeImages.php ein.',
	'importfreeimages_nophotosfound'  => 'Es wurden keine Fotos mit den Suchkriterien „$1“ gefunden.',
	'importfreeimages_owner'          => 'Autor',
	'importfreeimages_importthis'     => 'importieren',
	'importfreeimages_next'           => 'Nächste $1',
	'importfreeimages_filefromflickr' => '$1 von Benutzer <b>[$2]</b> von flickr. Original URL',
	'importfreeimages_promptuserforfilename' => 'Bitte gebe einen Ziel-Dateinamen ein:',
	'importfreeimages_returntoform'   => 'Oder klicke <a href=\'$1\'>hier</a>, um zu der Seite mit den Suchergebnissen zurückzukommen.',
);

		/*French (Bertrand GRONDIN)*/
$messages['fr'] = array(
	'importfreeimages'                => 'Importer des Images Libres',
	'importfreeimages_description'    => 'Cette page vous permet de rechercher proprement des images sous licences depuis flickr et de les importer dans votre wiki.',
	'importfreeimages_noapikey'       => 'Vous n’avez pas configuré votre Clef API Flickr. Pour ce faire, vous êtes prié d’obtenir une clef API à partir de [http://www.flickr.com/services/api/misc.api_keys.html ce lien] et de configurer wgFlickrAPIKey dans ImportFreeImages.php.',
	'importfreeimages_nophotosfound'  => 'Aucune photo n’a été trouvée à partir de vos critères de recherches  \'$1\', veuillez essayer à nouveau.',
	'importfreeimages_owner'          => 'Auteur',
	'importfreeimages_importthis'     => 'l’importer',
	'importfreeimages_next'           => ' $1 suivants',
	'importfreeimages_filefromflickr' => '$1 par l’utilisateur <b>[$2]</b> depuis flickr. URL d’origine ',
	'importfreeimages_promptuserforfilename' => 'Veuillez indiquer le nom du fichier de destination : ',
	'importfreeimages_returntoform'   => 'ou, cliquez <a href=\'$1\'>ici</a> pour revenir à votre liste de résultats.',
);

$messages['gl'] = array(
	'importfreeimages'              => 'Importar Imaxes Libres',
	'importfreeimages_description'  => 'Esta páxina permítelle procurar fotos de flickr con licenza correcta e importalos ao seu wiki.',
	'importfreeimages_nophotosfound' => 'Ningunhas fotos foron atopadas cos criterios \'$1\' de procura, ténteo de novo.',
	'importfreeimages_owner'        => 'Autor',
	'importfreeimages_importthis'   => 'importar isto',
	'importfreeimages_next'         => 'Seguinte $1',
	'importfreeimages_filefromflickr' => '$1 polo usuario <b>[$2]</b> de flickr. Orixinal URL',
	'importfreeimages_promptuserforfilename' => 'Introduza un nome de ficheiro de destino:',
	'importfreeimages_returntoform' => 'Ou, prema <a href=\'$1\'>here</a> para voltar á súa procura de resultados',
);

$messages['hsb'] = array(
	'importfreeimages'              => 'Swobodne wobrazy importować',
	'importfreeimages_description'  => 'Tuta strona ći dowola na Flickr za wobrazami z prihódnej ličencu pytać a je do swojeho wiki importować.',
	'importfreeimages_noapikey'     => 'Njejsy swój kluč Flickr API konfigurował. Prošu požadaj jón [http://www.flickr.com/services/api/misc.api_keys.html jowle] a nastaj $wgFlickrAPIKey w ImportFreeImages.php.',
	'importfreeimages_nophotosfound' => 'Njejsu so žane fota za twoje pytanske kriterije "$1" namakali.',
	'importfreeimages_owner'        => 'Awtor',
	'importfreeimages_importthis'   => 'importować',
	'importfreeimages_next'         => 'Přichodny $1',
	'importfreeimages_filefromflickr' => '$1 wot wužiwarja <b>[$2]</b> z flickra. Originalny URL',
	'importfreeimages_promptuserforfilename' => 'Prošu zapodaj mjeno ciloweje dataje:',
	'importfreeimages_returntoform' => 'Abo klikń <a href=\'$1\'>sem</a>, zo by k stronje z pytanskimi wuslědkami wróćił.',
);

/** Hungarian (Magyar)
 * @author Bdanee
 */
$messages['hu'] = array(
	'importfreeimages'                       => 'Szabad képek importálása',
	'importfreeimages_description'           => 'Ez az oldal lehetővé teszi számodra megfelelően licencelt flickr képek keresését és importálását a wikidbe.',
	'importfreeimages_noapikey'              => 'Nem állítottad be a Flickr API kulcsodat. Ahhoz, hogy ezt megtedd, kérj egy API kulcsot
[http://www.flickr.com/services/api/misc.api_keys.html innen], majd állítsd be a wgFlickrAPIKey értékét a ImportFreeImages.php-ben.',
	'importfreeimages_nophotosfound'         => 'Nem találtam a keresési feltételeidnek ($1) megfelelő képet, próbáld újra.',
	'importfreeimages_owner'                 => 'Szerző',
	'importfreeimages_importthis'            => 'importálás',
	'importfreeimages_next'                  => 'Következő $1',
	'importfreeimages_filefromflickr'        => '$1 <b>[$2]</b> felhasználótól a flickr-ről. Eredeti URL',
	'importfreeimages_promptuserforfilename' => 'Add meg a cél fájlnevet:',
	'importfreeimages_returntoform'          => "Vagy kattints <a href='$1'>ide</a>, hogy visszatérj az eredmények listájához",
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'importfreeimages_owner' => 'Auteur:',
);

$messages['nl'] = array(
	'importfreeimages'              => 'Vrije afbeeldingen importeren',
	'importfreeimages_description'  => 'Deze pagina laat u toe om juist gelicenseerde foto\'s van flickr te zoeken and die te importeren naar uw wiki.',
	'importfreeimages_noapikey'     => 'U heeft geen Flickr API Key ingesteld. U kunt een API-sleutel [http://www.flickr.com/services/api/misc.api_keys.html hier] verkrijgen en instellen als wgFlickrAPIKey in ImportFreeImages.php.',
	'importfreeimages_nophotosfound' => 'Er zijn geen foto\'s gevonden voor uw zoekcriteria \'$1\', probeer opniew.',
	'importfreeimages_owner'        => 'Auteur',
	'importfreeimages_importthis'   => 'dit importeren',
	'importfreeimages_next'         => 'Volgende $1',
	'importfreeimages_filefromflickr' => '$1 door gebruiker <b>[$2]</b> van flickr. Oorspronkelijke URL',
	'importfreeimages_promptuserforfilename' => 'Gelieve een bestandsnaam op te geven:',
	'importfreeimages_returntoform' => 'Of, klik <a href=\'$1\'>hier</a> om terug te keren naar uw zoekresultaten',
);

$messages['no'] = array(
	'importfreeimages'              => 'Imperter frie bilder',
	'importfreeimages_description'  => 'Denne siden lar deg søke i bilder med riktig lisens på Flickr og importere dem til wikien din.',
	'importfreeimages_noapikey'     => 'Du har ikke konfigurert API-nøkkelen din for Flickr. For å gjøre det må du skaffe en API-nøkkel [http://www.flickr.com/services/api/misc.api_keys.html herfra] og sette wgFlickrAPIKey i ImportFreeImages.php.',
	'importfreeimages_nophotosfound' => 'Ingen bilder ble funnet for søket «$1». Prøv igjen.',
	'importfreeimages_owner'        => 'Opphavsperson',
	'importfreeimages_importthis'   => 'importer',
	'importfreeimages_next'         => 'Neste $1',
	'importfreeimages_filefromflickr' => '$1 av brukeren <b>[$2]</b> fra Flickr. Original URL',
	'importfreeimages_promptuserforfilename' => 'Skriv inn et målnavn for filen:',
	'importfreeimages_returntoform' => 'Elle rklikk <a href="$1">her</a> for å gå tilbake til søkeresultatene',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'importfreeimages'                       => "Importar d'Imatges Liures",
	'importfreeimages_description'           => "Aquesta pagina vos permet de recercar propriament d'imatges jos licéncias dempuèi flickr e de los importar dins vòstre wiki.",
	'importfreeimages_noapikey'              => "Avètz pas configurat vòstra Clau API Flickr. Per o far, obtengatz una clau API a partir d' [http://www.flickr.com/services/api/misc.api_keys.html aqueste ligam] e configuratz wgFlickrAPIKey dins ImportFreeImages.php.",
	'importfreeimages_nophotosfound'         => "Cap de fòto es pas estada trobada a partir de vòstres critèris de recèrcas '$1', ensajatz tornamai.",
	'importfreeimages_owner'                 => 'Autor',
	'importfreeimages_importthis'            => 'l’importar',
	'importfreeimages_next'                  => '$1 seguents',
	'importfreeimages_filefromflickr'        => '$1 per l’utilizaire <b>[$2]</b> dempuèi flickr. URL d’origina',
	'importfreeimages_promptuserforfilename' => 'Indicatz lo nom del fichièr de destinacion',
	'importfreeimages_returntoform'          => "o, clicatz <a href='$1'>aicí</a> per tornar a vòstra lista de resultats.",
);

/** Portuguese (Português)
 * @author Malafaya
 */
$messages['pt'] = array(
	'importfreeimages_owner' => 'Autor',
);

/** Russian (Русский)
 * @author .:Ajvol:.
 */
$messages['ru'] = array(
	'importfreeimages'                       => 'Импортирование свободных изображений',
	'importfreeimages_description'           => 'С помощью этой страницы вы можете искать должным образом лицензированные фотографии с Flickr и импортировать их в эту вики.',
	'importfreeimages_noapikey'              => 'Вы не настроили ваш Flickr API-ключ. Чтобы это сделать, пожалуйста, получите API-ключ [http://www.flickr.com/services/api/misc.api_keys.html здесь] и установите wgFlickrAPIKey в ImportFreeImages.php.',
	'importfreeimages_nophotosfound'         => 'Не найдено фотографий по условию «$1», попробуйте ещё раз.',
	'importfreeimages_owner'                 => 'Автор',
	'importfreeimages_importthis'            => 'Импортировать это',
	'importfreeimages_next'                  => 'Следующие $1',
	'importfreeimages_filefromflickr'        => '$1 авторства <b>[$2]</b> с Flickr. Исходный адрес',
	'importfreeimages_promptuserforfilename' => 'Пожалуйста, введите новое имя файла:',
	'importfreeimages_returntoform'          => "Или нажмите <a href='$1'>здесь</a>, чтобы вернуться к вашим результатам поиска.",
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'importfreeimages'                       => 'Importovať slobodné obrázky',
	'importfreeimages_description'           => 'Táto stránka vám umožní importovať správne licencované obrázky z flickr a importovať ich na vašu wiki.',
	'importfreeimages_noapikey'              => 'Nenakonfigurovali ste kľúč API Flickr. Urobíte tak po získaní kľúča API [http://www.flickr.com/services/api/misc.api_keys.html odtiaľto] a nastavení premennej wgFlickrAPIKey v ImportFreeImages.php.',
	'importfreeimages_nophotosfound'         => 'Neboli nájdené žiadne obrázky zodpovedajúce vašim kritériám vyhľadávania „$1“. Prosím, skúste to znova.',
	'importfreeimages_owner'                 => 'Autor',
	'importfreeimages_importthis'            => 'importovať toto',
	'importfreeimages_next'                  => 'Ďalších $1',
	'importfreeimages_filefromflickr'        => '$1 od používateľa <b>[$2]</b> z flickr. Pôvodný URL',
	'importfreeimages_promptuserforfilename' => 'prosím, zadajte cieľový názov súboru:',
	'importfreeimages_returntoform'          => "Alebo sa vráťte na <a href='$1'>výsledky vášho vyhľadávania</a>",
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'importfreeimages'                       => 'Import fon fräie Bielden',
	'importfreeimages_description'           => 'Disse Siede ferlööwet die, ap Flickr ätter Bielden unner ne fräie Lizenz tou säiken un do in dien Wiki tou importierjen.',
	'importfreeimages_noapikey'              => 'Du hääst noch naan Flickr-API-Koai konfigurierd. Jädden beandraach him [http://www.flickr.com/services/api/misc.api_keys.html hier] un sät him in $wgFlickrAPIKey in ImportFreeImages.php ien.',
	'importfreeimages_nophotosfound'         => 'Der wuuden neen Fotos mäd do Säikkriterien „$1“ fuunen.',
	'importfreeimages_owner'                 => 'Autor',
	'importfreeimages_importthis'            => 'importierje',
	'importfreeimages_next'                  => 'Naiste $1',
	'importfreeimages_filefromflickr'        => '$1 fon Benutser <b>[$2]</b> fon flickr. Originoal URL',
	'importfreeimages_promptuserforfilename' => 'Reek n Siel-Doatäinoome ien:',
	'importfreeimages_returntoform'          => "Of klik <a href='$1'>hier</a>, uum tou ju Siede mäd do Säikresultoate touräächtoukuumen.",
);

/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'importfreeimages_owner'          => 'Lautan',
	'importfreeimages_next'           => 'Sököl $1',
	'importfreeimages_filefromflickr' => "$1 fa geban: <b>[$2]</b> de 'flickr'. 'URL' rigik",
);

