<?php
/**
 * Abstract class to encapsulate properties of OrderedListPages.
 * Inherited by SMWTypePage and SMWPropertyPage.
 *
 * Some code adapted from CategoryPage.php
 *
 * @author Nikolas Iwan
 * @author Markus Krötzsch
 */

/**
 * Abstract subclass of MediaWiki's Article that handles the common tasks of
 * article pages for Types and Properties. Mostly, it implements general processing
 * and the generation of suitable navigation links from results sets and HTTP
 * parameters.
 *
 * Some code adapted from CategoryPage.php
 * @note AUTOLOADED
 */
abstract class SMWOrderedListPage extends Article {

	protected $limit; // limit for results per page
	protected $from; // start string: print $limit results from here
	protected $until; // end string: print $limit results strictly before this article
	protected $articles; // array of articles for which information is printed (primary ordering method)
	protected $articles_start_char; // array of first characters of printed articles, used for making subheaders
	protected $skin; // cache for the current skin, obtained from $wgUser

	/**
	 * Overwrite view() from Article.php to add additional html to the output.
	 */
	public function view() {
		global $wgRequest, $wgUser;

		// copied from CategoryPage ...
		$diff = $wgRequest->getVal( 'diff' );
		$diffOnly = $wgRequest->getBool( 'diffonly', $wgUser->getOption( 'diffonly' ) );
		if ( isset( $diff ) && $diffOnly ) {
			return Article::view();
		}

		Article::view();
		$this->showList();
	}

	/**
	 * Main method for addig all additional HTML to the output stream.
	 */
	protected function showList() {
		wfProfileIn( __METHOD__ . ' (SMW)');
		global $wgOut, $wgRequest;
		$this->from = $wgRequest->getVal( 'from' );
		$this->until = $wgRequest->getVal( 'until' );
		if ($this->initParameters()) {
			$wgOut->addHTML( $this->getHTML() );
		}
		wfProfileOut( __METHOD__ . ' (SMW)');
	}

	/**
	 * Initialise some parameters that might be changed by subclasses
	 * (e.g. $limit). Method can be overwritten in this case.
	 * If the method returns false, nothing will be printed besides 
	 * the original article.
	 */
	protected function initParameters() {
		$this->limit = 20;
		return true;
	}

	/**
	 * Returns HTML which is added to wgOut.
	 */
	protected function getHTML() {
		global $wgOut;
		$this->clearPageState();
		$this->doQuery();
		$r = "<br style=\"clear:both;\"/>\n" . $this->getPages();
		return $r;
	}

	/**
	 * Initialise internal data structures.
	 */
	protected function clearPageState() {
		$this->articles = array();
		$this->articles_start_char = array();
	}

	/**
	 * Execute the DB query and fill the articles array.
	 * Implemented by subclasses.
	 */
	protected abstract function doQuery();

	/**
	 * Generates the headline for the page list and the HTML encoded list of pages which 
	 * shall be shown.
	 */
	protected abstract function getPages();

	/**
	 * Generates the prev/next link part to the HTML code of the top and bottom section of the page.
	 */
	protected function getNavigationLinks($query = array()) {
		global $wgUser, $wgLang;
		$sk =& $this->getSkin();
		$limitText = $wgLang->formatNum( $this->limit );
		
		$ac = count($this->articles);
		if ($this->until != '') {
			if ($ac > $this->limit) { // (we assume that limit is at least 1)
				$first = $this->articles[1]->getDBkey();
			} else {
				$first = '';
			}
			$last = $this->until;
		} elseif ( ($ac > $this->limit) || ($this->from != '') ) {
			$first = $this->from;
			if ( $ac > $this->limit) {
				$last = $this->articles[$ac-1]->getDBkey();
			} else {
				$last = '';
			}
		} else {
			return '';
		}

		$prevLink = htmlspecialchars( wfMsg( 'prevn', $limitText ) );
		$this->mTitle->setFragment('#SMWResults'); // make navigation point to the result list
		if( $first != '' ) {
			$prevLink = $sk->makeLinkObj( $this->mTitle, $prevLink,
				wfArrayToCGI( $query + array( 'until' => $first ) ) );
		}
		$nextLink = htmlspecialchars( wfMsg( 'nextn', $limitText ) );
		if( $last != '' ) {
			$nextLink = $sk->makeLinkObj( $this->mTitle, $nextLink,
				wfArrayToCGI( $query + array( 'from' => $last ) ) );
		}
		return "($prevLink) ($nextLink)";
	}

	/**
	 * Fetch and return the relevant skin object.
	 */
	protected function getSkin() {
		if ( !$this->skin ) {
			global $wgUser;
			$this->skin = $wgUser->getSkin();
		}
		return $this->skin;
	}

	/**
	 * Like Article's getTitle(), but returning a suitable SMWWikiPageValue
	 */
	protected function getDataValue() {
		$dv = SMWDataValueFactory::newTypeIDValue('_wpg');
		$t = $this->getTitle();
		$dv->setValues($t->getDBkey(), $t->getNamespace());
		return $dv;
	}

	/**
	 * Format a list of SMWWikipageValues chunked by letter in a three-column
	 * list, ordered vertically.
	 */
	protected function columnList($start, $end, $elements, $elements_start_char) {
		// divide list into three equal chunks
		$chunk = (int) ( ($end-$start+1) / 3);

		// get and display header
		$r = '<table width="100%"><tr valign="top">';

		$prev_start_char = 'none';

		// loop through the chunks
		for($startChunk = $start, $endChunk = $chunk, $chunkIndex = 0;
			$chunkIndex < 3;
			$chunkIndex++, $startChunk = $endChunk, $endChunk += $chunk + 1) {
			$r .= "<td>\n";
			$atColumnTop = true;

			// output all articles
			for ($index = $startChunk ;
				$index < $endChunk && $index < $end;
				$index++ ) {
				// check for change of starting letter or begining of chunk
				if ( ($index == $startChunk) ||
					 ($elements_start_char[$index] != $elements_start_char[$index - 1]) ) {
					if( $atColumnTop ) {
						$atColumnTop = false;
					} else {
						$r .= "</ul>\n";
					}
					$cont_msg = "";
					if ( $elements_start_char[$index] == $prev_start_char )
						$cont_msg = wfMsgHtml('listingcontinuesabbrev');
					$r .= "<h3>" . htmlspecialchars( $elements_start_char[$index] ) . " $cont_msg</h3>\n<ul>";
					$prev_start_char = $elements_start_char[$index];
				}
				$r .= "<li>" . $elements[$index]->getLongHTMLText($this->getSkin()) . "</li>\n";
			}
			if( !$atColumnTop ) {
				$r .= "</ul>\n";
			}
			$r .= "</td>\n";
		}
		$r .= '</tr></table>';
		return $r;
	}

	/**
	 * Format a list of articles chunked by letter in a bullet list.
	 */
	protected function shortList($start, $end, $elements, $elements_start_char) {
		$r = '<h3>' . htmlspecialchars( $elements_start_char[$start] ) . "</h3>\n";
		$r .= '<ul><li>'. $elements[$start]->getLongHTMLText($this->getSkin()) . '</li>';
		for ($index = $start+1; $index < $end; $index++ ) {
			if ($elements_start_char[$index] != $elements_start_char[$index - 1]) {
				$r .= "</ul><h3>" . htmlspecialchars( $elements_start_char[$index] ) . "</h3>\n<ul>";
			}
			$r .= '<li>' . $elements[$index]->getLongHTMLText($this->getSkin()) . '</li>';
		}
		$r .= '</ul>';
		return $r;
	}

}



