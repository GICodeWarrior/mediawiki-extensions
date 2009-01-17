/*
 * Copyright (c) 2008 Andrew Garrett.
 * Copyright (c) 2008 River Tarnell <river@wikimedia.org>
 * Derived from public domain code contributed by Victor Vasiliev.
 *
 * Permission is granted to anyone to use this software for any purpose,
 * including commercial applications, and to alter it and redistribute it
 * freely. This software is provided 'as-is', without any express or
 * implied warranty.
 */

#ifndef PARSERDEFS_H
#define PARSERDEFS_H

#define pid_value	1
#define pid_variable	2
#define pid_basic	3
#define pid_bool_expr	4
#define pid_ord_expr	5
#define pid_eq_expr	6
#define pid_pow_expr	7
#define pid_mult_expr	8
#define pid_plus_expr	9
#define pid_in_expr	10
#define pid_function	12
#define pid_tern_expr	13
#define pid_string	14

namespace afp {

struct parse_error : std::exception {
	parse_error(std::string const &what) 
		: what_(what)
	{}
	
	~parse_error() throw() {}

	char const *what() const throw() {
		return what_.c_str();
	}

private:
	std::string what_;
};

} // namespace afp

#endif	/* !PARSERDEFS_H */
