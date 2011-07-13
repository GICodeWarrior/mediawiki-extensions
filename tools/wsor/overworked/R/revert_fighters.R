source("loader/load_reverter_months.R")

reverter_months = load_reverter_months()
reverter_months = reverter_months[!grepl("bot( |$|[^a-z])", reverter_months$username, ignore.case=T),]
reverter_months$vfighter   = reverter_months$vandal_reverts >= 5
reverter_months$svfighter  = reverter_months$vandal_reverts >= 50
reverter_months$sdvfighter = reverter_months$vandal_reverts >= 500
reverter_months$reverter   = reverter_months$reverts >= 5
reverter_months$active     = reverter_months$revisions >= 5

library(doBy)
library(lattice)

vfighter_counts = with(
	summaryBy(
		user_id ~ year + month + vfighter,
		data=reverter_months[reverter_months$active,],
		FUN=length
	),
	data.frame(
		year     = year,
		month    = month,
		vfighter = vfighter,
		users    = user_id.length
	)
)
svfighter_counts = with(
	summaryBy(
		user_id ~ year + month + svfighter,
		data=reverter_months[reverter_months$active,],
		FUN=length
	),
	data.frame(
		year      = year,
		month     = month,
		svfighter = svfighter,
		users     = user_id.length
	)
)
sdvfighter_counts = with(
	summaryBy(
		user_id ~ year + month + svfighter,
		data=reverter_months[reverter_months$active,],
		FUN=length
	),
	data.frame(
		year      = year,
		month     = month,
		svfighter = svfighter,
		users     = user_id.length
	)
)

activity_counts = merge(
	merge(
		vfighter_counts[vfighter_counts$vfighter,],
		vfighter_counts[!vfighter_counts$vfighter,],
		by=c("year", "month"),
		suffixes=c(".vf", ".nonvf")
	),
	merge(
		svfighter_counts[svfighter_counts$svfighter,],
		svfighter_counts[!svfighter_counts$svfighter,],
		by=c("year", "month"),
		suffixes=c(".svf", ".nonsvf")
		
	),
	by=c("year", "month")
)
activity_counts$users.active = activity_counts$users.vf + activity_counts$users.nonvf
activity_counts$log.users.active = log(activity_counts$users.active, base=10)
activity_counts$log.users.vf     = log(activity_counts$users.vf, base=10)
activity_counts$log.users.svf    = log(activity_counts$users.svf, base=10)


png("plots/vandal_fighters.by_month.png", width=1024, height=768)
plot(
	as.factor(paste(activity_counts$year, activity_counts$month, sep="/")), 
	(activity_counts$users.active*0)-10000, 
	col="#FFFFFF",
	ylim=c(0, max(activity_counts$users.active)+.5),
	main="Vandal fighters and active editors over time",
	xlab="Time (in months)",
	ylab="Number of users (log10 scaled)"
)
lines(
	as.factor(paste(activity_counts$year, activity_counts$month, sep="/")), 
	activity_counts$users.active, 
	type="o", 
	pch=20, 
	lty=1, 
	col="blue"
)
lines(
	as.factor(paste(activity_counts$year, activity_counts$month, sep="/")), 
	activity_counts$users.vf, 
	type="o", 
	pch=22, 
	lty=2, 
	col="red"
)
legend(
	max(as.numeric(as.factor(paste(activity_counts$year, activity_counts$month, sep="/"))))-10, 
	max(activity_counts$users.active)+.5, 
	c("active editors","vandal fighters"), 
	cex=1.2,
	col=c("blue","red"),
	pch=20:22,
	lty=1:2
)
dev.off()

