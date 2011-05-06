from django.shortcuts import render_to_response
from django.http import Http404
from django.shortcuts import render_to_response, get_object_or_404
from django.template import RequestContext
from django.http import HttpResponseRedirect, HttpResponse
from django.core.urlresolvers import reverse

import sys
# sys.path.append('/home/rfaulkner/trunk/projects/')
# sys.path.append('/home/rfaulkner/trunk/projects/Fundraiser_Tools/classes')

import math
import os

import Fundraiser_Tools.classes.Helper as Hlp
import Fundraiser_Tools.classes.DataLoader as DL
import Fundraiser_Tools.classes.TimestampProcessor as TP
import Fundraiser_Tools.settings as projSet
import Fundraiser_Tools.build_report as br
import operator


"""
    <description>
    
    INPUT:
    
    RETURN:

"""
def index(request):
    return render_to_response('tests/index.html', context_instance=RequestContext(request))

"""
    <description>
    
    INPUT:
    
    RETURN:
    
"""
def test(request):
    
    """ check where the request came from """
    """ redirect based on origin if there is an error """
    """ check post data """
    
    try:
        
        test_name_var = request.POST['test_name']
        utm_campaign_var = request.POST['utm_campaign']
        start_time_var = request.POST['start_time']
        end_time_var = request.POST['end_time']
        test_type = request.POST['test_type']
        
        labels = request.POST['artifacts'][1:-1].split(',')
        label_dict = dict()
        
        for i in range(len(labels)):
            label = labels[i].split('\'')[1]
            label = label.strip()            
            label_dict[label] = label

    except:
        
        return HttpResponseRedirect(reverse('tests.views.index'))
        # pass
        
    os.chdir(projSet.__project_home__ + '/Fundraiser_Tools/classes')
    
    """ Execute Report """
    
    # Build a test interval - use the entire test period
    start_time_obj = TP.timestamp_to_obj(start_time_var, 1)
    end_time_obj = TP.timestamp_to_obj(end_time_var, 1)
    time_diff = end_time_obj - start_time_obj
    time_diff_min = time_diff.seconds / 60.0
    test_interval = int(math.floor(time_diff_min / 2)) # 2 is the interval
    
    
    
    os.chdir(projSet.__project_home__ + '/Fundraiser_Tools/web_reporting')
    
    metric_names = Hlp.get_test_type_metrics(test_type)
    
    if test_type == 'banner':
        
        winner_dpi, percent_win_dpi, conf_dpi, winner_api, percent_win_api, conf_api =  br.auto_gen(test_name=test_name_var, start_time_var, end_time_var, utm_campaign_var, label_dict, 2, test_interval)
        
        html = render_to_response('tests/results.html', {'winner' : winner_dpi, 'percent_win_dpi' : '%.2f' % percent_win_dpi, 'percent_win_api' : '%.2f' % percent_win_api, 'conf_dpi' : conf_dpi, 'conf_api' : conf_api, 'utm_campaign' : utm_campaign_var, \
                                                        'metric_names' : metric_names})
    elif test_type == 'LP':
        
        winner_dpi, percent_win_dpi, conf_dpi, winner_api, percent_win_api, conf_api =  br.auto_gen(test_name=test_name_var, start_time_var, end_time_var, utm_campaign_var, label_dict, 2, test_interval)
        
        html = render_to_response('tests/results.html', {'winner' : winner_dpi, 'percent_win_dpi' : '%.2f' % percent_win_dpi, 'percent_win_api' : '%.2f' % percent_win_api, 'conf_dpi' : conf_dpi, 'conf_api' : conf_api, 'utm_campaign' : utm_campaign_var, \
                                                        'metric_names' : metric_names})
        
    """ Write to test table !! MODIFY -- handle updates !! """
    
    ttl = DL.TestTableLoader()
    
    """ Format the html string """
    html_string = html.__str__()
    html_string = html_string.replace('"', '\\"')
    html_string = Hlp.stringify(html_string)
    
    html_string_parts = html_string.split()
    html_string = ''
    for i in html_string_parts:
        html_string = html_string + i
        
    if ttl.record_exists(utm_campaign=utm_campaign_var):
        ttl.update_test_row(test_name=test_name_var,utm_campaign=utm_campaign_var,start_time=start_time_var,end_time=end_time_var,html_report=html_string)
    else:
        ttl.insert_row(test_name=test_name_var,utm_campaign=utm_campaign_var,start_time=start_time_var,end_time=end_time_var,html_report=html_string)
    
    return html

    