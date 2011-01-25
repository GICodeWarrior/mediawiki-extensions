from django.conf import settings
from django.conf.urls.defaults import *
from django.contrib import databrowse
from wikilytics import api


# Uncomment the next two lines to enable the admin:
from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
    # Example:
    # (r'^wikilytics/', include('wikilytics.foo.urls')),
    url(r'^databrowse/(.*)', databrowse.site.root),
    url(r'^search/$', 'api.views.search', name='search'),
    #url(r'^search/(?P<project>[\w]*)/available_dumps/json/$', 'api.views.available_dumps', name='available_dumps'),
    url(r'^(?P<project>[\w]*)/(?P<language>\w{2})/datasets/$', 'api.views.dataset_dispatcher', name='dataset_dispatcher'),
    url(r'^(?P<project>[\w]*)/(?P<language>\w{2})/analyses/$', 'api.views.chart_dispatcher', name='chart_dispatcher'),
    url(r'^(?P<project>[\w]*)/(?P<language>\w{2})/analyses/(?P<chart>[\w]*)/$', 'api.views.chart_generator', name='chart_generator'),
    url(r'^static/js/(?P<path>.*)$', 'django.views.static.serve', {'document_root': settings.MEDIA_JS}),
    url(r'^static/css/(?P<path>.*)$', 'django.views.static.serve', {'document_root': settings.MEDIA_CSS}),

    # Uncomment the admin/doc line below to enable admin documentation:
    # (r'^admin/doc/', include('django.contrib.admindocs.urls')),

    # Uncomment the next line to enable the admin:
    (r'^admin/', include(admin.site.urls)),
)
