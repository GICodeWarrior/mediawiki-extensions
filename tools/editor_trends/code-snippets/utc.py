import datetime

import time
import sys

sys.path.append('..')
import  configuration
settings = configuration.Settings()

timestamp = '2009-02-18T20:47:12Z'

def convert_timestamp_to_date(timestamp):
    return datetime.datetime.strptime(timestamp[:10], settings.date_format)


def convert_timestamp_to_datetime(timestamp):
    return datetime.datetime.strptime(timestamp, settings.timestamp_format)

def astimezone(self, tz):
    if self.tzinfo is tz:
        return self
    # Convert self to UTC, and attach the new time zone object.
    utc = (self - self.utcoffset()).replace(tzinfo=tz)
    # Convert from UTC to tz's local time.
    return tz.fromutc(utc)

def convert_timestamp_to_datetime_utc(timestamp):
    return time.gmtime(time.mktime(time.strptime(timestamp, settings.timestamp_format)))


t = convert_timestamp_to_datetime_utc(timestamp)
d =datetime.datetime.fromtimestamp(time.mktime(t))
tz  = datetime.tzinfo('utc')
d1 = convert_timestamp_to_datetime(timestamp)
d2 = d1.replace(tzinfo=tz)
print tz

print t
print d 