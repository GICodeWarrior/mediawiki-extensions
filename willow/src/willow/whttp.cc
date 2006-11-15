/* @(#) $Id$ */
/* This source code is in the public domain. */
/*
 * Willow: Lightweight HTTP reverse-proxy.
 * whttp: HTTP implementation.
 */

#if defined __SUNPRO_C || defined __DECC || defined __HP_cc
# pragma ident "@(#)$Id$"
#endif

/*
 * The logic of whttp is explained in whttp_entity.c
 */

#ifndef _GNU_SOURCE
# define _GNU_SOURCE	/* glibc strptime */
#endif

#include <sys/types.h>
#include <sys/stat.h>
#include <sys/param.h>

#include <cstdlib>
#include <cstdio>
#include <cstring>
#include <unistd.h>
#include <cerrno>
#include <netdb.h>
#include <fcntl.h>
#include <cassert>
#include <ctime>
#include <fstream>
#include <pthread.h>

#include <utility>
#include <deque>
using std::deque;
using std::min;
using std::ofstream;
using std::endl;

#include "willow.h"
#include "whttp.h"
#include "wnet.h"
#include "wbackend.h"
#include "wconfig.h"
#include "wlogwriter.h"
#include "whttp_entity.h"
#include "wlog.h"
#include "radix.h"
#include "chunking.h"
#include "flowio.h"
#include "format.h"
#include "cache.h"

using namespace wnet;

#ifndef MAXHOSTNAMELEN
# define MAXHOSTNAMELEN HOST_NAME_MAX /* SysV / BSD disagreement */
#endif

/*
 * Error handling.
 */
#define ERR_GENERAL	0	/* unspecified error			*/
#define ERR_BADREQUEST	1	/* client request invalid		*/
#define ERR_BADRESPONSE	2	/* backend response invalid		*/
#define ERR_CACHE_IO	3	/* i/o failure reading cache		*/
#define ERR_BLOCKED	4	/* client denied by configuration	*/

static const char *error_files[] = {
	/* ERR_GENERAL		*/	DATADIR "/errors/ERR_GENERAL",
	/* ERR_BADREQUEST	*/	DATADIR "/errors/ERR_BADREQUEST",
	/* ERR_BADRESPONSE	*/	DATADIR "/errors/ERR_BADRESPONSE",
	/* ERR_CACHE_IO		*/	DATADIR "/errors/ERR_CACHE_IO",
	/* ERR_BLOCKED		*/	DATADIR "/errors/ERR_BLOCKED",
};

static void *client_thread(void *);
static void stats_merge(int, short, void *);

char via_hdr[1024];
char *cache_hit_hdr;
char *cache_miss_hdr;

tss<event> merge_ev;

char my_hostname[MAXHOSTNAMELEN + 1];
static char my_version[64];
static ofstream alf;
lockable alf_lock;

static int const default_udplog_port = 4445;
wnet::socket *udplog_sock;
static atomic<int> log_count;
static bool do_udplog;

struct error_transform_filter : io::buffering_filter, freelist_allocator<error_transform_filter>
{
	string const	_url;
	string const	_errdata;
	string const	_statstr;
	int		 _status;

	error_transform_filter(
		string const &url, 
		string const &errdata, 
		string const &statstr,
		int status);

	io::sink_result	bf_transform(char const *, size_t, ssize_t &);
};		

struct httpcllr : freelist_allocator<httpcllr> {
	/* Accept a new client and start processing it. */
	httpcllr(wsocket *, int);
	~httpcllr();

	void start_request (void);
	void end_request (bool = true);
	void force_end_request (void);

	void start_backend_request (imstring const &host, imstring const &path);
	void start_backend_request (imstring const &url);

		/* reading request from client */
	void header_read_complete		(void);
	void header_read_error			(void);
		/* sending request to backend */
	void backend_ready			(backend *, wsocket *, int);
	void backend_write_headers_done		(void);
	void backend_write_body_done		(void);
	void backend_write_error		(void);
		/* reading request from backend */
	void backend_read_headers_done		(void);
	void backend_read_headers_error 	(void);
		/* sending request to client */
	void send_headers_to_client_done	(void);
	void send_headers_to_client_error	(void);
	void send_body_to_client_done		(void);
	void send_body_to_client_error		(void);
		/* sending errors to the client */
	void send_error_to_client		(void);
	void error_send_headers_done		(void);
	void error_send_done			(void);

