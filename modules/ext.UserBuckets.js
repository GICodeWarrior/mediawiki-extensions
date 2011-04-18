

if( !JSON || !JSON.stringify ){
	//include OpenSource JSON stringify from json.org
}

( function( $ ) {
//lazy-load
$.getBuckets = function (force){
	if (typeof($.userBuckets) == 'undefined' || force ){
		$.userBuckets = $.parseJSON( $.cookie('userbuckets') );	
	}
	return $.userBuckets;
};

$.setBucket = function ( bucketName, bucketValue, bucketVersion ){
	var bucketCookies = $.getBuckets();
	if(!bucketCookies) { bucketCookies ={};}
	bucketCookies[ bucketName ] = [ bucketValue, bucketVersion ];
	$j.cookie('userbuckets', JSON.stringify( bucketCookies ) , { expires: 365 }); //expires in 1 year
	bucketCookies = $.getBuckets(true); //force it to rerun and update
};

$.setupActiveBuckets = function(){
	var buckets = $.getBuckets();
	for(iter in MW.activeCampaigns){
		var campaign = MW.activeCampaigns[iter];
		// if bucket has been set, or bucket version is out of date,
		// set up a user bucket
		if(!buckets || !buckets[campaign.name] || buckets[campaign.name][1] < campaign.version){
			//add up all rates
			var bucketTotal = 0;
			for ( var rate in campaign.rates ){
				bucketTotal += campaign.rates[rate];
			}
			
			//give the user a random number in those rates
			var currentUser = Math.floor(Math.random() * (bucketTotal+1));
			
			// recurse through the rates until we get into the range the user falls in,
			// assign them to that range
			var prev_val = -1;
			var next_val = 0;
			for( rate in campaign.rates ){
				next_val += campaign.rates[rate];
				if(prev_val <= currentUser && currentUser < next_val){
					$.setBucket(campaign.name, rate, campaign.version);
					break;
				}
				prev_val = next_val;
			}
		}
		
		// do the actual code in the campaign based on the bucket
		if($.getBuckets()[campaign.name] && $.getBuckets()[campaign.name][0] != "none"){
			campaign[$.getBuckets()[campaign.name][0]](); //function to execute
			if(campaign.allActive){
				campaign.allActive();
			}
		}
		
	}
	
};

//no need to do any of this if there are no active campaigns
if( (typeof(MW) != "undefined") && MW.activeCampaigns){
	$( document ).ready( jQuery.setupActiveBuckets );
}


} )( jQuery );
