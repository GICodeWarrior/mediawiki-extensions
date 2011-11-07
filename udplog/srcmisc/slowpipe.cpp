#include "../srclib/PosixClock.h"
#include <stdlib.h>
#include <unistd.h>

int main(int argc, char** argv) {
	long long rate = 1e6; // bytes per second

	if (argc > 1) {
		rate = atoll(argv[1]);
	}
	
	const int bufSize = 32768;
	char buffer[bufSize];
	ssize_t bytesRead;

	PosixClock clock(CLOCK_REALTIME);
	PosixClock::Time t = clock.Get();
	PosixClock::Time currentTime;
	PosixClock::Time maxDrift(0.001);
	for (;;) {
		bytesRead = read(STDIN_FILENO, buffer, bufSize);
		if (bytesRead <= 0) {
			return 0;
		}
		write(STDOUT_FILENO, buffer, bytesRead);

		currentTime = clock.Get();
		if (currentTime - t > maxDrift) {
			t = currentTime;
		}
		t += PosixClock::Time((double)bytesRead / rate);
		clock.NanoSleep(TIMER_ABSTIME, t);
	}
}

