<?php

/**
 * Utility functions for the Contest extension.
 * 
 * @since 0.1
 * 
 * @file ContestUtils.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ContestUtils {
	
	/**
	 * Gets the content of the article with the provided page name,
	 * or an empty string when there is no such article.
	 * 
	 * @since 0.1
	 * 
	 * @param string $pageName
	 * 
	 * @return string
	 */
	public static function getArticleContent( $pageName ) {
		$title = Title::newFromText( $pageName );
		
		if ( is_null( $title ) ) {
			return '';
		}
		 
		$article = new Article( $title, 0 );
		return $article->getContent();
	}
	
	/**
	 * Gets the content of the article with the provided page name,
	 * or an empty string when there is no such article.
	 * 
	 * @since 0.1
	 * 
	 * @param string $pageName
	 * 
	 * @return string
	 */
	public static function getParsedArticleContent( $pageName ) {
		$title = Title::newFromText( $pageName );
		
		if ( is_null( $title ) ) {
			return '';
		}
		
		$article = new Article( $title, 0 );
		
		global $wgParser;
		return $wgParser->parse(
			self::replaceRelativeLinks( $article->fetchContent() ),
			$article->getTitle(),
			$article->getParserOptions()
		)->getText(); // TODO: have full urls instead of relative ones
	}
	
	/**
	 * Returns the provided wikitext with internal (relative) links replaced by their external equivalents.
	 * ie turns [[Foo]] into [someurl/Foo Foo]
	 * 
	 * This replacing is quite evil; if the parser can just do this,
	 * we should make use of that instead of doing it here.
	 * 
	 * @since 0.1
	 * 
	 * @param string $wikiText
	 * 
	 * @return string
	 */
	public static function replaceRelativeLinks( $wikiText ) {
		$url = substr( Title::newFromText( 'a' )->getFullUrl(), 0, -1 );
		
		$wikiText = preg_replace(
			'/\[\[(?!(Category|Image|File|[^\s]{2,5}:))([^\|\]]*)\|([^\]]*)\]\]/e',
			"'[" . $url . "'.str_replace(' ', '_', '\\2').' \\3]'",
			$wikiText
		);
		
		$wikiText = preg_replace(
			'/\[\[((?!(Category|Image|File|[^\s]{2,5}:))[^\]]*)\]\]/e',
			"'[" . $url . "'.str_replace(' ', '_', '\\1').' \\1]'",
			$wikiText
		);
		
		return $wikiText;
	}
	
}
