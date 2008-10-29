<?php

// Special:Code/MediaWiki
class CodeCommentsListView extends CodeView {
	public $mRepo;

	function __construct( $repoName ) {
		parent::__construct();
		$this->mRepo = CodeRepository::newFromName( $repoName );
	}

	function execute() {
		global $wgOut;
		$pager = $this->getPager();
		$wgOut->addHtml( 
			$pager->getNavigationBar() .
			$pager->getLimitForm() . 
			$pager->getBody() . 
			$pager->getNavigationBar()
		);
	}

	function getPager() {
		return new CodeCommentsTablePager( $this );
	}
	function getRepo() {
		return $this->mRepo;
	}
}

// Pager for CodeRevisionListView
class CodeCommentsTablePager extends TablePager {

	function __construct( CodeCommentsListView $view ){
		global $IP;
		$this->mView = $view;
		$this->mRepo = $view->mRepo;
		$this->mDefaultDirection = true;
		$this->mCurSVN = SpecialVersion::getSvnRevision( $IP );
		parent::__construct();
	}

	function isFieldSortable( $field ){
		return $field == 'cr_timestamp';
	}

	function getDefaultSort(){ return 'cc_timestamp'; }

	function getQueryInfo(){
		return array(
			'tables' => array( 'code_comment', 'code_rev' ),
			'fields' => array_keys( $this->getFieldNames() ),
			'conds' => array( 'cc_repo_id' => $this->mRepo->getId() ),
			'join_conds' => array( 
				'code_rev' => array( 'LEFT JOIN', 'cc_repo_id = cr_repo_id AND cc_rev_id = cr_id' )
			)
		);
	}

	function getFieldNames(){
		return array(
			'cc_timestamp' => wfMsg( 'code-field-timestamp' ),
			'cc_user_text' => wfMsg( 'code-field-user' ),
			'cc_rev_id' => wfMsg( 'code-field-id' ),
			'cr_status' => wfMsg( 'code-field-status' ),
			'cr_message' => wfMsg( 'code-field-message' ),
			'cc_text' => wfMsg( 'code-field-text' ),
		);
	}

	function formatValue( $name, $value ){
		global $wgUser, $wgLang;
		switch( $name ){
		case 'cc_rev_id':
			return $this->mView->mSkin->link(
				SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() . '/' . $value . '#code-comments' ),
				htmlspecialchars( $value ) );
		case 'cr_status':
			return $this->mView->mSkin->link(
				SpecialPage::getTitleFor( 'Code',
					$this->mRepo->getName() . '/status/' . $value ),
				htmlspecialchars( $this->mView->statusDesc( $value ) ) );
		case 'cc_user_text':
			return $this->mView->mSkin->userLink( -1, $value );
		case 'cr_message':
			return $this->mView->messageFragment( $value );
		case 'cc_text':
			# Truncate this, blah blah...
			$text = htmlspecialchars($value);
			$preview = $wgLang->truncate( $text, 300 );
			if( strlen($preview) < strlen($text) ) {
				$preview = substr( $preview, 0, strrpos($preview,' ') );
				$preview .= " . . .";
			}
			return $preview;
		case 'cc_timestamp':
			global $wgLang;
			return $wgLang->timeanddate( $value );
		}
	}
	
	// Note: this function is poorly factored in the parent class
	function formatRow( $row ) {
		global $wgWikiSVN;
		$class = "mw-codereview-status-{$row->cr_status}";
		if($this->mRepo->mName == $wgWikiSVN){
			$class .= " mw-codereview-" . ( $row->cc_rev_id <= $this->mCurSVN ? 'live' : 'notlive' );
		}
		return str_replace(
			'<tr>',
			Xml::openElement( 'tr',
				array( 'class' => $class ) ),
				parent::formatRow( $row ) );
	}

	function getTitle(){
		return SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() . '/comments' );
	}
}
