<?php
/**
 * Hooks for ArticleAssessmentPilot
 *
 * @file
 * @ingroup Extensions
 */

class ArticleAssessmentPilotHooks {
	
	protected static $modules = array(
		'ext.articleAssessment' => array(
			'scripts' => 'ext.articleAssessment/ext.articleAssessment.js',
			'styles' => 'ext.articleAssessment/ext.articleAssessment.css',
			'messages' => array(
				'articleassessment',
				'articleassessment-desc',
				'articleassessment-yourfeedback',
				'articleassessment-pleaserate',
				'articleassessment-submit',
				'articleassessment-rating-wellsourced',
				'articleassessment-rating-neutrality',
				'articleassessment-rating-completeness',
				'articleassessment-rating-readability',
				'articleassessment-rating-wellsourced-tooltip',
				'articleassessment-rating-neutrality-tooltip',
				'articleassessment-rating-completeness-tooltip',
				'articleassessment-rating-readability-tooltip',
				'articleassessment-error',
				'articleassessment-thanks',
				'articleassessment-articlerating',
				'articleassessment-featurefeedback',
				'articleassessment-noratings',
				'articleassessment-stalemessage-revisioncount',
				'articleassessment-stalemessage-norevisioncount',
				'articleassessment-results-show',
				'articleassessment-results-hide',
				'articleassessment-survey-title',
				'articleassessment-survey-thanks',
			),
			'dependencies' => array( 'jquery.ui.dialog', 'jquery.tipsy', 'jquery.stars' ),
		),
		'jquery.stars' => array(
			'scripts' => 'jquery.stars/jquery.stars.js',
			'styles' => 'jquery.stars/jquery.stars.css',
		),
	);
	
	/* Static Methods */
	
	/**
	 * LoadExtensionSchemaUpdates hook
	 */
	public static function loadExtensionSchemaUpdates( $updater = null ) {
		if ( $updater === null ) {
			global $wgExtNewTables;
			$wgExtNewTables[] = array(
				'article_assessment',
				dirname( __FILE__ ) . '/ArticleAssessmentPilot.sql'
			);
		} else {
			$updater->addExtensionUpdate( array( 'addTable', 'article_assessment',
				dirname( __FILE__ ) . '/ArticleAssessmentPilot.sql', true ) );
		}
		return true;
	}
	
	/**
	 * ParserTestTables hook
	 */
	public static function parserTestTables( &$tables ) {
		$tables[] = 'article_assessment';
		$tables[] = 'article_assessment_pages';
		$tables[] = 'article_assessment_ratings';
		return true;
	}
	
	/**
	 * BeforePageDisplay hook
	 */
	public static function beforePageDisplay( $out ) {
		global $wgRequest, $wgArticleAssessmentCategories;
		
		$title = $out->getTitle();
		
		// Restrict ratings to... 
		if (
			// Main namespace articles
			$title->getNamespace() == NS_MAIN
			// View pages
			&& $wgRequest->getVal( 'action', 'view' ) == 'view'
			// Current revision
			&& !$wgRequest->getCheck( 'diff' )
			&& !$wgRequest->getCheck( 'oldid' )
			// Articles in valid categories
			&& count( $wgArticleAssessmentCategories )
			&& self::isInCategories( $title->getArticleId(), $wgArticleAssessmentCategories )
		) {
			$out->addModules( 'ext.articleAssessment' );
		}
		return true;
	}
	
	/*
	 * ResourceLoaderRegisterModules hook
	 */
	public static function resourceLoaderRegisterModules( &$resourceLoader ) {
		global $wgExtensionAssetsPath;
		$localpath = dirname( __FILE__ ) . '/modules';
		$remotepath = "$wgExtensionAssetsPath/ArticleAssessmentPilot/modules";
		foreach ( self::$modules as $name => $resources ) {
			$resourceLoader->register(
				$name, new ResourceLoaderFileModule( $resources, $localpath, $remotepath )
			);
		}
		return true;
	}
	
	/* Protected Static Methods */
	
	/**
	 * Returns whether an article is in the specified categories
	 * 
	 * @param $articleId Integer: Article ID
	 * @param $categories Array: List of category names (without Category: prefix, with underscores)
	 * 
	 * @return Boolean: True if article is in one of the values of $categories 
	 */
	protected static function isInCategories( $articleId, $categories ) {
		$dbr = wfGetDB( DB_SLAVE );
		return (bool)$dbr->selectRow( 'categorylinks', '1',
			array(
				'cl_from' => $articleId,
				'cl_to' => $categories,
			),
			__METHOD__
		);
	}
}
