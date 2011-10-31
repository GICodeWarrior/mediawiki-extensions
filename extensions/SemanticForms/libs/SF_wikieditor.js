// create ext if it does not exist yet
if ( typeof( window[ 'ext' ] ) == "undefined" ) {
	window[ 'ext' ] = {};
}

window.ext.wikieditor = new function(){
	
	var config;
	var isSetUp = false;
	
	// common setup for all editor instances
	function setup () {
		config = jQuery.wikiEditor.modules.toolbar.config.getDefaultConfig();
		config.toolbar.advanced.groups.insert.tools.table.filters = ['textarea:not(#wpTextbox1):not(.toolbar-dialogs)'];
	}

	// initialize the wikieditor on the specified element
	function init  ( input_id, params ) {
		
		if ( !isSetUp ) {
			isSetUp = true;
			setup();
		}
		
		var input = jQuery( '#' + input_id );
		input.wikiEditor( 'addModule', config );
	}

	// export public funcitons
	this.setup = setup;
	this.init = init;

};
