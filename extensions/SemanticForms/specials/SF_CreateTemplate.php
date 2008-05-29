<?php
/**
 * A special page holding a form that allows the user to create a template
 * with semantic fields.
 *
 * @author Yaron Koren
 */

include_once $sfgIP . "/includes/SF_TemplateField.inc";

if (!defined('MEDIAWIKI')) die();

global $IP;
require_once( "$IP/includes/SpecialPage.php" );

SpecialPage::addPage( new SpecialPage('CreateTemplate','',true,'doSpecialCreateTemplate',false) );

// Custom sort function, used in both getSemanticProperties() functions
function cmp($a, $b) {
	if ($a == $b) {
		return 0;
	} elseif ($a < $b) {
		return -1;
	} else {
		return 1;
	}
}

function getSemanticProperties_0_7() {
	$dbr = wfGetDB( DB_SLAVE );
	$all_properties = array();

	$res = $dbr->query("SELECT page_title FROM " . $dbr->tableName('page') .
		" WHERE page_namespace = " . SMW_NS_ATTRIBUTE .
		" AND page_is_redirect = 0");
	while ($row = $dbr->fetchRow($res)) {
		$attribute_name = str_replace('_', ' ', $row[0]);
		$all_properties[$attribute_name . ":="] = $attribute_name;
	}
	$dbr->freeResult($res);

	$res = $dbr->query("SELECT page_title FROM " . $dbr->tableName('page') .
		" WHERE page_namespace = " . SMW_NS_RELATION .
		" AND page_is_redirect = 0");
	while ($row = $dbr->fetchRow($res)) {
		$relation_name = str_replace('_', ' ', $row[0]);
		$all_properties[$relation_name . "::"] = $relation_name;
	}
	$dbr->freeResult($res);

	// sort properties list alphabetically - custom sort function is needed
	// because the regular sort function destroys the "keys" of the array
	uasort($all_properties, "cmp");
	return $all_properties;
}

function getSemanticProperties_1_0() {
	$all_properties = array();

	// set limit on results - a temporary fix until SMW's getProperties()
	// functions stop requiring a limit
	global $smwgIP;
	include_once($smwgIP . '/includes/storage/SMW_Store.php');
	$options = new SMWRequestOptions();
	$options->limit = 10000;
	$used_properties = smwfGetStore()->getPropertiesSpecial($options);
	foreach ($used_properties as $property) {
	$property_name = $property[0]->getText();
		$all_properties[$property_name . "::"] = $property_name;
	}
	$unused_properties = smwfGetStore()->getUnusedPropertiesSpecial($options);
	foreach ($unused_properties as $property) {
		$property_name = $property->getText();
		$all_properties[$property_name . "::"] = $property_name;
	}

	// sort properties list alphabetically - custom sort function is needed
	// because the regular sort function destroys the "keys" of the array
	uasort($all_properties, "cmp");
	return $all_properties;
}

function printPropertiesDropdown($all_properties, $id, $property) {
	$dropdown_str = "<select name=\"semantic_field_call_$id\">\n";
	$dropdown_str .= "<option value=\"\"></option>\n";
	foreach ($all_properties as $prop_id => $prop_name) {
		$selected = ($property == $prop_id) ? "selected" : "";
		$dropdown_str .= "<option value=\"$prop_id\" $selected>$prop_name</option>\n";
	}
	$dropdown_str .= "</select>\n";
	return $dropdown_str;
}

function printFieldEntryBox($id, $f, $all_properties) {
	$dropdown_html = printPropertiesDropdown($all_properties, $id, $f->semantic_field_call);
	$text = '	<div class="fieldBox">' . "\n";
	$text .= '	<p>' . wfMsg('sf_createtemplate_fieldname') . ' <input size="15" name="name_' . $id . '" value="' . $f->field_name . '">' . "\n";
	$text .= '	' . wfMsg('sf_createtemplate_displaylabel') . ' <input size="15" name="label_' . $id . '" value="' . $f->label . '">' . "\n";
	$text .= '	' . wfMsg('sf_createtemplate_semanticproperty') . ' ' . $dropdown_html . "</p>\n";
	$checked_str = ($f->is_list) ? " checked" : "";
	$text .= '	<p><input type="checkbox" name="is_list_' . $id . '"' .  $checked_str . '> ' . wfMsg('sf_createtemplate_fieldislist') . "\n";

	if ($id != "new") {
		$text .= '	&nbsp;&nbsp;<input name="del_' . $id . '" type="submit" value="' . wfMsg('sf_createtemplate_deletefield') . '">' . "\n";
	}
	$text .= <<<END
</p>
</div>

END;
	return $text;
}

