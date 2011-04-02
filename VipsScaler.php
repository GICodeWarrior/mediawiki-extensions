<?php
/**
 * Copyright © Bryan Tong Minh, 2011
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

$wgExtensionCredits['media'][] = array(
	'path' => __FILE__,
	'name' => 'VipsScaler',
	'author' => array( 'Bryan Tong Minh' ),
	'descriptionmsg' => 'vipsscaler-desc',
	'url' => 'http://www.mediawiki.org/wiki/VipsScaler',
);

$dir = dirname( __FILE__ );

$wgAutoloadClasses['VipsScaler'] = "$dir/VipsScaler_body.php";
$wgExtensionMessagesFiles['VipsScaler'] = "$dir/VipsScaler.i18n.php";

$wgHooks['BitmapHandlerTransform'][] = 'VipsScaler::onTransform';

# Download vips from http://www.vips.ecs.soton.ac.uk/
$wgVipsCommand = 'vips';

# Options and conditions for images to be scaled with this scaler
$wgVipsOptions = array(
	# Sharpen jpeg files which are shrunk more than 1.2
	array(
		'conditions' => array(
			'mimeType' => 'image/jpeg',
			'minShrinkFactor' => 1.2,
		),
		'sharpen' => true,
	),
	# Other jpeg files
	array(
		'conditions' => array(
			'mimeType' => 'image/jpeg',
		),
		'sharpen' => false,
		'bilinear' => true,
	),
	# Do a simple shrink for PNGs
	array(
		'conditions' => array(
			'mimeType' => 'image/png',
		),
	),	
);

