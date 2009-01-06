<?php
/**
 * Internationalisation file for extension FlaggedRevs (group FlaggedRevs).
 *
 * @comment NOTE: SOME LINKS HAVE '[' and ']' around them. These are NOT typos.
 * @comment PLEASE DO NOT RANDOMLY REMOVE THEM FOR THE THIRD TIME, kthx. -aaron
 * @addtogroup Extensions
 */

$messages = array();

$messages['en'] = array(
	'editor'                       => 'Editor',
	'flaggedrevs'                  => 'Flagged Revisions',
	'flaggedrevs-backlog'          => 'There is currently a backlog at [[Special:OldReviewedPages|Outdated reviewed pages]]. \'\'\'Your attention is needed!\'\'\'',
	'flaggedrevs-desc'             => 'Gives editors and reviewers the ability to validate revisions and stabilize pages',
	'flaggedrevs-pref-UI-0'        => 'Use detailed stable version user interface',
	'flaggedrevs-pref-UI-1'        => 'Use simple stable version user interface',
	'flaggedrevs-prefs'            => 'Stability',
	'flaggedrevs-prefs-stable'     => 'Always show the stable version of content pages by default (if there is one)',
	'flaggedrevs-prefs-watch'      => 'Add pages I review to my watchlist',
	'group-editor'                 => 'Editors',
	'group-editor-member'          => 'editor',
	'group-reviewer'               => 'Reviewers',
	'group-reviewer-member'        => 'reviewer',
	'grouppage-editor'             => '{{ns:project}}:Editor',
	'grouppage-reviewer'           => '{{ns:project}}:Reviewer',
	'hist-draft'                   => 'draft revision',
	'hist-quality'                 => 'quality revision',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validated] by [[User:$3|$3]]',
	'hist-stable'                  => 'sighted revision',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} sighted] by [[User:$3|$3]]',
	'review-diff2stable'           => 'View changes between stable and current revisions',
	'review-logentry-app'          => 'reviewed [[$1]]',
	'review-logentry-dis'          => 'depreciated a version of [[$1]]',
	'review-logentry-id'           => 'revision ID $1',
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
	'revreview-basic'              => 'This is the latest [[{{MediaWiki:Validationpage}}|sighted]] revision, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|changes}}] awaiting review.',
	'revreview-basic-i'            => 'This is the latest [[{{MediaWiki:Validationpage}}|sighted]] revision, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/image changes] awaiting review.',
	'revreview-basic-old'          => 'This is a [[{{MediaWiki:Validationpage}}|sighted]] revision ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
	New [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changes] may have been made.',
	'revreview-basic-same'         => 'This is the latest [[{{MediaWiki:Validationpage}}|sighted]] revision ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.',
	'revreview-basic-source'       => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} sighted version] of this page, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>, was based off this revision.',
	'revreview-changed'            => '\'\'\'The requested action could not be performed on this revision of [[:$1|$1]].\'\'\'

A template or image may have been requested when no specific version was specified.
This can happen if a dynamic template transcludes another image or template depending on a variable that changed since you started reviewing this page.
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
	'revreview-main'               => 'You must select a particular revision from a content page in order to review.

See the [[Special:Unreviewedpages|list of unreviewed pages]].',
	'revreview-newest-basic'       => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest sighted revision] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|changes}}] {{PLURAL:$3|needs|need}} review.',
	'revreview-newest-basic-i'     => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest sighted revision] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/image changes] need review.',
	'revreview-newest-quality'     => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest quality revision] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|changes}}] {{PLURAL:$3|needs|need}} review.',
	'revreview-newest-quality-i'   => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest quality revision] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/image changes] need review.',
	'revreview-noflagged'          => 'There are no reviewed revisions of this page, so it may \'\'\'not\'\'\' have been [[{{MediaWiki:Validationpage}}|checked]] for quality.',
	'revreview-note'               => '[[User:$1|$1]] made the following notes [[{{MediaWiki:Validationpage}}|reviewing]] this revision:',
	'revreview-notes'              => 'Observations or notes to display:',
	'revreview-oldrating'          => 'It was rated:',
	'revreview-patrol'             => 'Mark this change as patrolled',
	'revreview-patrol-title'       => 'Mark as patrolled',
	'revreview-patrolled'          => 'The selected revision of [[:$1|$1]] has been marked as patrolled.',
	'revreview-quality'            => 'This is the latest [[{{MediaWiki:Validationpage}}|quality]] revision, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|changes}}] awaiting review.',
	'revreview-quality-i'          => 'This is the latest [[{{MediaWiki:Validationpage}}|quality]] revision, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/image changes] awaiting review.',
	'revreview-quality-old'        => 'This is a [[{{MediaWiki:Validationpage}}|quality]]  revision ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
	New [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changes] may have been made.',
	'revreview-quality-same'       => 'This is the latest [[{{MediaWiki:Validationpage}}|quality]] revision ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.',
	'revreview-quality-source'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} quality version] of this page, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>, was based off this revision.',
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
	'revreview-successful'         => '\'\'\'Revision of [[:$1|$1]] successfully flagged. ([{{fullurl:Special:Stableversions|page=$2}} view stable versions])\'\'\'',
	'revreview-successful2'        => '\'\'\'Revision of [[:$1|$1]] successfully unflagged.\'\'\'',
	'revreview-text'               => '\'\'[[{{MediaWiki:Validationpage}}|Stable versions]] are the default page content for viewers rather than the newest revision.\'\'',
	'revreview-text2'              => '\'\'[[{{MediaWiki:Validationpage}}|Stable versions]] are checked revisions of pages and can be set as the default content for viewers.\'\'',
	'revreview-toggle'             => '(+/-)',
	'revreview-toggle-title'       => 'show/hide details',
	'revreview-toolow'             => 'You must at least rate each of the below attributes higher than "unapproved" in order for a revision to be considered reviewed.
To depreciate a revision, set all fields to "unapproved".',
	'revreview-update'             => 'Please [[{{MediaWiki:Validationpage}}|review]] any changes \'\'(shown below)\'\' made since the stable revision was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved].<br />
\'\'\'Some templates/images were updated:\'\'\'',
	'revreview-update-includes'    => '\'\'\'Some templates/images were updated:\'\'\'',
	'revreview-update-none'        => 'Please [[{{MediaWiki:Validationpage}}|review]] any changes \'\'(shown below)\'\' made since the stable revision was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved].',
	'revreview-update-use'         => '\'\'\'NOTE:\'\'\' If any of these templates/images have a stable version, then it is already used in the stable version of this page.',
	'revreview-diffonly'           => '\'\'To review the page, click the "current revision" revision link and use the review form.\'\'',
	'revreview-visibility'         => '\'\'\'This page has an updated [[{{MediaWiki:Validationpage}}|stable version]]; page stability settings can be [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configured].\'\'\'',
	'revreview-visibility2'        => '\'\'\'This page does not have an updated [[{{MediaWiki:Validationpage}}|stable version]]; page stability settings can be [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configured].\'\'\'',
	'revreview-revnotfound'        => 'The old revision of the page you asked for could not be found.
Please check the URL you used to access this page.',
	'right-autopatrolother'        => 'Automatically mark revisions in non-main namespaces patrolled',
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
	
	'readerfeedback'               => 'What do you think of this page?',
	'readerfeedback-text'          => '\'\'Please take a moment to rate this page below. Your feedback is valuable and helps us improve our website.\'\'',
	'readerfeedback-reliability'   => 'Reliability',
	'readerfeedback-completeness'  => 'Completeness',
	'readerfeedback-npov'          => 'Neutrality',
	'readerfeedback-presentation'  => 'Presentation',
	'readerfeedback-overall'       => 'Overall',
	'readerfeedback-level-none'    => '(unsure)',
	'readerfeedback-level-0'       => 'Poor',
	'readerfeedback-level-1'       => 'Low',
	'readerfeedback-level-2'       => 'Fair',
	'readerfeedback-level-3'       => 'High',
	'readerfeedback-level-4'       => 'Excellent',
	'readerfeedback-submit'        => 'Submit',
	'readerfeedback-main'          => 'Only content pages can be rated.',
	'readerfeedback-success'       => '\'\'\'Thank you for reviewing this page!\'\'\' ([$3 Comments or questions?]).',
	'readerfeedback-voted'         => '\'\'\'It appears that you already rated this page\'\'\' ([$3 Comments or questions?]).',
	'readerfeedback-submitting'    => 'Submitting...',
	'readerfeedback-finished'      => 'Thank you!',
	
	'revreview-filter-all'         => 'All',
	'revreview-filter-approved'    => 'Approved',
	'revreview-filter-reapproved'  => 'Re-approved',
	'revreview-filter-unapproved'  => 'Unapproved',
	'revreview-filter-auto'        => 'Automatic',
	'revreview-filter-manual'      => 'Manual',
	'revreview-filter-level-0'     => 'Sighted versions',
	'revreview-filter-level-1'     => 'Quality versions',
	'revreview-statusfilter'       => 'Status:',
	'revreview-typefilter'         => 'Type:',
	'revreview-tagfilter'          => 'Tag:',
	
	'revreview-reviewlink'         => 'review',
	
	'tooltip-ca-current'           => 'View the current draft of this page',
	'tooltip-ca-stable'            => 'View the stable version of this page',
	'tooltip-ca-default'           => 'Quality assurance settings',
	'tooltip-ca-ratinghist'        => 'Reader ratings of this page',
	
	'revreview-locked'             => 'Edits must be reviewed before being displayed on this page!',
	'revreview-unlocked'           => 'Edits do not require review before being displayed on this page!',
	
	'revreview-ak-review'          => 's', # do not translate or duplicate this message to other languages
	'accesskey-ca-current'         => 'v', # do not translate or duplicate this message to other languages
	'accesskey-ca-stable'          => 'c', # do not translate or duplicate this message to other languages
	
	'log-show-hide-review'           => '$1 review log',
	
	'revreview-tt-review'          => 'Review this page',
	'validationpage'               => '{{ns:help}}:Page validation',
);

/** Message documentation (Message documentation)
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
 */
$messages['qqq'] = array(
	'editor' => '{{Flagged Revs}}
{{Identical|Editor}}',
	'flaggedrevs' => '{{Flagged Revs}}
General title for the [[Translating:Flagged Revs extension|Flagged Revs]] extension.
* "flagged" in the sense of "has been seen, has been checked"',
	'flaggedrevs-backlog' => '{{Flagged Revs}}',
	'flaggedrevs-desc' => '{{Flagged Revs}}

Shown in [[Special:Version]] as a short description of this extension. Do not translate links.',
	'flaggedrevs-pref-UI-0' => '{{Flagged Revs-small}}
Option in [[Special:Preferences]]. See {{msg|flaggedrevs-pref-UI-1|pl=yes}} for the opposite message. See [[:Image:FlaggedRevs.jpg]] for an example image.',
	'flaggedrevs-pref-UI-1' => '{{Flagged Revs-small}}
Option in [[Special:Preferences]]. See {{msg|flaggedrevs-pref-UI-0|pl=yes}} for the opposite message. See [[:Image:FlaggedRevs.jpg]] for an example image.',
	'flaggedrevs-prefs' => '{{Flagged Revs}}
The tab in your [[Special:Preferences|preferences]]. See [http://de.wikipedia.org/w/index.php?title=Spezial:Einstellungen&uselang=en de.wikipedia] for an example.',
	'flaggedrevs-prefs-stable' => '{{Flagged Revs}}',
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
	'review-logentry-app' => '{{Flagged Revs}}',
	'review-logentry-dis' => '{{Flagged Revs}}',
	'review-logentry-id' => '{{Flagged Revs}}',
	'review-logentry-diff' => '{{Flagged Revs}}',
	'review-logpage' => '{{Flagged Revs}}',
	'review-logpagetext' => '{{Flagged Revs}}',
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
	'revreview-basic' => '{{Flagged Revs}}',
	'revreview-basic-i' => '{{Flagged Revs}}',
	'revreview-basic-old' => '{{Flagged Revs}}',
	'revreview-basic-same' => '{{Flagged Revs}}',
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
	'revreview-main' => '{{Flagged Revs}}',
	'revreview-newest-basic' => '{{Flagged Revs}}',
	'revreview-newest-basic-i' => '{{Flagged Revs-small}}
Used in the "flagged revs box" when you are viewing the latest draft version, but when there is a sighted revision, the stable version. 

Example: [http://de.wikipedia.org/w/index.php?title=Deutsche_Sprache&stable=0 de.wikipedia].',
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


{{Identical|Submit review}}',
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
Used above the protection form to inform the sysop that the page has a stable version.',
	'right-autopatrolother' => '{{Flagged Revs}}

{{doc-right}}',
	'right-autoreview' => '{{Flagged Revs}}

{{doc-right}}',
	'right-movestable' => '{{Flagged Revs}}

{{doc-right}}',
	'right-review' => '{{Flagged Revs}}

{{doc-right}}',
	'right-stablesettings' => '{{Flagged Revs}}

{{doc-right}}',
	'right-validate' => '{{Flagged Revs}}

{{doc-right}}',
	'rights-editor-autosum' => '{{Flagged Revs}}',
	'rights-editor-revoke' => '{{Flagged Revs}}',
	'specialpages-group-quality' => '{{Flagged Revs-small}}
A group in [[Special:SpecialPages]] for all special pages of the Flagged Revs extension.',
	'stable-logentry' => '{{Flagged Revs}}',
	'stable-logentry2' => '{{Flagged Revs}}',
	'stable-logpage' => '{{Flagged Revs}}',
	'stable-logpagetext' => '{{Flagged Revs}}',
	'readerfeedback-submit' => '{{Identical/Submit}}',
	'readerfeedback-submitting' => '{{flaggedrevs}}
{{identical|submitting}}',
	'revreview-filter-all' => '{{Flagged Revs}}
{{Identical|All}}',
	'revreview-filter-approved' => '{{Flagged Revs}}',
	'revreview-filter-reapproved' => '{{Flagged Revs}}',
	'revreview-filter-unapproved' => '{{Flagged Revs}}',
	'revreview-filter-auto' => '{{Flagged Revs}}',
	'revreview-filter-manual' => '{{Flagged Revs}}',
	'revreview-filter-level-0' => '{{Flagged Revs}}',
	'revreview-filter-level-1' => '{{Flagged Revs}}',
	'revreview-statusfilter' => '{{Flagged Revs}}
{{Identical|Status}}',
	'revreview-typefilter' => '{{Flagged Revs}}

{{Identical/Type}}',
	'tooltip-ca-current' => '{{Flagged Revs}}',
	'tooltip-ca-stable' => '{{Flagged Revs}}',
	'tooltip-ca-default' => '{{Flagged Revs}}',
	'log-show-hide-review' => '* $1 is one of {{msg|show}} or {{msg|hide}}',
	'revreview-tt-review' => '{{Flagged Revs}}',
	'validationpage' => "{{Flagged Revs-small}}
Link to the general help page. Do ''not'' translate the <tt><nowiki>{{ns:help}}</nowiki></tt> part.",
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'editor' => 'Redakteur',
	'group-editor-member' => 'Redakteur',
	'revreview-accuracy' => 'Akkuraatheid',
	'revreview-accuracy-0' => 'Nie goedgekeur',
	'revreview-accuracy-2' => 'Akkuraat',
	'revreview-approved' => 'Goedgekeur',
	'revreview-auto' => '(outomaties)',
	'revreview-log' => 'Opmerking:',
	'revreview-patrol' => 'Merk die wysiging as gepatrolleer',
	'revreview-patrol-title' => 'Merk as gepatrolleer',
	'revreview-toggle-title' => 'wys/versteek details',
	'revreview-revnotfound' => 'Die ou weergawe wat jy aangevra het kon nie gevind word nie. Gaan asseblief die URL na wat jy gebruik het.',
	'revreview-filter-all' => 'Alles',
	'revreview-statusfilter' => 'Status:',
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
	'flaggedrevs-prefs' => 'Estabilidat',
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
	'revreview-basic' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|superbisata]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambeo|cambeos}}] asperando una rebisión.',
	'revreview-basic-i' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|superbisata]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios en plantillas/imachens] asperando una rebisión.',
	'revreview-basic-old' => 'Ista ye una bersión [[{{MediaWiki:Validationpage}}|superbisata]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrat todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
Puet estar que bi aiga [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} nuebos cambios].',
	'revreview-basic-same' => 'Esta ye a zaguera rebisión [[{{MediaWiki:Validationpage}}|superbisata]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.',
	'revreview-basic-source' => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bersión superbisata] d'ista pachina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>, ye estata basata en esta bersión.",
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
	'revreview-newest-basic' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión superbisata] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambeo|cambeos}}] {{PLURAL:$3|amenista|amenistan}} una rebisión.',
	'revreview-newest-basic-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión superbisata] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Bels cambeos en a plantillas u imáchens] amenistan una rebisión.',
	'revreview-newest-quality' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión de calidat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambeo|cambeos}}] {{PLURAL:$3|amenista|amenistan}} una rebisión.',
	'revreview-newest-quality-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión de calidat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Bels cambeos en plantillas u imáchens] amenistan una rebisión.',
	'revreview-noflagged' => "No bi ha garra bersión rebisata d'ista pachina, y por ixo a calidat d'ista pachina talment '''no''' ye estata [[{{MediaWiki:Validationpage}}|abaluata]].",
	'revreview-note' => '[[User:$1|$1]] ha feito as siguients notas mientres [[{{MediaWiki:Validationpage}}|rebisaba]] ista bersión:',
	'revreview-notes' => "Obserbazions u notas t'amostrar:",
	'revreview-oldrating' => 'A calificazión ye:',
	'revreview-patrol' => 'Siñalar iste cambio como patrullato',
	'revreview-patrol-title' => 'Siñalar como patrullato',
	'revreview-patrolled' => "A bersión trigata de [[:$1|$1]] s'ha siñalata como patrullata.",
	'revreview-quality' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambeo|cambeos}}] asperando una rebisión.',
	'revreview-quality-i' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambeos en plantillas u imáchens] asperando una rebisión.',
	'revreview-quality-old' => "Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
S'han feito nuebos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambeos].",
	'revreview-quality-same' => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.',
	'revreview-quality-source' => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bersión de calidat] d'ista pachina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>, s'ha basato en ista bersión.",
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
	'revreview-successful' => "'''S'ha siñalato a bersión trigata de [[:$1|$1]]. ([{{fullurl:Special:Stableversions|page=$2}} amostrar todas as bersions siñalatas])'''",
	'revreview-successful2' => "'''S'ha sacato o siñal d'as bersions trigatas de [[:$1|$1]]'''",
	'revreview-text' => "''As pachinas de conteniu que s'amuestran por defeuto son as [[{{MediaWiki:Validationpage}}|bersions estables]] en cuenta de as zagueras bersions.''",
	'revreview-text2' => "As ''[[{{MediaWiki:Validationpage}}|bersions estables]] son bersions d'as pachinas que s'han comprebato y son o conteniu que s'amuestra por defeuto en os bisualizadors.''",
	'revreview-toggle-title' => 'amostrar/amagar detalles',
	'revreview-toolow' => 'Ta que a bersión se considere rebisata ha d\'abaluar toz os atribtos que s\'amuestran en o cobaixo con una calificazión mayor de "no aprebato". Ta depreziar a bersión, meta "no aprebato" en toz os campos.',
	'revreview-update' => "Por fabor [[{{MediaWiki:Validationpage}}|rebise]] os cambios ''(que s'amuestran en o cobaixo)'' feitos dende que s'aprebó a [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bersión estable].<br />
'''S'han esbiellato bellas plantillas/imáchens:'''",
	'revreview-update-includes' => "'''S'han esbiellato bellas plantillas u imáchens:'''",
	'revreview-update-none' => "Por fabor [[{{MediaWiki:Validationpage}}|rebise]] os cambeos ''(que s'amuestran en o cobaixo)'' feitos dende que s'aprebó a [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bersión estable].",
	'revreview-update-use' => "'''PARE CUENTA:''' Si beluna d'istas plantillas u imáchens tiene un bersión estable, s'emplegarán istas en a bersión estable d'a pachina.",
	'revreview-diffonly' => "''Ta rebisar as pachinas, punche en o binclo \"bersión autual\" y faiga serbir o formulario de rebisión.''",
	'revreview-visibility' => "'''Ista pachina tiene una [[{{MediaWiki:Validationpage}}|bersión estable]]; A suya confegurazión puede cambiar-se [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} aquí].'''",
	'revreview-revnotfound' => "No se pudo trobar a bersión antiga d'a pachina demandata.
Por fabor, rebise l'adreza que fazió serbir t'aczeder á ista pachina.",
	'right-autopatrolother' => "Siñalar automaticament como patrullatas as rebisions difuera d'o espazio de nombres prenzipal",
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
	'revreview-filter-level-0' => 'Bersions superbisatas',
	'revreview-filter-level-1' => 'Bersions de calidat',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Mena:',
	'tooltip-ca-current' => "Amostrar o borrador autual d'ista pachina",
	'tooltip-ca-stable' => "Amostrar a bersión estable d'ista pachina",
	'tooltip-ca-default' => "Opzions d'aseguranza d'a calidat",
	'revreview-tt-review' => 'Rebisar ista pachina',
	'validationpage' => "{{ns:help}}:Balidazión d'articlo",
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 * @author Ouda
 */
$messages['ar'] = array(
	'editor' => 'محرر',
	'flaggedrevs' => 'مراجعات معلمة',
	'flaggedrevs-backlog' => "يوجد حاليا سجل تأخر في [[Special:OldReviewedPages|الصفحات المراجعة القديمة]]. '''انتباهك مطلوب!'''",
	'flaggedrevs-desc' => 'يعطي المحررين/المراجعين القدرة على التأكد من صحة النسخ وتثبيت الصفحات',
	'flaggedrevs-pref-UI-0' => 'استخدم واجهة مستخدم لنسخة مستقرة مفصلة',
	'flaggedrevs-pref-UI-1' => 'استخدم واجهة مستخدم لنسخة مستقرة بسيطة',
	'flaggedrevs-prefs' => 'استقرار',
	'flaggedrevs-prefs-stable' => 'دائما اعرض النسخة المستقرة لصفحات المحتوى افتراضيا (لو كانت هناك واحدة)',
	'flaggedrevs-prefs-watch' => 'أضف الصفحات التي أراجعها إلى قائمة مراقبتي',
	'group-editor' => 'محررون',
	'group-editor-member' => 'محرر',
	'group-reviewer' => 'مراجعون',
	'group-reviewer-member' => 'مراجع',
	'grouppage-editor' => '{{ns:project}}:محرر',
	'grouppage-reviewer' => '{{ns:project}}:مراجع',
	'hist-draft' => 'مراجعة مسودة',
	'hist-quality' => 'مراجعة جودة',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} تم التحقق منها] بواسطة [[User:$3|$3]]',
	'hist-stable' => 'مراجعة منظورة',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} تم نظرها] بواسطة [[User:$3|$3]]',
	'review-diff2stable' => 'عرض التغييرات بين المراجعتين المستقرة والحالية',
	'review-logentry-app' => 'راجع $1',
	'review-logentry-dis' => 'أزال نسخة من $1',
	'review-logentry-id' => 'رقم النسخة $1',
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
	'revreview-basic' => 'هذه هي آخر مراجعة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] بانتظار المراجعة.',
	'revreview-basic-i' => 'هذه هي أحدث مراجعة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-basic-old' => 'هذه مراجعة [[{{MediaWiki:Validationpage}}|منظورة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-basic-same' => 'هذه هي آخر مراجعة [[{{MediaWiki:Validationpage}}|منظورة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل])، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة منظورة] من هذه الصفحة، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>، بناء على هذه المراجعة.',
	'revreview-changed' => "'''الفعل المطلوب لم يمكن إجراؤه على هذه المراجعة من [[:$1|$1]].'''

قالب أو صورة ربما يكون قد تم طلبه عندما لم يتم تحديد نسخة معينة.
هذا يمكن أن يحدث لو قالب ديناميكي يضمن صورة أخرى أو قالب معتمدا على متغير تغير منذ أن بدأت
مراجعة هذه الصفحة.
تحديث الصفحة وإعادة المراجعة يمكن أن يحل هذه المشكلة.",
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة منظورة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] {{PLURAL:$3|يحتاج|يحتاج}} المراجعة.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة منظورة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة جودة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] {{PLURAL:$3|يحتاج|يحتاج}} المراجعة.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة جودة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-noflagged' => "لا توجد مراجعة مراجعة لهذه الصفحة، لذا ربما '''لا''' تكون قد تم 
[[{{MediaWiki:Validationpage}}|التحقق من]] جودتها.",
	'revreview-note' => '[[User:$1|$1]] كتب الملاحظات التالية [[{{MediaWiki:Validationpage}}|عند مراجعة]] هذه المراجعة:',
	'revreview-notes' => 'الملاحظات للعرض:',
	'revreview-oldrating' => 'تم تقييمها ك:',
	'revreview-patrol' => 'علم على هذا التغيير كمراجع',
	'revreview-patrol-title' => 'علم كمراجعة',
	'revreview-patrolled' => 'المراجعة المختارة من [[:$1|$1]] تم التعليم عليها كمراجعة.',
	'revreview-quality' => 'هذه هي آخر مراجعة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] بانتظار المراجعة.',
	'revreview-quality-i' => 'هذه هي أحدث مراجعة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-quality-old' => 'هذه مراجعة [[{{MediaWiki:Validationpage}}|جودة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-quality-same' => 'هذه هي آخر مراجعة [[{{MediaWiki:Validationpage}}|جودة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل])، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة جودة] من هذه الصفحة، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>، بناء على هذه المراجعة.',
	'revreview-quality-title' => 'صفحة الجودة',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|صفحة منظورة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-basic-old' => "[[{{MediaWiki:Validationpage}}|صفحة منظورة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|صفحة منظورة]]'''",
	'revreview-quick-invalid' => "'''رقم مراجعة غير صحيح'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|المراجعة الحالية]]''' (غير مراجعة)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|صفحة الجودة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|صفحة الجودة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|صفحة الجودة]]'''",
	'revreview-quick-see-basic' => "'''مسودة''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} عرض الصفحة]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} مقارنة])",
	'revreview-quick-see-quality' => "'''مسودة''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} عرض الصفحة]]
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
	'revreview-successful' => "'''مراجعة [[:$1|$1]] تم التعليم عليها بنجاح. ([{{fullurl:Special:Stableversions|page=$2}} عرض النسخ المستقرة])'''",
	'revreview-successful2' => "'''مراجعة [[:$1|$1]] تمت إزالة علمها بنجاح.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هي محتوى الصفحة الافتراضي للمشاهدين بدلا من أحدث مراجعة.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هي مراجعات تم التحقق منها من الصفحات ويمكن ضبطها كالمحتوى الافتراضي للمشاهدين.''",
	'revreview-toggle-title' => 'عرض/إخفاء التفاصيل',
	'revreview-toolow' => 'يجب عليك على الأقل تقييم كل من المحددات بالأسفل أعلى من "غير مقبولة" لكي تعتبر المراجعة مراجعة.
لسحب تقييم مراجعة، اضبط كل الحقول ك "غير مقبولة".',
	'revreview-update' => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ المراجعة المستقرة تمت  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].<br />
'''بعض القوالب/الصور تم تحديثها: '''",
	'revreview-update-includes' => "'''بعض القوالب/الصور تم تحديثها:'''",
	'revreview-update-none' => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ المراجعة المستقرة تمت  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].",
	'revreview-update-use' => "'''ملاحظة:''' لو أن أي من هذه القوالب/الصور لديها نسخة مستقرة، إذا فهي مستخدمة بالفعل في النسخة المستقرة لهذه الصفحة.",
	'revreview-diffonly' => "''لمراجعة الصفحة، اضغط على وصلة مراجعة \"المراجعة الحالية\" واستخدم استمارة المراجعة.''",
	'revreview-visibility' => "'''هذه الصفحة بها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]] محدثة؛ إعدادات استقرار الصفحة يمكن [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'revreview-visibility2' => "'''هذه الصفحة ليس لديها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]] محدثة؛ إعدادات استقرار الصفحة يمكن [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'revreview-revnotfound' => 'لم يتم العثور على المراجعة القديمة من الصفحة التي طلبتها.
من فضلك تأكد من المسار الذي دخلت به إلى هذه الصفحة.',
	'right-autopatrolother' => 'التعليم تلقائيا على المراجعات في النطاقات غير الرئيسية كمراجعة',
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
	'readerfeedback' => 'ماذا تظن بهذه الصفحة؟',
	'readerfeedback-text' => "''من فضلك دقيقة لتقييم هذه الصفحة بالأسفل. تعليقك قيم ويساعدنا في تحسين موقعنا.''",
	'readerfeedback-reliability' => 'الاعتمادية',
	'readerfeedback-completeness' => 'الاكتمال',
	'readerfeedback-npov' => 'الحيادية',
	'readerfeedback-presentation' => 'التقديم',
	'readerfeedback-overall' => 'إجمالي',
	'readerfeedback-level-none' => '(غير متأكد)',
	'readerfeedback-level-0' => 'فقير',
	'readerfeedback-level-1' => 'منخفض',
	'readerfeedback-level-2' => 'معقول',
	'readerfeedback-level-3' => 'عالي',
	'readerfeedback-level-4' => 'ممتاز',
	'readerfeedback-submit' => 'تنفيذ',
	'readerfeedback-main' => 'فقط صفحات المحتوى يمكن تقييمها.',
	'readerfeedback-success' => "'''شكرا لك لمراجعة هذه الصفحة!'''. ([$3 تعليقات أو أسئلة؟]).",
	'readerfeedback-voted' => "'''يبدو أنك قيمت هذه الصفحة بالفعل.'''. ([$3 تعليقات أو أسئلة؟]).",
	'readerfeedback-submitting' => 'جاري التنفيذ...',
	'readerfeedback-finished' => 'شكرا لك!',
	'revreview-filter-all' => 'الكل',
	'revreview-filter-approved' => 'تمت الموافقة عليها',
	'revreview-filter-reapproved' => 'تكررت الموافقة عليها',
	'revreview-filter-unapproved' => 'غير موافق عليها',
	'revreview-filter-auto' => 'تلقائي',
	'revreview-filter-manual' => 'يدوي',
	'revreview-filter-level-0' => 'نسخ منظورة',
	'revreview-filter-level-1' => 'نسخ جودة',
	'revreview-statusfilter' => 'الحالة:',
	'revreview-typefilter' => 'النوع:',
	'revreview-tagfilter' => 'وسم:',
	'revreview-reviewlink' => 'مراجعة',
	'tooltip-ca-current' => 'عرض المسودة الحالية لهذه الصفحة',
	'tooltip-ca-stable' => 'عرض النسخة المستقرة لهذه الصفحة',
	'tooltip-ca-default' => 'إعدادات توكيد الجودة',
	'tooltip-ca-ratinghist' => 'تقييمات القراء لهذه الصفحة',
	'revreview-locked' => 'التعديلات يجب أن تتم مراجعتها قبل أن يتم عرضها في هذه الصفحة!',
	'revreview-unlocked' => 'التعديلات لا تتطلب مراجعة قبل أن يتم عرضها في هذه الصفحة!',
	'log-show-hide-review' => '$1 سجل المراجعة',
	'revreview-tt-review' => 'راجع هذه الصفحة',
	'validationpage' => '{{ns:help}}:تحقيق الصفحة',
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
	'flaggedrevs-prefs' => 'استقرار',
	'flaggedrevs-prefs-stable' => 'دايما اعرض النسخة المستقرة لصفحات المحتوى افتراضيا (لو فى هناك واحدة)',
	'flaggedrevs-prefs-watch' => 'ضيف الصفحات اللى أراجعها للستة مراقبتى',
	'group-editor' => 'محررين',
	'group-editor-member' => 'محرر',
	'group-reviewer' => 'مراجعين',
	'group-reviewer-member' => 'مراجع',
	'grouppage-editor' => '{{ns:project}}:محرر',
	'grouppage-reviewer' => '{{ns:project}}:مراجع',
	'hist-draft' => 'مراجعة مسودة',
	'hist-quality' => 'مراجعة جودة',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} اتأكدت] بواسطة [[User:$3|$3]]',
	'hist-stable' => 'مراجعة منظورة',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} تم نظرها] بواسطة [[User:$3|$3]]',
	'review-diff2stable' => 'عرض التغييرات بين المراجعتين المستقرة والحالية',
	'review-logentry-app' => 'راجع $1',
	'review-logentry-dis' => 'أزال نسخة من $1',
	'review-logentry-id' => 'رقم النسخة $1',
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
	'revreview-basic' => 'هذه هى آخر مراجعة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] بانتظار المراجعة.',
	'revreview-basic-i' => 'هذه هى أحدث مراجعة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-basic-old' => 'هذه مراجعة [[{{MediaWiki:Validationpage}}|منظورة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-basic-same' => 'هذه هى آخر مراجعة [[{{MediaWiki:Validationpage}}|منظورة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل])، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة منظورة] من هذه الصفحة، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>، بناء على هذه المراجعة.',
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة منظورة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] {{PLURAL:$3|يحتاج|يحتاج}} المراجعة.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة منظورة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة جودة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] {{PLURAL:$3|يحتاج|يحتاج}} المراجعة.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر مراجعة جودة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-noflagged' => "لا توجد مراجعة مراجعة لهذه الصفحة، لذا ربما '''لا''' تكون قد تم 
[[{{MediaWiki:Validationpage}}|التحقق من]] جودتها.",
	'revreview-note' => '[[User:$1|$1]] كتب الملاحظات التالية [[{{MediaWiki:Validationpage}}|عند مراجعة]] هذه المراجعة:',
	'revreview-notes' => 'الملاحظات للعرض:',
	'revreview-oldrating' => 'تم تقييمها ك:',
	'revreview-patrol' => 'علم على هذا التغيير كمراجع',
	'revreview-patrol-title' => 'علم كمراجعة',
	'revreview-patrolled' => 'المراجعة المختارة من [[:$1|$1]] تم التعليم عليها كمراجعة.',
	'revreview-quality' => 'هذه هى آخر مراجعة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغيير|تغيير}}] بانتظار المراجعة.',
	'revreview-quality-i' => 'هذه هى أحدث مراجعة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-quality-old' => 'هذه مراجعة [[{{MediaWiki:Validationpage}}|جودة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-quality-same' => 'هذه هى آخر مراجعة [[{{MediaWiki:Validationpage}}|جودة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل])، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة جودة] من هذه الصفحة، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] فى <i>$2</i>، بناء على هذه المراجعة.',
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
	'revreview-successful' => "'''مراجعة [[:$1|$1]] تم التعليم عليها بنجاح. ([{{fullurl:Special:Stableversions|page=$2}} عرض النسخ المستقرة])'''",
	'revreview-successful2' => "'''مراجعة [[:$1|$1]] تمت إزالة علمها بنجاح.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هى محتوى الصفحة الافتراضى للمشاهدين بدلا من أحدث مراجعة.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هى مراجعات تم التحقق منها من الصفحات ويمكن ضبطها كالمحتوى الافتراضى للمشاهدين.''",
	'revreview-toggle-title' => 'عرض/إخفاء التفاصيل',
	'revreview-toolow' => 'يجب عليك على الأقل تقييم كل من المحددات بالأسفل أعلى من "غير مقبولة" لكى تعتبر المراجعة مراجعة.
لسحب تقييم مراجعة، اضبط كل الحقول ك "غير مقبولة".',
	'revreview-update' => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ المراجعة المستقرة تمت  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].<br />
'''بعض القوالب/الصور تم تحديثها: '''",
	'revreview-update-includes' => "'''بعض القوالب/الصور تم تحديثها:'''",
	'revreview-update-none' => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ المراجعة المستقرة تمت  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].",
	'revreview-update-use' => "'''ملاحظة:''' لو أن أى من هذه القوالب/الصور لديها نسخة مستقرة، إذا فهى مستخدمة بالفعل فى النسخة المستقرة لهذه الصفحة.",
	'revreview-diffonly' => "''لمراجعة الصفحة، اضغط على وصلة مراجعة \"المراجعة الحالية\" واستخدم استمارة المراجعة.''",
	'revreview-visibility' => "'''هذه الصفحة بها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]] محدثة؛ إعدادات استقرار الصفحة يمكن [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'revreview-visibility2' => "'''هذه الصفحة ليس لديها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]] محدثة؛ إعدادات استقرار الصفحة يمكن [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'revreview-revnotfound' => 'ما لقيناش النسخة القديمة من الصفحة اللى طلبتها.
لو سمحت تتأكد من اليوأرإل اللى دخلت بيه للصفحة دي.',
	'right-autopatrolother' => 'التعليم تلقائيا على المراجعات فى النطاقات غير الرئيسية كمراجعة',
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
	'readerfeedback' => 'ماذا تظن بهذه الصفحة؟',
	'readerfeedback-text' => "''من فضلك دقيقة لتقييم هذه الصفحة بالأسفل. تعليقك قيم ويساعدنا فى تحسين موقعنا.''",
	'readerfeedback-reliability' => 'الاعتمادية',
	'readerfeedback-completeness' => 'الاكتمال',
	'readerfeedback-npov' => 'الحيادية',
	'readerfeedback-presentation' => 'التقديم',
	'readerfeedback-overall' => 'إجمالى',
	'readerfeedback-level-none' => '(مش متأكد)',
	'readerfeedback-level-0' => 'فقير',
	'readerfeedback-level-1' => 'منخفض',
	'readerfeedback-level-2' => 'معقول',
	'readerfeedback-level-3' => 'عالى',
	'readerfeedback-level-4' => 'ممتاز',
	'readerfeedback-submit' => 'تنفيذ',
	'readerfeedback-main' => 'فقط صفحات المحتوى يمكن تقييمها.',
	'readerfeedback-success' => "'''شكرا لك لمراجعة هذه الصفحة!'''. ([$3 تعليقات أو أسئلة؟]).",
	'readerfeedback-voted' => "'''يبدو أنك قيمت هذه الصفحة بالفعل.'''. ([$3 تعليقات أو أسئلة؟]).",
	'readerfeedback-submitting' => 'جارى التنفيذ...',
	'readerfeedback-finished' => 'شكرا لك!',
	'revreview-filter-all' => 'الكل',
	'revreview-filter-approved' => 'تمت الموافقة عليها',
	'revreview-filter-reapproved' => 'تكررت الموافقة عليها',
	'revreview-filter-unapproved' => 'غير موافق عليها',
	'revreview-filter-auto' => 'تلقائى',
	'revreview-filter-manual' => 'يدوى',
	'revreview-filter-level-0' => 'نسخ منظورة',
	'revreview-filter-level-1' => 'نسخ جودة',
	'revreview-statusfilter' => 'الحالة:',
	'revreview-typefilter' => 'النوع:',
	'revreview-tagfilter' => 'وسم:',
	'revreview-reviewlink' => 'مراجعه',
	'tooltip-ca-current' => 'عرض المسودة الحالية لهذه الصفحة',
	'tooltip-ca-stable' => 'عرض النسخة المستقرة لهذه الصفحة',
	'tooltip-ca-default' => 'إعدادات توكيد الجودة',
	'tooltip-ca-ratinghist' => 'تقييمات القراء لهذه الصفحة',
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
	'flaggedrevs-prefs' => 'Estabilidá',
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
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada]'l <i>$2</i>. El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador]
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
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} llistar toes]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobóse]'l
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambéu|cambeos}}] {{PLURAL:$3|necesita|necesiten}} revisión.",
	'revreview-newest-quality' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} cabera revisión calidable]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} llistar toes]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobóse]'l
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambéu|cambeos}}] {{PLURAL:$3|necesita|necesiten}} revisión.",
	'revreview-noflagged' => "Nun hai revisiones revisaes d'esta páxina, polo que seique '''nun'''' tea
[[{{MediaWiki:Validationpage}}|comprobada]] la so calidá.",
	'revreview-note' => '[[User:$1|$1]] fizo les siguientes notes al [[{{MediaWiki:Validationpage}}|revisar]] esta revisión:',
	'revreview-notes' => "Observaciones o notes p'amosar:",
	'revreview-oldrating' => 'Foi calificáu:',
	'revreview-patrol' => 'Marcar esti cambéu como supervisáu',
	'revreview-patrolled' => 'La revisión seleicionada de [[:$1|$1]] marcóse como supervisada.',
	'revreview-quality' => "Esta ye la cabera [[{{MediaWiki:Validationpage}}|quality]] revisión,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada]'l <i>$2</i>. El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador]
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
	'revreview-update' => "Por favor [[{{MediaWiki:Validationpage}}|revisa]] tolos cambeos ''(amosaos embaxo)'' fechos dende que la revisión estable foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada].<br />
'''Actualizáronse delles plantíes/imáxenes:'''",
	'revreview-update-includes' => "'''Actualizáronse dalgunes plantíes/imáxenes:'''",
	'revreview-update-none' => "Por favor [[{{MediaWiki:Validationpage}}|revisa]] tolos cambeos ''(amosaos embaxo)'' fechos dende que la versión estable foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada].",
	'revreview-visibility' => "'''Esta páxina tien una [[{{MediaWiki:Validationpage}}|versión estable]]; los sos parámetros puen ser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configuraos].'''",
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
	'readerfeedback' => "¿Qué camientes d'esta páxina?",
	'readerfeedback-reliability' => 'Fiabilidá',
	'readerfeedback-npov' => 'Neutralidá',
	'readerfeedback-presentation' => 'Presentación',
	'readerfeedback-main' => 'Namái se puen calificar les páxines de conteníu.',
	'readerfeedback-finished' => '¡Gracies!',
	'revreview-filter-manual' => 'Manual',
	'revreview-typefilter' => 'Triba:',
	'revreview-tagfilter' => 'Etiqueta:',
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
	'flaggedrevs-prefs' => 'ثبات',
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
	'revreview-successful' => "'''انتخابی بازبینی [[:$1|$1]]گون موفقیت نشان بوت. ([{{fullurl:Special:Stableversions|page=$2}} بچار کل نسخ نشان بوتگینء])'''",
	'revreview-successful2' => "'''انتخاب بوتگین باز بینی [[:$1|$1]] گون موفقیت بی نشان بوت.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|نسخ ثابت]] پیشفرضین محتوای صفحه په چاروکاننت دات نوکین بازبینی آن..''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}ثابت نسخه]]بازبینی آن صفحات چک بیتنت و توننت به عنوان محتوای پیش فرض په بینندگان تنظیم بنت.''",
	'revreview-toggle-title' => 'پیش دار/پناه کن جزییاتء',
	'revreview-toolow' => 'شما بایدن حداقل هر یکی چه جهلگین نشانانء درجه بللیت گیشتر چه "unapproved" تا یک بازبینیء په داب چارتگین بیت.
په نسخ کتن یک بازبینی کل فیلدانء په داب "unapproved" نشان کن.',
	'revreview-update-includes' => "'''لهتی تمپلتان/تصاویر په روچ بیتگین:'''",
	'revreview-update-use' => "'''توجه:''' اگر هر یکی چه ای تمپلتان/تصاویر یک ثابتین نسخه ای هست،اچه آیی الان ته نسخه ثابت ای صفحه کامرز بیت.",
	'revreview-revnotfound' => 'کدیمی بازبینی چه ای صفحه که شما لوٹیت ودیگ نه بوت. لطفا URL که شما په رستن په ای صفحه استفاده کنیت کنترلی کنیت.',
	'right-autopatrolother' => 'اتوماتیکی نشان بونت بازبینی آن ته نام فضایانء نظارتی',
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
	'readerfeedback' => 'نظرات وانوکان',
	'readerfeedback-text' => "''لطفا کمی وهد بلیت و ای صفحهء درجه بندی کنیت. شمی نظرات ارزشمنت و په شربوتن می وبسایت ماراء کمک کننت.''",
	'readerfeedback-reliability' => 'اعتبار',
	'readerfeedback-completeness' => 'کامل بوتن',
	'readerfeedback-npov' => 'بی طرفی',
	'readerfeedback-presentation' => 'ارايه',
	'readerfeedback-overall' => 'درکل',
	'readerfeedback-level-0' => 'ضعیف',
	'readerfeedback-level-1' => 'کم',
	'readerfeedback-level-2' => 'قابل قبول',
	'readerfeedback-level-3' => 'بالاد',
	'readerfeedback-level-4' => 'عالی',
	'readerfeedback-submit' => 'دیم دی',
	'readerfeedback-main' => 'فقط صفحات محتوا توننت بازبینی بنت.',
	'revreview-filter-all' => 'کل',
	'revreview-filter-approved' => 'تایید',
	'revreview-filter-reapproved' => 'دگه تایید بوت',
	'revreview-filter-unapproved' => 'تایید نه بوتگین',
	'revreview-filter-auto' => 'اتوماتیک',
	'revreview-filter-manual' => 'دستی',
	'revreview-filter-level-0' => 'نسخ کهنه',
	'revreview-filter-level-1' => 'نسخ کیفیت',
	'revreview-statusfilter' => 'وضعیت:',
	'revreview-typefilter' => 'نوع:',
	'revreview-tagfilter' => 'برچسپ:',
	'tooltip-ca-current' => 'به گند هنوکین پیش نویس ای صفحهء',
	'tooltip-ca-stable' => 'به گند نسخه ثابت ای صفحهء',
	'tooltip-ca-default' => 'تنضیمات اطمینان کیفیت',
	'tooltip-ca-ratinghist' => 'درجات وانوکان ای صفحه',
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
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'revreview-log' => 'Камэнтар:',
	'revreview-revnotfound' => 'Ранейшая вэрсія гэтай старонкі ня знойдзеная. Праверце спасылку, празь якую Вы спрабавалі перайсьці на гэтую старонку.',
	'revreview-statusfilter' => 'Статус:',
);

/** Bulgarian (Български)
 * @author Borislav
 * @author DCLXVI
 */
$messages['bg'] = array(
	'editor' => 'Редактор',
	'flaggedrevs-desc' => 'Дава възможността на редактори/рецензенти да одобряват версии и да определят страници като устойчиви',
	'flaggedrevs-prefs' => 'Устойчивост',
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
	'readerfeedback' => 'Какво мислите за тази страница?',
	'readerfeedback-level-none' => '(избиране)',
	'readerfeedback-submit' => 'Изпращане',
	'readerfeedback-submitting' => 'Изпращане...',
	'readerfeedback-finished' => 'Благодарим ви!',
	'revreview-filter-all' => 'Всички',
	'revreview-filter-auto' => 'Автоматично',
	'revreview-filter-manual' => 'Ръчно',
	'revreview-statusfilter' => 'Статут:',
	'revreview-typefilter' => 'Тип:',
	'revreview-tagfilter' => 'Етикет:',
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
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} সমস্ত তালিকা])  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} অনুমোদিত] হয়েছে
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
	'flaggedrevs-prefs' => 'مقاومت',
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
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید وابیده]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش ‌نویس]
قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} اصلاح] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}]
نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-basic-i' => 'ای چدید‌ترین نسخه [[{{MediaWiki:Validationpage}}|بررسی وابیده]] است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید وابیده].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش ‌نویس] دارای [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییراتی در قالبها/تصویرها] است که هنی بازبینی نوابیدنه.',
	'revreview-basic-old' => 'ای یه نسخه [[{{MediaWiki:Validationpage}}|بررسی وابیده]] است([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} نشودادن همه])، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید وابیده].
ممکنه   [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییرات] جدیدی اتفاق افتاده وابیده',
	'revreview-basic-same' => 'ای آخرین نسخه [[{{MediaWiki:Validationpage}}|بررسی وابیده]] ‌است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید وابیده] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} لیست کامل]).',
	'revreview-basic-source' => 'یه [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخه بررسی وابیده] زه ای صفحه، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید وابیده] در <i>$2</i>، بر مبنای ای نسخه ایجاد وابیده.',
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
	'review-logentry-app' => 'Reizhet [[$1]]',
	'review-logentry-dis' => "Stumm dic'hizet eus [[$1]]",
	'review-logentry-id' => 'Stumm ID $1',
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
	'revreview-basic' => "Setu ar [[{{MediaWiki:Validationpage}}|stumm diwezhañ gwelet]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gant ar [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouilhed] ez eus [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|c'hemm|kemm}}] a c'hortoz bezañ adwelet.",
	'revreview-basic-old' => "Hemañ zo ur stumm bet [[{{MediaWiki:Validationpage}}|gwelet]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Kemmoù] nevez zo bet graet.",
	'revreview-basic-same' => "Setu an diwezhañ stumm bet [[{{MediaWiki:Validationpage}}|adwelet]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gallout a ra ar bajenn bezañ '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} kemmet]'''.",
	'revreview-basic-source' => "Ur [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} stumm gwelet] eus ar bajenn-mañ, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>, eo bet diazezet er-maez eus ar stumm-mañ.",
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
	'revreview-newest-basic' => "An [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} adweladenn gwelet da ziwezhañ] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} diskouez an holl]) a oa [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|kemm|kemm}}] {{PLURAL:$3|a c'houlenn|a c'houlenn}} bezañ adwelet.",
	'revreview-newest-quality' => "An [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} diwezhañ stumm a-feson] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]) a oa bet [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|c'hemm|kemm}}] {{PLURAL:$3|a c'houlenn|a c'houlenn}} bezañ adwelet.",
	'revreview-noflagged' => "N'eus stumm reizhet ebet eus ar bajenn-mañ, setu marteze n'eo '''ket''' bet [[{{MediaWiki:Validationpage}}|gwiriekaet]] he ferzhioù.",
	'revreview-note' => 'Skrivet eo bet an notennoù-mañ gant [[User:$1|$1]] e-ser [[{{MediaWiki:Validationpage}}|adwelet]] ar stumm :',
	'revreview-oldrating' => 'E boentadur :',
	'revreview-patrolled' => 'Merket evel patrouilhet eo bet ar stumm diuzet eus [[:$1|$1]].',
	'revreview-quality' => "Setu an diwezhañ stumm [[{{MediaWiki:Validationpage}}|a-feson]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gant ar [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouilhed] ez eus [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|c'hemm|kemm}}] a c'hortoz bezañ adwelet.",
	'revreview-quality-old' => "Hemañ zo ur stumm [[{{MediaWiki:Validationpage}}|a-feson]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Kemmoù] nevez zo bet graet.",
	'revreview-quality-same' => "Setu an diwezhañ stumm [[{{MediaWiki:Validationpage}}|a-feson]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]),
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gallout a ra ar bajenn bezañ '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} kemmet]'''.",
	'revreview-quality-source' => "Ur [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} stumm a-feson] eus ar bajenn-mañ, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>, zo bet diazezet er-maez eus ar stumm-mañ.",
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
	'revreview-submit' => 'Enrollañ an adweladenn',
	'revreview-toggle-title' => 'diskouez/kuzhat munudoù',
	'revreview-update' => "Mar plij [[{{MediaWiki:Validationpage}}|adwelit]] an holl gemmoù ''(diskouezet a-is)'' bet graet abaoe ma oa bet [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] ar stumm stabil diwezhañ.

'''Hizivaet e oa bet patromoù/skeudennoù zo :'''",
	'revreview-update-none' => "Mar plij [[{{MediaWiki:Validationpage}}|adwelit]] an holl gemmoù ''(diskouezet a-is)'' bet graet abaoe ma oa bet [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] ar stumm stabil diwezhañ.",
	'revreview-revnotfound' => "N'eo ket bet kavet stumm kent ar bajenn-mañ. Gwiriit an URL lakaet ganeoc'h evit mont d'ar bajenn-mañ.",
	'rights-editor-autosum' => 'emanvet',
	'stable-logpage' => 'Marilh ar stummoù stabil',
	'tooltip-ca-current' => "Gwelet brouilhed ar bajenn-mañ evel m'emañ evit poent",
	'tooltip-ca-stable' => 'Gwelet stumm stabil ar bajenn',
	'tooltip-ca-default' => 'Arventennoù Kontrolliñ ar Berzhded',
	'validationpage' => '{{ns:help}} : Gwiriekaat ar pennad',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'editor' => 'Uređivač',
	'revreview-log' => 'Komentar:',
	'revreview-revnotfound' => 'Starija revizija ove stranice koju ste zatražili nije nađena.
Molimo Vas da provjerite URL pomoću kojeg ste pristupili ovoj stranici.',
	'readerfeedback-level-none' => '(neodlučen)',
	'readerfeedback-submit' => 'Pošalji',
	'revreview-filter-all' => 'Sve',
	'revreview-typefilter' => 'Tip:',
);

/** Catalan (Català)
 * @author Aleator
 * @author Jordi Roqué
 * @author Juanpabl
 * @author Paucabot
 * @author SMP
 * @author Toniher
 */
$messages['ca'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Revisions senyalades',
	'flaggedrevs-backlog' => "Bi ha un rechistro de fainas rezagatas en a [[Special:OldReviewedPages|lista de pachinas biellas rebisatas]]. '''Se i requiere o suyo ficazio'''",
	'flaggedrevs-desc' => "Dóna als editors/revisors l'habilitat de validar revisions de pàgines i declarar-les estables.",
	'flaggedrevs-prefs' => 'Estabilitat',
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
	'review-logentry-app' => '[[$1]] revisat',
	'review-logentry-diff' => "dif a l'estable",
	'review-logpage' => 'Registre de revisió',
	'reviewer' => 'Supervisor',
	'revisionreview' => 'Revisa les revisions',
	'revreview-approved' => 'Aprovat',
	'revreview-auto' => '(automàtic)',
	'revreview-auto-w' => "Esteu modificant una revisio estable; els canvis seran '''revisats automàticament'''.",
	'revreview-auto-w-old' => "Esteu modificant una edició revisada; els canvis seran '''revisats automàticament'''.",
	'revreview-basic' => "Aquesta és l'última versió [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} versió actual] és la que pot ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|canvi|canvis}}] {{PLURAL:$3|espera|esperen}} revisió.",
	'revreview-current' => 'actual',
	'revreview-edit' => "edita l'actual",
	'revreview-flag' => 'Revisa aquesta revisió',
	'revreview-log' => 'Comentari:',
	'revreview-newest-basic' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió revisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|canvi|canvis}}] que {{PLURAL:$3|necessita|necessiten}} revisió.",
	'revreview-newest-basic-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió revisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canvis de plantilla o d'imatge] que necessiten revisió.",
	'revreview-newest-quality' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|canvi|canvis}}] que {{PLURAL:$3|necessita|necessiten}} revisió.",
	'revreview-newest-quality-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canvis de plantilla o d'imatge] que necessiten revisió.",
	'revreview-noflagged' => "No hi ha versions revisades d'aquesta pàgina i, per tant, pot '''no''' haver estat [[{{MediaWiki:Validationpage}}|comprovada]] la seva qualitat.",
	'revreview-note' => '[[User:$1|$1]] va fer les notes següents quan [[{{MediaWiki:Validationpage}}|va repassar]] aquesta revisió:',
	'revreview-oldrating' => 'Estava valorada:',
	'revreview-patrol' => 'Marca aquest canvi com a patrullat',
	'revreview-patrol-title' => 'Marca com a patrullat',
	'revreview-patrolled' => 'La revisió seleccionada de [[:$1|$1]] ha estat marcada com a patrullada.',
	'revreview-quality' => "Aquesta és l'última versió [[{{MediaWiki:Validationpage}}|de qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} versió actual] és la que pot ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|canvi|canvis}}] {{PLURAL:$3|espera|esperen}} revisió.",
	'revreview-quality-old' => "Aquesta és una revisió de [[{{MediaWiki:Validationpage}}|qualitat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} llista completa]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>.
S'hi poden haver fet [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canvis].",
	'revreview-quality-same' => 'Aquesta és la darrera revisió de [[{{MediaWiki:Validationpage}}|qualitat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} llista completa]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>.',
	'revreview-quality-title' => 'Article de qualitat',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Revisada]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vegeu la versió actual]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Article revisat]]'''",
	'revreview-quick-none' => "'''Actual'''. No hi ha versions revisades.",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Qualitat]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vegeu la versió actual]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Article de qualitat]]'''",
	'revreview-quick-see-basic' => "'''Esborrany''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vegeu l'article]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} compara])",
	'revreview-quick-see-quality' => "'''Esborrany''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vegeu l'article]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} compara])",
	'revreview-source' => "Codi de l'actual",
	'revreview-stable' => 'Pàgina estable',
	'revreview-style-1' => 'Acceptable',
	'revreview-style-2' => 'Bo',
	'revreview-submit' => 'Tramet la revisió',
	'revreview-toggle-title' => 'Mostra/amaga detalls',
	'revreview-update' => "Si us plau, [[{{MediaWiki:Validationpage}}|reviseu]] els canvis ''(indicats a sota)'' fets des que la versió estable va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].

'''Algunes plantilles o imatges han canviat:'''",
	'revreview-update-includes' => "'''Algunes plantilles o imatges han estat actualitzades:'''",
	'revreview-update-none' => "Si us plau, [[{{MediaWiki:Validationpage}}|repasseu]] els canvis ''(mostrats a continuació)'' fets des que la revisió estable va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].",
	'revreview-revnotfound' => "No s'ha pogut trobar la revisió antiga de la pàgina que demanàveu.
Reviseu l'URL que heu emprat per a accedir-hi.",
	'right-movestable' => 'Moure pàgines estables',
	'right-review' => 'Marqueu les revisions com a vistes',
	'right-stablesettings' => 'Configureu com es selecciona i mostra la versió estable',
	'rights-editor-revoke' => "tret el nivell d'editor a [[$1]]",
	'stable-logpage' => "Registre d'estabilitat",
	'readerfeedback' => "Què en penseu d'aquesta pàgina?",
	'readerfeedback-reliability' => 'Fiabilitat',
	'readerfeedback-completeness' => 'Completesa',
	'readerfeedback-npov' => 'Neutralitat',
	'readerfeedback-presentation' => 'Presentació',
	'readerfeedback-overall' => 'Global',
	'readerfeedback-level-none' => '(seleccioneu)',
	'readerfeedback-level-0' => 'Pobre',
	'readerfeedback-level-1' => 'Baix',
	'readerfeedback-level-2' => 'Just',
	'readerfeedback-level-3' => 'Alt',
	'readerfeedback-level-4' => 'Exceŀlent',
	'readerfeedback-submit' => 'Tramet',
	'readerfeedback-finished' => 'Gràcies!',
	'revreview-filter-all' => 'Tot',
	'revreview-filter-approved' => 'Aprovat',
	'revreview-filter-auto' => 'Automàtic',
	'revreview-filter-manual' => 'Manual',
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
	'flaggedrevs-prefs' => 'Stabilita',
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
	'revreview-basic' => 'Toto je poslední [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
V [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrhu]  {{PLURAL:$3|je|jsou|je}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|čekající|čekající|čekajících}} na posouzení.',
	'revreview-basic-i' => 'Toto je poslední [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Návrh] obsahuje [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny šablony/obrázku] čekající na posouzení.',
	'revreview-basic-old' => 'Toto je [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]) Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
Možná byly provedeny nové [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny].',
	'revreview-basic-same' => 'Toto je poslední  [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upravit].',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Prohlédnutá verze] této stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>, vychází z této verze.',
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední prohlédnutá verze] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|potřebuje|potřebují|potřebuje}} posoudit.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední prohlédnutá verze] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena]  <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny šablony/obrázku] čekají na posouzení.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední kvalitní verze] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|potřebuje|potřebují|potřebuje}} posoudit.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední kvalitní verze] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny šablony/obrázku] čekají na posouzení.',
	'revreview-noflagged' => 'Tato stránka nemá žádné posouzené verze, takže dosud nebyla [[{{MediaWiki:Validationpage}}|zkontrolována]] kvalita.',
	'revreview-note' => 'Uživatel [[User:$1|$1]] doplnil své [[{{MediaWiki:Validationpage}}|posouzení]] této verze následující poznámkou:',
	'revreview-notes' => 'Poznámky k zobrazení:',
	'revreview-oldrating' => 'Bylo ohodnoceno:',
	'revreview-patrol' => 'Označit tuto změnu jako prověřenou',
	'revreview-patrol-title' => 'Označit jako prověřené',
	'revreview-patrolled' => 'Vybraná verze stránky [[:$1|$1]] byla označena jako prověřená.',
	'revreview-quality' => 'Toto je poslední [[{{MediaWiki:Validationpage}}|kvalitní]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
V [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrhu]  {{PLURAL:$3|je|jsou|je}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|čekající|čekající|čekajících}} na posouzení.',
	'revreview-quality-i' => 'Toto je poslední [[{{MediaWiki:Validationpage}}|kvalitní]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Návrh] obsahuje [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny šablony/obrázku] čekající na posouzení.',
	'revreview-quality-old' => 'Toto je [[{{MediaWiki:Validationpage}}|kvalitní]] verze ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]). Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
Možná byly provedeny nové [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny].',
	'revreview-quality-same' => 'Toto je poslední  [[{{MediaWiki:Validationpage}}|kvalitní]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upravit].',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Kvalitní verze] této stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>, vychází z této verze.',
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
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Posuďte]]  všechny změny ''(zobrazené níže)'' provedené od posledního [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválení] stabilní verze.<br />
'''Některé šablony nebo obrázky byly změněny:'''",
	'revreview-update-includes' => "'''Některé šablony/obrázky se změnili:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Posuďte]] všechny změny ''(zobrazené níže)'' provedené od posledního [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválení] stabilní verze.",
	'revreview-update-use' => "'''Upozornění:''' Pokud něco z těchto šablon/obrázků má stabilní verzi, pak je ta už použita na stabilní verzi této stránky.",
	'revreview-diffonly' => "''Stránku můžete zkontrolovat po kliknutí na odkaz „aktuální revize” pomocí formuláře pro kontrolu.''",
	'revreview-visibility' => "'''Tato stránka má [[{{MediaWiki:Validationpage}}|stabilní verzi]], kterou lze [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} nastavit].'''",
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
	'readerfeedback' => 'Co si myslíte o této stránce?',
	'readerfeedback-text' => "''Věnujte prosím chvilku na ohodnocení této stránky. Oceníme vaše připomínky a pomůžou nám vylepšit stránku.''",
	'readerfeedback-reliability' => 'Hodnověrnost',
	'readerfeedback-completeness' => 'Úplnost',
	'readerfeedback-npov' => 'Nezaujatost',
	'readerfeedback-presentation' => 'Podání',
	'readerfeedback-overall' => 'Celkově',
	'readerfeedback-level-none' => '(nevím)',
	'readerfeedback-level-0' => 'slabé',
	'readerfeedback-level-1' => 'nízké',
	'readerfeedback-level-2' => 'dobré',
	'readerfeedback-level-3' => 'vysoké',
	'readerfeedback-level-4' => 'vynikající',
	'readerfeedback-submit' => 'Odeslat',
	'readerfeedback-main' => 'Hodnotit lze pouze stránky s obsahem.',
	'readerfeedback-success' => "'''Děkujeme za posouzení této stránky!''' ([$3 Máte komentář nebo otázku?])",
	'readerfeedback-voted' => "'''Zřejmě jste již tuto stránku hodnotili.'''  ([$3 Máte komentář nebo otázku?])",
	'readerfeedback-submitting' => 'Odesílá se...',
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
 * @author MF-Warburg
 * @author Melancholie
 * @author MichaelFrey
 * @author Raimond Spekking
 * @author Umherirrender
 */
$messages['de'] = array(
	'editor' => 'Sichter',
	'flaggedrevs' => 'Markierte Versionen',
	'flaggedrevs-backlog' => 'Die [[Special:OldReviewedPages|Liste der Seiten mit ungesichteten Versionen]] ist sehr lang. Bitte hilf mit, sie abzuarbeiten. Danke.',
	'flaggedrevs-desc' => 'Markierte Versionen',
	'flaggedrevs-pref-UI-0' => 'detaillierte Benutzerschnittstelle',
	'flaggedrevs-pref-UI-1' => 'einfache Benutzerschnittstelle',
	'flaggedrevs-prefs' => 'Markierte Versionen',
	'flaggedrevs-prefs-stable' => 'Zeige als Standard immer die markierte Version einer Seite (falls vorhanden)',
	'flaggedrevs-prefs-watch' => 'Selbst markierte Seiten automatisch beobachten',
	'group-editor' => 'Sichter',
	'group-editor-member' => 'Sichter',
	'group-reviewer' => 'Prüfer',
	'group-reviewer-member' => 'Prüfer',
	'grouppage-editor' => '{{ns:project}}:Sichter',
	'grouppage-reviewer' => '{{ns:project}}:Prüfer',
	'hist-draft' => 'Entwurfsversion',
	'hist-quality' => 'geprüfte Version',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} geprüft] von [[User:$3|$3]]',
	'hist-stable' => 'gesichtete Version',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} gesichtet] von [[User:$3|$3]]',
	'review-diff2stable' => 'Unterschiede zwischen der markierten und der aktuellen Version ansehen',
	'review-logentry-app' => 'markierte „[[$1]]“',
	'review-logentry-dis' => 'entfernte eine Markierung von „[[$1]]“',
	'review-logentry-id' => 'Versions-ID $1',
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
	'revreview-basic' => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|gesichtete]] Version, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Änderung steht|Änderungen stehen}}] noch zur Sichtung an.',
	'revreview-basic-i' => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|gesichtete]] Version, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
Der [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Entwurf] enthält [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen an Vorlagen/Dateien], die auf eine Sichtung warten.',
	'revreview-basic-old' => 'Dies ist eine [[{{MediaWiki:Validationpage}}|gesichtete]] Version ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} → alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
Neue [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen] können vorgenommen worden sein.',
	'revreview-basic-same' => "Dies ist die letzte [[{{MediaWiki:Validationpage}}|gesichtete]] Version, ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zeige alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>. Die Seite kann '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bearbeitet]''' werden.",
	'revreview-basic-source' => 'Eine [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} gesichtete Version] dieser Seite, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>, basiert auf dieser Version.',
	'revreview-changed' => "'''Die Aktion konnte nicht auf die Version von [[:$1|$1]] angewendet werden.'''

Eine Vorlage oder ein Bild wurden ohne spezifische Versionsnummer angefordert. Dies kann passieren, wenn eine dynamische Vorlage eine weitere Vorlage oder ein Bild einbindet, das von einer Variable abhängig ist, die sich seit Beginn der Markierung verändert hat. Ein Neuladen der Seite und erneutes Speichern der Markierung kann das Problem beheben.",
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
	'revreview-invalid' => "'''Ungültiges Ziel:''' keine [[{{MediaWiki:Validationpage}}|gesichtete]] Artikelversion der angegebenen Versions-ID.",
	'revreview-legend' => 'Inhalt der Version bewerten',
	'revreview-log' => 'Kommentar:',
	'revreview-main' => 'Du musst eine Artikelversion zur Markierung auswählen.

Siehe die [[Special:Unreviewedpages|Liste unmarkierter Versionen]].',
	'revreview-newest-basic' => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} → alle]) wurde am <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versionen}}] {{PLURAL:$3|steht|stehen}} noch zur Sichtung an.',
	'revreview-newest-basic-i' => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alle]) wurde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen an Vorlagen/Dateien] stehen noch zur Sichtung an.',
	'revreview-newest-quality' => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte geprüfte Version] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} → alle]) wurde am <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versionen}}] {{PLURAL:$3|steht|stehen}} noch zur Sichtung an.',
	'revreview-newest-quality-i' => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte geprüfte Version] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alle]) wurde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen an Vorlagen/Dateien] stehen noch zur Sichtung an.',
	'revreview-noflagged' => 'Von dieser Seite gibt es keine markierten Versionen, so dass noch keine Aussage über die [[{{MediaWiki:Validationpage}}|Qualität]] gemacht werden kann.',
	'revreview-note' => '[[User:$1|$1]] machte die folgende [[{{MediaWiki:Validationpage}}|Prüfnotiz]] zu dieser Version:',
	'revreview-notes' => 'Anzuzeigende Bemerkungen oder Notizen:',
	'revreview-oldrating' => 'Bisherige Einstufung:',
	'revreview-patrol' => 'Kontrolliere diese Änderung',
	'revreview-patrol-title' => 'Als kontrolliert markieren',
	'revreview-patrolled' => 'Die ausgewählte Version von [[:$1|$1]] wurde kontrolliert.',
	'revreview-quality' => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|geprüfte]] Version, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.

[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Änderung steht|Änderungen stehen}}] noch zur Prüfung an.',
	'revreview-quality-i' => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|geprüfte]] Version, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
Der [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Entwurf] enthält [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen an Vorlagen/Dateien], die auf eine Sichtung warten.',
	'revreview-quality-old' => 'Dies ist eine [[{{MediaWiki:Validationpage}}|geprüfte]] Version ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} → alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
Neue [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Änderungen] können vorgenommen worden sein.',
	'revreview-quality-same' => "Dies ist die letzte [[{{MediaWiki:Validationpage}}|geprüfte]] Version, ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zeige alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>. Die Seite kann '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bearbeitet]''' werden.",
	'revreview-quality-source' => 'Eine [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} geprüfte Version] dieser Seite, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>, basiert auf dieser Version.',
	'revreview-quality-title' => 'Geprüfter Seite',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Gesichtet]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zur aktuellen Version])",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Gesichtet]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} letzte unmarkierte Seite])",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Gesichtet]]'''",
	'revreview-quick-invalid' => "'''Ungültige Versions-ID'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Keine Version gesichtet.]]",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Geprüft]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zur aktuellen Version])",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Geprüft]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} letzte unmarkierte Seite])",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Geprüft]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Ungesichtete Version]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} vergleiche])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Ungesichtete Version]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} vergleiche])",
	'revreview-selected' => "Gewählte Version von '''$1:'''",
	'revreview-source' => 'Quelltext',
	'revreview-stable' => 'Artikel',
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
	'revreview-finished' => 'Markierung gesetzt.',
	'revreview-successful' => "'''Die ausgewählte Version des Artikels ''[[:$1|$1]]'' wurde erfolgreich als gesichtet markiert ([{{fullurl:Special:Stableversions|page=$2}} alle gesichteten Versionen dieses Artikels])'''.",
	'revreview-successful2' => "'''Die Markierung der Version von [[:$1|$1]] wurde erfolgreich aufgehoben.'''",
	'revreview-text' => 'Einer [[{{MediaWiki:Validationpage}}|gesichteten Version]] wird bei der Seitendarstellung der Vorzug vor einer neueren, nicht gesichteten Version gegeben.',
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Gesichtete Versionen]] können als Standardanzeige für Leser eingestellt werden.''",
	'revreview-toggle' => '(+/−)',
	'revreview-toggle-title' => 'zeige/verstecke Details',
	'revreview-toolow' => 'Du musst für jedes der untenstehenden Attribute einen Wert höher als „{{int:revreview-accuracy-0}}“ einstellen, damit eine Version als gesichtet gilt. Um eine Version zu verwerfen, müssen alle Attribute auf „{{int:revreview-accuracy-0}}“ stehen.',
	'revreview-update' => "Bitte [[{{MediaWiki:Validationpage}}|sichte]] die Änderungen ''(siehe unten)'', die seit der [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} letzten gesichteten Version] vorgenommen wurden.<br />
'''Die folgenden Vorlagen und Dateien wurden verändert:'''",
	'revreview-update-includes' => "'''Einige Vorlagen/Bilder wurden aktualisiert:'''",
	'revreview-update-none' => "Bitte [[{{MediaWiki:Validationpage}}|sichte]] die Änderungen ''(siehe unten)'', die seit der [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} letzten gesichteten Version] vorgenommen wurden.",
	'revreview-update-use' => "'''Bitte beachten:''' Falls eine dieser Vorlagen/Bilder eine gesichtete Version hat, wird diese in der gesichteten Version dieser Seite angezeigt.",
	'revreview-diffonly' => "''Um diese Seite zu sichten, klicke bitte auf den Link „Aktuelle Version“ und verwende die Sichtungsbox dort.''",
	'revreview-visibility' => "'''Diese Seite hat eine aktualisierte [[{{MediaWiki:Validationpage}}|markierte Version]]; die Anzeigeeinstellungen können [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfiguriert] werden.'''",
	'revreview-visibility2' => "'''Diese Seite hat keine aktualisierte [[{{MediaWiki:Validationpage}}|markierte Version]]; die Anzeigeeinstellungen können [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfiguriert] werden.'''",
	'revreview-revnotfound' => 'Die Version dieser Seite, nach der du suchst, konnte nicht gefunden werden. Bitte überprüfe die URL dieser Seite.',
	'right-autopatrolother' => 'Automatisches Markieren von Versionen im Nicht-Hauptnamensraum als kontrolliert',
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
	'readerfeedback' => 'Was denkst du über diese Seite?',
	'readerfeedback-text' => "''Bitte nimm dir einen Moment Zeit und bewerte diese Seite. Deine Rückmeldung ist wertvoll und hilft uns, das Angebot zu verbessern.''",
	'readerfeedback-reliability' => 'Zuverlässigkeit',
	'readerfeedback-completeness' => 'Vollständigkeit',
	'readerfeedback-npov' => 'Neutralität',
	'readerfeedback-presentation' => 'Präsentation',
	'readerfeedback-overall' => 'Insgesamt',
	'readerfeedback-level-none' => '(unsicher)',
	'readerfeedback-level-0' => 'Mangelhaft',
	'readerfeedback-level-1' => 'Ausreichend',
	'readerfeedback-level-2' => 'Befriedigend',
	'readerfeedback-level-3' => 'Gut',
	'readerfeedback-level-4' => 'Sehr gut',
	'readerfeedback-submit' => 'OK',
	'readerfeedback-main' => 'Es können nur Artikel bewertet werden.',
	'readerfeedback-success' => "'''Danke für deine Bewertung dieser Seite.'''
[$3 Kommentare oder Fragen?]",
	'readerfeedback-voted' => "'''Du hast scheinbar bereits eine Bewertung für diese Seite abgegeben.'''
[$3 Kommentare oder Fragen?]",
	'readerfeedback-submitting' => 'Übertragung …',
	'readerfeedback-finished' => 'Dankeschön!',
	'revreview-filter-all' => 'Alle',
	'revreview-filter-approved' => 'Markiert',
	'revreview-filter-reapproved' => 'Inkrementell markiert',
	'revreview-filter-unapproved' => 'Markierung entfernt',
	'revreview-filter-auto' => 'Automatisch',
	'revreview-filter-manual' => 'Manuell',
	'revreview-filter-level-0' => 'Gesichtete Versionen',
	'revreview-filter-level-1' => 'Geprüfte Versionen',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Typ:',
	'revreview-tagfilter' => 'Tag:',
	'revreview-reviewlink' => 'sichten',
	'tooltip-ca-current' => 'Ansehen der aktuellen, unmarkierten Seite',
	'tooltip-ca-stable' => 'Ansehen der markierten Version dieser Seite',
	'tooltip-ca-default' => 'Einstellungen der Artikel-Qualität',
	'tooltip-ca-ratinghist' => 'Leserbewertungen dieser Seite',
	'revreview-locked' => 'Bearbeitungen müssen markiert werden, bevor sie auf dieser Seite angezeigt werden.',
	'revreview-unlocked' => 'Bearbeitungen benötigen keine Markierung, bevor sie auf dieser Seite angezeigt werden.',
	'log-show-hide-review' => 'Versionsmarkierungs-Logbuch $1',
	'revreview-tt-review' => 'Markiere diese Seite',
	'validationpage' => '{{ns:help}}:Gesichtete und geprüfte Versionen',
);

/** German (formal address) (Deutsch (Sie-Form)) */
$messages['de-formal'] = array(
	'revreview-revnotfound' => 'Die Version dieser Seite, nach der Sie suchen, konnte nicht gefunden werden. Bitte überprüfen Sie die URL dieser Seite.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Nepl1
 */
$messages['dsb'] = array(
	'revreview-revnotfound' => 'Njejo móžno było, wersiju togo boka namakaś, za kótaremž sy pytał. Pšosym kontrolěruj zapódanu URL.',
);

/** Greek (Ελληνικά)
 * @author Badseed
 * @author Consta
 * @author ZaDiak
 */
$messages['el'] = array(
	'editor' => 'Συντάκτης',
	'flaggedrevs-desc' => 'Δίνει τη δυνατότητα στους συντάκτες και τους επανεξεταστές να αξιολογίσουν εκδόσεις και να σταθεροποιήσουν σελίδες',
	'flaggedrevs-prefs' => 'Σταθερότητα',
	'group-editor' => 'Επεξεργαστές',
	'group-editor-member' => 'Επεξεργαστής',
	'group-reviewer' => 'Επανεξεταστές',
	'group-reviewer-member' => 'Επανεξεταστής',
	'grouppage-editor' => '{{ns:project}}:Συντάκτης',
	'grouppage-reviewer' => '((ns:project}}:Επανεξεταστής',
	'hist-quality' => 'έκδοση ποιότητας',
	'hist-stable' => 'θεάσιμη έκδοση',
	'review-logentry-app' => 'αναθεωρημένο [[$1]]',
	'reviewer' => 'Επανεξεταστής',
	'revisionreview' => 'Θεώρηση εκδόσεων',
	'revreview-accuracy' => 'Ακρίβεια',
	'revreview-auto' => '(αυτόματο)',
	'revreview-auto-w-old' => "Επεξεργάζεσαι μια παλιά αναθεωρημένη επανάληψη. Οι αλλαγές θα '''αναθεωρηθούν αυτόματα'''.",
	'revreview-current' => 'Προσχέδιο',
	'revreview-edit' => 'Επεξεργασία προσχεδίου',
	'revreview-flag' => 'Επιθεώρησε αυτή την τροποποίηση',
	'revreview-legend' => 'Βαθμολόγησε το περιεχόμενο της τροποποίησης',
	'revreview-log' => 'Σχόλιο:',
	'revreview-oldrating' => 'Βαθμολογήθηκε:',
	'revreview-patrol' => 'Μάρκαρε αυτήν την αλλαγή ως ελεγμένη',
	'revreview-quick-invalid' => "'''Άκυρος κωδικός αναθεώρησης'''",
	'revreview-selected' => "Επιλεγμένη έκδοση του '''$1:'''",
	'revreview-source' => 'Πηγή προσχεδίου',
	'revreview-stable' => 'Σταθερή σελίδα',
	'revreview-style' => 'Αναγνωσιμότητα',
	'revreview-toggle-title' => 'εμφάνιση/απόκρυψη λεπτομερειών',
	'revreview-revnotfound' => 'Η παλιά αναθεώρηση της σελίδας που ζητήσατε δεν ήταν δυνατόν να βρεθεί. Παρακαλούμε ελέγξτε τo URL που χρησιμοποιήσατε για να φτάσετε σε αυτήν τη σελίδα.',
	'stable-logpage' => 'Αρχείο καταγραφής σταθερών εκδόσεων',
	'readerfeedback-reliability' => 'Αξιοπιστία',
	'readerfeedback-completeness' => 'Πληρότητα',
	'readerfeedback-npov' => 'Ουδετερότητα',
	'readerfeedback-presentation' => 'Παρουσίαση',
	'readerfeedback-level-4' => 'Τέλεια',
	'readerfeedback-finished' => 'Σας ευχαριστούμε!',
	'revreview-typefilter' => 'Τύπος:',
	'tooltip-ca-current' => 'Δείτε το υπάρχον προσχέδιο για αυτή τη σελίδα',
);

/** Esperanto (Esperanto)
 * @author ArnoLagrange
 * @author Yekrats
 */
$messages['eo'] = array(
	'editor' => 'Revizianto',
	'flaggedrevs' => 'Markitaj Versioj',
	'flaggedrevs-backlog' => "Estas nune amaso de [[Special:OldReviewedPages|malfreŝe kontrolitaj paĝoj]]. '''Via atento estas bezonata!'''",
	'flaggedrevs-desc' => 'Rajtigas al reviziantoj kaj kontrolantoj la kapablon validigi versiojn kaj stabiligi paĝojn',
	'flaggedrevs-pref-UI-0' => 'Uzi detalan stabilan version por uzulinterfaco',
	'flaggedrevs-pref-UI-1' => 'Uzi simplan uzulinterfacon de stabilaj versioj',
	'flaggedrevs-prefs' => 'Stabileco',
	'flaggedrevs-prefs-stable' => 'Ĉiam defaŭlte montri la stabilan version (se ĝi ekzistas)',
	'flaggedrevs-prefs-watch' => 'Aldoni miajn kontrolitajn paĝojn al mia atentaro',
	'group-editor' => 'Reviziantoj',
	'group-editor-member' => 'Revizianto',
	'group-reviewer' => 'Kontrolantoj',
	'group-reviewer-member' => 'Kontrolanto',
	'grouppage-editor' => '{{ns:project}}:Revizianto',
	'grouppage-reviewer' => '{{ns:project}}:Kontrolanto',
	'hist-draft' => 'malneta versio',
	'hist-quality' => 'kvalita versio',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validigita] de [[User:$3|$3]]',
	'hist-stable' => 'reviziita versio',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} reviziita] de [[User:$3|$3]]',
	'review-diff2stable' => 'Vidi ŝanĝojn inter stabila kaj nuna versioj',
	'review-logentry-app' => 'kontrolis [[$1]]',
	'review-logentry-dis' => 'evitinda versio de [[$1]]',
	'review-logentry-id' => 'identigo de versio $1',
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
	'revreview-basic' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|reviziita]] versio, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] atendas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ŝanĝon|ŝanĝojn}}].',
	'revreview-basic-i' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|reviziita]] versio, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] atendas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝablonajn/bildajn ŝanĝojn].',
	'revreview-basic-old' => 'Jen [[{{MediaWiki:Validationpage}}|reviziita]] versio ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
Novaj [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝanĝoj] eble estis faritaj.',
	'revreview-basic-same' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|reviziita]] versio ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Reviziita versio] de ĉi tiu paĝo, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>, estis bazita de ĉi tiu versio.',
	'revreview-changed' => "'''La petita ago ne povas esti farita por ĉi tiu versio de [[:$1|$1]].'''

Ŝablono aŭ bildo verŝajne estis petita kiam nenia aparta versio estis petita.
Ĉi tiel okazon se dinamika ŝablono transinkluzivas alian bildon aŭ ŝablono dependa de
variablo kiu ŝanĝis ekde vi ekkontrolis ĉi tiun paĝon.
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
	'revreview-main' => 'Vi devas selekti apartan version de enhava paĝo por revizii.

Vidu la [[Special:Unreviewedpages|liston de nereviziitaj paĝoj]] .',
	'revreview-newest-basic' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plej lasta reviziita versio] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listigi ĉiujn]) estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ŝanĝo|ŝanĝoj}}] bezonas kontrolon.',
	'revreview-newest-basic-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lasta reviziita versio] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]) estis  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝablonaj/bildaj ŝanĝoj] atendas kontrolon.',
	'revreview-newest-quality' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plej lasta bonkvalita versio] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]) estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ŝanĝo|ŝanĝoj}}] bezonas kontrolon.',
	'revreview-newest-quality-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lasta kvalita versio] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]) estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Ŝablonaj/bildaj ŝanĝoj] bezonas kontrolon.',
	'revreview-noflagged' => "Estas neniuj versioj de ĉi tiu paĝo, do ĝi eble '''ne''' estis [[{{MediaWiki:Validationpage}}|kvalite kontrolita]].",
	'revreview-note' => '[[User:$1|$1]] faris la jenan noton en [[{{MediaWiki:Validationpage}}|kontrolo]] de ĉi tiu versio:',
	'revreview-notes' => 'Rimarko aŭ notoj por montri:',
	'revreview-oldrating' => 'Ĝi estis taksita:',
	'revreview-patrol' => 'Marki ĉi tiun ŝanĝon kiel patrolitan',
	'revreview-patrol-title' => 'Marki kiel patrolitan',
	'revreview-patrolled' => 'La selektita versio de [[:$1|$1]] estis markita kiel patrolita.',
	'revreview-quality' => 'Jen la plej lasta [[{{MediaWiki:Validationpage}}|bonkvalita]] versio, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ŝanĝo|ŝanĝoj}}] atendas kontrolon.',
	'revreview-quality-i' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|bonkvalita]] versio, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] atendas kontrolon de [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝablonaj/bildaj ŝanĝoj].',
	'revreview-quality-old' => 'Jen [[{{MediaWiki:Validationpage}}|bonkvalita]] versio ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
Novaj [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ŝanĝoj] eble estis faritaj.',
	'revreview-quality-same' => 'Jen la lasta [[{{MediaWiki:Validationpage}}|bonkvalita]] versio ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Bonkvalita versio] de ĉi tiu paĝo, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>, estis bazita de ĉi tiu versio.',
	'revreview-quality-title' => 'Bonkvalita paĝo',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Reviziita paĝo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Reviziita paĝo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Reviziita paĝo]]'''",
	'revreview-quick-invalid' => "'''Nevalida identigo de versio'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Nuna versio]]''' (nereviziita)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Bonkvalita paĝo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Bonkvalita paĝo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Bonkvalita paĝo]]'''",
	'revreview-quick-see-basic' => "'''Malneto''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} rigardi paĝon]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} kompari])",
	'revreview-quick-see-quality' => "'''Malneto''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} rigardi paĝon]]
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
	'revreview-successful' => "'''Tiu ĉi versio de [[:$1|$1]] estas markita kiel reviziita. ([{{fullurl:Special:Stableversions|page=$2}} vidi ĉiujn markitajn versiojn])'''",
	'revreview-successful2' => "'''Versio de [[:$1|$1]] sukcese malmarkita.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabilaj versioj]] estas la defaŭlta enhavo por vidantoj anstataŭ la lasta versio.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabilaj versioj]] estas kontrolita versioj de paĝoj kaj povas defaŭlte montri tiun enhavon por legantoj.''",
	'revreview-toggle-title' => 'montri/kaŝi detalojn',
	'revreview-toolow' => 'Vi devas taksi ĉiun de la jenaj atribuoj almenaŭ pli alta ol "malaprobita" por versio esti konsiderata kiel kontrolita.
Malvalidigi version, faru ĉiujn kampojn kiel "malaprobita".',
	'revreview-update' => "Bonvolu [[{{MediaWiki:Validationpage}}|kontroli]] iuj ajn ŝanĝoj ''(sube montritaj)'' faritaj ekde la stabila versio estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita].<br />
'''Iuj ŝablonoj/bildoj estis ĝisdatigitaj:'''",
	'revreview-update-includes' => "'''Iuj ŝablonoj aŭ bildoj estis ĝisdatigitaj:'''",
	'revreview-update-none' => "Bonvolu [[{{MediaWiki:Validationpage}}|kontroli]] ĉiujn ŝanĝojn ''(sube montritajn)'' faritajn post kiam la stabila versio estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita].",
	'revreview-update-use' => "'''NOTU:''' Se iuj ajn de tiuj ŝablonoj/bildoj havas stabilan version, tiel ĝi jam estas uzita en la stabila versio de ĉi tiu paĝo.",
	'revreview-diffonly' => "''Por kontroli la paĝon, klaku la ligilon \"nuna versio\" kaj uzu la kontrolo-paĝon.''",
	'revreview-visibility' => "'''Ĉi tiu paĝo havas [[{{MediaWiki:Validationpage}}|stabilan version]]; preferoj pri stabileco estas [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigureblaj].'''",
	'revreview-visibility2' => "'''Ĉi tiu paĝo ne havas ĝisdatan [[{{MediaWiki:Validationpage}}|stabilan version]]; preferoj pri stabileco estas [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigureblaj].'''",
	'revreview-revnotfound' => 'Ne eblis trovi malnovan version de la artikolo kiun vi petis.
Bonvolu kontroli la retadreson (URL) kiun vi uzis por atingi la paĝon.\\b',
	'right-autopatrolother' => 'Aŭtomate marki versiojn ekster la ĉefaj nomspacoj kiel patrolitajn',
	'right-autoreview' => 'Aŭtomate marki versiojn kiel reviziitajn',
	'right-movestable' => 'Movi stabilajn paĝojn',
	'right-review' => 'Marki versiojn kiel reviziitajn',
	'right-stablesettings' => 'Konfiguri kiel la stabila versio estas selektita kaj montrita',
	'right-validate' => 'Marki versiojn kiel validigitajn',
	'rights-editor-autosum' => 'aŭtomate rangaltigita',
	'rights-editor-revoke' => 'forigis revizianto-rajton de [[$1]]',
	'specialpages-group-quality' => 'Kvalitkontrolo',
	'stable-logentry' => 'konfiguris stabil-redakciadon por [[$1]]',
	'stable-logentry2' => 'restarigi stabilan versiigado por [[$1]]',
	'stable-logpage' => 'Loglibro pri stabilaj versioj',
	'stable-logpagetext' => 'Jen protokolo de ŝanĝoj al la konfiguro de [[{{MediaWiki:Validationpage}}|stabila versio]] de enhavaj paĝoj.

Listo de stabiligitaj paĝoj estas trovebla ĉe la [[Special:StablePages|Listo de stabilaj paĝoj]].',
	'readerfeedback' => 'Kiel vi opinias pri ĉi tiu paĝo?',
	'readerfeedback-text' => "''Bonvolu taksigi la jenan paĝon. Via opinio estas valora kaj helpas nin plibonigi nian retejon.''",
	'readerfeedback-reliability' => 'Fidindeco',
	'readerfeedback-completeness' => 'Kompleteco',
	'readerfeedback-npov' => 'Neŭtraleco',
	'readerfeedback-presentation' => 'Prezentado',
	'readerfeedback-overall' => 'Entute',
	'readerfeedback-level-none' => '(necerta)',
	'readerfeedback-level-0' => 'Malbonege kvalita',
	'readerfeedback-level-1' => 'Malbonkvalita',
	'readerfeedback-level-2' => 'Mezkvalita',
	'readerfeedback-level-3' => 'Bonkvalita',
	'readerfeedback-level-4' => 'Bonega',
	'readerfeedback-submit' => 'Ek',
	'readerfeedback-main' => 'Nur enhavaj paĝoj estas takseblaj.',
	'readerfeedback-success' => "'''Dankon pro kontrolante ĉi tiun paĝon!''' ([$3 Ĉu komentoj aŭ demandoj?]).",
	'readerfeedback-voted' => "'''Verŝajne vi jam taksis ĉi tiun paĝon.''' ([$3 Ĉu komentoj aŭ demandoj?]).",
	'readerfeedback-submitting' => 'Sendante...',
	'readerfeedback-finished' => 'Dankon!',
	'revreview-filter-all' => 'Ĉio',
	'revreview-filter-approved' => 'Konsentita',
	'revreview-filter-reapproved' => 'Rekonsentita',
	'revreview-filter-unapproved' => 'Malkonsentita',
	'revreview-filter-auto' => 'Aŭtomata',
	'revreview-filter-manual' => 'Permana',
	'revreview-filter-level-0' => 'Reviziitaj versioj',
	'revreview-filter-level-1' => 'Bonkvalitaj versioj',
	'revreview-statusfilter' => 'Statuso:',
	'revreview-typefilter' => 'Speco:',
	'revreview-tagfilter' => 'Etikedo:',
	'revreview-reviewlink' => 'revizii',
	'tooltip-ca-current' => 'Vidi la nunan malneton de ĉi tiu paĝo',
	'tooltip-ca-stable' => 'Rigardi la stabilan version de ĉi paĝo',
	'tooltip-ca-default' => 'Konfiguro de kvalitkontrolo',
	'tooltip-ca-ratinghist' => 'Taksoj de legintoj de ĉi tiu paĝo',
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
 * @author Sanbec
 */
$messages['es'] = array(
	'editor' => 'Editor',
	'flaggedrevs-backlog' => "Actualmente hay un retraso en [[Special:OldReviewedPages|páginas revisadas obsoletas]]. '''¡Se necesita de tu atención!!''",
	'flaggedrevs-desc' => 'Da a los editores la habilidad de validar revisiones y estabilizar páginas',
	'flaggedrevs-pref-UI-0' => 'Usar la versión detallada de la interfaz de versiones estables',
	'flaggedrevs-pref-UI-1' => 'Usar la versión simple de la interfaz de versiones estables',
	'flaggedrevs-prefs' => 'Estabilidad',
	'flaggedrevs-prefs-stable' => 'Por defecto, muestra siempre la versión estable (si existe) de las páginas',
	'flaggedrevs-prefs-watch' => 'Añadir a mi lista de seguimiento las páginas que revise.',
	'group-editor' => 'Editores',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Revisores',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'hist-draft' => 'bosquejo de revisión',
	'hist-quality' => 'revisión de calidad',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validada] por [[User:$3|$3]]',
	'review-logentry-app' => 'revisado [[$1]]',
	'reviewer' => 'Revisor',
	'revisionreview' => 'Verificar revisiones',
	'revreview-accuracy-0' => 'Desaprobado',
	'revreview-accuracy-2' => 'Adecuado',
	'revreview-approved' => 'Aprobado',
	'revreview-auto' => '(automático)',
	'revreview-auto-w' => "Estás editando la versión estable. Los cambios serán '''automáticamente revisados'''.",
	'revreview-auto-w-old' => "Estás editando una versión revisada, los cambios serán '''automáticamente revisados'''.",
	'revreview-basic' => 'Esta es la última [[{{MediaWiki:Validationpage}}|revisión]] vista, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] esperando revisión.',
	'revreview-basic-i' => 'Esta es la última revisión [[{{MediaWiki:Validationpage}}|vista]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios de plantilla/imagen] esperando revisión.',
	'revreview-current' => 'Borrador',
	'revreview-depth' => 'Profundidad',
	'revreview-depth-0' => 'No aprobado',
	'revreview-depth-1' => 'Fundamental',
	'revreview-depth-2' => 'Moderado',
	'revreview-depth-3' => 'Elevado',
	'revreview-depth-4' => 'Destacado',
	'revreview-draft-title' => 'Página esbozo',
	'revreview-edit' => 'Editar borrador',
	'revreview-flag' => 'Verificar esta revisión',
	'revreview-edited' => "'''Las ediciones serán incorporadas en la [[{{MediaWiki:Validationpage}}|versión estable]] una vez que los usuarios establecidos las revisen. El ''borrador'' se muestra debajo.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|cambio en espera|cambios en espera}}] de revisión.",
	'revreview-invalid' => "'''Destino inválido:''' no hay  [[{{MediaWiki:Validationpage}}|versión revisada]] que corresponda a tal ID.",
	'revreview-log' => 'Comentario:',
	'revreview-newest-basic' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versión vista] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] {{PLURAL:$3|necesita|necesitan}} revisión.',
	'revreview-newest-basic-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión vista] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios a plantilla/imagen] necesitan revisión.',
	'revreview-newest-quality' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidad] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] {{PLURAL:$3|necesita|necesitan}} revisión.',
	'revreview-newest-quality-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidad] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios a plantilla/imagen] necesitan revisión.',
	'revreview-noflagged' => "No hay versiones revisadas para esta página, por lo que puede '''no''' haber sido [[{{MediaWiki:Validationpage}}|verificada]] para calidad",
	'revreview-oldrating' => 'Fue calificada:',
	'revreview-patrolled' => 'Las revisiones seleccionadas de [[:$1|$1]] han sido marcadas como patrulladas',
	'revreview-quality' => 'Esta es la última revisión de [[{{MediaWiki:Validationpage}}|calidad]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] esperando revisión.',
	'revreview-quality-title' => 'Artículo de calidad',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Artículo visto]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver borrador]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Artículo visto]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver esbozo]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|página vista]]'''",
	'revreview-quick-invalid' => "'''ID de revisión inválido'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Versión actual]]''' (sin revisar)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Artículo de calidad]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver esbozo]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Artículo de calidad]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver esbozo]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Artículo de calidad]]'''",
	'revreview-quick-see-basic' => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver página]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-quick-see-quality' => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver página]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-selected' => "Revisión seleccionada de '''$1:'''",
	'revreview-source' => 'fuente del borrador',
	'revreview-stable' => 'Página estable',
	'revreview-style' => 'Legibilidad',
	'revreview-style-0' => 'Reprobada',
	'revreview-style-1' => 'Aceptable',
	'revreview-style-2' => 'Bueno',
	'revreview-style-3' => 'Conciso',
	'revreview-style-4' => 'Destacado',
	'revreview-submit' => 'Enviar',
	'revreview-submitting' => 'Enviando...',
	'revreview-finished' => '¡Revisión completa!',
	'revreview-successful' => "'''La revisión de [[:$1|$1]] ha sido exitósamente marcada. ([{{fullurl:Special:Stableversions|page=$2}} ver versiones estables])'''",
	'revreview-successful2' => "'''Se ha desmarcado la revisión de [[:$1|$1]]'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Las versiones estables]] son las predeterminadas para los lectores en vez de las más recientes.''",
	'revreview-toggle-title' => 'mostrar/ocultar detalles',
	'revreview-update-includes' => "'''Algunas plantillas o imágenes fueron actualizadas:'''",
	'revreview-update-none' => "Por favor [[{{MediaWiki:Validationpage}}|revisa]] los cambios ''(mostrados abajo)'' hecho desde que la versión estable fue  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada].",
	'revreview-update-use' => "'''NOTA:''' si alguna de estas plantillas o imágenes tiene una versión estable, entonces ya se usa en la versión estable de esta página.",
	'revreview-revnotfound' => 'No se pudo encontrar la revisión antigua de la página que ha solicitado.
Por favor, revise la dirección que usó para acceder a esta página.',
	'right-autopatrolother' => 'Automáticamente marcar revisiones patrulladas fuera del espacio de nombres principal',
	'right-autoreview' => 'Automáticamente marcar revisiones como vistas',
	'right-movestable' => 'Mover páginas estables',
	'right-review' => 'Marcar revisiones como vistas',
	'right-stablesettings' => 'Configurar cómo las versiones estables se seleccionan y muestran',
	'right-validate' => 'Marcar revisiones como validadas',
	'rights-editor-autosum' => 'Autopromovida',
	'rights-editor-revoke' => 'Se retiró el estado de editor para [[$1]]',
	'specialpages-group-quality' => 'Control de calidad',
	'stable-logentry' => 'Versiones estables configuradas para [[$1]]',
	'stable-logpage' => 'Registro de estabilidad',
	'stable-logpagetext' => 'Este es un registro de cambios a la configuración de [[{{MediaWiki:Validationpage}}|versión estable]] para páginas de contenido. Una [[Special:StablePages|lista de páginas estables]] se encuentra disponible.',
	'readerfeedback' => '¿Qué opinas de esta página?',
	'readerfeedback-text' => "''Por favor, toma un momento para calificar la página. Tu aportación es valiosa y nos ayuda a mejorar el sitio''",
	'readerfeedback-reliability' => 'Confiabilidad',
	'readerfeedback-completeness' => 'Completitud',
	'readerfeedback-npov' => 'Neutralidad',
	'readerfeedback-presentation' => 'Presentación',
	'readerfeedback-overall' => 'En conjunto',
	'readerfeedback-level-0' => 'Pobre',
	'readerfeedback-level-1' => 'Baja',
	'readerfeedback-level-2' => 'Aceptable',
	'readerfeedback-level-3' => 'Alto',
	'readerfeedback-level-4' => 'Excelente',
	'readerfeedback-submit' => 'Enviar',
	'readerfeedback-submitting' => 'Enviando...',
	'readerfeedback-finished' => '¡Gracias!',
	'revreview-filter-all' => 'Todas',
	'revreview-filter-approved' => 'Aprobada',
	'revreview-filter-reapproved' => 'Re-aprobada',
	'revreview-filter-unapproved' => 'No aprobado',
	'revreview-filter-auto' => 'Automático',
	'revreview-filter-manual' => 'Manual',
	'revreview-statusfilter' => 'Estatus:',
	'revreview-typefilter' => 'Tipo:',
	'revreview-reviewlink' => 'revisar',
	'tooltip-ca-current' => 'Ver el borrador actual de esta página',
	'tooltip-ca-stable' => 'Ver la versión estable de esta página',
	'tooltip-ca-default' => 'Opciones de control de calidad',
	'revreview-tt-review' => 'Revisar esta página',
	'validationpage' => '{{ns:help}}:Validación de artículo',
);

/** Estonian (Eesti) */
$messages['et'] = array(
	'revreview-style-1' => 'Vastuvõetav',
	'revreview-revnotfound' => 'Teie poolt päritud vana redaktsiooni ei leitud.
Palun kontrollige aadressi, millel Te seda lehekülge leida püüdsite.',
);

/** Basque (Euskara)
 * @author Bengoa
 * @author Kobazulo
 * @author Unai Fdz. de Betoño
 */
$messages['eu'] = array(
	'editor' => 'Editorea',
	'flaggedrevs' => 'Markatutako Berrikuspenak',
	'flaggedrevs-prefs' => 'Egonkortasuna',
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
	'readerfeedback' => 'Zer deritzozu orrialde honi buruz?',
	'readerfeedback-reliability' => 'Fidagarritasuna',
	'readerfeedback-npov' => 'Neutraltasuna',
	'readerfeedback-presentation' => 'Aurkezpena',
	'readerfeedback-submit' => 'Bidali',
	'readerfeedback-finished' => 'Mila esker!',
	'revreview-filter-all' => 'Guztiak',
	'revreview-filter-auto' => 'Automatikoa',
	'revreview-filter-manual' => 'Eskuzkoa',
	'revreview-statusfilter' => 'Estatusa:',
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
	'flaggedrevs-prefs' => 'پایداری',
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
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس]
	قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} ویرایش] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}]
نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-basic-i' => 'این چدید‌ترین نسخهٔ [[{{MediaWiki:Validationpage}}|بررسی شده]] است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس] دارای [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییراتی در الگوها/تصویرها] است که هنوز بازبینی نشده‌اند.',
	'revreview-basic-old' => 'این یک نسخهٔ [[{{MediaWiki:Validationpage}}|بررسی شده]] است([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} نمایش همه])، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
ممکن است [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییرات] جدیدی اتفاق افتاده باشند.',
	'revreview-basic-same' => 'این آخرین نسخهٔ [[{{MediaWiki:Validationpage}}|بررسی شده]] ‌است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} فهرست کامل]).',
	'revreview-basic-source' => 'یک [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخهٔ بررسی شده] از این صفحه، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده] در <i>$2</i>، بر مبنای این نسخه ایجاد شده‌است.',
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
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} فهرست کامل]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است].
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}] نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخهٔ بررسی شده] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} نمایش همه]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده بود].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییرات الگوها/تصویرها] نیازمند بازبینی است.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخه باکیفیت]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} فهرست کامل]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}] نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخهٔ باکیفیت] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} نمایش همه]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده بود].
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
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس]
	قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} ویرایش] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|تغییر|تغییر}}]
	نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-quality-i' => 'این چدید‌ترین نسخهٔ [[{{MediaWiki:Validationpage}}|باکیفیت]] است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس] دارای [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییراتی در الگوها/تصویرها] است که هنوز بازبینی نشده‌اند.',
	'revreview-quality-old' => 'این یک نسخهٔ [[{{MediaWiki:Validationpage}}|باکیفیت]] است([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} نمایش همه])، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
ممکن است [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} تغییرات] جدیدی اتفاق افتاده باشند.',
	'revreview-quality-same' => 'این آخرین نسخهٔ [[{{MediaWiki:Validationpage}}|با کیفیت]] ‌است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} فهرست کامل]).',
	'revreview-quality-source' => 'یک [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخهٔ باکیفیت] از این صفحه، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده] در <i>$2</i>، بر مبنای این نسخه ایجاد شده‌است.',
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
([{{fullurl:Special:Stableversions|page=$2}} مشاهدهٔ تمام نسخه‌های علامت‌دار])'''",
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
	[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} تنظیم] است.',
	'revreview-revnotfound' => 'نسخهٔ قدیمی‌ای از صفحه که درخواسته بودید یافت نشد.
لطفاً URLی را که برای دسترسی به این صفحه استفاده کرده‌اید، بررسی کنید.',
	'right-autopatrolother' => 'زدن خودکار برچسب گشت خودکار به ویرایش‌های خارج از فضای نام اصلی',
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
	'readerfeedback' => 'دربارهٔ این صفحه چه فکر می‌کنید؟',
	'readerfeedback-text' => "''لطفاً چند لحظه صرف ارزیابی صفحهٔ زیر کنید. بازخورد شما ارزشمند است و به ما در بهبود وبگاهمان کمک می‌کند.''",
	'readerfeedback-reliability' => 'اعتمادپذیری',
	'readerfeedback-completeness' => 'کامل بودن',
	'readerfeedback-npov' => 'بی‌طرفانه بودن',
	'readerfeedback-presentation' => 'نمایش',
	'readerfeedback-overall' => 'روی هم رفته',
	'readerfeedback-level-none' => '(برگزینید)',
	'readerfeedback-level-0' => 'پست',
	'readerfeedback-level-1' => 'پایین',
	'readerfeedback-level-2' => 'متوسط',
	'readerfeedback-level-3' => 'بالا',
	'readerfeedback-level-4' => 'ممتاز',
	'readerfeedback-submit' => 'ارسال',
	'readerfeedback-main' => 'فقط صفحه‌های محتوایی قابل ارزیابی هستند.',
	'readerfeedback-success' => "از این که این صفحه را ارزیابی کردید ممنونیم!''' ([$3 نظرها و سوال‌ها]).",
	'readerfeedback-voted' => "به نظر می‌رسد که شما پیش از این این صفحه را ارزیابی کرده‌اید''' ([$3 نظرها و سوال‌ها]).",
	'readerfeedback-submitting' => 'در حال ارسال...',
	'readerfeedback-finished' => 'متشکریم!',
	'revreview-filter-all' => 'همه',
	'revreview-filter-approved' => 'تایید شده',
	'revreview-filter-reapproved' => 'دوباره تایید شده',
	'revreview-filter-unapproved' => 'تایید نشده',
	'revreview-filter-auto' => 'خودکار',
	'revreview-filter-manual' => 'دستی',
	'revreview-filter-level-0' => 'نسخه‌های بررسی‌شده',
	'revreview-filter-level-1' => 'نسخه‌های باکیفیت',
	'revreview-statusfilter' => 'وضعیت:',
	'revreview-typefilter' => 'نوع',
	'revreview-tagfilter' => 'برچسب',
	'revreview-reviewlink' => 'بازبینی',
	'tooltip-ca-current' => 'مشاهده پیش‌نویس فعلی این صفحه',
	'tooltip-ca-stable' => 'مشاهده نسخه پایدار این صفحه',
	'tooltip-ca-default' => 'تنظیمات کنترل کیفیت',
	'tooltip-ca-ratinghist' => 'نمره خوانندگان به این صفحه',
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
	'flaggedrevs' => 'Tarkastetut versiot',
	'flaggedrevs-prefs-watch' => 'Lisää tarkastetut sivut tarkkailulistalle.',
	'group-editor' => 'muokkaajat',
	'group-editor-member' => 'muokkaaja',
	'group-reviewer' => 'arvioijat',
	'group-reviewer-member' => 'arvioija',
	'grouppage-editor' => '{{ns:project}}:Muokkaaja',
	'grouppage-reviewer' => '{{ns:project}}:Arvioija',
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
	'revreview-current' => 'Luonnos',
	'revreview-depth-2' => 'Keskitasoa',
	'revreview-draft-title' => 'Luonnossivu',
	'revreview-edit' => 'Muokkaa luonnosta',
	'revreview-flag' => 'Arvioi tämä versio',
	'revreview-log' => 'Kommentti',
	'revreview-oldrating' => 'Arvio oli:',
	'revreview-patrol' => 'Merkitse tämä muutos tarkastetuksi',
	'revreview-patrol-title' => 'Merkitse tarkastetuksi',
	'revreview-quality-title' => 'Laadukas sivu',
	'revreview-stable' => 'Vakaa sivu',
	'revreview-stable-title' => 'Kertaalleen silmäilty sivu',
	'revreview-style' => 'Luettavuus',
	'revreview-style-1' => 'Hyväksyttävä',
	'revreview-style-2' => 'Hyvä',
	'revreview-style-4' => 'Suositeltu',
	'revreview-finished' => 'Arviointi suoritettu!',
	'revreview-toggle-title' => 'näytä tai piilota yksityiskohdat',
	'revreview-revnotfound' => 'Pyytämääsi versiota ei löydy. Tarkista URL-osoite, jolla hait tätä sivua.',
	'right-movestable' => 'Siirrä vakaat sivut',
	'readerfeedback' => 'Mitä mieltä olet tästä sivusta?',
	'readerfeedback-reliability' => 'Luettavuus',
	'readerfeedback-completeness' => 'Täydellisyys',
	'readerfeedback-npov' => 'Neutraalius',
	'readerfeedback-presentation' => 'Esittäminen',
	'readerfeedback-overall' => 'Kokonaisvaikutelma',
	'readerfeedback-finished' => 'Kiitos!',
	'revreview-filter-all' => 'Kaikki',
	'revreview-reviewlink' => 'tarkasta',
	'tooltip-ca-current' => 'Näytä tämän sivun nykyinen luonnosversio',
	'tooltip-ca-stable' => 'Näytä tämän sivun vakaa artikkeliversio',
	'tooltip-ca-ratinghist' => 'Lukijoiden arviot tästä sivusta',
	'revreview-tt-review' => 'Arvioi tämä sivu',
);

/** Võro (Võro)
 * @author Võrok
 */
$messages['fiu-vro'] = array(
	'revreview-revnotfound' => 'Es lövväq su otsitut vanna kujjo.
Kaeq üle aadrõs, kost sa taad löüdäq proovõq.',
);

/** French (Français)
 * @author Cedric31
 * @author Crochet.david
 * @author Dereckson
 * @author Grondin
 * @author IAlex
 * @author Korrigan
 * @author McDutchie
 * @author Sherbrooke
 * @author Urhixidur
 * @author Verdy p
 * @author Zetud
 */
$messages['fr'] = array(
	'editor' => 'Contributeur',
	'flaggedrevs' => 'Révisions marquées',
	'flaggedrevs-backlog' => "Il y a actuellement des tâches en retard dans la [[Special:OldReviewedPages|liste des anciennes pages révisées]]. '''Votre attention y est demandée !'''",
	'flaggedrevs-desc' => 'Donne la possibilité aux éditeurs ou au relecteurs de valider les modifications et de stabiliser les pages.',
	'flaggedrevs-pref-UI-0' => 'Utiliser l’interface utilisateur de la version stable détaillée',
	'flaggedrevs-pref-UI-1' => 'Utiliser une simple interface utilisateur stable',
	'flaggedrevs-prefs' => 'Stabilité',
	'flaggedrevs-prefs-stable' => 'Toujours afficher la version stable du contenu des pages par défaut (s’il en existe une)',
	'flaggedrevs-prefs-watch' => 'Ajoute les pages que j’ai revues à ma liste de suivi.',
	'group-editor' => 'Contributeurs',
	'group-editor-member' => 'Contributeur',
	'group-reviewer' => 'Réviseurs',
	'group-reviewer-member' => 'Réviseur',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Reviewer',
	'hist-draft' => 'version brouillon',
	'hist-quality' => 'version de qualité',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validée] par [[User:$3|$3]]',
	'hist-stable' => 'Version visualisée',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} visée] par [[User:$3|$3]]',
	'review-diff2stable' => 'Voir les modifications entre les versions stables et actuelles.',
	'review-logentry-app' => 'Revue [[$1]]',
	'review-logentry-dis' => 'Version dépréciée de [[$1]]',
	'review-logentry-id' => 'Version ID $1',
	'review-logentry-diff' => 'diff vers la version stable',
	'review-logpage' => 'Journal des relectures',
	'review-logpagetext' => 'Voici le journal des modifications du statut [[{{MediaWiki:Validationpage}}|d’approbation]] des révisions du contenu des pages.
Voir la liste [[Special:ReviewedPages|des pages relues]] pour une liste de celles qui sont approuvées.',
	'reviewer' => 'Réviseur',
	'revisionreview' => 'Revoir versions',
	'revreview-accuracy' => 'Précision',
	'revreview-accuracy-0' => 'Non approuvée',
	'revreview-accuracy-1' => 'Vue',
	'revreview-accuracy-2' => 'Précise',
	'revreview-accuracy-3' => 'Bien sourcée',
	'revreview-accuracy-4' => 'Remarquable',
	'revreview-approved' => 'Approuvé',
	'revreview-auto' => '(automatique)',
	'revreview-auto-w' => "Vous êtes en train de modifier une version stable : les modifications '''seront automatiquement relues'''.",
	'revreview-auto-w-old' => "Vous êtes en train de modifier une version relue ; les modifications  '''seront automatiquement relues'''.",
	'revreview-basic' => "C'est la dernière [[{{MediaWiki:Validationpage}}|version vue]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ébauche] peut être [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiée]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 changement attend|$3 changements attendent}}] une révision.",
	'revreview-basic-i' => 'Voici la dernière version [[{{MediaWiki:Validationpage}}|visée]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] sur <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouillon] comprend des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changements de modèle ou d’image] en attente d’approbation.',
	'revreview-basic-old' => 'Voici une version [[{{MediaWiki:Validationpage}}|visée]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} liste entière]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>.
De nouvelles [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifications] peuvent avoir été effectuées.',
	'revreview-basic-same' => 'Ceci est la dernière version [[{{MediaWiki:Validationpage}}|surveillée]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] sur <i>$2</i>. La page peut être [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiée].',
	'revreview-basic-source' => 'Une [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version visée] de cette page, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>, a été basée en dehors de cette version.',
	'revreview-changed' => "'''L’action demandée n’a pu être accomplie pour cette version de [[:$1|$1]].'''
	
Un modèle ou une image peuvent avoir été demandés alors qu’aucune version précise n’était choisie. Ceci peut survenir si un modèle dynamique opère une transclusion d’une autre image ou d’un modèle dépendant d’une variable qui a changé depuis que vous avez commencé à prévisualiser cette page. Le rechargement de la page et sa revisualisation peuvent corriger ce problème.",
	'revreview-current' => 'Ébauche',
	'revreview-depth' => 'Profondeur',
	'revreview-depth-0' => 'Non approuvée',
	'revreview-depth-1' => 'De base',
	'revreview-depth-2' => 'Modérée',
	'revreview-depth-3' => 'Élevée',
	'revreview-depth-4' => 'Remarquable',
	'revreview-draft-title' => 'Brouillon de page',
	'revreview-edit' => "Modifier l'ébauche",
	'revreview-editnotice' => "'''Note : Les modifications sur cette page seront incorporées dans la [[{{MediaWiki:Validationpage}}|version stable]] une fois qu’un utilisateur habilité les aura relues.'''",
	'revreview-flag' => 'Évaluer cette version',
	'revreview-edited' => "'''Les modifications seront incorporées dans [[{{MediaWiki:Validationpage}}|la version stable]] une fois qu’un relecteur autorisé les aura approuvées.'''<br />
Le ''brouillon'' est visible ci-dessous. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|modification attend|modifications attendent}}] une relecture.",
	'revreview-invalid' => "'''Cible incorrecte :''' aucune version [[{{MediaWiki:Validationpage}}|relue]] ne correspond au numéro indiqué.",
	'revreview-legend' => 'Évaluer le contenu de la version',
	'revreview-log' => 'Commentaire au journal :',
	'revreview-main' => 'Vous devez choisir une version précise à partir du contenu en règle de la page pour réviser. Voir [[Special:Unreviewedpages|Versions non révisées]] pour une liste de pages.',
	'revreview-newest-basic' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version vue] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} toutes les voir]) était [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|changement|changements}}] {{PLURAL:$3|demande|demandent}} une révision.",
	'revreview-newest-basic-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version relue] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} liste générale]) a été [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] sur <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Des changements de modèles ou d’images] nécessitent une relecture.',
	'revreview-newest-quality' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version de qualité] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} toutes les voir]) était [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|changement|changements}}] {{PLURAL:$3|demande|demandent}} une révision.",
	'revreview-newest-quality-i' => 'Les [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernières versions de qualité] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} liste générale]) ont été [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvées] sur <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Des modifications de modèles ou d’images] nécessitent une relecture.',
	'revreview-noflagged' => "Il n'y a pas de version révisée de cette page, sa [[{{MediaWiki:Validationpage}}|qualité]] est incertaine.",
	'revreview-note' => '[[User:$1|$1]] a écrit ces notes de révision :',
	'revreview-notes' => 'Observations et notes à afficher :',
	'revreview-oldrating' => 'Son pointage :',
	'revreview-patrol' => 'Marquer cette modification comme patrouillée',
	'revreview-patrol-title' => 'Marquer comme patrouillé',
	'revreview-patrolled' => 'La version sélectionnée de [[:$1|$1]] a été marquée comme patrouillée.',
	'revreview-quality' => "C'est la dernière [[{{MediaWiki:Validationpage}}|version de qualité]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ébauche] peut être [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiée]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 changement attend|$3 changements attendent}}] une révision.",
	'revreview-quality-i' => 'Voici la dernière version de [[{{MediaWiki:Validationpage}}|qualité]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] sur <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouillon] comprend des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} changements de modèle ou d’image] en attente d’approbation.',
	'revreview-quality-old' => 'Voici une version de [[{{MediaWiki:Validationpage}}|qualité]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tous lister]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>.
De nouvelles [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifications] peuvent avoir été effectuées.',
	'revreview-quality-same' => 'Ceci est la dernière version de [[{{MediaWiki:Validationpage}}|qualité]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvé] sur <i>$2</i>. La page peut être [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiée].',
	'revreview-quality-source' => 'Une [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualité] de cette page, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>, a été basée en dehors de cette version.',
	'revreview-quality-title' => 'Page de qualité',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|page visée]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir révision courante]]",
	'revreview-quick-basic-old' => "[[{{MediaWiki:Validationpage}}|page visée]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir le brouillon]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Page surveillée]]''' (aucune modification revue)",
	'revreview-quick-invalid' => "'''Numéro de version incorrecte'''",
	'revreview-quick-none' => "'''Courante''' (pas de révisions évaluées)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Page de qualité]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir version courante]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Page de qualité]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visionner le brouillon]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Page de qualité]]''' (aucune modification revue)",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Brouillon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} voir la page]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparer])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Brouillon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} voir la page]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparer])",
	'revreview-selected' => "Version choisie de '''$1 :'''",
	'revreview-source' => "Source de l'ébauche",
	'revreview-stable' => 'Page stable',
	'revreview-stable-title' => 'Pages visé',
	'revreview-stable1' => 'Vous pouvez vouloir visionner cette [{{fullurl:$1|stableid=$2}} version marquée] pour voir si c’est maintenant la [{{fullurl:$1|stable=1}} version stable] de cette page.',
	'revreview-stable2' => 'Vous pouvez vouloir visionner [{{fullurl:$1|stable=1}} la version stable] de cette page (s’il en existe une).',
	'revreview-style' => 'Lisibilité',
	'revreview-style-0' => 'Non approuvée',
	'revreview-style-1' => 'Acceptable',
	'revreview-style-2' => 'Bonne',
	'revreview-style-3' => 'Concise',
	'revreview-style-4' => 'Remarquable',
	'revreview-submit' => 'Sauvegarder',
	'revreview-submitting' => 'Soumission…',
	'revreview-finished' => 'Révision terminée !',
	'revreview-successful' => "'''La version sélectionnée de [[:$1|$1]] a été marquée avec succès d’un drapeau ([{{fullurl:Special:Stableversions|page=$2}} Voir toutes les versions stables])'''",
	'revreview-successful2' => "'''La version de [[:$1|$1]] s’est vue retirer son drapeau avec succès.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Les versions stables]] sont choisies comme contenu par défaut pour les lecteurs plutôt que les versions les plus récentes.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Les versions stables]] sont les versions de pages vérifiées et peuvent être définies comme le contenu par défault pour les lecteurs.''",
	'revreview-toggle-title' => 'montrer/cacher les détails',
	'revreview-toolow' => 'Pour les attributs ci-dessous, vous devez donner un pointage plus élevé que « non approuvé » pour que la version soit considérée revue. Pour déprécier une version, mettre tous les champs à « non approuvé ».',
	'revreview-update' => "Veuillez [[{{MediaWiki:Validationpage}}|vérifier]] toutes les modifications ''(voir ci-dessous)'' effectuées depuis la [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dernière approbation] de version stable.<br />
'''Quelques images ou modèles ont été mis à jour :'''",
	'revreview-update-includes' => "'''Quelques modèles ou images ont été mis à jour :'''",
	'revreview-update-none' => "Veuillez [[{{MediaWiki:Validationpage}}|vérifier]] les modifications effectuées ''(voir ci-dessous)'' depuis que la dernière version stable a été [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée].",
	'revreview-update-use' => "'''Note :''' si un de ces modèles ou images dispose d’une version stable, alors cette version est encore utilisée dans la version stable de cette page.",
	'revreview-diffonly' => "''Pour réviser la page, cliquez sur le lien « version courante » et utilisez le formulaire de révision.''",
	'revreview-visibility' => '
Cette page contient une [[{{MediaWiki:Validationpage}}|version stable]] : ses paramètres de stabilité peuvent être [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurés].',
	'revreview-visibility2' => "'''Cette page ne dispose pas de [[{{MediaWiki:Validationpage}}|version stable]] ; ses paramètres de stabilité peuvent être [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurés].'''",
	'revreview-revnotfound' => 'La version précédente de cette page n’a pas pu être retrouvée. Veuillez vérifier l’URL que vous avez utilisée pour accéder à cette page.',
	'right-autopatrolother' => 'Marquer comme patrouillées les versions dans tous les espaces de nom sauf le principal.',
	'right-autoreview' => 'Marquer automatiquement les versions comme visées',
	'right-movestable' => 'Déplacer des pages stables',
	'right-review' => 'Marquer les versions comme visées',
	'right-stablesettings' => 'Configurer comment la version stable est sélectionnée puis affichée',
	'right-validate' => 'Marquer les versions comme validées',
	'rights-editor-autosum' => 'autopromu',
	'rights-editor-revoke' => "a révoqué les droits d'éditeur de [[$1]]",
	'specialpages-group-quality' => 'Assurance qualité',
	'stable-logentry' => 'Les versions stables de [[$1]] sont paramétrées.',
	'stable-logentry2' => 'Remettre à zéro le journal des versions stables de [[$1]]',
	'stable-logpage' => 'Journal des versions stables',
	'stable-logpagetext' => 'Voici le journal des modifications de la [[{{MediaWiki:Validationpage}}|version stable]] de la configuration de pages de contenu.
Consulter aussi la [[Special:StablePages|liste de pages stables]].',
	'readerfeedback' => 'Que pensez-vous de cette page ?',
	'readerfeedback-text' => "''Veuillez consacrer un instant pour noter cette page ci-dessous. Vos impressions sont précieuses et nous aident à améliorer notre site internet.''",
	'readerfeedback-reliability' => 'Fiabilité',
	'readerfeedback-completeness' => 'État complet',
	'readerfeedback-npov' => 'Neutralité',
	'readerfeedback-presentation' => 'Présentation',
	'readerfeedback-overall' => 'Général',
	'readerfeedback-level-none' => '(non sûr)',
	'readerfeedback-level-0' => 'Pauvre',
	'readerfeedback-level-1' => 'Bas',
	'readerfeedback-level-2' => 'Beau',
	'readerfeedback-level-3' => 'Haut',
	'readerfeedback-level-4' => 'Excellent',
	'readerfeedback-submit' => 'Soumettre',
	'readerfeedback-main' => 'Seul les pages de contenu peut être noté.',
	'readerfeedback-success' => "'''Merci pour la révision de cette page !''' ([$3 Des questions ou des commentaires ? ]).",
	'readerfeedback-voted' => "'''Il apparaît que vous avez déjà noté cette page'''. ([$3 Des questions ou des commentaires ?]).",
	'readerfeedback-submitting' => 'Soumission…',
	'readerfeedback-finished' => 'Merci !',
	'revreview-filter-all' => 'Tout',
	'revreview-filter-approved' => 'Approuvé',
	'revreview-filter-reapproved' => 'Une nouvelle fois approuvé',
	'revreview-filter-unapproved' => 'Désapprouvé',
	'revreview-filter-auto' => 'Automatique',
	'revreview-filter-manual' => 'Manuel',
	'revreview-filter-level-0' => 'Versions visées',
	'revreview-filter-level-1' => 'Versions de qualité',
	'revreview-statusfilter' => 'Statut :',
	'revreview-typefilter' => 'Genre :',
	'revreview-tagfilter' => 'Balise :',
	'revreview-reviewlink' => 'Revoir',
	'tooltip-ca-current' => "Voir l'ébauche courante de cette page",
	'tooltip-ca-stable' => 'Voir la version stable de cette page',
	'tooltip-ca-default' => "Paramètres pour l'assurance-qualité",
	'tooltip-ca-ratinghist' => 'Appréciations des lecteurs de cette page',
	'revreview-locked' => 'Les modifications doivent être revues avant d’être affichées sur cette page !',
	'revreview-unlocked' => 'Les modifications ne nécessitent pas de relecture avant d’être affichées sur cette page !',
	'log-show-hide-review' => "$1 l'historique des relectures",
	'revreview-tt-review' => 'Réviser cette page',
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
	'flaggedrevs-desc' => 'Balye la possibilitât ux èditors ou ben ux rèvisors de validar les modificacions et de stabilisar les pâges.',
	'group-editor' => 'Contributors',
	'group-editor-member' => 'Contributor',
	'group-reviewer' => 'Rèvisors',
	'group-reviewer-member' => 'Rèvisor',
	'grouppage-editor' => '{{ns:project}}:Contributors',
	'grouppage-reviewer' => '{{ns:project}}:Rèvisors',
	'hist-quality' => 'vèrsion de qualitât',
	'hist-stable' => 'vèrsion vua',
	'review-diff2stable' => 'Vêde les modificacions entre les vèrsions stâbles et corentes.',
	'review-logentry-app' => 'Revua [[$1]]',
	'review-logentry-dis' => 'Vèrsion dèprèciyê de [[$1]]',
	'review-logentry-id' => 'Numerô de vèrsion : $1',
	'review-logpage' => 'Jornal de les rèvisions de l’articllo',
	'review-logpagetext' => 'Cen est un jornal de les modificacions por l’[[{{MediaWiki:Makevalidate-page}}|aprobacion]] de les rèvisions.',
	'reviewer' => 'Rèvisor',
	'revisionreview' => 'Revêre les vèrsions',
	'revreview-accuracy' => 'Prècision',
	'revreview-accuracy-0' => 'Pas aprovâ',
	'revreview-accuracy-1' => 'Vua',
	'revreview-accuracy-2' => 'Prècisa',
	'revreview-accuracy-3' => 'Bien fondâ',
	'revreview-accuracy-4' => 'Remarcâbla',
	'revreview-auto' => '(ôtomatico)',
	'revreview-auto-w' => "Vos modifiâd una vèrsion stâbla, tota modificacion serat '''ôtomaticament rèvisâ'''. Demandâd una prèvisualisacion devant que sôvar.",
	'revreview-auto-w-old' => "Vos modifiâd una vielye vèrsion, tota modificacion serat '''ôtomaticament rèvisâ'''. Demandâd una prèvisualisacion devant que sôvar.",
	'revreview-basic' => "Cen est la dèrriére [[{{MediaWiki:Validationpage}}|vèrsion vua]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo ''$2''. Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} començon] pôt étre [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiâ] ; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 changement atend|$3 changements atendont}}] una rèvision.",
	'revreview-basic-same' => 'Cen est la dèrriére vèrsion [[{{MediaWiki:Validationpage}}|survelyê]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} les vêre totes]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] dessus <i>$2</i>. La pâge pôt étre [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiâ].',
	'revreview-changed' => "'''L’accion demandâ at pas possu étre acomplia por ceta vèrsion de [[:$1|$1]].'''

Un modèlo ou una émâge pôt avêr étâ demandâ pendent que niona vèrsion prècisa ére chouèsia/cièrdua. Cen pôt arrevar s’un modèlo dinamico opère una transcllusion d’una ôtra émâge ou d’un ôtro modèlo dèpendent d’una variâbla qu’at changiê dês que vos éd comenciê a prèvisualisar ceta pâge.
Lo rechargement de la pâge et sa revisualisacion pôt corregiér cél problèmo.",
	'revreview-current' => 'Començon',
	'revreview-depth' => 'Provondior',
	'revreview-depth-0' => 'Pas aprovâ',
	'revreview-depth-1' => 'De bâsa',
	'revreview-depth-2' => 'Moderâ',
	'revreview-depth-3' => 'Hôta',
	'revreview-depth-4' => 'Remarcâbla',
	'revreview-edit' => 'Començon de modificacion',
	'revreview-flag' => 'Èstimar ceta vèrsion',
	'revreview-legend' => 'Èstimar lo contegnu de la vèrsion',
	'revreview-log' => 'Comentèro u jornal :',
	'revreview-main' => 'Vos dête chouèsir/cièrdre una vèrsion prècisa por rèvisar.

Vêde les [[Special:Unreviewedpages|vèrsions pas rèvisâs]] por una lista de pâges.',
	'revreview-newest-basic' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dèrriére vèrsion vua] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} les vêre totes]) ére [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|changement|changements}}] {{PLURAL:$3|demande|demandont}} una rèvision.",
	'revreview-newest-quality' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dèrriére vèrsion de qualitât] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} les vêre totes]) ére [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|changement|changements}}] {{PLURAL:$3|demande|demandont}} una rèvision.",
	'revreview-noflagged' => "Y at pas de vèrsion rèvisâ de ceta pâge, sa [[{{MediaWiki:Validationpage}}|qualitât]] est '''pas''' de sûr.",
	'revreview-note' => '[[User:$1|$1]] at ècrit cetes notes [[{{MediaWiki:Validationpage}}|de rèvision]] :',
	'revreview-notes' => 'Remârques et notes a afichiér :',
	'revreview-oldrating' => 'Son pouentâjo :',
	'revreview-patrol' => 'Marcar ceta modificacion coment survelyê',
	'revreview-patrolled' => 'La vèrsion sèlèccionâ de [[:$1|$1]] at étâ marcâ coment survelyê.',
	'revreview-quality' => "Cen est la dèrriére [[{{MediaWiki:Validationpage}}|vèrsion de qualitât]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo ''$2''. Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} començon] pôt étre [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiâ] ; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 changement atend|$3 changements atendont}}] una rèvision.",
	'revreview-quality-same' => 'Cen est la dèrriére vèrsion de [[{{MediaWiki:Validationpage}}|qualitât]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} les vêre totes]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] dessus <i>$2</i>. La pâge pôt étre [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiâ].',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Vua]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vêre la vèrsion corenta]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Survelyê]]''' (niona modificacion revua)",
	'revreview-quick-none' => "'''Corenta''' (pas de vèrsions èstimâs)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Qualitât]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vêre la vèrsion corenta]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Qualitât]]''' (niona modificacion revua)",
	'revreview-quick-see-basic' => "'''Corenta'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vêre la vèrsion stâbla]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|changement|changements}}])",
	'revreview-quick-see-quality' => "'''Corenta'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vêre la vèrsion stâbla]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|modificacion|modificacions}}])",
	'revreview-selected' => "Vèrsion chouèsia/cièrdua de '''$1 :'''",
	'revreview-source' => 'Sôrsa du començon',
	'revreview-stable' => 'Stâblo',
	'revreview-style' => 'Liésibilitât',
	'revreview-style-0' => 'Pas aprovâ',
	'revreview-style-1' => 'Accèptâbla',
	'revreview-style-2' => 'Bôna',
	'revreview-style-3' => 'Côrta',
	'revreview-style-4' => 'Remarcâbla',
	'revreview-submit' => 'Sôvar revua',
	'revreview-text' => 'Les vèrsions stâbles sont chouèsies/cièrdues per dèfôt, pletout que les dèrriéres vèrsions.',
	'revreview-toolow' => 'Por los atributs ce-desot, vos dête balyér un pouentâjo ples hôt que « pas aprovâ » por que la vèrsion seye considèrâ coment revua. Por dèprèciyér una vèrsion, betâd tôs los champs a « pas aprovâ ».',
	'revreview-update' => "Volyéd [[{{MediaWiki:Validationpage}}|controlar]] les modificacions fêtes ''(vêde ce-desot)'' dês que la dèrriére vèrsion stâbla èye étâ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ].

'''Doux-três émâges ou modèlos siuvents ont en èfèt étâ betâs a jorn :'''",
	'revreview-update-none' => "Volyéd [[{{MediaWiki:Validationpage}}|controlar]] les modificacions fêtes ''(vêde ce-desot)'' dês que la dèrriére vèrsion stâbla èye étâ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}}}} aprovâ].",
	'revreview-visibility' => 'Ceta pâge contint una [[{{MediaWiki:Validationpage}}|vèrsion stâbla]], que pôt étre [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurâ].',
	'revreview-revnotfound' => 'La vèrsion prècèdenta de cela pâge at pas possu étre retrovâ.
Volyéd controlar l’URL que vos éd utilisâ por arrevar a ceta pâge.',
	'rights-editor-autosum' => 'Ôtonomâ',
	'rights-editor-revoke' => 'at rèvocâ los drêts d’èditor de [[$1]]',
	'stable-logentry' => 'Les vèrsions stâbles de [[$1]] sont paramètrâs.',
	'stable-logentry2' => 'Remetre a zérô lo jornal de les vèrsions stâbles de [[$1]]',
	'stable-logpage' => 'Jornal de les vèrsions stâbles',
	'stable-logpagetext' => 'Cen est un jornal de les modificacions por les [[{{MediaWiki:Validationpage}}|vèrsions stâbles]] de les pâges.',
	'tooltip-ca-current' => 'Vêre lo començon corent de ceta pâge',
	'tooltip-ca-stable' => 'Vêre la vèrsion stâbla de ceta pâge',
	'tooltip-ca-default' => 'Paramètres por l’assurance-qualitât',
	'validationpage' => '{{ns:help}}:Validacion de l’articllo',
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
	'flaggedrevs-backlog' => "Actualmente hai unha acumulación nas [[Special:OldReviewedPages|páxinas revisadas fóra de data]]. '''Precísase a súa atención!'''",
	'flaggedrevs-desc' => 'Dá aos editores e revisores a capacidade para confirmar as revisións e estabilizar as páxinas',
	'flaggedrevs-pref-UI-0' => 'Usar a interface de usuario detallada da versión estábel',
	'flaggedrevs-pref-UI-1' => 'Usar a interface de usuario simple da versión estábel',
	'flaggedrevs-prefs' => 'Estabilidade',
	'flaggedrevs-prefs-stable' => 'Amosar sempre a versión estábel do contido das páxinas por defecto (se o hai)',
	'flaggedrevs-prefs-watch' => 'Engadir as páxinas que revise á miña páxina de vixilancia',
	'group-editor' => 'Editores',
	'group-editor-member' => 'editor',
	'group-reviewer' => 'Revisores',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'hist-draft' => 'revisión do borrador',
	'hist-quality' => 'revisión de calidade',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validado] por [[User:$3|$3]]',
	'hist-stable' => 'revisión revisada',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} revisado] por [[User:$3|$3]]',
	'review-diff2stable' => 'Ver os cambios entre as revisións estábel e a actual',
	'review-logentry-app' => 'revisou "[[$1]]"',
	'review-logentry-dis' => 'devaluou a versión de "[[$1]]"',
	'review-logentry-id' => 'revisión ID $1',
	'review-logentry-diff' => 'diferenzas coa versión estábel',
	'review-logpage' => 'Rexistro de revisións',
	'review-logpagetext' => 'Este é un rexistro dos cambios nas revisións de [[{{MediaWiki:Validationpage}}|aprobación]] do status para o contido das páxinas.
Vexa a [[Special:ReviewedPages|listaxe de páxinas revisadas]] para ver unha lista das páxinas aprobadas.',
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
	'revreview-basic' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] agardando por unha revisión.',
	'revreview-basic-i' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios nos modelos/imaxes] agardando por unha revisión.',
	'revreview-basic-old' => 'Esta é unha revisión [[{{MediaWiki:Validationpage}}|revisada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
Novos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios] foron feitos.',
	'revreview-basic-same' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|revisada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.',
	'revreview-basic-source' => 'Unha [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versión revisada] desta páxina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>, foi baseada nesta revisión.',
	'revreview-changed' => "'''A acción solicitada non se pode levar a cabo nesta revisión de [[:$1|$1]].'''

Un modelo ou imaxe puido ser solicitado cando ningunha versión específica foi especificada.
Isto pode ocorrer se un modelo dinámico transcribe outro modelo ou imaxe dependendo dunha variable que cambiou desde que comezou a revisar esta páxina.
Actualizar a páxina e volvela revisar pode resolver o problema.",
	'revreview-current' => 'Proxecto',
	'revreview-depth' => 'Profundidade',
	'revreview-depth-0' => 'Sen aprobar',
	'revreview-depth-1' => 'Básico',
	'revreview-depth-2' => 'Moderado',
	'revreview-depth-3' => 'Alto',
	'revreview-depth-4' => 'Destacado',
	'revreview-draft-title' => 'Páxina borrador',
	'revreview-edit' => 'Editar proxecto',
	'revreview-editnotice' => "'''Nota: as edicións que se fagan nesta páxina serán incorporadas á [[{{MediaWiki:Validationpage}}|versión estábel]] unha vez que un usuario autorizado as revise.'''",
	'revreview-flag' => 'Revisar esta revisión',
	'revreview-edited' => "'''As edicións serán incorporadas á [[{{MediaWiki:Validationpage}}|versión estábel]] unha vez que un usuario estabilizador as revise.
O ''bosquexo'' amósase embaixo.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|cambio agarda|cambios agardan}}] unha revisión.",
	'revreview-invalid' => "'''Obxectivo inválido:''' ningunha revisión [[{{MediaWiki:Validationpage}}|revisada]] se corresponde co ID dado.",
	'revreview-legend' => 'Valorar o contido da revisión',
	'revreview-log' => 'Comentario para o rexistro:',
	'revreview-main' => 'Debe seleccionar unha revisión particular dunha páxina de contido de cara á revisión.

Vexa a [[Special:Unreviewedpages|lista de páxinas sen revisar]].',
	'revreview-newest-basic' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión revisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambio|cambios}}] {{PLURAL:$3|precisa|precisan}} dunha revisión.',
	'revreview-newest-basic-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión revisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Os cambios nos modelos/imaxes] precisan dunha revisión.',
	'revreview-newest-quality' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidade]
	([{{fullurl:Special:Stableversions|páxina={{FULLPAGENAMEE}}}} de toda a listaxe]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada]
	 en <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|change|cambios}}] {{PLURAL:$3|needs|precisan}} revisión.',
	'revreview-newest-quality-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidade] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Os cambios nos modelos/imaxes changes] precisan dunha revisión.',
	'revreview-noflagged' => "Non hai revisións examinadas desta páxina,  polo que pode que '''non''' foran [[{{MediaWiki:Validationpage}}|revisadas]] na súa calidade.",
	'revreview-note' => '"[[User:$1|$1]]" fixo as seguintes notas [[{{MediaWiki:Validationpage}}|examinando]] esta revisión:',
	'revreview-notes' => 'Observacións ou notas para amosar:',
	'revreview-oldrating' => 'Foi valorado:',
	'revreview-patrol' => 'Marcar este cambio como patrullado',
	'revreview-patrol-title' => 'Marcar como patrullado',
	'revreview-patrolled' => 'A revisión seleccionada de [[:$1|$1]] foi marcada como revisada.',
	'revreview-quality' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|de calidade]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambios|cambios}}] agardando por unha revisión.',
	'revreview-quality-i' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|de calidade]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios nos modelos/imaxes] agardando por unha revisión.',
	'revreview-quality-old' => 'Esta é unha revisión [[{{MediaWiki:Validationpage}}|de calidade]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
Novos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambios] foron feitos.',
	'revreview-quality-same' => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|de calidade]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.',
	'revreview-quality-source' => 'Unha [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versión de calidade] desta páxina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>, foi baseado nesta revisión.',
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
	'revreview-style-2' => 'Bon',
	'revreview-style-3' => 'Conciso',
	'revreview-style-4' => 'Destacado',
	'revreview-submit' => 'Enviar',
	'revreview-submitting' => 'Enviando...',
	'revreview-finished' => 'Revisión completada!',
	'revreview-successful' => "'''A revisión seleccionada de \"[[:\$1|\$1]]\" foi analizada con éxito. ([{{fullurl:Special:Stableversions|page=\$2}} ver as versións estábeis])'''",
	'revreview-successful2' => "'''Á revisión de \"[[:\$1|\$1]]\" foille retirada a análise con éxito.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|As versións estábeis]] son o contido por omisión ao ver unha páxina en vez da revisión máis recente.''",
	'revreview-text2' => "''As [[{{MediaWiki:Validationpage}}|versións estábeis]] son revisións comprobadas de páxinas e poden ser fixadas como contido por defecto para os lectores.''",
	'revreview-toggle-title' => 'amosar/agochar detalles',
	'revreview-toolow' => 'Debe, polo menos, valorar cada un dos atributos de embaixo cunha puntuación maior a "sen aprobar" para que unha revisión sexa considerada como "revisada".
Para despreciar unha revisión, encha todos os campos con "sen aprobar".',
	'revreview-update' => "Por favor, [[{{MediaWiki:Validationpage}}|revise]] os cambios ''(amósanse embaixo)'' feitos desde a revisión estábel [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada]. 

'''Actualizáronse algúns modelos/imaxes:'''",
	'revreview-update-includes' => "'''Algúns modelos/imaxes foron actualizados:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Revise]] os cambios ''(amósanse embaixo)'' feitos desde a revisión estábel que foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada].",
	'revreview-update-use' => "'''AVISO:''' se algún destes modelos/imaxes ten unha versión estábel, entón, xa é usada na versión estábel desta páxina.",
	'revreview-diffonly' => "''Para revisar a páxina, faga clic na ligazón da revisión \"revisión actual\" e use o formulario de revisión.''",
	'revreview-visibility' => "'''Esta páxina ten unha [[{{MediaWiki:Validationpage}}|versión estábel]] actualizada; os parámetros de estabilidade desta páxina poden ser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-visibility2' => "'''Esta páxina non ten unha [[{{MediaWiki:Validationpage}}|versión estábel]] actualizada; os parámetros de estabilidade desta páxina poden ser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-revnotfound' => 'A revisión vella que pediu non se deu atopado.
Por favor verifique o URL que utilizou para acceder a esta páxina.',
	'right-autopatrolother' => 'Marcar automaticamente como patrulladas as revisións nos espazos de nomes que non son principais',
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
Unha listaxe das páxinas estabilizadas pode ser atopada na [[Special:StablePages|listaxe de páxinas estábeis]].',
	'readerfeedback' => 'Que pensa desta páxina?',
	'readerfeedback-text' => "''Por favor, tome un momento para valorar, embaixo, esta páxina. A súa reacción é valiosa e axúdanos a mellorar a nosa páxina web.''",
	'readerfeedback-reliability' => 'Fiabilidade',
	'readerfeedback-completeness' => 'Exhaustividade',
	'readerfeedback-npov' => 'Neutralidade',
	'readerfeedback-presentation' => 'Presentación',
	'readerfeedback-overall' => 'En xeral',
	'readerfeedback-level-none' => '(non seguro)',
	'readerfeedback-level-0' => 'Pobre',
	'readerfeedback-level-1' => 'Baixo',
	'readerfeedback-level-2' => 'Ben',
	'readerfeedback-level-3' => 'Alto',
	'readerfeedback-level-4' => 'Excelente',
	'readerfeedback-submit' => 'Enviar',
	'readerfeedback-main' => 'Só as páxinas con contido poden ser puntuadas.',
	'readerfeedback-success' => "'''Grazas por revisar esta páxina!''' ([$3 Ten comentarios ou preguntas?])",
	'readerfeedback-voted' => "'''Parece que xa valorou esta páxina'''. ([$3 Ten comentarios ou preguntas?])",
	'readerfeedback-submitting' => 'Enviando...',
	'readerfeedback-finished' => 'Grazas!',
	'revreview-filter-all' => 'Todas',
	'revreview-filter-approved' => 'Aprobadas',
	'revreview-filter-reapproved' => 'Reaprobadas',
	'revreview-filter-unapproved' => 'Non aprobadas',
	'revreview-filter-auto' => 'Automático',
	'revreview-filter-manual' => 'Manual',
	'revreview-filter-level-0' => 'Versións revisadas',
	'revreview-filter-level-1' => 'Versións de calidade',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Tipo:',
	'revreview-tagfilter' => 'Etiqueta:',
	'revreview-reviewlink' => 'revisar',
	'tooltip-ca-current' => 'Ver o proxecto actual desta páxina',
	'tooltip-ca-stable' => 'Ver a versión estábel desta páxina',
	'tooltip-ca-default' => 'Configuración de garantía da calidade',
	'tooltip-ca-ratinghist' => 'Valoracións dos lectores desta páxina',
	'revreview-locked' => 'As edicións deben estar revisadas antes de ser amosadas nesta páxina!',
	'revreview-unlocked' => 'As edicións non requiren estar revisadas antes de ser amosadas nesta páxina!',
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
	'flaggedrevs-prefs' => 'Σταθερότης',
	'group-editor' => 'Μεταγραφεῖς',
	'group-editor-member' => 'μεταγραφεύς',
	'group-reviewer' => 'Ἐπιθεωρηταί',
	'group-reviewer-member' => 'ἐπιθεωρητής',
	'hist-draft' => 'πρόχειρος ἐπιθεώρησις',
	'reviewer' => 'ἐπιθεωρητής',
	'revreview-accuracy-2' => 'Ἀκριβής',
	'revreview-accuracy-4' => 'Ἐξαίρετος',
	'revreview-auto' => '(αὐτόματος)',
	'revreview-current' => 'Πρόχειρος',
	'revreview-depth' => 'Βάθος',
	'revreview-depth-1' => 'βασική',
	'revreview-depth-3' => 'Ὑψηλὴ',
	'revreview-depth-4' => 'Ἐξαίρετος',
	'revreview-log' => 'Σχόλιον:',
	'revreview-oldrating' => 'Ἐβαθμώθη:',
	'revreview-quality' => "Ἥδε ἐστὶ ἡ [[{{MediaWiki:Validationpage}}|ποιοτικὴ ἔκδοσις]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ἐπικυρωμένη] κατὰ τὴν ''$2''. Ἡ [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} πρόχειρη ἔκδοσις] περιέχει [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 μεταβολὴν ἀναμένουσαν|$3 μεταβολὰς ἀναμένουσας}}] ἐπιθεώρησιν.",
	'revreview-quality-title' => 'ποιοτικὴ ἔκδοσις',
	'revreview-source' => 'πρόχειρος πηγή',
	'revreview-style-4' => 'Ἐξαίρετος',
	'revreview-submitting' => 'Ὑποβἀλλειν...',
	'readerfeedback-completeness' => 'πληρότης',
	'readerfeedback-npov' => 'οὐδετερότης',
	'readerfeedback-presentation' => 'παρουσίασις',
	'readerfeedback-level-none' => '(ἀβέβαιος)',
	'readerfeedback-level-0' => 'ἀνεπαρκής',
	'readerfeedback-level-1' => 'Χθαμηλή',
	'readerfeedback-level-2' => 'δίκαιη',
	'readerfeedback-level-3' => 'Ὑψηλή',
	'readerfeedback-level-4' => 'ἐξαἰρετος',
	'readerfeedback-submit' => 'Ὑποβάλλειν',
	'revreview-filter-all' => 'Ἅπασαι',
	'revreview-filter-manual' => 'χειροκίνητος',
	'revreview-statusfilter' => 'Καθεστώς:',
	'revreview-typefilter' => 'Τύπος:',
	'revreview-tagfilter' => 'Προσάρτημα:',
	'revreview-reviewlink' => 'ἐπιθεωρεῖν',
);

/** Swiss German (Alemannisch)
 * @author Melancholie
 */
$messages['gsw'] = array(
	'hist-draft' => 'Entwurfsvèrsion',
	'hist-stable' => 'Patrulierti Vèrsion',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} aaglueget]: [[Benutzer:$3|$3]]',
	'revreview-accuracy-1' => 'gsichtet',
	'revreview-basic' => 'Des isch d letscht [[{{MediaWiki:Validationpage}}|patrulierti]] Vèrsion, [{{fullurl:Spezial:Log|type=review&page={{FULLPAGENAMEE}}}} freigäbe] <i>$2</i>.
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Änderig isch|Änderige sind}}] no zum Nocheluege.',
	'revreview-draft-title' => 'Entwurfsvèrsion',
	'revreview-flag' => 'Vèrsion as gsichtet markiere',
	'revreview-newest-basic' => 'D’[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letscht patrulierti Vèrsion]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} → all]) isch am <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigäbe] worre.
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Vèrsion|Vèrsione}}] {{PLURAL:$3|isch|sind}} no zum Nocheluege.',
	'revreview-stable-title' => 'Patrulierti Vèrsion',
	'revreview-stable2' => 'Wit du d’[{{fullurl:$1|stable=1}} patruliert Vèrsion] vo dere Syte seah (wenn’s noo uine git)?',
	'revreview-submit' => 'Vèrsion markiere',
	'revreview-submitting' => '… bitte warte …',
	'revreview-finished' => 'Markierig isch gsetzt worre ✔',
	'revreview-update-none' => "Bitte due d Änderige ga [[{{MediaWiki:Validationpage}}|nocheluege]] wo sit de letschti [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} patrulierti Vèrsion] gmacht worre sind ''(lüeg unde)''.",
	'readerfeedback-submitting' => '… bitte warte …',
	'readerfeedback-finished' => 'Merci!',
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
	'flaggedrevs-backlog' => "הצטברו דפים ב[[Special:OldReviewedPages|רשימת הדפים שנבדקו ושפג תוקפם]]. '''תשומת לבכם נדרשת!'''",
	'flaggedrevs-desc' => 'אפשרות לעורכים ולבודקי הדפים לאשר גרסאות ולייצב דפים',
	'flaggedrevs-pref-UI-0' => 'שימוש בתצוגת גרסאות מסומנות מפורטת.',
	'flaggedrevs-pref-UI-1' => 'שימוש בתצוגת גרסאות מסומנות פשוטה',
	'flaggedrevs-prefs' => 'יציבות',
	'flaggedrevs-prefs-stable' => 'הצגת הגרסה המסומנת כברירת מחדל בדפי תוכן (אם היא קיימת)',
	'flaggedrevs-prefs-watch' => 'הוספת דפים שבדקתי לרשימת המעקב שלי',
	'group-editor' => 'עורכים',
	'group-editor-member' => 'עורך',
	'group-reviewer' => 'בודקי דפים',
	'group-reviewer-member' => 'בודק דפים',
	'grouppage-editor' => '{{ns:project}}:עורך',
	'grouppage-reviewer' => '{{ns:project}}:בודק גרסאות',
	'hist-draft' => 'גרסת טיוטה',
	'hist-quality' => 'גרסה איכותית',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} אושרה] על ידי [[User:$3|$3]]',
	'hist-stable' => 'גרסה נצפית',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} נצפתה] על ידי [[User:$3|$3]]',
	'review-diff2stable' => 'הצגת ההבדלים בין הגרסה היציבה והגרסה הנוכחית',
	'review-logentry-app' => 'בדק את [[$1]]',
	'review-logentry-dis' => 'סימן גרסה של [[$1]] כבעייתית',
	'review-logentry-id' => 'מספר גרסה $1',
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
	'revreview-basic' => 'זוהי הגרסה ה[[{{MediaWiki:Validationpage}}|נצפית]] האחרונה, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב<i>$2</i>.
ב[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} טיוטה] יש [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|שינוי אחד|$3 שינויים}}] {{PLURAL:$3|הטעון אישור|הטעונים אישור}}.',
	'revreview-basic-i' => 'זוהי הגרסה ה[[{{MediaWiki:Validationpage}}|נצפית]] האחרונה, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב<i>$2</i>.
ב[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} טיוטה] יש [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים בתבניות/בתמונות] הטעונים אישור.',
	'revreview-basic-old' => 'זוהי גרסה [[{{MediaWiki:Validationpage}}|נצפית]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} הצגת הכול]), נבדקה ב־<i>$2</i>.
ייתכן שנעשו בה [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים חדשים].',
	'revreview-basic-same' => 'זוהי הגרסה ה[[{{MediaWiki:Validationpage}}|נצפית]] האחרונה ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} הצגת הכול]), נבדקה ב־<i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} גרסה נצפית] של דף זה, ש[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>, מבוססת על גרסה זו.',
	'revreview-changed' => "'''לא ניתן לבצע את הפעולה המבוקשת בגרסה זו של [[:$1|$1]].'''

ייתכן שביקשתם תבנית או תמונה ללא ציון גרסה מסוימת.
בעיה זו יכולה להופיע אם תבנית דינמית מכלילה תמונה או תבנית אחרת בהתאם לערכו של משתנה, שהשתנה מאז שהתחלתם בבדיקת דף זה.
רענון הדף וסימון בדיקה חוזרת עשויים לפתור את הבעיה.",
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} הגרסה הנצפית האחרונה] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} הצגת כולן]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב־<i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|שינוי אחד|$3 שינויים}}] {{PLURAL:$3|טעונים|טעון}} בדיקה.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} הגרסה הנצפית האחרונה] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} הצגת כולן]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב־<i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים בתבניות/בתמונות] טעונים בדיקה.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} הגרסה האיכותית האחרונה] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} הצגת כולן]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב־<i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|שינוי אחד|$3 שינויים}}] {{PLURAL:$3|טעונים|טעון}} בדיקה.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} הגרסה האיכותית האחרונה] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} הצגת כולן]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} נבדקה] ב־<i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים בתבניות/בתמונות] טעונים בדיקה.',
	'revreview-noflagged' => "אין בדף זה גרסאות שנבדקו, וייתכן שהוא '''לא''' עבר [[{{MediaWiki:Validationpage}}|בדיקה]] של האיכות.",
	'revreview-note' => '[[User:$1|$1]] רשם את ההערות הבאות במהלך [[{{MediaWiki:Validationpage}}|בדיקה]] של גרסה זו:',
	'revreview-notes' => 'תובנות או הערות להצגה:',
	'revreview-oldrating' => 'קיבל דירוג של:',
	'revreview-patrol' => 'סימון שינוי זה כבדוק',
	'revreview-patrol-title' => 'סימון כבדוק',
	'revreview-patrolled' => 'הגרסה שנבחרה של [[:$1|$1]] סומנה כבדוקה.',
	'revreview-quality' => 'זו הגרסה ה[[{{MediaWiki:Validationpage}}|איכותית]] האחרונה, ש[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>.
ב[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} טיוטה] יש [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|שינוי אחד|$3 שינויים}}] {{PLURAL:$3|הטעון אישור|הטעונים אישור}}.',
	'revreview-quality-i' => 'זוהי הגרסה ה[[{{MediaWiki:Validationpage}}|איכותית]] האחרונה, ש[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>.
ב[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} טיוטה] יש [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים בתבניות או בתמונות] הטעונים אישור.',
	'revreview-quality-old' => 'זוהי גרסה [[{{MediaWiki:Validationpage}}|איכותית]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} הצגת הכול]), ש[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>.
ייתכן שנעשו בה [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} שינויים חדשים].',
	'revreview-quality-same' => 'זוהי הגרסה ה[[{{MediaWiki:Validationpage}}|איכותית]] האחרונה ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} הצגת הכול]), ש[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} גרסה איכותית] של דף זה, ש[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} אושרה] ב־<i>$2</i>, מבוססת על גרסה זו.',
	'revreview-quality-title' => 'דף איכותי',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|דף שנצפה]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} צפייה בטיוטה]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|דף שנצפה]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} צפייה בטיוטה]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|דף שנצפה]]'''",
	'revreview-quick-invalid' => "'''מספר גרסה בלתי תקין'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|גרסה נוכחית]]''' (טרם נבדקה)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|דף איכותי]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} צפייה בטיוטה]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|דף איכותי]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} צפייה בטיוטה]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|דף איכותי]]'''",
	'revreview-quick-see-basic' => "'''טיוטה''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} צפייה בדף]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} השוואה])",
	'revreview-quick-see-quality' => "'''טיוטה''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} צפייה בדף]]
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
	'revreview-finished' => 'סיום הבדיקה!',
	'revreview-successful' => "'''הגרסה של [[:$1|$1]] סומנה בהצלחה. ([{{fullurl:Special:Stableversions|page=$2}} צפייה בגרסאות היציבות])'''",
	'revreview-successful2' => "'''סימון הגרסה [[:$1|$1]] הוסר בהצלחה.'''",
	'revreview-text' => "'''[[{{MediaWiki:Validationpage}}|גרסאות יציבות]] מוצגות כברירת מחדל לקוראים במקום הגרסה האחרונה.'''",
	'revreview-text2' => "'''[[{{MediaWiki:Validationpage}}|גרסאות יציבות]] הן גרסאות בדוקות של דפים וניתן לבחור שיוצגו כברירת מחדל לקוראים.'''",
	'revreview-toggle-title' => 'הצגת/הסתרת פרטים',
	'revreview-toolow' => 'עליכם לדרג כל אחת מהתכונות הבאות גבוה יותר מ"לא אושר" כדי שהגרסה תיחשב לגרסה שנבדקה.
כדי לסמן גרסה מסויימת כבעייתית, אנא הגדירו את כל השדות ל"לא אושר".',
	'revreview-update' => "אנא [[{{MediaWiki:Validationpage}}|בדקו]] את כל השינויים '''(המוצגים להלן)''' שנעשו מאז שהגרסה היציבה [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} נבדקה].<br />
'''מספר תבניות/תמונות עודכנו:'''",
	'revreview-update-includes' => "'''מספר תבניות/תמונות עודכנו:'''",
	'revreview-update-none' => "אנא [[{{MediaWiki:Validationpage}}|בדקו]] את כל השינויים '''(המוצגים להלן)''' שנעשו מאז שהגרסה היציבה [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} נבדקה].",
	'revreview-update-use' => "'''הערה:''' אם קיימת גרסה יציבה לאחת מהתבניות/התמונות האלו, היא כבר נמצאת בשימוש בגרסה היציבה של דף זה.",
	'revreview-diffonly' => 'כדי לאשר את הדף, לחצו על הקישור "הגרסה הנוכחית" והשתמשו בטופס הבדיקה.',
	'revreview-visibility' => "'''לדף זה יש [[{{MediaWiki:Validationpage}}|גרסה יציבה]] מעודכנת; ניתן [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} לשנות] את הגדרות היציבות של הדף.'''",
	'revreview-visibility2' => "'''אין לדף זה [[{{MediaWiki:Validationpage}}|גרסה יציבה]] מעודכנת; ניתן [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} לשנות] את הגדרות היציבות של הדף.'''",
	'revreview-revnotfound' => 'הגרסה הישנה של דף זה לא נמצאה. אנא בדקו את כתובת הקישור שהוביל אתכם הנה.',
	'right-autopatrolother' => 'סימון אוטומטי של שינויים כשינויים בדוקים במרחבי שם שאינם המרחב הראשי',
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
	'readerfeedback' => 'מה אתם חושבים על הדף הזה?',
	'readerfeedback-text' => "'''אנא השקיעו רגע מזמנכם כדי לדרג דף זה. למשוב שתתנו יש ערך רב והוא יעזור לנו לשפר את האתר.'''",
	'readerfeedback-reliability' => 'מהמינות',
	'readerfeedback-completeness' => 'שלמות',
	'readerfeedback-npov' => 'נייטרליות',
	'readerfeedback-presentation' => 'אופן ההצגה',
	'readerfeedback-overall' => 'בסך הכל',
	'readerfeedback-level-none' => '(בחירה)',
	'readerfeedback-level-0' => 'גרוע',
	'readerfeedback-level-1' => 'נמוך',
	'readerfeedback-level-2' => 'בינוני',
	'readerfeedback-level-3' => 'גבוה',
	'readerfeedback-level-4' => 'מצוין',
	'readerfeedback-submit' => 'שליחה',
	'readerfeedback-main' => 'רק דפי תוכן ניתנים לדירוג.',
	'readerfeedback-success' => "'''תודה שבדקתם דף זה!''' ([$3 הערות או שאלות?])",
	'readerfeedback-voted' => "'''נראה שכבר דירגתם דף זה''' ([$3 הערות או שאלות?]).",
	'readerfeedback-submitting' => 'נשלח...',
	'readerfeedback-finished' => 'תודה!',
	'revreview-filter-all' => 'הכול',
	'revreview-filter-approved' => 'מאושר',
	'revreview-filter-reapproved' => 'אושר מחדש',
	'revreview-filter-unapproved' => 'לא אושר',
	'revreview-filter-auto' => 'אוטומטי',
	'revreview-filter-manual' => 'ידנית',
	'revreview-filter-level-0' => 'גרסאות שנצפו',
	'revreview-filter-level-1' => 'גרסאות איכותיות',
	'revreview-statusfilter' => 'מצב:',
	'revreview-typefilter' => 'סוג:',
	'revreview-tagfilter' => 'תווית:',
	'revreview-reviewlink' => 'בדיקה',
	'tooltip-ca-current' => 'צפייה בטיוטה הנוכחית של דף זה',
	'tooltip-ca-stable' => 'צפייה בגרסה היציבה של דף זה',
	'tooltip-ca-default' => 'הגדרות בקרת איכות',
	'tooltip-ca-ratinghist' => 'דירוג קוראים לדף זה',
	'revreview-locked' => 'עריכות בדף זה דורשות בדיקה לפני הצגתן!',
	'revreview-unlocked' => 'עריכות בדף זה אינן דורשות בדיקה לפני הצגתן!',
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
	'flaggedrevs-prefs' => 'स्थिरता',
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
	'revreview-basic' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलाव है|बदलाव हैं}}] जिनकी जाँच बाकी हैं।',
	'revreview-basic-i' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साँचा/चित्र बदलाव] हैं जिनकी जाँच बाकी हैं।',
	'revreview-basic-old' => 'यह एक [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
इसमें नये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} बदलाव] होने की संभावना हैं।',
	'revreview-basic-same' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।',
	'revreview-basic-source' => 'इस पन्नेका एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} चुना हुआ अवतरण], जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हुआ हैं, इस अवतरण पर आधारित था।',
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम चुना हुआ अवतरण] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलाव की|बदलावोंकी}}] जाँच बाकी हैं।',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम चुना हुआ अवतरण] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साँचा/चित्र बदलाव] की जाँच बाकी हैं।',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम गुणवत्तापूर्ण अवतरण] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलाव की|बदलावोंकी}}] जाँच बाकी हैं।',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम गुणवत्तापूर्ण अवतरण] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साँचा/चित्र बदलाव] की जाँच बाकी हैं।',
	'revreview-noflagged' => "इस पन्ने के जाँचे हुए अवतरण नहीं हैं, इसलिये यह पन्ना गुणवत्ता के लिये [[{{MediaWiki:Validationpage}}|जाँचा]] '''नहीं''' गया होने की संभावना हैं।",
	'revreview-note' => '[[User:$1|$1]] ने यह अवतरण [[{{MediaWiki:Validationpage}}|जाँचते समय]] निम्नलिखित सूचनायें दी हुई हैं:',
	'revreview-notes' => 'आपके प्रेक्षण दर्शाने के लिये:',
	'revreview-oldrating' => 'इसका गुणांकन:',
	'revreview-patrol' => 'यह बदलाव देख लेने का मार्क करें',
	'revreview-patrol-title' => 'जाँचने का मार्क करें',
	'revreview-patrolled' => '[[:$1|$1]] के चुने हुए अवतरणपर गश्त देने का मार्क किया हैं।',
	'revreview-quality' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलाव है|बदलाव हैं}}] जिनकी जाँच बाकी हैं।',
	'revreview-quality-i' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साँचा/चित्र बदलाव] हैं जिनकी जाँच बाकी हैं।',
	'revreview-quality-old' => 'यह एक [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
इसमें नये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} बदलाव] होने की संभावना हैं।',
	'revreview-quality-same' => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।',
	'revreview-quality-source' => 'इस पन्नेका एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} गुणवत्तापूर्ण अवतरण], जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हुआ हैं, इस अवतरण पर आधारित था।',
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
([{{fullurl:Special:Stableversions|page=$2}} सभी मार्क किये हुए अवतरण देखें])'''",
	'revreview-successful2' => "'''[[:$1|$1]] के चुने हुए अवतरण का मार्क हटाया।'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] नवीनतम अवतरणसे चुनने के बजाय मूल पाठ के हिसाब से चुना जाता हैं।''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] पन्नेके जाँचे हुए अवतरण होते हैं और देखनेवालोंके लिये अविचल पाठ दर्शाते हैं।''",
	'revreview-toggle-title' => 'ज्यादा ज़ानकारी दर्शायें/छुपायें',
	'revreview-toolow' => 'एक अवतरण को जाँचने का मार्क करने के लिये आपको नीचे लिखे हर पॅरॅमीटरको "अप्रमाणित" से उपरी दर्जा देना आवश्यक हैं।
एक अवतरणका गुणांकन कम करने के लिये, निम्नलिखित सभी कॉलममें "अप्रमाणित" चुनें।',
	'revreview-update' => "कृपया किये हुए बदलाव ''(नीचे दिये हुए)'' [[{{MediaWiki:Validationpage}}|जाँचे]] क्योंकी स्थिर अवतरण [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] कर दिया गया हैं।<br />
'''कुछ साँचा/चित्र बदले हैं:'''",
	'revreview-update-includes' => "'''कुछ साँचा/चित्र बदले हैं:'''",
	'revreview-update-none' => "कृपया किये हुए बदलाव ''(नीचे दिये हुए)'' [[{{MediaWiki:Validationpage}}|जाँचे]] क्योंकी स्थिर अवतरण [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] कर दिया गया हैं।",
	'revreview-update-use' => "'''सूचना:''' अगर इसमें से किसी साँचा/चित्रका स्थिर अवतरण हैं, तो वह इस पन्नेके स्थिर अवतरण में पहले से इस्तेमाल किया हुआ हैं।",
	'revreview-visibility' => "'''इस पन्नेको एक [[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] हैं, जो [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} बदला] जा सकता हैं।'''",
	'revreview-revnotfound' => 'आपसे पूछा गया इस लेख का पुराना अवतरण नहीं मिल पाया। कॄपया आपने इस्तेमाल किये URL की जाँच करें।',
	'right-autopatrolother' => 'मुख्य नामस्थान छोडकर अन्य नामस्थानोंके पन्नोंके अवतरणोंपर अपने आप ध्यान रखने का मार्क करें',
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
 */
$messages['hr'] = array(
	'editor' => 'Urednik',
	'flaggedrevs' => 'Označene promjene',
	'group-editor' => 'Urednici',
	'group-editor-member' => 'Urednik',
	'group-reviewer' => 'Ocjenjivači',
	'group-reviewer-member' => 'Ocjenjivač',
	'grouppage-editor' => '{{ns:project}}:Urednik',
	'grouppage-reviewer' => '{{ns:project}}:Ocjenjivač',
	'hist-quality' => 'kvalitetna',
	'hist-stable' => 'pregledana',
	'review-diff2stable' => 'Promjene između važeće i trenutne inačice',
	'review-logentry-app' => 'ocijenio [[$1]]',
	'review-logentry-dis' => 'zastarjela inačica stranice [[$1]]',
	'review-logentry-id' => 'ocjena broj $1',
	'review-logpage' => 'Evidencija ocjenjivanja članaka',
	'review-logpagetext' => 'Ovo je evidencija promjena [[{{MediaWiki:Validationpage}}|ocjena]] članaka.',
	'reviewer' => 'Ocjenjivač',
	'revisionreview' => 'Ocijeni inačice',
	'revreview-accuracy' => 'Točnost',
	'revreview-accuracy-0' => 'Članak ne zadovoljava',
	'revreview-accuracy-1' => 'Članak zadovoljava',
	'revreview-accuracy-2' => 'Dobar',
	'revreview-accuracy-3' => 'Vrlo dobar (potkrijepljen izvorima)',
	'revreview-accuracy-4' => 'Izvrstan',
	'revreview-auto' => '(automatski)',
	'revreview-auto-w' => "Uređujete važeću inačicu stranice, svaka vaša promjena biti će '''automatski ocijenjena'''.
Možda želite pregledati vaše izmjene prije snimanja.",
	'revreview-auto-w-old' => "Uređujete staru inačicu članka, svaka promjena bit će '''automatski ocijenjena'''.
Možda želite pregledati vaše izmjene prije snimanja.",
	'revreview-basic' => 'Ovo je zadnja [[{{MediaWiki:Validationpage}}|pregledana]] promjena,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} odobrena] dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Članak u radu]
možete [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} uređivati]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|promjena|promjene|promjena}}]
{{PLURAL:$3|čeka|čekaju|čeka}} ocjenjivanje.',
	'revreview-changed' => "'''Traženu akciju nije moguće izvršiti na ovoj inačici stranice [[:$1|$1]].'''

Tražen je predložak ili slika bez navođenja verzije. To se može dogoditi ukoliko
predložak uključuje sliku ili drugi predložak koji ovisi o varijabli koja se promijenila
nakon što ste počeli ocjenjivati članak. Osvježavanje (Ctrl + R) može riješiti ovaj problem.",
	'revreview-current' => 'Članak u radu',
	'revreview-depth' => 'Dubina',
	'revreview-depth-0' => 'Članak ne zadovoljava',
	'revreview-depth-1' => 'Članak zadovoljava',
	'revreview-depth-2' => 'Dobar',
	'revreview-depth-3' => 'Vrlo dobar',
	'revreview-depth-4' => 'Izvrstan',
	'revreview-edit' => 'Uredi članak u radu',
	'revreview-flag' => 'Ocijeni izmjenu',
	'revreview-legend' => 'Ocijeni sadržaj inačice',
	'revreview-log' => 'Komentar:',
	'revreview-main' => 'Morate odabrati neku izmjenu stranice u glavnom imenskom prostoru za ocjenjivanje.

Pogledajte popis [[Special:Unreviewedpages|neocijenjenih stranica]] za to.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zadnji pregled promjena na članku]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} prikaži sve]) je [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} izvršen]
dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|promjena|promjene|promjena}}] {{PLURAL:$3|treba|trebaju|treba}} ocjenu.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zadnje ocjenjivanje članka]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} prikaži sve]) je [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} izvršeno]
dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|promjena|promjene|promjena}}] {{PLURAL:$3|treba|trebaju|treba}} ocjenu.',
	'revreview-noflagged' => "Nema ocijenjenih inačica stranice, stoga stranica najvjerojatnije '''nije''' [[{{MediaWiki:Validationpage}}|provjerena]].",
	'revreview-note' => '[[User:$1|$1]] je zabilježio slijedeće pri [[{{MediaWiki:Validationpage}}|ocjenjivanju]] ove inačice:',
	'revreview-notes' => 'Primjedbe ili napomene koje treba prikazati:',
	'revreview-oldrating' => 'Prethodna ocjena:',
	'revreview-patrol' => 'Označi ovu izmjenu pregledanom',
	'revreview-patrolled' => 'Odabrana izmjena stranice [[:$1|$1]] je označena pregledanom (patroliranom).',
	'revreview-quality' => 'Ovo je zadnja [[{{MediaWiki:Validationpage}}|ocijenjena]] promjena,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} odobrena] dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Članak u radu]
možete [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} uređivati]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|promjena|promjene|promjena}}]
{{PLURAL:$3|čeka|čekaju|čeka}} ocjenjivanje.',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pregled]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vidi članak u izradi]]",
	'revreview-quick-none' => "'''Važeća inačica''' (nema ocijenjenih inačica)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Ocjena]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vidi članak u izradi]]",
	'revreview-quick-see-basic' => "'''Članak u izradi''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vidi važeću inačicu]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|promjena|promjene|promjena}}])",
	'revreview-quick-see-quality' => "'''Članak u izradi''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vidi važeću inačicu]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|promjena|promjene|promjena}}])",
	'revreview-selected' => "Odabrane promjene '''$1:'''",
	'revreview-source' => 'izvor članka u radu',
	'revreview-stable' => 'Važeća inačica',
	'revreview-style' => 'Čitljivost',
	'revreview-style-0' => 'Neodobren',
	'revreview-style-1' => 'Prihvatljiv',
	'revreview-style-2' => 'Dobar',
	'revreview-style-3' => 'Vrlo dobar',
	'revreview-style-4' => 'Izvrstan',
	'revreview-submit' => 'Podnesi ocijenu',
	'revreview-text' => "Važeća (''stabilna'') inačica stranice prikazuje se svima umjesto najnovije inačice.",
	'revreview-toolow' => 'Morate ocijeniti po svakom od donjih kriterija ocjenom višom od "Ne zadovoljava"
da bi promjena bila pregledana/ocijenjena. U suprotnom, ostavite sve na "Ne zadovoljava".',
	'revreview-update' => "Molim [[{{MediaWiki:Validationpage}}|pregledajte]] sve promjene ''(prikazane dolje)'' učinjene od kad je  stabilna inačica [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} odobrena]. 

'''Neki predlošci/slike su promijenjeni:'''",
	'revreview-update-none' => "Molim, [[{{MediaWiki:Validationpage}}|pregledajte]] sve promjene ''(prikazane dolje)'' učinjene od kad je stabilna inačica [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} odobrena].",
	'revreview-visibility' => 'Ovaj članak ima [[{{MediaWiki:Validationpage}}|važeću inačicu]], koja može biti
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigurirana].',
	'revreview-revnotfound' => 'Ne mogu pronaći staru izmjenu stranice koju ste zatražili.
Molimo provjerite URL koji vas je doveo ovamo.',
	'rights-editor-autosum' => 'samopromoviran',
	'rights-editor-revoke' => 'oduzet status urednika suradniku [[$1]]',
	'stable-logentry' => 'postavljena važeća inačica stranice [[$1]]',
	'stable-logentry2' => 'poništi važeću inačicu članka [[$1]]',
	'stable-logpage' => 'Evidencija stabilnih verzija',
	'stable-logpagetext' => 'Ovo je evidencija promjena [[{{MediaWiki:Validationpage}}|važećih inačica]] 
članaka u glavnom imenskom prostoru.',
	'tooltip-ca-current' => 'Vidi trenutnu inačicu ove stranice',
	'tooltip-ca-stable' => 'Vidi važeću inačicu stranice',
	'tooltip-ca-default' => 'Postavke važeće inačice',
	'validationpage' => '{{ns:help}}:Ocjenjivanje članaka',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Dundak
 * @author Michawiki
 */
$messages['hsb'] = array(
	'editor' => 'wobdźěłowar',
	'flaggedrevs' => 'Woznamjenjene wersije',
	'flaggedrevs-backlog' => "Je tuchwilu jara wjele [[Special:OldReviewedPages|zestarjenych skontrolowanych stronow]]. '''Twoja kedźbliwosć je trěbna!'''",
	'flaggedrevs-desc' => 'Dawa wobdźěłowarjam/pruwowarjam móžnosć wersije pohódnoćić a strony stabilizować',
	'flaggedrevs-pref-UI-0' => 'Nadrobny wužiwarski interfejs stabilnych wersijow wužiwać',
	'flaggedrevs-pref-UI-1' => 'Jednory wužiwarski interfejs stabilnych wersijow wužiwać',
	'flaggedrevs-prefs' => 'Stabilita',
	'flaggedrevs-prefs-stable' => 'Stabilnu wersiju nastawkow přeco jako standard pokazać (jeli tajka eksistuje)',
	'flaggedrevs-prefs-watch' => 'Přehladane strony wobkedźbować',
	'group-editor' => 'wobdźěłowarjo',
	'group-editor-member' => 'wobdźěłowar',
	'group-reviewer' => 'přehladowarjo',
	'group-reviewer-member' => 'přehladowar',
	'grouppage-editor' => '{{ns:project}}:Wobdźěłowar',
	'grouppage-reviewer' => '{{ns:project}}:Přehladowar',
	'hist-draft' => 'naćiskowa wersija',
	'hist-quality' => 'pruwowana wersija',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} přepruwowany] wot [[User:$3|$3]]',
	'hist-stable' => 'wuhladana wersija',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} přehladany] wot [[User:$3|$3]]',
	'review-diff2stable' => 'Rozdźěle mjez stabilnej a aktualnej wersiju wobhladać',
	'review-logentry-app' => 'je $1 přepruwował',
	'review-logentry-dis' => 'je wersiju wot $1 zaćisnył',
	'review-logentry-id' => 'Wersijowy ID $1',
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
	'revreview-accuracy-3' => 'žórła přepruwowane',
	'revreview-accuracy-4' => 'wuběrna',
	'revreview-approved' => 'Schwaleny',
	'revreview-auto' => '(awtomatisce)',
	'revreview-auto-w' => "Wobdźěłuješ runje stabilnu wersiju, změny so '''awtomatisce pruwuja.'''",
	'revreview-auto-w-old' => "Wobdźěłuješ přepruwowanu wersiju; změny budu so '''awtomatisce pruwować'''.",
	'revreview-basic' => 'To je poslednja [[{{MediaWiki:Validationpage}}|wuhladana]] wersija,
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dopušćena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tuchwilna wersija]
	móže so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}]
	{{PLURAL:$3|dyrbi|dyrbi|dyrbjadyrbjetej}} so hišće pruwować.',
	'revreview-basic-i' => 'To je aktualna [[{{MediaWiki:Validationpage}}|přehladana]] wersija, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Naćisk] wobsahuje [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny předłohow/wobrazow], kotrež na kontrolu čakaja.',
	'revreview-basic-old' => 'To je [[{{MediaWiki:Validationpage}}|přehladana]] wersija ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} wšě nalistować]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>.
Je móžno, zo su so nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny] přewjedli.',
	'revreview-basic-same' => 'To je aktualna [[{{MediaWiki:Validationpage}}|přehladana]] wersija, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] <i>$2</i>. Strona da so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać].',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Přehladana wersija] tuteje strony, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>, na tutej wersiji bazuje.',
	'revreview-changed' => "'''Naprašowanska akcija njeda so na tutu wersiju wot [[:$1|$1]] nałožować.''' 

Předłoha abo wobraz bu bjez podaća wersije požadana/požadany. To móže so stać, jeli dynamiska předłoha dalšu předłohu abo dalši wobraz zapřijmje, kotrejž stej wot wariable wotwisnej, kotraž je so wot spočatka pruwowanja strony změniła. Znowazačitanje strony a nowe pruwowanje móže tón problem rozrisać.",
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
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} hlej wšě]) bu dnja <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dopušćena].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}] {{PLURAL:$3|dyrbi|dyrbi|dyrbja|dyrbjetej}} so pruwować.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Aktualna přehladana wersija] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} wšě nalistować]) bu dnja <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny na předłohach/wobrazach] dyrbja so kontrolować.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslednja pruwowana wersija]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} hlej wšě]) bu <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dopušćena].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}] {{PLURAL:$3|dyrbi|dyrbi|dyrbja|dyrbjetej}} so hišće pruwować.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Aktualna kwalitna wersija] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} wšě nalistować]) bu dnja <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Změny na předłohach/wobrazach] dyrbja so kontrolować.',
	'revreview-noflagged' => 'Njeje přehladowanych wersijow tuteje strony, tak zo njejsu wuprajenja k [[{{MediaWiki:Validationpage}}|spušćomnosći nastawka]] móžne.',
	'revreview-note' => '[[User:$1|$1]] činješe slědowace [[{{MediaWiki:Validationpage}}|pruwowanske noticy]] k tutej wersiji:',
	'revreview-notes' => 'Wobkedźbowanja abo přispomnjenki, kotrež maja so pokazać:',
	'revreview-oldrating' => 'Zastopnjowanje:',
	'revreview-patrol' => 'Tutu změnu jako dohladowanu markěrować',
	'revreview-patrol-title' => 'Jako dohladowany markěrować',
	'revreview-patrolled' => 'Wubrana wersija bu wot [[:$1|$1]] bu jako dohladowana marěkrowana.',
	'revreview-quality' => 'To je najnowša [[{{MediaWiki:Validationpage}}|kwalitna wersija]],
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dopušćena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Naćisk] ma
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|změnu|změnje|změny|změnow}}], {{PLURAL:$3|kotraž|kotrejž|kotrež|kotrež}} na přepruwowanje {{PLURAL:$3|čaka|čakatej|čakaja|čakaja}}.',
	'revreview-quality-i' => 'To je aktualna [[{{MediaWiki:Validationpage}}|kwalitna]] wersija, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Naćisk] wobsahuje [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny na předłohach/wobrazach], kotrež na kontrolu čakaja.',
	'revreview-quality-old' => 'To je [[{{MediaWiki:Validationpage}}|kwalitna]] wersija ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} wšě nalistować]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>.
Je móžno, zo su so hižo nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} změny] přewjedli.',
	'revreview-quality-same' => 'To je aktualna [[{{MediaWiki:Validationpage}}|kajkostna]] wersija,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] <i>$2</i>. Strona da so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać].',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Kwalitna wersija] tuteje strony, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] dnja <i>$2</i>, na tutej wersiji bazuje.',
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
	'revreview-successful' => "'''Wersija [[:$1|$1]] je so wuspěšnje woznamjeniła. ([{{fullurl:Special:Stableversions|page=$2}} stabilne wersije wobhladać])'''",
	'revreview-successful2' => "'''Woznamjenjenje wersije [[:$1|$1]] je so wuspěšnje wotstroniło.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabilne wersije]] su skerje standardny wobsah strony za wobhladowarjow hač najnowša wersija.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabilne wersije]] su skontrolowane wersije stronow a dadźa so jako standardny wobsah za wobhladowarjow nastajić.''",
	'revreview-toggle-title' => 'Podrobnosće pokazać/schować',
	'revreview-toolow' => 'Dyrbiš za kóždy z deleka naspomnjenych atributow hódnotu wyše hač „{{int:revreview-accuracy-0}}“ zapodać,
	zo by so wersija jako přehladana woznamjeniła. Zo by wersiju zaćisnył, dyrbja wšě atributy „{{int:revreview-accuracy-0}}“ być.',
	'revreview-update' => "Prošu [[{{MediaWiki:Validationpage}}|přepruwuj]] změny ''(hlej deleka)'', kotrež buchu činjene, wot toho zo stabilna wersija bu [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena].
'''Někotre předłohi/wobrazy buchu zaktualizowane:'''",
	'revreview-update-includes' => "'''Někotre předłohi/wobrazy su so zaktualizowali:'''",
	'revreview-update-none' => "Prošu [[{{MediaWiki:Validationpage}}|přepruwuj]] změny ''(hlej deleka)'', kotrež buchu činjene, wot toho zo stabilna wersija bu [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena].",
	'revreview-update-use' => "'''KEDŹBU:''' Jeli někajka z tutych předłohow abo někajki z tutych wobrazow ma stabilnu wersiju, da so stabilna wersija tuteje strony hižo wužiwa.",
	'revreview-diffonly' => "''Zo by tutu stronu přehladał, klikń na wotkaz \"Aktualna wersija\" a wužij přehladowanski formular.''",
	'revreview-visibility' => "'''Tuta strona ma zaktualizowanu [[{{MediaWiki:Validationpage}}|stabilnu wersiju]]; nastajenja za stabilnosć strony dadźa so [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigurować].'''",
	'revreview-visibility2' => "'''Tuta strona nima zaktualizowanu [[{{MediaWiki:Validationpage}}|stabilnu wersiju]]; nastajenja wo stabilnosći strony dadźa so [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigurować].'''",
	'revreview-revnotfound' => 'Stara wersija strony, kotruž sy žadał, njeda so namakać. Prošu pruwuj URL, kiž sy wužiwał.',
	'right-autopatrolother' => 'Wersije zwonka hłowneho mjenoweho ruma jako dohladowane markěrować',
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
	'readerfeedback' => 'Što mysliš wo tutej stronje?',
	'readerfeedback-text' => "''Prošu bjer sej wokomik čas, zo by tutu stronu pohódnoćił. Twoja wotmołwa je hódnotna a pomha nam naše websydło polěpšić.''",
	'readerfeedback-reliability' => 'Spušćomnosć',
	'readerfeedback-completeness' => 'Dospołnosć',
	'readerfeedback-npov' => 'Neutralita',
	'readerfeedback-presentation' => 'Prezentacija',
	'readerfeedback-overall' => 'Dohromady',
	'readerfeedback-level-none' => '(njewěsty)',
	'readerfeedback-level-0' => 'Špatny',
	'readerfeedback-level-1' => 'Niski',
	'readerfeedback-level-2' => 'Spokojacy',
	'readerfeedback-level-3' => 'Wysoki',
	'readerfeedback-level-4' => 'Wuběrny',
	'readerfeedback-submit' => 'Pósłać',
	'readerfeedback-main' => 'Jenož nastawki hodźa so pohódnoćić.',
	'readerfeedback-success' => "'''Wulki dźak za hódnoćenje tuteje strony!''' ([$3 Komentary abo prašenja?]).",
	'readerfeedback-voted' => "'''Zda so, zo sy tutu stronu hižo pohódnoćił''' ([$3 Komentary abo prašenja?]).",
	'readerfeedback-submitting' => 'Sćele so...',
	'readerfeedback-finished' => 'Wutrobny dźak!',
	'revreview-filter-all' => 'Wšě',
	'revreview-filter-approved' => 'Schwaleny',
	'revreview-filter-reapproved' => 'Znowa schwaleny',
	'revreview-filter-unapproved' => 'Njeschwaleny',
	'revreview-filter-auto' => 'Awtomatiski',
	'revreview-filter-manual' => 'Manuelny',
	'revreview-filter-level-0' => 'Přehladane wersije',
	'revreview-filter-level-1' => 'Kwalitne wersije',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Typ:',
	'revreview-tagfilter' => 'Taflička:',
	'revreview-reviewlink' => 'kontrolować',
	'tooltip-ca-current' => 'Aktualny naćisk tuteje strony wobhladać',
	'tooltip-ca-stable' => 'Stabilnu wersiju tuteje strony wobhladać',
	'tooltip-ca-default' => 'Nastajenja kwalitneho zawěsćenja',
	'tooltip-ca-ratinghist' => 'Pohódnoćenja čitarjow tuteje strony',
	'revreview-locked' => 'Změny dyrbja so kontrolować, prjedy hač na tutej stronje zwobraznjeja!',
	'revreview-unlocked' => 'Změny kontrolu njetrjebaja, prjedy hač na tutej stronje zwobraznjeja!',
	'log-show-hide-review' => 'Protokol kontrolow $1',
	'revreview-tt-review' => 'Tutu stronu kontrolować',
	'validationpage' => '{{ns:help}}:Přehladanje strony',
);

/** Hungarian (Magyar)
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
	'flaggedrevs-desc' => 'Lehetővé teszi a szerkesztők/ellenőrök számára, hogy ellenőrizzék és elfogadják lapok adott változatait',
	'flaggedrevs-pref-UI-0' => 'Részletes felhasználói felület használata',
	'flaggedrevs-pref-UI-1' => 'Egyszerű felhasználói felület használata',
	'flaggedrevs-prefs' => 'Jelölt lapváltozatok',
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
	'hist-stable-user' => '[[User:$3|$3]] [{{fullurl:$1|stableid=$2}} megtekitettnek jelölte]',
	'review-diff2stable' => 'A rögzített és a legutóbbi változat közötti eltérések megtekintése',
	'review-logentry-app' => 'ellenőrizte a(z) [[$1]] lapot',
	'review-logentry-dis' => 'eltávolította a(z) [[$1]] lap egyik változatának értékelését',
	'review-logentry-id' => 'a változat azonosítója: $1',
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
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva]: <i>$2</i> A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nem ellenőrzött változat] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 változtatása] vár megtekintésre.',
	'revreview-basic-i' => 'Ez a legutolsó [[{{MediaWiki:Validationpage}}|megtekintett]] változat, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva]: <i>$2</i> A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nem ellenőrzött változaton] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} sablon- vagy képváltoztatások] várnak ellenőrzésre.',
	'revreview-basic-old' => 'Ez egy [[{{MediaWiki:Validationpage}}|megtekintett]] változat ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} teljes lista]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ellenőrizve] <i>$2</i>-kor.
Lehetnek új [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} változtatások].',
	'revreview-basic-same' => 'Ez a legutolsó [[{{MediaWiki:Validationpage}}|megtekintett]] változat ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} teljes lista]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva]: <i>$2</i>',
	'revreview-basic-source' => 'A lap [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} megtekintett változata] ([{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadás] dátuma <i>$2</i>) ezen a verzión alapul.',
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
	'revreview-draft-title' => 'Nem ellenőrzött lap',
	'revreview-edit' => 'Utolsó változat szerkesztése',
	'revreview-editnotice' => "'''Megjegyzés: a szerkesztéseid a lap következő [[{{MediaWiki:Validationpage}}|rögzített változatában]] fognak megjelenni, amint egy [[{{MediaWiki:Validationpage}}|járőr]] ellenőrízte őket.'''",
	'revreview-flag' => 'Változat ellenőrzése',
	'revreview-edited' => "'''A szerkesztéseid akkor jelennek meg a [[{{MediaWiki:Validationpage}}|rögzített változatban]], ha egy szerkesztő ellenőrzi azt.'''
'''A ''nem ellenőrzött változat'' lent látható.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 változtatás] vár megtekintésre.",
	'revreview-invalid' => "'''Érvénytelen cél:''' a megadott azonosító nem egy [[{{MediaWiki:Validationpage}}|ellenőrzött]] változat.",
	'revreview-legend' => 'A változat tartalmának értékelése',
	'revreview-log' => 'Megjegyzés:',
	'revreview-main' => 'Ki kell választanod egy oldal adott változatát az ellenőrzéshez.

Lásd az [[Special:Unreviewedpages|ellenőrizetlen lapok listáját]].',
	'revreview-newest-basic' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi megtekintett változat]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} összes]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} megjelölve]
ekkor: <i>$2</i> [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 változást] kell ellenőrizni.',
	'revreview-newest-basic-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi megtekintett változat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} összes]); [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} megjelölve]: <i>$2</i>
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Sablonok vagy képek változtatásait] kell ellenőrizni.',
	'revreview-newest-quality' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi kiemelt változat]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} összes]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} megjelölve]: <i>$2</i> [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 változást] kell ellenőrizni.',
	'revreview-newest-quality-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi kiemelt változat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} összes]); [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} megjelölve]: <i>$2</i>
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Sablon- vagy képváltoztatások] várnak ellenőrzésre.',
	'revreview-noflagged' => 'Az oldal még nem rendelkezik jelölt változatokkal, így a színvonalát valószínűleg még senki nem [[{{MediaWiki:Validationpage}}|ellenőrizte]].',
	'revreview-note' => '[[User:$1]] az alábbi megjegyzéseket fűzte ezen változat [[{{MediaWiki:Validationpage}}|ellenőrzése]] mellé:',
	'revreview-notes' => 'Megjelenítendő megfigyelések vagy megjegyzések:',
	'revreview-oldrating' => 'Osztályozása:',
	'revreview-patrol' => 'Változtatás ellenőrzöttnek jelölése',
	'revreview-patrol-title' => 'Változtatás ellenőrzöttnek jelölése',
	'revreview-patrolled' => '[[:$1|$1]] kiválasztott változata ellenőrzöttnek lett jelölve.',
	'revreview-quality' => 'Ez a legutolsó [[{{MediaWiki:Validationpage}}|kiemelt]] változat,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i> A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vázlaton] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|egy|$3}}
változtatást] kell ellenőrizni.',
	'revreview-quality-i' => 'Ez a legutolsó [[{{MediaWiki:Validationpage}}|kiemelt]] változat,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i>
A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} nem ellenőrzött változaton] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} sablon- és képmódosítások] várnak ellenőrzésre.',
	'revreview-quality-old' => 'Ez az utolsó [[{{MediaWiki:Validationpage}}|kiemelt]] változat ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} összes]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i>
Új [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} változtatások] történhettek.',
	'revreview-quality-same' => 'Ez az utolsó [[{{MediaWiki:Validationpage}}|kiemelt]] változat ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} összes]); [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i>',
	'revreview-quality-source' => 'A lap [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kiemelt változata] ([{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadás] dátuma <i>$2</i>) ezen a verzión alapul.',
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
	'revreview-successful' => "'''A(z) [[:$1|$1]] változatát sikeresen megjelölted! ([{{fullurl:Special:Stableversions|page=$2}} megjelölt változatok megtekintése])'''",
	'revreview-successful2' => "'''[[:$1|$1]] változtatásról sikeresen eltávolítottad a jelölést.'''",
	'revreview-text' => 'Az alapértelmezett beállítások szerint a rögzített változatok jelennek meg az újak helyett.',
	'revreview-toggle-title' => 'részletek mutatása/elrejtése',
	'revreview-toolow' => "Ahhoz, hogy egy változatot ellenőrzöttnek jelölhess, mindenhol meg kell adnod valamilyen értékelést.
Ha törölni szeretnéd az értékelést, akkor állíts mindent ''ellenőrizetlen''re.",
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Ellenőrizd]] az alábbi változtatásokat, melyek az [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadott] változat óta készültek!

'''Néhány sablon vagy kép frissítve lett:'''",
	'revreview-update-includes' => "'''Néhány sablon vagy kép megváltozott:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Ellenőrizz]] minden változtatást ''(lenn láthatóak)'', ami az [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadott] változat óta történt.",
	'revreview-update-use' => "'''MEGJEGYZÉS:''' Ha a képek vagy a sablonok közül bármelyiknek van ellenőrzött változata, akkor már az volt használva a lap stabil változatán is.",
	'revreview-diffonly' => "''A lapváltozat értékeléséhez kattints a jelenlegi lapváltozat linkre, és használd az értékelő mezőt.''",
	'revreview-visibility' => 'Ez az oldal rendelkezik frissített [[{{MediaWiki:Validationpage}}|elfogadott változattal]], amelyet
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} be lehet állítani].',
	'revreview-revnotfound' => 'A lap általad kért régi változatát nem találom. Kérlek, ellenőrizd az URL-t, amivel erre a lapra jutottál.',
	'right-autopatrolother' => 'változatok automatikus megjelölése nem főnévtérben',
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
	'readerfeedback' => 'Mit gondolsz erről az oldalról?',
	'readerfeedback-text' => "''Kérünk, szánj egy percet a cikk az értékelésére! A visszajelzések segítenek az oldal fejlesztésében.''",
	'readerfeedback-reliability' => 'Megbízhatóság',
	'readerfeedback-completeness' => 'Teljesség',
	'readerfeedback-npov' => 'Tárgyilagosság',
	'readerfeedback-presentation' => 'Stílus',
	'readerfeedback-overall' => 'Összességében',
	'readerfeedback-level-none' => '(bizonytalan)',
	'readerfeedback-level-0' => 'rossz',
	'readerfeedback-level-1' => 'gyenge',
	'readerfeedback-level-2' => 'átlagos',
	'readerfeedback-level-3' => 'jó',
	'readerfeedback-level-4' => 'kitűnő',
	'readerfeedback-submit' => 'Küldés',
	'readerfeedback-main' => 'Csak a tartalommal rendelkező lapokat lehet értékelni.',
	'readerfeedback-success' => "Köszönjük, hogy értékelted ezt a lapot!''' Megjegyzéseidet [$3 ide] várjuk.",
	'readerfeedback-voted' => "'''Úgy tűnik, hogy már értékelted ezt a lapot.''' Megjegyzéseidet, kérdéseidet [$3 ide] várjuk.",
	'readerfeedback-submitting' => 'Küldés...',
	'readerfeedback-finished' => 'Köszönjük!',
	'revreview-filter-all' => 'mind',
	'revreview-filter-approved' => 'ellenőrzött',
	'revreview-filter-reapproved' => 'újraellenőrzött',
	'revreview-filter-unapproved' => 'ellenőrizetlen',
	'revreview-filter-auto' => 'automatikus',
	'revreview-filter-manual' => 'kézi',
	'revreview-filter-level-0' => 'megtekintett változat',
	'revreview-filter-level-1' => 'minőségi változat',
	'revreview-statusfilter' => 'Állapot:',
	'revreview-typefilter' => 'Típus:',
	'revreview-tagfilter' => 'Aspektus:',
	'revreview-reviewlink' => 'áttekint',
	'tooltip-ca-current' => 'Az oldal jelenlegi vázlatának megtekintése',
	'tooltip-ca-stable' => 'Az oldal elfogadott változatának megtekintése',
	'tooltip-ca-default' => 'Minőségbiztosítási beállítások',
	'tooltip-ca-ratinghist' => 'Olvasói értékelések',
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
	'editor' => 'Contributor',
	'flaggedrevs' => 'Versiones revidite',
	'flaggedrevs-backlog' => "Il ha actualmente cargas in retardo in le [[Special:OldReviewedPages|lista de paginas revidite obsolete]]. '''Isto require tu attention!'''",
	'flaggedrevs-desc' => 'Da al contributores e revisores le capacitate de validar versiones e stabilisar paginas',
	'flaggedrevs-pref-UI-0' => 'Usar le version detaliate del interfacie de versiones stabile',
	'flaggedrevs-pref-UI-1' => 'Usar le version simple del interfacie de versiones stabile',
	'flaggedrevs-prefs' => 'Stablitate',
	'flaggedrevs-prefs-stable' => 'Per predefinition, monstrar sempre le version stabile (si existe) del paginas de contento',
	'flaggedrevs-prefs-watch' => 'Adder le paginas que io revide a mi observatorio',
	'group-editor' => 'Contributores',
	'group-editor-member' => 'contributor',
	'group-reviewer' => 'Revisores',
	'group-reviewer-member' => 'revisor',
	'grouppage-editor' => '{{ns:project}}:Contributor',
	'grouppage-reviewer' => '{{ns:project}}:Revisor',
	'hist-draft' => 'version provisori',
	'hist-quality' => 'version de qualitate',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validate] per [[User:$3|$3]]',
	'hist-stable' => 'version revidite',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} revidite] per [[User:$3|$3]]',
	'review-diff2stable' => 'Vider modificationes inter le versiones stabile e actual',
	'review-logentry-app' => 'revideva [[$1]]',
	'review-logentry-dis' => 'depreciava un version de [[$1]]',
	'review-logentry-id' => 'ID de version: $1',
	'review-logentry-diff' => 'diff con respecto al stabile',
	'review-logpage' => 'Registro de revisiones',
	'review-logpagetext' => 'Isto es un registro de modificationes al stato de [[{{MediaWiki:Validationpage}}|approbation]] de versiones pro paginas de contento.
Vide le [[Special:ReviewedPages|lista de paginas revidite]] pro un lista de paginas approbate.',
	'reviewer' => 'Revisor',
	'revisionreview' => 'Revider versiones',
	'revreview-accuracy' => 'Accuratessa',
	'revreview-accuracy-0' => 'Non approbate',
	'revreview-accuracy-1' => 'Revidite',
	'revreview-accuracy-2' => 'Accurate',
	'revreview-accuracy-3' => 'Ben referentiate',
	'revreview-accuracy-4' => 'Eminente',
	'revreview-approved' => 'Approbate',
	'revreview-auto' => '(automatic)',
	'revreview-auto-w' => "Tu modifica le version stabile; omne modificationes essera '''automaticamente revidite'''.",
	'revreview-auto-w-old' => "Tu modifica un version revidite; omne modificationes essera '''automaticamente revidite'''.",
	'revreview-basic' => 'Isto es le ultime version [[{{MediaWiki:Validationpage}}|revidite]],
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version provisori] ha
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modification|modificationes}}]
attendente revision.',
	'revreview-basic-i' => 'Isto es le ultime version [[{{MediaWiki:Validationpage}}|revidite]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version provisori] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificationes in patronos o imagines] attendente revision.',
	'revreview-basic-old' => 'Isto es un version [[{{MediaWiki:Validationpage}}|revidite]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar totes]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
Es possibile que nove [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificationes] ha essite facite.',
	'revreview-basic-same' => 'Isto es le ultime version [[{{MediaWiki:Validationpage}}|revidite]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar totes]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.',
	'revreview-basic-source' => 'Un [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version revidite] de iste pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>, ha essite basate in iste version.',
	'revreview-changed' => "'''Le action requestate non poteva esser executate super iste version de [[:$1|$1]].'''

Es possibile que un patrono o imagine ha essite requestate sin specification de un version specific.
Isto pote occurrer si un patrono dynamic transclude un altere imagine o patrono dependente super un variabile que cambiava post que tu comenciava a revider iste pagina.
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
	'revreview-newest-basic' => 'Le [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plus recente version revidite] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) ha essite [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modification|modificationes}}] necessita revision.',
	'revreview-newest-basic-i' => 'Le [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plus recente version revidite] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar totes]) ha essite [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Modificationes in patronos o imagines] necessita revision.',
	'revreview-newest-quality' => 'Le [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultime version de qualitate] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar totes]) ha essite [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approbate] le <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modification|modificationes}}] necessita revision.',
	'revreview-revnotfound' => 'Impossibile trovar le version anterior del pagina que tu ha demandate.
Verifica le adresse URL que tu ha usate pro acceder a iste pagina.',
	'readerfeedback' => 'Que pensa tu de iste pagina?',
	'readerfeedback-text' => "''Dedica un momento a judicar iste pagina. Tu opinion es importante e nos adjuta a meliorar nostre sito web.''",
	'readerfeedback-reliability' => 'Accuratessa',
	'readerfeedback-completeness' => 'Completessa',
	'readerfeedback-npov' => 'Neutralitate',
	'readerfeedback-presentation' => 'Presentation',
	'readerfeedback-overall' => 'In general',
	'readerfeedback-level-none' => '(non secur)',
	'readerfeedback-level-0' => 'Povre',
	'readerfeedback-level-1' => 'Basse',
	'readerfeedback-level-2' => 'Acceptabile',
	'readerfeedback-level-3' => 'Alte',
	'readerfeedback-level-4' => 'Excellente',
	'readerfeedback-submit' => 'Submitter',
	'readerfeedback-main' => 'Solmente le paginas de contento pote esser judicate.',
	'readerfeedback-success' => "'''Gratias pro revider iste pagina!''' ([$3 Commentos o questiones?]).",
	'readerfeedback-voted' => "'''Pare que tu ha ja judicate iste pagina''' ([$3 Commentos o questiones?]).",
	'readerfeedback-submitting' => 'Invio in curso…',
	'readerfeedback-finished' => 'Gratias!',
);

/** Indonesian (Bahasa Indonesia)
 * @author Rex
 */
$messages['id'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Revisi bertanda',
	'flaggedrevs-backlog' => "Terdapat [[Special:OldReviewedPages|halaman-halaman tertinjau yang telah usang]]. '''Perhatian Anda dibutuhkan!'''",
	'flaggedrevs-desc' => 'Memberikan fasilitas bagi Editor atau Peninjau untuk memvalidasi versi-versi artikel dan menandai sebagai stabil',
	'flaggedrevs-pref-UI-0' => 'Gunakan antarmuka pengguna detail untuk versi stabil',
	'flaggedrevs-pref-UI-1' => 'Gunakan antarmuka pengguna sederhana untuk versi stabil',
	'flaggedrevs-prefs' => 'Versi stabil',
	'flaggedrevs-prefs-stable' => 'Selalu tampilkan halaman versi stabil sebagai tampilan baku (jika ada)',
	'flaggedrevs-prefs-watch' => 'Tambahkan halaman yang saya tinjau ke daftar pantauan',
	'group-editor' => 'Editor',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Peninjau',
	'group-reviewer-member' => 'Peninjau',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Peninjau',
	'hist-draft' => 'draf',
	'hist-quality' => 'revisi layak',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} divalidasi] oleh [[User:$3|$3]]',
	'hist-stable' => 'revisi terperiksa',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} diperiksa] oleh [[User:$3|$3]]',
	'review-diff2stable' => 'Lihat perubahan antara revisi stabil dan terkini',
	'review-logentry-app' => 'meninjau [[$1]]',
	'review-logentry-dis' => 'menurunkan peringkat [[$1]]',
	'review-logentry-id' => 'ID revisi $1',
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
	'revreview-basic' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|perubahan|perubahan}}] yang memerlukan tinjauan.',
	'revreview-basic-i' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/berkas] yang memerlukan tinjauan.',
	'revreview-basic-old' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
Mungkin telah ada [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan-perubahan] yang lebih baru pada draf.',
	'revreview-basic-same' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.',
	'revreview-basic-source' => 'Terdapat [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versi terperiksa] untuk halaman ini, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>, yang berdasarkan pada revisi ini.',
	'revreview-changed' => "'''Tindakan yang diminta tidak dapat dilakukan terhadap revisi dari [[:$1|$1]] ini.'''

Satu templat atau berkas mungkin telah diminta tanpa menyebutkan suatu versi spesifik.
Hal ini dapat terjadi jika suatu templat dinamis mengikutkan suatu berkas atau templat lain yang bergantung pada suatu variabel yang telah berubah sejak Anda mulai meninjau halaman ini.
Pemuatan dan peninjauan ulang halaman dapat memecahkan masalah ini.",
	'revreview-current' => 'Draf',
	'revreview-depth' => 'Kedalaman',
	'revreview-depth-0' => 'Tak disetujui',
	'revreview-depth-1' => 'Dasar',
	'revreview-depth-2' => 'Moderat',
	'revreview-depth-3' => 'Tinggi',
	'revreview-depth-4' => 'Terpilih',
	'revreview-draft-title' => 'Artikel draf',
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi terakhir yang terperiksa] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|perubahan|perubahan}}] {{PLURAL:$3|butuh|butuh}} tinjauan.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi terperiksa yang terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Perubahan templat/berkas] memerlukan tinjauan.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi layak yang terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|perubahan|perubahan}}] {{PLURAL:$3|butuh|butuh}} tinjauan.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi layak yang terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Perubahan templat/berkas] memerlukan tinjauan.',
	'revreview-noflagged' => "Tak ada revisi tertinjau dari halaman ini, jadi halaman ini mungkin '''belum''' [[{{MediaWiki:Validationpage}}|diperiksa]] kelayakannya.",
	'revreview-note' => '[[User:$1]] memberikan catatan berikut sewaktu [[{{MediaWiki:Validationpage}}|meninjau]] revisi ini:',
	'revreview-notes' => 'Pengamatan atau catatan untuk ditampilkan:',
	'revreview-oldrating' => 'Memiliki rating:',
	'revreview-patrol' => 'Tandai perubahan ini terpatroli',
	'revreview-patrol-title' => 'Ditandai sebagai terpatroli',
	'revreview-patrolled' => 'Revisi terpilih dari [[:$1|$1]] telah ditandai terpatroli.',
	'revreview-quality' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|perubahan|perubahan}}] yang memerlukan tinjauan.',
	'revreview-quality-i' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/berkas] yang memerlukan tinjauan.',
	'revreview-quality-old' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
Mungkin telah ada [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan-perubahan] yang lebih baru pada draf.',
	'revreview-quality-same' => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Revisi layak] dari halaman ini, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>, didasarkan pada revisi ini.',
	'revreview-quality-title' => 'Artikel layak',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Terperiksa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Terperiksa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Terperiksa]]'''",
	'revreview-quick-invalid' => "'''Nomor ID revisi tidak sah'''",
	'revreview-quick-none' => "'''Terkini''' (belum ditinjau)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Layak]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Layak]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Layak]]'''",
	'revreview-quick-see-basic' => "'''Draf''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat artikel]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} bandingkan])",
	'revreview-quick-see-quality' => "'''Draf''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat artikel]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} bandingkan])",
	'revreview-selected' => "Revisi terpilih dari '''$1:'''",
	'revreview-source' => 'sumber draf',
	'revreview-stable' => 'Stabil',
	'revreview-stable-title' => 'Artikel terperiksa',
	'revreview-stable1' => 'Anda mungkin ingin menampilkan [{{fullurl:$1|stableid=$2}} versi yang ditandai ini] untuk melihat apakah sudah ada [{{fullurl:$1|stable=1}} versi stabil] dari halaman ini.',
	'revreview-stable2' => 'Anda mungkin ingin melihat [{{fullurl:$1|stable=1}} versi stabil] halaman ini (bila ada).',
	'revreview-style' => 'Keterbacaan',
	'revreview-style-0' => 'Tak disetujui',
	'revreview-style-1' => 'Cukup',
	'revreview-style-2' => 'Baik',
	'revreview-style-3' => 'Ringkas',
	'revreview-style-4' => 'Terpilih',
	'revreview-submit' => 'Kirim tinjauan',
	'revreview-submitting' => 'Mengirimkan...',
	'revreview-finished' => 'Tinjauan selesai!',
	'revreview-successful' => "'''Revisi [[:$1|$1]] berhasil ditandai. ([{{fullurl:Special:Stableversions|page=$2}} lihat revisi stabil])'''",
	'revreview-successful2' => "'''Penandaan revisi [[:$1|$1]] berhasil dibatalkan.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] diset sebagai isi tampilan baku halaman dan bukan revisi terakhir.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] merupakan revisi-revisi halaman yang telah diperiksa dan dapat diset sebagai isi tampilan baku halaman bagi pembaca.''",
	'revreview-toggle-title' => 'tampilkan/sembunyikan detail',
	'revreview-toolow' => 'Anda harus memberi peringkat lebih tinggi dari "tak disetujui" dalam penilaian di bawah ini agar suatu revisi dapat dianggap telah ditinjau. Untuk menurunkan peringkat suatu revisi, berikan nilai "tak disetujui" pada semua penilaian.',
	'revreview-update' => "Harap [[{{MediaWiki:Validationpage}}|meninjau]] semua perubahan ''(ditampilkan berikut)'' yang dibuat sejak revisi stabil [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui].<br />
'''Beberapa templat/berkas telah diubah:'''",
	'revreview-update-includes' => "'''Beberapa templat/berkas telah diperbaharui:'''",
	'revreview-update-none' => "Harap [[{{MediaWiki:Validationpage}}|meninjau]] semua perubahan ''(ditampilkan berikut)'' yang dibuat sejak revisi stabil [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui].",
	'revreview-update-use' => "'''CATATAN''': Templat/berkas yang akan digunakan adalah templat/berkas versi stabil (jika ada).",
	'revreview-diffonly' => "''Untuk memeriksa halaman, pilih pranala \"revisi sekarang\" dan gunakan formulir peninjauan.''",
	'revreview-visibility' => "'''Halaman ini memiliki [[{{MediaWiki:Validationpage}}|versi stabil]] yang telah diperbaharui; preferensi untuk versi stabil dapat [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} dikonfigurasi].'''",
	'revreview-visibility2' => "'''Halaman ini tidak memiliki [[{{MediaWiki:Validationpage}}|versi stabil]] yang telah diperbarui; penampilan halaman stabil dapat [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} dikonfigurasi].'''",
	'revreview-revnotfound' => 'Revisi lama halaman yang Anda minta tidak dapat ditemukan. Silakan periksa URL yang digunakan untuk mengakses halaman ini.',
	'right-autopatrolother' => 'Menandai secara otomatis suntingan di ruang nama non-utama sebagai terpatroli',
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
	'readerfeedback' => 'Bagaimana menurut Anda halaman ini?',
	'readerfeedback-text' => "''Silakan menilai halaman di bawah ini. Umpan balik Anda sangat berharga dan membantu meningkatkan situs web ini.''",
	'readerfeedback-reliability' => 'Reliabilitas',
	'readerfeedback-completeness' => 'Kelengkapan',
	'readerfeedback-npov' => 'Netralitas',
	'readerfeedback-presentation' => 'Penyajian',
	'readerfeedback-overall' => 'Keseluruhan',
	'readerfeedback-level-none' => '(pilih)',
	'readerfeedback-level-0' => 'Buruk',
	'readerfeedback-level-1' => 'Rendah',
	'readerfeedback-level-2' => 'Sedang',
	'readerfeedback-level-3' => 'Tinggi',
	'readerfeedback-level-4' => 'Baik sekali',
	'readerfeedback-submit' => 'Kirim',
	'readerfeedback-main' => 'Hanya halaman isi yang dapat diberi nilai.',
	'readerfeedback-success' => "'''Terima kasih telah meninjau halaman ini!''' ([$3 Komentar atau pertanyaan?])",
	'readerfeedback-voted' => "'''Tampaknya Anda sudah memberikan peringkat untuk halaman ini'''. ([$3 Komentar atau pertanyaan?])",
	'readerfeedback-submitting' => 'Mengirimkan...',
	'readerfeedback-finished' => 'Terima kasih!',
	'revreview-filter-all' => 'Semua',
	'revreview-filter-approved' => 'Disetujui',
	'revreview-filter-reapproved' => 'Disetujui kembali',
	'revreview-filter-unapproved' => 'Tidak disetujui',
	'revreview-filter-auto' => 'Otomatis',
	'revreview-filter-manual' => 'Manual',
	'revreview-filter-level-0' => 'Revisi terperiksa',
	'revreview-filter-level-1' => 'Revisi layak',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Tipe:',
	'revreview-tagfilter' => 'Tag:',
	'tooltip-ca-current' => 'Lihat draf terkini halaman ini',
	'tooltip-ca-stable' => 'Lihat versi stabil halaman ini',
	'tooltip-ca-default' => 'Pengaturan pemeriksaan kualitas',
	'tooltip-ca-ratinghist' => 'Penilaian pembaca atas halaman ini:',
	'revreview-locked' => 'Revisi-revisi harus ditinjau terlebih dahulu sebelum ditampilkan di halaman ini!',
	'revreview-unlocked' => 'Revisi-revisi tidak memerlukan tinjauan untuk ditampilkan di halaman ini!',
	'revreview-tt-review' => 'Tinjau halaman ini',
	'validationpage' => '{{ns:help}}:Validasi artikel',
);

/** Ido (Ido) */
$messages['io'] = array(
	'revreview-revnotfound' => "L' anciena versiono di la pagino, quan vu demandis, ne povis trovesar.
Voluntez kontrolar la URL quan vu uzis por acesar a ca pagino.",
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 */
$messages['is'] = array(
	'revreview-accuracy' => 'Nákvæmni',
	'revreview-auto' => '(sjálfkrafa)',
	'revreview-current' => 'Uppkast',
	'revreview-edit' => 'Breyta uppkasti',
);

/** Italian (Italiano)
 * @author Darth Kule
 * @author Gianfranco
 * @author Melos
 */
$messages['it'] = array(
	'editor' => 'Editore',
	'flaggedrevs' => 'Verifica delle revisioni',
	'flaggedrevs-backlog' => "C'è del lavoro arretrato nelle [[Special:OldReviewedPages|pagine non revisionate di recente]]. '''È necessaria la tua attenzione!'''",
	'flaggedrevs-prefs' => 'Stabilità',
	'flaggedrevs-prefs-watch' => 'Aggiungi le pagine che revisiono agli osservati speciali',
	'group-editor' => 'Editori',
	'group-editor-member' => 'Editore',
	'group-reviewer' => 'Revisori',
	'group-reviewer-member' => 'Revisore',
	'grouppage-editor' => '{{ns:project}}:Editore',
	'grouppage-reviewer' => '{{ns:project}}:Revisore',
	'hist-draft' => 'versione bozza',
	'hist-quality' => 'versione di qualità',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} convalidata] da [[User:$3|$3]]',
	'hist-stable' => 'versione visionata',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} visionata] da [[User:$3|$3]]',
	'review-diff2stable' => 'Visualizza i cambiamenti fra la versione stabile e la corrente',
	'review-logentry-app' => 'ha revisionato [[$1]]',
	'review-logentry-id' => 'ID revisione $1',
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
	'revreview-basic' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|visionata]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] che {{PLURAL:$3|attende|attendono}} una revisione.",
	'revreview-basic-i' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|visionata]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template o immagini] che attendono una revisione.",
	'revreview-basic-old' => 'Questa è una versione [[{{MediaWiki:Validationpage}}|revisionata]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenca tutte]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
Potrebbero essere stati apportati nuove [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche].',
	'revreview-basic-same' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|visionata]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenca tutte]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.",
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
	'revreview-edit' => 'Modifica la bozza',
	'revreview-flag' => 'Revisiona questa versione',
	'revreview-edited' => "'''Gli edit saranno inclusi nella [[{{MediaWiki:Validationpage}}|versione stabile]] dopo che un utente autorizzato li avrà revisionati.'''
'''La ''bozza'' è mostrata di seguito.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|modifica attende|modifiche attendono}}] una revisione.",
	'revreview-invalid' => "'''Errore:''' nessuna versione [[{{MediaWiki:Validationpage}}|revisionata]] corrisponde all'ID fornito.",
	'revreview-log' => 'Commento:',
	'revreview-newest-basic' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima versione visionata] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenca tutte]) è stata [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|ha bisogno|hanno bisogno}} di una revisione.",
	'revreview-newest-basic-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima versione stabile] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenca tutte]) è stata [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Modifiche a template o immagini] hanno bisogno di una revisione.",
	'revreview-newest-quality' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima versione di qualità] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenca tutte]) è stata [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|ha bisogno|hanno bisogno}} di una revisione.",
	'revreview-newest-quality-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima versione di qualità] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenca tutte]) è stata [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Modifiche a template o immagini] hanno bisogno di una revisione.",
	'revreview-noflagged' => "Non ci sono versioni revisionate di questa pagina, perciò potrebbe '''non''' essere stata [[{{MediaWiki:Validationpage}}|controllata]] la sua qualità.",
	'revreview-note' => '[[User:$1|$1]] ha commentato così la versione durante la [[{{MediaWiki:Validationpage}}|revisione]]:',
	'revreview-notes' => 'Osservazioni o note da mostrare:',
	'revreview-oldrating' => 'È stata giudicata:',
	'revreview-patrol' => 'Segna questo cambiamento come verificato',
	'revreview-patrol-title' => 'Segna come verificata',
	'revreview-patrolled' => 'La versione di [[:$1|$1]] selezionata è stata segnata come verificata.',
	'revreview-quality' => "Questa è l'ultima versione di [[{{MediaWiki:Validationpage}}|qualità]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] che {{PLURAL:$3|attende|attendono}} una revisione.",
	'revreview-quality-i' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|di qualità]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template o immagini] che attendono una revisione.",
	'revreview-quality-old' => 'Questa è una versione [[{{MediaWiki:Validationpage}}|di qualità]]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenca tutte]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.
Potrebbero essere state apportate nuove [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche].',
	'revreview-quality-same' => "Questa è l'ultima versione [[{{MediaWiki:Validationpage}}|di qualità]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenca tutte]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata] il <i>$2</i>.",
	'revreview-quick-invalid' => "'''ID versione non valido'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Versione corrente]]''' (non revisionata)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pagina di qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visualizza bozza]]",
	'revreview-selected' => "Versione selezionata di '''$1:'''",
	'revreview-source' => 'Visualizza sorgente bozza',
	'revreview-stable' => 'Pagina stabile',
	'revreview-stable1' => 'Puoi visualizzare [{{fullurl:$1|stableid=$2}} questa versione verificata] e vedere se adesso è la [{{fullurl:$1|stable=1}} versione stabile] di questa pagina.',
	'revreview-stable2' => 'Puoi visualizzare la [{{fullurl:$1|stable=1}} versione stabile] di questa pagina (se ce ne è una).',
	'revreview-style' => 'Leggibilità',
	'revreview-style-0' => 'Non approvata',
	'revreview-style-1' => 'Accettabile',
	'revreview-style-2' => 'Buona',
	'revreview-style-4' => 'Ottima',
	'revreview-submit' => 'Invia',
	'revreview-submitting' => 'Invio in corso...',
	'revreview-finished' => 'Revisione completata!',
	'revreview-successful' => "'''Versione di [[:$1|$1]] verificata con successo. ([{{fullurl:Special:Stableversions|page=$2}} visualizza versione stabile])'''",
	'revreview-toggle-title' => 'mostra/nascondi dettagli',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Revisiona]] le modifiche ''(mostrate di seguito)'' apportate da quanto la versione stabile è stata [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata].<br />
'''Alcuni template o immagini sono stati aggiornati:'''",
	'revreview-update-includes' => "'''Alcuni template o immagini sono stati aggiornati:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Revisiona]] le modifiche ''(mostrate di seguito)'' apportate da quando la versione stabile è stata [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvata].",
	'revreview-update-use' => "'''NOTA:''' Se qualcuno di questi template o immagini hanno una versione stabile, allora è già usata nella versione stabile di questa pagina.",
	'revreview-diffonly' => "''Per revisionare la pagina, fai clic sul link \"versione corrente\" e usa il modulo di revisione.''",
	'revreview-visibility' => "'''Questa pagina ha una [[{{MediaWiki:Validationpage}}|versione stabile]] aggiornata; le impostazioni della stabilità della pagina possono essere [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurate].'''",
	'revreview-revnotfound' => 'La versione richiesta della pagina non è stata trovata.
Verificare la URL usata per accedere a questa pagina.',
	'right-autopatrolother' => 'Segna automaticamente le versioni fuori dal namespace principale come verificate',
	'right-autoreview' => 'Segna automaticamente versioni come visionate',
	'right-movestable' => 'Sposta pagine stabili',
	'right-review' => 'Segna versioni come visionate',
	'right-stablesettings' => 'Configura come la versione stabile è selezionata e mostrata',
	'right-validate' => 'Segna revisioni come convalidate',
	'specialpages-group-quality' => 'Qualità delle pagine',
	'readerfeedback' => 'Cosa pensi di questa pagina?',
	'readerfeedback-text' => "''Dedica un momento al giudizio della pagina. Il tuo parere è importante e ci aiuta a migliorare il nostro sito.''",
	'readerfeedback-reliability' => 'Affidabilità',
	'readerfeedback-completeness' => 'Completezza',
	'readerfeedback-npov' => 'Neutralità',
	'readerfeedback-presentation' => 'Aspetto',
	'readerfeedback-level-none' => '(seleziona)',
	'readerfeedback-level-0' => 'Insufficiente',
	'readerfeedback-level-1' => 'Mediocre',
	'readerfeedback-level-2' => 'Discreto',
	'readerfeedback-level-3' => 'Buono',
	'readerfeedback-level-4' => 'Ottimo',
	'readerfeedback-submit' => 'Invia',
	'readerfeedback-success' => "'''Grazie per aver visionato questa pagina!''' ([$3 Commenti o domande?])",
	'readerfeedback-voted' => "'''Sembra che tu abbia già giudicato questa pagina.''' ([$3 Commenti o domande?])",
	'readerfeedback-submitting' => 'Invio in corso...',
	'readerfeedback-finished' => 'Grazie!',
	'revreview-filter-all' => 'Tutte',
	'revreview-filter-unapproved' => 'Non approvato',
	'revreview-filter-level-0' => 'Versioni visionate',
	'revreview-filter-level-1' => 'Versioni di qualità',
	'revreview-typefilter' => 'Tipo:',
	'revreview-tagfilter' => 'Tag:',
	'tooltip-ca-current' => 'Vedi la bozza attuale di questa pagina',
	'tooltip-ca-stable' => 'Vedi la versione stabile di questa pagina',
	'revreview-locked' => 'Le modifiche devono essere revisionate prima di essere mostrate in questa pagina!',
	'revreview-unlocked' => 'Le modifiche non hanno bisogno di essere revisionate prima di essere mostrate in questa pagina!',
	'log-show-hide-review' => '$1 log delle revisioni',
	'revreview-tt-review' => 'Revisiona questa pagina',
	'validationpage' => '{{ns:help}}:Verifica delle revisioni',
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
	'flaggedrevs' => '判定による版表示',
	'flaggedrevs-desc' => '編集者および査読者に、特定版の査読や表示ページとしての採択ができる機能を提供する',
	'flaggedrevs-prefs' => '安定度',
	'group-editor' => '編集者',
	'group-editor-member' => '編集者',
	'group-reviewer' => '査読者',
	'group-reviewer-member' => '査読者',
	'grouppage-editor' => '{{ns:project}}:編集者',
	'grouppage-reviewer' => '{{ns:project}}:査読者',
	'hist-quality' => '内容充実版',
	'hist-stable' => '採用版',
	'review-diff2stable' => '採択版から最新版までの変更履歴を見る',
	'review-logentry-app' => '[[$1]] を査読承認',
	'review-logentry-dis' => '[[$1]] を査読の末、棄却',
	'review-logentry-id' => '特定版ID $1',
	'review-logpage' => '査読記録',
	'review-logpagetext' => 'ページの版に対する[[{{MediaWiki:Validationpage}}|評価]]状況の変更記録です。評価済みのページのリストは[[Special:ReviewedPages|査読済みページ一覧]]を参照してください。',
	'reviewer' => '査読者',
	'revisionreview' => '特定版の査読',
	'revreview-accuracy' => '内容の正確さ',
	'revreview-accuracy-0' => '論外',
	'revreview-accuracy-1' => '許容範囲',
	'revreview-accuracy-2' => '的確',
	'revreview-accuracy-3' => '検証性充分',
	'revreview-accuracy-4' => '秀逸',
	'revreview-auto' => '（自動査読）',
	'revreview-auto-w' => "あなたは安定版を編集しています。全ての変更は'''自動的に査読'''されます。",
	'revreview-auto-w-old' => "あなたは査読された版を編集しています。全ての変更は'''自動的に査読'''されます。",
	'revreview-basic' => 'これは最新の[[{{MediaWiki:Validationpage}}|採用]]版で、<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]には査読待ちの変更が[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3版]あります。',
	'revreview-basic-same' => 'これは最新の[[{{MediaWiki:Validationpage}}|採用]]版で、<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。更なる[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 内容充実]にご協力ください。',
	'revreview-changed' => "'''この [[:$1|$1]] の特定版に対する査読は処理されませんでした'''

処理中に、この版で使用されているテンプレートまたは画像に対する処理要求が行われた可能性があります。これは、動的なテンプレートによる異なる画像へのリンク、または変数に依存するテンプレートが利用されていることにより、査読開始時点からページの内容が変更された場合に起こり得ます。ページをリロードしてから再度査読を行うと、この問題を解決できます。",
	'revreview-current' => '草稿',
	'revreview-depth' => '考察の深さ',
	'revreview-depth-0' => '論外',
	'revreview-depth-1' => '平凡',
	'revreview-depth-2' => '適度',
	'revreview-depth-3' => '熟慮',
	'revreview-depth-4' => '秀逸',
	'revreview-edit' => '草稿を編集する',
	'revreview-flag' => 'この特定版の査読',
	'revreview-legend' => '特定版に対する判定',
	'revreview-log' => '査読内容の要約:',
	'revreview-main' => '査読のためには対象ページから特定の版を選択する必要があります。

[[Special:Unreviewedpages|査読待ちのページ一覧]]をご覧ください。',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最新の採用版] （[{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 全リスト]）は<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0&editreview=1}} $3版]が査読待ちです。',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最新の内容充実版] （[{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 全リスト]）は<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0&editreview=1}} $3版]が査読待ちです。',
	'revreview-noflagged' => "このページには査読済の版がない、すなわち[[{{MediaWiki:Validationpage}}|チェック]]'''されていない'''ため内容は保証できません。",
	'revreview-note' => '[[User:$1|$1]] は、この版に以下の[[{{MediaWiki:Validationpage}}|査読意見]]を表明しています:',
	'revreview-notes' => '査読意見または注意:',
	'revreview-oldrating' => '査読結果:',
	'revreview-patrol' => 'パトロール済みにマーク',
	'revreview-patrol-title' => 'パトロール済みにマーク',
	'revreview-patrolled' => '選択された [[:$1|$1]] の版は、パトロール済みにマークされます。',
	'revreview-quality' => 'これは最新の[[{{MediaWiki:Validationpage}}|内容充実]]版で、<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。 [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]には査読待ちの変更が[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0&editreview=1}} $3版]あります。',
	'revreview-quality-same' => 'これは最新の[[{{MediaWiki:Validationpage}}|内容充実]]版で、<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。更なる[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 内容充実]にご協力ください。',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|採用版]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿を見る]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|採用版]]'''",
	'revreview-quick-none' => "'''最新版'''　（査読済の版はありません）",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|内容充実版]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿を見る]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|内容充実版]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|草稿]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 記事を見る]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 比較する])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|草稿]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 記事を見る]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 比較する])",
	'revreview-selected' => "'''$1''' の選択された特定版:",
	'revreview-source' => '草稿元',
	'revreview-stable' => '安定版',
	'revreview-style' => '読みやすさ',
	'revreview-style-0' => '論外',
	'revreview-style-1' => '受理可能',
	'revreview-style-2' => '適切',
	'revreview-style-3' => '簡潔',
	'revreview-style-4' => '秀逸',
	'revreview-submit' => '査読完了',
	'revreview-submitting' => '送信中...',
	'revreview-finished' => '査読完了!',
	'revreview-text' => "''利用者にデフォルトで提供されるのは最新版ではなく[[{{MediaWiki:Validationpage}}|安定版]]です。''",
	'revreview-toolow' => 'ある版を査読済とするには、以下に示す全ての判定要素を "論外" より高い評価にする必要があります。査読を棄却する場合、全ての評価を "論外" としてください。',
	'revreview-update' => "[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認された]安定版に対する変更箇所''（下記参照）'' を[[{{MediaWiki:Validationpage}}|査読]]してください。<br />'''いくつかのテンプレートや画像が更新されました:'''",
	'revreview-update-none' => "[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認された]査読済版への全ての変更箇所''（下記参照）''を[[{{MediaWiki:Validationpage}}|査読]]してください。",
	'revreview-visibility' => "'''このページにはより新しい[[{{MediaWiki:Validationpage}}|査読済の版]]があります。[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} 版の設定]は変更可能です。",
	'revreview-revnotfound' => '要求されたこのページの旧版は見つかりませんでした。このページにアクセスしたURLをもう一度確認してください。',
	'rights-editor-autosum' => '自動権限付与',
	'rights-editor-revoke' => '[[$1]] の編集者権限取り消し',
	'stable-logentry' => '[[$1]] を採択',
	'stable-logentry2' => '[[$1]] の採択を取り消し',
	'stable-logpage' => 'ページ採択記録',
	'stable-logpagetext' => '[[{{MediaWiki:Validationpage}}|安定版]]設定の変更記録です。安定版を持つページの一覧は[[Special:StablePages|安定ページ一覧]]から見ることができます。',
	'readerfeedback-npov' => '中立度',
	'readerfeedback-submit' => '送信',
	'readerfeedback-submitting' => '送信中...',
	'readerfeedback-finished' => 'ありがとうございます!',
	'revreview-filter-all' => 'すべて',
	'revreview-filter-manual' => 'マニュアル',
	'revreview-typefilter' => 'タイプ:',
	'revreview-tagfilter' => 'タグ:',
	'revreview-reviewlink' => '査読',
	'tooltip-ca-current' => '現在の草稿ページを見る',
	'tooltip-ca-stable' => 'この査読済ページを見る',
	'tooltip-ca-default' => '内容保証設定',
	'log-show-hide-review' => '査読記録を$1',
	'revreview-tt-review' => 'このページを査読する',
	'validationpage' => '{{ns:help}}:記事の評価',
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
	'flaggedrevs-prefs' => 'Stabilitas',
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
<i>$2</i> كەزىندە [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلگەن]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسى]
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
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} بارلىق ٴتىزىمى]) <i>$2</i> كەزىندە [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلدى]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|وزگەرىسىنە|وزگەرىسىنە}}] سىن بەرۋى {{PLURAL:$3|كەرەك|كەرەك}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ەڭ سوڭعى ساپالى نۇسقاسى]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} بارلىعىنىڭ ٴتىزىمى]) <i>$2</i> كەزىندە [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلدى].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|وزگەرىسىنە|وزگەرىسىنە}}] سىن بەرۋى {{PLURAL:$3|كەرەك|كەرەك}}.',
	'revreview-noflagged' => "بۇل بەتتىڭ سىن بەرىلگەن نۇسقالارى مىندا جوق, سوندىقتان بۇنىڭ ساپاسى
'''[[{{MediaWiki:Validationpage}}|تەكسەرىلمەگەن]]''' بولۋى مۇمكىن.",
	'revreview-note' => '[[{{ns:user}}:$1]] بۇل نۇسقاعا  [[{{MediaWiki:Validationpage}}|سىن بەرگەندە]] كەلەسى اڭعارتۋلار جاسادى:',
	'revreview-notes' => 'كورسەتىلەتىن پىكىرلەر مەن اڭعارتپالار:',
	'revreview-oldrating' => 'بۇل مىنا باعا الدى:',
	'revreview-patrolled' => '[[:$1|$1]] دەگەننىڭ بولەكتەلىنگەن نۇسقاسى كۇزەتتە دەپ بەلگىلەندى.',
	'revreview-quality' => 'بۇل ەڭ سوڭعى [[{{MediaWiki:Validationpage}}|ساپالى]] نۇسقا,
<i>$2</i> كەزىندە [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلگەن]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسى]
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
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} باپتالاۋى] مۇمكىن.',
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
<i>$2</i> кезінде [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бекітілген]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Жоба жазбасы]
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
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} барлық тізімі]) <i>$2</i> кезінде [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бекітілді]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|өзгерісіне|өзгерісіне}}] сын беруі {{PLURAL:$3|керек|керек}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ең соңғы сапалы нұсқасы]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} барлығының тізімі]) <i>$2</i> кезінде [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бекітілді].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|өзгерісіне|өзгерісіне}}] сын беруі {{PLURAL:$3|керек|керек}}.',
	'revreview-noflagged' => "Бұл беттің сын берілген нұсқалары мында жоқ, сондықтан бұның сапасы
'''[[{{MediaWiki:Validationpage}}|тексерілмеген]]''' болуы мүмкін.",
	'revreview-note' => '[[{{ns:user}}:$1]] бұл нұсқаға  [[{{MediaWiki:Validationpage}}|сын бергенде]] келесі аңғартулар жасады:',
	'revreview-notes' => 'Көрсетілетін пікірлер мен аңғартпалар:',
	'revreview-oldrating' => 'Бұл мына баға алды:',
	'revreview-patrolled' => '[[:$1|$1]] дегеннің бөлектелінген нұсқасы күзетте деп белгіленді.',
	'revreview-quality' => 'Бұл ең соңғы [[{{MediaWiki:Validationpage}}|сапалы]] нұсқа,
<i>$2</i> кезінде [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бекітілген]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Жоба жазбасы]
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
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} бапталауы] мүмкін.',
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
<i>$2</i> kezinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bekitilgen]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Joba jazbası]
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
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} barlıq tizimi]) <i>$2</i> kezinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bekitildi]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|özgerisine|özgerisine}}] sın berwi {{PLURAL:$3|kerek|kerek}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Eñ soñğı sapalı nusqası]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} barlığınıñ tizimi]) <i>$2</i> kezinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bekitildi].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|özgerisine|özgerisine}}] sın berwi {{PLURAL:$3|kerek|kerek}}.',
	'revreview-noflagged' => "Bul bettiñ sın berilgen nusqaları mında joq, sondıqtan bunıñ sapası
'''[[{{MediaWiki:Validationpage}}|tekserilmegen]]''' bolwı mümkin.",
	'revreview-note' => '[[{{ns:user}}:$1]] bul nusqağa  [[{{MediaWiki:Validationpage}}|sın bergende]] kelesi añğartwlar jasadı:',
	'revreview-notes' => 'Körsetiletin pikirler men añğartpalar:',
	'revreview-oldrating' => 'Bul mına bağa aldı:',
	'revreview-patrolled' => '[[:$1|$1]] degenniñ bölektelingen nusqası küzette dep belgilendi.',
	'revreview-quality' => 'Bul eñ soñğı [[{{MediaWiki:Validationpage}}|sapalı]] nusqa,
<i>$2</i> kezinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bekitilgen]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Joba jazbası]
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
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} baptalawı] mümkin.',
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
	'revreview-update-includes' => "'''ទំព័រគំរូ/រូបភាពមួយចំនួនត្រូវបានធ្វើឱ្យទាន់សម័យរួចហើយ:'''",
	'revreview-revnotfound' => 'កំណែប្រែចាស់របស់ទំព័រដែលអ្នកស្វែងរកមិនមានទេ។ ចូរពិនិត្យURLដែលអ្នកធ្លាប់ដំណើរការទំព័រនេះ។',
	'readerfeedback-completeness' => 'ភាពសម្រេច',
	'readerfeedback-npov' => 'អព្យាក្រឹតភាព',
	'readerfeedback-presentation' => 'ការ​បង្ហាញ',
	'readerfeedback-level-0' => 'ខ្សោយ',
	'readerfeedback-level-1' => 'ទាប',
	'readerfeedback-level-2' => 'មធ្យម',
	'readerfeedback-level-3' => 'ខ្ពស់',
	'readerfeedback-level-4' => 'ល្អប្រសើរ',
	'readerfeedback-submit' => 'ដាក់ស្នើ',
	'readerfeedback-submitting' => 'កំពុង​ដាក់ស្នើ...',
	'readerfeedback-finished' => 'សូមអរគុណ!',
	'revreview-filter-all' => 'ទាំងអស់',
	'revreview-filter-auto' => 'ដោយស្វ័យប្រវត្តិ',
	'revreview-statusfilter' => 'ស្ថានភាព:',
	'revreview-typefilter' => 'ប្រភេទ:',
	'revreview-tagfilter' => 'ប្លាក៖',
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
 */
$messages['ko'] = array(
	'editor' => '편집자',
	'flaggedrevs-prefs-watch' => '내가 검토한 문서를 주시문서 목록에 추가',
	'group-editor' => '편집자',
	'group-editor-member' => '편집자',
	'group-reviewer' => '평론가',
	'group-reviewer-member' => '평론가',
	'hist-stable' => '검토된 판',
	'review-logentry-app' => '[[$1]] 문서를 검토함',
	'review-logentry-id' => '$1판',
	'review-logentry-diff' => '안정 버전과의 차이',
	'reviewer' => '평론가',
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
	'revreview-edit' => '초안 편집',
	'revreview-flag' => '이 판을 검토하기',
	'revreview-newest-basic' => '이 문서는 <i>$2</i>에 마지막으로 [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 검토]되었습니다. ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 검토된 모든 편집의 목록])
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3개의 편집]이 검토를 기다리고 있습니다.',
	'revreview-patrol' => '이 편집을 검토된 것으로 표시',
	'revreview-patrol-title' => '검토된 것으로 표시',
	'revreview-quick-invalid' => "'''판 번호가 잘못되었습니다.'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|현재 판]]''' (검토되지 않음)",
	'revreview-quick-see-basic' => "'''초안''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 문서 보기]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 비교])",
	'revreview-quick-see-quality' => "'''초안''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 문서 보기]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 비교])",
	'revreview-selected' => "'''$1:'''의 선택된 판",
	'revreview-style' => '가독성',
	'revreview-style-2' => '좋음',
	'revreview-style-3' => '명확함',
	'revreview-submit' => '보내기',
	'revreview-submitting' => '보내는 중...',
	'revreview-finished' => '검토 완료!',
	'revreview-toggle-title' => '자세한 내용 보기/숨기기',
	'revreview-update-includes' => "'''일부 틀이나 그림이 수정되었습니다:'''",
	'revreview-revnotfound' => '문서의 해당 버전을 찾지 못했습니다. 접속 URL을 확인해 주세요.',
	'right-autoreview' => '자신의 편집을 자동적으로 검토',
	'right-movestable' => '안정 문서를 옮기기',
	'right-review' => '다른 사람의 편집을 검토',
	'rights-editor-revoke' => '[[$1]]의 편집자 권한을 해제함',
	'readerfeedback-reliability' => '가독성',
	'readerfeedback-completeness' => '완성도',
	'readerfeedback-npov' => '중립성',
	'readerfeedback-level-0' => '최하',
	'readerfeedback-level-1' => '낮음',
	'readerfeedback-level-2' => '양호',
	'readerfeedback-level-3' => '높음',
	'readerfeedback-level-4' => '우수',
	'readerfeedback-submit' => '제출',
	'readerfeedback-success' => "'''이 문서를 평가해 주셔서 감사합니다!''' ([$3 질문이나 의견이 있으신가요?])",
	'readerfeedback-finished' => '감사합니다!',
	'revreview-filter-auto' => '자동',
	'revreview-filter-manual' => '수동',
	'tooltip-ca-ratinghist' => '이 문서에 대한 평가',
	'revreview-tt-review' => '이 문서를 검토',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'flaggedrevs-desc' => 'Määt et för de Metmaacher müjjelesch, de Versijone fun Sigge ze övverpröfe un dat faßzehallde, un domet dänne ier Qualität stabil ze hallde.',
	'revreview-auto' => 'automattesch',
	'revreview-log' => 'Koot zosamme jefaß:',
	'revreview-quick-invalid' => "'''Onjöltijje Versions-Nommer'''",
	'revreview-revnotfound' => '<b>Dä.</b> Die ählere Version vun dä Sigg, wo De noh frochs, es nit do. Schad. Luur ens 
op die URL, die Dich herjebraht hät, die weed verkihrt sin, oder se es villeich üvverhollt, weil einer die Sigg 
fottjeschmesse hät?',
	'revreview-filter-all' => 'All',
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
 * @author Robby
 */
$messages['lb'] = array(
	'editor' => 'Editeur',
	'flaggedrevs' => 'Markéiert Versiounen',
	'flaggedrevs-prefs' => 'Stabilitéit',
	'flaggedrevs-prefs-stable' => "Ëmmer déi stabil Versioun vum Inhalt vun de Säiten ''par défaut'' weisen (wann et eng gëtt)",
	'flaggedrevs-prefs-watch' => 'Säiten déi ech nogekuckt hunn op meng Iwwerwaachungslëscht derbäisetzen',
	'group-editor' => 'Editeuren',
	'group-editor-member' => 'Editeur',
	'group-reviewer' => 'Reviseuren',
	'group-reviewer-member' => 'Reviseur',
	'grouppage-editor' => '{{ns:project}}:Editeur',
	'grouppage-reviewer' => '{{ns:project}}:Reviseur',
	'hist-draft' => 'Brouillonsversioun',
	'hist-quality' => 'Qualitéitsversioun',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validéiert] vum [[User:$3|$3]]',
	'hist-stable' => 'iwwerkuckte Versioun',
	'review-diff2stable' => 'Ännerungen tëschent der stabiler an der aktueller Versioun',
	'review-logentry-app' => 'nogekuckt [[$1]]',
	'review-logentry-id' => 'Versiounsnummer $1',
	'review-logpage' => 'Lëscht vum Nokucken',
	'reviewer' => 'Reviseur',
	'revisionreview' => 'Versiounen nokucken',
	'revreview-accuracy-1' => 'Iwwerkuckt',
	'revreview-accuracy-3' => 'Gudd dokumentéiert',
	'revreview-accuracy-4' => 'Exzellent',
	'revreview-auto' => '(automatesch)',
	'revreview-current' => 'Virbereedung',
	'revreview-depth' => 'Déift',
	'revreview-depth-1' => 'Einfach',
	'revreview-depth-2' => 'Moderat',
	'revreview-depth-3' => 'Héich',
	'revreview-depth-4' => 'Exzellent',
	'revreview-draft-title' => 'Brouillon vun enger Säit',
	'revreview-edit' => 'Virbereedung änneren',
	'revreview-flag' => 'Dës Versioun nokucken',
	'revreview-legend' => 'Contenu vun der Versioun bewerten',
	'revreview-log' => 'Bemierkung:',
	'revreview-note' => '[[User:$1|$1]] huet dës Notize gemaach, wéi dës Versioun [[{{MediaWiki:Validationpage}}|nogekuckt gouf]]:',
	'revreview-notes' => 'Bemierkungen oder Notizen fir unzeweisen:',
	'revreview-quality-title' => 'Qualitéitssäit',
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Iwwerkuckte Säit]]'''",
	'revreview-quick-invalid' => "'''Ongëlteg Versiounsnummer'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Aktuell Versioun]]''' (net iwwerkuckt)",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Qualitéitssäit]]'''",
	'revreview-selected' => "Ausgewielte Versioune vun '''$1''':",
	'revreview-stable' => 'Stabil Säit',
	'revreview-stable-title' => 'Iwwerkuckte Säit',
	'revreview-style' => 'Liesbarkeet',
	'revreview-style-1' => 'Akzeptabel',
	'revreview-style-2' => 'Gudd',
	'revreview-style-3' => 'Genee',
	'revreview-style-4' => 'Exzellent',
	'revreview-toggle-title' => 'Detailer weisen/verstoppen',
	'revreview-update-includes' => "'''Verschidde Schablounen/Biller goufen aktualiséiert:'''",
	'revreview-update-use' => "'''Bemierkung:''' Wann eng/t vun dëse Schablounen/Biller eng stabil Versioun huet, dat gëtt déi schonn an der stabiler Versioun vun dëser Säit benotzt.",
	'revreview-revnotfound' => "Déi Versioun vun der Säit déi Dir gefrot hutt konnt net fonnt ginn. Kuckt d'URL no, déi Dir benotzt hutt fir op dës Säit ze kommen.",
	'right-autoreview' => 'Versiounen automatesch als iwwerkuckt markéieren',
	'right-movestable' => 'Stabil Säite réckelen',
	'right-review' => 'Versiounen als iwwerkuckt markéieren',
	'right-validate' => 'Versiounen als validéiert markéieren',
	'specialpages-group-quality' => 'Qualitéitssécherung',
	'stable-logpage' => 'Lëscht vun de stabile Versiounen',
	'readerfeedback' => 'Wat haalt Dir vun dëser Säit?',
	'readerfeedback-reliability' => 'Zouverlässigkeet',
	'readerfeedback-npov' => 'Neutralitéit',
	'readerfeedback-presentation' => 'Presentatioun',
	'readerfeedback-overall' => 'Am Ganzen',
	'readerfeedback-level-none' => '(onsécher)',
	'readerfeedback-level-0' => 'Schwaach',
	'readerfeedback-level-1' => 'Niddereg',
	'readerfeedback-level-2' => 'Fair',
	'readerfeedback-level-3' => 'Héich',
	'readerfeedback-level-4' => 'Exzellent',
	'readerfeedback-finished' => 'Merci!',
	'revreview-filter-all' => 'All',
	'revreview-filter-auto' => 'Automatesch',
	'revreview-filter-manual' => 'Manuel',
	'revreview-filter-level-1' => 'Qualitéitsversiounen',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Typ:',
	'revreview-tagfilter' => 'Tag:',
	'tooltip-ca-current' => 'Den aktuelle Brouillon vun dëser Säit weisen',
	'tooltip-ca-stable' => 'Déi stabil Versioun vun dëser Säit gesinn',
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
	'revreview-basic' => "Dit is de lets [[{{MediaWiki:Validationpage}}|beoordeilde]] versie, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>. De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige] kin [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerk] waere; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|wach|wachte}} op 'n beoordeiling.",
	'revreview-basic-same' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|beoordeelde]] versie, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>. De pagina is te [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerken].',
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
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alles tone]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd]
op <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|haet|höbbe}} 'n beoordeiling neudig.",
	'revreview-newest-quality' => "De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letste kwaliteitsversie]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alles tone]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd]
op <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|haet|höbbe}} 'n beoordeiling neudig.",
	'revreview-noflagged' => "D'r zeen gein beoordeelde versies van deze pagina, dus dae is wellich '''neet''' [[{{MediaWiki:Validationpage}}|gecontroleerd]] op kwaliteit.",
	'revreview-note' => '[[User:$1|$1]] heeft de volgende opmerkingen gemaakt bij de [[{{MediaWiki:Validationpage}}|beoordeling]] van deze versie:',
	'revreview-notes' => 'Weer te geve observaties of notities:',
	'revreview-oldrating' => 'Woor gewardeerd es:',
	'revreview-patrol' => 'Deze bewerking as gecontroleerd markere',
	'revreview-patrolled' => 'De geselecteerde versie van [[:$1|$1]] is gemarkeerd als gecontroleerd.',
	'revreview-quality' => "Dit is de letste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>. De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige] kin [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerk] waere; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|wach|wachte}} op 'n beoordeiling.",
	'revreview-quality-same' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>. De pagina is te [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerken].',
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
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Review]] ale angeringe ''(shown below)'' made since the stable revision was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved].",
	'revreview-visibility' => 'Dees pazjena haet een [[{{MediaWiki:Validationpage}}|stabiele versie]], die [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} aangepas] kan waere.',
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
 * @author Brest
 */
$messages['mk'] = array(
	'editor' => 'Уредувач',
	'flaggedrevs' => 'Означени ревизии',
	'group-editor' => 'Уредувачи',
	'group-editor-member' => 'уредувач',
	'group-reviewer' => 'Оценувачи',
	'group-reviewer-member' => 'оценувач',
	'grouppage-editor' => '{{ns:project}}:Уредувач',
	'grouppage-reviewer' => '{{ns:project}}:Оценувач',
	'revreview-revnotfound' => 'Старата верзија на оваа страница не може да се пронајде.
Проверете ја URL адресата што ја користевте за пристап до оваа страница.',
);

/** Malayalam (മലയാളം)
 * @author Jacob.jose
 * @author Shijualex
 */
$messages['ml'] = array(
	'editor' => 'എഡിറ്റര്‍',
	'flaggedrevs-desc' => 'എഡിറ്റര്‍മാര്‍ക്കും സം‌ശോധകര്‍ക്കും പതിപ്പുകള്‍ ഗുണപരിശോധന നടത്താനും താളുകള്‍ സ്ഥിരപ്പെടുത്താനുമുള്ള അവകാശം കൊടുക്കുന്നു.',
	'flaggedrevs-prefs' => 'സ്ഥിരത',
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
	'revreview-basic' => "ഈ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|sighted]] പതിപ്പ്, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}}  ''$2'' നു അംഗീകരിച്ചതാണ്‌]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിന്റെ] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|മാറ്റം|മാറ്റങ്ങള്‍}}] സം‌ശോധനത്തിനു തയ്യാറാണ്‌.",
	'revreview-basic-i' => 'ഇതാണു <i>$2</i>ന്റെ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}}അംഗീകരിക്കപ്പെട്ട] ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|സൈറ്റഡ്]] സം‌ശോധനം.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിനു] സം‌ശോധനത്തിനായി കാത്തിരിക്കുന്ന [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/image changes] ഉണ്ട്.',
	'revreview-basic-old' => "ഈ [[{{MediaWiki:Validationpage}}|sighted]] പതിപ്പ് ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്]. പുതിയ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} മാറ്റങ്ങള്‍] വന്നിരിക്കാന്‍ സാദ്ധ്യതയുണ്ട്.",
	'revreview-basic-same' => 'ഈ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|sighted]] പതിപ്പ് ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാ പതിപ്പുകളും പ്രദര്‍ശിപ്പിക്കുക]), <i>$2</i>നു [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതാണ്] ഈ താള്‍.',
	'revreview-basic-source' => "ഈ താളിന്റെ [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}}  ഒരു sighted പതിപ്പ്], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചത്] ഈ പതിപ്പിനെ അടിസ്ഥാനമാക്കിയാണ്‌.",
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
	'revreview-newest-basic' => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഏറ്റവും പുതിയ sighted പതിപ്പ്] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക])[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2''നു അംഗീകരിച്ചതാണ്‌].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|മാറ്റത്തിനു|മാറ്റങ്ങള്‍ക്ക്}}] {{PLURAL:$3|സംശോധനം വേണം|സംശോധനം വേണം}}.",
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഏറ്റവും അവസാനത്തെ സൈറ്റഡ് പതിപ്പ്] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]) <i>$2</i> നാണ്‌ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചത്].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/image changes]-നു സം‌ശോധനം ആവശ്യമാണ്‌.',
	'revreview-newest-quality' => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഈ ഉന്നത നിലവാരമുള്ള ഏറ്റവും പുതിയ പതിപ്പ്] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്‌] .
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|മാറ്റത്തിനു|മാറ്റങ്ങള്‍ക്ക്}}] {{PLURAL:$3|സംശോധനം വേണം|സംശോധനം വേണം}}.",
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഏറ്റവും അവസാനത്തെ ഗുണമേന്മയുള്ള സംശോധന] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]) <i>$2</i> നാണ്‌ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചത്].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/image changes]-നു സം‌ശോധനം ആവശ്യമാണ്‌.',
	'revreview-noflagged' => 'ഈ താളിനു സം‌ശോധനം ചെയ്ത പതിപ്പുകള്‍ ഒന്നും തന്നെയില്ല. അതിനാല്‍ ഈ താളിന്റെ [[{{MediaWiki:Validationpage}}|ഗുണനിലവാര പരിശോധന‍]] നടന്നു കാണില്ല.',
	'revreview-note' => '[[User:$1|$1]] എന്ന ഉപയോക്താവ് ഈ പതിപ്പ് [[{{MediaWiki:Validationpage}}|സംശോധനം ചെയ്യുമ്പോള്‍]] താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന കുറിപ്പ് ചേര്‍ത്തിരുന്നു:',
	'revreview-notes' => 'പ്രദര്‍ശിപ്പിക്കാനുള്ള വിലയിരുത്തലുകള്‍/കുറിപ്പുകള്‍:',
	'revreview-oldrating' => 'മൂല്യനിര്‍ണ്ണയ ഫലം:',
	'revreview-patrol' => 'ഈ മാറ്റം റോന്തു ചുറ്റിയതായി രേഖപ്പെടുത്തി',
	'revreview-patrolled' => '[[:$1|$1]]ന്റെ തിരഞ്ഞെടുത്ത പതിപ്പില്‍ റോന്തു ചുറ്റിയതായി രേഖപ്പെടുത്തി.',
	'revreview-quality' => "ഈ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള]] പതിപ്പ്, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്‌].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിന്റെ] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|മാറ്റം|മാറ്റങ്ങള്‍}}] സം‌ശോധനത്തിനു തയ്യാറാണ്‌.",
	'revreview-quality-i' => 'ഇതാണു <i>$2</i>ന്റെ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിക്കപ്പെട്ട] ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|ഗുണമേന്മയുള്ള]] പതിപ്പ്.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിനു] സം‌ശോധനത്തിനായി കാത്തിരിക്കുന്ന  [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/image changes] ഉണ്ട്.',
	'revreview-quality-old' => "ഈ [[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള]]  പതിപ്പ് ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്]. പുതിയ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} മാറ്റങ്ങള്‍] വന്നിരിക്കാന്‍ സാദ്ധ്യതയുണ്ട്.",
	'revreview-quality-same' => 'ഇതാണ്‌ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള]] പതിപ്പ് ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാ പതിപ്പുകളും പ്രദര്‍ശിപ്പിക്കുക]), <i>$2</i>നു  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതാണ്].',
	'revreview-quality-source' => "ഈ താളിന്റെ [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} ഉന്നത നിലവാരമുള്ള ഒരു പതിപ്പ്], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചത്], ഈ പതിപ്പിനെ അടിസ്ഥാനമാക്കിയാണ്‌.",
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
	'revreview-update' => "സ്ഥിരതയുള്ള പതിപ്പ് [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതിനു ശേഷം] വരുത്തിയ മാറ്റങ്ങള്‍ ''(താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്നു)''. ദയവായി  [[{{MediaWiki:Validationpage}}|സംശോധനം]] ചെയ്യുക.
 
'''ചില ഫലകങ്ങള്‍/ചിത്രങ്ങള്‍ പുതുക്കിയിട്ടുണ്ട്:'''",
	'revreview-update-includes' => "'''ചില ഫലകങ്ങള്‍/ചിത്രങ്ങള്‍ പുതുക്കി:'''",
	'revreview-update-none' => "സ്ഥിരതയുള്ള പതിപ്പ് [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതിനു ശേഷം]
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
	'flaggedrevs-prefs' => 'स्थिरता',
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
	'revreview-basic' => "ही नवीनतम [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] आता '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} बदलता]''' येऊ शकते;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची वाट पाहत आहोत.",
	'revreview-basic-i' => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] ज्यामध्ये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साचे/चित्र बदल] आहेत, तपासण्यासाठी बाकी आहे.',
	'revreview-basic-old' => 'ही एक [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> ला [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
नवीन [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} बदल] केलेले असण्याची शक्यता आहे.',
	'revreview-basic-same' => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.',
	'revreview-basic-source' => 'या पानाची एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} निवडलेली आवृत्ती], जी <i>$2</i> ला[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे, या आवृत्तीवर आधारित आहे.',
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नविनतम निवडलेली आवृत्ती] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]) ही <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित केलेली आहे].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची गरज आहे.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम निवडलेली आवृत्ती] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]) <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साचा/चित्र बदल] तपासायचे राहिलेले आहेत.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नविनतम निवडलेली आवृत्ती] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]) ही <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित केलेली आहे].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची गरज आहे.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम गुणवत्तापूर्ण आवृत्ती] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]) <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साचा/चित्र बदल] तपासायचे राहिलेले आहेत.',
	'revreview-noflagged' => "या पानाच्या तपासलेल्या आवृत्त्या नाहीत, त्यामुळे हे पान गुणवत्तेसाठी [[{{MediaWiki:Validationpage}}|तपासलेले]] '''नसण्याची''' शक्यता आहे.",
	'revreview-note' => '[[User:$1|$1]] ने ही आवृत्ती [[{{MediaWiki:Validationpage}}|तपासताना]] खालील सूचना दिलेल्या आहेत:',
	'revreview-notes' => 'आपली मते अथवा निष्कर्ष:',
	'revreview-oldrating' => 'याचे गुणांकन:',
	'revreview-patrol' => 'हा बदल पाहिला असल्याची खूण करा',
	'revreview-patrol-title' => 'गस्त घातल्याची खूण करा',
	'revreview-patrolled' => '[[:$1|$1]] च्या निवडलेल्या आवृत्तीवर पहाण्याची नोंद केलेली आहे.',
	'revreview-quality' => "ही नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] आता '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} बदलता]''' येऊ शकते;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची वाट पाहत आहोत.",
	'revreview-quality-i' => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] ज्यामध्ये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} साचे/चित्र बदल] आहेत, तपासण्यासाठी बाकी आहे.',
	'revreview-quality-old' => 'ही एक [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> ला [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
नवीन [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} बदल] केलेले असण्याची शक्यता आहे.',
	'revreview-quality-same' => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.',
	'revreview-quality-source' => 'या पानाची एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} गुणवत्तापूर्ण आवृत्ती], जी <i>$2</i> ला[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे, या आवृत्तीवर आधारित आहे.',
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
([{{fullurl:Special:Stableversions|page=$2}} सर्व खूणा केलेल्या आवृत्त्या पहा])'''",
	'revreview-successful2' => "'''[[:$1|$1]] च्या निवडलेल्या आवृत्तीची खूण काढली.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|स्थिर आवृत्त्या]] या एखाद्या पानाच्या नविनतम आवृत्तीमधून न घेता मूळ मजकूरावरुन घेतल्या जातात.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|स्थिर आवृत्त्या]] या पानाच्या तपासलेल्या आवृत्त्या असतात व बघणार्‍यांसाठी अविचल मजकूर दर्शवितात.''",
	'revreview-toggle' => '(+/-)',
	'revreview-toggle-title' => 'जास्तीची माहिती दाखवा/लपवा',
	'revreview-toolow' => 'एखादी आवृत्ती तपासलेली आहे अशी खूण करण्यासाठी तुम्ही खालील प्रत्येक पॅरॅमीटर्सना "अप्रमाणित" पेक्षा वरचा दर्जा देणे आवश्यक आहे.
एखाद्या आवृत्तीचे गुणांकन कमी करण्यासाठी, खालील सर्व रकान्यांमध्ये "अप्रमाणित" भरा.',
	'revreview-update' => "कृपया केलेले बदल ''(खाली दिलेले)'' [[{{MediaWiki:Validationpage}}|तपासा]] कारण स्थिर आवृत्ती [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.<br />
'''काही साचे/चित्रे बदललेली आहेत:'''",
	'revreview-update-includes' => "'''काही साचे/चित्र बदलण्यात आलेले आहेत:'''",
	'revreview-update-none' => "कृपया केलेले बदल ''(खाली दिलेले)'' [[{{MediaWiki:Validationpage}}|तपासा]] कारण स्थिर आवृत्ती [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.",
	'revreview-update-use' => "'''सूचना:''' जर यापैकी एका साचा/चित्राची स्थिर आवृत्ती असेल, तर ती या पानाच्या स्थिर आवृत्ती मध्ये अगोदरच वापरलेली असेल.",
	'revreview-diffonly' => "''हे पान तपासण्यासाठी, \"आत्ताची आवृत्ती\" वर टिचकी द्या व तपासणी अर्ज वापरा.''",
	'revreview-visibility' => "'''या पानाला एक [[{{MediaWiki:Validationpage}}|स्थिर आवृत्ती]] आहे, जी [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} बदलली] जाऊ शकते.'''",
	'revreview-revnotfound' => 'या पृष्ठाची तुम्ही मागविलेली जुनी आवृत्ती सापडली नाही.
कृपया URL तपासून पहा.',
	'right-autopatrolother' => 'मुख्य नामविश्व सोडून इतर नामविश्वांतील पानांच्या आवृत्त्यांवर आपोआप लक्ष ठेवले म्हणून खूणा करा',
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
 */
$messages['ms'] = array(
	'editor' => 'Penyunting',
	'flaggedrevs' => 'Semakan Bertanda',
	'flaggedrevs-backlog' => "Terdapat sebuah log di [[Special:OldReviewedPages|Laman disemak lapuk]]. '''Sila ambil perhatian!'''",
	'flaggedrevs-desc' => 'Membolehkan para penyunting dan pemeriksa mengesahkan semakan dan menstabilkan laman',
	'flaggedrevs-pref-UI-0' => 'Gunakan antara muka pengguna yang terperinci',
	'flaggedrevs-pref-UI-1' => 'Gunakan antara muka pengguna yang ringkas',
	'flaggedrevs-prefs' => 'Kestabilan',
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
	'review-logentry-app' => 'memeriksa [[$1]]',
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
	'revreview-basic' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 perubahan] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-basic-i' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/imej] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-basic-old' => 'Ini ialah sebuah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Beberapa [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan] baru mungkin telah dibuat.',
	'revreview-basic-same' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.',
	'revreview-basic-source' => 'Terdapat sebuah [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versi dijenguk] bagi laman ini, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>, berdasarkan semakan ini.',
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan dijenguk terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]) telah [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 perubahan] yang belum diperiksa.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan dijenguk terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]) telah [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.\\n
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/imej] yang belum diperiksa.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan bermutu terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]) telah [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.\\n
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 perubahan] yang belum diperiksa.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan bermutu terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) telah [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.\\n
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/imej] yang belum diperiksa.',
	'revreview-noflagged' => "Laman ini tidak mempunyai semakan yang diperiksa, oleh itu ia '''belum''' [[{{MediaWiki:Validationpage}}|disahkan]] bermutu.",
	'revreview-note' => '[[User:$1|$1]] membuat catatan berikut ketika [[{{MediaWiki:Validationpage}}|memeriksa]] semakan ini:',
	'revreview-notes' => 'Catatan:',
	'revreview-oldrating' => 'Penilaian:',
	'revreview-patrol' => 'Tanda ronda perubahan ini',
	'revreview-patrol-title' => 'Tanda ronda',
	'revreview-patrolled' => 'Semakan bagi [[:$1|$1]] yang anda pilih telah ditanda ronda.',
	'revreview-quality' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|bermutu]] terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 perubahan] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-quality-i' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|bermutu]] terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan templat/imej] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-quality-old' => 'Ini ialah sebuah semakan [[{{MediaWiki:Validationpage}}|bermutu]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Beberapa [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} perubahan] baru mungkin telah dibuat.',
	'revreview-quality-same' => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|bermutu]] terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.',
	'revreview-quality-source' => 'Terdapat sebuah [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versi bermutu] bagi laman ini, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>, berdasarkan semakan ini.',
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
	'revreview-successful' => "'''Semakan bagi [[:$1|$1]] berjaya ditanda. ([{{fullurl:Special:Stableversions|page=$2}} lihat semua versi stabil])'''",
	'revreview-successful2' => "'''Tanda semakan bagi [[:$1|$1]] berjaya dibuang.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] ialah kandungan laman lalai yang menggantikan semakan terbaru untuk dipaparkan kepada pengunjung.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] ialah semakan laman yang telah disahkan dan boleh dijadikan kandungan lalai untuk dipaparkan kepada pengunjung.''",
	'revreview-toggle-title' => 'papar/sembunyi butiran',
	'revreview-toolow' => 'Anda hendaklah memberi penilaian yang lebih tinggi daripada "tidak disahkan" kepada setiap kriteria di bawah.
Untuk menggugurkan semakan ini, sila berikan penilaian "tidak disahkan" kepada semua kriteria.',
	'revreview-update' => "Sila [[{{MediaWiki:Validationpage}}|periksa]] perubahan ''(ditunjukkan di bawah)'' yang telah dibuat sejak semakan stabil [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan].<br />
'''Beberapa templat/imej telah dikemaskinikan:'''",
	'revreview-update-includes' => "'''Beberapa templat/imej telah dikemaskinikan:'''",
	'revreview-update-none' => "Sila [[{{MediaWiki:Validationpage}}|periksa]] perubahan ''(ditunjukkan di bawah)'' yang telah dibuat sejak semakan stabil [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan].",
	'revreview-update-use' => "'''CATATAN:''' Jika sebarang templat/imej ini mempunyai versi stabil, maka versi itu telah pun digunakan dalam versi stabil bagi laman ini.",
	'revreview-diffonly' => "''Sila klik pautan \"semakan semasa\" dan gunakan borang pemeriksaan untuk memeriksa laman ini.''",
	'revreview-visibility' => "'''Laman ini mempunyai sebuah [[{{MediaWiki:Validationpage}}|versi stabil]]; tetapan baginya boleh [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} diubah].'''",
	'revreview-revnotfound' => 'Semakan lama untuk laman yang anda minta tidak dapat dijumpai. Sila semak URL yang anda gunakan untuk mencapai laman ini.',
	'right-autopatrolother' => 'Menanda ronda semakan dalam ruang nama bukan utama secara automatik',
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
	'readerfeedback' => 'Apakah pandangan anda mengenai laman ini?',
	'readerfeedback-text' => "''Sila luangkan sedikit masa untuk memberi penilaian kepada laman ini. Maklum balas anda amatlah dihargai dan diperlukan untuk memperbaiki tapak web kami.''",
	'readerfeedback-reliability' => 'Kebolehpercayaan',
	'readerfeedback-completeness' => 'Kesempurnaan',
	'readerfeedback-npov' => 'Kekecualian',
	'readerfeedback-presentation' => 'Persembahan',
	'readerfeedback-overall' => 'Keseluruhan',
	'readerfeedback-level-0' => 'Lemah',
	'readerfeedback-level-1' => 'Rendah',
	'readerfeedback-level-2' => 'Sederhana',
	'readerfeedback-level-3' => 'Tinggi',
	'readerfeedback-level-4' => 'Cemerlang',
	'readerfeedback-submit' => 'Serah',
	'readerfeedback-main' => 'Hanya laman kandungan boleh diberi penilaian.',
	'readerfeedback-success' => "'''Terima kasih kerana memeriksa laman ini!''' Keputusan maklum balas pembaca bagi laman '''$1''' boleh dilihat di $2.",
	'readerfeedback-voted' => "'''Anda telah pun memberi penilaian untuk laman ini.'''
Keputusan maklum balas pembaca bagi laman '''$1''' boleh dilihat di $2.",
	'readerfeedback-submitting' => 'Menyerah...',
	'readerfeedback-finished' => 'Terima kasih!',
	'revreview-filter-all' => 'Semua',
	'revreview-filter-approved' => 'Disahkan',
	'revreview-filter-reapproved' => 'Disahkan semula',
	'revreview-filter-unapproved' => 'Tidak disahkan',
	'revreview-filter-auto' => 'Automatik',
	'revreview-filter-manual' => 'Manual',
	'revreview-filter-level-0' => 'Versi dijenguk',
	'revreview-filter-level-1' => 'Versi bermutu',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Jenis:',
	'revreview-tagfilter' => 'Label:',
	'tooltip-ca-current' => 'Lihat draf laman ini',
	'tooltip-ca-stable' => 'Lihat versi stabil bagi laman ini',
	'tooltip-ca-default' => 'Tetapan jaminan mutu',
	'tooltip-ca-ratinghist' => 'Penilaian pembaca',
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
	'readerfeedback-level-0' => 'Лавшо',
	'readerfeedback-level-1' => 'Алкыне',
	'readerfeedback-level-2' => 'А берянь',
	'readerfeedback-level-3' => 'Вадря-паро',
	'readerfeedback-level-4' => 'Эйне вадря',
	'revreview-filter-all' => 'Весе',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'revreview-style-2' => 'Cualli',
	'readerfeedback-submitting' => 'Moihuacah...',
	'readerfeedback-finished' => '¡Tlazohcāmati!',
	'tooltip-ca-current' => 'Xiquitta āxcān zāzanilli ītzīmpēhualiz',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'flaggedrevs' => 'Tekente Versionen',
	'flaggedrevs-prefs' => 'Stabilität',
	'review-logentry-app' => 'hett „[[$1]]“ markeert',
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
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'editor' => 'Redacteur',
	'flaggedrevs' => 'Aangevinkte versies',
	'flaggedrevs-backlog' => "Er is op dit moment een achterstand in de controle van [[Special:OldReviewedPages|pagina's met eindredactie die zijn bijgewerkt]]. 
'''Uw aandacht is gewenst!'''",
	'flaggedrevs-desc' => 'Geeft redacteuren/controleurs de mogelijkheid versies te waarderen en stabiele versies aan te merken',
	'flaggedrevs-pref-UI-0' => 'Gedetailleerde gebruikersinterface voor stabiele versies gebruiken',
	'flaggedrevs-pref-UI-1' => 'Eenvoudige gebruikersinterface voor stabiele versies gebruiken',
	'flaggedrevs-prefs' => 'Stabiliteit',
	'flaggedrevs-prefs-stable' => "Altijd de stabiele versies van pagina's weergeven (als die bestaan)",
	'flaggedrevs-prefs-watch' => "Pagina's waar ik eindredactie voor doe aan mijn volglijst toevoegen",
	'group-editor' => 'redacteuren',
	'group-editor-member' => 'redacteur',
	'group-reviewer' => 'eindredacteuren',
	'group-reviewer-member' => 'eindredacteur',
	'grouppage-editor' => '{{ns:project}}:Redacteur',
	'grouppage-reviewer' => '{{ns:project}}:Eindredacteur',
	'hist-draft' => 'werkversie',
	'hist-quality' => 'kwaliteitsversie',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} eindredactie] door [[User:$3|$3]]',
	'hist-stable' => 'gecontroleerde versie',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} gecontroleerd] door [[User:$3|$3]]',
	'review-diff2stable' => 'Verschillen tussen stabiele versie en werkversie bekijken',
	'review-logentry-app' => 'heeft eindredactie gedaan voor [[$1]]',
	'review-logentry-dis' => 'heeft een versie van [[$1]] lager beoordeeld',
	'review-logentry-id' => 'versienummer $1',
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
	'revreview-basic' => 'Dit is de laatst [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] heeft [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wijziging|wijzigingen}}] die {{PLURAL:$3|wacht|wachten}} op eindredactie.',
	'revreview-basic-i' => 'Dit is de laatst [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] bevat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen in sjablonen/bestanden] die wachten op eindredactie.',
	'revreview-basic-old' => 'Dit is een [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
Er kunnen nieuwe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen] gemaakt zijn.',
	'revreview-basic-same' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.',
	'revreview-basic-source' => 'Een [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} gecontroleerde versie] van deze pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>, is gebaseerd op deze versie.',
	'revreview-changed' => "'''De gevraagde actie kon niet uitgevoerd worden voor deze versie van [[:$1|$1]].'''
	
Er is een sjabloon of afbeelding opgevraagd zonder dat een specifieke versie is aangegeven.
Dit kan voorkomen als een dynamisch sjabloon een andere afbeelding of een ander sjabloon bevat, afhankelijk van een variabele die is gewijzigd sinds u bent begonnen met de beoordeling van deze pagina.
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
	'revreview-newest-basic' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|heeft|hebben}} eindredactie nodig.',
	'revreview-newest-basic-i' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal weergeven]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen in sjablonen/bestanden] hebben eindredactie nodig.',
	'revreview-newest-quality' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatste kwaliteitsversie] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|heeft|hebben}} eindredactie nodig.',
	'revreview-newest-quality-i' => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatste kwaliteitsversie] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal weergeven]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen in sjablonen/bestanden] hebben eindredactie nodig.',
	'revreview-noflagged' => "Er zijn geen versies met eindredactie van deze pagina, dus die is wellicht '''niet''' [[{{MediaWiki:Validationpage}}|beoordeeld]] op kwaliteit.",
	'revreview-note' => '[[User:$1|$1]] heeft de volgende opmerkingen gemaakt bij de [[{{MediaWiki:Validationpage}}|eindredactie]] van deze versie:',
	'revreview-notes' => 'Weer te geven observaties of notities:',
	'revreview-oldrating' => 'Werd gewaardeerd als:',
	'revreview-patrol' => 'Deze bewerking als gecontroleerd markeren',
	'revreview-patrol-title' => 'Als gecontroleerd markeren',
	'revreview-patrolled' => 'De geselecteerde versie van [[:$1|$1]] is gemarkeerd als gecontroleerd.',
	'revreview-quality' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] heeft [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|wijziging|wijzigingen}}] die {{PLURAL:$3|wacht|wachten}} op eindredactie.',
	'revreview-quality-i' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] bevat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen in sjablonen/bestanden] die wachten op eindredactie.',
	'revreview-quality-old' => 'Dit is een [[{{MediaWiki:Validationpage}}|kwaliteitsversie]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alles bekijken]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
Er kunnen nieuwe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} wijzigingen] gemaakt zijn.',
	'revreview-quality-same' => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.',
	'revreview-quality-source' => 'Een [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kwaliteitsversie] van deze pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>, is gebaseerd op deze versie.',
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
	'revreview-stable1' => 'U kunt van deze pagina [{{fullurl:$1|stableid=$2}} deze gecontroleerde versie] om te beoordelen of dit nu de [{{fullurl:$1|stable=1}} stabiele versie] is.',
	'revreview-stable2' => 'Wellicht wilt u de [{{fullurl:$1|stable=1}} stabiele versie] van deze pagina bekijken (als die er nog is).',
	'revreview-style' => 'Leesbaarheid',
	'revreview-style-0' => 'Niet goedgekeurd',
	'revreview-style-1' => 'Aanvaardbaar',
	'revreview-style-2' => 'Goed',
	'revreview-style-3' => 'Bondig',
	'revreview-style-4' => 'Uitgelicht',
	'revreview-submit' => 'Opslaan',
	'revreview-submitting' => 'Bezig met opslaan...',
	'revreview-finished' => 'Eindredactie afgerond.',
	'revreview-successful' => "'''De versie van [[:$1|$1]] is gecontroleerd. ([{{fullurl:Special:Stableversions|page=$2}} stabiele versies bekijken])'''",
	'revreview-successful2' => "'''De versie van [[:$1|$1]] is als niet stabiel aangemerkt.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabiele versies]] worden standaard weergegeven in plaats van de nieuwste versie.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabiele versies]] zijn gecontroleerde versies van pagina's die standaard weergegeven kunnen worden aan lezers.''",
	'revreview-toggle-title' => 'details weergeven/verbergen',
	'revreview-toolow' => 'U moet tenminste alle onderstaande eigenschappen hoger instellen dan "niet goedgekeurd" om voor een versie aan te merken geven dat deze eindredactie heeft gehad.
Stel alle velden in op "niet goedgekeurd" om de waardering van een versie te verwijderen.',
	'revreview-update' => "Voer [[{{MediaWiki:Validationpage}}|eindredactie]] uit op alle ''onderstaande'' wijzigingen die gemaakt zijn sinds de stabiele versie is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd].<br />
'''Enkele sjablonen of afbeeldingen zijn gewijzigd:'''",
	'revreview-update-includes' => "'''Sommige sjablonen/bestanden zijn bijgewerkt:'''",
	'revreview-update-none' => "Voer [[{{MediaWiki:Validationpage}}|eindredactie]] uit op de ''onderstaande'' wijzigingen die gemaakt zijn sinds de stabiele versie is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd].",
	'revreview-update-use' => "'''Let op:''' als een van deze sjablonen of bestanden een stabiele versie heeft, dan wordt die al gebruikt in de stabiele versie van deze pagina.",
	'revreview-diffonly' => "''Klik voor eindredactie op de verwijzing \"huidige versie\" en gebruik het eindredactieformulier.''",
	'revreview-visibility' => "'''Deze pagina heeft een [[{{MediaWiki:Validationpage}}|stabiele versie]]. U kunt hiervoor [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} instellingen maken].'''",
	'revreview-visibility2' => "'''Deze pagina heeft geen bijgewerkte [[{{MediaWiki:Validationpage}}|stabiele versie]]. U kunt hiervoor [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} instellingen maken].'''",
	'revreview-revnotfound' => 'De opgevraagde oude versie van deze pagina is onvindbaar.
Controleer de URL die u gebruikte om naar deze pagina te gaan.',
	'right-autopatrolother' => 'Veries buiten de hoofdnaamruimte automatisch als gecontroleerd markeren',
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
	'readerfeedback' => 'Wat vindt u van deze pagina?',
	'readerfeedback-text' => "''Neem de moeite om deze pagina hieronder te waarderen.
Uw terugkoppeling is waardevol en helpt ons deze website te verbeteren.''",
	'readerfeedback-reliability' => 'Betrouwbaarheid',
	'readerfeedback-completeness' => 'Volledigheid',
	'readerfeedback-npov' => 'Neutraliteit',
	'readerfeedback-presentation' => 'Presentatie',
	'readerfeedback-overall' => 'Algemeen',
	'readerfeedback-level-none' => '(weet niet)',
	'readerfeedback-level-0' => 'Slecht',
	'readerfeedback-level-1' => 'Laag',
	'readerfeedback-level-2' => 'In orde',
	'readerfeedback-level-3' => 'Hoog',
	'readerfeedback-level-4' => 'Uitstekend',
	'readerfeedback-submit' => 'Opslaan',
	'readerfeedback-main' => "Alleen pagina's uit de hoofdnaamruimte kunnen gewaardeerd worden.",
	'readerfeedback-success' => "'''Dank u wel voor het waarderen van deze pagina.'''
[$3 Opmerkingen of vragen?]",
	'readerfeedback-voted' => "'''U hebt al een waardering voor deze pagina opgegeven.'''
[$3 Opmerkingen of vragen?]",
	'readerfeedback-submitting' => 'Bezig met opslaan...',
	'readerfeedback-finished' => 'Bedankt!',
	'revreview-filter-all' => 'Alles',
	'revreview-filter-approved' => 'Gekeurd',
	'revreview-filter-reapproved' => 'Opnieuw gekeurd',
	'revreview-filter-unapproved' => 'Niet gekeurd',
	'revreview-filter-auto' => 'Automatisch',
	'revreview-filter-manual' => 'Handmatig',
	'revreview-filter-level-0' => 'Gecontroleerde versies',
	'revreview-filter-level-1' => 'Kwaliteitsversies',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Type:',
	'revreview-tagfilter' => 'Tag:',
	'revreview-reviewlink' => 'eindredactie',
	'tooltip-ca-current' => 'Werkversie van deze pagina bekijken',
	'tooltip-ca-stable' => 'Stabiele versie van deze pagina bekijken',
	'tooltip-ca-default' => 'Instellingen kwaliteitsbewaking',
	'tooltip-ca-ratinghist' => 'Waardering van deze pagina door lezers',
	'revreview-locked' => 'Bewerkingen op deze pagina behoeven eindredactie voordat ze weergegeven worden!',
	'revreview-unlocked' => 'Bewerkingen op deze pagina behoeven geen eindredactie voordat ze weergegeven worden!',
	'log-show-hide-review' => 'Waarderingslogboek $1',
	'revreview-tt-review' => 'Eindredactie voor deze pagina',
	'validationpage' => '{{ns:help}}:Paginaredactie',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'flaggedrevs' => 'Vurderte versjonar',
	'flaggedrevs-prefs' => 'Stabile sider',
	'hist-draft' => 'utkast',
	'hist-quality' => 'kvalitetsversjon',
	'hist-quality-user' => '[{{fulurl:$1|stableid=$2}} godkjend] av [[User:$3|$3]]',
	'hist-stable' => 'vurdert versjon',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} vurdert] av [[User:$3|$3]]',
	'review-diff2stable' => 'Syn endringar mellom den stabile og den noverande versjonen',
	'review-logentry-app' => 'vurderte [[$1]]',
	'review-logentry-id' => 'versjons-ID $1',
	'revreview-accuracy' => 'Vurdering',
	'revreview-accuracy-0' => 'Ikkje godkjend',
	'revreview-accuracy-1' => 'Vurdert',
	'revreview-accuracy-2' => 'Nøyaktig',
	'revreview-accuracy-3' => 'God kjeldetilvising',
	'revreview-auto' => '(automatisk)',
	'revreview-current' => 'Utkast',
	'revreview-draft-title' => 'Utkast',
	'revreview-log' => 'Kommentar:',
	'revreview-newest-basic' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste godkjende versjonen] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} syn alle]) vart [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|éi endring må verta vurdert|$3 endringar må verta vurderte}}].',
	'revreview-newest-basic-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste vurderte versjonen] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} syn alle]) vart [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mal- eller biletendringar] må verta vurderte.',
	'revreview-newest-quality' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste kvalitetssikra versjonen av sida]  ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} syn alle]) vart [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjend] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|éi endring må verta vurdert|$3 endringar må verta vurderte}}].',
	'revreview-quality-title' => 'Kvalitetsartikkel',
	'revreview-quick-invalid' => "'''Ugyldig versjons-ID'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Siste versjon]]''' (ikkje vurdert)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} syn utkast]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} syn utkast]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]'''",
	'revreview-quick-see-basic' => "'''Utkast''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} syn artikkel]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} jamfør])",
	'revreview-quick-see-quality' => "'''Utkast''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} syn artikkel]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} jamfør])",
	'revreview-selected' => "Valt versjon av '''$1''':",
	'revreview-stable' => 'Stabil sida',
	'revreview-stable-title' => 'Vurdert artikkel',
	'revreview-stable1' => 'Du ynskjer kanskje å sjå [{{fullurl:$1|stableid=$2}} denne merkte versjonen] og sjå om han er den [{{fullurl:$1|stable=1}} stabile versjonen] av denne sida.',
	'revreview-submit' => 'Utfør',
	'revreview-submitting' => 'Leverer …',
	'revreview-finished' => 'Vurdering fullførd.',
	'revreview-successful' => "'''Valt versjon av [[:$1|$1]] har vorten merkt. ([{{fullurl:Special:Stableversions|page=$2}} sjå alle stabile versjonar])'''",
	'revreview-toggle-title' => 'syn/løyn detaljar',
	'revreview-revnotfound' => 'Den gamle versjonen av sida du spurde etter finst ikkje. Sjekk nettadressa du brukte for å komma deg åt denne sida.',
	'right-movestable' => 'Flytta stabile sider',
	'right-review' => 'Merkja sideversjonar som vurderte',
	'readerfeedback-npov' => 'Nøytralitet',
	'readerfeedback-finished' => 'Takk!',
	'revreview-filter-all' => 'Alle',
	'revreview-filter-auto' => 'Automatisk',
	'revreview-filter-manual' => 'Manuelt',
	'revreview-statusfilter' => 'Stoda:',
	'revreview-typefilter' => 'Type:',
	'revreview-tagfilter' => 'Merke:',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author EivindJ
 * @author H92
 * @author Jon Harald Søby
 * @author Kph
 * @author Meno25
 * @author Stigmj
 */
$messages['no'] = array(
	'editor' => 'Skribent',
	'flaggedrevs' => 'Stabile versjoner',
	'flaggedrevs-backlog' => "Det er [[Special:OldReviewedPages|utdaterte anmeldte sider]] i kø. '''Din oppmerksomhet trens!'''",
	'flaggedrevs-desc' => 'Gir skribenter og anmeldere muligheten til å godkjenne sideversjoner og stabilisere sider',
	'flaggedrevs-pref-UI-0' => 'Bruk detaljert grensesnitt for stabile versjoner',
	'flaggedrevs-pref-UI-1' => 'Bruk enkelt grensesnitt for stabile versjoner',
	'flaggedrevs-prefs' => 'Stabile sider',
	'flaggedrevs-prefs-stable' => 'Vis alltid den stabile versjonen av sider (om en slik finnes)',
	'flaggedrevs-prefs-watch' => 'Legg til sider jeg anmelder i overvåkningslisten min',
	'group-editor' => 'Skribenter',
	'group-editor-member' => 'Skribent',
	'group-reviewer' => 'Anmeldere',
	'group-reviewer-member' => 'Anmelder',
	'grouppage-editor' => '{{ns:project}}:Skribenter',
	'grouppage-reviewer' => '{{ns:project}}:Anmeldere',
	'hist-draft' => 'utkastversjon',
	'hist-quality' => 'kvalitetsversjon',
	'hist-quality-user' => '[{{fulurl:$1|stableid=$2}} godkjent] av [[User:$3|$3]]',
	'hist-stable' => 'kontrollert versjon',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} sjekket] av [[User:$3|$3]]',
	'review-diff2stable' => 'Vis endringer mellom den stabile og den nåværende revisjonen',
	'review-logentry-app' => 'anmeldte [[$1]]',
	'review-logentry-dis' => 'degraderte en versjon av [[$1]]',
	'review-logentry-id' => 'versjons-ID $1',
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
	'revreview-basic' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|sjekkede]] versjonen, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}}  sjekket] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|endring|endringer}}] som venter på anmelding.',
	'revreview-basic-i' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|sjekkede]] sideversjonen, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mal- eller bildeendringer] som venter på anmeldelse.',
	'revreview-basic-old' => 'Dette er en [[{{MediaWiki:Validationpage}}|sjekket]] sideversjon ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} se alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.
Nye [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} endringer] har blitt gjort.',
	'revreview-basic-same' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|sjekkede]] sideversjonen ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} se alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.',
	'revreview-basic-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} sjekket versjon] av denne siden, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>, ble basert på denne versjonen.',
	'revreview-changed' => "'''Den handlignen kan ikke utføres på denne versjonen av [[:$1|$1]].'''

En mal eller et bilde kan ha blitt etterspurt uten noen spesifikk grunn. Dette kan skje om en mal inneholder et annt bilde eller en mal avhengig av en variabel som er blitt endret siden du begynte å anmelde siden. Å oppdatere siden og anmelde på nytt kan løse problemet.",
	'revreview-current' => 'Utkast',
	'revreview-depth' => 'Dybde',
	'revreview-depth-0' => 'Ikke godkjent',
	'revreview-depth-1' => 'Grunnleggende',
	'revreview-depth-2' => 'Middels',
	'revreview-depth-3' => 'Høy',
	'revreview-depth-4' => 'Utmerket',
	'revreview-draft-title' => 'Artikkelutkast',
	'revreview-edit' => 'Rediger utkast',
	'revreview-flag' => 'Anmeld denne sideversjonen',
	'revreview-edited' => "'''Endringer vil legges til den [[{{MediaWiki:Validationpage}}|stabile versjonen]] når en etablert bruker sjekker den.
''Utkastet'' vises nedenfor.''' [{{fullurl:{{FULLPAGENAME}}|oldid=$1|diff=cur}} $2 {{PLURAL:$2|endring venter|endringer venter}}] på å bli sjekket.",
	'revreview-invalid' => "'''Ugyldig mål:''' ingen [[{{MediaWiki:Validationpage}}|anmeldte]] versjoner tilsvarer den angitte ID-en.",
	'revreview-legend' => 'Vurder versjonens innhold',
	'revreview-log' => 'Kommentar:',
	'revreview-main' => 'Du må velge en viss revisjon av en innholdssiden for å anmelde den.

Se [[Special:Unreviewedpages|listen over uanmeldte sider]].',
	'revreview-newest-basic' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste godkjente versjonen] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|endring|endringer}}] må vurderes.',
	'revreview-newest-basic-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste godkjente versjonen] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mal- eller bildeendringer] må vurderes.',
	'revreview-newest-quality' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste kvalitetssikrede versjonen av siden]  ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|endring|endringer}}] må vurderes.',
	'revreview-newest-quality-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste kvalitetssikrede versjonen av siden]  ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mal- eller bildeendringer] må vurderes.',
	'revreview-noflagged' => "Det er ingen anmeldte versjoner av denne siden, så den har kanskje '''ikke''' blitt [[{{MediaWiki:Validationpage}}|kvalitetssjekket]].",
	'revreview-note' => '[[User:$1|$1]] hadde følgende merknader under [[{{MediaWiki:Validationpage}}|anmeldelsen]] av denne sideversjonen:',
	'revreview-notes' => 'Anmerkninger som vil vises:',
	'revreview-oldrating' => 'Den ble anmeldt som:',
	'revreview-patrol' => 'Merk denne endringen som patruljert',
	'revreview-patrol-title' => 'Merk som patruljert',
	'revreview-patrolled' => 'Den valgte versjonen av [[:$1|$1]] har blitt merket som patruljert.',
	'revreview-quality' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|én endring|$3 endringer}}] som venter på anmeldelse.',
	'revreview-quality-i' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} bilde- eller malendringer] som venter på anmeldelse.',
	'revreview-quality-old' => 'Dette er en [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} se alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.
Nye [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} endringer] kan ha blitt gjort.',
	'revreview-quality-same' => 'Dette er den siste [[{{MediaWiki:Validationpage}}|kvalitetsversjonen]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} se alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>.',
	'revreview-quality-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kvalitetsversjon] av denne siden, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] <i>$2</i>, ble basert på denne versjonen.',
	'revreview-quality-title' => 'Kvalitetsartikkel',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Kontrollert artikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Kontrollert artikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Kontrollert artikkel]]'''",
	'revreview-quick-invalid' => "'''Ugyldig versjons-ID'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Siste versjon]]''' (ikke sjekket)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]'''",
	'revreview-quick-see-basic' => "'''Utkast''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vis artikkel]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} sammenlign])",
	'revreview-quick-see-quality' => "'''Utkast''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vis artikkel]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} sammenlign])",
	'revreview-selected' => "Valgt versjon av '''$1''':",
	'revreview-source' => 'utkastets kilde',
	'revreview-stable' => 'Stabil side',
	'revreview-stable-title' => 'Kontrollert artikkel',
	'revreview-stable1' => 'Du vil kanskje se [{{fullurl:$1|stableid=$2}} denne flaggede versjonen] og se om den er den [{{fullurl:$1|stable=1}} stabile versjonen] av denne siden.',
	'revreview-stable2' => 'Du vil kanskje se den [{{fullurl:$1|stable=1}} stabile versjoen] av denne siden (om det fortsatt er en).',
	'revreview-style' => 'Lesbarhet',
	'revreview-style-0' => 'Ikke godkjent',
	'revreview-style-1' => 'Akseptabel',
	'revreview-style-2' => 'Bra',
	'revreview-style-3' => 'Konsis',
	'revreview-style-4' => 'Utmerket',
	'revreview-submit' => 'Anmeld',
	'revreview-submitting' => 'Leverer …',
	'revreview-finished' => 'Anmeldelse fullført.',
	'revreview-successful' => "'''Valgt versjon av [[:$1|$1]] har blitt merket. ([{{fullurl:Special:Stableversions|page=$2}} se alle stabile versjoner])'''",
	'revreview-successful2' => "'''Valgt versjon av [[:$1|$1]] ble degradert.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabile versjoner]] er standardinnhold i sider i stedet for den nyeste versjonen.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabile versjoner]] er kontrollerte versjoner av sider og kan stilles som standardinnhold for lesere.''",
	'revreview-toggle-title' => 'vis/skjul detaljer',
	'revreview-toolow' => 'Din vurdering av siden må minst være over «ikke godkjent» for alle egenskaper nedenfor for at versjonen skal anses som anmeldt. For å fjerne godkjenning av en versjon, angi «ikke godkjent» for alle egenskapene.',
	'revreview-update' => "Vennligst [[{{MediaWiki:Validationpage}}|anmeld]] endringer ''(vis nedenfor)'' som er blitt gjort siden den stabile versjonen ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent].<br />
'''Noen maler eller bilder ble oppdatert:'''",
	'revreview-update-includes' => "'''Noen maler/bilder ble oppdatert:'''",
	'revreview-update-none' => "Vennligst [[{{MediaWiki:Validationpage}}|anmeld]] endringer ''(vis nedenfor)'' som er blitt gjort siden den stabile versjonen ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent].",
	'revreview-update-use' => "'''MERK:''' Om noen av disse malene har en stabil versjon, er den allerede i bruk i den stabile versjonen av denne siden.",
	'revreview-diffonly' => "''For å anmelde siden, klikk på versjonslenken «nåværende versjon» og bruk anmeldelsesskjemaet.''",
	'revreview-visibility' => "'''Denne siden har en oppdatert [[{{MediaWiki:Validationpage}}|stabil versjon]]; innstillinger for stabile sider kan [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigureres].'''",
	'revreview-revnotfound' => 'Den gamle versjon av siden du etterspurte finnes ikke. Kontroller adressen du brukte for å få adgang til denne siden.',
	'right-autopatrolother' => 'Automatisk merke sideversjoner i andre navnerom enn hovednavnerommet som patruljerte',
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
	'readerfeedback' => 'Hva synes du om denne siden?',
	'readerfeedback-text' => "''Vennligst ta noen minutter for å vurdere denne siden nedenfor. Din tilbakemelding er verdifull og hjelper oss med å forbedre nettstedet vårt.''",
	'readerfeedback-reliability' => 'Pålitelighet',
	'readerfeedback-completeness' => 'Fullstendighet',
	'readerfeedback-npov' => 'Nøytralitet',
	'readerfeedback-presentation' => 'Presentasjon',
	'readerfeedback-overall' => 'Helhetsinntrykk',
	'readerfeedback-level-none' => '(velg)',
	'readerfeedback-level-0' => 'Veldig dårlig',
	'readerfeedback-level-1' => 'Dårlig',
	'readerfeedback-level-2' => 'OK',
	'readerfeedback-level-3' => 'Bra',
	'readerfeedback-level-4' => 'Veldig bra',
	'readerfeedback-submit' => 'Send',
	'readerfeedback-main' => 'Kun innholdssider kan vurderes.',
	'readerfeedback-success' => "'''Takk for at du anmeldte denne siden!''' ([$3 Kommentarer eller spørsmål?])",
	'readerfeedback-voted' => "'''Du har allerede vurdert denne siden.''' ([$3 Kommentarer eller spørsmål?])",
	'readerfeedback-submitting' => 'Sender …',
	'readerfeedback-finished' => 'Takk!',
	'revreview-filter-all' => 'Alle',
	'revreview-filter-approved' => 'Godkjente',
	'revreview-filter-reapproved' => 'Gjen-godkjente',
	'revreview-filter-unapproved' => 'Ikke godkjente',
	'revreview-filter-auto' => 'Automatisk',
	'revreview-filter-manual' => 'Manuelt',
	'revreview-filter-level-0' => 'Sjekkede versjoner',
	'revreview-filter-level-1' => 'Kvalitetsversjoner',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Type:',
	'revreview-tagfilter' => 'Merke:',
	'tooltip-ca-current' => 'Vis nåværende utkast av denne siden',
	'tooltip-ca-stable' => 'Vis den stabile versjonen av denne siden',
	'tooltip-ca-default' => 'Innstillinger for kvalitetssikring',
	'tooltip-ca-ratinghist' => 'Leservurderinger av denne siden',
	'revreview-locked' => 'Redigeringer må anmeldes før de vises på denne siden.',
	'revreview-unlocked' => 'Redigeringer må ikke anmeldes før de vises på denne siden.',
	'revreview-tt-review' => 'Anmeld denne siden',
	'validationpage' => 'Help:Artikkelvalidering',
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
	'flaggedrevs-backlog' => "I a presentament de prètfaches tardièrs dins la [[Special:OldReviewedPages|Lista de las paginas revisadas]]. '''Aquò necessita vòstra atencion !'''",
	'flaggedrevs-desc' => "Balha la possibilitat als editors o als relectors de validar las modificacions e d'estabilizar las paginas.",
	'flaggedrevs-pref-UI-0' => "Utilizar l’interfàcia d'utilizaire de la version establa detalhada",
	'flaggedrevs-pref-UI-1' => "Utilizar una simpla interfàcia d'utilizaire establa",
	'flaggedrevs-prefs' => 'Estabilitat',
	'flaggedrevs-prefs-stable' => "Afichar totjorn la version establa del contengut de las paginas per defaut (se n'existís una)",
	'flaggedrevs-prefs-watch' => "Apond las paginas qu'ai revistas a ma lista de seguit.",
	'group-editor' => 'Contributors',
	'group-editor-member' => 'Contributor',
	'group-reviewer' => 'Revisors',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Reviewer',
	'hist-draft' => 'version borrolhon',
	'hist-quality' => 'qualitat de la version',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validada] per [[User:$3|$3]]',
	'hist-stable' => 'Version visualizada',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} visada] per [[User:$3|$3]]',
	'review-diff2stable' => 'Vejatz las modificacions entre las versions establas e actualas.',
	'review-logentry-app' => 'Revista [[$1]]',
	'review-logentry-dis' => 'Version depreciada de [[$1]]',
	'review-logentry-id' => 'Version ID $1',
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
	'revreview-basic' => "Es la darrièra [[{{MediaWiki:Validationpage}}|version vista]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} esbòs] pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificat]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 cambiament espèra|$3 cambiaments espèran}}] una revision.",
	'revreview-basic-i' => 'Vaquí la darrièra version [[{{MediaWiki:Validationpage}}|visada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] sus <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrolhon] dispausa de [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambiaments de modèl o d’imatge] en espèra de visa.',
	'revreview-basic-old' => 'Vaquí una version [[{{MediaWiki:Validationpage}}|visada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lista entièra]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificacions novèlas] pòdon èsser estada efectuadas.',
	'revreview-basic-same' => 'Aquò es la darrièra version [[{{MediaWiki:Validationpage}}|susvelhada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] sur <i>$2</i>. La pagina pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada].',
	'revreview-basic-source' => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version visada] d'aquesta pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>, es estada basada en defòra d'aquesta version.",
	'revreview-changed' => "'''L'accion demandada a pas pogut èsser acomplida per aquesta version de [[:$1|$1]].'''

Un modèl o un imatge pòt èsser estat demandat alara que cap de version precisa èra causida. Aquò pòt susvenir se un modèl dinamic opèra una transclusion d'un autre imatge o d'un modèl dependent d'una variabla qu'a cambiat dempuèi qu'avètz començat a previsualizar aquesta pagina. Lo recargament de la pagina e sa revisualizacion pòdon corregir aqueste problèma.",
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
	'revreview-newest-basic' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version vista] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} las veire totas]) èra [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambiament|cambiaments}}] {{PLURAL:$3|demanda|demandan}} una revision.",
	'revreview-newest-basic-i' => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version visada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lista generala]) es estada [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] sus <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Los cambiaments sus modèls o los imatges] necessitan una relectura.',
	'revreview-newest-quality' => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} las veire totas]) èra [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|cambiament|cambiaments}}] {{PLURAL:$3|demanda|demandan}} una revision.",
	'revreview-newest-quality-i' => 'Las [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièras versions de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lista generala]) son estadas [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobadas] sus <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} De modificacions de modèls o d’imatges] necessitan una relectura.',
	'revreview-noflagged' => "I a pas de version revisada d'aquesta pagina, sa [[{{MediaWiki:Validationpage}}|qualitat]] es incèrtana.",
	'revreview-note' => '[[User:$1|$1]] a escrich aquestas nòtas de revision :',
	'revreview-notes' => "Observacions e nòtas d'afichar :",
	'revreview-oldrating' => 'Son puntatge :',
	'revreview-patrol' => 'Marcar aquesta modificacion coma patrolhada',
	'revreview-patrol-title' => 'Marcar coma patrolhada',
	'revreview-patrolled' => 'La version seleccionada de [[:$1|$1]] es estada marcada coma patrolhada.',
	'revreview-quality' => "Es la darrièra [[{{MediaWiki:Validationpage}}|version de qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} esbòs] pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificat]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|$3 cambiament espèra|$3 cambiaments espèran}}] una revision.",
	'revreview-quality-i' => 'Vaquí la darrièra version de [[{{MediaWiki:Validationpage}}|qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] sus <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrolhon] dispausa de [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} cambiaments de modèl o d’imatge] en espèra de visa.',
	'revreview-quality-old' => 'Vaquí una version de [[{{MediaWiki:Validationpage}}|qualitat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tot listar]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modificacions novèlas] pòdon èsser estadas efectuadas.',
	'revreview-quality-same' => 'Aquò es la darrièra version de [[{{MediaWiki:Validationpage}}|qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] sus <i>$2</i>. La pagina pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada].',
	'revreview-quality-source' => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualitat] d'aquesta pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>, es estada basada en defòra d'aquesta version.",
	'revreview-quality-title' => 'Pagina de qualitat',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|pagina visada]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire revision correnta]]",
	'revreview-quick-basic-old' => "[[{{MediaWiki:Validationpage}}|pagina visada]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire lo borrolhon]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina susvelhada]]''' (cap de modificacion pas revista)",
	'revreview-quick-invalid' => "'''Numèro de version incorrèct'''",
	'revreview-quick-none' => "'''Correnta''' (pas de revisions evaluadas)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitat]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire version correnta]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitat]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visionar lo borrolhon]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitat]]''' (cap de modificacion pas revista)",
	'revreview-quick-see-basic' => "'''Borrolhon''' [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vejatz la pagina]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} comparar])",
	'revreview-quick-see-quality' => "'''Borrolhon'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vejatz la pagina]
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
	'revreview-successful' => "'''La version seleccionada de [[:$1|$1]], es estada marcada d'una bandièra amb succès ([{{fullurl:Special:Stableversions|page=$2}} Vejatz totas las versions establas])'''",
	'revreview-successful2' => "La version de [[:$1|$1]] a pogut se veire levar son drapèu amb succès.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Las versions establas]] son causidas per defaut pels revisaires puslèu que las mai recentas.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Las versions establas]] son las versions marcadas de las pagina e pòdon èsser parametradas coma lo contengut per defaut pels revisaires.''",
	'revreview-toggle-title' => 'mostrar/amagar los detalhs',
	'revreview-toolow' => 'Pels atributs çaijós, vos cal donar un puntatge mai elevat que « non aprobat » per que la version siá considerada coma revista. Per depreciar una version, metètz totes los camps a « non aprobat ».',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Verificatz]] las modificacions efectuadas ''(vejatz çaijós)'' dempuèi que la darrièra version establa es estada [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].  

'''Qualques imatges o modèls son estats meses a jorn :'''",
	'revreview-update-includes' => "'''Qualques modèls o imatges son estats meses a jorn :'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Verificatz]] las modificacions efectuadas ''(vejatz çaijós)'' dempuèi que la darrièra version establa es estada [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].",
	'revreview-update-use' => "'''NÒTA : ''' Se mai d'un d'aquestes modèls o imatges dispausan d’una version establa, alara serà encara utilizada dins sa version establa.",
	'revreview-diffonly' => "''Per revisar la pagina, clicatz sul ligam « version correnta » e utilizatz lo formulari de revision.''",
	'revreview-visibility' => "Aquesta pagina conten una [[{{MediaWiki:Validationpage}}|version establa]],  sos paramètres d'estabilitat pòdon èsser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurats].",
	'revreview-visibility2' => "'''Aquesta pagina dispausa pas de [[{{MediaWiki:Validationpage}}|version establa]] ; sos paramètres d'estabilitat pòdon èsser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurats].'''",
	'revreview-revnotfound' => "La version precedenta d'aquesta pagina a pas pogut èsser retrobada. Verificatz l'URL qu'avètz utilizada per accedir a aquesta pagina.",
	'right-autopatrolother' => 'Marcar coma patrolhadas las versions dins los espacis de nom exceptat dins lo principal.',
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
	'readerfeedback' => "Qué pensatz d'aquesta pagina ?",
	'readerfeedback-text' => "''Consacratz un moment per notar aquesta pagina çaijós. Vòstras impressions son preciosas e nos ajudan a melhorar nòstre sit internet.''",
	'readerfeedback-reliability' => 'Fisabilitat',
	'readerfeedback-completeness' => 'Estat complet',
	'readerfeedback-npov' => 'Neutralitat',
	'readerfeedback-presentation' => 'Presentacion',
	'readerfeedback-overall' => 'General',
	'readerfeedback-level-none' => '(pas segur)',
	'readerfeedback-level-0' => 'Paure',
	'readerfeedback-level-1' => 'Bas',
	'readerfeedback-level-2' => 'Polit',
	'readerfeedback-level-3' => 'Naut',
	'readerfeedback-level-4' => 'Excellent',
	'readerfeedback-submit' => 'Sometre',
	'readerfeedback-main' => 'Sol lo contengut de las paginas pòt èsser notat.',
	'readerfeedback-success' => "'''Mercés per la revision d'aquesta pagina ! ''' ([$3 De questions o de comentaris ? ]).",
	'readerfeedback-voted' => "'''Apareis que ja avètz notat aquesta pagina'''. ([$3 De questions o de comentaris ?]).",
	'readerfeedback-submitting' => 'Somission…',
	'readerfeedback-finished' => 'Mercés !',
	'revreview-filter-all' => 'Tot',
	'revreview-filter-approved' => 'Aprovat',
	'revreview-filter-reapproved' => 'Aprovat tornamai',
	'revreview-filter-unapproved' => 'Pas aprovat',
	'revreview-filter-auto' => 'Automatic',
	'revreview-filter-manual' => 'Manual',
	'revreview-filter-level-0' => 'Versions visadas',
	'revreview-filter-level-1' => 'Versions de qualitat',
	'revreview-statusfilter' => 'Estatut :',
	'revreview-typefilter' => 'Tipe :',
	'revreview-tagfilter' => 'Balisa :',
	'revreview-reviewlink' => 'Tornar veire',
	'tooltip-ca-current' => "Veire l'esbòs corrent d'aquesta pagina",
	'tooltip-ca-stable' => "Veire la version establa d'aquesta pagina",
	'tooltip-ca-default' => "Paramètres per l'assegurança-qualitat",
	'tooltip-ca-ratinghist' => "Apreciacions dels lectors d'aquesta pagina",
	'revreview-locked' => 'Las modificacions devon èsser revistas abans d’èsser afichadas sus aquesta pagina !',
	'revreview-unlocked' => 'Las modificacions necessitan pas de relectura abans d’èsser afichadas sus aquesta pagina !',
	'log-show-hide-review' => "$1 l'istoric de las relecturas",
	'revreview-tt-review' => 'Revisar aquesta pagina',
	'validationpage' => '{{ns:help}}:Validacion de la pagina',
);

/** Pampanga (Kapampangan)
 * @author Val2397
 */
$messages['pam'] = array(
	'revreview-revnotfound' => 'Ing matuang meyaliling bulung a pakiduang mu eya mayakit. Paki lawe me ing URL a ginamit mu para apuntalan me ing bulung.',
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
	'flaggedrevs-backlog' => "[[Special:OldReviewedPages|Lista stron z nieoznaczonymi wersjami]] jest już bardzo długa. '''Potrzebna jest Twoja pomoc!'''",
	'flaggedrevs-desc' => 'Daje redaktorom i weryfikatorom możliwość oceny edycji i oznaczenia zweryfikowanej wersji strony',
	'flaggedrevs-pref-UI-0' => 'Użyj szczegółowego interfejsu',
	'flaggedrevs-pref-UI-1' => 'Użyj prostego interfejsu',
	'flaggedrevs-prefs' => 'Wersje oznaczone',
	'flaggedrevs-prefs-stable' => 'Domyślnie zawsze pokazuj wersję oznaczoną strony (jeśli taka istnieje)',
	'flaggedrevs-prefs-watch' => 'Dodaj do obserwowanych strony oznaczane przeze mnie jako sprawdzone',
	'group-editor' => 'Redaktorzy',
	'group-editor-member' => 'redaktor',
	'group-reviewer' => 'Weryfikatorzy',
	'group-reviewer-member' => 'weryfikator',
	'grouppage-editor' => '{{ns:project}}:Redaktorzy',
	'grouppage-reviewer' => '{{ns:project}}:Weryfikatorzy',
	'hist-draft' => 'wersja nieprzejrzana',
	'hist-quality' => 'wersja zweryfikowana',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} zweryfikowana] przez użytkownika [[User:$3|$3]]',
	'hist-stable' => 'wersja przejrzana',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} przejrzana] przez użytkownika [[User:$3|$3]]',
	'review-diff2stable' => 'Pokaż różnicę pomiędzy wersją oznaczoną a ostatnią',
	'review-logentry-app' => 'przejrzał [[$1]]',
	'review-logentry-dis' => 'wycofał wersję oznaczoną w [[$1]]',
	'review-logentry-id' => 'wersja o ID $1',
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
	'revreview-basic' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja przejrzana]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Szkic] zawiera [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmianę|zmiany|zmian}}] {{PLURAL:$3|oczekującą|oczekujące|oczekujących}} na przejrzenie.',
	'revreview-basic-i' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja przejrzana]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Szkic] posiada [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmiany szablonów/grafik] oczekujące na przejrzenie.',
	'revreview-basic-old' => 'To jest [[{{MediaWiki:Validationpage}}|wersja przejrzana]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} pokaż wszystkie]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
Mogły zostać dokonane nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmiany].',
	'revreview-basic-same' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja przejrzana]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} pokaż wszystkie]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Wersja przejrzana] tej strony, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>, jest oparta na tej wersji.',
	'revreview-changed' => "'''Żądana czynność nie mogła zostać wykonana na tej wersji strony [[:$1|$1]].'''

Zażądano szablonu lub grafiki, ale nie określono wersji.
Może się to zdarzyć, gdy dynamiczny szablon osadza inny szablon lub grafikę zależnie od zmiennej, która zmieniła się od rozpoczęcia sprawdzania tej strony.
Odświeżenie strony i ponowne sprawdzenie może rozwiązać ten problem.",
	'revreview-current' => 'Szkic',
	'revreview-depth' => 'Wyczerpanie tematu',
	'revreview-depth-0' => 'nieakceptowalne',
	'revreview-depth-1' => 'podstawowe',
	'revreview-depth-2' => 'średnie',
	'revreview-depth-3' => 'wysokie',
	'revreview-depth-4' => 'na medal',
	'revreview-draft-title' => 'Szkic strony',
	'revreview-edit' => 'Edytuj szkic',
	'revreview-editnotice' => "'''Uwaga: Edycje dokonane na tej stronie zostaną dołączone do [[{{MediaWiki:Validationpage}}|wersji przejrzanej]] po przejrzeniu ich przez uprawnionego użytkownika.'''",
	'revreview-flag' => 'Oznacz tę wersję',
	'revreview-edited' => "'''Edycje zostaną dołączone do [[{{MediaWiki:Validationpage}}|wersji przejrzanej]] po przejrzeniu ich przez uprawnionego użytkownika.'''
'''''Szkic'' pokazano poniżej.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|zmiana oczekuje|zmiany oczekują|zmian oczekuje}}] na sprawdzenie.",
	'revreview-invalid' => "'''Niewłaściwy obiekt:''' brak [[{{MediaWiki:Validationpage}}|wersji przejrzanej]] odpowiadającej podanemu ID.",
	'revreview-legend' => 'Oceń treść zmiany',
	'revreview-log' => 'Komentarz:',
	'revreview-main' => 'Musisz wybrać konkretną wersję strony w celu przejrzenia.

Zobacz [[Special:Unreviewedpages|listę nieprzejrzanych stron]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ostatnia wersja przejrzana] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} pokaż wszystkie]) została [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmiana oczekuje|zmiany oczekują|zmian oczekuje}}] na przejrzenie.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ostatnia wersja przejrzana] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} pokaż wszystkie]) została [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Zmiany szablonów/grafik] wymagają przejrzenia.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ostatnia wersja zweryfikowana] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} pokaż wszystkie]) została [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmiana|zmiany|zmian}}] {{PLURAL:$3|oczekuje|oczekują|oczekuje}} na sprawdzenie.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ostatnia wersja zweryfikowana] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} pokaż wszystkie]) została [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Zmiany szablonów/grafik] wymagają sprawdzenia.',
	'revreview-noflagged' => "Ta strona nie posiada żadnej wersji oznaczonej – możliwe, że '''nie''' została [[{{MediaWiki:Validationpage}}|przejrzana]] pod kątem jakości.",
	'revreview-note' => '[[User:$1|$1]] dokonał(a) następujących komentarzy podczas [[{{MediaWiki:Validationpage}}|sprawdzania]] tej wersji:',
	'revreview-notes' => 'Obserwacje lub uwagi do wyświetlenia:',
	'revreview-oldrating' => 'Uzyskana ocena:',
	'revreview-patrol' => 'Oznacz tę zmianę jako sprawdzoną',
	'revreview-patrol-title' => 'Oznacz jako sprawdzone',
	'revreview-patrolled' => 'Wybrana wersja [[:$1|$1]] została oznaczona jako sprawdzona.',
	'revreview-quality' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja zweryfikowana]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Szkic] posiada [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmianę|zmiany|zmian}}] {{PLURAL:$3|oczekującą|oczekujące|oczekujących}} na sprawdzenie.',
	'revreview-quality-i' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja zweryfikowana]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Szkic] posiada [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmiany szablonów/grafik] oczekujące na sprawdzenie.',
	'revreview-quality-old' => 'To jest [[{{MediaWiki:Validationpage}}|wersja zweryfikowana]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} pokaż wszystkie]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.
Mogły zostać dokonane nowe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmiany].',
	'revreview-quality-same' => 'To jest najnowsza [[{{MediaWiki:Validationpage}}|wersja zweryfikowana]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} pokaż wszystkie]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Wersja zweryfikowana] tej strony, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} zatwierdzona] <i>$2</i>, została oparta na tej wersji.',
	'revreview-quality-title' => 'Strona zweryfikowana',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Przejrzana]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobacz szkic]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Przejrzana]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobacz szkic]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Przejrzana]]'''",
	'revreview-quick-invalid' => "'''Nieprawidłowy ID wersji'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Brak wersji przejrzanej]]'''",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Zweryfikowana]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobacz szkic]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Zweryfikowana]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobacz szkic]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Zweryfikowana]]'''",
	'revreview-quick-see-basic' => "'''[[{{MediaWiki:Validationpage}}|Szkic]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobacz wersję przejrzaną]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} porównaj])",
	'revreview-quick-see-quality' => "'''[[{{MediaWiki:Validationpage}}|Szkic]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobacz wersję przejrzaną]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} porównaj])",
	'revreview-selected' => "Wybrana wersja '''$1:'''",
	'revreview-source' => 'źródło szkicu',
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
	'revreview-successful' => "'''Wersja [[:$1|$1]] została pomyślnie oznaczona. ([{{fullurl:Special:Stableversions|page=$2}} zobacz wszystkie wersje przejrzane])'''",
	'revreview-successful2' => "'''Wersja [[:$1|$1]] została pomyślnie odznaczona.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Wersje przejrzane]] są wyświetlane domyślnie dla czytelników, nawet jeśli istnieją nowsze, nieprzejrzane wersje.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Wersje przejrzane]] mogą być wyświetlane domyślnie dla czytelników.''",
	'revreview-toggle-title' => 'pokaż/ukryj szczegóły',
	'revreview-toolow' => 'Musisz ocenić każdy z atrybutów wyżej niż „nieakceptowalny“, aby uważać wersję za zweryfikowaną. 
By wycofać weryfikację, należy ustawić wszystkie pola na „nieakceptowalny“.',
	'revreview-update' => "Proszę [[{{MediaWiki:Validationpage}}|przejrzeć]] zmiany ''(patrz niżej)'' dokonane od momentu [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} oznaczenia] ostatniej wersji jako przejrzanej.<br />
'''Niektóre szablony/grafiki zostały uaktualnione:'''",
	'revreview-update-includes' => "'''Niektóre szablony/grafiki zostały uaktualnione:'''",
	'revreview-update-none' => "Proszę [[{{MediaWiki:Validationpage}}|przejrzeć]] zmiany ''(patrz niżej)'' dokonane od momentu [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} oznaczenia] ostatniej wersji jako przejrzanej.",
	'revreview-update-use' => "'''UWAGA:''' Jeśli którykolwiek z tych szablonów lub grafik posiada wersję zweryfikowaną, to zostanie ona użyta w wersji zweryfikowanej tej strony.",
	'revreview-diffonly' => "''By zweryfikować stronę, proszę kliknąć na link \"bieżąca wersja\" i użyć formularza weryfikacji.''",
	'revreview-visibility' => "'''Ta strona ma aktualną [[{{MediaWiki:Validationpage}}|wersję oznaczoną]], dla której można
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} skonfigurować] ustawienia.'''",
	'revreview-visibility2' => "'''Ta strona nie ma aktualnej [[{{MediaWiki:Validationpage}}|wersji oznaczonej]]. Strona może mieć
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} skonfigurowane] ustawienia.'''",
	'revreview-revnotfound' => 'Żądana, starsza wersja strony nie została odnaleziona. Sprawdź użyty adres URL.',
	'right-autopatrolother' => 'Automatyczne oznaczanie przeglądanych wersji stron spoza głównej przestrzeni nazw jako przejrzane',
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
	'readerfeedback' => 'Co myślisz o tej stronie?',
	'readerfeedback-text' => "''Poświęć chwilę, aby ocenić tę stronę. Twoja opinia będzie cenna i pomoże nam w ulepszeniu naszej witryny.''",
	'readerfeedback-reliability' => 'Solidność',
	'readerfeedback-completeness' => 'Wyczerpanie tematu',
	'readerfeedback-npov' => 'Neutralność',
	'readerfeedback-presentation' => 'Czytelność',
	'readerfeedback-overall' => 'Ogólnie',
	'readerfeedback-level-none' => '(nieokreślony)',
	'readerfeedback-level-0' => 'Niedostatecznie',
	'readerfeedback-level-1' => 'Słabo',
	'readerfeedback-level-2' => 'Zadowalająco',
	'readerfeedback-level-3' => 'Dobrze',
	'readerfeedback-level-4' => 'Bardzo dobrze',
	'readerfeedback-submit' => 'Oznacz',
	'readerfeedback-main' => 'Tylko strony z treścią mogą być oceniane.',
	'readerfeedback-success' => "'''Dziękujemy za ocenę tej strony!''' ([$3 Komentarze lub pytania?]).",
	'readerfeedback-voted' => "'''Zdaje się, że już oceniłeś tę stronę''' ([$3 Komentarze lub pytania?]).",
	'readerfeedback-submitting' => 'Zapisywanie...',
	'readerfeedback-finished' => 'Dziękujemy!',
	'revreview-filter-all' => 'Wszystkie',
	'revreview-filter-approved' => 'Oznaczone',
	'revreview-filter-reapproved' => 'Ponownie oznaczone',
	'revreview-filter-unapproved' => 'Odznaczone',
	'revreview-filter-auto' => 'Automatycznie',
	'revreview-filter-manual' => 'Ręcznie',
	'revreview-filter-level-0' => 'Przejrzane wersje',
	'revreview-filter-level-1' => 'Zweryfikowane wersje',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Sposób oznaczenia:',
	'revreview-tagfilter' => 'Tag:',
	'revreview-reviewlink' => 'przejrzyj',
	'tooltip-ca-current' => 'Zobacz aktualny szkic tej strony',
	'tooltip-ca-stable' => 'Zobacz wersję oznaczoną tej strony',
	'tooltip-ca-default' => 'Ustawienia mechanizmu zapewnienia jakości artykułów',
	'tooltip-ca-ratinghist' => 'Oceny czytelników tej strony',
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
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] dël <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]
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
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vardeje tute]) dë sta pàgina-sì a l'é staita [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà]
	 dël <i>$2</i>. <br /> A-i {{PLURAL:$3|é|son}} $3 version ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modìfiche]) ch'a speto na revision.",
	'revreview-newest-quality' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ùltim vot ëd qualità]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vardeje tuti]) dë sta pàgina-sì a l'é stait [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà]
	 dël <i>$2</i>. <br /> A-i {{PLURAL:$3|é|son}} $3 version ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modìfiche]) ch'a speto d'esse revisionà.",
	'revreview-noflagged' => "A-i é pa gnun-a version revisionà dë sta pàgina-sì, donca a l'é belfé ch'a la sia '''nen''' staita
	[[{{MediaWiki:Validationpage}}|controlà]] coma qualità.",
	'revreview-note' => "[[User:$1|$1]] a l'ha buta-ie ste nòte-sì a la revision, antramentr ch'a la [[{{MediaWiki:Validationpage}}|controlava]]:",
	'revreview-notes' => 'Osservation ò nòte da smon-e:',
	'revreview-oldrating' => "A l'é stait giudicà për:",
	'revreview-quality' => "Costa-sì a l'é l'ùltima revision ëd [[{{MediaWiki:Validationpage}}|qualità]] dë sta pàgina, e a l'é staita
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] dël <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]
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
	'revreview-visibility' => "Sta pàgina-sì a l'ha na [[{{MediaWiki:Validationpage}}|version stàbila]], ch'as peul [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} regolesse].",
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
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'editor' => 'Editor',
	'flaggedrevs' => 'Edições Analisadas',
	'flaggedrevs-backlog' => "Há actualmente um acúmulo de [[Special:OldReviewedPages|páginas analisadas desatualizadas]]. '''A sua ajuda será bem-vinda!'''",
	'flaggedrevs-desc' => 'Dá aos {{int:group-editor}} e aos {{int:group-reviewer}} a possibilidade de verificarem edições e estabilizarem páginas',
	'flaggedrevs-pref-UI-0' => 'Utilizar a interface de edições estáveis detalhada',
	'flaggedrevs-pref-UI-1' => 'Utilizar a interface de edições estáveis simples',
	'flaggedrevs-prefs' => 'Estabilidade',
	'flaggedrevs-prefs-stable' => 'Sempre exibir a edição estável de uma página como conteúdo padrão (caso exista uma)',
	'flaggedrevs-prefs-watch' => 'Adicionar páginas analisadas por mim à minha lista de artigos vigiados',
	'group-editor' => 'Editores',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Críticos',
	'group-reviewer-member' => 'Crítico',
	'grouppage-editor' => '{{ns:project}}:{{int:group-editor}}',
	'grouppage-reviewer' => '{{ns:project}}:{{int:group-reviewer}}',
	'hist-draft' => 'edição de rascunho',
	'hist-quality' => 'edição confiável',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validada] por [[User:$3|$3]]',
	'hist-stable' => 'edição analisada',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} analisada] por [[User:$3|$3]]',
	'review-diff2stable' => 'Ver alterações entre a edição estável e a actual',
	'review-logentry-app' => 'analisou [[$1]]',
	'review-logentry-dis' => 'rebaixou uma edição de [[$1]]',
	'review-logentry-id' => 'ID de edição: $1',
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
	'revreview-basic' => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|analisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|alteração|alterações}}] aguardando revisão.',
	'revreview-basic-i' => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|analisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} alterações em imagens/predefinições] que necessitam de revisão.',
	'revreview-basic-old' => 'Esta é uma [[{{MediaWiki:Validationpage}}|edição analisada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
É possível que novas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} alterações] tenham sido feitas.',
	'revreview-basic-same' => 'Esta é a última edição [[{{MediaWiki:Validationpage}}|analisada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.',
	'revreview-basic-source' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} edição verificada] desta página, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>, foi baseada nesta edição.',
	'revreview-changed' => "'''A acção seleccionada não pôde ser executada nesta edição de [[:$1|$1]].'''

Uma predefinição ou imagem pode ter sido requisitada sem uma edição específica ter sido informada.
Isso pode ocorrer quando uma predefinição dinâmica faz transclusão de outra imagem ou predefinição através de uma variável que pode ter sido alterada enquanto era feita a análise desta página.
Recarregar a página e enviar uma nova análise talvez seja suficiente para contornar este contratempo.",
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
	'revreview-newest-basic' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição analisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|alteração|alterações}}] {{PLURAL:$3|necessita|necessitam}} revisão.',
	'revreview-newest-basic-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição analisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} As alterações em imagens/predefinições] necessitam de revisão.',
	'revreview-newest-quality' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição confiável] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|alteração|alterações}}] {{PLURAL:$3|necessita|necessitam}} revisão.',
	'revreview-newest-quality-i' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição confiável] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. 
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} As alterações em imagens/predefinições] necessitam de revisão.',
	'revreview-noflagged' => "Esta página não possui edições analisadas. Talvez ainda '''não''' tenha sido [[{{MediaWiki:Validationpage}}|verificada]] a sua qualidade.",
	'revreview-note' => '[[User:$1|$1]] deixou as seguintes observações ao [[{{MediaWiki:Validationpage}}|analisar]] esta edição:',
	'revreview-notes' => 'Observações ou notas a serem exibidas:',
	'revreview-oldrating' => 'Esteve avaliada como:',
	'revreview-patrol' => 'Marcar esta alteração como patrulhada',
	'revreview-patrol-title' => 'Marcar como patrulhada',
	'revreview-patrolled' => 'A edição seleccionada de [[:$1|$1]] foi marcada como patrulhada.',
	'revreview-quality' => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|confiável]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|alteração|alterações}}] aguardando revisão.',
	'revreview-quality-i' => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|confiável]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} alterações em imagens/predefinições] que necessitam de revisão.',
	'revreview-quality-old' => 'Esta é uma [[{{MediaWiki:Validationpage}}|edição confiável]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
É possível que novas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} alterações] tenham sido feitas.',
	'revreview-quality-same' => 'Esta é a última edição [[{{MediaWiki:Validationpage}}|confiável]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.',
	'revreview-quality-source' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} edição confiável] desta página, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>, foi baseada nesta edição.',
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
	'revreview-successful' => "'''A edição de [[:$1|$1]] foi assinalada com sucesso. ([{{fullurl:Special:Stableversions|page=$2}} ver edições estáveis])'''",
	'revreview-successful2' => "'''A edição seleccionada de [[:$1|$1]] teve sua análise removida com sucesso.'''",
	'revreview-text' => "'''As [[{{MediaWiki:Validationpage}}|edições estáveis]] são exibidas por padrão no lugar de edições mais recentes.'''",
	'revreview-text2' => "''As [[{{MediaWiki:Validationpage}}|edições estáveis]] são edições em páginas que foram verificadas e que podem ser configuradas como conteúdo padrão a ser exibido.''",
	'revreview-toggle-title' => 'mostrar/esconder detalhes',
	'revreview-toolow' => 'Você precisará atribuir, em cada um dos atributos, valores mais altos do que "rejeitada" para que uma edição seja considerada aprovada.

Para rebaixar uma edição, defina todos os atributos como "rejeitada".',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Reveja]] quaisquer alterações ''(exibidas abaixo)'' feitas desde que a edição estável foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].<br />
'''Algumas predefinições/imagens foram actualizadas:'''",
	'revreview-update-includes' => "'''Algumas predefinições/imagens foram actualizadas:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Reveja]] quaisquer alterações ''(exibidas abaixo)'' feitas desde que a edição estável foi [{{fullurl:{{ns:special}}:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].",
	'revreview-update-use' => "'''NOTA:''' Se alguma destas predefinições/imagens possui uma versão estável, então esta já é usada na versão estável desta página.",
	'revreview-diffonly' => "''Para analisar a página, clique no link \"edição actual\" e utilize o formulário de análises.''",
	'revreview-visibility' => "'''Esta página possui uma [[{{MediaWiki:Validationpage}}|edição estável]]; os parâmetros disso podem ser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-visibility2' => "'''Esta página não possui uma [[{{MediaWiki:Validationpage}}|versão estável]] atualizada; os parâmetros disso podem ser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurados].'''",
	'revreview-revnotfound' => 'A edição antiga desta página que foi requisitada não pôde ser encontrada.
Verifique o URL que utilizou para aceder esta página.',
	'right-autopatrolother' => 'Marcar automaticamente as edições de espaços nominais "secundários" como patrulhadas',
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
	'readerfeedback' => 'O que você acha desta página?',
	'readerfeedback-text' => "''Por gentileza, dedique um momento para avaliar esta página. Sua opinião é importante e nos ajuda a melhorar o website.''",
	'readerfeedback-reliability' => 'Confiabilidade',
	'readerfeedback-completeness' => 'Completitude',
	'readerfeedback-npov' => 'Neutralidade',
	'readerfeedback-presentation' => 'Apresentação',
	'readerfeedback-overall' => 'em Geral',
	'readerfeedback-level-none' => '(incerto)',
	'readerfeedback-level-0' => 'Miserável',
	'readerfeedback-level-1' => 'Baixo',
	'readerfeedback-level-2' => 'Razoável',
	'readerfeedback-level-3' => 'Alto',
	'readerfeedback-level-4' => 'Excelente',
	'readerfeedback-submit' => 'Enviar',
	'readerfeedback-main' => 'Somente páginas de conteúdo podem ser avaliadas.',
	'readerfeedback-success' => "'''Obrigado por avaliar esta página!''' ([$3 comentários ou dúvidas?]).",
	'readerfeedback-voted' => "'''Aparentemente você já avaliou esta página''' ([$3 comentários ou dúvidas?]).",
	'readerfeedback-submitting' => 'Enviando...',
	'readerfeedback-finished' => 'Obrigado!',
	'revreview-filter-all' => 'Todas',
	'revreview-filter-approved' => 'Aprovadas',
	'revreview-filter-reapproved' => 'Re-aprovada',
	'revreview-filter-unapproved' => 'Não-aprovadas',
	'revreview-filter-auto' => 'Automático',
	'revreview-filter-manual' => 'Manual',
	'revreview-filter-level-0' => 'Edições analisadas',
	'revreview-filter-level-1' => 'Edições confiáveis',
	'revreview-statusfilter' => 'Estado:',
	'revreview-typefilter' => 'Tipo:',
	'revreview-tagfilter' => 'Etiqueta:',
	'revreview-reviewlink' => 'analisar',
	'tooltip-ca-current' => 'Ver o rascunho actual desta página',
	'tooltip-ca-stable' => 'Ver a edição estável desta página',
	'tooltip-ca-default' => 'Configurações da Garantia de Qualidade',
	'tooltip-ca-ratinghist' => 'Opinião dos leitores sobre esta página',
	'revreview-locked' => 'As edições desta página precisam ser analisadas antes de serem exibidas!',
	'revreview-unlocked' => 'As edições desta página não precisam ser analisadas antes de serem exibidas!',
	'log-show-hide-review' => '$1 registo de análises',
	'revreview-tt-review' => 'Analise esta página',
	'validationpage' => '{{ns:help}}:Validação de páginas',
);

/** Brazilian Portuguese (Português do Brasil) */
$messages['pt-br'] = array(
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
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'flaggedrevs-prefs' => 'Stabilitate',
	'revreview-accuracy' => 'Acurateţe',
	'revreview-log' => 'Comentariu:',
	'revreview-quality-title' => 'Pagină de calitate',
	'revreview-stable' => 'Pagină stabilă',
	'revreview-style-1' => 'Acceptabil',
	'revreview-toggle-title' => 'arată/ascunde detalii',
	'revreview-revnotfound' => 'Versiunea mai veche a paginii pe care aţi cerut-o nu a fost găsită. Vă rugăm să verificaţi legătura pe care aţi folosit-o pentru a accesa această pagină.',
	'readerfeedback-npov' => 'Neutralitate',
	'readerfeedback-presentation' => 'Prezentare',
	'readerfeedback-level-none' => '(nesigur)',
	'readerfeedback-level-4' => 'Excelent',
	'readerfeedback-finished' => 'Mulţumim!',
	'revreview-typefilter' => 'Tip:',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'editor' => 'Editore',
	'flaggedrevs' => 'Revisiune Approvete',
	'flaggedrevs-backlog' => "Quiste jè 'u backlog corrende de le [[Special:OldReviewedPages|Pàggene reviste scadute]]. '''Abbesogne de l'attenziona toje!'''",
	'flaggedrevs-desc' => "Da a le cangiatore e la revisitatore l'abbilità de validà le revisiune e le pàggene secure",
	'flaggedrevs-pref-UI-0' => "Ause l'interfacce utende d'a versiona secure e dettagliete",
	'flaggedrevs-pref-UI-1' => "Ause 'na interfacce utende d'a versiona semblice e secure",
	'flaggedrevs-prefs' => 'Stabbilità',
	'flaggedrevs-prefs-stable' => "Fà vedè sembre 'a versiona secure de ìna vosce pe default (ce ne esiste une)",
	'flaggedrevs-prefs-watch' => 'Aggiunge le pàggene, Ie agghie riviste le pàggene condrollete mie',
	'group-editor' => 'Editore',
	'group-editor-member' => 'editore',
	'group-reviewer' => 'Rivisitatore',
	'group-reviewer-member' => 'rivisitatore',
	'grouppage-editor' => '{{ns:project}}:Editore',
	'grouppage-reviewer' => '{{ns:project}}:Revisitatore',
	'hist-draft' => 'revisione terra-terra',
	'hist-quality' => 'revisione de qualità',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validate] da [[User:$3|$3]]',
	'hist-stable' => 'revisiona viste',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} viste] da [[User:$3|$3]]',
	'review-diff2stable' => "Vide le cangiaminde 'mbrà le revisiune secure e corrende",
	'review-logentry-app' => 'riviste [[$1]]',
	'review-logentry-id' => "ID d'a revisione $1",
	'review-logentry-diff' => 'diff pe stabbilità',
	'review-logpage' => 'Archivie de le revisitaminde',
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
	'revreview-basic-source' => "'Na [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versiona visitete] de sta pàgene, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approvete] sus a <i>$2</i>, ere basete sus 'a sta revisione.",
	'revreview-current' => 'Bozze',
	'revreview-depth' => 'Profunnetà',
	'revreview-depth-0' => 'Scettate',
	'revreview-depth-1' => 'Nderre-nderre',
	'revreview-depth-2' => 'Moderete',
	'revreview-depth-3' => 'Ierte',
	'revreview-depth-4' => 'Dettagliete',
	'revreview-draft-title' => 'Pàgena bozza',
	'revreview-edit' => "Cange 'a bozze",
	'revreview-flag' => 'Revide sta revisione',
	'revreview-legend' => "D'a 'nu pundegge a 'u condenute d'a revisione",
	'revreview-log' => 'Commende:',
	'revreview-main' => "Tu a selezionà ìna particolera revisione da 'na vosce pe fà 'na revisitazione.

Vide 'a [[Special:Unreviewedpages|liste de le pàggene ca non g'onne state rivisitete]].",
	'revreview-note' => '[[User:$1|$1]] ha fatte le note seguende [[{{MediaWiki:Validationpage}}|revesetanne]] sta revisione:',
	'revreview-notes' => 'Osservaziune o annotaziune da fa vedè:',
	'revreview-oldrating' => 'Tenève stu pundegge:',
	'revreview-patrol' => 'Signe stu cangiamende cumme verifichete a funne',
	'revreview-patrol-title' => 'Signe cumme verifichete a funne',
	'revreview-quality-title' => "Qualità d'a vôsce",
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pàgene viste]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vide 'a bozze]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Pàgene viste]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vide 'a bozze]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pàgene viste]]'''",
	'revreview-quick-invalid' => "'''ID d'a revisione invalide'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Revisiona corrende]]''' (non reviste)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pàgene de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vide 'a bozze]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pàgene de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vide 'a bozze]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pàgene de qualità]]'''",
	'revreview-selected' => "Revisiona selezionete de '''$1:'''",
	'revreview-source' => 'sorgende a bozza',
	'revreview-stable' => 'Pàgena sicure',
	'revreview-stable-title' => 'Pàgena viste',
	'revreview-style' => 'Leggibbilità',
	'revreview-style-0' => 'Fasce schife, bocciete',
	'revreview-style-1' => 'Accettabbele',
	'revreview-style-2' => 'Bbuene',
	'revreview-style-3' => 'Congise',
	'revreview-style-4' => 'Dettagliete',
	'revreview-submit' => 'Conferme',
	'revreview-submitting' => 'Stoche a conferme',
	'revreview-finished' => 'Revisione comblétete!',
	'revreview-successful' => "'''Revisione de [[:$1|$1]] ha state mise 'u flag.''' ([{{fullurl:Special:Stableversions|pàgene=$2}} vide le versiune secure])'''",
	'revreview-successful2' => "'''Revisione de [[:$1|$1]] ha state luete 'u flag.'''",
	'revreview-toggle-title' => 'fa vedè/scunne le dettaglie',
	'revreview-update-includes' => "'''Certe template/immagene onne state aggiornete:'''",
	'right-autoreview' => 'Signe le revisiune cumme viste automaticamende',
	'right-movestable' => 'Spuèste le pàggene secure',
	'right-review' => 'Signe le revisiune cumme viste',
	'right-stablesettings' => 'Configure cumme versiona secure quedde ca jè selezionete e visualizzete',
	'right-validate' => 'Signe le revisiune cumme a validete',
	'rights-editor-autosum' => 'auto promosse',
	'specialpages-group-quality' => 'Assicurazione de qualità',
	'stable-logpage' => 'Archivie de le stabilizzaziune',
	'readerfeedback' => 'Ce pinze de sta pàgene?',
	'readerfeedback-reliability' => 'Affedabbeletà',
	'readerfeedback-npov' => 'Neutralità',
	'readerfeedback-presentation' => 'Presendazione',
	'readerfeedback-overall' => 'Sus a tutte',
	'readerfeedback-level-none' => '(insicure)',
	'readerfeedback-level-0' => 'Povere',
	'readerfeedback-level-1' => 'Vasce',
	'readerfeedback-level-2' => 'Medie',
	'readerfeedback-level-3' => 'Ierte',
	'readerfeedback-level-4' => "'A uerre proprie (Eccellende)",
	'readerfeedback-submit' => 'Conferme',
	'readerfeedback-main' => 'Sulamende le pàggene cu le condenute ponne essere valutete.',
	'readerfeedback-success' => "'''Grazie pe avè reviste sta pàgene!''' ([$3 Commende o dumanne?]).",
	'readerfeedback-submitting' => 'In conferme...',
	'readerfeedback-finished' => "Grazie 'mbà",
	'revreview-filter-all' => 'Tutte',
	'revreview-filter-approved' => 'Approvete',
	'revreview-filter-reapproved' => 'Riapprovete',
	'revreview-filter-unapproved' => 'Non approvete',
	'revreview-filter-auto' => 'Automateche',
	'revreview-filter-manual' => 'Manuele',
	'revreview-filter-level-0' => 'Versiune viste',
	'revreview-filter-level-1' => 'Versiune de qualità',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Tipe:',
	'revreview-tagfilter' => 'Tag:',
	'revreview-reviewlink' => 'reviste',
	'tooltip-ca-current' => "Vide 'a bozza corrende pe sta pàgene",
	'tooltip-ca-stable' => "Vide 'a versiona secure pe sta pàgene",
	'revreview-unlocked' => 'Le cangiaminde non ge richiedene le revisete apprime ca avènene fatte vedè sus a stà pàgene!',
	'log-show-hide-review' => '$1 archivie de le rivisitaziune',
	'revreview-tt-review' => 'Revide sta pàgene',
	'validationpage' => "{{ns:help}}:Validazione d'a vôsce",
);

/** Russian (Русский)
 * @author Ahonc
 * @author AlexSm
 * @author Ferrer
 * @author Kaganer
 * @author Kalan
 * @author VasilievVV
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'editor' => 'Досматривающий',
	'flaggedrevs' => 'Отмеченные версии',
	'flaggedrevs-backlog' => "Существует отставание в проверке страниц, см. [[Special:OldReviewedPages|Устаревшие проверенные страницы]]. '''Пожалуйста, обратите внимание!'''",
	'flaggedrevs-desc' => 'Предоставление возможности редакторам/рецензентам проверять версии страниц и устанавливать стабильные версии',
	'flaggedrevs-pref-UI-0' => 'Использовать подробный интерфейс стабильных версий',
	'flaggedrevs-pref-UI-1' => 'Использовать простой интерфейс стабильных версий',
	'flaggedrevs-prefs' => 'Стабилизация',
	'flaggedrevs-prefs-stable' => 'Всегда показывать стабильную версию по умолчанию (если таковая существует)',
	'flaggedrevs-prefs-watch' => 'Добавлять проверенные мною страницы в список наблюдения',
	'group-editor' => 'Досматривающие',
	'group-editor-member' => 'досматривающий',
	'group-reviewer' => 'Выверяющие',
	'group-reviewer-member' => 'выверяющий',
	'grouppage-editor' => '{{ns:project}}:Досматривающий',
	'grouppage-reviewer' => '{{ns:project}}:Выверяющий',
	'hist-draft' => 'черновая версия',
	'hist-quality' => 'выверенная версия',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} выверена] участником [[User:$3|$3]]',
	'hist-stable' => 'досмотренная версия',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} досмотрена] участником [[User:$3|$3]]',
	'review-diff2stable' => 'Показать различия между стабильной и текущей версиями',
	'review-logentry-app' => 'проверена [[$1]]',
	'review-logentry-dis' => 'устаревшая версия [[$1]]',
	'review-logentry-id' => 'идентификатор версии $1',
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
	'revreview-basic' => 'Это последняя [[{{MediaWiki:Validationpage}}|досмотренная]] версия; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|правка|правки|правок}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновика] {{PLURAL:$3|ожидает|ожидают|ожидают}} проверки.',
	'revreview-basic-i' => 'Это последняя [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} досмотренная] версия; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
В [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновике] есть требующие проверки [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}}изменения в шаблонах или изображениях].',
	'revreview-basic-old' => 'Это [[{{MediaWiki:Validationpage}}|досмотренная]] версия ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
Могли быть сделаны новые [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} правки].',
	'revreview-basic-same' => 'Это последняя [[{{MediaWiki:Validationpage}}|досмотренная]] версия ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]); [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Досмотренная версия] этой страницы, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>, была основана на этой версии.',
	'revreview-changed' => "'''Запрошенное действие не может быть выполнено с этой версией страницы [[:$1|$1]].'''

Возможно, шаблон или изображение были запрошены без указания конкретной версии.
Это могло случиться, если динамический шаблон включает другой шаблон или изображение, зависящие от переменной, которая изменилась с момента начала проверки.
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
	'revreview-editnotice' => "'''Примечание: изменения этой страницы будут включены в [[{{MediaWiki:Validationpage}}|стабильную версию]], когда они будут досмотрены пользователем с соответствующими правами.'''",
	'revreview-flag' => 'Проверить эту версию',
	'revreview-edited' => "'''Правки будут включены в [[{{MediaWiki:Validationpage}}|стабильную версию]] после проверки участниками с соответствующими правами.
''Черновик'' показан ниже.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $2 {{PLURAL:$2|правка ожидает|правки ожидают|правок ожидают}}] проверки.",
	'revreview-invalid' => "'''Ошибочная цель:''' не существует [[{{MediaWiki:Validationpage}}|проверенной]] версии страницы, соответствующей указанному идентификатору.",
	'revreview-legend' => 'Оценки содержания версии',
	'revreview-log' => 'Примечание:',
	'revreview-main' => 'Вы должны выбрать одну из версий страницы для проверки.

См. [[Special:Unreviewedpages|список непроверенных страниц]].',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя досмотренная версия] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]) была [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|правка|правки|правок}}] {{PLURAL:$3|требует|требуют|требуют}} проверки.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя досмотренная версия] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]);  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
Требуется проверка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} изменений в шаблонах или изображениях].',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя выверенная версия] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]) была [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|правка|правки|правок}}] {{PLURAL:$3|требует|требуют|требуют}} проверки.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя выверенная версия] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]);  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
Требуется проверка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} изменений в шаблонах или изображениях].',
	'revreview-noflagged' => "У этой страницы нет проверенных версий, вероятно, её качество '''не''' [[{{MediaWiki:Validationpage}}|оценивалось]].",
	'revreview-note' => '[[User:$1|$1]] сделал следующее замечание, [[{{MediaWiki:Validationpage}}|проверяя]] эту версию:',
	'revreview-notes' => 'Наблюдения и замечания для отображения:',
	'revreview-oldrating' => 'Была оценена:',
	'revreview-patrol' => 'Отметить это изменение как проверенное',
	'revreview-patrol-title' => 'Отметить как патрулированную',
	'revreview-patrolled' => 'Выбранная версия [[:$1|$1]] была отмечена как патрулированная.',
	'revreview-quality' => 'Это последняя [[{{MediaWiki:Validationpage}}|выверенная]] версия; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|правка|правки|правок}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновика] {{PLURAL:$3|ожидает|ожидают|ожидают}} проверки.',
	'revreview-quality-i' => 'Это последняя [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} выверенная] версия; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
В [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновике] есть требующие проверки [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}}изменения в шаблонах или изображениях].',
	'revreview-quality-old' => 'Это [[{{MediaWiki:Validationpage}}|выверенная]] версия ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>.
Могли быть сделаны новые [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} правки].',
	'revreview-quality-same' => 'Это последняя [[{{MediaWiki:Validationpage}}|выверенная]] версия ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]); [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Выверенная версия] этой страницы, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>, была основана на этой версии.',
	'revreview-quality-title' => 'Выверенная страница',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Досмотренная страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Досмотренная страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Досмотренная страница]]'''",
	'revreview-quick-invalid' => "'''Ошибочный идентификатор версии страницы'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Текущая версия]]''' (не проверялась)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Выверенная страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Выверенная страница]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Выверенная страница]]'''",
	'revreview-quick-see-basic' => "'''Черновик''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показать страницу]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} сравнить])",
	'revreview-quick-see-quality' => "'''Черновик''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показать страницу]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} сравнить])",
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
	'revreview-successful' => "'''Выбранная версия [[:$1|$1]] успешно отмечена. ([{{fullurl:Special:Stableversions|page=$2}} просмотр стабильных версий])'''",
	'revreview-successful2' => "'''С выбранной версии [[:$1|$1]] снята пометка.'''",
	'revreview-text' => "''По умолчанию установлен показ [[{{MediaWiki:Validationpage}}|стабильных версий]] страниц, а не наиболее новых.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Стабильные версии]] — проверенные версии страниц, которые могут быть установлены для показа по умолчанию.''",
	'revreview-toggle-title' => 'показать/скрыть подробности',
	'revreview-toolow' => 'Вы должны указать для всех значений уровень выше, чем «не указана», чтобы версия страницы считалась проверенной. Чтобы сбросить флаг проверки, установите все значения в «не указана».',
	'revreview-update' => "Пожалуйста, [[{{MediaWiki:Validationpage}}|проверьте]] правки ''(показаны ниже)'', сделанные после [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} установки] стабильной версии.<br />
'''Некоторые шаблоны или изображения были обновлены:'''",
	'revreview-update-includes' => "'''Некоторые шаблоны или изображения были обновлены:'''",
	'revreview-update-none' => "Пожалуйста, [[{{MediaWiki:Validationpage}}|проверьте]] правки ''(показаны ниже)'', сделанные после [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} установки] стабильной версии.",
	'revreview-update-use' => "'''ЗАМЕЧАНИЕ.''' Если какой-либо из этих шаблонов или изображений имеет стабильную версию, то она уже используется в стабильной версии этой страницы.",
	'revreview-diffonly' => "''Чтобы проверить статью, нажмите на ссылку «текущая версия» и используйте форму проверки.''",
	'revreview-visibility' => "'''У этой страницы имеется обновлённая [[{{MediaWiki:Validationpage}}|стабильная версия]]; можно изменить [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} настройки показа стабильных версий].'''",
	'revreview-visibility2' => "'''У этой страницы нет обновлённой [[{{MediaWiki:Validationpage}}|стабильной версии]]; можно изменить [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} настройки показа стабильных версий].'''",
	'revreview-revnotfound' => 'Старая версия страницы не найдена. Пожалуйста, проверьте правильность ссылки, которую вы использовали для доступа к этой странице.',
	'right-autopatrolother' => 'автоматическая отметка версий страниц в неосновном пространстве имён как патрулированных',
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
	'readerfeedback' => 'Что вы думаете об этой странице?',
	'readerfeedback-text' => "''Пожалуйста, дайте оценку этой странице. Ваши отзывы очень ценны для нас, они помогают работать над улучшением сайта.''",
	'readerfeedback-reliability' => 'Достоверность',
	'readerfeedback-completeness' => 'Полнота',
	'readerfeedback-npov' => 'Нейтральность',
	'readerfeedback-presentation' => 'Подача материала',
	'readerfeedback-overall' => 'Общая оценка',
	'readerfeedback-level-none' => '(не выбрано)',
	'readerfeedback-level-0' => 'плохая',
	'readerfeedback-level-1' => 'низкая',
	'readerfeedback-level-2' => 'средняя',
	'readerfeedback-level-3' => 'хорошая',
	'readerfeedback-level-4' => 'отличная',
	'readerfeedback-submit' => 'Отправить',
	'readerfeedback-main' => 'Оценены могут быть только основные страницы проекта.',
	'readerfeedback-success' => "'''Спасибо за оценку этой страницы!''' ([$3 Есть замечания или вопросы?]).",
	'readerfeedback-voted' => "'''Похоже, вы уже оценивали эту страницу.''' ([$3 Есть замечания или вопросы?]).",
	'readerfeedback-submitting' => 'Отправка…',
	'readerfeedback-finished' => 'Спасибо!',
	'revreview-filter-all' => 'Все',
	'revreview-filter-approved' => 'Утверждённые',
	'revreview-filter-reapproved' => 'Переутверждённые',
	'revreview-filter-unapproved' => 'Неутверждённые',
	'revreview-filter-auto' => 'Автоматически',
	'revreview-filter-manual' => 'Вручную',
	'revreview-filter-level-0' => 'Досмотренные версии',
	'revreview-filter-level-1' => 'Выверенные версии',
	'revreview-statusfilter' => 'Состояние:',
	'revreview-typefilter' => 'Тип:',
	'revreview-tagfilter' => 'Метка:',
	'revreview-reviewlink' => 'проверить',
	'tooltip-ca-current' => 'Просмотреть текущий черновик этой страницы',
	'tooltip-ca-stable' => 'Показать стабильную версию этой страницы',
	'tooltip-ca-default' => 'Настройки контроля качества',
	'tooltip-ca-ratinghist' => 'Читательская оценка этой страницы',
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
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит:] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Хойукку торумун] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} уларытыахха] сөп;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|уларытыы|уларытыылар}}] ырытыллыыны {{PLURAL:$3|кэтэһэр|кэтэһэллэр}}.',
	'revreview-basic-same' => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|көрүллүбүт]] торум, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэрэбиэркэлэммит] <i>$2</i>. Сирэйгэ [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} көннөрүү] оҥоруохха сөп.',
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
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} торумнар испииһэктэрэ]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит]
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 көннөрүү {{PLURAL:$3|көрүллүөхтээх|көрүллүөхтээхтэр}}].',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Бүтэһик кичэйэн көрүллүбүт торума]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} торумнар испииһэктэрэ]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит]
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 көннөрүү {{PLURAL:$3|көрүллүөхтээх|көрүллүөхтээхтэр}}].',
	'revreview-noflagged' => "Бу сирэй ырытыллыбыт торума суох, арааһа кини хаачыстыбата [[{{MediaWiki:Validationpage}}|'''сыаналамматах''']] быһыылаах.",
	'revreview-note' => '[[User:$1|$1]] бу торуму [[{{MediaWiki:Validationpage}}|ырыта]] олорон маннык эппит:',
	'revreview-notes' => 'Көрдөрүллэр кэтээһиннэр уонна самычаанньалар:',
	'revreview-oldrating' => 'Сыаналаммыт:',
	'revreview-patrol' => 'Бу уларытыыны бэрэбиэркэлэммит курдук бэлиэтээһин',
	'revreview-patrolled' => 'Талбыт торумуҥ [[:$1|$1]] бэрэбиэркэлэммит курдук бэлиэтэннэ.',
	'revreview-quality' => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|бэрэбиэркэлэммит]] торум,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит:] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Хойукку торумун] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} уларытыахха] сөп;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|уларытыы|уларытыылар}}] ырытыллыыны {{PLURAL:$3|кэтэһэр|кэтэһэллэр}}.',
	'revreview-quality-same' => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|бэрэбиркэлэммит]] торум, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэрэбиэркэлэммит] <i>$2</i>. Сирэйгэ [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} көннөрүү оҥоруохха] сөп.',
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
	'revreview-update' => 'Бука диэн манна аллара бэриллибит [[{{MediaWiki:Validationpage}}|чистовик]] статуһун биэрии кэннэ оҥоһуллубут [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} уларытыылары] бэрэбиэркэлээ (ханныгы баҕараргын). Сорох халыыптар уонна ойуулар саҥардыллыбыттар:',
	'revreview-update-none' => 'Бука диэн [[{{MediaWiki:Validationpage}}|чистовой торум]] кэнниттэн оноһуллубут [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} уларытыылары] (аллара бааллар) көр.',
	'revreview-visibility' => 'Бу сирэй [[{{MediaWiki:Validationpage}}|чистовой торумнаах]], которая может быть  
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} настроена].',
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
	'flaggedrevs-backlog' => "Momentálne existujú [[Special:OldReviewedPages|Zastaralé skontrolované stránky]]. '''Vyžaduje sa vaša pozornosť!'''",
	'flaggedrevs-desc' => 'Dáva redaktorom/kontrolórom možnosť overovať revízie a označovať stránky ako stabilné',
	'flaggedrevs-pref-UI-0' => 'Používať podrobné používateľské rozhranie stabilných verzií',
	'flaggedrevs-pref-UI-1' => 'Používať jednoduché používateľské rozhranie stabilných verzií',
	'flaggedrevs-prefs' => 'Stabilita',
	'flaggedrevs-prefs-stable' => 'Vždy štandardne zobrazovať stabilnú verziu stránok s obsahom (ak existuje)',
	'flaggedrevs-prefs-watch' => 'Pridať stránky, ktoré skontrolujem, do môjho zoznamu sledovaných',
	'group-editor' => 'Redaktori',
	'group-editor-member' => 'Redaktor',
	'group-reviewer' => 'Revízori',
	'group-reviewer-member' => 'Revízor',
	'grouppage-editor' => '{{ns:project}}:Redaktor',
	'grouppage-reviewer' => '{{ns:project}}:Revízor',
	'hist-draft' => 'revízia - návrh',
	'hist-quality' => 'kvalitná revízia',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} overil] [[User:$3|$3]]',
	'hist-stable' => 'videná revízia',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} videl] [[User:$3|$3]]',
	'review-diff2stable' => 'Zobraziť rozdiely medzi stabilnou a aktuálnou revíziou',
	'review-logentry-app' => 'skontrolované [[$1]]',
	'review-logentry-dis' => 'neodporúča sa verzia [[$1]]',
	'review-logentry-id' => 'ID verzie $1',
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
	'revreview-basic' => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|videná]] verzia tejto stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Aktuálna verzia] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmenu čakajúcu|zmeny čakajúce|zmien čakajúcich}}] na revíziu.',
	'revreview-basic-i' => 'Toto je posledná [[{{MediaWiki:Validationpage}}|videná]] revízia, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Jej [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrh] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/image zmeny] čakajúce na schválenie.',
	'revreview-basic-old' => 'Toto je [[{{MediaWiki:Validationpage}}|videná]] revízia ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Je možné, že boli vykonané ďalšie [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmeny].',
	'revreview-basic-same' => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|videná]] revízia, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] na <i>{{GRAMMAR:lokál|$2}}</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upraviť].',
	'revreview-basic-source' => 'Na tejto revízii bola založená [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} videná verzia] tejto stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.',
	'revreview-changed' => "'''Požadovanú činnosť nebolo možné vykonať na tejto revízii stránky [[:$1|$1]].'''

Šablóna alebo obrázok mohol byť vyžiadaný bez uvedenia konkrétnej verzie. To sa môže stať, keď dynamická šablóna transkluduje iný obrázok alebo šablónu v závislosti od premennej, ktorá sa zmenila, odkedy ste začali s kontrolou tejto stránky.
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
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]) tejto stránky bola [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená]
	 <i>$2</i>. <br /> {{PLURAL:$3|$3 revízia|$3 revízie||$3 revízií}} ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmeny]) čaká na schválenie.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná videná revízia] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]) bola [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/image Zmeny] je potrebné schváliť.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná kvalitná revízia]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]) tejto stránky bola [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená]
	 <i>$2</i>. <br /> {{PLURAL:$3|$3 revízia|$3 revízie||$3 revízií}} ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmeny]) čaká na schválenie.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná kvalitná revízia] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]) bola [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Template/image Zmeny] je potrebné schváliť.',
	'revreview-noflagged' => "Neexistujú revidované verzie tejto stránky, takže jej
	kvalita '''nebola''' [[{{MediaWiki:Validationpage}}|skontrolovaná]].",
	'revreview-note' => '[[User:$1|$1]] urobil nasledovné poznámky počas [[{{MediaWiki:Validationpage}}|kontroly]] tejto verzie:',
	'revreview-notes' => 'Pozorovania alebo poznámky, ktoré sa majú zobraziť:',
	'revreview-oldrating' => 'Bolo ohodnotené ako:',
	'revreview-patrol' => 'Označiť túto zmenu ako stráženú',
	'revreview-patrol-title' => 'Označiť ako strážené',
	'revreview-patrolled' => 'Vybraná revízia [[:$1|$1]] bola označená ako strážená.',
	'revreview-quality' => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|kvalitná]] verzia tejto stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Aktuálna verzia] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|zmenu čakajúcu|zmeny čakajúce|zmien čakajúcich}}] na revíziu.',
	'revreview-quality-i' => 'Toto je posledná [[{{MediaWiki:Validationpage}}|kvalitná]] revízia, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Jej [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrh] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} template/image zmeny] čakajúce na schválenie.',
	'revreview-quality-old' => 'Toto je [[{{MediaWiki:Validationpage}}|kvalitná]] revízia ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Je možné, že boli vykonané ďalšie [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} zmeny].',
	'revreview-quality-same' => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|kvalitná]] revízia, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] na <i>{{GRAMMAR:lokál|$2}}</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upraviť].',
	'revreview-quality-source' => 'Na tejto revízii bola založená [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kvalitná verzia] tejto stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.',
	'revreview-quality-title' => 'Kvalitná stránka',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Videná stránka]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Zobraziť návrh]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Videná stránka]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobraziť návrh]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Videná stránka]]'''",
	'revreview-quick-invalid' => "'''Neplatný ID revízie'''",
	'revreview-quick-none' => "'''Aktuálna'''. Žiadne revízie neboli skontrolvoané..",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Kvalitná stránka]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Zobraziť návrh]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Kvalitná stránka]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobraziť návrh]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitná stránka]]'''",
	'revreview-quick-see-basic' => "'''Návrh''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobraziť stránku]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} rozdiel])",
	'revreview-quick-see-quality' => "'''Návrh''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobraziť stránku]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} rozdiel])",
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
	'revreview-successful' => "'''Vybraná revízia [[:$1|$1]] bola úspešne označená. ([{{fullurl:Special:Stableversions|page=$2}} zobraziť stabilné verzie])'''",
	'revreview-successful2' => "'''Označenie vybranej revízie [[:$1|$1]] bolo úspešne zrušené.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabilné verzie]], nie najnovšie verzie, sú nastavené ako štandardný obsah stránky pre čitateľov.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabilné verzie]] sú skontrolované revízie stránok a je možné ich nastaviť ako štandardný obsah stránky pre čitateľov.''",
	'revreview-toggle' => '(prepnúť zobrazenie podrobností)',
	'revreview-toggle-title' => 'zobraziť/skryť podrobnosti',
	'revreview-toolow' => 'Musíte ohodnotiť každý z nasledujúcich atribútov minimálne vyššie ako „neschválené“, aby bolo možné
	verziu považovať za skontrolovanú. Ak chcete učiniť verziu zastaralou, nastavte všetky polia na „neschválené“.',
	'revreview-update' => "Prosím, [[{{MediaWiki:Validationpage}}|skontrolujte]] všetky zmeny ''(zobrazené nižšie)'', ktoré boli vykonané od [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválenia].<br />
'''Niektoré šablóny/obrázky sa zmenili:'''",
	'revreview-update-includes' => "'''Niektoré šablóny/obrázky sa zmenili:'''",
	'revreview-update-none' => "Prosím, [[{{MediaWiki:Validationpage}}|skontrolujte]] všetky zmeny ''(zobrazené nižšie)'', ktoré boli vykonané od [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválenia] poslednej stabilnej revízie.",
	'revreview-update-use' => "'''POZN.:''' Ak nejaká z týchto šablón/obrázkov má stabilnú verziu, potom je už použitá v stabilnej verzii tohto článku.",
	'revreview-diffonly' => "''Stránku môžete skontrolovať po kliknutí na odkaz „aktuálna revízia” pomocou formulára na kontrolu.''",
	'revreview-visibility' => "'''Táto stránka má [[{{MediaWiki:Validationpage}}|stabilnú verziu]]; nastavenia stability stránky je možné [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} upraviť].'''",
	'revreview-visibility2' => "'''Táto stránka nemá aktualizovanú [[{{MediaWiki:Validationpage}}|stabilnú verziu]]; nastavenia stability stránky je možné [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} upraviť].'''",
	'revreview-revnotfound' => 'Požadovaná staršia verzia stránky nebola nájdená.
Prosím skontrolujte URL adresu, ktorú ste použili na prístup k tejto stránke.',
	'right-autopatrolother' => 'Automaticky označiť revízie mimo hlavného menného priestoru ako strážené',
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
	'readerfeedback' => 'Čo si myslíte o tejto stránke?',
	'readerfeedback-text' => "''Prosím, venujte chvíľu ohodnoteniu tejto stránky. Ceníme si vaše pripomienky, pomáhajú nám zlepšiť našu webstránku''",
	'readerfeedback-reliability' => 'Spoľahlivosť',
	'readerfeedback-completeness' => 'Úplnosť',
	'readerfeedback-npov' => 'Neutralita',
	'readerfeedback-presentation' => 'Prezentácia',
	'readerfeedback-overall' => 'Celkovo',
	'readerfeedback-level-none' => '(neistý)',
	'readerfeedback-level-0' => 'Slabá',
	'readerfeedback-level-1' => 'Nízka',
	'readerfeedback-level-2' => 'Dobrá',
	'readerfeedback-level-3' => 'Vysoká',
	'readerfeedback-level-4' => 'Vynikajúca',
	'readerfeedback-submit' => 'Odoslať',
	'readerfeedback-main' => 'Je možné hodnotiť iba stránky s obsahom.',
	'readerfeedback-success' => "'''Ďakujeme za kontrolu tejto stránky!''' Máte [$3 komentár alebo otázku?].",
	'readerfeedback-voted' => "'''Zdá sa, že ste túto stránku už ohodnotili.''' Máte [$3 komentár alebo otázku?].",
	'readerfeedback-submitting' => 'Odosiela sa...',
	'readerfeedback-finished' => 'Ďakujeme!',
	'revreview-filter-all' => 'Všetky',
	'revreview-filter-approved' => 'Schválené',
	'revreview-filter-reapproved' => 'Znova schválené',
	'revreview-filter-unapproved' => 'Neschválené',
	'revreview-filter-auto' => 'Automatické',
	'revreview-filter-manual' => 'Ručné',
	'revreview-filter-level-0' => 'Videné verzie',
	'revreview-filter-level-1' => 'Kvalitné verzie',
	'revreview-statusfilter' => 'Stav:',
	'revreview-typefilter' => 'Typ:',
	'revreview-tagfilter' => 'Štítok:',
	'revreview-reviewlink' => 'skontrolovať',
	'tooltip-ca-current' => 'Zobraziť aktuálny koncept tejto stránky',
	'tooltip-ca-stable' => 'Zobraziť stabilnú verziu tejto stránky',
	'tooltip-ca-default' => 'Nastavenia kontroly kvality',
	'tooltip-ca-ratinghist' => 'Hodnotenie tejto stránky čitateľmi',
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

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Millosh
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'editor' => 'Уређивач',
	'flaggedrevs' => 'Означене измене',
	'flaggedrevs-backlog' => "Тренутно постоји позадински лог на [[Special:OldReviewedPages|застарелим овереним странама]]. '''Потребна је твоја пажња!'''",
	'flaggedrevs-desc' => 'Даје уредницима и прегледачима могућност да овере верзију и стабилизују страну.',
	'flaggedrevs-pref-UI-0' => 'Коришњење детаљног интерфејса за стабилне верзије.',
	'flaggedrevs-pref-UI-1' => 'Коришћење једноставног интерфејса за стабилне верзије.',
	'flaggedrevs-prefs' => 'Стабилност',
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
	'review-logentry-app' => 'прегледан [[$1]]',
	'review-logentry-dis' => 'застарела верзија стране [[$1]]',
	'review-logentry-id' => 'редни број верзије: $1',
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
	'revreview-draft-title' => 'Нацрт чланка',
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
	'revreview-submit' => 'Приложи преглед',
	'revreview-successful2' => "'''Успешно је скинута ознака са означене верзије стране [[:$1|$1]].'''",
	'revreview-toggle-title' => 'прикажи/сакриј детаље',
	'revreview-update-includes' => "'''Неки шаблони и/или слике су обновљени:'''",
	'revreview-diffonly' => "''Та преглед стране кликни на линк \"тренутна верзија\" и користи форму за преглед.''",
	'revreview-revnotfound' => 'Старија ревизија ове странице коју сте затражили није нађена.
Молимо вас да проверите УРЛ који сте употребили да бисте приступили овој страници.',
	'right-autopatrolother' => 'Аутоматски означи верзије патролисаним ако нису у основном именском простору.',
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
	'readerfeedback' => 'Утисак читалаца',
	'readerfeedback-text' => "''Молим те, посвети мало пажње и оцени страну испод. Твоје мишљење је вредно и помаже нам у унапређивању сајта.''",
	'readerfeedback-reliability' => 'поузданост',
	'readerfeedback-completeness' => 'потпуност',
	'readerfeedback-npov' => 'неутралност',
	'readerfeedback-presentation' => 'презентација',
	'readerfeedback-overall' => 'укупно',
	'readerfeedback-level-0' => 'лоше',
	'readerfeedback-level-1' => 'слабо',
	'readerfeedback-level-2' => 'прихватљиво',
	'readerfeedback-level-3' => 'добро',
	'readerfeedback-level-4' => 'изузетно',
	'readerfeedback-submit' => 'пошаљи',
	'readerfeedback-main' => 'Само стране са садржајем могу бити прегледане.',
	'revreview-filter-all' => 'све',
	'revreview-filter-approved' => 'одобрено',
	'revreview-filter-reapproved' => 'поново одобрено',
	'revreview-filter-unapproved' => 'неодобрено',
	'revreview-filter-auto' => 'аутоматски',
	'revreview-filter-manual' => 'ручно',
	'revreview-filter-level-0' => 'прегледане верзије',
	'revreview-filter-level-1' => 'квалитетне верзије',
	'revreview-statusfilter' => 'Стање:',
	'revreview-typefilter' => 'Тип:',
	'revreview-tagfilter' => 'Ознака:',
	'tooltip-ca-current' => 'Прегледај текући нацрт ове стране.',
	'tooltip-ca-stable' => 'Погледајте стабилну верзију ове странице',
	'tooltip-ca-default' => 'Подешавања обезбеђивања квалитета.',
	'tooltip-ca-ratinghist' => 'Оцене стране од стране читалаца.',
	'revreview-ak-review' => 'с',
	'accesskey-ca-current' => 'в',
	'accesskey-ca-stable' => 'ц',
	'revreview-tt-review' => 'Преглед ове стране.',
	'validationpage' => '{{ns:help}}:Овера чланка',
);

/** latinica (latinica) */
$messages['sr-el'] = array(
	'revreview-revnotfound' => 'Starija revizija ove stranice koju ste zatražili nije nađena.
Molimo vas da proverite URL koji ste upotrebili da biste pristupili ovoj stranici.',
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
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] ap n <i>$2</i>. Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} apstuunse Version]
	kon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided] wäide; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}]
{{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-basic-same' => "Dät is ju lääste [[{{MediaWiki:Validationpage}}|bekiekede]] Version,
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} wies aal]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] an dän <i>$2</i>. Ju Siede kon '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided]''' wäide.",
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
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} sjuch aal]) wuude ap n <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}] {{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-newest-quality' => 'Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lääste wröigede Version]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} sjuch aal]) wuude ap n <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}] {{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-noflagged' => 'Fon disse Siede rakt et neen markierde Versione, so dät noch neen Tjuugnis uur ju [[{{MediaWiki:Validationpage}}|Qualität]] moaked wäide kon.',
	'revreview-note' => '[[User:$1|$1]] moakede ju foulgendje [[{{MediaWiki:Validationpage}}|Wröignotiz]] tou disse Version:',
	'revreview-notes' => 'Antouwiesende Bemäärkengen un Notizen:',
	'revreview-oldrating' => 'Iendeelenge bit nu:',
	'revreview-patrol' => 'Markier disse Annerenge as kontrollierd',
	'revreview-patrolled' => 'Ju uutwäälde Version fon [[:$1|S1]] wuude as kontrollierd markierd.',
	'revreview-quality' => 'Dit is ju lääste [[{{MediaWiki:Validationpage}}|wröigede]] Version,
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] ap n <i>$2</i>. Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} apstuunse Version]
	kon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided] wäide; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|Version|Versione}}]
	{{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-quality-same' => "Dät is ju lääste [[{{MediaWiki:Validationpage}}|wröigede]] Version,
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} wies aal]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] an dän <i>$2</i>. Ju Siede kon '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided]''' wäide.",
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
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Wröig]] älke Annerenge ''(sjuch hierunner)'' siet ju lääste stoabile Version [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] wuude.

'''Do foulgjende Foarloagen un Bielden wuuden ferannerd:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Wröig]] älke Annerenge ''(sjuch hierunner)'' siet ju lääste stoabile Version [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] wuude.",
	'revreview-visibility' => 'Disse Siede häd ne [[{{MediaWiki:Validationpage}}|stoabile Version]], ju der
	[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigurierd] wäide kon.',
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
 */
$messages['sv'] = array(
	'editor' => 'Redaktör',
	'flaggedrevs' => 'Flaggade sidversioner',
	'flaggedrevs-backlog' => "Det finns för tillfället en backlogg på [[Special:OldReviewedPages|Föråldrade granskade sidor]]. '''Din uppmärksamhet behövs!'''",
	'flaggedrevs-desc' => 'Ger redaktörer och granskare möjligheten att validera sidversioner och stablilsera sidor',
	'flaggedrevs-pref-UI-0' => 'Använd ett detaljerat gränssnitt för stabila versioner',
	'flaggedrevs-pref-UI-1' => 'Använd ett enkelt gränssnitt för stabila versioner',
	'flaggedrevs-prefs' => 'Stabilitet',
	'flaggedrevs-prefs-stable' => 'Visa alltid den stabila versionen av sidor (om en sådan finns)',
	'flaggedrevs-prefs-watch' => 'Lägg till sidor jag granskar i min bevakningslista',
	'group-editor' => 'Redaktörer',
	'group-editor-member' => 'redaktör',
	'group-reviewer' => 'Granskare',
	'group-reviewer-member' => 'granskare',
	'grouppage-editor' => '{{ns:project}}:Redaktörer',
	'grouppage-reviewer' => '{{ns:project}}:Granskare',
	'hist-draft' => 'utkastet för sidversionen',
	'hist-quality' => 'kvalitetsversion',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validerad] av [[User:$3|$3]]',
	'hist-stable' => 'synad version',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} synad] av [[User:$3|$3]]',
	'review-diff2stable' => 'Visa ändringar mellan den stabila och den senaste versionen',
	'review-logentry-app' => 'granskade [[$1]]',
	'review-logentry-dis' => 'underkände en version av [[$1]]',
	'review-logentry-id' => 'versions-ID $1',
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
	'revreview-basic' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|synade]] versionen, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ändring|ändringar}}] som väntar på granskning.',
	'revreview-basic-i' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|synade]] sidversionen, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mall och bild ändringar] som väntar på granskning.',
	'revreview-basic-old' => 'Det här är en [[{{MediaWiki:Validationpage}}|synad]] sidversion ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
Nya [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ändringar] kan ha gjorts.',
	'revreview-basic-same' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|synade]] sidversionen ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.',
	'revreview-basic-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} synad version] av den här sidan, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>, baserades på den här versionen.',
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
	'revreview-newest-basic' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste synade versionen] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ändring|ändringar}}] behöver granskas.',
	'revreview-newest-basic-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste synade versionen] av den här sidan ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mall eller bildändringar] behöver granskas.',
	'revreview-newest-quality' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste kvalitetsversionen av sidan]  ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ändring|ändringar}}] behöver granskas.',
	'revreview-newest-quality-i' => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste kvalitetsversionen] av den här sidan ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mall eller bildändringar] behöver granskas.',
	'revreview-noflagged' => "Det finns inga granskade versioner av den här sidan, så dess kvalitet har kanske '''inte''' [[{{MediaWiki:Validationpage}}|kontrollerats]].",
	'revreview-note' => '[[User:$1|$1]] gjorde följande noteringar när den här sidversionen [[{{MediaWiki:Validationpage}}|granskades]]:',
	'revreview-notes' => 'Anmärkningar eller noteringar som kommer visas:',
	'revreview-oldrating' => 'Bedömningen var:',
	'revreview-patrol' => 'Märk den här ändringen som patrullerad',
	'revreview-patrol-title' => 'Markera som patrullerad',
	'revreview-patrolled' => 'Den valda versionen av [[:$1|$1]] har märkts som patrullerad.',
	'revreview-quality' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|kvalitetsversionen]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAME}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|ändring|ändringar}}] väntar på granskning.',
	'revreview-quality-i' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|kvalitetsversionen]] av sidan, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mall och bild ändringar] som väntar på granskning.',
	'revreview-quality-old' => 'Det här är en [[{{MediaWiki:Validationpage}}|kvalitetsversion]] av sidan ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
Nya [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} ändringar] kan ha gjorts.',
	'revreview-quality-same' => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|kvalitetsversionen]] av sidan ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.',
	'revreview-quality-source' => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kvalitetsversion] av den här sidan, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>, baserades på den här versionen.',
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
	'revreview-successful' => "'''Vald sidversion av [[:$1|$1]] har flaggats. ([{{fullurl:Special:Stableversions|page=$2}} visa alla stabila sidversioner])'''",
	'revreview-successful2' => "'''Vald sidversion av [[:$1|$1]] har avflaggats.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Stabila versioner]] är standardinnehåll i sidor i stället för den nyaste sidversionen.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Stabila versioner]] är kontrollerade versioner av sidor och kan ställas in som standardinnehåll för läsare.''",
	'revreview-toggle-title' => 'visa/dölj detaljer',
	'revreview-toolow' => 'Din bedömning av sidan måste vara högre än "ej godkänd" för alla egenskaper nedan för att versionen ska anses vara granskad. För att ta bort ett godkännande av en version, ange "ej godkänd" för alla egenskaper.',
	'revreview-update' => "Var god [[{{MediaWiki:Validationpage}}|granska]] några ändringar ''(visas nedan)'' gjorda när den stabila versionen [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes].<br />
'''Vissa mallar eller bilder har uppdaterats:'''",
	'revreview-update-includes' => "'''Vissa mallar eller bilder har ändrats:'''",
	'revreview-update-none' => "Var god [[{{MediaWiki:Validationpage}}|review]] några ändringar ''(visas nedan)'' gjorda när den stabila versionen [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes].",
	'revreview-update-use' => "'''NOTERA:''' Om någon av de här mallarna eller bilderna har en stabil version, är den redan använd i den stabila versionen av den här sidan.",
	'revreview-diffonly' => "''För att granska sidan, klicka på versionslänken \"nuvarande version\" och använd granskningsformuläret.''",
	'revreview-visibility' => "'''Denna sida har en uppdaterad [[{{MediaWiki:Validationpage}}|stabil version]]; inställningarna för den kan [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigureras].'''",
	'revreview-visibility2' => "'''Denna sida har inte en uppdaterad [[{{MediaWiki:Validationpage}}|stabil version]]; inställningarna för den kan [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigureras].'''",
	'revreview-revnotfound' => 'Den gamla versionen av den sida du frågade efter kan inte hittas. Kontrollera den URL du använde för att nå den här sidan.',
	'right-autopatrolother' => 'Automatiskt märka sidversioner i andra namnrymder än huvudnamnrymden patrullerade',
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
	'readerfeedback' => 'Vad tycker du om den här sidan?',
	'readerfeedback-text' => "''Var snäll och lägg ett par minuter på att bedöma denna sida här nedan. Din feedback är värdefull och hjälper oss att förbättra vår webbplats.''",
	'readerfeedback-reliability' => 'Trovärdighet',
	'readerfeedback-completeness' => 'Fullständighet',
	'readerfeedback-npov' => 'Neutralitet',
	'readerfeedback-presentation' => 'Presentation',
	'readerfeedback-overall' => 'Helhetsintryck',
	'readerfeedback-level-none' => '(osäker)',
	'readerfeedback-level-0' => 'Mycket dålig',
	'readerfeedback-level-1' => 'Dålig',
	'readerfeedback-level-2' => 'Okej',
	'readerfeedback-level-3' => 'Bra',
	'readerfeedback-level-4' => 'Mycket bra',
	'readerfeedback-submit' => 'Skicka',
	'readerfeedback-main' => 'Endast innehållssidor kan granskas.',
	'readerfeedback-success' => "'''Tack för att du granskade den här sidan!''' ([$3 Kommentarer eller frågor?]).",
	'readerfeedback-voted' => "'''Det verkar som att du redan betygsatt den här sidan'''. ([$3 Kommentarer eller frågor?]).",
	'readerfeedback-submitting' => 'Skickar...',
	'readerfeedback-finished' => 'Tack!',
	'revreview-filter-all' => 'Alla',
	'revreview-filter-approved' => 'Godkända',
	'revreview-filter-reapproved' => 'Åter godkända',
	'revreview-filter-unapproved' => 'Ej godkända',
	'revreview-filter-auto' => 'Automatiskt',
	'revreview-filter-manual' => 'Manuellt',
	'revreview-filter-level-0' => 'Synade versioner',
	'revreview-filter-level-1' => 'Kvalitetsversioner',
	'revreview-statusfilter' => 'Status:',
	'revreview-typefilter' => 'Typ:',
	'revreview-tagfilter' => 'Märke:',
	'revreview-reviewlink' => 'granska',
	'tooltip-ca-current' => 'Visa det senaste utkastet för denna sida',
	'tooltip-ca-stable' => 'Visa den stabila versionen av denna sida',
	'tooltip-ca-default' => 'Inställningar för kvalitetssäkring',
	'tooltip-ca-ratinghist' => 'Användarbetyg för den här sidan',
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
 * @author Mpradeep
 * @author Veeven
 * @author వైజాసత్య
 */
$messages['te'] = array(
	'editor' => 'ఎడిటర్',
	'flaggedrevs' => 'జండాపాతిన కూర్పులు',
	'flaggedrevs-desc' => 'ఎడిటర్లకి/సమీక్షకులకి కూర్పులను సరిచూసే మరియు పేజీలను సుస్థిరపరచే వీలును కల్పిస్తుంది',
	'flaggedrevs-prefs' => 'స్థిరత్వం',
	'flaggedrevs-prefs-watch' => 'నేను సమీక్షించిన పేజీలను నా వీక్షణాజాబితాలో చేర్చు',
	'group-editor' => 'ఎడిటర్లు',
	'group-editor-member' => 'ఎడిటర్',
	'group-reviewer' => 'సమీక్షకులు',
	'group-reviewer-member' => 'సమీక్షకులు',
	'grouppage-editor' => '{{ns:project}}:ఎడిటర్',
	'grouppage-reviewer' => '{{ns:project}}:సమీక్షకులు',
	'hist-quality' => 'నాణ్యమైన కూర్పు',
	'hist-stable' => 'కనబడిన కూర్పు',
	'review-diff2stable' => 'సుస్థిర మరియు ప్రస్తుత కూర్పుల మధ్య మార్పులను చూడండి',
	'review-logentry-app' => '[[$1]]ని సమీక్షించారు',
	'review-logentry-dis' => '[[$1]] యొక్క ఓ కూర్పుని నిరాదరించారు',
	'review-logentry-id' => 'కూర్పు ID $1',
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
	'revreview-basic' => 'ఇది చిట్టచివరిగా [[{{MediaWiki:Validationpage}}|కనబడిన]] కూర్పు; <i>$2</i> న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తు ప్రతిని] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|మార్పు|మార్పులు}}] సమీక్ష కోసం {{PLURAL:$3|వేచి ఉంది|వేచి ఉన్నాయి}}.',
	'revreview-basic-same' => 'ఇది చిట్టచివరిగా [[{{MediaWiki:Validationpage}}|కనబడిన]] కూర్పు, <i>$2</i> న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ పేజీని [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు].',
	'revreview-current' => 'డ్రాఫ్టు',
	'revreview-depth' => 'లోతైనది',
	'revreview-depth-0' => 'ఆమోదించనివి',
	'revreview-depth-1' => 'ప్రాథమిక',
	'revreview-depth-2' => 'మధ్యస్తం',
	'revreview-depth-3' => 'ఉన్నత',
	'revreview-depth-4' => 'విశేష్యం',
	'revreview-edit' => 'డ్రాఫ్టును దిద్దు',
	'revreview-flag' => 'ఈ కూర్పుని సమీక్షించండి',
	'revreview-legend' => 'ఈ కూర్పు యొక్క సారాన్ని వెలకట్టండి',
	'revreview-log' => 'వ్యాఖ్య:',
	'revreview-main' => 'సమీక్షించడానికి మీరు విషయపు పేజీ యొక్క ఓ నిర్ధిష్ట కూర్పుని ఎంచుకోవాలి.

సమీక్షించని పేజీల జాబితా కొరకు [[Special:Unreviewedpages]]ని చూడండి.',
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} చిట్టచివరిగా కనబడిన ఈ కూర్పు] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} అన్నిటినీ చూపించు]) <i>$2</i> న  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|మార్పుకు|మార్పులకు}}] సమీక్ష {{PLURAL:$3|అవసరం|అవసరం}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} చివరి నాణ్యతా కూర్పు] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} అన్నీ చూపించు]) <i>$2</i>న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} అనుమతించారు]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|1 మార్పు|$3 మార్పుల}}]ను సమీక్షించాలి.',
	'revreview-noflagged' => "ఈ పేజీకి సమీక్షిత కూర్పులేమీ లేవు, కాబట్టి దీన్ని నాణ్యత కొరకు [[{{MediaWiki:Validationpage}}|సరిచూసి]] '''ఉండక'''పోవచ్చు.",
	'revreview-note' => 'ఈ కూర్పుని [[{{MediaWiki:Validationpage}}|సమీక్షిస్తూ]], [[User:$1|$1]] ఈ వ్యాఖ్యలు చేసారు:',
	'revreview-notes' => 'చూపించాల్సిన గమనికలు:',
	'revreview-oldrating' => 'రేటింగు:',
	'revreview-patrol' => 'ఈ మార్పును నిఘాలో ఉన్నట్లుగా గుర్తించు',
	'revreview-patrolled' => 'మీరు ఎంచుకున్న [[:$1|$1]] యొక్క కూర్పు నిఘాలో ఉంది.',
	'revreview-quality' => 'ఇది చిట్టచివరి [[{{MediaWiki:Validationpage}}|నాణ్యమైన]] కూర్పు; <i>$2</i> న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తుప్రతిని] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|మార్పు|మార్పులు}}] సమీక్ష కోసం {{PLURAL:$3|వేచి ఉంది|వేచి ఉన్నాయి}}.',
	'revreview-quality-same' => 'ఇది చిట్టచివరి [[{{MediaWiki:Validationpage}}|నాణ్యమైన]] కూర్పు, <i>$2</i> న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ పేజీని [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు].',
	'revreview-quality-title' => 'నాణ్యమైన వ్యాసం',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|కనబడ్డాయి]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తు ప్రతి]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|గమనించిన వ్యాసం]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తుప్రతిని చూపించు]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|కనబడ్డాయి]]''' (సమీక్షించని మార్పులేమీ లేవు)",
	'revreview-quick-none' => "'''ప్రస్తుత''' (సమీక్షిత కూర్పులు లేవు)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|నాణ్యత]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ప్రతిని చూడండి]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|మార్పు|మార్పులు}}])",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|నాణ్యత]]''' (సమీక్షించని మార్పులు లేవు)",
	'revreview-quick-see-basic' => "'''ప్రతి''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} సుస్థిర పేజీని చూడండి]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|మార్పు|మార్పులు}}])",
	'revreview-quick-see-quality' => "'''ప్రతి''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} సుస్థిర పేజీ చూడండి]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$2|మార్పు|మార్పులు}}])",
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
	'revreview-submit' => 'సమీక్షని దాఖలు చెయ్యండి',
	'revreview-text' => 'పేజీలో విషయంగా కొత్త కూర్పులు కాకుండా సుస్థిర కూర్పులు కనిపిస్తాయి.',
	'revreview-toggle-title' => 'వివరాలను చూపించు/దాచు',
	'revreview-toolow' => 'ఓ కూర్పును సమీక్షించినట్లుగా భావించాలంటే కింద ఇచ్చిన గుణాలన్నిటినీ "సమ్మతించలేదు" కంటే ఉన్నతంగా రేటు చెయ్యాలి.',
	'revreview-update' => "సుస్థిర కూర్పుని [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} అనుమతించిన] తర్వాత జరిగిన ''(క్రింద చూపించిన)'' మార్పులను [[{{MediaWiki:Validationpage}}|సమీక్షించండి]].

'''కొన్ని మూసలు/బొమ్మలను తాజాకరించారు:'''",
	'revreview-update-includes' => "'''కొన్ని మూసలు/బొమ్మలను తాజాకరించారు:'''",
	'revreview-update-none' => "సుస్థిర కూర్పుని [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} అనుమతించిన] తర్వాత చేసిన ''(క్రింద చూపించిన)'' మార్పులను [[{{MediaWiki:Validationpage}}|సమీక్షించండి]].",
	'revreview-visibility' => 'ఈ పేజీకి ఓ [[{{MediaWiki:Validationpage}}|సుస్థిర కూర్పు]] ఉంది, దాన్ని [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} మార్చవచ్చు].',
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
	'stable-logpagetext' => 'ఇది విషయపు పేజీల [[{{MediaWiki:Validationpage}}|సుస్థిర కూర్పు]] మార్పుల లాగ్',
	'readerfeedback-success' => "'''ఈ పేజీని సమీక్షించినందుకు కృతజ్ఞతలు!''' ([$3 సందేహాలు లేదా సూచనలున్నాయా?]).",
	'readerfeedback-finished' => 'ధన్యవాదాలు!',
	'revreview-filter-all' => 'అన్నీ',
	'revreview-statusfilter' => 'స్థితి:',
	'revreview-typefilter' => 'రకం:',
	'tooltip-ca-current' => 'ఈ పేజీ యొక్క ప్రస్తుత ప్రతిని చూడండి',
	'tooltip-ca-stable' => 'ఈ పేజీ యొక్క సుస్థిర కూర్పుని చూడండి',
	'tooltip-ca-default' => 'నాణ్యతా భరోసా అమరికలు',
	'revreview-tt-review' => 'ఈ పేజీని సమీక్షించండి',
	'validationpage' => '{{ns:help}}:వ్యాస మూల్యాంకన',
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
	'revreview-basic' => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|баррасишуда]]  аст, ки дар <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Пешнавис] қобили '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} вироиш аст]'''; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ  {{PLURAL:$3|аст|ҳастанд}}.",
	'revreview-basic-same' => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|баррасишуда]] аст, ки дар <i>$2</i>  ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} феҳристи комил]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. Ин саҳифа қобили  '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} тағйир]''' аст.",
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Охирин нусхаи баррасишуда] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} феҳристи комил]) дар  <i>$2</i>  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ {{PLURAL:$3|аст|ҳастанд}}.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Охирин нусхаи бокайфият] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} феҳристи комил]) дар  <i>$2</i>  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ {{PLURAL:$3|аст|ҳастанд}}.',
	'revreview-noflagged' => 'Нусхаи муруршудае аз ин саҳифа вуҷуд надорад, ба ин далел, ки ин саҳифа аз назари кайфият ва сифат баррасӣ [[{{MediaWiki:Validationpage}}|нашудааст]].',
	'revreview-note' => '[[User:$1|$1]] ин тавзеҳотро зимни [[{{MediaWiki:Validationpage}}|баррасии]] нусха, сабт кард:',
	'revreview-notes' => 'Мушоҳидот ё мулоҳизот:',
	'revreview-oldrating' => 'Дараҷаи дода шуда:',
	'revreview-patrol' => 'Аломат задании ин тағйир ба унвони баррасишуда',
	'revreview-patrolled' => 'Нусхаи интихобшуда аз [[:$1|$1]] ба унвони баррасишуда аломат хӯрдааст.',
	'revreview-quality' => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|бокайфият]] аст, ки дар <i>$2</i>  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Пешнавис] қобили '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} вироиш аст]'''; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ  {{PLURAL:$3|аст|ҳастанд}}.",
	'revreview-quality-same' => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|бокайфият]] аст, ки дар  <i>$2</i> ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} феҳристи комил]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. Ин саҳифа қобили  '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} тағйир]''' аст.",
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
	'revreview-update' => "Лутфан тамоми тағйироте (дар зер оварда шудааст), ки пас аз охирин нусхаи пойдор амалӣ шударо  [[{{MediaWiki:Validationpage}}|барраси кунед]], ки аз замоне, ки нусхаи пойдор  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйидшуда] буд.

'''Бархе аз шаблонҳо/аксҳо барӯз шудаанд:'''",
	'revreview-update-none' => 'Лутфан тамоми тағйироте (дар зер оварда шудааст), ки пас аз охирин нусхаи пойдор амалӣ шударо  [[{{MediaWiki:Validationpage}}|барраси кунед]], ки аз замоне, ки нусхаи пойдор  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйидшуда] буд.',
	'revreview-visibility' => "'''Ин саҳифа дорои як  [[{{MediaWiki:Validationpage}}|нусхаи пойдор]] аст, танзимот барои он метавонад   [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} пайкарбандӣ] шавад.'''",
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
	'flaggedrevs-backlog' => "Pangkasalukuyang may mga naiwanan sa [[Special:OldReviewedPages|Hindi naisasapanahong mga nasuri nang mga pahina]]. '''Kailangan ang iyong pagpansin!'''",
	'flaggedrevs-desc' => 'Nagbibigay sa mga patnugot at mga tagapagsuri ng kakayahang mapatunayan ang mga pagbabago at mabigyan ng katatagan ang mga pahina',
	'flaggedrevs-pref-UI-0' => 'Gamitin ang detalyadong matatag na bersyon ng ugnayang panghangganan na pangtagagamit',
	'flaggedrevs-pref-UI-1' => 'Gamitin ang payak na matatag na bersyon ng ugnayang-panghangganan na pangtagagamit',
	'flaggedrevs-prefs' => 'Katatagan',
	'flaggedrevs-prefs-stable' => 'Ipakita palagi ang matatag na bersyon ng mga pahina ng nilalaman ayon sa likas na pagkakatakda (kung mayroon)',
	'flaggedrevs-prefs-watch' => 'Idagdag ang mga pahinang nasuri ko na sa aking talaan ng mga binabantayan',
	'group-editor' => 'Mga patnugot',
	'group-editor-member' => 'patnugot',
	'group-reviewer' => 'Mga tagapagsuri',
	'group-reviewer-member' => 'tagapagsuri',
	'grouppage-editor' => '{{ns:project}}:Patnugot',
	'grouppage-reviewer' => '{{ns:project}}:Tagapagsuri',
	'hist-draft' => 'balangkas ng pagbabago',
	'hist-quality' => 'katangiang pangkagalingan ng pagbabago',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} pinatunayan] ni [[User:$3|$3]]',
	'hist-stable' => 'namataang pagbabago',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} namataan na] ni [[User:$3|$3]]',
	'review-diff2stable' => 'Tingnan ang mga pagbabago sa pagitan ng matatag at pangkasalukuyang mga pagbabago',
	'review-logentry-app' => 'nasuri na ang [[$1]]',
	'review-logentry-dis' => 'pinababa ang halaga/katuturan ng isang bersyon ng [[$1]]',
	'review-logentry-id' => 'ID ng pagbabago $1',
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
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} balangkas] ay may [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|pagbabagong|mga pagbabagong}}] naghihintay ng muling pagsusuri.',
	'revreview-basic-i' => 'Ito ang pinakahuling [[{{MediaWiki:Validationpage}}|namataang]] pagbabago, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} balangkas] ay may [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mga pagbabago sa suleras/larawan] na naghihintay ng muling pagsusuri.',
	'revreview-basic-old' => 'Isa itong [[{{MediaWiki:Validationpage}}|namataang]] pagbabago ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} itala ang lahat]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Maaaring may nagawang [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mga pagbabago].',
	'revreview-basic-same' => 'Ito ang pinakahuling [[{{MediaWiki:Validationpage}}|namataang]] pagbabago ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} itala ang lahat]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.',
	'revreview-basic-source' => 'Isang [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} namataang pagbabago] ng pahinang ito, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>, na ibinatay mula sa pagbabagong ito.',
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
	'revreview-newest-basic' => 'Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} pinakahuling namataang pagbabago] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} itala ang lahat]) ay [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|pagbabagong|mga pagbabagong}}] {{PLURAL:$3|kailangan|kailangan}} ng muling pagsusuri.',
	'revreview-newest-basic-i' => 'Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} pinakahuling namataang pagbabago] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} itala ang lahat]) ay [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mga pagbabago sa suleras/larawan] nangangailangan ng muling pagsusuri.',
	'revreview-newest-quality' => 'Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} pinakahuling pagbabagong may mataas na uri (kalidad)] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} itala ang lahat]) ay [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|pagbabago|mga pagbabago}}] {{PLURAL:$3|nangangailangan|nangangailangan}} ng muling pagsusuri.',
	'revreview-newest-quality-i' => 'Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} pinakahuling pagbabagong may mataas na uri (kalidad)] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} itala ang lahat]) ay [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Mga pagbabago sa suleras/larawang] nangangailangan ng muling pagsusuri.',
	'revreview-noflagged' => "Walang muling nasuring pagbabago para sa pahinang ito, kaya maaaring '''hindi''' pa ito 
[[{{MediaWiki:Validationpage}}|nasuri]] para sa kaantasan ng uri (kalidad).",
	'revreview-note' => 'Gumawa (naglagay) si [[User:$1|$1]] ng sumusunod na mga pagtatala hinggil sa [[{{MediaWiki:Validationpage}}|muling pagsuri]] ng pagbabagong ito:',
	'revreview-notes' => 'Mga puna o mga talang ipapakita (palilitawin):',
	'revreview-oldrating' => 'Binigyan ito ng antas/halagang:',
	'revreview-patrol' => 'Tatakan ang pagbabagong ito bilang napatrolya na',
	'revreview-patrol-title' => 'Tatakan bilang napagtrolya na',
	'revreview-patrolled' => 'Ang napiling pagbabago ng [[:$1|$1]] ay natatakan bilang napatrolya na.',
	'revreview-quality' => 'Ito ang pinakahuling [[{{MediaWiki:Validationpage}}|may mataas na uri (kalidad)]] na pagbabago, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} balangkas] ay may [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|pagbabagong|mga pagbabagong}}] naghihintay ng muling pagsusuri',
	'revreview-quality-i' => 'It ang pinakahuling [[{{MediaWiki:Validationpage}}|may mataas na uring]] pagbabago, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Ang [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} balangkas] ay mayroong [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mga pagbabago sa suleras/larawan] na naghihintay ng pagsusuri.',
	'revreview-quality-old' => 'Isa itong may [[{{MediaWiki:Validationpage}}|mataas na uri]] ng pagbabago ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} itala ang lahat]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.
Maaaring may bagong [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} mga pagbabagong] nagawa na.',
	'revreview-quality-same' => 'Ito ang pinakahuling [[{{MediaWiki:Validationpage}}|may mataas na uri]] ng pagbabago ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} itala ang lahat]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>.',
	'revreview-quality-source' => 'Isang [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bersyong may mataas na uri] ng pahinang ito, na [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] noong <i>$2</i>, ay ibinatay mula sa pagbabagong ito.',
	'revreview-quality-title' => 'Pahinang may mataas na uri',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Namataang pahina]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tingnan ang balangkas]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Namataang pahina]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tingnan ang pahina]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Namataang pahina]]'''",
	'revreview-quick-invalid' => "'''Hindi tanggap na ID na pagbabago'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Pangkasalukuyang pagbabago]]''' (hindi pa nasusuri)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pahinang may mataas na uri (kalidad)]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tingnan ang balangkas]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pahinang may mataas na uri]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tingnan ang balangkas]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pahinang may mataas na uri]]'''",
	'revreview-quick-see-basic' => "'''Balangkas''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} tingnan ang pahina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} paghambingin])",
	'revreview-quick-see-quality' => "'''Balangkas''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} tingnan ang pahina]]
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
	'revreview-successful' => "'''Matagumpay na ang pagbabandila (pagtatatak) sa pagbabago ng [[:$1|$1]]. ([{{fullurl:Special:Stableversions|page=$2}} tingnan ang matatatag na mga bersyon])'''",
	'revreview-successful2' => "'''Matagumpay ang pagtatanggal ng bandila (pagaalis ng tatak) sa pagbabago ng [[:$1|$1]].'''",
	'revreview-text' => "''Ang [[{{MediaWiki:Validationpage}}|matatatag na mga bersyon]] ay ang likas na nakatakdang mga pahina ng nilalaman para sa mga tumatanaw sa halip na ang pinakabagong pagbabago.''",
	'revreview-text2' => "''Ang [[{{MediaWiki:Validationpage}}|matatatag na mga bersyon]] ay nasuring mga pagbabago ng mga pahina at maaaring itakda bilang likas na nakatakdang nilalaman para sa mga tumatanaw.''",
	'revreview-toggle' => '(+/-)',
	'revreview-toggle-title' => 'ipakita/itago ang mga detalye',
	'revreview-toolow' => 'Dapat mong bigyan ng antas ang bawat isang katangiang nasa ibaba na mas mataas kaysa "hindi pinayagan" upang maisaalang-alang na masuring muli ang pagbabago.
Upang mapababa ang halaga (antas) isang pagbabago, itakda ang lahat ng mga kahanayan bilang "hindi pinayagan".',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Pakisuri]] ang anumang mga pagbabagong ''(ipinapakita sa ibaba)'' ginawa magmula noong [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] ang matatag na pagbabago.<br />
'''Naisapanahon na ang ilang mga suleras/larawan:'''",
	'revreview-update-includes' => "'''Naisapanahon na ang ilang mga suleras/larawan:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Pakisuri]] ang anumang mga pagbabagong ''(ipinapakita sa ibaba)'' ginawa magmula noong [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} pinayagan] ang pagbabagong pangtabla.",
	'revreview-update-use' => "'''PAUNAWA:''' Kapag mayroong isang matatag na bersyon na ang anuman sa mga suleras/mga larawang ito, ginagamit na ito samakatuwid sa isang matatag na bersyon ng pahinang ito.",
	'revreview-diffonly' => "''Para suriing muli ang pahina, pindutin ang kawing sa pagbabagong \"pangkasalukuyang pagbabago\" at gamitin ang pormularyong pampagsusuri.''",
	'revreview-visibility' => "'''Ang pahinang ito ay may isang naisapanahon nang [[{{MediaWiki:Validationpage}}|matatag na bersyon]]; [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} maisasaayos] ang mga pagtatakdang pangkatatagan ng pahina.'''",
	'revreview-visibility2' => "'''Ang pahinang ito ay walang naisapanahong [[{{MediaWiki:Validationpage}}|matatag na bersyon]]; 
ang mga katakdaang pangkatatagan ng pahina ay maaaring [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} isaayos].'''",
	'revreview-revnotfound' => 'Hindi matagpuan ang hinihingi mong lumang pagbabago ng pahina.
Pakisuri ang URL na ginamit para mapuntahan ang pahinang ito.',
	'right-autopatrolother' => 'Kusang tatakan ang mga pagbabagong nasa hindi pangunahing mga espasyo ng pangalan bilang napatrolya na',
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
	'readerfeedback' => 'Ano ba ang tingin mo sa pahinang ito?',
	'readerfeedback-text' => "''Magbigay lamang po sana ng panahon upang makapagbigay sa ibaba ng kaantasan para sa pahinang ito.  Mahalaga ang iyong pagbibigay ng puna at nakatutulong sa amin upang lalo pang mapainam ang websayt namin.''",
	'readerfeedback-reliability' => 'Antas na pagiging katiwatiwala',
	'readerfeedback-completeness' => 'Pagiging walang kakulangan',
	'readerfeedback-npov' => 'Kawalan ng pinapanigan',
	'readerfeedback-presentation' => 'Anyo ng paghahain (presentasyon)',
	'readerfeedback-overall' => 'Pangkalahatan',
	'readerfeedback-level-none' => '(hindi nakatitiyak)',
	'readerfeedback-level-0' => 'Mababa ang uri',
	'readerfeedback-level-1' => 'Mababa',
	'readerfeedback-level-2' => 'Patas',
	'readerfeedback-level-3' => 'Mataas',
	'readerfeedback-level-4' => 'Mahusay',
	'readerfeedback-submit' => 'Ipasa',
	'readerfeedback-main' => 'Tanging mga pahina ng nilalaman lamang ang mabibigyan ng kaantasan.',
	'readerfeedback-success' => "'''Salamat sa muling pagsuri ng pahinang ito!''' ([$3 Mga puna o mga katanungan?]).",
	'readerfeedback-voted' => "'''Tila parang nabigyan mo na ng antas ang pahinang ito''' ([$3 Mga puna o mga katanungan?]).",
	'readerfeedback-submitting' => 'Ipinapasa na...',
	'readerfeedback-finished' => 'Salamat sa iyo!',
	'revreview-filter-all' => 'Lahat',
	'revreview-filter-approved' => 'Pinayagan',
	'revreview-filter-reapproved' => 'Muling pinayagan',
	'revreview-filter-unapproved' => 'Hindi pinayagan',
	'revreview-filter-auto' => 'Kusa (awtomatiko)',
	'revreview-filter-manual' => 'Kinakamay (manwal)',
	'revreview-filter-level-0' => 'Mga bersyong namataan na',
	'revreview-filter-level-1' => 'Mga bersyong may mataas na uri (kalidad)',
	'revreview-statusfilter' => 'Kalagayan:',
	'revreview-typefilter' => 'Uri (tipo):',
	'revreview-tagfilter' => 'Tatak:',
	'revreview-reviewlink' => 'suriing muli',
	'tooltip-ca-current' => 'Tingnan ang pangkasalukuyang balangkas ng pahinang ito',
	'tooltip-ca-stable' => 'Tingnan ang matatag na bersyon ng pahinang ito',
	'tooltip-ca-default' => 'Katakdaan ng pagtitiyak ng pagkakaroon ng mataas na uri (kalidad)',
	'tooltip-ca-ratinghist' => 'Mga pagsusukat ng mambabasa para sa pahinang ito',
	'revreview-locked' => 'Dapat na sinusuri munang muli ang mga pagbabago bago palitawin sa pahinang ito!',
	'revreview-unlocked' => 'Hindi nangangailangan ng muling pagsusuri ang mga pagbabago bago palitawin sa pahinang ito!',
	'accesskey-ca-current' => 'v',
	'accesskey-ca-stable' => 'c',
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
	'flaggedrevs-backlog' => "Şu anda [[Special:OldReviewedPages|eski gözden geçirilmiş sayfalar]]da birikmiş iş yükü var. '''İlginiz gerekiyor!'''",
	'flaggedrevs-desc' => 'Editörlere ve gözden geçirenlere, değişiklikleri doğrulama ve sayfaları kararlı hale getirme yeteneği verir',
	'flaggedrevs-pref-UI-0' => 'Kararlı sürüm detaylı kullanıcı arayüzünü kullan',
	'flaggedrevs-pref-UI-1' => 'Kararlı sürüm basit kullanıcı arayüzünü kullan',
	'flaggedrevs-prefs' => 'Kararlılık',
	'flaggedrevs-prefs-stable' => 'Her zaman varsayılan olarak içerik sayfalarının kararlı sürümünü göster (eğer varsa)',
	'flaggedrevs-prefs-watch' => 'İncelediğim sayfaları izleme listeme ekle',
	'group-editor' => 'Editörler',
	'group-editor-member' => 'editör',
	'group-reviewer' => 'Eleştirmenler',
	'group-reviewer-member' => 'eleştirmen',
	'grouppage-editor' => '{{ns:project}}:Editör',
	'grouppage-reviewer' => '{{ns:project}}:Eleştirmen',
	'hist-draft' => 'taslak revizyonu',
	'hist-quality' => 'kalite revizyon',
	'hist-quality-user' => '[[User:$3|$3]] tarafından [{{fullurl:$1|stableid=$2}} doğrulandı]',
	'hist-stable' => 'gözlenmiş revizyon',
	'hist-stable-user' => '[[User:$3|$3]] tarafından [{{fullurl:$1|stableid=$2}} gözlendi]',
	'review-diff2stable' => 'Kararlı ve güncel revizyonlar arasındaki değişiklikleri göster',
	'review-logentry-app' => '[[$1]] gözden geçirildi',
	'review-logentry-id' => 'revizyon ID $1',
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
	'revreview-basic' => 'Bu en son [[{{MediaWiki:Validationpage}}|gözlenmiş]] revizyondur, <i>$2</i> tarihinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Taslağın] gözden geçirilmeyi bekleyen [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|değişikliği|değişikliği}}] bulunmaktadır.',
	'revreview-basic-i' => 'Bu en son [[{{MediaWiki:Validationpage}}|gözlenmiş]] revizyondur, <i>$2</i> tarihinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Taslağın] gözden geçirilmeyi bekleyen [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} şablon/resim değişikliği] bulunmaktadır.',
	'revreview-basic-old' => 'Bu bir [[{{MediaWiki:Validationpage}}|gözlenmiş]] revizyondur ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} hepsini listele]), <i>$2</i> tarihinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].
Yeni [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} değişiklikler] yapılmış olabilir.',
	'revreview-basic-same' => 'Bu en son [[{{MediaWiki:Validationpage}}|gözlenmiş]] revizyondur ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} hepsini listele]), <i>$2</i> tarihinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} onaylanmıştır].',
	'revreview-basic-source' => 'Bu sayfanın [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} gözlenmiş bir sürümü], <i>$2</i> tarihinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} onaylanmış], bu revizyondan baz alınmıştır.',
	'revreview-changed' => "'''İstenen işlem [[:$1|$1]] sayfasının bu revizyonunda uygulanamıyor.'''

Belirli sürüm belirlenmeden, bir şablon veya resim istenmiş olabilir.
Bunun sebebi, dinamik bir şablonun, sizin gözden geçirmeye başlamanızdan sonra değişen bir değişkene bağımlı başka bir resim veya şablonu çapraz olarak içermesi olabilir.
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
	'revreview-log' => 'Açıklama:',
	'revreview-stable' => 'Sabit sayfa',
	'revreview-style' => 'Okunaklılık',
	'revreview-style-1' => 'Geçerli',
	'revreview-style-2' => 'İyi',
	'revreview-revnotfound' => "İstemiş olduğunuz sayfanın eski versiyonu bulunamadı. Lütfen bu sayfaya erişmekte kullandığınız URL'yi kontrol edin.",
	'readerfeedback-finished' => 'Teşekkürler!',
	'revreview-filter-all' => 'Hepsi',
	'tooltip-ca-default' => 'Kalite güvencesi ayarlar',
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
	'flaggedrevs-prefs' => 'Стабільні версії',
	'flaggedrevs-prefs-stable' => 'Завжди показувати за замовчуванням стабільну версію (якщо така є)',
	'flaggedrevs-prefs-watch' => 'Додавати перевірені мною сторінки до списку спостереження',
	'group-editor' => 'Редактори',
	'group-editor-member' => 'редактор',
	'group-reviewer' => 'Рецензенти',
	'group-reviewer-member' => 'рецензент',
	'grouppage-editor' => '{{ns:project}}:Редактори',
	'grouppage-reviewer' => '{{ns:project}}:Рецензенти',
	'hist-draft' => 'чорнова версія',
	'hist-quality' => 'якісна версія',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} вивірена] користувачем [[User:$3|$3]]',
	'hist-stable' => 'переглянута версія',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} переглянута] користувачем [[User:$3|$3]]',
	'review-diff2stable' => 'Показати відмінності між стабільною і поточною версіями',
	'review-logentry-app' => 'перевірена [[$1]]',
	'review-logentry-dis' => 'застаріла версія [[$1]]',
	'review-logentry-id' => 'ідентифікатор версії $1',
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
	'revreview-basic' => 'Це остання [[{{MediaWiki:Validationpage}}|переглянута]] версія; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|редагування|редагування|редагувань}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетки] {{PLURAL:$3|очікує|очікують|очікують}} перевірки.',
	'revreview-basic-i' => 'Це остання [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} переглянута] версія; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
У [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетці] є [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} зміни в шаблонах або зображеннях], що потребують перевірки.',
	'revreview-basic-old' => 'Це [[{{MediaWiki:Validationpage}}|переглянута]] версія ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список усіх]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
Могли бути зроблені нові [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} редагування].',
	'revreview-basic-same' => 'Це остання [[{{MediaWiki:Validationpage}}|переглянута]] версія ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список усіх]); [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.',
	'revreview-basic-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Переглянута версія] цієї сторінки, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>, базується на цій версії.',
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Остання переглянута версія] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список усіх]) була [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|редагування|редагування|редагувань}}] {{PLURAL:$3|потребує|потребують|потребують}} перевірки.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Остання переглянута версія] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список усіх]);  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
Потрібна перевірка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} змін у шаблонах або зображеннях].',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Остання якісна версія] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список усіх]) була [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|редагування|редагування|редагувань}}] {{PLURAL:$3|потребує|потребують|потребують}} перевірки.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Остання якісна версія] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список усіх]);  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
Потрібна перевірка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} змін у шаблонах та зображеннях].',
	'revreview-noflagged' => "Ця сторінка не має перевірених версій, імовірно, її якість '''не''' [[{{MediaWiki:Validationpage}}|оцінювалася]].",
	'revreview-note' => '[[Користувач:$1|$1]] зробив наступний коментар, [[{{MediaWiki:Validationpage}}|перевіряючи]] цю версію:',
	'revreview-notes' => 'Спостереження і коментарі для показу:',
	'revreview-oldrating' => 'Була оцінена:',
	'revreview-patrol' => 'Позначити цю зміну як перевірену',
	'revreview-patrol-title' => 'Позначена як патрульована',
	'revreview-patrolled' => 'Обрана версія [[:$1|$1]] була позначена як патрульована.',
	'revreview-quality' => 'Це остання [[{{MediaWiki:Validationpage}}|якісна]] версія; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|редагування|редагування|редагувань}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетки] {{PLURAL:$3|очікує|очікують|очікують}} перевірки.',
	'revreview-quality-i' => 'Це остання [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} якісна] версія; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
У [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетці] є [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} зміни в шаблонах та зображеннях], що потребують перевірки.',
	'revreview-quality-old' => 'Це [[{{MediaWiki:Validationpage}}|якісна]] версія ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список усіх]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
Могли бути зроблені нові [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} редагування].',
	'revreview-quality-same' => 'Це остання [[{{MediaWiki:Validationpage}}|якісна]] версія ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список усіх]); [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.',
	'revreview-quality-source' => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Якісна версія] цієї сторінки, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>, базується на цій версії.',
	'revreview-quality-title' => 'Якісна сторінка',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Переглянута сторінка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показати чернетку]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Переглянута сторінка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показати чернетку]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Переглянута сторінка]]'''",
	'revreview-quick-invalid' => "'''Помилковий ідентифікатор версії сторінки'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Поточна версія]]''' (не перевірялась)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Якісна сторінка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показати чернетку]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Якісна сторінка]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показати чернетку]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Якісна сторінка]]'''",
	'revreview-quick-see-basic' => "'''Чернетка''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показати сторінку]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} порівняти])",
	'revreview-quick-see-quality' => "'''Чернетка''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показати сторінку]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} порівняти])",
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
	'revreview-successful' => "'''Обрана версія [[:$1|$1]] успішно позначена. ([{{fullurl:Special:Stableversions|page=$2}} перегляд усіх стабільних версій])'''",
	'revreview-successful2' => "'''Із обраної версії [[:$1|$1]] успішно знята позначка.'''",
	'revreview-text' => "''За замовчуванням установлений показ [[{{MediaWiki:Validationpage}}|стабільних версій]] сторінок, а не найбільш нових.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Стабільні версії]] — це перевірені версії сторінок, можуть бути встановлені для показу за замовчуванням.''",
	'revreview-toggle' => '(+/-)',
	'revreview-toggle-title' => 'показати/приховати подробиці',
	'revreview-toolow' => 'Вам слід зазначити для всіх значень рівень, вищий, ніж «не зазначена», щоб версія сторінки вважалася перевіреною.
Щоб зняти позначку перевіреної версії, встановіть усі значення в «не зазначена».',
	'revreview-update' => "Будь ласка, [[{{MediaWiki:Validationpage}}|перевірте]] редагування ''(показані нижче)'', зроблені після [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірки] стабільної версії.<br />
'''Деякі шаблони або зображення могли бути оновлені:'''",
	'revreview-update-includes' => "'''Деякі шаблони або зображення були оновлені:'''",
	'revreview-update-none' => "Будь ласка, [[{{MediaWiki:Validationpage}}|перевірте]] редагування ''(показані нижче)'', зроблені після [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} установки] стабільної версії.",
	'revreview-update-use' => "'''ЗАУВАЖЕННЯ.''' Якщо якийсь із цих шаблонів або зображень має стабільну версію, то вона вже використовується у стабільній версії цієї сторінки.",
	'revreview-diffonly' => "''Щоб перевірити сторінку, натисніть на посилання «поточна версія» і використовуйте форму перевірки.''",
	'revreview-visibility' => "'''Ця сторінка має [[{{MediaWiki:Validationpage}}|стабільну версію]], яка може бути [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} налаштована].'''",
	'revreview-visibility2' => "'''Ця сторінка не має оновленої [[{{MediaWiki:Validationpage}}|стабільної версії]]; налаштування стабілізації сторінки можуть бути [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} змінені].'''",
	'revreview-revnotfound' => 'Неможливо знайти необхідну вам версію статті.
Будь-ласка, перевірте правильність посилання, яке ви використовували для доступу до цієї статті.',
	'right-autopatrolother' => 'Автоматичне позначення версій сторінок у неосновному просторі назв патрульованими',
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
	'readerfeedback' => 'Що ви думаєте про цю сторінку?',
	'readerfeedback-text' => "''Будь ласка, дайте оцінку цій сторінці нижче. Ваші відгуки дуже цінні для нас, вони допомагають нам працювати над покращенням сайту.''",
	'readerfeedback-reliability' => 'Достовірність',
	'readerfeedback-completeness' => 'Повнота',
	'readerfeedback-npov' => 'Нейтральність',
	'readerfeedback-presentation' => 'Подання матеріалу',
	'readerfeedback-overall' => 'Загальна оцінка',
	'readerfeedback-level-none' => '(оберіть)',
	'readerfeedback-level-0' => 'Погана',
	'readerfeedback-level-1' => 'Низька',
	'readerfeedback-level-2' => 'Середня',
	'readerfeedback-level-3' => 'Висока',
	'readerfeedback-level-4' => 'Відмінна',
	'readerfeedback-submit' => 'Надіслати',
	'readerfeedback-main' => 'Можуть бути оцінені тільки сторінки основного простору.',
	'readerfeedback-success' => "'''Дякуємо за оцінку цієї сторінки!''' ([$3 Є коментарі чи запитання?]).",
	'readerfeedback-voted' => "'''Схоже, ви вже оцінювали цю сторінку.''' ([$3 Є коментарі чи запитання?]).",
	'readerfeedback-submitting' => 'Надсилання…',
	'readerfeedback-finished' => 'Дякуємо!',
	'revreview-filter-all' => 'Усі',
	'revreview-filter-approved' => 'Перевірені',
	'revreview-filter-reapproved' => 'Повторно перевірені',
	'revreview-filter-unapproved' => 'Неперевірені',
	'revreview-filter-auto' => 'Автоматично',
	'revreview-filter-manual' => 'Уручну',
	'revreview-filter-level-0' => 'Переглянуті версії',
	'revreview-filter-level-1' => 'Якісні версії',
	'revreview-statusfilter' => 'Стан:',
	'revreview-typefilter' => 'Тип:',
	'revreview-tagfilter' => 'Мітка:',
	'revreview-reviewlink' => 'перевірити',
	'tooltip-ca-current' => 'Переглянути поточну чернетку цієї сторінки',
	'tooltip-ca-stable' => 'Показати стабільну версію цієї сторінки',
	'tooltip-ca-default' => 'Налаштування контролю якості',
	'tooltip-ca-ratinghist' => 'Читацька оцінка цієї сторінки',
	'revreview-locked' => 'Редагування мають бути перевірені перед тим, як будуть показані на цій сторінці!',
	'revreview-unlocked' => 'Редагування не вимагають попередньої перевірки для відображення на цій сторінці!',
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
	'flaggedrevs-backlog' => "Ghe xe del laoro aretrato da far su le [[Special:OldReviewedPages|pagine riesaminà tenpo adrìo]]. '''Ghe xe bisogno de la to atension!'''",
	'flaggedrevs-desc' => 'I contribudori e i revisori i pode controlar le revision e stabilizar le pagine',
	'flaggedrevs-pref-UI-0' => "Dòpara l'interfacia utente de la version stabile detaglià",
	'flaggedrevs-pref-UI-1' => "Dòpara l'interfacia utente de la version stabile sénpliçe",
	'flaggedrevs-prefs' => 'Stabilità',
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
	'review-logentry-app' => 'riesaminà [[$1]]',
	'review-logentry-dis' => 'gà sbassà de livèl na version de [[$1]]',
	'review-logentry-id' => 'Nùmaro de revision $1',
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
	'revreview-basic' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|rivardà]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la gà [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] che speta de vegner esaminà.",
	'revreview-basic-i' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|rivardà]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la gà [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template e/o imagini] che speta de vegner esaminà.",
	'revreview-basic-old' => "Sta qua la xe na version [[{{MediaWiki:Validationpage}}|rivardà]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Po' darse che sia stà fati [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canbiamenti novi].",
	'revreview-basic-same' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|rivardà]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.",
	'revreview-basic-source' => 'Na [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version rivardà] de sta pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>, le xe stà basà su sta version.',
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
	'revreview-newest-basic' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version rivardà] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|la|le}} gà da vegner esaminà.",
	'revreview-newest-basic-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version rivardà] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Ghe xe dei [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canbiamenti a template e/o imagini] che speta de vegner esaminà.",
	'revreview-newest-quality' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version de qualità] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|la|le}} gà da èssar esaminà.",
	'revreview-newest-quality-i' => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version de qualità] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Ghe xe dele [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template e/o imagine] che speta de vegner esaminà.",
	'revreview-noflagged' => "No ghe xe version riesaminà de sta voçe, quindi podarìa '''no''' èssar stà [[{{MediaWiki:Validationpage}}|controlà]] la so qualità.",
	'revreview-note' => '[[User:$1|$1]] el gà fato le seguenti anotassion [[{{MediaWiki:Validationpage}}|riesaminando]] sta version:',
	'revreview-notes' => 'Osservassioni o note da far védar:',
	'revreview-oldrating' => 'La xe stà giudicà:',
	'revreview-patrol' => 'Segna sta modifica come ricontrolà',
	'revreview-patrol-title' => 'Segna come patuglià',
	'revreview-patrolled' => 'La version de [[:$1|$1]] selessionà la xe stà marcada come controlà.',
	'revreview-quality' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|de qualità]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la gà [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|modifica|modifiche}}] che speta de vegner esaminà.",
	'revreview-quality-i' => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|de qualità]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la presenta dele [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} modifiche a template e/o imagini] che speta de vegner esaminà.",
	'revreview-quality-old' => 'Sta qua la xe na version [[{{MediaWiki:Validationpage}}|de qualità]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Xe stà fato dei [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} canbiamenti] novi.',
	'revreview-quality-same' => "Sta qua la xe l'ultima revision [[{{MediaWiki:Validationpage}}|de qualità]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.",
	'revreview-quality-source' => 'Na [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualità] de sta pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>, la xe basà su sta revision.',
	'revreview-quality-title' => 'Pàxena de qualità',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Pàxena rivardà]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Pàxena rivardà]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Pàxena rivardà]]'''",
	'revreview-quick-invalid' => "'''Nùmaro de revision mìa valido'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Version atuale]]''' (non riesaminà)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualità]]'''",
	'revreview-quick-see-basic' => "'''Bozza''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} varda la pagina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} confronta])",
	'revreview-quick-see-quality' => "'''Bozza''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} varda la pagina]]
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
	'revreview-successful' => "'''La revision de [[:$1|$1]] la xe stà verificà. ([{{fullurl:Special:Stableversions|page=$2}} varda tute le version stabili])'''",
	'revreview-successful2' => "'''Cavà el contrassegno a la version selessionà de [[:$1|$1]].'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Le versioni stabili]] le xe el contenuto predefinìo par i visitatori, al posto de la version pi reçente.''",
	'revreview-text2' => "''Le [[{{MediaWiki:Validationpage}}|version stabili]] le xe revisioni de pagine che xe stà controlà e che pode vegner mostrà come contenuto predefinìo par i visitatori.''",
	'revreview-toggle-title' => 'mostra/scondi detagli',
	'revreview-toolow' => 'Ti gà da segnar ognuno dei atributi qua soto piessè alto de "Non aprovà" perché la version la sia considerà riesaminà.
Par declassar na version, segna tuti i canpi come "Non aprovà".',
	'revreview-update' => "Par piaser [[{{MediaWiki:Validationpage}}|esamina]] tuti i canbiamenti ''(mostra qua soto)'' fati da quando la version stabile la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà].<br />
'''Alcuni template e/o imagini i xe stà canbià:'''",
	'revreview-update-includes' => "'''Alcuni template o imagini le xe stà agiornà:'''",
	'revreview-update-none' => "Par piaser [[{{MediaWiki:Validationpage}}|esamina]] tuti i canbiamenti ''(mostra qua soto)'' fati da quando la version stabile la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà].",
	'revreview-update-use' => "'''OCIO:''' Se qualchedun de sti template o imagini el gà na version stabile, alora el xe xà doparà in te la version stabile de sta pagina.",
	'revreview-diffonly' => "''Par riesaminar la pagine, struca el colegamento \"revision corente\" e dòpara el modulo de riesame.''",
	'revreview-visibility' => "'''Sta pagina la gà na [[{{MediaWiki:Validationpage}}|version stabile]] ajornà; le inpostassion de stabilità de pàxena le pol èssar [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configuràe].'''",
	'revreview-revnotfound' => "La version richiesta de ła pàxena no la xè mìa stà catà.
Verifica l'URL che te doparà par açedere a sta pàxena.",
	'right-autopatrolother' => 'Marca automaticamente le revision come controlà in namespace diversi da quel prinçipal',
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
	'tooltip-ca-current' => 'Varda la bozza corente de sta pagina',
	'tooltip-ca-stable' => 'Varda la version stabile de sta pagina',
	'tooltip-ca-default' => 'Inpostassion par el controlo de qualità',
	'validationpage' => '{{ns:help}}:Validassion dele pàxene',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'editor' => 'Chủ bút',
	'flaggedrevs' => 'Các bản được đánh dấu',
	'flaggedrevs-backlog' => "Hiện có một nhật trình tại [[Special:OldReviewedPages|Các trang đã duyệt nhưng lạc hậu]]. '''Cần bạn chú ý!'''",
	'flaggedrevs-desc' => 'Cung cấp cho người viết và người duyệt bài khả năng phê chuẩn phiên bản và ổn định trang',
	'flaggedrevs-pref-UI-0' => 'Sử dụng giao diện người dùng phiên bản ổn định chi tiết',
	'flaggedrevs-pref-UI-1' => 'Sử dụng giao diện người dùng phiên bản ổn định đơn giản',
	'flaggedrevs-prefs' => 'Tính ổn định',
	'flaggedrevs-prefs-stable' => 'Luôn hiển thị bản nội dung ổn định của trang theo mặc định (nếu có)',
	'flaggedrevs-prefs-watch' => 'Thêm trang tôi duyệt vào danh sách theo dõi',
	'group-editor' => 'Người viêt bài',
	'group-editor-member' => 'chủ bút',
	'group-reviewer' => 'Người duyệt bài',
	'group-reviewer-member' => 'Người duyệt bài',
	'grouppage-editor' => '{{ns:project}}:Người viết bài',
	'grouppage-reviewer' => '{{ns:project}}:Người duyệt bài',
	'hist-draft' => 'phiên bản nháp',
	'hist-quality' => 'bản chất lượng cao',
	'hist-quality-user' => '[[User:$3|$3]] [{{fullurl:$1|stableid=$2}} đã phê chuẩn]',
	'hist-stable' => 'bản đã xem qua',
	'hist-stable-user' => '[[User:$3|$3]] [{{fullurl:$1|stableid=$2}} đã xem qua]',
	'review-diff2stable' => 'So sánh phiên bản ổn định với bản hiện hành',
	'review-logentry-app' => 'đã duyệt [[$1]]',
	'review-logentry-dis' => 'đã đánh giá thấp hơn cho một phiên bản của [[$1]]',
	'review-logentry-id' => 'phiên bản mã số $1',
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
	'revreview-basic' => 'Đây là bản [[{{MediaWiki:Validationpage}}|đã xem qua]] mới nhất, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản phác thảo] có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] chờ duyệt.',
	'revreview-basic-i' => 'Đây là phiên bản [[{{MediaWiki:Validationpage}}|được xem qua]] mới nhất, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản nháp] có các [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} thay đổi tiêu bản/hình ảnh] đang chờ được duyệt.',
	'revreview-basic-old' => 'Đây là một bản [[{{MediaWiki:Validationpage}}|đã xem qua]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tất cả]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
Đã có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} những sửa đổi] mới.',
	'revreview-basic-same' => 'Đây là bản [[{{MediaWiki:Validationpage}}|đã xem qua]] mới nhất ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} xem tất cả]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.',
	'revreview-basic-source' => 'Một [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bản đã xem qua] của trang này, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>, 
khác với bản này.',
	'revreview-changed' => "'''Không thể thực hiện tác vụ yêu cầu đối với phiên bản này của [[:$1|$1]].'''

Một tiêu bản hoặc hình ảnh có thể được yêu cầu mà chưa chỉ định phiên bản cụ thể.
Điều này có thể xảy ra nếu một tiêu bản động nhúng một hình hoặc tiêu bản khác phụ thuộc vào một biến, biến đó đã thay đổi từ khi bạn bắt đầu duyệt trang này.
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
	'revreview-newest-basic' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Bản đã xem qua mới nhất] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tất cả]) đã được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] {{PLURAL:$3|cần|cần}} duyệt.',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Phiên bản được xem qua cuối cùng] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} xem tất cả]) được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Thay đổi tiêu bản/hình ảnh] cần duyệt.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Bản chất lượng mới nhất] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tất cả]) được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] {{PLURAL:$3|cần|cần}} duyệt.',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Bản chất lượng mới nhất] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} xem tất cả]) đã được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} Thay đổi tiêu bản/hình ảnh] cần duyệt qua.',
	'revreview-noflagged' => "Không tìm thấy bản đã được duyệt của trang, do đó có thể nó '''chưa''' được [[{{MediaWiki:Validationpage}}|kiểm tra]] chất lượng.",
	'revreview-note' => '[[User:$1|$1]] đã ghi chú như sau khi [[{{MediaWiki:Validationpage}}|duyệt]] bản này:',
	'revreview-notes' => 'Nhận xét hoặc ghi chú sẽ hiển thị:',
	'revreview-oldrating' => 'Được xếp hạng:',
	'revreview-patrol' => 'Đánh dấu tuần tra sửa đổi này',
	'revreview-patrol-title' => 'Đánh dấu đã tuần tra',
	'revreview-patrolled' => 'Bản được chọn của [[:$1|$1]] đã được đánh dấu đã tuần tra.',
	'revreview-quality' => 'Đây là bản [[{{MediaWiki:Validationpage}}|chất lượng]] mới nhất, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản phác thảo] có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] chờ duyệt.',
	'revreview-quality-i' => 'Đây là phiên bản [[{{MediaWiki:Validationpage}}|chất lượng]] mới nhất, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản nháp] có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} thay đổi tiêu bản/hình ảnh] chờ được duyệt.',
	'revreview-quality-old' => 'Đây là một bản [[{{MediaWiki:Validationpage}}|chất lượng]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tất cả]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
Có thể đã có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} những sửa đổi] mới.',
	'revreview-quality-same' => 'Đây là bản [[{{MediaWiki:Validationpage}}|chất lượng]] mới nhất ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} xem tất cả]),
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.',
	'revreview-quality-source' => 'Một [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bản chất lượng] của trang này, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>, khác với bản này.',
	'revreview-quality-title' => 'Trang chất lượng',
	'revreview-quick-basic' => "'''[[{{MediaWiki:Validationpage}}|Trang đã xem qua]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-basic-old' => "'''[[{{MediaWiki:Validationpage}}|Trang đã xem qua]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-basic-same' => "'''[[{{MediaWiki:Validationpage}}|Trang đã xem qua]]'''",
	'revreview-quick-invalid' => "'''ID phiên bản không hợp lệ'''",
	'revreview-quick-none' => "'''[[{{MediaWiki:Validationpage}}|Bản hiện hành]]''' (chưa duyệt)",
	'revreview-quick-quality' => "'''[[{{MediaWiki:Validationpage}}|Trang chất lượng]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-quality-old' => "'''[[{{MediaWiki:Validationpage}}|Trang chất lượng]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Trang chất lượng]]'''",
	'revreview-quick-see-basic' => "'''Trang nháp''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} xem trang]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} so sánh])",
	'revreview-quick-see-quality' => "'''Trang nháp''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} xem trang]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} so sánh])",
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
	'revreview-successful' => "'''Phiên bản của [[:$1|$1]] đã được gắn cờ. ([{{fullurl:Special:Stableversions|page=$2}} xem các phiên bản có cờ])'''",
	'revreview-successful2' => "'''Phiên bản của [[:$1|$1]] đã được bỏ cờ thành công.'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|Phiên bản ổn định]] là nội dung trang mặc định mà người dùng nhìn thấy chứ không phải phiên bản mới nhất.''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|Bản ổn định]] được kiểm tra phiên bản của trang và có thể thiết lập làm nội dung mặc định cho người xem.''",
	'revreview-toggle-title' => 'hiện/ẩn chi tiết',
	'revreview-toolow' => 'Ít nhất bạn phải xếp hạng mỗi thuộc tính dưới đây cao hơn "chưa phê chuẩn" để một phiên bản có thể được xem là được duyệt.
Để hạ cấp một phiên bản, hãy chọn tất cả các thuộc tính "chưa phê chuẩn".',
	'revreview-update' => "Xin hãy [[{{MediaWiki:Validationpage}}|duyệt]] bất kỳ thay đổi nào ''(xem ở dưới)'' đã được thực hiện từ khi bản ổn định được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn].<br />
'''Một số tiêu bản/hình ảnh được cập nhật:'''",
	'revreview-update-includes' => "'''Một số tiêu bản/hình ảnh được cập nhật:'''",
	'revreview-update-none' => "Xin hãy [[{{MediaWiki:Validationpage}}|duyệt]] bất kỳ thay đổi nào ''(xem ở dưới)'' đã được thực hiện từ khi bản ổn định được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn].",
	'revreview-update-use' => "'''GHI CHÚ:''' Nếu bất kỳ tiêu bản/hình ảnh nào có một phiên bản ổn định, nó đã được dùng trong phiên bản ổn định của trang này.",
	'revreview-diffonly' => "''Để duyệt trang, hãy nhấn chuột vào liên kết “phiên bản hiện hành” và điền vào biểu mẫu duyệt trang.''",
	'revreview-visibility' => "'''Trang này có một [[{{MediaWiki:Validationpage}}|bản ổn định]] đã được cập nhật; bạn có thể [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} cấu hình] thiết lập độ ổn định cho trang.'''",
	'revreview-visibility2' => "'''Trang này không có [[{{MediaWiki:Validationpage}}|phiên bản ổn định]] được cập nhật; có thể [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} thiết lập] sự ổn định của trang.'''",
	'revreview-revnotfound' => 'Không thấy phiên bản trước của trang này. Xin kiểm tra lại.',
	'right-autopatrolother' => 'Tự động đánh dấu phiên bản trong không gian tên không phải bài viết đã tuần tra',
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
	'readerfeedback' => 'Bạn nghĩ sao về trang này?',
	'readerfeedback-text' => "''Xin hãy để dành một chút thời gian để đánh giá trang này ở dưới. Chúng ta coi trọng ý kiến của bạn và dùng nó để cải tiến website này.''",
	'readerfeedback-reliability' => 'Đáng tin cậy',
	'readerfeedback-completeness' => 'Tính đầy đủ',
	'readerfeedback-npov' => 'Tính trung lập',
	'readerfeedback-presentation' => 'Cách trình bày',
	'readerfeedback-overall' => 'Nói chung',
	'readerfeedback-level-none' => '(không chắc)',
	'readerfeedback-level-0' => 'Tệ',
	'readerfeedback-level-1' => 'Dở',
	'readerfeedback-level-2' => 'Vừa',
	'readerfeedback-level-3' => 'Khá',
	'readerfeedback-level-4' => 'Tốt',
	'readerfeedback-submit' => 'Đệ trình',
	'readerfeedback-main' => 'Chỉ đánh giá được những trang nội dung.',
	'readerfeedback-success' => "'''Cám ơn bạn vì đã duyệt trang này!''' ([$3 Ghi chú hoặc câu hỏi?]).",
	'readerfeedback-voted' => "'''Dường như bạn đã xếp hạng trang này rồi''' ([$3 Ghi chú hoặc câu hỏi?]).",
	'readerfeedback-submitting' => 'Đang gửi…',
	'readerfeedback-finished' => 'Cám ơn!',
	'revreview-filter-all' => 'Tất cả',
	'revreview-filter-approved' => 'Được chấp nhận',
	'revreview-filter-reapproved' => 'Được chấp nhận lại',
	'revreview-filter-unapproved' => 'Chưa chấp nhận',
	'revreview-filter-auto' => 'Tự động',
	'revreview-filter-manual' => 'Bằng tay',
	'revreview-filter-level-0' => 'Các phiên bản đã xem qua',
	'revreview-filter-level-1' => 'Các phiên bản chất lượng',
	'revreview-statusfilter' => 'Trạng thái:',
	'revreview-typefilter' => 'Loại:',
	'revreview-tagfilter' => 'Thẻ:',
	'revreview-reviewlink' => 'duyệt',
	'tooltip-ca-current' => 'Xem bản phác thảo hiện hành của trang này',
	'tooltip-ca-stable' => 'Xem bản ổn định của trang này',
	'tooltip-ca-default' => 'Thiết lập về bảo đảm chất lượng',
	'tooltip-ca-ratinghist' => 'Các đánh giá của độc giả về trang này',
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
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon] tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Riget]
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
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lisedön valikis]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon]
tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|votükam|votükams}} $3] {{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Krüt lätik tefü kaliet]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lisedön valikis]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon]
tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} {{PLURAL:$3|votükam|votükams}} $3] {{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-noflagged' => "No dabinons fomams pekrütöl pada at; ba '''no''' [[{{MediaWiki:Validationpage}}|pekontrolon]] tefü kaliet.",
	'revreview-note' => '[[User:$1|$1]] äpenon küpetis sököl dü [[{{MediaWiki:Validationpage}}|krütam]] padafomama at:',
	'revreview-notes' => 'Küpets ad pajonön:',
	'revreview-oldrating' => 'Pädadilädon as:',
	'revreview-patrol' => 'Malön votükami at as pezepöl',
	'revreview-patrolled' => 'Fomam at pada: [[:$1|$1]] pefümükon.',
	'revreview-quality' => 'Is logoy [[{{MediaWiki:Validationpage}}|krüti lätik tefü kaliet]], kel
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon] tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Riget]
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
	'revreview-submit' => 'Sedön krüti',
	'revreview-text' => 'Fomams fümöfik - no fomams nulikün! - binons uts, kels pajonons, ven pad palogon.',
	'revreview-update' => "[[{{MediaWiki:Validationpage}}|Reidolös e krütolös]] votükamis valik ''(dono pejonölis)'', kels pedunons sis fomam fümöfik [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon].

'''Samafomots e/u magods aniks pekoräkons:'''",
	'revreview-update-none' => "[[{{MediaWiki:Validationpage}}|Reidolös e krütolös]] votükams valik ''(dono pajonölis)'', kels pedunons sis fomam fümöfik [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon].",
	'revreview-visibility' => 'Pad at labon [[{{MediaWiki:Validationpage}}|fomami fümöfik]], kela parametem kanon [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} pafümetön].',
	'revreview-revnotfound' => 'Padafomam büik fa ol peflagöl no petuvon. Kontrololös, begö! ladeti-URL, keli egebol ad logön padi at.',
	'rights-editor-revoke' => 'emoükon redakanastadi gebana: [[$1]]',
	'stable-logentry' => '„Fomam fümöfik“ pemögükon pro [[$1]]',
	'stable-logentry2' => 'Vagükön lisedi: „fomams fümöfik“ pro [[$1]]',
	'stable-logpage' => 'Jenotalised fomama fümöfik',
	'stable-logpagetext' => 'Is palisedons votükams parametas [[{{MediaWiki:Validationpage}}|fomama fümöfik]] padas ninädilabik.',
	'tooltip-ca-current' => 'Logön rigeti anuik pada at',
	'tooltip-ca-stable' => 'Logön fomami fümöfik pada at',
	'tooltip-ca-default' => 'Paramets tefü kalietitäxet',
	'validationpage' => '{{ns:help}}:Yegedikontrolam',
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
	'flaggedrevs-prefs' => '穩定度',
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
	響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]有[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]等緊去複審。',
	'revreview-basic-i' => '呢個係最後[[{{MediaWiki:Validationpage}}|視察過嘅]]修訂，
	響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]有[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 模/圖更改]等緊去複審。',
	'revreview-basic-old' => '呢個係最後[[{{MediaWiki:Validationpage}}|視察過嘅]]修訂（[{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]），
	響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	新[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 更改]可能會做咗。',
	'revreview-basic-same' => '呢個係最後[[{{MediaWiki:Validationpage}}|視察過嘅]]修訂（[{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]），
	響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。',
	'revreview-basic-source' => '一個[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} 視察版]嘅頁，響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]，基於呢次修訂。',
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
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要複審。',
	'revreview-newest-basic-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後視察過嘅修訂]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 模/圖更改]需要複審',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後有質素嘅修訂]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要複審。',
	'revreview-newest-quality-i' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後有質素嘅修訂]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $模/圖更改]需要複審。',
	'revreview-noflagged' => "呢一版無複審過嘅修訂，佢可能'''未'''[[{{MediaWiki:Validationpage}}|檢查]]質量。",
	'revreview-note' => '[[User:$1]]響呢次修訂度加咗下面嘅[[{{MediaWiki:Validationpage}}|複審]]註解:',
	'revreview-notes' => '要顯示嘅意見或註解:',
	'revreview-oldrating' => '曾經評定為:',
	'revreview-patrol' => '標示呢次更改做已巡查過嘅',
	'revreview-patrol-title' => '標示做已巡查過嘅',
	'revreview-patrolled' => '所選[[:$1|$1]]嘅修訂做已巡查過嘅。',
	'revreview-quality' => '呢個係最後[[{{MediaWiki:Validationpage}}|有質素嘅]]修訂，
	響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]有[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]等緊去複審。',
	'revreview-quality-i' => '呢個係最後[[{{MediaWiki:Validationpage}}|有質素嘅]]修訂，
	響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]有[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 模/圖更改]等緊去複審。',
	'revreview-quality-old' => '呢個係[[{{MediaWiki:Validationpage}}|有質素嘅]]修訂 ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部])，響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。
	新[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} 更改]可能會做咗。',
	'revreview-quality-same' => '呢個係最後[[{{MediaWiki:Validationpage}}|有質素嘅]]修訂（[{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]），
	響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。',
	'revreview-quality-source' => '一個[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} 有質素嘅]頁，響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]，基於呢次修訂。',
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
	'revreview-successful' => "'''[[:$1|$1]]所選擇嘅修訂已經成功噉加旗。 ([{{fullurl:Special:Stableversions|page=$2}} 去睇全部加旗版])'''",
	'revreview-successful2' => "'''[[:$1|$1]]所選擇嘅修訂已經成功噉減旗。'''",
	'revreview-text' => "''[[{{MediaWiki:Validationpage}}|穩定版]]會設定做一版睇嗰陣嘅預設內容，而唔係最新嘅修訂。''",
	'revreview-text2' => "''[[{{MediaWiki:Validationpage}}|穩定版]]會檢查一版嘅修訂同埋可以設定做觀者嘅預設內容。''",
	'revreview-toggle-title' => '顯示/隱藏細節',
	'revreview-toolow' => '你一定要最少將下面每一項嘅屬性評定高過"未批准"，去將一個修訂複審。
	要捨棄一個修訂，設定全部格做"未批准"。',
	'revreview-update' => '請複審自從響呢版嘅穩定版以來嘅任何更改 (響下面度顯示) 。模同圖亦可能同時更改。',
	'revreview-update-includes' => "'''有啲模/圖更新咗:'''",
	'revreview-update-none' => "請[[{{MediaWiki:Validationpage}}|複審]]任何嘅更改 ''(列示如下)'' 自從穩定修訂[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]後修改過嘅。",
	'revreview-update-use' => "'''留意:''' 如果任何嘅模/圖有穩定版，噉呢一版就已經用咗響穩定版度。",
	'revreview-diffonly' => "''去複審一版，撳 \"現時修訂\" 連結去用複審表格。''",
	'revreview-visibility' => "'''呢一版有一個[[{{MediaWiki:Validationpage}}|穩定版]]；佢嘅設定可以[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} 較]。'''",
	'revreview-revnotfound' => '呢版無你要搵嗰個版本喎。
唔該睇下條網址啱唔啱。',
	'right-autopatrolother' => '自動標示響非主空間名嘅修訂做已巡查嘅',
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

/** Classical Chinese (文言)
 * @author Itsmine
 */
$messages['zh-classical'] = array(
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
	'revreview-revnotfound' => '查無舊審，惠核網址。',
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
	'revreview-auto' => '(自动)',
	'revreview-auto-w' => "'''注意:''' 您现在是在稳定修订中作出更改，您的编辑将会自动被复审。
	您可以在保存前先预览一下。",
	'revreview-basic' => '这个是最后[[{{MediaWiki:Validationpage}}|视察过的]]修订，
	于<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 现时修订]
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
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 于<i>$2</i>曾经[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准过的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要复审。',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最后有质素的修订]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 于<i>$2</i>曾经[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准过的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要复审。',
	'revreview-noflagged' => "这一页没有复审过的修订，它可能'''未'''[[{{MediaWiki:Validationpage}}|检查]]质量。",
	'revreview-note' => '[[User:$1]]在这次修订中加入了以下的[[{{MediaWiki:Validationpage}}|复审]]注解:',
	'revreview-notes' => '要显示的意见或注解:',
	'revreview-oldrating' => '曾经评定为:',
	'revreview-quality' => '这个是最后[[{{MediaWiki:Validationpage}}|有质素的]]修订，
	于<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 现时修订]
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
	'revreview-update' => '请复审自从于这页的稳定版以来的任何更改 (在下面显示) 。模版和图像亦可能同时更改。',
	'revreview-revnotfound' => '您请求的更早版本的修订记录没有找到。
请检查您请求本页面用的 URL 是否正确。',
	'readerfeedback-submit' => '提交',
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
	'revreview-auto' => '(自動)',
	'revreview-auto-w' => "'''注意:''' 您現在是在穩定修訂中作出更改，您的編輯將會自動被複審。
	您可以在保存前先預覽一下。",
	'revreview-basic' => '這個是最後[[{{MediaWiki:Validationpage}}|視察過的]]修訂，
	於<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 現時修訂]
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
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 於<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要複審。',
	'revreview-newest-quality' => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後有質素的修訂]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 於<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&diffonly=0}} $3次更改]需要複審。',
	'revreview-noflagged' => "這一頁沒有複審過的修訂，它可能'''未'''[[{{MediaWiki:Validationpage}}|檢查]]質量。",
	'revreview-note' => '[[User:$1]]在這次修訂中加入了以下的[[{{MediaWiki:Validationpage}}|複審]]註解:',
	'revreview-notes' => '要顯示的意見或註解:',
	'revreview-oldrating' => '曾經評定為:',
	'revreview-quality' => '這個是最後[[{{MediaWiki:Validationpage}}|有質素的]]修訂，
	於<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 現時修訂]
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
	'revreview-update' => '請複審自從於這頁的穩定版以來的任何更改 (在下面顯示) 。模版和圖像亦可能同時更改。',
	'revreview-revnotfound' => '您請求的更早版本的修訂記錄沒有找到。
請檢查您請求本頁面用的URL是否正確。',
	'readerfeedback-submit' => '提交',
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

