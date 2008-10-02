<?php

// Special:Code/MediaWiki
class CodeRevisionListView extends CodeView {
	function __construct( $repoName ) {
		parent::__construct();
		$this->mRepo = CodeRepository::newFromName( $repoName );
	}

	function execute() {
		global $wgOut;
		if( !$this->mRepo ) {
			$view = new CodeRepoListView();
			$view->execute();
			return;
		}
		$pager = $this->getPager();
		$wgOut->addHtml( $pager->getLimitForm() . $pager->getBody() . $pager->getNavigationBar() );
	}
	
	function getPager() {
		return new SvnRevTablePager( $this );
	}
}

// Pager for CodeRevisionListView
class SvnRevTablePager extends TablePager {

	function __construct( CodeRevisionListView $view ){
		$this->mView = $view;
		$this->mRepo = $view->mRepo;
		$this->mDefaultDirection = true;
		parent::__construct();
	}

	function isFieldSortable( $field ){
		return $field == 'cr_id';
	}

	function getDefaultSort(){ return 'cr_id'; }

	function getQueryInfo(){
		return array(
			'tables' => array( 'code_rev' ),
			'fields' => array_keys( $this->getFieldNames() ),
			'conds' => array( 'cr_repo_id' => $this->mRepo->getId() ),
		);
	}

	function getFieldNames(){
		return array(
			'cr_id' => wfMsg( 'code-field-id' ),
			'cr_status' => wfMsg( 'code-field-status' ),
			'cr_message' => wfMsg( 'code-field-message' ),
			'cr_author' => wfMsg( 'code-field-author' ),
			'cr_timestamp' => wfMsg( 'code-field-timestamp' ),
		);
	}

	function formatValue( $name, $value ){
		global $wgUser, $wgLang;
		switch( $name ){
		case 'cr_id':
			return $this->mView->mSkin->link(
				SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() . '/' . $value ),
				htmlspecialchars( $value ) );
		case 'cr_status':
			return $this->mView->mSkin->link(
				SpecialPage::getTitleFor( 'Code',
					$this->mRepo->getName() . '/status/' . $value ),
				htmlspecialchars( $this->mView->statusDesc( $value ) ) );
		case 'cr_author':
			return $this->mView->authorLink( $value );
		case 'cr_message':
			return $this->mView->messageFragment( $value );
		case 'cr_timestamp':
			global $wgLang;
			return $wgLang->timeanddate( $value );
		}
	}
	
	// Note: this function is poorly factored in the parent class
	function formatRow( $row ) {
		return str_replace(
			'<tr>',
			Xml::openElement( 'tr',
				array( 'class' => "mw-codereview-status-$row->cr_status" ) ),
			parent::formatRow( $row ) );
	}

	function getTitle(){
		return SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() );
	}
}
