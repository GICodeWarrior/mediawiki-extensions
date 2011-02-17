#!/usr/bin/perl

# please specify all accented characters as utf-8 or
# as html codes like &agrave; or $#224;
# see for a list of html codes see
# http://evolt.org/article/ala/17/21234/

sub SetLiterals_HU
{
$out_thousands_separator = "&nbsp;" ;
$out_decimal_separator   = "," ;

$out_statistics   = "Wikip�dia statisztik�k" ;
$out_charts       = "Wikipedia diagramok" ;
$out_btn_tables   = "T�bl�zatok" ;
$out_btn_table    = "Tabl�zat" ;
$out_btn_charts   = "Diagramok" ;

$out_wikipedia    = "Wikip�dia" ;
$out_wikipedias   = "Wikip�di�k" ;
$out_wikipedians   = "wikip�dist�k" ;

$out_wiktionary   = "Wikisz�t�r" ;
$out_wiktionaries = "Wikisz�t�rak" ;
$out_wiktionarians   = "wikisz�t�rnokok" ;

$out_wikibook        = "Wikik�nyv" ;
$out_wikibooks       = "Wikik�nyvek" ;
$out_wikibookies     = "Wikik�nyvel&#337;k" ;

$out_wikiquote       = "Wikid�zet" ;
$out_wikiquotes      = "Wikid�zetek" ;
$out_wikiquotarians  = "Wikid�z&#337;k" ;

$out_wikinews        = "Wikih�rek" ;
$out_wikinewssites   = "Wikih�roldalak" ;
$out_wikireporters   = "Wikiriporterek" ;

$out_wikisources     = "Wikisource" ;  # new
$out_wikisourcesites = "Wikisources" ; # new
$out_wikilibrarians  = "Wikilibrarians" ; # new

$out_wikispecial     = "Wikispecial" ;
$out_wikispecials    = "Wikispecial oldalak" ;
$out_wikispecialists = "Szerz&#337;k" ;

$out_wikimedia       = "Wikimedia" ;
$out_wikimedia_sites = "Wikimedia oldalak" ;

$out_comparisons  = "�sszehasonl�t�sok" ;

$out_creation_history = "L�trehoz�s ideje" ;
$out_accomplishments  = "Teljes�tm�ny" ;
$out_created          = "L�trehozva" ;
$average_increase     = "�tlagos n�veked�s havonta" ;

$out_explanation_categories = "Behind each category you find the number of articles that belong to this category" ; # new
$out_follow_links           = "Tip: in order to avoid lengthy page reloads use Shift+Mouseclick to follow links" ; # new
$out_categories_templates   = "Category tags that were inserted via a template are <b>not yet</b> recognised." ; # new
$out_categories_redirects   = "Also this overview may lists categories pages that only contain a redirect tag." ;

$out_license      = "Az oldalon tal�lhat� minden adat �s k�p k�zkincs." ;
$out_generated    = "L�trehoz�s d�tuma: " ;
$out_sqlfiles     = "SQL dump f�jlok d�tuma: " ;
$out_version      = "Script verzi�sz�ma:" ;
$out_author       = "Szerz&#337;" ;
$out_mail         = "Mail" ;
$out_site         = "Honlap" ;
$out_home         = "Kezd&#337;lap" ;
$out_sitemap      = "Oldalt�rk�p";
$out_rendered     = "A diagramokat gener�lta: " ;
$out_generated2   = "Tov�bbi statisztik�k:" ;
$out_easytimeline = "EasyTimeline t�bl�k Wikip�di�nk�nt" ;
$out_categories   = "Kateg�ri�k Wikip�di�nk�nt" ;
#couldnt translate last two because of different word order
$out_botactivity  = "Bot activity" ;     # new
$out_stats_for    = "Statistics for " ; # new
$out_stats_per    = "Statistics per " ; # new

$out_gigabytes    = "GB" ;
$out_megabytes    = "MB" ;
$out_kilobytes    = "kB" ;
$out_bytes        = "B" ;
$out_million      = "M" ;
$out_thousand     = "k" ;

$out_date         = "D�tum" ;
$out_year         = "�v" ;
$out_month        = "h�nap" ;
$out_mean         = "�tlag" ;
$out_growth       = "N�veked�s" ;
$out_total        = "�sszesen" ;
$out_bars         = "Oszlopok" ;
$out_words        = "szavak sz�ma" ;
$out_zoom         = "Nagy�t�s" ;
$out_scripts      = "Szkriptek" ;

$out_new          = "�j" ;
$out_all          = "�sszes" ;
$out_all2         = "�sszes" ;

$out_conversions1 = "" ;
$out_conversions2 = " (f�l-)automatikus konverzi� alkalmazva." ;

$out_phaseIII     = "Az oldal csak a <a href='http://www.mediawiki.org'>MediaWiki</a> szoftverrel m&#369;k�d&#337; Wikip�di�kat tartalmazza." ;

$out_svg_viewer   = "Az oldal megtekint�s�hez sz�ks�ged lesz egy " .
                    "SVG megjelen�t&#337;re. MS Explorerre Win/Mac alatt ilyen az (ingyenes) <a href='http://www.adobe.com/svg/viewer/install/'>Adobe SVG Viewer</a>" ;
$out_rendering    = "Megjelen�t�s folyamatban...." ;


$out_sort_order   = "A Wikip�di�k a bels&#337; (nem redirekt) linkek sz�ma alapj�n vannak rendezve<br>" .
                    "Ez igazs�gosabb �sszehasonl�t�si alapnak t&#369;nik, mint a cikkek sz�ma vagy az adatb�zis m�rete:<br>" .
                    "A cikkek sz�ma nem sokat jelent, mert egyes Wikip�di�k f&#337;leg r�vid cikkeket tartalmaznak,<br>" .
                    "vagy tele vannak automatikusan gener�lt cikkekkel, m�s Wikip�di�k pedig kevesebb, de hosszabb, k�zzel �rt cikkb&#337;l �llnak.<br>" .
                    "Az adatb�zis m�rete f�gg a k�dol�st�l (a unicode karakterek t�bb helyet foglalnak),<br>" .
                    "�s att�l, mennyi jelent�st hordoz egy karakter (a k�nai karakterek p�ld�ul teljes szavak).<br>" ;

$out_webalizer_note = "Figyelem: a Webalizer adatok nem mindig el�rhet&#337;ek. A 2003. decemberi alacsony sz�mokat egy szerverkies�s okozta." ;
$out_not_included = "Not included" ; #new

$out_average_1    = "�tlagos �rt�k a mutatott h�napokban" ;
$out_growth_1     = "�tlagos havi n�veked�s a mutatott h�napokban" ;
$out_formula      = "k�plet" ;
$out_value        = "eredm�ny" ;
$out_monthes      = "h�nap" ;
$out_skip_values  = "(nem szerepelnek azok a Wikip�di�k, amikn�l az �rt�k 10-n�l kisebb)" ;

$out_history      = "  Figyelem: az als� p�r h�napra adott �rt�kek t�l alacsonyak. " .
                    "A korai napokban a lapt�rt�net nem mindig &#337;rz&#337;d�tt meg." ;

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

$out_tbl1_intro   = "[[2]], a k�zelm�ltban akt�v wikip�dista " .
                    "a szerkeszt�seik sz�ma szerint rendezve" ;
$out_tbl1_intro2  = "csak a sz�cikkszerkeszt�sek sz�m�tanak, vitalapok stb. nem" ;
$out_tbl1_intro3  = "&Delta; = v�ltoz�s a rangsorban 30 nap alatt" ;

$out_tbl1_hdr1    = "Felhaszn�l�" ;
$out_tbl1_hdr2    = "Szerkeszt�s" ;
$out_tbl1_hdr3    = "Els&#337; szerkeszt�s" ;
$out_tbl1_hdr4    = "Utols� szerkeszt�s" ;
$out_tbl1_hdr5    = "d�tum" ;
$out_tbl1_hdr6    = "nappal<br>ezel&#337;tt" ;
$out_tbl1_hdr7    = "�sszesen" ;
$out_tbl1_hdr8    = "utols�<br>30 napon" ;
$out_tbl1_hdr9    = "helyez�s" ;
$out_tbl1_hdr10   = "most" ;
$out_tbl1_hdr11   = "&Delta;" ;
$out_tbl1_hdr12   = "Sz�cikkek" ;
$out_tbl1_hdr13   = "Egy�b" ;

$out_tbl2_intro  = "[[3]], a k�zelm�ltban t�vollev&#337; wikip�dista, " .
                   "a szerkeszt�seik sz�ma szerint rendezve" ;

$out_tbl3_intro   = "A regisztr�lt, akt�v wikip�dist�k sz�m�nak n�veked�se, �s tev�kenys�g�k" ;

$out_tbl3_hdr1a   = "Wikip�dist�k" ;
$out_tbl3_hdr1e   = "Sz�cikkek" ;
$out_tbl3_hdr1l   = "Adatb�zis" ;
$out_tbl3_hdr1o   = "Linkek" ;
$out_tbl3_hdr1t   = "Napi haszn�lat" ;

# use &nbsp; (non breaking space) instead of normal spaces in following headers
# this ensures text will never be broken into two lines
$out_tbl3_hdr1a2  = "(regisztr�lt&nbsp;felhaszn�l�k)" ;
$out_tbl3_hdr1e2  = "(redirekteket&nbsp;kiv�ve)" ;

$out_tbl3_hdr2a   = "�sszesen" ;
$out_tbl3_hdr2b   = "�j" ;
$out_tbl3_hdr2c   = "szerkeszt�sei" ;
$out_tbl3_hdr2e   = "�sszesen" ;
$out_tbl3_hdr2f   = "�j<br>naponta" ;
$out_tbl3_hdr2h   = "�tlagosan" ;
$out_tbl3_hdr2j   = "nagyobb&nbsp;mint" ;
$out_tbl3_hdr2l   = "szerkeszt�s" ;
$out_tbl3_hdr2m   = "m�ret" ;
$out_tbl3_hdr2n   = "sz�" ;
$out_tbl3_hdr2o   = "bels&#337;" ;
$out_tbl3_hdr2p   = "interwiki" ;
$out_tbl3_hdr2q   = "k�p" ;
$out_tbl3_hdr2r   = "k�ls&#337;" ;
$out_tbl3_hdr2s   = "redirekt" ;
$out_tbl3_hdr2t   = "oldal<br>lek�r�s" ;
$out_tbl3_hdr2u   = "l�togat�s" ;
$out_tbl3_hdr2s2  = "projects" ; # new

$out_tbl3_hdr3c   = ">&nbsp;5" ;
$out_tbl3_hdr3d   = ">&nbsp;100" ;
$out_tbl3_hdr3e   = "hivatalos" ;
$out_tbl3_hdr3f   = ">&nbsp;200&nbsp;bet&#369;" ;
$out_tbl3_hdr3h   = "szerkeszt�s" ;
$out_tbl3_hdr3i   = "b�jt" ;
$out_tbl3_hdr3j   = "0.5&nbsp;Kb" ;
$out_tbl3_hdr3k   = "2&nbsp;Kb" ;

$out_tbl6_intro  = "[[4]] anonim felhaszn�l�, a szerkeszt�seik sz�ma szerint rendezve" ;
$out_table6_footer = "�sszesen %d anonim szerkeszt�s, �sszesen %d szerkeszt�sb&#337;l (%.0f\%)" ;

$out_tbl5_intro   = "L�togatotts�gi statisztik�k (a <a href='http://www.mrunix.net/webalizer/'><font color='#000088'>Webalizer</font></a> alapj�n; " .
                    "<a href='http://www.mrunix.net/webalizer/webalizer_help.html'><font color='#000088'>defin�ci�k</font></a>, " .
                    "<a href=''><font color='#000088'>diagram</font></a>)" ;
$out_tbl5_hdr1a   = "Napi �tlag" ;
$out_tbl5_hdr1e   = "Havi �sszes�t�s" ;
$out_tbl5_hdr2a   = "Tal�latok (hit)" ;
$out_tbl5_hdr2b   = "F�jlok" ;
$out_tbl5_hdr2c   = "Lapok (page)" ;
$out_tbl5_hdr2d   = "L�togat�sok" ;
$out_tbl5_hdr2e   = "Oldalak (site)" ;
$out_tbl5_hdr2f   = "Kilob�jtok" ;
$out_tbl5_hdr2g   = "L�togat�sok" ;
$out_tbl5_hdr2h   = "Lapok (page)" ;
$out_tbl5_hdr2i   = "F�jlok" ;
$out_tbl5_hdr2j   = "Tal�latok (hit)" ;

$out_tbl7_intro   = "Adatb�zisrekordok n�vterenk�nt / Kategoriz�lt cikkek<p>" .
                    "<small>1) A sablon seg�ts�g�vel beillesztett kateg�ri�k nincsenek belesz�molva.</small>" ;
$out_tbl7_hdr_ns  = "N�vt�r" ;
$out_tbl7_hdr_ca  = "Kategoriz�lt<br>cikkek <sup>1</sup>" ;

$out_tbl8_intro = "Sz�cikk-szerkeszt�sek megoszl�sa a wikip�dist�k k�z�tt"  ;

$out_tbl9_intro   = "A [[5]] legt�bbet szerkesztett sz�cikk (> 25 szerkeszt�s)"  ;

$out_tbl10_intro  = "[[3]] bots, ordered by number of contributions" ; # new

@out_namespaces   = ("Sz�cikk", "User", "Wikip�dia", "K�p", "MediaWiki", "Sablon", "Seg�ts�g", "Kateg�ria") ;

@out_tbl3_legend  = (
"Wikip�dist�k, akiknek legal�bb 10 szerkeszt�s�k van",
"Azon wikip�dist�k sz�m�nak a n�veked�se, akiknek legal�bb 10 szerkeszt�s�k van",
"Wikip�dist�k, akiknek legal�bb 5 szerkeszt�s�k van ebben a h�napban",
"Wikip�dist�k, akiknek legal�bb 100 szerkeszt�s�k van ebben a h�napban",
"Sz�cikkek, amikben legal�bb egy bels&#337; link van",
"Sz�cikkek, amikben legal�bb egy bels&#337; link �s 200 karakternyi olvashat� sz�veg van, <br>" .
   "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a wiki- �s html k�dok, rejtett linkek, felzetek stb. nem sz�m�tanak bele<br>" .
   "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(a t�bbi oszlop a hivatalos sz�ml�l�si m�dszeren alapul)",
"Egy napra es&#337; �j sz�ikkek sz�ma az elm�lt h�napban",
"A cikkenk�nti v�ltozatok �tlagos sz�ma",
"�tlagos cikkm�ret b�jtban",
"Legal�bb 0.5 Kb olvashat� sz�veget (l�sd F) tartalmaz� sz�cikkek sz�ma",
"Legal�bb 2 Kb olvashat� sz�veget (l�sd F) tartalmaz� sz�cikkek sz�ma",
"Szerkeszt�sek sz�ma az elm&#337;lt h�napban (mozgat�sokat �s anonim szerkeszt&#337;ket is bele�rtve)",
"Az �sszes sz�cikk egy�ttes m�rete (a redirekteket is bele�rtve)",
"Szavak sz�ma (redirekteket, html/wiki k�dot �s rejtett linkeket nem sz�m�tva)",
"Bels&#337; linkek sz�ma (redirekteket, csonkokat �s linklist�kat nem sz�m�tva)",
"M�s Wikip�di�kba mutat� linkek egy�ttes sz�ma",
"K�pek sz�ma",
"M�s oldalakra (site) vezet&#337; linkek sz�ma",
"Redirektek sz�ma",
"Laplet�lt�sek napi sz�ma (<a href='http://www.mrunix.net/webalizer/webalizer_help.html'><font color='#000088'>defin�ci�</font></a> a <a href='http://www.mrunix.net/webalizer/'><font color='#000088'>Webalizer</font></a> szerint)",
"L�togat�sok napi sz�ma (<a href='http://www.mrunix.net/webalizer/webalizer_help.html'><font color='#000088'>defin�ci�</font></a> a <a href='http://www.mrunix.net/webalizer/'><font color='#000088'>Webalizer</font></a> szerint)",
"Az ut�bbi h�napok adatai"
) ;

# some plots have slightly other criteria than corresponding tables
@out_plot_legend  = (
"Wikip�dist�k, akiknek egy h�t alatt 5 vagy t�bb szerkeszt�se volt",
"Wikip�dist�k, akiknek egy h�t alatt 25 vagy t�bb szerkeszt�se volt"
) ;

$out_legend_daily_edits = "Szerkeszt�sek napi bont�sban (redirekteket �s anonim szerkeszt�seket belesz�m�tva)" ;
$out_report_description_daily_edits = "Szerkeszt�sek napi bont�sban" ;
$out_report_description_edits       = "Szerkeszt�sek havi/napi bont�sban" ;
$out_report_description_current_status = "Current status" ; # new

@out_report_descriptions = (
"R�sztvev&#337;k",
"�j wikip�dist�k",
"Akt�v wikip�dist�k",
"Nagyon akt�v wikip�dist�k",
"Sz�cikkek sz�ma (hivatalos)",
"Sz�cikkek sz�ma (alternat�v)",
"�j sz�cikk/nap",
"Szerkeszt�s/sz�cikk",
"B�jt/sz�cikk",
"0.5 Kb-n�l nagyobb cikkek",
"2 Kb-n�l nagyobb cikkek",
"Szerkeszt�s/h�",
"Adatb�zism�ret",
"Szavak sz�ma",
"Bels&#337; linkek",
"Linkek m�s Wikip�di�kra",
"K�pek",
"Weblinkek",
"Redirektek",
"Oldallek�r�s/nap",
"L�togat�s/nap",
"�ttekint�s"
) ;

# lines ending with # are untranslated

$out_languages {"aa"} = "Afar" ; #
$out_languages {"ab"} = "Abkhazian" ; #
$out_languages {"af"} = "Afrikaans" ;
$out_languages {"ak"} = "Akana" ; #
$out_languages {"als"} = "elz�szi" ; #
$out_languages {"am"} = "Amharic" ; #
$out_languages {"an"} = "Aragonese" ; #
$out_languages {"ang"} = "Anglo-Saxon" ; #
$out_languages {"ar"} = "arab" ;
$out_languages {"as"} = "Assamese" ; #
$out_languages {"ast"} = "aszt�riai" ;
$out_languages {"av"} = "Avienan" ; #
$out_languages {"ay"} = "Aymara" ; #
$out_languages {"az"} = "Azerbaijani" ; #
$out_languages {"ba"} = "Bashkir" ; #
$out_languages {"be"} = "feh�rorosz" ;
$out_languages {"bg"} = "bolg�r" ;
$out_languages {"bh"} = "Bihari" ; #
$out_languages {"bi"} = "Bislama" ; #
$out_languages {"bn"} = "Bengali" ; #
$out_languages {"bo"} = "Tibetan" ; #
$out_languages {"br"} = "Breton" ; #
$out_languages {"bs"} = "bosny�k" ;
$out_languages {"bug"} = "Buginese" ; #
$out_languages {"ca"} = "katal�n" ;
$out_languages {"ch"} = "Chamoru" ; #
$out_languages {"cho"} = "Chotaw" ; #
$out_languages {"co"} = "korzikai" ;
$out_languages {"cr"} = "Cree" ; #
$out_languages {"cs"} = "cseh" ;
$out_languages {"cy"} = "walesi" ;
$out_languages {"da"} = "d�n" ;
$out_languages {"de"} = "n�met" ;
$out_languages {"dv"} = "Divehi" ; #
$out_languages {"dz"} = "Dzongkha" ; #
$out_languages {"ee"} = "Ewe" ; #
$out_languages {"el"} = "g�r�g" ;
$out_languages {"en"} = "angol" ;
$out_languages {"eo"} = "eszperant�" ;
$out_languages {"es"} = "spanyol" ;
$out_languages {"et"} = "�szt" ;
$out_languages {"eu"} = "baszk" ;
$out_languages {"fa"} = "perzsa" ;
$out_languages {"fi"} = "finn" ;
$out_languages {"fj"} = "Fijian" ; #
$out_languages {"fo"} = "Faeroese" ; #
$out_languages {"fr"} = "francia" ;
$out_languages {"fy"} = "fr�z" ;
$out_languages {"ga"} = "�r" ;
$out_languages {"gay"} = "Gayo" ; #
$out_languages {"gd"} = "sk�t" ;
$out_languages {"gl"} = "gallego" ;
$out_languages {"gn"} = "Guarani" ; #
$out_languages {"got"} = "Gothic" ; #
$out_languages {"gu"} = "gudzsarati" ;
$out_languages {"gv"} = "Manx Gaelic" ; #
$out_languages {"ha"} = "Hausa" ; #
$out_languages {"haw"} = "Hawaiian" ; #
$out_languages {"he"} = "h�ber" ;
$out_languages {"hi"} = "hindi" ;
$out_languages {"hr"} = "horv�t" ;
$out_languages {"ht"} = "Haitian" ; #
$out_languages {"hu"} = "magyar" ;
$out_languages {"hy"} = "Armenian" ; #
$out_languages {"ia"} = "interlingua" ;
$out_languages {"iba"} = "Iban" ; #
$out_languages {"id"} = "indon�z" ;
$out_languages {"ik"} = "Inupiak" ; #
$out_languages {"io"} = "ido" ;
$out_languages {"is"} = "izlandi" ;
$out_languages {"it"} = "olasz" ;
$out_languages {"iu"} = "Inuktitut" ; #
$out_languages {"ja"} = "jap�n" ;
$out_languages {"jv"} = "j�vai" ;
$out_languages {"ka"} = "Georgian" ; #
$out_languages {"kaw"} = "Kawi" ; #
$out_languages {"kk"} = "Kazakh" ; #
$out_languages {"kl"} = "Greenlandic" ; #
$out_languages {"km"} = "Cambodian" ; #
$out_languages {"kn"} = "Kannada" ; #
$out_languages {"ko"} = "koreai" ;
$out_languages {"ks"} = "Kashmiri" ; #
$out_languages {"ku"} = "kurd" ;
$out_languages {"ky"} = "Kirghiz" ; #
$out_languages {"la"} = "latin" ;
$out_languages {"lb"} = "luxemburgi" ;
$out_languages {"li"} = "Limburguish" ; #
$out_languages {"ln"} = "Lingala" ; #
$out_languages {"lo"} = "Laotian" ; #
$out_languages {"ls"} = "Latino Sine Flexione" ; #
$out_languages {"lt"} = "litv�n" ;
$out_languages {"lv"} = "lett" ;
$out_languages {"mad"} = "Madurese" ; #
$out_languages {"mak"} = "Makasar" ; #
$out_languages {"mg"} = "Malagasy" ; #
$out_languages {"mi"} = "Maori" ; #
$out_languages {"mk"} = "Macedonian" ; #
$out_languages {"ml"} = "Malayalam" ; #
$out_languages {"mn"} = "Mongolian" ; #
$out_languages {"mo"} = "Moldavian" ; #
$out_languages {"mr"} = "Marathi" ; #
$out_languages {"ms"} = "mal�j" ;
$out_languages {"mt"} = "Maltese" ; #
$out_languages {"mus"} = "Muskogee" ; #
$out_languages {"my"} = "Burmese" ; #
$out_languages {"na"} = "Nauru" ; #
$out_languages {"nah"} = "Nahuatl" ; #
$out_languages {"nds"} = "als�sz�sz" ;
$out_languages {"ne"} = "Nepali" ; #
$out_languages {"nl"} = "holland" ;
$out_languages {"nn"} = "norv�g (nynorsk)" ;
$out_languages {"no"} = "norv�g" ;
$out_languages {"nv"} = "Navayo" ; #
$out_languages {"oc"} = "Occitan" ; #
$out_languages {"om"} = "Oromo" ; #
$out_languages {"or"} = "Oriya" ; #
$out_languages {"pa"} = "Punjabi" ; #
$out_languages {"pl"} = "lengyel" ;
$out_languages {"ps"} = "Pashto" ; #
$out_languages {"pt"} = "portug�l" ;
$out_languages {"qu"} = "Quechua" ; #
$out_languages {"rm"} = "Rhaeto-Romance" ; #
$out_languages {"rn"} = "Kirundi" ; #
$out_languages {"ro"} = "rom�n" ;
$out_languages {"roa_rup"} = "Aromanian" ; #
$out_languages {"ru"} = "orosz" ;
$out_languages {"rw"} = "Kinyarwanda" ; #
$out_languages {"sa"} = "szanszkrit" ;
$out_languages {"sc"} = "Sardinian" ; #
$out_languages {"scn"} = "Sicilian" ; #
$out_languages {"sd"} = "Sindhi" ; #
$out_languages {"se"} = "Northern Sami" ; #
$out_languages {"sg"} = "Sangro" ; #
$out_languages {"sh"} = "szerb-horv�t" ;
$out_languages {"si"} = "Singhalese" ; #
$out_languages {"simple"} = "egyszer&#369;&nbsp;angol" ;
$out_languages {"sk"} = "szlov�k" ;
$out_languages {"sl"} = "szlov�n" ;
$out_languages {"sm"} = "Samoan" ; #
$out_languages {"sn"} = "Shona" ; #
$out_languages {"so"} = "Somalian" ; #
$out_languages {"sq"} = "alb�n" ;
$out_languages {"sr"} = "szerb" ;
$out_languages {"ss"} = "Siswati" ; #
$out_languages {"st"} = "Seshoto" ; #
$out_languages {"su"} = "Sundanese" ; #
$out_languages {"sv"} = "sv�d" ;
$out_languages {"sw"} = "szuah�li" ;
$out_languages {"ta"} = "tamil" ;
$out_languages {"te"} = "Telugu" ; #
$out_languages {"tg"} = "Tajik" ; #
$out_languages {"th"} = "thai" ;
$out_languages {"ti"} = "Tigrinya" ; #
$out_languages {"tk"} = "Turkmen" ; #
$out_languages {"tl"} = "tagalog" ;
$out_languages {"tn"} = "Setswana" ; #
$out_languages {"to"} = "Tonga" ; #
$out_languages {"tr"} = "t�r�k" ;
$out_languages {"ts"} = "Tsonga" ; #
$out_languages {"tt"} = "tat�r" ;
$out_languages {"tw"} = "Twi" ; #
$out_languages {"ty"} = "Tahitian" ; #
$out_languages {"ug"} = "ujgur" ;
$out_languages {"uk"} = "ukr�n" ;
$out_languages {"ur"} = "urdu" ;
$out_languages {"uz"} = "�zb�g" ;
$out_languages {"vi"} = "vietnami" ;
$out_languages {"vo"} = "volap�k" ;
$out_languages {"wa"} = "vallon" ;
$out_languages {"wo"} = "Wolof" ; #
$out_languages {"yi"} = "jiddis" ;
$out_languages {"yo"} = "Yoruba" ; #
$out_languages {"za"} = "Zhuang" ; #
$out_languages {"zh"} = "k�nai" ;
$out_languages {"zh_min_nan"} = "minnan" ;
$out_languages {"zu"} = "zulu" ;
$out_languages {"zz"} = "az&nbsp;�sszes&nbsp;nyelv" ;
}

# end of file marker, do not remove:
1;

