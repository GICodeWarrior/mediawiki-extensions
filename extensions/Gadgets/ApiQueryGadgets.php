<?php
/**
 * Created on 15 April 2011
 * API for Gadgets extension
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

class ApiQueryGadgets extends ApiQueryBase {
	private $props,
		$category,
		$neededNames,
		$listAllowed,
		$listEnabled;

	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'ga' );
	}

	public function execute() {
		$params = $this->extractRequestParams();
		$this->props = array_flip( $params['prop'] );
		$this->categories = isset( $params['categories'] )
			? array_flip( $params['categories'] )
			: false;
		$this->neededNames = isset( $params['names'] )
			? array_flip( $params['names'] )
			: false;
		$this->listAllowed = isset( $params['allowedonly'] ) && $params['allowedonly'];
		$this->listEnabled = isset( $params['enabledonly'] ) && $params['enabledonly'];

		$this->getMain()->setCacheMode( $this->listAllowed || $this->listEnabled
			? 'anon-public-user-private' : 'public' );

		$this->applyList( $this->getList() );
	}

	private function getList() {
		$gadgets = Gadget::loadStructuredList();

		$result = array();
		foreach ( $gadgets as $category => $list ) {
			if ( $this->categories && !isset( $this->categories[$category] ) ) {
				continue;
			}
			foreach ( $list as $g ) {
				if ( $this->isNeeded( $g ) ) {
					$result[] = $g;
				}
			}
		}
		return $result;
	}

	private function applyList( $gadgets ) {
		$data = array();
		$result = $this->getResult();

		foreach ( $gadgets as $g ) {
			$row = array();
			if ( isset( $this->props['name'] ) ) {
				$row['name'] = $g->getName();
			}
			if ( isset( $this->props['metadata'] ) ) {
				$row['metadata'] = $this->fakeMetadata( $g );
				$this->setIndexedTagNameForMetadata( $row['metadata'] );
			}
			if ( isset( $this->props['desc'] ) ) {
				$row['desc'] = $g->getDescription();
			}
			$data[] = $row;
		}
		$result->setIndexedTagName( $data, 'gadget' );
		$result->addValue( 'query', $this->getModuleName(), $data );
	}

	/**
	 * 
	 */
	private function isNeeded( Gadget $gadget ) {
		global $wgUser;

		return ( $this->neededNames === false || isset( $this->neededNames[$gadget->getName()] ) )
			&& ( !$this->listAllowed || $gadget->isAllowed( $wgUser ) )
			&& ( !$this->listEnabled || $gadget->isEnabled( $wgUser ) );
	}
	
	private function fakeMetadata( Gadget $g ) {
		return array(
			'settings' => array(
				'rights' => $g->getRequiredRights(),
				'default' => $g->isOnByDefault(),
				'hidden' => false, // Only exists in RL2 branch
				'shared' => false, // Only exists in RL2 branch
				'category' => $g->getCategory(),
			),
			'module' => array(
				'scripts' => $g->getScripts(),
				'styles' => $g->getStyles(),
				'dependencies' => $g->getDependencies(),
				'messages' => array(), // Only exists in RL2 branch
			)
		);
	}

	private function setIndexedTagNameForMetadata( &$metadata ) {
		static $tagNames = array(
			'rights' => 'right',
			'scripts' => 'script',
			'styles' => 'style',
			'dependencies' => 'dependency',
			'messages' => 'message',
		);
		
		$result = $this->getResult();
		foreach ( $metadata as $type => &$data ) {
			foreach ( $data as $key => &$value ) {
				if ( is_array( $value ) ) {
					$tag = isset( $tagNames[$key] ) ? $tagNames[$key] : $key;
					$result->setIndexedTagName( $value, $tag );
				}
			}
		}
	}

	public function getAllowedParams() {
		return array(
			'prop' => array(
				ApiBase::PARAM_DFLT => 'name|metadata',
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => array(
					'name',
					'metadata',
					'desc',
				),
			),
			'language' => null,
			'categories' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => 'string',
			),
			'names' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_ISMULTI => true,
			),
			'allowedonly' => false,
			'enabledonly' => false,
		);
	}

	public function getDescription() {
		return 'Returns a list of gadgets used on this wiki';
	}

	public function getParamDescription() {
		$p = $this->getModulePrefix();
		return array(
			'prop' => array(
				'What gadget information to get:',
				' name           - Internal gadget name',
				' metadata       - The gadget metadata',
				' desc           - Gadget description transformed into HTML (can be slow, use only if really needed)',
			),
			'categories' => 'Gadgets from what categories to retrieve',
			'names' => 'Name(s) of gadgets to retrieve',
			'allowedonly' => 'List only gadgets allowed to current user',
			'enabledonly' => 'List only gadgets enabled by current user',
		);
	}

	public function getExamples() {
		$params = $this->getAllowedParams();
		$allProps = implode( '|', $params['prop'][ApiBase::PARAM_TYPE] );
		return array(
			'Get a list of gadgets along with their descriptions:',
			'    api.php?action=query&list=gadgets&gaprop=name|desc',
			'Get a list of gadgets with all possble properties:',
			"    api.php?action=query&list=gadgets&gaprop=$allProps",
			'Get a list of gadgets belonging to caregory "foo":',
			'    api.php?action=query&list=gadgets&gacategories=foo',
			'Get information about gadgets named "foo" and "bar":',
			'    api.php?action=query&list=gadgets&ganames=foo|bar&gaprop=name|desc|metadata',
			'Get a list of gadgets enabled by current user:',
			'    api.php?action=query&list=gadgets&gaenabledonly',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

}
