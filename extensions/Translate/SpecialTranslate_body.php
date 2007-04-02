<?php
/**
 * Translate is a special page which is similar to Special:Allmessages, but has
 * more features to aid in translation. It can be used basically for any
 * collection of messages which are structured key => message. The actual
 * parsing and other dirty job is done by Message Classes.
 */
class SpecialTranslate extends SpecialPage {
	/** Default values for customizable parameters */
	private $defaults    = array();
	/** Contains parameters which are different from defaults. Useful for keeping
	 * get URLs short as possible (not used in this class currently)
	 */
	private $nondefaults = array();
	/** Merged array of defaults and nondefaults for actual use */
	private $options     = array();
	/** Instead of tools, print the the messages in copy-paste friendly format. */
	private $output      = false;
	/** 2-dimensional array of [message-id][variable]. See function
	 * initializeMessages.
	 */
	private $messages    = array();
	/** Which message class we are working on */
	private $messageClass= null;
	/** List of all available message classes. Some of them may not contain
	 * messages.
	 */
	private $classes     = array();

	/** Maximum number of rows single table can contain */
	private static $maxRowCount = 3000;

	function __construct() {
		SpecialPage::SpecialPage( 'Translate' );
		$this->includable( false ); # would need much parsing of $parameters below
	}

	function execute( $parameters ) {
		require_once( 'SpecialTranslate_exts.php' );
		$this->classes = efInitializeExtensionClasses();

		$this->setup();
		$this->initializeMessages();
		$this->setHeaders();
		$this->output();
	}

	/**
	 * Initializes variables and parses parameters from request
	 */
	function setup() {
		global $wgUser, $wgRequest;

		if ( $wgRequest->getText( 'ot' ) !== '' ) {
			$this->output = true;
		}

		$defaults = array(
		/* bool */ 'x'            => false,
		/* bool */ 'changed'      => false,
		/* bool */ 'database'     => false,
		/* bool */ 'missing'      => false,
		/* bool */ 'extension'    => false,
		/* bool */ 'optional'     => false,
    /* bool */ 'ignored'      => false,
		/* str  */ 'sort'         => 'normal',
		/* bool */ 'endiff'       => false,
		/* str  */ 'uselang'      => $wgUser->getOption( 'language' ),
		/* str  */ 'msgclass'     => 'core',
		/* str  */ 'filter-key'   => '',
		/* str  */ 'filter-msg'   => '',
		);

		// Dump everything here
		$nondefaults = array();

		foreach ( $defaults as $v => $t ) {
			if ( is_bool($t) ) {
				$r = $wgRequest->getBool( $v, $defaults[$v] );
			} elseif( is_string($t) ) {
				$r = $wgRequest->getText( $v, $defaults[$v] );
			}
			wfAppendToArrayIfNotDefault( $v, $r, $defaults, $nondefaults);
		}

		$this->defaults    = $defaults;
		$this->nondefaults = $nondefaults;
		$this->options     = $nondefaults + $defaults;

		$this->messageClass = $this->classes[0];
		foreach( $this->classes as $class ) {
			if ( $class->hasMessages() && $class->getId() === $this->options['msgclass']) {
				if ( $this->options['msgclass'] !== 'core' ) {
					$this->options['extension'] = true;
				}
				$this->messageClass = $class;
				break;
			}
		}

	}

