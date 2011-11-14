/**
 * ArticleFeedback form plugin
 *
 * This file creates the plugin that will be used to build the Article Feedback
 * form.  The flow goes like this:
 *
 * User arrives at page -> build appropriate form
 *  -> User clicks the view link -> replace form with average ratings display
 *  -> User submits form -> submit to API
 *      -> has errors -> show errors
 *      -> has no errors -> select random CTA and display
 *
 * This plugin supports a choice of forms and CTAs.  Each form option is called
 * a "bucket" because users are sorted into buckets and each bucket gets a
 * different form option.  Right now, these buckets are:
 *   1. Share Your Feedback - NOT implemented
 *   	Has a yes/no toggle on "Did you find what you were looking for?" and a
 *   	text area for comments.
 *   2. Make A Suggestion - NOT implemented
 *   	Modeled after getsatisfaction.com; users can say that their comment is a
 *   	suggestion, question, problem, or praise.
 *   3. Review This Page - NOT implemented
 *   	Has a single star rating field and a comment box.
 *   4. Help Edit This Page - NOT implemented
 *   	Has no input fields; just links to the Edit page.
 *   5. Rate This Page
 *   	The existing article feedback tool, except that it can use any of the
 *   	CTA types.
 *   6. No Feedback
 *   	Shows nothing at all.
 * The available CTAs are:
 *   1. Edit this page
 *   	Just a big glossy button to send the user to the edit page.
 *   2. Take a survey - NOT implemented
 *      Asks the user to take a survey, which will probably pop up in a new
 *      window.
 *
 * This file is really long, so it's commented with manual fold markers.  To use
 * folds this way in vim:
 *   set foldmethod=marker
 *   set foldlevel=0
 *   set foldcolumn=0
 *
 * @package    ArticleFeedback
 * @subpackage Resources
 * @author     Reha Sterbin <reha@omniti.com>
 * @version    $Id$
 */

