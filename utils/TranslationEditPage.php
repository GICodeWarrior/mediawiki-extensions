<?php
/**
 * This class together with some javascript implements the ajax translation
 * page.
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2009 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
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

	public static function newFromRequest( WebRequest $request ) {
		$title = Title::newFromText( $request->getText( 'page' ) );

		if ( !$title ) {
			return null;
		}

		$obj = new self( $title );
		$obj->suggestions = $request->getText( 'suggestions' );
		return $obj;
	}


	public function setTitle( Title $title ) { $this->title = $title; }
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

		if ( $this->suggestions === 'only' ) {
			echo $helpers->getBoxes( $this->suggestions );
			return;
		}

		// jQuery borks on something, probably to :, thus, don't use special chars
		$id = Sanitizer::escapeId( sha1( $this->getTitle()->getPrefixedText() ) );
		$helpers->setTextareaId( $id );

		$translation = $helpers->getTranslation();
		$short = strpos( $translation, "\n" ) === false && strlen( $translation ) < 200;
		$textareaParams = array(
			'name' => 'text',
			'class' => 'mw-translate-edit-area',
			'rows' =>  $short ? 3: 10,
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
		$save = Xml::submitButton( wfMsg( 'savearticle' ), array( 'style' => 'font-weight:bold' ) );
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
	 * @return Array
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
