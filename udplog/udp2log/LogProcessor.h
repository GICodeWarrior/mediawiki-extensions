#ifndef LOGPROCESSOR_H
#define LOGPROCESSOR_H

#include <fstream>
#include <sys/time.h>
#include <string>
#include <boost/shared_ptr.hpp>
#include "../srclib/Exception.h"
#include "../srclib/Socket.h"
#include "../srclib/Pipe.h"
#include "../srclib/PosixClock.h"
#include "RateAverage.h"
#include "Udp2LogConfig.h"

class LogProcessor
{
public:
	virtual ssize_t Write(const char *buffer, size_t size) = 0;
	virtual void FixIfBroken() {}
	virtual ~LogProcessor() {}
	virtual bool IsOpen() = 0;
	virtual std::string & GetName() = 0;

	virtual int IsUnsampledPipe() {
		return false;
	}

	int GetFactor() const
	{
		return factor;
	}

	uint64_t GetBytesLost() { return bytesLost; }

	void ResetBytesLost() {
		bytesLost = 0;
	}

	void UpdateLossRate() {
		lossRate.Update();
	}

	int GetLossRate() {
		return (int)lossRate.GetRate();
	}

	void SetHoliday(const PosixClock::Time & endTime) {
		holidayEndTime = endTime;
	}

	bool IsBacklogged() {
		return (bool)backlog.GetSize();
	}

	Block & GetBacklogBlock() {
		return backlog;
	}

	void ClearBacklog() {
		backlog = config.GetPool().GetEmptyBlock();
	}
	
	void SetBacklog(const Block & block) {
		backlog = block;
	}

	int GetProcessorIndex() {
		return index;
	}

	bool IsBlocking() {
		return blocking;
	}

	bool IsActive(const PosixClock::Time & currentTime);
	void IncrementBytesLost(size_t bytes);

protected:
	LogProcessor(Udp2LogConfig & config_, int index_, int factor_, bool flush_, bool blocking_)
		: config(config_), index(index_), counter(0), 
		factor(factor_), flush(flush_), blocking(blocking_), bytesLost(0), 
		lossRate(Udp2LogConfig::UPDATE_PERIOD, Udp2LogConfig::RATE_PERIOD),
		backlog(config_.GetPool().GetEmptyBlock())
	{}

	bool Sample() {
		if (factor != 1) {
			counter++;
			if (counter >= factor) {
				counter = 0;
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}
	}

	Udp2LogConfig & config;
	int index;
	int counter;
	int factor;
	bool flush;
	bool blocking;
	uint64_t bytesLost;
	PosixClock::Time holidayEndTime;
	RateAverage lossRate;
	Block backlog;
};

class FileProcessor : public LogProcessor
{
public:
	static boost::shared_ptr<LogProcessor> NewFromConfig(
			Udp2LogConfig & config, int index, char * params, bool flush);
	virtual ssize_t Write(const char *buffer, size_t size);

	FileProcessor(Udp2LogConfig & config_, int index_, char * fileName_, 
			int factor_, bool flush_) 
		: LogProcessor(config_, index_, factor_, flush_, true)
	{
		fileName = fileName_;
		f.open(fileName_, std::ios::app | std::ios::out);
	}
	
	virtual bool IsOpen() {
		return f.good();
	}


	virtual std::string & GetName() {
		return fileName;
	}

	std::ofstream f;
	std::string fileName;
};

class PipeProcessor : public LogProcessor
{
public:
	static boost::shared_ptr<LogProcessor> NewFromConfig(
			Udp2LogConfig & config, int index, char * params, bool flush, bool blocking);
	virtual ssize_t Write(const char *buffer, size_t size);
	virtual void FixIfBroken();

	PipeProcessor(Udp2LogConfig & config_, int index_, char * command_, int factor_, 
			bool flush_, bool blocking_);

	~PipeProcessor() 
	{
		Close();
	}

	virtual bool IsOpen() 
	{
		return (bool)child;
	}

	virtual int IsUnsampledPipe() {
		return factor == 1;
	}

	Pipe & GetPipe() {
		return pipes->writeEnd;
	}

	ssize_t CopyFromPipe(Pipe & source, size_t dataLength);
	virtual std::string & GetName() { return command; }

protected:
	typedef boost::shared_ptr<PipePair> PipePairPointer;

	void Open();
	void Close();
	bool HandleError(libc_error & e, size_t bytes);
	
	std::string command;

	PipePairPointer pipes;
	pid_t child;
	
	enum {RESTART_INTERVAL = 5};

};

#endif
