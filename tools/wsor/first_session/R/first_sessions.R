source("loader/user_sessions.R")

library(lattice)
library(doBy)

user_sessions = load_user_sessions()
user_sessions$early_survival = user_sessions$last_edit - user_sessions$es_0_end >= 30 & user_sessions$last_edit - user_sessions$es_0_end <= 30*6

user_sessions$investment_bucket = sapply(
	user_sessions$es_0_edits,
	function(edits){
		if(edits <= 5){
			1
		}else{
			5
		}
	}
)

year_totals = list(
	"2001"=690,
	"2002"=1899,
	"2003"=8734,
	"2004"=42628,
	"2005"=180990,
	"2006"=835163,
	"2007"=1122116,
	"2008"=946367,
	"2009"=889771,
	"2010"=787864
)

year_bucket_counts = with(
	summaryBy(
		year ~ year + investment_bucket,
		data=user_sessions[
			!is.na(user_sessions$year) &
			user_sessions$es_0_bucket <= 256,
		],
		FUN=c(length)
	),
	data.frame(
		year     = as.numeric(as.character(year)),
		bucket   = investment_bucket,
		s        = year.length
	)
)
year_bucket_counts$totals = sapply(
	as.character(year_bucket_counts$year),
	function(year){
		year_totals[[year]]
	}
)
year_bucket_counts = transformBy(
	n ~ year,
	data=year_bucket_counts,
	n=sum(s),
	p=s/sum(s)
)
year_bucket_counts$projected_s = with(
	year_bucket_counts,
	s * totals
)

#year_bucket_counts = with(
#	year_bucket_counts[year_bucket_counts$year != "2001",],
#	data.frame(
#		year    = unique(year),
#		prop_1  = prop[bucket==1],
#		prop_5  = prop[bucket==5]
#	)
#)
png("plots/highly_invested_editor_prop.png", height=389, width=1024)
xyplot(
	p ~ year,
	data =year_bucket_counts[year_bucket_counts$year != "2001" & year_bucket_counts$bucket == 5,],
	panel=function(x, y, subscripts, ...){
		panel.xyplot(x, y, ...)
		f = year_bucket_counts[
			year_bucket_counts$year != "2001" & 
			year_bucket_counts$bucket == 5,
		][subscripts,]
		x = f$year
		p = f$p
		n = f$n
		se = sqrt(p*(1-p)/n)
		panel.arrows(x, p+se, x, p-se, ends="both", col="#777777", angle=90, length=.05)
	},
	type="o",
	lwd=2,
	col="#009999",
	main="Proportion of highly invested new editors over time",
	ylab="Proportion of highly invested new editors",
	sub="highly invested means making > 5 edits in the first session",
	xlab="Year"#,
	#ylim=c(0,max(year_bucket_counts[year_bucket_counts$year != "2001" & year_bucket_counts$bucket == 5,]$p)+.02)
)
dev.off()

year_bucket_counts$projected_s = with(
	year_bucket_counts,
	round(p * totals)
)
year_bucket_counts = transformBy(
	~ year,
	data=year_bucket_counts,
	stacked_s=(bucket==5)*sum(projected_s)+projected_s
)
year_bucket_counts$bucket_name = ''
year_bucket_counts[year_bucket_counts$bucket == 1,]$bucket_name = "1-5 edits in first session"
year_bucket_counts[year_bucket_counts$bucket == 5,]$bucket_name = "> 5 edits in first session"