	/**
	 * Initializes messages array.
	 */
	function initializeMessages() {
		global $wgMessageCache, $wgContLang;

		# If we are not going to output anything, no need to waste time here
		if ( !$this->options['x'] ) { return; }

		# Make sure all extension messages are available
		# Most extensions don't respect this
		MessageCache::loadAllMessages();

		$array = $this->messageClass->getArray();

		if ( $this->options['sort'] === 'alpha' ) {
			ksort( $array );
		}

		$LinkBatch = new LinkBatch();
		$wgMessageCache->disableTransform();

		foreach ( $array as $key => $value ) {
			$msg = wfMsg( $key );
			if ( wfEmptyMsg( $key, $msg ) ) {
				$msg = wfMsgNoDb( $key );
			}

			$this->messages[$key]['enmsg'] = $value; // the very original message
			$this->messages[$key]['statmsg'] = wfMsgNoDb( $key ); // committed translation or fallback
			$this->messages[$key]['msg'] = $msg; // current translation
			$this->messages[$key]['extension'] = true; // overwritten by 'core'
			$this->messages[$key]['infile'] = null; // filled by message class
			$this->messages[$key]['infbfile'] = null; // filled by message class
			$this->messages[$key]['optional'] = false; // filled by message class
			$this->messages[$key]['ignored'] = false; // filled by message class
			$this->messages[$key]['changed'] = false; // filled later
			$this->messages[$key]['pageexists'] = false; // filled later
			$this->messages[$key]['talkexists'] = false; // filled later
			$this->messages[$key]['defined'] = false; // filled later

			$LinkBatch->add( NS_MEDIAWIKI, self::titleFromKey( $key ) );
			$LinkBatch->add( NS_MEDIAWIKI_TALK, self::titleFromKey( $key ) );
		}

		$wgMessageCache->enableTransform();

		# I'm not sure if using LinkBatch is any faster, doesn't seem to
		if ( count($this->messages) > 50 ) {
			$exists = self::doExistenceCheck();
		} else {
			$exists = $LinkBatch->execute();
		}

		$this->messageClass->fill($this->messages);

		$pagePrefix = $wgContLang->getNsText( NS_MEDIAWIKI ) . ':';
		$talkPrefix = $wgContLang->getNsText( NS_MEDIAWIKI_TALK ) . ':';
		// Calculate some usefull variables
		foreach ( array_keys( $this->messages ) as $key ) {
			$title = self::titleFromKey( $key );
			$pageExists = isset( $exists[$pagePrefix . $title] ) &&
				$exists[$pagePrefix . $title];

			$talkExists = isset( $exists[$talkPrefix . $title] ) &&
				$exists[$talkPrefix . $title];

			if ( $this->options['endiff'] ) {
				$this->messages[$key]['statmsg'] = $this->messages[$key]['enmsg'];
			}

			$this->messages[$key]['changed'] = ( $this->messages[$key]['msg'] !== $this->messages[$key]['statmsg'] );
			$this->messages[$key]['pageexists'] = $pageExists;
			$this->messages[$key]['talkexists'] = $talkExists;
			$this->messages[$key]['defined'] = ( $pageExists || $this->messages[$key]['infile'] !== null );

		}

	}


	function output() {
		global $wgOut, $wgLang;

		if ( $this->output ) {
			$wgOut->addHTML( Xml::element( 'textarea',
				array( 'id' => 'wpTextbox1', 'rows' => '40' ),
				$this->messageClass->export($this->messages) )
			);
		} else {

			if ( !$this->options['x'] ) {
				$wgOut->addHTML( wfMsg( 'translate-choose-settings' ) );
			}

			$wgOut->addHTML( $this->settingsForm() );
			$wgOut->addHTML( $this->makeHTMLText( $this->messages, $this->options ) );
		}

	}

	protected function settingsForm() {
		$form = "\n\n" . Xml::openElement('form');
		$form .= Xml::hidden( 'x', '1' );
		$form .= $this->prioritySelector() . Xml::element('br');
		$form .= $this->messageClassSelector() . " ";
		$form .= $this->sortSelector() . " ";
		$form .= $this->languageSelector() . " ";
		$form .= Xml::submitButton( wfMsg( 'translate-fetch-button') );
		$form .= Xml::submitButton( wfMsg( 'translate-export-button' ), array( 'name' => 'ot'));
		$form .= Xml::closeElement('form'). "\n\n";
		return $form;
	}

	# Unused
	protected function filterInputs() {
		return
			Xml::inputLabel( "Key filter:", 'filter-key', self::id( 'filter-key' ) ) . ' ' .
			Xml::inputLabel( "Messages filter:", 'filter-msg', self::id( 'filter-msg' ) );
	}

	protected function prioritySelector() {
		$str = wfMsgHtml( 'translate-show-label' ) . ' ' . '<table>' .
		'<tr><td>' .
 			Xml::checkLabel( wfMsg( 'translate-opt-review' ), 'endiff',
			'msgp-endiff', $this->options['endiff']) .
		'</td><td>' .
			Xml::checkLabel( wfMsg( 'translate-opt-trans' ), 'missing',
				'msgs-translated', $this->options['missing']) .
		'</td></tr><tr><td>' .
			Xml::checkLabel( wfMsg( 'translate-opt-optional' ), 'optional',
				'msgp-optional', $this->options['optional']) .
		'</td><td>' .
			Xml::checkLabel( wfMsg( 'translate-opt-changed' ), 'changed',
				'msgs-changed', $this->options['changed']) .
		'</td></tr><tr><td>' .
			Xml::checkLabel( wfMsg( 'translate-opt-ignored' ), 'ignored',
				'msgp-ignored', $this->options['ignored']) .
		'</td><td>' .
			Xml::checkLabel( wfMsg( 'translate-opt-database' ), 'database',
				'msgs-database', $this->options['database']) .
		'</td></tr></table>';
		return $str;
	}

