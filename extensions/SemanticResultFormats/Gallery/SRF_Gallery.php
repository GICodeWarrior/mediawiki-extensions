<?php

/**
 * Result printer that prints query results as a gallery.
 *
 * @file SRF_Gallery.php
 * @ingroup SemanticResultFormats
 *
 * @author Rowan Rodrik van der Molen
 * @author Jeroen De Dauw
 */
class SRFGallery extends SMWResultPrinter {

	public function getName() {
		return wfMsg( 'srf_printername_gallery' );
	}

	public function getResult( SMWQueryResult $results, array $params, $outputmode ) {
		// skip checks, results with 0 entries are normal
		$this->handleParameters( $params, $outputmode );
		return $this->getResultText( $results, SMW_OUTPUT_HTML );
	}

	public function getResultText( SMWQueryResult $results, $outputmode ) {
		global $wgUser, $wgParser;

		$ig = new ImageGallery();
		$ig->setShowBytes( false );
		$ig->setShowFilename( false );
		$ig->setParser( $wgParser );
		$ig->useSkin( $wgUser->getSkin() ); // FIXME: deprecated method usage
		$ig->setCaption( $this->mIntro ); // set caption to IQ header

		if ( isset( $this->m_params['perrow'] ) ) {
			$ig->setPerRow( $this->m_params['perrow'] );
		}

		if ( isset( $this->m_params['widths'] ) ) {
			$ig->setWidths( $this->m_params['widths'] );
		}

		if ( isset( $this->m_params['heights'] ) ) {
			$ig->setHeights( $this->m_params['heights'] );
		}

		$this->m_params['autocaptions'] = isset( $this->m_params['autocaptions'] ) ? trim( $this->m_params['autocaptions'] ) != 'off' : true;
		$this->m_params['fileextensions'] = isset( $this->m_params['fileextensions'] ) ? trim( $this->m_params['fileextensions'] ) != 'off' : true;

		$printReqLabels = array();

		foreach ( $results->getPrintRequests() as $printReq ) {
			$printReqLabels[] = $printReq->getLabel();
		}

		if ( isset( $this->m_params['imageproperty'] ) && in_array( $this->m_params['imageproperty'], $printReqLabels ) ) {
			$captionProperty = isset( $this->m_params['captionproperty'] ) ? $this->m_params['captionproperty'] : '';
			$this->addImageProperties( $results, $ig, $this->m_params['imageproperty'], $captionProperty );
		}
		else {
			$this->addImagePages( $results, $ig );
		}

		return array( $ig->toHTML(), 'nowiki' => true, 'isHTML' => true );
	}

	/**
	 * Handles queries where the images (and optionally their captions) are specified as properties.
	 *
	 * @since 1.5.3
	 *
	 * @param SMWQueryResult $results
	 * @param ImageGallery $ig
	 * @param string $imageProperty
	 * @param string $captionProperty
	 */
	protected function addImageProperties( SMWQueryResult $results, ImageGallery &$ig, $imageProperty, $captionProperty ) {
		while ( /* array of SMWResultArray */ $row = $results->getNext() ) { // Objects (pages)
			$images = array();
			$captions = array();

			for ( $i = 0, $n = count( $row ); $i < $n; $i++ ) { // Properties
				if ( $row[$i]->getPrintRequest()->getLabel() == $imageProperty ) {
					while ( ( $obj = efSRFGetNextDV( $row[$i] ) ) !== false ) { // Property values
						if ( $obj->getTypeID() == '_wpg' ) {
							$images[] = $obj->getTitle();
						}
					}
				}
				elseif ( $row[$i]->getPrintRequest()->getLabel() == $captionProperty ) {
					while ( ( $obj = efSRFGetNextDV( $row[$i] ) ) !== false ) { // Property values
						$captions[] = $obj->getShortText( SMW_OUTPUT_HTML, $this->getLinker( true ) );
					}
				}
			}

			$amountMatches = count( $captions ) == count( $images );
			$hasCaption = $amountMatches || count( $captions ) > 0;

			foreach ( $images as $imgTitle ) {
				if ( $imgTitle->exists() ) {
					$imgCaption= $hasCaption ? ( $amountMatches ? array_shift( $captions ) : $captions[0] ) : '';
					$this->addImageToGallery( $ig, $imgTitle, $imgCaption );
				}
			}
		}
	}

	/**
	 * Handles queries where the result objects are image pages.
	 *
	 * @since 1.5.3
	 *
	 * @param SMWQueryResult $results
	 * @param ImageGallery $ig
	 */
	protected function addImagePages( SMWQueryResult $results, ImageGallery &$ig ) {
		while ( $row = $results->getNext() ) {
			$firstField = $row[0];
			$nextObject = efSRFGetNextDV( $firstField );

			if ( $nextObject !== false ) {
				$imgTitle = $nextObject->getTitle();
				$imgCaption = '';

				// Is there a property queried for display with ?property
				if ( isset( $row[1] ) ) {
					$imgCaption = efSRFGetNextDV( $row[1] );
					if ( is_object( $imgCaption ) ) {
						$imgCaption = $imgCaption->getShortText( SMW_OUTPUT_HTML, $this->getLinker( true ) );
					}
				}

				$this->addImageToGallery( $ig, $imgTitle, $imgCaption );
			}
		}
	}

