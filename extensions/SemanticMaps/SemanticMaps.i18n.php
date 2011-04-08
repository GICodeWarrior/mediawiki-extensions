<?php

/**
 * Internationalization file for the Semantic Maps extension
 *
 * @file SemanticMaps.i18n.php
 * @ingroup Semantic Maps
 *
 * @author Jeroen De Dauw
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	// General
	'semanticmaps-desc' => "Provides the ability to view and edit coordinate data stored with the Semantic MediaWiki extension ([http://mapping.referata.com/wiki/Examples demo's]).",
	'semanticmaps-unrecognizeddistance' => 'The value $1 is not a valid distance.',
	'semanticmaps-kml-link' => 'View the KML file',
	'semanticmaps-kml' => 'KML',
	'semanticmaps-default-kml-pagelink' => 'View page $1',

	// Forms
	'semanticmaps-loading-forminput'	=> 'Loading map form input...',
	'semanticmaps_lookupcoordinates' 	=> 'Look up coordinates',
	'semanticmaps_enteraddresshere' 	=> 'Enter address here',
	'semanticmaps-updatemap' 			=> 'Update map',
	'semanticmaps_notfound' 			=> 'not found',
	'semanticmaps-forminput-remove'		=> 'Remove',
	'semanticmaps-forminput-add'		=> 'Add',
	'semanticmaps-forminput-locations'	=> 'Locations',
	
	// Parameter descriptions
	'semanticmaps_paramdesc_format' 	=> 'The mapping service used to generate the map',
	'semanticmaps_paramdesc_geoservice' => 'The geocoding service used to turn addresses into coordinates',
	'semanticmaps_paramdesc_height' 	=> 'The height of the map, in pixels (default is $1)',
	'semanticmaps_paramdesc_width' 		=> 'The width of the map, in pixels (default is $1)',
	'semanticmaps_paramdesc_zoom' 		=> 'The zoom level of the map',
	'semanticmaps_paramdesc_centre' 	=> 'The coordinates of the maps\' centre',
	'semanticmaps_paramdesc_controls' 	=> 'The user controls placed on the map',
	'semanticmaps_paramdesc_types' 		=> 'The map types available on the map',
	'semanticmaps_paramdesc_type' 		=> 'The default map type for the map',
	'semanticmaps_paramdesc_overlays' 	=> 'The overlays available on the map',
	'semanticmaps_paramdesc_autozoom' 	=> 'If zoom in and out by using the mouse scroll wheel is enabled',
	'semanticmaps_paramdesc_layers' 	=> 'The layers available on the map',
	
	'semanticmaps-par-staticlocations'	=> 'A list of locations to add to the map together with the queried data. Like with display_points, you can add a title, description and icon per location using the tilde "~" as separator.',
	'semanticmaps-par-forceshow'		=> 'Show the map even when there are no locations to display?',
	'semanticmaps-par-showtitle'		=> 'Show a title in the marker info window or not. Disabling this is often usefull when using a template to format the info window content.',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author Purodha
 * @author Raymond
 */
$messages['qqq'] = array(
	'semanticmaps-desc' => '{{desc}}',
	'semanticmaps-forminput-remove' => '{{Identical|Remove}}',
	'semanticmaps-forminput-add' => '{{Identical|Add}}',
	'semanticmaps-forminput-locations' => '{{Identical|Location}}',
	'semanticmaps_paramdesc_overlays' => 'An "overlay" is a map layer, containing icons or images, or whatever, to enrich, in this case, the map. Could for example be a layer with speed cameras, or municipality borders.',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'semanticmaps-desc' => 'Bied die vermoë om koördinaatdata met behulp van die Semantiese MediaWiki-uitbreiding te sien en te wysig ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'Die waarde "$1" is nie \'n geldige afstand nie.',
	'semanticmaps_lookupcoordinates' => 'Soek koördinate op',
	'semanticmaps_enteraddresshere' => 'Voer adres hier in',
	'semanticmaps_notfound' => 'nie gevind nie',
	'semanticmaps_paramdesc_format' => 'Die kaartdiens wat die kaart lewer',
	'semanticmaps_paramdesc_geoservice' => 'Die geokoderingsdiens gebruik om adresse na koördinate om te skakel',
	'semanticmaps_paramdesc_height' => 'Die hoogte van die kaart in spikkels (standaard is $1)',
	'semanticmaps_paramdesc_width' => 'Die breedte van die kaart in spikkels (standaard is $1)',
	'semanticmaps_paramdesc_zoom' => 'Die zoom-vlak van die kaart',
	'semanticmaps_paramdesc_centre' => 'Die koördinate van die middel van die kaart',
	'semanticmaps_paramdesc_controls' => 'Die gebruikerskontroles op die kaart geplaas',
	'semanticmaps_paramdesc_types' => 'Die kaarttipes beskikbaar op die kaart',
	'semanticmaps_paramdesc_type' => 'Die standaard kaarttipe vir die kaart',
	'semanticmaps_paramdesc_overlays' => 'Die oorleggings beskikbaar op die kaart',
	'semanticmaps_paramdesc_autozoom' => 'Of in- en uitzoom met die muis se wiel moontlik is',
	'semanticmaps_paramdesc_layers' => 'Die lae beskikbaar op die kaart',
);

/** Gheg Albanian (Gegë)
 * @author Mdupont
 */
