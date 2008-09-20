var selected_gift = 0;

function selectGift(id){
	//un-select previously selected gift
	if(selected_gift)YAHOO.util.Dom.removeClass("give_gift_"+selected_gift, 'g-give-all-selected');
	
	//select new gift
	YAHOO.util.Dom.addClass("give_gift_"+id, 'g-give-all-selected');
	
	selected_gift = id;
}

function highlightGift(id){
	
	YAHOO.util.Dom.addClass("give_gift_"+id, 'g-give-all-highlight');
	
}

function unHighlightGift(id){
	
	YAHOO.util.Dom.removeClass("give_gift_"+id, 'g-give-all-highlight');
	
}

function sendGift(){
	if(!selected_gift){
		alert("Please select a gift")
		return false;
	}
	document.gift.gift_id.value = selected_gift;
	document.gift.submit();
}

function chooseFriend(friend){
	// Now, this is a rather nasty hack since the original (commented out below) wouldn't work when $wgScriptPath was set
	//window.location = window.location + "&user=" + friend;
	window.location = wgServer + wgScript + "?title=Special:GiveGift" + "&user=" + friend;
}