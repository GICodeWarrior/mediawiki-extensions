source("loader/user_sessions.R")

library(lattice)
library(doBy)

user_sessions = load_user_sessions()
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
