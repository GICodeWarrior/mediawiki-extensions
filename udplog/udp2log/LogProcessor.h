#ifndef LOGPROCESSOR_H
#define LOGPROCESSOR_H

#include <fstream>
#include <sys/time.h>
#include <string>
#include "../srclib/Exception.h"
#include "../srclib/Socket.h"
#include "../srclib/Pipe.h"

class LogProcessor
{
public:
	virtual void ProcessLine(const char *buffer, size_t size) = 0;
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

	uint64_t GetNumLost() { return numLost; }

protected:
	LogProcessor(int factor_, bool flush_)
		: counter(0), factor(factor_), flush(flush_), numLost(0)
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

	int counter;
	int factor;
	bool flush;
	uint64_t numLost;
};

class FileProcessor : public LogProcessor
{
public:
	static LogProcessor * NewFromConfig(char * params, bool flush);
	virtual void ProcessLine(const char *buffer, size_t size);

	FileProcessor(char * fileName_, int factor_, bool flush_) 
		: LogProcessor(factor_, flush_)
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
	static LogProcessor * NewFromConfig(char * params, bool flush, bool blocking);
	virtual void ProcessLine(const char *buffer, size_t size);
	virtual void FixIfBroken();

	PipeProcessor(char * command_, int factor_, bool flush_, bool blocking_);

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

	void CopyFromPipe(Pipe & source, size_t dataLength);
	virtual std::string & GetName() { return command; }

protected:
	typedef boost::shared_ptr<PipePair> PipePairPointer;

	void Open();
	void Close();
	void HandleError(libc_error & e);
	
	std::string command;

	PipePairPointer pipes;
	pid_t child;
	bool blocking;
	
	enum {RESTART_INTERVAL = 5};

};


#endif
