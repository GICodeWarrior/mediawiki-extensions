source("util/env.R")



load_editor_edit_count = function(verbose=T, reload=F){
	filename = paste(DATA_DIR, "en.editor_edit_count.20.fixed.tsv", sep="/")
	if(!exists("EDITOR_EDIT_COUNT")){
		EDITOR_EDIT_COUNT <<- NULL
	}
	if(is.null(EDITOR_EDIT_COUNT) | reload){
		EDITOR_EDIT_COUNT <<- NULL
	}
	if(is.null(EDITOR_EDIT_COUNT)){
		if(verbose){cat("Loading ", filename, "...")} 
		EDITOR_EDIT_COUNT <<- read.table(
			filename, 
			header=T, sep="\t", 
			quote="", comment.char="", 
			na.strings="\\N"
		)
		if(verbose){cat("DONE!\n")}
	}
	EDITOR_EDIT_COUNT
}


