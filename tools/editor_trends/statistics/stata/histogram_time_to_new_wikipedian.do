clear
local loc = "C:\Users\diederik.vanliere\workspace\editor_trends\statistics\charts\"
insheet using "C:\Users\diederik.vanliere\workspace\editor_trends\datasets\enwiki_time_to_new_wikipedian.csv"

//egen min_year = min(year)
//egen max_year = max(year)

sum(year)
return list
local max_year = r(max)
local min_year = r(min)

forvalues year = `min_year'(1)`max_year' {
	histogram time_to_new_wikipedian if year==`year', discrete percent xtitle(Number of days)  note("An editor is a person who has made at least 10 edits in the main namespace.", size(vsmall)) title("Histogram Number of Days it Takes" "to Become a New Wikipedian in `year'")
	local f =  "`loc'" + "enwiki_" + "`year'" + "_histogram_time_to_new_wikipedian.png"
	graph export `f', replace
}

