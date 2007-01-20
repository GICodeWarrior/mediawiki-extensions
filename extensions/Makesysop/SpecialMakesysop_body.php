<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "MakeSysop extension\n";
	exit( 1 );
}

# Add messages
global $wgMessageCache, $wgMakesysopMessages;
foreach( $wgMakesysopMessages as $key => $value ) {
	$wgMessageCache->addMessages( $wgMakesysopMessages[$key], $key );
}

class MakeSysopPage extends SpecialPage {
	function __construct() {
		parent::__construct( 'Makesysop', 'makesysop' );
	}

	function execute( $subpage ) {
		global $wgUser, $wgOut, $wgRequest;

		if ( $wgUser->isBlocked() ) {
			$wgOut->blockedPage();
			return;
		}
		if ( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}
		if ( !$wgUser->isAllowed( 'makesysop' ) ) {
			$this->displayRestrictionError();
			return;
		}

		$this->setHeaders();

		if( $wgUser->isAllowed( 'userrights' ) ) {
			$f = new MakesysopStewardForm( $wgRequest );
			$f->execute();
		} else {
			$f = new MakesysopForm( $wgRequest );
			if ( $f->mSubmit ) {
				$f->doSubmit();
			} else {
				$f->showForm( '' );
			}
		}
	}
}

/**
 *
 * @addtogroup SpecialPage
 */
class MakesysopForm {
	var $mTarget, $mAction, $mRights, $mUser, $mSubmit, $mSetBureaucrat;

	function MakesysopForm( &$request ) {
		global $wgUser;

		$this->mAction = $request->getText( 'action' );
		$this->mRights = $request->getVal( 'wpRights' );
		$this->mUser = $request->getText( 'wpMakesysopUser' );
		$this->mSubmit = $request->getBool( 'wpMakesysopSubmit' ) &&
			$request->wasPosted() &&
			$wgUser->matchEditToken( $request->getVal( 'wpEditToken' ) );		
		$this->mSetBureaucrat = $request->getBool( 'wpSetBureaucrat' );
	}

	function showForm( $err = '') {
		global $wgOut, $wgUser, $wgLang;

		$wgOut->setPagetitle( wfMsg( "makesysoptitle" ) );
		$wgOut->addWikiText( wfMsg( "makesysoptext" ) );

		$titleObj = Title::makeTitle( NS_SPECIAL, "Makesysop" );
		$action = $titleObj->escapeLocalURL( "action=submit" );

		if ( "" != $err ) {
			$wgOut->setSubtitle( wfMsg( "formerror" ) );
			$wgOut->addHTML( "<p class='error'>{$err}</p>\n" );
		}
		$namedesc = wfMsg( "makesysopname" );
		if ( !is_null( $this->mUser ) ) {
			$encUser = htmlspecialchars( $this->mUser );
		} else {
			$encUser = "";
		}

		$wgOut->addHTML( "
			<form id=\"makesysop\" method=\"post\" action=\"{$action}\">
			<table border='0'>
			<tr>
				<td align='right'>$namedesc</td>
				<td align='left'>
					<input type='text' size='40' name=\"wpMakesysopUser\" value=\"$encUser\" />
				</td>
			</tr>" 
		);
		
		$makeburo = wfMsg( "setbureaucratflag" );
		$wgOut->addHTML(
			"<tr>
				<td>&nbsp;</td>
				<td align='left'>
					<input type='checkbox' name='wpSetBureaucrat' value='1'>$makeburo</input>
				</td>
			</tr>"
		);


		$mss = wfMsg( "set_user_rights" );

		$token = htmlspecialchars( $wgUser->editToken() );
		$wgOut->addHTML(
			"<tr>
				<td>&nbsp;</td><td align='left'>
					<input type='submit' name=\"wpMakesysopSubmit\" value=\"{$mss}\" />
				</td></tr></table>
				<input type='hidden' name='wpEditToken' value=\"{$token}\" />
			</form>\n" 
		);
	}

