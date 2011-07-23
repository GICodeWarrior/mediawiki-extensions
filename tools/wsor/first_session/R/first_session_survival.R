source("loader/user_sessions.R")

library(lattice)
library(doBy)

user_sessions = load_user_sessions()
user_sessions$year = strftime(user_sessions$first_edit, format="%Y")
user_sessions$early_survival = user_sessions$last_edit - user_sessions$es_0_end >= 30

year_props = with(
	summaryBy(
		early_survival ~ year,
		data=user_sessions[!is.na(user_sessions$year),],
		FUN=c(mean, length)
	),
	data.frame(
		year           = year,
		early_survival = early_survival.mean,
		n              = early_survival.length
	)
)

png("plots/early_survival.by_year.png", height=768, width=1024)
xyplot(
	early_survival ~ year,
	data=year_props,
	panel=function(x, y, subscripts, ...){
		f = year_props[subscripts,]
		panel.xyplot(x, y, ...)
		panel.lines(x, y, ...)
		x = f$year
		p = f$early_survival
		n = f$n
		se = sqrt(p*(1-p)/n)
		panel.arrows(x, p+se, x, p-se, ends="both", angle=90, length=.1)
	},
	ylim=c(0, 1),
	main="Early survival proportion for new editors",
	ylab="Proportion of surviving editors",
	xlab="Year",
	sub="early survival = editing more than 1 month after first session"
)
dev.off()

year_props.no_vandal = with(
	summaryBy(
		early_survival ~ year,
		data=user_sessions[
			!is.na(user_sessions$year) &
			user_sessions$es_0_edits >= 2 &
			user_sessions$es_0_vandalism / user_sessions$es_0_edits <= .25,
		],
		FUN=c(mean, length)
	),
	data.frame(
		year           = year,
		early_survival = early_survival.mean,
		n              = early_survival.length
	)
)

png("plots/early_survival.by_year.no_vandals.png", height=768, width=1024)
xyplot(
	early_survival ~ year,
	data=year_props.no_vandal,
	panel=function(x, y, subscripts, ...){
		f = year_props.no_vandal[subscripts,]
		panel.xyplot(x, y, ...)
		panel.lines(x, y, ...)
		x = f$year
		p = f$early_survival
		n = f$n
		se = sqrt(p*(1-p)/n)
		panel.arrows(x, p+se, x, p-se, ends="both", angle=90, length=.1)
	},
	ylim=c(0, 1),
	main="Early survival proportion for new editors (no vandals)",
	ylab="Proportion of surviving editors",
	xlab="Year",
	sub="early survival = editing more than 1 month after first session"
)
dev.off()

user_sessions$es_0_bucket = 2^round(log(user_sessions$es_0_edits, base=2))

year_edits_props = with(
	summaryBy(
		early_survival ~ year + es_0_bucket,
		data=user_sessions[
			!is.na(user_sessions$year) &
			user_sessions$es_0_bucket <= 256,
		],
		FUN=c(mean, length)
	),
	data.frame(
		year           = year,
		es_0_bucket    = es_0_bucket,
		early_survival = early_survival.mean,
		n              = early_survival.length
	)
)

png("plots/early_survival.by_year_and_first_session.png", height=768, width=1024)
xyplot(
	early_survival ~ es_0_bucket | as.factor(year),
	data=year_edits_props,
	panel=function(x, y, subscripts, ...){
		f = year_edits_props[subscripts,]		
		panel.xyplot(x, y, ...)
		x = log(f$es_0_bucket, base=2)
		p = f$early_survival
		n = f$n
		se = sqrt(p*(1-p)/n)
		panel.arrows(x, p+se, x, p-se, ends="both", angle=90, length=.1)
		panel.lines(-5:10, .2, col="#BBBBBB")
		panel.lines(-5:10, .4, col="#BBBBBB")
		panel.lines(-5:10, .6, col="#BBBBBB")
		panel.lines(-5:10, .8, col="#BBBBBB")
	},
	ylim=c(0, 1),
	main="Early survival proportion for new editors by first session edits",
	ylab="Proportion of surviving editors",
	xlab="First session edits",
	sub="early survival = editing more than 1 month after first session",
	scales=list(x=list(log=2, at=2^(0:8))),
	xlim=c(.5, 300)
)
dev.off()

