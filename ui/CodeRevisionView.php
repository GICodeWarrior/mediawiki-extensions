<?php

// Special:Code/MediaWiki/40696
class CodeRevisionView extends CodeView {

	function __construct( $repoName, $rev, $replyTarget = null ) {
		global $wgRequest;
		parent::__construct();
		$this->mRepo = CodeRepository::newFromName( $repoName );
		$this->mRev = $this->mRepo ?
			$this->mRepo->getRevision( intval( ltrim( $rev, 'r' ) ) ) : null;
		$this->mPreviewText = false;
		# Search path for navigation links
		$this->mPath = htmlspecialchars( trim( $wgRequest->getVal( 'path' ) ) );
		if ( strlen( $this->mPath ) && $this->mPath[0] !== '/' ) {
			$this->mPath = "/{$this->mPath}"; // make sure this is a valid path
		}
		# URL params...
		$this->mAddTags = $wgRequest->getText( 'wpTag' );
		$this->mRemoveTags = $wgRequest->getText( 'wpRemoveTag' );
		$this->mStatus = $wgRequest->getText( 'wpStatus' );
		$this->jumpToNext = $wgRequest->getCheck( 'wpSaveAndNext' );
		$this->mReplyTarget = $replyTarget ?
			(int)$replyTarget : $wgRequest->getIntOrNull( 'wpParent' );
		$this->text = $wgRequest->getText( "wpReply{$this->mReplyTarget}" );
		$this->mSkipCache = ( $wgRequest->getVal( 'action' ) == 'purge' );
		# Make tag arrays
		$this->mAddTags = $this->splitTags( $this->mAddTags );
		$this->mRemoveTags = $this->splitTags( $this->mRemoveTags );
	}

