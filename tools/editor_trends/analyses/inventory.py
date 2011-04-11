#!/usr/bin/python
# coding=utf-8
'''
Copyright (C) 2010 by Diederik van Liere (dvanliere@gmail.com)
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details, at
http,//www.fsf.org/licenses/gpl.html
'''

__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__author__email = 'dvanliere at gmail dot com'
__date__ = '2011-02-11'
__version__ = '0.1'


import os
import sys
import types

def available_analyses(caller='manage'):
    '''
    Generates a dictionary:
        key: name of analysis
        value: function that generates the dataset
        ignore: a list of functions that should never be called from manage.py,
        they are not valid entry points. 
    '''
    assert caller == 'django' or caller == 'manage'
    ignore = ['__init__']
    charts = {}

    fn = os.path.realpath(__file__)
    pos = fn.rfind(os.sep)
    loc = fn[:pos]
    path = os.path.join(loc , 'plugins')
    modules = import_libs(path)

#    for module_name, module in modules.iteritems():
#        func = getattr(module, module_name)
#        plugin = module()
#        if isinstance(plugin, types.FunctionType) and plugin.func_name not in ignore:
#            charts[plugin.func_name] = plugin
    if caller == 'manage':
        return modules
    elif caller == 'django':
        django_functions = []
        for module in modules:
            fancy_name = module.replace('_', ' ').title()
            django_functions.append((module, fancy_name))

        return django_functions


def import_libs(path):
    '''
    Dynamically importing functions from the plugins directory. 
    '''
    plugins = {}
    sys.path.append(path)
    for f in os.listdir(os.path.abspath(path)):
        module_name, ext = os.path.splitext(f)
        if ext == '.py':
            module = __import__(module_name)
            plugins[module_name] = module

    return plugins