png("plots/early_survival.by_year.es_lines.png", height=768, width=1024)
limited_year_edits_props = year_edits_props[
	year_edits_props$n >= 10 & 
	year_edits_props$es_0_bucket <= 16,
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
	),
	"32"=list(
		col="#00BBBB",
		pch=5,
		lty=5
	),
	"64"=list(
		col="#BB00BB",
		pch=6,
		lty=6
	)
)
xyplot(
	early_survival ~ year,
	data=limited_year_edits_props,
	groups=es_0_bucket,
	panel=function(x, y, subscripts, groups, ...){
		f = limited_year_edits_props[subscripts,]
		for(group in groups){
			group = as.character(group)
			subf = f[f$es_0_bucket == group,]
			p = subf$early_survival
			x = subf$year
			n = subf$n
			panel.xyplot(
				x, p, 
				col=params[[group]]$col, 
				pch=params[[group]]$pch,
				...
			)
			panel.lines(
				x, p, 
				col=params[[group]]$col, 
				lwd=2,
				...
			)
			se = sqrt(p*(1-p)/n)
			panel.arrows(x, p+se, x, p-se, ends="both", col="#777777", angle=90, length=.05)
		}
	},
	ylim=c(0, 1),
	main="Early survival proportion for new editors grouped by edits in their first session",
	ylab="Proportion of surviving editors",
	xlab="Years",
	sub="early survival = editing more than 1 month after first session",
	auto.key=list(
		text=paste("~", names(params), "edits"), 
		col=c(
			"#000000",
			"#FF0000",
			"#00FF00",
			"#0000FF",
			"#BBBB00",
			"#00BBBB",
			"#BB00BB"
		),
		points=F
	)
)
dev.off()


user_sessions$es_0_no_arch = 2^round(log(user_sessions$es_0_edits - user_sessions$es_0_deleted, base=2))

no_arch_edits_props = with(
	summaryBy(
		early_survival ~ year + es_0_no_arch,
		data=user_sessions[
			!is.na(user_sessions$year) &
			user_sessions$es_0_no_arch <= 256,
		],
		FUN=c(mean, length)
	),
	data.frame(
		year           = year,
		es_0_no_arch   = es_0_no_arch,
		early_survival = early_survival.mean,
		n              = early_survival.length
	)
)


png("plots/early_survival.by_year.es_lines.no_archive.png", height=768, width=1024)
limited_year_edits_props = no_arch_edits_props[
	no_arch_edits_props$n >= 10 & 
	no_arch_edits_props$es_0_no_arch <= 16,
]
params = list(
	"0"=list(
		col="#AAAAAA",
		pch=0,
		lty=0
	),
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
	early_survival ~ year,
	data=limited_year_edits_props,
	groups=es_0_no_arch,
	panel=function(x, y, subscripts, groups, ...){
		f = limited_year_edits_props[subscripts,]
		for(group in groups){
			group = as.character(group)
			subf = f[f$es_0_no_arch == group,]
			p = subf$early_survival
			x = subf$year
			n = subf$n
			panel.xyplot(
				x, p, 
				col=params[[group]]$col, 
				pch=params[[group]]$pch,
				...
			)
			panel.lines(
				x, p, 
				col=params[[group]]$col, 
				lwd=2,
				...
			)
			se = sqrt(p*(1-p)/n)
			panel.arrows(x, p+se, x, p-se, ends="both", col="#777777", angle=90, length=.05)
		}
	},
	ylim=c(0, 1),
	main="Early survival proportion for new editors grouped by edits (not deleted) in their first session",
	ylab="Proportion of surviving editors",
	xlab="Years",
	sub="early survival = editing more than 1 month after first session",
	auto.key=list(
		text=paste("~", names(params), "edits"), 
		col=c(
			"#AAAAAA",
			"#000000",
			"#FF0000",
			"#00FF00",
			"#0000FF",
			"#BBBB00",
			"#00BBBB",
			"#BB00BB"
		),
		points=F
	)
)
dev.off()


