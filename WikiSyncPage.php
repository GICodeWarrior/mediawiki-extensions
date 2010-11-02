<?php
/**
 * ***** BEGIN LICENSE BLOCK *****
 * This file is part of WikiSync.
 *
 * WikiSync is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * WikiSync is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WikiSync; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK *****
 *
 * WikiSync allows an AJAX-based synchronization of revisions and files between
 * global wiki site and it's local mirror.
 *
 * To activate this extension :
 * * Create a new directory named WikiSync into the directory "extensions" of MediaWiki.
 * * Place the files from the extension archive there.
 * * Add this line at the end of your LocalSettings.php file :
 * require_once "$IP/extensions/WikiSync/WikiSync.php";
 *
 * @version 0.2.1
 * @link http://www.mediawiki.org/wiki/Extension:WikiSync
 * @author Dmitriy Sintsov <questpc@rambler.ru>
 * @addtogroup Extensions
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is a part of MediaWiki extension.\n" );
}

class WikiSyncPage extends SpecialPage {

	var $sync_direction_tpl;
	var $remote_login_form_tpl;
	var $remote_log_tpl;
	var $page_tpl;

	var $initUser;

	function initRemoteLoginFormTpl() {
		$remote_wiki_root = _QXML::specialchars( WikiSyncSetup::$remote_wiki_root );
		$remote_wiki_user = _QXML::specialchars( WikiSyncSetup::$remote_wiki_user );
		$js_remote_change = 'return WikiSync.remoteRootChange(this)';
		$js_sync_files = 'return WikiSync.setSyncFiles(this);';
		$this->remote_login_form_tpl =
			array( '__tag'=>'table', 'class'=>'wikisync_remote_login',
				array( '__tag'=>'form', 'id'=>'remote_login_form', 'onsubmit'=>'return WikiSync.submitRemoteLogin(this);',
					array( '__tag'=>'tr',
						array( '__tag'=>'th', 'colspan'=>'2', 'style'=>'text-align:center; ', wfMsgHtml( 'wikisync_login_to_remote_wiki' ) )
					),
					array( '__tag'=>'tr', 'title'=>wfMsgHtml( 'wikisync_remote_wiki_example' ),
						array( '__tag'=>'td', wfMsgHtml( 'wikisync_remote_wiki_root' ) ),
						array( '__tag'=>'td', array( '__tag'=>'input', 'type'=>'text', 'name'=>'remote_wiki_root' , 'value'=>$remote_wiki_root, 'onkeyup'=>$js_remote_change, 'onchange'=>$js_remote_change ) )
					),
					array( '__tag'=>'tr',
						array( '__tag'=>'td', wfMsgHtml( 'wikisync_remote_wiki_user' ) ),
						array( '__tag'=>'td', array( '__tag'=>'input', 'type'=>'text', 'name'=>'remote_wiki_user', 'value'=>$remote_wiki_user ) )
					),
					array( '__tag'=>'tr',
						array( '__tag'=>'td', wfMsgHtml( 'wikisync_remote_wiki_pass' ) ),
						array( '__tag'=>'td', array( '__tag'=>'input', 'type'=>'password', 'name'=>'remote_wiki_pass' ) )
					),
					array( '__tag'=>'tr',
						array( '__tag'=>'td', 'colspan'=>'2', wfMsgHtml( 'wikisync_sync_files' ), array( '__tag'=>'input', 'type'=>'checkbox', 'id'=>'ws_sync_files', 'name'=>'ws_sync_files', 'onchange'=>$js_sync_files, 'onmouseup'=>$js_sync_files, 'checked'=>'' ) )
					),
					array( '__tag'=>'tr',
						array( '__tag'=>'td', array( '__tag'=>'input', 'id'=>'wikisync_synchronization_button', 'type'=>'button', 'value'=>wfMsgHtml( 'wikisync_synchronization_button' ), 'disabled'=>'', 'onclick'=>'return WikiSync.process(\'init\')' ) ),
						array( '__tag'=>'td', 'style'=>'text-align:right; ', array( '__tag'=>'input', 'id'=>'wikisync_submit_button', 'type'=>'submit', 'value'=>wfMsgHtml( 'wikisync_remote_login_button' ) ) )
					)
				)
			);
	}

	function initRemoteLogTpl() {
		$this->remote_log_tpl =
			array( '__tag'=>'table', 'class'=>'wikisync_remote_log',
				array( '__tag'=>'tr',
					array( '__tag'=>'th', 'style'=>'text-align:center; ', wfMsgHtml( 'wikisync_remote_log' ) )
				),
				array( '__tag'=>'tr',
					array( '__tag'=>'td',
						array( '__tag'=>'div', 'id'=>'wikisync_remote_log' )
					)
				),
				array( '__tag'=>'tr',
					array( '__tag'=>'td',
						array( '__tag'=>'input', 'type'=>'button', 'value'=>wfMsgHtml( 'wikisync_clear_log' ), 'onclick'=>'return WikiSync.clearLog()' )
					)
				)
			);
	}

	function initSyncDirectionTpl() {
		global $wgServer, $wgScriptPath;
		$this->sync_direction_tpl =
			array(
				array( '__tag'=>'div', 'style'=>'width:100%; font-weight:bold; text-align:center; ', wfMsgHTML( 'wikisync_direction' ) ),
				array(	'__tag'=>'table', 'style'=>'margin:0 auto 0 auto; ',
					array( '__tag'=>'tr',
						array( '__tag'=>'td', 'style'=>'text-align:right; ', wfMsgHTML( 'wikisync_local_root' ) ),
						array( '__tag'=>'td', 'rowspan'=>'2', 'style'=>'vertical-align:middle; ', array( '__tag'=>'input', 'id'=>'wikisync_direction_button', 'type'=>'button', 'value'=>'&lt;=', 'onclick'=>'return WikiSync.setDirection(this)' ) ),
						array( '__tag'=>'td', wfMsgHTML( 'wikisync_remote_root' ) )
					),
					array( '__tag'=>'tr',
						array( '__tag'=>'td', 'style'=>'text-align:right; ', $wgServer . $wgScriptPath ),
						array( '__tag'=>'td', 'id'=>'wikisync_remote_root', WikiSyncSetup::$remote_wiki_root )
					)
				)
			);
	}

	function initPercentsIndicatorTpl( $id ) {
		return
			array( '__tag'=>'table', 'id'=>$id, 'class'=>'wikisync_percents_indicator', 'style'=>'display: none;',
				array( '__tag'=>'tr',
					// progress explanation hint
					array( '__tag'=>'td', 'style'=>'font-size:9pt; ', 'colspan'=>'2', '' )
				),
				array( '__tag'=>'tr', 'style'=>'border:1px solid gray; ',
					array( '__tag'=>'td', 'style'=>'width:0%; background-color:Gold; display: none; ', '' ),
					array( '__tag'=>'td', 'style'=>'width:100%;', '' )
				)
			);
	}

	function initPageTpl() {
		$this->page_tpl =
			array( '__tag'=>'table',
				array( '__tag'=>'tr',
					array( '__tag'=>'td', 'colspan'=>'2', &$this->sync_direction_tpl )
				),
				array( '__tag'=>'tr',
					array( '__tag'=>'td', 'style'=>'width:50%; ', &$this->remote_log_tpl ),
					array( '__tag'=>'td', 'style'=>'width:50%; ', &$this->remote_login_form_tpl )
				),
				array( '__tag'=>'tr',
					array( '__tag'=>'td', 'colspan'=>'2',
						$this->initPercentsIndicatorTpl( 'wikisync_xml_percents' ),
						$this->initPercentsIndicatorTpl( 'wikisync_files_percents' )
					)
				),
				array( '__tag'=>'tr',
					array( '__tag'=>'td', 'colspan'=>'2', 'id'=>'wikisync_iframe_location' , '' )
				),
				array( '__tag'=>'tr',
					array( '__tag'=>'td', 'colspan'=>'2',
						array( '__tag'=> 'iframe', 'id'=>'wikisync_iframe', 'style' => 'width:100%; height:200px; display:none; ' )
					)
				)
			);
	}

	/*
	 * include stylesheets and scripts; set javascript variables
	 * @param $outputPage - an instance of OutputPage
	 * @param $isRTL - whether the current language is RTL
	 */
	static function headScripts( &$outputPage, $isRTL ) {
		global $wgJsMimeType;
		$outputPage->addLink(
			array( 'rel' => 'stylesheet', 'type' => 'text/css', 'href' => WikiSyncSetup::$ScriptPath . '/WikiSync.css?' . WikiSyncSetup::$version )
		);
		if ( $isRTL ) {
			$outputPage->addLink(
				array( 'rel' => 'stylesheet', 'type' => 'text/css', 'href' => WikiSyncSetup::$ScriptPath . '/WikiSync_rtl.css?' . WikiSyncSetup::$version )
			);
		}
		$outputPage->addScript(
			'<script type="' . $wgJsMimeType . '" src="' . WikiSyncSetup::$ScriptPath . '/WikiSync.js?' . WikiSyncSetup::$version . '"></script>
			<script type="' . $wgJsMimeType . '" src="' . WikiSyncSetup::$ScriptPath . '/WikiSync_Utils.js?' . WikiSyncSetup::$version . '"></script>
			<script type="' . $wgJsMimeType . '">WikiSyncUtils.addEvent(window,"load",WikiSync.onloadHandler);</script>
			<script type="' . $wgJsMimeType . '">
			WikiSync.setLocalNames( ' .
				self::getJsObject( 'wsLocalMessages', 'last_op_error', 'synchronization_confirmation', 'synchronization_success', 'already_synchronized', 'sync_to_itself', 'diff_search', 'revision', 'file_size_mismatch' ) .
			');</script>' . "\n"
		);
	}

	static function getJsObject( $method_name ) {
		$args = func_get_args();
		array_shift( $args ); // remove $method_name from $args
		$result = '{ ';
		$firstElem = true;
		foreach ( $args as &$arg ) {
			if ( $firstElem ) {
				$firstElem = false;
			} else {
				$result .= ', ';
			}
			$result .= $arg . ': "' . Xml::escapeJsString( call_user_func( array( 'self', $method_name ), $arg ) ) . '"';
		}
		$result .= ' }';
		return $result;
	}

	/*
	 * currently passed to Javascript:
	 * localMessages
	 */
	/*
	 * getJsObject callback
	 */
	static private function wsLocalMessages( $arg ) {
		return wfMsg( "wikisync_js_${arg}" );
	}

	function __construct() {
		parent::__construct( 'WikiSync', 'edit' );
		$this->initUser = WikiSyncSetup::initUser();
	}

	function execute( $param ) {
		global $wgOut, $wgContLang;
		global $wgUser;
		# commented out, ignored by FF 3+ anyway
#		$wgOut->enableClientCache( false );
		if ( !$wgUser->isAllowed( 'edit' ) ) {
			$wgOut->permissionRequired('edit');
			return;
		}
		if ( is_string( $this->initUser ) ) {
			# not enough priviledges to run this method
			$wgOut->addHTML( $this->initUser );
			return;
		}
		if ( !$wgUser->isAnon() ) {
			WikiSyncSetup::$remote_wiki_user = $wgUser->getName();
		}
		self::headScripts( $wgOut, $wgContLang->isRTL() );
		$wgOut->setPagetitle( wfMsgHtml( 'wikisync' ) );
		$this->initSyncDirectionTpl();
		$this->initRemoteLoginFormTpl();
		$this->initRemoteLogTpl();
		$this->initPageTpl();
		$wgOut->addHTML( _QXML::toText( $this->page_tpl ) );
	}

} /* end of WikiSyncPage class */
