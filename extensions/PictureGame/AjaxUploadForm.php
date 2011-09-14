<?php
/**
 * New version of that fucking AJAX upload form, 1.16-compatible.
 *
 * wpThumbWidth is the width of the thumbnail that will be returned
 * Also, to prevent overwriting uploads of files with popular names i.e.
 * Image.jpg all the uploaded files are prepended with the current timestamp.
 * This class, unlike PollNY's and QuizGame's upload classes, also respects
 * callbackPrefix because we need it for PictureGame as we must upload *two*
 * images instead of one.
 *
 * @file
 * @ingroup SpecialPage
 * @ingroup Upload
 * @author Jack Phoenix <jack@countervandalism.net>
 * @date 26 June 2011
 * @note Based on 1.16 core SpecialUpload.php (GPL-licensed) by Bryan et al.
 * @see http://bugzilla.shoutwiki.com/show_bug.cgi?id=22
 */
class SpecialPictureGameAjaxUpload extends SpecialUpload {
	/**
	 * Constructor: initialise object
	 * Get data POSTed through the form and assign them to the object
	 *
	 * @param $request WebRequest: Data posted.
	 */
	public function __construct( $request = null ) {
		global $wgRequest;

		SpecialPage::__construct( 'PictureGameAjaxUpload', 'upload', false );

		$this->loadRequest( is_null( $request ) ? $wgRequest : $request );
	}

	/**
	 * apparently you don't need to (re)declare the protected/public class
	 * member variables here, so I removed them.
	 */

	/**
	 * Initialize instance variables from request and create an Upload handler
	 *
	 * What was changed here: $this->mIgnoreWarning is now unconditionally true
	 * and mUpload uses PictureGameUpload instead of UploadBase
	 *
	 * @param $request WebRequest: The request to extract variables from
	 */
	protected function loadRequest( $request ) {
		global $wgUser;

		$this->mRequest = $request;
		$this->mSourceType        = $request->getVal( 'wpSourceType', 'file' );
		$this->mUpload            = PictureGameUpload::createFromRequest( $request );
		$this->mUploadClicked     = $request->wasPosted()
			&& ( $request->getCheck( 'wpUpload' )
				|| $request->getCheck( 'wpUploadIgnoreWarning' ) );

		// Guess the desired name from the filename if not provided
		$this->mDesiredDestName   = $request->getText( 'wpDestFile' );
		if( !$this->mDesiredDestName && $request->getFileName( 'wpUploadFile' ) !== null ) {
			$this->mDesiredDestName = $request->getFileName( 'wpUploadFile' );
		}
		$this->mComment           = $request->getText( 'wpUploadDescription' );
		$this->mLicense           = $request->getText( 'wpLicense' );

		$this->mDestWarningAck    = $request->getText( 'wpDestFileWarningAck' );
		$this->mIgnoreWarning     = true;//$request->getCheck( 'wpIgnoreWarning' ) || $request->getCheck( 'wpUploadIgnoreWarning' );
		$this->mWatchthis         = $request->getBool( 'wpWatchthis' ) && $wgUser->isLoggedIn();
		$this->mCopyrightStatus   = $request->getText( 'wpUploadCopyStatus' );
		$this->mCopyrightSource   = $request->getText( 'wpUploadSource' );

		$this->mForReUpload       = $request->getBool( 'wpForReUpload' ); // updating a file
		$this->mCancelUpload      = $request->getCheck( 'wpCancelUpload' )
		                         || $request->getCheck( 'wpReUpload' ); // b/w compat

		// If it was posted check for the token (no remote POST'ing with user credentials)
		$token = $request->getVal( 'wpEditToken' );
		if( $this->mSourceType == 'file' && $token == null ) {
			// Skip token check for file uploads as that can't be faked via JS...
			// Some client-side tools don't expect to need to send wpEditToken
			// with their submissions, as that's new in 1.16.
			$this->mTokenOk = true;
		} else {
			$this->mTokenOk = $wgUser->matchEditToken( $token );
		}
	}