	/**
	 * Adds a single image to the gallery.
	 * Takes care of automatically adding a caption when none is provided and parsing it's wikitext.
	 *
	 * @since 1.5.3
	 *
	 * @param ImageGallery $ig The gallery to add the image to
	 * @param Title $imgTitle The title object of the page of the image
	 * @param string $imgCaption An optional caption for the image
	 */
	protected function addImageToGallery( ImageGallery &$ig, Title $imgTitle, $imgCaption ) {
		global $wgParser;

		if ( empty( $imgCaption ) ) {
			if ( $this->m_params['autocaptions'] ) {
				$imgCaption = $imgTitle->getBaseText();
				
				if ( !$this->m_params['fileextensions'] ) {
					$imgCaption = preg_replace( '#\.[^.]+$#', '', $imgCaption );
				}
			}
			else {
				$imgCaption = '';
			}
		}
		else {
			$imgCaption = $wgParser->recursiveTagParse( $imgCaption );
		}

		$ig->add( $imgTitle, $imgCaption );

		// Only add real images (bug #5586)
		if ( $imgTitle->getNamespace() == NS_IMAGE ) {
			$wgParser->mOutput->addImage( $imgTitle->getDBkey() );
		}
	}

	/**
	 * @see SMWResultPrinter::getParameters
	 *
	 * @since 1.5.3
	 *
	 * @return array
	 */
	public function getParameters() {
		$params = parent::getParameters();

		if ( defined( 'SMW_SUPPORTS_VALIDATOR' ) ) {
			$params['perrow'] = new Parameter( 'perrow', Parameter::TYPE_INTEGER );
			$params['perrow']->setDescription( wfMsg( 'srf_paramdesc_perrow' ) );
			$params['perrow']->setDefault( '', false );

			$params['widths'] = new Parameter( 'widths', Parameter::TYPE_INTEGER );
			$params['widths']->setDescription( wfMsg( 'srf_paramdesc_widths' ) );
			$params['widths']->setDefault( '', false );

			$params['heights'] = new Parameter( 'heights', Parameter::TYPE_INTEGER );
			$params['heights']->setDescription( wfMsg( 'srf_paramdesc_heights' ) );
			$params['heights']->setDefault( '', false );

			$params['autocaptions'] = new Parameter( 'autocaptions', Parameter::TYPE_BOOLEAN );
			$params['autocaptions']->setDescription( wfMsg( 'srf_paramdesc_autocaptions' ) );
			$params['autocaptions']->setDefault( true );
			
			$params['fileextensions'] = new Parameter( 'fileextensions', Parameter::TYPE_BOOLEAN );
			$params['fileextensions']->setDescription( wfMsg( 'srf_paramdesc_fileextensions' ) );
			$params['fileextensions']->setDefault( false );
			
			$params['captionproperty'] = new Parameter( 'captionproperty' );
			$params['captionproperty']->setDescription( wfMsg( 'srf_paramdesc_captionproperty' ) );
			$params['captionproperty']->setDefault( '' );
			
			$params['imageproperty'] = new Parameter( 'imageproperty' );
			$params['imageproperty']->setDescription( wfMsg( 'srf_paramdesc_imageproperty' ) );
			$params['imageproperty']->setDefault( '' );
		}
		else {
			// This if for b/c with SMW 1.5.x; SMW 1.6 directly accepts Parameter objects.
			$params[] = array( 'name' => 'perrow', 'type' => 'int', 'description' => wfMsg( 'srf_paramdesc_perrow' ) );
			$params[] = array( 'name' => 'widths', 'type' => 'int', 'description' => wfMsg( 'srf_paramdesc_widths' ) );
			$params[] = array( 'name' => 'heights', 'type' => 'int', 'description' => wfMsg( 'srf_paramdesc_heights' ) );
			$params[] = array( 'name' => 'captionproperty', 'type' => 'string', 'description' => wfMsg( 'srf_paramdesc_captionproperty' ) );
			$params[] = array( 'name' => 'imageproperty', 'type' => 'string', 'description' => wfMsg( 'srf_paramdesc_imageproperty' ) );

			$params[] = array( 'name' => 'autocaptions', 'type' => 'enumeration', 'description' => wfMsg( 'srf_paramdesc_autocaptions' ), 'values' => array( 'on', 'off' ) );
			$params[] = array( 'name' => 'fileextensions', 'type' => 'enumeration', 'description' => wfMsg( 'srf_paramdesc_fileextensions' ), 'values' => array( 'on', 'off' ) );
		}

		return $params;
	}

}
