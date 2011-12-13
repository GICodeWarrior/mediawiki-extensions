<?php

/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * @author Roan Kattouw <roan.kattouw@home.nl>
 * @copyright Copyright © 2007 Roan Kattouw 
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * An extension that allows for abbreviated inline citations.
 * Idea by Joe Beaudoin Jr. from The Great Machine wiki <http://tgm.firstones.com/> 
 * Code by Roan Kattouw (AKA Catrope) <roan.kattouw@home.nl>
 * For information on how to install and use this extension, see the README file.
 *
 */
 
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'redircite',
	'author' => 'Roan Kattouw',
	'description' => 'Allows for abbreviated inline citations',
	'version' => '1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:Redircite'
);

$wgHooks['ParserFirstCallInit'][] = 'redircite_setup';

function redircite_setup(&$parser) {
	$parser->setHook('redircite', 'redircite_render');
	return true;
}

function redircite_render($input, $args, &$parser) {
	// Generate HTML code and add it to the $redirciteMarkerList array
	// Add "xx-redircite-marker-NUMBER-redircite-xx" to the output,
	// which will be translated to the HTML stored in $redirciteMarkerList by
	// redircite_afterTidy()
	global $redirciteMarkerList;
	# Verify that $input is a valid title
	$inputTitle = Title::newFromText($input);
	if(!$inputTitle)
		return $input;
	$link1 = $parser->recursiveTagParse("[[$input]]");
	$title1 = Title::newFromText($input);
	if(!$title1->exists()) // Page doesn't exist
		// Just output a normal (red) link
		return $link1;
	$articleObj = new Article($title1);
	$title2 = Title::newFromRedirect($articleObj->fetchContent());
	if(!$title2) // Page is not a redirect
		// Just output a normal link
		return $link1;
	
	$link2 = $parser->recursiveTagParse("[[{$title2->getPrefixedText()}|$input]]");
	
	$marker = "xx-redircite-marker-" . count($redirciteMarkerList) . "-redircite-xx";
	$onmouseout = 'this.firstChild.innerHTML = "'. Xml::escapeJsString($input) . '";';
	$onmouseover = 'this.firstChild.innerHTML = "' . Xml::escapeJsString($title2->getPrefixedText()) . '";';
	return Xml::tags('span', array(
					'onmouseout' => $onmouseout,
					'onmouseover' => $onmouseover),
					$link2);
}
