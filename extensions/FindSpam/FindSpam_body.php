<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "FindSpam extension\n";
	exit( 1 );
}

class FindSpamPage extends SpecialPage {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'FindSpam'/*class*/, 'findspam'/*restriction*/ );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page
	 */
	public function execute( $par ) {
		global $wgRequest, $wgOut, $wgLocalDatabases, $wgUser;
		global $wgConf, $wgLang;

		$this->setHeaders();

		# Check permissions
		if( !$wgUser->isAllowed( 'findspam' ) ) {
			$wgOut->permissionRequired( 'findspam' );
			return;
		}

		$ip = $wgRequest->getText( 'ip' );

		# Show form
		$form  = Xml::openElement( 'form', array( 'method' => 'post', 'action' => $this->getTitle()->getLocalUrl() ) );
		$form .= '<table><tr><td align="right">' . wfMsgHtml( 'findspam-ip' ) . '</td>';
		$form .= '<td>' . Xml::input( 'ip', 50, $ip ) . '</td></tr>';
		$form .= '<tr><td></td><td>' . Xml::submitButton( wfMsg( 'findspam-ok' ) ) . '</td></tr></table></form>';
		$wgOut->addHTML( $form );

		if ( $ip ) {
			$dbr = wfGetDB( DB_SLAVE );
			$s = '';

			foreach ( $wgLocalDatabases as $db ) {
				$sql = "SELECT rc_namespace,rc_title,rc_timestamp,rc_user_text,rc_last_oldid FROM $db.recentchanges WHERE rc_ip='" . $dbr->strencode( $ip ) .
				  "' AND rc_this_oldid=0";
				$res = $dbr->query( $sql, __METHOD__ );
				list( $site, $lang ) = $wgConf->siteFromDB( $db );
				if ( $lang == 'meta' ) {
					$baseUrl = "http://meta.wikimedia.org";
				} else {
					$baseUrl = "http://$lang.$site.org";
				}

				if ( $dbr->numRows( $res ) ) {
					$s .= "\n$db\n";
					while ( $row = $dbr->fetchObject( $res ) ) {

						if ( $row->rc_namespace == 0 ){
							$title = $row->rc_title;
						} else {
							$title = MWNamespace::getCanonicalName( $row->rc_namespace ) . ':' .$row->rc_title;
						}
						$encTitle = urlencode( $title );
						$url = "$baseUrl/wiki/$encTitle";
						$user = urlencode( $row->rc_user_text );
						#$rollbackText = wfMsg( 'rollback' );
						$diffText = wfMsg( 'diff' );
						#$rollbackUrl = "$baseUrl/w/index.php?title=$encTitle&action=rollback&from=$user";
						$diffUrl = "$baseUrl/w/index.php?title=$encTitle&diff=0&oldid=0";
						if ( $row->rc_last_oldid ) {
							$lastLink = "[$baseUrl/w/index.php?title=$encTitle&oldid={$row->rc_last_oldid}&action=edit last]";
						}

						$date = $wgLang->timeanddate( $row->rc_timestamp );
						#$s .= "* $date [$url $title] ([$rollbackUrl $rollbackText] | [$diffUrl $diffText])\n";
						$s .= "* $date [$url $title] ($lastLink | [$diffUrl $diffText])\n";
					}
				}
			}
			if ( $s == '' ) {
				$s = wfMsg( 'findspam-notextfound' );
			}
			$wgOut->addWikiText( $s.'<br />' );
		}
	}
}
