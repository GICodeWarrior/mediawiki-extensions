/* @(#) $Header$ */
#ifndef SM_SMSTDINC_HXX_INCLUDED_
#define SM_SMSTDINC_HXX_INCLUDED_

#define SM_VERSION "2.1.0.0-pre"

#include <iostream>
#include <fstream>
#include <iomanip>
#include <string>
#include <map>
#include <vector>
#include <utility>
#include <functional>
#include <set>
#include <list>
#include <cerrno>
using std::for_each;

#include <boost/bind.hpp>
#include <boost/function.hpp>
#include <boost/lexical_cast.hpp>
#include <boost/format.hpp>
#include <boost/utility.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/lambda/lambda.hpp>
#include <boost/thread.hpp>
#include <boost/thread/mutex.hpp>
#include <boost/any.hpp>
using boost::lexical_cast;
using boost::bad_lexical_cast;
using boost::format;
using boost::noncopyable;
using boost::shared_ptr;
using boost::lambda::var;
namespace b = boost;
namespace bl = boost::lambda;

#include <sys/types.h>
#include <sys/socket.h>
#include <sys/stat.h>
#include <fcntl.h>

#include <arpa/inet.h>

#include <netinet/in.h>

#include <unistd.h>
#include <netdb.h>

#endif
