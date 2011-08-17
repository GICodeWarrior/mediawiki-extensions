#! /bin/bash
#$ -N rates
#$ -j y
#$ -o query.log
#$ -t 1-NNNNN
#$ -tc 10
#$ -l sqlprocs-s1=1
#$ -m n

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
