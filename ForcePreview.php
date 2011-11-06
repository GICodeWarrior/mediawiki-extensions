<?php
/**
 * ForcePreview extension -- forces unprivileged users to preview before saving
 *
 * @file
 * @ingroup Extensions
 * @author Ryan Schmidt
 * @version 1.2
 * @license http://en.wikipedia.org/wiki/Public_domain Public domain
 * @link http://www.mediawiki.org/wiki/Extension:ForcePreview Documentation
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and is not a valid access point" );
	die( 1 );
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Force Preview',
	'version' => '1.2',
	'author' => 'Ryan Schmidt',
	'descriptionmsg' => 'forcepreview-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ForcePreview',
);

// i18n file
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['ForcePreview'] = $dir . 'ForcePreview.i18n.php';

// New user right, allows users to bypass the requirement of previewing before
// saving the page
$wgAvailableRights[] = 'forcepreviewexempt';

$wgHooks['EditPageBeforeEditButtons'][] = 'efForcePreview';
$wgHooks['BeforePageDisplay'][] = 'efForcePreviewLivePreview';

//for GroupPermissions manager extension sorting
$wgGPManagerSort['edit'][] = 'forcepreviewexempt';

function efForcePreview( &$editpage, &$buttons ) {
	global $wgUser;
	if(
		!$wgUser->isAllowed( 'forcepreviewexempt' ) &&
		!$editpage->preview && empty( $editpage->save )
	)
	{
		$buttons['save'] = str_replace(
			'/>', 'disabled="disabled" />', $buttons['save']
		);
		$buttons['save'] = preg_replace(
			'/value="' . wfMsg( 'savearticle' ) . '"/i',
			'value="' . wfMsg( 'forcepreview' ) . '"',
			$buttons['save']
		);
		if( $buttons['live'] !== '' ) {
			$buttons['preview'] = preg_replace(
				'/style="(.*?);?"/',
				'style="$1; font-weight: bold;"',
				$buttons['preview']
			); # in case something else made it visible
			$buttons['live']  = str_replace(
				'/>',
				'style="font-weight: bold" />',
				$buttons['live']
			);
		} else {
			$buttons['preview'] = str_replace(
				'/>',
				'style="font-weight: bold" />',
				$buttons['preview']
			);
		}
	}
	return true;
}

function efForcePreviewLivePreview( &$out, $sk = null ) {
	global $wgUser, $wgRequest, $wgLivePreview, $wgTitle;
	if( !$wgLivePreview || !$wgTitle->userCan( 'edit' ) ) {
		return true;
	}
	if(
		$wgUser->isAllowed( 'forcepreviewexempt' ) ||
		!$wgUser->getBoolOption( 'uselivepreview' )
	)
	{
		return true;
	}
	if(
		!$wgRequest->getVal( 'action' ) == 'edit' ||
		!$wgRequest->getVal( 'action' ) == 'submit'
	)
	{
		return true;
	}
	$out->addHTML(
		"<script type=\"text/javascript\">
		var liveButton = document.getElementById( 'wpLivePreview' );
		var msg = \"" . wfMsg( 'savearticle' ) . "\";
		function enableSave() {
			if( !liveButton ) {
				return;
			}
			liveButton.style.fontWeight = 'normal';
			var previewButton = document.getElementById( 'wpPreview' );
			if( previewButton ) {
				previewButton.style.fontWeight = 'normal';
			}
			var saveButton = document.getElementById( 'wpSave' );
			if( !saveButton ) {
				return;
			}
			saveButton.disabled = false;
			saveButton.value = msg;
		}
		if( window.addEventListener ) {
			liveButton.addEventListener( 'click', enableSave, false );
		} elseif( window.attachEvent ) {
			liveButton.attachEvent( 'onclick', enableSave );
		}
		</script>"
	);
	return true;
}
