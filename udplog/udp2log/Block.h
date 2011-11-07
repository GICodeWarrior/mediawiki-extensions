#ifndef UDPLOG_BLOCK_H
#define UDPLOG_BLOCK_H

#include <stdexcept>
#include <boost/pool/pool.hpp>
#include <boost/pool/object_pool.hpp>

class BlockPool;
class BlockMemory;

class Block {
public:
	// Can't put the function definition here because BlockMemory is incomplete
	inline Block(BlockMemory * mem_);
	inline Block(const Block & b);
	inline ~Block();
	inline void Destroy();
	inline Block & operator=(const Block & b);

	// Return a new block pointing to the same memory, which is a substring of
	// *this, with a start position offset by the specified amount relative to
	// the start position of *this. 
	inline Block Offset(size_t newOffset) const;

	inline char * GetData();
	inline const char * GetData() const;
	inline size_t GetCapacity() const;
	inline size_t GetSize() const;
	inline void Append(const char * appendData, size_t appendSize);

	BlockMemory * mem;
	size_t offset;
	size_t size;
};

class BlockMemory {
public:
	inline BlockMemory(BlockPool * pool_, char * data_, size_t size_);
	inline ~BlockMemory();
	inline Block GetReference();

	BlockPool * pool;
	char * data;
	size_t size;
	volatile int numRefs;
};


class BlockPool {
public:

	BlockPool(size_t blockSize_)
		: dataPool(blockSize_), blockSize(blockSize_), emptyBlock(New())
	{}

	Block New() {
		char * data = (char*)dataPool.malloc();
		if (!data) {
			throw std::bad_alloc();
		}
		BlockMemory * mem = objectPool.construct(this, data, blockSize);
		if (!mem) {
			throw std::bad_alloc();
		}
		return mem->GetReference();
	}

	Block GetEmptyBlock() {
		return emptyBlock;
	}

	void DeleteMemory(BlockMemory * mem) {
		objectPool.destroy(mem);
	}

	void DeleteData(char * data) {
		dataPool.free(data);
	}

protected:
	boost::pool<> dataPool;
	boost::object_pool<BlockMemory> objectPool;
	size_t blockSize;
	Block emptyBlock;
};

//-----------------------------------------------------------------------------
// Block
//-----------------------------------------------------------------------------

Block::Block(BlockMemory * mem_)
	: mem(mem_), offset(0), size(0)
{
	mem->numRefs++;
}

Block::Block(const Block & b)
	: mem(b.mem), offset(b.offset), size(b.size)
{
	mem->numRefs++;
}

Block::~Block() {
	Destroy();
}

void Block::Destroy() {
	mem->numRefs--;
	if (mem->numRefs <= 0) {
		mem->pool->DeleteMemory(mem);
		mem = NULL;
	}
}

Block & Block::operator=(const Block & b) {
	Destroy();
	mem = b.mem;
	offset = b.offset;
	size = b.size;
	mem->numRefs++;
	return *this;
}

Block Block::Offset(size_t newOffset) const {
	if (newOffset > size) {
		throw std::runtime_error("Block::Offset buffer overrun");
	}
	Block b(*this);
	b.offset += newOffset;
	b.size -= newOffset;
	return b;
}

char * Block::GetData() {
	return mem->data + offset;
}

const char * Block::GetData() const {
	return mem->data + offset;
}

size_t Block::GetCapacity() const {
	if (offset > mem->size) {
		return 0;
	} else {
		return mem->size - offset;
	}
}

size_t Block::GetSize() const {
	return size;
}

void Block::Append(const char * appendData, size_t appendSize) {
	if (GetCapacity() < size + appendSize) {
		throw std::runtime_error("Block::Append buffer overrun");
	}
	memcpy(GetData() + size, appendData, appendSize);
	size += appendSize;
}

//-----------------------------------------------------------------------------
// BlockMemory
//-----------------------------------------------------------------------------
BlockMemory::BlockMemory(BlockPool * pool_, char * data_, size_t size_)
	: pool(pool_), data(data_), size(size_), numRefs(0)
{}

BlockMemory::~BlockMemory() {
	pool->DeleteData(data);
	data = NULL;
}

Block BlockMemory::GetReference() {
	return Block(this);
}

#endif
