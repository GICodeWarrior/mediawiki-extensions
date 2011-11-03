#ifndef UDP2LOGCONFIG_H
#define UDP2LOGCONFIG_H

#include <string>
#include <stdexcept>
#include <iostream>
#include <vector>
#include "../srclib/PosixFile.h"
#include "../srclib/Pipe.h"
#include "../srclib/PosixClock.h"
#include "RateAverage.h"
#include "Block.h"
#include "../srclib/TypedEpollInstance.h"

class ConfigWriteCallback;
class LogProcessor;
class PipeProcessor;

/**
 * The configuration and current processing state for udp2log.
 * TODO: rename this to Udp2LogState
 */
class Udp2LogConfig
{
public:
	typedef boost::shared_ptr<LogProcessor> ProcessorPointer;

	Udp2LogConfig();
	void Open(const std::string & name);
	void Load();
	void AddUnsampledPipe(ProcessorPointer p);
	void FixBrokenProcessors();
	void Reload();
	void ProcessBlock(const Block & block);
	void HandleBacklogs();
	void CheckReadiness(const Block & block);
	void HandleTeePipes(const Block & block);
	void PutOnHoliday(LogProcessor & p);
	void UpdateCounters();
	void PrintStatusReport(std::ostream & os);

	void IncrementPacketCount() {
		packetRate.Increment();
	}

	void IncrementProcessBytes(int bytes) {
		processRate.Increment(bytes);
	}

	int GetPacketRate() {
		return (int)packetRate.GetRate();
	}

	int GetProcessRate() {
		return (int)processRate.GetRate();
	}

	inline ConfigWriteCallback GetWriteCallback();

	void ResetCurrentTime() {
		currentTimeValid = false;
	}

	const PosixClock::Time & GetCurrentTime() {
		if (!currentTimeValid) {
			currentTime = clock.Get();
			currentTimeValid = true;
		}
		return currentTime;
	}

	BlockPool & GetPool() {
		return pool;
	}

	bool reload;
	bool fixBrokenProcessors;

	static const double UPDATE_PERIOD;
	static const double RATE_PERIOD;
	static const double MIN_LOSS_RATIO;
	static const PosixClock::Time MIN_HOLIDAY_TIME;
	static const PosixClock::Time MAX_HOLIDAY_TIME;
	static const size_t BLOCK_SIZE;

protected:
	// The storage for blocks
	// This declaration has to be above the declaration of any member objects
	// that hold Block references, such as LogProcessor, so that destruction of
	// the Block references occurs before the destruction of the pool.
	BlockPool pool;

	std::string fileName;

	typedef std::vector<boost::shared_ptr<LogProcessor> > ProcessorArray;
	typedef ProcessorArray::iterator ProcessorIterator;
	ProcessorArray processors;

	PipePair bufferPipe;

	static PosixFile devNull;
	RateAverage packetRate, processRate;

	typedef TypedEpollInstance<PipeProcessor> MyEpoll;
	typedef boost::shared_ptr<MyEpoll> MyEpollPointer;
	MyEpollPointer epoll;

	typedef MyEpoll::TypedEventArray MyEpollEvents;
	typedef MyEpollEvents::iterator MyEventsIterator;
	// This is a temporary vector used to hold the result of an epoll_wait(). 
	// It's in the object state instead of the stack to avoid reallocation
	// during the high-performance sections of the code. The same goes for 
	// teeProcessors and readyPipes.
	MyEpollEvents epollEvents;

	bool currentTimeValid;
	PosixClock::Time currentTime;
	PosixClock clock;
	std::vector<bool> teeProcessors, activeProcessors, readyProcessors;
	size_t numPipeProcessors;
	std::vector<bool> readyPipes;

	typedef std::map<int, std::vector<int> > ByFactorArray;
	typedef ByFactorArray::iterator ByFactorIterator;
	ByFactorArray processorsByFactor;

	unsigned lineIndex;
};

class ConfigWatcher
{
public:
	ConfigWatcher();
	void operator()();

	int * reloaded;
};

class ConfigError : public std::runtime_error
{
public:
	ConfigError(const char * s) 
		: runtime_error(s)
	{}
};

class ConfigWriteCallback
{
public:
	ConfigWriteCallback(Udp2LogConfig & config_)
		: config(config_)
	{}

	void operator()(Block block) {
		return config.ProcessBlock(block);
	}
protected:
	Udp2LogConfig & config;
};

inline ConfigWriteCallback Udp2LogConfig::GetWriteCallback() {
	return ConfigWriteCallback(*this);
}

#include "LogProcessor.h"

#endif
