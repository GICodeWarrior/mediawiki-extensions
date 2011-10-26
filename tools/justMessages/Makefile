CC=gcc
LEX=flex
CFLAGS=-Wall -O3 -fwhole-program

justMessages: justMessages.c
	$(CC) $(CFLAGS) -o $@ $^

justMessages.c: justMessages.l
	$(LEX) -t $^ > $@

