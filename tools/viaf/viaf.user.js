// ==UserScript==
// @name           viaf
// @namespace      viaf
// @require	   https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js
// @require        http://svn.wikimedia.org/svnroot/mediawiki/trunk/tools/viaf/jquery.cookie.js
// @require        http://svn.wikimedia.org/svnroot/mediawiki/trunk/tools/viaf/jquery.ba-replacetext.js
// @description    locate VIAF numbers in texts and urls on web pages. (c) T.Gries Version 0.203 201108242100
// @include        *
// ==/UserScript==

/***
 * Copyright (c) 2011 T. Gries
 *
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * 20110806	Initial version; detecting VIAF in texts
 * 20110811	color marking of VIAF number; detecting VIAF in Urls
 * 		creation of three additional links with VIAF numbers as arguments
 * 20110813	summary: an alert box shows detected distinct and sorted VIAF numbers
 * 20110814	more language specific urls; use jquery 1.6.2 from google
 *		alert box shows up to maxVIAFNumbers
 * 20110816     wrapped into a closure
 * 20110817     disabled the built-in update checker; it has set 1-day cookie
 * 		"update" for every page by mistake.
 * 20110823     changed viaf.org link composition
 * 20110824     added google link
 *              imported as a new project to svn.wikimedia.org;
 *              updated the require paths to pull required javascripts from there
 *              detection of VIAF, VIAF2 .. VIAF9
 ***/

