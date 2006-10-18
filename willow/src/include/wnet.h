/* @(#) $Header$ */
/* This source code is in the public domain. */
/*
 * Willow: Lightweight HTTP reverse-proxy.
 * wnet: Networking.
 */

#ifndef WNET_H
#define WNET_H

#if defined __SUNPRO_C || defined __DECC || defined __HP_cc
# pragma ident "@(#)$Header$"
#endif

#if defined __digital__ && defined __unix__
/* sendfile prototype is missing on Tru64 UNIX */
# include <sys/uio.h>

ssize_t sendfile(int, int, off_t, size_t, const struct iovec *, int);
#endif

#include <sys/types.h>

#include <netinet/in.h>

#include "config.h"
#include <sys/time.h>
#include <event.h>

#include "willow.h"

struct fde;

extern int max_fd;

typedef void (*fdcb)(struct fde*);
typedef void (*fdwcb)(struct fde*, void*, int);

struct client_data;

struct readbuf {
	char	*rb_p;		/* start of allocated region	*/
	int	 rb_size;	/* size of allocated region	*/
	int	 rb_dsize;	/* [p,p+dsize) is valid data	*/
	int	 rb_dpos;	/* current data position	*/
};
#define readbuf_spare_size(b) ((b)->rb_size - (b)->rb_dsize)
#define readbuf_spare_start(b) ((b)->rb_p + (b)->rb_dsize)
#define readbuf_data_left(b) ((b)->rb_dsize - (b)->rb_dpos)
#define readbuf_inc_data_pos(b, i) ((b)->rb_dpos += (i))
#define readbuf_cur_pos(b) ((b)->rb_p + (b)->rb_dpos)

struct fde {
	int		 fde_fd;
	const char	*fde_desc;
	fdcb		 fde_read_handler;
	fdcb		 fde_write_handler;
struct	client_data	*fde_cdata;
	void		*fde_rdata;
	void		*fde_wdata;
	char		 fde_straddr[16];
	int		 fde_epflags;
struct	readbuf		 fde_readbuf;
	struct {
		unsigned int	open:1;
		unsigned int	held:1;
		unsigned int	pend:1;
	}		 fde_flags;
struct	event		 fde_ev;
};
extern struct fde *fde_table;

struct client_data {
struct	sockaddr_in	cdat_addr;
};

extern char current_time_str[];
extern char current_time_short[];
extern time_t current_time;
extern int wnet_exit;

#define FDE_READ	0x1
#define FDE_WRITE	0x2

void wnet_init(void);
void wnet_run(void);

void wnet_register(int, int, fdcb, void *);
int wnet_open(const char *desc);
void wnet_close(int);
void wnet_write(int, const void *, size_t, fdwcb, void *, int);
int wnet_sendfile(int, int, size_t, off_t, fdwcb, void *, int);
void wnet_set_blocking(int);

void wnet_set_time(void);
void wnet_init_select(void);

int readbuf_getdata(struct fde *);
void readbuf_free(struct readbuf *);

#endif
