<?php
/**
 * @author Siebrand Mazeland
 */

class SF_LanguageNl {

/* private */ var $sfContentMessages = array(
	'sf_createproperty_isattribute' => 'Dit is een eigenschap van het type $1.',
	'sf_createproperty_allowedvals' => 'De toegestane waarden voor deze eigenschap zijn:',
	'sf_createproperty_isrelation' => 'Dit is een relatie.',
	'sf_template_docu' => 'Dit is het sjabloon \'$1\'. Gebruik het op de volgende wijze:',
	'sf_template_docufooter' => 'Bewerk de pagina om de sjabloontekst te bekijken.',
	'sf_form_docu' => 'Dit is het formulier \'$1\'. Bewerkt het om de broncode te bekijken. U kunt [[$2|hier]] gegevens tovoegen met dit formulier.',
	'sf_form_relation' => 'Heeft standaardformulier',
	// month names are already defined in MediaWiki, but unfortunately
	// there they're defined as user messages, and here they're
	// content messages
	'sf_january' => 'januari',
	'sf_february' => 'februari',
	'sf_march' => 'maart',
	'sf_april' => 'april',
	'sf_may' => 'mei',
	'sf_june' => 'juni',
	'sf_july' => 'juli',
	'sf_august' => 'augustus',
	'sf_september' => 'aeptember',
	'sf_october' => 'oktober',
	'sf_november' => 'november',
	'sf_december' => 'december'
);

/* private */ var $sfUserMessages = array(
	'createproperty' => 'Semantische eigenschap aanmaken',
	'templates' => 'Sjablonen',
	'sf_templates_docu' => 'De onderstaande sjablonen bestaan in de wiki.',
	'sf_templates_definescat' => 'bepaalt categorie:',
	'createtemplate' => 'Maak een sjabloon',
	'sf_createtemplate_namelabel' => 'Sjabloonnaam:',
	'sf_createtemplate_categorylabel' => 'Categorie bepaald voor sjabloon (optioneel):',
	'sf_createtemplate_templatefields' => 'Sjabloonvelden',
	'sf_createtemplate_fieldsdesc' => 'Om de velden van een sjabloon geen verplichte veldnamen te laten hebben, kunt u de index van dat veld (bijvoorbeeld 1, 2, 3, enzovoort) als naam opgeven in plaats van de eigenlijke naam.',
	'sf_createtemplate_fieldname' => 'Veldnaam:',
	'sf_createtemplate_displaylabel' => 'Beschrijving:',
	'sf_createtemplate_semanticproperty' => 'Semantische eigenschap:',
	'sf_createtemplate_outputformat' => 'Uitvoerformaat:',
	'sf_createtemplate_standardformat' => 'Standaard',
	'sf_createtemplate_infoboxformat' => 'Infobox rechterkant',
	'sf_createtemplate_addfield' => 'Veld toevoegen',
	'sf_createtemplate_deletefield' => 'Verwijderen',
	'forms' => 'Formulieren',
	'sf_forms_docu' => 'De onderstaande formulieren bestaan in de wiki.',
	'createform' => 'Formulier aanmaken',
	'sf_createform_nameinput' => 'Formuliernaam (conventie om het formulier te noemen naar het hoofdsjabloon):',
	'sf_createform_template' => 'Sjabloon:',
	'sf_createform_templatelabelinput' => 'Sjabloonlabel (optioneel):',
	'sf_createform_allowmultiple' => 'Sta meerdere (of geen) instanties van dit sjabloon toe op de gemaakte pagina',
	'sf_createform_field' => 'Veld:',
	'sf_createform_fieldattr' => 'Dit beld beschijft de eigenschap $1, van type $2.',
	'sf_createform_fieldattrunknowntype' => 'Dit veld beschrijft de eigenschap $1, van een ongespecificeerd type ($2 wordt aangenomen).',
	'sf_createform_fieldrel' => 'Dit veld beschrijft de relatie $1.',
	'sf_createform_formlabel' => 'Formulierlabel:',
	'sf_createform_hidden' =>  'Verborgen',
	'sf_createform_restricted' =>  'Beperkt (kan alleen door beheerders bewerkt worden)',
	'sf_createform_mandatory' =>  'Verplicht',
	'sf_createform_removetemplate' => 'Sjabloon verwijderen',
	'sf_createform_addtemplate' => 'Sjabloon toevoegen:',
	'sf_createform_beforetemplate' => 'Voor sjabloon:',
	'sf_createform_atend' => 'Onderaan',
	'sf_createform_add' => 'Toevoegen',
	'addpage' => 'Pagina toevoegen',
	'sf_addpage_badform' => 'Fout: er is geen formulierpagina aangetroffen op $1',
	'sf_addpage_docu' => 'Voer de naam van de pagina die bewerkt wordt met het formulier \'$1\' hier in. Als deze pagina al bestaat, wordt u doorgestuurd naar het formulier om die pagina te bewerken. Anders wordt u doorgestuurd naar het formulier om de pagina toe te voegen.',
	'sf_addpage_noform_docu' => 'Voer de naam van de pagina hier in en selecteer het formulier waarmee die bewerkt wordt. Als deze pagina al bestaat, wordt u doorgestuurd naar het formulier om die pagina te bewerken. Anders wordt u doorgestuurd naar het formulier om de pagina toe te voegen.',
	'addoreditdata' => 'Toevoegen of bewerken',
	'adddata' => 'Gegevens toevoegen',
	'sf_adddata_badurl' => 'Dit is de pagina om gegevens toe te voegen. Geef zowel een formuliernaam als een doelpagina op in de URL. Het hoort eruit te zien als \'Special:AddData?form=&lt;form name&gt;&target=&lt;target page&gt;\' of  \'Special:AddData/&lt;form name&gt;/&lt;target page&gt;\'.',
	'sf_forms_adddata' => 'Gegevens toevoegen met dit formulier',
	'editdata' => 'Gegevens bewerken',
	'form_edit' => 'Bewerken met dit formulier',
	'sf_editdata_badurl' => 'Dit is de pagina om gegevens te bewerken. Geeft zowel een formuliernaam als een doelpagina op in de URL. Het hoort eruit te zien als \'Special:EditData?form=&lt;form name&gt;&target=&lt;target page&gt;\' of  \'Special:EditData/&lt;form name&gt;/&lt;target page&gt;\'.',
	'sf_editdata_remove' => 'Verwijderen',
	'sf_editdata_addanother' => 'Volgende toevoegen',
	'sf_editdata_freetextlabel' => 'Vrije tekst',

	'sf_blank_error' => 'mag niet leeg blijven'
);

	/**
	 * Function that returns the namespace identifiers.
	 */
	function getNamespaceArray() {
		return array(
			SF_NS_FORM           => 'Formulier',
			SF_NS_FORM_TALK      => 'Overleg formulier'
		);
	}

	/**
	 * Function that returns all content messages (those that are stored
	 * in some article, and can thus not be translated to individual users).
	 */
	function getContentMsgArray() {
		return $this->sfContentMessages;
	}

	/**
	 * Function that returns all user messages (those that are given only to
	 * the current user, and can thus be given in the individual user language).
	 */

	function getUserMsgArray() {
		return $this->sfUserMessages;
	}

}
