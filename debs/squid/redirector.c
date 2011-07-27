/* 
 *
 * Squid Redirect Helper - reads from stdin, outputs 302 to $1.m.wikipedia.org/$2 
 * if original matches "^http:\\/\\/(\\w+)\\.wikipedia\\.org[:\\d]*\\/(.*)" 
 * A new base url in place of m.wikipedia.org may be provided as the only argument. 
 *
 * To compile: gcc -O3 -o redirector -lpcre redirector.c
 *
 */

#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <string.h>
#include <malloc.h>
#include <pcre.h>

#define MAX_BUFF 8256
#define OVECCOUNT 30    /* should be a multiple of 3 */

struct IN_BUFF {
  char *url;
};

int load_in_buff(char *buff, struct IN_BUFF *in_buff) {
	in_buff->url = strtok(buff, " ");

	if(strlen(in_buff->url) <= 4) {
		return 1;
	}

	return 0;
}

int main(int argc, char **argv) {
	pcre *re;
	const char *error;
	char *pattern;
	int erroffset;
	int ovector[OVECCOUNT];
	int subject_length;
	int rc, i;
	char buff[MAX_BUFF];

	struct IN_BUFF in_buff;
	pattern = "^http:\\/\\/(\\w+)\\.wikipedia\\.org[:\\d]*\\/(.*)";
	pcre_extra *pe;

	char replacement_url[MAX_BUFF] = "302:http://%s.m.wikipedia.org/%s\n";

	if (argv[1] != NULL) {
		char replacement_url_pattern[] = "302:%s\n";
		char *command_line_url = argv[1];
		sprintf(replacement_url, replacement_url_pattern, command_line_url);	
	}

	/* make standard output line buffered */
	//setvbuf(stdout, NULL, _IOLBF, 0);
	setbuf(stdout, NULL);
	
	re = pcre_compile(
				pattern,              /* the pattern */
				0,                    /* default options */
				&error,               /* for error message */
				&erroffset,           /* for error offset */
				NULL);                /* use default character tables */

	if (!re) {
		fprintf(stderr, "pcre_compile failed at offset %d: %s\n", erroffset, error);
		exit(1);
	}
	
	pe = pcre_study(re, 0,  &error);

	while(fgets(buff, MAX_BUFF, stdin) != NULL) {

		if (load_in_buff(buff, &in_buff) != 0) {
			fprintf(stderr, "Error loading data %s\n", buff);
			continue;
		}

		subject_length = (int)strlen(in_buff.url);

		rc = pcre_exec(
				re,                   /* the compiled pattern */
				pe,                   /* no extra data - we didn't study the pattern */
				in_buff.url,         /* the subject string */
				subject_length,       /* the length of the subject */
				0,                    /* start at offset 0 in the subject */
				0,                    /* default options */
				ovector,              /* output vector for substring information */
				OVECCOUNT);           /* number of elements in the output vector */

		if (rc < 0) {
			switch(rc) {
				case PCRE_ERROR_NOMATCH:
					printf("%s", in_buff.url);
					fflush(stdout);
					
					break;
				default:
					fprintf(stderr, "Matching error %d\n", rc);
					break;
			}
			continue;
		}

		char lang[20] = "";
		char path[MAX_BUFF] = "";

		for (i = 0; i < rc; i++) {

			char *substring_start = in_buff.url + ovector[2*i];
			int substring_length = ovector[2*i+1] - ovector[2*i];
			if (i == 1) {
				if (substring_length >= sizeof(lang)) {
					substring_length = sizeof(lang) - 2;
				}
				memcpy(lang, substring_start, substring_length);
				lang[substring_length] = '\0';
			} else if (i == 2) {
				if (substring_length >= MAX_BUFF) {
					substring_length = MAX_BUFF - 2;
				}
				memcpy(path, substring_start, substring_length);
				path[substring_length] = '\0';
			}
		}

		if (strlen(path) > 0) {
			printf(replacement_url, lang, path);
		}

		fflush(stdout);
	}

	pcre_free(re);

	return 0;
}
