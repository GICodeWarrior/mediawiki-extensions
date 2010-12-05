<?php

/**
 * DSMW Special page
 *
 * @copyright INRIA-LORIA-ECOO project
 * 
 * @author  jean-Philippe Muller
 */

class DSMWAdmin extends SpecialPage {

    public function __construct() {
        global $wgHooks, $wgSpecialPages, $wgWatchingMessages;
        
        # Add all our needed hooks
        $wgHooks['SkinTemplateTabs'][] = $this;
        
        parent::__construct( 'DSMWAdmin' );
    }

    public function getDescription() {
        return wfMsg( 'dsmw-special-settings' );
    }

    /**
     * Executed when the user opens the DSMW administration special page
     * Calculates the PushFeed list and the pullfeed list (and everything that
     * is displayed on the psecial page
     *
     * @global <Object> $wgOut Output page instance
     * @global <String> $wgServerName
     * @global <String> $wgScriptPath
     * @return <bool>
     */
    public function execute() {
        global $wgOut, $wgRequest, $wgServerName, $wgScriptPath, $wgDSMWIP, $wgServerName, $wgScriptPath;
        
		/**** Get status of refresh job, if any ****/
        $dbr =& wfGetDB( DB_SLAVE );
        $row = $dbr->selectRow( 'job', '*', array( 'job_cmd' => 'DSMWUpdateJob' ), __METHOD__ );
        if ( $row !== false ) { // similar to Job::pop_type, but without deleting the job
            $title = Title::makeTitleSafe( $row->job_namespace, $row->job_title );
            $updatejob = Job::factory( $row->job_cmd, $title, Job::extractBlob( $row->job_params ), $row->job_id );
        } else {
            $updatejob = NULL;
        }
        $row1 = $dbr->selectRow( 'job', '*', array( 'job_cmd' => 'DSMWPropertyTypeJob' ), __METHOD__ );
        if ( $row1 !== false ) { // similar to Job::pop_type, but without deleting the job
            $title = Title::makeTitleSafe( $row1->job_namespace, $row1->job_title );
            $propertiesjob = Job::factory( $row1->job_cmd, $title, Job::extractBlob( $row1->job_params ), $row1->job_id );
        } else {
            $propertiesjob = NULL;
        }
            /**** Execute actions if any ****/

        $action = $wgRequest->getText( 'action' );

        if ( $action == 'logootize' ) {


            if ( $updatejob === NULL ) { // careful, there might be race conditions here
                $title = Title::makeTitle( NS_SPECIAL, 'DSMWAdmin' );
                $newjob = new DSMWUpdateJob( $title );
                $newjob->insert();
                $wgOut->addHTML( '<p><font color="red"><b>Articles update process started.</b></font></p>' );
            } else {
                $wgOut->addHTML( '<p><font color="red"><b>Articles update process is already running.</b></font></p>' );
            }

        }

        elseif ( $action == 'addProperties' ) {
            if ( $propertiesjob === NULL ) {
                $title1 = Title::makeTitle( NS_SPECIAL, 'DSMWAdmin' );
                $newjob1 = new DSMWPropertyTypeJob( $title1 );
                $newjob1->insert();
                $wgOut->addHTML( '<p><font color="red"><b>Properties type update process started.</b></font></p>' );
            } else {
                $wgOut->addHTML( '<p><font color="red"><b>Properties type update process is already running.</b></font></p>' );
            }
        }
        elseif ( $action == 'updatetables' ) {

				$wgOut->disable(); // raw output
				ob_start();
				print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"  \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\" dir=\"ltr\">\n<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /><title>Setting up Storage for Distributed Semantic MediaWiki</title></head><body><p><pre>";
				header( "Content-type: text/html; charset=UTF-8" );
                                $db =& wfGetDB( DB_MASTER );
				$result = DSMWDBHelpers::setup( $db );
				print '</pre></p>';
				if ( $result === true ) {
					print '<p><b>The database was set up successfully.</b></p>';
				}
				$returntitle = Title::makeTitle( NS_SPECIAL, 'DSMWAdmin' );
				print '<p> <a href="' . htmlspecialchars( $returntitle->getFullURL() ) . '">Special:DSMWAdmin</a></p>';
				print '</body></html>';
				ob_flush();
				flush();
				return;

		}

        $wgOut->setPagetitle( "DSMW Settings" );

        $wgOut->addHTML(
        	Html::element(
        		'p',
        		array(),
        		wfMsg( 'dsmw-special-admin-intro' )
        	)
        );
        
        $wgOut->addHTML(
        	Html::rawElement(
        		'form',
        		array( 'name' => 'properties', 'action' => '', 'method' => 'POST' ),
        		Html::hidden( 'action', 'addProperties' ) . '<br />' .
        		Html::element(
        			'h2',
        			array(),
        			wfMsg( 'dsmw-special-admin-propheader' )
        		) .
        		Html::element(
        			'p',
        			array(),
        			wfMsg( 'dsmw-special-admin-proptext' )
        		) . 
        		Html::input(
        			'updateProperties',
        			wfMsg( 'dsmw-special-admin-propheader' ),
        			'submit'
        		)
        	)
        );
        
        $wgOut->addHTML(
        	Html::rawElement(
        		'form',
        		array( 'name' => 'logoot', 'action' => '', 'method' => 'POST' ),
        		Html::hidden( 'action', 'logootize' ) . '<br />' .
        		Html::element(
        			'h2',
        			array(),
        			wfMsg( 'dsmw-special-admin-upheader' )
        		) .
        		Html::element(
        			'p',
        			array(),
        			wfMsg( 'dsmw-special-admin-uptext' )
        		) . 
        		Html::input(
        			'updateArticles',
        			wfMsg( 'dsmw-special-admin-upbutton' ),
        			'submit'
        		)
        	)
        );        

        return false;
	}

}
