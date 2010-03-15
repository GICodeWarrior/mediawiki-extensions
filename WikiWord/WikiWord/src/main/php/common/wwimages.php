<?php
require_once(dirname(__FILE__)."/wwwikis.php");

class ImageCollection {

    function __construct() {
	$this->images = array();
    }

    static function compareRecords($a, $b) {
	$d = (float)$b['score'] - (float)$a['score']; //NOTE: descending

	if ( $d > 0 ) return 1; 
	else if ( $d < 0 ) return -1; 
	else return 0;
    }

    function size() {
	return count($this->images);
    }

    function listImages($max) {
	uasort($this->images, "Imagecollection::compareRecords");

	if ($max) return array_slice($this->images, 0, $max);
	else return $this->images;
    }

    function addImage($image, $key, $usage = "page", $weight = 1) {
	if (!isset($this->images[$image])) {
	    $rec = array(
		"name" => $image,
		"score" => 0,
	    );
	} else {
	  $rec = $this->images[$image];
	}

	if (!isset($rec[$usage])) $rec[$usage] = array();
	$rec[$usage][] = $key;
	$rec["score"] += $weight;

	$this->images[$image] = $rec;
	return $rec['score'];
    }

    function addImages($images, $key, $usage = "page", $weight = 1) {
	foreach ($images as $image) {
	    $this->addImage($image, $key, $usage, $weight);
	}
    }

    function addImageUsage($image, $wiki, $usage = "page", $weight = 1) {
	$this->addImage($image, $key, $usage, $weight);
    }

    function addTags($image, $tags, $prefix = "") {
	global $wwTagScores;

	if (isset($this->images[$image])) {
	    foreach ($tags as $tag => $weight) {
		if (is_int($tag)) {
		    $tag = $prefix.$weight;

		    if (isset($wwTagScores[$tag])) $weight = $wwTagScores[$tag];
		    else $weight = 0;
		} else {
		    $tag = $prefix.$tag;
		}

		$this->images[$image]['score'] += $weight;
		$this->images[$image]['tags'][] = $tag;
	    }
	}
    }

}

class WWImages extends WWWikis {
    var $thesaurus;

    function __construct($thesaurus) {
	$this->thesaurus = $thesaurus;
	if ( !empty( $this->thesaurus->db ) ) $this->db = $thesaurus->db;
    }

    function queryImagesOnPage($lang, $ns, $title, $commonsOnly = false) {
	if ($lang == "commons") $commonsOnly = false;

	$imagelinks_table = $this->getWikiTableName($lang, "imagelinks");
	$page_table = $this->getWikiTableName($lang, "page");
	$image_table = $this->getWikiTableName($lang, "image");
	$commons_image_table = $this->getWikiTableName("commons", "image");

	$sql = "/* queryImagesOnPage(" . $this->quote($lang) . ", " . (int)$ns . ", " . $this->quote($title) . ", " . (int)$commonsOnly . ") */ ";

	$sql .= " SELECT I.il_to as name FROM $imagelinks_table as I ";
	$sql .= " JOIN $page_table as P on P.page_id = I.il_from ";
	if ($commonsOnly) $sql .= " LEFT JOIN $image_table as R on R.img_name = I.il_to ";
	if ($commonsOnly) $sql .= " JOIN $commons_image_table as C on C.img_name = I.il_to ";
	
	$sql .= " WHERE P.page_namespace = " . (int)$ns;
	$sql .= " AND P.page_title = " . $this->quote($title);
	if ($commonsOnly) $sql .= " AND R.img_name IS NULL";

	return $this->queryWiki($lang, $sql);
    }

    function getImagesOnPage($lang, $ns, $title, $commonsOnly = false) {
	$rs = $this->queryImagesOnPage($lang, $ns, $title, $commonsOnly);

	$list = WWUtils::slurpList($rs, "name");
	mysql_free_result($rs);

	return $list;
    }

