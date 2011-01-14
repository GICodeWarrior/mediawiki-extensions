clear
local loc = "C:\Users\diederik.vanliere\workspace\editor_trends\statistics\charts\"
insheet using "C:\Users\diederik.vanliere\workspace\editor_trends\datasets\enwiki_histogram_edits.csv"

sum(year)
return list
local max_year = r(max)
local min_year = r(min)

forvalues year = `min_year'(1)`max_year' {
	histogram num_edits if year==`year', percent addlabel addlabopts(mlabsize(tiny) mlabangle(forty_five)) xtitle(Number of edits) title("Histogram Number of Edits" "New Wikipedians Made in `year'")
	local f =  "`loc'" + "enwiki_" + "`year'" + "_histogram_edits.png"
	graph export `f', replace
}
