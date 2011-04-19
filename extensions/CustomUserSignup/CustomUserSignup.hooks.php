<?php
/**
 * Hooks for CustomUserSignup
 *
 * @file
 * @ingroup Extensions
 */

class CustomUserSignupHooks {

	public static function getCampaign(){
		global $wgRequest;
		$campaign = "";
		if( $wgRequest->getVal( 'campaign' ) ) {
			preg_match( '/[A-Za-z0-9]+/', $wgRequest->getVal( 'campaign' ), $matches );
			$campaign = $matches[0];
		}
		return $campaign;
	}
	
	
	public static function userCreateForm( &$template ) {
		global $wgRequest;
		$titleObj = SpecialPage::getTitleFor( 'Userlogin' );
		
		$newTemplate;
		$linkmsg;
		
		$campaign = CustomUserSignupHooks::getCampaign();
		if( $campaign != "" ) {
			if( $template instanceof UserloginTemplate ) {
				$newTemplate = new CustomUserloginTemplate();
				$linkmsg = 'nologin';
				$template->data['action'] = "{$template->data['action']}&campaign=$campaign";
				$template->data['link'] =
					preg_replace(
						'/type\=signup/',
						"campaign=$campaign&amp;type=signup",
						$template->data['link']
					);
			} elseif( $template instanceof UsercreateTemplate ) {
				$newTemplate = new CustomUsercreateTemplate();
				$linkmsg = 'gotaccount';
				$template->data['action'] = "{$template->data['action']}&campaign=$campaign";
				$template->data['link'] =
					preg_replace(
						'/type\=login\&amp;/',
						"type=login&amp;campaign=$campaign&amp;",
						$template->data['link']
					);
			} else {
				return true;
			}
			
			// replace "gotaccount" and "nologin" links
			if( $template->data['link'] != '' ) {
				
				// get the link part of the message
				$originalLinkFull = $template->data['link'];
				$originalLinkMessage = wfMsg( $linkmsg );
				
				$leftOfLink = substr($originalLinkMessage, 0, strpos($originalLinkMessage, '$1'));
				
				$linkq = substr($originalLinkFull, strlen($leftOfLink)+9 );
				$linkq = substr($linkq, 0, strpos($linkq, '">'));
				
				$link = '<a href="' . $linkq . '">';
				
				if( wfMessage( "customusertemplate-$campaign-$linkmsg".'link' )->exists() ){  
					$link .= wfMsgHtml( "customusertemplate-$campaign-$linkmsg" . 'link' );
				} else {
					$link .= wfMsgHtml( $linkmsg . 'link' );
				}
				$link .= '</a>';
				
				if( wfMessage( "customusertemplate-$campaign-$linkmsg" )->exists() ){
					$template->set( 'link', wfMsgExt( "customusertemplate-$campaign-$linkmsg", array( 'parseinline', 'replaceafter' ), $link ) );
				} else {
					$template->set( 'link', wfMsgExt( $linkmsg, array( 'parseinline', 'replaceafter' ), $link ) );
				}
				
			}
			
			$newTemplate->data = $template->data;
			$newTemplate->translator = $template->translator;
			$template = $newTemplate;
		}

		return true;
	}

	public static function welcomeScreen( &$welcomeCreationMsg, &$injected_html ) {
		global $wgRequest;
		$campaign = CustomUserSignupHooks::getCampaign();
		if( $campaign != "" ) {
			if( wfMessage( "customusertemplate-$campaign-welcomecreation" )->exists() ) {
				$welcomeCreationMsg = "customusertemplate-$campaign-welcomecreation";
			}
		}
		return true;
	}
	
		public static function beforePageDisplay( $out, $skin ) {
			$out->addModules( 'ext.UserBuckets' );
			return true;
		}
}