	void send_error(int, char const *, int, char const *);
	void send_cached(void);
	void log_request (void);

	wsocket		*_client_socket;
	backend		*_backend;
	wsocket		*_backend_socket;

	io::socket_spigot		*_client_spigot;
	io::socket_spigot		*_backend_spigot;
	io::socket_sink			*_backend_sink,
					*_client_sink;
	header_parser			*_header_parser,
					*_backend_headers;
	dechunking_filter		*_dechunking_filter;
	header_spigot			*_error_headers;
	io::file_spigot			*_error_body;
	error_transform_filter		*_error_filter;
	chunking_filter			*_chunking_filter;
	io::size_limiting_filter	*_size_limit;
	cachedentity			*_cachedent;
	caching_filter			*_cache_filter;
	cached_spigot			*_cache_spigot;

	backend_list	*_blist;
	bool		 _denied;
	int		 _group;
	int		 _response;
	imstring	 _request_host;
	imstring	 _request_path;
	int		 _nredir;
	bool		 _validating;

private:
	httpcllr(const httpcllr &);
};

httpcllr::httpcllr(wsocket *s, int gr)
	: _client_socket(s)
	, _backend(NULL)
	, _backend_socket(NULL)
	, _client_spigot(NULL)
	, _backend_spigot(NULL)
	, _backend_sink(NULL)
	, _client_sink(NULL)
	, _header_parser(NULL)
	, _backend_headers(NULL)
	, _dechunking_filter(NULL)
	, _error_headers(NULL)
	, _error_body(NULL)
	, _error_filter(NULL)
	, _chunking_filter(NULL)
	, _size_limit(NULL)
	, _cachedent(NULL)
	, _cache_filter(NULL)
	, _cache_spigot(NULL)
	, _blist(NULL)
	, _denied(false)
	, _group(gr)
	, _response(0)
	, _nredir(0)
	, _validating(false)
{
	/*
	 * Check access controls.
	 */
pair<bool, uint16_t>	acc = config.access.allowed(s->address().addr());
	if (!acc.first) {
		if (acc.second & whttp_deny_connect) {
			delete this;
			return;
		}
		_denied = true;
	}

	_client_spigot = new io::socket_spigot(_client_socket);
	start_request();
}

void
httpcllr::start_request(void)
{
	/*
	 * Start by reading headers.
	 */
	_header_parser = new header_parser;

	_client_spigot->completed_callee(this, &httpcllr::header_read_complete);
	_client_spigot->error_callee(this, &httpcllr::header_read_error);

	_client_spigot->sp_connect(_header_parser);
	_client_spigot->sp_uncork();
}

void
httpcllr::force_end_request(void)
{
	end_request(false);
}

void
httpcllr::end_request(bool tryke)
{
bool	can_keepalive = false;
	if (tryke && ((_header_parser->_http_vers == http11 &&
	    !_header_parser->_no_keepalive) || _header_parser->_force_keepalive)) {
		can_keepalive = true;
	}

	delete _backend_spigot;
	_backend_spigot = NULL;
	delete _backend_sink;
	_backend_sink = NULL;
	delete _client_sink;
	_client_sink = NULL;
	delete _dechunking_filter;
	_dechunking_filter = NULL;
	delete _error_headers;
	_error_headers = NULL;
	delete _error_filter;
	_error_filter = NULL;
	delete _error_body;
	_error_body = NULL;
	delete _chunking_filter;
	_chunking_filter = NULL;
	delete _size_limit;
	_size_limit = NULL;
	delete _header_parser;
	_header_parser = NULL;
	delete _cache_filter;
	_cache_filter = NULL;
	delete _cache_spigot;
	_cache_spigot = NULL;
	if (_cachedent)
		entitycache.release(_cachedent);
	_cachedent = NULL;

	/*
	 * Return the backend to the keepalive pool, if we can.
	 */
	if (_backend_socket && !_backend_headers->_no_keepalive &&
	    _backend_headers->_http_vers == http11 && (!_blist || !_blist->failed())) {
		bpools.find(_group)->second.add_keptalive(
			make_pair(_backend_socket, _backend));
	} else {
		delete _backend_socket;
	}

	delete _blist;
	_blist = NULL;
	_backend_socket = NULL;
	delete _backend_headers;
	_backend_headers = NULL;

	_client_spigot->sp_disconnect();
	_client_spigot->sp_cork();

	if (can_keepalive && config.client_keepalive) {
		/* 
		 * leave the connection open, assuming they will send another
		 * request (keep-alive).
		 */
		start_request();
		return;
	}

	/*
	 * No keep alive, close the connection.
	 */
	delete this;
}

