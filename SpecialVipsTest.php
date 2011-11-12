<?php
/*
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
 *
 * @file
 */

/**
 * A Special page intended to test the Vipscaler.
 * @author Bryan Tong Minh
 */
class SpecialVipsTest extends SpecialPage {
	public function __construct() {
		parent::__construct( 'VipsTest', 'vipsscaler-test' );
	}

	/**
	 * Entry point
	 * @param $par Array TODO describe what is expected there
	 */
	public function execute( $par ) {
		$request = $this->getRequest();
		$this->setHeaders();

		if( !$this->userCanExecute( $this->getUser() ) ) {
			$this->displayRestrictionError();
			return;
		}

		if ( $request->getText( 'thumb' ) ) {
			$this->streamThumbnail();
		} else {
			$this->showForm();
		}
	}

	/**
	 */
	protected function showThumbnails() {
		$request = $this->getRequest();

		# Check if valid file was provided
		$title = Title::makeTitleSafe( NS_FILE, $request->getText( 'file' ) );
		if ( is_null( $title ) ) {
			$this->getOutput()->addWikiMsg( 'vipsscaler-invalid-file' );
			return;
		}
		$file = wfFindFile( $title );
		if ( !$file || !$file->exists() ) {
			$this->getOutput()->addWikiMsg( 'vipsscaler-invalid-file' );
			return;
		}

		# Create options
		$width = $request->getInt( 'width' );
		if ( !$width ) {
			$this->getOutput()->addWikiMsg( 'vipsscaler-invalid-width' );
			return;
		}
		$vipsUrlOptions = array( 'thumb' => $file->getName(), 'width' => $width );
		if ( $request->getInt( 'sharpen' ) ) {
			$vipsUrlOptions['sharpen'] = $request->getVal( 'sharpen' );
		}
		if ( $request->getCheck( 'bilinear' ) ) {
			$vipsUrlOptions['bilinear'] = 1;
		}
		
		
		# Generate normal thumbnail
		$params = array( 'width' => $width );
		$thumb = $file->transform( $params );
		if ( !$thumb || $thumb->isError() ) {
			$this->getOutput()->addWikiMsg( 'vipsscaler-thumb-error' );
			return;
		}

		# Check if we actually scaled the file
		$normalThumbUrl = $thumb->getUrl();
		if ( wfExpandUrl( $normalThumbUrl ) == $file->getFullUrl() ) {
			// TODO: message
		}

		# Make url to the vips thumbnail
		$vipsThumbUrl = $this->getTitle()->getLocalUrl( $vipsUrlOptions );
		
		# Add to output
		$html = Html::rawElement( 'div', array( 'id' => 'mw-vipstest-thumbnails' ),
		 	Html::rawElement( 'div', array( 'id' => 'mw-vipstest-default-thumb' ),
	 			Html::element( 'img', array( 'src' => $normalThumbUrl ) ) . ' ' .
	 			wfMessage( 'vipsscaler-default-thumb' )->parseAsBlock()
	 		) 
			. ' ' .
			Html::rawElement( 'div', array( 'id' => 'mw-vipstest-vips-thumb' ),
				Html::element( 'img', array( 'src' => $vipsThumbUrl ) ) . ' ' .
				wfMessage( 'vipsscaler-vips-thumb' )->parseAsBlock()
			)
		);
		
		$this->getOutput()->addHTML( $html );
		$this->getOutput()->addModules( 'ext.vipsscaler' );
	}

	/**
	 * TODO
	 */
	protected function showForm() {
		$form = new HTMLForm( $this->getFormFields(), $this->getContext() );
		$form->setWrapperLegend( wfMsg( 'vipsscaler-form-legend' ) );
		$form->setSubmitText( wfMsg( 'vipsscaler-form-submit' ) );
		$form->setSubmitCallback( array( __CLASS__, 'processForm' ) );
		$form->setMethod( 'get' );

		// Looks like HTMLForm does not actually show the form if submission
		// was correct. So we have to show it again.
		// See HTMLForm::show()
		$result = $form->show();
		if( $result === true or $result instanceof Status && $result->isGood() ) {
			$form->displayForm( $result );
			$this->showThumbnails();
		}
	}

