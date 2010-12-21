/*
*
*   Copyright (c) Microsoft. All rights reserved.
*
*	This code is licensed under the Apache License, Version 2.0.
*   THIS CODE IS PROVIDED *AS IS* WITHOUT WARRANTY OF
*   ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING ANY
*   IMPLIED WARRANTIES OF FITNESS FOR A PARTICULAR
*   PURPOSE, MERCHANTABILITY, OR NON-INFRINGEMENT.
*
*   The apache license details from 
*   ‘http://www.apache.org/licenses/’ are reproduced 
*   in ‘Apache2_license.txt’ 
*
*/

/* 
Available Classes:
1) wikipediaLoggerInterface   - Includes functions to log sessions, feature usage information and feedback data.
*/

//make sure the namespace exists.
if (typeof (wikiBhasha.extern) === "undefined") {
    wikiBhasha.extern = {};
}

(function() {

    wikiBhasha.extern.shareSystem = {
        // base url to the share system
        systemUrl: null,
        // anchor element id
        elementId : "",
        // icon image path
        // the dimenstion of the icon should be 16X16 px
        icon : "",
        // name of the share system to be showen for the element tooltip
        shareSystemMessage : "",
        // initilize the share system object events and logic
        initialize : function(){},
        // extend this to modify the look and feel of the share system area
        showItemElement: function(){},
        // the api url formation logic
        shareSystemLogic : function(){},
        // how the share system api invoked
        executeShareSystemAPI : function(){}
    };
    
    wikiBhasha.extern.shareOnFacebook = {
        // facebook base url
        systemUrl : "http://www.facebook.com/share.php?t=",
        elementId : "icnFacebook",
        icon : "images/facebook_16.png",
        shareSystemMessage : "Facebook",
        initialize: function(title, lang){
            wbFacebook.shareSystemLogic(title, lang);
            $('#'+wbFacebook.elementId).click(function(){
                wbFacebook.executeShareSystemAPI();
            });
            $('#'+wbFacebook.elementId).attr('title', wbLocal.shareToolTip + " " + wbFacebook.shareSystemMessage);
        },
        showItemElement: function(){
            var icnUrl = (wbGlobalSettings.imgBaseUrl ? wbGlobalSettings.imgBaseUrl : baseUrl) +wbFacebook.icon;
            return wbUtil.stringFormat("<div class='shareIcons'><a href='#' id='{0}'><img src='{1}'></a></div>", wbFacebook.elementId, icnUrl);
        },
        shareSystemLogic : function(title, lang){
            // form the facebook api call url
            // Note: title is passed to the function in case if anyone want to use in the share system message field
			wbFacebook.systemUrl +=wbUtil.stringFormat(wbLocal.shareMessage, lang);
			wbFacebook.systemUrl +="&u=http://www.wikibhasha.org/";
			return wbFacebook.systemUrl;
        },
        executeShareSystemAPI : function(){
            window.open(wbFacebook.systemUrl, wbFacebook.elementId);
        }
    };
    wbFacebook = wikiBhasha.extern.shareOnFacebook;

    wikiBhasha.extern.shareOnTwitter = {
        systemUrl :"http://www.twitter.com/home?status=",
        elementId : "icnTwitter",
        icon : "images/twitter_16.png",
        shareSystemMessage : "Twitter",
        initialize: function(title, lang){
            wbTwitter.shareSystemLogic(title, lang);
            $('#'+wbTwitter.elementId).click (function(){
                wbTwitter.executeShareSystemAPI();
            });
            $('#'+wbTwitter.elementId).attr('title', wbLocal.shareToolTip + " " + wbTwitter.shareSystemMessage);
        },
        showItemElement: function(){
            var icnUrl = (wbGlobalSettings.imgBaseUrl ? wbGlobalSettings.imgBaseUrl : baseUrl) + wbTwitter.icon;
            return wbUtil.stringFormat("<div class='shareIcons'><a href='#' id='{0}'><img src='{1}'></a></div>", wbTwitter.elementId, icnUrl);
        },
        shareSystemLogic : function(title, lang){
            // form the twitter api call url
            // Note: title is passed to the function in case if anyone want to use in the share system message field
			var tweet = wbUtil.stringFormat(wbLocal.shareMessage, lang);
            wbTwitter.systemUrl +=tweet.toString().replace(/ /gi,'+');
            return wbTwitter.systemUrl;
        },
        executeShareSystemAPI : function(){
            window.open(wbTwitter.systemUrl, wbTwitter.elementId);
        }
    };
    wbTwitter = wikiBhasha.extern.shareOnTwitter;
})();
