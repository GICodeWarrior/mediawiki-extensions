/**
 * Configuration file for webfonts
 * First font is the default font for the language
 */

( function ( $ ) {

	config = {
		fonts: {
			RufScript: {
				eot: "Latn/Rufscript.eot",
				ttf: "Latn/Rufscript.ttf",
				woff: "Latn/Rufscript.woff"
			},

			Perizia: {
				eot: "Latn/Perizia.eot",
				ttf: "Latn/Perizia.ttf",
				woff: "Latn/Perizia.woff"
			},

			Ubuntu: {
				eot: "Latn/ubuntu-r-webfont.eot",
				ttf: "Latn/ubuntu-r.ttf",
				woff: "Latn/ubuntu-r-webfont.woff",
				svg: "Latn/ubuntu-r-webfont.svg"
			},

			AnjaliOldLipi: {
				eot: "Mlym/AnjaliOldLipi.eot",
				ttf: "Mlym/AnjaliOldLipi.ttf",
				woff: "Mlym/AnjaliOldLipi.woff"
			},

			Meera: {
				eot: "Mlym/Meera.eot",
				ttf: "Mlym/Meera.ttf",
				woff: "Mlym/Meera.woff",
				normalization: {
					"ൾ": "ള്‍",
					"ൻ": "ന്‍",
					"ർ": "ര്‍",
					"ൺ ": "ണ്‍",
					"ൽ": "ല്‍",
					"ൿ": "ക്‍ ",
					"ൻ‍റ": "ന്റ",
					"ന്‍റെ": "ന്റെ"
				}
			},

			Rachana: {
				eot: "Mlym/Rachana.eot",
				ttf: "Mlym/Rachana.ttf",
				woff: "Mlym/Rachana.woff",
				normalization: {
					"ൾ": "ള്‍",
					"ൻ": "ന്‍",
					"ർ": "ര്‍",
					"ൺ ": "ണ്‍",
					"ൽ": "ല്‍",
					"ൿ": "ക്‍ ",
					"ൻ‍റ": "ന്റ",
					"ന്‍റെ": "ന്റെ"
				}
			},

			RaghuMalayalam: {
				eot: "Mlym/RaghuMalayalam.eot",
				ttf: "Mlym/RaghuMalayalam.ttf",
				woff: "Mlym/RaghuMalayalam.woff",
				normalization: {
					"ൾ": "ള്‍",
					"ൻ": "ന്‍",
					"ർ": "ര്‍",
					"ൺ ": "ണ്‍",
					"ൽ": "ല്‍",
					"ൿ": "ക്‍ ",
					"ൻ‍റ": "ന്റ",
					"ന്‍റെ": "ന്റെ"
				}
			},

			"Lohit Oriya": {
				eot: "Orya/Lohit-Oriya.eot",
				ttf: "Orya/Lohit-Oriya.ttf",
				woff: "Orya/Lohit-Oriya.woff"
			},

			"Utkal": {
				eot: "Orya/utkal.eot",
				ttf: "Orya/utkal.ttf",
				woff: "Orya/utkal.woff"
			},

			"Lohit Tamil": {
				eot: "Taml/Lohit-Tamil.eot",
				ttf: "Taml/Lohit-Tamil.ttf",
				woff: "Taml/Lohit-Tamil.woff"
			},
			
			"Lohit Telugu": {
				eot: "Telu/LohitTelugu.eot",
				ttf: "Telu/LohitTelugu.ttf",
				woff: "Telu/LohitTelugu.woff"
			},
			
			"Lohit Bengali": {
				eot: "Beng/LohitBengali.eot",
				ttf: "Beng/LohitBengali.ttf",
				woff: "Beng/LohitBengali.woff"
			},
			
			"Samyak Gujarati": {
				eot: "Gujr/SamyakGujarati.eot",
				ttf: "Gujr/SamyakGujarati.ttf",
				woff: "Gujr/SamyakGujarati.woff"
			},
			
			"Lohit Hindi": {
				eot: "Deva/LohitHindi.eot",
				ttf: "Deva/LohitHindi.ttf",
				woff: "Deva/LohitHindi.woff"
			},

			"Samyak Devanagari": {
				eot: "Deva/SamyakDevanagari.eot",
				ttf: "Deva/SamyakDevanagari.ttf",
				woff: "Deva/SamyakDevanagari.woff"
			},
			
			"Miriam CLM": {
				eot: "Hebr/MiriamCLM-Book.eot",
				ttf: "Hebr/MiriamCLM-Book.ttf",
				woff: "Hebr/MiriamCLM-Book.woff"
			},

			"Taamey Frank CLM": {
				eot: "Hebr/TaameyFrankCLM.eot",
				ttf: "Hebr/TaameyFrankCLM.ttf",
				woff: "Hebr/TaameyFrankCLM.woff",
				svg: "Hebr/TaameyFrankCLM.svg"
			},
			
			Kedage: {
				eot: "Knda/Kedage.eot",
				ttf: "Knda/Kedage.ttf",
				woff: "Knda/Kedage.woff"
			},

			"Lohit Kannada": {
				eot: "Knda/LohitKannada.eot",
				ttf: "Knda/LohitKannada.ttf",
				woff: "Knda/LohitKannada.woff"
			},
			
			"Masterpiece Uni Sans": {
				eot: "Mymr/MasterpieceUniSans.eot",
				ttf: "Mymr/MasterpieceUniSans.ttf",
				woff: "Mymr/MasterpieceUniSans.woff",
				svg:  "Mymr/MasterpieceUniSans.svg"
			},

			"Padauk-Regular": {
				eot: "Mymr/Padauk-Regular.eot",
				ttf: "Mymr/Padauk-Regular.ttf",
				woff: "Mymr/Padauk-Regular.woff",
				svg:  "Mymr/Padauk-Regular.svg"
			},

			Myanmar3: {
				eot: "Mymr/Myanmar3.eot",
				ttf: "Mymr/Myanmar3.ttf",
				woff: "Mymr/Myanmar3.woff",
				svg:  "Mymr/Myanmar3.svg"
			},

			Yunghkio: {
				eot: "Mymr/Yunghkio.eot",
				ttf: "Mymr/Yunghkio.ttf",
				woff: "Mymr/Yunghkio.woff",
				svg:  "Mymr/Yunghkio.svg"
			},
			
			KhmerOSbattambang: {
				eot: "Khmr/KhmerOSbattambang.eot",
				ttf: "Khmr/KhmerOSbattambang.ttf",
				woff: "Khmr/KhmerOSbattambang.woff",
				svg:  "Khmr/KhmerOSbattambang.svg"
			},

			KhmerOSbokor: {
				eot: "Khmr/KhmerOSbokor.eot",
				ttf: "Khmr/KhmerOSbokor.ttf",
				woff: "Khmr/KhmerOSbokor.woff",
				svg:  "Khmr/KhmerOSbokor.svg"
			},

			KhmerOS: {
				eot: "Khmr/KhmerOS.eot",
				ttf: "Khmr/KhmerOS.ttf",
				woff: "Khmr/KhmerOS.woff",
				svg:  "Khmr/KhmerOS.svg"
			},

			KhmerOSsiemreap: {
				eot: "Khmr/KhmerOSsiemreap.eot",
				ttf: "Khmr/KhmerOSsiemreap.ttf",
				woff: "Khmr/KhmerOSsiemreap.woff",
				svg:  "Khmr/KhmerOSsiemreap.svg"
			},

			KhmerOSmuollight: {
				eot: "Khmr/KhmerOSmuollight.eot",
				ttf: "Khmr/KhmerOSmuollight.ttf",
				woff: "Khmr/KhmerOSmuollight.woff",
				svg:  "Khmr/KhmerOSmuollight.svg"
			},

			KhmerOSmuol: {
				eot: "Khmr/KhmerOSmuol.eot",
				ttf: "Khmr/KhmerOSmuol.ttf",
				woff: "Khmr/KhmerOSmuol.woff",
				svg:  "Khmr/KhmerOSmuol.svg"
			},

			KhmerOSmuolpali: {
				eot: "Khmr/KhmerOSmuolpali.eot",
				ttf: "Khmr/KhmerOSmuolpali.ttf",
				woff: "Khmr/KhmerOSmuolpali.woff",
				svg:  "Khmr/KhmerOSmuolpali.svg"
			},

			KhmerOSfreehand: {
				eot: "Khmr/KhmerOSfreehand.eot",
				ttf: "Khmr/KhmerOSfreehand.ttf",
				woff: "Khmr/KhmerOSfreehand.woff",
				svg:  "Khmr/KhmerOSfreehand.svg"
			},

			KhmerOSfasthand: {
				eot: "Khmr/KhmerOSfasthand.eot",
				ttf: "Khmr/KhmerOSfasthand.ttf",
				woff: "Khmr/KhmerOSfasthand.woff",
				svg:  "Khmr/KhmerOSfasthand.svg"
			},
			
			Pagul: {
				eot: "Saur/Pagul.eot",
				ttf: "Saur/Pagul.ttf",
				woff: "Saur/Pagul.woff"
			},

			AbyssinicaSIL: {
				eot: "Ethi/AbyssinicaSIL-R.eot",
				ttf: "Ethi/AbyssinicaSIL-R.ttf",
				woff: "Ethi/AbyssinicaSIL-R.woff"
			},

			"Iranian Sans": {
				eot: "Arab/IranianSans.eot",
				ttf: "Arab/IranianSans.ttf",
				woff: "Arab/IranianSans.woff"
			},

			"Charis SIL": {
				eot: "Latn/CharisSIL-R.eot",
				ttf: "Latn/CharisSIL-R.ttf",
				woff: "Latn/CharisSIL-R.woff"
			},

			"Thendral":  {
				eot: "Taml/ThendralUni.eot",
				ttf: "Taml/ThendralUni.ttf",
				woff: "Taml/ThendralUni.woff"
			},

			"Thenee":  {
				eot: "Taml/TheneeUni.eot",
				ttf: "Taml/TheneeUni.ttf",
				woff: "Taml/TheneeUni.woff"
			},

			"Vaigai":  {
				eot: "Taml/VaigaiUni.eot",
				ttf: "Taml/VaigaiUni.ttf",
				woff: "Taml/VaigaiUni.woff"
			}
		},

		languages: {
			// en: [ "RufScript", "Perizia", "Ubuntu" ],
			ml:  [ "AnjaliOldLipi", "Meera", "Rachana", "RaghuMalayalam" ],
			or:  [ "Lohit Oriya" , "Utkal" ],
			ta:  [ "Lohit Tamil", "Thendral", "Thenee", "Vaigai" ],
			te:  [ "Lohit Telugu" ],
			bn:  [ "Lohit Bengali" ],
			as:  [ "Lohit Bengali" ],
			bpy: [ "Lohit Bengali" ],
			gu:  [ "Samyak Gujarati" ],
			hi:  [ "Samyak Devanagari", "Lohit Hindi" ],
			mr:  [ "Samyak Devanagari", "Lohit Hindi" ],
			ks:  [ "Samyak Devanagari", "Lohit Hindi" ],
			sa:  [ "Lohit Hindi", "Samyak Devanagari" ],
			he:  [ "Miriam CLM", "Taamey Frank CLM" ],
			hbo: [ "Taamey Frank CLM" ],
			kn:  [ "Kedage", "Lohit Kannada" ],
			my:  [ "Masterpiece Uni Sans", "Padauk-Regular", "Myanmar3", "Yunghkio" ],
			km:  [ "KhmerOSbattambang", "KhmerOSsiemreap", "KhmerOS", "KhmerOSbokor",
			       "KhmerOSmuollight", "KhmerOSmuol", "KhmerOSmuolpali",
			       "KhmerOSfreehand", "KhmerOSfasthand" ],
			saz: [ "Pagul" ],
			am:  [ "AbyssinicaSIL" ],
			ti:  [ "AbyssinicaSIL" ],
			fa:  [ "Iranian Sans" ],
			cdo: [ "Charis SIL" ]
		}
	};
	$.extend( mw.webfonts.config, config);
} ) ( jQuery );
