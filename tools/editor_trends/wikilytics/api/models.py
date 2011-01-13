from django.db import models
from django.contrib import databrowse
from django.contrib import admin
from djangotoolbox.fields import DictField, ListField


class Editor(models.Model):
    username = models.CharField(max_length=64)
    editor = models.IntegerField()
    first_edit = models.DateField()
    final_edit = models.DateField()
    new_wikipedian = models.DateField()
    monthly_edits = DictField()
    edit_count = models.IntegerField()
    articles_by_year = DictField()
    edits_by_year = DictField()
    edits = ListField()

    class Meta:
        db_table = 'editors_dataset'

    def __unicode__(self):
        return u'%s, total edits: %s' % (self.username, self.edit_count)


class EditorAdmin(admin.ModelAdmin):
    pass

admin.site.register(Editor, EditorAdmin)
databrowse.site.register(Editor)
