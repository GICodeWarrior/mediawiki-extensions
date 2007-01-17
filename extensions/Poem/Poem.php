<?php
# MediaWiki Poem extension v1.0cis
#
# Based on example code from
# http://meta.wikimedia.org/wiki/Write_your_own_MediaWiki_extension
#
# All other code is copyright © 2005 Nikola Smolenski <smolensk@eunet.yu>
# (with modified parser callback and attribute additions)
#
# Anyone is allowed to use this code for any purpose.
# 
# To install, copy the extension to your extensions directory and add line
# include("extensions/Poem.php");
# to the bottom of your LocalSettings.php
#
# To use, put some text between <poem></poem> tags
#
# For more information see its page at
# http://meta.wikimedia.org/wiki/Poem_Extension

$wgExtensionFunctions[]="wfPoemExtension";
$wgExtensionCredits['parserhook'][] = array(
	'name' => 'Poem',
	'author' => 'Nikola Smolenski, Brion Vibber, Steve Sanbeg',
	'description' => 'adds <nowiki><poem></nowiki> tag for poem formatting',
	'url' => 'http://meta.wikimedia.org/wiki/Poem_Extension'
);
$wgParserTestFiles[] = dirname( __FILE__ ) . "/poemParserTests.txt";

function wfPoemExtension() {
	$GLOBALS['wgParser']->setHook("poem","PoemExtension");
}

function PoemExtension( $in, $param=array(), $parser=null ) {

    if (method_exists($parser, 'recursiveTagParse')) {
    	//new methods in 1.8 allow nesting <nowiki> in <poem>.
        $tag = $parser->insertStripItem("<br />", $parser->mStripState);
	$text = preg_replace(
		array("/^\n/","/\n$/D","/\n/",    "/^( +)/me"),
		array("",     "",      "$tag\n","str_replace(' ','&nbsp;','\\1')"),
		$in );
		$text = $parser->recursiveTagParse($text);
     } else {
  
	$text = preg_replace(
		array("/^\n/","/\n$/D","/\n/",    "/^( +)/me"),
		array("",     "",      "<br />\n","str_replace(' ','&nbsp;','\\1')"),
		$in );
	$ret = $parser->parse(
		$text,
		$parser->getTitle(),
		$parser->getOptions(),
		// We begin at line start
		true,
		// Important, otherwise $this->clearState()
		// would get run every time <ref> or
		// <references> is called, fucking the whole
		// thing up.
		false
	);
	
	$text = $ret->getText();
    }
  
	global $wgVersion;
	if( version_compare( $wgVersion, "1.7alpha" ) >= 0 ) {
		// Pass HTML attributes through to the output.
		$attribs = Sanitizer::validateTagAttributes( $param, 'div' );
	} else {
		// Can't guarantee safety on 1.6 or older.
		$attribs = array();
	}
	
	// Wrap output in a <div> with "poem" class.
	if( isset( $attribs['class'] ) ) {
		$attribs['class'] = 'poem ' . $attribs['class'];
	} else {
		$attribs['class'] = 'poem';
	}
	
	return wfOpenElement( 'div', $attribs ) .
		"\n" .
		trim( $text ) .
		"\n</div>";
}

?>
