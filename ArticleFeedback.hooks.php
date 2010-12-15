<?php
/**
 * Hooks for ArticleFeedback
 *
 * @file
 * @ingroup Extensions
 */

class ArticleFeedbackHooks {
	
	protected static $modules = array(
		'ext.articleFeedback' => array(
			'scripts' => 'ext.articleFeedback/ext.articleFeedback.js',
			'styles' => 'ext.articleFeedback/ext.articleFeedback.css',
			'messages' => array(
				'articlefeedback-form-switch-label',
				'articlefeedback-form-panel-title',
				'articlefeedback-form-panel-instructions',
				'articlefeedback-form-panel-submit',
				'articlefeedback-report-switch-label',
				'articlefeedback-report-panel-title',
				'articlefeedback-report-panel-description',
				'articlefeedback-report-empty',
				'articlefeedback-report-ratings',
				'articlefeedback-field-wellsourced-label',
				'articlefeedback-field-wellsourced-tip',
				'articlefeedback-field-complete-label',
				'articlefeedback-field-complete-tip',
				'articlefeedback-field-neutral-label',
				'articlefeedback-field-neutral-tip',
				'articlefeedback-field-readable-label',
				'articlefeedback-field-readable-tip',
			),
			'dependencies' => array(
				'jquery.tipsy',
				'jquery.localize',
				'jquery.ui.dialog',
				'jquery.ui.button',
			),
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
				'article_feedback',
				dirname( __FILE__ ) . '/sql/ArticleFeedback.sql'
			);
		} else {
			$dir = dirname( __FILE__ );
			$db = $updater->getDB();

			if ( !$db->tableExists( 'article_feedback' ) ) {
				if ( $db->tableExists( 'article_assessment' ) ) {
					$updater->addExtensionUpdate( array( 'addTable', 'article_feedback',
						$dir . '/sql/RenameTables.sql', true ) ); // Rename tables
				} else {
					$updater->addExtensionUpdate( array( 'addTable', 'article_feedback',
						$dir . '/sql/ArticleFeedback.sql', true ) ); // Initial install tables
				}
			}

			if ( !$db->fieldExists( 'article_feedback', 'aa_design_bucket', __METHOD__ ) ) {
				$updater->addExtensionUpdate( array( 'addField', 'article_feedback', 'aa_design_bucket',
						$dir . '/sql/AddRatingBucket.sql', true ) );
			}
		}
		return true;
	}
	
	/**
	 * ParserTestTables hook
	 */
	public static function parserTestTables( &$tables ) {
		$tables[] = 'article_feedback';
		$tables[] = 'article_feedback_pages';
		$tables[] = 'article_feedback_ratings';
		return true;
	}
	
	/**
	 * BeforePageDisplay hook
	 */
	public static function beforePageDisplay( $out ) {
		global $wgRequest, $wgArticleFeedbackCategories;
		
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
			&& count( $wgArticleFeedbackCategories )
			&& self::isInCategories( $title->getArticleId(), $wgArticleFeedbackCategories )
		) {
			$out->addModules( 'ext.articleFeedback' );
		}
		return true;
	}
	
	/*
	 * ResourceLoaderRegisterModules hook
	 */
	public static function resourceLoaderRegisterModules( &$resourceLoader ) {
		global $wgExtensionAssetsPath;
		$localpath = dirname( __FILE__ ) . '/modules';
		$remotepath = "$wgExtensionAssetsPath/ArticleFeedback/modules";
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
