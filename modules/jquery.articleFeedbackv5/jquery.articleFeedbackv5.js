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
 *   0. No Feedback
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
	 * Are we in debug mode?
	 */
	$.articleFeedbackv5.debug = mw.config.get( 'wgArticleFeedbackv5Debug' ) ? true : false;

	/**
	 * Has the form been loaded yet?
	 */
	$.articleFeedbackv5.isLoaded = false;

	/**
	 * Are we currently in a dialog?
	 */
	$.articleFeedbackv5.inDialog = false;

	/**
	 * Is form submission enabled?
	 */
	$.articleFeedbackv5.submissionEnabled = false;

	/**
	 * The bucket ID is the variation of the Article Feedback form chosen for this
	 * particualar user.  It set at load time, but if all else fails, default to
	 * Bucket 6 (no form).
	 *
	 * @see http://www.mediawiki.org/wiki/Article_feedback/Version_5/Feature_Requirements#Feedback_form_interface
	 */
	$.articleFeedbackv5.bucketId = '0';

	/**
	 * The CTA is the view presented to a user who has successfully submitted
	 * feedback.
	 *
	 * @see http://www.mediawiki.org/wiki/Article_feedback/Version_5/Feature_Requirements#Calls_to_Action
	 */
	$.articleFeedbackv5.ctaId = '1';

	/**
	 * The link ID indicates where the user clicked (or not) to get to the
	 * feedback form.  Options are:
	 *  0: No link; user scrolled to the bottom of the page
	 *  1: Section bars
	 *  2: Title bar
	 *  3: Vertical button
	 *  4: Toolbox (bottom of left nav)
	 *
	 * @see http://www.mediawiki.org/wiki/Article_feedback/Version_5/Feature_Requirements#Placement
	 */
	$.articleFeedbackv5.linkId = '0';

	/**
	 * Use the mediawiki util resource's config method to find the correct url to
	 * call for all ajax requests.
	 */
	$.articleFeedbackv5.apiUrl = mw.util.wikiScript( 'api' );

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

	/**
	 * Whether we're showing a form, a CTA, or nothing
	 */
	$.articleFeedbackv5.nowShowing = 'none';

	/**
	 * The feedback ID (collected on submit, for use in tracking edits)
	 */
	$.articleFeedbackv5.feedbackId = 0;

	// }}}
	// {{{ Templates

	$.articleFeedbackv5.templates = {

		panelOuter: '\
			<div class="articleFeedbackv5-panel">\
				<div class="articleFeedbackv5-buffer">\
					<div class="articleFeedbackv5-title-wrap">\
						<h2 class="articleFeedbackv5-title"></h2>\
					</div>\
					<div class="articleFeedbackv5-ui" />\
				</div>\
				<div class="articleFeedbackv5-error"><div class="articleFeedbackv5-error-message"></div></div>\
				<div style="clear:both;"></div>\
			</div>\
			',

		dialogInner: '\
			<div class="articleFeedbackv5-dialog-inner">\
				<div class="articleFeedbackv5-buffer">\
				</div>\
				<div class="articleFeedbackv5-error"><div class="articleFeedbackv5-error-message"></div></div>\
				<div style="clear:both;"></div>\
			</div>\
			',

		helpToolTip: '\
			<div class="articleFeedbackv5-tooltip-wrap">\
				<a class="articleFeedbackv5-tooltip-trigger"></a>\
				<div class="articleFeedbackv5-tooltip">\
					<div class="tooltip-top"></div>\
					<div class="tooltip-repeat">\
						<h3><html:msg key="help-tooltip-title" /></h3><span class="articleFeedbackv5-tooltip-close">X</span>\
						<div class="clear"></div>\
						<p class="articleFeedbackv5-tooltip-info"><html:msg key="help-tooltip-info" /></p>\
						<p><a target="_blank" class="articleFeedbackv5-tooltip-link"><html:msg key="help-tooltip-linktext" />&nbsp;&gt;&gt;</a></p>\
					</div>\
					<div class="tooltip-bottom"></div>\
				</div>\
			</div>\
			',

		clear: '<div class="clear"></div>'

	};

	// }}}
	// {{{ Bucket UI objects

	/**
	 * Set up the buckets' UI objects
	 */
	$.articleFeedbackv5.buckets = {

		// {{{ Bucket 0

		/**
		 * Bucket 0: No form
		 */
		'0': { },

		// }}}
		// {{{ Bucket 1

		/**
		 * Bucket 1: Share Your Feedback
		 */
		'1': {

			// {{{ templates

			/**
			 * Pull out the markup so it's easy to find
			 */
			templates: {

				/**
				 * The template for the whole block
				 */
				block: '\
					<form>\
						<div class="articleFeedbackv5-top-error"></div>\
						<div class="form-row articleFeedbackv5-bucket1-toggle">\
							<p class="instructions-left"><html:msg key="bucket1-question-toggle" /></p>\
							<div class="buttons">\
								<div class="form-item" rel="yes" id="articleFeedbackv5-bucket1-toggle-wrapper-yes">\
									<label for="articleFeedbackv5-bucket1-toggle-yes"><html:msg key="bucket1-toggle-found-yes-full" /></label>\
									<span class="articleFeedbackv5-button-placeholder"><html:msg key="bucket1-toggle-found-yes" value="yes" /></span>\
									<input type="radio" name="toggle" id="articleFeedbackv5-bucket1-toggle-yes" class="query-button" value="yes" />\
								</div>\
								<div class="form-item" rel="no" id="articleFeedbackv5-bucket1-toggle-wrapper-no">\
									<label for="articleFeedbackv5-bucket1-toggle-no"><html:msg key="bucket1-toggle-found-no-full" /></label>\
									<span class="articleFeedbackv5-button-placeholder"><html:msg key="bucket1-toggle-found-no" /></span>\
									<input type="radio" name="toggle" id="articleFeedbackv5-bucket1-toggle-no" class="query-button last" value="no" />\
								</div>\
								<div class="clear"></div>\
							</div>\
							<div class="clear"></div>\
						</div>\
						<div class="articleFeedbackv5-comment">\
							<textarea id="articleFeedbackv5-find-feedback" class="feedback-text" name="comment"></textarea>\
						</div>\
						<div class="articleFeedbackv5-disclosure">\
							<!-- <p class="articlefeedbackv5-shared-on-feedback"></p> -->\
							<p class="articlefeedbackv5-transparency-terms"></p>\
						</div>\
						<button class="articleFeedbackv5-submit" type="submit" disabled="disabled" id="articleFeedbackv5-submit-bttn"><html:msg key="bucket1-form-submit" /></button>\
						<div class="clear"></div>\
					</form>\
					'

			},

			// }}}
			// {{{ getTitle

			/**
			 * Gets the title
			 *
			 * @return string the title
			 */
			getTitle: function () {
				return mw.msg( 'articlefeedbackv5-bucket1-title' );
			},

			// }}}
			// {{{ buildForm

			/**
			 * Builds the empty form
			 *
			 * @return Element the form
			 */
			buildForm: function () {

				// Start up the block to return
				var $block = $( $.articleFeedbackv5.currentBucket().templates.block );

				// Fill in the disclosure text
				$block.find( '.articlefeedbackv5-shared-on-feedback' )
					.html( $.articleFeedbackv5.buildLink(
						'articlefeedbackv5-shared-on-feedback',
						{
							href: mw.config.get( 'wgScript' ) + '?' + $.param( {
								title: mw.config.get( 'wgPageName' ),
								action: 'feedback'
							} ),
							text: 'articlefeedbackv5-shared-on-feedback-linktext',
							target: '_blank'
						} ) );
				$block.find( '.articlefeedbackv5-transparency-terms' )
					.html( $.articleFeedbackv5.buildLink(
						'articlefeedbackv5-transparency-terms',
						{
							href: mw.config.get( 'wgArticleFeedbackv5TermsPage' ),
							text: 'articlefeedbackv5-transparency-terms-linktext',
							target: '_blank'
						} ) );

				// Turn the submit into a slick button
				$block.find( '.articleFeedbackv5-submit' )
					.button()
					.addClass( 'ui-button-blue' )

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

				// Enable submission and switch out the comment default on toggle selection
				$block.find( '.articleFeedbackv5-button-placeholder' )
					.click( function ( e ) {
						var new_val = $( this ).parent().attr( 'rel' );
						var old_val = ( new_val == 'yes' ? 'no' : 'yes' );
						var $wrap = $.articleFeedbackv5.find( '#articleFeedbackv5-bucket1-toggle-wrapper-' + new_val );
						var $other_wrap = $.articleFeedbackv5.find( '#articleFeedbackv5-bucket1-toggle-wrapper-' + old_val );
						// make the button blue
						$wrap.find( 'span' ).addClass( 'articleFeedbackv5-button-placeholder-active' );
						$other_wrap.find( 'span' ).removeClass( 'articleFeedbackv5-button-placeholder-active' );
						// check/uncheck radio buttons
						$wrap.find( 'input' ).attr( 'checked', 'checked' );
						$other_wrap.find( 'input' ).removeAttr( 'checked' );
						// set default comment message
						var $txt = $.articleFeedbackv5.find( '.articleFeedbackv5-comment textarea' );
						var def_msg_yes = mw.msg( 'articlefeedbackv5-bucket1-question-comment-yes' );
						var def_msg_no = mw.msg( 'articlefeedbackv5-bucket1-question-comment-no' );
						if ( $txt.val() == '' || $txt.val() == def_msg_yes || $txt.val() == def_msg_no ) {
							$txt.val( new_val == 'yes' ? def_msg_yes : def_msg_no );
						}
						// enable submission
						$.articleFeedbackv5.enableSubmission( true );
					} );

				// Clear out the question on focus
				$block.find( '.articleFeedbackv5-comment textarea' )
					.focus( function () {
						var def_msg = '';
						var val = $.articleFeedbackv5.find( '.articleFeedbackv5-bucket1-toggle input[checked]' ).val();
						if ( val == 'yes' ) {
							def_msg = mw.msg( 'articlefeedbackv5-bucket1-question-comment-yes' );
						} else if ( val == 'no' ) {
							def_msg = mw.msg( 'articlefeedbackv5-bucket1-question-comment-no' );
						}
						if ( $( this ).val() == def_msg ) {
							$( this ).val( '' );
							$(this).addClass( 'active' );
						}

					} )
					.keyup ( function () {
						if( $( this ).val().length > 0 ) {
							$.articleFeedbackv5.enableSubmission( true );
						}
					} )
					.blur( function () {
						var def_msg = '';
						var val = $.articleFeedbackv5.find( '.articleFeedbackv5-bucket1-toggle input[checked]' ).val();
						if ( val == 'yes' ) {
							def_msg = mw.msg( 'articlefeedbackv5-bucket1-question-comment-yes' );
						} else if ( val == 'no' ) {
							def_msg = mw.msg( 'articlefeedbackv5-bucket1-question-comment-no' );
						}
						if ( $( this ).val() == '' ) {
							$( this ).val( def_msg );
							$(this).removeClass( 'active' );
						} else {
							$.articleFeedbackv5.enableSubmission( true );
						}
					} );


				// Attach the submit
				$block.find( '.articleFeedbackv5-submit' )
					.click( function ( e ) {
						e.preventDefault();
						$.articleFeedbackv5.submitForm();
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
				var $check = $.articleFeedbackv5.find( '.articleFeedbackv5-bucket1-toggle input[checked]' );
				if ( $check.val() == 'yes' ) {
					data.found = 1;
				} else if ( $check.val() == 'no' ) {
					data.found = 0;
				}
				data.comment = $.articleFeedbackv5.find( '.articleFeedbackv5-comment textarea' ).val();
				var def_msg_yes = mw.msg( 'articlefeedbackv5-bucket1-question-comment-yes' );
				var def_msg_no = mw.msg( 'articlefeedbackv5-bucket1-question-comment-no' );
				if ( data.comment == def_msg_yes || data.comment == def_msg_no ) {
					data.comment = '';
				}
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
				if ( ( !( 'comment' in formdata ) || formdata.comment == '' )
					&& !( 'found' in formdata ) ) {
					$.articleFeedbackv5.enableSubmission( false );
					error.nofeedback = mw.msg( 'articlefeedbackv5-error-nofeedback' );
					ok = false;
				}
				return ok ? false : error;
			}

			// }}}

		},

		// }}}
		// {{{ Bucket 2

		/**
		 * Bucket 2: Help Improve This Article
		 */
		'2': {

			// {{{ properties

			/**
			 * The tags available for this bucket
			 */
			tagInfo: mw.config.get( 'wgArticleFeedbackv5Bucket2TagNames' ),

			/**
			 * The comment default text, by tag (filled by buildForm)
			 */
			commentDefault: {},

			// }}}
			// {{{ templates

			/**
			 * Pull out the markup so it's easy to find
			 */
			templates: {

				/**
				 * The template for the whole block
				 */
				block: '\
					<form>\
						<div class="articleFeedbackv5-top-error"></div>\
						<div>\
							<div class="articleFeedbackv5-tags">\
								<ul></ul>\
								<div class="clear"></div>\
							</div>\
							<div class="clear"></div>\
						</div>\
						<div class="articleFeedbackv5-comment">\
							<textarea id="articleFeedbackv5-find-feedback" class="feedback-text" name="comment"></textarea>\
						</div>\
						<div class="articleFeedbackv5-disclosure">\
							<!-- <p class="articlefeedbackv5-shared-on-feedback"></p> -->\
							<p class="articlefeedbackv5-transparency-terms"></p>\
						</div>\
						<button class="articleFeedbackv5-submit" type="submit" disabled="disabled" id="articleFeedbackv5-submit-bttn">\
						<html:msg key="bucket2-form-submit" />\
						</button>\
						<div class="clear"></div>\
					</form>\
					',


				/**
				 * The template for a single tag
				 */
				tag: '\
					<li>\
						<span class="tag-selector"></span>\
						<label class="articleFeedbackv5-tag-label"></label>\
						<input name="articleFeedbackv5-bucket2-tag" type="radio" class="articleFeedbackv5-tag-input" />\
						<span class="clear"></span>\
					</li>\
					'

			},

			// }}}
			// {{{ getTitle

			/**
			 * Gets the title
			 *
			 * @return string the title
			 */
			getTitle: function () {
				return mw.msg( 'articlefeedbackv5-bucket2-title' );
			},

			// }}}
			// {{{ buildForm

			/**
			 * Builds the empty form
			 *
			 * @return Element the form
			 */
			buildForm: function () {

				// Start up the block to return
				var $block = $( $.articleFeedbackv5.currentBucket().templates.block );

				// Add the tags from the options
				$block.find( '.articleFeedbackv5-tags ul' ).each( function () {
					var info = $.articleFeedbackv5.currentBucket().tagInfo;
					for ( var i in info ) {
						var key = info[i];
						var comm_def_msg = 'articlefeedbackv5-bucket2-' + key + '-comment-default';
						$.articleFeedbackv5.currentBucket().commentDefault[key] = mw.msg( comm_def_msg );
						var label_msg = 'articlefeedbackv5-bucket2-' + key + '-label';
						var tag_id = 'articleFeedbackv5-bucket2-' + key;
						var $tag = $( $.articleFeedbackv5.currentBucket().templates.tag );
						$tag.attr( 'rel', key );
						$tag.find( '.articleFeedbackv5-tag-input' )
							.attr( 'id', tag_id )
							.val( key );
						$tag.find( '.articleFeedbackv5-tag-label' )
							.addClass( 'articleFeedbackv5-bucket2-' + key + '-label' )
							.attr( 'for', tag_id )
							.text( mw.msg( label_msg ) );
						$tag.appendTo( $( this ) );
					}
					$( $.articleFeedbackv5.templates.clear ).appendTo( $( this ) );
				} );

				// Fill in the disclosure text
				$block.find( '.articlefeedbackv5-shared-on-feedback' )
					.html( $.articleFeedbackv5.buildLink(
						'articlefeedbackv5-shared-on-feedback',
						{
							href: mw.config.get( 'wgScript' ) + '?' + $.param( {
								title: mw.config.get( 'wgPageName' ),
								action: 'feedback'
							} ),
							text: 'articlefeedbackv5-shared-on-feedback-linktext',
							target: '_blank'
						} ) );
				$block.find( '.articlefeedbackv5-transparency-terms' )
					.html( $.articleFeedbackv5.buildLink(
						'articlefeedbackv5-transparency-terms',
						{
							href: mw.config.get( 'wgArticleFeedbackv5TermsPage' ),
							text: 'articlefeedbackv5-transparency-terms-linktext',
							target: '_blank'
						} ) );

				// Turn the submit into a slick button
				$block.find( '.articleFeedbackv5-submit' )
					.button()
					.addClass( 'ui-button-blue' )

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

				// Enable submission and switch out the comment default on toggle selection
				$block.find( '.articleFeedbackv5-tags li' )
					.click( function ( e ) {
						var new_val = $( this ).attr( 'rel' );
						$.articleFeedbackv5.currentBucket().selectTag( new_val );
						$.articleFeedbackv5.enableSubmission( true );
					} );

				// Clear out the question on focus
				$block.find( '.articleFeedbackv5-comment textarea' )
					.focus( function () {
						var key = $.articleFeedbackv5.find( '.articleFeedbackv5-tags input[checked]' ).val();
						var def_msg = $.articleFeedbackv5.currentBucket().commentDefault[key];
						if ( $( this ).val() == def_msg ) {
							$( this ).val( '' );
							$(this).addClass( 'active' );
						}
					})
					.keyup ( function () {
						if( $( this ).val().length > 0 ) {
							$.articleFeedbackv5.enableSubmission( true );
						}
					} )
					.blur( function () {
						var key = $.articleFeedbackv5.find( '.articleFeedbackv5-tags input[checked]' ).val();
						var def_msg = $.articleFeedbackv5.currentBucket().commentDefault[key];
						if ( $( this ).val() == '' ) {
							$( this ).val( def_msg );
							$(this).removeClass( 'active' );
						} else {
							$.articleFeedbackv5.enableSubmission( true );
						}
					} );

				// Attach the submit
				$block.find( '.articleFeedbackv5-submit' )
					.click( function ( e ) {
						//alert( 'got to click event' );
						e.preventDefault();
						$.articleFeedbackv5.submitForm();
					} );

			},

			// }}}
			// {{{ afterBuild

			/**
			 * Handles any setup that has to be done once the markup is in the
			 * holder
			 */
			afterBuild: function () {

				// Default to 'suggestion'
				// $.articleFeedbackv5.currentBucket().selectTag( 'suggestion' );

			},

			// }}}
			// {{{ selectTag

			/**
			 * Selects a particular tag
			 *
			 * @param tag string the tag
			 */
			selectTag: function ( tag ) {
				var $c = $.articleFeedbackv5.find( '.articleFeedbackv5-comment textarea' );
				$.articleFeedbackv5.find( '.articleFeedbackv5-tags li' ).each( function () {
					var key = $( this ).attr( 'rel' );
					if ( key == tag ) {
						// Set checked
						$( this ).find( 'input' ).attr( 'checked', 'checked' );
						// Set active
						$( this ).addClass( 'active' );
						// Change out comment text
						var empty = false;
						if ( $c.val() == '') {
							empty = true;
						} else {
							for ( var t in $.articleFeedbackv5.currentBucket().commentDefault ) {
								if ( $c.val() == $.articleFeedbackv5.currentBucket().commentDefault[t] ) {
									empty = true;
								}
							}
						}
						if ( empty ) {
							$c.val( $.articleFeedbackv5.currentBucket().commentDefault[key] );
						}
					} else {
						// Clear checked
						$( this ).find( 'input' ).removeAttr( 'checked' );
						// Remove active
						$( this ).removeClass( 'active' );
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
				data.tag = $.articleFeedbackv5.find( '.articleFeedbackv5-tags input[checked]' ).val();
				data.comment = $.articleFeedbackv5.find( '.articleFeedbackv5-comment textarea' ).val();
				for ( var t in $.articleFeedbackv5.currentBucket().commentDefault ) {
					if ( data.comment == $.articleFeedbackv5.currentBucket().commentDefault[t] ) {
						data.comment = '';
					}
				}
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
				if ( !( 'comment' in formdata ) || formdata.comment == '' ) {
					$.articleFeedbackv5.enableSubmission( false );
					error.nofeedback = mw.msg( 'articlefeedbackv5-error-nofeedback' );
					ok = false;
				}
				return ok ? false : error;
			}

			// }}}

		},

		// }}}
		// {{{ Bucket 3

		/**
		 * Bucket 3: Help Improve This Article
		 */
		'3': {

			// {{{ templates

			/**
			 * Pull out the markup so it's easy to find
			 */
			templates: {

				/**
				 * The template for the whole block
				 */
				block: '\
					<form>\
						<div class="articleFeedbackv5-top-error"></div>\
						<div>\
							<p class="instructions-left"><html:msg key="bucket3-rating-question" /></p>\
							<div class="articleFeedbackv5-rating articleFeedbackv5-rating-new">\
								<input type="hidden" name="rating" value="0">\
								<div class="bucket3-rating">\
									<div class="articleFeedbackv5-rating-labels articleFeedbackv5-visibleWith-form">\
										<div class="articleFeedbackv5-rating-label" rel="1"></div>\
										<div class="articleFeedbackv5-rating-label" rel="2"></div>\
										<div class="articleFeedbackv5-rating-label" rel="3"></div>\
										<div class="articleFeedbackv5-rating-label" rel="4"></div>\
										<div class="articleFeedbackv5-rating-label" rel="5"></div>\
										<div class="articleFeedbackv5-rating-clear"></div>\
									</div>\
								</div>\
								<div style="clear:both;"></div>\
								<div class="articleFeedbackv5-visibleWith-form">\
									<div class="articleFeedbackv5-rating-tooltip"></div>\
								</div>\
							</div>\
							<div class="clear"></div>\
						</div>\
						<div class="articleFeedbackv5-comment">\
							<textarea id="articleFeedbackv5-find-feedback" class="feedback-text" name="comment"></textarea>\
						</div>\
						<div class="articleFeedbackv5-disclosure">\
							<!-- <p class="articlefeedbackv5-shared-on-feedback"></p> -->\
							<p class="articlefeedbackv5-transparency-terms"></p>\
						</div>\
						<button class="articleFeedbackv5-submit" type="submit" disabled="disabled" id="articleFeedbackv5-submit-bttn"><html:msg key="bucket3-form-submit" /></button>\
						<div class="clear"></div>\
					</form>\
					'

			},

			// }}}
			// {{{ getTitle

			/**
			 * Gets the title
			 *
			 * @return string the title
			 */
			getTitle: function () {
				return mw.msg( 'articlefeedbackv5-bucket3-title' );
			},

			// }}}
			// {{{ buildForm

			/**
			 * Builds the empty form
			 *
			 * @return Element the form
			 */
			buildForm: function () {

				// Start up the block to return
				var $block = $( $.articleFeedbackv5.currentBucket().templates.block );

				// Fill in the rating clear title
				var clear_msg = mw.msg( 'articlefeedbackv5-bucket3-clear-rating' );
				$block.find( '.articleFeedbackv5-rating-clear' )
					.attr( 'title', clear_msg );

				// Activate tooltips
				$block.find( '[title]' )
					.tipsy( {
						'gravity': 'sw',
						'center': false,
						'fade': true,
						'delayIn': 300,
						'delayOut': 100
					} );

				// Fill in the disclosure text
				$block.find( '.articlefeedbackv5-shared-on-feedback' )
					.html( $.articleFeedbackv5.buildLink(
						'articlefeedbackv5-shared-on-feedback',
						{
							href: mw.config.get( 'wgScript' ) + '?' + $.param( {
								title: mw.config.get( 'wgPageName' ),
								action: 'feedback'
							} ),
							text: 'articlefeedbackv5-shared-on-feedback-linktext',
							target: '_blank'
						} ) );
				$block.find( '.articlefeedbackv5-transparency-terms' )
					.html( $.articleFeedbackv5.buildLink(
						'articlefeedbackv5-transparency-terms',
						{
							href: mw.config.get( 'wgArticleFeedbackv5TermsPage' ),
							text: 'articlefeedbackv5-transparency-terms-linktext',
							target: '_blank'
						} ) );

				// Start with a default comment
				$block.find( '.articleFeedbackv5-comment textarea' )
					.val( mw.msg( 'articlefeedbackv5-bucket3-comment-default' ) );

				// Turn the submit into a slick button
				$block.find( '.articleFeedbackv5-submit' )
					.button()
					.addClass( 'ui-button-blue' )

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
						.text( mw.msg( 'articlefeedbackv5-bucket3-rating-tooltip-' + $el.attr( 'rel' ) ) )
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
					$.articleFeedbackv5.currentBucket().updateRating( $rating );
				});
				rlabel.mousedown( function () {
					$.articleFeedbackv5.enableSubmission( true );
					var $ui = $.articleFeedbackv5.find( 'articleFeedbackv5-ui' );
					if ( $ui.hasClass( 'articleFeedbackv5-expired' ) ) {
						// Changing one means the rest will get submitted too
						$ui.removeClass( 'articleFeedbackv5-expired' );
						$ui.find( '.articleFeedbackv5-rating' )
							.addClass( 'articleFeedbackv5-rating-new' );
					}
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
						$.articleFeedbackv5.enableSubmission( true );
						$(this).hide();
						var $rating = $(this).closest( '.articleFeedbackv5-rating' );
						$rating.find( 'input:hidden' ).val( 0 );
						$.articleFeedbackv5.currentBucket().updateRating( $rating );
					} );

				// Clear out the question on focus
				$block.find( '.articleFeedbackv5-comment textarea' )
					.focus( function () {
						var def_msg = mw.msg( 'articlefeedbackv5-bucket3-comment-default' );
						if ( $( this ).val() == def_msg ) {
							$( this ).val( '' );
							$(this).addClass( 'active' );
						}
					})
					.keyup ( function () {
						if( $( this ).val().length > 0 ) {
							$.articleFeedbackv5.enableSubmission( true );
						}
					} )
					.blur( function () {
						var def_msg = mw.msg( 'articlefeedbackv5-bucket3-comment-default' );
						if ( $( this ).val() == '' ) {
							$( this ).val( def_msg );
							$(this).removeClass( 'active' );
						} else {
							$.articleFeedbackv5.enableSubmission( true );
						}
					} );


				// Attach the submit
				$block.find( '.articleFeedbackv5-submit' )
					.click( function ( e ) {
						e.preventDefault();
						$.articleFeedbackv5.submitForm();
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
			// {{{ getFormData

			/**
			 * Pulls down form data
			 *
			 * @return object the form data
			 */
			getFormData: function () {
				var data = {};
				data.rating = $.articleFeedbackv5.find( '.articleFeedbackv5-rating input:hidden' ).val();
				data.comment = $.articleFeedbackv5.find( '.articleFeedbackv5-comment textarea' ).val();
				if ( data.comment == mw.msg( 'articlefeedbackv5-bucket3-comment-default' ) ) {
					data.comment = '';
				}
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
				if ( ( !( 'comment' in formdata ) || formdata.comment == '' )
					&& ( !( 'rating' in formdata ) || formdata.rating < 1 ) ) {
					$.articleFeedbackv5.enableSubmission( false );
					error.nofeedback = mw.msg( 'articlefeedbackv5-error-nofeedback' );
					ok = false;
				}
				return ok ? false : error;
			}

			// }}}

		},

		// }}}
		// {{{ Bucket 4

		/**
		 * Bucket 4: Help Improve This Article
		 */
		'4': {

			// {{{ templates

			/**
			 * Pull out the markup so it's easy to find
			 */
			templates: {

				/**
				 * The template for the whole block
				 */
				block: '\
					<div>\
						<div class="form-row articleFeedbackv5-bucket4-toggle">\
							<p class="sub-header"><strong><html:msg key="bucket4-subhead" /></strong></p>\
							<p class="instructions-left"><html:msg key="bucket4-teaser-line1" /><br />\
							<html:msg key="bucket4-teaser-line2" /></p>\
						</div>\
						<div class="articleFeedbackv5-disclosure">\
							<p><a class="articleFeedbackv5-learn-to-edit" target="_blank"><html:msg key="bucket4-learn-to-edit" /> &raquo;</a></p>\
						</div>\
						<a class="articleFeedbackv5-submit" id="articleFeedbackv5-submit-bttn"><html:msg key="bucket4-form-submit" /></a>\
						<div class="clear"></div>\
					</div>\
					'

			},

			// }}}
			// {{{ getTitle

			/**
			 * Gets the title
			 *
			 * @return string the title
			 */
			getTitle: function () {
				return mw.msg( 'articlefeedbackv5-bucket4-title' );
			},

			// }}}
			// {{{ buildForm

			/**
			 * Builds the empty form
			 *
			 * @return Element the form
			 */
			buildForm: function () {

				// Start up the block to return
				var $block = $( $.articleFeedbackv5.currentBucket().templates.block );

				// Fill in the learn to edit link
				$block.find( '.articleFeedbackv5-learn-to-edit' )
					.attr( 'href', mw.config.get( 'wgArticleFeedbackv5LearnToEdit' ) );

				// Fill in the edit link
				$block.find( '.articleFeedbackv5-submit' )
					.attr( 'href',
						mw.config.get( 'wgScript' ) + '?' + $.param( {
							'title': mw.config.get( 'wgPageName' ),
							'action': 'edit',
							'articleFeedbackv5_feedback_id': $.articleFeedbackv5.feedbackId,
							'articleFeedbackv5_cta_id': $.articleFeedbackv5.ctaId,
							'articleFeedbackv5_bucket_id': $.articleFeedbackv5.bucketId
						} )
					);

				// Turn the submit into a slick button
				$block.find( '.articleFeedbackv5-submit' )
					.button()
					.addClass( 'ui-button-blue' )

				return $block;
			},

			// }}}
			// {{{ afterBuild

			/**
			 * Handles any setup that has to be done once the markup is in the
			 * holder
			 */
			afterBuild: function () {
				// Set a custom message
				$.articleFeedbackv5.$holder
					.add( $.articleFeedbackv5.$dialog)
					.find( '.articleFeedbackv5-tooltip-info' )
					.text( mw.msg( 'articlefeedbackv5-bucket4-help-tooltip-info' ) );
			}

			// }}}

		},

		// }}}
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
			ratingInfo: mw.config.get( 'wgArticleFeedbackv5Bucket5RatingCategories' ),

			/**
			 * Only certain users can see the expertise checkboxes and email
			 * (bucketed on init)
			 */
			showOptions: false,

			/**
			 * Whether we need to load the aggregate ratings the next time the button is
			 * clicked.  This is initially set to true, turned to false after the first
			 * time, then turned back to true on form submission, in case the user wants
			 * to go back and see the ratings with theirs included.
			 */
			loadAggregate: true,

			/**
			 * Whether we're currently looking at the report
			 */
			inReport: false,

			// }}}
			// {{{ templates

			/**
			 * Pull out the markup so it's easy to find
			 */
			templates: {

				/**
				 * The template for the whole block
				 */
				block: '\
					<form id="articleFeedbackv5-bucket5">\
						<div class="articleFeedbackv5-switch articleFeedbackv5-switch-report articleFeedbackv5-visibleWith-form" rel="report"><html:msg key="bucket5-report-switch-label" /></div>\
						<div class="articleFeedbackv5-switch articleFeedbackv5-switch-form articleFeedbackv5-visibleWith-report" rel="form"><html:msg key="bucket5-form-switch-label" /></div>\
						<div class="articleFeedbackv5-explanation articleFeedbackv5-visibleWith-form"><a class="articleFeedbackv5-explanation-link"><html:msg key="bucket5-form-panel-explanation" /></a></div>\
						<div class="articleFeedbackv5-description articleFeedbackv5-visibleWith-report"><html:msg key="bucket5-report-panel-description" /></div>\
						<div style="clear:both;"></div>\
						<div class="articleFeedbackv5-ratings"></div>\
						<div style="clear:both;"></div>\
						<div class="articleFeedbackv5-options">\
							<div class="articleFeedbackv5-expertise articleFeedbackv5-visibleWith-form" >\
								<input type="checkbox" value="general" disabled="disabled" /><label class="articleFeedbackv5-expertise-disabled"><html:msg key="bucket5-form-panel-expertise" /></label>\
								<div class="articleFeedbackv5-expertise-options">\
									<div><input type="checkbox" value="studies" /><label><html:msg key="bucket5-form-panel-expertise-studies" /></label></div>\
									<div><input type="checkbox" value="profession" /><label><html:msg key="bucket5-form-panel-expertise-profession" /></label></div>\
									<div><input type="checkbox" value="hobby" /><label><html:msg key="bucket5-form-panel-expertise-hobby" /></label></div>\
									<div><input type="checkbox" value="other" /><label><html:msg key="bucket5-form-panel-expertise-other" /></label></div>\
									<div class="articleFeedbackv5-helpimprove">\
										<input type="checkbox" value="helpimprove-email" />\
										<label><html:msg key="bucket5-form-panel-helpimprove" /></label>\
										<input type="text" placeholder="" class="articleFeedbackv5-helpimprove-email" />\
										<div class="articleFeedbackv5-helpimprove-note"></div>\
									</div>\
								</div>\
							</div>\
							<div style="clear:both;"></div>\
						</div>\
						<button class="articleFeedbackv5-submit articleFeedbackv5-visibleWith-form" id="articleFeedbackv5-submit-bttn5" type="submit" disabled="disabled"><html:msg key="bucket5-form-panel-submit" /></button>\
						<div class="articleFeedbackv5-pending articleFeedbackv5-visibleWith-form"><span><html:msg key="bucket5-form-panel-pending" /></span></div>\
						<div style="clear:both;"></div>\
						<div class="articleFeedbackv5-notices articleFeedbackv5-visibleWith-form">\
							<div class="articleFeedbackv5-expiry">\
								<div class="articleFeedbackv5-expiry-title"><html:msg key="bucket5-form-panel-expiry-title" /></div>\
								<div class="articleFeedbackv5-expiry-message"><html:msg key="bucket5-form-panel-expiry-message" /></div>\
							</div>\
						</div>\
					</form>\
					',


				/**
				 * The template for a single rating
				 */
				rating: '\
					<div class="articleFeedbackv5-rating">\
						<div class="articleFeedbackv5-label"></div>\
						<input type="hidden" name="" />\
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
					'

			},

			// }}}
			// {{{ init

			/**
			 * Initializes the bucket
			 */
			init: function () {
				var opt = mw.user.bucket( 'ext.articleFeedbackv5-options', mw.config.get( 'wgArticleFeedbackv5Options' ) )
				$.articleFeedbackv5.currentBucket().showOptions = ( 'show' === opt );
			},

			// }}}
			// {{{ getTitle

			/**
			 * Gets the title
			 *
			 * @return string the title
			 */
			getTitle: function () {
				if ( $.articleFeedbackv5.buckets[5].inReport ) {
					return mw.msg( 'articlefeedbackv5-bucket5-report-panel-title' );
				} else {
					return mw.msg( 'articlefeedbackv5-bucket5-form-panel-title' );
				}
			},

			// }}}
			// {{{ buildForm

			/**
			 * Builds the empty form
			 *
			 * @return Element the form
			 */
			buildForm: function () {

				// Start up the block to return
				var $block = $( $.articleFeedbackv5.currentBucket().templates.block );

				// Add the ratings from the options
				$block.find( '.articleFeedbackv5-ratings' ).each( function () {
					var info = $.articleFeedbackv5.currentBucket().ratingInfo;
					for ( var i in info ) {
						var key = info[i];
						var	tip_msg = 'articlefeedbackv5-bucket5-' + key + '-tip';
						var label_msg = 'articlefeedbackv5-bucket5-' + key + '-label';
						var $rtg = $( $.articleFeedbackv5.currentBucket().templates.rating );
						$rtg.attr( 'rel', key );
						$rtg.find( '.articleFeedbackv5-label' )
							.attr( 'title', mw.msg( tip_msg ) )
							.text( mw.msg( label_msg ) );
						$rtg.find( '.articleFeedbackv5-rating-clear' )
							.attr( 'title', mw.msg( 'articlefeedbackv5-bucket5-form-panel-clear' ) );
						$rtg.appendTo( $(this) );
					}
				} );

				// Fill in the link to the What's This page
				$block.find( '.articleFeedbackv5-explanation-link' )
					.attr(
						'href',
						mw.util.wikiGetlink( mw.config.get( 'wgArticleFeedbackv5WhatsThisPage' ) ) // TODO: Make this work
					);

				// Fill in the Help Improve message and links
				$block.find( '.articleFeedbackv5-helpimprove-note' )
					.html( $.articleFeedbackv5.buildLink(
						'articlefeedbackv5-bucket5-form-panel-helpimprove-note',
						{
							href: mw.config.get( 'wgArticleFeedbackv5TermsPage' ), // TODO: Make this work
							text: 'articlefeedbackv5-bucket5-form-panel-helpimprove-privacy'
						}
					) );

				$block.find( '.articleFeedbackv5-helpimprove-email' )
					.attr( 'placeholder', mw.msg( 'articlefeedbackv5-bucket5-form-panel-helpimprove-email-placeholder' ) )
					.placeholder(); // back. compat. for older browsers

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
						$(this).find( 'input:hidden' ) .attr( 'name', $(this).attr( 'rel' ) );
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
						var $options = $.articleFeedbackv5.find( '.articleFeedbackv5-expertise-options' );
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
							$.articleFeedbackv5.enableSubmission( true );
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
						var which = $( this ).attr( 'rel' );
						if ( which == 'report' && $.articleFeedbackv5.currentBucket().loadAggregate ) {
							$.articleFeedbackv5.currentBucket().loadAggregateRatings();
							$.articleFeedbackv5.currentBucket().loadAggregate = false;
						}
						$.articleFeedbackv5.find( '.articleFeedbackv5-visibleWith-' + which ).show();
						$.articleFeedbackv5.find( '.articleFeedbackv5-switch' )
							.not( $( this ) )
							.each( function () {
								$.articleFeedbackv5.find( '.articleFeedbackv5-visibleWith-' + $( this ).attr( 'rel' ) ).hide();
							} );
						$.articleFeedbackv5.currentBucket().inReport = which == 'report';
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
						.text( mw.msg( 'articlefeedbackv5-bucket5-' + $rating.attr( 'rel' ) + '-tooltip-' + $el.attr( 'rel' ) ) )
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
					$.articleFeedbackv5.enableSubmission( true );
					var $ui = $.articleFeedbackv5.find( '.articleFeedbackv5-ui' );
					if ( $ui.hasClass( 'articleFeedbackv5-expired' ) ) {
						// Changing one means the rest will get submitted too
						$ui.removeClass( 'articleFeedbackv5-expired' );
						$ui.find( '.articleFeedbackv5-rating' )
							.addClass( 'articleFeedbackv5-rating-new' );
					}
					$ui.find( '.articleFeedbackv5-expertise' )
						.each( function () {
							$.articleFeedbackv5.currentBucket().enableExpertise( $(this) );
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
						$.articleFeedbackv5.enableSubmission( true );
						$(this).hide();
						var $rating = $(this).closest( '.articleFeedbackv5-rating' );
						$rating.find( 'input:hidden' ).val( 0 );
						$.articleFeedbackv5.currentBucket().updateRating( $rating );
					} );

			},

			// }}}
			// {{{ afterBuild

			/**
			 * Handles any setup that has to be done once the markup is in the
			 * holder
			 */
			afterBuild: function () {
				// Drop the tooltip and trigger
				$.articleFeedbackv5.$holder
					.add( $.articleFeedbackv5.$dialog)
					.find( '.articleFeedbackv5-tooltip-trigger' ).hide();
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
				if ( state ) {
					$.articleFeedbackv5.find( '.articleFeedbackv5-pending span' ).fadeIn( 'fast' );
				} else {
					$.articleFeedbackv5.find( '.articleFeedbackv5-pending span' ).hide();
				}
				$.articleFeedbackv5.submissionEnabled = state;
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
				var $label = $.articleFeedbackv5.find( '.articleFeedbackv5-helpimprove-email' );
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
						'maxage': 0,
						'smaxage': mw.config.get( 'wgArticleFeedbackv5SMaxage' )
					},
					'success': function ( data ) {
						// Get data
						if (
							!( 'query' in data )
							|| !( 'articlefeedbackv5-view-ratings' in data.query )
							|| !( 'rollup' in data.query['articlefeedbackv5-view-ratings'] )
						) {
							mw.log( mw.msg ( 'articlefeedbackv5-error-response' ) );
							var msg = mw.msg ( 'articlefeedbackv5-error-response' );
							if ( 'error' in data && 'info' in data.error ) {
								msg = data.error.info;
							} else if ( typeof console != 'undefined' ) {
								console.log(data);
							}
							$.articleFeedbackv5.markShowstopperError( msg );
							return;
						}
						var rollup = data.query['articlefeedbackv5-view-ratings'].rollup;

						// Ratings
						$.articleFeedbackv5.find( '.articleFeedbackv5-rating' ).each( function () {
							var name = $(this).attr( 'rel' );
							var rating = name in rollup ? rollup[name] : null;
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
									.text( mw.msg( 'articlefeedbackv5-bucket5-report-ratings', rating.count ) );
							} else {
								// Special case for no ratings
								$(this).find( '.articleFeedbackv5-rating-average' )
									.html( '&nbsp;' );
								$(this).find( '.articleFeedbackv5-rating-meter div' )
									.css( 'width', 0 );
								$(this).find( '.articleFeedbackv5-rating-count' )
									.text( mw.msg( 'articlefeedbackv5-bucket5-report-empty' ) );
							}
						} );

						// Status change - un-new the rating controls
						$.articleFeedbackv5.find( '.articleFeedbackv5-rating-new' )
							.removeClass( 'articleFeedbackv5-rating-new' );
					},
					'error': function () {
						mw.log( 'Report loading error' );
						$.articleFeedbackv5.currentBucket().markShowstopperError( 'Report loading error' );
						$.articleFeedbackv5.find( '.articleFeedbackv5-error' ).show();
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
				for ( var i in info ) {
					var key = info[i];
					data[key] = $.articleFeedbackv5.find( 'input[name="' + key + '"]' ).val();
				}
				$.articleFeedbackv5.find( '.articleFeedbackv5-expertise input:checked' ).each( function () {
					data['expertise-' + $( this ).val()] = 1;
				} );
				if ( $.articleFeedbackv5.find( '.articleFeedbackv5-helpimprove input:checked' ).length > 0 ) {
					data.email = $.articleFeedbackv5.find( '.articleFeedbackv5-helpimprove-email' ).val();
				}
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
				if ( $.articleFeedbackv5.find( '.articleFeedbackv5-helpimprove input:checked' ).length > 0 ) {
					if ( 'email' in formdata && !mw.util.validateEmail( formdata.email ) ) {
						error.helpimprove_email = mw.msg( 'articlefeedbackv5-error-email' );
						ok = false;
					}
				}
				return ok ? false : error;
			},

			// }}}
			// {{{ markFormErrors

			/**
			 * Marks any errors on the form
			 *
			 * @param object errors errors, indexed by field name
			 */
			markFormErrors: function ( errors ) {
				if ( 'helpimprove_email' in errors ) {
					$.articleFeedbackv5.find( '.articleFeedbackv5-helpimprove-email' )
						.addClass( 'invalid' )
						.removeClass( 'valid' );
				}
			},

			// }}}
			// {{{ onSubmit

			/**
			 * Sends off the email tracking request alongside the regular form
			 * submit
			 */
			onSubmit: function () {
				$.articleFeedbackv5.currentBucket().loadAggregate = true;
			}

			// }}}

		}

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

			// {{{ templates

			/**
			 * Pull out the markup so it's easy to find
			 */
			templates: {

				/**
				 * The template for the whole block
				 */
				block: '\
					<div class="clear"></div>\
					<div class="articleFeedbackv5-confirmation-panel">\
						<div class="articleFeedbackv5-panel-leftContent">\
							<div class="articleFeedbackv5-confirmation-text">\
								<span class="articleFeedbackv5-confirmation-thanks"><html:msg key="cta1-thanks" /></span>\
								<span class="articleFeedbackv5-confirmation-follow-up"><html:msg key="cta1-confirmation-followup" /></span>\
							</div>\
							<h3 class="articleFeedbackv5-confirmation-title"><html:msg key="cta1-confirmation-title" /></h3>\
							<p class="articleFeedbackv5-confirmation-wikipediaWorks"><html:msg key="cta1-confirmation-call" /></p>\
							<p class="articleFeedbackv5-confirmation-learnHow"><a target="_blank" href="#"><html:msg key="cta1-learn-how" /> &raquo;</a></p>\
						</div>\
						<a href="&amp;action=edit" class="articleFeedbackv5-edit-cta-link"><span class="ui-button-text"><html:msg key="cta1-edit-linktext" /></span></a>\
						<div class="clear"></div>\
					</div>\
					'

			},

			// }}}
			// {{{ getTitle

			/**
			 * Gets the title
			 *
			 * @return string the title
			 */
			getTitle: function () {
//				return 'TODO: EDIT CTA';
			},

			// }}}
			// {{{ build

			/**
			 * Builds the CTA
			 *
			 * @return Element the form
			 */
			build: function () {

				// Start up the block to return
				var $block = $( $.articleFeedbackv5.currentCTA().templates.block );
                
                // Fill in the tutorial link
                $block.find( '.articleFeedbackv5-confirmation-learnHow a' )
                    .attr( 'href', mw.msg( 'articlefeedbackv5-cta1-learn-how-url' ) );

				// Fill in the link
				$block.find( '.articleFeedbackv5-edit-cta-link' )
					.attr(
						'href',
						mw.config.get( 'wgScript' ) + '?' + $.param( {
							'title': mw.config.get( 'wgPageName' ),
							'action': 'edit',
							'articleFeedbackv5_feedback_id': $.articleFeedbackv5.feedbackId,
							'articleFeedbackv5_cta_id': $.articleFeedbackv5.ctaId,
							'articleFeedbackv5_bucket_id': $.articleFeedbackv5.bucketId
						} )
					);

				return $block;
			}

			// }}}

		},

		// }}}

	};

	// }}}
	// {{{ Initialization

	// {{{ init

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
		// Are we in debug mode?
		$.articleFeedbackv5.debug = mw.config.get( 'wgArticleFeedbackv5Debug' ) ? true : false;
		// Go ahead and bucket right away
		$.articleFeedbackv5.selectBucket();
		// Anything the bucket needs to do?
		if ( 'init' in $.articleFeedbackv5.currentBucket() ) {
			$.articleFeedbackv5.currentBucket().init();
		}
		// When the tool is visible, load the form
		$.articleFeedbackv5.$holder.appear( function () {
			if ( !$.articleFeedbackv5.isLoaded ) {
				$.articleFeedbackv5.loadForm();
			}
		} );
		// Keep track of links that must be removed after a successful submission
		$.articleFeedbackv5.$toRemove = $( [] );
	};

	// }}}
	// {{{ selectBucket

	/**
	 * Chooses a bucket and loads the appropriate form
	 *
	 * If the plugin is in debug mode, you'll be able to pass in a particular
	 * bucket in the url.  Otherwise, it will use the core bucketing
	 * (configuration for this module passed in) to choose a bucket.
	 */
	$.articleFeedbackv5.selectBucket = function () {
		// Find out which display bucket they go in:
		// 1. Requested in query string (debug only)
		// 2. From cookie (see below)
		// 3. Core bucketing
		var knownBuckets = { '0': true, '1': true, '2': true, '3': true, '4': true, '5': true };
		var requested = mw.util.getParamValue( 'bucket' );
		var cookieval = $.cookie( $.articleFeedbackv5.prefix( 'display-bucket' ) );
		if ( $.articleFeedbackv5.debug && requested in knownBuckets ) {
			$.articleFeedbackv5.bucketId = requested;
		} else if ( cookieval in knownBuckets ) {
			$.articleFeedbackv5.bucketId = cookieval;
		} else {
			var bucketName = mw.user.bucket(
				'ext.articleFeedbackv5-display',
				mw.config.get( 'wgArticleFeedbackv5DisplayBuckets' )
			);
			var nameMap = { zero: '0', one: '1', two: '2', three: '3', four: '4', five: '5' };
			$.articleFeedbackv5.bucketId = nameMap[bucketName];
		}
		// Drop in a cookie to keep track of their display bucket;
		// use the config to determine how long to hold onto it.
		var cfg = mw.config.get( 'wgArticleFeedbackv5DisplayBuckets' );
		$.cookie(
			$.articleFeedbackv5.prefix( 'display-bucket' ),
			$.articleFeedbackv5.bucketId,
			{ 'expires': cfg.expires, 'path': '/' }
		);
		if ( $.articleFeedbackv5.debug && typeof console != 'undefined' ) {
			console.log( 'Using bucket #' + $.articleFeedbackv5.bucketId );
		}
	};

	// }}}

	// }}}
	// {{{ Utility methods

	// {{{ prefix

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

	// }}}
	// {{{ currentBucket

	/**
	 * Utility method: Get the current bucket
	 *
	 * @return object the bucket
	 */
	$.articleFeedbackv5.currentBucket = function () {
		return $.articleFeedbackv5.buckets[$.articleFeedbackv5.bucketId];
	};

	// }}}
	// {{{ currentCTA

	/**
	 * Utility method: Get the current CTA
	 *
	 * @return object the cta
	 */
	$.articleFeedbackv5.currentCTA = function () {
		return $.articleFeedbackv5.ctas[$.articleFeedbackv5.ctaId];
	};

	// }}}
	// {{{ buildLink

	/**
	 * Utility method: Build a link from a href and message keys for the full
	 * text (with $1 where the link goes) and link text
	 *
	 * Can't use .text() with mw.message(, \/* $1 *\/ link).toString(),
	 * because 'link' should not be re-escaped (which would happen if done by mw.message)
	 *
	 * @param  string fulltext the message key for the full text
	 * @param  object link1    the first link, as { href: '#', text: 'click here' }
	 * @param  object link2    [optional] the second link, as above
	 * @param  object link2    [optional] the third link, as above
	 * @return string the html
	 */
	$.articleFeedbackv5.buildLink = function ( fulltext, link1, link2, link3 ) {
		var full = mw.html.escape( mw.msg( fulltext ) );
		if ( link1 ) {
			full = full.replace(
					/\$1/,
					mw.html.element( 'a', { href: link1.href }, mw.msg( link1.text )
				).toString() );
		}
		if ( link2 ) {
			full = full.replace(
					/\$2/,
					mw.html.element( 'a', { href: link2.href }, mw.msg( link2.text )
				).toString() );
		}
		if ( link3 ) {
			full = full.replace(
					/\$3/,
					mw.html.element( 'a', { href: link3.href }, mw.msg( link3.text )
				).toString() );
		}
		return full;
	};

	// }}}
	// {{{ enableSubmission

	/**
	 * Utility method: Enables or disables submission of the form
	 *
	 * @param state bool true to enable; false to disable
	 */
	$.articleFeedbackv5.enableSubmission = function ( state ) {
        // this is actually required to resolve jQuery behavior of not triggering the
        // click event when .blur() occurs on the textarea and .click() is supposed to
        // be triggered on the button.
        if($.articleFeedbackv5.submissionEnabled == state ) {
            return;
        }
        
		if ( state ) {
			$.articleFeedbackv5.find( '.articleFeedbackv5-submit' ).button( 'enable' );
		} else {
			$.articleFeedbackv5.find( '.articleFeedbackv5-submit' ).button( 'disable' );
		}
		var bucket = $.articleFeedbackv5.currentBucket();
		if ( 'enableSubmission' in bucket ) {
			bucket.enableSubmission( state );
		}
		$.articleFeedbackv5.submissionEnabled = state;
		$( '#articleFeedbackv5-submit-bttn span' ).text( mw.msg( 'articlefeedbackv5-bucket1-form-submit' ) );
		$( '#articleFeedbackv5-submit-bttn5 span' ).text( mw.msg( 'articlefeedbackv5-bucket5-form-panel-submit' ) );
	};

	// }}}
	// {{{ find

	/**
	 * Utility method: Find an element, whether it's in the dialog or not
	 *
	 * @param  query mixed what to pass to the appropriate jquery element
	 * @return array the list of elements found
	 */
	$.articleFeedbackv5.find = function ( query ) {
		if ( $.articleFeedbackv5.inDialog ) {
			return $.articleFeedbackv5.$dialog.find( query );
		} else {
			return $.articleFeedbackv5.$holder.find( query );
		}
	};

	// }}}

	// }}}
	// {{{ Process methods

	// {{{ loadForm

	/**
	 * Build the form and load it into the document
	 */
	$.articleFeedbackv5.loadForm = function () {

		// Build the form
		var bucket = $.articleFeedbackv5.currentBucket();
		if ( !( 'buildForm' in bucket ) ) {
			$.articleFeedbackv5.isLoaded = true;
			return;
		}
		var $block = bucket.buildForm();
		if ( 'bindEvents' in bucket ) {
			bucket.bindEvents( $block );
		}

		// Wrap it in a panel
		var $wrapper = $( $.articleFeedbackv5.templates.panelOuter );
		$wrapper.find( '.articleFeedbackv5-ui' )
			.addClass( 'articleFeedbackv5-option-' + $.articleFeedbackv5.bucketId )
			.append( $block );

		// Set the title
		if ( 'getTitle' in bucket ) {
			$wrapper.find( '.articleFeedbackv5-title' ).html( bucket.getTitle() );
		}

		// Set up the tooltip for the panel version
		$wrapper.find( '.articleFeedbackv5-title-wrap' ).append( $.articleFeedbackv5.templates.helpToolTip );
		$wrapper.find( '.articleFeedbackv5-tooltip-link' )
			.attr( 'href', mw.msg( 'articlefeedbackv5-help-tooltip-linkurl' ) );
		$wrapper.find( '.articleFeedbackv5-tooltip' ).hide();
		$wrapper.find( '.articleFeedbackv5-tooltip-trigger' ).click( function () {
			$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-tooltip' ).toggle();
		} );

		$wrapper.find( '.articleFeedbackv5-tooltip-close' ).click( function () {
			$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-tooltip' ).toggle();
		} );

		// Localize
		$wrapper.localize( { 'prefix': 'articlefeedbackv5-' } );

		// Add it to the page
		$.articleFeedbackv5.$holder
			.html( $wrapper )
			.append( '<div class="articleFeedbackv5-lock"></div>' );

		// Add an empty dialog
		$.articleFeedbackv5.$dialog = $( '<div id="articleFeedbackv5-dialog-wrap"></div>' );
		$.articleFeedbackv5.$holder.after( $.articleFeedbackv5.$dialog );

		// Set up the dialog
		$.articleFeedbackv5.$dialog.dialog( {
			width: 500,
			height: 300,
			dialogClass: 'articleFeedbackv5-dialog',
			resizable: false,
			draggable: false,
			title: $.articleFeedbackv5.currentBucket().getTitle(),
			modal: true,
			autoOpen: false,
			close: function ( event, ui ) {
				$.articleFeedbackv5.closeAsModal();
			}
		} );
		var $title = $( '#ui-dialog-title-articleFeedbackv5-dialog-wrap' );
		var $titlebar = $title.parent();
		$title.addClass( 'articleFeedbackv5-title' );

		// Set up the tooltip for the dialoag
		$titlebar.append( $.articleFeedbackv5.templates.helpToolTip );
		$titlebar.find( '.articleFeedbackv5-tooltip' ).hide();
		$titlebar.find( '.articleFeedbackv5-tooltip-link' )
			.attr( 'href', mw.msg( 'articlefeedbackv5-help-tooltip-linkurl' ) );
		$titlebar.find( '.articleFeedbackv5-tooltip-trigger' ).click( function ( e ) {
			$( e.target ).next( '.articleFeedbackv5-tooltip' ).toggle();
		} );
		$titlebar.localize( { 'prefix': 'articlefeedbackv5-' } );

		// Set loaded
		$.articleFeedbackv5.isLoaded = true;

		// Do anything special the bucket requires
		if ( 'afterBuild' in bucket ) {
			bucket.afterBuild();
		}

		$.articleFeedbackv5.nowShowing = 'form';
	};

	// }}}
	// {{{ submitForm

	/**
	 * Submits the form
	 *
	 * This calls the Article Feedback API method, which stores the user's
	 * responses and returns the name of the CTA to be displayed, if the input
	 * passes local validation.  Local validation is defined by the bucket UI
	 * object.
	 */
	$.articleFeedbackv5.submitForm = function () {

		// Are we allowed to do this?
		if ( !$.articleFeedbackv5.submissionEnabled ) {
			return false;
		}

		// Get the form data
		var bucket = $.articleFeedbackv5.currentBucket();
		var formdata = {};
		if ( 'getFormData' in bucket ) {
			formdata = bucket.getFormData();
		}

		// Perform any local validation
		if ( 'localValidation' in bucket ) {
			var errors = bucket.localValidation( formdata );
			if ( errors ) {
				$.articleFeedbackv5.markFormErrors( errors );
				return;
			}
		}

		// Lock the form
		$.articleFeedbackv5.lockForm();

		// Request data
		var data = $.extend( formdata, {
			'action': 'articlefeedbackv5',
			'format': 'json',
			'anontoken': $.articleFeedbackv5.userId,
			'pageid': $.articleFeedbackv5.pageId,
			'revid': $.articleFeedbackv5.revisionId,
			'bucket': $.articleFeedbackv5.bucketId,
			'link': $.articleFeedbackv5.linkId
		} );

		// Send off the ajax request
		$.ajax( {
			'url': $.articleFeedbackv5.apiUrl,
			'type': 'POST',
			'dataType': 'json',
			'data': data,
			'success': function( data ) {
				if ( 'articlefeedbackv5' in data
						&& 'feedback_id' in data.articlefeedbackv5
						&& 'cta_id' in data.articlefeedbackv5 ) {
					$.articleFeedbackv5.feedbackId = data.articlefeedbackv5.feedback_id;
					$.articleFeedbackv5.ctaId = data.articlefeedbackv5.cta_id;
					$.articleFeedbackv5.unlockForm();
					$.articleFeedbackv5.showCTA();
					// Drop a cookie for a successful submit
					$.cookie( $.articleFeedbackv5.prefix( 'submitted' ), 'true', { 'expires': 365, 'path': '/' } );
					// Clear out anything that needs removing (usually feedback links)
					// Comment this out and uncomment the clear on dialog close to switch to
					// the feedback link replacing the form. _SWITCH_CLEAR_
					$.articleFeedbackv5.$toRemove.remove();
					$.articleFeedbackv5.$toRemove = $( [] );
				} else {
					var msg;
					if ( 'error' in data ) {
						msg = data.error;
					} else {
						msg = { info: mw.msg( 'articlefeedbackv5-error-unknown' ) };
					}
					$.articleFeedbackv5.markFormErrors( { _api : msg } );
					$.articleFeedbackv5.unlockForm();
				}
			},
			'error': function () {
				var err = { _api: { info: mw.msg( 'articlefeedbackv5-error-submit' ) } };
				$.articleFeedbackv5.markFormErrors( err );
				$.articleFeedbackv5.unlockForm();
			}
		} );

		// Does the bucket need to do anything else on submit (alongside the
		// ajax request, not as a result of it)?
		if ( 'onSubmit' in bucket ) {
			bucket.onSubmit( formdata );
		}
	};

	// }}}
	// {{{ showCTA

	/**
	 * Shows a CTA
	 */
	$.articleFeedbackv5.showCTA = function () {
		var cta = $.articleFeedbackv5.currentCTA();
		if ( !( 'build' in cta ) ) {
			return;
		}
		var $block = cta.build();
		if ( 'bindEvents' in cta ) {
			cta.bindEvents( $block );
		}
		$block.localize( { 'prefix': 'articlefeedbackv5-' } );
		if ( 'getTitle' in cta ) {
			if ( $.articleFeedbackv5.inDialog ) {
				$.articleFeedbackv5.$dialog.dialog( 'option', 'title', cta.getTitle() );
			} else {
				$.articleFeedbackv5.find( '.articleFeedbackv5-title' ).html( cta.getTitle() );
			}
		}
		$.articleFeedbackv5.find( '.articleFeedbackv5-ui' ).empty();
		$.articleFeedbackv5.find( '.articleFeedbackv5-ui' ).append( $block );
		// Add a close button to clear out the panel
		var $close = $( '<a class="articleFeedbackv5-clear-trigger">x</a>' )
			.click( function (e) {
				e.preventDefault();
				$.articleFeedbackv5.clear();
			} );
		$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-title-wrap .articleFeedbackv5-tooltip-trigger' )
			.before( $close );
		$.articleFeedbackv5.nowShowing = 'cta';
	};

	// }}}
	// {{{ clear

	/**
	 * Clears out the panel
	 */
	$.articleFeedbackv5.clear = function () {

		$.articleFeedbackv5.isLoaded = false;
		$.articleFeedbackv5.inDialog = false;
		$.articleFeedbackv5.submissionEnabled = false;
		$.articleFeedbackv5.feedbackId = 0;

		$.articleFeedbackv5.$holder.empty();
		$.articleFeedbackv5.$dialog.remove();


		$.articleFeedbackv5.nowShowing = 'none';
	};

	// }}}

	// }}}
	// {{{ UI methods

	// {{{ markShowstopperError

	/**
	 * Marks a showstopper error
	 *
	 * @param string message the message to display, if in dev
	 */
	$.articleFeedbackv5.markShowstopperError = function ( message ) {
		if ( typeof console != 'undefined' ) {
			console.log( message );
		}
		var $err = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-error-message' );
		$err.text( $.articleFeedbackv5.debug && message ? message : mw.msg( 'articlefeedbackv5-error' ) );
		$err.html( $err.html().replace( "\n", '<br />' ) );
		var $veil = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-error' );
		var $box  = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-buffer' );
		// TODO: Make this smarter -- on ubuntu/ff at least, using the
		// offset puts it about 100px down from where it should be;
		// this math corrects for it, but will most likely be wrong on
		// other browsers
		$veil.css('top', $box.find('.articleFeedbackv5-ui').offset().top / 2 + 10);
		$veil.css('width', $box.width());
		$veil.css('height', $box.height());
		$veil.show();
	};

	// }}}
	// {{{ markTopError

	/**
	 * Marks an error at the top of the form
	 *
	 * @param msg string the error message
	 */
	$.articleFeedbackv5.markTopError = function ( msg ) {
		$.articleFeedbackv5.find( '.articleFeedbackv5-top-error' ).html( msg );
	};

	// }}}
	// {{{ markFormErrors

	/**
	 * Marks any errors on the form
	 *
	 * @param object errors errors, indexed by field name
	 */
	$.articleFeedbackv5.markFormErrors = function ( errors ) {
		if ( '_api' in errors ) {
			if ( $.articleFeedbackv5.debug ) {
				$.articleFeedbackv5.markTopError( errors._api.info );
			} else {
				mw.log( mw.msg( 'articlefeedbackv5-error-submit' ) );
			}
			mw.log( mw.msg( errors._api.info ) );
		} else {
			mw.log( mw.msg( 'articlefeedbackv5-error-validation' ) );
			if ( 'nofeedback' in errors ) {
				$.articleFeedbackv5.markTopError( mw.msg( 'articlefeedbackv5-error-nofeedback' ) );
			}
		}
		if ( $.articleFeedbackv5.debug ) {
			if ( typeof console != 'undefined' ) {
				console.log( errors );
			}
		}
		if ( 'markFormErrors' in $.articleFeedbackv5.currentBucket() ) {
			$.articleFeedbackv5.currentBucket().markFormErrors( errors );
		}
	};

	// }}}
	// {{{ lockForm

	/**
	 * Locks the form
	 */
	$.articleFeedbackv5.lockForm = function () {
		var bucket = $.articleFeedbackv5.currentBucket();
		$.articleFeedbackv5.enableSubmission( false );
		$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-lock' ).show();
	};

	// }}}
	// {{{ unlockForm

	/**
	 * Unlocks the form
	 */
	$.articleFeedbackv5.unlockForm = function () {
		var bucket = $.articleFeedbackv5.currentBucket();
		$.articleFeedbackv5.enableSubmission( true );
		$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-lock' ).hide();
	};

	// }}}

	// }}}
	// {{{ Outside interaction methods

	// {{{ addToRemovalQueue

	/**
	 * Adds an element (usually a feedback link) to the collection that will be
	 * removed after a successful submission
	 *
	 * @param $el Element the element
	 */
	$.articleFeedbackv5.addToRemovalQueue = function ( $el ) {
		$.articleFeedbackv5.$toRemove = $.articleFeedbackv5.$toRemove.add( $el );
	};

	// }}}
	// {{{ setLinkId

	/**
	 * Sets the link ID
	 *
	 * @param int linkId the link ID
	 */
	$.articleFeedbackv5.setLinkId = function ( linkId ) {
		var knownLinks = { '0': true, '1': true, '2': true, '3': true, '4': true };
		if ( linkId in knownLinks ) {
			$.articleFeedbackv5.linkId = linkId + '';
		}
	};

	// }}}
	// {{{ inDebug

	/**
	 * Returns whether the plugin is in debug mode
	 *
	 * @return int whether the plugin is in debug mode
	 */
	$.articleFeedbackv5.inDebug = function () {
		return $.articleFeedbackv5.debug;
	};

	// }}}
	// {{{ getBucketId

	/**
	 * Gets the bucket ID
	 *
	 * @return int the bucket ID
	 */
	$.articleFeedbackv5.getBucketId = function () {
		return $.articleFeedbackv5.bucketId;
	};

	// }}}
	// {{{ getShowing

	/**
	 * Returns which is showing: the form, the cta, or nothing
	 *
	 * @return string "form", "cta", or "none"
	 */
	$.articleFeedbackv5.getShowing = function () {
		return $.articleFeedbackv5.nowShowing;
	};

	// }}}
	// {{{ openAsModal

	/**
	 * Opens the feedback tool as a modal window
	 *
	 * @param $link Element the feedback link
	 */
	$.articleFeedbackv5.openAsModal = function ( $link ) {
		if ( 'cta' == $.articleFeedbackv5.nowShowing ) {
			// Uncomment here and comment out link removal to switch to the feedback
			// link replacing the form.  _SWITCH_CLEAR_
			// $.articleFeedbackv5.clear();
		}
		if ( !$.articleFeedbackv5.isLoaded ) {
			$.articleFeedbackv5.loadForm();
		}
		if ( !$.articleFeedbackv5.inDialog ) {
			var w = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-ui' ).width();
			var h = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-ui' ).height();
			var o = $link.offset();
			var x = 'center';
			// var y = o.top - h - 20;
			var y = 'center';
			$inner = $.articleFeedbackv5.$holder.find( '.articleFeedbackv5-ui' ).detach();
			$.articleFeedbackv5.$dialog.append( $inner );
			$.articleFeedbackv5.$dialog.dialog( 'option', 'width', w + 25 );
			$.articleFeedbackv5.$dialog.dialog( 'option', 'height', h + 70 );
			$.articleFeedbackv5.$dialog.dialog( 'option', 'position', [ x, y ] );
			$.articleFeedbackv5.$dialog.dialog( 'open' );
			$.articleFeedbackv5.setLinkId( $link.data( 'linkId' ) );

			// Hide the panel
			$.articleFeedbackv5.$holder.hide();

			$.articleFeedbackv5.inDialog = true;
		}
	};

	// }}}
	// {{{ closeAsModal

	/**
	 * Closes the feedback tool as a modal window
	 */
	$.articleFeedbackv5.closeAsModal = function () {
		if ( $.articleFeedbackv5.inDialog ) {
			$.articleFeedbackv5.setLinkId( '0' );
			$inner = $.articleFeedbackv5.$dialog.find( '.articleFeedbackv5-ui' ).detach();
			$.articleFeedbackv5.$holder.find( '.articleFeedbackv5-buffer' ).append( $inner );
			$.articleFeedbackv5.$holder.show();
			$.articleFeedbackv5.inDialog = false;
			if ( 'cta' == $.articleFeedbackv5.nowShowing ) {
				$.articleFeedbackv5.clear();
			}
		}
	};

	// }}}

	// }}}

// }}}
// {{{ articleFeedbackv5 plugin

/**
 * Right now there are no options for this plugin, but there will be in the
 * future, so allow them to be passed in.
 *
 * If a string is passed in, it's considered a public function
 */
$.fn.articleFeedbackv5 = function ( opts, arg ) {
	if ( typeof ( opts ) == 'undefined' || typeof ( opts ) == 'object' ) {
		$.articleFeedbackv5.init( $( this ), opts );
		return $( this );
	}
	var public = {
		setLinkId: { args: 1, ret: false },
		getBucketId: { args: 0, ret: true },
		inDebug: { args: 0, ret: true },
		nowShowing: { args: 0, ret: true },
		prefix: { args: 1, ret: true },
		addToRemovalQueue: { args: 1, ret: false },
		openAsModal: { args: 1, ret: false },
		closeAsModal: { args: 0, ret: true }
	};
	if ( opts in public ) {
		var r;
		if ( 1 == public[opts].args ) {
			r = $.articleFeedbackv5[opts]( arg );
		} else if ( 0 == public[opts].args ) {
			r = $.articleFeedbackv5[opts]();
		}
		if ( public[opts].ret) {
			return r;
		}
	}
	return $( this );
};

// }}}

} )( jQuery );

