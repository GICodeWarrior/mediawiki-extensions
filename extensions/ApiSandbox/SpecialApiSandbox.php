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
		$out->addModules( 'ext.apiSandbox' );

		$out->addHTML( '<noscript>' . wfMessage( 'apisb-no-js' )->parse() . '</noscript>
<div id="api-sandbox-content" style="display: none">' );
		$out->addWikiMsg( 'apisb-intro' );
		$out->addHTML( $this->openFieldset( 'parameters' )
			. $this->getInputs()
			. '</fieldset>'
			. $this->openFieldset( 'result' )
			. '<table class="api-sandbox-result-container"><tbody>
'
			. '<tr><td class="api-sandbox-result-label"><label for="api-sandbox-url">'
			. wfMessage( 'apisb-request-url' )->parse() . '</label></td>'
			. '<td><input id="api-sandbox-url" readonly="readonly" /></td></tr>
'
			. '<tr id="api-sandbox-post-row"><td class="api-sandbox-result-label"><label for="api-sandbox-post">'
			. wfMessage( 'apisb-request-post' )->parse() . '</label></td>'
			. '<td><input id="api-sandbox-post" readonly="readonly" /></td></tr>
'
			. '<tr><td colspan="2"><div id="api-sandbox-output"></div></td></tr>'
			. "\n</tbody></table>"
			. "\n</fieldset>" );
		
		$out->addHTML( "\n</div>" ); # <div id="api-sandbox-content">
	}

	private function getInputs() {
		global $wgEnableWriteAPI;

		$apiMain = new ApiMain( new FauxRequest( array() ), $wgEnableWriteAPI );
		$apiQuery = new ApiQuery( $apiMain, 'query' );
		$formats = array_flip( array_filter( array_keys( $apiMain->getFormats() ),
			'SpecialApiSandbox::filterFormats' ) );

		$s = '<table class="api-sandbox-options">
<tbody>
';
		$s .= '<tr><td class="api-sandbox-label"><label for="api-sandbox-format">format=</label></td><td class="api-sandbox-value">' 
		. $this->getSelect( 'format', $formats, 'json' )
		. '</td><td></td></tr>
';
		$s .= '<tr><td class="api-sandbox-label"><label for="api-sandbox-action">action=</label></td><td class="api-sandbox-value">' 
		. $this->getSelect( 'action',  $apiMain->getModules() )
		. '</td><td id="api-sandbox-help" rowspan="2"></td></tr>
';
		$s .= '<tr id="api-sandbox-prop-row" style="display: none"><td class="api-sandbox-label">'
			. '<label for="api-sandbox-prop">prop=</label></td><td class="api-sandbox-value">'
			. $this->getSelect( 'prop', $apiQuery->getModules() )
			. '</td></tr>
</table>
<div id="api-sandbox-further-inputs"></div>
';
		$s .= Html::element( 'input',
			array(
				'type' => 'button',
				'id' => 'api-sandbox-submit',
				'value' => wfMessage( 'apisb-submit' )->text(),
				'disabled' => 'disabled',
			) 
		) . "\n";
		return $s;
	}

	private function getSelect( $name, $items, $default = false ) {
		$items = array_keys( $items );
		sort( $items );
		$s = Html::openElement( 'select', array(
			'class' => 'api-sandbox-input',
			'name' => $name,
			'id' => "api-sandbox-$name" )
		);
		if ( $default === false ) {
			$s .= "\n\t" . Html::element( 'option', 
				array( 'value' => '-', 'selected' => 'selected' ),
				wfMessage( "apisb-select-$name" )->text()
			);
		}
		foreach ( $items as $item ) {
			$attributes = array( 'value' => $item );
			if ( $item === $default ) {
				$attributes['selected'] = 'selected';
			}
			$s .= "\n\t" . Html::element( 'option', $attributes, $item );
		}
		$s .= "\n" . Html::closeElement( 'select' ) . "\n";
		return $s;
	}

	private function openFieldset( $name ) {
	return "\n" . Html::openElement( 'fieldset', array( 'id' => "api-sandbox-$name" ) )
		. "\n\t" . Html::rawElement( 'legend', array(), wfMessage( "apisb-$name" )->parse() )
		. "\n";
	}

	/**
	 * Callback that returns false if its argument (format name) ends with 'fm'
	 * @return boolean
	 */
	private static function filterFormats( $value ) {
		return !preg_match( '/fm$/', $value );
	}
}