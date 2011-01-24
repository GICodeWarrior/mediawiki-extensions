import datetime
from django import forms

from wikilytics.api.widgets import MonthYearWidget
from editor_trends.classes import wikiprojects


wiki = wikiprojects.Wiki('settings')


years = [year for year in xrange(2001, datetime.date.today().year + 1)]
#print wiki.supported_languages()
#print wiki.supported_projects()

class SearchForm(forms.Form):
    project = forms.CharField(initial='wiki',
                              widget=forms.Select(choices=wiki.supported_projects()))

    language = forms.CharField(initial='en',
                               widget=forms.Select(choices=wiki.supported_languages(output='django')))
    #print 'Project: %s' % language
    #date = forms.DateField(widget=MonthYearWidget(years=years))

