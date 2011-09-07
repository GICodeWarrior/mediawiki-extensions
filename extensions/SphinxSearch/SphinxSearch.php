<?php

# Alert the user that this is not a valid entry point to MediaWiki if they try to access the file directly.
if ( !defined( 'MEDIAWIKI' ) ) {
	echo <<<EOT
To install SphinxSearch extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/SphinxSearch/SphinxSearch.php" );
EOT;
	exit( 1 );
}

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'version'        => '0.8.1',
	'name'           => 'SphinxSearch',
	'author'         => array( 'Svemir Brkic', 'Paul Grinberg' ),
	'email'          => 'svemir at deveblog dot com, gri6507 at yahoo dot com',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:SphinxSearch',
	'descriptionmsg' => 'sphinxsearch-desc'
);

$dir = dirname( __FILE__ ) . '/';

$wgAutoloadClasses[ 'SphinxMWSearch' ] = $dir . 'SphinxMWSearch.php';
$wgExtensionMessagesFiles['SphinxSearch'] = $dir . 'SphinxSearch.i18n.php';

# To completely disable the default search and replace it with SphinxSearch,
# set this BEFORE including SphinxSearch.php in LocalSettings.php
# $wgSearchType = 'SphinxMWSearch';

# Prior to version 0.8.0 there was a SphinxSearch search type
if ( $wgSearchType == 'SphinxSearch' ) {
	$wgSearchType == 'SphinxMWSearch';
}

if ( $wgSearchType == 'SphinxMWSearch' ) {
	$wgDisableSearchUpdate = true;
}

# This assumes you have copied sphinxapi.php from your Sphinx
# installation folder to your SphinxSearch extension folder
# not needed if you install http://pecl.php.net/package/sphinx
if ( !class_exists( 'SphinxClient' ) ) {
	require_once ( $dir . "sphinxapi.php" );
}

# Host and port on which searchd deamon is running
$wgSphinxSearch_host = '127.0.0.1';
$wgSphinxSearch_port = 9312;

# Main sphinx.conf index to search
$wgSphinxSearch_index = "wiki_main";

# By default, we search all available indexes
# You can also specify them explicitly, e.g
# $wgSphinxSearch_index_list = "wiki_main,wiki_incremental";
$wgSphinxSearch_index_list = "*";

# If you have multiple index files, you can specify their weights like this
# See http://www.sphinxsearch.com/docs/current.html#api-func-setindexweights
# $wgSphinxSearch_index_weights = array(
#	"wiki_main" => 100,
#	"wiki_incremental" => 10
# );
$wgSphinxSearch_index_weights = null;

# Default Sphinx search mode
$wgSphinxSearch_mode = SPH_MATCH_EXTENDED;

# Default sort mode
$wgSphinxSearch_sortmode = SPH_SORT_RELEVANCE;
$wgSphinxSearch_sortby = '';

# Set to true to use MW's default search snippets and highlighting
$wgSphinxSearchMWHighlighter = false;

# Should the suggestion (Did you mean?) mode be enabled? Possible values:
# enchant - see http://www.mediawiki.org/wiki/Extension_talk:SphinxSearch#Search_suggestions
# soundex - uses MySQL soundex() function to recommend existing titles
# aspell - uses aspell command-line utility to look for similar spellings
$wgSphinxSuggestMode = '';

# Path to aspell, adjust value if not in the system path
$wgSphinxSearchAspellPath = 'aspell';

# Path to (optional) personal aspell dictionary
$wgSphinxSearchPersonalDictionary = '';

# How many matches searchd will keep in RAM while searching
$wgSphinxSearch_maxmatches = 1000;

# When to stop searching all together (if not zero)
$wgSphinxSearch_cutoff = 0;

# Weights of individual indexed columns. This gives page titles extra weight
$wgSphinxSearch_weights = array(
	'old_text' => 1,
	'page_title' => 100
);
