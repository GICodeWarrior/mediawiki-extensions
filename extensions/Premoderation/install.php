<?php
/*
 * Script for creating new database tables
 */

$dir = dirname( __FILE__ );
require_once ( $dir . '/../../maintenance/commandLine.inc' );

$dbw = wfGetDB( DB_MASTER );
$dbw->sourceFile( $dir . '/db_tables.sql' );