	function doSubmit() {
		global $wgOut, $wgUser, $wgLang;
		global $wgDBname, $wgMemc, $wgLocalDatabases, $wgSharedDB;

		$fname = 'MakesysopForm::doSubmit';
		
		$dbw =& wfGetDB( DB_MASTER );
		$user_groups = $dbw->tableName( 'user_groups' );
		$usertable   = $dbw->tableName( 'user' );

		$username = $this->mUser;

		// Clean up username
		$t = Title::newFromText( $username );
		if ( !$t ) {
			$this->showFail();
			return;
		}
		$username = $t->getText();
		
		if ( $username{0} == "#" ) {
			$id = intval( substr( $username, 1 ) );
		} else {
			$id = $dbw->selectField( $usertable, 'user_id', array( 'user_name' => $username ), $fname );
		}
		if ( !$id ) {
			$this->showFail();
			return;
		}

		$sql = "SELECT ug_user,ug_group FROM $user_groups WHERE ug_user=$id FOR UPDATE";
		$res = $dbw->query( $sql, $fname );

		$row = false;
		$oldGroups = array();
		while ( $row = $dbw->fetchObject( $res ) ) {
			$oldGroups[] = $row->ug_group;
		}
		$dbw->freeResult( $res );
		$newGroups = $oldGroups;

		$wasSysop = in_array( 'sysop', $oldGroups );
		$wasBureaucrat = in_array( 'bureaucrat', $oldGroups );

		$addedGroups = array();
		if ( ( $this->mSetBureaucrat ) && ( $wasBureaucrat ) ) {
			$this->showFail( 'already_bureaucrat' );
			return;
		} elseif ( ( !$this->mSetBureaucrat ) && ( $wasSysop ) ) {
			$this->showFail( 'already_sysop' );
			return;
		} elseif ( !$wasSysop ) {
			$dbw->insert( $user_groups, array( 'ug_user' => $id, 'ug_group' => 'sysop' ), $fname );
			$addedGroups[] = "sysop";
		}
		if ( ( $this->mSetBureaucrat ) && ( !$wasBureaucrat ) ) {
			$dbw->insert( $user_groups, array( 'ug_user' => $id, 'ug_group' => 'bureaucrat' ), $fname );
			$addedGroups[] = "bureaucrat";
		}

		if ( function_exists( 'wfMemcKey' ) ) {
			$wgMemc->delete( wfMemcKey( 'user', 'id', $id ) );
		} else {
			$wgMemc->delete( "$wgDBname:user:id:$id" );
		}
		
		$newGroups = array_merge($newGroups, $addedGroups);
		
		$log = new LogPage( 'rights' );
		$log->addEntry( 'rights', Title::makeTitle( NS_USER, $username ), '',
			array( $this->makeGroupNameList( $oldGroups ), $this->makeGroupNameList( $newGroups ) ) );
			
		$this->showSuccess();
	}

	function showSuccess() {
		global $wgOut, $wgUser;

		$wgOut->setPagetitle( wfMsg( "makesysoptitle" ) );
		$text = wfMsg( "makesysopok", $this->mUser );
		$text .= "\n\n";
		$wgOut->addWikiText( $text );
		$this->showForm();

	}

	function showFail( $msg = 'set_rights_fail' ) {
		global $wgOut, $wgUser;

		$wgOut->setPagetitle( wfMsg( "makesysoptitle" ) );
		$this->showForm( wfMsg( $msg, $this->mUser ) );
	}

	function makeGroupNameList( $ids ) {
		return implode( ', ', $ids );
	}

}

/**
 *
 * @addtogroup SpecialPage
 */
class MakesysopStewardForm extends UserrightsForm {
	function MakesysopStewardForm( $request ) {
		$this->mPosted = $request->wasPosted();
		$this->mRequest =& $request;
		$this->mName = 'userrights';
		
		$titleObj = Title::makeTitle( NS_SPECIAL, 'Makesysop' );
		$this->action = $titleObj->escapeLocalURL();
		
		$this->db = null;
	}

	function saveUserGroups( $username, $removegroup, $addgroup) {
		$split = $this->splitUsername( $username );
		if( WikiError::isError( $split ) ) {
			$wgOut->addWikiText( wfMsg( 'makesysop-nodatabase', $split->getMessage() ) );
			return;
		}
		
		list( $database, $name ) = $split;
		$this->db =& $this->getDB( $database );
		$userid = $this->getUserId( $database, $name );

		if( $userid == 0) {
			$wgOut->addWikiText( wfMsg( 'nosuchusershort', wfEscapeWikiText( $username ) ) );
			return;
		}		

		$oldGroups = $this->getUserGroups( $database, $userid );
		$newGroups = $oldGroups;
		$logcomment = ' ';
		// remove then add groups		
		if(isset($removegroup)) {
			$newGroups = array_diff($newGroups, $removegroup);
			foreach( $removegroup as $group ) {
				$this->removeUserGroup( $database, $userid, $group );
			}
		}
		if(isset($addgroup)) {
			$newGroups = array_merge($newGroups, $addgroup);
			foreach( $addgroup as $group ) {
				$this->addUserGroup( $database, $userid, $group );
			}
		}
		$newGroups = array_unique( $newGroups );
		
		// Ensure that caches are cleared
		$this->touchUser( $database, $userid );
		
		wfDebug( 'oldGroups: ' . print_r( $oldGroups, true ) );
		wfDebug( 'newGroups: ' . print_r( $newGroups, true ) );

		$log = new LogPage( 'rights' );
		$log->addEntry( 'rights', Title::makeTitle( NS_USER, $username ), '', array( $this->makeGroupNameList( $oldGroups ),
			$this->makeGroupNameList( $newGroups ) ) );
	}

