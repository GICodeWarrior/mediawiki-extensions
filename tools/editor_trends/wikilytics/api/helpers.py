import datetime
import time


from editor_trends.utils import data_converter


def transform_to_stacked_bar_json(ds):
    '''
    This function outputs data in a format that is understood by jquery
    flot plugin. Example JSON object:
    var data = [
        {label: 'foo', data: [[1, 300], [2, 300], [3, 300], [4, 300], [5, 300]]},
        {label: 'bar', data: [[1, 800], [2, 600], [3, 400], [4, 200], [5, 0]]},
        {label: 'baz', data: [[1, 100], [2, 200], [3, 300], [4, 400], [5, 500]]},
    ];
    var options = {
        series: {stack: 0,
                 lines: {show: false, steps: false },
                 bars: {show: true, barWidth: 0.9, align: 'center', }, },
        xaxis: {ticks: [[1, 'One'], [2, 'Two'], [3, 'Three'], [4, 'Four'], [5, 'Five']]},
    };
    '''
    options = {}
    options['xaxis'] = {}
    options['xaxis']['ticks'] = []
    options['series'] = {}
    options['series']['stack'] = 0
    options['series']['lines'] = {}
    options['series']['lines']['show'] = False
    options['series']['lines']['steps'] = False
    options['series']['bars'] = {}
    options['series']['bars']['show'] = True
    options['series']['bars']['barWidth'] = 0.9
    options['series']['bars']['align'] = 'center'

    data = []
    obs, all_keys = data_converter.convert_dataset_to_lists(ds, 'django')

    for ob in obs:
        d = {}
        d['label'] = str(ob[0].year)
        d['data'] = []
        ob = ob[1:]
        for x, o in enumerate(ob):
            d['data'].append([x, o])
        data.append(d)
    for x, date in enumerate(obs):
        options['xaxis']['ticks'].append([x, date[0].year])

    d = {}
    d['data'] = data
    d['options'] = options
    return d

def create_hash(project, language):
    today = datetime.datetime.today()
    datum = datetime.date(today.year, today.month, 1)
    secs = time.mktime(datum.timetuple())
    return hash('%s%s' % (project, language)) + hash(secs)


#def init_database(dbname):
#    if dbname not in settings.DATABASES:
#        settings.DATABASES[dbname] = {
#            'ENGINE': 'django_mongodb_engine',
#            'NAME': '%s' % dbname,
#            'USER': '',
#            'PASSWORD': '',
#            'HOST': 'localhost',
#            'PORT': '27017',
#        }
