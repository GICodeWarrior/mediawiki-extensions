clear
set more off
local loc "C:\Users\diederik.vanliere\workspace\editor_trends\datasets\"
//local projects "ruwiki dewiki eswiki jawiki enwiki"
local projects "enwiki"
foreach proj of local projects {
	clear
	
	//local p = "`loc'" + "`proj'" + "_forward_cohort.csv"
	local p = "`loc'" + "cohort_dataset_forward_histogram.csv"
	insheet using `p'
	label var experience "Number of months active"
	gen date = date(_time, "YMD")
	format date %td
	
	egen min_year= min(year(date))
	egen max_year= max(year(date))
	gen month = month(date)
	gen day = day(date)
	
	sum(max_year)
	return list
	local max_year = r(max)
	
	sum(min_year)
	return list
	local min_year = r(min)
	
	gen first_year = 0
	replace first_year =1 if year(date)==`min_year'
	
	sum(month) if first_year ==1
	return list
	local m = r(min)
	
	sum(day) if(first_year ==1 & month==`m')
	return list
	local d = r(min)
	
	di `min_year'
	di `m'
	di `d'
	
	forvalues year = `min_year'(1)`max_year' {
		di `year'
		//local end_date = "1,31," + "`year'"
		//di `end_date'
		//list date if date==mdy("`m'", "`d'", "`year'")
		if mdy(`m', `d', `year') < mdy(`m',`d', `max_year') {
			histogram experience if date==mdy(`m', `d', `year'), discrete percent  ylabel(0(5)100, labsize(vsmall)) title("How long do editors stay who entered `m'/`year'?") subtitle("Project `proj'") note("Based on the `proj' project." "An editor is a person who has made at least 10 edits in the main namespace.", size(vsmall))
			local f =  "`loc'" + "`proj'" + "_" + "`year'" + "_histogram_cohort_forward.png"
			graph export `f', replace
		}
	}
}


set more on
