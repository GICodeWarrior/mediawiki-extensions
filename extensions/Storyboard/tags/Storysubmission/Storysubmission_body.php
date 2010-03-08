<?php

/**
 * File holding the rendering function for the Storysubmission tag.
 *
 * @file Storysubmission_body.php
 * @ingroup Storyboard
 *
 * @author Jeroen De Dauw
 * 
 * Notice: This class is designed with the idea that only one storysubmission form is placed
 * on a single page, and might not work properly when multiple are placed on a page.
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

class TagStorysubmission {
	
	public static function render( $input, $args, $parser, $frame ) {
		wfProfileIn( __METHOD__ );

		global $wgRequest, $wgUser;
		
		if ( $wgRequest->wasPosted() && $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
			$output = self::doSubmissionAndGetResult();
		} else {
			$output = self::getFrom( $parser, $args );
		}
		
		return $output;
		
		wfProfileOut( __METHOD__ );
	}
	
	/**
	 * Returns the HTML for a storysubmission form.
	 * 
	 * @param $parser
	 * @param array $args
	 * @return HTML
	 * 
	 * TODO: any sort of client side validation?
	 */
	private static function getFrom( $parser, array $args ) {
		global $wgOut, $wgUser, $wgJsMimeType, $egStoryboardScriptPath, $egStorysubmissionWidth, $egStoryboardMaxStoryLen, $egStoryboardMinStoryLen;
		
		$wgOut->addStyle( $egStoryboardScriptPath . '/tags/Storysubmission/storysubmission.css' );
		$wgOut->addScriptFile( $egStoryboardScriptPath . '/tags/Storysubmission/storysubmission.js' );
		
		$fieldSize = 50;
		
		$width = StoryboardUtils::getDimension( $args, 'width', $egStorysubmissionWidth );
		$maxLen = array_key_exists('maxlength', $args) && is_numeric($args['maxlength']) ? $args['maxlength'] : $egStoryboardMaxStoryLen;
		$minLen = array_key_exists('minlength', $args) && is_numeric($args['minlength']) ? $args['minlength'] : $egStoryboardMinStoryLen;
		
		$submissionUrl = $parser->getTitle()->getLocalURL( 'action=purge' );
		
		$formBody = "<table width='$width'>";
		
		$defaultName = '';
		if ( $wgUser->isLoggedIn() ) {
			$defaultName = $wgUser->getRealName() !== '' ? $wgUser->getRealName() : $wgUser->getName();
		}
		$formBody .= '<tr>' .
			Html::element( 'td', array('width' => '100%'), wfMsg( 'storyboard-yourname' ) ) .
			'<td>' . 
			Html::input('name', $defaultName, 'text', array( 'size' => $fieldSize )
			) . '</td></tr>';
		
		$formBody .= '<tr>' .
			Html::element( 'td', array('width' => '100%'), wfMsg( 'storyboard-location' ) ) .
			'<td>' . Html::input('location', '', 'text', array( 'size' => $fieldSize )
			) . '</td></tr>';
		
		$formBody .= '<tr>' .
			Html::element( 'td', array('width' => '100%'), wfMsg( 'storyboard-occupation' ) ) .
			'<td>' . Html::input('occupation', '', 'text', array( 'size' => $fieldSize )
			) . '</td></tr>';

		$formBody .= '<tr>' .
			Html::element( 'td', array('width' => '100%'), wfMsg( 'storyboard-contact' ) ) .
			'<td>' . Html::input('contact', '', 'text', array( 'size' => $fieldSize )
			) . '</td></tr>';
			
		$formBody .= '<tr>' .
			Html::element( 'td', array('width' => '100%'), wfMsg( 'storyboard-storytitle' ) ) .
			'<td>' . Html::input('storytitle', '', 'text', array( 'size' => $fieldSize )
			) . '</td></tr>';			
		
		$formBody .= '<tr><td colspan="2">' .
			wfMsg( 'storyboard-story' ) .
			Html::element(
				'div',
				array('class' => 'storysubmission-charcount', 'id' => 'storysubmission-charlimitinfo'),
				wfMsgExt( 'storyboard-charsneeded', 'parsemag', $minLen )
			) .
			'<br />' . 
			Html::element(
				'textarea',
				array(
					'id' => 'storytext',
					'name' => 'storytext',
					'rows' => 7,
					'onkeyup' => "stbValidateStory( this, $minLen, $maxLen, 'storysubmission-charlimitinfo', 'storysubmission-button' )",
				),
				null
			) .
			'</td></tr>';
		
		// TODO: add upload functionality
		
		$formBody .= '<tr><td colspan="2"><input type="checkbox" id="storyboard-agreement" />&nbsp;' .
			htmlspecialchars( wfMsg( 'storyboard-agreement' ) ) .
			'</td></tr>';
			
		$formBody .= '<tr><td colspan="2">' . 
			Html::input( '', wfMsg( 'htmlform-submit' ), 'submit', array('id' => 'storysubmission-button') ) .
			'</td></tr>';
			
		$formBody .= '</table>';
		
		$formBody .= Html::hidden( 'wpEditToken', $wgUser->editToken() );
		
		return Html::rawElement(
			'form',
			array(
				'id' => 'storyform',
				'name' => 'storyform',
				'method' => 'post',
				'action' => $submissionUrl,
				'onsubmit' => 'return stbValidateSubmission( "storyboard-agreement" );'
			),
			$formBody
		);
	}
	
	/**
	 * Store the submitted story in the database, and return a page telling the user his story has been submitted.
	 */
	private static function doSubmissionAndGetResult() {
		global $wgRequest, $wgUser;
		
		$dbw = wfGetDB( DB_MASTER );
		
		// TODO: some sort of validation?
		
		$story = array(
			'story_author_name' => $wgRequest->getText( 'name' ),
			'story_author_location' => $wgRequest->getText( 'location' ),
			'story_author_occupation' => $wgRequest->getText( 'occupation' ),
			'story_title' => $wgRequest->getText( 'storytitle' ),
			'story_text' => $wgRequest->getText( 'storytext' ),
			'story_created' => $dbw->timestamp( time() ),
			'story_modified' => $dbw->timestamp( time() ),
		);

		// If the user is logged in, also store his user id.
		if ( $wgUser->isLoggedIn() ) {
			$story[ 'story_author_id' ] = $wgUser->getId();
		}
		
		$dbw->insert( 'storyboard', $story );
		
		$responseHtml = ''; // TODO: create html response
		
		return $responseHtml;
	}
	
}