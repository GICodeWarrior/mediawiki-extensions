<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	exit( 1 );
}

class TableDisplay {
	public static function ParserFunctionInit( &$parser ) {
		$parser->setFunctionHook( 'AssessmentStats', 'TableDisplay::AssessmentStatsRender' );
		return true;
	}

	public static function LanguageGetMagic( &$magicWords, $langCode ) {
		$magicWords['AssessmentStats'] = array( 0, 'AssessmentStats' );
		return true;
	}	

	public static function AssessmentStatsRender( $parser, $project ) {
		$projectStats = Statistics::getProjectStats( $project );
		$output = print_r( $projectStats, true );
		return $output;
	}
}
