source("util/env.R")

load_user_sessions = function(verbose=T, reload=F){
	filename = paste(DATA_DIR, "user_sessions.5.tsv", sep="/")
	if(!exists("USER_SESSIONS")){
		USER_SESSIONS <<- NULL
	}
	if(is.null(USER_SESSIONS) | reload){
		USER_SESSIONS <<- NULL
	}
	if(is.null(USER_SESSIONS)){
		if(verbose){cat("Loading ", filename, "...")} 
		USER_SESSIONS <<- read.table(
			filename, 
			header=T, sep="\t", 
			quote="", comment.char="", 
			na.strings="\\N"
		)
		USER_SESSIONS$first_edit = strptime(
			as.character(USER_SESSIONS$first_edit),
			"%Y%m%d%H%M%S"
		)
		USER_SESSIONS$last_edit = strptime(
			as.character(USER_SESSIONS$last_edit),
			"%Y%m%d%H%M%S"
		)
		USER_SESSIONS$es_0_start = as.POSIXct(USER_SESSIONS$es_0_start, origin="1970-01-01")
		USER_SESSIONS$es_1_start = as.POSIXct(USER_SESSIONS$es_1_start, origin="1970-01-01")
		USER_SESSIONS$es_2_start = as.POSIXct(USER_SESSIONS$es_2_start, origin="1970-01-01")
		USER_SESSIONS$es_3_start = as.POSIXct(USER_SESSIONS$es_3_start, origin="1970-01-01")
		USER_SESSIONS$es_4_start = as.POSIXct(USER_SESSIONS$es_4_start, origin="1970-01-01")
		USER_SESSIONS$es_0_end   = as.POSIXct(USER_SESSIONS$es_0_end, origin="1970-01-01")
		USER_SESSIONS$es_1_end   = as.POSIXct(USER_SESSIONS$es_1_end, origin="1970-01-01")
		USER_SESSIONS$es_2_end   = as.POSIXct(USER_SESSIONS$es_2_end, origin="1970-01-01")
		USER_SESSIONS$es_3_end   = as.POSIXct(USER_SESSIONS$es_3_end, origin="1970-01-01")
		USER_SESSIONS$es_4_end   = as.POSIXct(USER_SESSIONS$es_4_end, origin="1970-01-01")
		if(verbose){cat("DONE!\n")}
	}
	USER_SESSIONS
}


