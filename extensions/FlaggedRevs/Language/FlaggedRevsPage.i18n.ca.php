<?php
/** Catalan (Català)
 * @author SMP
 * @author Siebrand
 */
$messages = array(
	'reviewer'                    => 'Supervisor',
	'group-reviewer'              => 'Supervisors',
	'group-reviewer-member'       => 'Supervisor',
	'grouppage-reviewer'          => '{{ns:project}}:Supervisor',
	'revreview-current'           => 'actual',
	'revreview-edit'              => "edita l'actual",
	'revreview-source'            => "Codi de l'actual",
	'revreview-stable'            => 'Estable',
	'revreview-oldrating'         => 'Estava valorada:',
	'revreview-noflagged'         => "No hi ha versions revisades d'aquesta pàgina i, per tant, pot '''no''' haver estat [[{{MediaWiki:Validationpage}}|comprovada]] la seva qualitat.",
	'revreview-quick-none'        => "'''Actual'''. No hi ha versions revisades.",
	'revreview-quick-see-quality' => "'''Actual'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vegeu la versió de qualitat]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|canvi|canvis}}])",
	'revreview-quick-see-basic'   => "'''Actual'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} vegeu la versió estable]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|canvi|canvis}}])",
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|Revisada]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vegeu la versió actual]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|canvi|canvis}}])",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|Qualitat]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} vegeu la versió actual]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|canvi|canvis}}])",
	'revreview-newest-basic'      => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió revisada] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|canvi|canvis}}] que {{plural:$3|necessita|necessiten}} revisió.",
	'revreview-newest-quality'    => "L'[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} última versió de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} vegeu-les totes]) va ser [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. Hi ha [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|canvi|canvis}}] que {{plural:$3|necessita|necessiten}} revisió.",
	'revreview-basic'             => "Aquesta és l'última versió [[{{MediaWiki:Validationpage}}|revisada]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} versió actual] és la que pot ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|canvi|canvis}}] {{plural:$3|espera|esperen}} revisió.",
	'revreview-quality'           => "Aquesta és l'última versió [[{{MediaWiki:Validationpage}}|de qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprovada] a <i>$2</i>. La [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} versió actual] és la que pot ser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificada]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|canvi|canvis}}] {{plural:$3|espera|esperen}} revisió.",
	'revreview-update'            => "Reviseu els canvis (estan indicats) fets des de l'última versió revisada de la pàgina. Les plantilles i imatges també poden haver canviat.",
	'revreview-auto'              => '(automàtic)',
	'hist-stable'                 => '[revisada]',
	'hist-quality'                => '[qualitat]',
);
