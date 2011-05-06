# This also imports the include function
from django.conf.urls.defaults import *

from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
    (r'^$', 'views.index'),
    (r'^campaigns/', include('campaigns.urls')),
    (r'^tests/', include('tests.urls')),
    (r'^admin/', include(admin.site.urls)),
)
