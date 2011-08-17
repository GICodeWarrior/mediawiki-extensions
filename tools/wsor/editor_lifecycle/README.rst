============
README 
============

---------
workflow
---------

This package is a collection of python and shell scripts that can assist
creating and analyzing data on user life cycle. 

Sample selection
----------------

TBD

Edit activity data collection
-----------------------------

First use `fetchrates` to download the rate data from the MySQL database. This
script takes a user_id in input (and stores the rate data in a file called
<user_id>.npy). This script can be parallelized. At the end you will end up with
a bunch of NPY files.

Cohort selection
----------------

See the docstring in `mkcohort`.

Cohort analysis
---------------

See `graphlife`, `fitting`, `fitting_batch.sh`, and `relax`.

