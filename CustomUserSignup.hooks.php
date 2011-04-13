<?php
/**
 * Hooks for CustomUserSignup
 *
 * @file
 * @ingroup Extensions
 */

class CustomUserSignupHooks {
	
	public static function userCreateForm(&$template){
		if(isset($_GET["campaign"])){
			$campaign = $_GET["campaign"];
			$newTemplate;
			if(get_class($template) == "UserloginTemplate"){
				$newTemplate = new CustomUserloginTemplate();
				$template->data["action"] = "{$template->data["action"]}&campaign=$campaign";
				$template->data["link"] =
					preg_replace("/type\=signup/", "campaign=$campaign&amp;type=signup", $template->data["link"]);
			}
			else if(get_class($template) == "UsercreateTemplate"){
				$newTemplate = new CustomUsercreateTemplate();
				$template->data["action"] = "{$template->data["action"]}&campaign=$campaign";
				$template->data["link"] =
					preg_replace("/type\=login\&amp;/", "type=login&amp;campaign=$campaign&amp;", $template->data["link"]);
			}
			else return true;
			
			$newTemplate->data = $template->data;
			$newTemplate->translator = $template->translator;
			$template = $newTemplate;
		}
		
		return true;	
	}
	
	public static function welcomeScreen(&$welcome_creation_msg, &$injected_html){
		if(isset($_GET["campaign"])){
			$campaign = $_GET["campaign"];
			
			if(wfMsg( "customusertemplate-$campaign-welcomecreation") != "&lt;customusertemplate-$campaign-welcomecreation&gt;"){
				$welcome_creation_msg = "customusertemplate-$campaign-welcomecreation";	
			}
		}	
		return true;
	}
	
}