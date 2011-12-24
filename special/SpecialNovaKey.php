<?php
class SpecialNovaKey extends SpecialNova {

	var $userNova;

	/**
	 * @var OpenStackNovaUser
	 */
	var $userLDAP;

	function __construct() {
		parent::__construct( 'NovaKey' );
	}

	function execute( $par ) {
		global $wgRequest, $wgUser;

		if ( !$wgUser->isLoggedIn() ) {
			$this->notLoggedIn();
			return;
		}
		$this->userLDAP = new OpenStackNovaUser();
		if ( !$this->userLDAP->exists() ) {
			$this->noCredentials();
			return;
		}

		$action = $wgRequest->getVal( 'action' );
		if ( $action == "import" ) {
			$this->importKey();
		} elseif ( $action == "delete" ) {
			$this->deleteKey();
		} else {
			$this->listKeys();
		}
	}

	/**
	 * @return bool
	 */
	function importKey() {
		global $wgRequest, $wgOut;
		global $wgOpenStackManagerNovaKeypairStorage;

		$project = '';
		if ( $wgOpenStackManagerNovaKeypairStorage == 'nova' ) {
			$project = $wgRequest->getVal( 'project' );
			if ( $project && ! $this->userLDAP->inProject( $project ) ) {
				$this->notInProject();
				return;
			}
			$userCredentials = $this->userLDAP->getCredentials();
			$this->userNova = new OpenStackNovaController( $userCredentials, $project );
		}

		$this->setHeaders();
		$wgOut->setPagetitle( wfMsg( 'openstackmanager-importkey' ) );

		$keyInfo = array();

		if ( $wgOpenStackManagerNovaKeypairStorage == 'nova' ) {
			$keyInfo['keyname'] = array(
				'type' => 'text',
				'label-message' => 'openstackmanager-novakeyname',
				'default' => '',
				'section' => 'key/info',
				'name' => 'keyname',
			);
		}

		$keyInfo['key'] = array(
			'type' => 'textarea',
			'section' => 'key/info',
			'default' => '',
			'label-message' => 'openstackmanager-novapublickey',
			'name' => 'key',
		);

		$keyInfo['action'] = array(
			'type' => 'hidden',
			'default' => 'import',
			'name' => 'action',
		);

		$keyInfo['project'] = array(
			'type' => 'hidden',
			'default' => htmlentities( $project ),
			'name' => 'project',
		);

		$keyForm = new SpecialNovaKeyForm( $keyInfo, 'openstackmanager-novakey' );
		$keyForm->setTitle( SpecialPage::getTitleFor( 'NovaKey' ) );
		$keyForm->setSubmitID( 'novakey-form-createkeysubmit' );
		$keyForm->setSubmitCallback( array( $this, 'tryImportSubmit' ) );
		$keyForm->show();

	}

	/**
	 * @return bool
	 */
	function deleteKey() {
		global $wgOut, $wgRequest;
		global $wgOpenStackManagerNovaKeypairStorage;

		$this->setHeaders();
		$wgOut->setPagetitle( wfMsg( 'openstackmanager-deletekey' ) );

		$keyInfo = array();
		$hash = '';
		$keypairs = array();

		if ( $wgOpenStackManagerNovaKeypairStorage == 'nova' ) {
			$keyname = $wgRequest->getVal( 'keyname' );
			$project = $wgRequest->getVal( 'project' );
			if ( $project && ! $this->userLDAP->inProject( $project ) ) {
				$this->notInProject();
				return true;
			}
			$keyInfo['keyname'] = array(
				'type' => 'hidden',
				'default' => $project,
				'name' => 'keyname',
			);
			$keyInfo['project'] = array(
				'type' => 'hidden',
				'default' => $keyname,
				'name' => 'project',
			);
		} elseif ( $wgOpenStackManagerNovaKeypairStorage == 'ldap' ) {
			$hash = $wgRequest->getVal( 'hash' );
			$keypairs = $this->userLDAP->getKeypairs();
			if ( ! $wgRequest->wasPosted() ) {
				$wgOut->addHTML( Html::element( 'pre', array(), $keypairs[$hash] ) );
				$wgOut->addWikiMsg( 'openstackmanager-deletekeyconfirm' );
			}
			$keyInfo['hash'] = array(
				'type' => 'hidden',
				'default' => $hash,
				'name' => 'hash',
			);
		}
		$keyInfo['key'] = array(
			'type' => 'hidden',
			'default' => $keypairs[$hash],
			'name' => 'key',
		);
		$keyInfo['action'] = array(
			'type' => 'hidden',
			'default' => 'delete',
			'name' => 'action',
		);
		$keyForm = new SpecialNovaKeyForm( $keyInfo, 'openstackmanager-novakey' );
		$keyForm->setTitle( SpecialPage::getTitleFor( 'NovaKey' ) );
		$keyForm->setSubmitID( 'novakey-form-deletekeysubmit' );
		$keyForm->setSubmitCallback( array( $this, 'tryDeleteSubmit' ) );
		$keyForm->show();
		return true;
	}

