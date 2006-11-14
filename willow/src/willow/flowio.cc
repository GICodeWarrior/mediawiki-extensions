/* @(#) $Id$ */
/* This source code is in the public domain. */
/*
 * Willow: Lightweight HTTP reverse-proxy.
 * flowio: stream-based i/o system.
 */

#if defined __SUNPRO_C || defined __DECC || defined __HP_cc
# pragma ident "@(#)$Id$"
#endif

#include <sys/stat.h>
#include <sys/types.h>
#include <sys/fcntl.h>
#include <sys/mman.h>

#include <iostream>
#include <cerrno>
using std::streamsize;

#include "flowio.h"
#include "wnet.h"
#include "format.h"
#include "wconfig.h"

namespace io {

sink_result
spigot::_sp_data_ready(char *b, size_t s, ssize_t &discard) {
	return _sp_sink->data_ready(b, s, discard);
}

sink_result
spigot::_sp_dio_ready(int fd, off_t off, char *b, size_t s, ssize_t &discard) {
	return _sp_sink->dio_ready(fd, off, s, discard);
}

sink_result
spigot::_sp_data_empty(void) {
	return _sp_sink->data_empty();
}

void
spigot::sp_connect(sink *s) {
	_sp_sink = s;
	s->_sink_spigot = this;
}

void
spigot::sp_disconnect(void) {
	if (_sp_sink) {
		_sp_sink->_sink_disconnected();
		_sp_sink->_sink_spigot = NULL;
	}
	_sp_sink = NULL;
}

tss<diocache> socket_spigot::_diocache;

char *
socket_spigot::_get_dio_buf(void)
{
char	 path[PATH_MAX + 1];
char	*ret;
	if (!config.use_dio)
		return new char[DIOBUFSZ];

	if (_diocache) {
	diocache	*d = _diocache;
		_diocache = d->next;
		_diofd = d->fd;
		ret = d->addr;
		delete d;
		return ret;
	}

	snprintf(path, sizeof(path), "/dev/shm/willow.diobuf.%d.%d.%d",
		getpid(), (int) pthread_self(), rand());
	if ((_diofd = open(path, O_CREAT | O_EXCL | O_RDWR, 0600)) == -1) {
		wlog(WLOG_WARNING, format("opening diobuf %s: %e") % path);
		return new char[DIOBUFSZ];
	}
	unlink(path);

	if (lseek(_diofd, DIOBUFSZ, SEEK_SET) == -1) {
		wlog(WLOG_WARNING, format("seeking diobuf %s: %e") % path);
		close(_diofd);
		_diofd = -1;
		return new char[DIOBUFSZ];
	}
	if (write(_diofd, "", 1) < 1) {
		wlog(WLOG_WARNING, format("extending diobuf %s: %e") % path);
		close(_diofd);
		_diofd = -1;
		return new char[DIOBUFSZ];
	}
	ret = (char *)mmap(0, DIOBUFSZ, PROT_READ | PROT_WRITE, MAP_SHARED, _diofd, 0);
	if (ret == MAP_FAILED) {
		wlog(WLOG_WARNING, format("mapping diobuf %s: %e") % path);
		close(_diofd);
		_diofd = -1;
		return new char[DIOBUFSZ];
	}
	return ret;
}

void
socket_spigot::_socketcall(wsocket *s, int) {
ssize_t		read;
sink_result	res;
int		bufsz;

	/*
	 * _off is the offset of the start of _savebuf
	 * _saved is the number of bytes past _off that are usable.
	 */

	/* _off was increased by the previous send, reduce _saved
	 * appropriately
	 */
	if (_off >= (ssize_t)_saved)
		_saved = _off = 0;
	else
		_saved -= _off;

	if (_saved) {
		switch (this->_maybe_dio_send(_off, _savebuf, _saved, _off)) {
		case sink_result_blocked:
			sp_cork();
			return;
		case sink_result_okay:
			break;
		case sink_result_error:
			_sp_error_callee();
			return;
		case sink_result_finished:
			_sp_completed_callee();
			return;
		}
	}

	if (_off >= (ssize_t)_saved)
		_off = _saved = 0;

	read = s->read(_savebuf + _off + _saved, DIOBUFSZ - (_off + _saved));
	if (read == 0) {
		sp_cork();
		switch (this->_sp_data_empty()) {
		case sink_result_blocked:
			sp_cork();
			return;
		case sink_result_okay:
			return;
		case sink_result_error:
			_sp_error_callee();
			return;
		case sink_result_finished:
			_sp_completed_callee();
			return;
		}
	}

	if (read == -1 && errno == EAGAIN) {
		_socket->readback(polycaller<wsocket *, int>(*this,
			&socket_spigot::_socketcall), 0);
		return;
	}

	if (read == -1) {
		_sp_error_callee();
		return;
	}

	_saved = read;
	switch (this->_maybe_dio_send(0, _savebuf, _saved, _off)) {
	case sink_result_blocked:
		sp_cork();
	case sink_result_okay:
		break;
	case sink_result_error:
		_sp_error_callee();
		return;
	case sink_result_finished:
		_sp_completed_callee();
		return;
	}
	if (!_corked)
		_socket->readback(polycaller<wsocket *, int>(*this, &socket_spigot::_socketcall), 0);
	return;
}

sink_result
socket_sink::data_ready(char const *buf, size_t len, ssize_t &discard)
{
ssize_t	wrote;
	if ((wrote = _socket->write(buf, len)) == -1) {
		if (errno == EAGAIN) {
			_sink_spigot->sp_cork();
			if (!_reg) {
				_socket->writeback(polycaller<wsocket *, int>(
					*this, &socket_sink::_socketcall), 0);
				_reg = true;
			}
			return sink_result_blocked;
		}
		_sink_spigot->sp_cork();
		return sink_result_error;
	}

	discard += wrote;
	_counter += wrote;

	if ((ssize_t)len == wrote) {
		return sink_result_okay;
	} else {
		_sink_spigot->sp_cork();
		if (!_reg) {
			_socket->writeback(polycaller<wsocket *, int>(
				*this, &socket_sink::_socketcall), 0);
			_reg = true;
		}
		return sink_result_blocked;
	}
}

sink_result
socket_sink::dio_ready(int fd, off_t off, size_t len, ssize_t &discard)
{
ssize_t	wrote;
	if ((wrote = _socket->sendfile(fd, &off, len)) == -1) {
		if (errno == EAGAIN) {
			_sink_spigot->sp_cork();
			if (!_reg) {
				_socket->writeback(polycaller<wsocket *, int>(
					*this, &socket_sink::_socketcall), 0);
				_reg = true;
			}
			return sink_result_blocked;
		}
		_sink_spigot->sp_cork();
		return sink_result_error;
	}
	discard += wrote;
	_counter += wrote;

	if ((ssize_t)len == wrote) {
		return sink_result_okay;
	} else {
		_sink_spigot->sp_cork();
		if (!_reg) {
			_socket->writeback(polycaller<wsocket *, int>(
				*this, &socket_sink::_socketcall), 0);
			_reg = true;
		}
		return sink_result_blocked;
	}
}

tss<file_spigot::cache_map> file_spigot::_cache;

file_spigot::file_spigot(void)
	: _corked(false)
	, _cached(false)
	, _cached_size(0)
{
}

file_spigot *
file_spigot::from_path(string const &path, bool cache)
{
file_spigot	*s = new file_spigot;
	if (!s->open(path.c_str(), cache)) {
		delete s;
		return NULL;
	}
	return s;
}

file_spigot *
file_spigot::from_path(char const *path, bool cache)
{
file_spigot	*s = new file_spigot;
	if (!s->open(path, cache)) {
		delete s;
		return NULL;
	}
	return s;
}

bool
file_spigot::open(char const *file, bool cache)
{
cache_map::iterator	it;
cache_item		item;
struct stat		sb;

	if (_cache == NULL)
		_cache = new cache_map;

	if (cache) {
		if (stat(file, &sb) == -1) {
			wlog(WLOG_WARNING, format("cannot open %s: %e") % file);
			return false;
		}

		if ((it = _cache->find(file)) != _cache->end()) {
			if (sb.st_mtime == it->second.mtime) {
				_cached = true;
				_cdata = it->second.data;
				_cached_size = it->second.len;
				return true;
			}
			delete[] it->second.data;
			_cache->erase(it);
		}


		_file.open(file);
		if (!_file.is_open()) {
			wlog(WLOG_WARNING, format("cannot open %s: %e") % file);
			return false;
		}

		item.mtime = sb.st_mtime;
		item.data = new char[sb.st_size];
		item.len = sb.st_size;
		if (_file.readsome(item.data, sb.st_size) != sb.st_size) {
			delete[] item.data;
			_file.seekg(0);
			return true;
		}
		(*_cache)[file] = item;
		_cached = true;
		_cached_size = sb.st_size;
		_cdata = item.data;
		return true;
	}

	_file.open(file);
	if (!_file.is_open())
		wlog(WLOG_WARNING, format("cannot open %s: %e") % file);
	return _file.is_open();
}

bool
file_spigot::bs_get_data(void)
{
streamsize	size;
	if (_cached) {
		if (!_cached_size) {
			_sp_completed_callee();
			return false;
		}

		_buf.add(_cdata, _cached_size, false);
		_cached_size = 0;
		return true;
	}

	size = _file.readsome(_fbuf, 16384);
	if (size == 0) {
		_sp_completed_callee();
		return false;
	} else if (_file.fail()) {
		_sp_error_callee();
		return false;
	}
	_buf.add(_fbuf, size, false);
	return true;
}

} // namespace io
