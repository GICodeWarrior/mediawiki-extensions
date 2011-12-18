<?php

require_once( 'languages.php' );
require_once( 'forms.php' );
require_once( 'Attribute.php' );
require_once( 'Record.php' );
require_once( 'Transaction.php' );
require_once( 'WikiDataAPI.php' );
require_once( 'Wikidata.php' );
require_once( 'WikiDataGlobals.php' );

function booleanAsText( $value ) {
	if ( $value )
		return "Yes";
	else
		return "No";
}

function booleanAsHTML( $value ) {
	if ( $value )
		return '<input type="checkbox" checked="checked" disabled="disabled"/>';
	else
		return '<input type="checkbox" disabled="disabled"/>';
}

function pageAsURL( $nameSpace, $title, $usedc = true ) {

	global $wgArticlePath, $wdDefaultViewDataSet;

	$myTitle = str_replace( "&", urlencode("&") , $title ) ;
	$myTitle = str_replace( "?", urlencode("?") , $title ) ;
	$url = str_replace( "$1", $nameSpace . ':' . $myTitle , $wgArticlePath );

	if ( $usedc ) {
		$dc = wdGetDataSetContext();
		if ( $dc == $wdDefaultViewDataSet ) return $url;
		if ( strpos($url , "?") ) {
			$url .= "&dataset=$dc";
		} else {
			$url .= "?dataset=$dc";
		}
	}
	return $url;
}

function spellingAsURL( $spelling, $lang = 0 ) {
	global $wdDefaultViewDataSet;

	$title = Title::makeTitle( NS_EXPRESSION, $spelling );
	$query = array() ;

	$dc = wdGetDataSetContext();
	if ( $dc != $wdDefaultViewDataSet ) {
		$query['dataset'] = $dc ;
	}
	if ( $lang != 0 ) {
		$query['explang'] = $lang ;
	}

	return $title->getLocalURL( $query ) ;
}

function definedMeaningReferenceAsURL( $definedMeaningId, $definingExpression ) {
	return pageAsURL( "DefinedMeaning", "$definingExpression ($definedMeaningId)" );
}

function definedMeaningIdAsURL( $definedMeaningId ) {
	return definedMeaningReferenceAsURL( $definedMeaningId, definingExpression( $definedMeaningId ) );
}

function createLink( $url, $text ) {
	return '<a href="' . htmlspecialchars( $url ) . '">' . htmlspecialchars( $text ) . '</a>';
}

function spellingAsLink( $spelling, $lang = 0 ) {
	return createLink( spellingAsURL( $spelling, $lang ), $spelling );
}

function definedMeaningReferenceAsLink( $definedMeaningId, $definingExpression, $label ) {
	return createLink( definedMeaningReferenceAsURL( $definedMeaningId, $definingExpression ), $label );
}

function languageIdAsText( $languageId ) {
	global $wgUser;
	$owLanguageNames = getOwLanguageNames();
	if ( array_key_exists( $languageId, $owLanguageNames ) ) {
		return $owLanguageNames[$languageId];
	} else {
		return null;
	}
}

function collectionIdAsText( $collectionId ) {
	if ( $collectionId > 0 )
		return definedMeaningExpression( getCollectionMeaningId( $collectionId ) );
	else
		return "";
}

function timestampAsText( $timestamp ) {
	return
		substr( $timestamp, 0, 4 ) . '-' . substr( $timestamp, 4, 2 ) . '-' . substr( $timestamp, 6, 2 ) . ' ' .
		substr( $timestamp, 8, 2 ) . ':' . substr( $timestamp, 10, 2 ) . ':' . substr( $timestamp, 12, 2 );
}

function definingExpressionAsLink( $definedMeaningId ) {
	return spellingAsLink( definingExpression( $definedMeaningId ) );
}

function definedMeaningAsLink( $definedMeaningId ) {
	if ( $definedMeaningId > 0 )
		return createLink( definedMeaningIdAsURL( $definedMeaningId ), definedMeaningExpression( $definedMeaningId ) );
	else
		return "";
}

function collectionAsLink( $collectionId ) {
	return definedMeaningAsLink( getCollectionMeaningId( $collectionId ) );
}

function convertToHTML( $value, $type ) {
	global $wgDefinedMeaning;
	switch( $type ) {
		case "boolean": return booleanAsHTML( $value );
		case "spelling": return spellingAsLink( $value );
		case "collection": return collectionAsLink( $value );
		case "$wgDefinedMeaning": return definedMeaningAsLink( $value );
		case "defining-expression": return definingExpressionAsLink( $value );
		case "relation-type": return definedMeaningAsLink( $value );
		case "attribute": return definedMeaningAsLink( $value );
		case "language": return languageIdAsText( $value );
		case "short-text":
		case "text": return htmlspecialchars( $value );
		default: return htmlspecialchars( $value );
	}
}

function getInputFieldForType( $name, $type, $value ) {
	global $wgDefinedMeaning;
	switch( $type ) {
		case "language": return getLanguageSelect( $name );
		case "spelling": return getTextBox( $name, $value );
		case "boolean": return getCheckBox( $name, $value );
		case "$wgDefinedMeaning":
		case "defining-expression":
			return getSuggest( $name, $wgDefinedMeaning );
		case "relation-type": return getSuggest( $name, "relation-type" );
		case "attribute": return getSuggest( $name, "attribute" );
		case "collection": return getSuggest( $name, "collection" );
		case "short-text": return getTextBox( $name, $value );
		case "text": return getTextArea( $name, $value );
	}
}
function getInputFieldValueForType( $name, $type ) {
	global $wgRequest;
	global $wgDefinedMeaning;
	switch( $type ) {
		case "language": return $wgRequest->getInt( $name );
		case "spelling": return trim( $wgRequest->getText( $name ) );
		case "boolean": return $wgRequest->getCheck( $name );
		case "$wgDefinedMeaning":
		case "defining-expression":
			return $wgRequest->getInt( $name );
		case "relation-type": return $wgRequest->getInt( $name );
		case "attribute": return $wgRequest->getInt( $name );
		case "collection": return $wgRequest->getInt( $name );
		case "short-text":
		case "text": return trim( $wgRequest->getText( $name ) );
	}
}


