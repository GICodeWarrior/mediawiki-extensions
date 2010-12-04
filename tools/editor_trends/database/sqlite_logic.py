def retrieve_editor_ids_db():
    contributors = set()
    connection = db.init_database()
    cursor = connection.cursor()
    if settings.PROGRESS_BAR:
        cursor.execute('SELECT MAX(ROWID) FROM contributors')
        for id in cursor:
            pass
        pbar = progressbar.ProgressBar(maxval=id[0]).start()

    cursor.execute('SELECT contributor FROM contributors WHERE bot=0')

    print 'Retrieving contributors...'
    for x, contributor in enumerate(cursor):
        contributors.add(contributor[0])
        if x % 100000 == 0:
            pbar.update(x)
    print 'Serializing contributors...'
    utils.store_object(contributors, 'contributors')
    print 'Finished serializing contributors...'

    if pbar:
        pbar.finish()
        print 'Total elapsed time: %s.' % (utils.humanize_time_difference(pbar.seconds_elapsed))

    connection.close()
    
def retrieve_edits_by_contributor(input_queue, result_queue, pbar):
    connection = db.init_database()
    cursor = connection.cursor()

    while True:
        try:
            contributor = input_queue.get(block=False)
            if contributor == None:
                break

            cursor.execute('SELECT contributor, timestamp, bot FROM contributors WHERE contributor=?', (contributor,))
            edits = {}
            edits[contributor] = set()
            for edit, timestamp, bot in cursor:
                date = utils.convert_timestamp_to_date(timestamp)
                edits[contributor].add(date)
                #print edit, timestamp, bot

            utils.write_data_to_csv(edits, retrieve_edits_by_contributor)
            if pbar:
                utils.update_progressbar(pbar, input_queue)

        except Empty:
            pass

    connection.close()
    
    
def store_data_db(data_queue, pids):
    connection = db.init_database()
    cursor = connection.cursor()
    db.create_tables(cursor, db_settings.CONTRIBUTOR_TABLE)
    empty = 0
    values = []
    while True:
        try:
            chunk = data_queue.get(block=False)
            contributor = chunk['contributor'].encode(settings.encoding)
            article = chunk['article']
            timestamp = chunk['timestamp'].encode(settings.encoding)
            bot = chunk['bot']
            values.append((contributor, article, timestamp, bot))

            if len(values) == 50000:
                cursor.executemany('INSERT INTO contributors VALUES (?,?,?,?)', values)
                connection.commit()
                #print 'Size of queue: %s' % data_queue.qsize()
                values = []

        except Empty:

            if all([utils.check_if_process_is_running(pid) for pid in pids]):
                pass
            else:
                break
    connection.close()


def create_bots_db(db_name):
    '''
    This function reads the csv file provided by Erik Zachte and constructs a
    sqlite memory database. The reason for this is that I suspect I will need
    some simple querying capabilities in the future, else a dictionary would
    suffice.
    '''
    connection = db.init_database('db_name')
    #connection = db.init_database('data/database/bots.db')
    cursor = connection.cursor()
    db.create_tables(cursor, db_settings.BOT_TABLE)
    values = []
    fields = [field[0] for field in db_settings.BOT_TABLE['bots']]
    for line in utils.read_data_from_csv('data/csv/StatisticsBots.csv', settings.encoding):
        line = line.split(',')
        row = []
        for x, (field, value) in enumerate(zip(fields, line)):
            if db_settings.BOT_TABLE['bots'][x][1] == 'INTEGER':
                value = int(value)
            elif db_settings.BOT_TABLE['bots'][x][1] == 'TEXT':
                value = value.replace('/', '-')
            #print field, value
            row.append(value)
        values.append(row)

    cursor.executemany('INSERT INTO bots VALUES (?,?,?,?,?,?,?,?,?,?);', values)
    connection.commit()
    if db_name == ':memory':
        return cursor
    else:
        connection.close()
        
def retrieve_botnames_without_id(cursor, language):
    return cursor.execute('SELECT name FROM bots WHERE language=?', (language,)).fetchall()


def add_id_to_botnames():
    '''
    This is the worker function for the multi-process version of
    lookup_username.First, the names of the bots are retrieved, then the
    multiprocess is launched by making a call to pc.build_scaffolding. This is a
    generic launcher that takes as input the function to load the input_queue,
    the function that will do the main work and the objects to be put in the
    input_queue. The launcher also accepts optional keyword arguments.
    '''
    cursor = create_bots_db(':memory')
    files = utils.retrieve_file_list(settings.input_location, 'xml')

    botnames = retrieve_botnames_without_id(cursor, 'en')
    bots = {}
    for botname in botnames:
        bots[botname[0]] = 1
    pc.build_scaffolding(pc.load_queue, lookup_username, files, bots=bots)
    cursor.close()


def debug_lookup_username():
    '''
    This function launches the lookup_username function but then single
    threaded, this eases debugging. That's also the reason why the queue
    parameters are set to None. When launching this function make sure that
    debug=False when calling lookup_username
    '''
    cursor = create_bots_db(':memory')
    botnames = retrieve_botnames_without_id(cursor, 'en')
    bots = {}
    for botname in botnames:
        bots[botname[0]] = 1

    lookup_username('12.xml', None, None, bots, debug=True)
    cursor.close()