	/**
	 * Edit user groups membership
	 * @param string $username Name of the user.
	 */
	function editUserGroupsForm($username) {
		global $wgOut, $wgUser;
		
		$split = $this->splitUsername( $username );
		if( WikiError::isError( $split ) ) {
			$wgOut->addWikiText( wfMsg( 'makesysop-nodatabase', $split->getMessage() ) );
			return;
		}
		
		list( $database, $name ) = $split;
		$this->db =& $this->getDB( $database );
		$userid = $this->getUserId( $database, $name );

		if( $userid == 0) {
			$wgOut->addWikiText( wfMsg( 'nosuchusershort', wfEscapeWikiText( $username ) ) );
			return;
		}		
		
		$groups = $this->getUserGroups( $database, $userid );

		$wgOut->addHTML( "<form name=\"editGroup\" action=\"$this->action\" method=\"post\">\n".
			wfElement( 'input', array(
				'type'  => 'hidden',
				'name'  => 'user-editname',
				'value' => $username ) ) .
			wfElement( 'input', array(
				'type'  => 'hidden',
				'name'  => 'wpEditToken',
				'value' => $wgUser->editToken( $username ) ) ) .
			$this->fieldset( 'editusergroup',
			$wgOut->parse( wfMsg('editing', $username ) ) .
			'<table border="0" align="center"><tr><td>'.
			HTMLSelectGroups('member', $this->mName.'-groupsmember', $groups,true,6).
			'</td><td>'.
			HTMLSelectGroups('available', $this->mName.'-groupsavailable', $groups,true,6,true).
			'</td></tr></table>'."\n".
			$wgOut->parse( wfMsg('userrights-groupshelp') ) .
			wfElement( 'input', array(
				'type'  => 'submit',
				'name'  => 'saveusergroups',
				'value' => wfMsg( 'saveusergroups' ) ) )
			));
		$wgOut->addHTML( "</form>\n" );
	}
	
	function splitUsername( $username ) {
		$parts = explode( '@', $username );
		if( count( $parts ) < 2 ) {
			return array( '', $username );
		}
		list( $name, $database ) = $parts;
		
		global $wgLocalDatabases;
		return array_search( $database, $wgLocalDatabases ) !== false
			? array( $database, $name )
			: new WikiError( 'Bogus database suffix "' . wfEscapeWikiText( $database ) . '"' );
	}
	
	/**
	 * Open a database connection to work on for the requested user.
	 * This may be a new connection to another database for remote users.
	 * @param string $database
	 * @return Database
	 */
	function &getDB( $database ) {
		if( $database == '' ) {
			$db =& wfGetDB( DB_MASTER );
		} else {
			global $wgDBuser, $wgDBpassword;
			$server = $this->getMaster( $database );
			$db = new Database( $server, $wgDBuser, $wgDBpassword, $database );
		}
		return $db;
	}
	
	/**
	 * Return the master server to connect to for the requested database.
	 */
	function getMaster( $database ) {
		global $wgDBserver, $wgAlternateMaster;
		if( isset( $wgAlternateMaster[$database] ) ) {
			return $wgAlternateMaster[$database];
		}
		return $wgDBserver;
	}
	
	function getUserId( $database, $name ) {
		if( $name === '' )
			return 0;
		return ( $name{0} == "#" )
			? IntVal( substr( $name, 1 ) )
			: IntVal( $this->db->selectField( 'user',
				'user_id',
				array( 'user_name' => $name ),
				'MakesysopStewardForm::getUserId' ) );
	}
	
	function getUserGroups( $database, $userid ) {
		$res = $this->db->select( 'user_groups',
			array( 'ug_group' ),
			array( 'ug_user' => $userid ),
			'MakesysopStewardForm::getUserGroups' );
		$groups = array();
		while( $row = $this->db->fetchObject( $res ) ) {
			$groups[] = $row->ug_group;
		}
		return $groups;
	}
	
	function addUserGroup( $database, $userid, $group ) {
		$this->db->insert( 'user_groups',
			array(
				'ug_user' => $userid,
				'ug_group' => $group,
			),
			'MakesysopStewardForm::addUserGroup',
			array( 'IGNORE' ) );
	}
	
	function removeUserGroup( $database, $userid, $group ) {
		$this->db->delete( 'user_groups',
			array(
				'ug_user' => $userid,
				'ug_group' => $group,
			),
			'MakesysopStewardForm::addUserGroup' );
	}
	
	function touchUser( $database, $userid ) {
		$this->db->update( 'user',
			array( 'user_touched' => $this->db->timestamp() ),
			array( 'user_id' => $userid ),
			'MakesysopStewardForm::touchUser' );
		
		global $wgMemc;
		if ( function_exists( 'wfForeignMemcKey' ) ) {
			$key = wfForeignMemcKey( $database, false, 'user', 'id', $userid );
		} else {
			$key = "$database:user:id:$userid";
		}
		$wgMemc->delete( $key );
	}
}


?>
