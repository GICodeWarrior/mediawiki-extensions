source("util/env.R")



load_editor_first_and_last = function(verbose=T, reload=F){
	filename = paste(DATA_DIR, "en.editor_first_and_last.20.fixed.tsv", sep="/")
	if(!exists("EDITOR_FIRST_AND_LAST")){
		EDITOR_FIRST_AND_LAST <<- NULL
	}
	if(is.null(EDITOR_FIRST_AND_LAST) | reload){
		EDITOR_FIRST_AND_LAST <<- NULL
	}
	if(is.null(EDITOR_FIRST_AND_LAST)){
		if(verbose){cat("Loading ", filename, "...")} 
		EDITOR_FIRST_AND_LAST <<- read.table(
			filename, 
			header=T, sep="\t", 
			quote="", comment.char="", 
			na.strings="\\N"
		)
		if(verbose){cat("DONE!\n")}
	}
	EDITOR_FIRST_AND_LAST
}


