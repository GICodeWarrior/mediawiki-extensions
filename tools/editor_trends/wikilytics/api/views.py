import datetime
import time
import json

from django.shortcuts import render_to_response
from django.http import HttpResponseRedirect, HttpResponse
from django.core.urlresolvers import reverse
from django.conf import settings
from django.core import serializers


from wikilytics.api.forms import SearchForm
from wikilytics.api.models import Editor, Dataset, Job, Dump
import wikilytics.api.helpers as helpers


def search(request):
    #print request
    if request.GET:
        #form = SearchForm(request.GET)
        #print form
        project = request.GET.get('project', '')
        language = request.GET.get('language', '')
        #year = request.GET.get('date_year', '')
        #month = request.GET.get('date_month', '')
        return HttpResponseRedirect(reverse('dataset_dispatcher', args=[project, language]))
    else:
        form = SearchForm()

        return render_to_response('search.html', {'form': form})


def dataset_dispatcher(request, project, language):
    dbname = '%s%s' % (language, project)
    editors = Editor.objects.count()
    if editors == 0:
        #Dataset has not yet been made, put job in queue to create the dataset
        hash = helpers.create_hash(project, language)
        job, created = Job.objects.get_or_create(hash=hash, defaults={'project':project, 'language_code': language, 'hash':hash})
        print job.hash
        if created:
            job.save()
        jobs = Job.objects.filter(jobtype='dataset', finished=False, in_progress=True)
        return render_to_response('queue.html', {'jobs': jobs})
    else:
        ds = Dataset.objects.filter(project=project, language_code=language)
        print ds
        return render_to_response('datasets_available.html', {'datasets': ds})


def chart_dispatcher(request, project, language):
    #project = '%s%s' % (project, language)
    analyses = Job.objects.filter(jobtype='chart')
    print analyses
    return render_to_response('analyses_available.html', {'analyses': analyses})


def chart_generator(request, project, language, chart):
    xhr = request.GET.has_key('json')
    print xhr
    ds = Dataset.objects.using('enwiki').get(project=project, language_code=language, name=chart)
    if xhr:
        dthandler = lambda obj:'new Date("%s")' % datetime.date.ctime(obj) if isinstance(obj, datetime.datetime) else obj
        data = helpers.transform_to_stacked_bar_json(ds)
        return HttpResponse(json.dumps(data, default=dthandler), mimetype='application/json')
    else:
        url = ds.get_absolute_url()
        return render_to_response('chart.html', {'url': url})
