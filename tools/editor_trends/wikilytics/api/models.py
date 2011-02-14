from django.db import models
from django.contrib import databrowse
from django.contrib import admin
from django.core.urlresolvers import reverse
from django.db.models import permalink

from djangotoolbox.fields import DictField, ListField


class Dataset(models.Model):
    name = models.CharField(max_length=128)
    project = models.CharField(max_length=48)
    collection = models.CharField(max_length=48)
    format = models.CharField(max_length=12)
    _type = models.CharField(max_length=15)
    filename = models.CharField(max_length=48)
    created = models.DateField()
    language_code = models.CharField(max_length=15)
    variables = DictField()

    class Meta:
        db_table = 'charts'

    def __iter__(self):
        for key, value in self.variables.items():
            #print 'KEY: %s; ValUE: %s' % (key, value)
            if isinstance(value, dict):
                print value
                for k, v in value.items():
                    print k, v
                    yield k, v

    def get_absolute_url(self):
        return reverse('chart_generator', args=[self.project, self.language_code, self.name])


#class Editor(models.Model, language_code, project):
#    username = models.CharField(max_length=64)
#    editor = models.IntegerField()
#    first_edit = models.DateField()
#    final_edit = models.DateField()
#    new_wikipedian = models.DateField()
#    monthly_edits = DictField()
#    edit_count = models.IntegerField()
#    articles_by_year = DictField()
#    edits_by_year = DictField()
#    edits = ListField()
#
#    class Meta:
#        db_table = '%s%s_editors_dataset' % (language_code, project)
#
#    def __unicode__(self):
#        return u'%s, total edits: %s' % (self.username, self.edit_count)

class EditorAdmin(admin.ModelAdmin):
    pass


class Job(models.Model):
    hash = models.CharField(max_length=48)
    project = models.CharField(max_length=15)
    language_code = models.CharField(max_length=15)
    created = models.DateField(auto_now_add=True)
    finished = models.BooleanField(default=False)
    in_progress = models.BooleanField(default=False)
    error = models.BooleanField(default=False)
    jobtype = models.CharField(max_length=15, default='dataset')

    def __unicode__(self):
        return u'%s%s' % (self.language_code, self.project)

    @permalink
    def get_absolute_url(self):
        if self.jobtype != 'dataset':
            print reverse('chart_generator', args=[self.project, self.language_code, self.jobtype])
            return ('chart_generator', (),
                    {'project': self.project,
                     'language': self.language_code,
                     'chart': self.jobtype})
        else:
            return ('dataset_dispatcher', (),
                    {'project': self.project,
                     'language': self.language_code,
                     'dataset': self.hash})
    class Meta:
        db_table = 'jobs'

class JobAdmin(admin.ModelAdmin):
    pass



class Dump(models.Model):
    project = models.CharField(max_length=15)
    dumps = DictField()

    class Meta:
        db_table = 'available_dumps'
#admin.site.register(Editor, EditorAdmin)
#admin.site.register(Job, JobAdmin)
#databrowse.site.register(Editor)
#databrowse.site.register(Job)