png("plots/vandal_fighters.by_month.logged.png", width=1024, height=768)
plot(
	as.factor(paste(activity_counts$year, activity_counts$month, sep="/")), 
	(activity_counts$log.users.active*0)-10000, 
	col="#FFFFFF",
	ylim=c(0, max(activity_counts$log.users.active)+.5),
	main="Vandal fighters and active editors over time",
	xlab="Time (in months)",
	ylab="Number of users (log10 scaled)"
)
lines(
	as.factor(paste(activity_counts$year, activity_counts$month, sep="/")), 
	activity_counts$log.users.active, 
	type="o", 
	pch=20, 
	lty=1, 
	col="blue"
)
lines(
	as.factor(paste(activity_counts$year, activity_counts$month, sep="/")), 
	activity_counts$log.users.vf, 
	type="o", 
	pch=22, 
	lty=2, 
	col="red"
)
legend(
	max(as.numeric(as.factor(paste(activity_counts$year, activity_counts$month, sep="/"))))-10, 
	max(activity_counts$log.users.active)+.5, 
	c("active editors","vandal fighters"), 
	cex=1.2,
	col=c("blue","red"),
	pch=20:22,
	lty=1:2
)
dev.off()

activity_counts$vandal_fighter_prop = activity_counts$users.vf/activity_counts$users.active
activity_counts$year.month = as.factor(paste(activity_counts$year, activity_counts$month, sep="/"))
model = lm(
	vandal_fighter_prop ~ as.numeric(year.month),
	data=activity_counts
)
modelSummary = summary(model)
monthLine = function(x){
	model$coefficients[['(Intercept)']] + model$coefficients[['as.numeric(year.month)']]*x
}
png("plots/vandal_fighter_prop.by_month.png", width=1024, height=768)
x = activity_counts$year.month
y = activity_counts$vandal_fighter_prop
plot(
	x, 
	(y*0)-10000, 
	col="#FFFFFF",
	ylim=c(0, max(y)+.01),
	main="Proportion of active editors who are vandal fighters (no bots)",
	xlab="Month",
	ylab="Prop of of vandal fighters"
)
lines(
	x,
	y,
	type="o",
	pch=22,
	lty=2,
	col="red"
)
lines(
	x[order(x)], 
	monthLine(as.numeric(x[order(x)])),
	lty=1,
	col="black"
)
legend(
	mean(as.numeric(x)), 
	max(y)+.01,
	paste(
		"R^2=", round(modelSummary$r.squared, 3),
		" coef=", round(model$coefficients[['as.numeric(year.month)']], 5),
		" p=", round(modelSummary$coefficients[2,4], 6)
	), 
	cex=1.2,
	col=c("black"),
	lty=1
)
dev.off()


activity_counts$super_vandal_fighter_prop = activity_counts$users.svf/activity_counts$users.active
model = lm(
	super_vandal_fighter_prop ~ as.numeric(year.month),
	data=activity_counts
)
modelSummary = summary(model)
monthLine = function(x){
	model$coefficients[['(Intercept)']] + model$coefficients[['as.numeric(year.month)']]*x
}
png("plots/super_vandal_fighter_prop.by_month.png", width=1024, height=768)
x = activity_counts$year.month
y = activity_counts$super_vandal_fighter_prop
plot(
	x, 
	(y*0)-10000, 
	col="#FFFFFF",
	ylim=c(0, max(y)+.005),
	main="Proportion of active editors who are super vandal fighters (no bots)",
	sub="super vandal fighter >= 50 vandal reverts per month",
	xlab="Month",
	ylab="Prop of of vandal fighters"
)
lines(
	x,
	y,
	type="o",
	pch=22,
	lty=2,
	col="red"
)
lines(
	x[order(x)], 
	monthLine(as.numeric(x[order(x)])),
	lty=1,
	col="black"
)
legend(
	mean(as.numeric(x)), 
	max(y)+.005,
	paste(
		"R^2=", round(modelSummary$r.squared, 3),
		" coef=", round(model$coefficients[['as.numeric(year.month)']], 5),
		" p=", round(modelSummary$coefficients[2,4], 6)
	), 
	cex=1.2,
	col=c("black"),
	lty=1
)
dev.off()
