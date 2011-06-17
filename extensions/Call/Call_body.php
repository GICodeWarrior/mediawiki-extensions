<?php
/**
 * Provides a special function to invoke a page with dynamic parameters being passed
 *
 * @author Algorithmix (Gero Scholz) http://semeb.com/dpldemo

 * @version 0.1
 * @version 0.2
 *		added a help text if called without any arguments
 * @version 0.3
 *		different browsers add session variables in a different sequence; therefore we must check
 *		against "_session","UserName" and "UserID" simultaneously
 * @version 0.4
 *		added DebuG switch and recognition of "...Token"
 * @version 0.5
 *		changed algorithm to recoignize parameters
 * @version 0.6
 *		added a mechanism to save the called template's raw text to a new article
 *				when doing this we replace symbols in the raw text which parameter names from our call by the values of these parameters
 *				Call/abc,saveAsPage=xyz,foo=bar
 *				will tale the raw text of "Template:Abc", replace all occurencies of 'foo' by 'bar' and save the result as a normal
 *				article named 'Xyz' in the main namespace.
 *		added a functionality to split wiki tables into calls of a template per row (cmd=convertTableToTemplateCalls)
 * @version 0.7
 *      empty parameters are now no longer ignored; so you can replace a symbol by "nothing" when using saveAsPage
 *      introduced 'link1' and 'link2', label1 and label2
 *      link replaces ",name," by ",name=value,"
 *		link2 replaces "name" by "value" and "," by "&"
 */

class Call extends SpecialPage {
	function __construct() {
		parent::__construct( "Call" );

	}


