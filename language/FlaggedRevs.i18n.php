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
	'editor' => 'Editor',
	'flaggedrevs' => 'Flagged Revisions',
	'flaggedrevs-backlog' => 'There is currently a backlog at [[Special:OldReviewedPages|Outdated reviewed pages]]. \'\'\'Your attention is needed!\'\'\'',
	'flaggedrevs-desc' => 'Gives editors and reviewers the ability to validate revisions and stabilize pages',
	'flaggedrevs-pref-UI-0' => 'Use detailed stable version user interface',
	'flaggedrevs-pref-UI-1' => 'Use simple stable version user interface',
	'flaggedrevs-prefs' => 'Stability',
	'flaggedrevs-prefs-stable' => 'Always show the stable version of content pages by default (if there is one)',
	'flaggedrevs-prefs-watch' => 'Add pages I review to my watchlist',
	'group-editor' => 'Editors',
	'group-editor-member' => 'Editor',
	'group-reviewer' => 'Reviewers',
	'group-reviewer-member' => 'Reviewer',
	'grouppage-editor' => '{{ns:project}}:Editor',
	'grouppage-reviewer' => '{{ns:project}}:Reviewer',
	'hist-draft' => 'draft revision',
	'hist-quality' => 'quality revision',
	'hist-quality-user' => '[{{fullurl:$1|stableid=$2}} validated] by [[User:$3|$3]]',
	'hist-stable' => 'sighted revision',
	'hist-stable-user' => '[{{fullurl:$1|stableid=$2}} sighted] by [[User:$3|$3]]',
	'review-diff2stable' => 'View changes between stable and current revisions',
	'review-logentry-app' => 'reviewed [[$1]]',
	'review-logentry-dis' => 'depreciated a version of [[$1]]',
	'review-logentry-id' => 'revision ID $1',
	'review-logentry-diff' => 'diff to stable',
	'review-logpage' => 'Review log',
	'review-logpagetext' => 'This is a log of changes to revisions\' [[{{MediaWiki:Validationpage}}|approval]] status for content pages.
	See the [[Special:ReviewedPages|reviewed pages list]] for a list of approved pages.',
	'reviewer' => 'Reviewer',
	'revisionreview' => 'Review revisions',
	'revreview-accuracy' => 'Accuracy',
	'revreview-accuracy-0' => 'Unapproved',
	'revreview-accuracy-1' => 'Sighted',
	'revreview-accuracy-2' => 'Accurate',
	'revreview-accuracy-3' => 'Well sourced',
	'revreview-accuracy-4' => 'Featured',
	'revreview-approved' => 'Approved',
	'revreview-auto' => '(automatic)',
	'revreview-auto-w' => 'You are editing the stable revision; changes will \'\'\'automatically be reviewed\'\'\'.',
	'revreview-auto-w-old' => 'You are editing a reviewed revision; changes will \'\'\'automatically be reviewed\'\'\'.',
	'revreview-basic' => 'This is the latest [[{{MediaWiki:Validationpage}}|sighted]] revision, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|change|changes}}] awaiting review.',
	'revreview-basic-i' => 'This is the latest [[{{MediaWiki:Validationpage}}|sighted]] revision, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} template/image changes] awaiting review.',
	'revreview-basic-old' => 'This is a [[{{MediaWiki:Validationpage}}|sighted]] revision ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
	New [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} changes] may have been made.',
	'revreview-basic-same' => 'This is the latest [[{{MediaWiki:Validationpage}}|sighted]] revision ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.',
	'revreview-basic-source' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} sighted version] of this page, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>, was based off this revision.',
	'revreview-changed' => '\'\'\'The requested action could not be performed on this revision of [[:$1|$1]].\'\'\'

A template or image may have been requested when no specific version was specified.
This can happen if a dynamic template transcludes another image or template depending on a variable that changed since you started reviewing this page.
Refreshing the page and rereviewing can solve this problem.',
	'revreview-current' => 'Draft',
	'revreview-depth' => 'Depth',
	'revreview-depth-0' => 'Unapproved',
	'revreview-depth-1' => 'Basic',
	'revreview-depth-2' => 'Moderate',
	'revreview-depth-3' => 'High',
	'revreview-depth-4' => 'Featured',
	'revreview-draft-title' => 'Draft article',
	'revreview-edit' => 'Edit draft',
	'revreview-edited' => '\'\'\'Edits will be incorporated into the [[{{MediaWiki:Validationpage}}|stable version]] once an established user reviews them.
The \'\'draft\'\' is shown below.\'\'\' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|change awaits|changes await}}] review.',
	'revreview-flag' => 'Review this revision',
	'revreview-invalid' => '\'\'\'Invalid target:\'\'\' no [[{{MediaWiki:Validationpage}}|reviewed]] revision corresponds to the given ID.',
	'revreview-legend' => 'Rate revision content',
	'revreview-log' => 'Comment:',
	'revreview-main' => 'You must select a particular revision from a content page in order to review.

See the [[Special:Unreviewedpages]] for a list of unreviewed pages.',
	'revreview-newest-basic' => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest sighted revision] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|change|changes}}] {{PLURAL:$3|needs|need}} review.',
	'revreview-newest-basic-i' => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest sighted revision] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Template/image changes] need review.',
	'revreview-newest-quality' => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest quality revision] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|change|changes}}] {{PLURAL:$3|needs|need}} review.',
	'revreview-newest-quality-i' => 'The [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} latest quality revision] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Template/image changes] need review.',
	'revreview-noflagged' => 'There are no reviewed revisions of this page, so it may \'\'\'not\'\'\' have been [[{{MediaWiki:Validationpage}}|checked]] for quality.',
	'revreview-note' => '[[User:$1]] made the following notes [[{{MediaWiki:Validationpage}}|reviewing]] this revision:',
	'revreview-notes' => 'Observations or notes to display:',
	'revreview-oldrating' => 'It was rated:',
	'revreview-patrol' => 'Mark this change as patrolled',
	'revreview-patrol-title' => 'Mark as patrolled',
	'revreview-patrolled' => 'The selected revision of [[:$1|$1]] has been marked as patrolled.',
	'revreview-quality' => 'This is the latest [[{{MediaWiki:Validationpage}}|quality]] revision, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|change|changes}}] awaiting review.',
	'revreview-quality-i' => 'This is the latest [[{{MediaWiki:Validationpage}}|quality]] revision, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
The [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draft] has [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} template/image changes] awaiting review.',
	'revreview-quality-old' => 'This is a [[{{MediaWiki:Validationpage}}|quality]]  revision ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.
	New [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} changes] may have been made.',
	'revreview-quality-same' => 'This is the latest [[{{MediaWiki:Validationpage}}|quality]] revision ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>.',
	'revreview-quality-source' => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} quality version] of this page, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved] on <i>$2</i>, was based off this revision.',
	'revreview-quality-title' => 'Quality article',
	'revreview-quick-basic' => '\'\'\'[[{{MediaWiki:Validationpage}}|Sighted article]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} view draft]]',
	'revreview-quick-basic-old' => '\'\'\'[[{{MediaWiki:Validationpage}}|Sighted article]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} view draft]]',
	'revreview-quick-basic-same' => '\'\'\'[[{{MediaWiki:Validationpage}}|Sighted article]]\'\'\'',
	'revreview-quick-invalid' => '\'\'\'Invalid revision ID\'\'\'',
	'revreview-quick-none' => '\'\'\'[[{{MediaWiki:Validationpage}}|Current revision]]\'\'\' (unreviewed)',
	'revreview-quick-quality' => '\'\'\'[[{{MediaWiki:Validationpage}}|Quality article]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} view draft]]',
	'revreview-quick-quality-old' => '\'\'\'[[{{MediaWiki:Validationpage}}|Quality article]]\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} view draft]]',
	'revreview-quick-quality-same' => '\'\'\'[[{{MediaWiki:Validationpage}}|Quality article]]\'\'\'',
	'revreview-quick-see-basic' => '\'\'\'Draft\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} view article]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} compare])',
	'revreview-quick-see-quality' => '\'\'\'Draft\'\'\' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} view article]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} compare])',
	'revreview-selected' => 'Selected revision of \'\'\'$1:\'\'\'',
	'revreview-source' => 'draft source',
	'revreview-stable' => 'Stable page',
	'revreview-stable-title' => 'Sighted article',
	'revreview-stable1' => 'You may want to view [{{fullurl:$1|stableid=$2}} this flagged version] to see if it is now the [{{fullurl:$1|stable=1}} stable version] of this page.',
	'revreview-stable2' => 'You may want to view the [{{fullurl:$1|stable=1}} stable version] of this page (if there still is one).',
	'revreview-style' => 'Readability',
	'revreview-style-0' => 'Unapproved',
	'revreview-style-1' => 'Acceptable',
	'revreview-style-2' => 'Good',
	'revreview-style-3' => 'Concise',
	'revreview-style-4' => 'Featured',
	'revreview-submit' => 'Submit review',
	'revreview-successful' => '\'\'\'Selected revision of [[:$1|$1]] successfully flagged. ([{{fullurl:Special:Stableversions|page=$2}} view all flagged versions])\'\'\'',
	'revreview-successful2' => '\'\'\'Selected revision of [[:$1|$1]] successfully unflagged.\'\'\'',
	'revreview-text' => '\'\'[[{{MediaWiki:Validationpage}}|Stable versions]] are the default page content for viewers rather than the newest revision.\'\'',
	'revreview-text2' => '\'\'[[{{MediaWiki:Validationpage}}|Stable versions]] are checked revisions of pages and can be set as the default content for viewers.\'\'',
	'revreview-toggle' => '(+/-)',
	'revreview-toggle-title' => 'show/hide details',
	'revreview-toolow' => 'You must at least rate each of the below attributes higher than "unapproved" in order for a revision to be considered reviewed.
To depreciate a revision, set all fields to "unapproved".',
	'revreview-update' => 'Please [[{{MediaWiki:Validationpage}}|review]] any changes \'\'(shown below)\'\' made since the stable revision was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved].<br />
\'\'\'Some templates/images were updated:\'\'\'',
	'revreview-update-includes' => '\'\'\'Some templates/images were updated:\'\'\'',
	'revreview-update-none' => 'Please [[{{MediaWiki:Validationpage}}|review]] any changes \'\'(shown below)\'\' made since the stable revision was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved].',
	'revreview-update-use' => '\'\'\'NOTE:\'\'\' If any of these templates/images have a stable version, then it is already used in the stable version of this page.',
	'revreview-diffonly' => '\'\'To review the page, click the "current revision" revision link and use the review form.\'\'',
	'revreview-visibility' => '\'\'\'This page has a [[{{MediaWiki:Validationpage}}|stable version]]; settings for it can be [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configured].\'\'\'',
	'right-autopatrolother' => 'Automatically mark revisions in non-main namespaces patrolled',
	'right-autoreview' => 'Automatically mark revisions as sighted',
	'right-movestable' => 'Move stable pages',
	'right-review' => 'Mark revisions as sighted',
	'right-stablesettings' => 'Configure how the stable version is selected and displayed',
	'right-validate' => 'Mark revisions as validated',
	'rights-editor-autosum' => 'autopromoted',
	'rights-editor-revoke' => 'removed editor status from [[$1]]',
	'specialpages-group-quality' => 'Quality assurance',
	'stable-logentry' => 'configured stable versioning for [[$1]]',
	'stable-logentry2' => 'reset stable versioning for [[$1]]',
	'stable-logpage' => 'Stability log',
	'stable-logpagetext' => 'This is a log of changes to the [[{{MediaWiki:Validationpage}}|stable version]] configuration of content pages.
	A list of stabilized pages can be found at the [[Special:StablePages|stable page list]].',
	'tooltip-ca-current' => 'View the current draft of this page',
	'tooltip-ca-default' => 'Quality assurance settings',
	'tooltip-ca-stable' => 'View the stable version of this page',
	'validationpage' => '{{ns:help}}:Article validation',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'editor'              => 'Redakteur',
	'group-editor-member' => 'Redakteur',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'editor'                       => 'Editor',
	'flaggedrevs'                  => 'Rebisions siñalatas',
	'flaggedrevs-backlog'          => "Bi ha un rechistro de fainas rezagatas en a [[Special:OldReviewedPages|Lista de pachinas biellas rebisatas]]. '''Se i amenista a suya aduya!'''",
	'flaggedrevs-desc'             => 'Premite á os editors/rebisors de balidar rebisions y fer estables as pachinas',
	'flaggedrevs-pref-UI-0'        => "Usar una a bersión estable detallata d'o interfaz d'usuario",
	'flaggedrevs-pref-UI-1'        => "Usar una bersión estable simple d'o interfaz d'usuario",
	'flaggedrevs-prefs'            => 'Estabilidat',
	'flaggedrevs-prefs-stable'     => "Amostrar siempre por defeuto a bersión estable d'as pachinas de contenius (si ye que bi'n ha beluna).",
	'flaggedrevs-prefs-watch'      => "Adibir as pachinas rebisatas por yo t'a lista de seguimiento",
	'group-editor'                 => 'Editors',
	'group-editor-member'          => 'Editor',
	'group-reviewer'               => 'Rebisadors',
	'group-reviewer-member'        => 'Rebisador',
	'grouppage-editor'             => '{{ns:project}}:Editor',
	'grouppage-reviewer'           => '{{ns:project}}:Rebisador',
	'hist-draft'                   => 'bersión borrador',
	'hist-quality'                 => 'bersión de calidat',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} balidato] por [[User:$3|$3]]',
	'hist-stable'                  => 'bersión superbisata',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} superbisata] por [[User:$3|$3]]',
	'review-diff2stable'           => 'Amostrar cambeos entre a bersión estable y a bersión autual',
	'review-logentry-app'          => "s'ha rebisato [[$1]]",
	'review-logentry-dis'          => 'ha dispreziato una bersión de [[$1]]',
	'review-logentry-id'           => 'ID de bersión $1',
	'review-logentry-diff'         => 'diferenzia con estable',
	'review-logpage'               => 'Rechistro de rebisions',
	'review-logpagetext'           => "Isto ye un rechistro d'o [[{{MediaWiki:Validationpage}}|estau d'aprebazión]] de rebisions de pachinas de conteniu.
Mire-se a [[Special:ReviewedPages|lista de pachinas rebisatas]] an que trobará una lista de pachinas aprebatas.",
	'reviewer'                     => 'Rebisador',
	'revisionreview'               => 'Rebisar bersions',
	'revreview-accuracy'           => 'Prezisión',
	'revreview-accuracy-0'         => 'No aprebato',
	'revreview-accuracy-1'         => 'Bisto',
	'revreview-accuracy-2'         => 'Preziso',
	'revreview-accuracy-3'         => 'Bien decumentato',
	'revreview-accuracy-4'         => 'Destacato',
	'revreview-approved'           => 'Aprebato',
	'revreview-auto'               => '(automatico)',
	'revreview-auto-w'             => "Ye editando una bersión estable; os cambeos '''serán rebisatos automaticament'''.",
	'revreview-auto-w-old'         => "Ye editando una bersión rebisata; os cambios '''serán rebisatos automaticament'''.",
	'revreview-basic'              => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|superbisata]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambeo|cambeos}}] asperando una rebisión.',
	'revreview-basic-i'            => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|superbisata]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambios en plantillas/imachens] asperando una rebisión.',
	'revreview-basic-old'          => 'Ista ye una bersión [[{{MediaWiki:Validationpage}}|superbisata]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrat todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
Puet estar que bi aiga [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} nuebos cambios].',
	'revreview-basic-same'         => 'Esta ye a zaguera rebisión [[{{MediaWiki:Validationpage}}|superbisata]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.',
	'revreview-basic-source'       => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bersión superbisata] d'ista pachina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>, ye estata basata en esta bersión.",
	'revreview-changed'            => "'''No s'ha puesto fer l'aizión que ha demandato en ista bersión de [[:$1|$1]].'''

Puet estar que aiga demandato una plantilla u imachen sin que s'aiga espezificato a bersión.
Isto puede pasar si una plantilla dinamica contiene atra imachen u plantilla que pende en una bariable que ha cambiato dende que prenzipió á rebisar ista pachina.
O problema puet resolber-se refrescando a pachina y tornando-la á amostrar.",
	'revreview-current'            => 'Borrador',
	'revreview-depth'              => 'Fondura',
	'revreview-depth-0'            => 'No aprebato',
	'revreview-depth-1'            => 'Basico',
	'revreview-depth-2'            => 'Moderato',
	'revreview-depth-3'            => 'Alto',
	'revreview-depth-4'            => 'Destacato',
	'revreview-draft-title'        => "Borrador d'articlo",
	'revreview-edit'               => 'Editar borrador',
	'revreview-edited'             => "'''As edizions s'encorporarán t'a [[{{MediaWiki:Validationpage}}|bersión estable]] malas que un usuario establexito las rebise.

O ''borrador'' s'amuestra en o cobaixo.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|cambeo aspera awaits|cambeos asperan}}] una rebisión.",
	'revreview-flag'               => 'Rebisar ista bersión',
	'revreview-invalid'            => "'''Destín no conforme:''' no bi ha garra [[{{MediaWiki:Validationpage}}|bersión rebisata]] que corresponda con ixe ID.",
	'revreview-legend'             => "Balure o conteniu d'a rebisión",
	'revreview-log'                => 'Comentario:',
	'revreview-main'               => "Ha de trigar una bersión particular d'una pachina de conteniu ta poder rebisar-la.

Mire-se [[Special:Unreviewedpages]] an que trobará una lista de pachinas sin rebisar.",
	'revreview-newest-basic'       => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión superbisata] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambeo|cambeos}}] {{PLURAL:$3|amenista|amenistan}} una rebisión.',
	'revreview-newest-basic-i'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión superbisata] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Bels cambeos en a plantillas u imáchens] amenistan una rebisión.',
	'revreview-newest-quality'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión de calidat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambeo|cambeos}}] {{PLURAL:$3|amenista|amenistan}} una rebisión.',
	'revreview-newest-quality-i'   => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zaguera bersión de calidat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Bels cambeos en plantillas u imáchens] amenistan una rebisión.',
	'revreview-noflagged'          => "No bi ha garra bersión rebisata d'ista pachina, y por ixo a calidat d'ista pachina talment '''no''' ye estata [[{{MediaWiki:Validationpage}}|abaluata]].",
	'revreview-note'               => '[[User:$1]] ha feito as siguients notas mientres [[{{MediaWiki:Validationpage}}|rebisaba]] ista bersión:',
	'revreview-notes'              => "Obserbazions u notas t'amostrar:",
	'revreview-oldrating'          => 'A calificazión ye:',
	'revreview-patrol'             => 'Siñalar iste cambio como patrullato',
	'revreview-patrol-title'       => 'Siñalar como patrullato',
	'revreview-patrolled'          => "A bersión trigata de [[:$1|$1]] s'ha siñalata como patrullata.",
	'revreview-quality'            => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambeo|cambeos}}] asperando una rebisión.',
	'revreview-quality-i'          => 'Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambeo|cambeos}}] asperando una rebisión.',
	'revreview-quality-old'        => "Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
S'han feito nuebos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambeos].",
	'revreview-quality-same'       => "Ista ye a zaguera bersión [[{{MediaWiki:Validationpage}}|de calidat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amostrar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>.
Puet estar que s'aigan feito nuebos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambeos].",
	'revreview-quality-source'     => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bersión de calidat] d'ista pachina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprebata] o <i>$2</i>, s'ha basato en ista bersión.",
	'revreview-quality-title'      => 'Articlo de calidat',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Articlo superbisato]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} amostrar borrador]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Articlo superbisato]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} amostrar borrador]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Articlo superbisato]]'''",
	'revreview-quick-invalid'      => "'''ID de rebisión no conforme'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Bersión autual]]''' (no rebisata)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Articlo de calidat]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} amostrar borrador]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Articlo de calidat]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} amostrar borrador]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Articlo de calidat]]'''",
	'revreview-quick-see-basic'    => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} amostrar articlo]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} contimparar])",
	'revreview-quick-see-quality'  => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} amostrar articlo]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} contimparar])",
	'revreview-selected'           => "Bersión trigata de '''$1:'''",
	'revreview-source'             => "codigo fuent d'o borrador",
	'revreview-stable'             => 'Pachina estable',
	'revreview-stable-title'       => 'Articlo superbisato',
	'revreview-stable1'            => "Si quiere puede beyer [{{fullurl:$1|stableid=$2}} ista bersión siñalata] ta mirar si ye a [{{fullurl:$1|stable=1}} bersión estable] autual d'ista pachina.",
	'revreview-stable2'            => "Si quiere puede beyer a [{{fullurl:$1|stable=1}} bersión estable] s'ista pachina (si ye que bi'n ha una).",
	'revreview-style'              => 'Leyibilidat',
	'revreview-style-0'            => 'No aprebato',
	'revreview-style-1'            => 'Azeutable',
	'revreview-style-2'            => 'Bueno',
	'revreview-style-3'            => 'Conziso',
	'revreview-style-4'            => 'Destacato',
	'revreview-submit'             => 'Nimbiar rebisión',
	'revreview-successful'         => "'''S'ha siñalato a bersión trigata de [[:$1|$1]]. ([{{fullurl:Special:Stableversions|page=$2}} amostrar todas as bersions siñalatas])'''",
	'revreview-successful2'        => "'''S'ha sacato o siñal d'as bersions trigatas de [[:$1|$1]]'''",
	'revreview-text'               => "''As pachinas de conteniu que s'amuestran por defeuto son as [[{{MediaWiki:Validationpage}}|bersions estables]] en cuenta de as zagueras bersions.''",
	'revreview-text2'              => "As ''[[{{MediaWiki:Validationpage}}|bersions estables]] son bersions d'as pachinas que s'han comprebato y son o conteniu que s'amuestra por defeuto en os bisualizadors.''",
	'revreview-toggle-title'       => 'amostrar/amagar detalles',
	'revreview-toolow'             => 'Ta que a bersión se considere rebisata ha d\'abaluar toz os atribtos que s\'amuestran en o cobaixo con una calificazión mayor de "no aprebato". Ta depreziar a bersión, meta "no aprebato" en toz os campos.',
	'revreview-update'             => "Por fabor [[{{MediaWiki:Validationpage}}|rebise]] os cambios ''(que s'amuestran en o cobaixo)'' feitos dende que s'aprebó a [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bersión estable].<br />
'''S'han esbiellato bellas plantillas/imáchens:'''",
	'revreview-update-includes'    => "'''S'han esbiellato bellas plantillas u imáchens:'''",
	'revreview-update-none'        => "Por fabor [[{{MediaWiki:Validationpage}}|rebise]] os cambeos ''(que s'amuestran en o cobaixo)'' feitos dende que s'aprebó a [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bersión estable].",
	'revreview-update-use'         => "'''PARE CUENTA:''' Si beluna d'istas plantillas u imáchens tiene un bersión estable, s'emplegarán istas en a bersión estable d'a pachina.",
	'revreview-diffonly'           => "''Ta rebisar as pachinas, punche en o binclo \"bersión autual\" y faiga serbir o formulario de rebisión.''",
	'revreview-visibility'         => "'''Ista pachina tiene una [[{{MediaWiki:Validationpage}}|bersión estable]]; A suya confegurazión puede cambiar-se [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} aquí].'''",
	'right-autopatrolother'        => "Siñalar automaticament como patrullatas as rebisions difuera d'o espazio de nombres prenzipal",
	'right-autoreview'             => 'Siñalar as rebisions automaticament como superbisatas',
	'right-movestable'             => 'Tresladar as pachinas estables',
	'right-review'                 => 'Siñalar as rebisions como superbisatas',
	'right-stablesettings'         => "Confegurar cómo se triga y s'amuestra a bersión estable",
	'right-validate'               => 'Siñalar as rebisions como balidatas',
	'rights-editor-autosum'        => 'autopromobito',
	'rights-editor-revoke'         => "s'ha sacato o estatus d'edito á [[$1]]",
	'specialpages-group-quality'   => 'Seguranza de calidat',
	'stable-logentry'              => "s'ha confegurato o emplego de bersions estables ta [[$1]]",
	'stable-logentry2'             => "s'ha restablito o emplego de bersions estables ta [[$1]]",
	'stable-logpage'               => 'Rechistro de bersions estables',
	'stable-logpagetext'           => "Iste ye un rechistro de cambeos d'a confegurazión de [[{{MediaWiki:Validationpage}}|bersions estables]] d'as pachinas de conteniu.
Puede trobar una lista de pachinas con bersions estables en [[Special:StablePages|lista de pachinas estables]].",
	'tooltip-ca-current'           => "Amostrar o borrador autual d'ista pachina",
	'tooltip-ca-default'           => "Opzions d'aseguranza d'a calidat",
	'tooltip-ca-stable'            => "Amostrar a bersión estable d'ista pachina",
	'validationpage'               => "{{ns:help}}:Balidazión d'articlo",
);

/** Arabic (العربية)
 * @author Meno25
 * @author Siebrand
 * @author OsamaK
 */
$messages['ar'] = array(
	'editor'                       => 'محرر',
	'flaggedrevs'                  => 'نسخ معلمة',
	'flaggedrevs-backlog'          => "يوجد حاليا سجل تأخر في [[Special:OldReviewedPages|الصفحات المراجعة القديمة]]. '''انتباهك مطلوب!'''",
	'flaggedrevs-desc'             => 'يعطي المحررين/المراجعين القدرة على التأكد من صحة النسخ وتثبيت الصفحات',
	'flaggedrevs-pref-UI-0'        => 'استخدم واجهة مستخدم لنسخة مستقرة مفصلة',
	'flaggedrevs-pref-UI-1'        => 'استخدم واجهة مستخدم لنسخة مستقرة بسيطة',
	'flaggedrevs-prefs'            => 'استقرار',
	'flaggedrevs-prefs-stable'     => 'دائما اعرض النسخة المستقرة لصفحات المحتوى افتراضيا (لو كانت هناك واحدة)',
	'flaggedrevs-prefs-watch'      => 'أضف الصفحات التي أراجعها إلى قائمة مراقبتي',
	'group-editor'                 => 'محررون',
	'group-editor-member'          => 'محرر',
	'group-reviewer'               => 'مراجعون',
	'group-reviewer-member'        => 'مراجع',
	'grouppage-editor'             => '{{ns:project}}:محرر',
	'grouppage-reviewer'           => '{{ns:project}}:مراجع',
	'hist-draft'                   => 'مراجعة مسودة',
	'hist-quality'                 => 'نسخة جودة',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} تم التحقق منها] بواسطة [[User:$3|$3]]',
	'hist-stable'                  => 'نسخة منظورة',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} تم نظرها] بواسطة [[User:$3|$3]]',
	'review-diff2stable'           => 'عرض التغييرات بين النسختين المستقرة والحالية',
	'review-logentry-app'          => 'راجع $1',
	'review-logentry-dis'          => 'أزال نسخة من $1',
	'review-logentry-id'           => 'رقم النسخة $1',
	'review-logentry-diff'         => 'الفرق للمستقرة',
	'review-logpage'               => 'سجل المراجعة',
	'review-logpagetext'           => "هذا سجل بالتغييرات لحالة' [[{{MediaWiki:Makevalidate-page}}|الموافقة]] لصفحات المحتوى.
انظر [[Special:ReviewedPages|قائمة الصفحات المراجعة]] لقائمة بالصفحات المراجعة.",
	'reviewer'                     => 'مراجع',
	'revisionreview'               => 'مراجعة النسخ',
	'revreview-accuracy'           => 'الدقة',
	'revreview-accuracy-0'         => 'غير موافق',
	'revreview-accuracy-1'         => 'منظورة',
	'revreview-accuracy-2'         => 'دقيقة',
	'revreview-accuracy-3'         => 'مصادرها جيدة',
	'revreview-accuracy-4'         => 'مميزة',
	'revreview-approved'           => 'مُصدق',
	'revreview-auto'               => '(تلقائيا)',
	'revreview-auto-w'             => "'''ملاحظة:''' أنت تقوم بتغييرات للنسخة المستقرة، تعديلاتك سيتم مراجعتها تلقائيا.",
	'revreview-auto-w-old'         => "أنت تحرر نسخة مراجعة، التغييرات ستتم '''مراجعتها تلقائيا'''.",
	'revreview-basic'              => 'هذه آخر نسخة [[{{MediaWiki:Validationpage}}|منظورة]] ،
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} النسخة الحالية]
	يمكن [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} تعديلها]؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|تغيير|تغييرات}}]
	{{PLURAL:$3|تنتظر|تنتظر}} مراجعة.',
	'revreview-basic-i'            => 'هذه هي أحدث نسخة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-basic-old'          => 'هذه نسخة [[{{MediaWiki:Validationpage}}|منظورة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-basic-same'         => 'هذه هي آخر نسخة [[{{MediaWiki:Validationpage}}|منظورة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>. الصفحة يمكن [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} تعديلها].',
	'revreview-basic-source'       => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة منظورة] من هذه الصفحة, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>، بناء على هذه النسخة.',
	'revreview-changed'            => "'''الأمر المطلوب لم يمكن إجراؤه على هذه النسخة من [[:$1|$1]].'''

قالب أو صورة ربما يكون قد تم طلبه عندما لم يتم تحديد نسخة معينة. هذا يمكن أن يحدث لو
قالب ديناميكي يضمن صورة أخرى أو قالب معتمدا على متغير تغير منذ أن بدأت
مراجعة هذه الصفحة. تحديث الصفحة وإعادة المراجعة يمكن أن يحل هذه المشكلة.",
	'revreview-current'            => 'مسودة',
	'revreview-depth'              => 'العمق',
	'revreview-depth-0'            => 'غير موافق',
	'revreview-depth-1'            => 'أساسي',
	'revreview-depth-2'            => 'متوسط',
	'revreview-depth-3'            => 'مرتفع',
	'revreview-depth-4'            => 'مميز',
	'revreview-draft-title'        => 'مسودة مقال',
	'revreview-edit'               => 'عدل المسودة',
	'revreview-edited'             => "'''التعديلات سيتم دمجها في [[{{MediaWiki:Validationpage}}|النسخة المستقرة]] متى راجعها مستخدم موثوق.
''المسودة'' معروضة بالأسفل.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|تغير ينتظر|تغيير ينتظر}}] المراجعة.",
	'revreview-flag'               => 'راجع هذه النسخة',
	'revreview-invalid'            => "'''هدف غير صحيح:''' لا نسخة [[{{MediaWiki:Validationpage}}|مراجعة]] تتطابق مع الرقم المعطى.",
	'revreview-legend'             => 'قيم محتوى النسخة',
	'revreview-log'                => 'تعليق السجل:',
	'revreview-main'               => 'يجب أن تختار نسخة معينة من صفحة محتوى لمراجعتها. 

	انظر [[Special:Unreviewedpages]] لقائمة الصفحات غير المراجعة.',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} النسخة الأخيرة المنظورة]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) تم [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها]
	 في <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|تغيير|تغييرات}}] {{PLURAL:$3|تحتاج|تحتاج}} مراجعة.',
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر نسخة منظورة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} نسخة الجودة الأخيرة]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) تم [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها]
	 في <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|تغيير|تغييرات}}] {{PLURAL:$3|تحتاج|تحتاج}} مراجعة.',
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخر نسخة جودة] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغييرات قالب/صورة] تحتاج المراجعة.',
	'revreview-noflagged'          => "لا توجد نسخ مراجعة لهذه الصفحة، لذا ربما '''لا''' تكون قد تم 
	[[{{MediaWiki:Validationpage}}|التحقق من]] جودتها.",
	'revreview-note'               => '[[User:$1]] كتب الملاحظات التالية [[{{MediaWiki:Validationpage}}|عند مراجعة]] هذه النسخة:',
	'revreview-notes'              => 'الملاحظات للعرض:',
	'revreview-oldrating'          => 'تم تقييمها ك:',
	'revreview-patrol'             => 'علم على هذا التغيير كمراجع',
	'revreview-patrol-title'       => 'علم كمراجعة',
	'revreview-patrolled'          => 'النسخة المختارة من [[:$1|$1]] تم التعليم عليها كمراجعة.',
	'revreview-quality'            => 'هذه آخر نسخة [[{{MediaWiki:Validationpage}}|جودة]],
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} النسخة الحالية]
	يمكن [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} تعديلها]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|تغيير|تغييرات}}]
	{{PLURAL:$3|تنتظر|تنتظر}} مراجعة.',
	'revreview-quality-i'          => 'هذه هي أحدث نسخة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} المسودة] بها [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغييرات قوالب/صور] تنتظر المراجعة.',
	'revreview-quality-old'        => 'هذه نسخة [[{{MediaWiki:Validationpage}}|جودة]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} عرض الكل]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغييرات] جديدة ربما تكون قد حدثت.',
	'revreview-quality-same'       => 'هذه هي آخر نسخة [[{{MediaWiki:Validationpage}}|جودة]]، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>. الصفحة يمكن [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} تعديلها].',
	'revreview-quality-source'     => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخة جودة] من هذه الصفحة، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تمت الموافقة عليها] في <i>$2</i>، بناء على هذه النسخة.',
	'revreview-quality-title'      => 'مقال جودة',
	'revreview-quick-basic'        => "'''منظورة'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض النسخة الحالية]
	($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|تغيير|تغييرات}}])",
	'revreview-quick-basic-old'    => "[[{{MediaWiki:Validationpage}}|مقالة منظورة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|منظورة]]''' (لا تغييرات غير مراجعة)",
	'revreview-quick-invalid'      => "'''رقم نسخة غير صحيح'''",
	'revreview-quick-none'         => "'''الحالي'''. لا نسخ مراجعة.",
	'revreview-quick-quality'      => "'''جودة'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض النسخة الحالية]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|مقالة جودة]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} عرض المسودة]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|جودة]]''' (لا تغييرات غير مراجعة)",
	'revreview-quick-see-basic'    => "'''مسودة''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} عرض الصفحة المستقرة]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|تغيير|تغيير}}])",
	'revreview-quick-see-quality'  => "'''مسودة''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} عرض الصفحة المستقرة]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|تغيير|تغيير}}])",
	'revreview-selected'           => "النسخة المختارة لصفحة '''$1:'''",
	'revreview-source'             => 'مصدر المسودة',
	'revreview-stable'             => 'صفحة مستقرة',
	'revreview-stable-title'       => 'مقال منظور',
	'revreview-stable1'            => 'ربما ترغب في رؤية [{{fullurl:$1|stableid=$2}} هذه النسخة المعلمة] لترى ما إذا كانت [{{fullurl:$1|stable=1}} النسخة المستقرة] لهذه الصفحة.',
	'revreview-stable2'            => 'ربما ترغب في رؤية [{{fullurl:$1|stable=1}} النسخة المستقرة] لهذه الصفحة (لو كانت مازالت هناك واحدة).',
	'revreview-style'              => 'القابلية للقراءة',
	'revreview-style-0'            => 'غير مقبول',
	'revreview-style-1'            => 'مقبول',
	'revreview-style-2'            => 'جيدة',
	'revreview-style-3'            => 'متوسطة',
	'revreview-style-4'            => 'مميزة',
	'revreview-submit'             => 'تنفيذ المراجعة',
	'revreview-successful'         => "'''النسخة المختارة من [[:$1|$1]] تم التعليم عليها بنجاح. ([{{fullurl:Special:Stableversions|page=$2}} عرض كل النسخ المعلمة])'''",
	'revreview-successful2'        => "'''النسخة المختارة من [[:$1|$1]] تم إزالة علمها بنجاح.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هي محتوى الصفحة الافتراضي للمشاهدين بدلا من أحدث نسخة.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|النسخ المستقرة]] هي نسخ مراجعة من الصفحات ويمكن ضبطها كالمحتوى القياسي للمشاهدين.''",
	'revreview-toggle-title'       => 'عرض/إخفاء التفاصيل',
	'revreview-toolow'             => 'يجب عليك على الأقل تقييم كل من المحددات بالأسفل أعلى من "غير مقبولة" لكي 
تعتبر النسخة مراجعة. لسحب نسخة, اضبط كل الحقول ك "غير مقبولة".',
	'revreview-update'             => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ النسخة المستقرة تمت  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].<br />
'''بعض القوالب/الصور تم تحديثها: '''",
	'revreview-update-includes'    => "'''بعض القوالب/الصور تم تحديثها:'''",
	'revreview-update-none'        => "من فضلك [[{{MediaWiki:Validationpage}}|راجع]] أية تغييرات ''(معروضة بالأسفل)'' تمت منذ النسخة المستقرة تمت  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} الموافقة عليها].",
	'revreview-update-use'         => "'''ملاحظة:''' لو أن أي من هذه القوالب/الصور لديها نسخة مستقرة، إذا فهي مستخدمة بالفعل في النسخة المستقرة لهذه الصفحة.",
	'revreview-diffonly'           => "''لمراجعة الصفحة، اضغط على وصلة مراجعة \"المراجعة الحالية\" واستخدم استمارة المراجعة.''",
	'revreview-visibility'         => "'''هذه الصفحة بها [[{{MediaWiki:Validationpage}}|نسخة مستقرة]]؛ الإعدادات لها يمكن [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} ضبطها].'''",
	'right-autopatrolother'        => 'التعليم تلقائيا على النسخ في النطاقات غير الرئيسية كمراجعة',
	'right-autoreview'             => 'تلقائيا التعليم على المراجعات كمنظورة',
	'right-movestable'             => 'نقل الصفحات المستقرة',
	'right-review'                 => 'علم على المراجعات كمنظورة',
	'right-stablesettings'         => 'ضبط كيف يتم اختيار وعرض النسخة المستقرة',
	'right-validate'               => 'التعليم على المراجعات كمتحقق منها',
	'rights-editor-autosum'        => 'ترقية تلقائية',
	'rights-editor-revoke'         => 'أزال حالة محرر من [[$1]]',
	'specialpages-group-quality'   => 'توكيد الجودة',
	'stable-logentry'              => 'ضبط النسخة المستقرة ل[[$1]]',
	'stable-logentry2'             => 'أعاد ضبط النسخة المستقرة ل[[$1]]',
	'stable-logpage'               => 'سجل النسخة المستقرة',
	'stable-logpagetext'           => 'هذا سجل بالتغييرات لضبط [[{{MediaWiki:Validationpage}}|النسخة المستقرة]]
لصفحات المحتوى.
قائمة بالصفحات المستقرة يمكن العثور عليها في [[Special:StablePages|قائمة الصفحات المستقرة]].',
	'tooltip-ca-current'           => 'عرض المسودة الحالية لهذه الصفحة',
	'tooltip-ca-default'           => 'إعدادات تأكيد الجودة',
	'tooltip-ca-stable'            => 'عرض النسخة المستقرة لهذه الصفحة',
	'validationpage'               => '{{ns:help}}:تحقيق المقالات',
);

/** Asturian (Asturianu)
 * @author Esbardu
 * @author Siebrand
 */
$messages['ast'] = array(
	'editor'                      => 'Editor',
	'flaggedrevs'                 => 'Revisiones marcaes',
	'flaggedrevs-desc'            => 'Da la capacidá a los editores/revisores de validar revisiones y estabilizar páxines',
	'group-editor'                => 'Editores',
	'group-editor-member'         => 'Editor',
	'group-reviewer'              => 'Revisores',
	'group-reviewer-member'       => 'Revisor',
	'grouppage-editor'            => '{{ns:project}}:Editor',
	'grouppage-reviewer'          => '{{ns:project}}:Revisor',
	'hist-quality'                => 'versión calidable',
	'hist-stable'                 => 'versión vista',
	'review-diff2stable'          => 'Ver los cambeos ente les revisiones estable y actual',
	'review-logentry-app'         => 'revisó [[$1]]',
	'review-logentry-dis'         => 'despreció una versión de [[$1]]',
	'review-logentry-id'          => 'identificador de revisión $1',
	'review-logpage'              => "Rexistru de revisión d'artículos",
	'review-logpagetext'          => 'Esti ye un rexistru de los cambeos fechos na [[{{MediaWiki:Validationpage}}|aprobación]]
de les revisiones de les páxines de conteníu.',
	'reviewer'                    => 'Revisor',
	'revisionreview'              => 'Revisar revisiones',
	'revreview-accuracy'          => 'Precisión',
	'revreview-accuracy-0'        => 'Non aprobada',
	'revreview-accuracy-1'        => 'Vista',
	'revreview-accuracy-2'        => 'Precisa',
	'revreview-accuracy-3'        => 'Bien documentada',
	'revreview-accuracy-4'        => 'Destacada',
	'revreview-auto'              => '(automático)',
	'revreview-auto-w'            => "Tas editando la revisión estable, cualesquier cambéu va ser '''revisáu automáticamente'''.
Seique quieras previsualizar la páxina enantes de grabala.",
	'revreview-auto-w-old'        => "tas editando una revisión antigua, cualesquier cambéu va ser '''revisáu atuomáticamente'''.
Seique quieras previsualizar la páxina enantes de grabala.",
	'revreview-basic'             => "Esta ye la cabera revisión [[{{MediaWiki:Validationpage}}|vista]],
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada]'l <i>$2</i>. El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador]
pue ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificáu]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambéu|cambeos}}]
{{PLURAL:$3|espera|esperen}} revisión.",
	'revreview-changed'           => "'''Nun se pudo efeutuar l'aición solicitada nesta revisión de [[:$1|$1]].'''

Seique se solicitara una plantía o una imaxe cuando nun s'especificara nenguna versión específica. Esto pue asoceder si una plantía dinámica reemplaza otra plantía o imaxe según una variable que tenga camudao dende qu'empecipiaras a revisar esta páxina. Refrescar la páxina y volver a revisar pue solucionar esti problema.",
	'revreview-current'           => 'Borrador',
	'revreview-depth'             => 'Fondura',
	'revreview-depth-0'           => 'Non aprobada',
	'revreview-depth-1'           => 'Básica',
	'revreview-depth-2'           => 'Moderada',
	'revreview-depth-3'           => 'Alta',
	'revreview-depth-4'           => 'Destacada',
	'revreview-edit'              => 'Editar borrador',
	'revreview-flag'              => 'Revisar esta revisión',
	'revreview-legend'            => 'Calificar el conteníu de la revisión',
	'revreview-log'               => 'Comentariu:',
	'revreview-main'              => "Tienes que seleicionar una revisión concreta d'una páxina de conteníos pa revisala.

Vete a [[Special:Unreviewedpages]] pa ver una llista de les páxines non revisaes.",
	'revreview-newest-basic'      => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} cabera revisión vista]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} llistar toes]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobóse]'l
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambéu|cambeos}}] {{PLURAL:$3|necesita|necesiten}} revisión.",
	'revreview-newest-quality'    => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} cabera revisión calidable]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} llistar toes]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobóse]'l
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambéu|cambeos}}] {{PLURAL:$3|necesita|necesiten}} revisión.",
	'revreview-noflagged'         => "Nun hai revisiones revisaes d'esta páxina, polo que seique '''nun'''' tea
[[{{MediaWiki:Validationpage}}|comprobada]] la so calidá.",
	'revreview-note'              => '[[User:$1]] fizo les siguientes notes al [[{{MediaWiki:Validationpage}}|revisar]] esta revisión:',
	'revreview-notes'             => "Observaciones o notes p'amosar:",
	'revreview-oldrating'         => 'Foi calificáu:',
	'revreview-patrol'            => 'Marcar esti cambéu como supervisáu',
	'revreview-patrolled'         => 'La revisión seleicionada de [[:$1|$1]] marcóse como supervisada.',
	'revreview-quality'           => "Esta ye la cabera [[{{MediaWiki:Validationpage}}|quality]] revisión,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada]'l <i>$2</i>. El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador]
pue ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificáu]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambéu|cambeos}}]
{{PLURAL:$3|espera|esperen}} revisión.",
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|Vista]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver borrador]]",
	'revreview-quick-none'        => "'''Actual''' (ensin revisiones revisaes)",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|Calidable]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver borrador]]",
	'revreview-quick-see-basic'   => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver artículu estable]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|cambéu|cambeos}}])",
	'revreview-quick-see-quality' => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver artículu estable]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|cambéu|cambeos}}])",
	'revreview-selected'          => "Revisión seleicionada de '''$1:'''",
	'revreview-source'            => 'orixe del borrador',
	'revreview-stable'            => 'Estable',
	'revreview-style'             => 'Llexibilidá',
	'revreview-style-0'           => 'Non aprobada',
	'revreview-style-1'           => 'Aceutable',
	'revreview-style-2'           => 'Bona',
	'revreview-style-3'           => 'Concisa',
	'revreview-style-4'           => 'Destacada',
	'revreview-submit'            => 'Grabar revisión',
	'revreview-text'              => "Les versiones estables son el conteníu por defeutu d'una vista de páxina en cuenta de la revisión más nueva.",
	'revreview-toolow'            => 'Tienes que calificar tolos atributos d\'embaxo percima de "non aprobáu" pa qu\'una revisión seya considerada como revisada. Pa despreciar una revisión, pon tolos campos como "non aprobáu".',
	'revreview-update'            => "Por favor [[{{MediaWiki:Validationpage}}|revisa]] tolos cambeos ''(amosaos embaxo)'' fechos dende que la revisión estable foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada].

'''Actualizáronse delles plantíes/imáxenes:'''",
	'revreview-update-none'       => "Por favor [[{{MediaWiki:Validationpage}}|revisa]] tolos cambeos ''(amosaos embaxo)'' fechos dende que la versión estable foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada].",
	'revreview-visibility'        => 'Esta páxina tien una [[{{MediaWiki:Validationpage}}|versión estable]], que pue ser
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurada].',
	'rights-editor-autosum'       => 'autopromocionáu',
	'rights-editor-revoke'        => "revocó l'estatus d'editor a [[$1]]",
	'stable-logentry'             => 'configuró la versión estable de [[$1]]',
	'stable-logentry2'            => 'restablecer el rexistru de les versiones estables de [[$1]]',
	'stable-logpage'              => 'Rexistru de versiones estables',
	'stable-logpagetext'          => 'Esti ye un rexistru de los cambeos fechos na configuración de la [[{{Mediawiki:Validationpage}}|versión estable]]
de les páxines de conteníu.',
	'tooltip-ca-current'          => "Amuesa'l borrador actual d'esta páxina",
	'tooltip-ca-default'          => 'Parámetros del aseguramientu de calidá',
	'tooltip-ca-stable'           => "Amuesa la versión estable d'esta páxina",
	'validationpage'              => "{{ns:help}}:Validación d'artículos",
);

/** Bikol Central (Bikol Central)
 * @author Filipinayzd
 * @author Siebrand
 */
$messages['bcl'] = array(
	'hist-quality'    => 'kalidad',
	'revreview-depth' => 'Rarom',
);

/** Bulgarian (Български)
 * @author Borislav
 * @author DCLXVI
 * @author Siebrand
 */
$messages['bg'] = array(
	'editor'                      => 'Редактор',
	'flaggedrevs-desc'            => 'Дава възможността на редактори/рецензенти да одобряват версии и да определят страници като устойчиви',
	'flaggedrevs-prefs'           => 'Устойчивост',
	'group-editor'                => 'Редактори',
	'group-editor-member'         => 'Редактор',
	'group-reviewer'              => 'Рецензенти',
	'group-reviewer-member'       => 'Рецензент',
	'grouppage-editor'            => '{{ns:project}}:Редактор',
	'grouppage-reviewer'          => '{{ns:project}}:Рецензент',
	'hist-quality'                => 'качествена версия',
	'review-diff2stable'          => 'Преглед на разликите между устойчивата и текущата версия',
	'review-logentry-id'          => 'номер на редакция $1',
	'reviewer'                    => 'Рецензент',
	'revreview-accuracy'          => 'Точност',
	'revreview-accuracy-0'        => 'Неодобрена',
	'revreview-accuracy-1'        => 'Прегледана',
	'revreview-accuracy-2'        => 'Точна',
	'revreview-accuracy-3'        => 'Добри източници',
	'revreview-accuracy-4'        => 'Избрана',
	'revreview-auto'              => '(автоматично)',
	'revreview-current'           => 'Чернова',
	'revreview-depth'             => 'Пълнота',
	'revreview-depth-0'           => 'Неодобрена',
	'revreview-depth-1'           => 'Начална',
	'revreview-depth-2'           => 'Средна',
	'revreview-depth-3'           => 'Висока',
	'revreview-depth-4'           => 'Избрана',
	'revreview-draft-title'       => 'Чернова на статия',
	'revreview-edit'              => 'Редактиране на черновата',
	'revreview-legend'            => 'Оценка на съдържанието на версията',
	'revreview-log'               => 'Коментар:',
	'revreview-oldrating'         => 'Досегашна оценка:',
	'revreview-patrol'            => 'Отбелязване на промяната като проверена',
	'revreview-patrol-title'      => 'Отбелязване като проверена',
	'revreview-patrolled'         => 'Избраната версия на [[:$1|$1]] беше отбелязана като проверена.',
	'revreview-quick-invalid'     => "'''Невалиден номер на версия'''",
	'revreview-quick-none'        => "'''Текуща''' (няма рецензирани версии)",
	'revreview-quick-see-basic'   => "'''Чернова''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} преглед на страницата]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} сравняване])",
	'revreview-quick-see-quality' => "'''Чернова''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} преглед на страницата]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} сравняване])",
	'revreview-selected'          => "Избрана редакция на '''$1:'''",
	'revreview-source'            => 'изходен код на черновата',
	'revreview-stable'            => 'Устойчива',
	'revreview-style'             => 'Четимост',
	'revreview-style-0'           => 'Неодобрена',
	'revreview-style-1'           => 'Приемлива',
	'revreview-style-2'           => 'Добра',
	'revreview-style-3'           => 'Издържана',
	'revreview-style-4'           => 'Избрана',
	'revreview-submit'            => 'Пращане на рецензията',
	'revreview-toggle-title'      => 'показване/скриване на детайли',
	'revreview-update-includes'   => "'''Някои шаблони/файлове бяха обновени:'''",
	'right-movestable'            => 'Преместване на устойчиви страници',
	'rights-editor-revoke'        => 'отне правата на редактор на [[$1]]',
	'stable-logpage'              => 'Дневник на устойчивите версии',
	'tooltip-ca-current'          => 'Преглед на текущата чернова на страницата',
	'tooltip-ca-stable'           => 'Преглед на устойчивата версия на страницата',
);

/** Bengali (বাংলা)
 * @author Zaheen
 * @author Bellayet
 * @author Siebrand
 */
$messages['bn'] = array(
	'editor'                      => 'সম্পাদক',
	'flaggedrevs'                 => 'চিহ্নিত সংশোধনসমূহ',
	'group-editor'                => 'সম্পাদকগণ',
	'group-editor-member'         => 'সম্পাদক',
	'group-reviewer'              => 'নিরীক্ষকগণ',
	'group-reviewer-member'       => 'নিরীক্ষক',
	'grouppage-editor'            => '{{ns:project}}:সম্পাদক',
	'grouppage-reviewer'          => '{{ns:project}}:নিরীক্ষক',
	'hist-quality'                => 'কোয়ালিটি সংশোধন',
	'hist-stable'                 => 'সাইট করা সংশোধন',
	'review-logentry-app'         => '[[$1]] পর্যালোচনা করা হয়েছে',
	'review-logpage'              => 'নিবন্ধ পর্যালোচনা লগ',
	'review-logpagetext'          => 'এটি বিষয়বস্তু পাতাগুলিতে সংশোধনসমূহের [[{{MediaWiki:Validationpage}}|অনুমোদন]] মর্যাদা পরিবর্তনের একটি লগ।',
	'reviewer'                    => 'নিরীক্ষক',
	'revisionreview'              => 'সংশোধনগুলি পর্যালোচনা করুন',
	'revreview-accuracy'          => 'প্রাসঙ্গিকতা',
	'revreview-accuracy-0'        => 'অননুমদিত',
	'revreview-accuracy-1'        => 'সাইট করা হয়েছে',
	'revreview-accuracy-2'        => 'হুবুহু',
	'revreview-accuracy-3'        => 'ভালো তথ্যসূত্র যোগ করা হয়েছে',
	'revreview-accuracy-4'        => 'ফিচার করা হয়েছে',
	'revreview-auto'              => '(সয়ংক্রিয়)',
	'revreview-changed'           => "'''[[:$1|$1]]-এর এই সংশোধনটির উপর অনুরোধকৃত কাজটি সম্পাদন করা যায়নি'''

কোন নির্দিষ্ট সংস্করণ নির্দেশ না করেই একটি টেম্পলেট বা ছবি হয়ত অনুরোধ করা হয়েছে। যদি কোন চলমান টেম্পলেট কোন একটি ভ্যারিয়েবলের উপর নির্ভর করে আরেকটি টেম্পলেট বা ছবিকে অন্তর্ভুক্ত করে, এবং সেই ভ্যারিয়েবলটি যদি আপনি পর্যালোচনা শুরু করার পর পরিবর্তিত হয়ে থাকে, তবে এমনটি ঘটতে পারে।
পাতাটি রিফ্রেশ করে পুনরায় পর্যালোচনা করলে সমস্যাটির সমাধান হতে পারে।",
	'revreview-current'           => 'খসড়া',
	'revreview-depth'             => 'গভীরতা',
	'revreview-depth-0'           => 'অননুমদিত',
	'revreview-depth-1'           => 'সাধারণ',
	'revreview-depth-2'           => 'মুটামোটি',
	'revreview-depth-3'           => 'উচ্চ',
	'revreview-depth-4'           => 'ফিচার করা হয়েছে',
	'revreview-edit'              => 'খসড়া সম্পাদনা করুন',
	'revreview-flag'              => 'এই সংশোধনটি পর্যালোচনা করুন',
	'revreview-legend'            => 'সংশোধনের বিষয়বস্তুর রেটিং দিন',
	'revreview-log'               => 'মন্তব্য:',
	'revreview-main'              => 'আপনাকে অবশ্যই কোন একটি বিষয়বস্তু পাতা থেকে একটি নির্দিষ্ট সংশোধন পর্যালোচনা করার জন্য বাছাই করতে হবে।

পর্যালোচনা করা হয়নি এমন পাতাগুলির একটি তালিকার জন্য [[Special:Unreviewedpages]] দেখুন।',
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} সাম্প্রতি দেখা সংস্করণ]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} সমস্ত তালিকা])  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} অনুমোদিত] হয়েছে
<i>$2</i> এ। [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|পরিবর্তন|পরিবর্তনসমূহ}}] পর্যালোচনা {{PLURAL:$3|প্রয়োজন|প্রয়োজন}}।',
	'revreview-notes'             => 'প্রদর্শনের জন্য পর্যবেক্ষণ বা মন্তব্য:',
	'revreview-oldrating'         => 'পূর্বে মূল্যায়ন ছিল:',
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|দেখা হয়েছে]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} খসড়া দেখুন]]",
	'revreview-quick-none'        => "'''বর্তমান''' (কোন সংশোধিত সংস্করণ নাই)",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|গুণ]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} খসড়া দেখুন]]",
	'revreview-quick-see-basic'   => "'''খসড়া''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} সুস্থিত নিবন্ধ দেখুন]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|পরিবর্তন|পরিবর্তনসমূহ}}])",
	'revreview-quick-see-quality' => "'''খসড়া''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} সুস্থিত নিবন্ধ দেখুন]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|পরিবর্তন|পরিবর্তনসমূহ}}])",
	'revreview-selected'          => "'''$1'''-এর যে সংশোধন নির্বাচন করা হয়েছে:",
	'revreview-source'            => 'খসড়া উৎস',
	'revreview-stable'            => 'স্থিতিশীল',
	'revreview-style'             => 'পঠনযোগ্যতা',
	'revreview-style-0'           => 'অননুমদিত',
	'revreview-style-1'           => 'গ্রহণযোগ্য',
	'revreview-style-2'           => 'ভাল',
	'revreview-style-3'           => 'সংক্ষিপ্ত',
	'revreview-style-4'           => 'ফিচার করা হয়েছে',
	'revreview-submit'            => 'পর্যালোচনা জমা দিন',
	'revreview-text'              => 'নতুনতম সংস্করণের বদলে স্থিতিশীল সংস্করণগুলি পাতার দর্শনের মূল বিষয়বস্তু হিসেবে সেট করা আছে।',
	'revreview-toolow'            => 'কোন সংশোধনকে পর্যালোচিত গণ্য করতে চাইলে আপনাকে নিচের বৈশিষ্ট্যগুলির প্রতিটিকে কমপক্ষে "অননুমোদিত" থেকে উচ্চতর কোন রেটিং দিতে হবে। কোন সংশোধনকে অবনমিত করতে চাইলে, সবগুলি ক্ষেত্র "অননুমোদিত"-তে সেট করুন।',
	'rights-editor-revoke'        => '[[$1]] এর সম্পাদক পদমর্যাদা প্রত্যাহার করুন',
	'stable-logpage'              => 'সুদৃঢ় সংস্করণ লগ',
	'tooltip-ca-current'          => 'এই পাতাটির বর্তমান খসড়াটি দেখুন',
	'tooltip-ca-default'          => 'গুণাগুল নিশ্চিতকরণ সেটিংস',
	'tooltip-ca-stable'           => 'এই পাতাটির স্থিতিশীল সংস্করণটি দেখুন',
	'validationpage'              => '{ns:help}}:নিবন্ধ বৈধকরণ',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'editor'                       => 'Skridaozer',
	'flaggedrevs'                  => 'Adweladennoù merket',
	'flaggedrevs-desc'             => "Reiñ a ra an tu d'ar reizherien pe d'an adlennerien da gadarnaat an degasadennoù ha da stabilaat ar pajennoù.",
	'group-editor'                 => 'Skridaozerien',
	'group-editor-member'          => 'Skridaozer',
	'group-reviewer'               => 'Reizherien',
	'group-reviewer-member'        => 'Reizher',
	'grouppage-editor'             => '{{ns:project}} : Skridaozer',
	'grouppage-reviewer'           => '{{ns:project}} : Reizher',
	'hist-quality'                 => 'perzhded ar stumm',
	'hist-stable'                  => 'Stumm gwelet',
	'review-diff2stable'           => "Gwelet ar c'hemmoù etre ar stummoù stabil hag ar stummoù a-vremañ.",
	'review-logentry-app'          => 'Reizhet [[$1]]',
	'review-logentry-dis'          => "Stumm dic'hizet eus [[$1]]",
	'review-logentry-id'           => 'Stumm ID $1',
	'review-logpage'               => 'Marilh an adweladennoù',
	'review-logpagetext'           => "Setu marilh ar c'hemmoù ber degaset [[{{MediaWiki:Validationpage}}|d'ar statud aprouiñ]] an adweladennoù.
Gwelet [[Special:ReviewedPages|roll ar pajennoù adwelet]] evit kaout roll ar pajennoù aprouet.",
	'reviewer'                     => 'Reizher',
	'revisionreview'               => 'Adwelet ar reizhadennoù',
	'revreview-accuracy'           => 'Pizhder',
	'revreview-accuracy-0'         => 'Ket aprouet',
	'revreview-accuracy-1'         => 'Gwelet',
	'revreview-accuracy-2'         => 'Resis',
	'revreview-accuracy-3'         => 'Titouret mat',
	'revreview-accuracy-4'         => 'Heverk',
	'revreview-auto'               => '(emgefre)',
	'revreview-auto-w'             => "O kemmañ ar stumm stabil emaoc'h; ''adlennet ent emgefre'' e vo ar c'hemmoù.",
	'revreview-auto-w-old'         => "O kemmañ ar stumm stabil emaoc'h; ''adlennet ent emgefre'' e vo ar c'hemmoù.",
	'revreview-basic'              => "Setu ar [[{{MediaWiki:Validationpage}}|stumm diwezhañ gwelet]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gant ar [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouilhed] ez eus [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|c'hemm|kemm}}] a c'hortoz bezañ adwelet.",
	'revreview-basic-old'          => "Hemañ zo ur stumm bet [[{{MediaWiki:Validationpage}}|gwelet]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Kemmoù] nevez zo bet graet.",
	'revreview-basic-same'         => "Setu an diwezhañ stumm bet [[{{MediaWiki:Validationpage}}|adwelet]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gallout a ra ar bajenn bezañ '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} kemmet]'''.",
	'revreview-basic-source'       => "Ur [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} stumm gwelet] eus ar bajenn-mañ, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>, eo bet diazezet er-maez eus ar stumm-mañ.",
	'revreview-current'            => 'Brouilhed',
	'revreview-depth'              => 'Donder',
	'revreview-depth-0'            => 'Ket aprouet',
	'revreview-depth-1'            => 'Diazez',
	'revreview-depth-2'            => 'Etre',
	'revreview-depth-3'            => 'Uhel',
	'revreview-depth-4'            => 'Heverk',
	'revreview-edit'               => 'Brouilhed kemmoù',
	'revreview-edited'             => "'''Ebarzhet e vo an degasadennoù er [[{{MediaWiki:Validationpage}}|stumm stabil]] ur wezh bet gwiriekaet gant un implijer aotreet.
A-is emañ ar ''brouilhed''.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|change|kemm}}] a c'hortoz bezañ kadarnaet.",
	'revreview-invalid'            => "'''Pal direizh :''' n'eus [[{{MediaWiki:Validationpage}}|stumm adwelet ebet]] o klotañ gant an niverenn merket.",
	'revreview-log'                => 'Notenn :',
	'revreview-newest-basic'       => "An [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} adweladenn gwelet da ziwezhañ] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} diskouez an holl]) a oa [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|kemm|kemm}}] {{PLURAL:$3|a c'houlenn|a c'houlenn}} bezañ adwelet.",
	'revreview-newest-quality'     => "An [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} diwezhañ stumm a-feson] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]) a oa bet [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|c'hemm|kemm}}] {{PLURAL:$3|a c'houlenn|a c'houlenn}} bezañ adwelet.",
	'revreview-noflagged'          => "N'eus stumm reizhet ebet eus ar bajenn-mañ, setu marteze n'eo '''ket''' bet [[{{MediaWiki:Validationpage}}|gwiriekaet]] he ferzhioù.",
	'revreview-note'               => 'Skrivet eo bet an notennoù-mañ gant [[User:$1]] e-ser [[{{MediaWiki:Validationpage}}|adwelet]] ar stumm :',
	'revreview-oldrating'          => 'E boentadur :',
	'revreview-patrolled'          => 'Merket evel patrouilhet eo bet ar stumm diuzet eus [[:$1|$1]].',
	'revreview-quality'            => "Setu an diwezhañ stumm [[{{MediaWiki:Validationpage}}|a-feson]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gant ar [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouilhed] ez eus [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|c'hemm|kemm}}] a c'hortoz bezañ adwelet.",
	'revreview-quality-old'        => "Hemañ zo ur stumm [[{{MediaWiki:Validationpage}}|a-feson]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Kemmoù] nevez zo bet graet.",
	'revreview-quality-same'       => "Setu an diwezhañ stumm [[{{MediaWiki:Validationpage}}|a-feson]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} gwelet an holl]),
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>.
Gallout a ra ar bajenn bezañ '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} kemmet]'''.",
	'revreview-quality-source'     => "Ur [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} stumm a-feson] eus ar bajenn-mañ, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] d'an <i>$2</i>, zo bet diazezet er-maez eus ar stumm-mañ.",
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|gwelet]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} gwelet brouilhed]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Pennad gwelet]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} gwelet brouilhed]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Pennad gwelet]]'''",
	'revreview-quick-invalid'      => "'''Niverenn stumm direizh'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Stumm red]]''' (n'eo ket bet adwelet)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Pennad a-feson]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} gwelet brouilhed]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Pennad a-feson]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} gwelet brouilhed]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pennad a-feson]]'''",
	'revreview-quick-see-basic'    => "'''Brouilhed''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} gwelet ar pennad]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} keñveriañ])",
	'revreview-quick-see-quality'  => "'''Brouilhed''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} gwelet ar pennad]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} keñveriañ])",
	'revreview-source'             => 'Mammenn ar brouilhed',
	'revreview-stable'             => 'Stabil',
	'revreview-style'              => 'Lennuster',
	'revreview-style-0'            => 'Ket aprouet',
	'revreview-style-1'            => 'Degemeradus',
	'revreview-style-2'            => 'Mat',
	'revreview-style-3'            => 'Krenn',
	'revreview-style-4'            => 'Heverk',
	'revreview-submit'             => 'Enrollañ an adweladenn',
	'revreview-toggle-title'       => 'diskouez/kuzhat munudoù',
	'revreview-update'             => "Mar plij [[{{MediaWiki:Validationpage}}|adwelit]] an holl gemmoù ''(diskouezet a-is)'' bet graet abaoe ma oa bet [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] ar stumm stabil diwezhañ.

'''Hizivaet e oa bet patromoù/skeudennoù zo :'''",
	'revreview-update-none'        => "Mar plij [[{{MediaWiki:Validationpage}}|adwelit]] an holl gemmoù ''(diskouezet a-is)'' bet graet abaoe ma oa bet [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprouet] ar stumm stabil diwezhañ.",
	'rights-editor-autosum'        => 'emanvet',
	'stable-logpage'               => 'Marilh ar stummoù stabil',
	'tooltip-ca-current'           => "Gwelet brouilhed ar bajenn-mañ evel m'emañ evit poent",
	'tooltip-ca-default'           => 'Arventennoù Kontrolliñ ar Berzhded',
	'tooltip-ca-stable'            => 'Gwelet stumm stabil ar bajenn',
	'validationpage'               => '{{ns:help}} : Gwiriekaat ar pennad',
);

/** Catalan (Català)
 * @author Jordi Roqué
 * @author SMP
 * @author Toniher
 * @author Siebrand
 * @author Juanpabl
 */
$messages['ca'] = array(
	'editor'                       => 'Editor',
	'flaggedrevs'                  => 'Revisions senyalades',
	'flaggedrevs-backlog'          => "Bi ha un rechistro de fainas rezagatas en a [[Special:OldReviewedPages|lista de pachinas biellas rebisatas]]. '''Se i requiere o suyo ficazio'''",
	'flaggedrevs-desc'             => "Dóna als editors/revisors l'habilitat de validar revisions de pàgines i declarar-les estables.",
	'flaggedrevs-prefs'            => 'Estabilitat',
	'flaggedrevs-prefs-stable'     => "Per defecte, mostra sempre la versió estable de les pàgines de contingut (si n'hi ha)",
	'flaggedrevs-prefs-watch'      => 'Posar a la meva llista de seguiment les pàgines que revisi',
	'group-editor'                 => 'Editors',
	'group-editor-member'          => 'Editor',
	'group-reviewer'               => 'Supervisors',
	'group-reviewer-member'        => 'Supervisor',
	'grouppage-reviewer'           => '{{ns:project}}:Supervisor',
	'hist-quality'                 => 'versió de qualitat',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validada] per [[User:$3|$3]]',
	'hist-stable'                  => 'versió revisada',
	'review-diff2stable'           => 'Visualitza els canvis entre les revisions estable i actual',
	'review-logentry-app'          => '[[$1]] revisat',
	'review-logpage'               => 'Registre de revisió',
	'reviewer'                     => 'Supervisor',
	'revisionreview'               => 'Revisa les revisions',
	'revreview-auto'               => '(automàtic)',
	'revreview-auto-w'             => "Esteu modificant una revisio estable; els canvis seran '''revisats automàticament'''.",
	'revreview-auto-w-old'         => "Esteu modificant una edició revisada; els canvis seran '''revisats automàticament'''.",
	'revreview-basic'              => "Aquesta és l'última versió [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} versió actual] és la que pot ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|canvi|canvis}}] {{PLURAL:$3|espera|esperen}} revisió.",
	'revreview-current'            => 'actual',
	'revreview-edit'               => "edita l'actual",
	'revreview-flag'               => 'Revisa aquesta revisió',
	'revreview-log'                => 'Comentari:',
	'revreview-newest-basic'       => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió revisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|canvi|canvis}}] que {{PLURAL:$3|necessita|necessiten}} revisió.",
	'revreview-newest-basic-i'     => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió revisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} canvis de plantilla o d'imatge] que necessiten revisió.",
	'revreview-newest-quality'     => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|canvi|canvis}}] que {{PLURAL:$3|necessita|necessiten}} revisió.",
	'revreview-newest-quality-i'   => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} canvis de plantilla o d'imatge] que necessiten revisió.",
	'revreview-noflagged'          => "No hi ha versions revisades d'aquesta pàgina i, per tant, pot '''no''' haver estat [[{{MediaWiki:Validationpage}}|comprovada]] la seva qualitat.",
	'revreview-note'               => '[[User:$1]] va fer les notes següents quan [[{{MediaWiki:Validationpage}}|va repassar]] aquesta revisió:',
	'revreview-oldrating'          => 'Estava valorada:',
	'revreview-patrol'             => 'Marca aquest canvi com a patrullat',
	'revreview-patrol-title'       => 'Marca com a patrullat',
	'revreview-patrolled'          => 'La revisió seleccionada de [[:$1|$1]] ha estat marcada com a patrullada.',
	'revreview-quality'            => "Aquesta és l'última versió [[{{MediaWiki:Validationpage}}|de qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} versió actual] és la que pot ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|canvi|canvis}}] {{PLURAL:$3|espera|esperen}} revisió.",
	'revreview-quality-old'        => "Aquesta és una revisió de [[{{MediaWiki:Validationpage}}|qualitat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} llista completa]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>.
S'hi poden haver fet [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} canvis].",
	'revreview-quality-same'       => 'Aquesta és la darrera revisió de [[{{MediaWiki:Validationpage}}|qualitat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} llista completa]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>.',
	'revreview-quality-title'      => 'Article de qualitat',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Revisada]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vegeu la versió actual]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Article revisat]]'''",
	'revreview-quick-none'         => "'''Actual'''. No hi ha versions revisades.",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Qualitat]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vegeu la versió actual]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Article de qualitat]]'''",
	'revreview-quick-see-basic'    => "'''Actual'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vegeu la versió estable]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|canvi|canvis}}])",
	'revreview-quick-see-quality'  => "'''Actual'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vegeu la versió de qualitat]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|canvi|canvis}}])",
	'revreview-source'             => "Codi de l'actual",
	'revreview-stable'             => 'Pàgina estable',
	'revreview-style-1'            => 'Acceptable',
	'revreview-style-2'            => 'Bo',
	'revreview-submit'             => 'Tramet la revisió',
	'revreview-toggle-title'       => 'Mostra/amaga detalls',
	'revreview-update'             => "Si us plau, [[{{MediaWiki:Validationpage}}|reviseu]] els canvis ''(indicats a sota)'' fets des que la versió estable va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].

'''Algunes plantilles o imatges han canviat:'''",
	'revreview-update-includes'    => "'''Algunes plantilles o imatges han estat actualitzades:'''",
	'revreview-update-none'        => "Si us plau, [[{{MediaWiki:Validationpage}}|repasseu]] els canvis ''(mostrats a continuació)'' fets des que la revisió estable va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].",
	'right-movestable'             => 'Moure pàgines estables',
	'right-review'                 => 'Marqueu les revisions com a vistes',
	'right-stablesettings'         => 'Configureu com es selecciona i mostra la versió estable',
	'rights-editor-revoke'         => "tret el nivell d'editor a [[$1]]",
	'stable-logpage'               => "Registre d'estabilitat",
	'tooltip-ca-current'           => "Vegeu l'actual proposta per aquesta pàgina",
	'tooltip-ca-stable'            => 'Vegeu la versió estable de la pàgina',
);

/** Czech (Česky)
 * @author Li-sung
 * @author Danny B.
 * @author Siebrand
 * @author Matěj Grabovský
 * @author Mormegil
 */
$messages['cs'] = array(
	'editor'                       => 'Editor',
	'flaggedrevs'                  => 'Označování verzí',
	'flaggedrevs-desc'             => 'Umožňuje editorům a posuzovatelům hodnotit verze a stabilizovat stránky',
	'flaggedrevs-prefs'            => 'Stabilita',
	'group-editor'                 => 'Editoři',
	'group-editor-member'          => 'Editor',
	'group-reviewer'               => 'Posuzovatelé',
	'group-reviewer-member'        => 'Posuzovatel',
	'grouppage-editor'             => '{{ns:Project}}:Editor',
	'grouppage-reviewer'           => '{{ns:project}}:Posuzovatel',
	'hist-quality'                 => 'kvalitní verze',
	'hist-stable'                  => 'prohlédnutá verze',
	'review-diff2stable'           => 'Zobrazit změny mezi stabilní a současnou verzí',
	'review-logentry-app'          => 'posuzuje stránku $1',
	'review-logentry-dis'          => 'odmítá verzi stránky $1',
	'review-logentry-id'           => 'ID verze $1',
	'review-logpage'               => 'Kniha označování verzí',
	'review-logpagetext'           => 'Tato kniha zobrazuje změny [[{{MediaWiki:Makevalidate-page}}|schválení]] verzí stránek.
Pro seznam schválených stránek se podívejte na [[Special:ReviewedPages|seznam prohlédnutých stránek]].',
	'reviewer'                     => 'Posuzovatel',
	'revisionreview'               => 'Posouzení verzí',
	'revreview-accuracy'           => 'Stav',
	'revreview-accuracy-0'         => 'neschváleno',
	'revreview-accuracy-1'         => 'prohlédnuto',
	'revreview-accuracy-2'         => 'překontrolováno',
	'revreview-accuracy-3'         => 'dobře ozdrojováno',
	'revreview-accuracy-4'         => 'doporučeno',
	'revreview-approved'           => 'Schválené',
	'revreview-auto'               => '(automaticky)',
	'revreview-auto-w'             => "Editujete stabilní verzi, změny budou '''automaticky označeny jako posouzené'''.",
	'revreview-auto-w-old'         => "Editujete starou posouzenou verzi, změny budou '''automaticky označeny jako posouzené'''.",
	'revreview-basic'              => 'Toto je poslední [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
V [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrhu]  {{PLURAL:$3|je|jsou|je}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|čekající|čekající|čekajících}} na posouzení.',
	'revreview-basic-old'          => 'Toto je [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]) Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
Možná byly provedeny nové [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} změny].',
	'revreview-basic-same'         => 'Toto je poslední  [[{{MediaWiki:Validationpage}}|prohlédnutá]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upravit].',
	'revreview-basic-source'       => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Prohlédnutá verze] této stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>, vychází z této verze.',
	'revreview-changed'            => "'''Požadovanou akci nelze provést na této verzi stránky [[:$1|$1]].'''

Šablona nebo obrázek byly vyžádány na neurčitou verzi. To se může stát pokud dynamická šablona vkládá jinou šablonu nebo obrázek v závislosti na proměnné, která se změnila zatímco jste posuzovali stránku. Obnovte stránku a znovu ji posuďte.",
	'revreview-current'            => 'Návrh',
	'revreview-depth'              => 'Hloubka',
	'revreview-depth-0'            => 'Neschváleno',
	'revreview-depth-1'            => 'Základní',
	'revreview-depth-2'            => 'Mírná',
	'revreview-depth-3'            => 'Vysoká',
	'revreview-depth-4'            => 'Význačná',
	'revreview-edit'               => 'Editovat návrh',
	'revreview-edited'             => "'''Editace budou začleněny do [[{{MediaWiki:Validationpage}}|stabilní verze]], jakmile je posoudí pověřený uživatel.
Níže je zobrazen aktuální ''návrh'' stránky.",
	'revreview-flag'               => 'Posoudit tuto verzi',
	'revreview-invalid'            => "'''Neplatný cíl:''' žádná [[{{MediaWiki:Validationpage}}|posouzená]] verze neodpovídá zadanému ID.",
	'revreview-legend'             => 'Ohodnoťte obsah verze',
	'revreview-log'                => 'Komentář:',
	'revreview-main'               => 'Pro posouzení musíte vybrat určitou verzi stránky. Vizte [[Special:Unreviewedpages|seznam neposouzených stránek]].',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední prohlédnutá verze] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|potřebuje|potřebují|potřebuje}} posoudit.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslední kvalitní verze] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]) byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|potřebuje|potřebují|potřebuje}} posoudit.',
	'revreview-noflagged'          => 'Tato stránka nemá žádné posouzené verze, takže dosud nebyla [[{{MediaWiki:Validationpage}}|zkontrolována]] kvalita.',
	'revreview-note'               => 'Uživatel [[User:$1|$1]] doplnil své [[{{MediaWiki:Validationpage}}|posouzení]] této verze následující poznámkou:',
	'revreview-notes'              => 'Poznámky k zobrazení:',
	'revreview-oldrating'          => 'Bylo ohodnoceno:',
	'revreview-patrol'             => 'Označit tuto změnu jako prověřenou',
	'revreview-patrolled'          => 'Vybraná verze stránky [[:$1|$1]] byla označena jako prověřená.',
	'revreview-quality'            => 'Toto je poslední [[{{MediaWiki:Validationpage}}|kvalitní]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
V [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrhu]  {{PLURAL:$3|je|jsou|je}} [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|změna|změny|změn}}] {{PLURAL:$3|čekající|čekající|čekajících}} na posouzení.',
	'revreview-quality-old'        => 'Toto je [[{{MediaWiki:Validationpage}}|kvalitní]] verze ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} seznam všech]). Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. 
Možná byly provedeny nové [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} změny].',
	'revreview-quality-same'       => 'Toto je poslední  [[{{MediaWiki:Validationpage}}|kvalitní]] verze. Byla [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválena] <i>$2</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upravit].',
	'revreview-quality-source'     => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Kvalitní verze] této stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>, vychází z této verze.',
	'revreview-quality-title'      => 'Kvalitní článek',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Prohlédnuto]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Vizte nejnovější verzi]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Prohlédnutý článek]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobrazit návrh]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Prohlédnutá]]''' (žádné nezkontrolované změny)",
	'revreview-quick-invalid'      => "'''Neplatná identifikace verze'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Nejnovější verze]]''' (dosud neposouzeno)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Kvalitní]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Vizte nejnovější verzi]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Kvalitní článek]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobrazit návrh]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitní]]''' (žádné nezkontrolované změny)",
	'revreview-quick-see-basic'    => "'''Návrh''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobrazit článek]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} porovnání])",
	'revreview-quick-see-quality'  => "'''Návrh''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobrazit článek]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} porovnání])",
	'revreview-selected'           => "Vybrané verze stránky '''$1:'''",
	'revreview-source'             => 'zdroj návrhu',
	'revreview-stable'             => 'Stabilní stránka',
	'revreview-style'              => 'Čitelnost',
	'revreview-style-0'            => 'Neschváleno',
	'revreview-style-1'            => 'Přijatelná',
	'revreview-style-2'            => 'Dobrá',
	'revreview-style-3'            => 'Výstižná',
	'revreview-style-4'            => 'Význačná',
	'revreview-submit'             => 'Odeslat posouzení',
	'revreview-text'               => 'Stabilní verze je nastavena jako výchozí zobrazený obsah před nejnovější verzí.',
	'revreview-toggle-title'       => 'skrýt/zobrazit detaily',
	'revreview-toolow'             => 'Aby byla verze označena jako posouzená, musíte označit každou vlastnost lepším hodnocením než "neschváleno". Pokud chcete verzi odmítnout nechte ve všech polích hodnocení "neschváleno".',
	'revreview-update'             => "[[{{MediaWiki:Validationpage}}|Posuďte]]  všechny změny ''(zobrazené níže)'' provedené od posledního [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválení] stabilní verze.

'''Některé šablony nebo obrázky byly změněny: '''",
	'revreview-update-none'        => "[[{{MediaWiki:Validationpage}}|Posuďte]] všechny změny ''(zobrazené níže)'' provedené od posledního [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválení] stabilní verze.",
	'revreview-visibility'         => 'Tato stránka má [[{{MediaWiki:Validationpage}}|stabilní verzi]], kterou lze [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} nastavit].',
	'right-movestable'             => 'Přesunout stabilní stránky',
	'rights-editor-revoke'         => 'odebírá status editora uživateli [[$1]]',
	'specialpages-group-quality'   => 'Zajištění kvality',
	'stable-logentry'              => 'nastavuje výběr stabilní verze stránky [[$1]]',
	'stable-logentry2'             => 'vrací výchozí výběr stabilní verze stránky [[$1]]',
	'stable-logpage'               => 'Kniha stabilních verzí',
	'stable-logpagetext'           => 'Toto je záznam změn nastavení [[{{MediaWiki:Validationpage}}|stabilní verze]] stránek.',
	'tooltip-ca-current'           => 'Zobrazit nejnovější návrh této stránky',
	'tooltip-ca-default'           => 'Nastavení stabilní a zobrazované verze',
	'tooltip-ca-stable'            => 'Zobrazit stabilní verzi této stránky',
	'validationpage'               => '{{ns:help}}:Stabilní verze',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'revreview-auto' => '(automatisk)',
);

/** German (Deutsch)
 * @author Raimond Spekking
 */
$messages['de'] = array(
	'editor'                       => 'Sichter',
	'flaggedrevs'                  => 'Markierte Versionen',
	'flaggedrevs-backlog'          => 'Die [[Special:OldReviewedPages|Liste der Seiten mit ungesichteten Versionen]] ist sehr lang. Bitte hilf mit, sie abzuarbeiten. Danke.',
	'flaggedrevs-desc'             => 'Markierte Versionen',
	'flaggedrevs-pref-UI-0'        => 'Benutze für markierte Versionen die detaillierte Benutzerschnittstelle',
	'flaggedrevs-pref-UI-1'        => 'Benutze für markierte Versionen die einfache Benutzerschnittstelle',
	'flaggedrevs-prefs'            => 'Markierte Versionen',
	'flaggedrevs-prefs-stable'     => 'Zeige als Standard immer die markierte Version einer Seite (falls vorhanden)',
	'flaggedrevs-prefs-watch'      => 'Selbst markierte Seiten automatisch beobachten',
	'group-editor'                 => 'Sichter',
	'group-editor-member'          => 'Sichter',
	'group-reviewer'               => 'Prüfer',
	'group-reviewer-member'        => 'Prüfer',
	'grouppage-editor'             => '{{ns:project}}:Sichter',
	'grouppage-reviewer'           => '{{ns:project}}:Prüfer',
	'hist-draft'                   => 'Entwurfsversion',
	'hist-quality'                 => 'geprüfte Version',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} geprüft] von [[User:$3|$3]]',
	'hist-stable'                  => 'gesichtete Version',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} gesichtet] von [[User:$3|$3]]',
	'review-diff2stable'           => 'Unterschiede zwischen der markierten und der aktuellen Version ansehen',
	'review-logentry-app'          => 'markierte „[[$1]]“',
	'review-logentry-dis'          => 'entfernte eine Markierung von „[[$1]]“',
	'review-logentry-id'           => 'Versions-ID $1',
	'review-logentry-diff'         => 'Unterschied zur gesichteten Version',
	'review-logpage'               => 'Versionsmarkierungs-Logbuch',
	'review-logpagetext'           => 'In diesem Logbuch werden die [[{{MediaWiki:Validationpage}}|Sichtungen und Prüfungen]] von Artikelversionen protokolliert.
	Siehe die [[Special:ReviewedPages|Liste markierter Versionen]].',
	'reviewer'                     => 'Prüfer',
	'revisionreview'               => 'Versionsprüfung',
	'revreview-accuracy'           => 'Status',
	'revreview-accuracy-0'         => 'nicht freigegeben',
	'revreview-accuracy-1'         => 'gesichtet',
	'revreview-accuracy-2'         => 'geprüft',
	'revreview-accuracy-3'         => 'Quellen geprüft',
	'revreview-accuracy-4'         => 'exzellent',
	'revreview-approved'           => 'Freigegeben',
	'revreview-auto'               => '(automatisch)',
	'revreview-auto-w'             => "Du bearbeitest eine gesichtete Version; Bearbeitungen werden '''automatisch als gesichtet''' markiert.",
	'revreview-auto-w-old'         => "Du bearbeitest eine gesichtete Version; Bearbeitungen werden '''automatisch als gesichtet''' markiert.",
	'revreview-basic'              => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|gesichtete]] Version.
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|Änderung steht|Änderungen stehen}}] noch zur Sichtung an.',
	'revreview-basic-i'            => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|gesichtete]] Version, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
	Der [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Entwurf] enthält [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Änderungen an Vorlagen/Dateien], die auf eine Sichtung warten.',
	'revreview-basic-old'          => 'Dies ist eine [[{{MediaWiki:Validationpage}}|gesichtete]] Version ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} → alle]), 
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
	Neue [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Änderungen] können vorgenommen worden sein.',
	'revreview-basic-same'         => "Dies ist die letzte [[{{MediaWiki:Validationpage}}|gesichtete]] Version,
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zeige alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>. Die Seite kann '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bearbeitet]''' werden.",
	'revreview-basic-source'       => 'Eine [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} gesichtete Version] dieser Seite, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>, basiert auf dieser Version.',
	'revreview-changed'            => "'''Die Aktion konnte nicht auf die Version von [[:$1|$1]] angewendet werden.'''

	Eine Vorlage oder ein Bild wurden ohne spezifische Versionsnummer angefordert. Dies kann passieren,
	wenn eine dynamische Vorlage eine weitere Vorlage oder ein Bild einbindet, das von einer Variable abhängig ist, die
	sich seit Beginn der Markierung verändert hat. Ein Neuladen der Seite und Neustart der Markierung kann das Problem beheben.",
	'revreview-current'            => 'Entwurf',
	'revreview-depth'              => 'Tiefe',
	'revreview-depth-0'            => 'nicht freigegeben',
	'revreview-depth-1'            => 'einfach',
	'revreview-depth-2'            => 'mittel',
	'revreview-depth-3'            => 'hoch',
	'revreview-depth-4'            => 'exzellent',
	'revreview-draft-title'        => 'Ungesichteter Artikel',
	'revreview-edit'               => 'Entwurf bearbeiten',
	'revreview-edited'             => 'Neue Bearbeitungen werden als [[{{MediaWiki:Validationpage}}|gesichtete Version]] übernommen, sobald ein Benutzer mit Sichtungsrecht diese freigegeben hat.
	Es folgt die Anzeige der aktuellen, ungesichteten Version. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|Änderung steht|Änderungen stehen}}] zur Sichtung an.',
	'revreview-flag'               => 'Markiere Version',
	'revreview-invalid'            => "'''Ungültiges Ziel:''' keine [[{{MediaWiki:Validationpage}}|gesichtete]] Artikelversion der angegebenen Versions-ID.",
	'revreview-legend'             => 'Inhalt der Version bewerten',
	'revreview-log'                => 'Kommentar:',
	'revreview-main'               => 'Du musst eine Artikelversion zur Markierung auswählen.

	Siehe [[{{ns:special}}:Unreviewedpages]] für eine Liste unmarkierter Versionen.',
	'revreview-newest-basic'       => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} → alle]) wurde am <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|Version|Versionen}}] {{PLURAL:$3|steht|stehen}} noch zur Sichtung an.',
	'revreview-newest-basic-i'     => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alle]) wurde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Änderungen an Vorlagen/Bildern] stehen noch zur Sichtung an.',
	'revreview-newest-quality'     => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte geprüfte Version]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} → alle]) wurde am <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|Version|Versionen}}] {{PLURAL:$3|steht|stehen}} noch zur Sichtung an.',
	'revreview-newest-quality-i'   => 'Die [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte geprüfte Version] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alle]) wurde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Änderungen an Vorlagen/Bildern] stehen noch zur Sichtung an.',
	'revreview-noflagged'          => 'Von dieser Seite gibt es keine markierten Versionen, so dass noch keine Aussage über die [[{{MediaWiki:Validationpage}}|Qualität]] gemacht werden kann.',
	'revreview-note'               => '[[{{ns:user}}:$1]] machte die folgende [[{{MediaWiki:Validationpage}}|Prüfnotiz]] zu dieser Version:',
	'revreview-notes'              => 'Anzuzeigende Bemerkungen oder Notizen:',
	'revreview-oldrating'          => 'Bisherige Einstufung:',
	'revreview-patrol'             => 'Kontrolliere diese Änderung',
	'revreview-patrol-title'       => 'Als kontrolliert markieren',
	'revreview-patrolled'          => 'Die ausgewählte Version von [[:$1|$1]] wurde kontrolliert.',
	'revreview-quality'            => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|geprüfte]] Version.
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|Änderung steht|Änderungen stehen}}] noch zur Prüfung an.',
	'revreview-quality-i'          => 'Dies ist die letzte [[{{MediaWiki:Validationpage}}|geprüfte]] Version, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>.
	Der [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Entwurf] enthält [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Änderungen an Vorlagen/Dateien], die auf eine Sichtung warten.',
	'revreview-quality-old'        => 'Dies ist eine [[{{MediaWiki:Validationpage}}|geprüfte]]  Version ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} → alle]), 
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] <i>$2</i>.
	Neue [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Änderungen] können vorgenommen worden sein.',
	'revreview-quality-same'       => "Dies ist die letzte  [[{{MediaWiki:Validationpage}}|geprüfte]] Version,
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zeige alle]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] <i>$2</i>. Die Seite kann '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bearbeitet]''' werden.",
	'revreview-quality-source'     => 'Eine [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} geprüfte Version] dieser Seite, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] am <i>$2</i>, basiert auf dieser Version.',
	'revreview-quality-title'      => 'Geprüfter Artikel',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Gesichtet]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zur aktuellen Version])",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Gesichtet]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} letzte unmarkierte Seite])",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Gesichtet]]'''",
	'revreview-quick-invalid'      => "'''Ungültige Versions-ID'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Keine Version gesichtet.]]",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Geprüft]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zur aktuellen Version])",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Geprüft]]''' ([{{fullurl:{{FULLPAGENAMEE}}|stable=0}}} letzte unmarkierte Seite])",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Geprüft]]'''",
	'revreview-quick-see-basic'    => "'''[[{{MediaWiki:Validationpage}}|Ungesichtete Version]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version]]
	([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} vergleiche])",
	'revreview-quick-see-quality'  => "'''[[{{MediaWiki:Validationpage}}|Ungesichtete Version]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letzte gesichtete Version]]
	([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} vergleiche])",
	'revreview-selected'           => "Gewählte Version von '''$1:'''",
	'revreview-source'             => 'Quelltext',
	'revreview-stable'             => 'Artikel',
	'revreview-stable-title'       => 'Gesichteter Artikel',
	'revreview-stable1'            => 'Möchtest du die [{{fullurl:$1|stableid=$2}} soeben markierte Version] dieser Seite sehen, falls es jetzt die [{{fullurl:$1|stable=1}} gesichtete Version] dieser Seite ist?',
	'revreview-stable2'            => 'Möchtest du die [{{fullurl:$1|stable=1}} gesichtete Version] dieser Seite sehen (falls es noch eine gibt)?.',
	'revreview-style'              => 'Lesbarkeit',
	'revreview-style-0'            => 'nicht freigegeben',
	'revreview-style-1'            => 'akzeptabel',
	'revreview-style-2'            => 'gut',
	'revreview-style-3'            => 'präzise',
	'revreview-style-4'            => 'exzellent',
	'revreview-submit'             => 'Markierung speichern',
	'revreview-successful'         => "'''Die ausgewählte Version von [[:$1|$1]] wurde erfolgreich markiert ([{{fullurl:Special:Stableversions|page=$2}} siehe alle gesichteten Versionen])'''.",
	'revreview-successful2'        => "'''Die Markierung der ausgewählten Version von [[:$1|$1]] wurde erfolgreich aufgehoben.'''",
	'revreview-text'               => "''Einer [[{{MediaWiki:Validationpage}}|gesichteten Version]] wird bei der Seitendarstellung der Vorzug vor einer neueren Version gegeben.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Gesichtete Versionen]] können als Standardanzeige für Leser eingestellt werden.''",
	'revreview-toggle'             => '(+/−)',
	'revreview-toggle-title'       => 'zeige/verstecke Details',
	'revreview-toolow'             => 'Du musst für jedes der untenstehenden Attribute einen Wert höher als „{{int:revreview-accuracy-0}}“ einstellen,
	damit eine Version als gesichtet gilt. Um eine Version zu verwerfen, müssen alle Attribute auf „{{int:revreview-accuracy-0}}“ stehen.',
	'revreview-update'             => "Bitte [[{{MediaWiki:Validationpage}}|sichte]] die Änderungen ''(siehe unten),'' seitdem die letzte gesichtete Version [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] wurde.<br />
	'''Die folgenden Vorlagen und Bilder wurden verändert:'''",
	'revreview-update-includes'    => "'''Einige Vorlagen/Bilder wurden aktualisiert:'''",
	'revreview-update-none'        => "Bitte [[{{MediaWiki:Validationpage}}|sichte]] die Änderungen ''(siehe unten),'' seitdem die letzte gesichtete Version [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} freigegeben] wurde.",
	'revreview-update-use'         => "'''Bitte beachten:''' Falls eine dieser Vorlagen/Bilder eine gesichtete Version hat, wird diese in der gesichteten Version dieser Seite angezeigt.",
	'revreview-diffonly'           => "''Um diese Seite zu sichten, klicke bitte auf den Link „Aktuelle Version“ und verwende die Sichtungsbox dort.''",
	'revreview-visibility'         => 'Diese Seite hat eine [[{{MediaWiki:Validationpage}}|markierte Version]];
	die Einstellungen können über die [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} Spezialseite] konfiguriert werden.',
	'right-autopatrolother'        => 'Automatisches Markieren von Versionen im Nicht-Hauptnamensraum als kontrolliert',
	'right-autoreview'             => 'Automatisches Markieren von Versionen als gesichtet',
	'right-movestable'             => 'Verschieben von gesichteten und geprüften Seiten',
	'right-review'                 => 'Markiere Versionen als gesichtet',
	'right-stablesettings'         => 'Konfiguration der Anzeige markierter Versionen',
	'right-validate'               => 'Markiere Versionen als geprüft',
	'rights-editor-autosum'        => 'automatisch erteilt',
	'rights-editor-revoke'         => 'entfernte Prüfer-Status von „[[$1]]“',
	'specialpages-group-quality'   => 'Qualitätssicherung',
	'stable-logentry'              => 'konfigurierte die Seiten-Einstellung von „[[$1]]“',
	'stable-logentry2'             => 'setzte die Seiten-Einstellung für „[[$1]]“ zurück',
	'stable-logpage'               => 'Seitenkonfigurations-Logbuch',
	'stable-logpagetext'           => 'Dies ist das Änderungs-Logbuch der Konfigurationseinstellungen der [[{{MediaWiki:Validationpage}}|Markierten Versionen]].
	Siehe auch die [[Special:StablePages|Liste markierter Versionen]].',
	'tooltip-ca-current'           => 'Ansehen der aktuellen, unmarkierten Seite',
	'tooltip-ca-default'           => 'Einstellungen der Artikel-Qualität',
	'tooltip-ca-stable'            => 'Ansehen der markierten Version dieser Seite',
	'validationpage'               => '{{ns:help}}:Gesichtete und geprüfte Versionen',
);

/** Greek (Ελληνικά)
 * @author Badseed
 * @author ZaDiak
 * @author Consta
 */
$messages['el'] = array(
	'editor'                  => 'Συντάκτης',
	'flaggedrevs-desc'        => 'Δίνει τη δυνατότητα στους συντάκτες και τους επανεξεταστές να αξιολογίσουν εκδόσεις και να σταθεροποιήσουν σελίδες',
	'group-editor'            => 'Επεξεργαστές',
	'group-editor-member'     => 'Επεξεργαστής',
	'group-reviewer'          => 'Επανεξεταστές',
	'group-reviewer-member'   => 'Επανεξεταστής',
	'grouppage-editor'        => '{{ns:project}}:Συντάκτης',
	'grouppage-reviewer'      => '((ns:project}}:Επανεξεταστής',
	'hist-quality'            => 'έκδοση ποιότητας',
	'hist-stable'             => 'θεάσιμη έκδοση',
	'review-logentry-app'     => 'αναθεωρημένο [[$1]]',
	'reviewer'                => 'Επανεξεταστής',
	'revisionreview'          => 'Θεώρηση εκδόσεων',
	'revreview-auto'          => '(αυτόματο)',
	'revreview-auto-w-old'    => "Επεξεργάζεσαι μια παλιά αναθεωρημένη επανάληψη. Οι αλλαγές θα '''αναθεωρηθούν αυτόματα'''.",
	'revreview-current'       => 'Προσχέδιο',
	'revreview-edit'          => 'Επεξεργασία προσχεδίου',
	'revreview-flag'          => 'Επιθεώρησε αυτή την τροποποίηση',
	'revreview-legend'        => 'Βαθμολόγησε το περιεχόμενο της τροποποίησης',
	'revreview-log'           => 'Σχόλιο:',
	'revreview-oldrating'     => 'Βαθμολογήθηκε:',
	'revreview-patrol'        => 'Μάρκαρε αυτήν την αλλαγή ως ελεγμένη',
	'revreview-quick-invalid' => "'''Άκυρος κωδικός αναθεώρησης'''",
	'revreview-selected'      => "Επιλεγμένη έκδοση του '''$1:'''",
	'revreview-source'        => 'Πηγή προσχεδίου',
	'revreview-stable'        => 'Σταθερό',
	'stable-logpage'          => 'Αρχείο καταγραφής σταθερών εκδόσεων',
	'tooltip-ca-current'      => 'Δείτε το υπάρχον προσχέδιο για αυτή τη σελίδα',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 * @author Siebrand
 * @author ArnoLagrange
 */
$messages['eo'] = array(
	'editor'                       => 'Redaktanto',
	'flaggedrevs'                  => 'Markitaj Revizioj',
	'flaggedrevs-backlog'          => "Estas nune amaso de [[Special:OldReviewedPages|malfreŝe kontrolitaj paĝoj]]. '''Via atento estas bezonata!'''",
	'flaggedrevs-desc'             => 'Rajtigas al redaktantoj kaj kontrolantoj la kapablon validigi reviziojn kaj stabiligi paĝojn',
	'flaggedrevs-pref-UI-0'        => 'Uzu detalan stabilan version por uzulinterfaco',
	'flaggedrevs-pref-UI-1'        => 'Uzu simplan uzulinterfacon de stabilaj versioj',
	'flaggedrevs-prefs'            => 'Stabileco',
	'flaggedrevs-prefs-stable'     => 'Ĉiam defaŭlte montri la stabilan version (se ĝi ekzistas)',
	'flaggedrevs-prefs-watch'      => 'Aldoni miajn kontrolitajn paĝojn al mia atentaro',
	'group-editor'                 => 'Redaktantoj',
	'group-editor-member'          => 'Redaktanto',
	'group-reviewer'               => 'Kontrolantoj',
	'group-reviewer-member'        => 'Kontrolanto',
	'grouppage-editor'             => '{{ns:project}}:Redaktanto',
	'grouppage-reviewer'           => '{{ns:project}}:Kontrolanto',
	'hist-draft'                   => 'malneta revizio',
	'hist-quality'                 => 'kvalita revizio',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validigita] de [[User:$3|$3]]',
	'hist-stable'                  => 'vidita revizio',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} vidita] de [[User:$3|$3]]',
	'review-diff2stable'           => 'Rigardi ŝanĝojn inter stabila kaj nuna revizioj',
	'review-logentry-app'          => 'kontrolis [[$1]]',
	'review-logentry-dis'          => 'evitinda versio de [[$1]]',
	'review-logentry-id'           => 'identigo de revizio $1',
	'review-logentry-diff'         => 'diferenco de stabila versio',
	'review-logpage'               => 'Kontroli protokolon',
	'review-logpagetext'           => 'Jen protokolo de ŝanĝoj al [[{{MediaWiki:Validationpage}}|aprobstatuso]] de revizioj por enhavaj paĝoj.
Rigardu la [[Special:ReviewedPages|liston de kontrolitaj paĝoj]] por listo de aprobitaj paĝoj.',
	'reviewer'                     => 'Kontrolanto',
	'revisionreview'               => 'Kontroli reviziojn',
	'revreview-accuracy'           => 'Fideleco',
	'revreview-accuracy-0'         => 'Malkonsentita',
	'revreview-accuracy-1'         => 'Vidita',
	'revreview-accuracy-2'         => 'Fidela',
	'revreview-accuracy-3'         => 'Bone fontita',
	'revreview-accuracy-4'         => 'Elstara',
	'revreview-approved'           => 'Konsentita',
	'revreview-auto'               => '(aŭtomata)',
	'revreview-auto-w'             => "Vi redaktas stabilan revizion. Ŝanĝoj estos '''aŭtomate kontrolitaj'''.",
	'revreview-auto-w-old'         => "Vi redaktas kontrolitan revizion. Ŝanĝoj estos '''aŭtomate kontrolitaj'''.",
	'revreview-basic'              => 'Jen la lasta [[{{MediaWiki:Validationpage}}|vidita]] revizio, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] atendas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|ŝanĝon|ŝanĝojn}}].',
	'revreview-basic-i'            => 'Jen la lasta [[{{MediaWiki:Validationpage}}|vidita]] revizio, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] atendas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} ŝablonajn/bildajn ŝanĝojn].',
	'revreview-basic-old'          => 'Jen [[{{MediaWiki:Validationpage}}|vidita]] revizio ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
Novaj [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} ŝanĝoj] eble estis faritaj.',
	'revreview-basic-same'         => 'Jen la lasta [[{{MediaWiki:Validationpage}}|vidita]] revizio ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.',
	'revreview-basic-source'       => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Vidita versio] de ĉi tiu paĝo, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>, estis bazita de ĉi tiu revizio.',
	'revreview-changed'            => "'''La petita ago ne povas esti farita por ĉi tiu revizio de [[:$1|$1]].'''

Ŝablono aŭ bildo verŝajne estis petita kiam nenia aparta versio estis petita.
Ĉi tiel okazon se dinamika ŝablono transinkluzivas alian bildon aŭ ŝablono dependa de
variablo kiu ŝanĝis ekde vi ekkontrolis ĉi tiun paĝon.
Refreŝigo de la paĝo kaj rekontrolo povas solvi ĉi tiun problemon.",
	'revreview-current'            => 'Malneto',
	'revreview-depth'              => 'Profundeco',
	'revreview-depth-0'            => 'Malaprobita',
	'revreview-depth-1'            => 'Baza',
	'revreview-depth-2'            => 'Modere',
	'revreview-depth-3'            => 'Grande',
	'revreview-depth-4'            => 'Elstara',
	'revreview-draft-title'        => 'Malneta artikolo',
	'revreview-edit'               => 'Redaktu malneton',
	'revreview-edited'             => "'''Redaktoj estos enmetitaj en la [[{{MediaWiki:Validationpage}}|stabilan version]] post kiam  ensalutinta uzulo kontrolis ilin.
La ''malneto'' estas montrita sube.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|ŝanĝo|ŝanĝoj}}] bezonas kontrolon.",
	'revreview-flag'               => 'Kontroli ĉi tiun revizion',
	'revreview-invalid'            => "'''Nevalida celo:''' neniu [[{{MediaWiki:Validationpage}}|kontrolita]] revizio kongruas la enigitan identigon.",
	'revreview-legend'             => 'Taksi enhavon de revizio',
	'revreview-log'                => 'Komento:',
	'revreview-main'               => 'Vi devas selekti apartan revizion de enhava paĝo por kontroli.

Vidu la paĝon [[Special:Unreviewedpages|NekontrolitaPaĝoj]] por listo de nekontrolitaj paĝoj.',
	'revreview-newest-basic'       => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plej lasta vidita revizio] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listigi ĉiujn]) estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|ŝanĝo|ŝanĝoj}}] bezonas kontrolon.',
	'revreview-newest-basic-i'     => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lasta vidita revizio] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]) estis  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} ŝablonaj/bildaj ŝanĝoj] atendas kontrolon.',
	'revreview-newest-quality'     => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} plej lasta bonkvalita revizio] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]) estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|ŝanĝo|ŝanĝoj}}] bezonas kontrolon.',
	'revreview-newest-quality-i'   => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lasta kvalita revizio] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]) estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Ŝablonaj/bildaj ŝanĝoj] bezonas kontrolon.',
	'revreview-noflagged'          => "Estas neniuj revizioj de ĉi tiu paĝo, do ĝi eble '''ne''' estis [[{{MediaWiki:Validationpage}}|kvalite kontrolita]].",
	'revreview-note'               => '[[User:$1|$1]] faris la jenan noton en [[{{MediaWiki:Validationpage}}|kontrolo]] de ĉi tiu revizio:',
	'revreview-notes'              => 'Rimarko aŭ notoj por montri:',
	'revreview-oldrating'          => 'Ĝi estis taksita:',
	'revreview-patrol'             => 'Marki ĉi tiun ŝanĝon kiel patrolitan',
	'revreview-patrol-title'       => 'Marki kiel patrolitan',
	'revreview-patrolled'          => 'La selektita revizio de [[:$1|$1]] estis markita kiel patrolita.',
	'revreview-quality'            => 'Jen la plej lasta [[{{MediaWiki:Validationpage}}|bonkvalita]] revizio, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|ŝanĝo|ŝanĝoj}}] atendas kontrolon.',
	'revreview-quality-i'          => 'Jen la lasta [[{{MediaWiki:Validationpage}}|bonkvalita]] revizio, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} malneto] atendas kontrolon de [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} ŝablonaj/bildaj ŝanĝoj].',
	'revreview-quality-old'        => 'Jen [[{{MediaWiki:Validationpage}}|bonkvalita]] revizio ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.
Novaj [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} ŝanĝoj] eble estis faritaj.',
	'revreview-quality-same'       => 'Jen la lasta [[{{MediaWiki:Validationpage}}|bonkvalita]] revizio ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} montri ĉiujn]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>.',
	'revreview-quality-source'     => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Bonkvalita versio] de ĉi tiu paĝo, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita] je <i>$2</i>, estis bazita de ĉi tiu revizio.',
	'revreview-quality-title'      => 'Bonkvalita artikolo',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Vidita artikolo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Vidita artikolo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Vidita artikolo]]'''",
	'revreview-quick-invalid'      => "'''Nevalida identigo de revizio'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Nuna revizio]]''' (nekontrolita)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Bonkvalita artikolo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Bonkvalita artikolo]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rigardi malneton]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Bonkvalita artikolo]]'''",
	'revreview-quick-see-basic'    => "'''Malneto''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} rigardi artikolon]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} kompari])",
	'revreview-quick-see-quality'  => "'''Malneto''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} rigardu artikolon]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} komparu])",
	'revreview-selected'           => "Elektis revizion de '''$1:'''",
	'revreview-source'             => 'malneta fonto',
	'revreview-stable'             => 'Stabila paĝo',
	'revreview-stable-title'       => 'Vidita artikolo',
	'revreview-stable1'            => 'Eble vi volus rigardi [{{fullurl:$1|stableid=$2}} ĉi tiun markitan version] por vidi ĉu ĝi nun estas la [{{fullurl:$1|stable=1}} stabila versio] de ĉi tiu paĝo.',
	'revreview-stable2'            => 'Eble vi volas rigardi la [{{fullurl:$1|stable=1}} stabilan version] de ĉi tiu paĝo (se ĝi ankoraŭ ekzistas).',
	'revreview-style'              => 'Legebleco',
	'revreview-style-0'            => 'Malaprobita',
	'revreview-style-1'            => 'Akceptinda',
	'revreview-style-2'            => 'Bona',
	'revreview-style-3'            => 'Konciza',
	'revreview-style-4'            => 'Elstara',
	'revreview-submit'             => 'Aldoni kontrolon',
	'revreview-successful'         => "'''Selektita revizio de [[:$1|$1]] sukcese markita. ([{{fullurl:Special:Stableversions|page=$2}} rigardi ĉiujn markitajn versiojn])'''",
	'revreview-successful2'        => "'''Selektita revizio de [[:$1|$1]] sukcese malmarkita.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Stabilaj versioj]] estas la defaŭlta enhavo por vidantoj anstataŭ la lasta revizio.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Stabilaj versioj]] estas kontrolita revizioj de paĝoj kaj povas defaŭlte montri tiun enhavon por legantoj.''",
	'revreview-toggle-title'       => 'montri/kaŝi detalojn',
	'revreview-toolow'             => 'Vi devas taksi ĉiun de la jenaj atribuoj almenaŭ pli alta ol "malaprobita" por revizio esti konsiderata kiel kontrolita.
Malvalidigi revizion, faru ĉiujn kampojn kiel "malaprobita".',
	'revreview-update'             => "Bonvolu [[{{MediaWiki:Validationpage}}|kontroli]] iuj ajn ŝanĝoj ''(sube montritaj)'' faritaj ekde la stabila revizio estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita].<br />
'''Iuj ŝablonoj/bildoj estis ĝisdatigitaj:'''",
	'revreview-update-includes'    => "'''Iuj ŝablonoj aŭ bildoj estis ĝisdatigitaj:'''",
	'revreview-update-none'        => "Bonvolu [[{{MediaWiki:Validationpage}}|kontroli]] iujn ajn ŝanĝoj ''(sube montrita)'' farita ekde la stabila revizio estis [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobita].",
	'revreview-update-use'         => "'''NOTU:''' Se iuj ajn de tiuj ŝablonoj/bildoj havas stabilan version, tiel ĝi jam estas uzita en la stabila versio de ĉi tiu paĝo.",
	'revreview-diffonly'           => "''Por kontroli la paĝon, klaku la ligilon \"nuna revizio\" kaj uzu la kontrolo-paĝon.''",
	'revreview-visibility'         => "'''Ĉi paĝo havas [[{{MediaWiki:Validationpage}}|stabilan version]]; preferoj por ĝi povas esti [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigurita].'''",
	'right-autopatrolother'        => 'Aŭtomate marki reviziojn ekster la ĉefaj nomspacoj kiel patrolitajn',
	'right-autoreview'             => 'Aŭtomate marki reviziojn kiel viditajn',
	'right-movestable'             => 'Movi stabilajn paĝojn',
	'right-review'                 => 'Marki reviziojn kiel viditajn',
	'right-stablesettings'         => 'Konfiguri kiel la stabila versio estas selektita kaj montrita',
	'right-validate'               => 'Marki reviziojn kiel validigitajn',
	'rights-editor-autosum'        => 'aŭtomate rangaltigita',
	'rights-editor-revoke'         => 'forigis redaktanto-rajton de [[$1]]',
	'specialpages-group-quality'   => 'Kvalitkontrolo',
	'stable-logentry'              => 'konfiguris stabil-redakciadon por [[$1]]',
	'stable-logentry2'             => 'restarigi stabilan versiigado por [[$1]]',
	'stable-logpage'               => 'Loglibro pri stabilaj versioj',
	'stable-logpagetext'           => 'Jen protokolo de ŝanĝoj al la konfiguro de [[{{MediaWiki:Validationpage}}|stabila versio]] de enhavaj paĝoj.

Listo de stabiligitaj paĝoj estas trovebla ĉe la [[Special:StablePages|Listo de stabilaj paĝoj]].',
	'tooltip-ca-current'           => 'Vidigu la nunan malneton de ĉi tiu paĝo',
	'tooltip-ca-default'           => 'Konfiguro de kvalitkontrolo',
	'tooltip-ca-stable'            => 'Rigardi la stabilan version de ĉi paĝo',
	'validationpage'               => '{{ns:help}}:Validigo de artikolo',
);

/** Spanish (Español)
 * @author Drini
 * @author Lin linao
 */
$messages['es'] = array(
	'editor'                       => 'Editor',
	'flaggedrevs-desc'             => 'Da a los editores la habilidad de validar revisiones y estabilizar páginas',
	'flaggedrevs-prefs-watch'      => 'Añadir a mi lista de seguimiento las páginas que revise.',
	'group-editor'                 => 'Editores',
	'group-editor-member'          => 'Editor',
	'group-reviewer'               => 'Revisores',
	'group-reviewer-member'        => 'Revisor',
	'grouppage-editor'             => '{{ns:project}}:Editor',
	'grouppage-reviewer'           => '{{ns:project}}:Revisor',
	'reviewer'                     => 'Revisor',
	'revreview-auto'               => '(automático)',
	'revreview-auto-w'             => "Estás editando la versión estable. Los cambios serán '''automáticamente revisados'''.",
	'revreview-auto-w-old'         => "Estás editando una versión revisada, los cambios serán '''automáticamente revisados'''.",
	'revreview-basic'              => 'Esta es la última [[{{MediaWiki:Validationpage}}|revisión]] vista, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambio|cambios}}] esperando revisión.',
	'revreview-basic-i'            => 'Esta es la última revisión [[{{MediaWiki:Validationpage}}|vista]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambios de plantilla/imagen] esperando revisión.',
	'revreview-current'            => 'Borrador',
	'revreview-edit'               => 'Editar borrador',
	'revreview-edited'             => "'''Las ediciones serán incorporadas en la [[{{MediaWiki:Validationpage}}|versión estable]] una vez que los usuarios establecidos las revisen. El ''borrador'' se muestra debajo.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|cambio en espera|cambios en espera}}] de revisión.",
	'revreview-invalid'            => "'''Destino inválido:''' no hay  [[{{MediaWiki:Validationpage}}|versión revisada]] que corresponda a tal ID.",
	'revreview-newest-basic'       => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versión vista] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambio|cambios}}] {{PLURAL:$3|necesita|necesitan}} revisión.',
	'revreview-newest-basic-i'     => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión vista] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambios a plantilla/imagen] necesitan revisión.',
	'revreview-newest-quality'     => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidad] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambio|cambios}}] {{PLURAL:$3|necesita|necesitan}} revisión.',
	'revreview-newest-quality-i'   => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidad] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} mostrar todas]) fue [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambios a plantilla/imagen] necesitan revisión.',
	'revreview-noflagged'          => "No hay versiones revisadas para esta página, por lo que puede '''no''' haber sido [[{{MediaWiki:Validationpage}}|verificada]] para calidad",
	'revreview-oldrating'          => 'Fue calificada:',
	'revreview-patrolled'          => 'Las revisiones seleccionadas de [[:$1|$1]] han sido marcadas como patrulladas',
	'revreview-quality'            => 'Esta es la última revisión de [[{{MediaWiki:Validationpage}}|calidad]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] el <i>$2</i>.
El [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrador] tiene [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambio|cambios}}] esperando revisión.',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Artículo visto]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver borrador]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Artículo visto]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver esbozo]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Artículo visto]]'''",
	'revreview-quick-invalid'      => "'''ID de revisión inválido'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Versión actual]]''' (sin revisar)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Artículo de calidad]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver esbozo]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Artículo de calidad]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver esbozo]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Artículo de calidad]]'''",
	'revreview-quick-see-basic'    => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver artículo]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} comparar])",
	'revreview-quick-see-quality'  => "'''Borrador''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver artículo]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} comparar])",
	'revreview-source'             => 'fuente del borrador',
	'revreview-stable'             => 'Página estable',
	'revreview-update-includes'    => "'''Algunas plantillas o imágenes fueron actualizadas:'''",
	'revreview-update-none'        => "Por favor [[{{MediaWiki:Validationpage}}|revisa]] los cambios ''(mostrados abajo)'' hecho desde que la versión estable fue  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada].",
	'revreview-update-use'         => "'''NOTA:''' si alguna de estas plantillas o imágenes tiene una versión estable, entonces ya se usa en la versión estable de esta página.",
	'right-autopatrolother'        => 'Automáticamente marcar revisiones patrulladas fuera del espacio de nombres principal',
	'right-autoreview'             => 'Automáticamente marcar revisiones como vistas',
	'right-movestable'             => 'Mover páginas estables',
	'right-review'                 => 'Marcar revisiones como vistas',
	'right-stablesettings'         => 'Configurar cómo las versiones estables se seleccionan y muestran',
	'right-validate'               => 'Marcar revisiones como validadas',
	'tooltip-ca-current'           => 'Ver el borrador actual de esta página',
	'tooltip-ca-default'           => 'Opciones de control de calidad',
	'tooltip-ca-stable'            => 'Ver la versión estable de esta página',
	'validationpage'               => '{{ns:help}}:Validación de artículo',
);

/** Estonian (Eesti)
 * @author SPQRobin
 */
$messages['et'] = array(
	'revreview-style-1' => 'Vastuvõetav',
);

/** Extremaduran (Estremeñu)
 * @author Better
 */
$messages['ext'] = array(
	'editor'              => 'Eitol',
	'group-editor'        => 'Eitoris',
	'group-editor-member' => 'Eitol',
	'grouppage-editor'    => '{{ns:project}}:Eitol',
	'revreview-auto'      => '(autumáticu)',
	'revreview-style-2'   => 'Güenu',
);

/** Persian (فارسی)
 * @author Huji
 * @author Siebrand
 */
$messages['fa'] = array(
	'editor'                       => 'ویرایشگر',
	'flaggedrevs'                  => 'نسخه‌های علامت‌دار',
	'flaggedrevs-backlog'          => "در حال حاضر کارهای ناتمام در [[Special:OldReviewedPages|صفحه‌های بازبینی شده تاریخ گذشته]] وجود دارد. '''توجه شما مورد نیاز است!'''",
	'flaggedrevs-desc'             => 'به ویرایشگرها/مرورکنندگان امکان تایید کردن نسخه‌ها و پایدار ساختن صفحه‌ها را می‌دهد',
	'flaggedrevs-pref-UI-0'        => 'استفاده از رابط کاربری مفصل نسخه‌های پایدار',
	'flaggedrevs-pref-UI-1'        => 'استفاده از رابط کاربری سادهٔ نسخه‌های پایدار',
	'flaggedrevs-prefs'            => 'پایداری',
	'flaggedrevs-prefs-stable'     => '(در صورت وجود) همیشه نسخهٔ پایدار یک صفحه را به عنوان نسخهٔ پیش فرض نمایش بده',
	'flaggedrevs-prefs-watch'      => 'صفحه‌هایی که بازبینی می‌کنم را به فهرست پیگیری‌هایم اضافه کن',
	'group-editor'                 => 'ویرایشگران',
	'group-editor-member'          => 'ویرایشگر',
	'group-reviewer'               => 'مرورگران',
	'group-reviewer-member'        => 'مرورگر',
	'grouppage-editor'             => '{{ns:project}}:ویرایشگر',
	'grouppage-reviewer'           => '{{ns:project}}:مرورگر',
	'hist-draft'                   => 'نسخهٔ پیش‌نویس',
	'hist-quality'                 => '[با کیفیت]',
	'hist-quality-user'            => 'توسط [[User:$3|$3]] [{{fullurl:$1|stableid=$2}} تایید شد]',
	'hist-stable'                  => '[بررسی شده]',
	'hist-stable-user'             => 'توسط [[User:$3|$3]] [{{fullurl:$1|stableid=$2}} بررسی شد]',
	'review-diff2stable'           => 'تفاوت با نسخه پایدار',
	'review-logentry-app'          => '[[$1]] را بررسی کرد',
	'review-logentry-dis'          => 'نسخه‌ای از [[$1]] را مستهلک کرد',
	'review-logentry-id'           => 'شماره نسخه $1',
	'review-logentry-diff'         => 'تفاوت با نسخهٔ پایدار',
	'review-logpage'               => 'سیاههٔ بررسی مقاله',
	'review-logpagetext'           => 'این سیاهه‌ای از تعییرات وضعیت [[{{MediaWiki:Validationpage}}|تائید]] نسخه‌های صفحه‌ها است.',
	'reviewer'                     => 'مرورگر',
	'revisionreview'               => 'نسخه‌های بررسی',
	'revreview-accuracy'           => 'دقت',
	'revreview-accuracy-0'         => 'تائیدنشده',
	'revreview-accuracy-1'         => 'بررسی شده',
	'revreview-accuracy-2'         => 'دقیق',
	'revreview-accuracy-3'         => 'دارای منابع خوب',
	'revreview-accuracy-4'         => 'برگزیده',
	'revreview-approved'           => 'مورد تایید',
	'revreview-auto'               => '(خودکار)',
	'revreview-auto-w'             => "شما در حال ویرایش نسخه پایدار هستید و تغییرات شما '''به طور خودکار بررسی خواهند شد'''.",
	'revreview-auto-w-old'         => "شما در حال ویرایش یک نسخه قدیمی هستید و تغییرات شما '''به طور خودکار بررسی خواهند شد'''.",
	'revreview-basic'              => 'این آخرین نسخه [[{{MediaWiki:Validationpage}}|بررسی‌ شده]] است که در <i>$2</i>
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس]
	قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} ویرایش] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|تغییر|تغییر}}]
نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-basic-i'            => 'این چدید‌ترین نسخهٔ [[{{MediaWiki:Validationpage}}|بررسی شده]] است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس] دارای [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغییراتی در الگوها/تصویرها] است که هنوز بازبینی نشده‌اند.',
	'revreview-basic-old'          => 'این یک نسخهٔ [[{{MediaWiki:Validationpage}}|بررسی شده]] است([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} نمایش همه])، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
ممکن است [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغییرات] جدیدی اتفاق افتاده باشند.',
	'revreview-basic-same'         => 'این آخرین نسخهٔ [{{MediaWiki:Validationpage}}|بررسی شده]] ‌است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است]. این صفحه قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} تغییر] است.',
	'revreview-basic-source'       => 'یک [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخهٔ بررسی شده] از این صفحه، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده] در <i>$2</i>، بر مبنای این نسخه ایجاد شده‌است.',
	'revreview-changed'            => "'''عمل درخواست شده را نمی‌توان روی این نسخه از صفحه انجام داد.'''

یک تصویر یا الگو درخواست شده بدون ان که نسخه خاصی تعیین شده باشد. این اتفاق می‌تواند زمانی رخ دهد که یک الگوی پویا یک الگو یا تصویر دیگر را شامل شود که به متغیری بستگی دارد که از زمانی که شما صفحه را تغییر داده‌اید تغییر کرده‌است.
بارگذاری دوباره صحفه و بررسی دوباره می‌تواند مشکل را برطرف کند.",
	'revreview-current'            => 'پیش‌نویس',
	'revreview-depth'              => 'عمق',
	'revreview-depth-0'            => 'تائیدنشده',
	'revreview-depth-1'            => 'مقدماتی',
	'revreview-depth-2'            => 'متوسط',
	'revreview-depth-3'            => 'بالا',
	'revreview-depth-4'            => 'برگزیده',
	'revreview-draft-title'        => 'مقاله در مرحلهٔ پیش‌نویس',
	'revreview-edit'               => 'ویرایش پیش‌نویس',
	'revreview-edited'             => "'''وقتی ویرایش‌ها توسط یک کاربر باسابقه بازبینی شدند، در [[{{MediaWiki:Validationpage}}|نسخهٔ پایدار]] ادغام می‌شوند.
''پیش‌نویس'' در زیر نمایش داده شده‌است.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 تغییر منتظر بازبینی {{PLURAL:$2|است|هستند}}].",
	'revreview-flag'               => 'بررسی این نسخه',
	'revreview-invalid'            => "'''هدف غیر مجاز:''' نسخهٔ [[{{MediaWiki:Validationpage}}|بازبینی شده‌ای]] با این شناسه وجود ندارد.",
	'revreview-legend'             => 'نمره دادن به محتوای بررسی شده',
	'revreview-log'                => 'توضیح سیاهه:',
	'revreview-main'               => 'شما باید یک نسخه خاص از یک صفحه را برگزینید تا بررسی کنید.

فهرستی از صفحه‌های بررسی نشده را در [[Special:Unreviewedpages]] می‌یابید.',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخه بررسی‌شده]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} فهرست کامل]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است].
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|تغییر|تغییر}}] نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخهٔ بررسی شده] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} نمایش همه]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده بود].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغییرات الگوها/تصویرها] نیازمند بازبینی است.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخه باکیفیت]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} فهرست کامل]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|تغییر|تغییر}}] نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخهٔ باکیفیت] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} نمایش همه]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده بود].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغییرات الگوها/تصویرها] نیازمند بازبینی است.',
	'revreview-noflagged'          => 'نسخهٔ مرورشده‌ای از این صفحه وجود ندارد، احتمالاً به این دلیل که ای صفحه از نظر کیفیت بررسی
[[{{MediaWiki:Validationpage}}|نشده‌است]].',
	'revreview-note'               => '[[User:$1]] این توضیحات را ضمن [[{{MediaWiki:Validationpage}}|بررسی]] این نسخه ثبت کرد:',
	'revreview-notes'              => 'مشاهدات یا ملاحظات',
	'revreview-oldrating'          => 'نمره داده شده:',
	'revreview-patrol'             => 'علامت زدن این تغییر به عنوان بررسی‌شده',
	'revreview-patrol-title'       => 'علامت گشت بزن',
	'revreview-patrolled'          => 'نسخهٔ انتخاب شده از [[:$1|$1]] به عنوان بررسی‌شده علامت خورده‌است.',
	'revreview-quality'            => 'این آخرین نسخه [[{{MediaWiki:Validationpage}}|باکیفیت]] است که در <i>$2</i>
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس]
	قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} ویرایش] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|تغییر|تغییر}}]
	نیازمند بررسی {{PLURAL:$3|است|هستند}}.',
	'revreview-quality-i'          => 'این چدید‌ترین نسخهٔ [[{{MediaWiki:Validationpage}}|باکیفیت]] است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس] دارای [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغییراتی در الگوها/تصویرها] است که هنوز بازبینی نشده‌اند.',
	'revreview-quality-old'        => 'این یک نسخهٔ [[{{MediaWiki:Validationpage}}|باکیفیت]] است([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} نمایش همه])، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است].
ممکن است [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} تغییرات] جدیدی اتفاق افتاده باشند.',
	'revreview-quality-same'       => 'این آخرین نسخهٔ [{{MediaWiki:Validationpage}}|با کیفیت]] ‌است، که در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده‌است]. این صفحه قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} تغییر] است.',
	'revreview-quality-source'     => 'یک [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} نسخهٔ باکیفیت] از این صفحه، [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تایید شده] در <i>$2</i>، بر مبنای این نسخه ایجاد شده‌است.',
	'revreview-quality-title'      => 'مقالهٔ با کیفیت',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|بررسی‌شده]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهده نسخه فعلی]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|مقالهٔ بررسی شده]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهدهٔ پیش‌نویس]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|بررسی شده]]''' (فاقد تغییرهای بررسی نشده)",
	'revreview-quick-invalid'      => "'''شناسهٔ نسخهٔ غیر مجاز'''",
	'revreview-quick-none'         => "'''فعلی'''. فاقد نسخه مرورشده",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|با کیفیت]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهده نسخه فعلی]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|مقالهٔ با کیفیت]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهدهٔ پیش‌نویس]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|با کیفیت]]''' (فاقد تغییرهای بررسی نشده)",
	'revreview-quick-see-basic'    => "'''فعلی'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} مشاهده نسخه پایدار]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|تغییر|تغییر}}])",
	'revreview-quick-see-quality'  => "'''فعلی'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} مشاهده نسخه پایدار]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|تغییر|تغییر}}])",
	'revreview-selected'           => "نسخه انتخابی '''$1:'''",
	'revreview-source'             => 'منبع پیش‌نویس',
	'revreview-stable'             => 'صفحهٔ پایدار',
	'revreview-stable-title'       => 'مقالهٔ بررسی شده',
	'revreview-stable1'            => 'شما می توانید {{fullurl:$1|stableid=$2}} این نسخهٔ علامت‌دار] را مشاهده کنید تا ببینید آیا [{{fullurl:$1|stable=1}} نسخهٔ پایدار] این صفحه است یا نه.',
	'revreview-stable2'            => 'شما می‌توانید [{{fullurl:$1|stable=1}} نسخهٔ پایدار] این صفحه را (در صورت وجود) مشاهده کنید.',
	'revreview-style'              => 'خوانایی',
	'revreview-style-0'            => 'تائیدنشده',
	'revreview-style-1'            => 'قابل قبول',
	'revreview-style-2'            => 'خوب',
	'revreview-style-3'            => 'مختصر',
	'revreview-style-4'            => 'برگزیده',
	'revreview-submit'             => 'ثبت بررسی',
	'revreview-successful'         => "'''نسخهٔ انتخابی از [[:$1|$1]] با موفقیت علامت زده شد.
([{{fullurl:Special:Stableversions|page=$2}} مشاهدهٔ تمام نسخه‌های علامت‌دار])'''",
	'revreview-successful2'        => "'''پرچم نسخه‌های انتخابی از [[:$1|$1]] با موفقیت برداشته شد.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|نسخهٔ پایدار]]'' (و نه آخرین نسخه) هر صفحه به عنوان پیش‌فرض محتوای صفحه است.",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|نسخه‌های پایدار]] نسخه‌هایی از هر صفحه هستند که بررسی شده‌اند و می‌توان آن‌ها را به عنوان محتوای پیش‌فرض برای بینندگان تنظیم کرد..''",
	'revreview-toggle'             => '(+/−)',
	'revreview-toggle-title'       => 'نمایش/پنهان کردن جزئیات',
	'revreview-toolow'             => 'شما باید هر یک از موارد زیر را با درجه‌ای بیش از «تائیدنشده» علامت بزنید تا آن نسخه بررسی شده به حساب بیاید. برای مستهلک کردن یک نسخه، تمام موارد را «تائیدنشده» علامت بزنید.',
	'revreview-update'             => 'لطفاً تمام تغییراتی که از آخرین نسخه پایدار صورت گرفته را بررسی کنید. برخی الگوها/تصویرها تغییر یافته‌اند:',
	'revreview-update-includes'    => "'''برخی الگوها/تصویرها به روز شده‌اند:'''",
	'revreview-update-none'        => 'لطفاً تمام تغییراتی که پس از آخرین نسخه پایدار اعمال شده‌اند را بررسی کنید.',
	'revreview-update-use'         => "'''تذکر:''' اگر هر کدام از این الگوها/تصویرها نسخهٔ پایداری داشته باشند، در نسخهٔ پایدار این صفحه استفاده می‌شوند.",
	'revreview-diffonly'           => "''برای بازبینی این صفحه، روی پیوند «نسخهٔ اخیر» کلیک کنید و فرم بازبینی را استفاده کنید.''",
	'revreview-visibility'         => 'این صفحه دارای یک [[{{MediaWiki:Validationpage}}|نسخه پایدار است]] که قابل 
	[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} تنظیم] است.',
	'right-autopatrolother'        => 'زدن خودکار برچسب گشت خودکار به ویرایش‌های خارج از فضای نام اصلی',
	'right-autoreview'             => 'علامت زدن خودکار نسخه‌ها به عنوان بررسی شده',
	'right-movestable'             => 'صفحه‌های با بیشترین پایداری',
	'right-review'                 => 'علامت زدن نسخه‌ها به عنوان بررسی شده',
	'right-stablesettings'         => 'نحوهٔ انتخاب و نمایش نسخهٔ پایدار را تنظیم کنید',
	'right-validate'               => 'علامت زدن نسخه‌ها به عنوان تایید شده',
	'rights-editor-autosum'        => 'ترفیع خودکار',
	'rights-editor-revoke'         => 'وضعیت مرورگر را از [[$1]] گرفت',
	'specialpages-group-quality'   => 'تضمین کیفیت',
	'stable-logentry'              => 'نسخه پایدار [[$1]] را تنظیم کرد',
	'stable-logentry2'             => 'بازنشاندن نسخه پایدار [[$1]]',
	'stable-logpage'               => 'سیاهه نسخه پایدار',
	'stable-logpagetext'           => 'این سیاهه‌ای از تنظیمات [[{{MediaWiki:Validationpage}}|نسخه پایدار]] صفحه‌ها است.
فهرستی از صفحه‌های پایدار شده را در [[Special:StablePages|فهرست صفحه‌های پایدار]] پیدا کنید.',
	'tooltip-ca-current'           => 'مشاهده پیش‌نویس فعلی این صفحه',
	'tooltip-ca-default'           => 'تنظیمات کنترل کیفیت',
	'tooltip-ca-stable'            => 'مشاهده نسخه پایدار این صفحه',
	'validationpage'               => '{{ns:help}}:تایید اعتبار مقاله‌ها',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Cimon Avaro
 * @author Nike
 */
$messages['fi'] = array(
	'group-editor'          => 'muokkaajat',
	'group-editor-member'   => 'muokkaaja',
	'group-reviewer'        => 'arvioijat',
	'group-reviewer-member' => 'arvioija',
	'grouppage-editor'      => '{{ns:project}}:Muokkaaja',
	'grouppage-reviewer'    => '{{ns:project}}:Arvioija',
	'reviewer'              => 'Arvioija',
	'revisionreview'        => 'Arvioi versioita',
	'revreview-accuracy'    => 'Paikkansapitävyys',
	'revreview-accuracy-0'  => 'Hyväksymätön',
	'revreview-accuracy-1'  => 'Kertaalleen silmäilty',
	'revreview-accuracy-2'  => 'Paikkansapitävä',
	'revreview-accuracy-3'  => 'Hyvin lähteistetty',
	'revreview-accuracy-4'  => 'Suositeltu',
	'revreview-auto'        => '(automaattinen)',
	'revreview-current'     => 'Luonnos',
	'revreview-depth-2'     => 'Keskitasoa',
	'revreview-edit'        => 'Muokkaa luonnosta',
	'revreview-flag'        => 'Arvioi tämä versio',
	'revreview-oldrating'   => 'Arvio oli:',
	'revreview-patrol'      => 'Merkitse tämä muutos tarkastetuksi',
	'revreview-stable'      => 'Vakaa sivu',
	'revreview-style'       => 'Luettavuus',
	'tooltip-ca-current'    => 'Näytä tämän sivun nykyinen luonnosversio',
	'tooltip-ca-stable'     => 'Näytä tämän sivun vakaa artikkeliversio',
);

/** French (Français)
 * @author Sherbrooke
 * @author Grondin
 * @author Verdy p
 * @author Siebrand
 * @author Urhixidur
 * @author Dereckson
 */
$messages['fr'] = array(
	'editor'                       => 'Contributeur',
	'flaggedrevs'                  => 'Révisions marquées',
	'flaggedrevs-backlog'          => "Il y a actuellement des tâches en retard dans la [[Special:OldReviewedPages|liste des anciennes pages révisées]]. '''Votre attention y est demandée !'''",
	'flaggedrevs-desc'             => 'Donne la possibilité aux éditeurs ou au relecteurs de valider les modifications et de stabiliser les pages.',
	'flaggedrevs-pref-UI-0'        => 'Utiliser l’interface utilisateur de la version stable détaillée',
	'flaggedrevs-pref-UI-1'        => 'Utiliser une simple interface utilisateur stable',
	'flaggedrevs-prefs'            => 'Stabilité',
	'flaggedrevs-prefs-stable'     => 'Toujours afficher la version stable du contenu des pages par défaut (s’il en existe une)',
	'flaggedrevs-prefs-watch'      => 'Ajoute les pages que j’ai revues à ma liste de suivi.',
	'group-editor'                 => 'Contributeurs',
	'group-editor-member'          => 'Contributeur',
	'group-reviewer'               => 'Réviseurs',
	'group-reviewer-member'        => 'Réviseur',
	'grouppage-editor'             => '{{ns:project}}:Editor',
	'grouppage-reviewer'           => '{{ns:project}}:Reviewer',
	'hist-draft'                   => 'version brouillon',
	'hist-quality'                 => 'qualité de la version',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validée] par [[User:$3|$3]]',
	'hist-stable'                  => 'Version visualisée',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} visée] par [[User:$3|$3]]',
	'review-diff2stable'           => 'Voir les modifications entre les versions stables et actuelles.',
	'review-logentry-app'          => 'Revue [[$1]]',
	'review-logentry-dis'          => 'Version dépréciée de [[$1]]',
	'review-logentry-id'           => 'Version ID $1',
	'review-logentry-diff'         => 'diff vers la version stable',
	'review-logpage'               => 'Journal des relectures',
	'review-logpagetext'           => "Voici le journal des modifications [[{{MediaWiki:Makevalidate-page}}|du statut d'approbation]] des révisions.
Voir la liste [[Special:ReviewedPages|des pages relues]] pour une liste de celles qui sont approuvées.",
	'reviewer'                     => 'Réviseur',
	'revisionreview'               => 'Revoir versions',
	'revreview-accuracy'           => 'Précision',
	'revreview-accuracy-0'         => 'Non approuvée',
	'revreview-accuracy-1'         => 'Vue',
	'revreview-accuracy-2'         => 'Précise',
	'revreview-accuracy-3'         => 'Bien sourcée',
	'revreview-accuracy-4'         => 'Remarquable',
	'revreview-approved'           => 'Approuvé',
	'revreview-auto'               => '(automatique)',
	'revreview-auto-w'             => "Vous êtes en train de modifier une version stable : Les modifications '''seront automatiquement relues'''.",
	'revreview-auto-w-old'         => "Vous êtes en train de modifier une version relue ; les modifications  '''seront automatiquement relues'''.",
	'revreview-basic'              => "C'est la dernière [[{{MediaWiki:Validationpage}}|version vue]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ébauche] peut être [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiée]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|$3 changement attend|$3 changements attendent}}] une révision.",
	'revreview-basic-i'            => 'Voici la dernière version [[{{MediaWiki:Validationpage}}|visée]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] sur <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouillon] comprend des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} changements de modèle ou d’image] en attente d’approbation.',
	'revreview-basic-old'          => 'Voici une version [[{{MediaWiki:Validationpage}}|visée]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} liste entière]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>.
De nouvelles [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modifications] peuvent avoir été effectuées.',
	'revreview-basic-same'         => 'Ceci est la dernière version [[{{MediaWiki:Validationpage}}|surveillée]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] sur <i>$2</i>. La page peut être [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiée].',
	'revreview-basic-source'       => 'Une [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version visée] de cette page, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>, a été basée en dehors de cette version.',
	'revreview-changed'            => "'''L’action demandée n’a pu être accomplie pour cette version de [[:$1|$1]].'''
	
Un modèle ou une image peuvent avoir été demandés alors qu’aucune version précise n’était choisie. Ceci peut survenir si un modèle dynamique opère une transclusion d’une autre image ou d’un modèle dépendant d’une variable qui a changé depuis que vous avez commencé à prévisualiser cette page. Le rechargement de la page et sa revisualisation peuvent corriger ce problème.",
	'revreview-current'            => 'Ébauche',
	'revreview-depth'              => 'Profondeur',
	'revreview-depth-0'            => 'Non approuvée',
	'revreview-depth-1'            => 'De base',
	'revreview-depth-2'            => 'Modérée',
	'revreview-depth-3'            => 'Élevée',
	'revreview-depth-4'            => 'Remarquable',
	'revreview-draft-title'        => 'Brouillon de page',
	'revreview-edit'               => 'Ébauche de modification',
	'revreview-edited'             => "'''Les modifications seront incorporées dans [[{{MediaWiki:Validationpage}}|la version stable]] une fois qu’un relecteur autorisé les aura approuvées.'''<br />
Le ''brouillon'' est visible ci-dessous. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|modification attend|modifications attendent}}] une relecture.",
	'revreview-flag'               => 'Évaluer cette version',
	'revreview-invalid'            => "'''Cible incorrecte :''' aucune version [[{{MediaWiki:Validationpage}}|relue]] ne correspond au numéro indiqué.",
	'revreview-legend'             => 'Évaluer le contenu de la version',
	'revreview-log'                => 'Commentaire au journal :',
	'revreview-main'               => 'Vous devez choisir une version précise pour réviser. Voir [[Special:Unreviewedpages|Version non révisées]] pour une liste de pages.',
	'revreview-newest-basic'       => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version vue] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} toutes les voir]) était [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|changement|changements}}] {{PLURAL:$3|demande|demandent}} une révision.",
	'revreview-newest-basic-i'     => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version relue] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} liste générale]) a été [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] sur <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Des changements de modèles ou d’images] nécessitent une relecture.',
	'revreview-newest-quality'     => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernière version de qualité] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} toutes les voir]) était [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|changement|changements}}] {{PLURAL:$3|demande|demandent}} une révision.",
	'revreview-newest-quality-i'   => 'Les [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dernières versions de qualité] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} liste générale]) ont été [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvées] sur <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Des modifications de modèles ou d’images] nécessitent une relecture.',
	'revreview-noflagged'          => "Il n'y a pas de version révisée de cette page, sa [[{{MediaWiki:Validationpage}}|qualité]] est incertaine.",
	'revreview-note'               => '[[User:$1]] a écrit ces notes de révision :',
	'revreview-notes'              => 'Observations et notes à afficher :',
	'revreview-oldrating'          => 'Son pointage :',
	'revreview-patrol'             => 'Marquer cette modification comme patrouillée',
	'revreview-patrol-title'       => 'Marquer comme patrouillé',
	'revreview-patrolled'          => 'La version sélectionnée de [[:$1|$1]] a été marquée comme patrouillée.',
	'revreview-quality'            => "C'est la dernière [[{{MediaWiki:Validationpage}}|version de qualité]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ébauche] peut être [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiée]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|$3 changement attend|$3 changements attendent}}] une révision.",
	'revreview-quality-i'          => 'Voici la dernière version de [[{{MediaWiki:Validationpage}}|qualité]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] sur <i>$2</i>.
Le [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} brouillon] comprend des [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} changements de modèle ou d’image] en attente d’approbation.',
	'revreview-quality-old'        => 'Voici une version de [[{{MediaWiki:Validationpage}}|qualité]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tous lister]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>.
De nouvelles [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modifications] peuvent avoir été effectuées.',
	'revreview-quality-same'       => 'Ceci est la dernière version de [[{{MediaWiki:Validationpage}}|qualité]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvé] sur <i>$2</i>. La page peut être [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiée].',
	'revreview-quality-source'     => 'Une [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualité] de cette page, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée] le <i>$2</i>, a été basée en dehors de cette version.',
	'revreview-quality-title'      => 'Article de qualité',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Vue]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir révision courante]]",
	'revreview-quick-basic-old'    => "[[{{MediaWiki:Validationpage}}|page visée]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir le brouillon]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Surveillée]]''' (aucune modification revue)",
	'revreview-quick-invalid'      => "'''Numéro de version incorrecte'''",
	'revreview-quick-none'         => "'''Courante''' (pas de révisions évaluées)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Qualité]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} voir version courante]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Page de qualité]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visionner le brouillon]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Qualité]]''' (aucune modification revue)",
	'revreview-quick-see-basic'    => "'''Brouillon''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} voir les versions stables]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|changement|changements}}])",
	'revreview-quick-see-quality'  => "'''Brouillon'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} voir la version stable]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|modification|modifications}}])",
	'revreview-selected'           => "Version choisie de '''$1 :'''",
	'revreview-source'             => "Source de l'ébauche",
	'revreview-stable'             => 'Page stable',
	'revreview-stable-title'       => 'Article visé',
	'revreview-stable1'            => 'Vous pouvez vouloir visionner cette [{{fullurl:$1|stableid=$2}} version marquée] pour voir si c’est maintenant la [{{fullurl:$1|stable=1}} version stable] de cette page.',
	'revreview-stable2'            => 'Vous pouvez vouloir visionner [{{fullurl:$1|stable=1}} la version stable] de cette page (s’il en existe une).',
	'revreview-style'              => 'Lisibilité',
	'revreview-style-0'            => 'Non approuvée',
	'revreview-style-1'            => 'Acceptable',
	'revreview-style-2'            => 'Bonne',
	'revreview-style-3'            => 'Concise',
	'revreview-style-4'            => 'Remarquable',
	'revreview-submit'             => 'Sauvegarder revue',
	'revreview-successful'         => 'La version sélectionnée de [[:$1|$1]] a été marquée avec succès d’un drapeau. ([{{fullurl:Special:Stableversions|page=$2}} Voir toutes les versions ainsi marquées])',
	'revreview-successful2'        => "'''La version sélectionnée de [[:$1|$1]] a pu se voir retirer son drapeau avec succès.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Les versions stables]] sont choisies comme contenu par défaut pour les lecteurs plutôt que les versions les plus récentes.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Les versions stables]] sont les versions de pages vérifiées et peuvent être définies comme le contenu par défault pour les lecteurs.''",
	'revreview-toggle-title'       => 'montrer/cacher les détails',
	'revreview-toolow'             => 'Pour les attributs ci-dessous, vous devez donner un pointage plus élevé que « non approuvé » pour que la version soit considérée revue. Pour déprécier une version, mettre tous les champs à « non approuvé ».',
	'revreview-update'             => "Veuillez [[{{MediaWiki:Validationpage}}|vérifier]] toutes les modifications ''(voir ci-dessous)'' effectuées depuis la [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dernière approbation] de version stable.<br />
'''Quelques images ou modèles ont été mis à jour :'''",
	'revreview-update-includes'    => "'''Quelques modèles ou images ont été mis à jour :'''",
	'revreview-update-none'        => "Veuillez [[{{MediaWiki:Validationpage}}|vérifier]] les modifications effectuées ''(voir ci-dessous)'' depuis que la dernière version stable ait été [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approuvée].",
	'revreview-update-use'         => "'''Note :''' si un de ces modèles ou images disposent d’une version stable, alors cette version est encore utilisée dans la version stable de cette page.",
	'revreview-diffonly'           => "''Pour réviser la page, cliquez sur le lien « version courante » et utilisez le formulaire de révision.''",
	'revreview-visibility'         => 'Cette page contient une [[{{MediaWiki:Validationpage}}|version stable]], ses paramètres peuvent être [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurés].',
	'right-autopatrolother'        => 'Marquer comme patrouillées les versions dans tous les espaces de nom sauf le principal.',
	'right-autoreview'             => 'Marquer automatiquement les versions comme visées',
	'right-movestable'             => 'Déplacer des pages stables',
	'right-review'                 => 'Marquer les versions comme visées',
	'right-stablesettings'         => 'Configurer comment la version stable est sélectionnée puis affichée',
	'right-validate'               => 'Marquer les versions comme validées',
	'rights-editor-autosum'        => 'autopromu',
	'rights-editor-revoke'         => "a révoqué les droits d'éditeur de [[$1]]",
	'specialpages-group-quality'   => 'Assurance qualité',
	'stable-logentry'              => 'Les versions stables de [[$1]] sont paramétrées.',
	'stable-logentry2'             => 'Remettre à zéro le journal des versions stables de [[$1]]',
	'stable-logpage'               => 'Journal des versions stables',
	'stable-logpagetext'           => 'Voici le journal des modifications de la [[{{MediaWiki:Validationpage}}|version stable]] de la configuration de pages de contenu.
Consulter aussi la [[Special:StablePages|liste de pages stables]].',
	'tooltip-ca-current'           => "Voir l'ébauche courante de cette page",
	'tooltip-ca-default'           => "Paramètres pour l'assurance-qualité",
	'tooltip-ca-stable'            => 'Voir la version stable de cette page',
	'validationpage'               => "{{ns:help}}:Validation de l'article",
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 * @author Siebrand
 */
$messages['frp'] = array(
	'editor'                       => 'Contributor',
	'flaggedrevs'                  => 'Vèrsions marcâs',
	'flaggedrevs-desc'             => 'Balye la possibilitât ux èditors ou ben ux rèvisors de validar les modificacions et de stabilisar les pâges.',
	'group-editor'                 => 'Contributors',
	'group-editor-member'          => 'Contributor',
	'group-reviewer'               => 'Rèvisors',
	'group-reviewer-member'        => 'Rèvisor',
	'grouppage-editor'             => '{{ns:project}}:Contributors',
	'grouppage-reviewer'           => '{{ns:project}}:Rèvisors',
	'hist-quality'                 => 'vèrsion de qualitât',
	'hist-stable'                  => 'vèrsion vua',
	'review-diff2stable'           => 'Vêde les modificacions entre les vèrsions stâbles et corentes.',
	'review-logentry-app'          => 'Revua [[$1]]',
	'review-logentry-dis'          => 'Vèrsion dèprèciyê de [[$1]]',
	'review-logentry-id'           => 'Numerô de vèrsion : $1',
	'review-logpage'               => 'Jornal de les rèvisions de l’articllo',
	'review-logpagetext'           => 'Cen est un jornal de les modificacions por l’[[{{MediaWiki:Makevalidate-page}}|aprobacion]] de les rèvisions.',
	'reviewer'                     => 'Rèvisor',
	'revisionreview'               => 'Revêre les vèrsions',
	'revreview-accuracy'           => 'Prècision',
	'revreview-accuracy-0'         => 'Pas aprovâ',
	'revreview-accuracy-1'         => 'Vua',
	'revreview-accuracy-2'         => 'Prècisa',
	'revreview-accuracy-3'         => 'Bien fondâ',
	'revreview-accuracy-4'         => 'Remarcâbla',
	'revreview-auto'               => '(ôtomatico)',
	'revreview-auto-w'             => "Vos modifiâd una vèrsion stâbla, tota modificacion serat '''ôtomaticament rèvisâ'''. Demandâd una prèvisualisacion devant que sôvar.",
	'revreview-auto-w-old'         => "Vos modifiâd una vielye vèrsion, tota modificacion serat '''ôtomaticament rèvisâ'''. Demandâd una prèvisualisacion devant que sôvar.",
	'revreview-basic'              => "Cen est la dèrriére [[{{MediaWiki:Validationpage}}|vèrsion vua]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo ''$2''. Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} començon] pôt étre [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiâ] ; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|$3 changement atend|$3 changements atendont}}] una rèvision.",
	'revreview-basic-same'         => 'Cen est la dèrriére vèrsion [[{{MediaWiki:Validationpage}}|survelyê]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} les vêre totes]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] dessus <i>$2</i>. La pâge pôt étre [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiâ].',
	'revreview-changed'            => "'''L’accion demandâ at pas possu étre acomplia por ceta vèrsion de [[:$1|$1]].'''

Un modèlo ou una émâge pôt avêr étâ demandâ pendent que niona vèrsion prècisa ére chouèsia/cièrdua. Cen pôt arrevar s’un modèlo dinamico opère una transcllusion d’una ôtra émâge ou d’un ôtro modèlo dèpendent d’una variâbla qu’at changiê dês que vos éd comenciê a prèvisualisar ceta pâge.
Lo rechargement de la pâge et sa revisualisacion pôt corregiér cél problèmo.",
	'revreview-current'            => 'Començon',
	'revreview-depth'              => 'Provondior',
	'revreview-depth-0'            => 'Pas aprovâ',
	'revreview-depth-1'            => 'De bâsa',
	'revreview-depth-2'            => 'Moderâ',
	'revreview-depth-3'            => 'Hôta',
	'revreview-depth-4'            => 'Remarcâbla',
	'revreview-edit'               => 'Començon de modificacion',
	'revreview-flag'               => 'Èstimar ceta vèrsion',
	'revreview-legend'             => 'Èstimar lo contegnu de la vèrsion',
	'revreview-log'                => 'Comentèro u jornal :',
	'revreview-main'               => 'Vos dête chouèsir/cièrdre una vèrsion prècisa por rèvisar.

Vêde les [[Special:Unreviewedpages|vèrsions pas rèvisâs]] por una lista de pâges.',
	'revreview-newest-basic'       => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dèrriére vèrsion vua] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} les vêre totes]) ére [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|changement|changements}}] {{PLURAL:$3|demande|demandont}} una rèvision.",
	'revreview-newest-quality'     => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} dèrriére vèrsion de qualitât] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} les vêre totes]) ére [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|changement|changements}}] {{PLURAL:$3|demande|demandont}} una rèvision.",
	'revreview-noflagged'          => "Y at pas de vèrsion rèvisâ de ceta pâge, sa [[{{MediaWiki:Validationpage}}|qualitât]] est '''pas''' de sûr.",
	'revreview-note'               => '[[User:$1]] at ècrit cetes notes [[{{MediaWiki:Validationpage}}|de rèvision]] :',
	'revreview-notes'              => 'Remârques et notes a afichiér :',
	'revreview-oldrating'          => 'Son pouentâjo :',
	'revreview-patrol'             => 'Marcar ceta modificacion coment survelyê',
	'revreview-patrolled'          => 'La vèrsion sèlèccionâ de [[:$1|$1]] at étâ marcâ coment survelyê.',
	'revreview-quality'            => "Cen est la dèrriére [[{{MediaWiki:Validationpage}}|vèrsion de qualitât]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] lo ''$2''. Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} començon] pôt étre [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiâ] ; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|$3 changement atend|$3 changements atendont}}] una rèvision.",
	'revreview-quality-same'       => 'Cen est la dèrriére vèrsion de [[{{MediaWiki:Validationpage}}|qualitât]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} les vêre totes]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ] dessus <i>$2</i>. La pâge pôt étre [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifiâ].',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Vua]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vêre la vèrsion corenta]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Survelyê]]''' (niona modificacion revua)",
	'revreview-quick-none'         => "'''Corenta''' (pas de vèrsions èstimâs)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Qualitât]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vêre la vèrsion corenta]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Qualitât]]''' (niona modificacion revua)",
	'revreview-quick-see-basic'    => "'''Corenta'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vêre la vèrsion stâbla]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|changement|changements}}])",
	'revreview-quick-see-quality'  => "'''Corenta'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vêre la vèrsion stâbla]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|modificacion|modificacions}}])",
	'revreview-selected'           => "Vèrsion chouèsia/cièrdua de '''$1 :'''",
	'revreview-source'             => 'Sôrsa du començon',
	'revreview-stable'             => 'Stâblo',
	'revreview-style'              => 'Liésibilitât',
	'revreview-style-0'            => 'Pas aprovâ',
	'revreview-style-1'            => 'Accèptâbla',
	'revreview-style-2'            => 'Bôna',
	'revreview-style-3'            => 'Côrta',
	'revreview-style-4'            => 'Remarcâbla',
	'revreview-submit'             => 'Sôvar revua',
	'revreview-text'               => 'Les vèrsions stâbles sont chouèsies/cièrdues per dèfôt, pletout que les dèrriéres vèrsions.',
	'revreview-toolow'             => 'Por los atributs ce-desot, vos dête balyér un pouentâjo ples hôt que « pas aprovâ » por que la vèrsion seye considèrâ coment revua. Por dèprèciyér una vèrsion, betâd tôs los champs a « pas aprovâ ».',
	'revreview-update'             => "Volyéd [[{{MediaWiki:Validationpage}}|controlar]] les modificacions fêtes ''(vêde ce-desot)'' dês que la dèrriére vèrsion stâbla èye étâ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovâ].

'''Doux-três émâges ou modèlos siuvents ont en èfèt étâ betâs a jorn :'''",
	'revreview-update-none'        => "Volyéd [[{{MediaWiki:Validationpage}}|controlar]] les modificacions fêtes ''(vêde ce-desot)'' dês que la dèrriére vèrsion stâbla èye étâ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}}}} aprovâ].",
	'revreview-visibility'         => 'Ceta pâge contint una [[{{MediaWiki:Validationpage}}|vèrsion stâbla]], que pôt étre [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurâ].',
	'rights-editor-autosum'        => 'Ôtonomâ',
	'rights-editor-revoke'         => 'at rèvocâ los drêts d’èditor de [[$1]]',
	'stable-logentry'              => 'Les vèrsions stâbles de [[$1]] sont paramètrâs.',
	'stable-logentry2'             => 'Remetre a zérô lo jornal de les vèrsions stâbles de [[$1]]',
	'stable-logpage'               => 'Jornal de les vèrsions stâbles',
	'stable-logpagetext'           => 'Cen est un jornal de les modificacions por les [[{{MediaWiki:Validationpage}}|vèrsions stâbles]] de les pâges.',
	'tooltip-ca-current'           => 'Vêre lo començon corent de ceta pâge',
	'tooltip-ca-default'           => 'Paramètres por l’assurance-qualitât',
	'tooltip-ca-stable'            => 'Vêre la vèrsion stâbla de ceta pâge',
	'validationpage'               => '{{ns:help}}:Validacion de l’articllo',
);

/** Galician (Galego)
 * @author Toliño
 * @author Alma
 * @author Xosé
 * @author Siebrand
 */
$messages['gl'] = array(
	'editor'                       => 'Editor',
	'flaggedrevs'                  => 'Revisións marcadas',
	'flaggedrevs-backlog'          => "Actualmente hai unha acumulación nas [[Special:OldReviewedPages|páxinas revisadas fóra de data]]. '''Precísase a súa atención!'''",
	'flaggedrevs-desc'             => 'Dar aos editores/revisores a capacidade para confirmar as revisións e estabilizar as páxinas',
	'flaggedrevs-pref-UI-0'        => 'Usar a interface de usuario detallada da versión estábel',
	'flaggedrevs-pref-UI-1'        => 'Usar a interface de usuario simple da versión estábel',
	'flaggedrevs-prefs'            => 'Estabilidade',
	'flaggedrevs-prefs-stable'     => 'Amosar sempre a versión estábel do contido das páxinas por defecto (se o hai)',
	'flaggedrevs-prefs-watch'      => 'Engadir as páxinas que revise á miña páxina de vixilancia',
	'group-editor'                 => 'Editores',
	'group-editor-member'          => 'Editor',
	'group-reviewer'               => 'Revisores',
	'group-reviewer-member'        => 'Revisor',
	'grouppage-editor'             => '{{ns:project}}:Editor',
	'grouppage-reviewer'           => '{{ns:project}}:Revisor',
	'hist-draft'                   => 'revisión do borrador',
	'hist-quality'                 => 'revisión de calidade',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validado] por [[User:$3|$3]]',
	'hist-stable'                  => 'revisión revisada',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} revisado] por [[User:$3|$3]]',
	'review-diff2stable'           => 'Ver os cambios entre as revisións estábel e a actual',
	'review-logentry-app'          => 'revisou "[[$1]]"',
	'review-logentry-dis'          => 'devaluou a versión de "[[$1]]"',
	'review-logentry-id'           => 'revisión ID $1',
	'review-logentry-diff'         => 'diferenzas coa versión estábel',
	'review-logpage'               => 'Rexistro de revisións',
	'review-logpagetext'           => 'Este é un rexistro dos cambios para as revisións de [[{{MediaWiki:Makevalidate-page}}|aprobación]] do status para o contido das páxinas.
Vexa a [[Special:ReviewedPages|listaxe de páxinas revisadas]] para ver unha lista das páxinas aprobadas.',
	'reviewer'                     => 'Revisor',
	'revisionreview'               => 'Examinar revisións',
	'revreview-accuracy'           => 'Exactitude',
	'revreview-accuracy-0'         => 'Sen aprobar',
	'revreview-accuracy-1'         => 'Revisada',
	'revreview-accuracy-2'         => 'Exacto',
	'revreview-accuracy-3'         => 'Ben documentado',
	'revreview-accuracy-4'         => 'Destacado',
	'revreview-approved'           => 'Aprobado',
	'revreview-auto'               => '(automático)',
	'revreview-auto-w'             => "Está editando unha revisión estábel; calquera cambio '''será automaticamente revisado'''.",
	'revreview-auto-w-old'         => "Está editando unha revisión xa revisada; calquera cambio '''será automaticamente revisado'''.",
	'revreview-basic'              => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambio|cambios}}] agardando por unha revisión.',
	'revreview-basic-i'            => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambios nos modelos/imaxes] agardando por unha revisión.',
	'revreview-basic-old'          => 'Esta é unha revisión [[{{MediaWiki:Validationpage}}|revisada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
Novos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambios] foron feitos.',
	'revreview-basic-same'         => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|revisada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.',
	'revreview-basic-source'       => 'Unha [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versión revisada] desta páxina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>, foi baseada nesta revisión.',
	'revreview-changed'            => "'''A acción solicitada non se pode levar a cabo nesta revisión de [[:$1|$1]].'''

Un modelo ou imaxe puido ser solicitado cando ningunha versión específica foi especificada.
Isto pode ocorrer se un modelo dinámico transcribe outro modelo ou imaxe dependendo dunha variable que cambiou desque comezou a revisar esta páxina.
Actualizar a páxina e volvela revisar pode resolver o problema.",
	'revreview-current'            => 'Proxecto',
	'revreview-depth'              => 'Profundidade',
	'revreview-depth-0'            => 'Sen aprobar',
	'revreview-depth-1'            => 'Básico',
	'revreview-depth-2'            => 'Moderado',
	'revreview-depth-3'            => 'Alto',
	'revreview-depth-4'            => 'Destacado',
	'revreview-draft-title'        => 'Artigo borrador',
	'revreview-edit'               => 'Editar proxecto',
	'revreview-edited'             => "'''As edicións serán incorporadas á [[{{MediaWiki:Validationpage}}|versión estábel]] unha vez que un usuario estabilizador as revise.
O ''bosquexo'' amósase embaixo.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|cambio agarda|cambios agardan}}] unha revisión.",
	'revreview-flag'               => 'Examinada esta revisión',
	'revreview-invalid'            => "'''Obxectivo inválido:''' ningunha revisión [[{{MediaWiki:Validationpage}}|revisada]] se corresponde co ID dado.",
	'revreview-legend'             => 'Valorar o contido da revisión',
	'revreview-log'                => 'Comentario para o rexistro:',
	'revreview-main'               => 'Vostede debe seleccionar unha revisión particular dun contido da páxina de cara á revisión.

	Vexa a [[Special:Unreviewedpages]] para a listaxe de páxinas sen revisar.',
	'revreview-newest-basic'       => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión revisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambio|cambios}}] {{PLURAL:$3|precisa|precisan}} dunha revisión.',
	'revreview-newest-basic-i'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión revisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Os cambios nos modelos/imaxes] precisan dunha revisión.',
	'revreview-newest-quality'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidade]
	([{{fullurl:Special:Stableversions|páxina={{FULLPAGENAMEE}}}} de toda a listaxe]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada]
	 en <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|change|cambios}}] {{PLURAL:$3|needs|precisan}} revisión.',
	'revreview-newest-quality-i'   => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última revisión de calidade] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Os cambios nos modelos/imaxes changes] precisan dunha revisión.',
	'revreview-noflagged'          => "Non hai revisións examinadas desta páxina,  polo que pode que '''non''' foran [[{{MediaWiki:Validationpage}}|revisadas]] na súa calidade.",
	'revreview-note'               => '[[User:$1]] fixo as seguintes notas [[{{MediaWiki:Validationpage}}|examinando]] esta revisión:',
	'revreview-notes'              => 'Observacións ou notas para amosar:',
	'revreview-oldrating'          => 'Foi valorado:',
	'revreview-patrol'             => 'Marcar este cambio como patrullado',
	'revreview-patrol-title'       => 'Marcar como patrullado',
	'revreview-patrolled'          => 'A revisión seleccionada de [[:$1|$1]] foi marcada como revisada.',
	'revreview-quality'            => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|de calidade]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambios|cambios}}] agardando por unha revisión.',
	'revreview-quality-i'          => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|de calidade]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bosquexo] ten [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambios nos modelos/imaxes] agardando por unha revisión.',
	'revreview-quality-old'        => 'Esta é unha revisión [[{{MediaWiki:Validationpage}}|de calidade]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.
Novos [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambios] foron feitos.',
	'revreview-quality-same'       => 'Esta é a última revisión [[{{MediaWiki:Validationpage}}|de calidade]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} amosar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>.',
	'revreview-quality-source'     => 'Unha [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versión de calidade] desta páxina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] o <i>$2</i>, foi baseado nesta revisión.',
	'revreview-quality-title'      => 'Artigos de calidade',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Sighted]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} véxase revisión actual]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Artigo revisado]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver o bosquexo]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Artigo revisado]]'''",
	'revreview-quick-invalid'      => "'''Revisión ID inválida'''",
	'revreview-quick-none'         => "'''Actualización'''. Non examinou as revisións.",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Calidade]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} véxase revisión actual]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Artigo de calidade]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver o borrador]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Artigo de calidade]]'''",
	'revreview-quick-see-basic'    => "'''Actualización'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} véxase páxina estábel]]
	($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|change|cambios}}])",
	'revreview-quick-see-quality'  => "'''Actualización'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} véxase páxina estábel]]
	($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|change|cambios}}])",
	'revreview-selected'           => "Seleccionada a revisión de '''$1:'''",
	'revreview-source'             => 'Fontes do proxecto',
	'revreview-stable'             => 'Páxina estábel',
	'revreview-stable-title'       => 'Artigo revisado',
	'revreview-stable1'            => 'Pode que queira ver [{{fullurl:$1|stableid=$2}} esta versión analizada] para comprobar se agora é [{{fullurl:$1|stable=1}} a versión estábel] desta páxina.',
	'revreview-stable2'            => 'Quizais queira ver a [{{fullurl:$1|stable=1}} versión estábel] desta páxina (se hai algunha).',
	'revreview-style'              => 'Lexibilidade',
	'revreview-style-0'            => 'Sen aprobar',
	'revreview-style-1'            => 'Aceptábel',
	'revreview-style-2'            => 'Bon',
	'revreview-style-3'            => 'Conciso',
	'revreview-style-4'            => 'Destacado',
	'revreview-submit'             => 'Enviar revisión',
	'revreview-successful'         => "'''A revisión seleccionada de [[:$1|$1]] foi analizada con éxito. ([{{fullurl:Special:Stableversions|page=$2}} ver todas as versións analizadas])'''",
	'revreview-successful2'        => "'''Á revisión seleccionada de [[:$1|$1]] foille retirada a análise con éxito.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|As versións estábeis]] son o contido por omisión ao ver unha páxina en vez da revisión máis recente.''",
	'revreview-text2'              => "''As [[{{MediaWiki:Validationpage}}|versións estábeis]] son revisións comprobadas de páxinas e poden ser fixadas como contido por defecto para os lectores.''",
	'revreview-toggle-title'       => 'amosar/agochar detalles',
	'revreview-toolow'             => 'Debe, polo menos, valorar cada un dos atributos de embaixo cunha puntuación maior a "sen aprobar" para que unha revisión sexa considerada como "revisada".
Para despreciar unha revisión, encha todos os campos con "sen aprobar".',
	'revreview-update'             => "Por favor, [[{{MediaWiki:Validationpage}}|revise]] os cambios ''(amósanse embaixo)'' feitos desde a revisión estábel [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada]. 

'''Actualizáronse algúns modelos/imaxes:'''",
	'revreview-update-includes'    => "'''Algúns modelos/imaxes foron actualizados:'''",
	'revreview-update-none'        => "[[{{MediaWiki:Validationpage}}|Revise]] os cambios ''(amósanse embaixo)'' feitos desde a revisión estábel que foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada].",
	'revreview-update-use'         => "'''AVISO:''' se algún destes modelos/imaxes ten unha versión estábel, entón, xa é usada na versión estábel desta páxina.",
	'revreview-diffonly'           => "''Para revisar a páxina, faga clic na ligazón da revisión \"revisión actual\" e use o formulario de revisión.''",
	'revreview-visibility'         => "'''Esta páxina ten unha [[{{MediaWiki:Validationpage}}|versión estábel]]; os parámetros para esta poden ser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurados].'''",
	'right-autopatrolother'        => 'Marcar automaticamente como patrulladas as revisións nos espazos de nomes que non son principais',
	'right-autoreview'             => 'Marcar automaticamente as revisións como revisadas',
	'right-movestable'             => 'Mover páxinas estábeis',
	'right-review'                 => 'Marcar as revisións como revisadas',
	'right-stablesettings'         => 'Configurar como é seleccionada e amosada a versión estábel',
	'right-validate'               => 'Marcar as revisións como validadas',
	'rights-editor-autosum'        => 'autopromocionado',
	'rights-editor-revoke'         => 'eliminado o status de editor de [[$1]]',
	'specialpages-group-quality'   => 'Garantía de calidade',
	'stable-logentry'              => 'configurou a versión estábel de "[[$1]]"',
	'stable-logentry2'             => 'resetear a versión estábel para [[$1]]',
	'stable-logpage'               => 'Rexistro de versións estábeis',
	'stable-logpagetext'           => 'Este é un rexistro dos cambios da configuración da [[{{MediaWiki:Validationpage}}|versión estábel]] do contido das páxinas.
Unha listaxe das páxinas estabilizadas pode ser atopada na [[Special:StablePages|listaxe de páxinas estábeis]].',
	'tooltip-ca-current'           => 'Ver o proxecto actual desta páxina',
	'tooltip-ca-default'           => 'Configuración de garantía da calidade',
	'tooltip-ca-stable'            => 'Ver a versión estábel desta páxina',
	'validationpage'               => '{{ns:help}}:Confirmación do artigo',
);

/** Hawaiian (Hawai`i)
 * @author Singularity
 */
$messages['haw'] = array(
	'editor'              => 'Luna',
	'flaggedrevs'         => 'Nā Kāmua Kaha',
	'group-editor'        => 'Nā luna',
	'group-editor-member' => 'Luna',
);

/** Hebrew (עברית)
 * @author StuB
 * @author Rotemliss
 */
$messages['he'] = array(
	'editor'              => 'עורך',
	'flaggedrevs'         => 'גרסאות מסומנות',
	'flaggedrevs-prefs'   => 'יציבות',
	'group-editor'        => 'עורכים',
	'group-editor-member' => 'עורך',
	'hist-draft'          => 'גרסת טיוטה',
	'revreview-log'       => 'הערה:',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'editor'                       => 'सम्पादक',
	'flaggedrevs'                  => 'फ्लॅग किये हुए अवतरण',
	'flaggedrevs-backlog'          => "अभी [[Special:OldReviewedPages|पुराने जाँचे हुए पन्नोंमे]] कुछ कार्य करना बाकी हैं। '''आप वहाँ ध्यान देना जरूरी हैं!'''",
	'flaggedrevs-desc'             => 'संपादक और परीक्षकोंको पान्ने के अवतरण प्रमाणित करने की तथा पन्ने स्थिर करनेकी अनुमति देता हैं।',
	'flaggedrevs-pref-UI-0'        => 'इंटरफेस में बढाया हुआ स्थिर अवतरणका इस्तेमाल करें',
	'flaggedrevs-pref-UI-1'        => 'इंटरफेस में सीधे स्थिर अवतरणका इस्तेमाल करें',
	'flaggedrevs-prefs'            => 'स्थिरता',
	'flaggedrevs-prefs-stable'     => 'हमेशा स्थिर अवतरण दर्शायें (अगर उपलब्ध हैं तो)',
	'flaggedrevs-prefs-watch'      => 'मैंने जाँचे हुए पन्ने मेरी ध्यानसूची में डालें',
	'group-editor'                 => 'सम्पादक',
	'group-editor-member'          => 'सम्पादक',
	'group-reviewer'               => 'परीक्षक',
	'group-reviewer-member'        => 'परीक्षक',
	'grouppage-editor'             => '{{ns:project}}:सम्पादक',
	'grouppage-reviewer'           => '{{ns:project}}:परीक्षक',
	'hist-draft'                   => 'ढाँचा अवतरण',
	'hist-quality'                 => 'गुणवत्तापूर्ण अवतरण',
	'hist-quality-user'            => '[[User:$3|$3]] ने [{{fullurl:$1|stableid=$2}} जाँचा हुआ]',
	'hist-stable'                  => 'चुना हुआ अवतरण',
	'hist-stable-user'             => '[[User:$3|$3]] ने [{{fullurl:$1|stableid=$2}} चुना हुआ]',
	'review-diff2stable'           => 'स्थिर और सद्य अवतरण में फर्क देखें',
	'review-logentry-app'          => '[[$1]] परखा गया',
	'review-logentry-dis'          => '[[$1]] के एक अवतरण का गुणांकन कम किया',
	'review-logentry-id'           => 'अवतरण क्र. $1',
	'review-logpage'               => 'रिव्ह्यू लॉग',
	'review-logpagetext'           => 'यह कंटेंट पन्नोंके अवतरणोंमें हुए बदलावोंके [[{{MediaWiki:Validationpage}}|परीक्षण]] की सूची हैं।
प्रमाणित पन्नोंके सूची के लिये [[Special:ReviewedPages|जाँचे हुए पन्नोंकी सूची]] देखें।',
	'reviewer'                     => 'परीक्षक',
	'revisionreview'               => 'अवतरण परखें',
	'revreview-accuracy'           => 'सत्यता',
	'revreview-accuracy-0'         => 'अप्रमाणित',
	'revreview-accuracy-1'         => 'चुनी हुई',
	'revreview-accuracy-2'         => 'प्रमाणित',
	'revreview-accuracy-3'         => 'अच्छे स्रोत',
	'revreview-accuracy-4'         => 'विशेष',
	'revreview-approved'           => 'प्रमाणित',
	'revreview-auto'               => '(अपनेआप)',
	'revreview-auto-w'             => "आप स्थिर अवतरण बदल रहें हैं; कोई भी बदलाव '''अपने आप''' परखें जायेंगे।",
	'revreview-auto-w-old'         => "आप परिक्षण हुए अवतरण को बदल रहें हैं, सभी बदलावोंका '''अपने आप परिक्षण''' हो जायेगा।",
	'revreview-basic'              => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|बदलाव है|बदलाव हैं}}] जिनकी जाँच बाकी हैं।',
	'revreview-basic-i'            => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} साँचा/चित्र बदलाव] हैं जिनकी जाँच बाकी हैं।',
	'revreview-basic-old'          => 'यह एक [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
इसमें नये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} बदलाव] होने की संभावना हैं।',
	'revreview-basic-same'         => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|चुना हुआ]] अवतरण हैं ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।',
	'revreview-basic-source'       => 'इस पन्नेका एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} चुना हुआ अवतरण], जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हुआ हैं, इस अवतरण पर आधारित था।',
	'revreview-changed'            => "'''[[:$1|$1]] के इस अवतरणपर आपने दी हुई क्रिया नहीं कर सकतें।'''

एक साँचा या चित्र किसीभी अवतरण का संदर्भ न दिये हुए पूछा गया हो सकता हैं।
अगर साँचेमें बाह्यचित्र है या आप द्वारा बदलाव शुरू होने पर साँचे में हुए बदलाव ऐसा दर्शा सकतें हैं।
कृपया रिफ्रेश कर फिरसे जाँचे।",
	'revreview-current'            => 'कच्चा लेख',
	'revreview-depth'              => 'गहराई',
	'revreview-depth-0'            => 'अप्रमाणित',
	'revreview-depth-1'            => 'प्राथमिक',
	'revreview-depth-2'            => 'मध्यम',
	'revreview-depth-3'            => 'उच्च',
	'revreview-depth-4'            => 'विशेष',
	'revreview-draft-title'        => 'लेख का ढाँचा',
	'revreview-edit'               => 'कच्चा अवतरण संपादित करें',
	'revreview-edited'             => "'''नये बदलाव एखाद पुराने सदस्यद्वारा जाँचे जाने पर [[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] में दर्शायें जायेंगे।
''कच्चा ढाँचा'' नीचे दिया हुआ हैं।''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|बदलाव की|बदलावोंकी}}] जाँच बाकी हैं।",
	'revreview-flag'               => 'यह अवतरण परखें',
	'revreview-invalid'            => "'''गलत लक्ष्य:''' कोईभी [[{{MediaWiki:Validationpage}}|परिक्षण]] हुआ अवतरण दिये हुए क्रमांक से मिलता नहीं।",
	'revreview-legend'             => 'इस अवतरण के पाठ का गुणांकन करें',
	'revreview-log'                => 'टिप्पणी:',
	'revreview-main'               => 'परिक्षण के लिये एक अवतरण चुनना अनिवार्य हैं।

परिक्षण ना हुए अवतरणोंकी सूची के लिये [[Special:Unreviewedpages]] देखें।',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम चुना हुआ अवतरण] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|बदलाव की|बदलावोंकी}}] जाँच बाकी हैं।',
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम चुना हुआ अवतरण] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} साँचा/चित्र बदलाव] की जाँच बाकी हैं।',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम गुणवत्तापूर्ण अवतरण] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|बदलाव की|बदलावोंकी}}] जाँच बाकी हैं।',
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम गुणवत्तापूर्ण अवतरण] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]) <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो गया हैं।
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} साँचा/चित्र बदलाव] की जाँच बाकी हैं।',
	'revreview-noflagged'          => "इस पन्ने के जाँचे हुए अवतरण नहीं हैं, इसलिये यह पन्ना गुणवत्ता के लिये [[{{MediaWiki:Validationpage}}|जाँचा]] '''नहीं''' गया होने की संभावना हैं।",
	'revreview-note'               => '[[User:$1]] ने यह अवतरण [[{{MediaWiki:Validationpage}}|जाँचते समय]] निम्नलिखित सूचनायें दी हुई हैं:',
	'revreview-notes'              => 'आपके प्रेक्षण दर्शाने के लिये:',
	'revreview-oldrating'          => 'इसका गुणांकन:',
	'revreview-patrol'             => 'यह बदलाव देख लेने का मार्क करें',
	'revreview-patrol-title'       => 'जाँचने का मार्क करें',
	'revreview-patrolled'          => '[[:$1|$1]] के चुने हुए अवतरणपर गश्त देने का मार्क किया हैं।',
	'revreview-quality'            => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|बदलाव है|बदलाव हैं}}] जिनकी जाँच बाकी हैं।',
	'revreview-quality-i'          => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं, जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ढाँचे] में [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} साँचा/चित्र बदलाव] हैं जिनकी जाँच बाकी हैं।',
	'revreview-quality-old'        => 'यह एक [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।
इसमें नये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} बदलाव] होने की संभावना हैं।',
	'revreview-quality-same'       => 'यह नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] अवतरण हैं ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} पूरी सूची]), जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हो चुका हैं।',
	'revreview-quality-source'     => 'इस पन्नेका एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} गुणवत्तापूर्ण अवतरण], जो <i>$2</i> को [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] हुआ हैं, इस अवतरण पर आधारित था।',
	'revreview-quality-title'      => 'गुणवत्तापूर्ण लेख',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|चुना हुआ लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ड्राफ्ट देखें]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|चुना हुआ लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ड्राफ्ट देखें]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|चुना हुआ लेख]]'''",
	'revreview-quick-invalid'      => "'''गलत अवतरण क्रमांक'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|सद्य अवतरण]]''' (परिक्षण हुआ नहीं)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ड्राफ्ट देखें]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ड्राफ्ट देखें]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]'''",
	'revreview-quick-see-basic'    => "'''ड्राफ्ट''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} लेख देखें]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} फर्क जाँचें])",
	'revreview-quick-see-quality'  => "'''ड्राफ्ट''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} लेख देखें]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} फर्क जाँचें])",
	'revreview-selected'           => "'''$1:''' का चुना हुआ अवतरण",
	'revreview-source'             => 'कच्चा स्रोत',
	'revreview-stable'             => 'स्थिर पन्ना',
	'revreview-stable-title'       => 'चुना हुआ लेख',
	'revreview-stable1'            => 'आप शायद इस पन्नेका [{{fullurl:$1|stableid=$2}} यह मार्क किया हुआ अवतरण] अब [{{fullurl:$1|stable=1}} स्थिर अवतरण] बन चुका हैं या नहीं यह देखना चाहतें हैं।',
	'revreview-stable2'            => 'आप इस पन्नेका [{{fullurl:$1|stable=1}} स्थिर अवतरण] देख सकतें हैं (अगर उपलब्ध है तो)।',
	'revreview-style'              => 'वाचनीयता',
	'revreview-style-0'            => 'अप्रमाणित',
	'revreview-style-1'            => 'इस्तेमाल करने लायक',
	'revreview-style-2'            => 'अच्छा',
	'revreview-style-3'            => 'संक्षिप्त',
	'revreview-style-4'            => 'विशेष',
	'revreview-submit'             => 'रिव्ह्यू भेजें',
	'revreview-successful'         => "[[:$1|$1]] के चुने हुए अवतरणको मार्क किया गया हैं।
([{{fullurl:Special:Stableversions|page=$2}} सभी मार्क किये हुए अवतरण देखें])'''",
	'revreview-successful2'        => "'''[[:$1|$1]] के चुने हुए अवतरण का मार्क हटाया।'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] नवीनतम अवतरणसे चुनने के बजाय मूल पाठ के हिसाब से चुना जाता हैं।''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] पन्नेके जाँचे हुए अवतरण होते हैं और देखनेवालोंके लिये अविचल पाठ दर्शाते हैं।''",
	'revreview-toggle-title'       => 'ज्यादा ज़ानकारी दर्शायें/छुपायें',
	'revreview-toolow'             => 'एक अवतरण को जाँचने का मार्क करने के लिये आपको नीचे लिखे हर पॅरॅमीटरको "अप्रमाणित" से उपरी दर्जा देना आवश्यक हैं।
एक अवतरणका गुणांकन कम करने के लिये, निम्नलिखित सभी कॉलममें "अप्रमाणित" चुनें।',
	'revreview-update'             => "कृपया किये हुए बदलाव ''(नीचे दिये हुए)'' [[{{MediaWiki:Validationpage}}|जाँचे]] क्योंकी स्थिर अवतरण [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] कर दिया गया हैं।<br />
'''कुछ साँचा/चित्र बदले हैं:'''",
	'revreview-update-includes'    => "'''कुछ साँचा/चित्र बदले हैं:'''",
	'revreview-update-none'        => "कृपया किये हुए बदलाव ''(नीचे दिये हुए)'' [[{{MediaWiki:Validationpage}}|जाँचे]] क्योंकी स्थिर अवतरण [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] कर दिया गया हैं।",
	'revreview-update-use'         => "'''सूचना:''' अगर इसमें से किसी साँचा/चित्रका स्थिर अवतरण हैं, तो वह इस पन्नेके स्थिर अवतरण में पहले से इस्तेमाल किया हुआ हैं।",
	'revreview-visibility'         => "'''इस पन्नेको एक [[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] हैं, जो [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} बदला] जा सकता हैं।'''",
	'right-autopatrolother'        => 'मुख्य नामस्थान छोडकर अन्य नामस्थानोंके पन्नोंके अवतरणोंपर अपने आप ध्यान रखने का मार्क करें',
	'right-autoreview'             => 'अवतरण देखें ऐसे अपनेआप मार्क करें',
	'right-movestable'             => 'स्थिर पन्नोंका स्थानांतरण करें',
	'right-review'                 => 'अवतरण देखें ऐसे मार्क करें',
	'right-stablesettings'         => 'स्थिर अवतरण किस प्रकार चुना और दर्शाया जायेगा इसे निश्चित करें',
	'right-validate'               => 'अवतरण वैध ऐसे मार्क करें',
	'rights-editor-autosum'        => 'अपने आप तरक्की',
	'rights-editor-revoke'         => '[[$1]] के संपादन अधिकार निकाले गये',
	'specialpages-group-quality'   => 'गुणवत्ता नियंत्रण',
	'stable-logentry'              => '[[$1]] का स्थिर अवतरणीकरण बदलें',
	'stable-logentry2'             => '[[$1]] का स्थिर अवतरणीकरण पूर्ववत करें',
	'stable-logpage'               => 'स्थिर आवृत्ती सूची',
	'stable-logpagetext'           => 'यह कंटेंट पन्नोंके [[{{MediaWiki:Validationpage}}|स्थिर अवतरण]] में हुए बदलावों की सूची हैं।
स्थिर पन्नोंकी सूची [[Special:StablePages|स्थिर पन्नोंकी सूची]] यहां देख सकतें हैं।',
	'tooltip-ca-current'           => 'इस पन्ने का कच्चा अवतरण देखें',
	'tooltip-ca-default'           => 'गुणवत्ता आश्वासन सेटिंग',
	'tooltip-ca-stable'            => 'इस पन्ने का स्थिर अवतरण देखें',
	'validationpage'               => '{{ns:help}}:लेख प्रमाणिकरण',
);

/** Croatian (Hrvatski)
 * @author SpeedyGonsales
 * @author Dnik
 * @author Dalibor Bosits
 * @author Siebrand
 */
$messages['hr'] = array(
	'editor'                      => 'Urednik',
	'flaggedrevs'                 => 'Označene promjene',
	'group-editor'                => 'Urednici',
	'group-editor-member'         => 'Urednik',
	'group-reviewer'              => 'Ocjenjivači',
	'group-reviewer-member'       => 'Ocjenjivač',
	'grouppage-editor'            => '{{ns:project}}:Urednik',
	'grouppage-reviewer'          => '{{ns:project}}:Ocjenjivač',
	'hist-quality'                => 'kvalitetna',
	'hist-stable'                 => 'pregledana',
	'review-diff2stable'          => 'Promjene između važeće i trenutne inačice',
	'review-logentry-app'         => 'ocijenio [[$1]]',
	'review-logentry-dis'         => 'zastarjela inačica stranice [[$1]]',
	'review-logentry-id'          => 'ocjena broj $1',
	'review-logpage'              => 'Evidencija ocjena članka',
	'review-logpagetext'          => 'Ovo je evidencija promjena [[{{MediaWiki:Validationpage}}|ocjena]] članaka.',
	'reviewer'                    => 'Ocjenjivač',
	'revisionreview'              => 'Ocijeni inačice',
	'revreview-accuracy'          => 'Točnost',
	'revreview-accuracy-0'        => 'Članak ne zadovoljava',
	'revreview-accuracy-1'        => 'Članak zadovoljava',
	'revreview-accuracy-2'        => 'Dobar',
	'revreview-accuracy-3'        => 'Vrlo dobar (potkrijepljen izvorima)',
	'revreview-accuracy-4'        => 'Izvrstan',
	'revreview-auto'              => '(automatski)',
	'revreview-auto-w'            => "Uređujete važeću inačicu stranice, svaka vaša promjena biti će '''automatski ocijenjena'''.
Možda želite pregledati vaše izmjene prije snimanja.",
	'revreview-auto-w-old'        => "Uređujete staru inačicu članka, svaka promjena bit će '''automatski ocijenjena'''.
Možda želite pregledati vaše izmjene prije snimanja.",
	'revreview-basic'             => 'Ovo je zadnja [[{{MediaWiki:Validationpage}}|pregledana]] promjena,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} odobrena] dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Članak u radu]
možete [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} uređivati]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|promjena|promjene|promjena}}]
{{PLURAL:$3|čeka|čekaju|čeka}} ocjenjivanje.',
	'revreview-changed'           => "'''Traženu akciju nije moguće izvršiti na ovoj inačici stranice [[:$1|$1]].'''

Tražen je predložak ili slika bez navođenja verzije. To se može dogoditi ukoliko
predložak uključuje sliku ili drugi predložak koji ovisi o varijabli koja se promijenila
nakon što ste počeli ocjenjivati članak. Osvježavanje (Ctrl + R) može riješiti ovaj problem.",
	'revreview-current'           => 'Članak u radu',
	'revreview-depth'             => 'Dubina',
	'revreview-depth-0'           => 'Članak ne zadovoljava',
	'revreview-depth-1'           => 'Članak zadovoljava',
	'revreview-depth-2'           => 'Dobar',
	'revreview-depth-3'           => 'Vrlo dobar',
	'revreview-depth-4'           => 'Izvrstan',
	'revreview-edit'              => 'Uredi članak u radu',
	'revreview-flag'              => 'Ocijeni izmjenu',
	'revreview-legend'            => 'Ocijeni sadržaj inačice',
	'revreview-log'               => 'Napomena:',
	'revreview-main'              => 'Morate odabrati neku izmjenu stranice u glavnom imenskom prostoru za ocjenjivanje.

Pogledajte popis [[Special:Unreviewedpages|neocijenjenih stranica]] za to.',
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zadnji pregled promjena na članku]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} prikaži sve]) je [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} izvršen]
dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|promjena|promjene|promjena}}] {{PLURAL:$3|treba|trebaju|treba}} ocjenu.',
	'revreview-newest-quality'    => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zadnje ocjenjivanje članka]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} prikaži sve]) je [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} izvršeno]
dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|promjena|promjene|promjena}}] {{PLURAL:$3|treba|trebaju|treba}} ocjenu.',
	'revreview-noflagged'         => "Nema ocijenjenih inačica stranice, stoga stranica najvjerojatnije '''nije''' [[{{MediaWiki:Validationpage}}|provjerena]].",
	'revreview-note'              => '[User:$1]] je zabilježio slijedeće pri [[{{MediaWiki:Validationpage}}|ocjenjivanju]] ove inačice:',
	'revreview-notes'             => 'Primjedbe ili napomene koje treba prikazati:',
	'revreview-oldrating'         => 'Prethodna ocjena:',
	'revreview-patrol'            => 'Označi ovu izmjenu pregledanom',
	'revreview-patrolled'         => 'Odabrana izmjena stranice [[:$1|$1]] je označena pregledanom (patroliranom).',
	'revreview-quality'           => 'Ovo je zadnja [[{{MediaWiki:Validationpage}}|ocijenjena]] promjena,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} odobrena] dana <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Članak u radu]
možete [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} uređivati]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|promjena|promjene|promjena}}]
{{PLURAL:$3|čeka|čekaju|čeka}} ocjenjivanje.',
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|Pregled]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vidi članak u izradi]]",
	'revreview-quick-none'        => "'''Važeća inačica''' (nema ocijenjenih inačica)",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|Ocjena]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vidi članak u izradi]]",
	'revreview-quick-see-basic'   => "'''Članak u izradi''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vidi važeću inačicu]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|promjena|promjene|promjena}}])",
	'revreview-quick-see-quality' => "'''Članak u izradi''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vidi važeću inačicu]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|promjena|promjene|promjena}}])",
	'revreview-selected'          => "Odabrane promjene '''$1:'''",
	'revreview-source'            => 'izvor članka u radu',
	'revreview-stable'            => 'Važeća inačica',
	'revreview-style'             => 'Čitljivost',
	'revreview-style-0'           => 'Neodobren',
	'revreview-style-1'           => 'Prihvatljiv',
	'revreview-style-2'           => 'Dobar',
	'revreview-style-3'           => 'Vrlo dobar',
	'revreview-style-4'           => 'Izvrstan',
	'revreview-submit'            => 'Podnesi ocijenu',
	'revreview-text'              => "Važeća (''stabilna'') inačica stranice prikazuje se svima umjesto najnovije inačice.",
	'revreview-toolow'            => 'Morate ocijeniti po svakom od donjih kriterija ocjenom višom od "Ne zadovoljava"
da bi promjena bila pregledana/ocijenjena. U suprotnom, ostavite sve na "Ne zadovoljava".',
	'revreview-update'            => "Molim [[{{MediaWiki:Validationpage}}|pregledajte]] sve promjene ''(prikazane dolje)'' učinjene od kad je  stabilna inačica [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} odobrena]. 

'''Neki predlošci/slike su promijenjeni:'''",
	'revreview-update-none'       => "Molim, [[{{MediaWiki:Validationpage}}|pregledajte]] sve promjene ''(prikazane dolje)'' učinjene od kad je stabilna inačica [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} odobrena].",
	'revreview-visibility'        => 'Ovaj članak ima [[{{MediaWiki:Validationpage}}|važeću inačicu]], koja može biti
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigurirana].',
	'rights-editor-autosum'       => 'samopromoviran',
	'rights-editor-revoke'        => 'oduzet status urednika suradniku [[$1]]',
	'stable-logentry'             => 'postavljena važeća inačica stranice [[$1]]',
	'stable-logentry2'            => 'poništi važeću inačicu članka [[$1]]',
	'stable-logpage'              => 'Evidencija stabilnih verzija',
	'stable-logpagetext'          => 'Ovo je evidencija promjena [[{{MediaWiki:Validationpage}}|važećih inačica]] 
članaka u glavnom imenskom prostoru.',
	'tooltip-ca-current'          => 'Vidi trenutnu inačicu ove stranice',
	'tooltip-ca-default'          => 'Postavke važeće inačice',
	'tooltip-ca-stable'           => 'Vidi važeću inačicu stranice',
	'validationpage'              => '{{ns:help}}:Ocjenjivanje članaka',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 * @author Dundak
 * @author Siebrand
 */
$messages['hsb'] = array(
	'editor'                       => 'wobdźěłowar',
	'flaggedrevs'                  => 'Woznamjenjene wersije',
	'flaggedrevs-desc'             => 'Dawa wobdźěłowarjam/pruwowarjam móžnosć wersije pohódnoćić a strony stabilizować',
	'group-editor'                 => 'wobdźěłowarjo',
	'group-editor-member'          => 'wobdźěłowar',
	'group-reviewer'               => 'přehladowarjo',
	'group-reviewer-member'        => 'přehladowar',
	'grouppage-editor'             => '{{ns:project}}:Wobdźěłowar',
	'grouppage-reviewer'           => '{{ns:project}}:Přehladowar',
	'hist-quality'                 => 'pruwowana wersija',
	'hist-stable'                  => 'wuhladana wersija',
	'review-diff2stable'           => 'Rozdźěle mjez stabilnej a aktualnej wersiju wobhladać',
	'review-logentry-app'          => 'je $1 přepruwował',
	'review-logentry-dis'          => 'je wersiju wot $1 zaćisnył',
	'review-logentry-id'           => 'Wersijowy ID $1',
	'review-logpage'               => 'Protokol přepruwowanjow',
	'review-logpagetext'           => 'To je protokol změnow statusa [[{{MediaWiki:Makevalidate-page}}|schwalenja]] pruwowanjow za nastawki.
Hlej [[Special:ReviewedPages|lisćinu přepruwowanych stronow]] za lisćinu schwalenych stronow.',
	'reviewer'                     => 'přehladowar',
	'revisionreview'               => 'Wersije přepruwować',
	'revreview-accuracy'           => 'Dokładnosć',
	'revreview-accuracy-0'         => 'njespušćomna',
	'revreview-accuracy-1'         => 'přehladana',
	'revreview-accuracy-2'         => 'pruwowana',
	'revreview-accuracy-3'         => 'žórła přepruwowane',
	'revreview-accuracy-4'         => 'wuběrna',
	'revreview-auto'               => '(awtomatisce)',
	'revreview-auto-w'             => "Wobdźěłuješ runje stabilnu wersiju, změny so '''awtomatisce pruwuja.'''",
	'revreview-auto-w-old'         => "Wobdźěłuješ přepruwowanu wersiju; změny budu so '''awtomatisce pruwować'''.",
	'revreview-basic'              => 'To je poslednja [[{{MediaWiki:Validationpage}}|wuhladana]] wersija,
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dopušćena] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} tuchwilna wersija]
	móže so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}]
	{{PLURAL:$3|dyrbi|dyrbi|dyrbjadyrbjetej}} so hišće pruwować.',
	'revreview-basic-same'         => 'To je aktualna [[{{MediaWiki:Validationpage}}|přehladana]] wersija, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] <i>$2</i>. Strona da so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać].',
	'revreview-changed'            => "'''Naprašowanska akcija njeda so na tutu wersiju wot [[:$1|$1]] nałožować.''' 

Předłoha abo wobraz bu bjez podaća wersije požadana/požadany. To móže so stać, jeli dynamiska předłoha dalšu předłohu abo dalši wobraz zapřijmje, kotrejž stej wot wariable wotwisnej, kotraž je so wot spočatka pruwowanja strony změniła. Znowazačitanje strony a nowe pruwowanje móže tón problem rozrisać.",
	'revreview-current'            => 'Naćisk',
	'revreview-depth'              => 'Hłubokosć',
	'revreview-depth-0'            => 'njespušćomna',
	'revreview-depth-1'            => 'jednora',
	'revreview-depth-2'            => 'srěnja',
	'revreview-depth-3'            => 'wysoka',
	'revreview-depth-4'            => 'wuběrna',
	'revreview-edit'               => 'Naćisk wobdźěłać',
	'revreview-flag'               => 'Tutu wersiju přepruwować',
	'revreview-legend'             => 'Wobsah wersije pohódnoćić',
	'revreview-log'                => 'Protokolowy zapisk:',
	'revreview-main'               => 'Dyrbiš wěstu wersiju nastawka za přehladanje wubrać.

Hlej [[{{ns:special}}:Unreviewedpages]] za lisćinu njepřehladanych wersijow.',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslednja wuhladana wersija]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} hlej wšě]) bu dnja <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dopušćena].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}] {{PLURAL:$3|dyrbi|dyrbi|dyrbja|dyrbjetej}} so pruwować.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Poslednja pruwowana wersija]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} hlej wšě]) bu <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dopušćena].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}] {{PLURAL:$3|dyrbi|dyrbi|dyrbja|dyrbjetej}} so hišće pruwować.',
	'revreview-noflagged'          => 'Njeje přehladowanych wersijow tuteje strony, tak zo njejsu wuprajenja k [[{{MediaWiki:Validationpage}}|spušćomnosći nastawka]] móžne.',
	'revreview-note'               => '[[{{ns:user}}:$1]] činješe slědowace [[{{MediaWiki:Validationpage}}|pruwowanske noticy]] k tutej wersiji:',
	'revreview-notes'              => 'Wobkedźbowanja abo přispomnjenki, kotrež maja so pokazać:',
	'revreview-oldrating'          => 'Zastopnjowanje:',
	'revreview-patrol'             => 'Tutu změnu jako dohladowanu markěrować',
	'revreview-patrolled'          => 'Wubrana wersija bu wot [[:$1|$1]] bu jako dohladowana marěkrowana.',
	'revreview-quality'            => 'To je poslednja [[{{MediaWiki:Validationpage}}|kwalitna wersija]],
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} dopušćena]  <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Tuchwilna wersija]
	móže so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|wersija|wersijow|wersije|wersiji}}]
	{{PLURAL:$3|dyrbi|dyrbi|dyrbja|dyrbjetej}} so hišće pruwować.',
	'revreview-quality-same'       => 'To je aktualna [[{{MediaWiki:Validationpage}}|kajkostna]] wersija,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena] <i>$2</i>. Strona da so [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} wobdźěłać].',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Wuhladowany]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Hlej aktualna wersiju]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Přehladany]]''' (žane njepruwowane změny)",
	'revreview-quick-none'         => "'''Aktualnje'''. Žane přehladowane wersije.",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Pruwowany]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Hlej aktualnu wersiju]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kajkosć]]''' (žane njepruwowane změny)",
	'revreview-quick-see-basic'    => "'''Naćisk''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} hlej stabilnu stronu]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}}
{{PLURAL:$2|změna|změnje|změny|změnow}}])",
	'revreview-quick-see-quality'  => "'''Naćisk''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} hlej stabilnu stronu]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|změna|změnje|změny|změnow}}])",
	'revreview-selected'           => "Wubrana wersija z '''$1:'''",
	'revreview-source'             => 'Žórło naćiska',
	'revreview-stable'             => 'Stabilna strona',
	'revreview-style'              => 'Čitajomnosć',
	'revreview-style-0'            => 'njespušćomna',
	'revreview-style-1'            => 'akceptabelna',
	'revreview-style-2'            => 'dobra',
	'revreview-style-3'            => 'precizna',
	'revreview-style-4'            => 'wuběrna',
	'revreview-submit'             => 'Přepruwowanje składować',
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Stabilne wersije]] su skerje standardny wobsah strony za wobhladowarjow hač najnowša wersija.''",
	'revreview-toolow'             => 'Dyrbiš za kóždy z deleka naspomnjenych atributow hódnotu wyše hač „{{int:revreview-accuracy-0}}“ zapodać,
	zo by so wersija jako přehladana woznamjeniła. Zo by wersiju zaćisnył, dyrbja wšě atributy „{{int:revreview-accuracy-0}}“ być.',
	'revreview-update'             => "Prošu [[{{MediaWiki:Validationpage}}|přepruwuj]] změny ''(hlej deleka)'', kotrež buchu činjene, wot toho zo stabilna wersija bu [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena].
'''Někotre předłohi/wobrazy buchu zaktualizowane:'''",
	'revreview-update-none'        => "Prošu [[{{MediaWiki:Validationpage}}|přepruwuj]] změny ''(hlej deleka)'', kotrež buchu činjene, wot toho zo stabilna wersija bu [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schwalena].",
	'revreview-visibility'         => "'''Tuta strona ma [[{{MediaWiki:Validationpage}}|stabilnu wersiju]]; nastajenja za nju dadźa so [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigurować].'''",
	'rights-editor-revoke'         => 'status wobdźěłowarja bu [[$1]] zebrany.',
	'stable-logentry'              => 'konfigurowaše woznamjenjenje stabilneje wersije za [[$1]]',
	'stable-logentry2'             => 'woznamjenjenje stabilneje wersije za [[$1]] anulować',
	'stable-logpage'               => 'Protokol stabilneje wersije',
	'stable-logpagetext'           => 'To je protokol změnow konfiguracije [[{{MediaWiki:Validationpage}}|stabilneje wersije]] nastawkow.
Lisćinu stabilizowanych stronow namakaš w [[Special:StablePages|lisćinje stabilnych stronow]].',
	'tooltip-ca-current'           => 'Aktualny naćisk tuteje strony wobhladać',
	'tooltip-ca-default'           => 'Nastajenja kwalitneho zawěsćenja',
	'tooltip-ca-stable'            => 'Stabilnu wersiju tuteje strony wobhladać',
	'validationpage'               => '{{ns:help}}:Stabilne wersije',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author KossuthRad
 * @author Siebrand
 */
$messages['hu'] = array(
	'editor'                       => 'szerkesztő',
	'flaggedrevs'                  => 'Ellenőrzött változatok',
	'flaggedrevs-desc'             => 'Lehetővé teszi a szerkesztők/ellenőrök számára, hogy ellenőrizzék és elfogadják lapok adott változatait',
	'group-editor'                 => 'szerkesztők',
	'group-editor-member'          => 'szerkesztő',
	'group-reviewer'               => 'ellenőrök',
	'group-reviewer-member'        => 'ellenőr',
	'grouppage-editor'             => '{{ns:project}}:Szerkesztők',
	'grouppage-reviewer'           => '{{ns:project}}:Ellenőrök',
	'hist-draft'                   => 'vázlat',
	'hist-quality'                 => 'minőségi változat',
	'hist-stable'                  => 'áttekintett változat',
	'review-diff2stable'           => 'Az elfogadott és a jelenlegi változat közötti eltérések megtekintése',
	'review-logentry-app'          => 'értékelte a(z) [[$1]] szócikket',
	'review-logentry-dis'          => 'törölte a(z) [[$1]] lap egyik változatának értékelését',
	'review-logentry-id'           => 'változat azonosítója: $1',
	'review-logpage'               => 'Cikkértékelési napló',
	'review-logpagetext'           => 'Ez a lap a lapok verzióinak [[{{MediaWiki:Validationpage}}|elfogadottsági]] állapotában történt változások
naplója.',
	'reviewer'                     => 'ellenőr',
	'revisionreview'               => 'Változatok ellenőrzése',
	'revreview-accuracy'           => 'Pontosság',
	'revreview-accuracy-0'         => 'ellenőrizetlen',
	'revreview-accuracy-1'         => 'megtekintve',
	'revreview-accuracy-2'         => 'pontos',
	'revreview-accuracy-3'         => 'forrásokkal megfelelően alátámasztva',
	'revreview-accuracy-4'         => 'kiemelt',
	'revreview-auto'               => '(automatikus)',
	'revreview-auto-w'             => "Jelenleg a lap elfogadott változatát szerkeszted, bármilyen változás '''automatikusan ellenőrizve lesz'''.",
	'revreview-auto-w-old'         => "Jelenleg a lap egy egy korábbi változatot szerkeszted, bármilyen változás '''automatikusan ellenőrizve lesz'''.",
	'revreview-basic'              => 'Ez a legutóbbi [[{{MediaWiki:Validationpage}}|áttekintett]] változat,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i>. A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vázlat]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} módosítható]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 változás]
vár áttekintésre.',
	'revreview-changed'            => "'''A kért művelet nem hajtható végre [[:$1|$1]] ezen változatán.'''

Egy sablon vagy kép lehetett kérve, miközben nem lett megadva adott változat. Ez akkor történhet meg, ha 
egy dinamikus sablon más képet vagy sablont illeszt be egy változótól függően, ami megváltozott a lap ellenőrzésének kezdete óta. Az oldal frissítése és az ellenőrzés újbóli elvégzése megoldhatja a problémát.",
	'revreview-current'            => 'Vázlat',
	'revreview-depth'              => 'Részletesség',
	'revreview-depth-0'            => 'ellenőrizetlen',
	'revreview-depth-1'            => 'alacsony',
	'revreview-depth-2'            => 'közepes',
	'revreview-depth-3'            => 'nagy',
	'revreview-depth-4'            => 'kiemelt',
	'revreview-edit'               => 'Vázlat szerkesztése',
	'revreview-flag'               => 'Jelenlegi változat ellenőrzése',
	'revreview-invalid'            => "'''Érvénytelen cél:''' a megadott azonosító nem egy [[{{MediaWiki:Validationpage}}|ellenőrzött]] változat.",
	'revreview-legend'             => 'A változat tartalmának értékelése',
	'revreview-log'                => 'Megjegyzés:',
	'revreview-main'               => 'Ki kell választanod egy oldal adott változatát az ellenőrzéshez.

Lásd az [[Special:Unreviewedpages|ellenőrizetlen lapok listáját]].',
	'revreview-newest-basic'       => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi megtekintett változat]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} összes megjelenítése]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva]
ekkor: <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 változást] kell ellenőrizni.',
	'revreview-newest-quality'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} legutóbbi minőségi változat]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} összes megjelenítése]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva]
ekkor: <i>$2</i> [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 változást] kell ellenőrizni.',
	'revreview-noflagged'          => "Az oldal még nem rendelkezik ellenőrzött változatokkal, így '''nem''' lehetett
[[{{MediaWiki:Validationpage}}|ellenőrizni]] minőség alapján.",
	'revreview-note'               => '[[User:$1]] az alábbi megjegyzéseket tette ezen változat [[{{MediaWiki:Validationpage}}|ellenőrzésekor]]:',
	'revreview-notes'              => 'Megjelenítendő megfigyelések vagy megjegyzések:',
	'revreview-oldrating'          => 'Osztályozása:',
	'revreview-patrol'             => 'Ellenőrzöttnek jelölöm',
	'revreview-patrolled'          => '[[:$1|$1]] kiválasztott változata ellenőrzöttnek lett jelölve.',
	'revreview-quality'            => 'Ez a legutóbbi [[{{MediaWiki:Validationpage}}|minőségi]] változat,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadva] ekkor: <i>$2</i>.
A [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vázlaton] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3
változtatást] kell ellenőrizni.',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Áttekintett]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vázlat megtekintése]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Megtekintett szócikk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vázlat megjelenítése]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Áttekintett]]''' (nincsenek ellenőrizetlen változások)",
	'revreview-quick-invalid'      => "'''A változat azonosítója érvénytelen'''",
	'revreview-quick-none'         => "'''Jelenlegi''' (nem megtekintett változatok)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Minőségi]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vázlat megtekintése]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Minőségi szócikk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vázlat megjelenítése]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Minőségi]]''' (nincsenek ellenőrizetlen változások)",
	'revreview-quick-see-basic'    => "'''Vázlat''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} elfogadott változat megtekintése]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} változás])",
	'revreview-quick-see-quality'  => "'''Vázlat''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} elfogadott változat megtekintése]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} változás])",
	'revreview-selected'           => "A(z) '''$1''' jelenleg kiválasztott változata:",
	'revreview-source'             => 'Vázlat forrása',
	'revreview-stable'             => 'Elfogadott változat',
	'revreview-style'              => 'Olvashatóság',
	'revreview-style-0'            => 'ellenőrizetlen',
	'revreview-style-1'            => 'elfogadható',
	'revreview-style-2'            => 'jó',
	'revreview-style-3'            => 'tömör',
	'revreview-style-4'            => 'kiemelt',
	'revreview-submit'             => 'Értékelés elküldése',
	'revreview-text'               => 'Az alapértelmezett beállítások szerint az elfogadott változatok jelennek meg az újabbak helyett.',
	'revreview-toolow'             => "Ahhoz, hogy egy változatot ellenőrzöttnek jelölhess, mindenhol meg kell adnod valamilyen értékelést.
Ha törölni szeretnéd az értékelést, akkor állíts mindent ''ellenőrizetlen''re.",
	'revreview-update'             => "[[{{MediaWiki:Validationpage}}|Ellenőrizz]] minden változást (lenn láthatóak), amelyek az [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadott] változat óta készültek.

'''Néhány sablon vagy kép frissítve lett:'''",
	'revreview-update-none'        => '[[{{MediaWiki:Validationpage}}|Ellenőrizz]] minden változást (lenn láthatóak), amelyek az [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} elfogadott] változat óta készültek.',
	'revreview-visibility'         => 'Ez az oldal rendelkezik [[{{MediaWiki:Validationpage}}|elfogadott változattal]], amelyet
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} be lehet állítani].',
	'rights-editor-autosum'        => 'automatikusan megadva',
	'rights-editor-revoke'         => '[[$1]] szerkesztői jogai meg lettek vonva',
	'stable-logentry'              => 'beállította [[$1]] elfogadott változatait',
	'stable-logentry2'             => 'törölte [[$1]] stabil változataival kapcsolatos beállításokat',
	'stable-logpage'               => 'Elfogadott változatok naplója',
	'stable-logpagetext'           => 'Ez a lap a lapok [[{{MediaWiki:Validationpage}}|elfogadott változataiban]] történt változások
naplója.',
	'tooltip-ca-current'           => 'Az oldal jelenlegi vázlatának megtekintése',
	'tooltip-ca-default'           => 'Minőségbiztosítási beállítások',
	'tooltip-ca-stable'            => 'Az oldal elfogadott változatának megtekintése',
	'validationpage'               => '{{ns:help}}:Szócikk ellenőrzése',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'revreview-log' => 'Commento:',
);

/** Indonesian (Bahasa Indonesia)
 * @author Rex
 */
$messages['id'] = array(
	'editor'                       => 'Editor',
	'flaggedrevs'                  => 'Revisi bertanda',
	'flaggedrevs-backlog'          => "Terdapat [[Special:OldReviewedPages|halaman-halaman tertinjau yang telah usang]]. '''Perhatian Anda dibutuhkan!'''",
	'flaggedrevs-desc'             => 'Memberikan fasilitas bagi Editor atau Peninjau untuk memvalidasi versi-versi artikel dan menandai sebagai stabil',
	'flaggedrevs-pref-UI-0'        => 'Gunakan antarmuka pengguna detail untuk versi stabil',
	'flaggedrevs-pref-UI-1'        => 'Gunakan antarmuka pengguna sederhana untuk versi stabil',
	'flaggedrevs-prefs'            => 'Versi stabil',
	'flaggedrevs-prefs-stable'     => 'Selalu tampilkan halaman versi stabil sebagai tampilan baku (jika ada)',
	'flaggedrevs-prefs-watch'      => 'Tambahkan halaman yang saya tinjau ke daftar pantauan',
	'group-editor'                 => 'Editor',
	'group-editor-member'          => 'Editor',
	'group-reviewer'               => 'Peninjau',
	'group-reviewer-member'        => 'Peninjau',
	'grouppage-editor'             => '{{ns:project}}:Editor',
	'grouppage-reviewer'           => '{{ns:project}}:Peninjau',
	'hist-draft'                   => 'draf',
	'hist-quality'                 => 'revisi layak',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} divalidasi] oleh [[User:$3|$3]]',
	'hist-stable'                  => 'revisi terperiksa',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} diperiksa] oleh [[User:$3|$3]]',
	'review-diff2stable'           => 'Lihat perubahan antara revisi stabil dan terkini',
	'review-logentry-app'          => 'meninjau [[$1]]',
	'review-logentry-dis'          => 'menurunkan peringkat [[$1]]',
	'review-logentry-id'           => 'ID revisi $1',
	'review-logentry-diff'         => 'perbedaan dengan revisi stabil',
	'review-logpage'               => 'Log tinjauan revisi',
	'review-logpagetext'           => 'Ini adalah log perubahan status [[{{MediaWiki:Validationpage}}|persetujuan]] revisi untuk halaman isi.
Lihat [[Special:ReviewedPages|daftar halaman yang telah ditinjau]] untuk daftar halaman yang disetujui.',
	'reviewer'                     => 'Peninjau',
	'revisionreview'               => 'Tinjau revisi',
	'revreview-accuracy'           => 'Akurasi',
	'revreview-accuracy-0'         => 'Tak disetujui',
	'revreview-accuracy-1'         => 'Terperiksa',
	'revreview-accuracy-2'         => 'Akurat',
	'revreview-accuracy-3'         => 'Data sumber bagus',
	'revreview-accuracy-4'         => 'Terpilih',
	'revreview-approved'           => 'Disetujui',
	'revreview-auto'               => '(otomatis)',
	'revreview-auto-w'             => "Anda menyunting revisi stabil, semua perubahan akan '''secara otomatis ditandai sebagai tertinjau'''.",
	'revreview-auto-w-old'         => "Anda menyunting revisi lama, semua perubahan akan '''secara otomatis ditandai sebagai tertinjau'''.",
	'revreview-basic'              => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|perubahan|perubahan}}] yang memerlukan tinjauan.',
	'revreview-basic-i'            => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan templat/berkas] yang memerlukan tinjauan.',
	'revreview-basic-old'          => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
Mungkin telah ada [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan-perubahan] yang lebih baru pada draf.',
	'revreview-basic-same'         => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|terperiksa]] yang terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.',
	'revreview-basic-source'       => 'Terdapat [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versi terperiksa] untuk halaman ini, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>, yang berdasarkan pada revisi ini.',
	'revreview-changed'            => "'''Tindakan yang diminta tidak dapat dilakukan terhadap revisi dari [[:$1|$1]] ini.'''

Satu templat atau berkas mungkin telah diminta tanpa menyebutkan suatu versi spesifik.
Hal ini dapat terjadi jika suatu templat dinamis mengikutkan suatu berkas atau templat lain yang bergantung pada suatu variabel yang telah berubah sejak Anda mulai meninjau halaman ini.
Pemuatan dan peninjauan ulang halaman dapat memecahkan masalah ini.",
	'revreview-current'            => 'Draf',
	'revreview-depth'              => 'Kedalaman',
	'revreview-depth-0'            => 'Tak disetujui',
	'revreview-depth-1'            => 'Dasar',
	'revreview-depth-2'            => 'Moderat',
	'revreview-depth-3'            => 'Tinggi',
	'revreview-depth-4'            => 'Terpilih',
	'revreview-draft-title'        => 'Artikel draf',
	'revreview-edit'               => 'Sunting draf',
	'revreview-edited'             => "'''Suntingan akan digabungkan sebagai [[{{MediaWiki:Validationpage}}|versi stabil]] setelah ditinjau oleh pengguna yang ditetapkan.
''Draf'' ditampilkan di bawah ini.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|perubahan|perubahan}}] memerlukan tinjauan.",
	'revreview-flag'               => 'Tinjau revisi ini',
	'revreview-invalid'            => "'''Tujuan tidak ditemukan:''' tidak ada revisi [[{{MediaWiki:Validationpage}}|tertinjau]] yang cocok dengan nomor revisi yang diminta.",
	'revreview-legend'             => 'Beri peringkat untuk isi revisi',
	'revreview-log'                => 'Komentar:',
	'revreview-main'               => 'Anda harus memilih suatu revisi tertentu dari halaman isi untuk ditinjau.

Lihat [[Special:Unreviewedpages]] untuk daftar halaman yang belum ditinjau.',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi terakhir yang terperiksa] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|perubahan|perubahan}}] {{PLURAL:$3|butuh|butuh}} tinjauan.',
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi terperiksa yang terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Perubahan templat/berkas] memerlukan tinjauan.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi layak yang terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|perubahan|perubahan}}] {{PLURAL:$3|butuh|butuh}} tinjauan.',
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Revisi layak yang terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Perubahan templat/berkas] memerlukan tinjauan.',
	'revreview-noflagged'          => "Tak ada revisi tertinjau dari halaman ini, jadi halaman ini mungkin '''belum''' [[{{MediaWiki:Validationpage}}|diperiksa]] kelayakannya.",
	'revreview-note'               => '[[User:$1]] memberikan catatan berikut sewaktu [[{{MediaWiki:Validationpage}}|meninjau]] revisi ini:',
	'revreview-notes'              => 'Pengamatan atau catatan untuk ditampilkan:',
	'revreview-oldrating'          => 'Memiliki rating:',
	'revreview-patrol'             => 'Tandai perubahan ini terpatroli',
	'revreview-patrol-title'       => 'Ditandai sebagai terpatroli',
	'revreview-patrolled'          => 'Revisi terpilih dari [[:$1|$1]] telah ditandai terpatroli.',
	'revreview-quality'            => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|perubahan|perubahan}}] yang memerlukan tinjauan.',
	'revreview-quality-i'          => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Drafnya] memiliki [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan templat/berkas] yang memerlukan tinjauan.',
	'revreview-quality-old'        => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.
Mungkin telah ada [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan-perubahan] yang lebih baru pada draf.',
	'revreview-quality-same'       => 'Ini adalah revisi [[{{MediaWiki:Validationpage}}|layak]] yang terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tampilkan semua]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>.',
	'revreview-quality-source'     => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Revisi layak] dari halaman ini, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui] pada <i>$2</i>, didasarkan pada revisi ini.',
	'revreview-quality-title'      => 'Artikel layak',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Terperiksa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Terperiksa]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Terperiksa]]'''",
	'revreview-quick-invalid'      => "'''Nomor ID revisi tidak sah'''",
	'revreview-quick-none'         => "'''Terkini''' (belum ditinjau)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Layak]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Layak]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Layak]]'''",
	'revreview-quick-see-basic'    => "'''Draf''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat artikel]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} bandingkan])",
	'revreview-quick-see-quality'  => "'''Draf''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat artikel]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} bandingkan])",
	'revreview-selected'           => "Revisi terpilih dari '''$1:'''",
	'revreview-source'             => 'sumber draf',
	'revreview-stable'             => 'Stabil',
	'revreview-stable-title'       => 'Artikel terperiksa',
	'revreview-stable1'            => 'Anda mungkin ingin menampilkan [{{fullurl:$1|stableid=$2}} versi yang ditandai ini] untuk melihat apakah sudah ada [{{fullurl:$1|stable=1}} versi stabil] dari halaman ini.',
	'revreview-stable2'            => 'Anda mungkin ingin melihat [{{fullurl:$1|stable=1}} versi stabil] halaman ini (bila ada).',
	'revreview-style'              => 'Keterbacaan',
	'revreview-style-0'            => 'Tak disetujui',
	'revreview-style-1'            => 'Cukup',
	'revreview-style-2'            => 'Baik',
	'revreview-style-3'            => 'Ringkas',
	'revreview-style-4'            => 'Terpilih',
	'revreview-submit'             => 'Kirim tinjauan',
	'revreview-successful'         => "'''Versi terpilih dari [[:$1|$1]] berhasil ditandai. ([{{fullurl:Special:Stableversions|page=$2}} lihat semua versi yang ditandai])'''",
	'revreview-successful2'        => "'''Penandaan versi yang dipilih dari [[:$1|$1]] telah dibatalkan.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] diset sebagai isi tampilan baku halaman dan bukan revisi terakhir.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] merupakan revisi-revisi halaman yang telah diperiksa dan dapat diset sebagai isi tampilan baku halaman bagi pembaca.''",
	'revreview-toggle-title'       => 'tampilkan/sembunyikan detail',
	'revreview-toolow'             => 'Anda harus memberi peringkat lebih tinggi dari "tak disetujui" dalam penilaian di bawah ini agar suatu revisi dapat dianggap telah ditinjau. Untuk menurunkan peringkat suatu revisi, berikan nilai "tak disetujui" pada semua penilaian.',
	'revreview-update'             => "Harap [[{{MediaWiki:Validationpage}}|meninjau]] semua perubahan ''(ditampilkan berikut)'' yang dibuat sejak revisi stabil [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui].<br />
'''Beberapa templat/berkas telah diubah:'''",
	'revreview-update-includes'    => "'''Beberapa templat/berkas telah diperbaharui:'''",
	'revreview-update-none'        => "Harap [[{{MediaWiki:Validationpage}}|meninjau]] semua perubahan ''(ditampilkan berikut)'' yang dibuat sejak revisi stabil [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disetujui].",
	'revreview-update-use'         => "'''CATATAN''': Templat/berkas yang akan digunakan adalah templat/berkas versi stabil (jika ada).",
	'revreview-diffonly'           => "''Untuk memeriksa halaman, pilih pranala \"revisi sekarang\" dan gunakan formulir peninjauan.''",
	'revreview-visibility'         => 'Halaman ini memiliki [[{{MediaWiki:Validationpage}}|versi stabil]], yang dapat [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} dikonfigurasi].',
	'right-autopatrolother'        => 'Menandai secara otomatis suntingan di ruang nama non-utama sebagai terpatroli',
	'right-autoreview'             => 'Menandai revisi sebagai terperiksa secara otomatis',
	'right-movestable'             => 'Pindahkan halaman-halaman stabil',
	'right-review'                 => 'Menandai sebagai revisi terperiksa',
	'right-stablesettings'         => 'Mengatur bagaimana versi stabil dipilih dan ditampilkan',
	'right-validate'               => 'Menandai sebagai revisi layak',
	'rights-editor-autosum'        => 'promosi otomatis',
	'rights-editor-revoke'         => 'status Editor dicabut dari [[$1]]',
	'specialpages-group-quality'   => 'Pemeriksaan kualitas',
	'stable-logentry'              => 'pengaturan pemilihan versi stabil untuk [[$1]]',
	'stable-logentry2'             => 'reset pemilihan versi stabil untuk [[$1]]',
	'stable-logpage'               => 'Log versi stabil',
	'stable-logpagetext'           => 'Ini adalah log perubahan untuk konfigurasi [[{{MediaWiki:Validationpage}}|versi stabil]] halaman isi.
Daftar halaman yang ditandai stabil dapat ditemukan di [[Special:StablePages|daftar halaman stabil]].',
	'tooltip-ca-current'           => 'Lihat draf terkini halaman ini',
	'tooltip-ca-default'           => 'Pengaturan pemeriksaan kualitas',
	'tooltip-ca-stable'            => 'Lihat versi stabil halaman ini',
	'validationpage'               => '{{ns:help}}:Validasi artikel',
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 */
$messages['is'] = array(
	'revreview-accuracy' => 'Nákvæmni',
	'revreview-auto'     => '(sjálfkrafa)',
	'revreview-current'  => 'Uppkast',
	'revreview-edit'     => 'Breyta uppkasti',
);

/** Italian (Italiano)
 * @author Gianfranco
 * @author Siebrand
 */
$messages['it'] = array(
	'group-reviewer'        => 'Revisori',
	'group-reviewer-member' => 'Revisore',
	'grouppage-reviewer'    => '{{ns:project}}:Revisore',
	'reviewer'              => 'Revisore',
	'revreview-current'     => 'Bozza',
	'revreview-edit'        => 'Modifica la bozza',
	'revreview-noflagged'   => "Non ci sono revisioni convalidate di questa voce, perciò potrebbe '''non''' essere stata [[{{MediaWiki:Validationpage}}|controllata]] la sua qualità.",
	'revreview-oldrating'   => 'È stata giudicata:',
	'revreview-source'      => 'Codice sorgente della bozza',
	'revreview-stable'      => 'Stabile',
	'tooltip-ca-current'    => 'Vedi la bozza attuale di questa pagina',
	'tooltip-ca-stable'     => 'Vedi la versione stabile di questa voce',
);

/** Japanese (日本語)
 * @author JtFuruhata
 * @author Siebrand
 */
$messages['ja'] = array(
	'editor'                       => '編集者',
	'flaggedrevs'                  => '判定による版表示',
	'flaggedrevs-desc'             => '編集者および査読者に、特定版の査読や表示ページとしての採択ができる機能を提供する',
	'group-editor'                 => '編集者',
	'group-editor-member'          => '編集者',
	'group-reviewer'               => '査読者',
	'group-reviewer-member'        => '査読者',
	'grouppage-editor'             => '{{ns:project}}:編集者',
	'grouppage-reviewer'           => '{{ns:project}}:査読者',
	'hist-quality'                 => '内容充実版',
	'hist-stable'                  => '採用版',
	'review-diff2stable'           => '採択版から最新版までの変更履歴を見る',
	'review-logentry-app'          => '[[$1]] を査読承認',
	'review-logentry-dis'          => '[[$1]] を査読の末、棄却',
	'review-logentry-id'           => '特定版ID $1',
	'review-logpage'               => '査読ログ',
	'review-logpagetext'           => 'ページの版に対する[[{{MediaWiki:Validationpage}}|承認]]状況の変更ログです。',
	'reviewer'                     => '査読者',
	'revisionreview'               => '特定版の査読',
	'revreview-accuracy'           => '内容の正確さ',
	'revreview-accuracy-0'         => '論外',
	'revreview-accuracy-1'         => '許容範囲',
	'revreview-accuracy-2'         => '的確',
	'revreview-accuracy-3'         => '検証性充分',
	'revreview-accuracy-4'         => '秀逸',
	'revreview-auto'               => '（自動査読）',
	'revreview-auto-w'             => "あなたは査読版を編集していますが、全ての変更は'''自動的に査読'''されます。保存する前のページプレビューをお勧めします。",
	'revreview-auto-w-old'         => "あなたは過去の版を編集していますが、全ての変更は'''自動的に査読'''されます。保存する前のページプレビューをお勧めします。",
	'revreview-basic'              => 'これは最新の[[{{MediaWiki:Validationpage}}|採用]]版で、<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。 [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]を[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 修正できます]（[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3{{PLURAL:$3|変更分|変更分}}]が査読{{PLURAL:$3|待ち|待ち}}です）。',
	'revreview-basic-same'         => 'これは最新の[[{{MediaWiki:Validationpage}}|採用]]版で、<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。更なる[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 内容充実]にご協力ください。',
	'revreview-changed'            => "'''この [[:$1|$1]] の特定版に対する査読は処理されませんでした'''

処理中に、この版で使用されているテンプレートまたは画像に対する処理要求が行われた可能性があります。これは、動的なテンプレートによる異なる画像へのリンク、または変数に依存するテンプレートが利用されていることにより、査読開始時点からページの内容が変更された場合に起こり得ます。ページをリロードしてから再度査読を行うと、この問題を解決できます。",
	'revreview-current'            => '草稿',
	'revreview-depth'              => '考察の深さ',
	'revreview-depth-0'            => '論外',
	'revreview-depth-1'            => '平凡',
	'revreview-depth-2'            => '適度',
	'revreview-depth-3'            => '熟慮',
	'revreview-depth-4'            => '秀逸',
	'revreview-edit'               => '草稿を編集する',
	'revreview-flag'               => 'この特定版の査読',
	'revreview-legend'             => '特定版に対する判定',
	'revreview-log'                => '査読内容の要約:',
	'revreview-main'               => '査読のためには対象ページから特定版を選択する必要があります。

[[{{ns:special}}:Unreviewedpages|査読待ちのページ]]をご覧ください。',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最新の採用版] （[{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 全リスト]）は<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3{{PLURAL:$3|変更分|変更分}}]の査読が{{PLURAL:$3|必要|必要}}です。',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最新の内容充実版] （[{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 全リスト]）は<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3{{PLURAL:$3|変更分|変更分}}]の査読が{{PLURAL:$3|必要|必要}}です。',
	'revreview-noflagged'          => "このページには査読済の版がない、すなわち[[{{MediaWiki:Validationpage}}|チェック]]'''されていない'''ため内容は保証できません。",
	'revreview-note'               => '[[{{ns:user}}:$1]] は、この版に以下の[[{{MediaWiki:Validationpage}}|査読意見]]を表明しています:',
	'revreview-notes'              => '査読意見または注意:',
	'revreview-oldrating'          => '査読結果:',
	'revreview-patrol'             => 'パトロール済みにマーク',
	'revreview-patrolled'          => '選択された [[:$1|$1]] の版は、パトロール済みにマークされます。',
	'revreview-quality'            => 'これは最新の[[{{MediaWiki:Validationpage}}|内容充実]]版で、<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。 [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]を[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 修正できます]（[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3{{PLURAL:$3|変更分|変更分}}]が査読{{PLURAL:$3|待ち|待ち}}です）。',
	'revreview-quality-same'       => 'これは最新の[[{{MediaWiki:Validationpage}}|内容充実]]版で、<i>$2</i> に[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認されました]。更なる[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 内容充実]にご協力ください。',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|採用]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|採用]]''' （未査読の変更はありません）",
	'revreview-quick-none'         => "'''最新版'''　（査読済の版はありません）",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|内容充実]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 草稿]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|内容充実]]''' （未査読の変更はありません）",
	'revreview-quick-see-basic'    => "'''草稿''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 採択ページ]] （[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{PLURAL:$2|変更|変更}}] $2回）",
	'revreview-quick-see-quality'  => "'''草稿''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 採択ページ]] （[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{PLURAL:$2|変更|変更}}] $2回）",
	'revreview-selected'           => "'''$1''' の選択された特定版:",
	'revreview-source'             => '草稿元',
	'revreview-stable'             => '査読済',
	'revreview-style'              => '読みやすさ',
	'revreview-style-0'            => '論外',
	'revreview-style-1'            => '受理可能',
	'revreview-style-2'            => '適切',
	'revreview-style-3'            => '簡潔',
	'revreview-style-4'            => '秀逸',
	'revreview-submit'             => '査読完了',
	'revreview-text'               => '採択版は、最新版よりも優先的に、対象ページのデフォルト表示として設定されます。',
	'revreview-toolow'             => 'ある版を査読済とするには、以下に示す全ての判定要素を "論外" より高い評価にする必要があります。査読を棄却する場合、全ての評価を "論外" としてください。',
	'revreview-update'             => "[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認された]査読済版に対する全ての変更箇所''（下記参照）'' を[[{{MediaWiki:Validationpage}}|査読]]してください。

'''いくつかのテンプレートや画像が更新されました:'''",
	'revreview-update-none'        => "[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 承認された]査読済版への全ての変更箇所''（下記参照）''を[[{{MediaWiki:Validationpage}}|査読]]してください。",
	'revreview-visibility'         => 'このページには[[{{MediaWiki:Validationpage}}|査読済の版]]があり、[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} ページの採択]から設定可能です。',
	'rights-editor-autosum'        => '自動権限付与',
	'rights-editor-revoke'         => '[[$1]] の編集者権限取り消し',
	'stable-logentry'              => '[[$1]] を採択',
	'stable-logentry2'             => '[[$1]] の採択を取り消し',
	'stable-logpage'               => 'ページ採択ログ',
	'stable-logpagetext'           => '[[{{MediaWiki:Validationpage}}|採択ページ]]設定の変更ログです。',
	'tooltip-ca-current'           => '現在の草稿ページを見る',
	'tooltip-ca-default'           => '内容保証設定',
	'tooltip-ca-stable'            => 'この査読済ページを見る',
	'validationpage'               => '{{ns:help}}:記事の検証',
);

/** Jutish (Jysk)
 * @author Huslåke
 * @author Ælsån
 * @author Siebrand
 */
$messages['jut'] = array(
	'editor'                => 'Editor',
	'flaggedrevs'           => 'Flagged Reviisje',
	'group-editor'          => 'Editors',
	'group-editor-member'   => 'Editor',
	'group-reviewer'        => 'Reviewers',
	'group-reviewer-member' => 'Reviewer',
	'grouppage-editor'      => '{{ns:project}}:Editor',
	'grouppage-reviewer'    => '{{ns:project}}:Reviewer',
	'hist-quality'          => 'kwalitæ reviisje',
	'hist-stable'           => 'sæn reviisje',
	'reviewer'              => 'Reviewer',
	'revreview-accuracy'    => 'Klopthed',
	'revreview-accuracy-0'  => 'Niveauen',
	'revreview-accuracy-1'  => 'Niveauto',
	'revreview-accuracy-2'  => 'Niveautre',
	'revreview-accuracy-3'  => 'Niveaufor',
	'revreview-accuracy-4'  => 'Niveaufem',
	'revreview-current'     => 'Dråft',
	'revreview-depth'       => 'Diip',
	'revreview-depth-0'     => 'Niveauen',
	'revreview-depth-1'     => 'Niveauto',
	'revreview-depth-2'     => 'Niveautre',
	'revreview-depth-3'     => 'Niveaufire',
	'revreview-depth-4'     => 'Niveaufem',
	'revreview-edit'        => 'Redigær draft',
	'revreview-log'         => 'Bemærkenge:',
	'revreview-oldrating'   => "E'r ræten:",
	'revreview-source'      => 'draft sårs',
	'revreview-stable'      => 'Stabiil',
	'revreview-style'       => 'Læsbårhed',
	'revreview-style-0'     => 'Niveauen',
	'revreview-style-1'     => 'Niveauto',
	'revreview-style-2'     => 'Niveautre',
	'revreview-style-3'     => 'Niveaufor',
	'revreview-style-4'     => 'Niveaufem',
	'rights-editor-autosum' => 'åtåpråmåværn',
	'rights-editor-revoke'  => 'slettet redigærerståt der [[$1]]',
	'tooltip-ca-current'    => "Se'n draft nuværende detter side",
	'tooltip-ca-default'    => 'Kwalitæt assurans endstellenger',
	'tooltip-ca-stable'     => "Se'n stabiil versje detter pæge",
	'validationpage'        => '{{ns:help}}:Artikel vålidåsje',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'flaggedrevs-prefs' => 'Stabilitas',
);

/** Kazakh (Arabic script) (‫قازاقشا (تٴوتە)‬) */
$messages['kk-arab'] = array(
	'editor'                      => 'تۇزەتۋشى',
	'flaggedrevs'                 => 'بەلگىلەنگەن نۇسقالار',
	'group-editor'                => 'تۇزەتۋشىلەر',
	'group-editor-member'         => 'تۇزەتۋشى',
	'group-reviewer'              => 'سىن بەرۋشىلەر',
	'group-reviewer-member'       => 'سىن بەرۋشى',
	'grouppage-editor'            => '{{ns:project}}:تۇزەتۋشى',
	'grouppage-reviewer'          => '{{ns:project}}:سىن بەرۋشى',
	'hist-quality'                => '[ساپالىنعان]',
	'hist-stable'                 => '[شولىنعان]',
	'review-diff2stable'          => 'تىياناقتى مەن اعىمدىق نۇسقالار اراداعى وزگەرىستەر',
	'review-logentry-app'         => '[[$1]] دەگەنگە سىن بەردى',
	'review-logentry-dis'         => '[[$1]] دەگەننىڭ نۇسقاسىن كەمىتتى',
	'review-logentry-id'          => 'نۇسقا ٴنومىرى $1',
	'review-logpage'              => 'ماقالاعا سىن بەرۋ جۋرنالى',
	'review-logpagetext'          => 'بۇل ماعلۇمات بەتتەردەگى نۇسقالاردى [[{{MediaWiki:Validationpage}}|بەكىتۋ]] كۇيى
وزگەرىستەرىنىڭ جۋرنالى.',
	'reviewer'                    => 'سىن بەرۋشى',
	'revisionreview'              => 'نۇسقالارعا سىن بەرۋ',
	'revreview-accuracy'          => 'دالدىگى',
	'revreview-accuracy-0'        => 'بەكىتىلمەگەن',
	'revreview-accuracy-1'        => 'شولىنعان',
	'revreview-accuracy-2'        => 'ٴدالدى',
	'revreview-accuracy-3'        => 'قاينار كەلتىرىلگەن',
	'revreview-accuracy-4'        => 'تاڭدامالى',
	'revreview-auto'              => '(وزدىكتىك)',
	'revreview-auto-w'            => "تىياناقتى نۇسقانى وڭدەۋدەسىز, وزگەرىستەردىڭ ارقايسىسىنا '''وزدىكتىك سىن بەرىلەدى'''.
ساقتاۋدىڭ الدىندا بەتتى قاراپ شىعۋىڭىزعا بولادى.",
	'revreview-auto-w-old'        => "ەسكى نۇسقانى وڭدەۋدەسىز, وزگەرىستەردىڭ ارقايسىسىنا '''وزدىكتىك سىن بەرىلەدى'''.
ساقتاۋدىڭ الدىندا بەتتى قاراپ شىعۋىڭىزعا بولادى.",
	'revreview-basic'             => 'بۇل ەڭ سوڭعى [[{{MediaWiki:Validationpage}}|شولىنعان]] نۇسقا,
<i>$2</i> كەزىندە [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلگەن]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسى]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} وزگەرتىلۋى] مۇمكىن; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|وزگەرىسى|وزگەرىسى}}]
سىن بەرۋدى {{PLURAL:$3|كۇتۋدە|كۇتۋدە}}.',
	'revreview-changed'           => "'''بۇل نۇسقادا سۇرانىم ارەكەتى ورىندالمايدى.'''

ۇلگى نە سۋرەت ەرەكشە نۇسقا كەلتىرىلمەگەندە سۇرانالادى. بۇل ەگەر وسى بەتكە سىن بەرۋدى باستاعندا
وزگەرەتىن اينالمالىعا تاۋەلدى وزگەرمەلى ۇلگى ارقىلى باسقا سۋرەتتى نە ۇلگىنى ەندىرگەن بولسا بولادى.
بەتتى جاڭارتۋ جانە قايتا سىن بەرۋ بۇل ماسەلەنى شەشۋ مۇمكىن.",
	'revreview-current'           => 'جوبا جازبا',
	'revreview-depth'             => 'كامىلدىگى',
	'revreview-depth-0'           => 'بەكىتىلمەگەن',
	'revreview-depth-1'           => 'ىرگەلى',
	'revreview-depth-2'           => 'ورتاشا',
	'revreview-depth-3'           => 'جوعارى',
	'revreview-depth-4'           => 'تاڭدامالى',
	'revreview-edit'              => 'جوبا جازبانى وڭدەۋ',
	'revreview-flag'              => 'بۇل نۇسقاعا (#$1) سىن بەرۋ',
	'revreview-legend'            => 'نۇسقا ماعلۇماتىنا دەڭگەي بەرۋ',
	'revreview-log'               => 'ماندەمەسى:',
	'revreview-main'              => 'سىن بەرۋ ٴۇشىن ماعلۇمات بەتىنىڭ ەرەكشە نۇسقاسىن بولەكتەۋىڭىز كەرەك.

سىن بەرىلمەگەن بەت ٴتىزىمى ٴۇشىن [[{{ns:special}}:Unreviewedpages]] بەتىن قاراڭىز.',
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ەڭ سوڭعى شولىنعان نۇسقاسى]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} بارلىق ٴتىزىمى]) <i>$2</i> كەزىندە [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلدى]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|وزگەرىسىنە|وزگەرىسىنە}}] سىن بەرۋى {{PLURAL:$3|كەرەك|كەرەك}}.',
	'revreview-newest-quality'    => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ەڭ سوڭعى ساپالى نۇسقاسى]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} بارلىعىنىڭ ٴتىزىمى]) <i>$2</i> كەزىندە [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلدى].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|وزگەرىسىنە|وزگەرىسىنە}}] سىن بەرۋى {{PLURAL:$3|كەرەك|كەرەك}}.',
	'revreview-noflagged'         => "بۇل بەتتىڭ سىن بەرىلگەن نۇسقالارى مىندا جوق, سوندىقتان بۇنىڭ ساپاسى
'''[[{{MediaWiki:Validationpage}}|تەكسەرىلمەگەن]]''' بولۋى مۇمكىن.",
	'revreview-note'              => '[[{{ns:user}}:$1]] بۇل نۇسقاعا  [[{{MediaWiki:Validationpage}}|سىن بەرگەندە]] كەلەسى اڭعارتۋلار جاسادى:',
	'revreview-notes'             => 'كورسەتىلەتىن پىكىرلەر مەن اڭعارتپالار:',
	'revreview-oldrating'         => 'بۇل مىنا باعا الدى:',
	'revreview-patrolled'         => '[[:$1|$1]] دەگەننىڭ بولەكتەلىنگەن نۇسقاسى كۇزەتتە دەپ بەلگىلەندى.',
	'revreview-quality'           => 'بۇل ەڭ سوڭعى [[{{MediaWiki:Validationpage}}|ساپالى]] نۇسقا,
<i>$2</i> كەزىندە [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} بەكىتىلگەن]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسى]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} وزگەرتىلۋى] مۇمكىن; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|وزگەرىسى|وزگەرىسى}}]
سىن بەرۋدى {{PLURAL:$3|كۇتۋدە|كۇتۋدە}}.',
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|شولىنعان]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسىن قاراۋ]]",
	'revreview-quick-none'        => "'''اعىمدىق''' (cىن بەرىلگەن نۇسقالار جوق)",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|ساپالى]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} جوبا جازباسىن قاراۋ]]",
	'revreview-quick-see-basic'   => "'''جوبا جازبا''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} تىياناقتى ماقالانى قاراۋ]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|وزگەرىس|وزگەرىس}}])",
	'revreview-quick-see-quality' => "'''جوبا جازبا''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} تىياناقتى ماقالانى قاراۋ]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|وزگەرىس|وزگەرىس}}])",
	'revreview-selected'          => "'''$1:''' دەگەننىڭ بولەكتەلىنگەن نۇسقاسى",
	'revreview-source'            => 'جوبا جازبالى قاينار',
	'revreview-stable'            => 'تىياناقتى',
	'revreview-style'             => 'وقىمدىلىعى',
	'revreview-style-0'           => 'بەكىتىلمەگەن',
	'revreview-style-1'           => 'ٴتىيىمدى',
	'revreview-style-2'           => 'جاقسى',
	'revreview-style-3'           => 'تارتىمدى',
	'revreview-style-4'           => 'تاڭدامالى',
	'revreview-submit'            => 'سىن جىبەرۋ',
	'revreview-text'              => 'تىياناقتى نۇسقالار ەڭ جاڭا نۇسقاسىنان گورى بەت كورىنىسىندەگى ادەپكى ماعلۇمات دەپ تاپسىرىلادى.',
	'revreview-toolow'            => 'نۇسقاعا سىن بەرىلگەن دەپ سانالۋى ٴۇشىن تومەندەگى قاسىيەتتەردىڭ قاي-قايسىسىن «بەكىتىلمەگەن»
دەگەننەن جوعارى دەڭگەي بەرۋىڭىز كەرەك. نۇسقانى كەمىتۋ ٴۇشىن, بارلىق ورىستەردى «بەكىتىلمەگەن» دەپ تاپسىرىلسىن.',
	'revreview-update'            => 'تىياناقتى نۇسقا بەكىتىلگەننەن بەرى جاسالعان وزگەرىستەرگە (تومەندە كورسەتىلگەن) سىن بەرىپ شىعىڭىز.
كەيبىر جاڭارتىلعان ۇلگىلەر/سۋرەتتەر:',
	'revreview-update-none'       => 'تىياناقتى نۇسقا بەكىتىلگەننەن بەرى جاسالعان وزگەرىستەرگە (تومەندە كورسەتىلگەن) سىن بەرىپ شىعىڭىز.',
	'revreview-visibility'        => 'وسى بەتتىڭ [[{{MediaWiki:Validationpage}}|تىياناقتى نۇسقاسى]] بار, بۇل
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} باپتالاۋى] مۇمكىن.',
	'stable-logentry'             => '[[$1]] ٴۇشىن تىياناقتى نۇسقا باپتالىمى رەتتەلدى',
	'stable-logentry2'            => '[[$1]] ٴۇشىن تىياناقتى نۇسقا باپتالىمى قايتا قويىلدى',
	'stable-logpage'              => 'تىياناقتى نۇسقا جۋرنالى',
	'stable-logpagetext'          => 'بۇل ماعلۇمات بەتتەردەگى [[{{MediaWiki:Validationpage}}|تىياناقتى نۇسقا]] باپتالىمى
وزگەرىستەرىنىڭ جۋرنالى.',
	'tooltip-ca-current'          => 'بۇل بەتتىڭ اعىمداعى جوبا جازباسىن قاراۋ',
	'tooltip-ca-default'          => 'ساپا قامسىزداندىرۋدى باپتاۋ',
	'tooltip-ca-stable'           => 'بۇل بەتتىڭ تىياناقتى نۇسقاسىن قاراۋ',
	'validationpage'              => '{{ns:help}}:ماقالا اقتالۋى',
);

/** Kazakh (Cyrillic) (Қазақша (Cyrillic)) */
$messages['kk-cyrl'] = array(
	'editor'                      => 'Түзетуші',
	'flaggedrevs'                 => 'Белгіленген нұсқалар',
	'group-editor'                => 'Түзетушілер',
	'group-editor-member'         => 'түзетуші',
	'group-reviewer'              => 'Сын берушілер',
	'group-reviewer-member'       => 'сын беруші',
	'grouppage-editor'            => '{{ns:project}}:Түзетуші',
	'grouppage-reviewer'          => '{{ns:project}}:Сын беруші',
	'hist-quality'                => '[сапалынған]',
	'hist-stable'                 => '[шолынған]',
	'review-diff2stable'          => 'Тиянақты мен ағымдық нұсқалар арадағы өзгерістер',
	'review-logentry-app'         => '[[$1]] дегенге сын берді',
	'review-logentry-dis'         => '[[$1]] дегеннің нұсқасын кемітті',
	'review-logentry-id'          => 'нұсқа нөмірі $1',
	'review-logpage'              => 'Мақалаға сын беру журналы',
	'review-logpagetext'          => 'Бұл мағлұмат беттердегі нұсқаларды [[{{MediaWiki:Validationpage}}|бекіту]] күйі
өзгерістерінің журналы.',
	'reviewer'                    => 'Сын беруші',
	'revisionreview'              => 'Нұсқаларға сын беру',
	'revreview-accuracy'          => 'Дәлдігі',
	'revreview-accuracy-0'        => 'бекітілмеген',
	'revreview-accuracy-1'        => 'шолынған',
	'revreview-accuracy-2'        => 'дәлді',
	'revreview-accuracy-3'        => 'қайнар келтірілген',
	'revreview-accuracy-4'        => 'таңдамалы',
	'revreview-auto'              => '(өздіктік)',
	'revreview-auto-w'            => "Тиянақты нұсқаны өңдеудесіз, өзгерістердің әрқайсысына '''өздіктік сын беріледі'''.
Сақтаудың алдында бетті қарап шығуыңызға болады.",
	'revreview-auto-w-old'        => "Ескі нұсқаны өңдеудесіз, өзгерістердің әрқайсысына '''өздіктік сын беріледі'''.
Сақтаудың алдында бетті қарап шығуыңызға болады.",
	'revreview-basic'             => 'Бұл ең соңғы [[{{MediaWiki:Validationpage}}|шолынған]] нұсқа,
<i>$2</i> кезінде [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бекітілген]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Жоба жазбасы]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} өзгертілуі] мүмкін; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|өзгерісі|өзгерісі}}]
сын беруді {{PLURAL:$3|күтуде|күтуде}}.',
	'revreview-changed'           => "'''Бұл нұсқада сұраным әрекеті орындалмайды.'''

Үлгі не сурет ерекше нұсқа келтірілмегенде сұраналады. Бұл егер осы бетке сын беруді бастағнда
өзгеретін айналмалыға тәуелді өзгермелі үлгі арқылы басқа суретті не үлгіні ендірген болса болады.
Бетті жаңарту және қайта сын беру бұл мәселені шешу мүмкін.",
	'revreview-current'           => 'Жоба жазба',
	'revreview-depth'             => 'Кәмілдігі',
	'revreview-depth-0'           => 'бекітілмеген',
	'revreview-depth-1'           => 'іргелі',
	'revreview-depth-2'           => 'орташа',
	'revreview-depth-3'           => 'жоғары',
	'revreview-depth-4'           => 'таңдамалы',
	'revreview-edit'              => 'Жоба жазбаны өңдеу',
	'revreview-flag'              => 'Бұл нұсқаға сын беру',
	'revreview-legend'            => 'Нұсқа мағлұматына деңгей беру',
	'revreview-log'               => 'Мәндемесі:',
	'revreview-main'              => 'Сын беру үшін мағлұмат бетінің ерекше нұсқасын бөлектеуіңіз керек.

Сын берілмеген бет тізімі үшін [[{{ns:special}}:Unreviewedpages]] бетін қараңыз.',
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ең соңғы шолынған нұсқасы]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} барлық тізімі]) <i>$2</i> кезінде [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бекітілді]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|өзгерісіне|өзгерісіне}}] сын беруі {{PLURAL:$3|керек|керек}}.',
	'revreview-newest-quality'    => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Ең соңғы сапалы нұсқасы]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} барлығының тізімі]) <i>$2</i> кезінде [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бекітілді].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|өзгерісіне|өзгерісіне}}] сын беруі {{PLURAL:$3|керек|керек}}.',
	'revreview-noflagged'         => "Бұл беттің сын берілген нұсқалары мында жоқ, сондықтан бұның сапасы
'''[[{{MediaWiki:Validationpage}}|тексерілмеген]]''' болуы мүмкін.",
	'revreview-note'              => '[[{{ns:user}}:$1]] бұл нұсқаға  [[{{MediaWiki:Validationpage}}|сын бергенде]] келесі аңғартулар жасады:',
	'revreview-notes'             => 'Көрсетілетін пікірлер мен аңғартпалар:',
	'revreview-oldrating'         => 'Бұл мына баға алды:',
	'revreview-patrolled'         => '[[:$1|$1]] дегеннің бөлектелінген нұсқасы күзетте деп белгіленді.',
	'revreview-quality'           => 'Бұл ең соңғы [[{{MediaWiki:Validationpage}}|сапалы]] нұсқа,
<i>$2</i> кезінде [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бекітілген]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Жоба жазбасы]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} өзгертілуі] мүмкін; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|өзгерісі|өзгерісі}}]
сын беруді {{PLURAL:$3|күтуде|күтуде}}.',
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|Шолынған]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} жоба жазбасын қарау]]",
	'revreview-quick-none'        => "'''Ағымдық''' (cын берілген нұсқалар жоқ)",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|Сапалы]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} жоба жазбасын қарау]]",
	'revreview-quick-see-basic'   => "'''Жоба жазба''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} тиянақты мақаланы қарау]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|өзгеріс|өзгеріс}}])",
	'revreview-quick-see-quality' => "'''Жоба жазба''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} тиянақты мақаланы қарау]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|өзгеріс|өзгеріс}}])",
	'revreview-selected'          => "'''$1:''' дегеннің бөлектелінген нұсқасы",
	'revreview-source'            => 'жоба жазбалы қайнар',
	'revreview-stable'            => 'Тиянақты',
	'revreview-style'             => 'Оқымдылығы',
	'revreview-style-0'           => 'бекітілмеген',
	'revreview-style-1'           => 'тиімді',
	'revreview-style-2'           => 'жақсы',
	'revreview-style-3'           => 'тартымды',
	'revreview-style-4'           => 'таңдамалы',
	'revreview-submit'            => 'Сын жіберу',
	'revreview-text'              => 'Тиянақты нұсқалар ең жаңа нұсқасынан гөрі бет көрінісіндегі әдепкі мағлұмат деп тапсырылады.',
	'revreview-toolow'            => 'Нұсқаға сын берілген деп саналуы үшін төмендегі қасиеттердің қай-қайсысын «бекітілмеген»
дегеннен жоғары деңгей беруіңіз керек. Нұсқаны кеміту үшін, барлық өрістерді «бекітілмеген» деп тапсырылсын.',
	'revreview-update'            => 'Тиянақты нұсқа бекітілгеннен бері жасалған өзгерістерге (төменде көрсетілген) сын беріп шығыңыз.
Кейбір жаңартылған үлгілер/суреттер:',
	'revreview-update-none'       => 'Тиянақты нұсқа бекітілгеннен бері жасалған өзгерістерге (төменде көрсетілген) сын беріп шығыңыз.',
	'revreview-visibility'        => 'Осы беттің [[{{MediaWiki:Validationpage}}|тиянақты нұсқасы]] бар, бұл
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} бапталауы] мүмкін.',
	'stable-logentry'             => '[[$1]] үшін тиянақты нұсқа бапталымы реттелді',
	'stable-logentry2'            => '[[$1]] үшін тиянақты нұсқа бапталымы қайта қойылды',
	'stable-logpage'              => 'Тиянақты нұсқа журналы',
	'stable-logpagetext'          => 'Бұл мағлұмат беттердегі [[{{MediaWiki:Validationpage}}|тиянақты нұсқа]] бапталымы
өзгерістерінің журналы.',
	'tooltip-ca-current'          => 'Бұл беттің ағымдағы жоба жазбасын қарау',
	'tooltip-ca-default'          => 'Сапа қамсыздандыруды баптау',
	'tooltip-ca-stable'           => 'Бұл беттің тиянақты нұсқасын қарау',
	'validationpage'              => '{{ns:help}}:Мақала ақталуы',
);

/** Kazakh (Latin) (Қазақша (Latin)) */
$messages['kk-latn'] = array(
	'editor'                      => 'Tüzetwşi',
	'flaggedrevs'                 => 'Belgilengen nusqalar',
	'group-editor'                => 'Tüzetwşiler',
	'group-editor-member'         => 'tüzetwşi',
	'group-reviewer'              => 'Sın berwşiler',
	'group-reviewer-member'       => 'sın berwşi',
	'grouppage-editor'            => '{{ns:project}}:Tüzetwşi',
	'grouppage-reviewer'          => '{{ns:project}}:Sın berwşi',
	'hist-quality'                => '[sapalınğan]',
	'hist-stable'                 => '[şolınğan]',
	'review-diff2stable'          => 'Tïyanaqtı men ağımdıq nusqalar aradağı özgerister',
	'review-logentry-app'         => '[[$1]] degenge sın berdi',
	'review-logentry-dis'         => '[[$1]] degenniñ nusqasın kemitti',
	'review-logentry-id'          => 'nusqa nömiri $1',
	'review-logpage'              => 'Maqalağa sın berw jwrnalı',
	'review-logpagetext'          => 'Bul mağlumat betterdegi nusqalardı [[{{MediaWiki:Validationpage}}|bekitw]] küýi
özgeristeriniñ jwrnalı.',
	'reviewer'                    => 'Sın berwşi',
	'revisionreview'              => 'Nusqalarğa sın berw',
	'revreview-accuracy'          => 'Däldigi',
	'revreview-accuracy-0'        => 'bekitilmegen',
	'revreview-accuracy-1'        => 'şolınğan',
	'revreview-accuracy-2'        => 'däldi',
	'revreview-accuracy-3'        => 'qaýnar keltirilgen',
	'revreview-accuracy-4'        => 'tañdamalı',
	'revreview-auto'              => '(özdiktik)',
	'revreview-auto-w'            => "Tïyanaqtı nusqanı öñdewdesiz, özgeristerdiñ ärqaýsısına '''özdiktik sın beriledi'''.
Saqtawdıñ aldında betti qarap şığwıñızğa boladı.",
	'revreview-auto-w-old'        => "Eski nusqanı öñdewdesiz, özgeristerdiñ ärqaýsısına '''özdiktik sın beriledi'''.
Saqtawdıñ aldında betti qarap şığwıñızğa boladı.",
	'revreview-basic'             => 'Bul eñ soñğı [[{{MediaWiki:Validationpage}}|şolınğan]] nusqa,
<i>$2</i> kezinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bekitilgen]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Joba jazbası]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} özgertilwi] mümkin; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|özgerisi|özgerisi}}]
sın berwdi {{PLURAL:$3|kütwde|kütwde}}.',
	'revreview-changed'           => "'''Bul nusqada suranım äreketi orındalmaýdı.'''

Ülgi ne swret erekşe nusqa keltirilmegende suranaladı. Bul eger osı betke sın berwdi bastağnda
özgeretin aýnalmalığa täweldi özgermeli ülgi arqılı basqa swretti ne ülgini endirgen bolsa boladı.
Betti jañartw jäne qaýta sın berw bul mäseleni şeşw mümkin.",
	'revreview-current'           => 'Joba jazba',
	'revreview-depth'             => 'Kämildigi',
	'revreview-depth-0'           => 'bekitilmegen',
	'revreview-depth-1'           => 'irgeli',
	'revreview-depth-2'           => 'ortaşa',
	'revreview-depth-3'           => 'joğarı',
	'revreview-depth-4'           => 'tañdamalı',
	'revreview-edit'              => 'Joba jazbanı öñdew',
	'revreview-flag'              => 'Bul nusqağa sın berw',
	'revreview-legend'            => 'Nusqa mağlumatına deñgeý berw',
	'revreview-log'               => 'Mändemesi:',
	'revreview-main'              => 'Sın berw üşin mağlumat betiniñ erekşe nusqasın bölektewiñiz kerek.

Sın berilmegen bet tizimi üşin [[{{ns:special}}:Unreviewedpages]] betin qarañız.',
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Eñ soñğı şolınğan nusqası]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} barlıq tizimi]) <i>$2</i> kezinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bekitildi]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|özgerisine|özgerisine}}] sın berwi {{PLURAL:$3|kerek|kerek}}.',
	'revreview-newest-quality'    => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Eñ soñğı sapalı nusqası]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} barlığınıñ tizimi]) <i>$2</i> kezinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bekitildi].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|özgerisine|özgerisine}}] sın berwi {{PLURAL:$3|kerek|kerek}}.',
	'revreview-noflagged'         => "Bul bettiñ sın berilgen nusqaları mında joq, sondıqtan bunıñ sapası
'''[[{{MediaWiki:Validationpage}}|tekserilmegen]]''' bolwı mümkin.",
	'revreview-note'              => '[[{{ns:user}}:$1]] bul nusqağa  [[{{MediaWiki:Validationpage}}|sın bergende]] kelesi añğartwlar jasadı:',
	'revreview-notes'             => 'Körsetiletin pikirler men añğartpalar:',
	'revreview-oldrating'         => 'Bul mına bağa aldı:',
	'revreview-patrolled'         => '[[:$1|$1]] degenniñ bölektelingen nusqası küzette dep belgilendi.',
	'revreview-quality'           => 'Bul eñ soñğı [[{{MediaWiki:Validationpage}}|sapalı]] nusqa,
<i>$2</i> kezinde [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} bekitilgen]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Joba jazbası]
[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} özgertilwi] mümkin; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|özgerisi|özgerisi}}]
sın berwdi {{PLURAL:$3|kütwde|kütwde}}.',
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|Şolınğan]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} joba jazbasın qaraw]]",
	'revreview-quick-none'        => "'''Ağımdıq''' (cın berilgen nusqalar joq)",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|Sapalı]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} joba jazbasın qaraw]]",
	'revreview-quick-see-basic'   => "'''Joba jazba''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} tïyanaqtı maqalanı qaraw]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|özgeris|özgeris}}])",
	'revreview-quick-see-quality' => "'''Joba jazba''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} tïyanaqtı maqalanı qaraw]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|özgeris|özgeris}}])",
	'revreview-selected'          => "'''$1:''' degenniñ bölektelingen nusqası",
	'revreview-source'            => 'joba jazbalı qaýnar',
	'revreview-stable'            => 'Tïyanaqtı',
	'revreview-style'             => 'Oqımdılığı',
	'revreview-style-0'           => 'bekitilmegen',
	'revreview-style-1'           => 'tïimdi',
	'revreview-style-2'           => 'jaqsı',
	'revreview-style-3'           => 'tartımdı',
	'revreview-style-4'           => 'tañdamalı',
	'revreview-submit'            => 'Sın jiberw',
	'revreview-text'              => 'Tïyanaqtı nusqalar eñ jaña nusqasınan göri bet körinisindegi ädepki mağlumat dep tapsırıladı.',
	'revreview-toolow'            => 'Nusqağa sın berilgen dep sanalwı üşin tömendegi qasïetterdiñ qaý-qaýsısın «bekitilmegen»
degennen joğarı deñgeý berwiñiz kerek. Nusqanı kemitw üşin, barlıq öristerdi «bekitilmegen» dep tapsırılsın.',
	'revreview-update'            => 'Tïyanaqtı nusqa bekitilgennen beri jasalğan özgeristerge (tömende körsetilgen) sın berip şığıñız.
Keýbir jañartılğan ülgiler/swretter:',
	'revreview-update-none'       => 'Tïyanaqtı nusqa bekitilgennen beri jasalğan özgeristerge (tömende körsetilgen) sın berip şığıñız.',
	'revreview-visibility'        => 'Osı bettiñ [[{{MediaWiki:Validationpage}}|tïyanaqtı nusqası]] bar, bul
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} baptalawı] mümkin.',
	'stable-logentry'             => '[[$1]] üşin tïyanaqtı nusqa baptalımı retteldi',
	'stable-logentry2'            => '[[$1]] üşin tïyanaqtı nusqa baptalımı qaýta qoýıldı',
	'stable-logpage'              => 'Tïyanaqtı nusqa jwrnalı',
	'stable-logpagetext'          => 'Bul mağlumat betterdegi [[{{MediaWiki:Validationpage}}|tïyanaqtı nusqa]] baptalımı
özgeristeriniñ jwrnalı.',
	'tooltip-ca-current'          => 'Bul bettiñ ağımdağı joba jazbasın qaraw',
	'tooltip-ca-default'          => 'Sapa qamsızdandırwdı baptaw',
	'tooltip-ca-stable'           => 'Bul bettiñ tïyanaqtı nusqasın qaraw',
	'validationpage'              => '{{ns:help}}:Maqala aqtalwı',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 * @author គីមស៊្រុន
 * @author Chhorran
 */
$messages['km'] = array(
	'editor'                 => 'អ្នកកែសំរួល',
	'group-editor'           => 'អ្នកកែសំរួល',
	'group-editor-member'    => 'អ្នកកែសំរួល',
	'group-reviewer'         => 'អ្នកត្រួតពិនិត្យឡើងវិញ',
	'group-reviewer-member'  => 'អ្នកត្រួតពិនិត្យឡើងវិញ',
	'grouppage-editor'       => '{{ns:project}}:អ្នកកែសំរួល',
	'grouppage-reviewer'     => '{{ns:project}}៖អ្នកត្រួតពិនិត្យឡើងវិញ',
	'reviewer'               => 'អ្នកត្រួតពិនិត្យឡើងវិញ',
	'revreview-auto'         => '(ស្វ័យប្រវត្តិ)',
	'revreview-current'      => 'សេចក្តីព្រាង',
	'revreview-draft-title'  => 'អត្ថបទព្រាង',
	'revreview-edit'         => 'កែប្រែសេចក្តីពង្រាង',
	'revreview-log'          => 'យោបល់៖',
	'revreview-source'       => 'ប្រភពសេចក្តីព្រាង',
	'revreview-style-1'      => 'អាចទទួលយកបាន',
	'revreview-style-2'      => 'ល្អ',
	'revreview-toggle-title' => 'បង្ហាញ/លាក់ ពត៌មានលំអិត',
	'tooltip-ca-current'     => 'មើលសេចក្តីព្រាងបច្ចុប្បន្ន​នៃទំព័រនេះ',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'revreview-auto' => 'automattesch',
);

/** Latin (Latina)
 * @author SPQRobin
 */
$messages['la'] = array(
	'editor'                => 'Recensor',
	'group-editor'          => 'Recensores',
	'group-editor-member'   => 'Recensor',
	'group-reviewer'        => 'Revisores',
	'group-reviewer-member' => 'Revisor',
	'grouppage-editor'      => '{{ns:project}}:Recensor',
	'grouppage-reviewer'    => '{{ns:project}}:Revisor',
	'reviewer'              => 'Revisor',
	'revreview-log'         => 'Sententia:',
	'revreview-style-2'     => 'Bonus',
	'rights-editor-revoke'  => 'removit statum recensorem usoris [[$1]]',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'editor'                       => 'Editeur',
	'flaggedrevs-prefs'            => 'Stabilitéit',
	'group-editor'                 => 'Editeuren',
	'group-editor-member'          => 'Editeur',
	'group-reviewer'               => 'Reviseuren',
	'group-reviewer-member'        => 'Reviseur',
	'grouppage-editor'             => '{{ns:project}}:Editeur',
	'grouppage-reviewer'           => '{{ns:project}}:Reviseur',
	'hist-draft'                   => 'Brouillonsversioun',
	'hist-quality'                 => 'Qualitéitsversioun',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validéiert] vum [[User:$3|$3]]',
	'hist-stable'                  => 'iwwerkuckte Versioun',
	'review-diff2stable'           => 'Ännerungen tëschent der stabiler an der aktueller Versioun',
	'review-logentry-app'          => 'nogekuckt [[$1]]',
	'review-logentry-id'           => 'Versiounsnummer $1',
	'review-logpage'               => 'Lëscht vum Nokucken',
	'reviewer'                     => 'Reviseur',
	'revisionreview'               => 'Versiounen nokucken',
	'revreview-accuracy-1'         => 'Iwwerkuckt',
	'revreview-accuracy-3'         => 'Gudd dokumentéiert',
	'revreview-accuracy-4'         => 'Exzellent',
	'revreview-auto'               => '(automatesch)',
	'revreview-current'            => 'Virbereedung',
	'revreview-depth'              => 'Déift',
	'revreview-depth-1'            => 'Einfach',
	'revreview-depth-2'            => 'Moderat',
	'revreview-depth-3'            => 'Héich',
	'revreview-depth-4'            => 'Exzellent',
	'revreview-draft-title'        => 'Brouillon vun engem Artikel',
	'revreview-edit'               => 'Virbereedung änneren',
	'revreview-flag'               => 'Dës Versioun nokucken',
	'revreview-legend'             => 'Contenu vun der Versioun bewerten',
	'revreview-log'                => 'Bemierkung:',
	'revreview-note'               => '[[User:$1]] huet dës Notize gemaach, wéi dës Versioun [[{{MediaWiki:Validationpage}}|nogekuckt gouf]]:',
	'revreview-notes'              => 'Bemierkungen oder Notizen fir unzeweisen:',
	'revreview-quality-title'      => 'Qualitéitsartikel',
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Iwwerkuckten Artikel]]'''",
	'revreview-quick-invalid'      => "'''Ongëlteg Versiounsnummer'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Aktuell Versioun]]''' (net iwwerkuckt)",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Qualitéitsartikel]]'''",
	'revreview-selected'           => "Ausgewielte Versioune vun '''$1''':",
	'revreview-stable'             => 'Stabil Säit',
	'revreview-stable-title'       => 'Iwwerkuckten Artikel',
	'revreview-style'              => 'Liesbarkeet',
	'revreview-style-1'            => 'Akzeptabel',
	'revreview-style-2'            => 'Gudd',
	'revreview-style-3'            => 'Genee',
	'revreview-style-4'            => 'Exzellent',
	'revreview-toggle-title'       => 'Detailer weisen/verstoppen',
	'revreview-update-includes'    => "'''Verschidde Schablounen/Biller goufen aktualiséiert:'''",
	'right-autoreview'             => 'Versiounen automatesch als iwwerkuckt markéieren',
	'right-movestable'             => 'Stabil Säite réckelen',
	'right-review'                 => 'Versiounen als iwwerkuckt markéieren',
	'right-validate'               => 'Versiounen als validéiert markéieren',
	'specialpages-group-quality'   => 'Qualitéitssécherung',
	'stable-logpage'               => 'Lëscht vun de stabile Versiounen',
	'tooltip-ca-current'           => 'Den aktuelle Brouillon vun dëser Säit weisen',
	'tooltip-ca-stable'            => 'Déi stabil Versioun vun dëser Säit gesinn',
	'validationpage'               => '{{ns:help}}:Validatioun vun der Säit',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 * @author Matthias
 * @author Siebrand
 */
$messages['li'] = array(
	'editor'                       => 'Bewèrker',
	'flaggedrevs'                  => 'Aangevinkdje versies',
	'flaggedrevs-desc'             => "Guf redacteurs/controleurs de meugelikheid versies te wardere en stebiel pazjena's aan te mèrke",
	'group-editor'                 => 'Bewèrkers',
	'group-editor-member'          => 'Bewèrker',
	'group-reviewer'               => 'Bekiekers',
	'group-reviewer-member'        => 'Bekieker',
	'grouppage-editor'             => '{{ns:project}}:Bewèrker',
	'grouppage-reviewer'           => '{{ns:project}}:Bekieker',
	'hist-quality'                 => 'kwaliteitsversie',
	'hist-stable'                  => 'bekeke versie',
	'review-diff2stable'           => 'Verschille tusse stabiele en huidige versies bekijke',
	'review-logentry-app'          => 'bekeek [[$1]]',
	'review-logentry-dis'          => 'haet een versie van [[$1]] leger beoordeild',
	'review-logentry-id'           => 'versienummer $1',
	'review-logpage'               => 'Beoordeilingslogbook',
	'review-logpagetext'           => "Dit is een logboek met wijzigingen in de [[{{MediaWiki:Makevalidate-page}}|waarderingsstatus]] van versies van pagina's.",
	'reviewer'                     => 'Bekieker',
	'revisionreview'               => 'Versies beoordeile',
	'revreview-accuracy'           => 'Nejkeurigheid',
	'revreview-accuracy-0'         => 'Neet bekeke',
	'revreview-accuracy-1'         => 'Bekeke',
	'revreview-accuracy-2'         => 'Nejkeurig',
	'revreview-accuracy-3'         => 'Good van brónne veurzeen',
	'revreview-accuracy-4'         => 'Oetgelich',
	'revreview-auto'               => '(automatisch)',
	'revreview-auto-w'             => "'''Opmerking:''' u wijzigt de stabiele versie. Uw bewerkingen worden automatisch gecontroleerd. Controleer de voorvertoning voordat u de pagina opslaat.",
	'revreview-auto-w-old'         => "U bent een oude versie aan het bewerken, elke wijziging wordt '''automatisch beoordeeld'''.
Controleer uw bewerking voordat u deze opslaat.",
	'revreview-basic'              => "Dit is de lets [[{{MediaWiki:Validationpage}}|beoordeilde]] versie, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>. De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige] kin [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerk] waere; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|wach|wachte}} op 'n beoordeiling.",
	'revreview-basic-same'         => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|beoordeelde]] versie, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>. De pagina is te [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerken].',
	'revreview-changed'            => "'''De gevraagde actie kon niet uitgevoerd worden voor deze versie van [[:$1|$1]].'''

Er is een sjabloon of afbeelding opgevraagd zonder dat een specifieke versie is aangegeven. Dit kan voorkomen als een dynamisch sjabloon een andere afbeelding of een ander sjabloon bevat, afhankelijk van een variabele die is gewijzigd sinds u bent begonnen met de beoordeling van deze pagina. Ververs de pagina en start de beoordeling opnieuw om dit probleem op te lossen.",
	'revreview-current'            => 'Hujige versie',
	'revreview-depth'              => 'Deepgank',
	'revreview-depth-0'            => 'Neet bekeke',
	'revreview-depth-1'            => 'Basis',
	'revreview-depth-2'            => 'Middelmaotig',
	'revreview-depth-3'            => 'Hoog',
	'revreview-depth-4'            => 'Oetgelich',
	'revreview-edit'               => 'concep bewerke',
	'revreview-edited'             => "'''Nuuj bewèrkinge waere opgenaome in de [[{{MediaWiki:Validationpage}}|stabiel versie]] es 'n eindredacteur ze gecontroleerd haet. De ''werkversie'' is hieonger te bekieke. Bedank!'''",
	'revreview-flag'               => 'Deze versie beoordeile',
	'revreview-legend'             => 'Versieinhoud wardere',
	'revreview-log'                => 'Opmerking:',
	'revreview-main'               => "U mót 'n specifieke versie van 'n pagina kieze om te kunnen beoordelen.  

Zie  [[Special:Unreviewedpages]] voor een lijst met pagina's waarvoor nog geen beoordeling is gegeven.",
	'revreview-newest-basic'       => "De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lets beoordeilde versie]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alles tone]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd]
op <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|haet|höbbe}} 'n beoordeiling neudig.",
	'revreview-newest-quality'     => "De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} letste kwaliteitsversie]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alles tone]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd]
op <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|haet|höbbe}} 'n beoordeiling neudig.",
	'revreview-noflagged'          => "D'r zeen gein beoordeelde versies van deze pagina, dus dae is wellich '''neet''' [[{{MediaWiki:Validationpage}}|gecontroleerd]] op kwaliteit.",
	'revreview-note'               => '[[User:$1|$1]] heeft de volgende opmerkingen gemaakt bij de [[{{MediaWiki:Validationpage}}|beoordeling]] van deze versie:',
	'revreview-notes'              => 'Weer te geve observaties of notities:',
	'revreview-oldrating'          => 'Woor gewardeerd es:',
	'revreview-patrol'             => 'Deze bewerking as gecontroleerd markere',
	'revreview-patrolled'          => 'De geselecteerde versie van [[:$1|$1]] is gemarkeerd als gecontroleerd.',
	'revreview-quality'            => "Dit is de letste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>. De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige] kin [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerk] waere; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|wach|wachte}} op 'n beoordeiling.",
	'revreview-quality-same'       => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>. De pagina is te [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} bewerken].',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Bekeke]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige versie bekieke]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Beoordeeld]]''' (geen wijzigingen die niet beoordeeld zijn)",
	'revreview-quick-none'         => "'''Hujige versie'''. Gein beoordeilde versies.",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} hujige versie bekieke]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]''' (geen wijzigingen die niet beoordeeld zijn)",
	'revreview-quick-see-basic'    => "'''Hujige versie'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} stabiele versie bekieke]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|wieziging|wieziginge}}])",
	'revreview-quick-see-quality'  => "'''Hujige versie'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} stabiele versie bekieke]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|wieziging|wieziginge}}])",
	'revreview-selected'           => "Geselecteerde versie van '''$1:'''",
	'revreview-source'             => 'Brónteks concep',
	'revreview-stable'             => 'Stebiel versie',
	'revreview-style'              => 'Laesbaarheid',
	'revreview-style-0'            => 'Neet bekeke',
	'revreview-style-1'            => 'Aanvaardbaar',
	'revreview-style-2'            => 'Good',
	'revreview-style-3'            => 'Bónjig',
	'revreview-style-4'            => 'Oetgelich',
	'revreview-submit'             => 'Bekiek opslaon',
	'revreview-text'               => 'Stabiele versies worden standaard getoond in plaats van de nieuwste versie.',
	'revreview-toolow'             => 'U moet tenminste alle onderstaande eigenschappen hoger instellen dan "niet gekeurd" om een versie als  
beoordeeld aan te laten merken. Om de waardering van een versie te verwijderen, stelt u alle velden in op "niet gekeurd".',
	'revreview-update'             => 'Controleer alstublieft alle wijziginge die gemaakt zien seer de stabiele versie waar gecontroleerd. Enkele sjablone/aafbeeldinge werde gewijzigd:',
	'revreview-update-none'        => "[[{{MediaWiki:Validationpage}}|Review]] ale angeringe ''(shown below)'' made since the stable revision was [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} approved].",
	'revreview-visibility'         => 'Dees pazjena haet een [[{{MediaWiki:Validationpage}}|stabiele versie]], die [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} aangepas] kan waere.',
	'rights-editor-autosum'        => 'automatisch gepromoveerd',
	'rights-editor-revoke'         => 'verwijderde redacteurstatus van [[$1]]',
	'stable-logentry'              => 'stabiele versies zijn ingesteld voor [[$1]]',
	'stable-logentry2'             => 'stabiele versies voor [[$1]] opnieuw instelle',
	'stable-logpage'               => 'Logbook stabiele versies',
	'stable-logpagetext'           => 'Dit is een logbook met wijziginge aan de instellinge veur [[{{MediaWiki:Validationpage}}|stabiele versies]] veur de hoofdnaamruimte.',
	'tooltip-ca-current'           => 'hujige wèrkversie van dees pazjena toeane',
	'tooltip-ca-default'           => 'Instellinge kwaliteitsbewaking',
	'tooltip-ca-stable'            => 'Toean de stabiele versie van dees pazjena',
	'validationpage'               => '{{ns:help}}:Pazjenakontraol',
);

/** Lithuanian (Lietuvių)
 * @author Matasg
 */
$messages['lt'] = array(
	'revreview-auto'    => '(automatinis)',
	'revreview-log'     => 'Komentaras:',
	'revreview-style-0' => 'Nepatvirtintas',
	'revreview-style-2' => 'Geras',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 * @author Jacob.jose
 */
$messages['ml'] = array(
	'editor'                       => 'എഡിറ്റര്‍',
	'flaggedrevs-desc'             => 'എഡിറ്റര്‍മാര്‍ക്കും സം‌ശോധകര്‍ക്കും പതിപ്പുകള്‍ ഗുണപരിശോധന നടത്താനും താളുകള്‍ സ്ഥിരപ്പെടുത്താനുമുള്ള അവകാശം കൊടുക്കുന്നു.',
	'flaggedrevs-prefs'            => 'സ്ഥിരത',
	'flaggedrevs-prefs-watch'      => 'ഞാന്‍ സം‌ശോധം ചെയ്യുന്ന താളുകള്‍ എന്റെ ശ്രദ്ധിക്കുന്ന താളുകളുടെ പട്ടികയിലേക്ക് ചേര്‍ക്കുക',
	'group-editor'                 => 'എഡിറ്റര്‍മാര്‍',
	'group-editor-member'          => 'എഡിറ്റര്‍',
	'group-reviewer'               => 'സംശോധകര്‍',
	'group-reviewer-member'        => 'സംശോധകന്‍',
	'grouppage-editor'             => '{{ns:project}}:എഡിറ്റര്‍',
	'grouppage-reviewer'           => '{{ns:project}}:സംശോധകന്‍',
	'hist-draft'                   => 'കരടു പതിപ്പ്',
	'hist-quality'                 => 'ഉന്നത നിലവാരമുള്ള പതിപ്പ്',
	'hist-stable'                  => 'sighted പതിപ്പ്',
	'review-diff2stable'           => 'സ്ഥിരതയുള്ള പതിപ്പും നിലവിലുള്ള പതിപ്പും തമ്മിലുള്ള മാറ്റങ്ങള്‍ കാണുക',
	'review-logentry-app'          => 'സംശോധനം ചെയ്തു [[$1]]',
	'review-logentry-id'           => 'പതിപ്പിന്റെ ഐഡി $1',
	'review-logpage'               => 'സംശോധന പ്രവര്‍ത്തരേഖ',
	'reviewer'                     => 'സംശോധകന്‍',
	'revisionreview'               => 'പതിപ്പുകള്‍ സംശോധനം ചെയ്യുക',
	'revreview-accuracy'           => 'സൂക്ഷമത',
	'revreview-accuracy-0'         => 'സ്ഥിരീകരിച്ചിട്ടില്ല',
	'revreview-accuracy-1'         => 'സൈറ്റഡ്',
	'revreview-accuracy-2'         => 'സൂക്ഷ്മം',
	'revreview-accuracy-3'         => 'നന്നായി അവലംബം ചേര്‍ക്കപ്പെട്ടത്',
	'revreview-accuracy-4'         => 'തിരഞ്ഞെടുക്കപ്പെട്ടത്',
	'revreview-approved'           => 'അംഗീകരിച്ചിരിക്കുന്നു',
	'revreview-auto'               => '(യാന്ത്രികം)',
	'revreview-auto-w'             => "താങ്കള്‍ സ്ഥിരതയുള്ള പതിപ്പാണു തിരുത്തുന്നത്; മാറ്റങ്ങള്‍ '''യാന്ത്രികമായി സം‌ശോധനം ചെയ്യപ്പെടും'''.",
	'revreview-auto-w-old'         => "താങ്കള്‍ സം‌ശോധം ചെയ്ത ഒരു പതിപ്പാണു തിരുത്തുന്നത്; മാറ്റങ്ങള്‍ '''യാന്ത്രികമായി സം‌ശോധനം ചെയ്യപ്പെടും'''.",
	'revreview-basic'              => "ഈ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|sighted]] പതിപ്പ്, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}}  ''$2'' നു അംഗീകരിച്ചതാണ്‌]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിന്റെ] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|മാറ്റം|മാറ്റങ്ങള്‍}}] സം‌ശോധനത്തിനു തയ്യാറാണ്‌.",
	'revreview-basic-i'            => 'ഇതാണു <i>$2</i>ന്റെ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}}അംഗീകരിക്കപ്പെട്ട] ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|സൈറ്റഡ്]] സം‌ശോധനം.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിനു] സം‌ശോധനത്തിനായി കാത്തിരിക്കുന്ന [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} template/image changes] ഉണ്ട്.',
	'revreview-basic-old'          => "ഈ [[{{MediaWiki:Validationpage}}|sighted]] പതിപ്പ് ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്]. പുതിയ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} മാറ്റങ്ങള്‍] വന്നിരിക്കാന്‍ സാദ്ധ്യതയുണ്ട്.",
	'revreview-basic-same'         => 'ഈ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|sighted]] പതിപ്പ് ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാ പതിപ്പുകളും പ്രദര്‍ശിപ്പിക്കുക]), <i>$2</i>നു [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതാണ്] ഈ താള്‍.',
	'revreview-basic-source'       => "ഈ താളിന്റെ [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}}  ഒരു sighted പതിപ്പ്], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചത്] ഈ പതിപ്പിനെ അടിസ്ഥാനമാക്കിയാണ്‌.",
	'revreview-current'            => 'കരട്',
	'revreview-depth'              => 'അഗാധത',
	'revreview-depth-0'            => 'അംഗീകരിച്ചിട്ടില്ലാത്തത്',
	'revreview-depth-1'            => 'അടിസ്ഥാനപരമായത്',
	'revreview-depth-2'            => 'ഒരു വിധം നിലവാരമുള്ളത്',
	'revreview-depth-3'            => 'ഉന്നത നിലവാരമുള്ളത്',
	'revreview-depth-4'            => 'തിരഞ്ഞെടുക്കപ്പെട്ടത്',
	'revreview-draft-title'        => 'കരടു ലേഖനം',
	'revreview-edit'               => 'കരട് തിരുത്തുക',
	'revreview-edited'             => "'''സ്ഥാപിതരായ ഉപയോക്താക്കള്‍ സം‌ശോധനം നിര്‍‌വഹിച്ചതിനു ശേഷം തിരുത്തലുകള്‍ [[{{MediaWiki:Validationpage}}|സ്ഥിരതയുള്ള പതിപ്പിലേക്ക്]] ചേര്‍ക്കപ്പെടും. 

താഴെ ''കരട് പതിപ്പ്‍'' പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്നു.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|മാറ്റം|മാറ്റങ്ങള്‍}}] സം‌ശോധനത്തിനായി തയ്യാറായിരിക്കുന്നു.",
	'revreview-flag'               => 'ഈ പതിപ്പ് സംശോധനം ചെയ്യുക',
	'revreview-invalid'            => "'''അസാധുവായ ലക്ഷ്യം:''' തന്ന IDക്കു ചേരുന്ന [[{{MediaWiki:Validationpage}}|സംശോധനം ചെയ്ത പതിപ്പുകള്‍]] ഒന്നും തന്നെയില്ല.",
	'revreview-legend'             => 'പതിപ്പിന്റെ ഉള്ളടക്കം വിലയിരുത്തുക',
	'revreview-log'                => 'അഭിപ്രായം:',
	'revreview-newest-basic'       => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഏറ്റവും പുതിയ sighted പതിപ്പ്] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക])[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2''നു അംഗീകരിച്ചതാണ്‌].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|മാറ്റത്തിനു|മാറ്റങ്ങള്‍ക്ക്}}] {{PLURAL:$3|സംശോധനം വേണം|സംശോധനം വേണം}}.",
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഏറ്റവും അവസാനത്തെ സൈറ്റഡ് പതിപ്പ്] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]) <i>$2</i> നാണ്‌ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചത്].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Template/image changes]-നു സം‌ശോധനം ആവശ്യമാണ്‌.',
	'revreview-newest-quality'     => "[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഈ ഉന്നത നിലവാരമുള്ള ഏറ്റവും പുതിയ പതിപ്പ്] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്‌] .
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|മാറ്റത്തിനു|മാറ്റങ്ങള്‍ക്ക്}}] {{PLURAL:$3|സംശോധനം വേണം|സംശോധനം വേണം}}.",
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ഏറ്റവും അവസാനത്തെ ഗുണമേന്മയുള്ള സംശോധന] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]) <i>$2</i> നാണ്‌ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചത്].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Template/image changes]-നു സം‌ശോധനം ആവശ്യമാണ്‌.',
	'revreview-noflagged'          => 'ഈ താളിനു സം‌ശോധനം ചെയ്ത പതിപ്പുകള്‍ ഒന്നും തന്നെയില്ല. അതിനാല്‍ ഈ താളിന്റെ [[{{MediaWiki:Validationpage}}|ഗുണനിലവാര പരിശോധന‍]] നടന്നു കാണില്ല.',
	'revreview-note'               => '[[User:$1]] എന്ന ഉപയോക്താവ് ഈ പതിപ്പ് [[{{MediaWiki:Validationpage}}|സംശോധനം ചെയ്യുമ്പോള്‍]] താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന കുറിപ്പ് ചേര്‍ത്തിരുന്നു:',
	'revreview-notes'              => 'പ്രദര്‍ശിപ്പിക്കാനുള്ള വിലയിരുത്തലുകള്‍/കുറിപ്പുകള്‍:',
	'revreview-oldrating'          => 'മൂല്യനിര്‍ണ്ണയ ഫലം:',
	'revreview-patrol'             => 'ഈ മാറ്റം റോന്തു ചുറ്റിയതായി രേഖപ്പെടുത്തി',
	'revreview-patrolled'          => '[[:$1|$1]]ന്റെ തിരഞ്ഞെടുത്ത പതിപ്പില്‍ റോന്തു ചുറ്റിയതായി രേഖപ്പെടുത്തി.',
	'revreview-quality'            => "ഈ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള]] പതിപ്പ്, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്‌].
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിന്റെ] [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|മാറ്റം|മാറ്റങ്ങള്‍}}] സം‌ശോധനത്തിനു തയ്യാറാണ്‌.",
	'revreview-quality-i'          => 'ഇതാണു <i>$2</i>ന്റെ [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിക്കപ്പെട്ട] ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|ഗുണമേന്മയുള്ള]] പതിപ്പ്.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് ലേഖനത്തിനു] സം‌ശോധനത്തിനായി കാത്തിരിക്കുന്ന  [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} template/image changes] ഉണ്ട്.',
	'revreview-quality-old'        => "ഈ [[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള]]  പതിപ്പ് ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാം പ്രദര്‍ശിപ്പിക്കുക]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചതാണ്]. പുതിയ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} മാറ്റങ്ങള്‍] വന്നിരിക്കാന്‍ സാദ്ധ്യതയുണ്ട്.",
	'revreview-quality-same'       => 'ഇതാണ്‌ ഏറ്റവും പുതിയ [[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള]] പതിപ്പ് ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} എല്ലാ പതിപ്പുകളും പ്രദര്‍ശിപ്പിക്കുക]), <i>$2</i>നു  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതാണ്].',
	'revreview-quality-source'     => "ഈ താളിന്റെ [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} ഉന്നത നിലവാരമുള്ള ഒരു പതിപ്പ്], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ''$2'' നു അംഗീകരിച്ചത്], ഈ പതിപ്പിനെ അടിസ്ഥാനമാക്കിയാണ്‌.",
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|കണ്ടെത്തിയ ലേഖനം]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് കാണുക]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|കണ്ടെത്തിയ ലേഖനം]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് കാണുക]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Sighted ലേഖനം]]'''",
	'revreview-quick-invalid'      => "'''അസാധുവായ പതിപ്പ് ഐഡി'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|നിലവിലുള്ള പതിപ്പ്]]''' (സം‌ശോധനം ചെയ്തിട്ടില്ല)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|നിലവാരമുള്ള ലേഖനം]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് കാണുക]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|ഉന്നത നിലവാരമുള്ള ലേഖനം]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} കരട് കാണുക]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|ഉന്നത ഗുണനിലവാരമുള്ള ലേഖനം]]'''",
	'revreview-quick-see-basic'    => "'''കരട്''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ലേഖനം കാണുക]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} താരതമ്യം ചെയ്യുക])",
	'revreview-quick-see-quality'  => "'''കരട്''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ലേഖനം കാണുക]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} താരതമ്യം ചെയ്യുക])",
	'revreview-selected'           => "'''$1'''ന്റെ തിരഞ്ഞെടുത്ത പതിപ്പ്:",
	'revreview-source'             => 'കരടിന്റെ മൂലരൂപം കാണുക',
	'revreview-stable'             => 'സ്ഥിരതയുള്ള താള്‍',
	'revreview-style'              => 'വായനാസുഖം',
	'revreview-style-0'            => 'അംഗീകരിച്ചിട്ടില്ലാത്തത്',
	'revreview-style-1'            => 'സ്വീകാര്യമായത്',
	'revreview-style-2'            => 'കൊള്ളാവുന്നത്',
	'revreview-style-3'            => 'സംക്ഷിപ്തമായത്',
	'revreview-style-4'            => 'തിരഞ്ഞെടുക്കപ്പെട്ടത്',
	'revreview-submit'             => 'സംശോധനം ചെയ്തത് സമര്‍പ്പിക്കുക',
	'revreview-toggle-title'       => 'വിവരങ്ങള്‍ കാണിക്കുക/മറയ്ക്കുക',
	'revreview-update'             => "സ്ഥിരതയുള്ള പതിപ്പ് [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതിനു ശേഷം] വരുത്തിയ മാറ്റങ്ങള്‍ ''(താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്നു)''. ദയവായി  [[{{MediaWiki:Validationpage}}|സംശോധനം]] ചെയ്യുക.
 
'''ചില ഫലകങ്ങള്‍/ചിത്രങ്ങള്‍ പുതുക്കിയിട്ടുണ്ട്:'''",
	'revreview-update-includes'    => "'''ചില ഫലകങ്ങള്‍/ചിത്രങ്ങള്‍ പുതുക്കി:'''",
	'revreview-update-none'        => "സ്ഥിരതയുള്ള പതിപ്പ് [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} അംഗീകരിച്ചതിനു ശേഷം]
വരുത്തിയ മാറ്റങ്ങള്‍ ''(താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്നു)'' [[{{MediaWiki:Validationpage}}|ദയവായി സംശോധനം ചെയ്യുക]].",
	'right-movestable'             => 'സ്ഥിരതയുള്ള താളുകള്‍ മാറ്റുക',
	'rights-editor-autosum'        => 'യാന്ത്രികമായി സ്ഥാനക്കയറ്റം നല്‍കിയിരിക്കുന്നു',
	'rights-editor-revoke'         => '[[$1]] എന്ന ഉപയോക്താവിന്റെ എഡിറ്റര്‍ അവകാശം പിന്‍‌വലിച്ചിരിക്കുന്നു',
	'specialpages-group-quality'   => 'ഗുണമേന്മാ ഉറപ്പ്',
	'stable-logpage'               => 'സ്ഥിരതയുടെ പ്രവര്‍ത്തനരേഖ',
	'tooltip-ca-current'           => 'ഈ താളിന്റെ നിലവിലുള്ള കരട് കാണുക',
	'tooltip-ca-default'           => 'ഗുണനിലവാര ഉറപ്പാക്കല്‍ ക്രമീകരണങ്ങള്‍',
	'tooltip-ca-stable'            => 'ഈ താളിന്റെ സ്ഥിരതയുള്ള പതിപ്പ് കാണുക',
	'validationpage'               => '{{ns:help}}:ലേഖനസാധുത',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 * @author Siebrand
 */
$messages['mr'] = array(
	'editor'                       => 'संपादक',
	'flaggedrevs'                  => 'चिन्हांकित आवृत्ती',
	'flaggedrevs-backlog'          => "सध्या [[Special:OldReviewedPages|जुन्या तपासलेल्या पानांमध्ये]] काही कार्ये करायची बाकी राहिलेली आहेत. '''तुम्ही तिथे लक्ष देणे गरजेचे आहे!'''",
	'flaggedrevs-desc'             => 'संपादक तसेच तपासनीसांना पानाच्या आवृत्त्या प्रमाणित करण्याची तसेच पाने स्थिर करण्याची परवानगी देते.',
	'flaggedrevs-pref-UI-0'        => 'इंटरफेस मध्ये वाढीव स्थिर आवृत्ती वापरा',
	'flaggedrevs-pref-UI-1'        => 'इंटरफेस मध्ये साधी स्थिर आवृत्ती वापरा',
	'flaggedrevs-prefs'            => 'स्थिरता',
	'flaggedrevs-prefs-stable'     => 'कायम स्थिर आवृत्ती अविचलपणे दर्शवा (जर उपलब्ध असेल तर)',
	'flaggedrevs-prefs-watch'      => 'मी तपासलेली पाने माझ्या पहार्‍याच्या सूचीत टाका',
	'group-editor'                 => 'संपादक',
	'group-editor-member'          => 'संपादक',
	'group-reviewer'               => 'तपासनीस',
	'group-reviewer-member'        => 'तपासनीस',
	'grouppage-editor'             => '{{ns:project}}:संपादक',
	'grouppage-reviewer'           => '{{ns:project}}:तपासनीस',
	'hist-draft'                   => 'कच्ची आवृत्ती',
	'hist-quality'                 => 'गुणवत्तापूर्ण आवृत्ती',
	'hist-quality-user'            => '[[User:$3|$3]] ने [{{fullurl:$1|stableid=$2}} तपासलेली]',
	'hist-stable'                  => 'निवडलेली आवृत्ती',
	'hist-stable-user'             => '[[User:$3|$3]] ने [{{fullurl:$1|stableid=$2}} निवडलेली]',
	'review-diff2stable'           => 'स्थिर व सध्याच्या आवृत्तीमधील फरक पहा',
	'review-logentry-app'          => '[[$1]] तपासले',
	'review-logentry-dis'          => '[[$1]] च्या एका आवृत्तीचे गुणांकन कमी केले',
	'review-logentry-id'           => 'आवर्तन क्र. $1',
	'review-logentry-diff'         => 'स्थिर आवृत्तीशी फरक',
	'review-logpage'               => 'तपासणी सूची',
	'review-logpagetext'           => 'ही कंटेंट पानांच्या आवृत्त्यांमधील बदलांच्या [[{{MediaWiki:Validationpage}}|प्रमाणिकरणाची]] सूची आहे.
प्रमाणित पानांच्या यादी साठी [[Special:ReviewedPages|तपासलेल्या पानांची यादी]] पहा.',
	'reviewer'                     => 'समीक्षक',
	'revisionreview'               => 'आवृत्त्या तपासा',
	'revreview-accuracy'           => 'अचूकता',
	'revreview-accuracy-0'         => 'अप्रमाणित',
	'revreview-accuracy-1'         => 'निवडली',
	'revreview-accuracy-2'         => 'योग्य',
	'revreview-accuracy-3'         => 'सुयोग्य स्रोतातून',
	'revreview-accuracy-4'         => 'विशेष',
	'revreview-approved'           => 'प्रमाणित',
	'revreview-auto'               => '(आपोआप)',
	'revreview-auto-w'             => "तुम्ही स्थिर आवृत्ती संपादित आहात, कुठलेही बदल हे '''आपोआप तपासले''' जातील.",
	'revreview-auto-w-old'         => "तुम्ही तपासलेली आवृत्ती संपादित आहात, कुठलेही बदल हे '''आपोआप तपासले''' जातील.",
	'revreview-basic'              => "ही नवीनतम [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] आता '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} बदलता]''' येऊ शकते;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची वाट पाहत आहोत.",
	'revreview-basic-i'            => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] ज्यामध्ये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} साचे/चित्र बदल] आहेत, तपासण्यासाठी बाकी आहे.',
	'revreview-basic-old'          => 'ही एक [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> ला [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
नवीन [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} बदल] केलेले असण्याची शक्यता आहे.',
	'revreview-basic-same'         => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|निवडलेली]] आवृत्ती आहे ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.',
	'revreview-basic-source'       => 'या पानाची एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} निवडलेली आवृत्ती], जी <i>$2</i> ला[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे, या आवृत्तीवर आधारित आहे.',
	'revreview-changed'            => "'''[[:$1|$1]] च्या या आवृत्तीवर तुम्ही इच्छित असलेली क्रिया करता येत नाही.'''

एखादा साचा अथवा चित्र कुठल्याही आवृत्तीचा संदर्भ न देता मागितले असण्याची शक्यता आहे.
जर एखाद्या साच्यात बाह्यचित्रे असतील अथवा तुम्ही संपादन चालू केल्यानंतर साच्यातील काही भाग बदलल्यानंतर असे होऊ शकते.
कृपया रिफ्रेश करून पुन्हा तपासा.",
	'revreview-current'            => 'कच्ची प्रत',
	'revreview-depth'              => 'गहनता',
	'revreview-depth-0'            => 'अप्रमाणित',
	'revreview-depth-1'            => 'प्राथमिक',
	'revreview-depth-2'            => 'माध्यमिक',
	'revreview-depth-3'            => 'उच्च',
	'revreview-depth-4'            => 'विशेष',
	'revreview-draft-title'        => 'लेखाची कच्ची प्रत',
	'revreview-edit'               => 'कच्ची प्रत संपादा',
	'revreview-edited'             => "'''नवीन संपादने एखाद्या जुन्या सदस्याने तपासल्यानंतर [[{{MediaWiki:Validationpage}}|स्थिर आवृत्ती]] मध्ये दाखविली जातील.
''कच्ची प्रत'' खाली दिलेली आहे.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|बदलाची|बदलांची}}] तपासणी बाकी आहे.",
	'revreview-flag'               => 'ही आवृत्ती तपासा',
	'revreview-invalid'            => "'''चुकीचे टारगेट:''' कुठलीही [[{{MediaWiki:Validationpage}}|तपासलेली]] आवृत्ती दिलेल्या क्रमांकाशी जुळत नाही.",
	'revreview-legend'             => 'या आवृत्तीचे गुणांकन करा',
	'revreview-log'                => 'प्रतिक्रीया:',
	'revreview-main'               => 'तपासण्यासाठी एखादी आवृत्ती निवडणे गरजेचे आहे.

न तपासलेल्या पानांची यादी पहाण्यासाठी [[Special:Unreviewedpages]] इथे जा.',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नविनतम निवडलेली आवृत्ती] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]) ही <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित केलेली आहे].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची गरज आहे.',
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम निवडलेली आवृत्ती] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]) <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} साचा/चित्र बदल] तपासायचे राहिलेले आहेत.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नविनतम निवडलेली आवृत्ती] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]) ही <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित केलेली आहे].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची गरज आहे.',
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} नवीनतम गुणवत्तापूर्ण आवृत्ती] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]) <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} साचा/चित्र बदल] तपासायचे राहिलेले आहेत.',
	'revreview-noflagged'          => "या पानाच्या तपासलेल्या आवृत्त्या नाहीत, त्यामुळे हे पान गुणवत्तेसाठी [[{{MediaWiki:Validationpage}}|तपासलेले]] '''नसण्याची''' शक्यता आहे.",
	'revreview-note'               => '[[User:$1]] ने ही आवृत्ती [[{{MediaWiki:Validationpage}}|तपासताना]] खालील सूचना दिलेल्या आहेत:',
	'revreview-notes'              => 'आपली मते अथवा निष्कर्ष:',
	'revreview-oldrating'          => 'याचे गुणांकन:',
	'revreview-patrol'             => 'हा बदल पाहिला असल्याची खूण करा',
	'revreview-patrol-title'       => 'गस्त घातल्याची खूण करा',
	'revreview-patrolled'          => '[[:$1|$1]] च्या निवडलेल्या आवृत्तीवर पहाण्याची नोंद केलेली आहे.',
	'revreview-quality'            => "ही नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] आता '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} बदलता]''' येऊ शकते;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|बदलासाठी|बदलांसाठी}}] पुनर्तपासणीची वाट पाहत आहोत.",
	'revreview-quality-i'          => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे, जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.
याची [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत] ज्यामध्ये [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} साचे/चित्र बदल] आहेत, तपासण्यासाठी बाकी आहे.',
	'revreview-quality-old'        => 'ही एक [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> ला [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.
नवीन [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} बदल] केलेले असण्याची शक्यता आहे.',
	'revreview-quality-same'       => 'ही नवीनतम [[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण]] आवृत्ती आहे ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} सर्व यादी]), जी <i>$2</i> रोजी [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे.',
	'revreview-quality-source'     => 'या पानाची एक [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} गुणवत्तापूर्ण आवृत्ती], जी <i>$2</i> ला[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] केलेली आहे, या आवृत्तीवर आधारित आहे.',
	'revreview-quality-title'      => 'गुणवत्तापूर्ण लेख',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|निवडलेला लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत पहा]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|निवडलेला लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत पहा]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|निवडलेला लेख]]'''",
	'revreview-quick-invalid'      => "'''चुकीचा आवृत्ती क्रमांक'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|सद्ध्याची आवृत्ती]]''' (तपासलेली नाही)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत पहा]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} कच्ची प्रत पहा]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|गुणवत्तापूर्ण लेख]]'''",
	'revreview-quick-see-basic'    => "'''कच्ची प्रत''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} लेख पहा]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} फरक तपासा])",
	'revreview-quick-see-quality'  => "'''कच्ची प्रत''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} लेख पहा]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} फरक तपासा])",
	'revreview-selected'           => "'''$1''' ची निवडलेली आवृत्ती:",
	'revreview-source'             => 'कच्च्या प्रतीचा स्रोत',
	'revreview-stable'             => 'स्थिर पान',
	'revreview-stable-title'       => 'निवडलेला लेख',
	'revreview-stable1'            => 'तुम्ही कदाचित या पानाची [{{fullurl:$1|stableid=$2}} ही खूण केलेली आवृत्ती] आता [{{fullurl:$1|stable=1}} स्थिर आवृत्ती] झाली आहे किंवा नाही हे पाहू इच्छिता.',
	'revreview-stable2'            => 'तुम्ही या पानाची [{{fullurl:$1|stable=1}} स्थिर आवृत्ती] पाहू शकता (जर उपलब्ध असेल तर).',
	'revreview-style'              => 'वाचनीयता',
	'revreview-style-0'            => 'अप्रमाणित',
	'revreview-style-1'            => 'वापरण्यायोग्य',
	'revreview-style-2'            => 'चांगले',
	'revreview-style-3'            => 'संक्षिप्त',
	'revreview-style-4'            => 'विशेष',
	'revreview-submit'             => 'आपला रिव्ह्यू पाठवा',
	'revreview-successful'         => "'''[[:$1|$1]] च्या निवडलेल्या आवृत्तीवर यशस्वीरित्या तपासल्याची खूण केलेली आहे.
([{{fullurl:Special:Stableversions|page=$2}} सर्व खूणा केलेल्या आवृत्त्या पहा])'''",
	'revreview-successful2'        => "'''[[:$1|$1]] च्या निवडलेल्या आवृत्तीची खूण काढली.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|स्थिर आवृत्त्या]] या एखाद्या पानाच्या नविनतम आवृत्तीमधून न घेता मूळ मजकूरावरुन घेतल्या जातात.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|स्थिर आवृत्त्या]] या पानाच्या तपासलेल्या आवृत्त्या असतात व बघणार्‍यांसाठी अविचल मजकूर दर्शवितात.''",
	'revreview-toggle-title'       => 'जास्तीची माहिती दाखवा/लपवा',
	'revreview-toolow'             => 'एखादी आवृत्ती तपासलेली आहे अशी खूण करण्यासाठी तुम्ही खालील प्रत्येक पॅरॅमीटर्सना "अप्रमाणित" पेक्षा वरचा दर्जा देणे आवश्यक आहे.
एखाद्या आवृत्तीचे गुणांकन कमी करण्यासाठी, खालील सर्व रकान्यांमध्ये "अप्रमाणित" भरा.',
	'revreview-update'             => "कृपया केलेले बदल ''(खाली दिलेले)'' [[{{MediaWiki:Validationpage}}|तपासा]] कारण स्थिर आवृत्ती [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.<br />
'''काही साचे/चित्रे बदललेली आहेत:'''",
	'revreview-update-includes'    => "'''काही साचे/चित्र बदलण्यात आलेले आहेत:'''",
	'revreview-update-none'        => "कृपया केलेले बदल ''(खाली दिलेले)'' [[{{MediaWiki:Validationpage}}|तपासा]] कारण स्थिर आवृत्ती [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} प्रमाणित] करण्यात आलेली आहे.",
	'revreview-update-use'         => "'''सूचना:''' जर यापैकी एका साचा/चित्राची स्थिर आवृत्ती असेल, तर ती या पानाच्या स्थिर आवृत्ती मध्ये अगोदरच वापरलेली असेल.",
	'revreview-diffonly'           => "''हे पान तपासण्यासाठी, \"आत्ताची आवृत्ती\" वर टिचकी द्या व तपासणी अर्ज वापरा.''",
	'revreview-visibility'         => "'''या पानाला एक [[{{MediaWiki:Validationpage}}|स्थिर आवृत्ती]] आहे, जी [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} बदलली] जाऊ शकते.'''",
	'right-autopatrolother'        => 'मुख्य नामविश्व सोडून इतर नामविश्वांतील पानांच्या आवृत्त्यांवर आपोआप लक्ष ठेवले म्हणून खूणा करा',
	'right-autoreview'             => 'आवृत्त्या पाहिल्या म्हणून आपोआप खूणा करा',
	'right-movestable'             => 'स्थिर पानांचे स्थानांतरण करा',
	'right-review'                 => 'आवृत्त्या पाहिल्या म्हणून खूण करा',
	'right-stablesettings'         => 'स्थिर आवृत्ती कशा प्रकारे निवडली व दाखविली जाते ते ठरवा',
	'right-validate'               => 'आवृत्त्या वैध म्हणून खूण करा',
	'rights-editor-autosum'        => 'आपोआप पदोन्नती',
	'rights-editor-revoke'         => '[[$1]] चे संपादक अधिकार काढून घेतले',
	'specialpages-group-quality'   => 'गुणवत्ता वचन',
	'stable-logentry'              => '[[$1]] चे स्थिर आवृत्तीकरण बदला',
	'stable-logentry2'             => '[[$1]] चे स्थिर आवृत्तीकरण पूर्वपदास न्या',
	'stable-logpage'               => 'स्थिर आवृत्ती सूची',
	'stable-logpagetext'           => 'ही कंटेंट पानांच्या [[{{MediaWiki:Validationpage}}|स्थिर आवृत्ती]] मधील बदलांची सूची आहे.
स्थिर पानांची यादी [[Special:StablePages|स्थिर पान यादी]] इथे पहायला मिळू शकेल.',
	'tooltip-ca-current'           => 'या पानाची कच्ची प्रत पहा',
	'tooltip-ca-default'           => 'गुणवत्ता देणारी स्थिती',
	'tooltip-ca-stable'            => 'या पानाची पक्की प्रत पहा',
	'validationpage'               => '{{ns:help}}:लेख प्रमाणिकरण',
);

/** Malay (Bahasa Melayu)
 * @author Aviator
 */
$messages['ms'] = array(
	'editor'                       => 'Penyunting',
	'flaggedrevs'                  => 'Semakan Bertanda',
	'flaggedrevs-backlog'          => "Terdapat sebuah log di [[Special:OldReviewedPages|Laman disemak lapuk]]. '''Sila ambil perhatian!'''",
	'flaggedrevs-desc'             => 'Membolehkan para penyunting dan pemeriksa mengesahkan semakan dan menstabilkan laman',
	'flaggedrevs-pref-UI-0'        => 'Gunakan antara muka pengguna yang terperinci',
	'flaggedrevs-pref-UI-1'        => 'Gunakan antara muka pengguna yang ringkas',
	'flaggedrevs-prefs'            => 'Kestabilan',
	'flaggedrevs-prefs-stable'     => 'Paparkan versi stabil bagi laman kandungan (jika ada)',
	'flaggedrevs-prefs-watch'      => 'Tambahkan laman yang diperiksa ke dalam senarai pantau',
	'group-editor'                 => '{{ns:project}}:Penyunting',
	'group-editor-member'          => 'Penyunting',
	'group-reviewer'               => 'Pemeriksa',
	'group-reviewer-member'        => 'Pemeriksa',
	'grouppage-editor'             => '{{ns:project}}:Penyunting',
	'grouppage-reviewer'           => '{{ns:project}}:Pemeriksa',
	'hist-draft'                   => 'semakan draf',
	'hist-quality'                 => 'semakan bermutu',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} disahkan] oleh [[User:$3|$3]]',
	'hist-stable'                  => 'semakan dijenguk',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} dijenguk] oleh [[User:$3|$3]]',
	'review-diff2stable'           => 'Lihat perubahan antara semakan stabil dan semakan semasa',
	'review-logentry-app'          => 'memeriksa [[$1]]',
	'review-logentry-dis'          => 'menggugurkan salah satu versi bagi [[$1]]',
	'review-logentry-id'           => 'ID semakan $1',
	'review-logentry-diff'         => 'beza dengan versi stabil',
	'review-logpage'               => 'Log pemeriksaan',
	'review-logpagetext'           => 'Berikut ialah log perubahan pada status [[{{MediaWiki:Validationpage}}|pengesahan]] semakan bagi laman kandungan.
Sila lihat [[Special:ReviewedPages|senarai laman diperiksa]] untuk senarai laman yang telah disahkan.',
	'reviewer'                     => 'Pemeriksa',
	'revisionreview'               => 'Periksa semakan',
	'revreview-accuracy'           => 'Ketepatan',
	'revreview-accuracy-0'         => 'Tidak disahkan',
	'revreview-accuracy-1'         => 'Dijenguk',
	'revreview-accuracy-2'         => 'Tepat',
	'revreview-accuracy-3'         => 'Bersumber',
	'revreview-accuracy-4'         => 'Terpilih',
	'revreview-approved'           => 'Disahkan',
	'revreview-auto'               => '(automatik)',
	'revreview-auto-w'             => "Anda sedang menyunting semakan stabil; sebarang perubahan akan '''ditanda periksa secara automatik'''.",
	'revreview-auto-w-old'         => "Anda sedang menyunting sebuah semakan yang telah diperiksa; sebarang perubahan akan '''ditanda periksa secara automatik'''.",
	'revreview-basic'              => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 perubahan] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-basic-i'            => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan templat/imej] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-basic-old'          => 'Ini ialah sebuah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Beberapa [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan] baru mungkin telah dibuat.',
	'revreview-basic-same'         => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|dijenguk]] terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.',
	'revreview-basic-source'       => 'Terdapat sebuah [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versi dijenguk] bagi laman ini, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>, berdasarkan semakan ini.',
	'revreview-changed'            => "'''Tindakan yang diminta tidak dapat dilakukan pada semakan bagi [[:$1|$1]] ini.'''

Sebuah templat atau imej mungkin telah diminta ketika tiada versi dinyatakan.
Masalah ini boleh berlaku jika terdapat sebuah templat dinamik yang memasukkan imej lain, atau templat yang bergantung kepada pemboleh ubah yang telah berubah ketika anda sedang memeriksa laman ini.
Masalah ini mungkin boleh diselesaikan dengan menyegarkan semula laman ini dan memeriksanya sekali lagi.",
	'revreview-current'            => 'Draf',
	'revreview-depth'              => 'Paras',
	'revreview-depth-0'            => 'Tidak disahkan',
	'revreview-depth-1'            => 'Asas',
	'revreview-depth-2'            => 'Pertengahan',
	'revreview-depth-3'            => 'Tinggi',
	'revreview-depth-4'            => 'Terpilih',
	'revreview-draft-title'        => 'Rencana draf',
	'revreview-edit'               => 'Sunting draf',
	'revreview-edited'             => "'''Suntingan anda akan dijadikan [[{{MediaWiki:Validationpage}}|versi stabil]] setelah diperiksa oleh seorang pengguna yang beramanah. ''Draf'' bagi laman ini ditunjukkan di bawah.''' Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 perubahan] yang belum diperiksa.",
	'revreview-flag'               => 'Periksa semakan ini',
	'revreview-invalid'            => "'''Sasaran tidak sah:''' tiada semakan [[{{MediaWiki:Validationpage}}|diperiksa]] dengan ID yang diberikan.",
	'revreview-legend'             => 'Beri penilaian untuk kandungan semakan',
	'revreview-log'                => 'Ulasan:',
	'revreview-main'               => 'Anda hendaklah memilih sebuah semakan tertentu daripada sesebuah laman kandungan untuk diperiksa.

Sila lihat senarai laman yang belum diperiksa di [[Special:Unreviewedpages]].',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan dijenguk terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]) telah [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 perubahan] yang belum diperiksa.',
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan dijenguk terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]) telah [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.\\n
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan templat/imej] yang belum diperiksa.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan bermutu terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]) telah [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.\\n
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 perubahan] yang belum diperiksa.',
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Semakan bermutu terakhir] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} list all]) telah [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.\\n
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan templat/imej] yang belum diperiksa.',
	'revreview-noflagged'          => "Laman ini tidak mempunyai semakan yang diperiksa, oleh itu ia '''belum''' [[{{MediaWiki:Validationpage}}|disahkan]] bermutu.",
	'revreview-note'               => '[[User:$1]] membuat catatan berikut ketika [[{{MediaWiki:Validationpage}}|memeriksa]] semakan ini:',
	'revreview-notes'              => 'Catatan:',
	'revreview-oldrating'          => 'Penilaian:',
	'revreview-patrol'             => 'Tanda ronda perubahan ini',
	'revreview-patrol-title'       => 'Tanda ronda',
	'revreview-patrolled'          => 'Semakan bagi [[:$1|$1]] yang anda pilih telah ditanda ronda.',
	'revreview-quality'            => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|bermutu]] terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 perubahan] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-quality-i'          => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|bermutu]] terakhir, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Terdapat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan templat/imej] pada [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} draf] yang belum diperiksa.',
	'revreview-quality-old'        => 'Ini ialah sebuah semakan [[{{MediaWiki:Validationpage}}|bermutu]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.
Beberapa [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perubahan] baru mungkin telah dibuat.',
	'revreview-quality-same'       => 'Ini ialah semakan [[{{MediaWiki:Validationpage}}|bermutu]] terakhir ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} senarai]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>.',
	'revreview-quality-source'     => 'Terdapat sebuah [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} versi bermutu] bagi laman ini, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan] pada <i>$2</i>, berdasarkan semakan ini.',
	'revreview-quality-title'      => 'Rencana bermutu',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Rencana dijenguk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Rencana dijenguk]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Rencana dijenguk]]'''",
	'revreview-quick-invalid'      => "'''ID semakan tidak sah'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Semakan semasa]]''' (belum diperiksa)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Rencana bermutu]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Rencana bermutu]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} lihat draf]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Rencana bermutu]]'''",
	'revreview-quick-see-basic'    => "'''Draf''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat rencana]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perbezaan])",
	'revreview-quick-see-quality'  => "'''Draf''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lihat rencana]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} perbezaan])",
	'revreview-selected'           => "Semakan '''$1:''' yang dipilih",
	'revreview-source'             => 'sumber draf',
	'revreview-stable'             => 'Laman stabil',
	'revreview-stable-title'       => 'Rencana dijenguk',
	'revreview-stable1'            => 'Anda boleh melihat [{{fullurl:$1|stableid=$2}} versi bertanda ini] untuk melihat sama ada ia sudah menjadi [{{fullurl:$1|stable=1}} versi stabil] bagi laman ini.',
	'revreview-stable2'            => 'Anda boleh melihat [{{fullurl:$1|stable=1}} versi stabil] bagi laman ini (jika masih ada).',
	'revreview-style'              => 'Gaya bahasa',
	'revreview-style-0'            => 'Belum disahkan',
	'revreview-style-1'            => 'Memuaskan',
	'revreview-style-2'            => 'Baik',
	'revreview-style-3'            => 'Padat',
	'revreview-style-4'            => 'Terpilih',
	'revreview-submit'             => 'Serah',
	'revreview-successful'         => "'''Semakan [[:$1|$1]] yang dipilih telah berjaya ditanda. ([{{fullurl:Special:Stableversions|page=$2}} lihat semua semakan bertanda])'''",
	'revreview-successful2'        => "'''Tanda bagi semakan [[:$1|$1]] yang dipilih berjaya dibuang.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] ialah kandungan laman lalai yang menggantikan semakan terbaru untuk dipaparkan kepada pengunjung.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Versi stabil]] ialah semakan laman yang telah disahkan dan boleh dijadikan kandungan lalai untuk dipaparkan kepada pengunjung.''",
	'revreview-toggle-title'       => 'papar/sembunyi butiran',
	'revreview-toolow'             => 'Anda hendaklah memberi penilaian yang lebih tinggi daripada "tidak disahkan" kepada setiap kriteria di bawah.
Untuk menggugurkan semakan ini, sila berikan penilaian "tidak disahkan" kepada semua kriteria.',
	'revreview-update'             => "Sila [[{{MediaWiki:Validationpage}}|periksa]] perubahan ''(ditunjukkan di bawah)'' yang telah dibuat sejak semakan stabil [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan].<br />
'''Beberapa templat/imej telah dikemaskinikan:'''",
	'revreview-update-includes'    => "'''Beberapa templat/imej telah dikemaskinikan:'''",
	'revreview-update-none'        => "Sila [[{{MediaWiki:Validationpage}}|periksa]] perubahan ''(ditunjukkan di bawah)'' yang telah dibuat sejak semakan stabil [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} disahkan].",
	'revreview-update-use'         => "'''CATATAN:''' Jika sebarang templat/imej ini mempunyai versi stabil, maka versi itu telah pun digunakan dalam versi stabil bagi laman ini.",
	'revreview-diffonly'           => "''Sila klik pautan \"semakan semasa\" dan gunakan borang pemeriksaan untuk memeriksa laman ini.''",
	'revreview-visibility'         => "'''Laman ini mempunyai sebuah [[{{MediaWiki:Validationpage}}|versi stabil]]; tetapan baginya boleh [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} diubah].'''",
	'right-autopatrolother'        => 'Menanda ronda semakan dalam ruang nama bukan utama secara automatik',
	'right-autoreview'             => 'Menanda jenguk semakan secara automatik',
	'right-movestable'             => 'Memindahkan laman stabil',
	'right-review'                 => 'Menanda jenguk semakan',
	'right-stablesettings'         => 'Menetapkan bagaimana versi stabil dipilih dan dipaparkan',
	'right-validate'               => 'Menanda sah semakan',
	'rights-editor-autosum'        => 'lantikan automatik',
	'rights-editor-revoke'         => 'menarik status [[$1]] sebagai penyunting',
	'specialpages-group-quality'   => 'Jaminan mutu',
	'stable-logentry'              => 'mengubah tetapan versi stabil bagi [[$1]]',
	'stable-logentry2'             => 'mengeset semula tetapan versi stabil bagi [[$1]]',
	'stable-logpage'               => 'Log kestabilan',
	'stable-logpagetext'           => 'Berikut ialah log perubahan pada tetapan [[{{MediaWiki:Validationpage}}|versi stabil]] bagi laman kandungan.
Senarai laman yang telah distabilkan boleh dilihat di [[Special:StablePages|senarai laman stabil]].',
	'tooltip-ca-current'           => 'Lihat draf laman ini',
	'tooltip-ca-default'           => 'Tetapan jaminan mutu',
	'tooltip-ca-stable'            => 'Lihat versi stabil bagi laman ini',
	'validationpage'               => '{{ns:help}}:Pengesahan rencana',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'flaggedrevs'             => 'Tekente Versionen',
	'flaggedrevs-prefs'       => 'Stabilität',
	'review-logentry-app'     => 'hett „[[$1]]“ markeert',
	'revreview-accuracy-2'    => 'akraat',
	'revreview-auto'          => '(automaatsch)',
	'revreview-depth'         => 'Deep',
	'revreview-depth-3'       => 'hooch',
	'revreview-log'           => 'Kommentar:',
	'revreview-patrol'        => 'Dit Ännern as nakeken marken',
	'revreview-patrol-title'  => 'As nakeken marken',
	'revreview-quick-invalid' => "'''Ungüllige Versions-ID'''",
	'revreview-style'         => 'Leesborkeit',
	'revreview-style-2'       => 'Good',
	'revreview-toggle-title'  => 'wies/versteek Details',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author SPQRobin
 */
$messages['nl'] = array(
	'editor'                       => 'Redacteur',
	'flaggedrevs'                  => 'Aangevinkte versies',
	'flaggedrevs-backlog'          => "Er is op dit moment een achterstand in de controle van [[Special:OldReviewedPages|pagina's met eindredactie die zijn bijgewerkt]]. 
'''Uw aandacht is gewenst!'''",
	'flaggedrevs-desc'             => 'Geeft redacteuren/controleurs de mogelijkheid versies te waarderen en stabiele versies aan te merken',
	'flaggedrevs-pref-UI-0'        => 'Gedetailleerde gebruikersinterface voor stabiele versies gebruiken',
	'flaggedrevs-pref-UI-1'        => 'Eenvoudige gebruikersinterface voor stabiele versies gebruiken',
	'flaggedrevs-prefs'            => 'Stabiliteit',
	'flaggedrevs-prefs-stable'     => "Altijd de stabiele versies van pagina's weergeven (als die bestaan)",
	'flaggedrevs-prefs-watch'      => "Pagina's waar ik eindredactie voor doe aan mijn volglijst toevoegen",
	'group-editor'                 => 'Redacteuren',
	'group-editor-member'          => 'Redacteur',
	'group-reviewer'               => 'Eindredacteuren',
	'group-reviewer-member'        => 'Eindredacteur',
	'grouppage-editor'             => '{{ns:project}}:Redacteur',
	'grouppage-reviewer'           => '{{ns:project}}:Eindredacteur',
	'hist-draft'                   => 'werkversie',
	'hist-quality'                 => 'kwaliteitsversie',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} eindredactie] door [[User:$3|$3]]',
	'hist-stable'                  => 'gecontroleerde versie',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} gecontroleerd] door [[User:$3|$3]]',
	'review-diff2stable'           => 'Verschillen tussen stabiele versie en werkversie bekijken',
	'review-logentry-app'          => 'heeft eindredactie gedaan voor [[$1]]',
	'review-logentry-dis'          => 'heeft een versie van [[$1]] lager beoordeeld',
	'review-logentry-id'           => 'versienummer $1',
	'review-logentry-diff'         => 'verschil met stabiele versie',
	'review-logpage'               => 'Eindredactielogboek',
	'review-logpagetext'           => "Dit is een logboek met wijzigingen in de [[{{MediaWiki:Validationpage}}|waarderingsstatus]] van versies van pagina's.
In de [[Special:ReviewedPages|lijst van pagina's met eindredactie]] staan de goedgekeurde pagina's.",
	'reviewer'                     => 'Eindredacteur',
	'revisionreview'               => 'Eindredactie voor versies',
	'revreview-accuracy'           => 'Nauwkeurigheid',
	'revreview-accuracy-0'         => 'Niet goedgekeurd',
	'revreview-accuracy-1'         => 'Gecontroleerd',
	'revreview-accuracy-2'         => 'Nauwkeurig',
	'revreview-accuracy-3'         => 'Goed van bronnen voorzien',
	'revreview-accuracy-4'         => 'Uitgelicht',
	'revreview-approved'           => 'Goedgekeurd',
	'revreview-auto'               => '(automatisch)',
	'revreview-auto-w'             => "U bent de stabiele versie aan het bewerken. Wijzigingen worden '''automatisch goedgekeurd'''.",
	'revreview-auto-w-old'         => "U bent een versie met eindredactie versie aan het bewerken. Wijzigingen worden '''automatisch goedgekeurd'''.",
	'revreview-basic'              => 'Dit is de laatst [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] heeft [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|wijziging|wijzigingen}}] die {{PLURAL:$3|wacht|wachten}} op eindredactie.',
	'revreview-basic-i'            => 'Dit is de laatst [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] bevat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} wijzigingen in sjablonen/bestanden] die wachten op eindredactie.',
	'revreview-basic-old'          => 'Dit is een [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
Er kunnen nieuwe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} wijzigingen] gemaakt zijn.',
	'revreview-basic-same'         => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|gecontroleerde]] versie ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.',
	'revreview-basic-source'       => 'Een [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} gecontroleerde versie] van deze pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>, is gebaseerd op deze versie.',
	'revreview-changed'            => "'''De gevraagde actie kon niet uitgevoerd worden voor deze versie van [[:$1|$1]].'''
	
Er is een sjabloon of afbeelding opgevraagd zonder dat een specifieke versie is aangegeven.
Dit kan voorkomen als een dynamisch sjabloon een andere afbeelding of een ander sjabloon bevat, afhankelijk van een variabele die is gewijzigd sinds u bent begonnen met de beoordeling van deze pagina.
Ververs de pagina en start de beoordeling opnieuw om dit probleem op te lossen.",
	'revreview-current'            => 'Werkversie',
	'revreview-depth'              => 'Diepgang',
	'revreview-depth-0'            => 'Niet goedgekeurd',
	'revreview-depth-1'            => 'Basis',
	'revreview-depth-2'            => 'Middelmatig',
	'revreview-depth-3'            => 'Hoog',
	'revreview-depth-4'            => 'Uitgelicht',
	'revreview-draft-title'        => 'Werkversie',
	'revreview-edit'               => 'werkversie bewerken',
	'revreview-edited'             => "'''Bewerkingen worden opgenomen in de [[{{MediaWiki:Validationpage}}|stabiele versie]] als een eindredacteur ze gecontroleerd heeft. De ''werkversie'' is hieronder te bekijken.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|bewerking wacht|bewerkingen wachten}}] op eindredactie.",
	'revreview-flag'               => 'Eindredactie voor deze versie uitvoeren',
	'revreview-invalid'            => "'''Ongeldige bestemming:''' er is geen versie met [[{{MediaWiki:Validationpage}}|eindredactie]] die overeenkomt met het opgegeven nummer.",
	'revreview-legend'             => 'Versieinhoud waarderen',
	'revreview-log'                => 'Opmerking:',
	'revreview-main'               => "U moet een specifieke versie van een pagina kiezen waarvoor u eindredactie wilt doen.

Zie  de [[Special:Unreviewedpages|lijst met pagina's zonder eindredactie]].",
	'revreview-newest-basic'       => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|heeft|hebben}} eindredactie nodig.',
	'revreview-newest-basic-i'     => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal weergeven]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} wijzigingen in sjablonen/bestanden] hebben eindredactie nodig.',
	'revreview-newest-quality'     => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatste kwaliteitsversie] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|versie|versies}}] {{PLURAL:$3|heeft|hebben}} eindredactie nodig.',
	'revreview-newest-quality-i'   => 'De [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatste kwaliteitsversie] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal weergeven]) is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} gekeurd] op <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} wijzigingen in sjablonen/bestanden] hebben eindredactie nodig.',
	'revreview-noflagged'          => "Er zijn geen versies met eindredactie van deze pagina, dus die is wellicht '''niet''' [[{{MediaWiki:Validationpage}}|beoordeeld]] op kwaliteit.",
	'revreview-note'               => '[[User:$1|$1]] heeft de volgende opmerkingen gemaakt bij de [[{{MediaWiki:Validationpage}}|eindredactie]] van deze versie:',
	'revreview-notes'              => 'Weer te geven observaties of notities:',
	'revreview-oldrating'          => 'Werd gewaardeerd als:',
	'revreview-patrol'             => 'Deze bewerking als gecontroleerd markeren',
	'revreview-patrol-title'       => 'Als gecontroleerd markeren',
	'revreview-patrolled'          => 'De geselecteerde versie van [[:$1|$1]] is gemarkeerd als gecontroleerd.',
	'revreview-quality'            => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] heeft [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|wijziging|wijzigingen}}] die {{PLURAL:$3|wacht|wachten}} op eindredactie.',
	'revreview-quality-i'          => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie] bevat [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} wijzigingen in sjablonen/bestanden] die wachten op eindredactie.',
	'revreview-quality-old'        => 'Dit is een [[{{MediaWiki:Validationpage}}|kwaliteitsversie]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} alles bekijken]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.
Er kunnen nieuwe [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} wijzigingen] gemaakt zijn.',
	'revreview-quality-same'       => 'Dit is de laatste [[{{MediaWiki:Validationpage}}|kwaliteitsversie]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} allemaal bekijken]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>.',
	'revreview-quality-source'     => 'Een [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kwaliteitsversie] van deze pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd] op <i>$2</i>, is gebaseerd op deze versie.',
	'revreview-quality-title'      => 'Kwaliteitsversie',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Gecontroleerde versie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie bekijken]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Gecontroleerde versie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie bekijken]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Gecontroleerde versie]]'''",
	'revreview-quick-invalid'      => "'''Ongeldig versienummer'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Huidige versie]]''' (niet gecontroleerd)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie bekijken]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} werkversie bekijken]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kwaliteitsversie]]'''",
	'revreview-quick-see-basic'    => "'''Werkversie''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} vergelijken])",
	'revreview-quick-see-quality'  => "'''Werkversie''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} laatst gecontroleerde versie]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} vergelijken])",
	'revreview-selected'           => "Geselecteerde versie van '''$1:'''",
	'revreview-source'             => 'Brontekst werkversie',
	'revreview-stable'             => 'Stabiele versie',
	'revreview-stable-title'       => 'Gecontroleerde versie',
	'revreview-stable1'            => 'U kunt van deze pagina [{{fullurl:$1|stableid=$2}} deze gecontroleerde versie] om te beoordelen of dit nu de [{{fullurl:$1|stable=1}} stabiele versie] is.',
	'revreview-stable2'            => 'Wellicht wilt u de [{{fullurl:$1|stable=1}} stabiele versie] van deze pagina bekijken (als die er nog is).',
	'revreview-style'              => 'Leesbaarheid',
	'revreview-style-0'            => 'Niet goedgekeurd',
	'revreview-style-1'            => 'Aanvaardbaar',
	'revreview-style-2'            => 'Goed',
	'revreview-style-3'            => 'Bondig',
	'revreview-style-4'            => 'Uitgelicht',
	'revreview-submit'             => 'Beoordeling opslaan',
	'revreview-successful'         => "'''De aangegeven versie van [[:$1|$1]] is gecontroleerd. ([{{fullurl:Special:Stableversions|page=$2}} alle gecontroleerde versies bekijken])'''",
	'revreview-successful2'        => "'''De geselecteerde versie van [[:$1|$1]] is als niet stabiel aangemerkt.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Stabiele versies]] worden standaard weergegeven in plaats van de nieuwste versie.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Stabiele versies]] zijn gecontroleerde versies van pagina's die standaard weergegeven kunnen worden aan lezers.''",
	'revreview-toggle-title'       => 'details weergeven/verbergen',
	'revreview-toolow'             => 'U moet tenminste alle onderstaande eigenschappen hoger instellen dan "niet goedgekeurd" om voor een versie aan te merken geven dat deze eindredactie heeft gehad.
Stel alle velden in op "niet goedgekeurd" om de waardering van een versie te verwijderen.',
	'revreview-update'             => "Voer alstublieft [[{{MediaWiki:Validationpage}}|eindredactie]] uit op alle ''onderstaande'' wijzigingen die gemaakt zijn sinds de stabiele versie is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd].<br />
'''Enkele sjablonen of afbeeldingen zijn gewijzigd:'''",
	'revreview-update-includes'    => "'''Sommige sjablonen/bestanden zijn bijgewerkt:'''",
	'revreview-update-none'        => "Voer alstublieft [[{{MediaWiki:Validationpage}}|eindredactie]] uit op de ''onderstaande'' wijzigingen die gemaakt zijn sinds de stabiele versie is [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} goedgekeurd].",
	'revreview-update-use'         => "'''Let op:''' als een van deze sjablonen of bestanden een stabiele versie heeft, dan wordt die al gebruikt in de stabiele versie van deze pagina.",
	'revreview-diffonly'           => "''Klik voor eindredactie op de verwijzing \"huidige versie\" en gebruik het eindredactieformulier.''",
	'revreview-visibility'         => 'Deze pagina heeft een [[{{MediaWiki:Validationpage}}|stabiele versie]]. U kunt hiervoor [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} instellingen maken].',
	'right-autopatrolother'        => 'Veries buiten de hoofdnaamruimte automatisch als gecontroleerd markeren',
	'right-autoreview'             => 'Versies automatisch als gecontroleerd markeren',
	'right-movestable'             => "Stabiele pagina's hernoemen",
	'right-review'                 => 'Versies als gecontroleerd markeren',
	'right-stablesettings'         => 'Instellen hoe een stabiele versie wordt geselecteerd en weergegeven',
	'right-validate'               => 'Versies als gevalideerd markeren',
	'rights-editor-autosum'        => 'automatisch',
	'rights-editor-revoke'         => 'verwijderde redacteurstatus van [[$1]]',
	'specialpages-group-quality'   => 'Kwaliteitscontrole',
	'stable-logentry'              => 'heeft stabiele versies ingesteld voor [[$1]]',
	'stable-logentry2'             => 'heeft stabiele versies opnieuw ingesteld voor [[$1]]',
	'stable-logpage'               => 'Logboek stabiele versies',
	'stable-logpagetext'           => "Dit is een logboek met wijzigingen aan de instellingen voor [[{{MediaWiki:Validationpage}}|stabiele versies]] voor de hoofdnaamruimte.
Zie ook de [[Special:StablePages|lijst met stabiele pagina's]].",
	'tooltip-ca-current'           => 'Werkversie van deze pagina bekijken',
	'tooltip-ca-default'           => 'Instellingen kwaliteitsbewaking',
	'tooltip-ca-stable'            => 'Stabiele versie van deze pagina bekijken',
	'validationpage'               => '{{ns:help}}:Paginaredactie',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'revreview-log' => 'Kommentar:',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author H92
 * @author Stigmj
 * @author EivindJ
 */
$messages['no'] = array(
	'editor'                       => 'Skribent',
	'flaggedrevs-desc'             => 'Gir skribenter og anmeldere muligheten til å godkjenne sideversjoner og stabilisere sider',
	'flaggedrevs-pref-UI-0'        => 'Bruk detaljert grensesnitt for stabile versjoner',
	'flaggedrevs-pref-UI-1'        => 'Bruk enkelt grensesnitt for stabile versjoner',
	'flaggedrevs-prefs'            => 'Stabile sider',
	'group-editor'                 => 'Skribenter',
	'group-editor-member'          => 'Skribent',
	'group-reviewer'               => 'Anmeldere',
	'group-reviewer-member'        => 'Anmelder',
	'grouppage-editor'             => 'Project:Skribenter',
	'grouppage-reviewer'           => 'Project:Anmeldere',
	'hist-draft'                   => 'utkastversjon',
	'hist-quality'                 => 'kvalitetsversjon',
	'hist-stable'                  => 'kontrollert versjon',
	'review-logentry-id'           => 'versjons-ID $1',
	'reviewer'                     => 'Anmelder',
	'revreview-accuracy'           => 'Nøyaktighet',
	'revreview-auto'               => '(automatisk)',
	'revreview-auto-w'             => "Du redigerer den stabile versjonen; endringer blir '''automatisk anmeldt'''.",
	'revreview-auto-w-old'         => "Du redigerer en anmeldt versjon; endringer blir '''automatisk anmeldt'''.",
	'revreview-basic'              => 'Dette er den siste [[{{MediaWiki:Validationpage}}|sjekkede]] versjonen, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}}  sjekket] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|endring|endringer}}] som venter på anmelding.',
	'revreview-current'            => 'Utkast',
	'revreview-draft-title'        => 'Artikkelutkast',
	'revreview-edit'               => 'Rediger utkast',
	'revreview-edited'             => "'''Endringer vil legges til den [[{{MediaWiki:Validationpage}}|stabile versjonen]] når en etablert bruker sjekker den.
''Utkastet'' vises nedenfor.''' [{{fullurl:{{FULLPAGENAME}}|oldid=$1|diff=cur}} $2 {{PLURAL:$2|endring venter|endringer venter}}] på å bli sjekket.",
	'revreview-invalid'            => "'''Ugyldig mål:''' ingen [[{{MediaWiki:Validationpage}}|anmeldte]] versjoner tilsvarer den angitte ID-en.",
	'revreview-log'                => 'Kommentar:',
	'revreview-newest-basic'       => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste godkjente versjonen] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|endring|endringer}}] må vurderes.',
	'revreview-newest-basic-i'     => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste godkjente versjonen] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Mal- eller bildeendringer] må vurderes.',
	'revreview-newest-quality'     => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste kvalitetssikrede versjonen av siden]  ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|endring|endringer}}] må vurderes.',
	'revreview-newest-quality-i'   => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} siste kvalitetssikrede versjonen av siden]  ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vis alle]) ble [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkjent] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Mal- eller bildeendringer] må vurderes.',
	'revreview-noflagged'          => "Det er ingen anmeldte versjoner av denne siden, så den har kanskje '''ikke''' blitt [[{{MediaWiki:Validationpage}}|kvalitetssjekket]].",
	'revreview-note'               => '[[User:$1|$1]] hadde følgende merknader under [[{{MediaWiki:Validationpage}}|anmeldelsen]] av denne sideversjonen:',
	'revreview-oldrating'          => 'Den ble anmeldt som:',
	'revreview-patrol'             => 'Merk denne endringen som patruljert',
	'revreview-patrol-title'       => 'Merk som patruljert',
	'revreview-patrolled'          => 'Den valgte versjonen av [[:$1|$1]] har blitt merket som patruljert.',
	'revreview-quality-title'      => 'Kvalitetsartikkel',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Kontrollert artikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Kontrollert artikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Kontrollert artikkel]]'''",
	'revreview-quick-invalid'      => "'''Ugyldig versjons-ID'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Siste versjon]]''' (ikke sjekket)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikkel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vis utkast]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage|Kvalitetsartikkel]]'''",
	'revreview-quick-see-basic'    => "'''Utkast''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vis artikkel]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} sammenlign])",
	'revreview-quick-see-quality'  => "'''Utkast''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vis artikkel]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} sammenlign])",
	'revreview-source'             => 'utkastets kilde',
	'revreview-stable'             => 'Stabil side',
	'revreview-stable-title'       => 'Kontrollert artikkel',
	'revreview-toggle-title'       => 'vis/skjul detaljer',
	'revreview-update-includes'    => "'''Noen maler/bilder ble oppdatert:'''",
	'right-autopatrolother'        => 'Automatisk merke sideversjoner i andre navnerom enn hovednavnerommet som patruljerte',
	'right-autoreview'             => 'Merke sideversjoner som kontrollerte automatisk',
	'right-movestable'             => 'Flytte stabile sider',
	'right-review'                 => 'Merke sideversjoner som kontrollerte',
	'right-stablesettings'         => 'Stille inn hvordan stabile versjoner velges og vises',
	'right-validate'               => 'Merke sideversjoner som validerte',
	'rights-editor-autosum'        => 'automatisk forfremmet',
	'rights-editor-revoke'         => 'fjernet skribentstatus fra [[$1]]',
	'tooltip-ca-current'           => 'Vis nåværende utkast av denne siden',
	'tooltip-ca-default'           => 'Innstillinger for kvalitetssikring',
	'tooltip-ca-stable'            => 'Vis den stabile versjonen av denne siden',
	'validationpage'               => 'Help:Artikkelvalidering',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'editor'              => 'Morulaganyi',
	'group-editor'        => 'Barulaganyi',
	'group-editor-member' => 'Morulaganyi',
	'grouppage-editor'    => '{{ns:project}}:Morulaganyi',
);

/** Occitan (Occitan)
 * @author Cedric31
 * @author Siebrand
 */
$messages['oc'] = array(
	'editor'                       => 'Contributor',
	'flaggedrevs'                  => 'Revisions marcadas',
	'flaggedrevs-backlog'          => "I a presentament de prètfaches tardièrs dins la [[Special:OldReviewedPages|Lista de las paginas revisadas]]. '''Aquò necessita vòstra atencion !'''",
	'flaggedrevs-desc'             => "Balha la possibilitat als editors o als relectors de validar las modificacions e d'estabilizar las paginas.",
	'flaggedrevs-pref-UI-0'        => "Utilizar l’interfàcia d'utilizaire de la version establa detalhada",
	'flaggedrevs-pref-UI-1'        => "Utilizar una simpla interfàcia d'utilizaire establa",
	'flaggedrevs-prefs'            => 'Estabilitat',
	'flaggedrevs-prefs-stable'     => "Afichar totjorn la version establa del contengut de las paginas per defaut (se n'existís una)",
	'flaggedrevs-prefs-watch'      => "Apondís las paginas qu'ai revistas a ma lista de seguit.",
	'group-editor'                 => 'Contributors',
	'group-editor-member'          => 'Contributor',
	'group-reviewer'               => 'Revisors',
	'group-reviewer-member'        => 'Revisor',
	'grouppage-editor'             => '{{ns:project}}:Editor',
	'grouppage-reviewer'           => '{{ns:project}}:Reviewer',
	'hist-draft'                   => 'version borrolhon',
	'hist-quality'                 => 'qualitat de la version',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validada] per [[User:$3|$3]]',
	'hist-stable'                  => 'Version visualizada',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} visada] per [[User:$3|$3]]',
	'review-diff2stable'           => 'Vejatz las modificacions entre las versions establas e actualas.',
	'review-logentry-app'          => 'Revista [[$1]]',
	'review-logentry-dis'          => 'Version depreciada de [[$1]]',
	'review-logentry-id'           => 'Version ID $1',
	'review-logentry-diff'         => 'dif cap a la version establa',
	'review-logpage'               => 'Jornal de las relecturas',
	'review-logpagetext'           => "Vaquí lo jornal de las modificacions [[{{MediaWiki:Makevalidate-page}}|de l'estatut d'aprobacion]] de las revisions.
Vejatz la lista [[Special:ReviewedPages|de las paginas relegidas]] per una lista de las que son aprobadas.",
	'reviewer'                     => 'Revisor',
	'revisionreview'               => 'Tornar veire las versions',
	'revreview-accuracy'           => 'Precision',
	'revreview-accuracy-0'         => 'Pas aprobada',
	'revreview-accuracy-1'         => 'Vista',
	'revreview-accuracy-2'         => 'Precis',
	'revreview-accuracy-3'         => 'Plan fontada',
	'revreview-accuracy-4'         => 'Remirable',
	'revreview-approved'           => 'Aprobat',
	'revreview-auto'               => '(automatic)',
	'revreview-auto-w'             => "Sètz a modificar una version establa, las modificacions seràn '''automaticament relegidas'''.",
	'revreview-auto-w-old'         => "Sètz a modificar una version anciana relegida ; las modificacions '''seràn automaticament relegidas'''.",
	'revreview-basic'              => "Es la darrièra [[{{MediaWiki:Validationpage}}|version vista]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} esbòs] pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificat]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|$3 cambiament espèra|$3 cambiaments espèran}}] una revision.",
	'revreview-basic-i'            => 'Vaquí la darrièra version [[{{MediaWiki:Validationpage}}|visada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] sus <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrolhon] dispausa de [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambiaments de modèl o d’imatge] en espèra de visa.',
	'revreview-basic-old'          => 'Vaquí una version [[{{MediaWiki:Validationpage}}|visada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lista entièra]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modificacions novèlas] pòdon èsser estada efectuadas.',
	'revreview-basic-same'         => 'Aquò es la darrièra version [[{{MediaWiki:Validationpage}}|susvelhada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] sur <i>$2</i>. La pagina pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada].',
	'revreview-basic-source'       => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version visada] d'aquesta pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>, es estada basada en defòra d'aquesta version.",
	'revreview-changed'            => "'''L'accion demandada a pas pogut èsser acomplida per aquesta version de [[:$1|$1]].'''

Un modèl o un imatge pòt èsser estat demandat alara que cap de version precisa èra causida. Aquò pòt susvenir se un modèl dinamic opèra una transclusion d'un autre imatge o d'un modèl dependent d'una variabla qu'a cambiat dempuèi qu'avètz començat a previsualizar aquesta pagina. Lo recargament de la pagina e sa revisualizacion pòdon corregir aqueste problèma.",
	'revreview-current'            => 'Esbòs',
	'revreview-depth'              => 'Prigondor',
	'revreview-depth-0'            => 'Pas aprobada',
	'revreview-depth-1'            => 'De basa',
	'revreview-depth-2'            => 'Moderat',
	'revreview-depth-3'            => 'Elevada',
	'revreview-depth-4'            => 'Remirabla',
	'revreview-draft-title'        => 'Borrolhon de pagina',
	'revreview-edit'               => 'Esbòs de modificacion',
	'revreview-edited'             => "'''Las modificacions novèlas seràn incorporadas dins [[{{MediaWiki:Validationpage}}|la version establa]] un còp qu’un utilizaire autorizat las aurà relegidas.

Lo ''borrolhon'' es visible çaijós. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|modificacion espèra|modificacions espèran}}] una relectura.",
	'revreview-flag'               => 'Evaluar aquesta version',
	'revreview-invalid'            => "'''Cibla incorrècta :''' cap de version [[{{MediaWiki:Validationpage}}|relegida]] correspon pas al numèro indicat.",
	'revreview-legend'             => 'Evaluar lo contengut de la version',
	'revreview-log'                => 'Comentari al jornal :',
	'revreview-main'               => 'Vos cal causir una version precisa per revisar. Vejatz [[Special:Unreviewedpages|las versions pas revisadas]] per una tièra de paginas.',
	'revreview-newest-basic'       => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version vista] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} las veire totas]) èra [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambiament|cambiaments}}] {{PLURAL:$3|demanda|demandan}} una revision.",
	'revreview-newest-basic-i'     => 'La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version visada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lista generala]) es estada [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] sus <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Los cambiaments sus modèls o los imatges] necessitan una relectura.',
	'revreview-newest-quality'     => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} las veire totas]) èra [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|cambiament|cambiaments}}] {{PLURAL:$3|demanda|demandan}} una revision.",
	'revreview-newest-quality-i'   => 'Las [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièras versions de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lista generala]) son estadas [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobadas] sus <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} De modificacions de modèls o d’imatges] necessitan una relectura.',
	'revreview-noflagged'          => "I a pas de version revisada d'aquesta pagina, sa [[{{MediaWiki:Validationpage}}|qualitat]] es incèrtana.",
	'revreview-note'               => '[[User:$1]] a escrich aquestas nòtas de revision :',
	'revreview-notes'              => "Observacions e nòtas d'afichar :",
	'revreview-oldrating'          => 'Son puntatge :',
	'revreview-patrol'             => 'Marcar aquesta modificacion coma patrolhada',
	'revreview-patrol-title'       => 'Marcar coma patrolhada',
	'revreview-patrolled'          => 'La version seleccionada de [[:$1|$1]] es estada marcada coma patrolhada.',
	'revreview-quality'            => "Es la darrièra [[{{MediaWiki:Validationpage}}|version de qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} esbòs] pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificat]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|$3 cambiament espèra|$3 cambiaments espèran}}] una revision.",
	'revreview-quality-i'          => 'Vaquí la darrièra version de [[{{MediaWiki:Validationpage}}|qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] sus <i>$2</i>.
Lo [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} borrolhon] dispausa de [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} cambiaments de modèl o d’imatge] en espèra de visa.',
	'revreview-quality-old'        => 'Vaquí una version de [[{{MediaWiki:Validationpage}}|qualitat]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tot listar]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>.
De [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modificacions novèlas] pòdon èsser estadas efectuadas.',
	'revreview-quality-same'       => 'Aquò es la darrièra version de [[{{MediaWiki:Validationpage}}|qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] sus <i>$2</i>. La pagina pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada].',
	'revreview-quality-source'     => "Una [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualitat] d'aquesta pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo <i>$2</i>, es estada basada en defòra d'aquesta version.",
	'revreview-quality-title'      => 'Article de qualitat',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Vista]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire revision correnta]]",
	'revreview-quick-basic-old'    => "[[{{MediaWiki:Validationpage}}|pagina visada]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire lo borrolhon]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Susvelhada]]''' (cap de modificacion revista)",
	'revreview-quick-invalid'      => "'''Numèro de version incorrèct'''",
	'revreview-quick-none'         => "'''Correnta''' (pas de revisions evaluadas)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Qualitat]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire version correnta]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualitat]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visionar lo borrolhon]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Qualitat]]''' (cap de modificacion revista)",
	'revreview-quick-see-basic'    => "'''Borrolhon''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vejatz las versions establas]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|cambiament|cambiaments}}])",
	'revreview-quick-see-quality'  => "'''Borrolhon'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vejatz la version establa]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|modificacion|modificacions}}])",
	'revreview-selected'           => "Version causida de '''$1 :'''",
	'revreview-source'             => "Font de l'esbòs",
	'revreview-stable'             => 'Pagina establa',
	'revreview-stable-title'       => 'Article visat',
	'revreview-stable1'            => "Podètz voler visionar aquesta [{{fullurl:$1|stableid=$2}} version marcada] o veire se es ara la [{{fullurl:$1|stable=1}} version establa] d'aquesta pagina.",
	'revreview-stable2'            => "Podètz voler visionar [{{fullurl:$1|stable=1}} la version establa] d'aquesta pagina (se n'existís una).",
	'revreview-style'              => 'Lisibilitat',
	'revreview-style-0'            => 'Pas aprobada',
	'revreview-style-1'            => 'Acceptabla',
	'revreview-style-2'            => 'Bona',
	'revreview-style-3'            => 'Concisa',
	'revreview-style-4'            => 'Remirabla',
	'revreview-submit'             => 'Salvar revista',
	'revreview-successful'         => "'''La version seleccionada de [[:$1|$1]], es estada marcada d'una bandièra.
([{{fullurl:Special:Stableversions|page=$2}} Veire totas las versions atal marcadas])'''",
	'revreview-successful2'        => "'''La version seleccionada de [[:$1|$1]] a pogut se veire levar sa bandièra amb succès.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Las versions establas]] son causidas per defaut pels revisaires puslèu que las mai recentas.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Las versions establas]] son las versions marcadas de las pagina e pòdon èsser parametradas coma lo contengut per defaut pels revisaires.''",
	'revreview-toggle-title'       => 'mostrar/amagar los detalhs',
	'revreview-toolow'             => 'Pels atributs çaijós, vos cal donar un puntatge mai elevat que « non aprobat » per que la version siá considerada coma revista. Per depreciar una version, metètz totes los camps a « non aprobat ».',
	'revreview-update'             => "[[{{MediaWiki:Validationpage}}|Verificatz]] las modificacions efectuadas ''(vejatz çaijós)'' dempuèi que la darrièra version establa es estada [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].  

'''Qualques imatges o modèls son estats meses a jorn :'''",
	'revreview-update-includes'    => "'''Qualques modèls o imatges son estats meses a jorn :'''",
	'revreview-update-none'        => "[[{{MediaWiki:Validationpage}}|Verificatz]] las modificacions efectuadas ''(vejatz çaijós)'' dempuèi que la darrièra version establa es estada [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].",
	'revreview-update-use'         => "'''NÒTA : ''' Se mai d'un d'aquestes modèls o imatges dispausan d’una version establa, alara serà encara utilizada dins sa version establa.",
	'revreview-diffonly'           => "''Per revisar la pagina, clicatz sul ligam « version correnta » e utilizatz lo formulari de revision.''",
	'revreview-visibility'         => 'Aquesta pagina conten una [[{{MediaWiki:Validationpage}}|version establa]],  sos paramètres pòdon èsser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurats].',
	'right-autopatrolother'        => 'Marcar coma patrolhadas las versions dins los espacis de nom exceptat dins lo principal.',
	'right-autoreview'             => 'Marcar automaticament las versions coma visadas',
	'right-movestable'             => 'Desplaçar de paginas establas',
	'right-review'                 => 'Marcar las versions coma visadas',
	'right-stablesettings'         => 'Configurar cossí la version establa es seleccionada puèi afichada',
	'right-validate'               => 'Marcar las versions coma validadas',
	'rights-editor-autosum'        => 'autopromolgut',
	'rights-editor-revoke'         => "a revocat los dreches d'editor de [[$1]]",
	'specialpages-group-quality'   => 'Assegurança de qualitat',
	'stable-logentry'              => 'Las versions establas de [[$1]] son parametradas.',
	'stable-logentry2'             => 'Tornar metre a zèro lo jornal de las versions establas de [[$1]]',
	'stable-logpage'               => 'Jornal de las versions establas',
	'stable-logpagetext'           => 'Vaquí lo jornal de las modificacions per la [[{{MediaWiki:Validationpage}}|version establa]] de la configuracion de las presentas paginas.',
	'tooltip-ca-current'           => "Veire l'esbòs corrent d'aquesta pagina",
	'tooltip-ca-default'           => "Paramètres per l'assegurança-qualitat",
	'tooltip-ca-stable'            => "Veire la version establa d'aquesta pagina",
	'validationpage'               => "{{ns:help}}:Validacion de l'article",
);

/** Polish (Polski)
 * @author Sp5uhe
 * @author Derbeth
 * @author Holek
 */
$messages['pl'] = array(
	'editor'                       => 'Redaktor',
	'flaggedrevs'                  => 'Wersje oznaczone',
	'flaggedrevs-desc'             => 'Daje edytorom i krytykom możliwość oceny edycji i oznaczenia stabilnej wersji strony',
	'flaggedrevs-prefs'            => 'Dopracowanie',
	'group-editor'                 => 'Redaktorzy',
	'group-editor-member'          => 'Redaktor',
	'group-reviewer'               => 'Krytycy',
	'group-reviewer-member'        => 'Krytyk',
	'grouppage-editor'             => '{{ns:project}}:Redaktor',
	'grouppage-reviewer'           => '{{ns:project}}:Krytyk',
	'review-diff2stable'           => 'Pokaż różnicę pomiędzy wersją dopracowaną a ostatnią',
	'review-logentry-app'          => 'zrecenzowany [[$1]]',
	'review-logentry-id'           => 'ID wersji artykułu $1',
	'review-logpage'               => 'Rejestr recenzji artykułów',
	'reviewer'                     => 'Krytyk',
	'revisionreview'               => 'Wersja zrecenzowana',
	'revreview-accuracy'           => 'Dokładność',
	'revreview-accuracy-0'         => 'nieakceptowalna',
	'revreview-accuracy-1'         => 'pobieżnie',
	'revreview-accuracy-2'         => 'dokładnie',
	'revreview-accuracy-3'         => 'dobrze uźródłowione',
	'revreview-accuracy-4'         => 'na medal',
	'revreview-approved'           => 'Zaakceptowane',
	'revreview-auto'               => '(automatycznie)',
	'revreview-auto-w'             => "Edytujesz wersję dopracowaną. Zmiany zostaną '''ocenione automatycznie'''.",
	'revreview-auto-w-old'         => "Edytujesz wersję ocenioną. Zmiany zostaną '''ocenione automatycznie'''.",
	'revreview-current'            => 'Szkic',
	'revreview-depth'              => 'Wyczerpanie tematu',
	'revreview-depth-0'            => 'nieakceptowalne',
	'revreview-depth-1'            => 'podstawowe',
	'revreview-depth-2'            => 'średnie',
	'revreview-depth-3'            => 'wysokie',
	'revreview-depth-4'            => 'na medal',
	'revreview-draft-title'        => 'Szkic artykułu',
	'revreview-edit'               => 'Edytuj szkic',
	'revreview-flag'               => 'Recenzuj tą wersję',
	'revreview-invalid'            => "'''Niewłaściwy obiekt:''' brak [[{{MediaWiki:Validationpage}}|zrecenzowanych]] wersji odpowiadających podanemu ID.",
	'revreview-log'                => 'Komentarz',
	'revreview-noflagged'          => "Brak zweryfikowanej przez krytyka wersji tej strony, możliwe że jakość merytoryczna '''nie''' została [[{{MediaWiki:Validationpage}}|sprawdzona]].",
	'revreview-notes'              => 'Obserwacje lub uwagi do wyświetlenia:',
	'revreview-oldrating'          => 'Uzyskana ocena:',
	'revreview-patrol'             => 'Oznacz tą zmianę jako sprawdzoną',
	'revreview-patrol-title'       => 'Oznacz jako sprawdzone',
	'revreview-patrolled'          => 'Wybrana wersja [[:$1|$1]] została oznaczona jako spatrolowana.',
	'revreview-quick-invalid'      => "'''Nieprawidłowy ID wersji artykułu'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Bieżąca wersja]]''' (brak recenzji)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Stabilna]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobacz szkic]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Stabilna]]''' (brak niesprawdzonych wersji)",
	'revreview-quick-see-basic'    => "'''Szkic''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobacz artykuł]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} porównaj])",
	'revreview-quick-see-quality'  => "'''Szkic''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobacz artykuł]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} porównaj])",
	'revreview-source'             => 'źródło szkicu',
	'revreview-stable'             => 'Strona dopracowana',
	'revreview-style'              => 'Czytelność',
	'revreview-style-0'            => 'nieakceptowalna',
	'revreview-style-1'            => 'akceptowalna',
	'revreview-style-2'            => 'dobra',
	'revreview-style-3'            => 'zwięźle',
	'revreview-style-4'            => 'na medal',
	'revreview-submit'             => 'Zapisz ocenę',
	'revreview-toggle-title'       => 'pokaż/ukryj szczegóły',
	'revreview-update-use'         => "'''UWAGA:''' Jeśli którykolwiek z tych szablonów lub grafik posiadają wersję dopracowaną zostanie ona użyta w wersji dopracowanej tej strony.",
	'revreview-visibility'         => "'''Ta strona ma [[{{MediaWiki:Validationpage}}|dopracowaną wersję]], dla której można
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} skonfigurować ustawienia].'''",
	'right-movestable'             => 'Przenieś strony dopracowane',
	'right-stablesettings'         => 'Określ sposób, w jaki wersja dopracowana ma być wybierana i wyświetlana',
	'rights-editor-revoke'         => 'odebrał uprawnienia edytora [[$1]]',
	'stable-logpage'               => 'Rejestr wersji dopracowanych',
	'tooltip-ca-current'           => 'Zobacz aktualny szkic tej strony',
	'tooltip-ca-default'           => 'Ustawienia mechanizmu zapewnienia jakości artykułów',
	'tooltip-ca-stable'            => 'Zobacz dopracowaną wersję tej strony',
	'validationpage'               => '{{ns:help}}:Recenzja artykułu',
);

/** Piedmontese (Piemontèis)
 * @author Bèrto 'd Sèra
 * @author Siebrand
 */
$messages['pms'] = array(
	'editor'                      => 'Redator',
	'flaggedrevs'                 => 'Revision marcà',
	'group-editor'                => 'Redator',
	'group-editor-member'         => 'Redator',
	'group-reviewer'              => 'Revisor',
	'group-reviewer-member'       => 'Revisor',
	'grouppage-editor'            => '{{ns:project}}:Redator',
	'grouppage-reviewer'          => '{{ns:project}}:Revisor',
	'hist-quality'                => 'qualità',
	'hist-stable'                 => 'vardà',
	'review-diff2stable'          => "Diferensa da 'nt l'ùltima version stàbila",
	'review-logentry-app'         => 'controlà [[$1]]',
	'review-logentry-dis'         => 'depressà na version ëd [[$1]]',
	'review-logentry-id'          => 'Nùmer ëd revision $1',
	'review-logpage'              => "Registr dij contròj dj'artìcoj",
	'review-logpagetext'          => "Sossì a l'é un registr dle modìfiche dlë stat d'[[{{MediaWiki:Makevalidate-page}}|aprovassion]] 
	dle pàgine ëd contnù.",
	'reviewer'                    => 'Revisor',
	'revisionreview'              => 'Revisioné le version',
	'revreview-accuracy'          => 'Cura',
	'revreview-accuracy-0'        => 'Pa aprovà',
	'revreview-accuracy-1'        => 'Vardà',
	'revreview-accuracy-2'        => 'Curà',
	'revreview-accuracy-3'        => 'Bon-e sorgiss',
	'revreview-accuracy-4'        => 'Premià',
	'revreview-auto'              => '(aotomàtich)',
	'revreview-auto-w'            => "A l'é antramentr ch'a-i fa dle modìfiche ansima a la version stàbila, tute le modìfiche a saran '''controlà n<nowiki>'</nowiki>aotomàtich'''. A peul ëvnì a taj vardé na preuva dla pàgina anans che fé che salvé.",
	'revreview-auto-w-old'        => "A l'é antramentr ch'a-i fa dle modìfiche ansima a na revision veja, tute le modìfiche a saran '''controlà n<nowiki>'</nowiki>aotomàtich'''. A peul ëvnì a taj vardé na preuva dla pàgina anans che fé che salvé.",
	'revreview-basic'             => "Costa-sì a l'é l'ùltima version [[{{MediaWiki:Validationpage}}|vardà]] dla pàgina,
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] dël <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]
	për sòlit as peul [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifichesse] e a l'é pì agiornà. A-i {{PLURAL:$3|é $3 revision|son $3 version}}
	([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modìfiche]) ch'a speto d'esse vardà.",
	'revreview-changed'           => "'''L'arcesta a l'é nen podusse sodisfé për lòn ch'a toca sta revision-sì.'''
	
	A puel esse ch'a sia ciamasse në stamp ò na figura sensa ch'a fussa butasse la version. Sòn a peul rivé quand në 
	stamp dinàmich a transclud na figura ò n'àotr ëstamp conforma a na variàbil dont contnù a peul esse cambià da  
	quand a l'ha anandiasse a vardé sta pàgina-sì. Carié torna la pàgina e anandiesse da zero a peul arsolve la gran-a.",
	'revreview-current'           => 'Version corenta',
	'revreview-depth'             => 'Ancreus',
	'revreview-depth-0'           => 'Pa aprovà',
	'revreview-depth-1'           => 'Mìnim',
	'revreview-depth-2'           => 'Mes',
	'revreview-depth-3'           => 'Bon',
	'revreview-depth-4'           => 'Premià',
	'revreview-edit'              => 'Modifiché la bruta',
	'revreview-flag'              => 'Revisioné sta version',
	'revreview-legend'            => "Deje 'l vot al contnù dla version:",
	'revreview-log'               => 'Coment për ël registr:',
	'revreview-main'              => "Për podej revisioné a venta ch'as selession-a na version ëd na pàgina ëd contnù. 

	Ch'a varda [[Special:Unreviewedpages|da revisioné]] për na lista ëd pàgine ch'a speto na revision.",
	'revreview-newest-basic'      => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ùltima version vardà]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vardeje tute]) dë sta pàgina-sì a l'é staita [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà]
	 dël <i>$2</i>. <br /> A-i {{PLURAL:$3|é|son}} $3 version ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modìfiche]) ch'a speto na revision.",
	'revreview-newest-quality'    => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ùltim vot ëd qualità]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vardeje tuti]) dë sta pàgina-sì a l'é stait [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà]
	 dël <i>$2</i>. <br /> A-i {{PLURAL:$3|é|son}} $3 version ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modìfiche]) ch'a speto d'esse revisionà.",
	'revreview-noflagged'         => "A-i é pa gnun-a version revisionà dë sta pàgina-sì, donca a l'é belfé ch'a la sia '''nen''' staita
	[[{{MediaWiki:Validationpage}}|controlà]] coma qualità.",
	'revreview-note'              => "[[User:$1]] a l'ha buta-ie ste nòte-sì a la revision, antramentr ch'a la [[{{MediaWiki:Validationpage}}|controlava]]:",
	'revreview-notes'             => 'Osservation ò nòte da smon-e:',
	'revreview-oldrating'         => "A l'é stait giudicà për:",
	'revreview-quality'           => "Costa-sì a l'é l'ùltima revision ëd [[{{MediaWiki:Validationpage}}|qualità]] dë sta pàgina, e a l'é staita
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] dël <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]
	për sòlit as peul [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modifichesse] e a l'é pì agiornà. A-i {{PLURAL:$3|é|son}} $3 version
	([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modìfiche]) da revisioné.",
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|Vardà]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]]",
	'revreview-quick-none'        => "'''Corenta'''. Pa gnun-a version revisionà.",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|Qualità]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} version corenta]]",
	'revreview-quick-see-basic'   => "'''Corenta'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ùltima version vardà]",
	'revreview-quick-see-quality' => "'''Corenta'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ùltima version votà për qualità]",
	'revreview-selected'          => "Version selessionà ëd '''$1:'''",
	'revreview-source'            => 'sorgiss dla bruta',
	'revreview-stable'            => 'Version stàbila',
	'revreview-style'             => 'Belfé da lese',
	'revreview-style-0'           => 'Pa aprovà',
	'revreview-style-1'           => 'A peul andé',
	'revreview-style-2'           => 'Bon-a',
	'revreview-style-3'           => 'Concisa',
	'revreview-style-4'           => 'Premià',
	'revreview-submit'            => 'Buta la revision',
	'revreview-text'              => "Për sòlit pitòst che nen j'ùltime, as ësmon-o për contnù le version stàbij.",
	'revreview-toggle'            => '(visca/dësmòrta ij detaj)',
	'revreview-toolow'            => 'A venta ch\'a buta tuti j\'atribut ambelessì sota almanch pì àot che "pa aprovà" përché
	na version ës conta da revisionà. Për dëspresié na version ch\'a-i buta tuti ij camp a "pa aprovà".',
	'revreview-update'            => "Për piasì, ch'a contròla le modìfiche (smonùe ambelessì sota) faite da quand a l'é staita publicà la revision stàbila dla pàgina. A son stait modificà ëdcò jë stamp e le figure smonùe ambelessì dapress:",
	'revreview-update-none'       => "Për piasì, ch'a contròla le modìfiche (smonùe ambelessì sota) faite da quand a l'é staita publicà la revision stàbila dla pàgina.",
	'revreview-visibility'        => "Sta pàgina-sì a l'ha na [[{{MediaWiki:Validationpage}}|version stàbila]], ch'as peul [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} regolesse].",
	'rights-editor-revoke'        => 'gava-je la qualìfica ëd redator a [[$1]]',
	'stable-logentry'             => 'regolà la version stàbila ëd [[$1]]',
	'stable-logentry2'            => 'azerà la version stàbila për [[$1]]',
	'stable-logpage'              => 'Registr dle version stàbij',
	'stable-logpagetext'          => "Cost-sì a l'é un registr dle modìfiche faite a la regolassion dla [[{{MediaWiki:Validationpage}}|version stàbil]] dle pàgine ëd contnù.",
	'tooltip-ca-current'          => 'Vardé la bruta corenta dë sta pàgina-sì',
	'tooltip-ca-default'          => 'Regolassion dij Contròj ëd Qualità',
	'tooltip-ca-stable'           => 'Vardé la version stàbila dla pàgina',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'group-reviewer'        => 'مخکتونکي',
	'group-reviewer-member' => 'مخکتونکی',
	'reviewer'              => 'مخکتونکی',
	'revreview-auto'        => '(خپلسري)',
	'revreview-current'     => 'ګارلیک',
	'revreview-source'      => 'د ګارليک سرچينه',
	'revreview-style-1'     => 'د منلو وړ',
	'tooltip-ca-current'    => 'د همدې مخ اوسنی ګارليک ښکاره کول',
);

/** Portuguese (Português)
 * @author 555
 * @author Malafaya
 * @author Siebrand
 */
$messages['pt'] = array(
	'editor'                       => 'Editor',
	'flaggedrevs'                  => 'Edições Analisadas',
	'flaggedrevs-backlog'          => "Há actualmente um acúmulo de [[Special:OldReviewedPages|páginas analisadas desatualizadas]]. '''A sua ajuda será bem-vinda!'''",
	'flaggedrevs-desc'             => 'Dá aos {{int:group-editor}} e aos {{int:group-reviewer}} a possibilidade de verificarem edições e estabilizarem páginas',
	'flaggedrevs-pref-UI-0'        => 'Utilizar a interface de edições estáveis detalhada',
	'flaggedrevs-pref-UI-1'        => 'Utilizar a interface de edições estáveis simples',
	'flaggedrevs-prefs'            => 'Estabilidade',
	'flaggedrevs-prefs-stable'     => 'Sempre exibir a edição estável de uma página como conteúdo padrão (caso exista uma)',
	'flaggedrevs-prefs-watch'      => 'Adicionar páginas analisadas por mim à minha lista de artigos vigiados',
	'group-editor'                 => 'Editores',
	'group-editor-member'          => 'Editor',
	'group-reviewer'               => 'Críticos',
	'group-reviewer-member'        => 'Crítico',
	'grouppage-editor'             => '{{ns:project}}:{{int:group-editor}}',
	'grouppage-reviewer'           => '{{ns:project}}:{{int:group-reviewer}}',
	'hist-draft'                   => 'edição de rascunho',
	'hist-quality'                 => 'edição confiável',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validada] por [[User:$3|$3]]',
	'hist-stable'                  => 'edição analisada',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} analisada] por [[User:$3|$3]]',
	'review-diff2stable'           => 'Ver alterações entre a edição estável e a actual',
	'review-logentry-app'          => 'analisou [[$1]]',
	'review-logentry-dis'          => 'rebaixou uma edição de [[$1]]',
	'review-logentry-id'           => 'ID de edição: $1',
	'review-logentry-diff'         => 'diferenças da versão estável',
	'review-logpage'               => 'Registo de análise de edições',
	'review-logpagetext'           => 'Este é um registo de alterações nas [[{{MediaWiki:Validationpage}}|análises]] de páginas de conteúdo.
Veja a [[Special:ReviewedPages|lista de páginas analisadas]] para uma listagem de páginas aprovadas.',
	'reviewer'                     => 'Crítico',
	'revisionreview'               => 'Analisar edições',
	'revreview-accuracy'           => 'Precisão',
	'revreview-accuracy-0'         => 'Rejeitada',
	'revreview-accuracy-1'         => 'Objetiva',
	'revreview-accuracy-2'         => 'Precisa',
	'revreview-accuracy-3'         => 'Bem referenciada',
	'revreview-accuracy-4'         => 'Exemplar',
	'revreview-approved'           => 'Aprovada',
	'revreview-auto'               => '(automático)',
	'revreview-auto-w'             => "Você está editando a edição estável. As alterações serão '''automaticamente tidas como revistas'''.",
	'revreview-auto-w-old'         => "Você está editando uma edição revista. As alterações serão '''automaticamente tidas como revistas'''.",
	'revreview-basic'              => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|analisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|alteração|alterações}}] aguardando revisão.',
	'revreview-basic-i'            => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|analisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} alterações em imagens/predefinições] que necessitam de revisão.',
	'revreview-basic-old'          => 'Esta é uma [[{{MediaWiki:Validationpage}}|edição analisada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
É possível que novas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} alterações] tenham sido feitas.',
	'revreview-basic-same'         => 'Esta é a última edição [[{{MediaWiki:Validationpage}}|analisada]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.',
	'revreview-basic-source'       => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} edição verificada] desta página, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>, foi baseada nesta edição.',
	'revreview-changed'            => "'''A acção seleccionada não pôde ser executada nesta edição de [[:$1|$1]].'''

Uma predefinição ou imagem pode ter sido requisitada sem uma edição específica ter sido informada.
Isso pode ocorrer quando uma predefinição dinâmica faz transclusão de outra imagem ou predefinição através de uma variável que pode ter sido alterada enquanto era feita a análise desta página.
Recarregar a página e enviar uma nova análise talvez seja suficiente para contornar este contratempo.",
	'revreview-current'            => 'Rascunho',
	'revreview-depth'              => 'Profundidade',
	'revreview-depth-0'            => 'Rejeitada',
	'revreview-depth-1'            => 'Básica',
	'revreview-depth-2'            => 'Moderada',
	'revreview-depth-3'            => 'Alta',
	'revreview-depth-4'            => 'Exemplar',
	'revreview-draft-title'        => 'Rascunho de página',
	'revreview-edit'               => 'Editar rascunho',
	'revreview-edited'             => "'''As alterações serão incorporadas na [[{{MediaWiki:Validationpage}}|edição estável]] quando forem analisadas por um utilizador \"estabelecido\".
O ''rascunho'' é mostrado a seguir.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=\$1&diff=cur}} \$2 {{PLURAL:\$2|alteração aguarda|alterações aguardam}}] revisão.",
	'revreview-flag'               => 'Analise esta edição',
	'revreview-invalid'            => "'''Destino inválido:''' não há [[{{MediaWiki:Validationpage}}|edições verificadas]] correspondentes ao ID fornecido.",
	'revreview-legend'             => 'Avaliar conteúdo da edição',
	'revreview-log'                => 'Comentário:',
	'revreview-main'               => 'Você precisa seleccionar uma edição específica de uma página de conteúdo para poder analisá-la.

Veja [[{{ns:special}}:Unreviewedpages]] para uma listagem de páginas ainda não revistas.',
	'revreview-newest-basic'       => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição analisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|alteração|alterações}}] {{PLURAL:$3|necessita|necessitam}} revisão.',
	'revreview-newest-basic-i'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição analisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} As alterações em imagens/predefinições] necessitam de revisão.',
	'revreview-newest-quality'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição confiável] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|alteração|alterações}}] {{PLURAL:$3|necessita|necessitam}} revisão.',
	'revreview-newest-quality-i'   => 'A [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} mais recente edição confiável] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]) foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>. 
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} As alterações em imagens/predefinições] necessitam de revisão.',
	'revreview-noflagged'          => "Esta página não possui edições analisadas. Talvez ainda '''não''' tenha sido [[{{MediaWiki:Validationpage}}|verificada]] a sua qualidade.",
	'revreview-note'               => '[[User:$1|$1]] deixou as seguintes observações ao [[{{MediaWiki:Validationpage}}|analisar]] esta edição:',
	'revreview-notes'              => 'Observações ou notas a serem exibidas:',
	'revreview-oldrating'          => 'Esteve avaliada como:',
	'revreview-patrol'             => 'Marcar esta alteração como patrulhada',
	'revreview-patrol-title'       => 'Marcar como patrulhada',
	'revreview-patrolled'          => 'A edição seleccionada de [[:$1|$1]] foi marcada como patrulhada.',
	'revreview-quality'            => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|confiável]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|alteração|alterações}}] aguardando revisão.',
	'revreview-quality-i'          => 'Esta é a mais recente edição [[{{MediaWiki:Validationpage}}|confiável]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
O [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} rascunho] possui [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} alterações em imagens/predefinições] que necessitam de revisão.',
	'revreview-quality-old'        => 'Esta é uma [[{{MediaWiki:Validationpage}}|edição confiável]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.
É possível que novas [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} alterações] tenham sido feitas.',
	'revreview-quality-same'       => 'Esta é a última edição [[{{MediaWiki:Validationpage}}|confiável]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} listar todas]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>.',
	'revreview-quality-source'     => 'A [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} edição confiável] desta página, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] em <i>$2</i>, foi baseada nesta edição.',
	'revreview-quality-title'      => 'Página confiável',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Página analisada]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver rascunho]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Página analisada]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver rascunho]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Página analisada]]'''",
	'revreview-quick-invalid'      => "'''ID de edição inválido'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Edição actual]]''' (não-analisada)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Página confiável]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver rascunho]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Página confiável]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ver rascunho]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Página confiável]]'''",
	'revreview-quick-see-basic'    => "'''Rascunho''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver página]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} comparar])",
	'revreview-quick-see-quality'  => "'''Rascunho''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ver página]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} comparar])",
	'revreview-selected'           => "Edição seleccionada de '''$1:'''",
	'revreview-source'             => 'código do rascunho',
	'revreview-stable'             => 'Página estável',
	'revreview-stable-title'       => 'Página analisada',
	'revreview-stable1'            => 'Talvez você deseje ver [{{fullurl:$1|stableid=$2}} esta edição analisada] ou a [{{fullurl:$1|stable=1}} edição estável] desta página.',
	'revreview-stable2'            => 'Você talvez deseje ver a [{{fullurl:$1|stable=1}} edição estável] desta página (caso ainda aja uma).',
	'revreview-style'              => 'Inteligibilidade',
	'revreview-style-0'            => 'Rejeitada',
	'revreview-style-1'            => 'Aceitável',
	'revreview-style-2'            => 'Boa',
	'revreview-style-3'            => 'Concisa',
	'revreview-style-4'            => 'Exemplar',
	'revreview-submit'             => 'Enviar análise',
	'revreview-successful'         => "'''A edição seleccionada de [[:$1|$1]] foi analisada com sucesso.
([{{fullurl:Special:Stableversions|page=$2}} ver todas as edições analisadas])'''",
	'revreview-successful2'        => "'''A edição seleccionada de [[:$1|$1]] teve sua análise removida com sucesso.'''",
	'revreview-text'               => "'''As [[{{MediaWiki:Validationpage}}|edições estáveis]] são exibidas por padrão no lugar de edições mais recentes.'''",
	'revreview-text2'              => "''As [[{{MediaWiki:Validationpage}}|edições estáveis]] são edições em páginas que foram verificadas e que podem ser configuradas como conteúdo padrão a ser exibido.''",
	'revreview-toggle-title'       => 'mostrar/esconder detalhes',
	'revreview-toolow'             => 'Você precisará atribuir, em cada um dos atributos, valores mais altos do que "rejeitada" para que uma edição seja considerada aprovada.

Para rebaixar uma edição, defina todos os atributos como "rejeitada".',
	'revreview-update'             => "Por favor, [[{{MediaWiki:Validationpage}}|reveja]] quaisquer alterações ''(exibidas abaixo)'' feitas desde que a edição estável foi [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].<br />
'''Algumas predefinições/imagens foram actualizadas: '''",
	'revreview-update-includes'    => "'''Algumas predefinições/imagens foram actualizadas:'''",
	'revreview-update-none'        => "Por favor, [[{{MediaWiki:Validationpage}}|reveja]] quaisquer alterações ''(exibidas abaixo)'' feitas desde que a edição estável foi [{{fullurl:{{ns:special}}:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada].",
	'revreview-update-use'         => "'''NOTA:''' Se alguma destas predefinições/imagens possui uma versão estável, então esta já é usada na versão estável desta página.",
	'revreview-visibility'         => "'''Esta página possui uma [[{{MediaWiki:Validationpage}}|edição estável]]; os parâmetros disso podem ser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurados].'''",
	'right-autopatrolother'        => 'Marcar automaticamente as edições de espaços nominais "secundários" como patrulhadas',
	'right-autoreview'             => 'Marcar automaticamente as edições como analisadas',
	'right-movestable'             => 'Mover páginas estáveis',
	'right-review'                 => 'Definir edições como analisadas',
	'right-stablesettings'         => 'Configurar como a edição estável é definida e exibida',
	'right-validate'               => 'Definir edições como confiáveis',
	'rights-editor-autosum'        => 'auto-promovido',
	'rights-editor-revoke'         => 'removidos privilégios de {{int:group-editor-member}} para [[$1]]',
	'specialpages-group-quality'   => 'Garantia de qualidade',
	'stable-logentry'              => 'a versão estável de [[$1]] foi configurada',
	'stable-logentry2'             => 'zerar a forma de definir versões estáveis de [[$1]]',
	'stable-logpage'               => 'Registo de edições estáveis',
	'stable-logpagetext'           => 'Este é um registo de modificações nas configurações das [[{{MediaWiki:Validationpage}}|edições estáveis]] das páginas de conteúdo.
Uma lista de páginas com conteúdo estabilizado pode ser encontrada na [[Special:StablePages|lista de páginas estáveis]].',
	'tooltip-ca-current'           => 'Ver o rascunho actual desta página',
	'tooltip-ca-default'           => 'Configurações da Garantia de Qualidade',
	'tooltip-ca-stable'            => 'Ver a edição estável desta página',
	'validationpage'               => '{{ns:help}}:Validação de páginas',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 * @author Siebrand
 */
$messages['ru'] = array(
	'editor'                       => 'Досматривающий',
	'flaggedrevs'                  => 'Отмеченные версии',
	'flaggedrevs-backlog'          => "Существует отставание в проверке страниц, см. [[Special:OldReviewedPages|Устаревшие проверенные страницы]]. '''Пожалуйста, обратите внимание!'''",
	'flaggedrevs-desc'             => 'Предоставление возможности редакторам/рецензентам проверять версии страниц и устанавливать стабильные версии',
	'flaggedrevs-pref-UI-0'        => 'Использовать подробный интерфейс стабильных версий',
	'flaggedrevs-pref-UI-1'        => 'Использовать простой интерфейс стабильных версий',
	'flaggedrevs-prefs'            => 'Стабилизация',
	'flaggedrevs-prefs-stable'     => 'Всегда показывать стабильную версию по умолчанию (если таковая существует)',
	'flaggedrevs-prefs-watch'      => 'Добавлять проверенные мною страницы в список наблюдения',
	'group-editor'                 => 'Досматривающие',
	'group-editor-member'          => 'досматривающий',
	'group-reviewer'               => 'Выверяющие',
	'group-reviewer-member'        => 'выверяющий',
	'grouppage-editor'             => '{{ns:project}}:Досматривающий',
	'grouppage-reviewer'           => '{{ns:project}}:Выверяющий',
	'hist-draft'                   => 'черновая версия',
	'hist-quality'                 => 'выверенная версия',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} выверена] участником [[User:$3|$3]]',
	'hist-stable'                  => 'досмотренная версия',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} досмотрена] участником [[User:$3|$3]]',
	'review-diff2stable'           => 'Показать различия между стабильной и текущей версиями',
	'review-logentry-app'          => 'проверена [[$1]]',
	'review-logentry-dis'          => 'устаревшая версия [[$1]]',
	'review-logentry-id'           => 'идентификатор версии $1',
	'review-logentry-diff'         => 'разница со стабильной',
	'review-logpage'               => 'Журнал проверок',
	'review-logpagetext'           => 'Это журнал изменений [[{{MediaWiki:Validationpage}}|утверждённых]] статусов версий страниц.
См. [[Special:ReviewedPages|список проверенных страниц]].',
	'reviewer'                     => 'выверяющий',
	'revisionreview'               => 'Проверка версий',
	'revreview-accuracy'           => 'Точность',
	'revreview-accuracy-0'         => 'не указана',
	'revreview-accuracy-1'         => 'досмотрена',
	'revreview-accuracy-2'         => 'точная',
	'revreview-accuracy-3'         => 'с источниками',
	'revreview-accuracy-4'         => 'избранная',
	'revreview-approved'           => 'Проверена',
	'revreview-auto'               => '(автоматически)',
	'revreview-auto-w'             => "Вы правите стабильную версию, изменения будут '''автоматически отмечены как проверенные'''.",
	'revreview-auto-w-old'         => "Вы правите проверенную версию, изменения будут '''автоматически отмечены как проверенные'''.",
	'revreview-basic'              => 'Это последняя [[{{MediaWiki:Validationpage}}|досмотренная]] версия; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|правка|правки|правок}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновика] {{PLURAL:$3|ожидает|ожидают|ожидают}} проверки.',
	'revreview-basic-i'            => 'Это последняя [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} досмотренная] версия; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
В [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновике] есть требующие проверки [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}}изменения в шаблонах или изображениях].',
	'revreview-basic-old'          => 'Это [[{{MediaWiki:Validationpage}}|досмотренная]] версия ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>.
Могли быть сделаны новые [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} правки].',
	'revreview-basic-same'         => 'Это последняя [[{{MediaWiki:Validationpage}}|досмотренная]] версия ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]); [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.',
	'revreview-basic-source'       => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Досмотренная версия] этой страницы, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>, была основана на этой версии.',
	'revreview-changed'            => "'''Запрошенное действие не может быть выполнено с этой версией страницы [[:$1|$1]].'''

Возможно, шаблон или изображение были запрошены без указания конкретной версии.
Это могло случиться, если динамический шаблон включает другой шаблон или изображение, зависящие от переменной, которая изменилась с момента начала проверки.
Обновите страницу и начните проверку заново, это может снять проблему.",
	'revreview-current'            => 'Черновик',
	'revreview-depth'              => 'Полнота',
	'revreview-depth-0'            => 'не указана',
	'revreview-depth-1'            => 'базовая',
	'revreview-depth-2'            => 'средняя',
	'revreview-depth-3'            => 'высокая',
	'revreview-depth-4'            => 'избранная',
	'revreview-draft-title'        => 'Черновик статьи',
	'revreview-edit'               => 'Править черновик',
	'revreview-edited'             => "'''Правки будут включены в [[{{MediaWiki:Validationpage}}|стабильную версию]] после проверки участниками с соответствующими правами.
''Черновик'' показан ниже.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|правка ожидает|правки ожидают|правок ожидают}}] проверки.",
	'revreview-flag'               => 'Проверить эту версию',
	'revreview-invalid'            => "'''Ошибочная цель:''' не существует [[{{MediaWiki:Validationpage}}|проверенной]] версии страницы, соответствующей указанному идентификатору.",
	'revreview-legend'             => 'Оценки содержания версии',
	'revreview-log'                => 'Примечание:',
	'revreview-main'               => 'Вы должны выбрать одну из версий страницы для проверки.

См. список непроверенных страниц на [[Special:Unreviewedpages]].',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя досмотренная версия] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]) была [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|правка|правки|правок}}] {{PLURAL:$3|требует|требуют|требуют}} проверки.',
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя досмотренная версия] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]);  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
Требуется проверка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} изменений в шаблонах или изображениях].',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя выверенная версия] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]) была [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} отмечена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|правка|правки|правок}}] {{PLURAL:$3|требует|требуют|требуют}} проверки.',
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Последняя выверенная версия] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]);  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
Требуется проверка [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} изменений в шаблонах или изображениях].',
	'revreview-noflagged'          => "У этой страницы нет отрецензированных версий, вероятно, её качество '''не''' [[{{MediaWiki:Validationpage}}|оценивалось]].",
	'revreview-note'               => '[[Участник:$1]] сделал следующее замечание, [[{{MediaWiki:Validationpage}}|проверяя]] эту версию:',
	'revreview-notes'              => 'Наблюдения и замечания для отображения:',
	'revreview-oldrating'          => 'Была оценена:',
	'revreview-patrol'             => 'Отметить это изменение как проверенное',
	'revreview-patrol-title'       => 'Отметить как патрулированную',
	'revreview-patrolled'          => 'Выбранная версия [[:$1|$1]] была отмечена как патрулированная.',
	'revreview-quality'            => 'Это последняя [[{{MediaWiki:Validationpage}}|выверенная]] версия; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|правка|правки|правок}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновика] {{PLURAL:$3|ожидает|ожидают|ожидают}} проверки.',
	'revreview-quality-i'          => 'Это последняя [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} выверенная] версия; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.
В [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновике] есть требующие проверки [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}}изменения в шаблонах или изображениях].',
	'revreview-quality-old'        => 'Это [[{{MediaWiki:Validationpage}}|выверенная]] версия ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>.
Могли быть сделаны новые [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} правки].',
	'revreview-quality-same'       => 'Это последняя [[{{MediaWiki:Validationpage}}|выверенная]] версия ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} список всех]); [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверена] <i>$2</i>.',
	'revreview-quality-source'     => '[{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} Выверенная версия] этой страницы, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} проверенная] <i>$2</i>, была основана на этой версии.',
	'revreview-quality-title'      => 'Выверенная статья',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Досмотренная статья]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Досмотренная статья]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Досмотренная статья]]'''",
	'revreview-quick-invalid'      => "'''Ошибочный идентификатор версии страницы'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Текущая версия]]''' (не проверялась)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Выверенная статья]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Выверенная статья]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} показать черновик]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Выверенная статья]]'''",
	'revreview-quick-see-basic'    => "'''Черновик''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показать статью]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} сравнить])",
	'revreview-quick-see-quality'  => "'''Черновик''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} показать статью]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} сравнить])",
	'revreview-selected'           => "Выбранная версия '''$1:'''",
	'revreview-source'             => 'исходный текст черновика',
	'revreview-stable'             => 'Стабильная страница',
	'revreview-stable-title'       => 'Досмотренная статья',
	'revreview-stable1'            => 'Возможно, вы хотите просмотреть [{{fullurl:$1|stableid=$2}} эту отмеченную версию] или [{{fullurl:$1|stable=1}} стабильную версию] этой страницы, если такая существует.',
	'revreview-stable2'            => 'Возможно, вы хотите просмотреть эту [{{fullurl:$1|stable=1}} стабильную версию] этой страницы (если таковая существует).',
	'revreview-style'              => 'Читаемость',
	'revreview-style-0'            => 'не указана',
	'revreview-style-1'            => 'приемлемая',
	'revreview-style-2'            => 'хорошая',
	'revreview-style-3'            => 'немногословно',
	'revreview-style-4'            => 'избранная',
	'revreview-submit'             => 'Отправить проверку',
	'revreview-successful'         => "'''Выбранная версия [[:$1|$1]] успешно отмечена ([{{fullurl:Special:Stableversions|page=$2}} просмотр всех отмеченных версий])'''",
	'revreview-successful2'        => "'''С выбранной версии [[:$1|$1]] успешно снята пометка.'''",
	'revreview-text'               => "''По умолчанию установлен показ [[{{MediaWiki:Validationpage}}|стабильных версий]] страниц, а не наиболее новых.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Стабильные версии]] — это проверенные версии страниц, могут быть установлены для показа по умолчанию.''",
	'revreview-toggle-title'       => 'показать/скрыть подробности',
	'revreview-toolow'             => 'Вы должны указать для всех значений уровень выше, чем «не указана», чтобы версия страницы считалась проверенной. Чтобы сбросить флаг проверки, установите все значения в «не указана».',
	'revreview-update'             => "Пожалуйста, [[{{MediaWiki:Validationpage}}|проверьте]] правки ''(показаны ниже)'', сделанные после [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} установки] стабильной версии.<br />
'''Некоторые шаблоны или изображения были обновлены:'''",
	'revreview-update-includes'    => "'''Некоторые шаблоны или изображения были обновлены:'''",
	'revreview-update-none'        => "Пожалуйста, [[{{MediaWiki:Validationpage}}|проверьте]] правки ''(показаны ниже)'', сделанные после [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} установки] стабильной версии.",
	'revreview-update-use'         => "'''ЗАМЕЧАНИЕ.''' Если какой-либо из этих шаблонов или изображений имеет стабильную версию, то она уже используется в стабильной версии этой страницы.",
	'revreview-diffonly'           => "''Чтобы проверить статью, нажмите на ссылку «текущая версия» и используйте форму проверки.''",
	'revreview-visibility'         => "'''Эта страница имеет [[{{MediaWiki:Validationpage}}|стабильную версию]], которая может быть [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} настроена].'''",
	'right-autopatrolother'        => 'автоматическая отметка версий страниц в неосновном пространстве имён как патрулированных',
	'right-autoreview'             => 'автоматическая отметка версий страниц как досмотренных',
	'right-movestable'             => 'переименование чистовых версий',
	'right-review'                 => 'отметка версий страниц как досмотренных',
	'right-stablesettings'         => 'настройка выбора и показа чистовой версии',
	'right-validate'               => 'отметка версий страниц как выверенных',
	'rights-editor-autosum'        => 'автоназначение',
	'rights-editor-revoke'         => 'снял статус досматривающего с [[$1]]',
	'specialpages-group-quality'   => 'Поддержка качества',
	'stable-logentry'              => 'установил стабильное версионирование для [[$1]]',
	'stable-logentry2'             => 'сбросил чистовое версионирование для [[$1]]',
	'stable-logpage'               => 'Журнал стабилизаций',
	'stable-logpagetext'           => 'Это журнал изменений настроек [[{{MediaWiki:Validationpage}}|стабильных версий]] страниц.
См. также  [[Special:StablePages|список стабильных страниц]].',
	'tooltip-ca-current'           => 'Просмотреть текущий черновик этой страницы',
	'tooltip-ca-default'           => 'Настройки контроля качества',
	'tooltip-ca-stable'            => 'Показать стабильную версию этой страницы',
	'validationpage'               => '{{ns:help}}:Проверка статьи',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 * @author Siebrand
 */
$messages['sah'] = array(
	'editor'                       => 'Көннөрөөччү',
	'flaggedrevs'                  => 'Бэлиэтэммит торумнар',
	'flaggedrevs-desc'             => 'Эрэдээктэрдэргэ/ырытааччыларга сирэй торумнарын уонна сирэй стабилизациятын бигэргэтэр кыаҕы биэрэр',
	'group-editor'                 => 'Көннөрөөччүлэр',
	'group-editor-member'          => 'көннөрөөччү',
	'group-reviewer'               => 'Рецензеннар',
	'group-reviewer-member'        => 'рецензент',
	'grouppage-editor'             => '{{ns:project}}:Көннөрөөччү',
	'grouppage-reviewer'           => '{{ns:project}}:Рецензент',
	'hist-quality'                 => 'үрдүк хаачыстыбалаах торум',
	'hist-stable'                  => 'торум көрүлүннэ/көрүллүбүт',
	'review-diff2stable'           => 'Чистовой уонна саҥа торумнар уратыларын көрүү',
	'review-logentry-app'          => 'ырытыллынна/ырытыллыбыт [[$1]]',
	'review-logentry-dis'          => '[[$1]] эргэрбит торума',
	'review-logentry-id'           => '$1 торумун идентификатора',
	'review-logpage'               => 'Рецензиялар сурунааллара',
	'review-logpagetext'           => 'Бу сирэйдэр торумнарын [[{{MediaWiki:Validationpage}}|бигэргэтиллибит]] уларытыыларын сурунаала.',
	'reviewer'                     => 'Рецензент',
	'revisionreview'               => 'Торумнары ырытыы',
	'revreview-accuracy'           => 'Чопчута',
	'revreview-accuracy-0'         => 'Бигэргэтиллибэтэх',
	'revreview-accuracy-1'         => 'Көрүллүбүт',
	'revreview-accuracy-2'         => 'Чопчу',
	'revreview-accuracy-3'         => 'Источниктардаах',
	'revreview-accuracy-4'         => 'Талыы-талба',
	'revreview-auto'               => '(аптамаатынан)',
	'revreview-auto-w'             => "Чистовой торуму уларытан эрэҕин; туох баар уларытыылар '''аптамаатынан бэрэбиэркэлэммит курдук бэлиэтэниэхтэрэ'''. Уларытыыны бигэргэтиэх иннинэ хайдах буолуохтааҕын көрөр ордук буолуо.",
	'revreview-auto-w-old'         => "Эргэрбит торуму уларытан эрэҕин; туох баар уларытыылар '''аптамаатынан бэрэбиэркэлэммит курдук бэлиэтэниэхтэрэ'''. Уларытыыны бигэргэтиэх иннинэ хайдах буолуохтааҕын көрөр ордук буолуо.",
	'revreview-basic'              => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|көрүллүбүт]] торум,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит:] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Хойукку торумун] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} уларытыахха] сөп;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|уларытыы|уларытыылар}}] ырытыллыыны {{PLURAL:$3|кэтэһэр|кэтэһэллэр}}.',
	'revreview-basic-same'         => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|көрүллүбүт]] торум, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэрэбиэркэлэммит] <i>$2</i>. Сирэйгэ [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} көннөрүү] оҥоруохха сөп.',
	'revreview-changed'            => "'''Ыйбыт дьайыыҥ бу [[:$1|$1]] торумҥа кыайан оҥоһуллубат.'''

Баҕар халыып эбэтэр ойуу чопчу торумун ыйбатаҕыҥ буолуо. Это могло случиться, если динамический шаблон включает другой шаблон или изображение, зависящие от переменной, которая изменилась с момента начала рецензирования. Сирэйи саҥаттан арыйан баран ырытыыны саҥаттан саҕалаа, оччоҕо моһол сүтүөн сөп.",
	'revreview-current'            => 'Харата (черновик)',
	'revreview-depth'              => 'Толорута',
	'revreview-depth-0'            => 'Бигэргэтиллибэтэх',
	'revreview-depth-1'            => 'олоҕо баар',
	'revreview-depth-2'            => 'Орто',
	'revreview-depth-3'            => 'Толору',
	'revreview-depth-4'            => 'Талыы-талба',
	'revreview-edit'               => 'Черновигы уларытыы',
	'revreview-flag'               => 'торуму ырытыы',
	'revreview-legend'             => 'Торум ис хоһоонун сыаналааһын',
	'revreview-log'                => 'Ырытыы:',
	'revreview-main'               => 'Ырытарга сирэй биир эмит торумун талыахтааххын. 

Ырытыллыбатах сирэйдэри [[Special:Unreviewedpages|манна]] көр.',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Бүтэһик бэрэбиэркэлэммит торума]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} торумнар испииһэктэрэ]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит]
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 көннөрүү {{PLURAL:$3|көрүллүөхтээх|көрүллүөхтээхтэр}}].',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Бүтэһик кичэйэн көрүллүбүт торума]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} торумнар испииһэктэрэ]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит]
<i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 көннөрүү {{PLURAL:$3|көрүллүөхтээх|көрүллүөхтээхтэр}}].',
	'revreview-noflagged'          => "Бу сирэй ырытыллыбыт торума суох, арааһа кини хаачыстыбата [[{{MediaWiki:Validationpage}}|'''сыаналамматах''']] быһыылаах.",
	'revreview-note'               => '[[User:$1]] бу торуму [[{{MediaWiki:Validationpage}}|ырыта]] олорон маннык эппит:',
	'revreview-notes'              => 'Көрдөрүллэр кэтээһиннэр уонна самычаанньалар:',
	'revreview-oldrating'          => 'Сыаналаммыт:',
	'revreview-patrol'             => 'Бу уларытыыны бэрэбиэркэлэммит курдук бэлиэтээһин',
	'revreview-patrolled'          => 'Талбыт торумуҥ [[:$1|$1]] бэрэбиэркэлэммит курдук бэлиэтэннэ.',
	'revreview-quality'            => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|бэрэбиэркэлэммит]] торум,
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэлиэтэммит:] <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Хойукку торумун] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} уларытыахха] сөп;
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|уларытыы|уларытыылар}}] ырытыллыыны {{PLURAL:$3|кэтэһэр|кэтэһэллэр}}.',
	'revreview-quality-same'       => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|бэрэбиркэлэммит]] торум, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} бэрэбиэркэлэммит] <i>$2</i>. Сирэйгэ [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} көннөрүү оҥоруохха] сөп.',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Көрүллүбүт]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновигын көр]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Көрүлүннэ]]''' (көрүллүбэтэх уларытыылара суох)",
	'revreview-quick-none'         => "'''Бүтэһик торум''' (ырытыллыбыт торума суох)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Кичэйэн көрүллүбүт]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} черновигын көр]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Бэрэбиэркэлэннэ]]''' (көрүллүбэтэх көннөрүүлэрэ суох)",
	'revreview-quick-see-basic'    => "'''Черновик''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} чистовигын көр]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{PLURAL:$2|көннөрүүлээх|көннөрүүлэрдээх}}])",
	'revreview-quick-see-quality'  => "'''Черновик''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} чистовигын көр]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{PLURAL:$2|көннөрүүлээх|көннөрүүлэрдээх}}])",
	'revreview-selected'           => "'''$1''' талыллыбыт торума:",
	'revreview-source'             => 'черновик бастакы торума',
	'revreview-stable'             => 'Чистовик',
	'revreview-style'              => 'Ааҕарга табыгастааҕа',
	'revreview-style-0'            => 'Бигэргэтиллибэтэх',
	'revreview-style-1'            => 'Син аҕай',
	'revreview-style-2'            => 'Үчүгэй',
	'revreview-style-3'            => 'Кылгас',
	'revreview-style-4'            => 'Уһулуччу үчүгэй',
	'revreview-submit'             => 'Ырытыыны ыыт',
	'revreview-text'               => 'Анаан туруоруллубатаҕына чистовой торумнар көстөллөр (саҥа, хойукку торумнар буолбатах).',
	'revreview-toolow'             => 'Бу торуму ырытыллыбыт диир буоллаххына «бигэргэтиллибэтэх» диэнтэн үөһээ таһымы туруоруохтааххын. Ырытыыта суох оҥорорго туох баар суолталарын «бигэргэтиллибэтэх» диэҥҥэ туруор.',
	'revreview-update'             => 'Бука диэн манна аллара бэриллибит [[{{MediaWiki:Validationpage}}|чистовик]] статуһун биэрии кэннэ оҥоһуллубут [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} уларытыылары] бэрэбиэркэлээ (ханныгы баҕараргын). Сорох халыыптар уонна ойуулар саҥардыллыбыттар:',
	'revreview-update-none'        => 'Бука диэн [[{{MediaWiki:Validationpage}}|чистовой торум]] кэнниттэн оноһуллубут [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} уларытыылары] (аллара бааллар) көр.',
	'revreview-visibility'         => 'Бу сирэй [[{{MediaWiki:Validationpage}}|чистовой торумнаах]], которая может быть  
[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} настроена].',
	'rights-editor-autosum'        => 'аптамаатынан анааһын',
	'rights-editor-revoke'         => 'эрэдээктэр статуһуттан бу кэмтэн босхоломмут: [[$1]]',
	'stable-logentry'              => 'установка чистового версионирования для [[$1]]',
	'stable-logentry2'             => 'сброс чистового версионирования для [[$1]]',
	'stable-logpage'               => 'Бүтэһик (чистовой) торумнар сурунааллара',
	'stable-logpagetext'           => 'Бу бүтэһик [[{{MediaWiki:Validationpage}}|бигэргэтиллибит]] торумнар туруорууларын уларытыы сурунаала.',
	'tooltip-ca-current'           => 'Сирэй саҥа (бүтэһик) черновигын көрдөр',
	'tooltip-ca-default'           => 'Хаачыстыба хонтуруолун туруоруулара',
	'tooltip-ca-stable'            => 'Бу сирэй чистовигын көрүү',
	'validationpage'               => '{{ns:help}}:Ыстатыйа бэрэбиэркэтэ',
);

/** Slovak (Slovenčina)
 * @author Helix84
 * @author Siebrand
 */
$messages['sk'] = array(
	'editor'                       => 'Redaktor',
	'flaggedrevs'                  => 'Označené verzie',
	'flaggedrevs-backlog'          => "Momentálne existujú [[Special:OldReviewedPages|Zastaralé skontrolované stránky]]. '''Vyžaduje sa vaša pozornosť!'''",
	'flaggedrevs-desc'             => 'Dáva redaktorom/kontrolórom možnosť overovať revízie a označovať stránky ako stabilné',
	'flaggedrevs-pref-UI-0'        => 'Používať podrobné používateľské rozhranie stabilných verzií',
	'flaggedrevs-pref-UI-1'        => 'Používať jednoduché používateľské rozhranie stabilných verzií',
	'flaggedrevs-prefs'            => 'Stabilita',
	'flaggedrevs-prefs-stable'     => 'Vždy štandardne zobrazovať stabilnú verziu stránok s obsahom (ak existuje)',
	'flaggedrevs-prefs-watch'      => 'Pridať stránky, ktoré skontrolujem, do môjho zoznamu sledovaných',
	'group-editor'                 => 'Redaktori',
	'group-editor-member'          => 'Redaktor',
	'group-reviewer'               => 'Revízori',
	'group-reviewer-member'        => 'Revízor',
	'grouppage-editor'             => '{{ns:project}}:Redaktor',
	'grouppage-reviewer'           => '{{ns:project}}:Revízor',
	'hist-draft'                   => 'revízia - návrh',
	'hist-quality'                 => 'kvalitná revízia',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} overil] [[User:$3|$3]]',
	'hist-stable'                  => 'videná revízia',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} videl] [[User:$3|$3]]',
	'review-diff2stable'           => 'Zobraziť rozdiely medzi stabilnou a aktuálnou revíziou',
	'review-logentry-app'          => 'skontrolované [[$1]]',
	'review-logentry-dis'          => 'neodporúča sa verzia [[$1]]',
	'review-logentry-id'           => 'ID verzie $1',
	'review-logentry-diff'         => 'rozdiel so stabilnou',
	'review-logpage'               => 'Záznam kontrol',
	'review-logpagetext'           => 'Toto je záznam zmien [[{{MediaWiki:Makevalidate-page}}|schválenia]] revízií stránok s obsahom.
Zoznam schválených stránok nájdete na stránke [[Special:ReviewedPages|Zoznam skontrolovaných stránok]].',
	'reviewer'                     => 'Revízor',
	'revisionreview'               => 'Prezrieť kontroly',
	'revreview-accuracy'           => 'Presnosť',
	'revreview-accuracy-0'         => 'neschválené',
	'revreview-accuracy-1'         => 'zbežná',
	'revreview-accuracy-2'         => 'presná',
	'revreview-accuracy-3'         => 'dobre uvedené zdroje',
	'revreview-accuracy-4'         => 'odporúčaný',
	'revreview-approved'           => 'Schválené',
	'revreview-auto'               => '(automatické)',
	'revreview-auto-w'             => "Upravujete stabilnú revíziu, zmeny budú '''automaticky označené ako skontrolované'''.",
	'revreview-auto-w-old'         => "Upravujete skontrolovanú revíziu. Zmeny budú '''automaticky označené ako skontrolované'''.",
	'revreview-basic'              => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|stabilná]] verzia tejto stránky,
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$4</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Aktuálna verzia]
	je zvyčajne [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} prístupná úpravám] a aktuálnejšia.
Na revíziu čaká [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=$2}} {{PLURAL:$3|jedna zmena|$3 zmeny|$3 zmien}}].',
	'revreview-basic-i'            => 'Toto je posledná [[{{MediaWiki:Validationpage}}|videná]] revízia, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Jej [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrh] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} template/image zmeny] čakajúce na schválenie.',
	'revreview-basic-old'          => 'Toto je [[{{MediaWiki:Validationpage}}|videná]] revízia ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Je možné, že boli vykonané ďalšie [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} zmeny].',
	'revreview-basic-same'         => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|videná]] revízia, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] na <i>{{GRAMMAR:lokál|$2}}</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upraviť].',
	'revreview-basic-source'       => 'Na tejto revízii bola založená [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} videná verzia] tejto stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.',
	'revreview-changed'            => "'''Požadovanú činnosť nebolo možné vykonať na tejto revízii stránky [[:$1|$1]].'''

Šablóna alebo obrázok mohol byť vyžiadaný bez uvedenia konkrétnej verzie. To sa môže stať, keď dynamická šablóna transkluduje iný obrázok alebo šablónu v závislosti od premennej, ktorá sa zmenila, odkedy ste začali s kontrolou tejto stránky.
Obnovením stránky a opätovnou kontrolou vyriešite tento problém.",
	'revreview-current'            => 'Koncept',
	'revreview-depth'              => 'Hĺbka',
	'revreview-depth-0'            => 'neschválené',
	'revreview-depth-1'            => 'základná',
	'revreview-depth-2'            => 'stredná',
	'revreview-depth-3'            => 'vysoká',
	'revreview-depth-4'            => 'odporúčaný',
	'revreview-draft-title'        => 'Návrh článku',
	'revreview-edit'               => 'Upraviť koncept',
	'revreview-edited'             => "'''Úpravy budú zapracované do [[{{MediaWiki:Validationpage}}|stabilnej verzie]] potom, čo ich skontroluje dôveryhodný používateľ.
Dolu je zobrazený ''návrh'' stránky.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|zmena čaká|zmeny čakajú|zmien čaká}}] na schválenie.",
	'revreview-flag'               => 'Skontrolovať túto verziu',
	'revreview-invalid'            => "'''Neplatný cieľ:''' zadanému ID nezodpovedá žiadna [[{{MediaWiki:Validationpage}}|skontrolovaná]] revízia.",
	'revreview-legend'             => 'Ohodnotiť obsah verzie:',
	'revreview-log'                => 'Komentár záznamu:',
	'revreview-main'               => 'Musíte vybrať konkrétnu verziu stránky s obsahom, aby ste ju mohli skontrolovať. 

	Pozri zoznam neskontrolovaných stránok
	[[Special:Unreviewedpages]].',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná overená revízia]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]) tejto stránky bola [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená]
	 <i>$2</i>. <br /> {{PLURAL:$3|$3 revízia|$3 revízie||$3 revízií}} ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} zmeny]) čaká na schválenie.',
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná videná revízia] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]) bola [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Template/image Zmeny] je potrebné schváliť.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná kvalitná revízia]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]) tejto stránky bola [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená]
	 <i>$2</i>. <br /> {{PLURAL:$3|$3 revízia|$3 revízie||$3 revízií}} ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} zmeny]) čaká na schválenie.',
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Posledná kvalitná revízia] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]) bola [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Template/image Zmeny] je potrebné schváliť.',
	'revreview-noflagged'          => "Neexistujú revidované verzie tejto stránky, takže jej
	kvalita '''nebola''' [[{{MediaWiki:Validationpage}}|skontrolovaná]].",
	'revreview-note'               => '[[User:$1]] urobil nasledovné poznámky počas [[{{MediaWiki:Validationpage}}|kontroly]] tejto verzie:',
	'revreview-notes'              => 'Pozorovania alebo poznámky, ktoré sa majú zobraziť:',
	'revreview-oldrating'          => 'Bolo ohodnotené ako:',
	'revreview-patrol'             => 'Označiť túto zmenu ako stráženú',
	'revreview-patrol-title'       => 'Označiť ako strážené',
	'revreview-patrolled'          => 'Vybraná revízia [[:$1|$1]] bola označená ako strážená.',
	'revreview-quality'            => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|kvalitná]] verzia tejto stránky,
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$4</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Aktuálna verzia]
	je zvyčajne [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} prístupná úpravám] a aktuálnejšia.
Na revíziu čaká [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=$2}} {{PLURAL:$3|jedna zmena|$3 zmeny|$3 zmien}}].',
	'revreview-quality-i'          => 'Toto je posledná [[{{MediaWiki:Validationpage}}|kvalitná]] revízia, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Jej [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} návrh] má [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} template/image zmeny] čakajúce na schválenie.',
	'revreview-quality-old'        => 'Toto je [[{{MediaWiki:Validationpage}}|kvalitná]] revízia ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} zobraziť všetky]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.
Je možné, že boli vykonané ďalšie [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} zmeny].',
	'revreview-quality-same'       => 'Toto je najnovšia [[{{MediaWiki:Validationpage}}|kvalitná]] revízia, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] na <i>{{GRAMMAR:lokál|$2}}</i>. Stránku je možné [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} upraviť].',
	'revreview-quality-source'     => 'Na tejto revízii bola založená [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kvalitná verzia] tejto stránky, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválená] <i>$2</i>.',
	'revreview-quality-title'      => 'Kvalitný článok',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Skontrolovaná]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Pozri aktuálnu revíziu]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Videný článok]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobraziť návrh]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Videná]]''' (žiadne neskontrolované zmeny)",
	'revreview-quick-invalid'      => "'''Neplatný ID revízie'''",
	'revreview-quick-none'         => "'''Aktuálna'''. Žiadne revízie neboli skontrolvoané..",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Kvalitná]]'''. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Pozri aktuálnu revíziu]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Kvalitný článok]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} zobraziť návrh]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitná]]''' (žiadne neskontrolované zmeny)",
	'revreview-quick-see-basic'    => "'''Rozpísaná''' [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobraziť stabilnú verziu] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|zmena|zmeny|zmien}}])",
	'revreview-quick-see-quality'  => "'''Rozpísaná''' [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} zobraziť stabilnú verziu] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|zmena|zmeny|zmien}}])",
	'revreview-selected'           => "Zvolená verzia '''$1:'''",
	'revreview-source'             => 'Zdroj konceptu',
	'revreview-stable'             => 'Stabilná stránka',
	'revreview-stable-title'       => 'Videný článok',
	'revreview-stable1'            => 'Môžete zobraziť [{{fullurl:$2|stableid=$2}} túto označenú verziu] alebo sa pozrieť, či je teraz [{{fullurl:$1|stable=1}} stabilná verzia] tejto stránky.',
	'revreview-stable2'            => 'Môžete zobraziť [{{fullurl:$2|stable=1}} stabilnú verziu] tejto stránky (ak ešte existuje).',
	'revreview-style'              => 'Čitateľnosť',
	'revreview-style-0'            => 'neschválené',
	'revreview-style-1'            => 'prijateľná',
	'revreview-style-2'            => 'dobrá',
	'revreview-style-3'            => 'zhustená',
	'revreview-style-4'            => 'odporúčaný',
	'revreview-submit'             => 'Aplikovať kontrolu',
	'revreview-successful'         => "'''Vybraná revízia [[:$1|$1]] bola úspešne označená. ([{{fullurl:Special:Stableversions|page=$2}} zobraziť všetky označené verzie])'''",
	'revreview-successful2'        => "'''Označenie vybranej revízie [[:$1|$1]] bolo úspešne zrušené.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Stabilné verzie]], nie najnovšie verzie, sú nastavené ako štandardný obsah stránky pre čitateľov.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Stabilné verzie]] sú skontrolované revízie stránok a je možné ich nastaviť ako štandardný obsah stránky pre čitateľov.''",
	'revreview-toggle'             => '(prepnúť zobrazenie podrobností)',
	'revreview-toggle-title'       => 'zobraziť/skryť podrobnosti',
	'revreview-toolow'             => 'Musíte ohodnotiť každý z nasledujúcich atribútov minimálne vyššie ako „neschválené“, aby bolo možné
	verziu považovať za skontrolovanú. Ak chcete učiniť verziu zastaralou, nastavte všetky polia na „neschválené“.',
	'revreview-update'             => "Prosím, [[{{MediaWiki:Validationpage}}|skontrolujte]] všetky zmeny ''(zobrazené nižšie)'', ktoré boli vykonané od [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválenia].<br />
'''Niektoré šablóny/obrázky sa zmenili:'''",
	'revreview-update-includes'    => "'''Niektoré šablóny/obrázky sa zmenili:'''",
	'revreview-update-none'        => "Prosím, [[{{MediaWiki:Validationpage}}|skontrolujte]] všetky zmeny ''(zobrazené nižšie)'', ktoré boli vykonané od [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} schválenia] poslednej stabilnej revízie.",
	'revreview-update-use'         => "'''POZN.:''' Ak nejaká z týchto šablón/obrázkov má stabilnú verziu, potom je už použitá v stabilnej verzii tohto článku.",
	'revreview-diffonly'           => "''Stránku môžete skontrolovať po kliknutí na odkaz „aktuálna revízia” pomocou formulára na kontrolu.''",
	'revreview-visibility'         => 'Táto stránka má [[{{MediaWiki:Validationpage}}|stabilnú verziu]], ktorú je možné [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} nastaviť].',
	'right-autopatrolother'        => 'Automaticky označiť revízie mimo hlavného menného priestoru ako strážené',
	'right-autoreview'             => 'Automaticky označiť revízie ako videné',
	'right-movestable'             => 'Presunúť stabilné stránky',
	'right-review'                 => 'Označiť revízie ako videné',
	'right-stablesettings'         => 'Nastaviť ako sa vyberajú a zobrazujú stabilné verzie',
	'right-validate'               => 'Označiť revízie ako overené',
	'rights-editor-autosum'        => 'automaticky povýšený',
	'rights-editor-revoke'         => '[[User:$1|$1]] odteraz nemá status redaktor.',
	'specialpages-group-quality'   => 'Zaistenie kvality',
	'stable-logentry'              => 'nastavil stabilné verzie [[$1]]',
	'stable-logentry2'             => 'zrušil stabilné verzie [[$1]]',
	'stable-logpage'               => 'Záznam stabilných verzií',
	'stable-logpagetext'           => 'Toto je záznam zmien v konfigurácii [[{{MediaWiki:Validationpage}}|stabilnej verzie]] článkov.
Môžete si pozrieť [[Special:StablePages|Zoznam stabilných stránok]].',
	'tooltip-ca-current'           => 'Zobraziť aktuálny koncept tejto stránky',
	'tooltip-ca-default'           => 'Nastavenia kontroly kvality',
	'tooltip-ca-stable'            => 'Zobraziť stabilnú verziu tejto stránky',
	'validationpage'               => '{{ns:help}}:Overovanie článkov',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 * @author Siebrand
 */
$messages['sr-ec'] = array(
	'editor'                => 'Уређивач',
	'group-editor'          => 'Уређивачи',
	'group-editor-member'   => 'Уређивач',
	'group-reviewer'        => 'Прегледачи',
	'group-reviewer-member' => 'Прегледач',
	'grouppage-editor'      => '{{ns:project}}:Уређивач',
	'grouppage-reviewer'    => '{{ns:project}}:Прегледач',
	'hist-quality'          => 'квалитет',
	'review-logentry-app'   => 'прегледан [[$1]]',
	'review-logpage'        => 'Историја прегледа чланка',
	'reviewer'              => 'Прегледач',
	'revreview-accuracy-4'  => 'Изабрани',
	'revreview-auto'        => '(аутоматски)',
	'revreview-depth-1'     => 'Основни',
	'revreview-depth-3'     => 'Висок',
	'revreview-depth-4'     => 'Изабрани',
	'revreview-log'         => 'Коментар:',
	'revreview-stable'      => 'Стабилан',
	'revreview-style-1'     => 'Прихватљив',
	'revreview-style-2'     => 'Добар',
	'revreview-style-3'     => 'Тачан',
	'revreview-style-4'     => 'Изабрани',
	'revreview-submit'      => 'Приложи преглед',
	'tooltip-ca-stable'     => 'Погледајте стабилну верзију ове странице',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 * @author Siebrand
 */
$messages['stq'] = array(
	'editor'                       => 'Sieuwer',
	'flaggedrevs'                  => 'Markierde Versione',
	'flaggedrevs-desc'             => 'Stoabile Versione',
	'group-editor'                 => 'Sieuwere',
	'group-editor-member'          => 'Sieuwer',
	'group-reviewer'               => 'Wröigere',
	'group-reviewer-member'        => 'Wröiger',
	'grouppage-editor'             => '{{ns:project}}:Sieuwer',
	'grouppage-reviewer'           => '{{ns:project}}:Wröiger',
	'hist-quality'                 => 'wröigede Version',
	'hist-stable'                  => 'sieuwede Version',
	'review-diff2stable'           => 'Unnerscheede twiske ju stoabile Version un ju aktuelle Version bekiekje',
	'review-logentry-app'          => 'wröigede [[$1]]',
	'review-logentry-dis'          => 'fersmeet ne Version fon [[$1]]',
	'review-logentry-id'           => 'Version-ID $1',
	'review-logpage'               => 'Artikkel-Wröig-Logbouk',
	'review-logpagetext'           => 'Dit is dät Annerengs-Logbouk fon do [[{{MediaWiki:Validationpage}}|Sieden-Fräigoawen]].',
	'reviewer'                     => 'Wröiger',
	'revisionreview'               => 'Versionswröigenge',
	'revreview-accuracy'           => 'Akroategaid',
	'revreview-accuracy-0'         => 'nit fräiroat',
	'revreview-accuracy-1'         => 'sieuwed',
	'revreview-accuracy-2'         => 'wröiged',
	'revreview-accuracy-3'         => 'Wällen wröiged',
	'revreview-accuracy-4'         => 'exzellent',
	'revreview-auto'               => '(automatisk)',
	'revreview-auto-w'             => "Du beoarbaidest ne stoabile Version, dien Beoarbaidenge wäd '''automatisk as wröiged markierd.'''
	Du schuust ju Siede deeruum foar dät Spiekerjen in ju Foarschau bekiekje.",
	'revreview-auto-w-old'         => "Du beoarbaidest ne oolde Version, dien Beoarbaidenge wäd '''automatisk as wröiged markierd.'''
Du schuust ju Siede deeruum foar dät Spiekerjen in ju Foarschau bekiekje.",
	'revreview-basic'              => 'Dit is ju lääste [[Help:Sieuwede Versione|sieuwede]] Version,
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] ap n <i>$2</i>. Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} apstuunse Version]
	kon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided] wäide; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|Version|Versione}}]
{{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-basic-same'         => "Dät is ju lääste [[{{MediaWiki:Validationpage}}|bekiekede]] Version,
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} wies aal]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] an dän <i>$2</i>. Ju Siede kon '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided]''' wäide.",
	'revreview-changed'            => "'''Ju Aktion kuude nit ap ju Version fon [[:$1|$1]] anwoand wäide.'''

Ne Foarloage of ne Bielde wuuden sunner spezifiske Versionsnummer anfoarderd. Dit kon passierje, wan ne dynamiske Foarloage ne wiedere Foarloage of ne Bielde änthaalt, ju der von ne Variable ouhongich is, ju sik siet Ounfang fon ju Pröiwenge annerd häd. Fonnäien Leeden fon ju Siede un Startjen fon ju Wröigenge kon dät Problem ouhälpe.",
	'revreview-current'            => 'Äntwurf (beoarbaidboar)',
	'revreview-depth'              => 'Djüpte',
	'revreview-depth-0'            => 'nit fräiroat',
	'revreview-depth-1'            => 'eenfach',
	'revreview-depth-2'            => 'middel',
	'revreview-depth-3'            => 'hooch',
	'revreview-depth-4'            => 'exzellent',
	'revreview-edit'               => 'Beoarbaidje Äntwurf',
	'revreview-flag'               => 'Wröig Version',
	'revreview-legend'             => 'Inhoold fon ju Version wäidierje',
	'revreview-log'                => 'Logbouk-Iendraach:',
	'revreview-main'               => 'Du moast ne Artikkelversion tou Wröigenge uutwääle.

Sjuch [[{{ns:special}}:Unreviewedpages]] foar ne Lieste fon nit pröiwede Versione.',
	'revreview-newest-basic'       => 'Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lääste wröigede Version]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} sjuch aal]) wuude ap n <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|Version|Versione}}] {{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-newest-quality'     => 'Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} lääste wröigede Version]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} sjuch aal]) wuude ap n <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat].
	[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|Version|Versione}}] {{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-noflagged'          => 'Fon disse Siede rakt et neen markierde Versione, so dät noch neen Tjuugnis uur ju [[{{MediaWiki:Validationpage}}|Qualität]] moaked wäide kon.',
	'revreview-note'               => '[[{{ns:user}}:$1]] moakede ju foulgendje [[{{MediaWiki:Validationpage}}|Wröignotiz]] tou disse Version:',
	'revreview-notes'              => 'Antouwiesende Bemäärkengen un Notizen:',
	'revreview-oldrating'          => 'Iendeelenge bit nu:',
	'revreview-patrol'             => 'Markier disse Annerenge as kontrollierd',
	'revreview-patrolled'          => 'Ju uutwäälde Version fon [[:$1|S1]] wuude as kontrollierd markierd.',
	'revreview-quality'            => 'Dit is ju lääste [[Help:Versionstaksoade|wröigede]] Version,
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] ap n <i>$2</i>. Ju [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} apstuunse Version]
	kon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided] wäide; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|Version|Versione}}]
	{{PLURAL:$3|stoant|stounde}} noch tou Wröigenge an.',
	'revreview-quality-same'       => "Dät is ju lääste [[{{MediaWiki:Validationpage}}|wröigede]] Version,
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} wies aal]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] an dän <i>$2</i>. Ju Siede kon '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} beoarbaided]''' wäide.",
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Sieuwed.]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Sjuch ju aktuelle Version]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Sieuwed]]''' (neen Annerengen do der nit wröiged sunt)",
	'revreview-quick-none'         => "'''Aktuell.''' Der wuude noch neen Version wröiged.",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Wröiged.]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Sjuch ju aktuelle Version]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Wröiged]]''' (neen Annerengen do der nit wröiged sunt)",
	'revreview-quick-see-basic'    => "'''Aktuell.''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Sjuch ju lääste wröigede Version]]
	($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|Annerenge|Annerengen}}])",
	'revreview-quick-see-quality'  => "'''Aktuell.''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Sjuch ju lääste wröigede Version]]
	($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|Annerenge|Annerengen}}])",
	'revreview-selected'           => "Wäälde Versione fon '''$1:'''",
	'revreview-source'             => 'Äntwurfs-Wältext',
	'revreview-stable'             => 'Stoabil',
	'revreview-style'              => 'Leesboarhaid',
	'revreview-style-0'            => 'nit fräiroat',
	'revreview-style-1'            => 'akzeptoabel',
	'revreview-style-2'            => 'goud',
	'revreview-style-3'            => 'akroat',
	'revreview-style-4'            => 'exzellent',
	'revreview-submit'             => 'Wröigenge spiekerje',
	'revreview-text'               => 'Ne stoabile Version wäd bie ju Siedendeerstaalenge ljauer nuumen as ne näiere Version.',
	'revreview-toolow'             => 'Du moast foar älk fon do unnerstoundende Attribute n Wäid haager as „{{int:revreview-accuracy-0}}“ ienstaale, 
deermäd ne Version as wröiged jält. Uum ne Version tou fersmieten, mouten aal Attribute ap „{{int:revreview-accuracy-0}}“ stounde.',
	'revreview-update'             => "[[{{MediaWiki:Validationpage}}|Wröig]] älke Annerenge ''(sjuch hierunner)'' siet ju lääste stoabile Version [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] wuude.

'''Do foulgjende Foarloagen un Bielden wuuden ferannerd:'''",
	'revreview-update-none'        => "[[{{MediaWiki:Validationpage}}|Wröig]] älke Annerenge ''(sjuch hierunner)'' siet ju lääste stoabile Version [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} fräiroat] wuude.",
	'revreview-visibility'         => 'Disse Siede häd ne [[{{MediaWiki:Validationpage}}|stoabile Version]], ju der
	[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} konfigurierd] wäide kon.',
	'rights-editor-autosum'        => 'automatiske Gjuchte-uutgoawe',
	'rights-editor-revoke'         => 'äntlook dät Sieuwer-Gjucht fon [[$1]]',
	'stable-logentry'              => 'konfigurierde ju Sieden-Ienstaalenge fon [[$1]]',
	'stable-logentry2'             => 'sätte ju Sieden-Ienstaalenge foar [[$1]] tourääch',
	'stable-logpage'               => 'Stoabile-Versione-Logbouk',
	'stable-logpagetext'           => 'Dit is dät Annerengs-Logbouk fon do Konfigurationsienstaalengen fon do [[{{MediaWiki:Validationpage}}|Stoabile Versione]]',
	'tooltip-ca-current'           => 'Ankiekjen fon dän aktuelle Äntwurf fon disse Siede',
	'tooltip-ca-default'           => 'Ienstaalengen fon ju Artikkel-Qualität',
	'tooltip-ca-stable'            => 'Ankiekjen fon ju stoabile Version fon disse Siede',
	'validationpage'               => '{{ns:help}}:Stoabile Versione',
);

/** Sundanese (Basa Sunda)
 * @author Kandar
 * @author Irwangatot
 */
$messages['su'] = array(
	'editor'               => 'Éditor',
	'group-editor'         => 'Éditor',
	'group-editor-member'  => 'Éditor',
	'grouppage-editor'     => '{{ns:project}}:Éditor',
	'review-diff2stable'   => 'Témbongkeun béda antara révisi stabil jeung kiwari',
	'review-logentry-id'   => 'ID révisi $1',
	'revreview-accuracy-0' => 'Teu disatujuan',
	'revreview-accuracy-2' => 'Akurat',
	'revreview-accuracy-4' => 'Petingan',
	'revreview-auto'       => '(otomatis)',
	'revreview-depth'      => 'Jero',
	'revreview-depth-0'    => 'Teu disatujuan',
	'revreview-depth-1'    => 'Dasar',
	'revreview-depth-3'    => 'Luhur',
	'revreview-depth-4'    => 'Petingan',
	'revreview-log'        => 'Kamandang:',
	'revreview-stable'     => 'Kaca Stabil',
	'revreview-style-0'    => 'Teu disatujuan',
	'revreview-style-1'    => 'Meueusan',
	'revreview-style-2'    => 'Alus',
	'revreview-style-4'    => 'Petingan',
	'rights-editor-revoke' => 'nyabut status éditor ti [[$1]]',
	'stable-logpage'       => 'Log vérsi stabil',
	'tooltip-ca-stable'    => 'Témbongkeun vérsi stabil ieu kaca',
	'validationpage'       => '{{ns:help}}:Validasi artikel',
);

/** Swedish (Svenska)
 * @author M.M.S.
 * @author Lejonel
 * @author Boivie
 * @author Siebrand
 */
$messages['sv'] = array(
	'editor'                       => 'Redaktör',
	'flaggedrevs'                  => 'Flaggade sidversioner',
	'flaggedrevs-backlog'          => "Det finns för tillfället en backlogg på [[Special:OldReviewedPages|Föråldrade granskade sidor]]. '''Din uppmärksamhet behövs!'''",
	'flaggedrevs-desc'             => 'Ger redaktörer och granskare möjligheten att validera sidversioner och stablilsera sidor',
	'flaggedrevs-pref-UI-0'        => 'Använd ett detaljerat gränssnitt för stabila versioner',
	'flaggedrevs-pref-UI-1'        => 'Använd ett enkelt gränssnitt för stabila versioner',
	'flaggedrevs-prefs'            => 'Stabilitet',
	'flaggedrevs-prefs-stable'     => 'Visa alltid den stabila versionen av sidor (om en sådan finns)',
	'flaggedrevs-prefs-watch'      => 'Lägg till sidor jag granskar i min bevakningslista',
	'group-editor'                 => 'Redaktörer',
	'group-editor-member'          => 'Redaktör',
	'group-reviewer'               => 'Granskare',
	'group-reviewer-member'        => 'Granskare',
	'grouppage-editor'             => '{{ns:project}}:Redaktörer',
	'grouppage-reviewer'           => '{{ns:project}}:Granskare',
	'hist-draft'                   => 'utkastet för sidversionen',
	'hist-quality'                 => 'kvalitetsversion',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} validerad] av [[User:$3|$3]]',
	'hist-stable'                  => 'synad version',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} synad] av [[User:$3|$3]]',
	'review-diff2stable'           => 'Visa ändringar mellan den stabila och den senaste versionen',
	'review-logentry-app'          => 'granskade [[$1]]',
	'review-logentry-dis'          => 'underkände en version av [[$1]]',
	'review-logentry-id'           => 'versions-ID $1',
	'review-logentry-diff'         => 'skillnad mot stabil',
	'review-logpage'               => 'Granskningslogg',
	'review-logpagetext'           => 'Det här är en logg över ändringar till [[{{MediaWiki:Validationpage}}|godkänningsstatus]] för innehållssidor.
Se [[Special:ReviewedPages|listan över granskade sidor]] för en lista över godkända sidor.',
	'reviewer'                     => 'Granskare',
	'revisionreview'               => 'Granska sidversioner',
	'revreview-accuracy'           => 'Riktighet',
	'revreview-accuracy-0'         => 'Ej godkänd',
	'revreview-accuracy-1'         => 'Synad',
	'revreview-accuracy-2'         => 'Riktig',
	'revreview-accuracy-3'         => 'Bra källbelagd',
	'revreview-accuracy-4'         => 'Utmärkt',
	'revreview-approved'           => 'Godkänd',
	'revreview-auto'               => '(automatiskt)',
	'revreview-auto-w'             => "Du redigerar den stabila versionen; ändringar kommer '''automatiskt granskas'''.",
	'revreview-auto-w-old'         => "Du redigerar en granskad version; ändringar kommer '''automatiskt bli granskade'''.",
	'revreview-basic'              => 'Det här är den senaste [[{{MediaWiki:validationpage}}|synade]] versionen, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|ändring|ändringar}}] som väntar på granskning.',
	'revreview-basic-i'            => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|synade]] sidversionen, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} mall och bild ändringar] som väntar på granskning.',
	'revreview-basic-old'          => 'Det här är en [[{{MediaWiki:Validationpage}}|synad]] sidversion ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
Nya [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} ändringar] kan ha gjorts.',
	'revreview-basic-same'         => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|synade]] sidversionen ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.',
	'revreview-basic-source'       => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} synad version] av den här sidan, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>, baserades på den här versionen.',
	'revreview-changed'            => "'''Den begärda åtgärden kunde inte utföras på denna version av [[:$1|$1]].'''

En mall eller bild har efterfrågats utan att någon specifik version angavs. Detta kan hända om en mall inkluderar en annan bild eller mall beroende på en variabel som ändrats sedan du startade att granska denna sida. Att ladda om sidan och granska igen kan lösa detta problem.",
	'revreview-current'            => 'Utkast',
	'revreview-depth'              => 'Djupgående',
	'revreview-depth-0'            => 'Ej godkänd',
	'revreview-depth-1'            => 'Grundläggande',
	'revreview-depth-2'            => 'Medel',
	'revreview-depth-3'            => 'Hög',
	'revreview-depth-4'            => 'Utmärkt',
	'revreview-draft-title'        => 'Utkastet för artikeln',
	'revreview-edit'               => 'Redigera utkast',
	'revreview-edited'             => "'''Ändringar kommer att infogas i den [[{{MediaWiki:Validationpage}}|stabila versionen]] när en etablerad användare granskar dom.
''Utkastet'' visas nedan.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|ändring väntar|ändringar väntar}}] på granskning.",
	'revreview-flag'               => 'Granska denna sidversion',
	'revreview-invalid'            => "'''Ogiltigt mål:''' inga [[{{MediaWiki:Validationpage}}|granskade]] versioner motsvarar den angivna IDn.",
	'revreview-legend'             => 'Bedöm versionens innehåll',
	'revreview-log'                => 'Kommentar:',
	'revreview-main'               => 'Du måste välja en viss version av en innehållssida för att kunna granska den.

Se [[Special:Unreviewedpages]] för en lista över ogranskade sidor.',
	'revreview-newest-basic'       => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste synade versionen] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|ändring|ändringar}}] behöver granskas.',
	'revreview-newest-basic-i'     => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste synade versionen] av den här sidan ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Mall eller bildändringar] behöver granskas.',
	'revreview-newest-quality'     => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste kvalitetsversionen av sidan]  ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|ändring|ändringar}}] behöver granskas.',
	'revreview-newest-quality-i'   => 'Den [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} senaste kvalitetsversionen] av den här sidan ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Mall eller bildändringar] behöver granskas.',
	'revreview-noflagged'          => "Det finns inga granskade versioner av den här sidan, så dess kvalitet har kanske '''inte''' [[{{MediaWiki:Validationpage}}|kontrollerats]].",
	'revreview-note'               => '[[User:$1]] gjorde följande noteringar när den här sidversionen [[{{MediaWiki:Validationpage}}|granskades]]:',
	'revreview-notes'              => 'Anmärkningar eller noteringar som kommer visas:',
	'revreview-oldrating'          => 'Bedömningen var:',
	'revreview-patrol'             => 'Märk den här ändringen som patrullerad',
	'revreview-patrol-title'       => 'Markera som patrullerad',
	'revreview-patrolled'          => 'Den valda versionen av [[:$1|$1]] har märkts som patrullerad.',
	'revreview-quality'            => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|kvalitetsversionen]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAME}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|ändring|ändringar}}] väntar på granskning.',
	'revreview-quality-i'          => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|kvalitetsversionen]] av sidan, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Utkastet] har [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} mall och bild ändringar] som väntar på granskning.',
	'revreview-quality-old'        => 'Det här är en [[{{MediaWiki:Validationpage}}|kvalitetsversion]] av sidan ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.
Nya [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} ändringar] kan ha gjorts.',
	'revreview-quality-same'       => 'Det här är den senaste [[{{MediaWiki:Validationpage}}|kvalitetsversionen]] av sidan ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} visa alla]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>.',
	'revreview-quality-source'     => 'En [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} kvalitetsversion] av den här sidan, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkänd] den <i>$2</i>, baserades på den här versionen.',
	'revreview-quality-title'      => 'Kvalitetsartikel',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Synad artikel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visa utkast]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Synad artikel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visa utkast]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Synad artikel]]'''",
	'revreview-quick-invalid'      => "'''Ogiltigt versions-ID'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Senaste versionen]]''' (inte granskad)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visa utkast]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikel]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} visa utkast]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Kvalitetsartikel]]'''",
	'revreview-quick-see-basic'    => "'''Utkast''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} visa artikel]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} komparera])",
	'revreview-quick-see-quality'  => "'''Utkast''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} visa artikel]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} komparera])",
	'revreview-selected'           => "Vald version av '''$1''':",
	'revreview-source'             => 'utkastets källa',
	'revreview-stable'             => 'Stabil sida',
	'revreview-stable-title'       => 'Synad artikel',
	'revreview-stable1'            => 'Du kanske vill visa [{{fullurl:$1|stableid=$2}} den här flaggade versionen] för att se ifall den nu är den [{{fullurl:$1|stable=1}} stabila versionen] av den här sidan.',
	'revreview-stable2'            => 'Du vill kanske visa den [{{fullurl:$1|stable=1}} stabila versionen] av denna sida (om det finns någon).',
	'revreview-style'              => 'Läsbarhet',
	'revreview-style-0'            => 'Ej godkänd',
	'revreview-style-1'            => 'Godtagbar',
	'revreview-style-2'            => 'Bra',
	'revreview-style-3'            => 'Koncis',
	'revreview-style-4'            => 'Utmärkt',
	'revreview-submit'             => 'Spara granskning',
	'revreview-successful'         => "'''Vald sidversion av [[:$1|$1]] har flaggats och märkts i senaste ändringar. ([{{fullurl:Special:Stableversions|page=$2}} visa alla flaggade sidversioner])'''",
	'revreview-successful2'        => "'''Vald sidversion av [[:$1|$1]] har avflaggats.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Stabila versioner]] är standardinnehåll i sidor i stället för den nyaste sidversionen.''",
	'revreview-text2'              => "''[[{{MediaWiki:validationpage}}|Stabila versioner]] är kontrollerade versioner av sidor och kan ställas in som standardinnehåll för läsare.''",
	'revreview-toggle-title'       => 'visa/dölj detaljer',
	'revreview-toolow'             => 'Din bedömning av sidan måste vara högre än "ej godkänd" för alla egenskaper nedan för att versionen ska anses vara granskad. För att ta bort ett godkännande av en version, ange "ej godkänd" för alla egenskaper.',
	'revreview-update'             => "Var god [[{{MediaWiki:Validationpage}}|granska]] några ändringar ''(visas nedan)'' gjorda när den stabila versionen [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes].<br />
'''Vissa mallar eller bilder har uppdaterats:'''",
	'revreview-update-includes'    => "'''Vissa mallar eller bilder har ändrats:'''",
	'revreview-update-none'        => "Var god [[{{MediaWiki:Validationpage}}|review]] några ändringar ''(visas nedan)'' gjorda när den stabila versionen [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} godkändes].",
	'revreview-update-use'         => "'''NOTERA:''' Om någon av de här mallarna eller bilderna har en stabil version, är den redan använd i den stabila versionen av den här sidan.",
	'revreview-diffonly'           => "''För att granska sidan, klicka på versionslänken \"nuvarande version\" och använd granskningsformuläret.''",
	'revreview-visibility'         => "'''Denna sida har en [[{{MediaWiki:Validationpage}}|stabil version]]; inställningarna för den kan [{{fullurl:Special:Stsbilization|page={{FULLPAGENAMEE}}}} konfigureras].'''",
	'right-autopatrolother'        => 'Automatiskt märka sidversioner i andra namnrymder än huvudnamnrymden patrullerade',
	'right-autoreview'             => 'Automatiskt märka sidversioner som synade',
	'right-movestable'             => 'Flytta stabila sidor',
	'right-review'                 => 'Markera sidversioner som synade',
	'right-stablesettings'         => 'Ställa in hur stabila versioner väljs och visas',
	'right-validate'               => 'Markera sidversioner som validerade',
	'rights-editor-autosum'        => 'autobefodring',
	'rights-editor-revoke'         => 'tog bort redaktörsstatus från [[$1]]',
	'specialpages-group-quality'   => 'Kvalitetsförsäkring',
	'stable-logentry'              => 'ändrade inställningar för stabila versioner av [[$1]]',
	'stable-logentry2'             => 'återställde inställningar för stabila versioner av [[$1]]',
	'stable-logpage'               => 'Versionsstabiliseringslogg',
	'stable-logpagetext'           => 'Det här är en logg över ändringar av inställningar för [[{{MediaWiki:validationpage}}|stabila versioner]] av innehållssidor.
En lista över stabiliserade sidor kan hittas på [[Special:stablepages|listan över stabila sidor]].',
	'tooltip-ca-current'           => 'Visa det senaste utkastet för denna sida',
	'tooltip-ca-default'           => 'Inställningar för kvalitetssäkring',
	'tooltip-ca-stable'            => 'Visa den stabila versionen av denna sida',
	'validationpage'               => '{{ns:help}}:Artikelvalidering',
);

/** Telugu (తెలుగు)
 * @author Veeven
 * @author వైజాసత్య
 * @author Chaduvari
 * @author Siebrand
 * @author Mpradeep
 */
$messages['te'] = array(
	'editor'                       => 'ఎడిటర్',
	'flaggedrevs'                  => 'జండాపాతిన కూర్పులు',
	'flaggedrevs-desc'             => 'ఎడిటర్లకి/సమీక్షకులకి కూర్పులను సరిచూసే మరియు పేజీలను సుస్థిరపరచే వీలును కల్పిస్తుంది',
	'flaggedrevs-prefs'            => 'స్థిరత్వం',
	'flaggedrevs-prefs-watch'      => 'నేను సమీక్షించిన పేజీలను నా వీక్షణాజాబితాలో చేర్చు',
	'group-editor'                 => 'ఎడిటర్లు',
	'group-editor-member'          => 'ఎడిటర్',
	'group-reviewer'               => 'సమీక్షకులు',
	'group-reviewer-member'        => 'సమీక్షకులు',
	'grouppage-editor'             => '{{ns:project}}:ఎడిటర్',
	'grouppage-reviewer'           => '{{ns:project}}:సమీక్షకులు',
	'hist-quality'                 => 'నాణ్యమైన కూర్పు',
	'hist-stable'                  => 'కనబడిన కూర్పు',
	'review-diff2stable'           => 'సుస్థిర మరియు ప్రస్తుత కూర్పుల మధ్య మార్పులను చూడండి',
	'review-logentry-app'          => '[[$1]]ని సమీక్షించారు',
	'review-logentry-dis'          => '[[$1]] యొక్క ఓ కూర్పుని నిరాదరించారు',
	'review-logentry-id'           => 'కూర్పు ID $1',
	'review-logpage'               => 'సమీక్షల దినచర్య',
	'review-logpagetext'           => 'ఇది విషయపు పేజీల యొక్క వివిధ కూర్పుల [[{{MediaWiki:Validationpage}}|అనుమతి]] స్థితిలో జరిగిన మార్పుల దినచర్య.
అనుమతించిన పేజీల జాబితా కొరకు [[Special:ReviewedPages|సమీక్షించిన పేజీల జాబితా]]ని చూడండి.',
	'reviewer'                     => 'సమీక్షకులు',
	'revisionreview'               => 'కూర్పులను సమీక్షించు',
	'revreview-accuracy'           => 'ఖచ్చితత్వం',
	'revreview-accuracy-0'         => 'ఆమోదించనివి',
	'revreview-accuracy-1'         => 'కనబడింది',
	'revreview-accuracy-2'         => 'ఖచ్చితం',
	'revreview-accuracy-3'         => 'సమూలము',
	'revreview-accuracy-4'         => 'విశేష్యం',
	'revreview-approved'           => 'అమోదించబడినది',
	'revreview-auto'               => '(ఆటోమెటిక్)',
	'revreview-auto-w'             => "మీకు సుస్థిర కూర్పుని సరిదిద్దుతున్నారు; మీ మార్పులు '''ఆటోమెటిగ్గా సమీక్షితమౌతాయి'''",
	'revreview-auto-w-old'         => "మీరు సమీక్షించిన కూర్పులో దిద్దుబాటు చేస్తున్నారు; మీ మార్పులు '''ఆటోమాటిగ్గా సమీక్షితమౌతాయి'''.",
	'revreview-basic'              => 'ఇది చిట్టచివరిగా [[{{MediaWiki:Validationpage}}|కనబడిన]] కూర్పు; <i>$2</i> న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తు ప్రతిని] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|మార్పు|మార్పులు}}] సమీక్ష కోసం {{PLURAL:$3|వేచి ఉంది|వేచి ఉన్నాయి}}.',
	'revreview-basic-same'         => 'ఇది చిట్టచివరిగా [[{{MediaWiki:Validationpage}}|కనబడిన]] కూర్పు, <i>$2</i> న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ పేజీని [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు].',
	'revreview-current'            => 'డ్రాఫ్టు',
	'revreview-depth'              => 'లోతైనది',
	'revreview-depth-0'            => 'ఆమోదించనివి',
	'revreview-depth-1'            => 'ప్రాథమిక',
	'revreview-depth-2'            => 'మధ్యస్తం',
	'revreview-depth-3'            => 'ఉన్నత',
	'revreview-depth-4'            => 'విశేష్యం',
	'revreview-edit'               => 'డ్రాఫ్టును దిద్దు',
	'revreview-flag'               => 'ఈ కూర్పుని సమీక్షించండి',
	'revreview-legend'             => 'ఈ కూర్పు యొక్క సారాన్ని వెలకట్టండి',
	'revreview-log'                => 'వ్యాఖ్య:',
	'revreview-main'               => 'సమీక్షించడానికి మీరు విషయపు పేజీ యొక్క ఓ నిర్ధిష్ట కూర్పుని ఎంచుకోవాలి.

సమీక్షించని పేజీల జాబితా కొరకు [[Special:Unreviewedpages]]ని చూడండి.',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} చిట్టచివరిగా కనబడిన ఈ కూర్పు] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} అన్నిటినీ చూపించు]) <i>$2</i> న  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|మార్పుకు|మార్పులకు}}] సమీక్ష {{PLURAL:$3|అవసరం|అవసరం}}.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} చివరి నాణ్యతా కూర్పు] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} అన్నీ చూపించు]) <i>$2</i>న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} అనుమతించారు]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|1 మార్పు|$3 మార్పుల}}]ను సమీక్షించాలి.',
	'revreview-noflagged'          => "ఈ పేజీకి సమీక్షిత కూర్పులేమీ లేవు, కాబట్టి దీన్ని నాణ్యత కొరకు [[{{MediaWiki:Validationpage}}|సరిచూసి]] '''ఉండక'''పోవచ్చు.",
	'revreview-note'               => 'ఈ కూర్పుని [[{{MediaWiki:Validationpage}}|సమీక్షిస్తూ]], [[User:$1]] ఈ వ్యాఖ్యలు చేసారు:',
	'revreview-notes'              => 'చూపించాల్సిన గమనికలు:',
	'revreview-oldrating'          => 'రేటింగు:',
	'revreview-patrol'             => 'ఈ మార్పును నిఘాలో ఉన్నట్లుగా గుర్తించు',
	'revreview-patrolled'          => 'మీరు ఎంచుకున్న [[:$1|$1]] యొక్క కూర్పు నిఘాలో ఉంది.',
	'revreview-quality'            => 'ఇది చిట్టచివరి [[{{MediaWiki:Validationpage}}|నాణ్యమైన]] కూర్పు; <i>$2</i> న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తుప్రతిని] [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|మార్పు|మార్పులు}}] సమీక్ష కోసం {{PLURAL:$3|వేచి ఉంది|వేచి ఉన్నాయి}}.',
	'revreview-quality-same'       => 'ఇది చిట్టచివరి [[{{MediaWiki:Validationpage}}|నాణ్యమైన]] కూర్పు, <i>$2</i> న [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} ఆమోదించబడింది]. ఈ పేజీని [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} మార్చవచ్చు].',
	'revreview-quality-title'      => 'నాణ్యమైన వ్యాసం',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|కనబడ్డాయి]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తు ప్రతి]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|గమనించిన వ్యాసం]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} చిత్తుప్రతిని చూపించు]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|కనబడ్డాయి]]''' (సమీక్షించని మార్పులేమీ లేవు)",
	'revreview-quick-none'         => "'''ప్రస్తుత''' (సమీక్షిత కూర్పులు లేవు)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|నాణ్యత]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ప్రతిని చూడండి]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|మార్పు|మార్పులు}}])",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|నాణ్యత]]''' (సమీక్షించని మార్పులు లేవు)",
	'revreview-quick-see-basic'    => "'''ప్రతి''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} సుస్థిర పేజీని చూడండి]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|మార్పు|మార్పులు}}])",
	'revreview-quick-see-quality'  => "'''ప్రతి''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} సుస్థిర పేజీ చూడండి]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|మార్పు|మార్పులు}}])",
	'revreview-selected'           => "'''$1''' యొక్క ఎంచుకున్న కూర్పు:",
	'revreview-source'             => 'ప్రతి మూలం',
	'revreview-stable'             => 'సుస్థిర పేజీ',
	'revreview-stable-title'       => 'కంటపడిన వ్యాసం',
	'revreview-style'              => 'పఠనీయత',
	'revreview-style-0'            => 'అనామోదితం',
	'revreview-style-1'            => 'ఆమోదయోగ్యం',
	'revreview-style-2'            => 'మంచి',
	'revreview-style-3'            => 'క్లుప్తం',
	'revreview-style-4'            => 'విశేషనీయం',
	'revreview-submit'             => 'సమీక్షని దాఖలు చెయ్యండి',
	'revreview-text'               => 'పేజీలో విషయంగా కొత్త కూర్పులు కాకుండా సుస్థిర కూర్పులు కనిపిస్తాయి.',
	'revreview-toggle-title'       => 'వివరాలను చూపించు/దాచు',
	'revreview-toolow'             => 'ఓ కూర్పును సమీక్షించినట్లుగా భావించాలంటే కింద ఇచ్చిన గుణాలన్నిటినీ "సమ్మతించలేదు" కంటే ఉన్నతంగా రేటు చెయ్యాలి.',
	'revreview-update'             => "సుస్థిర కూర్పుని [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} అనుమతించిన] తర్వాత జరిగిన ''(క్రింద చూపించిన)'' మార్పులను [[{{MediaWiki:Validationpage}}|సమీక్షించండి]].

'''కొన్ని మూసలు/బొమ్మలను తాజాకరించారు:'''",
	'revreview-update-includes'    => "'''కొన్ని మూసలు/బొమ్మలను తాజాకరించారు:'''",
	'revreview-update-none'        => "సుస్థిర కూర్పుని [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} అనుమతించిన] తర్వాత చేసిన ''(క్రింద చూపించిన)'' మార్పులను [[{{MediaWiki:Validationpage}}|సమీక్షించండి]].",
	'revreview-visibility'         => 'ఈ పేజీకి ఓ [[{{MediaWiki:Validationpage}}|సుస్థిర కూర్పు]] ఉంది, దాన్ని [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} మార్చవచ్చు].',
	'right-autoreview'             => 'కూర్పులను గమనించినట్లుగా ఆటోమాటిగ్గా గుర్తించు',
	'right-movestable'             => 'స్థిరమైన పేజీలను తరలించు',
	'right-review'                 => 'కూర్పులను గమనించినట్లుగా గుర్తించు',
	'right-validate'               => 'కూర్పులను ధృవీకరించినట్లుగా గుర్తించు',
	'rights-editor-autosum'        => 'ఆటోమాటిగ్గా పదోన్నతి చెయ్యబడ్డారు',
	'rights-editor-revoke'         => '[[$1]] నుండి ఎడిటర్ హోదా తొలగించారు',
	'stable-logentry'              => '[[$1]]కి సుస్థిర కూర్పుని అమర్చారు',
	'stable-logentry2'             => '[[$1]]కి సుస్థిర కూర్పుని పునర్నిర్ణయించండి',
	'stable-logpage'               => 'సుస్థిర కూర్పుల లాగ్',
	'stable-logpagetext'           => 'ఇది విషయపు పేజీల [[{{MediaWiki:Validationpage}}|సుస్థిర కూర్పు]] మార్పుల లాగ్',
	'tooltip-ca-current'           => 'ఈ పేజీ యొక్క ప్రస్తుత ప్రతిని చూడండి',
	'tooltip-ca-default'           => 'నాణ్యతా భరోసా అమరికలు',
	'tooltip-ca-stable'            => 'ఈ పేజీ యొక్క సుస్థిర కూర్పుని చూడండి',
	'validationpage'               => '{{ns:help}}:వ్యాస మూల్యాంకన',
);

/** Tajik (Cyrillic) (Тоҷикӣ/tojikī (Cyrillic))
 * @author Ibrahim
 * @author Siebrand
 */
$messages['tg-cyrl'] = array(
	'editor'                       => 'Вироишгар',
	'flaggedrevs'                  => 'Нусхаҳои аломатдор',
	'flaggedrevs-desc'             => 'Ба вироишгархо/мурукунандагон имкони таъйид кардани нусхаҳо ва пойдор сохтани саҳифаҳоро медиҳад',
	'group-editor'                 => 'Вироишгарон',
	'group-editor-member'          => 'Вироишгар',
	'group-reviewer'               => 'Мурургарон',
	'group-reviewer-member'        => 'Мурургар',
	'grouppage-editor'             => '{{ns:project}}:Вироишгар',
	'grouppage-reviewer'           => 'Мурургар',
	'hist-quality'                 => 'нусхаи бокайфият',
	'hist-stable'                  => 'нусхаи баррасишуда',
	'review-diff2stable'           => 'Нигаристани тағйирот байни нусхаҳои пойдор ва кунунӣ',
	'review-logentry-app'          => '[[$1]]ро барраси кард',
	'review-logentry-dis'          => 'Нусхаи аз [[$1]]ро камбаҳо кард',
	'review-logentry-id'           => 'Нишонаи нусха $1',
	'review-logpage'               => 'Гузориши барраси',
	'review-logpagetext'           => 'Ин гузорише аз тағйирот ба вазъияти [[{{MediaWiki:Validationpage}}|таъйиди]] нусхаҳо барои мӯҳтавои саҳифаҳо аст.
Барои феҳристи саҳифаҳои баррасишуда нигаред ба [[Special:ReviewedPages|феҳристи саҳифаҳои баррасишуда]].',
	'reviewer'                     => 'Мурургар',
	'revisionreview'               => 'Нусхаҳои баррасӣ',
	'revreview-accuracy'           => 'Дақиқ',
	'revreview-accuracy-0'         => 'Муттавасит',
	'revreview-accuracy-1'         => 'Баррасишуда',
	'revreview-accuracy-2'         => 'Дақиқ',
	'revreview-accuracy-3'         => 'Дорои манобеъи хуб',
	'revreview-accuracy-4'         => 'Баргузида',
	'revreview-auto'               => '(худкор)',
	'revreview-auto-w'             => "Шумо дар ҳоли вироиши нусхаи пойдор ҳастед ва тағйироти шумо ба таври '''худкор баррасӣ хоҳанд шуд'''.",
	'revreview-auto-w-old'         => "Шумо дар ҳоли вироиши як нусхаи баррасӣ шуда ҳастед; тағйирот ба таври '''худкор баррасӣ хоҳанд шуд'''.",
	'revreview-basic'              => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|баррасишуда]]  аст, ки дар <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Пешнавис] қобили '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} вироиш аст]'''; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ  {{PLURAL:$3|аст|ҳастанд}}.",
	'revreview-basic-same'         => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|баррасишуда]] аст, ки дар <i>$2</i>  ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} феҳристи комил]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. Ин саҳифа қобили  '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} тағйир]''' аст.",
	'revreview-changed'            => "'''Амали дархостшударо наметавон рӯи ин нусхае аз [[:$1|$1]] анҷом дод.'''

Як шаблон ё акс шояд дархост шуда бошад, вақте ки ягон нусхаи хосе мушаххас нашудааст. Ин иттифоқ метавонад замоне рух диҳад, ки як шаблони пӯё, шаблон ё аксеро шомил шавад, ки ба мутағири бастагӣ дорад ва аз замоне, ки шумо саҳифаро тағйир додаед, тағйир кардааст.
Боргузории дубора ва баррасии дубора мушкилро метавонад бартараф кунад.",
	'revreview-current'            => 'Пешнавис',
	'revreview-depth'              => 'Умқ',
	'revreview-depth-0'            => 'Таъйиднашуда',
	'revreview-depth-1'            => 'Муқаддамотӣ',
	'revreview-depth-2'            => 'Миёна',
	'revreview-depth-3'            => 'Баланд',
	'revreview-depth-4'            => 'Баргузида',
	'revreview-edit'               => 'Вироиши пешнавис',
	'revreview-edited'             => "'''Вироишҳои нав пас аз назар гузаронидани онҳо аз тарафи корбаре ба [[{{MediaWiki:Validationpage}}|нусхаи пойдор]] илова хоҳанд шуд. Дар зер ''пешнавис'' оварда шудааст. ''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|тағйир|тағйирот}}] баррасиро интизор аст.",
	'revreview-flag'               => 'Ин нусхаро барраси кунед',
	'revreview-legend'             => 'Баҳо додан ба мӯҳтавои баррасишуда',
	'revreview-log'                => 'Тавзеҳ:',
	'revreview-main'               => 'Шумо бояд як нусхаи хосро аз саҳифаи мӯҳтаво барои баррасӣ кардан, интихоб кунед.

Барои дарёфт кардани саҳифаҳои баррасинашуда ба [[Special:Unreviewedpages]] нигаред.',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Охирин нусхаи баррасишуда] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} феҳристи комил]) дар  <i>$2</i>  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ {{PLURAL:$3|аст|ҳастанд}}.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Охирин нусхаи бокайфият] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} феҳристи комил]) дар  <i>$2</i>  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ {{PLURAL:$3|аст|ҳастанд}}.',
	'revreview-noflagged'          => 'Нусхаи муруршудае аз ин саҳифа вуҷуд надорад, ба ин далел, ки ин саҳифа аз назари кайфият ва сифат баррасӣ [[{{MediaWiki:Validationpage}}|нашудааст]].',
	'revreview-note'               => '[[User:$1]] ин тавзеҳотро зимни [[{{MediaWiki:Validationpage}}|баррасии]] нусха, сабт кард:',
	'revreview-notes'              => 'Мушоҳидот ё мулоҳизот:',
	'revreview-oldrating'          => 'Дараҷаи дода шуда:',
	'revreview-patrol'             => 'Аломат задании ин тағйир ба унвони баррасишуда',
	'revreview-patrolled'          => 'Нусхаи интихобшуда аз [[:$1|$1]] ба унвони баррасишуда аломат хӯрдааст.',
	'revreview-quality'            => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|бокайфият]] аст, ки дар <i>$2</i>  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Пешнавис] қобили '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} вироиш аст]'''; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|тағйир|тағйирот}}] ниёзманди баррасӣ  {{PLURAL:$3|аст|ҳастанд}}.",
	'revreview-quality-same'       => "Ин охирин нусхаи  [[{{MediaWiki:Validationpage}}|бокайфият]] аст, ки дар  <i>$2</i> ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} феҳристи комил]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйид шудааст]. Ин саҳифа қобили  '''[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} тағйир]''' аст.",
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Баррасишуда]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ниг. пешнавис]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Баррасишуда]]''' (фақат тағйироти баррасишуда)",
	'revreview-quick-invalid'      => "'''Нишонаи номӯътабари нусха'''",
	'revreview-quick-none'         => "Нусхаҳои вуруднашудаи '''Феълӣ'''' (на нусхаҳои муруршуда)",
	'revreview-quick-quality'      => "[[{{MediaWiki:Validationpage}}|Мақолаи босифат]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} ниг. пешнавис]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Сифат]]''' (фақат тағйироти баррасишуда)",
	'revreview-quick-see-basic'    => "'''Феълӣ''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} мушоҳидаи нусхаи пойдор]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|тағйир|тағйирот}}])",
	'revreview-quick-see-quality'  => "'''Феълӣ''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} мушоҳидаи нусхаи пойдор]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|тағйир|тағйирот}}])",
	'revreview-selected'           => "Нусхаи интихобшуда аз '''$1:'''",
	'revreview-source'             => 'манбаъи пешнавис',
	'revreview-stable'             => 'Пойдор',
	'revreview-style'              => 'Хоноӣ',
	'revreview-style-0'            => 'Таъйиднашуда',
	'revreview-style-1'            => 'Қобили қабул',
	'revreview-style-2'            => 'Хуб',
	'revreview-style-3'            => 'Мухтасар',
	'revreview-style-4'            => 'Баргузида',
	'revreview-submit'             => 'Сабти баррасӣ',
	'revreview-text'               => 'Нусхаҳои пойдор (ва на охирин нусхаи) ҳар саҳифа ба унвони пешфарзи мӯҳтавои саҳифа танзим шуд.',
	'revreview-toolow'             => 'Шумо бояд ҳар як аз мавориди зеринро ба дараҷаи беш аз  "таъйиднашуда" аломат бизанед, то он нусха баррасишуда ба ҳисоб равад. Барои бебаҳо кардани як нусха, тамоми маворидро "таъйиднашуда" аломат бизанед.',
	'revreview-update'             => "Лутфан тамоми тағйироте (дар зер оварда шудааст), ки пас аз охирин нусхаи пойдор амалӣ шударо  [[{{MediaWiki:Validationpage}}|барраси кунед]], ки аз замоне, ки нусхаи пойдор  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйидшуда] буд.

'''Бархе аз шаблонҳо/аксҳо барӯз шудаанд:'''",
	'revreview-update-none'        => 'Лутфан тамоми тағйироте (дар зер оварда шудааст), ки пас аз охирин нусхаи пойдор амалӣ шударо  [[{{MediaWiki:Validationpage}}|барраси кунед]], ки аз замоне, ки нусхаи пойдор  [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} таъйидшуда] буд.',
	'revreview-visibility'         => "'''Ин саҳифа дорои як  [[{{MediaWiki:Validationpage}}|нусхаи пойдор]] аст, танзимот барои он метавонад   [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} пайкарбандӣ] шавад.'''",
	'rights-editor-autosum'        => 'Ба таври худкор пешбарӣ шудан',
	'rights-editor-revoke'         => 'Ихтиёроти виростор аз [[$1]] гирифта шуд',
	'stable-logentry'              => 'пойдоркунии нусха барои [[$1]]ро танзим кард',
	'stable-logentry2'             => 'пойдоркунии нусха барои [[$1]]ро аз нав кард',
	'stable-logpage'               => 'Гузориши нусхаи пойдор',
	'stable-logpagetext'           => 'Ин гузориши тағйирот аз танзимоти саҳифаҳои мӯҳтавои [[{{MediaWiki:Validationpage}}|нусхаҳои пойдор]] аст.',
	'tooltip-ca-current'           => 'Мушоҳидаи пешнависи феълии ин саҳифа',
	'tooltip-ca-default'           => 'Танзимоти итминони кайфият',
	'tooltip-ca-stable'            => 'Мушоҳидаи нусхаи пойдори ин саҳифа',
	'validationpage'               => '{{ns:help}}:Таъйиди эътибори мақолаҳо',
);

/** Turkish (Türkçe)
 * @author Erkan Yilmaz
 * @author Runningfridgesrule
 * @author Karduelis
 * @author Siebrand
 */
$messages['tr'] = array(
	'editor'                  => 'Editör',
	'flaggedrevs-prefs-watch' => 'İncelediğim sayfaları izleme listeme ekle',
	'group-editor'            => 'Editörler',
	'group-editor-member'     => 'Editör',
	'group-reviewer'          => 'Eleştirmenler',
	'group-reviewer-member'   => 'Eleştirmen',
	'grouppage-editor'        => '{{ns:project}}:Editör',
	'grouppage-reviewer'      => '{{ns:project}}:Eleştirmen',
	'hist-quality'            => 'kalite revizyon',
	'review-logentry-id'      => 'revizyon ID $1',
	'reviewer'                => 'Eleştirmen',
	'revreview-accuracy'      => 'Doğruluk',
	'revreview-accuracy-0'    => 'Onaylanmamış',
	'revreview-accuracy-2'    => 'Doğru',
	'revreview-accuracy-3'    => 'Yeterince kaynak verildi',
	'revreview-auto'          => '(otomatik)',
	'revreview-current'       => 'Taslak',
	'revreview-depth'         => 'Derinlik',
	'revreview-depth-1'       => 'Basit',
	'revreview-depth-2'       => 'Orta',
	'revreview-depth-3'       => 'Yüksek',
	'revreview-log'           => 'Açıklama:',
	'revreview-stable'        => 'Sabit',
	'revreview-style'         => 'Okunaklılık',
	'revreview-style-1'       => 'Geçerli',
	'revreview-style-2'       => 'İyi',
	'tooltip-ca-default'      => 'Kalite güvencesi ayarlar',
);

/** Ukrainian (Українська)
 * @author Ahonc
 */
$messages['uk'] = array(
	'editor'                   => 'редактор',
	'flaggedrevs'              => 'Позначені версії',
	'flaggedrevs-backlog'      => "Наявне відставання у перевірці сторінок, див. [[Special:OldReviewedPages|Застарілі перевірені сторінки]]. '''Будь ласка, зверніть увагу!'''",
	'flaggedrevs-desc'         => 'Надає можливість редакторам і рецензентам переглядати версії сторінок і встановлювати стабільні версії',
	'flaggedrevs-pref-UI-0'    => 'Використовувати докладний інтерфейс стабільних версій',
	'flaggedrevs-pref-UI-1'    => 'Використовувати простий інтерфейс стабільних версій',
	'flaggedrevs-prefs'        => 'Стабільні версії',
	'flaggedrevs-prefs-stable' => 'Завжди показувати за замовчуванням стабільну версію (якщо така є)',
	'flaggedrevs-prefs-watch'  => 'Додавати перевірені мною сторінки до списку спостереження',
	'group-editor'             => 'Редактори',
	'group-editor-member'      => 'редактор',
	'group-reviewer'           => 'Рецензенти',
	'group-reviewer-member'    => 'рецензент',
	'grouppage-editor'         => '{{ns:project}}:Редактори',
	'grouppage-reviewer'       => '{{ns:project}}:Рецензенти',
	'hist-draft'               => 'чорнова версія',
	'hist-quality'             => 'якісна версія',
	'hist-quality-user'        => '[{{fullurl:$1|stableid=$2}} вивірена] користувачем [[User:$3|$3]]',
	'hist-stable'              => 'переглянута версія',
	'hist-stable-user'         => '[{{fullurl:$1|stableid=$2}} переглянута] користувачем [[User:$3|$3]]',
	'review-diff2stable'       => 'Показати відмінності між стабільною і поточною версіями',
	'review-logentry-app'      => 'перевірена [[$1]]',
	'review-logentry-dis'      => 'застаріла версія [[$1]]',
	'review-logentry-id'       => 'ідентифікатор версії $1',
	'review-logentry-diff'     => 'різниця зі стабільною',
	'review-logpage'           => 'Журнал перевірок',
	'review-logpagetext'       => 'Це журнал змін [[{{MediaWiki:Validationpage}}|затверджених]] статусів версій сторінок.
Див. [[Special:ReviewedPages|список перевірених сторінок]].',
	'reviewer'                 => 'рецензент',
	'revisionreview'           => 'Перевірка версій',
	'revreview-accuracy'       => 'Точність',
	'revreview-accuracy-0'     => 'не зазначена',
	'revreview-accuracy-1'     => 'переглянута',
	'revreview-accuracy-2'     => 'точна',
	'revreview-accuracy-3'     => 'з джерелами',
	'revreview-accuracy-4'     => 'вибрана',
	'revreview-approved'       => 'Перевірена',
	'revreview-auto'           => '(автоматично)',
	'revreview-auto-w'         => "Ви редагуєте стабільну версію, зміни будуть '''автоматично позначені як перевірені'''.",
	'revreview-auto-w-old'     => "Ви редагуєте перевірену версію, зміни будуть '''автоматично позначені як перевірені'''.",
	'revreview-basic'          => 'Це остання [[{{MediaWiki:Validationpage}}|переглянута]] версія; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|редагування|редагування|редагувань}}] [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетки] {{PLURAL:$3|очікує|очікують|очікують}} перевірки.',
	'revreview-basic-i'        => 'Це остання [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} переглянута] версія; [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} перевірена] <i>$2</i>.
У [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} чернетці] є [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} зміни в шаблонах або зображеннях], що потребують перевірки.',
	'right-autopatrolother'    => 'Автоматичне позначення версій сторінок у неосновному просторі назв патрульованими',
	'right-autoreview'         => 'Автоматичне позначення версій сторінок переглянутими',
	'right-movestable'         => 'Перейменування стабільних версій',
	'right-review'             => 'Позначення версій сторінок переглянутими',
	'right-stablesettings'     => 'Налаштування вибору і відображення стабільної версії',
	'right-validate'           => 'Позначення версій сторінок вивіреними',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'editor'                       => 'Contributor',
	'flaggedrevs'                  => 'Revision marcade',
	'flaggedrevs-backlog'          => "Ghe xe del laoro aretrato da far su le [[Special:OldReviewedPages|pagine riesaminà tenpo adrìo]]. '''Ghe xe bisogno de la to atension!'''",
	'flaggedrevs-desc'             => 'I contribudori e i revisori i pode controlar le revision e stabilizar le pagine',
	'flaggedrevs-pref-UI-0'        => "Dòpara l'interfacia utente de la version stabile detaglià",
	'flaggedrevs-pref-UI-1'        => "Dòpara l'interfacia utente de la version stabile sénpliçe",
	'flaggedrevs-prefs'            => 'Stabilità',
	'flaggedrevs-prefs-stable'     => 'Mostra sempre par default la version stabile de le pagine (se ghe ne esiste una)',
	'flaggedrevs-prefs-watch'      => "Tien d'ocio le pagine che riesamino",
	'group-editor'                 => 'Contributori',
	'group-editor-member'          => 'Contributor',
	'group-reviewer'               => 'Revisori',
	'group-reviewer-member'        => 'Revisor',
	'grouppage-editor'             => '{{ns:project}}:Contributor',
	'grouppage-reviewer'           => '{{ns:project}}:Revisor',
	'hist-draft'                   => 'version bozza',
	'hist-quality'                 => 'revision de qualità',
	'hist-quality-user'            => '[{{fullurl:$1|stableid=$2}} convalidà] da [[User:$3|$3]]',
	'hist-stable'                  => 'version rivardà',
	'hist-stable-user'             => '[{{fullurl:$1|stableid=$2}} rivardà] da [[User:$3|$3]]',
	'review-diff2stable'           => 'Varda i canbiamenti tra la version stabile e quela atuale',
	'review-logentry-app'          => 'riesaminà [[$1]]',
	'review-logentry-dis'          => 'gà sbassà de livèl na version de [[$1]]',
	'review-logentry-id'           => 'Nùmaro de revision $1',
	'review-logentry-diff'         => 'difarensa da la version stabile',
	'review-logpage'               => 'Registro de le riesaminassion',
	'review-logpagetext'           => 'Sto qua el xe un registro de le modifiche al stato de [[{{MediaWiki:Validationpage}}|aprovassion]] de le pagine.
Varda la [[Special:ReviewedPages|lista de le pagine riesaminà]] par védar quale xe le pagine aprovà.',
	'reviewer'                     => 'Revisor',
	'revisionreview'               => 'Riesamina versioni',
	'revreview-accuracy'           => 'Acuratessa',
	'revreview-accuracy-0'         => 'Non aprovà',
	'revreview-accuracy-1'         => 'Rivardà',
	'revreview-accuracy-2'         => 'Acurato',
	'revreview-accuracy-3'         => 'Ben fornìa de fonti',
	'revreview-accuracy-4'         => 'De qualità',
	'revreview-approved'           => 'Aprovà',
	'revreview-auto'               => '(automatico)',
	'revreview-auto-w'             => "Te sì drio modificar la version stabile; le modifiche le vegnarà '''automaticamente riesaminà'''.",
	'revreview-auto-w-old'         => "Te sì drio modificar na version che xera stà esaminà; le modifiche le vegnarà '''automaticamente riesaminà'''.",
	'revreview-basic'              => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|rivardà]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la gà [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|modifica|modifiche}}] che speta de vegner esaminà.",
	'revreview-basic-i'            => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|rivardà]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la gà [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modifiche a template e/o imagini] che speta de vegner esaminà.",
	'revreview-basic-old'          => "Sta qua la xe na version [[{{MediaWiki:Validationpage}}|rivardà]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Po' darse che sia stà fati [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} canbiamenti novi].",
	'revreview-basic-same'         => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|rivardà]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.",
	'revreview-basic-source'       => 'Na [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version rivardà] de sta pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>, le xe stà basà su sta version.',
	'revreview-changed'            => "'''Su sta version de [[:$1|$1]] no se pode eseguir l'azion richiesta.'''

Podarìa èssar stà richiesto un template o na imagine sensa prima specificar na version.
Questo pode capitar se un template dinamico l'include n'altro template o imagine in base a na variabile che xe canbià da quando ti gà tacà a riesaminar sta pagina.
Par risolvar el problema próa a rinfrescar la pagina e tacar da novo a riesaminar la voçe.",
	'revreview-current'            => 'Bozza',
	'revreview-depth'              => 'Profondità',
	'revreview-depth-0'            => 'Non aprovà',
	'revreview-depth-1'            => 'De base',
	'revreview-depth-2'            => 'Moderata',
	'revreview-depth-3'            => 'Alta',
	'revreview-depth-4'            => 'De qualità',
	'revreview-draft-title'        => "Bozza de l'articolo",
	'revreview-edit'               => 'Modifica bozza',
	'revreview-edited'             => "'''Le modifiche le vegnarà incorporà in te la [[{{MediaWiki:Validationpage}}|version stabile]] 'pena che un utente autorizà el ie esamina.
La ''bozza'' la xe mostrà qua soto.''' [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|modifica la|modifiche le}} speta] de vegner esaminà.",
	'revreview-flag'               => 'Riesamina sta version',
	'revreview-invalid'            => "'''Destinassion mìa valida:''' el nùmaro fornìo no'l corisponde a nissuna version [[{{MediaWiki:Validationpage}}|riesaminà]].",
	'revreview-legend'             => 'Valuta el contenuto de la version',
	'revreview-log'                => 'Comento:',
	'revreview-main'               => 'Ti gà da selessionar na version in particolare de la pagina par esaminarla.

Ti pol anca vardar la [[Special:Unreviewedpages|lista de pagine da riesaminar]].',
	'revreview-newest-basic'       => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version rivardà] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|la|le}} gà da vegner esaminà.",
	'revreview-newest-basic-i'     => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version rivardà] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Ghe xe dei [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} canbiamenti a template e/o imagini] che speta de vegner esaminà.",
	'revreview-newest-quality'     => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version de qualità] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|modifica|modifiche}}] {{PLURAL:$3|la|le}} gà da èssar esaminà.",
	'revreview-newest-quality-i'   => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} ultima version de qualità] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]) la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Ghe xe dele [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modifiche a template e/o imagine] che speta de vegner esaminà.",
	'revreview-noflagged'          => "No ghe xe version riesaminà de sta voçe, quindi podarìa '''no''' èssar stà [[{{MediaWiki:Validationpage}}|controlà]] la so qualità.",
	'revreview-note'               => '[[User:$1]] el gà fato le seguenti anotassion [[{{MediaWiki:Validationpage}}|riesaminando]] sta version:',
	'revreview-notes'              => 'Osservassioni o note da far védar:',
	'revreview-oldrating'          => 'La xe stà giudicà:',
	'revreview-patrol'             => 'Segna sta modifica come ricontrolà',
	'revreview-patrol-title'       => 'Segna come patuglià',
	'revreview-patrolled'          => 'La version de [[:$1|$1]] selessionà la xe stà marcada come controlà.',
	'revreview-quality'            => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|de qualità]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la gà [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|modifica|modifiche}}] che speta de vegner esaminà.",
	'revreview-quality-i'          => "Sta qua la xe l'ultima version [[{{MediaWiki:Validationpage}}|de qualità]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} bozza] la presenta dele [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} modifiche a template e/o imagini] che speta de vegner esaminà.",
	'revreview-quality-old'        => 'Sta qua la xe na version [[{{MediaWiki:Validationpage}}|de qualità]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.
Xe stà fato dei [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} canbiamenti] novi.',
	'revreview-quality-same'       => "Sta qua la xe l'ultima revision [[{{MediaWiki:Validationpage}}|de qualità]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} elenco conpleto]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>.",
	'revreview-quality-source'     => 'Na [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} version de qualità] de sta pagina, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà] el <i>$2</i>, la xe basà su sta revision.',
	'revreview-quality-title'      => 'Articolo de qualità',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Voçe rivardà]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Voçe rivardà]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Voçe rivardà]]'''",
	'revreview-quick-invalid'      => "'''Nùmaro de revision mìa valido'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Version atuale]]''' (non riesaminà)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualità]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} varda bozza]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Pagina de qualità]]'''",
	'revreview-quick-see-basic'    => "'''Bozza''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} varda la pagina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} confronta])",
	'revreview-quick-see-quality'  => "'''Bozza''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} varda la pagina]]
([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} confronta])",
	'revreview-selected'           => "Revision selessionà de '''$1:'''",
	'revreview-source'             => 'Còdese sorgente de la bozza',
	'revreview-stable'             => 'Pagina stabile',
	'revreview-stable-title'       => 'Bozza de la voçe',
	'revreview-stable1'            => 'Ti pol vardar sta [{{fullurl:$1|stableid=$2}} version marcàda] par védar se desso la xe la [{{fullurl:$1|stable=1}} version stabile] de sta pagina.',
	'revreview-stable2'            => "Te pol vardar la [{{fullurl:$1|stable=1}} version stabile] de sta pagina (se ghe n'è una).",
	'revreview-style'              => 'Legibilità',
	'revreview-style-0'            => 'Non aprovà',
	'revreview-style-1'            => 'Açetàbile',
	'revreview-style-2'            => 'Bona',
	'revreview-style-3'            => 'Concisa',
	'revreview-style-4'            => 'De qualità',
	'revreview-submit'             => 'Inoltra riesaminassion',
	'revreview-successful'         => "'''La revision selezionà de [[:$1|$1]] la xe stà marcàda. ([{{fullurl:Special:Stableversions|page=$2}} varda tute le version marcàde])'''",
	'revreview-successful2'        => "'''Cavà el contrassegno a la version selessionà de [[:$1|$1]].'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Le versioni stabili]] le xe el contenuto predefinìo par i visitatori, al posto de la version pi reçente.''",
	'revreview-text2'              => "''Le [[{{MediaWiki:Validationpage}}|version stabili]] le xe revisioni de pagine che xe stà controlà e che pode vegner mostrà come contenuto predefinìo par i visitatori.''",
	'revreview-toggle-title'       => 'mostra/scondi detagli',
	'revreview-toolow'             => 'Ti gà da segnar ognuno dei atributi qua soto piessè alto de "Non aprovà" perché la version la sia considerà riesaminà.
Par declassar na version, segna tuti i canpi come "Non aprovà".',
	'revreview-update'             => "Par piaser [[{{MediaWiki:Validationpage}}|esamina]] tuti i canbiamenti ''(mostra qua soto)'' fati da quando la version stabile la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà].<br />
'''Alcuni template e/o imagini i xe stà canbià:'''",
	'revreview-update-includes'    => "'''Alcuni template o imagini le xe stà agiornà:'''",
	'revreview-update-none'        => "Par piaser [[{{MediaWiki:Validationpage}}|esamina]] tuti i canbiamenti ''(mostra qua soto)'' fati da quando la version stabile la xe stà [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovà].",
	'revreview-update-use'         => "'''OCIO:''' Se qualchedun de sti template o imagini el gà na version stabile, alora el xe xà doparà in te la version stabile de sta pagina.",
	'revreview-diffonly'           => "''Par riesaminar la pagine, struca el colegamento \"revision corente\" e dòpara el modulo de riesame.''",
	'revreview-visibility'         => "'''Sta pagina la gà na [[{{MediaWiki:Validationpage}}|version stabile]]; le so inpostassion le pol èssar [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configuràe].'''",
	'right-autopatrolother'        => 'Marca automaticamente le revision come controlà in namespace diversi da quel prinçipal',
	'right-autoreview'             => 'Marca automaticamente le revision come "viste"',
	'right-movestable'             => 'Sposta le pagine stabili',
	'right-review'                 => 'Marca le revision come "viste"',
	'right-stablesettings'         => 'Configura come la version stabile la sia selessionà e mostrà',
	'right-validate'               => 'Segna le revision come convalidà',
	'rights-editor-autosum'        => 'autopromosso',
	'rights-editor-revoke'         => 'gà revocà i diriti de modificador de [[$1]]',
	'specialpages-group-quality'   => 'Controlo de qualità',
	'stable-logentry'              => 'inpostà versionamento stabile par [[$1]]',
	'stable-logentry2'             => 'resetar el versionamento stabile par [[$1]]',
	'stable-logpage'               => 'Registro de stabilità',
	'stable-logpagetext'           => 'Sto qua el xe un registro dei cambiamenti a la configurassion de le [[{{MediaWiki:Validationpage}}|version stabili]] de le pagine.
Na lista de le pagine stabilizà se pol catarla in [[Special:StablePages|lista de le pagine stabili]].',
	'tooltip-ca-current'           => 'Varda la bozza corente de sta pagina',
	'tooltip-ca-default'           => 'Inpostassion par el controlo de qualità',
	'tooltip-ca-stable'            => 'Varda la version stabile de sta pagina',
	'validationpage'               => '{{ns:help}}:Validassion dei articoli',
);

/** Vietnamese (Tiếng Việt)
 * @author Vinhtantran
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'editor'                       => 'Người viết bài',
	'flaggedrevs'                  => 'Các bản được đánh dấu',
	'flaggedrevs-backlog'          => "Hiện có một nhật trình tại [[Special:OldReviewedPages|Các trang đã duyệt nhưng lạc hậu]]. '''Cần bạn chú ý!'''",
	'flaggedrevs-desc'             => 'Cung cấp cho người viết và người duyệt bài khả năng phê chuẩn phiên bản và ổn định trang',
	'flaggedrevs-pref-UI-0'        => 'Sử dụng giao diện người dùng phiên bản ổn định chi tiết',
	'flaggedrevs-pref-UI-1'        => 'Sử dụng giao diện người dùng phiên bản ổn định đơn giản',
	'flaggedrevs-prefs'            => 'Tính ổn định',
	'flaggedrevs-prefs-stable'     => 'Luôn hiển thị bản nội dung ổn định của trang theo mặc định (nếu có)',
	'flaggedrevs-prefs-watch'      => 'Thêm trang tôi duyệt vào danh sách theo dõi',
	'group-editor'                 => 'Người viêt bài',
	'group-editor-member'          => 'Người viết bài',
	'group-reviewer'               => 'Người duyệt bài',
	'group-reviewer-member'        => 'Người duyệt bài',
	'grouppage-editor'             => '{{ns:project}}:Người viết bài',
	'grouppage-reviewer'           => '{{ns:project}}:Người duyệt bài',
	'hist-draft'                   => 'phiên bản nháp',
	'hist-quality'                 => 'bản chất lượng cao',
	'hist-quality-user'            => '[[User:$3|$3]] [{{fullurl:$1|stableid=$2}} đã phê chuẩn]',
	'hist-stable'                  => 'bản đã xem qua',
	'hist-stable-user'             => '[[User:$3|$3]] [{{fullurl:$1|stableid=$2}} đã xem qua]',
	'review-diff2stable'           => 'So sánh phiên bản ổn định với bản hiện hành',
	'review-logentry-app'          => 'đã duyệt [[$1]]',
	'review-logentry-dis'          => 'đã đánh giá thấp hơn cho một phiên bản của [[$1]]',
	'review-logentry-id'           => 'phiên bản mã số $1',
	'review-logentry-diff'         => 'so với bản ổn định',
	'review-logpage'               => 'Nhật trình duyệt',
	'review-logpagetext'           => 'Đây là nhật trình ghi lại những thay đổi đối với tình trạng [[{{MediaWiki:Validationpage}}|phê chuẩn]] cho nội dung trang.
Xem [[Special:ReviewedPages|danh sách các trang đã duyệt]] để có danh sách các trang đã phê chuẩn.',
	'reviewer'                     => 'Người duyệt bài',
	'revisionreview'               => 'Các bản đã duyệt',
	'revreview-accuracy'           => 'Độ chính xác',
	'revreview-accuracy-0'         => 'Chưa phê chuẩn',
	'revreview-accuracy-1'         => 'Đã xem qua',
	'revreview-accuracy-2'         => 'Chính xác',
	'revreview-accuracy-3'         => 'Đầy đủ nguồn',
	'revreview-accuracy-4'         => 'Rất tốt',
	'revreview-approved'           => 'Đã phê chuẩn',
	'revreview-auto'               => '(tự động)',
	'revreview-auto-w'             => "Bạn đang sửa đổi bản ổn định; những thay đổi sẽ '''tự động được duyệt'''.",
	'revreview-auto-w-old'         => "Bạn đang sửa đổi một bản đã duyệt trước đây; những thay đổi của bạn sẽ '''tự động được duyệt'''.",
	'revreview-basic'              => 'Đây là bản [[{{MediaWiki:Validationpage}}|đã xem qua]] mới nhất, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản phác thảo] có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] chờ duyệt.',
	'revreview-basic-i'            => 'Đây là phiên bản [[{{MediaWiki:Validationpage}}|được xem qua]] mới nhất, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản nháp] có các [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} thay đổi tiêu bản/hình ảnh] đang chờ được duyệt.',
	'revreview-basic-old'          => 'Đây là một bản [[{{MediaWiki:Validationpage}}|đã xem qua]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tất cả]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
Đã có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} những sửa đổi] mới.',
	'revreview-basic-same'         => 'Đây là bản [[{{MediaWiki:Validationpage}}|đã xem qua]] mới nhất ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} xem tất cả]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.',
	'revreview-basic-source'       => 'Một [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bản đã xem qua] của trang này, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>, 
khác với bản này.',
	'revreview-changed'            => "'''Không thể thực hiện tác vụ yêu cầu đối với phiên bản này của [[:$1|$1]].'''

Một tiêu bản hoặc hình ảnh có thể được yêu cầu mà chưa chỉ định phiên bản cụ thể.
Điều này có thể xảy ra nếu một tiêu bản động nhúng một hình hoặc tiêu bản khác phụ thuộc vào một biến, biến đó đã thay đổi từ khi bạn bắt đầu duyệt trang này.
Làm tươi trang và duyệt lại có thể giải quyết vấn đề này.",
	'revreview-current'            => 'Bản phác thảo',
	'revreview-depth'              => 'Chiều sâu',
	'revreview-depth-0'            => 'Chưa phê chuẩn',
	'revreview-depth-1'            => 'Cơ bản',
	'revreview-depth-2'            => 'Trung bình',
	'revreview-depth-3'            => 'Cao',
	'revreview-depth-4'            => 'Rất tốt',
	'revreview-draft-title'        => 'Bài viết nháp',
	'revreview-edit'               => 'Sửa đổi bản phác thảo',
	'revreview-edited'             => "'''Những sửa đổi sẽ được đưa vào [[{{MediaWiki:Validationpage}}|bản ổn định]] ngay khi được một thành viên được chỉ định duyệt qua.
Dưới đây là ''bản phác thảo''.''' Có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $2 {{PLURAL:$2|thay đổi|thay đổi}}] đang chờ được duyệt.",
	'revreview-flag'               => 'Duyệt phiên bản này',
	'revreview-invalid'            => "'''Không hợp lệ:''' không có bản [[{{MediaWiki:Validationpage}}|đã duyệt]] tương ứng với ID được cung cấp.",
	'revreview-legend'             => 'Xếp hạng nội dung phiên bản',
	'revreview-log'                => 'Nhận xét:',
	'revreview-main'               => 'Bạn phải chọn một phiên bản cụ thể từ một trang nội dung để duyệt.

Mời xem danh sách các trang chưa được duyệt tại [[Special:Unreviewedpages]].',
	'revreview-newest-basic'       => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Bản đã xem qua mới nhất] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tất cả]) đã được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] {{PLURAL:$3|cần|cần}} duyệt.',
	'revreview-newest-basic-i'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Phiên bản được xem qua cuối cùng] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} xem tất cả]) được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Thay đổi tiêu bản/hình ảnh] cần duyệt.',
	'revreview-newest-quality'     => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Bản chất lượng mới nhất] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tất cả]) được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] {{PLURAL:$3|cần|cần}} duyệt.',
	'revreview-newest-quality-i'   => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Bản chất lượng mới nhất] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} xem tất cả]) đã được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} Thay đổi tiêu bản/hình ảnh] cần duyệt qua.',
	'revreview-noflagged'          => "Không tìm thấy bản đã được duyệt của trang, do đó có thể nó '''chưa''' được [[{{MediaWiki:Validationpage}}|kiểm tra]] chất lượng.",
	'revreview-note'               => '[[User:$1]] đã ghi chú như sau khi [[{{MediaWiki:Validationpage}}|duyệt]] bản này:',
	'revreview-notes'              => 'Nhận xét hoặc ghi chú sẽ hiển thị:',
	'revreview-oldrating'          => 'Được xếp hạng:',
	'revreview-patrol'             => 'Đánh dấu tuần tra sửa đổi này',
	'revreview-patrol-title'       => 'Đánh dấu đã tuần tra',
	'revreview-patrolled'          => 'Bản được chọn của [[:$1|$1]] đã được đánh dấu đã tuần tra.',
	'revreview-quality'            => 'Đây là bản [[{{MediaWiki:Validationpage}}|chất lượng]] mới nhất, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản phác thảo] có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3 {{PLURAL:$3|thay đổi|thay đổi}}] chờ duyệt.',
	'revreview-quality-i'          => 'Đây là phiên bản [[{{MediaWiki:Validationpage}}|chất lượng]] mới nhất, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được chứng nhận] vào <i>$2</i>.
[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Bản nháp] có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} thay đổi tiêu bản/hình ảnh] chờ được duyệt.',
	'revreview-quality-old'        => 'Đây là một bản [[{{MediaWiki:Validationpage}}|chất lượng]] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} tất cả]), [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.
Có thể đã có [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} những sửa đổi] mới.',
	'revreview-quality-same'       => 'Đây là bản [[{{MediaWiki:Validationpage}}|chất lượng]] mới nhất ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} xem tất cả]),
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>.',
	'revreview-quality-source'     => 'Một [{{fullurl:{{FULLPAGENAMEE}}|stableid=$1}} bản chất lượng] của trang này, [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} được phê chuẩn] vào <i>$2</i>, khác với bản này.',
	'revreview-quality-title'      => 'Bài viết chất lượng',
	'revreview-quick-basic'        => "'''[[{{MediaWiki:Validationpage}}|Bài đã xem qua]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-basic-old'    => "'''[[{{MediaWiki:Validationpage}}|Bài đã xem qua]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-basic-same'   => "'''[[{{MediaWiki:Validationpage}}|Bài đã xem qua]]'''",
	'revreview-quick-invalid'      => "'''ID phiên bản không hợp lệ'''",
	'revreview-quick-none'         => "'''[[{{MediaWiki:Validationpage}}|Bản hiện hành]]''' (chưa duyệt)",
	'revreview-quick-quality'      => "'''[[{{MediaWiki:Validationpage}}|Bài chất lượng]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-quality-old'  => "'''[[{{MediaWiki:Validationpage}}|Bài chất lượng]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} xem bản phác thảo]]",
	'revreview-quick-quality-same' => "'''[[{{MediaWiki:Validationpage}}|Bài chất lượng]]'''",
	'revreview-quick-see-basic'    => "'''Bản phác thảo''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} xem bài viết]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} so sánh])",
	'revreview-quick-see-quality'  => "'''Bản phác thảo''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} xem bài viết]] ([{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} so sánh])",
	'revreview-selected'           => "Phiên bản được chọn của '''$1''':",
	'revreview-source'             => 'mã nguồn của bản phác thảo',
	'revreview-stable'             => 'Trang ổn định',
	'revreview-stable-title'       => 'Bài viết đã xem qua',
	'revreview-stable1'            => 'Bạn có thể muốn xem [{{fullurl:$1|stableid=$2}} bản có cờ này] để xem nó có phải là [{{fullurl:$1|stable=1}} bản ổn định] của trang này hay chưa.',
	'revreview-stable2'            => 'Bạn có thể muốn xem [{{fullurl:$1|stable=1}} bản ổn định] của trang này (nếu vẫn còn bản như vậy).',
	'revreview-style'              => 'Độ dễ đọc',
	'revreview-style-0'            => 'Chưa phê chuẩn',
	'revreview-style-1'            => 'Chấp nhận được',
	'revreview-style-2'            => 'Tốt',
	'revreview-style-3'            => 'Súc tích',
	'revreview-style-4'            => 'Rất tốt',
	'revreview-submit'             => 'Đăng bản duyệt',
	'revreview-successful'         => "'''Phiên bản được chọn của [[:$1|$1]] đã được gắn cờ.
([{{fullurl:Special:Stableversions|page=$2}} xem tất cả các phiên bản có cờ])'''",
	'revreview-successful2'        => "'''Phiên bản được chọn của [[:$1|$1]] đã được bỏ cờ thành công.'''",
	'revreview-text'               => "''[[{{MediaWiki:Validationpage}}|Phiên bản ổn định]] là nội dung trang mặc định mà người dùng nhìn thấy chứ không phải phiên bản mới nhất.''",
	'revreview-text2'              => "''[[{{MediaWiki:Validationpage}}|Bản ổn định]] được kiểm tra phiên bản của trang và có thể thiết lập làm nội dung mặc định cho người xem.''",
	'revreview-toggle-title'       => 'hiện/ẩn chi tiết',
	'revreview-toolow'             => 'Ít nhất bạn phải xếp hạng mỗi thuộc tính dưới đây cao hơn "chưa phê chuẩn" để một phiên bản có thể được xem là được duyệt.
Để hạ cấp một phiên bản, hãy chọn tất cả các thuộc tính "chưa phê chuẩn".',
	'revreview-update'             => "Xin hãy [[{{MediaWiki:Validationpage}}|duyệt]] bất kỳ thay đổi nào ''(xem ở dưới)'' đã được thực hiện từ khi bản ổn định được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn].<br/>
'''Một số tiêu bản/hình ảnh được cập nhật:'''",
	'revreview-update-includes'    => "'''Một số tiêu bản/hình ảnh được cập nhật:'''",
	'revreview-update-none'        => "Xin hãy [[{{MediaWiki:Validationpage}}|duyệt]] bất kỳ thay đổi nào ''(xem ở dưới)'' đã được thực hiện từ khi bản ổn định được [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} phê chuẩn].",
	'revreview-update-use'         => "'''GHI CHÚ:''' Nếu bất kỳ tiêu bản/hình ảnh nào có một phiên bản ổn định, nó đã được dùng trong phiên bản ổn định của trang này.",
	'revreview-diffonly'           => "''Để duyệt trang, hãy nhấn chuột vào liên kết “phiên bản hiện hành” và điền vào biểu mẫu duyệt trang.''",
	'revreview-visibility'         => "'''Trang này có một [[{{MediaWiki:Validationpage}}|bản ổn định]]; có thể [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} cấu hình] thiết lập cho nó.'''",
	'right-autopatrolother'        => 'Tự động đánh dấu phiên bản trong không gian tên không phải bài viết đã tuần tra',
	'right-autoreview'             => 'Tự động đánh dấu phiên bản là đã xem qua',
	'right-movestable'             => 'Di chuyển trang ổn định',
	'right-review'                 => 'Đánh dấu phiên bản đã xem qua',
	'right-stablesettings'         => 'Cấu hình cho phiên bản ổn định được lựa chọn và hiển thị như thế nào',
	'right-validate'               => 'Đánh dấu phiên bản đã phê chuẩn',
	'rights-editor-autosum'        => 'tự phong cờ',
	'rights-editor-revoke'         => 'đưa [[$1]] ra khỏi nhóm viết bài',
	'specialpages-group-quality'   => 'Đảm bảo chất lượng',
	'stable-logentry'              => 'đã thiết lập phiên bản ổn định cho [[$1]]',
	'stable-logentry2'             => 'mặc định lại phiên bản ổn định của [[$1]]',
	'stable-logpage'               => 'Nhật trình ổn định hóa',
	'stable-logpagetext'           => 'Đây là nhật trình ghi lại những thay đổi đối với cấu hình [[{{MediaWiki:Validationpage}}|bản ổn định]] của nội dung trang.
Danh sách các trang ổn định có thể tìm thấy tại [[Special:StablePages|danh sách trang ổn định]].',
	'tooltip-ca-current'           => 'Xem bản phác thảo hiện hành của trang này',
	'tooltip-ca-default'           => 'Thiết lập về bảo đảm chất lượng',
	'tooltip-ca-stable'            => 'Xem bản ổn định của trang này',
	'validationpage'               => '{{ns:help}}:Phê chuẩn bài viết',
);

/** Volapük (Volapük)
 * @author Smeira
 * @author Malafaya
 * @author Siebrand
 */
$messages['vo'] = array(
	'editor'                      => 'Redakan',
	'flaggedrevs-desc'            => 'Dälon redakanes/krütanes ad zepön fomamis/votükamis ed ad fümöfükön padis',
	'group-editor'                => 'Redakans',
	'group-editor-member'         => 'Redakan',
	'group-reviewer'              => 'Krütans',
	'group-reviewer-member'       => 'Krütan',
	'grouppage-editor'            => '{{ns:project}}:Redakan',
	'grouppage-reviewer'          => '{{ns:project}}:Krütan',
	'hist-quality'                => 'kalietakrüt',
	'hist-stable'                 => 'fomam pelogöl',
	'review-diff2stable'          => 'Votükams vü fomam fümöfik e fomam anuik',
	'review-logentry-app'         => 'ekrüton padi: [[$1]]',
	'review-logentry-dis'         => 'ecödon fomami pada: [[$1]] läs gudiki',
	'review-logentry-id'          => 'dientifakot fomama: $1',
	'review-logpage'              => 'Lised yegedikrütamas',
	'review-logpagetext'          => 'Is palisedons votükams [[{{MediaWiki:Validationpage}}|zepastada]] padas ninädilabik.',
	'reviewer'                    => 'Krütan',
	'revisionreview'              => 'Logön krütamis',
	'revreview-accuracy-0'        => 'No pezepöl',
	'revreview-accuracy-3'        => 'Labü fonäts',
	'revreview-auto'              => '(itjäfidik)',
	'revreview-auto-w'            => "Anu redakol fomami fümöfik: votükams seimik '''pokrütons itjäfidiko'''. Logolös, begö! büologedi pada at büä odakipon oni.",
	'revreview-auto-w-old'        => "Anu redakol fomami büik: votükams valik '''pokrütons itjäfidiko'''. Logolös, begö! büologedi pada at büä odakipol oni.",
	'revreview-basic'             => 'Fomam at binon [[{{MediaWiki:Validationpage}}|fomam pelogöl lätik]], kel
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon] tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Riget]
kanon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} pavotükön]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|votükam|votükams}} $3] nog
{{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-current'           => 'Riget',
	'revreview-depth'             => 'Dib',
	'revreview-depth-0'           => 'No pezepöl',
	'revreview-depth-1'           => 'Staböfik',
	'revreview-depth-2'           => 'Zänedik',
	'revreview-depth-3'           => 'Löpik',
	'revreview-edit'              => 'Redakön rigeti',
	'revreview-flag'              => 'Krütön fomami at',
	'revreview-legend'            => 'Dadilädön ninädi',
	'revreview-log'               => 'Küpet:',
	'revreview-main'              => 'Mutol välön fomami semik pada ninädilabik ad krütön oni.

Logolös padi: [[Special:Unreviewedpages]], su kel dabinon lised padas no nog pekrütölas.',
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Fomam pelogöl lätik]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lisedön valikis]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon]
tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|votükam|votükams}} $3] {{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-newest-quality'    => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} Krüt lätik tefü kaliet]
([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} lisedön valikis]) [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon]
tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|votükam|votükams}} $3] {{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-noflagged'         => "No dabinons fomams pekrütöl pada at; ba '''no''' [[{{MediaWiki:Validationpage}}|pekontrolon]] tefü kaliet.",
	'revreview-note'              => '[[User:$1]] äpenon küpetis sököl dü [[{{MediaWiki:Validationpage}}|krütam]] padafomama at:',
	'revreview-notes'             => 'Küpets ad pajonön:',
	'revreview-oldrating'         => 'Pädadilädon as:',
	'revreview-patrol'            => 'Malön votükami at as pezepöl',
	'revreview-patrolled'         => 'Fomam at pada: [[:$1|$1]] pefümükon.',
	'revreview-quality'           => 'Is logoy [[{{MediaWiki:Validationpage}}|krüti lätik tefü kaliet]], kel
[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon] tü <i>$2</i>. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} Riget]
kanon [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} pavotükön]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$3|votükam|votükams}} $3]
{{PLURAL:$3|nedon|nedons}} pakrütön.',
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|Pelogon]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} logön rigeti]]",
	'revreview-quick-none'        => "'''Anuik''' (nen fomams pekrütöl)",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|Kaliet]]''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} logön rigeti]]",
	'revreview-quick-see-basic'   => "'''Riget''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} logön yegedi fümöfik]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|votükam|votükams}}])",
	'revreview-quick-see-quality' => "'''Riget''' [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} logön yegedi fümöfik]]
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} {{PLURAL:$2|votükam|votükams}}])",
	'revreview-selected'          => "Krütam pevälöl pada: '''$1:'''",
	'revreview-source'            => 'rigetafonät',
	'revreview-stable'            => 'Fümöfik',
	'revreview-style'             => 'Reidov',
	'revreview-style-0'           => 'No pezepöl',
	'revreview-style-1'           => 'Zepabik',
	'revreview-style-2'           => 'Gudik',
	'revreview-style-3'           => 'Naböfik',
	'revreview-submit'            => 'Sedön krüti',
	'revreview-text'              => 'Fomams fümöfik - no fomams nulikün! - binons uts, kels pajonons, ven pad palogon.',
	'revreview-update'            => "[[{{MediaWiki:Validationpage}}|Reidolös e krütolös]] votükamis valik ''(dono pejonölis)'', kels pedunons sis fomam fümöfik [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon].

'''Samafomots e/u magods aniks pekoräkons:'''",
	'revreview-update-none'       => "[[{{MediaWiki:Validationpage}}|Reidolös e krütolös]] votükams valik ''(dono pajonölis)'', kels pedunons sis fomam fümöfik [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} päzepon].",
	'revreview-visibility'        => 'Pad at labon [[{{MediaWiki:Validationpage}}|fomami fümöfik]], kela parametem kanon [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} pafümetön].',
	'rights-editor-revoke'        => 'emoükon redakanastadi gebana: [[$1]]',
	'stable-logentry'             => '„Fomam fümöfik“ pemögükon pro [[$1]]',
	'stable-logentry2'            => 'Vagükön lisedi: „fomams fümöfik“ pro [[$1]]',
	'stable-logpage'              => 'Jenotalised fomama fümöfik',
	'stable-logpagetext'          => 'Is palisedons votükams parametas [[{{MediaWiki:Validationpage}}|fomama fümöfik]] padas ninädilabik.',
	'tooltip-ca-current'          => 'Logön rigeti anuik pada at',
	'tooltip-ca-default'          => 'Paramets tefü kalietitäxet',
	'tooltip-ca-stable'           => 'Logön fomami fümöfik pada at',
	'validationpage'              => '{{ns:help}}:Yegedikontrolam',
);

/** Yue (粵語) */
$messages['yue'] = array(
	'editor'                      => '編輯',
	'flaggedrevs'                 => '加咗旗嘅修訂',
	'flaggedrevs-desc'            => '畀編輯者同埋評論家個能力去核實修訂同埋穩定化頁',
	'group-editor'                => '編輯',
	'group-editor-member'         => '編輯',
	'group-reviewer'              => '評論家',
	'group-reviewer-member'       => '評論家',
	'grouppage-editor'            => '{{ns:project}}:編者',
	'grouppage-reviewer'          => '{{ns:project}}:評論家',
	'hist-quality'                => '[質素]',
	'hist-stable'                 => '[睇過]',
	'review-diff2stable'          => '同上次穩定修訂嘅差異',
	'review-logentry-id'          => '修訂 ID $1',
	'review-logpage'              => '文章複審記錄',
	'review-logpagetext'          => '呢個係內容版[[{{MediaWiki:Validationpage}}|批准]]狀態嘅更改記錄。',
	'reviewer'                    => '評論家',
	'revisionreview'              => '複審修訂',
	'revreview-accuracy'          => '準確度',
	'revreview-accuracy-0'        => '未批准',
	'revreview-accuracy-1'        => '視察過',
	'revreview-accuracy-2'        => '準確',
	'revreview-accuracy-3'        => '有好來源',
	'revreview-accuracy-4'        => '正',
	'revreview-auto'              => '(自動)',
	'revreview-auto-w'            => "'''注意:''' 你而家係響穩定修訂度做緊更改，你嘅編輯將會自動被複審。
	你可以響保存之前先預覽一吓。",
	'revreview-basic'             => '呢個係最後[[{{MediaWiki:Validationpage}}|視察過嘅]]修訂，
	響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 現時修訂]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 改]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]
	等緊去複審。',
	'revreview-changed'           => "'''個複審嘅動作唔可以響呢次修訂度進行。'''

	當無一個指定嘅版本嗰陣，一個模或圖已經被請求。
	當一個動態模包含住圖像或跟變數嘅模響你開始複審之後改過。
	重新整理過呢版之後再重新複審就可以解決呢個問題。",
	'revreview-current'           => '草稿',
	'revreview-depth'             => '深度',
	'revreview-depth-0'           => '未批准',
	'revreview-depth-1'           => '基本',
	'revreview-depth-2'           => '中等',
	'revreview-depth-3'           => '高',
	'revreview-depth-4'           => '正',
	'revreview-edit'              => '編輯草稿',
	'revreview-flag'              => '複審呢次修訂',
	'revreview-legend'            => '評定修訂內容',
	'revreview-log'               => '記錄註解:',
	'revreview-main'              => '你一定要響一版內容頁度揀一個個別嘅修訂去複審。

	睇[[Special:Unreviewedpages]]去拎未複審嘅版。',
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後視察過嘅修訂]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]需要複審。',
	'revreview-newest-quality'    => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後有質素嘅修訂]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 響<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過嘅]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]需要複審。',
	'revreview-noflagged'         => "呢一版無複審過嘅修訂，佢可能'''未'''[[{{MediaWiki:Validationpage}}|檢查]]質量。",
	'revreview-note'              => '[[User:$1]]響呢次修訂度加咗下面嘅[[{{MediaWiki:Validationpage}}|複審]]註解:',
	'revreview-notes'             => '要顯示嘅意見或註解:',
	'revreview-oldrating'         => '曾經評定為:',
	'revreview-quality'           => '呢個係最後[[{{MediaWiki:Validationpage}}|有質素嘅]]修訂，
	響<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 現時修訂]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 改]]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]
	等緊去複審。',
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|視察過嘅]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 睇現時修訂]]",
	'revreview-quick-none'        => "'''現時嘅'''。無已複審嘅修訂。",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|有質素嘅]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 睇現時修訂]]",
	'revreview-quick-see-basic'   => "'''現時嘅'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 睇最後檢查過嘅修訂]]",
	'revreview-quick-see-quality' => "'''現時嘅'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 睇最後嘅質素修訂]]",
	'revreview-selected'          => "已經揀咗 '''$1''' 嘅修訂:",
	'revreview-source'            => '草稿原始碼',
	'revreview-stable'            => '穩定',
	'revreview-style'             => '可讀性',
	'revreview-style-0'           => '未批准',
	'revreview-style-1'           => '可接受',
	'revreview-style-2'           => '好',
	'revreview-style-3'           => '簡潔',
	'revreview-style-4'           => '正',
	'revreview-submit'            => '遞交複審',
	'revreview-text'              => '穩定版會設定做一版睇嗰陣嘅預設內容，而唔係最新嘅修訂。',
	'revreview-toolow'            => '你一定要最少將下面每一項嘅屬性評定高過"未批准"，去將一個修訂複審。
	要捨棄一個修訂，設定全部格做"未批准"。',
	'revreview-update'            => '請複審自從響呢版嘅穩定版以來嘅任何更改 (響下面度顯示) 。模同圖亦可能同時更改。',
	'validationpage'              => '{{ns:help}}:文章確認',
);

/** Classical Chinese (文言)
 * @author Itsmine
 */
$messages['zh-classical'] = array(
	'editor'                => '分校官',
	'flaggedrevs'           => '校勘本',
	'group-editor'          => '分校官',
	'group-editor-member'   => '分校官',
	'group-reviewer'        => '總校官',
	'group-reviewer-member' => '總校官',
	'grouppage-editor'      => '{{ns:project}}:分校官',
	'grouppage-reviewer'    => '{{ns:project}}:總校官',
	'hist-draft'            => '底本',
	'hist-quality'          => '校正本',
	'hist-stable'           => '初定本',
	'revreview-accuracy-1'  => '過目',
	'revreview-accuracy-4'  => '卓著',
	'revreview-current'     => '底本',
	'revreview-draft-title' => '底本',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Chenzw
 */
$messages['zh-hans'] = array(
	'editor'                      => '编辑',
	'flaggedrevs'                 => '标注修订',
	'flaggedrevs-desc'            => '给予编辑者与评论家能力去核实修订以及稳定化页面',
	'group-editor'                => '编辑',
	'group-editor-member'         => '编辑',
	'group-reviewer'              => '评论家',
	'group-reviewer-member'       => '评论家',
	'grouppage-editor'            => '{{ns:project}}:编者',
	'grouppage-reviewer'          => '{{ns:project}}:评论家',
	'hist-quality'                => '[质素]',
	'hist-stable'                 => '[已察]',
	'review-diff2stable'          => '跟上次稳定修订的差异',
	'review-logentry-id'          => '修订 ID $1',
	'review-logpage'              => '文章复审记录',
	'review-logpagetext'          => '这个是内容页[[{{MediaWiki:Validationpage}}|批准]]状态的更改记录。',
	'reviewer'                    => '评论家',
	'revisionreview'              => '复审修订',
	'revreview-accuracy'          => '准确度',
	'revreview-accuracy-0'        => '未批准',
	'revreview-accuracy-1'        => '视察过',
	'revreview-accuracy-2'        => '准确',
	'revreview-accuracy-3'        => '有良好来源',
	'revreview-accuracy-4'        => '特色',
	'revreview-approved'          => '已被批准',
	'revreview-auto'              => '(自动)',
	'revreview-auto-w'            => "'''注意:''' 您现在是在稳定修订中作出更改，您的编辑将会自动被复审。
	您可以在保存前先预览一下。",
	'revreview-basic'             => '这个是最后[[{{MediaWiki:Validationpage}}|视察过的]]修订，
	于<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 现时修订]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 更改]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]
	正等候复审。',
	'revreview-changed'           => "'''该复审的动作不可以在这次修订中进行。'''

	当无一个指定的版本时，一个模版或图像已经被请求。
	当一个动态模版包含着图像或跟变数的模版在您开始复审后改过。
	重新整理这页后再重新复审便可以解决这个问题。",
	'revreview-current'           => '草稿',
	'revreview-depth'             => '深度',
	'revreview-depth-0'           => '未批准',
	'revreview-depth-1'           => '基本',
	'revreview-depth-2'           => '中等',
	'revreview-depth-3'           => '高',
	'revreview-depth-4'           => '特色',
	'revreview-edit'              => '编辑草稿',
	'revreview-flag'              => '复审这次修订',
	'revreview-legend'            => '评定修订内容',
	'revreview-log'               => '记录注解:',
	'revreview-main'              => '您一定要在一页的内容页中选择一个个别的修订去复审。

	参看[[Special:Unreviewedpages]]去撷取未复审的页面。',
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最后视察过的修订]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 于<i>$2</i>曾经[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准过的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]需要复审。',
	'revreview-newest-quality'    => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最后有质素的修订]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 于<i>$2</i>曾经[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准过的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]需要复审。',
	'revreview-noflagged'         => "这一页没有复审过的修订，它可能'''未'''[[{{MediaWiki:Validationpage}}|检查]]质量。",
	'revreview-note'              => '[[User:$1]]在这次修订中加入了以下的[[{{MediaWiki:Validationpage}}|复审]]注解:',
	'revreview-notes'             => '要显示的意见或注解:',
	'revreview-oldrating'         => '曾经评定为:',
	'revreview-quality'           => '这个是最后[[{{MediaWiki:Validationpage}}|有质素的]]修订，
	于<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 现时修订]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 更改]]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]
	正等候复审。',
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|视察过的]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 看现时修订]]",
	'revreview-quick-none'        => "'''现时的'''。没有已复审的修订。",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|有质素的]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 看现时修订]]",
	'revreview-quick-see-basic'   => "'''现时的'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 看最后检查过的修订]]",
	'revreview-quick-see-quality' => "'''现时的'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 看睇最后的质素修订]]",
	'revreview-selected'          => "已经选择 '''$1''' 的修订:",
	'revreview-source'            => '草稿原始码',
	'revreview-stable'            => '稳定',
	'revreview-style'             => '可读性',
	'revreview-style-0'           => '未批准',
	'revreview-style-1'           => '可接受',
	'revreview-style-2'           => '好',
	'revreview-style-3'           => '简洁',
	'revreview-style-4'           => '特色',
	'revreview-submit'            => '递交复审',
	'revreview-text'              => '稳定版会设置成一页查看时的预设内容，而非最新的修订。',
	'revreview-toolow'            => '您一定要最少将下面每一项的属性评定高于"未批准"，去将一个修订复审。
	要舍弃一个修订，设置全部栏位作"未批准"。',
	'revreview-update'            => '请复审自从于这页的稳定版以来的任何更改 (在下面显示) 。模版和图像亦可能同时更改。',
	'validationpage'              => '{{ns:help}}:文章确认',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Alexsh
 */
$messages['zh-hant'] = array(
	'editor'                      => '編輯',
	'flaggedrevs'                 => '標註修訂',
	'flaggedrevs-desc'            => '給予編輯者與評論家能力去核實修訂以及穩定化頁面',
	'group-editor'                => '編輯',
	'group-editor-member'         => '編輯',
	'group-reviewer'              => '評論家',
	'group-reviewer-member'       => '評論家',
	'grouppage-editor'            => '{{ns:project}}:編者',
	'grouppage-reviewer'          => '{{ns:project}}:評論家',
	'hist-quality'                => '[質素]',
	'hist-stable'                 => '[已察]',
	'review-diff2stable'          => '跟上次穩定修訂的差異',
	'review-logentry-id'          => '修訂 ID $1',
	'review-logpage'              => '文章複審記錄',
	'review-logpagetext'          => '這個是內容頁[[{{MediaWiki:Validationpage}}|批准]]狀態的更改記錄。',
	'reviewer'                    => '評論家',
	'revisionreview'              => '複審修訂',
	'revreview-accuracy'          => '準確度',
	'revreview-accuracy-0'        => '未批准',
	'revreview-accuracy-1'        => '視察過',
	'revreview-accuracy-2'        => '準確',
	'revreview-accuracy-3'        => '有良好來源',
	'revreview-accuracy-4'        => '特色',
	'revreview-auto'              => '(自動)',
	'revreview-auto-w'            => "'''注意:''' 您現在是在穩定修訂中作出更改，您的編輯將會自動被複審。
	您可以在保存前先預覽一下。",
	'revreview-basic'             => '這個是最後[[{{MediaWiki:Validationpage}}|視察過的]]修訂，
	於<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 現時修訂]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 更改]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]
	正等候複審。',
	'revreview-changed'           => "'''該複審的動作不可以在這次修訂中進行。'''

	當無一個指定的版本時，一個模版或圖像已經被請求。
	當一個動態模版包含著圖像或跟變數的模版在您開始複審後改過。
	重新整理這頁後再重新複審便可以解決這個問題。",
	'revreview-current'           => '草稿',
	'revreview-depth'             => '深度',
	'revreview-depth-0'           => '未批准',
	'revreview-depth-1'           => '基本',
	'revreview-depth-2'           => '中等',
	'revreview-depth-3'           => '高',
	'revreview-depth-4'           => '特色',
	'revreview-edit'              => '編輯草稿',
	'revreview-flag'              => '複審這次修訂',
	'revreview-legend'            => '評定修訂內容',
	'revreview-log'               => '記錄註解:',
	'revreview-main'              => '您一定要在一頁的內容頁中選擇一個個別的修訂去複審。

	參看[[Special:Unreviewedpages]]去擷取未複審的頁面。',
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後視察過的修訂]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 於<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]需要複審。',
	'revreview-newest-quality'    => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 最後有質素的修訂]
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} 列示全部]) 於<i>$2</i>曾經[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准過的]。
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]需要複審。',
	'revreview-noflagged'         => "這一頁沒有複審過的修訂，它可能'''未'''[[{{MediaWiki:Validationpage}}|檢查]]質量。",
	'revreview-note'              => '[[User:$1]]在這次修訂中加入了以下的[[{{MediaWiki:Validationpage}}|複審]]註解:',
	'revreview-notes'             => '要顯示的意見或註解:',
	'revreview-oldrating'         => '曾經評定為:',
	'revreview-quality'           => '這個是最後[[{{MediaWiki:Validationpage}}|有質素的]]修訂，
	於<i>$2</i>[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} 批准]。[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 現時修訂]
	可以[{{fullurl:{{FULLPAGENAMEE}}|action=edit}} 更改]]；[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur}} $3次更改]
	正等候複審。',
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|視察過的]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 看現時修訂]]",
	'revreview-quick-invalid'     => "'''修訂版本號碼錯誤'''",
	'revreview-quick-none'        => "'''現時的'''。沒有已複審的修訂。",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|有質素的]]'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} 看現時修訂]]",
	'revreview-quick-see-basic'   => "'''現時的'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 看最後檢查過的修訂]]",
	'revreview-quick-see-quality' => "'''現時的'''。[[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} 看睇最後的質素修訂]]",
	'revreview-selected'          => "已經選擇 '''$1''' 的修訂:",
	'revreview-source'            => '草稿原始碼',
	'revreview-stable'            => '穩定',
	'revreview-style'             => '可讀性',
	'revreview-style-0'           => '未批准',
	'revreview-style-1'           => '可接受',
	'revreview-style-2'           => '好',
	'revreview-style-3'           => '簡潔',
	'revreview-style-4'           => '特色',
	'revreview-submit'            => '遞交複審',
	'revreview-text'              => '穩定版會設定成一頁檢視時的預設內容，而非最新的修訂。',
	'revreview-toolow'            => '您一定要最少將下面每一項的屬性評定高於"未批准"，去將一個修訂複審。
	要捨棄一個修訂，設定全部欄位作"未批准"。',
	'revreview-update'            => '請複審自從於這頁的穩定版以來的任何更改 (在下面顯示) 。模版和圖像亦可能同時更改。',
	'tooltip-ca-current'          => '檢視本頁目前的草稿',
	'tooltip-ca-default'          => '品質保證設定',
	'tooltip-ca-stable'           => '檢視本頁穩定的版本',
	'validationpage'              => '{{ns:help}}:文章確認',
);

