#ifndef UDPLOG_POSIXFILE_H
#define UDPLOG_POSIXFILE_H

class PosixFile : public FileDescriptor
{
public:
	PosixFile(const char* pathname, int flags, int mode = 0) {
		fd = open(pathname, flags, mode);
		if (fd == -1) {
			RaiseError("PosixFile constructor");
		} else {
			good = true;
		}
	}
};

#endif
