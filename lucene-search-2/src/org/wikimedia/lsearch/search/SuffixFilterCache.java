package org.wikimedia.lsearch.search;

import java.io.IOException;
import java.util.BitSet;
import java.util.Hashtable;

import org.apache.log4j.Logger;
import org.apache.lucene.index.IndexReader;
import org.apache.lucene.index.Term;
import org.apache.lucene.index.TermDocs;
import org.apache.lucene.search.Filter;

public class SuffixFilterCache {
	static Logger log = Logger.getLogger(SuffixFilterCache.class);
	protected static Hashtable<SuffixFilter,CachedFilter> cache = new Hashtable<SuffixFilter,CachedFilter>();
	
	/** class to create the bitset that is to be cached */
	protected static class SuffixFilterBuilder extends Filter {
		SuffixFilter filter;
		
		public SuffixFilterBuilder(SuffixFilter filter) {
			this.filter = filter;
		}

		@Override
		public BitSet bits(IndexReader reader) throws IOException {
			String exclude = filter.getExcludeSuffix();
			int maxDoc = reader.maxDoc();
			BitSet b = new BitSet(maxDoc);
			b.set(0,maxDoc);
			// unset all the docs with the excluded suffix
			TermDocs td = reader.termDocs(new Term("suffix",exclude));
			while(td.next()){
				b.set(td.doc(),false);
			}
			return b;
		}
		
	}
	
	/** Get locally cached bitset for the filter */
	public static BitSet bits(SuffixFilter filter, IndexReader reader) throws IOException {
		synchronized(reader){
			CachedFilter cwf = cache.get(filter);
			if(cwf == null){
				cwf = new CachedFilter(new SuffixFilterBuilder(filter));
				cache.put(filter,cwf);
			}
			return cwf.bits(reader);
		}
	}

}
