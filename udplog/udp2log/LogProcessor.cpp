#include <stdio.h>
#include <iostream>
#include <unistd.h>
#include <linux/limits.h>
#include <sys/types.h>
#include <sys/wait.h>
#include "LogProcessor.h"
#include "Udp2LogConfig.h"

//---------------------------------------------------------------------------
// FileProcessor
//---------------------------------------------------------------------------

LogProcessor * FileProcessor::NewFromConfig(char * params, bool flush)
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
	FileProcessor * fp = new FileProcessor(filename, factor, flush);
	if (!fp->IsOpen()) {
		delete fp;
		throw ConfigError("Unable to open file");
	}
	std::cerr << "Opened log file " << filename << " with sampling factor " << factor << std::endl;
	return (LogProcessor*)fp;
}

void FileProcessor::ProcessLine(const char *buffer, size_t size)
{
	if (Sample()) {
		f.write(buffer, size);
		if (flush) {
			f.flush();
		}
	}
}

//---------------------------------------------------------------------------
// PipeProcessor
//---------------------------------------------------------------------------

PipeProcessor::PipeProcessor(char * command_, int factor_, bool flush_, bool blocking_)
	: LogProcessor(factor_, flush_), child(0), blocking(blocking_)
{
	command = command_;
	Open();
}

LogProcessor * PipeProcessor::NewFromConfig(char * params, bool flush, bool blocking)
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
	PipeProcessor * pp = new PipeProcessor(command, factor, flush, blocking);
	if (!pp->IsOpen()) {
		delete pp;
		throw ConfigError("Unable to open pipe");
	}
	std::cerr << "Opened pipe with factor " << factor << ": " << command << std::endl;
	return (LogProcessor*)pp;
}

void PipeProcessor::HandleError(libc_error & e)
{
	bool restart;
	if (e.code == EAGAIN) {
		numLost++;
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

void PipeProcessor::ProcessLine(const char *buffer, size_t size)
{
	if (!child) {
		return;
	}


	if (Sample()) {
		try {
			if (blocking && size > PIPE_BUF) {
				// Write large packets in blocking mode to preserve data integrity
				GetPipe().SetStatusFlags(0);
				GetPipe().Write(buffer, size);
				GetPipe().SetStatusFlags(O_NONBLOCK);
			} else {
				GetPipe().Write(buffer, size);
			}
		} catch (libc_error & e) {
			HandleError(e);
		}
	}
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
		waitpid(child, &status, 0);
		GetPipe().Close();
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

void PipeProcessor::CopyFromPipe(Pipe & source, size_t dataLength)
{
	if (!child) {
		return;
	}

	int flags = 0;
	if (!blocking) {
		flags |= SPLICE_F_NONBLOCK;
	}
	try {
		if (blocking && dataLength > PIPE_BUF) {
			// Write large packets in blocking mode to preserve data integrity
			GetPipe().SetStatusFlags(0);
			source.Tee(GetPipe(), dataLength, 0);
			GetPipe().SetStatusFlags(O_NONBLOCK);
		} else {
			source.Tee(GetPipe(), dataLength, flags);
		}
	} catch (libc_error & e) {
		HandleError(e);
	}
}

