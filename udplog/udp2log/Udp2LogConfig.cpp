#include <fstream>
#include <cstring>
#include <sstream>

#include "Udp2LogConfig.h"

PosixFile Udp2LogConfig::devNull("/dev/null", O_WRONLY);

Udp2LogConfig::Udp2LogConfig() 
	: reload(false)
{}

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
	boost::ptr_vector<LogProcessor> newProcessors;

	ifstream f(fileName.c_str());
	if (!f.good()) {
		throw runtime_error("Unable to open config file");
	}

	int lineNum = 1;
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
			LogProcessor * processor = NULL;
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
				processor = FileProcessor::NewFromConfig(params, flush);
			} else if (!strcmp(type, "pipe")) {
				processor = PipeProcessor::NewFromConfig(params, flush, blocking);
			} else {
				throw ConfigError("Unrecognised log type");
			}

			if (processor) {
				newProcessors.push_back(processor);
			}
		}

		// Swap in the new configuration
		// The old configuration will go out of scope, closing files and pipes
		processors.swap(newProcessors);
	} catch (ConfigError & e) {
		stringstream s;
		s << "Error in configuration file on line " << lineNum << ": " << e.what();
		throw runtime_error(s.str().c_str());
	}
}

void Udp2LogConfig::FixBrokenProcessors()
{
	boost::ptr_vector<LogProcessor>::iterator i;
	for (i = processors.begin(); i != processors.end(); i++) {
		i->FixIfBroken();
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

void Udp2LogConfig::ProcessBuffer(const char *data, size_t dataLength)
{
	boost::ptr_vector<LogProcessor>::iterator iter;
	int numPipes = 0;

	for (iter = processors.begin(); iter != processors.end(); iter++) {
		if (iter->IsUnsampledPipe() && iter->IsOpen()) {
			numPipes++;
		}
	}

	if (numPipes >= 2) {
		// Efficiently send the packet to the unsampled pipes.
		// First load the data into a pipe buffer.
		// It just so happens that the size of the pipe buffer is the same 
		// as the maximum size of a UDP packet, so this won't block.
		bufferPipe.writeEnd.Write(data, dataLength);
		
		// Now send it out to all unsampled pipes using the zero-copy tee() syscall.
		for (iter = processors.begin(); iter != processors.end(); iter++) {
			if (iter->IsUnsampledPipe() && iter->IsOpen()) {
				PipeProcessor & p = dynamic_cast<PipeProcessor&>(*iter);
				p.CopyFromPipe(bufferPipe.readEnd, dataLength);
			}
		}

		// Finally flush the pipe buffer by splicing it out to /dev/null
		bufferPipe.readEnd.Splice(Udp2LogConfig::devNull, dataLength, 0);
	}

	// For the sampled processors, split the buffer into lines
	const char *line1, *line2;
	ssize_t bytesRemaining;

	line1 = data;
	bytesRemaining = dataLength;
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

		for (iter = processors.begin(); iter != processors.end(); iter++) {
			if (numPipes >= 2 && iter->IsUnsampledPipe()) {
				continue;
			}

			iter->ProcessLine(line1, lineLength);
		}
		bytesRemaining -= lineLength;
		line1 = line2;
	}
}

void Udp2LogConfig::PrintLossReport(std::ostream & os)
{
	boost::ptr_vector<LogProcessor>::iterator iter;
	for (iter = processors.begin(); iter != processors.end(); iter++) {
		uint64_t lost = iter->GetNumLost();
		if (lost) {
			os << "Lost output chunks: " << lost << ": " << iter->GetName() << "\n";
		}
	}
}
