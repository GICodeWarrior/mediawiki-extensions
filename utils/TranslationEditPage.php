<?php
/**
 * Contains classes that imeplement the server side component of AJAX
 * translation page.
 *
 * @file
 * @author Niklas Laxström
 * @copyright Copyright © 2009-2010 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * This class together with some JavaScript implements the AJAX translation
 * page.
 */
class TranslationEditPage {
	// Instance of an Title object
	protected $title;
	protected $suggestions = 'sync';

	/**
	 * Constructor.
	 * @param $title  Title  A title object
	 */
	public function __construct( Title $title ) {
		$this->setTitle( $title );
	}

	/**
	 * Constructs a page from WebRequest.
	 * This interface is a big klunky.
	 * @param $request WebRequest
	 * @return TranslationEditPage
	 */
	public static function newFromRequest( WebRequest $request ) {
		$title = Title::newFromText( $request->getText( 'page' ) );

		if ( !$title ) {
			return null;
		}

		$obj = new self( $title );
		$obj->suggestions = $request->getText( 'suggestions' );
		return $obj;
	}

	/**
	 * Change the title of the page we are working on.
	 */
	public function setTitle( Title $title ) { $this->title = $title; }
	/**
	 * Get the title of the page we are working on.
	 * @return Title
	 */
	public function getTitle() { return $this->title; }

	/**
	 * Generates the html snippet for ajax edit. Echoes it to the output and
	 * disabled all other output.
	 */
	public function execute() {
		global $wgOut, $wgServer, $wgScriptPath;

		$wgOut->disable();

		$data = $this->getEditInfo();
		$helpers = new TranslationHelpers( $this->getTitle() );

		$id = "tm-target-{$helpers->dialogID()}";
		$helpers->setTextareaId( $id );

		if ( $this->suggestions === 'only' ) {
			echo $helpers->getBoxes( $this->suggestions );
			return;
		}

		if ( $this->suggestions === 'checks' ) {
			echo $helpers->getBoxes( $this->suggestions );
			return;
		}

		$translation = $helpers->getTranslation();
		$rows = substr_count( $translation, "\n" ) + 2;
		$textareaParams = array(
			'name' => 'text',
			'class' => 'mw-translate-edit-area',
			'rows' =>  $rows <= 15 ? $rows : 15,
			'id' => $id,
		);
		$textarea = Html::element( 'textarea', $textareaParams, $translation );

		$hidden = array();
		$hidden[] = Xml::hidden( 'title', $this->getTitle()->getPrefixedDbKey() );

		if ( isset( $data['revisions'][0]['timestamp'] ) ) {
			$hidden[] = Xml::hidden( 'basetimestamp', $data['revisions'][0]['timestamp'] );
		}

		$hidden[] = Xml::hidden( 'starttimestamp', $data['starttimestamp'] );
		$hidden[] = Xml::hidden( 'token', $data['edittoken'] );
		$hidden[] = Xml::hidden( 'format', 'json' );
		$hidden[] = Xml::hidden( 'action', 'edit' );

		$summary = Xml::inputLabel( wfMsg( 'summary' ), 'summary', 'summary', 40 );
		$save = Xml::submitButton( wfMsg( 'savearticle' ), array( 'style' => 'font-weight:bold', 'class' => 'mw-translate-save' ) );
		$saveAndNext = Xml::submitButton( wfMsg( 'translate-js-next' ), array( 'class' => 'mw-translate-next' ) );
		$skip = Html::element( 'input', array( 'class' => 'mw-translate-skip', 'type' => 'button', 'value' => wfMsg( 'translate-js-skip' ) ) );

		if ( $this->getTitle()->exists() ) {
			$history = Html::element(
				'input',
				array(
					'class' => 'mw-translate-history',
					'type' => 'button',
					'value' => wfMsg( 'translate-js-history' )
				)
			);
		} else {
			$history = '';
		}

		// Use the api to submit edits
		$formParams = array(
			'action' => "{$wgServer}{$wgScriptPath}/api.php",
			'method' => 'post',
		);

		$form = Html::rawElement( 'form', $formParams,
			implode( "\n", $hidden ) . "\n" .
			$helpers->getBoxes( $this->suggestions ) . "\n" .
			"$textarea\n$summary$save$saveAndNext$skip$history"
		);

		echo Html::rawElement( 'div', array( 'class' => 'mw-ajax-dialog' ), $form );
	}

	/**
	 * Gets the edit token and timestamps in some ugly array structure. Needs to
	 * be cleaned up.
	 * @return \array
	 */
	protected function getEditInfo() {
		$params = new FauxRequest( array(
			'action' => 'query',
			'prop' => 'info|revisions',
			'intoken' => 'edit',
			'titles' => $this->getTitle(),
			'rvprop' => 'timestamp',
		) );

		$api = new ApiMain( $params );
		$api->execute();
		$data = $api->getResultData();
		$data = $data['query']['pages'];
		$data = array_shift( $data );

		return $data;
	}

	/**
	 * Returns link attributes that enable javascript translation dialog.
	 * Will degrade gracefully if user does not have permissions or JavaScript
	 * is not enabled.
	 * @param $title Title Title object for the translatable message.
	 * @param $group \string The group in which this message belongs to.
	 *   Optional, but avoids a lookup later if provided.
	 * @return \array
	 */
	public static function jsEdit( Title $title, $group = "" ) {
		global $wgUser;

		if ( !$wgUser->isAllowed( 'translate' ) ) {
			return array();
		}

		if ( !$wgUser->getOption( 'translate-jsedit' ) ) {
			return array();
		}

		$dbKey = $title->getPrefixedDbKey();
		$jsTitle = Xml::escapeJsString( $dbKey );
		$jsGroup = Xml::escapeJsString( $group );

		return array(
			'onclick' => "return trlOpenJsEdit( \"$jsTitle\", \"$jsGroup\" );",
			'title' => wfMsg( 'translate-edit-title', $dbKey )
		);
	}
}
