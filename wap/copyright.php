<?php
/*
 * hawpedia article copyright page
 * $Date: 2006/11/13 23:13:15 $
 */

require_once('config.php');
require_once('hawpedia.php');
require_once('hawhaw/hawhaw.inc');

start_hawpedia_session(); // set session params

require('lang/' . $_SESSION['language'] . '/copyright_text.php');

$deck = new HAW_deck(HAWIKI_TITLE, HAW_ALIGN_CENTER);
set_deck_properties($deck);

$emptyLine = new HAW_text("");
$wp_image = new HAW_image(HAWIKI_WIKIPEDIA_ICON . ".wbmp",
                HAWIKI_WIKIPEDIA_ICON . ".gif", "");
#$wp_image->set_voice_text("");
$deck->add_image($wp_image);

$deck->add_text($emptyLine);
		
$emptyLine = new HAW_text("");
  
$title = new HAW_text($copyright['Copyright'], HAW_TEXTFORMAT_BOLD);
$deck->add_text($title);
$deck->add_text($emptyLine);

$text = new HAW_text($copyright['gfdlText']);
$deck->add_text($text);
$deck->add_text($emptyLine);

$gfdlLink = new HAW_link($copyright['gfdlLinkText'], "transcode.php?go=" . urlencode($copyright['gfdlLinkPage']));
$deck->add_link($gfdlLink);

$sourceLink = new HAW_link($copyright['Source'],
                           "http://" . $_SESSION['language'] . ".wikipedia.org/wiki/" . $_GET['article']);
$deck->add_link($sourceLink);

$historyLink = new HAW_link($copyright['History'],
                            "http://" . $_SESSION['language'] . ".wikipedia.org/w/index.php?action=history&title=" . $_GET['article']);
$deck->add_link($historyLink);

$homelink = new HAW_link(hawtra("Home"), "index.php");
$deck->add_link($homelink);

$deck->create_page();

?>
