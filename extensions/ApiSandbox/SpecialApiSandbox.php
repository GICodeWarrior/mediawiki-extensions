<?php

class SpecialApiSandbox extends SpecialPage {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'ApiSandbox', '', true );
	}

	/**
	 * Main execution function
	 * @param $par Parameters passed to the page
	 */
	public function execute( $par ) {
		global $wgEnableAPI;

		$out = $this->getContext()->getOutput();

		if ( !$wgEnableAPI ) {
			$out->showErrorPage( 'error', 'apisb-api-disabled' );
		}
		
		$this->setHeaders();
		$out->setPageTitle( wfMessage( 'apisb-title' )->parse() );
		$out->addModules( 'ext.apiSandbox' );

		$out->addHTML( '<noscript>' . wfMessage( 'apisb-no-js' )->escaped() . '</noscript>
<div id="api-sandbox-content" style="display: none">' );
		$out->addWikiMsg( 'apisb-intro' );
		$out->addHTML( $this->openFieldset( 'parameters' ) 
			. $this->getInputs() . '
</fieldset>
' . $this->openFieldset( 'result' ) . '
</fieldset>' );
		
		$out->addHTML( '</div>' ); # <div id="api-sandbox-content">
	}

	private function getInputs() {
		global $wgEnableWriteAPI;

		$apiMain = new ApiMain( new FauxRequest( array() ), $wgEnableWriteAPI );
		$apiQuery = new ApiQuery( $apiMain, 'query' );

		$s = '<table class="api-sandbox-options">
<tbody>
<tr><td class="api-sandbox-label"><label for="api-sandbox-action">action=</label></td><td class="api-sandbox-value">' 
			. $this->getSelect( 'action',  $apiMain->getModules() ) . '</td><td id="api-sandbox-help" rowspan="2"></td></tr>
';
		$s .= '<tr id="api-sandbox-prop-row" style="display: none"><td class="api-sandbox-label"><label for="api-sandbox-prop">prop=</label></td><td class="api-sandbox-value">'
			. $this->getSelect( 'prop', $apiQuery->getModules() )
			. '</td></tr>
</table>
<div id="api-sandbox-further-inputs"></div>
';
		return $s;
	}

	private function getSelect( $name, $items ) {
		$items = array_keys( $items );
		sort( $items );
		$s = Html::openElement( 'select', array(  'class' => 'api-sandbox-input', 'name' => $name, 'id' => "api-sandbox-$name" ) );
		$s .= "\n\t" . Html::element( 'option', 
			array( 'value' => '-', 'selected' => 'selected' ),
			wfMessage( "apisb-select-$name" )->text()
		);
		foreach ( $items as $item ) {
			$s .= "\n\t" . Html::element( 'option', array( 'value' => $item ), $item );
		}
		$s .= "\n" . Html::closeElement( 'select' ) . "\n";
		return $s;
	}

	private function openFieldset( $name ) {
	return "\n" . Html::openElement( 'fieldset', array( 'id' => "api-sandbox-$name" ) )
		. "\n\t" . Html::rawElement( 'legend', array(), wfMessage( "apisb-$name" )->parse() )
		. "\n";
	}
}