/* @(#) $Header$ */
/* This source code is in the public domain. */
/*
 * Willow: Lightweight HTTP reverse-proxy.
 * wlog: logging.
 */

#if defined __SUNPRO_C || defined __DECC || defined __HP_cc
# pragma ident "@(#)$Header$"
#endif

#include <stdio.h>
#include <stdarg.h>
#include <stdlib.h>
#include <stdarg.h>
#include <string.h>
#include <syslog.h>
#include <errno.h>

#include "config.h"

#include "wlog.h"
#include "wnet.h"
#include "wconfig.h"

struct log_variables logging;

static const char *sev_names[] = {
	"Debug",
	"Notice",
	"Warning",
	"Error",
};

static const int syslog_pri[] = {
	LOG_INFO,
	LOG_INFO,
	LOG_WARNING,
	LOG_ERR,
};

void
wlog_init(void)
{
	if (logging.syslog)
		openlog("willow", LOG_PID, logging.facility);

	if (logging.file.empty())
		return;

	/*LINTED unsafe fopen*/
	logging.fp = fopen(logging.file.c_str(), "a");
	if (logging.fp == NULL) {
		wlog(WLOG_ERROR, "Cannot open error log file: %s", logging.file.c_str());
		exit(8);
	}
}

void
wlog(int sev, const char *fmt, ...)
{
	char	s[1024];
	va_list ap;
	int	i;
struct	timeval	tv;

	if (sev > WLOG_MAX)
		sev = WLOG_NOTICE;
	if (sev < logging.level)
		return;
	va_start(ap, fmt);
	gettimeofday(&tv, NULL);
	i = snprintf(s, 1024, "%s+%.04f| %s: ", current_time_short, tv.tv_usec / 1000000.0, sev_names[sev]);
	if (i > 1023)
		abort();
	if (vsnprintf(s + i, 1023 - i, fmt, ap) > (1023 - i - 1))
		abort();
	
	if (logging.syslog)
		syslog(syslog_pri[sev], "%s", s + i);
	if (logging.fp) {
		if (fprintf(logging.fp, "%s\n", s) < 0) {
			(void)fclose(logging.fp);
			logging.fp = NULL;
			wlog(WLOG_ERROR, "writing to logfile: %s", strerror(errno));
			exit(8);
		}
	}
	
	if (config.foreground)
		(void)fprintf(stderr, "%s\n", s);
	va_end(ap);
}

void
wlog_close(void)
{
	if (logging.fp && fclose(logging.fp) == EOF) {
		logging.fp = NULL;
		wlog(WLOG_WARNING, "closing logfile: %s", strerror(errno));
	}
	
	if (logging.syslog)
		closelog();
}
