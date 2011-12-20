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
				$data = wfMessage( 'mah-someone-marked-text' )->params( $userList )->escape();
			}

			return <<<HTML
			<div id="markashelpful-$type-$item">
				$data
			</div>
HTML;
		} else {
			$userList = '';
			$userId = $user->getId();

			if ( isset( $helpfulUserList[$userId] ) ) {
				$data = wfMessage( 'mah-you-marked-text' )->escaped();
				$undo = wfMessage( 'mah-undo-mark-text' )->escaped();

				return <<<HTML
				<div id="markashelpful-$type-$item">
					$data | $undo
				</div>
HTML;
			} else {
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
