<?php
/**
 * Configuration file for webfonts
 * First font is the default font for the language
 * @file
 * @ingroup Extensions
 */
$wgWebFonts = array(
	'basepath' => "$wgScriptPath/extensions/WebFonts/fonts/",
	'fonts' => array(
		'RufScript' => array(
			'eot' => "en/Rufscript.eot",
			'ttf' => "en/Rufscript.ttf",
			'woff' => "en/Rufscript.woff",
		),

		'Perizia' => array(
			'eot' => "en/Perizia.eot",
			'ttf' => "en/Perizia.ttf",
			'woff' => "en/Perizia.woff",
		),
		'Ubuntu' => array(
			'eot' => "en/ubuntu-r-webfont.eot",
			'ttf' => "en/ubuntu-r.ttf",
			'woff' => "en/ubuntu-r-webfont.woff",
			'svg' => "en/ubuntu-r-webfont.svg",
			),
		'AnjaliOldLipi' => array(
			'eot' => "ml/AnjaliOldLipi.eot",
			'ttf' => "ml/AnjaliOldLipi.ttf",
			'woff' => "ml/AnjaliOldLipi.woff",
		),
		'Meera' => array(
			'eot' => "ml/Meera.eot",
			'ttf' => "ml/Meera.ttf",
			'woff' => "ml/Meera.woff",
			'scale' => 1.5,
			'normalization' => array(
				"ൾ" => "ള്‍",
				"ൻ" => "ന്‍",
				"ർ" => "ര്‍",
				"ൺ " => "ണ്‍",
				"ൽ" => "ല്‍",
				"ൿ" => "ക്‍ ",
				"ൻ‍റ" => "ന്റ",
				"ന്‍റെ" => "ന്റെ"
				)
				),

		'Rachana' => array(
			'eot' => "ml/Rachana.eot",
			'ttf' => "ml/Rachana.ttf",
			'woff' => "ml/Rachana.woff",
			'normalization' => array(
				"ൾ" => "ള്‍",
				"ൻ" => "ന്‍",
				"ർ" => "ര്‍",
				"ൺ " => "ണ്‍",
				"ൽ" => "ല്‍",
				"ൿ" => "ക്‍ ",
				"ൻ‍റ" => "ന്റ",
				"ന്‍റെ" => "ന്റെ"
				)
				),
		'RaghuMalayalam' => array(
			'eot' => "ml/RaghuMalayalam.eot",
			'ttf' => "ml/RaghuMalayalam.ttf",
			'woff' => "ml/RaghuMalayalam.woff",
			'normalization' => array(
				"ൾ" => "ള്‍",
				"ൻ" => "ന്‍",
				"ർ" => "ര്‍",
				"ൺ " => "ണ്‍",
				"ൽ" => "ല്‍",
				"ൿ" => "ക്‍ ",
				"ൻ‍റ" => "ന്റ",
				"ന്‍റെ" => "ന്റെ"
				)
				),
		'Lohit Oriya' => array(
			'eot' => "or/Lohit-Oriya.eot",
			'ttf' => "or/Lohit-Oriya.ttf",
			'woff' => "or/Lohit-Oriya.woff",
				),
		'Lohit Tamil' => array(
			'eot' => "ta/Lohit-Tamil.eot",
			'ttf' => "ta/Lohit-Tamil.ttf",
			'woff' => "ta/Lohit-Tamil.woff",
				),
		'Lohit Telugu' => array(
			'eot' => "te/LohitTelugu.eot",
			'ttf' => "te/LohitTelugu.ttf",
			'woff' => "te/LohitTelugu.woff",
				),
		'Lohit Bengali' => array(
			'eot' => "bn/LohitBengali.eot",
			'ttf' => "bn/LohitBengali.ttf",
			'woff' => "bn/LohitBengali.woff",
				),
		'Samyak Gujarati' => array(
			'eot' => "gu/SamyakGujarati.eot",
			'ttf' => "gu/SamyakGujarati.ttf",
			'woff' => "gu/SamyakGujarati.woff",
				),
		'Lohit Hindi' => array(
			'eot' => "hi/LohitHindi.eot",
			'ttf' => "hi/LohitHindi.ttf",
			'woff' => "hi/LohitHindi.woff",
				),
		'Samyak Devanagari' => array(
			'eot' => "hi/SamyakDevanagari.eot",
			'ttf' => "hi/SamyakDevanagari.ttf",
			'woff' => "hi/SamyakDevanagari.woff",
				),
		'Miriam CLM' => array(
			'eot' => "he/MiriamCLM-Book.eot",
			'ttf' => "he/MiriamCLM-Book.ttf",
			'woff' => "he/MiriamCLM-Book.woff",
				),		
		'Taamey Frank CLM' => array(
			'eot' => "he/TaameyFrankCLM.eot",
			'ttf' => "he/TaameyFrankCLM.ttf",
			'woff' => "he/TaameyFrankCLM.woff",
			'svg' => "he/TaameyFrankCLM.svg",
				),
		'Kedage' => array(
			'eot' => "kn/Kedage.eot",
			'ttf' => "kn/Kedage.ttf",
			'woff' => "kn/Kedage.woff",
				),
		'Lohit Kannada' => array(
			'eot' => "kn/LohitKannada.eot",
			'ttf' => "kn/LohitKannada.ttf",
			'woff' => "kn/LohitKannada.woff",
				),
		'Masterpiece Uni Sans' => array(
			'eot' => "my/MasterpieceUniSans.eot",
			'ttf' => "my/MasterpieceUniSans.ttf",
			'woff' => "my/MasterpieceUniSans.woff",
			'svg' =>  "my/MasterpieceUniSans.svg",
		),
		'Padauk-Regular' => array(
			'eot' => "my/Padauk-Regular.eot",
			'ttf' => "my/Padauk-Regular.ttf",
			'woff' => "my/Padauk-Regular.woff",
			'svg' =>  "my/Padauk-Regular.svg",
		),
		'Myanmar3' => array(
			'eot' => "my/Myanmar3.eot",
			'ttf' => "my/Myanmar3.ttf",
			'woff' => "my/Myanmar3.woff",
			'svg' =>  "my/Myanmar3.svg",
		),
		'Yunghkio' => array(
			'eot' => "my/Yunghkio.eot",
			'ttf' => "my/Yunghkio.ttf",
			'woff' => "my/Yunghkio.woff",
			'svg' =>  "my/Yunghkio.svg",
		),
		'KhmerOSbattambang' => array(
			'eot' => "km/KhmerOSbattambang.eot",
			'ttf' => "km/KhmerOSbattambang.ttf",
			'woff' => "km/KhmerOSbattambang.woff",
			'svg' =>  "km/KhmerOSbattambang.svg",
		),
		'KhmerOSbokor' => array(
			'eot' => "km/KhmerOSbokor.eot",
			'ttf' => "km/KhmerOSbokor.ttf",
			'woff' => "km/KhmerOSbokor.woff",
			'svg' =>  "km/KhmerOSbokor.svg",
		),
		'KhmerOS' => array(
			'eot' => "km/KhmerOS.eot",
			'ttf' => "km/KhmerOS.ttf",
			'woff' => "km/KhmerOS.woff",
			'svg' =>  "km/KhmerOS.svg",
		),
		'KhmerOSsiemreap' => array(
			'eot' => "km/KhmerOSsiemreap.eot",
			'ttf' => "km/KhmerOSsiemreap.ttf",
			'woff' => "km/KhmerOSsiemreap.woff",
			'svg' =>  "km/KhmerOSsiemreap.svg",
		),
		'KhmerOSmuollight' => array(
			'eot' => "km/KhmerOSmuollight.eot",
			'ttf' => "km/KhmerOSmuollight.ttf",
			'woff' => "km/KhmerOSmuollight.woff",
			'svg' =>  "km/KhmerOSmuollight.svg",
		),
		'KhmerOSmuol' => array(
			'eot' => "km/KhmerOSmuol.eot",
			'ttf' => "km/KhmerOSmuol.ttf",
			'woff' => "km/KhmerOSmuol.woff",
			'svg' =>  "km/KhmerOSmuol.svg",
		),
		'KhmerOSmuolpali' => array(
			'eot' => "km/KhmerOSmuolpali.eot",
			'ttf' => "km/KhmerOSmuolpali.ttf",
			'woff' => "km/KhmerOSmuolpali.woff",
			'svg' =>  "km/KhmerOSmuolpali.svg",
		),
		'KhmerOSfreehand' => array(
			'eot' => "km/KhmerOSfreehand.eot",
			'ttf' => "km/KhmerOSfreehand.ttf",
			'woff' => "km/KhmerOSfreehand.woff",
			'svg' =>  "km/KhmerOSfreehand.svg",
		),
		'KhmerOSfasthand' => array(
			'eot' => "km/KhmerOSfasthand.eot",
			'ttf' => "km/KhmerOSfasthand.ttf",
			'woff' => "km/KhmerOSfasthand.woff",
			'svg' =>  "km/KhmerOSfasthand.svg",
		),
		'Pagul' => array(
			'eot' => "saz/Pagul.eot",
			'ttf' => "saz/Pagul.ttf",
			'woff' => "saz/Pagul.woff",
		),
		'AbyssinicaSIL'=> array(
			'eot' => "gez/AbyssinicaSIL-R.eot",
			'ttf' => "gez/AbyssinicaSIL-R.ttf",
			'woff' => "gez/AbyssinicaSIL-R.woff",
		),
		),

	'languages' => array(
		// 'en' => array( 'RufScript', 'Perizia', 'Ubuntu' ),
		'ml' => array( 'AnjaliOldLipi', 'Meera', 'Rachana', 'RaghuMalayalam' ),
		'or' => array( 'Lohit Oriya' ),
		'ta' => array( 'Lohit Tamil' ),
		'te' => array( 'Lohit Telugu' ),
		'bn' => array( 'Lohit Bengali' ),
		'as' => array( 'Lohit Bengali' ),
		'gu' => array( 'Samyak Gujarati' ),
		'hi' => array( 'Samyak Devanagari', 'Lohit Hindi' ),
		'mr' => array( 'Samyak Devanagari', 'Lohit Hindi' ),
		'ks' => array( 'Samyak Devanagari', 'Lohit Hindi' ),
		'he' => array( 'Miriam CLM', 'Taamey Frank CLM' ),
		'kn' => array( 'Kedage', 'Lohit Kannada' ),
		'my' => array( 'Masterpiece Uni Sans', 'Padauk-Regular', 'Myanmar3', 'Yunghkio' ),
		'km' => array( 'KhmerOSbattambang', 'KhmerOSsiemreap', 'KhmerOS', 'KhmerOSbokor', 'KhmerOSmuollight', 'KhmerOSmuol', 'KhmerOSmuolpali', 'KhmerOSfreehand', 'KhmerOSfasthand' ),
		'saz' => array( 'Pagul' ),
		'am' => array( 'AbyssinicaSIL' ),
		'ti' => array( 'AbyssinicaSIL' ),
		),
	);
