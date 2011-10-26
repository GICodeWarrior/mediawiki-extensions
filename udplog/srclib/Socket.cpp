#include "Socket.h"

void Socket::RaiseError(const char* msg)
{
	if (ignoreErrors.size() == 0) {
		// Ignore none
		throw libc_error(msg);
	}

	std::set<int> * curIgnore = ignoreErrors.back().get();
	if (!curIgnore) {
		// Ignore all
		return;
	}

	if (!curIgnore->count(errno)) {
		// Don't ignore this one
		throw libc_error(msg);
	}
}

int UDPSocket::JoinMulticast(const IPAddress & addr) {
	int level, optname;
	void *optval;
	socklen_t optlen;
	struct ip_mreqn mreq4;
	struct ipv6_mreq mreq6;

	if (addr.GetType() == AF_INET) {
		addr.CopyBinaryData(&mreq4.imr_multiaddr.s_addr);
		IPAddress::any4.CopyBinaryData(&mreq4.imr_address);
		mreq4.imr_ifindex = 0;
		level = IPPROTO_IP;
		optname = IP_ADD_MEMBERSHIP;
		optval = &mreq4;
		optlen = sizeof(mreq4);
	} else {
		addr.CopyBinaryData(&mreq6.ipv6mr_multiaddr);
		mreq6.ipv6mr_interface = 0;
		level = IPPROTO_IPV6;
		optname = IPV6_JOIN_GROUP;
		optval = &mreq6;
		optlen = sizeof(mreq6);
	}

	if (setsockopt(fd, level, optname, optval, optlen)) {
		RaiseError("UDPSocket::JoinMulticast");
		return errno;
	} else {
		return 0;
	}
}

