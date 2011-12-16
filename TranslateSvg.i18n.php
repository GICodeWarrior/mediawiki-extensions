<?php

	$messages = array();
	$messages['en'] = array(
		'translatesvg'         => 'TranslateSVG',
		'translatesvg-desc'    => 'A MediaWiki extension that creates a Special page to provide a native-style interface for translating SVGs in line with the SVG1.1 specification.',# Special:translatesvg
		'translatesvg-legend'  => 'File path',
		'translatesvg-page'    => 'File:',
		'translatesvg-submit'  => 'Go',
		'translatesvg-summary' => 'This special page allows you to add, remove and modify translations embedded within a given SVG image file.',
		'translatesvg-add'     => 'If your language is not listed already, you can ',
		'translatesvg-addlink' => 'add it.',
		'translatesvg-xcoordinate-pre' => 'X-coordinate (horizontal): ',
		//'translatesvg-xcoordinate-post' => '',
		'translatesvg-ycoordinate-pre' => 'Y-coordinate (vertical): ',
		//'translatesvg-ycoordinate-post' => ''
	);
	$specialPageAliases['en'] = array(
        'TranslateSvg' => array( 'TranslateSVG', 'TranslateSvg' ),
	);
	$aliases =& $specialPageAliases; // for backwards compatibility with MediaWiki 1.15 and earlier.