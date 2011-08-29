source("loader/user_sessions.R")
source("loader/user_survival.R")

library(lattice)
library(doBy)

user_sessions = load_user_sessions()
user_survival = load_user_survival()
user_sessions = merge(
	user_sessions,
	user_survival
)
user_sessions$year = strftime(user_sessions$first_edit, format="%Y")
user_sessions$early_survival = user_sessions$last_edit - user_sessions$es_0_end >= 30

user_sessions$es_0_bucket = 10^floor(log(user_sessions$es_0_edits, base=10))
user_sessions$es_1_edits = naReplace(user_sessions$es_1_edits, 0)
user_sessions$es_2_edits = naReplace(user_sessions$es_2_edits, 0)






three_es_buckets = with(
	summaryBy(
		es_0_edits +
		es_1_edits + 
		es_2_edits ~ 
		year + es_0_bucket,
		data=user_sessions,
		FUN=c(mean, sd, length)
	),
	rbind(
		data.frame(
			year   = year,
			bucket = es_0_bucket,
			es     = 0,
			mean   = es_0_edits.mean,
			sd     = es_0_edits.sd,
			n      = es_0_edits.length
		),
		data.frame(
			year   = year,
			bucket = es_0_bucket,
			es     = 1,
			mean   = es_1_edits.mean,
			sd     = es_1_edits.sd,
			n      = es_1_edits.length
		),
		data.frame(
			year   = year,
			bucket = es_0_bucket,
			es     = 2,
			mean   = es_2_edits.mean,
			sd     = es_2_edits.sd,
			n      = es_2_edits.length
		)
	)
)


png("plots/edit_sessions.by_year_and_es_0_bucket.png", height=768, width=1024)
limited_three_es_buckets = three_es_buckets[
	three_es_buckets$n >= 10 &
	three_es_buckets$bucket <= 16,
]
params = list(
	"1"=list(
		col="#000000",
		pch=0,
		lty=0
	),
	"2"=list(
		col="#FF0000",
		pch=1,
		lty=1
	),
	"4"=list(
		col="#00FF00",
		pch=2,
		lty=2
	),
	"8"=list(
		col="#0000FF",
		pch=3,
		lty=3
	),
	"16"=list(
		col="#BBBB00",
		pch=4,
		lty=4
	)
)
xyplot(
	mean ~ es | as.factor(year),
	data=limited_three_es_buckets,
	groups=bucket,
	panel=function(x, y, subscripts, groups, ...){
		f = limited_three_es_buckets[subscripts,]
		for(group in groups){
			group = as.character(group)
			subf = f[f$bucket == group,]
			y  = subf$mean
			x  = subf$es
			n  = subf$n
			sd = subf$sd
			se = sd/sqrt(n)
			panel.xyplot(
				x, y, 
				col=params[[group]]$col, 
				pch=params[[group]]$pch,
				...
			)
			panel.lines(
				x, y, 
				col=params[[group]]$col, 
				lwd=2,
				...
			)
			panel.arrows(x, y+se, x, y-se, ends="both", col="#777777", angle=90, length=.01)
		}
	},
	main="Session activity by editor first session group",
	ylab="Average session edits",
	xlab="Edit session",
	auto.key=list(
		text=paste("~", names(params), "edits"), 
		col=c(
			"#000000",
			"#FF0000",
			"#00FF00",
			"#0000FF",
			"#BBBB00"
		),
		points=F
	)
)
dev.off()


user_sessions$es_0_rejection = (user_sessions$es_0_reverted + user_sessions$es_0_deleted)/user_sessions$es_0_edits
user_sessions$es_1_rejection = (user_sessions$es_1_reverted + user_sessions$es_1_deleted)/user_sessions$es_1_edits
user_sessions$es_2_rejection = (user_sessions$es_2_reverted + user_sessions$es_2_deleted)/user_sessions$es_2_edits


meanNoNA = function(x){mean(x, na.rm=T)}
sdNoNA = function(x){sd(x, na.rm=T)}
lengthNoNA = function(x){length(na.omit(x))}
three_es.rejection = with(
	summaryBy(
		es_0_rejection +
		es_1_rejection + 
		es_2_rejection ~ 
		year,
		data=user_sessions[!is.na(user_sessions$year),],
		FUN=c(meanNoNA, sdNoNA, lengthNoNA)
	),
	rbind(
		data.frame(
			year   = as.numeric(as.character(year)),
			es     = 0,
			mean   = es_0_rejection.meanNoNA,
			sd     = es_0_rejection.sdNoNA,
			n      = es_0_rejection.lengthNoNA
		),
		data.frame(
			year   = as.numeric(as.character(year)),
			es     = 1,
			mean   = es_1_rejection.meanNoNA,
			sd     = es_1_rejection.sdNoNA,
			n      = es_1_rejection.lengthNoNA
		),
		data.frame(
			year   = as.numeric(as.character(year)),
			es     = 2,
			mean   = es_2_rejection.meanNoNA,
			sd     = es_2_rejection.sdNoNA,
			n      = es_2_rejection.lengthNoNA
		)
	)
)
three_es.rejection$se = with(three_es.rejection, sd/sqrt(n))


