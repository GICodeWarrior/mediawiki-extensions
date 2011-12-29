<?php
/**
 * Internationalisation file for extension TweetANew
 *
 * @addtogroup Extensions
 * @license GPL
 */
 
$messages = array();

/** English
 * @author Gregory Varnum
 */
$messages['en'] = array( 
	'tweetanew-desc' => 'Tweets when an page is created or edited.  Depending on preferences set for the entire wiki, either automatically or from the edit page.',
	'tweetanew-accesskey' => 'e',
	'tweetanew-newaction' => 'Tweet about this new page',
	'tweetanew-newtooltip' => 'Send information about this new page to Twitter',
	'tweetanew-editaction' => 'Tweet about this edit',
	'tweetanew-edittooltip' => 'Send information about this edit to Twitter',
	'tweetanew-minoredit' => 'm',
	'tweetanew-authorcredit' => 'by',
	'tweetanew-newdefault' => 'NEW PAGE: $1 - $2',
	'tweetanew-new1' => 'Looks like $1 was created at $2',
	'tweetanew-new2' => '$1 was recently created at $2',
	'tweetanew-new3' => 'Check out $2 - it has a new page on $1',
	'tweetanew-editdefault' => 'UPDATED PAGE: $1 - $2',
	'tweetanew-edit1' => 'Looks like $1 was updated at $2',
	'tweetanew-edit2' => '$1 was recently changed at $2',
	'tweetanew-edit3' => 'Check out $2 - it has some new content on $1',
);

/** Message documentation (Message documentation)
 * @author Gregory Varnum
 */
$messages['qqq'] = array(
	'tweetanew-desc' 			=> '{{desc}}',
	'tweetanew-accesskey'	 	=> 'Access key used for option to tweet from editpage, if otherwise enabled',
	'tweetanew-newaction'	 	=> 'Used in editpage as description for option to tweet, if auto-tweet is disabled for new page',
	'tweetanew-newtooltip'	 	=> 'Tooltip describing option to tweet about new page from edit page, if otherwise enabled',
	'tweetanew-editaction'		=> 'Used in editpage as description for option to tweet, if auto-tweet is disabled for edits',
	'tweetanew-edittooltip'	 	=> 'Tooltip describing option to tweet about edit from edit page, if otherwise enabled',
	'tweetanew-minoredit' 		=> 'Indicator used when edit is marked as minor, if minor edits are not already skipped - skip following indicator can be removed using MinorSpace setting',
	'tweetanew-authorcredit' 	=> 'Used to provide credit to author of edit or new page',
	'tweetanew-newdefault' 		=> 'Default tweet message used for new page, if random messages are disabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-new1' 			=> 'First random tweet message used for new pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-new2' 			=> 'Second random tweet message used for new pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-new3' 			=> 'Third random tweet message used for new pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-editdefault' 		=> 'Default tweet message used for edited pages, if random messages are disabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-edit1' 			=> 'First random tweet message used for edited pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-edit2' 			=> 'Second random tweet message used for edited pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-edit3' 			=> 'Third random tweet message used for edited pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
);
