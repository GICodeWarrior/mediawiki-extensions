# Create your views here.
from django.shortcuts import render_to_response
from django.http import Http404
from django.shortcuts import render_to_response, get_object_or_404
from django.template import RequestContext
from django.http import HttpResponseRedirect, HttpResponse
from django.core.urlresolvers import reverse



def index(request):
    return render_to_response('index.html')

    


