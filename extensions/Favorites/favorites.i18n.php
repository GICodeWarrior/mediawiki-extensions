<?php
/**
 * Internationalisation for Favorites
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English (en)
 * @author Jeremy Lemley
 */
$messages['en'] = array(
'favorites-desc' => 'Creating a favorites list',

# Edit pages
'favoritethis'                        => 'Favorite this page',

# Preferences page
'prefs-favoritelist'               => 'Favorites',
'prefs-favoritelist-token'         => 'Favorites token:',
'prefs-advancedfavoritelist'       => 'Advanced options',

# Favoritelist
'favoritelist'            => 'My favorites',
'myfavoritelist'          => 'My favorites',
'favoritelistfor'         => "(for '''$1''')",
'nofavoritelist'          => 'You have no items in your favorites.',
'favoritelistanontext'    => 'Please $1 to view or edit items in your favorites.',
'favoritenologin'         => 'Not logged in',
'favoritenologintext'     => 'You must be [[Special:UserLogin|logged in]] to modify your favorites.',
'addedfavorite'           => 'Added to favorites',
'addedfavoritetext'       => 'The page "[[:$1]]" has been added to your [[Special:Favoritelist|favorites]].',
'removedfavorite'         => 'Removed from favorites',
'removedfavoritetext'     => 'The page "[[:$1]]" has been removed from [[Special:Favoritelist|your favorites]].',
'favorite'                => 'Favorite',
'favoritethispage'        => 'Favorite this page',
'unfavorite'              => 'Unfavorite',
'unfavoritethispage'      => 'Stop favoriteing',
'favoritelist-options'    => 'Favorites options',

# Displayed when you click the "favorite" button and it is in the process of favoriteing
'favoriteing'   => 'Favoriteing...',
'unfavoriteing' => 'Unfavoriteing...',

# Keyboard access keys for power users
'accesskey-pt-favoritelist'            => 'l', # do not translate or duplicate this message to other languages
'accesskey-ca-favorite'                => 'w', # do not translate or duplicate this message to other languages
'accesskey-ca-unfavorite'              => 'w', # do not translate or duplicate this message to other languages
'accesskey-favorite'                   => 'w', # do not translate or duplicate this message to other languages

# Tooltip help for the actions
'tooltip-pt-favoritelist'            => 'The list of pages you are monitoring for changes',
'tooltip-ca-favorite'                => 'Add this page to your favorites',
'tooltip-ca-unfavorite'              => 'Remove this page from your favorites',
'tooltip-favorite'                   => 'Add this page to your favorites',

# 'all' in various places, this might be different for inflected languages
'favoritelistall2'    => 'all',

# Favoritelist editor
'favoritelistedit-numitems'       => 'Your favorites contain {{PLURAL:$1|1 title|$1 titles}}, excluding talk pages.',
'favoritelistedit-noitems'        => 'Your favorites contain no titles.',
'favoritelistedit-normal-title'   => 'Edit favorites',
'favoritelistedit-normal-legend'  => 'Remove titles from favorites',
'favoritelistedit-normal-explain' => 'Titles in your favorites are shown below.
To remove a title, check the box next to it, and click "{{int:Favoritelistedit-normal-submit}}".
You can also [[Special:Favoritelist/raw|edit the raw list]].',
'favoritelistedit-normal-submit'  => 'Remove titles',
'favoritelistedit-normal-done'    => '{{PLURAL:$1|1 title was|$1 titles were}} removed from your favorites:',
'favoritelistedit-raw-title'      => 'Edit raw favorites list',
'favoritelistedit-raw-legend'     => 'Edit raw favorites list',
'favoritelistedit-raw-explain'    => 'Titles in your favorites are shown below, and can be edited by adding to and removing from the list;
one title per line.
When finished, click "{{int:Favoritelistedit-raw-submit}}".
You can also [[Special:Favoritelist/edit|use the standard editor]].',
'favoritelistedit-raw-titles'     => 'Titles:',
'favoritelistedit-raw-submit'     => 'Update favorites',
'favoritelistedit-raw-done'       => 'Your favorites have been updated.',
'favoritelistedit-raw-added'      => '{{PLURAL:$1|1 title was|$1 titles were}} added:',
'favoritelistedit-raw-removed'    => '{{PLURAL:$1|1 title was|$1 titles were}} removed:',

# Favoritelist editing tools
'favoritelisttools-view' => 'View Favorites',
'favoritelisttools-edit' => 'View and edit favorites',
'favoritelisttools-raw'  => 'Edit raw favorites',

);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'favorites-desc' => 'Ermöglicht das Erstellen von Favoritenlisten',
	'favoritethis' => 'Diese Seite auf die Favoritenliste setzen',
	'prefs-favoritelist' => 'Favoriten',
	'prefs-favoritelist-token' => 'Favoriten-Token:',
	'prefs-advancedfavoritelist' => 'Erweiterte Optionen',
	'favoritelist' => 'Meine Favoriten',
	'myfavoritelist' => 'Meine Favoriten',
	'favoritelistfor' => "(für '''$1''')",
	'nofavoritelist' => 'Es befinden sich keine Einträge in deiner Favoritenliste.',
	'favoritelistanontext' => 'Du musst dich $1, um deine Favoritenliste sehen oder Einträge auf ihr bearbeiten zu können.',
	'favoritenologin' => 'Nicht angemeldet',
	'favoritenologintext' => 'Du musst [[Special:UserLogin|angemeldet]] sein, um deine Favoritenliste bearbeiten zu können.',
	'addedfavorite' => 'Zur Favoritenliste hinzugefügt',
	'addedfavoritetext' => 'Die Seite „[[:$1]]“ wurde zu deiner [[Special:Favoritelist|Favoritenliste]] hinzugefügt.',
	'removedfavorite' => 'Von der Favoritenliste entfernt',
	'removedfavoritetext' => 'Die Seite „[[:$1]]“ wurde von deiner [[Special:Favoritelist|Favoritenliste]] entfernt.',
	'favorite' => 'Zur Favoritenliste hinzufügen',
	'favoritethispage' => 'Diese Seite zur Favoritenliste hinzufügen',
	'unfavorite' => 'Von der Favoritenliste entfernen',
	'unfavoritethispage' => 'Diese Seite von der Favoritenliste entfernen',
	'favoritelist-options' => 'Optionen zu Favoriten',
	'favoriteing' => 'Speichere …',
	'unfavoriteing' => 'Entferne …',
	'tooltip-pt-favoritelist' => 'Die Liste der Seiten, die sich auf deiner Favoritenliste befinden',
	'tooltip-ca-favorite' => 'Füge diese Seite zu deiner Favoritenliste hinzu',
	'tooltip-ca-unfavorite' => 'Entferne diese Seite von deiner Favoritenliste',
	'tooltip-favorite' => 'Füge diese Seite zu deiner Favoritenliste hinzu',
	'favoritelistall2' => 'alle',
	'favoritelistedit-numitems' => 'Deine Favoritenliste enthält {{PLURAL:$1|einen Eintrag |$1 Einträge}}. Die Diskussionsseiten wurden dabei nicht mitgezählt.',
	'favoritelistedit-noitems' => 'Deine Favoritenliste enthält keine Einträge.',
	'favoritelistedit-normal-title' => 'Favoritenliste bearbeiten',
	'favoritelistedit-normal-legend' => 'Einträge aus der Favoritenliste entfernen',
	'favoritelistedit-normal-explain' => 'Dies sind die Einträge deiner Favoritenliste.
