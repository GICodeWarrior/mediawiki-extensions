source("util/env.R")

load_hugglings = function(verbose=T, reload=F){
	filename = paste(DATA_DIR, "hugglings.cat.tsv", sep="/")
	if(!exists("HUGGLINGS")){
		HUGGLINGS <<- NULL
	}
	if(is.null(HUGGLINGS) | reload){
		HUGGLINGS <<- NULL
	}
	if(is.null(HUGGLINGS)){
		if(verbose){cat("Loading ", filename, "...")} 
		HUGGLINGS <<- read.table(
			filename, 
			header=T, sep="\t", 
			quote="", comment.char="", 
			na.strings="\\N"
		)
		if(verbose){cat("DONE!\n")}
	}
	HUGGLINGS
}

