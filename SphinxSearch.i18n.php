<?php

$messages = array();

/* *** English *** */
$messages['en'] = array(
	'sphinxsearch-desc'        => 'Replaces MediaWiki search engine with [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxPowered'            => 'Powered by $1',
	'sphinxClientFailed'       => 'Could not instantiate Sphinx client.',
	'sphinxSearchFailed'       => 'Query failed: $1',
	'sphinxPspellError'        => 'Could not invoke pspell extension.'
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Lloffiwr
 * @author Nike
 * @author Purodha
 * @author Umherirrender
 */
$messages['qqq'] = array(
	'sphinxsearch-desc' => '{{desc}}',
	'sphinxPreviousPage' => '{{Identical|Previous}}',
	'sphinxNextPage' => '{{Identical|Next}}',
	'sphinxSearchButton' => '{{Identical|Search}}',
	'sphinxSearchEpilogue' => 'Parameters
* $1 is a floating point number ([http://en.wikipedia.org/wiki/Floating-point_number definition]).',
	'sphinxLoading' => '{{Identical|Loading}}',
	'sphinxPowered' => '$1 is replaced with a text "Sphinx" inside a link.',
	'sphinxSearchWarning' => '{{Identical|Warning}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'sphinxsearch' => 'Deursoek wiki met Sphinx',
	'sphinxsearch-desc' => 'Vervang MediaWiki se soekenjin met [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInNamespaces' => 'Soek in naamruimtes:',
	'sphinxSearchInCategories' => 'Soek in kategorieë:',
	'sphinxExcludeCategories' => 'Kategorieë om uit te sluit',
	'sphinxResultPage' => 'Resultaatbladsy:',
	'sphinxPreviousPage' => 'Vorige',
	'sphinxNextPage' => 'Volgende',
	'sphinxSearchPreamble' => '{{PLURAL:$1|Resultaat|Resultate $1 tot $2 van $3 word weergegee}} vir soekopdrag "<nowiki>$4</nowiki>". Soektyd: $5 sekondes',
	'sphinxSearchStats' => '* "$1" is $2 {{PLURAL:$2|keer|keer}} aangetref in $3 {{PLURAL:$3|dokument|dokumente}}',
	'sphinxSearchStatsInfo' => "''Die bogenoemde getalle kan dokumente bevat wat nie gelys is as gevolg van soekopsies nie.''",
	'sphinxSearchButton' => 'Soek',
	'sphinxSearchEpilogue' => 'Addisionele databasistyd was $1 sekondes.',
	'sphinxSearchDidYouMean' => 'Bedoeld u:',
	'sphinxMatchAny' => 'ieder woord',
	'sphinxMatchAll' => 'alle woorde',
	'sphinxMatchTitles' => 'slegs bladsyname',
	'sphinxLoading' => 'Besig om te laai...',
	'sphinxPowered' => 'Aangedryf deur $1',
	'sphinxClientFailed' => 'Dit was nie moontlik om SphinxClient te instansieer nie',
	'sphinxSearchFailed' => 'Soekopdrag het misluk: $1',
	'sphinxSearchWarning' => 'Waarskuwing: $1',
	'sphinxPspellError' => 'Kom nie die "pspell"-uitbreiding laai nie.',
);

/** Gheg Albanian (Gegë)
 * @author Mdupont
 */
$messages['aln'] = array(
	'sphinxsearch' => 'Kërko wiki duke përdorur sfinks',
	'sphinxsearch-desc' => 'Zëvendëson MediaWiki motor kërkimi me [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInNamespaces' => 'Kërko në hapësirën:',
	'sphinxSearchInCategories' => 'Kërko në kategoritë:',
	'sphinxExcludeCategories' => 'Temat për të përjashtuar',
	'sphinxResultPage' => 'Rezultati faqes:',
	'sphinxPreviousPage' => 'I mëparshëm',
	'sphinxNextPage' => 'Tjetër',
	'sphinxSearchPreamble' => 'Shfaqja e $1 - $2 prej $3 {{PLURAL:$3|ndeshje|ndeshje}} për pyetjen "<nowiki>$4</nowiki> "Marrë në sek $5 me këto Statistikat:',
	'sphinxSearchStats' => '* "$1" gjet $2 {{PLURAL:$2|koha|herë}} në $3 {{PLURAL:$3 |Dokumenti|dokumentet}}',
	'sphinxSearchStatsInfo' => "''Mbi numrat mund të përfshijnë dokumente nuk listuara opsionet për shkak të kërkimit.''",
	'sphinxSearchButton' => 'Kërkim',
	'sphinxSearchEpilogue' => 'kohë shtesë regjistrit ishte $1 sec.',
	'sphinxSearchDidYouMean' => 'Did you mean:',
	'sphinxMatchAny' => 'përputhen me ndonjë fjalë',
	'sphinxMatchAll' => 'Kërko të gjitha fjalët',
	'sphinxMatchTitles' => 'tituj ndeshje vetëm',
	'sphinxLoading' => 'Loading ...',
	'sphinxPowered' => 'Mundësuar nga: $1',
	'sphinxClientFailed' => 'Nuk mund të ilustroj me shembull konkret klientit sfinks.',
	'sphinxSearchFailed' => 'Query dështoi: $1',
	'sphinxSearchWarning' => 'Warning: $1',
	'sphinxPspellError' => 'Nuk mund të kërkoj vazhdimin pspell.',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'sphinxSearchWarning' => 'Pare cuenta: $1',
);

/** Arabic (العربية)
 * @author OsamaK
 */
$messages['ar'] = array(
	'sphinxSearchInCategories' => 'ابحث في التصانيف:',
	'sphinxExcludeCategories' => 'تصانيف مطلوب استثناؤها',
	'sphinxResultPage' => 'صفحة النتائج:',
	'sphinxPreviousPage' => 'السابق',
	'sphinxNextPage' => 'التالي',
	'sphinxSearchButton' => 'ابحث',
	'sphinxSearchDidYouMean' => 'هل كنت تعني:',
	'sphinxMatchAny' => 'طابق أي كلمة',
	'sphinxMatchAll' => 'طابق كل الكلمات',
	'sphinxMatchTitles' => 'طابق العنوان فقط',
	'sphinxLoading' => 'يُحمّل...',
	'sphinxSearchWarning' => 'تحذير: $1',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'sphinxSearchWarning' => 'ܙܘܗܪܐ: $1',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Zedlik
 */
$messages['be-tarask'] = array(
	'sphinxsearch' => 'Пошук у вікі з выкарыстаньнем Sphinx',
	'sphinxsearch-desc' => 'Замяняе пошукавы рухавік MediaWiki на [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Шукаць у прасторах назваў:',
	'sphinxSearchInCategories' => 'Шукаць у катэгорыях:',
	'sphinxExcludeCategories' => 'За выключэньнем катэгорыяў',
	'sphinxResultPage' => 'Старонка вынікаў:',
	'sphinxPreviousPage' => 'Папярэдняя',
	'sphinxNextPage' => 'Наступная',
	'sphinxSearchPreamble' => 'Паказ $1—$2 з $3 {{PLURAL:$3|супадзеньня|супадзеньняў|супадзеньняў}} для запыту «<nowiki>$4</nowiki>», пошук склаў $5 с з улікам гэтай статыстыкі:',
	'sphinxSearchStats' => '* «$1» знойдзены $2 {{PLURAL:$2|раз|разы|разоў}} у $3 {{PLURAL:$3|дакумэнце|дакумэнтах|дакумэнтах}}',
	'sphinxSearchStatsInfo' => "''Пададзеныя лічбы могуць утрымліваць дакумэнты, не паказаныя з-за наладаў пошуку.''",
	'sphinxSearchButton' => 'Шукаць',
	'sphinxSearchEpilogue' => 'Дадатковы час базы зьвестак склаў $1 с.',
	'sphinxSearchDidYouMean' => 'Вы мелі на ўвазе:',
	'sphinxMatchAny' => 'супадзеньне з любым словам',
	'sphinxMatchAll' => 'супадзеньне па ўсім словам',
	'sphinxMatchTitles' => 'супадзеньне толькі загалоўкаў',
	'sphinxLoading' => 'Загрузка…',
	'sphinxPowered' => 'Працуе на $1',
	'sphinxClientFailed' => 'Немагчыма стварыць экзэмпляр SphinxClient.',
	'sphinxSearchFailed' => 'Памылка запыту: $1',
	'sphinxSearchWarning' => 'Папярэджаньне: $1',
	'sphinxPspellError' => 'Немагчыма выклікаць пашырэньне pspell.',
);

/** Bulgarian (Български) */
$messages['bg'] = array(
	'sphinxPreviousPage' => 'Предишна',
	'sphinxNextPage' => 'Предишна',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'sphinxsearch' => 'Klask er wiki en ur implijout Sphinx',
	'sphinxsearch-desc' => "Erlec'hiañ lusker enklask MediaWiki gant [http://www.sphinxsearch.com/ Sphinx].",
	'sphinxSearchInNamespaces' => 'Klask en esaouennoù anv :',
	'sphinxSearchInCategories' => 'Klask er rummadoù :',
	'sphinxExcludeCategories' => 'Rummadoù da skarzhañ',
	'sphinxResultPage' => "Pajenn an disoc'hoù :",
	'sphinxPreviousPage' => 'Kent',
	'sphinxNextPage' => "War-lerc'h",
	'sphinxSearchPreamble' => 'Diskwel $1—$2 diwar $3 {{PLURAL:$3|kenglot|kenglot}} evit ar goulenn "<nowiki>$4</nowiki>" sevenet dindan $5 eilenn gant ar stadegoù-mañ :',
	'sphinxSearchStats' => '"$1" bet kavet $2 gwech e $3 teul{{PLURAL:$3||}}',
	'sphinxSearchStatsInfo' => "''Gallout a ra bezañ teulioù masklet gant dibarzhioù klask en talvoudoù a-us.''",
	'sphinxSearchButton' => 'Klask',
	'sphinxSearchEpilogue' => '$1 eilenn a oa amzer ouzhpenn an diaz roadennoù.',
	'sphinxSearchDidYouMean' => "N'hoc'h eus ket soñjet kentoc'h e :",
	'sphinxMatchAny' => 'kavout forzh peseurt ger',
	'sphinxMatchAll' => 'kavout an holl gerioù',
	'sphinxMatchTitles' => 'klask en titloù hepken',
	'sphinxLoading' => 'O kargañ...',
	'sphinxPowered' => 'Savet diwar $1',
	'sphinxClientFailed' => 'Dibosupl instantiñ an arval Sphinx',
	'sphinxSearchFailed' => "C'hwitet en deus ar reked : $1",
	'sphinxSearchWarning' => 'Diwallit : $1',
	'sphinxPspellError' => 'Dibosupl lañsañ astenn pspell.',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'sphinxsearch' => 'Pretraga wikija koristeći Sphinx',
	'sphinxSearchInNamespaces' => 'Pretraga u imenskim prostorima:',
	'sphinxSearchInCategories' => 'Pretraga u kategorijama',
	'sphinxExcludeCategories' => 'Kategorije za izostaviti',
	'sphinxResultPage' => 'Stranica rezultata:',
	'sphinxPreviousPage' => 'Prethodno',
	'sphinxNextPage' => 'Slijedeći',
	'sphinxSearchButton' => 'Traži',
	'sphinxSearchDidYouMean' => 'Da li ste mislili:',
	'sphinxLoading' => 'Učitavam...',
	'sphinxSearchFailed' => 'Upit nije uspio: $1',
	'sphinxSearchWarning' => 'Upozorenje: $1',
);

/** Sorani (کوردی) */
$messages['ckb'] = array(
	'sphinxSearchButton' => 'گەڕان',
);

/** Czech (Česky) */
$messages['cs'] = array(
	'sphinxPreviousPage' => 'Předchozí',
	'sphinxNextPage' => 'Další',
	'sphinxSearchButton' => 'Hledat',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'sphinxsearch' => 'Ermöglicht die Volltextsuche innerhalb des Wikis mit Hilfe von Sphinx',
	'sphinxsearch-desc' => 'Ersetzt die MediaWiki-eigene Volltextsuchmaschine durch [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInNamespaces' => 'Suche in Namensräumen:',
	'sphinxSearchInCategories' => 'Suche in Kategorien:',
	'sphinxExcludeCategories' => 'Auszuschließende Kategorien',
	'sphinxResultPage' => 'Ergebnisseite:',
	'sphinxPreviousPage' => 'Vorherige',
	'sphinxNextPage' => 'Nächste',
	'sphinxSearchPreamble' => 'Zeige $1—$2 von $3 {{PLURAL:$3|Übereinstimmung|Übereinstimmungen}} für die Abfrage „<nowiki>$4</nowiki>“ an. Innerhalb $5 Sekunden ermittelt. Statistik:',
	'sphinxSearchStats' => '* „$1“ wurde $2{{PLURAL:$2|-mal|-mal}} auf $3 {{PLURAL:$3|Seite|Seiten}} gefunden',
	'sphinxSearchStatsInfo' => "''Obige Zahlen können auch Seiten enthalten, die aufgrund der Sucheinstellungen nicht angezeigt werden.''",
	'sphinxSearchButton' => 'Suchen',
	'sphinxSearchEpilogue' => 'Die zusätzliche Datenbank-Zeit betrug $1 Sekunden.',
	'sphinxSearchDidYouMean' => 'Meintest du',
	'sphinxMatchAny' => 'finde eines der Wörter',
	'sphinxMatchAll' => 'finde alle Wörter',
	'sphinxMatchTitles' => 'Nur in Seitennamen suchen',
	'sphinxLoading' => 'Laden …',
	'sphinxPowered' => 'Nutzt $1',
	'sphinxClientFailed' => 'Sphinx-Client konnte nicht initialisiert werden.',
	'sphinxSearchFailed' => 'Abfrage fehlgeschlagen: $1',
	'sphinxSearchWarning' => 'Warnung: $1',
	'sphinxPspellError' => 'Die pspell-Softwareerweiterung konnte nicht aufgerufen werden.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'sphinxsearch' => 'Wiki z pomocu Sphinx pśepytaś',
	'sphinxsearch-desc' => 'Wuměnja pytawu MediaWiki pśez [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInNamespaces' => 'W mjenjowych rumach pytaś:',
	'sphinxSearchInCategories' => 'W kategorijach pytaś:',
	'sphinxExcludeCategories' => 'Kategorije, kótarež maju se wuzamknuś',
	'sphinxResultPage' => 'Bok wuslědkow:',
	'sphinxPreviousPage' => 'Pjerwjejšny',
	'sphinxNextPage' => 'Pśiducy',
	'sphinxSearchPreamble' => 'Pokazuju se $1-$2 z $3 {{PLURAL:$3|wótpowědnika|wótpowědnikowu|wótpowědnikow|wótpowědnikow}} za napšašowanje "<nowiki>$4</nowiki>", {{PLURAL:$3|wótwołanego|wótwołaneju|wótwołanych|wótwółanych}} za $5 sek. z toś tymi statistiskimi pódaśami:',
	'sphinxSearchStats' => '* "$1" {{PLURAL:$2|raz|dwójcy|$2 raze|$2 razow}} w $3 {{PLURAL:$3|dokumenśe|dokumentoma|dokumentach|dokumentach}} namakany',
	'sphinxSearchStatsInfo' => "''Licby górjejce mógu dokumenty wopśimjeś, kótarež njejsu nalicone pytańskich opcijow dla.''",
	'sphinxSearchButton' => 'Pytaś',
	'sphinxSearchEpilogue' => 'Pśidatny cas datoweje banki jo był $1 sek.',
	'sphinxSearchDidYouMean' => 'Měniš:',
	'sphinxMatchAny' => 'někake słowo',
	'sphinxMatchAll' => 'wšykne słowa',
	'sphinxMatchTitles' => 'jano titele',
	'sphinxLoading' => 'Zacytujo se...',
	'sphinxPowered' => 'Pódpěrany wót $1',
	'sphinxClientFailed' => 'Njejo było móžno, instancu klienta Sphinx napóraś.',
	'sphinxSearchFailed' => 'Napšašowanje jo se njeraźiło: $1',
	'sphinxSearchWarning' => 'Warnowanje: $1',
	'sphinxPspellError' => 'Rozšyrjenje Pspell njejo se dało aktiwěrowaś.',
);

/** Ewe (Eʋegbe) */
$messages['ee'] = array(
	'sphinxSearchButton' => 'Dii',
);

/** Greek (Ελληνικά)
 * @author Dada
 * @author Απεργός
 */
$messages['el'] = array(
	'sphinxSearchInNamespaces' => 'Αναζήτηση στις ομάδες σελίδων:',
	'sphinxSearchInCategories' => 'Αναζήτηση στις κατηγορίες:',
	'sphinxSearchButton' => 'Αναζήτηση',
	'sphinxSearchWarning' => 'Προειδοποίηση: $1',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'sphinxSearchInNamespaces' => 'Serĉi en nomspacoj:',
	'sphinxSearchInCategories' => 'Serĉi en kategorioj:',
	'sphinxExcludeCategories' => 'Kategorioj por ekskluvizi',
	'sphinxResultPage' => 'Rezulta paĝo:',
	'sphinxPreviousPage' => 'Antaŭa',
	'sphinxNextPage' => 'Sekva',
	'sphinxSearchStats' => '* "$1" troviĝis $2 {{PLURAL:$2|fojo|fojoj}} en $3 {{PLURAL:$3|dokumento|dokumentoj}}',
	'sphinxSearchButton' => 'Serĉi',
	'sphinxSearchEpilogue' => 'Plua tempo de datumbazo ests $1 sekundoj.',
	'sphinxSearchDidYouMean' => 'Ĉi vi signifas:',
	'sphinxMatchAny' => 'kongruigi ĉiun vorton',
	'sphinxMatchAll' => 'kongruigi ĉiujn vortojn',
	'sphinxMatchTitles' => 'kongruigi nur titolojn',
	'sphinxLoading' => 'Ŝarĝante...',
	'sphinxPowered' => 'Funkcias per $1',
	'sphinxClientFailed' => 'Ne povas starti klienton Sphinx.',
	'sphinxSearchFailed' => 'Mendo malsukcesis: $1',
	'sphinxSearchWarning' => 'Averto: $1',
	'sphinxPspellError' => 'Ne povis envoki kromprogramon pspell.',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Pertile
 */
$messages['es'] = array(
	'sphinxsearch' => 'Buscar en la wiki utilizando Sphinx',
	'sphinxsearch-desc' => 'Reemplazar el motor de búsqueda de MediaWiki con [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Buscar en los espacios de nombre',
	'sphinxSearchInCategories' => 'Buscar en las categorías',
	'sphinxExcludeCategories' => 'Categorías a excluir',
	'sphinxResultPage' => 'Página de resultados',
	'sphinxPreviousPage' => 'Anterior',
	'sphinxNextPage' => 'Siguiente',
	'sphinxSearchPreamble' => 'Mostrando $1—$2 de $3 {{PLURAL:$3|coincidencia|coincidencias}} para la consulta "<nowiki>$4</nowiki>" recuperado en $5 segundo(s) con estas estadísticas',
	'sphinxSearchStats' => '* "$1" fue encontrado $2 {{PLURAL:$2|vez|veces}} en $3 {{PLURAL:$3|documentos}}',
	'sphinxSearchStatsInfo' => "''Los números mostrados arriba pueden incluir documentos no listados debido a las opciones de búsqueda.''",
	'sphinxSearchButton' => 'Buscar',
	'sphinxSearchEpilogue' => 'El tiempo de base de datos adicional fue de $1 segundos.',
	'sphinxSearchDidYouMean' => 'Quizás quiso decir',
	'sphinxMatchAny' => 'coincidencia de cualquier palabra',
	'sphinxMatchAll' => 'coincidencia de todas las palabras',
	'sphinxMatchTitles' => 'coincidencia únicamente en los títulos',
	'sphinxLoading' => 'Cargando',
	'sphinxPowered' => 'Potenciado por $1',
	'sphinxClientFailed' => 'No se pudo instanciar el cliente Sphinx.',
	'sphinxSearchFailed' => 'Falló la búsqueda $1',
	'sphinxSearchWarning' => 'Advertencia $1',
	'sphinxPspellError' => 'No se pudo invocar la extensión pspell.',
);

/** Estonian (Eesti)
 * @author Hendrik
 */
$messages['et'] = array(
	'sphinxSearchDidYouMean' => 'Kas mõtlesid:',
);

/** Finnish (Suomi)
 * @author Crt
 */
$messages['fi'] = array(
	'sphinxSearchInNamespaces' => 'Hae nimiavaruuksista:',
	'sphinxPreviousPage' => 'Edellinen',
	'sphinxNextPage' => 'Seuraava',
	'sphinxSearchButton' => 'Etsi',
	'sphinxSearchDidYouMean' => 'Tarkoititko',
	'sphinxLoading' => 'Ladataan…',
	'sphinxPowered' => 'Palvelun mahdollistaa $1',
	'sphinxSearchWarning' => 'Varoitus: $1',
);

/** French (Français)
 * @author IAlex
 * @author Peter17
 * @author Verdy p
 */
$messages['fr'] = array(
	'sphinxsearch' => 'Rechercher dans le wiki en utilisant Sphinx',
	'sphinxsearch-desc' => 'Remplacer le moteur de recherche de MediaWiki par [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Rechercher dans les espaces de noms',
	'sphinxSearchInCategories' => 'Rechercher dans les catégories',
	'sphinxExcludeCategories' => 'Catégories à exclure',
	'sphinxResultPage' => 'Page de résultats',
	'sphinxPreviousPage' => 'Précédent',
	'sphinxNextPage' => 'Suivant',
	'sphinxSearchPreamble' => 'Affichage {{PLURAL:$3|du résultat|des résultats $1 à $2 sur $3}} pour la requête « <nowiki>$4</nowiki> » accomplie en $5 secondes avec ces statistiques :',
	'sphinxSearchStats' => '* « $1 » trouvé $2 fois dans $3 {{PLURAL:$3|document|documents}}',
	'sphinxSearchStatsInfo' => "''Les valeurs ci-dessus peuvent inclure des documents masqués par les options de recherche.''",
	'sphinxSearchButton' => 'Rechercher',
	'sphinxSearchEpilogue' => 'Le temps additionnel de la base de données était de $1 sec.',
	'sphinxSearchDidYouMean' => 'Vouliez-vous dire',
	'sphinxMatchAny' => "trouver n'importe quel mot",
	'sphinxMatchAll' => 'trouver tous les mots',
	'sphinxMatchTitles' => 'ne chercher que dans les titres',
	'sphinxLoading' => 'Chargement...',
	'sphinxPowered' => 'Propulsé par $1',
	'sphinxClientFailed' => "Impossible d'instancier SphinxClient.",
	'sphinxSearchFailed' => 'Échec de la requête $1',
	'sphinxSearchWarning' => 'Avertissement $1',
	'sphinxPspellError' => "Impossible de lancer l'extension pspell.",
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'sphinxsearch' => 'Rechèrchiér dens lo vouiqui en utilisent Sfinxe',
	'sphinxsearch-desc' => 'Remplace lo motor de rechèrche de MediaWiki per [http://www.sphinxsearch.com/ Sfinxe].',
	'sphinxSearchInNamespaces' => 'Rechèrchiér dens los èspâços de noms :',
	'sphinxSearchInCategories' => 'Rechèrchiér dens les catègories :',
	'sphinxExcludeCategories' => 'Catègories a èxcllure',
	'sphinxResultPage' => 'Pâge de rèsultats :',
	'sphinxPreviousPage' => 'Devant',
	'sphinxNextPage' => 'Aprés',
	'sphinxSearchStats' => '* « $1 » trovâ $2 côp{{PLURAL:$2||s}} dens $3 document{{PLURAL:$3||s}}',
	'sphinxSearchButton' => 'Rechèrchiér',
	'sphinxSearchDidYouMean' => 'Vos éd volu dére :',
	'sphinxMatchAny' => 'trovar un mot quint que seye',
	'sphinxMatchAll' => 'trovar tôs los mots',
	'sphinxMatchTitles' => 'trovar ren que los titros',
	'sphinxLoading' => 'Chargement...',
	'sphinxPowered' => 'Fonccione grâce a $1',
	'sphinxClientFailed' => 'Empossiblo d’enstanciér lo cliant Sfinxe.',
	'sphinxSearchFailed' => 'Falyita de la requéta : $1',
	'sphinxSearchWarning' => 'Avèrtissement : $1',
	'sphinxPspellError' => 'Empossiblo de lanciér l’èxtension pspell.',
);

/** Traditional Gan script (‪贛語(繁體)‬)
 * @author Symane
 */
$messages['gan-hant'] = array(
	'sphinxSearchButton' => '尋吖',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'sphinxsearch' => 'Procurar no wiki empregando o Sphinx',
	'sphinxsearch-desc' => 'Substituír o motor de buscas de MediaWiki co [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Procurar nos espazos de nomes',
	'sphinxSearchInCategories' => 'Procurar nas categorías',
	'sphinxExcludeCategories' => 'Categorías a excluír',
	'sphinxResultPage' => 'Páxina de resultados',
	'sphinxPreviousPage' => 'Anterior',
	'sphinxNextPage' => 'Seguinte',
	'sphinxSearchPreamble' => 'Mostrando {{PLURAL:$3|unha coincidencia|de $1 a $2 coincidencias dun total de $3}} que deu a pescuda "<nowiki>$4</nowiki>", {{PLURAL:$3|obtida|obtidas}} en $5 segundos con estas estatísticas:',
	'sphinxSearchStats' => '* "$1" atopouse $2 {{PLURAL:$2|vez|veces}} en $3 {{PLURAL:$3|documento|documentos}}',
	'sphinxSearchStatsInfo' => "''Os números superiores poden incluír documentos non listados debido ás opcións de procura.''",
	'sphinxSearchButton' => 'Procurar',
	'sphinxSearchEpilogue' => 'O tempo adicional da base de datos foi de $1 segundos.',
	'sphinxSearchDidYouMean' => 'Quizais quixo dicir',
	'sphinxMatchAny' => 'atopar calquera palabra',
	'sphinxMatchAll' => 'atopar todas as palabras',
	'sphinxMatchTitles' => 'atopar só nos títulos',
	'sphinxLoading' => 'Cargando...',
	'sphinxPowered' => 'Desenvolvido por $1',
	'sphinxClientFailed' => 'Non se puido conectar co cliente Sphinx.',
	'sphinxSearchFailed' => 'Fallou a pescuda: $1',
	'sphinxSearchWarning' => 'Aviso: $1',
	'sphinxPspellError' => 'Non se puido chamar a extensión pspell.',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'sphinxsearch' => 'Wiki dursueche mit Sphinx',
	'sphinxsearch-desc' => 'Ersetzt d MediaWiki-Suechmahscin dur [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInNamespaces' => 'Suech in Namensryym:',
	'sphinxSearchInCategories' => 'In Kategorie sueche:',
	'sphinxExcludeCategories' => 'Kategorie, wu solle uusgschlosse syy',
	'sphinxResultPage' => 'Ergebnissyte:',
	'sphinxPreviousPage' => 'Vorigi',
	'sphinxNextPage' => 'Negschti',
	'sphinxSearchPreamble' => '$1—$2 vu $3 {{PLURAL:$3|Ergebnis|Ergebnis}} fir d Abfrog „<nowiki>$4</nowiki>“ (Suechzyt: $5 Sekunde):',
	'sphinxSearchStats' => '* „$1“ $2 {{PLURAL:$2|mol|mol}} gfunde in $3 {{PLURAL:$3|Dokumänt|Dokumänt}}',
	'sphinxSearchStatsInfo' => "''In däre Zahl wäre villicht Dokumänt mitzellt, wu wäge bstimmte Suechyystellige nit ufglischtet wäre.''",
	'sphinxSearchButton' => 'Sueche',
	'sphinxSearchEpilogue' => 'Zuesätzligi Datebankzyt isch $1 Sekunde gsi.',
	'sphinxSearchDidYouMean' => 'Hesch gmeint:',
	'sphinxMatchAny' => 'irged e Wort',
	'sphinxMatchAll' => 'alli Werter',
	'sphinxMatchTitles' => 'nume Sytename',
	'sphinxLoading' => 'Am Lade …',
	'sphinxPowered' => 'Betribe mit $1',
	'sphinxClientFailed' => 'Het dr SphinxClient nit chenne inizialisiere',
	'sphinxSearchFailed' => 'Abfrog fähl gschlaa: $1',
	'sphinxSearchWarning' => 'Warnig: $1',
	'sphinxPspellError' => 'Het d pspell-Erwyterig nit chenne ufruefe',
);

/** Hausa (هَوُسَ) */
$messages['ha'] = array(
	'sphinxSearchButton' => 'Nema',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author YaronSh
 */
$messages['he'] = array(
	'sphinxsearch' => 'חיפוש בוויקי באמצעות תוכנת ספינקס',
	'sphinxsearch-desc' => 'החלפת מנוע החיפוש של מדיה־ויקי במנוע [http://www.sphinxsearch.com/ ספינקס]',
	'sphinxSearchInNamespaces' => 'חיפוש במרחבי שם:',
	'sphinxSearchInCategories' => 'חיפוש בקטגוריות:',
	'sphinxExcludeCategories' => 'לא לחפש בקטגוריות הבאות',
	'sphinxResultPage' => 'דף תוצאות:',
	'sphinxPreviousPage' => 'הקודם',
	'sphinxNextPage' => 'הבא',
	'sphinxSearchPreamble' => '{{PLURAL:$3|הצגת התוצאה היחידה|הצגה של $1–$2 מתוך $3 תוצאות}} לשאילתה "<nowiki>$4</nowiki>" ב־{{PLURAL:$5|שנייה אחת|$5 שניות}}. סטטיסטיקות:',
	'sphinxSearchStats' => '* המחרוזת "$1" נמצאה {{PLURAL:$2|פעם אחת|$1 פעמים}} ב{{PLURAL:$3|מסמך אחד|־$3 מסמכים}}',
	'sphinxSearchStatsInfo' => "'''ייתכן שהמספרים למעלה כוללים מסמכים שאינם מופיעם בגלל הגדרות החיפוש.'''",
	'sphinxSearchButton' => 'חיפוש',
	'sphinxSearchEpilogue' => 'זמן מסד הנתונים הנוסף היה {{PLURAL:$1|שנייה אחת|$1 שניות}}.',
	'sphinxSearchDidYouMean' => 'האם התכוונתם ל:',
	'sphinxMatchAny' => 'התאמה של מילה כלשהי',
	'sphinxMatchAll' => 'התאמה של כל המילים',
	'sphinxMatchTitles' => 'התאמה בכותרות בלבד',
	'sphinxLoading' => 'בטעינה…',
	'sphinxPowered' => 'מופעל על גבי $1',
	'sphinxClientFailed' => 'נכשלה יצירת מופע של לקוח ספינקס.',
	'sphinxSearchFailed' => 'שאילתה נכשלה: $1',
	'sphinxSearchWarning' => 'אזהרה: $1',
	'sphinxPspellError' => 'נכשלה הפעלת ההרחבה pspell.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'sphinxsearch' => 'Wiki z pomocu Sphinx přepytać',
	'sphinxsearch-desc' => 'Naruna pytawu MediaWiki přez [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInNamespaces' => 'W mjenowych rumach pytać:',
	'sphinxSearchInCategories' => 'W kategorijach pytać:',
	'sphinxExcludeCategories' => 'Kategorije, kotrež maja so wuzamknyć',
	'sphinxResultPage' => 'Strona wuslědkow:',
	'sphinxPreviousPage' => 'Předchadna',
	'sphinxNextPage' => 'Přichodna',
	'sphinxSearchPreamble' => 'Pokazuja so $1-$2 z $3 {{PLURAL:$3|wotpowědnika|wotpowědnikow|wotpowědnikow|wotpowědnikow}} za naprašowanje "<nowiki>$4</nowiki>", {{PLURAL:$3|wotwołaneho|wotwołaneju|wotwołanych|wotwołanych}} za $5 sek. z tutymi statistiskimi podaćemi:',
	'sphinxSearchStats' => '* "$1" {{PLURAL:$2|$2 raz|dwójce|$2 razy|$2 razow}} w $3 {{PLURAL:$3|dokumenće|dokumentomaj|dokumentach|dokumentach}} namakany',
	'sphinxSearchStatsInfo' => "''Ličby horjeka móžeja dokumenty wobsahować, kotrež njejsu pytanskich opcijow dla nalistowane.''",
	'sphinxSearchButton' => 'Pytać',
	'sphinxSearchEpilogue' => 'Přidatny čas datoweje banki bě $1 sek.',
	'sphinxSearchDidYouMean' => 'Měnješe ty:',
	'sphinxMatchAny' => 'někajke słowo',
	'sphinxMatchAll' => 'wšě słowa',
	'sphinxMatchTitles' => 'jenož titule',
	'sphinxLoading' => 'Začituje so...',
	'sphinxPowered' => 'Spěchowany wot $1',
	'sphinxClientFailed' => 'Njebě móžno, instancu klienta Sphinx wutworić.',
	'sphinxSearchFailed' => 'Naprašowanje je so njeporadźiło: $1',
	'sphinxSearchWarning' => 'Warnowanje: $1',
	'sphinxPspellError' => 'Rozšěrjenje Pspell njeda so aktiwizować.',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Glanthor Reviol
 */
$messages['hu'] = array(
	'sphinxsearch' => 'Keresés a wikiben a Sphinx használatával',
	'sphinxSearchInNamespaces' => 'Keresés a következő névterekben:',
	'sphinxSearchInCategories' => 'Keresés a következő kategóriákban:',
	'sphinxExcludeCategories' => 'Kihagyandó kategóriák',
	'sphinxPreviousPage' => 'Előző',
	'sphinxNextPage' => 'Következő',
	'sphinxSearchButton' => 'Keresés',
	'sphinxSearchDidYouMean' => 'Keresési javaslat:',
	'sphinxMatchAny' => 'bármely szóra',
	'sphinxMatchAll' => 'minden szóra',
	'sphinxMatchTitles' => 'keresés csak a címekben',
	'sphinxLoading' => 'Betöltés…',
	'sphinxPowered' => 'A keresést a $1 működteti.',
	'sphinxClientFailed' => 'Nem sikerült elindítani a Sphinx klienst.',
	'sphinxSearchFailed' => 'Sikertelen lekérdezés: $1',
	'sphinxSearchWarning' => 'Figyelmeztetés: $1',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'sphinxsearch' => 'Cercar in le wiki usante Sphinx',
	'sphinxsearch-desc' => 'Reimplaciar le motor de recerca de MediaWiki per [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Cercar in spatios de nomines',
	'sphinxSearchInCategories' => 'Cercar in categorias:',
	'sphinxExcludeCategories' => 'Categorias a excluder',
	'sphinxResultPage' => 'Pagina de resultatos:',
	'sphinxPreviousPage' => 'Precedente',
	'sphinxNextPage' => 'Sequente',
	'sphinxSearchPreamble' => '{{PLURAL:$3|Un sol resultato|Resultatos $1—$2 de $3}} pro le recerca de "<nowiki>$4</nowiki>" recuperate in $5 {{PLURAL:$5|secunda|secundas}} con iste statisticas',
	'sphinxSearchStats' => '* "$1" trovate $2 {{PLURAL:$2|vice|vices}} in $3 {{PLURAL:$3|documento|documentos}}',
	'sphinxSearchStatsInfo' => "''Le numeros hic supra pote includer documentos non listate debite al optiones de recerca.''",
	'sphinxSearchButton' => 'Cercar',
	'sphinxSearchEpilogue' => 'Le tempore additional del base de datos esseva $1 secundas.',
	'sphinxSearchDidYouMean' => 'Esque tu vole dicer:',
	'sphinxMatchAny' => 'trovar qualcunque parola',
	'sphinxMatchAll' => 'trovar tote le parolas',
	'sphinxMatchTitles' => 'cercar solmente in titulos',
	'sphinxLoading' => 'Cargamento…',
	'sphinxPowered' => 'Actionate per $1',
	'sphinxClientFailed' => 'Non poteva instantiar SphinxClient.',
	'sphinxSearchFailed' => 'Consulta fallite: $1',
	'sphinxSearchWarning' => 'Advertimento: $1',
	'sphinxPspellError' => 'Non poteva invocar le extension pspell.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 * @author Kenrick95
 */
$messages['id'] = array(
	'sphinxsearch' => 'Telusuri wiki dengan Sphinx',
	'sphinxsearch-desc' => 'Menggantikan mesin pencari MediaWiki dengan [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInNamespaces' => 'Cari di ruang nama:',
	'sphinxSearchInCategories' => 'Cari di kategori:',
	'sphinxExcludeCategories' => 'Kategori yang dikeluarkan',
	'sphinxResultPage' => 'Halaman hasil:',
	'sphinxPreviousPage' => 'Sebelumnya',
	'sphinxNextPage' => 'Selanjutnya',
	'sphinxSearchPreamble' => 'Menampilkan $1—$2 dari $3 {{PLURAL:$3|kecocokan|kecocokan}} untuk kueri "<nowiki>$4</nowiki>" yang diambil dalam $5 detik dengan statistik berikut:',
	'sphinxSearchStats' => '* "$1" ditemukan $2 {{PLURAL:$2|kali|kali}} di $3 {{PLURAL:$3|dokumen|dokumen}}',
	'sphinxSearchStatsInfo' => "''Angka di atas mungkin mencakup dokumen yang tidak terdaftar karena pilihan pencarian.''",
	'sphinxSearchButton' => 'Cari',
	'sphinxSearchEpilogue' => 'Waktu basis data tambahan adalah $1 detik.',
	'sphinxSearchDidYouMean' => 'Maksud Anda:',
	'sphinxMatchAny' => 'cocokkan kata apapun',
	'sphinxMatchAll' => 'cocokkan semua kata',
	'sphinxMatchTitles' => 'cocokkan judul saja',
	'sphinxLoading' => 'Memuat...',
	'sphinxPowered' => 'Didukung oleh $1',
	'sphinxClientFailed' => 'Tidak dapat menginstankan klien Sphinx.',
	'sphinxSearchFailed' => 'Kueri gagal: $1',
	'sphinxSearchWarning' => 'Peringatan: $1',
	'sphinxPspellError' => 'Tidak dapat memanggil ekstensi pspell.',
);

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'sphinxSearchButton' => 'Chọwa',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author 青子守歌
 */
$messages['ja'] = array(
	'sphinxsearch' => 'Sphinx をつかってウィキを検索',
	'sphinxsearch-desc' => 'メディアウィキの検索エンジンを [http://www.sphinxsearch.com/ Sphinx] で置き換える',
	'sphinxSearchInNamespaces' => '名前空間で検索：',
	'sphinxSearchInCategories' => 'カテゴリで検索：',
	'sphinxExcludeCategories' => '除外するカテゴリ',
	'sphinxResultPage' => '結果ページ：',
	'sphinxPreviousPage' => '前',
	'sphinxNextPage' => '次',
	'sphinxSearchPreamble' => '検索語「<nowiki>$4</nowiki>」に対する$3件の{{PLURAL:$3|一致}}中 $1—$2 件目の結果を表示しています。検索にかかった時間は $5秒で、その他の統計は:',
	'sphinxSearchStats' => '* 「$1」が、$3件の{{PLURAL:$3|文書}}中に、$2{{PLURAL:$2|回}}見つかりました',
	'sphinxSearchStatsInfo' => "''検索結果の件数には、検索の設定により表示されていない文書も含まれている可能性があります。''",
	'sphinxSearchButton' => '検索',
	'sphinxSearchEpilogue' => '追加データベースにかかった時間は $1 秒です。',
	'sphinxSearchDidYouMean' => 'もしかして：',
	'sphinxMatchAny' => 'いずれかの単語に一致',
	'sphinxMatchAll' => 'すべての単語に一致',
	'sphinxMatchTitles' => 'ページ名のみ一致',
	'sphinxLoading' => '読み込み中…',
	'sphinxPowered' => '$1の提供',
	'sphinxClientFailed' => 'Sphinx クライアントを呼び出せませんでした。',
	'sphinxSearchFailed' => '検索失敗: $1',
	'sphinxSearchWarning' => '警告： $1',
	'sphinxPspellError' => 'pspell 拡張機能を起動できませんでした。',
);

/** Kazakh (Cyrillic) (Қазақша (Cyrillic))
 * @author GaiJin
 */
$messages['kk-cyrl'] = array(
	'sphinxSearchButton' => 'Іздеу',
);

/** Kalaallisut (Kalaallisut)
 * @author Qaqqalik
 */
$messages['kl'] = array(
	'sphinxSearchButton' => 'Ujarlerit',
);

/** Khmer (ភាសាខ្មែរ)
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'sphinxPreviousPage' => 'មុន',
	'sphinxNextPage' => 'បន្ទាប់',
);

/** Kannada (ಕನ್ನಡ)
 * @author Nayvik
 */
$messages['kn'] = array(
	'sphinxSearchButton' => 'ಹುಡುಕು',
	'sphinxSearchWarning' => 'ಎಚ್ಚರಿಕೆ: $1',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'sphinxsearch' => 'Em Wiki Söhke met <i lang="en">Sphinx</i>',
	'sphinxsearch-desc' => 'Donn dem WediaWiki sing Projramm för et Söhke jääje [http://www.sphinxsearch.com/ Sphinx] ußtuusche.',
	'sphinxSearchInNamespaces' => 'Söhk en de Apachtemangs:',
	'sphinxSearchInCategories' => 'Söhk en de Saachjroppe:',
	'sphinxExcludeCategories' => 'Ußjeschloße Saachjroppe',
	'sphinxResultPage' => 'De Sigg met dämm, wat eruß jekumme es:',
	'sphinxPreviousPage' => 'Vörijje',
	'sphinxNextPage' => 'Näächste',
	'sphinxSearchPreamble' => '{{PLURAL:$3|Zeish dä|Zeish $1 beß $2 vun $3|Et jitt keine}} Träffer för di Frooch „<nowiki>$4</nowiki>“.
{{PLURAL:$3|Dä|Se|Dat}} wood en $5 Sekunde jefonge.
Shtatißtik:',
	'sphinxSearchStats' => '* „$1“ wood {{PLURAL:$2|eimohl|$2 mohl|}} en {{PLURAL:$3|einem Dokemänt|$3 Dokemänt|kein Dokemänte}} jefonge.',
	'sphinxSearchStatsInfo' => 'Et künnte och Dokemänte mitjezallt sin, di wäje dä Ußwahl beim Söhke nit met opjeleß wääde.',
	'sphinxSearchButton' => 'Söhke',
	'sphinxSearchEpilogue' => 'De zohsäzlejje Zick för de Daatebangk wohr {{PLURAL:$1|$1 Sekund|$1 Sekunde|$1 Sekunde}}.',
	'sphinxSearchDidYouMean' => 'Häß De velleish jemeint:',
	'sphinxMatchAny' => 'fengk öhnds e Woot',
	'sphinxMatchAll' => 'Fengk all de Wööter',
	'sphinxMatchTitles' => 'bloß en Siggenaame looere',
	'sphinxLoading' => 'Ben am Lade&nbsp;…',
	'sphinxPowered' => 'Op de Reih jebraat vun $1.',
	'sphinxClientFailed' => 'Mer kunnte kein neu Ußjab för ene Klijänt vu däm Projramm <i lang="en">Sphinx</i> opboue.',
	'sphinxSearchFailed' => 'Di Frooch es donävve jejange: $1',
	'sphinxSearchWarning' => 'Opjepaß: $1',
	'sphinxPspellError' => 'Mer kunnte dat Zohsazprojramm <code lang="en">pspell</code> nit oproofe.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'sphinxsearch' => 'Op der Wiki mat Sphinx sichen',
	'sphinxsearch-desc' => "Ersetzt d'MediaWiki Sichmaschinn duerch [http://www.sphinxsearch.com/  Sphinx]",
	'sphinxSearchInNamespaces' => 'Sichen an den Nummraim:',
	'sphinxSearchInCategories' => 'Sichen an de Kategorien:',
	'sphinxExcludeCategories' => 'Kategorien fir auszeschléissen',
	'sphinxResultPage' => 'Säit mat de Resultater:',
	'sphinxPreviousPage' => 'Vireg',
	'sphinxNextPage' => 'Nächst',
	'sphinxSearchPreamble' => 'Weis $1—$2 vu(n) $3 {{PLURAL:$3|Treffer|Treffer}} fir d\'Ufro "<nowiki>$4</nowiki>". déi bannert $5 Sekonne mat dëse Statistike fonnt goufen:',
	'sphinxSearchStats' => '* "$1" gouf {{PLURAL:$2|eemol| $2 mol}} an {{PLURAL:$3|engem Dokument| $3 Dokumenter}} fonnt',
	'sphinxSearchStatsInfo' => "''An der Zuel uewendriwwer kënnen Dokumenter drasinn, déi duerch d'Sichoptiounen, net gewise ginn.''",
	'sphinxSearchButton' => 'Sichen',
	'sphinxSearchEpilogue' => 'Déi zousätzlech Datebankzäit war $1 Sekonnen.',
	'sphinxSearchDidYouMean' => 'Mengt Dir:',
	'sphinxMatchAny' => 'eent vun de Wierder fannen',
	'sphinxMatchAll' => 'all Wierder fannen',
	'sphinxMatchTitles' => 'nëmmen an den Titele sichen',
	'sphinxLoading' => 'Lueden...',
	'sphinxPowered' => 'Notzt $1',
	'sphinxClientFailed' => 'De Sphinx Client konnt net initialiséiert ginn.',
	'sphinxSearchFailed' => 'Ufro huet net fonctionnéiert: $1',
	'sphinxSearchWarning' => 'Warnung: $1',
	'sphinxPspellError' => "D'pspell-Erweiderung konnt net opgeruff ginn.",
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'sphinxsearch' => 'Пребарување по вики со Sphinx',
	'sphinxsearch-desc' => 'Замена на МедијаВики пребарувачот со [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Барај во именски простори',
	'sphinxSearchInCategories' => 'Барај во категории',
	'sphinxExcludeCategories' => 'Категории за изоставање',
	'sphinxResultPage' => 'Страница за резулати',
	'sphinxPreviousPage' => 'Претходна',
	'sphinxNextPage' => 'Следна',
	'sphinxSearchPreamble' => 'Приказ на $1—$2 од вкупно $3 {{PLURAL:$3|совпаѓање|совпаѓања}} за барањето „<nowiki>$4</nowiki>“ извршено во рок од $5 сек. со следниве статистики:',
	'sphinxSearchStats' => '* „$1“ е пронајдено {{PLURAL:$2|еднаш|$2 пати}} во $3 {{PLURAL:$3|документ|документи}}',
	'sphinxSearchStatsInfo' => "''Горенаведените бројки може да содржат документи кои не се наведени поради нагодувањата на пребарувањето.''",
	'sphinxSearchButton' => 'Пребарај',
	'sphinxSearchEpilogue' => 'Дополнителното време за базата на податоци изнесуваше $1 сек.',
	'sphinxSearchDidYouMean' => 'Дали мислевте на:',
	'sphinxMatchAny' => 'барај било кој збор',
	'sphinxMatchAll' => 'барај само зборови',
	'sphinxMatchTitles' => 'барај само наслови',
	'sphinxLoading' => 'Вчитувам...',
	'sphinxPowered' => 'Овозможено од $1',
	'sphinxClientFailed' => 'Не можев да повикам Sphinx клиент.',
	'sphinxSearchFailed' => 'Барањето не успеа $1',
	'sphinxSearchWarning' => 'Предупредување $1',
	'sphinxPspellError' => 'Не можев да повикам pspell додаток.',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'sphinxPreviousPage' => 'Sebelumnya',
	'sphinxNextPage' => 'Berikutnya',
	'sphinxSearchButton' => 'Cari',
	'sphinxLoading' => 'Memuatkan...',
);

/** Dutch (Nederlands)
 * @author McDutchie
 * @author Siebrand
 */
$messages['nl'] = array(
	'sphinxsearch' => 'Wiki doorzoeken met Sphinx',
	'sphinxsearch-desc' => 'Vervangt de MediaWiki-zoekmachine door [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInNamespaces' => 'Zoeken in naamruimten:',
	'sphinxSearchInCategories' => 'Zoeken in categorieën:',
	'sphinxExcludeCategories' => 'Uit te sluiten categorieën',
	'sphinxResultPage' => 'Resultatenpagina:',
	'sphinxPreviousPage' => 'Vorige',
	'sphinxNextPage' => 'Volgende',
	'sphinxSearchPreamble' => '{{PLURAL:$1|Resultaat|Resultaten $1 tot $2 van $3 worden weergegeven}} voor zoekopdracht "<nowiki>$4</nowiki>". Zoektijd: $5 seconden',
	'sphinxSearchStats' => '* "$1" is $2 {{PLURAL:$2|keer|keer}} aangetroffen in $3 {{PLURAL:$3|document|documenten}}',
	'sphinxSearchStatsInfo' => "''De bovenstaande aantallen kunnen documenten bevatten die niet worden weergegeven vanwege zoekinstellingen.''",
	'sphinxSearchButton' => 'Zoeken',
	'sphinxSearchEpilogue' => 'Aanvullende databasetijd was $1 seconden.',
	'sphinxSearchDidYouMean' => 'Bedoelde u:',
	'sphinxMatchAny' => 'ieder woord',
	'sphinxMatchAll' => 'alle woorden',
	'sphinxMatchTitles' => 'alleen paginanamen',
	'sphinxLoading' => 'Bezig met laden...',
	'sphinxPowered' => 'Powered by $1',
	'sphinxClientFailed' => 'Het was niet mogelijk SphinxClient te initialiseren',
	'sphinxSearchFailed' => 'Zoekopdracht mislukt $1',
	'sphinxSearchWarning' => 'Waarschuwing $1',
	'sphinxPspellError' => 'Het was niet mogelijk de uitbreiding "pspell" aan te spreken.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Nghtwlkr
 */
$messages['nn'] = array(
	'sphinxSearchInNamespaces' => 'Søk i namnerom:',
	'sphinxSearchInCategories' => 'Søk i kategoriar:',
	'sphinxResultPage' => 'Resultatside:',
	'sphinxPreviousPage' => 'Førre',
	'sphinxNextPage' => 'Neste',
	'sphinxSearchButton' => 'Søk',
	'sphinxLoading' => 'Lastar...',
	'sphinxSearchWarning' => 'Åtvaring: $1',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'sphinxsearch' => 'Søk i wiki med Sphinx',
	'sphinxsearch-desc' => 'Erstatt MediaWiki-søkemotoren med [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Søk i navnerom:',
	'sphinxSearchInCategories' => 'Søk i kategorier:',
	'sphinxExcludeCategories' => 'Kategorier å ekskludere',
	'sphinxResultPage' => 'Resultatside:',
	'sphinxPreviousPage' => 'Forrige',
	'sphinxNextPage' => 'Neste',
	'sphinxSearchPreamble' => 'Viser $1—$2 av $3 {{PLURAL:$3|treff|treff}} på søket «<nowiki>$4</nowiki>» hentet på $5 sek med disse statistikkene:',
	'sphinxSearchStats' => '* «$1» funnet $2 {{PLURAL:$2|gang|ganger}} i $3 {{PLURAL:$3|dokument|dokument}}',
	'sphinxSearchStatsInfo' => "''Tallene over kan inneholder dokumenter som ikke er oppført på grunn av søkealternativene.''",
	'sphinxSearchButton' => 'Søk',
	'sphinxSearchEpilogue' => 'Ytterligere databasetid var $1 sek.',
	'sphinxSearchDidYouMean' => 'Mente du:',
	'sphinxMatchAny' => 'treff hvilket som helst av ordene',
	'sphinxMatchAll' => 'treff alle ordene',
	'sphinxMatchTitles' => 'treff kun titler',
	'sphinxLoading' => 'Laster...',
	'sphinxPowered' => 'Drevet av $1',
	'sphinxClientFailed' => 'Kunne ikke instansiere Sphinx-klienten.',
	'sphinxSearchFailed' => 'Søk feilet: $1',
	'sphinxSearchWarning' => 'Advarsel: $1',
	'sphinxPspellError' => 'Kunne ikke starte utvidelsen pspell.',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'sphinxNextPage' => 'Neegschte',
	'sphinxSearchButton' => 'Uffgucke',
	'sphinxSearchDidYouMean' => 'Hoscht du gemeent:',
	'sphinxSearchWarning' => 'Warning: $1',
);

/** Pälzisch (Pälzisch)
 * @author Xqt
 */
$messages['pfl'] = array(
	'sphinxPreviousPage' => 'Voriche',
	'sphinxNextPage' => 'Negschte',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'sphinxsearch' => 'Przeszukiwanie wiki z użyciem Sphinx',
	'sphinxsearch-desc' => 'Zastępuje wyszukiwarką [http://www.sphinxsearch.com/ Sphinx] standardową MediaWiki',
	'sphinxSearchInNamespaces' => 'Szukaj w przestrzeniach nazw:',
	'sphinxSearchInCategories' => 'Szukaj w kategoriach:',
	'sphinxExcludeCategories' => 'Pomiń kategorie',
	'sphinxResultPage' => 'Strona z wynikami',
	'sphinxPreviousPage' => 'Poprzednia',
	'sphinxNextPage' => 'Następna',
	'sphinxSearchPreamble' => 'Wyświetlono od $1 do $2 z $3 {{PLURAL:$3|pasującego|pasujących}} dla zapytania „<nowiki>$4</nowiki>” wykonanego w $5 sekund z tymi statystykami:',
	'sphinxSearchStats' => '* „$1” odnaleziono $2 {{PLURAL:$2|raz|razy}} w $3 {{PLURAL:$3|dokumencie|dokumentach}}',
	'sphinxSearchStatsInfo' => "''Powyższa liczba może uwzględniać dokumenty nie wymienione ze względu na wybrane opcje wyszukiwania.''",
	'sphinxSearchButton' => 'Szukaj',
	'sphinxSearchEpilogue' => 'Dodatkowy czas dla bazy danych to $1 {{PLURAL:$1|sekunda|sekundy|sekund}}.',
	'sphinxSearchDidYouMean' => 'Czy miałeś na myśli:',
	'sphinxMatchAny' => 'dopasuj dowolne ze słów',
	'sphinxMatchAll' => 'dopasuj wszystkie słowa',
	'sphinxMatchTitles' => 'dopasuj tylko do tytułów',
	'sphinxLoading' => 'Ładowanie...',
	'sphinxPowered' => 'Wykorzystano $1',
	'sphinxClientFailed' => 'Nie można utworzyć instancji klienta Sfinksa.',
	'sphinxSearchFailed' => 'Zapytanie nie powiodło się – $1',
	'sphinxSearchWarning' => 'Uwaga – $1',
	'sphinxPspellError' => 'Nie można wywołać rozszerzenia pspell.',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'sphinxsearch' => 'Arserché ant la wiki an dovrand Sphinx',
	'sphinxsearch-desc' => "A rimpiassa ël motor d'arserca MediaWiki con [http://www.sphinxsearch.com/ Sphinx]",
	'sphinxSearchInNamespaces' => 'Sërché ant jë spassi nominaj:',
	'sphinxSearchInCategories' => 'Sërché ant le categorìe:',
	'sphinxExcludeCategories' => 'Categorìe da esclude',
	'sphinxResultPage' => "Pàgina d'arzultà:",
	'sphinxPreviousPage' => 'Prima',
	'sphinxNextPage' => 'Apress',
	'sphinxSearchPreamble' => 'Visualisassion $1—$2 ëd $3 {{PLURAL:$3|arzultà|arzultà}} për l\'arcesta "<nowiki>$4</nowiki>" trovà an $5 second con coste statìstiche:',
	'sphinxSearchStats' => '* "$1" trovà $2 {{PLURAL:$2|vira|vire}} an $3 {{PLURAL:$3|document}}',
	'sphinxSearchStatsInfo' => "''Ij nùmer sì-dzora a peulo anclude dij document pa listà a motiv dj'opsion d'arserca.''",
	'sphinxSearchButton' => 'Sërca',
	'sphinxSearchEpilogue' => "Ël temp adissional dla base ëd dàit a l'é stàit ëd $1 sec.",
	'sphinxSearchDidYouMean' => 'Vorìj-lo pa dì:',
	'sphinxMatchAny' => 'confronté na paròla qualsëssìa',
	'sphinxMatchAll' => 'confronté tute le paròle',
	'sphinxMatchTitles' => 'confronta mach ij tìtoj',
	'sphinxLoading' => 'A caria ...',
	'sphinxPowered' => 'Potensià da $1',
	'sphinxClientFailed' => 'As peul pa istansié ël client Sphinx.',
	'sphinxSearchFailed' => 'Arcesta falìa: $1',
	'sphinxSearchWarning' => 'Avis: $1',
	'sphinxPspellError' => "As peul pa ciamesse l'estension pspell.",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'sphinxSearchInNamespaces' => 'په نوم-تشيالونو کې پلټنه:',
	'sphinxSearchInCategories' => 'په وېشنيزو کې پلټنه:',
	'sphinxResultPage' => 'د پايلې مخ:',
	'sphinxPreviousPage' => 'پخواني',
	'sphinxNextPage' => 'راتلونکی',
	'sphinxSearchButton' => 'پلټل',
	'sphinxSearchDidYouMean' => 'آيا همدا مو موخه وه:',
	'sphinxLoading' => 'د برسېرېدلو په حال کې...',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 * @author Waldir
 */
$messages['pt'] = array(
	'sphinxsearch' => 'Pesquisar a wiki usando o Sphinx',
	'sphinxsearch-desc' => 'Substituir o motor de pesquisa do MediaWiki pelo [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Pesquisar nos espaços nominais',
	'sphinxSearchInCategories' => 'Pesquisar nas categorias',
	'sphinxExcludeCategories' => 'Categorias a excluir',
	'sphinxResultPage' => 'Página de resultados',
	'sphinxPreviousPage' => 'Anterior',
	'sphinxNextPage' => 'Seguinte',
	'sphinxSearchPreamble' => 'A mostrar $1—$2 de $3 {{PLURAL:$3|resultado|resultados}}, para a pesquisa "<nowiki>$4</nowiki>", {{PLURAL:$3|obtido|obtidos}} em $5 seg. com estas estatísticas:',
	'sphinxSearchStats' => '* "$1" foi encontrado $2 {{PLURAL:$2|vez|vezes}} em $3 {{PLURAL:$3|documento|documentos}}',
	'sphinxSearchStatsInfo' => "''Os números acima podem incluir documentos que não são listados devido às opções de pesquisa.''",
	'sphinxSearchButton' => 'Pesquisar',
	'sphinxSearchEpilogue' => 'O tempo adicional da base de dados foi $1 seg.',
	'sphinxSearchDidYouMean' => 'Talvez pretendesse',
	'sphinxMatchAny' => 'localizar qualquer palavra',
	'sphinxMatchAll' => 'localizar todas as palavras',
	'sphinxMatchTitles' => 'localizar somente nos títulos',
	'sphinxLoading' => 'A carregar...',
	'sphinxPowered' => 'Potenciado por $1',
	'sphinxClientFailed' => 'Não foi possível instanciar o cliente Sphinx.',
	'sphinxSearchFailed' => 'Pesquisa falhou $1',
	'sphinxSearchWarning' => 'Aviso $1',
	'sphinxPspellError' => 'Não foi possível chamar a extensão pspell.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 * @author Luckas Blade
 */
$messages['pt-br'] = array(
	'sphinxsearch' => 'Pesquisar na wiki usando o Sphinx',
	'sphinxsearch-desc' => 'Substituir o motor de pesquisa do MediaWiki pelo [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Pesquisar nos espaços nominais',
	'sphinxSearchInCategories' => 'Pesquisar nas categorias',
	'sphinxExcludeCategories' => 'Categorias a excluir',
	'sphinxResultPage' => 'Página de resultados:',
	'sphinxPreviousPage' => 'Anterior',
	'sphinxNextPage' => 'Próximo',
	'sphinxSearchPreamble' => 'Mostrando $1—$2 de $3 {{PLURAL:$3|resultado|resultados}}, para a pesquisa "<nowiki>$4</nowiki>", {{PLURAL:$3|obtido|obtidos}} em $5 s com estas estatísticas:',
	'sphinxSearchStats' => '* "$1" foi encontrado $2 {{PLURAL:$2|vez|vezes}} em $3 {{PLURAL:$3|documento|documentos}}',
	'sphinxSearchStatsInfo' => "''Os números acima podem incluir documentos que não estão listados devido às opções de pesquisa.''",
	'sphinxSearchButton' => 'Pesquisar',
	'sphinxSearchEpilogue' => 'O tempo adicional da base de dados foi $1 s.',
	'sphinxSearchDidYouMean' => 'Você quis dizer:',
	'sphinxMatchAny' => 'localizar qualquer palavra',
	'sphinxMatchAll' => 'localizar todas as palavras',
	'sphinxMatchTitles' => 'localizar somente nos títulos',
	'sphinxLoading' => 'Carregando...',
	'sphinxPowered' => 'Powered by $1',
	'sphinxClientFailed' => 'Não foi possível instanciar o cliente Sphinx.',
	'sphinxSearchFailed' => 'Pesquisa falhou: $1',
	'sphinxSearchWarning' => 'Aviso: $1',
	'sphinxPspellError' => 'Não foi possível chamar a extensão pspell.',
);

/** Russian (Русский)
 * @author Reedy
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'sphinxsearch' => 'Поиск по вики с помощью Sphinx',
	'sphinxsearch-desc' => 'Замена поискового движка MediaWiki на [http://www.sphinxsearch.com/ Sphinx].',
	'sphinxSearchInNamespaces' => 'Поиск в пространствах имён',
	'sphinxSearchInCategories' => 'Поиск по категориям',
	'sphinxExcludeCategories' => 'Категории для исключения',
	'sphinxResultPage' => 'Страница результатов',
	'sphinxPreviousPage' => 'Предыдущая',
	'sphinxNextPage' => 'Следующая',
	'sphinxSearchPreamble' => 'Отображение $1—$2 {{PLURAL:$3|результата|результатов}} из $3 для запроса «<nowiki>$4</nowiki>», поиск занял $5 с',
	'sphinxSearchStats' => '* «$1» найдено $2 {{PLURAL:$2|раз|раза|раз}} в $3 {{PLURAL:$3|документе|документах|документах}}',
	'sphinxSearchStatsInfo' => "''Приведённые цифры могут включать в себя документы, не показанные из-за настроек поиска.''",
	'sphinxSearchButton' => 'Найти',
	'sphinxSearchEpilogue' => 'Дополнительное время базы данных составило $1 с.',
	'sphinxSearchDidYouMean' => 'Возможно, вы имели в виду',
	'sphinxMatchAny' => 'соответствие любому слову',
	'sphinxMatchAll' => 'соответствие всем словам',
	'sphinxMatchTitles' => 'соответствие только заголовкам',
	'sphinxLoading' => 'Загрузка…',
	'sphinxPowered' => 'При поддержке $1',
	'sphinxClientFailed' => 'Невозможно создать экземпляр SphinxClient.',
	'sphinxSearchFailed' => 'Ошибка при выполнении запроса $1',
	'sphinxSearchWarning' => 'Предупреждение $1',
	'sphinxPspellError' => 'Невозможно вызвать расширение pspell.',
);

/** Rusyn (Русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'sphinxPreviousPage' => 'Попереднї',
	'sphinxNextPage' => 'Далшы',
	'sphinxSearchButton' => 'Глядати',
);

/** Somali (Soomaaliga)
 * @author Maax
 */
$messages['so'] = array(
	'sphinxSearchButton' => 'Raadi',
);

/** Serbian Cyrillic ekavian (‪Српски (ћирилица)‬)
 * @author Rancher
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'sphinxsearch' => 'Претрага Викија са Sphinx-ом',
	'sphinxSearchInNamespaces' => 'Претрага у именским просторима:',
	'sphinxSearchInCategories' => 'Претрага у категоријама:',
	'sphinxExcludeCategories' => 'Категорије за изузимање',
	'sphinxPreviousPage' => 'Претходно',
	'sphinxNextPage' => 'Следеће',
	'sphinxSearchEpilogue' => 'Додатно време потребно бази је било $1 сек.',
	'sphinxSearchDidYouMean' => 'Да ли сте мислили:',
	'sphinxMatchAny' => 'претражи на било коју реч',
	'sphinxMatchAll' => 'претражи на све речи',
	'sphinxMatchTitles' => 'шретражи само наслове',
	'sphinxLoading' => 'Учитавам…',
	'sphinxPowered' => 'Покреће $1',
	'sphinxClientFailed' => 'Sphinx клијент није могао бити инсталиран.',
	'sphinxSearchFailed' => 'Упит није прошао: $1',
	'sphinxSearchWarning' => 'Упозорење: $1',
	'sphinxPspellError' => 'Није пронађено pspell проширење.',
);

/** Serbian Latin ekavian (‪Srpski (latinica)‬) */
$messages['sr-el'] = array(
	'sphinxsearch' => 'Pretraga Vikija sa Sphinx-om',
	'sphinxSearchInNamespaces' => 'Pretraga u imenskim prostorima:',
	'sphinxSearchInCategories' => 'Pretraga u kategorijama:',
	'sphinxExcludeCategories' => 'Kategorije za izuzimanje',
	'sphinxPreviousPage' => 'Prethodno',
	'sphinxNextPage' => 'Sledeće',
	'sphinxSearchDidYouMean' => 'Da li ste mislili:',
	'sphinxMatchAny' => 'pretraži na bilo koju reč',
	'sphinxMatchAll' => 'pretraži na sve reči',
	'sphinxLoading' => 'Učitava se...',
	'sphinxClientFailed' => 'Sphinx klijent nije mogao biti instaliran.',
	'sphinxSearchFailed' => 'Upit nije prošao: $1',
	'sphinxSearchWarning' => 'Upozorenje: $1',
	'sphinxPspellError' => 'Nije pronađena pspell ekstenzija.',
);

/** Swedish (Svenska)
 * @author Dafer45
 */
$messages['sv'] = array(
	'sphinxsearch-desc' => 'Ersätter MediaWiki-sökmotorn med [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInCategories' => 'Sök i kategorier:',
	'sphinxExcludeCategories' => 'Kategorier som skall uteslutas',
	'sphinxResultPage' => 'Resultatsida:',
	'sphinxPreviousPage' => 'Föregående',
	'sphinxNextPage' => 'Nästa',
	'sphinxLoading' => 'Laddar ...',
	'sphinxSearchWarning' => 'Varning: $1',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'sphinxSearchInCategories' => 'వర్గాలలో వెతుకు:',
	'sphinxExcludeCategories' => 'వదిలేయాల్సిన వర్గాలు',
	'sphinxResultPage' => 'ఫలితపు పుట:',
	'sphinxPreviousPage' => 'గత',
	'sphinxNextPage' => 'తదుపరి',
	'sphinxSearchButton' => 'వెతుకు',
	'sphinxSearchDidYouMean' => 'మీరు అంటున్నది ఇదా:',
	'sphinxLoading' => 'లోడవుతోంది...',
	'sphinxSearchWarning' => 'హెచ్చరిక: $1',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'sphinxSearchButton' => 'Buka',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'sphinxsearch' => 'Maghanap sa wiki na ginagamit ang Sphinx',
	'sphinxsearch-desc' => 'Pinapalitan ang makinang panghanap sa MediaWiki ng [http://www.sphinxsearch.com/ Sphinx]',
	'sphinxSearchInNamespaces' => 'Maghanap sa mga puwang ng pangalan:',
	'sphinxSearchInCategories' => 'Maghanap sa mga kategorya:',
	'sphinxExcludeCategories' => 'Hindi isasamang mga kategorya',
	'sphinxResultPage' => 'Pahina ng resulta:',
	'sphinxPreviousPage' => 'Nakaraan',
	'sphinxNextPage' => 'Susunod',
	'sphinxSearchPreamble' => 'Ipinapakita ang $1—$2 ng $3 na {{PLURAL:$3|katugma|mga katugma}} para sa tanong na "<nowiki>$4</nowiki>" na nakuha sa loob ng $5 segundo na may ganitong estadistika:',
	'sphinxSearchStats' => '* Natagpuan ang "$1" na may $2 {{PLURAL:$2|ulit|mga ulit}} sa loob ng $3 na {{PLURAL:$3|kasulatan|mga kasulatan}}',
	'sphinxSearchStatsInfo' => "''Ang nasa itaas na mga bilang ay maaaring nagsama ng mga kasulatang hindi nakatala dahil sa mga pinagpilian ng paghahanap.''",
	'sphinxSearchButton' => 'Maghanap',
	'sphinxSearchEpilogue' => 'Ang karagdagang oras sa kalipunan ng dato ay $1 segundo.',
	'sphinxSearchDidYouMean' => 'Ibig mo bang sabihin:',
	'sphinxMatchAny' => 'itugma sa anumang salita',
	'sphinxMatchAll' => 'itugma sa lahat ng mga salita',
	'sphinxMatchTitles' => 'itugma lang sa mga pamagat',
	'sphinxLoading' => 'Ikinakarga...',
	'sphinxPowered' => 'Pinapaandar ng $1',
	'sphinxClientFailed' => 'Hindi masangdali ang kliyente ng Sphinx.',
	'sphinxSearchFailed' => 'Nabigo ang tanong: $1',
	'sphinxSearchWarning' => 'Babala: $1',
	'sphinxPspellError' => 'Hindi masamo ang dugtong na pspell.',
);

/** Ukrainian (Українська)
 * @author Тест
 */
$messages['uk'] = array(
	'sphinxPreviousPage' => 'Попередня',
	'sphinxNextPage' => 'Наступна',
	'sphinxSearchButton' => 'Знайти',
	'sphinxLoading' => 'Завантаження ...',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'sphinxResultPage' => 'רעזולטאַט בלאַט:',
	'sphinxNextPage' => 'נעקסטע',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author PhiLiP
 * @author Xiaomingyan
 */
$messages['zh-hans'] = array(
	'sphinxPreviousPage' => '上一个',
	'sphinxNextPage' => '下一个',
	'sphinxSearchDidYouMean' => '您是不是要找：',
	'sphinxLoading' => '正在载入...',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Mark85296341
 */
$messages['zh-hant'] = array(
	'sphinxSearchInNamespaces' => '在以下的名字空間中搜尋：',
	'sphinxSearchButton' => '搜尋',
	'sphinxSearchDidYouMean' => '您是不是要找：',
	'sphinxLoading' => '載入中...',
	'sphinxSearchFailed' => '查詢失敗：$1',
	'sphinxSearchWarning' => '警告：$1',
);

