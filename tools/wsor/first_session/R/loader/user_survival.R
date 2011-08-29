source("util/env.R")

load_user_survival = function(verbose=T, reload=F){
	filename = paste(DATA_DIR, "user_survival.tsv", sep="/")
	if(!exists("USER_SURVIVAL")){
		USER_SURVIVAL <<- NULL
	}
	if(is.null(USER_SURVIVAL) | reload){
		USER_SURVIVAL <<- NULL
	}
	if(is.null(USER_SURVIVAL)){
		if(verbose){cat("Loading ", filename, "...")} 
		USER_SURVIVAL <<- read.table(
			filename, 
			header=T, sep="\t", 
			quote="", comment.char="", 
			na.strings="\\N"
		)
		USER_SURVIVAL$surviving = as.character(USER_SURVIVAL$surviving) == "True"
		if(verbose){cat("DONE!\n")}
	}
	USER_SURVIVAL
}


