<?php
class TrustedMath {

	
	public static function newFromText( $text ) {
		return new self( $text );
	}
	public static function newFromTitle( $title ) {
		$text = Article::newFromId( $title->getArticleId() )->getRawText();
		return new self( $text );
	}


	protected $text = null;
	protected $hash = null;
	protected $error = array();
	
	public function __construct( $text ) {
		$this->text = $text;
	}
		
	public function getHash() {
		if ( is_null( $this->hash ) ) {
			$this->hash = md5( $this->getText() );
		}
		return $this->hash;
	}
	protected function getHashPath() {
		$hash = $this->getHash();
		return $hash{0} . '/' . $hash{0} . $hash{1};
	}
	
	public function getText() {
		return $this->text;
	}
	
	public function render( $force = false ) {
		global $wgTrustedMathLatexPath, $wgTrustedMathDviPngPath,
			$wgTrustedMathDirectory;
		
		$hash = $this->getHash();
		$hashPath = $this->getHashPath();
		$filePath = "$wgTrustedMathDirectory/$hashPath/$hash.png";
		
		if ( !$force && file_exists( $filePath ) && 
				filesize( $filePath ) > 0 ) {
			return Status::newGood( "$hashPath/$hash.png" );	
		}
		
		wfSuppressWarnings();
		if ( !wfMkDirParents( "$wgTrustedMathDirectory/$hashPath" ) ) {
			wfRestoreWarnings();
			return Status::newFatal( 'trustedmath-path-error', $hashPath );
		}
		wfRestoreWarnings();
		
		#$dir = wfTempDir();
		$dir = $wgTrustedMathDirectory;
		$file = tempnam( $dir, 'trustedmath_' );
		file_put_contents( "$file.tex", self::wrapEquation( $this->getText() ) );
		
		// FIXME: dangerous
		$environ = array( 'USERPROFILE' => $wgTrustedMathDirectory );
		
		$retval = null;
		wfShellExec( wfEscapeShellArg( $wgTrustedMathLatexPath, 
			 '-halt-on-error', '-output-directory', 
			$dir, "$file.tex" ) . ' 2>&1', $retval, $environ );
		if ( !file_exists( "$file.dvi" ) ) {
			return Status::newFatal( 'trustedmath-convert-error', 
				$wgTrustedMathLatexPath );
		}
		
		wfShellExec( wfEscapeShellArg( $wgTrustedMathDviPngPath ) . 
			' -D 150 -T tight -v -o ' . 
			wfEscapeShellArg( $filePath, "$file.dvi" ), $retval, $environ );
		if ( !file_exists( $filePath ) ) {
			return Status::newFatal( 'trustedmath-convert-error', 
				$wgTrustedMathDviPngPath );
		}
		
		return Status::newGood( "$hashPath/$hash.png" );
	}
	
	protected static function wrapEquation( $equation ) {
		return implode( "\n", array(
			'\documentclass{article}',
			'\pagestyle{empty}', 
			'\begin{document}',
			'$' . $equation . '$',
			'\end{document}',
		) );
	}
	
}
