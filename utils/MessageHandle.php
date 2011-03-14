<?php

/**
 * Class for pointing to messages, like Title class is for titles.
 * @since 2011-03-13
 */
class MessageHandle {
	/// @var Title
	protected $title = null;
	/// @var String
	protected $key = null;
	/// @var String
	protected $code = null;
	/// @var String
	protected $groupIds = null;
	/// @var MessageGroup
	protected $group = false;

	public function __construct( Title $title ) {
		$this->title = $title;
	}

	/**
	 * Check if a title is in a message namespace.
	 * @param $title Title
	 * @return \bool If title is in a message namespace.
	 */
	public function isMessageNamespace() {
		global $wgTranslateMessageNamespaces;
		$namespace = $this->getTitle()->getNamespace();
		return in_array( $namespace, $wgTranslateMessageNamespaces );
	}

	/**
	 * @return Array of the message and the language
	 */
	public function figureMessage() {
		if ( $this->key === null ) {
			$text = $this->getTitle()->getDBkey();
			$pos = strrpos( $text, '/' );

			if ( $pos === false ) {
				$this->code = '';
				$this->key = $text;
			} else {
				$this->code = substr( $text, $pos + 1 );
				$this->key = substr( $text, 0, $pos );
			}
		}
		return array( $this->key, $this->code );
	}

	public function getKey() {
		$this->figureMessage();
		return $this->key;
	}

	public function getCode() {
		$this->figureMessage();
		return $this->code;
	}

	public function getGroupIds() {
		if ( $this->groupIds === null ) {
			$this->groupIds = TranslateUtils::messageKeyToGroups( $this->getTitle()->getNamespace(), $this->getKey() );
		}
		return $this->groupIds;
	}

	public function getGroup() {
		$ids = $this->getGroupIds();
		return MessageGroups::getGroup( $ids[0] );
	}

	public function exists() {
		return $this->isMessageNamespace() && $this->getGroupIds();
	}

	public function getTitle() {
		return $this->title;
	}

}
