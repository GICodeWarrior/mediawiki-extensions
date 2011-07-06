source("loader/load_reverter_months.R")

reverter_months = load_reverter_months()
reverter_months = reverter_months[!grepl("bot( |$|[^a-z])", reverter_months$username, ignore.case=T),]
reverter_months$vf5   = reverter_months$vandal_reverts >= 5
reverter_months$vf50  = reverter_months$vandal_reverts >= 50
reverter_months$vf500 = reverter_months$vandal_reverts >= 500
reverter_months$r5    = reverter_months$reverts >= 5
reverter_months$r50   = reverter_months$reverts >= 50
reverter_months$r500  = reverter_months$reverts >= 500

reverter_months$active     = reverter_months$revisions >= 5
reverter_months$year.month = with(
	reverter_months,
	as.factor(paste(year, month, sep="/"))
)

library(doBy)
library(lattice)

activity_counts = with(
	summaryBy(
		active + vf5 + vf50 + vf500 + r5 + r50 + r500 ~ year.month,
		data=reverter_months[reverter_months$active,],
		FUN=sum
	),
	data.frame(
		year         = year,
		month        = month,
		active.users = active.sum,
		vf5.users    = vf5.sum,
		vf50.users   = vf50.sum,
		vf500.users  = vf500.sum,
		r5.users     = r5.sum,
		r50.users    = r50.sum,
		r500.users   = r500.sum,
		year.month   = as.factor(paste(year, month, sep="/"))
	)
)
activity_counts$log.users.active = log(activity_counts$users.active, base=10)
activity_counts$log.v5.users     = log(activity_counts$vf5.users, base=10)
activity_counts$log.v50.users    = log(activity_counts$vf50.users, base=10)


png("plots/vandal_fighters.by_month.png", width=1024, height=768)
plot(
	activity_counts$year.month, 
	(activity_counts$active.users*0)-10000, 
	col="#FFFFFF",
	ylim=c(0, max(activity_counts$users.active)+.5),
	main="Vandal fighters and active editors over time",
	xlab="Time (in months)",
	ylab="Number of users (log10 scaled)"
)
lines(
	activity_counts$year.month, 
	activity_counts$active.users, 
	type="o", 
	pch=20, 
	lty=1, 
	col="blue"
)
lines(
	activity_counts$year.month, 
	activity_counts$vf5.users, 
	type="o", 
	pch=22, 
	lty=2, 
	col="red"
)
legend(
	max(as.numeric(activity_counts$year.month))-10, 
	max(activity_counts$active.users)+.5, 
	c("active editors","vandal fighters"), 
	cex=1.2,
	col=c("blue","red"),
	pch=20:21,
	lty=1:2
)
dev.off()

png("plots/vandal_fighters.by_month.logged.png", width=1024, height=768)
plot(
	activity_counts$year.month, 
	(activity_counts$log.users.active*0)-10000, 
	col="#FFFFFF",
	ylim=c(0, max(activity_counts$log.users.active)+.5),
	main="Vandal fighters and active editors over time",
	xlab="Time (in months)",
	ylab="Number of users (log10 scaled)"
)
lines(
	activity_counts$year.month, 
	activity_counts$log.active.users, 
	type="o", 
	pch=20, 
	lty=1, 
	col="blue"
)
lines(
	activity_counts$year.month, 
	activity_counts$log.vf5.users, 
	type="o", 
	pch=22, 
	lty=2, 
	col="red"
)
legend(
	max(as.numeric(activity_counts$year.month))-10, 
	max(activity_counts$log.active.users)+.5, 
	c("active editors","vandal fighters"), 
	cex=1.2,
	col=c("blue","red"),
	pch=20:21,
	lty=1:2
)
dev.off()

plot_prop_with_regression = function(year.month, prop, name, desc){
	model = lm(
		prop ~ as.numeric(year.month)
	)
	modelSummary = summary(model)
	monthLine = function(x){
		model$coefficients[['(Intercept)']] + model$coefficients[['as.numeric(year.month)']]*x
	}
	png(paste("plots/", name, "_prop.by_month.png", sep=""), width=1024, height=768)
	plot(
		year.month, 
		(prop*0)-10000, 
		col="#FFFFFF",
		ylim=c(0, max(prop)*1.1),
		main=paste("Proportion of active editors who", desc, "(no bots)"),
		xlab="Month",
		ylab="Prop of of vandal fighters"
	)
	lines(
		year.month,
		prop,
		type="o",
		pch=22,
		lty=2,
		col="red"
	)
	lines(
		year.month[order(year.month)], 
		monthLine(as.numeric(year.month[order(year.month)])),
		lty=1,
		col="black"
	)
	legend(
		mean(as.numeric(year.month)), 
		max(prop)*1.1,
		paste(
			"R^2=", round(modelSummary$r.squared, 3),
			" coef=", round(model$coefficients[['as.numeric(year.month)']], 5),
			" p=", round(modelSummary$coefficients[2,4], 5)
		), 
		cex=1.2,
		col=c("black"),
		lty=1
	)
	dev.off()
}
plot_prop_with_regression(
	activity_counts$year.month, 
	activity_counts$vf5.users/activity_counts$active.users, 
	"vandal_5",
	"revert >=5 vandals per month"
)
plot_prop_with_regression(
	activity_counts$year.month, 
	activity_counts$vf50.users/activity_counts$active.users, 
	"vandal_50",
	"revert >=50 vandals per month"
)
plot_prop_with_regression(
	activity_counts$year.month, 
	activity_counts$vf500.users/activity_counts$active.users, 
	"vandal_50",
	"revert >=500 vandals per month"
)
plot_prop_with_regression(
	activity_counts$year.month, 
	activity_counts$r5.users/activity_counts$active.users, 
	"revert_5",
	"revert >=5 times per month"
)
plot_prop_with_regression(
	activity_counts$year.month, 
	activity_counts$r50.users/activity_counts$active.users, 
	"revert_50",
	"revert >=50 times per month"
)
plot_prop_with_regression(
	activity_counts$year.month, 
	activity_counts$r500.users/activity_counts$active.users, 
	"revert_500",
	"revert >=500 times per month"
)


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
		" p=", round(modelSummary$coefficients[2,4], 5)
	), 
	cex=1.2,
	col=c("black"),
	lty=1
)
dev.off()


activity_counts$super_vandal_fighter_prop = activity_counts$users.vf/activity_counts$users.active
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
	ylim=c(0, max(y)+.01),
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
	max(y)+.01,
	paste(
		"R^2=", round(modelSummary$r.squared, 3),
		" coef=", round(model$coefficients[['as.numeric(year.month)']], 5),
		" p=", round(modelSummary$coefficients[2,4], 5)
	), 
	cex=1.2,
	col=c("black"),
	lty=1
)
dev.off()
