<?php
/**
 * Internationalisation file for the CommentSpammer extension.
 * @addtogroup Extensions
 */

/** 
 * @return array Messages.
 */
function efCommentSpammerMessages() {
        $messages = array(

/* English */
'en' => array(
	'commentspammer-save-blocked' => 'Your IP address is a suspected comment spammer, so the page has not been saved. [[Special:Userlogin|Log in or create an account]] to avoid this.',
	'commentspammer-log-msg'      => 'edit from [[Special:Contributions/$1|$1]] to [[$2]]. ',
	'commentspammer-log-msg-info' => 'Last spammed $1 {{PLURAL:$1|day|days}} ago, threat level is $2, and offence code is $3. [http://www.projecthoneypot.org/search_ip.php?ip=$4 View details], or [[Special:Blockip/$4|block]].',
	'cspammerlogpagetext'         => 'Record of edits that have been allowed or denied based on whether the source was a known comment spammer.',
	'cspammer-log-page'           => 'Comment Spammer log',
),

/* Other languages here */
'ar' => array(
	'commentspammer-save-blocked' => 'عنوان الأيبي الخاص بك هو معلق سبام مشتبه، لذا لم يتم حفظ الصفحة. [[Special:Userlogin|ادخل أو سجل حسابا]] لتجنب هذا.',
	'commentspammer-log-msg' => 'تعديل من [[Special:Contributions/$1|$1]] ل[[$2]].',
	'commentspammer-log-msg-info' => 'آخر سبام منذ $1 {{PLURAL:$1|يوم|يوم}} ، مستوى التهديد هو $2، و كود الإساءة هو $3. [http://www.projecthoneypot.org/search_ip.php?ip=$4 عرض التفاصيل]، أو [[Special:Blockip/$4|منع]].',
	'cspammerlogpagetext' => 'سجل التعديلات التي تم السماح بها أو رفضها بناء على ما إذا كان المصدر معلق سبام معروف.',
	'cspammer-log-page' => 'سجل تعليق السبام',
),

/* German */
'de' => array(
	'commentspammer-save-blocked' => 'Deine IP-Adresse stammt mutmaßlich von einem Kommentar-Spammer. Die Seite wurde nicht gespeichert. [[Special:Userlogin|Melde dich an oder erstelle ein Benutzerkonto]], um diese Warnung zu unterbinden.',
	'commentspammer-log-msg'      => 'Bearbeitung von [[Special:Contributions/$1|$1]] für [[$2]]. ',
	'commentspammer-log-msg-info' => 'Letztes Spamming vor $1 {{PLURAL:$1|Tag|Tagen}}, der "threat level" ist $2 und der and "offence code" is $3. [http://www.projecthoneypot.org/search_ip.php?ip=$4 Details ansehen] oder [[Special:Blockip/$4|sperren]].',
	'cspammerlogpagetext'         => 'Liste der Bearbeitungen, die genehmigt oder abgelehnt wurden auf der Basis, ob die Quelle ein bekannter Kommentar-Spammer war.',
	'cspammer-log-page'           => 'Kommentar-Spammer Logbuch',
),

'fr' => array(
	'commentspammer-save-blocked' => 'Votre adresse IP est celle d\'une personne suspectée de créer du pourriel, la page n\'a pas été sauvegardée. Veuillez vous [[Special:Userlogin|connecter ou créer un compte]] pour contourner cet interdit.',
	'commentspammer-log-msg' => 'Modifications de [[Special:Contributions/$1|$1]] à [[$2]].',
	'commentspammer-log-msg-info' => 'Le dernier pourriel remonte à {{PLURAL:$1|$1 jour|$1 jours}}, le niveau d\'alerte est à $2 et le code d\'attaque est $3. [http://www.projecthoneypot.org/search_ip.php?ip=$4 Voir détails] ou [[Special:Blockip/$4|bloquer]].',
	'cspammerlogpagetext' => 'Journal des modifications acceptées ou rejetées selon que la source était un créateur de pourriels connu.',
	'cspammer-log-page' => 'Journal du créateur de pourriels',
),

'gl' => array(
	'commentspammer-save-blocked' => 'O seu enderezo IP é sospeitoso de facer comentarios spam, de maneira que non se gardou a páxina. [[Special:Userlogin|Rexístrese ou cree unha conta]] para evitalo.',
	'commentspammer-log-msg' => 'editar de [[Special:Contributions/$1|$1]] a [[$2]].',
	'commentspammer-log-msg-info' => 'Último correo spam $1 {{PLURAL:$1|día|días}} atrás, nivel de ameaza é de $2, e código de delito é de $3. 
[http://www.projecthoneypot.org/search_ip.php?ip=$4 ver detalles], ou [[Special:Blockip/$4|bloqueo]].',
	'cspammerlogpagetext' => 'Historial das edicións que se permitiron ou denegaron sobre a base de si a fonte foi un coñecido comentario spam.',
	'cspammer-log-page' => 'Rexistro dos comentarios Spam',
),

'hsb' => array(
	'commentspammer-save-blocked' => 'Twoja IP-adresa je podhladny komentarne spamowar - składowanje zablokowane. Wutwor konto, zo by to wobešoł.',
	'commentspammer-log-msg' => 'změna wot [[Special:Contributions/$1|$1]] k [[$2]]',
	'commentspammer-log-msg-info' => 'Posledni spam před $1 {{PLURAL:$1|dnjom|dnjomaj|dnjemi|dnjemi}}, stopjeń hroženja je $2 a nadpadowy kod je $3. [http://www.projecthoneypot.org/search_ip.php?ip=$4 Hlej podrobnosće] abo [[Special:Blockip/$4|blokowanje]].',
	'cspammerlogpagetext' => 'Datowa sadźba změnow, kotrež buchu dowolene abo wotpokazane, po tym hač žórło je znaty spamowar abo nic.',
	'cspammer-log-page' => 'Protokol komentarnych spamowarjow',
),

'nl' => array(
	'commentspammer-save-blocked' => 'Uw IP-adres wordt verdacht van spammen - opslaan is geweigerd. Maak een gebruiker aan om dit te voorkomen.',
	'commentspammer-log-msg' => 'bewerking van [[Special:Contributions/$1|$1]] aan [[$2]].',
	'commentspammer-log-msg-info' => 'Spamde voor het laatst $1 {{PLURAL:$1|dag|dagen}} geleden. Dreigingsniveau is $2 en de overtredingscode is $3. [http://www.projecthoneypot.org/search_ip.php?ip=$4 Details bekijken] of [[Special:Blockip/$4|blokkeren]].',
	'cspammerlogpagetext' => 'Logboek met bewerkingen die toegestaan of geweigerd zijn omdat de bron een bekende spammer was.',
	'cspammer-log-page' => 'Spamlogboek',
),

'pl' => array(
	'commentspammer-save-blocked' => 'Twój adres IP jest podejrzewany o bycie spammerem - zapisywanie stron jest zablokowane. Utwórz konto, aby uniknąć tego komunikatu.',
	'commentspammer-log-msg' => 'edycja [[Special:Contributions/$1|$1]] w [[$2]].',
	'commentspammer-log-msg-info' => 'Ostatni spam $1 {{PLURAL:$1|dzień|dni}} temu, poziom zagrożenia $2, kod naruszenia $3. [http://www.projecthoneypot.org/search_ip.php?ip=$4 Zobacz szczegóły] lub [[Special:Blockip/$4|zablokuj]].',
	'cspammerlogpagetext' => 'Zapis edycji, które zostały dozwolone lub zakazane na podstawie tego, czy dokonała ich osoba znana jako spammer.',
	'cspammer-log-page' => 'Rejestr spammerów',
),

        );

        return $messages;
}
