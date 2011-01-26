import datetime
from django import forms

from wikilytics.api.widgets import MonthYearWidget
from editor_trends.classes import languages, projects
from editor_trends.analyses.analyzer import available_analyses



years = [year for year in xrange(2001, datetime.date.today().year + 1)]

project = projects.init()
language = languages.init()

class SearchForm(forms.Form):
    project = forms.CharField(initial='wiki',
                              widget=forms.Select(choices=project.supported_projects()))

    language = forms.CharField(initial='en',
                               widget=forms.Select(choices=language.supported_languages(output='django')))
    #print 'Project: %s' % language
    #date = forms.DateField(widget=MonthYearWidget(years=years))

class AnalysisForm(forms.Form):
    analysis = forms.CharField(widget=forms.Select(choices=available_analyses('django')))

