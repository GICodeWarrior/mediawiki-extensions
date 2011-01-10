<?php

/**
 * API module to get special translations stored by the Live Translate extension.
 *
 * @since 0.4
 *
 * @file ApiImportTranslationMemories.php
 * @ingroup LiveTranslate
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiImportTranslationMemories extends ApiBase {
	
	public function __construct( $main, $action ) {
		parent::__construct( $main, $action );
	}
	
	public function execute() {
		$params = $this->extractRequestParams();
		
		// In MW 1.17 and above ApiBase::PARAM_REQUIRED can be used, this is for b/c with 1.16.
		foreach ( array( 'source', 'type' ) as $requiredParam ) {
			if ( !isset( $params[$requiredParam] ) ) {
				$this->dieUsageMsg( array( 'missingparam', $requiredParam ) );
			}			
		}
		
		if ( count( $params['source'] ) != count( $params['type'] ) ) {
			$this->dieUsage( wfMsg( 'livetranslate-importtms-param-miscmatch' ) );
		}

		foreach ( $params['source'] as $location ) {
			$type = array_shift( $params['type'] );
			
			$tm = false;
			
			switch ( $type ) {
				case TMT_LTF :
					$title = Title::newFromText( $location, NS_MAIN );
					
					if ( is_object( $title ) && $title->exists() ) {
						$article = new Article( $title );
						$parser = new LTLTFParser();
						$tm = $parser->parse( $article->getContent() );
					}
					
					break;
				case TMT_TMX :
					$parser = new LTTMXParser();
					break;
				case TMT_GCSV :
					$parser = new LTGCSVParser();
					break;
			}
			
			if ( $tm !== false ) {
				$this->doTMImport( $tm );
			}
		}
	}
	
	protected function doTMImport( LTTranslationMemory $tm ) {
		$dbw = wfGetDB( DB_MASTER );
		
		// TODO: move
		$dbw->query( 'TRUNCATE TABLE ' . $dbw->tableName( 'live_translate' ) );

		$wordId = 0;
		
		foreach ( $tm->getTranslationUnits() as $tu ) {
			foreach ( $tu->getVariants() as $language => $translations ) {
				$primary = 1;
				
				foreach ( $translations as $translation ) {
					$dbw->insert(
						'live_translate',
						array(
							'word_id' => $wordId,
							'word_language' => $language,
							'word_translation' => $translation,
							'word_primary' => $primary
						)
					);

					$primary = 0;
				}
				
				$wordId++;
			}
		}		
	}

	public function getAllowedParams() {
		return array(
			'source' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_ISMULTI => true,
				//ApiBase::PARAM_REQUIRED => true,
			),
			'type' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_ISMULTI => true,
				//ApiBase::PARAM_REQUIRED => true,
			),
		);
	}
	
	public function getParamDescription() {
		return array(
			'source' => 'Location of the translation memory. Multiple sources can be provided using the | delimiter.',
			'type' => 'Type of the translation memory. Multiple types can be provided using the | delimiter.',
		);
	}
	
	public function getDescription() {
		return array(
			'Imports one or more translation memories.'
		);
	}
		
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'missingparam', 'source' ),
			array( 'missingparam', 'type' ),
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=importtms&source=http://localhost/tmx.xml&type=1',
			'api.php?action=importtms&source=http://localhost/tmx.xml|http://localhost/google.csv&type=1|2',
		);
	}	
	
	public function getVersion() {
		return __CLASS__ . ': $Id: ApiLiveTranslate.php 78734 2010-12-21 20:29:41Z jeroendedauw $';
	}		
	
}