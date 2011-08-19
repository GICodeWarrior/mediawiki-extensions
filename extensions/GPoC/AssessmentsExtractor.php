<?php

/**
 * Helps extract assessments from a parsed $DOM file
 **/
class AssessmentsExtractor
{
	private $mText;

	function __construct( $preparedText ) {
		$this->mText = $preparedText;
	}	

	public function extractAssessments() {
		$regex = '/<span data-project-name="(?P<project>.*)" data-importance="(?P<importance>.*)" data-quality="(?P<quality>.*)"\s*>/';
		$matches = array();
		preg_match_all($regex, $this->mText, $matches, PREG_SET_ORDER);

		$assessments = array();
		foreach($matches as $match) {
			$assessments[$match['project']] = array(
				'importance' => $match['importance'],
				'quality' => $match['quality']
			);
		}
		return $assessments;
	}
}