	protected function sortSelector() {
		$str =
		self::label( wfMsg('translate-sort-label'), 'sort' ) .
		Xml::openElement('select', array(
			'name' => 'sort',
			'id' => self::id( 'sort' ) )) .
		Xml::option( wfMsg( 'translate-sort-normal' ), 'normal',
			$this->options['sort'] === 'normal') .
		Xml::option( wfMsg( 'translate-sort-alpha' ), 'alpha',
			$this->options['sort'] === 'alpha') .
		Xml::closeElement( 'select' );
		return $str;
	}

	protected function languageSelector() {
		global $wgLang;
		$languages = Language::getLanguageNames( false );
		ksort( $languages );

		$options = '';
		$language = $wgLang->getCode();
		foreach( $languages as $code => $name ) {
			$selected = ($code == $language);
			$options .= Xml::option( "$code - $name", $code, $selected ) . "\n";
		}
		$str =
		self::label( wfMsg( 'translate-language' ), 'language' ) .
		Xml::openElement( 'select', array(
			'name' => 'uselang',
			'class' => 'mw-language-selector',
			'id' => self::id( 'language' ),
		)) .
		$options .
		Xml::closeElement( 'select' );
		return $str;
	}

	protected function messageClassSelector() {
		$str = self::label( wfMsg( 'translate-messageclass' ), 'class' ) .
			Xml::openElement('select',
				array( 'name' => 'msgclass', 'id' => self::id( 'class' ) ));
		foreach( $this->classes as $class) {
			if ( !$class->hasMessages() ) { continue; }
			$str.= Xml::option( $class->getLabel(), $class->getId(),
				$this->options['msgclass'] === $class->getId());
		}
		$str .= Xml::closeElement( 'select' );;
		return $str;
	}

	static private function tableHeader() {
		$tableheader = Xml::element( 'table', array(
			'class'   => self::id( 'table' ),
			'border'  => '1',
			'cellspacing' => '0'),
			null
		);

		$tableheader .= Xml::openElement('tr');
		$tableheader .= Xml::element('th',
			array( 'rowspan' => '2'),
			wfMsgHtml('allmessagesname')
		);
		$tableheader .= Xml::element('th', null, wfMsgHtml('allmessagesdefault') );
		$tableheader .= Xml::closeElement('tr');

		$tableheader .= Xml::openElement('tr');
		$tableheader .= Xml::element('th', null, wfMsgHtml('allmessagescurrent') );
		$tableheader .= Xml::closeElement('tr');

		return $tableheader;
	}

