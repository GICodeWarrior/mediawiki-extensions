#! /bin/bash
#$ -N rates
#$ -j y
#$ -o query.log
#$ -t 1-NNNNN
#$ -tc 10
#$ -l sqlprocs-s1=1
#$ -m n

# Copyright (C) 2011 GIOVANNI LUCA CIAMPAGLIA, GCIAMPAGLIA@WIKIMEDIA.ORG
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
# 
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
# 
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
# http://www.gnu.org/copyleft/gpl.html
 
# Use this script to run the query on the toolserver using its Sun Grid Engine
# batch job scheduling system. SGE will run this script in parallel for each
# input file in input/, and place the output in (surprise..) output/
#
# Each input file will be fed to this script by SGE. However, SGE does not have
# any way to tell how many input files you have to process, so you have to
# manually change the comment line on top of this file to reflect this
# information:
#
# #$ -t 1-NNNNN
#
# once you have done this, you can simply submit the job to SGE using qsub:
#
# ~$ qsub < rates.sh
#
# See man qsub for more info on that. 

uid=$((SGE_TASK_ID-1))
infile=$uid.in
export PATH=$HOME/local/bin:$PATH
fetchrates -o $HOME/output $HOME/input/$infile
