insheet using "C:\Users\diederik.vanliere\workspace\editor_trends\datasets\long_dataset.tsv"
gen date2 = date(_time, "20YMD")
drop _time
ren date2 _time
format _time %td
tsset _time

generate ub =  monthly_edits_avg + (2*  monthly_edits_sd)
generate lb =  monthly_edits_avg - (2*  monthly_edits_sd)