user_sessions$years_since_2001 = as.numeric((user_sessions$first_edit - as.POSIXct("2001-01-01"))/365)
user_sessions$initial_rejection = with(
	user_sessions,
	(
		naReplace(es_0_deleted, 0) + naReplace(es_0_reverted, 0) + 
		naReplace(es_1_deleted, 0) + naReplace(es_1_reverted, 0) + 
		naReplace(es_2_deleted, 0) + naReplace(es_2_reverted, 0)
	)/(
		naReplace(es_0_edits, 0) + 
		naReplace(es_1_edits, 0) + 
		naReplace(es_2_edits, 0)
	)
)
sc = scale
summary(glm(
	early_survival ~
	sc(es_0_edits) *
	sc(years_since_2001) *
	sc(initial_rejection), 
	data=user_sessions[
		user_sessions$es_0_edits > 3,
	],
	family=binomial(link="logit")
))


user_sessions$initial_rejection_group = round(user_sessions$initial_rejection/2, 1)*2

survival_by_year_and_rejection = with(
	summaryBy(
		early_survival ~ year + initial_rejection_group,
		data=user_sessions[
			user_sessions$es_0_edits > 3 & 
			user_sessions$es_0_vandalism == 0,
		],
		FUN=c(mean, length)
	),
	data.frame(
		year            = year,
		rejection_group = initial_rejection_group,
		early_survival  = early_survival.mean,
		n               = early_survival.length
	)
)

png("plots/early_survival.by_year_and_rejection.no_vandals.png", height=768, width=1024)
limited_frame = survival_by_year_and_rejection[
	survival_by_year_and_rejection$n >= 10,
]
params = list(
	"0"=list(
		col="#AAAAAA",
		pch=0,
		lty=0
	),
	"0.2"=list(
		col="#FF0000",
		pch=1,
		lty=1
	),
	"0.4"=list(
		col="#0000FF",
		pch=3,
		lty=3
	),
	"0.6"=list(
		col="#00BBBB",
		pch=5,
		lty=4
	),
	"0.8"=list(
		col="#BB0000",
		pch=7,
		lty=4
	),
	"1"=list(
		col="#00BB00",
		pch=9,
		lty=4
	)
)
xyplot(
	early_survival ~ year,
	data=limited_frame,
	groups=rejection_group,
	panel=function(x, y, subscripts, groups, ...){
		f = limited_frame[subscripts,]
		for(group in groups){
			group = as.character(group)
			subf = f[f$rejection_group == group,]
			p = subf$early_survival
			x = subf$year
			n = subf$n
			panel.xyplot(
				x, p, 
				col=params[[group]]$col, 
				pch=params[[group]]$pch,
				...
			)
			panel.lines(
				x, p, 
				col=params[[group]]$col, 
				lwd=2,
				...
			)
			se = sqrt(p*(1-p)/n)
			panel.arrows(x, p+se, x, p-se, ends="both", col="#777777", angle=90, length=.05)
		}
	},
	ylim=c(0, 1),
	main="Early survival proportion for new editors grouped by early rejection proportion",
	ylab="Proportion of surviving editors",
	xlab="Years",
	sub="early survival = editing more than 1 month after first session\nrejection = proportion of revisions reverted or deleted in first edit sessions.",
	auto.key=list(
		text=paste("~", names(params), " rejection"), 
		col=c(
			"#AAAAAA",
			"#FF0000",
			"#0000FF",
			"#00BBBB",
			"#BB0000",
			"#00BB00"
		),
		points=F
	)
)
dev.off()
