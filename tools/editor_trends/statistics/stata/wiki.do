local first_ten "edits_1 edits_2 edits_3 edits_4 edits_5 edits_6 edits_7 edits_8 edits_9 edits_10 final_edit"

foreach edit of local first_ten { 
	gen date2 = date(`edit', "YMDhms")
	drop `edit'
	rename date2 `edit'
	format `edit' %td
}

generate year_left = year(final_edit)
sort year_joined
by year_joined: gen community_size_t = _N


forvalues year = 1(1)10{
	gen active200`year' = 0
	replace active200`year' =1 if((edits_10+(`year'*365)<=final_edit))
	egen community_size_200`year' = total(active200`year')
}

forvalues t = 1(1)10{
	local t1 = `t'+1
	gen retention200`t' = community_size_200`t1' / community_size_200`t'
}







generate time_to_new_wp = edits_10 - edits_1
generate active_time_wp = final_edit - edits_10
label time_to_new_wp "Number of days it took to become a new wikipedian"
label active_time_wp "Number of days active once becoming a new wikipedian"



compress

graph hbar (mean) time_to_new_wp, over(year_joined, label(labsize(small))) blabel(bar, size(tiny) format(%9.0f)) ytitle(Average number of days) ytitle(, size(vsmall)) ylabel(, labsize(small)) title("The average number of days to become" "a new wikipedian increases.") note("A new wikipedian is defined as somebody who has made at least 10 edits." "The year in which the 10th edit was made determines in which year an editor became a new wikipedian." "Sample is based on 83.265 new wikipedians who contributed 18,327,260 edits.", size(vsmall))
histogram time_to_new_wp, percent ytitle(Percentage (%)) ytitle(, size(small)) xtitle(Number of days) xtitle(, size(small)) by(, title("Histograms of number of days it took" " to become a new wikipedian by year") subtitle(The pace by which contributors are becoming a new wikipedian is slowing down., size(small)) note("Sample is based on 83.265 new wikipedians who contributed 18,327,260 edits." "A new wikipedian is somebody who has contributed at least 10 edits.", size(vsmall))) by(year_joined)
graph box time_to_new_wp, over(year_joined) nooutsides
glcurve edit_count, by( year_joined) split lorenz



insheet using "C:\Users\diederik.vanliere\Desktop\dataset.csv"
// 0 = False
// 1 = True

rename v1 id
rename v2 date
format date2 %td
gen date2 = date(date, "MD20Y")
sort id
by id: generate n = _n
by id: egen first_obs = min(date2)
by id: egen last_obs = max(date2)
by id: generate time_required = last_obs - first_obs
by id: generate year= year(last_obs)

gen made_ten_edits =0
by id: egen temp = max(n)
by id: replace made_ten_edits=1 if(temp==10)
drop temp



by year, sort: egen time_to_new_wikipedian = mean( time_required)

compress
