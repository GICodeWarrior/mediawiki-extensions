source("loader/load_hugglings.R")
library(doBy)
hugglings = load_hugglings()

hugglingCounts = summaryBy(
	recipient ~ recipient,
	data = hugglings,
	FUN=length
)
hugglingCounts$count = hugglingCounts$recipient.length
hugglingCounts$recipient.length = NULL

hugglings = merge(hugglings, hugglingCounts, by=c("recipient"))
