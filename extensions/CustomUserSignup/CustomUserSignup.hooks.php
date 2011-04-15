<?php
/**
 * Hooks for CustomUserSignup
 *
 * @file
 * @ingroup Extensions
 */

class CustomUserSignupHooks {

	public static function userCreateForm( &$template ) {
		global $wgRequest;
		$titleObj = SpecialPage::getTitleFor( 'Userlogin' );
		
		$newTemplate;
		$linkmsg;
		
		if( $wgRequest->getVal( 'campaign' ) ) {
			$campaign = $wgRequest->getVal( 'campaign' );
			if( get_class( $template ) == 'UserloginTemplate' ) {
				$newTemplate = new CustomUserloginTemplate();
				$linkmsg = 'nologin';
				$template->data['action'] = "{$template->data['action']}&campaign=$campaign";
				$template->data['link'] =
					preg_replace(
						'/type\=signup/',
						"campaign=$campaign&amp;type=signup",
						$template->data['link']
					);
			} elseif( get_class( $template ) == 'UsercreateTemplate' ) {
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
		if( $wgRequest->getVal( 'campaign' ) ) {
			$campaign = $wgRequest->getVal( 'campaign' );

			if( wfMessage( "customusertemplate-$campaign-welcomecreation" )->exists() ) {
				$welcomeCreationMsg = "customusertemplate-$campaign-welcomecreation";
			}
		}
		return true;
	}

}