httpcllr::~httpcllr(void)
{				
	delete _client_spigot;
	delete _client_socket;
}

void
httpcllr::send_cached(void)
{
	_cache_spigot = new cached_spigot(_cachedent);
	if (_header_parser->_force_keepalive)
		_cache_spigot->keepalive(true);

	if (!_client_sink)
		_client_sink = new io::socket_sink(_client_socket);

	_client_socket->cork();
	_cache_spigot->error_callee(this, &httpcllr::send_body_to_client_error);
	_cache_spigot->completed_callee(this, &httpcllr::send_body_to_client_done);
	_cache_spigot->sp_connect(_client_sink);
	_cache_spigot->sp_uncork();
	return;
}

void
httpcllr::header_read_complete(void)
{
	if (_denied) {
		send_error(ERR_BLOCKED, "You are not permitted to access this server.",
				403, "Forbidden");
		return;
	}
 
	/*
	 * Now parse the client's headers and decide what to do with
	 * the request.
	 */
	_header_parser->_headers.add("X-Forwarded-For", _client_socket->straddr(false).c_str());

	if (_header_parser->_http_reqtype == REQTYPE_POST) {
		if (_header_parser->_content_length == -1) {
			send_error(ERR_BADREQUEST, "POST request without content length",
				400, "Bad request");
			return;
		}
	}

	_client_spigot->sp_disconnect();

	/*
	 * See if this entity has been cached.
	 */
	if (_header_parser->_http_reqtype != REQTYPE_POST) {
	bool	created = false;
	string	url = format("http://%s%s") % _header_parser->_http_host
			% _header_parser->_http_path;
		_cachedent = entitycache.find_cached(imstring(url), true, created);
		if (_cachedent) {
			if (_cachedent->complete()) {
				/* yes - complete object is available */
				if (_cachedent->expired()) {
				char		 dstr[64];
				struct tm	 tm;
				time_t		 mod = _cachedent->modified();
					gmtime_r(&mod, &tm);
					/* need to revalidate */
					_validating = true;
					strftime(dstr, sizeof(dstr),
						"%a, %d %b %Y %H:%M:%S GMT", &tm);
					_header_parser->_headers.add(
						"If-Modified-Since", dstr);
				} else {
					send_cached();
					return;
				}
			} else if (!created) {
				/*
				 * If the entity already exists but is not complete, we don't care
				 * about it.
				 */
				entitycache.release(_cachedent);
				_cachedent = NULL;
			}
		}
	}

map<string,int>::iterator	it;
map<imstring,int>::iterator	mit;
pair<bool, uint16_t> acheck;

	if ((mit = host_to_bpool.find(_header_parser->_http_host)) !=
	    host_to_bpool.end())
		_group = mit->second;

	if (!_header_parser->_http_backend.empty()) {
		acheck = config.force_backend.allowed(_client_socket->address().addr());
		if (acheck.first && acheck.second) {
			if ((it = poolnames.find(_header_parser->_http_backend))
			    != poolnames.end()) {
				_group = it->second;
			}
		}
	}

	start_backend_request(_header_parser->_http_host,
			_header_parser->_http_path);
}

void
httpcllr::start_backend_request(imstring const &url_)
{
char	*url = url_.c_str(), *slash;
	if (strncasecmp(url, "http://", 7)) {
		send_error(ERR_BADRESPONSE,
			"Could not parse server redirect location",
			503, "Internal server error");
		return;
	}
	url += 7;
	slash = strchr(url, '/');
	if (slash == NULL) {
		start_backend_request(url, "/");
		return;
	}
	start_backend_request(imstring(url, slash - url), slash);
}

