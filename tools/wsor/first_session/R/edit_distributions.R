source("loader/user_sessions.R")

library(lattice)
library(doBy)

user_sessions = load_user_sessions()
user_sessions$year = floor(user_sessions$first_edit/10000000000)


year_edits = data.frame()
for(year in unique(user_sessions$year)){
	tab = data.frame(
		table(
			10^round(
				log(
					user_sessions[user_sessions$year == year,]$edit_count,
					base=10
				)
			)
		)
	)
		
	year_edits = rbind(
		year_edits,
		data.frame(
			year = year,
			edits = as.numeric(as.character(tab$Var1)),
			freq = tab$Freq,
			prop = tab$Freq/sum(tab$Freq)
		)
	)
}

png("plots/edit_count_distribution.png", height=768, width=1024)
xyplot(
	freq ~ edits | as.factor(year),
	data = year_edits[year_edits$edits > 0,],
	type="o",
	scales=list(
		x=list(log=10, at=10^(0:6), labels=10^(0:6))#,
		#y=list(log=10)
	),
	main="Editor edit count distributions by editor first edit year",
	xlab="Number of edits (log10 bucketed)",
	ylab="Number of editors",
	sub="based on a random sample of <= 10,000 editors from each year"
)
dev.off()

png("plots/edit_count_distribution.prop.png", height=768, width=1024)
xyplot(
	prop ~ edits | as.factor(year),
	data = year_edits[year_edits$edits > 0,],
	type="o",
	scales=list(
		x=list(log=10, at=10^(0:6), labels=10^(0:6))#,
		#y=list(log=10)
	),
	main="Editor edit count distributions by editor first edit year",
	xlab="Number of edits (log10 bucketed)",
	ylab="Proportion of editors",
	sub="based on a random sample of <= 10,000 editors from each year"
)
dev.off()
