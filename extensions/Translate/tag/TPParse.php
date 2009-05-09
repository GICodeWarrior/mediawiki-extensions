<?php
/**
 * This class represents the results of parsed source page, that is, the
 * extracted sections and a template.
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2009 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
class TPParse {
	protected $title = null;

	public $sections   = array();
	public $template   = null;
	public $dbSections = null;

	public function __construct( Title $title ) {
		$this->title = $title;
	}

	public function countSections() {
		return count($this->sections);
	}

	public function getTemplate() {
		return $this->template;
	}

	public function getSectionsForSave() {
		$this->loadFromDatabase();

		$sections = $this->sections;
		$highest = 0;
		if ( count($this->dbSections) ) {
			$highest = call_user_func_array( 'max', array_keys( $this->dbSections ) );
		}

		foreach ( $sections as $_ ) $highest = max( $_->id, $highest );
		foreach ( $sections as $s ) {
			$s->type = 'old';

			if ( $s->id === -1 ) {
				$s->type = 'new';
				$s->id = ++$highest;
			} else {
				if ( isset($this->dbSections[$s->id]) ) {
					$storedText = $this->dbSections[$s->id]->text;
					if ( $s->text !== $storedText ) {
						$s->type = 'changed';
						$s->oldtext = $storedText;
					}
				}
			}

		}
		return $sections;
	}

	public function getDeletedSections() {
		$sections = $this->getSectionsForSave();

		$deleted = $this->dbSections;
		foreach ( $sections as $s ) {
			if ( isset($deleted[$s->id]) )
				unset($deleted[$s->id]);
		}
		return $deleted;
	}

	protected function loadFromDatabase() {
		if ( $this->dbSections !== null ) return;

		$this->dbSections = array();

		$db = wfGetDB( DB_SLAVE );
		$tables = 'translate_sections';
		$vars = array( 'trs_key', 'trs_text' );
		$conds = array( 'trs_page' => $this->title->getArticleID() );

		$res = $db->select( $tables, $vars, $conds, __METHOD__ );
		foreach ( $res as $r ) {
			$section = new TPsection;
			$section->id = $r->trs_key;
			$section->text = $r->trs_text;
			$section->type = 'db';
			$this->dbSections[$r->trs_key] = $section;
		}
	}

	public function getSourcePageText() {
		$text = $this->template;
		foreach ( $this->sections as $ph => $s ) {
			$text = str_replace( $ph, $s->getMarkedText(), $text );
		}
		return $text;
	}

	public function getTranslationPageText( MessageCollection $collection ) {
		$text = $this->template; // The source

		// For finding the messages
		$prefix = $prefix = $this->title->getPrefixedText() . '/';

		foreach ( $this->sections as $ph => $s ) {
			if ( isset($collection[$prefix.$s->id]) ) {
				$msg = $collection[$prefix.$s->id];
				if ( $msg->translation() === null ) {
					// Just use 
					$text = str_replace( $ph, $s->getTextForTrans(), $text );
				} else {
					$sectiontext = $msg->translation();
					$vars = $s->getVariables();
					foreach ( $vars as $key => $value ) {
						$sectiontext = str_replace( $key, $value, $sectiontext );
					}
					if ( $msg->fuzzy() ) {
						$sectiontext = "<div class=\"mw-translate-fuzzy\">$\n$sectiontext\n</div>";
					}
					$text = str_replace( $ph, $sectiontext, $text );
				}
			} else {
				$text = str_replace( $ph, $s->getTextForTrans(), $text );
			}
		}
		return $text;
	}
}