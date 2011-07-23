source("loader/load_editor_first_and_last.R")
source("loader/load_editor_edit_count.R")

editor_first_and_last = load_editor_first_and_last()
efl = unique(editor_first_and_last)
efl = efl[efl$last10_edits == 10,]

editor_edit_count = load_editor_edit_count()
efl = merge(
	efl,
	editor_edit_count,
	by=c("user_id", "user_name")
)

library(lattice)

#plot(table(efl$fes_edits))
#xyplot(table(efl$fes_edits)~as.numeric(names(table(efl$fes_edits))), scales=list(x=list(log=2), y=list(log=2)))

png("plots/fes_discarded.hist.png", height=768, width=1024)
efl$fes_discarded = efl$fes_reverted + efl$fes_deleted
efl$fes_discarded_prop = efl$fes_discarded / efl$fes_edits
plot(
	table(round(efl[efl$fes_edits >= 4,]$fes_discarded_prop, 1)),
	main="Histogram of the proportion of first session edits that were discarded",
	sub="for editors with at least 20 edits and 4 in first session.  Discarded edits have been reverted or deleted",
	ylab="Frequency",
	xlab="Proportion of discarded edits"
)
dev.off()

png("plots/fes_vandalism.hist.png", height=768, width=1024)
efl$fes_vandalism_prop = efl$fes_vandalism / (efl$fes_edits - efl$fes_deleted)
plot(
	table(round(efl[(efl$fes_edits - efl$fes_deleted) >= 1,]$fes_vandalism_prop, 1)),
	main="Histogram of the proportion of kept 1st session edits that were vandalism",
	sub="for editors with at least 20 edits and 1 kept edits in first session.",
	ylab="Frequency",
	xlab="Proportion of vandalism edits"
)
dev.off()

png("plots/fes_reverted.hist.png", height=768, width=1024)
efl$fes_reverted_prop = efl$fes_reverted / (efl$fes_edits - efl$fes_deleted)
plot(
	table(round(efl[(efl$fes_edits - efl$fes_deleted) >= 1,]$fes_reverted_prop, 1)),
	main="Histogram of the proportion of kept 1st session edits that were reverted",
	sub="for editors with at least 20 edits and 1 kept edits in first session.",
	ylab="Frequency",
	xlab="Proportion of reverted edits"
)
dev.off()


png("plots/last10_discarded.hist.png", height=768, width=1024)
efl$last10_discarded = efl$last10_reverted + efl$last10_deleted
efl$last10_discarded_prop = efl$last10_discarded / efl$last10_edits
plot(
	table(round(efl$last10_discarded_prop, 1)),
	main="Histogram of the proportion of the last 10 edits that were discarded",
	sub="for editors with at least 20 edits.  Discarded edits have been reverted or deleted",
	ylab="Frequency",
	xlab="Proportion of discarded edits"
)
dev.off()


png("plots/future_edits.hist.png", height=768, width=1024)
efl$future_edits = efl$edit_count - efl$fes_edits
plot(
	table(10^round(log(efl$future_edits, base=10), 1)), 
	main="Histogram of edits after first session for edits who made at least 20 edits",
	xlab="Edits after first session (log10 bucketed, scaled)",
	ylab="Frequency",
	type="o",
	log="x"
)
dev.off()


top_100 = efl[order(efl$edit_count, decreasing=T),][1:100,]
png("plots/fes_discarded.hist.top_100.png", height=768, width=1024)
top_100$fes_discarded = top_100$fes_reverted + top_100$fes_deleted
top_100$fes_discarded_prop = top_100$fes_discarded / top_100$fes_edits
plot(
	table(round(top_100$fes_discarded_prop, 1)),
	main="Histogram of the proportion of the last 10 edits that were discarded",
	sub="for the top 100 editors by edit count.  Discarded edits have been reverted or deleted",
	ylab="Frequency",
	xlab="Proportion of discarded edits"
)
dev.off()

png("plots/fes_reverted.hist.top_100.png", height=768, width=1024)
top_100$fes_reverted_prop = top_100$fes_reverted / (top_100$fes_edits - top_100$fes_deleted)
plot(
	table(round(top_100[top_100$fes_edits - top_100$fes_deleted >= 1,]$fes_reverted_prop, 1)),
	main="Histogram of the proportion of the last 10 edits that were reverted",
	sub="for the top 100 editors by edit count.",
	ylab="Frequency",
	xlab="Proportion of reverted edits"
)
dev.off()

png("plots/fes_vandal.hist.top_100.png", height=768, width=1024)
top_100$fes_vandalism_prop = top_100$fes_vandalism / (top_100$fes_edits - top_100$fes_deleted)
plot(
	table(round(top_100[top_100$fes_edits - top_100$fes_deleted >= 1,]$fes_vandalism_prop, 1)),
	main="Histogram of the proportion of the last 10 edits that were reverted for vandalism",
	sub="for the top 100 editors by edit count.",
	ylab="Frequency",
	xlab="Proportion of edits reverted for vandalism"
)
dev.off()


summary(top_100$fes_vandalism > 0)
summary(top_100$fes_reverted > 0)
summary(top_100$fes_discarded > 0)

