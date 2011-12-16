var link = $('<a id="newtrans" href="#"></a>')
	.text( mw.msg('translatesvg-addlink') )
	.click(function() {
	var langcode = prompt( mw.msg('translatesvg-specify') );
	if( langcode !== null ){
		var newfieldset = $('fieldset#fallback').clone();
		newfieldset.find('input').each( function (){
			$(this).attr( 'id', $(this).attr( 'id' ).toString().replace( 'fallback', langcode ) );
			$(this).attr( 'name', $(this).attr( 'name' ).toString().replace( 'fallback', langcode ) );
			$(this).attr( 'value', getExisting( $(this).attr( 'value' ) ) );
		});	
		newfieldset.find('label').each( function (){
			$(this).attr( 'for', $(this).attr( 'for' ).toString().replace( 'fallback', langcode ) );
		});
		newfieldset.attr( 'id', langcode );
		newfieldset = $('a#newtrans').after( newfieldset );
		$('fieldset#' + langcode + ' legend').remove();
		$('fieldset#' + langcode ).prepend( '<legend>' + codeToText( langcode ) + '</legend>' );
	}
	return false;
}); //TODO: validate input
var paragraph = $('<p></p>').text( mw.msg('translatesvg-add'))
							.append( link );
$('form#specialtranslatesvg').prepend(paragraph);

function getExisting( fallback ){
	//No need to check for an existing translation since we're creating a new language box
	if( fallback.match( /^[0-9 .,]+$/ ) ){
		return fallback;
	} else {
		return '';
	}
}
function codeToText( langcode ){
	//TODO
	return langcode;
}