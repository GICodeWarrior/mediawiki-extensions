<?php

class ShowProcesslistPage extends UnlistedSpecialPage {
	function ShowProcesslistPage() {
		UnlistedSpecialPage::UnlistedSpecialPage('ShowProcesslist');
	}

	function execute( $par ) {
		global $wgOut, $wgUser;
		
		$this->setHeaders();
		if ( !$wgUser->isDeveloper() ) {
			$wgOut->addWikiText( 'You\'re not allowed, go away' );
			return;
		}

		$res = wfQuery( 'SHOW FULL PROCESSLIST' , DB_READ );
		$output = array();
		$output = '<table border="1" cellspacing="0">'."\n";
		$output .= '<tr><th>Id</th><th>User</th><th>Host</th><th>db</th><th>Command</th><th>Time</th><th>State</th><th>Info</th>'."\n";
		while ( $row = wfFetchObject($res) ) {
			$output .= '<tr>';
			$fields = get_object_vars($row);
			foreach ($fields as $value ) {
				$output .= '<td>' . htmlspecialchars( $value ) . '</td>';
			}
			$output .= "</tr>\n";
		}
		$output .= '</table>';
		$wgOut->addHTML( $output );
	}
}

?>
