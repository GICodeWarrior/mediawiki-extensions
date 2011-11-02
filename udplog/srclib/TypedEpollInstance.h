#ifndef UDPLOG_TYPEDEPOLLINSTANCE_H
#define UDPLOG_TYPEDEPOLLINSTANCE_H

#include "EpollInstance.h"
#include <map>
#include <boost/shared_ptr.hpp>

// An epoll wrapper where the user data is a smart pointer of the specified type.
//
// A smart pointer reference to the data object will be held until the
// relevant FD is removed from the poll set.
//
// Note that if you close an FD without calling DeletePoll(), events may
// be delivered with with the wrong data pointer.

template <class DataType>
class TypedEpollInstance : public EpollInstance
{
public:
	typedef boost::shared_ptr<DataType> DataPointer;
	typedef std::vector<std::pair<uint32_t, DataPointer> > TypedEventArray;

	int AddPoll(const FileDescriptor & polled, uint32_t events, DataPointer data);
	int ModifyPoll(const FileDescriptor & polled, uint32_t events, DataPointer data);
	int DeletePoll(const FileDescriptor & polled);
	int EpollWait(TypedEventArray * events, int timeout);
	int EpollSignalWait(TypedEventArray * events, int timeout, const sigset_t & sigmask);
protected:
	void EpollSetup(TypedEventArray * events);
	void EpollFinish(TypedEventArray * events);

	typedef std::map<int, DataPointer> DataPointerMap;

	DataPointerMap pointers;
	EventArray rawEvents;
};

template <class DataType>
int
TypedEpollInstance<DataType>::AddPoll(
		const FileDescriptor & polled, uint32_t events, DataPointer data)
{
	struct epoll_event epe;
	epe.events = events;
	epe.data.fd = polled.GetFD();
	pointers[polled.GetFD()] = data;
	return EpollInstance::AddPoll(polled, epe);
}

template <class DataType>
int
TypedEpollInstance<DataType>::ModifyPoll(
		const FileDescriptor & polled, uint32_t events, DataPointer data)
{
	struct epoll_event epe;
	epe.events = events;
	epe.data.fd = polled.GetFD();
	pointers[polled.GetFD()] = data;
	return EpollInstance::ModifyPoll(polled, epe);
}

template <class DataType>
int
TypedEpollInstance<DataType>::DeletePoll(const FileDescriptor & polled)
{
	pointers.erase(polled.GetFD());
	return EpollInstance::DeletePoll(polled);
}

template <class DataType>
void
TypedEpollInstance<DataType>::EpollSetup(TypedEventArray * events)
{
	if (!events->size()) {
		rawEvents.resize(DEFAULT_WAIT_SIZE);
	} else {
		rawEvents.resize(events->size());
	}
}

template <class DataType>
void
TypedEpollInstance<DataType>::EpollFinish(TypedEventArray * events)
{
	events->resize(rawEvents.size());
	for (unsigned i = 0; i < rawEvents.size(); i++) {
		(*events)[i].first = rawEvents[i].events;
		(*events)[i].second = pointers[rawEvents[i].data.fd];
	}
}

template <class DataType>
int
TypedEpollInstance<DataType>::EpollWait(TypedEventArray * events, int timeout)
{
	EpollSetup(events);
	int result = EpollInstance::EpollWait(&rawEvents, timeout);
	EpollFinish(events);
	return result;
}

template <class DataType>
int
TypedEpollInstance<DataType>::EpollSignalWait(TypedEventArray * events, int timeout, 
		const sigset_t & sigmask)
{
	EpollSetup(events);
	int result = EpollInstance::EpollSignalWait(&rawEvents, timeout, sigmask);
	EpollFinish(events);
	return result;
}

#endif
