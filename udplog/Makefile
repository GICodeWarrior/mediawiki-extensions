TARGETS = log2udp udprecv delta udp2log/udp2log packet-loss slowread
SRCLIB_OBJS = srclib/HostEntry.o srclib/FileDescriptor.o srclib/IPAddress.o srclib/Socket.o srclib/SocketAddress.o srclib/PosixClock.o
HOST_OBJS = srcmisc/host.o $(SRCLIB_OBJS)
LOG2UDP_OBJS = srcmisc/log2udp.o $(SRCLIB_OBJS)
UDPRECV_OBJS = srcmisc/udprecv.o $(SRCLIB_OBJS)
SLOWREAD_OBJS = srcmisc/slowread.o $(SRCLIB_OBJS)
UDP2LOG_OBJS = udp2log/udp2log.o udp2log/LogProcessor.o udp2log/Udp2LogConfig.o $(SRCLIB_OBJS)
CFLAGS:=$(CFLAGS) -Wall

all: $(TARGETS)

clean:
	rm -f $(HOST_OBJS) $(LOG2UDP_OBJS) $(UDPRECV_OBJS) $(UDP2LOG_OBJS) $(TARGETS)

%.o : %.cpp
	g++ -c $(CFLAGS) -o $@ $<

host: $(HOST_OBJS)
	g++ $(CFLAGS) $(HOST_OBJS) -o host

log2udp: $(LOG2UDP_OBJS)
	g++ $(CFLAGS) $(LOG2UDP_OBJS) -lboost_program_options -o log2udp

udprecv: $(UDPRECV_OBJS)
	g++ $(CFLAGS) -Wall $(UDPRECV_OBJS) -o udprecv

delta: srcmisc/delta.cpp
	g++ $(CFLAGS) -o delta srcmisc/delta.cpp

packet-loss: srcmisc/packet-loss.cpp
	g++ $(CFLAGS) -o packet-loss srcmisc/packet-loss.cpp

slowread: $(SLOWREAD_OBJS)
	g++ $(CFLAGS) $(SLOWREAD_OBJS) -lrt -o slowread

udp2log/udp2log: $(UDP2LOG_OBJS)
	g++ $(CFLAGS) -o udp2log/udp2log $(UDP2LOG_OBJS) -lboost_program_options -lrt

install:
	install log2udp $(DESTDIR)/usr/bin/log2udp
	install udp2log/udp2log $(DESTDIR)/usr/bin/udp2log
