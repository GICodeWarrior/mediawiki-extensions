<?php
/**
 * MV_EditStreamPage.php Created on Nov 28, 2007
 *
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http://metavid.org/wiki/Code
 *
 * @author Michael Dale
 * @email dale@ucsc.edu
 * @url http://metavid.org
 */

 // edit stream adds some additional form items (if admin)
 // enables inline editing of media files
 // enables

 // enables "protected" metadata ie strips all occurrences of semantic property from page (such as stream duration)
 class MV_EditStreamPage extends EditPage {
 	var $mv_action = '';
 	var $status_error = '';
 	var $status_ok = '';

 	function edit() {
 		global $wgOut, $wgUser, $wgHooks;
 		// check permission if admin show 'edit files'
 		if ( $wgUser->isAllowed( 'mv_edit_stream' ) ) {
 			// add in the edit stream ajax form:
 			// $wgHooks['EditPage::showEditForm:fields'][] = array($this, 'displayEditStreamFiles');
 			$this->displayEditStreamFiles();
 		}
 		if ( $this->mv_action == 'new_stream_file' || $this->mv_action == 'edit_stream_files' ) {
 			// make the request look like a GET
 			// that way we don't run importFormData with empty POST
 			$_SERVER['REQUEST_METHOD'] = 'GET';
 		}
 		parent::edit();
 	}
 	/*put thrown together quickly... could clean up/simplify*/
 	function displayEditStreamFiles() {
 		global $wgOut, $wgScriptPath, $wgRequest, $wgUser;
 		$html = '';

		$streamFiles = $this->mArticle->mvTitle->mvStream->getFileList();
		// process the requested changes
 		$this->proccessReq( $streamFiles );
		if ( $this->status_error != '' )$html .= '<span class="error">' . htmlspecialchars( $this->status_error ) . '</span><br />';
		if ( $this->status_ok != '' )$html .= $this->status_ok . '<br />';

		if ( count( $streamFiles ) == 0 ) {
			$html .= '<b>' . wfMsg( 'mv_no_stream_files' ) . '</b>';
		} else {
			$html .= '<form action="' . htmlspecialchars( $wgRequest->getRequestURL() ) . '" method="POST">';
			$html .= '<input type="hidden" name="mv_action" value="edit_stream_files">';

			$html .= '<input type="hidden" name="wpEditToken" value="' . htmlspecialchars( $wgUser->editToken() ) . '"/>';

			$html .= '<fieldset><legend>' . wfMsg( 'mv_file_list' ) . '</legend>' . "\n";
			$html .= '<table width="600" border="0">';
			$html .= '</tr><tr>';
			$outHeader = true;
			$remove_link = true;
			foreach ( $streamFiles as $sf ) {
				$html .= $this->getStreamFileForm( $sf, $outHeader, $remove_link );
				$outHeader = false;
			}
			$html .= '<tr><td colspan=4>';
				$html .= '<input type="submit" value="' . htmlspecialchars( wfMsg( 'mv_save_changes' ) ) . '">';
			$html .= '</td></tr>';
			$html .= '</table></fieldset>';
			$html .= '</form>';
		}
		// add new stream:
		$html .= '<form action="' . htmlspecialchars( $wgRequest->getRequestURL() ) . '" method="POST">';
		$html .= '<input type="hidden" name="mv_action" value="new_stream_file" >';
		$html .= '<input type="hidden" name="wpEditToken" value="' . htmlspecialchars( $wgUser->editToken() ) . '" >';
		$html .= '<fieldset><legend>' . wfMsg( 'mv_add_stream_file' ) . '</legend>' . "\n";
		$html .= '<table width="600" border="0">';
		$html .= $this->getStreamFileForm( array( 'id' => 'new' ) );
			$html .= '<tr><td>';
		$html .= '<input type="submit" value="' . htmlspecialchars( wfMsg( 'mv_add_stream_file' ) ) . '">';
			$html .= '</td></tr>';
		$html .= '</table></fieldset>';
		$html .= '</form>';
		$wgOut->addHTML( $html );
		return true;
 	}
 	function proccessReq( & $streamFiles ) {
 		global $wgRequest, $wgUser;


 		// make sure the user can edit streams:
 		if ( !$wgUser->isAllowed( 'mv_edit_stream' ) ) {
 			$this->status_error = wfMsg( 'add_stream_permission' );
 			return;
 		}

 		// confirm the edit token:
 		if( $wgRequest->getVal( 'wpEditToken' ) ){
	 		if ( !$wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
	 			$this->status_error = wfMsg( 'token_suffix_mismatch' );
	 			return ;
	 		}
 		}
 		$stream =  $this->mArticle->mvTitle->mvStream;
 		$this->mv_action = $wgRequest->getVal( 'mv_action' );
 		if ( $this->mv_action == 'new_stream_file' ) {
 			// @@todo a bit more input scrubbing:
 			$newSf = new MV_StreamFile( $stream, $_POST['sf_new'] );
 			// check against existing stream files:
 			$doAdd = true;
 			foreach ( $streamFiles as $sf ) {
 				if ( $sf->file_desc_msg == $newSf->file_desc_msg ) {
 					$this->status_error = wfMsg( 'mv_file_with_same_desc', $newSf->file_desc_msg );
 					$doAdd = false;
 				}
 			}
 			if ( $doAdd ) {
 				$newSf->writeStreamFileDB();
 				$streamFiles[] = $newSf;
 			}

 			//check if stream length is 0 then update that to the stream-file length
 			if( $stream->getDuration() == 0 ){
 				$stream->duration = $newSf->getDuration();
 				$stream->updateStreamDB();
 			}


 		} elseif ( $this->mv_action == 'edit_stream_files' ) {
 			$dur = 0;
 			foreach ( $streamFiles as $sf ) {
 				if ( $_POST['sf_' . $sf->id] ) {
 					$sf->updateValues( $_POST['sf_' . $sf->id] );
 					$sf->writeStreamFileDB();
 					if( $sf->getDuration() > $dur);
 						$dur = $sf->getDuration();
 				}
 			}
 			//check if stream length is 0 then update that to the stream-file length
 			if( $stream->getDuration() == 0 ){
 				$stream->duration = $dur;
 				$stream->updateStreamDB();
 			}

 			$this->status_ok = wfMsg( 'mv_updated_stream_files' );
 		} elseif ( $this->mv_action == 'rm_stream_file' ) {
 			$rmID = $wgRequest->getVal( 'rid' );
 			foreach ( $streamFiles as $inx => $sf ) {
 				if ( $sf->id == $rmID ) {
 					$sf->deleteStreamFileDB();
 					$this->status_ok = wfMsg( 'mv_removed_file_stream', $sf->file_desc_msg );
 					unset( $streamFiles[$inx] );
 				}
 			}
 		}
 	}
 	function getStreamFileForm( $sf, $output_header = true, $remove_link = false ) {
 		global $mvgScriptPath;
 		if ( $output_header ) {
	 		$html .= '<tr>';
	 			if ( $remove_link )$html .= '<td></td>';
				// titles:
				$html .= '<td>' . wfMsg( 'mv_file_desc_label' ) . '</td>';
				$html .= '<td>' . wfMsg( 'mv_duration_label' ) . '</td>';
				$html .= '<td>' . wfMsg( 'mv_base_offset_label' ) . '</td>';
				$html .= '<td>' . wfMsg( 'mv_path_type_label' ) . '</td>';
				$html .= '<td>' . wfMsg( 'mv_media_path' ) . '</td>';
			$html .= '</tr>';
 		}
 		// make it an array and assign default values: (maybe not so optimal)
 		if ( is_object( $sf ) )$sf = get_object_vars( $sf );
 		if ( !isset( $sf['id'] ) )$sf['id'] = 'new';
 		if ( !isset( $sf['stream_id'] ) )$sf['stream_id'] = $this->mArticle->mvTitle->mvStream->getStreamId();
 		if ( !isset( $sf['base_offset'] ) )$sf['base_offset'] = 0;
 		if ( !isset( $sf['duration'] ) )$sf['duration'] = 0;
 		if ( !isset( $sf['file_desc_msg'] ) )$sf['file_desc_msg'] = 'mv_ogg_low_quality';
 		if ( !isset( $sf['path_type'] ) )$sf['path_type'] = 'url_anx';
 		if ( !isset( $sf['path'] ) )$sf['path'] = '';

		$html .= '<tr>';
			if ( $remove_link ) {
				global $wgRequest;
				$html .= '<td><a title="' . wfMsg( 'mv_delete_stream_file' ) . '"' .
				 ' href="' . $wgRequest->getRequestURL() . '&mv_action=rm_stream_file&rid=' . htmlspecialchars( $sf['id'] ) . '"><img src="' . htmlspecialchars( $mvgScriptPath ) . '/skins/images/delete.png"></a></td>';
			}
			$html .= '<td><input type="text" name="sf_' . htmlspecialchars( $sf['id'] ) . '[file_desc_msg]" value="' . htmlspecialchars( $sf['file_desc_msg'] ) . '" maxlength="60" size="20" /></td>';
			$html .= '<td><input type="text" name="sf_' . htmlspecialchars( $sf['id'] ) . '[duration]" value="' . htmlspecialchars( $sf['duration'] ) . '" maxlength="11" size="7" /></td>';
			$html .= '<td><input type="text" name="sf_' . htmlspecialchars( $sf['id'] ) . '[base_offset]" value="' . htmlspecialchars( $sf['base_offset'] ) . '" maxlength="11" size="7" /></td>';
			$html .= '<td><select name="sf_' . htmlspecialchars( $sf['id'] ) . '[path_type]">';

			$sel = ( $sf['path_type'] == 'url_anx' ) ? ' selected':'';
			$html .= '<option value="url_anx"' . $sel . '>' . wfMsg( 'mv_path_type_url_anx' ) . '</option>';

			$sel = ( $sf['path_type'] == 'wiki_title' ) ? ' selected':'';
			$html .= '<option value="wiki_title"' . $sel . '>' . wfMsg( 'mv_path_type_wiki_title' ) . '</option>';

			$sel = ( $sf['path_type'] == 'url_file' ) ? ' selected':'';
			$html .= '<option value="url_file"' . $sel . '>' . wfMsg( 'mv_path_type_url_file' ) . '</option>';

			$sel = ( $sf['path_type'] == 'mp4_stream' ) ? ' selected':'';
			$html .= '<option value="mp4_stream"' . $sel . '>' . wfMsg( 'mv_path_type_mp4_stream' ) . '</option>';

			$html .='</select></td>';
			$html .= '<td><input type="text" name="sf_' . htmlspecialchars( $sf['id'] ) . '[path]" value="' . htmlspecialchars( $sf['path'] ) . '" maxlength="512" size="20" />' .
					'<input type="hidden" name="sf_' . htmlspecialchars( $sf['id'] ) . '[stream_id]" value="' . htmlspecialchars( $sf['stream_id'] ) . '">' .
					'</td>';
		$html .= '</tr>';
		return $html;
 	}
 }