( function ( $ ) {

// {{{ articleFeedbackv5 definition

	$.articleFeedbackv5 = {};

	// {{{ Properties

	/**
	 * Temporary -- this will need to come from the config.
	 */
	$.articleFeedbackv5.debug = true;

	/**
	 * The bucket ID is the variation of the Article Feedback form chosen for this
	 * particualar user.  It will be passed in at load time, but if all else fails,
	 * default to Option Six (no form).
	 *
	 * @see http://www.mediawiki.org/wiki/Article_feedback/Version_5/Feature_Requirements#Feedback_form_interface
	 */
	$.articleFeedbackv5.bucketId = 6;

	/**
	 * The CTA is the view presented to a user who has successfully submitted
	 * feedback.
	 *
	 * @see http://www.mediawiki.org/wiki/Article_feedback/Version_5/Feature_Requirements#Calls_to_Action
	 */
	$.articleFeedbackv5.ctaId = 1;

	/**
	 * Use the mediawiki util resource's config method to find the correct url to
	 * call for all ajax requests.
	 */
	$.articleFeedbackv5.apiUrl = mw.config.get( 'wgScriptPath' ) + '/api.php';

	/**
	 * Is this an anonymous user?
	 */
	$.articleFeedbackv5.anonymous = mw.user.anonymous();

	/**
	 * If not, what's their user id?
	 */
	$.articleFeedbackv5.userId = mw.user.id();

	/**
	 * The page ID
	 */
	$.articleFeedbackv5.pageId = mw.config.get( 'wgArticleId' );

	/**
	 * The revision ID
	 */
	$.articleFeedbackv5.revisionId = mw.config.get( 'wgCurRevisionId' );

	// }}}
	// {{{ Bucket UI objects

	/**
	 * Set up the buckets' UI objects
	 */
	$.articleFeedbackv5.buckets = {

		// {{{ Bucket 5

		/**
		 * Bucket 5: Old ratings form
		 */
		'5': {

			// {{{ properties

			/**
			 * The ratings right now are coming from the config, but they really
			 * can't be configured.  Eventually, these should just be hardcoded.
			 */
			ratingInfo: mw.config.get( 'wgArticleFeedbackv5RatingTypesFlipped' ),

			/**
			 * Only certain users can see the expertise checkboxes and email
			 */
			showOptions: 'show' === mw.user.bucket( 'ext.articleFeedback-options', mw.config.get( 'wgArticleFeedbackv5Options' ) ),

			/**
			 * Whether we need to load the aggregate ratings the next time the
			 * button is clicked.  This is initially set to true, turned to
			 * false after the first time, then turned back to true on form
			 * submission, in case the user wants to go back and see the ratings with
			 * theirs included.
			 */
			loadAggregate: true,

			// }}}
			// {{{ buildForm

			/**
			 * Builds the empty form
			 *
			 * @return Element the form
			 */
			buildForm: function () {

				// The overall template
				var block_tpl = '\
					<div class="articleFeedbackv5-panel">\
						<div class="articleFeedbackv5-buffer articleFeedbackv5-ui">\
							<div class="articleFeedbackv5-switch articleFeedbackv5-switch-report articleFeedbackv5-visibleWith-form" rel="report"><html:msg key="report-switch-label" /></div>\
							<div class="articleFeedbackv5-switch articleFeedbackv5-switch-form articleFeedbackv5-visibleWith-report" rel="form"><html:msg key="form-switch-label" /></div>\
							<div class="articleFeedbackv5-title articleFeedbackv5-visibleWith-form"><html:msg key="form-panel-title" /></div>\
							<div class="articleFeedbackv5-title articleFeedbackv5-visibleWith-report"><html:msg key="report-panel-title" /></div>\
							<div class="articleFeedbackv5-explanation articleFeedbackv5-visibleWith-form"><a class="articleFeedbackv5-explanation-link"><html:msg key="form-panel-explanation" /></a></div>\
							<div class="articleFeedbackv5-description articleFeedbackv5-visibleWith-report"><html:msg key="report-panel-description" /></div>\
							<div style="clear:both;"></div>\
							<div class="articleFeedbackv5-ratings"></div>\
							<div style="clear:both;"></div>\
							<div class="articleFeedbackv5-options">\
								<div class="articleFeedbackv5-expertise articleFeedbackv5-visibleWith-form" >\
									<input type="checkbox" value="general" disabled="disabled" /><label class="articleFeedbackv5-expertise-disabled"><html:msg key="form-panel-expertise" /></label>\
									<div class="articleFeedbackv5-expertise-options">\
										<div><input type="checkbox" value="studies" /><label><html:msg key="form-panel-expertise-studies" /></label></div>\
										<div><input type="checkbox" value="profession" /><label><html:msg key="form-panel-expertise-profession" /></label></div>\
										<div><input type="checkbox" value="hobby" /><label><html:msg key="form-panel-expertise-hobby" /></label></div>\
										<div><input type="checkbox" value="other" /><label><html:msg key="form-panel-expertise-other" /></label></div>\
										<div class="articleFeedbackv5-helpimprove">\
											<input type="checkbox" value="helpimprove-email" />\
											<label><html:msg key="form-panel-helpimprove" /></label>\
											<input type="text" placeholder="" class="articleFeedbackv5-helpimprove-email" />\
											<div class="articleFeedbackv5-helpimprove-note"></div>\
										</div>\
									</div>\
								</div>\
								<div style="clear:both;"></div>\
							</div>\
							<button class="articleFeedbackv5-submit articleFeedbackv5-visibleWith-form" type="submit" disabled="disabled"><html:msg key="form-panel-submit" /></button>\
							<div class="articleFeedbackv5-success articleFeedbackv5-visibleWith-form"><span><html:msg key="form-panel-success" /></span></div>\
							<div class="articleFeedbackv5-pending articleFeedbackv5-visibleWith-form"><span><html:msg key="form-panel-pending" /></span></div>\
							<div style="clear:both;"></div>\
							<div class="articleFeedbackv5-notices articleFeedbackv5-visibleWith-form">\
								<div class="articleFeedbackv5-expiry">\
									<div class="articleFeedbackv5-expiry-title"><html:msg key="form-panel-expiry-title" /></div>\
									<div class="articleFeedbackv5-expiry-message"><html:msg key="form-panel-expiry-message" /></div>\
								</div>\
							</div>\
						</div>\
						<div class="articleFeedbackv5-error"><div class="articleFeedbackv5-error-message"><html:msg key="error" /></div></div>\
						<div class="articleFeedbackv5-pitches"></div>\
						<div style="clear:both;"></div>\
					</div>\
					';

				// A single rating block
				var rating_tpl = '\
					<div class="articleFeedbackv5-rating">\
						<div class="articleFeedbackv5-label"></div>\
						<input type="hidden" />\
						<div class="articleFeedbackv5-rating-labels articleFeedbackv5-visibleWith-form">\
							<div class="articleFeedbackv5-rating-label" rel="1"></div>\
							<div class="articleFeedbackv5-rating-label" rel="2"></div>\
							<div class="articleFeedbackv5-rating-label" rel="3"></div>\
							<div class="articleFeedbackv5-rating-label" rel="4"></div>\
							<div class="articleFeedbackv5-rating-label" rel="5"></div>\
							<div class="articleFeedbackv5-rating-clear"></div>\
						</div>\
						<div class="articleFeedbackv5-visibleWith-form">\
							<div class="articleFeedbackv5-rating-tooltip"></div>\
						</div>\
						<div class="articleFeedbackv5-rating-average articleFeedbackv5-visibleWith-report"></div>\
						<div class="articleFeedbackv5-rating-meter articleFeedbackv5-visibleWith-report"><div></div></div>\
						<div class="articleFeedbackv5-rating-count articleFeedbackv5-visibleWith-report"></div>\
						<div style="clear:both;"></div>\
					</div>\
					';

				// Start up the block to return
				var $block = $( block_tpl );

				// Add the ratings from the options
				$block.find( '.articleFeedbackv5-ratings' ).each( function () {
					for ( var key in $.articleFeedbackv5.currentBucket().ratingInfo ) {
						var	tip_msg = 'articlefeedbackv5-field-' + key + '-tip';
						var label_msg = 'articlefeedbackv5-field-' + key + '-label';
						var $rtg = $( rating_tpl ).attr( 'rel', key );
						$rtg.find( '.articleFeedbackv5-label' )
							.attr( 'title', mw.msg( tip_msg ) )
							.text( mw.msg( label_msg ) );
						$rtg.find( '.articleFeedbackv5-rating-clear' )
							.attr( 'title', mw.msg( 'articlefeedbackv5-form-panel-clear' ) );
						$rtg.appendTo( $(this) );
					}
				} );

				// Fill in the link to the What's This page
				$block.find( '.articleFeedbackv5-explanation-link' )
					.attr( 'href', mw.config.get( 'wgArticlePath' ).replace(
						'$1', mw.config.get( 'wgArticleFeedbackv5WhatsThisPage' )
					) );

				// Fill in the Help Improve message and links
				$block.find( '.articleFeedbackv5-helpimprove-note' )
					// Can't use .text() with mw.message(, /* $1 */ link).toString(),
					// because 'link' should not be re-escaped (which would happen if done by mw.message)
					.html( function () {
						var link = mw.html.element(
							'a', {
								href: mw.util.wikiGetlink( mw.msg('articlefeedbackv5-form-panel-helpimprove-privacylink') )
							}, mw.msg('articlefeedbackv5-form-panel-helpimprove-privacy')
						);
						return mw.html.escape( mw.msg( 'articlefeedbackv5-form-panel-helpimprove-note') )
							.replace( /\$1/, mw.message( 'parentheses', link ).toString() );
					});
				$block.find( '.articleFeedbackv5-helpimprove-email' )
					.attr( 'placeholder', mw.msg( 'articlefeedbackv5-form-panel-helpimprove-email-placeholder' ) )
					.placeholder(); // back. compat. for older browsers

				// Localize the block
				$block.localize( { 'prefix': 'articlefeedbackv5-' } );

				// Activate tooltips
				$block.find( '[title]' )
					.tipsy( {
						'gravity': 'sw',
						'center': false,
						'fade': true,
						'delayIn': 300,
						'delayOut': 100
					} );

				// Set id and for on expertise checkboxes
				$block.find( '.articleFeedbackv5-expertise input:checkbox' )
					.each( function () {
						var id = 'articleFeedbackv5-expertise-' + $(this).attr( 'value' );
						$(this).attr( 'id', id );
						$(this).next().attr( 'for', id );
					} );
				$block.find( '.articleFeedbackv5-helpimprove > input:checkbox' )
					.each( function () {
						var id = 'articleFeedbackv5-expertise-' + $(this).attr( 'value' );
						$(this).attr( 'id', id );
						$(this).next().attr( 'for', id );
					})

				// Turn the submit into a slick button
				$block.find( '.articleFeedbackv5-submit' )
					.button()
					.addClass( 'ui-button-blue' )

				// Hide report elements initially
				$block.find( '.articleFeedbackv5-visibleWith-report' ).hide();

				// Name the hidden rating fields
				$block.find( '.articleFeedbackv5-rating' )
					.each( function () {
						var name = $.articleFeedbackv5.currentBucket().ratingInfo[$(this).attr( 'rel' )];
						$(this).find( 'input:hidden' ) .attr( 'name', 'r' + name );
					} );

				// Hide the additional options, if the user's in a bucket that
				// requires it
				if ( !$.articleFeedbackv5.currentBucket().showOptions ) {
					$block.find( '.articleFeedbackv5-options' ).hide();
				}

				return $block;
			},

			// }}}
			// {{{ bindEvents

			/**
			 * Binds any events
			 *
			 * @param $block element the form block
			 */
			bindEvents: function ( $block ) {

				// On-blur validity check for Help Improve email field
				$block.find( '.articleFeedbackv5-helpimprove-email' )
					.one( 'blur', function () {
						var $el = $(this);
						var bucket = $.articleFeedbackv5.currentBucket();
						bucket.updateMailValidityLabel( $el.val() );
						$el.keyup( function () {
							bucket.updateMailValidityLabel( $el.val() );
						} );
					} );

				// Slide-down for the expertise checkboxes
				$block.find( '.articleFeedbackv5-expertise > input:checkbox' )
					.change( function () {
						var $options = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-expertise-options' );
						if ( $(this).is( ':checked' ) ) {
							$options.slideDown( 'fast' );
						} else {
							$options.slideUp( 'fast', function () {
								$options.find( 'input:checkbox' ).attr( 'checked', false );
							} );
						}
					} );

				// Enable submission when at least one rating is set
				$block.find( '.articleFeedbackv5-expertise input:checkbox' )
					.each( function () {
						var id = 'articleFeedbackv5-expertise-' + $(this).attr( 'value' );
						$(this).click( function () {
							$.articleFeedbackv5.currentBucket().enableSubmission( true );
						} );
					} );

				// Clicking on the email field checks the associted box
				$block.find( '.articleFeedbackv5-helpimprove-email' )
					.bind( 'mousedown click', function ( e ) {
						$(this).closest( '.articleFeedbackv5-helpimprove' )
							.find( 'input:checkbox' )
							.attr( 'checked', true );
					} );

				// Attach the submit
				$block.find( '.articleFeedbackv5-submit' )
					.click( function ( e ) {
						e.preventDefault();
						$.articleFeedbackv5.submitForm();
					} );

				// Set up form/report switch behavior
				$block.find( '.articleFeedbackv5-switch' )
					.click( function ( e ) {
						if ( $(this).attr( 'rel' ) == 'report' && $.articleFeedbackv5.currentBucket().loadAggregate ) {
							$.articleFeedbackv5.currentBucket().loadAggregateRatings();
							$.articleFeedbackv5.currentBucket().loadAggregate = false;
						}
						$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-visibleWith-' + $(this).attr( 'rel' ) )
							.show();
						$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-switch' )
							.not( $(this) )
							.each( function () {
								$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-visibleWith-' + $(this).attr( 'rel' ) ).hide();
							} );
						e.preventDefault();
						return false;
					} );

				// Set up rating behavior
				var rlabel = $block.find( '.articleFeedbackv5-rating-label' );
				rlabel.hover( function () {
					// mouse on
					var	$el = $( this );
					var $rating = $el.closest( '.articleFeedbackv5-rating' );
					$el.addClass( 'articleFeedbackv5-rating-label-hover-head' );
					$el.prevAll( '.articleFeedbackv5-rating-label' )
						.addClass( 'articleFeedbackv5-rating-label-hover-tail' );
					$rating.find( '.articleFeedbackv5-rating-tooltip' )
						.text( mw.msg( 'articlefeedbackv5-field-' + $rating.attr( 'rel' ) + '-tooltip-' + $el.attr( 'rel' ) ) )
						.show();
				}, function () {
					// mouse off
					var	$el = $( this );
					var $rating = $el.closest( '.articleFeedbackv5-rating' );
					$el.removeClass( 'articleFeedbackv5-rating-label-hover-head' );
					$el.prevAll( '.articleFeedbackv5-rating-label' )
						.removeClass( 'articleFeedbackv5-rating-label-hover-tail' );
					$rating.find( '.articleFeedbackv5-rating-tooltip' )
						.hide();
					var bucket = $.articleFeedbackv5.currentBucket();
					bucket.updateRating( $rating );
				});
				rlabel.mousedown( function () {
					var bucket = $.articleFeedbackv5.currentBucket();
					bucket.enableSubmission( true );
					var $h = $.articleFeedbackv5.$holder;
					if ( $h.hasClass( 'articleFeedbackv5-expired' ) ) {
						// Changing one means the rest will get submitted too
						$h.removeClass( 'articleFeedbackv5-expired' );
						$h.find( '.articleFeedbackv5-rating' )
							.addClass( 'articleFeedbackv5-rating-new' );
					}
					$h.find( '.articleFeedbackv5-expertise' )
						.each( function () {
							bucket.enableExpertise( $(this) );
						} );
					var $el = $( this );
					var $rating = $el.closest( '.articleFeedbackv5-rating' );
					$rating.addClass( 'articleFeedbackv5-rating-new' );
					$rating.find( 'input:hidden' ).val( $el.attr( 'rel' ) );
					$el.addClass( 'articleFeedbackv5-rating-label-down' );
					$el.nextAll()
						.removeClass( 'articleFeedbackv5-rating-label-full' );
					$el.parent().find( '.articleFeedbackv5-rating-clear' ).show();
				} );
				rlabel.mouseup( function () {
					$(this).removeClass( 'articleFeedbackv5-rating-label-down' );
				} );

				// Icon to clear out the ratings
				$block.find( '.articleFeedbackv5-rating-clear' )
					.click( function () {
						var bucket = $.articleFeedbackv5.currentBucket();
						bucket.enableSubmission( true );
						$(this).hide();
						var $rating = $(this).closest( '.articleFeedbackv5-rating' );
						$rating.find( 'input:hidden' ).val( 0 );
						bucket.updateRating( $rating );
					} );

			},

			// }}}
			// {{{ updateRating

			/**
			 * Updates the stars to match the associated hidden field
			 *
			 * @param $rating the rating block
			 */
			updateRating: function ( $rating ) {
				$rating.find( '.articleFeedbackv5-rating-label' )
					.removeClass( 'articleFeedbackv5-rating-label-full' );
				var val = $rating.find( 'input:hidden' ).val();
				var $label = $rating.find( '.articleFeedbackv5-rating-label[rel="' + val + '"]' );
				if ( $label.length ) {
					$label.prevAll( '.articleFeedbackv5-rating-label' )
						.add( $label )
						.addClass( 'articleFeedbackv5-rating-label-full' );
					$label.nextAll( '.articleFeedbackv5-rating-label' )
						.removeClass( 'articleFeedbackv5-rating-label-full' );
					$rating.find( '.articleFeedbackv5-rating-clear' ).show();
				} else {
					$rating.find( '.articleFeedbackv5-rating-clear' ).hide();
				}
			},

			// }}}
			// {{{ enableSubmission

			/**
			 * Enables or disables submission of the form
			 *
			 * @param state bool true to enable; false to disable
			 */
			enableSubmission: function ( state ) {
				var $h = $.articleFeedbackv5.$holder;
				if ( state ) {
					if ($.articleFeedbackv5.successTimeout) {
						clearTimeout( $.articleFeedbackv5.successTimeout );
					}
					$h.find( '.articleFeedbackv5-submit' ).button( { 'disabled': false } );
					$h.find( '.articleFeedbackv5-success span' ).hide();
					$h.find( '.articleFeedbackv5-pending span' ).fadeIn( 'fast' );
				} else {
					$h.find( '.articleFeedbackv5-submit' ).button( { 'disabled': true } );
					$h.find( '.articleFeedbackv5-pending span' ).hide();
				}
			},

			// }}}
			// {{{ enableExpertise

			/**
			 * Enables the expertise checkboxes
			 *
			 * @param element $el the element containing checkboxes to enable
			 */
			enableExpertise: function ( $el ) {
				$el.find( 'input:checkbox[value=general]' )
					.attr( 'disabled', false )
				$el.find( '.articleFeedbackv5-expertise-disabled' )
					.removeClass( 'articleFeedbackv5-expertise-disabled' );
			},

			// }}}
			// {{{ updateMailValidityLabel

			/**
			 * Given an email sting, gets validity status (true, false, null) and updates
			 * the label's CSS class
			 *
			 * @param string mail the email address
			 */
			updateMailValidityLabel: function ( mail ) {
				var	isValid = mw.util.validateEmail( mail );
				var $label = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-helpimprove-email' );
				if ( isValid === null ) { // empty address
					$label.removeClass( 'valid invalid' );
				} else if ( isValid ) {
					$label.addClass( 'valid' ).removeClass( 'invalid' );
				} else {
					$label.addClass( 'invalid' ).removeClass( 'valid' );
				}
			},

			// }}}
			// {{{ loadAggregateRatings

			/**
			 * Pulls the aggregate ratings via ajax request
			 * the label's CSS class
			 */
			loadAggregateRatings: function () {
				$.ajax( {
					'url': $.articleFeedbackv5.apiUrl,
					'type': 'GET',
					'dataType': 'json',
					'data': {
						'action': 'query',
						'format': 'json',
						'list': 'articlefeedbackv5-view-ratings',
						'afpageid': $.articleFeedbackv5.pageId,
						'afanontoken': $.articleFeedbackv5.userId,
						'maxage': 0,
						'smaxage': mw.config.get( 'wgArticleFeedbackSMaxage' )
					},
					'success': function ( data ) {
						// Get data
						if (
							!( 'query' in data )
							|| !( 'articlefeedbackv5-view-ratings' in data.query )
							|| !( 'rollup' in data.query['articlefeedbackv5-view-ratings'] )
						) {
							mw.log( 'ArticleFeedback invalid response error.' );
							var msg = 'ArticleFeedback invalid response error.';
							if ( 'error' in data && 'info' in data.error ) {
								msg = data.error.info;
							} else {
								console.log(data);
							}
							$.articleFeedbackv5.currentBucket().markShowstopperError( msg );
							return;
						}
						var rollup = data.query['articlefeedbackv5-view-ratings'].rollup;

						// Ratings
						$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-rating' ).each( function () {
							var name = $(this).attr( 'rel' );
							var info = $.articleFeedbackv5.currentBucket().ratingInfo;
							var rating = name in info && info[name] in rollup ? rollup[info[name]] : null;
							if (
								rating !== null
								&& 'total' in rating
								&& 'count' in rating
								&& rating.total > 0
							) {
								var average = Math.round( ( rating.total / rating.count ) * 10 ) / 10;
								$(this).find( '.articleFeedbackv5-rating-average' )
									.text( mw.language.convertNumber( average + ( average % 1 === 0 ? '.0' : '' ) , false ) );
								$(this).find( '.articleFeedbackv5-rating-meter div' )
									.css( 'width', Math.round( average * 21 ) + 'px' );
								$(this).find( '.articleFeedbackv5-rating-count' )
									.text( mw.msg( 'articlefeedbackv5-report-ratings', rating.count ) );
							} else {
								// Special case for no ratings
								$(this).find( '.articleFeedbackv5-rating-average' )
									.html( '&nbsp;' );
								$(this).find( '.articleFeedbackv5-rating-meter div' )
									.css( 'width', 0 );
								$(this).find( '.articleFeedbackv5-rating-count' )
									.text( mw.msg( 'articlefeedbackv5-report-empty' ) );
							}
						} );

						// Expiration
						if ( typeof feedback.status === 'string' && feedback.status === 'expired' ) {
							$.articleFeedbackv5.$holder.addClass( 'articleFeedbackv5-expired' );
							$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-expiry' )
								.slideDown( 'fast' );
						} else {
							$.articleFeedbackv5.$holder.removeClass( 'articleFeedbackv5-expired' )
							$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-expiry' )
								.slideUp( 'fast' );
						}

						// Status change - un-new the rating controls
						$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-rating-new' )
							.removeClass( 'articleFeedbackv5-rating-new' );
					},
					'error': function () {
						mw.log( 'Report loading error' );
						$.articleFeedbackv5.currentBucket().markShowstopperError( 'Report loading error' );
						$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-error' ).show();
					}
				} );

			},

			// }}}
			// {{{ getFormData

			/**
			 * Pulls down form data
			 *
			 * @return object the form data
			 */
			getFormData: function () {
				var data = {};
				var info = $.articleFeedbackv5.currentBucket().ratingInfo;
				for ( var key in info ) {
					var id = info[key];
					data['r' + id] = $.articleFeedbackv5.$holder.find( 'input[name="r' + id + '"]' ).val();
				}
				var expertise = [];
				$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-expertise input:checked' ).each( function () {
					expertise.push( $(this).val() );
				} );
				data.expertise = expertise.join( '|' );
				return data;
			},

			// }}}
			// {{{ localValidation

			/**
			 * Performs any local validation
			 *
			 * @param  object formdata the form data
			 * @return mixed  if ok, false; otherwise, an object as { 'field name' : 'message' }
			 */
			localValidation: function ( formdata ) {
				var error = {};
				var ok = true;
				if ( $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-helpimprove input:checked' ).length > 0 ) {
					var mail = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-helpimprove-email' ).val();
					if ( !mw.util.validateEmail( mail ) ) {
						error.helpimprove_email = 'That email address is not valid';
						ok = false;
					}
				}
				return ok ? false : error;
			},

			// }}}
			// {{{ lockForm

			/**
			 * Locks the form
			 */
			lockForm: function () {
				$.articleFeedbackv5.currentBucket().enableSubmission( false );
				$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-lock' ).show();
			},

			// }}}
			// {{{ unlockForm

			/**
			 * Unlocks the form
			 */
			unlockForm: function () {
				$.articleFeedbackv5.currentBucket().enableSubmission( true );
				$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-lock' ).hide();
			},

			// }}}
			// {{{ markFormError

			/**
			 * Marks any errors on the form
			 *
			 * @param object error errors, indexed by field name
			 */
			markFormError: function ( error ) {
				if ( '_api' in error ) {
					if ($.articleFeedbackv5.debug) {
						$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-error-message' )
							.html( error._api.info.replace( "\n", '<br />' ) );
					}
					$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-error' ).show();
				} else {
					if ( 'helpimprove_email' in error ) {
						$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-helpimprove-email' )
							.addClass( 'invalid' )
							.removeClass( 'valid' );
					}
					alert( 'Validation error' );
					mw.log( 'Validation error' );
				}
				console.log( error );
			},

			// }}}
			// {{{ markShowstopperError

			/**
			 * Marks a showstopper error
			 *
			 * @param string message the message to display, if in dev
			 */
			markShowstopperError: function ( message ) {
				console.log( message );
				if ($.articleFeedbackv5.debug && message) {
					$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-error-message' ).html( message.replace( "\n", '<br />' ) );
				}
				var veil = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-error' );
				var box  = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-panel' );
				// TODO: Make this smarter -- on ubuntu/ff at least, using the
				// offset puts it about 100px down from where it should be;
				// this math corrects for it, but will most likely be wrong on
				// other browsers
				veil.css('top', box.find('.articleFeedbackv5-ui').offset().top / 2 + 10);
				veil.css('width', box.width());
				veil.css('height', box.height());
				veil.show();
			},

			// }}}
			// {{{ setSuccessState

			/**
			 * Sets the success state
			 */
			setSuccessState: function () {
				var $h = $.articleFeedbackv5.$holder;
				$h.find( '.articleFeedbackv5-success span' ).fadeIn( 'fast' );
				$.articleFeedbackv5.successTimeout = setTimeout( function () {
					$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-success span' )
						.fadeOut( 'slow' );
				}, 5000 );
			},

			// }}}
			// {{{ onSubmit

			/**
			 * Sends off the email tracking request alongside the regular form
			 * submit
			 */
			onSubmit: function () {

				$.articleFeedbackv5.currentBucket().loadAggregate = true;

/////////////////////////////////////////////////////////////////////////////////
// TODO: Email capture
/////////////////////////////////////////////////////////////////////////////////

//		'submit': function () {
//
//			// Build data from form values for 'action=emailcapture'
//			// Ignore if email was invalid
//			if ( context.$ui.find( '.articleFeedback-helpimprove-email.valid' ).length
//				// Ignore if email field was empty (it's optional)
//				 && !$.isEmpty( context.$ui.find( '.articleFeedback-helpimprove-email' ).val() )
//				 // Ignore if checkbox was unchecked (ie. user can enter and then decide to uncheck,
//				 // field fades out, then we shouldn't submit)
//				 && context.$ui.find('.articleFeedback-helpimprove input:checked' ).length
//			) {
//				$.ajax( {
//					'url': mw.config.get( 'wgScriptPath' ) + '/api.php',
//					'type': 'POST',
//					'dataType': 'json',
//					'context': context,
//					'data': {
//						'email': context.$ui.find( '.articleFeedback-helpimprove-email' ).val(),
//						'info': $.toJSON( {
//							'ratingData': data,
//							'pageTitle': mw.config.get( 'wgTitle' ),
//							'pageCategories': mw.config.get( 'wgCategories' )
//						} ),
//						'action': 'emailcapture',
//						'format': 'json'
//					},
//					'success': function ( data ) {
//						var context = this;
//
//						if ( 'error' in data ) {
//							mw.log( 'EmailCapture: Form submission error' );
//							mw.log( data.error );
//							updateMailValidityLabel( 'triggererror', context );
//
//						} else {
//							// Hide helpimprove-email for when user returns to Rate-view
//							// without reloading page
//							context.$ui.find( '.articleFeedback-helpimprove' ).hide();
//
//							// Set cookie if it was successful, so it won't be asked again
//							$.cookie(
//								prefix( 'helpimprove-email' ),
//								// Path must be set so it will be remembered
//								// for all article (not just current level)
//								// @XXX: '/' may be too wide (multi-wiki domains)
//								'hide', { 'expires': 30, 'path': '/' }
//							);
//						}
//					}
//				} );
//
//			// If something was invalid, reset the helpimprove-email part of the form.
//			// When user returns from submit, it will be clean
//			} else {
//				context.$ui
//					.find( '.articleFeedback-helpimprove' )
//						.find( 'input:checkbox' )
//							.removeAttr( 'checked' )
//							.end()
//						.find( '.articleFeedback-helpimprove-email' )
//							.val( '' )
//							.removeClass( 'valid invalid' );
//			}
//		},

			}

			// }}}

		},

		// }}}
		// {{{ Bucket 6

		/**
		 * Bucket 6: No form
		 */
		'6': { }

		// }}}

	};

	// }}}
	// {{{ CTA objects

	/**
	 * Set up the CTA options' UI objects
	 */
	$.articleFeedbackv5.ctas = {

		// {{{ CTA 1: Encticement to edit

		'1': {

			// {{{ build

			/**
			 * Builds the CTA
			 *
			 * @return Element the form
			 */
			build: function () {

				// The overall template
				var block_tpl = '\
					<div class="articleFeedbackv5-panel">\
						<div class="articleFeedbackv5-buffer">\
							<h5 class="articleFeedbackv5-title">TODO: EDIT CTA</h5>\
							<p>Eventually this will have a pretty button and some nice messages.  For now, though...</p>\
							<p><a href="" class="articleFeedbackv5-edit-cta-link">EDIT THIS PAGE</a></p>\
						</div>\
					</div>\
					';

				// Start up the block to return
				var $block = $( block_tpl );

				// Fill in the link
				$block.find( '.articleFeedbackv5-edit-link' )
					.attr( 'href', mw.config.get( 'wgArticlePath' ).replace(
						'$1', mw.config.get( 'wgArticleFeedbackv5WhatsThisPage' )
					) );

				return $block;
			}

			// }}}

		},

		// }}}

	};

	// }}}
	// {{{ Initialization

	/**
	 * Initializes the object
	 *
	 * The init method sets up the object once the plugin has been called.  Note
	 * that this plugin is only intended be used on one element at a time.  Further
	 * calls to it will overwrite the existing object, so don't do it.
	 *
	 * @param $el    element the element on which this plugin was called (already
	 *                       jQuery-ized)
	 * @param config object  the config object
	 */
	$.articleFeedbackv5.init = function ( $el, config ) {
		$.articleFeedbackv5.$holder = $el;
		$.articleFeedbackv5.config = config;
		// Has the user already submitted ratings for this page at this revision?
		$.articleFeedbackv5.alreadySubmitted = $.cookie( $.articleFeedbackv5.prefix( 'submitted' ) ) === 'true';
		// Go ahead and load the form
		// When the tool is visible, load the form
		$.articleFeedbackv5.$holder.appear( function () {
			$.articleFeedbackv5.loadForm();
		} );
	};

	// }}}
	// {{{ Utility methods

	/**
	 * Utility method: Prefixes a key for cookies or events with extension and
	 * version information
	 *
	 * @param  key    string name of event to prefix
	 * @return string prefixed event name
	 */
	$.articleFeedbackv5.prefix = function ( key ) {
		var version = mw.config.get( 'wgArticleFeedbackv5Tracking' ).version || 0;
		return 'ext.articleFeedbackv5@' + version + '-' + key;
	};

	/**
	 * Utility method: Get the current bucket
	 *
	 * @return object the bucket
	 */
	$.articleFeedbackv5.currentBucket = function () {
		return $.articleFeedbackv5.buckets[$.articleFeedbackv5.bucketId];
	};

	/**
	 * Utility method: Get the current CTA
	 *
	 * @return object the cta
	 */
	$.articleFeedbackv5.currentCTA = function () {
		return $.articleFeedbackv5.ctas[$.articleFeedbackv5.ctaId];
	};

	// }}}
	// {{{ Form loading methods

	/**
	 * Loads the appropriate form
	 *
	 * The load method uses an ajax request to pull down the bucket ID, the
	 * feedback ID, and using those, build the form.
	 */
	$.articleFeedbackv5.loadForm = function () {
		$.ajax( {
			'url': $.articleFeedbackv5.apiUrl,
			'type': 'GET',
			'dataType': 'json',
			'data': {
				'list': 'articlefeedbackv5',
				'action': 'query',
				'format': 'json',
				'afsubaction': 'newform',
				'afanontoken': $.articleFeedbackv5.userId,
				'afpageid': $.articleFeedbackv5.pageId,
				'afrevid': $.articleFeedbackv5.revisionId
			},
			'success': function ( data ) {
				if ( !( 'form' in data ) || !( 'bucketId' in data.form ) ) {
					mw.log( 'ArticleFeedback invalid response error.' );
					if ( 'error' in data && 'info' in data.error ) {
						console.log(data.error.info);
					} else {
						console.log(data);
					}
					$.articleFeedbackv5.bucketId = 6; // No form
				} else {
					$.articleFeedbackv5.bucketId = data.form.bucketId;
				}
				$.articleFeedbackv5.buildForm( 'form' in data ? data.form.response : null );
			},
			'error': function () {
				mw.log( 'Report loading error' );
				$.articleFeedbackv5.buildForm();
			}
		} );
	};

	/**
	 * Build the form
	 *
	 * @param response object any existing answers
	 */
	$.articleFeedbackv5.buildForm = function ( response ) {
		$.articleFeedbackv5.bucketId = 5; // For now, only use Option 5
		var bucket = $.articleFeedbackv5.currentBucket();
		if ( !( 'buildForm' in bucket ) ) {
			return;
		}
		var $block = bucket.buildForm();
		if ( 'bindEvents' in bucket ) {
			bucket.bindEvents( $block );
		}
		if ( 'fillForm' in bucket ) {
			bucket.fillForm( $block, response );
		}
		$.articleFeedbackv5.$holder
			.html( $block )
			.append( '<div class="articleFeedbackv5-lock"></div>' );
	};

	// }}}
	// {{{ Form submission methods

	/**
	 * Submits the form
	 *
	 * This calls the Article Feedback API method, which stores the user's
	 * responses and returns the name of the CTA to be displayed, if the input
	 * passes local validation.  Local validation is defined by the bucket UI
	 * object.
	 */
	$.articleFeedbackv5.submitForm = function () {

		// For anonymous users, keep a cookie around so we know they've rated before
		if ( mw.user.anonymous() ) {
			$.cookie( $.articleFeedbackv5.prefix( 'rated' ), 'true', { 'expires': 365, 'path': '/' } );
		}

		// Get the form data
		var bucket = $.articleFeedbackv5.currentBucket();
		var formdata = {};
		if ( 'getFormData' in bucket ) {
			formdata = bucket.getFormData();
		}

		// Perform any local validation
		if ( 'localValidation' in bucket ) {
			var error = bucket.localValidation( formdata );
			if ( error ) {
				if ( 'markFormError' in bucket ) {
					bucket.markFormError( error );
				} else {
					alert( error.join( "\n" ) );
				}
				return;
			}
		}

		// If the form locks, lock it
		if ( 'lockForm' in bucket ) {
			bucket.lockForm( false );
		}

		// Send off the ajax request
		$.ajax( {
			'url': $.articleFeedbackv5.apiUrl,
			'type': 'POST',
			'dataType': 'json',
			'data': $.extend( formdata, {
				'action': 'articlefeedbackv5',
				'format': 'json',
				'anontoken': $.articleFeedbackv5.userId,
				'pageid': $.articleFeedbackv5.pageId,
				'revid': $.articleFeedbackv5.revisionId,
				'bucket': $.articleFeedbackv5.bucketId
			} ),
			'success': function( data ) {
				if ( 'error' in data ) {
					if ( 'markFormError' in bucket ) {
						bucket.markFormError( { _api : data.error } );
					} else {
						alert( 'ArticleFeedback: Form submission error : ' + data.error );
					}
				} else {
					if ( 'lockForm' in bucket ) {
						bucket.lockForm( false );
					}
					if ( 'onSuccess' in bucket ) {
						bucket.onSuccess( formdata );
					}
					$.articleFeedbackv5.showCTA();
				}
			},
			'error': function () {
				mw.log( 'Form submission error' );
				alert( 'ArticleFeedback: Form submission error' );
			}
		} );

		// Does the bucket need to do anything else on submit (alongside the
		// ajax request, not as a result of it)?
		if ( 'onSubmit' in bucket ) {
			bucket.onSubmit( formdata );
		}
	};

	// }}}
	// {{{ CTA methods

	/**
	 * Shows a CTA
	 *
	 * @param cta_name string the name of the CTA to display
	 */
	$.articleFeedbackv5.showCTA = function ( ctaId ) {
		$.articleFeedbackv5.ctaId = 1; // For now, just use the edit CTA
		var cta = $.articleFeedbackv5.currentCTA();
		if ( !( 'build' in cta ) ) {
			return;
		}
		var $block = cta.build();
		if ( 'bindEvents' in cta ) {
			cta.bindEvents( $block );
		}
		$.articleFeedbackv5.$holder.html( $block );
	};

	// }}}

// }}}
// {{{ articleFeedbackv5 plugin

/**
 * Can be called with an options object like...
 *
 * 	$( ... ).articleFeedbackv5( {
 * 		'ratings': {
 * 			'rating-name': {
 * 				'id': 1, // Numeric identifier of the rating, same as the rating_id value in the db
 * 				'label': 'msg-key-for-label', // String of message key for label
 * 				'tip': 'msg-key-for-tip', // String of message key for tip
 * 			},
 *			// More ratings here...
 * 		}
 * 	} );
 *
 * Rating IDs need to be included in $wgArticleFeedbackv5RatingTypes, which is an array mapping allowed IDs to rating names.
 */
$.fn.articleFeedbackv5 = function ( opts ) {
	if ( typeof( opts ) == 'object' ) {
		$.articleFeedbackv5.init( $( this ), opts );
	}
	return $( this );
};

// }}}

} )( jQuery );

