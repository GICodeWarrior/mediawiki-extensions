import os

cwd = os.getcwd()
pos = cwd.rfind(os.sep)
cwd = cwd[:pos]

from __init__ import Path
Path()
