/* Copyright (c) 2008 River Tarnell <river@wikimedia.org>. */
/*
 * Permission is granted to anyone to use this software for any purpose,
 * including commercial applications, and to alter it and redistribute it
 * freely. This software is provided 'as-is', without any express or implied
 * warranty.
 */
/* $Id$ */

#ifndef PROCESS_H
#define PROCESS_H

#include	<sys/types.h>

#include	<stdexcept>

#include	<boost/shared_ptr.hpp>
#include	<boost/noncopyable.hpp>
#include	<log4cxx/logger.h>

struct connect_failure : std::runtime_error {
	connect_failure(char const *error) : std::runtime_error(error) {}
};

struct creation_failure : std::runtime_error {
	creation_failure(char const *error) : std::runtime_error(error) {}
};

struct security_violation : creation_failure {
	security_violation(char const *error) : creation_failure(error) {}
};

struct process : boost::noncopyable {
	process(uid_t, gid_t, std::string const &bindpath);
	~process();

	int connect(int);

	uid_t uid() const { return uid_; }
	gid_t gid() const { return gid_; }
	pid_t pid() const { return pid_; }

private:
	std::string bindpath_;
	pid_t pid_;
	uid_t uid_;
	gid_t gid_;

	log4cxx::LoggerPtr logger;
};

typedef boost::shared_ptr<process> processp;

#endif
