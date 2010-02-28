<?php
/**
 * API extension for Storyboard.
 * 
 * @file ApiStories.php
 * @ingroup Storyboard
 * 
 * @author Jeroen De Dauw
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	// Eclipse helper - will be ignored in production
	require_once ( "ApiBase.php" );
}

/**
 * This action returns the html for Stories to be displayed in a storyboard.
 *
 * @ingroup Storyboard
 */
class ApiStoryboardStoriesFeed extends ApiQueryBase {
	public function __construct( $main, $action ) {
		parent :: __construct( $main, $action, 'st' );
	}

	/**
	 * Retrieve the stories from the database.
	 */
	public function execute() {
		// Get the requests parameters.
		$params = $this->extractRequestParams();
		
		$this->addTables( 'storyboard' );
		$this->addFields( array(
			'story_id',
			'story_author_name',
			'story_title',
			'story_text',
			'story_created'
		) );
		$this->addWhere( array(
			'story_is_published' => 1
		) );
		$this->addOption( 'LIMIT', $params['limit'] );
		$this->addOption( 'ORDER BY', 'story_modified DESC' );
		
		$stories = $this->select( __METHOD__ );
		
		while ( $story = $stories->fetchObject() ) {
			$res = array(
				'id' => $story->story_id,
				'author' => $story->story_author_name,
				'title' => $story->story_title,
				'text' => $story->story_text,
				'created' => wfTimestamp(  TS_ISO_8601, $story->story_created ),
			);
			$this->getResult()->addValue( array( 'query', $this->getModuleName() ), null, $res );
		}
		
		$this->getResult()->setIndexedTagName_internal( array( 'query', $this->getModuleName() ), 'story' );
	}
	
	/**
	 * TODO
	 * @see includes/api/ApiBase#getAllowedParams()
	 */
	public function getAllowedParams() {
		return array (
			'limit' => array(
				ApiBase :: PARAM_DFLT => 10,
				ApiBase :: PARAM_TYPE => 'limit',
				ApiBase :: PARAM_MIN => 1,
				ApiBase :: PARAM_MAX => ApiBase :: LIMIT_BIG1,
				ApiBase :: PARAM_MAX2 => ApiBase :: LIMIT_BIG2
			),
			'continue' => null,						
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getParamDescription()
	 */
	public function getParamDescription() {
		return array (
			'offset' => 'Number of the first story to return',
			'size'   => 'Amount of stories to return',
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getDescription()
	 */
	public function getDescription() {
		return 'This module returns stories for a storyboard';
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getExamples()
	 */
	protected function getExamples() {
		return array (
			'api.php?action=query&list=stories',
			'api.php?action=query&list=stories&stcontinue=42',
			'api.php?action=query&list=stories&stcontinue=4&stlimit=2',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}	
	
}