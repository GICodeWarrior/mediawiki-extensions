<?php

/**
 * Internationalisation file for the MediaFunctions extension
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 * @version 1.1
 */

/**
 * Get translated magic words, if available
 *
 * @param string $lang Language code
 * @return array
 */
function efMediaFunctionsWords( $lang ) {
	$words = array();
	
	/**
	 * English
	 */
	$words['en'] = array(
		'mediamime' 		=> array( 0, 'mediamime' ),
		'mediasize' 		=> array( 0, 'mediasize' ),
		'mediaheight' 		=> array( 0, 'mediaheight' ),
		'mediawidth' 		=> array( 0, 'mediawidth' ),
		'mediadimensions'	=> array( 0, 'mediadimensions' ),
		'mediaexif'			=> array( 0, 'mediaexif' ),
	);
	
	# English is used as a fallback, and the English synonyms are
	# used if a translation has not been provided for a given word
	return ( $lang == 'en' || !isset( $words[$lang] ) )
		? $words['en']
		: array_merge( $words['en'], $words[$lang] );
}

/**
 * Get error message translations
 *
 * @return array
 */
function efMediaFunctionsMessages() {
	$messages = array(

'en' => array(
'mediafunctions-invalid-title' => '"$1" is not a valid title',
'mediafunctions-not-exist'     => '"$1" does not exist',
),

'de' => array(
'mediafunctions-invalid-title' => '„$1“ ist kein gültiger Name',
'mediafunctions-not-exist'     => '„$1“ ist nicht vorhanden',
),

'nl' => array(
'mediafunctions-invalid-title' => '"$1" is geen geldige titel',
'mediafunctions-not-exist'     => '"$1" bestaat niet',
),

'yue' => array(
'mediafunctions-invalid-title' => '"$1" 唔係一個有效嘅標題',
'mediafunctions-not-exist'     => '"$1" 唔存在',
),

'zh-hans' => array(
'mediafunctions-invalid-title' => '"$1" 不是一个有效的标题',
'mediafunctions-not-exist'     => '"$1" 不存在',
),

'zh-hant' => array(
'mediafunctions-invalid-title' => '"$1" 不是一個有效的標題',
'mediafunctions-not-exist'     => '"$1" 不存在',
),
	
	);

	/* Chinese defaults, fallback to zh-hans or zh-hant */
	$messages['zh'] = $messages['zh-hans'];
	$messages['zh-cn'] = $messages['zh-hans'];
	$messages['zh-hk'] = $messages['zh-hant'];
	$messages['zh-tw'] = $messages['zh-hans'];
	$messages['zh-sg'] = $messages['zh-hant'];
	/* Cantonese default, fallback to yue */
	$messages['zh-yue'] = $messages['yue'];

	return $messages;
}
