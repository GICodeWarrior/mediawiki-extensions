function getHTTPObject() {
	var xmlhttp;

	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {
			try {
				xmlhttp = new XMLHttpRequest();
			} catch (e) {
				xmlhttp = false;
			}
		}
	}

	return xmlhttp;
}

function getSuggestPrefix(node, postFix) {
	var nodeId = node.id;
	return stripSuffix(nodeId, postFix);
}

function leftTrim(sString) {
	while (sString.substring(0,1) == ' ' || sString.substring(0,1) == "\n") {
			sString = sString.substring(1, sString.length);
		}
	return sString;
}

/*
* suggests a list (of languages, classes...) according to the letters typed in the query field
* or to the arrows "next" "previous"
*/
function updateSuggestions(suggestPrefix) {
	var http = getHTTPObject();
	var table = document.getElementById(suggestPrefix + "table");
	var suggestQuery = document.getElementById(suggestPrefix + "query").value;
	var suggestOffset = document.getElementById(suggestPrefix + "offset").value;
	var dataSet = document.getElementById(suggestPrefix + "dataset").value;	

	suggestText = document.getElementById(suggestPrefix + "text");
	suggestText.className = "suggest-loading";

	var suggestAttributesLevel = document.getElementById(suggestPrefix + "parameter-level");
	var suggestDefinedMeaningId = document.getElementById(suggestPrefix + "parameter-definedMeaningId");
	var suggestSyntransId = document.getElementById(suggestPrefix + "parameter-syntransId");
	var suggestAnnotationAttributeId = document.getElementById(suggestPrefix + "parameter-annotationAttributeId");
	
	var URL = 'index.php';
	var location = "" + document.location;
	
	if (location.indexOf('index.php/') > 0)	URL = '../' + URL;

	URL = 
		wgScript +
		'?title=Special:Suggest&search-text=' + encodeURI(suggestText.value) + 
		'&prefix=' + encodeURI(suggestPrefix) + 
		'&query=' + encodeURI(suggestQuery) + 
		'&offset=' + encodeURI(suggestOffset) + 
		'&dataset='+dataSet;
		
	if (suggestAttributesLevel != null)
		URL = URL + '&attributesLevel=' + encodeURI(suggestAttributesLevel.value);
	
	if (suggestDefinedMeaningId != null) 
		URL = URL + '&definedMeaningId=' + encodeURI(suggestDefinedMeaningId.value);
		
	if (suggestSyntransId != null) 
		URL = URL + '&syntransId=' + encodeURI(suggestSyntransId.value);
		
	if (suggestAnnotationAttributeId != null)
		URL = URL + '&annotationAttributeId=' + encodeURI(suggestAnnotationAttributeId.value);
			
	http.onreadystatechange = function() {
		if (http.readyState == 4) {
			var newTable = document.createElement('div');
			//alert(http.responseText);
			if (http.responseText != '') {
				newTable.innerHTML = leftTrim(http.responseText);
				table.parentNode.replaceChild(newTable.firstChild, table);
			}
			suggestText.className = "";

			// comparing the stored value send in the URL, and the actual value
			if ( suggestTextVal != suggestText.value ) {
				suggestionTimeOut = setTimeout("updateSuggestions(\"" + suggestPrefix + "\")", 100);
			}
		}
	};

	http.open('GET', URL, true);
	http.send(null);
}

var suggestionTimeOut = null;

function scheduleUpdateSuggestions(suggestPrefix) {
	if (suggestionTimeOut != null)
		clearTimeout(suggestionTimeOut);

	var suggestOffset = document.getElementById(suggestPrefix + "offset");
	suggestOffset.value = 0;
	suggestionTimeOut = setTimeout("updateSuggestions(\"" + suggestPrefix + "\")", 600);
}

function suggestTextChanged(suggestText) {
	scheduleUpdateSuggestions(getSuggestPrefix(suggestText, "text"));
}

function mouseOverRow(row) {
	row.className = "suggestion-row active";
}

function mouseOutRow(row) {
	row.className = "suggestion-row inactive";
}

function stopEventHandling(event) {
	event.cancelBubble = true;

	if (event.stopPropagation)
		event.stopPropagation();

	if (event.preventDefault)
		event.preventDefault();
	else
		event.returnValue = false;
}

function suggestLinkClicked(event, suggestLink) {
	var suggestLinkId = suggestLink.id;
	// removing the "link" at the end of the Id
	var suggestPrefix = suggestLinkId.substr(0, suggestLinkId.length - 4);

	var suggestDiv = document.getElementById(suggestPrefix + "div");
	var suggestField = document.getElementById(suggestPrefix + "text");
	suggestDiv.style.display = 'block';

	if (suggestField != null) {
		suggestField.focus();
		updateSuggestions(suggestPrefix);
	}

	stopEventHandling(event);
}

