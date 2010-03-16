package org.wikimedia.lsearch.importer;

import java.io.IOException;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Map.Entry;

import org.apache.log4j.Logger;
import org.apache.lucene.analysis.Analyzer;
import org.apache.lucene.document.Document;
import org.apache.lucene.document.Field;
import org.apache.lucene.document.Field.Index;
import org.apache.lucene.document.Field.Store;
import org.apache.lucene.index.IndexWriter;
import org.wikimedia.lsearch.analyzers.Analyzers;
import org.wikimedia.lsearch.analyzers.ExtToken;
import org.wikimedia.lsearch.analyzers.FieldBuilder;
import org.wikimedia.lsearch.analyzers.FilterFactory;
import org.wikimedia.lsearch.analyzers.ReusableLanguageAnalyzer;
import org.wikimedia.lsearch.analyzers.StopWords;
import org.wikimedia.lsearch.beans.Article;
import org.wikimedia.lsearch.beans.IndexReportCard;
import org.wikimedia.lsearch.config.GlobalConfiguration;
import org.wikimedia.lsearch.config.IndexId;
import org.wikimedia.lsearch.index.IndexUpdateRecord;
import org.wikimedia.lsearch.index.WikiIndexModifier;
import org.wikimedia.lsearch.index.WikiSimilarity;
import org.wikimedia.lsearch.ranks.Links;
import org.wikimedia.lsearch.util.Buffer;

/**
 * IndexWriter for building indexes from scratch.
 * 
 * @author rainman
 *
 */
public class SimpleIndexWriter {
	static Logger log = Logger.getLogger(SimpleIndexWriter.class);
	protected IndexId iid;
	protected HashMap<String,IndexWriter> indexes;
	protected FieldBuilder builder;
	protected Boolean optimize;
	protected Integer mergeFactor, maxBufDocs;
	protected boolean newIndex;
	protected String langCode;
	protected Links links;
	protected Analyzer indexAnalyzer;
	protected Analyzer interwikiHighlightAnalyzer;	
	protected HashSet<String> stopWords;
	protected String suffix = null;
	protected IndexId original;
	protected boolean exactCase;
	
	public SimpleIndexWriter(IndexId iid, Boolean optimize, Integer mergeFactor, Integer maxBufDocs, boolean newIndex, IndexId original){
		this.iid = iid;
		this.optimize = optimize;
		this.mergeFactor = mergeFactor;
		this.maxBufDocs = maxBufDocs;
		this.newIndex = newIndex;		
		this.original = original;
		if(original != null)
			this.suffix = original.getTitlesSuffix();
		GlobalConfiguration global = GlobalConfiguration.getInstance(); 
		langCode = iid.getLangCode();
		FieldBuilder.Case dCase = (global.exactCaseIndex(iid.getDBname()))? FieldBuilder.Case.EXACT_CASE : FieldBuilder.Case.IGNORE_CASE; 		
		builder = new FieldBuilder(iid,dCase);
		indexes = new HashMap<String,IndexWriter>();		
		indexAnalyzer = Analyzers.getIndexerAnalyzer(new FieldBuilder(iid,FieldBuilder.Case.EXACT_CASE));
		interwikiHighlightAnalyzer = Analyzers.getHighlightAnalyzer(iid,false);
		stopWords = StopWords.getPredefinedSet(iid);
		this.exactCase = global.exactCaseIndex(original.getDBname());
		// open all relevant indexes
		for(IndexId part : iid.getPhysicalIndexIds()){
			indexes.put(part.toString(),openIndex(part));
		}	
	}
	
	/** Open and initialize index denoted by iid */
	protected IndexWriter openIndex(IndexId iid) {
		String path = iid.getImportPath();
		IndexWriter writer;
		try {
			if(newIndex)
				log.info("Making new index at "+path);
			writer = new IndexWriter(path,null,newIndex); // if newIndex==true, overwrites old index
		} catch (IOException e) {				
			try {
				// try to make brand new index
				WikiIndexModifier.makeDBPath(path); // ensure all directories are made
				log.info("Making new index at path "+path);
				writer = new IndexWriter(path,null,true);
			} catch (IOException e1) {
				log.error("I/O error openning index for addition of documents at "+path+" : "+e1.getMessage(),e1);
				return null;
			}				
		}
		writer.setSimilarity(new WikiSimilarity());
		int glMergeFactor = iid.getIntParam("mergeFactor",20);
		int glMaxBufDocs = iid.getIntParam("maxBufDocs",500);
		if(mergeFactor!=null)
			writer.setMergeFactor(mergeFactor);
		else
			writer.setMergeFactor(glMergeFactor);
		if(maxBufDocs!=null)
			writer.setMaxBufferedDocs(maxBufDocs);
		else
			writer.setMaxBufferedDocs(glMaxBufDocs);		
		writer.setUseCompoundFile(true);
		writer.setMaxFieldLength(WikiIndexModifier.MAX_FIELD_LENGTH);
		
		return writer;
	}

