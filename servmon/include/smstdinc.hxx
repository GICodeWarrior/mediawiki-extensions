#ifndef SM_SMSTDINC_HXX_INCLUDED_
#define SM_SMSTDINC_HXX_INCLUDED_

#include <iostream>
#include <string>
#include <map>
#include <vector>
#include <utility>
#include <functional>
#include <set>
#include <cerrno>
using std::for_each;

#include <boost/bind.hpp>
#include <boost/function.hpp>
#include <boost/lexical_cast.hpp>
#include <boost/format.hpp>
using boost::lexical_cast;
using boost::format;

#include <sys/types.h>
#include <sys/socket.h>

#include <arpa/inet.h>

#include <netinet/in.h>

#include <unistd.h>

#endif