void
httpcllr::start_backend_request(imstring const &host, imstring const &path)
{
pair<wsocket *, backend *> ke;

	/*
	 * Never try to send a POST request over keepalive - if the connection
	 * breaks we don't have the POST data anymore so we can't retry.
	 */
	if (_header_parser->_http_reqtype != REQTYPE_POST)
		ke = bpools.find(_group)->second.get_keptalive();
	
	_request_host = host;
	_request_path = path;

	delete _backend_sink;
	_backend_sink = NULL;
	delete _backend_spigot;
	_backend_spigot = NULL;
	delete _size_limit;
	_size_limit = NULL;
	delete _dechunking_filter;
	_dechunking_filter = NULL;
	delete _chunking_filter;
	_chunking_filter = NULL;
	delete _blist;
	_blist = NULL;
	delete _backend_headers;
	_backend_headers = NULL;

	if (ke.first) {
		backend_ready(ke.second, ke.first, 0);
		return;
	}

	if (!_blist)
		_blist = bpools.find(_group)->second.get_list(
				_request_path, _request_host);
	
	if (_blist->get(polycaller<backend *, wsocket *, int>(*this, 
		    &httpcllr::backend_ready), 0) == -1)
		backend_ready(NULL, NULL, 0);
}

void
httpcllr::header_read_error(void)
{
	if (_header_parser->_eof) {
		force_end_request();
		return;
	}

	stats.tcur->n_httpreq_fail++;
	send_error(ERR_BADREQUEST, "Could not parse client headers", 400, "Bad request");
}

void
httpcllr::backend_ready(backend *be, wsocket *s, int)
{
	if (be == NULL) {
		stats.tcur->n_httpreq_fail++;
		send_error(ERR_GENERAL, "No backends were available to serve your request", 
			503, "Internal server error");
		return;
	}

	/*
	 * Create the backend socket_sink, connect the header parser to it
	 * and start sending headers.
	 */
	s->cork();
	_backend_socket = s;
	_backend = be;
	_backend_sink = new io::socket_sink(s);

	if (_request_host.size())
		_header_parser->_http_host = _request_host;
	if (_request_path.size())
		_header_parser->_http_path = _request_path;

	_header_parser->sending_restart();
	_header_parser->completed_callee(this, &httpcllr::backend_write_headers_done);
	_header_parser->error_callee(this, &httpcllr::backend_write_error);
	_header_parser->sp_connect(_backend_sink);
	_header_parser->sp_uncork();
}

void
httpcllr::backend_write_error(void)
{
	start_backend_request(_request_host, _request_path);
}

void
httpcllr::backend_write_headers_done(void)
{
	if (_header_parser->_http_reqtype == REQTYPE_POST) {
		/*
		 * Connect the client to the backend and read the POST data.
		 */
		_size_limit = new io::size_limiting_filter(_header_parser->_content_length);
		_client_spigot->sp_connect(_size_limit);
		_size_limit->sp_connect(_backend_sink);

		_client_spigot->completed_callee(this, &httpcllr::backend_write_body_done);
		_client_spigot->error_callee(this, &httpcllr::backend_write_error);

		_client_spigot->sp_uncork();
		return;
	}
	backend_write_body_done();
}

void
httpcllr::backend_write_body_done(void)
{
	_backend_socket->uncork();

	/*
	 * Detach the backend sink and create a spigot to read the reply.
	 */
	_header_parser->sp_disconnect();

	_backend_headers = new header_parser;
	_backend_headers->set_response();

	_backend_spigot = new io::socket_spigot(_backend_socket);
	_backend_spigot->completed_callee(this, &httpcllr::backend_read_headers_done);
	_backend_spigot->error_callee(this, &httpcllr::backend_read_headers_error);
	_backend_spigot->sp_connect(_backend_headers);
	_backend_spigot->sp_uncork();
}

