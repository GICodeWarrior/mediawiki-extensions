#include <fstream>
#include <cstring>
#include <sstream>
#include <time.h>
#include <cmath>

#include "Udp2LogConfig.h"

PosixFile Udp2LogConfig::devNull("/dev/null", O_WRONLY);

// UpdateCounters() should be called once every period of this length
const double Udp2LogConfig::UPDATE_PERIOD = 1;

// The packet rate counter uses an exponentially-weighted moving average filter.
// This is the number of seconds corresponding to half of the contribution to 
// the result.
const double Udp2LogConfig::RATE_PERIOD = 60;

// Minimum percentage loss in a pipe before it can be considered to be a 
// measure of pipe capacity. Low loss implies that the maximum rate is 
// unknown, not that it equals the input rate.
const double Udp2LogConfig::MIN_LOSS_RATIO = 0.05;

// Minimum time a pipe can be put on holiday. This is used when a reliable 
// estimate of the pipe capacity is not available.
const PosixClock::Time Udp2LogConfig::MIN_HOLIDAY_TIME(100e-6);

// Maximum time a pipe can be put on holiday. The point of holiday is to avoid 
// regular backlog write operations, which adversely affect the global 
// throughput due to high CPU overhead. This rationale only makes sense as long
// as the holiday time is only a few times higher than the write overhead.
const PosixClock::Time Udp2LogConfig::MAX_HOLIDAY_TIME(1e-3);

// The maximum input block size. On Linux 2.6.11 and later, this can be up 
// to 64KB. If it was more than 64KB, the temporary pipe buffer used for 
// tee() operations would overflow. In Linux 2.6.35 and later, 
// fcntl(F_SETPIPE_SZ) can be used to set the size of the temporary pipe 
// buffer, but currently we're not deploying to that version of Linux, so
// it's unimplemented.
const size_t Udp2LogConfig::BLOCK_SIZE = 65536;

Udp2LogConfig::Udp2LogConfig() 
	: reload(false), 
	pool(BLOCK_SIZE),
	packetRate(UPDATE_PERIOD, RATE_PERIOD),
	processRate(UPDATE_PERIOD, RATE_PERIOD),
	currentTimeValid(false),
	clock(CLOCK_REALTIME),
	numPipeProcessors(0),
	lineIndex(0)
{
	// Make the buffer pipe non-blocking
	// Throwing an exception and aborting is better than hanging forever
	bufferPipe.writeEnd.SetStatusFlags(O_NONBLOCK);
	bufferPipe.readEnd.SetStatusFlags(O_NONBLOCK);
}

void Udp2LogConfig::Open(const std::string & name)
{
	fileName = name;
	Load();
}

void Udp2LogConfig::Load()
{
	using namespace std;
	const streamsize maxLineSize = 65536;
	char line[maxLineSize];
	char * type;
	char * params;
	ProcessorArray newProcessors;

	ifstream f(fileName.c_str());
	if (!f.good()) {
		throw runtime_error("Unable to open config file");
	}

	int lineNum = 1;
	int index = 0;
	try {
		// Parse all lines
		for (f.getline(line, maxLineSize); f.good(); f.getline(line, maxLineSize), lineNum++) {
			if (line[0] == '#') {
				continue;
			}
			type = strtok(line, " \t");
			if (!type) {
				continue;
			}

			params = strtok(NULL, "");
			ProcessorPointer processor;
			bool flush = false, blocking = false;

			if (!strcmp(type, "flush")) {
				flush = true;
				type = strtok(params, " \t");
				params = strtok(NULL, "");
			}
			if (!strcmp(type, "blocking")) {
				blocking = true;
				type = strtok(params, " \t");
				params = strtok(NULL, "");
			}

			if (!strcmp(type, "file")) {
				// TODO: support blocking for FileProcessor
				processor = FileProcessor::NewFromConfig(*this, index++, params, flush);
			} else if (!strcmp(type, "pipe")) {
				processor = PipeProcessor::NewFromConfig(*this, index++, params, flush, blocking);
			} else {
				throw ConfigError("Unrecognised log type");
			}

			if (processor) {
				newProcessors.push_back(processor);
			}
		}

		// Make a new epoll instance, deleting the old one
		epoll = MyEpollPointer(new MyEpoll);

		// Swap in the new configuration
		// The old configuration will go out of scope, closing files and pipes
		processors.swap(newProcessors);
		
	} catch (ConfigError & e) {
		stringstream s;
		s << "Error in configuration file on line " << lineNum << ": " << e.what();
		throw runtime_error(s.str().c_str());
	}

	// Initialise epoll and processorsByFactor
	processorsByFactor.clear();
	numPipeProcessors = 0;
	for (unsigned i = 0; i < processors.size(); i++) {
		ProcessorPointer p = processors[i];
		if (p->IsUnsampledPipe()) {
			AddUnsampledPipe(p);
		}
		processorsByFactor[p->GetFactor()].push_back(i);
	}

	epollEvents.resize(processors.size());
}

