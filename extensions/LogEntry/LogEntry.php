<?

# Check environment
if( !defined( 'MEDIAWIKI' ) ) {
    echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
    die( -1 );
}

# Shrtcut to this dirctory
$dir = dirname(__FILE__) . '/';

# Credits
$wgExtensionCredits['parserhook'][] = array(
   'name' => 'LogEntry',
   'author' =>'Trevor Parscal', 
   'url' => 'http://www.mediawiki.org/wiki/Extension:Trevor_Parscal', 
   'description' => 'This Tag Extension provides a form for apending to log pages'
);
$wgExtensionCredits['specialpage'][] = array(
   'name' => 'LogEntry',
   'author' =>'Trevor Parscal', 
   'url' => 'http://www.mediawiki.org/wiki/Extension:Trevor_Parscal', 
   'description' => 'This Tag Extension provides processing for apending to log pages'
);

# Internationalization
$wgExtensionMessagesFiles['LogEntry'] = $dir . 'LogEntry.i18n.php';

# Body
require_once $dir . 'LogEntry.body.php';
$wgAutoloadClasses['LogEntry'] = $dir . 'LogEntry.body.php';

# Let MediaWiki know about your new special page.
$wgSpecialPages['LogEntry'] = 'LogEntry';

/* Do we really need this?
 *
 *
# Add any aliases for the special page.
$wgHooks['LanguageGetSpecialPageAliases'][] = 'LogEntryLocalizedPageName';  
function LogEntryLocalizedPageName( &$specialPageArray, $code ) {
	# The localized title of the special page is among the messages of the extension:
	wfLoadExtensionMessages('LogEntry');
	
	# Convert from title in text form to DBKey and put it into the alias array:
	$title = Title::newFromText( wfMsg('logentry') );
	$specialPageArray['LogEntry'][] = $title->getDBKey();
	
	return true;
}
*/

?>