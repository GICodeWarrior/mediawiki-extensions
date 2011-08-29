source("util/env.R")

load_huggling_codings = function(verbose=T, reload=F){
	filename = paste(DATA_DIR, "huggling_codings.tsv", sep="/")
	if(!exists("HUGGLING_CODINGS")){
		HUGGLING_CODINGS <<- NULL
	}
	if(is.null(HUGGLING_CODINGS) | reload){
		HUGGLING_CODINGS <<- NULL
	}
	if(is.null(HUGGLING_CODINGS)){
		if(verbose){cat("Loading ", filename, "...")} 
		HUGGLING_CODINGS <<- read.table(
			filename, 
			header=T, sep="\t", 
			quote="", comment.char="", 
			na.strings="NULL"
		)
		HUGGLING_CODINGS$personal    = as.factor(HUGGLING_CODINGS$personal) == "True"
		HUGGLING_CODINGS$teaching    = as.factor(HUGGLING_CODINGS$teaching) == "True"
		HUGGLING_CODINGS$image       = as.factor(HUGGLING_CODINGS$image) == "True"
		
		if(verbose){cat("DONE!\n")}
	}
	HUGGLING_CODINGS
}