	/**
	 * [[Special:VipsTest]] form structure for HTMLForm
	 * @return Array A form structure using the HTMLForm system
	 */
	protected function getFormFields() {
		$fields = array(
			'File' => array(
				'name'          => 'file',
				'class'         => 'HTMLTextField',
				'required'      => true,
				'size' 			=> '80',
				'label-message' => 'vipsscaler-form-file',
				'validation-callback' => array( __CLASS__, 'validateFileInput' ),
			),
			'Width' => array(
				'name'          => 'width',
				'class'         => 'HTMLIntField',
				'default'       => '640',
				'size'          => '5',
				'required'      => true,
				'label-message' => 'vipsscaler-form-width',
				'validation-callback' => array( __CLASS__, 'validateWidth' ),
			),
			'SharpenRadius' => array(
				'name'          => 'sharpen',
				'class'         => 'HTMLFloatField',
				'default'		=> '0.0',
				'size'			=> '5',
				'label-message' => 'vipsscaler-form-sharpen-radius',
				'validation-callback' => array( __CLASS__, 'validateSharpen' ),
			),
			'Bilinear' => array(
				'name' 			=> 'bilinear',
				'class' 		=> 'HTMLCheckField',
				'label-message'	=> 'vipsscaler-form-bilinear', 	
			),
		);
		return $fields;
	}

	public static function validateFileInput( $input, $alldata ) {
		if ( !trim( $input ) ) {
			# Don't show an error if the file is not yet specified, 
			# because it is annoying
			return true;
		}
		
		$title = Title::makeTitleSafe( NS_FILE, $input );
		if( is_null( $title ) ) {
			return wfMsg( 'vipsscaler-invalid-file' );
		}
		$file = wfFindFile( $title );  # TODO what does it do?
		if ( !$file || !$file->exists() ) {
			return wfMsg( 'vipsscaler-invalid-file' );
		}

		// Looks sane enough.
		return true;
	}
	public static function validateWidth( $input, $allData ) {
		if ( self::validateFileInput( $allData['File'], $allData ) !== true ) {
			# Invalid file, error will already be shown at file field
			return true;
		}
		$title = Title::makeTitleSafe( NS_FILE, $allData['File'] );
		$file = wfFindFile( $title );
		if ( $input <= 0 || $input >= $file->getWidth() ) {
			return wfMsg( 'vipsscaler-invalid-width' );
		}
		return true;
	}
	public static function validateSharpen( $input, $allData ) {
		if ( $input >= 5.0 || $input < 0.0 ) {
			return wfMsg( 'vipsscaler-invalid-sharpen' );
		}
		return true;
		
	}

	/**
	 * Process data submitted by the form.
	 */
	public static function processForm( array $data ) {
		return Status::newGood();
	}

