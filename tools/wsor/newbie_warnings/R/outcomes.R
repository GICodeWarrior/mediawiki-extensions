source("loader/load_hugglings.R")
source("loader/load_huggling_codings.R")
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

huggling_codings = load_huggling_codings(reload=T)
messaged_codings = huggling_codings[!is.na(huggling_codings$before_rating),]

messaged_codings$retailates   = messaged_codings$retaliates > 0
messaged_codings$contact      = messaged_codings$contacts_huggler > 0 | messaged_codings$retaliates > 0
messaged_codings$quality_work = messaged_codings$after_rating >= 3.0
messaged_codings$stay         = !is.na(messaged_codings$after_rating)
messaged_codings$improves     = messaged_codings$after_rating > messaged_codings$before_rating
messaged_codings$anon         = messaged_codings$is_anon > 0
messaged_codings$talk_edits_before_msg = with(
	messaged_codings,
	user_talk_edits_after_msg + article_talk_edits_before_msg
)
messaged_codings$ntalk_edits_before_msg = with(
	messaged_codings,
	edits_before_msg - talk_edits_before_msg
)
messaged_codings$good_contact = mapply(
	function(contact, retaliates){
		if(!is.na(contact) & contact){
			retaliates <= 0 
		}else{
			NA
		}
	},
	messaged_codings$contact,
	messaged_codings$retaliates
)
messaged_codings$good_outcome = with(
	messaged_codings,
	(
		before_rating <= 2 &
		(
			is.na(after_rating) |
			after_rating > 2
		)
	) |
	(
		!is.na(good_contact) & 
		good_contact
	) | 
	(
		!is.na(quality_work) &
		quality_work
	)
)

##
# Groups
#
# - < 2          at least one of us thought "no hope"
# - >= 2 & <= 3  possibles
# - > 3          at least one of us thought "golden"
#
# For each group:
#  - contact
#    - contact huggler + retaliate
#    - talk? (wait for staeiou)
#  - continue editing
#    - did they actually
#    - quality
#      - improve
#      - was it good
#      - degrade
#
#
# Predictors:
#  - number of edilts before message
#    - number deleted
#  - makes edits to talk (before/after)

messaged_codings$group = as.factor(sapply(
	messaged_codings$before_rating,
	function(rating){
		if(is.na(rating)){
			NA
		}else if(rating < 2){
			"unlikely"
		}else if(rating <= 3){
			"possible"
		}else{
			"golden"
		}
	}
))

#
# Try removing teaching*personal.
#

for(group in c("unlikely", "possible", "golden")){
	group_codings = messaged_codings[ 
		messaged_codings$group == group,
	]
	
	
	cat("Result's for ", length(group_codings$group), " '", group, "' editors:\n", sep='')
	cat("============================================================\n")
	
	print(summary(glm(
		good_outcome ~ anon + ntalk_edits_before_msg + talk_edits_before_msg + teaching * personal,
		data = group_codings
	)))
	
	print(summary(glm(
		improves ~ anon + ntalk_edits_before_msg + talk_edits_before_msg + teaching * personal,
		data = group_codings
	)))
	
	print(summary(glm(
		contact ~ anon + ntalk_edits_before_msg + talk_edits_before_msg + teaching * personal,
		data = group_codings
	)))
	
	print(summary(glm(
		good_contact ~ anon + ntalk_edits_before_msg + talk_edits_before_msg + teaching * personal,
		data = group_codings
	)))
	
	print(summary(glm(
		stay ~ anon + ntalk_edits_before_msg + talk_edits_before_msg + teaching * personal,
		data = group_codings
	)))
	
	cat("\n\n\n")
}

meanNoNA = function(x){
	mean(x, na.rm=T)
}
lengthNoNA = function(x){
	length(na.omit(x))
}

library(lattice)
outcomeNames = list(
	good_outcome = "with a \"good outcome\"",
	improves     = "who show improvement",
	contact      = "who contact the reverting editor",
	good_contact = "who contact the reverting editor nicely",
	stay         = "who make at least one edit after reading the message"
)
for(outcomeName in c("good_outcome", "improves", "contact", "good_contact", "stay")){
	f = with(
		summaryBy(
			outcome ~ group + teaching + personal,
			data = data.frame(
				outcome  = messaged_codings[[outcomeName]],
				teaching = messaged_codings$teaching,
				personal = messaged_codings$personal,
				group    = messaged_codings$group
			),
			FUN=c(meanNoNA, lengthNoNA)
		),
		data.frame(
			group    = group,
			message  = mapply(
				function(personal, teaching){
					if(personal & teaching){
						"personal & teaching"
					}else if(personal){
						"personal"
					}else if(teaching){
						"teaching"
					}else{
						"control"
					}
				},
				personal,
				teaching
			),
			#teaching = teaching,
			#personal = personal,
			prop     = outcome.meanNoNA,
			n        = outcome.lengthNoNA
		)
	)
	cat(outcomeName, "\n")
	cat(f$prop, "\n\n")
	svg(paste("plots/outcome", outcomeName, "all_groups.svg", sep="."), height=4, width=8)
	print(barchart(
		prop ~ group | message,
		data = f,
		layout=c(4,1),
		xlab="Pre-message rating",
		lab="Proportion of editors",
		main=paste("Proportion of editors", outcomeNames[[outcomeName]])
	))
	dev.off()
}
