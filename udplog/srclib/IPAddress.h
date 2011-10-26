#ifndef IP_ADDRESS_H
#define IP_ADDRESS_H

#include <arpa/inet.h>
#include <netinet/in.h>
#include <string>
#include <boost/shared_ptr.hpp>
#include <stdexcept>
#include <memory.h>

class SocketAddress;

class IPAddress {
public:
	IPAddress()
		: type(AF_INET), domain(PF_INET), length(sizeof(in_addr)) {}

	IPAddress(const struct in_addr * src) 
		: type(AF_INET), domain(PF_INET), length(sizeof(in_addr))
	{ 
		data.v4 = *src;
	}

	IPAddress(const struct in6_addr * src) 
		: type(AF_INET6), domain(PF_INET6), length(sizeof(in6_addr))
	{
		data.v6 = *src;
	}

	IPAddress(uint32_t addr)
		: type(AF_INET), domain(PF_INET), length(sizeof(in_addr))
	{
		data.v4.s_addr = addr;
	}

	IPAddress(const char * presentation) {
		InitFromString(presentation);
	}

	IPAddress(const std::string & s) {
		if (s.find('\0') != std::string::npos) {
			throw std::runtime_error("Invalid IP address");
		}
		InitFromString(s.c_str());
	}

	const void* GetBinaryData() const { return &data; }
	size_t GetBinaryLength() const { return length; }

	void CopyBinaryData(void * dest) const {
		memcpy(dest, GetBinaryData(), GetBinaryLength());
	}

	int GetType() const { return type; }
	int GetDomain() const { return domain; }
	std::string & ToString();
	boost::shared_ptr<SocketAddress> NewSocketAddress(unsigned short int port);

	static const IPAddress any4;
	static const IPAddress any6;
protected:
	void InitFromString(const char * presentation);

	enum { BUFSIZE = 200 };

	std::string presentation;
	union {
		struct in6_addr v6;
		struct in_addr v4;
	} data;
	int type, domain, length;


};

#endif