void
httpcllr::backend_read_headers_done(void)
{
	_response = _backend_headers->_response;

	if (_validating && _response == 304) {
		/* Our cached entity was still valid */
		_cachedent->revalidated();
		send_cached();
		return;
	}

	/*
	 * Check for X-Willow-Follow-Redirect header, which means we should
	 * follow the redirect.
	 */
	if (config.x_follow &&
	    _backend_headers->_follow_redirect &&
	    _backend_headers->_location.size() &&
	    (_backend_headers->_response >= 300 && _backend_headers->_response < 400)) {
		if (config.max_redirects && (_nredir++ == config.max_redirects)) {
			send_error(ERR_BADRESPONSE, "Too many redirects in server reply",
				503, "Internal server error");
			return;
		}

		start_backend_request(_backend_headers->_location);
		return;
	}

	/*
	 * If we're caching this entity, store the headers.
	 */
	if (_cachedent) {
	string	status = format("HTTP/1.1 %s\r\n") % _backend_headers->_http_path;
		_cachedent->store_status(status);
		_cachedent->store_headers(_backend_headers->_headers);
	}

	/*
	 * If the client is HTTP/1.0 or MSIE, we need to dechunk.
	 */
	if (_backend_headers->_flags.f_chunked && _header_parser->_http_vers == http10)
		_backend_headers->_headers.remove("Transfer-Encoding");
	else if (_backend_headers->_flags.f_chunked && config.msie_hack && _header_parser->_is_msie)
		_backend_headers->_headers.remove("Transfer-Encoding");

	/*
	 * Insert HTTP/1.0 keep-alive headers.
	 */
	if (_header_parser->_force_keepalive) {
		_backend_headers->_headers.add("Keep-Alive", "300");
	}

	_backend_headers->_headers.add("X-Cache", cache_miss_hdr);
	_backend_headers->_headers.add("Via", via_hdr);

	/*
	 * Send the headers to the client.
	 */
	_backend_spigot->sp_disconnect();

	_client_socket->cork();
	_client_sink = new io::socket_sink(_client_socket);
	_backend_headers->completed_callee(this, &httpcllr::send_headers_to_client_done);
	_backend_headers->error_callee(this, &httpcllr::send_headers_to_client_error);

	_backend_headers->sp_connect(_client_sink);
	_backend_headers->sp_uncork();
}

void
httpcllr::backend_read_headers_error(void)
{
	/*
	 * Try another backend...
	 */
	start_backend_request(_request_host, _request_path);
}

void
httpcllr::send_headers_to_client_done(void)
{
bool		 cache = false;
io::spigot	*cur = _backend_spigot;
bool		 rechunk = false;
bool		 chunked;

	/*
	 * Now connect the backend directly to the client.
	 */ 
	_backend_spigot->error_callee(this, &httpcllr::send_body_to_client_error);
	_backend_spigot->completed_callee(this, &httpcllr::send_body_to_client_done);

	/*
	 * See if we can cache this entity.
	 */
	if (_cachedent) {
		cache = true;
		_cache_filter = new caching_filter(_cachedent);
	}

	_backend_spigot->sp_disconnect();

	if (_backend_headers->_response == 304 && _backend_headers->_content_length < 0) {
		/* No body */
		send_body_to_client_done();
		return;
	}

	cur = _backend_spigot;
	chunked = _backend_headers->_flags.f_chunked;

	/*
	 * If the client is HTTP/1.0 or MSIE, we need to dechunk.
	 */
	if (chunked) {
		if (_header_parser->_http_vers == http10 ||
		     (config.msie_hack && _header_parser->_is_msie)) {
			_dechunking_filter = new dechunking_filter;
			cur = &(*cur >> *_dechunking_filter);
		} else if (cache) {
			_dechunking_filter = new dechunking_filter;
			cur = &(*cur >> *_dechunking_filter);
			rechunk = true;
		}
	}

	/* if we got a content-length, insert a size limit */
	if (!chunked && _backend_headers->_content_length != -1) {
		_size_limit = new io::size_limiting_filter(
			_backend_headers->_content_length);
		cur = &(*cur >> *_size_limit);
	}

	/* if we're caching, insert the caching filter */
	if (cache) {
		cur = &(*cur >> *_cache_filter);
		/* if we dechunked it to cache, rechunk now */
		if (rechunk) {
			_chunking_filter = new chunking_filter;
			cur = &(*cur >> *_chunking_filter);
		}
	}

	/* finally, connect to the client */
	*cur >> *_client_sink;

	_client_sink->_counter = 0;
	_backend_spigot->sp_uncork();
}


