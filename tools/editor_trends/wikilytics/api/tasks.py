from multiprocessing import Process

from celery.decorators import task
from celery.registry import tasks

from editor_trends.utils import wikiprojects
from editor_trends import manage as manager

from wikilytics.api.models import Job

@task
def launcher():
    jobs = Job.objects.filter(finished=False)
    n = len(jobs)
    if n > 0:

        job = jobs[0]
        job.in_progress = True
        job.save()
        print 'Launching %s task' % job.type
        if job.type == 'dataset':
            res = launch_editor_trends_toolkit(job.project, job.language)
        elif job.type == 'chart':
            res = launch_chart(job.project, job.language)
        else:
            print 'Unknown job type, no handler has been configured.'

        if res == True:
            job.finished = True
            job.in_progress = False
            job.save()


def launch_editor_trends_toolkit(project, language):
    '''
    This function should only be called from within Django Wikilytics.
    '''
    res = False
    parser, settings, wiki = manager.init_args_parser()
    args = parser.parse_args(['dummy'])
    args.language = language
    args.project = project
    print args
    wiki = wikiprojects.Wiki(settings, args)
    p = Process(target=manager.all_launcher, args=(wiki, settings, None))
    p.start()
    #res = manager.all_launcher(wiki, settings, None)
    return res

def launch_chart(project, language):
    res = False


    return False


tasks.register(launcher)
