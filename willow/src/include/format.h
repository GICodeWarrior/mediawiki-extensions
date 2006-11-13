/* @(#) $Id$ */
/* This source code is in the public domain. */
/*
 * Willow: Lightweight HTTP reverse-proxy.
 * format: typesafe printf-style string formatter.
 */

#ifndef FORMAT_H
#define FORMAT_H

#if defined __SUNPRO_C || defined __DECC || defined __HP_cc
# pragma ident "@(#)$Id$"
#endif

#include <vector>
#include <string>
#include <iostream>
#include <stdexcept>
#include <sstream>
#include <cerrno>
using std::vector;
using std::ios;
using std::runtime_error;
using std::strerror;

#include "willow.h"

struct invalid_format_string : runtime_error {
	invalid_format_string(void) : runtime_error("invalid format string") {}
};

struct format
{
	format	(string const &);

	template<typename T>
	format& operator%(T const &);

	string	str(void) const;
		operator string(void) const;

private:
	void	parse_format_string(void);

	enum argtype {
		at_string,
		at_decint,
		at_hexint,
		at_octint,
		at_errno,
	};
	vector<argtype>	_argtypes;
	vector<string>	_args;
	string		_fmt;
	int		_reserve;
};

template<typename T>
format&
format::operator % (T const &arg)
{
ostringstream	strm;
	switch (_argtypes[_args.size()]) {
	case at_string:
		_args.push_back(lexical_cast<string>(arg));
		_reserve += _args.rbegin()->size();
		return *this;
	case at_decint:
		break;
	case at_octint:
		strm << std::oct;
		break;
	case at_hexint:
		strm << std::hex;
		break;
	case at_errno:
		_args.push_back(strerror(errno));
		_reserve += _args.rbegin()->size();
		return *this;
	}
	strm << arg;
	_args.push_back(strm.str());
	_reserve += _args.rbegin()->size();
	return *this;
}

#endif
