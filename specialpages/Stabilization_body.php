<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	echo "FlaggedRevs extension\n";
	exit( 1 );
}

// Assumes $wgFlaggedRevsProtection is off
class Stabilization extends UnlistedSpecialPage
{
	protected $form = null;

	public function __construct() {
		parent::__construct( 'Stabilization', 'stablesettings' );
    }

	public function execute( $par ) {
		global $wgRequest, $wgUser, $wgOut;
		# Check user token
		$confirmed = false;
		# Let anyone view, but not submit...
		if ( $wgRequest->wasPosted() ) {
			# Check user token
			$confirmed = $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) );
			if ( $wgUser->isBlocked( !$confirmed ) ) {
				$wgOut->blockedPage();
				return;
			} elseif ( !$wgUser->isAllowed( 'stablesettings' ) ) {
				$wgOut->permissionRequired( 'stablesettings' );
				return;
			} elseif ( wfReadOnly() ) {
				$wgOut->readOnlyPage();
				return;
			}
		}
		# Set page title
		$this->setHeaders();
		$this->sk = $wgUser->getSkin();

		$this->form = new PageStabilityForm();
		$form = $this->form; // convenience
		# Our target page
		$form->setTarget( $wgRequest->getVal( 'page', $par ) );
		# Watch checkbox
		$form->setWatchThis( (bool)$wgRequest->getCheck( 'wpWatchthis' ) );
		# Reason
		$form->setReason( $wgRequest->getText( 'wpReason' ) );
		$form->setReasonSelection( $wgRequest->getVal( 'wpReasonSelection' ) );
		# Expiry
		$form->setExpiry( $wgRequest->getText( 'mwStabilize-expiry' ) );
		$form->setExpirySelection( $wgRequest->getVal( 'wpExpirySelection' ) );
		# Precedence
		$form->setPrecedence( $wgRequest->getInt( 'wpStableconfig-select' ) );
		$form->setOverride( (int)$wgRequest->getBool( 'wpStableconfig-override' ) );
		# Get autoreview restrictions...
		$form->setAutoreview( $wgRequest->getVal( 'mwProtect-level-autoreview' ) );
		# Get auto-review option...
		$form->setReviewThis( $wgRequest->getBool( 'wpReviewthis', true ) );
		$form->setWasPosted( $wgRequest->wasPosted() );

		# Fill in & validate some parameters
		$status = $form->handleParams();
		$title = $form->getPage(); // convenience

		# We need a valid, existing, page...
		if ( $status === 'stabilize_page_invalid' ) {
			$wgOut->showErrorPage( 'notargettitle', 'notargettext' );
			return;
		} elseif ( $status === 'stabilize_page_notexists' ) {
			$wgOut->addWikiText(
				wfMsg( 'stabilization-notexists', $title->getPrefixedText() ) );
			return;
		} elseif ( $status === 'stabilize_page_unreviewable' ) {
			$wgOut->addWikiText(
				wfMsg( 'stabilization-notcontent', $title->getPrefixedText() ) );
			return;
		}

		# Show form or submit...
		if ( $form->isAllowed() && $status === true && $confirmed ) {
			$status = $form->submit();
			if ( $status === true ) {
				$wgOut->redirect( $title->getFullUrl() );
			} else {
				$this->showForm( wfMsg( $status ) );
			}
		} else {
			$this->showForm();
		}
	}

	public function showForm( $err = null ) {
		global $wgOut, $wgLang, $wgUser;
		$form = $this->form; // convenience
		$title = $this->form->getPage();
		$oldConfig = $form->getOldConfig();

		$s = ''; // form HTML string
		# Add any error messages
		if ( "" != $err ) {
			$wgOut->setSubtitle( wfMsgHtml( 'formerror' ) );
			$wgOut->addHTML( "<p class='error'>{$err}</p>\n" );
		}
		# Add header text
		if ( !$form->isAllowed() ) {
			$s .= wfMsgExt( 'stabilization-perm', 'parse', $title->getPrefixedText() );
		} else {
			$s .= wfMsgExt( 'stabilization-text', 'parse', $title->getPrefixedText() );
		}
		# Borrow some protection messages for dropdowns
		$reasonDropDown = Xml::listDropDown( 'wpReasonSelection',
			wfMsgForContent( 'protect-dropdown' ),
			wfMsgForContent( 'protect-otherreason-op' ),
			$form->getReasonSelection(),
			'mwStabilize-reason', 4
		);
		$scExpiryOptions = wfMsgForContent( 'protect-expiry-options' );
		$showProtectOptions = ( $scExpiryOptions !== '-' && $form->isAllowed() );
		# Add the current expiry as an option
		$expiryFormOptions = '';
		if ( $oldConfig['expiry'] && $oldConfig['expiry'] != 'infinity' ) {
			$timestamp = $wgLang->timeanddate( $oldConfig['expiry'] );
			$d = $wgLang->date( $oldConfig['expiry'] );
			$t = $wgLang->time( $oldConfig['expiry'] );
			$expiryFormOptions .=
				Xml::option(
					wfMsg( 'protect-existing-expiry', $timestamp, $d, $t ),
					'existing',
					$oldConfig['expiry'] == 'existing'
				) . "\n";
		}
		$expiryFormOptions .= Xml::option( wfMsg( 'protect-othertime-op' ), "othertime" ) . "\n";
		# Add custom levels (from MediaWiki message)
		foreach ( explode( ',', $scExpiryOptions ) as $option ) {
			if ( strpos( $option, ":" ) === false ) {
				$show = $value = $option;
			} else {
				list( $show, $value ) = explode( ":", $option );
			}
			$show = htmlspecialchars( $show );
			$value = htmlspecialchars( $value );
			$expiryFormOptions .= Xml::option( $show, $value, $oldConfig['expiry'] === $value );
			$expiryFormOptions .= "\n";
		}
		# Add stable version override and selection options
		$special = SpecialPage::getTitleFor( 'Stabilization' );
		$s .= Xml::openElement( 'form', array( 'name' => 'stabilization',
				'action' => $special->getLocalUrl(), 'method' => 'post' ) );
		$s .=
			Xml::fieldset( wfMsg( 'stabilization-def' ), false ) . "\n" .
			Xml::radioLabel( wfMsg( 'stabilization-def1' ), 'wpStableconfig-override', 1,
				'default-stable', 1 == $form->getOverride(), $this->disabledAttr() ) .
				'<br />' . "\n" .
			Xml::radioLabel( wfMsg( 'stabilization-def2' ), 'wpStableconfig-override', 0,
				'default-current', 0 == $form->getOverride(), $this->disabledAttr() ) . "\n" .
			Xml::closeElement( 'fieldset' ) .

			Xml::fieldset( wfMsg( 'stabilization-select' ), false ) .
			Xml::radioLabel( wfMsg( 'stabilization-select3' ), 'wpStableconfig-select',
				FLAGGED_VIS_PRISTINE, 'stable-select3',
				FLAGGED_VIS_PRISTINE == $form->getPrecedence(),
				$this->disabledAttr() ) . '<br />' . "\n" .
			Xml::radioLabel( wfMsg( 'stabilization-select1' ), 'wpStableconfig-select',
				FLAGGED_VIS_QUALITY, 'stable-select1',
				FLAGGED_VIS_QUALITY == $form->getPrecedence(),
				$this->disabledAttr() ) . '<br />' . "\n" .
			Xml::radioLabel( wfMsg( 'stabilization-select2' ), 'wpStableconfig-select',
				FLAGGED_VIS_LATEST, 'stable-select2',
				FLAGGED_VIS_LATEST == $form->getPrecedence(),
				$this->disabledAttr() ) . '<br />' . "\n" .
			Xml::closeElement( 'fieldset' );
		# Add autoreview restriction select
		$s .= Xml::fieldset( wfMsg( 'stabilization-restrict' ), false ) .
			$this->buildSelector( $form->getAutoreview() ) .
			Xml::closeElement( 'fieldset' ) .

			Xml::fieldset( wfMsg( 'stabilization-leg' ), false ) .
			Xml::openElement( 'table' );
		# Add expiry dropdown
		if ( $showProtectOptions && $form->isAllowed() ) {
			$s .= "
				<tr>
					<td class='mw-label'>" .
						Xml::label( wfMsg( 'stabilization-expiry' ), 'mwStabilizeExpirySelection' ) .
					"</td>
					<td class='mw-input'>" .
						Xml::tags( 'select',
							array(
								'id' 		=> 'mwStabilizeExpirySelection',
								'name' 		=> 'wpExpirySelection',
								'onchange'  => 'onFRChangeExpiryDropdown()',
							) + $this->disabledAttr(),
							$expiryFormOptions ) .
					"</td>
				</tr>";
		}
		# Add custom expiry field
		$attribs = array( 'id' => "mwStabilizeExpiryOther",
			'onkeyup' => 'onFRChangeExpiryField()' ) + $this->disabledAttr();
		$formExpiry = $form->getExpiry() ?
			$form->getExpiry() : $form->getOldExpiryGMT();
		$s .= "
			<tr>
				<td class='mw-label'>" .
					Xml::label( wfMsg( 'stabilization-othertime' ), 'mwStabilizeExpiryOther' ) .
				'</td>
				<td class="mw-input">' .
					Xml::input( "mwStabilize-expiry", 50, $formExpiry, $attribs ) .
				'</td>
			</tr>';
		# Add comment input and submit button
		if ( $form->isAllowed() ) {
			$watchLabel = wfMsgExt( 'watchthis', array( 'parseinline' ) );
			$watchAttribs = array( 'accesskey' => wfMsg( 'accesskey-watch' ),
				'id' => 'wpWatchthis' );
			$watchChecked = ( $wgUser->getOption( 'watchdefault' )
				|| $title->userIsWatching() );
			$reviewLabel = wfMsgExt( 'stabilization-review', array( 'parseinline' ) );

			$s .= ' <tr>
					<td class="mw-label">' .
						xml::label( wfMsg( 'stabilization-comment' ), 'wpReasonSelection' ) .
					'</td>
					<td class="mw-input">' .
						$reasonDropDown .
					'</td>
				</tr>
				<tr>
					<td class="mw-label">' .
						Xml::label( wfMsg( 'stabilization-otherreason' ), 'wpReason' ) .
					'</td>
					<td class="mw-input">' .
						Xml::input( 'wpReason', 70, $form->getReason(), array( 'id' => 'wpReason' ) ) .
					'</td>
				</tr>
				<tr>
					<td></td>
					<td class="mw-input">' .
						Xml::check( 'wpReviewthis', $form->getReviewThis(),
							array( 'id' => 'wpReviewthis' ) ) .
						"<label for='wpReviewthis'>{$reviewLabel}</label>" .
						'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .
						Xml::check( 'wpWatchthis', $watchChecked, $watchAttribs ) .
						"<label for='wpWatchthis'" . $this->sk->tooltipAndAccesskey( 'watch' ) .
							">{$watchLabel}</label>" .
					'</td>
				</tr>
				<tr>
					<td></td>
					<td class="mw-submit">' .
						Xml::submitButton( wfMsg( 'stabilization-submit' ) ) .
					'</td>
				</tr>' . Xml::closeElement( 'table' ) .
				Xml::hidden( 'title', $this->getTitle()->getPrefixedDBKey() ) .
				Xml::hidden( 'page', $title->getPrefixedText() ) .
				Xml::hidden( 'wpEditToken', $wgUser->editToken() );
		} else {
			$s .= Xml::closeElement( 'table' );
		}
		$s .= Xml::closeElement( 'fieldset' ) . Xml::closeElement( 'form' );

		$wgOut->addHTML( $s );

		$wgOut->addHTML( Xml::element( 'h2', null,
			htmlspecialchars( LogPage::logName( 'stable' ) ) ) );
		LogEventsList::showLogExtract( $wgOut, 'stable', $title->getPrefixedText() );

		# Add some javascript for expiry dropdowns
		PageStabilityForm::addProtectionJS();
	}

	protected function buildSelector( $selected ) {
		$allowedLevels = array();
		$levels = FlaggedRevs::getRestrictionLevels();
		array_unshift( $levels, '' ); // Add a "none" level
		foreach ( $levels as $key ) {
			# Don't let them choose levels they can't set, 
			# but *show* them all when the form is disabled.
			if ( $this->form->isAllowed()
				&& !FlaggedRevs::userCanSetAutoreviewLevel( $key ) )
			{
				continue;
			}
			$allowedLevels[] = $key;
		}
		$id = 'mwProtect-level-autoreview';
		$attribs = array(
			'id' => $id,
			'name' => $id,
			'size' => count( $allowedLevels ),
		) + $this->disabledAttr();

		$out = Xml::openElement( 'select', $attribs );
		foreach ( $allowedLevels as $key ) {
			$out .= Xml::option( $this->getOptionLabel( $key ), $key, $key == $selected );
		}
		$out .= Xml::closeElement( 'select' );
		return $out;
	}

	/**
	 * Prepare the label for a protection selector option
	 *
	 * @param string $permission Permission required
	 * @return string
	 */
	protected function getOptionLabel( $permission ) {
		if ( $permission == '' ) {
			return wfMsg( 'stabilization-restrict-none' );
		} else {
			$key = "protect-level-{$permission}";
			$msg = wfMsg( $key );
			if ( wfEmptyMsg( $key, $msg ) ) {
				$msg = wfMsg( 'protect-fallback', $permission );
			}
			return $msg;
		}
	}

	// If the this form is disabled, then return the "disabled" attr array
	protected function disabledAttr() {
		return $this->form->isAllowed()
			? array()
			: array( 'disabled' => 'disabled' );
	}
}