	/** Add single article to logical index. It will add the article to the right index part 
	 * @throws IOException */
	public void addArticle(Article a) throws IOException{
		if(!WikiIndexModifier.checkAddPreconditions(a,iid))
			return; // don't add if preconditions are not met
		
		IndexId target = getTarget(a);
		IndexWriter writer = indexes.get(target.toString());
		if(writer == null || Integer.parseInt(a.getNamespace()) < 0)
			return;
		Document doc = WikiIndexModifier.makeDocument(a,builder,target,stopWords,indexAnalyzer);
		addDocument(writer,doc,a,target);
	}
	
	/** Get a target index for this article */
	protected IndexId getTarget(Article a){
		IndexId target;
		if(iid.isSingle())
			target = iid;
		else if(iid.isTitlesBySuffix())
			target = iid;
		else if(iid.isMainsplit() || iid.isNssplit()) // assign according to namespace
			target = iid.getPartByNamespace(a.getNamespace());
		else // split index, randomly assign to some index part
			target = iid.getPart(1+(int)(Math.random()*iid.getSplitFactor()));		
		
		if(target.isFurtherSubdivided()){
			target = target.getSubpart(1+(int)(Math.random()*target.getSubdivisionFactor()));
		}
		return target;
	}

	/** Add document to a writer, with all exception handling */
	protected void addDocument(IndexWriter writer, Document doc, Article a, IndexId target){
		try {
			writer.addDocument(doc,indexAnalyzer);
			log.debug(target+": Adding document "+a);
		} catch (IOException e) {
			log.error("I/O Error writing article "+a+" to index "+target.getImportPath()+" : "+e.getMessage(),e);
		} catch(Exception e){
			e.printStackTrace();
			log.error("Error adding document "+a+" with message: "+e.getMessage(),e);
		}
	}
	
	/** Add to highlight index */
	public void addArticleHighlight(Article a){
		if(!WikiIndexModifier.checkAddPreconditions(a,iid))
			return; // don't add if preconditions are not met
		IndexId target = getTarget(a);		
		IndexWriter writer = indexes.get(target.toString());
		if(writer == null)
			return;		
		try {
			Document doc = WikiIndexModifier.makeHighlightDocument(a,builder,target);
			addDocument(writer,doc,a,target);
		} catch (IOException e) {
			e.printStackTrace();
			log.error("Error adding highlight document for key="+a.getTitleObject().getKey()+" : "+e.getMessage(),e);
		}
	}
	/** Add to title to the titles index */
	public void addArticleTitle(Article a){
		if(!WikiIndexModifier.checkAddPreconditions(a,original))
			return; // don't add if preconditions are not met
		IndexId target = getTarget(a);		
		IndexWriter writer = indexes.get(target.toString());
		if(writer == null)
			return;		
		try {
			Document doc = WikiIndexModifier.makeTitleDocument(a,indexAnalyzer,interwikiHighlightAnalyzer,target,suffix,original.getDBname(),exactCase,stopWords);
			addDocument(writer,doc,a,target);
		} catch (IOException e) {
			e.printStackTrace();
			log.error("Error adding title document for key="+a.getTitleObject().getKey()+" : "+e.getMessage(),e);
		}
	}
	
	/** Close and (if specified in global config) optimize indexes 
	 * @throws IOException */
	public void close() throws IOException{
		for(Entry<String,IndexWriter> en : indexes.entrySet()){
			IndexId iid = IndexId.get(en.getKey());
			IndexWriter writer = en.getValue();
			log.info("Optimizing "+iid);
			try{
				if(optimize!=null){
					if(optimize)
						writer.optimize();
				}
				else if(iid.getBooleanParam("optimize",true))
					writer.optimize();
				writer.close();
			} catch(IOException e){
				log.warn("I/O error optimizing/closing index at "+iid.getImportPath(),e);
				throw e;
			}
		}
	}
}