	/**
	 *
	 */
	protected function streamThumbnail() {
		global $wgVipsThumbnailerUrl;

		$request = $this->getRequest();

		# Validate title and file existance
		$title = Title::makeTitleSafe( NS_FILE, $request->getText( 'thumb' ) );
		if ( is_null( $title ) ) {
			return $this->streamError( 404 );
		}
		$file = wfFindFile( $title );
		if ( !$file || !$file->exists() ) {
			return $this->streamError( 404 );
		}

		# Check if vips can handle this file
		if ( VipsScaler::getVipsHandler( $file ) === false ) {
			return $this->streamError( 500 );
		}

		# Validate param string
		$handler = $file->getHandler();
		$params = array( 'width' => $request->getInt( 'width' ) );
		if ( !$handler->normaliseParams( $file, $params ) ) {
			return $this->streamError( 500 );
		}
		

		# Get the thumbnail
		if ( is_null( $wgVipsThumbnailerUrl ) ) {
			# No remote scaler, need to do it ourselves.
			# Emulate the BitmapHandlerTransform hook

			$dstPath = VipsCommand::makeTemp( strrchr( $file->getName(), '.' ) );
			$dstUrl = '';
			wfDebug( __METHOD__ . ": Creating vips thumbnail at $dstPath\n" );

			$scalerParams = array(
				# The size to which the image will be resized
				'physicalWidth' => $params['physicalWidth'],
				'physicalHeight' => $params['physicalHeight'],
				'physicalDimensions' => "{$params['physicalWidth']}x{$params['physicalHeight']}",
				# The size of the image on the page
				'clientWidth' => $params['width'],
				'clientHeight' => $params['height'],
				# Comment as will be added to the EXIF of the thumbnail
				'comment' => isset( $params['descriptionUrl'] ) ?
					"File source: {$params['descriptionUrl']}" : '',
				# Properties of the original image
				'srcWidth' => $file->getWidth(),
				'srcHeight' => $file->getHeight(),
				'mimeType' => $file->getMimeType(),
				'srcPath' => $file->getPath(),
				'dstPath' => $dstPath,
				'dstUrl' => $dstUrl,
			);
			
			$options = array();
			if ( $request->getBool( 'bilinear' ) ) {
				$options['bilinear'] = true;
				wfDebug( __METHOD__ . ": using bilinear scaling\n" );
			}
			if ( $request->getInt( 'sharpen' ) && $request->getInt( 'sharpen' ) < 5 ) {
				# Limit sharpen sigma to 5, otherwise we have to write huge convolution matrices
				$options['sharpen'] = array( 'sigma' => floatval( $request->getVal( 'sharpen' ) ) );
				wfDebug( __METHOD__ . ": sharpening with radius {$options['sharpen']}\n" );
			}


			# Call the hook
			$mto = null;
			VipsScaler::doTransform( $handler, $file, $scalerParams, $options, $mto );
			if ( $mto && !$mto->isError() ) {
				wfDebug( __METHOD__ . ": streaming thumbnail...\n" );
				
				$this->getOutput()->disable();
				header( "Content-Type: {$scalerParams['mimeType']}" );
				readfile( $dstPath );
			} else {
				$this->streamError( 500 );
			}

			# Cleanup the temporary file
			wfSuppressWarnings();
			unlink( $dstPath );
			wfRestoreWarnings();

		} else {
			# Request the thumbnail at a remote scaler
			global $wgVipsThumbnailerProxy;

			$url = wfAppendQuery( $wgVipsThumbnailerUrl, array(
				'file' => $file->getName(),
				'thumb' => $handler->makeParamString( $params ) . '-' . $file->getName()
			) );
			wfDebug( __METHOD__ . ": Getting vips thumb from remote url $url\n" );
			
			$options = array( 'method' => 'GET' );
			if ( $wgVipsThumbnailerProxy ) {
				$options['proxy'] = $wgVipsThumbnailerProxy;
			}

			$req = MWHttpRequest::factory( $url, $options );
			$status = $req->execute();
			if ( $status->isOk() ) {
				# Disable output and stream the file
				$this->getOutput()->disable();
				print 'Content-Type: ' . $file->getMimeType() . "\r\n";
				print 'Content-Length: ' . strlen( $req->getContent() ) . "\r\n";
				print "\r\n";
				print $req->getContent();
			} else {
				return $this->streamError( 500 );
			}

		}
	}


	/**
	 * Generates a blank page with given HTTP error code
	 *
	 * @param $code Integer: HTTP error either 404 or 500
	 */
	protected function streamError( $code ) {
		$this->getOutput()->setStatusCode( $code );
		$this->getOutput()->setArticleBodyOnly( true );
	}

}
