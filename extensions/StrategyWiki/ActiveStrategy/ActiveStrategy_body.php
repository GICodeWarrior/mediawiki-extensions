<?php

class ActiveStrategy {
	static function getTaskForces() {
		$dbr = wfGetDB( DB_SLAVE );
		
		$res = $dbr->select( "page",
				array(
					'page_id',
					'page_namespace',
					'page_title',
					"substring_index(page_title, '/', 2) AS tf_name"
				),
				array(
					'page_namespace' => 0,
					"page_title LIKE 'Task_force/%'",
				), __METHOD__ );
		
		return $res;
	}

	static function formatResult( $skin, $taskForce, $number, $type ) {
		global $wgContLang, $wgLang, $wgActiveStrategyColors;

		if ( ! $taskForce ) {
			// Fail.
			return;
		}

		$title = Title::newFromText( $taskForce );
		$text = $wgContLang->convert( $title->getPrefixedText() );
		$text = self::getTaskForceName( $text );
		$pageLink = $skin->linkKnown( $title, $text );
		$colors = null;
		$color = null;
		
		if ( isset( $wgActiveStrategyColors[$type] ) ) {
			$colors = $wgActiveStrategyColors[$type];
		} else {
			$colors = $wgActiveStrategyColors['default'];
		}
		
		ksort($colors);
		
		foreach( $colors as $threshold => $curColor ) {
			if ( $number >= $threshold ) {
				$color = $curColor;
			} else {
				break;
			}
		}
		
		$style = 'padding-left: 3px; border-left: 1em solid #'.$color;
		
		$pageLink .= " <!-- $number -->";
		
		$item = Xml::tags( 'li', array( 'style' => $style ), $pageLink );
		
		return $item;
	}
	
	static function getTaskForceName( $text ) {
		$text = substr( $text, strpos($text, '/') + 1 );
		
		if ( strpos( $text, '/' ) ) {
			$text = substr( $text, 0, strpos( $text, '/' ) );
		}
		
		return $text;
	}
	
	static function getOutput( $args ) {
		global $wgUser, $wgActiveStrategyPeriod;
		
		$html = '';
		$db = wfGetDB( DB_MASTER );
		$sk = $wgUser->getSkin();
		
		$sortField = 'members';
		
		if ( isset($args['sort']) ) {
			$sortField = $args['sort'];
		}
		
		$taskForces = self::getTaskForces();
		$categories = array();
		
		// Sorting by number of members doesn't require any 
		if ($sortField == 'members' ) {
			return self::handleSortByMembers( $taskForces );
		}
		
		foreach( $taskForces as $row ) {
			$text = self::getTaskForceName( $row->tf_name );
			$tempTitle = Title::makeTitleSafe( NS_CATEGORY, $text );
			$categories[$row->tf_name] = $tempTitle->getDBkey();
		}
		
		$tables = array( 'page', 'categorylinks' );
		$fields = array( 'categorylinks.cl_to' );
		$conds = array( 'categorylinks.cl_to' => $categories );
		$options = array( 'GROUP BY' => 'categorylinks.cl_to', 'ORDER BY' => 'value DESC' );
		$joinConds = array( 'categorylinks' =>
				array( 'left join', 'categorylinks.cl_from=page.page_id' ) );
		
		// Extra categories to consider
		$tables[] = 'categorylinks as tfcategory';
		$tables[] = 'categorylinks as finishedcategory';
		
		$joinConds['categorylinks as tfcategory'] =
			array( 'left join',
				array(
					'tfcategory.cl_from=page.page_id',
					'tfcategory.cl_to' => 'Task_force'
				),
			);
		$joinConds['categorylinks as finishedcategory'] = 
			array( 'left join',
				array(
					'finishedcategory.cl_from=page.page_id',
					'finishedcategory.cl_to' => 'Task_force_finished'
				),
			);
			
		$conds[] = 'tfcategory.cl_from IS NOT NULL';
		$conds[] = 'finishedcategory.cl_from IS NULL';
		
		if ( $sortField == 'edits' ) {
			$cutoff = $db->timestamp( time() - $wgActiveStrategyPeriod );
			$cutoff = $db->addQuotes( $cutoff );
			$tables[] = 'revision';
			$joinConds['revision'] =
				array( 'left join',
					array( 'rev_page=page_id',
						"rev_timestamp > $cutoff",
						"rev_page IS NOT NULL" ) );
			$fields[] = 'count(distinct rev_id) + count(distinct thread_id) as value';
			
			// Include LQT posts
			$tables[] = 'thread';
			$joinConds['thread'] =
				array( 'left join',
					array( 'thread.thread_article_title=page.page_title',
						"thread.thread_modified > $cutoff" )
				);
		} elseif ( $sortField == 'ranking' ) {
			$tables[] = 'pagelinks';
			$joinConds['pagelinks'] = array( 'left join',
				array( 'pl_namespace=page_namespace', 'pl_title=page_title' ) );
			$fields[] = 'count(distinct pl_from) as value';
		}
		
		$result = $db->select( $tables, $fields, $conds,
					__METHOD__, $options, $joinConds );
					
					
		$categoryToTaskForce = array_flip( $categories );
		
		foreach( $result as $row ) {
			$number = $row->value;
			$taskForce = $categoryToTaskForce[$row->cl_to];
			
			$html .= self::formatResult( $sk, $taskForce, $number, $sortField );
		}
		
		$html = Xml::tags( 'ul', null, $html );
		$html .= "<!-- " . $db->selectSQLText( $tables, $fields, $conds, __METHOD__,
							$options, $joinConds ) . '-->';
		
		return $html;
	}
	
	static function handleSortByMembers( $taskForces ) {
		global $wgUser;
		
		$memberCount = array();
		$output = '';
		$sk = $wgUser->getSkin();
		
		foreach( $taskForces as $row ) {
			$title = Title::makeTitle( $row->page_namespace, $row->page_title );
			$memberCount[$row->tf_name] =
				self::getMemberCount( $title->getPrefixedText() );
		}
		
		asort( $memberCount );
		$memberCount = array_reverse( $memberCount );
		
		foreach( $memberCount as $name => $count ) {
			$output .= self::formatResult( $sk, $name, $count, 'members' );
		}
		
		$output = Xml::tags( 'ul', null, $output );
		
		return $output;
	}
	
	static function getMemberCount( $taskForce ) {
		global $wgMemc;
		
		$key = wfMemcKey( 'taskforce-member-count', $taskForce );
		$cacheVal = $wgMemc->get( $key );
		
		if ( $cacheVal > 0 || $cacheVal === 0 ) {
			return $cacheVal;
		}
		
		$article = new Article( Title::newFromText( $taskForce ) );
		$content = $article->getContent();
		
		$count = self::parseMemberList( $content );
		
		$wgMemc->set( $key, $count, 86400 );
		
		return $count;
	}
	
	// FIXME THIS IS TOTALLY AWFUL
	static function parseMemberList( $text ) {
		$regex = "/'''Members'''.*<!--- begin --->(.*)?<!--- end --->/s";
		$matches = array();
		
		if ( !preg_match( $regex, $text, $matches ) ) {
			return -1;
		} else {
			$regex = "/^\* .*/m";
			$text = $matches[1];
			$matches = array();
			
			preg_match_all( $regex, $text, $matches );
			
			return count( $matches[0] );
		}
	}
}

