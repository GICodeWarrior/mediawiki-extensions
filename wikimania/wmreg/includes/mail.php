<?php
function mail_msg( $to, $subject, $body )
{
	require_once "Mail.php";

	// this is partly over-ridden by Gmail SMTP
	$from = "Wikimania 2011 Registration <wikimania-registration@wikimedia.org>";
	$headers = array ( 'From' => $from,
	  	'To' => $to,
		'Subject' => $subject,
		'MIME-Version' => '1.0',
		'Content-type' => 'text/html; charset=utf-8',
		'Reply-To' => 'wikimania-registration@wikimedia.org',
		'X-Mailer' => 'PHP/' . phpversion()
	);
	$smtp = Mail::factory( 'mail' );
	$mail = $smtp->send( $to, $headers, $body );

	if ( PEAR::isError( $mail ) ) {
		echo( "<p>" . $mail->getMessage() . "</p>" );
		return false;
	} else {
		return true;
	}
}