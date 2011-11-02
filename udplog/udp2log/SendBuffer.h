#ifndef UDPLOG_SENDBUFFER_H
#define UDPLOG_SENDBUFFER_H

template <class Callback>
class SendBuffer {
public:
	SendBuffer(BlockPool & pool_, size_t capacity_, Callback writeCallback_)
		: pool(pool_), block(pool.New()), capacity(capacity_), writeCallback(writeCallback_)
	{}

	void Flush() {
		if (!block.GetSize()) {
			return;
		}
		writeCallback(block);
		block = pool.New();
	}

	void Write(const char* buffer, size_t bufSize);
protected:
	BlockPool & pool;
	Block block;
	size_t capacity;
	Callback writeCallback;
};

template <class Callback>
void SendBuffer<Callback>::Write(const char* buffer, size_t bufSize)
{
	if (bufSize > capacity) {
		// Truncate oversize writes
		bufSize = capacity;
	}

	if (block.GetSize() + bufSize > capacity) {
		Flush();
	}
	block.Append(buffer, bufSize);
}
#endif
