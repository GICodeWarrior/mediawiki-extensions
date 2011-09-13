<?php

$specialPageAliases = array();

/** English (English) */
$specialPageAliases['en'] = array(
	'UserDebugInfo' => array( 'UserDebugInfo' ),
);

/** Arabic (العربية) */
$specialPageAliases['ar'] = array(
	'UserDebugInfo' => array( 'معلومات_تصليح_المستخدم' ),
);

/** Macedonian (Македонски) */
$specialPageAliases['mk'] = array(
	'UserDebugInfo' => array( 'ИнфоКорисникОтстранувањеГрешки' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;