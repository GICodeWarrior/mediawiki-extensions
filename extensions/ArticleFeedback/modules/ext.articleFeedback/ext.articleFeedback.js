( function( $ ) {
	$.ArticleFeedback = {
		'config': { 
			'authtoken': '',
			'userID': '',
			'pageID': wgArticleId,
			'revID': wgCurRevisionId
		},
		'messages': {},
		'settings': {
			'endpoint': wgScriptPath + '/api.php?',
			'fieldMessages' : [
				'wellsourced',
				'neutrality',
				'completeness',
				'readability'
			],
			'fieldHintSuffix': '-tooltip',
			'fieldPrefix': 'articlefeedback-rating-',
			'fieldHTML': '<div class="field-wrapper"> \
				<label class="rating-field-label"></label> \
				<select class="rating-field"> \
					<option value="1">1</option> \
					<option value="2">2</option> \
					<option value="3">3</option> \
					<option value="4">4</option> \
					<option value="5">5</option> \
				</select> \
			</div>',
			'structureHTML': '<div class="article-feedback-wrapper nonopopups"> \
				<form action="rate" method="post" id="article-feedback"> \
					<fieldset id="article-feedback-rate"> \
						<legend></legend> \
						<div class="article-feedback-information"> \
							<span class="article-feedback-rate-instructions"></span> \
							<span class="article-feedback-rate-feedback"></span> \
						</div> \
						<div class="article-feedback-rating-fields"></div> \
						<div class="article-feedback-submit"> \
							<input type="submit" value="Submit" /> \
						</div> \
					</fieldset> \
					<fieldset id="article-feedback-ratings"> \
						<legend></legend> \
						<div class="article-feedback-information"> \
							<span class="article-feedback-show-ratings"></span> \
							<span class="article-feedback-hide-ratings"></span> \
						</div> \
					</fieldset> \
				</form> \
			</div>',
			'ratingHTML': '<div class="article-feedback-rating"> \
					<span class="article-feedback-rating-field-name"></span> \
					<span class="article-feedback-rating-field-value-wrapper"> \
						<span class="article-feedback-rating-field-value">0%</span> \
					</span> \
					<span class="article-feedback-rating-count"></span> \
				</div>'
		},
		
		'fn' : {
			'init': function( $$options ) {
				// merge options with the config
				var settings = $.extend( {}, $.ArticleFeedback.settings, $$options );
				var config = $.ArticleFeedback.config;
				// if this is an anon user, get a unique identifier for them
				// load up the stored ratings and update the markup if the cookie exists
				var userToken = $.cookie( 'mwArticleFeedbackUserToken' );
				if ( typeof userToken == 'undefined' || userToken == null ) {
					function randomString( string_length ) {
						var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
						var randomstring = '';
						for ( var i = 0; i < string_length; i++ ) {
							var rnum = Math.floor( Math.random() * chars.length );
							randomstring += chars.substring( rnum, rnum + 1 );
						}
						return randomstring;
					}
					userToken = randomString( 32 );
					$.cookie(
						'mwArticleFeedbackUserToken',
						userToken,
						{ 'expires': 30, 'path': '/' }
					);
				}
				if ( !wgUserName ) {
					config.userID = userToken;
				}
				// setup our markup using the template variables in settings 
				var $structure = $( settings.structureHTML ),
					instructions = mediaWiki.msg( 'articlefeedback-pleaserate' ),
					feedback = mediaWiki.msg( 'articlefeedback-featurefeedback' ),
					yourfeedback = mediaWiki.msg( 'articlefeedback-yourfeedback'),
					articlerating = mediaWiki.msg( 'articlefeedback-articlerating' ),
					resultshide = mediaWiki.msg( 'articlefeedback-results-hide' ),
					resultsshow = mediaWiki.msg( 'articlefeedback-results-show' );
					submitbutton = mediaWiki.msg( 'articlefeedback-submit' );
				$structure
					.find( '#article-feedback-rate legend' )
						.html( yourfeedback )
						.end()
					.find( '.article-feedback-rate-instructions' )
						.html( instructions )
						.end()
					.find( '.article-feedback-rate-feedback' )
						.html( feedback )
							.find( '.feedbacklink' )
							.wrap( '<a href="#"></a>' )
								.parent()
									.click( $.ArticleFeedback.fn.showFeedback )
								.end()
							.end()
						.end()
					.find( '#article-feedback-ratings legend' )
						.html( articlerating )
						.end()
					.find( '.article-feedback-show-ratings' )
						.html( resultsshow )
							.find( '.showlink' )
							.wrap( '<a href="#"></a>' )
								.parent()
									.click( $.ArticleFeedback.fn.showRatings )
								.end()
							.end()
						.end()
					.find( '.article-feedback-hide-ratings' )
						.html( resultshide )
							.find ( '.hidelink' )
							.wrap( '<a href="#"></a>' )
								.parent()
									.click( $.ArticleFeedback.fn.hideRatings )
								.end()
							.end()
						.end()
					.find( '.article-feedback-submit input' )
						.val( submitbutton )
					.end();
				// hide the feedback link if we need to
				if( $.cookie( 'mwArticleFeedbackHideFeedbackLink' ) ) {
					$structure
						.find( '.article-feedback-rate-feedback' )
						.hide();
				}
				for ( var i = 0; i < settings.fieldMessages.length; i++ ) { 
					var $field = $( settings.fieldHTML ),
						$rating = $( settings.ratingHTML ),
						label = mediaWiki.msg( settings.fieldPrefix + settings.fieldMessages[i] ),
						field = settings.fieldMessages[i],
						hint = mediaWiki.msg(
							settings.fieldPrefix + settings.fieldMessages[i] +
								settings.fieldHintSuffix
						),
						count = mediaWiki.msg( 'articlefeedback-noratings', 0, 0 );
					// initialize the field html
					$field
						.attr( 'id', 'articlefeedback-rate-' + field )
						.find( 'label' )
							.attr( 'for', 'rating_' + field )
							.attr( 'original-title', hint )
							.html( label )
							.end()
						.find( 'select' )
							.attr( 'id', 'rating_' + field )
							.attr( 'name', 'rating[' + field + ']' );
					// initialize the rating html
					$rating
						.attr( 'id',  'articlefeedback-rating-' + field )
						.find( '.article-feedback-rating-field-name' )
							.html( label )
							.end()
						.find( '.article-feedback-rating-count' )
							.html( count );
					// append the field and rating html
					$structure
						.find( '.article-feedback-rating-fields' )
							.append( $field )
							.end()
						.find( '#article-feedback-ratings' )
							.append( $rating );
				}
				// store our settings and configuration for later
				$structure.find( '#article-feedback' )
					.data(
						'articleFeedback-context',
						{ 'settings': settings, 'config': config }
					);
				$( '#catlinks' ).before( $structure );
				// Hide the ratings initially
				$.ArticleFeedback.fn.hideRatings();

				
				// set the height of our smaller fieldset to match the taller
				if (
					$( '#article-feedback-rate' ).height() >
						$( '#article-feedback-ratings' ).height() ) {
					$( '#article-feedback-ratings' )
						.css( 'minHeight', $( '#article-feedback-rate' ).height() );
				} else {
					$( '#article-feedback-rate' )
						.css( 'minHeight', $( '#article-feedback-ratings' ).height() );
				}
				// attempt to fetch the ratings 
				$.ArticleFeedback.fn.getRatingData();
				
				// initialize the star plugin 
				$( '.rating-field' ).each( function() {
					$(this)
						.wrapAll( '<div class="rating-field"></div>' )
						.parent()
						.stars( { 
							inputType: 'select', 
							callback: function( value, link ) {
								// remove any stale or rated classes
								value.$stars.each( function() {
									$(this)
										.removeClass( 'ui-stars-star-stale' )
										.removeClass( 'ui-stars-star-rated' );
									// enable our submit button if it's still disabled
									$( '#article-feedback input:disabled' )
										.removeAttr( 'disabled' ); 
								} );
							}
						 } );
				} );
				// intialize the tooltips
				$( '.field-wrapper label[original-title]' ).each( function() {
					$(this)
						.after( $( '<span class="rating-field-hint" />' )
							.attr( 'original-title', $(this).attr( 'original-title' ) )
							.tipsy( { gravity : 'se', opacity: '0.9' } ) );
				} );
				// bind submit event to the form
				$( '#article-feedback' )
					.submit( function() { $.ArticleFeedback.fn.submitRating(); return false; } );
				// prevent the submit button for being active until all ratings are filled out
				$( '#article-feedback input[type=submit]' )
					.attr( 'disabled', 'disabled' );
			},
			'showRatings': function() {
				$( '#article-feedback-ratings' )
					.removeClass( 'article-feedback-ratings-disabled' )
					.find( '.article-feedback-show-ratings' )
					.hide()
					.end()
					.find( '.article-feedback-hide-ratings' )
					.show();
				return false;
			},
			'hideRatings': function() {
				$( '#article-feedback-ratings' )
					.addClass( 'article-feedback-ratings-disabled' )
					.find( '.article-feedback-hide-ratings' )
					.hide()
					.end()
					.find( '.article-feedback-show-ratings' )
					.show();
				return false;

			},
			
			// Request the ratings data for the current article
			'getRatingData': function() {
				var config = $( '#article-feedback' ).data( 'articleFeedback-context' ).config;
				var requestData = {
					'action': 'query',
					'list': 'articlefeedback',
					'aapageid': config.pageID,
					'aauserrating': 1,
					'format': 'json'
				}
				if ( config.userID.length == 32 ) {
					requestData.aaanontoken = config.userID;
				}

				var request = $.ajax( {
					url: wgScriptPath + '/api.php',
					data: requestData,
					dataType: 'json',
					success: $.ArticleFeedback.fn.afterGetRatingData,
					error: function( XMLHttpRequest, textStatus, errorThrown ) {
						$.ArticleFeedback.fn.flashNotice( mediaWiki.msg( 'articlefeedback-error' ),
							{ 'class': 'article-feedback-error-msg' } );
					}
				} );
			},
			'afterGetRatingData' : function( data ) {
				var settings = $( '#article-feedback' ).data( 'articleFeedback-context' ).settings,
					userHasRated = false;
				// add the correct data to the markup
				if ( typeof data.query != 'undefined' && typeof data.query.articlefeedback != 'undefined' &&
						typeof data.query.articlefeedback[0] != 'undefined' ) {
					for ( var r in data.query.articlefeedback[0].ratings ) {
						var rating = data.query.articlefeedback[0].ratings[r],
							$rating = $( '#' + rating.ratingdesc ),
							count = rating.count,
							total = ( rating.total / count ).toFixed( 1 ),
							label = mediaWiki.msg( 'articlefeedback-noratings', total, count );
						$rating
							.find( '.article-feedback-rating-field-value' )
							.text( total )
							.end()
							.find( '.article-feedback-rating-count' )
							.html( label );
						if( rating.userrating ) {
							userHasRated = true;
							// this user rated. Word. Show them their ratings
							var $rateControl = $( '#' + rating.ratingdesc.replace( 'rating', 'rate' ) + ' .rating-field' );
							$rateControl.stars( 'select', rating.userrating );
						}
					}
					// show the ratings if the user has rated
					if( userHasRated ) {
						$.ArticleFeedback.fn.showRatings();
					}
					// if the rating is more than 5 revisions old, mark it as stale
					if ( typeof data.query.articlefeedback[0].stale != 'undefined' ) {
						// add the stale star class to each on star
						$( '.ui-stars-star-on' )
							.addClass( 'ui-stars-star-stale' );
						// add the stale message
						var msg = mediaWiki.msg( 'articlefeedback-stalemessage-norevisioncount' );
						$.ArticleFeedback.fn.flashNotice( msg, { 'class': 'article-feedback-stale-msg' } );
					} else {
						// if it's not a stale rating, we want to make the stars blue
						$( '.ui-stars-star-on' ).addClass( 'ui-stars-star-rated' );
					}
				} 
				// initialize the ratings 
				$( '.article-feedback-rating-field-value' ).each( function() {
					$(this)
						.css( {
							'width': 120 - ( 120 * ( parseFloat( $(this).text() ) / 5 ) ) + 'px'
						} )
				} );
			},
			'submitRating': function() {
				var config = $( '#article-feedback' ).data( 'articleFeedback-context' ).config;
				// clear out the stale message
				$.ArticleFeedback.fn.flashNotice( );
				
				// lock the star inputs & submit
				$( '.rating-field' ).stars( 'disable' );
				$( '#article-feedback input' ).attr( 'disabled', 'disabled' ); 
				// get our results for submitting
				var results = {};
				$( '.rating-field input' ).each( function() {
					// expects the hidden inputs to have names like 'rating[field-name]' which we use to
					// be transparent about what values we're sending to the server
					var fieldName = $(this).attr( 'name' ).match( /\[([a-zA-Z0-9\-]*)\]/ )[1];
					results[ fieldName ] = $(this).val();
				} );
				var request = $.ajax( {
					url: wgScriptPath + '/api.php',
					type: 'POST',
					data: {
						'action': 'articlefeedback',
						'revid': config.revID,
						'pageid': config.pageID,
						'r1' : results['wellsourced'],
						'r2' : results['neutrality'],
						'r3' : results['completeness'],
						'r4' : results['readability'],
						'anontoken': config.userID,
						'format': 'json'
					},
					dataType: 'json',
					success: $.ArticleFeedback.fn.afterSubmitRating,
					error: function( XMLHttpRequest, textStatus, errorThrown ) {
						$.ArticleFeedback.fn.flashNotice( mediaWiki.msg( 'articlefeedback-error' ),
							{ 'class': 'article-feedback-error-msg' } );
					}
				} );
			},
			'afterSubmitRating': function ( data ) {
				// update the ratings 
				$.ArticleFeedback.fn.getRatingData();
				// set the stars to rated status
				$( '.ui-stars-star-on' ).addClass( 'ui-stars-star-rated' );
				// unlock the stars & submit
				$( '.rating-field' ).stars( 'enable' );
				$( '#article-feedback input:disabled' ).removeAttr( 'disabled' ); 
				// update the results
				
				// show the results
				$.ArticleFeedback.fn.showRatings();
				// say thank you
				$.ArticleFeedback.fn.flashNotice( mediaWiki.msg( 'articlefeedback-thanks' ),
					{ 'class': 'article-feedback-success-msg' } );
			},
			// places a message on the interface
			'flashNotice': function( text, options ) {
				if ( arguments.length == 0 ) {
					// clear existing messages, but don't add a new one
					$( '#article-feedback .article-feedback-flash' ).remove();
				} else {
					// clear and add a new message
					$( '#article-feedback .article-feedback-flash' ).remove();
					var className = options['class'];
					// create our new message
					$msg = $( '<div />' )
						.addClass( 'article-feedback-flash' )
						.html( text );
					// if the class option was passed, add it
					if( options['class'] ) {
						$msg.addClass( options['class'] );
					}
					// place our new message on the page
					$( '#article-feedback .article-feedback-submit' )
						.append( $msg );
				}
			},
			'showFeedback': function() {
				var $dialogDiv = $( '#article-feedback-dialog' );
				if ( $dialogDiv.size() == 0 ) {
					$dialogDiv = $( '<div id="article-feedback-dialog" class="loading" />' )
						.dialog( {
							width: 600,
							height: 400,
							bgiframe: true,
							autoOpen: true,
							modal: true,
							title: mediaWiki.msg( 'articlefeedback-survey-title' ),
							close: function() {
								$(this)
									.dialog( 'option', 'height', 400 )
									.find( '.article-feedback-success-msg, .article-feedback-error-msg' )
									.remove()
									.end()
									.find( 'form' )
									.show();
							}
						} );
					$dialogDiv.load(
						wgScript + '?title=Special:SimpleSurvey&survey=articlerating&raw=1',
						function() {
							$(this).find( 'form' ).bind( 'submit', $.ArticleFeedback.fn.submitFeedback );
							$(this).removeClass( 'loading' );
						}
					);
				}
				$dialogDiv.dialog( 'open' );
				return false;
			},
			'submitFeedback': function() {
				var $dialogDiv = $( '#article-feedback-dialog' );
				$dialogDiv
					.find( 'form' )
					.hide()
					.end()
					.addClass( 'loading' );
				// Submit straight to the special page. Yes, this is a dirty dirty hack
				// Build request from form data
				var formData = {};
				$dialogDiv.find( 'input[type=text], input[type=radio]:checked, input[type=checkbox]:checked, ' +
						'input[type=hidden], textarea' ).each( function() {
					var name = $(this).attr( 'name' );
					if ( name !== '' ) {
						if ( name.substr( -2 ) == '[]' ) {
							var trimmedName = name.substr( 0, name.length - 2 );
							if ( typeof formData[trimmedName] == 'undefined' ) {
								formData[trimmedName] = [];
							}
							formData[trimmedName].push( $(this).val() );
						} else {
							formData[name] = $(this).val();
						}
					}
				} );
				formData.title = 'Special:SimpleSurvey';
				
				$.ajax( {
					url: wgScript,
					type: 'POST',
					data: formData,
					dataType: 'html',
					success: function( data ) {
						// This is an evil screenscraping method to determine whether
						// the submission was successful
						var success = $( data ).find( '.simplesurvey-success' ).size() > 0;
						// TODO: Style success-msg, error-msg
						var $msgDiv = $( '<div />' )
							.addClass( success ? 'article-feedback-success-msg' : 'article-feedback-error-msg' )
							.html( mediaWiki.msg( success? 'articlefeedback-survey-thanks' : 'articlefeedback-error' ) )
							.appendTo( $dialogDiv );
						$dialogDiv.removeClass( 'loading' );
						
						// This is absurdly unnecessary from the looks of it, but it seems this is somehow
						// needed in certain cases.
						$dialogDiv.dialog( 'option', 'height', $msgDiv.height() + 100 );
						
						if ( success ) {
							// Hide the dialog link
							$( '#article-feedback .article-feedback-rate-feedback' ).hide();
							// set a cookie to keep the dialog link hidden
							$.cookie( 'mwArticleFeedbackHideFeedbackLink', true, { 'expires': 30, 'path': '/' } );
							
						}
					},
					error: function( XMLHttpRequest, textStatus, errorThrown ) {
						// TODO: Duplicates code, factor out, maybe
						var $msgDiv = $( '<div />' )
							.addClass( 'article-feedback-error-msg' )
							.html( mediaWiki.msg( 'articlefeedback-error' ) )
							.appendTo( $dialogDiv );
						$dialogDiv.removeClass( 'loading' );
						$dialogDiv.dialog( 'option', 'height', $msgDiv.height() + 100 );
					}
				} );
				return false;
			}
		}
	};
	$( document ).ready( function () {
		$.ArticleFeedback.fn.init( );
	} ); //document ready
} )( jQuery );
