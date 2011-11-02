#ifndef UDPLOG_PIPE_H
#define UDPLOG_PIPE_H

#ifndef _GNU_SOURCE
#define _GNU_SOURCE
#endif
#include <fcntl.h>

#include "FileDescriptor.h"

class Pipe : public FileDescriptor
{
public:
	friend class PipePair;

	ssize_t Tee(Pipe & output, size_t length, unsigned int flags)
	{
		ssize_t result = tee(fd, output.fd, length, flags);
		if (result == -1) {
			RaiseError("Pipe::Tee");
		}
		return result;
	}

	ssize_t Splice(FileDescriptor & output, size_t length, unsigned int flags)
	{
		ssize_t result = splice(fd, NULL, output.GetFD(), NULL, length, flags);
		if (result == -1) {
			RaiseError("Pipe::Splice");
		}
		return result;
	}
};

class PipePair
{
public:

	PipePair()
	{
		int pipefd[2];

		if (pipe(pipefd) == -1) {
			readEnd.RaiseError("PipePair constructor");
			good = false;
		} else {
			good = true;
			readEnd.fd = pipefd[0];
			writeEnd.fd = pipefd[1];
			readEnd.good = true;
			writeEnd.good = true;
		}
	}

	operator bool() {
		return good;
	}

	Pipe readEnd, writeEnd;
protected:
	bool good;
};


#endif
