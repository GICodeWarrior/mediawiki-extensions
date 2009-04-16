<?php
/**
 * Internationalisation for SimpleSecurity extension
 *
 * @author Nad
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Nad
 */
$messages['en'] = array(
	'security'                 => 'Security log',
	'security-desc'            => 'Extends the MediaWiki page protection to allow restricting viewing of page content',
	'security-logpage'         => 'Security log',
	'security-logpagetext'     => 'This is a log of actions blocked by the [http://www.mediawiki.org/wiki/Extension:SimpleSecurity SimpleSecurity extension].',
	'security-logentry'        => '', # do not translate or duplicate this message to other languages
	'badaccess-read'           => 'Warning: "$1" is referred to here, but you do not have sufficient permissions to access it.',
	'security-info'            => 'There are $1 on this page',
	'security-info-toggle'     => 'security restrictions',
	'security-inforestrict'    => '$1 is restricted to $2',
	'security-desc-LS'         => "''(applies because this page is in the '''$2 $1''')''",
	'security-desc-PR'         => "''(set from the '''protect tab''')''",
	#'security-desc-CR'         => "''(this restriction is '''in effect now''')''",
	'security-infosysops'      => "No restrictions are in effect because you are a member of the '''sysop''' group",
	'security-manygroups'      => 'groups $1 and $2',
	'security-unchain'         => 'Modify actions individually',
	'security-type-category'   => 'category',
	'security-type-namespace'  => 'namespace',
);

/** Message documentation (Message documentation)
 * @author Fryed-peach
 * @author Purodha
 * @author Siebrand
 */
$messages['qqq'] = array(
	'security' => '{{doc-important|The translation for this message cannot be equal to that of {{msg-mw|protectlogpage}} ({{int:protectlogpage}})!}}',
	'security-desc' => 'Short description of this extension, shown in [[Special:Version]]. Do not translate or change links.',
	'badaccess-read' => '$1 is a page title that is restricted to access.',
	'security-info' => '$1 is {{msg-mw|Security-info-toggle}} with a link',
	'security-inforestrict' => '* $1 is an action name
* $2 contains user group name(s)',
	'security-desc-LS' => '* $1 is the name of a category or namespace
* $2 is {{msg-mw|security-type-category}} or {{msg-mw|security-type-namespace}}',
	'security-type-category' => '{{Identical|Category}}',
	'security-type-namespace' => '{{Identical|Namespace}}',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'security' => 'سجل الأمن',
	'security-desc' => 'يمدد حماية المقالات في ميدياويكي للسماح بتحديد رؤية محتوى المقالات',
	'security-logpage' => 'سجل الأمن',
	'security-logpagetext' => 'هذا سجل بالأفعال الممنوعة بواسطة [http://www.mediawiki.org/wiki/Extension:SimpleSecurity امتداد الأمن البسيط].',
	'badaccess-read' => 'تحذير: "$1" ترجع إلى هنا، لكنك لا تمتلك سماحات كافية للوصول إليها.',
	'security-info' => 'توجد $1 على هذه المقالة',
	'security-info-toggle' => 'ضوابط الأمن',
	'security-inforestrict' => '$1 مضبوط إلى $2',
	'security-desc-LS' => "''(يطبق لأن هذه المقالة موجودة في '''$2 $1''')''",
	'security-desc-PR' => "''(اضبط من '''لسان الحماية''')''",
	'security-infosysops' => "لا ضوابط مفعلة لأنك عضو في مجموعة '''sysop'''",
	'security-manygroups' => 'المجموعات $1 و $2',
	'security-unchain' => 'عدل الأفعال بشكل فردي',
	'security-type-category' => 'تصنيف',
	'security-type-namespace' => 'نطاق',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'security' => 'Журнал бясьпекі',
	'security-desc' => 'Пашырае магчымасьці абароны старонак MediaWiki і дазваляе абмяжоўваць прагляд зьместу старонак',
	'security-logpage' => 'Журнал бясьпекі',
	'security-logpagetext' => 'Гэта журнал дзеяньняў не дазволеных з дапамогай [http://www.mediawiki.org/wiki/Extension:SimpleSecurity пашырэньня SimpleSecurity].',
	'badaccess-read' => 'Увага: «$1» спасылаецца сюды, але Вы ня маеце адпаведных правоў для доступу.',
	'security-info' => 'Гэтая старонка мае $1',
	'security-info-toggle' => 'абмежаваньні бясьпекі',
	'security-inforestrict' => '$1 забаронены для $2',
	'security-desc-LS' => "''(адпавядае, таму што гэтая старонка ў '''$2 $1''')''",
	'security-desc-PR' => "''(скапіяваць з '''закладкі абароны''')''",
	'security-infosysops' => "Ніякія абмежаваньні ня будуць дзейнічаць, таму што Вы зьяўляецеся '''адміністратарам'''",
	'security-manygroups' => 'групы $1 і $2',
	'security-unchain' => 'Зьмяніць дзеяньні індывідуальна',
	'security-type-category' => 'катэгорыя',
	'security-type-namespace' => 'прастора назваў',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'security-type-category' => 'категория',
	'security-type-namespace' => 'именно пространство',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'security' => 'Zapisnik sigurnosti',
	'security-logpage' => 'Zapisnik sigurnosti',
	'badaccess-read' => 'Upozorenje: "$1" je povezano ovdje, ali nemate dovoljno privilegija da ovdje pristupite.',
	'security-info' => 'Postoji $1 na ovom članku',
	'security-info-toggle' => 'sigurnosna ograničenja',
	'security-inforestrict' => '$1 je onemogućena za $2',
	'security-desc-LS' => "''(primjenjuje se jer je ova stranica u '''$2 $1''')''",
	'security-desc-PR' => "''(postavljeno iz '''stranice zaštite''')''",
	'security-manygroups' => 'grupe $1 i $2',
	'security-unchain' => 'Izmijeni svaku akciju zasebno',
	'security-type-category' => 'kategorija',
	'security-type-namespace' => 'imenski prostor',
);

