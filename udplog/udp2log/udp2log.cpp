// UDP -> stdout receiver

#include <cstdio>
#include <iostream>
#include <fstream>
#include <boost/program_options.hpp>
#include <string>
#include <boost/shared_ptr.hpp>
#include <signal.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <pwd.h>
#include <cstdlib>
#include <functional>

#include "../srclib/Exception.h"
#include "../srclib/Socket.h"
#include "Udp2LogConfig.h"
#include "SendBuffer.h"
#include "../srclib/EpollInstance.h"

std::string configFileName("/etc/udp2log");
std::string logFileName("/var/log/udp2log/udp2log.log");
std::string pidFileName("/var/run/udp2log.pid");
std::string daemonUserName("udp2log");
std::string multicastAddr("0");
int udpReceiveQueue = 128; // KB
int reportIntervalSeconds = 300;

Udp2LogConfig config;

void OnHangup(int)
{
	config.reload = true;
}

void OnAlarm(int)
{
	config.fixBrokenProcessors = true;
}

pid_t Daemonize()
{
	// Open PID file as root
	std::ofstream pidFile(pidFileName.c_str());
	if (!pidFile.good()) {
		throw libc_error("Error opening PID file");
	}

	// Fetch details of new user
	struct passwd * userData = getpwnam(daemonUserName.c_str());
	if (!userData) {
		throw std::runtime_error(
			std::string("No such user: ") + daemonUserName);
	}

	// Change user
	if (setgid(userData->pw_gid) == -1
			|| setuid(userData->pw_uid) == -1)
	{
		throw libc_error("Error changing user ID");
	}

	// Open files for new standard file handles
	int logFd = open(logFileName.c_str(), O_WRONLY | O_CREAT | O_APPEND, 0666);
	if (logFd == -1) {
		throw libc_error("Error opening log file");
	}
	int nullFd = open("/dev/null", O_WRONLY);
	if (nullFd == -1) {
		throw libc_error("Error opening /dev/null");
	}

	// Fork
	pid_t pid = fork();
	if (pid == -1) {
		throw libc_error("Error creating new process");
	} else if (pid) {
		// This is the parent process
		// Write PID file
		pidFile << pid << std::endl;
		return pid;
	}

	// Redirect standard file handles
	dup2(nullFd, STDIN_FILENO);
	dup2(logFd, STDOUT_FILENO);
	dup2(logFd, STDERR_FILENO);
	
	close(nullFd);
	close(logFd);

	// Set session
	setsid();

	// Change directory
	if (chdir("/") == -1) {
		throw libc_error("Error changing directory");
	}
	return 0;
}

void MakeAbsolutePath(std::string & path) {
	if (path.size() && path[0] != '/' ) {
		char * cwd = getcwd(NULL, 0);
		if (cwd) {
			path = std::string(cwd) + "/" + path;
			free(cwd);
		}
	}
}

