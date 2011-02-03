<?php

/**
 * CLass to render the sub page list.
 * 
 * @since 0.1
 * 
 * @file SubPageList.class.php
 * @ingroup IncludeWP
 * 
 * @licence GNU GPL v3 or later
 *
 * @author Jeroen De Dauw
 * @author James McCormack (email: user "qedoc" at hotmail); preceding version Martin Schallnahs <myself@schaelle.de>, original Rob Church <robchur@gmail.com>
 * @copyright © 2008 James McCormack, preceding version Martin Schallnahs, original Rob Church
 */
final class IncludeWP extends ParserHook {
	
	/**
	 * No LST in pre-5.3 PHP *sigh*.
	 * This is to be refactored as soon as php >=5.3 becomes acceptable.
	 */
	public static function staticMagic( array &$magicWords, $langCode ) {
		$className = __CLASS__;
		$instance = new $className();
		return $instance->magic( $magicWords, $langCode );
	}
	
	/**
	 * No LST in pre-5.3 PHP *sigh*.
	 * This is to be refactored as soon as php >=5.3 becomes acceptable.
	 */	
	public static function staticInit( Parser &$wgParser ) {
		$className = __CLASS__;
		$instance = new $className();
		return $instance->init( $wgParser );
	}

	/**
	 * Gets the name of the parser hook.
	 * @see ParserHook::getName
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	protected function getName() {
		return array( 'include' );
	}
	
	/**
	 * Returns an array containing the parameter info.
	 * @see ParserHook::getParameterInfo
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected function getParameterInfo( $type ) {
		$params = array();
		
		$params['page'] = new Parameter( 'page' );
		$params['page']->setDescription( wfMsg( 'includewp-include-par-page' ) );
		
		return $params;
	}
	
	/**
	 * Returns the list of default parameters.
	 * @see ParserHook::getDefaultParameters
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected function getDefaultParameters( $type ) {
		return array( 'page' );
	}
	
	/**
	 * Renders and returns the output.
	 * @see ParserHook::render
	 * 
	 * @since 0.1
	 * 
	 * @param array $parameters
	 * 
	 * @return string
	 */
	public function render( array $parameters ) {
		static $nr = 0;
		$nr++;
		
		$this->loadJs();
		
		$html = Html::element(
			'div',
			array(
				'id' => 'includewp-loading-' . $nr,
				'pageid' => $nr,
				'class' => 'includewp-loading',
				'page' => $parameters['page'],
				'wiki' => 'http://en.wikipedia.org/w' // TODO
			),
			wfMsgForContent( 'includewp-loading-page' )
		);
		
		$html .= Html::element(
			'div',
			array(
				'id' => 'includewp-article-' . $nr,
				'class' => 'includewp-article',
			),
			''
		);	

		$html .= Html::element(
			'div',
			array(
				'id' => 'includewp-copyright-' . $nr,
				'class' => 'includewp-copyright',
				'style' => 'color:darkgray'
			),
			''
		);			
		
		return $html;
	}
	
	/**
	 * Loads the needed JavaScript.
	 * Takes care of non-RL compatibility.
	 * 
	 * @since 0.1
	 */
	protected function loadJs() {
		static $loadedJs = false;
		
		if ( $loadedJs ) {
			return;
		}
		
		$loadedJs = true;
		
		// For backward compatibility with MW < 1.17.
		if ( is_callable( array( $this->parser->getOutput(), 'addModules' ) ) ) {
			$this->parser->getOutput()->addModules( 'ext.incwp' );
		}
		else {
			global $egIncWPScriptPath;
			
			$this->addJSLocalisation();
			
			$this->parser->getOutput()->includeJQuery();
			
			$this->parser->getOutput()->addHeadItem(
				'ext.incwp',
				Html::linkedScript( $egIncWPScriptPath . '/ext.incwp.js' )
			);
		}		
	}	
	
	/**
	 * Adds the needed JS messages to the page output.
	 * This is for backward compatibility with pre-RL MediaWiki.
	 * 
	 * @since 0.1
	 */
	protected function addJSLocalisation() {
		global $egIncWPJSMessages;
		
		$data = array();
	
		foreach ( $egIncWPJSMessages as $msg ) {
			$data[$msg] = wfMsgNoTrans( $msg );
		}

		$this->parser->getOutput()->addHeadItem( Html::inlineScript( 'var wgIncWPMessages = ' . json_encode( $data ) . ';' ) );
	}
	
	/**
	 * Returns the parser function otpions.
	 * @see ParserHook::getFunctionOptions
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected function getFunctionOptions() {
		return array(
			'noparse' => true,
			'isHTML' => true
		);
	}
	
	/**
	 * @see ParserHook::getDescription()
	 * 
	 * @since 0.1
	 */
	public function getDescription() {
		return wfMsg( 'includewp-parserhook-desc' );
	}		
	
}