	function execute() {
		global $wgOut, $wgUser, $wgLang;
		if ( !$this->mRepo ) {
			$view = new CodeRepoListView();
			$view->execute();
			return;
		}
		if ( !$this->mRev ) {
			$view = new CodeRevisionListView( $this->mRepo->getName() );
			$view->execute();
			return;
		}
		if( $this->mStatus == '' )
			$this->mStatus = $this->mRev->getStatus();

		$redirectOnPost = $this->checkPostings();
		if ( $redirectOnPost ) {
			$wgOut->redirect( $redirectOnPost );
			return;
		}

		$wgOut->setPageTitle( wfMsgHtml('code-rev-title',$this->mRev->getId()) );

		$repoLink = $this->mSkin->link( SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() ),
			htmlspecialchars( $this->mRepo->getName() ) );
		$revText = $this->navigationLinks();
		$paths = '';
		$modifiedPaths = $this->mRev->getModifiedPaths();
		foreach ( $modifiedPaths as $row ) {
			$paths .= $this->formatPathLine( $row->cp_path, $row->cp_action );
		}
		if ( $paths ) {
			$paths = "<div class='mw-codereview-paths'><ul>\n$paths</ul></div>\n";
		}
		$comments = $this->formatComments();
		$commentsLink = "";
		if ( $comments ) {
			$commentsLink = " (<a href=\"#code-comments\">" . wfMsgHtml( 'code-comments' ) . "</a>)\n";
		}
		$fields = array(
			'code-rev-repo' => $repoLink,
			'code-rev-rev' => $revText,
			'code-rev-date' => $wgLang->timeanddate( $this->mRev->getTimestamp(), true ),
			'code-rev-author' => $this->authorLink( $this->mRev->getAuthor() ),
			'code-rev-status' => $this->statusForm() . $commentsLink,
			'code-rev-tags' => $this->tagForm(),
			'code-rev-message' => $this->formatMessage( $this->mRev->getMessage() ),
			'code-rev-paths' => $paths,
		);
		$special = SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() . '/' . $this->mRev->getId() );

		$html = '';
		if( $this->mPath != '' ) {
			$html .= wfMsgExt( 'code-browsing-path', 'parse', $this->mPath );
		}
		# Output form
		$html .= Xml::openElement( 'form', array( 'action' => $special->getLocalUrl(), 'method' => 'post' ) );

		if ( $this->canPostComments() ) {
			$html .= $this->addActionButtons();
		}

		$html .= $this->formatMetaData( $fields );
		# Show test case info
		$tests = $this->formatTests();
		if( $tests ) {
			$html .= "<h2 id='code-tests'>" . wfMsgHtml( 'code-tests' ) .
				"</h2>\n" . $tests;
		}
		# Output diff
		if ( $this->mRev->isDiffable() ) {
			$diffHtml = $this->formatDiff();
			$html .=
				"<h2>" . wfMsgHtml( 'code-rev-diff' ) .
				' <small>[' . $this->mSkin->makeLinkObj( $special,
					wfMsg( 'code-rev-purge-link' ), 'action=purge' ) . ']</small></h2>' .
				"<div class='mw-codereview-diff' id='mw-codereview-diff'>" . $diffHtml . "</div>\n";
			$html .= $this->formatImgDiff();
		}
		# Show code relations
		$relations = $this->formatReferences();
		if ( $relations ) {
			$html .= "<h2 id='code-references'>" . wfMsgHtml( 'code-references' ) .
				"</h2>\n" . $relations;
		}
		# Add revision comments
		if ( $comments ) {
			$html .= "<h2 id='code-comments'>" . wfMsgHtml( 'code-comments' ) .
				"</h2>\n" . $comments;
		}

		if ( $this->mReplyTarget ) {
			global $wgJsMimeType;
			$id = intval( $this->mReplyTarget );
			$html .= "<script type=\"$wgJsMimeType\">addOnloadHook(function(){" .
				"document.getElementById('wpReplyTo$id').focus();" .
				"});</script>\n";
		}

		if ( $this->canPostComments() ) {
			$html .= $this->addActionButtons();
		}

		$changes = $this->formatPropChanges();
		if ( $changes ) {
			$html .= "<h2 id='code-changes'>" . wfMsgHtml( 'code-prop-changes' ) . "</h2>\n" . $changes;
		}
		$html .= xml::closeElement( 'form' );

		$wgOut->addHTML( $html );
	}

	protected function navigationLinks() {
		global $wgLang;

		$rev = $this->mRev->getId();
		$prev = $this->mRev->getPrevious( $this->mPath );
		$next = $this->mRev->getNext( $this->mPath );
		$repo = $this->mRepo->getName();

		$links = array();

		if ( $prev ) {
			$prevTarget = SpecialPage::getTitleFor( 'Code', "$repo/$prev" );
			$links[] = '&lt;&nbsp;' . $this->mSkin->link( $prevTarget, "r$prev",
				array(), array('path' => $this->mPath) );
		}

		$revText = "<b>r$rev</b>";
		$viewvc = $this->mRepo->getViewVcBase();
		if ( $viewvc ) {
			$url = htmlspecialchars( "$viewvc/?view=rev&revision=$rev" );
			$viewvcTxt = wfMsgHtml( 'code-rev-rev-viewvc' );
			$revText .= " (<a href=\"$url\" title=\"revision $rev\">$viewvcTxt</a>)";
		}
		$links[] = $revText;

		if ( $next ) {
			$nextTarget = SpecialPage::getTitleFor( 'Code', "$repo/$next" );
			$links[] = $this->mSkin->link( $nextTarget, "r$next",
				array(), array('path' => $this->mPath) ) . '&nbsp;&gt;';
		}

		return $wgLang->pipeList( $links );
	}

	protected function checkPostings() {
		global $wgRequest, $wgUser;
		if ( $wgRequest->wasPosted() && $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
			// Look for a posting...
			$text = $wgRequest->getText( "wpReply{$this->mReplyTarget}" );
			$parent = $wgRequest->getIntOrNull( 'wpParent' );
			$review = $wgRequest->getInt( 'wpReview' );
			$isPreview = $wgRequest->getCheck( 'wpPreview' );
			if ( $isPreview ) {
				// Save the text for reference on later comment display...
				$this->mPreviewText = $text;
			}
		}
		return false;
	}
	
	protected function canPostComments() {
		global $wgUser;
		return $wgUser->isAllowed( 'codereview-post-comment' ) && !$wgUser->isBlocked();
	}

	protected function formatPathLine( $path, $action ) {
		// Uses messages 'code-rev-modified-a', 'code-rev-modified-r', 'code-rev-modified-d', 'code-rev-modified-m'
		$desc = wfMsgHtml( 'code-rev-modified-' . strtolower( $action ) );
		// Find any ' (from x)' from rename comment in the path.
		preg_match( '/ \([^\)]+\)$/', $path, $matches );
		$from = isset( $matches[0] ) ? $matches[0] : '';
		// Remove ' (from x)' from rename comment in the path.
		$path = preg_replace( '/ \([^\)]+\)$/', '', $path );
		$viewvc = $this->mRepo->getViewVcBase();
		$diff = '';
		if ( $viewvc ) {
			$rev = $this->mRev->getId();
			$prev = $rev - 1;
			$safePath = wfUrlEncode( $path );
			if ( $action !== 'D' ) {
				$link = $this->mSkin->makeExternalLink(
					"$viewvc$safePath?view=markup&pathrev=$rev",
					$path . $from );
			} else {
				$link = $safePath;
			}
			if ( $action !== 'A' && $action !== 'D' ) {
				$diff = ' (' .
					$this->mSkin->makeExternalLink(
						"$viewvc$safePath?&pathrev=$rev&r1=$prev&r2=$rev",
						wfMsg( 'code-rev-diff-link' ) ) .
					')';
			}
		} else {
			$link = $safePath;
		}
		return "<li>$link ($desc)$diff</li>\n";
	}

	protected function tagForm() {
		global $wgUser;
		$tags = $this->mRev->getTags();
		$list = '';
		if ( count( $tags ) ) {
			$list = implode( ", ",
				array_map(
					array( $this, 'formatTag' ),
					$tags )
			) . '&nbsp;';
		}
		if ( $wgUser->isAllowed( 'codereview-add-tag' ) ) {
			$list .= $this->addTagForm( $this->mAddTags, $this->mRemoveTags );
		}
		return $list;
	}

	protected function splitTags( $input ) {
		if ( !$this->mRev ) return array();
		$tags = array_map( 'trim', explode( ",", $input ) );
		foreach ( $tags as $key => $tag ) {
			$normal = $this->mRev->normalizeTag( $tag );
			if ( $normal === false ) {
				return null;
			}
			$tags[$key] = $normal;
		}
		return $tags;
	}

	static function listTags( $tags ) {
		if ( empty( $tags ) )
			return "";
		return implode( ",", $tags );
	}

	protected function statusForm() {
		global $wgUser;
		if ( $wgUser->isAllowed( 'codereview-set-status' ) ) {
			$repo = $this->mRepo->getName();
			$rev = $this->mRev->getId();
			return Xml::openElement( 'select', array( 'name' => 'wpStatus' ) ) .
				self::buildStatusList( $this->mStatus, $this ) .
				xml::closeElement( 'select' );
		} else {
			return htmlspecialchars( $this->statusDesc( $this->mRev->getStatus() ) );
		}
	}

	static function buildStatusList( $status, $view ) {
		$states = CodeRevision::getPossibleStates();
		$out = '';
		foreach ( $states as $state ) {
			$out .= Xml::option( $view->statusDesc( $state ), $state,
						$status === $state );
		}
		return $out;
	}

	/** Parameters are the tags to be added/removed sent with the request */
	static function addTagForm( $addTags, $removeTags ) {
		global $wgUser;
		return '<div><table><tr><td>' .
			Xml::inputLabel( wfMsg( 'code-rev-tag-add' ), 'wpTag', 'wpTag', 20,
				self::listTags( $addTags ) ) . '</td><td>&nbsp;</td><td>' .
			Xml::inputLabel( wfMsg( 'code-rev-tag-remove' ), 'wpRemoveTag', 'wpRemoveTag', 20,
				self::listTags( $removeTags ) ) . '</td></tr></table></div>';
	}

	protected function formatTag( $tag ) {
		global $wgUser;
		$repo = $this->mRepo->getName();
		$special = SpecialPage::getTitleFor( 'Code', "$repo/tag/$tag" );
		return $this->mSkin->link( $special, htmlspecialchars( $tag ) );
	}

	protected function formatTests() {
		$runs = $this->mRev->getTestRuns();
		$html = '';
		if( count( $runs ) ) {
			foreach( $runs as $run ) {
				$html .= "<h3>" . htmlspecialchars( $run->suite->name ) . "</h3>\n";
				if( $run->status == 'complete' ) {
					$total = $run->countTotal;
					$success = $run->countSuccess;
					$failed = $total - $success;
					$success_tests = "<span class='mw-codereview-success'>$success</span>";
					if( $failed ) {
						$failed_tests = "<span class='mw-codereview-fail'>$failed</span>";
						$html .= "<p>" .
							wfMsgExt(
								'codereview-tests-failed2',
								'parseinline',
								$success_tests,
								$success,
								$failed_tests,
								$failed
							) . "</p>";

						$tests = $run->getResults( false );
						$html .= "<ul>\n";
						foreach( $tests as $test ) {
							$html .= "<li>" . htmlspecialchars( $test->caseName ) . "</li>\n";
						}
						$html .= "</ul>\n";
					} else {
						$html .= "<p>" .
							wfMsgExt(
								'codereview-tests-succeeded2',
								'parseinline',
								$success_tests,
								$success
							) . "</p>";
					}
				} elseif( $run->status == "running" ) {
					$html .= wfMsgExt('codereview-tests-running','parse');
				} elseif( $run->status == "abort" ) {
					$html .= wfMsgExt('codereview-tests-aborted','parse');
				} else {
					// Err, this shouldn't happen?
				}
			}
		}
		return $html;
	}

	protected function formatDiff() {
		global $wgEnableAPI;

		// Asynchronous diff loads will require the API
		// And JS in the client, but tough shit eh? ;)
		$deferDiffs = $wgEnableAPI;

		if ( $this->mSkipCache ) {
			// We're purging the cache on purpose, probably
			// because the cached data was corrupt.
			$cache = 'skipcache';
		} elseif ( $deferDiffs ) {
			// If data is already cached, we'll take it now;
			// otherwise defer the load to an AJAX request.
			// This lets the page be manipulable even if the
			// SVN connection is slow or uncooperative.
			$cache = 'cached';
		} else {
			$cache = '';
		}
		$diff = $this->mRepo->getDiff( $this->mRev->getId(), $cache );
		if ( !$diff && $deferDiffs ) {
			// We'll try loading it by AJAX...
			return $this->stubDiffLoader();
		} else {
			$hilite = new CodeDiffHighlighter();
			return $hilite->render( $diff );
		}
	}
	
	protected function formatImgDiff() {
		global $wgCodeReviewImgRegex;
		// Get image diffs
		$imgDiffs = $html = '';
		$modifiedPaths = $this->mRev->getModifiedPaths();
		foreach ( $modifiedPaths as $row ) {
			// Typical image file?
			if( preg_match($wgCodeReviewImgRegex,$row->cp_path) ) {
				$imgDiffs .= 'Index: '.htmlspecialchars( $row->cp_path )."\n";
				$imgDiffs .= '<table border="1px" style="background:white;"><tr>';
				if( $row->cp_action !== 'A' ) { // old
					// What was done to it?
					$action = $row->cp_action == 'D' ? 'code-rev-modified-d' : 'code-rev-modified-r';
					// Link to old image
					$imgDiffs .= $this->formatImgCell( $row->cp_path, $this->mRev->getPrevious(), $action );
				}
				if( $row->cp_action !== 'D' ) { // new
					// What was done to it?
					$action = $row->cp_action == 'A' ? 'code-rev-modified-a' : 'code-rev-modified-m';
					// Link to new image
					$imgDiffs .= $this->formatImgCell( $row->cp_path, $this->mRev->getId(), $action );
				}
				$imgDiffs .= "</tr></table>\n";
			}
		}
		if( $imgDiffs ) {
			$html = '<h2>'.wfMsgHtml('code-rev-imagediff').'</h2>';
			$html .= "<div class='mw-codereview-imgdiff'>$imgDiffs</div>\n";
		}
		return $html;
	}
	
	protected function formatImgCell( $path, $rev, $message ) {
		$viewvc = $this->mRepo->getViewVcBase();
		$safePath = wfUrlEncode( $path );
		$url = "{$viewvc}{$safePath}?&pathrev=$rev&revision=$rev";

		$alt = wfMsg( $message );

		return Xml::tags( 'td',
			array(),
			Xml::tags( 'a',
				array( 'href' => $url ),
				Xml::element( 'img',
					array(
						'src' => $url,
						'alt' => $alt,
						'title' => $alt,
						'border' => '0' ) ) ) );
	}

	protected function stubDiffLoader() {
		global $wgOut, $wgScriptPath, $wgCodeReviewStyleVersion;
		$encRepo = Xml::encodeJsVar( $this->mRepo->getName() );
		$encRev = Xml::encodeJsVar( $this->mRev->getId() );
		$wgOut->addScriptFile( "$wgScriptPath/extensions/CodeReview/codereview.js?$wgCodeReviewStyleVersion" );
		$wgOut->addInlineScript(
			"addOnloadHook(
				function() {
					CodeReview.loadDiff($encRepo,$encRev);
				}
			);" );
		return wfMsg( 'code-load-diff' );
	}

	protected function formatComments() {
		$comments = implode( "\n",
			array_map( array( $this, 'formatCommentInline' ), $this->mRev->getComments() )
		);
		if ( !$this->mReplyTarget ) {
			$comments .= $this->postCommentForm();
		}
		if ( !$comments ) {
			return false;
		}
		return "<div class='mw-codereview-comments'>$comments</div>";
	}

	protected function formatPropChanges() {
		$changes = implode( "\n",
			array_map( array( $this, 'formatChangeInline' ), $this->mRev->getPropChanges() )
		);
		if ( !$changes ) {
			return false;
		}
		return "<ul class='mw-codereview-changes'>$changes</ul>";
	}
	
	protected function formatReferences() {
		$refs = implode( "\n",
			array_map( array( $this, 'formatReferenceInline' ), $this->mRev->getReferences() )
		);
		if ( !$refs ) {
			return false;
		}
		$header = '<th>'.wfMsg( 'code-field-id' ).'</th>';
		$header .= '<th>'.wfMsg( 'code-field-message' ) .'</th>';
		$header .= '<th>'.wfMsg( 'code-field-author' ).'</th>';
		$header .= '<th>'.wfMsg( 'code-field-timestamp' ).'</th>';
		return "<table border='1' class='TablePager'><tr>{$header}</tr>{$refs}</table>";
	}

	protected function formatCommentInline( $comment ) {
		if ( $comment->id === $this->mReplyTarget ) {
			return $this->formatComment( $comment,
				$this->postCommentForm( $comment->id ) );
		} else {
			return $this->formatComment( $comment );
		}
	}

	protected function formatChangeInline( $change ) {
		global $wgLang;
		$revId = $change->rev->getId();
		$line = $wgLang->timeanddate( $change->timestamp, true );
		$line .= '&nbsp;' . $this->mSkin->userLink( $change->user, $change->userText );
		$line .= $this->mSkin->userToolLinks( $change->user, $change->userText );
		// Uses messages 'code-change-status', 'code-change-tags'
		$line .= '&nbsp;' . wfMsgExt( "code-change-{$change->attrib}", 'parseinline', $revId );
		$line .= " <i>[";
		// Items that were changed or set...
		if ( $change->removed ) {
			$line .= '<b>' . wfMsg( 'code-change-removed' ) . '</b> ';
			// Status changes...
			if( $change->attrib == 'status' ) {
				$line .= wfMsgHtml( 'code-status-'.$change->removed );
				$line .= $change->added ? "&nbsp;" : ""; // spacing
			// Tag changes
			} else if( $change->attrib == 'tags' ) {
				$line .= htmlspecialchars( $change->removed );
				$line .= $change->added ? "&nbsp;" : ""; // spacing
			}
		}
		// Items that were changed to something else...
		if ( $change->added ) {
			$line .= '<b>' . wfMsg( 'code-change-added' ) . '</b> ';
			// Status changes...
			if( $change->attrib == 'status' ) {
				$line .= wfMsgHtml( 'code-status-'.$change->added );
			// Tag changes...
			} else {
				$line .= htmlspecialchars( $change->added );
			}
		}
		$line .= "]</i>";
		return "<li>$line</li>";
	}
	
	protected function formatReferenceInline( $row ) {
		global $wgLang;
		$rev = intval( $row->cr_id );
		$repo = $this->mRepo->getName();
		// Borrow the code revision list css
		$css = 'mw-codereview-status-' . htmlspecialchars( $row->cr_status );
		$date = $wgLang->timeanddate( $row->cr_timestamp, true );
		$title = SpecialPage::getTitleFor( 'Code', "$repo/$rev" );
		$revLink = $this->mSkin->link( $title, "r$rev" );
		$summary = $this->messageFragment( $row->cr_message );
		$author = $this->authorLink( $row->cr_author );
		return "<tr class='$css'><td>$revLink</td><td>$summary</td><td>$author</td><td>$date</td></tr>";
	}

	protected function commentLink( $commentId ) {
		$repo = $this->mRepo->getName();
		$rev = $this->mRev->getId();
		$title = SpecialPage::getTitleFor( 'Code', "$repo/$rev" );
		$title->setFragment( "#c{$commentId}" );
		return $title;
	}

	protected function revLink() {
		$repo = $this->mRepo->getName();
		$rev = $this->mRev->getId();
		$title = SpecialPage::getTitleFor( 'Code', "$repo/$rev" );
		return $title;
	}

	protected function previewComment( $text, $review = 0 ) {
		$comment = $this->mRev->previewComment( $text, $review );
		return $this->formatComment( $comment );
	}

	protected function formatComment( $comment, $replyForm = '' ) {
		global $wgOut, $wgLang;
		$linker = new CodeCommentLinkerWiki( $this->mRepo );

		if ( $comment->id === 0 ) {
			$linkId = 'cpreview';
			$permaLink = '<strong>'.wfMsgHtml('code-rev-inline-preview').'</strong> ';
		} else {
			$linkId = 'c' . intval( $comment->id );
			$permaLink = $this->mSkin->link( $this->commentLink( $comment->id ), "#" );
		}

		return Xml::openElement( 'div',
			array(
				'class' => 'mw-codereview-comment',
				'id' => $linkId,
				'style' => $this->commentStyle( $comment ) ) ) .
			'<div class="mw-codereview-comment-meta">' .
			$permaLink .
			wfMsgHtml( 'code-rev-comment-by',
				$this->mSkin->userLink( $comment->user, $comment->userText ) .
				$this->mSkin->userToolLinks( $comment->user, $comment->userText ) ) .
			' &nbsp; ' .
			$wgLang->timeanddate( $comment->timestamp, true ) .
			' ' .
			$this->commentReplyLink( $comment->id ) .
			'</div>' .
			'<div class="mw-codereview-comment-text">' .
			$wgOut->parse( $linker->link( $comment->text ) ) .
			'</div>' .
			$replyForm .
			'</div>';
	}

	protected function commentStyle( $comment ) {
		$depth = $comment->threadDepth();
		$margin = ( $depth - 1 ) * 48;
		return "margin-left: ${margin}px";
	}

	protected function commentReplyLink( $id ) {
		global $wgUser;
		if ( !$this->canPostComments() ) return '';
		$repo = $this->mRepo->getName();
		$rev = $this->mRev->getId();
		$self = SpecialPage::getTitleFor( 'Code', "$repo/$rev/reply/$id" );
		$self->setFragment( "#c$id" );
		return '[' . $this->mSkin->link( $self, wfMsg( 'codereview-reply-link' ) ) . ']';
	}

	protected function postCommentForm( $parent = null ) {
		global $wgUser;
		if ( $this->mPreviewText !== false && $parent === $this->mReplyTarget ) {
			$preview = $this->previewComment( $this->mPreviewText );
			$text = htmlspecialchars( $this->mPreviewText );
		} else {
			$preview = '';
			$text = $this->text;
		}
		$repo = $this->mRepo->getName();
		$rev = $this->mRev->getId();
		if ( !$this->canPostComments() ) {
			return '';
		}
		return '<div class="mw-codereview-post-comment">' .
			$preview .
			Xml::hidden( 'wpEditToken', $wgUser->editToken() ) .
			Xml::hidden( 'path', $this->mPath ) .
			( $parent ? Xml::hidden( 'wpParent', $parent ) : '' ) .
			'<div>' .
			Xml::openElement( 'textarea', array(
				'name' => "wpReply{$parent}",
				'id' => "wpReplyTo{$parent}",
				'cols' => 40,
				'rows' => 10 ) ) .
			$text .
			'</textarea>' .
			'</div>' .
			'</div>';
	}

	protected function addActionButtons() {
		return '<div>' .
			Xml::submitButton( wfMsg( 'code-rev-submit' ), array( 'name' => 'wpSave' ) ) .
			' ' .
			Xml::submitButton( wfMsg( 'code-rev-submit-next' ), array( 'name' => 'wpSaveAndNext' ) ) .
			' ' .
			Xml::submitButton( wfMsg( 'code-rev-comment-preview' ), array( 'name' => 'wpPreview' ) ) .
			'</div>';
	}
}
