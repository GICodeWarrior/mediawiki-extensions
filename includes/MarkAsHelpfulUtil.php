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
					<span class='mah-helpful-marked-state'>
							$mahMarkedText
					</span>
					&nbsp;(<a class='markashelpful-undo'>$undoLinkText</a>)
				</div>
HTML;
			} else {
				if ( $isAbleToMark ) {
					$mahLinkText = wfMessage( 'mah-mark-text' )->escaped();
					return <<<HTML
					<div class="mw-mah-wrapper">
						<a class='mah-helpful-state markashelpful-mark'>
							$mahLinkText
						</a>
					</div>
HTML;
				}

			}
		}

	}

}
