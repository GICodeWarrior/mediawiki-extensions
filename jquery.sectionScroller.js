/*
* This takes a section id as a parameter and then makes the browser scroll
* to this section.
*/

( function( $ ) { 

$.sectionScroller = {
	scrollToSection: function( id ) {
		$('html,body').animate( { scrollTop: $("#"+id).offset().top}, 'slow'); }
	}; 
}

) ( jQuery );
