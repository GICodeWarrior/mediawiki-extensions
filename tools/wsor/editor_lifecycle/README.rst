============
README 
============

Copyright (C) 2011 GIOVANNI LUCA CIAMPAGLIA, GCIAMPAGLIA@WIKIMEDIA.ORG
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
http://www.gnu.org/copyleft/gpl.html

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