function doSpecialCreateTemplate() {
  global $wgOut, $wgRequest, $wgUser, $sfgScriptPath, $wgContLang;

  $smw_version = SMW_VERSION;
  if ($smw_version{0} == '0') {
    $all_properties = getSemanticProperties_0_7();
  } else {
    $all_properties = getSemanticProperties_1_0();
  }

  $template_name = $wgRequest->getVal('template_name');
  $template_name_error_str = "";
  $category = $wgRequest->getVal('category');
  $cur_id = 1;
  $fields = array();
  # cycle through the query values, setting the appropriate local variables
  foreach ($wgRequest->getValues() as $var => $val) {
    $var_elements = explode("_", $var);
    // we only care about query variables of the form "a_b"
    if (count($var_elements) != 2)
      continue;
    list ($field_field, $old_id) = $var_elements;
    if ($field_field == "name") {
      if ($old_id != "new" || ($old_id == "new" && $val != "")) {
        if ($wgRequest->getVal('del_' . $old_id) != '') {
          # do nothing - this field won't get added to the new list
        } else {
          $field = SFTemplateField::newWithValues($val, $wgRequest->getVal('label_' . $old_id));
          $field->semantic_field_call = $wgRequest->getVal('semantic_field_call_' . $old_id);
          $field->is_list = $wgRequest->getCheck('is_list_' . $old_id);
          $fields[] = $field;
        }
      }
    }
  }
  $aggregating_property = $wgRequest->getVal('semantic_field_call_aggregation');
  $aggregation_label = $wgRequest->getVal('aggregation_label');
  $template_format = $wgRequest->getVal('template_format');

  $text = "";
  $save_button_text = wfMsg('savearticle');
  $preview_button_text = wfMsg('preview');
  $save_page = $wgRequest->getCheck('wpSave');
  $preview_page = $wgRequest->getCheck('wpPreview');
  if ($save_page || $preview_page) {
    # validate template name
    if ($template_name == '') {
      $template_name_error_str = wfMsg('sf_blank_error');
    } else {
      # redirect to wiki interface
      $title = Title::newFromText($template_name, NS_TEMPLATE);
      $full_text = createTemplateText($template_name, $fields, $category, $aggregating_property, $aggregation_label, $template_format);
      // HTML-encode
      $full_text = str_replace('"', '&quot;', $full_text);
      $text .= sffPrintRedirectForm($title, $full_text, "", $save_page, $preview_page, false, false, false, null, null);
    }
  }

  $text .= '	<form action="" method="post">' . "\n";
  // set 'title' field, in case there's no URL niceness
  $mw_namespace_labels = $wgContLang->getNamespaces();
  $special_namespace = $mw_namespace_labels[NS_SPECIAL];
  $text .= '    <input type="hidden" name="title" value="' . $special_namespace . ':CreateTemplate">' . "\n";
  $text .= '	<p>' . wfMsg('sf_createtemplate_namelabel') . ' <input size="25" name="template_name" value="' . $template_name . '"> <font color="red">' . $template_name_error_str . '</font></p>' . "\n";
  $text .= '	<p>' . wfMsg('sf_createtemplate_categorylabel') . ' <input size="25" name="category" value="' . $category . '"></p>' . "\n";
  $text .= "	<fieldset>\n";
  $text .= '	<legend>' . wfMsg('sf_createtemplate_templatefields') . "</legend>\n";
  $text .= '	<p>' . wfMsg('sf_createtemplate_fieldsdesc') . "</p>\n";

  foreach ($fields as $i => $field) {
    $text .= printFieldEntryBox($i + 1, $field, $all_properties);
  }
  $new_field = new SFTemplateField();
  $text .= printFieldEntryBox("new", $new_field, $all_properties);

  $text .= '	<p><input type="submit" value="' . wfMsg('sf_createtemplate_addfield') . '"></p>' . "\n";
  $text .= "	</fieldset>\n";
  $text .= "	<fieldset>\n";
  $text .= '	<legend>' . wfMsg('sf_createtemplate_aggregation') . "</legend>\n";
  $text .= '	<p>' . wfMsg('sf_createtemplate_aggregationdesc') . "</p>\n";
  $text .= '	<p>' . wfMsg('sf_createtemplate_semanticproperty') . " " . printPropertiesDropdown($all_properties, "aggregation", $aggregating_property). "</p>\n";
  $text .= '	<p>' . wfMsg('sf_createtemplate_aggregationlabel') . ' <input size="25" name="aggregation_label" value="' . $aggregation_label . '"></p>' . "\n";
  $text .= "	</fieldset>\n";
  $text .= '	<p>' . wfMsg('sf_createtemplate_outputformat') . "\n";
  $text .= '	<input type="radio" name="template_format" checked value="standard">' . wfMsg('sf_createtemplate_standardformat') . "\n";
  $text .= '	<input type="radio" name="template_format" value="infobox">' . wfMsg('sf_createtemplate_infoboxformat') . "</p>\n";
  $text .=<<<END
	<div class="editButtons">
	<input type="submit" id="wpSave" name="wpSave" value="$save_button_text">
	<input type="submit" id="wpPreview" name="wpPreview" value="$preview_button_text">
	</div>
	</form>

END;
  $sk = $wgUser->getSkin();
  $cp = SpecialPage::getPage('CreateProperty');
  $create_property_link = $sk->makeKnownLinkObj($cp->getTitle(), $cp->getDescription());
  $text .= "	<br /><hr /><br />\n";
  $text .= "	<p>$create_property_link.</p>\n";

  $wgOut->addLink( array(
    'rel' => 'stylesheet',
    'type' => 'text/css',
    'media' => "screen, projection",
    'href' => $sfgScriptPath . "/skins/SF_main.css"
  ));
  $wgOut->addHTML($text);
}