	/**
	 * Special page entry point
	 *
	 * What was changed here: the setArticleBodyOnly() line below was added,
	 * and some bits of code were entirely removed.
	 */
	public function execute( $par ) {
		global $wgUser, $wgOut, $wgRequest;

		// Disable the skin etc.
		$wgOut->setArticleBodyOnly( true );

		# Check that uploading is enabled
		if( !UploadBase::isEnabled() ) {
			$wgOut->showErrorPage( 'uploaddisabled', 'uploaddisabledtext' );
			return;
		}

		# Check permissions
		global $wgGroupPermissions;
		if( !$wgUser->isAllowed( 'upload' ) ) {
			if( !$wgUser->isLoggedIn() && ( $wgGroupPermissions['user']['upload']
				|| $wgGroupPermissions['autoconfirmed']['upload'] ) ) {
				// Custom message if logged-in users without any special rights can upload
				$wgOut->showErrorPage( 'uploadnologin', 'uploadnologintext' );
			} else {
				$wgOut->permissionRequired( 'upload' );
			}
			return;
		}

		# Check blocks
		if( $wgUser->isBlocked() ) {
			$wgOut->blockedPage();
			return;
		}

		# Check whether we actually want to allow changing stuff
		if( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}

		# Unsave the temporary file in case this was a cancelled upload
		if ( $this->mCancelUpload ) {
			if ( !$this->unsaveUploadedFile() ) {
				# Something went wrong, so unsaveUploadedFile showed a warning
				return;
			}
		}

		# Process upload or show a form
		if ( $this->mTokenOk && !$this->mCancelUpload && ( $this->mUpload && $this->mUploadClicked ) ) {
			$this->processUpload();
		} else {
			$this->showUploadForm( $this->getUploadForm() );
		}

		# Cleanup
		if ( $this->mUpload ) {
			$this->mUpload->cleanupTempFile();
		}
	}

	/**
	 * Get a PictureGameAjaxUploadForm instance with title and text properly set.
	 *
	 * @param $message String: HTML string to add to the form
	 * @param $sessionKey String: session key in case this is a stashed upload
	 * @return PictureGameAjaxUploadForm
	 */
	protected function getUploadForm( $message = '', $sessionKey = '', $hideIgnoreWarning = false ) {
		# Initialize form
		$form = new PictureGameAjaxUploadForm( array(
			'watch' => $this->getWatchCheck(),
			'forreupload' => $this->mForReUpload,
			'sessionkey' => $sessionKey,
			'hideignorewarning' => $hideIgnoreWarning,
			'destwarningack' => (bool)$this->mDestWarningAck,
			'destfile' => $this->mDesiredDestName,
		) );
		$form->setTitle( $this->getTitle() );

		# Check the token, but only if necessary
		if( !$this->mTokenOk && !$this->mCancelUpload
				&& ( $this->mUpload && $this->mUploadClicked ) ) {
			$form->addPreText( wfMsgExt( 'session_fail_preview', 'parseinline' ) );
		}

		# Add upload error message
		$form->addPreText( $message );

		return $form;
	}

	/**
	 * Stashes the upload and shows the main upload form.
	 *
	 * Note: only errors that can be handled by changing the name or
	 * description should be redirected here. It should be assumed that the
	 * file itself is sane and has passed UploadBase::verifyFile. This
	 * essentially means that UploadBase::VERIFICATION_ERROR and
	 * UploadBase::EMPTY_FILE should not be passed here.
	 *
	 * @param $message String: HTML message to be passed to mainUploadForm
	 */
	protected function showRecoverableUploadError( $message ) {
		$sessionKey = $this->mUpload->stashSession();
		$message = '<h2>' . wfMsgHtml( 'uploadwarning' ) . "</h2>\n" .
			'<div class="error">' . $message . "</div>\n";

		$form = $this->getUploadForm( $message, $sessionKey );
		$form->setSubmitText( wfMsg( 'upload-tryagain' ) );
		$this->showUploadForm( $form );
	}

	/**
	 * Show the upload form with error message, but do not stash the file.
	 *
	 * @param $message String: error message to show
	 */
	protected function showUploadError( $message ) {
		global $wgRequest;
		$prefix = $wgRequest->getVal( 'callbackPrefix' );
		if( strlen( $prefix ) == 0 ) {
			$prefix = '';
		}
		$message = addslashes( $message );
		$output = "<script language=\"javascript\">
			/*<![CDATA[*/
				window.parent.PictureGame.{$prefix}uploadError( '{$message}' );
			/*]]>*/</script>";
		$this->showUploadForm( $this->getUploadForm( $output ) );
	}