	/**
	 * Create a list of messages, formatted in HTML as a list of messages and values and showing differences between the default language file message and the message in MediaWiki: namespace.
	 * @param $messages Messages array.
	 * @return The HTML list of messages.
	 */
	static function makeHTMLText( $messages, $options ) {
		global $wgLang, $wgContLang, $wgUser;
		wfProfileIn( __METHOD__ );

		$sk = $wgUser->getSkin();
		$talkLinkText = $wgLang->getNsText( NS_TALK ); // FIXME

		$language = STools::getLanguage();

		$tableheader = self::tableHeader();
		$tablefooter = Xml::closeElement( 'table' );

		$i = 0;
		$open = false;
		$output =  '';

		foreach( $messages as $key => $m ) {

			$title = self::titleFromKey( $key );
			$page['object'] = Title::makeTitle( NS_MEDIAWIKI, $title );
			$talk['object'] = Title::makeTitle( NS_MEDIAWIKI_TALK, $title );

			if ( $options['missing']  && $m['defined'] )     { continue; }
			if ( $options['changed']  && !$m['changed'] )    { continue; }
			if (!$options['optional'] && $m['optional'] )    { continue; }
			if (!$options['ignored']  && $m['ignored'] )     { continue; }
			if ( $options['database'] && !$m['pageexists'] ) { continue; }

			$original = $m['statmsg'];
			$message = $m['msg'];

			if( $m['pageexists'] ) {
				$page['link'] = $sk->makeKnownLinkObj( $page['object'], htmlspecialchars( $key ) );
			} else {
				$page['link'] = $sk->makeBrokenLinkObj( $page['object'], htmlspecialchars( $key ) );
			}
			if( $m['talkexists'] ) {
				$talk['link'] = $sk->makeKnownLinkObj( $talk['object'], $talkLinkText );
			} else {
				$talk['link'] = $sk->makeBrokenLinkObj( $talk['object'], $talkLinkText );
			}

			$page['edit'] = $sk->makeKnownLinkObj( $page['object'], wfMsgHtml('edit'), 'action=edit' );
			$page['history'] = $sk->makeKnownLinkObj( $page['object'], wfMsgHtml('history'), 'action=history' );

			$anchor = 'msg_' . $key;
			$anchor = Xml::element( 'a', array( 'name' => $anchor ) );

			if( $i % self::$maxRowCount === 0 ) {
				if ( $open ) {
					$output .= $tablefooter;
					$open = true;
				}
				$output .= $tableheader;
			}

			$opt = '';
			if ( $m['optional'] )  $opt .= ' opt';
			if ( $m['ignored'] )   $opt .= ' ign';

			$leftColumn = $anchor . $page['link'] . '<br />' .
				implode( ' | ', array( $talk['link'] , $page['edit'], $page['history'] ) );

			if ( $m['changed'] ) {
				$info = Xml::openElement( 'tr', array( 'class' => "orig$opt") );
				$info .= Xml::openElement( 'td', array( 'rowspan' => '2') );
				$info .= $leftColumn;
				$info .= Xml::closeElement( 'td' );
				$info .= Xml::element( 'td', null, $original );
				$info .= Xml::closeElement( 'tr' );

				$info .= Xml::openElement( 'tr', array( 'class' => 'new') );
				$info .= Xml::element( 'td', null, $message );
				$info .= Xml::closeElement( 'tr' );

				$output .= $info . "\n";
			} else {
				$info = Xml::openElement( 'tr', array( 'class' => "def$opt") );
				$info .= Xml::openElement( 'td' );
				$info .= $leftColumn;
				$info .= Xml::closeElement( 'td' );
				$info .= Xml::element( 'td', null, $message );
				$info .= Xml::closeElement( 'tr' );

				$output .= $info . "\n";
			}

			$i++;
		}

		$output .= $tablefooter;

		wfProfileOut( __METHOD__ );
		return $output;
	}

	static function titleFromKey( $key ) {
		global $wgContLang;
		$title = $wgContLang->ucfirst( $key ) . STools::getLanguage();
		return $title;
	}

	/**
	 * Shortcut for prefixed keys for ids and classes
	 */
	private static function id( $id ) {
		return "mw-sp-translate-$id";
	}

	private static function label( $label, $id ) {
		return Xml::label( $label, self::id( $id) ) . '&nbsp;';
	}

	static function doExistenceCheck() {
		global $wgContLang;
		wfProfileIn( __METHOD__ );
		# This is a nasty hack to avoid doing independent existence checks
		# without sending the links and table through the slow wiki parser.
		$pageExists = array(
			NS_MEDIAWIKI => array(),
			NS_MEDIAWIKI_TALK => array()
		);
		$dbr = wfGetDB( DB_SLAVE );
		$page = $dbr->tableName( 'page' );
		$sql = "SELECT page_namespace,page_title FROM $page WHERE page_namespace IN (" . NS_MEDIAWIKI . ", " . NS_MEDIAWIKI_TALK . ")";
		$res = $dbr->query( $sql );

		$pagePrefix = $wgContLang->getNsText( NS_MEDIAWIKI ) . ':';
		$talkPrefix = $wgContLang->getNsText( NS_MEDIAWIKI_TALK ) . ':';

		while( $s = $dbr->fetchObject( $res ) ) {
			if ( $s->page_namespace == NS_MEDIAWIKI ) {
				$pageExists[$pagePrefix . $s->page_title] = true;
			} else {
				$pageExists[$talkPrefix . $s->page_title] = true;
			}
		}
		$dbr->freeResult( $res );

		wfProfileOut( __METHOD__ );
		return $pageExists;
	}

}

?>