$messages['aln'] = array(
	'semanticmaps_paramdesc_zoom' => 'Shkalla e zmadhimit Harta',
	'semanticmaps_paramdesc_centre' => "Koordinatat e qendrës hartave '",
	'semanticmaps_paramdesc_controls' => 'Perdoruesi kontrolleve të vendosura në hartë',
	'semanticmaps_paramdesc_types' => 'Llojet Harta dispozicion në hartë',
	'semanticmaps_paramdesc_type' => 'Harta default lloji për hartën',
	'semanticmaps_paramdesc_overlays' => 'Overlays në dispozicion në hartë',
	'semanticmaps_paramdesc_autozoom' => 'Nëse zoom brenda dhe jashtë duke përdorur rrotëzën miut është i aktivizuar',
	'semanticmaps_paramdesc_layers' => 'Shtresat në dispozicion në hartë',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'semanticmaps-desc' => 'يقدم إمكانية عرض وتعديل بيانات التنسيق التي خزنها امتداد سيمانتيك ميدياويكي ([http://mapping.referata.com/wiki/Examples تجربة]).',
	'semanticmaps-kml' => 'كيه إم إل',
	'semanticmaps_lookupcoordinates' => 'ابحث عن الإحداثيات',
	'semanticmaps_enteraddresshere' => 'أدخل العنوان هنا',
	'semanticmaps_notfound' => 'لم يوجد',
	'semanticmaps_paramdesc_format' => 'خدمة الخرائط المستخدمة لتوليد الخريطة',
	'semanticmaps_paramdesc_geoservice' => 'خدمة التكويد الجغرافي المستخدمة لتحويل العناوين إلى إحداثيات',
	'semanticmaps_paramdesc_height' => 'ارتفاع الخريطة، بالبكسل (افتراضيا $1)',
	'semanticmaps_paramdesc_width' => 'عرض الخريطة، بالبكسل (افتراضيا $1)',
	'semanticmaps_paramdesc_zoom' => 'مستوى التقريب للخريطة',
	'semanticmaps_paramdesc_centre' => 'إحداثيات وسط الخريطة',
	'semanticmaps_paramdesc_controls' => 'متحكمات المستخدم موضوعة على الخريطة',
	'semanticmaps_paramdesc_types' => 'أنواع الخرائط المتوفرة على الخريطة',
	'semanticmaps_paramdesc_type' => 'نوع الخريطة الافتراضي للخريطة',
	'semanticmaps_paramdesc_overlays' => 'الطبقات الفوقية متوفرة على الخريطة',
	'semanticmaps_paramdesc_autozoom' => 'لو أن التقريب والابتعاد بواسطة استخدام عجلة تدحرج الفأرة مفعلة',
	'semanticmaps_paramdesc_layers' => 'الطبقات المتوفرة على الخريطة',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 */
$messages['arz'] = array(
	'semanticmaps_name' => 'خرائط دلالية',
	'semanticmaps_lookupcoordinates' => 'ابحث عن الإحداثيات',
	'semanticmaps_enteraddresshere' => 'أدخل العنوان هنا',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'semanticmaps-desc' => 'Забясьпечвае магчымасьць прагляду і рэдагаваньня зьвестак пра каардынаты, якія захоўваюцца з дапамогай пашырэньня Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples дэманстрацыя]).',
	'semanticmaps-unrecognizeddistance' => 'Значэньне $1 — няслушная адлегласьць.',
	'semanticmaps-kml-link' => 'Паказаць KML-файл',
	'semanticmaps-default-kml-pagelink' => 'Паказаць старонку $1',
	'semanticmaps-loading-forminput' => 'Загрузка мапы…',
	'semanticmaps_lookupcoordinates' => 'Пошук каардынатаў',
	'semanticmaps_enteraddresshere' => 'Увядзіце тут адрас',
	'semanticmaps-updatemap' => 'Абнавіць мапу',
	'semanticmaps_notfound' => 'ня знойдзена',
	'semanticmaps-forminput-remove' => 'Выдаліць',
	'semanticmaps-forminput-add' => 'Дадаць',
	'semanticmaps-forminput-locations' => 'Месцы',
	'semanticmaps_paramdesc_format' => 'Картаграфічны сэрвіс, які выкарыстоўваецца для стварэньня мапаў',
	'semanticmaps_paramdesc_geoservice' => 'Сэрвіс геаграфічнага кадаваньня, які выкарыстоўваецца для пераўтварэньня адрасоў ў каардынаты',
	'semanticmaps_paramdesc_height' => 'Вышыня мапы ў піксэлях (па змоўчваньні $1)',
	'semanticmaps_paramdesc_width' => 'Шырыня мапы ў піксэлях (па змоўчваньні $1)',
	'semanticmaps_paramdesc_zoom' => 'Маштаб мапы',
	'semanticmaps_paramdesc_centre' => 'Каардынаты цэнтру мапы',
	'semanticmaps_paramdesc_controls' => 'Элемэнты кіраваньня на мапе',
	'semanticmaps_paramdesc_types' => 'Тыпы мапы даступныя на мапе',
	'semanticmaps_paramdesc_type' => 'Тып мапы па змоўчваньні',
	'semanticmaps_paramdesc_overlays' => 'Даступныя слаі на мапе',
	'semanticmaps_paramdesc_autozoom' => 'Калі ўключана зьмяншэньне ці павялічэньне маштабу праз кола пракруткі мышы',
	'semanticmaps_paramdesc_layers' => 'Даступныя слаі на мапе',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'semanticmaps-forminput-remove' => 'Премахване',
	'semanticmaps-forminput-add' => 'Добавяне',
);

/** Breton (Brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'semanticmaps-desc' => 'Talvezout a ra da welet ha da gemmañ roadennoù stoket dre an astenn Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => "An talvoud $1 n'eo ket un hed reizh anezhañ.",
	'semanticmaps-kml-link' => 'Gwelet ar restr KML',
	'semanticmaps-default-kml-pagelink' => 'Gwelet ar pennad $1',
	'semanticmaps_lookupcoordinates' => 'Istimañ an daveennoù',
	'semanticmaps_enteraddresshere' => "Merkit ar chomlec'h amañ",
	'semanticmaps_notfound' => "N'eo ket bet kavet",
	'semanticmaps-forminput-remove' => 'Dilemel',
	'semanticmaps-forminput-add' => 'Ouzhpennañ',
	'semanticmaps-forminput-locations' => "Lec'hiadurioù",
	'semanticmaps_paramdesc_format' => 'Ar servij kartennaouiñ implijet da grouiñ ar gartenn',
	'semanticmaps_paramdesc_geoservice' => "Ar servij geokodiñ implijet da dreiñ ar chomlec'hioù e daveennoù",
	'semanticmaps_paramdesc_height' => 'Uhelder ar gartenn, e pikseloù ($1 dre izouer)',
	'semanticmaps_paramdesc_width' => 'Ledander ar gartenn, e pikseloù ($1 dre izouer)',
	'semanticmaps_paramdesc_zoom' => 'Live zoum ar gartenn',
	'semanticmaps_paramdesc_centre' => 'Daveennoù kreiz ar gartenn',
	'semanticmaps_paramdesc_controls' => "Ar c'hontrolloù implijer lakaet war ar gartenn",
	'semanticmaps_paramdesc_types' => "Ar seurtoù kartennoù a c'haller kaout war ar gartenn",
	'semanticmaps_paramdesc_type' => 'Ar seurt kartenn dre ziouer evit ar gartenn',
	'semanticmaps_paramdesc_overlays' => "Ar gwiskadoù a c'haller da gaout war ar gartenn",
	'semanticmaps_paramdesc_autozoom' => 'Mard eo gweredekaet ar zoumañ hag an dizoumañ gant rodig al logodenn',
	'semanticmaps_paramdesc_layers' => 'Ar gwiskadoù zo da gaout war ar gartenn',
);

/** Bosnian (Bosanski)
 * @author CERminator
 * @author Palapa
 */
$messages['bs'] = array(
	'semanticmaps-desc' => 'Daje mogućnost pregleda i uređivanja podataka koordinata koji su spremljeni putem Semantic MediaWiki proširenja ([http://mapping.referata.com/wiki/Examples primjeri]).',
	'semanticmaps-unrecognizeddistance' => 'Vrijednost $1 nije ispravno odstojanje.',
	'semanticmaps-kml-link' => 'Pogledajte KML datoteku',
	'semanticmaps-default-kml-pagelink' => 'Pogledajte stranicu $1',
	'semanticmaps-loading-forminput' => 'Učitavam obrazac unosa za mapu...',
	'semanticmaps_lookupcoordinates' => 'Nađi koordinate',
	'semanticmaps_enteraddresshere' => 'Unesite adresu ovdje',
	'semanticmaps-updatemap' => 'Ažuriraj mapu',
	'semanticmaps_notfound' => 'nije pronađeno',
	'semanticmaps-forminput-remove' => 'Ukloni',
	'semanticmaps-forminput-add' => 'Dodaj',
	'semanticmaps-forminput-locations' => 'Lokacije',
	'semanticmaps_paramdesc_format' => 'Usluga kartiranja korištena za generiranje karte',
	'semanticmaps_paramdesc_geoservice' => 'Usluga geokodiranja korištena za pretvaranje adresa u koordinate',
	'semanticmaps_paramdesc_height' => 'Visina mape, u pikselima (pretpostavljeno je $1)',
	'semanticmaps_paramdesc_width' => 'Širina mape, u pikselima (pretpostavljeno je $1)',
	'semanticmaps_paramdesc_zoom' => 'Nivo zumiranja mape',
	'semanticmaps_paramdesc_centre' => 'Koordinate centra karte',
	'semanticmaps_paramdesc_controls' => 'Korisničke kontrole postavljene na kartu',
	'semanticmaps_paramdesc_types' => 'Tipovi karti dostupnih na mapi',
	'semanticmaps_paramdesc_type' => 'Pretpostavljeni tip karte za kartu',
	'semanticmaps_paramdesc_overlays' => 'Slojevi dostupni na karti',
	'semanticmaps_paramdesc_autozoom' => 'Ako je zumiranje i odaljavanje putem kotačića na mišu omogućeno',
	'semanticmaps_paramdesc_layers' => 'Slojevi dostupni na mapi',
);

/** Catalan (Català)
 * @author Paucabot
 * @author SMP
 * @author Solde
 * @author Toniher
 */
$messages['ca'] = array(
	'semanticmaps-desc' => "Ofereix l'habilitat de visualitzar i editar dades de coordenades emmagatzemades a través de l'extensió Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples alguns exemples]).",
	'semanticmaps-unrecognizeddistance' => 'El valor $1 no és un valor de distància.',
	'semanticmaps-kml-link' => 'Visualitza el fitxer KML',
	'semanticmaps-default-kml-pagelink' => 'Visualitza la pàgina $1',
	'semanticmaps_lookupcoordinates' => 'Consulta les coordenades',
	'semanticmaps_enteraddresshere' => 'Introduïu una adreça a continuació',
	'semanticmaps_notfound' => "no s'ha trobat",
	'semanticmaps_paramdesc_format' => "El servei de mapes que s'utilitza per generar el mapa",
	'semanticmaps_paramdesc_geoservice' => 'El servei de geocodificació que es fa servir per transformar les adreces en coordenades',
	'semanticmaps_paramdesc_height' => "L'altura del mapa, en píxel (per defecte és $1)",
	'semanticmaps_paramdesc_width' => "L'amplada del mapa, en píxels (per defecte és $1)",
	'semanticmaps_paramdesc_zoom' => 'El nivell de zoom del mapa',
	'semanticmaps_paramdesc_centre' => 'Les coordenades del centre dels mapes',
	'semanticmaps_paramdesc_controls' => "Els controls d'usuari emplaçats al mapa",
	'semanticmaps_paramdesc_types' => 'El tipus de mapa disponibles en el mapa',
	'semanticmaps_paramdesc_type' => 'El tipus de mapa per defecte del mapa',
	'semanticmaps_paramdesc_overlays' => 'Les capes disponibles en el mapa',
	'semanticmaps_paramdesc_autozoom' => "Si està disponible el zoom d'augment i reducció fent servir la rodeta del ratolí",
	'semanticmaps_paramdesc_layers' => 'Les capes disponibles al mapa',
);

/** German (Deutsch)
 * @author DaSch
 * @author Imre
 * @author Kghbln
 * @author Pill
 * @author The Evil IP address
 * @author Umherirrender
 */
$messages['de'] = array(
	'semanticmaps-desc' => 'Ermöglicht das Anzeigen und Bearbeiten von Daten zu Koordinaten, die mit Semantic MediaWiki gespeichert werden ([http://mapping.referata.com/wiki/Examples Demonstrationsseite])',
	'semanticmaps-unrecognizeddistance' => 'Der Wert $1 ist keine gültige Distanz.',
	'semanticmaps-kml-link' => 'KML-Datei ansehen',
	'semanticmaps-default-kml-pagelink' => 'Artikel $1 ansehen',
	'semanticmaps-loading-forminput' => 'Lade die Formulareingaben zur Karte …',
	'semanticmaps_lookupcoordinates' => 'Koordinaten nachschlagen',
	'semanticmaps_enteraddresshere' => 'Adresse hier eingeben',
	'semanticmaps-updatemap' => 'Karte aktualisieren',
	'semanticmaps_notfound' => 'nicht gefunden',
	'semanticmaps-forminput-remove' => 'Entfernen',
	'semanticmaps-forminput-add' => 'Hinzufügen',
	'semanticmaps-forminput-locations' => 'Standort',
	'semanticmaps_paramdesc_format' => 'Der Kartographiedienst zum Generieren der Karte',
	'semanticmaps_paramdesc_geoservice' => 'Der Geokodierungsdienst, um Adressen in Koordinaten umzuwandeln',
	'semanticmaps_paramdesc_height' => 'Die Höhe der Karte in Pixeln (Standard ist $1)',
	'semanticmaps_paramdesc_width' => 'Die Breite der Karte in Pixeln (Standard ist $1)',
	'semanticmaps_paramdesc_zoom' => 'Die Vergrößerungsstufe der Karte',
	'semanticmaps_paramdesc_centre' => 'Die Koordinaten der Kartenmitte',
	'semanticmaps_paramdesc_controls' => 'Die Benutzerkontrollen, die sich auf der Karte befinden',
	'semanticmaps_paramdesc_types' => 'Die verfügbaren Kartentypen für die Karte',
	'semanticmaps_paramdesc_type' => 'Der Standardkartentyp für die Karte',
	'semanticmaps_paramdesc_overlays' => 'Die auf der Karte verfügbaren Overlays',
	'semanticmaps_paramdesc_autozoom' => 'Sofern Vergrößerung und Verkleinerung mit dem Mausrad aktiviert ist',
	'semanticmaps_paramdesc_layers' => 'Die auf der Karte verfügbaren Ebenen',
	'semanticmaps-par-staticlocations' => 'Eine Listen von Standorten, die zusammen mit den abgefragten Daten, der Karte hinzugefügt werden sollen. Analog zu den Anzeigepunkten können je Standort Titel, Beschreibung und Symbol, unter Verwendung einer Tilde „~“ als Trennzeichen, hinzugefügt werden.',
	'semanticmaps-par-forceshow' => 'Die Karte auch dann anzeigen, wenn es keine Standorte zum Anzeigen gibt?',
	'semanticmaps-par-showtitle' => 'Anzeige eines Titels im Informationsfenster der Kennzeichnung oder nicht. Diese Option zu deaktivieren ist oftmals dann nützlich, sofern eine Vorlage zur Formatierung des Informationsfensterinhalts verwendet wird.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'semanticmaps-desc' => 'Bitujo zmóžnosć se koordinatowe daty pśez rozšyrjenje Semantic MediaWiki woglědaś a wobźěłaś ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'Gódnota $1 njejo płaśiwa distanca.',
	'semanticmaps-kml-link' => 'KML-dataju se woglědaś',
	'semanticmaps-default-kml-pagelink' => 'Bok $1 se woglědaś',
	'semanticmaps_lookupcoordinates' => 'Za koordinatami póglědaś',
	'semanticmaps_enteraddresshere' => 'Zapódaj how adresu',
	'semanticmaps_notfound' => 'njenamakany',
	'semanticmaps_paramdesc_format' => 'Kartěrowańska słužba, kótaraž se wužywa, aby napórała kórtu',
	'semanticmaps_paramdesc_geoservice' => 'Geokoděrowańska słužba, kótaraž se wužywa, aby pśetwóriła adrese do koordinatow',
	'semanticmaps_paramdesc_height' => 'Wusokosć kórty, w pikselach (standard jo $1)',
	'semanticmaps_paramdesc_width' => 'Šyrokosć kórty, w pikselach (standard jo $1)',
	'semanticmaps_paramdesc_zoom' => 'Skalěrowański schóźeńk kórty',
	'semanticmaps_paramdesc_centre' => 'Koordinaty srjejźišća kórty',
	'semanticmaps_paramdesc_controls' => 'Wužywarske elementy na kórśe',
	'semanticmaps_paramdesc_types' => 'Kórtowe typy, kótarež stoje za kórtu k dispoziciji',
	'semanticmaps_paramdesc_type' => 'Standardny kórtowy typ za kórtu',
	'semanticmaps_paramdesc_overlays' => 'Pśewarstowanja, kótarež stoje za kórtu k dispoziciji',
	'semanticmaps_paramdesc_autozoom' => 'Jolic pówětšenje a pómjeńšenje z pomocu kólaska myški jo zmóžnjone',
	'semanticmaps_paramdesc_layers' => 'Warsty, kótarež stoje za kórtu k dispoziciji',
);

/** Greek (Ελληνικά)
 * @author ZaDiak
 */
$messages['el'] = array(
	'semanticmaps_lookupcoordinates' => 'Επιθεώρηση συντεταγμένων',
	'semanticmaps_enteraddresshere' => 'Εισαγωγή διεύθυνσης εδώ',
	'semanticmaps_notfound' => 'δεν βρέθηκε',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'semanticmaps_lookupcoordinates' => 'Rigardi koordinatojn',
	'semanticmaps_enteraddresshere' => 'Enigu adreson ĉi tie',
	'semanticmaps_notfound' => 'ne trovita',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Imre
 * @author Locos epraix
 * @author Translationista
 */
$messages['es'] = array(
	'semanticmaps-desc' => 'Proporciona la capacidad de ver y editar los datos coordinados almacenados a través de la extensión Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'El valor $1 no esuna distancia válida.',
	'semanticmaps_lookupcoordinates' => 'Busque las coordenadas',
	'semanticmaps_enteraddresshere' => 'Ingresar dirección aquí',
	'semanticmaps_notfound' => 'no encontrado',
	'semanticmaps_paramdesc_format' => 'El servicio cartográfico usado para generar el mapa',
	'semanticmaps_paramdesc_geoservice' => 'El servicio de geocodificación para convertir direcciones en coordenadas',
	'semanticmaps_paramdesc_height' => 'Alto del mapa en píxeles (el predeterminado es $1)',
	'semanticmaps_paramdesc_width' => 'Ancho del mapa en píxeles (el predeterminado es $1)',
	'semanticmaps_paramdesc_zoom' => 'Nivel de acercamiento del mapa',
	'semanticmaps_paramdesc_centre' => 'Las coordenadas del centro del mapa',
	'semanticmaps_paramdesc_controls' => 'Los controles de usuario ubicados en el mapa',
	'semanticmaps_paramdesc_types' => 'Los tipos de mapa disponibles en el mapa',
	'semanticmaps_paramdesc_type' => 'El tipo de mapa predeterminado para el mapa',
	'semanticmaps_paramdesc_overlays' => 'FUZZY!!! Las capas disponibles en el mapa',
	'semanticmaps_paramdesc_autozoom' => 'En caso de que el acercamiento y alejamiento mediante la rueda del ratón esté habilitado',
	'semanticmaps_paramdesc_layers' => 'Las capas disponibles en el mapa',
);

/** Basque (Euskara)
 * @author An13sa
 */
$messages['eu'] = array(
	'semanticmaps_lookupcoordinates' => 'Koordenatuak bilatu',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Str4nd
 */
$messages['fi'] = array(
	'semanticmaps_enteraddresshere' => 'Kirjoita osoite tähän',
	'semanticmaps_notfound' => 'ei löytynyt',
	'semanticmaps_paramdesc_height' => 'Kartan korkeus pikseleinä (oletus on $1)',
	'semanticmaps_paramdesc_width' => 'Kartan leveys pikseleinä (oletus on $1)',
	'semanticmaps_paramdesc_zoom' => 'Kartan suurennostaso',
	'semanticmaps_paramdesc_centre' => 'Kartan keskipisteen koordinaatit',
);

/** French (Français)
 * @author Crochet.david
 * @author Grondin
 * @author Hashar
 * @author IAlex
 * @author Jean-Frédéric
 * @author Peter17
 * @author PieRRoMaN
 * @author Sherbrooke
 * @author Urhixidur
 */
$messages['fr'] = array(
	'semanticmaps-desc' => "Permet d'afficher et de modifier les données de coordonnées stockées par l'extension Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).",
	'semanticmaps-unrecognizeddistance' => "La valeur $1 n'est pas une distance valide",
	'semanticmaps-kml-link' => 'Voir le fichier KML',
	'semanticmaps-default-kml-pagelink' => 'Voir l’article $1',
	'semanticmaps_lookupcoordinates' => 'Estimer les coordonnées',
	'semanticmaps_enteraddresshere' => 'Entrez ici l’adresse',
	'semanticmaps-updatemap' => 'Mise à jour de la carte',
	'semanticmaps_notfound' => 'pas trouvé',
	'semanticmaps-forminput-remove' => 'Enlever',
	'semanticmaps-forminput-add' => 'Ajouter',
	'semanticmaps-forminput-locations' => 'Emplacements',
	'semanticmaps_paramdesc_format' => 'Le service de cartographie utilisé pour générer la carte',
	'semanticmaps_paramdesc_geoservice' => 'Le service de géocodage utilisé pour transformer les adresses en coordonnées',
	'semanticmaps_paramdesc_height' => 'La hauteur de la carte, en pixels ($1 par défaut)',
	'semanticmaps_paramdesc_width' => 'La largeur de la carte, en pixels ($1 par défaut)',
	'semanticmaps_paramdesc_zoom' => 'Le niveau d’agrandissement de la carte',
	'semanticmaps_paramdesc_centre' => 'Les coordonnées du centre de la carte',
	'semanticmaps_paramdesc_controls' => 'Les contrôles utilisateurs placés sur la carte',
	'semanticmaps_paramdesc_types' => 'Les types de cartes disponibles sur la carte',
	'semanticmaps_paramdesc_type' => 'Le type de carte par défaut pour la carte',
	'semanticmaps_paramdesc_overlays' => 'Les revêtements disponibles sur la carte',
	'semanticmaps_paramdesc_autozoom' => 'Si le zoom avant et arrière en utilisant la molette de la souris est activé',
	'semanticmaps_paramdesc_layers' => 'Les revêtements disponibles sur la carte',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'semanticmaps-unrecognizeddistance' => 'La valor $1 est pas una distance valida.',
	'semanticmaps_lookupcoordinates' => 'Èstimar les coordonâs',
	'semanticmaps_enteraddresshere' => 'Buchiéd l’adrèce ique',
	'semanticmaps_notfound' => 'pas trovâ',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'semanticmaps-desc' => 'Proporciona a capacidade de ollar e modificar os datos de coordenadas gardados a través da extensión Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demostración]).',
	'semanticmaps-unrecognizeddistance' => 'O valor $1 non é unha distancia válida.',
	'semanticmaps-kml-link' => 'Ollar o ficheiro KML',
	'semanticmaps-default-kml-pagelink' => 'Ver a páxina "$1"',
	'semanticmaps-loading-forminput' => 'Cargando o formulario de entrada do mapa...',
	'semanticmaps_lookupcoordinates' => 'Ver as coordenadas',
	'semanticmaps_enteraddresshere' => 'Introduza o enderezo aquí',
	'semanticmaps-updatemap' => 'Actualizar o mapa',
	'semanticmaps_notfound' => 'non se atopou',
	'semanticmaps-forminput-remove' => 'Eliminar',
	'semanticmaps-forminput-add' => 'Engadir',
	'semanticmaps-forminput-locations' => 'Localizacións',
	'semanticmaps_paramdesc_format' => 'O servizo de cartografía utilizado para xerar o mapa',
	'semanticmaps_paramdesc_geoservice' => 'O servizo de xeocodificación usado para transformar enderezos en coordenadas',
	'semanticmaps_paramdesc_height' => 'A altura do mapa, en píxeles (por defecto, $1)',
	'semanticmaps_paramdesc_width' => 'O largo do mapa, en píxeles (por defecto, $1)',
	'semanticmaps_paramdesc_zoom' => 'O nivel de zoom do mapa',
	'semanticmaps_paramdesc_centre' => 'As coordenadas do centro do mapa',
	'semanticmaps_paramdesc_controls' => 'Os controis de usuario situados no mapa',
	'semanticmaps_paramdesc_types' => 'Os tipos de mapa dispoñibles no mapa',
	'semanticmaps_paramdesc_type' => 'O tipo de mapa por defecto para o mapa',
	'semanticmaps_paramdesc_overlays' => 'As sobreposicións dispoñibles no mapa',
	'semanticmaps_paramdesc_autozoom' => 'Activa o achegamento e afastamento coa roda do rato',
	'semanticmaps_paramdesc_layers' => 'As capas dispoñibles no mapa',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'semanticmaps-desc' => 'Ergänzt e Megligkeit zum Aaluege un Bearbeite vu Koordinate, wu im Ramme vu dr Erwyterig „Semantisch MediaWiki“ gspycheret wore sin. [http://www.mediawiki.org/wiki/Extension:Semantic_Maps Dokumäntation]. [http://mapping.referata.com/wiki/Examples Demo]',
	'semanticmaps-unrecognizeddistance' => 'Dr Wert $1 isch kei giltigi Dischtanz.',
	'semanticmaps-kml-link' => 'KML-Datei aaluege',
	'semanticmaps-default-kml-pagelink' => 'Syte $1 aaluege',
	'semanticmaps-loading-forminput' => 'Am Lade vu dr Formularyygabe zue dr Charte …',
	'semanticmaps_lookupcoordinates' => 'Koordinate nooluege',
	'semanticmaps_enteraddresshere' => 'Doo Adräss yygee',
	'semanticmaps-updatemap' => 'Charte aktualisiere',
	'semanticmaps_notfound' => 'nit gfunde',
	'semanticmaps-forminput-remove' => 'Uuseneh',
	'semanticmaps-forminput-add' => 'Zuefiege',
	'semanticmaps-forminput-locations' => 'Standort',
	'semanticmaps_paramdesc_format' => 'Dr Chartedienscht, wu brucht wäre soll zum Erzyyge vu dr Charte',
	'semanticmaps_paramdesc_geoservice' => 'Dr Geokodierigs-Service, wu brucht wäre soll zum umwandle vu Adrässe in Koordinate',
	'semanticmaps_paramdesc_height' => 'D Hechi vu dr Charte, in Pixel (Standard: $1)',
	'semanticmaps_paramdesc_width' => 'D Breiti vu dr Charte, in Pixel (Standard: $1)',
	'semanticmaps_paramdesc_zoom' => 'S Zoom-Level vu dr Charte',
	'semanticmaps_paramdesc_centre' => 'D Koordinate vum Mittelpunkt vu dr Charte',
	'semanticmaps_paramdesc_controls' => 'D Hilfsmittel, wu in d Charte yygfiegt sin',
	'semanticmaps_paramdesc_types' => 'D Chartetype, wu fir d Charte verfiegbar sin',
	'semanticmaps_paramdesc_type' => 'Dr Standard-Chartetyp fir d Charte',
	'semanticmaps_paramdesc_overlays' => 'D Overlays, wu fir d Charte verfiegbar sin',
	'semanticmaps_paramdesc_autozoom' => 'Eb mer e Charte cha vergreßere oder verchleinere mit em Muusrad',
	'semanticmaps_paramdesc_layers' => 'D Lage, wu fir Charte verfiegbar sin',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'semanticmaps-desc' => 'הוספת האפשרות לצפייה בנתוני הקואורדינטות המאוחסנים ולעריכתם באמצעות ההרחבה מדיה־ויקי סמנטית ([http://mapping.referata.com/wiki/Examples הדגמות]).',
	'semanticmaps-unrecognizeddistance' => 'הערך $1 אינו מרחק תקין.',
	'semanticmaps-kml-link' => 'הצגת קובץ KML',
	'semanticmaps-default-kml-pagelink' => 'הצגת הדף $1',
	'semanticmaps-loading-forminput' => 'טעינת המפה מהקלט...',
	'semanticmaps_lookupcoordinates' => 'חיפוש קואורדינטות',
	'semanticmaps_enteraddresshere' => 'כתבו כתובת כאן',
	'semanticmaps-updatemap' => 'עדכון מפה',
	'semanticmaps_notfound' => 'לא נמצאה',
	'semanticmaps-forminput-remove' => 'הסרה',
	'semanticmaps-forminput-add' => 'הוספה',
	'semanticmaps-forminput-locations' => 'מיקומים',
	'semanticmaps_paramdesc_format' => 'שירות המיפוי המשמש להכנת המפה',
	'semanticmaps_paramdesc_geoservice' => 'שירות הקידוד הגאוגרפי שממיר כתובות לקואורדינטות',
	'semanticmaps_paramdesc_height' => 'גובה המפה, בפיקסלים (ברירת המחדל היא $1)',
	'semanticmaps_paramdesc_width' => 'רוחב המפה, בפיקסלים (ברירת המחדל היא $1)',
	'semanticmaps_paramdesc_zoom' => 'רמת התקריב של המפה',
	'semanticmaps_paramdesc_centre' => 'קואורדינטות מרכז המפה',
	'semanticmaps_paramdesc_controls' => 'פקדי המשתמש ממוקמים על המפה',
	'semanticmaps_paramdesc_types' => 'צורות המפה הזמינות על המפה',
	'semanticmaps_paramdesc_type' => 'סוג ברירת המחדל של המפה עבור המפה',
	'semanticmaps_paramdesc_overlays' => 'השכבות הזמינות במפה',
	'semanticmaps_paramdesc_autozoom' => 'האם תקריב באמצעות גלגל העכבר מופעל',
	'semanticmaps_paramdesc_layers' => 'השכבות הזמינות במפה',
);

/** Croatian (Hrvatski)
 * @author Tivek
 */
$messages['hr'] = array(
	'semanticmaps-desc' => "Pruža pregledavanje i uređivanje koordinata spremljenih koristeći Semantic MediaWiki ekstenziju ([http://mapping.referata.com/wiki/Examples demo's]).",
	'semanticmaps-unrecognizeddistance' => 'Vrijednost $1 nije valjana udaljenost.',
	'semanticmaps_lookupcoordinates' => 'Potraži koordinate',
	'semanticmaps_enteraddresshere' => 'Unesite adresu ovdje',
	'semanticmaps_notfound' => 'nije nađeno',
	'semanticmaps_paramdesc_format' => 'Kartografska usluga koja se koristi za stvaranje karte',
	'semanticmaps_paramdesc_geoservice' => 'Goecoding usluga koja pretvara adrese u koordinate',
	'semanticmaps_paramdesc_height' => 'Visina karte, u pikselima ($1 ako nije navedeno)',
	'semanticmaps_paramdesc_width' => 'Širina karte, u pikselima ($1 ako nije navedeno)',
	'semanticmaps_paramdesc_zoom' => 'Razina zumiranja karte',
	'semanticmaps_paramdesc_centre' => 'Koordinate centra karte',
	'semanticmaps_paramdesc_controls' => 'Korisničke kontrole stavljene na kartu',
	'semanticmaps_paramdesc_types' => 'Dostupni tipovi karte',
	'semanticmaps_paramdesc_type' => 'Prvotno zadani tip karte',
	'semanticmaps_paramdesc_overlays' => 'Nadslojevi dostupni na karti',
	'semanticmaps_paramdesc_autozoom' => 'Ako je omogućeno zumiranje kotačićem miša',
	'semanticmaps_paramdesc_layers' => 'Slojevi dostupni na karti',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'semanticmaps-desc' => 'Zmóžnja zwobraznjenje a wobdźěłanje koordinatowych datow, kotrež su so z rozšěrjenjom Semantic MediaWiki składowali ([http://mapping.referata.com/wiki/Examples přikłady]).',
	'semanticmaps-unrecognizeddistance' => 'Hódnota $1 płaćiwa distanca njeje.',
	'semanticmaps-kml-link' => 'KML-dataju sej wobhladać',
	'semanticmaps-default-kml-pagelink' => 'Nastawk $1 sej wobhladać',
	'semanticmaps-loading-forminput' => 'Formularne zapodawanske polo karty so začituje...',
	'semanticmaps_lookupcoordinates' => 'Za koordinatami hladać',
	'semanticmaps_enteraddresshere' => 'Zapodaj tu adresu',
	'semanticmaps-updatemap' => 'Kartu aktualizować',
	'semanticmaps_notfound' => 'njenamakany',
	'semanticmaps-forminput-remove' => 'Wotstronić',
	'semanticmaps-forminput-add' => 'Přidać',
	'semanticmaps-forminput-locations' => 'Městna',
	'semanticmaps_paramdesc_format' => 'Kartěrowanska słužba, kotraž so wužiwa, zo by kartu wutworiła',
	'semanticmaps_paramdesc_geoservice' => 'Geokodowanska słužba, kotraž so wužiwa, zo by adresy do koordinatow přetworiła',
	'semanticmaps_paramdesc_height' => 'Wysokosć karty, w pikselach (standard je $1)',
	'semanticmaps_paramdesc_width' => 'Šěrokosć karty, w pikselach (standard je $1)',
	'semanticmaps_paramdesc_zoom' => 'Skalowanski schodźenk karty',
	'semanticmaps_paramdesc_centre' => 'Koordinaty srjedźišća karty',
	'semanticmaps_paramdesc_controls' => 'Wužiwarske elementy na karće',
	'semanticmaps_paramdesc_types' => 'Kartowe typy, kotrež za kartu k dispoziciji steja',
	'semanticmaps_paramdesc_type' => 'Standardny kartowy typ za kartu',
	'semanticmaps_paramdesc_overlays' => 'Naworštowanja, kotrež za kartu k dispoziciji steja',
	'semanticmaps_paramdesc_autozoom' => 'Jeli powjetšenje a pomjenšenje z pomocu kolesko myški je zmóžnjene',
	'semanticmaps_paramdesc_layers' => 'Woršty, kotrež za kartu k dispoziciji steja',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Glanthor Reviol
 */
$messages['hu'] = array(
	'semanticmaps-desc' => 'Lehetővé teszi a szemantikus MediaWiki kiterjesztés segítségével tárolt koordinátaadatok megtekintését és szerkesztését ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps_lookupcoordinates' => 'Koordináták felkeresése',
	'semanticmaps_enteraddresshere' => 'Add meg a címet itt',
	'semanticmaps_notfound' => 'nincs találat',
	'semanticmaps_paramdesc_format' => 'A térkép generálásához használt térképszolgáltatás.',
	'semanticmaps_paramdesc_height' => 'A térkép magassága, képpontban (alapértelmezetten $1)',
	'semanticmaps_paramdesc_width' => 'A térkép szélessége, képpontban (alapértelmezetten $1)',
	'semanticmaps_paramdesc_zoom' => 'A térkép nagyítása',
	'semanticmaps_paramdesc_centre' => 'A térkép középpontjának koordinátái',
	'semanticmaps_paramdesc_types' => 'A térképen elérhető térképtípusok',
	'semanticmaps_paramdesc_type' => 'A térkép alapértelmezett térképtípusa',
	'semanticmaps_paramdesc_overlays' => 'A térképen lévő rétegek',
	'semanticmaps_paramdesc_layers' => 'A térképen lévő rétegek',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'semanticmaps-desc' => 'Forni le capacitate de vider e modificar datos de coordinatas immagazinate con le extension Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demonstrationes]).',
	'semanticmaps-unrecognizeddistance' => 'Le valor $1 non es un distantia valide.',
	'semanticmaps-kml-link' => 'Vider le file KML',
	'semanticmaps-default-kml-pagelink' => 'Vider articulo $1',
	'semanticmaps-loading-forminput' => 'Carga datos entrate in formulario...',
	'semanticmaps_lookupcoordinates' => 'Cercar coordinatas',
	'semanticmaps_enteraddresshere' => 'Entra adresse hic',
	'semanticmaps-updatemap' => 'Actualisar carta',
	'semanticmaps_notfound' => 'non trovate',
	'semanticmaps-forminput-remove' => 'Remover',
	'semanticmaps-forminput-add' => 'Adder',
	'semanticmaps-forminput-locations' => 'Locos',
	'semanticmaps_paramdesc_format' => 'Le servicio cartographic usate pro generar le carta',
	'semanticmaps_paramdesc_geoservice' => 'Le servicio de geocodification usate pro converter adresses in coordinatas',
	'semanticmaps_paramdesc_height' => 'Le altitude del carta, in pixeles (predefinition es $1)',
	'semanticmaps_paramdesc_width' => 'Le latitude del carta, in pixeles (predefinition es $1)',
	'semanticmaps_paramdesc_zoom' => 'Le nivello de zoom del carta',
	'semanticmaps_paramdesc_centre' => 'Le coordinatas del centro del carta',
	'semanticmaps_paramdesc_controls' => 'Le buttones de adjustamento placiate in le carta',
	'semanticmaps_paramdesc_types' => 'Le typos de carta disponibile in le carta',
	'semanticmaps_paramdesc_type' => 'Le typo de carta predefinite pro le carta',
	'semanticmaps_paramdesc_overlays' => 'Le superpositiones disponibile in le carta',
	'semanticmaps_paramdesc_autozoom' => 'Si le zoom avante e retro con le rota de rolamento del mouse es active',
	'semanticmaps_paramdesc_layers' => 'Le stratos disponibile in le carta',
	'semanticmaps-par-staticlocations' => 'Un lista de locos a adder al carta con le datos resultante del consulta. Como con display_points, tu pote adder un titulo, description e icone per loco usante le tilde "~" como separator.',
	'semanticmaps-par-forceshow' => 'Monstrar le carta mesmo si il non ha locos a monstrar?',
	'semanticmaps-par-showtitle' => 'Monstrar un titulo in le fenestra de information de marcator o non. Disactivar isto es sovente utile si un patrono es usate pro formatar le contento del fenestra de information.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author Farras
 * @author IvanLanin
 */
$messages['id'] = array(
	'semanticmaps-desc' => 'Memampukan penampilan dan penyuntingan data koordinat yang disimpan melalui pengaya MediaWiki Semantic ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'Nilai $1 bukan jarak yang sah.',
	'semanticmaps-kml-link' => 'Lihat berkas KML',
	'semanticmaps-default-kml-pagelink' => 'Lihat halaman $1',
	'semanticmaps_lookupcoordinates' => 'Cari koordinat',
	'semanticmaps_enteraddresshere' => 'Masukkan alamat di sini',
	'semanticmaps_notfound' => 'tidak ditemukan',
	'semanticmaps_paramdesc_format' => 'Layanan pemetaan untuk membuat peta',
	'semanticmaps_paramdesc_geoservice' => 'Layanan kode geo untuk mengubah alamat menjadi koordinat',
	'semanticmaps_paramdesc_height' => 'Tinggi peta, dalam piksel (umumnya $1)',
	'semanticmaps_paramdesc_width' => 'Lebar peta, dalam piksel (umumnya $1)',
	'semanticmaps_paramdesc_zoom' => 'Tingkat zum peta',
	'semanticmaps_paramdesc_centre' => 'Koordinat bagian tengah peta',
	'semanticmaps_paramdesc_controls' => 'Kontrol pengguna yang diletakkan di peta',
	'semanticmaps_paramdesc_types' => 'Jenis peta tersedia di peta',
	'semanticmaps_paramdesc_type' => 'Jenis peta biasa untuk peta ini',
	'semanticmaps_paramdesc_overlays' => 'Lapisan yang tersedia di peta',
	'semanticmaps_paramdesc_autozoom' => 'Bila ingin zum dekat dan jauh menggunakan mouse, gunakan roda gulung',
	'semanticmaps_paramdesc_layers' => 'Lapisan tersedia di peta',
);

/** Italian (Italiano)
 * @author Civvì
 * @author Darth Kule
 * @author HalphaZ
 */
$messages['it'] = array(
	'semanticmaps-desc' => "Offre la possibilità di visualizzare e modificare le coordinate memorizzate attraverso l'estensione Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).",
	'semanticmaps-unrecognizeddistance' => 'Il valore $1 non è una distanza valida.',
	'semanticmaps_lookupcoordinates' => 'Cerca coordinate',
	'semanticmaps_enteraddresshere' => 'Inserisci indirizzo qui',
	'semanticmaps_notfound' => 'non trovato',
	'semanticmaps_paramdesc_format' => 'Il servizio di mapping utilizzato per generare la mappa',
	'semanticmaps_paramdesc_geoservice' => 'Il servizio di geocoding utilizzato per trasformare gli indirizzi in coordinate',
	'semanticmaps_paramdesc_height' => "L'altezza della mappa in pixel (il valore di default è $1)",
	'semanticmaps_paramdesc_width' => 'La larghezza della mappa in pixel (il valore di default è $1)',
	'semanticmaps_paramdesc_zoom' => 'Il livello di zoom della mappa',
	'semanticmaps_paramdesc_centre' => 'Le coordinate del centro della mappa',
	'semanticmaps_paramdesc_controls' => 'I controlli utente posizionati sulla mappa',
	'semanticmaps_paramdesc_types' => 'I tipi di mappa disponibili sulla mappa',
	'semanticmaps_paramdesc_type' => 'Il tipo mappa predefinito per la mappa',
	'semanticmaps_paramdesc_overlays' => 'Gli overlay disponibili sulla mappa',
	'semanticmaps_paramdesc_autozoom' => 'Se sono attivati lo zoom avanti e indietro utilizzando la rotellina del mouse',
	'semanticmaps_paramdesc_layers' => 'Gli strati (layer) disponibili sulla mappa',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Mizusumashi
 * @author 青子守歌
 */
$messages['ja'] = array(
	'semanticmaps-desc' => 'Semantic MediaWiki 拡張機能を通して格納された座標データを表示・編集する機能を提供する ([http://mapping.referata.com/wiki/Examples 実演])。',
	'semanticmaps-unrecognizeddistance' => '値$1は有効な距離ではありません。',
	'semanticmaps-kml-link' => 'KMLファイルを閲覧',
	'semanticmaps-default-kml-pagelink' => 'ページ$1を表示',
	'semanticmaps_lookupcoordinates' => '座標を調べる',
	'semanticmaps_enteraddresshere' => '住所をここに入力します',
	'semanticmaps_notfound' => '見つかりません',
	'semanticmaps_paramdesc_format' => '地図の生成に利用されている地図サービス',
	'semanticmaps_paramdesc_geoservice' => '住所の座標への変換に利用されているジオコーディングサービス',
	'semanticmaps_paramdesc_height' => '地図の縦幅 (単位はピクセル、既定は$1)',
	'semanticmaps_paramdesc_width' => '地図の横幅 (単位はピクセル、既定は$1)',
	'semanticmaps_paramdesc_zoom' => '地図の拡大度',
	'semanticmaps_paramdesc_centre' => '地図の中心の座標',
	'semanticmaps_paramdesc_controls' => 'この地図上に設置するユーザーコントロール',
	'semanticmaps_paramdesc_types' => 'この地図で利用できる地図タイプ',
	'semanticmaps_paramdesc_type' => 'この地図のデフォルト地図タイプ',
	'semanticmaps_paramdesc_overlays' => 'この地図で利用できるオーバーレイ',
	'semanticmaps_paramdesc_autozoom' => 'マウスのスクロールホイールを使ったズームインやアウトを有効にするか',
	'semanticmaps_paramdesc_layers' => 'この地図で利用できるレイヤー',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Thearith
 */
$messages['km'] = array(
	'semanticmaps_lookupcoordinates' => 'ក្រឡេក​មើល​កូអរដោនេ',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'semanticmaps-desc' => 'Määt et müjjelesch, Koodinaate ze beloore un ze ändere, di mem „Semantesch Mediawiki“ faßjehallde woode sin. ([http://mapping.referata.com/wiki/Examples Beijshpöll för et vörzemaache])',
	'semanticmaps-unrecognizeddistance' => 'Dä Wäät „$1“ es keine jölteje Afschtand.',
	'semanticmaps-kml-link' => 'De KML-Dattei belooere',
	'semanticmaps-default-kml-pagelink' => 'De Sigg „$1“ belooere',
	'semanticmaps-loading-forminput' => 'Mer sin de Enjaabe vum Fommulaa for die Kaat aam laade&nbsp;…',
	'semanticmaps_lookupcoordinates' => 'Koordinate nohkike',
	'semanticmaps_enteraddresshere' => 'Donn hee de Address enjäve',
	'semanticmaps-updatemap' => 'De Kaad op der neue Shtand bränge',
	'semanticmaps_notfound' => 'nit jefonge',
	'semanticmaps-forminput-remove' => 'Fottnämme',
	'semanticmaps-forminput-add' => 'Dobei donn',
	'semanticmaps-forminput-locations' => 'Oote',
	'semanticmaps_paramdesc_format' => 'Dä Deens för Kaate ußzejävve, woh heh di Kaat vun kütt',
	'semanticmaps_paramdesc_geoservice' => "Dä Deens för Adräße en Ko'odinaate öm_ze_wandelle",
	'semanticmaps_paramdesc_height' => 'De Hühde vun heh dä Kaat en Pixelle — schtandattmääßesch {{PLURAL:$1|$1 Pixel|$1 Pixelle|nix}}',
	'semanticmaps_paramdesc_width' => 'De Breedt vun heh dä Kaat en Pixelle — schtandattmääßesch {{PLURAL:$1|$1 Pixel|$1 Pixelle|nix}}',
	'semanticmaps_paramdesc_zoom' => 'Wi doll dä Zoom fö heh di Kaat es',
	'semanticmaps_paramdesc_centre' => "De Ko'odinaate op de Ääd, vun de Medde vun heh dä Kaat",
	'semanticmaps_paramdesc_controls' => 'De Knöppe för de Bedeenung, di op di Kaat jemohlt wäääde',
	'semanticmaps_paramdesc_types' => 'De Kaate-Zoote di mer för heh di Kaat ußsöhke kann',
	'semanticmaps_paramdesc_type' => 'De Schtandatt Kaate-Zoot för heh di Kaat',
	'semanticmaps_paramdesc_overlays' => 'De zohsäzlijje Eijnzelheijte, di mer op di Kaat drop bränge kann',
	'semanticmaps_paramdesc_autozoom' => 'Falls et erin un eruß zoome met däm Kompjuter singe Muuß ierem Rättsche aanjeschalldt es, dann:',
	'semanticmaps_paramdesc_layers' => 'De Nivohs, di för di Kaat ze han sin',
);

/** Kurdish (Latin) (Kurdî (Latin))
 * @author George Animal
 */
$messages['ku-latn'] = array(
	'semanticmaps_notfound' => 'nehate dîtin',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'semanticmaps-unrecognizeddistance' => 'De Wäert $1 ass keng valabel Distanz.',
	'semanticmaps-kml-link' => 'KML-Fichier weisen',
	'semanticmaps-default-kml-pagelink' => 'Säit $1 weisen',
	'semanticmaps_lookupcoordinates' => 'Koordinaten nokucken',
	'semanticmaps_enteraddresshere' => 'Adress hei aginn',
	'semanticmaps-updatemap' => 'Kaart aktualiséieren',
	'semanticmaps_notfound' => 'net fonnt',
	'semanticmaps-forminput-remove' => 'Ewechhuelen',
	'semanticmaps-forminput-add' => 'Derbäisetzen',
	'semanticmaps_paramdesc_format' => "De Kartographie-Service dee fir d'generéiere vun der Kaart benotzt gëtt",
	'semanticmaps_paramdesc_height' => "D'Héicht vun der Kaart, a Pixelen (Standard ass $1)",
	'semanticmaps_paramdesc_width' => "D'Breet vun der Kaart, a Pixelen (Standard ass $1)",
	'semanticmaps_paramdesc_zoom' => 'DenNiveau vum Zoom vun der Kaart',
	'semanticmaps_paramdesc_centre' => "D'Koordinate vum zentrum vun der Kaart",
	'semanticmaps_paramdesc_controls' => "D'Benotzerkontrollen déi op der Kaart plazéiert sinn",
	'semanticmaps_paramdesc_types' => 'Déi disponibel Kaartentypen op der Kaart',
	'semanticmaps_paramdesc_type' => "De Standard-Kaartentyp fir d'Kaart",
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'semanticmaps-desc' => 'Овозможува прегледување и уредување на координатни податоци складирани со додатокот Семантички МедијаВики ([http://mapping.referata.com/wiki/Examples урнеци]).',
	'semanticmaps-unrecognizeddistance' => 'Вредноста $1 не претставува важечко растојание.',
	'semanticmaps-kml-link' => 'Преглед на KML-податотеката',
	'semanticmaps-default-kml-pagelink' => 'Преглед на статијата $1',
	'semanticmaps-loading-forminput' => 'Вчитувам карти од внесеното...',
	'semanticmaps_lookupcoordinates' => 'Побарај координати',
	'semanticmaps_enteraddresshere' => 'Внесете адреса тука',
	'semanticmaps-updatemap' => 'Поднови карта',
	'semanticmaps_notfound' => 'не е најдено ништо',
	'semanticmaps-forminput-remove' => 'Отстрани',
	'semanticmaps-forminput-add' => 'Додај',
	'semanticmaps-forminput-locations' => 'Места',
	'semanticmaps_paramdesc_format' => 'Картографската служба со која се создава картата',
	'semanticmaps_paramdesc_geoservice' => 'Службата за геокодирање со која адресите се претвораат во координати',
	'semanticmaps_paramdesc_height' => 'Висината на картата во пиксели ($1 по основно)',
	'semanticmaps_paramdesc_width' => 'Ширината на картата во пиксели ($1 по основно)',
	'semanticmaps_paramdesc_zoom' => 'Размерот на картата',
	'semanticmaps_paramdesc_centre' => 'Координатите на средиштето на картата',
	'semanticmaps_paramdesc_controls' => 'Корисничките контроли за на картата',
	'semanticmaps_paramdesc_types' => 'Типови на карти, достапни за картата',
	'semanticmaps_paramdesc_type' => 'Основно зададениот тип на карта',
	'semanticmaps_paramdesc_overlays' => 'Достапните облоги за картата',
	'semanticmaps_paramdesc_autozoom' => 'Ако е овозможено приближување и оддалечување со тркалцето на глушецот',
	'semanticmaps_paramdesc_layers' => 'Слоевите достапни на картата',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'semanticmaps_enteraddresshere' => 'വിലാസം നൽകുക',
	'semanticmaps_notfound' => 'കണ്ടെത്താനായില്ല',
);

/** Dutch (Nederlands)
 * @author Jeroen De Dauw
 * @author Siebrand
 */
$messages['nl'] = array(
	'semanticmaps-desc' => 'Biedt de mogelijkheid om locatiegegevens die opgeslagen zijn in Semantic MediaWiki te bewerken en te bekijken',
	'semanticmaps-unrecognizeddistance' => 'De waarde "$1" is geen geldige afstand.',
	'semanticmaps-kml-link' => 'KML-bestand bekijken',
	'semanticmaps-default-kml-pagelink' => 'Pagina $1 bekijken',
	'semanticmaps-loading-forminput' => 'Bezig met het laden van de kaart formulierinvoer...',
	'semanticmaps_lookupcoordinates' => 'Coördinaten opzoeken',
	'semanticmaps_enteraddresshere' => 'Voer hier het adres in',
	'semanticmaps-updatemap' => 'Kaart bijwerken',
	'semanticmaps_notfound' => 'niet gevonden',
	'semanticmaps-forminput-remove' => 'Verwijderen',
	'semanticmaps-forminput-add' => 'Toevoegen',
	'semanticmaps-forminput-locations' => 'Locaties',
	'semanticmaps_paramdesc_format' => 'De kaartdienst die de kaart levert',
	'semanticmaps_paramdesc_geoservice' => 'De geocoderingsdienst die adressen in coördinaten converteert',
	'semanticmaps_paramdesc_height' => 'De hoogte van de kaart in pixels (standaard is $1)',
	'semanticmaps_paramdesc_width' => 'De breedte van de kaart in pixels (standaard is $1)',
	'semanticmaps_paramdesc_zoom' => 'Het zoomniveau van de kaart',
	'semanticmaps_paramdesc_centre' => 'De coördinaten van het midden van de kaart',
	'semanticmaps_paramdesc_controls' => 'De op de kaart te plaatsen hulpmiddelen',
	'semanticmaps_paramdesc_types' => 'De voor de kaart beschikbare kaarttypen',
	'semanticmaps_paramdesc_type' => 'Het standaard kaarttype voor de kaart',
	'semanticmaps_paramdesc_overlays' => 'De voor de kaart beschikbare overlays',
	'semanticmaps_paramdesc_autozoom' => 'Of in- en uitzoomen met het scrollwiel van de muis mogelijk is',
	'semanticmaps_paramdesc_layers' => 'De lagen die beschikbaar zijn voor de kaart',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'semanticmaps_lookupcoordinates' => 'Sjekk koordinatar',
	'semanticmaps_enteraddresshere' => 'Skriv inn adressa her',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Event
 * @author Jon Harald Søby
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'semanticmaps-desc' => 'Tilbyr muligheten til å se og endre koordinatdata lagret gjennom Semantic MediaWiki-utvidelsen ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'Verdien $1 er ikke en gyldig avstand.',
	'semanticmaps-kml-link' => 'Vis KML-filen',
	'semanticmaps-default-kml-pagelink' => 'Vis siden $1',
	'semanticmaps_lookupcoordinates' => 'Sjekk koordinater',
	'semanticmaps_enteraddresshere' => 'Skriv inn adressen her',
	'semanticmaps_notfound' => 'ikke funnet',
	'semanticmaps_paramdesc_format' => 'Karttjenesten brukt for å generere kart',
	'semanticmaps_paramdesc_geoservice' => 'Geokodetjenesten brukt for å gjøre adresser om til koordinater',
	'semanticmaps_paramdesc_height' => 'Høyden til kartet, i piksler (standard er $1)',
	'semanticmaps_paramdesc_width' => 'Bredden til kartet, i piksler (standard er $1)',
	'semanticmaps_paramdesc_zoom' => 'Zoomnivået til kartet',
	'semanticmaps_paramdesc_centre' => 'Koordinatene til kartets senter',
	'semanticmaps_paramdesc_controls' => 'Brukerkontrollene plassert på kartet',
	'semanticmaps_paramdesc_types' => 'Karttypene tilgjengelig for kartet',
	'semanticmaps_paramdesc_type' => 'Standard karttype for kartet',
	'semanticmaps_paramdesc_overlays' => 'Overlag tilgjengelig for kartet',
	'semanticmaps_paramdesc_autozoom' => 'Dersom zooming ved bruk av musehjulet er slått på',
	'semanticmaps_paramdesc_layers' => 'Lagene tilgjengelig på kartet',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'semanticmaps-desc' => "Permet de veire e modificar las donadas de coordenadas estocadas a travèrs l'extension Semantic MediaWiki. [http://www.mediawiki.org/wiki/Extension:Semantic_Maps Documentacion]. [http://mapping.referata.com/wiki/Examples Demo]",
	'semanticmaps_lookupcoordinates' => 'Estimar las coordenadas',
	'semanticmaps_enteraddresshere' => 'Picatz aicí l’adreça',
	'semanticmaps_notfound' => 'pas trobat',
);

/** Polish (Polski)
 * @author Deejay1
 * @author Derbeth
 * @author Leinad
 * @author Odder
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'semanticmaps-desc' => 'Umożliwia przeglądanie oraz edytowanie współrzędnych zapisanych przez rozszerzenie Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples dema]).',
	'semanticmaps-unrecognizeddistance' => 'Wartość $1 nie jest poprawną odległością.',
	'semanticmaps-kml-link' => 'Wyświetla plik KML',
	'semanticmaps-default-kml-pagelink' => 'Pokaż stronę $1',
	'semanticmaps_lookupcoordinates' => 'Wyszukaj współrzędne',
	'semanticmaps_enteraddresshere' => 'Podaj adres',
	'semanticmaps_notfound' => 'nie odnaleziono',
	'semanticmaps_paramdesc_format' => 'Usługa kartograficzna używana do generowania map',
	'semanticmaps_paramdesc_geoservice' => 'Usługa geokodowania wykorzystywana do przeliczania adresów na współrzędne',
	'semanticmaps_paramdesc_height' => 'Wysokość mapy w pikselach (domyślnie $1)',
	'semanticmaps_paramdesc_width' => 'Szerokość mapy w pikselach (domyślnie $1)',
	'semanticmaps_paramdesc_zoom' => 'Stopień powiększenia mapy',
	'semanticmaps_paramdesc_centre' => 'Współrzędne środka mapy',
	'semanticmaps_paramdesc_controls' => 'Elementy sterujące dla użytkownika umieszczone na mapie',
	'semanticmaps_paramdesc_types' => 'Rodzaje map dostępne na mapie',
	'semanticmaps_paramdesc_type' => 'Domyślny typ mapy',
	'semanticmaps_paramdesc_overlays' => 'Dostępne nakładki do mapy',
	'semanticmaps_paramdesc_autozoom' => 'Jeśli włączone jest powiększanie i pomniejszanie za pomocą kółka myszy',
	'semanticmaps_paramdesc_layers' => 'Dostępne na mapie warstwy',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'semanticmaps-desc' => "A dà la possibilità ëd vardé e modifiché ij dat ëd le coordinà memorisà con l'estension Semantic MediaWiki ([http://mapping.referata.com/wiki/Demo d'esempi]).",
	'semanticmaps-unrecognizeddistance' => "Ël valor $1 a l'é pa na distansa bon-a.",
	'semanticmaps-kml-link' => "Vëdde l'archivi KML",
	'semanticmaps-default-kml-pagelink' => 'Lese la pàgina $1',
	'semanticmaps-loading-forminput' => 'Carié carta da input...',
	'semanticmaps_lookupcoordinates' => 'Serca coordinà',
	'semanticmaps_enteraddresshere' => 'Ansëriss adrëssa sì',
	'semanticmaps-updatemap' => 'Modifiché carta',
	'semanticmaps_notfound' => 'pa trovà',
	'semanticmaps-forminput-remove' => 'Gava',
	'semanticmaps-forminput-add' => 'Gionta',
	'semanticmaps-forminput-locations' => 'Locassion',
	'semanticmaps_paramdesc_format' => 'Ël servissi ëd cartografìa dovrà për generé la carta',
	'semanticmaps_paramdesc_geoservice' => "Ël servissi ëd geocodìfica dovrà për trasformé j'adrësse an coordinà",
	'semanticmaps_paramdesc_height' => "L'autëssa dla carta, an pontin (lë stàndard a l'é $1)",
	'semanticmaps_paramdesc_width' => "La larghëssa dla carta, an pontin (lë stàndard a l'é $1)",
	'semanticmaps_paramdesc_zoom' => "Ël livel d'angrandiment ëd la carta",
	'semanticmaps_paramdesc_centre' => 'Le coordinà dël sènter ëd la carta',
	'semanticmaps_paramdesc_controls' => 'Ij contròj utent piassà an sla carta',
	'semanticmaps_paramdesc_types' => 'Le sòrt ëd carte disponìbij an sla carta',
	'semanticmaps_paramdesc_type' => 'Ël tipo ëd carta stàndard për la carta',
	'semanticmaps_paramdesc_overlays' => 'Le dzor-posission disponìbij an sla carta',
	'semanticmaps_paramdesc_autozoom' => "Se l'angrandiment anans e andré an dovrand la roëtta dël rat a l'é abilità",
	'semanticmaps_paramdesc_layers' => 'Ij livej disponìbij an sla carta',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'semanticmaps_notfound' => 'و نه موندل شو',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 * @author Indech
 * @author Malafaya
 */
$messages['pt'] = array(
	'semanticmaps-desc' => 'Permite ver e editar dados de coordenadas, armazenados através da extensão MediaWiki Semântico ([http://mapping.referata.com/wiki/Examples demonstração]).',
	'semanticmaps-unrecognizeddistance' => 'O valor $1 não é uma distância válida.',
	'semanticmaps-kml-link' => 'Ver o ficheiro KML',
	'semanticmaps-default-kml-pagelink' => 'Ver a página $1',
	'semanticmaps-loading-forminput' => 'A carregar o formulário de entrada do mapa...',
	'semanticmaps_lookupcoordinates' => 'Pesquisar coordenadas',
	'semanticmaps_enteraddresshere' => 'Introduza um endereço aqui',
	'semanticmaps-updatemap' => 'Actualizar mapa',
	'semanticmaps_notfound' => 'não encontrado',
	'semanticmaps-forminput-remove' => 'Remover',
	'semanticmaps-forminput-add' => 'Adicionar',
	'semanticmaps-forminput-locations' => 'Locais',
	'semanticmaps_paramdesc_format' => 'O serviço de cartografia usado para gerar o mapa',
	'semanticmaps_paramdesc_geoservice' => 'O serviço de geocódigos usado para transformar endereços em coordenadas',
	'semanticmaps_paramdesc_height' => 'A altura do mapa, em pixels (por omissão, $1)',
	'semanticmaps_paramdesc_width' => 'A largura do mapa, em pixels (por omissão, $1)',
	'semanticmaps_paramdesc_zoom' => 'O nível de aproximação do mapa',
	'semanticmaps_paramdesc_centre' => 'As coordenadas do centro do mapa',
	'semanticmaps_paramdesc_controls' => 'Os controles colocados no mapa',
	'semanticmaps_paramdesc_types' => 'Os tipos de mapa disponíveis no mapa',
	'semanticmaps_paramdesc_type' => 'O tipo do mapa, por omissão',
	'semanticmaps_paramdesc_overlays' => 'As sobreposições disponíveis no mapa',
	'semanticmaps_paramdesc_autozoom' => 'Possibilitar a aproximação e afastamento usando a roda de deslizamento do rato',
	'semanticmaps_paramdesc_layers' => 'As camadas disponíveis no mapa',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 * @author Giro720
 * @author Luckas Blade
 */
$messages['pt-br'] = array(
	'semanticmaps-desc' => 'Provê a possibilidade de ver e editar dados de coordenadas armazenados através da extensão Semantic MediaWiki. ([http://mapping.referata.com/wiki/Examples demonstração]).',
	'semanticmaps-unrecognizeddistance' => 'O valor $1 não é uma distância válida.',
	'semanticmaps-kml-link' => 'Ver o arquivo KML',
	'semanticmaps-default-kml-pagelink' => 'Ver a página $1',
	'semanticmaps_lookupcoordinates' => 'Pesquisar coordenadas',
	'semanticmaps_enteraddresshere' => 'Introduza um endereço aqui',
	'semanticmaps_notfound' => 'Não encontrado',
	'semanticmaps_paramdesc_format' => 'O serviço de cartografia usado para gerar o mapa',
	'semanticmaps_paramdesc_geoservice' => 'O serviço de geocódigos usado para transformar endereços em coordenadas',
	'semanticmaps_paramdesc_height' => 'A altura do mapa, em pixels (por padrão, $1)',
	'semanticmaps_paramdesc_width' => 'A largura do mapa, em pixels (por padrão, $1)',
	'semanticmaps_paramdesc_zoom' => 'O nível de aproximação do mapa',
	'semanticmaps_paramdesc_centre' => 'As coordenadas do centro do mapa',
	'semanticmaps_paramdesc_controls' => 'Os controles colocados no mapa',
	'semanticmaps_paramdesc_types' => 'Os tipos de mapa disponíveis no mapa',
	'semanticmaps_paramdesc_type' => 'O tipo do mapa, por padrão',
	'semanticmaps_paramdesc_overlays' => 'As sobreposições disponíveis no mapa',
	'semanticmaps_paramdesc_autozoom' => 'Possibilitar a aproximação e afastamento usando a roda de deslizamento do mouse',
	'semanticmaps_paramdesc_layers' => 'As camadas disponíveis no mapa',
);

/** Romanian (Română)
 * @author Firilacroco
 */
$messages['ro'] = array(
	'semanticmaps_enteraddresshere' => 'Introduceți adresa aici',
	'semanticmaps_notfound' => 'nu a fost găsit',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'semanticmaps-desc' => "Dèje l'abbilità a fà vedè e cangià le coordinate reggistrate cu l'estenzione Semandiche de MediaUicchi ([http://mapping.referata.com/wiki/Examples demo]).",
	'semanticmaps-default-kml-pagelink' => "Vide 'a pàgene $1",
	'semanticmaps_lookupcoordinates' => 'Ingroce le coordinate',
	'semanticmaps_enteraddresshere' => "Scaffe l'indirizze aqquà",
	'semanticmaps-updatemap' => "Aggiorne 'a mappe",
	'semanticmaps_notfound' => 'no acchiate',
	'semanticmaps-forminput-remove' => 'Live',
	'semanticmaps-forminput-add' => 'Aggiunge',
);

/** Russian (Русский)
 * @author Eugene Mednikov
 * @author Lockal
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'semanticmaps-desc' => 'Обеспечивает возможность просмотра и редактирования координатных данных, хранящихся в семантическом расширении MediaWiki ([http://mapping.referata.com/wiki/Examples примеры]).',
	'semanticmaps-unrecognizeddistance' => 'Значение $1 не является допустимым расстоянием.',
	'semanticmaps-kml-link' => 'Просмотреть файл KML',
	'semanticmaps-default-kml-pagelink' => 'Просмотреть страницу $1',
	'semanticmaps-loading-forminput' => 'Загрузка карты…',
	'semanticmaps_lookupcoordinates' => 'Найти координаты',
	'semanticmaps_enteraddresshere' => 'Введите адрес',
	'semanticmaps-updatemap' => 'Обновить карту',
	'semanticmaps_notfound' => 'не найдено',
	'semanticmaps-forminput-remove' => 'Удалить',
	'semanticmaps-forminput-add' => 'Добавить',
	'semanticmaps-forminput-locations' => 'Места',
	'semanticmaps_paramdesc_format' => 'Картографическая служба, используемая для создания карт',
	'semanticmaps_paramdesc_geoservice' => 'Служба геокодирования используется для преобразования адреса в координаты',
	'semanticmaps_paramdesc_height' => 'Высота карты в пикселях (по умолчанию $1)',
	'semanticmaps_paramdesc_width' => 'Ширина карты в пикселях (по умолчанию $1)',
	'semanticmaps_paramdesc_zoom' => 'Масштаб карты',
	'semanticmaps_paramdesc_centre' => 'Координаты центра карты',
	'semanticmaps_paramdesc_controls' => 'Элементы управления на карте',
	'semanticmaps_paramdesc_types' => 'Типы карты, доступные на карте',
	'semanticmaps_paramdesc_type' => 'Тип карты по умолчанию',
	'semanticmaps_paramdesc_overlays' => 'Доступные наложения',
	'semanticmaps_paramdesc_autozoom' => 'Если включено увеличение и уменьшение масштаб с помощью колеса прокрутки мыши',
	'semanticmaps_paramdesc_layers' => 'Доступные на карте слои',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'semanticmaps-desc' => 'Poskytuje schopnosť zobrazovať a upravovať údaje súradníc uložené prostredníctvom rozšírenia Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps_lookupcoordinates' => 'Vyhľadať súradnice',
	'semanticmaps_enteraddresshere' => 'Sem zadajte emailovú adresu',
	'semanticmaps_notfound' => 'nenájdené',
	'semanticmaps_paramdesc_format' => 'Služba použitá na tvorbu mapy',
	'semanticmaps_paramdesc_geoservice' => 'Služba použitá na vyhľadanie súradníc na základe adresy',
	'semanticmaps_paramdesc_height' => 'Výška mapy v pixloch (predvolené je $1)',
	'semanticmaps_paramdesc_width' => 'Šírka mapy v pixloch (predvolené je $1)',
	'semanticmaps_paramdesc_zoom' => 'Úroveň priblíženia mapy',
	'semanticmaps_paramdesc_centre' => 'Súradnice stredu mapy',
	'semanticmaps_paramdesc_controls' => 'Používateľské ovládacie prvky umiestnené na mape',
	'semanticmaps_paramdesc_types' => 'Typy máp dostupné na mape',
	'semanticmaps_paramdesc_type' => 'Predvolený typ mapy na mape',
	'semanticmaps_paramdesc_overlays' => 'Vrstvy dostupné na mape',
	'semanticmaps_paramdesc_autozoom' => 'Či je povolené približovanie a odďaľovanie mapy kolieskom myši',
	'semanticmaps_paramdesc_layers' => 'Dostupné vrstvy mapy',
);

/** Serbian Cyrillic ekavian (‪Српски (ћирилица)‬)
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'semanticmaps-unrecognizeddistance' => 'Вредност $1 није исправно растојање.',
	'semanticmaps_enteraddresshere' => 'Унеси адресу овде',
	'semanticmaps_notfound' => 'није нађено',
	'semanticmaps_paramdesc_height' => 'Висина мапе у пикселима (подразумевано је $1)',
	'semanticmaps_paramdesc_width' => 'Ширина мапе у пикселима (подразумевано је $1)',
	'semanticmaps_paramdesc_zoom' => 'Ниво увећања мапе',
	'semanticmaps_paramdesc_centre' => 'Координате центра мапе',
);

/** Serbian Latin ekavian (‪Srpski (latinica)‬)
 * @author Michaello
 */
$messages['sr-el'] = array(
	'semanticmaps-unrecognizeddistance' => 'Vrednost $1 nije ispravno rastojanje.',
	'semanticmaps_enteraddresshere' => 'Unesi adresu ovde',
	'semanticmaps_notfound' => 'nije nađeno',
	'semanticmaps_paramdesc_height' => 'Visina mape u pikselima (podrazumevano je $1)',
	'semanticmaps_paramdesc_width' => 'Širina mape u pikselima (podrazumevano je $1)',
	'semanticmaps_paramdesc_zoom' => 'Nivo uvećanja mape',
	'semanticmaps_paramdesc_centre' => 'Koordinate centra mape',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Najami
 * @author Per
 */
$messages['sv'] = array(
	'semanticmaps-desc' => 'Ger möjligheten att titta på och ändra koordinatdata sparad genom Semantic MediaWiki-utvidgningen ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps_lookupcoordinates' => 'Kolla upp koordinater',
	'semanticmaps_enteraddresshere' => 'Skriv in adress här',
	'semanticmaps_notfound' => 'hittades inte',
	'semanticmaps_paramdesc_height' => 'Höjden på kartan i pixlar (standard är $1)',
	'semanticmaps_paramdesc_width' => 'Bredden på kartan i pixlar (standard är $1)',
	'semanticmaps_paramdesc_zoom' => 'Zoomnivån för kartan',
	'semanticmaps_paramdesc_centre' => 'Koordinaterna för kartans mittpunkt',
	'semanticmaps_paramdesc_type' => 'Standard karttyp för kartan',
	'semanticmaps_paramdesc_layers' => 'Lagren tillgängliga för kartan',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'semanticmaps_enteraddresshere' => 'చిరునామాని ఇక్కడ ఇవ్వండి',
	'semanticmaps_notfound' => 'కనబడలేదు',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'semanticmaps-desc' => 'Nagbibigay ng kakayahang matingnan at baguhin ang dato ng tugmaang pampook na nakaimbak sa pamamagitan ng dugtong ng Semantikong MediaWiki ([http://mapping.referata.com/wiki/Examples pagpapamalas]).',
	'semanticmaps-unrecognizeddistance' => 'Hindi isang tanggap na layo ang halagang $1.',
	'semanticmaps-kml-link' => 'Tingnan ang talaksang KML',
	'semanticmaps-default-kml-pagelink' => 'Tingnan ang pahinang $1',
	'semanticmaps-loading-forminput' => 'Ikinakarga ang pagpapasok ng anyo ng mapa...',
	'semanticmaps_lookupcoordinates' => "Hanapin ang mga tugmaang-pampook (''coordinate'')",
	'semanticmaps_enteraddresshere' => 'Ipasok ang adres dito',
	'semanticmaps-updatemap' => 'Isapanahon ang mapa',
	'semanticmaps_notfound' => 'hindi natagpuan',
	'semanticmaps-forminput-remove' => 'Tanggalin',
	'semanticmaps-forminput-add' => 'Idagdag',
	'semanticmaps-forminput-locations' => 'Mga kinalalagyan',
	'semanticmaps_paramdesc_format' => 'Ang palingkurang pangpagmamapa na ginamit sa paglikha ng mapa',
	'semanticmaps_paramdesc_geoservice' => 'Ang paglingkurang pang-geokodigo na ginagamit upang maging mga tugmaang-pampook ang mga direksyon',
	'semanticmaps_paramdesc_height' => 'Ang taas ng mapa, sa piksels ($1 ang likas na nakatakda)',
	'semanticmaps_paramdesc_width' => 'Ang lapad ng mapa, sa piksels ($1 ang likas na nakatakda)',
	'semanticmaps_paramdesc_zoom' => 'Ang antas ng paglapit-tutok ng mapa',
	'semanticmaps_paramdesc_centre' => 'Ang mga tugmaang-pampook ng gitna ng mga mapa',
	'semanticmaps_paramdesc_controls' => 'Ang mga pangtaban ng tagagamit na inilagay sa ibabaw ng mapa',
	'semanticmaps_paramdesc_types' => 'Ang mga uri ng mapang makukuha na nasa ibabaw ng mapa',
	'semanticmaps_paramdesc_type' => 'Ang likas na nakatakdang uri ng mapa na para sa mapa',
	'semanticmaps_paramdesc_overlays' => 'Ang makukuhang mga patong na nasa ibabaw ng mapa',
	'semanticmaps_paramdesc_autozoom' => 'Kapag pinagana ang pagtutok-lapit at paglayo sa pamamagitan ng pang-ikid ng maws',
	'semanticmaps_paramdesc_layers' => 'Ang makukuhang mga patong na nasa ibabaw ng mapa',
);

/** Turkish (Türkçe)
 * @author Vito Genovese
 */
$messages['tr'] = array(
	'semanticmaps_lookupcoordinates' => 'Koordinat ara',
	'semanticmaps_enteraddresshere' => 'Adresi buraya girin',
	'semanticmaps_notfound' => 'bulunamadı',
	'semanticmaps_paramdesc_zoom' => 'Haritanın yakınlaşma seviyesi',
	'semanticmaps_paramdesc_layers' => 'Haritada mevcut olan katmanlar',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'semanticmaps_notfound' => 'ei voi löuta',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'semanticmaps-desc' => 'Cung cấp khả năng xem và sửa đổi dữ liệu tọa độ được lưu bởi phần mở rộng Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples thử xem]).',
	'semanticmaps-unrecognizeddistance' => 'Giá trị $1 không phải là tầm hợp lệ.',
	'semanticmaps_lookupcoordinates' => 'Tra tọa độ',
	'semanticmaps_enteraddresshere' => 'Nhập địa chỉ vào đây',
	'semanticmaps_notfound' => 'không tìm thấy',
	'semanticmaps_paramdesc_format' => 'Dịch vụ cung cấp bản đồ',
	'semanticmaps_paramdesc_geoservice' => 'Dịch vụ mã hóa địa lý được sử dụng để tính ra tọa độ của địa chỉ',
	'semanticmaps_paramdesc_height' => 'Chiều cao của bản đồ bằng điểm ảnh (mặc định là $1)',
	'semanticmaps_paramdesc_width' => 'Chiều rộng của bản đồ bằng điểm ảnh (mặc định là $1)',
	'semanticmaps_paramdesc_zoom' => 'Mức độ thu phóng của bản đồ',
	'semanticmaps_paramdesc_centre' => 'Tọa độ của trung tâm bản đồ',
	'semanticmaps_paramdesc_controls' => 'Các điều khiển nằm trên bản đồ',
	'semanticmaps_paramdesc_types' => 'Các chế độ có sẵn dành cho bản đồ',
	'semanticmaps_paramdesc_type' => 'Chế độ mặc định của bản đồ',
	'semanticmaps_paramdesc_overlays' => 'Các lấp có sẵn trên bản đồ',
	'semanticmaps_paramdesc_autozoom' => 'Bánh xe chuột có thu phóng hay không',
	'semanticmaps_paramdesc_layers' => 'Các lớp có sẵn trên bản đồ',
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'semanticmaps_lookupcoordinates' => 'Tuvön koordinatis',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 */
$messages['zh-hans'] = array(
	'semanticmaps_lookupcoordinates' => '查找坐标',
	'semanticmaps_notfound' => '未找到',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Gzdavidwong
 * @author Mark85296341
 * @author Sheepy
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'semanticmaps-default-kml-pagelink' => '檢視頁面 $1',
	'semanticmaps_lookupcoordinates' => '尋找座標',
	'semanticmaps_notfound' => '未找到',
);

