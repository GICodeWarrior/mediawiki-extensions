#ifndef UDPLOG_FILEDESCRIPTOR_H
#define UDPLOG_FILEDESCRIPTOR_H

#include <set>
#include <vector>
#include <cerrno>
#include <boost/shared_ptr.hpp>
#include <unistd.h>
#include <fcntl.h>

class Socket;

class FileDescriptor
{
private:
	// Not copyable
	FileDescriptor(const Socket & s) {}

protected:
	FileDescriptor()
		: fd(-1), good(false), ownFd(true)
	{}
public:
	
	virtual ~FileDescriptor() {
		Close();
	}

	operator bool() {
		return good;
	}

	int GetFD() const {
		return fd;
	}

	// close() wrapper
	int Close() {
		int status = 0;
		if (fd != -1 && ownFd) {
			status = close(fd);
			fd = -1;
			good = false;
			if (status == -1) {
				RaiseError("FileDescriptor::Close");
			}
		}
		return status;
	}

	// read() wrapper
	int Read(void *buf, size_t len) {
		ssize_t length = read(fd, buf, len);
		if (length == (ssize_t)-1) {
			RaiseError("FileDescriptor::Read");
		}
		return length;
	}

	// write() wrapper
	int Write(const void *buf, size_t len) {
		ssize_t length = write(fd, buf, len);
		if (length == (ssize_t)-1) {
			RaiseError("FileDescriptor::Write");
		}
		return length;
	}

	// fcntl(F_SETFD) wrapper
	int SetDescriptorFlags(long flags) {
		int status = fcntl(fd, F_SETFD, flags);
		if (status == -1) {
			RaiseError("FileDescriptor::SetDescriptorFlags");
		}
		return status;
	}

	// fcntl(F_GETFD) wrapper
	long GetDescriptorFlags() {
		int flags = fcntl(fd, F_GETFD);
		if (flags == -1) {
			RaiseError("FileDescriptor::GetDescriptorFlags");
		}
		return flags;
	}

	// fcntl(F_SETFL) wrapper
	int SetStatusFlags(long flags) {
		int status = fcntl(fd, F_SETFL, flags);
		if (status == -1) {
			RaiseError("FileDescriptor::SetStatusFlags");
		}
		return status;
	}

	// fcntl(F_GETFL) wrapper
	long GetStatusFlags() {
		int flags = fcntl(fd, F_GETFL);
		if (flags == -1) {
			RaiseError("FileDescriptor::GetStatusFlags");
		}
		return flags;
	}

	int Dup2(int newfd) {
		int status = dup2(fd, newfd);
		if (status == -1) {
			RaiseError("FileDescriptor::Dup2");
		}
		return status;
	}

	// Ignore a given set of errors
	void Ignore(boost::shared_ptr<std::set<int> > s) {
		ignoreErrors.push_back(s);
	}
		
	// Ignore all errors
	void IgnoreAll() {
		ignoreErrors.push_back(boost::shared_ptr<std::set<int> >((std::set<int>*)NULL));
	}
		
	// Restore the previous ignore set
	void PopIgnore() {
		ignoreErrors.pop_back();
	}

	void RaiseError(const char* msg);

protected:
	int fd;
	bool good;
	bool ownFd;
	std::vector<boost::shared_ptr<std::set<int> > > ignoreErrors;
};
#endif
