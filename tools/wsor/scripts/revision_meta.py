import sys, subprocess, os, errno, re, argparse, logging, hashlib, types
from difflib import SequenceMatcher
from gl.containers import LimitedDictLists
import wmf
from wmf import dump

def process(dump, page):
	recentRevs = LimitedDictLists(maxsize=15)
	for revision in page.readRevisions():
		checksum = hashlib.md5(revision.getText().encode("utf-8")).hexdigest()
		if checksum in recentRevs:
			#found a revert
			revertedToRev = recentRevs[checksum]
			
			#get the revisions that were reverted
			revertedRevs = [r for (c,r) in reversed(recentRevs.getQueue()) if r.getId() > revertedToRev.getId()]
			
			isVandalism = wmf.isVandalismByComment(revision.getComment())
			
			#write revert row
			yield (
				'revert',
				revision.getId(), 
				revertedToRev.getId(), 
				isVandalism,
				len(revertedRevs)
			)
			
			for rev in revertedRevs:
				yield (
					'reverted',
					rev.getId(),
					revision.getId(),
					revertedToRev.getId(), 
					isVandalism,
					len(revertedRevs)
				)
		else:
			pass
		
		
		recentRevs.insert(checksum, revision)
	

	