Um Einträge zu entfernen, markiere die Kästchen neben den Einträgen und klicke am Ende der Seite auf „{{int:Favoritelistedit-normal-submit}}“.
Du kannst deine Beobachtungsliste auch im [[Special:Favoritelist/raw|Listenformat bearbeiten]].',
	'favoritelistedit-normal-submit' => 'Einträge entfernen',
	'favoritelistedit-normal-done' => '{{PLURAL:$1|Ein Eintrag wurde|$1 Einträge wurden}} von deiner Favoritenliste entfernt:',
	'favoritelistedit-raw-title' => 'im Listenformat bearbeiten',
	'favoritelistedit-raw-legend' => 'Favoritenliste im Listenformat bearbeiten',
	'favoritelistedit-raw-explain' => 'Dies sind die Einträge deiner Favoritenliste im Listenformat. Die Einträge können zeilenweise gelöscht oder hinzugefügt werden.
Pro Zeile ist ein Eintrag erlaubt.
Sobald du fertig bist, klicke auf „{{int:Favoritelistedit-raw-submit}}“.
Du kannst auch die [[Special:Favoritelist/edit|Standardseite]] zum Bearbeiten benutzen.',
	'favoritelistedit-raw-titles' => 'Einträge:',
	'favoritelistedit-raw-submit' => 'Favoritenliste aktualisieren',
	'favoritelistedit-raw-done' => 'Deine Favoritenliste wurde aktualisiert.',
	'favoritelistedit-raw-added' => '{{PLURAL:$1|Ein Eintrag wurde|$1 Einträge wurden}} hinzugefügt:',
	'favoritelistedit-raw-removed' => '{{PLURAL:$1|Ein Eintrag wurde|$1 Einträge wurden}} entfernt:',
	'favoritelisttools-view' => 'Favoritenliste ansehen',
	'favoritelisttools-edit' => 'Favoritenliste ansehen und bearbeiten',
	'favoritelisttools-raw' => 'Favoritenliste im Listenformat bearbeiten',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'nofavoritelist' => 'Es befinden sich keine Einträge in Ihrer Favoritenliste.',
	'favoritelistanontext' => 'Sie müssen sich $1, um Ihre Favoritenliste sehen oder Einträge auf ihr bearbeiten zu können.',
	'favoritenologintext' => 'Sie müssen [[Special:UserLogin|angemeldet]] sein, um Ihre Favoritenliste bearbeiten zu können.',
	'addedfavoritetext' => 'Die Seite „[[:$1]]“ wurde zu Ihrer [[Special:Favoritelist|Favoritenliste]] hinzugefügt.',
	'removedfavoritetext' => 'Die Seite „[[:$1]]“ wurde von Ihrer [[Special:Favoritelist|Favoritenliste]] entfernt.',
	'tooltip-pt-favoritelist' => 'Die Liste der Seiten, die sich auf Ihrer Favoritenliste befinden',
	'tooltip-ca-favorite' => 'Fügen Sie diese Seite zu Ihrer Favoritenliste hinzu',
	'tooltip-ca-unfavorite' => 'Entfernen Sie diese Seite von Ihrer Favoritenliste',
	'tooltip-favorite' => 'Fügen Sie diese Seite zu Ihrer Favoritenliste hinzu',
	'favoritelistedit-numitems' => 'Ihre Favoritenliste enthält {{PLURAL:$1|einen Eintrag|$1 Einträge}}. Die Diskussionsseiten wurden dabei nicht mitgezählt.',
	'favoritelistedit-noitems' => 'Ihre Favoritenliste enthält keine Einträge.',
	'favoritelistedit-normal-explain' => 'Dies sind die Einträge Ihrer Favoritenliste.
Um Einträge zu entfernen, markieren Sie die Kästchen neben den Einträgen und klicken Sie am Ende der Seite auf „{{int:Favoritelistedit-normal-submit}}“.
Sie können Ihre Favoritenliste auch im [[Special:Favoritelist/raw|Listenformat bearbeiten]].',
	'favoritelistedit-normal-done' => '{{PLURAL:$1|Ein Eintrag wurde|$1 Einträge wurden}} von Ihrer Favoritenliste entfernt:',
	'favoritelistedit-raw-explain' => 'Dies sind die Einträge Ihrer Favoritenliste im Listenformat. Die Einträge können zeilenweise gelöscht oder hinzugefügt werden.
Pro Zeile ist ein Eintrag erlaubt.
Sobald Sie fertig sind, klicken Sie auf „{{int:Favoritelistedit-raw-submit}}“.
Sie können auch die [[Special:Favoritelist/edit|Standardseite]] zum Bearbeiten benutzen.',
	'favoritelistedit-raw-done' => 'Ihre Favoritenliste wurde aktualisiert.',
);

