<?php
header("HTTP/1.x 404 Not Found"); // don't cache me
header("Content-Type: text/html; charset=utf-8");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="meta" lang="meta" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="shortcut icon" href="http://meta.wikipedia.org/favicon.ico" />
<link rel="copyright" href="http://www.gnu.org/copyleft/fdl.html" />

<title>Wiki does not exist</title>
    <style type="text/css" media="screen">/*<![CDATA[*/ @import "http://meta.wikipedia.org/style/monobook/main.css"; /*]]>*/</style>
    <style type="text/css" media="projection">/*<![CDATA[*/ @import "http://meta.wikipedia.org/style/monobook/main.css"; /*]]>*/</style>
    <link rel="stylesheet" type="text/css" media="print" href="http://meta.wikipedia.org/style/commonPrint.css"/>
    <!--[if IE]><style type="text/css" media="all">@import "http://meta.wikipedia.org/style/monobook/IEFixes.css";</style>
    <script type="text/javascript" src="http://meta.wikipedia.org/style/IEFixes.js"></script>
    <meta http-equiv="imagetoolbar" content="no" /><![endif]-->
    <script type="text/javascript" src="http://meta.wikipedia.org/style/wikibits.js"></script>
    
    
    
  </head>

  <body class="ns-0">
	  <div style="position: absolute;x: 0; y: 0"><img src="http://meta.wikipedia.org/upload/f/f7/Ncwikimediafound.png"><br />
<!--		  <img src="http://www.wikipedia.org/upload/wiki.png"><br />
		  <img src="http://wiktionary.org/images/wiktionary-en.png"><br />
		  <img src="http://quote.wikipedia.org/upload/1/19/Wikiquote.png"><br />
		  <img src="http://wikibooks.org/upload/Wikibooks.png"><br />-->
	  </div>
    <div id="globalWrapper">
      <div id="column-content">
	<div id="content">
	  <a name="top" id="contentTop"></a>
	  <h1 class="firstHeading">Wiki does not exist</h1>
	  <div id="bodyContent">
	    
	    <h3 id="siteSub"><I>From Meta, a wiki about Wikimedia</I></h3>
	    <div id="contentSub"></div>
	    
<?php
require_once("/apache/common/php/languages/Names.php");
$langlist = array_map('trim',file('/apache/common/langlist'));
if ( false && isset( $wgLanguageNames[$lang] ) && array_search( $lang, $langlist ) 
  && $site != 'wikisource' && $site != 'wikinews' && $site != 'wikiversity' ) 
{
	$langName = $wgLanguageNames[$lang];
	$domain = $_SERVER['HTTP_HOST'];
	$siteName = ucfirst( $site );
	
	echo <<<END_OF_STRING
<p>This domain ($domain) has been reserved for the $siteName in the $langName language. Would you like
this wiki to be created?</p>
<p><form action="/w/requestwiki.php" method=post id=addwiki>
<input type=submit value="Create wiki" name=addwiki_submit>
<input type=hidden name=lang value="$lang">
<input type=hidden name=site value="$site">
<input type=hidden name=domain value="$domain">
</form></p>
<br /><br />
<p>Or perhaps you are looking for one of our other projects:</p>
END_OF_STRING;
} else {
	echo "<p>This wiki does not exist yet. Perhaps you are looking for one of our other projects:</p>";
}
?>

