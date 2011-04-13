<?php
/**
 * Hooks for ArticleFeedback
 *
 * @file
 * @ingroup Extensions
 */

class ArticleFeedbackHooks {
	
	protected static $modules = array(
		'ext.articleFeedback.startup' => array(
			'scripts' => 'ext.articleFeedback/ext.articleFeedback.startup.js',
			'dependencies' => array(
				'mediawiki.util',
			),
		),
		'ext.articleFeedback' => array(
			'scripts' => 'ext.articleFeedback/ext.articleFeedback.js',
			'styles' => 'ext.articleFeedback/ext.articleFeedback.css',
			'messages' => array(
				'articlefeedback-field-trustworthy-label',
				'articlefeedback-field-trustworthy-tip',
				'articlefeedback-field-complete-label',
				'articlefeedback-field-complete-tip',
				'articlefeedback-field-objective-label',
				'articlefeedback-field-objective-tip',
				'articlefeedback-field-wellwritten-label',
				'articlefeedback-field-wellwritten-tip',
				'articlefeedback-pitch-reject',
				'articlefeedback-pitch-or',
				'articlefeedback-pitch-thanks',
				'articlefeedback-pitch-survey-message',
				'articlefeedback-pitch-survey-body',
				'articlefeedback-pitch-survey-accept',
				'articlefeedback-pitch-join-message',
				'articlefeedback-pitch-join-body',
				'articlefeedback-pitch-join-accept',
				'articlefeedback-pitch-join-login',
				'articlefeedback-pitch-edit-message',
				'articlefeedback-pitch-edit-body',
				'articlefeedback-pitch-edit-accept',
				'articlefeedback-survey-title',
				'articlefeedback-survey-message-success',
			    'articlefeedback-survey-message-error',
			),
			'dependencies' => array(
				'jquery.ui.dialog',
				'jquery.ui.button',
				'jquery.articleFeedback',
				'jquery.cookie',
			),
		),
		'jquery.articleFeedback' => array(
			'scripts' => 'jquery.articleFeedback/jquery.articleFeedback.js',
			'styles' => 'jquery.articleFeedback/jquery.articleFeedback.css',
			'messages' => array(
				'articlefeedback-error',
				'articlefeedback-form-switch-label',
				'articlefeedback-form-panel-title',
				'articlefeedback-form-panel-instructions',
				'articlefeedback-form-panel-clear',
				'articlefeedback-form-panel-expertise',
				'articlefeedback-form-panel-expertise-studies',
				'articlefeedback-form-panel-expertise-profession',
				'articlefeedback-form-panel-expertise-hobby',
				'articlefeedback-form-panel-expertise-other',
				'articlefeedback-form-panel-submit',
				'articlefeedback-form-panel-success',
				'articlefeedback-form-panel-expiry-title',
				'articlefeedback-form-panel-expiry-message',
				'articlefeedback-report-switch-label',
				'articlefeedback-report-panel-title',
				'articlefeedback-report-panel-description',
				'articlefeedback-report-empty',
				'articlefeedback-report-ratings',
			),
			'dependencies' => array(
				'jquery.tipsy',
				'jquery.localize',
				'jquery.ui.dialog',
				'jquery.ui.button',
				'jquery.cookie',
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
				// Rename tables
				if ( $db->tableExists( 'article_assessment' ) ) {
					$updater->addExtensionUpdate( array(
						'addTable',
						'article_feedback',
						$dir . '/sql/RenameTables.sql',
						true
					) );
				} else {
					// Initial install tables
					$updater->addExtensionUpdate( array(
						'addTable',
						'article_feedback',
						$dir . '/sql/ArticleFeedback.sql',
						true
					) );
				}
			}
			if ( !$db->fieldExists( 'article_feedback', 'aa_design_bucket', __METHOD__ ) ) {
				$updater->addExtensionUpdate( array(
					'addField',
					'article_feedback',
					'aa_design_bucket',
					$dir . '/sql/AddRatingBucket.sql',
					true
				) );
			}
			if ( !$db->fieldExists( 'article_feedback_properties', 'afp_value_text', __METHOD__ ) ) {
				$updater->addExtensionUpdate( array(
					'addField',
					'article_feedback_properties',
					'afp_value_text',
					$dir . '/sql/AddPropertiesValueText.sql',
					true
				) );
			}
			$updater->addExtensionUpdate( array(
				'addTable',
				'article_feedback_properties',
				$dir . '/sql/AddPropertiesTable.sql',
				true
			) );
			$updater->addExtensionUpdate( array(
				'applyPatch',
				$dir . '/sql/FixAnonTokenSchema.sql',
				true
			) );
			$updater->addExtensionUpdate( array(
				'applyPatch',
				$dir . '/sql/FixPropertiesAnonTokenSchema.sql',
				true
			) );
			$updater->addExtensionUpdate( array(
				'addTable',
				'article_feedback_revisions',
				$dir . '/sql/AddRevisionsTable.sql',
				true
			) );
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
		$out->addModules( 'ext.articleFeedback.startup' );
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
	
	/*
	 * ResourceLoaderGetConfigVars hook
	 */
	public static function resourceLoaderGetConfigVars( &$vars ) {
		global $wgArticleFeedbackCategories,
			$wgArticleFeedbackLotteryOdds,
			$wgArticleFeedbackTrackingVersion;
		$vars['wgArticleFeedbackCategories'] = $wgArticleFeedbackCategories;
		$vars['wgArticleFeedbackLotteryOdds'] = $wgArticleFeedbackLotteryOdds;
		$vars['wgArticleFeedbackTrackingVersion'] = $wgArticleFeedbackTrackingVersion;
		return true;
	}
}
