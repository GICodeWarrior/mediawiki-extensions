<?php
/**
 * Copyright (C) 2008 Brion Vibber <brion@pobox.com>
 * http://www.mediawiki.org/
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

$wgExtensionCredits['other'][] = array(
	'name' => 'TitleKey',
	'version' => '2008-01-30',
	'description' => 'Title prefix search suggestion backend',
	'author' => 'Brion Vibber'
);

// The 'SearchUpdate' hook would be right, but it's called in the
// wrong place and I don't want to rewrite it all just this second.

// Update hooks...
$wgHooks['ArticleDelete'        ][] = 'TitleKey::updateDeleteSetup';
$wgHooks['ArticleDeleteComplete'][] = 'TitleKey::updateDelete';
$wgHooks['ArticleInsertComplete'][] = 'TitleKey::updateInsert';
$wgHooks['ArticleUndelete'      ][] = 'TitleKey::updateUndelete';
$wgHooks['TitleMoveComplete'    ][] = 'TitleKey::updateMove';

// Maintenance hooks...
$wgHooks['ParserTestTables'          ][] = 'TitleKey::testTables';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'TitleKey::schemaUpdates';

// Search hooks...
$wgHooks['PrefixSearchBackend'][] = 'TitleKey::prefixSearchBackend';

$wgAutoloadClasses['TitleKey'] = dirname( __FILE__ ) . '/TitleKey_body.php';