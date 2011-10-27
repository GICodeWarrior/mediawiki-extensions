#ifndef UDP2LOGCONFIG_H
#define UDP2LOGCONFIG_H

#include <string>
#include <boost/ptr_container/ptr_vector.hpp>
#include <stdexcept>
#include <iostream>
#include "LogProcessor.h"
#include "../srclib/PosixFile.h"
#include "../srclib/Pipe.h"

class ConfigWriteCallback;

/**
 * The configuration and current processing state for udp2log.
 * TODO: rename this to Udp2LogState
 */
class Udp2LogConfig
{
public:
	Udp2LogConfig();
	void Open(const std::string & name);
	void Load();
	void FixBrokenProcessors();
	void Reload();
	void ProcessBuffer(const char *data, size_t dataLength);
	void PrintLossReport(std::ostream & os);

	inline ConfigWriteCallback GetWriteCallback();

	bool reload;
	bool fixBrokenProcessors;

protected:
	std::string fileName;
	boost::ptr_vector<LogProcessor> processors;
	PipePair bufferPipe;

	static PosixFile devNull;
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

	void operator()(const char* buffer, size_t bufSize) {
		return config.ProcessBuffer(buffer, bufSize);
	}
protected:
	Udp2LogConfig & config;
};

inline ConfigWriteCallback Udp2LogConfig::GetWriteCallback() {
	return ConfigWriteCallback(*this);
}


#endif