void Udp2LogConfig::AddUnsampledPipe(ProcessorPointer lp) {
	boost::shared_ptr<PipeProcessor> p = 
		boost::dynamic_pointer_cast<PipeProcessor, LogProcessor>(lp);
	if (!p) {
		throw std::runtime_error(
			"Udp2LogConfig::AddUnsampledPipe: only works on PipeProcessor for now");
	}
	epoll->AddPoll(p->GetPipe(), EPOLLOUT, p);
	numPipeProcessors++;
}

void Udp2LogConfig::FixBrokenProcessors()
{
	for (ProcessorIterator i = processors.begin(); i != processors.end(); i++) {
		(**i).FixIfBroken();
	}
}

void Udp2LogConfig::Reload() 
{
	if (reload) {
		Load();
		reload = false;
		fixBrokenProcessors = false;
	} else if (fixBrokenProcessors) {
		FixBrokenProcessors();
		fixBrokenProcessors = false;
	}
}

void Udp2LogConfig::ProcessBlock(const Block & block)
{
	ResetCurrentTime();
	PosixClock::Time currentTime = GetCurrentTime();
	
	// Handle any pending backlog buffers, from previous failed operations
	HandleBacklogs();

	// Do an epoll to make sure all pipes are ready for input
	// If any aren't ready, put them on holiday
	CheckReadiness();

	// Identify the pipes that can be written to with tee()
	ProcessorIterator iter;
	teePipes.assign(processors.size(), false);

	int numPipes = 0;
	for (iter = processors.begin(); iter != processors.end(); iter++) {
		if ((**iter).IsUnsampledPipe() && (**iter).IsActive(currentTime)) {
			teePipes.at(iter - processors.begin()) = true;
			numPipes++;
		}
	}

	// Handle the tee writes if there are enough to make it worthwhile
	bool teeDone = false;
	if (numPipes >= 2) {
		HandleTeePipes(block);
		teeDone = true;
	}

	// For the sampled processors, split the buffer into lines
	const char *line1, *line2;
	ssize_t bytesRemaining;

	line1 = block.GetData();
	bytesRemaining = block.GetSize();
	while (bytesRemaining) {
		size_t lineLength;

		// Find the next line break
		line2 = (char*)memchr(line1, '\n', bytesRemaining);
		if (line2) {
			// advance line2 to the start of the next line
			line2++;
			lineLength = line2 - line1;
		} else {
			// no more lines, process the remainder of the buffer
			lineLength = bytesRemaining;
		}

		for (ByFactorIterator bfi = processorsByFactor.begin(); 
				bfi != processorsByFactor.end(); bfi++)
		{
			if (lineIndex % bfi->first != 0) {
				continue;
			}
			for (std::vector<int>::iterator bfi2 = bfi->second.begin(); 
					bfi2 != bfi->second.end(); bfi2++) 
			{
				if (teeDone && teePipes.at(*bfi2)) {
					continue;
				}
				LogProcessor & p = *processors[*bfi2];
				ssize_t bytesWritten = p.Write(line1, lineLength);
				if (bytesWritten != (ssize_t)lineLength) {
					// Partial write done
					// Make a backlog entry
					Block block = pool.New();
					block.Append(line1 + bytesWritten, lineLength - bytesWritten);
					p.SetBacklog(block);
					PutOnHoliday(*processors[*bfi2]);
				}
			}
		}

		bytesRemaining -= lineLength;
		line1 = line2;
		lineIndex++;
	}
}

void Udp2LogConfig::HandleBacklogs() {
	for (ProcessorIterator iter = processors.begin(); iter != processors.end(); iter++) {
		if (!(**iter).IsBacklogged()) {
			continue;
		}
		Block & backlogBlock = (**iter).GetBacklogBlock();
		ssize_t bytesWritten = (**iter).Write(backlogBlock.GetData(), backlogBlock.GetSize());
		if (bytesWritten == (ssize_t)backlogBlock.GetSize()) {
			(**iter).ClearBacklog();
		} else {
			PutOnHoliday(**iter);
			if (bytesWritten != 0) {
				(**iter).SetBacklog(backlogBlock.Offset(bytesWritten));
			}
		}
	}
}

