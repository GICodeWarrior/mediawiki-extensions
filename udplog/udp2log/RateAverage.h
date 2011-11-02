#ifndef UDPLOG_RATEAVERAGE_H
#define UDPLOG_RATEAVERAGE_H

#include <cmath>
#include <iostream>

class RateAverage {
public:
	RateAverage(double samplePeriod_, double averagePeriod_)
		: samplePeriod(samplePeriod_), averagePeriod(averagePeriod_)
	{
		constant = 1. - std::exp(-std::log(2) / averagePeriod_ * samplePeriod_);
	}

	void Increment(int x = 1) {
		currentSample += x;
	}

	void Update() {
		estimatedEventsPerSample = constant * currentSample + 
			(1. - constant ) * estimatedEventsPerSample;
		currentSample = 0;
	}

	double GetRate() {
		return estimatedEventsPerSample / samplePeriod;
	}
protected:
	int64_t currentSample;
	double samplePeriod, averagePeriod, estimatedEventsPerSample, constant;
};

#endif
