# This script is not meant to be run!
# It is simply a collection of commands, copied here as a reminder.

# Computing the statistics (can be parallelized):
/bin/gunzip -c /home/luca/wiki-data/enwiki/wiki-00100000.xml.gz \
    | ./evalwiki -compute_stats -si ~/wiki-data/enwork/stats/wiki-00100000.stats

/bin/gunzip -c /home/luca/wiki-data/enwiki/wiki-00100220.xml.gz \
    | ./evalwiki -compute_stats -si ~/wiki-data/enwork/stats/wiki-00100220.stats

# Sorting the statistics (use -n_digits 5 for small wikis):
./combinestats \
    -bucket_dir ~/wiki-data/enwork/buckets/ \
    -input_dir ~/wiki-data/enwork/stats/ \
    -n_digits 4 -use_subdirs

# Computing the reputations (whole histories):
./generate_reputation -u ~/wiki-data/enwork/reps/rep_history.txt \
    -buckets ~/wiki-data/enwork/buckets/ \
    -robots ~/wiki-data/wp_bots.txt

# Computing the reputations (only the final ones):
./generate_reputation -u ~/wiki-data/enwork/reps/rep_history.txt \
    -buckets ~/wiki-data/enwork/buckets/ \
    -robots ~/wiki-data/wp_bots.txt -write_final_reps