	/**
	 * @return void
	 */
	function listKeys() {
		global $wgOut;
		global $wgOpenStackManagerNovaKeypairStorage;

		$this->setHeaders();
		$wgOut->setPagetitle( wfMsg( 'openstackmanager-keylist' ) );
		$wgOut->addModuleStyles( 'ext.openstack' );

		$out = '';
		$sk = $wgOut->getSkin();
		if ( $wgOpenStackManagerNovaKeypairStorage == 'nova' ) {
			$out .= $sk->link( $this->getTitle(), wfMsgHtml( 'openstackmanager-importkey' ), array(), array( 'action' => 'import' ) );
			$projects = $this->userLDAP->getProjects();
			foreach ( $projects as $project ) {
				$userCredentials = $this->userLDAP->getCredentials();
				$this->userNova = new OpenStackNovaController( $userCredentials, $project );
				$keypairs = $this->userNova->getKeypairs();
				if ( ! $keypairs ) {
					continue;
				}
				$out .= Html::element( 'h2', array(), $project );
				$projectOut = Html::element( 'th', array(), wfMsg( 'openstackmanager-name' ) );
				$projectOut .= Html::element( 'th', array(), wfMsg( 'openstackmanager-fingerprint' ) );
				foreach ( $keypairs as $keypair ) {
					$keyOut = Html::element( 'td', array( 'class' => 'Nova_col' ), $keypair->getKeyName() );
					$keyOut .= Html::element( 'td', array(), $keypair->getKeyFingerprint() );
					$projectOut .= Html::rawElement( 'tr', array(), $keyOut );
				}
				$out .= Html::rawElement( 'table', array( 'id' => 'novakeylist', 'class' => 'wikitable sortable collapsible' ), $projectOut );
			}
		} elseif ( $wgOpenStackManagerNovaKeypairStorage == 'ldap' ) {
			$out .= $sk->link( $this->getTitle(), wfMsgHtml( 'openstackmanager-importkey' ), array(), array( 'action' => 'import' ) );
			$keypairs = $this->userLDAP->getKeypairs();
			$keysOut = '';
			$keysOut .= Html::element( 'th', array(), wfMsg( 'openstackmanager-keys' ) );
			$keysOut .= Html::element( 'th', array(), wfMsg( 'openstackmanager-actions' ) );
			foreach ( $keypairs as $hash => $key ) {
				$keyOut = Html::element( 'td', array( 'class' => 'Nova_col' ), $key );
				$msg = wfMsgHtml( 'openstackmanager-delete' );
				$link = $sk->link( $this->getTitle(), $msg, array(), array( 'action' => 'delete', 'hash' => $hash ) );
				$action = Html::rawElement( 'li', array(), $link );
				$action = Html::rawElement( 'ul', array(), $action );
				$keyOut .= Html::rawElement( 'td', array(), $action );
				$keysOut .= Html::rawElement( 'tr', array(), $keyOut );
			}
			$out .= Html::rawElement( 'table', array( 'id' => 'novakeylist', 'class' => 'wikitable' ), $keysOut );
		} else {
			$wgOut->addWikiMsg( 'openstackmanager-invalidkeypair' );
		}

		$wgOut->addHTML( $out );
	}

	/**
	 * @param  $formData
	 * @param string $entryPoint
	 * @return bool
	 */
	function tryImportSubmit( $formData, $entryPoint = 'internal' ) {
		global $wgOut;
		global $wgOpenStackManagerNovaKeypairStorage;

		if ( $wgOpenStackManagerNovaKeypairStorage == 'ldap' ) {
			$success = $this->userLDAP->importKeypair( $formData['key'] );
			if ( ! $success ) {
				$wgOut->addWikiMsg( 'openstackmanager-keypairimportfailed' );
				return true;
			}
			$wgOut->addWikiMsg( 'openstackmanager-keypairimported' );
		} elseif ( $wgOpenStackManagerNovaKeypairStorage == 'nova' ) {
			# wgOpenStackManagerNovaKeypairStorage == 'nova'
			# OpenStack's EC2 API doesn't yet support importing keys, use
			# of this option isn't currently recommended
			$keypair = $this->userNova->importKeypair( $formData['keyname'], $formData['key'] );

			$wgOut->addWikiMsg( 'openstackmanager-keypairimportedfingerprint', $keypair->getKeyName(), $keypair->getKeyFingerprint() );
		} else {
			$wgOut->addWikiMsg( 'openstackmanager-invalidkeypair' );
		}
		$out = '<br />';
		$sk = $wgOut->getSkin();
		$out .= $sk->link( $this->getTitle(), wfMsgHtml( 'openstackmanager-backkeylist' ) );
		$wgOut->addHTML( $out );
		return true;
	}

	/**
	 * @param  $formData
	 * @param string $entryPoint
	 * @return bool
	 */
	function tryDeleteSubmit( $formData, $entryPoint = 'internal' ) {
		global $wgOut;

		$success = $this->userLDAP->deleteKeypair( $formData['key'] );
		if ( $success ) {
			$wgOut->addWikiMsg( 'openstackmanager-deletedkey' );
		} else {
			$wgOut->addWikiMsg( 'openstackmanager-deletedkeyfailed' );
		}
		$out = '<br />';
		$sk = $wgOut->getSkin();
		$out .= $sk->link( $this->getTitle(), wfMsgHtml( 'openstackmanager-backkeylist' ) );
		$wgOut->addHTML( $out );
		return true;
	}
}

class SpecialNovaKeyForm extends HTMLForm {
}
