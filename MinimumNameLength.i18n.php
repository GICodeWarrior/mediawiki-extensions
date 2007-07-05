<?php

/**
 * Internationalisation file for the MinimumNameLength extension
 *
 * @package MediaWiki
 * @subpackage Extensions
 */
function efMinimumNameLengthMessages() {
	$messages = array(

/* English (Rob Church) */
'en' => array(
'minnamelength-error' => 'Your username is too short. The minimum length is $1.',
),

/* Arabic */
'ar' => array(
'minnamelength-error' => 'اسم المستخدم قصير للغاية. أقل طول مسموخ به هو $1.',
),

/* German */
'de' => array(
'minnamelength-error' => 'Der Benutzername ist zu kurz. Die Mindestlänge beträgt $1 Zeichen.',
),

/* French (Ashar Voultoiz) */
'fr' => array(
'minnamelength-error' => 'Votre nom d\'utilisateur est trop court (minimum $1).',
),

/* Indonesian (IvanLanin) */
'id' => array(
'minnamelength-error' => 'Nama pengguna Anda terlalu pendek. Panjang minimum adalah $1.',
),

/* Japanese */
'ja' => array(
'minnamelength-error' => 'あなたの利用者名は短すぎます。最短の長さは $1 バイトです。',
),

/* Kazakh default */
'kk' => array(
'minnamelength-error' => 'Қатысушы атыңыз тым қысқа.Ең кемінде ұзындығы $1 болуы қажет.',
),
/* Kazakh Cyrillic */
'kk-kz' => array(
'minnamelength-error' => 'Қатысушы атыңыз тым қысқа.Ең кемінде ұзындығы $1 болуы қажет.',
),
/* Kazakh Latin */
'kk-tr' => array(
'minnamelength-error' => 'Qatıswşı atıñız tım qısqa.Eñ keminde uzındığı $1 bolwı qajet.',
),
/* Kazakh Arabic */
'kk-cn' => array(
'minnamelength-error' => 'قاتىسۋشى اتىڭىز تىم قىسقا.ەڭ كەمٴىندە ۇزىندىعى $1 بولۋى قاجەت.',
),
/* Norwegian (Jon Harald Søby) */
'no' => array(
'minnamelength-error' => 'Brukernavnet ditt er for kort. Minimumslengden er $1.',
),
'oc' => array(
'minnamelength-error' => 'Vòstre nom d\'utilizaire es tròp cort. La longor minimom es $1.',
),

'sk' => array(
'minnamelength-error' => 'Vaše používateľské meno je príliš krátke. Minimálna dĺžka je $1.',
),

'su' => array(
'minnamelength-error' => 'Landihan anjeun pondok teuing. Paling henteu kudu $1.',
),

/* Cantonese (Shinjiman) */
'yue' => array(
'minnamelength-error' => '你嘅用戶名太短喇。最少嘅長度係$1個字元。',
),

/* Chinese (Simplified) (Shinjiman) */
'zh-hans' => array(
'minnamelength-error' => '你的用户名太短。最少的长度是$1个字元。',
),

/* Chinese (Traditional) (Shinjiman) */
'zh-hant' => array(
'minnamelength-error' => '你的用戶名太短。最少的長度是$1個字元。',
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



