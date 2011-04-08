<?php
/**
 * Configuration file for webfonts
 * First font is the default font for the language
 * @file
 * @ingroup Extensions
 */
$fontsPath = "$wgScriptPath/extensions/WebFonts/fonts";
$wgWebFonts = array(
	'fonts' => array(
		'RufScript' => array(
			'eot' => "$fontsPath/en/Rufscript.eot",
			'ttf' => "$fontsPath/en/Rufscript.ttf",
			'woff' => "$fontsPath/en/Rufscript.woff",
		),

		'Perizia' => array(
			'eot' => "$fontsPath/en/Perizia.eot",
			'ttf' => "$fontsPath/en/Perizia.ttf",
			'woff' => "$fontsPath/en/Perizia.woff",
		),
		'Ubuntu' => array(
			'eot' => "$fontsPath/en/ubuntu-r-webfont.eot",
			'ttf' => "$fontsPath/en/ubuntu-r.ttf",
			'woff' => "$fontsPath/en/ubuntu-r-webfont.woff",
			'svg' => "$fontsPath/en/ubuntu-r-webfont.svg",
		),
		'Dyuthi' => array(
			'eot' => "$fontsPath/ml/Dyuthi.eot",
			'ttf' => "$fontsPath/ml/Dyuthi.ttf",
			'woff' => "$fontsPath/ml/Dyuthi.woff",
			'size' => 32,
			'normalization' => array(
				"ൾ" => "ള്‍",
				"ൻ" => "ന്‍",
				"ർ" => "ര്‍",
				"ൺ "=> "ണ്‍",
				"ൽ" => "ല്‍",
				"ൿ" => "ക്‍ ",
				"ൻ‍റ" => "ന്റ",
				"ന്‍റെ" => "ന്റെ"
			)
		),

		'Meera' => array(
			'eot' => "$fontsPath/ml/Meera.eot",
			'ttf' => "$fontsPath/ml/Meera.ttf",
			'woff' => "$fontsPath/ml/Meera.woff",
			'size' => 20,
			'normalization' => array(
				"ൾ" => "ള്‍",
				"ൻ" => "ന്‍",
				"ർ" => "ര്‍",
				"ൺ "=> "ണ്‍",
				"ൽ" => "ല്‍",
				"ൿ" => "ക്‍ ",
				"ൻ‍റ" => "ന്റ",
				"ന്‍റെ" => "ന്റെ"
			)
		),

		'Rachana' => array(
			'eot' => "$fontsPath/ml/Rachana.eot",
			'ttf' => "$fontsPath/ml/Rachana.ttf",
			'woff' => "$fontsPath/ml/Rachana.woff",
			'normalization' => array(
				"ൾ" => "ള്‍",
				"ൻ" => "ന്‍",
				"ർ" => "ര്‍",
				"ൺ "=> "ണ്‍",
				"ൽ" => "ല്‍",
				"ൿ" => "ക്‍ ",
				"ൻ‍റ" => "ന്റ",
				"ന്‍റെ" => "ന്റെ"
			)
		),
		'RaghuMalayalam' => array(
			'eot' => "$fontsPath/ml/RaghuMalayalam.eot",
			'ttf' => "$fontsPath/ml/RaghuMalayalam.ttf",
			'woff' => "$fontsPath/ml/RaghuMalayalam.woff",
			'normalization' => array(
				"ൾ" => "ള്‍",
				"ൻ" => "ന്‍",
				"ർ" => "ര്‍",
				"ൺ "=> "ണ്‍",
				"ൽ" => "ല്‍",
				"ൿ" => "ക്‍ ",
				"ൻ‍റ" => "ന്റ",
				"ന്‍റെ" => "ന്റെ"
			)
		),
		'Lohit Oriya' => array(
			'eot' => "$fontsPath/or/Lohit-Oriya.eot",
			'ttf' => "$fontsPath/or/Lohit-Oriya.ttf",
			'woff' => "$fontsPath/or/Lohit-Oriya.woff",
		),
		'Lohit Tamil' => array(
			'eot' => "$fontsPath/or/Lohit-Tamil.eot",
			'ttf' => "$fontsPath/or/Lohit-Tamil.ttf",
			'woff' => "$fontsPath/or/Lohit-Tamil.woff",
		),
	),

	'languages' => array(
		'en' => array( 'RufScript', 'Perizia', 'Ubuntu' ),
		'ml' => array( 'Meera', 'Rachana' , 'Dyuthi', 'RaghuMalayalam'),
		'or' => array( 'Lohit Oriya'),
		'ta' => array( 'Lohit Tamil'),
	),
);