/** German (Deutsch)
 * @author ChrisiPK
 * @author Umherirrender
 */
$messages['de'] = array(
	'security' => 'Sicherheits-Logbuch',
	'security-desc' => 'Erweitert den MediaWiki-Seitenschutz, um das Ansehen von Seiteninhalt zu begrenzen',
	'security-logpage' => 'Sicherheits-Logbuch',
	'security-logpagetext' => 'Dies ist ein Logbuch von geblockten Aktionen der [http://www.mediawiki.org/wiki/Extension:SimpleSecurity Extension „SimpleSecurity“].',
	'badaccess-read' => 'Warnung: „$1“ verweißt hierher, aber du hast keine ausreichende Berechtigung um die Seite zu sehen.',
	'security-info' => 'Auf dieser Seite sind $1',
	'security-info-toggle' => 'Sicherheitsbegrenzungen',
	'security-inforestrict' => '$1 ist begrenzt auf $2',
	'security-desc-LS' => "''(gilt, weil diese Seite ist in der '''$2 $1''')''",
	'security-desc-PR' => "''(gesetzt über den Tab '''Seitenschutz''')''",
	'security-infosysops' => 'Für dich sind keine Begrenzungen aktiv, weil du der Gruppe „Administrator“ angehörst',
	'security-manygroups' => 'Gruppen $1 und $2',
	'security-unchain' => 'Ändere Aktionen einzeln',
	'security-type-category' => 'Kategorie',
	'security-type-namespace' => 'Namensraum',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Umherirrender
 */
$messages['de-formal'] = array(
	'badaccess-read' => 'Warnung: „$1“ verweißt hierher, aber Sie haben keine ausreichende Berechtigung um die Seite zu sehen.',
	'security-infosysops' => 'Für Sie sind keine Begrenzungen aktiv, weil Sie der Gruppe „Administrator“ angehören',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'security' => 'Wěstotny protokol',
	'security-desc' => 'Rozšyrja nastawkowy šćit MediaWiki wó móžnosć wobglědanje nastawkowego wopśimjeśa wobgranicowaś',
	'security-logpage' => 'Wěstotny protokol',
	'security-logpagetext' => 'To jo protokol akcijow blokěrowanych pséz [http://www.mediawiki.org/wiki/Extension:SimpleSecurity rozšyrjenje Simple Security].',
	'badaccess-read' => 'Warnowanje: How se na "$1" póśěgujo, ale njamaš pšawa, aby měł na njen pśistup.',
	'security-info' => 'Su $1 wó toś tom nastawku',
	'security-info-toggle' => 'wěstotne wobgranicowanja',
	'security-inforestrict' => '$1 jo na $2 wobgranicowany',
	'security-desc-LS' => "''(nałožujo se, dokulaž toś ten nastawk jo w '''$2 $1''')''",
	'security-desc-PR' => "''(ze '''šćitowego rejtarka''' stajony)''",
	'security-infosysops' => "Njejsu žedne wobgranicowanja, dokulaž sy cłonk w kupce '''administratorow'''",
	'security-manygroups' => 'kupce $1 a $2',
	'security-unchain' => 'Akcije jadnotliwje změniś',
	'security-type-category' => 'kategorija',
	'security-type-namespace' => 'mjenjowy rum',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'security-type-category' => 'κατηγορία',
);

/** Spanish (Español)
 * @author Crazymadlover
 */
$messages['es'] = array(
	'security' => 'Registro de seguridad',
	'security-desc' => 'Extiende la protección de artículos MediaWiki para permitir vista restringida del contenido del artículo',
	'security-logpage' => 'Registro de seguridad',
	'security-logpagetext' => 'Esto es un registro de bloqueo de acciones hechos por [http://www.mediawiki.org/wiki/Extension:SimpleSecurity la extensión SimpleSecurity].',
	'badaccess-read' => 'Advertencia:"$1" está referenciado aquí, pero no tienes permisos suficientes para acceder a el.',
	'security-info' => 'Hay $1 en este artículo',
	'security-info-toggle' => 'restricciones de seguridad',
	'security-inforestrict' => '$1 está restringido a $2',
	'security-manygroups' => 'grupos $1 y $2',
	'security-unchain' => 'modificar acciones individualmente',
	'security-type-category' => 'categoría',
);

/** French (Français)
 * @author Crochet.david
 * @author IAlex
 */
$messages['fr'] = array(
	'security' => 'Journal de sécurité',
	'security-desc' => 'Étend l’interface de protection de MediaWiki pour permettre de restreindre la vue des pages',
	'security-logpage' => 'Journal de sécurité',
	'security-logpagetext' => 'Ceci est un journal des actions bloquées par l’[http://www.mediawiki.org/wiki/Extension:SimpleSecurity extension SimpleSecurity].',
	'badaccess-read' => 'Attention : « $1 » est référencé ici, mais vous ne disposez pas des autorisations pour y accéder.',
	'security-info' => 'Il y a $1 sur cet article',
	'security-info-toggle' => 'restrictions de sécurité',
	'security-inforestrict' => '$1 est limité à $2',
	'security-desc-LS' => "''(s’applique parce que cet article est dans le '''$2 $1''')''",
	'security-desc-PR' => "''(défini depuis l’'''onglet de protection''')''",
	'security-infosysops' => "Aucune restriction en vigueur parce que vous êtes un membre du groupe '''administrateur'''",
	'security-manygroups' => 'groupes $1 et $2',
	'security-unchain' => 'Modifier les actions individuellement',
	'security-type-category' => 'catégorie',
	'security-type-namespace' => 'espace de noms',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'security' => 'Rexistro de seguridade',
	'security-desc' => 'Amplía a protección da páxina MediaWiki para permitir a restrición da visualización da páxina de contido',
	'security-logpage' => 'Rexistro de seguridade',
	'security-logpagetext' => 'Este é un rexistro das accións bloqueadad pola [http://www.mediawiki.org/wiki/Extension:SimpleSecurity extensión SimpleSecurity].',
	'badaccess-read' => 'Advertencia: "$1" está aquí referida, pero non ten os permisos necesarios para acceder a ela.',
	'security-info' => 'Hai $1 nesta páxina',
	'security-info-toggle' => 'restricións de seguridade',
	'security-inforestrict' => '$1 está restrinxido a $2',
	'security-desc-LS' => "''(aplícase porque esta páxina está en '''$2 $1''')''",
	'security-desc-PR' => "''(establecido desde a '''lapela de protección''')''",
	'security-infosysops' => "Non hai restricións en vigor porque vostede é membro do grupo dos '''administradores'''",
	'security-manygroups' => 'grupos $1 e $2',
	'security-unchain' => 'Modificar as accións individualmente',
	'security-type-category' => 'categoría',
	'security-type-namespace' => 'espazo de nomes',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 */
$messages['grc'] = array(
	'security-type-category' => 'κατηγορία',
	'security-type-namespace' => 'Ὀνοματεῖον',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'security' => 'Sicherheits-Logbuech',
	'security-desc' => 'Erwyteret dr Mediawiki-Syteschutz, zum Aaluege vum Syteinhalt yyzschränke',
	'security-logpage' => 'Sicherheits-Logbuech',
	'security-logpagetext' => 'Des isch s Logbuech vu dr Aktione, wu gsperrt sin dur d [http://www.mediawiki.org/wiki/Extension:SimpleSecurity SimpleSecurity-Erwyterig].',
	'badaccess-read' => 'Warnig: "$1" isch do aagee, aber Du hesch nit d netig Berächtigung go die Syte aaluege.',
	'security-info' => 'Uf däre Syte het s $1',
	'security-info-toggle' => 'Sicherheitsyyschränkige',
	'security-inforestrict' => '$1 isch yygschränkt uf $2',
	'security-desc-LS' => "''(giltet, wel dää Artikel in dr '''$2 $1''' isch)''",
	'security-desc-PR' => "''(gsetzt iber dr Regischtercharte '''Syteschutz''')''",
	'security-infosysops' => 'Fir Dii git s kei Yyschränkige, wel Du zue dr Gruppe „Ammann“ ghersch',
	'security-manygroups' => 'Gruppe $1 un $2',
	'security-unchain' => 'Aktione einzeln ändere',
	'security-type-category' => 'Kategorii',
	'security-type-namespace' => 'Namensruum',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'security' => 'יומן האבטחה',
	'security-desc' => 'הרחבת הגנת הדפים במדיה־ויקי כך שתתאפשר הגבלת הצפיה בתוכן הדף',
	'security-logpage' => 'יומן האבטחה',
	'security-logpagetext' => 'זהו יומן הפעולות שנחסמו על ידי [http://www.mediawiki.org/wiki/Extension:SimpleSecurity ההרחבה SimpleSecurity].',
	'badaccess-read' => 'אזהרה: נמצאת כאן הפניה אל "$1", אך הרשאותיכם אינן מאפשרות גישה אליו.',
	'security-info' => 'ישנם $1 בדף זה',
	'security-info-toggle' => 'הגבלות אבטחה',
	'security-inforestrict' => 'הפעולה $1 מוגבלת לקבוצה $2',
	'security-desc-LS' => "''(חל כיוון שדף זה נמצא ב'''$2 $1''')''",
	'security-desc-PR' => "''(הוגדר דרך '''לשונית ההגנה''')''",
	'security-infosysops' => "לא חלות הגבלות כלשהן כיוון שיש לכם הרשאות '''מפעיל המערכת'''",
	'security-manygroups' => 'הקבוצות $1 ו־$2',
	'security-unchain' => 'שינוי פעולות בנפרד',
	'security-type-category' => 'קטגוריה',
	'security-type-namespace' => 'מרחב השם',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'security' => 'Wěstotny protokol',
	'security-desc' => 'Rozšěrja nastawkowy škit MediaWiki wo móžnosć wobhladanje nastawkoweho wobsaha wobmjezować',
	'security-logpage' => 'Wěstotny protokol',
	'security-logpagetext' => 'To je protokol akcijow zablokowanych přez [http://www.mediawiki.org/wiki/Extension:SimpleSecurity rozšěrjenje Simple Security].',
	'badaccess-read' => 'Warnowanje: Na "$1 so tu poćahuje, ale nimaš prawa, zo by přistup na njón měł.',
	'security-info' => 'Su $1 wo tutym nastawku',
	'security-info-toggle' => 'wěstotne wobmjezowanja',
	'security-inforestrict' => '$1 je na $2 wobmjezowany',
	'security-desc-LS' => "''(nałožuje so, dokelž tutón nastawk je w '''$2 $1''')''",
	'security-desc-PR' => "''(ze '''škitoweho rajtarka''' stajeny)''",
	'security-infosysops' => "Njejsu wobmjezowanja, dokelž sy čłon skupiny '''administratorow'''",
	'security-manygroups' => 'skupinje $1 a $2',
	'security-unchain' => 'Akcije jednotliwje změnić',
	'security-type-category' => 'kategorija',
	'security-type-namespace' => 'mjenowy rum',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'security' => 'Registro de securitate',
	'security-desc' => 'Extende le protection de paginas MediaWiki pro permitter restringer le vista del contento del paginas',
	'security-logpage' => 'Registro de securitate',
	'security-logpagetext' => 'Isto es un registro de actiones blocate per le [http://www.mediawiki.org/wiki/Extension:SimpleSecurity extension SimpleSecurity].',
	'badaccess-read' => 'Attention: "$1" es referentiate ci, ma tu non ha permissiones sufficiente pro acceder a illo.',
	'security-info' => 'Iste pagina es subjecte a $1',
	'security-info-toggle' => 'restrictiones de securitate',
	'security-inforestrict' => '$1 es restringite a $2',
	'security-desc-LS' => "''(se applica proque iste pagina es in le '''$2 $1''')''",
	'security-desc-PR' => "''(definite con le '''scheda de protection''')''",
	'security-infosysops' => "Nulle restriction es in vigor proque tu es membro del gruppo '''administratores'''",
	'security-manygroups' => 'gruppos $1 e $2',
	'security-unchain' => 'Modificar actiones individualmente',
	'security-type-category' => 'categoria',
	'security-type-namespace' => 'spatio de nomines',
);

/** Japanese (日本語)
 * @author Fievarsty
 * @author Fryed-peach
 * @author Hosiryuhosi
 */
$messages['ja'] = array(
	'security' => 'セキュリティ記録',
	'security-desc' => 'MediaWikiのページ保護機能で、ページの閲覧を制限できるように拡張する',
	'security-logpage' => 'セキュリティ記録',
	'security-logpagetext' => 'これは、[http://www.mediawiki.org/wiki/Extension:SimpleSecurity SimpleSecurity 拡張機能]によって阻止された操作の記録です。',
	'badaccess-read' => '警告:「$1」はここを参照していますが、あなたにはアクセスに必要な権限がありません。',
	'security-info' => 'このページには$1があります',
	'security-info-toggle' => 'セキュリティ制限',
	'security-inforestrict' => '$1は$2に限定されています',
	'security-desc-LS' => "''(この記事が'''$2 $1'''にあるため)''",
	'security-desc-PR' => "''('''保護タブ'''からの設定)''",
	'security-infosysops' => "あなたは'''{{int:group-sysop}}'''グループに所属しているため、制限は無効です",
	'security-manygroups' => 'グループ $1 および $2',
	'security-unchain' => '操作別に変更する',
	'security-type-category' => 'カテゴリ',
	'security-type-namespace' => '名前空間',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'security' => 'Et Logboch övver de Beschrängkunge för et Aanloore',
	'security-desc' => 'Määt der Siggeschotz en MediaWiki esu jruuß,
dat mer och et Sigge-Aanloore ennschrängke kann.',
	'security-logpage' => 'Et Logboch övver de Beschrängkunge för et Aanloore',
	'security-logpagetext' => 'Dat hee es et Logboch met de Akßjuhne, di dat [http://www.mediawiki.org/wiki/Extension:SimpleSecurity Zosatzprojramm <i lang="en">SimpleSecurity</i>] afjeblock hät.',
	'badaccess-read' => 'Opjepaß: De Sigg „$1“ jeiht noh hee, ävver Do häs nit jenooch Rääschde för der Zohjreff doh drop.',
	'security-info' => 'Mer han $1 op dä Sigg hee',
	'security-info-toggle' => 'Beschrängkunge för et Aanloore',
	'security-inforestrict' => '$1 es beschrängk op $2',
	'security-desc-LS' => "''(jelt, weil de Sigg en de '''$2 $1''' es)''",
	'security-desc-PR' => "''(jesaz övver dä '''Lengk „{{int:Protect}}“''')''",
	'security-infosysops' => "För Disch jidd_et kein Beschrängkonge, weil De dä Metmaacher-Jropp vun de '''{{int:group-sysop}}''' bes.",
	'security-manygroups' => 'Jroppe $1 un $2',
	'security-unchain' => 'Donn de Akßjuhne einzel ändere',
	'security-type-category' => 'Saachjropp',
	'security-type-namespace' => 'Appachtemang',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'security' => 'Sécherheets-Logbuch',
	'security-desc' => "Erweidert de MediaWiki-Säiteschutz fir et z'erlaben d'Kucke vum Säiteninhalt ze limitéieren",
	'security-logpage' => 'Sécherheets-Logbuch',
	'security-info' => 'Et sinn $1 op dëser Säit',
	'security-info-toggle' => 'Sécherheetsrestrictiounen',
	'security-inforestrict' => '$1 ass limitéiert op $2',
	'security-infosysops' => "Et gëtt fir Iech keng Limitatioune wëll Dir e Member vum Grupp vun den '''Administrateure''' sidd",
	'security-manygroups' => 'Gruppen $1 a(n) $2',
	'security-unchain' => 'Aktiounen individuell änneren',
	'security-type-category' => 'Kategorie',
	'security-type-namespace' => 'Nummraum',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'security-type-namespace' => 'лемпотмо',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'security' => 'Paginabeveiligingslogboek',
	'security-desc' => "Breidt de paginabescherming van MediaWiki uit door het bekijken van pagina's te beperken",
	'security-logpage' => 'Paginabeveiligingslogboek',
	'security-logpagetext' => 'Dit is een logboek met de handelingen die geblokkeerd zijn door de uitbreiding [http://www.mediawiki.org/wiki/Extension:SimpleSecurity SimpleSecurity].',
	'badaccess-read' => 'Waarschuwing: "$1" verwijst naar deze pagina, maar u hebt niet de toegangsrechten om deze pagina te bekijken.',
	'security-info' => 'Er zijn $1 voor deze pagina',
	'security-info-toggle' => 'beveiligingsbeperkingen',
	'security-inforestrict' => '$1 is alleen mogelijk door $2',
	'security-desc-LS' => "''(van toepassing omdat deze pagina is zich in de '''$2 $1''' bevindt)''",
	'security-desc-PR' => "''(ingesteld vanuit de functie '''beveiligen''')''",
	'security-infosysops' => 'Beperkingen zijn niet van kracht zijn omdat u lid bent van de groep beheerders',
	'security-manygroups' => 'groepen $1 en $2',
	'security-unchain' => 'Handelingen individueel wijzigen',
	'security-type-category' => 'categorie',
	'security-type-namespace' => 'naamruimte',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Gunnernett
 * @author Harald Khan
 */
$messages['nn'] = array(
	'security' => 'Tryggingslogg',
	'security-desc' => 'Utvidar MediaWiki sin funksjon for sidevern til å gje høve til å sperra mot innsyn i sideinnhald',
	'security-logpage' => 'Tryggingslogg',
	'security-logpagetext' => 'Dette er ein logg over handlingar som er blokkerte av [http://www.mediawiki.org/wiki/Extension:SimpleSecurity SimpleSecurity-utvidinga].',
	'badaccess-read' => 'Åtvaring: «$1» er synt til her, men du har ikkje turvande løyve til å få tilgjenge.',
	'security-info' => 'Det finst $1 på denne sida',
	'security-info-toggle' => 'tryggingsrelaterte avgrensingar',
	'security-inforestrict' => '$1 er avgrensa til $2',
	'security-infosysops' => "Ingen avgrensingar er verksame etter di du er ein '''administrator'''",
	'security-manygroups' => 'gruppene $1 og $2',
	'security-unchain' => 'Endra handlingar individuelt',
	'security-type-category' => 'kategori',
	'security-type-namespace' => 'namnerom',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'security' => 'Jornal de seguretat',
	'security-desc' => "Espandís l'interfàcia de proteccion de MediaWiki per permetre de restrénher la vista de las paginas",
	'security-logpage' => 'Jornal de seguretat',
	'security-logpagetext' => "Aquò es un jornal de las accions blocadas per l'[http://www.mediawiki.org/wiki/Extension:SimpleSecurity extension SimpleSecurity].",
	'badaccess-read' => 'Atencion : « $1 » es referenciat aicí, mas dispausatz pas de las autorizacions per i accedir.',
	'security-info' => 'I a $1 sus aqueste article',
	'security-info-toggle' => 'restriccions de seguretat',
	'security-inforestrict' => '$1 es limitat a $2',
	'security-desc-LS' => "''(s'aplica perque aqueste article es dins lo '''$2 $1''')''",
	'security-desc-PR' => "''(definit dempuèi l''''onglet de proteccion''')''",
	'security-infosysops' => "Cap de restriccion pas en vigor perque sètz un membre del grop '''administrator'''",
	'security-manygroups' => 'gropes $1 e $2',
	'security-unchain' => 'Modificar las accions individualament',
	'security-type-category' => 'categoria',
	'security-type-namespace' => 'espaci de nom',
);

/** Polish (Polski)
 * @author Leinad
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'security' => 'Rejestr zabezpieczania',
	'security-desc' => 'Dodaje do funkcjonalności zabezpieczania stron możliwość ograniczania wyświetlania zawartości strony',
	'security-logpage' => 'Rejestr zabezpieczania',
	'security-logpagetext' => 'Jest to rejestr działań zablokowanych przez [http://www.mediawiki.org/wiki/Extension:SimpleSecurity rozszerzenie SimpleSecurity].',
	'badaccess-read' => 'Uwaga – nie masz wystarczających uprawnień dla dostępu do żądanej strony „$1”.',
	'security-info' => 'Dostęp do tej strony jest $1',
	'security-info-toggle' => 'ograniczony',
	'security-inforestrict' => '$1 jest ograniczone do $2',
	'security-desc-LS' => "''(ma zastosowanie, ponieważ ta strona jest w '''$2 $1''')''",
	'security-desc-PR' => "''(ustawione poprzez zakładkę '''zabezpiecz''')''",
	'security-infosysops' => "Brak obowiązujących ograniczeń, ponieważ jesteś członkiem grupy '''administratorzy'''.",
	'security-manygroups' => 'grup $1 oraz $2',
	'security-unchain' => 'Zmiana działania indywidualnie',
	'security-type-category' => 'kategoria',
	'security-type-namespace' => 'przestrzeń nazw',
);

/** Portuguese (Português)
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'security' => 'Registo de segurança',
	'security-logpage' => 'Registo de segurança',
	'security-info' => 'Há $1 nesta página',
	'security-info-toggle' => 'restrições de segurança',
	'security-manygroups' => 'grupos $1 e $2',
	'security-unchain' => 'Modificar ações individualmente',
	'security-type-category' => 'categoria',
	'security-type-namespace' => 'domínio',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'security' => 'Registro de segurança',
	'security-desc' => 'Extende a proteção de páginas do MediaWiki permitindo a restrição de visualização de conteúdo da página',
	'security-logpage' => 'Registro de segurança',
	'security-logpagetext' => 'Este é um registro de ações bloqueadas pela [http://www.mediawiki.org/wiki/Extension:SimpleSecurity extensão SimpleSecurity].',
	'badaccess-read' => 'Aviso: "$1" se refere à esta página, mas você não tem permissões suficientes para acessá-la.',
	'security-info' => 'Há $1 nesta página',
	'security-info-toggle' => 'restrições de segurança',
	'security-inforestrict' => '$1 é restrita a $2',
	'security-desc-LS' => "''(aplica-se porque está página está em '''$2 $1''')''",
	'security-desc-PR' => "''(definido através da '''aba proteger''')''",
	'security-infosysops' => "Nenhuma das restrições está em efeito porque você é membro do grupo '''sysop'''",
	'security-manygroups' => 'grupos $1 e $2',
	'security-unchain' => 'Modificar ações individualmente',
	'security-type-category' => 'categoria',
	'security-type-namespace' => 'domínio',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'security' => 'Журнал безопасности',
	'security-desc' => 'Расширяет защиту страниц MediaWiki, позволяя ограничивать просмотр содержания страницы',
	'security-logpage' => 'Журнал безопасности',
	'security-logpagetext' => 'Это журнал заблокированных действий со стороны [http://www.mediawiki.org/wiki/Extension:SimpleSecurity расширения SimpleSecurity].',
	'badaccess-read' => 'Предупреждение. «$1» ссылается сюда, но у вас нет достаточных полномочий для доступа к ней.',
	'security-info' => 'Для этой страницы существуют $1',
	'security-info-toggle' => 'ограничения, связанные с безопасностью',
	'security-inforestrict' => '$1 запрещён для $2',
	'security-desc-LS' => "''(применено, так как эта страница находится в '''$1 $2''')''",
	'security-desc-PR' => "''(установлено через '''вкладку защиты''')''",
	'security-infosysops' => "Ограничения не действуют, так как вы являетесь членом группы '''sysop'''",
	'security-manygroups' => 'групп $1 и $2',
	'security-unchain' => 'Изменить действия в индивидуальном порядке',
	'security-type-category' => 'категории',
	'security-type-namespace' => 'пространстве имён',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'security' => 'Bezpečnostný záznam',
	'security-desc' => 'Rozširuje zamykanie stránok MediaWiki o možnosť obmedziť zobrazovanie obsahu článku',
	'security-logpage' => 'Bezpečnostný záznam',
	'security-logpagetext' => 'Toto je záznam operácií, ktoré zablokovalo [http://www.mediawiki.org/wiki/Extension:SimpleSecurity rozšírenie SimpleSecurity].',
	'badaccess-read' => 'Upozornenie: odkazuje sa tu na „$1“, ale nemáte dostatočné oprácnenia na prístup k nemu.',
	'security-info' => 'Táto stránka má $1',
	'security-info-toggle' => 'bezpečnostné obmedzenia',
	'security-inforestrict' => '$1 nemá povolené $2',
	'security-desc-LS' => "''(týka sa tejto stránky, pretože je na '''$2 $1''')''",
	'security-desc-PR' => "''(nastavené zo '''záložky zamykania''')''",
	'security-infosysops' => "Žiadne obmedzenia nie sú účinné, pretože ste členom skupiny '''sysop'''",
	'security-manygroups' => 'skupiny $1 a $2',
	'security-unchain' => 'Zmeniť operácie samostatne',
	'security-type-category' => 'kategória',
	'security-type-namespace' => 'menný priestor',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'security' => 'Talaang pangkaligtasan',
	'security-desc' => 'Nagdurugtong sa pag-iingat ng pahina ng MediaWiki upang pahintulutan ang pagbibigay ng hangganan sa pagtingin ng nilalaman ng pahina',
	'security-logpage' => 'Talaang pangkaligtasan',
	'security-logpagetext' => 'Isa itong talaan ng mga kilos na hinadlangan ng [http://www.mediawiki.org/wiki/Extension:SimpleSecurity karugtong na Kaligtasang Payak].',
	'badaccess-read' => 'Babala: isinangguni rito ang "$1", subalit wala kang sapat na mga kapahintulutan upang mapuntahan ito.',
	'security-info' => 'Mayroon mga $1 sa ibabaw ng pahinang ito',
	'security-info-toggle' => 'mga hangganang pangkaligtasan',
	'security-inforestrict' => 'Nakahangga ang $1 sa $2',
	'security-desc-LS' => "''(naaangkop dahil nasa loob ng '''$2 $1''' ang pahinang ito)''",
	'security-desc-PR' => "''(itinakda mula sa '''panglaylay na pangpananggalang''')''",
	'security-infosysops' => 'Walang umiiral na mga paghahanga dahil isa kang kasapi ng pangkat na tagapagpaandar ng sistema',
	'security-manygroups' => 'mga pangkat na $1 at $2',
	'security-unchain' => 'Baguhin na paisa-isa ang mga galaw',
	'security-type-category' => 'kaurian',
	'security-type-namespace' => 'espasyo ng pangalan',
);

/** Turkish (Türkçe)
 * @author Joseph
 */
$messages['tr'] = array(
	'security' => 'Güvenlik günlüğü',
);

