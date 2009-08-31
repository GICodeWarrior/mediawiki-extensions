<?php
/**
 * Internationalisation file for extension FlaggedRevs (group FlaggedRevs).
 *
 * @comment NOTE: SOME LINKS HAVE '[' and ']' around them. These are NOT typos.
 * @comment PLEASE DO NOT RANDOMLY REMOVE THEM FOR THE THIRD TIME, kthx. -aaron
 * @addtogroup Extensions
 */

$messages = array();

/** English (en)
 * @author Purodha
 * @author Raimond Spekking
 * @author Siebrand
 */

$messages['en'] = array(
	'editor'                       => 'Editor',
	'flaggedrevs'                  => 'Flagged Revisions',
	'flaggedrevs-backlog'          => 'There is currently a backlog of [[Special:OldReviewedPages|pending edits]] to reviewed pages. \'\'\'Your attention is needed!\'\'\'',
	'flaggedrevs-watched-pending'  => 'There are currently [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} pending edits] to reviewed pages on your watchlist. \'\'\'Your attention is needed!\'\'\'',
	'flaggedrevs-desc'             => 'Gives editors and reviewers the ability to validate revisions and stabilize pages',
	'flaggedrevs-pref-UI'          => 'Stable version interface:',
	'flaggedrevs-pref-UI-0'        => 'Use detailed stable version user interface',
	'flaggedrevs-pref-UI-1'        => 'Use simple stable version user interface',
	'prefs-flaggedrevs'            => 'Stability',
	'flaggedrevs-prefs-stable'     => 'Always show the stable version of content pages by default (if there is one)',
	'flaggedrevs-prefs-watch'      => 'Add pages I review to my watchlist',
	'flaggedrevs-prefs-editdiffs'  => 'Show diff to stable when editing pages',
	'group-editor'                 => 'Editors',
	'group-editor-member'          => 'editor',
	'group-reviewer'               => 'Reviewers',
	'group-reviewer-member'        => 'reviewer',
	'grouppage-editor'             => '{{ns:project}}:Editor',
	'grouppage-reviewer'           => '{{ns:project}}:Reviewer',
	'group-autoreview'             => 'Autoreviewers',
	'group-autoreview-member'      => 'autoreviewer',
	'grouppage-autoreview'         => '{{ns:project}}:Autoreviewer',
	'hist-draft'                   => 'draft revision',
	'hist-quality'                 => 'quality revision',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validated] by [[User:$3|$3]]',
	'hist-stable'                  => 'sighted revision',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} sighted] by [[User:$3|$3]]',
	'hist-autoreviewed'            => '[{{fullurl:$1|stableid=$2}} automatically sighted]',
	'review-diff2stable'           => 'View changes between stable and current revisions',
	'review-logentry-app'          => 'reviewed r$2 of [[$1]]',
	'review-logentry-dis'          => 'deprecated r$2 of [[$1]]',
	'review-logentry-id'           => 'view',
	'review-logentry-diff'         => 'diff to stable',
	'review-logpage'               => 'Review log',
	'review-logpagetext'           => 'This is a log of changes to revisions\' [[{{MediaWiki:Validationpage}}|approval]] status for content pages.
	See the [[Special:ReviewedPages|reviewed pages list]] for a list of approved pages.',
	'reviewer'                     => 'Reviewer',
	'revisionreview'               => 'Review revisions',
	'revreview-accuracy'           => 'Accuracy',
	'revreview-accuracy-0'         => 'Unapproved',
	'revreview-accuracy-1'         => 'Sighted',
	'revreview-accuracy-2'         => 'Accurate',
	'revreview-accuracy-3'         => 'Well sourced',
	'revreview-accuracy-4'         => 'Featured',
	'revreview-approved'           => 'Approved',
	'revreview-auto'               => '(automatic)',
	'revreview-auto-w'             => 'You are editing the stable revision; changes will \'\'\'automatically be reviewed\'\'\'.',
	'revreview-auto-w-old'         => 'You are editing a reviewed revision; changes will \'\'\'automatically be reviewed\'\'\'.',
	'revreview-basic'              => 'This is the latest [[{{MediaWiki:Validationpage}}|sighted]] revision, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|changes}}] awaiting review.',
	'revreview-basic-i'            => 'This is the latest [[{{MediaWiki:Validationpage}}|sighted]] revision, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/file changes] awaiting review.',
	'revreview-basic-old'          => 'This is a [[{{MediaWiki:Validationpage}}|sighted]] revision ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
	New [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changes] may have been made.',
	'revreview-basic-same'         => 'This is the latest [[{{MediaWiki:Validationpage}}|sighted]] revision ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.',
	'revreview-basic-source'       => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} sighted version] of this page, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>, was based off this revision.',
	'revreview-blocked'            => 'You cannot review this revision because your account is currently blocked ([$1 details])',
	'revreview-changed'            => '\'\'\'The requested action could not be performed on this revision of [[:$1|$1]].\'\'\'

A template or file may have been requested when no specific version was specified.
This can happen if a dynamic template transcludes another file or template depending on a variable that changed since you started reviewing this page.
Refreshing the page and rereviewing can solve this problem.',
	'revreview-current'            => 'Draft',
	'revreview-depth'              => 'Depth',
	'revreview-depth-0'            => 'Unapproved',
	'revreview-depth-1'            => 'Basic',
	'revreview-depth-2'            => 'Moderate',
	'revreview-depth-3'            => 'High',
	'revreview-depth-4'            => 'Featured',
	'revreview-draft-title'        => 'Draft page',
	'revreview-edit'               => 'Edit draft',
	'revreview-editnotice'         => '\'\'\'Edits to this page will be incorporated into the [[{{MediaWiki:Validationpage}}|stable version]] once an authorised user reviews them.\'\'\'',
	'revreview-flag'               => 'Review this revision',
	'revreview-edited'             => '\'\'\'Edits will be incorporated into the [[{{MediaWiki:Validationpage}}|stable version]] once an authorised user reviews them.\'\'\'
\'\'\'The \'\'draft\'\' is shown below.\'\'\' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|change awaits|changes await}}] review.',
	'revreview-flag'               => 'Review this revision',
	'revreview-invalid'            => '\'\'\'Invalid target:\'\'\' no [[{{MediaWiki:Validationpage}}|reviewed]] revision corresponds to the given ID.',
	'revreview-legend'             => 'Rate revision content',
	'revreview-log'                => 'Comment:',
	'revreview-main'               => 'You must select a particular revision of a content page in order to review.

See the [[Special:Unreviewedpages|list of unreviewed pages]].',
	'revreview-newest-basic'       => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest sighted revision] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|changes}}] {{PLURAL:$3|needs|need}} review.',
	'revreview-newest-basic-i'     => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest sighted revision] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/file changes] need review.',
	'revreview-newest-quality'     => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest quality revision] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|changes}}] {{PLURAL:$3|needs|need}} review.',
	'revreview-newest-quality-i'   => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest quality revision] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/file changes] need review.',
	'revreview-noflagged'          => 'There are no reviewed revisions of this page, so it may \'\'\'not\'\'\' have been [[{{MediaWiki:Validationpage}}|checked]] for quality.',
	'revreview-note'               => '[[User:$1|$1]] made the following notes [[{{MediaWiki:Validationpage}}|reviewing]] this revision:',
	'revreview-notes'              => 'Observations or notes to display:',
	'revreview-oldrating'          => 'It was rated:',
	'revreview-patrol'             => 'Mark this change as patrolled',
	'revreview-patrol-title'       => 'Mark as patrolled',
	'revreview-patrolled'          => 'The selected revision of [[:$1|$1]] has been marked as patrolled.',
	'revreview-quality'            => 'This is the latest [[{{MediaWiki:Validationpage}}|quality]] revision, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|changes}}] awaiting review.',
	'revreview-quality-i'          => 'This is the latest [[{{MediaWiki:Validationpage}}|quality]] revision, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/file changes] awaiting review.',
	'revreview-quality-old'        => 'This is a [[{{MediaWiki:Validationpage}}|quality]]  revision ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
	New [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changes] may have been made.',
	'revreview-quality-same'       => 'This is the latest [[{{MediaWiki:Validationpage}}|quality]] revision ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.',
	'revreview-quality-source'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} quality version] of this page, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>, was based off this revision.',
	'revreview-quality-title'      => 'Quality page',
	'revreview-quick-basic'        => '\'\'\'[[{{MediaWiki:Validationpage}}|Sighted page]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} view draft]]',
	'revreview-quick-basic-old'    => '\'\'\'[[{{MediaWiki:Validationpage}}|Sighted page]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} view draft]]',
	'revreview-quick-basic-same'   => '\'\'\'[[{{MediaWiki:Validationpage}}|Sighted page]]\'\'\'',
	'revreview-quick-invalid'      => '\'\'\'Invalid revision ID\'\'\'',
	'revreview-quick-none'         => '\'\'\'[[{{MediaWiki:Validationpage}}|Current revision]]\'\'\' (unreviewed)',
	'revreview-quick-quality'      => '\'\'\'[[{{MediaWiki:Validationpage}}|Quality page]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} view draft]]',
	'revreview-quick-quality-old'  => '\'\'\'[[{{MediaWiki:Validationpage}}|Quality page]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} view draft]]',
	'revreview-quick-quality-same' => '\'\'\'[[{{MediaWiki:Validationpage}}|Quality page]]\'\'\'',
	'revreview-quick-see-basic'    => '\'\'\'[[{{MediaWiki:Validationpage}}|Draft]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} view page]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} compare])',
	'revreview-quick-see-quality'  => '\'\'\'[[{{MediaWiki:Validationpage}}|Draft]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} view page]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} compare])',
	'revreview-selected'           => 'Selected revision of \'\'\'$1:\'\'\'',
	'revreview-source'             => 'draft source',
	'revreview-stable'             => 'Stable page',
	'revreview-stable-title'       => 'Sighted page',
	'revreview-stable1'            => 'You may want to view [{{fullurl:$1|stableid=$2}} this flagged version] and see if it is now the [{{fullurl:$1|stable=1}} stable version] of this page.',
	'revreview-stable2'            => 'You may want to view the [{{fullurl:$1|stable=1}} stable version] of this page (if there still is one).',
	'revreview-style'              => 'Readability',
	'revreview-style-0'            => 'Unapproved',
	'revreview-style-1'            => 'Acceptable',
	'revreview-style-2'            => 'Good',
	'revreview-style-3'            => 'Concise',
	'revreview-style-4'            => 'Featured',
	'revreview-submit'             => 'Submit',
	'revreview-submitting'         => 'Submitting...',
	'revreview-finished'           => 'Review complete!',
	'revreview-failed'             => 'Review failed!',
	'revreview-successful'         => '\'\'\'Revision of [[:$1|$1]] successfully flagged. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} view stable versions])\'\'\'',
	'revreview-successful2'        => '\'\'\'Revision of [[:$1|$1]] successfully unflagged.\'\'\'',
	'revreview-text'               => '\'\'[[{{MediaWiki:Validationpage}}|Stable versions]] are the default page content for viewers rather than the newest revision.\'\'',
	'revreview-text2'              => '\'\'[[{{MediaWiki:Validationpage}}|Stable versions]] are checked revisions of pages and can be set as the default content for viewers.\'\'',
	'revreview-toggle'             => '(+/-)',
	'revreview-toggle-title'       => 'show/hide details',
	'revreview-toolow'             => 'You must at least rate each of the below attributes higher than "unapproved" in order for a revision to be considered reviewed.
To depreciate a revision, set all fields to "unapproved".',
	'revreview-update'             => 'Please [[{{MediaWiki:Validationpage}}|review]] any changes \'\'(shown below)\'\' made since the stable revision was [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved].<br />
\'\'\'Some templates/files were updated:\'\'\'',
	'revreview-update-includes'    => '\'\'\'Some templates/files were updated:\'\'\'',
	'revreview-update-none'        => 'Please [[{{MediaWiki:Validationpage}}|review]] any changes \'\'(shown below)\'\' made since the stable revision was [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved].',
	'revreview-update-use'         => '\'\'\'NOTE:\'\'\' If any of these templates/files have a stable version, then it is already used in the stable version of this page.',
	'revreview-diffonly'           => '\'\'To review the page, click the "current revision" revision link and use the review form.\'\'',
	'revreview-visibility'         => '\'\'\'This page has an updated [[{{MediaWiki:Validationpage}}|stable version]]; page stability settings can be [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configured].\'\'\'',
	'revreview-visibility2'        => '\'\'\'This page has an outdated [[{{MediaWiki:Validationpage}}|stable version]]; page stability settings can be [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configured].\'\'\'',
	'revreview-visibility3'        => '\'\'\'This page does not have a [[{{MediaWiki:Validationpage}}|stable version]]; page stability settings can be [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configured].\'\'\'',
	'revreview-revnotfound'        => 'The old revision of the page you asked for could not be found.
Please check the URL you used to access this page.',
	#'right-autopatrol'             => 'Automatically mark revisions in non-main namespaces patrolled',
	'right-autoreview'             => 'Automatically mark revisions as sighted',
	'right-movestable'             => 'Move stable pages',
	'right-review'                 => 'Mark revisions as sighted',
	'right-stablesettings'         => 'Configure how the stable version is selected and displayed',
	'right-validate'               => 'Mark revisions as validated',
	'rights-editor-autosum'        => 'autopromoted',
	'rights-editor-revoke'         => 'removed editor status from [[$1]]',
	'specialpages-group-quality'   => 'Quality assurance',
	'stable-logentry'              => 'configured stable versioning for [[$1]]',
	'stable-logentry2'             => 'reset stable versioning for [[$1]]',
	'stable-logpage'               => 'Stability log',
	'stable-logpagetext'           => 'This is a log of changes to the [[{{MediaWiki:Validationpage}}|stable version]] configuration of content pages.
	A list of stabilized pages can be found at the [[Special:StablePages|stable page list]].',
	
	'revreview-filter-all'         => 'all',
	'revreview-filter-stable'      => 'stable',
	'revreview-filter-approved'    => 'Approved',
	'revreview-filter-reapproved'  => 'Re-approved',
	'revreview-filter-unapproved'  => 'Unapproved',
	'revreview-filter-auto'        => 'Automatic',
	'revreview-filter-manual'      => 'Manual',
	'revreview-statusfilter'       => 'Status change:',
	'revreview-typefilter'         => 'Type:',
	'revreview-levelfilter'        => 'Level:',

	'revreview-lev-sighted'        => 'sighted',
	'revreview-lev-quality'        => 'quality',
	'revreview-lev-pristine'       => 'pristine',
	
	'revreview-reviewlink'         => 'review',
	
	'tooltip-ca-current'           => 'View the current draft of this page',
	'tooltip-ca-stable'            => 'View the stable version of this page',
	'tooltip-ca-default'           => 'Quality assurance settings',
	
	'revreview-locked-title'       => 'Edits must be reviewed before being displayed on this page.',
	'revreview-unlocked-title'     => 'Edits do not require review before being displayed on this page.',
	'revreview-locked'             => 'Edits must be [[{{MediaWiki:Validationpage}}|reviewed]] before being displayed on this page.',
	'revreview-unlocked'           => 'Edits do not require [[{{MediaWiki:Validationpage}}|review]] before being displayed on this page.',
	
	'revreview-ak-review'          => 's', # do not translate or duplicate this message to other languages
	'accesskey-ca-current'         => 'v', # do not translate or duplicate this message to other languages
	'accesskey-ca-stable'          => 'c', # do not translate or duplicate this message to other languages
	
	'log-show-hide-review'         => '$1 review log',
	
	'revreview-tt-review'          => 'Review this page',
	'validationpage'               => '{{ns:help}}:Page validation',
);

/** Message documentation (Message documentation)
 * @author Bennylin
 * @author Dani
 * @author Darth Kule
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author Huji
 * @author Jon Harald Søby
 * @author Meno25
 * @author Purodha
 * @author Raymond
 * @author Rex
 * @author SPQRobin
 * @author Siebrand
 * @author Tgr
 */
$messages['qqq'] = array(
	'editor' => '{{Flagged Revs}}
{{Identical|Editor}}',
	'flaggedrevs' => '{{Flagged Revs}}
General title for the [[Translating:Flagged Revs extension|Flagged Revs]] extension.
* "flagged" in the sense of "has been seen, has been checked"',
	'flaggedrevs-backlog' => '{{Flagged Revs}}',
	'flaggedrevs-watched-pending' => 'Appears on top of watchlist and recent changes.',
	'flaggedrevs-desc' => '{{Flagged Revs}}

Shown in [[Special:Version]] as a short description of this extension. Do not translate links.',
	'flaggedrevs-pref-UI' => '{{Flagged Revs-small}}

Shown in [[Special:Preferences]], under {{msg-mw|prefs-flaggedrevs}}, as a label for the alternative choices {{msg|flaggedrevs-pref-UI-0|pl=yes}}, and {{msg|flaggedrevs-pref-UI-1|pl=yes}}. See [[:Image:FlaggedRevs.jpg]] for an example image.',
	'flaggedrevs-pref-UI-0' => '{{Flagged Revs-small}}

Option in [[Special:Preferences]], under {{msg-mw|prefs-flaggedrevs}}. See {{msg|flaggedrevs-pref-UI-1|pl=yes}} for the opposite message. See [[:Image:FlaggedRevs.jpg]] for an example image.',
	'flaggedrevs-pref-UI-1' => '{{Flagged Revs-small}}

Option in [[Special:Preferences]], under {{msg-mw|prefs-flaggedrevs}}. See {{msg|flaggedrevs-pref-UI-0|pl=yes}} for the opposite message. See [[:Image:FlaggedRevs.jpg]] for an example image.',
	'prefs-flaggedrevs' => "{{Flagged Revs-small}}

This appears in [[Special:Preferences]]:
* as an additional ''tab'', when JavaScript is enabled, or
* as an additional ''section header'', when JavaScript is disabled",
	'flaggedrevs-prefs-stable' => '{{Flagged Revs}}
{{Identical|Content page}}',
	'flaggedrevs-prefs-watch' => '{{Flagged Revs}}',
	'group-editor' => '{{Flagged Revs}}',
	'group-editor-member' => '{{Flagged Revs}}
{{Identical|Editor}}',
	'group-reviewer' => '{{Flagged Revs}}',
	'group-reviewer-member' => '{{Flagged Revs}}
{{Identical|Reviewer}}',
	'grouppage-editor' => '{{Flagged Revs}}',
	'grouppage-reviewer' => '{{Flagged Revs}}',
	'hist-draft' => '{{Flagged Revs}}',
	'hist-quality' => '{{Flagged Revs-small}}
The accuracy "quality", as displayed on the page history after a revision with this setting.',
	'hist-quality-user' => '{{Flagged Revs}}',
	'hist-stable' => '{{Flagged Revs-small}}
The accuracy "sighted", as displayed on the page history after a revision with this setting.',
	'hist-stable-user' => '{{Flagged Revs}}',
	'review-diff2stable' => '{{Flagged Revs}}',
	'review-logentry-app' => '{{Flagged Revs}}
* $1 is a page title
* $2 is a version of page',
	'review-logentry-dis' => '{{Flagged Revs}}
* $1 is a page title
* $2 is a version of page',
	'review-logentry-id' => '{{Flagged Revs}}
{{Identical|View}}',
	'review-logentry-diff' => '{{Flagged Revs}}',
	'review-logpage' => '{{Flagged Revs}}',
	'review-logpagetext' => '{{Flagged Revs}}
{{Identical|Content page}}',
	'reviewer' => '{{Flagged Revs}}
{{Identical|Reviewer}}',
	'revisionreview' => '{{Flagged Revs}}',
	'revreview-accuracy' => '{{Flagged Revs}}',
	'revreview-accuracy-0' => '{{Flagged Revs-small}}
This is the default configuration, i.e. the revision has not (yet) been reviewed.',
	'revreview-accuracy-1' => '{{Flagged Revs-small}}
A basic check on vandalism ("sighted" as "has been seen/checked"). This configuration is considered as "flagged".',
	'revreview-accuracy-2' => '{{Flagged Revs}}',
	'revreview-accuracy-3' => '{{Flagged Revs}}',
	'revreview-accuracy-4' => '{{Flagged Revs}}
{{Identical|Featured}}',
	'revreview-approved' => '{{Flagged Revs}}',
	'revreview-auto' => '{{Flagged Revs}}
{{Identical|Automatic}}',
	'revreview-auto-w' => "{{Flagged Revs-small}}
Because the user is in the group 'reviewer', any changes will automatically be reviewed. This would not be done when editing as a normal user or IP.",
	'revreview-auto-w-old' => "{{Flagged Revs-small}}
Because the user is in the group 'reviewer', any changes will automatically be reviewed. This would not be done when editing as a normal user or IP.",
	'revreview-basic' => '{{Flagged Revs}}
* Parameter $2 is the date of the approval',
	'revreview-basic-i' => '{{Flagged Revs}}
* Parameter $2 is the date of the approval',
	'revreview-basic-old' => '{{Flagged Revs}}
* Parameter $2 is the date of the approval',
	'revreview-basic-same' => '{{Flagged Revs}}
* Parameter $2 is the date of the approval',
	'revreview-basic-source' => '{{Flagged Revs-small}}
Displayed on the top of a page when you are viewing an old sighted version. 
* Example: [http://de.wikipedia.org/w/index.php?title=Deutsche_Sprache&oldid=46894374 de.wikipedia].
* Parameter $2 is the date of the approval',
	'revreview-changed' => '{{Flagged Revs}}',
	'revreview-current' => '{{Flagged Revs}}',
	'revreview-depth' => '{{Flagged Revs}}',
	'revreview-depth-0' => '{{Flagged Revs}}',
	'revreview-depth-1' => '{{Flagged Revs}}',
	'revreview-depth-2' => '{{Flagged Revs}}',
	'revreview-depth-3' => '{{Flagged Revs}}',
	'revreview-depth-4' => '{{Flagged Revs}}
{{Identical|Featured}}',
	'revreview-draft-title' => '{{Flagged Revs}}',
	'revreview-edit' => '{{Flagged Revs-small}}
Users who see the stable version and not the draft version as page, have this message in the "edit" tab.',
	'revreview-editnotice' => '{{Identical|Authorised user}}',
	'revreview-flag' => '{{Flagged Revs-small}}
* Title of the review box shown below a page (when you have the permission to review pages).',
	'revreview-edited' => '{{Flagged Revs-small}}
If an anonymous user edits a stable page, after saving the page he sees the draft version (<tt>stable=0</tt> in page title) he has made.

{{Identical|Authorised user}}',
	'revreview-invalid' => '{{Flagged Revs}}',
	'revreview-legend' => '{{Flagged Revs}}',
	'revreview-log' => '{{Flagged Revs}}
{{Identical|Comment}}',
	'revreview-main' => '{{Flagged Revs}}
{{Identical|Content page}}',
	'revreview-newest-basic' => '{{Flagged Revs}}',
	'revreview-newest-basic-i' => '{{Flagged Revs-small}}
Used in the "flagged revs box" when you are viewing the latest draft version, but when there is a sighted revision, the stable version. 

Example: [http://de.wikipedia.org/w/index.php?title=Deutsche_Sprache&stable=0 de.wikipedia].
* Note, the example seems not to work, currently.',
	'revreview-newest-quality' => '{{Flagged Revs}}',
	'revreview-newest-quality-i' => '{{Flagged Revs}}',
	'revreview-noflagged' => '{{Flagged Revs-small}}
Shown above a page, when there are no reviewed revisions of that page.',
	'revreview-note' => '{{Flagged Revs-small}}
Additionnal notes and comments, see [[:Image:FlaggedRevs2.png]].',
	'revreview-notes' => '{{Flagged Revs-small}}
If <tt>$wgFlaggedRevsComments = true;</tt> there is a comment box to add any notes while reviewing the revision.',
	'revreview-oldrating' => '{{Flagged Revs-small}}
Used in the detailed version as label text for the ratings, see [http://translatewiki.net/w/images/8/84/FlaggedRevs.jpg this image] for an example.',
	'revreview-patrol' => '{{Flagged Revs}}',
	'revreview-patrol-title' => '{{Flagged Revs}}',
	'revreview-patrolled' => '{{Flagged Revs}}',
	'revreview-quality' => '{{Flagged Revs}}',
	'revreview-quality-i' => '{{Flagged Revs}}',
	'revreview-quality-old' => '{{Flagged Revs}}',
	'revreview-quality-same' => '{{Flagged Revs}}',
	'revreview-quality-source' => "{{Flagged Revs-small}}
Displayed on the top of a page when you are viewing an old quality version. 
* Example: [http://de.wikipedia.org/w/index.php?title=Deutsche_Sprache&oldid=46894374 de.wikipedia] (this is a sighted version, but it's the same for a quality version).
* Parameter $2 is the date of the approval",
	'revreview-quality-title' => '{{Flagged Revs}}',
	'revreview-quick-basic' => '{{Flagged Revs}}
{{Identical|Sighted article view draft}}',
	'revreview-quick-basic-old' => '{{Flagged Revs}}
{{Identical|Sighted article view draft}}',
	'revreview-quick-basic-same' => '{{Flagged Revs}}',
	'revreview-quick-invalid' => '{{Flagged Revs}}',
	'revreview-quick-none' => '{{Flagged Revs-small}}
Shown in the "flagged revs box" on the content page when there isn\'t any sighted or quality revision yet.',
	'revreview-quick-quality' => '{{Flagged Revs-small}}
Used in the "flagged revs box" when viewing a quality version, while there are new changes (in a draft version) to be reviewed.

{{Identical|Quality article view draft}}',
	'revreview-quick-quality-old' => '{{Flagged Revs}}
{{Identical|Quality article view draft}}',
	'revreview-quick-quality-same' => '{{Flagged Revs}}',
	'revreview-quick-see-basic' => '{{Flagged Revs}}
{{Identical|Draft view article compare}}',
	'revreview-quick-see-quality' => '{{Flagged Revs}}
{{Identical|Draft view article compare}}',
	'revreview-selected' => '{{Flagged Revs}}',
	'revreview-source' => '{{Flagged Revs}}',
	'revreview-stable' => '{{Flagged Revs}}
{{Identical|Stable}}',
	'revreview-stable-title' => '{{Flagged Revs}}',
	'revreview-stable1' => '{{Flagged Revs}}',
	'revreview-stable2' => '{{Flagged Revs}}',
	'revreview-style' => '{{Flagged Revs}}',
	'revreview-style-0' => '{{Flagged Revs}}',
	'revreview-style-1' => '{{Flagged Revs}}',
	'revreview-style-2' => '{{Flagged Revs}}',
	'revreview-style-3' => '{{Flagged Revs}}',
	'revreview-style-4' => '{{Flagged Revs}}
{{Identical|Featured}}',
	'revreview-submit' => '{{Flagged Revs-small}}
The text on the submit button in the form used to review pages.

{{Identical|Submit}}',
	'revreview-submitting' => '{{flaggedrevs}}
{{identical|submitting}}',
	'revreview-successful' => '{{Flagged Revs-small}}
Shown when a reviewer/editor has marked a revision as stable/sighted/... See also {{msg|revreview-successful2|pl=yes}}.',
	'revreview-successful2' => '{{Flagged Revs-small}}
Shown when a reviewer/editor has marked a stable/sighted/... revision as unstable/unsighted/... After that, it can normally be reviewed again. See also {{msg|revreview-successful|pl=yes}}.',
	'revreview-text' => "{{Flagged Revs-small}}
Displayed in the review box for the reviewers' information.",
	'revreview-text2' => '{{Flagged Revs}}',
	'revreview-toggle-title' => '{{Flagged Revs-small}}
Tooltip shown when hovering over <span style="color:blue;">(-/+)</span>.',
	'revreview-toolow' => '{{Flagged Revs-small}}
A kind of error shown when trying to review a revision with all settings on "unapproved".',
	'revreview-update' => '{{Flagged Revs}}',
	'revreview-update-includes' => '{{Flagged Revs}}',
	'revreview-update-none' => '{{Flagged Revs}}',
	'revreview-update-use' => '{{Flagged Revs}}',
	'revreview-diffonly' => '{{Flagged Revs}}',
	'revreview-visibility' => '{{Flagged Revs-small}}
Appears above the protection form when the current version of the page is the stable version; otherwise {{msg-mw|revreview-visibility2}} or {{msg-mw|revreview-visibility3}} is shown.',
	'revreview-visibility2' => '{{Flagged Revs-small}}
Appears on top of the protection form when the current version is not the stable version; otherwise {{msg-mw|revreview-visibility}} or {{msg-mw|revreview-visibility3}} is shown.',
	'revreview-visibility3' => '{{Flagged Revs-small}}
Appears on top of the protection form when the page has no stable version at all; otherwise {{msg-mw|revreview-visibility}} or {{msg-mw|revreview-visibility2}} is shown.',
	'right-autoreview' => '{{Flagged Revs}}

{{doc-right|autoreview}}',
	'right-movestable' => '{{Flagged Revs}}

{{doc-right|movestable}}',
	'right-review' => '{{Flagged Revs}}

{{doc-right|review}}',
	'right-stablesettings' => '{{Flagged Revs}}

{{doc-right|stablesettings}}',
	'right-validate' => '{{Flagged Revs}}

{{doc-right}}',
	'rights-editor-autosum' => '{{Flagged Revs}}',
	'rights-editor-revoke' => '{{Flagged Revs}}',
	'specialpages-group-quality' => '{{Flagged Revs-small}}
A group in [[Special:SpecialPages]] for all special pages of the Flagged Revs extension.',
	'stable-logentry' => '{{Flagged Revs}}',
	'stable-logentry2' => '{{Flagged Revs}}',
	'stable-logpage' => '{{Flagged Revs}}',
	'stable-logpagetext' => '{{Flagged Revs}}
{{Identical|Content pages}}',
	'revreview-filter-all' => '{{Flagged Revs}}
{{Identical|All}}',
	'revreview-filter-approved' => '{{Flagged Revs}}',
	'revreview-filter-reapproved' => '{{Flagged Revs}}',
	'revreview-filter-unapproved' => '{{Flagged Revs}}',
	'revreview-filter-auto' => '{{Flagged Revs}}',
	'revreview-filter-manual' => '{{Flagged Revs}}',
	'revreview-statusfilter' => '{{Flagged Revs}}',
	'revreview-typefilter' => '{{Flagged Revs}}

{{Identical|Type}}',
	'tooltip-ca-current' => '{{Flagged Revs}}',
	'tooltip-ca-stable' => '{{Flagged Revs}}',
	'tooltip-ca-default' => '{{Flagged Revs}}',
	'log-show-hide-review' => '* $1 is one of {{msg|show}} or {{msg|hide}}',
	'revreview-tt-review' => '{{Flagged Revs}}',
	'validationpage' => "{{Flagged Revs-small}}
Link to the general help page. Do ''not'' translate the <tt><nowiki>{{ns:help}}</nowiki></tt> part.",
);

/** Afrikaans (Afrikaans)
 * @author Arnobarnard
 * @author Naudefj
 */
$messages['af'] = array(
	'editor' => 'Redakteur',
	'flaggedrevs-pref-UI' => 'Stabiele weergawe koppelvlak:',
	'group-editor-member' => 'Redakteur',
	'review-logentry-id' => 'bekyk',
	'revreview-accuracy' => 'Akkuraatheid',
	'revreview-accuracy-0' => 'Nie goedgekeur',
	'revreview-accuracy-2' => 'Akkuraat',
	'revreview-accuracy-4' => 'Uitgelig',
	'revreview-approved' => 'Goedgekeur',
	'revreview-auto' => '(outomaties)',
	'revreview-depth-4' => 'Uitgelig',
	'revreview-log' => 'Opmerking:',
	'revreview-patrol' => 'Merk die wysiging as gekontroleer',
	'revreview-patrol-title' => 'Merk as gekontroleer',
	'revreview-stable' => 'Stabiele bladsy',
	'revreview-style-4' => 'Uitgelig',
	'revreview-submit' => 'Dien in',
	'revreview-toggle-title' => 'wys/versteek details',
	'revreview-revnotfound' => 'Die ou weergawe wat jy aangevra het kon nie gevind word nie. Gaan asseblief die URL na wat jy gebruik het.',
	'right-movestable' => 'Skuif stabiele bladsye',
	'revreview-filter-all' => 'Alles',
	'revreview-filter-stable' => 'stabiel',
	'revreview-filter-approved' => 'Goedgekeur',
	'revreview-statusfilter' => 'Status verandering:',
	'revreview-typefilter' => 'Tipe:',
);

/** Amharic (አማርኛ)
 * @author Codex Sinaiticus
 */
$messages['am'] = array(
	'revreview-log' => 'ማጠቃለያ፦',
	'revreview-revnotfound' => 'ለዚህ ገጽ የጠየቁት የቆየው ዕትም ሊገኝ አልቻለም። እባክዎ ይህን ገጽ ለማግኘት የተጠቀመው URL ይመልከቱ።',
	'revreview-filter-all' => 'ሁሉ',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Rebisions siñalatas',
	'flaggedrevs-backlog' => "Bi ha un rechistro de fainas rezagatas en a [[Special:OldReviewedPages|Lista de pachinas biellas rebisatas]]. '''Se i amenista a suya aduya!'''",
	'flaggedrevs-desc' => 'Premite á os editors/rebisors de balidar rebisions y fer estables as pachinas',
	'flaggedrevs-pref-UI-0' => "Usar una a bersión estable detallata d'o interfaz d'usuario",
	'flaggedrevs-pref-UI-1' => "Usar una bersión estable simple d'o interfaz d'usuario",
	'flaggedrevs-prefs-stable' => "Amostrar siempre por defeuto a bersión estable d'as pachinas de contenius (si ye que bi'n ha beluna).",
	'flaggedrevs-prefs-watch' => "Adibir as pachinas rebisatas por yo t'a lista de seguimiento",
	'group-editor' => 'Editors',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Rebisadors',
	'group-reviewer-member' => 'Rebisador',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Rebisador',
	'hist-draft' => 'bersión borrador',
	'hist-quality' => 'bersión de calidat',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} balidato] por [[User:$3|$3]]',
	'hist-stable' => 'bersión superbisata',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} superbisata] por [[User:$3|$3]]',
	'review-diff2stable' => 'Amostrar cambeos entre a bersión estable y a bersión autual',
	'review-logentry-app' => "s'ha rebisato [[$1]]",
	'review-logentry-dis' => 'ha dispreziato una bersión de [[$1]]',
	'review-logentry-id' => 'ID de bersión $1',
	'review-logentry-diff' => 'diferenzia con estable',
	'review-logpage' => 'Rechistro de rebisions',
	'review-logpagetext' => "Isto ye un rechistro d'o [[{{MediaWiki:Validationpage}}|estau d'aprebazión]] de rebisions de pachinas de conteniu.
Mire-se a [[Special:ReviewedPages|lista de pachinas rebisatas]] an que trobará una lista de pachinas aprebatas.",
	'reviewer' => 'Rebisador',
	'revisionreview' => 'Rebisar bersions',
	'revreview-accuracy' => 'Prezisión',
	'revreview-accuracy-0' => 'No aprebato',
	'revreview-accuracy-1' => 'Superbisato',
	'revreview-accuracy-2' => 'Preziso',
	'revreview-accuracy-3' => 'Bien decumentato',
	'revreview-accuracy-4' => 'Destacato',
	'revreview-approved' => 'Aprebato',
	'revreview-auto' => '(automatico)',
	'revreview-auto-w' => "Ye editando una bersión estable; os cambeos '''serán rebisatos automaticament'''.",
	'revreview-auto-w-old' => "Ye editando una bersión rebisata; os cambios '''serán rebisatos automaticament'''.",
	'revreview-basic' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|superbisata]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambeo|cambeos}}] asperando una rebisión.',
	'revreview-basic-i' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|superbisata]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios en plantillas/imachens] asperando una rebisión.',
	'revreview-basic-old' => 'Ista ye una bersión [[{{MediaWiki:Validationpage}}|superbisata]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amostrat todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
Puet estar que bi aiga [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} nuebos cambios].',
	'revreview-basic-same' => 'Esta ye a zaguera rebisión [[{{MediaWiki:Validationpage}}|superbisata]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amostrar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.',
	'revreview-basic-source' => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bersión superbisata] d'ista pachina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>, ye estata basata en esta bersión.",
	'revreview-changed' => "'''No s'ha puesto fer l'aizión que ha demandato en ista bersión de [[:$1|$1]].'''

Puet estar que aiga demandato una plantilla u imachen sin que s'aiga espezificato a bersión.
Isto puede pasar si una plantilla dinamica contiene atra imachen u plantilla que pende en una bariable que ha cambiato dende que prenzipió á rebisar ista pachina.
O problema puet resolber-se refrescando a pachina y tornando-la á amostrar.",
	'revreview-current' => 'Borrador',
	'revreview-depth' => 'Fondura',
	'revreview-depth-0' => 'No aprebato',
	'revreview-depth-1' => 'Basico',
	'revreview-depth-2' => 'Moderato',
	'revreview-depth-3' => 'Alto',
	'revreview-depth-4' => 'Destacato',
	'revreview-draft-title' => "Borrador d'articlo",
	'revreview-edit' => 'Editar borrador',
	'revreview-flag' => 'Rebisar ista bersión',
	'revreview-edited' => "'''As edizions s'encorporarán t'a [[{{MediaWiki:Validationpage}}|bersión estable]] malas que un usuario establexito las rebise.

O ''borrador'' s'amuestra en o cobaixo.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|cambeo aspera awaits|cambeos asperan}}] una rebisión.",
	'revreview-invalid' => "'''Destín no conforme:''' no bi ha garra [[{{MediaWiki:Validationpage}}|bersión rebisata]] que corresponda con ixe ID.",
	'revreview-legend' => "Balure o conteniu d'a rebisión",
	'revreview-log' => 'Comentario:',
	'revreview-main' => "Ha de trigar una bersión particular d'una pachina de conteniu ta poder rebisar-la.

Mire-se [[Special:Unreviewedpages]] an que trobará una lista de pachinas sin rebisar.",
	'revreview-newest-basic' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión superbisata] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambeo|cambeos}}] {{PLURAL:$3|amenista|amenistan}} una rebisión.',
	'revreview-newest-basic-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión superbisata] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Bels cambeos en a plantillas u imáchens] amenistan una rebisión.',
	'revreview-newest-quality' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión de calidat] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambeo|cambeos}}] {{PLURAL:$3|amenista|amenistan}} una rebisión.',
	'revreview-newest-quality-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión de calidat] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Bels cambeos en plantillas u imáchens] amenistan una rebisión.',
	'revreview-noflagged' => "No bi ha garra bersión rebisata d'ista pachina, y por ixo a calidat d'ista pachina talment '''no''' ye estata [[{{MediaWiki:Validationpage}}|abaluata]].",
	'revreview-note' => '[[User:$1|$1]] ha feito as siguients notas mientres [[{{MediaWiki:Validationpage}}|rebisaba]] ista bersión:',
	'revreview-notes' => "Obserbazions u notas t'amostrar:",
	'revreview-oldrating' => 'A calificazión ye:',
	'revreview-patrol' => 'Siñalar iste cambio como patrullato',
	'revreview-patrol-title' => 'Siñalar como patrullato',
	'revreview-patrolled' => "A bersión trigata de [[:$1|$1]] s'ha siñalata como patrullata.",
	'revreview-quality' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambeo|cambeos}}] asperando una rebisión.',
	'revreview-quality-i' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambeos en plantillas u imáchens] asperando una rebisión.',
	'revreview-quality-old' => "Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amostrar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
S'han feito nuebos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambeos].",
	'revreview-quality-same' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amostrar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.',
	'revreview-quality-source' => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bersión de calidat] d'ista pachina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>, s'ha basato en ista bersión.",
	'revreview-quality-title' => 'Articlo de calidat',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Articlo superbisato]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} amostrar borrador]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Articlo superbisato]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} amostrar borrador]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Articlo superbisato]]'''",
	'revreview-quick-invalid' => "'''ID de rebisión no conforme'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Bersión autual]]''' (no rebisata)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Articlo de calidat]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} amostrar borrador]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Articlo de calidat]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} amostrar borrador]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Articlo de calidat]]'''",
	'revreview-quick-see-basic' => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} amostrar articlo]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} contimparar])",
	'revreview-quick-see-quality' => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} amostrar articlo]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} contimparar])",
	'revreview-selected' => "Bersión trigata de '''$1:'''",
	'revreview-source' => "codigo fuent d'o borrador",
	'revreview-stable' => 'Pachina estable',
	'revreview-stable-title' => 'Articlo superbisato',
	'revreview-stable1' => "Si quiere puede beyer [{{fullurl:$1|stableid=$2}} ista bersión siñalata] ta mirar si ye a [{{fullurl:$1|stable=1}} bersión estable] autual d'ista pachina.",
	'revreview-stable2' => "Si quiere puede beyer a [{{fullurl:$1|stable=1}} bersión estable] s'ista pachina (si ye que bi'n ha una).",
	'revreview-style' => 'Leyibilidat',
	'revreview-style-0' => 'No aprebato',
	'revreview-style-1' => 'Azeutable',
	'revreview-style-2' => 'Bueno',
	'revreview-style-3' => 'Conziso',
	'revreview-style-4' => 'Destacato',
	'revreview-submit' => 'Nimbiar rebisión',
	'revreview-successful' => "'''S'ha siñalato a bersión trigata de [[:$1|$1]]. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} amostrar todas as bersions siñalatas])'''",
	'revreview-successful2' => "'''S'ha sacato o siñal d'as bersions trigatas de [[:$1|$1]]'''",
	'revreview-text' => "''As pachinas de conteniu que s'amuestran por defeuto son as [[{{MediaWiki:Validationpage}}|bersions estables]] en cuenta de as zagueras bersions.''",
	'revreview-text2' => "As ''[[{{MediaWiki:Validationpage}}|bersions estables]] son bersions d'as pachinas que s'han comprebato y son o conteniu que s'amuestra por defeuto en os bisualizadors.''",
	'revreview-toggle-title' => 'amostrar/amagar detalles',
	'revreview-toolow' => 'Ta que a bersión se considere rebisata ha d\'abaluar toz os atribtos que s\'amuestran en o cobaixo con una calificazión mayor de "no aprebato". Ta depreziar a bersión, meta "no aprebato" en toz os campos.',
	'revreview-update' => "Por fabor [[{{MediaWiki:Validationpage}}|rebise]] os cambios ''(que s'amuestran en o cobaixo)'' feitos dende que s'aprebó a [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} bersión estable].<br />
'''S'han esbiellato bellas plantillas/imáchens:'''",
	'revreview-update-includes' => "'''S'han esbiellato bellas plantillas u imáchens:'''",
	'revreview-update-none' => "Por fabor [[{{MediaWiki:Validationpage}}|rebise]] os cambeos ''(que s'amuestran en o cobaixo)'' feitos dende que s'aprebó a [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} bersión estable].",
	'revreview-update-use' => "'''PARE CUENTA:''' Si beluna d'istas plantillas u imáchens tiene un bersión estable, s'emplegarán istas en a bersión estable d'a pachina.",
	'revreview-diffonly' => "''Ta rebisar as pachinas, punche en o binclo \"bersión autual\" y faiga serbir o formulario de rebisión.''",
	'revreview-visibility' => "'''Ista pachina tiene una [[{{MediaWiki:Validationpage}}|bersión estable]]; A suya confegurazión puede cambiar-se [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} aquí].'''",
	'revreview-revnotfound' => "No se pudo trobar a bersión antiga d'a pachina demandata.
Por fabor, rebise l'adreza que fazió serbir t'aczeder á ista pachina.",
	'right-autoreview' => 'Siñalar as rebisions automaticament como superbisatas',
	'right-movestable' => 'Tresladar as pachinas estables',
	'right-review' => 'Siñalar as rebisions como superbisatas',
	'right-stablesettings' => "Confegurar cómo se triga y s'amuestra a bersión estable",
	'right-validate' => 'Siñalar as rebisions como balidatas',
	'rights-editor-autosum' => 'autopromobito',
	'rights-editor-revoke' => "s'ha sacato o estatus d'edito á [[$1]]",
	'specialpages-group-quality' => 'Seguranza de calidat',
	'stable-logentry' => "s'ha confegurato o emplego de bersions estables ta [[$1]]",
	'stable-logentry2' => "s'ha restablito o emplego de bersions estables ta [[$1]]",
	'stable-logpage' => 'Rechistro de bersions estables',
	'stable-logpagetext' => "Iste ye un rechistro de cambeos d'a confegurazión de [[{{MediaWiki:Validationpage}}|bersions estables]] d'as pachinas de conteniu.
Puede trobar una lista de pachinas con bersions estables en [[Special:StablePages|lista de pachinas estables]].",
	'revreview-filter-all' => 'Toz',
	'revreview-filter-approved' => 'Aprebatos',
	'revreview-filter-reapproved' => 'Re-aprebatos',
	'revreview-filter-unapproved' => 'No aprebatos',
	'revreview-filter-auto' => 'Automatico',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Mena:',
	'tooltip-ca-current' => "Amostrar o borrador autual d'ista pachina",
	'tooltip-ca-stable' => "Amostrar a bersión estable d'ista pachina",
	'tooltip-ca-default' => "Opzions d'aseguranza d'a calidat",
	'revreview-tt-review' => 'Rebisar ista pachina',
	'validationpage' => "{{ns:help}}:Balidazión d'articlo",
);

/** Arabic (العربية)
 * @author Antime
 * @author Meno25
 * @author OsamaK
 * @author Ouda
 * @author Prof.Sherif
 */
$messages['ar'] = array(
	'editor' => 'محرر',
	'flaggedrevs' => 'مراجعات معلمة',
	'flaggedrevs-backlog' => "يوجد حاليا سجل تأخر في [[Special:OldReviewedPages|التعديلات قيد الانتظار]] للصفحات المراجعة. 
'''انتباهك مطلوب!'''",
	'flaggedrevs-watched-pending' => "توجد حاليا [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} تعديلات في الانتظار] لمراجعة الصفحات في قائمة مراقبتك '''انتباهك مطلوب!'''",
	'flaggedrevs-desc' => 'يعطي المحررين/المراجعين القدرة على التأكد من صحة النسخ وتثبيت الصفحات',
	'flaggedrevs-pref-UI' => 'واجهة نسخة مستقرة:',
	'flaggedrevs-pref-UI-0' => 'استخدم واجهة مستخدم لنسخة مستقرة مفصلة',
	'flaggedrevs-pref-UI-1' => 'استخدم واجهة مستخدم لنسخة مستقرة بسيطة',
	'prefs-flaggedrevs' => 'استقرار',
	'flaggedrevs-prefs-stable' => 'دائما اعرض النسخة المستقرة لصفحات المحتوى افتراضيا (لو كانت هناك واحدة)',
	'flaggedrevs-prefs-watch' => 'أضف الصفحات التي أراجعها إلى قائمة مراقبتي',
	'group-editor' => 'محررون',
	'group-editor-member' => 'محرر',
	'group-reviewer' => 'مراجعون',
	'group-reviewer-member' => 'مراجع',
	'grouppage-editor' => '{{ns:project}}:محرر',
	'grouppage-reviewer' => '{{ns:project}}:مراجع',
	'group-autoreview' => 'مراجعون تلقائيون',
	'group-autoreview-member' => 'مراجع تلقائي',
	'grouppage-autoreview' => '{{ns:project}}:مراجع تلقائي',
	'hist-draft' => 'مراجعة مسودة',
	'hist-quality' => 'مراجعة جودة',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} تم التحقق منها] بواسطة [[User:$3|$3]]',
	'hist-stable' => 'مراجعة منظورة',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} تم نظرها] بواسطة [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} منظورة تلقائيا]',
	'review-diff2stable' => 'عرض التغييرات بين المراجعتين المستقرة والحالية',
	'review-logentry-app' => 'راجع ن$2 من [[$1]]',
	'review-logentry-dis' => 'أزال ن$2 من [[$1]]',
	'review-logentry-id' => 'عرض',
	'review-logentry-diff' => 'الفرق للمستقرة',
	'review-logpage' => 'سجل المراجعة',
	'review-logpagetext' => 'هذا سجل بالتغييرات في حالة [[{{MediaWiki:Validationpage}}|الموافقة]] لصفحات المحتوى.
انظر [[Special:ReviewedPages|قائمة الصفحات المراجعة]] لقائمة بالصفحات المراجعة.',
	'reviewer' => 'مراجع',
	'revisionreview' => 'مراجعة المراجعات',
	'revreview-accuracy' => 'الدقة',
	'revreview-accuracy-0' => 'غير موافق',
	'revreview-accuracy-1' => 'منظورة',
	'revreview-accuracy-2' => 'دقيقة',
	'revreview-accuracy-3' => 'مصادرها جيدة',
	'revreview-accuracy-4' => 'مميزة',
	'revreview-approved' => 'موافق عليها',
	'revreview-auto' => '(تلقائيا)',
	'revreview-auto-w' => "أنت تقوم بتغييرات للمراجعة المستقرة؛ التغييرات '''ستتم مراجعتها تلقائيا'''.",
	'revreview-auto-w-old' => "أنت تحرر مراجعة مراجعة؛ التغييرات ستتم '''مراجعتها تلقائيا'''.",
	'revreview-basic' => 'هذه هي آخر مراجعة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] بانتظار المراجعة.',
	'revreview-basic-i' => 'هذه هي أحدث مراجعة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-basic-old' => 'هذه مراجعة [[{{MediaWiki:Validationpage}}|منظورة]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-basic-same' => 'هذه هي آخر مراجعة [[{{MediaWiki:Validationpage}}|منظورة]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل])، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة منظورة] من هذه الصفحة، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>، بناء على هذه المراجعة.',
	'revreview-blocked' => 'أنت لا يمكنك مراجعة هذه المراجعة لأن حسابك ممنوع حاليا ([$1 التفاصيل])',
	'revreview-changed' => "'''الفعل المطلوب لم يمكن إجراؤه على هذه المراجعة من [[:$1|$1]].'''

قد يكون قالب أو ملف طُلب مع عدم تحديد نسخة معينة.
يمكن أن يحدث هذا إذا كان قالب ديناميكي يحتوي ملفًا آخرًا أو قالبًا معتمدًا على متغير تغير منذ أن بدأت
مراجعة هذه الصفحة.
يمكن أن يحل تحديث الصفحة وإعادة المراجعة هذه المشكلة.",
	'revreview-current' => 'مسودة',
	'revreview-depth' => 'العمق',
	'revreview-depth-0' => 'غير موافق عليها',
	'revreview-depth-1' => 'أساسي',
	'revreview-depth-2' => 'متوسط',
	'revreview-depth-3' => 'مرتفع',
	'revreview-depth-4' => 'مميز',
	'revreview-draft-title' => 'صفحة المسودة',
	'revreview-edit' => 'عدل المسودة',
	'revreview-editnotice' => "'''ملاحظة: التعديلات لهذه الصفحة سيتم دمجها في [[{{MediaWiki:Validationpage}}|النسخة المستقرة]] متى راجعها مستخدم مخول.'''",
	'revreview-flag' => 'راجع هذه المراجعة',
	'revreview-edited' => "'''التعديلات سيتم دمجها في [[{{MediaWiki:Validationpage}}|النسخة المستقرة]] متى راجعها مستخدم موثوق.
''المسودة'' معروضة بالأسفل.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|تغير ينتظر|تغيير ينتظر}}] المراجعة.",
	'revreview-invalid' => "'''هدف غير صحيح:''' لا مراجعة [[{{MediaWiki:Validationpage}}|مراجعة]] تتطابق مع الرقم المعطى.",
	'revreview-legend' => 'قيم محتوى المراجعة',
	'revreview-log' => 'تعليق السجل:',
	'revreview-main' => 'يجب أن تختار مراجعة معينة من صفحة محتوى لمراجعتها.

انظر [[Special:Unreviewedpages|قائمة الصفحات غير المراجعة]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة منظورة] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] {{PLURAL:$3|يحتاج|يحتاج}} المراجعة.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة منظورة] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة جودة] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] {{PLURAL:$3|يحتاج|يحتاج}} المراجعة.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة جودة] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-noflagged' => "لا توجد مراجعة مراجعة لهذه الصفحة، لذا ربما '''لا''' تكون قد تم 
[[{{MediaWiki:Validationpage}}|التحقق من]] جودتها.",
	'revreview-note' => '[[User:$1|$1]] كتب الملاحظات التالية [[{{MediaWiki:Validationpage}}|عند مراجعة]] هذه المراجعة:',
	'revreview-notes' => 'الملاحظات للعرض:',
	'revreview-oldrating' => 'تم تقييمها ك:',
	'revreview-patrol' => 'علم على هذا التغيير كمراجع',
	'revreview-patrol-title' => 'علم كمراجعة',
	'revreview-patrolled' => 'المراجعة المختارة من [[:$1|$1]] تم التعليم عليها كمراجعة.',
	'revreview-quality' => 'هذه هي آخر مراجعة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] بانتظار المراجعة.',
	'revreview-quality-i' => 'هذه هي أحدث مراجعة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-quality-old' => 'هذه مراجعة [[{{MediaWiki:Validationpage}}|جودة]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-quality-same' => 'هذه هي آخر مراجعة [[{{MediaWiki:Validationpage}}|جودة]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل])، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة جودة] من هذه الصفحة، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>، بناء على هذه المراجعة.',
	'revreview-quality-title' => 'صفحة الجودة',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|صفحة منظورة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-basic-old' => "[[{{MediaWiki:Validationpage}}|صفحة منظورة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|صفحة منظورة]]'''",
	'revreview-quick-invalid' => "'''رقم مراجعة غير صحيح'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|المراجعة الحالية]]''' (غير مراجعة)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|صفحة الجودة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|صفحة الجودة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|صفحة الجودة]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|مسودة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} عرض الصفحة]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} مقارنة])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|مسودة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} عرض الصفحة]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} مقارنة])",
	'revreview-selected' => "المراجعة المختارة ل'''$1:'''",
	'revreview-source' => 'مصدر المسودة',
	'revreview-stable' => 'صفحة مستقرة',
	'revreview-stable-title' => 'صفحة منظورة',
	'revreview-stable1' => 'ربما ترغب في رؤية [{{fullurl:$1|stableid=$2}} هذه النسخة المعلمة] لترى ما إذا كانت [{{fullurl:$1|stable=1}} النسخة المستقرة] لهذه الصفحة.',
	'revreview-stable2' => 'ربما ترغب في رؤية [{{fullurl:$1|stable=1}} النسخة المستقرة] لهذه الصفحة (لو كانت مازالت هناك واحدة).',
	'revreview-style' => 'القابلية للقراءة',
	'revreview-style-0' => 'غير مقبول',
	'revreview-style-1' => 'مقبول',
	'revreview-style-2' => 'جيدة',
	'revreview-style-3' => 'متوسطة',
	'revreview-style-4' => 'مميزة',
	'revreview-submit' => 'إرسال',
	'revreview-submitting' => 'جاري التنفيذ...',
	'revreview-finished' => 'المراجعة انتهت!',
	'revreview-failed' => 'فشلت المراجعة!',
	'revreview-successful' => "'''مراجعة [[:$1|$1]] تم التعليم عليها بنجاح. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} عرض النسخ المستقرة])'''",
	'revreview-successful2' => "'''مراجعة [[:$1|$1]] تمت إزالة علمها بنجاح.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هي محتوى الصفحة الافتراضي للمشاهدين بدلا من أحدث مراجعة.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هي مراجعات تم التحقق منها من الصفحات ويمكن ضبطها كالمحتوى الافتراضي للمشاهدين.''",
	'revreview-toggle-title' => 'عرض/إخفاء التفاصيل',
	'revreview-toolow' => 'يجب عليك على الأقل تقييم كل من المحددات بالأسفل أعلى من "غير مقبولة" لكي تعتبر المراجعة مراجعة.
لسحب تقييم مراجعة، اضبط كل الحقول ك "غير مقبولة".',
	'revreview-update' => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ المراجعة المستقرة تمت  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].<br />
'''بعض القوالب/الملفات تم تحديثها: '''",
	'revreview-update-includes' => "'''بعض القوالب/الملفات تم تحديثها:'''",
	'revreview-update-none' => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ المراجعة المستقرة تمت  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].",
	'revreview-update-use' => "'''ملاحظة:''' إذا كان  لأي من هذه القوالب/الملفات نسخة مستقرة، فهي مستخدمة بالفعل في النسخة المستقرة لهذه الصفحة.",
	'revreview-diffonly' => "''لمراجعة الصفحة، اضغط على وصلة مراجعة \"المراجعة الحالية\" واستخدم استمارة المراجعة.''",
	'revreview-visibility' => "'''هذه الصفحة بها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]] محدثة؛ إعدادات استقرار الصفحة يمكن [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'revreview-visibility2' => "'''هذه الصفحة بها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]] قديمة؛ إعدادات استقرار الصفحة يمكن [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'revreview-visibility3' => "'''هذه الصفحة ليس بها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]]؛ إعدادات استقرار الصفحة يمكن [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'revreview-revnotfound' => 'لم يتم العثور على المراجعة القديمة من الصفحة التي طلبتها.
من فضلك تأكد من المسار الذي دخلت به إلى هذه الصفحة.',
	'right-autoreview' => 'التعليم على المراجعات تلقائيا كمنظورة',
	'right-movestable' => 'نقل الصفحات المستقرة',
	'right-review' => 'التعليم على المراجعات كمنظورة',
	'right-stablesettings' => 'ضبط كيف يتم اختيار وعرض النسخة المستقرة',
	'right-validate' => 'التعليم على المراجعات كمتحقق منها',
	'rights-editor-autosum' => 'ترقية تلقائية',
	'rights-editor-revoke' => 'أزال حالة محرر من [[$1]]',
	'specialpages-group-quality' => 'توكيد الجودة',
	'stable-logentry' => 'ضبط النسخة المستقرة ل[[$1]]',
	'stable-logentry2' => 'أعاد ضبط النسخة المستقرة ل[[$1]]',
	'stable-logpage' => 'سجل الاستقرار',
	'stable-logpagetext' => 'هذا سجل بالتغييرات لضبط [[{{MediaWiki:Validationpage}}|النسخة المستقرة]]
لصفحات المحتوى.
قائمة بالصفحات المستقرة يمكن العثور عليها في [[Special:StablePages|قائمة الصفحات المستقرة]].',
	'revreview-filter-all' => 'الكل',
	'revreview-filter-stable' => 'مستقرة',
	'revreview-filter-approved' => 'تمت الموافقة عليها',
	'revreview-filter-reapproved' => 'تكررت الموافقة عليها',
	'revreview-filter-unapproved' => 'غير موافق عليها',
	'revreview-filter-auto' => 'تلقائي',
	'revreview-filter-manual' => 'يدوي',
	'revreview-statusfilter' => 'تغير الحالة:',
	'revreview-typefilter' => 'النوع:',
	'revreview-levelfilter' => 'المستوى:',
	'revreview-lev-sighted' => 'منظورة',
	'revreview-lev-quality' => 'جودة',
	'revreview-lev-pristine' => 'فائقة',
	'revreview-reviewlink' => 'مراجعة',
	'tooltip-ca-current' => 'عرض المسودة الحالية لهذه الصفحة',
	'tooltip-ca-stable' => 'عرض النسخة المستقرة لهذه الصفحة',
	'tooltip-ca-default' => 'إعدادات توكيد الجودة',
	'revreview-locked-title' => 'التعديلات يجب أن تتم مراجعتها قبل أن يتم عرضها في هذه الصفحة!',
	'revreview-unlocked-title' => 'التعديلات لا تتطلب مراجعة قبل أن يتم عرضها في هذه الصفحة!',
	'revreview-locked' => 'التعديلات يجب أن تتم مراجعتها قبل أن يتم عرضها في هذه الصفحة!',
	'revreview-unlocked' => 'التعديلات لا تتطلب مراجعة قبل أن يتم عرضها في هذه الصفحة!',
	'log-show-hide-review' => '$1 سجل المراجعة',
	'revreview-tt-review' => 'راجع هذه الصفحة',
	'validationpage' => '{{ns:help}}:تحقيق الصفحة',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'revreview-typefilter' => 'ܐܕܫܐ:',
	'revreview-levelfilter' => 'ܫܘܝܐ:',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 * @author Ramsis II
 */
$messages['arz'] = array(
	'editor' => 'محرر',
	'flaggedrevs' => 'نسخ متعلم عليها',
	'flaggedrevs-backlog' => "دلوقتى فى سجل تأخير فى [[Special:OldReviewedPages|الصفحات المتراجعة القديمة]]. '''لو سمحت خد بالك !'''",
	'flaggedrevs-desc' => 'بيدى المحريين/المراجعين امكانية التأكد من أن النسخ صحيحة و تثبيت الصفحات.',
	'flaggedrevs-pref-UI-0' => 'استعمل واجهة يوزر لنسخة مستقرة متفصلة',
	'flaggedrevs-pref-UI-1' => 'استعمل واجهة يوزر لنسخة مستقرة بسيطة',
	'flaggedrevs-prefs-stable' => 'دايما اعرض النسخة المستقرة لصفحات المحتوى افتراضيا (لو فى هناك واحدة)',
	'flaggedrevs-prefs-watch' => 'ضيف الصفحات اللى أراجعها للستة مراقبتى',
	'group-editor' => 'محررين',
	'group-editor-member' => 'محرر',
	'group-reviewer' => 'مراجعين',
	'group-reviewer-member' => 'مراجع',
	'grouppage-editor' => '{{ns:project}}:محرر',
	'grouppage-reviewer' => '{{ns:project}}:مراجع',
	'group-autoreview' => 'مراجعين اوتوماتيكيين',
	'group-autoreview-member' => 'مراجع اوتوماتيكى',
	'grouppage-autoreview' => '{{ns:project}}:مراجع اوتوماتيكى',
	'hist-draft' => 'مراجعة مسودة',
	'hist-quality' => 'مراجعة جودة',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} اتأكدت] بواسطة [[User:$3|$3]]',
	'hist-stable' => 'مراجعة منظورة',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} تم نظرها] بواسطة [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} متشاف اوتوماتيكى]',
	'review-diff2stable' => 'عرض التغييرات بين المراجعتين المستقرة والحالية',
	'review-logentry-app' => 'النسخه $2 بتاعة [[$1]] اتراجعت.',
	'review-logentry-dis' => 'النسخه $2 بتاعة [[$1]] اتشالت',
	'review-logentry-id' => 'عرض',
	'review-logentry-diff' => 'الفرق للمستقرة',
	'review-logpage' => 'سجل المراجعة',
	'review-logpagetext' => 'هذا سجل بالتغييرات فى حالة [[{{MediaWiki:Validationpage}}|الموافقة]] لصفحات المحتوى.
انظر [[Special:ReviewedPages|قائمة الصفحات المراجعة]] لقائمة بالصفحات المراجعة.',
	'reviewer' => 'مراجع',
	'revisionreview' => 'مراجعة المراجعات',
	'revreview-accuracy' => 'الدقة',
	'revreview-accuracy-0' => 'غير موافق',
	'revreview-accuracy-1' => 'منظورة',
	'revreview-accuracy-2' => 'دقيقة',
	'revreview-accuracy-3' => 'مصادرها جيدة',
	'revreview-accuracy-4' => 'مميزة',
	'revreview-approved' => 'موافق عليها',
	'revreview-auto' => '(تلقائيا)',
	'revreview-auto-w' => "أنت تقوم بتغييرات للمراجعة المستقرة؛ التغييرات '''ستتم مراجعتها تلقائيا'''.",
	'revreview-auto-w-old' => "أنت تحرر مراجعة مراجعة؛ التغييرات ستتم '''مراجعتها تلقائيا'''.",
	'revreview-basic' => 'هذه هى آخر مراجعة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] بانتظار المراجعة.',
	'revreview-basic-i' => 'هذه هى أحدث مراجعة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-basic-old' => 'هذه مراجعة [[{{MediaWiki:Validationpage}}|منظورة]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-basic-same' => 'هذه هى آخر مراجعة [[{{MediaWiki:Validationpage}}|منظورة]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل])، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة منظورة] من هذه الصفحة، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>، بناء على هذه المراجعة.',
	'revreview-blocked' => 'انتا ما ينفعش تستعرض المراجعه دى عشان الحساب بتاعك معموله منع حاليا ([$1 تفاصيل])',
	'revreview-changed' => "'''الفعل المطلوب لم يمكن إجراؤه على هذه المراجعة من [[:$1|$1]].'''

قالب أو صورة ربما يكون قد تم طلبه عندما لم يتم تحديد نسخة معينة.
هذا يمكن أن يحدث لو قالب ديناميكى يضمن صورة أخرى أو قالب معتمدا على متغير تغير منذ أن بدأت
مراجعة هذه الصفحة.
تحديث الصفحة وإعادة المراجعة يمكن أن يحل هذه المشكلة.",
	'revreview-current' => 'مسودة',
	'revreview-depth' => 'العمق',
	'revreview-depth-0' => 'غير موافق عليها',
	'revreview-depth-1' => 'أساسى',
	'revreview-depth-2' => 'متوسط',
	'revreview-depth-3' => 'مرتفع',
	'revreview-depth-4' => 'مميز',
	'revreview-draft-title' => 'صفحة المسودة',
	'revreview-edit' => 'عدل المسودة',
	'revreview-editnotice' => "'''ملاحظة: التعديلات لهذه الصفحة سيتم دمجها فى [[{{MediaWiki:Validationpage}}|النسخة المستقرة]] متى راجعها مستخدم مخول.'''",
	'revreview-flag' => 'راجع هذه المراجعة',
	'revreview-edited' => "'''التعديلات سيتم دمجها فى [[{{MediaWiki:Validationpage}}|النسخة المستقرة]] متى راجعها مستخدم موثوق.
''المسودة'' معروضة بالأسفل.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|تغير ينتظر|تغيير ينتظر}}] المراجعة.",
	'revreview-invalid' => "'''هدف غير صحيح:''' لا مراجعة [[{{MediaWiki:Validationpage}}|مراجعة]] تتطابق مع الرقم المعطى.",
	'revreview-legend' => 'قيم محتوى المراجعة',
	'revreview-log' => 'تعليق السجل:',
	'revreview-main' => 'يجب أن تختار مراجعة معينة من صفحة محتوى لمراجعتها.

انظر [[Special:Unreviewedpages|قائمة الصفحات غير المراجعة]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة منظورة] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] {{PLURAL:$3|يحتاج|يحتاج}} المراجعة.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة منظورة] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة جودة] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] {{PLURAL:$3|يحتاج|يحتاج}} المراجعة.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة جودة] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-noflagged' => "لا توجد مراجعة مراجعة لهذه الصفحة، لذا ربما '''لا''' تكون قد تم 
[[{{MediaWiki:Validationpage}}|التحقق من]] جودتها.",
	'revreview-note' => '[[User:$1|$1]] كتب الملاحظات التالية [[{{MediaWiki:Validationpage}}|عند مراجعة]] هذه المراجعة:',
	'revreview-notes' => 'الملاحظات للعرض:',
	'revreview-oldrating' => 'تم تقييمها ك:',
	'revreview-patrol' => 'علم على هذا التغيير كمراجع',
	'revreview-patrol-title' => 'علم كمراجعة',
	'revreview-patrolled' => 'المراجعة المختارة من [[:$1|$1]] تم التعليم عليها كمراجعة.',
	'revreview-quality' => 'هذه هى آخر مراجعة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] بانتظار المراجعة.',
	'revreview-quality-i' => 'هذه هى أحدث مراجعة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-quality-old' => 'هذه مراجعة [[{{MediaWiki:Validationpage}}|جودة]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-quality-same' => 'هذه هى آخر مراجعة [[{{MediaWiki:Validationpage}}|جودة]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} عرض الكل])، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة جودة] من هذه الصفحة، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>، بناء على هذه المراجعة.',
	'revreview-quality-title' => 'صفحة جودة',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|صفحة متشافة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} اعرض المسودة]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|صفحة متشافة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} اعرض المسودة]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|صفحة متشافة]]'''",
	'revreview-quick-invalid' => "'''رقم مراجعة غير صحيح'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|المراجعة الحالية]]''' (غير مراجعة)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|صفحة جودة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} اعرض المسودة]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|صفحة جودة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} اعرض المسودة]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|صفحة جودة]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|مسوده]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} عرض الصفحه]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} مقارنه])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|مسوده]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} عرض الصفحه]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} مقارنه])",
	'revreview-selected' => "المراجعة المختارة ل'''$1:'''",
	'revreview-source' => 'مصدر المسودة',
	'revreview-stable' => 'صفحة مستقرة',
	'revreview-stable-title' => 'صفحة متشافة',
	'revreview-stable1' => 'ربما ترغب فى رؤية [{{fullurl:$1|stableid=$2}} هذه النسخة المعلمة] لترى ما إذا كانت [{{fullurl:$1|stable=1}} النسخة المستقرة] لهذه الصفحة.',
	'revreview-stable2' => 'ربما ترغب فى رؤية [{{fullurl:$1|stable=1}} النسخة المستقرة] لهذه الصفحة (لو كانت مازالت هناك واحدة).',
	'revreview-style' => 'القابلية للقراءة',
	'revreview-style-0' => 'غير مقبول',
	'revreview-style-1' => 'مقبول',
	'revreview-style-2' => 'جيدة',
	'revreview-style-3' => 'متوسطة',
	'revreview-style-4' => 'مميزة',
	'revreview-submit' => 'تقديم',
	'revreview-submitting' => 'جارى التنفيذ...',
	'revreview-finished' => 'المراجعة انتهت!',
	'revreview-successful' => "'''مراجعة [[:$1|$1]] تم التعليم عليها بنجاح. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} عرض النسخ المستقرة])'''",
	'revreview-successful2' => "'''مراجعة [[:$1|$1]] تمت إزالة علمها بنجاح.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هى محتوى الصفحة الافتراضى للمشاهدين بدلا من أحدث مراجعة.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هى مراجعات تم التحقق منها من الصفحات ويمكن ضبطها كالمحتوى الافتراضى للمشاهدين.''",
	'revreview-toggle-title' => 'عرض/إخفاء التفاصيل',
	'revreview-toolow' => 'يجب عليك على الأقل تقييم كل من المحددات بالأسفل أعلى من "غير مقبولة" لكى تعتبر المراجعة مراجعة.
لسحب تقييم مراجعة، اضبط كل الحقول ك "غير مقبولة".',
	'revreview-update' => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ المراجعة المستقرة تمت  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].<br />
'''بعض القوالب/الصور تم تحديثها: '''",
	'revreview-update-includes' => "'''بعض القوالب/الصور تم تحديثها:'''",
	'revreview-update-none' => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ المراجعة المستقرة تمت  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].",
	'revreview-update-use' => "'''ملاحظة:''' لو أن أى من هذه القوالب/الصور لديها نسخة مستقرة، إذا فهى مستخدمة بالفعل فى النسخة المستقرة لهذه الصفحة.",
	'revreview-diffonly' => "''لمراجعة الصفحة، اضغط على وصلة مراجعة \"المراجعة الحالية\" واستخدم استمارة المراجعة.''",
	'revreview-visibility' => "'''هذه الصفحة بها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]] محدثة؛ إعدادات استقرار الصفحة يمكن [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'revreview-visibility2' => "'''هذه الصفحة ليس لديها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]] محدثة؛ إعدادات استقرار الصفحة يمكن [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'revreview-revnotfound' => 'ما لقيناش النسخة القديمة من الصفحة اللى طلبتها.
لو سمحت تتأكد من اليوأرإل اللى دخلت بيه للصفحة دي.',
	'right-autoreview' => 'التعليم على المراجعات تلقائيا كمنظورة',
	'right-movestable' => 'نقل الصفحات المستقرة',
	'right-review' => 'التعليم على المراجعات كمنظورة',
	'right-stablesettings' => 'ضبط كيف يتم اختيار وعرض النسخة المستقرة',
	'right-validate' => 'التعليم على المراجعات كمتحقق منها',
	'rights-editor-autosum' => 'ترقية تلقائية',
	'rights-editor-revoke' => 'أزال حالة محرر من [[$1]]',
	'specialpages-group-quality' => 'توكيد الجودة',
	'stable-logentry' => 'ضبط النسخة المستقرة ل[[$1]]',
	'stable-logentry2' => 'أعاد ضبط النسخة المستقرة ل[[$1]]',
	'stable-logpage' => 'سجل الاستقرار',
	'stable-logpagetext' => 'هذا سجل بالتغييرات لضبط [[{{MediaWiki:Validationpage}}|النسخة المستقرة]]
لصفحات المحتوى.
قائمة بالصفحات المستقرة يمكن العثور عليها فى [[Special:StablePages|قائمة الصفحات المستقرة]].',
	'revreview-filter-all' => 'الكل',
	'revreview-filter-approved' => 'تمت الموافقة عليها',
	'revreview-filter-reapproved' => 'تكررت الموافقة عليها',
	'revreview-filter-unapproved' => 'غير موافق عليها',
	'revreview-filter-auto' => 'تلقائى',
	'revreview-filter-manual' => 'يدوى',
	'revreview-statusfilter' => 'تغيير الحاله:',
	'revreview-typefilter' => 'النوع:',
	'revreview-reviewlink' => 'مراجعه',
	'tooltip-ca-current' => 'عرض المسودة الحالية لهذه الصفحة',
	'tooltip-ca-stable' => 'عرض النسخة المستقرة لهذه الصفحة',
	'tooltip-ca-default' => 'إعدادات توكيد الجودة',
	'revreview-locked-title' => 'التعديلات يجب أن تتم مراجعتها قبل أن يتم عرضها فى هذه الصفحة!',
	'revreview-unlocked-title' => 'التعديلات لا تتطلب مراجعة قبل أن يتم عرضها فى هذه الصفحة!',
	'revreview-locked' => 'التعديلات يجب أن تتم مراجعتها قبل أن يتم عرضها فى هذه الصفحة!',
	'revreview-unlocked' => 'التعديلات لا تتطلب مراجعة قبل أن يتم عرضها فى هذه الصفحة!',
	'log-show-hide-review' => '$1 سجل المراجعة',
	'revreview-tt-review' => 'راجع الصفحة دي',
	'validationpage' => '{{ns:help}}:تحقيق الصفحة',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$messages['ast'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Revisiones marcaes',
	'flaggedrevs-desc' => 'Da la capacidá a los editores/revisores de validar revisiones y estabilizar páxines',
	'flaggedrevs-prefs-stable' => 'Amosar siempre la versión estable de les páxines de conteníu por defeutu (si hai dalguna)',
	'group-editor' => 'Editores',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Revisores',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'hist-quality' => 'versión calidable',
	'hist-stable' => 'versión vista',
	'review-diff2stable' => 'Ver los cambeos ente les revisiones estable y actual',
	'review-logentry-app' => 'revisó [[$1]]',
	'review-logentry-dis' => 'despreció una versión de [[$1]]',
	'review-logentry-id' => 'identificador de revisión $1',
	'review-logpage' => 'Rexistru de revisión',
	'review-logpagetext' => 'Esti ye un rexistru de los cambeos fechos na [[{{MediaWiki:Validationpage}}|aprobación]] de les revisiones de les páxines de conteníu.
Vete a la [[Special:ReviewedPages|llista de páxines revisaes]] pa ver una llista de páxines aprobaes.',
	'reviewer' => 'Revisor',
	'revisionreview' => 'Revisar revisiones',
	'revreview-accuracy' => 'Precisión',
	'revreview-accuracy-0' => 'Non aprobada',
	'revreview-accuracy-1' => 'Vista',
	'revreview-accuracy-2' => 'Precisa',
	'revreview-accuracy-3' => 'Bien documentada',
	'revreview-accuracy-4' => 'Destacada',
	'revreview-auto' => '(automático)',
	'revreview-auto-w' => "Tas editando la revisión estable; los cambeos van ser '''revisaos automáticamente'''.",
	'revreview-auto-w-old' => "Tas editando una revisión revisada; los cambeos van ser '''revisaos atuomáticamente'''.",
	'revreview-basic' => "Esta ye la cabera revisión [[{{MediaWiki:Validationpage}}|vista]],
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada]'l <i>$2</i>. El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador]
pue ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificáu]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambéu|cambeos}}]
{{PLURAL:$3|espera|esperen}} revisión.",
	'revreview-changed' => "'''Nun se pudo efeutuar l'aición solicitada nesta revisión de [[:$1|$1]].'''

Seique se solicitara una plantía o una imaxe cuando nun s'especificara nenguna versión específica. Esto pue asoceder si una plantía dinámica reemplaza otra plantía o imaxe según una variable que tenga camudao dende qu'empecipiaras a revisar esta páxina. Refrescar la páxina y volver a revisar pue solucionar esti problema.",
	'revreview-current' => 'Borrador',
	'revreview-depth' => 'Fondura',
	'revreview-depth-0' => 'Non aprobada',
	'revreview-depth-1' => 'Básica',
	'revreview-depth-2' => 'Moderada',
	'revreview-depth-3' => 'Alta',
	'revreview-depth-4' => 'Destacada',
	'revreview-edit' => 'Editar borrador',
	'revreview-flag' => 'Revisar esta revisión',
	'revreview-legend' => 'Calificar el conteníu de la revisión',
	'revreview-log' => 'Comentariu:',
	'revreview-main' => "Tienes que seleicionar una revisión concreta d'una páxina de conteníos pa revisala.

Vete a la [[Special:Unreviewedpages|llista de páxines ensin revisar]].",
	'revreview-newest-basic' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} cabera revisión vista]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} llistar toes]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobóse]'l
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambéu|cambeos}}] {{PLURAL:$3|necesita|necesiten}} revisión.",
	'revreview-newest-quality' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} cabera revisión calidable]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} llistar toes]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobóse]'l
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambéu|cambeos}}] {{PLURAL:$3|necesita|necesiten}} revisión.",
	'revreview-noflagged' => "Nun hai revisiones revisaes d'esta páxina, polo que seique '''nun'''' tea
[[{{MediaWiki:Validationpage}}|comprobada]] la so calidá.",
	'revreview-note' => '[[User:$1|$1]] fizo les siguientes notes al [[{{MediaWiki:Validationpage}}|revisar]] esta revisión:',
	'revreview-notes' => "Observaciones o notes p'amosar:",
	'revreview-oldrating' => 'Foi calificáu:',
	'revreview-patrol' => 'Marcar esti cambéu como supervisáu',
	'revreview-patrolled' => 'La revisión seleicionada de [[:$1|$1]] marcóse como supervisada.',
	'revreview-quality' => "Esta ye la cabera [[{{MediaWiki:Validationpage}}|quality]] revisión,
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada]'l <i>$2</i>. El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador]
pue ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificáu]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambéu|cambeos}}]
{{PLURAL:$3|espera|esperen}} revisión.",
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Vista]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver borrador]]",
	'revreview-quick-none' => "'''Actual''' (ensin revisiones revisaes)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Calidable]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver borrador]]",
	'revreview-quick-see-basic' => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver artículu estable]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|cambéu|cambeos}}])",
	'revreview-quick-see-quality' => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver artículu estable]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|cambéu|cambeos}}])",
	'revreview-selected' => "Revisión seleicionada de '''$1:'''",
	'revreview-source' => 'orixe del borrador',
	'revreview-stable' => 'Páxina estable',
	'revreview-style' => 'Llexibilidá',
	'revreview-style-0' => 'Non aprobada',
	'revreview-style-1' => 'Aceutable',
	'revreview-style-2' => 'Bona',
	'revreview-style-3' => 'Concisa',
	'revreview-style-4' => 'Destacada',
	'revreview-submit' => 'Grabar revisión',
	'revreview-finished' => '¡Revisión completa!',
	'revreview-text' => "''Les [[{{MediaWiki:Validationpage}}|versiones estables]] son el conteníu por defeutu d'una vista de páxina en cuenta de la revisión más nueva.''",
	'revreview-toolow' => 'Tienes que calificar tolos atributos d\'embaxo percima de "non aprobáu" pa qu\'una revisión seya considerada como revisada. Pa despreciar una revisión, pon tolos campos como "non aprobáu".',
	'revreview-update' => "Por favor [[{{MediaWiki:Validationpage}}|revisa]] tolos cambeos ''(amosaos embaxo)'' fechos dende que la revisión estable foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada].<br />
'''Actualizáronse delles plantíes/imáxenes:'''",
	'revreview-update-includes' => "'''Actualizáronse dalgunes plantíes/imáxenes:'''",
	'revreview-update-none' => "Por favor [[{{MediaWiki:Validationpage}}|revisa]] tolos cambeos ''(amosaos embaxo)'' fechos dende que la versión estable foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada].",
	'revreview-visibility' => "'''Esta páxina tien una [[{{MediaWiki:Validationpage}}|versión estable]]; los sos parámetros puen ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configuraos].'''",
	'revreview-revnotfound' => "La revisión antigua de la páxina que solicitasti nun se pudo atopar. Por favor comprueba l'URL qu'usasti p'acceder a esta páxina.",
	'right-movestable' => 'Treslladar páxines estables',
	'right-review' => 'Marcar revisiones como vistes',
	'rights-editor-autosum' => 'autopromocionáu',
	'rights-editor-revoke' => "revocó l'estatus d'editor a [[$1]]",
	'stable-logentry' => 'configuró la versión estable de [[$1]]',
	'stable-logentry2' => 'restablecer el rexistru de les versiones estables de [[$1]]',
	'stable-logpage' => 'Rexistru de versiones estables',
	'stable-logpagetext' => 'Esti ye un rexistru de los cambeos fechos na configuración de la [[{{MediaWiki:Validationpage}}|versión estable]]
de les páxines de conteníu.
Pue atopase una llista de les páxines estabilizaes na [[Special:StablePages|llista de páxines estables]].',
	'revreview-filter-manual' => 'Manual',
	'revreview-typefilter' => 'Triba:',
	'tooltip-ca-current' => "Amuesa'l borrador actual d'esta páxina",
	'tooltip-ca-stable' => "Amuesa la versión estable d'esta páxina",
	'tooltip-ca-default' => 'Parámetros del aseguramientu de calidá',
	'validationpage' => "{{ns:help}}:Validación d'artículos",
);

/** Kotava (Kotava) */
$messages['avk'] = array(
	'revreview-revnotfound' => 'Abdif siatos ke batu bu me zo rodimtrasir. Ta vansara va batu bu va faveyene URL mane ageltal.',
);

/** Azerbaijani (Azərbaycan) */
$messages['az'] = array(
	'revreview-revnotfound' => 'Səhifənin istədiyiniz köhnə versiyası tapıla bilmir.
Xahiş edirik, URL ünvanını yoxlayasınız.',
);

/** Samogitian (Žemaitėška) */
$messages['bat-smg'] = array(
	'revreview-revnotfound' => 'Nuorima poslapė versėjė narasta. Patėkrėnkėt URL, katro patekuot i šėta poslapi.',
);

/** Southern Balochi (بلوچی مکرانی)
 * @author Mostafadaneshvar
 */
$messages['bcc'] = array(
	'editor' => 'اصلاح گر',
	'flaggedrevs' => 'بازبینی ان نشان هشتگین',
	'flaggedrevs-desc' => 'اصلاح کنوک و مرور کنوکانء اجارت هلیتش تا بازبنی و صفحات ثابتء تایید کنت.',
	'flaggedrevs-pref-UI-0' => 'چه دستبر کاربری نسخه ثابت گون جزییات استفاده کن',
	'flaggedrevs-pref-UI-1' => 'چه دستبر کاربری نسخه ثابت ساده استفاده کن',
	'flaggedrevs-prefs-stable' => 'یک سر نسخه ثاثت چه محتوای صفحات په طور پیشفرض پیش دار (اگر که هست اتن)',
	'flaggedrevs-prefs-watch' => 'اضافه کن صفحاتی که من بازبینی کتگنت ته منی لیست چارگ',
	'group-editor' => 'اصلاح کنوکان',
	'group-editor-member' => 'اصلاح کنوک',
	'group-reviewer' => 'بازبینی کنوکان',
	'group-reviewer-member' => 'بازبینی کنوک',
	'grouppage-editor' => '{{ns:project}}:اصلاح کنوک',
	'grouppage-reviewer' => '{{ns:project}}:بازبینی کنوک',
	'hist-draft' => 'بازبینی پیش نویس',
	'hist-quality' => 'بازبینی کیفیت',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}}تایید بوت] گون [[User:$3|$3]]',
	'hist-stable' => 'بازبینی رویت بیتگ',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} رویت بیتگ] گون [[User:$3|$3]]',
	'review-diff2stable' => 'به گند تغییراتء بین بازبینی ان ثابت و هنوکین',
	'review-logentry-app' => 'بازبینی بوت  [[$1]]',
	'review-logentry-dis' => 'یک نسخه ای چه [[$1]] منسوخ کت',
	'review-logentry-id' => 'بازبینی شناسگ  $1',
	'review-logentry-diff' => 'پرک گون نسخه ثابت',
	'review-logpage' => 'ورود بازبینی',
	'reviewer' => 'بازبینی کنوک',
	'revisionreview' => 'بازبینی اصلاحات',
	'revreview-accuracy' => 'درستی',
	'revreview-accuracy-0' => 'تایید به بیتگین',
	'revreview-accuracy-1' => 'رویت بیتگ',
	'revreview-accuracy-2' => 'درست',
	'revreview-accuracy-3' => 'شرین منبع بوتیگین',
	'revreview-accuracy-4' => 'نمایان',
	'revreview-approved' => 'تایید انت',
	'revreview-auto' => '(اتوماتیک)',
	'revreview-auto-w' => "شما نسخه ثابتیء اصلاح کنیت؛تغییرات '''اتوماتیکی بازبینی بنت''.",
	'revreview-auto-w-old' => "شما نسخه بازبینیء اصلاح کنیت؛تغییرات '''اتوماتیکی بازبینی بنت''.",
	'revreview-current' => 'پیش نویس',
	'revreview-depth' => 'عمق',
	'revreview-depth-0' => 'تایید نه بوتت',
	'revreview-depth-1' => 'اساسی',
	'revreview-depth-2' => 'متعادل',
	'revreview-depth-3' => 'بالاد',
	'revreview-depth-4' => 'نمایان',
	'revreview-draft-title' => 'مقاله پیش نویس',
	'revreview-edit' => 'اصلاح پیش نویس',
	'revreview-flag' => 'ای بازبینی اصلاح کن',
	'revreview-invalid' => "'''نامعتبراین هدف:''' هچ [[{{MediaWiki:Validationpage}}|بازبینی بوتگین]] نسخه مطابق انت گون داتگین شناسگ.",
	'revreview-legend' => 'محتوا بازبینی رده بندی کن',
	'revreview-log' => 'نظر:',
	'revreview-note' => '[[User:$1|$1]]جهلیگین یادداشتان هشتت په [[{{MediaWiki:Validationpage}}|reviewing]] ای بازبینی:',
	'revreview-notes' => 'مشاهدات یا یادداشتان په پیش دارگ:',
	'revreview-oldrating' => 'شی درجه بندی بوتت:',
	'revreview-patrol' => ' ای تغییر نشان کن په داب گشتین',
	'revreview-patrol-title' => 'نشان کن په داب گشتین',
	'revreview-patrolled' => 'انتخابی بازبینی چه [[:$1|$1]] نشان بوتت په داب نظارت بوتگین',
	'revreview-quality-title' => 'مقاله کیفیت',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|رویت بیتگ مقاله]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}}به گند پیش نویس]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|رویت بیتگرویت بیتگ مقاله]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} به گند پیش نویس]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|رویت بیتگ مقاله]]'''",
	'revreview-quick-invalid' => "'''نامعتبر شناسه بازبینی'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|هنوکین بازبینی]]''' (بی بازبینی)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|کیفیت مقاله]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} به گند پیش نویسء]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|کیفیت مقاله]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} به گند پیش نویسء]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|کیفیت مقاله]]'''",
	'revreview-quick-see-basic' => "'''پیش نویس''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}}دیستن مقالهء]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}}مقایسه])",
	'revreview-quick-see-quality' => "'''پیش نویس''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} دیستن مقاله]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} مقایسه])",
	'revreview-selected' => "انتخاب بوتگین بازبینی  '''$1:'''",
	'revreview-source' => 'منبع پیش نویس',
	'revreview-stable' => 'صفحه ثابت',
	'revreview-stable-title' => 'رویت بیتگ مقاله',
	'revreview-stable2' => 'شما شاید بلوٹیت بگندیت [{{fullurl:$1|stable=1}} نسخه ثابتی]چه ای صفحه (اگر که هستن).',
	'revreview-style' => 'وانایی',
	'revreview-style-0' => 'تایید نه بیتگ',
	'revreview-style-1' => 'قابل قبول',
	'revreview-style-2' => 'هوب',
	'revreview-style-3' => 'مختصر',
	'revreview-style-4' => 'نمایان',
	'revreview-submit' => 'بازبینی دیم دی',
	'revreview-successful' => "'''انتخابی بازبینی [[:$1|$1]]گون موفقیت نشان بوت. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} بچار کل نسخ نشان بوتگینء])'''",
	'revreview-successful2' => "'''انتخاب بوتگین باز بینی [[:$1|$1]] گون موفقیت بی نشان بوت.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|نسخ ثابت]] پیشفرضین محتوای صفحه په چاروکاننت دات نوکین بازبینی آن..''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}ثابت نسخه]]بازبینی آن صفحات چک بیتنت و توننت به عنوان محتوای پیش فرض په بینندگان تنظیم بنت.''",
	'revreview-toggle-title' => 'پیش دار/پناه کن جزییاتء',
	'revreview-toolow' => 'شما بایدن حداقل هر یکی چه جهلگین نشانانء درجه بللیت گیشتر چه "unapproved" تا یک بازبینیء په داب چارتگین بیت.
په نسخ کتن یک بازبینی کل فیلدانء په داب "unapproved" نشان کن.',
	'revreview-update-includes' => "'''لهتی تمپلتان/تصاویر په روچ بیتگین:'''",
	'revreview-update-use' => "'''توجه:''' اگر هر یکی چه ای تمپلتان/تصاویر یک ثابتین نسخه ای هست،اچه آیی الان ته نسخه ثابت ای صفحه کامرز بیت.",
	'revreview-revnotfound' => 'کدیمی بازبینی چه ای صفحه که شما لوٹیت ودیگ نه بوت. لطفا URL که شما په رستن په ای صفحه استفاده کنیت کنترلی کنیت.',
	'right-autoreview' => 'اتوماتیکی نشان کن بازبینیء په عنوان رویت بیتگین',
	'right-movestable' => 'صفحات ثابت جاه په جاه کن',
	'right-review' => 'بازبینی آن په عنوان رویت بیتگین نشان کن',
	'right-stablesettings' => 'تنظیم کن چطور نسخه ثابت انتخاب بوت  پیش دارگ بیت',
	'right-validate' => 'نشان کن بازبینی انء په داب معتبرین',
	'rights-editor-autosum' => 'اتوماتیکی دراتک',
	'rights-editor-revoke' => 'حالت اصلاح گرء بزور چه [[$1]]',
	'specialpages-group-quality' => 'اطمینان کیفیت',
	'stable-logentry' => 'نسخه ثابت تنظیم بوتگین په [[$1]]',
	'stable-logentry2' => 'پد ترین نسخه ثابت په [[$1]]',
	'stable-logpage' => 'آمار ثبات',
	'revreview-filter-all' => 'کل',
	'revreview-filter-approved' => 'تایید',
	'revreview-filter-reapproved' => 'دگه تایید بوت',
	'revreview-filter-unapproved' => 'تایید نه بوتگین',
	'revreview-filter-auto' => 'اتوماتیک',
	'revreview-filter-manual' => 'دستی',
	'revreview-statusfilter' => 'وضعیت:',
	'revreview-typefilter' => 'نوع:',
	'tooltip-ca-current' => 'به گند هنوکین پیش نویس ای صفحهء',
	'tooltip-ca-stable' => 'به گند نسخه ثابت ای صفحهء',
	'tooltip-ca-default' => 'تنضیمات اطمینان کیفیت',
	'revreview-tt-review' => 'ای صفحهء بازبینی کن',
	'validationpage' => '{{ns:help}}: اعتبار مقاله',
);

/** Bikol Central (Bikol Central)
 * @author Filipinayzd
 */
$messages['bcl'] = array(
	'hist-quality' => 'kalidad',
	'revreview-depth' => 'Rarom',
	'revreview-revnotfound' => 'Dai nahanap an lumang pagpakaraháy kan pahina na hinagad mo. Sosogon tabì an URL na ginamit mo sa pagabót sa pahinang ini.',
);

/** Belarusian (Беларуская) */
$messages['be'] = array(
	'revreview-revnotfound' => 'Не ўдалося знайсці ранейшую версію гэтага артыкула, па якую вы звярталіся.
Праверце URL, праз які вы спрабавалі адкрыць старонку.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'editor' => 'Рэдактар',
	'flaggedrevs' => 'Пазначаныя вэрсіі',
	'flaggedrevs-backlog' => "Існуе адставаньне ў [[Special:OldReviewedPages|праверцы рэдагаваньняў]] правераных старонак. '''Зьвярніце ўвагу!'''",
	'flaggedrevs-watched-pending' => "Існуе адставаньне ў [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} праверцы рэдагаваньняў] правераных старонак у Вашым сьпісе назіраньня. '''Зьвярніце ўвагу!'''",
	'flaggedrevs-desc' => 'Дае магчымасьць рэдактарам і рэцэнзэнтам правяраць вэрсіі і стабілізаваць старонкі',
	'flaggedrevs-pref-UI' => 'Інтэрфэйс стабільных вэрсіяў:',
	'flaggedrevs-pref-UI-0' => 'Выкарыстоўваць падрабязны інтэрфэйс стабільных вэрсій',
	'flaggedrevs-pref-UI-1' => 'Выкарыстоўваць просты інтэрфэйс стабільных вэрсій',
	'prefs-flaggedrevs' => 'Стабільнасьць',
	'flaggedrevs-prefs-stable' => 'Заўсёды паказваць стабільную вэрсію старонак зьместу па змоўчваньні (калі яна існуе)',
	'flaggedrevs-prefs-watch' => 'Дадаваць правераныя мной старонкі ў мой сьпіс назіраньня',
	'group-editor' => 'Рэдактары',
	'group-editor-member' => 'рэдактар',
	'group-reviewer' => 'Рэцэнзэнты',
	'group-reviewer-member' => 'рэцэнзэнт',
	'grouppage-editor' => '{{ns:project}}:Рэдактар',
	'grouppage-reviewer' => '{{ns:project}}:Рэцэнзэнт',
	'group-autoreview' => 'Аўтаматычныя рэцэнзэнты',
	'group-autoreview-member' => 'аўтаматычны рэцэнзэнт',
	'grouppage-autoreview' => '{{ns:project}}:Аўтаматычны рэцэнзэнт',
	'hist-draft' => 'чарнавая вэрсія',
	'hist-quality' => 'якасная вэрсія',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} правераная] {{GENDER:$3|ўдзельнікам|ўдзельніцай}} [[User:$3|$3]]',
	'hist-stable' => 'прагледжаная вэрсія',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} прагледжаная] {{GENDER:$3|ўдзельнікам|ўдзельніцай}} [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} прагледжаная аўтаматычна]',
	'review-diff2stable' => 'Паказаць розьніцу паміж стабільнай і цяперашняй вэрсіямі',
	'review-logentry-app' => 'праверыў вэрсію $2 старонкі [[$1]]',
	'review-logentry-dis' => 'састарэлая вэрсія $2 старонкі [[$1]]',
	'review-logentry-id' => 'прагляд',
	'review-logentry-diff' => 'розьніца са стабільнай',
	'review-logpage' => 'Журнал праверак',
	'review-logpagetext' => 'Гэта журнал зьменаў вэрсіяў [[{{MediaWiki:Validationpage}}|зацьверджаных]] статусаў для старонак са зьместам.
Глядзіце [[Special:ReviewedPages|сьпіс правераных старонак]].',
	'reviewer' => 'Рэцэнзэнт',
	'revisionreview' => 'Рэцэнзаваць вэрсіі',
	'revreview-accuracy' => 'Дакладнасьць',
	'revreview-accuracy-0' => 'Не зацьверджаная',
	'revreview-accuracy-1' => 'Прагледжаная',
	'revreview-accuracy-2' => 'Дакладная',
	'revreview-accuracy-3' => 'Са спасылкамі на крыніцы',
	'revreview-accuracy-4' => 'Выбраная',
	'revreview-approved' => 'Зацьверджана',
	'revreview-auto' => '(аўтаматычна)',
	'revreview-auto-w' => "Вы рэдагуеце стабільную вэрсію, зьмены будуць '''аўтаматычна пазначаны як правераныя'''.",
	'revreview-auto-w-old' => "Вы рэдагуеце правераную вэрсію, зьмены будуць '''аўтаматычна пазначаны як правераныя'''.",
	'revreview-basic' => 'Гэта апошняя [[{{MediaWiki:Validationpage}}|прагледжаная]] вэрсія, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.
У [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чарнавой вэрсіі] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|зьмена патрабуе|зьмены патрабуюць|зьменаў патрабуюць}}] рэцэнзаваньня.',
	'revreview-basic-i' => 'Гэта апошняя [[{{MediaWiki:Validationpage}}|прагледжаная]] вэрсія, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.
У [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чарнавіку] ёсьць [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} зьмены ў шаблёнах/файлах], якія патрабуюць рэцэнзаваньня.',
	'revreview-basic-old' => 'Гэта [[{{MediaWiki:Validationpage}}|прагледжаная]] вэрсія ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} сьпіс цалкам]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.
Маглі быць зроблены новыя [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} рэдагаваньні].',
	'revreview-basic-same' => 'Гэта апошняя [[{{MediaWiki:Validationpage}}|прагледжаная]] вэрсія ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} сьпіс цалкам]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Прагледжаная вэрсія] гэтай старонкі, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>, была заснавана на гэтай вэрсіі.',
	'revreview-blocked' => 'Вы ня можаце рэцэнзаваць гэтую вэрсію, таму што Ваш рахунак заблякаваны ([$1 падрабязнасьці])',
	'revreview-changed' => "'''Запытанае дзеяньне ня можа быць зьдзейсьненае на гэтай вэрсіі старонкі [[:$1|$1]].'''

Шаблён альбо выява маглі былі запытаныя, калі не была вызначаная вэрсія.
Гэта магло здарыцца, калі дынамічны шаблён утрымлівае іншы шаблён альбо файл, якія залежаць ад зьменнай, якая зьмянілася з пачатку рэцэнзаваньня гэтай старонкі.
Абнавіце старонку і пачніце рэцэнзаваньне зноў, гэта можа вырашыць гэту праблему.",
	'revreview-current' => 'Чарнавік',
	'revreview-depth' => 'Паўната',
	'revreview-depth-0' => 'Не зацьверджаная',
	'revreview-depth-1' => 'Базавая',
	'revreview-depth-2' => 'Сярэдняя',
	'revreview-depth-3' => 'Высокая',
	'revreview-depth-4' => 'Выбраная',
	'revreview-draft-title' => 'Чарнавік старонкі',
	'revreview-edit' => 'Рэдагаваць чарнавік',
	'revreview-editnotice' => "'''Рэдагаваньні гэтай старонкі будуць уключаны ў [[{{MediaWiki:Validationpage}}|стабільную вэрсію]] пасьля таго, як іх прарэцэнзуе удзельнік з адпаведнымі правамі.'''",
	'revreview-flag' => 'Праверыць гэту вэрсію',
	'revreview-edited' => "'''Рэдагаваньні будуць уключаны ў [[{{MediaWiki:Validationpage}}|стабільную вэрсію]] пасьля таго, як іх прарэцэнзуе удзельнік з адпаведнымі правамі.'''
''' ''Чарнавік'' паказаны ніжэй.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|зьмена патрабуе|зьмены патрабуюць|зьмены патрабуюць}}] рэцэнзаваньня.",
	'revreview-invalid' => "'''Няслушная мэта:''' няма [[{{MediaWiki:Validationpage}}|рэцэнзаванай]] вэрсіі, якая адпавядае пададзенаму ідэнтыфікатару.",
	'revreview-legend' => 'Адзнака зьместу вэрсіі',
	'revreview-log' => 'Камэнтар:',
	'revreview-main' => 'Вам неабходна выбраць адну з вэрсіяў старонкі для рэцэнзаваньня.

Глядзіце [[Special:Unreviewedpages|сьпіс нерэцэнзаваных старонак]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Апошняя прагледжаная вэрсія] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} сьпіс цалкам]) была [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|зьмена патрабуе|зьмены патрабуюць|зьменаў патрабуюць}}] рэцэнзаваньня.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Апошняя прагледжаная вэрсія] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} сьпіс цалкам]) была [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.
Патрабуецца праверка зьменаў у [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} шаблёнах/файлах].',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Апошняя якасная вэрсія] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} сьпіс цалкам]) была [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|зьмена патрабуе|зьмены  патрабуюць|зьменаў патрабуюць}}] рэцэнзаваньня.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Апошняя якасная вэрсія] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} сьпіс цалкам]) была [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.
Патрабуецца праверка зьменаў у [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} шаблёнах/файлах].',
	'revreview-noflagged' => "У гэтай старонкі няма рэцэнзаваных вэрсіяў, таму, верагодна, яе якасьць '''не''' [[{{MediaWiki:Validationpage}}|правяралася]].",
	'revreview-note' => '[[User:$1|$1]] {{GENDER:$1|зрабіў|зрабіла}} наступныя камэнтары [[{{MediaWiki:Validationpage}}|пад час рэцэнзаваньня]] гэтай вэрсіі:',
	'revreview-notes' => 'Назіраньні і камэнтары для паказу:',
	'revreview-oldrating' => 'Атрыманая адзнака:',
	'revreview-patrol' => 'Пазначыць гэтую зьмену як патруляваную',
	'revreview-patrol-title' => 'Пазначыць як патруляваную',
	'revreview-patrolled' => 'Выбраная вэрсія [[:$1|$1]] была пазначаная як патруляваная.',
	'revreview-quality' => 'Гэта апошняя [[{{MediaWiki:Validationpage}}|якасная]] вэрсія, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная]  <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|зьмена|зьмены|зьменаў}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чарнавіка] {{PLURAL:$3|патрабуе|патрабуюць|патрабуюць}} рэцэнзаваньня.',
	'revreview-quality-i' => 'Гэта апошняя [[{{MediaWiki:Validationpage}}|якасная]] вэрсія, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.
У [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чарнавіку] ёсьць [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} зьмены ў шаблёнах/файлах], якія патрабуюць рэцэнзаваньня.',
	'revreview-quality-old' => 'Гэта [[{{MediaWiki:Validationpage}}|якасная]] вэрсія 
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} сьпіс цалкам]), 
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.
Маглі быць зроблены новыя [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} зьмены].',
	'revreview-quality-same' => 'Гэта апошняя [[{{MediaWiki:Validationpage}}|якасная]] вэрсія
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} сьпіс цалкам]),
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Якасная вэрсія] гэтай старонкі, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаная] <i>$2</i>, была заснавана на гэтай вэрсіі.',
	'revreview-quality-title' => 'Якасная старонка',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Прагледжаная старонка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} паказаць чарнавік]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Прагледжаная старонка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} паказаць чарнавік]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Прагледжаная вэрсія]]'''",
	'revreview-quick-invalid' => "'''Няслушны ідэнтыфікатар вэрсіі'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Цяперашняя вэрсія]]''' (не рэцэнзавалася)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Якасная старонка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} паказаць чарнавік]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Якасная старонка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} паказаць чарнавік]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Якасная старонка]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Чарнавік]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} паказаць старонку]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} параўнаць])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Чарнавік]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} паказаць старонку]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} параўнаць])",
	'revreview-selected' => "Выбраная вэрсія '''$1:'''",
	'revreview-source' => 'крынічны тэкст чарнавіка',
	'revreview-stable' => 'Стабільная старонка',
	'revreview-stable-title' => 'Прагледжаная старонка',
	'revreview-stable1' => 'Верагодна, Вы жадаеце праглядзець [{{fullurl:$1|stableid=$2}} гэту пазначаную вэрсію] і праверыць, ці зьяўляецца яна [{{fullurl:$1|stable=1}} стабільнай вэрсіяй] гэтай старонкі.',
	'revreview-stable2' => 'Верагодна, Вы жадаеце праглядзець гэту [{{fullurl:$1|stable=1}} стабільную вэрсію] гэтай старонкі (калі яна існуе).',
	'revreview-style' => 'Чытальнасьць',
	'revreview-style-0' => 'Не зацьверджаная',
	'revreview-style-1' => 'Прыймальная',
	'revreview-style-2' => 'Добрая',
	'revreview-style-3' => 'Сьціслая',
	'revreview-style-4' => 'Выбраная',
	'revreview-submit' => 'Даслаць',
	'revreview-submitting' => 'Адпраўка…',
	'revreview-finished' => 'Праверка скончана!',
	'revreview-failed' => 'Рэцэнзаваньне не атрымалася!',
	'revreview-successful' => "'''Вэрсія [[:$1|$1]] пасьпяхова пазначана. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} паказаць стабільныя вэрсіі])'''",
	'revreview-successful2' => "'''З вэрсіі [[:$1|$1]] было пасьпяхова зьнятае пазначэньне.'''",
	'revreview-text' => "''Па змоўчваньні для чытачоў паказваюцца [[{{MediaWiki:Validationpage}}|стабільныя вэрсіі]] старонак замест найнавейшых.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Стабільныя вэрсіі]] — правераныя вэрсіі старонак, якія могуць паказвацца чытачам па змоўчваньні.''",
	'revreview-toggle-title' => 'паказаць/схаваць падрабязнасьці',
	'revreview-toolow' => 'Неабходна адзначыць кожны атрыбут адзнакай вышэй за «не адзначаная», каб вэрсія старонкі лічылася рэцэнзаванай.
Каб зьняць адзнаку, устанавіце ўсе значэньні ў «не адзначаная».',
	'revreview-update' => "Калі ласка, [[{{MediaWiki:Validationpage}}|прарэцэнзуйце]] усе зьмены ''(паказаныя ніжэй)'' зробленыя пасьля  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаньня] стабільнай вэрсіі.<br />
'''Некаторыя шаблёны/файлы былі абноўленыя:'''",
	'revreview-update-includes' => "'''Некаторыя шаблёны/файлы былі абноўленыя:'''",
	'revreview-update-none' => "Калі ласка, [[{{MediaWiki:Validationpage}}|прарэцэнзуйце]] ўсе зьмены ''(паказаныя ніжэй)'' зробленыя пасьля [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} зацьверджаньня] стабільнай вэрсіі.",
	'revreview-update-use' => "'''ЗАўВАГА:''' Калі якія-небудзь з гэтых шаблёнаў/файлаў маюць стабільную вэрсію, то яна ўжо выкарыстоўваецца ў стабільнай вэрсіі гэтай старонкі.",
	'revreview-diffonly' => "''Каб рэцэнзаваць гэтую старонку, націсьніце спасылку «цяперашняя вэрсія» і выкарыстоўвайце форму рэцэнзаваньня.''",
	'revreview-visibility' => "'''Гэтая старонка мае новую [[{{MediaWiki:Validationpage}}|стабільную вэрсію]]; можна [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} зьмяніць] устаноўкі стабільнай вэрсіі.'''",
	'revreview-visibility2' => "'''Гэтая старонка мае састарэлую [[{{MediaWiki:Validationpage}}|стабільную вэрсію]]; можна [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} зьмяніць] устаноўкі стабільнай вэрсіі.'''",
	'revreview-visibility3' => "'''Гэтая старонка ня мае [[{{MediaWiki:Validationpage}}|стабільнай вэрсіі]]; можна [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} зьмяніць] устаноўкі стабільнай вэрсіі.'''",
	'revreview-revnotfound' => 'Ранейшая вэрсія гэтай старонкі ня знойдзеная. Праверце спасылку, празь якую Вы спрабавалі перайсьці на гэтую старонку.',
	'right-autoreview' => 'аўтаматычная адзнака вэрсій старонак як прагледжаных',
	'right-movestable' => 'перанос стабільных старонак',
	'right-review' => 'пазначэньне вэрсіяў як прагледжаных',
	'right-stablesettings' => 'канфігурацыя выбару і паказу стабільнай вэрсіі',
	'right-validate' => 'пазначэньне вэрсіяў як правераных',
	'rights-editor-autosum' => 'аўтаматычна прызначаны',
	'rights-editor-revoke' => 'зьняты статус рэдактара з [[$1]]',
	'specialpages-group-quality' => 'Падтрымка якасьці',
	'stable-logentry' => 'сканфігураваная стабільная вэрсія для [[$1]]',
	'stable-logentry2' => 'скінутая стабільная вэрсія для [[$1]]',
	'stable-logpage' => 'Журнал стабілізацыі',
	'stable-logpagetext' => 'Гэты журнал зьменаў канфігурацыі [[{{MediaWiki:Validationpage}}|стабільных вэрсіяў]] старонак.
Сьпіс стабільных вэрсіяў можна знайсьці [[Special:StablePages|тут]].',
	'revreview-filter-all' => 'усе',
	'revreview-filter-stable' => 'стабільная',
	'revreview-filter-approved' => 'Зацьверджаныя',
	'revreview-filter-reapproved' => 'Зноў зацьверджаныя',
	'revreview-filter-unapproved' => 'Не зацьверджаныя',
	'revreview-filter-auto' => 'Аўтаматычна',
	'revreview-filter-manual' => 'Уручную',
	'revreview-statusfilter' => 'Зьмена статусу:',
	'revreview-typefilter' => 'Тып:',
	'revreview-levelfilter' => 'Узровень:',
	'revreview-lev-sighted' => 'прагледжаная',
	'revreview-lev-quality' => 'якасная',
	'revreview-lev-pristine' => 'першапачатковая',
	'revreview-reviewlink' => 'рэцэнзаваць',
	'tooltip-ca-current' => 'Паказаць цяперашні чарнавік гэтай старонкі',
	'tooltip-ca-stable' => 'Паказаць стабільную вэрсію гэтай старонкі',
	'tooltip-ca-default' => 'Устаноўкі падтрымкі якасьці',
	'revreview-locked-title' => 'Зьмены павінны быць рэцэнзаваныя, перад тым, як будуць паказаныя на гэтай старонцы!',
	'revreview-unlocked-title' => 'Зьмены не патрабуюць рэцэнзаваньня перад паказам на гэтай старонцы.',
	'revreview-locked' => 'Зьмены павінны быць [[{{MediaWiki:Validationpage}}|рэцэнзаваныя]] перад тым, як будуць паказаныя на гэтай старонцы.',
	'revreview-unlocked' => 'Зьмены не патрабуюць [[{{MediaWiki:Validationpage}}|рэцэнзаваньня]] перад паказам на гэтай старонцы.',
	'log-show-hide-review' => '$1 журнал рэцэнзаваньняў',
	'revreview-tt-review' => 'Рэцэнзаваць гэтую старонку',
	'validationpage' => '{{ns:help}}:Праверка старонак',
);

/** Bulgarian (Български)
 * @author Borislav
 * @author DCLXVI
 */
$messages['bg'] = array(
	'editor' => 'Редактор',
	'flaggedrevs-desc' => 'Дава възможността на редактори/рецензенти да одобряват версии и да определят страници като устойчиви',
	'group-editor' => 'Редактори',
	'group-editor-member' => 'Редактор',
	'group-reviewer' => 'Рецензенти',
	'group-reviewer-member' => 'Рецензент',
	'grouppage-editor' => '{{ns:project}}:Редактор',
	'grouppage-reviewer' => '{{ns:project}}:Рецензент',
	'hist-quality' => 'качествена версия',
	'review-diff2stable' => 'Преглед на разликите между устойчивата и текущата версия',
	'review-logentry-id' => 'номер на редакция $1',
	'reviewer' => 'Рецензент',
	'revreview-accuracy' => 'Точност',
	'revreview-accuracy-0' => 'Неодобрена',
	'revreview-accuracy-1' => 'Прегледана',
	'revreview-accuracy-2' => 'Точна',
	'revreview-accuracy-3' => 'Добри източници',
	'revreview-accuracy-4' => 'Избрана',
	'revreview-auto' => '(автоматично)',
	'revreview-current' => 'Чернова',
	'revreview-depth' => 'Пълнота',
	'revreview-depth-0' => 'Неодобрена',
	'revreview-depth-1' => 'Начална',
	'revreview-depth-2' => 'Средна',
	'revreview-depth-3' => 'Висока',
	'revreview-depth-4' => 'Избрана',
	'revreview-draft-title' => 'Чернова на статия',
	'revreview-edit' => 'Редактиране на черновата',
	'revreview-legend' => 'Оценка на съдържанието на версията',
	'revreview-log' => 'Коментар:',
	'revreview-oldrating' => 'Досегашна оценка:',
	'revreview-patrol' => 'Отбелязване на промяната като проверена',
	'revreview-patrol-title' => 'Отбелязване като проверена',
	'revreview-patrolled' => 'Избраната версия на [[:$1|$1]] беше отбелязана като проверена.',
	'revreview-quick-invalid' => "'''Невалиден номер на версия'''",
	'revreview-quick-none' => "'''Текуща''' (няма рецензирани версии)",
	'revreview-quick-see-basic' => "'''Чернова''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} преглед на страницата]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} сравняване])",
	'revreview-quick-see-quality' => "'''Чернова''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} преглед на страницата]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} сравняване])",
	'revreview-selected' => "Избрана редакция на '''$1:'''",
	'revreview-source' => 'изходен код на черновата',
	'revreview-stable' => 'Устойчива',
	'revreview-style' => 'Четимост',
	'revreview-style-0' => 'Неодобрена',
	'revreview-style-1' => 'Приемлива',
	'revreview-style-2' => 'Добра',
	'revreview-style-3' => 'Издържана',
	'revreview-style-4' => 'Избрана',
	'revreview-submit' => 'Пращане на рецензията',
	'revreview-toggle-title' => 'показване/скриване на детайли',
	'revreview-update-includes' => "'''Някои шаблони/файлове бяха обновени:'''",
	'revreview-revnotfound' => 'Желаната стара версия на страницата не беше открита. Проверете адреса, който използвахте за достъп до страницата.',
	'right-movestable' => 'Преместване на устойчиви страници',
	'rights-editor-revoke' => 'отне правата на редактор на [[$1]]',
	'stable-logpage' => 'Дневник на устойчивите версии',
	'revreview-filter-all' => 'Всички',
	'revreview-filter-auto' => 'Автоматично',
	'revreview-filter-manual' => 'Ръчно',
	'revreview-statusfilter' => 'Статут:',
	'revreview-typefilter' => 'Тип:',
	'tooltip-ca-current' => 'Преглед на текущата чернова на страницата',
	'tooltip-ca-stable' => 'Преглед на устойчивата версия на страницата',
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Zaheen
 */
$messages['bn'] = array(
	'editor' => 'সম্পাদক',
	'flaggedrevs' => 'চিহ্নিত সংশোধনসমূহ',
	'group-editor' => 'সম্পাদকগণ',
	'group-editor-member' => 'সম্পাদক',
	'group-reviewer' => 'নিরীক্ষকগণ',
	'group-reviewer-member' => 'নিরীক্ষক',
	'grouppage-editor' => '{{ns:project}}:সম্পাদক',
	'grouppage-reviewer' => '{{ns:project}}:নিরীক্ষক',
	'hist-quality' => 'কোয়ালিটি সংশোধন',
	'hist-stable' => 'সাইট করা সংশোধন',
	'review-logentry-app' => '[[$1]] পর্যালোচনা করা হয়েছে',
	'review-logpage' => 'পর্যালোচনার লগ',
	'review-logpagetext' => 'এটি পাতাটি সংশোধনসমূহের পরিবর্তনগুলোর [[{{MediaWiki:Validationpage}}|অনুমোদনের অবস্থার]] লগ।
অনুমোদিত পাতার তালিকা দেখতে [[Special:ReviewedPages|পর্যালোচিত পাতার তালিকা]] দেখুন।',
	'reviewer' => 'নিরীক্ষক',
	'revisionreview' => 'সংশোধনগুলি পর্যালোচনা করুন',
	'revreview-accuracy' => 'প্রাসঙ্গিকতা',
	'revreview-accuracy-0' => 'অননুমদিত',
	'revreview-accuracy-1' => 'সাইট করা হয়েছে',
	'revreview-accuracy-2' => 'হুবুহু',
	'revreview-accuracy-3' => 'ভালো তথ্যসূত্র যোগ করা হয়েছে',
	'revreview-accuracy-4' => 'ফিচার করা হয়েছে',
	'revreview-approved' => 'অনুমোদিত',
	'revreview-auto' => '(সয়ংক্রিয়)',
	'revreview-changed' => "'''[[:$1|$1]]-এর এই সংশোধনটির উপর অনুরোধকৃত কাজটি সম্পাদন করা যায়নি'''

কোন নির্দিষ্ট সংস্করণ নির্দেশ না করেই একটি টেম্পলেট বা ছবি হয়ত অনুরোধ করা হয়েছে। যদি কোন চলমান টেম্পলেট কোন একটি ভ্যারিয়েবলের উপর নির্ভর করে আরেকটি টেম্পলেট বা ছবিকে অন্তর্ভুক্ত করে, এবং সেই ভ্যারিয়েবলটি যদি আপনি পর্যালোচনা শুরু করার পর পরিবর্তিত হয়ে থাকে, তবে এমনটি ঘটতে পারে।
পাতাটি রিফ্রেশ করে পুনরায় পর্যালোচনা করলে সমস্যাটির সমাধান হতে পারে।",
	'revreview-current' => 'খসড়া',
	'revreview-depth' => 'গভীরতা',
	'revreview-depth-0' => 'অননুমদিত',
	'revreview-depth-1' => 'সাধারণ',
	'revreview-depth-2' => 'মুটামোটি',
	'revreview-depth-3' => 'উচ্চ',
	'revreview-depth-4' => 'ফিচার করা হয়েছে',
	'revreview-edit' => 'খসড়া সম্পাদনা করুন',
	'revreview-flag' => 'এই সংশোধনটি পর্যালোচনা করুন',
	'revreview-legend' => 'সংশোধনের বিষয়বস্তুর রেটিং দিন',
	'revreview-log' => 'মন্তব্য:',
	'revreview-main' => 'আপনাকে অবশ্যই কোন একটি বিষয়বস্তু পাতা থেকে একটি নির্দিষ্ট সংশোধন পর্যালোচনা করার জন্য বাছাই করতে হবে।

পর্যালোচনা করা হয়নি এমন পাতাগুলির একটি তালিকার জন্য [[Special:Unreviewedpages]] দেখুন।',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} সাম্প্রতি দেখা সংস্করণ]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} সমস্ত তালিকা])  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} অনুমোদিত] হয়েছে
<i>$2</i> এ। [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|পরিবর্তন|পরিবর্তনসমূহ}}] পর্যালোচনা {{PLURAL:$3|প্রয়োজন|প্রয়োজন}}।',
	'revreview-notes' => 'প্রদর্শনের জন্য পর্যবেক্ষণ বা মন্তব্য:',
	'revreview-oldrating' => 'পূর্বে মূল্যায়ন ছিল:',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|দেখা হয়েছে]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} খসড়া দেখুন]]",
	'revreview-quick-none' => "'''বর্তমান''' (কোন সংশোধিত সংস্করণ নাই)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|গুণ]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} খসড়া দেখুন]]",
	'revreview-quick-see-basic' => "'''খসড়া''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} সুস্থিত নিবন্ধ দেখুন]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|পরিবর্তন|পরিবর্তনসমূহ}}])",
	'revreview-quick-see-quality' => "'''খসড়া''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} নিবন্ধ দেখুন]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} তুলনা])",
	'revreview-selected' => "'''$1'''-এর যে সংশোধন নির্বাচন করা হয়েছে:",
	'revreview-source' => 'খসড়া উৎস',
	'revreview-stable' => 'স্থিতিশীল পাতা',
	'revreview-style' => 'পঠনযোগ্যতা',
	'revreview-style-0' => 'অননুমদিত',
	'revreview-style-1' => 'গ্রহণযোগ্য',
	'revreview-style-2' => 'ভাল',
	'revreview-style-3' => 'সংক্ষিপ্ত',
	'revreview-style-4' => 'ফিচার করা হয়েছে',
	'revreview-submit' => 'পর্যালোচনা জমা দিন',
	'revreview-text' => "''নতুন সংস্করণের বদলে [[{{MediaWiki:Validationpage}}|স্থিতিশীল সংস্করণগুলি]] দর্শকদের জন্য ডিফল্ট হিসেবে সেট করা আছে।''",
	'revreview-toolow' => 'কোন সংশোধনকে পর্যালোচিত গণ্য করতে চাইলে আপনাকে নিচের বৈশিষ্ট্যগুলির প্রতিটিকে কমপক্ষে "অননুমোদিত" থেকে উচ্চতর কোন রেটিং দিতে হবে। কোন সংশোধনকে অবনমিত করতে চাইলে, সবগুলি ক্ষেত্র "অননুমোদিত"-তে সেট করুন।',
	'revreview-revnotfound' => 'আপনির পাতাটির যে পুরনো সংস্করণটি অনুরোধ করেছেন, তা খুঁজে পাওয়া যায়নি। পাতাটিতে যাবার জন্য আপনি যে URL-টি ব্যবহার করেছিলেন, অনুগ্রহ করে সেটি পরীক্ষা করে দেখুন।',
	'rights-editor-revoke' => '[[$1]] এর সম্পাদক পদমর্যাদা প্রত্যাহার করুন',
	'stable-logpage' => 'সুদৃঢ় সংস্করণ লগ',
	'tooltip-ca-current' => 'এই পাতাটির বর্তমান খসড়াটি দেখুন',
	'tooltip-ca-stable' => 'এই পাতাটির স্থিতিশীল সংস্করণটি দেখুন',
	'tooltip-ca-default' => 'গুণাগুল নিশ্চিতকরণ সেটিংস',
	'validationpage' => '{{ns:help}}:নিবন্ধ বৈধকরণ',
);

/** Bakhtiari (بختياري)
 * @author Behdarvandyani
 */
$messages['bqi'] = array(
	'editor' => 'اصلاحگر',
	'flaggedrevs' => 'نسخه‌های علامت‌دار',
	'flaggedrevs-backlog' => "بختیاری (bqi)در حال حاضر کارهای ناتمام در [[Special:OldReviewedPages|صفحه‌های بازبینی شده تاریخ گذشته]] هده. '''توجه ایسا مورد نیازه !'''",
	'flaggedrevs-prefs-stable' => 'بختیاری (bqi)(در صورت وجود) همیشه نسخه مقاوم یه صفحه را به عنوان نسخه پیش فرض نشو بده',
	'flaggedrevs-prefs-watch' => 'صفحاتی که بازبینی ا‌کنم را به لیست پیگیری‌هام اضاف کن',
	'group-editor' => 'اصلاحگران',
	'group-editor-member' => 'اصلاحگر',
	'group-reviewer' => 'مرورگرها',
	'group-reviewer-member' => 'مرورگر',
	'grouppage-editor' => '{{ns:project}}:اصلاحگر',
	'grouppage-reviewer' => '{{ns:project}}:مرورگر',
	'review-logpagetext' => 'ای نمایه ای زه تعییرات وضعیت [[{{MediaWiki:Validationpage}}|تائید]] 
نسخه‌های صفحاته .
بوین [[Special:ReviewedPages|reviewed pages list]] یه لیست زه صفحات تایید وابیده.',
	'revreview-auto' => 'اتوماتیک',
	'revreview-basic' => 'ای آخرین نسخه [[{{MediaWiki:Validationpage}}|بررسی‌ وابیده]] است که در <i>$2</i>
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تائید وابیده]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش ‌نویس]
قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} اصلاح] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}]
نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-basic-i' => 'ای چدید‌ترین نسخه [[{{MediaWiki:Validationpage}}|بررسی وابیده]] است، که در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید وابیده].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش ‌نویس] دارای [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییراتی در قالبها/تصویرها] است که هنی بازبینی نوابیدنه.',
	'revreview-basic-old' => 'ای یه نسخه [[{{MediaWiki:Validationpage}}|بررسی وابیده]] است([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} نشودادن همه])، که در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید وابیده].
ممکنه   [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییرات] جدیدی اتفاق افتاده وابیده',
	'revreview-basic-same' => 'ای آخرین نسخه [[{{MediaWiki:Validationpage}}|بررسی وابیده]] ‌است، که در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید وابیده] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} لیست کامل]).',
	'revreview-basic-source' => 'یه [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخه بررسی وابیده] زه ای صفحه، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید وابیده] در <i>$2</i>، بر مبنای ای نسخه ایجاد وابیده.',
	'revreview-changed' => "'''عمل درخواست وابده را نیبوه رو ای نسخه زه [[:$1|$1]] انجام داد.'''

یه تصویر یا قالب درخواست وابیده بدون آن که نسخه خاصی تعیین وابیده بوه. ای اتفاق تره زمانی رخ بده که یه قالب پویا یه قالب یا تصویر دیگر را شامل بوه که به متغیری بستگی دارد که زه زمانی که ایسا صفحه را تغییر داده‌این تغییر کرده‌بوه.
نوآوری دوباره صفحه و بررسی دوباره تره مشکل را حل کنه.",
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'editor' => 'Skridaozer',
	'flaggedrevs' => 'Adweladennoù merket',
	'flaggedrevs-desc' => "Reiñ a ra an tu d'ar reizherien pe d'an adlennerien da gadarnaat an degasadennoù ha da stabilaat ar pajennoù.",
	'group-editor' => 'Skridaozerien',
	'group-editor-member' => 'Skridaozer',
	'group-reviewer' => 'Reizherien',
	'group-reviewer-member' => 'Reizher',
	'grouppage-editor' => '{{ns:project}}:Skridaozer',
	'grouppage-reviewer' => '{{ns:project}}:Reizher',
	'hist-quality' => 'perzhded ar stumm',
	'hist-stable' => 'Stumm gwelet',
	'review-diff2stable' => "Gwelet ar c'hemmoù etre ar stummoù stabil hag ar stummoù a-vremañ.",
	'review-logentry-app' => 'en deus adwelet r$2 eus [[$1]]',
	'review-logentry-dis' => "Stumm dic'hizet eus [[$1]]",
	'review-logentry-id' => 'gwelet',
	'review-logpage' => 'Marilh an adweladennoù',
	'review-logpagetext' => "Setu marilh ar c'hemmoù ber degaset [[{{MediaWiki:Validationpage}}|d'ar statud aprouiñ]] an adweladennoù.
Gwelet [[Special:ReviewedPages|roll ar pajennoù adwelet]] evit kaout roll ar pajennoù aprouet.",
	'reviewer' => 'Reizher',
	'revisionreview' => 'Adwelet ar reizhadennoù',
	'revreview-accuracy' => 'Pizhder',
	'revreview-accuracy-0' => 'Ket aprouet',
	'revreview-accuracy-1' => 'Gwelet',
	'revreview-accuracy-2' => 'Resis',
	'revreview-accuracy-3' => 'Titouret mat',
	'revreview-accuracy-4' => 'Heverk',
	'revreview-auto' => '(emgefre)',
	'revreview-auto-w' => "O kemmañ ar stumm stabil emaoc'h; ''adlennet ent emgefre'' e vo ar c'hemmoù.",
	'revreview-auto-w-old' => "O kemmañ ar stumm stabil emaoc'h; ''adlennet ent emgefre'' e vo ar c'hemmoù.",
	'revreview-basic' => "Setu ar [[{{MediaWiki:Validationpage}}|stumm diwezhañ gwelet]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gant ar [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouilhed] ez eus [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|c'hemm|kemm}}] a c'hortoz bezañ adwelet.",
	'revreview-basic-old' => "Hemañ zo ur stumm bet [[{{MediaWiki:Validationpage}}|gwelet]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} gwelet an holl]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Kemmoù] nevez zo bet graet.",
	'revreview-basic-same' => "Setu an diwezhañ stumm bet [[{{MediaWiki:Validationpage}}|adwelet]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} gwelet an holl]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gallout a ra ar bajenn bezañ '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} kemmet]'''.",
	'revreview-basic-source' => "Ur [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} stumm gwelet] eus ar bajenn-mañ, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>, eo bet diazezet er-maez eus ar stumm-mañ.",
	'revreview-current' => 'Brouilhed',
	'revreview-depth' => 'Donder',
	'revreview-depth-0' => 'Ket aprouet',
	'revreview-depth-1' => 'Diazez',
	'revreview-depth-2' => 'Etre',
	'revreview-depth-3' => 'Uhel',
	'revreview-depth-4' => 'Heverk',
	'revreview-edit' => 'Brouilhed kemmoù',
	'revreview-edited' => "'''Ebarzhet e vo an degasadennoù er [[{{MediaWiki:Validationpage}}|stumm stabil]] ur wezh bet gwiriekaet gant un implijer aotreet.
A-is emañ ar ''brouilhed''.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|change|kemm}}] a c'hortoz bezañ kadarnaet.",
	'revreview-invalid' => "'''Pal direizh :''' n'eus [[{{MediaWiki:Validationpage}}|stumm adwelet ebet]] o klotañ gant an niverenn merket.",
	'revreview-log' => 'Notenn :',
	'revreview-newest-basic' => "An [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} adweladenn gwelet da ziwezhañ] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} diskouez an holl]) a oa [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|kemm|kemm}}] {{PLURAL:$3|a c'houlenn|a c'houlenn}} bezañ adwelet.",
	'revreview-newest-quality' => "An [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} diwezhañ stumm a-feson] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} gwelet an holl]) a oa bet [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|c'hemm|kemm}}] {{PLURAL:$3|a c'houlenn|a c'houlenn}} bezañ adwelet.",
	'revreview-noflagged' => "N'eus stumm reizhet ebet eus ar bajenn-mañ, setu marteze n'eo '''ket''' bet [[{{MediaWiki:Validationpage}}|gwiriekaet]] he ferzhioù.",
	'revreview-note' => 'Skrivet eo bet an notennoù-mañ gant [[User:$1|$1]] e-ser [[{{MediaWiki:Validationpage}}|adwelet]] ar stumm :',
	'revreview-oldrating' => 'E boentadur :',
	'revreview-patrolled' => 'Merket evel patrouilhet eo bet ar stumm diuzet eus [[:$1|$1]].',
	'revreview-quality' => "Setu an diwezhañ stumm [[{{MediaWiki:Validationpage}}|a-feson]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gant ar [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouilhed] ez eus [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|c'hemm|kemm}}] a c'hortoz bezañ adwelet.",
	'revreview-quality-old' => "Hemañ zo ur stumm [[{{MediaWiki:Validationpage}}|a-feson]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} gwelet an holl]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Kemmoù] nevez zo bet graet.",
	'revreview-quality-same' => "Setu an diwezhañ stumm [[{{MediaWiki:Validationpage}}|a-feson]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} gwelet an holl]),
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gallout a ra ar bajenn bezañ '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} kemmet]'''.",
	'revreview-quality-source' => "Ur [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} stumm a-feson] eus ar bajenn-mañ, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>, zo bet diazezet er-maez eus ar stumm-mañ.",
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|gwelet]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} gwelet brouilhed]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Pennad gwelet]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} gwelet brouilhed]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pennad gwelet]]'''",
	'revreview-quick-invalid' => "'''Niverenn stumm direizh'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Stumm red]]''' (n'eo ket bet adwelet)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pennad a-feson]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} gwelet brouilhed]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pennad a-feson]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} gwelet brouilhed]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pennad a-feson]]'''",
	'revreview-quick-see-basic' => "'''Brouilhed''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} gwelet ar pennad]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} keñveriañ])",
	'revreview-quick-see-quality' => "'''Brouilhed''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} gwelet ar pennad]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} keñveriañ])",
	'revreview-source' => 'Mammenn ar brouilhed',
	'revreview-stable' => 'Stabil',
	'revreview-style' => 'Lennuster',
	'revreview-style-0' => 'Ket aprouet',
	'revreview-style-1' => 'Degemeradus',
	'revreview-style-2' => 'Mat',
	'revreview-style-3' => 'Krenn',
	'revreview-style-4' => 'Heverk',
	'revreview-submit' => 'Kas',
	'revreview-toggle-title' => 'diskouez/kuzhat munudoù',
	'revreview-update' => "Mar plij [[{{MediaWiki:Validationpage}}|adwelit]] an holl gemmoù ''(diskouezet a-is)'' bet graet abaoe ma oa bet [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] ar stumm stabil diwezhañ.

'''Hizivaet e oa bet patromoù/skeudennoù zo :'''",
	'revreview-update-none' => "Mar plij [[{{MediaWiki:Validationpage}}|adwelit]] an holl gemmoù ''(diskouezet a-is)'' bet graet abaoe ma oa bet [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprouet] ar stumm stabil diwezhañ.",
	'revreview-revnotfound' => "N'eo ket bet kavet stumm kent ar bajenn-mañ. Gwiriit an URL lakaet ganeoc'h evit mont d'ar bajenn-mañ.",
	'rights-editor-autosum' => 'emanvet',
	'stable-logpage' => 'Marilh ar stummoù stabil',
	'revreview-filter-approved' => 'Aprouet',
	'tooltip-ca-current' => "Gwelet brouilhed ar bajenn-mañ evel m'emañ evit poent",
	'tooltip-ca-stable' => 'Gwelet stumm stabil ar bajenn',
	'tooltip-ca-default' => 'Arventennoù Kontrolliñ ar Berzhded',
	'validationpage' => '{{ns:help}}:Kadarnaat ar bajenn',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'editor' => 'Uređivač',
	'flaggedrevs' => 'Provjerene revizije',
	'flaggedrevs-backlog' => "Trenutno je zastoj u [[Special:OldReviewedPages|izmjenama na čekanju]] za provjeru stranica. '''Neophodna je vaša pažnja!'''",
	'flaggedrevs-desc' => 'Daje mogućnost uređivačima i pregledačima da provjere revizije i stabiliziraju stranice',
	'flaggedrevs-pref-UI' => 'Interfej stabilne verzije:',
	'flaggedrevs-pref-UI-0' => 'Koristi detaljni korisnički interfejs stabilne verzije',
	'flaggedrevs-pref-UI-1' => 'Koristi jednostavni korisnički interfejs stabilne verzije',
	'prefs-flaggedrevs' => 'Stabilnost',
	'flaggedrevs-prefs-stable' => 'Uvijek prikaži stabilnu verziju stranica sadržaja po pretpostavljenom (ako je samo jedna)',
	'flaggedrevs-prefs-watch' => 'Dodaj stranice koje sam pregledao na moj spisak praćenja',
	'flaggedrevs-prefs-editdiffs' => 'Prikaži razlike od stabilne pri uređivanju stranice',
	'group-editor' => 'Urednici',
	'group-editor-member' => 'uređivač',
	'group-reviewer' => 'Provjerivači',
	'group-reviewer-member' => 'provjerivač',
	'grouppage-editor' => '{{ns:project}}:Urednik',
	'grouppage-reviewer' => '{{ns:project}}:Pregledavač',
	'group-autoreview' => 'Autonadzornici',
	'group-autoreview-member' => 'autonadzornik',
	'grouppage-autoreview' => '{{ns:project}}:Autonadzornik',
	'hist-draft' => 'radna revizija',
	'hist-quality' => 'provjerena revizija',
	'hist-stable' => 'provjerena verzija',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} pregledano] od strane [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatski provjereno]',
	'review-diff2stable' => 'Pogledajte promjene između stabilne i trenutne revizije',
	'review-logentry-app' => 'pregledana r$2 od [[$1]]',
	'review-logentry-id' => 'pregled',
	'review-logentry-diff' => 'razlika od stabilne',
	'review-logpage' => 'Zapisnik provjera',
	'reviewer' => 'Pregledač',
	'revisionreview' => 'Pregledaj revizije',
	'revreview-accuracy' => 'Preciznost',
	'revreview-accuracy-0' => 'Neodobreno',
	'revreview-accuracy-1' => 'Provjereno',
	'revreview-accuracy-2' => 'Precizno',
	'revreview-accuracy-3' => 'Dobro referencirano',
	'revreview-accuracy-4' => 'Odabrana',
	'revreview-approved' => 'Odobreno',
	'revreview-auto' => '(automatsko)',
	'revreview-current' => 'Radna',
	'revreview-depth' => 'Dubina',
	'revreview-depth-0' => 'Neprovjereno',
	'revreview-depth-1' => 'Osnovna',
	'revreview-depth-2' => 'Umjerena',
	'revreview-depth-3' => 'Visok',
	'revreview-depth-4' => 'Odabrano',
	'revreview-draft-title' => 'Radna stranica',
	'revreview-edit' => 'Uredite radnu verziju',
	'revreview-flag' => 'Provjerite ovu reviziju',
	'revreview-invalid' => "'''Nevaljan cilj:''' nijedna [[{{MediaWiki:Validationpage}}|pregledana]] revizija ne odgovara navedenom ID.",
	'revreview-log' => 'Komentar:',
	'revreview-revnotfound' => 'Starija revizija ove stranice koju ste zatražili nije nađena.
Molimo Vas da provjerite URL pomoću kojeg ste pristupili ovoj stranici.',
	'revreview-filter-all' => 'Sve',
	'revreview-typefilter' => 'Tip:',
);

/** Catalan (Català)
 * @author Aleator
 * @author Jordi Roqué
 * @author Juanpabl
 * @author Paucabot
 * @author SMP
 * @author Solde
 * @author Toniher
 */
$messages['ca'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Revisions senyalades',
	'flaggedrevs-backlog' => "Actualment hi ha un registre de tasques amb retràs a la [[Special:OldReviewedPages|llista de pàgines que no han estat revisades recentment]]. '''Es necessita de la teva atenció!'''",
	'flaggedrevs-desc' => "Dóna als editors/revisors l'habilitat de validar revisions de pàgines i declarar-les estables.",
	'prefs-flaggedrevs' => 'Estabilitat',
	'flaggedrevs-prefs-stable' => "Per defecte, mostra sempre la versió estable de les pàgines de contingut (si n'hi ha)",
	'flaggedrevs-prefs-watch' => 'Posar a la meva llista de seguiment les pàgines que revisi',
	'group-editor' => 'Editors',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Supervisors',
	'group-reviewer-member' => 'Supervisor',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Supervisor',
	'hist-quality' => 'versió de qualitat',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validada] per [[User:$3|$3]]',
	'hist-stable' => 'versió revisada',
	'review-diff2stable' => 'Visualitza els canvis entre les revisions estable i actual',
	'review-logentry-app' => 'revisada la r$2 de [[$1]]',
	'review-logentry-id' => 'veure',
	'review-logentry-diff' => "dif a l'estable",
	'review-logpage' => 'Registre de revisió',
	'reviewer' => 'Supervisor',
	'revisionreview' => 'Revisa les revisions',
	'revreview-approved' => 'Aprovat',
	'revreview-auto' => '(automàtic)',
	'revreview-auto-w' => "Esteu modificant una revisio estable; els canvis seran '''revisats automàticament'''.",
	'revreview-auto-w-old' => "Esteu modificant una edició revisada; els canvis seran '''revisats automàticament'''.",
	'revreview-basic' => "Aquesta és l'última versió [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} versió actual] és la que pot ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|canvi|canvis}}] {{PLURAL:$3|espera|esperen}} revisió.",
	'revreview-current' => 'actual',
	'revreview-depth-1' => 'Bàsic',
	'revreview-depth-2' => 'Moderat',
	'revreview-depth-3' => 'Alt',
	'revreview-edit' => "edita l'actual",
	'revreview-flag' => 'Revisa aquesta revisió',
	'revreview-log' => 'Comentari:',
	'revreview-newest-basic' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió revisada] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|canvi|canvis}}] que {{PLURAL:$3|necessita|necessiten}} revisió.",
	'revreview-newest-basic-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió revisada] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canvis de plantilla o d'imatge] que necessiten revisió.",
	'revreview-newest-quality' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió de qualitat] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|canvi|canvis}}] que {{PLURAL:$3|necessita|necessiten}} revisió.",
	'revreview-newest-quality-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió de qualitat] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canvis de plantilla o d'imatge] que necessiten revisió.",
	'revreview-noflagged' => "No hi ha versions revisades d'aquesta pàgina i, per tant, pot '''no''' haver estat [[{{MediaWiki:Validationpage}}|comprovada]] la seva qualitat.",
	'revreview-note' => '[[User:$1|$1]] va fer les notes següents quan [[{{MediaWiki:Validationpage}}|va repassar]] aquesta revisió:',
	'revreview-oldrating' => 'Estava valorada:',
	'revreview-patrol' => 'Marca aquest canvi com a patrullat',
	'revreview-patrol-title' => 'Marca com a patrullat',
	'revreview-patrolled' => 'La revisió seleccionada de [[:$1|$1]] ha estat marcada com a patrullada.',
	'revreview-quality' => "Aquesta és l'última versió [[{{MediaWiki:Validationpage}}|de qualitat]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} versió actual] és la que pot ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|canvi|canvis}}] {{PLURAL:$3|espera|esperen}} revisió.",
	'revreview-quality-old' => "Aquesta és una revisió de [[{{MediaWiki:Validationpage}}|qualitat]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} llista completa]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>.
S'hi poden haver fet [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canvis].",
	'revreview-quality-same' => 'Aquesta és la darrera revisió de [[{{MediaWiki:Validationpage}}|qualitat]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} llista completa]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>.',
	'revreview-quality-title' => 'Pàgina de qualitat',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pàgina revisada]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vegeu la versió actual]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pàgina revisada]]'''",
	'revreview-quick-none' => "'''Actual'''. No hi ha versions revisades.",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pàgina de qualitat]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vegeu la versió actual]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pàgina de qualitat]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Esborrany]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vegeu la pàgina]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} compara])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Esborrany]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vegeu la pàgina]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} compara])",
	'revreview-source' => "Codi de l'actual",
	'revreview-stable' => 'Pàgina estable',
	'revreview-style-1' => 'Acceptable',
	'revreview-style-2' => 'Bo',
	'revreview-submit' => 'Tramet',
	'revreview-toggle-title' => 'Mostra/amaga detalls',
	'revreview-update' => "Si us plau, [[{{MediaWiki:Validationpage}}|reviseu]] els canvis ''(indicats a sota)'' fets des que la versió estable va ser [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada].

'''Algunes plantilles o imatges han canviat:'''",
	'revreview-update-includes' => "'''Algunes plantilles o imatges han estat actualitzades:'''",
	'revreview-update-none' => "Si us plau, [[{{MediaWiki:Validationpage}}|repasseu]] els canvis ''(mostrats a continuació)'' fets des que la revisió estable va ser [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada].",
	'revreview-revnotfound' => "No s'ha pogut trobar la revisió antiga de la pàgina que demanàveu.
Reviseu l'URL que heu emprat per a accedir-hi.",
	'right-movestable' => 'Moure pàgines estables',
	'right-review' => 'Marqueu les revisions com a vistes',
	'right-stablesettings' => 'Configureu com es selecciona i mostra la versió estable',
	'rights-editor-revoke' => "tret el nivell d'editor a [[$1]]",
	'stable-logpage' => "Registre d'estabilitat",
	'revreview-filter-all' => 'Tot',
	'revreview-filter-approved' => 'Aprovat',
	'revreview-filter-auto' => 'Automàtic',
	'revreview-filter-manual' => 'Manual',
	'revreview-typefilter' => 'Tipus:',
	'revreview-levelfilter' => 'Nivell:',
	'tooltip-ca-current' => "Vegeu l'actual proposta per aquesta pàgina",
	'tooltip-ca-stable' => 'Vegeu la versió estable de la pàgina',
);

/** Chamorro (Chamoru)
 * @author Gadao01
 */
$messages['ch'] = array(
	'revreview-revnotfound' => "Ti siña masodda' i tinilaika i påhina ni finaisen-mu. Pot fabot chek i URL ni un usa para i finatto-mu gi påhina.",
);

/** Crimean Turkish (Latin) (Qırımtatarca (Latin))
 * @author Alessandro
 */
$messages['crh-latn'] = array(
	'revreview-revnotfound' => 'Saifeniñ eski versiyası tapılmadı. Lütfen, bu saifege kirmek içün qullanğan bağlantıñıznıñ doğrulığını teşkeriñiz.',
);

/** Crimean Turkish (Cyrillic) (Qırımtatarca (Cyrillic))
 * @author Alessandro
 */
$messages['crh-cyrl'] = array(
	'revreview-revnotfound' => 'Саифенинъ эски версиясы тапылмады. Лютфен, бу саифеге кирмек ичюн къуллангъан багълантынъызнынъ догърулыгъыны тешкеринъиз.',
);

/** Czech (Česky)
 * @author Danny B.
 * @author Li-sung
 * @author Matěj Grabovský
 * @author Mormegil
 */
$messages['cs'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Označování verzí',
	'flaggedrevs-backlog' => "Momentálně existují [[Special:OldReviewedPages|zastaralé zkontrolované stránky]]. '''Vyžaduje se vaše pozornost!'''",
	'flaggedrevs-desc' => 'Umožňuje editorům a posuzovatelům hodnotit verze a stabilizovat stránky',
	'flaggedrevs-pref-UI-0' => 'Používat podrobné uživatelské rozhraní stabilních verzí',
	'flaggedrevs-pref-UI-1' => 'Používat jednoduché uživatelské rozhraní stabilních verzí',
	'flaggedrevs-prefs-stable' => 'Vždy standardně zobrazovat stabilní verzi stránek s obsahem (pokud existuje)',
	'flaggedrevs-prefs-watch' => 'Přidat stránky, které zkontroluji, do mého seznamu sledovaných stránek',
	'group-editor' => 'Editoři',
	'group-editor-member' => 'editor',
	'group-reviewer' => 'Posuzovatelé',
	'group-reviewer-member' => 'posuzovatel',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Posuzovatel',
	'hist-draft' => 'návrh verze',
	'hist-quality' => 'kvalitní verze',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} ověřeno uživatelem] [[User:$3|$3]]',
	'hist-stable' => 'prohlédnutá verze',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} prohlédnuto] uživatelem [[User:$3|$3]]',
	'review-diff2stable' => 'Zobrazit změny mezi stabilní a současnou verzí',
	'review-logentry-app' => 'posuzuje stránku $1',
	'review-logentry-dis' => 'odmítá verzi stránky $1',
	'review-logentry-id' => 'ID verze $1',
	'review-logentry-diff' => 'rozdíl oproti stabilní',
	'review-logpage' => 'Kniha označování verzí',
	'review-logpagetext' => 'Tato kniha zobrazuje změny [[{{MediaWiki:Validationpage}}|schválení]] verzí stránek.
Pro seznam schválených stránek se podívejte na [[Special:ReviewedPages|seznam prohlédnutých stránek]].',
	'reviewer' => 'Posuzovatel',
	'revisionreview' => 'Posouzení verzí',
	'revreview-accuracy' => 'Stav',
	'revreview-accuracy-0' => 'neschváleno',
	'revreview-accuracy-1' => 'prohlédnuto',
	'revreview-accuracy-2' => 'překontrolováno',
	'revreview-accuracy-3' => 'dobře ozdrojováno',
	'revreview-accuracy-4' => 'doporučeno',
	'revreview-approved' => 'Schválené',
	'revreview-auto' => '(automaticky)',
	'revreview-auto-w' => "Editujete stabilní verzi, změny budou '''automaticky označeny jako posouzené'''.",
	'revreview-auto-w-old' => "Editujete posouzenou verzi; změny budou '''automaticky označeny jako posouzené'''.",
	'revreview-basic' => 'Toto je poslední [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze. Byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
V [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrhu]  {{PLURAL:$3|je|jsou|je}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|čekající|čekající|čekajících}} na posouzení.',
	'revreview-basic-i' => 'Toto je poslední [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze. Byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Návrh] obsahuje [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny šablony/obrázku] čekající na posouzení.',
	'revreview-basic-old' => 'Toto je [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} seznam všech]) Byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
Možná byly provedeny nové [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny].',
	'revreview-basic-same' => 'Toto je poslední  [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze. Byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upravit].',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Prohlédnutá verze] této stránky, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>, vychází z této verze.',
	'revreview-changed' => "'''Požadovanou akci nelze provést na této verzi stránky [[:$1|$1]].'''

Šablona nebo obrázek byly vyžádány na neurčitou verzi. To se může stát pokud dynamická šablona vkládá jinou šablonu nebo obrázek v závislosti na proměnné, která se změnila zatímco jste posuzovali stránku. Obnovte stránku a znovu ji posuďte.",
	'revreview-current' => 'Návrh',
	'revreview-depth' => 'Hloubka',
	'revreview-depth-0' => 'Neschváleno',
	'revreview-depth-1' => 'Základní',
	'revreview-depth-2' => 'Mírná',
	'revreview-depth-3' => 'Vysoká',
	'revreview-depth-4' => 'Význačná',
	'revreview-edit' => 'Editovat návrh',
	'revreview-flag' => 'Posoudit tuto verzi',
	'revreview-edited' => "'''Editace budou začleněny do [[{{MediaWiki:Validationpage}}|stabilní verze]] jakmile je posoudí pověřený uživatel.'''
'''Níže je zobrazen aktuální ''návrh'' stránky.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|změna čeká|změny čekají|změn čeká}}] na posouzení.",
	'revreview-invalid' => "'''Neplatný cíl:''' žádná [[{{MediaWiki:Validationpage}}|posouzená]] verze neodpovídá zadanému ID.",
	'revreview-legend' => 'Ohodnoťte obsah verze',
	'revreview-log' => 'Komentář:',
	'revreview-main' => 'Pro posouzení musíte vybrat určitou verzi stránky. 

Vizte [[Special:Unreviewedpages|seznam neposouzených stránek]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední prohlédnutá verze] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|potřebuje|potřebují|potřebuje}} posoudit.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední prohlédnutá verze] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena]  <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny šablony/obrázku] čekají na posouzení.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední kvalitní verze] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|potřebuje|potřebují|potřebuje}} posoudit.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední kvalitní verze] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny šablony/obrázku] čekají na posouzení.',
	'revreview-noflagged' => 'Tato stránka nemá žádné posouzené verze, takže dosud nebyla [[{{MediaWiki:Validationpage}}|zkontrolována]] kvalita.',
	'revreview-note' => 'Uživatel [[User:$1|$1]] doplnil své [[{{MediaWiki:Validationpage}}|posouzení]] této verze následující poznámkou:',
	'revreview-notes' => 'Poznámky k zobrazení:',
	'revreview-oldrating' => 'Bylo ohodnoceno:',
	'revreview-patrol' => 'Označit tuto změnu jako prověřenou',
	'revreview-patrol-title' => 'Označit jako prověřené',
	'revreview-patrolled' => 'Vybraná verze stránky [[:$1|$1]] byla označena jako prověřená.',
	'revreview-quality' => 'Toto je poslední [[{{MediaWiki:Validationpage}}|kvalitní]] verze. Byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
V [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrhu]  {{PLURAL:$3|je|jsou|je}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|čekající|čekající|čekajících}} na posouzení.',
	'revreview-quality-i' => 'Toto je poslední [[{{MediaWiki:Validationpage}}|kvalitní]] verze. Byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Návrh] obsahuje [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny šablony/obrázku] čekající na posouzení.',
	'revreview-quality-old' => 'Toto je [[{{MediaWiki:Validationpage}}|kvalitní]] verze ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} seznam všech]). Byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
Možná byly provedeny nové [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny].',
	'revreview-quality-same' => 'Toto je poslední  [[{{MediaWiki:Validationpage}}|kvalitní]] verze. Byla [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upravit].',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Kvalitní verze] této stránky, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>, vychází z této verze.',
	'revreview-quality-title' => 'Kvalitní článek',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Prohlédnuto]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Vizte nejnovější verzi]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Prohlédnutý článek]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobrazit návrh]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Prohlédnutá]]''' (žádné nezkontrolované změny)",
	'revreview-quick-invalid' => "'''Neplatná identifikace verze'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Nejnovější verze]]''' (dosud neposouzeno)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kvalitní]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Vizte nejnovější verzi]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kvalitní článek]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobrazit návrh]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitní]]''' (žádné nezkontrolované změny)",
	'revreview-quick-see-basic' => "'''Návrh''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobrazit článek]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} porovnání])",
	'revreview-quick-see-quality' => "'''Návrh''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobrazit článek]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} porovnání])",
	'revreview-selected' => "Vybrané verze stránky '''$1:'''",
	'revreview-source' => 'zdroj návrhu',
	'revreview-stable' => 'Stabilní stránka',
	'revreview-style' => 'Čitelnost',
	'revreview-style-0' => 'Neschváleno',
	'revreview-style-1' => 'Přijatelná',
	'revreview-style-2' => 'Dobrá',
	'revreview-style-3' => 'Výstižná',
	'revreview-style-4' => 'Význačná',
	'revreview-submit' => 'Odeslat posouzení',
	'revreview-submitting' => 'Odesílá se',
	'revreview-text' => "''Zobrazení [[{{MediaWiki:Validationpage}}|stabilních verzí]] je upřednostněno před nejnovějšími verzemi.''",
	'revreview-toggle-title' => 'skrýt/zobrazit detaily',
	'revreview-toolow' => 'Aby byla verze označena jako posouzená, musíte označit každou vlastnost lepším hodnocením než "neschváleno". Pokud chcete verzi odmítnout nechte ve všech polích hodnocení "neschváleno".',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Posuďte]]  všechny změny ''(zobrazené níže)'' provedené od posledního [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválení] stabilní verze.<br />
'''Některé šablony nebo obrázky byly změněny:'''",
	'revreview-update-includes' => "'''Některé šablony/obrázky se změnili:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Posuďte]] všechny změny ''(zobrazené níže)'' provedené od posledního [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválení] stabilní verze.",
	'revreview-update-use' => "'''Upozornění:''' Pokud něco z těchto šablon/obrázků má stabilní verzi, pak je ta už použita na stabilní verzi této stránky.",
	'revreview-diffonly' => "''Stránku můžete zkontrolovat po kliknutí na odkaz „aktuální revize” pomocí formuláře pro kontrolu.''",
	'revreview-visibility' => "'''Tato stránka má [[{{MediaWiki:Validationpage}}|stabilní verzi]], kterou lze [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} nastavit].'''",
	'revreview-revnotfound' => 'Nelze najít starou verzi, kterou žádáte. Zkuste prosím zkontrolovat URL hledané stránky.',
	'right-movestable' => 'Přesunout stabilní stránky',
	'right-review' => 'Označit verze jako prohlédnuté',
	'right-validate' => 'Označit revize jako ověřené',
	'rights-editor-revoke' => 'odebírá status editora uživateli [[$1]]',
	'specialpages-group-quality' => 'Zajištění kvality',
	'stable-logentry' => 'nastavuje výběr stabilní verze stránky [[$1]]',
	'stable-logentry2' => 'vrací výchozí výběr stabilní verze stránky [[$1]]',
	'stable-logpage' => 'Kniha stabilních verzí',
	'stable-logpagetext' => 'Toto je záznam změn nastavení [[{{MediaWiki:Validationpage}}|stabilní verze]] stránek.
Přehled stabilizovaných stránek vizte na [[Special:StablePages|seznamu stabilních stránek]].',
	'tooltip-ca-current' => 'Zobrazit nejnovější návrh této stránky',
	'tooltip-ca-stable' => 'Zobrazit stabilní verzi této stránky',
	'tooltip-ca-default' => 'Nastavení stabilní a zobrazované verze',
	'validationpage' => '{{ns:help}}:Stabilní verze',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'revreview-revnotfound' => "Ni ddaethpwyd o hyd i'r hen ddiwygiad o'r dudalen y gofynnwyd amdano. Gwnewch yn siwr fod yr URL yn gywir os gwelwch yn dda.",
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'revreview-auto' => '(automatisk)',
	'revreview-revnotfound' => 'Den gamle version af den side du spurgte efter kan
ikke findes. Kontrollér den URL du brugte til at få adgang til denne side.',
);

/** German (Deutsch)
 * @author ChrisiPK
 * @author Jens Liebenau
 * @author MF-Warburg
 * @author Melancholie
 * @author Merlissimo
 * @author MichaelFrey
 * @author Purodha
 * @author Raimond Spekking
 * @author Umherirrender
 */
$messages['de'] = array(
	'editor' => 'Sichter',
	'flaggedrevs' => 'Markierte Versionen',
	'flaggedrevs-backlog' => 'Die [[Special:OldReviewedPages|Liste der Seiten mit ungesichteten Versionen]] ist sehr lang. Bitte hilf mit, sie abzuarbeiten. Danke.',
	'flaggedrevs-watched-pending' => "Es sind aktuell [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} ungesichtete Bearbeitungen] von gesichteten Seiten auf deiner Beobachtungsliste. '''Deine Aufmerksamkeit ist nötig!'''",
	'flaggedrevs-desc' => 'Markierte Versionen',
	'flaggedrevs-pref-UI' => 'Benutzeroberfläche der stabilen Versionen:',
	'flaggedrevs-pref-UI-0' => 'detaillierte Benutzeroberfläche',
	'flaggedrevs-pref-UI-1' => 'einfache Benutzeroberfläche',
	'prefs-flaggedrevs' => 'Stabilität',
	'flaggedrevs-prefs-stable' => 'Zeige als Standard immer die markierte Version einer Seite (falls vorhanden)',
	'flaggedrevs-prefs-watch' => 'Selbst markierte Seiten automatisch beobachten',
	'flaggedrevs-prefs-editdiffs' => 'Zeige beim Bearbeiten einen Versionsvergleich zur stabilen Version',
	'group-editor' => 'Sichter',
	'group-editor-member' => 'Sichter',
	'group-reviewer' => 'Prüfer',
	'group-reviewer-member' => 'Prüfer',
	'grouppage-editor' => '{{ns:project}}:Sichter',
	'grouppage-reviewer' => '{{ns:project}}:Prüfer',
	'group-autoreview' => 'Automatische Sichter',
	'group-autoreview-member' => 'automatischer Sichter',
	'grouppage-autoreview' => '{{ns:project}}:Automatischer Sichter',
	'hist-draft' => 'Entwurfsversion',
	'hist-quality' => 'geprüfte Version',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} geprüft] von [[User:$3|$3]]',
	'hist-stable' => 'gesichtete Version',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} gesichtet] von [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatisch gesichtet]',
	'review-diff2stable' => 'Unterschiede zwischen der markierten und der aktuellen Version ansehen',
	'review-logentry-app' => 'markierte Version $2 von „[[$1]]“',
	'review-logentry-dis' => 'entfernte Markierung für Version $2 von „[[$1]]“',
	'review-logentry-id' => 'ansehen',
	'review-logentry-diff' => 'Unterschied zur gesichteten Version',
	'review-logpage' => 'Versionsmarkierungs-Logbuch',
	'review-logpagetext' => 'In diesem Logbuch werden die [[{{MediaWiki:Validationpage}}|Sichtungen und Prüfungen]] von Versionen protokolliert. Siehe die [[Special:ReviewedPages|Liste markierter Versionen]].',
	'reviewer' => 'Prüfer',
	'revisionreview' => 'Versionsprüfung',
	'revreview-accuracy' => 'Status',
	'revreview-accuracy-0' => 'nicht freigegeben',
	'revreview-accuracy-1' => 'gesichtet',
	'revreview-accuracy-2' => 'geprüft',
	'revreview-accuracy-3' => 'Quellen geprüft',
	'revreview-accuracy-4' => 'exzellent',
	'revreview-approved' => 'Freigegeben',
	'revreview-auto' => '(automatisch)',
	'revreview-auto-w' => "Du bearbeitest eine gesichtete Version; Bearbeitungen werden '''automatisch als gesichtet''' markiert.",
	'revreview-auto-w-old' => "Du bearbeitest eine gesichtete Version; Bearbeitungen werden '''automatisch als gesichtet''' markiert.",
	'revreview-basic' => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|gesichtete]] Version, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Änderung steht|Änderungen stehen}}] noch zur Sichtung an.',
	'revreview-basic-i' => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|gesichtete]] Version, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
Der [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Entwurf] enthält [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen an Vorlagen/Dateien], die auf eine Sichtung warten.',
	'revreview-basic-old' => 'Dies ist eine [[{{MediaWiki:Validationpage}}|gesichtete]] Version ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} → alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
Neue [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen] können vorgenommen worden sein.',
	'revreview-basic-same' => "Dies ist die letzte [[{{MediaWiki:Validationpage}}|gesichtete]] Version, ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zeige alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>. Die Seite kann '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bearbeitet]''' werden.",
	'revreview-basic-source' => 'Eine [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} gesichtete Version] dieser Seite, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>, basiert auf dieser Version.',
	'revreview-blocked' => 'Du kannst diese Version nicht markieren, da dein Benutzerkonto zurzeit gesperrt ist ([$1 Details]).',
	'revreview-changed' => "'''Die Aktion konnte nicht auf diese Version von [[:$1|$1]] angewendet werden.'''

Eine Vorlage oder eine Datei wurden ohne spezifische Versionsnummer angefordert.
Dies kann passieren, wenn eine dynamische Vorlage eine weitere Vorlage oder eine Datei einbindet, die von einer Variable abhängig ist, die sich seit Beginn der Markierung verändert hat.
Ein Neuladen der Seite und erneutes Speichern der Markierung kann das Problem beheben.",
	'revreview-current' => 'Entwurf',
	'revreview-depth' => 'Tiefe',
	'revreview-depth-0' => 'nicht freigegeben',
	'revreview-depth-1' => 'einfach',
	'revreview-depth-2' => 'mittel',
	'revreview-depth-3' => 'hoch',
	'revreview-depth-4' => 'exzellent',
	'revreview-draft-title' => 'Ungesichtete Seite',
	'revreview-edit' => 'Entwurf bearbeiten',
	'revreview-editnotice' => "'''Bearbeitungen dieser Seite werden erst in die [[{{MediaWiki:Validationpage}}|gesichtete Version]] übernommen, sobald ein dazu berechtiger Benutzer die Änderung kontrolliert hat.'''",
	'revreview-flag' => 'Markiere Version',
	'revreview-edited' => 'Neue Bearbeitungen werden als [[{{MediaWiki:Validationpage}}|gesichtete Version]] übernommen, sobald ein Benutzer mit Sichtungsrecht diese freigegeben hat.
Es folgt die Anzeige der aktuellen, ungesichteten Version. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|Änderung steht|Änderungen stehen}}] zur Sichtung an.',
	'revreview-invalid' => "'''Ungültiges Ziel:''' keine [[{{MediaWiki:Validationpage}}|gesichtete]] Version zur angegebenden ID gefunden.",
	'revreview-legend' => 'Inhalt der Version bewerten',
	'revreview-log' => 'Kommentar:',
	'revreview-main' => 'Du musst eine Version zur Markierung auswählen.

Siehe die [[Special:Unreviewedpages|Liste unmarkierter Versionen]].',
	'revreview-newest-basic' => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} → alle]) wurde am <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versionen}}] {{PLURAL:$3|steht|stehen}} noch zur Sichtung an.',
	'revreview-newest-basic-i' => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} alle]) wurde am <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen an Vorlagen/Dateien] stehen noch zur Sichtung an.',
	'revreview-newest-quality' => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte geprüfte Version] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} → alle]) wurde am <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versionen}}] {{PLURAL:$3|steht|stehen}} noch zur Sichtung an.',
	'revreview-newest-quality-i' => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte geprüfte Version] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} alle]) wurde am <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen an Vorlagen/Dateien] stehen noch zur Sichtung an.',
	'revreview-noflagged' => 'Von dieser Seite gibt es keine markierten Versionen, so dass noch keine Aussage über die [[{{MediaWiki:Validationpage}}|Qualität]] gemacht werden kann.',
	'revreview-note' => '[[User:$1|$1]] machte die folgende [[{{MediaWiki:Validationpage}}|Prüfnotiz]] zu dieser Version:',
	'revreview-notes' => 'Anzuzeigende Bemerkungen oder Notizen:',
	'revreview-oldrating' => 'Bisherige Einstufung:',
	'revreview-patrol' => 'Diese Änderung als kontrolliert markieren',
	'revreview-patrol-title' => 'Als kontrolliert markieren',
	'revreview-patrolled' => 'Die ausgewählte Version von [[:$1|$1]] wurde kontrolliert.',
	'revreview-quality' => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|geprüfte]] Version, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.

[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Änderung steht|Änderungen stehen}}] noch zur Prüfung an.',
	'revreview-quality-i' => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|geprüfte]] Version, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
Der [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Entwurf] enthält [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen an Vorlagen/Dateien], die auf eine Sichtung warten.',
	'revreview-quality-old' => 'Dies ist eine [[{{MediaWiki:Validationpage}}|geprüfte]] Version ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} → alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
Neue [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen] können vorgenommen worden sein.',
	'revreview-quality-same' => "Dies ist die letzte [[{{MediaWiki:Validationpage}}|geprüfte]] Version, ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zeige alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>. Die Seite kann '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bearbeitet]''' werden.",
	'revreview-quality-source' => 'Eine [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} geprüfte Version] dieser Seite, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>, basiert auf dieser Version.',
	'revreview-quality-title' => 'Geprüfte Seite',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Gesichtet]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zur aktuellen Version])",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Gesichtet]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} letzte unmarkierte Seite])",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Gesichtet]]'''",
	'revreview-quick-invalid' => "'''Ungültige Versions-ID'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Keine Version gesichtet.]]'''",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Geprüft]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zur aktuellen Version])",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Geprüft]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} letzte unmarkierte Seite])",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Geprüft]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Ungesichtete Version]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} vergleiche])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Ungesichtete Version]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} vergleiche])",
	'revreview-selected' => "Gewählte Version von '''$1:'''",
	'revreview-source' => 'Quelltext',
	'revreview-stable' => 'Stabile Version',
	'revreview-stable-title' => 'Gesichtete Seite',
	'revreview-stable1' => 'Möchtest du die [{{fullurl:$1|stableid=$2}} soeben markierte Version] dieser Seite sehen, falls es jetzt die [{{fullurl:$1|stable=1}} gesichtete Version] dieser Seite ist?',
	'revreview-stable2' => 'Möchtest du die [{{fullurl:$1|stable=1}} gesichtete Version] dieser Seite sehen (falls es noch eine gibt)?',
	'revreview-style' => 'Lesbarkeit',
	'revreview-style-0' => 'nicht freigegeben',
	'revreview-style-1' => 'akzeptabel',
	'revreview-style-2' => 'gut',
	'revreview-style-3' => 'präzise',
	'revreview-style-4' => 'exzellent',
	'revreview-submit' => 'Speichern',
	'revreview-submitting' => 'Übertragung …',
	'revreview-finished' => 'Markierung gesetzt',
	'revreview-failed' => 'Markierung konnte nicht gesetzt werden!',
	'revreview-successful' => "'''Die ausgewählte Version der Seite ''[[:$1|$1]]'' wurde erfolgreich als gesichtet markiert ([{{fullurl:{{#Special:Stableversions}}|page=$2}} alle gesichteten Versionen dieser Seite])'''.",
	'revreview-successful2' => "'''Die Markierung der Version von [[:$1|$1]] wurde erfolgreich aufgehoben.'''",
	'revreview-text' => 'Einer [[{{MediaWiki:Validationpage}}|gesichteten Version]] wird bei der Seitendarstellung der Vorzug vor einer neueren, nicht gesichteten Version gegeben.',
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Gesichtete Versionen]] können als Standardanzeige für Leser eingestellt werden.''",
	'revreview-toggle' => '(+/−)',
	'revreview-toggle-title' => 'Details zeigen/verstecken',
	'revreview-toolow' => 'Du musst für jedes der untenstehenden Attribute einen Wert höher als „{{int:revreview-accuracy-0}}“ einstellen, damit eine Version als gesichtet gilt. Um eine Version zu verwerfen, müssen alle Attribute auf „{{int:revreview-accuracy-0}}“ stehen.',
	'revreview-update' => "Bitte [[{{MediaWiki:Validationpage}}|sichte]] die Änderungen ''(siehe unten)'', die seit der [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} letzten gesichteten Version] vorgenommen wurden.<br />
'''Die folgenden Vorlagen und Dateien wurden verändert:'''",
	'revreview-update-includes' => "'''Einige Vorlagen/Dateien wurden aktualisiert:'''",
	'revreview-update-none' => "Bitte [[{{MediaWiki:Validationpage}}|sichte]] die Änderungen ''(siehe unten)'', die seit der [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} letzten gesichteten Version] vorgenommen wurden.",
	'revreview-update-use' => "'''Bitte beachten:''' Falls eine dieser Vorlagen/Dateien eine gesichtete Version hat, wird diese in der gesichteten Version dieser Seite angezeigt.",
	'revreview-diffonly' => "''Um diese Seite zu sichten, klicke bitte auf den Link „Aktuelle Version“ und verwende die Sichtungsbox dort.''",
	'revreview-visibility' => "'''Diese Seite hat eine aktualisierte [[{{MediaWiki:Validationpage}}|markierte Version]]; die Anzeigeeinstellungen können [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfiguriert] werden.'''",
	'revreview-visibility2' => "'''Diese Seite hat eine veraltete [[{{MediaWiki:Validationpage}}|markierte Version]];
die Anzeigeeinstellungen können [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfiguriert] werden.'''",
	'revreview-visibility3' => "'''Diese Seite hat keine [[{{MediaWiki:Validationpage}}|markierte Version]]; die Anzeigeeinstellungen können [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfiguriert] werden.'''",
	'revreview-revnotfound' => 'Die Version dieser Seite, nach der du suchst, konnte nicht gefunden werden. Bitte überprüfe die URL dieser Seite.',
	'right-autoreview' => 'Automatisches Markieren von Versionen als gesichtet',
	'right-movestable' => 'Verschieben von gesichteten und geprüften Seiten',
	'right-review' => 'Markiere Versionen als gesichtet',
	'right-stablesettings' => 'Konfiguration der Anzeige markierter Versionen',
	'right-validate' => 'Markiere Versionen als geprüft',
	'rights-editor-autosum' => 'automatisch erteilt',
	'rights-editor-revoke' => 'entfernte Prüfer-Status von „[[$1]]“',
	'specialpages-group-quality' => 'Qualitätssicherung',
	'stable-logentry' => 'änderte die Seitenkonfiguration von „[[$1]]“',
	'stable-logentry2' => 'setzte die Seitenkonfiguration für „[[$1]]“ zurück',
	'stable-logpage' => 'Seitenkonfigurations-Logbuch',
	'stable-logpagetext' => 'Dies ist das Änderungslogbuch der Seitenkonfigurationen der [[{{MediaWiki:Validationpage}}|markierten Versionen]].
Siehe auch die [[Special:StablePages|Liste markierter Versionen]].',
	'revreview-filter-all' => 'Alle',
	'revreview-filter-stable' => 'stabil',
	'revreview-filter-approved' => 'Markiert',
	'revreview-filter-reapproved' => 'Inkrementell markiert',
	'revreview-filter-unapproved' => 'Markierung entfernt',
	'revreview-filter-auto' => 'Automatisch',
	'revreview-filter-manual' => 'Manuell',
	'revreview-statusfilter' => 'Statusänderung:',
	'revreview-typefilter' => 'Typ:',
	'revreview-levelfilter' => 'Level:',
	'revreview-lev-sighted' => 'markiert',
	'revreview-lev-quality' => 'geprüft',
	'revreview-lev-pristine' => 'ursprünglich',
	'revreview-reviewlink' => 'sichten',
	'tooltip-ca-current' => 'Ansehen der aktuellen, unmarkierten Seite',
	'tooltip-ca-stable' => 'Ansehen der markierten Version dieser Seite',
	'tooltip-ca-default' => 'Einstellungen Qualitätssicherung',
	'revreview-locked-title' => 'Bearbeitungen müssen markiert werden, bevor sie auf dieser Seite angezeigt werden.',
	'revreview-unlocked-title' => 'Bearbeitungen benötigen keine Markierung, bevor sie auf dieser Seite angezeigt werden.',
	'revreview-locked' => 'Bearbeitungen müssen [[{{MediaWiki:Validationpage}}|markiert]] werden, bevor sie auf dieser Seite angezeigt werden.',
	'revreview-unlocked' => 'Bearbeitungen benötigen [[{{MediaWiki:Validationpage}}|keine Markierung]], bevor sie auf dieser Seite angezeigt werden.',
	'log-show-hide-review' => 'Versionsmarkierungs-Logbuch $1',
	'revreview-tt-review' => 'Markiere diese Seite',
	'validationpage' => '{{ns:help}}:Gesichtete und geprüfte Versionen',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Jens Liebenau
 * @author Umherirrender
 */
$messages['de-formal'] = array(
	'flaggedrevs-backlog' => 'Die [[Special:OldReviewedPages|Liste der Seiten mit ungesichteten Versionen]] ist sehr lang. Bitte helfen Sie mit, sie abzuarbeiten. Danke.',
	'flaggedrevs-watched-pending' => "Es sind aktuell [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} ungesichtete Bearbeitungen] von gesichteten Seiten auf Ihrer Beobachtungsliste. '''Ihre Aufmerksamkeit ist nötig!'''",
	'revreview-auto-w' => "Sie bearbeiten eine gesichtete Version; Bearbeitungen werden '''automatisch als gesichtet''' markiert.",
	'revreview-auto-w-old' => "Sie bearbeiten eine gesichtete Version; Bearbeitungen werden '''automatisch als gesichtet''' markiert.",
	'revreview-blocked' => 'Sie können diese Version nicht markieren, da Ihr Benutzerkonto zurzeit gesperrt ist ([$1 Details]).',
	'revreview-main' => 'Sie müssen eine Version zur Markierung auswählen.

Siehe die [[Special:Unreviewedpages|Liste unmarkierter Versionen]].',
	'revreview-stable1' => 'Möchten Sie die [{{fullurl:$1|stableid=$2}} soeben markierte Version] dieser Seite sehen, falls es jetzt die [{{fullurl:$1|stable=1}} gesichtete Version] dieser Seite ist?',
	'revreview-stable2' => 'Möchten Sie die [{{fullurl:$1|stable=1}} gesichtete Version] dieser Seite sehen (falls es noch eine gibt)?',
	'revreview-toolow' => 'Sie müssen für jedes der untenstehenden Attribute einen Wert höher als „{{int:revreview-accuracy-0}}“ einstellen, damit eine Version als gesichtet gilt. Um eine Version zu verwerfen, müssen alle Attribute auf „{{int:revreview-accuracy-0}}“ stehen.',
	'revreview-diffonly' => "''Um diese Seite zu sichten, klicken Sie bitte auf den Link „Aktuelle Version“ und verwenden die Sichtungsbox dort.''",
	'revreview-revnotfound' => 'Die Version dieser Seite, nach der Sie suchen, konnte nicht gefunden werden. Bitte überprüfen Sie die URL dieser Seite.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 * @author Nepl1
 */
$messages['dsb'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Markěrowane wersije',
	'flaggedrevs-backlog' => "Jo tuchylu zawóstank [[Special:OldReviewedPages|njecynjonych změnow]] pśeglědanych bokow. '''Pšosym źiwaj na to!'''",
	'flaggedrevs-watched-pending' => "Su tuchylu [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} njecynjone změny] pśeglědanych bokow na twójej wobglědowańce. '''Pšosym źiwaj na to!'''",
	'flaggedrevs-desc' => 'Dawa editoram a pśeglědowarjam móžnosć wersije wobwěsćiś a boki stabilizěrowaś',
	'flaggedrevs-pref-UI' => 'Interfejs stabilneje wersije:',
	'flaggedrevs-pref-UI-0' => 'Detailěrowany wužywański pówjerch za stabilne wersije wužywaś',
	'flaggedrevs-pref-UI-1' => 'Jadnory wužywański pówjerch za stabilne wersije wužywaś',
	'prefs-flaggedrevs' => 'Stabilnosć',
	'flaggedrevs-prefs-stable' => 'Stabilnu wersiju wopśimjeśowych bokow pśecej ako standard pokazaś (jolic eksistěrujo)',
	'flaggedrevs-prefs-watch' => 'Boki, kótarež pśeglědujom, wobglědowańkam pśidaś',
	'flaggedrevs-prefs-editdiffs' => 'Pśi wobźěłowanju bokow rozdźěl k stabilnej wersiji pokazaś',
	'group-editor' => 'Editory',
	'group-editor-member' => 'editor',
	'group-reviewer' => 'Pśespytowarje',
	'group-reviewer-member' => 'pśespytowaŕ',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Pśespytowaŕ',
	'group-autoreview' => 'Awtomatiske pśeglědarje',
	'group-autoreview-member' => 'awtomatiski pśeglědaŕ',
	'grouppage-autoreview' => '{{ns:project}}:Awtomatiski pśeglědaŕ',
	'hist-draft' => 'nacerjeńska wersija',
	'hist-quality' => 'kwalitna wersija',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} wobwěsćona] wót wužywarja [[User:$3|$3]]',
	'hist-stable' => 'pśeglědana wersija',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} pśeglědana] wót wužywarja [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} awtomatiski pśeglědany]',
	'review-diff2stable' => 'Rozdźěle mjazy stabilneju a aktualneju wersiju se woglědaś',
	'review-logentry-app' => 'jo wersiju r$2 boka [[$1]] pśespytał',
	'review-logentry-dis' => 'jo wersiju r$2 boka [[$1]] wótgódnośił',
	'review-logentry-id' => 'woglědaś se',
	'review-logentry-diff' => 'rozdźěl k stabilnej wersiji',
	'review-logpage' => 'Protokol pśespytowanjow',
	'review-logpagetext' => 'To jo protokol změnow k statusoju [[{{MediaWiki:Validationpage}}|pśizwólowanja]] wersijow za wopśimjeśowe boki.
Glědaj [[Special:ReviewedPages|lisćinu pśeglědanych bokow]] za lisćinu pśizwólonych bokow.',
	'reviewer' => 'Pśespytowaŕ',
	'revisionreview' => 'wersije pśespytowaś',
	'revreview-accuracy' => 'Kradosć',
	'revreview-accuracy-0' => 'Njeschwalony',
	'revreview-accuracy-1' => 'Pśeglědany',
	'revreview-accuracy-2' => 'Kradny',
	'revreview-accuracy-3' => 'Dobre žrědła pódane',
	'revreview-accuracy-4' => 'Nabejny',
	'revreview-approved' => 'Pśizwólony',
	'revreview-auto' => '(awtomatiski)',
	'revreview-auto-w' => "Wobźěłujoš stabilnu wersiju; změny budu se '''awtomatiski pśeglědowaś'''.",
	'revreview-auto-w-old' => "Wobźěłujoš pśeglědanu wersiju; změny budu se '''awtomatiski pśeglědowaś'''.",
	'revreview-basic' => 'To jo aktualna [[{{MediaWiki:Validationpage}}|pśeglědana]] wersija, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Nacerjenje] ma [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změnu, kótaraž cakajo|změnje, kótarež cakajotej|změny, kótarež cakaju|změnow, kótarež cakaju}}] na pśeglědanje.',
	'revreview-basic-i' => 'To jo aktualna [[{{MediaWiki:Validationpage}}|pśeglědana]] wersija, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Nacerjenje] ma [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny pśedłogow/datajow], kótarež cakaju na pśeglědanje.',
	'revreview-basic-old' => 'To jo [[{{MediaWiki:Validationpage}}|pśeglědana]] wersija ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšykne]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>.
Jo móžno, až nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny] su se pśewjadli.',
	'revreview-basic-same' => 'To jo aktualna [[{{MediaWiki:Validationpage}}|pśeglědana]] wersija ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšykne]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Pśeglědana wersija] toś togo boka, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>, bazěrujo na toś tej wersiji.',
	'revreview-blocked' => 'Njamóžoš toś tu wersiju pśeglědaś, dokulaž twójo konto jo tuchylu zablokěrowane ([$1 drobnostki])',
	'revreview-changed' => "'''Pominana akcija njejo se dała na toś tej wersijej [[:$1|$1]] pśewjasć.'''

Pśedłoga abo dataja jo se snaź pominała bźez pódaśa specifiskeje wersije.
To móžo se staś, jolic dynamiska pśedłoga zapśěgujo drugu dataju abo pśedłogu we wótwisnosći wót wariable, kótaraž jo se změniła, wót togo, ako sy zachopił toś ten bok pśeglědowaś.
Nowozacytanje boka a nowopśeglědowanje móžo toś ten problem rozwězaś.",
	'revreview-current' => 'Nacerjenje',
	'revreview-depth' => 'Dłym',
	'revreview-depth-0' => 'Njeschwalony',
	'revreview-depth-1' => 'Zakładny',
	'revreview-depth-2' => 'Pósrědny',
	'revreview-depth-3' => 'Wusoki',
	'revreview-depth-4' => 'Nabejny',
	'revreview-draft-title' => 'Nacerjeński bok',
	'revreview-edit' => 'Nacerjenje wobźěłaś',
	'revreview-editnotice' => "'''Změny k toś tomu bokoju budu se do [[{{MediaWiki:Validationpage}}|stabilneje wersije]] zapśěgowaś, gaž awtorizěrowany wužywaŕ je pśeglědujo.'''",
	'revreview-flag' => 'Toś tu wersiju pśespytowaś',
	'revreview-edited' => "'''Změny budu se do [[{{MediaWiki:Validationpage}}|stabilneje wersije]] zapśěgowaś, gaž awtorizěrowany wužywaŕ je pśeglědujo.'''
'''''Nacerjenje'' se deleka pokazujo.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|změna cakajo|změnje cakajotej|změny cakaju|změnow cakajo}}] na pśeglědanje.",
	'revreview-invalid' => "'''Njepłaśiwy cel:''' žedna [[{{MediaWiki:Validationpage}}|pśeglědana]] wersija njewótpowědujo danemu ID.",
	'revreview-legend' => 'Wopśimjeśe wersije pógódnośiś',
	'revreview-log' => 'Komentar:',
	'revreview-main' => 'Musyš jadnotliwu wersiju wopśimjeśowego boka za pśeglědanje wubraś.

Glědaj [[Special:Unreviewedpages|lisćinu njepśeglědanych bokow]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Aktualna pśeglědana wersija] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšykne]) jo se [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwaliła] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změnje|změny|změnow}}] {{PLURAL:$3|trjeba|trjebatej|trjebaju|trjeba}} pśeglědanje.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Aktualna pśeglědana wersija] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšykne]) jo se [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwaliła] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny pśedłogi/datajow] trjebaju pśeglědanje.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Aktualna kwalitna wersija] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšykne]) jo se [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwaliła] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změnje|změny|změnow}}] {{PLURAL:$3|trjeba|trjebatej|trjebaju|trjeba}} pśeglědanje.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Aktualna kwalitna wersija] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšykne]) jo se [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwaliła] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny pśedłogow/datajow] trjebaju pśeglědanje.',
	'revreview-noflagged' => "Njejsu žedne pśeglědane wersije toś togo boka, jo móžno, až '''nje'''jo se za kwalitu [[{{MediaWiki:Validationpage}}|pśekontrolěrował]].",
	'revreview-note' => '[[User:$1|$1]] jo slědujuce pśipomnjeśa cynił, gaž jo [[{{MediaWiki:Validationpage}}|pśeglědował]] toś tu wersiju:',
	'revreview-notes' => 'Pśispomneśa abo pśipiski, kótarež maju se zwobrazniś:',
	'revreview-oldrating' => 'Doněntejšne pógódnośenje:',
	'revreview-patrol' => 'Toś tu změnu ako doglědowanu markěrowaś',
	'revreview-patrol-title' => 'Ako doglědowany markěrowaś',
	'revreview-patrolled' => 'Wubrana wersija [[:$1|$1]] jo se markěrowała ako doglědowana.',
	'revreview-quality' => 'To jo aktualna [[{{MediaWiki:Validationpage}}|kwalitna]] wersija, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Nacerjenje] ma [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změnu, kótaraž caka|změnje, kótarejž cakatej|změny, kótarež cakaju|změnow, kótarež cakaju}}] na pśeglědanje.',
	'revreview-quality-i' => 'To jo aktualna [[{{MediaWiki:Validationpage}}|kwalitna]] wersija, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Nacerjenje] ma [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny pśedłogow/datajow], kótarež cakaju na pśeglědanje.',
	'revreview-quality-old' => 'To jo [[{{MediaWiki:Validationpage}}|kwalitna]]  wersija ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšykne]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>.
Jo móžno, až nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny] su se pśewjadli.',
	'revreview-quality-same' => 'To jo aktualna [[{{MediaWiki:Validationpage}}|kwalitna]] wersija ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšykne]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Kwalitna wersija] toś togo boka, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalona] <i>$2</i>, bazěrujo na toś tej wersiji.',
	'revreview-quality-title' => 'Kwalitny bok',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pśeglědany bok]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nacerjenje se woglědaś]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Pśeglědany bok]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nacerjenje se woglědaś]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pśeglědany bok]]'''",
	'revreview-quick-invalid' => "'''Njepłaśiwy wersijowy ID'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Aktualna wersija]]''' (njepśěglědany)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kwalitny bok]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nacerjenje se woglědaś]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kwalitny bok]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nacerjenje se woglědaś]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kwalitny bok]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Nacerjenje]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} bok se woglědaś]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} pśirownaś])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Nacerjenje]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} bok se woglědaś]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} pśirownaś])",
	'revreview-selected' => "Wubrana wersija wót wužywarja '''$1:'''",
	'revreview-source' => 'nacerjeńske žrědło',
	'revreview-stable' => 'Stabilny bok',
	'revreview-stable-title' => 'Pśeglědany bok',
	'revreview-stable1' => 'Snaź coš se [{{fullurl:$1|stableid=$2}} toś tu markěrowanu wersiju] woglědaś a wiźeś, lěc jo něnto [{{fullurl:$1|stable=1}} stabilna wersija] toś togo boka.',
	'revreview-stable2' => 'Snaź coš se [{{fullurl:$1|stable=1}} stabilnu wersiju] toś togo boka woglědaś (jolic hyšći jadna eksistěrujo).',
	'revreview-style' => 'Cytajobnosć',
	'revreview-style-0' => 'Njeschwalony',
	'revreview-style-1' => 'Akceptabelny',
	'revreview-style-2' => 'Dobry',
	'revreview-style-3' => 'Krotki a słodki',
	'revreview-style-4' => 'Nabejny',
	'revreview-submit' => 'Wótpósłaś',
	'revreview-submitting' => 'Wótpósćeła se...',
	'revreview-finished' => 'Pśespytowanje dokóńcone!',
	'revreview-failed' => 'Pśeglědanje jo se njeraźiło!',
	'revreview-successful' => "'''Wersija nastawka [[:$1|$1]] jo se wuspěšnje markěrowała. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} stabilne wersije se woglědaś])'''",
	'revreview-successful2' => "'''Markěrowanje [[:$1|$1]] jo se wuspěšnje wótpórało.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabilne wersije]] su skerjej standardne bokowe wopśimjeśe za pśeglědowarjow ako nejnowša wersija.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabilne wersije]] su pśekontrolěrowane wersije bokow a daju se ako standardne wopśimjeśe za pśeglědowarjow nastajiś.''",
	'revreview-toggle-title' => 'drobnostki pokazaś/schowaś',
	'revreview-toolow' => 'Musyš nanejmjenjej kuždy ze slědujucych atributow wušej ako "njeschwalony" pógódnośiś, aby wersija płaśeła ako pśeglědana.
Aby wótgódnośił wersiju, staj wšykne póla na "njeschwalony".',
	'revreview-update' => "Pšosym [[{{MediaWiki:Validationpage}}|pśeglědaj]] ''(slědujuce)'' změny, kótarež su cynili, wót togo, ako stabilna wersija jo se [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwaliła].<br /> '''Někotare pśedłogi/dataje su se zaktualizěrowali:'''",
	'revreview-update-includes' => "'''Někotare pśedłogi/dataje su se zaktualizěrowali:'''",
	'revreview-update-none' => "Pšosym [[{{MediaWiki:Validationpage}}|pśeglědaj]] ''(slědujuce)'' změny, kótarež su se pśewjadli, wót togo casa, ako stabilna wersija jo se [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwaliła].",
	'revreview-update-use' => "'''GLĚDAJ:''' Jeli jadna z toś tych pśedłogow/datajow ma stabilnu wersiju, pótom wužywa se južo w stabilnej wersiji boka.",
	'revreview-diffonly' => "''Aby pśeglědał bok, klikni na wótkaz \"Aktualna wersija\" a wužyj pśeglědański kašćik.''",
	'revreview-visibility' => "'''Toś ten bok ma zaktualizěrowanu [[{{MediaWiki:Validationpage}}|stabilnu wersiju]]; nastajenja wó stabilnosći boka daju se [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigurěrowaś].'''",
	'revreview-visibility2' => "'''Toś ten bok ama zestarjonu [[{{MediaWiki:Validationpage}}|stabilnu wersiju]]; nastajenja wó stabilnosći boka daju se [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigurěrowaś].'''",
	'revreview-visibility3' => "'''Toś ten bok njama [[{{MediaWiki:Validationpage}}|stabilnu wersiju]]; nastajenja stabilnosći boka daju se [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigurěrowaś].'''",
	'revreview-revnotfound' => 'Njejo móžno było, wersiju togo boka namakaś, za kótaremž sy pytał. Pšosym kontrolěruj zapódanu URL.',
	'right-autoreview' => 'Wersije awtomatiski ako pśeglědane markěrowaś',
	'right-movestable' => 'Stabilne boki pśesunuś',
	'right-review' => 'Wersije ako pśeglědane markěrowaś',
	'right-stablesettings' => 'Konfigurěrowaś, kak stabilna wersija se wuběra a zwobraznjujo',
	'right-validate' => 'Wersije ako wobswěsćone markěrowaś',
	'rights-editor-autosum' => 'awtomatiski pówušony',
	'rights-editor-revoke' => 'jo status editora wót [[$1]] wótpórał',
	'specialpages-group-quality' => 'Zawěsćenje kwality',
	'stable-logentry' => 'jo stabilnu wersiju za [[$1]] konfigurěrował',
	'stable-logentry2' => 'jo konfiguraciju za stabilnu wersiju za [[$1]] slědk stajił',
	'stable-logpage' => 'Protokol stabilnosći',
	'stable-logpagetext' => 'To jo protokol změnow ku konfiguraciji [[{{MediaWiki:Validationpage}}|stabilneje wersije]] wopśimjeśowych bokow.
Lisćina stabilizěrowanych bokow dajo se w [[Special:StablePages|lisćinje stabilnych bokow]] namakaś.',
	'revreview-filter-all' => 'Wše',
	'revreview-filter-stable' => 'stabilny',
	'revreview-filter-approved' => 'Schwalony',
	'revreview-filter-reapproved' => 'Znowego schwalony',
	'revreview-filter-unapproved' => 'Njeschwalony',
	'revreview-filter-auto' => 'Awtomatiski',
	'revreview-filter-manual' => 'Manuelny',
	'revreview-statusfilter' => 'Změnjenje statusa:',
	'revreview-typefilter' => 'Typ:',
	'revreview-levelfilter' => 'Rownina:',
	'revreview-lev-sighted' => 'pśeglědana',
	'revreview-lev-quality' => 'kwalitna',
	'revreview-lev-pristine' => 'spoćetna',
	'revreview-reviewlink' => 'pśeglědaś',
	'tooltip-ca-current' => 'Aktualne nacerjenje toś togo boka se woglědaś',
	'tooltip-ca-stable' => 'Stabilnu wersiju toś togo boka se woglědaś',
	'tooltip-ca-default' => 'Nastajenja zawěsćenja kwality',
	'revreview-locked-title' => 'Změny muse se pśeglědaś, pjerwjej až zwobraznjuju se na toś tom boku!',
	'revreview-unlocked-title' => 'Změny njetrjebaju pśeglědanje, až njezwobraznjuju na toś tom boku.',
	'revreview-locked' => 'Změny muse se pśeglědaś, pjerwjej až zwobraznjuju se na toś tom boku!',
	'revreview-unlocked' => 'Změny njetrjebaju pśeglědanje, aby se zwobraznili na toś tom boku!',
	'log-show-hide-review' => 'Protokol pśespytanjow $1',
	'revreview-tt-review' => 'Toś ten bok pśespytowaś',
	'validationpage' => '{{ns:help}}:Wobwěsćenje bokow',
);

/** Greek (Ελληνικά)
 * @author Badseed
 * @author Consta
 * @author Crazymadlover
 * @author Dead3y3
 * @author Omnipaedista
 * @author ZaDiak
 */
$messages['el'] = array(
	'editor' => 'Συντάκτης',
	'flaggedrevs' => 'Ελεγμένες Αναθεωρήσεις',
	'flaggedrevs-desc' => 'Δίνει τη δυνατότητα στους συντάκτες και τους επανεξεταστές να αξιολογίσουν εκδόσεις και να σταθεροποιήσουν σελίδες',
	'flaggedrevs-pref-UI' => 'Διεπαφή σταθερής έκδοσης',
	'prefs-flaggedrevs' => 'Σταθερότητα',
	'flaggedrevs-prefs-watch' => 'Πρόσθεσε τις σελίδες που επιθεωρώ στη λίστα παρακολούθησής μου',
	'group-editor' => 'Επεξεργαστές',
	'group-editor-member' => 'συντάκτης',
	'group-reviewer' => 'Επανεξεταστές',
	'group-reviewer-member' => 'κριτικός',
	'grouppage-editor' => '{{ns:project}}:Συντάκτης',
	'grouppage-reviewer' => '{{ns:project}}:Κριτικός',
	'group-autoreview' => 'Αυτοελεγκτές',
	'group-autoreview-member' => 'αυτοελεγκτής',
	'grouppage-autoreview' => '{{ns:project}}:Αυτοελεγκτής',
	'hist-draft' => 'πρόχειρη αναθεώρηση',
	'hist-quality' => 'έκδοση ποιότητας',
	'hist-stable' => 'θεάσιμη έκδοση',
	'review-logentry-app' => 'εξετάστηκε η r$2 της [[$1]]',
	'review-logentry-dis' => 'αποδοκιμάστηκε η r$2 της [[$1]]',
	'review-logentry-id' => 'εμφάνιση',
	'review-logentry-diff' => 'διαφορά από τη σταθερή έκδοση',
	'review-logpage' => 'Αρχείο επιθεωρήσεων',
	'reviewer' => 'Κριτικός',
	'revisionreview' => 'Κριτική αναθεωρήσεων',
	'revreview-accuracy' => 'Ακρίβεια',
	'revreview-accuracy-0' => 'Μη εγκεκριμένο',
	'revreview-accuracy-1' => 'Επιθεωρημένο',
	'revreview-accuracy-2' => 'Ακριβές',
	'revreview-accuracy-3' => 'Με επαρκείς πηγές',
	'revreview-accuracy-4' => 'Επιλεγμένο',
	'revreview-approved' => 'Εγκεκριμένο',
	'revreview-auto' => '(αυτόματο)',
	'revreview-auto-w-old' => "Επεξεργάζεσαι μια παλιά επιθεωρημένη αναθεώρηση. Οι αλλαγές θα '''αναθεωρηθούν αυτόματα'''.",
	'revreview-current' => 'Προσχέδιο',
	'revreview-depth' => 'Βάθος',
	'revreview-depth-0' => 'Μη εγκεκριμένο',
	'revreview-depth-1' => 'Βασικό',
	'revreview-depth-2' => 'Μέτριο',
	'revreview-depth-3' => 'Υψηλό',
	'revreview-depth-4' => 'Εξαίρετο',
	'revreview-draft-title' => 'Πρόχειρη σελίδα',
	'revreview-edit' => 'Επεξεργασία προσχεδίου',
	'revreview-flag' => 'Επιθεώρησε αυτή την τροποποίηση',
	'revreview-legend' => 'Βαθμολόγησε το περιεχόμενο της τροποποίησης',
	'revreview-log' => 'Σχόλιο:',
	'revreview-notes' => 'Εμφάνιση παρατηρήσεων ή σημειώσεων:',
	'revreview-oldrating' => 'Βαθμολογήθηκε:',
	'revreview-patrol' => 'Μάρκαρε αυτήν την αλλαγή ως ελεγμένη',
	'revreview-patrol-title' => "Να σημειωθεί 'υπό παρακολούθηση'",
	'revreview-quality-title' => 'Σελίδα ποιότητας',
	'revreview-quick-invalid' => "'''Άκυρος κωδικός αναθεώρησης'''",
	'revreview-selected' => "Επιλεγμένη έκδοση του '''$1:'''",
	'revreview-source' => 'Πηγή προσχεδίου',
	'revreview-stable' => 'Σταθερή σελίδα',
	'revreview-stable-title' => 'Επιθεωρημένη σελίδα',
	'revreview-style' => 'Αναγνωσιμότητα',
	'revreview-style-0' => 'Μη εγκεκριμένο',
	'revreview-style-1' => 'Αποδεκτό',
	'revreview-style-2' => 'Καλό',
	'revreview-style-3' => 'Περιεκτικό',
	'revreview-style-4' => 'Επιλεγμένο',
	'revreview-submit' => 'Υποβολή',
	'revreview-submitting' => 'Υποβολή ...',
	'revreview-finished' => 'Η επιθεώρηση ολοκληρώθηκε!',
	'revreview-failed' => 'Η επιθεώρηση απέτυχε!',
	'revreview-toggle-title' => 'εμφάνιση/απόκρυψη λεπτομερειών',
	'revreview-revnotfound' => 'Η παλιά αναθεώρηση της σελίδας που ζητήσατε δεν ήταν δυνατόν να βρεθεί. Παρακαλούμε ελέγξτε τo URL που χρησιμοποιήσατε για να φτάσετε σε αυτήν τη σελίδα.',
	'right-autoreview' => 'Αυτόματη σήμανση αναθεωρήσεων ως επιθεωρημένων',
	'right-movestable' => 'Μετακίνηση σταθερών σελίδων',
	'right-review' => 'Σἠμανση επεξεργασιών ως επιθεωρημένων',
	'right-validate' => 'Σἠμανση επεξεργασιών ως επικυρωμένων',
	'rights-editor-autosum' => 'αυτόματα προωθημένο',
	'specialpages-group-quality' => 'Διαβεβαίωση ποιότητας',
	'stable-logpage' => 'Αρχείο καταγραφής σταθερών εκδόσεων',
	'revreview-filter-all' => 'όλες',
	'revreview-filter-stable' => 'σταθερός',
	'revreview-filter-approved' => 'Εγκεκριμένο',
	'revreview-filter-reapproved' => 'Ξαναεγκρίθηκε',
	'revreview-filter-unapproved' => 'Μη επικυρωμένη',
	'revreview-filter-auto' => 'Αυτόματος',
	'revreview-filter-manual' => 'Χειροκίνητο',
	'revreview-statusfilter' => 'Αλλαγή κατάστασης:',
	'revreview-typefilter' => 'Τύπος:',
	'revreview-levelfilter' => 'Επίπεδο:',
	'revreview-lev-sighted' => 'επιθεωρημένη',
	'revreview-lev-quality' => 'ποιότητα',
	'revreview-lev-pristine' => 'μη αλλοιωμένο',
	'revreview-reviewlink' => 'επιθεώρηση',
	'tooltip-ca-current' => 'Δείτε το υπάρχον προσχέδιο για αυτή τη σελίδα',
	'tooltip-ca-stable' => 'Προβολή της σταθερής έκδοσης αυτής της σελίδας',
	'tooltip-ca-default' => 'Παράμετροι επιβεβαίωσης ποιότητας',
	'log-show-hide-review' => '$1 αρχείο επιθεωρήσεων',
	'revreview-tt-review' => 'Επιθεώρηση αυτής της σελίδας',
	'validationpage' => '{{ns:help}}:Επικύρωση σελίδας',
);

/** Esperanto (Esperanto)
 * @author ArnoLagrange
 * @author Yekrats
 */
$messages['eo'] = array(
	'editor' => 'Revizianto',
	'flaggedrevs' => 'Markitaj Versioj',
	'flaggedrevs-backlog' => "Estas nune amaso de [[Special:OldReviewedPages|kontrolendaj redaktoj]] por kontrolitaj paĝoj. '''Via atento estas bezonata!'''",
	'flaggedrevs-watched-pending' => "Estas [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} ne-reviziitaj redaktoj] de reviziitaj paĝoj en via atentaro. '''Via atento estas bezonata!'''",
	'flaggedrevs-desc' => 'Rajtigas al reviziantoj kaj kontrolantoj la kapablon validigi versiojn kaj stabiligi paĝojn',
	'flaggedrevs-pref-UI' => 'Interfaco por stabila versio:',
	'flaggedrevs-pref-UI-0' => 'Uzi detalan stabilan version por uzulinterfaco',
	'flaggedrevs-pref-UI-1' => 'Uzi simplan uzulinterfacon de stabilaj versioj',
	'prefs-flaggedrevs' => 'Stabileco',
	'flaggedrevs-prefs-stable' => 'Ĉiam defaŭlte montri la stabilan version (se ĝi ekzistas)',
	'flaggedrevs-prefs-watch' => 'Aldoni miajn kontrolitajn paĝojn al mia atentaro',
	'group-editor' => 'Reviziantoj',
	'group-editor-member' => 'Revizianto',
	'group-reviewer' => 'Kontrolantoj',
	'group-reviewer-member' => 'Kontrolanto',
	'grouppage-editor' => '{{ns:project}}:Revizianto',
	'grouppage-reviewer' => '{{ns:project}}:Kontrolanto',
	'group-autoreview' => 'Aŭtomataj kontrolantoj',
	'group-autoreview-member' => 'Aŭtomata kontrolanto',
	'grouppage-autoreview' => '{{ns:project}}:Aŭtomata kontrolanto',
	'hist-draft' => 'malneta versio',
	'hist-quality' => 'kvalita versio',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validigita] de [[User:$3|$3]]',
	'hist-stable' => 'reviziita versio',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} reviziita] de [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} aŭtomate reviziita]',
	'review-diff2stable' => 'Vidi ŝanĝojn inter stabila kaj nuna versioj',
	'review-logentry-app' => 'kontrolis v$2 de [[$1]]',
	'review-logentry-dis' => 'evitinda r$2 de [[$1]]',
	'review-logentry-id' => 'vidi',
	'review-logentry-diff' => 'diferenco de stabila versio',
	'review-logpage' => 'Protokolo de revizioj',
	'review-logpagetext' => 'Jen protokolo de ŝanĝoj al [[{{MediaWiki:Validationpage}}|aprobstatuso]] de versioj por enhavaj paĝoj.
Rigardu la [[Special:ReviewedPages|liston de kontrolitaj paĝoj]] por listo de aprobitaj paĝoj.',
	'reviewer' => 'Kontrolanto',
	'revisionreview' => 'Kontroli versiojn',
	'revreview-accuracy' => 'Stato',
	'revreview-accuracy-0' => 'Malkonsentita',
	'revreview-accuracy-1' => 'Reviziita',
	'revreview-accuracy-2' => 'Fidela',
	'revreview-accuracy-3' => 'Dokumentita',
	'revreview-accuracy-4' => 'Elstara',
	'revreview-approved' => 'Konsentita',
	'revreview-auto' => '(aŭtomata)',
	'revreview-auto-w' => "Vi redaktas stabilan version. Ŝanĝoj estos '''aŭtomate kontrolitaj'''.",
	'revreview-auto-w-old' => "Vi redaktas kontrolitan version. Ŝanĝoj estos '''aŭtomate kontrolitaj'''.",
	'revreview-basic' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|reviziita]] versio, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] atendas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ŝanĝon|ŝanĝojn}}].',
	'revreview-basic-i' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|vidita]] revizio, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] havas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝablonajn/bildajn ŝanĝojn] atendantajn kontroladon.',
	'revreview-basic-old' => 'Jen [[{{MediaWiki:Validationpage}}|reviziita]] versio ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
Novaj [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝanĝoj] eble estis faritaj.',
	'revreview-basic-same' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|reviziita]] versio ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Reviziita versio] de ĉi tiu paĝo, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>, estis bazita de ĉi tiu versio.',
	'revreview-blocked' => 'Vi ne povas kontroli ĉi tiun revizion ĉar via konto estas nune forbarita ([$1 detaloj])',
	'revreview-changed' => "'''La petita ago ne povas esti farita por ĉi tiu versio de [[:$1|$1]].'''

Ŝablono aŭ bildo verŝajne estis petita kiam nenia aparta versio estis petita.
Ĉi tiel povas okzi se malstatika ŝablono transinkluzivas alian dosieron aŭ ŝablonon depende de variablo kiu ŝanĝis ekde vi ekkontrolis ĉi tiun paĝon.
Refreŝigo de la paĝo kaj rekontrolo povas solvi ĉi tiun problemon.",
	'revreview-current' => 'Malneto',
	'revreview-depth' => 'Profundeco',
	'revreview-depth-0' => 'Malaprobita',
	'revreview-depth-1' => 'Baza',
	'revreview-depth-2' => 'Modere',
	'revreview-depth-3' => 'Grande',
	'revreview-depth-4' => 'Elstara',
	'revreview-draft-title' => 'Malneta versio',
	'revreview-edit' => 'Redakti malneton',
	'revreview-editnotice' => "'''Notu: Redaktoj al ĉi tiu paĝo estos enmetitaj en la [[{{MediaWiki:Validationpage}}|stabilan version]] post aŭtoritata uzanto kontrolis ilin.'''",
	'revreview-flag' => 'Marki ĉi tiun version',
	'revreview-edited' => "'''Redaktoj estos enmetitaj en la [[{{MediaWiki:Validationpage}}|stabilan version]] post kiam  ensalutinta uzulo kontrolis ilin.
La ''malneto'' estas montrita sube.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|ŝanĝo|ŝanĝoj}}] bezonas kontrolon.",
	'revreview-invalid' => "'''Nevalida celo:''' neniu [[{{MediaWiki:Validationpage}}|kontrolita]] versio kongruas la enigitan identigon.",
	'revreview-legend' => 'Taksi enhavon de versio',
	'revreview-log' => 'Komento:',
	'revreview-main' => 'Vi devas elekti apartan version de enhava paĝo por revizii.

Vidu la [[Special:Unreviewedpages|liston de nereviziitaj paĝoj]] .',
	'revreview-newest-basic' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plej lasta reviziita versio] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listigi ĉiujn]) estis [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ŝanĝo|ŝanĝoj}}] bezonas kontrolon.',
	'revreview-newest-basic-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lasta reviziita versio] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} montri ĉiujn]) estis  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝablonaj/bildaj ŝanĝoj] atendas kontrolon.',
	'revreview-newest-quality' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plej lasta bonkvalita versio] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} montri ĉiujn]) estis [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ŝanĝo|ŝanĝoj}}] bezonas kontrolon.',
	'revreview-newest-quality-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lasta kvalita versio] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} montri ĉiujn]) estis [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Ŝablonaj/bildaj ŝanĝoj] bezonas kontrolon.',
	'revreview-noflagged' => "Estas neniuj versioj de ĉi tiu paĝo, do ĝi eble '''ne''' estis [[{{MediaWiki:Validationpage}}|kvalite kontrolita]].",
	'revreview-note' => '[[User:$1|$1]] faris la jenan noton en [[{{MediaWiki:Validationpage}}|kontrolo]] de ĉi tiu versio:',
	'revreview-notes' => 'Rimarko aŭ notoj por montri:',
	'revreview-oldrating' => 'Ĝi estis taksita:',
	'revreview-patrol' => 'Marki ĉi tiun ŝanĝon kiel patrolitan',
	'revreview-patrol-title' => 'Marki kiel patrolitan',
	'revreview-patrolled' => 'La elektita versio de [[:$1|$1]] estis markita kiel patrolita.',
	'revreview-quality' => 'Jen la plej lasta [[{{MediaWiki:Validationpage}}|bonkvalita]] versio, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ŝanĝo|ŝanĝoj}}] atendas kontrolon.',
	'revreview-quality-i' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|bonkvalita]] versio, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] atendas kontrolon de [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝablonaj/bildaj ŝanĝoj].',
	'revreview-quality-old' => 'Jen [[{{MediaWiki:Validationpage}}|bonkvalita]] versio ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
Novaj [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝanĝoj] eble estis faritaj.',
	'revreview-quality-same' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|bonkvalita]] versio ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Bonkvalita versio] de ĉi tiu paĝo, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>, estis bazita de ĉi tiu versio.',
	'revreview-quality-title' => 'Bonkvalita paĝo',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Reviziita paĝo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Reviziita paĝo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Reviziita paĝo]]'''",
	'revreview-quick-invalid' => "'''Nevalida identigo de versio'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Nuna versio]]''' (nereviziita)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Bonkvalita paĝo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Bonkvalita paĝo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Bonkvalita paĝo]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Malneto]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} rigardi paĝon]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} kompari])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Malneto]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} rigardi paĝon]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} kompari])",
	'revreview-selected' => "Elektis version de '''$1:'''",
	'revreview-source' => 'malneta fonto',
	'revreview-stable' => 'Stabila paĝo',
	'revreview-stable-title' => 'Reviziita paĝo',
	'revreview-stable1' => 'Ĉu vi volas rigardi [{{fullurl:$1|stableid=$2}} la ĵus markitan version] por vidi, ĉu ĝi nun estas la [{{fullurl:$1|stable=1}} reviziita kaj montrata versio] de ĉi tiu paĝo?',
	'revreview-stable2' => 'Ĉu vi volas rigardi la [{{fullurl:$1|stable=1}} stabilan version] de ĉi tiu paĝo (se iu ekzistas)?',
	'revreview-style' => 'Legebleco',
	'revreview-style-0' => 'Malaprobita',
	'revreview-style-1' => 'Akceptinda',
	'revreview-style-2' => 'Bona',
	'revreview-style-3' => 'Konciza',
	'revreview-style-4' => 'Elstara',
	'revreview-submit' => 'Konservi',
	'revreview-submitting' => 'Sendante...',
	'revreview-finished' => 'Versio markita!',
	'revreview-failed' => 'Kontrolo malsukcesis!',
	'revreview-successful' => "'''Tiu ĉi versio de [[:$1|$1]] estas markita kiel reviziita. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} vidi ĉiujn markitajn versiojn])'''",
	'revreview-successful2' => "'''Versio de [[:$1|$1]] sukcese malmarkita.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabilaj versioj]] estas la defaŭlta enhavo por vidantoj anstataŭ la lasta versio.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabilaj versioj]] estas kontrolita versioj de paĝoj kaj povas defaŭlte montri tiun enhavon por legantoj.''",
	'revreview-toggle-title' => 'montri/kaŝi detalojn',
	'revreview-toolow' => 'Vi devas taksi ĉiun de la jenaj atribuoj almenaŭ pli alta ol "malaprobita" por versio esti konsiderata kiel kontrolita.
Malvalidigi version, faru ĉiujn kampojn kiel "malaprobita".',
	'revreview-update' => "Bonvolu [[{{MediaWiki:Validationpage}}|kontroli]] iuj ajn ŝanĝoj ''(sube montritaj)'' faritaj ekde la stabila versio estis [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita].<br />
'''Iuj ŝablonoj/bildoj estis ĝisdatigitaj:'''",
	'revreview-update-includes' => "'''Iuj ŝablonoj/bildoj estis ĝisdatigitaj:'''",
	'revreview-update-none' => "Bonvolu [[{{MediaWiki:Validationpage}}|kontroli]] ĉiujn ŝanĝojn ''(sube montritajn)'' faritajn post kiam la stabila versio estis [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobita].",
	'revreview-update-use' => "'''NOTU:''' Se iuj ajn de ĉi tiuj ŝablonoj/bildoj havas stabilan version, tiel ĝi jam estas uzata en la stabila revizio de ĉi tiu paĝo.",
	'revreview-diffonly' => "''Por kontroli la paĝon, klaku la ligilon \"nuna versio\" kaj uzu la kontrolo-paĝon.''",
	'revreview-visibility' => "'''Ĉi tiu paĝo havas [[{{MediaWiki:Validationpage}}|stabilan version]]; preferoj pri stabileco estas [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigureblaj].'''",
	'revreview-visibility2' => "'''Ĉi tiu paĝo havas neĝisdatan [[{{MediaWiki:Validationpage}}|stabilan version]]; agordoj pri stabileco estas [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigureblaj].'''",
	'revreview-visibility3' => "'''Ĉi tiu paĝo ne havas [[{{MediaWiki:Validationpage}}|stabilan version]]; agordoj pri paĝa stabileco estas [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigureblaj].'''",
	'revreview-revnotfound' => 'Ne eblis trovi malnovan version de la artikolo kiun vi petis.
Bonvolu kontroli la retadreson (URL) kiun vi uzis por atingi la paĝon.\\b',
	'right-autoreview' => 'Aŭtomate marki versiojn kiel reviziitajn',
	'right-movestable' => 'Movi stabilajn paĝojn',
	'right-review' => 'Marki versiojn kiel reviziitajn',
	'right-stablesettings' => 'Konfiguri kiel la stabila versio estas elektita kaj montrita',
	'right-validate' => 'Marki versiojn kiel validigitajn',
	'rights-editor-autosum' => 'aŭtomate rangaltigita',
	'rights-editor-revoke' => 'forigis revizianto-rajton de [[$1]]',
	'specialpages-group-quality' => 'Kvalitkontrolo',
	'stable-logentry' => 'konfiguris stabil-redakciadon por [[$1]]',
	'stable-logentry2' => 'restarigi stabilan versiigado por [[$1]]',
	'stable-logpage' => 'Loglibro pri stabilaj versioj',
	'stable-logpagetext' => 'Jen protokolo de ŝanĝoj al la konfiguro de [[{{MediaWiki:Validationpage}}|stabila versio]] de enhavaj paĝoj.

Listo de stabiligitaj paĝoj estas trovebla ĉe la [[Special:StablePages|Listo de stabilaj paĝoj]].',
	'revreview-filter-all' => 'Ĉio',
	'revreview-filter-stable' => 'stabila',
	'revreview-filter-approved' => 'Konsentita',
	'revreview-filter-reapproved' => 'Rekonsentita',
	'revreview-filter-unapproved' => 'Malkonsentita',
	'revreview-filter-auto' => 'Aŭtomata',
	'revreview-filter-manual' => 'Permana',
	'revreview-statusfilter' => 'Statusa ŝanĝo:',
	'revreview-typefilter' => 'Speco:',
	'revreview-levelfilter' => 'Nivelo:',
	'revreview-lev-sighted' => 'kontrolita',
	'revreview-lev-quality' => 'bonkvalita',
	'revreview-lev-pristine' => 'netega',
	'revreview-reviewlink' => 'revizii',
	'tooltip-ca-current' => 'Vidi la nunan malneton de ĉi tiu paĝo',
	'tooltip-ca-stable' => 'Rigardi la stabilan version de ĉi paĝo',
	'tooltip-ca-default' => 'Konfiguro de kvalitkontrolo',
	'revreview-locked-title' => 'Redaktoj devas esti kontrolitaj antaŭ montro de ĉi tiu paĝo!',
	'revreview-unlocked-title' => 'Redaktoj ne devas esti kontrolitaj antaŭ montrante de ĉi tiu paĝo!',
	'revreview-locked' => 'Redaktoj devas esti kontrolitaj antaŭ montro de ĉi tiu paĝo!',
	'revreview-unlocked' => 'Redaktoj ne devas esti kontrolitaj antaŭ montrante de ĉi tiu paĝo!',
	'log-show-hide-review' => '$1 protokolo pri kontrolado',
	'revreview-tt-review' => 'Kontroli ĉi tiun paĝon',
	'validationpage' => '{{ns:help}}:Validigo de paĝo',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Drini
 * @author Imre
 * @author Lin linao
 * @author Locos epraix
 * @author McDutchie
 * @author Sanbec
 */
$messages['es'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Revisiones verificadas',
	'flaggedrevs-backlog' => "Actualmente hay un retraso de [[Special:OldReviewedPages|ediciones pendientes]] a páginas revisadas. '''¡Se necesita de tu atención!!''",
	'flaggedrevs-watched-pending' => "Hay actualmente [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} ediciones pendientes] a páginas revisadas en tu lista de vigilancia. '''Se necesita tu atención!'''",
	'flaggedrevs-desc' => 'Da a los editores la habilidad de validar revisiones y estabilizar páginas',
	'flaggedrevs-pref-UI' => 'Interface de versión estable:',
	'flaggedrevs-pref-UI-0' => 'Usar la versión detallada de la interfaz de versiones estables',
	'flaggedrevs-pref-UI-1' => 'Usar la versión simple de la interfaz de versiones estables',
	'prefs-flaggedrevs' => 'Estabilidad',
	'flaggedrevs-prefs-stable' => 'Por defecto, muestra siempre la versión estable (si existe) de las páginas',
	'flaggedrevs-prefs-watch' => 'Añadir a mi lista de seguimiento las páginas que revise.',
	'flaggedrevs-prefs-editdiffs' => 'Mostrar diferencias a estabilizar cuando edite páginas',
	'group-editor' => 'Editores',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Revisores',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'group-autoreview' => 'Autorevisores',
	'group-autoreview-member' => 'autorevisor',
	'grouppage-autoreview' => '{{ns:project}}:Autorevisor',
	'hist-draft' => 'bosquejo de revisión',
	'hist-quality' => 'revisión de calidad',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validada] por [[User:$3|$3]]',
	'hist-stable' => 'Revisiones vistas',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} observada] por [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} observada automaticamente]',
	'review-diff2stable' => 'Ver cambios entre la revisiones estable y actual',
	'review-logentry-app' => 'revisado r$2 de [[$1]]',
	'review-logentry-dis' => 'depreciada r$2 de [[$1]]',
	'review-logentry-id' => 'Ver',
	'review-logentry-diff' => 'diferente al estable',
	'review-logpage' => 'Registro de revisión',
	'review-logpagetext' => 'Este es un registro de cambios al status de [[{{MediaWiki:Validationpage}}|aprobaciones]] de revisiones para páginas de contenido.
Ver la [[Special:ReviewedPages|lista de páginas revisadas]] para una lista de páginas aprobadas.',
	'reviewer' => 'Revisor',
	'revisionreview' => 'Verificar revisiones',
	'revreview-accuracy' => 'Pertinencia',
	'revreview-accuracy-0' => 'Desaprobado',
	'revreview-accuracy-1' => 'Visto',
	'revreview-accuracy-2' => 'Adecuado',
	'revreview-accuracy-3' => 'Bien documentada',
	'revreview-accuracy-4' => 'Destacado',
	'revreview-approved' => 'Aprobado',
	'revreview-auto' => '(automático)',
	'revreview-auto-w' => "Estás editando la versión estable. Los cambios serán '''automáticamente revisados'''.",
	'revreview-auto-w-old' => "Estás editando una versión revisada, los cambios serán '''automáticamente revisados'''.",
	'revreview-basic' => 'Esta es la última [[{{MediaWiki:Validationpage}}|revisión]] vista, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] esperando revisión.',
	'revreview-basic-i' => 'Esta es la última revisión [[{{MediaWiki:Validationpage}}|vista]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios de plantilla/archivo] esperando revisión.',
	'revreview-basic-old' => 'Esta es una revisión [[{{MediaWiki:Validationpage}}|observada]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todo]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobado] en <i>$2</i>.
Nuevos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios] pueden haber sido hechos',
	'revreview-basic-same' => 'Esta es la última revisión [[{{MediaWiki:Validationpage}}|observada]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todo]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobado] en <i>$2</i>.',
	'revreview-basic-source' => 'Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versión observada] de esta página, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] en <i>$2</i>, estuvo basada en esta revisión.',
	'revreview-blocked' => 'No puedes verificar esta revisión porque tu cuenta está actualmente bloqueada ([$1 detalles])',
	'revreview-changed' => "'''La acción solicitada no pudo ser ejecutada en esta revisión de [[:$1|$1]].'''

Una plantilla o archivo puede haber sido solicitada cuando ninguna versión fue especificada.
Esto puede ocurrir si una plantilla dinámica transclude alguna otra imagen o plantilla dependiente de una variable que cambió cuando comenzaste a revisar esta página.
Refrescar la página y volviendo a revisar puede solucionar este problema.",
	'revreview-current' => 'Borrador',
	'revreview-depth' => 'Profundidad',
	'revreview-depth-0' => 'No aprobado',
	'revreview-depth-1' => 'Fundamental',
	'revreview-depth-2' => 'Moderado',
	'revreview-depth-3' => 'Elevado',
	'revreview-depth-4' => 'Destacado',
	'revreview-draft-title' => 'Página esbozo',
	'revreview-edit' => 'Editar borrador',
	'revreview-editnotice' => "'''Las ediciones a esta página serán incorporadas dentro de la [[{{MediaWiki:Validationpage}}|versión estable]] una vez que un usuario autorizado los revise.'''",
	'revreview-flag' => 'Verificar esta revisión',
	'revreview-edited' => "'''Las ediciones serán incorporadas en la [[{{MediaWiki:Validationpage}}|versión estable]] una vez que los usuarios establecidos las revisen. El ''borrador'' se muestra debajo.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|cambio en espera|cambios en espera}}] de revisión.",
	'revreview-invalid' => "'''Destino inválido:''' no hay  [[{{MediaWiki:Validationpage}}|versión revisada]] que corresponda a tal ID.",
	'revreview-legend' => 'Valorar contenido de revisión',
	'revreview-log' => 'Comentario:',
	'revreview-main' => 'Debes seleccionar una revisión particular de una página de contenido para verificar.

Mira la [[Special:Unreviewedpages|lista de páginas no revisadas]].',
	'revreview-newest-basic' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versión vista] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] {{PLURAL:$3|necesita|necesitan}} revisión.',
	'revreview-newest-basic-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión vista] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios a plantilla/archivo] necesitan revisión.',
	'revreview-newest-quality' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidad] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] {{PLURAL:$3|necesita|necesitan}} revisión.',
	'revreview-newest-quality-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidad] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios a plantilla/archivo] necesitan revisión.',
	'revreview-noflagged' => "No hay versiones revisadas para esta página, por lo que puede '''no''' haber sido [[{{MediaWiki:Validationpage}}|verificada]] para calidad",
	'revreview-note' => '[[User:$1|$1]] hizo las siguiente notas [[{{MediaWiki:Validationpage}}|verificando]] esta revisión:',
	'revreview-notes' => 'Observaciones o notas a mostrar:',
	'revreview-oldrating' => 'Fue calificada:',
	'revreview-patrol' => 'Marcar este cambio como vigilado',
	'revreview-patrol-title' => 'Marcar como vigilado',
	'revreview-patrolled' => 'Las revisiones seleccionadas de [[:$1|$1]] han sido marcadas como patrulladas',
	'revreview-quality' => 'Esta es la última revisión de [[{{MediaWiki:Validationpage}}|calidad]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] esperando revisión.',
	'revreview-quality-i' => 'Esta es la última revisión de [[{{MediaWiki:Validationpage}}|calidad]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] en <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios de plantilla/archivo] esperando revisión.',
	'revreview-quality-old' => 'Esta es una revisión de [[{{MediaWiki:Validationpage}}|calidad]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todo]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobado] en <i>$2</i>.
Nuevos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios] pueden haber sido hechos',
	'revreview-quality-same' => 'Esta es la última revisión de [[{{MediaWiki:Validationpage}}|calidad]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todo]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobado] en <i>$2</i>.',
	'revreview-quality-source' => 'Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versión de calidad] de esta página, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] en <i>$2</i>, estuvo basada en esta revisión.',
	'revreview-quality-title' => 'Artículo de calidad',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Artículo visto]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver borrador]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Artículo visto]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver esbozo]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|página vista]]'''",
	'revreview-quick-invalid' => "'''ID de revisión inválido'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Versión actual]]''' (sin revisar)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Artículo de calidad]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver esbozo]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Artículo de calidad]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver esbozo]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Artículo de calidad]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Borrador]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver página]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Borrador]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver página]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-selected' => "Revisión seleccionada de '''$1:'''",
	'revreview-source' => 'fuente del borrador',
	'revreview-stable' => 'Página estable',
	'revreview-stable-title' => 'Página revisada',
	'revreview-stable1' => 'Puedes desear ver [{{fullurl:$1|stableid=$2}} esta versión verificada] y ver si esta es ahora la [{{fullurl:$1|stable=1}} versión estable] de esta página.',
	'revreview-stable2' => 'puedes desear ver la [{{fullurl:$1|stable=1}} versión estable] de esta página (si aún hay una).',
	'revreview-style' => 'Legibilidad',
	'revreview-style-0' => 'Reprobada',
	'revreview-style-1' => 'Aceptable',
	'revreview-style-2' => 'Bueno',
	'revreview-style-3' => 'Conciso',
	'revreview-style-4' => 'Destacado',
	'revreview-submit' => 'Enviar',
	'revreview-submitting' => 'Enviando...',
	'revreview-finished' => '¡Revisión completa!',
	'revreview-failed' => '¡Revisión fallida!',
	'revreview-successful' => "'''La revisión de [[:$1|$1]] ha sido exitósamente marcada. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} ver versiones estables])'''",
	'revreview-successful2' => "'''Se ha desmarcado la revisión de [[:$1|$1]]'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Las versiones estables]] son las predeterminadas para los lectores en vez de las más recientes.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Versiones estables]] son revisiones verificadas de las páginas y pueden ser configuradas como contenido por defecto para los visitantes.''",
	'revreview-toggle-title' => 'mostrar/ocultar detalles',
	'revreview-toolow' => 'Debes al menos valorar cada uno de los atributos de abajo más alto que "desaprobado" para que la revisión sea considerada verificada.
Para depreciar un arevisión, marque todos los campos como "desaprobado".',
	'revreview-update' => "Por favor [[{{MediaWiki:Validationpage}}|revisar]] cualquier cambio ''(mostrado abajo)'' hecha cuando la revisión estable fue [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada].<br />
'''algunas plantillas/archivos fueron actualizados:'''",
	'revreview-update-includes' => "'''Algunas plantillas/archivos fueron actualizados:'''",
	'revreview-update-none' => "Por favor [[{{MediaWiki:Validationpage}}|revisa]] los cambios ''(mostrados abajo)'' hecho desde que la versión estable fue  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada].",
	'revreview-update-use' => "'''NOTA:''' si alguna de estas plantillas/archivos tiene una versión estable, entonces ya se usa en la versión estable de esta página.",
	'revreview-diffonly' => "''Para revisar la página, haga click en el vínculo de revisión \"revisión actual\" y use el formulario de revisión.''",
	'revreview-visibility' => "'''Esta página tiene una [[{{MediaWiki:Validationpage}}|versión estable]] actualizada; configuraciones de estabilidad de página pueden ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configuradas].'''",
	'revreview-visibility2' => "'''Esta página tiene una [[{{MediaWiki:Validationpage}}|versión estable]] desactualizada; configuraciones de estabilidad de página pueden ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configuradas].'''",
	'revreview-visibility3' => "'''Esta página no tiene una [[{{MediaWiki:Validationpage}}|versión estable]]; Configuraciones de estabilidad de página pueden ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configuradas].'''",
	'revreview-revnotfound' => 'No se pudo encontrar la revisión antigua de la página que ha solicitado.
Por favor, revise la dirección que usó para acceder a esta página.',
	'right-autoreview' => 'Automáticamente marcar revisiones como vistas',
	'right-movestable' => 'Mover páginas estables',
	'right-review' => 'Marcar revisiones como vistas',
	'right-stablesettings' => 'Configurar cómo las versiones estables se seleccionan y muestran',
	'right-validate' => 'Marcar revisiones como validadas',
	'rights-editor-autosum' => 'Autopromovida',
	'rights-editor-revoke' => 'Se retiró el estado de editor para [[$1]]',
	'specialpages-group-quality' => 'Control de calidad',
	'stable-logentry' => 'Versiones estables configuradas para [[$1]]',
	'stable-logentry2' => 'restaurar versión estable para [[$1]]',
	'stable-logpage' => 'Registro de estabilidad',
	'stable-logpagetext' => 'Este es un registro de cambios a la configuración de [[{{MediaWiki:Validationpage}}|versión estable]] para páginas de contenido. Una [[Special:StablePages|lista de páginas estables]] se encuentra disponible.',
	'revreview-filter-all' => 'Todas',
	'revreview-filter-stable' => 'estable',
	'revreview-filter-approved' => 'Aprobada',
	'revreview-filter-reapproved' => 'Re-aprobada',
	'revreview-filter-unapproved' => 'No aprobado',
	'revreview-filter-auto' => 'Automático',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => 'Cambio de status:',
	'revreview-typefilter' => 'Tipo:',
	'revreview-levelfilter' => 'Nivel:',
	'revreview-lev-sighted' => 'observado',
	'revreview-lev-quality' => 'calidad',
	'revreview-lev-pristine' => 'prístina',
	'revreview-reviewlink' => 'revisar',
	'tooltip-ca-current' => 'Ver el borrador actual de esta página',
	'tooltip-ca-stable' => 'Ver la versión estable de esta página',
	'tooltip-ca-default' => 'Opciones de control de calidad',
	'revreview-locked-title' => 'Las ediciones deben ser revisadas antes de ser mostradas en esta página!',
	'revreview-unlocked-title' => 'Las ediciones no requieren revisión antes de ser mostradas en esta página!',
	'revreview-locked' => 'Las ediciones deben ser revisadas antes de ser mostradas en esta página!',
	'revreview-unlocked' => 'Las ediciones no requieren revisión antes de ser mostradas en esta página!',
	'log-show-hide-review' => '$1 registro de revisiones',
	'revreview-tt-review' => 'Revisar esta página',
	'validationpage' => '{{ns:help}}:Validación de artículo',
);

/** Estonian (Eesti)
 * @author Pikne
 * @author Silvar
 */
$messages['et'] = array(
	'revreview-patrol' => 'Märgi see muudatus patrullituks',
	'revreview-patrol-title' => 'Märgi patrullituks',
	'revreview-style-1' => 'Vastuvõetav',
	'revreview-revnotfound' => 'Vana redaktsiooni, mille järele te pärisite, ei leitud.
Palun kontrollige internetiaadressi, mille abil te seda leida püüdsite.',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Bengoa
 * @author Kobazulo
 * @author Unai Fdz. de Betoño
 */
$messages['eu'] = array(
	'editor' => 'Editorea',
	'flaggedrevs' => 'Markatutako Berrikuspenak',
	'group-editor' => 'Editoreak',
	'group-editor-member' => 'editorea',
	'revreview-accuracy' => 'Zehaztasuna',
	'revreview-draft-title' => 'Zirriborroa',
	'revreview-log' => 'Iruzkina:',
	'revreview-submit' => 'Bidali',
	'revreview-submitting' => 'Bidaltzen...',
	'revreview-toggle-title' => 'erakutsi/ezkutatu xehetasunak',
	'revreview-revnotfound' => 'Ezin izan da eskatzen ari zaren orrialdearen berrikuspen zaharra aurkitu. Mesedez, egiaztatu orrialde honetara iristeko erabili duzun URLa.',
	'right-movestable' => 'Mugitu orrialde egonkorrak',
	'revreview-filter-all' => 'Guztiak',
	'revreview-filter-auto' => 'Automatikoa',
	'revreview-filter-manual' => 'Eskuzkoa',
	'revreview-statusfilter' => 'Estatus aldaketa:',
	'revreview-typefilter' => 'Mota:',
);

/** Extremaduran (Estremeñu)
 * @author Better
 */
$messages['ext'] = array(
	'editor' => 'Eitol',
	'group-editor' => 'Eitoris',
	'group-editor-member' => 'Eitol',
	'grouppage-editor' => '{{ns:project}}:Eitol',
	'revreview-auto' => '(autumáticu)',
	'revreview-style-2' => 'Güenu',
	'revreview-revnotfound' => 'La revisión antigua qu´estás landeandu nu se puei alcuentral. Pol favol, compreba la URL que gastasti pa dil a esta páhina.',
);

/** Persian (فارسی)
 * @author Huji
 * @author Mardetanha
 */
$messages['fa'] = array(
	'editor' => 'ویرایشگر',
	'flaggedrevs' => 'نسخه‌های علامت‌دار',
	'flaggedrevs-backlog' => "در حال حاضر کارهای ناتمام در [[Special:OldReviewedPages|صفحه‌های بازبینی شده تاریخ گذشته]] وجود دارد. '''توجه شما مورد نیاز است!'''",
	'flaggedrevs-desc' => 'به ویرایشگرها/مرورکنندگان امکان تایید کردن نسخه‌ها و پایدار ساختن صفحه‌ها را می‌دهد',
	'flaggedrevs-pref-UI-0' => 'استفاده از رابط کاربری مفصل نسخه‌های پایدار',
	'flaggedrevs-pref-UI-1' => 'استفاده از رابط کاربری سادهٔ نسخه‌های پایدار',
	'flaggedrevs-prefs-stable' => '(در صورت وجود) همیشه نسخهٔ پایدار یک صفحه را به عنوان نسخهٔ پیش فرض نمایش بده',
	'flaggedrevs-prefs-watch' => 'صفحه‌هایی که بازبینی می‌کنم را به فهرست پیگیری‌هایم اضافه کن',
	'group-editor' => 'ویرایشگران',
	'group-editor-member' => 'ویرایشگر',
	'group-reviewer' => 'مرورگران',
	'group-reviewer-member' => 'مرورگر',
	'grouppage-editor' => '{{ns:project}}:ویرایشگر',
	'grouppage-reviewer' => '{{ns:project}}:مرورگر',
	'hist-draft' => 'نسخهٔ پیش‌نویس',
	'hist-quality' => '[با کیفیت]',
	'hist-quality-user' => 'توسط [[User:$3|$3]] [{{fullurl:$1|stableid=$2}} تایید شد]',
	'hist-stable' => '[بررسی شده]',
	'hist-stable-user' => 'توسط [[User:$3|$3]] [{{fullurl:$1|stableid=$2}} بررسی شد]',
	'review-diff2stable' => 'تفاوت با نسخه پایدار',
	'review-logentry-app' => '[[$1]] را بررسی کرد',
	'review-logentry-dis' => 'نسخه‌ای از [[$1]] را مستهلک کرد',
	'review-logentry-id' => 'شماره نسخه $1',
	'review-logentry-diff' => 'تفاوت با نسخهٔ پایدار',
	'review-logpage' => 'سیاههٔ بررسی مقاله',
	'review-logpagetext' => 'این سیاهه‌ای از تعییرات وضعیت [[{{MediaWiki:Validationpage}}|تائید]] نسخه‌های صفحه‌ها است.',
	'reviewer' => 'مرورگر',
	'revisionreview' => 'نسخه‌های بررسی',
	'revreview-accuracy' => 'دقت',
	'revreview-accuracy-0' => 'تائیدنشده',
	'revreview-accuracy-1' => 'بررسی شده',
	'revreview-accuracy-2' => 'دقیق',
	'revreview-accuracy-3' => 'دارای منابع خوب',
	'revreview-accuracy-4' => 'برگزیده',
	'revreview-approved' => 'مورد تایید',
	'revreview-auto' => '(خودکار)',
	'revreview-auto-w' => "شما در حال ویرایش نسخه پایدار هستید و تغییرات شما '''به طور خودکار بررسی خواهند شد'''.",
	'revreview-auto-w-old' => "شما در حال ویرایش یک نسخه قدیمی هستید و تغییرات شما '''به طور خودکار بررسی خواهند شد'''.",
	'revreview-basic' => 'این آخرین نسخه [[{{MediaWiki:Validationpage}}|بررسی‌ شده]] است که در <i>$2</i>
	[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس]
	قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} ویرایش] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}]
نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-basic-i' => 'این چدید‌ترین نسخهٔ [[{{MediaWiki:Validationpage}}|بررسی شده]] است، که در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس] دارای [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییراتی در الگوها/تصویرها] است که هنوز بازبینی نشده‌اند.',
	'revreview-basic-old' => 'این یک نسخهٔ [[{{MediaWiki:Validationpage}}|بررسی شده]] است([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} نمایش همه])، که در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
ممکن است [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییرات] جدیدی اتفاق افتاده باشند.',
	'revreview-basic-same' => 'این آخرین نسخهٔ [[{{MediaWiki:Validationpage}}|بررسی شده]] ‌است، که در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} فهرست کامل]).',
	'revreview-basic-source' => 'یک [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخهٔ بررسی شده] از این صفحه، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده] در <i>$2</i>، بر مبنای این نسخه ایجاد شده‌است.',
	'revreview-changed' => "'''عمل درخواست شده را نمی‌توان روی این نسخه از [[:$1|$1]] انجام داد.'''

یک تصویر یا الگو درخواست شده بدون ان که نسخه خاصی تعیین شده باشد. این اتفاق می‌تواند زمانی رخ دهد که یک الگوی پویا یک الگو یا تصویر دیگر را شامل شود که به متغیری بستگی دارد که از زمانی که شما صفحه را تغییر داده‌اید تغییر کرده‌است.
بارگذاری دوباره صحفه و بررسی دوباره می‌تواند مشکل را برطرف کند.",
	'revreview-current' => 'پیش‌نویس',
	'revreview-depth' => 'عمق',
	'revreview-depth-0' => 'تائیدنشده',
	'revreview-depth-1' => 'مقدماتی',
	'revreview-depth-2' => 'متوسط',
	'revreview-depth-3' => 'بالا',
	'revreview-depth-4' => 'برگزیده',
	'revreview-draft-title' => 'مقاله در مرحلهٔ پیش‌نویس',
	'revreview-edit' => 'ویرایش پیش‌نویس',
	'revreview-flag' => 'بررسی این نسخه',
	'revreview-edited' => "'''وقتی ویرایش‌ها توسط یک کاربر باسابقه بازبینی شدند، در [[{{MediaWiki:Validationpage}}|نسخهٔ پایدار]] ادغام می‌شوند.
''پیش‌نویس'' در زیر نمایش داده شده‌است.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 تغییر منتظر بازبینی {{PLURAL:$2|است|هستند}}].",
	'revreview-invalid' => "'''هدف غیر مجاز:''' نسخهٔ [[{{MediaWiki:Validationpage}}|بازبینی شده‌ای]] با این شناسه وجود ندارد.",
	'revreview-legend' => 'نمره دادن به محتوای بررسی شده',
	'revreview-log' => 'توضیح سیاهه:',
	'revreview-main' => 'شما باید یک نسخه خاص از یک صفحه را برگزینید تا بررسی کنید.

[[Special:Unreviewedpages|فهرست صفحه‌های بررسی نشده]] را ببینید.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخه بررسی‌شده]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} فهرست کامل]) در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است].
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}] نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخهٔ بررسی شده] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} نمایش همه]) در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده بود].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییرات الگوها/تصویرها] نیازمند بازبینی است.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخه باکیفیت]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} فهرست کامل]) در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}] نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخهٔ باکیفیت] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} نمایش همه]) در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده بود].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییرات الگوها/تصویرها] نیازمند بازبینی است.',
	'revreview-noflagged' => 'نسخهٔ مرورشده‌ای از این صفحه وجود ندارد، احتمالاً به این دلیل که ای صفحه از نظر کیفیت بررسی
[[{{MediaWiki:Validationpage}}|نشده‌است]].',
	'revreview-note' => '[[User:$1|$1]] این توضیحات را ضمن [[{{MediaWiki:Validationpage}}|بررسی]] این نسخه ثبت کرد:',
	'revreview-notes' => 'مشاهدات یا ملاحظات',
	'revreview-oldrating' => 'نمره داده شده:',
	'revreview-patrol' => 'علامت زدن این تغییر به عنوان بررسی‌شده',
	'revreview-patrol-title' => 'علامت گشت بزن',
	'revreview-patrolled' => 'نسخهٔ انتخاب شده از [[:$1|$1]] به عنوان بررسی‌شده علامت خورده‌است.',
	'revreview-quality' => 'این آخرین نسخه [[{{MediaWiki:Validationpage}}|باکیفیت]] است که در <i>$2</i>
	[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس]
	قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} ویرایش] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}]
	نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-quality-i' => 'این چدید‌ترین نسخهٔ [[{{MediaWiki:Validationpage}}|باکیفیت]] است، که در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس] دارای [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییراتی در الگوها/تصویرها] است که هنوز بازبینی نشده‌اند.',
	'revreview-quality-old' => 'این یک نسخهٔ [[{{MediaWiki:Validationpage}}|باکیفیت]] است([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} نمایش همه])، که در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
ممکن است [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییرات] جدیدی اتفاق افتاده باشند.',
	'revreview-quality-same' => 'این آخرین نسخهٔ [[{{MediaWiki:Validationpage}}|با کیفیت]] ‌است، که در <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} فهرست کامل]).',
	'revreview-quality-source' => 'یک [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخهٔ باکیفیت] از این صفحه، [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} تایید شده] در <i>$2</i>، بر مبنای این نسخه ایجاد شده‌است.',
	'revreview-quality-title' => 'مقالهٔ با کیفیت',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|بررسی‌شده]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهده نسخه فعلی]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|مقالهٔ بررسی شده]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهدهٔ پیش‌نویس]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|بررسی شده]]''' (فاقد تغییرهای بررسی نشده)",
	'revreview-quick-invalid' => "'''شناسهٔ نسخهٔ غیر مجاز'''",
	'revreview-quick-none' => "'''فعلی'''. فاقد نسخه مرورشده",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|با کیفیت]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهده نسخه فعلی]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|مقالهٔ با کیفیت]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهدهٔ پیش‌نویس]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|با کیفیت]]''' (فاقد تغییرهای بررسی نشده)",
	'revreview-quick-see-basic' => "'''پیش‌نویس'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} مشاهدهٔ نسخهٔ پایدار]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} مقایسه])",
	'revreview-quick-see-quality' => "'''پیش‌نویس'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} مشاهدهٔ نسخهٔ پایدار]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} مقایسه])",
	'revreview-selected' => "نسخه انتخابی '''$1:'''",
	'revreview-source' => 'منبع پیش‌نویس',
	'revreview-stable' => 'صفحهٔ پایدار',
	'revreview-stable-title' => 'مقالهٔ بررسی شده',
	'revreview-stable1' => 'شما می توانید [{{fullurl:$1|stableid=$2}} این نسخهٔ علامت‌دار] را مشاهده کنید تا ببینید آیا [{{fullurl:$1|stable=1}} نسخهٔ پایدار] این صفحه است یا نه.',
	'revreview-stable2' => 'شما می‌توانید [{{fullurl:$1|stable=1}} نسخهٔ پایدار] این صفحه را (در صورت وجود) مشاهده کنید.',
	'revreview-style' => 'خوانایی',
	'revreview-style-0' => 'تائیدنشده',
	'revreview-style-1' => 'قابل قبول',
	'revreview-style-2' => 'خوب',
	'revreview-style-3' => 'مختصر',
	'revreview-style-4' => 'برگزیده',
	'revreview-submit' => 'ثبت بررسی',
	'revreview-submitting' => 'در حال ارسال...',
	'revreview-finished' => 'بررسی کامل شد!',
	'revreview-successful' => "'''نسخهٔ انتخابی از [[:$1|$1]] با موفقیت علامت زده شد.
([{{fullurl:{{#Special:Stableversions}}|page=$2}} مشاهدهٔ تمام نسخه‌های علامت‌دار])'''",
	'revreview-successful2' => "'''پرچم نسخه‌های انتخابی از [[:$1|$1]] با موفقیت برداشته شد.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|نسخهٔ پایدار]]'' (و نه آخرین نسخه) هر صفحه به عنوان پیش‌فرض محتوای صفحه است.",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|نسخه‌های پایدار]] نسخه‌هایی از هر صفحه هستند که بررسی شده‌اند و می‌توان آن‌ها را به عنوان محتوای پیش‌فرض برای بینندگان تنظیم کرد..''",
	'revreview-toggle' => '(+/−)',
	'revreview-toggle-title' => 'نمایش/پنهان کردن جزئیات',
	'revreview-toolow' => 'شما باید هر یک از موارد زیر را با درجه‌ای بیش از «تائیدنشده» علامت بزنید تا آن نسخه بررسی شده به حساب بیاید. برای مستهلک کردن یک نسخه، تمام موارد را «تائیدنشده» علامت بزنید.',
	'revreview-update' => 'لطفاً تمام تغییراتی که از آخرین نسخه پایدار صورت گرفته را بررسی کنید. برخی الگوها/تصویرها تغییر یافته‌اند:',
	'revreview-update-includes' => "'''برخی الگوها/تصویرها به روز شده‌اند:'''",
	'revreview-update-none' => 'لطفاً تمام تغییراتی که پس از آخرین نسخه پایدار اعمال شده‌اند را بررسی کنید.',
	'revreview-update-use' => "'''تذکر:''' اگر هر کدام از این الگوها/تصویرها نسخهٔ پایداری داشته باشند، در نسخهٔ پایدار این صفحه استفاده می‌شوند.",
	'revreview-diffonly' => "''برای بازبینی این صفحه، روی پیوند «نسخهٔ اخیر» کلیک کنید و فرم بازبینی را استفاده کنید.''",
	'revreview-visibility' => 'این صفحه دارای یک [[{{MediaWiki:Validationpage}}|نسخه پایدار است]] که قابل 
	[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} تنظیم] است.',
	'revreview-revnotfound' => 'نسخهٔ قدیمی‌ای از صفحه که درخواسته بودید یافت نشد.
لطفاً URLی را که برای دسترسی به این صفحه استفاده کرده‌اید، بررسی کنید.',
	'right-autoreview' => 'علامت زدن خودکار نسخه‌ها به عنوان بررسی شده',
	'right-movestable' => 'صفحه‌های با بیشترین پایداری',
	'right-review' => 'علامت زدن نسخه‌ها به عنوان بررسی شده',
	'right-stablesettings' => 'نحوهٔ انتخاب و نمایش نسخهٔ پایدار را تنظیم کنید',
	'right-validate' => 'علامت زدن نسخه‌ها به عنوان تایید شده',
	'rights-editor-autosum' => 'ترفیع خودکار',
	'rights-editor-revoke' => 'وضعیت مرورگر را از [[$1]] گرفت',
	'specialpages-group-quality' => 'تضمین کیفیت',
	'stable-logentry' => 'نسخه پایدار [[$1]] را تنظیم کرد',
	'stable-logentry2' => 'بازنشاندن نسخه پایدار [[$1]]',
	'stable-logpage' => 'سیاهه نسخه پایدار',
	'stable-logpagetext' => 'این سیاهه‌ای از تنظیمات [[{{MediaWiki:Validationpage}}|نسخه پایدار]] صفحه‌ها است.
فهرستی از صفحه‌های پایدار شده را در [[Special:StablePages|فهرست صفحه‌های پایدار]] پیدا کنید.',
	'revreview-filter-all' => 'همه',
	'revreview-filter-approved' => 'تایید شده',
	'revreview-filter-reapproved' => 'دوباره تایید شده',
	'revreview-filter-unapproved' => 'تایید نشده',
	'revreview-filter-auto' => 'خودکار',
	'revreview-filter-manual' => 'دستی',
	'revreview-statusfilter' => 'وضعیت:',
	'revreview-typefilter' => 'نوع',
	'revreview-reviewlink' => 'بازبینی',
	'tooltip-ca-current' => 'مشاهده پیش‌نویس فعلی این صفحه',
	'tooltip-ca-stable' => 'مشاهده نسخه پایدار این صفحه',
	'tooltip-ca-default' => 'تنظیمات کنترل کیفیت',
	'revreview-locked-title' => 'ویرایش‌ها باید قبل از این که در این صفحه نمایش یابند بازبینی شوند!',
	'revreview-unlocked-title' => 'ویرایش‌ها لازم نیست قبل از این که در این صفحه نمایش یابند بازبینی شوند!',
	'revreview-locked' => 'ویرایش‌ها باید قبل از این که در این صفحه نمایش یابند بازبینی شوند!',
	'revreview-unlocked' => 'ویرایش‌ها لازم نیست قبل از این که در این صفحه نمایش یابند بازبینی شوند!',
	'revreview-tt-review' => 'بازبینی این صفحه',
	'validationpage' => '{{ns:help}}:تایید اعتبار مقاله‌ها',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Crt
 * @author Jaakonam
 * @author Nike
 * @author Str4nd
 */
$messages['fi'] = array(
	'editor' => 'Muokkaaja',
	'flaggedrevs' => 'Tarkastetut versiot',
	'flaggedrevs-backlog' => "Tällä hetkellä tarkistettavissa sivuissa on [[Special:OldReviewedPages|pitkä jono muokkauksia]]. '''Olisi hyödyllistä, jos ehtisit käsitellä niitä!'''",
	'prefs-flaggedrevs' => 'Vakaus',
	'flaggedrevs-prefs-watch' => 'Lisää tarkastetut sivut tarkkailulistalle.',
	'group-editor' => 'muokkaajat',
	'group-editor-member' => 'muokkaaja',
	'group-reviewer' => 'arvioijat',
	'group-reviewer-member' => 'arvioija',
	'grouppage-editor' => '{{ns:project}}:Muokkaaja',
	'grouppage-reviewer' => '{{ns:project}}:Arvioija',
	'hist-draft' => 'kehitysversio',
	'hist-quality' => 'laadukas versio',
	'hist-stable' => 'katsastettu versio',
	'review-diff2stable' => 'Näytä vakaan ja ajantasaisen version väliset eroavaisuudet',
	'review-logentry-id' => 'näytä',
	'review-logentry-diff' => 'muutoslinkki vakaaseen versioon',
	'reviewer' => 'Arvioija',
	'revisionreview' => 'Arvioi versioita',
	'revreview-accuracy' => 'Paikkansapitävyys',
	'revreview-accuracy-0' => 'Hyväksymätön',
	'revreview-accuracy-1' => 'Kertaalleen silmäilty',
	'revreview-accuracy-2' => 'Paikkansapitävä',
	'revreview-accuracy-3' => 'Hyvin lähteistetty',
	'revreview-accuracy-4' => 'Suositeltu',
	'revreview-approved' => 'Hyväksytty',
	'revreview-auto' => '(automaattinen)',
	'revreview-auto-w' => 'Muokkaat vakaata versiota; muokkauksesi saavat välittömästi tarkastetun version arvon.',
	'revreview-auto-w-old' => 'Olet muokkaamassa tarkistettua versiota; muokkauksesi saa välittömästi tarkastetun version arvon.',
	'revreview-basic' => 'Tämä on uusin [[{{MediaWiki: Validationpage}}|katsastettu]] versio, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} hyväksymisaika] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Luonnosversioissa] on [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|muokkaus|muokkausta}}] arviointia odottamassa.',
	'revreview-blocked' => 'Et voi arvioida tätä versiota, koska käyttäjätililläsi on tällä hetkellä esto voimassa ([$1 tarkat tiedot])',
	'revreview-current' => 'Luonnos',
	'revreview-depth-2' => 'Keskitasoa',
	'revreview-draft-title' => 'Luonnossivu',
	'revreview-edit' => 'Muokkaa luonnosta',
	'revreview-editnotice' => "'''Tälle sivulle tehtävät muokkaukset sisällytetään [[{{MediaWiki:Validationpage}}|vakaaseen versioon]] kunhan valtuutettu käyttäjä on arvioinut ne.'''",
	'revreview-flag' => 'Arvioi tämä versio',
	'revreview-log' => 'Kommentti',
	'revreview-oldrating' => 'Arvio oli:',
	'revreview-patrol' => 'Merkitse tämä muutos tarkastetuksi',
	'revreview-patrol-title' => 'Merkitse tarkastetuksi',
	'revreview-quality-title' => 'Laadukas sivu',
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Nykyinen versio]]''' (arvioimaton)",
	'revreview-stable' => 'Vakaa sivu',
	'revreview-stable-title' => 'Kertaalleen silmäilty sivu',
	'revreview-style' => 'Luettavuus',
	'revreview-style-0' => 'Hyväksymätön',
	'revreview-style-1' => 'Hyväksyttävä',
	'revreview-style-2' => 'Hyvä',
	'revreview-style-4' => 'Suositeltu',
	'revreview-submit' => 'Lähetä',
	'revreview-submitting' => 'Lähetetään...',
	'revreview-finished' => 'Arviointi suoritettu!',
	'revreview-failed' => 'Arviointi epäonnistui!',
	'revreview-toggle-title' => 'näytä tai piilota yksityiskohdat',
	'revreview-revnotfound' => 'Pyytämääsi versiota ei löydy. Tarkista URL-osoite, jolla hait tätä sivua.',
	'right-movestable' => 'Siirrä vakaat sivut',
	'specialpages-group-quality' => 'Laadunvalvonta',
	'revreview-filter-all' => 'Kaikki',
	'revreview-filter-stable' => 'vakaat',
	'revreview-filter-approved' => 'Hyväksytty',
	'revreview-filter-reapproved' => 'Hyväksytty uudelleen',
	'revreview-filter-unapproved' => 'Hyväksymätön',
	'revreview-filter-auto' => 'Automaattinen',
	'revreview-filter-manual' => 'Manuaalinen',
	'revreview-statusfilter' => 'Tilan muutos',
	'revreview-typefilter' => 'Tyyppi',
	'revreview-levelfilter' => 'Taso',
	'revreview-reviewlink' => 'tarkasta',
	'tooltip-ca-current' => 'Näytä tämän sivun nykyinen luonnosversio',
	'tooltip-ca-stable' => 'Näytä tämän sivun vakaa artikkeliversio',
	'revreview-tt-review' => 'Arvioi tämä sivu',
);

/** French (Français)
 * @author Cedric31
 * @author Crochet.david
 * @author Dereckson
 * @author Grondin
 * @author IAlex
 * @author Korrigan
 * @author McDutchie
 * @author Mihai
 * @author Omnipaedista
 * @author PieRRoMaN
 * @author Sherbrooke
 * @author The RedBurn
 * @author Urhixidur
 * @author Verdy p
 * @author Zetud
 */
$messages['fr'] = array(
	'editor' => 'Contributeur',
	'flaggedrevs' => 'Versions marquées',
	'flaggedrevs-backlog' => "Il y a actuellement des tâches en retard dans la [[Special:OldReviewedPages|liste des modification en attente]] des pages révisées. '''Votre attention y est demandée !'''",
	'flaggedrevs-watched-pending' => "Il y a actuellement [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} des modifications en attente] de pages relues dans votre liste de suivi. '''Veuillez y prêter attention !'''",
	'flaggedrevs-desc' => 'Donne la possibilité aux contributeurs et aux relecteurs de valider les versions et de stabiliser les pages',
	'flaggedrevs-pref-UI' => 'Interface des versions stables :',
	'flaggedrevs-pref-UI-0' => 'Utiliser l’interface détaillée pour les versions stables',
	'flaggedrevs-pref-UI-1' => "Utiliser l'interface basique pour les versions stables",
	'prefs-flaggedrevs' => 'Stabilité',
	'flaggedrevs-prefs-stable' => 'Toujours afficher la version stable des pages par défaut (s’il en existe une)',
	'flaggedrevs-prefs-watch' => 'Ajouter les pages que je relis à ma liste de suivi.',
	'flaggedrevs-prefs-editdiffs' => 'Montrer le diff vers la version stable lorsque vous modifier des pages',
	'group-editor' => 'Contributeurs',
	'group-editor-member' => 'Contributeur',
	'group-reviewer' => 'Relecteurs',
	'group-reviewer-member' => 'Relecteur',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Reviewer',
	'group-autoreview' => 'Relecteurs automatiques',
	'group-autoreview-member' => 'Relecteur automatique',
	'grouppage-autoreview' => '{{ns:project}}:Relecteur automatique',
	'hist-draft' => 'version brouillon',
	'hist-quality' => 'version de qualité',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validée] par [[User:$3|$3]]',
	'hist-stable' => 'version visualisée',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} visualisée] par [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatiquement relue]',
	'review-diff2stable' => 'Voir les modifications dans la version actuelle par rapport à la version stable',
	'review-logentry-app' => 'a relu v$2 de [[$1]]',
	'review-logentry-dis' => 'a déprécié v$2 de [[$1]]',
	'review-logentry-id' => 'afficher',
	'review-logentry-diff' => 'diff vers la version stable',
	'review-logpage' => 'Journal des relectures',
	'review-logpagetext' => "Voici le journal des modifications du statut d'[[{{MediaWiki:Validationpage}}|approbation]] des versions des pages.
Voir la [[Special:ReviewedPages|liste des pages relues]] pour une liste des pages approuvées.",
	'reviewer' => 'Relecteur',
	'revisionreview' => 'Relire les versions',
	'revreview-accuracy' => 'État&nbsp;',
	'revreview-accuracy-0' => 'Non approuvée',
	'revreview-accuracy-1' => 'Vue',
	'revreview-accuracy-2' => 'Précise',
	'revreview-accuracy-3' => 'Bien sourcée',
	'revreview-accuracy-4' => 'Remarquable',
	'revreview-approved' => 'Approuvée',
	'revreview-auto' => '(automatique)',
	'revreview-auto-w' => "Vous êtes en train de modifier une version stable : les modifications '''seront automatiquement relues'''.",
	'revreview-auto-w-old' => "Vous êtes en train de modifier une version relue ; les modifications  '''seront automatiquement relues'''.",
	'revreview-basic' => "C'est la dernière [[{{MediaWiki:Validationpage}}|version vue]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouillon] comporte [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 changement{{PLURAL:$3||s}}] nécessitant une relecture.",
	'revreview-basic-i' => 'Voici la dernière version [[{{MediaWiki:Validationpage}}|visualisée]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouillon] comporte des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changements de modèle ou de fichiers] en attente de relecture.',
	'revreview-basic-old' => 'Voici une version [[{{MediaWiki:Validationpage}}|visualisée]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} liste entière]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>.
De nouvelles [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifications] peuvent avoir été effectuées.',
	'revreview-basic-same' => "Voici la dernière version [[{{MediaWiki:Validationpage}}|visualisée]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} voir la liste]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''.",
	'revreview-basic-source' => 'Une [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version visualisée] de cette page, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>, est basée sur cette version.',
	'revreview-blocked' => 'Vous ne pouvez pas relire cette version car votre compte est actuellement bloqué ([$1 détails])',
	'revreview-changed' => "'''L’action demandée n’a pu être réalisée pour cette version de [[:$1|$1]].'''
	
Il est possible qu’un modèle ou un fichier ait été requis alors qu’aucune version précise n’était choisie.
Ceci peut survenir lorsqu'un modèle dynamique inclut un fichier ou un autre modèle dépendant d’une variable qui a changé depuis que vous avez commencé à relire cette page.
Recharger la page et la relire de nouveau devrait corriger ce problème.",
	'revreview-current' => 'Brouillon',
	'revreview-depth' => 'Profondeur',
	'revreview-depth-0' => 'Non approuvée',
	'revreview-depth-1' => 'De base',
	'revreview-depth-2' => 'Modérée',
	'revreview-depth-3' => 'Élevée',
	'revreview-depth-4' => 'Remarquable',
	'revreview-draft-title' => 'Page de brouillon',
	'revreview-edit' => 'Modifier le brouillon',
	'revreview-editnotice' => "'''Note : Les modifications sur cette page seront incorporées dans la [[{{MediaWiki:Validationpage}}|version stable]] une fois qu’un utilisateur disposant des droits les aura relues.'''",
	'revreview-flag' => 'Relire cette version',
	'revreview-edited' => "'''Les modifications seront incorporées dans la [[{{MediaWiki:Validationpage}}|version stable]] dès qu'un utilisateur disposant des droits suffisants les aura relues.'''
Le ''brouillon'' est visible ci-dessous. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|modification nécessite|modifications nécessitent}}] une relecture.",
	'revreview-invalid' => "'''Cible incorrecte :''' aucune version [[{{MediaWiki:Validationpage}}|relue]] ne correspond au numéro indiqué.",
	'revreview-legend' => 'Évaluer le contenu de la version',
	'revreview-log' => 'Commentaire :',
	'revreview-main' => "Vous devez choisir une version précise d'une page pour effectuer une relecture.

Voir la [[Special:Unreviewedpages|liste des pages non relues]].",
	'revreview-newest-basic' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version visualisée] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} voir la liste]) a été [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 changement{{PLURAL:$3||s}}] nécessite{{PLURAL:$3||nt}} une relecture.",
	'revreview-newest-basic-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version visualisée] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} voir la liste]) a été [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>.
Des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifications de modèles ou de fichiers] nécessitent une relecture.',
	'revreview-newest-quality' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version de qualité] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} voir la liste]) a été [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 changement{{PLURAL:$3||s}}] nécessite{{PLURAL:$3||nt}} une relecture.",
	'revreview-newest-quality-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version de qualité] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} voir la liste]) a été [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>.
Des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifications de modèles ou de fichiers] nécessitent une relecture.',
	'revreview-noflagged' => "Il n'y a pas de version relue de cette page, il est donc possible que sa qualité '''n''''ait '''pas''' été [[{{MediaWiki:Validationpage}}|vérifiée]].",
	'revreview-note' => '[[User:$1|$1]] a accompagné sa relecture des notes suivantes :',
	'revreview-notes' => 'Observations et notes à afficher :',
	'revreview-oldrating' => 'Son évaluation :',
	'revreview-patrol' => 'Marquer cette modification comme patrouillée',
	'revreview-patrol-title' => 'Marquer comme patrouillée',
	'revreview-patrolled' => 'La version sélectionnée de [[:$1|$1]] a été marquée comme patrouillée.',
	'revreview-quality' => "C'est la dernière version [[{{MediaWiki:Validationpage}}|de qualité]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouillon] comporte [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 modification{{PLURAL:$3||s}}] nécessitant une relecture.",
	'revreview-quality-i' => 'C’est la dernière version [[{{MediaWiki:Validationpage}}|de qualité]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouillon] comporte des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifications de modèles ou de fichiers] en attente de relecture.',
	'revreview-quality-old' => "C'est une version [[{{MediaWiki:Validationpage}}|de qualité]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} voir la liste]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''.
De nouvelles [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifications] peuvent avoir été effectuées.",
	'revreview-quality-same' => "C'est la dernière version [[{{MediaWiki:Validationpage}}|de qualité]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} voir la liste]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''.",
	'revreview-quality-source' => "Une [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualité] de cette page, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2'', est basée sur cette version.",
	'revreview-quality-title' => 'Page de qualité',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Page visualisée]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir le brouillon en cours]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Page visualisée]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir le brouillon en cours]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Page visualisée]]'''",
	'revreview-quick-invalid' => "'''Numéro de version incorrect'''",
	'revreview-quick-none' => "'''Version actuelle''' (non relue)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Page de qualité]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir le brouillon en cours]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Page de qualité]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir le brouillon en cours]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Page de qualité]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Brouillon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} voir la page]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparer])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Brouillon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} voir la page]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparer])",
	'revreview-selected' => "Version choisie de '''$1 :'''",
	'revreview-source' => 'Texte source du brouillon',
	'revreview-stable' => 'Page stable',
	'revreview-stable-title' => 'Page visualisée',
	'revreview-stable1' => 'Vous souhaitez peut-être consulter [{{fullurl:$1|stableid=$2}} cette version marquée] pour voir si c’est maintenant la [{{fullurl:$1|stable=1}} version stable] de cette page.',
	'revreview-stable2' => 'Vous souhaitez peut-être consulter [{{fullurl:$1|stable=1}} la version stable] de cette page (s’il en existe une).',
	'revreview-style' => 'Lisibilité',
	'revreview-style-0' => 'Non approuvée',
	'revreview-style-1' => 'Acceptable',
	'revreview-style-2' => 'Bonne',
	'revreview-style-3' => 'Concise',
	'revreview-style-4' => 'Remarquable',
	'revreview-submit' => 'Soumettre',
	'revreview-submitting' => 'Soumission…',
	'revreview-finished' => 'Relecture terminée !',
	'revreview-failed' => 'La relecture a échoué !',
	'revreview-successful' => "'''La version sélectionnée de [[:$1|$1]] a été marquée avec succès ([{{fullurl:{{#Special:Stableversions}}|page=$2}} voir les versions stables])'''",
	'revreview-successful2' => "'''Version de [[:$1|$1]] invalidée.'''",
	'revreview-text' => "Les ''[[{{MediaWiki:Validationpage}}|versions stables]] sont utilisées comme contenu par défaut pour le lecteur au lieu des versions les plus récentes.''",
	'revreview-text2' => "Les ''[[{{MediaWiki:Validationpage}}|versions stables]] sont les versions de pages vérifiées et peuvent être définies comme le contenu par défaut pour le lecteur.''",
	'revreview-toggle-title' => 'montrer/cacher les détails',
	'revreview-toolow' => 'Vous devez affecter une évaluation plus élevée que « non approuvée » à chacun des attributs ci-dessous pour que la relecture soit prise en compte.
Pour déprécier une version, mettez tous les champs à « non approuvée ».',
	'revreview-update' => "Veuillez [[{{MediaWiki:Validationpage}}|relire]] toutes les modifications ''(voir ci-dessous)'' effectuées depuis l’[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbation] de la version stable.
'''Quelques fichiers ou modèles ont été mis à jour :'''",
	'revreview-update-includes' => "'''Quelques modèles ou fichiers ont été mis à jour :'''",
	'revreview-update-none' => "Veuillez [[{{MediaWiki:Validationpage}}|relire]] les modifications effectuées ''(voir ci-dessous)'' depuis que la version stable a été [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approuvée].",
	'revreview-update-use' => "'''Note :''' si ces modèles ou fichiers comportent une version stable, alors celle-ci est déjà utilisée dans la version stable de cette page.",
	'revreview-diffonly' => "''Pour relire la page, cliquez sur le lien « version courante » et utilisez le formulaire de relecture.''",
	'revreview-visibility' => "'''Cette page possède une [[{{MediaWiki:Validationpage}}|version stable]]. Ses paramètres de stabilité peuvent être [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurés].'''",
	'revreview-visibility2' => "'''Cette page comporte une [[{{MediaWiki:Validationpage}}|version stable]] périmée. Les paramètres de stabilité de la page peuvent être [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurés].'''",
	'revreview-visibility3' => "'''Cette pas ne dispose pas de [[{{MediaWiki:Validationpage}}|version stable]] ; les paramètres de stabilité de la page peuvent être [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurés].'''",
	'revreview-revnotfound' => "L'ancienne version de cette page que vous avez demandée n'a pas pu être retrouvée.
Veuillez vérifier l'URL que vous avez utilisée pour accéder à cette page.",
	'right-autoreview' => 'Marquer automatiquement les versions comme visualisées',
	'right-movestable' => 'Renommer des pages stables',
	'right-review' => 'Marquer les versions comme visualisées',
	'right-stablesettings' => "Configurer les paramètres de sélection et d'affichage des versions stables",
	'right-validate' => 'Marquer les versions comme validées',
	'rights-editor-autosum' => 'autopromu',
	'rights-editor-revoke' => 'a révoqué les droits de contributeur de [[$1]]',
	'specialpages-group-quality' => 'Assurance qualité',
	'stable-logentry' => 'a configuré les versions stables de [[$1]]',
	'stable-logentry2' => 'a réinitialisé la configuration des versions stables de [[$1]]',
	'stable-logpage' => 'Journal des versions stables',
	'stable-logpagetext' => 'Voici le journal des modifications de la configuration des [[{{MediaWiki:Validationpage}}|versions stables]] des pages.
Vous pouvez également consulter la [[Special:StablePages|liste de pages stables]].',
	'revreview-filter-all' => 'Tout',
	'revreview-filter-stable' => 'stable',
	'revreview-filter-approved' => 'Approuvé',
	'revreview-filter-reapproved' => 'De nouveau approuvé',
	'revreview-filter-unapproved' => 'Non approuvé',
	'revreview-filter-auto' => 'Automatique',
	'revreview-filter-manual' => 'Manuel',
	'revreview-statusfilter' => "Changement d'état :",
	'revreview-typefilter' => 'Genre :',
	'revreview-levelfilter' => 'Niveau :',
	'revreview-lev-sighted' => 'visée',
	'revreview-lev-quality' => 'qualité',
	'revreview-lev-pristine' => 'primitive',
	'revreview-reviewlink' => 'Relire',
	'tooltip-ca-current' => 'Voir le brouillon en cours de cette page',
	'tooltip-ca-stable' => 'Voir la version stable de cette page',
	'tooltip-ca-default' => "Paramètres pour l'assurance-qualité",
	'revreview-locked-title' => 'Les modifications doivent être relues avant d’être affichées sur cette page.',
	'revreview-unlocked-title' => 'Les modifications ne nécessitent pas de relecture avant d’être affichées sur cette page !',
	'revreview-locked' => 'Les modifications doivent être relues avant d’être affichées sur cette page !',
	'revreview-unlocked' => 'Les modifications ne nécessitent pas de relecture avant d’être affichées sur cette page !',
	'log-show-hide-review' => "$1 l'historique des relectures",
	'revreview-tt-review' => 'Relire cette page',
	'validationpage' => '{{ns:help}}:Validation de la page',
);

/** Cajun French (Français cadien)
 * @author RoyAlcatraz
 */
$messages['frc'] = array(
	'revreview-revnotfound' => "Le vieux changement de la page que vous avez demandé pouvait pas être trouvé.  Regardez donc l'adresse URL que vous avez usée.",
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'editor' => 'Contributor',
	'flaggedrevs' => 'Vèrsions marcâs',
	'flaggedrevs-backlog' => "Ora, y at des travâlys en retârd dens la lista des [[Special:OldReviewedPages|changements en atenta]] de les pâges revues. '''Nen volyéd fâre de câs !'''",
	'flaggedrevs-watched-pending' => "Ora, y at des [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} changements en atenta] de pâges revues dens voutra lista de survelyence. '''Nen volyéd fâre de câs !'''",
	'flaggedrevs-desc' => 'Balye la possibilitât ux contributors et ux rèvisors de validar les vèrsions et de stabilisar les pâges.',
	'flaggedrevs-pref-UI' => 'Entèrface de les vèrsions stâbles :',
	'flaggedrevs-pref-UI-0' => 'Utilisar l’entèrface dètalyê por les vèrsions stâbles',
	'flaggedrevs-pref-UI-1' => 'Utilisar l’entèrface simpla por les vèrsions stâbles',
	'prefs-flaggedrevs' => 'Stabilitât',
	'flaggedrevs-prefs-stable' => 'Tojorn fâre vêre la vèrsion stâbla de les pâges de contegnu per dèfôt (se nen ègziste yona)',
	'flaggedrevs-prefs-watch' => 'Apondre les pâges que revèyo a ma lista de survelyence',
	'group-editor' => 'Contributors',
	'group-editor-member' => 'Contributor',
	'group-reviewer' => 'Rèvisors',
	'group-reviewer-member' => 'Rèvisor',
	'grouppage-editor' => '{{ns:project}}:Contributors',
	'grouppage-reviewer' => '{{ns:project}}:Rèvisors',
	'group-autoreview' => 'Rèvisors ôtomaticos',
	'group-autoreview-member' => 'Rèvisor ôtomatico',
	'grouppage-autoreview' => '{{ns:project}}:Rèvisors ôtomaticos',
	'hist-draft' => 'vèrsion brolyon',
	'hist-quality' => 'vèrsion de qualitât',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validâ] per [[User:$3|$3]]',
	'hist-stable' => 'vèrsion revua',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} revua] per [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} revua ôtomaticament]',
	'review-diff2stable' => 'Vêde los changements dens la vèrsion d’ora per rapôrt a la vèrsion stâbla.',
	'review-logentry-app' => 'at revu v$2 de [[$1]]',
	'review-logentry-dis' => 'at dèprèciyê v$2 de [[$1]]',
	'review-logentry-id' => 'fâre vêre',
	'review-logentry-diff' => 'dif de vers la vèrsion stâbla',
	'review-logpage' => 'Jornal de les rèvisions',
	'review-logpagetext' => 'Vê-que lo jornal des changements du statut d’[[{{MediaWiki:Validationpage}}|aprobacion]] de les vèrsions de les pâges de contegnu.
Vêde la [[Special:ReviewedPages|lista de les pâges revues]] por vêre les pâges que sont aprovâs.',
	'reviewer' => 'Rèvisor',
	'revisionreview' => 'Revêre les vèrsions',
	'revreview-accuracy' => 'Ètat&nbsp;',
	'revreview-accuracy-0' => 'Pas aprovâ',
	'revreview-accuracy-1' => 'Revua',
	'revreview-accuracy-2' => 'Cllâra',
	'revreview-accuracy-3' => 'Bien fondâ',
	'revreview-accuracy-4' => 'Remarcâbla',
	'revreview-approved' => 'Aprovâ',
	'revreview-auto' => '(ôtomatico)',
	'revreview-auto-w' => "Vos éte aprés changiér una vèrsion stâbla ; los changements seront '''revus ôtomaticament'''.",
	'revreview-auto-w-old' => "Vos éte aprés changiér una vèrsion revua ; los changements seront '''revus ôtomaticament'''.",
	'revreview-basic' => 'Vê-que la dèrriére vèrsion [[{{MediaWiki:Validationpage}}|revua]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brolyon] at [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 changement{{PLURAL:$3||s}}] qu’{{PLURAL:$3|a|on}}t fôta d’una rèvision.',
	'revreview-basic-i' => 'Vê-que la dèrriére vèrsion [[{{MediaWiki:Validationpage}}|revua]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brolyon] at des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changements de modèlos ou ben de fichiérs] qu’ont fôta d’una rèvision.',
	'revreview-basic-old' => 'Vê-que una vèrsion [[{{MediaWiki:Validationpage}}|revua]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vêde la lista]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
De novéls [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changements] pôvont avêr étâ fêts.',
	'revreview-basic-same' => 'Vê-que la dèrriére vèrsion [[{{MediaWiki:Validationpage}}|revua]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vêde la lista]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.',
	'revreview-basic-source' => 'Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} vèrsion revua] de ceta pâge, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>, est basâ sur ceta vèrsion.',
	'revreview-blocked' => 'Vos pouede pas revêre ceta vèrsion perce que voutron compto est ora blocâ ([$1 dètalys])',
	'revreview-changed' => "'''L’accion demandâ at pas possu étre rèalisâ por ceta vèrsion de [[:$1|$1]].'''

O est possiblo qu’un modèlo ou ben un fichiér èye étâ demandâ pendent que niona vèrsion spècefica ére chouèsia.
Cen pôt arrevar quand un modèlo dinamico encllut un fichiér ou ben un ôtro modèlo que dèpend d’una variâbla qu’at changiê dês que vos vos éte betâ a revêre ceta pâge.
Rechargiér la pâge et la tornar revêre devrêt corregiér cél problèmo.",
	'revreview-current' => 'Brolyon',
	'revreview-depth' => 'Provondior',
	'revreview-depth-0' => 'Pas aprovâ',
	'revreview-depth-1' => 'De bâsa',
	'revreview-depth-2' => 'Moderâ',
	'revreview-depth-3' => 'Hôta',
	'revreview-depth-4' => 'Remarcâbla',
	'revreview-draft-title' => 'Pâge de brolyon',
	'revreview-edit' => 'Changiér lo brolyon',
	'revreview-editnotice' => "'''Nota : los changements sur ceta pâge seront apondus a la [[{{MediaWiki:Validationpage}}|vèrsion stâbla]] setout qu’un utilisator qu’at los drêts sufisents los arat revus.'''",
	'revreview-flag' => 'Revêre ceta vèrsion',
	'revreview-edited' => "'''Los changements seront apondus a la [[{{MediaWiki:Validationpage}}|vèrsion stâbla]] setout qu’un utilisator qu’at los drêts sufisents los arat revus.'''
'''Lo ''brolyon'' est visiblo ce-desot.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 changement{{PLURAL:$2||s}}] {{PLURAL:$2|a|on}}t fôta d’una rèvision.",
	'revreview-invalid' => "'''Ciba fôssa :''' niona vèrsion [[{{MediaWiki:Validationpage}}|revua]] corrèspond u numerô balyê.",
	'revreview-legend' => 'Èstimar lo contegnu de la vèrsion',
	'revreview-log' => 'Comentèro :',
	'revreview-main' => 'Vos dête chouèsir una vèrsion spècefica d’una pâge de contegnu por fâre una rèvision.

Vêde la [[Special:Unreviewedpages|lista de les pâges pas revues]].',
	'revreview-newest-basic' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dèrriére vèrsion revua] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vêde la lista]) at étâ [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 changement{{PLURAL:$3||s}}] {{PLURAL:$3|a|on}}t fôta d’una rèvision.',
	'revreview-newest-basic-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dèrriére vèrsion revua] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vêde la lista]) at étâ [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
Des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changements de modèlos ou ben de fichiérs] ont fôta d’una rèvision.',
	'revreview-newest-quality' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dèrriére vèrsion de qualitât] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vêde la lista]) at étâ [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 changement{{PLURAL:$3||s}}] {{PLURAL:$3|a|on}}t fôta d’una rèvision.',
	'revreview-newest-quality-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dèrriére vèrsion de qualitât] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vêde la lista]) at étâ [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
Des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changements de modèlos ou ben de fichiérs] ont fôta d’una rèvision.',
	'revreview-noflagged' => "Y at gins de vèrsion revua de ceta pâge, o est vêr possiblo que sa qualitât èye '''pas''' étâ [[{{MediaWiki:Validationpage}}|controlâ]].",
	'revreview-note' => '[[User:$1|$1]] at ècrit cetes notes de [[{{MediaWiki:Validationpage}}|rèvision]] :',
	'revreview-notes' => 'Remârques et notes a fâre vêre :',
	'revreview-oldrating' => 'Son èstimacion :',
	'revreview-patrol' => 'Marcar ceti changement coment survelyê',
	'revreview-patrol-title' => 'Marcar coment survelyê',
	'revreview-patrolled' => 'La vèrsion chouèsia de [[:$1|$1]] at étâ marcâ coment survelyê.',
	'revreview-quality' => 'Vê-que la dèrriére vèrsion de [[{{MediaWiki:Validationpage}}|qualitât]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brolyon] at [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 changement{{PLURAL:$3||s}}] qu’{{PLURAL:$3|a|on}}t fôta d’una rèvision.',
	'revreview-quality-i' => 'Vê-que la dèrriére vèrsion de [[{{MediaWiki:Validationpage}}|qualitât]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brolyon] at des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changements de modèlos ou ben de fichiérs] qu’ont fôta d’una rèvision.',
	'revreview-quality-old' => 'Vê-que una vèrsion de [[{{MediaWiki:Validationpage}}|qualitât]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vêde la lista]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.
De novéls [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changements] pôvont avêr étâ fêts.',
	'revreview-quality-same' => 'Vê-que la dèrriére vèrsion de [[{{MediaWiki:Validationpage}}|qualitât]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vêde la lista]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>.',
	'revreview-quality-source' => 'Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} vèrsion de qualitât] de ceta pâge, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo <i>$2</i>, est basâ sur ceta vèrsion.',
	'revreview-quality-title' => 'Pâge de qualitât',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pâge revua]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vêde lo brolyon]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Pâge revua]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vêde lo brolyon]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pâge revua]]'''",
	'revreview-quick-invalid' => "'''Numerô de la vèrsion fôx'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Vèrsion d’ora]]''' (pas revua)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pâge de qualitât]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vêde lo brolyon]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pâge de qualitât]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vêde lo brolyon]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pâge de qualitât]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Brolyon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vêde la pâge]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Brolyon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vêde la pâge]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-selected' => "Vèrsion chouèsia de '''$1 :'''",
	'revreview-source' => 'Tèxto sôrsa du brolyon',
	'revreview-stable' => 'Pâge stâbla',
	'revreview-stable-title' => 'Pâge revua',
	'revreview-stable1' => 'Vos souhètâd pôt-étre vêre [{{fullurl:$1|stableid=$2}} ceta vèrsion marcâ] por vêre s’o est ora la [{{fullurl:$1|stable=1}} vèrsion stâbla] de ceta pâge.',
	'revreview-stable2' => 'Vos souhètâd pôt-étre vêre la [{{fullurl:$1|stable=1}} vèrsion stâbla] de ceta pâge (se nen ègziste yona).',
	'revreview-style' => 'Liésibilitât',
	'revreview-style-0' => 'Pas aprovâ',
	'revreview-style-1' => 'Accèptâbla',
	'revreview-style-2' => 'Bôna',
	'revreview-style-3' => 'Côrta',
	'revreview-style-4' => 'Remarcâbla',
	'revreview-submit' => 'Sometre',
	'revreview-submitting' => 'Somission...',
	'revreview-finished' => 'Rèvision chavonâ !',
	'revreview-failed' => 'La rèvision at pas reussia !',
	'revreview-successful' => "'''La vèrsion chouèsia de [[:$1|$1]] at étâ marcâ avouéc reusséta ([{{fullurl:{{#Special:Stableversions}}|page=$2}} vêde totes les vèrsions stâbles]).'''",
	'revreview-successful2' => "'''La vèrsion chouèsia de [[:$1|$1]] at étâ envalidâ avouéc reusséta.'''",
	'revreview-text' => "''Les [[{{MediaWiki:Validationpage}}|vèrsions stâbles]] sont utilisâs coment lo contegnu per dèfôt por lo liésor nan pas les vèrsions les ples novèles.''",
	'revreview-text2' => "''Les [[{{MediaWiki:Validationpage}}|vèrsions stâbles]] sont les vèrsions controlâs de les pâges et pôvont étre dèfenies coment lo contegnu per dèfôt por lo liésor.''",
	'revreview-toggle-title' => 'fâre vêre / cachiér los dètalys',
	'revreview-toolow' => 'Vos dête afèctar una èstimacion ples hôta que « pas aprovâ » a châcun des atributs ce-desot por que la vèrsion seye considèrâ coment revua.
Por dèprèciyér una vèrsion, betâd tôs los champs a « pas aprovâ ».',
	'revreview-update' => "Volyéd [[{{MediaWiki:Validationpage}}|revêre]] tôs los changements ''(vêde ce-desot)'' fêts dês l’[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobacion] de la vèrsion stâbla.<br />
'''Doux-três modèlos ou ben fichiérs ont étâ betâs a jorn :'''",
	'revreview-update-includes' => "'''Doux-três modèlos ou ben fichiérs ont étâ betâs a jorn :'''",
	'revreview-update-none' => "Volyéd [[{{MediaWiki:Validationpage}}|revêre]] tôs los changements ''(vêde ce-desot)'' fêts dês l’[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobacion] de la vèrsion stâbla.",
	'revreview-update-use' => "'''Nota :''' se celos modèlos ou ben fichiérs ont una vèrsion stâbla, adonc ceta est ja utilisâ dens la vèrsion stâbla de ceta pâge.",
	'revreview-diffonly' => "''Por revêre la pâge, clicâd sur lo lim « vèrsion d’ora » et utilisâd lo formulèro de rèvision.''",
	'revreview-visibility' => "'''Ceta pâge at una [[{{MediaWiki:Validationpage}}|vèrsion stâbla]] ; sos paramètres de stabilitât pôvont étre [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurâs].'''",
	'revreview-visibility2' => "'''Ceta pâge at una [[{{MediaWiki:Validationpage}}|vèrsion stâbla]] dèpassâ ; sos paramètres de stabilitât pôvont étre [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurâs].'''",
	'revreview-visibility3' => "'''Ceta pâge at gins de [[{{MediaWiki:Validationpage}}|vèrsion stâbla]] ; sos paramètres de stabilitât pôvont étre [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurâs].'''",
	'revreview-revnotfound' => 'La vielye vèrsion de cela pâge que vos éd demandâ at pas possu étre retrovâ.
Volyéd controlar l’URL que vos éd utilisâ por arrevar a ceta pâge.',
	'right-autoreview' => 'Marcar ôtomaticament les vèrsions coment revues',
	'right-movestable' => 'Renomar des pâges stâbles',
	'right-review' => 'Marcar les vèrsions coment revues',
	'right-stablesettings' => 'Configurar los paramètres de chouèx et de visualisacion de les vèrsions stâbles',
	'right-validate' => 'Marcar les vèrsions coment validâs',
	'rights-editor-autosum' => 'ôtonomâ',
	'rights-editor-revoke' => 'at rèvocâ los drêts de contributor de [[$1]]',
	'specialpages-group-quality' => 'Assurence de qualitât',
	'stable-logentry' => 'at configurâ les vèrsions stâbles de [[$1]]',
	'stable-logentry2' => 'at tornâ inicialisar la configuracion de les vèrsions stâbles de [[$1]]',
	'stable-logpage' => 'Jornal de les vèrsions stâbles',
	'stable-logpagetext' => 'Vê-que lo jornal des changements de la configuracion de les [[{{MediaWiki:Validationpage}}|vèrsions stâbles]] de les pâges.
Vos pouede asse-ben vêre la [[Special:StablePages|lista de les pâges stâbles]].',
	'revreview-filter-all' => 'Tot',
	'revreview-filter-stable' => 'stâblo',
	'revreview-filter-approved' => 'Aprovâ',
	'revreview-filter-reapproved' => 'Tornâ aprovar',
	'revreview-filter-unapproved' => 'Pas aprovâ',
	'revreview-filter-auto' => 'Ôtomatico',
	'revreview-filter-manual' => 'Manuèl',
	'revreview-statusfilter' => 'Changement d’ètat :',
	'revreview-typefilter' => 'Tipo :',
	'revreview-levelfilter' => 'Nivél :',
	'revreview-lev-sighted' => 'revua',
	'revreview-lev-quality' => 'de qualitât',
	'revreview-lev-pristine' => 'sen tache',
	'revreview-reviewlink' => 'Revêre',
	'tooltip-ca-current' => 'Vêre lo brolyon d’ora de ceta pâge',
	'tooltip-ca-stable' => 'Vêre la vèrsion stâbla de ceta pâge',
	'tooltip-ca-default' => 'Paramètres por l’assurence de qualitât',
	'revreview-locked-title' => 'Los changements dêvont étre revus devant qu’étre montrâs sur ceta pâge.',
	'revreview-unlocked-title' => 'Los changements ont pas fôta d’étre revus devant qu’étre montrâs sur ceta pâge.',
	'revreview-locked' => 'Los changements dêvont étre [[{{MediaWiki:Validationpage}}|revus]] devant qu’étre montrâs sur ceta pâge.',
	'revreview-unlocked' => 'Los changements ont pas fôta d’étre [[{{MediaWiki:Validationpage}}|revus]] devant qu’étre montrâs sur ceta pâge.',
	'log-show-hide-review' => '$1 lo jornal de les rèvisions',
	'revreview-tt-review' => 'Revêre ceta pâge',
	'validationpage' => '{{ns:help}}:Validacion de la pâge',
);

/** Western Frisian (Frysk)
 * @author Snakesteuben
 */
$messages['fy'] = array(
	'editor' => 'Redakteur',
	'group-editor' => 'Redakteuren',
	'group-editor-member' => 'Redakteur',
	'group-reviewer' => 'Einredakteuren',
	'group-reviewer-member' => 'Einredakteur',
	'grouppage-editor' => '{{ns:project}}:Redakteur',
	'grouppage-reviewer' => '{{ns:project}}:Einredakteur',
	'reviewer' => 'Einredakteur',
	'revreview-depth-0' => 'Net kontrolearre',
	'revreview-log' => 'Oanmerking:',
	'revreview-style-2' => 'Goed',
	'revreview-revnotfound' => "De âlde ferzje fan dizze side dêr't jo om frege hawwe, is der net.
Gean nei of de keppeling dy jo brûkt hawwe wol goed is.",
);

/** Irish (Gaeilge)
 * @author Alison
 */
$messages['ga'] = array(
	'revreview-depth-1' => 'Bunúsach',
	'revreview-depth-2' => 'Meánach',
	'revreview-depth-3' => 'q',
	'revreview-log' => 'Nóta tráchta:',
	'revreview-revnotfound' => "Ní bhfuarthas seaneagrán an leathanaigh a d'iarr tú ar.
Cinntigh an URL a d'úsáid tú chun an leathanach seo a rochtain.",
);

/** Gan (贛語)
 * @author Symane
 */
$messages['gan'] = array(
	'revreview-revnotfound' => '倷請求嗰更早版本嗰修改歷史冇尋到。請檢查倷嗰URL係否正確。',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Revisións marcadas',
	'flaggedrevs-backlog' => "Actualmente hai unha acumulación de [[Special:OldReviewedPages|edicións en espera]] de páxinas revisadas. '''Precísase a súa atención!'''",
	'flaggedrevs-watched-pending' => "Actualmente hai [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} edicións pendentes] de páxinas revisadas na súa lista de vixilancia. '''A súa atención é necesaria!'''",
	'flaggedrevs-desc' => 'Dá aos editores e revisores a capacidade para confirmar as revisións e estabilizar as páxinas',
	'flaggedrevs-pref-UI' => 'Versión estable da interface:',
	'flaggedrevs-pref-UI-0' => 'Usar a interface de usuario detallada da versión estábel',
	'flaggedrevs-pref-UI-1' => 'Usar a interface de usuario simple da versión estábel',
	'prefs-flaggedrevs' => 'Estabilidade',
	'flaggedrevs-prefs-stable' => 'Amosar sempre a versión estábel das páxinas de contido por defecto (se houbese unha)',
	'flaggedrevs-prefs-watch' => 'Engadir as páxinas que revise á miña páxina de vixilancia',
	'flaggedrevs-prefs-editdiffs' => 'Mostrar as diferenzas coa versión estable ao editar as páxinas',
	'group-editor' => 'Editores',
	'group-editor-member' => 'editor',
	'group-reviewer' => 'Revisores',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'group-autoreview' => 'Autorrevisores',
	'group-autoreview-member' => 'autorrevisor',
	'grouppage-autoreview' => '{{ns:project}}:Autorrevisor',
	'hist-draft' => 'revisión do borrador',
	'hist-quality' => 'revisión de calidade',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validado] por [[User:$3|$3]]',
	'hist-stable' => 'revisión revisada',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} revisado] por [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} revisado automaticamente]',
	'review-diff2stable' => 'Ver os cambios entre as revisións estábel e a actual',
	'review-logentry-app' => 'revisou a r$2 de "[[$1]]"',
	'review-logentry-dis' => 'devaluou a r$2 de "[[$1]]"',
	'review-logentry-id' => 'ver',
	'review-logentry-diff' => 'diferenzas coa versión estábel',
	'review-logpage' => 'Rexistro de revisións',
	'review-logpagetext' => 'Este é un rexistro dos cambios nas revisións de [[{{MediaWiki:Validationpage}}|aprobación]] do status para o contido das páxinas.
Vexa a [[Special:ReviewedPages|lista de páxinas revisadas]] para ver unha lista das páxinas aprobadas.',
	'reviewer' => 'Revisor',
	'revisionreview' => 'Examinar revisións',
	'revreview-accuracy' => 'Exactitude',
	'revreview-accuracy-0' => 'Sen aprobar',
	'revreview-accuracy-1' => 'Revisada',
	'revreview-accuracy-2' => 'Exacto',
	'revreview-accuracy-3' => 'Ben documentado',
	'revreview-accuracy-4' => 'Destacado',
	'revreview-approved' => 'Aprobado',
	'revreview-auto' => '(automático)',
	'revreview-auto-w' => "Está editando unha revisión estábel; calquera cambio '''será automaticamente revisado'''.",
	'revreview-auto-w-old' => "Está editando unha revisión xa revisada; calquera cambio '''será automaticamente revisado'''.",
	'revreview-basic' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] agardando por unha revisión.',
	'revreview-basic-i' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios no modelo/ficheiro] agardando por unha revisión.',
	'revreview-basic-old' => 'Esta é unha revisión [[{{MediaWiki:Validationpage}}|revisada]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
Novos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios] foron feitos.',
	'revreview-basic-same' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|revisada]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.',
	'revreview-basic-source' => 'Unha [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versión revisada] desta páxina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>, foi baseada nesta revisión.',
	'revreview-blocked' => 'Non pode revisar esta revisión porque a súa conta está bloqueada ([$1 detalles])',
	'revreview-changed' => "'''A acción solicitada non se pode levar a cabo nesta revisión de \"[[:\$1|\$1]]\".'''

Un modelo ou ficheiro puido ser solicitado cando ningunha versión específica foi especificada.
Isto pode ocorrer se un modelo dinámico transcribe outro modelo ou ficheiro dependendo dunha variable que cambiou desde que comezou a revisar esta páxina.
Actualizar a páxina e volvela revisar pode resolver o problema.",
	'revreview-current' => 'Proxecto',
	'revreview-depth' => 'Profundidade',
	'revreview-depth-0' => 'Sen aprobar',
	'revreview-depth-1' => 'Básico',
	'revreview-depth-2' => 'Moderado',
	'revreview-depth-3' => 'Alto',
	'revreview-depth-4' => 'Destacado',
	'revreview-draft-title' => 'Páxina borrador',
	'revreview-edit' => 'Editar o borrador',
	'revreview-editnotice' => "'''Nota: as edicións que se fagan nesta páxina serán incorporadas á [[{{MediaWiki:Validationpage}}|versión estábel]] unha vez que un usuario autorizado as revise.'''",
	'revreview-flag' => 'Revisar esta revisión',
	'revreview-edited' => "'''As edicións serán incorporadas á [[{{MediaWiki:Validationpage}}|versión estábel]] unha vez que un usuario estabilizador as revise.
O ''bosquexo'' amósase embaixo.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|cambio agarda|cambios agardan}}] unha revisión.",
	'revreview-invalid' => "'''Obxectivo inválido:''' ningunha revisión [[{{MediaWiki:Validationpage}}|revisada]] se corresponde co ID dado.",
	'revreview-legend' => 'Valorar o contido da revisión',
	'revreview-log' => 'Comentario para o rexistro:',
	'revreview-main' => 'Debe seleccionar unha revisión particular dunha páxina de contido de cara á revisión.

Vexa a [[Special:Unreviewedpages|lista de páxinas sen revisar]].',
	'revreview-newest-basic' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión revisada] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amosar todas]) foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] {{PLURAL:$3|precisa|precisan}} dunha revisión.',
	'revreview-newest-basic-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión revisada] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amosar todas]) foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Os cambios no modelo/ficheiro] precisan dunha revisión.',
	'revreview-newest-quality' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidade]
	([{{fullurl:{{#Special:Stableversions}}|páxina={{FULLPAGENAMEE}}}} de toda a lista]) foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada]
	 en <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|cambios}}] {{PLURAL:$3|needs|precisan}} revisión.',
	'revreview-newest-quality-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidade] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amosar todas]) foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Os cambios no modelo/ficheiro] precisan dunha revisión.',
	'revreview-noflagged' => "Non hai revisións examinadas desta páxina,  polo que pode que '''non''' foran [[{{MediaWiki:Validationpage}}|revisadas]] na súa calidade.",
	'revreview-note' => '"[[User:$1|$1]]" fixo as seguintes notas [[{{MediaWiki:Validationpage}}|examinando]] esta revisión:',
	'revreview-notes' => 'Observacións ou notas para amosar:',
	'revreview-oldrating' => 'Valoración:',
	'revreview-patrol' => 'Marcar este cambio como patrullado',
	'revreview-patrol-title' => 'Marcar como patrullado',
	'revreview-patrolled' => 'A revisión seleccionada de [[:$1|$1]] foi marcada como revisada.',
	'revreview-quality' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|de calidade]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambios|cambios}}] agardando por unha revisión.',
	'revreview-quality-i' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|de calidade]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios no modelo/ficheiro] agardando por unha revisión.',
	'revreview-quality-old' => 'Esta é unha revisión [[{{MediaWiki:Validationpage}}|de calidade]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
Novos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios] foron feitos.',
	'revreview-quality-same' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|de calidade]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.',
	'revreview-quality-source' => 'Unha [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versión de calidade] desta páxina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>, foi baseado nesta revisión.',
	'revreview-quality-title' => 'Páxina de calidade',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Páxina revisada]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver o borrador]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Páxina revisada]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver o borrador]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Páxina revisada]]'''",
	'revreview-quick-invalid' => "'''Revisión ID inválida'''",
	'revreview-quick-none' => "'''Actualización'''. Non examinou as revisións.",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Páxina de calidade]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver o borrador]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Páxina de calidade]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver o borrador]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Páxina de calidade]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Borrador]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver a páxina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Borrador]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver a páxina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-selected' => "Seleccionada a revisión de '''$1:'''",
	'revreview-source' => 'Fontes do proxecto',
	'revreview-stable' => 'Páxina estábel',
	'revreview-stable-title' => 'Páxina revisada',
	'revreview-stable1' => 'Pode que queira ver [{{fullurl:$1|stableid=$2}} esta versión analizada] para comprobar se agora é [{{fullurl:$1|stable=1}} a versión estábel] desta páxina.',
	'revreview-stable2' => 'Quizais queira ver a [{{fullurl:$1|stable=1}} versión estábel] desta páxina (se hai algunha).',
	'revreview-style' => 'Lexibilidade',
	'revreview-style-0' => 'Sen aprobar',
	'revreview-style-1' => 'Aceptábel',
	'revreview-style-2' => 'Boa',
	'revreview-style-3' => 'Concisa',
	'revreview-style-4' => 'Destacada',
	'revreview-submit' => 'Enviar',
	'revreview-submitting' => 'Enviando...',
	'revreview-finished' => 'Revisión completada!',
	'revreview-failed' => 'Fallou a revisión!',
	'revreview-successful' => "'''A revisión seleccionada de \"[[:\$1|\$1]]\" foi analizada con éxito. ([{{fullurl:{{#Special:Stableversions}}|page=\$2}} ver as versións estábeis])'''",
	'revreview-successful2' => "'''Á revisión de \"[[:\$1|\$1]]\" foille retirada a análise con éxito.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|As versións estábeis]] son o contido por omisión ao ver unha páxina en vez da revisión máis recente.''",
	'revreview-text2' => "''As [[{{MediaWiki:Validationpage}}|versións estábeis]] son revisións comprobadas de páxinas e poden ser fixadas como contido por defecto para os lectores.''",
	'revreview-toggle-title' => 'amosar/agochar detalles',
	'revreview-toolow' => 'Debe, polo menos, valorar cada un dos atributos de embaixo cunha puntuación maior a "sen aprobar" para que unha revisión sexa considerada como "revisada".
Para despreciar unha revisión, encha todos os campos con "sen aprobar".',
	'revreview-update' => "Por favor, [[{{MediaWiki:Validationpage}}|revise]] os cambios ''(amósanse embaixo)'' feitos desde que a revisión estábel foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada].<br />
'''Actualizáronse algúns modelos/ficheiros:'''",
	'revreview-update-includes' => "'''Actualizáronse algúns modelos/ficheiros:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Revise]] os cambios ''(amósanse embaixo)'' feitos desde a revisión estábel que foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada].",
	'revreview-update-use' => "'''NOTA:''' se algún destes modelos/ficheiros ten unha versión estábel, entón esta xa é usada na versión estábel desta páxina.",
	'revreview-diffonly' => "''Para revisar a páxina, faga clic na ligazón da revisión \"revisión actual\" e use o formulario de revisión.''",
	'revreview-visibility' => "'''Esta páxina ten unha [[{{MediaWiki:Validationpage}}|versión estable]] actualizada; os parámetros de estabilidade desta páxina poden ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-visibility2' => "'''Esta páxina ten unha [[{{MediaWiki:Validationpage}}|versión estable]] obsoleta; os parámetros de estabilidade desta páxina poden ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-visibility3' => "'''Esta páxina non ten unha [[{{MediaWiki:Validationpage}}|versión estable]]; os parámetros de estabilidade desta páxina poden ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-revnotfound' => 'A revisión vella que pediu non se deu atopado.
Por favor verifique o URL que utilizou para acceder a esta páxina.',
	'right-autoreview' => 'Marcar automaticamente as revisións como revisadas',
	'right-movestable' => 'Mover páxinas estábeis',
	'right-review' => 'Marcar as revisións como revisadas',
	'right-stablesettings' => 'Configurar como é seleccionada e amosada a versión estábel',
	'right-validate' => 'Marcar as revisións como validadas',
	'rights-editor-autosum' => 'autopromocionado',
	'rights-editor-revoke' => 'eliminado o status de editor de [[$1]]',
	'specialpages-group-quality' => 'Garantía de calidade',
	'stable-logentry' => 'configurou a versión estábel de "[[$1]]"',
	'stable-logentry2' => 'resetear a versión estábel para [[$1]]',
	'stable-logpage' => 'Rexistro de versións estábeis',
	'stable-logpagetext' => 'Este é un rexistro dos cambios da configuración da [[{{MediaWiki:Validationpage}}|versión estábel]] do contido das páxinas.
Unha lista das páxinas estabilizadas pode ser atopada na [[Special:StablePages|lista de páxinas estábeis]].',
	'revreview-filter-all' => 'Todas',
	'revreview-filter-stable' => 'estable',
	'revreview-filter-approved' => 'Aprobadas',
	'revreview-filter-reapproved' => 'Reaprobadas',
	'revreview-filter-unapproved' => 'Non aprobadas',
	'revreview-filter-auto' => 'Automático',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => 'Cambio de status:',
	'revreview-typefilter' => 'Tipo:',
	'revreview-levelfilter' => 'Nivel:',
	'revreview-lev-sighted' => 'revisada',
	'revreview-lev-quality' => 'calidade',
	'revreview-lev-pristine' => 'previa',
	'revreview-reviewlink' => 'revisar',
	'tooltip-ca-current' => 'Ver o proxecto actual desta páxina',
	'tooltip-ca-stable' => 'Ver a versión estábel desta páxina',
	'tooltip-ca-default' => 'Configuración de garantía da calidade',
	'revreview-locked-title' => 'As edicións deben ser revisadas antes de ser amosadas nesta páxina.',
	'revreview-unlocked-title' => 'As edicións non requiren ser revisadas antes de ser amosadas nesta páxina.',
	'revreview-locked' => 'As edicións deben estar [[{{MediaWiki:Validationpage}}|revisadas]] antes de ser amosadas nesta páxina.',
	'revreview-unlocked' => 'As edicións non requiren [[{{MediaWiki:Validationpage}}|revisión]] antes de ser amosadas nesta páxina.',
	'log-show-hide-review' => '$1 o rexistro de revisións',
	'revreview-tt-review' => 'Revisar esta páxina',
	'validationpage' => '{{ns:help}}:Validación da páxina',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'editor' => 'Μεταγραφεύς',
	'flaggedrevs' => 'Ἐληλεγμέναι Ἀναθεωρήσεις',
	'group-editor' => 'Μεταγραφεῖς',
	'group-editor-member' => 'μεταγραφεύς',
	'group-reviewer' => 'Ἐπιθεωρηταί',
	'group-reviewer-member' => 'ἐπιθεωρητής',
	'grouppage-editor' => '{{ns:project}}:Μεταγραφεύς',
	'grouppage-reviewer' => '{{ns:project}}:Ἐπιθεωρητής',
	'group-autoreview' => 'Αὐτόματοι ἐπιθεωρηταί',
	'hist-draft' => 'πρόχειρος ἐπιθεώρησις',
	'hist-quality' => 'ποιοτικὴ ἀναθεώρησις',
	'hist-stable' => 'θεωρημένη ἀναθεώρησις',
	'review-logentry-app' => 'Ἀναθεωρημένη r$2 τῆς [[$1]]',
	'review-logentry-id' => 'Ὁρᾶν',
	'review-logentry-diff' => 'διαφ. ὡς πρὸς τὴν σταθερά',
	'review-logpage' => 'Ἀναθεωρήσεων κατάλογος',
	'reviewer' => 'ἐπιθεωρητής',
	'revisionreview' => 'ἐπιθεωρεῖν ἀναθεωρήσεις',
	'revreview-accuracy' => 'Ἀκρίβεια',
	'revreview-accuracy-0' => 'Μὴ προκεκριμένη',
	'revreview-accuracy-1' => 'Θεωρημένη',
	'revreview-accuracy-2' => 'Ἀκριβής',
	'revreview-accuracy-4' => 'Ἐξαίρετος',
	'revreview-approved' => 'Προκεκριμένη',
	'revreview-auto' => '(αὐτόματος)',
	'revreview-current' => 'Πρόχειρος',
	'revreview-depth' => 'Βάθος',
	'revreview-depth-0' => 'Μὴ προκεκριμένη',
	'revreview-depth-1' => 'βασική',
	'revreview-depth-2' => 'Μετρία',
	'revreview-depth-3' => 'Ὑψηλὴ',
	'revreview-depth-4' => 'Ἐξαίρετος',
	'revreview-draft-title' => 'Προσχέδιος δέλτος',
	'revreview-edit' => 'Προσχέδιον μεταγραφῆς',
	'revreview-log' => 'Σχόλιον:',
	'revreview-oldrating' => 'Ἐβαθμώθη:',
	'revreview-patrol-title' => 'Σημαίνειν ὡς περιπολουμένην',
	'revreview-quality' => "Ἥδε ἐστὶ ἡ [[{{MediaWiki:Validationpage}}|ποιοτικὴ ἔκδοσις]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ἐπικυρωμένη] κατὰ τὴν ''$2''. Ἡ [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} πρόχειρη ἔκδοσις] περιέχει [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 μεταβολὴν ἀναμένουσαν|$3 μεταβολὰς ἀναμένουσας}}] ἐπιθεώρησιν.",
	'revreview-quality-title' => 'ποιοτικὴ ἔκδοσις',
	'revreview-quick-invalid' => "'''Ἄκυρος ἀναθεώρησις ID'''",
	'revreview-source' => 'πρόχειρος πηγή',
	'revreview-stable' => 'Σταθερὰ δέλτος',
	'revreview-stable-title' => 'θεωρημένη δέλτος',
	'revreview-style' => 'Ἀναγνωσιμότης',
	'revreview-style-0' => 'Μὴ προκεκριμένη',
	'revreview-style-1' => 'ἀποδεκτὸν',
	'revreview-style-2' => 'Καλή',
	'revreview-style-3' => 'Περιεκτική',
	'revreview-style-4' => 'Ἐξαίρετος',
	'revreview-submit' => 'Ὑποβάλλειν',
	'revreview-submitting' => 'Ὑποβἀλλειν...',
	'revreview-filter-all' => 'Ἅπασαι',
	'revreview-filter-stable' => 'σταθερά',
	'revreview-filter-approved' => 'Προκεκριμένη',
	'revreview-filter-reapproved' => 'Ἁναπροκεκριμένη',
	'revreview-filter-unapproved' => 'Μὴ προκεκριμένη',
	'revreview-filter-auto' => 'αὐτόματος',
	'revreview-filter-manual' => 'χειροκίνητος',
	'revreview-statusfilter' => 'Ἀλλαγὴ καθεστῶτος:',
	'revreview-typefilter' => 'Τύπος:',
	'revreview-levelfilter' => 'Ἐπίπεδον:',
	'revreview-lev-sighted' => 'τεθεωρημένη',
	'revreview-lev-quality' => 'ποιοτικὴ',
	'revreview-lev-pristine' => 'Ἀνέπαφος',
	'revreview-reviewlink' => 'ἐπιθεωρεῖν',
	'log-show-hide-review' => '$1 κατάλογος ἀναθεωρήσεων',
	'revreview-tt-review' => 'Ἐπιθεωρεῖν τήνδε τὴν δέλτον',
	'validationpage' => '{{ns:help}}:Έπικύρωσις δέλτου',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 * @author Melancholie
 */
$messages['gsw'] = array(
	'editor' => 'Fäldhieter',
	'flaggedrevs' => 'Markierti Versione',
	'flaggedrevs-backlog' => "D [[Special:OldReviewedPages|Lischt vu dr Syte mit nit vum Fäldhieter aagluegte Versione]] isch seli lang. '''S brucht Dyyni Ufmerksamkeit!'''",
	'flaggedrevs-watched-pending' => "S het im Momänt [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} Bearbeitige, wu nonig vum Fäldhieter aagluegt sin], uf Syte, wu uf Dyynere Beobachtigslischt stehn. '''S brucht Dyyni Ufmerksamkeit!'''",
	'flaggedrevs-desc' => 'Git Fäldhieter un Priefer d Megligkeit Versione z priefe un Syten as Fäldhieter aazluege',
	'flaggedrevs-pref-UI' => 'Interface vu Stabili Versione:',
	'flaggedrevs-pref-UI-0' => 'detaillierti Benutzerschnittstelle',
	'flaggedrevs-pref-UI-1' => 'eifachi Benutzerschnittstelle',
	'prefs-flaggedrevs' => 'Stabilität',
	'flaggedrevs-prefs-stable' => 'Zeig as Standard immer di gsichtet Version vun ere Syte (wänn s eini het)',
	'flaggedrevs-prefs-watch' => 'Sälber priefti Syte automatisch beobachte',
	'flaggedrevs-prefs-editdiffs' => 'Bim Ändre dr Unterschid zeige zue dr stabili Syte',
	'group-editor' => 'Fäldhieter',
	'group-editor-member' => 'Fäldhieter',
	'group-reviewer' => 'Priefer',
	'group-reviewer-member' => 'Priefer',
	'grouppage-editor' => '{{ns:project}}:Fäldhieter',
	'grouppage-reviewer' => '{{ns:project}}:Priefer',
	'group-autoreview' => 'Autoreviewer',
	'group-autoreview-member' => 'Autoreviewer',
	'grouppage-autoreview' => '{{ns:project}}:Autoreviewer',
	'hist-draft' => 'Entwurfsvèrsion',
	'hist-quality' => 'priefti Version',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} prieft] vu [[User:$3|$3]]',
	'hist-stable' => 'vum Fäldhieter aagluegti Version',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} aaglueget]: [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatisch vum Fäldhieter aaglueget]',
	'review-diff2stable' => 'Unterschid zwische dr vum Fäldhieter aagluegte un dr aktuälle Version aaluege',
	'review-logentry-app' => 'markierti Version $2 vu „[[$1]]“',
	'review-logentry-dis' => 'het d Markierig fir d Version $2 vu „[[$1]]“ usegnuh',
	'review-logentry-id' => 'aaluege',
	'review-logentry-diff' => 'Unterschid zue dr vum Fäldhieter aagluegte Version',
	'review-logpage' => 'Versionsmarkierigs-Logbuech',
	'review-logpagetext' => 'In däm Logbuech wäre d [[{{MediaWiki:Validationpage}}|Sichtige un Priefige]] vu Versione protokolliert. Lueg d  [[Special:ReviewedPages|Lischt vu markierte Versione]].',
	'reviewer' => 'Priefer',
	'revisionreview' => 'Versionspriefig',
	'revreview-accuracy' => 'Status',
	'revreview-accuracy-0' => 'nit frejgee',
	'revreview-accuracy-1' => 'vum Fäldhieter gsäh',
	'revreview-accuracy-2' => 'prieft',
	'revreview-accuracy-3' => 'Quälle prieft',
	'revreview-accuracy-4' => 'Bsunders glunge',
	'revreview-approved' => 'Frejgee',
	'revreview-auto' => '(automatisch)',
	'revreview-auto-w' => "Du bearbeitesch e vum Fäldhieter aagluegti Version; Bearbeitige wäre '''automatisch as vum Fäldhieter gsäh''' markiert.",
	'revreview-auto-w-old' => "Du bearbeitesch e vum Fäldhieter aagluegti Version; Bearbeitige wäre '''automatisch as vum Fäldhieter gsäh''' markiert.",
	'revreview-basic' => 'Des isch d letscht [[{{MediaWiki:Validationpage}}|vum Fäldhieter aagluegt]] Vèrsion, [{{fullurl:Spezial:Log|type=review&page={{FULLPAGENAMEE}}}} frejgee] <i>$2</i>.
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Änderig sott|Änderige sotte}}] no vum Fäldhieter aagluegt wäre.',
	'revreview-basic-i' => 'Des isch di letscht [[{{MediaWiki:Validationpage}}|vum Fäldhieter aagluegt]] Version, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] am <i>$2</i>.
Im [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Entwurf] het s [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderige an Vorlage/Dateie], wu no vum Fäldhieter sotte aagluegt wäre.',
	'revreview-basic-old' => 'Des isch e [[{{MediaWiki:Validationpage}}|vum Fäldhieter aagluegt]] Version ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} → alli]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] am <i>$2</i>.
S cha syy, ass es neiji [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderige] dra gee het.',
	'revreview-basic-same' => "Des isch di letscht [[{{MediaWiki:Validationpage}}|vum Fäldhieter aagluegt]] Version, ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zeig alli]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] am <i>$2</i>. D Syte cha '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bearbeitet]''' wäre.",
	'revreview-basic-source' => 'E [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} vum Fäldhieter aagluegti Version] vu däre Syte, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] am <i>$2</i>, basiert uf däre Version.',
	'revreview-blocked' => 'Du chasch die Version nit markiere, wel Dyy Benutzerkonto zur Zyt gsperrt isch ([$1 Detail])',
	'revreview-changed' => "'''D Aktion het nit chenne uf d Version vu [[:$1|$1]] aagwändet wäre.'''

E Vorlag oder e Datei sin ohni spezifischi Versionsnummere aagforderet wore. Des cha passiere, wänn e dynamischi Vorlag e anderi Vorlag oder e Bild yybindet, wu vun ere Variable abhängig isch, wu sich veränderet het, syter ass es d Markierig vu däre Syte aagfange het. S Probläm cha behobe wäre, wämer d Syte nej ladet un nej markiert.",
	'revreview-current' => 'Entwurf',
	'revreview-depth' => 'Tiefi',
	'revreview-depth-0' => 'nit frejgee',
	'revreview-depth-1' => 'eifach',
	'revreview-depth-2' => 'mittel',
	'revreview-depth-3' => 'hoch',
	'revreview-depth-4' => 'bsunders glunge',
	'revreview-draft-title' => 'Entwurfsvèrsion',
	'revreview-edit' => 'Entwurf bearbeite',
	'revreview-editnotice' => "'''Bearbeitige vu däre Syte wäre zerscht in di [[{{MediaWiki:Validationpage}}|gsichtet Version]] ibernuh, wänn si vun eme Fäldhieter aagluet wore sin.'''",
	'revreview-flag' => 'Die Version as Fäldhieter aaluege',
	'revreview-edited' => 'Neiji Bearbeitige wäre as [[{{MediaWiki:Validationpage}}|gsichteti Version]] ibernuh, wänn si vun eme Fäldhieter frejgee wore sin.
Do wird di aktuäll, nit gsichtet Version aazeigt. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|Änderig sott|Änderige sotte}}] vun eme Fäldhieter aagluegt wäre.',
	'revreview-invalid' => "'''Nit giltig Ziil:''' kei [[{{MediaWiki:Validationpage}}|gsichteti]] Artikelversion vu dr Versions-ID wu aagee isch.",
	'revreview-legend' => 'Inhalt vu dr Version bewärte',
	'revreview-log' => 'Kommentar:',
	'revreview-main' => 'Du muesch e Artikelversion uswehle go si markiere.

Lueg au d [[Special:Unreviewedpages|Lischt vu nit markierte Versione]].',
	'revreview-newest-basic' => 'Di [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letscht vum Fäldhieter aagluegt Vèrsion]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} → alli]) isch am <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] wore.
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}] {{PLURAL:$3|sott|sotte}} no vum Fäldhieter aagluegt wäre.',
	'revreview-newest-basic-i' => 'Di [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letscht vum Fäldhieter aagluegt Version] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} alli]) sin  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee wore] am <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderige an Vorlage/Dateie] sotte vum Fäldhieter aagluegt wäre.',
	'revreview-newest-quality' => 'Di [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letscht prieft Version] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} → alli]) isch am <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee wore].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}] {{PLURAL:$3|sott|sotte}} no vum Fäldhieter aagluegt wäre.',
	'revreview-newest-quality-i' => 'Di [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letscht prieft Version] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} alli]) isch [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee wore] am <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderige an Vorlage/Dateie] sotte no vum Fäldhieter aagluegt wäre.',
	'revreview-noflagged' => 'Vu däre Syte git s kei markierti Versione, wäge däm cha no kei Ussag gmacht wäre iber d  [[{{MediaWiki:Validationpage}}|Qualitet]].',
	'revreview-note' => '[[User:$1|$1]] het die [[{{MediaWiki:Validationpage}}|Priefnotiz]] zue däre Version gmacht:',
	'revreview-notes' => 'Bemerkige oder Notize, wu sotte aazeigt wäre:',
	'revreview-oldrating' => 'Yystufig bis jetz:',
	'revreview-patrol' => 'Kontrollier die Änderig',
	'revreview-patrol-title' => 'As kontrolliert markiere',
	'revreview-patrolled' => 'Di usgwehlt Version vu [[:$1|$1]] isch vum Fäldhieter aagluegt wore.',
	'revreview-quality' => 'Des isch di letscht [[{{MediaWiki:Validationpage}}|prieft]] Version, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] am <i>$2</i>.

[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Änderig sott|Änderige sotte}}] no vum Fäldhieter aagluegt wäre.',
	'revreview-quality-i' => 'Des isch di letschte [[{{MediaWiki:Validationpage}}|prieft]] Version, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] am <i>$2</i>.
Im [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Entwurf] het s [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderige an Vorlage/Dateie], wu no vum Fäldhieter sotte aagluegt wäre.',
	'revreview-quality-old' => 'Des isch e [[{{MediaWiki:Validationpage}}|priefti]] Version ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} → alli]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] am <i>$2</i>.
S cha syy, ass es scho neiji [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderige] dra gee het.',
	'revreview-quality-same' => "Des isch di letschte [[{{MediaWiki:Validationpage}}|prieft]] Version, ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zeig alli]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] am <i>$2</i>. D Syte cha '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bearbeitet]''' wäre.",
	'revreview-quality-source' => 'E [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} priefti Version] vu däre Syte, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} frejgee] am <i>$2</i>, basiert uf däre Version.',
	'revreview-quality-title' => 'Priefte Syte',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Vum Fäldhieter gsäh]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zue dr aktuälle Version])",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Vum Fäldhieter gsäh]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} letschti nit markierti Syte])",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Vum Fäldhieter gsäh]]'''",
	'revreview-quick-invalid' => "'''Nit giltigi Versions-ID'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Kei Version vum Fäldhieter gsäh.]]'''",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Prieft]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zue dr aktuälle Version])",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Prieft]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} letschti nit markierti Syte])",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Prieft]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Nit vum Fäldhieter aagluegti Version]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letschti aagluegti Version]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} verglyych])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Nit vum Fäldhieter aagluegti Version]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letschti aagluegti Version]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} verglyych])",
	'revreview-selected' => "Usgwehlti Version vu '''$1:'''",
	'revreview-source' => 'Quälltäxt',
	'revreview-stable' => 'Artikel',
	'revreview-stable-title' => 'Vum Fäldhieter aagluegti Vèrsion',
	'revreview-stable1' => 'Mechtsch d Version vu däre Syte säh, [{{fullurl:$1|stableid=$2}} wu grad markiert woren isch], wänn s jetz imfall di [{{fullurl:$1|stable=1}} vum Fäldhieter aagluegt Version] isch?',
	'revreview-stable2' => 'Wit du d’[{{fullurl:$1|stable=1}} vom Fäldhieter aagluegt Vèrsion] vo dere Syte seah (wenn’s noo uine git)?',
	'revreview-style' => 'Läsbarkeit',
	'revreview-style-0' => 'nit frejgee',
	'revreview-style-1' => 'akzeptabel',
	'revreview-style-2' => 'guet',
	'revreview-style-3' => 'gnau',
	'revreview-style-4' => 'bsunders glunge',
	'revreview-submit' => 'Vèrsion markiere',
	'revreview-submitting' => '… bitte warte …',
	'revreview-finished' => 'Markierig isch gsetzt worre ✔',
	'revreview-failed' => 'Priefig fählgschlaa!',
	'revreview-successful' => "'''Di usgwehlt Version vum Artikel ''[[:\$1|\$1]]'' isch as \"vum Fäldhieter gsäh\" markiert wore ([{{fullurl:{{#Special:Stableversions}}|page=\$2}} alli aagluegte Versione vu däm Artikel])'''.",
	'revreview-successful2' => "'''D Markierig vu dr Version vu [[:$1|$1]] isch ufghobe wore.'''",
	'revreview-text' => 'E [[{{MediaWiki:Validationpage}}|vum Fäldhieter aagluegti Version]] wird bi dr Sytedarstellig bevorzugt vor ere neijere, nit aagluegte Version.',
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Vum Fäldhieter aagluegti Versione]] chenne as Standardaazeig fir Leser yygstellt wäre.''",
	'revreview-toggle-title' => 'zeig/versteck Detail',
	'revreview-toolow' => 'Du muesch fir e jedes vu däne Attribut e Wärt yystelle, wu hecher isch wie „{{int:revreview-accuracy-0}}“, ass e Version as "vum Fäldhieter gsäh" giltet. Zum e Version z verwerfe, mien alli Attribut uf „{{int:revreview-accuracy-0}}“ stoh.',
	'revreview-update' => "Bitte [[{{MediaWiki:Validationpage}}|lueg d Änderige aa]] ''(lueg unte)'', wu syt dr  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} letschten aagluegte Version] gmacht wore sin.<br />
'''Die Vorlage un Dateie sin gänderet wore:'''",
	'revreview-update-includes' => "'''E paar Vorlage/Dateie sin aktualisiert wore:'''",
	'revreview-update-none' => "Bitte due d Änderige ga [[{{MediaWiki:Validationpage}}|nocheluege]] wo sit de letschti [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} vum Fäldhieter aagluegte Vèrsion] gmacht worre sind ''(lüeg unde)''.",
	'revreview-update-use' => "'''Obacht:''' Wänn eini vu däne Vorlage/Dateie e vum Fäldhieter aagluegti Version het, no wird die in dr aagluegte Version vu däre Syte aazeigt.",
	'revreview-diffonly' => "''Go die Syte as Fäldhieter z markiere, druck bitte uf s Gleich „Aktuälli Version“ un verwänd dert s Fäldhieterchäschtli.''",
	'revreview-visibility' => "'''Die Syte het e aktualisierti [[{{MediaWiki:Validationpage}}|markierti Version]]; d Yystellige, wie si aazeigt wird, chenne [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfiguriert] wäre.'''",
	'revreview-visibility2' => "'''Die Syte het e veralteti [[{{MediaWiki:Validationpage}}|markierti Version]]; d Yystellige, wie si aazeigt wird, chenne [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfiguriert] wäre.'''",
	'revreview-visibility3' => "'''Die Syte het kei aktualisierti [[{{MediaWiki:Validationpage}}|markierti Version]]; d Yystellige, wie si aazeigt wird, chenne [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfiguriert] wäre.'''",
	'revreview-revnotfound' => 'D Version vu däre Syte, wu Du gsuecht hesch, het nit chenne gfunde wäre. Bitte iberprief d URL vu däre Syte.',
	'right-autoreview' => 'Automatischs Markiere vu Versionen as "vum Fäldhieter gsäh"',
	'right-movestable' => 'Verschiebe vu Syte, wu vum Fäldhieter gsäh un/oder prieft sin',
	'right-review' => 'Markier Versione as "vum Fäldhieter gsäh"',
	'right-stablesettings' => 'Konfiguration vu dr Aazeig vu markierte Versione',
	'right-validate' => 'Markier Versione as prieft',
	'rights-editor-autosum' => 'automatisch erteilt',
	'rights-editor-revoke' => 'nimm dr Priefer-Status vu „[[$1]]“ use',
	'specialpages-group-quality' => 'Qualitetssicherig',
	'stable-logentry' => 'het d Sytekonfiguration vu „[[$1]]“ gänderet',
	'stable-logentry2' => 'het d Sytekonfiguration fir „[[$1]]“ zruckgsetzt',
	'stable-logpage' => 'Sytekonfigurations-Logbuech',
	'stable-logpagetext' => 'Des isch s Änderigslogbuech vu dr Sytekonfigurationen vu dr [[{{MediaWiki:Validationpage}}|markierte Versione]].
Lueg au d [[Special:StablePages|Lischt vu dr markierte Versione]].',
	'revreview-filter-all' => 'Alli',
	'revreview-filter-stable' => 'aagluegt',
	'revreview-filter-approved' => 'Markiert',
	'revreview-filter-reapproved' => 'Nomol markiert',
	'revreview-filter-unapproved' => 'Markierig usegnuh',
	'revreview-filter-auto' => 'Automatisch',
	'revreview-filter-manual' => 'Vu Hand',
	'revreview-statusfilter' => 'Statusänderig:',
	'revreview-typefilter' => 'Typ:',
	'revreview-levelfilter' => 'Ebeni:',
	'revreview-lev-sighted' => 'vum Fäldhieter aagluegti',
	'revreview-lev-quality' => 'priefti',
	'revreview-lev-pristine' => 'reini',
	'revreview-reviewlink' => 'as Fäldhieter aaluege',
	'tooltip-ca-current' => 'Di aktuäll, nit markiert Syte aaluege',
	'tooltip-ca-stable' => 'Di markiert Version vu däre Syte aaluege',
	'tooltip-ca-default' => 'Yystellige vu dr Artikel-Qualitet',
	'revreview-locked-title' => 'Bearbeitige mien markiert wäre, voreb si uf däre Syte aazeigt wäre.',
	'revreview-unlocked-title' => 'Bearbeitige bruuche nit markiert syy, voreb si uf däre Syte aazeigt wäre.',
	'revreview-locked' => 'Bearbeitige mien markiert wäre, voreb si uf däre Syte aazeigt wäre.',
	'revreview-unlocked' => 'Bearbeitige bruuche nit markiert syy, voreb si uf däre Syte aazeigt wäre.',
	'log-show-hide-review' => 'Versionsmarkierigs-Logbuech $1',
	'revreview-tt-review' => 'Markier die Syte',
	'validationpage' => '{{ns:project}}:Stabilversionen',
);

/** Hakka (Hak-kâ-fa)
 * @author Hakka
 */
$messages['hak'] = array(
	'revreview-revnotfound' => 'Chhiáng-khiù ke kien-chó pán-pún ke siû-thin ki-liu̍k mò-yû cháu-to. Chhiáng kiám-chhà chhiáng-khiù pún-chông yung ke URL he-féu chṳn-khok.',
);

/** Hawaiian (Hawai`i)
 * @author Singularity
 */
$messages['haw'] = array(
	'editor' => 'Luna',
	'flaggedrevs' => 'Nā Kāmua Kaha',
	'group-editor' => 'Nā luna',
	'group-editor-member' => 'Luna',
);

/** Hebrew (עברית)
 * @author DoviJ
 * @author Nahum
 * @author Ori229
 * @author Rotemliss
 * @author StuB
 * @author דניאל ב.
 */
$messages['he'] = array(
	'editor' => 'עורך',
	'flaggedrevs' => 'גרסאות מסומנות',
	'flaggedrevs-backlog' => "הצטברו [[Special:OldReviewedPages|עריכות ממתינות]] בדפים שנבדקו. '''תשומת לבך נדרשת!'''",
	'flaggedrevs-watched-pending' => "יש [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} עריכות ממתינות] בדפים שנבדקו הנמצאים ברשימת המעקב שלך. '''תשומת לבך נדרשת!'''",
	'flaggedrevs-desc' => 'אפשרות לעורכים ולבודקי הדפים לאשר גרסאות ולייצב דפים',
	'flaggedrevs-pref-UI' => 'ממשק להצגת גרסאות מסומנות:',
	'flaggedrevs-pref-UI-0' => 'שימוש בתצוגת גרסאות מסומנות מפורטת.',
	'flaggedrevs-pref-UI-1' => 'שימוש בתצוגת גרסאות מסומנות פשוטה',
	'prefs-flaggedrevs' => 'יציבות',
	'flaggedrevs-prefs-stable' => 'הצגת הגרסה המסומנת כברירת מחדל בדפי תוכן (אם היא קיימת)',
	'flaggedrevs-prefs-watch' => 'הוספת דפים שבדקתי לרשימת המעקב שלי',
	'group-editor' => 'עורכים',
	'group-editor-member' => 'עורך',
	'group-reviewer' => 'בודקי דפים',
	'group-reviewer-member' => 'בודק דפים',
	'grouppage-editor' => '{{ns:project}}:עורך',
	'grouppage-reviewer' => '{{ns:project}}:בודק גרסאות',
	'group-autoreview' => 'בודקי דפים אוטומטיים',
	'group-autoreview-member' => 'בודק דפים אוטומטי',
	'grouppage-autoreview' => '{{ns:project}}:בודק דפים אוטומטי',
	'hist-draft' => 'גרסת טיוטה',
	'hist-quality' => 'גרסה איכותית',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} אושרה] על ידי [[User:$3|$3]]',
	'hist-stable' => 'גרסה נצפית',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} נצפתה] על ידי [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} נצפתה אוטומטית]',
	'review-diff2stable' => 'הצגת ההבדלים בין הגרסה היציבה והגרסה הנוכחית',
	'review-logentry-app' => 'בדק את גרסה $2 של [[$1]]',
	'review-logentry-dis' => 'סימן את גרסה $2 של [[$1]] כבעייתית',
	'review-logentry-id' => 'צפייה',
	'review-logentry-diff' => 'השוואה לגרסה היציבה',
	'review-logpage' => 'יומן בדיקת גרסאות',
	'review-logpagetext' => 'זהו יומן השינויים ל[[{{MediaWiki:Validationpage}}|אישור]] מעמדן של גרסאות בדפי תוכן.
ראו את [[Special:ReviewedPages|רשימת הדפים שנבדקו]] לרשימת דפים מאושרים.',
	'reviewer' => 'בודק גרסאות',
	'revisionreview' => 'בדיקת גרסאות',
	'revreview-accuracy' => 'דיוק',
	'revreview-accuracy-0' => 'לא אושר',
	'revreview-accuracy-1' => 'נבדק',
	'revreview-accuracy-2' => 'מדויק',
	'revreview-accuracy-3' => 'עם מקורות תקינים',
	'revreview-accuracy-4' => 'מצוין',
	'revreview-approved' => 'אושר',
	'revreview-auto' => '(אוטומטי)',
	'revreview-auto-w' => "הנכם עורכים את הגרסה היציבה; השינויים '''יאושרו אוטומטית'''.",
	'revreview-auto-w-old' => "הנכם עורכים גרסה שנבדקה; השינויים '''יאושרו אוטומטית'''.",
	'revreview-basic' => 'זוהי הגרסה ה[[{{MediaWiki:Validationpage}}|נצפית]] האחרונה, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב<i>$2</i>.
ב[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} טיוטה] יש [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|שינוי אחד|$3 שינויים}}] {{PLURAL:$3|הטעון אישור|הטעונים אישור}}.',
	'revreview-basic-i' => 'זוהי הגרסה האחרונה ש[[{{MediaWiki:Validationpage}}|נצפתה]], והיא [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>.
ב[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} טיוטה] יש [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים בתבניות/בקבצים] הטעונים אישור.',
	'revreview-basic-old' => 'זוהי גרסה [[{{MediaWiki:Validationpage}}|נצפית]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} הצגת הכול]), נבדקה ב־<i>$2</i>.
ייתכן שנעשו בה [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים חדשים].',
	'revreview-basic-same' => 'זוהי הגרסה ה[[{{MediaWiki:Validationpage}}|נצפית]] האחרונה ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} הצגת הכול]), נבדקה ב־<i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} גרסה נצפית] של דף זה, ש[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>, מבוססת על גרסה זו.',
	'revreview-blocked' => 'אינכם יכולים לבדוק גרסה זו כיוון שהחשבון שלכם חסום כרגע ([$1 פרטים])',
	'revreview-changed' => "'''לא ניתן לבצע את הפעולה המבוקשת בגרסה זו של [[:$1|$1]].'''

ייתכן שביקשתם תבנית או קובץ ללא ציון גרסה מסוימת.
בעיה זו יכולה להופיע אם תבנית דינמית מכלילה קובץ או תבנית אחרת בהתאם לערכו של משתנה, שהשתנה מאז שהתחלתם בבדיקת דף זה.
רענון הדף וביצוע בדיקה חוזרת עשויים לפתור את הבעיה.",
	'revreview-current' => 'טיוטה',
	'revreview-depth' => 'שלמות',
	'revreview-depth-0' => 'לא אושר',
	'revreview-depth-1' => 'בסיסי',
	'revreview-depth-2' => 'בינוני',
	'revreview-depth-3' => 'גבוה',
	'revreview-depth-4' => 'מצוין',
	'revreview-draft-title' => 'דף טיוטה',
	'revreview-edit' => 'עריכת טיוטה',
	'revreview-editnotice' => "'''הערה: עריכות לדף זה ישולבו לתוך [[{{MediaWiki:Validationpage}}|הגרסה היציבה]] רק לאחר שמשתמש מורשה יבדוק אותן.'''",
	'revreview-flag' => 'סימון גרסה זו כבדוקה',
	'revreview-edited' => "'''עריכות ישולבו לתוך [[{{MediaWiki:Validationpage}}|הגרסה היציבה]] רק לאחר שמשתמש מורשה יבדוק אותן.'''
'''ה''טיוטה'' מוצגת להלן.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|שינוי אחד מחכה|$2 שינויים מחכים}}] לבדיקה.",
	'revreview-invalid' => "'''מטרה בלתי תקינה:''' מספר הגרסה שניתן אינו מצביע לגרסה [[{{MediaWiki:Validationpage}}|שנבדקה]].",
	'revreview-legend' => 'דירוג תוכן הגרסה',
	'revreview-log' => 'הערה:',
	'revreview-main' => 'עליכם לבחור גרסה מסוימת של דף תוכן כדי לבדוק אותה.

ראו את [[Special:Unreviewedpages|רשימת הדפים שלא נבדקו]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} הגרסה הנצפית האחרונה] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} הצגת כולן]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב־<i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|שינוי אחד|$3 שינויים}}] {{PLURAL:$3|טעונים|טעון}} בדיקה.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} הגרסה האחרונה שנצפתה] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} הצגת כולן]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב־<i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים בתבניות/בקבצים] טעונים בדיקה.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} הגרסה האיכותית האחרונה] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} הצגת כולן]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב־<i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|שינוי אחד|$3 שינויים}}] {{PLURAL:$3|טעונים|טעון}} בדיקה.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} הגרסה האיכותית האחרונה] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} הצגת כולן]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב־<i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים בתבניות/בקבצים] טעונים בדיקה.',
	'revreview-noflagged' => "אין בדף זה גרסאות שנבדקו, וייתכן שהוא '''לא''' עבר [[{{MediaWiki:Validationpage}}|בדיקה]] של האיכות.",
	'revreview-note' => '[[User:$1|$1]] רשם את ההערות הבאות במהלך [[{{MediaWiki:Validationpage}}|בדיקה]] של גרסה זו:',
	'revreview-notes' => 'תובנות או הערות להצגה:',
	'revreview-oldrating' => 'קיבל דירוג של:',
	'revreview-patrol' => 'סימון שינוי זה כבדוק',
	'revreview-patrol-title' => 'סימון כבדוק',
	'revreview-patrolled' => 'הגרסה שנבחרה של [[:$1|$1]] סומנה כבדוקה.',
	'revreview-quality' => 'זו הגרסה ה[[{{MediaWiki:Validationpage}}|איכותית]] האחרונה, ש[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>.
ב[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} טיוטה] יש [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|שינוי אחד|$3 שינויים}}] {{PLURAL:$3|הטעון אישור|הטעונים אישור}}.',
	'revreview-quality-i' => 'זוהי הגרסה ה[[{{MediaWiki:Validationpage}}|איכותית]] האחרונה, ש[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>.
ב[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} טיוטה] יש [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים בתבניות או בקבצים] הטעונים אישור.',
	'revreview-quality-old' => 'זוהי גרסה [[{{MediaWiki:Validationpage}}|איכותית]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} הצגת הכול]), ש[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>.
ייתכן שנעשו בה [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים חדשים].',
	'revreview-quality-same' => 'זוהי הגרסה ה[[{{MediaWiki:Validationpage}}|איכותית]] האחרונה ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} הצגת הכול]), ש[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} גרסה איכותית] של דף זה, ש[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>, מבוססת על גרסה זו.',
	'revreview-quality-title' => 'דף איכותי',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|דף שנצפה]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} צפייה בטיוטה]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|דף שנצפה]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} צפייה בטיוטה]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|דף שנצפה]]'''",
	'revreview-quick-invalid' => "'''מספר גרסה בלתי תקין'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|גרסה נוכחית]]''' (טרם נבדקה)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|דף איכותי]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} צפייה בטיוטה]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|דף איכותי]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} צפייה בטיוטה]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|דף איכותי]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|טיוטה]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} צפייה בדף]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} השוואה])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|טיוטה]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} צפייה בדף]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} השוואה])",
	'revreview-selected' => "הגרסה שנבחרה של '''$1''':",
	'revreview-source' => 'מקור טיוטה',
	'revreview-stable' => 'דף יציב',
	'revreview-stable-title' => 'דף שנצפה',
	'revreview-stable1' => 'ייתכן שתרצו לצפות ב[{{fullurl:$1|stableid=$2}} גרסה מסומנת זו] ולבדוק האם היא עכשיו [{{fullurl:$1|stable=1}} הגרסה היציבה] של דף זה.',
	'revreview-stable2' => 'ייתכן שתרצו לצפות ב[{{fullurl:$1|stable=1}} גרסה היציבה] של הדף הזה (אם עדיין קיימת גרסה כזו).',
	'revreview-style' => 'קריאות',
	'revreview-style-0' => 'לא אושר',
	'revreview-style-1' => 'סביר',
	'revreview-style-2' => 'טוב',
	'revreview-style-3' => 'קצר',
	'revreview-style-4' => 'מומלץ',
	'revreview-submit' => 'שליחה',
	'revreview-submitting' => 'נשלח...',
	'revreview-finished' => 'הבדיקה הושלמה!',
	'revreview-failed' => 'הבדיקה נכשלה!',
	'revreview-successful' => "'''הגרסה של [[:$1|$1]] סומנה בהצלחה. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} צפייה בגרסאות היציבות])'''",
	'revreview-successful2' => "'''סימון הגרסה [[:$1|$1]] הוסר בהצלחה.'''",
	'revreview-text' => "'''[[{{MediaWiki:Validationpage}}|גרסאות יציבות]] מוצגות כברירת מחדל לקוראים במקום הגרסה האחרונה.'''",
	'revreview-text2' => "'''[[{{MediaWiki:Validationpage}}|גרסאות יציבות]] הן גרסאות בדוקות של דפים וניתן לבחור שיוצגו כברירת מחדל לקוראים.'''",
	'revreview-toggle-title' => 'הצגת/הסתרת פרטים',
	'revreview-toolow' => 'עליכם לדרג כל אחת מהתכונות הבאות גבוה יותר מ"לא אושר" כדי שהגרסה תיחשב לגרסה שנבדקה.
כדי לסמן גרסה מסויימת כבעייתית, אנא הגדירו את כל השדות ל"לא אושר".',
	'revreview-update' => "אנא [[{{MediaWiki:Validationpage}}|בדקו]] את כל השינויים '''(המוצגים להלן)''' שנעשו מאז שהגרסה היציבה [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} נבדקה].<br />
'''מספר תבניות/קבצים עודכנו:'''",
	'revreview-update-includes' => "'''מספר תבניות/קבצים עודכנו:'''",
	'revreview-update-none' => "אנא [[{{MediaWiki:Validationpage}}|בדקו]] את כל השינויים '''(המוצגים להלן)''' שנעשו מאז שהגרסה היציבה [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} נבדקה].",
	'revreview-update-use' => "'''הערה:''' אם קיימת גרסה יציבה לאחת מהתבניות/הקבצים האלו, היא כבר נמצאת בשימוש בגרסה היציבה של דף זה.",
	'revreview-diffonly' => 'כדי לאשר את הדף, לחצו על הקישור "הגרסה הנוכחית" והשתמשו בטופס הבדיקה.',
	'revreview-visibility' => "'''לדף זה יש [[{{MediaWiki:Validationpage}}|גרסה יציבה]] מעודכנת; ניתן [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} לשנות] את הגדרות היציבות של הדף.'''",
	'revreview-visibility2' => "'''לדף זה יש [[{{MediaWiki:Validationpage}}|גרסה יציבה]] מיושנת; ניתן [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} לשנות] את הגדרות היציבות של הדף.'''",
	'revreview-visibility3' => "'''אין לדף זה [[{{MediaWiki:Validationpage}}|גרסה יציבה]]; ניתן [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} לשנות] את הגדרות היציבות של הדף.'''",
	'revreview-revnotfound' => 'הגרסה הישנה של דף זה לא נמצאה. אנא בדקו את כתובת הקישור שהוביל אתכם הנה.',
	'right-autoreview' => 'סימון אוטומטי של גרסאות כגרסאות שנצפו',
	'right-movestable' => 'העברת דפים יציבים',
	'right-review' => 'סימון גרסאות כגרסאות שנצפו',
	'right-stablesettings' => 'הגדרת הדרך בה הגרסה היציבה נבחרת ומוצגת',
	'right-validate' => 'סימון גרסאות כמאומתות',
	'rights-editor-autosum' => 'קודם אוטומטית',
	'rights-editor-revoke' => 'הסרת מעמד העורך מ[[$1]]',
	'specialpages-group-quality' => 'אבטחת איכות',
	'stable-logentry' => 'הגדיר גרסאות יציבות עבור [[$1]]',
	'stable-logentry2' => 'איפס את הגרסאות היציבות של [[$1]]',
	'stable-logpage' => 'יומן יציבות',
	'stable-logpagetext' => 'זהו יומן השינויים בתצורת [[{{MediaWiki:Validationpage}}|הגרסה היציבה]] בדפי תוכן.
ראו גם את [[Special:StablePages|רשימת הדפים היציבים]].',
	'revreview-filter-all' => 'הכול',
	'revreview-filter-stable' => 'יציב',
	'revreview-filter-approved' => 'מאושר',
	'revreview-filter-reapproved' => 'אושר מחדש',
	'revreview-filter-unapproved' => 'לא אושר',
	'revreview-filter-auto' => 'אוטומטי',
	'revreview-filter-manual' => 'ידנית',
	'revreview-statusfilter' => 'שינוי במצב:',
	'revreview-typefilter' => 'סוג:',
	'revreview-levelfilter' => 'רמה:',
	'revreview-lev-sighted' => 'נצפתה',
	'revreview-lev-quality' => 'איכותית',
	'revreview-lev-pristine' => 'מושלמת',
	'revreview-reviewlink' => 'בדיקה',
	'tooltip-ca-current' => 'צפייה בטיוטה הנוכחית של דף זה',
	'tooltip-ca-stable' => 'צפייה בגרסה היציבה של דף זה',
	'tooltip-ca-default' => 'הגדרות בקרת איכות',
	'revreview-locked-title' => 'עריכות בדף זה דורשות בדיקה לפני הצגתן.',
	'revreview-unlocked-title' => 'עריכות בדף זה אינן דורשות בדיקה לפני הצגתן.',
	'revreview-locked' => 'עריכות בדף זה דורשות [[{{MediaWiki:Validationpage}}|בדיקה]] לפני הצגתן.',
	'revreview-unlocked' => 'עריכות בדף זה אינן דורשות [[{{MediaWiki:Validationpage}}|בדיקה]] לפני הצגתן.',
	'log-show-hide-review' => '$1 יומן בדיקות',
	'revreview-tt-review' => 'בדיקת דף זה',
	'validationpage' => '{{ns:help}}:אישור דפים',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'editor' => 'सम्पादक',
	'flaggedrevs' => 'फ्लॅग किये हुए अवतरण',
	'flaggedrevs-backlog' => "अभी [[Special:OldReviewedPages|पुराने जाँचे हुए पन्नोंमे]] कुछ कार्य करना बाकी हैं। '''आप वहाँ ध्यान देना जरूरी हैं!'''",
	'flaggedrevs-desc' => 'संपादक और परीक्षकोंको पान्ने के अवतरण प्रमाणित करने की तथा पन्ने स्थिर करनेकी अनुमति देता हैं।',
	'flaggedrevs-pref-UI-0' => 'इंटरफेस में बढाया हुआ स्थिर अवतरणका इस्तेमाल करें',
	'flaggedrevs-pref-UI-1' => 'इंटरफेस में सीधे स्थिर अवतरणका इस्तेमाल करें',
	'flaggedrevs-prefs-stable' => 'हमेशा स्थिर अवतरण दर्शायें (अगर उपलब्ध हैं तो)',
	'flaggedrevs-prefs-watch' => 'मैंने जाँचे हुए पन्ने मेरी ध्यानसूची में डालें',
	'group-editor' => 'सम्पादक',
	'group-editor-member' => 'सम्पादक',
	'group-reviewer' => 'परीक्षक',
	'group-reviewer-member' => 'परीक्षक',
	'grouppage-editor' => '{{ns:project}}:सम्पादक',
	'grouppage-reviewer' => '{{ns:project}}:परीक्षक',
	'hist-draft' => 'ढाँचा अवतरण',
	'hist-quality' => 'गुणवत्तापूर्ण अवतरण',
	'hist-quality-user' => '[[User:$3|$3]] ने [{{fullurl:$1|stableid=$2}} जाँचा हुआ]',
	'hist-stable' => 'चुना हुआ अवतरण',
	'hist-stable-user' => '[[User:$3|$3]] ने [{{fullurl:$1|stableid=$2}} चुना हुआ]',
	'review-diff2stable' => 'स्थिर और सद्य अवतरण में फर्क देखें',
	'review-logentry-app' => '[[$1]] परखा गया',
	'review-logentry-dis' => '[[$1]] के एक अवतरण का गुणांकन कम किया',
	'review-logentry-id' => 'अवतरण क्र. $1',
	'review-logpage' => 'रिव्ह्यू लॉग',
	'review-logpagetext' => 'यह कंटेंट पन्नोंके अवतरणोंमें हुए बदलावोंके [[{{MediaWiki:Validationpage}}|परीक्षण]] की सूची हैं।
प्रमाणित पन्नोंके सूची के लिये [[Special:ReviewedPages|जाँचे हुए पन्नोंकी सूची]] देखें।',
	'reviewer' => 'परीक्षक',
	'revisionreview' => 'अवतरण परखें',
	'revreview-accuracy' => 'सत्यता',
	'revreview-accuracy-0' => 'अप्रमाणित',
	'revreview-accuracy-1' => 'चुनी हुई',
	'revreview-accuracy-2' => 'प्रमाणित',
	'revreview-accuracy-3' => 'अच्छे स्रोत',
	'revreview-accuracy-4' => 'विशेष',
	'revreview-approved' => 'प्रमाणित',
	'revreview-auto' => '(अपनेआप)',
	'revreview-auto-w' => "आप स्थिर अवतरण बदल रहें हैं; कोई भी बदलाव '''अपने आप''' परखें जायेंगे।",
	'revreview-auto-w-old' => "आप परिक्षण हुए अवतरण को बदल रहें हैं, सभी बदलावोंका '''अपने आप परिक्षण''' हो जायेगा।",
	'revreview-basic' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलाव है|बदलाव हैं}}] जिनकी जाँच बाकी हैं।',
	'revreview-basic-i' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साँचा/चित्र बदलाव] हैं जिनकी जाँच बाकी हैं।',
	'revreview-basic-old' => 'यह एक [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
इसमें नये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} बदलाव] होने की संभावना हैं।',
	'revreview-basic-same' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।',
	'revreview-basic-source' => 'इस पन्नेका एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} चुना हुआ अवतरण], जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हुआ हैं, इस अवतरण पर आधारित था।',
	'revreview-changed' => "'''[[:$1|$1]] के इस अवतरणपर आपने दी हुई क्रिया नहीं कर सकतें।'''

एक साँचा या चित्र किसीभी अवतरण का संदर्भ न दिये हुए पूछा गया हो सकता हैं।
अगर साँचेमें बाह्यचित्र है या आप द्वारा बदलाव शुरू होने पर साँचे में हुए बदलाव ऐसा दर्शा सकतें हैं।
कृपया रिफ्रेश कर फिरसे जाँचे।",
	'revreview-current' => 'कच्चा लेख',
	'revreview-depth' => 'गहराई',
	'revreview-depth-0' => 'अप्रमाणित',
	'revreview-depth-1' => 'प्राथमिक',
	'revreview-depth-2' => 'मध्यम',
	'revreview-depth-3' => 'उच्च',
	'revreview-depth-4' => 'विशेष',
	'revreview-draft-title' => 'लेख का ढाँचा',
	'revreview-edit' => 'कच्चा अवतरण संपादित करें',
	'revreview-flag' => 'यह अवतरण परखें',
	'revreview-edited' => "'''नये बदलाव एखाद पुराने सदस्यद्वारा जाँचे जाने पर [[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] में दर्शायें जायेंगे।
''कच्चा ढाँचा'' नीचे दिया हुआ हैं।''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|बदलाव की|बदलावोंकी}}] जाँच बाकी हैं।",
	'revreview-invalid' => "'''गलत लक्ष्य:''' कोईभी [[{{MediaWiki:Validationpage}}|परिक्षण]] हुआ अवतरण दिये हुए क्रमांक से मिलता नहीं।",
	'revreview-legend' => 'इस अवतरण के पाठ का गुणांकन करें',
	'revreview-log' => 'टिप्पणी:',
	'revreview-main' => 'परिक्षण के लिये एक अवतरण चुनना अनिवार्य हैं।

परिक्षण ना हुए अवतरणोंकी सूची के लिये [[Special:Unreviewedpages]] देखें।',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम चुना हुआ अवतरण] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलाव की|बदलावोंकी}}] जाँच बाकी हैं।',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम चुना हुआ अवतरण] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साँचा/चित्र बदलाव] की जाँच बाकी हैं।',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम गुणवत्तापूर्ण अवतरण] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलाव की|बदलावोंकी}}] जाँच बाकी हैं।',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम गुणवत्तापूर्ण अवतरण] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साँचा/चित्र बदलाव] की जाँच बाकी हैं।',
	'revreview-noflagged' => "इस पन्ने के जाँचे हुए अवतरण नहीं हैं, इसलिये यह पन्ना गुणवत्ता के लिये [[{{MediaWiki:Validationpage}}|जाँचा]] '''नहीं''' गया होने की संभावना हैं।",
	'revreview-note' => '[[User:$1|$1]] ने यह अवतरण [[{{MediaWiki:Validationpage}}|जाँचते समय]] निम्नलिखित सूचनायें दी हुई हैं:',
	'revreview-notes' => 'आपके प्रेक्षण दर्शाने के लिये:',
	'revreview-oldrating' => 'इसका गुणांकन:',
	'revreview-patrol' => 'यह बदलाव देख लेने का मार्क करें',
	'revreview-patrol-title' => 'जाँचने का मार्क करें',
	'revreview-patrolled' => '[[:$1|$1]] के चुने हुए अवतरणपर गश्त देने का मार्क किया हैं।',
	'revreview-quality' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलाव है|बदलाव हैं}}] जिनकी जाँच बाकी हैं।',
	'revreview-quality-i' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साँचा/चित्र बदलाव] हैं जिनकी जाँच बाकी हैं।',
	'revreview-quality-old' => 'यह एक [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
इसमें नये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} बदलाव] होने की संभावना हैं।',
	'revreview-quality-same' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।',
	'revreview-quality-source' => 'इस पन्नेका एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} गुणवत्तापूर्ण अवतरण], जो <i>$2</i> को [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हुआ हैं, इस अवतरण पर आधारित था।',
	'revreview-quality-title' => 'गुणवत्तापूर्ण लेख',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|चुना हुआ लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ड्राफ्ट देखें]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|चुना हुआ लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ड्राफ्ट देखें]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|चुना हुआ लेख]]'''",
	'revreview-quick-invalid' => "'''गलत अवतरण क्रमांक'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|सद्य अवतरण]]''' (परिक्षण हुआ नहीं)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ड्राफ्ट देखें]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ड्राफ्ट देखें]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]'''",
	'revreview-quick-see-basic' => "'''ड्राफ्ट''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} लेख देखें]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} फर्क जाँचें])",
	'revreview-quick-see-quality' => "'''ड्राफ्ट''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} लेख देखें]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} फर्क जाँचें])",
	'revreview-selected' => "'''$1:''' का चुना हुआ अवतरण",
	'revreview-source' => 'कच्चा स्रोत',
	'revreview-stable' => 'स्थिर पन्ना',
	'revreview-stable-title' => 'चुना हुआ लेख',
	'revreview-stable1' => 'आप शायद इस पन्नेका [{{fullurl:$1|stableid=$2}} यह मार्क किया हुआ अवतरण] अब [{{fullurl:$1|stable=1}} स्थिर अवतरण] बन चुका हैं या नहीं यह देखना चाहतें हैं।',
	'revreview-stable2' => 'आप इस पन्नेका [{{fullurl:$1|stable=1}} स्थिर अवतरण] देख सकतें हैं (अगर उपलब्ध है तो)।',
	'revreview-style' => 'वाचनीयता',
	'revreview-style-0' => 'अप्रमाणित',
	'revreview-style-1' => 'इस्तेमाल करने लायक',
	'revreview-style-2' => 'अच्छा',
	'revreview-style-3' => 'संक्षिप्त',
	'revreview-style-4' => 'विशेष',
	'revreview-submit' => 'रिव्ह्यू भेजें',
	'revreview-successful' => "[[:$1|$1]] के चुने हुए अवतरणको मार्क किया गया हैं।
([{{fullurl:{{#Special:Stableversions}}|page=$2}} सभी मार्क किये हुए अवतरण देखें])'''",
	'revreview-successful2' => "'''[[:$1|$1]] के चुने हुए अवतरण का मार्क हटाया।'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] नवीनतम अवतरणसे चुनने के बजाय मूल पाठ के हिसाब से चुना जाता हैं।''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] पन्नेके जाँचे हुए अवतरण होते हैं और देखनेवालोंके लिये अविचल पाठ दर्शाते हैं।''",
	'revreview-toggle-title' => 'ज्यादा ज़ानकारी दर्शायें/छुपायें',
	'revreview-toolow' => 'एक अवतरण को जाँचने का मार्क करने के लिये आपको नीचे लिखे हर पॅरॅमीटरको "अप्रमाणित" से उपरी दर्जा देना आवश्यक हैं।
एक अवतरणका गुणांकन कम करने के लिये, निम्नलिखित सभी कॉलममें "अप्रमाणित" चुनें।',
	'revreview-update' => "कृपया किये हुए बदलाव ''(नीचे दिये हुए)'' [[{{MediaWiki:Validationpage}}|जाँचे]] क्योंकी स्थिर अवतरण [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] कर दिया गया हैं।<br />
'''कुछ साँचा/चित्र बदले हैं:'''",
	'revreview-update-includes' => "'''कुछ साँचा/चित्र बदले हैं:'''",
	'revreview-update-none' => "कृपया किये हुए बदलाव ''(नीचे दिये हुए)'' [[{{MediaWiki:Validationpage}}|जाँचे]] क्योंकी स्थिर अवतरण [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] कर दिया गया हैं।",
	'revreview-update-use' => "'''सूचना:''' अगर इसमें से किसी साँचा/चित्रका स्थिर अवतरण हैं, तो वह इस पन्नेके स्थिर अवतरण में पहले से इस्तेमाल किया हुआ हैं।",
	'revreview-visibility' => "'''इस पन्नेको एक [[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] हैं, जो [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} बदला] जा सकता हैं।'''",
	'revreview-revnotfound' => 'आपसे पूछा गया इस लेख का पुराना अवतरण नहीं मिल पाया। कॄपया आपने इस्तेमाल किये URL की जाँच करें।',
	'right-autoreview' => 'अवतरण देखें ऐसे अपनेआप मार्क करें',
	'right-movestable' => 'स्थिर पन्नोंका स्थानांतरण करें',
	'right-review' => 'अवतरण देखें ऐसे मार्क करें',
	'right-stablesettings' => 'स्थिर अवतरण किस प्रकार चुना और दर्शाया जायेगा इसे निश्चित करें',
	'right-validate' => 'अवतरण वैध ऐसे मार्क करें',
	'rights-editor-autosum' => 'अपने आप तरक्की',
	'rights-editor-revoke' => '[[$1]] के संपादन अधिकार निकाले गये',
	'specialpages-group-quality' => 'गुणवत्ता नियंत्रण',
	'stable-logentry' => '[[$1]] का स्थिर अवतरणीकरण बदलें',
	'stable-logentry2' => '[[$1]] का स्थिर अवतरणीकरण पूर्ववत करें',
	'stable-logpage' => 'स्थिर आवृत्ती सूची',
	'stable-logpagetext' => 'यह कंटेंट पन्नोंके [[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] में हुए बदलावों की सूची हैं।
स्थिर पन्नोंकी सूची [[Special:StablePages|स्थिर पन्नोंकी सूची]] यहां देख सकतें हैं।',
	'tooltip-ca-current' => 'इस पन्ने का कच्चा अवतरण देखें',
	'tooltip-ca-stable' => 'इस पन्ने का स्थिर अवतरण देखें',
	'tooltip-ca-default' => 'गुणवत्ता आश्वासन सेटिंग',
	'validationpage' => '{{ns:help}}:लेख प्रमाणिकरण',
);

/** Fiji Hindi (Latin) (Fiji Hindi (Latin))
 * @author Girmitya
 */
$messages['hif-latn'] = array(
	'revreview-revnotfound' => 'Jon panna ke aap mangta rahaa, uske purana badlao nai mila.
Aap jon URL ke use kar ke ii panna ke acess karaa hai, uske check karo.',
);

/** Croatian (Hrvatski)
 * @author Dalibor Bosits
 * @author Dnik
 * @author SpeedyGonsales
 * @author Suradnik13
 */
$messages['hr'] = array(
	'editor' => 'Urednik',
	'flaggedrevs' => 'Označene promjene',
	'flaggedrevs-backlog' => "Trenutačno postoji zaostatak  u [[Special:OldReviewedPages|uređivanjima na čekanju]] ocjenjenih stranica. '''Molimo obratite pozornost!'''",
	'flaggedrevs-watched-pending' => "Trenutačno se nalaze [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} uređivanja na čekanju] ocjenjenih stranica na Vašem popisu praćenja. '''Molimo obratite pozornost!'''",
	'flaggedrevs-desc' => 'Daje uređivačima i ocjenjivačima mogućnost potvrđivanja inačica i stabiliziranja stranica',
	'flaggedrevs-pref-UI' => 'Stabilna inačica sučelja:',
	'flaggedrevs-pref-UI-0' => 'Rabite detaljnu stabilnu inačicu korisničkog sučelja',
	'flaggedrevs-pref-UI-1' => 'Rabite jednostavnu stabilnu inačicu korisničkog sučelja',
	'prefs-flaggedrevs' => 'Stabilnost',
	'flaggedrevs-prefs-stable' => 'Uvijek prikazuj kao zadano stabilnu inačicu stranica sa sadržajem (ako postoji)',
	'flaggedrevs-prefs-watch' => 'Dodaj stranice koje ocijenim na moj popis praćenja',
	'group-editor' => 'Urednici',
	'group-editor-member' => 'Urednik',
	'group-reviewer' => 'Ocjenjivači',
	'group-reviewer-member' => 'Ocjenjivač',
	'grouppage-editor' => '{{ns:project}}:Urednik',
	'grouppage-reviewer' => '{{ns:project}}:Ocjenjivač',
	'group-autoreview' => 'Samoocjenjivači',
	'group-autoreview-member' => 'samoocjenjivač',
	'grouppage-autoreview' => '{{ns:project}}:Samoocjenjivač',
	'hist-draft' => 'izmjena u radu',
	'hist-quality' => 'kvalitetna izmjena',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} potvrdio] [[User:$3|$3]]',
	'hist-stable' => 'pregledana',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} pregledao] [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatski pregledana]',
	'review-diff2stable' => 'Promjene između važeće i trenutačne inačice',
	'review-logentry-app' => 'ocijenjena r$2 od [[$1]]',
	'review-logentry-dis' => 'zastarjela r$2 od [[$1]]',
	'review-logentry-id' => 'prikaži',
	'review-logentry-diff' => 'razl do važeće',
	'review-logpage' => 'Evidencija ocjenjivanja',
	'review-logpagetext' => 'Ovo je evidencija promjena u statusu [[{{MediaWiki:Validationpage}}|odobrenja]] za inačicu za stranice sa sadržajem.
Pogledajte [[Special:ReviewedPages|popis ocjenjenih stranica]] za popis odobrenih stranica.',
	'reviewer' => 'Ocjenjivač',
	'revisionreview' => 'Ocijeni inačice',
	'revreview-accuracy' => 'Točnost',
	'revreview-accuracy-0' => 'Članak ne zadovoljava',
	'revreview-accuracy-1' => 'Članak zadovoljava',
	'revreview-accuracy-2' => 'Dobar',
	'revreview-accuracy-3' => 'Vrlo dobar (potkrijepljen izvorima)',
	'revreview-accuracy-4' => 'Izvrstan',
	'revreview-approved' => 'Odobreno',
	'revreview-auto' => '(automatski)',
	'revreview-auto-w' => "Uređujete stabilnu inačicu stranice; izmjene će biti '''automatski ocijenjene'''.",
	'revreview-auto-w-old' => "Uređujete ocijenjenu inačicu članka, promjene će bit '''automatski ocijenjene'''.",
	'revreview-basic' => 'Ovo je zadnja [[{{MediaWiki:Validationpage}}|pregledana]] promjena,
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Članak u radu]
možete [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} uređivati]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|promjena|promjene|promjena}}]
{{PLURAL:$3|čeka|čekaju|čeka}} ocjenjivanje.',
	'revreview-basic-i' => 'Ovo je posljednja [[{{MediaWiki:Validationpage}}|pregledana]] inačica, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Članak u radu] ima [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} izmjena predloška/datoteke] koji čekaju ocjenu.',
	'revreview-basic-old' => 'Ovo je [[{{MediaWiki:Validationpage}}|pregledana]] inačica ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} prikaži sve]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>.
Nove su [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} izmjene] napravljene.',
	'revreview-basic-same' => 'Ovo je najnovija [[{{MediaWiki:Validationpage}}|pregledana]] izmjena ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} prikaži sve]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Pregledana inačica] ove stranice, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>, bila je osnova ove izmjene.',
	'revreview-blocked' => 'Ne možete ocijeniti ovu inačicu jer Vaš račun trenutačno blokiran ([$1 detalji])',
	'revreview-changed' => "'''Traženu radnju nije moguće izvršiti na ovoj inačici stranice [[:$1|$1]].'''

Možda je tražen predložak ili datoteka bez navođenja određene inačice. 
To se može dogoditi ukoliko dinamički predložak transkludira datoteku ili predložak koji ovisi o varijabli koja se promijenila
nakon što ste počeli ocjenjivati članak. 
Osvježavanje stranice i ponovno ocijenjivanje može riješiti ovaj problem.",
	'revreview-current' => 'Članak u radu',
	'revreview-depth' => 'Dubina',
	'revreview-depth-0' => 'Ne zadovoljava',
	'revreview-depth-1' => 'Zadovoljava',
	'revreview-depth-2' => 'Dobar',
	'revreview-depth-3' => 'Vrlo dobar',
	'revreview-depth-4' => 'Izvrstan',
	'revreview-draft-title' => 'Članak u radu',
	'revreview-edit' => 'Uredi članak u radu',
	'revreview-editnotice' => "'''Izmjene ove stranice bit će uključena u [[{{MediaWiki:Validationpage}}|stabilnu inačicu]] kada ih ovlašteni suradnik ocijeni.'''",
	'revreview-flag' => 'Ocijeni izmjenu',
	'revreview-edited' => "'''Izmjene će biti uključene u [[{{MediaWiki:Validationpage}}|važeću inačicu]] kada je ovlašteni suradnik ocijeni.'''
'''''Članak u izradi'' je prikazan ispod.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|izmjena čeka|izmjene čekaju|izmjena čekaju}}] ocjenu.",
	'revreview-invalid' => "'''Nevaljani cilj:''' nema [[{{MediaWiki:Validationpage}}|ocijenjene]] izmjene koja odgovara danom ID-u.",
	'revreview-legend' => 'Ocijeni sadržaj inačice',
	'revreview-log' => 'Komentar:',
	'revreview-main' => 'Morate odabrati neku izmjenu stranice sa sadržajem za ocjenjivanje.

Pogledajte [[Special:Unreviewedpages|popis neocijenjenih stranica]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zadnji pregled promjena na članku]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} prikaži sve]) je [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} izvršen]
dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|promjena|promjene|promjena}}] {{PLURAL:$3|treba|trebaju|treba}} ocjenu.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posljednja pregledana izmjena] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} prikaži sve]) je [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Izmjene predloška/datoteke] potrebno je ocijeniti.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zadnje ocjenjivanje članka]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} prikaži sve]) je [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} izvršeno]
dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|promjena|promjene|promjena}}] {{PLURAL:$3|treba|trebaju|treba}} ocjenu.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posljednja ocijenjena izmjena] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} prikaži sve]) je [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Izmjene predloška/datoteke] potrebno je ocijeniti.',
	'revreview-noflagged' => "Nema ocijenjenih inačica stranice, stoga stranica najvjerojatnije '''nije''' [[{{MediaWiki:Validationpage}}|provjerena]].",
	'revreview-note' => '[[User:$1|$1]] je zabilježio slijedeće pri [[{{MediaWiki:Validationpage}}|ocjenjivanju]] ove inačice:',
	'revreview-notes' => 'Primjedbe ili napomene koje treba prikazati:',
	'revreview-oldrating' => 'Prethodna ocjena:',
	'revreview-patrol' => 'Označi ovu izmjenu pregledanom',
	'revreview-patrol-title' => 'Označi kao patrolirano',
	'revreview-patrolled' => 'Odabrana izmjena stranice [[:$1|$1]] je označena pregledanom (patroliranom).',
	'revreview-quality' => 'Ovo je zadnja [[{{MediaWiki:Validationpage}}|ocijenjena]] promjena,
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Članak u radu]
možete [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} uređivati]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|promjena|promjene|promjena}}]
{{PLURAL:$3|čeka|čekaju|čeka}} ocjenjivanje.',
	'revreview-quality-i' => 'Ovo je posljednja [[{{MediaWiki:Validationpage}}|ocijenjena]] inačica, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Članak u izradu] ima [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} izmjene predloška/datoteke] koje čekaju ocjenu.',
	'revreview-quality-old' => 'Ovo je [[{{MediaWiki:Validationpage}}|ocjenjena]] izmjena ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} prikaži sve]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>.
Nove [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} izmjene] su možda napravljene.',
	'revreview-quality-same' => 'Ovo je posljednja [[{{MediaWiki:Validationpage}}|ocijenjena]] izmjena ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} prikaži sve]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Ocijenjena inačica] ove stranice, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena] <i>$2</i>, bila je osnova one izmjene.',
	'revreview-quality-title' => 'Kvalitetna stranica',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pregled]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vidi članak u izradi]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Pregled]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vidi članak u izradi]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pregled]]'''",
	'revreview-quick-invalid' => "'''Nevažeći ID izmjene'''",
	'revreview-quick-none' => "'''Važeća inačica''' (nema ocijenjenih inačica)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Ocjena]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vidi članak u izradi]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Ocjena]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vidi članak u izradi]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Ocjena]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Članak u izradi]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vidi stranicu]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} usporedi])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Članak u izradi]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vidi stranicu]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} usporedi])",
	'revreview-selected' => "Odabrane promjene '''$1:'''",
	'revreview-source' => 'izvor članka u radu',
	'revreview-stable' => 'Stabilna stranica',
	'revreview-stable-title' => 'Pregledana stranica',
	'revreview-stable1' => 'Želite pregledati [{{fullurl:$1|stableid=$2}} ovu označenu inačicu] i vidjeti da li je ovo [{{fullurl:$1|stable=1}} važeća inačica] ove stranice.',
	'revreview-stable2' => 'Želite pregledati [{{fullurl:$1|stable=1}} važeću inačicu] ove stranice (ako postoji).',
	'revreview-style' => 'Čitljivost',
	'revreview-style-0' => 'Neodobren',
	'revreview-style-1' => 'Prihvatljiv',
	'revreview-style-2' => 'Dobar',
	'revreview-style-3' => 'Vrlo dobar',
	'revreview-style-4' => 'Izvrstan',
	'revreview-submit' => 'Podnesi',
	'revreview-submitting' => 'Šaljem ...',
	'revreview-finished' => 'Ocjenjivanje dovršeno!',
	'revreview-failed' => 'Ocjenjivanje nije uspjelo!',
	'revreview-successful' => "'''Inačica od [[:$1|$1]] uspješno je označena. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} vidi važeće inačice])'''",
	'revreview-successful2' => "'''Inačica od [[:$1|$1]] uspješno je označena.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabilne inačice]] stranice prikazuje se svima umjesto najnovije inačice.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Važeće inačice]] su provjerene inačice stranice i mogu biti postavljene kao zadani sadržaj za čitače stranice.''",
	'revreview-toggle-title' => 'prikaži/sakrij detalje',
	'revreview-toolow' => 'Morate ocijeniti po svakom od donjih kriterija ocjenom višom od "Ne zadovoljava"
da bi promjena bila pregledana/ocijenjena. U suprotnom, ostavite sve na "Ne zadovoljava".',
	'revreview-update' => "Molimo [[{{MediaWiki:Validationpage}}|ocijenite]] sve promjene ''(prikazane dolje)'' učinjene nakon što je važeća inačica [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena].<br />
'''Neki predlošci/datoteke su promijenjeni:'''",
	'revreview-update-includes' => "'''Neki predlošci/datoteke su ažurirane:'''",
	'revreview-update-none' => "Molim, [[{{MediaWiki:Validationpage}}|pregledajte]] sve promjene ''(prikazane dolje)'' učinjene od kad je stabilna inačica [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} odobrena].",
	'revreview-update-use' => "'''NAPOMENA:''' Ako bilo koji od ovih predložaka/datoteka imaju važeću inačicu, tada se već rabe u važećoj inačici ove stranice.",
	'revreview-diffonly' => "''Za ocjenu stranice, kliknite poveznicu \"trenutačna inačica\" i rabite obrazac za ocjenu.''",
	'revreview-visibility' => "'''Ova stranica ima ažuriranu [[{{MediaWiki:Validationpage}}|važeću inačicu]]; postavke stalnosti stranice mogu biti
[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} podešene].'''",
	'revreview-visibility2' => "'''Ova stranica ima zastarjelu [[{{MediaWiki:Validationpage}}|važeću inačicu]]; postavke stalnosti stranice mogu biti
[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} podešene].'''",
	'revreview-visibility3' => "'''Ova stranica nema [[{{MediaWiki:Validationpage}}|važeću inačicu]]; postavke stalnosti stranice mogu biti
[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} podešene].'''",
	'revreview-revnotfound' => 'Ne mogu pronaći staru izmjenu stranice koju ste zatražili.
Molimo provjerite URL koji vas je doveo ovamo.',
	'right-autoreview' => 'Automatski označavaj izmjene kao pregledane',
	'right-movestable' => 'Premjesti važeće stranice',
	'right-review' => 'Označi izmjenu kao pregledanu',
	'right-stablesettings' => 'Podešavanje kao će se važeća inačica označavati i prikazivati',
	'right-validate' => 'Označavanje inačica provjerenima',
	'rights-editor-autosum' => 'samopromoviran',
	'rights-editor-revoke' => 'oduzet status urednika suradniku [[$1]]',
	'specialpages-group-quality' => 'Osiguravanje kvalitete',
	'stable-logentry' => 'postavljena važeća inačica stranice [[$1]]',
	'stable-logentry2' => 'poništi važeću inačicu članka [[$1]]',
	'stable-logpage' => 'Evidencija stabilnih verzija',
	'stable-logpagetext' => 'Ovo je evidencija o promjena postavki [[{{MediaWiki:Validationpage}}|važećih inačica]] stranica sa sadržajem. Popis važećih stranica može se vidjeti na [[Special:StablePages|popisu važećih stranica]].',
	'revreview-filter-all' => 'sve',
	'revreview-filter-stable' => 'stabilno',
	'revreview-filter-approved' => 'Odobreno',
	'revreview-filter-reapproved' => 'Ponovno odobreno',
	'revreview-filter-unapproved' => 'Neodobreno',
	'revreview-filter-auto' => 'Automatski',
	'revreview-filter-manual' => 'Ručno',
	'revreview-statusfilter' => 'Promjena statusa:',
	'revreview-typefilter' => 'Tip:',
	'revreview-levelfilter' => 'Razina:',
	'revreview-lev-sighted' => 'pregledano',
	'revreview-lev-quality' => 'kvalitetno',
	'revreview-lev-pristine' => 'zastarjelo',
	'revreview-reviewlink' => 'ocijeni',
	'tooltip-ca-current' => 'Vidi trenutnu inačicu u radu ove stranice',
	'tooltip-ca-stable' => 'Vidi važeću inačicu stranice',
	'tooltip-ca-default' => 'Postavke osiguranja kvalitete',
	'revreview-locked-title' => 'Izmjene moraju biti ocjenjene prije nego će se prikazati na ovoj stranici.',
	'revreview-unlocked-title' => 'Izmjene ne zahtijevaju ocjenjivanje prije nego će se prikazati na ovoj stranici.',
	'revreview-locked' => 'Izmjene moraju biti [[{{MediaWiki:Validationpage}}|ocjenjene]] prije nego će se prikazati na ovoj stranici.',
	'revreview-unlocked' => 'Izmjene ne zahtijevaju [[{{MediaWiki:Validationpage}}|ocjenjivanje]] prije nego će se prikazati na ovoj stranici.',
	'log-show-hide-review' => '$1 evidenciju ocjenjivanja',
	'revreview-tt-review' => 'Ocijeni ovu stranicu',
	'validationpage' => '{{ns:help}}:Ocjenjivanje članaka',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Dundak
 * @author Michawiki
 */
$messages['hsb'] = array(
	'editor' => 'wobdźěłowar',
	'flaggedrevs' => 'Woznamjenjene wersije',
	'flaggedrevs-backlog' => "Je tuchwilu zawostank [[Special:OldReviewedPages|njesčinjenych změnow]] za přepruwowane strony. '''Twoja kedźbliwosć je trěbna!'''",
	'flaggedrevs-watched-pending' => "Su tuchwilu [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} njesčinjene změny] přepruwowanych stronow na twojej wobkedźbowankach. '''Twoja kedźbliwosć je trěbna!'''",
	'flaggedrevs-desc' => 'Dawa wobdźěłowarjam/pruwowarjam móžnosć wersije pohódnoćić a strony stabilizować',
	'flaggedrevs-pref-UI' => 'Interfejs stabilneje wersije:',
	'flaggedrevs-pref-UI-0' => 'Nadrobny wužiwarski interfejs stabilnych wersijow wužiwać',
	'flaggedrevs-pref-UI-1' => 'Jednory wužiwarski interfejs stabilnych wersijow wužiwać',
	'prefs-flaggedrevs' => 'Stabilnosć',
	'flaggedrevs-prefs-stable' => 'Stabilnu wersiju nastawkow přeco jako standard pokazać (jeli tajka eksistuje)',
	'flaggedrevs-prefs-watch' => 'Přehladane strony wobkedźbować',
	'flaggedrevs-prefs-editdiffs' => 'Při wobdźěłowanju stronow rozdźěl k stabilnej wersiji pokazać',
	'group-editor' => 'wobdźěłowarjo',
	'group-editor-member' => 'wobdźěłowar',
	'group-reviewer' => 'Přehladowarjo',
	'group-reviewer-member' => 'přehladowar',
	'grouppage-editor' => '{{ns:project}}:Wobdźěłowar',
	'grouppage-reviewer' => '{{ns:project}}:Přehladowar',
	'group-autoreview' => 'Awotmatiscy kontrolerojo',
	'group-autoreview-member' => 'awtomatiski kontroler',
	'grouppage-autoreview' => '{{ns:project}}:Awtomatiski kontroler',
	'hist-draft' => 'naćiskowa wersija',
	'hist-quality' => 'pruwowana wersija',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} přepruwowany] wot [[User:$3|$3]]',
	'hist-stable' => 'wuhladana wersija',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} přehladany] wot [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatisce přehladany]',
	'review-diff2stable' => 'Rozdźěle mjez stabilnej a aktualnej wersiju wobhladać',
	'review-logentry-app' => 'je wersiju r$2 strony [[$1]] přepruwował',
	'review-logentry-dis' => 'je wersiju r$2 strony $1 wothódnoćił',
	'review-logentry-id' => 'wobhladać sej',
	'review-logentry-diff' => 'Rozdźěl k stabilnej wersiji',
	'review-logpage' => 'Protokol přepruwowanjow',
	'review-logpagetext' => 'To je protokol změnow statusa  [[{{MediaWiki:Validationpage}}|schwalenja]] wersijow za nastawki.
Hlej [[Special:ReviewedPages|lisćinu přepruwowanych stronow]] za lisćinu schwalenych stronow.',
	'reviewer' => 'přehladowar',
	'revisionreview' => 'Wersije přepruwować',
	'revreview-accuracy' => 'Dokładnosć',
	'revreview-accuracy-0' => 'njespušćomna',
	'revreview-accuracy-1' => 'přehladana',
	'revreview-accuracy-2' => 'pruwowana',
	'revreview-accuracy-3' => 'Dobre žórła podate',
	'revreview-accuracy-4' => 'wuběrna',
	'revreview-approved' => 'Schwaleny',
	'revreview-auto' => '(awtomatisce)',
	'revreview-auto-w' => "Wobdźěłuješ runje stabilnu wersiju, změny so '''awtomatisce pruwuja.'''",
	'revreview-auto-w-old' => "Wobdźěłuješ přepruwowanu wersiju; změny budu so '''awtomatisce pruwować'''.",
	'revreview-basic' => 'To je poslednja [[{{MediaWiki:Validationpage}}|wuhladana]] wersija,
	[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} dopušćena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tuchwilna wersija]
	móže so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}]
	{{PLURAL:$3|dyrbi|dyrbi|dyrbjadyrbjetej}} so hišće pruwować.',
	'revreview-basic-i' => 'To je aktualna [[{{MediaWiki:Validationpage}}|přehladana]] wersija, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Naćisk] wobsahuje [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny předłohow/wobrazow], kotrež na kontrolu čakaja.',
	'revreview-basic-old' => 'To je [[{{MediaWiki:Validationpage}}|přehladana]] wersija ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšě nalistować]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>.
Je móžno, zo su so nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny] přewjedli.',
	'revreview-basic-same' => 'To je aktualna [[{{MediaWiki:Validationpage}}|přehladana]] wersija, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena] <i>$2</i>. Strona da so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać].',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Přehladana wersija] tuteje strony, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>, na tutej wersiji bazuje.',
	'revreview-blocked' => 'Njemóžeš tutu wersiju přepruwować, dokelž twoje konto je tuchwilu zablokowane ([$1 podrobnosće])',
	'revreview-changed' => "'''Požadana akcija njeda so na tutu wersiju wot [[:$1|$1]] nałožować.''' 

Předłoha abo dataja bu bjez podaća wersije požadana/požadany. To móže so stać, jeli dynamiska předłoha dalšu dataju abo předłohu zapřijmje, kotrejž stej wot wariable wotwisnej, kotraž je so wot spočatka pruwowanja strony změniła. Znowazačitanje strony a nowe pruwowanje móže tón problem rozrisać.",
	'revreview-current' => 'Naćisk',
	'revreview-depth' => 'Hłubokosć',
	'revreview-depth-0' => 'njespušćomna',
	'revreview-depth-1' => 'jednora',
	'revreview-depth-2' => 'srěnja',
	'revreview-depth-3' => 'wysoka',
	'revreview-depth-4' => 'wuběrna',
	'revreview-draft-title' => 'Naćiskowa strona',
	'revreview-edit' => 'Naćisk wobdźěłać',
	'revreview-editnotice' => "'''Změny na tutej stronje přewozmu so do [[{{MediaWiki:Validationpage}}|stabilneje wersije]], tak ruče kaž awtorizowany wužiwar je kontroluje.'''",
	'revreview-flag' => 'Tutu wersiju přepruwować',
	'revreview-edited' => "'''Změny přewozmu so do [[{{MediaWiki:Validationpage}}|stabilneje wersije]], tak ruče kaž awtorizowany wužiwar je kontroluje.'''
'''''Naćisk'' so deleka pokazuje.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|změna čaka|změnje čakatej|změny čakaja|změnow čaka}}] na kontrolu.",
	'revreview-invalid' => "'''Njepłaćiwy cil:''' žana [[{{MediaWiki:Validationpage}}|skontrolowana]] wersija podatemu ID njewotpowěduje.",
	'revreview-legend' => 'Wobsah wersije pohódnoćić',
	'revreview-log' => 'Protokolowy zapisk:',
	'revreview-main' => 'Dyrbiš wěstu wersiju nastawka za přepruwowanje wubrać.

Hlej [[Special:Unreviewedpages|za lisćinu njepřepruwowanych stronow]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslednja wuhladana wersija]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hlej wšě]) bu dnja <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} dopušćena].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}] {{PLURAL:$3|dyrbi|dyrbi|dyrbja|dyrbjetej}} so pruwować.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Aktualna přehladana wersija] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšě nalistować]) bu dnja <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny na předłohach/datajach] dyrbja so přepruwować.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslednja pruwowana wersija]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hlej wšě]) bu <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} dopušćena].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}] {{PLURAL:$3|dyrbi|dyrbi|dyrbja|dyrbjetej}} so hišće pruwować.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Aktualna kwalitna wersija] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšě nalistować]) bu dnja <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny na předłohach/datajach] dyrbja so přepruwować.',
	'revreview-noflagged' => 'Njeje přehladowanych wersijow tuteje strony, tak zo njejsu wuprajenja k [[{{MediaWiki:Validationpage}}|spušćomnosći nastawka]] móžne.',
	'revreview-note' => '[[User:$1|$1]] činješe slědowace [[{{MediaWiki:Validationpage}}|pruwowanske noticy]] k tutej wersiji:',
	'revreview-notes' => 'Wobkedźbowanja abo přispomnjenki, kotrež maja so pokazać:',
	'revreview-oldrating' => 'Zastopnjowanje:',
	'revreview-patrol' => 'Tutu změnu jako dohladowanu markěrować',
	'revreview-patrol-title' => 'Jako dohladowany markěrować',
	'revreview-patrolled' => 'Wubrana wersija bu wot [[:$1|$1]] bu jako dohladowana marěkrowana.',
	'revreview-quality' => 'To je najnowša [[{{MediaWiki:Validationpage}}|kwalitna wersija]],
	[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} dopušćena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Naćisk] ma
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změnu|změnje|změny|změnow}}], {{PLURAL:$3|kotraž|kotrejž|kotrež|kotrež}} na přepruwowanje {{PLURAL:$3|čaka|čakatej|čakaja|čakaja}}.',
	'revreview-quality-i' => 'To je aktualna [[{{MediaWiki:Validationpage}}|kwalitna]] wersija, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Naćisk] wobsahuje [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny na předłohach/datajach], kotrež na přepruwowanje čakaja.',
	'revreview-quality-old' => 'To je [[{{MediaWiki:Validationpage}}|kwalitna]] wersija ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wšě nalistować]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>.
Je móžno, zo su so hižo nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny] přewjedli.',
	'revreview-quality-same' => 'To je aktualna [[{{MediaWiki:Validationpage}}|kajkostna]] wersija,
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena] <i>$2</i>. Strona da so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać].',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Kwalitna wersija] tuteje strony, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>, na tutej wersiji bazuje.',
	'revreview-quality-title' => 'Kwalitna strona',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Přehladowana strona]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hlej naćisk]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Přehladana strona]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} naćisk wobhladać]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Přehladana strona]]'''",
	'revreview-quick-invalid' => "'''Njepłaćiwy wersijowy ID'''",
	'revreview-quick-none' => "'''Aktualnje'''. Žane přehladowane wersije.",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kwalitna strona]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hlej naćisk]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kwalitna strona]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} naćisk wobhladać]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kwalitna strona]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Naćisk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} hlej stronu]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} přirunaj])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Naćisk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} hlej stronu]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} přirunaj])",
	'revreview-selected' => "Wubrana wersija z '''$1:'''",
	'revreview-source' => 'Žórło naćiska',
	'revreview-stable' => 'Stabilna strona',
	'revreview-stable-title' => 'Přehladana strona',
	'revreview-stable1' => 'Snano chceš sej [{{fullurl:$1|stableid=$2}} tutu woznamjenjenu wersiju] wobhladać a widźeć, jeli je wona nětko [{{fullurl:$1|stable=1}} stabilna wersija] tuteje strony.',
	'revreview-stable2' => 'Snano chceš sej [{{fullurl:$1|stable=1}} stabilnu wersiju] tuteje strony wobhladać (jeli tajka eksistuje).',
	'revreview-style' => 'Čitajomnosć',
	'revreview-style-0' => 'njespušćomna',
	'revreview-style-1' => 'akceptabelna',
	'revreview-style-2' => 'dobra',
	'revreview-style-3' => 'precizna',
	'revreview-style-4' => 'wuběrna',
	'revreview-submit' => 'Wotpósłać',
	'revreview-submitting' => 'Sćele so...',
	'revreview-finished' => 'Dopruwowany!',
	'revreview-failed' => 'Přepruwowanje je so njeporadźiło!',
	'revreview-successful' => "'''Wersija [[:$1|$1]] je so wuspěšnje woznamjeniła. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} stabilne wersije wobhladać])'''",
	'revreview-successful2' => "'''Woznamjenjenje wersije [[:$1|$1]] je so wuspěšnje wotstroniło.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabilne wersije]] su skerje standardny wobsah strony za wobhladowarjow hač najnowša wersija.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabilne wersije]] su skontrolowane wersije stronow a dadźa so jako standardny wobsah za wobhladowarjow nastajić.''",
	'revreview-toggle-title' => 'Podrobnosće pokazać/schować',
	'revreview-toolow' => 'Dyrbiš za kóždy z deleka naspomnjenych atributow hódnotu wyše hač „{{int:revreview-accuracy-0}}“ zapodać,
	zo by so wersija jako přehladana woznamjeniła. Zo by wersiju zaćisnył, dyrbja wšě atributy „{{int:revreview-accuracy-0}}“ być.',
	'revreview-update' => "Prošu [[{{MediaWiki:Validationpage}}|přepruwuj]] změny ''(hlej deleka)'', kotrež buchu činjene, wot toho zo stabilna wersija bu [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena].
'''Někotre předłohi/dataje buchu zaktualizowane:'''",
	'revreview-update-includes' => "'''Někotre předłohi/dataje su so zaktualizowali:'''",
	'revreview-update-none' => "Prošu [[{{MediaWiki:Validationpage}}|přepruwuj]] změny ''(hlej deleka)'', kotrež buchu činjene, wot toho zo stabilna wersija bu [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schwalena].",
	'revreview-update-use' => "'''KEDŹBU:''' Jeli někajka z tutych předłohow/datajow ma stabilnu wersiju, da so stabilna wersija tuteje strony hižo wužiwa.",
	'revreview-diffonly' => "''Zo by tutu stronu přehladał, klikń na wotkaz \"Aktualna wersija\" a wužij přehladowanski formular.''",
	'revreview-visibility' => "'''Tuta strona ma zaktualizowanu [[{{MediaWiki:Validationpage}}|stabilnu wersiju]]; nastajenja za stabilnosć strony dadźa so [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigurować].'''",
	'revreview-visibility2' => "'''Tuta strona ma zestarjenu [[{{MediaWiki:Validationpage}}|stabilnu wersiju]]; nastajenja wo stabilnosći strony dadźa so [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigurować].'''",
	'revreview-visibility3' => "'''Tuta strona nima [[{{MediaWiki:Validationpage}}|stabilnu wersiju]]; nastajenja stabilnosće strony dadźa so [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigurować].'''",
	'revreview-revnotfound' => 'Stara wersija strony, kotruž sy žadał, njeda so namakać. Prošu pruwuj URL, kiž sy wužiwał.',
	'right-autoreview' => 'Wersije awtomatisce jako přehladane markěrować',
	'right-movestable' => 'Stabilne strony přesunyć',
	'right-review' => 'Wersije jako přehladane markěrować',
	'right-stablesettings' => 'Wuběranje a zwobraznjenje stabilneje wersije konfigurować',
	'right-validate' => 'Wersije jako pohódnoćene markěrować',
	'rights-editor-autosum' => 'awtomatisce powyšeny',
	'rights-editor-revoke' => 'status wobdźěłowarja bu [[$1]] zebrany.',
	'specialpages-group-quality' => 'Kwalitne zawěsćenje',
	'stable-logentry' => 'konfigurowaše woznamjenjenje stabilneje wersije za [[$1]]',
	'stable-logentry2' => 'woznamjenjenje stabilneje wersije za [[$1]] anulować',
	'stable-logpage' => 'Protokol stabilneje wersije',
	'stable-logpagetext' => 'To je protokol změnow konfiguracije [[{{MediaWiki:Validationpage}}|stabilneje wersije]] nastawkow.
Lisćinu stabilizowanych stronow namakaš w [[Special:StablePages|lisćinje stabilnych stronow]].',
	'revreview-filter-all' => 'Wšě',
	'revreview-filter-stable' => 'stabilny',
	'revreview-filter-approved' => 'Schwaleny',
	'revreview-filter-reapproved' => 'Znowa schwaleny',
	'revreview-filter-unapproved' => 'Njeschwaleny',
	'revreview-filter-auto' => 'Awtomatiski',
	'revreview-filter-manual' => 'Manuelny',
	'revreview-statusfilter' => 'Změnjenje statusa:',
	'revreview-typefilter' => 'Typ:',
	'revreview-levelfilter' => 'Runina:',
	'revreview-lev-sighted' => 'přehladana',
	'revreview-lev-quality' => 'kwalitna',
	'revreview-lev-pristine' => 'prěnjotna',
	'revreview-reviewlink' => 'kontrolować',
	'tooltip-ca-current' => 'Aktualny naćisk tuteje strony wobhladać',
	'tooltip-ca-stable' => 'Stabilnu wersiju tuteje strony wobhladać',
	'tooltip-ca-default' => 'Nastajenja kwalitneho zawěsćenja',
	'revreview-locked-title' => 'Změny dyrbja so kontrolować, prjedy hač na tutej stronje zwobraznjeja!',
	'revreview-unlocked-title' => 'Změny njetrjebaja přepruwowanje, doniž na tutej stronje njezwobraznjeja.',
	'revreview-locked' => 'Změny dyrbja so kontrolować, prjedy hač na tutej stronje zwobraznjeja!',
	'revreview-unlocked' => 'Změny kontrolu njetrjebaja, prjedy hač na tutej stronje zwobraznjeja!',
	'log-show-hide-review' => 'Protokol kontrolow $1',
	'revreview-tt-review' => 'Tutu stronu kontrolować',
	'validationpage' => '{{ns:help}}:Přehladanje strony',
);

/** Hungarian (Magyar)
 * @author Adam78
 * @author Bdamokos
 * @author Bennó
 * @author Dani
 * @author Dorgan
 * @author Glanthor Reviol
 * @author Gondnok
 * @author KossuthRad
 * @author Samat
 * @author Tgr
 */
$messages['hu'] = array(
	'editor' => 'járőr',
	'flaggedrevs' => 'Jelölt lapváltozatok',
	'flaggedrevs-backlog' => "'''Figyelem!''' A [[Special:OldReviewedPages|régen ellenőrzött lapok listájában]] várakozó lapok vannak.",
	'flaggedrevs-watched-pending' => "Elavult ellenőrzött lapok vannak a figyelőlistádon. [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} '''Segíts az átnézésükben!''']",
	'flaggedrevs-desc' => 'Lehetővé teszi a szerkesztők/ellenőrök számára, hogy ellenőrizzék és elfogadják lapok adott változatait',
	'flaggedrevs-pref-UI' => 'A jelölt lapváltozatok felülete:',
	'flaggedrevs-pref-UI-0' => 'Részletes felhasználói felület használata',
	'flaggedrevs-pref-UI-1' => 'Egyszerű felhasználói felület használata',
	'prefs-flaggedrevs' => 'Jelölt lapváltozatok',
	'flaggedrevs-prefs-stable' => 'A jelölt lapváltozat mutatása alapértelmezettként, ha létezik ilyen.',
	'flaggedrevs-prefs-watch' => 'Az általam megjelölt lapok hozzáadása a figyelőlistámhoz',
	'group-editor' => 'járőrök',
	'group-editor-member' => 'járőr',
	'group-reviewer' => 'lektorok',
	'group-reviewer-member' => 'lektor',
	'grouppage-editor' => '{{ns:project}}:Járőrök',
	'grouppage-reviewer' => '{{ns:project}}:Lektorok',
	'hist-draft' => 'nem jelölt lapváltozat',
	'hist-quality' => 'kiemelt változat',
	'hist-quality-user' => '[[User:$3|$3]] [{{fullurl:$1|stableid=$2}} kiemeltnek jelölte]',
	'hist-stable' => 'megtekintett változat',
	'hist-stable-user' => '[[User:$3|$3]] [{{fullurl:$1|stableid=$2}} megtekintettnek jelölte]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatikusan megtekintve]',
	'review-diff2stable' => 'A rögzített és a legutóbbi változat közötti eltérések megtekintése',
	'review-logentry-app' => 'ellenőrizte a(z) [[$1]] lap r$2 változatát',
	'review-logentry-dis' => 'eltávolította a(z) [[$1]] lap r$2 változatának értékelését',
	'review-logentry-id' => 'megnéz',
	'review-logentry-diff' => 'változás a jelölthöz képest',
	'review-logpage' => 'Ellenőrzési napló',
	'review-logpagetext' => 'Ez az oldal a lapok változatainak [[{{MediaWiki:Validationpage}}|jelölési]] állapotában történt változásainak naplója.
Az elfogadott lapok listáját az [[Special:ReviewedPages|ellenőrzött lapok listájában]] találod meg.',
	'reviewer' => 'lektor',
	'revisionreview' => 'Változatok ellenőrzése',
	'revreview-accuracy' => 'Pontosság',
	'revreview-accuracy-0' => 'ellenőrizetlen',
	'revreview-accuracy-1' => 'megtekintett',
	'revreview-accuracy-2' => 'pontos',
	'revreview-accuracy-3' => 'forrásokkal megfelelően alátámasztott',
	'revreview-accuracy-4' => 'kiemelt',
	'revreview-approved' => 'Elfogadva',
	'revreview-auto' => '(automatikus)',
	'revreview-auto-w' => "Jelenleg a lap rögzített változatát szerkeszted. Az általad végzett szerkesztések '''automatikusan ellenőrzöttek lesznek'''.",
	'revreview-auto-w-old' => "Jelenleg a lap egyik ellenőrzött változatát szerkeszted. Az általad végzett szerkesztések '''automatikusan ellenőrzöttek lesznek'''.",
	'revreview-basic' => 'Ez a legutolsó [[{{MediaWiki:Validationpage}}|megtekintett]] változat,
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadva]: <i>$2</i> A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nem ellenőrzött változat] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 változtatása] vár megtekintésre.',
	'revreview-basic-i' => 'Ez a legutolsó [[{{MediaWiki:Validationpage}}|megtekintett]] változat, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadva]: <i>$2</i> A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nem ellenőrzött változaton] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} sablon- vagy képváltoztatások] várnak ellenőrzésre.',
	'revreview-basic-old' => 'Ez egy [[{{MediaWiki:Validationpage}}|megtekintett]] változat ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} teljes lista]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ellenőrizve] <i>$2</i>-kor.
Lehetnek új [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} változtatások].',
	'revreview-basic-same' => 'Ez a legutolsó [[{{MediaWiki:Validationpage}}|megtekintett]] változat ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} összes]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadva]: <i>$2</i>',
	'revreview-basic-source' => 'A lap [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} megtekintett változata] ([{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadás] dátuma <i>$2</i>) ezen a verzión alapul.',
	'revreview-changed' => "'''A kért művelet nem hajtható végre a(z) [[:$1|$1]] ezen változatán.'''

Egy sablon vagy kép lehetett kérve, miközben nem lett megadva adott változat. Ez akkor történhet meg, ha 
egy dinamikus sablon más képet vagy sablont illeszt be egy paramétertől függően, ami megváltozott a lap ellenőrzésének kezdete óta. Az oldal frissítése és az ellenőrzés újbóli elvégzése megoldhatja a problémát.",
	'revreview-current' => 'Nem ellenőrzött',
	'revreview-depth' => 'Részletesség',
	'revreview-depth-0' => 'ellenőrizetlen',
	'revreview-depth-1' => 'alacsony',
	'revreview-depth-2' => 'közepes',
	'revreview-depth-3' => 'nagy',
	'revreview-depth-4' => 'kiemelt',
	'revreview-draft-title' => 'Vázlat',
	'revreview-edit' => 'Vázlat szerkesztése',
	'revreview-editnotice' => "'''Megjegyzés: a szerkesztéseid a lap következő [[{{MediaWiki:Validationpage}}|rögzített változatában]] fognak megjelenni, amint egy [[{{MediaWiki:Validationpage}}|járőr]] ellenőrizte őket.'''",
	'revreview-flag' => 'Változat ellenőrzése',
	'revreview-edited' => "'''A szerkesztéseid akkor jelennek meg a [[{{MediaWiki:Validationpage}}|rögzített változatban]], ha egy szerkesztő ellenőrizte.'''
'''A ''nem ellenőrzött változat'' lent látható.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 változtatás] vár megtekintésre.",
	'revreview-invalid' => "'''Érvénytelen cél:''' a megadott azonosító nem egy [[{{MediaWiki:Validationpage}}|ellenőrzött]] változat.",
	'revreview-legend' => 'A változat tartalmának értékelése',
	'revreview-log' => 'Megjegyzés:',
	'revreview-main' => 'Ki kell választanod egy oldal adott változatát az ellenőrzéshez.

Lásd az [[Special:Unreviewedpages|ellenőrizetlen lapok listáját]].',
	'revreview-newest-basic' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi megtekintett változat]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} összes]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} megjelölve]
ekkor: <i>$2</i> ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 változást] kell ellenőrizni).',
	'revreview-newest-basic-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi megtekintett változat] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} összes]); [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} megjelölve]: <i>$2</i>
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Sablonok vagy képek változtatásait] kell ellenőrizni.',
	'revreview-newest-quality' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi kiemelt változat]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} összes]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} megjelölve]: <i>$2</i> [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 változást] kell ellenőrizni.',
	'revreview-newest-quality-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi kiemelt változat] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} összes]); [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} megjelölve]: <i>$2</i>
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Sablon- vagy képváltoztatások] várnak ellenőrzésre.',
	'revreview-noflagged' => 'A lapnak nincs jelölt változata, [[{{MediaWiki:Validationpage}}|ellenőrizetlen]].',
	'revreview-note' => '[[User:$1]] az alábbi megjegyzéseket fűzte ezen változat [[{{MediaWiki:Validationpage}}|ellenőrzése]] mellé:',
	'revreview-notes' => 'Megjelenítendő megfigyelések vagy megjegyzések:',
	'revreview-oldrating' => 'Osztályozása:',
	'revreview-patrol' => 'Változtatás ellenőrzöttnek jelölése',
	'revreview-patrol-title' => 'Változtatás ellenőrzöttnek jelölése',
	'revreview-patrolled' => '[[:$1|$1]] kiválasztott változata ellenőrzöttnek lett jelölve.',
	'revreview-quality' => 'Ez a legutolsó [[{{MediaWiki:Validationpage}}|kiemelt]] változat,
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i> A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vázlaton] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|egy|$3}}
változtatást] kell ellenőrizni.',
	'revreview-quality-i' => 'Ez a legutolsó [[{{MediaWiki:Validationpage}}|kiemelt]] változat,
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i>
A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nem ellenőrzött változaton] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} sablon- és képmódosítások] várnak ellenőrzésre.',
	'revreview-quality-old' => 'Ez az utolsó [[{{MediaWiki:Validationpage}}|kiemelt]] változat ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} összes]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i>
Új [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} változtatások] történhettek.',
	'revreview-quality-same' => 'Ez az utolsó [[{{MediaWiki:Validationpage}}|kiemelt]] változat ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} összes]); [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i>',
	'revreview-quality-source' => 'A lap [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kiemelt változata] ([{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadás] dátuma <i>$2</i>) ezen a verzión alapul.',
	'revreview-quality-title' => 'Kiemelt szócikk',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Megtekintett]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} utolsó változat megjelenítése]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Megtekintett lap]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nem ellenőrzött változat megjelenítése]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Megtekintett lap]]'''",
	'revreview-quick-invalid' => "'''A változat azonosítója érvénytelen'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Legutóbbi változat]]''' (ellenőrizetlen)",
	'revreview-quick-quality' => "[[{{MediaWiki:Validationpage}}|Kiemelt szócikk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nem ellenőrzött változat megtekintése]]",
	'revreview-quick-quality-old' => "[[{{MediaWiki:Validationpage}}|Kiemelt szócikk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nem ellenőrzött változat megtekintése]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kiemelt szócikk]]'''",
	'revreview-quick-see-basic' => "'''Vázlat''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} elfogadott változat]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} változások])",
	'revreview-quick-see-quality' => "'''Vázlat''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} elfogadott változat]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} változások])",
	'revreview-selected' => "A(z) '''$1''' jelenleg kiválasztott változata:",
	'revreview-source' => 'Vázlat forrása',
	'revreview-stable' => 'Rögzített változat',
	'revreview-stable-title' => 'Megtekintett lap',
	'revreview-stable1' => 'Megnézheted [{{fullurl:$1|stableid=$2}} ezt a jelölt változatot], vagy a lap [{{fullurl:$1|stable=1}} elfogadott változatát].',
	'revreview-stable2' => 'Megnézheted a lap [{{fullurl:$1|stable=1}} elfogadott változatát] (ha még van ilyen).',
	'revreview-style' => 'Olvashatóság',
	'revreview-style-0' => 'ellenőrizetlen',
	'revreview-style-1' => 'elfogadható',
	'revreview-style-2' => 'jó',
	'revreview-style-3' => 'tömör',
	'revreview-style-4' => 'kiemelt',
	'revreview-submit' => 'Értékelés elküldése',
	'revreview-submitting' => 'Küldés...',
	'revreview-finished' => 'Az értékelés elkészült.',
	'revreview-successful' => "'''A(z) [[:$1|$1]] változatát sikeresen megjelölted! ([{{fullurl:{{#Special:Stableversions}}|page=$2}} megjelölt változatok megtekintése])'''",
	'revreview-successful2' => "'''[[:$1|$1]] változtatásról sikeresen eltávolítottad a jelölést.'''",
	'revreview-text' => 'Az alapértelmezett beállítások szerint a rögzített változatok jelennek meg az újak helyett.',
	'revreview-toggle-title' => 'részletek mutatása/elrejtése',
	'revreview-toolow' => "Ahhoz, hogy egy változatot ellenőrzöttnek jelölhess, mindenhol meg kell adnod valamilyen értékelést.
Ha törölni szeretnéd az értékelést, akkor állíts mindent ''ellenőrizetlen''re.",
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Ellenőrizd]] az alábbi változtatásokat, melyek az [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadott] változat óta készültek!

'''Néhány sablon vagy kép frissítve lett:'''",
	'revreview-update-includes' => "'''Néhány sablon vagy kép megváltozott:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Ellenőrizz]] minden változtatást ''(lenn láthatóak)'', ami az [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} elfogadott] változat óta történt.",
	'revreview-update-use' => "'''MEGJEGYZÉS:''' Ha a képek vagy a sablonok közül bármelyiknek van ellenőrzött változata, akkor már az volt használva a lap stabil változatán is.",
	'revreview-diffonly' => "''A lapváltozat értékeléséhez kattints a jelenlegi lapváltozat linkre, és használd az értékelő mezőt.''",
	'revreview-visibility' => 'Az oldal aktuális változata [[{{MediaWiki:Validationpage}}|elfogadott]]; az elfogadott változat paramétereit [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} itt állíthatod be].',
	'revreview-visibility2' => 'Az oldal aktuális változata nem [[{{MediaWiki:Validationpage}}|elfogadott]]; az elfogadott változat paramétereit [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} itt állíthatod be].',
	'revreview-revnotfound' => 'A lap általad kért régi változatát nem találom. Kérlek, ellenőrizd az URL-t, amivel erre a lapra jutottál.',
	'right-autoreview' => 'változatok automatikusan megtekintettként jelölése',
	'right-movestable' => 'stabil lapok átnevezése',
	'right-review' => 'Megtekintettként jelölve',
	'right-stablesettings' => 'a stabil változatok kiválasztásának és megjelenítésének beállítása',
	'right-validate' => 'változatok megjelölése',
	'rights-editor-autosum' => 'automatikusan megadva',
	'rights-editor-revoke' => '[[$1]] szerkesztői jogai meg lettek vonva',
	'specialpages-group-quality' => 'Minőségellenőrzés',
	'stable-logentry' => 'beállította [[$1]] elfogadott változatait',
	'stable-logentry2' => 'törölte [[$1]] stabil változataival kapcsolatos beállításokat',
	'stable-logpage' => 'Jelölt változatok naplója',
	'stable-logpagetext' => 'Ez a lap a lapok [[{{MediaWiki:Validationpage}}|elfogadott változataiban]] történt változások
naplója.',
	'revreview-filter-all' => 'mind',
	'revreview-filter-approved' => 'ellenőrzött',
	'revreview-filter-reapproved' => 'újraellenőrzött',
	'revreview-filter-unapproved' => 'ellenőrizetlen',
	'revreview-filter-auto' => 'automatikus',
	'revreview-filter-manual' => 'kézi',
	'revreview-statusfilter' => 'Állapot:',
	'revreview-typefilter' => 'Típus:',
	'revreview-reviewlink' => 'ellenőriz',
	'tooltip-ca-current' => 'Az oldal jelenlegi vázlatának megtekintése',
	'tooltip-ca-stable' => 'Az oldal elfogadott változatának megtekintése',
	'tooltip-ca-default' => 'Minőségbiztosítási beállítások',
	'revreview-locked-title' => 'A szerkesztéseket ellenőrizni kell, mielőtt megjelenhetnének ezen a lapon!',
	'revreview-unlocked-title' => 'A szerkesztéseket nem kell ellenőrizni, mielőtt megjelenhetnének ezen a lapon!',
	'revreview-locked' => 'A szerkesztéseket ellenőrizni kell, mielőtt megjelenhetnének ezen a lapon!',
	'revreview-unlocked' => 'A szerkesztéseket nem kell ellenőrizni, mielőtt megjelenhetnének ezen a lapon!',
	'log-show-hide-review' => 'ellenőrzési napló $1',
	'revreview-tt-review' => 'Lap ellenőrzése',
	'validationpage' => '{{ns:help}}:Lap ellenőrzése',
);

/** Armenian (Հայերեն)
 * @author Teak
 */
$messages['hy'] = array(
	'revreview-revnotfound' => 'Էջի որոնված հին տարբերակը չի գտնվել։ Խնդրում ենք ստուգել այն հղումը, որով անցել եք այս էջին։',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'editor' => 'Redactor',
	'flaggedrevs' => 'Marcaversiones',
	'flaggedrevs-backlog' => "Al momento il ha un accumulation de [[Special:OldReviewedPages|modificationes attendente]] a paginas revidite. '''Isto require tu attention!'''",
	'flaggedrevs-watched-pending' => "Al momento il ha [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} modificationes attendente] a paginas revidite in tu observatorio. '''Isto require tu attention!'''",
	'flaggedrevs-desc' => 'Da al redactores e revisores le capacitate de validar versiones e stabilisar paginas',
	'flaggedrevs-pref-UI' => 'Interfacie de versiones stabile:',
	'flaggedrevs-pref-UI-0' => 'Usar le version detaliate del interfacie de versiones stabile',
	'flaggedrevs-pref-UI-1' => 'Usar le version simple del interfacie de versiones stabile',
	'prefs-flaggedrevs' => 'Stabilitate',
	'flaggedrevs-prefs-stable' => 'Per predefinition, monstrar sempre le version stabile (si existe) del paginas de contento',
	'flaggedrevs-prefs-watch' => 'Adder le paginas que io revide a mi observatorio',
	'group-editor' => 'Redactores',
	'group-editor-member' => 'redactor',
	'group-reviewer' => 'Revisores',
	'group-reviewer-member' => 'revisor',
	'grouppage-editor' => '{{ns:project}}:Redactor',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'group-autoreview' => 'Autorevisores',
	'group-autoreview-member' => 'autorevisor',
	'grouppage-autoreview' => '{{ns:project}}:Autorevisor',
	'hist-draft' => 'version provisori',
	'hist-quality' => 'version de qualitate',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validate] per [[User:$3|$3]]',
	'hist-stable' => 'version mirate',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} mirate] per [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automaticamente mirate]',
	'review-diff2stable' => 'Vider modificationes inter le versiones stabile e actual',
	'review-logentry-app' => 'revideva v$2 de [[$1]]',
	'review-logentry-dis' => 'depreciava v$2 de [[$1]]',
	'review-logentry-id' => 'vider',
	'review-logentry-diff' => 'diff con version stabile',
	'review-logpage' => 'Registro de revisiones',
	'review-logpagetext' => 'Isto es un registro de modificationes al stato de [[{{MediaWiki:Validationpage}}|approbation]] de versiones pro paginas de contento.
Vide le [[Special:ReviewedPages|lista de paginas revidite]] pro un lista de paginas approbate.',
	'reviewer' => 'Revisor',
	'revisionreview' => 'Revider versiones',
	'revreview-accuracy' => 'Accuratessa',
	'revreview-accuracy-0' => 'Non approbate',
	'revreview-accuracy-1' => 'Mirate',
	'revreview-accuracy-2' => 'Accurate',
	'revreview-accuracy-3' => 'Ben referentiate',
	'revreview-accuracy-4' => 'Eminente',
	'revreview-approved' => 'Approbate',
	'revreview-auto' => '(automatic)',
	'revreview-auto-w' => "Tu modifica le version stabile; omne modificationes essera '''automaticamente revidite'''.",
	'revreview-auto-w-old' => "Tu modifica un version revidite; omne modificationes essera '''automaticamente revidite'''.",
	'revreview-basic' => 'Isto es le ultime version [[{{MediaWiki:Validationpage}}|mirate]],
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version provisori] ha
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modification|modificationes}}]
attendente revision.',
	'revreview-basic-i' => 'Isto es le ultime version [[{{MediaWiki:Validationpage}}|mirate]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version provisori] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificationes in patronos o files] attendente revision.',
	'revreview-basic-old' => 'Isto es un version [[{{MediaWiki:Validationpage}}|mirate]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar totes]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
Es possibile que nove [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificationes] ha essite facite.',
	'revreview-basic-same' => 'Isto es le ultime version [[{{MediaWiki:Validationpage}}|mirate]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar totes]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.',
	'revreview-basic-source' => 'Un [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version mirate] de iste pagina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>, ha essite basate super iste version.',
	'revreview-blocked' => 'Tu non pote revider iste version proque tu conto es actualmente blocate ([$1 detalios])',
	'revreview-changed' => "'''Le action requestate non poteva esser executate super iste version de [[:$1|$1]].'''

Es possibile que un patrono o file ha essite requestate sin specification de un version specific.
Isto pote occurrer si un patrono dynamic transclude un altere file o patrono dependente de un variabile que cambiava post que tu comenciava a revider iste pagina.
Es possibile que le problema essera solvite si tu refresca le pagina e reface le revision.",
	'revreview-current' => 'Version provisori',
	'revreview-depth' => 'Profunditate',
	'revreview-depth-0' => 'Non approbate',
	'revreview-depth-1' => 'Basic',
	'revreview-depth-2' => 'Moderate',
	'revreview-depth-3' => 'Alte',
	'revreview-depth-4' => 'Eminente',
	'revreview-draft-title' => 'Pagina provisori',
	'revreview-edit' => 'Modificar version provisori',
	'revreview-editnotice' => "'''Nota: Le modificationes a iste pagina essera incorporate in le [[{{MediaWiki:Validationpage}}|version stabile]] quando un usator autorisate los ha revidite.'''",
	'revreview-flag' => 'Revider iste version',
	'revreview-edited' => "'''Le modificationes essera incorporate in le [[{{MediaWiki:Validationpage}}|version stabile]] quando un usator autorisate los ha revidite.'''
'''Le ''version provisori'' se monstra infra.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|modification|modificationes}}] attende revision.",
	'revreview-invalid' => "'''Destination invalide:''' nulle version [[{{MediaWiki:Validationpage}}|revidite]] corresponde al ID specificate.",
	'revreview-legend' => 'Evalutar le contento del version',
	'revreview-log' => 'Commento:',
	'revreview-main' => 'Tu debe seliger un version particular de un pagina de contento pro poter revider lo.

Vide le [[Special:Unreviewedpages|lista de paginas non revidite]].',
	'revreview-newest-basic' => 'Le [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plus recente version mirate] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar totes]) ha essite [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modification|modificationes}}] require revision.',
	'revreview-newest-basic-i' => 'Le [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plus recente version mirate] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar totes]) ha essite [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Modificationes in patronos o files] require revision.',
	'revreview-newest-quality' => 'Le [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultime version de qualitate] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar totes]) ha essite [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modification|modificationes}}] necessita revision.',
	'revreview-newest-quality-i' => 'Le [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultime version de qualitate] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar totes]) esseva [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Le modificationes al patronos o files] require revision.',
	'revreview-noflagged' => "Il non ha versiones revidite de iste pagina, dunque su qualitate pote esser
'''non''' [[{{MediaWiki:Validationpage}}|verificate]].",
	'revreview-note' => '[[User:$1|$1]] faceva le sequente notas [[{{MediaWiki:Validationpage}}|revidente]] iste version:',
	'revreview-notes' => 'Observationes o notas a presentar:',
	'revreview-oldrating' => 'Su evalutation:',
	'revreview-patrol' => 'Marcar iste modification como patruliate',
	'revreview-patrol-title' => 'Marcar como patruliate',
	'revreview-patrolled' => 'Le version seligite de [[:$1|$1]] ha essite marcate como patruliate.',
	'revreview-quality' => 'Iste es le ultime version de [[{{MediaWiki:Validationpage}}|qualitate]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version provisori] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modification|modificationes}}] attendente revision.',
	'revreview-quality-i' => 'Iste es le ultime version de [[{{MediaWiki:Validationpage}}|qualitate]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version provisori] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificationes de patronos o files] attendente revision.',
	'revreview-quality-old' => 'Iste es un version de [[{{MediaWiki:Validationpage}}|qualitate]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar totes]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
Nove [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificationes] pote haber essite facite.',
	'revreview-quality-same' => 'Iste es le ultime version de [[{{MediaWiki:Validationpage}}|qualitate]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar totes]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.',
	'revreview-quality-source' => 'Un [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualitate] de iste pagina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>, ha essite basate super iste version.',
	'revreview-quality-title' => 'Pagina de qualitate',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pagina mirate]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vider version provisori]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Pagina mirate]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vider version provisori]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina mirate]]'''",
	'revreview-quick-invalid' => "'''ID de version invalide'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Version actual]]''' (non revidite)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitate]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vider version provisori]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitate]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vider version provisori]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitate]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Version provisori]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vider pagina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Version provisori]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vider pagina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-selected' => "Version seligite de '''$1:'''",
	'revreview-source' => 'codice-fonte del version provisori',
	'revreview-stable' => 'Pagina stabile',
	'revreview-stable-title' => 'Pagina mirate',
	'revreview-stable1' => 'Es suggerite vider [{{fullurl:$1|stableid=$2}} iste version marcate] pro determinar si illo es ora le [{{fullurl:$1|stable=1}} version stabile] de iste pagina.',
	'revreview-stable2' => 'Tu pote vider le [{{fullurl:$1|stable=1}} version stabile] de iste pagina (si existe ancora).',
	'revreview-style' => 'Legibilitate',
	'revreview-style-0' => 'Non approbate',
	'revreview-style-1' => 'Acceptabile',
	'revreview-style-2' => 'Bon',
	'revreview-style-3' => 'Concise',
	'revreview-style-4' => 'Eminente',
	'revreview-submit' => 'Submitter',
	'revreview-submitting' => 'Invio in curso…',
	'revreview-finished' => 'Revision complete!',
	'revreview-failed' => 'Revision falleva!',
	'revreview-successful' => "'''Le version de [[:$1|$1]] ha essite marcate con successo. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} vider versiones stabile])'''",
	'revreview-successful2' => "'''Le version de [[:$1|$1]] ha essite dismarcate con successo.'''",
	'revreview-text' => "Le ''[[{{MediaWiki:Validationpage}}|versiones stabile]] es le contento predefinite pro le lectores in loco del version le plus nove.",
	'revreview-text2' => "''Le [[{{MediaWiki:Validationpage}}|versiones stabile]] es le versiones verificate del paginas e pote esser assignate como le contento predefinite pro le lectores.''",
	'revreview-toggle-title' => 'revelar/celar detalios',
	'revreview-toolow' => 'Tu debe al minus valorisar cata un del attributos in basso como plus alte que "non approbate" a fin que un version sia considerate como revidite.
Pro depreciar un version, mitte tote le campos a "non approbate".',
	'revreview-update' => "Per favor [[{{MediaWiki:Validationpage}}|revide]] omne modificationes ''(monstrate in basso)'' facite post le [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbation] del version stabile.<br />
'''Alcun patronos/files ha essite actualisate:'''",
	'revreview-update-includes' => "'''Alcun patronos/files ha essite actualisate:'''",
	'revreview-update-none' => "Per favor [[{{MediaWiki:Validationpage}}|revide]] omne modificationes ''(monstrate in basso)'' facite post le [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approbation] del version stabile.",
	'revreview-update-use' => "'''NOTA:''' Si alcun de iste patronos/files ha un version stabile, alora illo es ja usate in le version stabile de iste pagina.",
	'revreview-diffonly' => "''Pro revider le pagina, clicca le ligamine \"version actual\" e usa le formulario de revision.''",
	'revreview-visibility' => "'''Iste pagina ha un [[{{MediaWiki:Validationpage}}|version stabile]] actualisate; le parametros del stabilitate de paginas pote esser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-visibility2' => "'''Iste pagina ha un [[{{MediaWiki:Validationpage}}|version stabile]] obsolete; le parametros del stabilitate de paginas pote esser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-visibility3' => "'''Iste pagina non ha un [[{{MediaWiki:Validationpage}}|version stabile]]; le parametros del stabilitate de paginas pote esser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-revnotfound' => 'Impossibile trovar le version anterior del pagina que tu ha demandate.
Verifica le adresse URL que tu ha usate pro acceder a iste pagina.',
	'right-autoreview' => 'Automaticamente marcar versiones como mirate',
	'right-movestable' => 'Renominar paginas stabile',
	'right-review' => 'Marcar versiones como mirate',
	'right-stablesettings' => 'Configurar como le version stabile es seligite e monstrate',
	'right-validate' => 'Marcar versiones como validate',
	'rights-editor-autosum' => 'autopromovite',
	'rights-editor-revoke' => 'removeva le stato de redactor ab [[$1]]',
	'specialpages-group-quality' => 'Assecurantia de qualitate',
	'stable-logentry' => 'configurava le parametros de versiones stabile pro [[$1]]',
	'stable-logentry2' => 'reinitialisava le parametros de versiones stabile pro [[$1]]',
	'stable-logpage' => 'Registro de stabilitate',
	'stable-logpagetext' => 'Isto es un registro de modificationes in le configuration de [[{{MediaWiki:Validationpage}}|versiones stabile]] del paginas de contento.
Le paginas stabilisate se detalia in le [[Special:StablePages|lista de paginas stabile]].',
	'revreview-filter-all' => 'totes',
	'revreview-filter-stable' => 'stabile',
	'revreview-filter-approved' => 'Approbate',
	'revreview-filter-reapproved' => 'Reapprobate',
	'revreview-filter-unapproved' => 'Non approbate',
	'revreview-filter-auto' => 'Automatic',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => 'Alteration de stato:',
	'revreview-typefilter' => 'Typo:',
	'revreview-levelfilter' => 'Nivello:',
	'revreview-lev-sighted' => 'mirate',
	'revreview-lev-quality' => 'qualitate',
	'revreview-lev-pristine' => 'pristine',
	'revreview-reviewlink' => 'revider',
	'tooltip-ca-current' => 'Vider le version provisori actual de iste pagina',
	'tooltip-ca-stable' => 'Vider le version stabile de iste pagina',
	'tooltip-ca-default' => 'Configurationes pro assecurantia de qualitate',
	'revreview-locked-title' => 'Le modificationes debe esser revidite ante de esser monstrate in iste pagina.',
	'revreview-unlocked-title' => 'Le modificationes non require revision ante de esser monstrate in iste pagina.',
	'revreview-locked' => 'Le modificationes debe esser [[{{MediaWiki:Validationpage}}|revidite]] ante de esser monstrate in iste pagina.',
	'revreview-unlocked' => 'Le modificationes non require [[{{MediaWiki:Validationpage}}|revision]] ante de esser monstrate in iste pagina.',
	'log-show-hide-review' => '$1 le registro de revisiones',
	'revreview-tt-review' => 'Revider iste pagina',
	'validationpage' => '{{ns:help}}:Validation de paginas',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author Irwangatot
 * @author Rex
 */
$messages['id'] = array(
	'editor' => 'Penyunting',
	'flaggedrevs' => 'Revisi bertanda',
	'flaggedrevs-backlog' => "Terdapat log balik [[Special:OldReviewedPages|suntingan yang menunggu]] pada halaman-halaman tertinjau. '''Perhatian Anda dibutuhkan!'''",
	'flaggedrevs-watched-pending' => "Saat ini ada halaman [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} suntingan tertunda] untuk ditinjau dalam daftar pantauan Anda. '''Memerlukan perhatian anda!'''",
	'flaggedrevs-desc' => 'Memberikan fasilitas bagi Editor atau Peninjau untuk memvalidasi versi-versi artikel dan menandai sebagai stabil',
	'flaggedrevs-pref-UI' => 'Antarmuka versi stabil:',
	'flaggedrevs-pref-UI-0' => 'Gunakan antarmuka pengguna detail untuk versi stabil',
	'flaggedrevs-pref-UI-1' => 'Gunakan antarmuka pengguna sederhana untuk versi stabil',
	'prefs-flaggedrevs' => 'Stabilitas',
	'flaggedrevs-prefs-stable' => 'Selalu tampilkan halaman versi stabil sebagai tampilan baku (jika ada)',
	'flaggedrevs-prefs-watch' => 'Tambahkan halaman yang saya tinjau ke daftar pantauan',
	'flaggedrevs-prefs-editdiffs' => 'Lihat perbedaan pada stabil ketika menyunting halaman',
	'group-editor' => 'Editor',
	'group-editor-member' => 'penyunting',
	'group-reviewer' => 'Peninjau',
	'group-reviewer-member' => 'peninjau',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Peninjau',
	'group-autoreview' => 'Autopeninjau',
	'group-autoreview-member' => 'autopeninjau',
	'grouppage-autoreview' => '{{ns:project}}:Autotinjau',
	'hist-draft' => 'draf',
	'hist-quality' => 'revisi layak',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} divalidasi] oleh [[User:$3|$3]]',
	'hist-stable' => 'revisi terperiksa',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} diperiksa] oleh [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} otomatis terperiksa]',
	'review-diff2stable' => 'Lihat perubahan antara revisi stabil dan terkini',
	'review-logentry-app' => 'versi tertinjau r$2 dari [[$1]]',
	'review-logentry-dis' => 'revisi lama r$2 dari [[$1]]',
	'review-logentry-id' => 'lihat',
	'review-logentry-diff' => 'perbedaan dengan revisi stabil',
	'review-logpage' => 'Log tinjauan revisi',
	'review-logpagetext' => 'Ini adalah log perubahan status [[{{MediaWiki:Validationpage}}|persetujuan]] revisi untuk halaman isi.
Lihat [[Special:ReviewedPages|daftar halaman yang telah ditinjau]] untuk daftar halaman yang disetujui.',
	'reviewer' => 'Peninjau',
	'revisionreview' => 'Tinjau revisi',
	'revreview-accuracy' => 'Akurasi',
	'revreview-accuracy-0' => 'Tak disetujui',
	'revreview-accuracy-1' => 'Terperiksa',
	'revreview-accuracy-2' => 'Akurat',
	'revreview-accuracy-3' => 'Data sumber bagus',
	'revreview-accuracy-4' => 'Terpilih',
	'revreview-approved' => 'Disetujui',
	'revreview-auto' => '(otomatis)',
	'revreview-auto-w' => "Anda menyunting revisi stabil, semua perubahan akan '''secara otomatis ditandai sebagai tertinjau'''.",
	'revreview-auto-w-old' => "Anda menyunting revisi lama, semua perubahan akan '''secara otomatis ditandai sebagai tertinjau'''.",
	'revreview-basic' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|perubahan|perubahan}}] yang memerlukan tinjauan.',
	'revreview-basic-i' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/berkas] yang memerlukan tinjauan.',
	'revreview-basic-old' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
Mungkin telah ada [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan-perubahan] yang lebih baru pada draf.',
	'revreview-basic-same' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.',
	'revreview-basic-source' => 'Terdapat [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versi terperiksa] untuk halaman ini, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>, yang berdasarkan pada revisi ini.',
	'revreview-blocked' => 'Anda tidak dapat meninjau revisi ini karena akun anda sedang di blokir ([$1 selengkapnya])',
	'revreview-changed' => "'''Tindakan yang diminta tidak dapat dilakukan terhadap revisi [[:$1|$1]].'''

Sebuah templat atau berkas mungkin telah diminta tanpa menyebutkan suatu versi spesifik.
Hal ini dapat terjadi jika suatu templat dinamis mengikutkan suatu berkas atau templat lain yang bergantung pada suatu variabel yang telah berubah sejak Anda mulai meninjau halaman ini.
Pemuatan dan peninjauan ulang halaman dapat memecahkan masalah ini.",
	'revreview-current' => 'Draf',
	'revreview-depth' => 'Kedalaman',
	'revreview-depth-0' => 'Tak disetujui',
	'revreview-depth-1' => 'Dasar',
	'revreview-depth-2' => 'Moderat',
	'revreview-depth-3' => 'Tinggi',
	'revreview-depth-4' => 'Terpilih',
	'revreview-draft-title' => 'Halaman draf',
	'revreview-edit' => 'Sunting draf',
	'revreview-editnotice' => "'''Catatan: Suntingan di halaman ini akan dimasukkan ke dalam [[{{MediaWiki:Validationpage}}|versi stabil]] segera setelah diperiksa oleh pengguna pemeriksa.'''",
	'revreview-flag' => 'Tinjau revisi ini',
	'revreview-edited' => "'''Suntingan akan digabungkan sebagai [[{{MediaWiki:Validationpage}}|versi stabil]] setelah ditinjau oleh pengguna yang ditetapkan.
''Draf'' ditampilkan di bawah ini.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|perubahan|perubahan}}] memerlukan tinjauan.",
	'revreview-invalid' => "'''Tujuan tidak ditemukan:''' tidak ada revisi [[{{MediaWiki:Validationpage}}|tertinjau]] yang cocok dengan nomor revisi yang diminta.",
	'revreview-legend' => 'Beri peringkat untuk isi revisi',
	'revreview-log' => 'Komentar:',
	'revreview-main' => 'Anda harus memilih suatu revisi tertentu dari halaman isi untuk ditinjau.

Lihat [[Special:Unreviewedpages]] untuk daftar halaman yang belum ditinjau.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi terakhir yang terperiksa] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tampilkan semua]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|perubahan|perubahan}}] {{PLURAL:$3|butuh|butuh}} tinjauan.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi terperiksa yang terakhir] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tampilkan semua]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Templat/berkas berubah] memerlukan tinjauan.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi layak yang terakhir] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tampilkan semua]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|perubahan|perubahan}}] {{PLURAL:$3|butuh|butuh}} tinjauan.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi layak yang terakhir] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Templat/berkas berubah] memerlukan tinjauan.',
	'revreview-noflagged' => "Tak ada revisi tertinjau dari halaman ini, jadi halaman ini mungkin '''belum''' [[{{MediaWiki:Validationpage}}|diperiksa]] kelayakannya.",
	'revreview-note' => '[[User:$1]] memberikan catatan berikut sewaktu [[{{MediaWiki:Validationpage}}|meninjau]] revisi ini:',
	'revreview-notes' => 'Pengamatan atau catatan untuk ditampilkan:',
	'revreview-oldrating' => 'Memiliki rating:',
	'revreview-patrol' => 'Tandai perubahan ini terpatroli',
	'revreview-patrol-title' => 'Ditandai sebagai terpatroli',
	'revreview-patrolled' => 'Revisi terpilih dari [[:$1|$1]] telah ditandai terpatroli.',
	'revreview-quality' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|perubahan|perubahan}}] yang memerlukan tinjauan.',
	'revreview-quality-i' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} templat/berkas berubah] yang memerlukan tinjauan.',
	'revreview-quality-old' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
Mungkin telah ada [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan-perubahan] yang lebih baru pada draf.',
	'revreview-quality-same' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Revisi layak] dari halaman ini, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>, didasarkan pada revisi ini.',
	'revreview-quality-title' => 'Halaman layak',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Terperiksa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Terperiksa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Terperiksa]]'''",
	'revreview-quick-invalid' => "'''Nomor ID revisi tidak sah'''",
	'revreview-quick-none' => "'''Terkini''' (belum ditinjau)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Halaman kualitas]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Halaman kualitas]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Halaman layak]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Draf]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat halaman]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} bandingkan])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Draf]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat halaman]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} bandingkan])",
	'revreview-selected' => "Revisi terpilih dari '''$1:'''",
	'revreview-source' => 'sumber draf',
	'revreview-stable' => 'Halaman stabil',
	'revreview-stable-title' => 'Halaman terperiksa',
	'revreview-stable1' => 'Anda mungkin ingin menampilkan [{{fullurl:$1|stableid=$2}} versi yang ditandai ini] untuk melihat apakah sudah ada [{{fullurl:$1|stable=1}} versi stabil] dari halaman ini.',
	'revreview-stable2' => 'Anda mungkin ingin melihat [{{fullurl:$1|stable=1}} versi stabil] halaman ini (bila ada).',
	'revreview-style' => 'Keterbacaan',
	'revreview-style-0' => 'Tak disetujui',
	'revreview-style-1' => 'Cukup',
	'revreview-style-2' => 'Baik',
	'revreview-style-3' => 'Ringkas',
	'revreview-style-4' => 'Terpilih',
	'revreview-submit' => 'Kirim',
	'revreview-submitting' => 'Mengirimkan...',
	'revreview-finished' => 'Tinjauan selesai!',
	'revreview-failed' => 'Peninjauan gagal!',
	'revreview-successful' => "'''Revisi [[:$1|$1]] berhasil ditandai. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} lihat revisi stabil])'''",
	'revreview-successful2' => "'''Penandaan revisi [[:$1|$1]] berhasil dibatalkan.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] diset sebagai isi tampilan baku halaman dan bukan revisi terakhir.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] merupakan revisi-revisi halaman yang telah diperiksa dan dapat diset sebagai isi tampilan baku halaman bagi pembaca.''",
	'revreview-toggle-title' => 'tampilkan/sembunyikan detail',
	'revreview-toolow' => 'Anda harus memberi peringkat lebih tinggi dari "tak disetujui" dalam penilaian di bawah ini agar suatu revisi dapat dianggap telah ditinjau. Untuk menurunkan peringkat suatu revisi, berikan nilai "tak disetujui" pada semua penilaian.',
	'revreview-update' => "Harap [[{{MediaWiki:Validationpage}}|meninjau]] semua perubahan ''(ditampilkan berikut)'' yang dibuat sejak revisi stabil [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui].<br />
'''Beberapa templat/berkas juga telah diperbarui:'''",
	'revreview-update-includes' => "'''Beberapa templat/berkas telah diperbaharui:'''",
	'revreview-update-none' => "Harap [[{{MediaWiki:Validationpage}}|meninjau]] semua perubahan ''(ditampilkan berikut)'' yang dibuat sejak revisi stabil [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disetujui].",
	'revreview-update-use' => "'''CATATAN''': Templat/berkas yang akan digunakan adalah templat/berkas versi stabil (jika ada).",
	'revreview-diffonly' => "''Untuk memeriksa halaman, pilih pranala \"revisi sekarang\" dan gunakan formulir peninjauan.''",
	'revreview-visibility' => "'''Halaman ini memiliki [[{{MediaWiki:Validationpage}}|versi stabil]] yang telah diperbaharui; preferensi untuk versi stabil dapat [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} dikonfigurasi].'''",
	'revreview-visibility2' => "'''[[{{MediaWiki:Validationpage}}|Versi stabil]] halaman ini telah kadaluwarsa; pengesetan halaman stabil dapat [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} dikonfigurasi].'''",
	'revreview-visibility3' => "'''Halaman ini tidak memiliki [[{{MediaWiki:Validationpage}}|versi stabil]]; preferensi untuk versi stabil dapat [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} dikonfigurasi].'''",
	'revreview-revnotfound' => 'Revisi lama halaman yang Anda minta tidak dapat ditemukan. Silakan periksa URL yang digunakan untuk mengakses halaman ini.',
	'right-autoreview' => 'Menandai revisi sebagai terperiksa secara otomatis',
	'right-movestable' => 'Pindahkan halaman-halaman stabil',
	'right-review' => 'Menandai sebagai revisi terperiksa',
	'right-stablesettings' => 'Mengatur bagaimana versi stabil dipilih dan ditampilkan',
	'right-validate' => 'Menandai sebagai revisi layak',
	'rights-editor-autosum' => 'promosi otomatis',
	'rights-editor-revoke' => 'status Editor dicabut dari [[$1]]',
	'specialpages-group-quality' => 'Pemeriksaan kualitas',
	'stable-logentry' => 'pengaturan pemilihan versi stabil untuk [[$1]]',
	'stable-logentry2' => 'reset pemilihan versi stabil untuk [[$1]]',
	'stable-logpage' => 'Log versi stabil',
	'stable-logpagetext' => 'Ini adalah log perubahan untuk konfigurasi [[{{MediaWiki:Validationpage}}|versi stabil]] halaman isi.
Daftar halaman yang ditandai stabil dapat ditemukan di [[Special:StablePages|daftar halaman stabil]].',
	'revreview-filter-all' => 'semua',
	'revreview-filter-stable' => 'stabil',
	'revreview-filter-approved' => 'Disetujui',
	'revreview-filter-reapproved' => 'Disetujui kembali',
	'revreview-filter-unapproved' => 'Tidak disetujui',
	'revreview-filter-auto' => 'Otomatis',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => 'Perubahan status:',
	'revreview-typefilter' => 'Tipe:',
	'revreview-levelfilter' => 'Tingkatan:',
	'revreview-lev-sighted' => 'terperiksa',
	'revreview-lev-quality' => 'kualitas',
	'revreview-lev-pristine' => 'asli',
	'revreview-reviewlink' => 'meninjau',
	'tooltip-ca-current' => 'Lihat draf terkini halaman ini',
	'tooltip-ca-stable' => 'Lihat versi stabil halaman ini',
	'tooltip-ca-default' => 'Pengaturan pemeriksaan kualitas',
	'revreview-locked-title' => 'Revisi-revisi harus ditinjau terlebih dahulu sebelum ditampilkan di halaman ini!',
	'revreview-unlocked-title' => 'Revisi-revisi tidak memerlukan tinjauan untuk ditampilkan di halaman ini!',
	'revreview-locked' => 'Revisi-revisi harus ditinjau terlebih dahulu sebelum ditampilkan di halaman ini.',
	'revreview-unlocked' => 'Revisi-revisi tidak memerlukan [[{{MediaWiki:Validationpage}}|tinjauan]] untuk dapat ditampilkan di halaman ini.',
	'log-show-hide-review' => '$1 log peninjau',
	'revreview-tt-review' => 'Tinjau halaman ini',
	'validationpage' => '{{ns:help}}:Validasi halaman',
);

/** Ido (Ido) */
$messages['io'] = array(
	'revreview-revnotfound' => "L' anciena versiono di la pagino, quan vu demandis, ne povis trovesar.
Voluntez kontrolar la URL quan vu uzis por acesar a ca pagino.",
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 * @author Spacebirdy
 */
$messages['is'] = array(
	'editor' => 'Ritstjóri',
	'group-editor' => 'Ritstjórar',
	'group-editor-member' => 'ritstjóri',
	'hist-stable' => 'endurskoðuð útgáfa',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} endurskoðað] af [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} sjálfkrafa endurskoðað]',
	'revreview-accuracy' => 'Nákvæmni',
	'revreview-accuracy-1' => 'Yfirfarið',
	'revreview-auto' => '(sjálfkrafa)',
	'revreview-current' => 'Uppkast',
	'revreview-edit' => 'Breyta uppkasti',
	'revreview-flag' => 'Endurskoða þessa útgáfu',
	'revreview-log' => 'Athugasemd:',
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Núverandi útgáfa]]''' (óendurskoðuð)",
	'revreview-stable' => 'Síða',
	'revreview-submit' => 'Staðfesta',
	'revreview-submitting' => 'Staðfesta …',
	'validationpage' => '{{ns:help}}:Siðustaðfesting',
);

/** Italian (Italiano)
 * @author Darth Kule
 * @author Gianfranco
 * @author Melos
 * @author Pietrodn
 */
$messages['it'] = array(
	'editor' => 'Editore',
	'flaggedrevs' => 'Verifica delle revisioni',
	'flaggedrevs-backlog' => "C'è del lavoro arretrato nelle [[Special:OldReviewedPages|pagine non revisionate di recente]]. '''È necessaria la tua attenzione!'''",
	'flaggedrevs-desc' => 'Dà agli editori e ai revisori la possibilità di validare le revisioni e stabilizzare le pagine',
	'flaggedrevs-pref-UI-0' => "Usa l'interfaccia utente dettagliata delle revisioni stabili",
	'flaggedrevs-pref-UI-1' => "Usa l'interfaccia utente semplice delle revisioni stabili",
	'flaggedrevs-prefs-stable' => 'Mostra sempre, di default, la versione stabile delle pagine di contenuto (se esiste)',
	'flaggedrevs-prefs-watch' => 'Aggiungi le pagine che revisiono agli osservati speciali',
	'group-editor' => 'Editori',
	'group-editor-member' => 'Editore',
	'group-reviewer' => 'Revisori',
	'group-reviewer-member' => 'Revisore',
	'grouppage-editor' => '{{ns:project}}:Editore',
	'grouppage-reviewer' => '{{ns:project}}:Revisore',
	'group-autoreview' => 'Autorevisori',
	'group-autoreview-member' => 'autorevisore',
	'grouppage-autoreview' => '{{ns:project}}:Autorevisori',
	'hist-draft' => 'versione bozza',
	'hist-quality' => 'versione di qualità',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} convalidata] da [[User:$3|$3]]',
	'hist-stable' => 'versione visionata',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} visionata] da [[User:$3|$3]]',
	'review-diff2stable' => 'Visualizza i cambiamenti fra la versione stabile e la corrente',
	'review-logentry-app' => 'ha revisionato r$2 di [[$1]]',
	'review-logentry-id' => 'visualizza',
	'review-logentry-diff' => 'diff con stabile',
	'review-logpage' => 'Log revisioni',
	'reviewer' => 'Revisore',
	'revisionreview' => 'Revisiona versioni',
	'revreview-accuracy' => 'Accuratezza',
	'revreview-accuracy-0' => 'Non approvata',
	'revreview-accuracy-1' => 'Visionata',
	'revreview-accuracy-2' => 'Preciso',
	'revreview-accuracy-3' => 'Ben documentata',
	'revreview-accuracy-4' => 'Ottima',
	'revreview-approved' => 'Approvata',
	'revreview-auto' => '(automatico)',
	'revreview-auto-w' => "Stai modificando una versione stabile; i cambiamenti '''saranno automaticamente revisionati'''.",
	'revreview-auto-w-old' => "Stai modificando una versione revisionata; i cambiamenti '''saranno automaticamente revisionati'''.",
	'revreview-basic' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|visionata]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] che {{PLURAL:$3|attende|attendono}} una revisione.",
	'revreview-basic-i' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|visionata]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template o file] che attendono una revisione.",
	'revreview-basic-old' => 'Questa è una versione [[{{MediaWiki:Validationpage}}|revisionata]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenca tutte]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
Potrebbero essere stati apportati nuove [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche].',
	'revreview-basic-same' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|visionata]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenca tutte]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.",
	'revreview-blocked' => 'Non puoi revisionare questa versione perché il tuo account è attualmente bloccato ([$1 dettagli])',
	'revreview-changed' => "'''L'azione richiesta non può essere eseguita su questa versione di [[:$1|$1]].'''

Un template o una immagine potrebbero essere state richieste quando nessuna versione era stata specificata. Ciò accade se un template dinamico include un'altra immagine o un template dipendente da una variabile che è cambiata da quando hai iniziato a revisionare questa pagina.
Aggiornare la pagina e ricominciare la revisione potrebbero risolvere il problema.",
	'revreview-current' => 'Bozza',
	'revreview-depth' => 'Esaustività',
	'revreview-depth-0' => 'Non approvata',
	'revreview-depth-1' => 'Minima',
	'revreview-depth-2' => 'Mediocre',
	'revreview-depth-3' => 'Alta',
	'revreview-depth-4' => 'Ottima',
	'revreview-draft-title' => 'Pagina bozza',
	'revreview-edit' => 'Modifica la bozza',
	'revreview-editnotice' => "'''Le modifiche a questa pagina saranno inserite nella [[{{MediaWiki:Validationpage}}|versione stabile]] una volta che un utente autorizzato le avrà revisionate.'''",
	'revreview-flag' => 'Revisiona questa versione',
	'revreview-edited' => "'''Gli edit saranno inclusi nella [[{{MediaWiki:Validationpage}}|versione stabile]] dopo che un utente autorizzato li avrà revisionati.'''
'''La ''bozza'' è mostrata di seguito.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|modifica attende|modifiche attendono}}] una revisione.",
	'revreview-invalid' => "'''Errore:''' nessuna versione [[{{MediaWiki:Validationpage}}|revisionata]] corrisponde all'ID fornito.",
	'revreview-legend' => 'Valuta il contenuto della versione',
	'revreview-log' => 'Commento:',
	'revreview-main' => "Devi selezionare una particolare revisione di una pagina di contenuti per revisionarla.

Vedi l'[[Special:Unreviewedpages|elenco delle pagine non revisionate]].",
	'revreview-newest-basic' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima versione visionata] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenca tutte]) è stata [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|ha bisogno|hanno bisogno}} di una revisione.",
	'revreview-newest-basic-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima versione stabile] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenca tutte]) è stata [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Modifiche a template o file] hanno bisogno di una revisione.",
	'revreview-newest-quality' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima versione di qualità] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenca tutte]) è stata [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|ha bisogno|hanno bisogno}} di una revisione.",
	'revreview-newest-quality-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima versione di qualità] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenca tutte]) è stata [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Modifiche a template o file] hanno bisogno di una revisione.",
	'revreview-noflagged' => "Non ci sono versioni revisionate di questa pagina, perciò potrebbe '''non''' essere stata [[{{MediaWiki:Validationpage}}|controllata]] la sua qualità.",
	'revreview-note' => '[[User:$1|$1]] ha commentato così la versione durante la [[{{MediaWiki:Validationpage}}|revisione]]:',
	'revreview-notes' => 'Osservazioni o note da mostrare:',
	'revreview-oldrating' => 'È stata giudicata:',
	'revreview-patrol' => 'Segna questo cambiamento come verificato',
	'revreview-patrol-title' => 'Segna come verificata',
	'revreview-patrolled' => 'La versione di [[:$1|$1]] selezionata è stata segnata come verificata.',
	'revreview-quality' => "Questa è l'ultima versione di [[{{MediaWiki:Validationpage}}|qualità]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] che {{PLURAL:$3|attende|attendono}} una revisione.",
	'revreview-quality-i' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|di qualità]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template o file] che attendono una revisione.",
	'revreview-quality-old' => 'Questa è una versione [[{{MediaWiki:Validationpage}}|di qualità]]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenca tutte]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
Potrebbero essere state apportate nuove [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche].',
	'revreview-quality-same' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|di qualità]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenca tutte]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.",
	'revreview-quick-invalid' => "'''ID versione non valido'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Versione corrente]]''' (non revisionata)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pagina di qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visualizza bozza]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pagina di qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visualizza bozza]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina di qualità]]'''",
	'revreview-selected' => "Versione selezionata di '''$1:'''",
	'revreview-source' => 'Visualizza sorgente bozza',
	'revreview-stable' => 'Pagina stabile',
	'revreview-stable1' => 'Puoi visualizzare [{{fullurl:$1|stableid=$2}} questa versione verificata] e vedere se adesso è la [{{fullurl:$1|stable=1}} versione stabile] di questa pagina.',
	'revreview-stable2' => 'Puoi visualizzare la [{{fullurl:$1|stable=1}} versione stabile] di questa pagina (se ce ne è una).',
	'revreview-style' => 'Leggibilità',
	'revreview-style-0' => 'Non approvata',
	'revreview-style-1' => 'Accettabile',
	'revreview-style-2' => 'Buona',
	'revreview-style-3' => 'Concisa',
	'revreview-style-4' => 'Ottima',
	'revreview-submit' => 'Invia',
	'revreview-submitting' => 'Invio in corso...',
	'revreview-finished' => 'Revisione completata!',
	'revreview-successful' => "'''Versione di [[:$1|$1]] verificata con successo. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} visualizza versione stabile])'''",
	'revreview-text' => "Le ''[[{{MediaWiki:Validationpage}}|versioni stabili]] sono i contenuti di default della pagina per i visitatori, invece della versione più recente.''",
	'revreview-text2' => "Le ''[[{{MediaWiki:Validationpage}}|versioni stabili]] sono le versioni controllate delle pagina e possono essere impostate come contenuto di default per i visitatori.''",
	'revreview-toggle-title' => 'mostra/nascondi dettagli',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Revisiona]] le modifiche ''(mostrate di seguito)'' apportate da quanto la versione stabile è stata [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata].<br />
'''Alcuni template o file sono stati aggiornati:'''",
	'revreview-update-includes' => "'''Alcuni template o immagini sono stati aggiornati:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Revisiona]] le modifiche ''(mostrate di seguito)'' apportate da quando la versione stabile è stata [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvata].",
	'revreview-update-use' => "'''NOTA:''' Se qualcuno di questi template o immagini hanno una versione stabile, allora è già usata nella versione stabile di questa pagina.",
	'revreview-diffonly' => "''Per revisionare la pagina, fai clic sul link \"versione corrente\" e usa il modulo di revisione.''",
	'revreview-visibility' => "'''Questa pagina ha una [[{{MediaWiki:Validationpage}}|versione stabile]] aggiornata; le impostazioni della stabilità della pagina possono essere [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-visibility2' => "'''Questa pagina ha una [[{{MediaWiki:Validationpage}}|versione stabile]] obsoleta; le impostazioni di stabilità della pagina possono essere [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-visibility3' => "'''Questa pagina non ha una [[{{MediaWiki:Validationpage}}|versione stabile]]; le impostazioni di stabilità della pagina possono essere [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-revnotfound' => 'La versione richiesta della pagina non è stata trovata.
Verificare la URL usata per accedere a questa pagina.',
	'right-autoreview' => 'Segna automaticamente versioni come visionate',
	'right-movestable' => 'Sposta pagine stabili',
	'right-review' => 'Segna versioni come visionate',
	'right-stablesettings' => 'Configura come la versione stabile è selezionata e mostrata',
	'right-validate' => 'Segna revisioni come convalidate',
	'rights-editor-autosum' => 'autopromosso',
	'specialpages-group-quality' => 'Qualità delle pagine',
	'stable-logpage' => 'Registro di stabilità',
	'stable-logpagetext' => "Questo è un registro delle modifiche alla configurazione della [[{{MediaWiki:Validationpage}}|versione stabile]] delle pagine di contenuto.
Un elenco di pagine stabilizzate può essere trovato all'[[Special:StablePages|elenco di pagine stabili]].",
	'revreview-filter-all' => 'Tutte',
	'revreview-filter-stable' => 'stabile',
	'revreview-filter-approved' => 'Approvata',
	'revreview-filter-unapproved' => 'Non approvato',
	'revreview-filter-manual' => 'Manuale',
	'revreview-statusfilter' => 'Cambia stato:',
	'revreview-typefilter' => 'Tipo:',
	'revreview-levelfilter' => 'Livello:',
	'revreview-reviewlink' => 'revisiona',
	'tooltip-ca-current' => 'Vedi la bozza attuale di questa pagina',
	'tooltip-ca-stable' => 'Vedi la versione stabile di questa pagina',
	'revreview-locked-title' => 'Le modifiche devono essere revisionate prima di essere mostrate in questa pagina!',
	'revreview-unlocked-title' => 'Le modifiche non hanno bisogno di essere revisionate prima di essere mostrate in questa pagina!',
	'revreview-locked' => 'Le modifiche devono essere revisionate prima di essere mostrate in questa pagina!',
	'revreview-unlocked' => 'Le modifiche non hanno bisogno di essere revisionate prima di essere mostrate in questa pagina!',
	'log-show-hide-review' => '$1 log delle revisioni',
	'revreview-tt-review' => 'Revisiona questa pagina',
	'validationpage' => '{{ns:help}}:Validazione delle pagine',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fievarsty
 * @author Fryed-peach
 * @author Hosiryuhosi
 * @author JtFuruhata
 */
$messages['ja'] = array(
	'editor' => '編集者',
	'flaggedrevs' => '特定版の判定',
	'flaggedrevs-backlog' => "査読済みページに対する[[Special:OldReviewedPages|保留中の編集]]があります。'''確認にご協力ください！'''",
	'flaggedrevs-watched-pending' => "査読済みページに対する[{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} 保留中の編集]があります。'''確認にご協力ください！'''",
	'flaggedrevs-desc' => '編集者および査読者に、特定版の査読や表示ページとしての採択ができる機能を提供する',
	'flaggedrevs-pref-UI' => '固定版のインターフェース:',
	'flaggedrevs-pref-UI-0' => '固定版情報を詳細表示する',
	'flaggedrevs-pref-UI-1' => '固定版情報を簡単表示する',
	'prefs-flaggedrevs' => '固定度',
	'flaggedrevs-prefs-stable' => 'コンテンツページの既定表示を常に固定版にする （存在する場合）',
	'flaggedrevs-prefs-watch' => '自分が査読したページをウォッチリストに追加する',
	'flaggedrevs-prefs-editdiffs' => 'ページ編集中に固定版との差分を表示する',
	'group-editor' => '編集者',
	'group-editor-member' => '編集者',
	'group-reviewer' => '査読者',
	'group-reviewer-member' => '査読者',
	'grouppage-editor' => '{{ns:project}}:編集者',
	'grouppage-reviewer' => '{{ns:project}}:査読者',
	'group-autoreview' => '自動査読者',
	'group-autoreview-member' => '自動査読者',
	'grouppage-autoreview' => '{{ns:project}}:自動査読者',
	'hist-draft' => '候補版',
	'hist-quality' => '内容充実版',
	'hist-quality-user' => '[[User:$3|$3]] によって[{{fullurl:$1|stableid=$2}} 判定]',
	'hist-stable' => '一覧済み版',
	'hist-stable-user' => '[[User:$3|$3]] によって[{{fullurl:$1|stableid=$2}} 一覧]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} 自動一覧]',
	'review-diff2stable' => '固定版から最新版までの変更を見る',
	'review-logentry-app' => '[[$1]] の版$2を査読承認',
	'review-logentry-dis' => '[[$1]] の版$2を棄却',
	'review-logentry-id' => '表示',
	'review-logentry-diff' => '固定版との差分',
	'review-logpage' => '査読記録',
	'review-logpagetext' => '記事の特定版に対する[[{{MediaWiki:Validationpage}}|承認]]状況の変更記録です。承認が済んだページの一覧は[[Special:ReviewedPages|査読済みページ一覧]]を参照してください。',
	'reviewer' => '査読者',
	'revisionreview' => '特定版の査読',
	'revreview-accuracy' => '内容の正確さ',
	'revreview-accuracy-0' => '未承認',
	'revreview-accuracy-1' => '一覧済み',
	'revreview-accuracy-2' => '的確',
	'revreview-accuracy-3' => '検証性充分',
	'revreview-accuracy-4' => '秀逸',
	'revreview-approved' => '承認済',
	'revreview-auto' => '（自動査読）',
	'revreview-auto-w' => "あなたは固定版を編集しています。全ての変更は'''自動的に査読'''されます。",
	'revreview-auto-w-old' => "あなたは査読された版を編集しています。全ての変更は'''自動的に査読'''されます。",
	'revreview-basic' => 'これは最新の[[{{MediaWiki:Validationpage}}|一覧済み]]版で、<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 採用候補]には査読待ちの[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3件の{{PLURAL:$3|変更}}]があります。',
	'revreview-basic-i' => 'これは最新の[[{{MediaWiki:Validationpage}}|一覧済み]]版で、<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 採用候補]には査読待ちの[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} テンプレートまたはファイルの変更]があります。',
	'revreview-basic-old' => 'これは[[{{MediaWiki:Validationpage}}|一覧済み]]版 （[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 全て表示]） で、<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。承認後に[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 変更]されているかもしれません。',
	'revreview-basic-same' => 'これは最新の[[{{MediaWiki:Validationpage}}|一覧済み]]版（[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 全て表示]）で、<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。',
	'revreview-basic-source' => '<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認された]このページの[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} 一覧済み版]は、この版に基づいています。',
	'revreview-blocked' => 'あなたはアカウントが現在ブロックされているため （[$1 詳細]）、この版を査読できません',
	'revreview-changed' => "'''[[:$1|$1]]のこの版に対して行おうとした操作を実行できませんでした'''

版が特定されていない状態でテンプレートまたはファイルに対する処理要求が行われた可能性があります。変数に依存してファイルやテンプレートを呼び出している動的なテンプレートを利用しており、その変数がページの査読開始以降に変化した時にこのようなことが起こります。ページを再読み込みして再度査読を行えばこの問題は解決できます。",
	'revreview-current' => '採用候補',
	'revreview-depth' => '考察の深さ',
	'revreview-depth-0' => '未承認',
	'revreview-depth-1' => '基本のみ',
	'revreview-depth-2' => '並',
	'revreview-depth-3' => '高',
	'revreview-depth-4' => '秀逸',
	'revreview-draft-title' => '採用候補ページ',
	'revreview-edit' => '候補版を編集する',
	'revreview-editnotice' => "'''このページへの編集は権限を持つ利用者の査読の後に[[{{MediaWiki:Validationpage}}|固定版]]に反映されます。'''",
	'revreview-flag' => 'この特定版の査読',
	'revreview-edited' => "'''編集は権限を持つ利用者による査読の後に[[{{MediaWiki:Validationpage}}|固定版]]に反映されます。以下に表示されているのは''採用候補''です。'''査読待ちの[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2件の{{PLURAL:$2|変更}}]があります。",
	'revreview-invalid' => "'''無効な対象:''' 指定されたIDに対応する[[{{MediaWiki:Validationpage}}|査読済み]]版はありません。",
	'revreview-legend' => '特定版に対する判定',
	'revreview-log' => '査読内容の要約:',
	'revreview-main' => '査読のためには対象記事から特定の版を選択する必要があります。

[[Special:Unreviewedpages|未査読ページ一覧]]を参照してください。',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最新の一覧済み版] （[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 全て表示]） は <i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。査読が{{PLURAL:$3|必要な}}[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0&editreview=1}} $3件の{{PLURAL:$3|変更}}]があります。',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最新の一覧済み版] （[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 全て表示]） は <i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。査読が必要な[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} テンプレートまたはファイルの変更]があります。',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最新の内容充実版] （[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 全て表示]） は <i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。査読が{{PLURAL:$3|必要な}}[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0&editreview=1}} $3件の{{PLURAL:$3|変更}}]があります。',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最新の内容充実版] （[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 全て表示]） は <i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。査読が必要な[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} テンプレートまたはファイルの変更]があります。',
	'revreview-noflagged' => "このページには査読済の版がなく、内容の[[{{MediaWiki:Validationpage}}|検査]]がされて'''いません'''。",
	'revreview-note' => '[[User:$1|$1]] は、この版に以下の[[{{MediaWiki:Validationpage}}|査読意見]]を表明しています:',
	'revreview-notes' => '査読意見または注意:',
	'revreview-oldrating' => '査読結果:',
	'revreview-patrol' => 'パトロール済みにマーク',
	'revreview-patrol-title' => 'パトロール済みにマーク',
	'revreview-patrolled' => '選択された [[:$1|$1]] の特定版は、パトロール済みにマークされます。',
	'revreview-quality' => 'これは最新の[[{{MediaWiki:Validationpage}}|内容充実]]版で、<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 採用候補]には査読待ちの[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0&editreview=1}} $3件の{{PLURAL:$3|変更}}]があります。',
	'revreview-quality-i' => 'これは最新の[[{{MediaWiki:Validationpage}}|内容充実]]版で、<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 採用候補]には査読待ちの[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} テンプレートまたはファイルの変更]があります。',
	'revreview-quality-old' => 'これは[[{{MediaWiki:Validationpage}}|内容充実]]版 （[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 全て表示]） で、<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。承認後に[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 変更]されているかもしれません。',
	'revreview-quality-same' => 'これは最新の[[{{MediaWiki:Validationpage}}|内容充実]]版 （[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 全て表示]） で、<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。',
	'revreview-quality-source' => '<i>$2</i> に[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認された]このページの[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} 内容充実]版は、この版に基づいています。',
	'revreview-quality-title' => '内容充実ページ',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|一覧済みページ]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 採用候補を見る]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|一覧済みページ]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 採用候補を見る]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|一覧済みページ]]'''",
	'revreview-quick-invalid' => "'''無効な版指定'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|最新版]]''' （未査読）",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|内容充実ページ]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 採用候補を見る]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|内容充実ページ]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 採用候補を見る]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|内容充実ページ]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|採用候補]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 記事を見る]] （[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 比較する]）",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|採用候補]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 記事を見る]] （[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 比較する]）",
	'revreview-selected' => "'''$1''' の選択された特定版:",
	'revreview-source' => '候補版のソース',
	'revreview-stable' => '固定ページ',
	'revreview-stable-title' => '一覧済みページ',
	'revreview-stable1' => '[{{fullurl:$1|stableid=$2}} この判定済み版]を閲覧し、このページの現在の[{{fullurl:$1|stable=1}} 固定版]であるか確認することができます。',
	'revreview-stable2' => 'このページの[{{fullurl:$1|stable=1}} 固定版]を閲覧することができます （存在する場合）。',
	'revreview-style' => '読みやすさ',
	'revreview-style-0' => '未承認',
	'revreview-style-1' => '許容範囲',
	'revreview-style-2' => '適切',
	'revreview-style-3' => '明快',
	'revreview-style-4' => '秀逸',
	'revreview-submit' => '送信',
	'revreview-submitting' => '送信中…',
	'revreview-finished' => '査読完了',
	'revreview-failed' => '査読失敗！',
	'revreview-successful' => "'''[[:$1|$1]] の特定版の判定に成功しました。（[{{fullurl:{{#Special:Stableversions}}|page=$2}} 固定版を閲覧]）'''",
	'revreview-successful2' => "'''[[:$1|$1]] の特定版の判定取り消しに成功しました。'''",
	'revreview-text' => "''閲覧者に既定で表示されるのは最新版ではなく[[{{MediaWiki:Validationpage}}|固定版]]です。''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|固定版]]はページの検査済みの版であり、閲覧者に既定で表示する内容として設定できます。''",
	'revreview-toggle-title' => '詳細を表示または非表示',
	'revreview-toolow' => '版を査読済みとするには、以下に示す全ての判定要素を「{{int:revreview-style-0}}」より高い評価にする必要があります。版を棄却する場合、全ての評価を「{{int:revreview-style-0}}」としてください。',
	'revreview-update' => "固定版の[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認]以降になされた変更 （''下記参照''） を[[{{MediaWiki:Validationpage}}|査読]]してください。<br />'''更新されたテンプレートやファイルがあります:'''",
	'revreview-update-includes' => "'''更新されたテンプレートやファイルがあります:'''",
	'revreview-update-none' => "固定版の[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 承認]以降になされた変更 （''下記参照''） を[[{{MediaWiki:Validationpage}}|査読]]してください。",
	'revreview-update-use' => "'''注:''' これらのテンプレートやファイルに固定版があれば、それはこのページの固定版で利用されています。",
	'revreview-diffonly' => "''このページを査読するには、「最新版」リンクを辿って、査読フォームを使用します。''",
	'revreview-visibility' => "'''このページにはより新しい[[{{MediaWiki:Validationpage}}|固定版]]があります。ページの固定度設定は[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} 変更可能です]。'''",
	'revreview-visibility2' => "'''このページには古くなった[[{{MediaWiki:Validationpage}}|固定版]]があります。ページの固定度設定は[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} 変更可能]です。'''",
	'revreview-visibility3' => "'''このページには[[{{MediaWiki:Validationpage}}|固定版]]がありません。ページの固定度設定は[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} 変更可能]です。'''",
	'revreview-revnotfound' => 'あなたが要求したこのページの旧版は見つかりませんでした。このページにアクセスしたURLをもう一度確認してください。',
	'right-autoreview' => '自動的に版を一覧済みとする',
	'right-movestable' => '固定ページを移動する',
	'right-review' => '版を一覧済みにする',
	'right-stablesettings' => '固定版の選択方法・表示方法を設定する',
	'right-validate' => '版を評価済みにする',
	'rights-editor-autosum' => '自動権限付与',
	'rights-editor-revoke' => '[[$1]] の編集者権限取り消し',
	'specialpages-group-quality' => '品質保証',
	'stable-logentry' => '[[$1]] の固定版の設定を変更',
	'stable-logentry2' => '[[$1]] の固定版設定をリセット',
	'stable-logpage' => 'ページ採択記録',
	'stable-logpagetext' => 'これは記事の[[{{MediaWiki:Validationpage}}|固定版]]設定の変更記録です。固定版を持つページの一覧は[[Special:StablePages|固定ページ一覧]]から見ることができます。',
	'revreview-filter-all' => 'すべて',
	'revreview-filter-stable' => '固定',
	'revreview-filter-approved' => '承認済',
	'revreview-filter-reapproved' => '再承認済',
	'revreview-filter-unapproved' => '未承認',
	'revreview-filter-auto' => '自動',
	'revreview-filter-manual' => '手動',
	'revreview-statusfilter' => '状態の変更:',
	'revreview-typefilter' => '種類:',
	'revreview-levelfilter' => '水準:',
	'revreview-lev-sighted' => '一覧済み',
	'revreview-lev-quality' => '内容充実',
	'revreview-lev-pristine' => '手付かず',
	'revreview-reviewlink' => '査読',
	'tooltip-ca-current' => 'このページの現在の採用候補を見る',
	'tooltip-ca-stable' => 'このページの固定版を見る',
	'tooltip-ca-default' => '品質保証設定',
	'revreview-locked-title' => '編集がこのページに表示される前に査読がなされなければなりません。',
	'revreview-unlocked-title' => '編集がこのページに表示される前に査読がなされる必要はありません。',
	'revreview-locked' => '編集がこのページに表示される前に査読がなされなければなりません。',
	'revreview-unlocked' => '編集がこのページに表示される前に査読がなされる必要はありません。',
	'log-show-hide-review' => '査読記録を$1',
	'revreview-tt-review' => 'このページを査読する',
	'validationpage' => '{{ns:help}}:ページの判定',
);

/** Jutish (Jysk)
 * @author Huslåke
 * @author Ælsån
 */
$messages['jut'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Flagged Reviisje',
	'group-editor' => 'Editors',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Reviewers',
	'group-reviewer-member' => 'Reviewer',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Reviewer',
	'hist-quality' => 'kwalitæ reviisje',
	'hist-stable' => 'sæn reviisje',
	'reviewer' => 'Reviewer',
	'revreview-accuracy' => 'Klopthed',
	'revreview-accuracy-0' => 'Niveauen',
	'revreview-accuracy-1' => 'Niveauto',
	'revreview-accuracy-2' => 'Niveautre',
	'revreview-accuracy-3' => 'Niveaufor',
	'revreview-accuracy-4' => 'Niveaufem',
	'revreview-current' => 'Dråft',
	'revreview-depth' => 'Diip',
	'revreview-depth-0' => 'Niveauen',
	'revreview-depth-1' => 'Niveauto',
	'revreview-depth-2' => 'Niveautre',
	'revreview-depth-3' => 'Niveaufire',
	'revreview-depth-4' => 'Niveaufem',
	'revreview-edit' => 'Redigær draft',
	'revreview-log' => 'Bemærkenge:',
	'revreview-oldrating' => "E'r ræten:",
	'revreview-source' => 'draft sårs',
	'revreview-stable' => 'Stabiil',
	'revreview-style' => 'Læsbårhed',
	'revreview-style-0' => 'Niveauen',
	'revreview-style-1' => 'Niveauto',
	'revreview-style-2' => 'Niveautre',
	'revreview-style-3' => 'Niveaufor',
	'revreview-style-4' => 'Niveaufem',
	'rights-editor-autosum' => 'åtåpråmåværn',
	'rights-editor-revoke' => 'slettet redigærerståt der [[$1]]',
	'tooltip-ca-current' => "Se'n draft nuværende detter side",
	'tooltip-ca-stable' => "Se'n stabiil versje detter pæge",
	'tooltip-ca-default' => 'Kwalitæt assurans endstellenger',
	'validationpage' => '{{ns:help}}:Artikel vålidåsje',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'editor' => 'Éditor',
	'revreview-style-0' => 'Ora disarujuki',
	'revreview-style-1' => 'Lumayan',
	'revreview-style-2' => 'Apik',
	'revreview-style-3' => 'Ringkes',
	'revreview-style-4' => 'Pinilih',
	'revreview-revnotfound' => 'Revisi lawas kaca sing panjenengan suwun ora bisa ditemokaké. Mangga priksanen URL sing digunakaké kanggo ngaksès kaca iki.',
);

/** Kabyle (Taqbaylit)
 * @author Agurzil
 */
$messages['kab'] = array(
	'revreview-revnotfound' => 'Tasiwelt taqdimt n usebter-agi i testeqsiḍ ulac-it.
Ssenqed URL i tesseqdac.',
);

/** Kazakh (Arabic script) (‫قازاقشا (تٴوتە)‬) */
$messages['kk-arab'] = array(
	'editor' => 'تۇزەتۋشى',
	'flaggedrevs' => 'بەلگىلەنگەن نۇسقالار',
	'group-editor' => 'تۇزەتۋشىلەر',
	'group-editor-member' => 'تۇزەتۋشى',
	'group-reviewer' => 'سىن بەرۋشىلەر',
	'group-reviewer-member' => 'سىن بەرۋشى',
	'grouppage-editor' => '{{ns:project}}:تۇزەتۋشى',
	'grouppage-reviewer' => '{{ns:project}}:سىن بەرۋشى',
	'hist-quality' => '[ساپالىنعان]',
	'hist-stable' => '[شولىنعان]',
	'review-diff2stable' => 'تىياناقتى مەن اعىمدىق نۇسقالار اراداعى وزگەرىستەر',
	'review-logentry-app' => '[[$1]] دەگەنگە سىن بەردى',
	'review-logentry-dis' => '[[$1]] دەگەننىڭ نۇسقاسىن كەمىتتى',
	'review-logentry-id' => 'نۇسقا ٴنومىرى $1',
	'review-logpage' => 'ماقالاعا سىن بەرۋ جۋرنالى',
	'review-logpagetext' => 'بۇل ماعلۇمات بەتتەردەگى نۇسقالاردى [[{{MediaWiki:Validationpage}}|بەكىتۋ]] كۇيى
وزگەرىستەرىنىڭ جۋرنالى.',
	'reviewer' => 'سىن بەرۋشى',
	'revisionreview' => 'نۇسقالارعا سىن بەرۋ',
	'revreview-accuracy' => 'دالدىگى',
	'revreview-accuracy-0' => 'بەكىتىلمەگەن',
	'revreview-accuracy-1' => 'شولىنعان',
	'revreview-accuracy-2' => 'ٴدالدى',
	'revreview-accuracy-3' => 'قاينار كەلتىرىلگەن',
	'revreview-accuracy-4' => 'تاڭدامالى',
	'revreview-auto' => '(وزدىكتىك)',
	'revreview-auto-w' => "تىياناقتى نۇسقانى وڭدەۋدەسىز, وزگەرىستەردىڭ ارقايسىسىنا '''وزدىكتىك سىن بەرىلەدى'''.
ساقتاۋدىڭ الدىندا بەتتى قاراپ شىعۋىڭىزعا بولادى.",
	'revreview-auto-w-old' => "ەسكى نۇسقانى وڭدەۋدەسىز, وزگەرىستەردىڭ ارقايسىسىنا '''وزدىكتىك سىن بەرىلەدى'''.
ساقتاۋدىڭ الدىندا بەتتى قاراپ شىعۋىڭىزعا بولادى.",
	'revreview-basic' => 'بۇل ەڭ سوڭعى [[{{MediaWiki:Validationpage}}|شولىنعان]] نۇسقا,
<i>$2</i> كەزىندە [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلگەن]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسى]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} وزگەرتىلۋى] مۇمكىن; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|وزگەرىسى|وزگەرىسى}}]
سىن بەرۋدى {{PLURAL:$3|كۇتۋدە|كۇتۋدە}}.',
	'revreview-changed' => "'''بۇل نۇسقادا سۇرانىم ارەكەتى ورىندالمايدى.'''

ۇلگى نە سۋرەت ەرەكشە نۇسقا كەلتىرىلمەگەندە سۇرانالادى. بۇل ەگەر وسى بەتكە سىن بەرۋدى باستاعندا
وزگەرەتىن اينالمالىعا تاۋەلدى وزگەرمەلى ۇلگى ارقىلى باسقا سۋرەتتى نە ۇلگىنى ەندىرگەن بولسا بولادى.
بەتتى جاڭارتۋ جانە قايتا سىن بەرۋ بۇل ماسەلەنى شەشۋ مۇمكىن.",
	'revreview-current' => 'جوبا جازبا',
	'revreview-depth' => 'كامىلدىگى',
	'revreview-depth-0' => 'بەكىتىلمەگەن',
	'revreview-depth-1' => 'ىرگەلى',
	'revreview-depth-2' => 'ورتاشا',
	'revreview-depth-3' => 'جوعارى',
	'revreview-depth-4' => 'تاڭدامالى',
	'revreview-edit' => 'جوبا جازبانى وڭدەۋ',
	'revreview-flag' => 'بۇل نۇسقاعا (#$1) سىن بەرۋ',
	'revreview-legend' => 'نۇسقا ماعلۇماتىنا دەڭگەي بەرۋ',
	'revreview-log' => 'ماندەمەسى:',
	'revreview-main' => 'سىن بەرۋ ٴۇشىن ماعلۇمات بەتىنىڭ ەرەكشە نۇسقاسىن بولەكتەۋىڭىز كەرەك.

سىن بەرىلمەگەن بەت ٴتىزىمى ٴۇشىن [[{{ns:special}}:Unreviewedpages]] بەتىن قاراڭىز.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ەڭ سوڭعى شولىنعان نۇسقاسى]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} بارلىق ٴتىزىمى]) <i>$2</i> كەزىندە [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلدى]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|وزگەرىسىنە|وزگەرىسىنە}}] سىن بەرۋى {{PLURAL:$3|كەرەك|كەرەك}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ەڭ سوڭعى ساپالى نۇسقاسى]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} بارلىعىنىڭ ٴتىزىمى]) <i>$2</i> كەزىندە [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلدى].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|وزگەرىسىنە|وزگەرىسىنە}}] سىن بەرۋى {{PLURAL:$3|كەرەك|كەرەك}}.',
	'revreview-noflagged' => "بۇل بەتتىڭ سىن بەرىلگەن نۇسقالارى مىندا جوق, سوندىقتان بۇنىڭ ساپاسى
'''[[{{MediaWiki:Validationpage}}|تەكسەرىلمەگەن]]''' بولۋى مۇمكىن.",
	'revreview-note' => '[[{{ns:user}}:$1]] بۇل نۇسقاعا  [[{{MediaWiki:Validationpage}}|سىن بەرگەندە]] كەلەسى اڭعارتۋلار جاسادى:',
	'revreview-notes' => 'كورسەتىلەتىن پىكىرلەر مەن اڭعارتپالار:',
	'revreview-oldrating' => 'بۇل مىنا باعا الدى:',
	'revreview-patrolled' => '[[:$1|$1]] دەگەننىڭ بولەكتەلىنگەن نۇسقاسى كۇزەتتە دەپ بەلگىلەندى.',
	'revreview-quality' => 'بۇل ەڭ سوڭعى [[{{MediaWiki:Validationpage}}|ساپالى]] نۇسقا,
<i>$2</i> كەزىندە [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلگەن]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسى]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} وزگەرتىلۋى] مۇمكىن; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|وزگەرىسى|وزگەرىسى}}]
سىن بەرۋدى {{PLURAL:$3|كۇتۋدە|كۇتۋدە}}.',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|شولىنعان]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسىن قاراۋ]]",
	'revreview-quick-none' => "'''اعىمدىق''' (cىن بەرىلگەن نۇسقالار جوق)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|ساپالى]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسىن قاراۋ]]",
	'revreview-quick-see-basic' => "'''جوبا جازبا''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} تىياناقتى ماقالانى قاراۋ]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|وزگەرىس|وزگەرىس}}])",
	'revreview-quick-see-quality' => "'''جوبا جازبا''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} تىياناقتى ماقالانى قاراۋ]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|وزگەرىس|وزگەرىس}}])",
	'revreview-selected' => "'''$1:''' دەگەننىڭ بولەكتەلىنگەن نۇسقاسى",
	'revreview-source' => 'جوبا جازبالى قاينار',
	'revreview-stable' => 'تىياناقتى',
	'revreview-style' => 'وقىمدىلىعى',
	'revreview-style-0' => 'بەكىتىلمەگەن',
	'revreview-style-1' => 'ٴتىيىمدى',
	'revreview-style-2' => 'جاقسى',
	'revreview-style-3' => 'تارتىمدى',
	'revreview-style-4' => 'تاڭدامالى',
	'revreview-submit' => 'سىن جىبەرۋ',
	'revreview-text' => 'تىياناقتى نۇسقالار ەڭ جاڭا نۇسقاسىنان گورى بەت كورىنىسىندەگى ادەپكى ماعلۇمات دەپ تاپسىرىلادى.',
	'revreview-toolow' => 'نۇسقاعا سىن بەرىلگەن دەپ سانالۋى ٴۇشىن تومەندەگى قاسىيەتتەردىڭ قاي-قايسىسىن «بەكىتىلمەگەن»
دەگەننەن جوعارى دەڭگەي بەرۋىڭىز كەرەك. نۇسقانى كەمىتۋ ٴۇشىن, بارلىق ورىستەردى «بەكىتىلمەگەن» دەپ تاپسىرىلسىن.',
	'revreview-update' => 'تىياناقتى نۇسقا بەكىتىلگەننەن بەرى جاسالعان وزگەرىستەرگە (تومەندە كورسەتىلگەن) سىن بەرىپ شىعىڭىز.
كەيبىر جاڭارتىلعان ۇلگىلەر/سۋرەتتەر:',
	'revreview-update-none' => 'تىياناقتى نۇسقا بەكىتىلگەننەن بەرى جاسالعان وزگەرىستەرگە (تومەندە كورسەتىلگەن) سىن بەرىپ شىعىڭىز.',
	'revreview-visibility' => 'وسى بەتتىڭ [[{{MediaWiki:Validationpage}}|تىياناقتى نۇسقاسى]] بار, بۇل
[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} باپتالاۋى] مۇمكىن.',
	'revreview-revnotfound' => 'بۇل بەتتىڭ سۇرالعان ەسكى تۇزەتۋى تابىلعان جوق. وسى بەت قاتىناۋىنا پايدالانعان URL تەكسەرىپ شىعىڭىز.',
	'stable-logentry' => '[[$1]] ٴۇشىن تىياناقتى نۇسقا باپتالىمى رەتتەلدى',
	'stable-logentry2' => '[[$1]] ٴۇشىن تىياناقتى نۇسقا باپتالىمى قايتا قويىلدى',
	'stable-logpage' => 'تىياناقتى نۇسقا جۋرنالى',
	'stable-logpagetext' => 'بۇل ماعلۇمات بەتتەردەگى [[{{MediaWiki:Validationpage}}|تىياناقتى نۇسقا]] باپتالىمى
وزگەرىستەرىنىڭ جۋرنالى.',
	'tooltip-ca-current' => 'بۇل بەتتىڭ اعىمداعى جوبا جازباسىن قاراۋ',
	'tooltip-ca-stable' => 'بۇل بەتتىڭ تىياناقتى نۇسقاسىن قاراۋ',
	'tooltip-ca-default' => 'ساپا قامسىزداندىرۋدى باپتاۋ',
	'validationpage' => '{{ns:help}}:ماقالا اقتالۋى',
);

/** Kazakh (Cyrillic) (Қазақша (Cyrillic)) */
$messages['kk-cyrl'] = array(
	'editor' => 'Түзетуші',
	'flaggedrevs' => 'Белгіленген нұсқалар',
	'group-editor' => 'Түзетушілер',
	'group-editor-member' => 'түзетуші',
	'group-reviewer' => 'Сын берушілер',
	'group-reviewer-member' => 'сын беруші',
	'grouppage-editor' => '{{ns:project}}:Түзетуші',
	'grouppage-reviewer' => '{{ns:project}}:Сын беруші',
	'hist-quality' => '[сапалынған]',
	'hist-stable' => '[шолынған]',
	'review-diff2stable' => 'Тиянақты мен ағымдық нұсқалар арадағы өзгерістер',
	'review-logentry-app' => '[[$1]] дегенге сын берді',
	'review-logentry-dis' => '[[$1]] дегеннің нұсқасын кемітті',
	'review-logentry-id' => 'нұсқа нөмірі $1',
	'review-logpage' => 'Мақалаға сын беру журналы',
	'review-logpagetext' => 'Бұл мағлұмат беттердегі нұсқаларды [[{{MediaWiki:Validationpage}}|бекіту]] күйі
өзгерістерінің журналы.',
	'reviewer' => 'Сын беруші',
	'revisionreview' => 'Нұсқаларға сын беру',
	'revreview-accuracy' => 'Дәлдігі',
	'revreview-accuracy-0' => 'бекітілмеген',
	'revreview-accuracy-1' => 'шолынған',
	'revreview-accuracy-2' => 'дәлді',
	'revreview-accuracy-3' => 'қайнар келтірілген',
	'revreview-accuracy-4' => 'таңдамалы',
	'revreview-auto' => '(өздіктік)',
	'revreview-auto-w' => "Тиянақты нұсқаны өңдеудесіз, өзгерістердің әрқайсысына '''өздіктік сын беріледі'''.
Сақтаудың алдында бетті қарап шығуыңызға болады.",
	'revreview-auto-w-old' => "Ескі нұсқаны өңдеудесіз, өзгерістердің әрқайсысына '''өздіктік сын беріледі'''.
Сақтаудың алдында бетті қарап шығуыңызға болады.",
	'revreview-basic' => 'Бұл ең соңғы [[{{MediaWiki:Validationpage}}|шолынған]] нұсқа,
<i>$2</i> кезінде [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бекітілген]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Жоба жазбасы]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} өзгертілуі] мүмкін; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|өзгерісі|өзгерісі}}]
сын беруді {{PLURAL:$3|күтуде|күтуде}}.',
	'revreview-changed' => "'''Бұл нұсқада сұраным әрекеті орындалмайды.'''

Үлгі не сурет ерекше нұсқа келтірілмегенде сұраналады. Бұл егер осы бетке сын беруді бастағнда
өзгеретін айналмалыға тәуелді өзгермелі үлгі арқылы басқа суретті не үлгіні ендірген болса болады.
Бетті жаңарту және қайта сын беру бұл мәселені шешу мүмкін.",
	'revreview-current' => 'Жоба жазба',
	'revreview-depth' => 'Кәмілдігі',
	'revreview-depth-0' => 'бекітілмеген',
	'revreview-depth-1' => 'іргелі',
	'revreview-depth-2' => 'орташа',
	'revreview-depth-3' => 'жоғары',
	'revreview-depth-4' => 'таңдамалы',
	'revreview-edit' => 'Жоба жазбаны өңдеу',
	'revreview-flag' => 'Бұл нұсқаға сын беру',
	'revreview-legend' => 'Нұсқа мағлұматына деңгей беру',
	'revreview-log' => 'Мәндемесі:',
	'revreview-main' => 'Сын беру үшін мағлұмат бетінің ерекше нұсқасын бөлектеуіңіз керек.

Сын берілмеген бет тізімі үшін [[{{ns:special}}:Unreviewedpages]] бетін қараңыз.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ең соңғы шолынған нұсқасы]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} барлық тізімі]) <i>$2</i> кезінде [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бекітілді]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|өзгерісіне|өзгерісіне}}] сын беруі {{PLURAL:$3|керек|керек}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ең соңғы сапалы нұсқасы]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} барлығының тізімі]) <i>$2</i> кезінде [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бекітілді].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|өзгерісіне|өзгерісіне}}] сын беруі {{PLURAL:$3|керек|керек}}.',
	'revreview-noflagged' => "Бұл беттің сын берілген нұсқалары мында жоқ, сондықтан бұның сапасы
'''[[{{MediaWiki:Validationpage}}|тексерілмеген]]''' болуы мүмкін.",
	'revreview-note' => '[[{{ns:user}}:$1]] бұл нұсқаға  [[{{MediaWiki:Validationpage}}|сын бергенде]] келесі аңғартулар жасады:',
	'revreview-notes' => 'Көрсетілетін пікірлер мен аңғартпалар:',
	'revreview-oldrating' => 'Бұл мына баға алды:',
	'revreview-patrolled' => '[[:$1|$1]] дегеннің бөлектелінген нұсқасы күзетте деп белгіленді.',
	'revreview-quality' => 'Бұл ең соңғы [[{{MediaWiki:Validationpage}}|сапалы]] нұсқа,
<i>$2</i> кезінде [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бекітілген]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Жоба жазбасы]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} өзгертілуі] мүмкін; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|өзгерісі|өзгерісі}}]
сын беруді {{PLURAL:$3|күтуде|күтуде}}.',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Шолынған]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} жоба жазбасын қарау]]",
	'revreview-quick-none' => "'''Ағымдық''' (cын берілген нұсқалар жоқ)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Сапалы]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} жоба жазбасын қарау]]",
	'revreview-quick-see-basic' => "'''Жоба жазба''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} тиянақты мақаланы қарау]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|өзгеріс|өзгеріс}}])",
	'revreview-quick-see-quality' => "'''Жоба жазба''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} тиянақты мақаланы қарау]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|өзгеріс|өзгеріс}}])",
	'revreview-selected' => "'''$1:''' дегеннің бөлектелінген нұсқасы",
	'revreview-source' => 'жоба жазбалы қайнар',
	'revreview-stable' => 'Тиянақты',
	'revreview-style' => 'Оқымдылығы',
	'revreview-style-0' => 'бекітілмеген',
	'revreview-style-1' => 'тиімді',
	'revreview-style-2' => 'жақсы',
	'revreview-style-3' => 'тартымды',
	'revreview-style-4' => 'таңдамалы',
	'revreview-submit' => 'Сын жіберу',
	'revreview-text' => 'Тиянақты нұсқалар ең жаңа нұсқасынан гөрі бет көрінісіндегі әдепкі мағлұмат деп тапсырылады.',
	'revreview-toolow' => 'Нұсқаға сын берілген деп саналуы үшін төмендегі қасиеттердің қай-қайсысын «бекітілмеген»
дегеннен жоғары деңгей беруіңіз керек. Нұсқаны кеміту үшін, барлық өрістерді «бекітілмеген» деп тапсырылсын.',
	'revreview-update' => 'Тиянақты нұсқа бекітілгеннен бері жасалған өзгерістерге (төменде көрсетілген) сын беріп шығыңыз.
Кейбір жаңартылған үлгілер/суреттер:',
	'revreview-update-none' => 'Тиянақты нұсқа бекітілгеннен бері жасалған өзгерістерге (төменде көрсетілген) сын беріп шығыңыз.',
	'revreview-visibility' => 'Осы беттің [[{{MediaWiki:Validationpage}}|тиянақты нұсқасы]] бар, бұл
[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} бапталауы] мүмкін.',
	'revreview-revnotfound' => 'Бұл беттің сұралған ескі түзетуі табылған жоқ. Осы бет қатынауына пайдаланған URL тексеріп шығыңыз.',
	'stable-logentry' => '[[$1]] үшін тиянақты нұсқа бапталымы реттелді',
	'stable-logentry2' => '[[$1]] үшін тиянақты нұсқа бапталымы қайта қойылды',
	'stable-logpage' => 'Тиянақты нұсқа журналы',
	'stable-logpagetext' => 'Бұл мағлұмат беттердегі [[{{MediaWiki:Validationpage}}|тиянақты нұсқа]] бапталымы
өзгерістерінің журналы.',
	'tooltip-ca-current' => 'Бұл беттің ағымдағы жоба жазбасын қарау',
	'tooltip-ca-stable' => 'Бұл беттің тиянақты нұсқасын қарау',
	'tooltip-ca-default' => 'Сапа қамсыздандыруды баптау',
	'validationpage' => '{{ns:help}}:Мақала ақталуы',
);

/** Kazakh (Latin) (Қазақша (Latin)) */
$messages['kk-latn'] = array(
	'editor' => 'Tüzetwşi',
	'flaggedrevs' => 'Belgilengen nusqalar',
	'group-editor' => 'Tüzetwşiler',
	'group-editor-member' => 'tüzetwşi',
	'group-reviewer' => 'Sın berwşiler',
	'group-reviewer-member' => 'sın berwşi',
	'grouppage-editor' => '{{ns:project}}:Tüzetwşi',
	'grouppage-reviewer' => '{{ns:project}}:Sın berwşi',
	'hist-quality' => '[sapalınğan]',
	'hist-stable' => '[şolınğan]',
	'review-diff2stable' => 'Tïyanaqtı men ağımdıq nusqalar aradağı özgerister',
	'review-logentry-app' => '[[$1]] degenge sın berdi',
	'review-logentry-dis' => '[[$1]] degenniñ nusqasın kemitti',
	'review-logentry-id' => 'nusqa nömiri $1',
	'review-logpage' => 'Maqalağa sın berw jwrnalı',
	'review-logpagetext' => 'Bul mağlumat betterdegi nusqalardı [[{{MediaWiki:Validationpage}}|bekitw]] küýi
özgeristeriniñ jwrnalı.',
	'reviewer' => 'Sın berwşi',
	'revisionreview' => 'Nusqalarğa sın berw',
	'revreview-accuracy' => 'Däldigi',
	'revreview-accuracy-0' => 'bekitilmegen',
	'revreview-accuracy-1' => 'şolınğan',
	'revreview-accuracy-2' => 'däldi',
	'revreview-accuracy-3' => 'qaýnar keltirilgen',
	'revreview-accuracy-4' => 'tañdamalı',
	'revreview-auto' => '(özdiktik)',
	'revreview-auto-w' => "Tïyanaqtı nusqanı öñdewdesiz, özgeristerdiñ ärqaýsısına '''özdiktik sın beriledi'''.
Saqtawdıñ aldında betti qarap şığwıñızğa boladı.",
	'revreview-auto-w-old' => "Eski nusqanı öñdewdesiz, özgeristerdiñ ärqaýsısına '''özdiktik sın beriledi'''.
Saqtawdıñ aldında betti qarap şığwıñızğa boladı.",
	'revreview-basic' => 'Bul eñ soñğı [[{{MediaWiki:Validationpage}}|şolınğan]] nusqa,
<i>$2</i> kezinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} bekitilgen]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Joba jazbası]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} özgertilwi] mümkin; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|özgerisi|özgerisi}}]
sın berwdi {{PLURAL:$3|kütwde|kütwde}}.',
	'revreview-changed' => "'''Bul nusqada suranım äreketi orındalmaýdı.'''

Ülgi ne swret erekşe nusqa keltirilmegende suranaladı. Bul eger osı betke sın berwdi bastağnda
özgeretin aýnalmalığa täweldi özgermeli ülgi arqılı basqa swretti ne ülgini endirgen bolsa boladı.
Betti jañartw jäne qaýta sın berw bul mäseleni şeşw mümkin.",
	'revreview-current' => 'Joba jazba',
	'revreview-depth' => 'Kämildigi',
	'revreview-depth-0' => 'bekitilmegen',
	'revreview-depth-1' => 'irgeli',
	'revreview-depth-2' => 'ortaşa',
	'revreview-depth-3' => 'joğarı',
	'revreview-depth-4' => 'tañdamalı',
	'revreview-edit' => 'Joba jazbanı öñdew',
	'revreview-flag' => 'Bul nusqağa sın berw',
	'revreview-legend' => 'Nusqa mağlumatına deñgeý berw',
	'revreview-log' => 'Mändemesi:',
	'revreview-main' => 'Sın berw üşin mağlumat betiniñ erekşe nusqasın bölektewiñiz kerek.

Sın berilmegen bet tizimi üşin [[{{ns:special}}:Unreviewedpages]] betin qarañız.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Eñ soñğı şolınğan nusqası]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} barlıq tizimi]) <i>$2</i> kezinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} bekitildi]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|özgerisine|özgerisine}}] sın berwi {{PLURAL:$3|kerek|kerek}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Eñ soñğı sapalı nusqası]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} barlığınıñ tizimi]) <i>$2</i> kezinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} bekitildi].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|özgerisine|özgerisine}}] sın berwi {{PLURAL:$3|kerek|kerek}}.',
	'revreview-noflagged' => "Bul bettiñ sın berilgen nusqaları mında joq, sondıqtan bunıñ sapası
'''[[{{MediaWiki:Validationpage}}|tekserilmegen]]''' bolwı mümkin.",
	'revreview-note' => '[[{{ns:user}}:$1]] bul nusqağa  [[{{MediaWiki:Validationpage}}|sın bergende]] kelesi añğartwlar jasadı:',
	'revreview-notes' => 'Körsetiletin pikirler men añğartpalar:',
	'revreview-oldrating' => 'Bul mına bağa aldı:',
	'revreview-patrolled' => '[[:$1|$1]] degenniñ bölektelingen nusqası küzette dep belgilendi.',
	'revreview-quality' => 'Bul eñ soñğı [[{{MediaWiki:Validationpage}}|sapalı]] nusqa,
<i>$2</i> kezinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} bekitilgen]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Joba jazbası]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} özgertilwi] mümkin; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|özgerisi|özgerisi}}]
sın berwdi {{PLURAL:$3|kütwde|kütwde}}.',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Şolınğan]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} joba jazbasın qaraw]]",
	'revreview-quick-none' => "'''Ağımdıq''' (cın berilgen nusqalar joq)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Sapalı]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} joba jazbasın qaraw]]",
	'revreview-quick-see-basic' => "'''Joba jazba''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} tïyanaqtı maqalanı qaraw]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|özgeris|özgeris}}])",
	'revreview-quick-see-quality' => "'''Joba jazba''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} tïyanaqtı maqalanı qaraw]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|özgeris|özgeris}}])",
	'revreview-selected' => "'''$1:''' degenniñ bölektelingen nusqası",
	'revreview-source' => 'joba jazbalı qaýnar',
	'revreview-stable' => 'Tïyanaqtı',
	'revreview-style' => 'Oqımdılığı',
	'revreview-style-0' => 'bekitilmegen',
	'revreview-style-1' => 'tïimdi',
	'revreview-style-2' => 'jaqsı',
	'revreview-style-3' => 'tartımdı',
	'revreview-style-4' => 'tañdamalı',
	'revreview-submit' => 'Sın jiberw',
	'revreview-text' => 'Tïyanaqtı nusqalar eñ jaña nusqasınan göri bet körinisindegi ädepki mağlumat dep tapsırıladı.',
	'revreview-toolow' => 'Nusqağa sın berilgen dep sanalwı üşin tömendegi qasïetterdiñ qaý-qaýsısın «bekitilmegen»
degennen joğarı deñgeý berwiñiz kerek. Nusqanı kemitw üşin, barlıq öristerdi «bekitilmegen» dep tapsırılsın.',
	'revreview-update' => 'Tïyanaqtı nusqa bekitilgennen beri jasalğan özgeristerge (tömende körsetilgen) sın berip şığıñız.
Keýbir jañartılğan ülgiler/swretter:',
	'revreview-update-none' => 'Tïyanaqtı nusqa bekitilgennen beri jasalğan özgeristerge (tömende körsetilgen) sın berip şığıñız.',
	'revreview-visibility' => 'Osı bettiñ [[{{MediaWiki:Validationpage}}|tïyanaqtı nusqası]] bar, bul
[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} baptalawı] mümkin.',
	'revreview-revnotfound' => 'Bul bettiñ suralğan eski tüzetwi tabılğan joq. Osı bet qatınawına paýdalanğan URL tekserip şığıñız.',
	'stable-logentry' => '[[$1]] üşin tïyanaqtı nusqa baptalımı retteldi',
	'stable-logentry2' => '[[$1]] üşin tïyanaqtı nusqa baptalımı qaýta qoýıldı',
	'stable-logpage' => 'Tïyanaqtı nusqa jwrnalı',
	'stable-logpagetext' => 'Bul mağlumat betterdegi [[{{MediaWiki:Validationpage}}|tïyanaqtı nusqa]] baptalımı
özgeristeriniñ jwrnalı.',
	'tooltip-ca-current' => 'Bul bettiñ ağımdağı joba jazbasın qaraw',
	'tooltip-ca-stable' => 'Bul bettiñ tïyanaqtı nusqasın qaraw',
	'tooltip-ca-default' => 'Sapa qamsızdandırwdı baptaw',
	'validationpage' => '{{ns:help}}:Maqala aqtalwı',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author Thearith
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'editor' => 'អ្នកកែសម្រួល',
	'group-editor' => 'អ្នកកែសម្រួល',
	'group-editor-member' => 'អ្នកកែសម្រួល',
	'group-reviewer' => 'អ្នកត្រួតពិនិត្យឡើងវិញ',
	'group-reviewer-member' => 'អ្នកត្រួតពិនិត្យឡើងវិញ',
	'grouppage-editor' => '{{ns:project}}:អ្នកកែសម្រួល',
	'grouppage-reviewer' => '{{ns:project}}:អ្នកត្រួតពិនិត្យឡើងវិញ',
	'reviewer' => 'អ្នកត្រួតពិនិត្យឡើងវិញ',
	'revreview-auto' => '(ស្វ័យប្រវត្តិ)',
	'revreview-current' => 'សេចក្តីព្រាង',
	'revreview-depth' => 'ជ្រៅ',
	'revreview-depth-1' => 'មូលដ្ឋាន',
	'revreview-depth-2' => 'កណ្ដាល',
	'revreview-depth-3' => 'ខ្ពស់',
	'revreview-depth-4' => 'ពិសេស',
	'revreview-draft-title' => 'ទំព័រ​ព្រាង',
	'revreview-edit' => 'កែប្រែសេចក្តីពង្រាង',
	'revreview-log' => 'យោបល់៖',
	'revreview-patrol-title' => 'សម្គាល់ថាបានតាមដាន',
	'revreview-source' => 'ប្រភពសេចក្តីព្រាង',
	'revreview-style-1' => 'អាចទទួលយកបាន',
	'revreview-style-2' => 'ល្អ',
	'revreview-submit' => 'ដាក់ស្នើ',
	'revreview-submitting' => 'កំពុង​ដាក់ស្នើ...',
	'revreview-toggle-title' => 'បង្ហាញ/លាក់ ព័ត៌មានលំអិត',
	'revreview-update-includes' => "'''ទំព័រគំរូ/រូបភាពមួយចំនួនត្រូវបានបន្ទាន់សម័យរួចហើយ៖'''",
	'revreview-revnotfound' => 'កំណែប្រែចាស់របស់ទំព័រដែលអ្នកស្វែងរកមិនមានទេ។ ចូរពិនិត្យURLដែលអ្នកធ្លាប់ដំណើរការទំព័រនេះ។',
	'revreview-filter-all' => 'ទាំងអស់',
	'revreview-filter-auto' => 'ដោយស្វ័យប្រវត្តិ',
	'revreview-statusfilter' => 'បំលាស់ប្ដូរ​ស្ថានភាព:',
	'revreview-typefilter' => 'ប្រភេទ:',
	'revreview-reviewlink' => 'ពិនិត្យឡើងវិញ',
	'tooltip-ca-current' => 'មើលសេចក្តីព្រាងបច្ចុប្បន្ន​នៃទំព័រនេះ',
	'log-show-hide-review' => '$1 កំណត់ហេតុ​នៃ​ការ​ពិនិត្យឡើងវិញ',
	'revreview-tt-review' => 'ពិនិត្យ​ទំព័រ​នេះ​ឡើងវិញ',
	'validationpage' => '{{ns:help}}: សុពលកម្ម​ទំព័រ',
);

/** Kannada (ಕನ್ನಡ)
 * @author Shushruth
 */
$messages['kn'] = array(
	'revreview-revnotfound' => 'ನೀವು ಕೋರಿದ ಪುಟದ ಹಳೆ ಆವೃತ್ತಿ ಸಿಗಲಿಲ್ಲ. ದಯವಿಟ್ಟು ಈ ಪುಟವನ್ನು ತಲುಪಲು ಉಪಯೋಗಿಸಿದ URL ಅನ್ನು ಒಮ್ಮೆ ಪರೀಕ್ಷಿಸಿ.',
);

/** Korean (한국어)
 * @author Gapo
 * @author Klutzy
 * @author Kwj2772
 * @author Yknok29
 */
$messages['ko'] = array(
	'editor' => '편집자',
	'flaggedrevs-prefs-watch' => '내가 검토한 문서를 주시문서 목록에 추가',
	'group-editor' => '편집자',
	'group-editor-member' => '편집자',
	'group-reviewer' => '평론가',
	'group-reviewer-member' => '평론가',
	'grouppage-editor' => '{{ns:project}}:편집자',
	'hist-draft' => '초안 버전',
	'hist-stable' => '검토된 판',
	'hist-stable-user' => '[[User:$3|$3]]에 의해 [{{fullurl:$1|stableid=$2}} 검토됨]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} 자동적으로 검토됨]',
	'review-logentry-app' => '[[$1]] 문서의 $2판을 검토함',
	'review-logentry-id' => '보기',
	'review-logentry-diff' => '안정 버전과의 차이',
	'reviewer' => '평론가',
	'revisionreview' => '편집들을 검토하기',
	'revreview-accuracy' => '정확성',
	'revreview-accuracy-2' => '정확함',
	'revreview-accuracy-3' => '출처가 잘 제시됨',
	'revreview-auto' => '(자동)',
	'revreview-auto-w' => "당신은 안정 버전을 편집하고 있습니다; 편집은 '''자동적으로 검토될 것입니다'''.",
	'revreview-auto-w-old' => "당신은 검토된 판을 편집하고 있습니다; 편집은 '''자동적으로 검토될 것입니다'''.",
	'revreview-current' => '초안',
	'revreview-depth' => '깊이',
	'revreview-depth-1' => '기초적임',
	'revreview-depth-2' => '중간',
	'revreview-depth-3' => '좋음',
	'revreview-depth-4' => '알참',
	'revreview-draft-title' => '초안 문서',
	'revreview-edit' => '초안 편집',
	'revreview-flag' => '이 판을 검토하기',
	'revreview-log' => '의견:',
	'revreview-newest-basic' => '이 문서는 <i>$2</i>에 마지막으로 [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 검토]되었습니다. ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 검토된 모든 편집의 목록])
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3개의 편집]이 검토를 기다리고 있습니다.',
	'revreview-patrol' => '이 편집을 검토된 것으로 표시',
	'revreview-patrol-title' => '검토된 것으로 표시',
	'revreview-patrolled' => '[[:$1|$1]] 문서의 선택된 버전이 검토된 것으로 표시되었습니다.',
	'revreview-quick-invalid' => "'''판 번호가 잘못되었습니다.'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|현재 판]]''' (검토되지 않음)",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|초안]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 문서 보기]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 비교])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|초안]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 문서 보기]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 비교])",
	'revreview-selected' => "'''$1:'''의 선택된 판",
	'revreview-stable' => '안정 문서',
	'revreview-style' => '가독성',
	'revreview-style-2' => '좋음',
	'revreview-style-3' => '명확함',
	'revreview-submit' => '보내기',
	'revreview-submitting' => '보내는 중...',
	'revreview-finished' => '검토 완료!',
	'revreview-successful' => "'''[[:$1|$1]] 문서의 편집이 성공적으로 검토되었습니다. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} 안정 버전 보기])'''",
	'revreview-toggle-title' => '자세한 내용 보기/숨기기',
	'revreview-update-includes' => "'''일부 틀이나 그림이 수정되었습니다:'''",
	'revreview-revnotfound' => '문서의 해당 버전을 찾지 못했습니다. 접속 URL을 확인해 주세요.',
	'right-autoreview' => '자신의 편집을 자동적으로 검토',
	'right-movestable' => '안정 문서를 옮기기',
	'right-review' => '다른 사람의 편집을 검토',
	'right-stablesettings' => '어떻게 안정 버전이 선택되어 보여질 것인지 설정',
	'rights-editor-autosum' => '자동으로 권한이 부여됨',
	'rights-editor-revoke' => '[[$1]]의 편집자 권한을 해제함',
	'stable-logentry' => '[[$1]] 문서의 안정 버전을 설정함',
	'stable-logentry2' => '[[$1]]의 안정 버전 설정을 초기화함',
	'revreview-filter-all' => '모두',
	'revreview-filter-approved' => '승인됨',
	'revreview-filter-unapproved' => '재승인됨',
	'revreview-filter-auto' => '자동',
	'revreview-filter-manual' => '수동',
	'revreview-statusfilter' => '상태 변화:',
	'revreview-typefilter' => '유형:',
	'revreview-reviewlink' => '검토',
	'revreview-unlocked-title' => '이 문서에 보여지기 전에 편집은 검토를 필요로 하지 않습니다!',
	'revreview-unlocked' => '이 문서에 보여지기 전에 편집은 검토를 필요로 하지 않습니다!',
	'revreview-tt-review' => '이 문서를 검토',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'editor' => 'Redaktör för et Sichte',
	'flaggedrevs' => 'Beschtähteschte Versione',
	'flaggedrevs-backlog' => "Mer han em jraad ene Shtau en de [[Special:OldReviewedPages|Schlang met de Änderunge aan de Sigge]] för zem Nohkike. '''Ding Hülp weedt jebruch!'''",
	'flaggedrevs-watched-pending' => "Mer han jraad [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} noch nit nohjekik Änderunge] aan Sigge op Ding Oppassleß, wohvun ällder Versione ald nohjekik wohre. '''Ding Hülp weedt jebruch!'''",
	'flaggedrevs-desc' => 'Määt et för de Metmaacher müjjelesch, de Versijone fun Sigge ze övverpröfe un dat faßzehallde, un domet dänne ier Qualität beshtändesch ze hallde.',
	'flaggedrevs-pref-UI' => 'Bedeen-Ovverfläsch:',
	'flaggedrevs-pref-UI-0' => 'Nemm de Bedeen-Ovverfläsch met ville Einzelheite för de beshtändeje Versione ze verwallde',
	'flaggedrevs-pref-UI-1' => 'Nemm de eijfach Bedeen-Ovverfläsch för de beshtändeje Versione ze verwallde',
	'prefs-flaggedrevs' => 'Beschtähteschte Versione',
	'flaggedrevs-prefs-stable' => 'Donn emmer shtanndatmääßesch de aktoälle {{int:stablepages-stable}} aanzeije, wann ein doh es.',
	'flaggedrevs-prefs-watch' => 'Dun ming selfs nohjekik Sigge automatisch för ming Oppassliss vürschlage',
	'flaggedrevs-prefs-editdiffs' => 'Zeisch der Ongerscheid zo de {{int:stablepages-stable}} beim Sigge Ändere',
	'group-editor' => 'Redaktöre för et Sichte',
	'group-editor-member' => '{{int:editor}}',
	'group-reviewer' => 'Redaktöre för et Pröfe',
	'group-reviewer-member' => '{{int:reviewer}}',
	'grouppage-editor' => '{{ns:project}}:{{int:group-editor-member}}',
	'grouppage-reviewer' => '{{ns:project}}:{{int:group-reviewer-member}}',
	'group-autoreview' => '{{ns:project}}:{{int:group-autoreview-member}}',
	'group-autoreview-member' => 'Automattesch Nohkiker',
	'grouppage-autoreview' => '{{ns:project}}:{{int:group-autoreview-member}}',
	'hist-draft' => 'Äntworf',
	'hist-quality' => '{{lcfirst:{{int:revreview-lev-quality}}}}',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} beschtäätesch] {{GENDER:$3|vum|vum|vum Metmaacher|vum|vun dä}} [[User:$3|$3]]',
	'hist-stable' => '{{lcfirst:{{int:revreview-accuracy-1}}}} Version',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} {{lcfirst:{{int:revreview-accuracy-1}}}}] {{GENDER:$3|vum|vum|vum Metmaacher|vum|vun dä}} [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automattesch {{lcfirst:{{int:revreview-accuracy-1}}}}]',
	'review-diff2stable' => 'Donn der Ongerscheid zwesche dä aktoälle {{int:stablepages-stable}} un dä aktoälle Version belooere',
	'review-logentry-app' => 'hät de Version r$2 vun dä Sigg [[$1]] nohjekik',
	'review-logentry-dis' => 'hät de Version $2 vun dä Sigg „[[$1]]“ zeröckjeshtoof',
	'review-logentry-id' => 'beloore',
	'review-logentry-diff' => 'Der Ungerscheid zor {{int:stablepages-stable}}',
	'review-logpage' => 'Logboch vum Versione Nohkike',
	'review-logpagetext' => 'Dat heh es et Logboch vun de Änderunge aam
[[{{MediaWiki:Validationpage}}|Beschäätejungs]]zohshtand för Sigge vum Wiki singem Ennhalldt.
Op dä [[Special:ReviewedPages|Leß met de nohjekik Sigge]] fengkß De de {{lcfirst:{{int:revreview-approved}}}}te Sigge och.',
	'reviewer' => 'Redaktör för et Pröfe',
	'revisionreview' => 'Versione nohkike',
	'revreview-accuracy' => 'Jenouischkeit',
	'revreview-accuracy-0' => 'nit frei jejovve',
	'revreview-accuracy-1' => 'Jesich',
	'revreview-accuracy-2' => 'Akeraat, Enhallt jeprööf',
	'revreview-accuracy-3' => 'Quelle jeprööf',
	'revreview-accuracy-4' => 'Exzelänt',
	'revreview-approved' => 'Beshtäätesch',
	'revreview-auto' => '(automattesch)',
	'revreview-auto-w' => 'Do bes de {{int:stablepages-stable}} vun dä Sigg aam Ändere, Ding Änderunge wääde automattesch op nohjekik jesaz.',
	'revreview-auto-w-old' => 'Do bes en nohjekik Version vun dä Sigg aam Ändere, Ding Änderunge wääde automattesch op nohjekik jesaz.',
	'revreview-basic' => 'Dat es de neuste [[{{MediaWiki:Validationpage}}|{{int:revreview-lev-sighted}}]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|Ein Änderung|Noch $3 Änderunge|Kein Änderung}}] aan hee däm [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Äntworf] {{PLURAL:$3|shteiht noch|shtonn|shteiht mieh}} zom Nohjekik wääde aan.',
	'revreview-basic-i' => 'Dat es de neuste [[{{MediaWiki:Validationpage}}|{{int:revreview-lev-sighted}}]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.
Et shtonn_er noch Änderunge aan
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} <!-- {{PLURAL:$ 3|Ein Änderung|Noch $ 3 Änderunge|Kein Änderung}} {{PLURAL:$ 3|shteiht noch|shtonn|shteiht mieh}} --> Schabloone udder Datteije] för et Nohjekik Wääde aan, di en heh däm [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Äntworf] enjebonge sin.',
	'revreview-basic-old' => 'Dat hee es en [[{{MediaWiki:Validationpage}}|{{int:revreview-lev-sighted}}]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} alle oplesßte]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.
Es müjjelesch, et künnt noch [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} neuer Änderunge] jevve.',
	'revreview-basic-same' => 'Dat hee es de neuste [[{{MediaWiki:Validationpage}}|{{int:revreview-lev-sighted}}]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} Alle opleßte]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.',
	'revreview-basic-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} {{int:revreview-lev-sighted}}] vun hee dä Sigg, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>, boud op hee di Version op.',
	'revreview-blocked' => 'Do kanns hee di Version nit nohkike, weil Dinge Zohjang hee jraad jeshpert es. De kann Der de [$1 Einzelheite beloore].',
	'revreview-changed' => "''De jewönschte Akßuhn es nit müjjelesch för hee di Version vun dä Sigg [[:$1|$1]].'''

En Datei udder Schablohn weed aanjefrooch woode sin, oohne dat en Version aanjejovve wohr.
Dat kann passeeere, wann en Schablohn en ander Schablohn udder en Dattei enbengk, di vun enem Parrameeter afhange deiht, dä jeändert woohdt, zigg dämm De di Sigg hee nohzekike aanjefange haz.
En Löhsung för dat Problehm künnt sinn, di Sigg neu ze laade un norr_ens vun füre nohzekike.",
	'revreview-current' => 'Äntworf',
	'revreview-depth' => 'Deefjang',
	'revreview-depth-0' => 'Nit {{lcfirst:{{int:revreview-approved}}}}',
	'revreview-depth-1' => 'Jrondlääje',
	'revreview-depth-2' => 'Meddelmääßesch',
	'revreview-depth-3' => 'Huh',
	'revreview-depth-4' => 'Exzälänt',
	'revreview-draft-title' => 'Äntworfs_Sigg',
	'revreview-edit' => 'Dä Äntworf verändere',
	'revreview-editnotice' => "'''De Änderunge aan heh dä Sigg kumme bei de [[{{MediaWiki:Validationpage}}|beshtändeje Versione]], wann ene Metmaacher met dämm Rääsch dohzoh se nohkik un dohför {{lcfirst:{{int:revreview-approved}}}}.'''",
	'revreview-flag' => 'Donn hee di Version nohkike!',
	'revreview-edited' => "'''Änderunge wähde en de [[{{MediaWiki:Validationpage}}|aktoälle beshtändeje Versione]] opjenumme, esu bald wi ene Metmaacher met däm Rääsch dohzoh se nohkik un doför {{lcfirst:{{int:revreview-approved}}}}.'''
Unge es '''dä ''Äntworf''''' ze sinn. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|Ein Änderung shteiht|$2 Änderunge shtonn|Kein Änderung shteiht mieh}}] zom Nohkike aan.",
	'revreview-invalid' => "Dat es e '''onjöltesch Ziihl:''' kei [[{{MediaWiki:Validationpage}}|nohjekik]] Version paß met dä aanjejovve Kännong zesamme.",
	'revreview-legend' => 'Noote för der Ennhalt jävve',
	'revreview-log' => 'Koot zosamme jefaß:',
	'revreview-main' => 'Do moß en beschtemmpte Version vun en Enhalts_Sigg ußsöhke, öm se ze
nohzekike.

Looer noh de [[Special:Unreviewedpages|Leß met de nit nohjekikte Sigge]].',
	'revreview-newest-basic' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} neuste {{int:revreview-lev-sighted}}] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} All opleßte]) wood [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>. {{PLURAL:$3|||Et es}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|Ein Änderung|$3 Änderunge|keij Änderung}}] {{PLURAL:$3|es|sin noch|}} op et Nohkike am waade.',
	'revreview-newest-basic-i' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} neuste {{int:revreview-lev-sighted}}] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} All opleßte]) wood [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.
Et sinn_er noch [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderunge aan enjebonge Schablohne, Datteije, udder beeds] drop am waade, dat se nohjekik wääde.',
	'revreview-newest-quality' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} neuste quality Version] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} All opleßte]) wood [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>. {{PLURAL:$3|||Et es ävver}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|Ein Änderung|$3 Änderunge|keij Änderung}}] {{PLURAL:$3|es|sin|}} op et Nohkike am waade.',
	'revreview-newest-quality-i' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} neuste {{int:revreview-lev-quality}}] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} all opleßte]) wood [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderunge aan enjebonge Schablohne udder Datteije udder beeds] sin op et Nohkike am waade.',
	'revreview-noflagged' => "Mer han kei nohjekik Versione vun hee dä Sigg, dröm künnt dä ier Qualliteit och '''nit''' [[{{MediaWiki:Validationpage}}|nohjeprööf]] sin.",
	'revreview-note' => '{{GENDER:$1|Dä|Et|Dä Metmaacher|Dat|De}} [[User:$1|$1]] hät [[{{MediaWiki:Validationpage}}|bemm Nohkike]] heh di Notiz övver heh di Version faßjehallde:',
	'revreview-notes' => 'Notiz för zem Zeije:',
	'revreview-oldrating' => 'Se wohr enjeshtoof als:',
	'revreview-patrol' => 'Donn hee di Änderung als „nohjeloort“ makeere',
	'revreview-patrol-title' => 'Als „nohjeloort“ makeere',
	'revreview-patrolled' => 'De ußjewählte Version vun dä Sigg „[[:$1|$1]]“ es als „nohjeloort“ makeet.',
	'revreview-quality' => 'Dat es de neuste  [[{{MediaWiki:Validationpage}}|{{int:revreview-lev-quality}}]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Dä aktoälle Äntworf] hät [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|ein Änderung|$3  Änderunge |keij Änderung}}] op et Nohkike am waade.',
	'revreview-quality-i' => 'Dat es de neuste [[{{MediaWiki:Validationpage}}|{{int:revreview-lev-quality}}]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}}, {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.
Dä [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} aktoälle Äntworf] hät [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderunge aan enjebonge Schablohne, Datteije, udder beeds], di op et Nohkike aam waade sin.',
	'revreview-quality-old' => 'Dat hee es en [[{{MediaWiki:Validationpage}}|{{int:revreview-lev-quality}}]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} All opleßte]), un wood [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.
Et sinn_er [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} neu Änderunge] drahn jemaat woode.',
	'revreview-quality-same' => 'Dat hee es de neuste [[{{MediaWiki:Validationpage}}|{{int:revreview-lev-quality}}]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} all opleßte]) Se wood [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>.',
	'revreview-quality-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} {{int:revreview-lev-quality}}] vun dää Sigg wood [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] aam <i>$2</i>, se bout op heh di Version op.',
	'revreview-quality-title' => 'Jeprööfte Qualliteitß-Sigg',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|{{int:revreview-stable-title}}]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Donn dä aktoälle Äntworf beloore]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|{{int:revreview-stable-title}}]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Donn dä aktoälle Äntworf belooere]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|{{int:revreview-stable-title}}]]'''",
	'revreview-quick-invalid' => "'''Onjöltijje Versions-Nommer'''",
	'revreview-quick-none' => "De '''[[{{MediaWiki:Validationpage}}|Aktoälle Version]]''' (nit nohjekik)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|{{int:revreview-quality-title}}]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Donn dä aktoälle Äntworf aanloore]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|{{int:revreview-quality-title}}]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Donn dä aktoälle Äntworf aanloore]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|{{int:revreview-quality-title}}]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Äntworf]]''' [Donn de [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Sigg beloore]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} verjliische])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Äntworf]]''' [Donn de [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Sigg belooere]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} verjliische])",
	'revreview-selected' => "De ußjesoohte Version vun '''$1:'''",
	'revreview-source' => 'Quelltäx för ene Äntworf',
	'revreview-stable' => 'Beshtändeje Version vun dä Sigg',
	'revreview-stable-title' => '{{ucfirst:{{int:revreview-accuracy-1}}}} Sigg',
	'revreview-stable1' => 'Velleisch wells De joh [{{fullurl:$1|stableid=$2}} heh di nohjekik Version] aankike un looere of se jez de [{{fullurl:$1|stable=1}} aktoälle {{int:stablepages-stable}}] vun dä Sigg es?',
	'revreview-stable2' => 'Velleisch wells De joh de [{{fullurl:$1|stableid=1}} {{int:stablepages-stable}}] aankike, wann noch ein doh es?',
	'revreview-style' => 'Lässbaakeit',
	'revreview-style-0' => 'nit {{lcfirst:{{int:revreview-approved}}}}',
	'revreview-style-1' => 'kammer bruche',
	'revreview-style-2' => 'joot',
	'revreview-style-3' => 'jenou',
	'revreview-style-4' => 'exzälänt',
	'revreview-submit' => 'Lohß Jonn!',
	'revreview-submitting' => 'Am Övverdraare&nbsp;…',
	'revreview-finished' => 'Fäädesch nohjekik!',
	'revreview-failed' => 'Et Nohkike es donävve jejange!',
	'revreview-successful' => "'''Di Version vun dä Sigg „[[:$1|$1]]“ es jäz {{lcfirst:{{int:revreview-approved}}}}. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} De {{int:stablepages-stable}} aanloore])'''",
	'revreview-successful2' => "'''Di Version vun dä Sigg „[[:$1|$1]]“ es jäz wider zeröck jeshtoof.'''",
	'revreview-text' => "''Nit de neuste Version is dat, wat shtanndatmääßesch för der Lesser aanjezeisch weedt, söndern de aktoälle [[{{MediaWiki:Validationpage}}|{{int:stablepages-stable}}]].''",
	'revreview-text2' => "''De [[{{MediaWiki:Validationpage}}|beshtändeje Versione]] vun Sigge han en beshtemmpte jeprööfte Qualliteit, di för en Sigg enjeshtallt wood, domet se shtanndatmääßesch för der Lesser aanjezeisch weedt.''",
	'revreview-toggle' => '(Ändere)',
	'revreview-toggle-title' => 'Eijnzelheijte aanzeije udder vershteische',
	'revreview-toolow' => 'Do moß för jeede vun dä Eijeschaffte unge en Not udder Präddikaat jävve, wat bäßer wi „{{lcfirst:{{int:revreview-style-0}}}}“ es, domet di Version als nohjekik jeldt. Öm en Version widder zeröckzeshtoofe, donn alle Präddikaate op „{{lcfirst:{{int:revreview-style-0}}}}“ säze.',
	'revreview-update' => "Bes esu joot, un donn all de Änderunge ''(unge sin se opjeliß)'' [[{{MediaWiki:Validationpage}}|nohkike]], di jemaat woodte, zick däm de {{int:stablepages-stable}} et letz [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] woode es.<br />
'''E paa Schablohne, Datteije, udder beeds, sin jeändert woode:'''",
	'revreview-update-includes' => "'''E paa Schabloone udder Dateije udder beeds sin jeändert woode:'''",
	'revreview-update-none' => "Bes esu joot, un donn all de Änderunge [[{{MediaWiki:Validationpage}}|nohkike]], di jemaat woodte, zick de {{int:stablepages-stable}} et letz [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} {{lcfirst:{{int:revreview-approved}}}}] woode es.<br />''(De Änderunge sin unge opjeliß)''",
	'revreview-update-use' => "'''Opjepaß:''' Wann ein vun dä Schablohne udder Datteije en {{int:stablepages-stable}} hät, dann weedt di ald en dä {{int:stablepages-stable}} vun dä Sigg jebruch.",
	'revreview-diffonly' => "Öm heh di Sigg nohzekike, jank övver dä Lengk „{{int:Currentrevisionlink}}“, doh fengks och dä Kaste mem Fommulaa för dat enzejävve, wat de jefonge häs.''",
	'revreview-visibility' => "'''Hee di Sigg hät en jeänderte [[{{MediaWiki:Validationpage}}|{{int:stablepages-stable}}]].
De {{int:stabilization}} kam_mer [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} ändere].'''",
	'revreview-visibility2' => "'''Hee di Sigg hät en övverhollte [[{{MediaWiki:Validationpage}}|{{int:stablepages-stable}}]].
De {{int:stabilization}} kam_mer [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} ändere].'''",
	'revreview-visibility3' => "'''Hee di Sigg hät keij [[{{MediaWiki:Validationpage}}|{{int:stablepages-stable}}]].
De {{int:stabilization}} kam_mer [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} ändere].'''",
	'revreview-revnotfound' => '<b>Dä.</b> Die ählere Version vun dä Sigg, wo De noh frochs, es nit do. Schad. Luur ens 
op die URL, die Dich herjebraht hät, die weed verkihrt sin, oder se es villeich üvverhollt, weil einer die Sigg 
fottjeschmesse hät?',
	'right-autoreview' => 'Versione vun Sigge automattesch als „{{lcfirst:{{int:revreview-accuracy-1}}}}“ makeere',
	'right-movestable' => 'beshtändeje Sigge ömnenne',
	'right-review' => 'Versione als „{{lcfirst:{{int:revreview-accuracy-1}}}}“ makeere',
	'right-stablesettings' => 'Enshtelle, wi en {{int:stablepages-stable}} beshtemmp un aanjezeish weed',
	'right-validate' => 'Versione nohloore un beschtääteje',
	'rights-editor-autosum' => 'automattesch zohjedeilt',
	'rights-editor-revoke' => 'hät {{GENDER:$1|dä|dat|dä Metmaacher|dat|de}} [[$1]] uß dä Metmaacher-Jrop vun de {{int:group-editor}} eruß jenumme',
	'specialpages-group-quality' => 'Sigge ier Qualliteit',
	'stable-logentry' => 'hät de Enstellunge för et Versione-Aanzeije vun dä Sigg „[[$1]]“ jeändert',
	'stable-logentry2' => 'hät de Enstellunge för et Versione-Aanzeije vun dä Sigg „[[$1]]“ op der Shtanndatt retuur jesaz',
	'stable-logpage' => 'Logboch vun de Sigge ier beshtändeje Versione',
	'stable-logpagetext' => 'Dat hee es et Logboch met de Änderunge aan de Enstellunge för de Sigge mem Ennhallt vum Wiki ier [[{{MediaWiki:Validationpage}}|beshtändeje Versione]].
Mer han och en extra [[Special:StablePages|Leß met de beshtändeje Sigge un beschtändesch jewoode Sigge]].',
	'revreview-filter-all' => 'All',
	'revreview-filter-stable' => 'beshtändesch',
	'revreview-filter-approved' => '{{ucfirst:{{int:revreview-approved}}}}',
	'revreview-filter-reapproved' => 'Noch ens udder widder {{lcfirst:{{int:revreview-filter-approved}}}}',
	'revreview-filter-unapproved' => 'Nit mieh {{lcfirst:{{int:revreview-filter-approved}}}}',
	'revreview-filter-auto' => 'Automattesch',
	'revreview-filter-manual' => 'Vun Hand',
	'revreview-statusfilter' => 'Veränderung vum Zohshtand:',
	'revreview-typefilter' => 'Zoot:',
	'revreview-levelfilter' => 'Nivvoh:',
	'revreview-lev-sighted' => '{{lcfirst:{{int:revreview-accuracy-1}}}} Version',
	'revreview-lev-quality' => 'jeprööfte Qualliteits-Version',
	'revreview-lev-pristine' => 'orshprönglesche Version',
	'revreview-reviewlink' => 'nohkike',
	'tooltip-ca-current' => 'Dä aktoälle Äntworf vun hee dä Sigg aanlooere',
	'tooltip-ca-stable' => 'Donn de {{int:stablepages-stable}} vun dä Sigg he beloore',
	'tooltip-ca-default' => 'Enshtellunge för de Sigge ier Qualliteit',
	'revreview-locked-title' => 'Änderunge möße nohjekik sin, iih dat se op hee dä Sigg aanjezeish wääde.',
	'revreview-unlocked-title' => 'Änderunge möße nit nohjekik wääde, iih dat se op hee dä Sigg aanjezeish wääde.',
	'revreview-locked' => 'Änderunge möße [[{{MediaWiki:Validationpage}}|nohjekik sin]], iih dat se op hee dä Sigg aanjezeish wääde.',
	'revreview-unlocked' => 'Änderunge möße nit [[{{MediaWiki:Validationpage}}|nohjekik wääde]], iih dat se op hee dä Sigg aanjezeish wääde.',
	'log-show-hide-review' => '$1 et {{int:review-logpage}}',
	'revreview-tt-review' => 'Donn heh di Sigg nohkike',
	'validationpage' => '{{ns:help}}:Nohjeloorte, jeprööfte un beschtätijunge Versione vun Sigge',
);

/** Cornish (Kernewek)
 * @author Kw-Moon
 */
$messages['kw'] = array(
	'revreview-filter-all' => 'Oll',
);

/** Latin (Latina)
 * @author SPQRobin
 * @author UV
 */
$messages['la'] = array(
	'editor' => 'Recensor',
	'group-editor' => 'Recensores',
	'group-editor-member' => 'recensor',
	'group-reviewer' => 'Revisores',
	'group-reviewer-member' => 'revisor',
	'grouppage-editor' => '{{ns:project}}:Recensor',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'reviewer' => 'Revisor',
	'revreview-log' => 'Sententia:',
	'revreview-style-2' => 'Bonus',
	'revreview-revnotfound' => 'Emendatio quem rogavisti non inventa est.
Confirma URL paginae.',
	'rights-editor-revoke' => 'removit statum recensorem usoris [[$1]]',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Les Meloures
 * @author Robby
 */
$messages['lb'] = array(
	'editor' => 'Editeur',
	'flaggedrevs' => 'Markéiert Versiounen',
	'flaggedrevs-watched-pending' => "Et sinn elo [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} net nogekucken Ännerungen] vun nogekuckte Säiten op Ärer Iwwerwaachungslëscht. '''Är Opmierksamkeet gëtt gebraucht!'''",
	'flaggedrevs-desc' => "Gëtt Editeuren a Benotzer déi Säiten nokucken d'Méiglechkeet fir d'Versiounen ze validéieren a Säiten ze stabiliséieren",
	'flaggedrevs-pref-UI' => 'Interface vun de stabile Versiounen:',
	'flaggedrevs-pref-UI-0' => 'Déi detailéiert Versioun vun der "Stabil-Versioun" Schnëttstell benotzen',
	'flaggedrevs-pref-UI-1' => 'Déi einfach Versioun vun der "Stabil-Versioun" Schnëttstell benotzen',
	'prefs-flaggedrevs' => 'Stabilitéit',
	'flaggedrevs-prefs-stable' => "Ëmmer déi stabil Versioun vum Inhalt vun de Säiten ''par défaut'' weisen (wann et eng gëtt)",
	'flaggedrevs-prefs-watch' => 'Säiten déi ech nogekuckt hunn op meng Iwwerwaachungslëscht derbäisetzen',
	'flaggedrevs-prefs-editdiffs' => 'Den Ënnerscheed mat der stabiler Versioun während dem Ännere weisen',
	'group-editor' => 'Editeuren',
	'group-editor-member' => 'Editeur',
	'group-reviewer' => 'Reviseuren',
	'group-reviewer-member' => 'Reviseur',
	'grouppage-editor' => '{{ns:project}}:Editeur',
	'grouppage-reviewer' => '{{ns:project}}:Reviseur',
	'group-autoreview' => 'Benotzer denen hir Ännerungen automatesch nogekuckt sinn',
	'hist-draft' => 'Brouillonsversioun',
	'hist-quality' => 'Qualitéitsversioun',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validéiert] vum [[User:$3|$3]]',
	'hist-stable' => 'iwwerkuckte Versioun',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} nogekuckt] vum [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatesch nogekuckt]',
	'review-diff2stable' => 'Ännerungen tëschent der stabiler an der aktueller Versioun',
	'review-logentry-app' => 'r$2 vun der Säit [[$1]] nogekuckt',
	'review-logentry-dis' => "huet d'Markéierung vu(n) v$2 vu(n) [[$1]] ewechgeholl",
	'review-logentry-id' => 'weisen',
	'review-logentry-diff' => 'Ënnerscheed mat der stabiler Versioun',
	'review-logpage' => 'Lëscht vum Nokucken',
	'reviewer' => 'Reviseur',
	'revisionreview' => 'Versiounen nokucken',
	'revreview-accuracy-1' => 'Iwwerkuckt',
	'revreview-accuracy-2' => 'Zoutreffend',
	'revreview-accuracy-3' => 'Gudd dokumentéiert',
	'revreview-accuracy-4' => 'Exzellent',
	'revreview-auto' => '(automatesch)',
	'revreview-auto-w' => "Dir ännert eng stabil Versioun, Ännerunge ginn '''automatesch nogekuckt'''.",
	'revreview-auto-w-old' => "Dir ännert eng nogekuckte Versioun: Ännerunge ginn '''automatesch nogekuckt'''.",
	'revreview-basic-source' => 'Eng [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} nogekuckt Versioun] vun dëser Säit [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} nogekuckt] de(n) <i>$2</i>, huet op dëser Versioun baséiert.',
	'revreview-blocked' => 'Dir kënnt dës Versioun net nokucke well Äre Benotzerkont elo gespaart ass ([$1 Detailer])',
	'revreview-current' => 'Virbereedung',
	'revreview-depth' => 'Déift',
	'revreview-depth-1' => 'Einfach',
	'revreview-depth-2' => 'Moderat',
	'revreview-depth-3' => 'Héich',
	'revreview-depth-4' => 'Exzellent',
	'revreview-draft-title' => 'Brouillon vun enger Säit',
	'revreview-edit' => 'Virbereedung änneren',
	'revreview-editnotice' => "'''Ännerungen op dëser Säit ginn an déi [[{{MediaWiki:Validationpage}}|stabil Versioun]] agebaut esoubal wéi en autoriséierte Benotzer se nogekuckt huet.'''",
	'revreview-flag' => 'Dës Versioun nokucken',
	'revreview-legend' => 'Contenu vun der Versioun bewerten',
	'revreview-log' => 'Bemierkung:',
	'revreview-main' => "Dir musst eng prezis Versioun vun enger Inhaltssäit eraussichen fir se nokucken ze kënnen.

Kuckt d'[[Special:Unreviewedpages|Lëscht vun den net nogekuckte Sàiten]].",
	'revreview-noflagged' => "Et gëtt keng nogekuckte Versioune vun dëser Säit, et kann also sinn datt hir Qualitéit '''net''' [[{{MediaWiki:Validationpage}}|nogekuckt]] gouf.",
	'revreview-note' => '[[User:$1|$1]] huet dës Notize gemaach, wéi dës Versioun [[{{MediaWiki:Validationpage}}|nogekuckt gouf]]:',
	'revreview-notes' => 'Bemierkungen oder Notizen fir unzeweisen:',
	'revreview-oldrating' => 'Bewäertung bis elo:',
	'revreview-patrol' => 'Dës Ännerung als iwwerkuckt markéieren',
	'revreview-patrol-title' => 'Als iwwerkuckt markéieren',
	'revreview-patrolled' => 'Déi erausgsichte Versioun vu(n) [[:$1|$1]] gouf als iwwerkuckt markéiert.',
	'revreview-quality' => "Dëst ass déi lescht [[{{MediaWiki:Validationpage}}|Qualitéits]]-Versioun, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} nogekuckt] den <i>$2</i>.
D'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Virbereedung] huet [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Ännerung|Ännerungen}}] déi dorop {{PLURAL:$3|waard|waarden}} fir nogekuckt ze ginn.",
	'revreview-quality-old' => "Dëst ass eng [[{{MediaWiki:Validationpage}}|Qualitéitsversioun]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} kuckt d'Lëscht]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} nogekuckt] den <i>$2</i>.
Nei [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Ännerunge] kënne gemaach gi sinn.",
	'revreview-quality-title' => 'Qualitéitssäit',
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Iwwerkuckte Säit]]'''",
	'revreview-quick-invalid' => "'''Ongëlteg Versiounsnummer'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Aktuell Versioun]]''' (net iwwerkuckt)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Qualitéitssäit]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Virbereedung weisen]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Qualitéitssäit]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Virbereedung weisen]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Qualitéitssäit]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Virbereedung]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Säit weisen]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} vergläichen])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Brouillon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Säit weisen]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} vergläichen])",
	'revreview-selected' => "Ausgewielte Versioune vun '''$1''':",
	'revreview-source' => 'Brouillon Quelltext',
	'revreview-stable' => 'Stabil Säit',
	'revreview-stable-title' => 'Iwwerkuckte Säit',
	'revreview-stable1' => 'Dir wëllt eventuel [{{fullurl:$1|stableid=$2}} dës markéiert Versioun] gesinn a kucken ob et elo déi [{{fullurl:$1|stable=1}} stabil Versioun] vun dëser Säit ass.',
	'revreview-stable2' => 'Dir wëllt vläicht déi [{{fullurl:$1|stable=1}} stabil Versioun] vun dëser Säit (wann et eng gëtt) gesinn.',
	'revreview-style' => 'Liesbarkeet',
	'revreview-style-1' => 'Akzeptabel',
	'revreview-style-2' => 'Gudd',
	'revreview-style-3' => 'Genee',
	'revreview-style-4' => 'Exzellent',
	'revreview-submit' => 'Späicheren',
	'revreview-submitting' => 'Iwwerdroen …',
	'revreview-finished' => 'Iwwerliesen ofgeschloss!',
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabil Versioune]] sinn de Stanard-Säiteninhalt fir Notzer éischter wéi déi neiste Versioun.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabil Versioune]] sinn nogekuckte Versioune vu Säiten a kënnen als Standard-Säit fir Lieser agestallt ginn.''",
	'revreview-toggle-title' => 'Detailer weisen/verstoppen',
	'revreview-update-includes' => "'''Verschidde Schablounen/Fichiere goufen aktualiséiert:'''",
	'revreview-update-use' => "'''Bemierkung:''' Wann eng vun dëse Schablounen/Fichieren eng stabil Versioun huet, da gëtt déi schonn an der stabiler Versioun vun dëser Säit benotzt.",
	'revreview-diffonly' => "''Fir dës Säit nozekucken, klickt w.e.g. op de Link \"Aktuell Versioun\" a benotzt de Formulaire fir z'evaluéieren.",
	'revreview-visibility3' => "'''Dës Säit huet keng [[{{MediaWiki:Validationpage}}|stabil Versioun]]; d'Astellunge vun der Sàitestabilitéit kënnen  [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} agestallt] ginn.'''",
	'revreview-revnotfound' => "Déi Versioun vun der Säit déi Dir gefrot hutt konnt net fonnt ginn. Kuckt d'URL no, déi Dir benotzt hutt fir op dës Säit ze kommen.",
	'right-autoreview' => 'Versiounen automatesch als iwwerkuckt markéieren',
	'right-movestable' => 'Stabil Säite réckelen',
	'right-review' => 'Versiounen als iwwerkuckt markéieren',
	'right-stablesettings' => 'Astelle wéi eng stabil Versioun erausgesicht an ugewise gëtt',
	'right-validate' => 'Versiounen als validéiert markéieren',
	'specialpages-group-quality' => 'Qualitéitssécherung',
	'stable-logentry' => 'huet stabil Versioune fir [[$1]] agestallt',
	'stable-logpage' => 'Lëscht vun de stabile Versiounen',
	'revreview-filter-all' => 'All',
	'revreview-filter-stable' => 'stabil',
	'revreview-filter-auto' => 'Automatesch',
	'revreview-filter-manual' => 'Manuel',
	'revreview-statusfilter' => 'Statusännerung:',
	'revreview-typefilter' => 'Typ:',
	'revreview-levelfilter' => 'Niveau:',
	'revreview-lev-sighted' => 'gesinn',
	'revreview-lev-quality' => 'Qualitéit',
	'revreview-reviewlink' => 'nokucken',
	'tooltip-ca-current' => 'Den aktuelle Brouillon vun dëser Säit weisen',
	'tooltip-ca-stable' => 'Déi stabil Versioun vun dëser Säit gesinn',
	'tooltip-ca-default' => 'Astellunge vun der Qualitéits-Sécherung',
	'revreview-locked-title' => 'Ännerunge mussen nogekuckt ginn ier se op dëser Säit gewise ginn.',
	'revreview-unlocked-title' => 'Ännerunge brauchen net nogekuckt ze ginn ier se op dëser Säit gewise ginn.',
	'revreview-locked' => 'Ännerunge mussen [[{{MediaWiki:Validationpage}}|nogekuckt ginn]] éier se op dëser Säit ugewise ginn.',
	'revreview-unlocked' => 'Ännerunge mussen net [[{{MediaWiki:Validationpage}}|nogekuckt]] ginn ier se op dëser Säit gewise ginn.',
	'log-show-hide-review' => 'Logbuch vun den nogekucke Verisoune $1',
	'revreview-tt-review' => 'Dës Säit nokucken',
	'validationpage' => '{{ns:help}}:Validatioun vun der Säit',
);

/** Limburgish (Limburgs)
 * @author Matthias
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'editor' => 'Bewèrker',
	'flaggedrevs' => 'Aangevinkdje versies',
	'flaggedrevs-desc' => "Guf redacteurs/controleurs de meugelikheid versies te wardere en stebiel pazjena's aan te mèrke",
	'group-editor' => 'Bewèrkers',
	'group-editor-member' => 'Bewèrker',
	'group-reviewer' => 'Bekiekers',
	'group-reviewer-member' => 'Bekieker',
	'grouppage-editor' => '{{ns:project}}:Bewèrker',
	'grouppage-reviewer' => '{{ns:project}}:Bekieker',
	'hist-quality' => 'kwaliteitsversie',
	'hist-stable' => 'bekeke versie',
	'review-diff2stable' => 'Verschille tusse stabiele en huidige versies bekijke',
	'review-logentry-app' => 'bekeek [[$1]]',
	'review-logentry-dis' => 'haet een versie van [[$1]] leger beoordeild',
	'review-logentry-id' => 'versienummer $1',
	'review-logpage' => 'Beoordeilingslogbook',
	'review-logpagetext' => "Dit is een logboek met wijzigingen in de [[{{MediaWiki:Makevalidate-page}}|waarderingsstatus]] van versies van pagina's.",
	'reviewer' => 'Bekieker',
	'revisionreview' => 'Versies beoordeile',
	'revreview-accuracy' => 'Nejkeurigheid',
	'revreview-accuracy-0' => 'Neet bekeke',
	'revreview-accuracy-1' => 'Bekeke',
	'revreview-accuracy-2' => 'Nejkeurig',
	'revreview-accuracy-3' => 'Good van brónne veurzeen',
	'revreview-accuracy-4' => 'Oetgelich',
	'revreview-auto' => '(automatisch)',
	'revreview-auto-w' => "'''Opmerking:''' u wijzigt de stabiele versie. Uw bewerkingen worden automatisch gecontroleerd. Controleer de voorvertoning voordat u de pagina opslaat.",
	'revreview-auto-w-old' => "U bent een oude versie aan het bewerken, elke wijziging wordt '''automatisch beoordeeld'''.
Controleer uw bewerking voordat u deze opslaat.",
	'revreview-basic' => "Dit is de lets [[{{MediaWiki:Validationpage}}|beoordeilde]] versie, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>. De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige] kin [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerk] waere; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|wach|wachte}} op 'n beoordeiling.",
	'revreview-basic-same' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|beoordeelde]] versie, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>. De pagina is te [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerken].',
	'revreview-changed' => "'''De gevraagde actie kon niet uitgevoerd worden voor deze versie van [[:$1|$1]].'''

Er is een sjabloon of afbeelding opgevraagd zonder dat een specifieke versie is aangegeven. Dit kan voorkomen als een dynamisch sjabloon een andere afbeelding of een ander sjabloon bevat, afhankelijk van een variabele die is gewijzigd sinds u bent begonnen met de beoordeling van deze pagina. Ververs de pagina en start de beoordeling opnieuw om dit probleem op te lossen.",
	'revreview-current' => 'Hujige versie',
	'revreview-depth' => 'Deepgank',
	'revreview-depth-0' => 'Neet bekeke',
	'revreview-depth-1' => 'Basis',
	'revreview-depth-2' => 'Middelmaotig',
	'revreview-depth-3' => 'Hoog',
	'revreview-depth-4' => 'Oetgelich',
	'revreview-edit' => 'concep bewerke',
	'revreview-flag' => 'Deze versie beoordeile',
	'revreview-edited' => "'''Nuuj bewèrkinge waere opgenaome in de [[{{MediaWiki:Validationpage}}|stabiel versie]] es 'n eindredacteur ze gecontroleerd haet. De ''werkversie'' is hieonger te bekieke. Bedank!'''",
	'revreview-legend' => 'Versieinhoud wardere',
	'revreview-log' => 'Opmerking:',
	'revreview-main' => "U mót 'n specifieke versie van 'n pagina kieze om te kunnen beoordelen.  

Zie  [[Special:Unreviewedpages]] voor een lijst met pagina's waarvoor nog geen beoordeling is gegeven.",
	'revreview-newest-basic' => "De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lets beoordeilde versie]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} alles tone]) is [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} gekeurd]
op <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|haet|höbbe}} 'n beoordeiling neudig.",
	'revreview-newest-quality' => "De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letste kwaliteitsversie]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} alles tone]) is [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} gekeurd]
op <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|haet|höbbe}} 'n beoordeiling neudig.",
	'revreview-noflagged' => "D'r zeen gein beoordeelde versies van deze pagina, dus dae is wellich '''neet''' [[{{MediaWiki:Validationpage}}|gecontroleerd]] op kwaliteit.",
	'revreview-note' => '[[User:$1|$1]] heeft de volgende opmerkingen gemaakt bij de [[{{MediaWiki:Validationpage}}|beoordeling]] van deze versie:',
	'revreview-notes' => 'Weer te geve observaties of notities:',
	'revreview-oldrating' => 'Woor gewardeerd es:',
	'revreview-patrol' => 'Deze bewerking as gecontroleerd markere',
	'revreview-patrolled' => 'De geselecteerde versie van [[:$1|$1]] is gemarkeerd als gecontroleerd.',
	'revreview-quality' => "Dit is de letste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>. De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige] kin [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerk] waere; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|wach|wachte}} op 'n beoordeiling.",
	'revreview-quality-same' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>. De pagina is te [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerken].',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Bekeke]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige versie bekieke]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Beoordeeld]]''' (geen wijzigingen die niet beoordeeld zijn)",
	'revreview-quick-none' => "'''Hujige versie'''. Gein beoordeilde versies.",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige versie bekieke]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]''' (geen wijzigingen die niet beoordeeld zijn)",
	'revreview-quick-see-basic' => "'''Hujige versie'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} stabiele versie bekieke]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|wieziging|wieziginge}}])",
	'revreview-quick-see-quality' => "'''Hujige versie'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} stabiele versie bekieke]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|wieziging|wieziginge}}])",
	'revreview-selected' => "Geselecteerde versie van '''$1:'''",
	'revreview-source' => 'Brónteks concep',
	'revreview-stable' => 'Stebiel versie',
	'revreview-style' => 'Laesbaarheid',
	'revreview-style-0' => 'Neet bekeke',
	'revreview-style-1' => 'Aanvaardbaar',
	'revreview-style-2' => 'Good',
	'revreview-style-3' => 'Bónjig',
	'revreview-style-4' => 'Oetgelich',
	'revreview-submit' => 'Bekiek opslaon',
	'revreview-text' => 'Stabiele versies worden standaard getoond in plaats van de nieuwste versie.',
	'revreview-toolow' => 'U moet tenminste alle onderstaande eigenschappen hoger instellen dan "niet gekeurd" om een versie als  
beoordeeld aan te laten merken. Om de waardering van een versie te verwijderen, stelt u alle velden in op "niet gekeurd".',
	'revreview-update' => 'Controleer alstublieft alle wijziginge die gemaakt zien seer de stabiele versie waar gecontroleerd. Enkele sjablone/aafbeeldinge werde gewijzigd:',
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Review]] ale angeringe ''(shown below)'' made since the stable revision was [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approved].",
	'revreview-visibility' => 'Dees pazjena haet een [[{{MediaWiki:Validationpage}}|stabiele versie]], die [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} aangepas] kan waere.',
	'revreview-revnotfound' => 'De opgevraogde aw versie van dees pazjena is verzjwónde. Kontroleer estebleef de URL dieste gebroek höbs óm nao dees pazjena te gaon.',
	'rights-editor-autosum' => 'automatisch gepromoveerd',
	'rights-editor-revoke' => 'verwijderde redacteurstatus van [[$1]]',
	'stable-logentry' => 'stabiele versies zijn ingesteld voor [[$1]]',
	'stable-logentry2' => 'stabiele versies voor [[$1]] opnieuw instelle',
	'stable-logpage' => 'Logbook stabiele versies',
	'stable-logpagetext' => 'Dit is een logbook met wijziginge aan de instellinge veur [[{{MediaWiki:Validationpage}}|stabiele versies]] veur de hoofdnaamruimte.',
	'tooltip-ca-current' => 'hujige wèrkversie van dees pazjena toeane',
	'tooltip-ca-stable' => 'Toean de stabiele versie van dees pazjena',
	'tooltip-ca-default' => 'Instellinge kwaliteitsbewaking',
	'validationpage' => '{{ns:help}}:Pazjenakontraol',
);

/** Lithuanian (Lietuvių)
 * @author Matasg
 */
$messages['lt'] = array(
	'revreview-auto' => '(automatinis)',
	'revreview-log' => 'Komentaras:',
	'revreview-style-0' => 'Nepatvirtintas',
	'revreview-style-2' => 'Geras',
	'revreview-revnotfound' => 'Norima puslapio versija nerasta. Patikrinkite URL, kuriuo patekote į šį puslapį.',
);

/** Latvian (Latviešu)
 * @author Yyy
 */
$messages['lv'] = array(
	'revreview-revnotfound' => 'Meklētā vecā lapas versija netika atrasta. Lūdzu pārbaudi lietoto URL.',
);

/** Literary Chinese (文言)
 * @author Itsmine
 * @author Omnipaedista
 */
$messages['lzh'] = array(
	'editor' => '分校官',
	'flaggedrevs' => '校勘本',
	'group-editor' => '分校官',
	'group-editor-member' => '分校官',
	'group-reviewer' => '總校官',
	'group-reviewer-member' => '總校官',
	'grouppage-editor' => '{{ns:project}}:分校官',
	'grouppage-reviewer' => '{{ns:project}}:總校官',
	'hist-draft' => '底本',
	'hist-quality' => '校正本',
	'hist-stable' => '初定本',
	'revreview-accuracy-1' => '過目',
	'revreview-accuracy-4' => '卓著',
	'revreview-current' => '底本',
	'revreview-draft-title' => '底本',
	'revreview-noflagged' => '此為底本，未經[[{{MediaWiki:Validationpage}}|審校]]。',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|初定本]]'''",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|初定本]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 修纂新稿]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|初定本]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 修纂新稿]]",
	'revreview-quick-invalid' => '查無此錄',
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|今本]]'''（此為底本，未經審校）",
	'revreview-quick-see-basic' => "'''此為底本''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 察閱初定本]] （[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 較二者之別]）",
	'revreview-quick-see-quality' => "'''此為底本''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 察閱初定本]] （[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 較二者之別]）",
	'revreview-stable' => '校本',
	'revreview-stable-title' => '初定本',
	'revreview-submit' => '成',
	'revreview-submitting' => '在處理',
	'revreview-finished' => '成焉。',
	'revreview-revnotfound' => '查無舊審，惠核網址。',
);

/** Moksha (Мокшень)
 * @author Numulunj pilgae
 */
$messages['mdf'] = array(
	'revreview-revnotfound' => 'Тя лопать сире верзиец аф муви. Ватт URL конань вельде тон сувать тя лопас.',
);

/** Malagasy (Malagasy) */
$messages['mg'] = array(
	'revreview-revnotfound' => "
Tsy hita ny votoatin'ny pejy taloha nangatahinao.
Hamarino azafady ny URL nampiasainao hahatongavana eto amin'ity pejy ity.",
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 * @author Brest
 */
$messages['mk'] = array(
	'editor' => 'Уредувач',
	'flaggedrevs' => 'Означени ревизии',
	'flaggedrevs-desc' => 'Им дава можност на уредувачите и оценувачите да ги потврдат ревизиите и да ги стабилизираат страниците',
	'flaggedrevs-pref-UI-0' => 'Користење на детален интерфејс на стабилна верзија.',
	'flaggedrevs-pref-UI-1' => 'Користење на едноставен интерфејс на стабилна верзија.',
	'flaggedrevs-prefs-stable' => 'По основно прикажувај стабилна верзија на статии (ако постои)',
	'flaggedrevs-prefs-watch' => 'Додај страници кои ги оценувам во мојата листа на набљудувања',
	'group-editor' => 'Уредувачи',
	'group-editor-member' => 'уредувач',
	'group-reviewer' => 'Оценувачи',
	'group-reviewer-member' => 'оценувач',
	'grouppage-editor' => '{{ns:project}}:Уредувач',
	'grouppage-reviewer' => '{{ns:project}}:Оценувач',
	'hist-draft' => 'работна ревизија',
	'hist-quality' => 'квалитетна ревизија',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} оценето] од [[User:$3|$3]]',
	'hist-stable' => 'прегледана ревизија',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} прегледана] од [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} автоматски прегледани]',
	'review-diff2stable' => 'Види промени помеѓу стабилна и тековна ревизија',
	'review-logentry-app' => 'оценето r$2 од [[$1]]',
	'review-logentry-dis' => 'застарена r$2 од [[$1]]',
	'review-logentry-id' => 'преглед',
	'review-logentry-diff' => 'разлика со стабилна',
	'review-logpage' => 'Дневник на прегледување',
	'reviewer' => 'Оценувач',
	'revisionreview' => 'Оценети ревизии',
	'revreview-accuracy' => 'Точност',
	'revreview-accuracy-0' => 'Не задоволува',
	'revreview-accuracy-1' => 'Задоволува',
	'revreview-accuracy-2' => 'Добра',
	'revreview-accuracy-3' => 'Добро поткрепена со наводи',
	'revreview-accuracy-4' => 'Одлична',
	'revreview-approved' => 'Одобрено',
	'revreview-auto' => '(автоматски)',
	'revreview-auto-w' => "Уредувате стабилна ревизија; промените ќе бидат '''автоматски оценети'''.",
	'revreview-basic' => 'Ова се последните [[{{MediaWiki:Validationpage}}|прегледани]] ревизии, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} одобрени] на <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Работната верзија] има [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|промена|промени}}] кои чекаат за оценка.',
	'revreview-basic-i' => 'Ова е најновата [[{{MediaWiki:Validationpage}}|прегледана]] ревизија, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} одобрена] од <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Работната верзија] има [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} промени на шаблон/слика] кои чекаат да бидат оценети.',
	'revreview-basic-old' => 'Ова е [[{{MediaWiki:Validationpage}}|прегледана]] ревизија ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} види ги сите]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} одобрени] на <i>$2</i>.
Нови [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} промени] може да биле направени.',
	'revreview-basic-same' => 'Ова е последната [[{{MediaWiki:Validationpage}}|прегледана]] ревизија ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} види ги сите]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} одобрени] на <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Прегледана верзија] на оваа страница, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} одобрена] на <i>$2</i>, се заснова на оваа ревизија.',
	'revreview-current' => 'Нацрт',
	'revreview-depth' => 'Длабочина',
	'revreview-depth-0' => 'Непотврдено',
	'revreview-depth-1' => 'Основно',
	'revreview-depth-2' => 'Модерирано',
	'revreview-depth-3' => 'Високо',
	'revreview-depth-4' => 'Одлично',
	'revreview-draft-title' => 'Работна страница',
	'revreview-edit' => 'Уреди работна верзија',
	'revreview-flag' => 'Оценија оваа ревизија',
	'revreview-legend' => 'Оцени ја ревизијата',
	'revreview-log' => 'Забелешка:',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последната прегледана ревизија] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} приказ на сите]) беше [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} одобрена] на <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|промена|промени}}] {{PLURAL:$3|има|имаат}} потреба од оценка.',
	'revreview-oldrating' => 'Оценето:',
	'revreview-patrol' => 'Означи ја оваа промена како патролирана',
	'revreview-patrol-title' => 'Означи како патролирано',
	'revreview-patrolled' => 'Избраната ревизија на [[:$1|$1]] означена е како патролирана.',
	'revreview-quality' => 'Ова е последната [[{{MediaWiki:Validationpage}}|квалитетна]] ревизија, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} одобрена] на <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Работната везија] има [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|промена|промени}}] кои чекаат оценка.',
	'revreview-quality-i' => 'Ова е најновата ревизија за [[{{MediaWiki:Validationpage}}|квалитет]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} одобрена] на <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Работната верзија] има [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} промени во шаблон/слика] кои чекаат да бидат оценети.',
	'revreview-quality-title' => 'Квалитетна страница',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Прегледана страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} види работна верзија]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Прегледана страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} види работна верзија]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Прегледана страница]]'''",
	'revreview-quick-invalid' => "'''Погрешно ID на ревизија'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Тековна ревизија]]''' (неоценета)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Квалитетна страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} погледни работна верзија]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Квалитетна страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} погледни работна верзија]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Квалитетна страница]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Работна верзија]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} погледни]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} спореди])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Работна верзија]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} погледни]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} спореди])",
	'revreview-selected' => "Избрана ревизија на '''$1:'''",
	'revreview-source' => 'работна содржина',
	'revreview-stable' => 'Стабилна страница',
	'revreview-stable-title' => 'Прегледана страница',
	'revreview-style' => 'Читливост',
	'revreview-style-0' => 'Неодобрено',
	'revreview-style-1' => 'Прифатливо',
	'revreview-style-2' => 'Добро',
	'revreview-style-3' => 'Концизно',
	'revreview-style-4' => 'Одлично',
	'revreview-submit' => 'Зачувај',
	'revreview-submitting' => 'Зачувување ...',
	'revreview-finished' => 'Комплетиран преглед!',
	'revreview-toggle-title' => 'прикажи/сокриј детали',
	'revreview-revnotfound' => 'Старата верзија на оваа страница не може да се пронајде.
Проверете ја URL адресата што ја користевте за пристап до оваа страница.',
	'right-autoreview' => 'Автоматско означување на ревизии како прегледани',
	'right-movestable' => 'Преместување на стабилни страници',
	'right-review' => 'Означување на ревизии како прегледани',
	'right-stablesettings' => 'Конфигурирање како стабилната верзија е избрана и прикажана',
	'right-validate' => 'Означување на ревизии како потврдени',
	'rights-editor-autosum' => 'автопромовиран',
	'stable-logpage' => 'Дневник на стабилни страници',
	'revreview-filter-all' => 'Сите',
	'revreview-filter-approved' => 'Одобрени',
	'revreview-filter-reapproved' => 'Ре-одобрени',
	'revreview-filter-unapproved' => 'Неодобрени',
	'revreview-filter-auto' => 'Автоматски',
	'revreview-filter-manual' => 'Рачно',
	'revreview-statusfilter' => 'Променана статусот:',
	'revreview-typefilter' => 'Тип:',
	'revreview-reviewlink' => 'оценка',
	'tooltip-ca-current' => 'Преглед на тековна работна верзија на оваа страница',
	'tooltip-ca-stable' => 'Преглед на стабилна верзија на оваа страница',
	'log-show-hide-review' => '$1 дневник на оценувања',
	'revreview-tt-review' => 'Оценија оваа страница',
	'validationpage' => '{{ns:help}}:Проверка на страница',
);

/** Malayalam (മലയാളം)
 * @author Jacob.jose
 * @author Shijualex
 */
$messages['ml'] = array(
	'editor' => 'എഡിറ്റര്‍',
	'flaggedrevs-desc' => 'എഡിറ്റര്‍മാര്‍ക്കും സം‌ശോധകര്‍ക്കും പതിപ്പുകള്‍ ഗുണപരിശോധന നടത്താനും താളുകള്‍ സ്ഥിരപ്പെടുത്താനുമുള്ള അവകാശം കൊടുക്കുന്നു.',
	'flaggedrevs-prefs-watch' => 'ഞാന്‍ സം‌ശോധം ചെയ്യുന്ന താളുകള്‍ എന്റെ ശ്രദ്ധിക്കുന്ന താളുകളുടെ പട്ടികയിലേക്ക് ചേര്‍ക്കുക',
	'group-editor' => 'എഡിറ്റര്‍മാര്‍',
	'group-editor-member' => 'എഡിറ്റര്‍',
	'group-reviewer' => 'സംശോധകര്‍',
	'group-reviewer-member' => 'സംശോധകന്‍',
	'grouppage-editor' => '{{ns:project}}:എഡിറ്റര്‍',
	'grouppage-reviewer' => '{{ns:project}}:സംശോധകന്‍',
	'hist-draft' => 'കരടു പതിപ്പ്',
	'hist-quality' => 'ഉന്നത നിലവാരമുള്ള പതിപ്പ്',
	'hist-stable' => 'sighted പതിപ്പ്',
	'review-diff2stable' => 'സ്ഥിരതയുള്ള പതിപ്പും നിലവിലുള്ള പതിപ്പും തമ്മിലുള്ള മാറ്റങ്ങള്‍ കാണുക',
	'review-logentry-app' => 'സംശോധനം ചെയ്തു [[$1]]',
	'review-logentry-id' => 'പതിപ്പിന്റെ ഐഡി $1',
	'review-logpage' => 'സംശോധന പ്രവര്‍ത്തരേഖ',
	'reviewer' => 'സംശോധകന്‍',
	'revisionreview' => 'പതിപ്പുകള്‍ സംശോധനം ചെയ്യുക',
	'revreview-accuracy' => 'സൂക്ഷമത',
	'revreview-accuracy-0' => 'സ്ഥിരീകരിച്ചിട്ടില്ല',
	'revreview-accuracy-1' => 'സൈറ്റഡ്',
	'revreview-accuracy-2' => 'സൂക്ഷ്മം',
	'revreview-accuracy-3' => 'നന്നായി അവലംബം ചേര്‍ക്കപ്പെട്ടത്',
	'revreview-accuracy-4' => 'തിരഞ്ഞെടുക്കപ്പെട്ടത്',
	'revreview-approved' => 'അംഗീകരിച്ചിരിക്കുന്നു',
	'revreview-auto' => '(യാന്ത്രികം)',
	'revreview-auto-w' => "താങ്കള്‍ സ്ഥിരതയുള്ള പതിപ്പാണു തിരുത്തുന്നത്; മാറ്റങ്ങള്‍ '''യാന്ത്രികമായി സം‌ശോധനം ചെയ്യപ്പെടും'''.",
	'revreview-auto-w-old' => "താങ്കള്‍ സം‌ശോധം ചെയ്ത ഒരു പതിപ്പാണു തിരുത്തുന്നത്; മാറ്റങ്ങള്‍ '''യാന്ത്രികമായി സം‌ശോധനം ചെയ്യപ്പെടും'''.",
	'revreview-basic' => "ഈ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|sighted]] പതിപ്പ്, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}}  ''$2'' നു അംഗീകരിച്ചതാണ്‌]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിന്റെ] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|മാറ്റം|മാറ്റങ്ങള്‍}}] സം‌ശോധനത്തിനു തയ്യാറാണ്‌.",
	'revreview-basic-i' => 'ഇതാണു <i>$2</i>ന്റെ [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}}അംഗീകരിക്കപ്പെട്ട] ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|സൈറ്റഡ്]] സം‌ശോധനം.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിനു] സം‌ശോധനത്തിനായി കാത്തിരിക്കുന്ന [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/image changes] ഉണ്ട്.',
	'revreview-basic-old' => "ഈ [[{{MediaWiki:Validationpage}}|sighted]] പതിപ്പ് ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്]. പുതിയ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} മാറ്റങ്ങള്‍] വന്നിരിക്കാന്‍ സാദ്ധ്യതയുണ്ട്.",
	'revreview-basic-same' => 'ഈ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|sighted]] പതിപ്പ് ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} എല്ലാ പതിപ്പുകളും പ്രദര്‍ശിപ്പിക്കുക]), <i>$2</i>നു [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതാണ്] ഈ താള്‍.',
	'revreview-basic-source' => "ഈ താളിന്റെ [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}}  ഒരു sighted പതിപ്പ്], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചത്] ഈ പതിപ്പിനെ അടിസ്ഥാനമാക്കിയാണ്‌.",
	'revreview-current' => 'കരട്',
	'revreview-depth' => 'അഗാധത',
	'revreview-depth-0' => 'അംഗീകരിച്ചിട്ടില്ലാത്തത്',
	'revreview-depth-1' => 'അടിസ്ഥാനപരമായത്',
	'revreview-depth-2' => 'ഒരു വിധം നിലവാരമുള്ളത്',
	'revreview-depth-3' => 'ഉന്നത നിലവാരമുള്ളത്',
	'revreview-depth-4' => 'തിരഞ്ഞെടുക്കപ്പെട്ടത്',
	'revreview-draft-title' => 'കരടു ലേഖനം',
	'revreview-edit' => 'കരട് തിരുത്തുക',
	'revreview-flag' => 'ഈ പതിപ്പ് സംശോധനം ചെയ്യുക',
	'revreview-edited' => "'''സ്ഥാപിതരായ ഉപയോക്താക്കള്‍ സം‌ശോധനം നിര്‍‌വഹിച്ചതിനു ശേഷം തിരുത്തലുകള്‍ [[{{MediaWiki:Validationpage}}|സ്ഥിരതയുള്ള പതിപ്പിലേക്ക്]] ചേര്‍ക്കപ്പെടും. 

താഴെ ''കരട് പതിപ്പ്‍'' പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്നു.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|മാറ്റം|മാറ്റങ്ങള്‍}}] സം‌ശോധനത്തിനായി തയ്യാറായിരിക്കുന്നു.",
	'revreview-invalid' => "'''അസാധുവായ ലക്ഷ്യം:''' തന്ന IDക്കു ചേരുന്ന [[{{MediaWiki:Validationpage}}|സംശോധനം ചെയ്ത പതിപ്പുകള്‍]] ഒന്നും തന്നെയില്ല.",
	'revreview-legend' => 'പതിപ്പിന്റെ ഉള്ളടക്കം വിലയിരുത്തുക',
	'revreview-log' => 'അഭിപ്രായം:',
	'revreview-newest-basic' => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഏറ്റവും പുതിയ sighted പതിപ്പ്] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക])[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ''$2''നു അംഗീകരിച്ചതാണ്‌].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|മാറ്റത്തിനു|മാറ്റങ്ങള്‍ക്ക്}}] {{PLURAL:$3|സംശോധനം വേണം|സംശോധനം വേണം}}.",
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഏറ്റവും അവസാനത്തെ സൈറ്റഡ് പതിപ്പ്] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]) <i>$2</i> നാണ്‌ [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചത്].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/image changes]-നു സം‌ശോധനം ആവശ്യമാണ്‌.',
	'revreview-newest-quality' => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഈ ഉന്നത നിലവാരമുള്ള ഏറ്റവും പുതിയ പതിപ്പ്] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്‌] .
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|മാറ്റത്തിനു|മാറ്റങ്ങള്‍ക്ക്}}] {{PLURAL:$3|സംശോധനം വേണം|സംശോധനം വേണം}}.",
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഏറ്റവും അവസാനത്തെ ഗുണമേന്മയുള്ള സംശോധന] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]) <i>$2</i> നാണ്‌ [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചത്].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/image changes]-നു സം‌ശോധനം ആവശ്യമാണ്‌.',
	'revreview-noflagged' => 'ഈ താളിനു സം‌ശോധനം ചെയ്ത പതിപ്പുകള്‍ ഒന്നും തന്നെയില്ല. അതിനാല്‍ ഈ താളിന്റെ [[{{MediaWiki:Validationpage}}|ഗുണനിലവാര പരിശോധന‍]] നടന്നു കാണില്ല.',
	'revreview-note' => '[[User:$1|$1]] എന്ന ഉപയോക്താവ് ഈ പതിപ്പ് [[{{MediaWiki:Validationpage}}|സംശോധനം ചെയ്യുമ്പോള്‍]] താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന കുറിപ്പ് ചേര്‍ത്തിരുന്നു:',
	'revreview-notes' => 'പ്രദര്‍ശിപ്പിക്കാനുള്ള വിലയിരുത്തലുകള്‍/കുറിപ്പുകള്‍:',
	'revreview-oldrating' => 'മൂല്യനിര്‍ണ്ണയ ഫലം:',
	'revreview-patrol' => 'ഈ മാറ്റം റോന്തു ചുറ്റിയതായി രേഖപ്പെടുത്തി',
	'revreview-patrolled' => '[[:$1|$1]]ന്റെ തിരഞ്ഞെടുത്ത പതിപ്പില്‍ റോന്തു ചുറ്റിയതായി രേഖപ്പെടുത്തി.',
	'revreview-quality' => "ഈ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള]] പതിപ്പ്, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്‌].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിന്റെ] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|മാറ്റം|മാറ്റങ്ങള്‍}}] സം‌ശോധനത്തിനു തയ്യാറാണ്‌.",
	'revreview-quality-i' => 'ഇതാണു <i>$2</i>ന്റെ [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിക്കപ്പെട്ട] ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|ഗുണമേന്മയുള്ള]] പതിപ്പ്.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിനു] സം‌ശോധനത്തിനായി കാത്തിരിക്കുന്ന  [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/image changes] ഉണ്ട്.',
	'revreview-quality-old' => "ഈ [[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള]]  പതിപ്പ് ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്]. പുതിയ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} മാറ്റങ്ങള്‍] വന്നിരിക്കാന്‍ സാദ്ധ്യതയുണ്ട്.",
	'revreview-quality-same' => 'ഇതാണ്‌ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള]] പതിപ്പ് ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} എല്ലാ പതിപ്പുകളും പ്രദര്‍ശിപ്പിക്കുക]), <i>$2</i>നു  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതാണ്].',
	'revreview-quality-source' => "ഈ താളിന്റെ [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} ഉന്നത നിലവാരമുള്ള ഒരു പതിപ്പ്], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചത്], ഈ പതിപ്പിനെ അടിസ്ഥാനമാക്കിയാണ്‌.",
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|കണ്ടെത്തിയ ലേഖനം]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് കാണുക]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|കണ്ടെത്തിയ ലേഖനം]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് കാണുക]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Sighted ലേഖനം]]'''",
	'revreview-quick-invalid' => "'''അസാധുവായ പതിപ്പ് ഐഡി'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|നിലവിലുള്ള പതിപ്പ്]]''' (സം‌ശോധനം ചെയ്തിട്ടില്ല)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|നിലവാരമുള്ള ലേഖനം]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് കാണുക]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള ലേഖനം]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് കാണുക]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|ഉന്നത ഗുണനിലവാരമുള്ള ലേഖനം]]'''",
	'revreview-quick-see-basic' => "'''കരട്''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ലേഖനം കാണുക]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} താരതമ്യം ചെയ്യുക])",
	'revreview-quick-see-quality' => "'''കരട്''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ലേഖനം കാണുക]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} താരതമ്യം ചെയ്യുക])",
	'revreview-selected' => "'''$1'''ന്റെ തിരഞ്ഞെടുത്ത പതിപ്പ്:",
	'revreview-source' => 'കരടിന്റെ മൂലരൂപം കാണുക',
	'revreview-stable' => 'സ്ഥിരതയുള്ള താള്‍',
	'revreview-style' => 'വായനാസുഖം',
	'revreview-style-0' => 'അംഗീകരിച്ചിട്ടില്ലാത്തത്',
	'revreview-style-1' => 'സ്വീകാര്യമായത്',
	'revreview-style-2' => 'കൊള്ളാവുന്നത്',
	'revreview-style-3' => 'സംക്ഷിപ്തമായത്',
	'revreview-style-4' => 'തിരഞ്ഞെടുക്കപ്പെട്ടത്',
	'revreview-submit' => 'സംശോധനം ചെയ്തത് സമര്‍പ്പിക്കുക',
	'revreview-toggle-title' => 'വിവരങ്ങള്‍ കാണിക്കുക/മറയ്ക്കുക',
	'revreview-update' => "സ്ഥിരതയുള്ള പതിപ്പ് [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതിനു ശേഷം] വരുത്തിയ മാറ്റങ്ങള്‍ ''(താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്നു)''. ദയവായി  [[{{MediaWiki:Validationpage}}|സംശോധനം]] ചെയ്യുക.
 
'''ചില ഫലകങ്ങള്‍/ചിത്രങ്ങള്‍ പുതുക്കിയിട്ടുണ്ട്:'''",
	'revreview-update-includes' => "'''ചില ഫലകങ്ങള്‍/ചിത്രങ്ങള്‍ പുതുക്കി:'''",
	'revreview-update-none' => "സ്ഥിരതയുള്ള പതിപ്പ് [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതിനു ശേഷം]
വരുത്തിയ മാറ്റങ്ങള്‍ ''(താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്നു)'' [[{{MediaWiki:Validationpage}}|ദയവായി സംശോധനം ചെയ്യുക]].",
	'revreview-revnotfound' => 'ഈ താളിന്റെ താങ്കള്‍ ആവശ്യപ്പെട്ട പഴയ പതിപ്പ് കാണ്മാനില്ല. ഈ താളിലെത്താന്‍ താങ്കളുപയോഗിച്ച URL ഒരിക്കല്‍ക്കൂടി പരിശോധിക്കുക.',
	'right-movestable' => 'സ്ഥിരതയുള്ള താളുകള്‍ മാറ്റുക',
	'rights-editor-autosum' => 'യാന്ത്രികമായി സ്ഥാനക്കയറ്റം നല്‍കിയിരിക്കുന്നു',
	'rights-editor-revoke' => '[[$1]] എന്ന ഉപയോക്താവിന്റെ എഡിറ്റര്‍ അവകാശം പിന്‍‌വലിച്ചിരിക്കുന്നു',
	'specialpages-group-quality' => 'ഗുണമേന്മാ ഉറപ്പ്',
	'stable-logpage' => 'സ്ഥിരതയുടെ പ്രവര്‍ത്തനരേഖ',
	'tooltip-ca-current' => 'ഈ താളിന്റെ നിലവിലുള്ള കരട് കാണുക',
	'tooltip-ca-stable' => 'ഈ താളിന്റെ സ്ഥിരതയുള്ള പതിപ്പ് കാണുക',
	'tooltip-ca-default' => 'ഗുണനിലവാര ഉറപ്പാക്കല്‍ ക്രമീകരണങ്ങള്‍',
	'validationpage' => '{{ns:help}}:ലേഖനസാധുത',
);

/** Mongolian (Монгол)
 * @author Chinneeb
 */
$messages['mn'] = array(
	'revreview-auto' => '（автоматаар）',
	'revreview-revnotfound' => 'Таны орохыг хүссэн хуудасны хуучин засвар олдсонгүй. Энэ хуудас руу явахад хэрэглэсэн URL-ээ шалгана уу.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 */
$messages['mr'] = array(
	'editor' => 'संपादक',
	'flaggedrevs' => 'चिन्हांकित आवृत्ती',
	'flaggedrevs-backlog' => "सध्या [[Special:OldReviewedPages|जुन्या तपासलेल्या पानांमध्ये]] काही कार्ये करायची बाकी राहिलेली आहेत. '''तुम्ही तिथे लक्ष देणे गरजेचे आहे!'''",
	'flaggedrevs-desc' => 'संपादक तसेच तपासनीसांना पानाच्या आवृत्त्या प्रमाणित करण्याची तसेच पाने स्थिर करण्याची परवानगी देते.',
	'flaggedrevs-pref-UI-0' => 'इंटरफेस मध्ये वाढीव स्थिर आवृत्ती वापरा',
	'flaggedrevs-pref-UI-1' => 'इंटरफेस मध्ये साधी स्थिर आवृत्ती वापरा',
	'flaggedrevs-prefs-stable' => 'कायम स्थिर आवृत्ती अविचलपणे दर्शवा (जर उपलब्ध असेल तर)',
	'flaggedrevs-prefs-watch' => 'मी तपासलेली पाने माझ्या पहार्‍याच्या सूचीत टाका',
	'group-editor' => 'संपादक',
	'group-editor-member' => 'संपादक',
	'group-reviewer' => 'तपासनीस',
	'group-reviewer-member' => 'तपासनीस',
	'grouppage-editor' => '{{ns:project}}:संपादक',
	'grouppage-reviewer' => '{{ns:project}}:तपासनीस',
	'hist-draft' => 'कच्ची आवृत्ती',
	'hist-quality' => 'गुणवत्तापूर्ण आवृत्ती',
	'hist-quality-user' => '[[User:$3|$3]] ने [{{fullurl:$1|stableid=$2}} तपासलेली]',
	'hist-stable' => 'निवडलेली आवृत्ती',
	'hist-stable-user' => '[[User:$3|$3]] ने [{{fullurl:$1|stableid=$2}} निवडलेली]',
	'review-diff2stable' => 'स्थिर व सध्याच्या आवृत्तीमधील फरक पहा',
	'review-logentry-app' => '[[$1]] तपासले',
	'review-logentry-dis' => '[[$1]] च्या एका आवृत्तीचे गुणांकन कमी केले',
	'review-logentry-id' => 'आवर्तन क्र. $1',
	'review-logentry-diff' => 'स्थिर आवृत्तीशी फरक',
	'review-logpage' => 'तपासणी सूची',
	'review-logpagetext' => 'ही कंटेंट पानांच्या आवृत्त्यांमधील बदलांच्या [[{{MediaWiki:Validationpage}}|प्रमाणिकरणाची]] सूची आहे.
प्रमाणित पानांच्या यादी साठी [[Special:ReviewedPages|तपासलेल्या पानांची यादी]] पहा.',
	'reviewer' => 'समीक्षक',
	'revisionreview' => 'आवृत्त्या तपासा',
	'revreview-accuracy' => 'अचूकता',
	'revreview-accuracy-0' => 'अप्रमाणित',
	'revreview-accuracy-1' => 'निवडली',
	'revreview-accuracy-2' => 'योग्य',
	'revreview-accuracy-3' => 'सुयोग्य स्रोतातून',
	'revreview-accuracy-4' => 'विशेष',
	'revreview-approved' => 'प्रमाणित',
	'revreview-auto' => '(आपोआप)',
	'revreview-auto-w' => "तुम्ही स्थिर आवृत्ती संपादित आहात, कुठलेही बदल हे '''आपोआप तपासले''' जातील.",
	'revreview-auto-w-old' => "तुम्ही तपासलेली आवृत्ती संपादित आहात, कुठलेही बदल हे '''आपोआप तपासले''' जातील.",
	'revreview-basic' => "ही नवीनतम [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] आता '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} बदलता]''' येऊ शकते;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची वाट पाहत आहोत.",
	'revreview-basic-i' => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] ज्यामध्ये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साचे/चित्र बदल] आहेत, तपासण्यासाठी बाकी आहे.',
	'revreview-basic-old' => 'ही एक [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> ला [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
नवीन [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} बदल] केलेले असण्याची शक्यता आहे.',
	'revreview-basic-same' => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.',
	'revreview-basic-source' => 'या पानाची एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} निवडलेली आवृत्ती], जी <i>$2</i> ला[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे, या आवृत्तीवर आधारित आहे.',
	'revreview-changed' => "'''[[:$1|$1]] च्या या आवृत्तीवर तुम्ही इच्छित असलेली क्रिया करता येत नाही.'''

एखादा साचा अथवा चित्र कुठल्याही आवृत्तीचा संदर्भ न देता मागितले असण्याची शक्यता आहे.
जर एखाद्या साच्यात बाह्यचित्रे असतील अथवा तुम्ही संपादन चालू केल्यानंतर साच्यातील काही भाग बदलल्यानंतर असे होऊ शकते.
कृपया रिफ्रेश करून पुन्हा तपासा.",
	'revreview-current' => 'कच्ची प्रत',
	'revreview-depth' => 'गहनता',
	'revreview-depth-0' => 'अप्रमाणित',
	'revreview-depth-1' => 'प्राथमिक',
	'revreview-depth-2' => 'माध्यमिक',
	'revreview-depth-3' => 'उच्च',
	'revreview-depth-4' => 'विशेष',
	'revreview-draft-title' => 'लेखाची कच्ची प्रत',
	'revreview-edit' => 'कच्ची प्रत संपादा',
	'revreview-flag' => 'ही आवृत्ती तपासा',
	'revreview-edited' => "'''नवीन संपादने एखाद्या जुन्या सदस्याने तपासल्यानंतर [[{{MediaWiki:Validationpage}}|स्थिर आवृत्ती]] मध्ये दाखविली जातील.
''कच्ची प्रत'' खाली दिलेली आहे.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|बदलाची|बदलांची}}] तपासणी बाकी आहे.",
	'revreview-invalid' => "'''चुकीचे टारगेट:''' कुठलीही [[{{MediaWiki:Validationpage}}|तपासलेली]] आवृत्ती दिलेल्या क्रमांकाशी जुळत नाही.",
	'revreview-legend' => 'या आवृत्तीचे गुणांकन करा',
	'revreview-log' => 'प्रतिक्रीया:',
	'revreview-main' => 'तपासण्यासाठी एखादी आवृत्ती निवडणे गरजेचे आहे.

न तपासलेल्या पानांची यादी पहाण्यासाठी [[Special:Unreviewedpages]] इथे जा.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नविनतम निवडलेली आवृत्ती] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} सर्व यादी]) ही <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित केलेली आहे].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची गरज आहे.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम निवडलेली आवृत्ती] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} सर्व यादी]) <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साचा/चित्र बदल] तपासायचे राहिलेले आहेत.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नविनतम निवडलेली आवृत्ती] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} सर्व यादी]) ही <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित केलेली आहे].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची गरज आहे.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम गुणवत्तापूर्ण आवृत्ती] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} सर्व यादी]) <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साचा/चित्र बदल] तपासायचे राहिलेले आहेत.',
	'revreview-noflagged' => "या पानाच्या तपासलेल्या आवृत्त्या नाहीत, त्यामुळे हे पान गुणवत्तेसाठी [[{{MediaWiki:Validationpage}}|तपासलेले]] '''नसण्याची''' शक्यता आहे.",
	'revreview-note' => '[[User:$1|$1]] ने ही आवृत्ती [[{{MediaWiki:Validationpage}}|तपासताना]] खालील सूचना दिलेल्या आहेत:',
	'revreview-notes' => 'आपली मते अथवा निष्कर्ष:',
	'revreview-oldrating' => 'याचे गुणांकन:',
	'revreview-patrol' => 'हा बदल पाहिला असल्याची खूण करा',
	'revreview-patrol-title' => 'गस्त घातल्याची खूण करा',
	'revreview-patrolled' => '[[:$1|$1]] च्या निवडलेल्या आवृत्तीवर पहाण्याची नोंद केलेली आहे.',
	'revreview-quality' => "ही नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] आता '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} बदलता]''' येऊ शकते;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची वाट पाहत आहोत.",
	'revreview-quality-i' => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] ज्यामध्ये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साचे/चित्र बदल] आहेत, तपासण्यासाठी बाकी आहे.',
	'revreview-quality-old' => 'ही एक [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> ला [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
नवीन [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} बदल] केलेले असण्याची शक्यता आहे.',
	'revreview-quality-same' => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> रोजी [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.',
	'revreview-quality-source' => 'या पानाची एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} गुणवत्तापूर्ण आवृत्ती], जी <i>$2</i> ला[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे, या आवृत्तीवर आधारित आहे.',
	'revreview-quality-title' => 'गुणवत्तापूर्ण लेख',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|निवडलेला लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत पहा]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|निवडलेला लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत पहा]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|निवडलेला लेख]]'''",
	'revreview-quick-invalid' => "'''चुकीचा आवृत्ती क्रमांक'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|सद्ध्याची आवृत्ती]]''' (तपासलेली नाही)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत पहा]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत पहा]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]'''",
	'revreview-quick-see-basic' => "'''कच्ची प्रत''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} लेख पहा]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} फरक तपासा])",
	'revreview-quick-see-quality' => "'''कच्ची प्रत''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} लेख पहा]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} फरक तपासा])",
	'revreview-selected' => "'''$1''' ची निवडलेली आवृत्ती:",
	'revreview-source' => 'कच्च्या प्रतीचा स्रोत',
	'revreview-stable' => 'स्थिर पान',
	'revreview-stable-title' => 'निवडलेला लेख',
	'revreview-stable1' => 'तुम्ही कदाचित या पानाची [{{fullurl:$1|stableid=$2}} ही खूण केलेली आवृत्ती] आता [{{fullurl:$1|stable=1}} स्थिर आवृत्ती] झाली आहे किंवा नाही हे पाहू इच्छिता.',
	'revreview-stable2' => 'तुम्ही या पानाची [{{fullurl:$1|stable=1}} स्थिर आवृत्ती] पाहू शकता (जर उपलब्ध असेल तर).',
	'revreview-style' => 'वाचनीयता',
	'revreview-style-0' => 'अप्रमाणित',
	'revreview-style-1' => 'वापरण्यायोग्य',
	'revreview-style-2' => 'चांगले',
	'revreview-style-3' => 'संक्षिप्त',
	'revreview-style-4' => 'विशेष',
	'revreview-submit' => 'आपला रिव्ह्यू पाठवा',
	'revreview-successful' => "'''[[:$1|$1]] च्या निवडलेल्या आवृत्तीवर यशस्वीरित्या तपासल्याची खूण केलेली आहे.
([{{fullurl:{{#Special:Stableversions}}|page=$2}} सर्व खूणा केलेल्या आवृत्त्या पहा])'''",
	'revreview-successful2' => "'''[[:$1|$1]] च्या निवडलेल्या आवृत्तीची खूण काढली.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|स्थिर आवृत्त्या]] या एखाद्या पानाच्या नविनतम आवृत्तीमधून न घेता मूळ मजकूरावरुन घेतल्या जातात.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|स्थिर आवृत्त्या]] या पानाच्या तपासलेल्या आवृत्त्या असतात व बघणार्‍यांसाठी अविचल मजकूर दर्शवितात.''",
	'revreview-toggle' => '(+/-)',
	'revreview-toggle-title' => 'जास्तीची माहिती दाखवा/लपवा',
	'revreview-toolow' => 'एखादी आवृत्ती तपासलेली आहे अशी खूण करण्यासाठी तुम्ही खालील प्रत्येक पॅरॅमीटर्सना "अप्रमाणित" पेक्षा वरचा दर्जा देणे आवश्यक आहे.
एखाद्या आवृत्तीचे गुणांकन कमी करण्यासाठी, खालील सर्व रकान्यांमध्ये "अप्रमाणित" भरा.',
	'revreview-update' => "कृपया केलेले बदल ''(खाली दिलेले)'' [[{{MediaWiki:Validationpage}}|तपासा]] कारण स्थिर आवृत्ती [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.<br />
'''काही साचे/चित्रे बदललेली आहेत:'''",
	'revreview-update-includes' => "'''काही साचे/चित्र बदलण्यात आलेले आहेत:'''",
	'revreview-update-none' => "कृपया केलेले बदल ''(खाली दिलेले)'' [[{{MediaWiki:Validationpage}}|तपासा]] कारण स्थिर आवृत्ती [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.",
	'revreview-update-use' => "'''सूचना:''' जर यापैकी एका साचा/चित्राची स्थिर आवृत्ती असेल, तर ती या पानाच्या स्थिर आवृत्ती मध्ये अगोदरच वापरलेली असेल.",
	'revreview-diffonly' => "''हे पान तपासण्यासाठी, \"आत्ताची आवृत्ती\" वर टिचकी द्या व तपासणी अर्ज वापरा.''",
	'revreview-visibility' => "'''या पानाला एक [[{{MediaWiki:Validationpage}}|स्थिर आवृत्ती]] आहे, जी [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} बदलली] जाऊ शकते.'''",
	'revreview-revnotfound' => 'या पृष्ठाची तुम्ही मागविलेली जुनी आवृत्ती सापडली नाही.
कृपया URL तपासून पहा.',
	'right-autoreview' => 'आवृत्त्या पाहिल्या म्हणून आपोआप खूणा करा',
	'right-movestable' => 'स्थिर पानांचे स्थानांतरण करा',
	'right-review' => 'आवृत्त्या पाहिल्या म्हणून खूण करा',
	'right-stablesettings' => 'स्थिर आवृत्ती कशा प्रकारे निवडली व दाखविली जाते ते ठरवा',
	'right-validate' => 'आवृत्त्या वैध म्हणून खूण करा',
	'rights-editor-autosum' => 'आपोआप पदोन्नती',
	'rights-editor-revoke' => '[[$1]] चे संपादक अधिकार काढून घेतले',
	'specialpages-group-quality' => 'गुणवत्ता वचन',
	'stable-logentry' => '[[$1]] चे स्थिर आवृत्तीकरण बदला',
	'stable-logentry2' => '[[$1]] चे स्थिर आवृत्तीकरण पूर्वपदास न्या',
	'stable-logpage' => 'स्थिर आवृत्ती सूची',
	'stable-logpagetext' => 'ही कंटेंट पानांच्या [[{{MediaWiki:Validationpage}}|स्थिर आवृत्ती]] मधील बदलांची सूची आहे.
स्थिर पानांची यादी [[Special:StablePages|स्थिर पान यादी]] इथे पहायला मिळू शकेल.',
	'tooltip-ca-current' => 'या पानाची कच्ची प्रत पहा',
	'tooltip-ca-stable' => 'या पानाची पक्की प्रत पहा',
	'tooltip-ca-default' => 'गुणवत्ता देणारी स्थिती',
	'validationpage' => '{{ns:help}}:लेख प्रमाणिकरण',
);

/** Malay (Bahasa Melayu)
 * @author Aviator
 * @author Kurniasan
 */
$messages['ms'] = array(
	'editor' => 'Penyunting',
	'flaggedrevs' => 'Semakan Bertanda',
	'flaggedrevs-backlog' => "Terdapat sebuah log di [[Special:OldReviewedPages|Laman disemak lapuk]]. '''Sila ambil perhatian!'''",
	'flaggedrevs-desc' => 'Membolehkan para penyunting dan pemeriksa mengesahkan semakan dan menstabilkan laman',
	'flaggedrevs-pref-UI-0' => 'Gunakan antara muka pengguna yang terperinci',
	'flaggedrevs-pref-UI-1' => 'Gunakan antara muka pengguna yang ringkas',
	'flaggedrevs-prefs-stable' => 'Paparkan versi stabil bagi laman kandungan (jika ada)',
	'flaggedrevs-prefs-watch' => 'Tambahkan laman yang diperiksa ke dalam senarai pantau',
	'group-editor' => '{{ns:project}}:Penyunting',
	'group-editor-member' => 'Penyunting',
	'group-reviewer' => 'Pemeriksa',
	'group-reviewer-member' => 'Pemeriksa',
	'grouppage-editor' => '{{ns:project}}:Penyunting',
	'grouppage-reviewer' => '{{ns:project}}:Pemeriksa',
	'hist-draft' => 'semakan draf',
	'hist-quality' => 'semakan bermutu',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} disahkan] oleh [[User:$3|$3]]',
	'hist-stable' => 'semakan dijenguk',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} dijenguk] oleh [[User:$3|$3]]',
	'review-diff2stable' => 'Lihat perubahan antara semakan stabil dan semakan semasa',
	'review-logentry-app' => 'telah menyemak r$2 bagi [[$1]]',
	'review-logentry-dis' => 'menggugurkan salah satu versi bagi [[$1]]',
	'review-logentry-id' => 'ID semakan $1',
	'review-logentry-diff' => 'beza dengan versi stabil',
	'review-logpage' => 'Log pemeriksaan',
	'review-logpagetext' => 'Yang berikut ialah log perubahan pada status [[{{MediaWiki:Validationpage}}|pengesahan]] semakan bagi laman kandungan.
Sila lihat [[Special:ReviewedPages|senarai laman diperiksa]] untuk senarai laman yang telah disahkan.',
	'reviewer' => 'Pemeriksa',
	'revisionreview' => 'Periksa semakan',
	'revreview-accuracy' => 'Ketepatan',
	'revreview-accuracy-0' => 'Tidak disahkan',
	'revreview-accuracy-1' => 'Dijenguk',
	'revreview-accuracy-2' => 'Tepat',
	'revreview-accuracy-3' => 'Bersumber',
	'revreview-accuracy-4' => 'Terpilih',
	'revreview-approved' => 'Disahkan',
	'revreview-auto' => '(automatik)',
	'revreview-auto-w' => "Anda sedang menyunting semakan stabil; sebarang perubahan akan '''ditanda periksa secara automatik'''.",
	'revreview-auto-w-old' => "Anda sedang menyunting sebuah semakan yang telah diperiksa; sebarang perubahan akan '''ditanda periksa secara automatik'''.",
	'revreview-basic' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] terakhir, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 perubahan] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-basic-i' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] terakhir, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/imej] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-basic-old' => 'Ini ialah sebuah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Beberapa [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan] baru mungkin telah dibuat.',
	'revreview-basic-same' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] terakhir ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.',
	'revreview-basic-source' => 'Terdapat sebuah [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versi dijenguk] bagi laman ini, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>, berdasarkan semakan ini.',
	'revreview-changed' => "'''Tindakan yang diminta tidak dapat dilakukan pada semakan bagi [[:$1|$1]] ini.'''

Sebuah templat atau imej mungkin telah diminta ketika tiada versi dinyatakan.
Masalah ini boleh berlaku jika terdapat sebuah templat dinamik yang memasukkan imej lain, atau templat yang bergantung kepada pemboleh ubah yang telah berubah ketika anda sedang memeriksa laman ini.
Masalah ini mungkin boleh diselesaikan dengan menyegarkan semula laman ini dan memeriksanya sekali lagi.",
	'revreview-current' => 'Draf',
	'revreview-depth' => 'Paras',
	'revreview-depth-0' => 'Tidak disahkan',
	'revreview-depth-1' => 'Asas',
	'revreview-depth-2' => 'Pertengahan',
	'revreview-depth-3' => 'Tinggi',
	'revreview-depth-4' => 'Terpilih',
	'revreview-draft-title' => 'Rencana draf',
	'revreview-edit' => 'Sunting draf',
	'revreview-flag' => 'Periksa semakan ini',
	'revreview-edited' => "'''Suntingan anda akan dijadikan [[{{MediaWiki:Validationpage}}|versi stabil]] setelah diperiksa oleh seorang pengguna yang beramanah. ''Draf'' bagi laman ini ditunjukkan di bawah.''' Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 perubahan] yang belum diperiksa.",
	'revreview-invalid' => "'''Sasaran tidak sah:''' tiada semakan [[{{MediaWiki:Validationpage}}|diperiksa]] dengan ID yang diberikan.",
	'revreview-legend' => 'Beri penilaian untuk kandungan semakan',
	'revreview-log' => 'Ulasan:',
	'revreview-main' => 'Anda hendaklah memilih sebuah semakan tertentu daripada sesebuah laman kandungan untuk diperiksa.

Sila lihat [[Special:Unreviewedpages|senarai laman yang belum diperiksa]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan dijenguk terakhir] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} senarai]) telah [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 perubahan] yang belum diperiksa.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan dijenguk terakhir] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} senarai]) telah [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/imej] yang belum diperiksa.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan bermutu terakhir] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} senarai]) telah [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 perubahan] yang belum diperiksa.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan bermutu terakhir] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} list all]) telah [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/imej] yang belum diperiksa.',
	'revreview-noflagged' => "Laman ini tidak mempunyai semakan yang diperiksa, oleh itu ia '''belum''' [[{{MediaWiki:Validationpage}}|disahkan]] bermutu.",
	'revreview-note' => '[[User:$1|$1]] membuat catatan berikut ketika [[{{MediaWiki:Validationpage}}|memeriksa]] semakan ini:',
	'revreview-notes' => 'Catatan:',
	'revreview-oldrating' => 'Penilaian:',
	'revreview-patrol' => 'Tanda ronda perubahan ini',
	'revreview-patrol-title' => 'Tanda ronda',
	'revreview-patrolled' => 'Semakan bagi [[:$1|$1]] yang anda pilih telah ditanda ronda.',
	'revreview-quality' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|bermutu]] terakhir, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 perubahan] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-quality-i' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|bermutu]] terakhir, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/imej] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-quality-old' => 'Ini ialah sebuah semakan [[{{MediaWiki:Validationpage}}|bermutu]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Beberapa [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan] baru mungkin telah dibuat.',
	'revreview-quality-same' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|bermutu]] terakhir ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.',
	'revreview-quality-source' => 'Terdapat sebuah [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versi bermutu] bagi laman ini, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>, berdasarkan semakan ini.',
	'revreview-quality-title' => 'Rencana bermutu',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Rencana dijenguk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Rencana dijenguk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Rencana dijenguk]]'''",
	'revreview-quick-invalid' => "'''ID semakan tidak sah'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Semakan semasa]]''' (belum diperiksa)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Rencana bermutu]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Rencana bermutu]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Rencana bermutu]]'''",
	'revreview-quick-see-basic' => "'''Draf''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat rencana]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perbezaan])",
	'revreview-quick-see-quality' => "'''Draf''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat rencana]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perbezaan])",
	'revreview-selected' => "Semakan '''$1:''' yang dipilih",
	'revreview-source' => 'sumber draf',
	'revreview-stable' => 'Laman stabil',
	'revreview-stable-title' => 'Rencana dijenguk',
	'revreview-stable1' => 'Anda boleh melihat [{{fullurl:$1|stableid=$2}} versi bertanda ini] untuk melihat sama ada ia sudah menjadi [{{fullurl:$1|stable=1}} versi stabil] bagi laman ini.',
	'revreview-stable2' => 'Anda boleh melihat [{{fullurl:$1|stable=1}} versi stabil] bagi laman ini (jika masih ada).',
	'revreview-style' => 'Gaya bahasa',
	'revreview-style-0' => 'Belum disahkan',
	'revreview-style-1' => 'Memuaskan',
	'revreview-style-2' => 'Baik',
	'revreview-style-3' => 'Padat',
	'revreview-style-4' => 'Terpilih',
	'revreview-submit' => 'Serah',
	'revreview-submitting' => 'Menyerah...',
	'revreview-finished' => 'Pemeriksaan selesai!',
	'revreview-successful' => "'''Semakan bagi [[:$1|$1]] berjaya ditanda. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} lihat semua versi stabil])'''",
	'revreview-successful2' => "'''Tanda semakan bagi [[:$1|$1]] berjaya dibuang.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] ialah kandungan laman lalai yang menggantikan semakan terbaru untuk dipaparkan kepada pengunjung.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] ialah semakan laman yang telah disahkan dan boleh dijadikan kandungan lalai untuk dipaparkan kepada pengunjung.''",
	'revreview-toggle-title' => 'papar/sembunyi butiran',
	'revreview-toolow' => 'Anda hendaklah memberi penilaian yang lebih tinggi daripada "tidak disahkan" kepada setiap kriteria di bawah.
Untuk menggugurkan semakan ini, sila berikan penilaian "tidak disahkan" kepada semua kriteria.',
	'revreview-update' => "Sila [[{{MediaWiki:Validationpage}}|periksa]] perubahan ''(ditunjukkan di bawah)'' yang telah dibuat sejak semakan stabil [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan].<br />
'''Beberapa templat/imej telah dikemaskinikan:'''",
	'revreview-update-includes' => "'''Beberapa templat/imej telah dikemaskinikan:'''",
	'revreview-update-none' => "Sila [[{{MediaWiki:Validationpage}}|periksa]] perubahan ''(ditunjukkan di bawah)'' yang telah dibuat sejak semakan stabil [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} disahkan].",
	'revreview-update-use' => "'''CATATAN:''' Jika sebarang templat/imej ini mempunyai versi stabil, maka versi itu telah pun digunakan dalam versi stabil bagi laman ini.",
	'revreview-diffonly' => "''Sila klik pautan \"semakan semasa\" dan gunakan borang pemeriksaan untuk memeriksa laman ini.''",
	'revreview-visibility' => "'''Laman ini mempunyai sebuah [[{{MediaWiki:Validationpage}}|versi stabil]]; tetapan baginya boleh [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} diubah].'''",
	'revreview-revnotfound' => 'Semakan lama untuk laman yang anda minta tidak dapat dijumpai. Sila semak URL yang anda gunakan untuk mencapai laman ini.',
	'right-autoreview' => 'Menanda jenguk semakan secara automatik',
	'right-movestable' => 'Memindahkan laman stabil',
	'right-review' => 'Menanda jenguk semakan',
	'right-stablesettings' => 'Menetapkan bagaimana versi stabil dipilih dan dipaparkan',
	'right-validate' => 'Menanda sah semakan',
	'rights-editor-autosum' => 'lantikan automatik',
	'rights-editor-revoke' => 'menarik status [[$1]] sebagai penyunting',
	'specialpages-group-quality' => 'Jaminan mutu',
	'stable-logentry' => 'mengubah tetapan versi stabil bagi [[$1]]',
	'stable-logentry2' => 'mengeset semula tetapan versi stabil bagi [[$1]]',
	'stable-logpage' => 'Log kestabilan',
	'stable-logpagetext' => 'Yang berikut ialah log perubahan pada tetapan [[{{MediaWiki:Validationpage}}|versi stabil]] bagi laman kandungan.
Senarai laman yang telah distabilkan boleh dilihat di [[Special:StablePages|senarai laman stabil]].',
	'revreview-filter-all' => 'Semua',
	'revreview-filter-approved' => 'Disahkan',
	'revreview-filter-reapproved' => 'Disahkan semula',
	'revreview-filter-unapproved' => 'Tidak disahkan',
	'revreview-filter-auto' => 'Automatik',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Jenis:',
	'tooltip-ca-current' => 'Lihat draf laman ini',
	'tooltip-ca-stable' => 'Lihat versi stabil bagi laman ini',
	'tooltip-ca-default' => 'Tetapan jaminan mutu',
	'revreview-locked-title' => 'Suntingan perlulah diperiksa terlebih dahulu sebelum dipaparkan di laman ini!',
	'revreview-unlocked-title' => 'Suntingan tidak perlu diperiksa untuk dipaparkan di laman ini!',
	'revreview-locked' => 'Suntingan perlulah diperiksa terlebih dahulu sebelum dipaparkan di laman ini!',
	'revreview-unlocked' => 'Suntingan tidak perlu diperiksa untuk dipaparkan di laman ini!',
	'revreview-tt-review' => 'Periksa laman ini',
	'validationpage' => '{{ns:help}}:Pengesahan rencana',
);

/** Maltese (Malti)
 * @author Giangian15
 */
$messages['mt'] = array(
	'revreview-revnotfound' => "Ir-reviżjoni l-antika tal-paġna li staqsejt dwar ma setgħatx tiġi minsuba. Jekk jogħġbok verifika l-URL li użajt sabiex tidħol f'din il-paġna.",
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'group-editor-member' => 'витницязо-петницязо',
	'revreview-style' => 'Ловновиксчизэ',
	'revreview-style-0' => 'А маштови',
	'revreview-style-1' => 'Маштови',
	'revreview-style-2' => 'Вадря',
	'revreview-style-3' => 'Ладязь лади',
	'revreview-filter-all' => 'Весе',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'revreview-style-2' => 'Cualli',
	'tooltip-ca-current' => 'Xiquitta āxcān zāzanilli ītzīmpēhualiz',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'flaggedrevs' => 'Tekente Versionen',
	'review-logentry-app' => 'hett de Version $2 vun „[[$1]]“ markeert',
	'revreview-accuracy-2' => 'akraat',
	'revreview-auto' => '(automaatsch)',
	'revreview-depth' => 'Deep',
	'revreview-depth-3' => 'hooch',
	'revreview-log' => 'Kommentar:',
	'revreview-patrol' => 'Dit Ännern as nakeken marken',
	'revreview-patrol-title' => 'As nakeken marken',
	'revreview-quick-invalid' => "'''Ungüllige Versions-ID'''",
	'revreview-style' => 'Leesborkeit',
	'revreview-style-2' => 'Good',
	'revreview-toggle-title' => 'wies/versteek Details',
	'revreview-revnotfound' => 'De Version vun disse Siet, no de du söökst, kunn nich funnen warrn. Prööv de URL vun disse Siet.',
);

/** Nedersaksisch (Nedersaksisch) */
$messages['nds-nl'] = array(
	'revreview-revnotfound' => 'De op-evreugen ouwe versie van disse pagina is onvientbaor. Kiek de URL dee-j gebruken nao um naor disse pagina te gaon.',
);

/** Dutch (Nederlands)
 * @author McDutchie
 * @author SPQRobin
 * @author Siebrand
 * @author Tvdm
 */
$messages['nl'] = array(
	'editor' => 'Redacteur',
	'flaggedrevs' => 'Aangevinkte versies',
	'flaggedrevs-backlog' => "Er is op dit moment een achterstand in de controle van [[Special:OldReviewedPages|pagina's met eindredactie die zijn bijgewerkt]]. 
'''Uw aandacht is gewenst!'''",
	'flaggedrevs-watched-pending' => "Er zijn op het moment [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} bewerkingen op uw volglijst die wachten op eindredactie].
'''Uw aandacht is gewenst!'''",
	'flaggedrevs-desc' => 'Geeft redacteuren/controleurs de mogelijkheid versies te waarderen en stabiele versies aan te merken',
	'flaggedrevs-pref-UI' => 'Interface stabiele versies:',
	'flaggedrevs-pref-UI-0' => 'Gedetailleerde gebruikersinterface voor stabiele versies gebruiken',
	'flaggedrevs-pref-UI-1' => 'Eenvoudige gebruikersinterface voor stabiele versies gebruiken',
	'prefs-flaggedrevs' => 'Stabiele versies',
	'flaggedrevs-prefs-stable' => "Altijd de stabiele versies van pagina's weergeven (als die bestaan)",
	'flaggedrevs-prefs-watch' => "Pagina's waar ik eindredactie voor doe aan mijn volglijst toevoegen",
	'group-editor' => 'redacteuren',
	'group-editor-member' => 'redacteur',
	'group-reviewer' => 'eindredacteuren',
	'group-reviewer-member' => 'eindredacteur',
	'grouppage-editor' => '{{ns:project}}:Redacteur',
	'grouppage-reviewer' => '{{ns:project}}:Eindredacteur',
	'group-autoreview' => 'Automatische controleurs',
	'group-autoreview-member' => 'automatische controleur',
	'grouppage-autoreview' => '{{ns:project}}:Automatische controleur',
	'hist-draft' => 'werkversie',
	'hist-quality' => 'kwaliteitsversie',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} eindredactie] door [[User:$3|$3]]',
	'hist-stable' => 'gecontroleerde versie',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} gecontroleerd] door [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatisch gecontroleerd]',
	'review-diff2stable' => 'Verschillen tussen stabiele versie en werkversie bekijken',
	'review-logentry-app' => 'heeft eindredactie gedaan voor versie $2 van [[$1]]',
	'review-logentry-dis' => 'heeft versie $2 van [[$1]] lager beoordeeld',
	'review-logentry-id' => 'bekijken',
	'review-logentry-diff' => 'verschil met stabiele versie',
	'review-logpage' => 'Eindredactielogboek',
	'review-logpagetext' => "Dit is een logboek met wijzigingen in de [[{{MediaWiki:Validationpage}}|waarderingsstatus]] van versies van pagina's.
In de [[Special:ReviewedPages|lijst van pagina's met eindredactie]] staan de goedgekeurde pagina's.",
	'reviewer' => 'Eindredacteur',
	'revisionreview' => 'Eindredactie voor versies',
	'revreview-accuracy' => 'Nauwkeurigheid',
	'revreview-accuracy-0' => 'Niet goedgekeurd',
	'revreview-accuracy-1' => 'Gecontroleerd',
	'revreview-accuracy-2' => 'Nauwkeurig',
	'revreview-accuracy-3' => 'Goed van bronnen voorzien',
	'revreview-accuracy-4' => 'Uitgelicht',
	'revreview-approved' => 'Goedgekeurd',
	'revreview-auto' => '(automatisch)',
	'revreview-auto-w' => "U bent de stabiele versie aan het bewerken. Wijzigingen worden '''automatisch goedgekeurd'''.",
	'revreview-auto-w-old' => "U bent een versie met eindredactie versie aan het bewerken. Wijzigingen worden '''automatisch goedgekeurd'''.",
	'revreview-basic' => 'Dit is de laatst [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] heeft [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wijziging|wijzigingen}}] die {{PLURAL:$3|wacht|wachten}} op eindredactie.',
	'revreview-basic-i' => 'Dit is de laatst [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] bevat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen in sjablonen/bestanden] die wachten op eindredactie.',
	'revreview-basic-old' => 'Dit is een [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} allemaal bekijken]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
Er kunnen nieuwe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen] gemaakt zijn.',
	'revreview-basic-same' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} allemaal bekijken]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.',
	'revreview-basic-source' => 'Een [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} gecontroleerde versie] van deze pagina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>, is gebaseerd op deze versie.',
	'revreview-blocked' => 'U kunt geen eindredactie uitvoeren voor deze versie omdat u geblokkeerd bent ([$1 details])',
	'revreview-changed' => "'''De gevraagde handeling kon niet uitgevoerd worden voor deze versie van [[:$1|$1]].'''
	
Er is een sjabloon of bestand opgevraagd zonder dat een specifieke versie is aangegeven.
Dit kan voorkomen als een dynamisch sjabloon een ander bestand of een ander sjabloon bevat, afhankelijk van een variabele die is gewijzigd sinds u bent begonnen met de beoordeling van deze pagina.
Ververs de pagina en start de beoordeling opnieuw om dit probleem op te lossen.",
	'revreview-current' => 'Werkversie',
	'revreview-depth' => 'Diepgang',
	'revreview-depth-0' => 'Niet goedgekeurd',
	'revreview-depth-1' => 'Basis',
	'revreview-depth-2' => 'Middelmatig',
	'revreview-depth-3' => 'Hoog',
	'revreview-depth-4' => 'Uitgelicht',
	'revreview-draft-title' => 'Werkversie',
	'revreview-edit' => 'werkversie bewerken',
	'revreview-editnotice' => "'''Bewerkingen aan deze pagina worden opgenomen in de [[{{MediaWiki:Validationpage}}|stabiele versie]] nadat een daartoe bevoegde gebruiker eindredactie heeft uitgevoerd.'''",
	'revreview-flag' => 'Eindredactie voor deze versie uitvoeren',
	'revreview-edited' => "'''Bewerkingen worden opgenomen in de [[{{MediaWiki:Validationpage}}|stabiele versie]] als een eindredacteur ze gecontroleerd heeft. De ''werkversie'' is hieronder te bekijken.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|bewerking wacht|bewerkingen wachten}}] op eindredactie.",
	'revreview-invalid' => "'''Ongeldige bestemming:''' er is geen versie met [[{{MediaWiki:Validationpage}}|eindredactie]] die overeenkomt met het opgegeven nummer.",
	'revreview-legend' => 'Versieinhoud waarderen',
	'revreview-log' => 'Opmerking:',
	'revreview-main' => "U moet een specifieke versie van een pagina kiezen waarvoor u eindredactie wilt doen.

Zie  de [[Special:Unreviewedpages|lijst met pagina's zonder eindredactie]].",
	'revreview-newest-basic' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} allemaal bekijken]) is [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|heeft|hebben}} eindredactie nodig.',
	'revreview-newest-basic-i' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} allemaal weergeven]) is [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen in sjablonen/bestanden] hebben eindredactie nodig.',
	'revreview-newest-quality' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatste kwaliteitsversie] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} allemaal bekijken]) is [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|heeft|hebben}} eindredactie nodig.',
	'revreview-newest-quality-i' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatste kwaliteitsversie] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} allemaal weergeven]) is [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen in sjablonen/bestanden] hebben eindredactie nodig.',
	'revreview-noflagged' => "Er zijn geen versies met eindredactie van deze pagina, dus die is wellicht '''niet''' [[{{MediaWiki:Validationpage}}|beoordeeld]] op kwaliteit.",
	'revreview-note' => '[[User:$1|$1]] heeft de volgende opmerkingen gemaakt bij de [[{{MediaWiki:Validationpage}}|eindredactie]] van deze versie:',
	'revreview-notes' => 'Weer te geven observaties of notities:',
	'revreview-oldrating' => 'Werd gewaardeerd als:',
	'revreview-patrol' => 'Deze bewerking als gecontroleerd markeren',
	'revreview-patrol-title' => 'Als gecontroleerd markeren',
	'revreview-patrolled' => 'De geselecteerde versie van [[:$1|$1]] is gemarkeerd als gecontroleerd.',
	'revreview-quality' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] heeft [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wijziging|wijzigingen}}] die {{PLURAL:$3|wacht|wachten}} op eindredactie.',
	'revreview-quality-i' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] bevat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen in sjablonen/bestanden] die wachten op eindredactie.',
	'revreview-quality-old' => 'Dit is een [[{{MediaWiki:Validationpage}}|kwaliteitsversie]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} alles bekijken]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
Er kunnen nieuwe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen] gemaakt zijn.',
	'revreview-quality-same' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} allemaal bekijken]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.',
	'revreview-quality-source' => 'Een [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kwaliteitsversie] van deze pagina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>, is gebaseerd op deze versie.',
	'revreview-quality-title' => 'Kwaliteitsversie',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Gecontroleerde versie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie bekijken]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Gecontroleerde versie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie bekijken]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Gecontroleerde versie]]'''",
	'revreview-quick-invalid' => "'''Ongeldig versienummer'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Huidige versie]]''' (niet gecontroleerd)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie bekijken]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie bekijken]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Werkversie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} vergelijken])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Werkversie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} vergelijken])",
	'revreview-selected' => "Geselecteerde versie van '''$1:'''",
	'revreview-source' => 'Brontekst werkversie',
	'revreview-stable' => 'Stabiele versie',
	'revreview-stable-title' => 'Gecontroleerde versie',
	'revreview-stable1' => 'U kunt van deze pagina [{{fullurl:$1|stableid=$2}} deze gecontroleerde versie] bekijken om te beoordelen of dit nu de [{{fullurl:$1|stable=1}} stabiele versie] is.',
	'revreview-stable2' => 'Wellicht wilt u de [{{fullurl:$1|stable=1}} stabiele versie] van deze pagina bekijken (als die er nog is).',
	'revreview-style' => 'Leesbaarheid',
	'revreview-style-0' => 'Niet goedgekeurd',
	'revreview-style-1' => 'Aanvaardbaar',
	'revreview-style-2' => 'Goed',
	'revreview-style-3' => 'Bondig',
	'revreview-style-4' => 'Uitgelicht',
	'revreview-submit' => 'Opslaan',
	'revreview-submitting' => 'Bezig met opslaan…',
	'revreview-finished' => 'Eindredactie afgerond.',
	'revreview-failed' => 'Het is niet gelukt de eindredactie te registreren!',
	'revreview-successful' => "'''De versie van [[:$1|$1]] is gecontroleerd. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} stabiele versies bekijken])'''",
	'revreview-successful2' => "'''De versie van [[:$1|$1]] is als niet stabiel aangemerkt.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabiele versies]] worden standaard weergegeven in plaats van de nieuwste versie.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabiele versies]] zijn gecontroleerde versies van pagina's die standaard weergegeven kunnen worden aan lezers.''",
	'revreview-toggle-title' => 'details weergeven/verbergen',
	'revreview-toolow' => 'U moet tenminste alle onderstaande eigenschappen hoger instellen dan "niet goedgekeurd" om voor een versie aan te merken geven dat deze eindredactie heeft gehad.
Stel alle velden in op "niet goedgekeurd" om de waardering van een versie te verwijderen.',
	'revreview-update' => "Voer [[{{MediaWiki:Validationpage}}|eindredactie]] uit op alle ''onderstaande'' wijzigingen die gemaakt zijn sinds de stabiele versie is [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd].<br />
'''Enkele sjablonen of bestanden zijn gewijzigd:'''",
	'revreview-update-includes' => "'''Sommige sjablonen/bestanden zijn bijgewerkt:'''",
	'revreview-update-none' => "Voer [[{{MediaWiki:Validationpage}}|eindredactie]] uit op de ''onderstaande'' wijzigingen die gemaakt zijn sinds de stabiele versie is [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd].",
	'revreview-update-use' => "'''Let op:''' als een van deze sjablonen of bestanden een stabiele versie heeft, dan wordt die al gebruikt in de stabiele versie van deze pagina.",
	'revreview-diffonly' => "''Klik voor eindredactie op de verwijzing \"huidige versie\" en gebruik het eindredactieformulier.''",
	'revreview-visibility' => "'''Deze pagina heeft een [[{{MediaWiki:Validationpage}}|stabiele versie]]. U kunt hiervoor [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} instellingen maken].'''",
	'revreview-visibility2' => "'''Deze pagina heeft een verouderde [[{{MediaWiki:Validationpage}}|stabiele versie]].
U kunt hiervoor [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} instellingen maken].'''",
	'revreview-visibility3' => "'''Deze pagina heeft geen [[{{MediaWiki:Validationpage}}|stabiele versie]].
U kunt hiervoor [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} instellingen maken].'''",
	'revreview-revnotfound' => 'De opgevraagde oude versie van deze pagina is onvindbaar.
Controleer de URL die u gebruikte om naar deze pagina te gaan.',
	'right-autoreview' => 'Versies automatisch als gecontroleerd markeren',
	'right-movestable' => "Stabiele pagina's hernoemen",
	'right-review' => 'Versies als gecontroleerd markeren',
	'right-stablesettings' => 'Instellen hoe een stabiele versie wordt geselecteerd en weergegeven',
	'right-validate' => 'Versies als gevalideerd markeren',
	'rights-editor-autosum' => 'automatisch',
	'rights-editor-revoke' => 'verwijderde redacteurstatus van [[$1]]',
	'specialpages-group-quality' => 'Kwaliteitscontrole',
	'stable-logentry' => 'heeft stabiele versies ingesteld voor [[$1]]',
	'stable-logentry2' => 'heeft stabiele versies opnieuw ingesteld voor [[$1]]',
	'stable-logpage' => 'Logboek stabiele versies',
	'stable-logpagetext' => "Dit is een logboek met wijzigingen aan de instellingen voor [[{{MediaWiki:Validationpage}}|stabiele versies]] voor de hoofdnaamruimte.
Zie ook de [[Special:StablePages|lijst met stabiele pagina's]].",
	'revreview-filter-all' => 'Alles',
	'revreview-filter-stable' => 'stabiel',
	'revreview-filter-approved' => 'Gekeurd',
	'revreview-filter-reapproved' => 'Opnieuw gekeurd',
	'revreview-filter-unapproved' => 'Niet gekeurd',
	'revreview-filter-auto' => 'Automatisch',
	'revreview-filter-manual' => 'Handmatig',
	'revreview-statusfilter' => 'Statuswijziging:',
	'revreview-typefilter' => 'Type:',
	'revreview-levelfilter' => 'Niveau:',
	'revreview-lev-sighted' => 'eindredactie',
	'revreview-lev-quality' => 'kwaliteitsversie',
	'revreview-lev-pristine' => 'onaangeroerd',
	'revreview-reviewlink' => 'eindredactie',
	'tooltip-ca-current' => 'Werkversie van deze pagina bekijken',
	'tooltip-ca-stable' => 'Stabiele versie van deze pagina bekijken',
	'tooltip-ca-default' => 'Instellingen kwaliteitsbewaking',
	'revreview-locked-title' => 'Bewerkingen op deze pagina behoeven eindredactie voordat ze weergegeven worden!',
	'revreview-unlocked-title' => 'Bewerkingen op deze pagina behoeven geen eindredactie voordat ze weergegeven worden!',
	'revreview-locked' => 'Bewerkingen op deze pagina behoeven eindredactie voordat ze weergegeven worden!',
	'revreview-unlocked' => 'Bewerkingen op deze pagina behoeven geen eindredactie voordat ze weergegeven worden!',
	'log-show-hide-review' => 'Waarderingslogboek $1',
	'revreview-tt-review' => 'Eindredactie voor deze pagina',
	'validationpage' => '{{ns:help}}:Paginaredactie',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Gunnernett
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'editor' => 'Skribent',
	'flaggedrevs' => 'Vurderte versjonar',
	'flaggedrevs-backlog' => "Det er ei opphoping av [[Special:OldReviewedPages|utdaterte endringar]] i vurderte sider. '''Merksemda di trengst!'''",
	'flaggedrevs-watched-pending' => "Det finst [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} endringar] på vurderte sider på overvakingslista di. '''Merksemda di trengst.'''",
	'flaggedrevs-desc' => 'Gjev skribentar og meldarar evna til å godkjenna sideversjonar og stabilisera sider',
	'flaggedrevs-pref-UI-0' => 'Nytt eit detaljert grensesnitt for stabile versjonar',
	'flaggedrevs-pref-UI-1' => 'Nytt eit enkelt grensesnitt for stabile versjonar',
	'flaggedrevs-prefs-stable' => 'Vis alltid den stabile versjonen av innhaldssidor (om ein finst)',
	'flaggedrevs-prefs-watch' => 'Legg til sidene eg vurderer i overvakingslista mi',
	'group-editor' => 'Skribentar',
	'group-editor-member' => 'skribent',
	'group-reviewer' => 'Meldarar',
	'group-reviewer-member' => 'Meldar',
	'grouppage-editor' => '{{ns:project}}:Skribentar',
	'grouppage-reviewer' => '{{ns:project}}:Meldarar',
	'group-autoreview' => 'Automeldarar',
	'group-autoreview-member' => 'automeldar',
	'grouppage-autoreview' => '{{ns:project}}:Automeldarar',
	'hist-draft' => 'utkast',
	'hist-quality' => 'kvalitetsversjon',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} godkjend] av [[User:$3|$3]]',
	'hist-stable' => 'vurdert versjon',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} vurdert] av [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatisk vurdert]',
	'review-diff2stable' => 'Syn endringar mellom den stabile og den noverande versjonen',
	'review-logentry-app' => 'vurderte versjon $2 av [[$1]]',
	'review-logentry-dis' => 'degraderte versjon $2 versjon av [[$1]]',
	'review-logentry-id' => 'sjå',
	'review-logentry-diff' => 'skilnad frå stabil versjon',
	'review-logpage' => 'Vurderingslogg',
	'review-logpagetext' => 'Dette er ein logg over endringar i [[{{MediaWiki:Validationpage}}|godkjenningsstoda]] til innhaldssider.
Sjå [[Special:ReviewedPages|lista over vurderte sider]] for ei lista over godkjende sider.',
	'reviewer' => 'Vurdert av',
	'revisionreview' => 'Vurder sideversjonar',
	'revreview-accuracy' => 'Vurdering',
	'revreview-accuracy-0' => 'Ikkje godkjend',
	'revreview-accuracy-1' => 'Vurdert',
	'revreview-accuracy-2' => 'Nøyaktig',
	'revreview-accuracy-3' => 'God kjeldetilvising',
	'revreview-accuracy-4' => 'Utmerka',
	'revreview-approved' => 'Godkjend',
	'revreview-auto' => '(automatisk)',
	'revreview-auto-w' => "Du endrar den stabile versjonen; endringar vert '''vurderte av seg sjølve'''.",
	'revreview-auto-w-old' => "Du endrar ein vurdert versjon; endringar vert '''vurderte av seg sjølve'''.",
	'revreview-basic' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|vurderte]] versjonen, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}}  vurdert] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|éi endring|$3 endringar}}] som ventar på vurdering.',
	'revreview-basic-i' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|vurderte]] sideversjonen, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} vurdert] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mal- eller biletendringar] som ventar på vurdering.',
	'revreview-basic-old' => 'Dette er ein [[{{MediaWiki:Validationpage}}|vurdert]] versjon ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} sjå alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.
Nye [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} endringar] kan ha vortne gjort.',
	'revreview-basic-same' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|vurderte]] versjonen ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} sjå alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.',
	'revreview-basic-source' => 'Ein [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} vurdert versjon] av denne sida, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>, byggjer på denne versjonen.',
	'revreview-blocked' => 'Du kan ikkje vurdera denne versjonen av di kontoen din for tida er blokkert ([$1 detaljar])',
	'revreview-changed' => "'''Den etterspurde handlinga kan ikkje verta utførd på denne sideversjonen av [[:$1|$1]].'''

Ein mal eller eit bilete kan ha vorte etterspurt utan ein spesifisert versjon. Dette kan henda om ein mal inneheld eit anna bilete eller ein mal avhengig av ein variabel som har vorten endra sidan du byrja å vurdera sida. Å oppdatera sida og vurdera ho på nytt kan løysa problemet.",
	'revreview-current' => 'Utkast',
	'revreview-depth' => 'Djupn',
	'revreview-depth-0' => 'Ikkje godkjend',
	'revreview-depth-1' => 'Grunnleggjande',
	'revreview-depth-2' => 'Medels',
	'revreview-depth-3' => 'God',
	'revreview-depth-4' => 'Utmerka',
	'revreview-draft-title' => 'Utkastsida',
	'revreview-edit' => 'Endra utkast',
	'revreview-editnotice' => "'''Endringar på denne sida vil verta inkluderte i den [[{{MediaWiki:Validationpage}}|stabile versjonen]] so snart ein autorisert brukar godkjenner dei.'''",
	'revreview-flag' => 'Vurder denne versjonen',
	'revreview-edited' => "'''Endringar vil verta inkluderte i den [[{{MediaWiki:Validationpage}}|stabile versjonen]] so snart ein autorisert brukar godkjenner dei.'''
'''''Utkastet'' er vist nedanfor.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|Éi endring|$2 endringar}}] ventar på vurdering.",
	'revreview-invalid' => "'''Ugyldig mål:''' ingen [[{{MediaWiki:Validationpage}}|vurderte]] versjonar svarer til den oppgjevne ID-en.",
	'revreview-legend' => 'Vurder versjonsinnhald',
	'revreview-log' => 'Kommentar:',
	'revreview-main' => 'Du lyt velja ein viss versjon av ei innhaldssida for å kunna gjera ei vurdering.

Sjå [[Special:Unreviewedpages|lista over sider som manglar vurdering]].',
	'revreview-newest-basic' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste godkjende versjonen] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} syn alle]) vart [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|Éi endring må verta vurdert|$3 endringar må verta vurderte}}].',
	'revreview-newest-basic-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste vurderte versjonen] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} syn alle]) vart [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mal- eller biletendringar] må verta vurderte.',
	'revreview-newest-quality' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste kvalitetssikra versjonen av sida]  ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} syn alle]) vart [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|Éi endring må verta vurdert|$3 endringar må verta vurderte}}].',
	'revreview-newest-quality-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste kvalitetssikra sideversjonen]  ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} syn alle]) vart [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mal- eller biletendringar] må verta vurderte.',
	'revreview-noflagged' => "Det finst ingen vurderte versjonar av denne sida, so ho har kanskje '''ikkje''' vorten [[{{MediaWiki:Validationpage}}|sjekka]] for kvalitet.",
	'revreview-note' => '[[User:$1|$1]] gjorde fylgjande merknader under [[{{MediaWiki:Validationpage}}|vurderinga]] av denne sideversjonen:',
	'revreview-notes' => 'Observasjonar eller merknader:',
	'revreview-oldrating' => 'Vart vurdert som:',
	'revreview-patrol' => 'Merk denne endringa som patruljert',
	'revreview-patrol-title' => 'Merk som patruljert',
	'revreview-patrolled' => 'Den valde versjonen av [[:$1|$1]] er vorten merkt som patruljert.',
	'revreview-quality' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|éi endring|$3 endringar}}] som ventar på vurdering.',
	'revreview-quality-i' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} bilet- eller malendringar] som ventar på vurdering.',
	'revreview-quality-old' => 'Dette er ein [[{{MediaWiki:Validationpage}}|kvalitetsversjon]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} sjå alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.
Nye [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} endringar] kan ha vortne gjort.',
	'revreview-quality-same' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} sjå alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.',
	'revreview-quality-source' => 'Ein [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kvalitetsversjon] av denne sida, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>, byggjer på denne versjonen.',
	'revreview-quality-title' => 'Kvalitetsartikkel',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Vurdert artikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} syn utkast]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Vurdert artikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} syn utkast]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Vurdert artikkel]]'''",
	'revreview-quick-invalid' => "'''Ugyldig versjons-ID'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Siste versjon]]''' (ikkje vurdert)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} syn utkast]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} syn utkast]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Utkast]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} syn vurdert artikkel]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} jamfør])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Utkast]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} syn vurdert artikkel]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} jamfør])",
	'revreview-selected' => "Vald versjon av '''$1''':",
	'revreview-source' => 'kjeldetekst for utkast',
	'revreview-stable' => 'Stabil sida',
	'revreview-stable-title' => 'Vurdert artikkel',
	'revreview-stable1' => 'Du ynskjer kanskje å sjå [{{fullurl:$1|stableid=$2}} denne merkte versjonen] og sjå om han er den [{{fullurl:$1|stable=1}} stabile versjonen] av denne sida.',
	'revreview-stable2' => 'Du ynskjer kanskje å sjå den [{{fullurl:$1|stable=1}} stabile versjoen] av sida (om det enno finst ein).',
	'revreview-style' => 'Lesbarheit',
	'revreview-style-0' => 'Ikkje godkjend',
	'revreview-style-1' => 'Akseptabel',
	'revreview-style-2' => 'Bra',
	'revreview-style-3' => 'Konsis',
	'revreview-style-4' => 'Utmerka',
	'revreview-submit' => 'Utfør',
	'revreview-submitting' => 'Leverer …',
	'revreview-finished' => 'Vurdering fullførd.',
	'revreview-successful' => "'''Vald versjon av [[:$1|$1]] har vorte merkt. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} sjå alle stabile versjonar])'''",
	'revreview-successful2' => "'''Vald versjon av [[:$1|$1]] vart degradert.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabile sideversjonar]] er standardsideinnhald i staden for den siste versjonen.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabile sideversjonar]] er kontrollerte versjonar av sider og kan verta nytta som standardinnhald for lesarar.''",
	'revreview-toggle-title' => 'syn/løyn detaljar',
	'revreview-toolow' => 'Vurderinga di av sida lyt minst vera over «ikkje godkjend» for alle eigenskapane nedanfor for at versjonen skal kunna vera vurdert. For å degradera ein versjon, oppgje «ikkje godkjend» for alle eigenskapane.',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Vurder]] endringar ''(synte nedanfor)'' som er vortne gjort sidan den stabile versjonen vart [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend].<br />
'''Nokre malar eller bilete vart oppdaterte:'''",
	'revreview-update-includes' => "'''Nokre malar/bilete vart oppdaterte:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Vurder]] endringar ''(synte nedanfor)'' som er vortne gjort sidan den stabile versjonen vart [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjend].",
	'revreview-update-use' => "'''MERK:''' Om einkvan av desse malane og/eller eitkvart av desse bileta har ein stabil versjon, er han alt nytta i den stabile versjonen av denne sida.",
	'revreview-diffonly' => "''For å vurdera sida, trykk på versjonslekkja «noverande versjon» og nytt vurderingskjemaet.''",
	'revreview-visibility' => "'''Denne sida har ein oppdatert [[{{MediaWiki:Validationpage}}|stabil versjon]]; innstillingar for stabile sider kan ein [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} endra].'''",
	'revreview-visibility2' => "'''Denne sida har ein utdatert [[{{MediaWiki:Validationpage}}|stabil sideversjon]]. Stabilitetsinnstillingane kan ein [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} endra].'''",
	'revreview-visibility3' => "'''Denne sida har ikkje ein  [[{{MediaWiki:Validationpage}}|stabil sideversjon]]. Stabilitetsinnstillingane for sider kan ein [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} endra].'''",
	'revreview-revnotfound' => 'Den gamle versjonen av sida du spurde etter finst ikkje. Sjekk nettadressa du brukte for å komma deg åt denne sida.',
	'right-autoreview' => 'Automatisk merkja sideverjonar som vurderte',
	'right-movestable' => 'Flytta stabile sider',
	'right-review' => 'Merkja sideversjonar som vurderte',
	'right-stablesettings' => 'Endra korleis stabile versjonar vert valde og viste',
	'right-validate' => 'Merkja sideversjonar som godkjende',
	'rights-editor-autosum' => 'fremja automatisk',
	'rights-editor-revoke' => 'fjerna skribentrettane til [[$1]]',
	'specialpages-group-quality' => 'Sikring av kvalitet',
	'stable-logentry' => 'endra innstillingar for stabile versjonar av [[$1]]',
	'stable-logentry2' => 'gjorde om innstillingar for stabile versjonar av [[$1]]',
	'stable-logpage' => 'Versjonsstabiliseringslogg',
	'stable-logpagetext' => 'Dette er ein logg over endringar av innstillingane for [[{{MediaWiki:Validationpage}}|stabile sideversjonar]] av innhaldssider.
Ei lista over stabiliserte sider finst på [[Special:StablePages|lista over stabile sider]].',
	'revreview-filter-all' => 'Alle',
	'revreview-filter-stable' => 'stabil',
	'revreview-filter-approved' => 'Godkjende',
	'revreview-filter-reapproved' => 'Godkjende på nytt',
	'revreview-filter-unapproved' => 'Ikkje godkjende',
	'revreview-filter-auto' => 'Automatisk',
	'revreview-filter-manual' => 'Manuelt',
	'revreview-statusfilter' => 'Endring i stoda:',
	'revreview-typefilter' => 'Type:',
	'revreview-levelfilter' => 'Nivå:',
	'revreview-lev-sighted' => 'vurdert',
	'revreview-lev-quality' => 'kvalitet',
	'revreview-lev-pristine' => 'opphavleg',
	'revreview-reviewlink' => 'vurder',
	'tooltip-ca-current' => 'Syn det noverande utkastet til sida',
	'tooltip-ca-stable' => 'Syn den stabile versjonen av sida',
	'tooltip-ca-default' => 'Innstillingar for kvalitetssikring',
	'revreview-locked-title' => 'Endringar må verta vurderte før dei vert synte på denne sida.',
	'revreview-unlocked-title' => 'Endringar treng ikkje verta vurderte før dei vert synte på denne sida.',
	'revreview-locked' => 'Endringar må verta vurderte før dei vert synte på denne sida.',
	'revreview-unlocked' => 'Endringar treng ikkje verta vurderte før dei vert synte på denne sida.',
	'log-show-hide-review' => '$1 vurderingslogg',
	'revreview-tt-review' => 'Vurder denne sida',
	'validationpage' => '{{ns:help}}:Sidegodkjenning',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author EivindJ
 * @author H92
 * @author Harald Khan
 * @author Jon Harald Søby
 * @author Kph
 * @author Meno25
 * @author Nghtwlkr
 * @author Stigmj
 */
$messages['no'] = array(
	'editor' => 'Skribent',
	'flaggedrevs' => 'Stabile versjoner',
	'flaggedrevs-backlog' => "Det er en oppsamling av [[Special:OldReviewedPages|ventende endringer]] i kø for vurdering. '''Din oppmerksomhet trengs!'''",
	'flaggedrevs-watched-pending' => "Det finnes [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} ventende endringer] på vurderte sider i din overvåkningsliste. '''Din oppmerksomhet trengs!'''",
	'flaggedrevs-desc' => 'Gir skribenter og anmeldere muligheten til å godkjenne sideversjoner og stabilisere sider',
	'flaggedrevs-pref-UI' => 'Grensesnitt for stabil versjon:',
	'flaggedrevs-pref-UI-0' => 'Bruk detaljert grensesnitt for stabile versjoner',
	'flaggedrevs-pref-UI-1' => 'Bruk enkelt grensesnitt for stabile versjoner',
	'prefs-flaggedrevs' => 'Stabilitet',
	'flaggedrevs-prefs-stable' => 'Vis alltid den stabile versjonen av sider (om en slik finnes)',
	'flaggedrevs-prefs-watch' => 'Legg til sider jeg anmelder i overvåkningslisten min',
	'group-editor' => 'Skribenter',
	'group-editor-member' => 'Skribent',
	'group-reviewer' => 'Anmeldere',
	'group-reviewer-member' => 'Anmelder',
	'grouppage-editor' => '{{ns:project}}:Skribenter',
	'grouppage-reviewer' => '{{ns:project}}:Anmeldere',
	'group-autoreview' => 'Autoanmeldere',
	'group-autoreview-member' => 'autoanmelder',
	'grouppage-autoreview' => '{{ns:project}}:Autoanmelder',
	'hist-draft' => 'utkastversjon',
	'hist-quality' => 'kvalitetsversjon',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} godkjent] av [[User:$3|$3]]',
	'hist-stable' => 'kontrollert versjon',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} sjekket] av [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatisk vurdert]',
	'review-diff2stable' => 'Vis endringer mellom den stabile og den nåværende revisjonen',
	'review-logentry-app' => 'vurderte versjon $2 av [[$1]]',
	'review-logentry-dis' => 'degraderte versjon $2 av [[$1]]',
	'review-logentry-id' => 'vis',
	'review-logentry-diff' => 'forskjell fra stabil versjon',
	'review-logpage' => 'Anmeldingslogg',
	'review-logpagetext' => 'Dette er en logg over endringer i [[{{MediaWiki:Validationpage}}|godkjenningsstatusen]] for innholdssider.
Se [[Special:ReviewedPages|listen over anmeldte sider]] for en liste over godkjente sider.',
	'reviewer' => 'Anmelder',
	'revisionreview' => 'Anmeld sideversjoner',
	'revreview-accuracy' => 'Nøyaktighet',
	'revreview-accuracy-0' => 'Ikke godkjent',
	'revreview-accuracy-1' => 'Sjekket',
	'revreview-accuracy-2' => 'Nøyaktig',
	'revreview-accuracy-3' => 'Godt kildebelagt',
	'revreview-accuracy-4' => 'Utmerket',
	'revreview-approved' => 'Godkjent',
	'revreview-auto' => '(automatisk)',
	'revreview-auto-w' => "Du redigerer den stabile versjonen; endringer blir '''automatisk anmeldt'''.",
	'revreview-auto-w-old' => "Du redigerer en anmeldt versjon; endringer blir '''automatisk anmeldt'''.",
	'revreview-basic' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|sjekkede]] versjonen, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}}  sjekket] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|endring|endringer}}] som venter på anmelding.',
	'revreview-basic-i' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|vurderte]] sideversjonen, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mal- eller bildeendringer] som venter på vurdering.',
	'revreview-basic-old' => 'Dette er en [[{{MediaWiki:Validationpage}}|sjekket]] sideversjon ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} se alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.
Nye [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} endringer] har blitt gjort.',
	'revreview-basic-same' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|sjekkede]] sideversjonen ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} se alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.',
	'revreview-basic-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} sjekket versjon] av denne siden, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>, ble basert på denne versjonen.',
	'revreview-blocked' => 'Du kan ikke vurdere denne versjonen fordi kontoen din for tiden er blokkert ([$1 detaljer])',
	'revreview-changed' => "'''Den etterspurte handlingen kan ikke utføres på denne versjonen av [[:$1|$1]].'''

En mal eller en fil kan ha blitt etterspurt uten noen spesifisert versjon.
Dette kan skje om en dynamisk mal inneholder en annen fil eller en mal avhengig av en variabel som er blitt endret siden du begynte å vurdere siden.
Å oppdatere siden og vurdere siden på nytt kan løse problemet.",
	'revreview-current' => 'Utkast',
	'revreview-depth' => 'Dybde',
	'revreview-depth-0' => 'Ikke godkjent',
	'revreview-depth-1' => 'Grunnleggende',
	'revreview-depth-2' => 'Middels',
	'revreview-depth-3' => 'Høy',
	'revreview-depth-4' => 'Utmerket',
	'revreview-draft-title' => 'Utkastside',
	'revreview-edit' => 'Rediger utkast',
	'revreview-editnotice' => "'''Endringer på denne siden vil bli inkludert i den [[{{MediaWiki:Validationpage}}|stabile versjonen]] så snart en autorisert bruker godkjenner dem.'''",
	'revreview-flag' => 'Anmeld denne sideversjonen',
	'revreview-edited' => "'''Endringer vil legges til den [[{{MediaWiki:Validationpage}}|stabile versjonen]] når en etablert bruker sjekker den.
''Utkastet'' vises nedenfor.''' [{{fullurl:{{FULLPAGENAME}}|oldid=$1|diff=cur}} $2 {{PLURAL:$2|endring venter|endringer venter}}] på å bli sjekket.",
	'revreview-invalid' => "'''Ugyldig mål:''' ingen [[{{MediaWiki:Validationpage}}|anmeldte]] versjoner tilsvarer den angitte ID-en.",
	'revreview-legend' => 'Vurder versjonens innhold',
	'revreview-log' => 'Kommentar:',
	'revreview-main' => 'Du må velge en viss revisjon av en innholdssiden for å anmelde den.

Se [[Special:Unreviewedpages|listen over uanmeldte sider]].',
	'revreview-newest-basic' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste godkjente versjonen] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|endring|endringer}}] må vurderes.',
	'revreview-newest-basic-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste vurderte versjonen] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mal- eller filendringer] må vurderes.',
	'revreview-newest-quality' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste kvalitetssikrede versjonen av siden]  ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|endring|endringer}}] må vurderes.',
	'revreview-newest-quality-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste kvalitetssikrede versjonen av siden]  ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mal- eller filendringer] må vurderes.',
	'revreview-noflagged' => "Det er ingen anmeldte versjoner av denne siden, så den har kanskje '''ikke''' blitt [[{{MediaWiki:Validationpage}}|kvalitetssjekket]].",
	'revreview-note' => '[[User:$1|$1]] hadde følgende merknader under [[{{MediaWiki:Validationpage}}|anmeldelsen]] av denne sideversjonen:',
	'revreview-notes' => 'Anmerkninger som vil vises:',
	'revreview-oldrating' => 'Den ble anmeldt som:',
	'revreview-patrol' => 'Merk denne endringen som patruljert',
	'revreview-patrol-title' => 'Merk som patruljert',
	'revreview-patrolled' => 'Den valgte versjonen av [[:$1|$1]] har blitt merket som patruljert.',
	'revreview-quality' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|én endring|$3 endringer}}] som venter på anmeldelse.',
	'revreview-quality-i' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mal- eller filendringer] som venter på anmeldelse.',
	'revreview-quality-old' => 'Dette er en [[{{MediaWiki:Validationpage}}|kvalitetsversjon]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} se alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.
Nye [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} endringer] kan ha blitt gjort.',
	'revreview-quality-same' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} se alle]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.',
	'revreview-quality-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kvalitetsversjon] av denne siden, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>, ble basert på denne versjonen.',
	'revreview-quality-title' => 'Kvalitetsside',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Vurdert side]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Vurdert side]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Vurdert side]]'''",
	'revreview-quick-invalid' => "'''Ugyldig versjons-ID'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Siste versjon]]''' (ikke sjekket)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsside]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsside]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsside]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Utkast]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vis side]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} sammenlign])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Utkast]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vis side]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} sammenlign])",
	'revreview-selected' => "Valgt versjon av '''$1''':",
	'revreview-source' => 'utkastets kilde',
	'revreview-stable' => 'Stabil side',
	'revreview-stable-title' => 'Vurdert side',
	'revreview-stable1' => 'Du vil kanskje se [{{fullurl:$1|stableid=$2}} denne flaggede versjonen] og se om den er den [{{fullurl:$1|stable=1}} stabile versjonen] av denne siden.',
	'revreview-stable2' => 'Du vil kanskje se den [{{fullurl:$1|stable=1}} stabile versjoen] av denne siden (om det fortsatt er en).',
	'revreview-style' => 'Lesbarhet',
	'revreview-style-0' => 'Ikke godkjent',
	'revreview-style-1' => 'Akseptabel',
	'revreview-style-2' => 'Bra',
	'revreview-style-3' => 'Konsis',
	'revreview-style-4' => 'Utmerket',
	'revreview-submit' => 'Send',
	'revreview-submitting' => 'Leverer …',
	'revreview-finished' => 'Anmeldelse fullført.',
	'revreview-failed' => 'Vurdering feilet!',
	'revreview-successful' => "'''Valgt versjon av [[:$1|$1]] har blitt merket. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} se alle stabile versjoner])'''",
	'revreview-successful2' => "'''Valgt versjon av [[:$1|$1]] ble degradert.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabile versjoner]] er standardinnhold i sider i stedet for den nyeste versjonen.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabile versjoner]] er kontrollerte versjoner av sider og kan stilles som standardinnhold for lesere.''",
	'revreview-toggle-title' => 'vis/skjul detaljer',
	'revreview-toolow' => 'Din vurdering av siden må minst være over «ikke godkjent» for alle egenskaper nedenfor for at versjonen skal anses som anmeldt. For å fjerne godkjenning av en versjon, angi «ikke godkjent» for alle egenskapene.',
	'revreview-update' => "Vennligst [[{{MediaWiki:Validationpage}}|vurder]] endringene ''(vist nedenfor)'' som har blitt gjort siden den stabile versjonen ble [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent].<br />
'''Enkelte maler eller filer ble oppdatert:'''",
	'revreview-update-includes' => "'''Noen maler eller filer ble oppdatert:'''",
	'revreview-update-none' => "Vennligst [[{{MediaWiki:Validationpage}}|anmeld]] endringer ''(vis nedenfor)'' som er blitt gjort siden den stabile versjonen ble [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkjent].",
	'revreview-update-use' => "'''MERK:''' Om noen av disse malene eller filene har en stabil versjon, er den allerede i bruk i den stabile versjonen av denne siden.",
	'revreview-diffonly' => "''For å anmelde siden, klikk på versjonslenken «nåværende versjon» og bruk anmeldelsesskjemaet.''",
	'revreview-visibility' => "'''Denne siden har en oppdatert [[{{MediaWiki:Validationpage}}|stabil versjon]]; innstillinger for stabile sider kan [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigureres].'''",
	'revreview-visibility2' => "'''Denne siden har en utdatert [[{{MediaWiki:Validationpage}}|stabil versjon]]; innstillinger for sidestabilitet kan [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigureres].'''",
	'revreview-visibility3' => "'''Denne siden har ingen [[{{MediaWiki:Validationpage}}|stabil versjon]]; innstillinger for sidestabilitet kan [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigureres].'''",
	'revreview-revnotfound' => 'Den gamle versjon av siden du etterspurte finnes ikke. Kontroller adressen du brukte for å få adgang til denne siden.',
	'right-autoreview' => 'Merke sideversjoner som kontrollerte automatisk',
	'right-movestable' => 'Flytte stabile sider',
	'right-review' => 'Merke sideversjoner som kontrollerte',
	'right-stablesettings' => 'Stille inn hvordan stabile versjoner velges og vises',
	'right-validate' => 'Merke sideversjoner som validerte',
	'rights-editor-autosum' => 'automatisk forfremmet',
	'rights-editor-revoke' => 'fjernet skribentstatus fra [[$1]]',
	'specialpages-group-quality' => 'Kvalitetsforsikring',
	'stable-logentry' => 'endret innstillinger for stabile versjoner av [[$1]]',
	'stable-logentry2' => 'tilbakestilte innstillinger for stabile versjoner av [[$1]]',
	'stable-logpage' => 'Versjonsstabiliseringslogg',
	'stable-logpagetext' => 'Dette er en logg over endringer av innstillingene for [[{{MediaWiki:Validationpage}}|stabile versjoner]] av innholdssider.
En liste over stabiliserte sider kan finnes på [[Special:StablePages|listen over stabile sider]].',
	'revreview-filter-all' => 'Alle',
	'revreview-filter-stable' => 'stabil',
	'revreview-filter-approved' => 'Godkjente',
	'revreview-filter-reapproved' => 'Gjen-godkjente',
	'revreview-filter-unapproved' => 'Ikke godkjente',
	'revreview-filter-auto' => 'Automatisk',
	'revreview-filter-manual' => 'Manuelt',
	'revreview-statusfilter' => 'Statusendring:',
	'revreview-typefilter' => 'Type:',
	'revreview-levelfilter' => 'Nivå:',
	'revreview-lev-sighted' => 'vurdert',
	'revreview-lev-quality' => 'kvalitet',
	'revreview-lev-pristine' => 'urørt',
	'revreview-reviewlink' => 'vurder',
	'tooltip-ca-current' => 'Vis nåværende utkast av denne siden',
	'tooltip-ca-stable' => 'Vis den stabile versjonen av denne siden',
	'tooltip-ca-default' => 'Innstillinger for kvalitetssikring',
	'revreview-locked-title' => 'Redigeringer må anmeldes før de vises på denne siden.',
	'revreview-unlocked-title' => 'Redigeringer må ikke anmeldes før de vises på denne siden.',
	'revreview-locked' => 'Redigeringer må anmeldes før de vises på denne siden.',
	'revreview-unlocked' => 'Redigeringer må ikke anmeldes før de vises på denne siden.',
	'log-show-hide-review' => '$1 vurderingslogg',
	'revreview-tt-review' => 'Anmeld denne siden',
	'validationpage' => '{{ns:help}}:Sidegodkjenning',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'editor' => 'Morulaganyi',
	'group-editor' => 'Barulaganyi',
	'group-editor-member' => 'Morulaganyi',
	'grouppage-editor' => '{{ns:project}}:Morulaganyi',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'editor' => 'Contributor',
	'flaggedrevs' => 'Revisions marcadas',
	'flaggedrevs-backlog' => "I a actualament de prètfaches tardièrs dins la [[Special:OldReviewedPages|Lista de las modificacions en espèra]] de las paginas revisadas. '''Aquò necessita vòstra atencion !'''",
	'flaggedrevs-watched-pending' => "I a actualament [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} de modificacions en espèra] de paginas relegidas dins vòstra lista de seguit. '''Prestatz-i atencion !'''",
	'flaggedrevs-desc' => "Balha la possibilitat als editors o als relectors de validar las modificacions e d'estabilizar las paginas.",
	'flaggedrevs-pref-UI' => 'Interfàcia de las versions establas :',
	'flaggedrevs-pref-UI-0' => "Utilizar l’interfàcia d'utilizaire de la version establa detalhada",
	'flaggedrevs-pref-UI-1' => "Utilizar una simpla interfàcia d'utilizaire establa",
	'prefs-flaggedrevs' => 'Estabilitat',
	'flaggedrevs-prefs-stable' => "Afichar totjorn la version establa del contengut de las paginas per defaut (se n'existís una)",
	'flaggedrevs-prefs-watch' => "Apond las paginas qu'ai revistas a ma lista de seguit.",
	'group-editor' => 'Contributors',
	'group-editor-member' => 'Contributor',
	'group-reviewer' => 'Revisors',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Reviewer',
	'group-autoreview' => 'Revisadors automatics',
	'group-autoreview-member' => 'revisador automatic',
	'grouppage-autoreview' => '{{ns:project}}:Revisador automatic',
	'hist-draft' => 'version borrolhon',
	'hist-quality' => 'qualitat de la version',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validada] per [[User:$3|$3]]',
	'hist-stable' => 'Version visualizada',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} visada] per [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} revista automaticament]',
	'review-diff2stable' => 'Vejatz las modificacions entre las versions establas e actualas.',
	'review-logentry-app' => 'a revist v$2 de [[$1]]',
	'review-logentry-dis' => 'a depreciat v$2 de [[$1]]',
	'review-logentry-id' => 'afichar',
	'review-logentry-diff' => 'dif cap a la version establa',
	'review-logpage' => 'Jornal de las relecturas',
	'review-logpagetext' => "Vaquí lo jornal de las modificacions de l'estatut [[{{MediaWiki:Validationpage}}|d'aprobacion]] de las revisions del contengut de las paginas.
Vejatz la tièra [[Special:ReviewedPages|de las paginas relegidas]] per una tièra de las que son aprobadas.",
	'reviewer' => 'Revisor',
	'revisionreview' => 'Tornar veire las versions',
	'revreview-accuracy' => 'Precision',
	'revreview-accuracy-0' => 'Pas aprobada',
	'revreview-accuracy-1' => 'Vista',
	'revreview-accuracy-2' => 'Precis',
	'revreview-accuracy-3' => 'Plan fontada',
	'revreview-accuracy-4' => 'Remirable',
	'revreview-approved' => 'Aprobat',
	'revreview-auto' => '(automatic)',
	'revreview-auto-w' => "Sètz a modificar una version establa, las modificacions seràn '''automaticament relegidas'''.",
	'revreview-auto-w-old' => "Sètz a modificar una version anciana relegida ; las modificacions '''seràn automaticament relegidas'''.",
	'revreview-basic' => "Es la darrièra [[{{MediaWiki:Validationpage}}|version vista]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} esbòs] pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificat]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 cambiament espèra|$3 cambiaments espèran}}] una revision.",
	'revreview-basic-i' => 'Vaquí la darrièra version [[{{MediaWiki:Validationpage}}|visualizada]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] lo <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrolhon] compòrta de [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambiaments de modèl o de fichièrs] en espèra de relectura.',
	'revreview-basic-old' => 'Vaquí una version [[{{MediaWiki:Validationpage}}|visada]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} lista entièra]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificacions novèlas] pòdon èsser estada efectuadas.',
	'revreview-basic-same' => 'Aquò es la darrièra version [[{{MediaWiki:Validationpage}}|susvelhada]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] sur <i>$2</i>. La pagina pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada].',
	'revreview-basic-source' => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version visada] d'aquesta pagina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>, es estada basada en defòra d'aquesta version.",
	'revreview-blocked' => 'Podètz pas revisar aquesta revision perque vòstre compte es blocat ([$1 detalhs])',
	'revreview-changed' => "'''L'accion demandada a pas pogut èsser realizada per aquesta version de [[:$1|$1]].'''

Es possible qu'un modèl o un fichièr siá estat demandat alara que cap de version precisa èra pas causida.
Aquò pòt susvenir quora un modèl dinamic inclutz un fichièr o un autre modèl que depend d'un autra variabla qu'a cambiat dempuèi qu'avètz començat de tornar legir aquesta pagina.
Tornatz cargat la pagina e tornatz-la legir tornamai ; aquò deuriá corregir aqueste problèma.",
	'revreview-current' => 'Esbòs',
	'revreview-depth' => 'Prigondor',
	'revreview-depth-0' => 'Pas aprobada',
	'revreview-depth-1' => 'De basa',
	'revreview-depth-2' => 'Moderat',
	'revreview-depth-3' => 'Elevada',
	'revreview-depth-4' => 'Remirabla',
	'revreview-draft-title' => 'Borrolhon de pagina',
	'revreview-edit' => 'Esbòs de modificacion',
	'revreview-editnotice' => "'''Nòta : Las modificacions sus aquesta pagina seràn incorporada dins la [[{{MediaWiki:Validationpage}}|version establa]] un còp qu’un utilizaire abilitat las aurà relegidas.'''",
	'revreview-flag' => 'Evaluar aquesta version',
	'revreview-edited' => "'''Las modificacions novèlas seràn incorporadas dins [[{{MediaWiki:Validationpage}}|la version establa]] un còp qu’un utilizaire autorizat las aurà relegidas.

Lo ''borrolhon'' es visible çaijós. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|modificacion espèra|modificacions espèran}}] una relectura.",
	'revreview-invalid' => "'''Cibla incorrècta :''' cap de version [[{{MediaWiki:Validationpage}}|relegida]] correspond pas al numèro indicat.",
	'revreview-legend' => 'Evaluar lo contengut de la version',
	'revreview-log' => 'Comentari al jornal :',
	'revreview-main' => 'Vos cal causir una version precisa a partir del contengut en règla de la pagina per revisar. Vejatz [[Special:Unreviewedpages|Versions pas revisadas]] per una tièra de paginas.',
	'revreview-newest-basic' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version vista] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} las veire totas]) èra [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambiament|cambiaments}}] {{PLURAL:$3|demanda|demandan}} una revision.",
	'revreview-newest-basic-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version visualizada] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vejatz la lista]) es estada [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] lo <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambiaments de modèls o defichièrs] necessitan una relectura.',
	'revreview-newest-quality' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version de qualitat] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} las veire totas]) èra [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambiament|cambiaments}}] {{PLURAL:$3|demanda|demandan}} una revision.",
	'revreview-newest-quality-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version de qualitat] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vejatz la lista]) es estada [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] lo <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificacions de modèls o de fichièrs] necessitan una relectura.',
	'revreview-noflagged' => "I a pas de version revisada d'aquesta pagina, sa [[{{MediaWiki:Validationpage}}|qualitat]] es incèrtana.",
	'revreview-note' => '[[User:$1|$1]] a escrich aquestas nòtas de revision :',
	'revreview-notes' => "Observacions e nòtas d'afichar :",
	'revreview-oldrating' => 'Son puntatge :',
	'revreview-patrol' => 'Marcar aquesta modificacion coma patrolhada',
	'revreview-patrol-title' => 'Marcar coma patrolhada',
	'revreview-patrolled' => 'La version seleccionada de [[:$1|$1]] es estada marcada coma patrolhada.',
	'revreview-quality' => "Es la darrièra [[{{MediaWiki:Validationpage}}|version de qualitat]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} esbòs] pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificat]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 cambiament espèra|$3 cambiaments espèran}}] una revision.",
	'revreview-quality-i' => 'Es la darrièra version [[{{MediaWiki:Validationpage}}|de qualitat]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrolhon] compòrta de [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambiaments de modèls o de fichièrs] en espèra de relectura.',
	'revreview-quality-old' => 'Vaquí una version de [[{{MediaWiki:Validationpage}}|qualitat]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tot listar]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificacions novèlas] pòdon èsser estadas efectuadas.',
	'revreview-quality-same' => 'Aquò es la darrièra version de [[{{MediaWiki:Validationpage}}|qualitat]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] sus <i>$2</i>. La pagina pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada].',
	'revreview-quality-source' => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualitat] d'aquesta pagina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>, es estada basada en defòra d'aquesta version.",
	'revreview-quality-title' => 'Pagina de qualitat',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|pagina visada]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire revision correnta]]",
	'revreview-quick-basic-old' => "[[{{MediaWiki:Validationpage}}|pagina visada]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire lo borrolhon]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina susvelhada]]''' (cap de modificacion pas revista)",
	'revreview-quick-invalid' => "'''Numèro de version incorrèct'''",
	'revreview-quick-none' => "'''Correnta''' (pas de revisions evaluadas)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitat]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire version correnta]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitat]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visionar lo borrolhon]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitat]]''' (cap de modificacion pas revista)",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Borrolhon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vejatz la pagina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Borrolhon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vejatz la pagina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-selected' => "Version causida de '''$1 :'''",
	'revreview-source' => "Font de l'esbòs",
	'revreview-stable' => 'Pagina establa',
	'revreview-stable-title' => 'Pagina visada',
	'revreview-stable1' => "Podètz voler visionar aquesta [{{fullurl:$1|stableid=$2}} version marcada] o veire se es ara la [{{fullurl:$1|stable=1}} version establa] d'aquesta pagina.",
	'revreview-stable2' => "Podètz voler visionar [{{fullurl:$1|stable=1}} la version establa] d'aquesta pagina (se n'existís una).",
	'revreview-style' => 'Lisibilitat',
	'revreview-style-0' => 'Pas aprobada',
	'revreview-style-1' => 'Acceptabla',
	'revreview-style-2' => 'Bona',
	'revreview-style-3' => 'Concisa',
	'revreview-style-4' => 'Remirabla',
	'revreview-submit' => 'Salvar',
	'revreview-submitting' => 'Somission…',
	'revreview-finished' => 'Revision acabada !',
	'revreview-failed' => 'La relectura a fracassat !',
	'revreview-successful' => "'''La version seleccionada de [[:$1|$1]], es estada marcada d'una bandièra amb succès ([{{fullurl:{{#Special:Stableversions}}|page=$2}} Vejatz totas las versions establas])'''",
	'revreview-successful2' => "La version de [[:$1|$1]] a pogut se veire levar son drapèu amb succès.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Las versions establas]] son causidas per defaut pels revisaires puslèu que las mai recentas.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Las versions establas]] son las versions marcadas de las pagina e pòdon èsser parametradas coma lo contengut per defaut pels revisaires.''",
	'revreview-toggle-title' => 'far veire/amagar los detalhs',
	'revreview-toolow' => 'Pels atributs çaijós, vos cal donar un puntatge mai elevat que « non aprobat » per que la version siá considerada coma revista. Per depreciar una version, metètz totes los camps a « non aprobat ».',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Relegissètz]] totas las modificacions ''(vejatz çaijós)'' efectuadas dempuèi l’[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovacion] de la version establa.
'''Qualques fichièrs o modèls son estats meses a jorn :'''",
	'revreview-update-includes' => "'''Qualques modèls o fichièrs son estats meses a jorn :'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Verificatz]] las modificacions efectuadas ''(vejatz çaijós)'' dempuèi que la darrièra version establa es estada [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada].",
	'revreview-update-use' => "'''NÒTA : ''' se aquestes modèls o fichièrs compòrtan una version establa, alara aquesta ja es utilizada dins la version establa d'aquesta pagina.",
	'revreview-diffonly' => "''Per revisar la pagina, clicatz sul ligam « version correnta » e utilizatz lo formulari de revision.''",
	'revreview-visibility' => "Aquesta pagina conten una [[{{MediaWiki:Validationpage}}|version establa]],  sos paramètres d'estabilitat pòdon èsser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurats].",
	'revreview-visibility2' => "'''Aquesta pagina compòrta una [[{{MediaWiki:Validationpage}}|version establa]] perimida. Los paramètres d'estabilitat de la pagina pòdon èsser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurats].'''",
	'revreview-visibility3' => "'''Aquesta pagina dispausa pas d'una [[{{MediaWiki:Validationpage}}|version establa]] ; los paramètres d'estabilitat de la pagina pòdon èsser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurats].'''",
	'revreview-revnotfound' => "La version precedenta d'aquesta pagina a pas pogut èsser retrobada. Verificatz l'URL qu'avètz utilizada per accedir a aquesta pagina.",
	'right-autoreview' => 'Marcar automaticament las versions coma visadas',
	'right-movestable' => 'Desplaçar de paginas establas',
	'right-review' => 'Marcar las versions coma visadas',
	'right-stablesettings' => 'Configurar cossí la version establa es seleccionada puèi afichada',
	'right-validate' => 'Marcar las versions coma validadas',
	'rights-editor-autosum' => 'autopromolgut',
	'rights-editor-revoke' => "a revocat los dreches d'editor de [[$1]]",
	'specialpages-group-quality' => 'Assegurança de qualitat',
	'stable-logentry' => 'Las versions establas de [[$1]] son parametradas.',
	'stable-logentry2' => 'Tornar metre a zèro lo jornal de las versions establas de [[$1]]',
	'stable-logpage' => 'Jornal de las versions establas',
	'stable-logpagetext' => 'Vaquí lo jornal de las modificacions per la [[{{MediaWiki:Validationpage}}|version establa]] de la configuracion de las presentas paginas.',
	'revreview-filter-all' => 'Tot',
	'revreview-filter-stable' => 'estable',
	'revreview-filter-approved' => 'Aprovat',
	'revreview-filter-reapproved' => 'Aprovat tornamai',
	'revreview-filter-unapproved' => 'Pas aprovat',
	'revreview-filter-auto' => 'Automatic',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => "Cambiament d'estatut :",
	'revreview-typefilter' => 'Tipe :',
	'revreview-levelfilter' => 'Nivèl :',
	'revreview-lev-sighted' => 'visada',
	'revreview-lev-quality' => 'qualitat',
	'revreview-lev-pristine' => 'primitiva',
	'revreview-reviewlink' => 'Tornar veire',
	'tooltip-ca-current' => "Veire l'esbòs corrent d'aquesta pagina",
	'tooltip-ca-stable' => "Veire la version establa d'aquesta pagina",
	'tooltip-ca-default' => "Paramètres per l'assegurança-qualitat",
	'revreview-locked-title' => 'Las modificacions devon èsser revistas abans d’èsser afichadas sus aquesta pagina !',
	'revreview-unlocked-title' => 'Las modificacions necessitan pas de relectura abans d’èsser afichadas sus aquesta pagina !',
	'revreview-locked' => 'Las modificacions devon èsser revistas abans d’èsser afichadas sus aquesta pagina !',
	'revreview-unlocked' => 'Las modificacions necessitan pas de relectura abans d’èsser afichadas sus aquesta pagina !',
	'log-show-hide-review' => "$1 l'istoric de las relecturas",
	'revreview-tt-review' => 'Revisar aquesta pagina',
	'validationpage' => '{{ns:help}}:Validacion de la pagina',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'revreview-typefilter' => 'Тип:',
);

/** Pampanga (Kapampangan)
 * @author Val2397
 */
$messages['pam'] = array(
	'revreview-revnotfound' => 'Ing matuang meyaliling bulung a pakiduang mu eya mayakit. Paki lawe me ing URL a ginamit mu para apuntalan me ing bulung.',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'revreview-depth-1' => 'eefach',
	'revreview-log' => 'Comment:',
	'revreview-style-2' => 'gans guud',
	'revreview-filter-all' => 'All',
);

/** Polish (Polski)
 * @author Beau
 * @author Derbeth
 * @author Holek
 * @author Jwitos
 * @author Leinad
 * @author Maikking
 * @author McMonster
 * @author Pimke
 * @author Sp5uhe
 * @author ToSter
 */
$messages['pl'] = array(
	'editor' => 'Redaktor',
	'flaggedrevs' => 'Wersje oznaczone',
	'flaggedrevs-backlog' => "Mamy zaległości w sprawdzaniu [[Special:OldReviewedPages|zmian oczekujących]] na przejrzenie. '''Potrzebna jest Twoja pomoc!'''",
	'flaggedrevs-watched-pending' => "Na Twojej liście obserwowanych stron znajdują się strony [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} oczekujące na przejrzenie]. '''Potrzebna jest Twoja pomoc!'''",
	'flaggedrevs-desc' => 'Umożliwia redaktorom i weryfikatorom ocenę edycji oraz oznaczenie zweryfikowanej wersji strony',
	'flaggedrevs-pref-UI' => 'Interfejs wersji oznaczonych:',
	'flaggedrevs-pref-UI-0' => 'Użyj szczegółowego interfejsu',
	'flaggedrevs-pref-UI-1' => 'Użyj prostego interfejsu',
	'prefs-flaggedrevs' => 'Wersje oznaczone',
	'flaggedrevs-prefs-stable' => 'Domyślnie zawsze pokazuj wersję oznaczoną strony (jeśli taka istnieje)',
	'flaggedrevs-prefs-watch' => 'Dodaj do obserwowanych strony oznaczane przeze mnie jako przejrzane',
	'group-editor' => 'Redaktorzy',
	'group-editor-member' => 'redaktor',
	'group-reviewer' => 'Weryfikatorzy',
	'group-reviewer-member' => 'weryfikator',
	'grouppage-editor' => '{{ns:project}}:Redaktorzy',
	'grouppage-reviewer' => '{{ns:project}}:Weryfikatorzy',
	'group-autoreview' => 'Automatycznie przeglądający',
	'group-autoreview-member' => 'automatycznie przeglądający',
	'grouppage-autoreview' => '{{ns:project}}:Automatycznie przeglądający',
	'hist-draft' => 'wersja robocza',
	'hist-quality' => 'wersja zweryfikowana',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} zweryfikowana] przez użytkownika [[User:$3|$3]]',
	'hist-stable' => 'wersja przejrzana',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} przejrzana] przez użytkownika [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automatycznie oznaczona jako przejrzana]',
	'review-diff2stable' => 'Pokaż różnicę pomiędzy wersją oznaczoną a ostatnią',
	'review-logentry-app' => 'przejrzał [[$1]], wersję $2',
	'review-logentry-dis' => 'wycofał oznaczenie dla wersji $2 w [[$1]]',
	'review-logentry-id' => 'zobacz',
	'review-logentry-diff' => 'różnice do wersji przejrzanej',
	'review-logpage' => 'Rejestr oznaczania',
	'review-logpagetext' => 'To jest rejestr zmian w [[{{MediaWiki:Validationpage}}|oznaczaniu]] wersji stron.
Zobacz [[Special:ReviewedPages|listę oznaczonych stron]].',
	'reviewer' => 'Weryfikator',
	'revisionreview' => 'Wersja zweryfikowana',
	'revreview-accuracy' => 'Status',
	'revreview-accuracy-0' => 'nieakceptowalna',
	'revreview-accuracy-1' => 'przejrzana',
	'revreview-accuracy-2' => 'zweryfikowana',
	'revreview-accuracy-3' => 'dobrze uźródłowione',
	'revreview-accuracy-4' => 'na medal',
	'revreview-approved' => 'Zaakceptowane',
	'revreview-auto' => '(automatycznie)',
	'revreview-auto-w' => "Edytujesz wersję przejrzaną. Zmiany zostaną '''automatycznie oznaczone jako przejrzane'''.",
	'revreview-auto-w-old' => "Edytujesz wersję przejrzaną. Zmiany zostaną '''automatycznie oznaczone jako przejrzane'''.",
	'revreview-basic' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja przejrzana]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
W [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} wersji roboczej] {{PLURAL:$3|jest|są|jest}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmianę|zmiany|zmian}}] {{PLURAL:$3|oczekującą|oczekujące|oczekujących}} na przejrzenie.',
	'revreview-basic-i' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja przejrzana]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
W [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} wersji roboczej] są [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmiany szablonów lub plików] oczekujące na przejrzenie.',
	'revreview-basic-old' => 'To jest [[{{MediaWiki:Validationpage}}|wersja przejrzana]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} pokaż wszystkie]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
Mogły zostać dokonane nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmiany].',
	'revreview-basic-same' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja przejrzana]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} pokaż wszystkie]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Wersja przejrzana] tej strony, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>, jest oparta na tej wersji.',
	'revreview-blocked' => 'Nie możesz oznaczyć tej wersji jako przejrzanej, ponieważ Twoje konto zostało zablokowane ([$1 szczegóły])',
	'revreview-changed' => "'''Żądana czynność nie mogła zostać wykonana na tej wersji strony [[:$1|$1]].'''

Zażądano szablonu lub pliku, ale nie określono wersji.
Może się to zdarzyć, gdy dynamiczny szablon osadza inny szablon lub plik zależnie od zmiennej, która zmieniła się od rozpoczęcia sprawdzania tej strony.
Odświeżenie strony i ponowne sprawdzenie może rozwiązać ten problem.",
	'revreview-current' => 'Wersja robocza',
	'revreview-depth' => 'Wyczerpanie tematu',
	'revreview-depth-0' => 'nieakceptowalne',
	'revreview-depth-1' => 'podstawowe',
	'revreview-depth-2' => 'średnie',
	'revreview-depth-3' => 'wysokie',
	'revreview-depth-4' => 'na medal',
	'revreview-draft-title' => 'Wersja robocza strony',
	'revreview-edit' => 'Edytuj wersję roboczą',
	'revreview-editnotice' => "'''Uwaga! Edycje wykonane na tej stronie będą miały do momentu ich przejrzenia i akceptacji przez jednego z redaktorów status „[[{{MediaWiki:Validationpage}}|wersji roboczej]]”.'''",
	'revreview-flag' => 'Oznacz tę wersję',
	'revreview-edited' => "'''Edycje zostaną dołączone do [[{{MediaWiki:Validationpage}}|wersji przejrzanej]] po przejrzeniu ich przez uprawnionego użytkownika.'''
'''''Wersję roboczą'' pokazano poniżej.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|zmiana oczekuje|zmiany oczekują|zmian oczekuje}}] na sprawdzenie.",
	'revreview-invalid' => "'''Niewłaściwy obiekt:''' brak [[{{MediaWiki:Validationpage}}|wersji przejrzanej]] odpowiadającej podanemu ID.",
	'revreview-legend' => 'Oceń treść zmiany',
	'revreview-log' => 'Komentarz:',
	'revreview-main' => 'Musisz wybrać konkretną wersję strony w celu przejrzenia.

Zobacz [[Special:Unreviewedpages|listę nieprzejrzanych stron]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ostatnia wersja przejrzana] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} pokaż wszystkie]) została [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmiana oczekuje|zmiany oczekują|zmian oczekuje}}] na przejrzenie.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ostatnia wersja przejrzana] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} pokaż wszystkie]) została [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Zmiany szablonów/plików] wymagają przejrzenia.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ostatnia wersja zweryfikowana] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} pokaż wszystkie]) została [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmiana|zmiany|zmian}}] {{PLURAL:$3|oczekuje|oczekują|oczekuje}} na sprawdzenie.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ostatnia wersja zweryfikowana] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} pokaż wszystkie]) została [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Zmiany szablonów/plików] wymagają sprawdzenia.',
	'revreview-noflagged' => "Ta strona nie posiada żadnej wersji oznaczonej – możliwe, że '''nie''' została [[{{MediaWiki:Validationpage}}|przejrzana]] pod kątem jakości.",
	'revreview-note' => '[[User:$1|$1]] dokonał(a) następujących komentarzy podczas [[{{MediaWiki:Validationpage}}|sprawdzania]] tej wersji:',
	'revreview-notes' => 'Obserwacje lub uwagi do wyświetlenia:',
	'revreview-oldrating' => 'Uzyskana ocena:',
	'revreview-patrol' => 'Oznacz tę zmianę jako sprawdzoną',
	'revreview-patrol-title' => 'Oznacz jako sprawdzone',
	'revreview-patrolled' => 'Wybrana wersja [[:$1|$1]] została oznaczona jako sprawdzona.',
	'revreview-quality' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja zweryfikowana]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
W [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} wersji roboczej] {{PLURAL:$3|jest|są|jest}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmianę|zmiany|zmian}}] {{PLURAL:$3|oczekującą|oczekujące|oczekujących}} na sprawdzenie.',
	'revreview-quality-i' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja zweryfikowana]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
W [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} wersji roboczej] są [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmiany szablonów lub plików] oczekujące na sprawdzenie.',
	'revreview-quality-old' => 'To jest [[{{MediaWiki:Validationpage}}|wersja zweryfikowana]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} pokaż wszystkie]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
Mogły zostać dokonane nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmiany].',
	'revreview-quality-same' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja zweryfikowana]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} pokaż wszystkie]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Wersja zweryfikowana] tej strony, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>, została oparta na tej wersji.',
	'revreview-quality-title' => 'Strona zweryfikowana',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Przejrzana]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobacz wersję roboczą]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Przejrzana]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobacz wersję roboczą]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Przejrzana]]'''",
	'revreview-quick-invalid' => "'''Nieprawidłowy ID wersji'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Brak wersji przejrzanej]]'''",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Zweryfikowana]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobacz wersję roboczą]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Zweryfikowana]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobacz wersję roboczą]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Zweryfikowana]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Wersja robocza]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobacz wersję przejrzaną]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} porównaj])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Wersja robocza]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobacz wersję przejrzaną]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} porównaj])",
	'revreview-selected' => "Wybrana wersja '''$1:'''",
	'revreview-source' => 'źródło wersji roboczej',
	'revreview-stable' => 'Artykuł',
	'revreview-stable-title' => 'Strona przejrzana',
	'revreview-stable1' => 'Możesz zobaczyć [{{fullurl:$1|stableid=$2}} oznaczoną wersję] i sprawdzić, czy jest ona [{{fullurl:$1|stable=1}} wersją zweryfikowaną] tej strony.',
	'revreview-stable2' => 'Możesz zobaczyć [{{fullurl:$1|stable=1}} wersję zweryfikowaną] tej strony (o ile istnieje).',
	'revreview-style' => 'Czytelność',
	'revreview-style-0' => 'nieakceptowalna',
	'revreview-style-1' => 'akceptowalna',
	'revreview-style-2' => 'dobra',
	'revreview-style-3' => 'zwięźle',
	'revreview-style-4' => 'na medal',
	'revreview-submit' => 'Oznacz wersję',
	'revreview-submitting' => 'Zapisywanie...',
	'revreview-finished' => 'Oznaczanie zakończone!',
	'revreview-failed' => 'Oznaczanie nieudane!',
	'revreview-successful' => "'''Wersja [[:$1|$1]] została pomyślnie oznaczona. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} zobacz wszystkie wersje przejrzane])'''",
	'revreview-successful2' => "'''Wersja [[:$1|$1]] została pomyślnie odznaczona.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Wersje przejrzane]] domyślnie prezentowane są czytelnikom, nawet jeśli istnieją nowsze, nieprzejrzane wersje.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Wersje przejrzane]] mogą być wyświetlane domyślnie czytelnikom.''",
	'revreview-toggle-title' => 'pokaż lub ukryj szczegóły',
	'revreview-toolow' => 'Musisz ocenić każdy z atrybutów wyżej niż „nieakceptowalny“, aby uważać wersję za zweryfikowaną. 
By wycofać weryfikację, należy ustawić wszystkie pola na „nieakceptowalny“.',
	'revreview-update' => "Proszę [[{{MediaWiki:Validationpage}}|przejrzeć]] zmiany ''(patrz niżej)'' dokonane od momentu [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} oznaczenia] ostatniej wersji jako przejrzanej.<br />
'''Niektóre szablony/pliki zostały uaktualnione:'''",
	'revreview-update-includes' => "'''Niektóre szablony lub pliki zostały uaktualnione:'''",
	'revreview-update-none' => "Proszę [[{{MediaWiki:Validationpage}}|przejrzeć]] zmiany ''(patrz niżej)'' dokonane od momentu [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} oznaczenia] ostatniej wersji jako przejrzanej.",
	'revreview-update-use' => "'''UWAGA:''' Jeśli którykolwiek z tych szablonów lub plików posiada wersję zweryfikowaną, to zostanie ona użyta w wersji zweryfikowanej tej strony.",
	'revreview-diffonly' => "''By zweryfikować stronę, proszę kliknąć na link „bieżąca wersja” i użyć formularza weryfikacji.''",
	'revreview-visibility' => "'''Ta strona posiada aktualną [[{{MediaWiki:Validationpage}}|wersję oznaczoną]]. Sposób wyświetlania wersji można [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} skonfigurować].'''",
	'revreview-visibility2' => "'''Ta strona posiada nieaktualną [[{{MediaWiki:Validationpage}}|wersję oznaczoną]]. Sposób wyświetlania wersji można [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} skonfigurować].'''",
	'revreview-visibility3' => "'''Ta strona nie posiada [[{{MediaWiki:Validationpage}}|wersji oznaczonej]]. Sposób wyświetlania wersji można [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} skonfigurować].'''",
	'revreview-revnotfound' => 'Żądana, starsza wersja strony nie została odnaleziona. Sprawdź użyty adres URL.',
	'right-autoreview' => 'Automatyczne oznaczanie własnych wersji jako przejrzane',
	'right-movestable' => 'Przenoszenie przejrzanych i zweryfikowanych stron',
	'right-review' => 'Oznaczanie wersji jako przejrzane',
	'right-stablesettings' => 'Określać sposób, w jaki wersja zweryfikowana ma być wybierana i wyświetlana',
	'right-validate' => 'Oznaczać wersję jako zweryfikowaną',
	'rights-editor-autosum' => 'nadano automatycznie',
	'rights-editor-revoke' => 'odebrał uprawnienia redaktora [[$1]]',
	'specialpages-group-quality' => 'Jakość stron',
	'stable-logentry' => 'zmienił konfigurację strony [[$1]]',
	'stable-logentry2' => 'przywrócił domyślną konfigurację strony [[$1]]',
	'stable-logpage' => 'Rejestr konfiguracji stron',
	'stable-logpagetext' => 'To jest rejestr zmian w konfiguracji stron posiadających [[{{MediaWiki:Validationpage}}|wersje przejrzane]].
Zobacz również [[Special:StablePages|listę skonfigurowanych stron]].',
	'revreview-filter-all' => 'wszystkie',
	'revreview-filter-stable' => 'oznaczona',
	'revreview-filter-approved' => 'oznaczone',
	'revreview-filter-reapproved' => 'ponownie oznaczone',
	'revreview-filter-unapproved' => 'odznaczone',
	'revreview-filter-auto' => 'automatycznie',
	'revreview-filter-manual' => 'ręcznie',
	'revreview-statusfilter' => 'Zmiana statusu',
	'revreview-typefilter' => 'Sposób oznaczenia',
	'revreview-levelfilter' => 'Poziom:',
	'revreview-lev-sighted' => 'przejrzane',
	'revreview-lev-quality' => 'zweryfikowane',
	'revreview-lev-pristine' => 'nienaruszone',
	'revreview-reviewlink' => 'przejrzyj',
	'tooltip-ca-current' => 'Zobacz bieżącą wersję roboczą tej strony',
	'tooltip-ca-stable' => 'Zobacz wersję oznaczoną tej strony',
	'tooltip-ca-default' => 'Ustawienia mechanizmu zapewnienia jakości artykułów',
	'revreview-locked-title' => 'Edycje muszą zostać oznaczone, zanim zostaną wyświetlone na tej stronie.',
	'revreview-unlocked-title' => 'Edycje nie wymagają oznaczenia, zanim zostaną wyświetlone na tej stronie.',
	'revreview-locked' => 'Edycje muszą zostać oznaczone, zanim zostaną wyświetlone na tej stronie!',
	'revreview-unlocked' => 'Edycje nie wymagają oznaczenia, zanim zostaną wyświetlone na tej stronie.',
	'log-show-hide-review' => '$1 rejestr oznaczania',
	'revreview-tt-review' => 'Oznacz tę stronę',
	'validationpage' => '{{ns:help}}:Wersje oznaczone',
);

/** Piedmontese (Piemontèis)
 * @author Bèrto 'd Sèra
 */
$messages['pms'] = array(
	'editor' => 'Redator',
	'flaggedrevs' => 'Revision marcà',
	'group-editor' => 'Redator',
	'group-editor-member' => 'Redator',
	'group-reviewer' => 'Revisor',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor' => '{{ns:project}}:Redator',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'hist-quality' => 'qualità',
	'hist-stable' => 'vardà',
	'review-diff2stable' => "Diferensa da 'nt l'ùltima version stàbila",
	'review-logentry-app' => 'controlà [[$1]]',
	'review-logentry-dis' => 'depressà na version ëd [[$1]]',
	'review-logentry-id' => 'Nùmer ëd revision $1',
	'review-logpage' => "Registr dij contròj dj'artìcoj",
	'review-logpagetext' => "Sossì a l'é un registr dle modìfiche dlë stat d'[[{{MediaWiki:Makevalidate-page}}|aprovassion]] 
	dle pàgine ëd contnù.",
	'reviewer' => 'Revisor',
	'revisionreview' => 'Revisioné le version',
	'revreview-accuracy' => 'Cura',
	'revreview-accuracy-0' => 'Pa aprovà',
	'revreview-accuracy-1' => 'Vardà',
	'revreview-accuracy-2' => 'Curà',
	'revreview-accuracy-3' => 'Bon-e sorgiss',
	'revreview-accuracy-4' => 'Premià',
	'revreview-auto' => '(aotomàtich)',
	'revreview-auto-w' => "A l'é antramentr ch'a-i fa dle modìfiche ansima a la version stàbila, tute le modìfiche a saran '''controlà n<nowiki>'</nowiki>aotomàtich'''. A peul ëvnì a taj vardé na preuva dla pàgina anans che fé che salvé.",
	'revreview-auto-w-old' => "A l'é antramentr ch'a-i fa dle modìfiche ansima a na revision veja, tute le modìfiche a saran '''controlà n<nowiki>'</nowiki>aotomàtich'''. A peul ëvnì a taj vardé na preuva dla pàgina anans che fé che salvé.",
	'revreview-basic' => "Costa-sì a l'é l'ùltima version [[{{MediaWiki:Validationpage}}|vardà]] dla pàgina,
	[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] dël <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]
	për sòlit as peul [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifichesse] e a l'é pì agiornà. A-i {{PLURAL:$3|é $3 revision|son $3 version}}
	([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modìfiche]) ch'a speto d'esse vardà.",
	'revreview-changed' => "'''L'arcesta a l'é nen podusse sodisfé për lòn ch'a toca sta revision-sì.'''
	
	A puel esse ch'a sia ciamasse në stamp ò na figura sensa ch'a fussa butasse la version. Sòn a peul rivé quand në 
	stamp dinàmich a transclud na figura ò n'àotr ëstamp conforma a na variàbil dont contnù a peul esse cambià da  
	quand a l'ha anandiasse a vardé sta pàgina-sì. Carié torna la pàgina e anandiesse da zero a peul arsolve la gran-a.",
	'revreview-current' => 'Version corenta',
	'revreview-depth' => 'Ancreus',
	'revreview-depth-0' => 'Pa aprovà',
	'revreview-depth-1' => 'Mìnim',
	'revreview-depth-2' => 'Mes',
	'revreview-depth-3' => 'Bon',
	'revreview-depth-4' => 'Premià',
	'revreview-edit' => 'Modifiché la bruta',
	'revreview-flag' => 'Revisioné sta version',
	'revreview-legend' => "Deje 'l vot al contnù dla version:",
	'revreview-log' => 'Coment për ël registr:',
	'revreview-main' => "Për podej revisioné a venta ch'as selession-a na version ëd na pàgina ëd contnù. 

	Ch'a varda [[Special:Unreviewedpages|da revisioné]] për na lista ëd pàgine ch'a speto na revision.",
	'revreview-newest-basic' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ùltima version vardà]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vardeje tute]) dë sta pàgina-sì a l'é staita [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà]
	 dël <i>$2</i>. <br /> A-i {{PLURAL:$3|é|son}} $3 version ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modìfiche]) ch'a speto na revision.",
	'revreview-newest-quality' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ùltim vot ëd qualità]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} vardeje tuti]) dë sta pàgina-sì a l'é stait [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà]
	 dël <i>$2</i>. <br /> A-i {{PLURAL:$3|é|son}} $3 version ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modìfiche]) ch'a speto d'esse revisionà.",
	'revreview-noflagged' => "A-i é pa gnun-a version revisionà dë sta pàgina-sì, donca a l'é belfé ch'a la sia '''nen''' staita
	[[{{MediaWiki:Validationpage}}|controlà]] coma qualità.",
	'revreview-note' => "[[User:$1|$1]] a l'ha buta-ie ste nòte-sì a la revision, antramentr ch'a la [[{{MediaWiki:Validationpage}}|controlava]]:",
	'revreview-notes' => 'Osservation ò nòte da smon-e:',
	'revreview-oldrating' => "A l'é stait giudicà për:",
	'revreview-quality' => "Costa-sì a l'é l'ùltima revision ëd [[{{MediaWiki:Validationpage}}|qualità]] dë sta pàgina, e a l'é staita
	[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] dël <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]
	për sòlit as peul [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifichesse] e a l'é pì agiornà. A-i {{PLURAL:$3|é|son}} $3 version
	([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modìfiche]) da revisioné.",
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Vardà]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]]",
	'revreview-quick-none' => "'''Corenta'''. Pa gnun-a version revisionà.",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Qualità]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]]",
	'revreview-quick-see-basic' => "'''Corenta'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ùltima version vardà]",
	'revreview-quick-see-quality' => "'''Corenta'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ùltima version votà për qualità]",
	'revreview-selected' => "Version selessionà ëd '''$1:'''",
	'revreview-source' => 'sorgiss dla bruta',
	'revreview-stable' => 'Version stàbila',
	'revreview-style' => 'Belfé da lese',
	'revreview-style-0' => 'Pa aprovà',
	'revreview-style-1' => 'A peul andé',
	'revreview-style-2' => 'Bon-a',
	'revreview-style-3' => 'Concisa',
	'revreview-style-4' => 'Premià',
	'revreview-submit' => 'Buta la revision',
	'revreview-text' => "Për sòlit pitòst che nen j'ùltime, as ësmon-o për contnù le version stàbij.",
	'revreview-toggle' => '(visca/dësmòrta ij detaj)',
	'revreview-toolow' => 'A venta ch\'a buta tuti j\'atribut ambelessì sota almanch pì àot che "pa aprovà" përché
	na version ës conta da revisionà. Për dëspresié na version ch\'a-i buta tuti ij camp a "pa aprovà".',
	'revreview-update' => "Për piasì, ch'a contròla le modìfiche (smonùe ambelessì sota) faite da quand a l'é staita publicà la revision stàbila dla pàgina. A son stait modificà ëdcò jë stamp e le figure smonùe ambelessì dapress:",
	'revreview-update-none' => "Për piasì, ch'a contròla le modìfiche (smonùe ambelessì sota) faite da quand a l'é staita publicà la revision stàbila dla pàgina.",
	'revreview-visibility' => "Sta pàgina-sì a l'ha na [[{{MediaWiki:Validationpage}}|version stàbila]], ch'as peul [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} regolesse].",
	'revreview-revnotfound' => "La version prima dl'artìcol che a l'ha ciamà a l'é pa staita trovà.
Che as controla për piasì l'adrëssa (URL) che a l'ha dovrà për rivé a sta pàgina-sì.",
	'rights-editor-revoke' => 'gava-je la qualìfica ëd redator a [[$1]]',
	'stable-logentry' => 'regolà la version stàbila ëd [[$1]]',
	'stable-logentry2' => 'azerà la version stàbila për [[$1]]',
	'stable-logpage' => 'Registr dle version stàbij',
	'stable-logpagetext' => "Cost-sì a l'é un registr dle modìfiche faite a la regolassion dla [[{{MediaWiki:Validationpage}}|version stàbil]] dle pàgine ëd contnù.",
	'tooltip-ca-current' => 'Vardé la bruta corenta dë sta pàgina-sì',
	'tooltip-ca-stable' => 'Vardé la version stàbila dla pàgina',
	'tooltip-ca-default' => 'Regolassion dij Contròj ëd Qualità',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'group-reviewer' => 'مخکتونکي',
	'group-reviewer-member' => 'مخکتونکی',
	'reviewer' => 'مخکتونکی',
	'revreview-auto' => '(خپلسري)',
	'revreview-current' => 'ګارلیک',
	'revreview-depth' => 'ژورتيا',
	'revreview-depth-1' => 'بنسټيز',
	'revreview-depth-2' => 'منځوی',
	'revreview-depth-3' => 'لوړ',
	'revreview-source' => 'د ګارليک سرچينه',
	'revreview-style-1' => 'د منلو وړ',
	'revreview-filter-all' => 'ټول',
	'revreview-statusfilter' => 'دريځ:',
	'revreview-reviewlink' => 'مخليدنه',
	'tooltip-ca-current' => 'د همدې مخ اوسنی ګارليک ښکاره کول',
);

/** Portuguese (Português)
 * @author 555
 * @author Giro720
 * @author Lijealso
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Edições Analisadas',
	'flaggedrevs-backlog' => "Há atualmente um acúmulo de [[Special:OldReviewedPages|edições pendentes]] a páginas analisadas. '''A sua atenção é necessária!'''",
	'flaggedrevs-watched-pending' => "Há atualmente [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} edições pendentes] a páginas analisadas na sua lista de páginas vigiadas. '''A sua atenção é necessária!'''",
	'flaggedrevs-desc' => 'Dá aos {{int:group-editor}} e aos {{int:group-reviewer}} a possibilidade de verificarem edições e estabilizarem páginas',
	'flaggedrevs-pref-UI' => 'Interface da versão estável:',
	'flaggedrevs-pref-UI-0' => 'Utilizar a interface de edições estáveis detalhada',
	'flaggedrevs-pref-UI-1' => 'Utilizar a interface de edições estáveis simples',
	'prefs-flaggedrevs' => 'Estabilidade',
	'flaggedrevs-prefs-stable' => 'Sempre exibir a edição estável de uma página como conteúdo padrão (caso exista uma)',
	'flaggedrevs-prefs-watch' => 'Adicionar páginas analisadas por mim à minha lista de artigos vigiados',
	'group-editor' => 'Editores',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Críticos',
	'group-reviewer-member' => 'Crítico',
	'grouppage-editor' => '{{ns:project}}:{{int:group-editor}}',
	'grouppage-reviewer' => '{{ns:project}}:{{int:group-reviewer}}',
	'group-autoreview' => 'Autocríticos',
	'group-autoreview-member' => 'autocríticos',
	'grouppage-autoreview' => '{{ns:project}}:Autocrítico',
	'hist-draft' => 'edição de rascunho',
	'hist-quality' => 'edição confiável',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validada] por [[User:$3|$3]]',
	'hist-stable' => 'edição analisada',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} analisada] por [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automaticamente analisada]',
	'review-diff2stable' => 'Ver alterações entre a edição estável e a actual',
	'review-logentry-app' => 'analisou a edição r$2 de [[$1]]',
	'review-logentry-dis' => 'rebaixou a edição r$2 de [[$1]]',
	'review-logentry-id' => 'ver',
	'review-logentry-diff' => 'diferenças da versão estável',
	'review-logpage' => 'Registo de análise de edições',
	'review-logpagetext' => 'Este é um registo de alterações nas [[{{MediaWiki:Validationpage}}|análises]] de páginas de conteúdo.
Veja a [[Special:ReviewedPages|lista de páginas analisadas]] para uma listagem de páginas aprovadas.',
	'reviewer' => 'Crítico',
	'revisionreview' => 'Analisar edições',
	'revreview-accuracy' => 'Precisão',
	'revreview-accuracy-0' => 'Rejeitada',
	'revreview-accuracy-1' => 'Objetiva',
	'revreview-accuracy-2' => 'Precisa',
	'revreview-accuracy-3' => 'Bem referenciada',
	'revreview-accuracy-4' => 'Exemplar',
	'revreview-approved' => 'Aprovada',
	'revreview-auto' => '(automático)',
	'revreview-auto-w' => "Você está editando a edição estável. As alterações serão '''automaticamente tidas como revistas'''.",
	'revreview-auto-w-old' => "Você está editando uma edição revista. As alterações serão '''automaticamente tidas como revistas'''.",
	'revreview-basic' => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|analisada]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|alteração|alterações}}] aguardando revisão.',
	'revreview-basic-i' => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|analisada]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} alterações a predefinições/ficheiros] que aguardam revisão.',
	'revreview-basic-old' => 'Esta é uma [[{{MediaWiki:Validationpage}}|edição analisada]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
É possível que novas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} alterações] tenham sido feitas.',
	'revreview-basic-same' => 'Esta é a última edição [[{{MediaWiki:Validationpage}}|analisada]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.',
	'revreview-basic-source' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} edição verificada] desta página, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>, foi baseada nesta edição.',
	'revreview-blocked' => 'Você não pode analisar esta edição porque a sua conta encontra-se bloqueada ([$1 detalhes])',
	'revreview-changed' => "'''A ação seleccionada não pôde ser executada nesta edição de [[:$1|$1]].'''

Uma predefinição ou ficheiro pode ter sido requisitada sem uma edição específica ter sido informada.
Isso pode ocorrer quando uma predefinição dinâmica faz transclusão de outro ficheiro ou predefinição através de uma variável que pode ter sido alterada enquanto era feita a análise desta página.
Recarregar a página e enviar uma nova análise poderá ser suficiente para contornar este contratempo.",
	'revreview-current' => 'Rascunho',
	'revreview-depth' => 'Profundidade',
	'revreview-depth-0' => 'Rejeitada',
	'revreview-depth-1' => 'Básica',
	'revreview-depth-2' => 'Moderada',
	'revreview-depth-3' => 'Alta',
	'revreview-depth-4' => 'Exemplar',
	'revreview-draft-title' => 'Rascunho de página',
	'revreview-edit' => 'Editar rascunho',
	'revreview-editnotice' => "'''Nota: as edições feitas nesta página serão incorporadas à [[{{MediaWiki:Validationpage}}|versão estável]] quando um utilizador autorizado a analisar.'''",
	'revreview-flag' => 'Analise esta edição',
	'revreview-edited' => "'''As alterações serão incorporadas na [[{{MediaWiki:Validationpage}}|edição estável]] quando forem analisadas por um utilizador \"estabelecido\".
O ''rascunho'' é mostrado a seguir.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=\$1&diff=cur&diffonly=0}} \$2 {{PLURAL:\$2|alteração aguarda|alterações aguardam}}] revisão.",
	'revreview-invalid' => "'''Destino inválido:''' não há [[{{MediaWiki:Validationpage}}|edições verificadas]] correspondentes ao ID fornecido.",
	'revreview-legend' => 'Avaliar conteúdo da edição',
	'revreview-log' => 'Comentário:',
	'revreview-main' => 'Você precisa de seleccionar uma edição específica de uma página de conteúdo para poder analisá-la.

Veja a [[Special:Unreviewedpages|lista de páginas por analisar]].',
	'revreview-newest-basic' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição analisada] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|alteração|alterações}}] {{PLURAL:$3|necessita|necessitam}} revisão.',
	'revreview-newest-basic-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição analisada] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} As alterações a predefinições/ficheiros] necessitam de revisão.',
	'revreview-newest-quality' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição confiável] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|alteração|alterações}}] {{PLURAL:$3|necessita|necessitam}} revisão.',
	'revreview-newest-quality-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição confiável] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. 
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} As alterações a predefinições/ficheiros] necessitam de revisão.',
	'revreview-noflagged' => "Esta página não possui edições analisadas. Talvez ainda '''não''' tenha sido [[{{MediaWiki:Validationpage}}|verificada]] a sua qualidade.",
	'revreview-note' => '[[User:$1|$1]] deixou as seguintes observações ao [[{{MediaWiki:Validationpage}}|analisar]] esta edição:',
	'revreview-notes' => 'Observações ou notas a serem exibidas:',
	'revreview-oldrating' => 'Esteve avaliada como:',
	'revreview-patrol' => 'Marcar esta alteração como patrulhada',
	'revreview-patrol-title' => 'Marcar como patrulhada',
	'revreview-patrolled' => 'A edição seleccionada de [[:$1|$1]] foi marcada como patrulhada.',
	'revreview-quality' => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|confiável]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|alteração|alterações}}] aguardando revisão.',
	'revreview-quality-i' => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|confiável]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} alterações a predefinições/ficheiros] que aguardam revisão.',
	'revreview-quality-old' => 'Esta é uma [[{{MediaWiki:Validationpage}}|edição confiável]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
É possível que novas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} alterações] tenham sido feitas.',
	'revreview-quality-same' => 'Esta é a última edição [[{{MediaWiki:Validationpage}}|confiável]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.',
	'revreview-quality-source' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} edição confiável] desta página, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>, foi baseada nesta edição.',
	'revreview-quality-title' => 'Página confiável',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Página analisada]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver rascunho]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Página analisada]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver rascunho]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Página analisada]]'''",
	'revreview-quick-invalid' => "'''ID de edição inválido'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Edição actual]]''' (não-analisada)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Página confiável]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver rascunho]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Página confiável]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver rascunho]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Página confiável]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Rascunho]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver página]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Rascunho]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver página]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-selected' => "Edição seleccionada de '''$1:'''",
	'revreview-source' => 'código do rascunho',
	'revreview-stable' => 'Página estável',
	'revreview-stable-title' => 'Página analisada',
	'revreview-stable1' => 'Talvez você deseje ver [{{fullurl:$1|stableid=$2}} esta edição analisada] ou a [{{fullurl:$1|stable=1}} edição estável] desta página.',
	'revreview-stable2' => 'Você talvez deseje ver a [{{fullurl:$1|stable=1}} edição estável] desta página (caso ainda aja uma).',
	'revreview-style' => 'Inteligibilidade',
	'revreview-style-0' => 'Rejeitada',
	'revreview-style-1' => 'Aceitável',
	'revreview-style-2' => 'Boa',
	'revreview-style-3' => 'Concisa',
	'revreview-style-4' => 'Exemplar',
	'revreview-submit' => 'Enviar',
	'revreview-submitting' => 'Enviando...',
	'revreview-finished' => 'Análise concluída!',
	'revreview-failed' => 'Falha na releitura!',
	'revreview-successful' => "'''A edição de [[:$1|$1]] foi assinalada com sucesso. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} ver edições estáveis])'''",
	'revreview-successful2' => "'''A edição seleccionada de [[:$1|$1]] teve sua análise removida com sucesso.'''",
	'revreview-text' => "'''As [[{{MediaWiki:Validationpage}}|edições estáveis]] são exibidas por padrão no lugar de edições mais recentes.'''",
	'revreview-text2' => "''As [[{{MediaWiki:Validationpage}}|edições estáveis]] são edições em páginas que foram verificadas e que podem ser configuradas como conteúdo padrão a ser exibido.''",
	'revreview-toggle-title' => 'mostrar/esconder detalhes',
	'revreview-toolow' => 'Você precisará atribuir, em cada um dos atributos, valores mais altos do que "rejeitada" para que uma edição seja considerada aprovada.

Para rebaixar uma edição, defina todos os atributos como "rejeitada".',
	'revreview-update' => "Por favor, [[{{MediaWiki:Validationpage}}|reveja]] quaisquer alterações ''(exibidas abaixo)'' feitas desde que a edição estável foi [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovada].<br />
'''Algumas predefinições/ficheiros foram actualizados:'''",
	'revreview-update-includes' => "'''Algumas predefinições/ficheiros foram actualizados:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Reveja]] quaisquer alterações ''(exibidas abaixo)'' feitas desde que a edição estável foi [{{fullurl:{{ns:special}}:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].",
	'revreview-update-use' => "'''NOTA:''' Se alguma destas predefinições/ficheiros possui uma versão estável, então esta já é usada na versão estável desta página.",
	'revreview-diffonly' => "''Para analisar a página, clique no link \"edição actual\" e utilize o formulário de análises.''",
	'revreview-visibility' => "'''Esta página possui uma [[{{MediaWiki:Validationpage}}|edição estável]]; os parâmetros disso podem ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-visibility2' => "'''Esta página não possui uma [[{{MediaWiki:Validationpage}}|versão estável]] atualizada; os parâmetros de estabilidade de páginas podem ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-visibility3' => "'''Esta página não possui uma [[{{MediaWiki:Validationpage}}|versão estável]]; os parâmetros de estabilidade de páginas podem ser [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-revnotfound' => 'A edição antiga desta página que foi requisitada não pôde ser encontrada.
Verifique o URL que utilizou para aceder esta página.',
	'right-autoreview' => 'Marcar automaticamente as edições como analisadas',
	'right-movestable' => 'Mover páginas estáveis',
	'right-review' => 'Definir edições como analisadas',
	'right-stablesettings' => 'Configurar como a edição estável é definida e exibida',
	'right-validate' => 'Definir edições como confiáveis',
	'rights-editor-autosum' => 'auto-promovido',
	'rights-editor-revoke' => 'removidos privilégios de {{int:group-editor-member}} para [[$1]]',
	'specialpages-group-quality' => 'Garantia de qualidade',
	'stable-logentry' => 'configurou a versão estável de [[$1]]',
	'stable-logentry2' => 'zerou a forma de definir versões estáveis de [[$1]]',
	'stable-logpage' => 'Registo de edições estáveis',
	'stable-logpagetext' => 'Este é um registo de modificações nas configurações das [[{{MediaWiki:Validationpage}}|edições estáveis]] das páginas de conteúdo.
Uma lista de páginas com conteúdo estabilizado pode ser encontrada na [[Special:StablePages|lista de páginas estáveis]].',
	'revreview-filter-all' => 'Todas',
	'revreview-filter-stable' => 'estável',
	'revreview-filter-approved' => 'Aprovadas',
	'revreview-filter-reapproved' => 'Re-aprovada',
	'revreview-filter-unapproved' => 'Não-aprovadas',
	'revreview-filter-auto' => 'Automático',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => 'Alteração de estado:',
	'revreview-typefilter' => 'Tipo:',
	'revreview-levelfilter' => 'Nível:',
	'revreview-lev-sighted' => 'analisada',
	'revreview-lev-quality' => 'qualidade',
	'revreview-lev-pristine' => 'intocada',
	'revreview-reviewlink' => 'analisar',
	'tooltip-ca-current' => 'Ver o rascunho actual desta página',
	'tooltip-ca-stable' => 'Ver a edição estável desta página',
	'tooltip-ca-default' => 'Configurações da Garantia de Qualidade',
	'revreview-locked-title' => 'As edições desta página precisam ser analisadas antes de serem exibidas!',
	'revreview-unlocked-title' => 'As edições desta página não precisam ser analisadas antes de serem exibidas!',
	'revreview-locked' => 'As edições desta página precisam ser analisadas antes de serem exibidas!',
	'revreview-unlocked' => 'As edições desta página não precisam ser analisadas antes de serem exibidas!',
	'log-show-hide-review' => '$1 registo de análises',
	'revreview-tt-review' => 'Analise esta página',
	'validationpage' => '{{ns:help}}:Validação de páginas',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Rafael Vargas
 */
$messages['pt-br'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Edições Analisadas',
	'flaggedrevs-backlog' => "Há atualmente um acúmulo de [[Special:OldReviewedPages|edições pendentes]] a serem analisadas. '''A sua atenção é necessária!'''",
	'flaggedrevs-watched-pending' => "Há atualmente [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} edições pendentes] a serem análisadas em páginas na sua lista de páginas vigiadas. '''A sua atenção é necessária!'''",
	'flaggedrevs-desc' => 'Dá aos {{int:group-editor}} e aos {{int:group-reviewer}} a possibilidade de verificarem edições e marcar páginas como estáveis.',
	'flaggedrevs-pref-UI' => 'Interface da versão estável:',
	'revreview-revnotfound' => 'A antiga revisão da página que você está procurando não pode ser encontrada.
Por favor verifique a URL que você usou para acessar esta página.',
);

/** Quechua (Runa Simi) */
$messages['qu'] = array(
	'revreview-revnotfound' => "Mañakusqayki llamk'apusqaqa manam tarisqachu.
Ama hina kaspa, kay p'anqap URL nisqa tiyayninta k'uskiriy.",
);

/** Romani (Romani)
 * @author לערי ריינהארט
 */
$messages['rmy'] = array(
	'revreview-revnotfound' => 'I puraneder versiya la patrinyaki so tu manglyan na arakhel pes. Mangas tuke te palemdikhes o phandipen so labyardyan kana avilyan kathe.',
);

/** Romanian (Română)
 * @author Emily
 * @author Firilacroco
 * @author KlaudiuMihaila
 * @author Mihai
 */
$messages['ro'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Revizuiri marcate',
	'prefs-flaggedrevs' => 'Stabilitate',
	'group-editor' => 'Editori',
	'group-editor-member' => 'editor',
	'group-reviewer' => 'Recenzenţi',
	'group-reviewer-member' => 'recenzent',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Recenzent',
	'group-autoreview' => 'Autorecenzenţi',
	'group-autoreview-member' => 'autorecenzent',
	'grouppage-autoreview' => '{{ns:project}}:Autorecenzent',
	'hist-quality' => 'revizie de calitate',
	'review-logentry-id' => 'vezi',
	'revreview-accuracy' => 'Acurateţe',
	'revreview-accuracy-0' => 'Neaprobat',
	'revreview-accuracy-1' => 'Văzut',
	'revreview-accuracy-2' => 'Exact',
	'revreview-accuracy-3' => 'Bine referenţiat',
	'revreview-accuracy-4' => 'Remarcabil',
	'revreview-approved' => 'Aprobat',
	'revreview-auto' => '(automat)',
	'revreview-current' => 'Schiţă',
	'revreview-depth' => 'Profunzime',
	'revreview-depth-0' => 'Neaprobat',
	'revreview-depth-1' => 'De bază',
	'revreview-depth-2' => 'Moderat',
	'revreview-depth-3' => 'Înalt',
	'revreview-depth-4' => 'Remarcabil',
	'revreview-draft-title' => 'Pagină schiţă',
	'revreview-edit' => 'Editează schiţa',
	'revreview-flag' => 'Revizuieşte această revizie',
	'revreview-log' => 'Comentariu:',
	'revreview-oldrating' => 'A fost evaluat:',
	'revreview-patrol' => 'Marcaţi această modificare ca patrulată',
	'revreview-patrol-title' => 'Marchează ca patrulat',
	'revreview-patrolled' => 'Revizia selectată [[:$1|$1]] a fost marcată ca patrulată.',
	'revreview-quality-title' => 'Pagină de calitate',
	'revreview-source' => 'Sursa schiţei',
	'revreview-stable' => 'Pagină stabilă',
	'revreview-style' => 'Lizibilitate',
	'revreview-style-0' => 'Neaprobat',
	'revreview-style-1' => 'Acceptabil',
	'revreview-style-2' => 'Bun',
	'revreview-style-3' => 'Concis',
	'revreview-style-4' => 'Remarcabil',
	'revreview-submit' => 'Trimite',
	'revreview-submitting' => 'Trimit ...',
	'revreview-finished' => 'Revizuire completă!',
	'revreview-toggle-title' => 'arată/ascunde detalii',
	'revreview-revnotfound' => 'Versiunea mai veche a paginii pe care aţi cerut-o nu a fost găsită. Vă rugăm să verificaţi legătura pe care aţi folosit-o pentru a accesa această pagină.',
	'rights-editor-autosum' => 'autopromovat',
	'revreview-filter-all' => 'tot',
	'revreview-filter-stable' => 'stabil',
	'revreview-filter-approved' => 'Aprobat',
	'revreview-filter-reapproved' => 'Re-aprobat',
	'revreview-filter-unapproved' => 'Neaprobat',
	'revreview-filter-auto' => 'Automat',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => 'Statut schimbat:',
	'revreview-typefilter' => 'Tip:',
	'revreview-levelfilter' => 'Nivel:',
	'revreview-lev-sighted' => 'văzut',
	'revreview-lev-quality' => 'calitate',
	'revreview-lev-pristine' => 'primitiv',
	'revreview-reviewlink' => 'revizie',
	'revreview-tt-review' => 'Revizuieşte această pagină',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'editor' => 'Editore',
	'flaggedrevs' => 'Revisiune Approvete',
	'flaggedrevs-backlog' => "Quiste jè 'u backlog corrende de le [[Special:OldReviewedPages|cangiaminde pendende]] a le pàggene reviste. '''Abbesogne de l'attenziona toje!'''",
	'flaggedrevs-watched-pending' => "Stonne, osce a die [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} cangiaminde pendende]a le pàggene reviste da toje liste de le pàggene condrollate. '''Abbesogne de l'attenziona toje!'''",
	'flaggedrevs-desc' => "Da a le cangiatore e la revisitatore l'abbilità de validà le revisiune e le pàggene secure",
	'flaggedrevs-pref-UI' => "Inderfacce d'a versiona secure:",
	'flaggedrevs-pref-UI-0' => "Ause l'interfacce utende d'a versiona secure e dettagliete",
	'flaggedrevs-pref-UI-1' => "Ause 'na interfacce utende d'a versiona semblice e secure",
	'prefs-flaggedrevs' => 'Stabbilità',
	'flaggedrevs-prefs-stable' => "Fà vedè sembre 'a versiona secure de ìna vosce pe default (ce ne esiste une)",
	'flaggedrevs-prefs-watch' => 'Aggiunge le pàggene, Ie agghie riviste le pàggene condrollete mie',
	'group-editor' => 'Editore',
	'group-editor-member' => 'editore',
	'group-reviewer' => 'Rivisitatore',
	'group-reviewer-member' => 'rivisitatore',
	'grouppage-editor' => '{{ns:project}}:Editore',
	'grouppage-reviewer' => '{{ns:project}}:Revisitatore',
	'group-autoreview' => 'Autorevisure',
	'group-autoreview-member' => 'autorevisore',
	'grouppage-autoreview' => '{{ns:project}}:Autorevisore',
	'hist-draft' => 'revisione terra-terra',
	'hist-quality' => 'revisione de qualità',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validate] da [[User:$3|$3]]',
	'hist-stable' => 'revisiona viste',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} viste] da [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} viste automaticamende]',
	'review-diff2stable' => "Vide le cangiaminde 'mbrà le revisiune secure e corrende",
	'review-logentry-app' => 'riviste r$2 de [[$1]]',
	'review-logentry-dis' => 'schifete r$2 de [[$1]]',
	'review-logentry-id' => 'vide',
	'review-logentry-diff' => 'diff pe stabbilità',
	'review-logpage' => 'Archivie de le revisitaminde',
	'review-logpagetext' => "Quiste jè 'n'archivije de le cangiaminde de le revisiune in state de [[{{MediaWiki:Validationpage}}|approvazione]] pe le vosce.
Vide 'a [[Special:ReviewedPages|liste de le pàggene riviste]] pe 'na liste de le pàggene approvete.",
	'reviewer' => 'Rivisitatore',
	'revisionreview' => 'Revide le revisiune',
	'revreview-accuracy' => 'Accuratezze',
	'revreview-accuracy-0' => 'Scettate',
	'revreview-accuracy-1' => 'Viste',
	'revreview-accuracy-2' => 'Accurete',
	'revreview-accuracy-3' => 'Bbona sorgende',
	'revreview-accuracy-4' => 'Dettagliete',
	'revreview-approved' => 'Approvete',
	'revreview-auto' => '(automatiche)',
	'revreview-auto-w' => "Tu ste cange 'a revisiona secure; le cangiaminde avènene '''automaticamende marchete cumme reviste'''.",
	'revreview-auto-w-old' => "Tu ste cange 'na revisiona reviste; le cangiaminde avènene '''automaticamende marchete cumme reviste'''.",
	'revreview-basic' => "Queste jè l'urtema revisiona [[{{MediaWiki:Validationpage}}|viste]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
'A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] tène [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cangiamende|cangiaminde}}] ca aspettane 'na reviste",
	'revreview-basic-i' => "Queste è l'urtema revisiona [[{{MediaWiki:Validationpage}}|viste]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
'A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] tène [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cangiaminde a template/file] ca aspettane 'a revisione.",
	'revreview-basic-old' => "Queste jè 'na revisiona [[{{MediaWiki:Validationpage}}|viste]], ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elengale tutte]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
Nuève [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cangiaminde] ponne essere state fatte.",
	'revreview-basic-same' => "Queste jè l'urtema revisiona [[{{MediaWiki:Validationpage}}|viste]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elengale tutte]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.",
	'revreview-basic-source' => "'Na [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versiona visitete] de sta pàgene, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvete] sus a <i>$2</i>, ere basete sus 'a sta revisione.",
	'revreview-blocked' => "Tu non ge puè rivisità sta revisione purcè 'u cunde utende tue è blocchete ([$1 dettaglie])",
	'revreview-changed' => "'''L'aziona richieste non ge pò essere fatte sus a sta revisione de [[:$1|$1]].'''

'Nu template o 'nu file ponne essere state richieste quanne nisciuna versione specifica avere state specificate.
Stu fatte pò succedere ce 'nu template dinamiche no tène cunde de 'n'otre file o 'n'otre template ca depènne da 'na variabbile ca ha cangiate da quanne tu è accumenzate a rivisità sta pàgene.
Aggiorne 'a pàgene e repruève 'n'otra vote a fa 'na rivisita ca pò essere ca se resolve 'u probbleme.",
	'revreview-current' => 'Bozze',
	'revreview-depth' => 'Profunnetà',
	'revreview-depth-0' => 'Scettate',
	'revreview-depth-1' => 'Nderre-nderre',
	'revreview-depth-2' => 'Moderete',
	'revreview-depth-3' => 'Ierte',
	'revreview-depth-4' => 'Dettagliete',
	'revreview-draft-title' => 'Pàgena bozza',
	'revreview-edit' => "Cange 'a bozze",
	'revreview-editnotice' => "'''Le cangiaminde a sta pàgene onne essere 'ngorporate jndr'à [[{{MediaWiki:Validationpage}}|versiona secure]] 'na vote ca 'n'utende autorizzate l'ha reviste'''.",
	'revreview-flag' => 'Revide sta revisione',
	'revreview-edited' => "'''Le cangiaminde onne essere 'ngorporate jndr'à [[{{MediaWiki:Validationpage}}|versiona secure]] 'na vote ca 'n'utende autorizzate l'ha reviste'''.
''' 'A ''bozze'' ta stoche a fazze vedè aqquà sotte.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|cangiamende ca ste aspette|cangiaminde ca sto aspettane}}] 'a revisione.",
	'revreview-invalid' => "'''Destinazione invalide:''' nisciuna revisiona  [[{{MediaWiki:Validationpage}}|reviste]] corresponne a 'u codece (ID) inzerite.",
	'revreview-legend' => "D'a 'nu pundegge a 'u condenute d'a revisione",
	'revreview-log' => 'Commende:',
	'revreview-main' => "Tu a selezionà ìna particolera revisione da 'na vosce pe fà 'na revisitazione.

Vide 'a [[Special:Unreviewedpages|liste de le pàggene ca non g'onne state rivisitete]].",
	'revreview-newest-basic' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} urtema revisiona riviste] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenghe tutte]) èrene [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cangiamende|cangiaminde}}] {{PLURAL:$3|abbesogne|abbesognene}} de 'na reviste.",
	'revreview-newest-basic-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} urtema revisiona riviste] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenghe tutte]) èrene [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cangiaminde sus a template/file] abbesognene de 'na reviste.",
	'revreview-newest-quality' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} urtema revisiona de qualità] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenghe tutte]) èrene [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cangiamende|cangiaminde}}] {{PLURAL:$3|abbesogne|abbesognene}} de 'na reviste.",
	'revreview-newest-quality-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} urtema revisiona de qualità] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenghe tutte]) èrene [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cangiaminde de template/file] abbesognene de 'na reviste.",
	'revreview-noflagged' => "Non ge stonne revisiune reviste de sta pàgene, accussì '''non''' ge se pò [[{{MediaWiki:Validationpage}}|verificà]] 'a qualità.",
	'revreview-note' => '[[User:$1|$1]] ha fatte le note seguende [[{{MediaWiki:Validationpage}}|revesetanne]] sta revisione:',
	'revreview-notes' => 'Osservaziune o annotaziune da fa vedè:',
	'revreview-oldrating' => 'Tenève stu pundegge:',
	'revreview-patrol' => 'Signe stu cangiamende cumme verifichete a funne',
	'revreview-patrol-title' => 'Signe cumme verifichete a funne',
	'revreview-patrolled' => "'A revisione selezionate de [[:$1|$1]] ha state marcate cumme condrollate.",
	'revreview-quality' => "Queste jè l'urtema revisione [[{{MediaWiki:Validationpage}}|de qualità]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
'A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozze] tène [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cangiamende ca ste spette|cangiaminde ca stonne spettene}}] 'na reviste.",
	'revreview-quality-i' => "Queste jè l'urtema revisione [[{{MediaWiki:Validationpage}}|de qualità]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
'A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozze] tène [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cangiaminde de template/file] ca stonne spettene 'na reviste.",
	'revreview-quality-old' => "Queste jè 'na revisione [[{{MediaWiki:Validationpage}}|de qualità]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenghe tutte]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cangiaminde] nuève ponne essere fatte.",
	'revreview-quality-same' => "Queste jè l'[[{{MediaWiki:Validationpage}}|urtema revisiona de qualità]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenghe tutte]) èrene [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>.",
	'revreview-quality-source' => "'Na [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versione de qualità] de sta pàgene, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate] 'u <i>$2</i>, ere basate sus a stà revisione.",
	'revreview-quality-title' => "Qualità d'a vôsce",
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pàgene viste]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vide 'a bozze]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Pàgene viste]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vide 'a bozze]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pàgene viste]]'''",
	'revreview-quick-invalid' => "'''ID d'a revisione invalide'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Revisiona corrende]]''' (non reviste)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pàgene de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vide 'a bozze]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pàgene de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vide 'a bozze]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pàgene de qualità]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Bozza]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vide 'a pàgene]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} combronde])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Bozza]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vide 'a pàgene]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} combronde])",
	'revreview-selected' => "Revisiona selezionete de '''$1:'''",
	'revreview-source' => 'sorgende a bozza',
	'revreview-stable' => 'Pàgena sicure',
	'revreview-stable-title' => 'Pàgena viste',
	'revreview-stable1' => "Tu puè vulè vedè [{{fullurl:$1|stableid=$2}} sta versiona marcate] e vide ce ijedde ète 'a [{{fullurl:$1|stable=1}} versiona secure] de sta pàgene.",
	'revreview-stable2' => "Tu puè putè vedè 'a [{{fullurl:$1|stable=1}} versiona secure] de sta pàgene (ce ne stè almene une).",
	'revreview-style' => 'Leggibbilità',
	'revreview-style-0' => 'Fasce schife, bocciete',
	'revreview-style-1' => 'Accettabbele',
	'revreview-style-2' => 'Bbuene',
	'revreview-style-3' => 'Congise',
	'revreview-style-4' => 'Dettagliete',
	'revreview-submit' => 'Conferme',
	'revreview-submitting' => 'Stoche a conferme',
	'revreview-finished' => 'Revisione comblétete!',
	'revreview-failed' => 'Revisiona fallite!',
	'revreview-successful' => "'''Revisione de [[:$1|$1]] ha state mise 'u flag.''' ([{{fullurl:{{#Special:Stableversions}}|pàgene=$2}} vide le versiune secure])'''",
	'revreview-successful2' => "'''Revisione de [[:$1|$1]] ha state luete 'u flag.'''",
	'revreview-text' => "''Le [[{{MediaWiki:Validationpage}}|versiune secure]] sonde le pàggene normale pe le visitature quanne le pàggene so troppe nuève.''",
	'revreview-text2' => "''Le [[{{MediaWiki:Validationpage}}|versiune secure]] sonde revisiune verificate de le pàggene e ponne essere 'mbostate cumme a pàggene de condenute pe le visitature.''",
	'revreview-toggle-title' => 'fa vedè/scunne le dettaglie',
	'revreview-toolow' => 'Tu a almene valutà ogneune de le attrebbute ca stonne aqquà sotte cu \'nu vote cchiù ierte de "non approvate" respettanne \'a revisione pe essere conziderate reviste.
Pe schefà \'na revisione, \'mboste tutte le cambe a "non approvate".',
	'revreview-update' => "Pe piacere [[{{MediaWiki:Validationpage}}|revide]] ogne cangiamende ''(le vide aqquà sotte)'' fatte da 'a revisiona secure ca avère state [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate].<br />
'''Alcune template e file onne state aggiornate:'''",
	'revreview-update-includes' => "'''Certe template/file onne state aggiornate:'''",
	'revreview-update-none' => "Pe piacere [[{{MediaWiki:Validationpage}}|revide]] ogne cangiamende ''(le vide aqquà sotte)'' fatte da 'a revisiona secure ca avère state [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} approvate].",
	'revreview-update-use' => "'''VIDE BBUENE:''' Ce quacche template/file tènene 'na versiona secure, allore onne state ausate jndr'à sta pàgene ausanne quedda versiona.",
	'revreview-diffonly' => "''Pe rivedè 'a pagène, cazze 'u collegamende d'a revisione \"revisiona corrende\" e ause 'u form de rivisitazione.''",
	'revreview-visibility' => "'''Sta pàgene tène 'na [[{{MediaWiki:Validationpage}}|versiona secure]] aggiornate; le 'mbostaziune de'a stabbilità d'a pàgene ponne essere [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-visibility2' => "'''Sta pàgene non ge tène 'na [[{{MediaWiki:Validationpage}}|versiona secure]] aggiornate; le 'mbostaziune de'a stabbiletà d'a pàgene ponne essere [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-visibility3' => "'''Sta pàgene non ge tène 'na [[{{MediaWiki:Validationpage}}|versiona secure]] aggiornate; le 'mbostaziune de'a stabbiletà d'a pàgene ponne essere [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-revnotfound' => "'A vecchia revisione d'a pàgene ca tu è cerchete non ge se iacchije.
Pe piacere condrolle l'URL ca tu è ausete pe trasè jndr'à sta pagene.",
	'right-autoreview' => 'Signe le revisiune cumme viste automaticamende',
	'right-movestable' => 'Spuèste le pàggene secure',
	'right-review' => 'Signe le revisiune cumme viste',
	'right-stablesettings' => 'Configure cumme versiona secure quedde ca jè selezionete e visualizzete',
	'right-validate' => 'Signe le revisiune cumme a validete',
	'rights-editor-autosum' => 'auto promosse',
	'rights-editor-revoke' => "'u state d'u cangiatore ha state scangellete da [[$1]]",
	'specialpages-group-quality' => 'Assicurazione de qualità',
	'stable-logentry' => "configurete 'na versiona secure pe [[$1]]",
	'stable-logentry2' => "azzere 'a versiona secure pe [[$1]]",
	'stable-logpage' => 'Archivie de le stabilizzaziune',
	'stable-logpagetext' => "Quiste jè 'n'archivije de le cangiaminde a 'a configurazione d'a [[{{MediaWiki:Validationpage}}|versiona secure]] de le vôsce.
'Na liste de le pàggene stabbilizzate pò essere acchiate jndr'à [[Special:StablePages|liste de le pàggene secure]].",
	'revreview-filter-all' => 'Tutte',
	'revreview-filter-stable' => 'secure',
	'revreview-filter-approved' => 'Approvete',
	'revreview-filter-reapproved' => 'Riapprovete',
	'revreview-filter-unapproved' => 'Non approvete',
	'revreview-filter-auto' => 'Automateche',
	'revreview-filter-manual' => 'Manuele',
	'revreview-statusfilter' => "Cangiamende d'u state:",
	'revreview-typefilter' => 'Tipe:',
	'revreview-levelfilter' => 'Levèlle:',
	'revreview-lev-sighted' => 'viste',
	'revreview-lev-quality' => 'qualità',
	'revreview-lev-pristine' => 'repristine',
	'revreview-reviewlink' => 'reviste',
	'tooltip-ca-current' => "Vide 'a bozza corrende pe sta pàgene",
	'tooltip-ca-stable' => "Vide 'a versiona secure pe sta pàgene",
	'tooltip-ca-default' => "'Mbostaziune de l'assicurazione de qualitate",
	'revreview-locked-title' => 'Le cangiaminde onne a essere riviste apprime de farle vedè sus a sta pàgene!',
	'revreview-unlocked-title' => 'Le cangiaminde non ge richiedene le revisete apprime ca avènene fatte vedè sus a stà pàgene!',
	'revreview-locked' => 'Le cangiaminde onne a essere riviste apprime de farle vedè sus a sta pàgene!',
	'revreview-unlocked' => 'Le cangiaminde non ge richiedene le revisete apprime ca avènene fatte vedè sus a stà pàgene!',
	'log-show-hide-review' => '$1 archivie de le rivisitaziune',
	'revreview-tt-review' => 'Revide sta pàgene',
	'validationpage' => "{{ns:help}}:Validazione d'a vôsce",
);

/** Russian (Русский)
 * @author Ahonc
 * @author AlexSm
 * @author Claymore
 * @author Ferrer
 * @author Kaganer
 * @author Kalan
 * @author Lockal
 * @author Putnik
 * @author Sergey kudryavtsev
 * @author VasilievVV
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'editor' => 'Досматривающий',
	'flaggedrevs' => 'Отмеченные версии',
	'flaggedrevs-backlog' => "Существует [[Special:OldReviewedPages|отставание в проверке]] страниц. '''Пожалуйста, обратите внимание!'''",
	'flaggedrevs-watched-pending' => "В вашем списке наблюдения [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} присутствуют правки], ожидающие проверки. '''Пожалуйста, обратите внимание!'''",
	'flaggedrevs-desc' => 'Предоставление возможности редакторам/рецензентам проверять версии страниц и устанавливать стабильные версии',
	'flaggedrevs-pref-UI' => 'Интерфейс стабильных версий:',
	'flaggedrevs-pref-UI-0' => 'Использовать подробный интерфейс стабильных версий',
	'flaggedrevs-pref-UI-1' => 'Использовать простой интерфейс стабильных версий',
	'prefs-flaggedrevs' => 'Стабилизация',
	'flaggedrevs-prefs-stable' => 'Всегда показывать стабильную версию по умолчанию (если таковая существует)',
	'flaggedrevs-prefs-watch' => 'Добавлять проверенные мною страницы в список наблюдения',
	'flaggedrevs-prefs-editdiffs' => 'Показывать различия со стабильной версией при редактировании страниц',
	'group-editor' => 'Досматривающие',
	'group-editor-member' => 'досматривающий',
	'group-reviewer' => 'Выверяющие',
	'group-reviewer-member' => 'выверяющий',
	'grouppage-editor' => '{{ns:project}}:Досматривающий',
	'grouppage-reviewer' => '{{ns:project}}:Выверяющий',
	'group-autoreview' => 'Автодосматривающие',
	'group-autoreview-member' => 'автодосматривающий',
	'grouppage-autoreview' => '{{ns:project}}:Автодосматривающие',
	'hist-draft' => 'черновая версия',
	'hist-quality' => 'выверенная версия',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} выверена] участником [[User:$3|$3]]',
	'hist-stable' => 'досмотренная версия',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} досмотрена] участником [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} досмотрена автоматически]',
	'review-diff2stable' => 'Показать различия между стабильной и текущей версиями',
	'review-logentry-app' => 'проверил версию r$2 страницы [[$1]]',
	'review-logentry-dis' => 'устаревшая версия r$2 страницы [[$1]]',
	'review-logentry-id' => 'вид',
	'review-logentry-diff' => 'разница со стабильной',
	'review-logpage' => 'Журнал проверок',
	'review-logpagetext' => 'Это журнал изменений [[{{MediaWiki:Validationpage}}|утверждённых]] статусов версий страниц.
См. [[Special:ReviewedPages|список проверенных страниц]].',
	'reviewer' => 'выверяющий',
	'revisionreview' => 'Проверка версий',
	'revreview-accuracy' => 'Точность',
	'revreview-accuracy-0' => 'не указана',
	'revreview-accuracy-1' => 'досмотрена',
	'revreview-accuracy-2' => 'точная',
	'revreview-accuracy-3' => 'с источниками',
	'revreview-accuracy-4' => 'избранная',
	'revreview-approved' => 'Проверена',
	'revreview-auto' => '(автоматически)',
	'revreview-auto-w' => "Вы правите стабильную версию, изменения будут '''автоматически отмечены как проверенные'''.",
	'revreview-auto-w-old' => "Вы правите проверенную версию, изменения будут '''автоматически отмечены как проверенные'''.",
	'revreview-basic' => 'Это последняя [[{{MediaWiki:Validationpage}}|досмотренная]] версия; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|правка|правки|правок}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновика] {{PLURAL:$3|ожидает|ожидают|ожидают}} проверки.',
	'revreview-basic-i' => 'Это последняя [[{{MediaWiki:Validationpage}}|досмотренная]] версия; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
В [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновике] есть требующие проверки [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} изменения в шаблонах или файлах].',
	'revreview-basic-old' => 'Это [[{{MediaWiki:Validationpage}}|досмотренная]] версия ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список всех]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
Могли быть сделаны новые [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} правки].',
	'revreview-basic-same' => 'Это последняя [[{{MediaWiki:Validationpage}}|досмотренная]] версия ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список всех]); [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Досмотренная версия] этой страницы, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>, была основана на этой версии.',
	'revreview-blocked' => 'Вы не можете проверить эту версию, так как в настоящее время ваша учётная запись заблокированна ([$1 подробнее])',
	'revreview-changed' => "'''Запрошенное действие не может быть выполнено с этой версией страницы [[:$1|$1]].'''

Возможно, шаблон или изображение были запрошены без указания конкретной версии.
Это могло случиться, если динамический шаблон включает другой шаблон или файл, зависящие от переменной, которая изменилась с момента начала проверки.
Обновите страницу и начните проверку заново, это может снять проблему.",
	'revreview-current' => 'Черновик',
	'revreview-depth' => 'Полнота',
	'revreview-depth-0' => 'не указана',
	'revreview-depth-1' => 'базовая',
	'revreview-depth-2' => 'средняя',
	'revreview-depth-3' => 'высокая',
	'revreview-depth-4' => 'избранная',
	'revreview-draft-title' => 'Черновик страницы',
	'revreview-edit' => 'Править черновик',
	'revreview-editnotice' => "'''Примечание. Изменения этой страницы будут включены в [[{{MediaWiki:Validationpage}}|стабильную версию]] только после их досмотра участником с соответствующими правами.'''",
	'revreview-flag' => 'Проверить эту версию',
	'revreview-edited' => "'''Правки будут включены в [[{{MediaWiki:Validationpage}}|стабильную версию]] после проверки участниками с соответствующими правами.
''Черновик'' показан ниже.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|правка ожидает|правки ожидают|правок ожидают}}] проверки.",
	'revreview-invalid' => "'''Ошибочная цель:''' не существует [[{{MediaWiki:Validationpage}}|проверенной]] версии страницы, соответствующей указанному идентификатору.",
	'revreview-legend' => 'Оценки содержания версии',
	'revreview-log' => 'Примечание:',
	'revreview-main' => 'Вы должны выбрать одну из версий страницы для проверки.

См. [[Special:Unreviewedpages|список непроверенных страниц]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя досмотренная версия] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список всех]) была [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|правка|правки|правок}}] {{PLURAL:$3|требует|требуют|требуют}} проверки.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя досмотренная версия] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список всех]);  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
Требуется проверка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} изменений в шаблонах или файлах].',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя выверенная версия] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список всех]) была [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|правка|правки|правок}}] {{PLURAL:$3|требует|требуют|требуют}} проверки.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя выверенная версия] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список всех]);  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
Требуется проверка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} изменений в шаблонах или файлах].',
	'revreview-noflagged' => "У этой страницы нет проверенных версий, вероятно, её качество '''не''' [[{{MediaWiki:Validationpage}}|оценивалось]].",
	'revreview-note' => '[[User:$1|$1]] сделал следующее замечание, [[{{MediaWiki:Validationpage}}|проверяя]] эту версию:',
	'revreview-notes' => 'Наблюдения и замечания для отображения:',
	'revreview-oldrating' => 'Была оценена:',
	'revreview-patrol' => 'Отметить это изменение как проверенное',
	'revreview-patrol-title' => 'Отметить как патрулированную',
	'revreview-patrolled' => 'Выбранная версия [[:$1|$1]] была отмечена как патрулированная.',
	'revreview-quality' => 'Это последняя [[{{MediaWiki:Validationpage}}|выверенная]] версия; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|правка|правки|правок}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновика] {{PLURAL:$3|ожидает|ожидают|ожидают}} проверки.',
	'revreview-quality-i' => 'Это последняя [[{{MediaWiki:Validationpage}}|выверенная]] версия; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
В [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновике] есть требующие проверки [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}}изменения в шаблонах или файлах].',
	'revreview-quality-old' => 'Это [[{{MediaWiki:Validationpage}}|выверенная]] версия ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список всех]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>.
Могли быть сделаны новые [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} правки].',
	'revreview-quality-same' => 'Это последняя [[{{MediaWiki:Validationpage}}|выверенная]] версия ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список всех]); [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Выверенная версия] этой страницы, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>, была основана на этой версии.',
	'revreview-quality-title' => 'Выверенная страница',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Досмотренная страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Досмотренная страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Досмотренная страница]]'''",
	'revreview-quick-invalid' => "'''Ошибочный идентификатор версии страницы'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Текущая версия]]''' (не проверялась)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Выверенная страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Выверенная страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Выверенная страница]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Черновик]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показать страницу]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} сравнить])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Черновик]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показать страницу]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} сравнить])",
	'revreview-selected' => "Выбранная версия '''$1:'''",
	'revreview-source' => 'исходный текст черновика',
	'revreview-stable' => 'Стабильная страница',
	'revreview-stable-title' => 'Досмотренная страница',
	'revreview-stable1' => 'Возможно, вы хотите просмотреть [{{fullurl:$1|stableid=$2}} эту отмеченную версию] или [{{fullurl:$1|stable=1}} стабильную версию] этой страницы, если такая существует.',
	'revreview-stable2' => 'Возможно, вы хотите просмотреть эту [{{fullurl:$1|stable=1}} стабильную версию] этой страницы (если таковая существует).',
	'revreview-style' => 'Читаемость',
	'revreview-style-0' => 'не указана',
	'revreview-style-1' => 'приемлемая',
	'revreview-style-2' => 'хорошая',
	'revreview-style-3' => 'немногословно',
	'revreview-style-4' => 'избранная',
	'revreview-submit' => 'Отправить',
	'revreview-submitting' => 'Отправка…',
	'revreview-finished' => 'Проверка выполнена!',
	'revreview-failed' => 'Ошибка проверки!',
	'revreview-successful' => "'''Выбранная версия [[:$1|$1]] успешно отмечена. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} просмотр стабильных версий])'''",
	'revreview-successful2' => "'''С выбранной версии [[:$1|$1]] снята пометка.'''",
	'revreview-text' => "''По умолчанию установлен показ [[{{MediaWiki:Validationpage}}|стабильных версий]] страниц, а не наиболее новых.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Стабильные версии]] — проверенные версии страниц, которые могут быть установлены для показа по умолчанию.''",
	'revreview-toggle-title' => 'показать/скрыть подробности',
	'revreview-toolow' => 'Вы должны указать для всех значений уровень выше, чем «не указана», чтобы версия страницы считалась проверенной. Чтобы сбросить флаг проверки, установите все значения в «не указана».',
	'revreview-update' => "Пожалуйста, [[{{MediaWiki:Validationpage}}|проверьте]] правки ''(показаны ниже)'', сделанные после [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} установки] стабильной версии.<br />
'''Некоторые шаблоны или файлы были обновлены:'''",
	'revreview-update-includes' => "'''Некоторые шаблоны или файлы были обновлены:'''",
	'revreview-update-none' => "Пожалуйста, [[{{MediaWiki:Validationpage}}|проверьте]] правки ''(показаны ниже)'', сделанные после [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} установки] стабильной версии.",
	'revreview-update-use' => "'''ЗАМЕЧАНИЕ.''' Если какой-либо из этих шаблонов или файлов имеет стабильную версию, то она уже используется в стабильной версии этой страницы.",
	'revreview-diffonly' => "''Чтобы проверить статью, нажмите на ссылку «текущая версия» и используйте форму проверки.''",
	'revreview-visibility' => "'''У этой страницы имеется обновлённая [[{{MediaWiki:Validationpage}}|стабильная версия]]; можно изменить [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} настройки показа стабильных версий].'''",
	'revreview-visibility2' => "'''[[{{MediaWiki:Validationpage}}|Cтабильная версия]] этой страницы устарела; вы можете изменить [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} настройки] показа стабильных версий.'''",
	'revreview-visibility3' => "'''У этой страницы нет [[{{MediaWiki:Validationpage}}|стабильной версии]]; настройки показа стабильных версий [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} можно изменить].'''",
	'revreview-revnotfound' => 'Старая версия страницы не найдена. Пожалуйста, проверьте правильность ссылки, которую вы использовали для доступа к этой странице.',
	'right-autoreview' => 'автоматическая отметка версий страниц как досмотренных',
	'right-movestable' => 'переименование чистовых версий',
	'right-review' => 'отметка версий страниц как досмотренных',
	'right-stablesettings' => 'настройка выбора и показа чистовой версии',
	'right-validate' => 'отметка версий страниц как выверенных',
	'rights-editor-autosum' => 'автоназначение',
	'rights-editor-revoke' => 'снял статус досматривающего с [[$1]]',
	'specialpages-group-quality' => 'Поддержка качества',
	'stable-logentry' => 'установил стабильное версионирование для [[$1]]',
	'stable-logentry2' => 'сбросил чистовое версионирование для [[$1]]',
	'stable-logpage' => 'Журнал стабилизаций',
	'stable-logpagetext' => 'Это журнал изменений настроек [[{{MediaWiki:Validationpage}}|стабильных версий]] страниц.
См. также  [[Special:StablePages|список стабильных страниц]].',
	'revreview-filter-all' => 'Все',
	'revreview-filter-stable' => 'стабильная',
	'revreview-filter-approved' => 'Утверждённые',
	'revreview-filter-reapproved' => 'Переутверждённые',
	'revreview-filter-unapproved' => 'Неутверждённые',
	'revreview-filter-auto' => 'Автоматически',
	'revreview-filter-manual' => 'Вручную',
	'revreview-statusfilter' => 'Изменение состояния:',
	'revreview-typefilter' => 'Тип:',
	'revreview-levelfilter' => 'Уровень:',
	'revreview-lev-sighted' => 'досмотренная',
	'revreview-lev-quality' => 'выверенная',
	'revreview-lev-pristine' => 'изначальная',
	'revreview-reviewlink' => 'проверить',
	'tooltip-ca-current' => 'Просмотреть текущий черновик этой страницы',
	'tooltip-ca-stable' => 'Показать стабильную версию этой страницы',
	'tooltip-ca-default' => 'Настройки контроля качества',
	'revreview-locked-title' => 'Правки должны быть проверены, прежде чем будут показаны на этой странице!',
	'revreview-unlocked-title' => 'Правки не требуют предварительной проверки для отображения на этой странице!',
	'revreview-locked' => 'Правки должны быть проверены, прежде чем будут показаны на этой странице!',
	'revreview-unlocked' => 'Правки не требуют предварительной проверки для отображения на этой странице!',
	'log-show-hide-review' => '$1 журнал проверок',
	'revreview-tt-review' => 'Проверить эту страницу',
	'validationpage' => '{{ns:help}}:Проверка страниц',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 * @author Meno25
 */
$messages['sah'] = array(
	'editor' => 'Көннөрөөччү',
	'flaggedrevs' => 'Бэлиэтэммит торумнар',
	'flaggedrevs-desc' => 'Эрэдээктэрдэргэ/ырытааччыларга сирэй торумнарын уонна сирэй стабилизациятын бигэргэтэр кыаҕы биэрэр',
	'group-editor' => 'Көннөрөөччүлэр',
	'group-editor-member' => 'көннөрөөччү',
	'group-reviewer' => 'Рецензеннар',
	'group-reviewer-member' => 'рецензент',
	'grouppage-editor' => '{{ns:project}}:Көннөрөөччү',
	'grouppage-reviewer' => '{{ns:project}}:Рецензент',
	'hist-quality' => 'үрдүк хаачыстыбалаах торум',
	'hist-stable' => 'торум көрүлүннэ/көрүллүбүт',
	'review-diff2stable' => 'Чистовой уонна саҥа торумнар уратыларын көрүү',
	'review-logentry-app' => 'ырытыллынна/ырытыллыбыт [[$1]]',
	'review-logentry-dis' => '[[$1]] эргэрбит торума',
	'review-logentry-id' => '$1 торумун идентификатора',
	'review-logpage' => 'Рецензиялар сурунааллара',
	'review-logpagetext' => 'Бу сирэйдэр торумнарын [[{{MediaWiki:Validationpage}}|бигэргэтиллибит]] уларытыыларын сурунаала.',
	'reviewer' => 'Рецензент',
	'revisionreview' => 'Торумнары ырытыы',
	'revreview-accuracy' => 'Чопчута',
	'revreview-accuracy-0' => 'Бигэргэтиллибэтэх',
	'revreview-accuracy-1' => 'Көрүллүбүт',
	'revreview-accuracy-2' => 'Чопчу',
	'revreview-accuracy-3' => 'Источниктардаах',
	'revreview-accuracy-4' => 'Талыы-талба',
	'revreview-auto' => '(аптамаатынан)',
	'revreview-auto-w' => "Чистовой торуму уларытан эрэҕин; туох баар уларытыылар '''аптамаатынан бэрэбиэркэлэммит курдук бэлиэтэниэхтэрэ'''. Уларытыыны бигэргэтиэх иннинэ хайдах буолуохтааҕын көрөр ордук буолуо.",
	'revreview-auto-w-old' => "Эргэрбит торуму уларытан эрэҕин; туох баар уларытыылар '''аптамаатынан бэрэбиэркэлэммит курдук бэлиэтэниэхтэрэ'''. Уларытыыны бигэргэтиэх иннинэ хайдах буолуохтааҕын көрөр ордук буолуо.",
	'revreview-basic' => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|көрүллүбүт]] торум,
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит:] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Хойукку торумун] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} уларытыахха] сөп;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|уларытыы|уларытыылар}}] ырытыллыыны {{PLURAL:$3|кэтэһэр|кэтэһэллэр}}.',
	'revreview-basic-same' => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|көрүллүбүт]] торум, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бэрэбиэркэлэммит] <i>$2</i>. Сирэйгэ [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} көннөрүү] оҥоруохха сөп.',
	'revreview-changed' => "'''Ыйбыт дьайыыҥ бу [[:$1|$1]] торумҥа кыайан оҥоһуллубат.'''

Баҕар халыып эбэтэр ойуу чопчу торумун ыйбатаҕыҥ буолуо. Это могло случиться, если динамический шаблон включает другой шаблон или изображение, зависящие от переменной, которая изменилась с момента начала рецензирования. Сирэйи саҥаттан арыйан баран ырытыыны саҥаттан саҕалаа, оччоҕо моһол сүтүөн сөп.",
	'revreview-current' => 'Харата (черновик)',
	'revreview-depth' => 'Толорута',
	'revreview-depth-0' => 'Бигэргэтиллибэтэх',
	'revreview-depth-1' => 'олоҕо баар',
	'revreview-depth-2' => 'Орто',
	'revreview-depth-3' => 'Толору',
	'revreview-depth-4' => 'Талыы-талба',
	'revreview-edit' => 'Черновигы уларытыы',
	'revreview-flag' => 'торуму ырытыы',
	'revreview-legend' => 'Торум ис хоһоонун сыаналааһын',
	'revreview-log' => 'Ырытыы:',
	'revreview-main' => 'Ырытарга сирэй биир эмит торумун талыахтааххын. 

Ырытыллыбатах сирэйдэри [[Special:Unreviewedpages|манна]] көр.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Бүтэһик бэрэбиэркэлэммит торума]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} торумнар испииһэктэрэ]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит]
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 көннөрүү {{PLURAL:$3|көрүллүөхтээх|көрүллүөхтээхтэр}}].',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Бүтэһик кичэйэн көрүллүбүт торума]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} торумнар испииһэктэрэ]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит]
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 көннөрүү {{PLURAL:$3|көрүллүөхтээх|көрүллүөхтээхтэр}}].',
	'revreview-noflagged' => "Бу сирэй ырытыллыбыт торума суох, арааһа кини хаачыстыбата [[{{MediaWiki:Validationpage}}|'''сыаналамматах''']] быһыылаах.",
	'revreview-note' => '[[User:$1|$1]] бу торуму [[{{MediaWiki:Validationpage}}|ырыта]] олорон маннык эппит:',
	'revreview-notes' => 'Көрдөрүллэр кэтээһиннэр уонна самычаанньалар:',
	'revreview-oldrating' => 'Сыаналаммыт:',
	'revreview-patrol' => 'Бу уларытыыны бэрэбиэркэлэммит курдук бэлиэтээһин',
	'revreview-patrolled' => 'Талбыт торумуҥ [[:$1|$1]] бэрэбиэркэлэммит курдук бэлиэтэннэ.',
	'revreview-quality' => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|бэрэбиэркэлэммит]] торум,
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит:] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Хойукку торумун] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} уларытыахха] сөп;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|уларытыы|уларытыылар}}] ырытыллыыны {{PLURAL:$3|кэтэһэр|кэтэһэллэр}}.',
	'revreview-quality-same' => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|бэрэбиркэлэммит]] торум, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} бэрэбиэркэлэммит] <i>$2</i>. Сирэйгэ [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} көннөрүү оҥоруохха] сөп.',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Көрүллүбүт]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновигын көр]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Көрүлүннэ]]''' (көрүллүбэтэх уларытыылара суох)",
	'revreview-quick-none' => "'''Бүтэһик торум''' (ырытыллыбыт торума суох)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Кичэйэн көрүллүбүт]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновигын көр]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Бэрэбиэркэлэннэ]]''' (көрүллүбэтэх көннөрүүлэрэ суох)",
	'revreview-quick-see-basic' => "'''Черновик''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} чистовигын көр]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} көннөрүүлээх])",
	'revreview-quick-see-quality' => "'''Черновик''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} чистовигын көр]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0&editreview=1}} {{PLURAL:$2|көннөрүүлээх|көннөрүүлэрдээх}}])",
	'revreview-selected' => "'''$1''' талыллыбыт торума:",
	'revreview-source' => 'черновик бастакы торума',
	'revreview-stable' => 'Чистовик',
	'revreview-style' => 'Ааҕарга табыгастааҕа',
	'revreview-style-0' => 'Бигэргэтиллибэтэх',
	'revreview-style-1' => 'Син аҕай',
	'revreview-style-2' => 'Үчүгэй',
	'revreview-style-3' => 'Кылгас',
	'revreview-style-4' => 'Уһулуччу үчүгэй',
	'revreview-submit' => 'Ырытыыны ыыт',
	'revreview-text' => 'Анаан туруоруллубатаҕына чистовой торумнар көстөллөр (саҥа, хойукку торумнар буолбатах).',
	'revreview-toolow' => 'Бу торуму ырытыллыбыт диир буоллаххына «бигэргэтиллибэтэх» диэнтэн үөһээ таһымы туруоруохтааххын. Ырытыыта суох оҥорорго туох баар суолталарын «бигэргэтиллибэтэх» диэҥҥэ туруор.',
	'revreview-update' => 'Бука диэн манна аллара бэриллибит [[{{MediaWiki:Validationpage}}|чистовик]] статуһун биэрии кэннэ оҥоһуллубут [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} уларытыылары] бэрэбиэркэлээ (ханныгы баҕараргын). Сорох халыыптар уонна ойуулар саҥардыллыбыттар:',
	'revreview-update-none' => 'Бука диэн [[{{MediaWiki:Validationpage}}|чистовой торум]] кэнниттэн оноһуллубут [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} уларытыылары] (аллара бааллар) көр.',
	'revreview-visibility' => 'Бу сирэй [[{{MediaWiki:Validationpage}}|чистовой торумнаах]], которая может быть  
[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} настроена].',
	'revreview-revnotfound' => 'Бу сирэй урукку барыла булуллубата. Ыйынньыгы сыыһата суох суруйбуккун көр.',
	'rights-editor-autosum' => 'аптамаатынан анааһын',
	'rights-editor-revoke' => 'эрэдээктэр статуһуттан бу кэмтэн босхоломмут: [[$1]]',
	'stable-logentry' => 'установка чистового версионирования для [[$1]]',
	'stable-logentry2' => 'сброс чистового версионирования для [[$1]]',
	'stable-logpage' => 'Бүтэһик (чистовой) торумнар сурунааллара',
	'stable-logpagetext' => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|бигэргэтиллибит]] торумнар туруорууларын уларытыы сурунаала.',
	'tooltip-ca-current' => 'Сирэй саҥа (бүтэһик) черновигын көрдөр',
	'tooltip-ca-stable' => 'Бу сирэй чистовигын көрүү',
	'tooltip-ca-default' => 'Хаачыстыба хонтуруолун туруоруулара',
	'validationpage' => '{{ns:help}}:Ыстатыйа бэрэбиэркэтэ',
);

/** Sardinian (Sardu) */
$messages['sc'] = array(
	'revreview-revnotfound' => 'La versione precedente di questo articolo che hai richiesto, non è stata trovata.
Controlla per favore la URL che hai usato per accedere a questa pagina.',
);

/** Sicilian (Sicilianu)
 * @author Tonyfroio
 */
$messages['scn'] = array(
	'revreview-revnotfound' => "La virsioni pricidenti di st'artìculu c'hai addumannatu nun hà statu attruvata. Cuntrolla pi favuri la URL c'hai usatu p'accèdiri a sta pàggina.",
);

/** Scots (Scots) */
$messages['sco'] = array(
	'revreview-revnotfound' => 'The auld reveision o the page ye socht cuidna be funnd. Please check the URL ye uised til access this page.',
);

/** Sassaresu (Sassaresu)
 * @author Felis
 */
$messages['sdc'] = array(
	'revreview-revnotfound' => "La versioni dumandadda di la pàgina nò è isthadda acciappadda. Verifiggà l'indirizzu usaddu pa intrà a chistha pàgina.",
);

/** Northern Sami (Sámegiella)
 * @author Skuolfi
 */
$messages['se'] = array(
	'revreview-revnotfound' => 'Veršuvdna, man ohcet, ii dihtto. Dárkkis URL-čujuhusa, mainna ohcet dán siiddu.',
);

/** Cmique Itom (Cmique Itom)
 * @author Ccaxjoj Iteja Z Iti Poop
 */
$messages['sei'] = array(
	'revreview-revnotfound' => 'Janrevicion zode páhina zo me yahöx necoccebj yahöxom. Controlar URL zo me usadadde accesom jan páhina.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'editor' => 'Redaktor',
	'flaggedrevs' => 'Označené verzie',
	'flaggedrevs-backlog' => "Momentálne existujú [[Special:OldReviewedPages|neskontrolované úpravy]] skontrolovaných stránok.
'''Vyžaduje sa vaša pozornosť!'''",
	'flaggedrevs-watched-pending' => "Momentálne existujú [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} neskontrolované úpravy] skontrolovaných stránok, ktoré máte v zozname sledovaných.
'''Vyžaduje sa vaša pozornosť!'''",
	'flaggedrevs-desc' => 'Dáva redaktorom/kontrolórom možnosť overovať revízie a označovať stránky ako stabilné',
	'flaggedrevs-pref-UI' => 'Rozhranie stabilnej verzie:',
	'flaggedrevs-pref-UI-0' => 'Používať podrobné používateľské rozhranie stabilných verzií',
	'flaggedrevs-pref-UI-1' => 'Používať jednoduché používateľské rozhranie stabilných verzií',
	'prefs-flaggedrevs' => 'Stabilita',
	'flaggedrevs-prefs-stable' => 'Vždy štandardne zobrazovať stabilnú verziu stránok s obsahom (ak existuje)',
	'flaggedrevs-prefs-watch' => 'Pridať stránky, ktoré skontrolujem, do môjho zoznamu sledovaných',
	'group-editor' => 'Redaktori',
	'group-editor-member' => 'Redaktor',
	'group-reviewer' => 'Revízori',
	'group-reviewer-member' => 'Revízor',
	'grouppage-editor' => '{{ns:project}}:Redaktor',
	'grouppage-reviewer' => '{{ns:project}}:Revízor',
	'group-autoreview' => 'Autokontrolóri',
	'group-autoreview-member' => 'autokontrolór',
	'grouppage-autoreview' => '{{ns:project}}:Autokontrolór',
	'hist-draft' => 'revízia - návrh',
	'hist-quality' => 'kvalitná revízia',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} overil] [[User:$3|$3]]',
	'hist-stable' => 'videná revízia',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} videl] [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} automaticky videná]',
	'review-diff2stable' => 'Zobraziť rozdiely medzi stabilnou a aktuálnou revíziou',
	'review-logentry-app' => 'skontrolovaná r$2 stránky [[$1]]',
	'review-logentry-dis' => 'zavrhovaná r$2 stránky [[$1]]',
	'review-logentry-id' => 'zobraziť',
	'review-logentry-diff' => 'rozdiel so stabilnou',
	'review-logpage' => 'Záznam kontrol',
	'review-logpagetext' => 'Toto je záznam zmien [[{{MediaWiki:Validationpage}}|schválenia]] revízií stránok s obsahom.
Zoznam schválených stránok nájdete na stránke [[Special:ReviewedPages|Zoznam skontrolovaných stránok]].',
	'reviewer' => 'Revízor',
	'revisionreview' => 'Prezrieť kontroly',
	'revreview-accuracy' => 'Presnosť',
	'revreview-accuracy-0' => 'neschválené',
	'revreview-accuracy-1' => 'zbežná',
	'revreview-accuracy-2' => 'presná',
	'revreview-accuracy-3' => 'dobre uvedené zdroje',
	'revreview-accuracy-4' => 'odporúčaný',
	'revreview-approved' => 'Schválené',
	'revreview-auto' => '(automatické)',
	'revreview-auto-w' => "Upravujete stabilnú revíziu, zmeny budú '''automaticky označené ako skontrolované'''.",
	'revreview-auto-w-old' => "Upravujete skontrolovanú revíziu. Zmeny budú '''automaticky označené ako skontrolované'''.",
	'revreview-basic' => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|videná]] verzia tejto stránky, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Aktuálna verzia] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmenu čakajúcu|zmeny čakajúce|zmien čakajúcich}}] na revíziu.',
	'revreview-basic-i' => 'Toto je posledná [[{{MediaWiki:Validationpage}}|videná]] revízia, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Jej [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrh] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/file zmeny] čakajúce na schválenie.',
	'revreview-basic-old' => 'Toto je [[{{MediaWiki:Validationpage}}|videná]] revízia ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zobraziť všetky]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Je možné, že boli vykonané ďalšie [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmeny].',
	'revreview-basic-same' => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|videná]] revízia, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] na <i>{{GRAMMAR:lokál|$2}}</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upraviť].',
	'revreview-basic-source' => 'Na tejto revízii bola založená [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} videná verzia] tejto stránky, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.',
	'revreview-blocked' => 'Túto revíziu nemôžete skontrolovať, pretože váš účet je momentálne zablokovaný ([$1 podrobnosti])',
	'revreview-changed' => "'''Požadovanú činnosť nebolo možné vykonať na tejto revízii stránky [[:$1|$1]].'''

Šablóna alebo súbor mohol byť vyžiadaný bez uvedenia konkrétnej verzie.
To sa môže stať, keď dynamická šablóna transkluduje iný súbor alebo šablónu v závislosti od premennej, ktorá sa zmenila, odkedy ste začali s kontrolou tejto stránky.
Obnovením stránky a opätovnou kontrolou vyriešite tento problém.",
	'revreview-current' => 'Koncept',
	'revreview-depth' => 'Hĺbka',
	'revreview-depth-0' => 'neschválené',
	'revreview-depth-1' => 'základná',
	'revreview-depth-2' => 'stredná',
	'revreview-depth-3' => 'vysoká',
	'revreview-depth-4' => 'odporúčaný',
	'revreview-draft-title' => 'Návrh stránky',
	'revreview-edit' => 'Upraviť koncept',
	'revreview-editnotice' => "'''Pozn.: Úpravy tejto stránky budú zapracované do [[{{MediaWiki:Validationpage}}|stabilnej verzie]], keď ich oprávnený používateľ skontroluje.'''",
	'revreview-flag' => 'Skontrolovať túto verziu',
	'revreview-edited' => "'''Úpravy budú zapracované do [[{{MediaWiki:Validationpage}}|stabilnej verzie]] potom, čo ich skontroluje dôveryhodný používateľ.
Dolu je zobrazený ''návrh'' stránky.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|zmena čaká|zmeny čakajú|zmien čaká}}] na schválenie.",
	'revreview-invalid' => "'''Neplatný cieľ:''' zadanému ID nezodpovedá žiadna [[{{MediaWiki:Validationpage}}|skontrolovaná]] revízia.",
	'revreview-legend' => 'Ohodnotiť obsah verzie:',
	'revreview-log' => 'Komentár záznamu:',
	'revreview-main' => 'Musíte vybrať konkrétnu verziu stránky s obsahom, aby ste ju mohli skontrolovať. 

Pozri zoznam [[Special:Unreviewedpages|neskontrolovaných stránok]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná overená revízia]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zobraziť všetky]) tejto stránky bola [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená]
	 <i>$2</i>. <br /> {{PLURAL:$3|$3 revízia|$3 revízie||$3 revízií}} ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmeny]) čaká na schválenie.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná videná revízia] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zobraziť všetky]) bola [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/file Zmeny] je potrebné schváliť.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná kvalitná revízia]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zobraziť všetky]) tejto stránky bola [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená]
	 <i>$2</i>. <br /> {{PLURAL:$3|$3 revízia|$3 revízie||$3 revízií}} ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmeny]) čaká na schválenie.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná kvalitná revízia] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zobraziť všetky]) bola [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/file Zmeny] je potrebné schváliť.',
	'revreview-noflagged' => "Neexistujú revidované verzie tejto stránky, takže jej
	kvalita '''nebola''' [[{{MediaWiki:Validationpage}}|skontrolovaná]].",
	'revreview-note' => '[[User:$1|$1]] urobil nasledovné poznámky počas [[{{MediaWiki:Validationpage}}|kontroly]] tejto verzie:',
	'revreview-notes' => 'Pozorovania alebo poznámky, ktoré sa majú zobraziť:',
	'revreview-oldrating' => 'Bolo ohodnotené ako:',
	'revreview-patrol' => 'Označiť túto zmenu ako stráženú',
	'revreview-patrol-title' => 'Označiť ako strážené',
	'revreview-patrolled' => 'Vybraná revízia [[:$1|$1]] bola označená ako strážená.',
	'revreview-quality' => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|kvalitná]] verzia tejto stránky, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Aktuálna verzia] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmenu čakajúcu|zmeny čakajúce|zmien čakajúcich}}] na revíziu.',
	'revreview-quality-i' => 'Toto je posledná [[{{MediaWiki:Validationpage}}|kvalitná]] revízia, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Jej [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrh] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/file zmeny] čakajúce na schválenie.',
	'revreview-quality-old' => 'Toto je [[{{MediaWiki:Validationpage}}|kvalitná]] revízia ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} zobraziť všetky]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Je možné, že boli vykonané ďalšie [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmeny].',
	'revreview-quality-same' => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|kvalitná]] revízia, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] na <i>{{GRAMMAR:lokál|$2}}</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upraviť].',
	'revreview-quality-source' => 'Na tejto revízii bola založená [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kvalitná verzia] tejto stránky, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.',
	'revreview-quality-title' => 'Kvalitná stránka',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Videná stránka]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Zobraziť návrh]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Videná stránka]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobraziť návrh]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Videná stránka]]'''",
	'revreview-quick-invalid' => "'''Neplatný ID revízie'''",
	'revreview-quick-none' => "'''Aktuálna'''. Žiadne revízie neboli skontrolvoané..",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kvalitná stránka]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Zobraziť návrh]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kvalitná stránka]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobraziť návrh]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitná stránka]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Návrh]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobraziť stránku]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} porovnať])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Návrh]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobraziť stránku]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} porovnať])",
	'revreview-selected' => "Zvolená verzia '''$1:'''",
	'revreview-source' => 'Zdroj konceptu',
	'revreview-stable' => 'Stabilná stránka',
	'revreview-stable-title' => 'Videná stránka',
	'revreview-stable1' => 'Môžete zobraziť [{{fullurl:$2|stableid=$2}} túto označenú verziu] alebo sa pozrieť, či je teraz [{{fullurl:$1|stable=1}} stabilná verzia] tejto stránky.',
	'revreview-stable2' => 'Môžete zobraziť [{{fullurl:$1|stable=1}} stabilnú verziu] tejto stránky (ak ešte existuje).',
	'revreview-style' => 'Čitateľnosť',
	'revreview-style-0' => 'neschválené',
	'revreview-style-1' => 'prijateľná',
	'revreview-style-2' => 'dobrá',
	'revreview-style-3' => 'zhustená',
	'revreview-style-4' => 'odporúčaný',
	'revreview-submit' => 'Odoslať',
	'revreview-submitting' => 'Odosiela sa...',
	'revreview-finished' => 'Kontrola dokončená!',
	'revreview-failed' => 'Kontrola zlyhala!',
	'revreview-successful' => "'''Vybraná revízia [[:$1|$1]] bola úspešne označená. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} zobraziť stabilné verzie])'''",
	'revreview-successful2' => "'''Označenie vybranej revízie [[:$1|$1]] bolo úspešne zrušené.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabilné verzie]], nie najnovšie verzie, sú nastavené ako štandardný obsah stránky pre čitateľov.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabilné verzie]] sú skontrolované revízie stránok a je možné ich nastaviť ako štandardný obsah stránky pre čitateľov.''",
	'revreview-toggle' => '(+/-)',
	'revreview-toggle-title' => 'zobraziť/skryť podrobnosti',
	'revreview-toolow' => 'Musíte ohodnotiť každý z nasledujúcich atribútov minimálne vyššie ako „neschválené“, aby bolo možné verziu považovať za skontrolovanú. Ak chcete učiniť verziu zavrhovanou, nastavte všetky polia na „neschválené“.',
	'revreview-update' => "Prosím, [[{{MediaWiki:Validationpage}}|skontrolujte]] všetky zmeny ''(zobrazené nižšie)'', ktoré boli vykonané od [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválenia].<br />
'''Niektoré šablóny/súbory sa zmenili:'''",
	'revreview-update-includes' => "'''Niektoré šablóny/súbory sa zmenili:'''",
	'revreview-update-none' => "Prosím, [[{{MediaWiki:Validationpage}}|skontrolujte]] všetky zmeny ''(zobrazené nižšie)'', ktoré boli vykonané od [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} schválenia] poslednej stabilnej revízie.",
	'revreview-update-use' => "'''POZN.:''' Ak nejaká z týchto šablón/súborov má stabilnú verziu, potom je už použitá v stabilnej verzii tohto článku.",
	'revreview-diffonly' => "''Stránku môžete skontrolovať po kliknutí na odkaz „aktuálna revízia” pomocou formulára na kontrolu.''",
	'revreview-visibility' => "'''Táto stránka má [[{{MediaWiki:Validationpage}}|stabilnú verziu]]; nastavenia stability stránky je možné [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} upraviť].'''",
	'revreview-visibility2' => "'''Táto stránka má zastaralú [[{{MediaWiki:Validationpage}}|stabilnú verziu]]; nastavenia stability stránky je možné [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} upraviť].'''",
	'revreview-visibility3' => "'''Táto stránka nemá [[{{MediaWiki:Validationpage}}|stabilnú verziu]]; nastavenia stability stránky je možné [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} upraviť].'''",
	'revreview-revnotfound' => 'Požadovaná staršia verzia stránky nebola nájdená.
Prosím skontrolujte URL adresu, ktorú ste použili na prístup k tejto stránke.',
	'right-autoreview' => 'Automaticky označiť revízie ako videné',
	'right-movestable' => 'Presunúť stabilné stránky',
	'right-review' => 'Označiť revízie ako videné',
	'right-stablesettings' => 'Nastaviť ako sa vyberajú a zobrazujú stabilné verzie',
	'right-validate' => 'Označiť revízie ako overené',
	'rights-editor-autosum' => 'automaticky povýšený',
	'rights-editor-revoke' => '[[$1]] odteraz nemá status redaktor.',
	'specialpages-group-quality' => 'Zaistenie kvality',
	'stable-logentry' => 'nastavil stabilné verzie [[$1]]',
	'stable-logentry2' => 'zrušil stabilné verzie [[$1]]',
	'stable-logpage' => 'Záznam stabilných verzií',
	'stable-logpagetext' => 'Toto je záznam zmien v konfigurácii [[{{MediaWiki:Validationpage}}|stabilnej verzie]] článkov.
Môžete si pozrieť [[Special:StablePages|Zoznam stabilných stránok]].',
	'revreview-filter-all' => 'Všetky',
	'revreview-filter-stable' => 'stabilná',
	'revreview-filter-approved' => 'Schválené',
	'revreview-filter-reapproved' => 'Znova schválené',
	'revreview-filter-unapproved' => 'Neschválené',
	'revreview-filter-auto' => 'Automatické',
	'revreview-filter-manual' => 'Ručné',
	'revreview-statusfilter' => 'Zmena stavu:',
	'revreview-typefilter' => 'Typ:',
	'revreview-levelfilter' => 'Úroveň:',
	'revreview-lev-sighted' => 'videná',
	'revreview-lev-quality' => 'kvalitná',
	'revreview-lev-pristine' => 'čistá',
	'revreview-reviewlink' => 'skontrolovať',
	'tooltip-ca-current' => 'Zobraziť aktuálny koncept tejto stránky',
	'tooltip-ca-stable' => 'Zobraziť stabilnú verziu tejto stránky',
	'tooltip-ca-default' => 'Nastavenia kontroly kvality',
	'revreview-locked-title' => 'Úpravy vyžadujú kontrolu predtým, než sa zobrazia na tejto stránke!',
	'revreview-unlocked-title' => 'Úpravy nevyžadujú kontrolu predtým, než sa zobrazia na tejto stránke!',
	'revreview-locked' => 'Úpravy vyžadujú kontrolu predtým, než sa zobrazia na tejto stránke!',
	'revreview-unlocked' => 'Úpravy nevyžadujú kontrolu predtým, než sa zobrazia na tejto stránke!',
	'log-show-hide-review' => '$1 záznam kontrol',
	'revreview-tt-review' => 'Skontrolovať túto stránku',
	'validationpage' => '{{ns:help}}:Overovanie stránok',
);

/** Slovenian (Slovenščina) */
$messages['sl'] = array(
	'revreview-revnotfound' => 'Redakcije strani, ki ste jo poskušali pridobiti, ni mogoče najti. Prosimo, preverite spletni naslov, ki ste ga uporabili za dostop do strani.',
);

/** Albanian (Shqip) */
$messages['sq'] = array(
	'revreview-revnotfound' => 'Versioni i vjetër i faqes së kërkuar nuk mund të gjehej.Ju lutem kontrolloni URL-in që përdorët për të ardhur tek kjo faqe.',
);

/** Serbian Cyrillic ekavian (Српски (ћирилица))
 * @author Millosh
 * @author Sasa Stefanovic
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'editor' => 'Уређивач',
	'flaggedrevs' => 'Означене измене',
	'flaggedrevs-backlog' => "Тренутно постоји позадински лог на [[Special:OldReviewedPages|застарелим овереним странама]]. '''Потребна је твоја пажња!'''",
	'flaggedrevs-desc' => 'Даје уредницима и прегледачима могућност да овере верзију и стабилизују страну.',
	'flaggedrevs-pref-UI-0' => 'Коришњење детаљног интерфејса за стабилне верзије.',
	'flaggedrevs-pref-UI-1' => 'Коришћење једноставног интерфејса за стабилне верзије.',
	'flaggedrevs-prefs-stable' => 'Подразумевај приказ стабилних верзија страна (ако постоје).',
	'flaggedrevs-prefs-watch' => 'Додај стране које сам прегледао у мој списак надгледања.',
	'group-editor' => 'Уређивачи',
	'group-editor-member' => 'Уређивач',
	'group-reviewer' => 'Прегледачи',
	'group-reviewer-member' => 'Прегледач',
	'grouppage-editor' => '{{ns:project}}:Уређивач',
	'grouppage-reviewer' => '{{ns:project}}:Прегледач',
	'hist-draft' => 'драфт верзија',
	'hist-quality' => 'квалитетна верзија',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} оверено] од стране сарадника [[User:$3|$3]]',
	'hist-stable' => 'видна верзија',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} прегледано] од стране сарадника [[User:$3|$3]]',
	'review-diff2stable' => 'Погледај измене између стабилне и текуће верзије.',
	'review-logentry-app' => 'прегледао r$2 од [[$1]]',
	'review-logentry-dis' => 'застарела верзија стране [[$1]]',
	'review-logentry-id' => 'преглед',
	'review-logentry-diff' => 'diff према стабилној',
	'review-logpage' => 'Лог прегледа чланка',
	'reviewer' => 'Прегледач',
	'revisionreview' => 'Преглед верзија',
	'revreview-accuracy' => 'Тачност',
	'revreview-accuracy-0' => 'Неодобрене',
	'revreview-accuracy-1' => 'Прегледано',
	'revreview-accuracy-2' => 'Тачно',
	'revreview-accuracy-3' => 'Са добрим изворима',
	'revreview-accuracy-4' => 'Изабрани',
	'revreview-approved' => 'одобрено',
	'revreview-auto' => '(аутоматски)',
	'revreview-auto-w' => "Мењаш стабилну верзију; измене ће '''аутоматски бити означене као прегледане'''.",
	'revreview-auto-w-old' => "Мењаш прегледану верзију; измене ће '''аутоматски бити означене као прегледане'''.",
	'revreview-current' => 'Нацрт',
	'revreview-depth' => 'Дубина',
	'revreview-depth-0' => 'Неодобрено',
	'revreview-depth-1' => 'Основни',
	'revreview-depth-2' => 'Умерено',
	'revreview-depth-3' => 'Висок',
	'revreview-depth-4' => 'Изабрани',
	'revreview-draft-title' => 'Страна скице',
	'revreview-edit' => 'Уређивање нацрта',
	'revreview-flag' => 'Преглед ове верзије',
	'revreview-invalid' => "'''Лош циљ:''' ниједна [[{{MediaWiki:Validationpage}}|прегледана]] верзије не поседује дати редни број.",
	'revreview-legend' => 'Оцени верзију садржаја',
	'revreview-log' => 'Коментар:',
	'revreview-main' => 'Види [[Special:Unreviewedpages|списак непрегледаних страна]].',
	'revreview-note' => '[[User:$1|$1]] направи следећу белешку током [[{{MediaWiki:Validationpage}}|прегледања]] ове верзије.',
	'revreview-notes' => 'Мишљења и белешке за приказ:',
	'revreview-oldrating' => 'Оцењено је:',
	'revreview-patrol' => 'Означи ову измену као патролирану.',
	'revreview-patrol-title' => 'Означи као патролирано.',
	'revreview-patrolled' => 'Следећа измена стране [[:$1|$1]] је обележена патролираном.',
	'revreview-quality-title' => 'Квалитетан чланак',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Прегледани чланак]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} види нацрт]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Прегледани чланак]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} види нацрт]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Прегледани чланак]]'''",
	'revreview-quick-invalid' => "'''Лош редни број верзије!'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Тренутна верзија]]''' (непрегледана)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Квалитетан чланак]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} види нацрт]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Квалитетан чланак]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} види нацрт]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Квалитетан чланак]]'''",
	'revreview-selected' => "Означена верзија стране '''$1:'''",
	'revreview-source' => 'извор нацрта',
	'revreview-stable' => 'Стабилна страна',
	'revreview-stable-title' => 'Прегледани чланак',
	'revreview-stable2' => 'Можда желиш да видиш [{{fullurl:$1|stable=1}} стабилну верију] ове стране (ако још увек таква постоји).',
	'revreview-style' => 'Читљивост',
	'revreview-style-0' => 'Неодобрено',
	'revreview-style-1' => 'Прихватљив',
	'revreview-style-2' => 'Добар',
	'revreview-style-3' => 'Тачан',
	'revreview-style-4' => 'Изабрани',
	'revreview-submit' => 'Пошаљи',
	'revreview-submitting' => 'Слање...',
	'revreview-finished' => 'Прегледање комплетно!',
	'revreview-successful2' => "'''Успешно је скинута ознака са означене верзије стране [[:$1|$1]].'''",
	'revreview-toggle-title' => 'прикажи/сакриј детаље',
	'revreview-update-includes' => "'''Неки шаблони и/или слике су обновљени:'''",
	'revreview-diffonly' => "''Та преглед стране кликни на линк \"тренутна верзија\" и користи форму за преглед.''",
	'revreview-revnotfound' => 'Старија ревизија ове странице коју сте затражили није нађена.
Молимо вас да проверите УРЛ који сте употребили да бисте приступили овој страници.',
	'right-autoreview' => 'Аутоматски означи верзије прегледаним.',
	'right-movestable' => 'Преименуј стабилне стране.',
	'right-review' => 'Означи верзије као прегледане.',
	'right-stablesettings' => 'Намести означавање и приказ стабилних верзија.',
	'right-validate' => 'Означи верзије овереним.',
	'rights-editor-autosum' => 'аутоматски напредовано',
	'rights-editor-revoke' => 'уклоњен статус уредника сараднику [[$1]]',
	'specialpages-group-quality' => 'Обезбеђење квалитета',
	'stable-logentry' => 'омогућене стабилне верзије за сарадника [[$1]]',
	'stable-logentry2' => 'поништи приступ стабилним верзија за [[$1]]',
	'stable-logpage' => 'Лог стабилности',
	'revreview-filter-all' => 'све',
	'revreview-filter-approved' => 'одобрено',
	'revreview-filter-reapproved' => 'поново одобрено',
	'revreview-filter-unapproved' => 'неодобрено',
	'revreview-filter-auto' => 'аутоматски',
	'revreview-filter-manual' => 'ручно',
	'revreview-statusfilter' => 'Промена статуса:',
	'revreview-typefilter' => 'Тип:',
	'tooltip-ca-current' => 'Прегледај текући нацрт ове стране.',
	'tooltip-ca-stable' => 'Погледајте стабилну верзију ове странице',
	'tooltip-ca-default' => 'Подешавања обезбеђивања квалитета.',
	'revreview-ak-review' => 'с',
	'revreview-tt-review' => 'Преглед ове стране.',
	'validationpage' => '{{ns:help}}:Валидација чланка',
);

/** Serbian Latin ekavian (Srpski (latinica))
 * @author Michaello
 */
$messages['sr-el'] = array(
	'editor' => 'Uređivač',
	'flaggedrevs' => 'Označene izmene',
	'flaggedrevs-desc' => 'Daje urednicima i pregledačima mogućnost da overe verziju i stabilizuju stranu.',
	'flaggedrevs-pref-UI-0' => 'Korišnjenje detaljnog interfejsa za stabilne verzije.',
	'flaggedrevs-pref-UI-1' => 'Korišćenje jednostavnog interfejsa za stabilne verzije.',
	'flaggedrevs-prefs-stable' => 'Podrazumevaj prikaz stabilnih verzija strana (ako postoje).',
	'flaggedrevs-prefs-watch' => 'Dodaj strane koje sam pregledao u moj spisak nadgledanja.',
	'group-editor' => 'Uređivači',
	'group-editor-member' => 'Uređivač',
	'group-reviewer' => 'Pregledači',
	'group-reviewer-member' => 'Pregledač',
	'grouppage-editor' => '{{ns:project}}:Uređivač',
	'grouppage-reviewer' => '{{ns:project}}:Pregledač',
	'hist-draft' => 'draft verzija',
	'hist-quality' => 'kvalitetna verzija',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} overeno] od strane saradnika [[User:$3|$3]]',
	'hist-stable' => 'vidna verzija',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} pregledano] od strane saradnika [[User:$3|$3]]',
	'review-diff2stable' => 'Pogledaj izmene između stabilne i tekuće verzije.',
	'review-logentry-app' => 'pregledao r$2 od [[$1]]',
	'review-logentry-id' => 'pregled',
	'review-logentry-diff' => 'diff prema stabilnoj',
	'review-logpage' => 'Log pregleda članka',
	'reviewer' => 'Pregledač',
	'revisionreview' => 'Pregled verzija',
	'revreview-accuracy' => 'Tačnost',
	'revreview-accuracy-0' => 'Neodobrene',
	'revreview-accuracy-1' => 'Pregledano',
	'revreview-accuracy-2' => 'Tačno',
	'revreview-accuracy-3' => 'Sa dobrim izvorima',
	'revreview-accuracy-4' => 'Izabrani',
	'revreview-approved' => 'odobreno',
	'revreview-auto' => '(automatski)',
	'revreview-auto-w' => "Menjaš stabilnu verziju; izmene će '''automatski biti označene kao pregledane'''.",
	'revreview-auto-w-old' => "Menjaš pregledanu verziju; izmene će '''automatski biti označene kao pregledane'''.",
	'revreview-current' => 'Nacrt',
	'revreview-depth' => 'Dubina',
	'revreview-depth-0' => 'Neodobreno',
	'revreview-depth-1' => 'Osnovni',
	'revreview-depth-2' => 'Umereno',
	'revreview-depth-3' => 'Visok',
	'revreview-depth-4' => 'Izabrani',
	'revreview-draft-title' => 'Strana skice',
	'revreview-edit' => 'Uređivanje nacrta',
	'revreview-flag' => 'Pregled ove verzije',
	'revreview-invalid' => "'''Loš cilj:''' nijedna [[{{MediaWiki:Validationpage}}|pregledana]] verzije ne poseduje dati redni broj.",
	'revreview-legend' => 'Oceni verziju sadržaja',
	'revreview-log' => 'Komentar:',
	'revreview-note' => '[[User:$1|$1]] napravi sledeću belešku tokom [[{{MediaWiki:Validationpage}}|pregledanja]] ove verzije.',
	'revreview-notes' => 'Mišljenja i beleške za prikaz:',
	'revreview-oldrating' => 'Ocenjeno je:',
	'revreview-patrol' => 'Označi ovu izmenu kao patroliranu.',
	'revreview-patrol-title' => 'Označi kao patrolirano.',
	'revreview-patrolled' => 'Sledeća izmena strane [[:$1|$1]] je obeležena patroliranom.',
	'revreview-quality-title' => 'Kvalitetan članak',
	'revreview-quick-invalid' => "'''Loš redni broj verzije!'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Trenutna verzija]]''' (nepregledana)",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetan članak]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vidi nacrt]]",
	'revreview-selected' => "Označena verzija strane '''$1:'''",
	'revreview-source' => 'izvor nacrta',
	'revreview-stable' => 'Stabilna strana',
	'revreview-stable2' => 'Možda želiš da vidiš [{{fullurl:$1|stable=1}} stabilnu veriju] ove strane (ako još uvek takva postoji).',
	'revreview-style' => 'Čitljivost',
	'revreview-style-0' => 'Neodobreno',
	'revreview-style-1' => 'Prihvatljiv',
	'revreview-style-2' => 'Dobar',
	'revreview-style-3' => 'Tačan',
	'revreview-style-4' => 'Izabrani',
	'revreview-submit' => 'Pošalji',
	'revreview-submitting' => 'Slanje...',
	'revreview-finished' => 'Pregledanje kompletno!',
	'revreview-toggle-title' => 'prikaži/sakrij detalje',
	'revreview-diffonly' => "''Ta pregled strane klikni na link \"trenutna verzija\" i koristi formu za pregled.''",
	'revreview-revnotfound' => 'Starija revizija ove stranice koju ste zatražili nije nađena.
Molimo vas da proverite URL koji ste upotrebili da biste pristupili ovoj stranici.',
	'right-autoreview' => 'Automatski označi verzije pregledanim.',
	'right-movestable' => 'Preimenuj stabilne strane.',
	'right-review' => 'Označi verzije kao pregledane.',
	'right-stablesettings' => 'Namesti označavanje i prikaz stabilnih verzija.',
	'right-validate' => 'Označi verzije overenim.',
	'rights-editor-autosum' => 'automatski napredovano',
	'rights-editor-revoke' => 'uklonjen status urednika saradniku [[$1]]',
	'specialpages-group-quality' => 'Obezbeđenje kvaliteta',
	'stable-logentry' => 'omogućene stabilne verzije za saradnika [[$1]]',
	'stable-logentry2' => 'poništi pristup stabilnim verzija za [[$1]]',
	'stable-logpage' => 'Log stabilnosti',
	'revreview-filter-all' => 'sve',
	'revreview-filter-approved' => 'odobreno',
	'revreview-filter-reapproved' => 'ponovo odobreno',
	'revreview-filter-unapproved' => 'neodobreno',
	'revreview-filter-auto' => 'automatski',
	'revreview-filter-manual' => 'ručno',
	'revreview-statusfilter' => 'Promena statusa:',
	'revreview-typefilter' => 'Tip:',
	'tooltip-ca-current' => 'Pregledaj tekući nacrt ove strane.',
	'tooltip-ca-stable' => 'Pogledajte stabilnu verziju ove stranice',
	'tooltip-ca-default' => 'Podešavanja obezbeđivanja kvaliteta.',
	'revreview-ak-review' => 's',
	'revreview-tt-review' => 'Pregled ove strane.',
	'validationpage' => '{{ns:help}}:Validacija članka',
);

/** Seeltersk (Seeltersk)
 * @author Maartenvdbent
 * @author Pyt
 */
$messages['stq'] = array(
	'editor' => 'Sieuwer',
	'flaggedrevs' => 'Markierde Versione',
	'flaggedrevs-desc' => 'Stoabile Versione',
	'group-editor' => 'Sieuwere',
	'group-editor-member' => 'Sieuwer',
	'group-reviewer' => 'Wröigere',
	'group-reviewer-member' => 'Wröiger',
	'grouppage-editor' => '{{ns:project}}:Sieuwer',
	'grouppage-reviewer' => '{{ns:project}}:Wröiger',
	'hist-quality' => 'wröigede Version',
	'hist-stable' => 'sieuwede Version',
	'review-diff2stable' => 'Unnerscheede twiske ju stoabile Version un ju aktuelle Version bekiekje',
	'review-logentry-app' => 'wröigede [[$1]]',
	'review-logentry-dis' => 'fersmeet ne Version fon [[$1]]',
	'review-logentry-id' => 'Version-ID $1',
	'review-logpage' => 'Artikkel-Wröig-Logbouk',
	'review-logpagetext' => 'Dit is dät Annerengs-Logbouk fon do [[{{MediaWiki:Validationpage}}|Sieden-Fräigoawen]].',
	'reviewer' => 'Wröiger',
	'revisionreview' => 'Versionswröigenge',
	'revreview-accuracy' => 'Akroategaid',
	'revreview-accuracy-0' => 'nit fräiroat',
	'revreview-accuracy-1' => 'sieuwed',
	'revreview-accuracy-2' => 'wröiged',
	'revreview-accuracy-3' => 'Wällen wröiged',
	'revreview-accuracy-4' => 'exzellent',
	'revreview-auto' => '(automatisk)',
	'revreview-auto-w' => "Du beoarbaidest ne stoabile Version, dien Beoarbaidenge wäd '''automatisk as wröiged markierd.'''
	Du schuust ju Siede deeruum foar dät Spiekerjen in ju Foarschau bekiekje.",
	'revreview-auto-w-old' => "Du beoarbaidest ne oolde Version, dien Beoarbaidenge wäd '''automatisk as wröiged markierd.'''
Du schuust ju Siede deeruum foar dät Spiekerjen in ju Foarschau bekiekje.",
	'revreview-basic' => 'Dit is ju lääste [[Help:Sieuwede Versione|sieuwede]] Version,
	[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} fräiroat] ap n <i>$2</i>. Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} apstuunse Version]
	kon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided] wäide; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}]
{{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-basic-same' => "Dät is ju lääste [[{{MediaWiki:Validationpage}}|bekiekede]] Version,
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wies aal]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} fräiroat] an dän <i>$2</i>. Ju Siede kon '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided]''' wäide.",
	'revreview-changed' => "'''Ju Aktion kuude nit ap ju Version fon [[:$1|$1]] anwoand wäide.'''

Ne Foarloage of ne Bielde wuuden sunner spezifiske Versionsnummer anfoarderd. Dit kon passierje, wan ne dynamiske Foarloage ne wiedere Foarloage of ne Bielde änthaalt, ju der von ne Variable ouhongich is, ju sik siet Ounfang fon ju Pröiwenge annerd häd. Fonnäien Leeden fon ju Siede un Startjen fon ju Wröigenge kon dät Problem ouhälpe.",
	'revreview-current' => 'Äntwurf (beoarbaidboar)',
	'revreview-depth' => 'Djüpte',
	'revreview-depth-0' => 'nit fräiroat',
	'revreview-depth-1' => 'eenfach',
	'revreview-depth-2' => 'middel',
	'revreview-depth-3' => 'hooch',
	'revreview-depth-4' => 'exzellent',
	'revreview-edit' => 'Beoarbaidje Äntwurf',
	'revreview-flag' => 'Wröig Version',
	'revreview-legend' => 'Inhoold fon ju Version wäidierje',
	'revreview-log' => 'Logbouk-Iendraach:',
	'revreview-main' => 'Du moast ne Artikkelversion tou Wröigenge uutwääle.

Sjuch [[Special:Unreviewedpages]] foar ne Lieste fon nit pröiwede Versione.',
	'revreview-newest-basic' => 'Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lääste wröigede Version]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} sjuch aal]) wuude ap n <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} fräiroat].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}] {{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-newest-quality' => 'Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lääste wröigede Version]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} sjuch aal]) wuude ap n <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} fräiroat].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}] {{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-noflagged' => 'Fon disse Siede rakt et neen markierde Versione, so dät noch neen Tjuugnis uur ju [[{{MediaWiki:Validationpage}}|Qualität]] moaked wäide kon.',
	'revreview-note' => '[[User:$1|$1]] moakede ju foulgendje [[{{MediaWiki:Validationpage}}|Wröignotiz]] tou disse Version:',
	'revreview-notes' => 'Antouwiesende Bemäärkengen un Notizen:',
	'revreview-oldrating' => 'Iendeelenge bit nu:',
	'revreview-patrol' => 'Markier disse Annerenge as kontrollierd',
	'revreview-patrolled' => 'Ju uutwäälde Version fon [[:$1|S1]] wuude as kontrollierd markierd.',
	'revreview-quality' => 'Dit is ju lääste [[{{MediaWiki:Validationpage}}|wröigede]] Version,
	[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} fräiroat] ap n <i>$2</i>. Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} apstuunse Version]
	kon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided] wäide; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}]
	{{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-quality-same' => "Dät is ju lääste [[{{MediaWiki:Validationpage}}|wröigede]] Version,
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} wies aal]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} fräiroat] an dän <i>$2</i>. Ju Siede kon '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided]''' wäide.",
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Sieuwed.]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Sjuch ju aktuelle Version]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Sieuwed]]''' (neen Annerengen do der nit wröiged sunt)",
	'revreview-quick-none' => "'''Aktuell.''' Der wuude noch neen Version wröiged.",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Wröiged.]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Sjuch ju aktuelle Version]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Wröiged]]''' (neen Annerengen do der nit wröiged sunt)",
	'revreview-quick-see-basic' => "'''Aktuell.''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Sjuch ju lääste wröigede Version]]
	($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|Annerenge|Annerengen}}])",
	'revreview-quick-see-quality' => "'''Aktuell.''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Sjuch ju lääste wröigede Version]]
	($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|Annerenge|Annerengen}}])",
	'revreview-selected' => "Wäälde Versione fon '''$1:'''",
	'revreview-source' => 'Äntwurfs-Wältext',
	'revreview-stable' => 'Stoabil',
	'revreview-style' => 'Leesboarhaid',
	'revreview-style-0' => 'nit fräiroat',
	'revreview-style-1' => 'akzeptoabel',
	'revreview-style-2' => 'goud',
	'revreview-style-3' => 'akroat',
	'revreview-style-4' => 'exzellent',
	'revreview-submit' => 'Wröigenge spiekerje',
	'revreview-text' => 'Ne stoabile Version wäd bie ju Siedendeerstaalenge ljauer nuumen as ne näiere Version.',
	'revreview-toolow' => 'Du moast foar älk fon do unnerstoundende Attribute n Wäid haager as „{{int:revreview-accuracy-0}}“ ienstaale, 
deermäd ne Version as wröiged jält. Uum ne Version tou fersmieten, mouten aal Attribute ap „{{int:revreview-accuracy-0}}“ stounde.',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Wröig]] älke Annerenge ''(sjuch hierunner)'' siet ju lääste stoabile Version [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} fräiroat] wuude.

'''Do foulgjende Foarloagen un Bielden wuuden ferannerd:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Wröig]] älke Annerenge ''(sjuch hierunner)'' siet ju lääste stoabile Version [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} fräiroat] wuude.",
	'revreview-visibility' => 'Disse Siede häd ne [[{{MediaWiki:Validationpage}}|stoabile Version]], ju der
	[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigurierd] wäide kon.',
	'revreview-revnotfound' => 'Ju soachte Version fon dissen Artikkel kuude nit fuunen wäide. Uurpröiwe jädden ju URL fon disse Siede.',
	'rights-editor-autosum' => 'automatiske Gjuchte-uutgoawe',
	'rights-editor-revoke' => 'äntlook dät Sieuwer-Gjucht fon [[$1]]',
	'stable-logentry' => 'konfigurierde ju Sieden-Ienstaalenge fon [[$1]]',
	'stable-logentry2' => 'sätte ju Sieden-Ienstaalenge foar [[$1]] tourääch',
	'stable-logpage' => 'Stoabile-Versione-Logbouk',
	'stable-logpagetext' => 'Dit is dät Annerengs-Logbouk fon do Konfigurationsienstaalengen fon do [[{{MediaWiki:Validationpage}}|Stoabile Versione]]',
	'tooltip-ca-current' => 'Ankiekjen fon dän aktuelle Äntwurf fon disse Siede',
	'tooltip-ca-stable' => 'Ankiekjen fon ju stoabile Version fon disse Siede',
	'tooltip-ca-default' => 'Ienstaalengen fon ju Artikkel-Qualität',
	'validationpage' => '{{ns:help}}:Stoabile Versione',
);

/** Sundanese (Basa Sunda)
 * @author Irwangatot
 * @author Kandar
 */
$messages['su'] = array(
	'editor' => 'Éditor',
	'group-editor' => 'Éditor',
	'group-editor-member' => 'Éditor',
	'grouppage-editor' => '{{ns:project}}:Éditor',
	'review-diff2stable' => 'Témbongkeun béda antara révisi stabil jeung kiwari',
	'review-logentry-id' => 'ID révisi $1',
	'revreview-accuracy-0' => 'Teu disatujuan',
	'revreview-accuracy-2' => 'Akurat',
	'revreview-accuracy-4' => 'Petingan',
	'revreview-auto' => '(otomatis)',
	'revreview-depth' => 'Jero',
	'revreview-depth-0' => 'Teu disatujuan',
	'revreview-depth-1' => 'Dasar',
	'revreview-depth-3' => 'Luhur',
	'revreview-depth-4' => 'Petingan',
	'revreview-log' => 'Kamandang:',
	'revreview-stable' => 'Kaca Stabil',
	'revreview-style-0' => 'Teu disatujuan',
	'revreview-style-1' => 'Meueusan',
	'revreview-style-2' => 'Alus',
	'revreview-style-4' => 'Petingan',
	'revreview-revnotfound' => 'Révisi heubeul kaca nu dipénta ku anjeun teu bisa kapanggih.
Please check the URL you used to access this page.',
	'right-stablesettings' => 'Ngatur kumaha vérsi stabil dipilih sarta dipintonkeun',
	'rights-editor-revoke' => 'nyabut status éditor ti [[$1]]',
	'stable-logpage' => 'Log vérsi stabil',
	'tooltip-ca-stable' => 'Témbongkeun vérsi stabil ieu kaca',
	'validationpage' => '{{ns:help}}:Validasi artikel',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Lejonel
 * @author M.M.S.
 * @author Najami
 * @author Rotsee
 */
$messages['sv'] = array(
	'editor' => 'Redaktör',
	'flaggedrevs' => 'Flaggade sidversioner',
	'flaggedrevs-backlog' => "Det finns för närvarande en backlogg på [[Special:OldReviewedPages|väntande redigeringar]] till granskade sidor. '''Din uppmärksamhet behövs!'''",
	'flaggedrevs-watched-pending' => "Det finns för närvarande [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} väntande redigeringar] till de granskade sidorna på den bevakningslista. '''Din uppmärksamhet behövs!'''",
	'flaggedrevs-desc' => 'Ger redaktörer och granskare möjligheten att validera sidversioner och stablilsera sidor',
	'flaggedrevs-pref-UI' => 'Gränssnitt för stabil version:',
	'flaggedrevs-pref-UI-0' => 'Använd ett detaljerat gränssnitt för stabila versioner',
	'flaggedrevs-pref-UI-1' => 'Använd ett enkelt gränssnitt för stabila versioner',
	'prefs-flaggedrevs' => 'Stabilitet',
	'flaggedrevs-prefs-stable' => 'Visa alltid den stabila versionen av sidor (om en sådan finns)',
	'flaggedrevs-prefs-watch' => 'Lägg till sidor jag granskar i min bevakningslista',
	'group-editor' => 'Redaktörer',
	'group-editor-member' => 'redaktör',
	'group-reviewer' => 'Granskare',
	'group-reviewer-member' => 'granskare',
	'grouppage-editor' => '{{ns:project}}:Redaktörer',
	'grouppage-reviewer' => '{{ns:project}}:Granskare',
	'group-autoreview' => 'Autogranskare',
	'group-autoreview-member' => 'autogranskare',
	'grouppage-autoreview' => '{{ns:project}}:Autogranskare',
	'hist-draft' => 'utkastet för sidversionen',
	'hist-quality' => 'kvalitetsversion',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validerad] av [[User:$3|$3]]',
	'hist-stable' => 'synad version',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} synad] av [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableis=$2}} automatiskt synad]',
	'review-diff2stable' => 'Visa ändringar mellan den stabila och den senaste versionen',
	'review-logentry-app' => 'granskade version $2 av [[$1]]',
	'review-logentry-dis' => 'degraderade version $2 av [[$1]]',
	'review-logentry-id' => 'visa',
	'review-logentry-diff' => 'skillnad mot stabil',
	'review-logpage' => 'Granskningslogg',
	'review-logpagetext' => 'Det här är en logg över ändringar till [[{{MediaWiki:Validationpage}}|godkänningsstatus]] för innehållssidor.
Se [[Special:ReviewedPages|listan över granskade sidor]] för en lista över godkända sidor.',
	'reviewer' => 'Granskare',
	'revisionreview' => 'Granska sidversioner',
	'revreview-accuracy' => 'Riktighet',
	'revreview-accuracy-0' => 'Ej godkänd',
	'revreview-accuracy-1' => 'Synad',
	'revreview-accuracy-2' => 'Riktig',
	'revreview-accuracy-3' => 'Bra källbelagd',
	'revreview-accuracy-4' => 'Utmärkt',
	'revreview-approved' => 'Godkänd',
	'revreview-auto' => '(automatiskt)',
	'revreview-auto-w' => "Du redigerar den stabila versionen; ändringar kommer '''automatiskt granskas'''.",
	'revreview-auto-w-old' => "Du redigerar en granskad version; ändringar kommer '''automatiskt bli granskade'''.",
	'revreview-basic' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|synade]] versionen, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ändring|ändringar}}] som väntar på granskning.',
	'revreview-basic-i' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|synade]] sidversionen, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mall- och bildändringar] som väntar på granskning.',
	'revreview-basic-old' => 'Det här är en [[{{MediaWiki:Validationpage}}|synad]] sidversion ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
Nya [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ändringar] kan ha gjorts.',
	'revreview-basic-same' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|synade]] sidversionen ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.',
	'revreview-basic-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} synad version] av den här sidan, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>, baserades på den här versionen.',
	'revreview-blocked' => 'Du kan inte granska denna version eftersom ditt konto för tillfället är blockerat ([$1 detaljer])',
	'revreview-changed' => "'''Den begärda åtgärden kunde inte utföras på denna version av [[:$1|$1]].'''

En mall eller bild har efterfrågats utan att någon specifik version angavs. Detta kan hända om en mall inkluderar en annan bild eller mall beroende på en variabel som ändrats sedan du startade att granska denna sida. Att ladda om sidan och granska igen kan lösa detta problem.",
	'revreview-current' => 'Utkast',
	'revreview-depth' => 'Djupgående',
	'revreview-depth-0' => 'Ej godkänd',
	'revreview-depth-1' => 'Grundläggande',
	'revreview-depth-2' => 'Medel',
	'revreview-depth-3' => 'Hög',
	'revreview-depth-4' => 'Utmärkt',
	'revreview-draft-title' => 'Utkastsida',
	'revreview-edit' => 'Redigera utkast',
	'revreview-editnotice' => "'''Notera: Redigeringar till den här sidan kommer att införlivas i den [[{{MediaWiki:Validationpage}}|stabila versionen]] när en etablerad användare granskar dem.'''",
	'revreview-flag' => 'Granska denna sidversion',
	'revreview-edited' => "'''Ändringar kommer att infogas i den [[{{MediaWiki:Validationpage}}|stabila versionen]] när en etablerad användare granskar dom.
''Utkastet'' visas nedan.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|ändring väntar|ändringar väntar}}] på granskning.",
	'revreview-invalid' => "'''Ogiltigt mål:''' inga [[{{MediaWiki:Validationpage}}|granskade]] versioner motsvarar den angivna IDn.",
	'revreview-legend' => 'Bedöm versionens innehåll',
	'revreview-log' => 'Kommentar:',
	'revreview-main' => 'Du måste välja en viss version av en innehållssida för att kunna granska den.

Se [[Special:Unreviewedpages|listan över ogranskade sidor]].',
	'revreview-newest-basic' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste synade versionen] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ändring|ändringar}}] behöver granskas.',
	'revreview-newest-basic-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste synade versionen] av den här sidan ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mall eller bildändringar] behöver granskas.',
	'revreview-newest-quality' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste kvalitetsversionen av sidan]  ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ändring|ändringar}}] behöver granskas.',
	'revreview-newest-quality-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste kvalitetsversionen] av den här sidan ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mall eller bildändringar] behöver granskas.',
	'revreview-noflagged' => "Det finns inga granskade versioner av den här sidan, så dess kvalitet har kanske '''inte''' [[{{MediaWiki:Validationpage}}|kontrollerats]].",
	'revreview-note' => '[[User:$1|$1]] gjorde följande noteringar när den här sidversionen [[{{MediaWiki:Validationpage}}|granskades]]:',
	'revreview-notes' => 'Anmärkningar eller noteringar som kommer visas:',
	'revreview-oldrating' => 'Bedömningen var:',
	'revreview-patrol' => 'Märk den här ändringen som patrullerad',
	'revreview-patrol-title' => 'Markera som patrullerad',
	'revreview-patrolled' => 'Den valda versionen av [[:$1|$1]] har märkts som patrullerad.',
	'revreview-quality' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|kvalitetsversionen]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAME}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ändring|ändringar}}] väntar på granskning.',
	'revreview-quality-i' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|kvalitetsversionen]] av sidan, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mall och bild ändringar] som väntar på granskning.',
	'revreview-quality-old' => 'Det här är en [[{{MediaWiki:Validationpage}}|kvalitetsversion]] av sidan ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
Nya [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ändringar] kan ha gjorts.',
	'revreview-quality-same' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|kvalitetsversionen]] av sidan ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.',
	'revreview-quality-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kvalitetsversion] av den här sidan, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>, baserades på den här versionen.',
	'revreview-quality-title' => 'Kvalitetssida',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Synad sida]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visa utkast]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Synad sida]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visa utkast]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Synad sida]]'''",
	'revreview-quick-invalid' => "'''Ogiltigt versions-ID'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Senaste versionen]]''' (inte granskad)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetssida]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visa utkast]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetssida]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visa utkast]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetssida]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Utkast]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} visa sida]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} jämför])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Utkast]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} visa sida]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} jämför])",
	'revreview-selected' => "Vald version av '''$1''':",
	'revreview-source' => 'utkastets källa',
	'revreview-stable' => 'Stabil sida',
	'revreview-stable-title' => 'Synad sida',
	'revreview-stable1' => 'Du kanske vill visa [{{fullurl:$1|stableid=$2}} den här flaggade versionen] för att se ifall den nu är den [{{fullurl:$1|stable=1}} stabila versionen] av den här sidan.',
	'revreview-stable2' => 'Du vill kanske visa den [{{fullurl:$1|stable=1}} stabila versionen] av denna sida (om det finns någon).',
	'revreview-style' => 'Läsbarhet',
	'revreview-style-0' => 'Ej godkänd',
	'revreview-style-1' => 'Godtagbar',
	'revreview-style-2' => 'Bra',
	'revreview-style-3' => 'Koncis',
	'revreview-style-4' => 'Utmärkt',
	'revreview-submit' => 'Spara',
	'revreview-submitting' => 'Levererar...',
	'revreview-finished' => 'Granskning slutförd!',
	'revreview-failed' => 'Granskningen misslyckades!',
	'revreview-successful' => "'''Vald sidversion av [[:$1|$1]] har flaggats. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} visa alla stabila sidversioner])'''",
	'revreview-successful2' => "'''Vald sidversion av [[:$1|$1]] har avflaggats.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabila versioner]] är standardinnehåll i sidor i stället för den nyaste sidversionen.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabila versioner]] är kontrollerade versioner av sidor och kan ställas in som standardinnehåll för läsare.''",
	'revreview-toggle-title' => 'visa/dölj detaljer',
	'revreview-toolow' => 'Din bedömning av sidan måste vara högre än "ej godkänd" för alla egenskaper nedan för att versionen ska anses vara granskad. För att ta bort ett godkännande av en version, ange "ej godkänd" för alla egenskaper.',
	'revreview-update' => "Var god [[{{MediaWiki:Validationpage}}|granska]] några ändringar ''(visas nedan)'' gjorda när den stabila versionen [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkändes].<br />
'''Vissa mallar eller bilder har uppdaterats:'''",
	'revreview-update-includes' => "'''Vissa mallar eller filer har ändrats:'''",
	'revreview-update-none' => "Var god [[{{MediaWiki:Validationpage}}|review]] några ändringar ''(visas nedan)'' gjorda när den stabila versionen [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} godkändes].",
	'revreview-update-use' => "'''NOTERA:''' Om någon av de här mallarna eller bilderna har en stabil version, är den redan använd i den stabila versionen av den här sidan.",
	'revreview-diffonly' => "''För att granska sidan, klicka på versionslänken \"nuvarande version\" och använd granskningsformuläret.''",
	'revreview-visibility' => "'''Denna sida har en uppdaterad [[{{MediaWiki:Validationpage}}|stabil version]]; inställningarna för den kan [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigureras].'''",
	'revreview-visibility2' => "'''Den här sidan har en föråldrad [[{{MediaWiki:Validationpage}}|stabil version]]; inställningarna för sidstabilitet kan [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigureras].'''",
	'revreview-visibility3' => "'''Den här sidan har inte en [[{{MediaWiki:Validationpage}}|stabil version]]; inställningarna för sidstabilitet kan [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} konfigureras].'''",
	'revreview-revnotfound' => 'Den gamla versionen av den sida du frågade efter kan inte hittas. Kontrollera den URL du använde för att nå den här sidan.',
	'right-autoreview' => 'Automatiskt märka sidversioner som synade',
	'right-movestable' => 'Flytta stabila sidor',
	'right-review' => 'Markera sidversioner som synade',
	'right-stablesettings' => 'Ställa in hur stabila versioner väljs och visas',
	'right-validate' => 'Markera sidversioner som validerade',
	'rights-editor-autosum' => 'autobefodring',
	'rights-editor-revoke' => 'tog bort redaktörsstatus från [[$1]]',
	'specialpages-group-quality' => 'Kvalitetsförsäkring',
	'stable-logentry' => 'ändrade inställningar för stabila versioner av [[$1]]',
	'stable-logentry2' => 'återställde inställningar för stabila versioner av [[$1]]',
	'stable-logpage' => 'Versionsstabiliseringslogg',
	'stable-logpagetext' => 'Det här är en logg över ändringar av inställningar för [[{{MediaWiki:Validationpage}}|stabila versioner]] av innehållssidor.
En lista över stabiliserade sidor kan hittas på [[Special:StablePages|listan över stabila sidor]].',
	'revreview-filter-all' => 'Alla',
	'revreview-filter-stable' => 'stabil',
	'revreview-filter-approved' => 'Godkända',
	'revreview-filter-reapproved' => 'Åter godkända',
	'revreview-filter-unapproved' => 'Ej godkända',
	'revreview-filter-auto' => 'Automatiskt',
	'revreview-filter-manual' => 'Manuellt',
	'revreview-statusfilter' => 'Ändring av status:',
	'revreview-typefilter' => 'Typ:',
	'revreview-levelfilter' => 'Nivå:',
	'revreview-lev-sighted' => 'synad',
	'revreview-lev-quality' => 'kvalitet',
	'revreview-lev-pristine' => 'ursprunglig',
	'revreview-reviewlink' => 'granska',
	'tooltip-ca-current' => 'Visa det senaste utkastet för denna sida',
	'tooltip-ca-stable' => 'Visa den stabila versionen av denna sida',
	'tooltip-ca-default' => 'Inställningar för kvalitetssäkring',
	'revreview-locked-title' => 'Redigeringar måste granskas innan de visas på den här sidan!',
	'revreview-unlocked-title' => 'Redigeringar behöver inte granskas innan de visas på den här sidan!',
	'revreview-locked' => 'Redigeringar måste granskas innan de visas på den här sidan!',
	'revreview-unlocked' => 'Redigeringar behöver inte granskas innan de visas på den här sidan!',
	'log-show-hide-review' => '$1 granskningslogg',
	'revreview-tt-review' => 'Granska denna sida',
	'validationpage' => '{{ns:help}}:Sidvalidering',
);

/** Silesian (Ślůnski)
 * @author Timpul
 */
$messages['szl'] = array(
	'revreview-revnotfound' => 'Ńy idźe znejść staršyj wersyji zajty. Sprawdź, proša, URL kery žeś užůu coby uzyskać dostymp do tyj zajty.',
);

/** Tamil (தமிழ்)
 * @author Trengarasu
 */
$messages['ta'] = array(
	'revreview-revnotfound' => 'இப் பக்கத்துக்குரிய, நீங்கள் கோரிய பழைய திருத்தம் காணப்படவில்லை. இந்தப் பக்கத்தை அணுகுவதற்கு நீங்கள் பயன்படுத்திய இணைய முகவரியை அருள் கூர்ந்து சரி பார்க்கவும்.',
);

/** Telugu (తెలుగు)
 * @author Chaduvari
 * @author Kiranmayee
 * @author Mpradeep
 * @author Veeven
 * @author వైజాసత్య
 */
$messages['te'] = array(
	'editor' => 'ఎడిటర్',
	'flaggedrevs' => 'జండాపాతిన కూర్పులు',
	'flaggedrevs-desc' => 'ఎడిటర్లకి/సమీక్షకులకి కూర్పులను సరిచూసే మరియు పేజీలను సుస్థిరపరచే వీలును కల్పిస్తుంది',
	'flaggedrevs-pref-UI' => 'సుస్థిర కూర్పుఅంతర్ముఖము:',
	'prefs-flaggedrevs' => 'సుస్థిరము',
	'flaggedrevs-prefs-watch' => 'నేను సమీక్షించిన పేజీలను నా వీక్షణాజాబితాలో చేర్చు',
	'group-editor' => 'ఎడిటర్లు',
	'group-editor-member' => 'ఎడిటర్',
	'group-reviewer' => 'సమీక్షకులు',
	'group-reviewer-member' => 'సమీక్షకులు',
	'grouppage-editor' => '{{ns:project}}:ఎడిటర్',
	'grouppage-reviewer' => '{{ns:project}}:సమీక్షకులు',
	'group-autoreview' => 'ఆటో రివ్యూవర్స్',
	'group-autoreview-member' => 'ఆటో రివ్యూవర్',
	'grouppage-autoreview' => '{{ns:project}}:ఆటోరివ్యూవర్',
	'hist-draft' => 'చిత్తుప్రతి కూర్పు',
	'hist-quality' => 'నాణ్యమైన కూర్పు',
	'hist-stable' => 'కనబడిన కూర్పు',
	'review-diff2stable' => 'సుస్థిర మరియు ప్రస్తుత కూర్పుల మధ్య మార్పులను చూడండి',
	'review-logentry-app' => '[[$1]] యొక్క $2 ప్రతిని సమీక్షించారు',
	'review-logentry-dis' => '[[$1]] యొక్క $2 కూర్పుని నిరాదరించారు',
	'review-logentry-id' => 'చూడండి',
	'review-logentry-diff' => 'సుస్థిర కూర్పుతో పోల్చిన వ్యత్యాసం',
	'review-logpage' => 'సమీక్షల చిట్టా',
	'review-logpagetext' => 'ఇది విషయపు పేజీల యొక్క వివిధ కూర్పుల [[{{MediaWiki:Validationpage}}|అనుమతి]] స్థితిలో జరిగిన మార్పుల చిట్టా.
అనుమతించిన పేజీల జాబితా కొరకు [[Special:ReviewedPages|సమీక్షించిన పేజీల జాబితా]]ని చూడండి.',
	'reviewer' => 'సమీక్షకులు',
	'revisionreview' => 'కూర్పులను సమీక్షించు',
	'revreview-accuracy' => 'ఖచ్చితత్వం',
	'revreview-accuracy-0' => 'ఆమోదించనివి',
	'revreview-accuracy-1' => 'కనబడింది',
	'revreview-accuracy-2' => 'ఖచ్చితం',
	'revreview-accuracy-3' => 'సమూలము',
	'revreview-accuracy-4' => 'విశేష్యం',
	'revreview-approved' => 'అమోదించబడినది',
	'revreview-auto' => '(ఆటోమెటిక్)',
	'revreview-auto-w' => "మీకు సుస్థిర కూర్పుని సరిదిద్దుతున్నారు; మీ మార్పులు '''ఆటోమెటిగ్గా సమీక్షితమౌతాయి'''",
	'revreview-auto-w-old' => "మీరు సమీక్షించిన కూర్పులో దిద్దుబాటు చేస్తున్నారు; మీ మార్పులు '''ఆటోమాటిగ్గా సమీక్షితమౌతాయి'''.",
	'revreview-basic' => 'ఇది చిట్టచివరిగా [[{{MediaWiki:Validationpage}}|కనబడిన]] కూర్పు; <i>$2</i> న [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తు ప్రతిని] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|మార్పు|మార్పులు}}] సమీక్ష కోసం {{PLURAL:$3|వేచి ఉంది|వేచి ఉన్నాయి}}.',
	'revreview-basic-same' => 'ఇది చిట్టచివరిగా [[{{MediaWiki:Validationpage}}|కనబడిన]] కూర్పు, <i>$2</i> న [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ పేజీని [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు].',
	'revreview-current' => 'డ్రాఫ్టు',
	'revreview-depth' => 'లోతైనది',
	'revreview-depth-0' => 'ఆమోదించనివి',
	'revreview-depth-1' => 'ప్రాథమిక',
	'revreview-depth-2' => 'మధ్యస్తం',
	'revreview-depth-3' => 'ఉన్నత',
	'revreview-depth-4' => 'విశేష్యం',
	'revreview-draft-title' => 'డ్రాఫ్టు పేజి',
	'revreview-edit' => 'డ్రాఫ్టును దిద్దు',
	'revreview-flag' => 'ఈ కూర్పుని సమీక్షించండి',
	'revreview-legend' => 'ఈ కూర్పు యొక్క సారాన్ని వెలకట్టండి',
	'revreview-log' => 'వ్యాఖ్య:',
	'revreview-main' => 'సమీక్షించడానికి మీరు విషయపు పేజీ యొక్క ఓ నిర్ధిష్ట కూర్పుని ఎంచుకోవాలి.

[[Special:Unreviewedpages|సమీక్షించని పేజీల జాబితా]]ని చూడండి.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} చిట్టచివరిగా కనబడిన ఈ కూర్పు] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} అన్నిటినీ చూపించు]) <i>$2</i> న  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|మార్పుకు|మార్పులకు}}] సమీక్ష {{PLURAL:$3|అవసరం|అవసరం}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} చివరి నాణ్యతా కూర్పు] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} అన్నీ చూపించు]) <i>$2</i>న [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} అనుమతించారు]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|1 మార్పు|$3 మార్పుల}}]ను సమీక్షించాలి.',
	'revreview-noflagged' => "ఈ పేజీకి సమీక్షిత కూర్పులేమీ లేవు, కాబట్టి దీన్ని నాణ్యత కొరకు [[{{MediaWiki:Validationpage}}|సరిచూసి]] '''ఉండక'''పోవచ్చు.",
	'revreview-note' => 'ఈ కూర్పుని [[{{MediaWiki:Validationpage}}|సమీక్షిస్తూ]], [[User:$1|$1]] ఈ వ్యాఖ్యలు చేసారు:',
	'revreview-notes' => 'చూపించాల్సిన గమనికలు:',
	'revreview-oldrating' => 'రేటింగు:',
	'revreview-patrol' => 'ఈ మార్పును నిఘాలో ఉన్నట్లుగా గుర్తించు',
	'revreview-patrol-title' => 'పహారా చేయబడినట్టు గుర్తు పెట్టు',
	'revreview-patrolled' => 'మీరు ఎంచుకున్న [[:$1|$1]] యొక్క కూర్పు నిఘాలో ఉంది.',
	'revreview-quality' => 'ఇది చిట్టచివరి [[{{MediaWiki:Validationpage}}|నాణ్యమైన]] కూర్పు; <i>$2</i> న [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తుప్రతిని] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|మార్పు|మార్పులు}}] సమీక్ష కోసం {{PLURAL:$3|వేచి ఉంది|వేచి ఉన్నాయి}}.',
	'revreview-quality-same' => 'ఇది చిట్టచివరి [[{{MediaWiki:Validationpage}}|నాణ్యమైన]] కూర్పు, <i>$2</i> న [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ పేజీని [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు].',
	'revreview-quality-title' => 'నాణ్యత పేజి',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|గమనించిన పేజి]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తుప్రతిని చూపించు]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|గమనించిన పేజి]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తుప్రతిని చూపించు]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|గమనించిన పేజి]]'''",
	'revreview-quick-none' => "'''ప్రస్తుత''' (సమీక్షిత కూర్పులు లేవు)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|నాణ్యత పేజి]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తు ప్రతిని చూడండి]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|నాణ్యత పేజి]]''' (సమీక్షించని మార్పులు లేవు)",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|చిత్తు  ప్రతి]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} పేజీని చూడండి]] 
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} తేడాలు చూడు])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|చిత్తు  ప్రతి]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} పేజీని చూడండి]] 
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} తేడాలు చూడు])",
	'revreview-selected' => "'''$1''' యొక్క ఎంచుకున్న కూర్పు:",
	'revreview-source' => 'ప్రతి మూలం',
	'revreview-stable' => 'సుస్థిర పేజీ',
	'revreview-stable-title' => 'కంటపడిన వ్యాసం',
	'revreview-style' => 'పఠనీయత',
	'revreview-style-0' => 'అనామోదితం',
	'revreview-style-1' => 'ఆమోదయోగ్యం',
	'revreview-style-2' => 'మంచి',
	'revreview-style-3' => 'క్లుప్తం',
	'revreview-style-4' => 'విశేషనీయం',
	'revreview-submit' => 'దాఖలుచెయ్యి',
	'revreview-finished' => 'రివ్యూ పూర్తిఅయింది',
	'revreview-failed' => 'రివ్యూ తప్పింది',
	'revreview-text' => 'కొత్త కూర్పులు కాకుండా [[{{MediaWiki:Validationpage}}|సుస్థిర కూర్పులు ]]కనిపిస్తాయి.',
	'revreview-toggle-title' => 'వివరాలను చూపించు/దాచు',
	'revreview-toolow' => 'ఓ కూర్పును సమీక్షించినట్లుగా భావించాలంటే కింద ఇచ్చిన గుణాలన్నిటినీ "సమ్మతించలేదు" కంటే ఉన్నతంగా రేటు చెయ్యాలి.',
	'revreview-update' => "సుస్థిర కూర్పుని [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} అనుమతించిన] తర్వాత జరిగిన ''(క్రింద చూపించిన)'' మార్పులను [[{{MediaWiki:Validationpage}}|సమీక్షించండి]].

'''కొన్ని మూసలు/ఫైళ్లను  తాజాకరించారు:'''",
	'revreview-update-includes' => "'''కొన్ని మూసలు/ఫైళ్లను తాజాకరించారు:'''",
	'revreview-update-none' => "సుస్థిర కూర్పుని [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} అనుమతించిన] తర్వాత చేసిన ''(క్రింద చూపించిన)'' మార్పులను [[{{MediaWiki:Validationpage}}|సమీక్షించండి]].",
	'revreview-visibility' => "'''ఈ పేజీకి ఒక క్రొత్త [[{{MediaWiki:Validationpage}}|సుస్థిర కూర్పు]] ఉంది, దాని స్థిరత్వ సెట్టింగులను [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} మార్చవచ్చు].'''",
	'revreview-revnotfound' => 'మీరడిగిన పేజీ పాత కూర్పు దొరకలేదు. ఆ పేజీ కోసం మీరు వాడిన URLను సరిచూసుకోండి.',
	'right-autoreview' => 'కూర్పులను గమనించినట్లుగా ఆటోమాటిగ్గా గుర్తించు',
	'right-movestable' => 'స్థిరమైన పేజీలను తరలించు',
	'right-review' => 'కూర్పులను గమనించినట్లుగా గుర్తించు',
	'right-validate' => 'కూర్పులను ధృవీకరించినట్లుగా గుర్తించు',
	'rights-editor-autosum' => 'ఆటోమాటిగ్గా పదోన్నతి చెయ్యబడ్డారు',
	'rights-editor-revoke' => '[[$1]] నుండి ఎడిటర్ హోదా తొలగించారు',
	'stable-logentry' => '[[$1]]కి సుస్థిర కూర్పుని అమర్చారు',
	'stable-logentry2' => '[[$1]]కి సుస్థిర కూర్పుని పునర్నిర్ణయించండి',
	'stable-logpage' => 'సుస్థిర కూర్పుల లాగ్',
	'stable-logpagetext' => 'ఇది విషయపు పేజీల [[{{MediaWiki:Validationpage}}|సుస్థిర కూర్పు]] మార్పుల చిట్టా.
సుస్థిరమైన పేజీల యొక్క జాబితాని [[Special:StablePages|స్థిరమైన పేజీల జాబితా]] వద్ద చూడవచ్చు.',
	'revreview-filter-all' => 'అన్నీ',
	'revreview-filter-stable' => 'నిలకడ',
	'revreview-filter-approved' => 'అనుమతించబడినది',
	'revreview-filter-reapproved' => 'తిరిగి అనుతించబడినవి',
	'revreview-filter-unapproved' => 'అనుమతించబడనివి',
	'revreview-filter-auto' => 'ఆటోమాటిక్',
	'revreview-filter-manual' => 'మాన్యువల్',
	'revreview-statusfilter' => 'స్థితి మార్పు:',
	'revreview-typefilter' => 'రకం:',
	'revreview-levelfilter' => 'స్థాయి:',
	'revreview-lev-sighted' => 'కనబడినది',
	'revreview-lev-quality' => 'నాణ్యత',
	'revreview-reviewlink' => 'రివ్యూ',
	'tooltip-ca-current' => 'ఈ పేజీ యొక్క ప్రస్తుత ప్రతిని చూడండి',
	'tooltip-ca-stable' => 'ఈ పేజీ యొక్క సుస్థిర కూర్పుని చూడండి',
	'tooltip-ca-default' => 'నాణ్యతా భరోసా అమరికలు',
	'log-show-hide-review' => '$1 రివ్యూ లాగ్',
	'revreview-tt-review' => 'ఈ పేజీని సమీక్షించండి',
	'validationpage' => '{{ns:help}}:పేజీ సరిచూత',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'revreview-filter-all' => 'Hotu',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'editor' => 'Вироишгар',
	'flaggedrevs' => 'Нусхаҳои аломатдор',
	'flaggedrevs-desc' => 'Ба вироишгархо/мурукунандагон имкони таъйид кардани нусхаҳо ва пойдор сохтани саҳифаҳоро медиҳад',
	'group-editor' => 'Вироишгарон',
	'group-editor-member' => 'Вироишгар',
	'group-reviewer' => 'Мурургарон',
	'group-reviewer-member' => 'Мурургар',
	'grouppage-editor' => '{{ns:project}}:Вироишгар',
	'grouppage-reviewer' => '{{ns:project}}:Мурургар',
	'hist-quality' => 'нусхаи бокайфият',
	'hist-stable' => 'нусхаи баррасишуда',
	'review-diff2stable' => 'Нигаристани тағйирот байни нусхаҳои пойдор ва кунунӣ',
	'review-logentry-app' => '[[$1]]ро барраси кард',
	'review-logentry-dis' => 'Нусхаи аз [[$1]]ро камбаҳо кард',
	'review-logentry-id' => 'Нишонаи нусха $1',
	'review-logpage' => 'Гузориши барраси',
	'review-logpagetext' => 'Ин гузорише аз тағйирот ба вазъияти [[{{MediaWiki:Validationpage}}|таъйиди]] нусхаҳо барои мӯҳтавои саҳифаҳо аст.
Барои феҳристи саҳифаҳои баррасишуда нигаред ба [[Special:ReviewedPages|феҳристи саҳифаҳои баррасишуда]].',
	'reviewer' => 'Мурургар',
	'revisionreview' => 'Нусхаҳои баррасӣ',
	'revreview-accuracy' => 'Дақиқ',
	'revreview-accuracy-0' => 'Муттавасит',
	'revreview-accuracy-1' => 'Баррасишуда',
	'revreview-accuracy-2' => 'Дақиқ',
	'revreview-accuracy-3' => 'Дорои манобеъи хуб',
	'revreview-accuracy-4' => 'Баргузида',
	'revreview-auto' => '(худкор)',
	'revreview-auto-w' => "Шумо дар ҳоли вироиши нусхаи пойдор ҳастед ва тағйироти шумо ба таври '''худкор баррасӣ хоҳанд шуд'''.",
	'revreview-auto-w-old' => "Шумо дар ҳоли вироиши як нусхаи баррасӣ шуда ҳастед; тағйирот ба таври '''худкор баррасӣ хоҳанд шуд'''.",
	'revreview-basic' => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|баррасишуда]]  аст, ки дар <i>$2</i> [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Пешнавис] қобили '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} вироиш аст]'''; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ  {{PLURAL:$3|аст|ҳастанд}}.",
	'revreview-basic-same' => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|баррасишуда]] аст, ки дар <i>$2</i>  ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} феҳристи комил]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. Ин саҳифа қобили  '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} тағйир]''' аст.",
	'revreview-changed' => "'''Амали дархостшударо наметавон рӯи ин нусхае аз [[:$1|$1]] анҷом дод.'''

Як шаблон ё акс шояд дархост шуда бошад, вақте ки ягон нусхаи хосе мушаххас нашудааст. Ин иттифоқ метавонад замоне рух диҳад, ки як шаблони пӯё, шаблон ё аксеро шомил шавад, ки ба мутағири бастагӣ дорад ва аз замоне, ки шумо саҳифаро тағйир додаед, тағйир кардааст.
Боргузории дубора ва баррасии дубора мушкилро метавонад бартараф кунад.",
	'revreview-current' => 'Пешнавис',
	'revreview-depth' => 'Умқ',
	'revreview-depth-0' => 'Таъйиднашуда',
	'revreview-depth-1' => 'Муқаддамотӣ',
	'revreview-depth-2' => 'Миёна',
	'revreview-depth-3' => 'Баланд',
	'revreview-depth-4' => 'Баргузида',
	'revreview-edit' => 'Вироиши пешнавис',
	'revreview-flag' => 'Ин нусхаро барраси кунед',
	'revreview-edited' => "'''Вироишҳои нав пас аз назар гузаронидани онҳо аз тарафи корбаре ба [[{{MediaWiki:Validationpage}}|нусхаи пойдор]] илова хоҳанд шуд. Дар зер ''пешнавис'' оварда шудааст. ''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|тағйир|тағйирот}}] баррасиро интизор аст.",
	'revreview-legend' => 'Баҳо додан ба мӯҳтавои баррасишуда',
	'revreview-log' => 'Тавзеҳ:',
	'revreview-main' => 'Шумо бояд як нусхаи хосро аз саҳифаи мӯҳтаво барои баррасӣ кардан, интихоб кунед.

Барои дарёфт кардани саҳифаҳои баррасинашуда ба [[Special:Unreviewedpages]] нигаред.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Охирин нусхаи баррасишуда] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} феҳристи комил]) дар  <i>$2</i>  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ {{PLURAL:$3|аст|ҳастанд}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Охирин нусхаи бокайфият] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} феҳристи комил]) дар  <i>$2</i>  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ {{PLURAL:$3|аст|ҳастанд}}.',
	'revreview-noflagged' => 'Нусхаи муруршудае аз ин саҳифа вуҷуд надорад, ба ин далел, ки ин саҳифа аз назари кайфият ва сифат баррасӣ [[{{MediaWiki:Validationpage}}|нашудааст]].',
	'revreview-note' => '[[User:$1|$1]] ин тавзеҳотро зимни [[{{MediaWiki:Validationpage}}|баррасии]] нусха, сабт кард:',
	'revreview-notes' => 'Мушоҳидот ё мулоҳизот:',
	'revreview-oldrating' => 'Дараҷаи дода шуда:',
	'revreview-patrol' => 'Аломат задании ин тағйир ба унвони баррасишуда',
	'revreview-patrolled' => 'Нусхаи интихобшуда аз [[:$1|$1]] ба унвони баррасишуда аломат хӯрдааст.',
	'revreview-quality' => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|бокайфият]] аст, ки дар <i>$2</i>  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Пешнавис] қобили '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} вироиш аст]'''; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ  {{PLURAL:$3|аст|ҳастанд}}.",
	'revreview-quality-same' => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|бокайфият]] аст, ки дар  <i>$2</i> ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} феҳристи комил]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. Ин саҳифа қобили  '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} тағйир]''' аст.",
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Баррасишуда]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ниг. пешнавис]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Баррасишуда]]''' (фақат тағйироти баррасишуда)",
	'revreview-quick-invalid' => "'''Нишонаи номӯътабари нусха'''",
	'revreview-quick-none' => "Нусхаҳои вуруднашудаи '''Феълӣ'''' (на нусхаҳои муруршуда)",
	'revreview-quick-quality' => "[[{{MediaWiki:Validationpage}}|Мақолаи босифат]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ниг. пешнавис]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Сифат]]''' (фақат тағйироти баррасишуда)",
	'revreview-quick-see-basic' => "'''Феълӣ''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} мушоҳидаи нусхаи пойдор]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|тағйир|тағйирот}}])",
	'revreview-quick-see-quality' => "'''Феълӣ''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} мушоҳидаи нусхаи пойдор]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|тағйир|тағйирот}}])",
	'revreview-selected' => "Нусхаи интихобшуда аз '''$1:'''",
	'revreview-source' => 'манбаъи пешнавис',
	'revreview-stable' => 'Пойдор',
	'revreview-style' => 'Хоноӣ',
	'revreview-style-0' => 'Таъйиднашуда',
	'revreview-style-1' => 'Қобили қабул',
	'revreview-style-2' => 'Хуб',
	'revreview-style-3' => 'Мухтасар',
	'revreview-style-4' => 'Баргузида',
	'revreview-submit' => 'Сабти баррасӣ',
	'revreview-text' => 'Нусхаҳои пойдор (ва на охирин нусхаи) ҳар саҳифа ба унвони пешфарзи мӯҳтавои саҳифа танзим шуд.',
	'revreview-toolow' => 'Шумо бояд ҳар як аз мавориди зеринро ба дараҷаи беш аз  "таъйиднашуда" аломат бизанед, то он нусха баррасишуда ба ҳисоб равад. Барои бебаҳо кардани як нусха, тамоми маворидро "таъйиднашуда" аломат бизанед.',
	'revreview-update' => "Лутфан тамоми тағйироте (дар зер оварда шудааст), ки пас аз охирин нусхаи пойдор амалӣ шударо  [[{{MediaWiki:Validationpage}}|барраси кунед]], ки аз замоне, ки нусхаи пойдор  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} таъйидшуда] буд.

'''Бархе аз шаблонҳо/аксҳо барӯз шудаанд:'''",
	'revreview-update-none' => 'Лутфан тамоми тағйироте (дар зер оварда шудааст), ки пас аз охирин нусхаи пойдор амалӣ шударо  [[{{MediaWiki:Validationpage}}|барраси кунед]], ки аз замоне, ки нусхаи пойдор  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} таъйидшуда] буд.',
	'revreview-visibility' => "'''Ин саҳифа дорои як  [[{{MediaWiki:Validationpage}}|нусхаи пойдор]] аст, танзимот барои он метавонад   [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} пайкарбандӣ] шавад.'''",
	'revreview-revnotfound' => 'Нусхаи кӯҳнаи саҳифае, ки дархоста будед, ёфт нашуд. Лутфан нишонаи URL-ро, ки аз он ба ин саҳифа дастрасӣ карда будед, барассӣ кунед.',
	'rights-editor-autosum' => 'Ба таври худкор пешбарӣ шудан',
	'rights-editor-revoke' => 'Ихтиёроти виростор аз [[$1]] гирифта шуд',
	'stable-logentry' => 'пойдоркунии нусха барои [[$1]]ро танзим кард',
	'stable-logentry2' => 'пойдоркунии нусха барои [[$1]]ро аз нав кард',
	'stable-logpage' => 'Гузориши нусхаи пойдор',
	'stable-logpagetext' => 'Ин гузориши тағйирот аз танзимоти саҳифаҳои мӯҳтавои [[{{MediaWiki:Validationpage}}|нусхаҳои пойдор]] аст.',
	'tooltip-ca-current' => 'Мушоҳидаи пешнависи феълии ин саҳифа',
	'tooltip-ca-stable' => 'Мушоҳидаи нусхаи пойдори ин саҳифа',
	'tooltip-ca-default' => 'Танзимоти итминони кайфият',
	'validationpage' => '{{ns:help}}:Таъйиди эътибори мақолаҳо',
);

/** Thai (ไทย)
 * @author Octahedron80
 * @author Passawuth
 */
$messages['th'] = array(
	'editor' => 'ผู้้แก้ไข',
	'group-editor-member' => 'ผู้แก้ไข',
	'revreview-auto' => '(อัตโนมัติ)',
	'revreview-revnotfound' => 'ไม่พบรุ่นการปรับปรุงรุ่นเก่าที่ต้องการ กรุณาตรวจสอบยูอาร์แอลที่ใช้เข้ามายังหน้านี้',
	'revreview-filter-all' => 'ทั้งหมด',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'editor' => 'Patnugot',
	'flaggedrevs' => 'Naibandilang (natatakang) mga pagbabago',
	'flaggedrevs-backlog' => "Pangkasalukuyang may mga naiwan pa sa [[Special:OldReviewedPages|naghihintay na mga pamamatnugot]] sa nasuri nang mga pahina. '''Kailangan ang pagpansin mo!'''",
	'flaggedrevs-watched-pending' => "Pangkasalukuyang may [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} mga naghihintay na pamamatnugot] sa nasuring nang mga pahina ng iyong talaan ng binabantayan. '''Kailangan ang pagpansin mo!'''.",
	'flaggedrevs-desc' => 'Nagbibigay sa mga patnugot at mga tagapagsuri ng kakayahang mapatunayan ang mga pagbabago at mabigyan ng katatagan ang mga pahina',
	'flaggedrevs-pref-UI-0' => 'Gamitin ang detalyadong matatag na bersyon ng ugnayang panghangganan na pangtagagamit',
	'flaggedrevs-pref-UI-1' => 'Gamitin ang payak na matatag na bersyon ng ugnayang-panghangganan na pangtagagamit',
	'flaggedrevs-prefs-stable' => 'Ipakita palagi ang matatag na bersyon ng mga pahina ng nilalaman ayon sa likas na pagkakatakda (kung mayroon)',
	'flaggedrevs-prefs-watch' => 'Idagdag ang mga pahinang nasuri ko na sa aking talaan ng mga binabantayan',
	'group-editor' => 'Mga patnugot',
	'group-editor-member' => 'patnugot',
	'group-reviewer' => 'Mga tagapagsuri',
	'group-reviewer-member' => 'tagapagsuri',
	'grouppage-editor' => '{{ns:project}}:Patnugot',
	'grouppage-reviewer' => '{{ns:project}}:Tagapagsuri',
	'group-autoreview' => 'Mga kusang-tagapagsuri',
	'group-autoreview-member' => 'Kusang-tagapagsuri',
	'grouppage-autoreview' => '{{ns:project}}:Kusang-tagapagsuri',
	'hist-draft' => 'balangkas ng pagbabago',
	'hist-quality' => 'katangiang pangkagalingan ng pagbabago',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} pinatunayan] ni [[User:$3|$3]]',
	'hist-stable' => 'namataang pagbabago',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} namataan na] ni [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} kusang namataan]',
	'review-diff2stable' => 'Tingnan ang mga pagbabago sa pagitan ng matatag at pangkasalukuyang mga pagbabago',
	'review-logentry-app' => 'nasuri na ang r$2 ng [[$1]]',
	'review-logentry-dis' => 'bumaba ang halaga/katuturan ng r$2 ng [[$1]]',
	'review-logentry-id' => 'tingnan',
	'review-logentry-diff' => 'pagkakaiba sa may katatagan',
	'review-logpage' => 'Talaan ng pagsusuri',
	'review-logpagetext' => 'Isa itong talaan ng mga pagbabago sa kalagayan ng [[{{MediaWiki:Validationpage}}|pagpayag]] sa mga pahina ng nilalaman ng mga pagbabago.
Tingnan ang [[Special:ReviewedPages|talaan ng nasuring mga pahina]] para sa isang talaan ng mga pahinang pinayagan.',
	'reviewer' => 'Tagapagsuri',
	'revisionreview' => 'Suriing muli ang mga pagbabago',
	'revreview-accuracy' => 'Katumpakan',
	'revreview-accuracy-0' => 'Hindi pinayagan',
	'revreview-accuracy-1' => 'Namataan',
	'revreview-accuracy-2' => 'Tumpak',
	'revreview-accuracy-3' => 'Sapat at tumpak ang mga pinagmulan',
	'revreview-accuracy-4' => 'Naitampok (naitangi)',
	'revreview-approved' => 'Pinayagan',
	'revreview-auto' => '(awtomatiko/kusa)',
	'revreview-auto-w' => "Binabago ang matatag na bersyon; '''kusa/awtomatikong susuriin muli''' ang mga pagbabago.",
	'revreview-auto-w-old' => "Binabago ang isang pagbabagong nasuri nang muli; '''kusa/awtomatikong susuriing muli''' ang mga pagbabago.",
	'revreview-basic' => 'Ito ang pinakahuling [[{{MediaWiki:Validationpage}}|namataang]] pagbabago, 
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} balangkas] ay may [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|pagbabagong|mga pagbabagong}}] naghihintay ng muling pagsusuri.',
	'revreview-basic-i' => 'Ito ang pinakahuling [[{{MediaWiki:Validationpage}}|namataang]] pagbabago, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} balangkas] ay may [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mga pagbabago sa suleras/larawan] na naghihintay ng muling pagsusuri.',
	'revreview-basic-old' => 'Isa itong [[{{MediaWiki:Validationpage}}|namataang]] pagbabago ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} itala ang lahat]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Maaaring may nagawang [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mga pagbabago].',
	'revreview-basic-same' => 'Ito ang pinakahuling [[{{MediaWiki:Validationpage}}|namataang]] pagbabago ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} itala ang lahat]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.',
	'revreview-basic-source' => 'Isang [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} namataang pagbabago] ng pahinang ito, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>, na ibinatay mula sa pagbabagong ito.',
	'revreview-blocked' => 'Hindi mo masusuri ang pagbabagong ito sapagkat kasalukuyang hinahadlangan ang akawnt mo ([$1 mga detalye])',
	'revreview-changed' => "'''Hindi maisagawa sa pagbabagong ito ng [[:$1|$1]] ang hiniling na galaw.'''

Maaaring hiniling ang isang suleras o larawan na hindi natukoy ang partikular na bersyon.
Maaaring mangyari ito kung may isang masigla/aktibong suleras na naglilipat-sama sa iba pang larawan o suleras ayon sa isang nagbabagong halaga/bagay na nagbago na magmula noong simulan mong suriing muli ang pahinang ito.
Maaaring malutas ang suliraning ito sa pamamagitan ng pagsariwa sa pahina at isa pang dagdag na pagsusuring muli.",
	'revreview-current' => 'Balangkas (burador)',
	'revreview-depth' => 'Lalim',
	'revreview-depth-0' => 'Hindi pinayagan',
	'revreview-depth-1' => 'Payak',
	'revreview-depth-2' => 'Katamtaman',
	'revreview-depth-3' => 'Mataas',
	'revreview-depth-4' => 'Naitampok (naitangi)',
	'revreview-draft-title' => 'Pahina ng balangkas',
	'revreview-edit' => 'Baguhin ang balangkas',
	'revreview-editnotice' => "'''Ang mga pagbabago sa pahinang ito ay isasama sa loob ng [[{{MediaWiki:Validationpage}}|matatag na bersyon]] kapag nasuri na ang mga ito ng isang may pahintulot na tagagamit.'''",
	'revreview-flag' => 'Suriing muli ang pagbabagong ito',
	'revreview-edited' => "'''Isasama ang mga pagbabago sa loob ng [[{{MediaWiki:Validationpage}}|matatag na bersyon]] kapag nasuri na ang mga ito ng isang may pahintulot na tagagamit.'''
'''Ipinapakita sa ibaba ang ''balangkas''.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|pagbabagong naghihintay|mga pagbabagong naghihintay}}] ng muling pagsusuri.",
	'revreview-invalid' => "'''Hindi tanggap na puntirya:''' walang [[{{MediaWiki:Validationpage}}|muling nasuring]] pagbabagong tumutugma sa ibinigay na ID.",
	'revreview-legend' => 'Bigyan ng halaga/kaantasan ang nilalaman ng pagbabago',
	'revreview-log' => 'Kumento/puna:',
	'revreview-main' => 'Dapat kang pumili ng isang partikular na pagbabago mula sa isang pahinan ng nilalaman upang makapagsuri.

Tingnan ang [[Special:Unreviewedpages|talaan ng mga pahina hindi pa nasusuring muli]].',
	'revreview-newest-basic' => 'Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} pinakahuling namataang pagbabago] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} itala ang lahat]) ay [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|pagbabagong|mga pagbabagong}}] {{PLURAL:$3|kailangan|kailangan}} ng muling pagsusuri.',
	'revreview-newest-basic-i' => 'Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} pinakahuling namataang pagbabago] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} itala ang lahat]) ay [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mga pagbabago sa suleras/larawan] nangangailangan ng muling pagsusuri.',
	'revreview-newest-quality' => 'Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} pinakahuling pagbabagong may mataas na uri (kalidad)] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} itala ang lahat]) ay [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|pagbabago|mga pagbabago}}] {{PLURAL:$3|nangangailangan|nangangailangan}} ng muling pagsusuri.',
	'revreview-newest-quality-i' => 'Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} pinakahuling pagbabagong may mataas na uri (kalidad)] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} itala ang lahat]) ay [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mga pagbabago sa suleras/larawang] nangangailangan ng muling pagsusuri.',
	'revreview-noflagged' => "Walang muling nasuring pagbabago para sa pahinang ito, kaya maaaring '''hindi''' pa ito 
[[{{MediaWiki:Validationpage}}|nasuri]] para sa kaantasan ng uri (kalidad).",
	'revreview-note' => 'Gumawa (naglagay) si [[User:$1|$1]] ng sumusunod na mga pagtatala hinggil sa [[{{MediaWiki:Validationpage}}|muling pagsuri]] ng pagbabagong ito:',
	'revreview-notes' => 'Mga puna o mga talang ipapakita (palilitawin):',
	'revreview-oldrating' => 'Binigyan ito ng antas/halagang:',
	'revreview-patrol' => 'Tatakan ang pagbabagong ito bilang napatrolya na',
	'revreview-patrol-title' => 'Tatakan bilang napagtrolya na',
	'revreview-patrolled' => 'Ang napiling pagbabago ng [[:$1|$1]] ay natatakan bilang napatrolya na.',
	'revreview-quality' => 'Ito ang pinakahuling [[{{MediaWiki:Validationpage}}|may mataas na uri (kalidad)]] na pagbabago, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} balangkas] ay may [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|pagbabagong|mga pagbabagong}}] naghihintay ng muling pagsusuri',
	'revreview-quality-i' => 'It ang pinakahuling [[{{MediaWiki:Validationpage}}|may mataas na uring]] pagbabago, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} balangkas] ay mayroong [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mga pagbabago sa suleras/larawan] na naghihintay ng pagsusuri.',
	'revreview-quality-old' => 'Isa itong may [[{{MediaWiki:Validationpage}}|mataas na uri]] ng pagbabago ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} itala ang lahat]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Maaaring may bagong [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mga pagbabagong] nagawa na.',
	'revreview-quality-same' => 'Ito ang pinakahuling [[{{MediaWiki:Validationpage}}|may mataas na uri]] ng pagbabago ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} itala ang lahat]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.',
	'revreview-quality-source' => 'Isang [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bersyong may mataas na uri] ng pahinang ito, na [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>, ay ibinatay mula sa pagbabagong ito.',
	'revreview-quality-title' => 'Pahinang may mataas na uri',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Namataang pahina]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tingnan ang balangkas]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Namataang pahina]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tingnan ang pahina]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Namataang pahina]]'''",
	'revreview-quick-invalid' => "'''Hindi tanggap na ID na pagbabago'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Pangkasalukuyang pagbabago]]''' (hindi pa nasusuri)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pahinang may mataas na uri (kalidad)]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tingnan ang balangkas]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pahinang may mataas na uri]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tingnan ang balangkas]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pahinang may mataas na uri]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Balangkas/Burador]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} tingnan ang pahina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} paghambingin])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Balangkas/Burador]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} tingnan ang pahina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} paghambingin])",
	'revreview-selected' => "Napiling pagbabago ng '''$1:'''",
	'revreview-source' => 'pinagmulan ng balangkas',
	'revreview-stable' => 'Matatag na pahina',
	'revreview-stable-title' => 'Namataang pahina',
	'revreview-stable1' => 'Maaaring naisin mong tingnan ang [{{fullurl:$1|stableid=$2}} ibinandilang bersyong ito] at tingnan kung ito na ngayon ang [{{fullurl:$1|stable=1}} matatag na bersyon] ng pahinang ito.',
	'revreview-stable2' => 'Maaaring naisin mong tingnan ang [{{fullurl:$1|stable=1}} matatag na bersyon] ng pahinang ito (kung may natitira pang isa).',
	'revreview-style' => 'Kaantasan ng pagkanababasa',
	'revreview-style-0' => 'Hindi pinayagan',
	'revreview-style-1' => 'Katanggap-tanggap',
	'revreview-style-2' => 'Mabuti',
	'revreview-style-3' => 'Hindi paliguy-ligoy (nasa punto)',
	'revreview-style-4' => 'Itinampok (itinangi)',
	'revreview-submit' => 'Ipasa',
	'revreview-submitting' => 'Ipinapasa...',
	'revreview-finished' => 'Ganap na ang pagsusuri!',
	'revreview-successful' => "'''Matagumpay na ang pagbabandila (pagtatatak) sa pagbabago ng [[:$1|$1]]. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} tingnan ang matatatag na mga bersyon])'''",
	'revreview-successful2' => "'''Matagumpay ang pagtatanggal ng bandila (pagaalis ng tatak) sa pagbabago ng [[:$1|$1]].'''",
	'revreview-text' => "''Ang [[{{MediaWiki:Validationpage}}|matatatag na mga bersyon]] ay ang likas na nakatakdang mga pahina ng nilalaman para sa mga tumatanaw sa halip na ang pinakabagong pagbabago.''",
	'revreview-text2' => "''Ang [[{{MediaWiki:Validationpage}}|matatatag na mga bersyon]] ay nasuring mga pagbabago ng mga pahina at maaaring itakda bilang likas na nakatakdang nilalaman para sa mga tumatanaw.''",
	'revreview-toggle' => '(+/-)',
	'revreview-toggle-title' => 'ipakita/itago ang mga detalye',
	'revreview-toolow' => 'Dapat mong bigyan ng antas ang bawat isang katangiang nasa ibaba na mas mataas kaysa "hindi pinayagan" upang maisaalang-alang na masuring muli ang pagbabago.
Upang mapababa ang halaga (antas) isang pagbabago, itakda ang lahat ng mga kahanayan bilang "hindi pinayagan".',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Pakisuri]] ang anumang mga pagbabagong ''(ipinapakita sa ibaba)'' ginawa magmula noong [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] ang matatag na pagbabago.<br />
'''Naisapanahon na ang ilang mga suleras/larawan:'''",
	'revreview-update-includes' => "'''Naisapanahon na ang ilang mga suleras/larawan:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Pakisuri]] ang anumang mga pagbabagong ''(ipinapakita sa ibaba)'' ginawa magmula noong [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} pinayagan] ang pagbabagong pangtabla.",
	'revreview-update-use' => "'''PAUNAWA:''' Kapag mayroong isang matatag na bersyon na ang anuman sa mga suleras/mga larawang ito, ginagamit na ito samakatuwid sa isang matatag na bersyon ng pahinang ito.",
	'revreview-diffonly' => "''Para suriing muli ang pahina, pindutin ang kawing sa pagbabagong \"pangkasalukuyang pagbabago\" at gamitin ang pormularyong pampagsusuri.''",
	'revreview-visibility' => "'''Ang pahinang ito ay may isang naisapanahon nang [[{{MediaWiki:Validationpage}}|matatag na bersyon]]; [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} maisasaayos] ang mga pagtatakdang pangkatatagan ng pahina.'''",
	'revreview-visibility2' => "'''Ang pahinang ito ay may hindi pa naisasapanahong [[{{MediaWiki:Validationpage}}|matatag na bersyon]]; 
ang mga katakdaang pangkatatagan ng pahina ay maaaring [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} iayos].'''",
	'revreview-visibility3' => "'''Ang pahinang ito ay walang [[{{MediaWiki:Validationpage}}|matatag na bersyon]]; 
ang mga katakdaang pangkatatagan ng pahina ay maaaring [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} ayusin].'''",
	'revreview-revnotfound' => 'Hindi matagpuan ang hinihingi mong lumang pagbabago ng pahina.
Pakisuri ang URL na ginamit para mapuntahan ang pahinang ito.',
	'right-autoreview' => 'Kusang tatakan ang mga pagbabago bilang namataan na',
	'right-movestable' => 'Ilipat ang matatatag na mga pahina',
	'right-review' => 'Tatakan ang mga pagbabago bilang namataan na',
	'right-stablesettings' => 'Iayos kung paanong pipiliin at palilitawin (ipapakita) ang matatag na bersyon',
	'right-validate' => 'Tatakan ang mga pagbabago bilang napatunayan na',
	'rights-editor-autosum' => 'itinaas ng kusa ang antas',
	'rights-editor-revoke' => 'tinanggal ang kalagayan ng patnugot mula sa [[$1]]',
	'specialpages-group-quality' => 'Paniniyak sa kataasan ng uri (kalidad)',
	'stable-logentry' => 'may pagsasaayos na pagbibigay ng matatag na anyo ng bersyon para sa [[$1]]',
	'stable-logentry2' => 'muling itakda ang pagbibigay ng matatag na anyo ng bersyon para sa [[$1]]',
	'stable-logpage' => 'Talaan ng katatagan',
	'stable-logpagetext' => 'Isa itong talaan ng mga pagbabago sa pagkakaayos ng [[{{MediaWiki:Validationpage}}|matatag na bersyon]] ng mga pahina ng nilalaman.
Matatagpuan ang isang talaan ng napatatag na mga pahina mula sa [[Special:StablePages|talaan ng matatag na pahina]].',
	'revreview-filter-all' => 'Lahat',
	'revreview-filter-stable' => 'matatag',
	'revreview-filter-approved' => 'Pinayagan',
	'revreview-filter-reapproved' => 'Muling pinayagan',
	'revreview-filter-unapproved' => 'Hindi pinayagan',
	'revreview-filter-auto' => 'Kusa (awtomatiko)',
	'revreview-filter-manual' => 'Kinakamay (manwal)',
	'revreview-statusfilter' => 'Pagbabago sa kalagayan:',
	'revreview-typefilter' => 'Uri (tipo):',
	'revreview-levelfilter' => 'Antas:',
	'revreview-lev-sighted' => 'namataan na',
	'revreview-lev-quality' => 'antas ng uri',
	'revreview-lev-pristine' => 'dalisay',
	'revreview-reviewlink' => 'suriing muli',
	'tooltip-ca-current' => 'Tingnan ang pangkasalukuyang balangkas ng pahinang ito',
	'tooltip-ca-stable' => 'Tingnan ang matatag na bersyon ng pahinang ito',
	'tooltip-ca-default' => 'Katakdaan ng pagtitiyak ng pagkakaroon ng mataas na uri (kalidad)',
	'revreview-locked-title' => 'Dapat na sinusuri munang muli ang mga pagbabago bago palitawin sa pahinang ito!',
	'revreview-unlocked-title' => 'Hindi nangangailangan ng muling pagsusuri ang mga pagbabago bago palitawin sa pahinang ito!',
	'revreview-locked' => 'Dapat na sinusuri munang muli ang mga pagbabago bago palitawin sa pahinang ito!',
	'revreview-unlocked' => 'Hindi nangangailangan ng muling pagsusuri ang mga pagbabago bago palitawin sa pahinang ito!',
	'log-show-hide-review' => '$1 pagtatala ng pagsusuri',
	'revreview-tt-review' => 'Suriing muli ang pahinang ito',
	'validationpage' => '{{ns:help}}:Pagpapatunay ng pahina',
);

/** Turkish (Türkçe)
 * @author Erkan Yilmaz
 * @author Joseph
 * @author Karduelis
 * @author Mach
 * @author Runningfridgesrule
 * @author Srhat
 */
$messages['tr'] = array(
	'editor' => 'Editör',
	'flaggedrevs' => 'İşaretli Değişiklikler',
	'flaggedrevs-backlog' => "Şu anda, gözden geçirilmiş sayfalarda birikmiş [[Special:OldReviewedPages|bekleyen değişiklikler]] iş yükü var. '''İlginiz gerekiyor!'''",
	'flaggedrevs-watched-pending' => "Şu anda izleme listenizdeki gözden geçirilmiş sayfaların [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} bekleyen değişiklikleri] var. '''İlginiz gerekiyor!'''",
	'flaggedrevs-desc' => 'Editörlere ve gözden geçirenlere, değişiklikleri doğrulama ve sayfaları kararlı hale getirme yeteneği verir',
	'flaggedrevs-pref-UI' => 'Kararlı sürüm arayüzü:',
	'flaggedrevs-pref-UI-0' => 'Kararlı sürüm detaylı kullanıcı arayüzünü kullan',
	'flaggedrevs-pref-UI-1' => 'Kararlı sürüm basit kullanıcı arayüzünü kullan',
	'prefs-flaggedrevs' => 'Kararlılık',
	'flaggedrevs-prefs-stable' => 'Her zaman varsayılan olarak içerik sayfalarının kararlı sürümünü göster (eğer varsa)',
	'flaggedrevs-prefs-watch' => 'İncelediğim sayfaları izleme listeme ekle',
	'group-editor' => 'Editörler',
	'group-editor-member' => 'editör',
	'group-reviewer' => 'Eleştirmenler',
	'group-reviewer-member' => 'eleştirmen',
	'grouppage-editor' => '{{ns:project}}:Editör',
	'grouppage-reviewer' => '{{ns:project}}:Eleştirmen',
	'group-autoreview' => 'Oto-gözden geçiriciler',
	'group-autoreview-member' => 'oto-gözden geçirici',
	'grouppage-autoreview' => '{{ns:project}}:Oto-gözden geçirici',
	'hist-draft' => 'taslak revizyonu',
	'hist-quality' => 'kalite revizyon',
	'hist-quality-user' => '[[User:$3|$3]] tarafından [{{fullurl:$1|stableid=$2}} doğrulandı]',
	'hist-stable' => 'gözlenmiş revizyon',
	'hist-stable-user' => '[[User:$3|$3]] tarafından [{{fullurl:$1|stableid=$2}} gözlendi]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} otomatik olarak gözlenmiş]',
	'review-diff2stable' => 'Kararlı ve güncel revizyonlar arasındaki değişiklikleri göster',
	'review-logentry-app' => '[[$1]] için r$2 gözden geçirildi',
	'review-logentry-dis' => '[[$1]] için r$2 yıprandı',
	'review-logentry-id' => 'görüntüle',
	'review-logentry-diff' => 'kararlı ile fark',
	'review-logpage' => 'Günlüğü gözden geçir',
	'review-logpagetext' => 'Bu, içerik sayfası revizyonlarının [[{{MediaWiki:Validationpage}}|kabul]] durumu değişiklikleri günlüğüdür.
Kabul edilmiş sayfalar için [[Special:ReviewedPages|gözden geçirilmiş sayfalar listesi]]ne bakın.',
	'reviewer' => 'Eleştirmen',
	'revisionreview' => 'Revizyonları gözden geçir',
	'revreview-accuracy' => 'Doğruluk',
	'revreview-accuracy-0' => 'Onaylanmamış',
	'revreview-accuracy-1' => 'Gözlenmiş',
	'revreview-accuracy-2' => 'Doğru',
	'revreview-accuracy-3' => 'Yeterince kaynak verildi',
	'revreview-accuracy-4' => 'Özellikli',
	'revreview-approved' => 'Onaylı',
	'revreview-auto' => '(otomatik)',
	'revreview-auto-w' => "Kararlı revizyonu değiştiriyorsunuz; değişiklikler '''otomatik olarak gözden geçirilmiş olacaktır'''.",
	'revreview-auto-w-old' => "Gözden geçirilmiş revizyonu değiştiriyorsunuz; değişiklikler '''otomatik olarak gözden geçirilmiş olacaktır'''.",
	'revreview-basic' => 'Bu en son [[{{MediaWiki:Validationpage}}|gözlenmiş]] revizyondur, <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Taslağın] gözden geçirilmeyi bekleyen [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|değişikliği|değişikliği}}] bulunmaktadır.',
	'revreview-basic-i' => 'Bu en son [[{{MediaWiki:Validationpage}}|gözlenmiş]] revizyondur, <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Taslağın] gözden geçirilmeyi bekleyen [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} şablon/dosya değişikliği] bulunmaktadır.',
	'revreview-basic-old' => 'Bu bir [[{{MediaWiki:Validationpage}}|gözlenmiş]] revizyondur ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hepsini listele]), <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].
Yeni [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} değişiklikler] yapılmış olabilir.',
	'revreview-basic-same' => 'Bu en son [[{{MediaWiki:Validationpage}}|gözlenmiş]] revizyondur ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hepsini listele]), <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].',
	'revreview-basic-source' => 'Bu sayfanın [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} gözlenmiş bir sürümü], <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmış], bu revizyondan baz alınmıştır.',
	'revreview-blocked' => 'Bu revizyonu gözden geçiremezsiniz çünkü hesabınız engellenmiş ([$1 ayrıntılar])',
	'revreview-changed' => "'''İstenen işlem [[:$1|$1]] sayfasının bu revizyonunda uygulanamıyor.'''

Belirli sürüm belirlenmeden, bir şablon veya dosya istenmiş olabilir.
Bunun sebebi, dinamik bir şablonun, sizin gözden geçirmeye başlamanızdan sonra değişen bir değişkene bağımlı başka bir dosya veya şablonu çapraz olarak içermesi olabilir.
Sayfayı yenilemek ve yeniden gözden geçirmek sorunu çözebilir.",
	'revreview-current' => 'Taslak',
	'revreview-depth' => 'Derinlik',
	'revreview-depth-0' => 'Onaylanmamış',
	'revreview-depth-1' => 'Basit',
	'revreview-depth-2' => 'Orta',
	'revreview-depth-3' => 'Yüksek',
	'revreview-depth-4' => 'Özellikli',
	'revreview-draft-title' => 'Taslak sayfası',
	'revreview-edit' => 'Taslağı değiştir',
	'revreview-editnotice' => "'''Bu sayfaya yapılan değişiklikler, yetkili bir kullanıcı gözden geçirdikten sonra [[{{MediaWiki:Validationpage}}|kararlı sürüme]] dahil edilecektir.'''",
	'revreview-flag' => 'Bu revizyonu gözden geçir',
	'revreview-edited' => "'''Bu sayfaya yapılan değişiklikler, yetkili bir kullanıcı gözden geçirdikten sonra [[{{MediaWiki:Validationpage}}|kararlı sürüme]] dahil edilecektir.'''
'''''Taslak'' aşağıdadır'''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|değişiklik|değişiklik}}] gözden geçirilmeyi beklemektedir.",
	'revreview-invalid' => "'''Geçersiz hedef:''' hiçbir [[{{MediaWiki:Validationpage}}|gözden geçirilmiş]] revizyon verilen ID'ye uymuyor.",
	'revreview-legend' => 'Revizyon içeriğini oyla',
	'revreview-log' => 'Açıklama:',
	'revreview-main' => 'Gözden geçirmek için, içerik sayfasından belirli bir revizyon seçmelisiniz.

[[Special:Unreviewedpages|Gözden geçirilmemiş sayfalar listesine]] göz atın.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} En son gözlenmiş revizyon] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hepsini listele]) <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmış].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|değişikliğin|değişikliğin}}] gözden geçirilmesi {{PLURAL:$3|gerekiyor|gerekiyor}}.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} En son gözlenmiş revizyon] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hepsini listele]) <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmış].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Şablon/dosya değişikliğinin] gözden geçirilmesi gerekiyor.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} En son kaliteli revizyon] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hepsini listele]) <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmış].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|değişikliğin|değişikliğin}}] gözden geçirilmesi {{PLURAL:$3|gerekiyor|gerekiyor}}.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} En son kaliteli revizyon] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hepsini listele]) <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmış].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Şablon/dosya değişikliğinin] gözden geçirilmesi gerekiyor.',
	'revreview-noflagged' => "Bu sayfada hiç gözden geçirilmiş revizyon yok, bu yüzden kalite için [[{{MediaWiki:Validationpage}}|'''denetlenmemiş''']] olabilir.",
	'revreview-note' => '[[User:$1|$1]] bu revizyonu [[{{MediaWiki:Validationpage}}|gözden geçirerek]] şu notu bıraktı:',
	'revreview-notes' => 'Görüntülenecek gözlem ve notlar:',
	'revreview-oldrating' => 'Derecelendirme:',
	'revreview-patrol' => 'Bu değişikliği gözlenmiş olarak işaretle',
	'revreview-patrol-title' => 'Gözlenmiş olarak işaretle',
	'revreview-patrolled' => '[[:$1|$1]] için seçilen revizyon gözlenmiş olarak işaretlendi.',
	'revreview-quality' => 'Bu en son [[{{MediaWiki:Validationpage}}|kaliteli]] revizyon, <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Karalama] için [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|değişiklik|değişiklik}}] gözden geçirilmeyi bekliyor.',
	'revreview-quality-i' => 'Bu en son [[{{MediaWiki:Validationpage}}|kaliteli]] revizyon, <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Karalama] için [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} şablon/dosya değişikliğinin] gözden geçirilmesi gerekiyor.',
	'revreview-quality-old' => 'Bu bir [[{{MediaWiki:Validationpage}}|kaliteli]] revizyondur ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hepsini listele]), <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].
Yeni [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} değişiklikler] yapılmış olabilir.',
	'revreview-quality-same' => 'Bu en son [[{{MediaWiki:Validationpage}}|kaliteli]] revizyondur ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} hepsini listele]), <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].',
	'revreview-quality-source' => 'Bu sayfanın [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kaliteli sürümü], <i>$2</i> tarihinde [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylanmış], bu revizyondan baz alınmıştır.',
	'revreview-quality-title' => 'Kaliteli sayfa',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Gözlenmiş sayfa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} karalamayı gör]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Gözlenmiş sayfa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} karalamayı gör]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Gözlenmiş sayfa]]'''",
	'revreview-quick-invalid' => "'''Geçersiz revizyon IDsi'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Güncel revizyon]]''' (gözden geçirilmemiş)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kaliteli sayfa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} karalamayı gör]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kaliteli sayfa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} karalamayı gör]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kaliteli sayfa]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Karalama]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} sayfayı gör]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} karşılaştır])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Karalama]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} sayfayı gör]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} karşılaştır])",
	'revreview-selected' => "'''$1 için seçili revizyon:'''",
	'revreview-source' => 'karalama kaynağı',
	'revreview-stable' => 'Sabit sayfa',
	'revreview-stable-title' => 'Gözlenmiş sayfa',
	'revreview-stable1' => '[{{fullurl:$1|stableid=$2}} Bu işaretli sürümü] görüp, bu sayfanın [{{fullurl:$1|stable=1}} kararlı sürümü] olup olmadığını görmek isteyebilirsiniz.',
	'revreview-stable2' => 'Bu sayfanın [{{fullurl:$1|stable=1}} kararlı sürümünü] (eğer hala bir tane varsa) görmek isteyebilirsiniz.',
	'revreview-style' => 'Okunaklılık',
	'revreview-style-0' => 'Onaylanmamış',
	'revreview-style-1' => 'Geçerli',
	'revreview-style-2' => 'İyi',
	'revreview-style-3' => 'Kısa',
	'revreview-style-4' => 'Özellikli',
	'revreview-submit' => 'Gönder',
	'revreview-submitting' => 'Gönderiliyor...',
	'revreview-finished' => 'Gözden geçirme tamamlandı!',
	'revreview-failed' => 'İnceleme başarısız!',
	'revreview-successful' => "'''[[:$1|$1]] için revizyonu başarıyla işaretlendi. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} kararlı sürümleri gör])'''",
	'revreview-successful2' => "'''[[:$1|$1]] için revizyonun işareti başarıyla kaldırıldı.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Kararlı sürümler]] ziyaretçiler için, en yeni revizyon yerine varsayılan sayfa içeriğidir.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Kararlı sürümler]] sayfaların kontrol edilmiş revizyonlarıdır ve ziyaretçiler için varsayılan içerik olarak ayarlanabilir.''",
	'revreview-toggle' => '(+/-)',
	'revreview-toggle-title' => 'detayları göster/gizle',
	'revreview-toolow' => 'Bir revizyonun gözden geçirilmiş sayılabilmesi için aşağıdaki özniteliklerden en az birini "onaylanmamış"dan yüksek oylamalısınız.
Bir revizyonu aşındırmak için, tüm alanları "onaylanmamış" seçin.',
	'revreview-update' => "Lütfen kararlı sürümün [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylandığından] beri yapılan her değişikliği ''(aşağıda gösterilmiş)'' [[{{MediaWiki:Validationpage}}|gözden geçirin]].<br />
'''Bazı şablonlar/dosyalar güncellenmiş:'''",
	'revreview-update-includes' => "'''Bazı şablonlar/dosyalar güncellenmiş:'''",
	'revreview-update-none' => "Lütfen kararlı sürümün [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} onaylandığından] beri yapılan her değişikliği ''(aşağıda gösterilmiş)'' [[{{MediaWiki:Validationpage}}|gözden geçirin]].",
	'revreview-update-use' => "'''NOT:''' Eğer bu şablonların/dosyaların herhangi birisinin kararlı sürümü varsa, zaten bu sayfanın kararlı sürümünde kullanılmıştır.",
	'revreview-diffonly' => "''Sayfayı gözden geçirmek için, \"güncel revizyon\" revizyon linkine tıklayın ve gözden geçirme formunu kullanın.''",
	'revreview-visibility' => "'''Bu sayfanın güncellenmiş bir [[{{MediaWiki:Validationpage}}|kararlı sürümü]] mevcut; sayfa kararlılık ayarları [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} yapılandırılabilir].'''",
	'revreview-visibility2' => "'''Bu sayfanın tarihi geçmiş bir [[{{MediaWiki:Validationpage}}|kararlı sürümü]] vardır; sayfa kararlılık ayarları [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} yapılandırılabilir].'''",
	'revreview-visibility3' => "'''Bu sayfanın bir [[{{MediaWiki:Validationpage}}|kararlı sürümü]] yoktur; sayfa kararlılık ayarları [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} yapılandırılabilir].'''",
	'revreview-revnotfound' => "İstemiş olduğunuz sayfanın eski versiyonu bulunamadı. Lütfen bu sayfaya erişmekte kullandığınız URL'yi kontrol edin.",
	'right-autoreview' => 'Revizyonları otomatik olarak gözlenmiş işaretle',
	'right-movestable' => 'Kararlı sayfaları taşı',
	'right-review' => 'Revizyonları gözlenmiş olarak işaretle',
	'right-stablesettings' => 'Kararlı sürümün nasıl seçilip görüntüleneceğini ayarla',
	'right-validate' => 'Revizyonları doğrulanmış olarak işaretle',
	'rights-editor-autosum' => 'otomatik terfilenmiş',
	'rights-editor-revoke' => '[[$1]] için editör statüsü geri alındı',
	'specialpages-group-quality' => 'Kalite güvencesi',
	'stable-logentry' => '[[$1]] için kararlılık sürümleştirmesi ayarlandı',
	'stable-logentry2' => '[[$1]] için kararlılık sürümleştirmesini sıfırla',
	'stable-logpage' => 'Kararlılık günlüğü',
	'stable-logpagetext' => 'Bu, sayfa içeriğinin [[{{MediaWiki:Validationpage}}|kararlı sürüm]] yapılandırmasındaki değişiklikler günlüğüdür.
Kararlı sayfaları, [[Special:StablePages|kararlı sayfa listesinde]] bulabilirsiniz.',
	'revreview-filter-all' => 'Hepsi',
	'revreview-filter-stable' => 'kararlı',
	'revreview-filter-approved' => 'Onaylandı',
	'revreview-filter-reapproved' => 'Tekrar onaylandı',
	'revreview-filter-unapproved' => 'Onaylanmamış',
	'revreview-filter-auto' => 'Otomatik',
	'revreview-filter-manual' => 'Elle',
	'revreview-statusfilter' => 'Durum değişikliği:',
	'revreview-typefilter' => 'Tip:',
	'revreview-levelfilter' => 'Seviye:',
	'revreview-lev-sighted' => 'gözlendi',
	'revreview-lev-quality' => 'kalite',
	'revreview-lev-pristine' => 'asıl',
	'revreview-reviewlink' => 'gözden geçir',
	'tooltip-ca-current' => 'Bu sayfanın güncel karalamasını gör',
	'tooltip-ca-stable' => 'Bu sayfanın kararlı sürümünü gör',
	'tooltip-ca-default' => 'Kalite güvencesi ayarları',
	'revreview-locked-title' => 'Bu sayfada gösterilmeden önce, değişiklikler gözden geçirilmeli!',
	'revreview-unlocked-title' => 'Bu sayfada gösterilmeden önce, değişikliklerin gözden geçirilmesine gerek yoktur!',
	'revreview-locked' => 'Bu sayfada gösterilmeden önce, değişiklikler gözden geçirilmeli!',
	'revreview-unlocked' => 'Bu sayfada gösterilmeden önce, değişikliklerin gözden geçirilmesine gerek yoktur!',
	'log-show-hide-review' => 'gözden geçirme günlüğünü $1',
	'revreview-tt-review' => 'Bu sayfayı gözden geçir',
	'validationpage' => '{{ns:help}}:Sayfa doğrulaması',
);

/** Ukrainian (Українська)
 * @author AS
 * @author Ahonc
 */
$messages['uk'] = array(
	'editor' => 'редактор',
	'flaggedrevs' => 'Позначені версії',
	'flaggedrevs-backlog' => "Наявне відставання у перевірці сторінок, див. [[Special:OldReviewedPages|Застарілі перевірені сторінки]]. '''Будь ласка, зверніть увагу!'''",
	'flaggedrevs-desc' => 'Надає можливість редакторам і рецензентам переглядати версії сторінок і встановлювати стабільні версії',
	'flaggedrevs-pref-UI-0' => 'Використовувати докладний інтерфейс стабільних версій',
	'flaggedrevs-pref-UI-1' => 'Використовувати простий інтерфейс стабільних версій',
	'flaggedrevs-prefs-stable' => 'Завжди показувати за замовчуванням стабільну версію (якщо така є)',
	'flaggedrevs-prefs-watch' => 'Додавати перевірені мною сторінки до списку спостереження',
	'group-editor' => 'Редактори',
	'group-editor-member' => 'редактор',
	'group-reviewer' => 'Рецензенти',
	'group-reviewer-member' => 'рецензент',
	'grouppage-editor' => '{{ns:project}}:Редактори',
	'grouppage-reviewer' => '{{ns:project}}:Рецензенти',
	'group-autoreview' => 'Авторедактори',
	'group-autoreview-member' => 'авторедактор',
	'grouppage-autoreview' => '{{ns:project}}:Авторедактор',
	'hist-draft' => 'чорнова версія',
	'hist-quality' => 'якісна версія',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} вивірена] користувачем [[User:$3|$3]]',
	'hist-stable' => 'переглянута версія',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} переглянута] користувачем [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} автоматично переглянута]',
	'review-diff2stable' => 'Показати відмінності між стабільною і поточною версіями',
	'review-logentry-app' => 'перевірив версію r$2 сторінки [[$1]]',
	'review-logentry-dis' => 'застаріла версія r$2 сторінки [[$1]]',
	'review-logentry-id' => 'перегляд',
	'review-logentry-diff' => 'різниця зі стабільною',
	'review-logpage' => 'Журнал перевірок',
	'review-logpagetext' => 'Це журнал змін [[{{MediaWiki:Validationpage}}|затверджених]] статусів версій сторінок.
Див. [[Special:ReviewedPages|список перевірених сторінок]].',
	'reviewer' => 'рецензент',
	'revisionreview' => 'Перевірка версій',
	'revreview-accuracy' => 'Точність',
	'revreview-accuracy-0' => 'не зазначена',
	'revreview-accuracy-1' => 'переглянута',
	'revreview-accuracy-2' => 'точна',
	'revreview-accuracy-3' => 'з джерелами',
	'revreview-accuracy-4' => 'вибрана',
	'revreview-approved' => 'Перевірена',
	'revreview-auto' => '(автоматично)',
	'revreview-auto-w' => "Ви редагуєте стабільну версію, зміни будуть '''автоматично позначені як перевірені'''.",
	'revreview-auto-w-old' => "Ви редагуєте перевірену версію, зміни будуть '''автоматично позначені як перевірені'''.",
	'revreview-basic' => 'Це остання [[{{MediaWiki:Validationpage}}|переглянута]] версія; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|редагування|редагування|редагувань}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетки] {{PLURAL:$3|очікує|очікують|очікують}} перевірки.',
	'revreview-basic-i' => 'Це остання [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} переглянута] версія; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
У [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетці] є [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} зміни в шаблонах або зображеннях], що потребують перевірки.',
	'revreview-basic-old' => 'Це [[{{MediaWiki:Validationpage}}|переглянута]] версія ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список усіх]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
Могли бути зроблені нові [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} редагування].',
	'revreview-basic-same' => 'Це остання [[{{MediaWiki:Validationpage}}|переглянута]] версія ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список усіх]); [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Переглянута версія] цієї сторінки, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>, базується на цій версії.',
	'revreview-blocked' => 'Ви не можете перевірити цю версію, оскільки зараз ваш обліковий запис заблокований ([$1 докладніше])',
	'revreview-changed' => "'''Запитана дія не може бути виконана з цією версією сторінки [[:$1|$1]].'''

Можливо, шаблон або зображення були запитані без зазначення конкретної версії.
Це могло статися, якщо динамічний шаблон включає інший шаблон або зображення, яке залежить від змінної, яка змінилася з моменту початку перевірки.
Оновіть сторінку і почніть перевірку знову, це може вирішити проблему.",
	'revreview-current' => 'Чернетка',
	'revreview-depth' => 'Повнота',
	'revreview-depth-0' => 'незазначена',
	'revreview-depth-1' => 'базова',
	'revreview-depth-2' => 'середня',
	'revreview-depth-3' => 'висока',
	'revreview-depth-4' => 'вибрана',
	'revreview-draft-title' => 'Чернетка сторінки',
	'revreview-edit' => 'Редагувати чернетку',
	'revreview-editnotice' => "'''Зауваження: редагування цієї сторінки будуть включені до [[{{MediaWiki:Validationpage}}|стабільної версії]], коли вповноважений користувач перевірить сторінку.'''",
	'revreview-flag' => 'Перевірити цю версію',
	'revreview-edited' => "'''Редагування будуть включені до [[{{MediaWiki:Validationpage}}|стабільної версії]] після перевірки користувачами з відповідними правами. ''Чернетка'' показана нижче.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|редагування очікує|редагування очікують|редагувань очікують}}] перевірки.",
	'revreview-invalid' => "'''Неправильна ціль:''' нема [[{{MediaWiki:Validationpage}}|перевіреної]] версії сторінки, яка відповідає даному ідентифікатору.",
	'revreview-legend' => 'Оцінки вмісту версій',
	'revreview-log' => 'Коментар:',
	'revreview-main' => 'Ви повинні обрати одну з версій сторінки для перевірки.

Див. також [[Special:Unreviewedpages|список неперевірених сторінок]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Остання переглянута версія] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список усіх]) була [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|редагування|редагування|редагувань}}] {{PLURAL:$3|потребує|потребують|потребують}} перевірки.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Остання переглянута версія] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список усіх]);  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
Потрібна перевірка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} змін у шаблонах або зображеннях].',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Остання якісна версія] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список усіх]) була [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|редагування|редагування|редагувань}}] {{PLURAL:$3|потребує|потребують|потребують}} перевірки.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Остання якісна версія] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список усіх]);  [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
Потрібна перевірка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} змін у шаблонах та зображеннях].',
	'revreview-noflagged' => "Ця сторінка не має перевірених версій, імовірно, її якість '''не''' [[{{MediaWiki:Validationpage}}|оцінювалася]].",
	'revreview-note' => '[[Користувач:$1|$1]] зробив наступний коментар, [[{{MediaWiki:Validationpage}}|перевіряючи]] цю версію:',
	'revreview-notes' => 'Спостереження і коментарі для показу:',
	'revreview-oldrating' => 'Була оцінена:',
	'revreview-patrol' => 'Позначити цю зміну як перевірену',
	'revreview-patrol-title' => 'Позначена як патрульована',
	'revreview-patrolled' => 'Обрана версія [[:$1|$1]] була позначена як патрульована.',
	'revreview-quality' => 'Це остання [[{{MediaWiki:Validationpage}}|якісна]] версія; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|редагування|редагування|редагувань}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетки] {{PLURAL:$3|очікує|очікують|очікують}} перевірки.',
	'revreview-quality-i' => 'Це остання [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} якісна] версія; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
У [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетці] є [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} зміни в шаблонах та зображеннях], що потребують перевірки.',
	'revreview-quality-old' => 'Це [[{{MediaWiki:Validationpage}}|якісна]] версія ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список усіх]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
Могли бути зроблені нові [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} редагування].',
	'revreview-quality-same' => 'Це остання [[{{MediaWiki:Validationpage}}|якісна]] версія ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} список усіх]); [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Якісна версія] цієї сторінки, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>, базується на цій версії.',
	'revreview-quality-title' => 'Якісна сторінка',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Переглянута сторінка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показати чернетку]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Переглянута сторінка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показати чернетку]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Переглянута сторінка]]'''",
	'revreview-quick-invalid' => "'''Помилковий ідентифікатор версії сторінки'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Поточна версія]]''' (не перевірялась)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Якісна сторінка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показати чернетку]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Якісна сторінка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показати чернетку]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Якісна сторінка]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Чернетка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показати сторінку]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} порівняти])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Чернетка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показати сторінку]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} порівняти])",
	'revreview-selected' => "Обрана версія '''$1:'''",
	'revreview-source' => 'вихідний текст чернетки',
	'revreview-stable' => 'Стабільна сторінка',
	'revreview-stable-title' => 'Переглянута сторінка',
	'revreview-stable1' => 'Можливо, ви хочете подивитися [{{fullurl:$1|stableid=$2}} цю позначену версію] або [{{fullurl:$1|stable=1}} стабільну версію] цієї сторінки, якщо така існує.',
	'revreview-stable2' => 'Можливо, ви хочете подивитися [{{fullurl:$1|stable=1}} стабільну версію] цією сторінки (якщо така існує).',
	'revreview-style' => 'Читабельність',
	'revreview-style-0' => 'незазначена',
	'revreview-style-1' => 'прийнятна',
	'revreview-style-2' => 'добра',
	'revreview-style-3' => 'стисла',
	'revreview-style-4' => 'вибрана',
	'revreview-submit' => 'Позначити',
	'revreview-submitting' => 'Надсилання...',
	'revreview-finished' => 'Перевірка виконана!',
	'revreview-successful' => "'''Обрана версія [[:$1|$1]] успішно позначена. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} перегляд усіх стабільних версій])'''",
	'revreview-successful2' => "'''Із обраної версії [[:$1|$1]] успішно знята позначка.'''",
	'revreview-text' => "''За замовчуванням установлений показ [[{{MediaWiki:Validationpage}}|стабільних версій]] сторінок, а не найбільш нових.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Стабільні версії]] — це перевірені версії сторінок, можуть бути встановлені для показу за замовчуванням.''",
	'revreview-toggle' => '(+/-)',
	'revreview-toggle-title' => 'показати/приховати подробиці',
	'revreview-toolow' => 'Вам слід зазначити для всіх значень рівень, вищий, ніж «не зазначена», щоб версія сторінки вважалася перевіреною.
Щоб зняти позначку перевіреної версії, встановіть усі значення в «не зазначена».',
	'revreview-update' => "Будь ласка, [[{{MediaWiki:Validationpage}}|перевірте]] редагування ''(показані нижче)'', зроблені після [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} перевірки] стабільної версії.<br />
'''Деякі шаблони або зображення могли бути оновлені:'''",
	'revreview-update-includes' => "'''Деякі шаблони або зображення були оновлені:'''",
	'revreview-update-none' => "Будь ласка, [[{{MediaWiki:Validationpage}}|перевірте]] редагування ''(показані нижче)'', зроблені після [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} установки] стабільної версії.",
	'revreview-update-use' => "'''ЗАУВАЖЕННЯ.''' Якщо якийсь із цих шаблонів або зображень має стабільну версію, то вона вже використовується у стабільній версії цієї сторінки.",
	'revreview-diffonly' => "''Щоб перевірити сторінку, натисніть на посилання «поточна версія» і використовуйте форму перевірки.''",
	'revreview-visibility' => "'''Ця сторінка має [[{{MediaWiki:Validationpage}}|стабільну версію]], яка може бути [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} налаштована].'''",
	'revreview-visibility2' => "'''Ця сторінка не має оновленої [[{{MediaWiki:Validationpage}}|стабільної версії]]; налаштування стабілізації сторінки можуть бути [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} змінені].'''",
	'revreview-revnotfound' => 'Неможливо знайти необхідну вам версію статті.
Будь-ласка, перевірте правильність посилання, яке ви використовували для доступу до цієї статті.',
	'right-autoreview' => 'Автоматичне позначення версій сторінок переглянутими',
	'right-movestable' => 'Перейменування стабільних версій',
	'right-review' => 'Позначення версій сторінок переглянутими',
	'right-stablesettings' => 'Налаштування вибору і відображення стабільної версії',
	'right-validate' => 'Позначення версій сторінок вивіреними',
	'rights-editor-autosum' => 'автопризначення',
	'rights-editor-revoke' => 'зняв статус редактора з [[$1]]',
	'specialpages-group-quality' => 'Підтримка якості',
	'stable-logentry' => 'встановив стабільне версіонування для [[$1]]',
	'stable-logentry2' => 'скасував стабільне версіонування для [[$1]]',
	'stable-logpage' => 'Журнал стабілізацій',
	'stable-logpagetext' => 'Це журнал змін налаштувань [[{{MediaWiki:Validationpage}}|стабільних версій]] сторінок.
Див. також  [[Special:StablePages|список стабільних сторінок]].',
	'revreview-filter-all' => 'Усі',
	'revreview-filter-approved' => 'Перевірені',
	'revreview-filter-reapproved' => 'Повторно перевірені',
	'revreview-filter-unapproved' => 'Неперевірені',
	'revreview-filter-auto' => 'Автоматично',
	'revreview-filter-manual' => 'Уручну',
	'revreview-statusfilter' => 'Зміна статусу:',
	'revreview-typefilter' => 'Тип:',
	'revreview-lev-sighted' => 'переглянута',
	'revreview-lev-quality' => 'якісна',
	'revreview-reviewlink' => 'перевірити',
	'tooltip-ca-current' => 'Переглянути поточну чернетку цієї сторінки',
	'tooltip-ca-stable' => 'Показати стабільну версію цієї сторінки',
	'tooltip-ca-default' => 'Налаштування контролю якості',
	'revreview-locked-title' => 'Редагування мають бути перевірені перед тим, як будуть показані на цій сторінці!',
	'revreview-unlocked-title' => 'Редагування не вимагають попередньої перевірки для відображення на цій сторінці!',
	'revreview-locked' => 'Редагування мають бути [[{{MediaWiki:Validationpage}}|перевірені]] перед тим, як будуть показані на цій сторінці.',
	'revreview-unlocked' => 'Редагування не вимагають попередньої [[{{MediaWiki:Validationpage}}|перевірки]] перед тим, як будуть показані на цій сторінці.',
	'log-show-hide-review' => '$1 журнал перевірок',
	'revreview-tt-review' => 'Перевірити цю сторінку',
	'validationpage' => '{{ns:help}}:Перевірка сторінки',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'editor' => 'Contributor',
	'flaggedrevs' => 'Revision marcade',
	'flaggedrevs-backlog' => "Ghe xe del laoro aretrato da far su le [[Special:OldReviewedPages|ùltime modifiche]] de pagine riesaminà tenpo adrìo. '''Ghe xe bisogno de la to atension!'''",
	'flaggedrevs-desc' => 'I contribudori e i revisori i pode controlar le revision e stabilizar le pagine',
	'flaggedrevs-pref-UI-0' => "Dòpara l'interfacia utente de la version stabile detaglià",
	'flaggedrevs-pref-UI-1' => "Dòpara l'interfacia utente de la version stabile sénpliçe",
	'flaggedrevs-prefs-stable' => 'Mostra sempre par default la version stabile de le pagine (se ghe ne esiste una)',
	'flaggedrevs-prefs-watch' => "Tien d'ocio le pagine che riesamino",
	'group-editor' => 'Contributori',
	'group-editor-member' => 'Contributor',
	'group-reviewer' => 'Revisori',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor' => '{{ns:project}}:Contributor',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'hist-draft' => 'version bozza',
	'hist-quality' => 'revision de qualità',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} convalidà] da [[User:$3|$3]]',
	'hist-stable' => 'version rivardà',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} rivardà] da [[User:$3|$3]]',
	'review-diff2stable' => 'Varda i canbiamenti tra la version stabile e quela atuale',
	'review-logentry-app' => 'gà riesaminà r$2 de [[$1]]',
	'review-logentry-dis' => 'gà sbassà de livèl r$2 de [[$1]]',
	'review-logentry-id' => 'varda',
	'review-logentry-diff' => 'difarensa da la version stabile',
	'review-logpage' => 'Registro de le riesaminassion',
	'review-logpagetext' => 'Sto qua el xe un registro de le modifiche al stato de [[{{MediaWiki:Validationpage}}|aprovassion]] de le pagine.
Varda la [[Special:ReviewedPages|lista de le pagine riesaminà]] par védar quale xe le pagine aprovà.',
	'reviewer' => 'Revisor',
	'revisionreview' => 'Riesamina versioni',
	'revreview-accuracy' => 'Acuratessa',
	'revreview-accuracy-0' => 'Non aprovà',
	'revreview-accuracy-1' => 'Rivardà',
	'revreview-accuracy-2' => 'Acurato',
	'revreview-accuracy-3' => 'Ben fornìa de fonti',
	'revreview-accuracy-4' => 'De qualità',
	'revreview-approved' => 'Aprovà',
	'revreview-auto' => '(automatico)',
	'revreview-auto-w' => "Te sì drio modificar la version stabile; le modifiche le vegnarà '''automaticamente riesaminà'''.",
	'revreview-auto-w-old' => "Te sì drio modificar na version che xera stà esaminà; le modifiche le vegnarà '''automaticamente riesaminà'''.",
	'revreview-basic' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|rivardà]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la gà [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] che speta de vegner esaminà.",
	'revreview-basic-i' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|rivardà]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la gà [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template e/o imagini] che speta de vegner esaminà.",
	'revreview-basic-old' => "Sta qua la xe na version [[{{MediaWiki:Validationpage}}|rivardà]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Po' darse che sia stà fati [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canbiamenti novi].",
	'revreview-basic-same' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|rivardà]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.",
	'revreview-basic-source' => 'Na [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version rivardà] de sta pagina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>, le xe stà basà su sta version.',
	'revreview-changed' => "'''Su sta version de [[:$1|$1]] no se pode eseguir l'azion richiesta.'''

Podarìa èssar stà richiesto un template o na imagine sensa prima specificar na version.
Questo pode capitar se un template dinamico l'include n'altro template o imagine in base a na variabile che xe canbià da quando ti gà tacà a riesaminar sta pagina.
Par risolvar el problema próa a rinfrescar la pagina e tacar da novo a riesaminar la voçe.",
	'revreview-current' => 'Bozza',
	'revreview-depth' => 'Profondità',
	'revreview-depth-0' => 'Non aprovà',
	'revreview-depth-1' => 'De base',
	'revreview-depth-2' => 'Moderata',
	'revreview-depth-3' => 'Alta',
	'revreview-depth-4' => 'De qualità',
	'revreview-draft-title' => 'Pàxena de bozza',
	'revreview-edit' => 'Modifica bozza',
	'revreview-flag' => 'Riesamina sta version',
	'revreview-edited' => "'''Le modifiche le vegnarà incorporà in te la [[{{MediaWiki:Validationpage}}|version stabile]] 'pena che un utente autorizà el ie esamina.
La ''bozza'' la xe mostrà qua soto.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|modifica la|modifiche le}} speta] de vegner esaminà.",
	'revreview-invalid' => "'''Destinassion mìa valida:''' el nùmaro fornìo no'l corisponde a nissuna version [[{{MediaWiki:Validationpage}}|riesaminà]].",
	'revreview-legend' => 'Valuta el contenuto de la version',
	'revreview-log' => 'Comento:',
	'revreview-main' => 'Ti gà da selessionar na version in particolare de la pagina par esaminarla.

Varda la [[Special:Unreviewedpages|lista de pagine da riesaminar]].',
	'revreview-newest-basic' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version rivardà] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|la|le}} gà da vegner esaminà.",
	'revreview-newest-basic-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version rivardà] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Ghe xe dei [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canbiamenti a template e/o imagini] che speta de vegner esaminà.",
	'revreview-newest-quality' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version de qualità] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|la|le}} gà da èssar esaminà.",
	'revreview-newest-quality-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version de qualità] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Ghe xe dele [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template e/o imagine] che speta de vegner esaminà.",
	'revreview-noflagged' => "No ghe xe version riesaminà de sta voçe, quindi podarìa '''no''' èssar stà [[{{MediaWiki:Validationpage}}|controlà]] la so qualità.",
	'revreview-note' => '[[User:$1|$1]] el gà fato le seguenti anotassion [[{{MediaWiki:Validationpage}}|riesaminando]] sta version:',
	'revreview-notes' => 'Osservassioni o note da far védar:',
	'revreview-oldrating' => 'La xe stà giudicà:',
	'revreview-patrol' => 'Segna sta modifica come ricontrolà',
	'revreview-patrol-title' => 'Segna come patuglià',
	'revreview-patrolled' => 'La version de [[:$1|$1]] selessionà la xe stà marcada come controlà.',
	'revreview-quality' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|de qualità]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la gà [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] che speta de vegner esaminà.",
	'revreview-quality-i' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|de qualità]], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la presenta dele [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template e/o imagini] che speta de vegner esaminà.",
	'revreview-quality-old' => 'Sta qua la xe na version [[{{MediaWiki:Validationpage}}|de qualità]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Xe stà fato dei [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canbiamenti] novi.',
	'revreview-quality-same' => "Sta qua la xe l'ultima revision [[{{MediaWiki:Validationpage}}|de qualità]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.",
	'revreview-quality-source' => 'Na [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualità] de sta pagina, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>, la xe basà su sta revision.',
	'revreview-quality-title' => 'Pàxena de qualità',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pàxena rivardà]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Pàxena rivardà]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pàxena rivardà]]'''",
	'revreview-quick-invalid' => "'''Nùmaro de revision mìa valido'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Version atuale]]''' (non riesaminà)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualità]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Bozza]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} varda la pàxena]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cofronta])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Bozza]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} varda la pàxena]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} confronta])",
	'revreview-selected' => "Revision selessionà de '''$1:'''",
	'revreview-source' => 'Còdese sorgente de la bozza',
	'revreview-stable' => 'Pagina stabile',
	'revreview-stable-title' => 'Pàxena rivardà',
	'revreview-stable1' => 'Ti pol vardar sta [{{fullurl:$1|stableid=$2}} version marcàda] par védar se desso la xe la [{{fullurl:$1|stable=1}} version stabile] de sta pagina.',
	'revreview-stable2' => "Te pol vardar la [{{fullurl:$1|stable=1}} version stabile] de sta pagina (se ghe n'è una).",
	'revreview-style' => 'Legibilità',
	'revreview-style-0' => 'Non aprovà',
	'revreview-style-1' => 'Açetàbile',
	'revreview-style-2' => 'Bona',
	'revreview-style-3' => 'Concisa',
	'revreview-style-4' => 'De qualità',
	'revreview-submit' => 'Manda',
	'revreview-submitting' => "So' drio mandarlo...",
	'revreview-finished' => 'Revision conpletà!',
	'revreview-successful' => "'''La revision de [[:$1|$1]] la xe stà verificà. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} varda tute le version stabili])'''",
	'revreview-successful2' => "'''Cavà el contrassegno a la version selessionà de [[:$1|$1]].'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Le versioni stabili]] le xe el contenuto predefinìo par i visitatori, al posto de la version pi reçente.''",
	'revreview-text2' => "''Le [[{{MediaWiki:Validationpage}}|version stabili]] le xe revisioni de pagine che xe stà controlà e che pode vegner mostrà come contenuto predefinìo par i visitatori.''",
	'revreview-toggle-title' => 'mostra/scondi detagli',
	'revreview-toolow' => 'Ti gà da segnar ognuno dei atributi qua soto piessè alto de "Non aprovà" perché la version la sia considerà riesaminà.
Par declassar na version, segna tuti i canpi come "Non aprovà".',
	'revreview-update' => "Par piaser [[{{MediaWiki:Validationpage}}|esamina]] tuti i canbiamenti ''(mostra qua soto)'' fati da quando la version stabile la xe stà [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà].<br />
'''Alcuni template e/o imagini i xe stà canbià:'''",
	'revreview-update-includes' => "'''Alcuni template o file i xe stà agiornà:'''",
	'revreview-update-none' => "Par piaser [[{{MediaWiki:Validationpage}}|esamina]] tuti i canbiamenti ''(mostra qua soto)'' fati da quando la version stabile la xe stà [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} aprovà].",
	'revreview-update-use' => "'''OCIO:''' Se qualchedun de sti template o file el gà na version stabile, alora el xe xà doparà in te la version stabile de sta pagina.",
	'revreview-diffonly' => "''Par riesaminar la pagine, struca el colegamento \"revision corente\" e dòpara el modulo de riesame.''",
	'revreview-visibility' => "'''Sta pagina la gà na [[{{MediaWiki:Validationpage}}|version stabile]] ajornà; le inpostassion de stabilità de pàxena le pol èssar [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} configuràe].'''",
	'revreview-revnotfound' => "La version richiesta de ła pàxena no la xè mìa stà catà.
Verifica l'URL che te doparà par açedere a sta pàxena.",
	'right-autoreview' => 'Marca automaticamente le revision come "viste"',
	'right-movestable' => 'Sposta le pagine stabili',
	'right-review' => 'Marca le revision come "viste"',
	'right-stablesettings' => 'Configura come la version stabile la sia selessionà e mostrà',
	'right-validate' => 'Segna le revision come convalidà',
	'rights-editor-autosum' => 'autopromosso',
	'rights-editor-revoke' => 'gà revocà i diriti de modificador de [[$1]]',
	'specialpages-group-quality' => 'Controlo de qualità',
	'stable-logentry' => 'inpostà versionamento stabile par [[$1]]',
	'stable-logentry2' => 'resetar el versionamento stabile par [[$1]]',
	'stable-logpage' => 'Registro de stabilità',
	'stable-logpagetext' => 'Sto qua el xe un registro dei cambiamenti a la configurassion de le [[{{MediaWiki:Validationpage}}|version stabili]] de le pagine.
Na lista de le pagine stabilizà se pol catarla in [[Special:StablePages|lista de le pagine stabili]].',
	'revreview-filter-all' => 'Tute',
	'revreview-filter-approved' => 'Aprovà',
	'revreview-filter-unapproved' => 'Mia aprovà',
	'revreview-filter-auto' => 'Automatico',
	'revreview-filter-manual' => 'Manuale',
	'revreview-statusfilter' => 'Canbio de stato:',
	'revreview-typefilter' => 'Tipo:',
	'tooltip-ca-current' => 'Varda la bozza corente de sta pagina',
	'tooltip-ca-stable' => 'Varda la version stabile de sta pagina',
	'tooltip-ca-default' => 'Inpostassion par el controlo de qualità',
	'log-show-hide-review' => '$1 registro de le revision',
	'revreview-tt-review' => 'Revisiona sta pàxena',
	'validationpage' => '{{ns:help}}:Validassion dele pàxene',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'editor' => 'Redaktor',
	'flaggedrevs' => 'Znamoitud versijad',
	'flaggedrevs-backlog' => "Lehtpoliden kodvind möhästub, kc. [[Special:OldReviewedPages|möhästuz kodvindas]]. '''Olgat hüväd, vedagat teiden tarkust!'''",
	'flaggedrevs-watched-pending' => "Nügüd' om [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} uzid arvosteldud lehtpoliden redakcijoid] teiden kaclendnimikirjuteses. '''Olgat hüväd, vedagat teiden tarkust!'''",
	'flaggedrevs-desc' => 'Andab redaktorile/recenzentoile voimut kodvda lehtpoliden stabiližed versijad da vahvištada stabiližed versijad',
	'flaggedrevs-pref-UI' => 'Stabiližen versijan interfeis:',
	'flaggedrevs-pref-UI-0' => 'Kävutada stabiližiden versijoiden detaline interfeis',
	'flaggedrevs-pref-UI-1' => 'Kävutada stabiližiden versijoiden detalitoi interfeis',
	'prefs-flaggedrevs' => 'Stabiližuz',
	'flaggedrevs-prefs-stable' => 'Kaiken ozutada augotižjärgendusen mödhe stabiline versii (ku se om)',
	'flaggedrevs-prefs-watch' => 'Ližata minai kodvdud lehtpolid kaclendnimikirjuteshe',
	'group-editor' => 'Redaktorad',
	'group-editor-member' => 'redaktor',
	'group-reviewer' => 'Arvostelijad',
	'group-reviewer-member' => 'arvostelii',
	'grouppage-editor' => '{{ns:project}}:Redaktor',
	'grouppage-reviewer' => '{{ns:project}}:Arvostelii',
	'group-autoreview' => 'Avtoarvostelijad',
	'group-autoreview-member' => 'avtoarvostelii',
	'grouppage-autoreview' => '{{ns:project}}:Avtoarvostelijad',
	'hist-draft' => 'mustversii',
	'hist-quality' => 'Kodvdud versii',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} om kodvnu lophusai] kävutai [[User:$3|$3]]',
	'hist-stable' => 'arvosteldud versii',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} om arvostelnu] kävutai [[User:$3|$3]]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} om arvosteldud avtomatižešti]',
	'review-diff2stable' => 'Ozutada stabižen versijan da nügüdläižen versijan erod',
	'review-logentry-app' => 'om kodvnu [[$1]]-lehtpolen r$2-versii',
	'review-logentry-dis' => '[[$1]]-lehtpolen vanhtunu r$2-versii',
	'review-logentry-id' => 'nägu',
	'review-logentry-diff' => 'necen lehtpolen da stabiližen lehtpolen erod',
	'review-logpage' => 'Kodvindaigkirj',
	'review-logpagetext' => "Nece om aigkirj, kus kirjutadas lehtpol'versijoiden statusoiden vahvištadud toižetusiš.
Kc. См. [[Special:ReviewedPages|kodvdud lehtpoliden nimikirjutez]].",
	'reviewer' => 'Arvostelii',
	'revisionreview' => 'Versijoiden kodvind',
	'revreview-accuracy' => 'Tarkoiktuz',
	'revreview-accuracy-0' => 'ei ole vahvištoittud',
	'revreview-accuracy-1' => 'Arvosteldud',
	'revreview-accuracy-2' => 'Tarkoiged',
	'revreview-accuracy-3' => 'Purtkikaz',
	'revreview-accuracy-4' => 'Valitud',
	'revreview-approved' => 'Kodvdud',
	'revreview-auto' => '(avtomatižešti)',
	'revreview-auto-w' => "Tö redaktiruit stabilišt versijad; vajehtused znamoitas '''avtomatižešti, kut kodvdud material'''.",
	'revreview-auto-w-old' => "Tö redaktiruit arvosteldud versijad; vajehtused znamoitas '''avtomatižešti, kut arvosteldud material'''.",
	'revreview-basic' => "Nece om jäl'gmäine [[{{MediaWiki:Validationpage}}|kactud]] versii; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvii] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Mustkirjutuses om] $3 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|toižetuz, kudamb|toižetust, kudambad}}] {{PLURAL:$3|varastab|varastadas}} kodvindad.",
	'revreview-basic-i' => "Nece om jäl'gmäine [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} kactud] versii; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvii] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Mustkirjuteses] om [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}}toižetusid šablonoiš vai kuviš], kudambad varastadas kodvindad.",
	'revreview-basic-old' => "Nece om jäl'gmäine [[{{MediaWiki:Validationpage}}|kactud]] versii ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} ühthine nimikirjutez]), 
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvii] <i>$2</i>.
Ken-se voinuiži tehta [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ližatoižetusid].",
	'revreview-basic-same' => "Nece om jäl'gmäine [[{{MediaWiki:Validationpage}}|kactud]] versii ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} ühthine nimikirjutez]); 
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvii] <i>$2</i>.",
	'revreview-basic-source' => 'Necen lehtpolen [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kactud versii], [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kudamban om kodvnu] <i>$2</i>, 
om tehtud necen versijan alusel.',
	'revreview-blocked' => "Teile ei sa kodva necidä versijad, sikš miše teiden registracii om nügüd' blokiruidud ($1 detalid)",
	'revreview-changed' => "'''Necidä ei voi tehta necil lehtpolen [[:$1|$1]]-versijalpäi.'''

Voib olda, šablon vai kuva oma znamoitud niiden konkretižita versijoita.
Nece voinuiži tehtas, ku dinamine šablon mülütab toižen šablonan vai kuvan, a ned rippudas toižetunuden kodvindan augotižkurolpäi vajehtujas luguspäi.
Udištagat lehtpol' i augotagat kodvindad udes, nece voib koheta problemad.",
	'revreview-current' => 'Mustkirjutuz',
	'revreview-depth' => 'Süvuz',
	'revreview-depth-0' => 'ei ole ozutadud',
	'revreview-depth-1' => 'bazine',
	'revreview-depth-2' => 'Keskmäine',
	'revreview-depth-3' => 'Korged',
	'revreview-depth-4' => 'Valitud',
	'revreview-draft-title' => 'Lehtpolen mustkirjutuz',
	'revreview-edit' => 'Redaktiruida mustkirjutuz',
	'revreview-editnotice' => "'''Homaičend: necen lehtpolen toižetused mülütadas [[{{MediaWiki:Validationpage}}|stabiližhe versijaha]], konz niid kodvib avtoriziruidud kävutai .'''",
	'revreview-flag' => 'Kodvda nece versii',
	'revreview-edited' => "'''Redaktiruindad mülütadas [[{{MediaWiki:Validationpage}}|stabiližehe versijaha]], konz niid kodvdas kävutajad sättuiden oiktusidenke.
''Mustkirjutuz'' om ozutadud alemba.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|redakcii varastab|redakcijad varastab}}] kodvindad.",
	'revreview-invalid' => "'''Petuzline met:''' ei ole lehtpolen [[{{MediaWiki:Validationpage}}|kodvdud]] versijad, kudamb sättub ozutadud identifikatoranke.",
	'revreview-legend' => 'Versijan südäimišton arvsanad',
	'revreview-log' => 'Homaičend:',
	'revreview-main' => 'Pidab valita lehtpolen versii arvostelendan täht.

Kc. [[Special:Unreviewedpages|kodvmatomiden lehtpoliden nimikirjutez]].',
	'revreview-newest-basic' => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Jäl'gmäine kodvdud versii] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} ühthine nimikirjutez]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvdihe] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|toižetuz|toižetust}}] {{PLURAL:$3|varastab}} kodvindad.",
	'revreview-newest-basic-i' => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Jäl'gmäine kodvdud versii] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} ühthine nimikirjutez]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvdihe] <i>$2</i>.
Pidab kodvda [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} toižetused šablonoiš vai kuviš].",
	'revreview-newest-quality' => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Jäl'gmäine lophusai kodvdud versii] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} ühthine nimikirjutez]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvdihe] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|toižetuz|toižetust}}] {{PLURAL:$3|varastab}} kodvindad.",
	'revreview-newest-quality-i' => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Jäl'gmäine lophusai kodvdud versii] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} ühthine nimikirjutez]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvdihe] <i>$2</i>.
Pidab kodvda [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} toižetused šablonoiš vai kuviš].",
	'revreview-noflagged' => "Necil lehtpolel ei ole kodvdud versijoid. Nägub, sen lad '''ei ole völ''' [[{{MediaWiki:Validationpage}}|arvosteldud]].",
	'revreview-note' => '[[User:$1|$1]] tegi mugoi homaičend necidä versijad [[{{MediaWiki:Validationpage}}|kodvdes]]:',
	'revreview-notes' => 'Kaclendhomaičendad ozutandan täht:',
	'revreview-oldrating' => 'Om arvosteldud:',
	'revreview-patrol' => 'Znamoita nece toižetuz kut kodvdud',
	'revreview-patrol-title' => 'Znamoita kut patruliruidud',
	'revreview-patrolled' => 'Valitud versii [[:$1|$1]] om znamoitud kut patruliruidud.',
	'revreview-quality' => "Nece om jäl'gmäine [[{{MediaWiki:Validationpage}}|lophusai kodvdud]] versii; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvii] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|toižetuz|toižetust}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} mustkirjutuses] 
{{PLURAL:$3|varastab|varastadas}} kodvindad.",
	'revreview-quality-i' => "Nece om jäl'gmäine [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lophusai kodvdud] versii; [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvii] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Mustkirjutuses] om [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}}toižetusid šabloniš vai kuviš], kudambid pidab kodvda.",
	'revreview-quality-old' => 'Nece om [[{{MediaWiki:Validationpage}}|lophusai kodvdud]] versii ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} ühthine nimikirjutez]), 
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvii] <i>$2</i>.
Ken-se voinuiži tehta [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ližatoižetusid].',
	'revreview-quality-same' => "Nece om jäl'gmäine [[{{MediaWiki:Validationpage}}|lophusai kodvdud]] versii ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} ühthine nimikirjutez]); [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvii] <i>$2</i>.",
	'revreview-quality-source' => 'Necen lehtpolen [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} lophusai kodvdud versii,] [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} kodvii] <i>$2</i>, om tehtud necen versijan alusel.',
	'revreview-quality-title' => "Lophusai kodvdud lehtpol'",
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Arvosteldud lehtpol']]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ozutada mustkirjutuz]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Arvosteldud lehtpol']]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ozutada mustkirjutuz]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Arvosteldud lehtpol']]'''",
	'revreview-quick-invalid' => "'''Vär lehtpolen versijan identifikator'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Nügüdläine versii]]''' (ei ole arvosteldud)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Lophusai kodvdud lehtpol']]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ozutada mustkirjutuz]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Lophusai kodvdud lehtpol']]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ozutada mustkirjutuz]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Lophusai kodvdud lehtpol']]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Mustkirjutuz]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ozutada lehtpol']]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} rindatada])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Mustkirjutuz]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ozutada lehtpol']]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} rindatada])",
	'revreview-selected' => "'''$1'''-lehtpolen valitud versii:",
	'revreview-source' => 'mustkirjutusen augotižtekst',
	'revreview-stable' => "Stabiline lehtpol'",
	'revreview-stable-title' => "Arvosteldud lehtpol'",
	'revreview-stable1' => 'Voib olda, teil linneb taht lugeda necen lehtpolen [{{fullurl:$1|stableid=$2}} znamoitud versijad] vai [{{fullurl:$1|stable=1}} stabilišt versijad], ku se om wikiš.',
	'revreview-stable2' => 'Voib olda, teil linneb taht lugeda necen lehtpolen [{{fullurl:$1|stable=1}} stabilišt versijad], ku se om wikiš.',
	'revreview-style' => 'Voimuz lugeda',
	'revreview-style-0' => 'Ei ole vahvištoittud',
	'revreview-style-1' => 'Hüväčuine',
	'revreview-style-2' => 'Hüvä',
	'revreview-style-3' => 'Vähäsanaine',
	'revreview-style-4' => 'Valitud',
	'revreview-submit' => 'Oigeta',
	'revreview-submitting' => 'Oigendamine...',
	'revreview-finished' => 'Kodvind om loptud!',
	'revreview-successful' => "'''Valitud [[:$1|$1]]-versii om znamoitud satusekahas. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} stabiližiden versijoiden kacund])'''",
	'revreview-successful2' => "'''Virg om heittud [[:$1|$1]]-versijaspäi.'''",
	'revreview-text' => "''Augotižjärgendusen mödhe ozutadas lehtpoliden [[{{MediaWiki:Validationpage}}|stabiližed versijad]], ei udembad.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabiližed versijad]] — lehtpoliden kodvdud versijad, kudambid voiži ozutada augotižjärgendusen mödhe.''",
	'revreview-toggle-title' => 'ozutada/peitta detalid',
	'revreview-toolow' => 'Pidab kirjutada kaikuččiden znamoičedoiden täht korktemb tazopind, mi "ei ole znamoitud", miše versii oliži vahvištadud kut kodvdud.
Miše heitta kodvindan znam, kirjutagat kaikjal "ei ole znamoitud".',
	'revreview-update' => "Olgat hüväd, [[{{MediaWiki:Validationpage}}|kodvgat]] toižetused''(ned ozutadas alemba)'', kudambid tehtihe jäl'ges stabiližen versijan
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} seižutamišt].<br />
'''Erased šablonad vai kuvad oma udištadud:'''",
	'revreview-update-includes' => "'''Erased šablonad vai kuvad oma udištadud:'''",
	'revreview-update-none' => "Olgat hüväd, [[{{MediaWiki:Validationpage}}|kodvgat]] redakcijad ''(ned oma ozutadud alemba)'', kudambad oma tehtud stabiližen versijan
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} seižutamižen] jäl'ghe.",
	'revreview-update-use' => "'''HOMAIČEND.''' Ku miččel-ni neniš šablonoišpäi vai kuvišpäi om stabiline versii, ka sidä kävutadas jo necen lehtpolen stabiližes versijas.",
	'revreview-diffonly' => "''Miše kodvda lehtpol't, paingat \"nügüdläine versii\"-kosketusele i kävutagat kodvindan form.''",
	'revreview-visibility' => "'''Necil lehtpolel om udištadud [[{{MediaWiki:Validationpage}}|stabiline versii]]; sab toižetada [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} stabiližiden versijoiden ozutamižen järgendused].'''",
	'revreview-visibility2' => "'''Necil lehtpolel ei ole udištadud [[{{MediaWiki:Validationpage}}|stabilišt versijad]]; 
sab toižetada [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}}-lehtpolen stabiližusen järgendused].'''",
	'revreview-visibility3' => "'''Necil lehtpolel ei ole udištadud [[{{MediaWiki:Validationpage}}|stabilišt versijad]]; 
sab toižetada [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}}-lehtpolen stabiližusen järgendused].'''",
	'revreview-revnotfound' => 'Ei voi löuta lehtpolen edelišt versijad. Olgat hüväd, kodvgat, om-ik oiged se kosketuz, kudamban tö olet kävutanuded necile lehtpolele tuldes.',
	'right-autoreview' => 'Znamoita avtomatižikš lehtpoliden versijad kut arvosteldud',
	'right-movestable' => 'Puhthanikoiden udesnimitand',
	'right-review' => 'Znamoita lehtpoliden versijad kut arvosteldud',
	'right-stablesettings' => 'Puhthanikan valičendan da ozutamižen järgendamine',
	'right-validate' => 'Znamoit lehtpoliden versijad kut lophusai kodvdud',
	'rights-editor-autosum' => 'avtopanend',
	'rights-editor-revoke' => 'Om anastanu arvostelijan statusan [[$1]]-kävutajalpäi',
	'specialpages-group-quality' => 'Ladun tugedamine',
	'stable-logentry' => 'om pannu stabiližen versioniruindan [[$1]]:n täht',
	'stable-logentry2' => 'om heitnu puhthanikan versioniruindan [[$1]]:n täht',
	'stable-logpage' => 'Stabilizacijoiden aigkirj',
	'stable-logpagetext' => 'Nece om lehtpoliden [[{{MediaWiki:Validationpage}}|stabiližiden versijoiden]] järgendusiden toižetusiden aigkirj.
Kc. mugažo [[Special:StablePages|stabiližiden lehtpoliden nimikirjutez]].',
	'revreview-filter-all' => 'Kaik',
	'revreview-filter-stable' => 'stabiline',
	'revreview-filter-approved' => 'Vahvištadud',
	'revreview-filter-reapproved' => 'Vahvištadud udes',
	'revreview-filter-unapproved' => 'Vahvištamata',
	'revreview-filter-auto' => 'Avtomatižikš',
	'revreview-filter-manual' => 'Ičeksaz',
	'revreview-statusfilter' => 'Statusan toižetuz:',
	'revreview-typefilter' => 'Tip:',
	'revreview-levelfilter' => 'Tazopind:',
	'revreview-lev-sighted' => 'kactud',
	'revreview-lev-quality' => 'lad',
	'revreview-lev-pristine' => 'koskmatoi',
	'revreview-reviewlink' => 'kodvda',
	'tooltip-ca-current' => 'Ozutada necen lehtsen nügüdläine mustversii',
	'tooltip-ca-stable' => 'Ozutada necen lehtpolen stabiline versii',
	'tooltip-ca-default' => 'Ladun kontrolin järgendused',
	'revreview-locked-title' => 'Pidab kodvda toižetusid edel niiden ozutamišt necil lehtpolel!',
	'revreview-unlocked-title' => 'Toižetusiden ozutamine necil lehtpolel ei rippu niiden kodvindaspäi!',
	'revreview-locked' => 'Pidab kodvda toižetusid edel niiden ozutamišt necil lehtpolel!',
	'revreview-unlocked' => 'Toižetusiden ozutamine necil lehtpolel ei rippu niiden kodvindaspäi!',
	'log-show-hide-review' => '$1 kodvindoiden aigkirj',
	'revreview-tt-review' => "Kodvda nece lehtpol'",
	'validationpage' => '{{ns:help}}:Lehtpoliden kodvind',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'editor' => 'Chủ bút',
	'flaggedrevs' => 'Các bản được đánh dấu',
	'flaggedrevs-backlog' => "Hiện đang lạc hậu về [[Special:OldReviewedPages|trang cần duyệt lại]]. '''Cần bạn chú ý!'''",
	'flaggedrevs-watched-pending' => "Hiện có [{{fullurl:{{#Special:OldReviewedPages}}|watched=1}} sửa đổi chưa duyệt] tại trang đã duyệt trong danh sách theo dõi của bạn. '''Cần bạn chú ý!'''",
	'flaggedrevs-desc' => 'Cung cấp cho người viết và người duyệt bài khả năng phê chuẩn phiên bản và ổn định trang',
	'flaggedrevs-pref-UI' => 'Giao diện phiên bản ổn định:',
	'flaggedrevs-pref-UI-0' => 'Sử dụng giao diện người dùng phiên bản ổn định chi tiết',
	'flaggedrevs-pref-UI-1' => 'Sử dụng giao diện người dùng phiên bản ổn định đơn giản',
	'prefs-flaggedrevs' => 'Ổn định',
	'flaggedrevs-prefs-stable' => 'Luôn hiển thị bản nội dung ổn định của trang theo mặc định (nếu có)',
	'flaggedrevs-prefs-watch' => 'Thêm trang tôi duyệt vào danh sách theo dõi',
	'group-editor' => 'Người viêt bài',
	'group-editor-member' => 'chủ bút',
	'group-reviewer' => 'Người duyệt bài',
	'group-reviewer-member' => 'Người duyệt bài',
	'grouppage-editor' => '{{ns:project}}:Người viết bài',
	'grouppage-reviewer' => '{{ns:project}}:Người duyệt bài',
	'group-autoreview' => 'Người tự duyệt',
	'group-autoreview-member' => 'người tự duyệt',
	'grouppage-autoreview' => '{{ns:project}}:Người tự duyệt',
	'hist-draft' => 'phiên bản nháp',
	'hist-quality' => 'bản chất lượng cao',
	'hist-quality-user' => '[[User:$3|$3]] [{{fullurl:$1|stableid=$2}} đã phê chuẩn]',
	'hist-stable' => 'bản đã xem qua',
	'hist-stable-user' => '[[User:$3|$3]] [{{fullurl:$1|stableid=$2}} đã xem qua]',
	'hist-autoreviewed' => '[{{fullurl:$1|stableid=$2}} được xem qua tự động]',
	'review-diff2stable' => 'So sánh phiên bản ổn định với bản hiện hành',
	'review-logentry-app' => 'đã duyệt phiên bản $2 của [[$1]]',
	'review-logentry-dis' => 'đã đánh giá thấp hơn cho phiên bản $2 của [[$1]]',
	'review-logentry-id' => 'xem',
	'review-logentry-diff' => 'so với bản ổn định',
	'review-logpage' => 'Nhật trình duyệt',
	'review-logpagetext' => 'Đây là nhật trình ghi lại những thay đổi đối với tình trạng [[{{MediaWiki:Validationpage}}|phê chuẩn]] cho nội dung trang.
Xem [[Special:ReviewedPages|danh sách các trang đã duyệt]] để có danh sách các trang đã phê chuẩn.',
	'reviewer' => 'Người duyệt bài',
	'revisionreview' => 'Các bản đã duyệt',
	'revreview-accuracy' => 'Độ chính xác',
	'revreview-accuracy-0' => 'Chưa phê chuẩn',
	'revreview-accuracy-1' => 'Đã xem qua',
	'revreview-accuracy-2' => 'Chính xác',
	'revreview-accuracy-3' => 'Đầy đủ nguồn',
	'revreview-accuracy-4' => 'Rất tốt',
	'revreview-approved' => 'Đã phê chuẩn',
	'revreview-auto' => '(tự động)',
	'revreview-auto-w' => "Bạn đang sửa đổi bản ổn định; những thay đổi sẽ '''tự động được duyệt'''.",
	'revreview-auto-w-old' => "Bạn đang sửa đổi một bản đã duyệt trước đây; những thay đổi của bạn sẽ '''tự động được duyệt'''.",
	'revreview-basic' => 'Đây là bản [[{{MediaWiki:Validationpage}}|đã xem qua]] mới nhất, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản phác thảo] có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] chờ duyệt.',
	'revreview-basic-i' => 'Đây là phiên bản [[{{MediaWiki:Validationpage}}|được xem qua]] mới nhất, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản nháp] có các [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} thay đổi tiêu bản/tập tin] đang chờ được duyệt.',
	'revreview-basic-old' => 'Đây là một bản [[{{MediaWiki:Validationpage}}|đã xem qua]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tất cả]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
Đã có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} những sửa đổi] mới.',
	'revreview-basic-same' => 'Đây là bản [[{{MediaWiki:Validationpage}}|đã xem qua]] mới nhất ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} xem tất cả]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.',
	'revreview-basic-source' => 'Một [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bản đã xem qua] của trang này, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>, 
khác với bản này.',
	'revreview-blocked' => 'Bạn không có duyệt phiên bản này được vì tài khoản của bạn đang bị cấm ([$1 chi tiết])',
	'revreview-changed' => "'''Không thể thực hiện tác vụ yêu cầu đối với phiên bản này của [[:$1|$1]].'''

Một tiêu bản hoặc tập tin có thể được yêu cầu mà chưa chỉ định phiên bản cụ thể.
Điều này có thể xảy ra nếu một tiêu bản động nhúng một tập tin hoặc tiêu bản khác phụ thuộc vào một biến, biến đó đã thay đổi từ khi bạn bắt đầu duyệt trang này.
Làm tươi trang và duyệt lại có thể giải quyết vấn đề này.",
	'revreview-current' => 'Bản phác thảo',
	'revreview-depth' => 'Chiều sâu',
	'revreview-depth-0' => 'Chưa phê chuẩn',
	'revreview-depth-1' => 'Cơ bản',
	'revreview-depth-2' => 'Trung bình',
	'revreview-depth-3' => 'Cao',
	'revreview-depth-4' => 'Rất tốt',
	'revreview-draft-title' => 'Trang nháp',
	'revreview-edit' => 'Sửa đổi bản phác thảo',
	'revreview-editnotice' => "'''Chú ý: Các sửa đổi tại trang này sẽ vào [[{{MediaWiki:Validationpage}}|phiên bản ổn định]] lúc khi chúng được duyệt bởi một thành viên được quyền.'''",
	'revreview-flag' => 'Duyệt phiên bản này',
	'revreview-edited' => "'''Những sửa đổi sẽ được đưa vào [[{{MediaWiki:Validationpage}}|bản ổn định]] ngay khi được một thành viên được chỉ định duyệt qua.
Dưới đây là ''bản phác thảo''.''' Có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|thay đổi|thay đổi}}] đang chờ được duyệt.",
	'revreview-invalid' => "'''Không hợp lệ:''' không có bản [[{{MediaWiki:Validationpage}}|đã duyệt]] tương ứng với ID được cung cấp.",
	'revreview-legend' => 'Xếp hạng nội dung phiên bản',
	'revreview-log' => 'Nhận xét:',
	'revreview-main' => 'Bạn phải chọn một phiên bản cụ thể từ một trang nội dung để duyệt.

Mời xem [[Special:Unreviewedpages|danh sách các trang chưa được duyệt]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Bản đã xem qua mới nhất] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tất cả]) đã được [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] {{PLURAL:$3|cần|cần}} duyệt.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Phiên bản được xem qua cuối cùng] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} xem tất cả]) được [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Thay đổi tiêu bản/tập tin] cần duyệt.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Bản chất lượng mới nhất] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tất cả]) được [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] {{PLURAL:$3|cần|cần}} duyệt.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Bản chất lượng mới nhất] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} xem tất cả]) đã được [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Thay đổi tiêu bản/tập tin] cần duyệt qua.',
	'revreview-noflagged' => "Không tìm thấy bản đã được duyệt của trang, do đó có thể nó '''chưa''' được [[{{MediaWiki:Validationpage}}|kiểm tra]] chất lượng.",
	'revreview-note' => '[[User:$1|$1]] đã ghi chú như sau khi [[{{MediaWiki:Validationpage}}|duyệt]] bản này:',
	'revreview-notes' => 'Nhận xét hoặc ghi chú sẽ hiển thị:',
	'revreview-oldrating' => 'Được xếp hạng:',
	'revreview-patrol' => 'Đánh dấu tuần tra sửa đổi này',
	'revreview-patrol-title' => 'Đánh dấu đã tuần tra',
	'revreview-patrolled' => 'Bản được chọn của [[:$1|$1]] đã được đánh dấu đã tuần tra.',
	'revreview-quality' => 'Đây là bản [[{{MediaWiki:Validationpage}}|chất lượng]] mới nhất, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản phác thảo] có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] chờ duyệt.',
	'revreview-quality-i' => 'Đây là phiên bản [[{{MediaWiki:Validationpage}}|chất lượng]] mới nhất, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản nháp] có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} thay đổi tiêu bản/tập tin] chờ được duyệt.',
	'revreview-quality-old' => 'Đây là một bản [[{{MediaWiki:Validationpage}}|chất lượng]] ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} tất cả]), [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
Có thể đã có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} những sửa đổi] mới.',
	'revreview-quality-same' => 'Đây là bản [[{{MediaWiki:Validationpage}}|chất lượng]] mới nhất ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} xem tất cả]),
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.',
	'revreview-quality-source' => 'Một [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bản chất lượng] của trang này, [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>, khác với bản này.',
	'revreview-quality-title' => 'Trang chất lượng',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Trang đã xem qua]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Trang đã xem qua]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Trang đã xem qua]]'''",
	'revreview-quick-invalid' => "'''ID phiên bản không hợp lệ'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Bản hiện hành]]''' (chưa duyệt)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Trang chất lượng]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Trang chất lượng]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Trang chất lượng]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Trang nháp]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} xem trang]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} so sánh])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Trang nháp]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} xem trang]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} so sánh])",
	'revreview-selected' => "Phiên bản được chọn của '''$1''':",
	'revreview-source' => 'mã nguồn của bản phác thảo',
	'revreview-stable' => 'Trang ổn định',
	'revreview-stable-title' => 'Trang đã xem qua',
	'revreview-stable1' => 'Bạn có thể muốn xem [{{fullurl:$1|stableid=$2}} bản có cờ này] để xem nó có phải là [{{fullurl:$1|stable=1}} bản ổn định] của trang này hay chưa.',
	'revreview-stable2' => 'Bạn có thể muốn xem [{{fullurl:$1|stable=1}} bản ổn định] của trang này (nếu vẫn còn bản như vậy).',
	'revreview-style' => 'Độ dễ đọc',
	'revreview-style-0' => 'Chưa phê chuẩn',
	'revreview-style-1' => 'Chấp nhận được',
	'revreview-style-2' => 'Tốt',
	'revreview-style-3' => 'Súc tích',
	'revreview-style-4' => 'Rất tốt',
	'revreview-submit' => 'Đăng bản duyệt',
	'revreview-submitting' => 'Đang gửi thông tin…',
	'revreview-finished' => 'Duyệt xong!',
	'revreview-failed' => 'Duyệt thất bại!',
	'revreview-successful' => "'''Phiên bản của [[:$1|$1]] đã được gắn cờ. ([{{fullurl:{{#Special:Stableversions}}|page=$2}} xem các phiên bản có cờ])'''",
	'revreview-successful2' => "'''Phiên bản của [[:$1|$1]] đã được bỏ cờ thành công.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Phiên bản ổn định]] là nội dung trang mặc định mà người dùng nhìn thấy chứ không phải phiên bản mới nhất.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Bản ổn định]] được kiểm tra phiên bản của trang và có thể thiết lập làm nội dung mặc định cho người xem.''",
	'revreview-toggle-title' => 'hiện/ẩn chi tiết',
	'revreview-toolow' => 'Ít nhất bạn phải xếp hạng mỗi thuộc tính dưới đây cao hơn "chưa phê chuẩn" để một phiên bản có thể được xem là được duyệt.
Để hạ cấp một phiên bản, hãy chọn tất cả các thuộc tính "chưa phê chuẩn".',
	'revreview-update' => "Xin hãy [[{{MediaWiki:Validationpage}}|duyệt]] bất kỳ thay đổi nào ''(xem ở dưới)'' đã được thực hiện từ khi bản ổn định được [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn].<br />
'''Một số tiêu bản/tập tin được cập nhật:'''",
	'revreview-update-includes' => "'''Một số tiêu bản/tập tin được cập nhật:'''",
	'revreview-update-none' => "Xin hãy [[{{MediaWiki:Validationpage}}|duyệt]] bất kỳ thay đổi nào ''(xem ở dưới)'' đã được thực hiện từ khi bản ổn định được [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn].",
	'revreview-update-use' => "'''GHI CHÚ:''' Nếu bất kỳ tiêu bản/tập tin nào có một phiên bản ổn định, nó đã được dùng trong phiên bản ổn định của trang này.",
	'revreview-diffonly' => "''Để duyệt trang, hãy nhấn chuột vào liên kết “phiên bản hiện hành” và điền vào biểu mẫu duyệt trang.''",
	'revreview-visibility' => "'''Trang này có một [[{{MediaWiki:Validationpage}}|bản ổn định]] đã được cập nhật; bạn có thể [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} cấu hình] thiết lập độ ổn định cho trang.'''",
	'revreview-visibility2' => "'''Trang này có [[{{MediaWiki:Validationpage}}|phiên bản ổn định]] lỗi thời; có thể [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} thiết lập] sự ổn định của trang.'''",
	'revreview-visibility3' => "'''Trang này không có [[{{MediaWiki:Validationpage}}|phiên bản ổn định]]; có thể [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} thiết lập] sự ổn định của trang.'''",
	'revreview-revnotfound' => 'Không thấy phiên bản trước của trang này. Xin kiểm tra lại.',
	'right-autoreview' => 'Tự động đánh dấu phiên bản là đã xem qua',
	'right-movestable' => 'Di chuyển trang ổn định',
	'right-review' => 'Đánh dấu phiên bản đã xem qua',
	'right-stablesettings' => 'Cấu hình cho phiên bản ổn định được lựa chọn và hiển thị như thế nào',
	'right-validate' => 'Đánh dấu phiên bản đã phê chuẩn',
	'rights-editor-autosum' => 'tự phong cờ',
	'rights-editor-revoke' => 'đưa [[$1]] ra khỏi nhóm viết bài',
	'specialpages-group-quality' => 'Đảm bảo chất lượng',
	'stable-logentry' => 'đã thiết lập phiên bản ổn định cho [[$1]]',
	'stable-logentry2' => 'mặc định lại phiên bản ổn định của [[$1]]',
	'stable-logpage' => 'Nhật trình ổn định hóa',
	'stable-logpagetext' => 'Đây là nhật trình ghi lại những thay đổi đối với cấu hình [[{{MediaWiki:Validationpage}}|bản ổn định]] của nội dung trang.
Danh sách các trang ổn định có thể tìm thấy tại [[Special:StablePages|danh sách trang ổn định]].',
	'revreview-filter-all' => 'Tất cả',
	'revreview-filter-stable' => 'ổn định',
	'revreview-filter-approved' => 'Được chấp nhận',
	'revreview-filter-reapproved' => 'Được chấp nhận lại',
	'revreview-filter-unapproved' => 'Chưa chấp nhận',
	'revreview-filter-auto' => 'Tự động',
	'revreview-filter-manual' => 'Bằng tay',
	'revreview-statusfilter' => 'Thay đổi trạng thái:',
	'revreview-typefilter' => 'Loại:',
	'revreview-levelfilter' => 'Cấp:',
	'revreview-lev-sighted' => 'được xem qua',
	'revreview-lev-quality' => 'chất lượng cao',
	'revreview-lev-pristine' => 'trong sạch',
	'revreview-reviewlink' => 'duyệt',
	'tooltip-ca-current' => 'Xem bản phác thảo hiện hành của trang này',
	'tooltip-ca-stable' => 'Xem bản ổn định của trang này',
	'tooltip-ca-default' => 'Thiết lập về bảo đảm chất lượng',
	'revreview-locked-title' => 'Các sửa đổi phải được duyệt trước khi được hiển thị tại trang này!',
	'revreview-unlocked-title' => 'Các sửa đổi không cần được duyệt trước khi được hiển thị tại trang này!',
	'revreview-locked' => 'Các sửa đổi phải được duyệt trước khi được hiển thị tại trang này!',
	'revreview-unlocked' => 'Các sửa đổi không cần được duyệt trước khi được hiển thị tại trang này!',
	'log-show-hide-review' => '$1 nhật trình duyệt',
	'revreview-tt-review' => 'Duyệt trang này',
	'validationpage' => '{{ns:help}}:Phê chuẩn trang',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$messages['vo'] = array(
	'editor' => 'Redakan',
	'flaggedrevs-desc' => 'Dälon redakanes/krütanes ad zepön fomamis/votükamis ed ad fümöfükön padis',
	'group-editor' => 'Redakans',
	'group-editor-member' => 'Redakan',
	'group-reviewer' => 'Krütans',
	'group-reviewer-member' => 'Krütan',
	'grouppage-editor' => '{{ns:project}}:Redakan',
	'grouppage-reviewer' => '{{ns:project}}:Krütan',
	'hist-quality' => 'kalietakrüt',
	'hist-stable' => 'fomam pelogöl',
	'review-diff2stable' => 'Votükams vü fomam fümöfik e fomam anuik',
	'review-logentry-app' => 'ekrüton padi: [[$1]]',
	'review-logentry-dis' => 'ecödon fomami pada: [[$1]] läs gudiki',
	'review-logentry-id' => 'dientifakot fomama: $1',
	'review-logpage' => 'Lised yegedikrütamas',
	'review-logpagetext' => 'Is palisedons votükams [[{{MediaWiki:Validationpage}}|zepastada]] padas ninädilabik.',
	'reviewer' => 'Krütan',
	'revisionreview' => 'Logön krütamis',
	'revreview-accuracy-0' => 'No pezepöl',
	'revreview-accuracy-3' => 'Labü fonäts',
	'revreview-auto' => '(itjäfidik)',
	'revreview-auto-w' => "Anu redakol fomami fümöfik: votükams seimik '''pokrütons itjäfidiko'''. Logolös, begö! büologedi pada at büä odakipon oni.",
	'revreview-auto-w-old' => "Anu redakol fomami büik: votükams valik '''pokrütons itjäfidiko'''. Logolös, begö! büologedi pada at büä odakipol oni.",
	'revreview-basic' => 'Fomam at binon [[{{MediaWiki:Validationpage}}|fomam pelogöl lätik]], kel
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} päzepon] tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Riget]
kanon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} pavotükön]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|votükam|votükams}} $3] nog
{{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-current' => 'Riget',
	'revreview-depth' => 'Dib',
	'revreview-depth-0' => 'No pezepöl',
	'revreview-depth-1' => 'Staböfik',
	'revreview-depth-2' => 'Zänedik',
	'revreview-depth-3' => 'Löpik',
	'revreview-edit' => 'Redakön rigeti',
	'revreview-flag' => 'Krütön fomami at',
	'revreview-legend' => 'Dadilädön ninädi',
	'revreview-log' => 'Küpet:',
	'revreview-main' => 'Mutol välön fomami semik pada ninädilabik ad krütön oni.

Logolös padi: [[Special:Unreviewedpages]], su kel dabinon lised padas no nog pekrütölas.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Fomam pelogöl lätik]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} lisedön valikis]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} päzepon]
tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|votükam|votükams}} $3] {{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Krüt lätik tefü kaliet]
([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} lisedön valikis]) [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} päzepon]
tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|votükam|votükams}} $3] {{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-noflagged' => "No dabinons fomams pekrütöl pada at; ba '''no''' [[{{MediaWiki:Validationpage}}|pekontrolon]] tefü kaliet.",
	'revreview-note' => '[[User:$1|$1]] äpenon küpetis sököl dü [[{{MediaWiki:Validationpage}}|krütam]] padafomama at:',
	'revreview-notes' => 'Küpets ad pajonön:',
	'revreview-oldrating' => 'Pädadilädon as:',
	'revreview-patrol' => 'Malön votükami at as pezepöl',
	'revreview-patrolled' => 'Fomam at pada: [[:$1|$1]] pefümükon.',
	'revreview-quality' => 'Is logoy [[{{MediaWiki:Validationpage}}|krüti lätik tefü kaliet]], kel
[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} päzepon] tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Riget]
kanon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} pavotükön]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|votükam|votükams}} $3]
{{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pelogon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} logön rigeti]]",
	'revreview-quick-none' => "'''Anuik''' (nen fomams pekrütöl)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kaliet]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} logön rigeti]]",
	'revreview-quick-see-basic' => "'''Riget''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} logön yegedi]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} leigodön])",
	'revreview-quick-see-quality' => "'''Riget''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} logön yegedi]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} leigodön])",
	'revreview-selected' => "Krütam pevälöl pada: '''$1:'''",
	'revreview-source' => 'rigetafonät',
	'revreview-stable' => 'Fümöfik',
	'revreview-style' => 'Reidov',
	'revreview-style-0' => 'No pezepöl',
	'revreview-style-1' => 'Zepabik',
	'revreview-style-2' => 'Gudik',
	'revreview-style-3' => 'Naböfik',
	'revreview-submit' => 'Sedön',
	'revreview-text' => 'Fomams fümöfik - no fomams nulikün! - binons uts, kels pajonons, ven pad palogon.',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Reidolös e krütolös]] votükamis valik ''(dono pejonölis)'', kels pedunons sis fomam fümöfik [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} päzepon].

'''Samafomots e/u magods aniks pekoräkons:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Reidolös e krütolös]] votükams valik ''(dono pajonölis)'', kels pedunons sis fomam fümöfik [{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} päzepon].",
	'revreview-visibility' => 'Pad at labon [[{{MediaWiki:Validationpage}}|fomami fümöfik]], kela parametem kanon [{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} pafümetön].',
	'revreview-revnotfound' => 'Padafomam büik fa ol peflagöl no petuvon. Kontrololös, begö! ladeti-URL, keli egebol ad logön padi at.',
	'rights-editor-revoke' => 'emoükon redakanastadi gebana: [[$1]]',
	'stable-logentry' => '„Fomam fümöfik“ pemögükon pro [[$1]]',
	'stable-logentry2' => 'Vagükön lisedi: „fomams fümöfik“ pro [[$1]]',
	'stable-logpage' => 'Jenotalised fomama fümöfik',
	'stable-logpagetext' => 'Is palisedons votükams parametas [[{{MediaWiki:Validationpage}}|fomama fümöfik]] padas ninädilabik.',
	'tooltip-ca-current' => 'Logön rigeti anuik pada at',
	'tooltip-ca-stable' => 'Logön fomami fümöfik pada at',
	'tooltip-ca-default' => 'Paramets tefü kalietitäxet',
	'validationpage' => '{{ns:help}}:Padikontrolam',
);

/** Võro (Võro)
 * @author Võrok
 */
$messages['vro'] = array(
	'revreview-revnotfound' => 'Es lövväq su otsitut vanna kujjo.
Kaeq üle aadrõs, kost sa taad löüdäq proovõq.',
);

/** Walloon (Walon) */
$messages['wa'] = array(
	'revreview-revnotfound' => "Li viye modêye del pådje ki vos avoz dmandé n' a nén stî trovêye.
Verifyîz l' hårdêye ki vs avoz eployî po-z ariver sol pådje s' i vs plait.",
);

/** Wolof (Wolof)
 * @author Ibou
 */
$messages['wo'] = array(
	'revreview-revnotfound' => 'Sumbum xët wi ngay laaj gisuñ ko. Saytul URL bi nga jëfandikoo ngir jot xët wii.',
);

/** Yiddish (ייִדיש)
 * @author Yidel
 */
$messages['yi'] = array(
	'revreview-revnotfound' => 'די אלטע רעוויזיע איר האט געבעטן קען נישט געפינען ווערן.
ביטע טשעקט די URL וואס ברויכט אריינצוגיין אין דעם בלאט.',
);

/** Yue (粵語) */
$messages['yue'] = array(
	'editor' => '編輯',
	'flaggedrevs' => '加咗旗嘅修訂',
	'flaggedrevs-backlog' => "呢度現時有一個積壓響[[Special:OldReviewedPages|過時複審頁]]。 '''需要你嘅注意！'''",
	'flaggedrevs-desc' => '畀編輯者同埋評論家個能力去核實修訂同埋穩定化頁',
	'flaggedrevs-pref-UI-0' => '用詳細穩定版用戶界面',
	'flaggedrevs-pref-UI-1' => '用簡單穩定版用戶界面',
	'flaggedrevs-prefs-stable' => '總係預設顯示穩定版內容 (如果有一個嘅話)',
	'flaggedrevs-prefs-watch' => '加入我複審過嘅到我張監視清單度',
	'group-editor' => '編輯',
	'group-editor-member' => '編輯',
	'group-reviewer' => '評論家',
	'group-reviewer-member' => '評論家',
	'grouppage-editor' => '{{ns:project}}:編者',
	'grouppage-reviewer' => '{{ns:project}}:評論家',
	'hist-draft' => '草稿修訂',
	'hist-quality' => '質素修訂',
	'hist-quality-user' => '由[[User:$3|$3]][{{fullurl:$1|stableid=$2}} 確認]過',
	'hist-stable' => '視察修訂',
	'hist-stable-user' => '由[[User:$3|$3]][{{fullurl:$1|stableid=$2}} 視察]過',
	'review-diff2stable' => '同上次穩定修訂嘅差異',
	'review-logentry-app' => '視察咗[[$1]]',
	'review-logentry-dis' => '折舊咗[[$1]]嘅版本',
	'review-logentry-id' => '修訂 ID $1',
	'review-logentry-diff' => '同穩定版嘅差異',
	'review-logpage' => '文章複審記錄',
	'review-logpagetext' => '呢個係內容版[[{{MediaWiki:Validationpage}}|批准]]狀態嘅更改記錄。
	睇[[Special:ReviewedPages|複審頁一覽]]去睇核准版嘅一覽。',
	'reviewer' => '評論家',
	'revisionreview' => '複審修訂',
	'revreview-accuracy' => '準確度',
	'revreview-accuracy-0' => '未批准',
	'revreview-accuracy-1' => '視察過',
	'revreview-accuracy-2' => '準確',
	'revreview-accuracy-3' => '有好來源',
	'revreview-accuracy-4' => '正',
	'revreview-approved' => '批准',
	'revreview-auto' => '(自動)',
	'revreview-auto-w' => "你而家係響穩定修訂度做緊更改，你嘅編輯將會'''自動被複審'''。",
	'revreview-auto-w-old' => "你而家係響視察修訂度做緊更改，你嘅編輯將會'''自動被複審'''。",
	'revreview-basic' => '呢個係最後[[{{MediaWiki:Validationpage}}|視察過嘅]]修訂，
	響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]有[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]等緊去複審。',
	'revreview-basic-i' => '呢個係最後[[{{MediaWiki:Validationpage}}|視察過嘅]]修訂，
	響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]有[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 模/圖更改]等緊去複審。',
	'revreview-basic-old' => '呢個係最後[[{{MediaWiki:Validationpage}}|視察過嘅]]修訂（[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]），
	響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	新[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 更改]可能會做咗。',
	'revreview-basic-same' => '呢個係最後[[{{MediaWiki:Validationpage}}|視察過嘅]]修訂（[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]），
	響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。',
	'revreview-basic-source' => '一個[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} 視察版]嘅頁，響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]，基於呢次修訂。',
	'revreview-changed' => "'''個複審嘅動作唔可以響呢次修訂度進行。'''

	當無一個指定嘅版本嗰陣，一個模或圖已經被請求。
	當一個動態模包含住圖像或跟變數嘅模響你開始複審之後改過。
	重新整理過呢版之後再重新複審就可以解決呢個問題。",
	'revreview-current' => '草稿',
	'revreview-depth' => '深度',
	'revreview-depth-0' => '未批准',
	'revreview-depth-1' => '基本',
	'revreview-depth-2' => '中等',
	'revreview-depth-3' => '高',
	'revreview-depth-4' => '正',
	'revreview-draft-title' => '草稿文章',
	'revreview-edit' => '編輯草稿',
	'revreview-flag' => '複審呢次修訂',
	'revreview-edited' => "'''啲編輯響會整合到[[{{MediaWiki:Validationpage}}|穩定版]]當一位整好嘅用戶複審過佢哋。'''
'''個''草稿''響下面度列示。''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2次更改等緊去]複審。",
	'revreview-invalid' => "'''無效嘅目標:''' 無[[{{MediaWiki:Validationpage}}|複審過]]嘅修訂跟仕已經畀咗嘅ID。",
	'revreview-legend' => '評定修訂內容',
	'revreview-log' => '記錄註解:',
	'revreview-main' => '你一定要響一版內容頁度揀一個個別嘅修訂去複審。

	睇[[Special:Unreviewedpages]]去拎未複審嘅版。',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後視察過嘅修訂]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要複審。',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後視察過嘅修訂]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 模/圖更改]需要複審',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後有質素嘅修訂]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要複審。',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後有質素嘅修訂]
	([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $模/圖更改]需要複審。',
	'revreview-noflagged' => "呢一版無複審過嘅修訂，佢可能'''未'''[[{{MediaWiki:Validationpage}}|檢查]]質量。",
	'revreview-note' => '[[User:$1]]響呢次修訂度加咗下面嘅[[{{MediaWiki:Validationpage}}|複審]]註解:',
	'revreview-notes' => '要顯示嘅意見或註解:',
	'revreview-oldrating' => '曾經評定為:',
	'revreview-patrol' => '標示呢次更改做已巡查過嘅',
	'revreview-patrol-title' => '標示做已巡查過嘅',
	'revreview-patrolled' => '所選[[:$1|$1]]嘅修訂做已巡查過嘅。',
	'revreview-quality' => '呢個係最後[[{{MediaWiki:Validationpage}}|有質素嘅]]修訂，
	響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]有[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]等緊去複審。',
	'revreview-quality-i' => '呢個係最後[[{{MediaWiki:Validationpage}}|有質素嘅]]修訂，
	響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]有[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 模/圖更改]等緊去複審。',
	'revreview-quality-old' => '呢個係[[{{MediaWiki:Validationpage}}|有質素嘅]]修訂 ([{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部])，響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	新[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 更改]可能會做咗。',
	'revreview-quality-same' => '呢個係最後[[{{MediaWiki:Validationpage}}|有質素嘅]]修訂（[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]），
	響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。',
	'revreview-quality-source' => '一個[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} 有質素嘅]頁，響<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]，基於呢次修訂。',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|視察過嘅文章]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 睇草稿]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|視察過嘅文章]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 睇草稿]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|視察過嘅文章]]'''",
	'revreview-quick-invalid' => "'''無效嘅修訂ID'''",
	'revreview-quick-none' => "'''現時嘅'''。無已複審嘅修訂。",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|有質素嘅文章]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 睇草稿]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|有質素嘅文章]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 睇草稿]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|有質素嘅文章]]'''",
	'revreview-quick-see-basic' => "'''草稿'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 睇文]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 比較])",
	'revreview-quick-see-quality' => "'''草稿'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 睇文]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 比較])",
	'revreview-selected' => "已經揀咗 '''$1''' 嘅修訂:",
	'revreview-source' => '草稿原始碼',
	'revreview-stable' => '穩定',
	'revreview-stable-title' => '視察過嘅文',
	'revreview-stable1' => '你可能想去睇[{{fullurl:$1|stableid=$2}} 呢個加咗旗嘅版本]去睇呢一版而家係唔係[{{fullurl:$1|stable=1}} 穩定版]。',
	'revreview-stable2' => '你可能想去睇呢一版嘅[{{fullurl:$1|stable=1}} 穩定版] (如果嗰度仍然有一個嘅話)。',
	'revreview-style' => '可讀性',
	'revreview-style-0' => '未批准',
	'revreview-style-1' => '可接受',
	'revreview-style-2' => '好',
	'revreview-style-3' => '簡潔',
	'revreview-style-4' => '正',
	'revreview-submit' => '遞交複審',
	'revreview-successful' => "'''[[:$1|$1]]所選擇嘅修訂已經成功噉加旗。 ([{{fullurl:{{#Special:Stableversions}}|page=$2}} 去睇全部加旗版])'''",
	'revreview-successful2' => "'''[[:$1|$1]]所選擇嘅修訂已經成功噉減旗。'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|穩定版]]會設定做一版睇嗰陣嘅預設內容，而唔係最新嘅修訂。''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|穩定版]]會檢查一版嘅修訂同埋可以設定做觀者嘅預設內容。''",
	'revreview-toggle-title' => '顯示/隱藏細節',
	'revreview-toolow' => '你一定要最少將下面每一項嘅屬性評定高過"未批准"，去將一個修訂複審。
	要捨棄一個修訂，設定全部格做"未批准"。',
	'revreview-update' => '請複審自從響呢版嘅穩定版以來嘅任何更改 (響下面度顯示) 。模同圖亦可能同時更改。',
	'revreview-update-includes' => "'''有啲模/圖更新咗:'''",
	'revreview-update-none' => "請[[{{MediaWiki:Validationpage}}|複審]]任何嘅更改 ''(列示如下)'' 自從穩定修訂[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]後修改過嘅。",
	'revreview-update-use' => "'''留意:''' 如果任何嘅模/圖有穩定版，噉呢一版就已經用咗響穩定版度。",
	'revreview-diffonly' => "''去複審一版，撳 \"現時修訂\" 連結去用複審表格。''",
	'revreview-visibility' => "'''呢一版有一個[[{{MediaWiki:Validationpage}}|穩定版]]；佢嘅設定可以[{{fullurl:{{#Special:Stabilization}}|page={{FULLPAGENAMEE}}}} 較]。'''",
	'revreview-revnotfound' => '呢版無你要搵嗰個版本喎。
唔該睇下條網址啱唔啱。',
	'right-autoreview' => '自動標示修訂做已視察過嘅',
	'right-movestable' => '搬穩定頁',
	'right-review' => '標示修訂做已視察嘅',
	'right-stablesettings' => '設定如何將穩定版選擇同顯示',
	'right-validate' => '標示修訂做已確認嘅',
	'rights-editor-autosum' => '自動升級',
	'rights-editor-revoke' => '由[[$1]]拎走編者狀態',
	'specialpages-group-quality' => '品質保證',
	'stable-logentry' => '設定咗[[$1]]嘅穩定版本',
	'stable-logentry2' => '已重設[[$1]]嘅穩定版本',
	'stable-logpage' => '穩定記錄',
	'stable-logpagetext' => '呢個係[[{{MediaWiki:Validationpage}}|穩定版]]設定內容頁嘅更改記錄。
	個穩定頁可以響[[Special:StablePages|穩定頁一覽]]度搵到。',
	'tooltip-ca-current' => '去睇呢一版嘅現時草稿',
	'tooltip-ca-stable' => '去睇呢一版嘅穩定版',
	'tooltip-ca-default' => '品質保證設定',
	'validationpage' => '{{ns:help}}:文章確認',
);

/** Zeeuws (Zeêuws)
 * @author NJ
 */
$messages['zea'] = array(
	'revreview-revnotfound' => 'De opevrogen ouwe versie van deêze pagina is onvindbaer.
Controleer asjeblieft de URL die  a je hebruken om ni deêze pagina te haene.',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Chenzw
 * @author Gzdavidwong
 */
$messages['zh-hans'] = array(
	'editor' => '编辑',
	'flaggedrevs' => '标注修订',
	'flaggedrevs-desc' => '给予编辑者与评论家能力去核实修订以及稳定化页面',
	'group-editor' => '编辑',
	'group-editor-member' => '编辑',
	'group-reviewer' => '评论家',
	'group-reviewer-member' => '评论家',
	'grouppage-editor' => '{{ns:project}}:编者',
	'grouppage-reviewer' => '{{ns:project}}:评论家',
	'hist-quality' => '[质素]',
	'hist-stable' => '[已察]',
	'review-diff2stable' => '跟上次稳定修订的差异',
	'review-logentry-id' => '修订 ID $1',
	'review-logpage' => '文章复审记录',
	'review-logpagetext' => '这个是内容页[[{{MediaWiki:Validationpage}}|批准]]状态的更改记录。',
	'reviewer' => '评论家',
	'revisionreview' => '复审修订',
	'revreview-accuracy' => '准确度',
	'revreview-accuracy-0' => '未批准',
	'revreview-accuracy-1' => '视察过',
	'revreview-accuracy-2' => '准确',
	'revreview-accuracy-3' => '有良好来源',
	'revreview-accuracy-4' => '特色',
	'revreview-approved' => '已被批准',
	'revreview-auto' => '（自动）',
	'revreview-auto-w' => "'''注意:''' 您现在是在稳定修订中作出更改，您的编辑将会自动被复审。
	您可以在保存前先预览一下。",
	'revreview-basic' => '这个是最后[[{{MediaWiki:Validationpage}}|视察过的]]修订，
	于<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 现时修订]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 更改]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]
	正等候复审。',
	'revreview-changed' => "'''该复审的动作不可以在这次修订中进行。'''

	当无一个指定的版本时，一个模版或图像已经被请求。
	当一个动态模版包含着图像或跟变数的模版在您开始复审后改过。
	重新整理这页后再重新复审便可以解决这个问题。",
	'revreview-current' => '草稿',
	'revreview-depth' => '深度',
	'revreview-depth-0' => '未批准',
	'revreview-depth-1' => '基本',
	'revreview-depth-2' => '中等',
	'revreview-depth-3' => '高',
	'revreview-depth-4' => '特色',
	'revreview-edit' => '编辑草稿',
	'revreview-flag' => '复审这次修订',
	'revreview-legend' => '评定修订内容',
	'revreview-log' => '记录注解:',
	'revreview-main' => '您一定要在一页的内容页中选择一个个别的修订去复审。

	参看[[Special:Unreviewedpages]]去撷取未复审的页面。',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最后视察过的修订]
	（[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]） 于<i>$2</i>曾经[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准过的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要复审。',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最后有质素的修订]
	（[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]） 于<i>$2</i>曾经[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准过的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要复审。',
	'revreview-noflagged' => "这一页没有复审过的修订，它可能'''未'''[[{{MediaWiki:Validationpage}}|检查]]质量。",
	'revreview-note' => '[[User:$1]]在这次修订中加入了以下的[[{{MediaWiki:Validationpage}}|复审]]注解:',
	'revreview-notes' => '要显示的意见或注解:',
	'revreview-oldrating' => '曾经评定为:',
	'revreview-quality' => '这个是最后[[{{MediaWiki:Validationpage}}|有质素的]]修订，
	于<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 现时修订]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 更改]]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]
	正等候复审。',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|视察过的]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 看现时修订]]",
	'revreview-quick-none' => "'''现时的'''。没有已复审的修订。",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|有质素的]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 看现时修订]]",
	'revreview-quick-see-basic' => "'''现时的'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 看最后检查过的修订]]",
	'revreview-quick-see-quality' => "'''现时的'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 看睇最后的质素修订]]",
	'revreview-selected' => "已经选择 '''$1''' 的修订:",
	'revreview-source' => '草稿原始码',
	'revreview-stable' => '稳定',
	'revreview-style' => '可读性',
	'revreview-style-0' => '未批准',
	'revreview-style-1' => '可接受',
	'revreview-style-2' => '好',
	'revreview-style-3' => '简洁',
	'revreview-style-4' => '特色',
	'revreview-submit' => '递交复审',
	'revreview-text' => '稳定版会设置成一页查看时的预设内容，而非最新的修订。',
	'revreview-toolow' => '您一定要最少将下面每一项的属性评定高于"未批准"，去将一个修订复审。
	要舍弃一个修订，设置全部栏位作"未批准"。',
	'revreview-update' => '请复审自从于这页的稳定版以来的任何更改 （在下面显示） 。模版和图像亦可能同时更改。',
	'revreview-revnotfound' => '您请求的更早版本的修订记录没有找到。
请检查您请求本页面用的 URL 是否正确。',
	'validationpage' => '{{ns:help}}:文章确认',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Alexsh
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'editor' => '編輯',
	'flaggedrevs' => '標註修訂',
	'flaggedrevs-desc' => '給予編輯者與評論家能力去核實修訂以及穩定化頁面',
	'group-editor' => '編輯',
	'group-editor-member' => '編輯',
	'group-reviewer' => '評論家',
	'group-reviewer-member' => '評論家',
	'grouppage-editor' => '{{ns:project}}:編者',
	'grouppage-reviewer' => '{{ns:project}}:評論家',
	'hist-quality' => '[質素]',
	'hist-stable' => '[已察]',
	'review-diff2stable' => '跟上次穩定修訂的差異',
	'review-logentry-id' => '修訂 ID $1',
	'review-logpage' => '文章複審記錄',
	'review-logpagetext' => '這個是內容頁[[{{MediaWiki:Validationpage}}|批准]]狀態的更改記錄。',
	'reviewer' => '評論家',
	'revisionreview' => '複審修訂',
	'revreview-accuracy' => '準確度',
	'revreview-accuracy-0' => '未批准',
	'revreview-accuracy-1' => '視察過',
	'revreview-accuracy-2' => '準確',
	'revreview-accuracy-3' => '有良好來源',
	'revreview-accuracy-4' => '特色',
	'revreview-auto' => '（自動）',
	'revreview-auto-w' => "'''注意:''' 您現在是在穩定修訂中作出更改，您的編輯將會自動被複審。
	您可以在保存前先預覽一下。",
	'revreview-basic' => '這個是最後[[{{MediaWiki:Validationpage}}|視察過的]]修訂，
	於<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 現時修訂]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 更改]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]
	正等候複審。',
	'revreview-changed' => "'''該複審的動作不可以在這次修訂中進行。'''

	當無一個指定的版本時，一個模版或圖像已經被請求。
	當一個動態模版包含著圖像或跟變數的模版在您開始複審後改過。
	重新整理這頁後再重新複審便可以解決這個問題。",
	'revreview-current' => '草稿',
	'revreview-depth' => '深度',
	'revreview-depth-0' => '未批准',
	'revreview-depth-1' => '基本',
	'revreview-depth-2' => '中等',
	'revreview-depth-3' => '高',
	'revreview-depth-4' => '特色',
	'revreview-edit' => '編輯草稿',
	'revreview-flag' => '複審這次修訂',
	'revreview-legend' => '評定修訂內容',
	'revreview-log' => '記錄註解:',
	'revreview-main' => '您一定要在一頁的內容頁中選擇一個個別的修訂去複審。

	參看[[Special:Unreviewedpages]]去擷取未複審的頁面。',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後視察過的修訂]
	（[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]） 於<i>$2</i>曾經[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准過的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要複審。',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後有質素的修訂]
	（[{{fullurl:{{#Special:Stableversions}}|page={{FULLPAGENAMEE}}}} 列示全部]） 於<i>$2</i>曾經[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准過的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要複審。',
	'revreview-noflagged' => "這一頁沒有複審過的修訂，它可能'''未'''[[{{MediaWiki:Validationpage}}|檢查]]質量。",
	'revreview-note' => '[[User:$1]]在這次修訂中加入了以下的[[{{MediaWiki:Validationpage}}|複審]]註解:',
	'revreview-notes' => '要顯示的意見或註解:',
	'revreview-oldrating' => '曾經評定為:',
	'revreview-quality' => '這個是最後[[{{MediaWiki:Validationpage}}|有質素的]]修訂，
	於<i>$2</i>[{{fullurl:{{#Special:Log}}|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 現時修訂]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 更改]]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]
	正等候複審。',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|視察過的]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 看現時修訂]]",
	'revreview-quick-invalid' => "'''修訂版本號碼錯誤'''",
	'revreview-quick-none' => "'''現時的'''。沒有已複審的修訂。",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|有質素的]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 看現時修訂]]",
	'revreview-quick-see-basic' => "'''現時的'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 看最後檢查過的修訂]]",
	'revreview-quick-see-quality' => "'''現時的'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 看睇最後的質素修訂]]",
	'revreview-selected' => "已經選擇 '''$1''' 的修訂:",
	'revreview-source' => '草稿原始碼',
	'revreview-stable' => '穩定',
	'revreview-style' => '可讀性',
	'revreview-style-0' => '未批准',
	'revreview-style-1' => '可接受',
	'revreview-style-2' => '好',
	'revreview-style-3' => '簡潔',
	'revreview-style-4' => '特色',
	'revreview-submit' => '遞交複審',
	'revreview-text' => '穩定版會設定成一頁檢視時的預設內容，而非最新的修訂。',
	'revreview-toolow' => '您一定要最少將下面每一項的屬性評定高於"未批准"，去將一個修訂複審。
	要捨棄一個修訂，設定全部欄位作"未批准"。',
	'revreview-update' => '請複審自從於這頁的穩定版以來的任何更改 （在下面顯示） 。模版和圖像亦可能同時更改。',
	'revreview-revnotfound' => '您請求的更早版本的修訂記錄沒有找到。
請檢查您請求本頁面用的URL是否正確。',
	'tooltip-ca-current' => '檢視本頁目前的草稿',
	'tooltip-ca-stable' => '檢視本頁穩定的版本',
	'tooltip-ca-default' => '品質保證設定',
	'validationpage' => '{{ns:help}}:文章確認',
);

/** Chinese (Taiwan) (‪中文(台灣)‬) */
$messages['zh-tw'] = array(
	'revreview-revnotfound' => '您請求的更早版本的修訂記錄沒有找到。
請檢查您請求本頁面用的URL是否正確。',
);