png("plots/editor_investment_totals.stacked.png", height=389, width=1024)
params = list(
	'1'=list(col="#999900"),
	'5'=list(col="#009999")
)
xyplot(
	stacked_s ~ year,
	groups=bucket,
	data =year_bucket_counts[year_bucket_counts$year != "2001",],
	panel=function(x, y, subscripts, groups, ...){
		f = year_bucket_counts[year_bucket_counts$year != "2001",][subscripts,]
		for(group in unique(groups)){
			s = f[f$bucket == group,]$stacked_s
			p = f[f$bucket == group,]$p
			year = f[f$bucket == group,]$year
			n = f[f$bucket == group,]$n
			totals = f[f$bucket == group,]$totals
			se = sqrt(p*(1-p)/n)*totals
			param=params[[as.character(group)]]
			
			panel.xyplot(year, s, col=param$col, ...)
			#panel.arrows(year, s+se, year, s-se, ends="both", col="#777777", angle=90, length=.05)
		}
	},
	type="o",
	lwd=2,
	main="New editors by initial investment levels (stacked)",
	ylab="Number of new editors",
	xlab="Year",
	auto.key=list(
		text=c("> 5 edits in first session", "1-5 edits in first session"), 
		col=c(
			"#009999",
			"#999900"
		),
		points=F
	)#,
	#ylim=c(0,max(year_bucket_counts[year_bucket_counts$year != "2001" & year_bucket_counts$bucket == 5,]$p)+.02)
)
dev.off()

png("plots/editor_investment_totals.1-5_edits.png", height=384, width=1024)
xyplot(
	projected_s ~ year,
	data =year_bucket_counts[year_bucket_counts$year != "2001" & year_bucket_counts$bucket == 1,],,
	type="o",
	lwd=2,
	main="New editors with 1-5 edits in their first session",
	ylab="Number of new editors",
	xlab="Year",
	col="#999900"
)
dev.off()

png("plots/editor_investment_totals.5-_edits.png", height=384, width=1024)
xyplot(
	projected_s ~ year,
	data =year_bucket_counts[year_bucket_counts$year != "2001" & year_bucket_counts$bucket == 5,],,
	type="o",
	lwd=2,
	main="New editors with > 5 edits in their first session",
	ylab="Number of new editors",
	xlab="Year",
	col="#009999"
)
dev.off()


yearly_survival = with(
	summaryBy(
		early_survival ~ year,
		data=user_sessions[!is.na(user_sessions$year),],
		FUN=c(sum, length)
	),
	data.frame(
		year = year,
		prop = early_survival.sum/early_survival.length
	)
)
yearly_survival$total = sapply(
	as.character(yearly_survival$year),
	function(year){
		year_totals[[year]]
	}
)
yearly_survival$surviving = yearly_survival$prop * yearly_survival$total

yearly_survival_trans = with(
	yearly_survival,
	rbind(
		data.frame(
			year=year,
			group="total",
			n=total
		),
		data.frame(
			year=year,
			group="surviving",
			n=surviving
		)
	)
)	

png("plots/editors_surviving_and_total.stacked.png", height=389, width=1024)
params = list(
	'surviving'=list(col="#009999", lty=1),
	'total'=list(col="#999900", lty=2)
)
xyplot(
	n ~ year,
	groups=group,
	data =yearly_survival_trans,
	panel=function(x, y, subscripts, groups, ...){
		f = yearly_survival_trans[subscripts,]
		for(group in unique(groups)){
			n = f[f$group == group,]$n
			year = f[f$group == group,]$year
			param=params[[group]]
			
			panel.xyplot(year, n, col=param$col, lty=param$lty, ...)
			#panel.arrows(year, s+se, year, s-se, ends="both", col="#777777", angle=90, length=.05)
		}
		panel.lines(c(0, 10000), c(0,0), col="#000000")
	},
	type="o",
	lwd=2,
	main="New editors survining and total by first edit year",
	ylab="Number of new editors",
	xlab="Year of first edit",
	auto.key=list(
		text=c("total editors", "surviving editors"), 
		col=c(
			"#999900",
			"#009999"
		),
		points=F,
		cex=1.5
	)#,
	#ylim=c(0,max(year_bucket_counts[year_bucket_counts$year != "2001" & year_bucket_counts$bucket == 5,]$p)+.02)
)
dev.off()