void
httpcllr::send_body_to_client_done(void)
{
	_client_socket->uncork();
	stats.tcur->n_httpreq_ok++;
	log_request();
	end_request();
}

void
httpcllr::send_body_to_client_error(void)
{
	stats.tcur->n_httpreq_fail++;
	end_request();
}

void
httpcllr::send_headers_to_client_error(void)
{
	stats.tcur->n_httpreq_fail++;
	end_request();
}

/*
 * Initialize whttp, start loggers.
 */
struct http_thread : freelist_allocator<http_thread> {
	pthread_t	thr;
	pair<wnet::socket *, wnet::socket *>
			sv;

	void	execute		(void);
	void	accept_wakeup	(wsocket *, int);
};
vector<http_thread *> threads;

void
whttp_init(void)
{
	int	hsize;
	
	if (gethostname(my_hostname, MAXHOSTNAMELEN) < 0) {
		perror("gethostname");
		exit(8);
	}

	(void)strlcpy(my_version, "Willow/" PACKAGE_VERSION, 64);
	snprintf(via_hdr, sizeof(via_hdr), "1.1 %s (%s)", my_hostname, my_version);

	hsize = sizeof("MISS from ") + strlen(my_hostname);
	cache_hit_hdr = (char *)wmalloc(hsize + 1);
	cache_miss_hdr = (char *)wmalloc(hsize + 1);
	
	if (cache_hit_hdr == NULL || cache_miss_hdr == NULL)
		outofmemory();
	
	snprintf(cache_hit_hdr, hsize, "HIT from %s", my_hostname);
	snprintf(cache_miss_hdr, hsize, "MISS from %s", my_hostname);

	wlog(WLOG_NOTICE, format("whttp: starting %d worker threads")
		% config.nthreads);
	for (int i = 0; i < config.nthreads; ++i) {
	http_thread	*t = new http_thread;
	pthread_attr_t	 attr;
		pthread_attr_init(&attr);
		pthread_attr_setdetachstate(&attr, PTHREAD_CREATE_DETACHED);
		t->sv = wnet::socket::socketpair(st_dgram);
		wnet_add_accept_wakeup(t->sv.first);
		threads.push_back(t);
		pthread_create(&t->thr, &attr, client_thread, t);
	}
	whttp_header_init();
}

void
http_thread::accept_wakeup(wsocket *s, int)
{
wsocket	*socks[2];
map<wsocket *, int>::iterator lsnit;

	if (s->read((char *)socks, sizeof(socks)) < (int)sizeof(socks)) {
		wlog(WLOG_ERROR, format("accept_wakeup: reading fd: %e"));
		exit(1);
	}
	WDEBUG((WLOG_DEBUG, format("accept_wakeup, lsnr = %d") % socks[1]));
	s->readback(polycaller<wsocket *, int>(*this, 
		&http_thread::accept_wakeup), 0);
	if ((lsnit = lsn2group.find(socks[1])) == lsn2group.end())
		throw runtime_error("listener not found");

	new httpcllr(socks[0], lsnit->second);
}

static
void merge_sched(void)
{
timeval	 tv;
	tv.tv_usec = 250000;
	tv.tv_sec = 0;
	evtimer_set(merge_ev, stats_merge, NULL);
	event_base_set(evb, merge_ev);
	event_add(merge_ev, &tv);
}

static void *
client_thread(void *arg)
{
http_thread	*t = (http_thread *)arg;
	t->execute();
	return NULL;
}

void
http_thread::execute(void)
{
	make_event_base();
	stats.tcur = new stats_stru::abs_t;
	merge_ev = new event;
	memset(merge_ev, 0, sizeof(*merge_ev));
	merge_sched();

	sv.second->readback(polycaller<wsocket *, int>(*this, 
		&http_thread::accept_wakeup), 0);
	event_base_loop(evb, 0);
	delete merge_ev;
	delete stats.tcur;
	return;
}

