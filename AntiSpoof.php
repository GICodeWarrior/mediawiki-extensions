<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	exit( 1 );
}

$wgExtensionCredits[version_compare($wgVersion, '1.17alpha', '>=') ? 'antispam' : 'other'][] = array(
	'path' => __FILE__,
	'name' => 'AntiSpoof',
	'url' => 'https://www.mediawiki.org/wiki/Extension:AntiSpoof',
	'author' => 'Brion Vibber',
	'descriptionmsg' => 'antispoof-desc',
);

/**
 * Set this to false to disable the active checks;
 * items will be logged but invalid or conflicting
 * accounts will not be stopped.
 *
 * Logged items will be marked with 'LOGGING' for
 * easier review of old logs' effect.
 */
$wgAntiSpoofAccounts = true;

/**
 * Allow sysops and bureaucrats to override the spoofing checks
 * and create accounts for people which hit false positives.
 */
$wgGroupPermissions['sysop']['override-antispoof'] = true;
$wgGroupPermissions['bureaucrat']['override-antispoof'] = true;
$wgAvailableRights[] = 'override-antispoof';

$dir = dirname( __FILE__ );

$wgExtensionMessagesFiles['AntiSpoof'] = "$dir/AntiSpoof.i18n.php";

$wgAutoloadClasses['AntiSpoof'] = "$dir/AntiSpoof_body.php";
$wgAutoloadClasses['SpoofUser'] = "$dir/SpoofUser.php";

$wgHooks['LoadExtensionSchemaUpdates'][] = 'asUpdateSchema';
$wgHooks['AbortNewAccount'][] = 'asAbortNewAccountHook';
$wgHooks['UserCreateForm'][] = 'asUserCreateFormHook';
$wgHooks['AddNewAccount'][] = 'asAddNewAccountHook';
$wgHooks['RenameUserComplete'][] = 'asAddRenameUserHook';

/**
 * @param $updater DatabaseUpdater
 * @return bool
 */
function asUpdateSchema( $updater = null ) {
	if ( $updater === null ) {
		global $wgExtNewTables, $wgDBtype;
		$wgExtNewTables[] = array(
			'spoofuser',
			dirname( __FILE__ ) . '/sql/patch-antispoof.' . $wgDBtype . '.sql', true );
	} else {
		$updater->addExtensionUpdate( array( 'addTable', 'spoofuser',
			dirname( __FILE__ ) . '/sql/patch-antispoof.' . $updater->getDB()->getType() . '.sql', true ) );
	}
	return true;
}

/**
 * Can be used to cancel user account creation
 *
 * @param $user User
 * @param $message string
 * @return bool true to continue, false to abort user creation
 */
function asAbortNewAccountHook( $user, &$message ) {
	global $wgAntiSpoofAccounts, $wgUser, $wgRequest;

	if ( !$wgAntiSpoofAccounts ) {
		$mode = 'LOGGING ';
		$active = false;
	} elseif ( $wgRequest->getCheck( 'wpIgnoreAntiSpoof' ) &&
			$wgUser->isAllowed( 'override-antispoof' ) ) {
		$mode = 'OVERRIDE ';
		$active = false;
	} else {
		$mode = '';
		$active = true;
	}

	$name = $user->getName();
	$spoof = new SpoofUser( $name );
	if ( $spoof->isLegal() ) {
		$normalized = $spoof->getNormalized();
		$conflicts = $spoof->getConflicts();
		if ( empty( $conflicts ) ) {
			wfDebugLog( 'antispoof', "{$mode}PASS new account '$name' [$normalized]" );
		} else {
			wfDebugLog( 'antispoof', "{$mode}CONFLICT new account '$name' [$normalized] spoofs " . implode( ',', $conflicts ) );
			if ( $active ) {
				$numConflicts = count( $conflicts );
				$message = wfMsgExt( 'antispoof-conflict-top', array( 'parsemag' ), htmlspecialchars( $name ), $numConflicts );
				$message .= '<ul>';
				foreach ( $conflicts as $simUser ) {
					$message .= '<li>' . wfMsg( 'antispoof-conflict-item', $simUser ) . '</li>';
				}
				$message .= '</ul>' . wfMsg( 'antispoof-conflict-bottom' );
				return false;
			}
		}
	} else {
		$error = $spoof->getError();
		wfDebugLog( 'antispoof', "{$mode}ILLEGAL new account '$name' $error" );
		if ( $active ) {
			$message = wfMsg( 'antispoof-name-illegal', $name, $error );
			return false;
		}
	}
	return true;
}

/**
 * Set the ignore spoof thingie
 * (Manipulate the user create form)
 *
 * @param $template UsercreateTemplate
 * @return bool
 */
function asUserCreateFormHook( &$template ) {
	global $wgRequest, $wgAntiSpoofAccounts, $wgUser;

	if ( $wgAntiSpoofAccounts && $wgUser->isAllowed( 'override-antispoof' ) ) {
		$template->addInputItem( 'wpIgnoreAntiSpoof',
			$wgRequest->getCheck( 'wpIgnoreAntiSpoof' ),
			'checkbox', 'antispoof-ignore' );
	}
	return true;
}

/**
 * On new account creation, record the username's thing-bob.
 * (Called after a user account is created)
 *
 * @param $user User
 * @return bool
 */
function asAddNewAccountHook( $user ) {
	$spoof = new SpoofUser( $user->getName() );
	$spoof->record();
	return true;
}

/**
 * On rename, remove the old entry and add the new
 * (After a sucessful user rename)
 *
 * @param $uid
 * @param $oldName
 * @param $newName
 * @return bool
 */
function asAddRenameUserHook( $uid, $oldName, $newName ) {
	$spoof = new SpoofUser( $newName );
	$spoof->update( $oldName );
	return true;
}
