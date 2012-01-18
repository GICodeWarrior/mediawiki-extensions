<?php

class SpecialCongressFail extends UnlistedSpecialPage {

	/**
	 * Constructor.
	 *
	 * @param $request is the request (usually wgRequest)
	 * @param $par is everything in the URL after Special:CongressFail
	 */
	public function __construct( $request = null, $par = null ) {
		parent::__construct( 'SpecialCongressFail' );
	}

	public function execute( $subPage ) {
		global $wgRequest, $wgUser;

		$out = $this->getOutput();

		$this->setHeaders();
		$this->outputHeader();

		$out->addHtml('<body>');


		$out->addHtml('</body>');
	}

}