	/**
	 * Do the upload.
	 * Checks are made in SpecialPictureGameAjaxUpload::execute()
	 *
	 * What was changed here: $wgRequest & $wgContLang were added as globals,
	 * one hook and the post-upload redirect were removed in favor of the code
	 * below the $this->mUploadSuccessful = true; line
	 */
	protected function processUpload() {
		global $wgUser, $wgOut, $wgRequest, $wgContLang;

		// Verify permissions
		$permErrors = $this->mUpload->verifyPermissions( $wgUser );
		if( $permErrors !== true ) {
			$wgOut->showPermissionsErrorPage( $permErrors );
			return;
		}

		// Fetch the file if required
		$status = $this->mUpload->fetchFile();
		if( !$status->isOK() ) {
			$this->showUploadForm(
				$this->getUploadForm( $wgOut->parse( $status->getWikiText() ) )
			);
			return;
		}

		// Upload verification
		$details = $this->mUpload->verifyUpload();
		if ( $details['status'] != UploadBase::OK ) {
			$this->processVerificationError( $details );
			return;
		}

		$this->mLocalFile = $this->mUpload->getLocalFile();

		$categoryText = '[[' . $wgContLang->getNsText( NS_CATEGORY ) . ':' .
			wfMsgForContent( 'picturegame-images-category' ) . ']]';
		// Get the page text if this is not a reupload
		//if( !$this->mForReUpload ) {
			$pageText = self::getInitialPageText(
				$categoryText, //$this->mComment,
				$this->mLicense,
				$this->mCopyrightStatus,
				$this->mCopyrightSource
			);
		//} else {
		//	$pageText = false;
		//}

		$status = $this->mUpload->performUpload(
			$categoryText/*$this->mComment*/, $pageText, $this->mWatchthis, $wgUser
		);

		if ( !$status->isGood() ) {
			$this->showUploadError( $wgOut->parse( $status->getWikiText() ) );
			return;
		}

		// Success, redirect to description page
		$this->mUploadSuccessful = true;

		$wgOut->setArticleBodyOnly( true );
		$wgOut->clearHTML();

		$thumbWidth = $wgRequest->getInt( 'wpThumbWidth', 75 );

		// The old version below, which initially used $this->mDesiredDestName
		// instead of that getTitle() caused plenty o' fatals...the new version
		// seems to be OK...I think.
		//$img = wfFindFile( $this->mUpload->getTitle() );
		$img = $this->mLocalFile;

		if ( !$img ) {
			// This should NOT be happening...the getThumbnail() call below
			// will cause a fatal error if $img is not an object
			error_log(
				'PictureGame/MiniAjaxUpload FATAL! $this->mUpload is: ' .
				print_r( $this->mUpload, true )
			);
		}

		$thumb = $img->getThumbnail( $thumbWidth );
		$img_tag = $thumb->toHtml();
		$slashedImgTag = addslashes( $img_tag );

		$prefix = $wgRequest->getVal( 'callbackPrefix' );
		if( strlen( $prefix ) == 0 ) {
			$prefix = '';
		}

		// $this->mDesiredDestName doesn't include the timestamp so we can't
		// use it as the second param to the JS function...
		// @see extensions/QuizGame/QuestionGameUpload.php,
		// SpecialQuestionGameUpload::processUpload() for a detailed
		// description of this fucked up logic
		$imgName = $img->getTitle()->getDBkey();
		echo "<script language=\"javascript\">
			/*<![CDATA[*/
			window.parent.PictureGame.{$prefix}uploadComplete(\"{$slashedImgTag}\", \"{$imgName}\", '');
			/*]]>*/</script>";
	}
}

class PictureGameAjaxUploadForm extends UploadForm {
	protected $mWatch;
	protected $mForReUpload;
	protected $mSessionKey;
	protected $mHideIgnoreWarning;
	protected $mDestWarningAck;
	protected $mDestFile;

