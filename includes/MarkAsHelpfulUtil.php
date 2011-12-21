<?php

/**
 * Utility class for Mark As Helpful
 */
class MarkAsHelpfulUtil {

	public static function getMarkAsHelpfulTemplate( $user, $isAbleToMark, $helpfulUserList, $type, $item ) {
		
		if ( $user->isAnon() ) {
			$html = self::otherMarkedTemplate( $helpfulUserList );
		} else {
			$userId = $user->getId();

			if ( isset( $helpfulUserList[$userId] ) ) {
				$html = self::ownerMarkedTemplate();
			} else {
				if ( $isAbleToMark ) {
					$html = self::requestToMarkTemplate();
				}
				else {
					$html = self::otherMarkedTemplate( $helpfulUserList );
				}

			}
		}

		return $html;
		
	}
	
	private static function otherMarkedTemplate( $helpfulUserList ) {
		if ( count( $helpfulUserList ) == 0 ) {
			return '';
		}

		$userList = '';

		foreach ( $helpfulUserList as $val ) {
			$userList .= $val['user_name'] . ' ';
		}

		$data = '';

		if ( $userList ) {
			$data = wfMessage( 'mah-someone-marked-text' )->params( $userList )->escaped();
		}

		return <<<HTML
			<div class='mw-mah-wrapper'>
				<span class='mah-helpful-marked-state'>
					$data
				</span>
			</div>
HTML;
	}
	
	private static function ownerMarkedTemplate() {
		$mahMarkedText = wfMessage( 'mah-you-marked-text' )->escaped();
		$undoLinkText = wfMessage( 'mah-undo-mark-text' )->escaped();

		return <<<HTML
			<div class='mw-mah-wrapper'>
				<span class='mah-helpful-marked-state'>
					$mahMarkedText
				</span>
				&nbsp;(<a class='markashelpful-undo'>$undoLinkText</a>)
			</div>
HTML;
	}

	private static function requestToMarkTemplate() {
		$mahLinkText = wfMessage( 'mah-mark-text' )->escaped();
		return <<<HTML
			<div class='mw-mah-wrapper'>
				<a class='mah-helpful-state markashelpful-mark'>
					$mahLinkText
				</a>
			</div>
HTML;
	}
	
}
