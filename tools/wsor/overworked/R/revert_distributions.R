source("loader/load_reverting_months.R")

reverting_months = load_reverting_months()

library(doBy)

reverting_years = with(
	summaryBy(
		revisions + reverts + vandalism ~ year,
		data=reverting_months[reverting_months$year <= 2010,],
		FUN=sum
	),
	data.frame(
		year      = year,
		revisions = revisions.sum,
		reverts   = reverts.sum,
		vandalism = vandalism.sum
	)
)

png("plots/vandal_revert_trend.by_year.png", width=1024, height=768)
plot(
	reverting_years$year, reverting_years$reverts,
	type="o",
	pch=20,
	col="blue",
	lty=1,
	main="Reverts and vandalism by year through 2010",
	xlab="Year",
	ylab="Number of reverts"
)
lines(
	reverting_years$year, reverting_years$vandalism, 
	type="o", 
	pch=22, 
	lty=2, 
	col="red"
)
legend(2001, max(reverting_years$reverts), c("total reverts","vandalism"), cex=1.2, 
   col=c("blue","red"), pch=20:22, lty=1:2);
dev.off()


