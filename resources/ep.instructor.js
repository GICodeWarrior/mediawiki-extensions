/**
 * JavasSript for the Education Program MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Education_Program
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, ep ) { 
	
	$( document ).ready( function() {
		
		$( '.ep-instructor-remove' ).click( function( event ) {
			var $this = $( this ),
			courseId = $this.attr( 'data-courseid' ),
			courseName = $this.attr( 'data-coursename' ),
			userId = $this.attr( 'data-userid' ),
			userName = $this.attr( 'data-username' ),
			bestName = $this.attr( 'data-bestname' ),
			$dialog = null;
			
			var doRemove = function() {
				var $remove = $( '#ep-instructor-remove-button' );
				var $cancel = $( '#ep-instructor-cancel-button' );

				$remove.button( 'option', 'disabled', true );
				$remove.button( 'option', 'label', ep.msg( 'ep-instructor-removing' ) );

				ep.api.removeInstructor( {
					'courseid': courseId,
					'userid': userId,
					'reason': summaryInput.val()
				} ).done( function() {
					$dialog.text( ep.msg( 'ep-instructor-removal-success' ) );
					$remove.remove();
					$cancel.button( 'option', 'label', ep.msg( 'ep-instructor-close-button' ) );
					$cancel.focus();
				} ).fail( function() {
					$remove.button( 'option', 'disabled', false );
					$remove.button( 'option', 'label', ep.msg( 'ep-instructor-remove-retry' ) );
					alert( ep.msg( 'ep-instructor-remove-failed' ) );
				} );
			};

			var summaryInput = $( '<input>' ).attr( {
				'type': 'text',
				'size': 60,
				'maxlength': 250
			} );
			
			$dialog = $( '<div>' ).html( '' ).dialog( {
				'title': ep.msg( 'ep-instructor-remove-title' ),
				'minWidth': 550,
				'buttons': [
					{
						'text': ep.msg( 'ep-instructor-remove-button' ),
						'id': 'ep-instructor-remove-button',
						'click': doRemove
					},
					{
						'text': ep.msg( 'ep-instructor-cancel-button' ),
						'id': 'ep-instructor-cancel-button',
						'click': function() {
							$dialog.dialog( 'close' );
						}
					}
				]
			} );
			
			$dialog.append( $( '<p>' ).msg(
				'ep-instructor-remove-text',
				mw.html.escape( userName ),
				'<b>' + mw.html.escape( bestName ) + '</b>', 
				'<b>' + mw.html.escape( courseName ) + '</b>'
			) );
			
			$dialog.append( summaryInput );
			
			summaryInput.focus();
			
			summaryInput.keypress( function( event ) {
				if ( event.which == '13' ) {
					event.preventDefault();
					doRemove();
				}
			} );
		} );
		
		$( '.ep-add-instructor' ).click( function( event ) {
			var $this = $( this ), _this = this;
			
			this.courseId = $this.attr( 'data-courseid' );
			this.courseName = $this.attr( 'data-coursename' );
			this.selfMode = $this.attr( 'data-mode' ) === 'self';
			this.$dialog = null;
			
			this.nameInput = $( '<input>' ).attr( {
				'type': 'text',
				'size': 30,
				'maxlength': 250,
				'id': 'ep-instructor-nameinput'
			} );
			
			this.summaryInput = $( '<input>' ).attr( {
				'type': 'text',
				'size': 60,
				'maxlength': 250,
				'id': 'ep-instructor-summaryinput'
			} );
			
			this.doAdd = function() {
				var $add = $( '#ep-instructor-add-button' );
				var $cancel = $( '#ep-instructor-add-cancel-button' );

				$remove.button( 'option', 'disabled', true );
				$remove.button( 'option', 'label', ep.msg( 'ep-instructor-adding' ) );

				ep.api.removeInstructor( {
					'courseid': this.courseId,
					'userid': this.userId,
					'reason': this.summaryInput.val()
				} ).done( function() {
					_this.$dialog.text( ep.msg( _this.selfMode ? 'ep-instructor-addittion-self-success' : 'ep-instructor-addittion-success', this.getName() ) );
					$add.remove();
					$cancel.button( 'option', 'label', ep.msg( 'ep-instructor-add-close-button' ) );
					$cancel.focus();
				} ).fail( function() {
					$add.button( 'option', 'disabled', false );
					$add.button( 'option', 'label', ep.msg( 'ep-instructor-add-retry' ) );
					alert( ep.msg( 'ep-instructor-addittion-failed' ) );
				} );
			};
			
			this.getName = function() {
				return this.selfMode ? mw.user.name : this.nameInput.val();
			};
			
			this.$dialog = $( '<div>' ).html( '' ).dialog( {
				'title': ep.msg( this.selfMode ? 'ep-instructor-add-self-title' : 'ep-instructor-add-title', this.getName() ),
				'minWidth': 550,
				'buttons': [
					{
						'text': ep.msg( this.selfMode ? 'ep-instructor-add-self-button' : 'ep-instructor-add-button', this.getName() ),
						'id': 'ep-instructor-add-button',
						'click': this.doAdd
					},
					{
						'text': ep.msg( 'ep-instructor-add-cancel-button' ),
						'id': 'ep-instructor-add-cancel-button',
						'click': function() {
							$dialog.dialog( 'close' );
						}
					}
				]
			} );
			
			this.$dialog.append( $( '<p>' ).text( gM(
				this.selfMode ? 'ep-instructor-add-self-text' : 'ep-instructor-add-text',
				this.courseName,
				this.getName()
			) ) );
			
			if ( !this.selfMode ) {
				this.$dialog.append(
					$( '<label>' ).attr( {
						'for': 'ep-instructor-nameinput'
					} ).text( ep.msg( 'ep-instructor-name-input' ) + ' ' ),
					this.nameInput,
					'<br />',
					$( '<label>' ).attr( {
						'for': 'ep-instructor-summaryinput'
					} ).text( ep.msg( 'ep-instructor-summary-input' ) )
				);
			}
			
			this.$dialog.append( this.summaryInput );
			
			if ( this.selfMode ) {
				this.summaryInput.focus();
			}
			else {
				this.nameInput.focus();
			}
			
			var enterHandler = function( event ) {
				if ( event.which == '13' ) {
					event.preventDefault();
					this.doAdd();
				}
			};
			
			this.nameInput.keypress( enterHandler );
			this.summaryInput.keypress( enterHandler );
		} );
		
	} );
	
})( window.jQuery, window.mediaWiki, window.educationProgram );