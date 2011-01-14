clear
set more off
local source "C:\Users\diederik.vanliere\workspace\editor_trends\datasets\"
local target "C:\Users\diederik.vanliere\workspace\editor_trends\statistics\charts\"

sort year
by year: generate n = months_12 + months_24 + months_36 + months_48 + months_60 + months_72 + months_84 + months_96 + months_108
by year: generate one_year_exp = ((months_12) / n) * 100

twoway (line one_year_exp year if project=="enwiki") (line one_year_exp year if project=="ruwiki") (line one_year_exp year if project=="eswiki") (line one_year_exp year if project=="jawiki") (line one_year_exp year if project=="frwiki") (line one_year_exp year if project=="dewiki"), ylabel(0(10)100, labsize(vsmall)) ytitle(%, size(vsmall)) xtitle() xlabel(2001(1)2010, labsize(vsmall)) title(Percentage of Wikipedia editors with 1 year experience) legend(order(1 "Enwiki" 2 "Ruwiki" 3 "Eswiki" 4 "Jawiki" 5 "Frwiki" 6 "Dewiki"))
//twoway (line one_year_exp year), ylabel(0(10)100, labsize(vsmall)) ytitle(%, size(vsmall)) xtitle() xlabel(2001(1)2010, labsize(vsmall)) title(Percentage of Wikipedia editors with 1 year experience) note("Based on the `proj' project, dataset `obs' editors.", size(vsmall))
local f =  "`target'" + "\`proj'\" + "`proj'" + "_line_rel_one_vs_multi_years.png"
graph export `f', replace