png("plots/rejection_rate.by_year_and_edit_session.png", height=768, width=1024)
limited_three_es.rejection = three_es.rejection[
	three_es.rejection$n >= 10 & three_es.rejection$year >= 2002,
]
params = list(
	"0"=list(
		col="#000000",
		pch=1,
		lty=1
	),
	"1"=list(
		col="#FF0000",
		pch=2,
		lty=2
	),
	"2"=list(
		col="#00FF00",
		pch=3,
		lty=3
	)
)
xyplot(
	mean ~ year,
	data=limited_three_es.rejection,
	groups=es,
	panel=function(x, y, subscripts, groups, ...){
		f = limited_three_es.rejection[subscripts,]
		for(es in groups){
			group = as.character(es)
			subf = f[f$es == es,]
			y  = subf$mean
			x  = subf$year
			n  = subf$n
			sd = subf$sd
			se = sd/sqrt(n)
			panel.xyplot(
				x, y, 
				col=params[[group]]$col, 
				pch=params[[group]]$pch,
				...
			)
			panel.lines(
				x, y, 
				col=params[[group]]$col, 
				lwd=2,
				...
			)
			panel.arrows(x, y+se, x, y-se, ends="both", col="#777777", angle=90, length=.01)
		}
	},
	main="Average rejection by year and editing session",
	ylab="Mean rejection rate",
	xlab="Year of first edit",
	auto.key=list(
		text=c("1st sessions", "2nd session", "3rd session"), 
		col=c(
			"#000000",
			"#FF0000",
			"#00FF00"
		),
		points=F
	),
	ylib=c(0,1)
)
dev.off()


surviving_editors = with(
	summaryBy(
		surviving ~ 
		year,
		data=user_sessions[!is.na(user_sessions$year),],
		FUN=c(sum, length)
	),
	rbind(
		data.frame(
			year      = as.numeric(as.character(year)),
			surviving = surviving.sum,
			n         = surviving.length,
			prop      = surviving.sum/surviving.length
		)
	)
)
surviving_editors$se = with(surviving_editors, sqrt(prop*(1-prop)/n))


png("plots/survival_rate.by_year.png", height=768, width=1024)
limited_surviving_editors = surviving_editors[
	surviving_editors$year >= 2002,
]
xyplot(
	prop ~ year,
	data=limited_surviving_editors,
	panel=function(x, y, subscripts, ...){
		f  = limited_surviving_editors[subscripts,]
		y  = f$prop
		x  = f$year
		n  = f$n
		se = f$se
		panel.xyplot(
			x, y, 
			...
		)
		panel.lines(
			x, y, 
			lwd=2,
			...
		)
		panel.arrows(x, y+se, x, y-se, ends="both", col="#777777", angle=90, length=.01)
	},
	main="Proportion of surviving editors by year",
	ylab="Proportion of editors who survive",
	xlab="Year of first edit",
	ylib=c(0,1)
)
dev.off()



combined = rbind(
	with(
		three_es.rejection[three_es.rejection$es == 0,],
		data.frame(
			x     = year,
			y     = mean,
			se    = se,
			group = paste("edit session", es)
		)
	),
	with(
		surviving_editors,
		data.frame(
			x     = year,
			y     = prop,
			se    = se,
			group = "survival"
		)
	)
)
		
		
png("plots/survival_rate.rejection_rate.by_year_and_edit_session.png", height=768, width=1024)
limited_combined = combined[combined$x >= 2002,]
params = list(
	"survival"=list(
		col="#000000",
		pch=20,
		lty=2
	),
	"edit session 0"=list(
		col="#BB0000",
		pch=1,
		lty=1
	)#,
#	"edit session 1"=list(
#		col="#FF0000",
#		pch=2,
#		lty=1
#	),
#	"edit session 2"=list(
#		col="#00FF00",
#		pch=3,
#		lty=1
#	)
)
xyplot(
	y ~ x,
	data=limited_combined,
	groups=group,
	panel=function(x, y, subscripts, groups, ...){
		f = limited_combined[subscripts,]
		for(group in groups){
			subf = f[f$group == group,]
			y  = subf$y
			x  = subf$x
			se = subf$se
			panel.xyplot(
				x, y, 
				col=params[[group]]$col, 
				pch=params[[group]]$pch,
				...
			)
			panel.lines(
				x, y, 
				col=params[[group]]$col, 
				lty=params[[group]]$lty, 
				lwd=2,
				...
			)
			panel.arrows(x, y+se, x, y-se, ends="both", col="#777777", angle=90, length=.01)
		}
	},
	main="Average rejection by year and editing session over survival by year",
	ylab="Mean rejection rate/survival rate",
	xlab="Year of first edit",
	auto.key=list(
		text=c("early survival", "1st sessions"),#, "2nd session", "3rd session"), 
		col=c(
			"#000000",
			"#0000FF",
			"#FF0000",
			"#00FF00"
		),
		points=F
	),
	ylib=c(0,1)
)
dev.off()