    function queryImagesOnPageTemplates($lang, $ns, $title, $commonsOnly = false) {
	if ($lang == "commons") $commonsOnly = false;

	$imagelinks_table = $this->getWikiTableName($lang, "imagelinks");
	$page_table = $this->getWikiTableName($lang, "page");
	$image_table = $this->getWikiTableName($lang, "image");
	$commons_image_table = $this->getWikiTableName("commons", "image");
	$templatelinks_table = $this->getWikiTableName($lang, "templatelinks");

	$sql = "/* queryImagesOnPageTemplates(" . $this->quote($lang) . ", " . (int)$ns . ", " . $this->quote($title) . ", " . (int)$commonsOnly . ") */ ";

	$sql .= " SELECT I.il_to as name FROM $imagelinks_table as I ";
	$sql .= " JOIN $page_table as TP on TP.page_id = I.il_from ";
	$sql .= " JOIN $templatelinks_table as T on T.tl_namespace = TP.page_namespace AND T.tl_title = TP.page_title ";
	$sql .= " JOIN $page_table as P on P.page_id = T.tl_from ";
	if ($commonsOnly) $sql .= " LEFT JOIN $image_table as R on R.img_name = I.il_to ";
	if ($commonsOnly) $sql .= " JOIN $commons_image_table as C on C.img_name = I.il_to ";

	$sql .= " WHERE P.page_namespace = " . (int)$ns;
	$sql .= " AND P.page_title = " . $this->quote($title);
	if ($commonsOnly) $sql .= " AND R.img_name IS NULL";

	return $this->queryWiki($lang, $sql);
    }

    function getImagesOnPageTemplates($lang, $ns, $title, $commonsOnly = false) {
	$rs = $this->queryImagesOnPageTemplates($lang, $ns, $title, $commonsOnly);
	$list = WWUtils::slurpList($rs, "name");
	mysql_free_result($rs);
	return $list;
    }

    function queryImagesInCategory($lang, $title) {
	$categorylinks_table = $this->getWikiTableName($lang, "categorylinks");
	$page_table = $this->getWikiTableName($lang, "page");

	$sql = "/* queryImagesInCategory(" . $this->quote($lang) . ", " . $this->quote($title) . ") */ ";

	$sql .= " SELECT P.page_title as name FROM $page_table as P ";
	$sql .= " JOIN $categorylinks_table as C on C.cl_from = P.page_id ";

	$sql .= " WHERE C.cl_to = " . $this->quote($title);
	$sql .= " AND P.page_namespace = " . NS_IMAGE;

	return $this->queryWiki($lang, $sql);
    }

    function getImagesInCategory($lang, $title) {
	$rs = $this->queryImagesInCategory($lang, $title);
	$list = WWUtils::slurpList($rs, "name");
	mysql_free_result($rs);
	return $list;
    }

    function queryTagsForImages($lang, $images, $tagTable) {
	if (!$images) return false;

	$sql = "/* queryTagsForImages(" . $this->quote($lang) . ", " . $this->quoteSet($images) . ") */ ";

	$sql .= " SELECT image, group_concat( concat(type, ':', tag) separator '|') as tags ";
 	$sql .= " FROM $tagTable as T ";
	$sql .= " WHERE T.image IN " . $this->quoteSet($images);
 	$sql .= " GROUP BY image ";

	return $this->queryWiki($lang, $sql);
    }

    function getTagsForImages($lang, $images, $tagTable) {
	if (!$images) return array();

	$rs = $this->queryTagsForImages($lang, $images, $tagTable);
	$list = WWUtils::slurpAssoc($rs, "image", "tags");
	mysql_free_result($rs);
	return $list;
    }

    function queryTemplatesOnImagePage($lang, $image) {
	$page_table = $this->getWikiTableName($lang, "page");
	$templatelinks_table = $this->getWikiTableName($lang, "templatelinks");

	$sql = "/* queryTemplatesOnImagePage(" . $this->quote($lang) . ", " . $this->quote($image) . ") */ ";

	$sql .= " SELECT tl_title as template FROM $templatelinks_table as T ";
	$sql .= " JOIN $page_table as P on P.page_id = T.tl_from AND T.tl_namespace = " . NS_TEMPLATE . " ";

	$sql .= " WHERE P.page_title = " . $this->quote($image);
	$sql .= " AND P.page_namespace = " . NS_IMAGE;

	return $this->queryWiki($lang, $sql);
    }

    function getTemplatesOnImagePage($lang, $image) {
	$rs = $this->queryTemplatesOnImagePage($lang, $image);
	$list = WWUtils::slurpList($rs, "template");
	mysql_free_result($rs);
	return $list;
    }

    function queryCategoriesOfImagePage($lang, $image) {
	$page_table = $this->getWikiTableName($lang, "page");
	$categorylinks_table = $this->getWikiTableName($lang, "categorylinks");

	$sql = "/* queryCategoriesOfImagePage(" . $this->quote($lang) . ", " . $this->quote($image) . ") */ ";

	$sql .= " SELECT cl_to as category FROM $categorylinks_table as C ";
	$sql .= " JOIN $page_table as P on P.page_id = C.cl_from ";

	$sql .= " WHERE P.page_title = " . $this->quote($image);
	$sql .= " AND P.page_namespace = " . NS_IMAGE;

	return $this->queryWiki($lang, $sql);
    }

