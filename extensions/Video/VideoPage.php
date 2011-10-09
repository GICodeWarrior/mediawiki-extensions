<?php

class VideoPage extends Article {

	var $title = null;

	/**
	 * Constructor and clear the article
	 * @param $title Object: reference to a Title object.
	 */
	public function __construct( $title ) {
		parent::__construct( $title );
	}

	/**
	 * Called on every video page view.
	 */
	public function view() {
		global $wgOut, $wgUser, $wgRequest;

		$this->video = new Video( $this->getTitle() );

		$videoLinksHTML = '<br />' . Xml::element( 'h2',
			array( 'id' => 'filelinks' ), wfMsg( 'video-links' ) ) . "\n";
		$sk = $wgUser->getSkin();

		// No need to display noarticletext, we use our own message
		if ( $this->getID() ) {
			parent::view();
		} else {
			// Just need to set the right headers
			$wgOut->setArticleFlag( true );
			$wgOut->setRobotPolicy( 'index,follow' );
			$wgOut->setPageTitle( $this->mTitle->getPrefixedText() );
		}

		if( $this->video->exists() ) {
			// Display flash video
			$wgOut->addHTML( $this->video->getEmbedCode() );

			// Force embed this code to have width of 300
			$this->video->setWidth( 300 ); 
			$wgOut->addHTML( $this->getEmbedThisTag() );

			$this->videoHistory();

			//$wgOut->addHTML( $videoLinksHTML );
			//$this->videoLinks();
		} else {
			// Video doesn't exist, so give a link allowing user to add one with this name
			$title = SpecialPage::getTitleFor( 'AddVideo' );
			$link = $sk->linkKnown(
				$title,
				wfMsgHtml( 'video-novideo-linktext' ),
				array(),
				array( 'wpTitle' => $this->video->getName() )
			);
			$wgOut->addHTML( wfMsgWikiHtml( 'video-novideo', $link ) );

			//$wgOut->addHTML( $videoLinksHTML );
			//$this->videoLinks();
			$this->viewUpdates();
		}
	}

	/**
	 * Display pages linking to that video on the video page.
	 *
	 * @todo FIXME: this does not work at the moment; there are no NS_VIDEO
	 *              entries in the pagelinks table. I think it is because the
	 *              [[Video:Foo]] links are not links per se, but they just
	 *              look like links to the end-user; to MediaWiki, they are
	 *              parser hooks, like <video name="Foo" />...how to fix this?
	 */
	function videoLinks() {
		global $wgOut, $wgUser;

		$limit = 100;

		$dbr = wfGetDB( DB_SLAVE );

		// WikiaVideo used the imagelinks table here because that extension
		// adds everything into core (archive, filearchive, imagelinks, etc.)
		// tables instead of using its own tables
		$res = $dbr->select(
			array( 'pagelinks', 'page' ),
			array( 'page_namespace', 'page_title' ),
			array(
				'pl_namespace' => NS_VIDEO,
				'pl_title' => $this->getTitle()->getDBkey(),
				'pl_from = page_id',
			),
			__METHOD__,
			array( 'LIMIT' => $limit + 1 )
		);

		$count = $dbr->numRows( $res );

		if ( $count == 0 ) {
			$wgOut->addHTML( '<div id="mw-imagepage-nolinkstoimage">' . "\n" );
			$wgOut->addWikiMsg( 'video-no-links-to-video' );
			$wgOut->addHTML( "</div>\n" );
			return;
		}

		$wgOut->addHTML( '<div id="mw-imagepage-section-linkstoimage">' . "\n" );
		$wgOut->addWikiMsg( 'video-links-to-video', $count );
		$wgOut->addHTML( '<ul class="mw-imagepage-linktoimage">' . "\n" );

		$sk = $wgUser->getSkin();
		$count = 0;
		while ( $s = $res->fetchObject() ) {
			$count++;
			if ( $count <= $limit ) {
				// We have not yet reached the extra one that tells us there is
				// more to fetch
				$name = Title::makeTitle( $s->page_namespace, $s->page_title );
				$link = $sk->makeKnownLinkObj( $name, '' );
				$wgOut->addHTML( "<li>{$link}</li>\n" );
			}
		}
		$wgOut->addHTML( "</ul></div>\n" );
		$res->free();

		// Add a link to [[Special:WhatLinksHere]]
		if ( $count > $limit ) {
			$wgOut->addWikiMsg(
				'video-more-links-to-video',
				$this->mTitle->getPrefixedDBkey()
			);
		}
	}

