#!/usr/bin/python
""" Given a list of files containing class definitions in the order of their class
hierarchy, this program will print the class names and function names that will
actually get executed when you call $this->function() """

import sys, re

functions = {}
classes = {}
cl = None
for fn in sys.argv[1:]:
    for line in open(fn):
        match = re.match(r'(abstract\s+)?class\s+(.*?)\s+(extends\s+(.*?)\s+)?\{', line)
        if match:
            cl = match.group(2)
            supercl = match.group(4)
            classes[cl] = supercl
            if supercl:
                classes[supercl] # superclass should already exist

        match = re.match(r'\s*(public\s+|static\s+)?function\s+(.*?)\(', line)
        if match:
            # we have a function definition.
            funct = match.group(2)
            functions[funct] = cl

keys = functions.keys()
keys.sort()
for key in keys:
    print key,functions[key]

