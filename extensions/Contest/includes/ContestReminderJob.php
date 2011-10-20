<?php

/**
 * Contest reminder job for email reminders.
 *
 * @since 0.1
 *
 * @file ContestReminderJob.php
 * @ingroup Contest
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ContestReminderJob extends Job {

	/**
	 * Constructor.
	 *
	 * @param Title $title
	 * @param array $params
	 * * contestants, array of ContestContestant, required
	 * * contest, Contest, required
	 */
	public function __construct( Title $title, array $params ) {
		parent::__construct( 'ContestReminderJob', $title, $params );
		$this->params['emailText'] = ContestUtils::getParsedArticleContent( $this->params['reminder_email'] );
		$this->params['daysLeft'] = $this->params['contest']->getDaysLeft();
	}

	/**
	 * Execute the job.
	 *
	 * @return bool
	 */
	public function run() {
		/**
		 * @var $contestant ContestContestant
		 */
		foreach ( $this->params['contestants'] as /* ContestContestant */ $contestant ) {
			$contestant->sendReminderEmail( $this->params['emailText'], array(
				'daysLeft' => $this->params['daysLeft'],
			) );
		}

		return true;
	}

}
