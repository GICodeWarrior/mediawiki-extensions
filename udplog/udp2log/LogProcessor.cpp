#include <stdio.h>
#include <iostream>
#include <unistd.h>
#include <linux/limits.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <sys/prctl.h>
#include "LogProcessor.h"
#include "Udp2LogConfig.h"

//---------------------------------------------------------------------------
// LogProcessor
//---------------------------------------------------------------------------
bool LogProcessor::IsActive(const PosixClock::Time & currentTime) {
	if (!IsOpen()) {
		return false;
	}
	if (currentTime > holidayEndTime) {
		return true;
	} else {
		// On holiday
		return false;
	}
}

void LogProcessor::IncrementBytesLost(size_t bytes) {
	if (bytes) {
		bytesLost += bytes;
		lossRate.Increment(bytes);
	}
}

//---------------------------------------------------------------------------
// FileProcessor
//---------------------------------------------------------------------------

boost::shared_ptr<LogProcessor> FileProcessor::NewFromConfig(
		Udp2LogConfig & config, int index, char * params, bool flush)
{
	char * strFactor = strtok(params, " \t");
	if (strFactor == NULL) {
		throw ConfigError(
			"Invalid file specification, format is: file <sample-factor> <filename>"
		);
	}
	int factor = atoi(strFactor);
	if (factor <= 0) {
		throw ConfigError(
			"Invalid sample factor in file specification, must be a number greater than zero"
		);
	}
	char * filename = strtok(NULL, "");
	FileProcessor * fp = new FileProcessor(config, index, filename, factor, flush);
	if (!fp->IsOpen()) {
		delete fp;
		throw ConfigError("Unable to open file");
	}
	std::cerr << "Opened log file " << filename << " with sampling factor " << factor << std::endl;
	return boost::shared_ptr<LogProcessor>(fp);
}

ssize_t FileProcessor::Write(const char *buffer, size_t size)
{
	if (IsActive(config.GetCurrentTime())) {
		f.write(buffer, size);
		if (flush) {
			f.flush();
		}
	}
	return (ssize_t)size;
}

//---------------------------------------------------------------------------
// PipeProcessor
//---------------------------------------------------------------------------

PipeProcessor::PipeProcessor(Udp2LogConfig & config_, int index_, 
		char * command_, int factor_, bool flush_, bool blocking_)
	: LogProcessor(config_, index_, factor_, flush_), 
	child(0), blocking(blocking_)
{
	command = command_;
	Open();
}

boost::shared_ptr<LogProcessor> PipeProcessor::NewFromConfig(
		Udp2LogConfig & config, int index, char * params, bool flush, bool blocking)
{
	char * strFactor = strtok(params, " \t");
	if (strFactor == NULL) {
		throw ConfigError(
			"Invalid pipe specification, format is: pipe <sample-factor> <command>"
		);
	}
	int factor = atoi(strFactor);
	if (factor <= 0) {
		throw ConfigError(
			"Invalid sample factor in pipe specification, must be a number greater than zero"
		);
	}
	char * command = strtok(NULL, "");
	PipeProcessor * pp = new PipeProcessor(config, index, command, factor, flush, blocking);
	if (!pp->IsOpen()) {
		delete pp;
		throw ConfigError("Unable to open pipe");
	}
	std::cerr << "Opened pipe with factor " << factor << ": " << command << std::endl;
	return boost::shared_ptr<LogProcessor>(pp);
}

void PipeProcessor::HandleError(libc_error & e, size_t bytes)
{
	bool restart;
	if (e.code == EAGAIN) {
		restart = false;
	} else if (e.code == EPIPE) {
		std::cerr << "Pipe terminated, suspending output: " << command << std::endl;
		restart = true;
	} else {
		std::cerr << "Error writing to pipe: " << e.what() << std::endl;
		restart = true;
	}
	if (restart) {
		Close();
		// Reopen it after a few seconds
		alarm(RESTART_INTERVAL);
	}
}

ssize_t PipeProcessor::Write(const char *buffer, size_t size)
{
	if (!IsActive(config.GetCurrentTime())) {
		return size;
	}

	ssize_t bytesWritten = 0;

	try {
		bytesWritten = GetPipe().Write(buffer, size);
	} catch (libc_error & e) {
		bytesWritten = 0;
		HandleError(e, size);
	}
	return bytesWritten;
}

void PipeProcessor::FixIfBroken()
{
	if (!child) {
		Open();
		if (!child) {
			std::cerr << "Unable to restart pipe: " << command << std::endl;
			// Try again later
			alarm(RESTART_INTERVAL);
		} else {
			std::cerr << "Pipe restarted: " << command << std::endl;
		}
	}
}

void PipeProcessor::Close()
{
	if (child) {
		int status = 0;
		// Send HUP signal
		GetPipe().Close();
		// Wait for it to respond
		waitpid(child, &status, 0);
		child = 0;
	}
}

void PipeProcessor::Open()
{
	if (child) {
		throw std::runtime_error("PipeProcessor::Open called but the pipe is already open");
	}
	pipes = PipePairPointer(new PipePair);
	child = fork();
	if (!child) {
		// This is the child process
		prctl(PR_SET_PDEATHSIG, SIGTERM, 0, 0, 0);
		pipes->writeEnd.Close();
		pipes->readEnd.Dup2(STDIN_FILENO);
		pipes->readEnd.Close();
		
		// Run the command, similar to how popen() does it
		std::string fullCommand = std::string("exec ") + command;
		execl("/bin/sh", "sh", "-c", fullCommand.c_str(), NULL);
		throw libc_error("PipeProcessor::Open");
	}

	if (child == -1) {
		// Fork failed
		child = 0;
		throw libc_error("PipeProcessor::Open");
	}
	
	// This is the parent process
	pipes->readEnd.Close();
	pipes->writeEnd.SetDescriptorFlags(FD_CLOEXEC);
	if (!blocking) {
		pipes->writeEnd.SetStatusFlags(O_NONBLOCK);
	}
}

ssize_t PipeProcessor::CopyFromPipe(Pipe & source, size_t size)
{
	if (!IsActive(config.GetCurrentTime())) {
		return size;
	}

	ssize_t bytesWritten = 0;
	int flags = 0;
	if (!blocking) {
		flags |= SPLICE_F_NONBLOCK;
	}
	try {
		bytesWritten = source.Tee(GetPipe(), size, flags);
	} catch (libc_error & e) {
		bytesWritten = 0;
		HandleError(e, size);
	}
	IncrementBytesLost(size - bytesWritten);
	return bytesWritten;
}



