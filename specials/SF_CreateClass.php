<?php
/**
 * A special page holding a form that allows the user to create a semantic
 * property.
 *
 * @author Yaron Koren
 */

if (!defined('MEDIAWIKI')) die();

class SFCreateClass extends SpecialPage {

	/**
	 * Constructor
	 */
	function SFCreateClass() {
		SpecialPage::SpecialPage('CreateClass');
		wfLoadExtensionMessages('SemanticForms');
	}

	function execute($query) {
		$this->setHeaders();
		doSpecialCreateClass();
	}
}

function doSpecialCreateClass() {
	global $wgOut, $wgRequest, $wgUser, $sfgScriptPath;
	global $wgLang, $smwgContLang;

	wfLoadExtensionMessages('SemanticForms');

	$create_button_text = wfMsg('create');

	$property_name_error_str = '';
	$save_page = $wgRequest->getCheck('wpSave');
	if ($save_page) {
		$template_name = $wgRequest->getVal("template_name");
		$form_name = $wgRequest->getVal("form_name");
		$category_name = $wgRequest->getVal("category_name");
		if ($template_name == '' | $form_name == '' || $category_name == '') {
			$text = "<p>" . wfMsg('sf_createclass_missingvalues') . "</p>";
			$wgOut->addHTML($text);
			return;
		}
		$fields = array();
		$jobs = array();
		for ($i = 1; $i <= 20; $i++) {
			# cycle through the query values, setting the appropriate local variables
			$property_name = $wgRequest->getVal("property_name_$i");
			if ($property_name != '') {
				$field_name = $property_name;
				$property_type = $wgRequest->getVal("property_type_$i");
				$allowed_values = $wgRequest->getVal("allowed_values_$i");
				$is_list = $wgRequest->getCheck("is_list_$i");
				$field = SFTemplateField::create($field_name, $field_name);
				$field->semantic_property = $property_name;
				$field->is_list = $is_list;
				$fields[] = $field;

				$full_text = SFCreateProperty::createPropertyText($property_type, '', $allowed_values);
				$property_title = Title::makeTitleSafe(SMW_NS_PROPERTY, $property_name);
				$params = array();
				$params['user_id'] = $wgUser->getId();
				$params['page_text'] = $full_text;
				$jobs[] = new SFCreatePageJob( $property_title, $params );
			}
		}

		$full_text = SFTemplateField::createTemplateText($template_name, $fields, $category_name, '', '', '');
		$template_title = Title::makeTitleSafe(NS_TEMPLATE, $template_name);
                $template_article = new Article($template_title);
                $edit_summary = '';
                $template_article->doEdit($full_text, $edit_summary);

		$form_template = SFTemplateInForm::create($template_name, '', false);
		$form_templates = array($form_template);
		$form = SFForm::create($form_name, $form_templates);
		$full_text = $form->createMarkup();
		$form_title = Title::makeTitleSafe(SF_NS_FORM, $form_name);
		$params = array();
		$params['user_id'] = $wgUser->getId();
		$params['page_text'] = $full_text;
		$jobs[] = new SFCreatePageJob( $form_title, $params );

		$full_text = SFCreateCategory::createCategoryText($form_name, $category_name, '');
		$category_title = Title::makeTitleSafe(NS_CATEGORY, $category_name);
		$params = array();
		$params['user_id'] = $wgUser->getId();
		$params['page_text'] = $full_text;
		$jobs[] = new SFCreatePageJob( $category_title, $params );
		Job::batchInsert( $jobs );

		$text = "<p>" . wfMsg('sf_createclass_success') . "</p>";
		$wgOut->addHTML($text);
		return;
	}

	$datatype_labels = $smwgContLang->getDatatypeLabels();

	// set 'title' as hidden field, in case there's no URL niceness
	global $wgContLang;
	$mw_namespace_labels = $wgContLang->getNamespaces();
	$special_namespace = $mw_namespace_labels[NS_SPECIAL];

	// make links to all the other 'Create...' pages, in order to link to
	// them at the top of the page
	$sk = $wgUser->getSkin();
	$creation_links = array();
	$cp = SpecialPage::getPage('CreateProperty');
	$creation_links[] = $sk->makeKnownLinkObj($cp->getTitle(), $cp->getDescription());
	$ct = SpecialPage::getPage('CreateTemplate');
	$creation_links[] = $sk->makeKnownLinkObj($ct->getTitle(), $ct->getDescription());
	$cf = SpecialPage::getPage('CreateForm');
	$creation_links[] = $sk->makeKnownLinkObj($cf->getTitle(), $cf->getDescription());
	$cc = SpecialPage::getPage('CreateCategory');
	$creation_links[] = $sk->makeKnownLinkObj($cc->getTitle(), $cc->getDescription());
	$create_class_docu = wfMsg('sf_createclass_docu', $wgLang->listToText($creation_links));
	$leave_field_blank = wfMsg('sf_createclass_leavefieldblank');
	$form_name_label = wfMsg('sf_createform_nameinput');
	$template_name_label = wfMsg('sf_createtemplate_namelabel');
	$category_name_label = wfMsg('sf_createcategory_name');
	$property_name_label = wfMsg('sf_createproperty_propname');
	$field_name_label = wfMsg('sf_createtemplate_fieldname');
	$type_label = wfMsg('sf_createproperty_proptype');
	$allowed_values_label = wfMsg('sf_createclass_allowedvalues') . wfMsg('colon-separator');
	$list_of_values_label = wfMsg('sf_createclass_listofvalues') . '?';
	$text =<<<END
	<form action="" method="post">
	<p>$create_class_docu</p>
	<p>$leave_field_blank</p>
	<p>$template_name_label <input type="text" size="30" name="template_name"></p>
	<p>$form_name_label: <input type="text" size="30" name="form_name"></p>
	<p>$category_name_label <input type="text" size="30" name="category_name"></p>
	<table>
	<tr>
	<th>$property_name_label</th>
	<th>$field_name_label</th>
	<th>$type_label</th>
	<th>$allowed_values_label</th>
	<th>$list_of_values_label</th>
	</tr>

END;
	for ($i = 1; $i <= 20; $i++) {
		$text .=<<<END
	<tr>
	<td>$i. <input type="text" size="25" name="property_name_$i" /></td>
	<td><input type="text" size="25" name="field_name_$i" /></td>
	<td>
	<select id="property_dropdown_$i" name="property_type_$i">

END;
		foreach ($datatype_labels as $label) {
			$text .= "	<option>$label</option>\n";
		}
		$text .=<<<END
	</td>
	<td><input type="text" size="25" name="allowed_values_$i" /></td>
	<td><input type="checkbox" name="is_list_$i" /></td>

END;
	}
	$text .=<<<END
	</tr>
	</table>
	<br />
	<input type="hidden" name="title" value="$special_namespace:CreateClass">
	<div class="editButtons">
	<input id="wpSave" type="submit" name="wpSave" value="$create_button_text">
	</div>
	</form>

END;
	$wgOut->addLink( array(
		'rel' => 'stylesheet',
		'type' => 'text/css',
		'media' => "screen, projection",
		'href' => $sfgScriptPath . "/skins/SF_main.css"
	));
	$wgOut->addHTML($text);
}