    function getCategoriesOfImagePage($lang, $image) {
	$rs = $this->queryCategoriesOfImagePage($lang, $image);
	$list = WWUtils::slurpList($rs, "category");
	mysql_free_result($rs);
	return $list;
    }

    function getTemplateScores($templates, $values = NULL) {
	global $wwTemplateScores;
	if ($values === NULL) $values = $wwTemplateScores;

	if (!$values) return 0;

	$score = 0;
	foreach ($templates as $t) {
	    $v = @$values[$t];
	    if ($v) $score += $v;
	}

	return $score;
    }

    function getRelevantImagesOnPage($lang, $ns, $title, $commonsOnly = false) {
	$img = $this->getImagesOnPage($lang, 0, $title, true);
	$timg = $this->getImagesOnPageTemplates($lang, 0, $title, true);
	$img = array_diff($img, $timg);
	return $img;
    }

    function queryImagesOnPagesGlobally( $concepts ) {
	global $wwLanguages;

	if (!$concepts) return false;

	$globalimagelinks_table = $this->getWikiTableName("commons", "globalimagelinks");

	$wikis = array();
	$pages = array();

	foreach ($concepts as $lang => $rc) {
	    if (!isset($wwLanguages[$lang])) continue;

	    $wiki = $lang . "wiki";
	    if (!in_array($wiki, $wikis)) $wikis[] = $wiki;

	    foreach ($rc as $r => $t) {
		if ( $t != 10) continue; //use only articles
		$p = "gil_wiki = " . $this->quote($wiki) . " AND gil_page_namespace_id = 0 AND gil_page_title = " . $this->quote($r);
		$pages[] = $p;
	    }
	}

	if (!$pages || !$wikis) return false;

	$sql = " /* queryImagesOnPagesGlobally() */ ";
	$sql .= " SELECT distinct gil_to as image FROM $globalimagelinks_table ";
	$sql .= " WHERE gil_wiki in " . $this->quoteSet( $wikis );
	$sql .= " AND gil_page_namespace_id = 0 ";
	$sql .= " AND ( ( " . implode(" ) OR ( ", $pages) . " ) ) ";

	print "(** $sql **)";
	
	return $this->queryWiki("commons", $sql);
    }

    function getImagesOnPagesGlobally( $concepts ) {
	if (!$concepts) return array();

	$rs = $this->queryImagesOnPagesGlobally($concepts);
	if (!$rs) return false;

	$list = WWUtils::slurpList($rs, "image");
	mysql_free_result($rs);
	return $list;
    }

    function queryGlobalUsageCounts( $images, $wikis = ".*wiki" ) {
	if (!$images) return false;

	$globalimagelinks_table = $this->getWikiTableName("commons", "globalimagelinks");

	$sql = " /* queryGlobalUsageCounts() */ ";
	$sql .= " SELECT gil_to as image, gil_wiki as wiki, count(*) as linkcount FROM $globalimagelinks_table ";
	$sql .= " WHERE gil_page_namespace_id = 0 ";
	$sql .= " AND gil_to IN " . $this->quoteSet( $images );

	if ( $wikis ) {
	    if ( is_array( $wikis ) ) $sql .= " AND gil_wiki IN " . $this->quoteSet( $wikis );
	    else if ( is_array( $wikis ) ) $sql .= " AND gil_wiki REGEX " . $this->quote( '^' . $wikis . '$' );

	    #TODO: could also limit to to x or min size n using toolserver.wiki !
	}

	$sql .= " GROUP BY gil_to, gil_wiki ";
	$sql .= " ORDER BY gil_to, gil_wiki ";
	
	return $this->queryWiki("commons", $sql);
    }

    function getGlobalUsageCounts( $images, $wikis = ".*wiki" ) {
	if (!$images) return array();

	$rs = $this->queryGlobalUsageCounts($images, $wikis);
	if (!$rs) return false;

	if (is_string($rs)) $rs = $this->query($rs);

	$imageUsage = array();
	$current = NULL;
	$stats = array();
	while ($row = mysql_fetch_assoc($rs)) {
	    $image = $row["image"];
	    $wiki = $row["wiki"];
	    $linkcount = $row["linkcount"];

	    if ( is_null($current) ) $current = $image;
	    else if ($current != $image) {
		$imageUsage[$current] = $stats;
		$stats = array();
		$current = $image;
	    }

	    $stats[$wiki] = $linkcount;
	}

	if ($current) $imageUsage[$current] = $stats;

	return $imageUsage;
    }

