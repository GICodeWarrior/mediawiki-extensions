clear
set more off
local loc "C:\Users\diederik.vanliere\workspace\editor_trends\datasets\"
//local projects "ruwiki dewiki eswiki jawiki enwiki"
local projects "enwiki"
foreach proj of local projects {
	clear
	//local p = "`loc'" + "`proj'" + "_cohort_data_forward.csv"
	local p = "`loc'" + "cohort_dataset_forward_histogram.csv"
	insheet using `p'
	ren date raw_date
	ren month experience
	//ren count count
	split raw_date, p(" ")
	drop raw_date
	ren raw_date1 raw_date
	gen date = date(raw_date, "YMD")
	//format date %tC
	
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
	
	replace count = . if count ==0
	
	forvalues year = `min_year'(1)`max_year' {
		di `year'
		//local end_date = "1,31," + "`year'"
		//di `end_date'
		//list date if date==mdy("`m'", "`d'", "`year'")
		
		if mdy(`m', 1, `year') < mdy(`m', 1, `max_year') {
			twoway (line count experience if date==mdy(1,1,`year'), sort cmissing(n)), ytitle(Number of New Wikipedians) xtitle(Number of months active) xlabel(0(4)108, labsize(vsmall)) title("The number of New Wikipedians active who entered 1/`year'") subtitle("Project `proj'")
	
			local f =  "`loc'" + "`proj'" + "_" + "`year'" + "_line_cohort_forward.png"
			graph export `f', replace
		}
	}
	
}