	/** @todo FIXME: is this needed? If not, remove! */
	function getContent() {
		return Article::getContent();
	}

	/**
	 * Get the HTML table that contains the code for embedding the current
	 * video on a wiki page.
	 *
	 * @return String: HTML
	 */
	public function getEmbedThisTag() {
		$code = $this->video->getEmbedThisCode();
		$code = preg_replace( '/[\n\r\t]/', '', $code ); // replace any non-space whitespace with a space
		$code = str_replace( '_', ' ', $code ); // replace underscores with spaces
		return '<br /><br />
		<table cellpadding="0" cellspacing="2" border="0">
			<tr>
				<td>
					<b>' . wfMsg( 'video-embed' ) . '</b>
				</td>
				<td>
				<form name="embed_video" action="">
					<input name="embed_code" style="width: 300px; font-size: 10px;" type="text" value="' . $code . '" onclick="javascript:document.embed_video.embed_code.focus();document.embed_video.embed_code.select();" readonly="readonly" />
				</form>
				</td>
			</tr>
		</table>';
	}

	/**
	 * If the page we've just displayed is in the "Video" namespace,
	 * we follow it with an upload history of the video and its usage.
	 */
	function videoHistory() {
		global $wgUser, $wgOut;

		$sk = $wgUser->getSkin();

		$line = $this->video->nextHistoryLine();

		if ( $line ) {
			$list = new VideoHistoryList( $sk );
			$s = $list->beginVideoHistoryList() .
				$list->videoHistoryLine(
					true,
					wfTimestamp( TS_MW, $line->video_timestamp ),
					$this->mTitle->getDBkey(),
					$line->video_user_id,
					$line->video_user_name,
					strip_tags( $line->video_url ),
					$line->video_type
				);

			while ( $line = $this->video->nextHistoryLine() ) {
				$s .= $list->videoHistoryLine( false, $line->video_timestamp,
			  		$line->ov_archive_name, $line->video_user_id,
			  		$line->video_user_name, strip_tags( $line->video_url ), $line->video_type
				);
			}
			$s .= $list->endVideoHistoryList();
		} else {
			$s = '';
		}
		$wgOut->addHTML( $s );

		// Exist check because we don't want to show this on pages where a video
		// doesn't exist along with the novideo message, that would suck.
		if( $this->video->exists() ) {
			$this->uploadLinksBox();
		}
	}

	/**
	 * Print out the reupload link at the bottom of a video page for privileged
	 * users.
	 */
	function uploadLinksBox() {
		global $wgUser, $wgOut;

		$sk = $wgUser->getSkin();
		
		$wgOut->addHTML( '<br /><ul>' );

		// "Upload a new version of this video" link
		if( $wgUser->isAllowed( 'reupload' ) ) {
			$ulink = $sk->link(
				SpecialPage::getTitleFor( 'AddVideo' ),
				wfMsg( 'uploadnewversion-linktext' ),
				array(),
				array(
					'wpTitle' => $this->video->getName(),
					'wpForReUpload' => 1,
				)
			);
			$wgOut->addHTML( "<li>{$ulink}</li>" );
		}

		$wgOut->addHTML( '</ul>' );
	}

