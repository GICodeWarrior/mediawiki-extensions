<?php
/**
 * Core functions for the CategoryTree extension, an AJAX based gadget
 * to display the category structure of a wiki
 *
 * @file
 * @ingroup Extensions
 * @author Daniel Kinzler, brightbyte.de
 * @copyright © 2006-2007 Daniel Kinzler
 * @license GNU General Public Licence 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is part of an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

class CategoryTree {
	var $mIsAjaxRequest = false;
	var $mOptions = array();

	function __construct( $options, $ajax = false ) {
		global $wgCategoryTreeDefaultOptions;

		$this->mIsAjaxRequest = $ajax;

		# ensure default values and order of options. Order may become important, it may influence the cache key!
		foreach ( $wgCategoryTreeDefaultOptions as $option => $default ) {
			if ( isset( $options[$option] ) && !is_null( $options[$option] ) ) {
				$this->mOptions[$option] = $options[$option];
			} else {
				$this->mOptions[$option] = $default;
			}
		}

		$this->mOptions['mode'] = self::decodeMode( $this->mOptions['mode'] );

		if ( $this->mOptions['mode'] == CT_MODE_PARENTS ) {
			 $this->mOptions['namespaces'] = false; # namespace filter makes no sense with CT_MODE_PARENTS
		}

		$this->mOptions['hideprefix'] = self::decodeHidePrefix( $this->mOptions['hideprefix'] );
		$this->mOptions['showcount']  = self::decodeBoolean( $this->mOptions['showcount'] );
		$this->mOptions['namespaces']  = self::decodeNamespaces( $this->mOptions['namespaces'] );

		if ( $this->mOptions['namespaces'] ) {
			# automatically adjust mode to match namespace filter
			if ( sizeof( $this->mOptions['namespaces'] ) === 1
				&& $this->mOptions['namespaces'][0] == NS_CATEGORY ) {
				$this->mOptions['mode'] = CT_MODE_CATEGORIES;
			} elseif ( !in_array( NS_IMAGE, $this->mOptions['namespaces'] ) ) {
				$this->mOptions['mode'] = CT_MODE_PAGES;
			} else {
				$this->mOptions['mode'] = CT_MODE_ALL;
			}
		}
	}

	function getOption( $name ) {
		return $this->mOptions[$name];
	}

	function isInverse( ) {
		return $this->getOption( 'mode' ) == CT_MODE_PARENTS;
	}

	static function decodeNamespaces( $nn ) {
		global $wgContLang;

		if ( !$nn )
			return false;

		if ( !is_array( $nn ) )
			$nn = preg_split( '![\s#:|]+!', $nn );

		$namespaces = array();

		foreach ( $nn as $n ) {
			if ( is_int( $n ) ) {
				$ns = $n;
			}
			else {
				$n = trim( $n );
				if ( $n === '' ) continue;

				$lower = strtolower( $n );

				if ( is_numeric( $n ) )  $ns = (int)$n;
				elseif ( $n == '-' || $n == '_' || $n == '*' || $lower == 'main' ) $ns = NS_MAIN;
				else $ns = $wgContLang->getNsIndex( $n );
			}

			if ( is_int( $ns ) ) {
				$namespaces[] = $ns;
			}
		}

		sort( $namespaces ); # get elements into canonical order
		return $namespaces;
	}

	static function decodeMode( $mode ) {
		global $wgCategoryTreeDefaultOptions;

		if ( is_null( $mode ) ) return $wgCategoryTreeDefaultOptions['mode'];
		if ( is_int( $mode ) ) return $mode;

		$mode = trim( strtolower( $mode ) );

		if ( is_numeric( $mode ) ) return (int)$mode;

		if ( $mode == 'all' ) $mode = CT_MODE_ALL;
		elseif ( $mode == 'pages' ) $mode = CT_MODE_PAGES;
		elseif ( $mode == 'categories' || $mode == 'sub' ) $mode = CT_MODE_CATEGORIES;
		elseif ( $mode == 'parents' || $mode == 'super' || $mode == 'inverse' ) $mode = CT_MODE_PARENTS;
		elseif ( $mode == 'default' ) $mode = $wgCategoryTreeDefaultOptions['mode'];

		return (int)$mode;
	}

	/**
	* Helper function to convert a string to a boolean value.
	* Perhaps make this a global function in MediaWiki proper
	*/
	static function decodeBoolean( $value ) {
		if ( is_null( $value ) ) return null;
		if ( is_bool( $value ) ) return $value;
		if ( is_int( $value ) ) return ( $value > 0 );

		$value = trim( strtolower( $value ) );
		if ( is_numeric( $value ) ) return ( (int)$value > 0 );

		if ( $value == 'yes' || $value == 'y' || $value == 'true' || $value == 't' || $value == 'on' ) return true;
		elseif ( $value == 'no' || $value == 'n' || $value == 'false' || $value == 'f' || $value == 'off' ) return false;
		elseif ( $value == 'null' || $value == 'default' || $value == 'none' || $value == 'x' ) return null;
		else return false;
	}

	static function decodeHidePrefix( $value ) {
		global $wgCategoryTreeDefaultOptions;

		if ( is_null( $value ) ) return $wgCategoryTreeDefaultOptions['hideprefix'];
		if ( is_int( $value ) ) return $value;
		if ( $value === true ) return CT_HIDEPREFIX_ALWAYS;
		if ( $value === false ) return CT_HIDEPREFIX_NEVER;

		$value = trim( strtolower( $value ) );

		if ( $value == 'yes' || $value == 'y' || $value == 'true' || $value == 't' || $value == 'on' ) return CT_HIDEPREFIX_ALWAYS;
		elseif ( $value == 'no' || $value == 'n' || $value == 'false' || $value == 'f' || $value == 'off' ) return CT_HIDEPREFIX_NEVER;
		// elseif ( $value == 'null' || $value == 'default' || $value == 'none' || $value == 'x' ) return $wgCategoryTreeDefaultOptions['hideprefix'];
		elseif ( $value == 'always' ) return CT_HIDEPREFIX_ALWAYS;
		elseif ( $value == 'never' ) return CT_HIDEPREFIX_NEVER;
		elseif ( $value == 'auto' ) return CT_HIDEPREFIX_AUTO;
		elseif ( $value == 'categories' || $value == 'category' || $value == 'smart' ) return CT_HIDEPREFIX_CATEGORIES;
		else return $wgCategoryTreeDefaultOptions['hideprefix'];
	}

	/**
	 * Set the script tags in an OutputPage object
	 * @param OutputPage $outputPage
	 */
	static function setHeaders( $outputPage ) {
		global $wgJsMimeType, $wgScriptPath, $wgContLang;
		global $wgCategoryTreeHijackPageCategories, $wgCategoryTreeExtPath, $wgCategoryTreeVersion;

		# Add the module
		$outputPage->addModules( 'ext.categoryTree' );

		# Add messages
		$outputPage->addScript(
		"	<script type=\"{$wgJsMimeType}\">
		var categoryTreeCollapseMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-collapse' ) ) . "\";
		var categoryTreeExpandMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-expand' ) ) . "\";
		var categoryTreeCollapseBulletMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-collapse-bullet' ) ) . "\";
		var categoryTreeExpandBulletMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-expand-bullet' ) ) . "\";
		var categoryTreeLoadMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-load' ) ) . "\";
		var categoryTreeLoadingMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-loading' ) ) . "\";
		var categoryTreeNothingFoundMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-nothing-found' ) ) . "\";
		var categoryTreeNoSubcategoriesMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-no-subcategories' ) ) . "\";
		var categoryTreeNoParentCategoriesMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-no-parent-categories' ) ) . "\";
		var categoryTreeNoPagesMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-no-pages' ) ) . "\";
		var categoryTreeErrorMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-error' ) ) . "\";
		var categoryTreeRetryMsg = \"" . Xml::escapeJsString( wfMsgNoTrans( 'categorytree-retry' ) ) . "\";
	</script>\n"
		);
	}

	static function getJsonCodec() {
		static $json = null;

		if ( !$json ) {
			$json = new Services_JSON(); # recycle API's JSON codec implementation
		}

		return $json;
	}

	static function encodeOptions( $options, $enc ) {
		if ( $enc == 'mode' || $enc == '' ) {
			$opt = $options['mode'];
		} elseif ( $enc == 'json' ) {
			$json = self::getJsonCodec(); // XXX: this may be a bit heavy...
			$opt = $json->encode( $options );
		} else {
			throw new MWException( 'Unknown encoding for CategoryTree options: ' . $enc );
		}

		return $opt;
	}

	static function decodeOptions( $options, $enc ) {
		if ( $enc == 'mode' || $enc == '' ) {
			$opt = array( "mode" => $options );
		} elseif ( $enc == 'json' ) {
			$json = self::getJsonCodec(); // XXX: this may be a bit heavy...
			$opt = $json->decode( $options );
			$opt = get_object_vars( $opt );
		} else {
			throw new MWException( 'Unknown encoding for CategoryTree options: ' . $enc );
		}

		return $opt;
	}

	function getOptionsAsCacheKey( $depth = null ) {
		$key = "";

		foreach ( $this->mOptions as $k => $v ) {
			if ( is_array( $v ) ) $v = implode( '|', $v );
			$key .= $k . ':' . $v . ';';
		}

		if ( !is_null( $depth ) ) $key .= ";depth=" . $depth;
		return $key;
	}

	function getOptionsAsJsStructure( $depth = null ) {
		if ( !is_null( $depth ) ) {
			$opt = $this->mOptions;
			$opt['depth'] = $depth;
			$s = self::encodeOptions( $opt, 'json' );
		} else {
			$s = self::encodeOptions( $this->mOptions, 'json' );
		}

		return $s;
	}

	function getOptionsAsJsString( $depth = NULL ) {
		return Xml::escapeJsString( $this->getOptionsAsJsStructure( $depth ) );
	}

	function getOptionsAsUrlParameters() {
		$u = '';

		foreach ( $this->mOptions as $k => $v ) {
			if ( $u != '' ) $u .= '&';
			$u .= $k . '=' . urlencode( $v ) ;
		}

		return $u;
	}

	/**
	* Ajax call. This is called by efCategoryTreeAjaxWrapper, which is used to
	* load CategoryTreeFunctions.php on demand.
	*/
	function ajax( $category, $depth = 1 ) {
		global $wgLang, $wgContLang, $wgRenderHashAppend;
		$title = self::makeTitle( $category );

		if ( ! $title ) {
			return false; # TODO: error message?
		}

		# Retrieve page_touched for the category
		$dbkey = $title->getDBkey();
		$dbr = wfGetDB( DB_SLAVE );
		$touched = $dbr->selectField( 'page', 'page_touched',
			array(
				'page_namespace' => NS_CATEGORY,
				'page_title' => $dbkey,
			), __METHOD__ );

		$mckey = wfMemcKey( "categorytree(" . $this->getOptionsAsCacheKey( $depth ) . ")", $dbkey, $wgLang->getCode(), $wgContLang->getExtraHashOptions(), $wgRenderHashAppend );

		$response = new AjaxResponse();

		if ( $response->checkLastModified( $touched ) ) {
			return $response;
		}

		if ( $response->loadFromMemcached( $mckey, $touched ) ) {
			return $response;
		}

		$html = $this->renderChildren( $title, $depth );

		if ( $html == '' ) {
			# HACK: Safari doesn't like empty responses.
			# see Bug 7219 and http://bugzilla.opendarwin.org/show_bug.cgi?id=10716
			$html = ' ';
		}

		$response->addText( $html );

		$response->storeInMemcached( $mckey, 86400 );

		return $response;
	}

	/**
	* Custom tag implementation. This is called by efCategoryTreeParserHook, which is used to
	* load CategoryTreeFunctions.php on demand.
	*/
	function getTag( $parser, $category, $hideroot = false, $attr, $depth = 1, $allowMissing = false ) {
		global $wgCategoryTreeDisableCache, $wgCategoryTreeDynamicTag;
		static $uniq = 0;

		$category = trim( $category );
		if ( $category === '' ) {
			return false;
		}

		if ( $parser && $wgCategoryTreeDisableCache && !$wgCategoryTreeDynamicTag ) {
			$parser->disableCache();
		}

		$title = self::makeTitle( $category );

		if ( $title === false || $title === null ) {
			return false;
		}

		if ( isset( $attr['class'] ) ) {
			$attr['class'] .= ' CategoryTreeTag';
		} else {
			$attr['class'] = ' CategoryTreeTag';
		}

		$attr['data-ct-mode'] = $this->mOptions['mode'];
		$attr['data-ct-options'] = Xml::escapeTagsOnly( $this->getOptionsAsJsStructure() );

		$html = '';
		$html .= Xml::openElement( 'div', $attr );

		if ( !$allowMissing && !$title->getArticleID() ) {
			$html .= Xml::openElement( 'span', array( 'class' => 'CategoryTreeNotice' ) );
			if ( $parser ) {
				$html .= $parser->recursiveTagParse( wfMsgNoTrans( 'categorytree-not-found', $category ) );
			} else {
				$html .= wfMsgExt( 'categorytree-not-found', 'parseinline', htmlspecialchars( $category ) );
			}
			$html .= Xml::closeElement( 'span' );
			}
		else {
			if ( !$hideroot ) {
				$html .= $this->renderNode( $title, $depth, $wgCategoryTreeDynamicTag );
			} elseif ( !$wgCategoryTreeDynamicTag ) {
				$html .= $this->renderChildren( $title, $depth );
			} else {
				$uniq += 1;
				$load = 'ct-' . $uniq . '-' . mt_rand( 1, 100000 );

				$html .= Xml::openElement( 'script', array( 'type' => 'text/javascript', 'id' => $load ) );
				$html .= 'categoryTreeLoadChildren("' . Xml::escapeJsString( $title->getDBkey() ) . '", ' . $this->getOptionsAsJsStructure( $depth ) . ', document.getElementById("' . $load . '").parentNode);';
				$html .= Xml::closeElement( 'script' );
			}
		}

		$html .= Xml::closeElement( 'div' );
		$html .= "\n\t\t";

		return $html;
	}

	/**
	* Returns a string with an HTML representation of the children of the given category.
	* $title must be a Title object
	*/
	function renderChildren( $title, $depth = 1 ) {
		global $wgCategoryTreeMaxChildren, $wgCategoryTreeUseCategoryTable;

		if ( $title->getNamespace() != NS_CATEGORY ) {
			// Non-categories can't have children. :)
			return '';
		}

		$dbr = wfGetDB( DB_SLAVE );

		$inverse = $this->isInverse();
		$mode = $this->getOption( 'mode' );
		$namespaces = $this->getOption( 'namespaces' );

		$tables = array( 'page', 'categorylinks' );
		$fields = array( 'page_id', 'page_namespace', 'page_title',
			'page_is_redirect', 'page_len', 'page_latest', 'cl_to',
			'cl_from' );
		$where = array();
		$joins = array();
		$options = array( 'ORDER BY' => 'cl_type, cl_sortkey', 'LIMIT' => $wgCategoryTreeMaxChildren );

		if ( $inverse ) {
			$joins['categorylinks'] = array( 'RIGHT JOIN', array( 'cl_to = page_title', 'page_namespace' => NS_CATEGORY ) );
			$where['cl_from'] = $title->getArticleId();
		} else {
			$joins['categorylinks'] = array( 'JOIN', 'cl_from = page_id' );
			$where['cl_to'] = $title->getDBkey();
			$options['USE INDEX']['categorylinks'] = 'cl_sortkey';

			# namespace filter.
			if ( $namespaces ) {
				# NOTE: we assume that the $namespaces array contains only integers! decodeNamepsaces makes it so.
				$where['page_namespace'] = $namespaces;
			} elseif ( $mode != CT_MODE_ALL ) {
				if ( $mode == CT_MODE_PAGES ) {
					$where['cl_type'] = array( 'page', 'subcat' );
				} else {
					$where['cl_type'] = 'subcat';
				}
			}
		}

		# fetch member count if possible
		$doCount = !$inverse && $wgCategoryTreeUseCategoryTable;

		if ( $doCount ) {
			$tables = array_merge( $tables, array( 'category' ) );
			$fields = array_merge( $fields, array( 'cat_id', 'cat_title', 'cat_subcats', 'cat_pages', 'cat_files' ) );
			$joins['category'] = array( 'LEFT JOIN', array( 'cat_title = page_title', 'page_namespace' => NS_CATEGORY ) );
		}

		$res = $dbr->select( $tables, $fields, $where, __METHOD__, $options, $joins );

		# collect categories separately from other pages
		$categories = '';
		$other = '';

		foreach ( $res as $row ) {
			# NOTE: in inverse mode, the page record may be null, because we use a right join.
			#      happens for categories with no category page (red cat links)
			if ( $inverse && $row->page_title === null ) {
				$t = Title::makeTitle( NS_CATEGORY, $row->cl_to );
			} else {
				# TODO: translation support; ideally added to Title object
				$t = Title::newFromRow( $row );
			}

			$cat = null;

			if ( $doCount && $row->page_namespace == NS_CATEGORY ) {
				$cat = Category::newFromRow( $row, $t );
			}

			$s = $this->renderNodeInfo( $t, $cat, $depth - 1, false );
			$s .= "\n\t\t";

			if ( $row->page_namespace == NS_CATEGORY ) {
				$categories .= $s;
			} else {
				$other .= $s;
			}
		}

		return $categories . $other;
	}

	/**
	* Returns a string with an HTML representation of the parents of the given category.
	* @var $title Title
	*/
	function renderParents( $title ) {
		global $wgCategoryTreeMaxChildren;

		$dbr = wfGetDB( DB_SLAVE );

		# additional stuff to be used if "transaltion" by interwiki-links is desired
		$transFields = '';
		$transJoin = '';
		$transWhere = '';

		$categorylinks = $dbr->tableName( 'categorylinks' );

		$sql = "SELECT " . NS_CATEGORY . " as page_namespace, cl_to as page_title $transFields
				FROM $categorylinks
				$transJoin
				WHERE cl_from = " . $title->getArticleID() . "
				$transWhere
				ORDER BY cl_to";
		$sql = $dbr->limitResult( $sql, (int)$wgCategoryTreeMaxChildren );

		$res = $dbr->query( $sql, __METHOD__ );

		$special = SpecialPage::getTitleFor( 'CategoryTree' );

		$s = '';

		foreach ( $res as $row ) {
			# TODO: translation support; ideally added to Title object
			$t = Title::newFromRow( $row );

			# $trans = $title->getLocalizedText();
			$trans = ''; # place holder for when translated titles are available

			$label = htmlspecialchars( $t->getText() );
			if ( $trans && $trans != $label ) $label .= ' ' . Xml::element( 'i', array( 'class' => 'translation' ), $trans );

			$wikiLink = $special->getLocalURL( 'target=' . $t->getPartialURL() . '&' . $this->getOptionsAsUrlParameters() );

			if ( $s !== '' ) $s .= wfMsgExt( 'pipe-separator' , 'escapenoentities' );

			$s .= Xml::openElement( 'span', array( 'class' => 'CategoryTreeItem' ) );
			$s .= Xml::openElement( 'a', array( 'class' => 'CategoryTreeLabel', 'href' => $wikiLink ) ) . $label . Xml::closeElement( 'a' );
			$s .= Xml::closeElement( 'span' );

			$s .= "\n\t\t";
		}

		return $s;
	}

	/**
	* Returns a string with a HTML represenation of the given page.
	* $title must be a Title object
	*/
	function renderNode( $title, $children = 0, $loadchildren = false ) {
		global $wgCategoryTreeUseCategoryTable;

		if ( $wgCategoryTreeUseCategoryTable && $title->getNamespace() == NS_CATEGORY && !$this->isInverse() ) {
			$cat = Category::newFromTitle( $title );
		} else {
			$cat = null;
		}

		return $this->renderNodeInfo( $title, $cat, $children, $loadchildren );
	}

	/**
	* Returns a string with a HTML represenation of the given page.
	* $info must be an associative array, containing at least a Title object under the 'title' key.
	*/
	function renderNodeInfo( $title, $cat, $children = 0, $loadchildren = false ) {
		static $uniq = 0;

		$mode = $this->getOption( 'mode' );
		$load = false;

		if ( $children > 0 && $loadchildren ) {
			$uniq += 1;

			$load = 'ct-' . $uniq . '-' . mt_rand( 1, 100000 );
		}

		$ns = $title->getNamespace();
		$key = $title->getDBkey();

		# $trans = $title->getLocalizedText();
		$trans = ''; # place holder for when translated titles are available

		$hideprefix = $this->getOption( 'hideprefix' );

		if ( $hideprefix == CT_HIDEPREFIX_ALWAYS ) {
			$hideprefix = true;
		} elseif ( $hideprefix == CT_HIDEPREFIX_AUTO ) {
			$hideprefix = ( $mode == CT_MODE_CATEGORIES );
		} elseif ( $hideprefix == CT_HIDEPREFIX_CATEGORIES ) {
			$hideprefix = ( $ns == NS_CATEGORY );
		} else {
			$hideprefix = true;
		}

		# when showing only categories, omit namespace in label unless we explicitely defined the configuration setting
		# patch contributed by Manuel Schneider <manuel.schneider@wikimedia.ch>, Bug 8011
		if ( $hideprefix ) {
			$label = htmlspecialchars( $title->getText() );
		} else {
			$label = htmlspecialchars( $title->getPrefixedText() );
		}

		if ( $trans && $trans != $label ) {
			$label .= ' ' . Xml::element( 'i', array( 'class' => 'translation' ), $trans );
		}

		$labelClass = 'CategoryTreeLabel ' . ' CategoryTreeLabelNs' . $ns;

		if ( !$title->getArticleId() ) {
			$labelClass .= ' new';
			$wikiLink = $title->getLocalURL( 'action=edit&redlink=1' );
		} else {
			$wikiLink = $title->getLocalURL();
		}

		if ( $ns == NS_CATEGORY ) {
			$labelClass .= ' CategoryTreeLabelCategory';
		} else {
			$labelClass .= ' CategoryTreeLabelPage';
		}

		if ( ( $ns % 2 ) > 0 ) {
			$labelClass .= ' CategoryTreeLabelTalk';
		}

		$count = false;
		$s = '';

		# NOTE: things in CategoryTree.js rely on the exact order of tags!
		#      Specifically, the CategoryTreeChildren div must be the first
		#      sibling with nodeName = DIV of the grandparent of the expland link.

		$s .= Xml::openElement( 'div', array( 'class' => 'CategoryTreeSection' ) );
		$s .= Xml::openElement( 'div', array( 'class' => 'CategoryTreeItem' ) );

		$attr = array( 'class' => 'CategoryTreeBullet' );

		# Get counts, with conversion to integer so === works
		$pageCount = $cat ? intval( $cat->getPageCount() ) : 0;
		$subcatCount = $cat ? intval( $cat->getSubcatCount() ) : 0;
		$fileCount = $cat ? intval( $cat->getFileCount() ) : 0;

		if ( $ns == NS_CATEGORY ) {

			if ( $cat ) {
				if ( $mode == CT_MODE_CATEGORIES ) {
					$count = $subcatCount;
				} elseif ( $mode == CT_MODE_PAGES ) {
					$count = $pageCount - $fileCount;
				} else {
					$count = $pageCount;
				}
			}
			if ( $count === 0 ) {
				$bullet = wfMsgNoTrans( 'categorytree-empty-bullet' ) . ' ';
				$attr['class'] = 'CategoryTreeEmptyBullet';
			} else {
				$linkattr = array( );
				if ( $load ) {
					$linkattr[ 'id' ] = $load;
				}

				$linkattr[ 'class' ] = "CategoryTreeToggle";
				$linkattr['style'] = 'display: none;'; // Unhidden by JS
				$linkattr['data-ct-title'] = $key;

				if ( $children == 0 || $loadchildren ) {
					$tag = 'span';
					$txt = wfMsgNoTrans( 'categorytree-expand-bullet' );
					# Don't load this message for ajax requests, so that we don't have to initialise $wgLang
					$linkattr[ 'title' ] = $this->mIsAjaxRequest ? '##LOAD##' : wfMsgNoTrans( 'categorytree-expand' );
					$linkattr[ 'data-ct-state' ] = 'collapsed';
				} else {
					$tag = 'span';
					$txt = wfMsgNoTrans( 'categorytree-collapse-bullet' );
					$linkattr[ 'title' ] = wfMsgNoTrans( 'categorytree-collapse' );
					$linkattr[ 'data-ct-loaded' ] = true;
					$linkattr[ 'data-ct-state' ] = 'expanded';
				}

				if ( $tag == 'a' ) {
					$linkattr[ 'href' ] = $wikiLink;
				}
				$bullet = Xml::openElement( $tag, $linkattr ) . $txt . Xml::closeElement( $tag ) . ' ';
			}
		} else {
			$bullet = wfMsgNoTrans( 'categorytree-page-bullet' );
		}
		$s .= Xml::tags( 'span', $attr, $bullet ) . ' ';

		$s .= Xml::openElement( 'a', array( 'class' => $labelClass, 'href' => $wikiLink ) ) . $label . Xml::closeElement( 'a' );

		if ( $count !== false && $this->getOption( 'showcount' ) ) {
			$pages = $pageCount - $subcatCount - $fileCount;

			$attr = array(
				'title' => wfMsgExt( 'categorytree-member-counts', 'parsemag', $subcatCount, $pages , $fileCount, $pageCount, $count )
			);

			global $wgContLang, $wgLang;
			$s .= $wgContLang->getDirMark() . ' ';
			$s .= Xml::tags( 'span', $attr,
				wfMsgExt( 'categorytree-member-num',
					array( 'parsemag', 'escapenoentities' ),
					$subcatCount,
					$pages,
					$fileCount,
					$pageCount,
					$wgLang->formatNum( $count ) ) );
		}

		$s .= Xml::closeElement( 'div' );
		$s .= "\n\t\t";
		$s .= Xml::openElement( 'div', array( 'class' => 'CategoryTreeChildren', 'style' => $children > 0 ? "display:block" : "display:none" ) );

		if ( $ns == NS_CATEGORY && $children > 0 && !$loadchildren ) {
			$children = $this->renderChildren( $title, $children );
			if ( $children == '' ) {
				$s .= Xml::openElement( 'i', array( 'class' => 'CategoryTreeNotice' ) );
				if ( $mode == CT_MODE_CATEGORIES ) {
					$s .= wfMsgExt( 'categorytree-no-subcategories', 'parsemag' );
				} elseif ( $mode == CT_MODE_PAGES ) {
					$s .= wfMsgExt( 'categorytree-no-pages', 'parsemag' );
				} elseif ( $mode == CT_MODE_PARENTS ) {
					$s .= wfMsgExt( 'categorytree-no-parent-categories', 'parsemag' );
				} else {
					$s .= wfMsgExt( 'categorytree-nothing-found', 'parsemag' );
				}
				$s .= Xml::closeElement( 'i' );
			} else {
				$s .= $children;
			}
		}

		$s .= Xml::closeElement( 'div' );
		$s .= Xml::closeElement( 'div' );

		if ( $load ) {
			$s .= "\n\t\t";
			$s .= Xml::openElement( 'script', array( 'type' => 'text/javascript' ) );
			$s .= 'categoryTreeExpandNode("' . Xml::escapeJsString( $key ) . '", ' . $this->getOptionsAsJsStructure( $children ) . ', document.getElementById("' . $load . '"));';
			$s .= Xml::closeElement( 'script' );
		}

		$s .= "\n\t\t";

		return $s;
	}

	/**
	* Creates a Title object from a user provided (and thus unsafe) string
	*/
	static function makeTitle( $title ) {
		$title = trim( $title );

		if ( $title === null || $title === '' || $title === false ) {
			return null;
		}

		# The title must be in the category namespace
		# Ignore a leading Category: if there is one
		$t = Title::newFromText( $title, NS_CATEGORY );
		if ( !$t || $t->getNamespace() != NS_CATEGORY || $t->getInterWiki() != '' ) {
			// If we were given something like "Wikipedia:Foo" or "Template:",
			// try it again but forced.
			$title = "Category:$title";
			$t = Title::newFromText( $title );
		}
		return $t;
	}
}
