<?php
if ( !defined( 'MEDIAWIKI' ) )
	die();

/*
* Get a value from a global array if it exists, otherwise use $default
*/
function efArrayDefault( $name, $key, $default ) {
	global $$name;
	if ( isset( $$name ) && is_array( $$name ) && array_key_exists( $key, $$name ) ) {
		$foo = $$name;
		return $foo[$key];
	} else {
		return $default;
	}
}

/**
 * Recreate the original associative array so that a new pair with the given key
 * and value is inserted before the given existing key. $original_array gets
 * modified in-place.
*/
function efInsertIntoAssoc( $new_key, $new_value, $before, &$original_array ) {
	$ordered = array();
	$i = 0;
	foreach ( $original_array as $key => $value ) {
		$ordered[$i] = array( $key, $value );
		$i += 1;
	}
	$new_assoc = array();
	foreach ( $ordered as $pair ) {
		if ( $pair[0] == $before ) {
			$new_assoc[$new_key] = $new_value;
		}
		$new_assoc[$pair[0]] = $pair[1];
	}
	$original_array = $new_assoc;
}

function lqtFormatMoveLogEntry( $type, $action, $title, $sk, $parameters ) {
	return wfMsgExt( 'lqt-log-action-move', 'parseinline',
					array( $title->getPrefixedText(), $parameters[0], $parameters[1] ) );
}

function lqtSetupParserFunctions( &$parser ) {
	$parser->setFunctionHook(
		'useliquidthreads',
		array( 'LqtParserFunctions', 'useLiquidThreads' )
	);

	return true;
}
