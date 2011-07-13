source("loader/load_reverter_months.R")

library(lattice)
library(grid)
library(doBy)

reverter_months = load_reverter_months()
reverter_months = reverter_months[!grepl("bot( |$|[^a-z])", reverter_months$username, ignore.case=T),]
reverter_months = reverter_months[reverter_months$username != "DASHBotAV",]
reverter_months$active     = reverter_months$revisions >= 5
reverter_months$year.month = with(
	reverter_months,
	as.factor(paste(year, month, sep="/"))
)

vfer_years = with(
	summaryBy(
		reverts ~ year + user_id + username,
		data=reverter_months,
		FUN=sum
	),
	data.frame(
		year       = year,
		user_id    = user_id,
		username   = username,
		reverts    = reverts.sum
	)
)

top_vfers = data.frame()

for(year in unique(vfer_years$year)){
	vfer_year = vfer_years[vfer_years$year==year,]
	vfer_year = vfer_year[order(vfer_year$reverts, decreasing=T),]
	png(paste('plots/vandal_fighter_activity', 'no_bots', year, 'png', sep="."), height=768, width=1024)
	print(barchart(
		reorder(username, reverts) ~ reverts,
		data=vfer_year[1:50,],
		horizontal=T,
		xlab="Vandal reverts",
		xlim=c(0,50000)
	))
	dev.off()
}

format_p = function(pval){
	if(pval < ".001"){
		"< .001"
	}else{
		paste("=", pval)
	}
}


activity_months = summaryBy(
	vandal_reverts + reverts + revisions ~ year.month,
	data=reverter_months,
	FUN=c(mean, sd, length)
)

plot_activity_mean = function(year.month, m, s, n, name){
	model = lm(
		m ~ as.numeric(year.month),
		data=activity_months
	)
	summary(model)
	monthLine = function(x){
		model$coefficients[['(Intercept)']] + model$coefficients[['as.numeric(year.month)']]*x
	}
	
	print(xyplot(
		m ~ as.factor(year.month),
		panel = function(x, y, subscripts, ...){
			panel.xyplot(x, y, ...)
			se = s[subscripts]/sqrt(n[subscripts])
			panel.arrows(x, y+se, x, y-se, ends="both", angle=90, col="#000000", length=0.05, ...)
			panel.lines(x[order(x)], y[order(x)], lwd=2, ...)
			panel.lines(x[order(x)], monthLine(as.numeric(x[order(x)])), lwd=2, col="#000000")
			grid.text(
				paste(
					"R^2=", round(modelSummary$r.squared, 3),
					" coef=", round(model$coefficients[['as.numeric(year.month)']], 5),
					" p=", round(modelSummary$coefficients[2,4], 8)
				),
				.5,
				.95
			)
		},
		#main="Average Patroller workload by month",
		ylab=paste("Mean", name, "per user-month"),
		xlab="Month",
		scales=list(x=list(rot=45)),
		ylim=c(0, max(m)*1.1)
	))
}


png("plots/reverting_revisions.per_user_month.png", height=768, width=1024)
with(
	activity_months,
	plot_activity_mean(year.month, reverts.mean, reverts.sd, reverts.length, "reverting revisions")
)
dev.off()

png("plots/vandal_reverting_revisions.per_user_month.png", height=768, width=1024)
with(
	activity_months,
	plot_activity_mean(year.month, vandal_reverts.mean, vandal_reverts.sd, vandal_reverts.length, "vandal reverting revisions")
)
dev.off()

png("plots/revisions.per_user_month.png", height=768, width=1024)
with(
	activity_months,
	plot_activity_mean(year.month, revisions.mean, revisions.sd, revisions.length, "revisions")
)
dev.off()


top_vfers = data.frame()
for(year.month in unique(reverter_months$year.month)){
	month_vfers = reverter_months[reverter_months$year.month == year.month,]
	cat("Adding", year.month, "...") 
	top_vfers = rbind(
		top_vfers,
		month_vfers[order(month_vfers$reverts, decreasing=T),][1:50,]
	)
	cat("DONE!\n")
}

top_activity_months = summaryBy(
	vandal_reverts + reverts + revisions ~ year.month,
	data=top_vfers,
	FUN=c(mean, sd, length)
)

png("plots/reverting_revisions.per_user_month.top_50.png", height=768, width=1024)
with(
	top_activity_months,
	plot_activity_mean(year.month, reverts.mean, reverts.sd, reverts.length, "reverting revisions")
)
dev.off()

png("plots/vandal_reverting_revisions.per_user_month.top_50.png", height=768, width=1024)
with(
	top_activity_months,
	plot_activity_mean(year.month, vandal_reverts.mean, vandal_reverts.sd, vandal_reverts.length, "vandal reverting revisions")
)
dev.off()

png("plots/revisions.per_user_month.top_50.png", height=768, width=1024)
with(
	top_activity_months,
	plot_activity_mean(year.month, revisions.mean, revisions.sd, revisions.length, "revisions")
)
dev.off()









