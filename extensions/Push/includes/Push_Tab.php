<?php

/**
 * Statis class with methods to create and handle the push tab.
 *
 * @since 0.1
 *
 * @file Push_Tab.php
 * @ingroup Push
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

final class PushTab {
	
	/**
	 * Adds an "action" (i.e., a tab) to allow pushing the current article.
	 */
	public static function displayTab( $obj, &$content_actions ) {
		// Make sure that this is not a special page and that the page exists.
		if ( isset( $obj->mTitle ) && $obj->mTitle->getNamespace() != NS_SPECIAL && $obj->mTitle->exists() ) {
			global $wgRequest;
			
			$content_actions['push'] = array(
				'text' => wfMsg( 'push-tab-text' ),
				'class' => $wgRequest->getVal( 'action' ) == 'push' ? 'selected' : '',
				'href' => $obj->mTitle->getLocalURL( 'action=push' )
			);
		}
		
		return true;
	}

	/**
	 * Function currently called only for the 'Vector' skin, added in
	 * MW 1.16 - will possibly be called for additional skins later
	 */
	public static function displayTab2( $obj, &$links ) {
		// The old '$content_actions' array is thankfully just a sub-array of this one
		$views_links = $links['views'];
		self::displayTab( $obj, $views_links );
		$links['views'] = $views_links;
		return true;
	}

	/**
	 * Handle actions not known to MediaWiki. If the action is push,
	 * display the push page by calling the displayPushPage method.
	 *  
	 * @param string $action
	 * @param Article $article
	 * 
	 * @return true
	 */
	public static function onUnknownAction( $action, Article $article ) {
		if ( $action == 'push' ) {
			return self::displayPushPage( $article );
		}
		else {
			return true;
		}
	}
	
	/**
	 * Loads the needed JavaScript.
	 * Takes care of non-RL compatibility.
	 * 
	 * @since 0.1
	 */
	protected static function loadJs() {
		global $wgOut;
		
		// For backward compatibility with MW < 1.17.
		if ( is_callable( array( $wgOut, 'addModules' ) ) ) {
			$wgOut->addModules( 'ext.push.tab' );
		}
		else {
			global $egPushScriptPath;
			
			efPushAddJSLocalisation();
			
			$wgOut->includeJQuery();
			
			$wgOut->addHeadItem(
				'ext.push.tab',
				Html::linkedScript( $egPushScriptPath . '/includes/ext.push.tab.js' )
			);
		}		
	}
	
	/**
	 * The function called if we're in index.php (as opposed to one of the
	 * special pages)
	 * 
	 * @since 0.1
	 */
	public static function displayPushPage( Article $article ) {
		global $wgOut, $wgUser, $wgTitle;
		
		$wgOut->setPageTitle( wfMsgExt( 'push-tab-title', 'parsemag', $article->getTitle()->getText() ) );
		
		self::loadJs();
		
		$wgOut->addHTML(
			Html::hidden( 'pageName', $wgTitle->getFullText(), array( 'id' => 'pageName' ) )
		);
		
		if ( $wgUser->isAllowed( 'push' ) ) {
			self::displayPushList();
		}
		
		if ( $wgUser->isAllowed( 'pushadmin' ) ) {
			// TODO
			//self::displayNewPushItem();
		}
		
		return false;
	}
	
	/**
	 * Displays a list with all targets to which can be pushed.
	 * 
	 * @since 0.1
	 */
	protected static function displayPushList() {
		global $wgOut, $egPushTargets;
		
		$wgOut->addHtml(
			Html::element(
				'h2',
				array(),
				wfMsg( 'push-targets' )
			)
		);
		
		$items = array();
		
		foreach ( $egPushTargets as $name => $url ) {
			$items[] = self::getPushItem( $name, $url );
		}
		
		if ( count( $items ) > 1 ) {
			$items = array_merge( array(
				// TODO: header here
			), $items );
		}
		
		$wgOut->addHtml(
			Html::rawElement(
				'table',
				array( 'width' => '100%' ),
				implode( "\n", $items )
			)
		);		
	}
	
	/**
	 * Returns the HTML for a single push target.
	 * 
	 * @since 0.1
	 * 
	 * @param string $name
	 * @param string $url
	 * 
	 * @return string
	 */
	protected static function getPushItem( $name, $url ) {
		return Html::rawElement(
			'tr',
			array(),
			Html::element(
				'td',
				array(),
				$name
			) .
			Html::rawElement(
				'td',
				array(),
				Html::element(
					'button',
					array(
						'class' => 'push-button',
						'pushtarget' => $url
					),
					wfMsg( 'push-button-text' )
				)
			)
		);
		
		// TODO: add edit and delete stuff
	}
	
	/**
	 * Displays a form via which a new psuh item can be added.
	 * 
	 * @since 0.1
	 */
	protected static function displayNewPushItem() {
		global $wgOut;
		
		$wgOut->addHtml(
			Html::element(
				'h2',
				array(),
				wfMsg( 'push-add-target' )
			)
		);
		
		// TODO
	}
	
}