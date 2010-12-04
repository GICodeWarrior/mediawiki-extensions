label var months_3 "3 Months"
label var months_6 "6 Months"
label var months_9 "9 Months"
label var months_12 "1 Year"
label var months_24 "2 Years"
label var months_36 "3 Years"
label var months_48 "4 Years"
label var months_60 "5 Years"
label var months_72 "6 Years"
label var months_84 "7 Years"
label var months_96 "8 Years"
label var months_108 "9 Years"
generate one_year_exp =  months_3+ months_6+ months_9+ months_12

generate fewer_one_year_abs =  (one_year_exp/100) * n
generate more_one_year_abs = n -  fewer_one_year_abs
label var  fewer_one_year_abs "Editors with less than one year experience"
label var  more_one_year_abs "Editors with more than one year experience"

graph bar (asis) months_3 months_6 months_9 months_12 months_24 months_36 months_48 months_60 months_72 months_84 months_96 months_108, over(year, label(labsize(small))) stack ylabel(, labsize(vsmall) format(%9.0g)) title(Wikipedia Age Composition by Year) subtitle(Editors are getting older and influx of new editors has stagnated) note("Based on English Wikipedia, 345.000 editors." "An editor is a person who has made at least 10 edits in the main namespace.", size(tiny)) legend(nocolfirst rowgap(tiny) colgap(tiny) size(vsmall))

twoway (line one_year_exp year), ytitle(%) ytitle(, size(vsmall)) xtitle() xlabel(2001(1)2010, labsize(vsmall)) title(Percentage of Wikipedia editors with 1 year experience) note("Based on the English Wikipedia, dataset 345.000 editors.", size(vsmall))


graph bar (asis) fewer_one_year_abs more_one_year_abs, over(year, label(labsize(vsmall))) stack blabel(bar, size(tiny) position(inside) format(%9.0f)) ylabel(, labsize(vsmall) format(%9.0g)) title(Editors with one year vs multiple years of experience) legend(colfirst cols(1))
