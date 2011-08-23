<?php
/**
 * Initialization file for the SemanticCompoundQueries extension.
 *
 * @file SemanticCompoundQueries.php
 * @ingroup SemanticCompoundQueries
 * 
 * @author Yaron Koren
 */

/**
 * This documentation group collects source-code files belonging to
 * Semantic Compound Queries.
 *
 * @defgroup SemanticCompoundQueries SemanticCompoundQueries
 */

if ( !defined( 'MEDIAWIKI' ) ) die();

define( 'SCQ_VERSION', '0.2.9' );

$wgExtensionCredits[defined( 'SEMANTIC_EXTENSION_TYPE' ) ? 'semantic' : 'parserhook'][] = array(
	'path'  => __FILE__,
	'name'	=> 'Semantic Compound Queries',
	'version'	=> SCQ_VERSION,
	'author'	=> array( 'Yaron Koren' ),
	'url'	=> 'http://www.mediawiki.org/wiki/Extension:Semantic_Compound_Queries',
	'descriptionmsg' => 'semanticcompoundqueries-desc',
);

$wgExtensionMessagesFiles['SemanticCompoundQueries'] = dirname( __FILE__ ) . '/SemanticCompoundQueries.i18n.php';

$wgHooks['ParserFirstCallInit'][] = 'scqgRegisterParser';
// FIXME: Can be removed when new-style magic words are used (introduced in r52503)
$wgHooks['LanguageGetMagic'][] = 'scqgLanguageGetMagic';

$wgAutoloadClasses['SCQQueryProcessor'] = dirname( __FILE__ ) . '/SCQ_QueryProcessor.php';
$wgAutoloadClasses['SCQQueryResult'] = dirname( __FILE__ ) . '/SCQ_QueryResult.php';

function scqgRegisterParser( Parser &$parser ) {
	$parser->setFunctionHook( 'compound_query', array( 'SCQQueryProcessor', 'doCompoundQuery' ) );
	return true; // always return true, in order not to stop MW's hook processing!
}

// FIXME: Can be removed when new-style magic words are used (introduced in r52503)
function scqgLanguageGetMagic( &$magicWords, $langCode = 'en' ) {
	switch ( $langCode ) {
	default:
		$magicWords['compound_query'] = array ( 0, 'compound_query' );
	}
	return true;
}
