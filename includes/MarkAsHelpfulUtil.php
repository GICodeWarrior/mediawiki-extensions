<?php

class MarkAsHelpfulUtil {

	public static function getMarkAsHelpfulTemplate( $user, $isAbleToMark, $helpfulUserList, $type, $item ) {
		if ( $user->isAnon() ) {

			$userList = '';

			foreach ( $helpfulUserList as $val ) {
				$userList .= $val['user_name'] . ' ';
			}

			$data = '';

			if ( $userList ) {
				$data = wfMessage( 'mah-someone-marked-text' )->params( $userList )->escaped();
			}

			return <<<HTML
			<div class="mw-mah-wrapper">
				$data
			</div>
HTML;
		} else {
			$userList = '';
			$userId = $user->getId();

			if ( isset( $helpfulUserList[$userId] ) ) {
				$mahMarkedText = wfMessage( 'mah-you-marked-text' )->escaped();
				$undoLinkText = wfMessage( 'mah-undo-mark-text' )->escaped();

				return <<<HTML
				<div class="mw-mah-wrapper">
					<a class='mah-helpful-state'><div class='.mah-helpful-marked-icon'></div>$mahMarkedText</a> ($undoLinkText)
				</div>
HTML;
			} else {
				if ( $isAbleToMark ) {
					$mahLinkText = wfMessage( 'mah-mark-text' )->escaped();
					return <<<HTML
					<div class="mw-mah-wrapper">
						<a class='mah-helpful-state'><div class='.mah-helpful-icon'></div>$mahLinkText</a>
					</div>
HTML;
				}

			}
		}

	}

}
