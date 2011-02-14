import datetime
import time
import json

from django.shortcuts import render_to_response
from django.http import HttpResponseRedirect, HttpResponse
from django.core.context_processors import csrf
from django.core.urlresolvers import reverse
from django.conf import settings
from django.core import serializers


from wikilytics.api.forms import SearchForm, AnalysisForm
from wikilytics.api.models import Editor, Dataset, Job, Dump
import wikilytics.api.helpers as helpers
from editor_trends.analyses import json_encoders


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
    #dbname = '%s%s' % (language, project)
    print request
        #Dataset has not yet been made, put job in queue to create the dataset
    hash = helpers.create_hash(project, language)
    job, created = Job.objects.get_or_create(hash=hash, defaults={'project':project, 'language_code': language, 'hash':hash})
    print job.hash
    if created:
        job.save()
    jobs = Job.objects.filter(jobtype='dataset', finished=False, in_progress=False)
    ds = Dataset.objects.filter(project=project, language_code=language)
    print ds
    return render_to_response('datasets.html', {'datasets': ds, 'jobs': jobs})


def chart_dispatcher(request, project, language):
    #project = '%s%s' % (project, language)
    analyses = Job.objects.exclude(jobtype='dataset').filter(finished=True, project=project, language_code=language)
    print analyses
    return render_to_response('analyses.html', {'analyses': analyses})


def chart_generator(request, project, language, chart):
    xhr = request.GET.has_key('json')
    c = {}
    print project, language, chart
    try:
        ds = Dataset.objects.get(project=project, language_code=language, name=chart)
        print ds
    except:
        hash = helpers.create_hash(project, language)
        job = Job()
        job.jobtype = chart
        job.project = project
        job.language_code = language
        job.hash = hash
        job.save()
        c['queue'] = True

    if request.POST:
        print request.POST
        chart = request.POST.get('analysis')
        return HttpResponseRedirect(reverse('chart_generator', args=[project, language, chart]))
    elif xhr:
        dthandler = lambda obj:'new Date("%s")' % datetime.date.ctime(obj) if isinstance(obj, datetime.datetime) else obj
        data = json_encoders.transform_to_json(ds)
        return HttpResponse(json.dumps(data, default=dthandler), mimetype='application/json')
    else:

        c.update(csrf(request))
        analysis = AnalysisForm()
        url = reverse('chart_generator', args=[project, language, chart])
        #url = ds.get_absolute_url()

        c['url'] = url
        c['analysis'] = analysis
        c['chart'] = chart
        return render_to_response('chart.html', c)