	protected $mSourceIds;

	public function __construct( $options = array() ) {
		$this->mWatch = !empty( $options['watch'] );
		$this->mForReUpload = !empty( $options['forreupload'] );
		$this->mSessionKey = isset( $options['sessionkey'] )
				? $options['sessionkey'] : '';
		$this->mHideIgnoreWarning = !empty( $options['hideignorewarning'] );
		$this->mDestWarningAck = !empty( $options['destwarningack'] );

		$this->mDestFile = isset( $options['destfile'] ) ? $options['destfile'] : '';

		$sourceDescriptor = $this->getSourceSection();
		$descriptor = $sourceDescriptor
			+ $this->getDescriptionSection()
			+ $this->getOptionsSection();

		HTMLForm::__construct( $descriptor, 'upload' );

		# Set some form properties
		$this->setSubmitText( wfMsg( 'uploadbtn' ) );
		$this->setSubmitName( 'wpUpload' );
		$this->setSubmitTooltip( 'upload' );
		$this->setId( 'mw-upload-form' );

		# Build a list of IDs for JavaScript insertion
		$this->mSourceIds = array();
		foreach ( $sourceDescriptor as $key => $field ) {
			if ( !empty( $field['id'] ) ) {
				$this->mSourceIds[] = $field['id'];
			}
		}
	}

	function displayForm( $submitResult ) {
		global $wgOut;
		parent::displayForm( $submitResult );
		if ( method_exists( $wgOut, 'allowClickjacking' ) ) {
			$wgOut->allowClickjacking();
		}
	}

	/**
	 * Wrap the form innards in an actual <form> element
	 * This is here because HTMLForm's default wrapForm() is so stupid that it
	 * doesn't let us add the onsubmit attribute...oh yeah, and because using
	 * $wgOut->addInlineScript in that addUploadJS() function doesn't work,
	 * either
	 *
	 * @param $html String: HTML contents to wrap.
	 * @return String: wrapped HTML.
	 */
	function wrapForm( $html ) {
		# Include a <fieldset> wrapper for style, if requested.
		if ( $this->mWrapperLegend !== false ) {
			$html = Xml::fieldset( $this->mWrapperLegend, $html );
		}
		# Use multipart/form-data
		$encType = $this->mUseMultipart
			? 'multipart/form-data'
			: 'application/x-www-form-urlencoded';
		# Attributes
		$attribs = array(
			'action'  => $this->getTitle()->getFullURL(),
			'method'  => 'post',
			'class'   => 'visualClear',
			'enctype' => $encType,
			'onsubmit' => 'submitForm()', // added
			'id' => 'upload', // added
			'name' => 'upload' // added
		);

		// fucking newlines...
		return "<script type=\"text/javascript\">
	function submitForm() {
		var valueToCheck = document.getElementById( 'wpUploadFile' ).value;
		if( valueToCheck != '' ) {
			window.parent.PictureGame.completeImageUpload(); 
			return true;
		} else {
			// textError method is gone and I can't find it anywhere...
			alert( '" . str_replace( "\n", ' ', wfMsg( 'emptyfile' ) ) . "' );
			return false;
		}
	}
</script>\n" . Html::rawElement( 'form', $attribs, $html );
	}

	/**
	 * Get the descriptor of the fieldset that contains the file source
	 * selection. The section is 'source'
	 *
	 * @return array Descriptor array
	 */
	protected function getSourceSection() {
		global $wgUser, $wgRequest;

		if ( $this->mSessionKey ) {
			return array(
				'wpSessionKey' => array(
					'type' => 'hidden',
					'default' => $this->mSessionKey,
				),
				'wpSourceType' => array(
					'type' => 'hidden',
					'default' => 'Stash',
				),
			);
		}

		$canUploadByUrl = UploadFromUrl::isEnabled() && $wgUser->isAllowed( 'upload_by_url' );
		$radio = $canUploadByUrl;
		$selectedSourceType = strtolower( $wgRequest->getText( 'wpSourceType', 'File' ) );

		$descriptor = array();
		$descriptor['UploadFile'] = array(
			'class' => 'UploadSourceField',
			'section' => 'source',
			'type' => 'file',
			'id' => 'wpUploadFile',
			'size' => 30, // added for PictureGame
			'label-message' => 'sourcefilename',
			'upload-type' => 'File',
			'radio' => &$radio,
			// help removed, we don't need any tl,dr on this mini-upload form
			'checked' => $selectedSourceType == 'file',
		);
		if ( $canUploadByUrl ) {
			$descriptor['UploadFileURL'] = array(
				'class' => 'UploadSourceField',
				'section' => 'source',
				'id' => 'wpUploadFileURL',
				'label-message' => 'sourceurl',
				'upload-type' => 'url',
				'radio' => &$radio,
				'checked' => $selectedSourceType == 'url',
			);
		}

		return $descriptor;
	}

