
//checks
if(typeof(MW) == "undefined"){ MW={};}
if(!MW.activeCampaigns){ MW.activeCampaigns ={}; }

//define new active campaign
MW.activeCampaigns[MW.activeCampaigns.length] =

{ 
  //Treatment name
  "name": "ArticleSave",
  
  //Treatment version. Increment this when altering rates
  "version": 2,
  
  // Rates are calculated out of the total sum, so
  // rates of x:10000, y:3, and z:1 mean users have a
  // chance of being in bucket x at 10000/10004,
  // y at 3/10004 and z at 1/10004
  // The algorithm is faster if these are ordered in descending order,
  // particularly if there are orders of magnitude differences in the
  // bucket sizes
  // "none" is reserved for control
  "rates": {"none": 10000, "Bold": 3, "Italics": 1 },
  
  // individual changes, function names corresponding
  // to what is in "rates" object
  // (note: "none" function not needed or used)
  
  "Bold": function(){
	  //change edit button to bold  
	  $j("#wpSave").css("font-weight", "bolder");
	  
  },
  "Italics": function(){
	  //change edit button to italics
	  $j("#wpSave").css("font-weight", "normal")
	  			   .css("font-style", "italic");
	  
  },
  
  // "allActive" is reserved.
  // If this function exists, it will be apply to every user not in the "none" bucket
  "allActive": function(){
	  //add click tracking to save
	  $j("#wpSave").click(function(){ $j.trackAction('save'); });
	  //add click tracking to preview
	  $j("#wpPreview").click(function(){ $j.trackAction('preview'); });
	  $j("#editpage-copywarn").click(function(){ $j.trackAction('copywarn'); });
	  
  }
  
};