/**
 * Frequent Pattern Tag Cloud Plug-in
 * Search javascript
 * 
 * @author Tobias Beck, University of Heidelberg
 * @author Andreas Fay, University of Heidelberg
 * @version 1.0
 */
 
 $().ready(function() {
    // Autosuggestion for search input field using frequent pattern techniques
    $.widget( "custom.autocomplete_search", $.ui.autocomplete, {
		_renderMenu: function( ul, items ) {
			var self = this, currentCategory = "";
			$.each( items, function( index, item ) {
				if ( item.category != currentCategory ) {
				    // Value changed
					ul.append('<li class="fptc_search_category">' + item.category + "</li>" );
					currentCategory = item.category;
				}
				self._renderItem( ul, item );
			});
		}
	});
    $("#searchInput, #searchText").autocomplete_search({
        delay: 0,
        source: function(currentValue, callbackForResults) {
            sajax_do_call("FreqPatternTagCloud::getSearchSuggestions", [currentValue.term], function(data) {
                // Process return data
                callbackForResults(jQuery.parseJSON(data.responseText));
            });
        }
    });
});