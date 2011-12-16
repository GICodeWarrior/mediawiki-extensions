var link = $('<a id="newtrans" href="#"></a>')
	.text( mw.msg('translatesvg-addlink') )
	.click(function() {
	var langcode = prompt("Specify new language code (e.g. en, fr, de, es...)");
	if( langcode !== null ){
		var newfieldset = $('fieldset#fallback').clone();
		newfieldset.find('input').each( function (){
			$(this).attr( 'id', $(this).attr( 'id' ).toString().replace( 'fallback', langcode ) );
			$(this).attr( 'name', $(this).attr( 'name' ).toString().replace( 'fallback', langcode ) );
		});	
		newfieldset.find('label').each( function (){
			$(this).attr( 'for', $(this).attr( 'for' ).toString().replace( 'fallback', langcode ) );
		});
		newfieldset.attr( 'id', langcode );
		newfieldset = $('a#newtrans').after( newfieldset );
		$('fieldset#' + langcode + ' legend').remove();
		$('fieldset#' + langcode ).prepend( '<legend>' + langcode + '</legend>' );
	}
	return false;
}); //TODO: localise, validate input, en=>English
var paragraph = $('<p></p>').text( mw.msg('translatesvg-add'))
							.append( link );
$('form#specialtranslatesvg').prepend(paragraph);