static void
stats_merge(int, short, void *)
{
timeval	tv = {0, 0};
	if (wnet_exit) {
		event_base_loopexit(evb, &tv);
		return;
	}

	{	HOLDING(stats.cur_lock);
		stats.cur.n_httpreq_ok += stats.tcur->n_httpreq_ok;
		stats.tcur->n_httpreq_ok = 0;
		stats.cur.n_httpreq_fail += stats.tcur->n_httpreq_fail;
		stats.tcur->n_httpreq_fail = 0;
		stats.cur.n_httpresp_ok += stats.tcur->n_httpresp_ok;
		stats.tcur->n_httpreq_ok = 0;
		stats.cur.n_httpresp_fail += stats.tcur->n_httpresp_fail;
		stats.tcur->n_httpresp_fail = 0;
	}
	merge_sched();
}

void
whttp_reconfigure(void)
{
	/* file logging */
	if (config.access_log.size()) {
		alf.open(config.access_log.c_str(), ofstream::app);
		if (!alf.good()) {
			wlog(WLOG_WARNING, format("opening %s: %e")
				% config.access_log);
		}
	}

	/* UDP logging */
	if (config.udp_log) {
		if (config.udplog_port == 0)
			config.udplog_port = default_udplog_port;

		try {
			udplog_sock = wnet::socket::create(config.udplog_host,
				config.udplog_port, st_dgram, "UDP logger", prio_norm);
			udplog_sock->connect();
		} catch (socket_error &e) {
			wlog(WLOG_WARNING, 
		format("connecting to UDP log host %s: %s; disabling UDP logging")
				% config.udplog_host % e.what());
			return;
		}

		do_udplog = true;
		wlog(WLOG_NOTICE, format("UDP logging to %s%s, sample rate 1/%d")
			% config.udplog_host
			% udplog_sock->straddr()
			% config.log_sample);
	}

}

void
whttp_shutdown(void)
{
	wfree(cache_hit_hdr);
	wfree(cache_miss_hdr);
}

static string
errsafe(string const &s)
{
string::const_iterator	it = s.begin(), end = s.end();
string	res;
	res.reserve((long) (s.size() * 1.2));
	for (; it != end; ++it)
		switch (*it) {
		case '<':
			res += "&lt;";
			break;
		case '>':
			res += "&gt;";
			break;
		case '"':
			res += "&quot;";
			break;
		case '\'':
			res += "&apos;";
			break;
		default:
			res += *it;
		}
	return res;
}

error_transform_filter::error_transform_filter(
		string const &url, 
		string const &errdata, 
		string const &statstr,
		int status)
	: _url(url)
	, _errdata(errdata)
	, _statstr(statstr) 
	, _status(status) {
}

io::sink_result
error_transform_filter::bf_transform(char const *buf, size_t len, ssize_t &discard) 
{
string		 errtxt;
char const	*p = buf;
	errtxt.reserve((int) (len * 1.2));
	while (p < buf + len) {
		switch(*p) {
		case '%':
			if (p + 1 < buf + len) {
				switch (*++p) {
				case 'A':
					errtxt += errsafe(config.admin);
					break;
				case 'U':
					errtxt += _url;
					break;
				case 'D':
					errtxt += current_time_str;
					break;
				case 'H':
					errtxt += my_hostname;
					break;
				case 'E':
					errtxt += errsafe(_errdata);
					break;
				case 'V':
					errtxt += my_version;
					break;
				case 'C': {
				char	s[4];
					sprintf(s, "%d", _status);
					errtxt += s;
					break;
				}
				case 'S':
					errtxt += errsafe(_statstr);
					break;
				default:
					errtxt += *p;
					break;
				}
				p++;
				continue;
			}
			break;
		default:
			errtxt += *p;
			break;
		}
		++p;
	}
char	*r;
	r = new char[errtxt.size()];
	memcpy(r, errtxt.data(), errtxt.size());
	_buf.add(r, errtxt.size(), true);
	discard += len;
	return io::sink_result_okay;
}
		

