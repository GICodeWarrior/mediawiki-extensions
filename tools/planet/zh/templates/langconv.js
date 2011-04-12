function langconv(hans,hant){
var Browser_Agent=navigator.userAgent;
if(Browser_Agent.indexOf("MSIE")!=-1){
 var ie=navigator.browserLanguage.toLowerCase();
 if ('zh-hant|zh-hk|zh-mo|zh-tw'.indexOf(ie) != -1 && ie != 'zh' ) {
 document.write(hant);
 }else {
 document.write(hans);
 }
}else {
 var ie=navigator.language.toLowerCase();
 if ('zh-hant|zh-hk|zh-mo|zh-tw'.indexOf(ie) != -1 && ie != 'zh' ) {
 document.write(hant);
 }else {
 document.write(hans);
 }
} 
}

