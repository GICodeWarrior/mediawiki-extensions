<?php

/**
 * Internationalisation file for Resign extension
 *
 * @addtogroup Extensions
*/

function efResignMessages() {
	$messages = array(
	
'en' => array(
'resign'           => 'Resign',
'resign-text'      => "You can '''remove your permissions''' (e.g. sysop) in this page. Please check the permissions you would like to remove.

Remember: '''You cannot get your permissions back this way!''' You will have to convince a bureaucrat or steward to grant you back the permissions. Please use this page very carefully.",
'resign-reason'    => 'Reason:',
'resign-confirm'   => 'I confirm that I would like to remove all the permissions I checked.',
'resign-noconfirm' => 'Please check the confirm checkbox if you would like to remove your permissions.',
'resign-nogroups'  => 'Please check the permissions you would like to remove.',
'resign-success'   => "'''The permissions were successfully removed.'''",
'resign-logentry'  => 'removed permissions $2 from himself',
),

/* Arabic (Meno25) */
'ar' => array(
'resign' => 'استقالة',
'resign-text' => 'يمكنك \'\'\'إزالة صلاحياتك\'\'\' (مثال الصلاحيات الإدارية) في هذه الصفحة. من فضلك علم على الصلاحيات التي تود إزالتها.

تذكر: \'\'\'لا يمكنك استرجاع صلاحياتك بهذه الطريقة!\'\'\' سيتوجب عليك إقناع بيروقرط أوستيوارد لكي يعيد لك الصلاحيات. من فضلك استخدم هذه الصفحة بحرص شديد.',
'resign-reason' => 'السبب:',
'resign-confirm' => 'أؤكد أنني أريد إزالة كل الصلاحيات التي اخترتها.',
'resign-noconfirm' => 'من فضلك علم على صندوق التأكيد إذا كنت تريد إزالة صلاحياتك.',
'resign-nogroups' => 'من فضلك اختر الصلاحيات التي تريد إزالتها.',
'resign-success' => '\'\'\'الصلاحيات تمت إزالتها بنجاح.\'\'\'',
'resign-logentry' => 'أزال الصلاحيات $2 من نفسه',
),

'de' => array(
'resign'           => 'Rücktritt',
'resign-text'      => "Sie können auf dieser Seite '''Ihre Berechtigungen zurückgeben''' (z.B. die Administrator-Berechtigung). Bitte prüfen Sie die Berechtigungen, die Sie zurückgeben möchten.

Wichtig: '''Dieser Schritt ist unwiderruflich.!''' Sie müssen einen Bürokraten oder Steward kontaktieren, um Ihre Rechte wiederzuerhalten. Bitte benutzen Sie diese Seite daher nur nach sorgfäliger Überlegung.",
'resign-reason'    => 'Grund:',
'resign-confirm'   => 'Ich bestätige, dass ich alle markierten Berechtigungen zurückgeben möchte.',
'resign-noconfirm' => 'Bitte markieren Sie das Bestätigungsfeld um Ihre Berechtigungen zurückzugeben.',
'resign-nogroups'  => 'Bitte markieren Sie die Berechtigungen, die Sie zurückgeben möchten.',
'resign-success'   => "'''Die Rückgabe der Berechtigungen war erfolgreich.'''",
'resign-logentry'  => 'gab die Berechtigung(en) $2 zurück',
),

'fi' => array(
'resign'           => 'Eroa',
'resign-text'      => "Voit '''poistaa omat oikeutesi''' (esim. ylläpitäjän oikeudet) tällä sivulla. Ole hyvä ja rastita oikeudet, jotka haluaisit poistaa.

Muista: '''Et voi saada oikeuksiasi takaisin tämän sivun avulla!''' Sinun täytyy vakuuttaa byrokraatti tai ylivalvoja antamaan oikeutesi takaisin. Ole hyvä ja käytä tätä sivua erittäin varovasti.",
'resign-reason'    => 'Syy:',
'resign-confirm'   => 'Vakuutan, että haluan poistaa kaikki rastitsemani oikeudet.',
'resign-noconfirm' => 'Ole hyvä ja rastita varmistusruutu, jos haluat poistaa oikeutesi.',
'resign-nogroups'  => 'Ole hyvä ja rastita oikeudet, jotka haluat poistaa.',
'resign-success'   => "'''Oikeudet poistettiin onnistuneesti.'''",
'resign-logentry'  => 'poisti oikeudet $2 itseltään',
),

'he' => array(
'resign'           => 'התפטרות',
'resign-text'      => "בדף זה תוכלו '''להסיר את ההרשאות שלכם''' (למשל, הרשאות מפעיל מערכת). אנא סמנו את ההרשאות שברצונכם להסיר.

להזכירכם: '''אינכם יכולים לקבל בחזרה את ההרשאות בדרך זו!''' יהיה עליכם לשכנע ביורוקרט או דייל להעניק לכם את הרשאותיכם בחזרה. אנא השתמשו בדף זה בזהירות רבה.",
'resign-reason'    => 'סיבה:',
'resign-confirm'   => 'אני מאשר שברצוני להסיר את כל ההרשאות שלי שסימנתי, וידוע לי שלא אוכל לקבל אותן בחזרה בדרך זו.',
'resign-noconfirm' => 'אנא סמנו את תיבת הסימון כדי לאשר את ההסרה.',
'resign-nogroups'  => 'אנא בחרו את ההרשאות שברצונכם להסיר.',
'resign-success'   => "'''ההרשאות הוסרו בהצלחה.'''",
'resign-logentry'  => 'הסיר את ההרשאות $2 שלו',
),
	
'id' => array(
'resign'           => 'Pengunduran diri',
'resign-text'      => "Anda dapat melepaskan hak Anda (mis. pengurus) melalui halaman ini. Silakan tandai hak yang ingin Anda lepas.

Ingat: '''Anda tidak dapat memperoleh kembali hak Anda melalui ini!''' Anda harus meyakinkan seorang birokrat atau steward untuk memberikan kembali hak tersebut. Harap gunakan halaman ini dengan sangat hati-hati.",
'resign-reason'    => 'Alasan:',
'resign-confirm'   => 'Saya menyetujui untuk melepas hak-hak yang saya tandai.',
'resign-noconfirm' => 'Harap pilih kotak cek konfirmasi untuk melepaskan hak Anda.',
'resign-nogroups'  => 'Harap pilih hak yang ingin Anda lepas.',
'resign-success'   => "'''Proses pelepasan hak berhasil.'''",
'resign-logentry'  => 'melepaskan hak $2 dari dirinya sendiri',
),

/* Piedmontese (Bèrto 'd Sèra) */
'pms' => array(
'resign' => 'Dimission',
'resign-text' => 'A peul \'\'\'gavesse sò drit\'\'\' (pr\'esempi, la qualìfica da aministrator) ant sta pàgina-sì. Për piasì, ch\'a-i fasa la crosëtta ansima a ij drit ch\'a veul gavesse.

Ch\'a ten-a da ment: \'\'\'a podrà pì nen pijeje andré ën dovrand l\'istess sistema!\'\'\' A l\'avra da convince un mangiapapé ò un vardian a buteje torna sò drit. Për piasì, sta pàgina ch\'a la dòvra con criteri.',
'resign-reason' => 'Rason:',
'resign-confirm' => 'I confermo ch\'i veuj gaveme tuti ij drit dont casela i l\'hai fa-ie la crosëtta ansima.',
'resign-noconfirm' => 'Për piasì, ch\'a-i buta la crosëtta ansima a la casela ëd conferma s\'a veul gavesse sò drit.',
'resign-nogroups' => 'Për piasì, ch\'a-i buta la crosëtta ansima a le casele dij drit ch\'a veul gavesse.',
'resign-success' => '\'\'\'Soe dimission a son andaite a bon fin.\'\'\'',
'resign-logentry' => 'a l\'ha gavasse ij drit dë $2',
),

'sk' => array(
'resign' => 'Rezignovať',
'resign-text' => 'Na tejto stránke sa môžete \'\'\'vzdať svojich privilégií\'\'\' (napr. správca). Prosím, zaškrtnite, ktoré privilégiá chcete odstrániť.

Pamätajte: \'\'\'Týmto spôsobom už svoje privilégiá nedostanete naspäť!\'\'\' Budete musieť presvedčiť byrokrata alebo stewarda, aby vám privilégiá udelil. Používajte preto túto stránku veľmi opatrne.',
'resign-reason' => 'Dôvod:',
'resign-confirm' => 'Potvrdzujem, že chcem, aby mi boli odstránené všetky privilégiá, ktoré som začiarkol.',
'resign-noconfirm' => 'Prosím, zaškrtnite pole ak chcete odstrániť svoje privilégiá.',
'resign-nogroups' => 'Prosím, zaškrtnite privilégiá, ktoré chcete odstrániť.',
'resign-success' => '\'\'\'Privilégiá boli úspešne odňaté.\'\'\'',
'resign-logentry' => 'odstránil svoje privilégiá $2',
),

/* Cantonese (Shinjiman) */
'yue' => array(
'resign'           => '劈炮',
'resign-text'      => "你可以響呢一版度'''拎走你嘅權限''' (好似操作員噉) 。請檢查清楚你需要去拎走嘅權限。

記住: '''你唔可以用呢個方法攞番你嘅權限返來！'''你需要去說服一位事務員或者執行員去畀返你相應嘅權限。請小心噉利用呢一版。",
'resign-reason'    => '原因:',
'resign-confirm'   => '我確認我要拎走我已經剔咗嘅全部權限。',
'resign-noconfirm' => '如果你要拎走你嘅權限，請檢查個確認方塊已經剔咗。',
'resign-nogroups'  => '請檢查你要去拎走嘅權限。',
'resign-success'   => "'''呢啲權限已經成功噉拎走咗。'''",
'resign-logentry'  => '自己拎走咗$2權限',
),

/* Chinese (Simplified) (Shinjiman) */
'zh-hans' => array(
'resign'           => '辞职',
'resign-text'      => "您可以在响这一页面中'''移除阁下的的权限''' (好像操作员) 。请检查清楚您需要去移除的权限。

紧记: '''您不可以用这个方法重新取得权限！'''您需要去说服一位行政员或者监管员去取回您相应的权限。请小心利用这个页面。",
'resign-reason'    => '原因:',
'resign-confirm'   => '我确认我要移除我已经剔选的所有权限。',
'resign-noconfirm' => '如果您要移除您的权限，请检查个确认方块已经剔选。',
'resign-nogroups'  => '请检查您要去移除的权限。',
'resign-success'   => "'''这些权限已经成功地移除。'''",
'resign-logentry'  => '自行移除了$2权限',
),

/* Chinese (Traditional) (Shinjiman) */
'zh-hant' => array(
'resign'           => '辭職',
'resign-text'      => "您可以在響這一頁面中'''移除閣下的的權限''' (好像操作員) 。請檢查清楚您需要去移除嘅權限。

緊記: '''您不可以用這個方法重新取得權限！'''您需要去說服一位行政員或者監管員去取回您相應的權限。請小心利用這個頁面。",
'resign-reason'    => '原因:',
'resign-confirm'   => '我確認我要移除我已經剔選的所有權限。',
'resign-noconfirm' => '如果您要移除您的權限，請檢查個確認方塊已經剔選。',
'resign-nogroups'  => '請檢查您要去移除的權限。',
'resign-success'   => "'''這些權限已經成功地移除。'''",
'resign-logentry'  => '自行移除了$2權限',
),

	);

	/* Chinese defaults, fallback to zh-hans or zh-hant */
	$messages['zh-cn'] = $messages['zh-hans'];
	$messages['zh-hk'] = $messages['zh-hant'];
	$messages['zh-sg'] = $messages['zh-hans'];
	$messages['zh-tw'] = $messages['zh-hant'];
	/* Cantonese default, fallback to yue */
	$messages['zh-yue'] = $messages['yue'];

	return $messages;
}



