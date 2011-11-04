#ifndef UDPLOG_POSIXCLOCK_H
#define UDPLOG_POSIXCLOCK_H

#include <time.h>
#include <boost/operators.hpp>
#include "Exception.h"
class PosixClock
{
public:
	class Time : boost::additive<Time, 
		boost::totally_ordered<Time
		> >
	{
		public:
			Time() {
				data.tv_sec = data.tv_nsec = 0;
			}

			Time(time_t sec, long nsec = 0) {
				data.tv_sec = sec;
				data.tv_nsec = nsec;
				Normalise();
			}

			// Saturates at MIN or MAX
			Time(double seconds);

			Time & operator+=(const Time & other) {
				data.tv_sec += other.data.tv_sec;
				data.tv_nsec += other.data.tv_nsec;
				Normalise();
				return *this;
			}

			Time & operator-=(const Time & other) {
				data.tv_sec -= other.data.tv_sec;
				data.tv_nsec -= other.data.tv_nsec;
				Normalise();
				return *this;
			}

			operator double();

			enum {BILLION = 1000000000};

			struct timespec data;
			static const Time MAX;
			static const Time MIN;
			static const Time ZERO;

		protected:

			void Normalise() {
				if (data.tv_nsec >= BILLION || data.tv_nsec < 0) {
					FixNormalisation();
				}
			}

			void FixNormalisation();
	};

	PosixClock(clockid_t id_)
		: id(id_), resSet(false)
	{}

	Time Get() {
		Time t;
		int result = clock_gettime(id, &t.data);
		if (result == -1) {
			throw libc_error("PosixClock::Get");
		}
		return t;
	}

	void Set(const Time & t) {
		int result = clock_settime(id, &t.data);
		if (result == -1) {
			throw libc_error("PosixClock::Set");
		}
	}

	Time GetRes() {
		if (!resSet) {
			resSet = true;
			clock_getres(id, &res.data);
		}
		return res;
	}

	Time NanoSleep(int flags, const Time & request) {
		Time remain;
		if (clock_nanosleep(id, flags, &request.data, &remain.data) == -1) {
			throw libc_error("PosixClock::NanoSleep");
		}
		return remain;
	}
protected:
	clockid_t id;
	Time res;
	bool resSet;
};

inline bool operator==(const PosixClock::Time & a, const PosixClock::Time & b)
{
	return a.data.tv_sec == b.data.tv_sec && a.data.tv_nsec == b.data.tv_nsec;
}

inline bool operator<(const PosixClock::Time & a, const PosixClock::Time & b)
{
	if (a.data.tv_sec < b.data.tv_sec) {
		return true;
	}
	if (a.data.tv_nsec < b.data.tv_nsec) {
		return true;
	}
	return false;
}

#endif
