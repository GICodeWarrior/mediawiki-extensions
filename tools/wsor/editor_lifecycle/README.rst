Editor lifecycle
================

Author: Giovanni Luca Ciampaglia

License
-------

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

Installation
------------

To install this package you can use the normal distutils command::

    python setup.py install    

see http://docs.python.org/install/index.html#install-index for more options.
You might require root access (sudo) to perform a system-wide installation.

Usage
-----
See http://http://meta.wikimedia.org/wiki/Research:Editor_lifecycle. All scripts
accept arguments from the command line and understand the common -h/--help
option.

Workflow
--------

1. Fetch user rates using `ratesnobots.sql`::

   mysql -BN < ratesnobots.sql > rates.tsv

Note: To be able to run this query, you must be able to access an internal
resource of the Wikimedia Foundation, see here for more information:
http://collab.wikimedia.org/wiki/WSoR_datasets/bot. If you can't access this
page, you can recreate this information from a public dump of the
`user_groups` and `user` tables in the following way:

   a. Gather usernames from bot status
   (http://en.wikipedia.org/w/index.php?title=Wikipedia:Bots/Status) and list of
   bots by number of edits
   (http://en.wikipedia.org/wiki/Wikipedia:List_of_bots_by_number_of_edits)

   b. Select the user IDs of the gathered user names from `user` 

   c. Do a union the above data with user_groups::

   SELECT DISTINCT ug_user FROM user_groups where ug_group = "bot"

2. Use `mkcohort` to define the cohorts. You can specify the temporal resolution
   (yearly, daily, monthly) and other parameters such as minimum edit count and
   minimum lifespan. This will create a tab-separated file where each line is a
   cohort. The cohort specification (period, activity rate) is reported in the
   first two columns. All columns after the first two (if any) represent IDs of
   users.

3. Use `fetchrates` to fetch daily edit counts using the cohort data. See
   `sge/rates.sh` if you want to run this query from within the toolserver. 

4. At this point you can use the other utilities to analyze the rate data. To
   compute and plot activity peaks, use `comppeak` and `plotpeak`.

5. Happy hacking/researching!
