<?php

class ApiCodeDiff extends ApiBase {

	public function execute() {
		$params = $this->extractRequestParams();

		if ( !isset( $params['repo'] ) ) {
			$this->dieUsageMsg( array( 'missingparam', 'repo' ) );
		}
		if ( !isset( $params['rev'] ) ) {
			$this->dieUsageMsg( array( 'missingparam', 'rev' ) );
		}

		$repo = CodeRepository::newFromName( $params['repo'] );
		if ( !$repo ) {
			$this->dieUsage( "Invalid repo ``{$params['repo']}''", 'invalidrepo' );
		}

		$svn = SubversionAdaptor::newFromRepo( $repo->getPath() );
		$lastStoredRev = $repo->getLastStoredRev();

		if ( $params['rev'] > $lastStoredRev ) {
			$this->dieUsage( "There is no revision with ID {$params['rev']}", 'nosuchrev' );
		}

		$diff = $repo->getDiff( $params['rev'] );

		if ( $diff ) {
			$hilite = new CodeDiffHighlighter();
			$html = $hilite->render( $diff );
		} else {
			// FIXME: Are we sure we don't want to throw an error here?
			$html = 'Failed to load diff.';
		}

		$data = array(
			'repo' => $params['repo'],
			'id' => $params['rev'],
			'diff' => $html
		);
		$this->getResult()->addValue( 'code', 'rev', $data );
	}

	public function getAllowedParams() {
		return array(
			'repo' => null,
			'rev' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_MIN => 1
			)
		);
	}

	public function getParamDescription() {
		return array(
			'repo' => 'Name of repository to look at',
			'rev' => 'Revision ID to fetch diff of' );
	}

	public function getDescription() {
		return array(
			'Fetch formatted diff from CodeReview\'s backing revision control system.' );
	}

	public function getExamples() {
		return array(
			'api.php?action=codediff&repo=MediaWiki&rev=42080',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
