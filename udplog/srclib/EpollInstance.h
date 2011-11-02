#ifndef UDPLOG_EPOLL_H
#define UDPLOG_EPOLL_H

#include "FileDescriptor.h"
#include <sys/epoll.h>
#include <boost/shared_ptr.hpp>

class EpollInstance : public FileDescriptor
{
public:
	typedef std::vector<struct epoll_event> EventArray;

	EpollInstance(int flags = 0)
		: FileDescriptor()
	{
		fd = epoll_create1(flags);
		if (fd == -1) {
			good = false;
			RaiseError("EpollInstance constructor");
		} else {
			good = true;
		}
	}

	// epoll_ctl(EPOLL_CTL_ADD) wrapper
	int AddPoll(const FileDescriptor & polled, struct epoll_event & event) {
		if (epoll_ctl(fd, EPOLL_CTL_ADD, polled.GetFD(), &event) == -1) {
			RaiseError("EpollInstance::AddPoll");
			return errno;
		} else {
			return 0;
		}
	}

	// epoll_ctl(EPOLL_CTL_MOD) wrapper
	int ModifyPoll(const FileDescriptor & polled, struct epoll_event & event) {
		if (epoll_ctl(fd, EPOLL_CTL_MOD, polled.GetFD(), &event) == -1) {
			RaiseError("EpollInstance::ModifyPoll");
			return errno;
		} else {
			return 0;
		}
	}

	// epoll_ctl(EPOLL_CTL_DEL) wrapper
	int DeletePoll(const FileDescriptor & polled) {
		static struct epoll_event dummy;

		if (epoll_ctl(fd, EPOLL_CTL_DEL, polled.GetFD(), &dummy) == -1) {
			RaiseError("EpollInstance::DeletePoll");
			return errno;
		} else {
			return 0;
		}
	}

	enum {DEFAULT_WAIT_SIZE = 10};

	// epoll_wait() wrapper
	int EpollWait(EventArray * events, int timeout) {
		if (!events->size()) {
			events->resize(DEFAULT_WAIT_SIZE);
		}
		int result = epoll_wait(fd, &((*events)[0]), events->size(), timeout);
		if (result == -1) {
			events->resize(0);
			RaiseError("EpollInstance::EpollWait");
		} else {
			events->resize(result);
		}
		return result;
	}

	// epoll_pwait() wrapper
	int EpollSignalWait(EventArray * events, 
			int timeout, const sigset_t & sigmask) {
		if (!events->size()) {
			events->resize(DEFAULT_WAIT_SIZE);
		}
		int result = epoll_pwait(fd, &((*events)[0]), events->size(), timeout, &sigmask);
		if (result == -1) {
			events->resize(0);
			RaiseError("EpollInstance::EpollSignalWait");
		} else {
			events->resize(result);
		}
		return result;
	}

};

#endif