void Udp2LogConfig::CheckReadiness() {
	epoll->EpollWait(&epollEvents, 0);
	if (epollEvents.size() != numPipeProcessors) {
		readyPipes.assign(numPipeProcessors, false);
		for (MyEventsIterator iter = epollEvents.begin(); iter != epollEvents.end(); iter++) {
			if (iter->first & EPOLLOUT) {
				readyPipes.at(iter->second->GetProcessorIndex()) = true;
			}
		}

		std::vector<bool>::iterator bi = readyPipes.begin();
		//std::cout << "Check readiness\n";
		while (readyPipes.end() != (bi = find(bi, readyPipes.end(), false))) {
			//std::cout << "Not ready: " << bi - readyPipes.begin() << "\n";
			PutOnHoliday(*processors.at(bi - readyPipes.begin()));
			bi++;
		}
	}
}

void Udp2LogConfig::HandleTeePipes(const Block & block) {
	// Efficiently send the packet to the unsampled pipes.
	// First load the data into a pipe buffer.
	bufferPipe.writeEnd.Write(block.GetData(), block.GetSize());
	
	// Now send it out to all unsampled pipes using the zero-copy tee() syscall.
	for (ProcessorIterator iter = processors.begin(); iter != processors.end(); iter++) {
		if (!teePipes.at(iter - processors.begin())) {
			continue;
		}
		PipeProcessor * p = dynamic_cast<PipeProcessor*>(iter->get());
		ssize_t bytesWritten = p->CopyFromPipe(bufferPipe.readEnd, block.GetSize());
		if (bytesWritten != (ssize_t)block.GetSize()) {
			//std::cout << "Processor[" << (iter - processors.begin()) << "]: teed " <<
			//	bytesWritten << "/" << (ssize_t)block.GetSize() << "\n";
			// Partial write done, make a backlog entry and put the 
			// processor on an input holiday as punishment
			p->SetBacklog(block.Offset(bytesWritten));
			PutOnHoliday(**iter);
		}
	}

	// Finally flush the pipe buffer by splicing it out to /dev/null
	bufferPipe.readEnd.Splice(Udp2LogConfig::devNull, block.GetSize(), 0);
}

void Udp2LogConfig::PutOnHoliday(LogProcessor & p)
{
	PosixClock::Time endTime = GetCurrentTime();
	int lossRate = p.GetLossRate();
	int inputRate = GetProcessRate();
	int writeRate = inputRate - lossRate;
	
	PosixClock::Time interval;

	if (inputRate * MIN_LOSS_RATIO < lossRate) {
		interval = MIN_HOLIDAY_TIME;
	} else {
		interval = PosixClock::Time((double)BLOCK_SIZE / writeRate);
		if (interval > MAX_HOLIDAY_TIME) {
			interval = MAX_HOLIDAY_TIME;
		} else if (interval < MIN_HOLIDAY_TIME) {
			interval = MIN_HOLIDAY_TIME;
		}
	}

	endTime += interval;
	p.SetHoliday(endTime);
	//std::cout << "Putting processor on holiday for " << (double)interval << " seconds: " <<
	//	p.GetProcessorIndex() << "\n";
}

void Udp2LogConfig::UpdateCounters()
{
	packetRate.Update();
	processRate.Update();
	for (ProcessorIterator iter = processors.begin(); iter != processors.end(); iter++) {
		(**iter).UpdateLossRate();
	}
}

void Udp2LogConfig::PrintStatusReport(std::ostream & os)
{
	time_t unixTime = time(NULL);
	char timeBuf[30];
	struct tm * tm = localtime(&unixTime);
	strftime(timeBuf, sizeof(timeBuf), "%F %T UTC%z", tm);
	
	ProcessorIterator iter;
	for (iter = processors.begin(); iter != processors.end(); iter++) {
		uint64_t lost = (**iter).GetBytesLost();
		if (lost) {
			os << "[" << timeBuf << "] Lost output bytes: " << lost << ": " << 
				(**iter).GetName() << "\n";
			(**iter).ResetBytesLost();
		}
	}

	os.precision(3);
	os.flags(std::ios::fixed);
	os << "[" << timeBuf << "] Packet rate: " << ((double)GetPacketRate() / 1000) << " k/s\n";
}


