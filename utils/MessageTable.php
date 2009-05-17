<?php
/**
 * Pretty-formatter for message collections
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2007-2009 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
class MessageTable {

	protected $reviewMode = false;
	protected $collection = null;
	protected $group = null;
	protected $editLinkParams = array();

	protected $headers = array(
		'table' => array( 'msg', 'allmessagesname' ),
		'current' => array( 'msg', 'allmessagescurrent' ),
		'default' => array( 'msg', 'allmessagesdefault' ),
	);

	public function __construct( MessageCollection $collection, MessageGroup $group ) {
		$this->collection = $collection;
		$this->group = $group;
		$this->setHeaderText( 'table', $group->getLabel() );
		$this->appendEditLinkParams( 'loadgroup', $group->getId() );
	}

	public function setEditLinkParams( array $array ) {
		$this->editLinkParams = $array;
	}

	public function appendEditLinkParams( $key, $value ) {
		$this->editLinkParams[$key] = $value;
	}

	public function setReviewMode( $mode = true ) {
		$this->reviewMode = $mode;
	}

	public function setHeaderTextMessage( $type, $value ) {
		if ( !isset($this->headers[$type]) ) throw new MWException( "Unexpected type $type" );
		$this->headers[$type] = array( 'msg', $value );
	}

	public function setHeaderText( $type, $value ) {
		if ( !isset($this->headers[$type]) ) throw new MWException( "Unexpected type $type" );
		$this->headers[$type] = array( 'raw', htmlspecialchars($value) );
	}


	public function header() {
		$tableheader = Xml::openElement( 'table', array(
			'class'   => 'mw-sp-translate-table',
			'border'  => '1',
			'cellspacing' => '0' )
		);

		if ( $this->reviewMode ) {
			$tableheader .= Xml::openElement( 'tr' );
			$tableheader .= Xml::element( 'th',
				array( 'rowspan' => '2' ),
				$this->headerText( 'table' )
			);
			$tableheader .= Xml::tags( 'th', null, $this->headerText( 'default' ) );
			$tableheader .= Xml::closeElement( 'tr' );

			$tableheader .= Xml::openElement( 'tr' );
			$tableheader .= Xml::tags( 'th', null, $this->headerText( 'current' ) );
			$tableheader .= Xml::closeElement( 'tr' );
		} else {
			$tableheader .= Xml::openElement( 'tr' );
			$tableheader .= Xml::tags( 'th', null, $this->headerText( 'table' ) );
			$tableheader .= Xml::tags( 'th', null, $this->headerText( 'current' ));
			$tableheader .= Xml::closeElement( 'tr' );
		}

		return $tableheader;
	}

	public function contents() {

		global $wgUser;
		$sk = $wgUser->getSkin();
		wfLoadExtensionMessages( 'Translate' );

		$uimsg = array();
		foreach ( array( 'optional' ) as $msg ) {
			$uimsg[$msg] = wfMsgHtml( 'translate-'.$msg );
		}

		$output =  '';

		foreach ( $this->collection as $key => $m ) {

			$tools = array();
			$title = $this->keyToTitle( $key );

			$original = $m->definition;
			$message = $m->translation ? $m->translation : $original;

			global $wgLang;
			$niceTitle = htmlspecialchars( $wgLang->truncate( $key, - 30 ) );

			$tools['edit'] = $sk->link(
				$title,
				$niceTitle,
				array(),
				array( 'action' => 'edit' ) + $this->editLinkParams,
				'known'
			);

			$anchor = 'msg_' . $key;
			$anchor = Xml::element( 'a', array( 'name' => $anchor, 'href' => "#$anchor" ), "↓" );

			$extra = '';
			if ( $m->optional ) $extra = '<br />' . $uimsg['optional'];

			$leftColumn = $anchor . $tools['edit'] . $extra;

			if ( $this->reviewMode ) {
				$output .= Xml::tags( 'tr', array( 'class' => 'orig' ),
					Xml::tags( 'td', array( 'rowspan' => '2' ), $leftColumn ) .
					Xml::tags( 'td', null, TranslateUtils::convertWhiteSpaceToHTML( $original ) )
				);

				$output .= Xml::tags( 'tr', array( 'class' => 'new' ),
					Xml::tags( 'td', null, TranslateUtils::convertWhiteSpaceToHTML( $message ) ) .
					Xml::closeElement( 'tr' )
				);
			} else {
				$output .= Xml::tags( 'tr', array( 'class' => 'def' ),
					Xml::tags( 'td', null, $leftColumn ) .
					Xml::tags( 'td', null, TranslateUtils::convertWhiteSpaceToHTML( $message ) )
				);
			}

		}

		return $output;
	}

	public function fullTable() {
		return $this->header() . $this->contents() . '</table>';
	}



	protected function headerText( $type ) {
		if ( !isset($this->headers[$type]) ) throw new MWException( "Unexpected type $type" );

		list( $format, $value ) = $this->headers[$type];
		if ( $format === 'msg' ) {
			return wfMsgExt( $value, array( 'parsemag', 'escapenoentities' ) );
		} elseif ( $format === 'raw' ) {
			return $value;
		} else {
			throw new MWException( "Unexcepted format $format" );
		}
	}

	protected function keyToTitle( $key ) {
		$titleText = TranslateUtils::title( $key, $this->collection->code );
		$namespace = $this->group->namespaces[0];
		return Title::makeTitle( $namespace, $titleText );
	}

}