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

huggling_codings = load_huggling_codings()

huggling_codings$retailates_bool = huggling_codings$retaliates > 0

model = glm(
	retailates_bool ~ personal*teaching*image,
	huggling_codings,
	family=binomial(link="logit")
)
summary(model)
#Coefficients:
#                                    Estimate Std. Error z value Pr(>|z|)    
#(Intercept)                         -2.56495    0.59914  -4.281 1.86e-05 ***
#personalTrue                        -1.28520    1.17480  -1.094   0.2740    
#teachingTrue                        -0.07411    0.84624  -0.088   0.9302    
#imageTrue                           -0.69315    0.93713  -0.740   0.4595    
#personalTrue:teachingTrue            1.97835    1.42233   1.391   0.1642    
#personalTrue:imageTrue               2.50022    1.43554   1.742   0.0816 .  
#teachingTrue:imageTrue              -0.61904    1.50146  -0.412   0.6801    
#personalTrue:teachingTrue:imageTrue -1.26651    1.97089  -0.643   0.5205   

model = glm(
	retailates_bool ~ personal*teaching,
	huggling_codings,
	family=binomial(link="logit")
)
summary(model)

summary(
	huggling_codings[
		huggling_codings$personal == "True" & 
		huggling_codings$teaching == "True" & 
		huggling_codings$image == "True",
	]$retailates_bool
)

huggling_codings$contacts_huggler_bool = huggling_codings$contacts_huggler > 0

model = glm(
	contacts_huggler_bool ~ personal*teaching,
	huggling_codings,
	family=binomial(link="logit")
)
summary(model)

summary(
	huggling_codings[
		huggling_codings$personal == "True" & 
		huggling_codings$teaching == "True",
	]$retailates_bool
)

huggling_codings$good_contact = huggling_codings$contacts_huggler > 0 & huggling_codings$retaliates == 0

model = glm(
	good_contact ~ personal*teaching,
	huggling_codings,
	family=binomial(link="logit")
)
summary(model)

#huggling_codings$good_outcome = !is.na(huggling_codings$after_rating) & huggling_codings$after_rating >= 3.0
huggling_codings$good_outcome =  huggling_codings$after_rating >= 3.0

model = glm(
	good_outcome ~ personal*teaching,
	huggling_codings,
	family=binomial(link="logit")
)
summary(model)

model = glm(
	good_outcome ~ personal*teaching,
	huggling_codings[huggling_codings$before_rating < 1.5,],
	family=binomial(link="logit")
)
summary(model)

model = glm(
	good_outcome ~ personal*teaching,
	huggling_codings[huggling_codings$before_rating >= 1.5 & huggling_codings$before_rating < 2.5,],
	family=binomial(link="logit")
)
summary(model)

model = glm(
	good_outcome ~ personal*teaching,
	huggling_codings[huggling_codings$before_rating >= 2.5 & huggling_codings$before_rating < 3.5,],
	family=binomial(link="logit")
)
summary(model)

model = glm(
	good_outcome ~ personal*teaching,
	huggling_codings[huggling_codings$before_rating >= 3.5,],
	family=binomial(link="logit")
)
summary(model)


model = glm(
	good_outcome ~ personal*teaching,
	huggling_codings[huggling_codings$before_rating < 2.5,],
	family=binomial(link="logit")
)
summary(model)


model = glm(
	good_outcome ~ personal*teaching,
	huggling_codings[huggling_codings$before_rating >= 2.5,],
	family=binomial(link="logit")
)
summary(model)




huggling_codings$improves = huggling_codings$after_rating >= huggling_codings$before_rating

model = glm(
	improves ~ personal*teaching,
	huggling_codings,
	family=binomial(link="logit")
)
summary(model)


#####
#### Assholes go away
####


huggling_codings$fail_success = with(
	huggling_codings,
	before_rating < 1.5 & (
		is.na(after_rating) | 
		after_rating >= 1.5 | 
		good_contact
	)
)
summary(huggling_codings[huggling_codings$before_rating < 1.5,]$fail_success)

model = glm(
	fail_success ~ personal:teaching,
	huggling_codings[huggling_codings$before_rating < 1.5,],
	family=binomial(link="logit")
)
summary(model)



#####
#### Golden stick around (and do good work)
####


huggling_codings$golden_good = with(
	huggling_codings,
	before_rating >= 3 & 
	!is.na(after_rating) &
	(
		after_rating > 3 |
		good_contact
	)
)
summary(huggling_codings[huggling_codings$before_rating >= 3,]$golden_good)


model = glm(
	golden_good ~ personal*teaching,
	huggling_codings[huggling_codings$before_rating >= 3,],
	family=binomial(link="logit")
)
summary(model)


#####
#### Median conversion
####


huggling_codings$median_good = with(
	huggling_codings,
	before_rating >= 2 & 
	before_rating <= 3 & (
		is.na(after_rating) |
		(
			after_rating > before_rating |
			good_contact
		)
	)
)
summary(huggling_codings[
	huggling_codings$before_rating >= 2 & 
	huggling_codings$before_rating <= 3,
]$median_good)


model = glm(
	golden_good ~ personal*teaching,
	huggling_codings[huggling_codings$before_rating >= 3,],
	family=binomial(link="logit")
)
summary(model)
