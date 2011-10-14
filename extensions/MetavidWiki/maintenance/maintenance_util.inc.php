<?php
/**
 * maintenance_util.inc.php Created on Jan 19, 2008
 *
 * All Metavid Wiki code is Released under the GPL2
 * for more info visit http://metavid.org/wiki/Code
 *
 * @author Michael Dale
 * @email dale@ucsc.edu
 * @url http://metavid.org
 *
 *
 * Maintenance Utility Functions:
 */
require_once ( '../../../maintenance/commandLine.inc' );
/**
 * set up the bot user:
 */
$botUserName = 'MvBot';
$wgUser = User::newFromName( $botUserName );
if ( !$wgUser ) {
	print "Invalid username\n";
	exit( 1 );
}
if ( $wgUser->isAnon() ) {
	$wgUser->addToDatabase();
}
// some global configs;
$mvMaxContribPerInterest = 300;
$mvMaxForAgainstBills = 100;


// returns true if person found in the wiki
$mv_valid_people_cache = array();
function mv_is_valid_person( $person_key ) {
	global $mv_valid_people_cache;
	if ( isset( $mv_valid_people_cache[$person_key] ) ) {
		return $mv_valid_people_cache[$person_key];
	}
	$dbr = wfGetDB( DB_SLAVE );
	/*$result = $dbr->select( 'categorylinks', 'cl_sortkey',
			array('cl_to'=>'Person',
			'cl_sortkey'=>str_replace('_',' ',$person_key)),
			__METHOD__,
			array('LIMIT'=>'1'));*/
	list( $fname, $lname ) = explode( '_', $person_key );
	// check for wiki title before checking first /last
	print "check pkey: $person_key\n";
	$pTitle = Title::newFromText( $person_key );
	if ( $pTitle->exists() ) {
		print $person_key . " valid\n";
		$mv_valid_people_cache[$person_key] = true;
	}

	$firstok = $lastok = false;
	$sql = 'SELECT `subject_title` FROM `smw_attributes` WHERE `attribute_title` = \'First_Name\' AND `value_xsd` LIKE \'%' . $fname . '%\'';
	// print $sql;
	$result = $dbr->query( $sql );
	if ( $dbr->numRows( $result ) != 0 ) {
		$firstok = true;
		$frow = $dbr->fetchObject( $result );
		$result = $dbr->query( "SELECT `subject_title` FROM `smw_attributes`
 WHERE `attribute_title` = 'Last_Name'
 AND `subject_title`='$frow->subject_title'
 AND `value_xsd`='{$lname}'" );
		if ( $dbr->numRows( $result ) != 0 )$lastok = true;
	}

	if ( $firstok && $lastok ) {
		print $person_key . " valid\n";
		$mv_valid_people_cache[$person_key] = true;
	} else {
		print $person_key . " not valid\n";
		$mv_valid_people_cache[$person_key] = false;
	}
	return $mv_valid_people_cache[$person_key];
}
function append_to_wiki_page( $title, $append_text, $unique = true ) {
	if ( $title->exists() ) {
		$article = new Article( $title );
		$cur_text = $article->getContent();
		if ( $unique ) {
			if ( strpos( $cur_text, $append_text ) !== false ) {
				print "no insert $append_text already present\n";
				return;
			}
		}
		$cur_text .= "\n\n" . $append_text;
		// do the edit:
		$sum_txt = 'metavid append';
		$article->doEdit( $cur_text, $sum_txt , EDIT_FORCE_BOT);
		print "did append on " . $title->getDBkey() . "\n";
	} else {
		print "append request to empty page... creating\n";
		do_update_wiki_page( $title, $append_text );
	}
}
function do_update_wiki_page( $title, $wikiText, $ns = null, $forceUpdate = false ) {
	global $botUserName;
	if ( !is_object( $title ) ) {
		// get the title and make sure the first letter is uper case
		$title = Title::makeTitle( $ns, ucfirst( $title ) );
	}

	if ( trim( $title->getDBkey() ) == '' ) {
		print "empty title (no insert /update) \n";
		return ;
	}
	// print "INSERT BODY: ".$wikiText;
	// make sure the text is utf8 encoded:
	$wikiText = utf8_encode( $wikiText );

	$article = new Article( $title );
	if ( !mvDoMvPage( $title, $article, false ) ) {
		print "bad title: " . $title->getNsText() . ':' . $title->getDBkey() . " no edit";
		if ( $title->exists() ) {
			print "remove article";
			$article->doDeleteArticle( 'bad title' );
		}
		// some how mvdIndex and mvd pages got out of sync do a separate check for the mvd:
		if ( MV_Index::getMVDbyTitle( $title->getDBkey() ) != null ) {
			print ', rm mvd';
			MV_Index::remove_by_wiki_title( $title->getDBkey() );
		}
		print "\n";
		return ;
	}
	if ( $title->getNamespace() == MV_NS_MVD && MV_Index::getMVDbyTitle( $title->getDBkey() ) == null ) {
		// print "missing assoc mvd ...update \n";
	} else {
		if ( $title->exists() ) {
			// if last edit!=mvBot skip (don't overwite peoples improvments')
			$rev = & Revision::newFromTitle( $title );
			if ( $botUserName != $rev->getRawUserText() && !$forceUpdate ) {
				print ' skiped page ' . $title->getNsText() . ':' . $title->getText() . ' edited by user:' . $rev->getRawUserText() . " != $botUserName \n";
				return ;
			}
			// proc article:
			$cur_text = $article->getContent();
			// if its a redirect skip
			if ( substr( $cur_text, 0, strlen( '#REDIRECT' ) ) == '#REDIRECT' && !$forceUpdate ) {
				print ' skiped page moved by user:' . $rev->getRawUserText() . "\n";
				return ;
			}
			// check if text is identical:
			if ( trim( $cur_text ) == trim( $wikiText ) ) {
				print "text " . $title->getNsText() . ':' . $title->getText() . " is identical (no update)\n";
				// if force update double check the mvd for consistancy?
				return ;
			}

		}
	}
	// got here do the edit:
	$sum_txt = 'metavid bot insert';

	$article->doEdit( $wikiText, $sum_txt, EDIT_FORCE_BOT );
	print "did edit on " . $wgTitle->getNsText() . ':' . $wgTitle->getDBkey() . "\n";
	// die;
}
function islower( $i ) { return ( strtolower( $i ) === $i ); }
function text_number( $n )
{
    # Array holding the teen numbers. If the last 2 numbers of $n are in this array, then we'll add 'th' to the end of $n
    $teen_array = array( 11, 12, 13, 14, 15, 16, 17, 18, 19 );

    # Array holding all the single digit numbers. If the last number of $n, or if $n itself, is a key in this array, then we'll add that key's value to the end of $n
    $single_array = array( 1 => 'st', 2 => 'nd', 3 => 'rd', 4 => 'th', 5 => 'th', 6 => 'th', 7 => 'th', 8 => 'th', 9 => 'th', 0 => 'th' );

    # Store the last 2 digits of $n in order to check if it's a teen number.
    $if_teen = substr( $n, - 2, 2 );

    # Store the last digit of $n in order to check if it's a teen number. If $n is a single digit, $single will simply equal $n.
    $single = substr( $n, - 1, 1 );

    # If $if_teen is in array $teen_array, store $n with 'th' concantenated onto the end of it into $new_n
    if ( in_array( $if_teen, $teen_array ) )
    {
        $new_n = $n . 'th';
    }
    # $n is not a teen, so concant the appropriate value of it's $single_array key onto the end of $n and save it into $new_n
    elseif ( $single_array[$single] )
    {
        $new_n = $n . $single_array[$single];
    }

    # Return new
    return $new_n;
}
 function url_exists( $url ) {
    $url = str_replace( "http://", "", $url );
    if ( strstr( $url, "/" ) ) {
        $url = explode( "/", $url, 2 );
        $url[1] = "/" . $url[1];
    } else {
        $url = array( $url, "/" );
    }

    $fh = fsockopen( $url[0], 80 );
    if ( $fh ) {
        fputs( $fh, "GET " . $url[1] . " HTTP/1.1\nHost:" . $url[0] . "\n\n" );
        if ( fread( $fh, 22 ) == "HTTP/1.1 404 Not Found" ) { return FALSE; }
        else { return TRUE;    }

    } else { return FALSE; }
}
