<?php

/**
 * Contest interface for judges.
 *
 * @since 0.1
 *
 * @file SpecialContest.php
 * @ingroup Contest
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialContest extends SpecialContestPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Contest', 'contestjudge', false );
	}

	/**
	 * Main method.
	 *
	 * @since 0.1
	 *
	 * @param string $arg
	 */
	public function execute( $subPage ) {
		$subPage = str_replace( '_', ' ', $subPage );

		$subPage = explode( '/', $subPage, 2 );
		$challengeTitle = count( $subPage ) > 1 ? $subPage[1] : false;

		$subPage = $subPage[0];

		if ( !parent::execute( $subPage ) ) {
			return;
		}

		$out = $this->getOutput();

		/**
		 * @var $contest Contest
		 */
		$contest = Contest::s()->selectRow( null, array( 'name' => $subPage ) );

		if ( $contest === false ) {
			$out->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
		}
		else {
			$out->setPageTitle( wfMsgExt( 'contest-contest-title', 'parseinline', $contest->getField( 'name' ) ) );

			$this->displayNavigation();
			$this->showGeneralInfo( $contest );
			$this->showMailFunctionality( $contest );
			$this->showContestants( $contest, $challengeTitle );

			$out->addModules( 'contest.special.contest' );
		}
	}

	/**
	 * Display the general contest info.
	 *
	 * @since 0.1
	 *
	 * @param Contest $contest
	 */
	protected function showGeneralInfo( Contest $contest ) {
		$out = $this->getOutput();

		$out->addHTML( Html::openElement( 'table', array( 'class' => 'wikitable contest-summary' ) ) );

		foreach ( $this->getSummaryData( $contest ) as $stat => $value ) {
			$out->addHTML( '<tr>' );

			$out->addHTML( Html::element(
				'th',
				array( 'class' => 'contest-summary-name' ),
				wfMsg( 'contest-contest-' . $stat )
			) );

			$out->addHTML( Html::element(
				'td',
				array( 'class' => 'contest-summary-value' ),
				$value
			) );

			$out->addHTML( '</tr>' );
		}

		$out->addHTML( Html::closeElement( 'table' ) );
	}

	/**
	 * Gets the summary data.
	 *
	 * @since 0.1
	 *
	 * @param Contest $contest
	 *
	 * @return array
	 */
	protected function getSummaryData( Contest $contest ) {
		$stats = array();

		$stats['name'] = $contest->getField( 'name' );
		$stats['status'] = Contest::getStatusMessage( $contest->getStatus() );
		$stats['submissioncount'] = $this->getLang()->formatNum( $contest->getField( 'submission_count' ) );

		$stats['end'] = wfMsgExt(
			$contest->getDaysLeft() < 0 ? 'contest-contest-days-ago' : 'contest-contest-days-left',
			'parsemag',
			$this->getLang()->timeanddate( $contest->getField( 'end' ), true ),
			$this->getLang()->formatNum( abs( $contest->getDaysLeft() ) )
		);

		return $stats;
	}

	/**
	 *
	 *
	 * @since 0.1
	 *
	 * @param Contest $contest
	 */
	protected function showMailFunctionality( Contest $contest ) {
		$out = $this->getOutput();

		$out->addHTML( Html::element( 'h3', array(), wfMsg( 'contest-contest-reminder-mail' ) ) );

		$out->addWikiMsg( 'contest-contest-reminder-page', $contest->getField( 'reminder_email' ) );

		$out->addHTML( Html::element(
			'button',
			array(
				'id' => 'send-reminder',
				'data-token' => $this->getUser()->editToken(),
				'data-contest-id' => $contest->getId()
			),
			wfMsg( 'contest-contest-send-reminder' )
		) );

		$out->addHTML( Html::rawElement(
			'div',
			array(
				'id' => 'reminder-content',
				'style' => 'display:none'
			),
			ContestUtils::getParsedArticleContent( $contest->getField( 'reminder_email' ) )
		) );
	}

	/**
	 * Show a paged list of the contestants foe this contest.
	 *
	 * @since 0.1
	 *
	 * @param Contest $contest
	 * @param string|false $challengeTitle
	 */
	protected function showContestants( Contest $contest, $challengeTitle ) {
		$out = $this->getOutput();

		$out->addHTML( Html::element( 'h3', array(), wfMsg( 'contest-contest-contestants' ) ) );

		$conds = array(
			'contestant_contest_id' => $contest->getId()
		);

		if ( $challengeTitle !== false ) {
			$challenge = ContestChallenge::s()->selectRow( 'id', array( 'title' => $challengeTitle ) );

			if ( $challenge !== false ) {
				$conds['contestant_challenge_id'] = $challenge->getField( 'id' );
				unset( $conds['contestant_contest_id'] ); // Not needed because the challenge implies the context
			}
		}

		$out->addWikiMsg( 'contest-contest-contestants-text' );

		$pager = new ContestantPager( $this, $conds );

		if ( $pager->getNumRows() ) {
			$out->addHTML(
				$pager->getNavigationBar() .
				$pager->getBody() .
				$pager->getNavigationBar()
			);
		}
		else {
			$out->addWikiMsg( 'contest-contest-no-results' );
		}
	}

}
