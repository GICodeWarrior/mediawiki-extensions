<?php
/*
 * MV_DataPage.php Created on Apr 24, 2007
 *
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http://metavid.org/wiki/Code
 * 
 * @author Michael Dale
 * @email dale@ucsc.edu
 * @url http://metavid.org
 */
 if ( !defined( 'MEDIAWIKI' ) )  die( 1 );
 
 class MV_DataPage extends Article {
 	function __construct( $title, & $mvTitle = false ) {
 		if ( $mvTitle )$this->mvTitle = $mvTitle;
 		parent::__construct( $title );
 	}
 	public function view() {
		global $wgRequest, $wgUser, $wgOut;
			
		// copied from CategoryPage ...
		$diff = $wgRequest->getVal( 'diff' );
		$diffOnly = $wgRequest->getBool( 'diffonly', $wgUser->getOption( 'diffonly' ) );
		if ( isset( $diff ) || $diffOnly ) {
			return Article::view();
		}
		// include the metavid headers (for embedding video in the page) 		
		$wgOut->setPageTitle( $this->mvTitle->getTitleDesc() );
		$wgOut->addHTML( $this->mvArticleTop() );
		Article::view();
		$wgOut->addHTML( $this->mvArticleBot() );
	}
	/*ui entry point for delete (similar to article.php delete)*/
	function delete() {
		global $wgUser, $wgOut, $wgRequest;
		$confirm = $wgRequest->wasPosted() &&
			$wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) );
		$reason = $wgRequest->getText( 'wpReason' );

		# This code desperately needs to be totally rewritten

		# Check permissions
		$permission_errors = $this->mTitle->getUserPermissionsErrors( 'mv_delete_mvd', $wgUser );

		if ( count( $permission_errors ) > 0 )
		{
			$wgOut->showPermissionsErrorPage( $permission_errors );
			return;
		}

		$wgOut->setPagetitle( wfMsg( 'confirmdelete' ) );

		# Better double-check that it hasn't been deleted yet!
		$dbw = wfGetDB( DB_MASTER );
		$conds = $this->mTitle->pageCond();
		$latest = $dbw->selectField( 'page', 'page_latest', $conds, __METHOD__ );
		if ( $latest === false ) {
			$wgOut->showFatalError( wfMsg( 'cannotdelete' ) );
			return;
		}

		if ( $confirm ) {
			$this->doDelete( $reason );
			if ( $wgRequest->getCheck( 'wpWatch' ) ) {
				WatchAction::doWatch( $this->mTitle, $wgUser );
			} elseif ( $this->mTitle->userIsWatching() ) {
				WatchAction::doUnwatch( $this->mTitle, $wgUser );
			}
			return;
		}

		// Generate deletion reason
		$hasHistory = false;
		$reason = $this->generateReason( $hasHistory );

		// If the page has a history, insert a warning
		if ( $hasHistory && !$confirm ) {
			$skin = $wgUser->getSkin();
			$wgOut->addHTML( '<strong>' . wfMsg( 'historywarning' ) . ' ' . $skin->historyLink() . '</strong>' );
		}
		
		return $this->confirmDelete( '', $reason );
	}
	/*
	 * function article top 
	 * @return MV dataPage top html
	 */
	function mvArticleTop() {
		global $mvgIP, $wgUser;
		$sk = $wgUser->getSkin();
		
		$streamTitle = Title::makeTitle( MV_NS_STREAM, $this->mvTitle->getStreamNameText() );
		$streamLink = $sk->makeLinkObj( $streamTitle, htmlspecialchars( $this->mvTitle->getStreamNameText() ) );
		
		$typeTitle = Title::makeTitle( NS_MEDIAWIKI_TALK, $this->mvTitle->getMvdTypeKey() );
		$typeLink = $sk->makeLinkObj( $typeTitle, wfMsgHtml( $this->mvTitle->getMvdTypeKey() ) );
		
		// print_r($this->mvTitle); 
		// do mvIndex query to get near stream count:
		// $MV_Index = new MvIndex($this->mvTitle);

		// get the count of near by metadata (-1 as to not count the current) 
		// $nearCount = ($MvIndex->getNearCount() - 1);

		$nearTitle = Title::makeTitle( MV_NS_STREAM, $this->mvTitle->getStreamName()
			. '/' . $this->mvTitle->getTimeRequest() );
		$nearLinkTxt = $this->mvTitle->getTimeDesc();
		// force a known link for time queries in the metavid namespace:
		$nearLink = $sk->makeKnownLinkObj( $nearTitle, htmlspecialchars( $nearLinkTxt ) );
		
		$html = wfMsg( 'mv_mvd_linkback',  $streamLink, $nearLink, $typeLink );
			
		# two table layout for embed video 
		# (@@todo use div class skin approach)	
		// out embed code				
		// $html.=$this->mvTitle->getEmbedHTML();

		// load stream files: 		
		$html .= '<span style="float:left;margin:5px;">';
		$html .= $this->mvTitle->getEmbedVideoHtml();
		$html .= '</span>';
		return $html;
	}
	
	/*
	 * function article_bottom 
	 * @return MV dataPage lower html 
	 */
	function mvArticleBot() {
		return '</td></tr></table>';
	}
 }
 
 class MV_EditDataPage extends EditPage {
 	function getPreviewText() {
 		// enable embed video: (disabled) 
 		//mvfAddHTMLHeader( 'embed' );
 		$html = '';
 		$html .= '<span style="float:left;margin:10px;">';
		$html .= $this->mArticle->mvTitle->getEmbedVideoHtml();
		$html .= '</span>';
 		return $html . parent::getPreviewText();
 	}
 }