	function execute( $par ) {
		global $wgOut, $wgRequest, $wgRawHtml, $wgUser;
		$oldRawHtml = $wgRawHtml;
		$wgRawHtml = false;         // disable raw html if it's enabled as this could be XSS security risk
		$this->setHeaders();

		global $_REQUEST;
		$argkeys = array_keys( $_REQUEST );

		// find the position of "title" and count succeeding arguments until we find one that matches
		// one of the patterns which belong to typical session cookie variables
		// store link info
		$argTitle = -1; $argCount = 0; $n = 0; $link1 = ''; $link2 = ''; $label1 = 'link 1'; $label2 = 'link 2';
		foreach ( $argkeys as $argKey ) {
			if ( $argKey == 'link1' ) {
				$link1 = $wgRequest->getText( $argKey );
			}
			if ( $argKey == 'label1' ) {
				$label1 = $wgRequest->getText( $argKey );
			}
			if ( $argKey == 'link2' ) {
				$link2 = $wgRequest->getText( $argKey );
			}
			if ( $argKey == 'label2' ) {
				$label2 = $wgRequest->getText( $argKey );
			}
			if ( $argKey == 'title' ) {
				$argTitle = $n;
			} elseif ( $argTitle >= 0 ) {
				if ( preg_match( '/(UserName|UserID|_session|Token)$/', $argKey ) ) {
					break;
				}
				++$argCount;
			}
			$n++;
		}

		$debug = !( strpos( $wgRequest->getText( 'title' ), 'DebuG' ) === false );
		if ( $debug ) {
			$wgOut->addHTML( "<pre>\n" );
			foreach ( $argkeys as $argKeyNr => $argKey ) {
				$wgOut->addHTML( "$argKeyNr:$argKey:" );
				$wgOut->addHTML( $wgRequest->getText( $argKey ) . "\n", 1 );
			}
			$wgOut->addHTML( "\npar=$par\nargTitle=$argTitle\nargCount=$argCount</pre>" );
		}

		$wikitext = ''; $n = 0; $i = -1;
		foreach ( $argkeys as $argKeyNr => $argKey ) {
			$i++;
			if ( $i < $argTitle ) {
				continue;
			}
			if ( $i == $argTitle ) {
				$wikitext .= preg_replace( ',^[^/]+/,', '', $wgRequest->getText( $argKey ), 1 );
				$wikitext = str_replace( ",", "|", $wikitext );
				$wikitext = str_replace( "_", " ", $wikitext );
				continue;
			}
			if ( ++$n > $argCount ) {
				break;
			}
			$arg = $wgRequest->getText( $argKey );
			if ( $arg == '' ) {
				$link1 = str_replace( ",$argKey,", ",$argKey=,", $link1 );
				$link2 = str_replace( $argKey, "", $link2 );
				$arg = str_replace( "_", " ", $argKey );
				$wikitext .= ( '|' . $arg );
			} else {
				$link1 = str_replace( ",$argKey,", ",$argKey=$arg,", $link1 );
				$link2 = str_replace( $argKey, str_replace( ' ', '_', $arg ), $link2 );
				$arg = str_replace( "_", " ", $arg );
				$wikitext .= ( '|' . $argKey . '=' . $arg );
			}
		}

		if ( $wikitext == '' && $par != '' ) {
			// the first argument may contain parameters which are separated by comma
			// this is the case if [[Call,a=b]] syntax is used
			$wikitext = str_replace( ",", "|", $par );
			$wikitext = str_replace( "_", " ", $wikitext );
		}

		// check if the result shall be saved as a wiki article
		$saveAsPageLink = ''; $saveAsPage = ''; $saveAsTitle = null;
		$wikitextS = preg_replace( '/^.*\|\s*saveAsPage\s*=\s*/s', '', $wikitext );
		if ( $wikitextS != $wikitext ) {
			$saveAsPageLink = preg_replace( '/\s*\|.*/s', '', $wikitextS );
			$saveAsTitle   = Title::newFromText( $saveAsPageLink );
			$saveAsPage    = $saveAsTitle->getText();
			if ( $saveAsTitle->getNamespace() == 14 ) {
				$saveAsPageLink = ':' . $saveAsPageLink;
			}
		}

		// check if we want to execute a built-in command
		$cmd = preg_replace( '/^.*\|\s*cmd\s*=\s*/s', '', $wikitext );
		if ( $cmd == $wikitext ) {
			$cmd = '';
		} else {
			$cmd = preg_replace( '/\s*\|.*/s', '', $cmd );
		}

		// in both cases we need the raw text of the called page
		$rawText = '';
		if ( $cmd != '' || $saveAsPage != '' ) {
			$template = preg_replace( '/\|.*/', '', $wikitext );
			if ( strpos( ':', $template ) === false ) {
				$template = 'Template:' . $template;
			} elseif ( $template[0] == ':' ) {
				$template = substr( $template, 1 );
			}
			$title = Title::newFromText( $template );
			if ( $title != null && !$title->exists() ) {
				$rawText = "'$template' not found.";
			} else {
				$article = new Article( $title );
				$rawText = $article->getContent();
			}
		}

		if ( $wikitext == '' || $wikitext == 'Special:Call' ) {
			// Called without parameters: dump explanation
			$wgOut->addHTML( wfMsg( 'call-text' ) );
		} elseif ( $debug ) {
			// Called with DebuG target: dump parameter list
			$wgOut->addHTML( "<pre>\n{{" . $wikitext . "}}\n</pre>" );
			if ( $saveAsPage != '' ) {
				$wgOut->addHTML( wfMsg( 'call-save', $saveAsPageLink ) );
			}
		} else {
			$parm = array();
			foreach ( split( '\|', $wikitext ) as $parmArg ) {
				$pp = split( '=', $parmArg, 2 );
				if ( count( $pp ) == 2 ) {
					$parm[$pp[0]] = $pp[1];
				} else {
					$parm[$pp[0]] = '';
				}
			}
			if ( $cmd == 'convertTableToTemplateCalls' ) {
				// execute command
				$rawText = Call::convertTableToTemplateCalls( $rawText, $parm );
			}
			if ( $saveAsPage != '' ) {
				// replace literals in text
				foreach ( $parm as $arg => $value ) {
					$rawText = str_replace( $arg, $value, $rawText );
				}
				// do not save if article is already present
				if ( !( $saveAsTitle->exists() ) ) {
					$article = new Article( $saveAsTitle );
					$article->doEdit( $rawText, $saveAsPage, EDIT_NEW | EDIT_FORCE_BOT );
					$wgOut->addHTML( $wgOut->parse( wfMsg( 'call-save-success' , $saveAsPageLink ) ) );
				} else {
					$wgOut->addHTML( $wgOut->parse( wfMsg( 'call-save-failed', $saveAsPageLink ) ) );
				}
				// output the text we produced as a note to the user
				if ( $link1 != '' ) {
					$wgOut->addHTML( $wgOut->parse( "[[Special:Call/$link1|$label1]]" ) );
				}
				$link2 = str_replace( ',', '&', $link2 );
				if ( $link2 != '' ) {
					$wgOut->addHTML( $wgOut->parse( "[$link2 $label2]" ) );
				}
				$wgOut->addHTML( "<pre>\n$rawText\n</pre>" );
			} else {
				// call the template and produce output
				$wgOut->addHTML( $wgOut->parse( "{{" . $wikitext . "}}" ) );
			}
		}

		$skin = $wgUser->getSkin();
		$wgRawHtml = $oldRawHtml;

		$newTitle = split( "\,", $par, 2 );
		if ( $newTitle != null && strlen( $newTitle[0] ) > 0 ) {
			$newTitle[0] = str_replace( "_", " ", $newTitle[0] );
			$newTitle[0] = preg_replace( "/^:/", "", $newTitle[0] );
			$wgOut->setPageTitle( $newTitle[0] );
		}
	}

	static function convertTableToTemplateCalls( $rawText, $parms ) {
		$text = array();
		$state = 0;
		$n = -1;
		$field = array();
		$head = true;
		$tpl = '???';
		foreach ( split( "\n", $rawText ) as $line ) {
			// $text[] = "$state $n $line";
			if ( $state == 0 ) {
				if ( strpos( $line, '|-' ) !== false ) {
					$state = 1;
					$n = -1;
					$tpl = $field[0];
					$field[0] = 'ID';
				} elseif ( strpos( $line, '|' ) == 0 ) {
					$n++;
					$field[$n] = substr( $line, 1 );
				}
			} elseif ( strpos( $line, '|-' ) !== false ) {
				$n = -1;
			} elseif ( strpos( $line, '|}' ) !== false ) {
				$text[] = '}}';
				break;
			} elseif ( $line == '' ) {
				$text[] = '';
			} elseif ( $line[0] == '|' ) {
				$n++;
				if ( $n == 0 ) {
					if ( $head ) {
						$text[] = "{{DT Article|index=";
						$head = false;
					}
					$text[] = "}}\n==" . substr( $line, 1 ) . "==\n{{" . $tpl . "\n|" . $field[$n] . '=' . substr( $line, 1 );
				} else {
					$text[] = '|' . $field[$n] . '=';
					$text[] = substr( $line, 1 );
				}
			} else {
				$text[] = $line;
			}
		}
		return join( "\n", $text );
	}
}
