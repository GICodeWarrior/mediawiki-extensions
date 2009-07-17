<?php
/**
 * Internationalisation file for the extension ErrorHandler.
 *
 * @addtogroup Extensions
 */

$messages = array();

/** English
 * @author IAlex
 */
$messages['en'] = array(
	'errorhandler-desc'                  => 'Error handler for MediaWiki',
	'errorhandler-errors'                => 'Errors:',
	'errorhandler-error-fatal'           => 'Fatal error',
	'errorhandler-error-warning'         => 'Warning',
	'errorhandler-error-parse'           => 'Parser error',
	'errorhandler-error-notice'          => 'Notice',
	'errorhandler-error-deprecated'      => 'Deprecated',
	'errorhandler-error-core-error'      => 'Core error',
	'errorhandler-error-core-warning'    => 'Core warning',
	'errorhandler-error-compile-error'   => 'Compile error',
	'errorhandler-error-compile-warning' => 'Compile warning',
	'errorhandler-error-user-error'      => 'User error',
	'errorhandler-error-user-warning'    => 'User warning',
	'errorhandler-error-user-notice'     => 'User notice',
	'errorhandler-error-user-deprecated' => 'User deprecated',
	'errorhandler-error-strict'          => 'Strict standards',
	'errorhandler-error-recoverable'     => 'Catchable fatal error',
	'errorhandler-msg-text'              => '$1 : $2 in $3 (line $4)',
	'errorhandler-msg-html'              => '<b>$1</b> : <i>$2</i> in <b>$3</b> (line <b>$4</b>)',
	'errorhandler-trace'                 => 'trace:',
	'errorhandler-trace-line'            => '$1 (line $2): $3',
	'errorhandler-trace-line-internal'   => '[internal function]: $1',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author IAlex
 * @author Purodha
 */
$messages['qqq'] = array(
	'errorhandler-desc' => 'Extension description displayed on [[Special:Version]].',
	'errorhandler-errors' => '{{Identical|Error}}',
	'errorhandler-msg-text' => '*$1 - error name
*$2 - error message
*$3 - filename
*$4 - line number',
	'errorhandler-msg-html' => '*$1 - error name
*$2 - error message
*$3 - filename
*$4 - line number',
	'errorhandler-trace-line' => '*$1: filename
*$2: line number
*$3: function name',
	'errorhandler-trace-line-internal' => '* $1: function name',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'errorhandler-desc' => 'معالج الخطأ لميدياويكي',
	'errorhandler-errors' => 'الأخطاء:',
	'errorhandler-error-fatal' => 'خطأ قاتل',
	'errorhandler-error-warning' => 'تحذير',
	'errorhandler-error-parse' => 'خطأ محلل',
	'errorhandler-error-notice' => 'ملاحظة',
	'errorhandler-error-deprecated' => 'تم الاستغناء عنه',
	'errorhandler-error-core-error' => 'خطأ قلب',
	'errorhandler-error-core-warning' => 'تحذير قلب',
	'errorhandler-error-compile-error' => 'خطأ تراكم',
	'errorhandler-error-compile-warning' => 'تحذير تراكم',
	'errorhandler-error-user-error' => 'خطأ مستخدم',
	'errorhandler-error-user-warning' => 'تحذير مستخدم',
	'errorhandler-error-user-notice' => 'ملاحظة مستخدم',
	'errorhandler-error-user-deprecated' => 'المستخدم تم الاستغناء عنه',
	'errorhandler-error-strict' => 'معايير صارمة',
	'errorhandler-error-recoverable' => 'خطأ قاتل يمكن إمساكه',
	'errorhandler-msg-text' => '$1 : $2 في $3 (سطر $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> في <b>$3</b> (سطر <b>$4</b>)',
	'errorhandler-trace' => 'الأثر:',
	'errorhandler-trace-line' => '$1 (سطر $2): $3',
	'errorhandler-trace-line-internal' => '[وظيفة داخلية]: $1',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'errorhandler-desc' => 'معالج الخطأ لميدياويكي',
	'errorhandler-errors' => 'الأخطاء:',
	'errorhandler-error-fatal' => 'خطأ قاتل',
	'errorhandler-error-warning' => 'تحذير',
	'errorhandler-error-parse' => 'خطأ محلل',
	'errorhandler-error-notice' => 'ملاحظة',
	'errorhandler-error-deprecated' => 'تم الاستغناء عنه',
	'errorhandler-error-core-error' => 'خطأ قلب',
	'errorhandler-error-core-warning' => 'تحذير قلب',
	'errorhandler-error-compile-error' => 'خطأ تراكم',
	'errorhandler-error-compile-warning' => 'تحذير تراكم',
	'errorhandler-error-user-error' => 'خطأ مستخدم',
	'errorhandler-error-user-warning' => 'تحذير مستخدم',
	'errorhandler-error-user-notice' => 'ملاحظة مستخدم',
	'errorhandler-error-user-deprecated' => 'المستخدم تم الاستغناء عنه',
	'errorhandler-error-strict' => 'معايير صارمة',
	'errorhandler-error-recoverable' => 'خطأ قاتل يمكن إمساكه',
	'errorhandler-msg-text' => '$1 : $2 فى $3 (سطر $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> فى <b>$3</b> (سطر <b>$4</b>)',
	'errorhandler-trace' => 'الأثر:',
	'errorhandler-trace-line' => '$1 (سطر $2): $3',
	'errorhandler-trace-line-internal' => '[وظيفة داخلية]: $1',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'errorhandler-desc' => 'Апрацоўшчык памылак для MediaWiki',
	'errorhandler-errors' => 'Памылкі:',
	'errorhandler-error-fatal' => 'Крытычная памылка',
	'errorhandler-error-warning' => 'Папярэджаньне',
	'errorhandler-error-parse' => 'Памылка парсэра',
	'errorhandler-error-notice' => 'Заўвага',
	'errorhandler-error-deprecated' => 'Паменшаная',
	'errorhandler-error-core-error' => 'Памылка ядра',
	'errorhandler-error-core-warning' => 'Папярэджаньне ядра',
	'errorhandler-error-compile-error' => 'Памылка кампіляцыі',
	'errorhandler-error-compile-warning' => 'Папярэджаньне кампілятара',
	'errorhandler-error-user-error' => 'Памылка ўдзельніка',
	'errorhandler-error-user-warning' => 'Папярэджаньне ўдзельніка',
	'errorhandler-error-user-notice' => 'Заўвага ўдзельніка',
	'errorhandler-error-user-deprecated' => 'Непрыняты ўдзельнік',
	'errorhandler-error-strict' => 'Жорсткія стандарты',
	'errorhandler-error-recoverable' => 'Фатальная памылка, якую можна адсачыць',
	'errorhandler-msg-text' => '$1 : $2 у $3 (радок $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> у <b>$3</b> (радок <b>$4</b>)',
	'errorhandler-trace' => 'сачэньне:',
	'errorhandler-trace-line' => '$1 (радок $2): $3',
	'errorhandler-trace-line-internal' => '[вонкавая функцыя]: $1',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'errorhandler-errors' => 'Грешки:',
	'errorhandler-error-fatal' => 'Фатална грешка',
	'errorhandler-error-warning' => 'Предупреждение',
	'errorhandler-error-parse' => 'Грешка в парсера',
	'errorhandler-error-notice' => 'Забележка',
	'errorhandler-error-user-error' => 'Потребителска грешка',
	'errorhandler-error-user-warning' => 'Потребителско предупреждение',
	'errorhandler-error-user-notice' => 'Потребителска забележка',
	'errorhandler-msg-text' => '$1 : $2 в $3 (ред $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> в <b>$3</b> (ред <b>$4</b>)',
	'errorhandler-trace-line' => '$1 (ред $2): $3',
	'errorhandler-trace-line-internal' => '[вътрешна функция]: $1',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'errorhandler-desc' => 'Upravljač grešaka za MediaWiki',
	'errorhandler-errors' => 'Greške:',
	'errorhandler-error-fatal' => 'Fatalna greška',
	'errorhandler-error-warning' => 'Upozorenje',
	'errorhandler-error-parse' => 'Greška parsera',
	'errorhandler-error-notice' => 'Obavještenje',
	'errorhandler-error-deprecated' => 'Prevaziđeno',
	'errorhandler-error-core-error' => 'Greška jezgre',
	'errorhandler-error-core-warning' => 'Upozorenje jezgre',
	'errorhandler-error-compile-error' => 'Greška kompajlera',
	'errorhandler-error-compile-warning' => 'Upozorenje kompajlera',
	'errorhandler-error-user-error' => 'Korisnička greška',
	'errorhandler-error-user-warning' => 'Korisničko upozorenje',
	'errorhandler-error-user-notice' => 'Korisničko upozorenje',
	'errorhandler-error-user-deprecated' => 'Korisnik odbijen',
	'errorhandler-error-strict' => 'Strogi standardi',
	'errorhandler-error-recoverable' => 'Čitljiva fatalna greška',
	'errorhandler-msg-text' => '$1 : $2 u datoteci $3 (linija $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> u <b>$3</b> (linija <b>$4</b>)',
	'errorhandler-trace' => 'trag:',
	'errorhandler-trace-line' => '$1 (linija $2): $3',
	'errorhandler-trace-line-internal' => '[unutrašnja funkcija]: $1',
);

/** Catalan (Català)
 * @author Aleator
 */
$messages['ca'] = array(
	'errorhandler-error-compile-error' => 'Error de compilació',
);

/** German (Deutsch)
 * @author ChrisiPK
 * @author Leithian
 * @author Revolus
 */
$messages['de'] = array(
	'errorhandler-desc' => 'Fehlerbehandlung für MediaWiki',
	'errorhandler-errors' => 'Fehler:',
	'errorhandler-error-fatal' => 'Fataler Fehler',
	'errorhandler-error-warning' => 'Warnung',
	'errorhandler-error-parse' => 'Verarbeitungsfehler',
	'errorhandler-error-notice' => 'Anmerkung',
	'errorhandler-error-deprecated' => 'Missbilligt',
	'errorhandler-error-core-error' => 'Kernfehler',
	'errorhandler-error-core-warning' => 'Kernwarnung',
	'errorhandler-error-compile-error' => 'Compilerfehler',
	'errorhandler-error-compile-warning' => 'Compilerwarnung',
	'errorhandler-error-user-error' => 'Benutzerfehler',
	'errorhandler-error-user-warning' => 'Benutzerwarnung',
	'errorhandler-error-user-notice' => 'Benutzerhinweis',
	'errorhandler-error-user-deprecated' => 'Benutzer abgelehnt',
	'errorhandler-error-strict' => 'Strenge Standards',
	'errorhandler-error-recoverable' => 'Auslesbarer fataler Fehler',
	'errorhandler-msg-text' => '$1: $2 in $3 (Zeile $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> in <b>$3</b> (Zeile <b>$4</b>)',
	'errorhandler-trace' => 'Ablaufverfolgung:',
	'errorhandler-trace-line' => '$1 (Zeile $2): $3',
	'errorhandler-trace-line-internal' => '[interne Funktion]: $1',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'errorhandler-desc' => 'Wobźěłanje zmólkow za MediaWiki',
	'errorhandler-errors' => 'Zmólki:',
	'errorhandler-error-fatal' => 'Fatalna zmólka',
	'errorhandler-error-warning' => 'Warnowanje',
	'errorhandler-error-parse' => 'Parserowa zmólka',
	'errorhandler-error-notice' => 'Pśipisk',
	'errorhandler-error-deprecated' => 'Zachyśony',
	'errorhandler-error-core-error' => 'Jědrowa zmólka',
	'errorhandler-error-core-warning' => 'Jědrowe warnowanje',
	'errorhandler-error-compile-error' => 'Kompilěrowańska zmólka',
	'errorhandler-error-compile-warning' => 'Kompilěrowańske warnowanje',
	'errorhandler-error-user-error' => 'Wužywarska zmólka',
	'errorhandler-error-user-warning' => 'Wužywarske warnowanje',
	'errorhandler-error-user-notice' => 'Wužywarske pśipomnjeśe',
	'errorhandler-error-user-deprecated' => 'Wužywaŕ wótpokazany',
	'errorhandler-error-strict' => 'Kšute standardy',
	'errorhandler-error-recoverable' => 'Zapópadujobna fatalna zmólka',
	'errorhandler-msg-text' => '$1 : $2 w $3 (smužka $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> w <b>$3</b> (smužka <b>$4</b>)',
	'errorhandler-trace' => 'Slědkslědowanje:',
	'errorhandler-trace-line' => '$1 (smužka $2): $3',
	'errorhandler-trace-line-internal' => '[interna funkcija]: $1',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'errorhandler-errors' => 'Σφάλματα:',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> in <b>$3</b> (γραμμή <b>$4</b>)',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'errorhandler-desc' => 'Erara traktilo por MediaWiki',
	'errorhandler-errors' => 'Eraroj:',
	'errorhandler-error-fatal' => 'Neriparebla eraro',
	'errorhandler-error-warning' => 'Averto',
	'errorhandler-error-parse' => 'Eraro de sintaksa analizilo',
	'errorhandler-error-notice' => 'Noto',
	'errorhandler-error-deprecated' => 'Evitinda',
	'errorhandler-error-core-error' => 'Fundamenta eraro',
	'errorhandler-error-compile-error' => 'Tradukila eraro',
	'errorhandler-error-compile-warning' => 'Tradukila averto',
	'errorhandler-error-user-error' => 'Eraro de uzanto',
	'errorhandler-error-user-warning' => 'Averto de uzanto',
	'errorhandler-error-user-notice' => 'Uzula notico',
	'errorhandler-error-strict' => 'Striktaj normreguloj',
	'errorhandler-msg-text' => '$1 : $2 en $3 (linio $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> en <b>$3</b> (linio <b>$4</b>)',
	'errorhandler-trace' => 'spuro:',
	'errorhandler-trace-line' => '$1 (linio $2): $3',
	'errorhandler-trace-line-internal' => '[interna funkcio]: $1',
);

/** Spanish (Español)
 * @author Antur
 * @author Sanbec
 */
$messages['es'] = array(
	'errorhandler-desc' => 'Error operativo de MediaWiki',
	'errorhandler-errors' => 'Errores:',
	'errorhandler-error-fatal' => 'Error grave',
	'errorhandler-error-warning' => 'Cuidado',
	'errorhandler-error-parse' => 'Error sintáctico',
	'errorhandler-error-notice' => 'Aviso',
	'errorhandler-error-deprecated' => 'En desuso',
	'errorhandler-error-core-error' => 'Error de núcleo',
	'errorhandler-error-core-warning' => 'Alerta de núcleo',
	'errorhandler-error-compile-error' => 'Error de compilación',
	'errorhandler-error-compile-warning' => 'Alerta de compilación',
	'errorhandler-error-user-error' => 'Error de usuario',
	'errorhandler-error-user-warning' => 'Alerta de usuario',
	'errorhandler-error-user-notice' => 'Aviso de usuario',
	'errorhandler-error-user-deprecated' => 'Usuario en desuso',
	'errorhandler-error-strict' => 'Estándar estricto',
	'errorhandler-error-recoverable' => 'Error grave recuperable',
	'errorhandler-msg-text' => '$1 : $2 en $3 (línea $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> en <b>$3</b> (línea <b>$4</b>)',
	'errorhandler-trace' => 'rastrear:',
	'errorhandler-trace-line' => '$1 (línea $2): $3',
	'errorhandler-trace-line-internal' => '[función interna]: $1',
);

/** Finnish (Suomi)
 * @author Mobe
 * @author Nike
 * @author Vililikku
 */
$messages['fi'] = array(
	'errorhandler-desc' => 'Virhekäsittelijä MediaWikille',
	'errorhandler-errors' => 'Virheet:',
	'errorhandler-error-fatal' => 'Vakava virhe',
	'errorhandler-error-warning' => 'Varoitus',
	'errorhandler-error-parse' => 'Jäsennysvirhe',
	'errorhandler-error-notice' => 'Huomautus',
	'errorhandler-error-deprecated' => 'Käytöstä poistuva',
	'errorhandler-error-core-error' => 'Ydinosan virhe',
	'errorhandler-error-core-warning' => 'Ydinosan varoitus',
	'errorhandler-error-compile-error' => 'Käännösvirhe',
	'errorhandler-error-compile-warning' => 'Käännösvaroitus',
	'errorhandler-error-user-error' => 'Koodissa määritelty virhe',
	'errorhandler-error-user-warning' => 'Koodissa määritelty varoitus',
	'errorhandler-error-user-notice' => 'Koodissa määritelty huomautus',
	'errorhandler-error-user-deprecated' => 'Koodissa määritelty käytöstä poistuva -varoitus',
	'errorhandler-error-strict' => 'Tiukat standardit',
	'errorhandler-msg-text' => '$1 : $2 kohteessa $3 (rivi $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> kohteessa <b>$3</b> (rivi <b>$4</b>)',
	'errorhandler-trace' => 'pinolistaus:',
	'errorhandler-trace-line' => '$1 (rivi $2): $3',
	'errorhandler-trace-line-internal' => '[sisäinen funktio]: $1',
);

/** French (Français)
 * @author IAlex
 * @author McDutchie
 * @author PieRRoMaN
 */
$messages['fr'] = array(
	'errorhandler-desc' => "Gestionnaire d'erreurs pour MediaWiki",
	'errorhandler-errors' => 'Erreurs :',
	'errorhandler-error-fatal' => 'Erreur fatale',
	'errorhandler-error-warning' => 'Avertissement',
	'errorhandler-error-parse' => 'Erreur de parse',
	'errorhandler-error-notice' => 'Notice',
	'errorhandler-error-deprecated' => 'Obsolète',
	'errorhandler-error-core-error' => 'Erreur de noyau',
	'errorhandler-error-core-warning' => 'Avertissement du noyau',
	'errorhandler-error-compile-error' => 'Erreur de compilation',
	'errorhandler-error-compile-warning' => 'Avertissement de compilation',
	'errorhandler-error-user-error' => 'Erreur (utilisateur)',
	'errorhandler-error-user-warning' => 'Avertissement (utilisateur)',
	'errorhandler-error-user-notice' => 'Notice (utilisateur)',
	'errorhandler-error-user-deprecated' => 'Obsolète (utilisateur)',
	'errorhandler-error-strict' => 'Standards stricts',
	'errorhandler-error-recoverable' => 'Erreur fatale qui peut être attrapée',
	'errorhandler-msg-text' => '$1 : $2 dans $3 (ligne $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> dans <b>$3</b> (ligne <b>$4</b>)',
	'errorhandler-trace' => 'trace :',
	'errorhandler-trace-line' => '$1 (ligne $2) : $3',
	'errorhandler-trace-line-internal' => '[fonction interne] : $1',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'errorhandler-desc' => 'Erro do manipulador de MediaWiki',
	'errorhandler-errors' => 'Erros:',
	'errorhandler-error-fatal' => 'Erro fatal',
	'errorhandler-error-warning' => 'Aviso',
	'errorhandler-error-parse' => 'Erro de análise',
	'errorhandler-error-notice' => 'Nota',
	'errorhandler-error-deprecated' => 'Desaconsellado',
	'errorhandler-error-core-error' => 'Erro central',
	'errorhandler-error-core-warning' => 'Aviso central',
	'errorhandler-error-compile-error' => 'Erro de recompilación',
	'errorhandler-error-compile-warning' => 'Aviso de recompilación',
	'errorhandler-error-user-error' => 'Erro de usuario',
	'errorhandler-error-user-warning' => 'Aviso de usuario',
	'errorhandler-error-user-notice' => 'Nota de usuario',
	'errorhandler-error-user-deprecated' => 'Usuario desaconsellado',
	'errorhandler-error-strict' => 'Estándares estritos',
	'errorhandler-error-recoverable' => 'Erro fatal recuperable',
	'errorhandler-msg-text' => '$1 : $2 en $3 (liña $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> en <b>$3</b> (liña <b>$4</b>)',
	'errorhandler-trace' => 'trazo:',
	'errorhandler-trace-line' => '$1 (liña $2): $3',
	'errorhandler-trace-line-internal' => '[función interna]: $1',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'errorhandler-errors' => 'Σφάλματα:',
	'errorhandler-error-notice' => 'Σημείωμα',
	'errorhandler-trace' => 'ἴχνος:',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'errorhandler-desc' => 'Fählerbehandlig fir MediaWiki',
	'errorhandler-errors' => 'Fähler:',
	'errorhandler-error-fatal' => 'Fatale Fähler',
	'errorhandler-error-warning' => 'Warnig',
	'errorhandler-error-parse' => 'Verarbeitigsfähler',
	'errorhandler-error-notice' => 'Aamerkig',
	'errorhandler-error-deprecated' => 'Abglähnt',
	'errorhandler-error-core-error' => 'Chärnfähler',
	'errorhandler-error-core-warning' => 'Chärnwarnig',
	'errorhandler-error-compile-error' => 'Compilerfähler',
	'errorhandler-error-compile-warning' => 'Compilerwarnig',
	'errorhandler-error-user-error' => 'Benutzerfähler',
	'errorhandler-error-user-warning' => 'Benutzerwarnig',
	'errorhandler-error-user-notice' => 'Benutzerhiiwyys',
	'errorhandler-error-user-deprecated' => 'Benutzer abglähnt',
	'errorhandler-error-strict' => 'Strängi Standard',
	'errorhandler-error-recoverable' => 'Uusläsbare fatale Fähler',
	'errorhandler-msg-text' => '$1: $2 in $3 (Zyyle $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> in <b>$3</b> (Zyyle <b>$4</b>)',
	'errorhandler-trace' => 'Ablauf verfolge:',
	'errorhandler-trace-line' => '$1 (Zyyle $2): $3',
	'errorhandler-trace-line-internal' => '[intärni Funktion]: $1',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'errorhandler-desc' => 'כלי לטיפול בשגיאות עבור מדיה־ויקי',
	'errorhandler-errors' => 'שגיאות:',
	'errorhandler-error-fatal' => 'שגיאה קריטית',
	'errorhandler-error-warning' => 'אזהרה',
	'errorhandler-error-parse' => 'שגיאת מפענח',
	'errorhandler-error-notice' => 'התראה',
	'errorhandler-error-core-error' => 'שגיאת ליבה',
	'errorhandler-error-core-warning' => 'אזהרת ליבה',
	'errorhandler-error-compile-error' => 'שגיאת הידור',
	'errorhandler-error-compile-warning' => 'אזהרת הידור',
	'errorhandler-error-user-error' => 'שגיאת משתמש',
	'errorhandler-error-user-warning' => 'אזהרת משתמש',
	'errorhandler-error-user-notice' => 'התראת משתמש',
	'errorhandler-error-strict' => 'תקנים מחמירים',
	'errorhandler-msg-text' => '$1 : $2 ב־$3 (שורה $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> ב־<b>$3</b> (שורה <b>$4</b>)',
	'errorhandler-trace' => 'עקבות:',
	'errorhandler-trace-line' => '$1 (שורה $2): $3',
	'errorhandler-trace-line-internal' => '[פונקציה פנימית]: $1',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'errorhandler-desc' => 'Wobchadźenje ze zmylkami za MediaWiki',
	'errorhandler-errors' => 'Zmylki:',
	'errorhandler-error-fatal' => 'Fatalny zmylk',
	'errorhandler-error-warning' => 'Warnowanje',
	'errorhandler-error-parse' => 'Analyzowy zmylk',
	'errorhandler-error-notice' => 'Zdźělenka',
	'errorhandler-error-deprecated' => 'Njeschwaleny',
	'errorhandler-error-core-error' => 'Jadrowy zmylk',
	'errorhandler-error-core-warning' => 'Warnowanje jadra',
	'errorhandler-error-compile-error' => 'Kompilaciski zmylk',
	'errorhandler-error-compile-warning' => 'Kompilaciske warnowanje',
	'errorhandler-error-user-error' => 'Wužiwarski zmylk',
	'errorhandler-error-user-warning' => 'Wužiwarske warnowanje',
	'errorhandler-error-user-notice' => 'Wužiwarska zdźělenka',
	'errorhandler-error-user-deprecated' => 'Wužiwar njeschwaleny',
	'errorhandler-error-strict' => 'Striktne standardy',
	'errorhandler-error-recoverable' => 'Popadujomny fatalny zmylk',
	'errorhandler-msg-text' => '$1 : $2 w $3 (rjadka $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> w <b>$3</b> (rjadka <b>$4</b>)',
	'errorhandler-trace' => 'slědować:',
	'errorhandler-trace-line' => '$1 (rjadka $2): $3',
	'errorhandler-trace-line-internal' => '[interna funkcija]: $1',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'errorhandler-desc' => 'Gestor de errores pro MediaWiki',
	'errorhandler-errors' => 'Errores:',
	'errorhandler-error-fatal' => 'Error fatal',
	'errorhandler-error-warning' => 'Advertimento',
	'errorhandler-error-parse' => 'Error del analysator syntactic',
	'errorhandler-error-notice' => 'Notitia',
	'errorhandler-error-deprecated' => 'Obsolete',
	'errorhandler-error-core-error' => 'Error de nucleo',
	'errorhandler-error-core-warning' => 'Advertimento de nucleo',
	'errorhandler-error-compile-error' => 'Error de compilation',
	'errorhandler-error-compile-warning' => 'Advertimento de compilation',
	'errorhandler-error-user-error' => 'Error de usator',
	'errorhandler-error-user-warning' => 'Advertimento de usator',
	'errorhandler-error-user-notice' => 'Notitia de usator',
	'errorhandler-error-user-deprecated' => 'Declarate obsolete per usator',
	'errorhandler-error-strict' => 'Standardes stricte',
	'errorhandler-error-recoverable' => 'Error fatal attrappabile',
	'errorhandler-msg-text' => '$1 : $2 in $3 (linea $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> in <b>$3</b> (linea <b>$4</b>)',
	'errorhandler-trace' => 'tracia:',
	'errorhandler-trace-line' => '$1 (linea $2): $3',
	'errorhandler-trace-line-internal' => '[function interne]: $1',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 */
$messages['id'] = array(
	'errorhandler-errors' => 'Galat:',
);

/** Italian (Italiano)
 * @author Pietrodn
 */
$messages['it'] = array(
	'errorhandler-desc' => 'Gestore di errori per MediaWiki',
	'errorhandler-errors' => 'Errori:',
	'errorhandler-error-fatal' => 'Errore fatale',
	'errorhandler-error-warning' => 'Avvertenza',
	'errorhandler-error-parse' => 'Errore del parser',
	'errorhandler-error-notice' => 'Avviso',
	'errorhandler-error-deprecated' => 'Deprecato',
	'errorhandler-error-core-error' => 'Errore del nucleo',
	'errorhandler-error-core-warning' => 'Avvertimento del nucleo',
	'errorhandler-error-compile-error' => 'Errore di compilazione',
	'errorhandler-error-compile-warning' => 'Avvertimento di compilazione',
	'errorhandler-error-user-error' => 'Errore utente',
	'errorhandler-error-user-warning' => 'Avvertimento utente',
	'errorhandler-error-user-notice' => 'Avviso utente',
	'errorhandler-error-user-deprecated' => "Deprecato dall'utente",
	'errorhandler-error-strict' => 'Standard severi',
	'errorhandler-error-recoverable' => 'Errore fatale raccoglibile',
	'errorhandler-msg-text' => '$1: $2 in $3 (linea $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> in <b>$3</b> (linea <b>$4</b>)',
	'errorhandler-trace' => 'traccia:',
	'errorhandler-trace-line' => '$1 (linea $2): $3',
	'errorhandler-trace-line-internal' => '[funzione interna]: $1',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Hosiryuhosi
 */
$messages['ja'] = array(
	'errorhandler-desc' => 'MediaWiki 用のエラーハンドラ',
	'errorhandler-errors' => 'エラー:',
	'errorhandler-error-fatal' => '致命的エラー',
	'errorhandler-error-warning' => '警告',
	'errorhandler-error-parse' => 'パーサーエラー',
	'errorhandler-error-notice' => '注意',
	'errorhandler-error-deprecated' => '非推奨',
	'errorhandler-error-core-error' => 'コアエラー',
	'errorhandler-error-core-warning' => 'コア警告',
	'errorhandler-error-compile-error' => 'コンパイルエラー',
	'errorhandler-error-compile-warning' => 'コンパイル警告',
	'errorhandler-error-user-error' => 'ユーザーエラー',
	'errorhandler-error-user-warning' => 'ユーザー警告',
	'errorhandler-error-user-notice' => 'ユーザー注意',
	'errorhandler-error-user-deprecated' => 'ユーザー非推奨',
	'errorhandler-error-strict' => '厳格基準',
	'errorhandler-error-recoverable' => '捕捉可能な致命的エラー',
	'errorhandler-msg-text' => '$1 : $2 (ファイル $3、行 $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> (ファイル <b>$3</b>、行 <b>$4</b>)',
	'errorhandler-trace' => 'トレース:',
	'errorhandler-trace-line' => '$1 (行 $2): $3',
	'errorhandler-trace-line-internal' => '[内部関数]: $1',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 * @author Thearith
 */
$messages['km'] = array(
	'errorhandler-errors' => 'កំហុស៖',
	'errorhandler-error-warning' => 'បម្រាម',
	'errorhandler-error-notice' => 'សម្គាល់',
	'errorhandler-trace-line' => '$1 (បន្ទាត់ទី$2): $3',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'errorhandler-desc' => 'Met Fähler em MediaWiki ömjonn.',
	'errorhandler-errors' => 'De Fähler:',
	'errorhandler-error-fatal' => 'Ene fatale Fähler',
	'errorhandler-error-warning' => 'En Warnung',
	'errorhandler-error-parse' => 'Ene Fähler em Projrammtäx',
	'errorhandler-error-notice' => 'Bemerkung',
	'errorhandler-error-deprecated' => 'Meßjevällesch',
	'errorhandler-error-core-error' => 'Fähler em Jrundprojramm',
	'errorhandler-error-core-warning' => 'Warnung em Jrundprojramm',
	'errorhandler-error-compile-error' => 'Fähler em Projamm-Övvesäzer (<i lang="en">Compiler</i>)',
	'errorhandler-error-compile-warning' => 'Warnung em Projamm-Övvesäzer (<i lang="en">Compiler</i>)',
	'errorhandler-error-user-error' => 'Fum Projammaacher jemäldte Fähler',
	'errorhandler-error-user-warning' => 'Warnung fum Projammaacher',
	'errorhandler-error-user-notice' => 'Herwieß fum Projammaacher',
	'errorhandler-error-user-deprecated' => 'Fum Projammaacher nimmieh jewollt',
	'errorhandler-error-strict' => 'Verstüß jäje de janz akoraate Shtandat',
	'errorhandler-error-recoverable' => 'Ene schlemme Fähler, dä opjevange wäde kann',
	'errorhandler-msg-text' => '$1 : $2 en $3, op de Reih $4.',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> en <b>$3</b>, op de Reih <b>$4</b>.',
	'errorhandler-trace' => 'Zeröckverfolsch:',
	'errorhandler-trace-line' => '$1 op de Reih $2: $3',
	'errorhandler-trace-line-internal' => '[enner Funxjohn]: $1',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'errorhandler-desc' => 'Feelerbehandlung fir MediaWiki',
	'errorhandler-errors' => 'Feeler:',
	'errorhandler-error-fatal' => 'Fatale Feeler',
	'errorhandler-error-warning' => 'Warnung',
	'errorhandler-error-parse' => 'Parser-Feeler',
	'errorhandler-error-notice' => 'Notiz',
	'errorhandler-error-deprecated' => 'Net méi aktuell',
	'errorhandler-error-core-error' => 'Déifgréifende Feeler',
	'errorhandler-error-core-warning' => 'Déifgréifend Warnung',
	'errorhandler-error-compile-error' => 'Feeler bäim compiléieren',
	'errorhandler-error-compile-warning' => 'Warnung bäim compiléieren',
	'errorhandler-error-user-error' => 'Feeler (vum Benotzer)',
	'errorhandler-error-user-warning' => 'Benotzerwarnung',
	'errorhandler-error-user-notice' => 'Benotzernotiz',
	'errorhandler-error-user-deprecated' => 'Benotzer net ënnerstetzt',
	'errorhandler-error-strict' => 'Strikte Standard',
	'errorhandler-error-recoverable' => 'Erfaassbare fatale Feeler',
	'errorhandler-msg-text' => '$1 : $2 a(n) $3 (Linn $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> a(n) <b>$3</b> (Linn <b>$4</b>)',
	'errorhandler-trace' => 'Spuer:',
	'errorhandler-trace-line' => '$1 (Linn $2): $3',
	'errorhandler-trace-line-internal' => '[intern Fonctioun]: $1',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> īpan <b>$3</b> (pāntli <b>$4</b>)',
	'errorhandler-trace-line' => '$1 (pāntli $2): $3',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'errorhandler-desc' => 'Foutafhandeling voor MediaWiki',
	'errorhandler-errors' => 'Fouten:',
	'errorhandler-error-fatal' => 'Fatale fout',
	'errorhandler-error-warning' => 'Waarschuwing',
	'errorhandler-error-parse' => 'Parserfout',
	'errorhandler-error-notice' => 'Mededeling',
	'errorhandler-error-deprecated' => "Gemarkeerd als 'deprecated'",
	'errorhandler-error-core-error' => 'Kernfout',
	'errorhandler-error-core-warning' => 'Kernwaarschuwing',
	'errorhandler-error-compile-error' => 'Compileerfout',
	'errorhandler-error-compile-warning' => 'Compileerwaarschuwing',
	'errorhandler-error-user-error' => 'Gebruikersfout',
	'errorhandler-error-user-warning' => 'Gebruikerswaarschuwing',
	'errorhandler-error-user-notice' => 'Gebruikersmededeling',
	'errorhandler-error-user-deprecated' => "Gemarkeerd als 'user deprecated'",
	'errorhandler-error-strict' => 'Strikte standaarden',
	'errorhandler-error-recoverable' => 'Op te vangen fatale fout',
	'errorhandler-msg-text' => '$1 : $2 in $3 (regel $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> in <b>$3</b> (regel <b>$4</b>)',
	'errorhandler-trace' => 'trace:',
	'errorhandler-trace-line' => '$1 (regel $2): $3',
	'errorhandler-trace-line-internal' => '[interne functie]: $1',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'errorhandler-desc' => 'Feilhandtering for MediaWiki',
	'errorhandler-errors' => 'Feil:',
	'errorhandler-error-fatal' => 'Alvorleg feil',
	'errorhandler-error-warning' => 'Åtvaring',
	'errorhandler-error-parse' => 'Parserfeil',
	'errorhandler-error-notice' => 'Melding',
	'errorhandler-error-deprecated' => 'Nedgradert',
	'errorhandler-error-core-error' => 'Kjernefeil',
	'errorhandler-error-core-warning' => 'Kjerneåtvaring',
	'errorhandler-error-compile-error' => 'Kompileringsfeil',
	'errorhandler-error-compile-warning' => 'Kompileringsåtvaring',
	'errorhandler-error-user-error' => 'Brukarfeil',
	'errorhandler-error-user-warning' => 'Brukaråtvaring',
	'errorhandler-error-user-notice' => 'Brukarmelding',
	'errorhandler-error-user-deprecated' => 'Brukardegradert',
	'errorhandler-error-strict' => 'Strenge standardar',
	'errorhandler-error-recoverable' => 'Handterbar alvorleg feil',
	'errorhandler-msg-text' => '$1: $2 i $3 (rad $4)',
	'errorhandler-msg-html' => '<b>$1</b>: <i>$2</i> i <b>$3</b> (rad <b>$4</b>)',
	'errorhandler-trace' => 'spor:',
	'errorhandler-trace-line' => '$1 (rad $2): $3',
	'errorhandler-trace-line-internal' => '[intern funksjon]: $1',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'errorhandler-desc' => 'Feilhåndtering for MediaWiki',
	'errorhandler-errors' => 'Feil:',
	'errorhandler-error-fatal' => 'Alvorlig feil',
	'errorhandler-error-warning' => 'Advarsel',
	'errorhandler-error-parse' => 'Parserfeil',
	'errorhandler-error-notice' => 'Melding',
	'errorhandler-error-deprecated' => 'Nedgradert',
	'errorhandler-error-core-error' => 'Feil i kjernen',
	'errorhandler-error-core-warning' => 'Kjerne-advarsel',
	'errorhandler-error-compile-error' => 'Kompileringsfeil',
	'errorhandler-error-compile-warning' => 'Kompileringsadvarsel',
	'errorhandler-error-user-error' => 'Brukerfeil',
	'errorhandler-error-user-warning' => 'Brukeradvarsel',
	'errorhandler-error-user-notice' => 'Brukermelding',
	'errorhandler-error-user-deprecated' => 'Brukerdegradert',
	'errorhandler-error-strict' => 'Strenge standarder',
	'errorhandler-error-recoverable' => 'Håndterbar alvorlig feil',
	'errorhandler-msg-text' => '$1: $2 i $3 (rad $4)',
	'errorhandler-msg-html' => '<b>$1</b>: <i>$2</i> i <b>$3</b> (rad <b>$4</b>)',
	'errorhandler-trace' => 'spor:',
	'errorhandler-trace-line' => '$1 (rad $2): $3',
	'errorhandler-trace-line-internal' => '[intern funksjon]: $1',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'errorhandler-desc' => "Gestionari d'errors per MediaWiki",
	'errorhandler-errors' => 'Errors :',
	'errorhandler-error-fatal' => 'Error fatala',
	'errorhandler-error-warning' => 'Avertiment',
	'errorhandler-error-parse' => 'Error de parser',
	'errorhandler-error-notice' => 'Notícia',
	'errorhandler-error-deprecated' => 'Obsolet',
	'errorhandler-error-core-error' => 'Error del còr',
	'errorhandler-error-core-warning' => 'Avertiment del còr',
	'errorhandler-error-compile-error' => 'Error de compilacion',
	'errorhandler-error-compile-warning' => 'Avertiment de compilacion',
	'errorhandler-error-user-error' => 'Error (utilizaire)',
	'errorhandler-error-user-warning' => 'Avertiment (utilizaire)',
	'errorhandler-error-user-notice' => 'Notícia (utilizaire)',
	'errorhandler-error-user-deprecated' => 'Obsolet (utilizaire)',
	'errorhandler-error-strict' => 'Estandards estricts',
	'errorhandler-error-recoverable' => 'Error fatala agantabla',
	'errorhandler-msg-text' => '$1 : $2 dins $3 (linha $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> dins <b>$3</b> (linha <b>$4</b>)',
	'errorhandler-trace' => 'traça :',
	'errorhandler-trace-line' => '$1 (linha $2): $3',
	'errorhandler-trace-line-internal' => '[foncion intèrna] : $1',
);

/** Polish (Polski)
 * @author Maikking
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'errorhandler-desc' => 'Wyłapuje błędy w MediaWiki',
	'errorhandler-errors' => 'Błędy:',
	'errorhandler-error-fatal' => 'Błąd krytyczny',
	'errorhandler-error-warning' => 'Ostrzeżenie',
	'errorhandler-error-parse' => 'Błąd parsera',
	'errorhandler-error-notice' => 'Wiadomość',
	'errorhandler-error-deprecated' => 'Niezaakceptowane',
	'errorhandler-error-core-error' => 'Błąd rdzenia',
	'errorhandler-error-core-warning' => 'Ostrzeżenie dotyczące rdzenia',
	'errorhandler-error-compile-error' => 'Błąd kompilacji',
	'errorhandler-error-compile-warning' => 'Ostrzeżenie w trakcie kompilacji',
	'errorhandler-error-user-error' => 'Błąd użytkownika',
	'errorhandler-error-user-warning' => 'Ostrzeżenie użytkownika',
	'errorhandler-error-user-notice' => 'Wiadomość użytkownika',
	'errorhandler-error-user-deprecated' => 'Niezaakceptowany użytkownik',
	'errorhandler-error-strict' => 'Ścisłe normy',
	'errorhandler-error-recoverable' => 'Wychwytywalny błąd krytyczny',
	'errorhandler-msg-text' => '$1 : $2 w $3 (linia $4)',
	'errorhandler-msg-html' => '<b>$1</b> – <i>$2</i> w <b>$3</b> (linia <b>$4</b>)',
	'errorhandler-trace' => 'śledzenie:',
	'errorhandler-trace-line' => '$1 (linia $2): $3',
	'errorhandler-trace-line-internal' => '[funkcja wewnętrzna] – $1',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'errorhandler-error-warning' => 'ګواښنه',
	'errorhandler-error-user-warning' => 'د کارونکي ګواښنه',
);

/** Portuguese (Português)
 * @author Malafaya
 */
$messages['pt'] = array(
	'errorhandler-desc' => 'Tratador de erros do MediaWiki',
	'errorhandler-errors' => 'Erros:',
	'errorhandler-error-fatal' => 'Erro fatal',
	'errorhandler-error-warning' => 'Aviso',
	'errorhandler-error-parse' => 'Erro do analisador parser',
	'errorhandler-error-notice' => 'Nota',
	'errorhandler-error-deprecated' => 'Obsoleto',
	'errorhandler-error-core-error' => 'Erro do núcleo',
	'errorhandler-error-core-warning' => 'Aviso do núcleo',
	'errorhandler-error-compile-error' => 'Erro de compilação',
	'errorhandler-error-compile-warning' => 'Aviso de compilação',
	'errorhandler-error-user-error' => 'Erro de utilizador',
	'errorhandler-error-user-warning' => 'Aviso de utilizador',
	'errorhandler-error-user-notice' => 'Nota de utilizador',
	'errorhandler-error-user-deprecated' => 'Obsoleto por utilizador',
	'errorhandler-error-strict' => 'Padrões estritos',
	'errorhandler-error-recoverable' => 'Erro fatal tratável',
	'errorhandler-msg-text' => '$1 : $2 em $3 (linha $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> em <b>$3</b> (linha <b>$4</b>)',
	'errorhandler-trace' => 'rastreio:',
	'errorhandler-trace-line' => '$1 (linha $2): $3',
	'errorhandler-trace-line-internal' => '[função interna]: $1',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'errorhandler-desc' => 'Tratador de erros do MediaWiki',
	'errorhandler-errors' => 'Erros:',
	'errorhandler-error-fatal' => 'Erro fatal',
	'errorhandler-error-warning' => 'Aviso',
	'errorhandler-error-parse' => 'Erro do analisador (parser)',
	'errorhandler-error-notice' => 'Nota',
	'errorhandler-error-deprecated' => 'Obsoleto',
	'errorhandler-error-core-error' => 'Erro do núcleo',
	'errorhandler-error-core-warning' => 'Aviso do núcleo',
	'errorhandler-error-compile-error' => 'Erro de compilação',
	'errorhandler-error-compile-warning' => 'Aviso de compilação',
	'errorhandler-error-user-error' => 'Erro de utilizador',
	'errorhandler-error-user-warning' => 'Aviso de utilizador',
	'errorhandler-error-user-notice' => 'Nota de utilizador',
	'errorhandler-error-user-deprecated' => 'Obsoleto por utilizador',
	'errorhandler-error-strict' => 'Padrões estritos',
	'errorhandler-error-recoverable' => 'Erro fatal tratável',
	'errorhandler-msg-text' => '$1 : $2 em $3 (linha $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> em <b>$3</b> (linha <b>$4</b>)',
	'errorhandler-trace' => 'rastreio:',
	'errorhandler-trace-line' => '$1 (linha $2): $3',
	'errorhandler-trace-line-internal' => '[função interna]: $1',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'errorhandler-errors' => 'Erori:',
	'errorhandler-error-fatal' => 'Eroare fatală',
	'errorhandler-error-warning' => 'Avertizare',
	'errorhandler-error-deprecated' => 'Învechit',
	'errorhandler-error-compile-error' => 'Eroare de compilare',
	'errorhandler-error-compile-warning' => 'Avertizare de compilare',
	'errorhandler-error-user-error' => 'Eroare de utilizator',
	'errorhandler-error-user-warning' => 'Avertizare de utilizator',
	'errorhandler-error-strict' => 'Standarde stricte',
	'errorhandler-msg-text' => '$1 : $2 în $3 (linia $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> în <b>$3</b> (linia <b>$4</b>)',
	'errorhandler-trace-line' => '$1 (linia $2): $3',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'errorhandler-errors' => 'Errore:',
	'errorhandler-error-fatal' => 'Errore putende',
	'errorhandler-msg-text' => "$1 : $2 jndr'à $3 (linèe $4)",
	'errorhandler-msg-html' => "<b>$1</b> : <i>$2</i> jndr'à <b>$3</b> (linèe <b>$4</b>)",
);

/** Russian (Русский)
 * @author Ferrer
 * @author Innv
 * @author Rubin
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'errorhandler-desc' => 'Ошибка обработчика MediaWiki',
	'errorhandler-errors' => 'Ошибки:',
	'errorhandler-error-fatal' => 'Серьёзная ошибка',
	'errorhandler-error-warning' => 'Внимание',
	'errorhandler-error-parse' => 'Ошибка парсера',
	'errorhandler-error-notice' => 'Уведомление',
	'errorhandler-error-deprecated' => 'Запрещено',
	'errorhandler-error-core-error' => 'Ошибка ядра',
	'errorhandler-error-core-warning' => 'Предупреждение ядра',
	'errorhandler-error-compile-error' => 'Ошибка компиляции',
	'errorhandler-error-compile-warning' => 'Предупреждение компиляции',
	'errorhandler-error-user-error' => 'Ошибка участника',
	'errorhandler-error-user-warning' => 'Предупреждение участника',
	'errorhandler-error-user-notice' => 'Уведомление участника',
	'errorhandler-error-user-deprecated' => 'Запрет участника',
	'errorhandler-error-strict' => 'Точные стандарты',
	'errorhandler-error-recoverable' => 'Фатальная ошибка Catchable',
	'errorhandler-msg-text' => '$1 : $2 в $3 (линия $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> в <b>$3</b> (линия <b>$4</b>)',
	'errorhandler-trace' => 'след:',
	'errorhandler-trace-line' => '$1 (линия $2): $3',
	'errorhandler-trace-line-internal' => '[внутренняя функция]: $1',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'errorhandler-desc' => 'Obsluha chýb MediaWiki',
	'errorhandler-errors' => 'Chyby:',
	'errorhandler-error-fatal' => 'Kritická chyba',
	'errorhandler-error-warning' => 'Upozornenie',
	'errorhandler-error-parse' => 'Chyba syntaktickej analýzy',
	'errorhandler-error-notice' => 'Oznam',
	'errorhandler-error-deprecated' => 'Zavrhované',
	'errorhandler-error-core-error' => 'Chyba jadra',
	'errorhandler-error-core-warning' => 'Upozornenie jadra',
	'errorhandler-error-compile-error' => 'Chyba kompilácie',
	'errorhandler-error-compile-warning' => 'Upozornenie kompilácie',
	'errorhandler-error-user-error' => 'Chyba používateľa',
	'errorhandler-error-user-warning' => 'Upozornenie používateľa',
	'errorhandler-error-user-notice' => 'Oznam používateľa',
	'errorhandler-error-user-deprecated' => 'Používateľ je zavrhovaný',
	'errorhandler-error-strict' => 'Prísne štandardy',
	'errorhandler-error-recoverable' => 'Osudová chyba, ktorú možno zachytiť',
	'errorhandler-msg-text' => '$1 : $2 v $3 (riadok $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> v <b>$3</b> (riadok <b>$4</b>)',
	'errorhandler-trace' => 'trasovanie:',
	'errorhandler-trace-line' => '$1 (riadok $2): $3',
	'errorhandler-trace-line-internal' => '[vnútorná funkcia]: $1',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'errorhandler-desc' => 'Прихватач грешака за МедијаВики',
	'errorhandler-errors' => 'Грешке:',
	'errorhandler-error-fatal' => 'Фатална грешка',
	'errorhandler-error-warning' => 'Упозорење',
	'errorhandler-error-parse' => 'Грешка парсера',
	'errorhandler-error-notice' => 'Напомена',
	'errorhandler-error-deprecated' => 'Застарело',
	'errorhandler-error-core-error' => 'Затвори грешку',
	'errorhandler-error-compile-error' => 'Грешка приликом компајлирања',
	'errorhandler-error-compile-warning' => 'Упозорење приликом компајлирања',
	'errorhandler-error-user-error' => 'Корисничка грешка',
	'errorhandler-error-user-warning' => 'Корисничко упозорење',
	'errorhandler-error-user-notice' => 'Корисничка напомена',
	'errorhandler-error-user-deprecated' => 'Застарели налог',
	'errorhandler-error-strict' => 'Строги стандарди',
	'errorhandler-msg-text' => '$1 : $2 у $3 (линија $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> у <b>$3</b> (линија <b>$4</b>)',
	'errorhandler-trace' => 'траг:',
	'errorhandler-trace-line' => '$1 (линија $2): $3',
	'errorhandler-trace-line-internal' => '[интерна функција]: $1',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Najami
 */
$messages['sv'] = array(
	'errorhandler-desc' => 'Felhanterare för MediaWiki',
	'errorhandler-errors' => 'Fel:',
	'errorhandler-error-fatal' => 'Allvarligt fel',
	'errorhandler-error-warning' => 'Varning',
	'errorhandler-error-parse' => 'Parser-fel',
	'errorhandler-error-notice' => 'Meddelande',
	'errorhandler-error-deprecated' => 'Nedgraderad',
	'errorhandler-error-core-error' => 'Fel i kärnan',
	'errorhandler-error-core-warning' => 'Kärn-varning',
	'errorhandler-error-compile-error' => 'Kompileringsfel',
	'errorhandler-error-compile-warning' => 'Kompileringsvarning',
	'errorhandler-error-user-error' => 'Användarfel',
	'errorhandler-error-user-warning' => 'Användarvarning',
	'errorhandler-error-user-notice' => 'Användarmeddelande',
	'errorhandler-error-user-deprecated' => 'Användare nedgraderad',
	'errorhandler-error-strict' => 'Strikta standarder',
	'errorhandler-error-recoverable' => 'Hanterbart allvarligt fel',
	'errorhandler-msg-text' => '$1 : $2 i $3 (rad $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> i <b>$3</b> (rad <b>$4</b>)',
	'errorhandler-trace' => 'spåra:',
	'errorhandler-trace-line' => '$1 (rad $2): $3',
	'errorhandler-trace-line-internal' => '[intern funktion]: $1',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'errorhandler-errors' => 'పొరపాట్లు:',
	'errorhandler-error-warning' => 'హెచ్చరిక',
	'errorhandler-error-notice' => 'గమనిక',
	'errorhandler-trace-line' => '$1 (లైను $2): $3',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'errorhandler-desc' => 'Kamalian ng tagahawak para sa MediaWiki',
	'errorhandler-errors' => 'Mga kamalian:',
	'errorhandler-error-fatal' => 'Malubhang kamalian',
	'errorhandler-error-warning' => 'Babala',
	'errorhandler-error-parse' => 'Kamalian ng banghay',
	'errorhandler-error-notice' => 'Pabatid',
	'errorhandler-error-deprecated' => 'Tinutulan',
	'errorhandler-error-core-error' => 'Kamalian ng kaibuturan',
	'errorhandler-error-core-warning' => 'Babala ng kaibuturan',
	'errorhandler-error-compile-error' => 'Kamalian sa pangangalap',
	'errorhandler-error-compile-warning' => 'Babala sa pangangalap',
	'errorhandler-error-user-error' => 'Kamalian ng tagagamit',
	'errorhandler-error-user-warning' => 'Babala sa tagagamit',
	'errorhandler-error-user-notice' => 'Pabatid sa tagagamit',
	'errorhandler-error-user-deprecated' => 'Pagtutol sa tagagamit',
	'errorhandler-error-strict' => 'Mahigpit na mga pamantayan',
	'errorhandler-error-recoverable' => 'Masusukol na malubhang kamalian',
	'errorhandler-msg-text' => '$1 : $2 nasa $3 (guhit na $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> nasa <b>$3</b> (guhit na <b>$4</b>)',
	'errorhandler-trace' => 'bakas:',
	'errorhandler-trace-line' => '$1 (guhit na $2): $3',
	'errorhandler-trace-line-internal' => '[panloob na tungkulin]: $1',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'errorhandler-errors' => 'Petused:',
	'errorhandler-error-fatal' => 'Luja petuz',
	'errorhandler-error-warning' => 'Varutuz',
	'errorhandler-error-parse' => 'Parseran petuz',
	'errorhandler-error-notice' => 'Homaičend',
	'errorhandler-error-user-error' => 'Kävutajan petuz',
	'errorhandler-error-user-warning' => 'Kävutajan varutuz',
	'errorhandler-error-user-notice' => 'Kävutajan homaičend',
	'errorhandler-error-strict' => 'Tarkad standartad',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'errorhandler-errors' => 'Lỗi:',
	'errorhandler-error-warning' => 'Cảnh báo',
	'errorhandler-error-user-error' => 'Lỗi tại người dùng',
	'errorhandler-error-user-warning' => 'Cảnh báo do người dùng',
	'errorhandler-msg-text' => '$1 : $2 trong $3 (dòng $4)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> trong <b>$3</b> (dòng <b>$4</b>)',
	'errorhandler-trace-line' => '$1 (dòng $2): $3',
	'errorhandler-trace-line-internal' => '[hàm nội bộ]: $1',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gaoxuewei
 */
$messages['zh-hans'] = array(
	'errorhandler-errors' => '错误：',
	'errorhandler-error-fatal' => '致命错误',
	'errorhandler-error-warning' => '警告',
	'errorhandler-error-notice' => '提示',
	'errorhandler-error-deprecated' => '不推荐使用',
	'errorhandler-error-compile-error' => '编译错误',
	'errorhandler-error-compile-warning' => '编译警告',
	'errorhandler-error-user-error' => '用户错误',
	'errorhandler-error-user-warning' => '用户警告',
	'errorhandler-error-user-notice' => '用户提示',
	'errorhandler-error-user-deprecated' => '用户不推荐使用',
	'errorhandler-error-strict' => '严格的标准',
	'errorhandler-msg-text' => '$1 : $2 在 $3 中 (第$4行)',
	'errorhandler-msg-html' => '<b>$1</b> : <i>$2</i> 在 <b>$3</b> 中(第 <b>$4</b> 行)',
	'errorhandler-trace' => '跟踪：',
	'errorhandler-trace-line' => '$1 (第$2行): $3',
	'errorhandler-trace-line-internal' => '[内部函数]: $1',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'errorhandler-errors' => '錯誤:',
	'errorhandler-error-warning' => '警告',
);

