<?php
/**
 * Aliases for the special pages of the Push extension.
 *
 * @file Push.alias.php
 * @ingroup Push
 *
 * @author Jeroen De Dauw
 */

$specialPageAliases = array();

/** English
 * @author Jeroen De Dauw
 */
$specialPageAliases['en'] = array(
	'Push' => array( 'Push' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;