source("util/env.R")



load_reverting_months = function(verbose=T, reload=F){
	filename = paste(DATA_DIR, "en.reverting_years.20110115.tsv", sep="/")
	if(!exists("REVERTING_MONTHS")){
		REVERTING_MONTHS <<- NULL
	}
	if(is.null(REVERTING_MONTHS) | reload){
		REVERTING_MONTHS <<- NULL
	}
	if(is.null(REVERTING_MONTHS)){
		if(verbose){cat("Loading reverter months from", filename, "...")} 
		REVERTING_MONTHS <<- read.table(
			filename, 
			header=T, sep="\t", 
			quote="'\"", comment.char="", 
			na.strings="\\N",
		)
		if(verbose){cat("DONE!\n")}
	}
	REVERTING_MONTHS
}


