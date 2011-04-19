
//checks
if(typeof(MW) == "undefined"){ MW={};}
if(!MW.activeCampaigns){ MW.activeCampaigns ={}; }

//define new active campaign
MW.activeCampaigns.AccountCreation =

{ 
  //Treatment name
  "name": "AccountCreation",
  
  //Treatment version. Increment this when altering rates
  "version": 1,
  
  // Rates are calculated out of the total sum, so
  // rates of x:10000, y:3, and z:1 mean users have a
  // chance of being in bucket x at 10000/10004,
  // y at 3/10004 and z at 1/10004
  // The algorithm is faster if these are ordered in descending order,
  // particularly if there are orders of magnitude differences in the
  // bucket sizes
  // "none" is reserved for control
  "rates": {"NiceMsg1": 1, "NiceMsg2": 1 },
  
  // individual changes, function names corresponding
  // to what is in "rates" object
  // (note: "none" function not needed or used)
  
  "NiceMsg1": function(){
	  //change to NiceMsg1 campaign
	  $j("#pt-anonlogin a").attr("href", $j("#pt-anonlogin a").attr("href") + "&campaign=NiceMsg1" );
  },
  "NiceMsg2": function(){
	  //change to NiceMsg2 campaign
	  $j("#pt-anonlogin a").attr("href", $j("#pt-anonlogin a").attr("href") + "&campaign=NiceMsg2" );
  },
  
  // "allActive" is reserved.
  // If this function exists, it will be apply to every user not in the "none" bucket
  "allActive": function(){
	  
	  //add click tracking to save
	  $j("#wpSave").click(function(){ $j.trackAction('save'); });
	  
	  //track login attempt
	  $j("#wpLoginAttempt").click(function(){ $j.trackAction('login-attempt'); });
	  
	  //track account creation
	  $j("#wpCreateaccount").click(function(){ $j.trackAction('account-created'); });
	  
	  //add click tracking to preview
	  $j("#wpPreview").click(function(){ $j.trackAction('preview'); });
	  
  }
  
};