function updateSelectOptions(id, objectId, value) {
	var http = getHTTPObject();
	var URL = 'index.php';
	var location = "" + document.location;

	if (location.indexOf('index.php/') > 0) URL = '../' + URL;
	http.open('GET', URL + '/Special:Select?optnAtt=' + encodeURI(value) + '&attribute-object=' + encodeURI(objectId), true);
	http.send(null);

	http.onreadystatechange = function() {
		if (http.readyState == 4) {
			var select = document.getElementById(id);
			select.options.length = 0;
			var options = http.responseText.split("\n");

			for (idx in options) {
				option = options[idx].split(";");
				select.add(new Option(option[1],option[0]),null);
			}
		}
	};
}

function updateSuggestValue(suggestPrefix, value, displayValue) {
	var suggestLink = document.getElementById(suggestPrefix + "link");
	var suggestValue = document.getElementById(suggestPrefix + "value");
	var suggestDiv = document.getElementById(suggestPrefix + "div");
	var suggestField = document.getElementById(stripSuffix(suggestPrefix, "-suggest-"));

	suggestField.value = value;

	suggestLink.innerHTML = displayValue;
	suggestDiv.style.display = 'none';
	suggestLink.focus();

	var suggestOnUpdate = document.getElementById(suggestPrefix + "parameter-onUpdate");
	if(suggestOnUpdate != null) 
		eval(suggestOnUpdate.value + "," + value + ")");
}

function suggestClearClicked(event, suggestClear) {
	updateSuggestValue(getSuggestPrefix(suggestClear, 'clear'), "", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
	stopEventHandling(event);
}

function suggestCloseClicked(event, suggestClose) {
	var suggestPrefix = getSuggestPrefix(suggestClose, 'close');
	var suggestDiv = document.getElementById(suggestPrefix + 'div');
	suggestDiv.style.display = 'none';
	stopEventHandling(event);
}

function suggestNextClicked(event, suggestNext, dataSetOverride) {
	var suggestPrefix = getSuggestPrefix(suggestNext, 'next');
	var suggestOffset = document.getElementById(suggestPrefix + 'offset');
	suggestOffset.value = parseInt(suggestOffset.value) + 10;
	updateSuggestions(suggestPrefix);
	stopEventHandling(event);
}

function suggestPreviousClicked(event, suggestPrevious) {
	var suggestPrefix = getSuggestPrefix(suggestPrevious, 'previous');
	var suggestOffset = document.getElementById(suggestPrefix + 'offset');
	suggestOffset.value = Math.max(parseInt(suggestOffset.value) - 10, 0);
	updateSuggestions(suggestPrefix);
	stopEventHandling(event);
}

function suggestRowClicked(event, suggestRow) {
	var suggestPrefix = getSuggestPrefix(suggestRow.parentNode.parentNode.parentNode.parentNode, "div"); 
	var idColumnsField = document.getElementById(suggestPrefix + "id-columns");
	var displayLabelField = document.getElementById(suggestPrefix + "label-columns");
	var displayLabelColumnIndices = displayLabelField.value.split(", ");
	var labels = new Array();
	
	for (var i = 0; i < displayLabelColumnIndices.length; i++) {
		var columnValue = suggestRow.getElementsByTagName('td')[displayLabelColumnIndices[i]].innerHTML;
		
		if (columnValue != "")
			labels.push(columnValue);
	} 
	
	var idColumns = 1;
	
	if (idColumnsField != null)
		idColumns = idColumnsField.value;
	
	var values = suggestRow.id.split('-');
	var ids = new Array();
	
	for (var i = idColumns - 1; i >= 0; i--) 
		ids.push(values[values.length - i - 1]);

	updateSuggestValue(suggestPrefix, ids.join('-'), labels.join(', '));
	stopEventHandling(event);
}

function enableChildNodes(node, enabled) {
	if (enabled)
		var disabled = "";
	else
		var disabled = "disabled";

	childNodes = node.getElementsByTagName('select');

	for (var i = 0; i < childNodes.length; i++)
		childNodes[i].disabled = disabled;
}

function removeClicked(checkBox) {
	var container = checkBox.parentNode.parentNode;

	if (checkBox.checked)
		container.className = "to-be-removed";
	else
		container.className = "";

	//enableChildNodes(container, !checkBox.checked);
}