	/**
	 * Reverts a video to its earlier state
	 */
	function revert() {
		global $wgOut, $wgRequest, $wgUser;

		$oldvideo = $wgRequest->getText( 'oldvideo' );
		if ( strlen( $oldvideo ) < 16 ) {
			$wgOut->showUnexpectedValueError( 'oldvideo', htmlspecialchars( $oldvideo ) );
			return;
		}

		// Can't do anything during DB locks
		if ( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}

		// Must be logged in to revert videos
		if( $wgUser->isAnon() ) {
			$wgOut->showErrorPage( 'uploadnologin', 'uploadnologintext' );
			return;
		}

		// Must be able to edit in order to revert
		if ( !$this->mTitle->userCan( 'edit' ) ) {
			$wgOut->readOnlyPage( $this->getContent(), true );
			return;
		}

		// Must not be blocked
		if ( $wgUser->isBlocked() ) {
			return $this->blockedIPpage();
		}

		// And finally edit tokens must match in order to prevent cross-site request forgery
		if( !$wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ), $oldvideo ) ) {
			$wgOut->showErrorPage( 'internalerror', 'sessionfailure' );
			return;
		}

		$dbr = wfGetDB( DB_MASTER );
		$s = $dbr->selectRow(
			'oldvideo',
			array( 'ov_url', 'ov_type' ),
			array( 'ov_archive_name' => urldecode( $oldvideo ) ),
			__METHOD__
		);
		if ( $s !== false ) {
			$url = $s->ov_url;
			$type = $s->ov_type;
		} else {
			$wgOut->showUnexpectedValueError( 'oldvideo', htmlspecialchars( $oldvideo ) );
			return;
		}

		$name = substr( $oldvideo, 15 );

		//$oldver = wfTimestampNow() . "!{$name}";

		// Record upload and update metadata cache
		$video = Video::newFromName( $name );
		$video->addVideo( $url, $type, '' );

		$wgOut->setPageTitle( wfMsgHtml( 'actioncomplete' ) );
		$wgOut->setRobotPolicy( 'noindex,nofollow' );
		$wgOut->addHTML( wfMsg( 'video-revert-success' ) );

		$descTitle = $video->getTitle();
		$wgOut->returnToMain( false, $descTitle->getPrefixedText() );
	}

}

/**
 * @todo document
 */
class VideoHistoryList {

	function __construct( &$skin ) {
		$this->skin =& $skin;
	}

	function beginVideoHistoryList() {
		$s = "\n" .
			Xml::element( 'h2', array( 'id' => 'filehistory' ), wfMsgHtml( 'video-history' ) ) .
			"\n<p>" . wfMsg( 'video-histlegend' ) . "</p>\n" . '<ul class="special">';
		return $s;
	}

	function endVideoHistoryList() {
		$s = "</ul>\n";
		return $s;
	}

	function videoHistoryLine( $iscur, $timestamp, $video, $user_id, $user_name, $url, $type ) {
		global $wgUser, $wgLang, $wgTitle, $wgContLang;

		$datetime = $wgLang->timeanddate( $timestamp, true );
		$cur = wfMsgHtml( 'cur' );

		if ( $iscur ) {
			$rlink = $cur;
		} else {
			if( $wgUser->getID() != 0 && $wgTitle->userCan( 'edit' ) ) {
				$token = urlencode( $wgUser->editToken( $video ) );
				$rlink = $this->skin->makeKnownLinkObj(
					$wgTitle,
					wfMsgHtml( 'video-revert' ),
					'action=revert&oldvideo=' . urlencode( $video ) .
						"&wpEditToken=$token"
				);
			} else {
				# Having live active links for non-logged in users
				# means that bots and spiders crawling our site can
				# inadvertently change content. Baaaad idea.
				$rlink = wfMsgHtml( 'video-revert' );
				$dlink = $del;
			}
		}

		$userlink = $this->skin->userLink( $user_id, $user_name ) .
					$this->skin->userToolLinks( $user_id, $user_name );
 
		$style = $this->skin->getInternalLinkAttributes( $url, $datetime );

		$s = "<li>({$rlink}) <a href=\"{$url}\"{$style}>{$datetime}</a> . . ({$type}) . . {$userlink}";

		$s .= $this->skin->commentBlock( /*$description*/'', $wgTitle );
		$s .= "</li>\n";
		return $s;
	}

}

/**
 * This is like a normal CategoryViewer, except that it supports videos.
 * This is initialized for every category page by
 * VideoHooks::categoryPageWithVideo function in VideoHooks.php.
 */
