<?php

class MarkAsHelpfulUtil {

	
	public static function getMarkAsHelpfulTemplate( $User, $isAbleToMark, $HelpfulUserList, $type, $item ) {
		
		
		
		if ( $User->isAnon() ) {
			
			$userList = '';
		
			foreach ( $HelpfulUserList AS $val ) {
				$userList .= $val['user_name'] . ' ';	
			}
			
			$data = '';
			
			if ( $userList ) {
				
				$data = wfMessage( 'mah-someone-marked-text' )->params( $userList )->escape();
				
			}

			return <<<HTML
			<div id="markashelpful-$type-$item">
				$data
			</div>
HTML;

		}
		else {
			
			$userList = '';
			$userId = $User->getId();
			if ( isset( $HelpfulUserList[$userId] ) ) {
				
				$data = wfMessage( 'mah-you-marked-text' )->escaped();
				$undo = wfMessage( 'mah-undo-mark-text' )->escaped();
		
				return <<<HTML
				<div id="markashelpful-$type-$item">
					$data | $undo
				</div>
HTML;
			}
			else {
				if ( $isAbleToMark ) {
					$linkText = wfMessage( 'mah-mark-text' )->escaped();
					return <<<HTML
					<div id="markashelpful-$type-$item">
					$linkText
					</div>
HTML;
				}
				
			}
			
		}
		
		
	}
	
	
}