# ONLY IF NEEDED, remove previous version trees and sql.
sudo rm -rf /home/luca/wiki-data/enwork/blobtree
sudo rm -rf /home/luca/wiki-data/enwork/sql/*
# Or if you can do it without being root:
rm -rf /home/luca/wiki-data/enwork/blobtree
rm -rf /home/luca/wiki-data/enwork/sql/*

# Generating the colored pages and the sql file for batch-online:
./evalwiki -trust_for_online \
    -historyfile ~/wiki-data/enwork/reps/rep_history.txt \
    -blob_base_path ~/wiki-data/enwork/blobtree \
    -n_sigs 8 \
    -robots ~/wiki-data/wp_bots.txt \
    -d ~/wiki-data/enwork/sql \
    /home/luca/wiki-data/enwiki/wiki-00100000.xml.gz

./evalwiki -trust_for_online \
    -historyfile ~/wiki-data/enwork/reps/rep_history.txt \
    -blob_base_path ~/wiki-data/enwork/blobtree \
    -n_sigs 8 \
    -robots ~/wiki-data/wp_bots.txt \
    -d ~/wiki-data/enwork/sql \
    /home/luca/wiki-data/enwiki/wiki-00100220.xml.gz

# Or even, if you feel bold:
./evalwiki -trust_for_online \
    -historyfile ~/wiki-data/itwiki/rep_history.txt \
    -blob_base_path ~/wiki-data/enwork/blobtree \
    -n_sigs 8 \
    -robots ~/wiki-data/wp_bots.txt \
    -d ~/wiki-data/enwork/sql \
    /home/luca/wiki-data/itwiki/split-wiki/000/wiki-00000007.xml.gz

./evalwiki -trust_for_online \
    -historyfile ~/wiki-data/itwiki/rep_history.txt \
    -blob_base_path ~/wiki-data/enwork/blobtree \
    -n_sigs 8 \
    -robots ~/wiki-data/wp_bots.txt \
    -d ~/wiki-data/enwork/sql \
    /home/luca/wiki-data/itwiki/split-wiki/000/wiki-00000012.xml.gz

# To just study Corciano:
./evalwiki -trust_for_online \
    -historyfile ~/wiki-data/itwiki/rep_history.txt \
    -blob_base_path ~/wiki-data/test/blobtree \
    -n_sigs 8 \
    -robots ~/wiki-data/wp_bots.txt \
    -d ~/wiki-data/test/sql \
    /home/luca/wiki-data/itwiki/individual/000/wiki-00000037.xml.gz

# For profiling:
./evalwiki -trust_for_online \
    -historyfile ~/wiki-data/itwiki/rep_history.txt \
    -blob_base_path ~/wiki-data/test/blobtree \
    -n_sigs 8 \
    -robots ~/wiki-data/wp_bots.txt \
    -d ~/wiki-data/test/sql \
    /home/luca/wiki-data/segments/wiki-00000030.xml.gz 

# and also for profiling:
./evalwiki -trust_for_online \
    -historyfile ~/wiki-data/itwiki/rep_history.txt \
    -blob_base_path ~/wiki-data/test/blobtree \
    -n_sigs 8 \
    -robots ~/wiki-data/wp_bots.txt \
    -d ~/wiki-data/test/sql \
    /home/luca/wiki-data/segments/wiki-00000200.xml.gz 

# and also for debugging:
./evalwiki -trust_for_online \
    -historyfile ~/wiki-data/itwiki/rep_history.txt \
    -blob_base_path ~/wiki-data/test/blobtree \
    -n_sigs 8 \
    -robots ~/wiki-data/wp_bots.txt \
    -d ~/wiki-data/test/sql \
    /home/luca/wiki-data/itwiki/individual/000/wiki-00000050.xml.gz

# and also for debugging:
rm -rf ~/wiki-data/test/blobtree/*
rm -rf ~/wiki-data/test/sql/*
./evalwiki -trust_for_online \
    -historyfile ~/wiki-data/itwiki/rep_history.txt \
    -blob_base_path ~/wiki-data/test/blobtree \
    -n_sigs 8 \
    -robots ~/wiki-data/wp_bots.txt \
    -d ~/wiki-data/test/sql \
    ../test-data/amen.xml.gz

# Load the xml files in the wiki db:
cd ../test-scripts 
python load_data.py --clear_db /home/luca/wiki-data/enwiki/wiki-00100000.xml /home/luca/wiki-data/enwiki/wiki-00100220.xml
# Or simply:
python load_data.py --clear_db /home/luca/wiki-data/enwiki/wiki-00100000.xml
python load_data.py --clear_db /home/luca/wiki-data/itwiki/split-wiki/000/wiki-00000007.xml
python load_data.py --clear_db /home/luca/wiki-data/segments/wiki-00000030.xml
python load_data.py --clear_db /home/luca/wiki-data/segments/wiki-00000200.xml

# clears the old wikitrust information:
python truncate_wikitrust_tables.py

# Loads the sql in the wiki db:
mysql wikidb -u wikiuser -p < ~/wiki-data/enwork/sql/wiki-00100000.sql
mysql wikidb -u wikiuser -p < ~/wiki-data/enwork/sql/wiki-00100220.sql
mysql wikidb -u wikiuser -p < ~/wiki-data/enwork/sql/wiki-00000007.sql
mysql wikidb -u wikiuser -p < ~/wiki-data/enwork/sql/wiki-00000030.sql
mysql wikidb -u wikiuser -p < ~/wiki-data/enwork/sql/wiki-00000200.sql

# Loads the reputations in the wiki db:
cd ../analysis
cat ~/wiki-data/enwork/reps/rep_history.txt | \
  ./load_reputations -db_user wikiuser -db_pass localwiki -db_name wikidb

# Or for the full Italian ones:
cat ~/wiki-data/itwiki/rep_history.txt | \
  ./load_reputations -db_user wikiuser -db_pass localwiki -db_name wikidb

# Set the permissions correctly: 
sudo chmod a+rwX ~/wiki-data
sudo chmod -R a+rwX ~/wiki-data/enwork
sudo chmod -R a+rX ~/WikiTrust

# Check that things are indeed there:
mysql -u wikiuser -p wikidb
# ...look into tables...

# Check that on the web it looks fine. 
http://localhost/testwiki/index.php/Flint_Hill_Christian_School?trust
# and pretend someone has voted for the revision: in the mysql,
insert into wikitrust_vote values (182398671, 13409916, 'Raime', '20081204023324', 0);
# Check manually that the colored information is there:
zless /home/luca/wiki-data/enwork/blobtree/000/013/409/916/000013409916_000000008.gz
# Reset the vote if needed:
update wikitrust_vote set processed = 0 where revision_id = 182398671;
# Call for vote processing.
./eval_online_wiki -dump_db_calls \
  -db_user wikiuser -db_pass localwiki -db_name wikidb \
  -blob_base_path /home/luca/wiki-data/enwork/blobtree \
  -log_file /tmp/test.log
# Or with the debugger:
ocamldebug -I `ocamlfind query unix` -I `ocamlfind query str` \
  -I `ocamlfind query vec` -I `ocamlfind query mapmin` \
  -I `ocamlfind query hashtbl_bounded` -I `ocamlfind query fileinfo` \
  -I `ocamlfind query intvmap` -I `ocamlfind query extlib` \
  -I `ocamlfind query mysql` -I `ocamlfind query sexplib` \
  ./eval_online_wiki -dump_db_calls \
  -db_user wikiuser -db_pass localwiki -db_name wikidb \
  -blob_base_path /home/luca/wiki-data/enwork/blobtree \
  -log_file /tmp/test.log

################################################################
# To use the dispatcher:

# Clean the situation:
sudo rm -rf /home/luca/wiki-data/enwork/blobtree
sudo rm -rf /home/luca/wiki-data/enwork/sql/*
sudo rm -rf /home/luca/wiki-data/enwork/rev_cache/*
# Or
rm -rf /home/luca/wiki-data/enwork/blobtree
rm -rf /home/luca/wiki-data/enwork/sql/*
rm -rf /home/luca/wiki-data/enwork/rev_cache/*
# Then
python load_data.py --clear_db /dev/null

# Truncate wikitrust tables preserving reputation.
python truncate_wikitrust_keep_user.py

# Launch the dispatcher
./dispatcher -db_user wikiuser -db_name wikidb -db_pass localwiki \
  -use_wikimedia_api -blob_base_path ~/wiki-data/enwork/blobtree \
  -robots ~/wiki-data/wp_bots.txt \
  -log_file /tmp/dispatcher.log \
  -use_exec_api -wiki_api http://it.wikipedia.org/w/api.php \
  -wikitrust_base ~/WikiTrust/remote/analysis/ \
  -concur_procs 2  -rev_base_path ~/wiki-data/enwork/rev_cache

# Or, with debugger on:
ocamldebug -I `ocamlfind query unix` -I `ocamlfind query str` \
    -I `ocamlfind query vec` -I `ocamlfind query mapmin` \
    -I `ocamlfind query hashtbl_bounded` -I `ocamlfind query fileinfo` \
    -I `ocamlfind query intvmap` -I `ocamlfind query extlib` \
    -I `ocamlfind query mysql` -I `ocamlfind query sexplib` \
    -I ../../analysis \
    ./dispatcher -db_user wikiuser -db_name wikidb -db_pass localwiki \
    -use_wikimedia_api -blob_base_path ~/wiki-data/enwork/blobtree \
    -robots ~/wiki-data/wp_bots.txt \
    -log_file /tmp/dispatcher.log \
    -use_exec_api -wiki_api http://it.wikipedia.org/w/api.php \
    -concur_procs 2  -rev_base_path ~/wiki-data/enwork/rev_cache


# Put some data in it. 
INSERT INTO wikitrust_queue (page_id, page_title) VALUES (556792, "Moncalieri");
INSERT INTO wikitrust_queue (page_id, page_title) VALUES (38166, "Chieri");

# Look at some revisions via:
./read_revision  -db_user wikiuser -db_name wikidb -db_pass localwiki \
    -blob_base_path ~/wiki-data/enwork/blobtree \
    -rev_id 2754456
