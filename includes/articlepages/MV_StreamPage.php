<?php
/**
 * MV_StreamPage.php Created on Apr 24, 2007
 *
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http://metavid.org/wiki/Code
 *
 * @author Michael Dale
 * @email dale@ucsc.edu
 * @url http://metavid.org
 */
 // make sure we have the mvStream class (which extends article):
if ( !defined( 'MEDIAWIKI' ) )  die( 1 );

/**
 * process the Metavid page request and creates objects
 *
 * eventually will support users creating their own "views"
 * for now present the default view
 * handle request of the following types:
 *
 *
 * MvStream:stream_name -> pulls up first 20 min of stream_name
 * MvStream:stream_name/ss:ss:ss -> pulls up 5 min starting at ss:ss:ss
 * MvStream:stream_name/ss:ss:ss/ee:ee:ee pulls up requested segment
 * 	@@todo we should limit how much metadata for a given query
 *
 * future:
 *
 * MvStream:stream_name/live if the stream is currently being captured
 * 	show realtime broadcast
 *
 * sequences stored in the sequence namespace:
 * MvSequence:sequence_name
 */

class MV_StreamPage extends Article {
 	var $mvTitle;
 	function __construct( $title, $mvTitle = false ) {
 		if ( $mvTitle )$this->mvTitle = $mvTitle;
 		return parent::__construct( $title );
 	}
 	function newFromArticle( $article ) {
 		$mvTitle = new MV_Title( $article->mTitle );
 		return new MV_StreamPage( $article->mTitle, $mvTitle );
 	}
 	public function view() {
		global $wgRequest, $wgUser, $wgOut;
		// @@TODO fix stream view() for old versions ... will likely have to replicate Article::view()

		// include the metavid headers (for embedding video in the page)

		// copied from CategoryPage ...
		$diff = $wgRequest->getVal( 'diff' );
		$diffOnly = $wgRequest->getBool( 'diffonly', $wgUser->getOption( 'diffonly' ) );
		if ( isset( $diff ) && $diffOnly ) {
			return Article::view();
		}
		$text = $this->getContent();
		$this->outputWikiText( $text );
	}
	function outputWikiText( $text, $cache = true ) {
		wfProfileIn( __METHOD__ );
		$MV_MetavidInterface = new MV_MetavidInterface( 'stream', $this );
		// will require the mv_embed script for video playback:
		//mvfAddHTMLHeader( 'stream_interface' );
		$MV_MetavidInterface->render_full();
		wfProfileOut( __METHOD__ );
	}
	/**
	 * test if this is a base editable request
	 * of type Metavid:streamname
	 */
	function isEditable() {
		// if full title contains no / and no :
		// && its an existing stream than its editable
		if ( strpos( $this->mvTitle->getWikiTitle(), '/' ) !== false )return false;
		if ( strpos( $this->mvTitle->getWikiTitle(), ':' ) !== false )return false;
		// we should have already check if the stream exists
		return true;
	}
 	function viewRequest() {
 		global $wgOut, $wgTitle;
 		// @@TODO figure out a way to be a special page but not be in the special namepsace.
		// namely hide the edit/discussion links and rarely cache
 		$wgTitle->mNamespace = NS_SPECIAL;

 		// do some aditional stream proccessing throw an error if we have a type
 		if ( $this->mvTitle->getMvdTypeKey() != null ) {
 			$page = 'Bad format for Metavid request';
 			return mvOutputSpecialPage( 'bad format for Metavid request',
 			$page );
 		}

 		$title = 'stream view';

 		// $wgOut->setPageTitle( $title );
		// $wgOut->setHTMLTitle( $title );
		$wgOut->setArticleRelated( false );
		$wgOut->enableClientCache( true );

 		$page = 'stream page';
 		$wgOut->addHTML( $page );
		$wgOut->returnToMain( false );

		$wgOut->output();
 	}
 	function delete() {
 		global $wgOut, $wgRequest;
 		if ( !$wgRequest->wasPosted() ) {
 			$wgOut->addHTML( wfMsgExt( 'mv_stream_delete_warrning', 'parsemag',
			 MV_Index::countMVDInRange( $this->mvTitle->getStreamId() ) ) );
 		}
 		// update text button to delete stream rather than delete stream
 		parent::delete();
 	}
}

