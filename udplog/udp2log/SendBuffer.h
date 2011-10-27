#ifndef UDPLOG_SENDBUFFER_H
#define UDPLOG_SENDBUFFER_H

template <class Callback>
class SendBuffer {
public:
	SendBuffer(size_t capacity_, Callback writeCallback_)
		: capacity(capacity_), size(0), writeCallback(writeCallback_)
	{
		data = new char[capacity];
	}

	void Flush() {
		if (!size) {
			return;
		}
		writeCallback(data, size);
		size = 0;
	}

	void Write(const char* buffer, size_t bufSize);
protected:
	char * data;
	size_t capacity, size;
	Callback writeCallback;
};

template <class Callback>
void SendBuffer<Callback>::Write(const char* buffer, size_t bufSize)
{
	if (bufSize > capacity) {
		Flush();
		writeCallback(buffer, bufSize);
	} else if (size + bufSize > capacity) {
		Flush();
		memcpy(data, buffer, bufSize);
		size = bufSize;
	} else {
		memcpy(data + size, buffer, bufSize);
		size += bufSize;
	}
}
#endif
