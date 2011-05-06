from django.conf.urls.defaults import *


urlpatterns = patterns('',
    (r'^$', 'tests.views.index'),
    (r'^build_test$', 'tests.views.test')
)