int main(int argc, char** argv)
{
	using namespace std;
	using namespace boost::program_options;
	unsigned int port = 8420;
	bool daemon = false;

	// Process command line
	options_description optDesc;
	optDesc.add_options()
		("help", 
		 	"Show help message.")
		("port,p", value<unsigned int>(&port), 
		 	"UDP port.")
		("config-file,f", value<string>(&configFileName), 
		 	"Config file location.")
		("daemon", "Run as a background process.")
		("log-file", value<string>(&logFileName),
		 	"The log file, for internal udp2log messages. Used only if --daemon is specified.")
		("pid-file", value<string>(&pidFileName),
		 	"The location to write the new PID, if --daemon is specified.")
		("user", value<string>(&daemonUserName),
		 	"User to switch to, after daemonizing")
		("multicast", value<string>(&multicastAddr), 
		 	"Multicast address to listen to")
		("recv-queue", value<int>(&udpReceiveQueue),
		 	"The size of the kernel UDP receive buffer, in KB")
		("report-interval", value<int>(&reportIntervalSeconds),
		 	"Show a status report once every this many number of seconds");

	variables_map vm;
	try {
		store(command_line_parser(argc, argv).options(optDesc).run(), vm);
		notify(vm);   
	} catch (exception & e) {
		cerr << e.what() << endl;
		cerr << "Usage: " << argv[0] << " [..options..]\nOptions:\n" << optDesc;
		return 1;
	}
	if (vm.count("help")) {
		cerr << optDesc << "\n";
		return 1;
	}
	if (port > 65535) {
		cerr << "Invalid port number \"" << argv[2] << "\"\n";
		return 1;
	}
	if (vm.count("daemon")) {
		daemon = true;
	}

	// Guard against chdir("/")
	MakeAbsolutePath(configFileName);
	MakeAbsolutePath(logFileName);
	MakeAbsolutePath(pidFileName);
	
	// Fork
	if (daemon) {
		try {
			if (Daemonize()) {
				return 0;
			}
		} catch (runtime_error & e) {
			cerr << e.what() << endl;
			return 1;
		}
	}

	// Read configuration and open log files and pipes
	try {
		config.Open(configFileName);
	} catch (runtime_error & e) {
		cerr << e.what() << endl;
		return 1;
	}

	// Set up signals
	signal(SIGHUP, OnHangup);

	struct sigaction sa;
	memset(&sa, 0, sizeof(sa));
	sa.sa_handler = OnAlarm;
	sigaction(SIGALRM, &sa, NULL);

	signal(SIGPIPE, SIG_IGN);

	// Open the receiving socket
	SocketAddress saddr(IPAddress::any4, (unsigned short int)port);
	UDPSocket socket;
	if (!socket) {
		cerr << "Unable to open socket\n";
		return 1;
	}
	socket.SetDescriptorFlags(FD_CLOEXEC);
	socket.SetSockOpt(SOL_SOCKET, SO_RCVBUF, udpReceiveQueue * 1024);
	socket.Bind(saddr);

	// Join a multicast group if requested
	if (multicastAddr != "0") {
		try {
			socket.JoinMulticast(multicastAddr);
		} catch (runtime_error & e) {
			cerr << "Error joining multicast group: " << e.what() << endl;
			return 1;
		}
	}

	// Process received packets
	const size_t bufSize = 65536;

	char receiveBuffer[bufSize];
	ssize_t bytesRead;
	SendBuffer<ConfigWriteCallback> sendBuffer(
			config.GetPool(),
			Udp2LogConfig::BLOCK_SIZE, 
			config.GetWriteCallback());
	
	const PosixClock::Time reportInterval(reportIntervalSeconds, 0);
	const PosixClock::Time updateInterval(Udp2LogConfig::UPDATE_PERIOD);
	PosixClock clock(CLOCK_REALTIME);
	PosixClock::Time nextReportTime = clock.Get() + reportInterval;
	PosixClock::Time nextUpdateTime = clock.Get() + updateInterval;
	struct itimerval itv;
	itv.it_interval.tv_sec = 0;
	itv.it_interval.tv_usec = 250000;
	itv.it_value = itv.it_interval;
	setitimer(ITIMER_REAL, &itv, NULL);

	FileDescriptor::ErrorSetPointer ignoredErrors(new FileDescriptor::ErrorSet);
	ignoredErrors->insert(EINTR);
	socket.Ignore(ignoredErrors);

	for (;;) {
		bytesRead = socket.Recv(receiveBuffer, bufSize);

		// Reload configuration
		try {
			config.Reload();
		} catch (runtime_error & e) {
			cerr << e.what() << endl;
		}

		if (bytesRead <= 0) {
			// Timeout
			sendBuffer.Flush();
		} else {
			sendBuffer.Write(receiveBuffer, bytesRead);
			config.IncrementPacketCount();
		}

		// Counter update
		PosixClock::Time currentTime = clock.Get();
		if (currentTime >= nextUpdateTime) {
			while (currentTime >= nextUpdateTime) {
				nextUpdateTime += updateInterval;
			}
			config.UpdateCounters();
		}

		// Status report
		if (currentTime >= nextReportTime) {
			while (currentTime >= nextReportTime) {
				nextReportTime += reportInterval;
			}
			config.PrintStatusReport(std::cout);
		}
	}
}

