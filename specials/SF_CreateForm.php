<?php
/**
 * A special page holding a form that allows the user to create a data-entry
 * form.
 *
 * @author Yaron Koren
 */

if (!defined('MEDIAWIKI')) die();

global $IP, $sfgIP;
require_once( "$IP/includes/SpecialPage.php" );
require_once( "$sfgIP/includes/SF_FormClasses.inc" );

SpecialPage::addPage( new SpecialPage('CreateForm','',true,'doSpecialCreateForm',false) );

function doSpecialCreateForm() {
  global $wgOut, $wgRequest, $wgUser, $sfgScriptPath, $wgContLang;
  $db = wfGetDB( DB_SLAVE );

  # get the names of all templates on this site
  $all_templates = array();
  $sql = "SELECT page_title FROM {$db->tableName( 'page' )} WHERE page_namespace=" . NS_TEMPLATE . " ORDER BY page_title";
  $res = $db->query( $sql );
  if ($db->numRows( $res ) > 0) {
    while ($row = $db->fetchRow($res)) {
      $template_name = str_replace('_', ' ', $row[0]);
      $all_templates[] = $template_name;
    }
  }

  $form_templates = array();
  $i = 1;
  $deleted_template_loc = null;

  # handle inputs
  $form_name = $wgRequest->getVal('form_name');
  foreach ($wgRequest->getValues() as $var => $val) {
    # ignore variables that are not of the right form
    if (strpos($var, "_") != false) {
      # get the template declarations and work from there
      list ($action, $id) = explode("_", $var, 2);
      if ($action == "template") {
        # if the button was pressed to remove this template, just don't
        # add it to the array
        if ($wgRequest->getVal("del_$id") != "Remove template") {
          $form_template = SFTemplateInForm::create($val,
            $wgRequest->getVal("label_$id"),
            $wgRequest->getVal("allow_multiple_$id"));
          $form_templates[] = $form_template;
        } else {
          $deleted_template_loc = $id;
        }
      }
    }
  }
  if ($wgRequest->getVal('add_field') == wfMsg('sf_createform_add')) {
    $form_template = SFTemplateInForm::create($wgRequest->getVal('new_template'), "", false);
    $new_template_loc = $wgRequest->getVal('before_template');
    # hack - array_splice() doesn't work for objects, so we have to
    # first insert a stub element into the array, then replace that with
    # the actual object
    array_splice($form_templates, $new_template_loc, 0, "stub");
    $form_templates[$new_template_loc] = $form_template;
  } else {
    $new_template_loc = null;
  }

  # now cycle through the templates and fields, modifying each one
  # per the query variables
  foreach ($form_templates as $i => $ft) {
    foreach ($ft->fields as $j => $field) {
      // handle the change in indexing if a new template was inserted
      // before the end, or one was deleted
      $old_i = $i;
      if ($new_template_loc != null) {
        if ($i > $new_template_loc) {
          $old_i = $i - 1;
        } elseif ($i == $new_template_loc) {
          // it's the new template; it shouldn't get any query string data
          $old_i = -1;
        }
      } elseif ($deleted_template_loc != null) {
        if ($i >= $deleted_template_loc) {
          $old_i = $i + 1;
        }
      }
      $new_label = $wgRequest->getVal("label_" . $old_i . "_" . $j);
      if ($new_label)
        $field->template_field->label = $new_label;
      if ($wgRequest->getVal("hidden_" . $old_i . "_" . $j) == "hidden") {
        $field->is_hidden = true;
      }
      if ($wgRequest->getVal("restricted_" . $old_i . "_" . $j) == "restricted") {
        $field->is_restricted = true;
      }
      if ($wgRequest->getVal("mandatory_" . $old_i . "_" . $j) == "mandatory") {
        $field->is_mandatory = true;
      }
    }
  }
  $form = SFForm::create($form_name, $form_templates);
  $text = "";

  # if submit button was pressed, create the form definitions file, then redirect
  if ($wgRequest->getVal('preview') == wfMsg('preview')) {
    # validate form name
    if ($form->form_name == "") {
      $form_name_error_str = wfMsg('sf_blank_error');
    } else {
      $title = Title::newFromText($form->form_name, SF_NS_FORM);
      $submit_url = $title->getLocalURL('action=submit');
      $full_text = str_replace('"', '&quot;', $form->createMarkup());
      # redirect to wiki interface
      $text .= <<<END
  <form id="editform" name="editform" method="post" action="$submit_url">
    <input type="hidden" name="wpTextbox1" id="wpTextbox1" value="$full_text" />
  </form>
      <script type="text/javascript">
      document.editform.submit();
      </script>

END;
      $wgOut->addHTML($text);
      return;
    }
  }

  $text .= '	<form action="" method="get">' . "\n";
  // set 'title' field, in case there's no URL niceness
  $mw_namespace_labels = $wgContLang->getNamespaces();
  $special_namespace = $mw_namespace_labels[NS_SPECIAL];
  $text .= '    <input type="hidden" name="title" value="' . $special_namespace . ':CreateForm">' . "\n";
  $text .= '	<p>' . wfMsg('sf_createform_nameinput') . ' <input size=25 name="form_name" value="' . $form_name . '">';
  if (! empty($form_name_error_str))
    $text .= ' <font color="red">' . $form_name_error_str . '</font>';
  $text .= "</p>\n";

  $text .= $form->creationHTML();

  $text .= '	<p>' . wfMsg('sf_createform_addtemplate') . "\n";
  $text .= '	<select name="new_template">' . "\n";

  foreach ($all_templates as $template) {
    $text .= "	<option value=\"$template\">$template</option>\n";
  }

  $text .= "	</select>\n";
  $text .= '	' . wfMsg('sf_createform_beforetemplate') . "\n";
  $text .= '	<select name="before_template">' . "\n";

  foreach ($form_templates as $i => $ft) {
    $text .= "	<option value=\"$i\">{$ft->template_name}</option>\n";
  }

  $final_index = count($form_templates);
  $preview_button_text = wfMsg('preview');
  $add_button_text = wfMsg('sf_createform_add');
  $sk = $wgUser->getSkin();
  $ct = SpecialPage::getPage('CreateTemplate');
  $create_template_link = $sk->makeKnownLinkObj($ct->getTitle(), $ct->getDescription());
  $text .= '	<option value="' . $final_index . '" selected="selected">' .
    wfMsg('sf_createform_atend') . "</option>\n";
  $text .=<<<END
	</select>
	<input type="submit" name="add_field" value="$add_button_text">
	</p>
	<p><input type="submit" name="preview" value="$preview_button_text"></p>
	</form>
	<br /><hr /<br />
	<p>$create_template_link.</p>

END;


  $wgOut->addLink( array(
    'rel' => 'stylesheet',
    'type' => 'text/css',
    'media' => "screen, projection",
    'href' => $sfgScriptPath . "/skins/SF_main.css"
  ));
  $wgOut->addHTML($text);
}
