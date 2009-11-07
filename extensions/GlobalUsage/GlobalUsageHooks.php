<?php
class GlobalUsageHooks {
	private static $gu = null;
	
	/**
	 * Hook to LinksUpdateComplete
	 * Deletes old links from usage table and insert new ones.
	 */
	public static function onLinksUpdateComplete( $linksUpdater ) {
		$title = $linksUpdater->getTitle();
		
		// Create a list of locally existing images
		$images = array_keys( $linksUpdater->getImages() );
		$localFiles = array_keys( RepoGroup::singleton()->getLocalRepo()->findFiles( $images ) );
		
		$gu = self::getGlobalUsage();
		$gu->deleteFrom( $title->getArticleId( GAID_FOR_UPDATE ) );
		$gu->setUsage( $title, array_diff( $images, $localFiles ) );
		
		return true;
	}
	/**
	 * Hook to TitleMoveComplete
	 * Sets the page title in usage table to the new name.
	 */
	public static function onTitleMoveComplete( $ot, $nt, $user, $pageid, $redirid ) {
		$gu = self::getGlobalUsage();
		$gu->moveTo( $pageid, $nt );
		return true;
	}
	/**
	 * Hook to ArticleDeleteComplete
	 * Deletes entries from usage table.
	 * In case of an image, copies the local link table to the global.
	 */
	public static function onArticleDeleteComplete( $article, $user, $reason, $id ) {
		$title = $article->getTitle();
		$gu = self::getGlobalUsage();
		$gu->deleteFrom( $id );
		if ( $title->getNamespace() == NS_FILE ) {
			$gu->copyFromLocal( $title );
		}
		return true;
	}

	/**
	 * Hook to FileUndeleteComplete
	 * Deletes the file from the global link table.
	 */
	public static function onFileUndeleteComplete( $title, $versions, $user, $reason ) { 
		$gu = self::getGlobalUsage();
		$gu->deleteTo( $title );
		return true;
	}
	/**
	 * Hook to UploadComplete
	 * Deletes the file from the global link table.
	 */
	public static function onUploadComplete( $upload ) {
		$gu = self::getGlobalUsage();
		$gu->deleteTo( $upload->getTitle() );
		return true;
	}
	
	/**
	 * Initializes a GlobalUsage object for the current wiki.
	 */
	private static function getGlobalUsage() {
		global $wgGlobalUsageDatabase;
		if ( is_null( self::$gu ) ) {
			self::$gu = new GlobalUsage( wfWikiId(), 
					wfGetDB( DB_MASTER, array(), $wgGlobalUsageDatabase ) 
			);
		}
		
		return self::$gu;
	}
	

}