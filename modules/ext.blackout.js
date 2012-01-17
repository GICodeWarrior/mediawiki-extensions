/**
* Javascript for Blackout extension.
*
* You may modify the Javascript code on the MediaWiki:Common.js
*
* @addtogroup Extensions
* @license GPL
*/
 
( function ($) {
	var namespaceWhitelist = ['Special'];  // n.b. community has decided for full blackout including Special pages, but it is hard to do stuff in the meantime without this.
	var pageWhitelist = [
		'Stop Online Piracy Act',
		'PROTECT IP Act',
		'Online Protection and Enforcement of Digital Trade Act',
		'Censorship',
                'Special:CongressLookup',
                'Special:NoticeTemplate',
                'Special:NoticeTemplate/view'
	];
        var geoHasUsRep = [
            'US', // USA
            'PR', // Puerto Rico
            'VI',  // Virgin Islands
            'MP', // Northern Mariana Islands
            'AS', // American Samoa
            'GU'  // Guam
         ];

	// Exclude some namespaces
	for ( var i = 0; i < namespaceWhitelist.length; i++ ) {
		if ( namespaceWhitelist[i] == wgCanonicalNamespace ) {
			return;
		}
	}

	// Exclude some individual pages
	for ( var i = 0; i < pageWhitelist.length; i++ ) {
		if ( pageWhitelist[i] == wgPageName || pageWhitelist[i] == wgPageName.replace( /_/g, ' ' ) ) {
			return;
		}
	}
        
        var hasUsRep = false;
        for ( var i = 0; i < geoHasUsRep.length; i ++ ) {
                if ( geoHasUsRep[i] == Geo.country ) {
                     hasUsRep = true;
                     break;
                }
        }

	var overlayHeight = $(document).height();

	var overlay = $('<div id="sopaOverlay"></div>');
        var column = $('<div id="sopaColumn"></div>');
        var headline = $('<div id="sopaHeadline">{{{wp-sopa-title}}}</div>');
        var intro = $('<div id="sopaText">{{{wp-sopa-blocktext}}}</div>');

        var takeActionLink = $('<a class="action">{{{wp-sopa-takeaction}}}</a>').click( function() {
            takeActionLink.toggleClass( 'open' );
            action.slideToggle();
        } );
        var takeAction = $('<div id="sopaTakeAction"></div>').append( takeActionLink );
        var action = $('<div id="sopaAction"></div>');
        if ( hasUsRep ) {
            action.append( $('<div class="sopaActionDiv"><p class="sopaActionHead">{{{wp-sopa-zipform-intro}}}</p><div class="sopaActionDiv"><form action="/wiki/Special:CongressLookup" action="GET"><label for="zip">{{{wp-sopa-zipform-label}}}</label> <input name="zip" type="text" size="5"> <input type="submit" name="submit" value="{{{wp-sopa-zipform-submit}}}"></form></div></div>' ) );
        }

var $socialDiv = $('<div></div>');


var socialSites = [
  {
    url: 'https://www.facebook.com/sharer.php?u=' + encodeURIComponent( '{{{wp-sopa-facebook-link}}}' ),
    title: '{{{wp-sopa-facebook-button}}}',
    hi: '//upload.wikimedia.org/wikipedia/commons/b/b9/WP_SOPA_sm_icon_facebook_ffffff.png',
    icon: '//upload.wikimedia.org/wikipedia/commons/2/2a/WP_SOPA_sm_icon_facebook_dedede.png'
  },
  {
    url: 'https://m.google.com/app/plus/x/?v=compose&content=' + encodeURIComponent( '{{{wp-sopa-google-plus-post}}}' ),
    title: '{{{wp-sopa-google-plus-button}}}',
    hi: '//upload.wikimedia.org/wikipedia/commons/a/a1/WP_SOPA_sm_icon_gplus_ffffff.png',
    icon: '//upload.wikimedia.org/wikipedia/commons/0/08/WP_SOPA_sm_icon_gplus_dedede.png'
  },
  { 
    url: 'https://twitter.com/intent/tweet?original_referer=' + encodeURIComponent( window.location ) + '&text=' + encodeURIComponent( '{{{wp-sopa-tweet}}}' ),
    title: '{{{wp-sopa-twitter-button}}}',
    hi: '//upload.wikimedia.org/wikipedia/commons/8/8a/WP_SOPA_sm_icon_twitter_ffffff.png',
    icon: '//upload.wikimedia.org/wikipedia/commons/4/45/WP_SOPA_sm_icon_twitter_dedede.png'
  }
];


for (var i = 0; i < socialSites.length; i++ ) {
   ( function ( site )  {
     function linkify( $item ) {
        return $( '<a></a>' )
          .css( 'text-decoration', 'none' )
          .attr( 'href', site.url )
          .click( function() { 
              window.open( 
                 site.url, 
                 'wpblackout_' + site.title + '_share' ,
                 'width=500,height=300,left=' + (screen.availWidth/2-250) + ',top=' + (screen.availHeight/2-150)
              );
             return false;
          } ).append( $item );
     }
     var $icon = $( '<img></img>' ).attr( { 'width': 33, 'height': 33, 'src': site.icon } );
     var $iconLink = linkify( $icon );
     var $wordLink = linkify( site.title );
     var $div = $( '<div class="sopaSocial"></div>' );
     $div.hover( 
        function() { 
          $icon.attr( 'src', site.hi );
          $wordLink.css( 'color', '#ffffff' );
        },
        function() {
          $icon.attr( 'src', site.icon );
          $wordLink.css( 'color', '#dedede' );
        }
     );
     $div.append( $iconLink, $('<br>'), $wordLink );
     $socialDiv.append($div);   
   } )( socialSites[i] );
}

        action.append( $( '<div class="sopaActionDiv"></div>' ).append( 
            $( '<p class="sopaActionHead">{{{wp-sopa-social-media-intro}}}</p>' ),
            $( '<div class="sopaActionDiv"></div>' ).append( 
                 $socialDiv,
                 $( '<div style="clear:both;"/>' )
             )
        ) );


        var learnMore = $('<div id="sopaLearnMore"><a class="action" href="{{{wp-sopa-learnmoreurl}}}">{{{wp-sopa-learnmore}}}</a></div>');

        column.append( headline, intro, takeAction, action, learnMore );
        overlay.append( column );
 
	$('body').append(overlay);
	$('body').css('overflow','hidden'); // hide scrollbar for underlaying article
} )(jQuery);