    function getImagesAbout($concept, $max = 0) {
	global $wwLanguages, $wwFrequentImageThreshold; //FIXME: put config into member vars!

	$pages = null;
	if ( is_array($concept) ) {
		if (isset($concept['pages']) && $concept['pages']!==null) $pages = $concept['pages'];
		else if (isset($concept['id']) && $concept['id']!==null) $concept = $concept['id'];
		else if (isset($concept['concept'])) $concept = $concept['concept'];
	} 

	if ($pages === null) {
		$pages = $this->thesaurus->getPagesForConcept($concept);
		if (!$pages) return false;
	}

	$images = new ImageCollection();

	$globalImageList = $this->getImagesOnPagesGlobally($pages); //use wikis for $wwLanguages only
	//TODO: sanity limit on number of images. $max * 5 ?
	$globalImageUsage = $this->getGlobalUsageCounts($globalImageList, ".*wiki"); //use all wikipedias

	foreach ($globalImageUsage as $image => $usage) {
	    foreach ($usage as $wiki => $c) {
		if ( $c >= $wwFrequentImageThreshold ) continue;
		$images->addImageUsage($image, $wiki.":*", "article", 1);
	    }
	}

	if ($max && $images->size()>$max) { //short-cirquit, if we already reached the max
	    $this->addImageTags($images);
	    return $images->listImages($max);
	}

	if (isset($pages['commons'])) {
	    $cpages = $pages['commons'];

	    foreach ($cpages as $cpage => $t) {
		if ( $t == 50 && preg_match('/^Category:(.*)$/', $cpage, $m) ) {
		    if ( @$m[1] ) $cpage = $m[1]; //hack
		    $img = $this->getImagesInCategory("commons", $cpage); 

		    if ($img) $images->addImages($img, "commons:category:" . $cpage, "category", 0.5);
		}
	    }
	}

	$this->addImageTags($images);
	return $images->listImages($max);
    }

    function addImageTags($images) {
	global $wwTagsTable;


	if ( $wwTagsTable ) {
		$img = array();
		foreach ($images->images as $image) {
			$img[] = $image['name'];
		}

		$tagMap = $this->getTagsForImages('commons', $img, $wwTagsTable);
		foreach ($tagMap as $image => $tags) {
			if ($tags) {
				if (is_string($tags)) $tags = preg_split('/\s*[|;]\s*/', $tags);
				$images->addTags($image, $tags, "");
			}
		}
	} else {
		foreach ($images->images as $image) {
			$image = $image['name'];

			$tmps = $this->getTemplatesOnImagePage('commons', $image);
			if ($tmps) $images->addTags($image, $tmps, "Template:");
			
			$cats = $this->getCategoriesOfImagePage('commons', $image);
			if ($cats) $images->addTags($image, $cats, "Category:");
		}
	}
    }

    function getThumbnailURL($image, $width = 120, $height = NULL) {
	global $wwThumbnailURL;

	if (is_array($image)) $image = $image['name'];

	if (!$height) $height = $width;

	$u = $wwThumbnailURL;
	$u = str_replace("{name}", urlencode($image), $u);
	$u = str_replace("{width}", !$width ? "" : urlencode($width), $u);
	$u = str_replace("{height}", !$height ? "" : urlencode($height), $u);

	return $u;
    }

    function getImagePageURL($image) {
	global $wwImagePageURL;

	if (is_array($image)) $image = $image['name'];

	$u = $wwImagePageURL;
	$u = str_replace("{name}", urlencode($image), $u);

	return $u;
    }

    function getThumbnailHTML($image, $w = 120, $h = NULL) {
	$thumb = $this->getThumbnailURL($image, $w, $h);
	$page = $this->getImagePageURL($image);

	if (is_array($image)) {
	    $title = @$image['title'];
	    $name = @$image['name'];
	} else {
	    $name = $image;
	}

	if (!@$title) $title = $name;

	$tags = "";
	if (isset($image['tags'])) {
	    foreach ($image['tags'] as $tag) {
		$tags .= "tag-" . str_replace(":", "-", $tag) . " ";
	    }
	}

	$html= "<img src=\"" . htmlspecialchars($thumb) . "\" alt=\"" . htmlspecialchars($title) . "\" border=\"0\"/>";
	$html= "<a href=\"" . htmlspecialchars($page) . "\" title=\"" . htmlspecialchars($title) . " (score " . htmlspecialchars($image['score']) . ")\" class=\"thumb-link $tags\">$html</a>";

	if (is_array($image)) {
	    $html .= "<!-- " . str_replace("--", "~~", var_export( $image, true ) ) . " -->";
	}

	return $html;
    }
}
