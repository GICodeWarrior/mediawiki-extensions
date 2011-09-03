/**
 * Frequent Pattern Tag Cloud Plug-in
 * Main javascript
 * 
 * @author Tobias Beck, University of Heidelberg
 * @author Andreas Fay, University of Heidelberg
 * @version 1.0
 */

/**
 * Relocates to process different attribute
 */
function fptc_relocate() {
    var regexp = /index.php\/([^\/]+)/;
    regexp.exec(window.location.href);
    
    // Relocate
    var pageName = RegExp.$1;
	window.location = window.location.href.replace(new RegExp(pageName + ".*"), pageName + "/" + $("#fptc_attributeName").val());
};

$().ready(function() {
    // Process form when key "return" is pressed
	$("#fptc_attributeName").keypress(function(e) {
		if(e.which == 13){
			fptc_relocate();
		}
	});
	
	var attribute = $("#fptc_attributeName").val();
	
	// Context menu for tag cloud
    $(".fptc_tag a").contextMenu({
        menu: "fptc_contextMenu",
        onOpen: function(el) {
            // Indicate loading
            $("#fptc_contextMenu li").slice(2).remove();
            $("#fptc_contextMenu").append('<li class="loading"></li>');
        
            // Replace contents when done with loading
            sajax_do_call("FreqPatternTagCloud::getSuggestions", [attribute, el.text()], function(data) {
                // Process return data
                $("#fptc_contextMenu .loading").replaceWith(data.responseText);
            });
        }
    }, function(action, el, pos, menu) {
        if (action == "browse") {
            window.location = el.attr("href");
        } else if (action == "browse_similar_tag") {
            window.location = el.attr("href").replace(new RegExp(el.text()), menu.attr("title"));
        }
    });
    
    // Autosuggestion for input field
    $("#fptc_attributeName").autocomplete({
        delay: 0,
        source: function(currentValue, callbackForResults) {
            sajax_do_call("FreqPatternTagCloud::getAttributeSuggestions", [currentValue.term], function(data) {
                // Process return data
                callbackForResults(jQuery.parseJSON(data.responseText));
            });
        }
    });
});