	/**
	 * Get the descriptor of the fieldset that contains the file description
	 * input. The section is 'description'
	 *
	 * @return array Descriptor array
	 */
	protected function getDescriptionSection() {
		$descriptor = array(
			'DestFile' => array(
				'type' => 'hidden',
				'id' => 'wpDestFile',
				'size' => 30, // changed for PictureGame from 60
				'default' => $this->mDestFile,
				# FIXME: hack to work around poor handling of the 'default' option in HTMLForm
				'nodata' => strval( $this->mDestFile ) !== '',
				'readonly' => true // users do not need to change the file name; normally this is true only when reuploading
			)
		);

		global $wgUseCopyrightUpload;
		if ( $wgUseCopyrightUpload ) {
			$descriptor['UploadCopyStatus'] = array(
				'type' => 'text',
				'section' => 'description',
				'id' => 'wpUploadCopyStatus',
				'label-message' => 'filestatus',
			);
			$descriptor['UploadSource'] = array(
				'type' => 'text',
				'section' => 'description',
				'id' => 'wpUploadSource',
				'label-message' => 'filesource',
			);
		}

		return $descriptor;
	}

	/**
	 * Get the descriptor of the fieldset that contains the upload options,
	 * such as "watch this file". The section is 'options'
	 *
	 * @return array Descriptor array
	 */
	protected function getOptionsSection() {
		$descriptor = array();

		$descriptor['wpDestFileWarningAck'] = array(
			'type' => 'hidden',
			'id' => 'wpDestFileWarningAck',
			'default' => $this->mDestWarningAck ? '1' : '',
		);

		if ( $this->mForReUpload ) {
			$descriptor['wpForReUpload'] = array(
				'type' => 'hidden',
				'id' => 'wpForReUpload',
				'default' => '1',
			);
		}

		global $wgRequest;
		// Wow, this is all we need to pass the callbackPrefix to the appropriate functions :D
		// That makes me super happy!
		$descriptor['callbackPrefix'] = array(
			'type' => 'hidden',
			'id' => 'callbackPrefix',
			'default' => $wgRequest->getVal( 'callbackPrefix' ),
		);

		return $descriptor;
	}

	/**
	 * Add the upload JS and show the form.
	 */
	public function show() {
		HTMLForm::show();
	}

	/**
	 * Empty function; submission is handled elsewhere.
	 *
	 * @return bool false
	 */
	function trySubmit() {
		return false;
	}
}

/**
 * Quick helper class for SpecialPictureGameAjaxUpload::loadRequest; this prefixes the
 * filename with the timestamp. Yes, another class is needed for it. *sigh*
 */
class PictureGameUpload extends UploadFromFile {
	/**
	 * Create a form of UploadBase depending on wpSourceType and initializes it
	 */
	public static function createFromRequest( &$request, $type = null ) {
		$handler = new self;
		$handler->initializeFromRequest( $request );
		return $handler;
	}

	function initializeFromRequest( &$request ) {
		$desiredDestName = $request->getText( 'wpDestFile' );
		if( !$desiredDestName ) {
			$desiredDestName = $request->getFileName( 'wpUploadFile' );
		}
		$prefix = $request->getText( 'callbackPrefix' ); // added for PictureGame
		$desiredDestName = time() . '-' . $prefix . $desiredDestName;
		return $this->initializePathInfo(
			$desiredDestName,
			$request->getFileTempName( 'wpUploadFile' ),
			$request->getFileSize( 'wpUploadFile' )
		);
	}
}