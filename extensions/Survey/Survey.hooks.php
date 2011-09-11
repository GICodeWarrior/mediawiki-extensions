<?php

/**
 * Static class for hooks handled by the Survey extension.
 *
 * @since 0.1
 *
 * @file Survey.hooks.php
 * @ingroup Survey
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class SurveyHooks {
	
	/**
	 * Register the survey tag extension when the parser initializes.
	 * 
	 * @since 0.1
	 * 
	 * @param Parser $parser
	 * 
	 * @return true
	 */
	public static function onParserFirstCallInit( Parser &$parser ) {
		$parser->setHook( 'survey', __CLASS__ . '::onSurveyRender' );
		return true;
	}
	
	/**
	 * Render the survey tag.
	 * 
	 * @since 0.1
	 * 
	 * @param mixed $input
	 * @param array $args
	 * @param Parser $parser
	 * @param PPFrame $frame
	 */
	public static function onSurveyRender( $input, array $args, Parser $parser, PPFrame $frame ) {
		$tag = new SurveyTag( $args, $input );
		return $tag->render( $parser );
	}
	
	/**
	 * Schema update to set up the needed database tables.
	 *
	 * @since 0.1
	 *
	 * @param DatabaseUpdater $updater
	 *
	 * @return true
	 */
	public static function onSchemaUpdate( /* DatabaseUpdater */ $updater = null ) {
		global $wgDBtype;

		$updater->addExtensionUpdate( array(
			'addTable',
			'surveys',
			dirname( __FILE__ ) . '/Survey.sql',
			true
		) );
		$updater->addExtensionUpdate( array(
			'addTable',
			'survey_questions',
			dirname( __FILE__ ) . '/Survey.sql',
			true
		) );
		$updater->addExtensionUpdate( array(
			'addTable',
			'survey_submissions',
			dirname( __FILE__ ) . '/Survey.sql',
			true
		) );
		$updater->addExtensionUpdate( array(
			'addTable',
			'survey_answers',
			dirname( __FILE__ ) . '/Survey.sql',
			true
		) );
		$updater->addExtensionUpdate( array(
			'addIndex',
			'surveys',
			'surveys_survey_name',
			dirname( __FILE__ ) . '/sql/Survey_indexSurveyName.sql',
			true
		) );
		$updater->addExtensionUpdate( array(
			'addIndex',
			'survey_answers',
			'answer_question_id',
			dirname( __FILE__ ) . '/sql/Survey_indexQuestionId.sql',
			true
		) );
		$updater->addExtensionUpdate( array(
			'addIndex',
			'survey_answers',
			'answer_submission_id',
			dirname( __FILE__ ) . '/sql/Survey_indexSubmissionId.sql',
			true
		) );

		return true;
	}
	
	/**
	 * Hook to add PHPUnit test cases.
	 * 
	 * @since 0.1
	 * 
	 * @param array $files
	 */
	public static function registerUnitTests( array &$files ) {
		$testDir = dirname( __FILE__ ) . '/test/';
		
		$files[] = $testDir . 'SurveyQuestionTest.php';
		
		return true;
	}
	
	/**
	 * Hook to insert things into article headers.
	 *
	 * @since 0.1
	 *
	 * @param Article &$article
	 * @param boolean $outputDone
	 * @param boolean $useParserCache
	 *
	 * @return true
	 */
	public static function onArticleViewHeader( Article &$article, &$outputDone, &$useParserCache ) {
		if ( !Survey::has( array( 'enabled' => 1 ) ) ) {
			return true;
		}
		
		$surveys = Survey::select(
			array(
				'id', 'namespaces'
			),
			array(
				'enabled' => 1,
				'user_type' => Survey::getTypesForUser( $GLOBALS['wgUser'] )
			)
		);
		
		foreach ( $surveys as /* Survey */ $survey ) {
			
			if ( count( $survey->getField( 'namespaces' ) ) == 0 ) {
				$nsValid = true;
			}
			else {
				$nsValid = in_array( $article->getTitle()->getNamespace(), $survey->getField( 'namespaces' ) );
			}
			
			if ( $nsValid ) {
				$GLOBALS['wgOut']->addWikiText( Xml::element( 
					'survey',
					array(
						'id' => $survey->getId()
					)
				) );
			}
		}
		
		return true;
	}
	
}
