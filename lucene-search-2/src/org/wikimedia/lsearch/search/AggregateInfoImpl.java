package org.wikimedia.lsearch.search;

import java.io.IOException;
import java.io.Serializable;

import org.apache.log4j.Logger;
import org.apache.lucene.index.CorruptIndexException;
import org.apache.lucene.index.IndexReader;
import org.apache.lucene.search.AggregateInfo;
import org.wikimedia.lsearch.analyzers.AggregateAnalyzer;
import org.wikimedia.lsearch.analyzers.Aggregate.Flags;
import org.wikimedia.lsearch.search.AggregateMetaField.AggregateMetaFieldSource;

/**
 * Wrapper for aggregate fields info in the index. Include an instance
 * of this class into CustomPhraseQuery to use the additional meta
 * info (which is locally cached in AggregateMetaField).
 *
 * @author rainman
 *
 */
public class AggregateInfoImpl implements AggregateInfo, Serializable  {
	private static final Logger log = Logger.getLogger(AggregateInfoImpl.class);
	protected transient AggregateMetaFieldSource src = null;
	protected boolean hasRankingData = false;
	protected String field = null;

	/** Call this while (local) scorer is constructed to init cached meta info */
	public void init(IndexReader reader, String field) throws IOException {
		this.field = field;
		if(field.startsWith("alttitle"))
			hasRankingData = true;
		src = AggregateMetaField.getCachedSource(reader,field);
	}

	protected int getSlot(int pos){
		return pos / AggregateAnalyzer.TOKEN_GAP;
	}

	public int length(int docid, int pos) throws IOException {
		try{
			return src.getLength(docid,getSlot(pos));
		} catch(ArrayIndexOutOfBoundsException e){
			log.warn("Exception occured on pos="+pos,e);
			throw e;
		}
	}

	public float boost(int docid, int pos) throws IOException {
		try{
			return src.getBoost(docid,getSlot(pos));
		} catch(ArrayIndexOutOfBoundsException e){
			log.warn("Exception occured on pos="+pos,e);
			throw e;
		}
	}

	public int lengthNoStopWords(int docid, int pos) throws IOException {
		try{
			return src.getLengthNoStopWords(docid,getSlot(pos));
		} catch(ArrayIndexOutOfBoundsException e){
			log.warn("Exception occured on pos="+pos,e);
			throw e;
		}
	}

	public int lengthComplete(int docid, int pos) throws IOException {
		try{
			return src.getLengthComplete(docid,getSlot(pos));
		} catch(ArrayIndexOutOfBoundsException e){
			log.warn("Exception occured on pos="+pos,e);
			throw e;
		}
	}

	public float rank(int docid) throws IOException {
		if(hasRankingData)
			return src.getRank(docid);
		else
			throw new RuntimeException("Trying to fetch ranking data on field "+field+" where its not available.");
	}

	public int namespace(int docid) throws IOException{
		return src.getNamespace(docid);
	}

	public boolean hasRankingData() {
		return hasRankingData;
	}

	public Flags flags(int docid, int pos) throws IOException {
		try{
			return src.getFlags(docid,getSlot(pos));
		} catch(ArrayIndexOutOfBoundsException e){
			log.warn("Exception occured on pos="+pos,e);
			throw e;
		}
	}

	/** Provides ranking information */
	public static class RankInfo extends AggregateInfoImpl {
		@Override
		public void init(IndexReader reader, String field) throws IOException {
			super.init(reader, "alttitle");
		}

	}

}
