#!/usr/bin/perl

# please specify all accented characters as utf-8 or
# as html codes like &agrave; or $#224;
# see for a list of html codes see
# http://evolt.org/article/ala/17/21234/

sub SetLiterals_CS
{
$out_thousands_separator = "&nbsp;" ;
$out_decimal_separator   = "," ;

$out_statistics   = "Statistiky Wikipedie" ;
$out_charts       = "Grafy Wikipedie" ;
$out_btn_tables   = "Tabulky" ;
$out_btn_table    = "Tabulka" ;
$out_btn_charts   = "Grafy" ;

$out_wikipedia    = "Wikipedie" ;
$out_wikipedias   = "Wikipedie" ;
$out_wikipedians   = "wikipedist�" ;

$out_wiktionary   = "Wikislovn�k" ;
$out_wiktionaries = "Wikislovn�ku" ;
$out_wiktionarians   = "u&#382;ivatel� Wikislovn�ku" ;

$out_wikibook        = "Wikiknihy" ;
$out_wikibooks       = "Wikiknihy" ;
$out_wikibookies     = "u&#382;ivatel� Wikiknih" ;

$out_wikiquote       = "Wikicit�ty" ;
$out_wikiquotes      = "Wikicit�ty" ;
$out_wikiquotarians  = "u&#382;ivatel� wikicit�t&#367;" ;

$out_wikinews        = "Wikinews" ;
$out_wikinewssites   = "Wikinews" ;
$out_wikireporters   = "Wikireport�&#345;i" ;

$out_wikisources     = "Wikisource" ;  # new
$out_wikisourcesites = "Wikisources" ; # new
$out_wikilibrarians  = "Wikilibrarians" ; # new

$out_wikispecial     = "Wikispecial" ;
$out_wikispecials    = "Wikispecials" ;
$out_wikispecialists = "Auto&#345;i" ;

$out_wikimedia       = "Wikimedia" ;
$out_wikimedia_sites = "Servery Wikimedia" ;

$out_comparisons  = "Porovn�n�" ;

$out_creation_history = "Chronologie zakl�d�n�" ;
$out_accomplishments  = "V�sledky" ;
$out_created          = "Vytvo&#345;eno" ;
$average_increase     = "Pr&#367;m&#283;rn� r&#367;st za m&#283;s�c" ;

$out_explanation_categories = "Behind each category you find the number of articles that belong to this category" ; # new
$out_follow_links           = "Tip: in order to avoid lengthy page reloads use Shift+Mouseclick to follow links" ; # new
$out_categories_templates   = "Category tags that were inserted via a template are <b>not yet</b> recognised." ; # new
$out_categories_redirects   = "Also this overview may lists categories pages that only contain a redirect tag." ;

$out_license      = "V&#353;echna data a obr�zky na t�to str�nce jsou voln� d�lo (public domain)." ;
$out_generated    = "Vygenerov�no: " ;
$out_sqlfiles     = "ze soubor&#367; SQL dumpu vytvo&#345;en�ho: " ;
$out_version      = "Verze skriptu:" ;
$out_author       = "Autor" ;
$out_mail         = "E-mail" ;
$out_site         = "Web" ;
$out_home         = "Home" ;
$out_sitemap      = "Mapa serveru";
$out_rendered     = "Grafy vykresleny pomoc� " ;
$out_generated2   = "Tak� vygenerov�no:" ;
$out_easytimeline = "Seznam graf&#367; EasyTimeline podle Wikipedie" ;
$out_categories   = "P&#345;ehled kategori� podle Wikipedie" ;
$out_botactivity  = "Bot activity" ;     # new
$out_stats_for    = "Statistiky pro" ;
$out_stats_per    = "Statistiky podle " ;

$out_gigabytes    = "GB" ;
$out_megabytes    = "MB" ;
$out_kilobytes    = "kB" ;
$out_bytes        = "B" ;
$out_million      = "M" ;
$out_thousand     = "k" ;

$out_date         = "Datum" ;
$out_year         = "rok" ;
$out_month        = "m&#283;s�c" ;
$out_mean         = "St&#345;edn� hodnota" ;
$out_growth       = "R&#367;st" ;
$out_total        = "Celkem" ;
$out_bars         = "Pruh&#367;" ;
$out_words        = "Slova" ;
$out_zoom         = "p&#345;ibl�&#382;en�" ;
$out_scripts      = "Skripty" ;

$out_new          = "nov�" ;
$out_all          = "v&#353;ichni" ;
$out_all2         = "v&#353;echny" ;

$out_conversions1 = "" ;
$out_conversions2 = " byla pou&#382;ita (polo-)automatick� konverze." ;

$out_phaseIII     = "Jsou zahrnuty pouze Wikipedii, kter� b&#283;&#382;� na softwaru <a href='http://www.mediawiki.org'>MediaWiki</a>." ;

$out_svg_viewer   = "Abyste mohli prohl�&#382;et obsah t�to str�nky pot&#345;ebujete" .
                    "SVG viewer, e.g. <a href='http://www.adobe.com/svg/viewer/install/'>Adobe SVG Viewer</a> " .
                    "pro MS Explorer Win/Mac" ;
$out_rendering    = "Prob�h� vykreslov�n�.... &#268;ekejte, pros�m" ;

$out_sort_order   = "Wikipedie jsou se&#345;azeny podle po&#269;tu intern�ch odkaz&#367; (vyjma p&#345;esm&#283;rov�n�)<br>" .
                    "Toto je nejsp�&#353;e spravedliv&#283;j&#353;� srovn�n� ne&#382; celkov� po&#269;et &#269;l�nk&#367; &#269;i velikost datab�ze:<br>" .
                    "Po&#269;et &#269;l�nk&#367; nen� tak vypov�daj�c�, proto&#382;e n&#283;kter� Wikipedie obsahuj� mnoho kr�tk�ch &#269;l�nk&#367;,<br>" .
                    "a dokonce automaticky vytv�&#345;en� &#269;l�nky, zat�mco jin� Wikipedie maj� sice m�n&#283; &#269;l�nk&#367;, ale dlouh� a poctiv&#283; psan�.<br>" .
                    "Velikost datab�ze z�vis� na k�dov�n� (znaky v unicode mohou m�t n&#283;kolik bajt&#367;) a <br>" .
                    "na mno&#382;stv� informac�, kter� jeden znak p&#345;ed�v� (nap&#345;. &#269;�nsk� znak m&#367;&#382;e b�t cel� slovo).<br>" ;

$out_webalizer_note = "Pozn�mka: Generovan� data nejsou konzistentn�. N�zk� hodnoty v prosinci Dec 2003 jsou v�sledkem v�&#382;n�ch v�padk&#367; serveru." ;
$out_not_included = "Not included" ; #new

$out_average_1    = "pr&#367;m&#283;rn� hodnoty b&#283;hem zobrazen�ch m&#283;s�c&#367;" ;
$out_growth_1     = "pr&#367;m&#283;rn� m&#283;s�&#269;n� r&#367;st b&#283;hem zobrazen�ch m&#283;s�c&#367;" ;
$out_formula      = "vzorec" ;
$out_value        = "hodnota" ;
$out_monthes      = "m&#283;s�ce" ;
$out_skip_values  = "(Wikipedie s hodnotou < 10 jsou vynech�ny)" ;

$out_history      = "Pozn�mka: Hodnoty pro prvn� m&#283;s�ce jsou p&#345;�li&#353; n�zk�. " .
                    "Historie verz� nebyla v po&#269;�tc�ch v&#382;dy uchov�na." ;

$out_unique_users = "Unique users" ; # new
$out_archived     = "Archived" ; # new
$out_reg          = "Reg." ;   # new (Reg. = Registered)
$out_unreg        = "Unreg." ; # new (Unreg. = Unregistered)

$out_reg_users_edited = "reg. users edited" ; # new
$out_reg_user_edited  = "reg. user edited" ;  # new

$out_index        = "Index" ;    # new
$out_complete     = "Complete" ; # new
$out_concise      = "Concise" ;  # new

$out_categories_complete = "Complete" ; # new
$out_categories_concise  = "Concise" ;  # new
$out_categories_main     = "Main" ;     # new
$out_category_trees      = "Wikipedia Category Overviews" ; # new
$out_category_tree       = "Wikipedia Category Overview" ;  # new

$out_license      = "All data and images on this page are in the public domain." ; # new

$out_tbl1_intro   = "[[2]] ned�vno aktivn�ch wikipedist&#367;, " .
                    "se&#345;azeno podle po&#269;tu editac�:" ;
$out_tbl1_intro2  = "jsou po&#269;�t�ny pouze editace v &#269;l�nc�ch, nikoliv na diskuzn�ch str�nk�ch, apod." ;
$out_tbl1_intro3  = "&Delta; = zm&#283;na po&#345;ad� za 30 dn�" ;

$out_tbl1_hdr1    = "U&#382;ivatel" ;
$out_tbl1_hdr2    = "Editace" ;
$out_tbl1_hdr3    = "Prvn� editace" ;
$out_tbl1_hdr4    = "Posledn� editace" ;
$out_tbl1_hdr5    = "datum" ;
$out_tbl1_hdr6    = "uplynul�ch<br>dn&#367;" ;
$out_tbl1_hdr7    = "celkem" ;
$out_tbl1_hdr8    = "posledn�ch<br>30 dn&#367;" ;
$out_tbl1_hdr9    = "po&#345;ad�" ;
$out_tbl1_hdr10   = "te&#271;" ;
$out_tbl1_hdr11   = "&Delta;" ;
$out_tbl1_hdr12   = "&#268;l�nky" ;
$out_tbl1_hdr13   = "Ostatn�" ;

$out_tbl2_intro  = "[[3]] posledn� dobou neaktivn�ch wikipedist&#367;, " .
                   "se&#345;azeno podle po&#269;tu editac�:" ;

$out_tbl3_intro   = "R&#367;st po&#269;tu registrovan�ch aktivn�ch wikipedist&#367; a jejich aktivita" ;

$out_tbl3_hdr1a   = "Wikipedist�" ;
$out_tbl3_hdr1e   = "&#268;l�nky" ;
$out_tbl3_hdr1l   = "Datab�ze" ;
$out_tbl3_hdr1o   = "Odkazy" ;
$out_tbl3_hdr1t   = "Denn� n�v&#353;t&#283;vnost" ;

# use &nbsp; (non breaking space) instead of normal spaces in following headers
# this ensures text will never be broken into two lines
$out_tbl3_hdr1a2  = "(registrovan� u&#382;ivatel�)" ;
$out_tbl3_hdr1e2  = "(vyjma p&#345;esm&#283;rov�n�)" ;

$out_tbl3_hdr2a   = "celkem" ;
$out_tbl3_hdr2b   = "nov�" ;
$out_tbl3_hdr2c   = "editace" ;
$out_tbl3_hdr2e   = "po&#269;et" ;
$out_tbl3_hdr2f   = "nov�<br>za&nbsp;den" ;
$out_tbl3_hdr2h   = "pr&#367;m&#283;rn&#283;" ;
$out_tbl3_hdr2j   = "v�ce&nbsp;ne&#382;" ;
$out_tbl3_hdr2l   = "editace" ;
$out_tbl3_hdr2m   = "velikost" ;
$out_tbl3_hdr2n   = "slova" ;
$out_tbl3_hdr2o   = "vnit&#345;n�" ;
$out_tbl3_hdr2p   = "interwiki" ;
$out_tbl3_hdr2q   = "soubory" ;
$out_tbl3_hdr2r   = "extern�" ;
$out_tbl3_hdr2s   = "p&#345;esm&#283;rov�n�" ;
$out_tbl3_hdr2t   = "dotaz&#367;<br>na&nbsp;str�nky" ;
$out_tbl3_hdr2u   = "n�v&#353;t&#283;v" ;
$out_tbl3_hdr2s2  = "projects" ; # new

$out_tbl3_hdr3c   = ">&nbsp;5" ;
$out_tbl3_hdr3d   = ">&nbsp;100" ;
$out_tbl3_hdr3e   = "ofici�ln�" ;
$out_tbl3_hdr3f   = ">&nbsp;200&nbsp;z." ;
$out_tbl3_hdr3h   = "editac�" ;
$out_tbl3_hdr3i   = "bajt&#367;" ;
$out_tbl3_hdr3j   = "0,5&nbsp;kB" ;
$out_tbl3_hdr3k   = "2&nbsp;kB" ;

$out_tbl6_intro  = "[[4]] anonymn�ch u&#382;ivatel&#367;, se&#345;azeno podle po&#269;tu editac�" ;
$out_table6_footer = "Celkem %d editac� ud&#283;lali anonymn� u&#382;ivatel&#367;, z celkov�ho po&#269;tu %d editac� (%.0f\%)" ;

$out_tbl5_intro   = "Statistika n�v&#353;t&#283;v (zalo&#382;ena na v�stupu programu <a href='http://www.mrunix.net/webalizer/'><font color='#000088'>Webalizer</font></a>; " .
                    "<a href='http://www.mrunix.net/webalizer/webalizer_help.html'><font color='#000088'>definice</font></a>, " .
                    "<a href=''><font color='#000088'>graf</font></a>)" ;
$out_tbl5_hdr1a   = "Denn� pr&#367;m&#283;r" ;
$out_tbl5_hdr1e   = "Celkem za m&#283;s�c" ;
$out_tbl5_hdr2a   = "Po&#382;adavk&#367;" ;
$out_tbl5_hdr2b   = "Soubor&#367;" ;
$out_tbl5_hdr2c   = "Str�nek" ;
$out_tbl5_hdr2d   = "N�v&#353;t&#283;v" ;
$out_tbl5_hdr2e   = "Stanic" ;
$out_tbl5_hdr2f   = "Kilobajt&#367;" ;
$out_tbl5_hdr2g   = "N�v&#353;t&#283;v" ;
$out_tbl5_hdr2h   = "Str�nek" ;
$out_tbl5_hdr2i   = "Soubor&#367;" ;
$out_tbl5_hdr2j   = "Po&#382;adavk&#367;" ;

$out_tbl7_intro   = "Z�znamy v datab�zi podle jmenn�ho prostoru / Kategorizovan� &#269;l�nky<p>" .
                    "<small>1) Kategorie vkl�dan� p&#345;es &#353;ablonu nejsou rozpozn�ny.</small>" ;
$out_tbl7_hdr_ns  = "Jmenn� prostor" ;
$out_tbl7_hdr_ca  = "Kategorizovan�<br>&#269;l�nky <sup>1</sup>" ;

$out_tbl8_intro = "Rozlo&#382;en� editac� &#269;l�nk&#367; na wikipedisty"  ;

$out_tbl9_intro   = "[[5]] nejv�ce editovan�ch &#269;l�nk&#367; (> 25 editac�)"  ;

$out_tbl10_intro  = "[[3]] bots, ordered by number of contributions" ; # new

@out_namespaces   = ("&#268;l�nek", "U&#382;ivatel", "Projekt", "Soubor", "MediaWiki", "&#352;ablona", "N�pov&#283;da", "Kategorie") ;

@out_tbl3_legend  = (
"Wikipedist�, kte&#345;� editovali alespo&#328; 10kr�t od sv�ho p&#345;�chodu",
"N�r&#367;st wikipedist&#367;, kte&#345;� editovali alespo&#328; 10kr�t od sv�ho p&#345;�chodu",
"Wikipedist� kte&#345;� editovali 5 a v�ce kr�t v tomto m&#283;s�ci",
"Wikipedist�, kte&#345;� editovali 100 a v�ce kr�t v tomto m&#283;s�ci",
"&#268;l�nky, kter� obsahuj� alespo&#328; jeden intern� odkaz",
"&#268;l�nky, kter� obsahuj� alesp&#328; jeden intern� odkaz a 200 znak&#367; &#269;iteln�ho textu, <br>" .
   "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nezapo&#269;�t�vaj� se wiki- a html k�dy, skryt� odkazy, apod.; tak� hlavi&#269;ky se nepo&#269;�taj�<br>" .
   "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(jin� sloupce pou&#382;�vaj� pro po&#269;�t�n� &#269;l�nk&#367; ofici�ln� metodu)",
"Nov� &#269;l�nky za den v uplynul�m m&#283;s�ci",
"Pr&#367;m&#283;rn� po&#269;et editac� na &#269;l�nek",
"Pr&#367;m&#283;rn� velikost &#269;l�nku v bajtech",
"Procento &#269;l�nk&#367; s alespo&#328; 0,5 kB &#269;iteln�ho textu (viz F)",
"Procento &#269;l�nk&#367; s alespo&#328; 2 kB &#269;iteln�ho textu (viz F)",
"Po&#269;et editac� v m&#283;s�ci (v&#269;etn&#283; p&#345;esm&#283;rov�n� a neregistrovan�ch u&#382;ivatel&#367;)",
"Celkov� velikost v&#353;ech &#269;l�nk&#367; (v&#269;etn&#283; p&#345;esm&#283;rov�n�)",
"Celkov� po&#269;et slov (vyjma p&#345;esm&#283;rov�n�, wiki/html k�dy a skryt� odkazy)",
"Celkov� po&#269;et intern�ch odkaz&#367; (vyjma p&#345;esm&#283;rov�n�, pah�l&#367; a seznam&#367;)",
"Celkov� po&#269;et odkaz&#367; na jin� Wikipedie",
"Celkov� po&#269;et p&#345;�tomn�ch soubor&#367;",
"Celkov� po&#269;et extern�ch odkaz&#367;",
"Celkov� po&#269;et p&#345;esm&#283;rov�n�",
"Dotaz&#367; na str�nky za den (<a href='http://www.mrunix.net/webalizer/webalizer_help.html'><font color='#000088'>definition</font></a>, zalo&#382;eno na v�stupu programu <a href='http://www.mrunix.net/webalizer/'><font color='#000088'>Webalizer</font></a>)",
"N�v&#353;t&#283;v za den (<a href='http://www.mrunix.net/webalizer/webalizer_help.html'><font color='#000088'>definice</font></a>, zalo&#382;eno na v�stupu programu <a href='http://www.mrunix.net/webalizer/'><font color='#000088'>Webalizer</font></a>)",
"Data za posledn� m&#283;s�ce"
) ;

# some plots have slightly other criteria than corresponding tables
@out_plot_legend  = (
"Wikipedist�, kte&#345;� editovali 5 a v�ce kr�t v t�dnu",
"Wikipedist�, kte&#345;� editovali 25 a v�ce kr�t v t�dnu"
) ;

$out_legend_daily_edits = "Editac� za den (v&#269;etn&#283; p&#345;esm&#283;rov�n� a neregistrovan�ch u&#382;ivatel&#367;)" ;
$out_report_description_daily_edits = "Editac� za den" ;
$out_report_description_edits       = "Editac� za m&#283;s�c/den" ;
$out_report_description_current_status = "Current status" ; # new

@out_report_descriptions = (
"P&#345;isp&#283;vatel�",
"Nov� wikipedist�",
"Aktivn� wikipedist�",
"Velmi aktivn� wikipedist�",
"Po&#269;et &#269;l�nk&#367; (ofici�ln&#283;)",
"Po&#269;et &#269;l�nk&#367; (alternativn&#283;)",
"Nov� &#269;l�nky za den",
"Editac� na &#269;l�nek",
"Bajt&#367; na &#269;l�nek",
"&#268;l�nky v&#283;t&#353;� ne&#382; 0,5 kB",
"&#268;l�nky v&#283;t&#353;� 2 kB",
"Editace za m&#283;s�c",
"Velikost datab�ze",
"Slova",
"Intern� odkazy",
"Odkazy na jin� Wikipedie",
"Soubory",
"Extern� odkazy",
"P&#345;esm&#283;rov�n�",
"Dotaz&#367; na str�nky za den",
"N�v&#353;t&#283;v za den",
"P&#345;ehled"
) ;

# if you don't know all translation please mark untranslated ones

$out_languages {"aa"} = "afar&#353;tina" ;
$out_languages {"ab"} = "abchaz&#353;tina" ;
$out_languages {"af"} = "afrik�n&#353;tina" ;
$out_languages {"ak"} = "akan&#353;tina" ;
$out_languages {"als"} = "alsas&#353;tina" ;
$out_languages {"am"} = "amhar&#353;tina" ;
$out_languages {"an"} = "aragon&#353;tina" ;
$out_languages {"ang"} = "anglosa&#353;tina" ;
$out_languages {"ar"} = "arab&#353;tina" ;
$out_languages {"as"} = "�s�m&#353;tina" ;
$out_languages {"ast"} = "astur&#353;tina" ;
$out_languages {"av"} = "avar&#353;tina" ;
$out_languages {"ay"} = "ajmar&#353;tina" ;
$out_languages {"az"} = "�zeb�jd&#382;�n&#353;tina" ;
$out_languages {"ba"} = "ba&#353;kir&#353;tina" ;
$out_languages {"be"} = "b&#283;loru&#353;tina" ;
$out_languages {"bg"} = "bulhar&#353;tina" ;
$out_languages {"bh"} = "bih�r&#353;tina" ;
$out_languages {"bi"} = "bislam&#353;tina" ;
$out_languages {"bn"} = "beng�l&#353;tina" ;
$out_languages {"bo"} = "tibet&#353;tina" ;
$out_languages {"br"} = "breton&#353;tina" ;
$out_languages {"bs"} = "bosen&#353;tina" ;
$out_languages {"bug"} = "bugi&#353;tina" ;
$out_languages {"ca"} = "katal�n&#353;tina" ;
$out_languages {"ch"} = "&#269;amor&#353;tina" ;
$out_languages {"cho"} = "choctaw&#353;tina" ;
$out_languages {"co"} = "korsi&#269;tina" ;
$out_languages {"cr"} = "kr�" ;
$out_languages {"cs"} = "&#269;e&#353;tina" ;
$out_languages {"cy"} = "vel&#353;tina" ;
$out_languages {"da"} = "d�n&#353;tina" ;
$out_languages {"de"} = "n&#283;m&#269;ina" ;
$out_languages {"dv"} = "divehi" ;
$out_languages {"dz"} = "dzongkha" ;
$out_languages {"ee"} = "ewe" ;
$out_languages {"el"} = "&#345;e&#269;tina" ;
$out_languages {"en"} = "angli&#269;tina" ;
$out_languages {"eo"} = "esperanto" ;
$out_languages {"es"} = "&#353;pan&#283;l&#353;tina" ;
$out_languages {"et"} = "eston&#353;tina" ;
$out_languages {"eu"} = "baski&#269;tina" ;
$out_languages {"fa"} = "per&#353;tina" ;
$out_languages {"fi"} = "fin&#353;tina" ;
$out_languages {"fj"} = "fid&#382;ij&#353;tina" ;
$out_languages {"fo"} = "faer&#353;tina" ;
$out_languages {"fr"} = "francouz&#353;tina" ;
$out_languages {"fy"} = "fr�&#353;tina" ;
$out_languages {"ga"} = "ir&#353;tina" ;
$out_languages {"gay"} = "gayo" ;
$out_languages {"gd"} = "skot&#353;tina" ;
$out_languages {"gl"} = "galicij&#353;tina" ;
$out_languages {"gn"} = "guaran�" ;
$out_languages {"got"} = "g�t&#353;tina" ;
$out_languages {"gu"} = "gud&#382;ar�d&#353;tina" ;
$out_languages {"gv"} = "man&#353;tina" ;
$out_languages {"ha"} = "hausa" ;
$out_languages {"haw"} = "havaj&#353;tina" ;
$out_languages {"he"} = "hebrej&#353;tina" ;
$out_languages {"hi"} = "hind&#353;tina" ;
$out_languages {"hr"} = "chorvat&#353;tina" ;
$out_languages {"ht"} = "hait&#353;tina" ;
$out_languages {"hu"} = "ma&#271;ar&#353;tina" ;
$out_languages {"hy"} = "arm�n&#353;tina" ;
$out_languages {"ia"} = "interlingua" ;
$out_languages {"iba"} = "iban" ;
$out_languages {"id"} = "indon�&#353;tina" ;
$out_languages {"ik"} = "inupiak" ;
$out_languages {"io"} = "ido" ;
$out_languages {"is"} = "islan&#353;tina" ;
$out_languages {"it"} = "ital&#353;tina" ;
$out_languages {"iu"} = "inuktitut" ;
$out_languages {"ja"} = "japon&#353;tina" ;
$out_languages {"jv"} = "jav�n&#353;tina" ;
$out_languages {"ka"} = "gruz�n&#353;tina" ;
$out_languages {"kaw"} = "kawi" ;
$out_languages {"kk"} = "kaza&#353;tina" ;
$out_languages {"kl"} = "gr�n&#353;tina" ;
$out_languages {"km"} = "kambod&#382;&#353;tina" ;
$out_languages {"kn"} = "kannad&#353;tina" ;
$out_languages {"ko"} = "korej&#353;tina" ;
$out_languages {"ks"} = "ka&#353;m�r&#353;tina" ;
$out_languages {"ku"} = "kurd&#353;tina" ;
$out_languages {"ky"} = "kyrgyz&#353;tina" ;
$out_languages {"la"} = "latina" ;
$out_languages {"lb"} = "lucembur&#353;tina" ;
$out_languages {"li"} = "limbur&#353;tina" ;
$out_languages {"ln"} = "lingala" ;
$out_languages {"lo"} = "lao&#353;tina" ;
$out_languages {"ls"} = "Latino Sine Flexione" ;
$out_languages {"lt"} = "litev&#353;tina" ;
$out_languages {"lv"} = "loty&#353;&#353;tina" ;
$out_languages {"mad"} = "madur&#353;tina" ;
$out_languages {"mak"} = "makasar&#353;tina" ;
$out_languages {"mg"} = "malga&#353;&#353;tina" ;
$out_languages {"mi"} = "maor&#353;tina" ;
$out_languages {"mk"} = "makedon&#353;tina" ;
$out_languages {"ml"} = "malaj�lam&#353;tina" ;
$out_languages {"mn"} = "mongol&#353;tina" ;
$out_languages {"mo"} = "moldav&#353;tina" ;
$out_languages {"mr"} = "mar�th&#353;tina" ;
$out_languages {"ms"} = "malaj&#353;tina" ;
$out_languages {"mt"} = "malt&#353;tina" ;
$out_languages {"mus"} = "kr�k" ;
$out_languages {"my"} = "barm&#353;tina" ;
$out_languages {"na"} = "nauru&#353;tina" ;
$out_languages {"nah"} = "nahuatl" ;
$out_languages {"nds"} = "dolnosa&#353;tina" ;
$out_languages {"ne"} = "nep�l&#353;tina" ;
$out_languages {"nl"} = "nizozem&#353;tina" ;
$out_languages {"nn"} = "nor&#353;tina (Nynorsk)" ;
$out_languages {"no"} = "nor&#353;tina" ;
$out_languages {"nv"} = "navaho" ;
$out_languages {"oc"} = "okcit�n&#353;tina" ;
$out_languages {"om"} = "oromo" ;
$out_languages {"or"} = "orij&#353;tina" ;
$out_languages {"pa"} = "pand&#382;�b&#353;tina" ;
$out_languages {"pl"} = "pol&#353;tina" ;
$out_languages {"ps"} = "pa&#353;tun&#353;tina" ;
$out_languages {"pt"} = "portugal&#353;tina" ;
$out_languages {"qu"} = "ke&#269;ua" ;
$out_languages {"rm"} = "retorom�n&#353;tina" ;
$out_languages {"rn"} = "rund&#353;tina" ;
$out_languages {"ro"} = "rumun&#353;tina" ;
$out_languages {"roa_rup"} = "arumun&#353;tina" ;
$out_languages {"ru"} = "ru&#353;tina" ;
$out_languages {"rw"} = "kinyarwanda" ;
$out_languages {"sa"} = "sanskrt" ;
$out_languages {"sc"} = "sardin&#353;tina" ;
$out_languages {"scn"} = "sicil&#353;tina" ;
$out_languages {"sd"} = "sindh&#353;tina" ;
$out_languages {"se"} = "lapon&#353;tina" ;
$out_languages {"sg"} = "sango&#353;tina" ;
$out_languages {"sh"} = "srbochorvat&#353;tina" ;
$out_languages {"si"} = "sinhal&#353;tina" ;
$out_languages {"simple"} = "zjednodu&#353;en�&nbsp;angli&#269;tina" ;
$out_languages {"sk"} = "sloven&#353;tina" ;
$out_languages {"sl"} = "slovin&#353;tina" ;
$out_languages {"sm"} = "samoj&#353;tina" ;
$out_languages {"sn"} = "&#353;on&#353;tina" ;
$out_languages {"so"} = "som�l&#353;tina" ;
$out_languages {"sq"} = "alb�n&#353;tina" ;
$out_languages {"sr"} = "srb&#353;tina" ;
$out_languages {"ss"} = "siswati" ;
$out_languages {"st"} = "jihosot&#353;tina" ;
$out_languages {"su"} = "sund�n&#353;tina" ;
$out_languages {"sv"} = "&#353;v�d&#353;tina" ;
$out_languages {"sw"} = "svahil&#353;tina" ;
$out_languages {"ta"} = "tamil&#353;tina" ;
$out_languages {"te"} = "telug&#353;tina" ;
$out_languages {"tg"} = "t�d&#382;i&#269;tina" ;
$out_languages {"th"} = "thaj&#353;tina" ;
$out_languages {"ti"} = "tigri&#328;&#328;a" ;
$out_languages {"tk"} = "turkmen&#353;tina" ;
$out_languages {"tl"} = "tagal&#353;tina" ;
$out_languages {"tn"} = "&#269;wana" ;
$out_languages {"to"} = "tong�n&#353;tina" ;
$out_languages {"tr"} = "ture&#269;tina" ;
$out_languages {"ts"} = "tsonga" ;
$out_languages {"tt"} = "tatar&#353;tina" ;
$out_languages {"tw"} = "&#357;wi&#353;tina" ;
$out_languages {"ty"} = "tahit&#353;tina" ;
$out_languages {"ug"} = "ujgur&#353;tina" ;
$out_languages {"uk"} = "ukrajin&#353;tina" ;
$out_languages {"ur"} = "urd&#353;tina" ;
$out_languages {"uz"} = "uzbe&#269;tina" ;
$out_languages {"vi"} = "vietnam&#353;tina" ;
$out_languages {"vo"} = "volap�k" ;
$out_languages {"wa"} = "valon&#353;tina" ;
$out_languages {"wo"} = "wolof" ;
$out_languages {"yi"} = "jidi&#353;" ;
$out_languages {"yo"} = "jorub&#353;tina" ;
$out_languages {"za"} = "zhuang" ;
$out_languages {"zh"} = "&#269;�n&#353;tina" ;
$out_languages {"zh_min_nan"} = "minnan" ;
$out_languages {"zu"} = "zulu" ;
$out_languages {"zz"} = "V&#353;echny&nbsp;jazyky" ;
}

# please also give example of whole date
# different languages use different styles like :

# 13. dubna 2003
# 18. 8. 2003

# end of file marker, do not remove:
1;
