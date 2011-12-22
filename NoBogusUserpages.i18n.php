<?php
 /**
 * NoBogusUserpages
 * @package NoBogusUserpages
 * @author Daniel Friesen (http://www.mediawiki.org/wiki/User:Dantman) <mediawiki@danielfriesen.name>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA
 */

$messages = array();

/** English
 * @author Dantman
 * @author SVG
 */
$messages['en'] = array(
	'nobogususerpages-desc' => 'Restricts creation of userpages for which a user does not exist',
	'badaccess-bogususerpage' => 'The user of this userpage does not exist. You do not have the rights to create a bogus userpage.',
	'right-createbogususerpage' => 'Create user pages for users who are not registered on this wiki',
);

/** Message documentation (Message documentation)
 * @author SVG
 */
$messages['qqq'] = array(
	'nobogususerpages-desc' => '{{desc}}',
	'badaccess-bogususerpage' => 'Error message: {{msg-mw|badaccess-bogususerpage}}',
	'right-createbogususerpage' => '{{doc-right|createbogususerpage}}',
);

