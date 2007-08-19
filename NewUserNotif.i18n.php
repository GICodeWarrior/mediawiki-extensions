<?php

/**
 * Internationalisation file for the New User Email Notification extension
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 */

function efNewUserNotifMessages() {
	$messages = array(
	
'en' => array(
	'newusernotifsubj' => 'New User Notification for $1',
	'newusernotifbody' => "Hello $1,\n\nA new user account, $2, has been created on $3 at $4.",
),

'de' => array(
	'newusernotifsubj' => 'Benachrichtung für $1 über die Einrichtung eines neuen Benutzerskontos',
	'newusernotifbody' => "Hallo $1,\n\nEin neues Benutzerkonto, $2, wurde am $4 auf $3 angelegt.",
),

'fr' => array(
	'newusernotifsubj' => 'Notification d’un nouvel utilisateur pour $1',
	'newusernotifbody' => "Bonjour $1,\n\nUn nouveau compte utilisateur, $2, a été créé sur $3 le $4.",
),

'yue' => array(
	'newusernotifsubj' => '$1嘅新用戶通知',
	'newusernotifbody' => "你好 $1，\n\n一個新嘅用戶戶口$2，已經響$4喺$3度開咗。",
),

'zh-hans' => array(
	'newusernotifsubj' => '$1的新用户通知',
	'newusernotifbody' => "你好 $1，\n\n一个新的用户账号$2，已经在$4于$3创建。",
),

'zh-hant' => array(
	'newusernotifsubj' => '$1的新用戶通知',
	'newusernotifbody' => "你好 $1，\n\n一個新的用戶帳號$2，已經在$4於$3創建。",
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