<table cellspacing="3" width="100%">
<tr valign="top">
<td bgcolor="#FFFFFF" style="border: 1px solid black;padding-left:1em;" width="40%" class="plainlinks"><a name="Projects" id=
"Projects"></a>
<h2>Projects</h2>
<p><br />
<em><a href="http://meta.wikipedia.org/wiki/Complete_list_of_wikimedia_projects" title="Complete list of wikimedia projects">Complete list of wikimedia
projects</a></em></p>
<p><em><a href="http://meta.wikipedia.org/wiki/Complete_list_of_wikimedia_projects#Proposed_projects" title=
"Complete list of wikimedia projects">Proposals of new projects</a></em></p>
<a name="Wiktionaries" id="Wiktionaries"></a>
<h3><a href="http://meta.wikipedia.org/wiki/Wiktionary" title="Wiktionary">Wiktionaries</a></h3>
<ul>
<li><a href='http://bg.wiktionary.org' class='external' title="http://bg.wiktionary.org">Български</a> <span class=
'urlexpansion'>(<i>http://bg.wiktionary.org</i>)</span></li>
<li><a href='http://de.wiktionary.org' class='external' title="http://de.wiktionary.org">Deutsch</a> <span class=
'urlexpansion'>(<i>http://de.wiktionary.org</i>)</span></li>
<li><a href='http://wiktionary.org' class='external' title="http://wiktionary.org">English</a> <span class=
'urlexpansion'>(<i>http://wiktionary.org</i>)</span></li>
<li><a href='http://fr.wiktionary.org' class='external' title="http://fr.wiktionary.org">Français</a> <span class=
'urlexpansion'>(<i>http://fr.wiktionary.org</i>)</span></li>
<li><a href='http://hu.wiktionary.org' class='external' title="http://hu.wiktionary.org">Magyar (Hungarian)</a> <span class=
'urlexpansion'>(<i>http://hu.wiktionary.org</i>)</span></li>
<li><a href='http://it.wiktionary.org' class='external' title="http://it.wiktionary.org">Italiano</a> <span class=
'urlexpansion'>(<i>http://it.wiktionary.org</i>)</span></li>
<li><a href='http://ja.wiktionary.org' class='external' title="http://ja.wiktionary.org">日本語 (Japanese)</a> <span class=
'urlexpansion'>(<i>http://ja.wiktionary.org</i>)</span></li>
<li><a href='http://ko.wiktionary.org' class='external' title="http://ko.wiktionary.org">한국어 (Korean)</a> <span class=
'urlexpansion'>(<i>http://ko.wiktionary.org</i>)</span></li>
<li><a href='http://pl.wiktionary.org' class='external' title="http://pl.wiktionary.org">Polski</a> <span class=
'urlexpansion'>(<i>http://pl.wiktionary.org</i>)</span></li>
<li><a href='http://ro.wiktionary.org' class='external' title="http://ro.wiktionary.org">Română</a> <span class=
'urlexpansion'>(<i>http://ro.wiktionary.org</i>)</span></li>
<li><a href='http://sv.wiktionary.org' class='external' title="http://sv.wiktionary.org">Svenska</a> <span class=
'urlexpansion'>(<i>http://sv.wiktionary.org</i>)</span></li>
<li><a href='http://vi.wiktionary.org/wiki/Trang_Ch%C3%ADnh' class='external' title=
"http://vi.wiktionary.org/wiki/Trang Chính">Tiếng Việt</a> <span class=
'urlexpansion'>(<i>http://vi.wiktionary.org/wiki/Trang_Chính</i>)</span></li>
</ul>
<a name="Other_wikimedia_projects" id="Other_wikimedia_projects"></a>
<h3>Other wikimedia projects</h3>
<ul>
<li><a href='http://wikibooks.org/wiki/' class='external' title="http://http://meta.wikipedia.orgwikibooks.org/wiki/">Wikibooks</a> <span class=
'urlexpansion'>(<i>http://wikibooks.org/wiki/</i>)</span> (see <a href="http://meta.wikipedia.org/wiki/Wikibooks" title="Wikibooks">Wikibooks</a>)</li>
<li><a href='http://sources.wikipedia.org/wiki/Main_Page' class='external' title=
"http://sources.wikipedia.org/wiki/Main Page">Wikisource</a> <span class=
'urlexpansion'>(<i>http://sources.wikipedia.org/wiki/Main_Page</i>)</span> (see <a href="http://meta.wikipedia.org/wiki/Wikisource" title=
"Wikisource">Wikisource</a>)</li>
<li><a href='http://quote.wikipedia.org/' class='external' title="http://quote.wikipedia.org/">Wikiquote</a> <span class=
'urlexpansion'>(<i>http://quote.wikipedia.org/</i>)</span> (see <a href="http://meta.wikipedia.org/wiki/Wikiquote" title="Wikiquote">Wikiquote</a>)</li>
</ul>
</td>
<td valign="top" bgcolor="#FFFFFF" style="border: 1px solid black;padding-left:1em;" class="plainlinks"><a name=
"Active_Wikipedias" id="Active_Wikipedias"></a>
<h3>Active <a href="http://meta.wikipedia.org/wiki/Wikipedia" title="Wikipedia">Wikipedias</a></h3>
<p><strong><a href="http://meta.wikipedia.org/wiki/How_to_start_a_new_wikipedia" title="How to start a new wikipedia">How to start a new
wikipedia</a></strong></p>
<p><small>(<a href="http://meta.wikipedia.org/wiki/MediaWiki:ActiveWikipedias" title="MediaWiki:ActiveWikipedias">Edit this list</a>) -</small> <a href=
'http://af.wikipedia.org/' class='external' title="http://af.wikipedia.org/">Afrikaans</a> <span class=
'urlexpansion'>(<i>http://af.wikipedia.org/</i>)</span> • <a href='http://am.wikipedia.org/' class='external' title=
"http://am.wikipedia.org/">አማርኛ</a> <span class='urlexpansion'>(<i>http://am.wikipedia.org/</i>)</span> • <a href=
'http://ar.wikipedia.org/' class='external' title="http://ar.wikipedia.org/">العربية</a> <span class=
'urlexpansion'>(<i>http://ar.wikipedia.org/</i>)</span> • <a href='http://roa-rup.wikipedia.org/' class='external' title=
"http://roa-rup.wikipedia.org/">Armâneashti</a> <span class='urlexpansion'>(<i>http://roa-rup.wikipedia.org/</i>)</span> •
<a href='http://as.wikipedia.org/' class='external' title="http://as.wikipedia.org/">অসমীয়া</a> <span class=
'urlexpansion'>(<i>http://as.wikipedia.org/</i>)</span> • <a href='http://ast.wikipedia.org/' class='external' title=
"http://ast.wikipedia.org/">Asturian</a> <span class='urlexpansion'>(<i>http://ast.wikipedia.org/</i>)</span> • <a href=
'http://gn.wikipedia.org/' class='external' title="http://gn.wikipedia.org/">Avañe'ẽ</a> <span class=
'urlexpansion'>(<i>http://gn.wikipedia.org/</i>)</span> • <a href='http://az.wikipedia.org/' class='external' title=
"http://az.wikipedia.org/">Azərbaycanca</a> <span class='urlexpansion'>(<i>http://az.wikipedia.org/</i>)</span> • <a href=
'http://bg.wikipedia.org/' class='external' title="http://bg.wikipedia.org/">Български</a> <span class=
'urlexpansion'>(<i>http://bg.wikipedia.org/</i>)</span> • <a href='http://bn.wikipedia.org/' class='external' title=
"http://bn.wikipedia.org/">বাংলা</a> <span class='urlexpansion'>(<i>http://bn.wikipedia.org/</i>)</span> • <a href=
'http://be.wikipedia.org/' class='external' title="http://be.wikipedia.org/">Беларуская</a> <span class=
'urlexpansion'>(<i>http://be.wikipedia.org/</i>)</span> • <a href='http://bi.wikipedia.org/' class='external' title=
"http://bi.wikipedia.org/">Bislama</a> <span class='urlexpansion'>(<i>http://bi.wikipedia.org/</i>)</span> • <a href=
'http://bs.wikipedia.org/' class='external' title="http://bs.wikipedia.org/">Bosanski</a> <span class=
'urlexpansion'>(<i>http://bs.wikipedia.org/</i>)</span> • <a href='http://br.wikipedia.org/' class='external' title=
"http://br.wikipedia.org/">Brezhoneg</a> <span class='urlexpansion'>(<i>http://br.wikipedia.org/</i>)</span> • <a href=
'http://ca.wikipedia.org/' class='external' title="http://ca.wikipedia.org/">Català</a> <span class=
'urlexpansion'>(<i>http://ca.wikipedia.org/</i>)</span> • <a href='http://cs.wikipedia.org/' class='external' title=
"http://cs.wikipedia.org/">Česky</a> <span class='urlexpansion'>(<i>http://cs.wikipedia.org/</i>)</span> • <a href=
'http://co.wikipedia.org/' class='external' title="http://co.wikipedia.org/">Corsu</a> <span class=
'urlexpansion'>(<i>http://co.wikipedia.org/</i>)</span> • <a href='http://cy.wikipedia.org/' class='external' title=
"http://cy.wikipedia.org/">Cymraeg</a> <span class='urlexpansion'>(<i>http://cy.wikipedia.org/</i>)</span> • <a href=
'http://da.wikipedia.org/' class='external' title="http://da.wikipedia.org/">Dansk</a> <span class=
'urlexpansion'>(<i>http://da.wikipedia.org/</i>)</span> • <a href='http://de.wikipedia.org/' class='external' title=
"http://de.wikipedia.org/">Deutsch</a> <span class='urlexpansion'>(<i>http://de.wikipedia.org/</i>)</span> • <a href=
'http://et.wikipedia.org/' class='external' title="http://et.wikipedia.org/">Eesti</a> <span class=
'urlexpansion'>(<i>http://et.wikipedia.org/</i>)</span> • <a href='http://el.wikipedia.org/' class='external' title=
"http://el.wikipedia.org/">Ελληνικά</a> <span class='urlexpansion'>(<i>http://el.wikipedia.org/</i>)</span> • <a href=
'http://als.wikipedia.org/' class='external' title="http://als.wikipedia.org/">Elsässische</a> <span class=
'urlexpansion'>(<i>http://als.wikipedia.org/</i>)</span> • <strong><a href='http://en.wikipedia.org/' class='external' title=
"http://en.wikipedia.org/">English</a> <span class='urlexpansion'>(<i>http://en.wikipedia.org/</i>)</span> •</strong> <a href=
'http://es.wikipedia.org/' class='external' title="http://es.wikipedia.org/">Español</a> <span class=
'urlexpansion'>(<i>http://es.wikipedia.org/</i>)</span> • <a href='http://eo.wikipedia.org/' class='external' title=
"http://eo.wikipedia.org/">Esperanto</a> <span class='urlexpansion'>(<i>http://eo.wikipedia.org/</i>)</span> • <a href=
'http://eu.wikipedia.org/' class='external' title="http://eu.wikipedia.org/">Euskara</a> <span class=
'urlexpansion'>(<i>http://eu.wikipedia.org/</i>)</span> • <a href='http://fa.wikipedia.org/' class='external' title=
"http://fa.wikipedia.org/">فارسی</a> <span class='urlexpansion'>(<i>http://fa.wikipedia.org/</i>)</span> • <a href=
'http://fo.wikipedia.org/' class='external' title="http://fo.wikipedia.org/">Forøyskt</a> <span class=
'urlexpansion'>(<i>http://fo.wikipedia.org/</i>)</span> • <a href='http://fr.wikipedia.org/' class='external' title=
"http://fr.wikipedia.org/">Français</a> <span class='urlexpansion'>(<i>http://fr.wikipedia.org/</i>)</span> • <a href=
'http://fy.wikipedia.org/' class='external' title="http://fy.wikipedia.org/">Frysk</a> <span class=
'urlexpansion'>(<i>http://fy.wikipedia.org/</i>)</span> • <a href='http://ga.wikipedia.org/' class='external' title=
"http://ga.wikipedia.org/">Gaeilge</a> <span class='urlexpansion'>(<i>http://ga.wikipedia.org/</i>)</span> • <a href=
'http://gv.wikipedia.org/' class='external' title="http://gv.wikipedia.org/">Gaelg</a> <span class=
'urlexpansion'>(<i>http://gv.wikipedia.org/</i>)</span> • <a href='http://gd.wikipedia.org/' class='external' title=
"http://gd.wikipedia.org/">Gàidhlig</a> <span class='urlexpansion'>(<i>http://gd.wikipedia.org/</i>)</span> • <a href=
'http://gl.wikipedia.org/' class='external' title="http://gl.wikipedia.org/">Galego</a> <span class=
'urlexpansion'>(<i>http://gl.wikipedia.org/</i>)</span> • <a href='http://gu.wikipedia.org/' class='external' title=
"http://gu.wikipedia.org/">ગુજરાતી</a> <span class='urlexpansion'>(<i>http://gu.wikipedia.org/</i>)</span> • <a href=
'http://ko.wikipedia.org/' class='external' title="http://ko.wikipedia.org/">한국어</a> <span class=
'urlexpansion'>(<i>http://ko.wikipedia.org/</i>)</span> • <a href='http://hy.wikipedia.org/' class='external' title=
"http://hy.wikipedia.org/">Հայերեն</a> <span class='urlexpansion'>(<i>http://hy.wikipedia.org/</i>)</span> • <a href=
'http://hi.wikipedia.org/' class='external' title="http://hi.wikipedia.org/">हिन्दी</a> <span class=
'urlexpansion'>(<i>http://hi.wikipedia.org/</i>)</span> • <a href='http://www.holopedia.net/' class='external' title=
"http://www.holopedia.net/">Hō-ló-oē</a> <span class='urlexpansion'>(<i>http://www.holopedia.net/</i>)</span> • <a href=
'http://hr.wikipedia.org/' class='external' title="http://hr.wikipedia.org/">Hrvatski</a> <span class=
'urlexpansion'>(<i>http://hr.wikipedia.org/</i>)</span> • <a href='http://id.wikipedia.org/' class='external' title=
"http://id.wikipedia.org/">Bahasa&#160;Indonesia</a> <span class='urlexpansion'>(<i>http://id.wikipedia.org/</i>)</span> •
<a href='http://ia.wikipedia.org/' class='external' title="http://ia.wikipedia.org/">Interlingua</a> <span class=
'urlexpansion'>(<i>http://ia.wikipedia.org/</i>)</span> • <a href='http://is.wikipedia.org/' class='external' title=
"http://is.wikipedia.org/">Íslensk</a> <span class='urlexpansion'>(<i>http://is.wikipedia.org/</i>)</span> • <a href=
'http://it.wikipedia.org/' class='external' title="http://it.wikipedia.org/">Italiano</a> <span class=
'urlexpansion'>(<i>http://it.wikipedia.org/</i>)</span> • <a href='http://he.wikipedia.org/' class='external' title=
"http://he.wikipedia.org/">עברית</a> <span class='urlexpansion'>(<i>http://he.wikipedia.org/</i>)</span> • <a href=
'http://jv.wikipedia.org/' class='external' title="http://jv.wikipedia.org/">Basa Jawa</a> <span class=
'urlexpansion'>(<i>http://jv.wikipedia.org/</i>)</span> • <a href='http://kn.wikipedia.org/' class='external' title=
"http://kn.wikipedia.org/">ಕನ್ನಡ</a> <span class='urlexpansion'>(<i>http://kn.wikipedia.org/</i>)</span> • <a href=
'http://ka.wikipedia.org/' class='external' title="http://ka.wikipedia.org/">ქართული</a> <span class=
'urlexpansion'>(<i>http://ka.wikipedia.org/</i>)</span> • <a href='http://csb.wikipedia.org/' class='external' title=
"http://csb.wikipedia.org/">Kaszëbsczi</a> <span class='urlexpansion'>(<i>http://csb.wikipedia.org/</i>)</span> • <a href=
'http://kk.wikipedia.org/' class='external' title="http://kk.wikipedia.org/">қазақша</a> <span class=
'urlexpansion'>(<i>http://kk.wikipedia.org/</i>)</span> • <a href='http://km.wikipedia.org/' class='external' title=
"http://km.wikipedia.org/">ភាសាខ្មែរ (Khmer)</a> <span class='urlexpansion'>(<i>http://km.wikipedia.org/</i>)</span> • <a href=
'http://ky.wikipedia.org/' class='external' title="http://ky.wikipedia.org/">кыргызча</a> <span class=
'urlexpansion'>(<i>http://ky.wikipedia.org/</i>)</span> • <a href='http://sw.wikipedia.org/' class='external' title=
"http://sw.wikipedia.org/">Kiswahili</a> <span class='urlexpansion'>(<i>http://sw.wikipedia.org/</i>)</span> • <a href=
'http://ku.wikipedia.org/' class='external' title="http://ku.wikipedia.org/">Kurdî كوردی</a> <span class=
'urlexpansion'>(<i>http://ku.wikipedia.org/</i>)</span> • <a href='http://la.wikipedia.org/' class='external' title=
"http://la.wikipedia.org/">Latina</a> <span class='urlexpansion'>(<i>http://la.wikipedia.org/</i>)</span> • <a href=
'http://lv.wikipedia.org/' class='external' title="http://lv.wikipedia.org/">Latviešu</a> <span class=
'urlexpansion'>(<i>http://lv.wikipedia.org/</i>)</span> • <a href='http://lt.wikipedia.org/' class='external' title=
"http://lt.wikipedia.org/">Lietuvių</a> <span class='urlexpansion'>(<i>http://lt.wikipedia.org/</i>)</span> • <a href=
'http://hu.wikipedia.org/' class='external' title="http://hu.wikipedia.org/">Magyar</a> <span class=
'urlexpansion'>(<i>http://hu.wikipedia.org/</i>)</span> • <a href='http://mg.wikipedia.org/' class='external' title=
"http://mg.wikipedia.org/">Malagasy</a> <span class='urlexpansion'>(<i>http://mg.wikipedia.org/</i>)</span> • <a href=
'http://mi.wikipedia.org/' class='external' title="http://mi.wikipedia.org/">Māori</a> <span class=
'urlexpansion'>(<i>http://mi.wikipedia.org/</i>)</span> • <a href='http://mk.wikipedia.org/' class='external' title=
"http://mk.wikipedia.org/">Македонски</a> <span class='urlexpansion'>(<i>http://mk.wikipedia.org/</i>)</span> • <a href=
'http://ml.wikipedia.org/' class='external' title="http://ml.wikipedia.org/">മലയാളം</a> <span class=
'urlexpansion'>(<i>http://ml.wikipedia.org/</i>)</span> • <a href='http://mr.wikipedia.org/' class='external' title=
"http://mr.wikipedia.org/">मराठी</a> <span class='urlexpansion'>(<i>http://mr.wikipedia.org/</i>)</span> • <a href=
'http://ms.wikipedia.org/' class='external' title="http://ms.wikipedia.org/">Bahasa&#160;Melayu</a> <span class=
'urlexpansion'>(<i>http://ms.wikipedia.org/</i>)</span> • <a href='http://mn.wikipedia.org/' class='external' title=
"http://mn.wikipedia.org/">Монгол</a> <span class='urlexpansion'>(<i>http://mn.wikipedia.org/</i>)</span> • <a href=
'http://nah.wikipedia.org/' class='external' title="http://nah.wikipedia.org/">Nawātl</a> <span class=
'urlexpansion'>(<i>http://nah.wikipedia.org/</i>)</span> • <a href='http://nl.wikipedia.org/' class='external' title=
"http://nl.wikipedia.org/">Nederlands</a> <span class='urlexpansion'>(<i>http://nl.wikipedia.org/</i>)</span> • <a href=
'http://ne.wikipedia.org/' class='external' title="http://ne.wikipedia.org/">नेपाली</a> <span class=
'urlexpansion'>(<i>http://ne.wikipedia.org/</i>)</span> • <a href='http://ja.wikipedia.org/' class='external' title=
"http://ja.wikipedia.org/">日本語</a> <span class='urlexpansion'>(<i>http://ja.wikipedia.org/</i>)</span> • <a href=
'http://no.wikipedia.org/' class='external' title="http://no.wikipedia.org/">Norsk</a> <span class=
'urlexpansion'>(<i>http://no.wikipedia.org/</i>)</span> • <a href='http://oc.wikipedia.org/' class='external' title=
"http://oc.wikipedia.org/">Occitan</a> <span class='urlexpansion'>(<i>http://oc.wikipedia.org/</i>)</span> • <a href=
'http://om.wikipedia.org/' class='external' title="http://om.wikipedia.org/">Oromo</a> <span class=
'urlexpansion'>(<i>http://om.wikipedia.org/</i>)</span> • <a href='http://pa.wikipedia.org/' class='external' title=
"http://pa.wikipedia.org/">ਪੰਜਾਬੀ پنجابی</a> <span class='urlexpansion'>(<i>http://pa.wikipedia.org/</i>)</span> • <a href=
'http://ps.wikipedia.org/' class='external' title="http://ps.wikipedia.org/">پښتو</a> <span class=
'urlexpansion'>(<i>http://ps.wikipedia.org/</i>)</span> • <a href='http://tl.wikipedia.org/' class='external' title=
"http://tl.wikipedia.org/">Pilipino</a> <span class='urlexpansion'>(<i>http://tl.wikipedia.org/</i>)</span> • <a href=
'http://nds.wikipedia.org/' class='external' title="http://nds.wikipedia.org/">Platdüütsch</a> <span class=
'urlexpansion'>(<i>http://nds.wikipedia.org/</i>)</span> • <a href='http://bo.wikipedia.org/' class='external' title=
"http://bo.wikipedia.org/">བོད་སྐད</a> <span class='urlexpansion'>(<i>http://bo.wikipedia.org/</i>)</span> • <a href=
'http://pl.wikipedia.org/' class='external' title="http://pl.wikipedia.org/">Polski</a> <span class=
'urlexpansion'>(<i>http://pl.wikipedia.org/</i>)</span> • <a href='http://pt.wikipedia.org/' class='external' title=
"http://pt.wikipedia.org/">Português</a> <span class='urlexpansion'>(<i>http://pt.wikipedia.org/</i>)</span> • <a href=
'http://ro.wikipedia.org/' class='external' title="http://ro.wikipedia.org/">Română</a> <span class=
'urlexpansion'>(<i>http://ro.wikipedia.org/</i>)</span> • <a href='http://ru.wikipedia.org/' class='external' title=
"http://ru.wikipedia.org/">Русский</a> <span class='urlexpansion'>(<i>http://ru.wikipedia.org/</i>)</span> • <a href=
'http://sc.wikipedia.org/' class='external' title="http://sc.wikipedia.org/">Sardu</a> <span class=
'urlexpansion'>(<i>http://sc.wikipedia.org/</i>)</span> • <a href='http://st.wikipedia.org/' class='external' title=
"http://st.wikipedia.org/">seSotho</a> <span class='urlexpansion'>(<i>http://st.wikipedia.org/</i>)</span> • <a href=
'http://sq.wikipedia.org/' class='external' title="http://sq.wikipedia.org/">Shqip</a> <span class=
'urlexpansion'>(<i>http://sq.wikipedia.org/</i>)</span> • <a href='http://simple.wikipedia.org/' class='external' title=
"http://simple.wikipedia.org/">Simple&#160;English</a> <span class='urlexpansion'>(<i>http://simple.wikipedia.org/</i>)</span> •
<a href='http://sk.wikipedia.org/' class='external' title="http://sk.wikipedia.org/">Slovenčina</a> <span class=
'urlexpansion'>(<i>http://sk.wikipedia.org/</i>)</span> • <a href='http://sl.wikipedia.org/' class='external' title=
"http://sl.wikipedia.org/">Slovensko</a> <span class='urlexpansion'>(<i>http://sl.wikipedia.org/</i>)</span> • <a href=
'http://sr.wikipedia.org/' class='external' title="http://sr.wikipedia.org/">Српски (Srpski)</a> <span class=
'urlexpansion'>(<i>http://sr.wikipedia.org/</i>)</span> • <a href='http://su.wikipedia.org/' class='external' title=
"http://su.wikipedia.org/">Basa&#160;Sunda</a> <span class='urlexpansion'>(<i>http://su.wikipedia.org/</i>)</span> • <a href=
'http://fi.wikipedia.org/' class='external' title="http://fi.wikipedia.org/">Suomi</a> <span class=
'urlexpansion'>(<i>http://fi.wikipedia.org/</i>)</span> • <a href='http://sv.wikipedia.org/' class='external' title=
"http://sv.wikipedia.org/">Svenska</a> <span class='urlexpansion'>(<i>http://sv.wikipedia.org/</i>)</span> • <a href=
'http://ta.wikipedia.org/' class='external' title="http://ta.wikipedia.org/">தமிழ்</a> <span class=
'urlexpansion'>(<i>http://ta.wikipedia.org/</i>)</span> • <a href='http://tt.wikipedia.org/' class='external' title=
"http://tt.wikipedia.org/">Tatarça</a> <span class='urlexpansion'>(<i>http://tt.wikipedia.org/</i>)</span> • <a href=
'http://th.wikipedia.org/' class='external' title="http://th.wikipedia.org/">ไทย</a> <span class=
'urlexpansion'>(<i>http://th.wikipedia.org/</i>)</span> • <a href='http://vi.wikipedia.org/' class='external' title=
"http://vi.wikipedia.org/">Tiếng&#160;Việt</a> <span class='urlexpansion'>(<i>http://vi.wikipedia.org/</i>)</span> • <a href=
'http://tlh.wikipedia.org/' class='external' title="http://tlh.wikipedia.org/">tlhIngan&#160;Hol (Klingon)</a> <span class=
'urlexpansion'>(<i>http://tlh.wikipedia.org/</i>)</span> • <a href='http://tg.wikipedia.org/' class='external' title=
"http://tg.wikipedia.org/">Тоҷикӣ</a> <span class='urlexpansion'>(<i>http://tg.wikipedia.org/</i>)</span> • <a href=
'http://tpi.wikipedia.org/' class='external' title="http://tpi.wikipedia.org/">Tok&#160;Pisin</a> <span class=
'urlexpansion'>(<i>http://tpi.wikipedia.org/</i>)</span> • <a href='http://chr.wikipedia.org/' class='external' title=
"http://chr.wikipedia.org/">ᏣᎳᎩ (Tsalagi)</a> <span class='urlexpansion'>(<i>http://chr.wikipedia.org/</i>)</span> • <a href=
'http://tr.wikipedia.org/' class='external' title="http://tr.wikipedia.org/">Türkçe</a> <span class=
'urlexpansion'>(<i>http://tr.wikipedia.org/</i>)</span> • <a href='http://tk.wikipedia.org/' class='external' title=
"http://tk.wikipedia.org/">Türkmençe</a> <span class='urlexpansion'>(<i>http://tk.wikipedia.org/</i>)</span> • <a href=
'http://uk.wikipedia.org/' class='external' title="http://uk.wikipedia.org/">Українська</a> <span class=
'urlexpansion'>(<i>http://uk.wikipedia.org/</i>)</span> • <a href='http://ur.wikipedia.org/' class='external' title=
"http://ur.wikipedia.org/">اردو</a> <span class='urlexpansion'>(<i>http://ur.wikipedia.org/</i>)</span> • <a href=
'http://vo.wikipedia.org/' class='external' title="http://vo.wikipedia.org/">Volapük</a> <span class=
'urlexpansion'>(<i>http://vo.wikipedia.org/</i>)</span> • <a href='http://wa.wikipedia.org/' class='external' title=
"http://wa.wikipedia.org/">Walon</a> <span class='urlexpansion'>(<i>http://wa.wikipedia.org/</i>)</span> • <a href=
'http://xh.wikipedia.org/' class='external' title="http://xh.wikipedia.org/">isiXhosa</a> <span class=
'urlexpansion'>(<i>http://xh.wikipedia.org/</i>)</span> • <a href='http://yi.wikipedia.org/' class='external' title=
"http://yi.wikipedia.org/">ײִדיש</a> <span class='urlexpansion'>(<i>http://yi.wikipedia.org/</i>)</span> • <a href=
'http://zh.wikipedia.org/' class='external' title="http://zh.wikipedia.org/">中文</a> <span class=
'urlexpansion'>(<i>http://zh.wikipedia.org/</i>)</span> • <a href='http://za.wikipedia.org/' class='external' title=
"http://za.wikipedia.org/">Zhuang</a> <span class='urlexpansion'>(<i>http://za.wikipedia.org/</i>)</span> • <a href=
'http://zu.wikipedia.org/' class='external' title="http://zu.wikipedia.org/">isiZulu</a> <span class=
'urlexpansion'>(<i>http://zu.wikipedia.org/</i>)</span></p>
</td>
</tr>
</table>



	    <!-- end content -->
	    <div class="visualClear"></div>
	  </div>
	</div>
      </div>
      <!-- end of main content block -->
      <!-- start of the left (by default at least) column -->
      <!--<esi:include src="thisurl?esiview=toolbox&loggedin=0"/> static footer, same for all pages but contains a few messaged that are worth caching --> 
      <div class="visualClear"></div>
      <div id="colophon"></div>
    </div>
  </body>
</html>
