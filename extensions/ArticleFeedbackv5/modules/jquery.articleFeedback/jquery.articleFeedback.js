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
 *   1. Share Your Feedback
 *   	Has a yes/no toggle on "Did you find what you were looking for?" and a
 *   	text area for comments.
 *   2. Make A Suggestion
 *   	Modeled after getsatisfaction.com; users can say that their comment is a
 *   	suggestion, question, problem, or praise.
 *   3. Review This Page
 *   	Has a single star rating field and a comment box.
 *   4. Help Edit This Page
 *   	Has no input fields; just links to the Edit page.
 *   5. Rate This Page
 *   	The existing article feedback tool, except that it can use any of the
 *   	CTA types.
 *   6. No Feedback
 *   	Shows nothing at all.
 *
 * @package    ArticleFeedback
 * @subpackage Resources
 * @author     Reha Sterbin <reha@omniti.com>
 * @version    $Id$
 */

( function ( $ ) {

// {{{ articleFeedback definition

	$.articleFeedback = {};

	// {{{ Properties

	/**
	 * The bucket ID is the variation of the Article Feedback form chosen for this
	 * particualar user.  It will be passed in at load time, but if all else fails,
	 * default to Option Six (no form).
	 *
	 * @see http://www.mediawiki.org/wiki/Article_feedback/Version_5/Feature_Requirements#Feedback_form_interface
	 */
	$.articleFeedback.bucketId = 6;

	/**
	 * The feedback ID describes the unique combination of user id (or IP address,
	 * for anonymous readers), page id, and version id.  It will be passed in at
	 * load time, and must be passed back on submit so that only one response is
	 * recorded.  It defaults to zero, so that the submit api call knows that it
	 * must load or create the feedback record.
	 */
	$.articleFeedback.feedbackId = 0;

	/**
	 * Use the mediawiki util resource's config method to find the correct url to
	 * call for all ajax requests.
	 */
	$.articleFeedback.apiUrl = mw.config.get( 'wgScriptPath' ) + '/api.php';

	/**
	 * Is this an anonymous user?
	 */
	$.articleFeedback.anonymous = mw.user.anonymous();

	/**
	 * If not, what's their user id?
	 */
	$.articleFeedback.userId = mw.user.id();

	/**
	 * The page ID
	 */
	$.articleFeedback.pageId = mw.config.get( 'wgArticleId' );

	/**
	 * The revision ID
	 */
	$.articleFeedback.revisionId = mw.config.get( 'wgCurRevisionId' );

	// }}}
	// {{{ Bucket UI objects

	/**
	 * Set up the buckets' UI objects
	 */
	$.articleFeedback.buckets = {

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
			ratingInfo: mw.config.get( 'wgArticleFeedbackRatingTypesFlipped' ),

			/**
			 * Only certain users can see the expertise checkboxes and email
			 */
			showOptions: 'show' === mw.user.bucket( 'ext.articleFeedback-options', mw.config.get( 'wgArticleFeedbackOptions' ) ),

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
					<form>\
						<div class="articleFeedback-panel">\
							<div class="articleFeedback-buffer articleFeedback-ui">\
								<div class="articleFeedback-switch articleFeedback-switch-report articleFeedback-visibleWith-form" rel="report"><html:msg key="report-switch-label" /></div>\
								<div class="articleFeedback-switch articleFeedback-switch-form articleFeedback-visibleWith-report" rel="form"><html:msg key="form-switch-label" /></div>\
								<div class="articleFeedback-title articleFeedback-visibleWith-form"><html:msg key="form-panel-title" /></div>\
								<div class="articleFeedback-title articleFeedback-visibleWith-report"><html:msg key="report-panel-title" /></div>\
								<div class="articleFeedback-explanation articleFeedback-visibleWith-form"><a class="articleFeedback-explanation-link"><html:msg key="form-panel-explanation" /></a></div>\
								<div class="articleFeedback-description articleFeedback-visibleWith-report"><html:msg key="report-panel-description" /></div>\
								<div style="clear:both;"></div>\
								<div class="articleFeedback-ratings"></div>\
								<div style="clear:both;"></div>\
								<div class="articleFeedback-options">\
									<div class="articleFeedback-expertise articleFeedback-visibleWith-form" >\
										<input type="checkbox" value="general" disabled="disabled" /><label class="articleFeedback-expertise-disabled"><html:msg key="form-panel-expertise" /></label>\
										<div class="articleFeedback-expertise-options">\
											<div><input type="checkbox" value="studies" /><label><html:msg key="form-panel-expertise-studies" /></label></div>\
											<div><input type="checkbox" value="profession" /><label><html:msg key="form-panel-expertise-profession" /></label></div>\
											<div><input type="checkbox" value="hobby" /><label><html:msg key="form-panel-expertise-hobby" /></label></div>\
											<div><input type="checkbox" value="other" /><label><html:msg key="form-panel-expertise-other" /></label></div>\
											<div class="articleFeedback-helpimprove">\
												<input type="checkbox" value="helpimprove-email" />\
												<label><html:msg key="form-panel-helpimprove" /></label>\
												<input type="text" placeholder="" class="articleFeedback-helpimprove-email" />\
												<div class="articleFeedback-helpimprove-note"></div>\
											</div>\
										</div>\
									</div>\
									<div style="clear:both;"></div>\
								</div>\
								<button class="articleFeedback-submit articleFeedback-visibleWith-form" type="submit" disabled="disabled"><html:msg key="form-panel-submit" /></button>\
								<div class="articleFeedback-success articleFeedback-visibleWith-form"><span><html:msg key="form-panel-success" /></span></div>\
								<div class="articleFeedback-pending articleFeedback-visibleWith-form"><span><html:msg key="form-panel-pending" /></span></div>\
								<div style="clear:both;"></div>\
								<div class="articleFeedback-notices articleFeedback-visibleWith-form">\
									<div class="articleFeedback-expiry">\
										<div class="articleFeedback-expiry-title"><html:msg key="form-panel-expiry-title" /></div>\
										<div class="articleFeedback-expiry-message"><html:msg key="form-panel-expiry-message" /></div>\
									</div>\
								</div>\
							</div>\
							<div class="articleFeedback-error"><div class="articleFeedback-error-message"><html:msg key="error" /></div></div>\
							<div class="articleFeedback-pitches"></div>\
							<div style="clear:both;"></div>\
						</div>\
						<input type="hidden" name="feedback_id" value="" />\
					</form>\
					';

				// A single rating block
				var rating_tpl = '\
					<div class="articleFeedback-rating">\
						<div class="articleFeedback-label"></div>\
						<input type="hidden" />\
						<div class="articleFeedback-rating-labels articleFeedback-visibleWith-form">\
							<div class="articleFeedback-rating-label" rel="1"></div>\
							<div class="articleFeedback-rating-label" rel="2"></div>\
							<div class="articleFeedback-rating-label" rel="3"></div>\
							<div class="articleFeedback-rating-label" rel="4"></div>\
							<div class="articleFeedback-rating-label" rel="5"></div>\
							<div class="articleFeedback-rating-clear"></div>\
						</div>\
						<div class="articleFeedback-visibleWith-form">\
							<div class="articleFeedback-rating-tooltip"></div>\
						</div>\
						<div class="articleFeedback-rating-average articleFeedback-visibleWith-report"></div>\
						<div class="articleFeedback-rating-meter articleFeedback-visibleWith-report"><div></div></div>\
						<div class="articleFeedback-rating-count articleFeedback-visibleWith-report"></div>\
						<div style="clear:both;"></div>\
					</div>\
					';

				// Start up the block to return
				var block = $( block_tpl );

				// Add the ratings from the options
				block.find( '.articleFeedback-ratings' ).each( function () {
					for ( var key in $.articleFeedback.buckets[5].ratingInfo ) {
						var	tip_msg = 'articlefeedback-field-' + key + '-tip';
						var label_msg = 'articlefeedback-field-' + key + '-label';
						var rtg = $( rating_tpl ).attr( 'rel', key );
						rtg.find( '.articleFeedback-label' )
							.attr( 'title', mw.msg( tip_msg ) )
							.text( mw.msg( label_msg ) );
						rtg.find( '.articleFeedback-rating-clear' )
							.attr( 'title', mw.msg( 'articlefeedback-form-panel-clear' ) );
						rtg.appendTo( $(this) );
					}
				} );

				// Fill in the link to the What's This page
				block.find( '.articleFeedback-explanation-link' )
					.attr( 'href', mw.config.get( 'wgArticlePath' ).replace(
						'$1', mw.config.get( 'wgArticleFeedbackWhatsThisPage' )
					) );

				// Fill in the Help Improve message and links
				block.find( '.articleFeedback-helpimprove-note' )
					// Can't use .text() with mw.message(, /* $1 */ link).toString(),
					// because 'link' should not be re-escaped (which would happen if done by mw.message)
					.html( function () {
						var link = mw.html.element(
							'a', {
								href: mw.util.wikiGetlink( mw.msg('articlefeedback-form-panel-helpimprove-privacylink') )
							}, mw.msg('articlefeedback-form-panel-helpimprove-privacy')
						);
						return mw.html.escape( mw.msg( 'articlefeedback-form-panel-helpimprove-note') )
							.replace( /\$1/, mw.message( 'parentheses', link ).toString() );
					});
				block.find( '.articleFeedback-helpimprove-email' )
					.attr( 'placeholder', mw.msg( 'articlefeedback-form-panel-helpimprove-email-placeholder' ) )
					.placeholder(); // back. compat. for older browsers

				// Localize the block
				block.localize( { 'prefix': 'articlefeedback-' } );

				// Activate tooltips
				block.find( '[title]' )
					.tipsy( {
						'gravity': 'sw',
						'center': false,
						'fade': true,
						'delayIn': 300,
						'delayOut': 100
					} );

				// Set id and for on expertise checkboxes
				block.find( '.articleFeedback-expertise input:checkbox' )
					.each( function () {
						var id = 'articleFeedback-expertise-' + $(this).attr( 'value' );
						$(this).attr( 'id', id );
						$(this).next().attr( 'for', id );
					} );
				block.find( '.articleFeedback-helpimprove > input:checkbox' )
					.each( function () {
						var id = 'articleFeedback-expertise-' + $(this).attr( 'value' );
						$(this).attr( 'id', id );
						$(this).next().attr( 'for', id );
					})

				// Turn the submit into a slick button
				block.find( '.articleFeedback-submit' )
					.button()
					.addClass( 'ui-button-blue' )

				// Hide report elements initially
				block.find( '.articleFeedback-visibleWith-report' ).hide();

				// Name the hidden rating fields
				block.find( '.articleFeedback-rating' )
					.each( function() {
						var name = $.articleFeedback.buckets[5].ratingInfo[$(this).attr( 'rel' )];
						$(this).find( 'input:hidden' ) .attr( 'name', 'r' + name );
					} );

				// Hide the additional options, if the user's in a bucket that
				// requires it
				if ( !$.articleFeedback.buckets[5].showOptions ) {
					block.find( '.articleFeedback-options' ).hide();
				}

				return block;
			},

			// }}}
			// {{{ bindEvents

			/**
			 * Binds any events
			 *
			 * @param block element the form block
			 */
			bindEvents: function (block) {

				// On-blur validity check for Help Improve email field
				block.find( '.articleFeedback-helpimprove-email' )
					.one( 'blur', function () {
						var el = $(this);
						updateMailValidityLabel( el.val(), context );
						el.keyup( function () {
							updateMailValidityLabel( el.val(), context );
						} );
					} );

				// Slide-down for the expertise checkboxes
				block.find( '.articleFeedback-expertise > input:checkbox' )
					.change( function () {
						var options = $.articleFeedback.context.find( '.articleFeedback-expertise-options' );
						console.log(options);
						if ( $(this).is( ':checked' ) ) {
							options.slideDown( 'fast' );
						} else {
							options.slideUp( 'fast', function () {
								options.find( 'input:checkbox' ).attr( 'checked', false );
							} );
						}
					} );

				// Enable submission when at least one rating is set
				block.find( '.articleFeedback-expertise input:checkbox' )
					.each( function () {
						var id = 'articleFeedback-expertise-' + $(this).attr( 'value' );
						$(this).click( function () {
							var bucket = $.articleFeedback.buckets[$.articleFeedback.bucketId];
							bucket.enableSubmission( true );
						} );
					} );

				// Clicking on the email field checks the associted box
				block.find( '.articleFeedback-helpimprove-email' )
					.bind( 'mousedown click', function ( e ) {
						$(this).closest( '.articleFeedback-helpimprove' )
							.find( 'input:checkbox' )
							.attr( 'checked', true );
					} );

				// Attach the submit
				block.find( '.articleFeedback-submit' )
					.click( function (e) {
						e.preventDefault();
						$.articleFeedback.submitForm();
					} );

				// Set up form/report switch behavior
				block.find( '.articleFeedback-switch' )
					.click( function( e ) {
						var ui = $.articleFeedback.context;
						ui.find( '.articleFeedback-visibleWith-' + $(this).attr( 'rel' ) )
							.show();
						ui.find( '.articleFeedback-switch' )
							.not( $(this) )
							.each( function() {
								ui.find( '.articleFeedback-visibleWith-' + $(this).attr( 'rel' ) ).hide();
							} );
						e.preventDefault();
						return false;
					} );

				// Set up rating behavior
				var rlabel = block.find( '.articleFeedback-rating-label' );
				rlabel.hover( function () {
					// mouse on
					var	el = $( this );
					var rating = el.closest( '.articleFeedback-rating' );
					el.addClass( 'articleFeedback-rating-label-hover-head' );
					el.prevAll( '.articleFeedback-rating-label' )
						.addClass( 'articleFeedback-rating-label-hover-tail' );
					rating.find( '.articleFeedback-rating-tooltip' )
						.text( mw.msg( 'articlefeedback-field-' + rating.attr( 'rel' ) + '-tooltip-' + el.attr( 'rel' ) ) )
						.show();
				}, function () {
					// mouse off
					var	el = $( this );
					var rating = el.closest( '.articleFeedback-rating' );
					el.removeClass( 'articleFeedback-rating-label-hover-head' );
					el.prevAll( '.articleFeedback-rating-label' )
						.removeClass( 'articleFeedback-rating-label-hover-tail' );
					rating.find( '.articleFeedback-rating-tooltip' )
						.hide();
					var bucket = $.articleFeedback.buckets[$.articleFeedback.bucketId];
					bucket.updateRating( rating );
				});
				rlabel.mousedown( function() {
					var bucket = $.articleFeedback.buckets[$.articleFeedback.bucketId];
					bucket.enableSubmission( true );
					var ui = $.articleFeedback.context;
					if ( ui.hasClass( 'articleFeedback-expired' ) ) {
						// Changing one means the rest will get submitted too
						ui.removeClass( 'articleFeedback-expired' );
						ui.find( '.articleFeedback-rating' )
							.addClass( 'articleFeedback-rating-new' );
					}
					ui.find( '.articleFeedback-expertise' )
						.each( function() {
							bucket.enableExpertise( $(this) );
						} );
					var el = $( this );
					var rating = el.closest( '.articleFeedback-rating' );
					rating.addClass( 'articleFeedback-rating-new' );
					rating.find( 'input:hidden' ).val( el.attr( 'rel' ) );
					el.addClass( 'articleFeedback-rating-label-down' );
					el.nextAll()
						.removeClass( 'articleFeedback-rating-label-full' );
					el.parent().find( '.articleFeedback-rating-clear' ).show();
				} );
				rlabel.mouseup( function() {
					$(this).removeClass( 'articleFeedback-rating-label-down' );
				} );

				// Icon to clear out the ratings
				block.find( '.articleFeedback-rating-clear' )
					.click( function() {
						var bucket = $.articleFeedback.buckets[$.articleFeedback.bucketId];
						bucket.enableSubmission( true );
						$(this).hide();
						var rating = $(this).closest( '.articleFeedback-rating' );
						rating.find( 'input:hidden' ).val( 0 );
						bucket.updateRating( rating );
					} );

			},

			// }}}
			// {{{ updateRating

			/**
			 * Updates the stars to match the associated hidden field
			 *
			 * @param rating the rating block
			 */
			updateRating: function ( rating ) {
				rating.find( '.articleFeedback-rating-label' )
					.removeClass( 'articleFeedback-rating-label-full' );
				var val = rating.find( 'input:hidden' ).val();
				var label = rating.find( '.articleFeedback-rating-label[rel="' + val + '"]' );
				if ( label.length ) {
					label.prevAll( '.articleFeedback-rating-label' )
						.add( label )
						.addClass( 'articleFeedback-rating-label-full' );
					label.nextAll( '.articleFeedback-rating-label' )
						.removeClass( 'articleFeedback-rating-label-full' );
					rating.find( '.articleFeedback-rating-clear' ).show();
				} else {
					rating.find( '.articleFeedback-rating-clear' ).hide();
				}
			},

			// }}}
			// {{{ fillForm

			/**
			 * Fills in the form
			 *
			 * @param block      element the form block
			 * @param feedbackId int     the feedback ID
			 * @param response   object  any responses already submitted
			 */
			fillForm: function (block, feedbackId, response) {
			},

			// }}}
			// {{{ enableSubmission

			/**
			 * Enables or disables submission of the form
			 *
			 * @param state bool true to enable; false to disable
			 */
			enableSubmission: function ( state ) {
				var ui = $.articleFeedback.context;
				if ( state ) {
					if ($.articleFeedback.successTimeout) {
						clearTimeout( $.articleFeedback.successTimeout );
					}
					ui.find( '.articleFeedback-submit' ).button( { 'disabled': false } );
					ui.find( '.articleFeedback-success span' ).hide();
					ui.find( '.articleFeedback-pending span' ).fadeIn( 'fast' );
				} else {
					ui.find( '.articleFeedback-submit' ).button( { 'disabled': true } );
					ui.find( '.articleFeedback-pending span' ).hide();
				}
			},

			// }}}
			// {{{ enableExpertise

			/**
			 * Enables the expertise checkboxes
			 *
			 * @param element el the element containing checkboxes to enable
			 */
			enableExpertise: function ( el ) {
				el.find( 'input:checkbox[value=general]' )
					.attr( 'disabled', false )
				el.find( '.articleFeedback-expertise-disabled' )
					.removeClass( 'articleFeedback-expertise-disabled' );
			},

			// }}}
			// {{{ getFormData

			/**
			 * Pulls down form data
			 *
			 * @return object the form data
			 */
			getFormData: function () {
				var formdata = {};
				return formdata;
			},

			// }}}
			// {{{ localValidation

			/**
			 * Performs any local validation
			 *
			 * @param  object formdata the form data
			 * @return object any errors, indexed by field name
			 */
			localValidation: function ( formdata ) {
				var error = {};
				return error.length > 0 ? error : false;
			},

			// }}}
			// {{{ markFormError

			/**
			 * Marks any errors on the form
			 *
			 * @param object error errors, indexed by field name
			 */
			markFormError: function ( error ) {
			},

			// }}}
			// {{{ setSuccessState

			/**
			 * Sets the success state
			 */
			setSuccessState: function () {
				var ui = $.articleFeedback.context;
				ui.find( '.articleFeedback-success span' ).fadeIn( 'fast' );
				$.articleFeedback.successTimeout = setTimeout( function() {
					$.articleFeedback.context.find( '.articleFeedback-success span' )
						.fadeOut( 'slow' );
				}, 5000 );
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
	$.articleFeedback.ctas = {

		// {{{ Edit CTA

		'edit': {

			// {{{ build

			/**
			 * Builds the CTA
			 *
			 * @return Element the form
			 */
			build: function () {

				// The overall template
				var block_tpl = '\
					<div class="articleFeedback-cta-panel">\
						<h5>TODO: EDIT CTA</h5>\
						<p>Eventually this will have a pretty button and some nice messages.  For now, though...</p>\
						<p><a href="" class="articleFeedback-edit-cta-link">EDIT THIS PAGE</a></p>\
					</div>\
					';

				// Start up the block to return
				var block = $( block_tpl );

				// Fill in the link
				block.find( '.articleFeedback-edit-link' )
					.attr( 'href', mw.config.get( 'wgArticlePath' ).replace(
						'$1', mw.config.get( 'wgArticleFeedbackWhatsThisPage' )
					) );

				return block;
			}

			// }}}

		},

		// }}}
		// {{{ Survey CTA

		'survey': {

			// {{{ build

			/**
			 * Builds the CTA
			 *
			 * @return Element the form
			 */
			build: function () {

				// The overall template
				var block_tpl = '\
					<div class="articleFeedback-survey-panel">\
						<h5>TODO: SURVEY GOES HERE</h5>\
						<p>I haven\'t gotten around to porting the survey.</p>\
					</div>\
					';

				// Start up the block to return
				var block = $( block_tpl );

				return block;
			}

			// }}}

		}

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
	 * @param el     element the element on which this plugin was called (already
	 *                       jQuery-ized)
	 * @param config object  the config object
	 */
	$.articleFeedback.init = function ( el, config ) {
		$.articleFeedback.context = el;
		$.articleFeedback.config = config;
		// Has the user already submitted ratings for this page at this revision?
		$.articleFeedback.alreadySubmitted = $.cookie( $.articleFeedback.prefix( 'submitted' ) ) === 'true';
		// Go ahead and load the form
		// When the tool is visible, load the form
		$.articleFeedback.context.appear( function() {
			$.articleFeedback.loadForm();
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
	$.articleFeedback.prefix = function ( key ) {
		var version = mw.config.get( 'wgArticleFeedbackTracking' ).version || 0;
		return 'ext.articleFeedback@' + version + '-' + key;
	};

	// }}}
	// {{{ Form loading methods

	/**
	 * Loads the appropriate form
	 *
	 * The load method uses an ajax request to pull down the bucket ID, the
	 * feedback ID, and using those, build the form.
	 */
	$.articleFeedback.loadForm = function () {
		$.ajax( {
			'url': $.articleFeedback.apiUrl,
			'type': 'GET',
			'dataType': 'json',
			'data': {
				'list': 'articlefeedback',
				'action': 'query',
				'format': 'json',
				'afsubaction': 'newform',
				'afanontoken': $.articleFeedback.userId,
				'afpageid': $.articleFeedback.pageId,
				'afrevid': $.articleFeedback.revisionId
			},
			'success': function ( data ) {
				if ( !( 'bucketId' in data ) ) {
					mw.log( 'ArticleFeedback invalid response error (bucketId).' );
				} else if ( !( 'feedbackId' in data.query ) ) {
					mw.log( 'ArticleFeedback invalid response error (feedbackId).' );
				} else {
					$.articleFeedback.bucketId = data.bucketId;
					$.articleFeedback.feedbackId = data.feedbackId;
				}
				$.articleFeedback.buildForm(data.response);
			},
			'error': function () {
				mw.log( 'Report loading error' );
				$.articleFeedback.buildForm();
			}
		} );
	};

	/**
	 * Build the form
	 *
	 * @param response object any existing answers
	 */
	$.articleFeedback.buildForm = function (response) {
		$.articleFeedback.bucketId = 5; // For now, just use Option 5
		var bucket = $.articleFeedback.buckets[$.articleFeedback.bucketId];
		if (typeof(bucket.buildForm) == 'undefined') {
			return;
		}
		var block = bucket.buildForm($.articleFeedback.feedbackId);
		if (typeof(bucket.bindEvents) != 'undefined') {
			bucket.bindEvents(block);
		}
		if (typeof(bucket.fillForm) != 'undefined') {
			bucket.fillForm(block, $.articleFeedback.feedbackId, response);
		}
		$.articleFeedback.context
			.html(block)
			.append('<div class="articleFeedback-lock"></div>');
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
	$.articleFeedback.submitForm = function () {

		// Get the form data
		var bucket = $.articleFeedback.buckets[$.articleFeedback.bucketId];
		var formdata = {};
		if ( typeof ( bucket.getFormData ) == 'undefined' ) {
			formdata = bucket.getFormData();
		}

		// Perform any local validation
		if ( typeof ( bucket.localValidation ) != 'undefined' ) {
			var error = bucket.localValidation( formdata );
			if ( error ) {
				if ( typeof ( bucket.markFormError ) != 'undefined' ) {
					bucket.markFormError( error );
				} else {
					alert( error.join( "\n" ) );
				}
			}
		}

		// Send off the ajax request
		// START HERE
		alert('This should run an ajax request');

	};

	// }}}

// }}}
// {{{ articleFeedback plugin

/**
 * Can be called with an options object like...
 *
 * 	$( ... ).articleFeedback( {
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
 * Rating IDs need to be included in $wgArticleFeedbackRatingTypes, which is an array mapping allowed IDs to rating names.
 */
$.fn.articleFeedback = function ( opts ) {
	if ( typeof( opts ) == 'object' ) {
		$.articleFeedback.init( $( this ), opts );
	}
	return $( this );
};

// }}}

} )( jQuery );
