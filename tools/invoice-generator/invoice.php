<?php

/**
 * Script to automatically generate invoices and send them to pesky 
 * administrators once per month, thus leaving programmers to be engrossed 
 * in their work on a continuous basis.
 *
 * TODO: have it also pay my tax and cook my food
 */

if ( php_sapi_name() != 'cli' ) exit;

class Invoice {
	var $conf;

	function __construct() {
		include( dirname(__FILE__) . '/conf.php' );
		$_vars = get_defined_vars();
		$this->conf = (object)array();
		foreach ( $_vars as $name => $value ) {
			if ( $name[0] == '_' ) {
				continue;
			}
			$this->conf->$name = $value;
		}
	}

	function timeInMonths( $time ) {
		return idate('Y', $time) * 12 + idate( 'm', $time );
	}

	function addMonths( $time, $months ) {
		return strtotime( "+$months month", $time );
	}

	function formatDate( $time ) {
		return date( $this->conf->dateFormat, $time );
	}

	function generateInvoice( $num ) {
		$epochStart = strtotime( $this->conf->epochStart );
		$periodStart = $this->addMonths( $epochStart, $num - 1 );
		$periodEnd = strtotime( "-1 day", $this->addMonths( $periodStart, 1 ) );
		$replacements = array(
			'$periodStart' => $this->formatDate( $periodStart ),
			'$periodEnd' => $this->formatDate( $periodEnd ),
		);
		$encItems = array();
		foreach ( $this->conf->items as $item ) {
			$encItem = array();
			foreach ( $item as $key => $value ) {
				$encItem[$key] =  htmlspecialchars( strtr( $value, $replacements ) );
			}
			$encItems[] = $encItem;
		}

		$tplData = array(
			'address' => nl2br( htmlspecialchars( $this->conf->address ) ),
			'phone' => htmlspecialchars( $this->conf->phone ),
			'soldTo' => nl2br( htmlspecialchars( $this->conf->soldTo ) ),
			'invoiceNumber' => htmlspecialchars( $num ),
			'date' => $this->formatDate( time() ),
			'items' => $encItems,
			'currency' => $this->conf->currency
		);
		return array(
			'text' => $this->runTemplate( 'invoice.tpl', $tplData ),
			'subject' => strtr( $this->conf->emailSubject, $replacements )
		);
	}

	function runTemplate( $name, $tplData ) {
		extract( $tplData );
		ob_start();
		include( dirname(__FILE__).'/'.$name );
		$result = ob_get_contents();
		ob_end_clean();
		return $result;
	}

	function getCurrentInvoiceNumber() {
		// Calculate number of months since epochStart
		$epochStart = strtotime( $this->conf->epochStart );
		return $this->timeInMonths( time() ) - $this->timeInMonths( $epochStart ) + 1;
	}

	function getLastSentInvoiceNumber() {
		if ( !file_exists( $this->conf->dataDirectory . '/last-sent' ) ) {
			return false;
		}
		$last = file_get_contents( $this->conf->dataDirectory . '/last-sent' );
		if ( $last && trim( $last ) ) {
			return intval( trim( $last ) );
		} else {
			return false;
		}
	}

	function setLastSentInvoiceNumber( $num ) {
		if ( empty( $this->conf->dataDirectory ) ) {
			return;
		}
		if ( !file_exists( $this->conf->dataDirectory ) ) {
			mkdir( $this->conf->dataDirectory );
		}
		file_put_contents( $this->conf->dataDirectory . '/last-sent', "$num\n" );
	}

	function mailInvoice( $num = false ) {
		$dedupe = false;
		if ( $num === false ) {
			$num = $this->getCurrentInvoiceNumber();
			if ( !empty( $this->conf->sendDayOfMonth ) && !empty( $this->conf->dataDirectory ) ) {
				$dedupe = true;
			}
		}

		if ( $dedupe ) {
			$last = $this->getLastSentInvoiceNumber();
			if ( $last == $num ) {
				$this->debugLog( "No invoice sent: same month as before\n" );
				return;
			}
			$dayOfMonth = idate( 'd' );
			if ( $dayOfMonth < $this->conf->sendDayOfMonth ) {
				$this->debugLog( "No invoice sent: not the specified day yet\n" );
				return;
			}
		}

		$invoice = $this->generateInvoice( $num );

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= "From: {$this->conf->emailFrom}\r\n";
		if ( $this->conf->bccTo ) {
			$headers .= "Bcc: {$this->conf->bccTo}\r\n";
		}
		if ( $this->conf->ccTo ) {
			$headers .= "Cc: {$this->conf->ccTo}\r\n";
		}

		$success = mail( $this->conf->emailTo, $invoice['subject'], $invoice['text'], $headers );

		if ( $dedupe && $success ) {
			echo "Invoice sent to {$this->conf->emailTo}\n";
			$this->setLastSentInvoiceNumber( $num );
		}
	}

	function debugLog( $str ) {
		#echo $str;
	}
}

$invoice = new Invoice;
#$num = isset( $_REQUEST['num'] ) ? intval( $_REQUEST['num'] ) : false;
$num = isset( $argv[1] ) ? intval( $argv[1] ) : false;
$invoice->mailInvoice( $num );
