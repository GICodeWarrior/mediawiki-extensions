<?php
class TrustedMathHooks {
	
	public static function onParserAfterStrip( $parser, &$text, &$stripState ) {
		global $wgTrustedMathNamespace;
		
		if ( $parser->getTitle()->getNamespace() == $wgTrustedMathNamespace ) {
			if ( strpos( $text, '<math>' ) === false ) {
				$text = "<math>$text</math>";
				return false;
			}
		}
		return true;
	}
	
	
	public static function initGlobals() {
		global $wgTrustedMathDirectory, $wgTrustedMathPath;
		global $wgUploadDirectory, $wgUploadPath;
		
		if ( is_null( $wgTrustedMathDirectory ) ) {
			$wgTrustedMathDirectory = "$wgUploadDirectory/math";
		}
		if ( is_null( $wgTrustedMathPath ) ) {
			$wgTrustedMathPath = "$wgUploadPath/math";
		}
		
		self::initNamespace();
	}
	
	public static function initNamespace() {
		global $wgExtraNamespaces, $wgNamespaceProtection;
		global $wgTrustedMathNamespace;
		
		if ( !isset( $wgExtraNamespaces[$wgTrustedMathNamespace] ) ) {
			$wgExtraNamespaces[$wgTrustedMathNamespace] = 
				wfMsgForContent( 'trustedmath-namespace' );
		}
		if ( !isset( $wgExtraNamespaces[$wgTrustedMathNamespace+1] ) ) {
			$wgExtraNamespaces[$wgTrustedMathNamespace+1] = 
				wfMsgForContent( 'trustedmath-talk-namespace' );
		}
		
		if ( !isset( $wgNamespaceProtection[$wgTrustedMathNamespace] ) ) {
			$wgNamespaceProtection[$wgTrustedMathNamespace] = array( 'editmath' );
		}
	}
	
	public static function onParserFirstCallInit( $parser ) {
		$parser->setHook( 'math',  __CLASS__ . '::mathTag' );
		return true;
	}
	
	public static function mathTag( $input, $args, $parser, $frame ) {
		global $wgTrustedMathNamespace;
		
		if ( isset( $args['name'] ) ) {
			$title = Title::newFromText( $args['name'], $wgTrustedMathNamespace );
			if ( !self::validateSafeMode( $title ) ) {
				return self::getPermissionError( $parser );
			}
			
			$math = TrustedMath::newFromTitle( $title );
		} else {
			global $wgTitle; // eeeeeewh
			
			if ( !self::validateSafeMode( $wgTitle ) ) {
				return self::getPermissionError( $parser );
			}
			
			$math = TrustedMath::newFromText( $input );
		}
		
		$status = $math->render();
		
		if ( $status->isOk() ) {
			global $wgTrustedMathPath;
			
			return Html::element( 'img', array( 
				'src' => "{$wgTrustedMathPath}/{$status->value}",
				'class' => 'tex',
				'alt' => $math->getText(),
			) );
		} else {
			return $parser->recursiveTagParse( '<span class="error">' . 
				$status->getWikiText() . '</span>', $frame );
		}
		
	}
	
	protected static function validateSafeMode( $title ) {
		global $wgTrustedMathNamespace;
		return !( self::safeMode() && 
			$title->getNamespace() != $wgTrustedMathNamespace );
	}
	
	protected static function safeMode() {
		global $wgTrustedMathUnsafeMode;
		return !$wgTrustedMathUnsafeMode;
	}
	
	protected static function getPermissionError( $parser ) {
		return $parser->recursiveTagParse( '<span class="error">' . 
			wfMsg( 'trustedmath-permission-error' ) . '</span>' );
	}
}