def init_database(dbname):
    if dbname not in settings.DATABASES:
        settings.DATABASES[dbname] = {
            'ENGINE': 'django_mongodb_engine',
            'NAME': '%s' % dbname,
            'USER': '',
            'PASSWORD': '',
            'HOST': 'localhost',
            'PORT': '27017',
        }


def create_hash(project, language):
    today = datetime.datetime.today()
    datum = datetime.date(today.year, today.month, 1)
    secs = time.mktime(datum.timetuple())
    return hash('%s%s' % (project, language)) + hash(secs)
