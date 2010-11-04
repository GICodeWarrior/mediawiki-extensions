<?php

class HtmlUiForm extends HtmlUiFormElementCollection {
	
	/* Protected Methods */
	
	protected function getDefaultOptions() {
		return array(
			'action' => './',
			'method' => 'post',
		);
	}
	
	/* Method */
	
	public function render() {
		$template = new HtmlUiTemplate( 'extensions/HtmlUi/templates/HtmlUiForm.php' );
		return $template->render( array_merge(
			array( 'attributes' => array(
				'action' => $this->options['action'],
				'method' => $this->options['method'],
			),
			$this->elements
		) );
	}
	
	public function validate() {
		//
	}
}
