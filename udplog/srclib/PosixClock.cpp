#include <time.h>
#include <limits>
#include <cmath>

#include "PosixClock.h"

const PosixClock::Time PosixClock::Time::MAX(std::numeric_limits<time_t>::max(), BILLION - 1);
const PosixClock::Time PosixClock::Time::MIN(std::numeric_limits<time_t>::min(), 0);
const PosixClock::Time PosixClock::Time::ZERO(0, 0);

PosixClock::Time::Time(double seconds) {
	if (seconds > std::numeric_limits<time_t>::max()) {
		*this = MAX;
	} else if (seconds < std::numeric_limits<time_t>::min()) {
		*this = MIN;
	} else {
		double intPart = std::floor(seconds);
		data.tv_sec = (time_t)intPart;
		data.tv_nsec = (long)((seconds - intPart) * BILLION);
	}
	Normalise();
}

void PosixClock::Time::FixNormalisation()
{
	if (data.tv_nsec < 0) {
		long seconds = (-data.tv_nsec) / BILLION;
		data.tv_sec -= seconds;
		data.tv_nsec += seconds * BILLION;
	}
	if (data.tv_nsec >= BILLION) {
		long seconds = data.tv_nsec / BILLION;
		data.tv_sec += seconds;
		data.tv_nsec -= seconds * BILLION;
	}
}

PosixClock::Time::operator double()
{
	return (double)data.tv_sec + ((double)data.tv_nsec) / BILLION;
}
