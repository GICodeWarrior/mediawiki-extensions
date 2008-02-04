<?php
 /**
  *
  * Copyright (C) 2007 Martin Seidel (Xarax) <jodeldi@gmx.de>
  *
  * Inspired by djvuhandler from Tim Starling
  * Modified and written by Xarax
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
  *
  */

class PdfHandler extends ImageHandler {

	function isEnabled() {
		global $wgPdfProcessor;
		global $wgPdfPostProcessor;
		global $wgPdfInfo;

		if ( !isset( $wgPdfProcessor ) || !isset( $wgPdfPostProcessor) || !isset( $wgPdfInfo ) ) {
			wfDebug( "PdfHandler is disabled, please set the following\n" );
			wfDebug( "variables in LocalSettings.php:\n" );
			wfDebug( "\$wgPdfProcessor, \$wgPdfPostProcessor, \$wgPdfInfo\n" );
			return false;
		}
		return true;
	}

	function mustRender() { return true; }

	function isMultiPage() { return true; }

	function validateParam( $name, $value ) {
		if ( in_array( $name, array( 'width', 'height', 'page' ) ) )
			return ( $value <= 0 ) ? false : true;
		else
			return false;
	}

	function makeParamString( $params ) {
		$page = isset( $params['page'] ) ? $params['page'] : 1;
		if ( !isset( $params['width'] ) ) return false;
		return "page{$page}-{$params['width']}px";
	}

	function parseParamString( $str ) {
		$m = false;

		if ( preg_match( '/^page(\d+)-(\d+)px$/', $str, $m ) )
			return array( 'width' => $m[2], 'page' => $m[1] );

		return false;
	}

	function getScriptParams( $params ) {
		return array(
			'width' => $params['width'],
			'page' => $params['page'],
		);
	}

	function getParamMap() {
		return array(
			'img_width' => 'width',
			'img_page' => 'page',
		);
	}

	function doTransform( $image, $dstPath, $dstUrl, $params, $flags = 0 ) {
		global $wgPdfProcessor;
	        global $wgPdfPostProcessor;
		global $wgPdfHandlerDpi;

		wfLoadExtensionMessages( 'PdfHandler' );

		$xml = $image->getMetadata();

		if ( !$xml )
			return new MediaTransformError( 'thumbnail_error',
							@$params['width'],
							@$params['height'],
							wfMsg( 'pdf_no_xml' ) );

		if ( !$this->normaliseParams( $image, $params ) )
			return new TransformParameterError( $params );

		$width = $params['width'];
		$height = $params['height'];
		$srcPath = $image->getPath();
		$page = $params['page'];

		if ( $page > $this->pageCount( $image ) )
			return new MediaTransformError( 'thumbnail_error',
							$width,
							$height,
							wfMsg( 'pdf_page_error' ) );

		if ( $flags & self::TRANSFORM_LATER )
			return new ThumbnailImage( $image, $dstUrl, $width,
						   $height, $dstPath, $page );

		if ( !wfMkdirParents( dirname( $dstPath ) ) )
			return new MediaTransformError( 'thumbnail_error',
							$width,
							$height,
							wfMsg( 'thumbnail_dest_directory' ) );

		$cmd = '(' . wfEscapeShellArg( $wgPdfProcessor );
		$cmd .= " -sDEVICE=jpeg -sOutputFile=- -dFirstPage={$page} -dLastPage={$page}";
		$cmd .= " -r{$wgPdfHandlerDpi} -dBATCH -dNOPAUSE -q ". wfEscapeShellArg( $srcPath );
		$cmd .= " | " . wfEscapeShellArg( $wgPdfPostProcessor );
		$cmd .= " -depth 8 -resize {$width} - ";
		$cmd .= wfEscapeShellArg( $dstPath ) . ")";

		wfProfileIn( 'PdfHandler' );
		wfDebug( __METHOD__.": $cmd\n" );
		$err = wfShellExec( $cmd, $retval );
		wfProfileOut( 'PdfHandler' );

		$removed = $this->removeBadFile( $dstPath, $retval );

		if ( $retval != 0 || $removed ) {
			wfDebugLog( 'thumbnail',
				sprintf( 'thumbnail failed on %s: error %d "%s" from "%s"',
				wfHostname(), $retval, trim($err), $cmd ) );
			return new MediaTransformError( 'thumbnail_error', $width, $height, $err );
		} else {
			return new ThumbnailImage( $image, $dstUrl, $width, $height, $dstPath, $page );
		}
	}

	function getPdfImage( $image, $path ) {
		if ( !$image )
			$pdfimg = new PdfImage( $path );
		elseif ( !isset( $image->pdfImage ) )
			$pdfimg = $image->pdfImage = new PdfImage( $path );
		else
			$pdfimg = $image->pdfImage;

		return $pdfimg;
	}

	function getMetaTree( $image ) {
		if ( isset( $image->pdfMetaTree ) )
			return $image->pdfMetaTree;

		$metadata = $image->getMetadata();

		if ( !$this->isMetadataValid( $image, $metadata ) ) {
			wfDebug( "Pdf XML metadata is invalid or missing, should have been fixed in upgradeRow\n" );
			return false;
		}

		wfProfileIn( __METHOD__ );
		wfSuppressWarnings();

		try {
			$image->pdfMetaTree = new SimpleXMLElement( $metadata );
		} catch( Exception $e ) {
			$image->pdfMetaTree = false;
		}

		wfRestoreWarnings();
		wfProfileOut( __METHOD__ );

		return $image->pdfMetaTree;
	}

	function getImageSize( $image, $path ) {
		return $this->getPdfImage( $image, $path )->getImageSize();
	}

	function getThumbType( $ext, $mime ) {
		global $wgPdfOutputExtension;
		static $mime;

		if ( !isset( $mime ) ) {
			$magic = MimeMagic::singleton();
			$mime = $magic->guessTypesForExtension( $wgPdfOutputExtension );
		}
		return array( $wgPdfOutputExtension, $mime );
	}

	function getMetadata( $image, $path ) {
		return $this->getPdfImage( $image, $path )->retrieveMetaData();
	}

	function isMetadataValid( $image, $metadata ) {
		return !empty( $metadata ) && $metadata != serialize(array());
	}

	function pageCount( $image ) {
		$tree = $this->getMetaTree( $image );
		if ( !$tree ) return false;
		return intval( $tree->BODY[0]->Pages );
	}

	function getPageDimensions( $image, $page ) {
		global $wgPdfHandlerDpi;

		$tree = $this->getMetaTree( $image );

		if ( $tree ) {
			$o = $tree->BODY[0]->Pagesize;

			if ( $o ) {
				$size = explode( "x", $o, 2 );

				if ( $size ) {
					$width  = intval( trim( $size[0] ) / 72 * $wgPdfHandlerDpi );
					$height = explode( " ", trim( $size[1] ), 2 );
					$height = intval( trim( $height[0] ) / 72 * $wgPdfHandlerDpi );

					return array(
						'width' => $width,
						'height' => $height
					);
				}
			}
		}
		return false;
	}
}