void
httpcllr::send_error(int errnum, char const *errdata, int status, char const *statstr)
{
string	url = "NONE";
	_response = status;

	if (_request_path.size())
		url = errsafe(_request_path.c_str());

	_error_headers = new header_spigot(status, statstr);
	if (!_client_sink)
		_client_sink = new io::socket_sink(_client_socket);

	_error_headers->add("Date", current_time_str);
	_error_headers->add("Expires", current_time_str);
	_error_headers->add("Server", my_version);

	_error_headers->add("Content-Type", "text/html;charset=UTF-8");

	_error_body = io::file_spigot::from_path(error_files[errnum], true);
	if (_error_body == NULL) {
		delete this;
		return;
	}
	_error_filter = new error_transform_filter(url, errdata, statstr, status);

	_error_headers->completed_callee(this, &httpcllr::error_send_headers_done);
	_error_headers->error_callee(this, &httpcllr::error_send_done);

	/*
	 * Can we chunk the error?
	 */
	if (_header_parser->_http_vers != http11)
		_error_headers->add("Connection", "close");
	else
		_error_headers->add("Transfer-Encoding", "chunked");

	_error_headers->sp_connect(_client_sink);
	_error_headers->sp_uncork();
}

void
httpcllr::error_send_headers_done(void)
{
	_error_headers->sp_disconnect();
	_error_body->completed_callee(this, &httpcllr::error_send_done);
	_error_body->error_callee(this, &httpcllr::error_send_done);

	_error_body->sp_connect(_error_filter);
	if (_header_parser->_http_vers == http11) {
		_chunking_filter = new chunking_filter;
		_error_filter->sp_connect(_chunking_filter);
		_chunking_filter->sp_connect(_client_sink);
	} else {
		_header_parser->_no_keepalive = true;
		_header_parser->_force_keepalive = false;
		_error_filter->sp_connect(_client_sink);
	}

	_error_body->sp_uncork();
}

void
httpcllr::error_send_done(void)
{
	log_request();
	end_request();
}

void
httpcllr::log_request(void)
{
size_t	size;

	if (_header_parser->_http_reqtype == REQTYPE_INVALID)
		return;

	if (++log_count != config.log_sample)
		return;
	log_count = 0;

	if (_chunking_filter)
		size = _chunking_filter->_counter;
	else if (_dechunking_filter)
		size = _dechunking_filter->_counter;
	else
		size = _client_sink->_counter;

	if (alf.is_open()) {
	string	line;
		line = format("[%s] %s %s\"%s\" %d %d %s MISS")
			% (char *)current_time_short
			% _client_socket->straddr(false)
			% request_string[_header_parser->_http_reqtype]
			% _request_path
			% size
			% _response
			% (_backend ? _backend->be_name : string("-"));

		HOLDING(alf_lock);

		if (!(alf << line << endl)) {
			wlog(WLOG_ERROR, "writing access log: %e; log will be closed");
			alf.close();
		}
	}

	if (do_udplog) {
	char	 buf[65535];
	char	*bufp = buf, *endp = buf + sizeof(buf);
		/*
		 * The log format is a packed binary strucure laid out like this:
		 *
		 *    <curtime><addrlen><straddr><reqtype><pathlen><reqpath><status>
		 *    <belen><bestr><cached><docsize>
		 *
		 * curtime is a 32-bit Unix timestamp.  *len are the length in bytes
		 * of the next element.  straddr is the ASCII IP address of the client.
		 * reqtype is an 8-bit integer:
		 *   0 - GET
		 *   1 - POST
		 *   2 - HEAD
		 *   3 - TRACE
		 *   4 - OPTIONS
		 * reqpath is the request path, including "http://" and the host.
		 * status is a 16-bit HTTP status code for the response.
		 * bestr is the ASCII IP address of the backend.  cached is an 
		 * 8-bit value, 1 if the request was served from the cache and 0 if not.
		 * docsize is the size of the response object, excluding headers.
		 */
		ADD_UINT32(bufp, (uint32_t)time(NULL), endp);
		ADD_STRING(bufp, _client_socket->straddr(false), endp);
		ADD_UINT8(bufp, _header_parser->_http_reqtype, endp);
		ADD_STRING(bufp, _request_path, endp);
		ADD_UINT16(bufp, _response, endp);
		ADD_STRING(bufp, string(_backend ? _backend->be_name : "-"), endp);
		ADD_UINT8(bufp, 0, endp);
		ADD_UINT32(bufp, size, endp);
		udplog_sock->write(buf, bufp - buf);
	}
}
