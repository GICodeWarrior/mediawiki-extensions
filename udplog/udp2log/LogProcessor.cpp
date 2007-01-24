#include <stdio.h>
#include <iostream>
#include "LogProcessor.h"
#include "Udp2LogConfig.h"

//---------------------------------------------------------------------------
// FileProcessor
//---------------------------------------------------------------------------

LogProcessor * FileProcessor::NewFromConfig(char * params)
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
	FileProcessor * fp = new FileProcessor(filename, factor);
	if (!fp->IsOpen()) {
		delete fp;
		throw ConfigError("Unable to open file");
	}
	std::cerr << "Opened log file " << filename << " with sampling factor " << factor << std::endl;
	return (LogProcessor*)fp;
}

void FileProcessor::ProcessLine(char *buffer, size_t size)
{
	if (Sample()) {
		f.write(buffer, size);
		if (factor >= 10) {
			f.flush();
		}
	}
}

//---------------------------------------------------------------------------
// PipeProcessor
//---------------------------------------------------------------------------

LogProcessor * PipeProcessor::NewFromConfig(char * params)
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
	PipeProcessor * pp = new PipeProcessor(command, factor);
	if (!pp->IsOpen()) {
		delete pp;
		throw ConfigError("Unable to open pipe");
	}
	std::cerr << "Opened pipe with factor " << factor << ": " << command << std::endl;
	return (LogProcessor*)pp;
}

void PipeProcessor::ProcessLine(char *buffer, size_t size)
{
	if (!f) {
		return;
	}

	if (Sample()) {
		fwrite(buffer, 1, size, f);
		if (ferror(f)) {
			if (errno == EPIPE) {
				std::cerr << "Pipe terminated, suspending output." << std::endl;
			} else {
				std::cerr << "Error writing to pipe: " << strerror(errno) << std::endl;
			}
			pclose(f);
			f = NULL;
		} else {
			if (factor >= 10) {
				fflush(f);
			}
		}
	}
}