// wrapper see http://www.mediawiki.org/wiki/JQuery
// to avoid possible conflicts with other scripts on the current page
( function ( $ ) {

var markUrlDetectedItems = true; // if detected items in Urls will be marked
var markUrlDetectedItemsCSS = { "borderBottom" : "1px orangered dotted" };

// maximum of VIAF numbers which are shown in the summary box
var maxVIAFNumbers = 30;

// Script update checker source: http://a32.me/2009/11/greasemonkey/
var VERSION = "0.203";
var SCRIPT_NAME = "viaf"
var SCRIPT_URL = "http://$$$yourhost$$$/"+SCRIPT_NAME+".user.js"

function updateCheck2() {
	updateCheck(1);
}

function updateCheck(verbose) {

   try {
      GM_xmlhttpRequest({
         method: 'GET',
         url: SCRIPT_URL + "?rnd="+Math.random(),
         onload: function(result) {
            if (result.status != 200) throw "status="+result.status;

            var tmp = /VERSION[\s=]+"(.*?)"/.exec(result.responseText);
            if (tmp == null) throw "parse error";

            if (VERSION < tmp[1]) {
               if ( ($.cookie("updatecheck", {path:'/'} ) == null) || ( $("#updateinfo").length == 0) ) if (window.confirm("A newer version of the Greasemonkey script "+SCRIPT_NAME+" is available. You currently have version "+VERSION+".\n\nDo you want to update to version "+tmp[1]+" from "+SCRIPT_URL+" now ?\n\nPress Ctrl+F5 after the installation has finished to clear your browser chache.")) location.href = SCRIPT_URL;

	       $("#updateinfo")
	       		.css("background","yellow")
			.text(" New version of Greasemonkey script "+SCRIPT_NAME+" available.")
			.attr("title","Click here to update to "+SCRIPT_NAME+" version "+tmp[1]+". Your current version is "+VERSION)
			.mouseover( function(){ $(this).css("cursor","pointer") } )
			.click( function() { $(this).fadeOut(2000); location.href=SCRIPT_URL } );

            } else {
               if (verbose) alert("There is no newer version of the Greasemonkey script "+SCRIPT_NAME+" available. Feel lucky, because you already have the latest version "+VERSION+".") ;
            }

         $.cookie("updatecheck", "1", {expires:1, path:'/'} );

         }
      });
   } catch (error) {
      alert('Error updating: '+error);
   }
}

var out = new Array();

function doAnyOtherBusiness( viaf ) {
	// add the element only if it does not exist in list
	if ( out.indexOf(viaf) == -1 ) {
		out.push(viaf);
	}
}


// update checker (disabled)
// GM_registerMenuCommand("Check for update of "+SCRIPT_NAME, updateCheck2);
// updateCheck(0);


// PASS 1
// try to retrieve as much viaf numbers from text as possible
// but don't look in an active textareas like mediawiki input textarea

$("body *:not(textarea)")
	.replaceText( /(viaf[1-9]?)(:|\/|%3A|%2F|\s|ID:|=|%3D)+([0-9]+)/gi, "<span class='viaf viaf-in-text' viaf='$3'>$1$2$3</span>" );

// PASS 2
// try to retrieve viaf numbers in urls

$("a").each(function(){
	var $this = $(this);
	if ( $this.find(".viaf").length != 0 ) return; // in PASS 2, skip all entries which have this attribute from PASS 1
	var url = $this.attr("href");

	var magicUrlRegExp = new RegExp( /(http:\/\/viaf.org\/(viaf\/)?(\d+)|http:\/\/www.librarything.de\/commonknowledge\/search.php?f=13&exact=1&q=VIAF%3A(\d)+)/gi );

	if ( typeof url != "undefined" && url.match( magicUrlRegExp ) ) {
	        if ( markUrlDetectedItems ) $this.css( markUrlDetectedItemsCSS );
	        var viaf = RegExp.$1.replace( /[\D]*/g, '' );
		$this.after( $("<span class='viaf viaf-in-url' viaf='"+viaf+"'>&nbsp;"+viaf+"</span>") );
	}

})

// PASS 3
// add additional predefined target links
// after the place where VIAF numbers were detected

$(".viaf").each(function(){
	var $this = $(this);
	var viaf = $this.attr( "viaf" );

    	var newLink = new Array();
	newLink.unshift( $( "<span> <a href='http://viaf.org/viaf/"+viaf+"/' class='addedlink viaf' viaf='"+viaf+"'>VIAF</a></span>" ) );
    	newLink.unshift( $( "<span> <a href='http://www.librarything.de/commonknowledge/search.php?f=13&exact=1&q=VIAF%3A"+viaf+"' class='addedlink viaf' viaf='"+viaf+"'>LT de</a></span>" ) );
	newLink.unshift( $( "<span> <a href='http://www.librarything.com/commonknowledge/search.php?f=13&exact=1&q=VIAF%3A"+viaf+"' class='addedlink viaf' viaf='"+viaf+"'>en</a></span>" ) );
	newLink.unshift( $( "<span> <a href='http://ru.librarything.com/commonknowledge/search.php?f=13&exact=1&q=VIAF%3A"+viaf+"' class='addedlink viaf' viaf='"+viaf+"'>ru</a></span>" ) );
	newLink.unshift( $( "<span> <a href='http://yi.librarything.com/commonknowledge/search.php?f=13&exact=1&q=VIAF%3A"+viaf+"' class='addedlink viaf' viaf='"+viaf+"'>yi</a></span>" ) );
	newLink.unshift( $( "<span> <a href='http://toolserver.org/%7Eapper/pd/person/viaf/"+viaf+"' class='addedlink viaf' viaf='"+viaf+"'>TS</a></span>" ) );
	newLink.unshift( $( "<span> <a href='http://www.google.com/search?num=100&q=viaf+"+viaf+"' class='addedlink viaf' viaf='"+viaf+"'>G</a></span>" ) );
	// newLink.unshift( $( "<label class='show-summary'><input type='checkbox' class='show-summary-checkbox' checked='checked'><span id='show-summary-text'></span></label>" ) );

	// add a space as the last character after the last added links
        newLink.unshift( $("<span> </span>") );

    	for ( i in newLink ) {
        	$this.after( newLink[i] )
	}
    	doAnyOtherBusiness( viaf );
})

// style all checkboxes
$( ".show-summary-checkbox" )
	.click(function(e){
	        $this=$(this);
	        if ( $this.attr("checked")=='checked' ) {
   			$( ".show-summary-checkbox" ).attr("checked", true);
		} else {
   			$( ".show-summary-checkbox" ).removeAttr("checked");
		}
	});

// style all detected numbers
$( ".viaf" ).css( { "background":"cyan", "color":"black" } );

// style all detected numbers in urls
$( ".viaf-in-url" ).css( "border-bottom", "1px dotted black" );

// style all added links
$( ".addedlink" ).css( { "background":"yellow" , "color":"black" } );

function numSort( a, b ) { return a-b }


// show a summary of the collected numbers
if ( out.length > 0 ) {

	out.sort( numSort );
	var x = "";
	for ( var i=0; i < Math.min( out.length, maxVIAFNumbers ) ; i++ ) {
		x += out[i]+"\n";
	}

	if ( out.length > maxVIAFNumbers ) x += "...\n("+maxVIAFNumbers+" of "+out.length+" distinct numbers are shown.)";
	var pluralS = ( out.length > 1 ) ? "s" : "";

	// comment the following line if you don't want to see the summary (alert) box
	alert( "The present page contains "+out.length+" distinct VIAF number"+pluralS+" in text or links.\nModify the script if you want to remove the alert box permanently.\n\n"+x );
}

}) ( jQuery );