class CategoryWithVideoViewer extends CategoryViewer {

	function clearCategoryState() {
		$this->articles = array();
		$this->articles_start_char = array();
		$this->children = array();
		$this->children_start_char = array();
		if( $this->showGallery ) {
			$this->gallery = new ImageGallery();
		}
		#if( $this->showVideoGallery ) {
			$this->videogallery = new VideoGallery();
			$this->videogallery->setParsing();
		#}
	}

	/**
	 * Format the category data list.
	 *
	 * @param $from String: return only sort keys from this item on
	 * @param $until String: don't return keys after this point.
	 * @return String: HTML output
	 * @private
	 */
	function getHTML() {
		global $wgOut, $wgCategoryMagicGallery;
		wfProfileIn( __METHOD__ );

		$this->showGallery = $wgCategoryMagicGallery && !$wgOut->mNoGallery;

		$this->clearCategoryState();
		$this->doCategoryQuery();
		$this->finaliseCategoryState();

		$r = $this->getCategoryTop() .
			$this->getSubcategorySection() .
			$this->getPagesSection() .
			$this->getImageSection() .
			$this->getVideoSection() .
			$this->getCategoryBottom();

		wfProfileOut( __METHOD__ );
		return $r;
	}

	/**
	 * If there are videos on the category, display a message indicating how
	 * many videos are in the category and render the gallery of videos.
	 *
	 * @return String: HTML when there are videos on the category
	 */
	function getVideoSection() {
		if( !$this->videogallery->isEmpty() ) {
			return "<div id=\"mw-category-media\">\n" . '<h2>' .
				wfMsg(
					'category-video-header',
					htmlspecialchars( $this->title->getText() )
				) . "</h2>\n" .
				wfMsgExt(
					'category-video-count',
					'parsemag',
					$this->videogallery->count()
				) . $this->videogallery->toHTML() . "\n</div>";
		} else {
			return '';
		}
	}

	/**
	 * Add a page in the video namespace
	 */
	function addVideo( $title, $sortkey, $pageLength ) {
		$video = new Video( $title );
		if( $this->flip ) {
			$this->videogallery->insert( $video );
		} else {
			$this->videogallery->add( $video );
		}
	}

	function doCategoryQuery() {
		$dbr = wfGetDB( DB_SLAVE );
		if( $this->from != '' ) {
			$pageCondition = 'cl_sortkey >= ' . $dbr->addQuotes( $this->from );
			$this->flip = false;
		} elseif( $this->until != '' ) {
			$pageCondition = 'cl_sortkey < ' . $dbr->addQuotes( $this->until );
			$this->flip = true;
		} else {
			$pageCondition = '1 = 1';
			$this->flip = false;
		}
		$res = $dbr->select(
			array( 'page', 'categorylinks' ),
			array( 'page_title', 'page_namespace', 'page_len', 'cl_sortkey' ),
			array(
				$pageCondition,
				'cl_from = page_id',
				'cl_to' => $this->title->getDBKey()
			),
			__METHOD__,
			array(
				'ORDER BY' => $this->flip ? 'cl_sortkey DESC' : 'cl_sortkey',
				'LIMIT' => $this->limit + 1
			)
		);

		$count = 0;
		$this->nextPage = null;
		foreach( $res as $x ) {
			if( ++$count > $this->limit ) {
				// We've reached the one extra which shows that there are
				// additional pages to be had. Stop here...
				$this->nextPage = $x->cl_sortkey;
				break;
			}

			$title = Title::makeTitle( $x->page_namespace, $x->page_title );

			if( $title->getNamespace() == NS_CATEGORY ) {
				$this->addSubcategory( $title, $x->cl_sortkey, $x->page_len );
			} elseif( $title->getNamespace() == NS_FILE ) {
				$this->addImage( $title, $x->cl_sortkey, $x->page_len );
			} elseif( $title->getNamespace() == NS_VIDEO ) {
				$this->addVideo( $title, $x->cl_sortkey, $x->page_len );
			} else {
				$this->addPage( $title, $x->cl_sortkey, $x->page_len );
			}
		}
	}
}