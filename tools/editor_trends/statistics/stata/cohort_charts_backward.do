clear
set more off
local source "C:\Users\diederik.vanliere\workspace\editor_trends\datasets\"
local target "C:\Users\diederik.vanliere\workspace\editor_trends\statistics\charts\"
local projects "enwiki"
//local projects "enwiki ruwiki dewiki eswiki jawiki"
foreach proj of local projects {
	clear
	//di "`loc'"
	//di "`proj'"
	//local p = "`source'" + "`proj'" + "_cohort_dataset_backward_bar.csv"
	ren year experience
	local p = "`source'" + "cohort_dataset_backward_bar.csv"
	//di "`p'"
	insheet using `p'
	split date, p("-")
	destring date1, replace
	ren date1 year
	sort year
		
	by year: generate n = months_12 + months_24 + months_36 + months_48 + months_60 + months_72 + months_84 + months_96 + months_108
	//by year: generate n = months_3 + months_6 + months_9 + months_12 + months_24 + months_36 + months_48 + months_60 + months_72 + months_84 + months_96 + months_108
	by year: egen obs = sum(n)
	by year: generate one_year_exp = ((months_12) / n) * 100
	//by year: generate one_year_exp = ((months_3 + months_6 + months_9 + months_12) / n) * 100
	
	sum(obs)
	return list
	local obs = r(max)

	di "`n'"
	
	
	//gen months_3_rel = (months_3 / n) * 100
	//gen months_6_rel = (months_6 / n) * 100
	//gen months_9_rel = (months_9 / n) * 100
	gen months_12_rel = (months_12 / n) * 100
	gen months_24_rel = (months_24 / n) * 100
	gen months_36_rel = (months_36 / n) * 100
	gen months_48_rel = (months_48 / n) * 100
	gen months_60_rel = (months_60 / n) * 100
	gen months_72_rel = (months_72 / n) * 100
	gen months_84_rel = (months_84 / n) * 100
	gen months_96_rel = (months_96 / n) * 100
	gen months_108_rel = (months_108 / n) * 100
	//local values "3 6 9 12 24 36 48 60 72 84 96 108"
	//foreach value of local values {
	//	local new_var = "months_" + "`value'" + "_rel" 
	//	local var = "months_" + "`value'"
	//	generate `new_var' = `var' / 
	//}
	
	//label var months_3 "3 months"
	//label var months_6 "6 months"
	//label var months_9 "9 months"
	label var months_12 "1 year"
	label var months_24 "2 years"
	label var months_36 "3 years"
	label var months_48 "4 years"
	label var months_60 "5 years"
	label var months_72 "6 years"
	label var months_84 "7 years"
	label var months_96 "8 years"
	label var months_108 "9 years"
	
	//label var months_3_rel "3 months"
	//label var months_6_rel "6 months"
	//label var months_9_rel "9 months"
	label var months_12_rel "1 year"
	label var months_24_rel "2 years"
	label var months_36_rel "3 years"
	label var months_48_rel "4 years"
	label var months_60_rel "5 years"
	label var months_72_rel "6 years"
	label var months_84_rel "7 years"
	label var months_96_rel "8 years"
	label var months_108_rel "9 years"
	

	local obs = "."
	drop if(year==2011)
	drop if(year==2012)
	
	generate fewer_one_year_abs = months_12
	//generate fewer_one_year_abs = months_3 + months_6 + months_9 + months_12
	
	generate more_one_year_abs = months_24 + months_36 + months_48 + months_60 + months_72 + months_84 + months_96 + months_108
	label var  fewer_one_year_abs "Editors with less than one year experience"
	label var  more_one_year_abs "Editors with more than one year experience"

	twoway (line one_year_exp year), ylabel(0(10)100, labsize(vsmall)) ytitle(%, size(vsmall)) xtitle() xlabel(2001(1)2010, labsize(vsmall)) title(Percentage of Wikipedia editors with 1 year experience) note("Based on the `proj' project, dataset `obs' editors.", size(vsmall))
	local f =  "`target'" + "\`proj'\" + "`proj'" + "_line_rel_one_vs_multi_years.png"
	graph export `f', replace
	//subtitle(Editors are getting older and influx of new editors has stagnated) 
	

	graph bar (asis) fewer_one_year_abs more_one_year_abs, over(year, label(labsize(vsmall))) stack blabel(bar, size(tiny) position(inside) format(%9.0f)) ylabel(, labsize(vsmall) format(%9.0g)) title(Editors with one year vs multiple years of experience) subtitle(Project `proj') legend(colfirst cols(1)) note("Based on the `proj' project, dataset `obs' editors." "An editor is a person who has made at least 10 edits in the main namespace.", size(vsmall))
	local f =  "`target'" + "\`proj'\" + "`proj'" + "_bar_abs_one_vs_multi_years.png"
	graph export `f', replace

	graph bar (asis) months_12_rel months_24_rel months_36_rel months_48_rel months_60_rel months_72_rel months_84_rel months_96_rel months_108_rel, over(year, label(labsize(small))) stack ylabel(, labsize(vsmall) format(%9.0g)) title(Wikipedia Age Composition by Year) note("Based on the `proj' project, `obs' editors." "An editor is a person who has made at least 10 edits in the main namespace.", size(vsmall)) legend(nocolfirst rowgap(tiny) colgap(tiny) size(vsmall))
	//graph bar (asis) months_3_rel months_6_rel months_9_rel months_12_rel months_24_rel months_36_rel months_48_rel months_60_rel months_72_rel months_84_rel months_96_rel months_108_rel, over(year, label(labsize(small))) stack ylabel(, labsize(vsmall) format(%9.0g)) title(Wikipedia Age Composition by Year) note("Based on the `proj' project, `obs' editors." "An editor is a person who has made at least 10 edits in the main namespace.", size(vsmall)) legend(nocolfirst rowgap(tiny) colgap(tiny) size(vsmall))
	local f =  "`target'" + "\`proj'\" + "`proj'" + "_bar_cohort.png"
	graph export `f', replace


	
}
set more on

//label var months_3 "3 Months"
//label var months_6 "6 Months"
//label var months_9 "9 Months"
//label var months_12 "1 Year"
//label var months_24 "2 Years"
//label var months_36 "3 Years"
//label var months_48 "4 Years"
//label var months_60 "5 Years"
//label var months_72 "6 Years"
//label var months_84 "7 Years"
//label var months_96 "8 Years"
//label var months_108 "9 Years"
//generate one_year_exp =  months_3+ months_6+ months_9+ months_12

//generate fewer_one_year_abs =  (one_year_exp/100) * n
//generate more_one_year_abs = n -  fewer_one_year_abs
//label var  fewer_one_year_abs "Editors with less than one year experience"
//label var  more_one_year_abs "Editors with more than one year experience"

//graph bar (asis) months_3 months_6 months_9 months_12 months_24 months_36 months_48 months_60 months_72 months_84 months_96 months_108, over(year, label(labsize(small))) stack ylabel(, labsize(vsmall) format(%9.0g)) title(Wikipedia Age Composition by Year) subtitle(Editors are getting older and influx of new editors has stagnated) note("Based on English Wikipedia, 345.000 editors." "An editor is a person who has made at least 10 edits in the main namespace.", size(tiny)) legend(nocolfirst rowgap(tiny) colgap(tiny) size(vsmall))

//twoway (line one_year_exp year), ytitle(%) ytitle(, size(vsmall)) xtitle() xlabel(2001(1)2010, labsize(vsmall)) title(Percentage of Wikipedia editors with 1 year experience) note("Based on the English Wikipedia, dataset 345.000 editors.", size(vsmall))


//graph bar (asis) fewer_one_year_abs more_one_year_abs, over(year, label(labsize(vsmall))) stack blabel(bar, size(tiny) position(inside) format(%9.0f)) ylabel(, labsize(vsmall) format(%9.0g)) title(Editors with one year vs multiple years of experience) legend(colfirst cols(1))

