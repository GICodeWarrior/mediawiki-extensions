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
* 
* Available Classes:
* 1) Chinese Language Selection Window     - Describes chinese language selection window for the application, which enables the user to select chinese language translation type for translation.
* 
*/

//make sure the namespace exists.
if (typeof (wikiBhasha.windowManagement) === "undefined") {
    wikiBhasha.windowManagement = {};
}

(function() {
    wikiBhasha.windowManagement.shareOnExternSystemWindow =  {

    windowId : "wbshareOnExternSystemWindow",

    listShareSystems:['wbFacebook',
                      'wbTwitter'],
    
    show : function() {
        var $shareOnExternSystemElement = $("#" + this.windowId), 
            title = wbGlobalSettings.targetLanguageArticleTitle, 
            lang = wbGlobalSettings.$targetLanguageName;
        wbUIHelper.blockUI();
        wbUIHelper.createWindow(this.windowId, wbGlobalSettings.shareOnExternSystemHTML);
        wbUIHelper.makeDraggable(this.windowId, "wbSWESDraggableHandle");
        $('#wbExitContent').text(wbLocal.exitMessage);
       
        $("#wbSWESExitButton").click(function() {
            wbShareOnExternSystem.hide();
            wbMainWindow.hide();
        });

        for (var i = 0; i < wbShareOnExternSystem.listShareSystems.length; i++) {
            $(window[wbShareOnExternSystem.listShareSystems[i]].showItemElement()).appendTo($('#wbShareIconsSection'));
            window[wbShareOnExternSystem.listShareSystems[i]].initialize(title, lang);
        }
        $shareOnExternSystemElement.maxZIndex({ inc: 5 });
    },
    //removes the window from memory
    hide : function(){
        wbUIHelper.unblockUI();
        wbUIHelper.removeWindow(wbShareOnExternSystem.windowId);
    }
}

wbShareOnExternSystem = wikiBhasha.windowManagement.shareOnExternSystemWindow;

})();