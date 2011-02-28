package org.wikimedia.lsearch.config;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.Hashtable;
import java.util.concurrent.locks.Lock;
import java.util.concurrent.locks.ReentrantLock;

import org.apache.log4j.Logger;
import org.apache.lucene.search.ArticleNamespaceScaling;
import org.wikimedia.lsearch.analyzers.FilterFactory;
import org.wikimedia.lsearch.search.NamespaceFilter;
import org.wikimedia.lsearch.search.SearcherCache;

/**
 * Encapsulated an index ID in form db.part, e.g. entest.mainpart.
 * It identifies each index part in the system. If entest is the name
 * of the database, and it uses mainsplit architecture, there will be
 * three IndexIds: <br/>
 *   entest (main index, logical),<br/> 
 *   entest.mainpart (index where the documents from mainspace are),<br/> 
 *   entest.restpart (index where all other documents are) .<br/>
 *   <br/>
 * The object is global, and provides all possible information about
 * the particular index. Abreviated: iid.
 * 
 *  
 * @author rainman
 *
 */
public class IndexId {
	static org.apache.log4j.Logger log = Logger.getLogger(IndexId.class);
	/** Where the index is */
	protected String indexHost;
	/** Path to index on remote machine */
	protected String indexRsyncPath; 
	
	/** Type (single, mainsplit, split) in string repesentation */
	protected String typeString; 
	/** Parameters associated with type, e.g. number of split parts */
	protected Hashtable<String,String> typeParams;
	
	/** All hosts that search this index */
	protected HashSet<String> searchHosts;
	/** All hosts within my group (of current machine) that search the index */ 
	protected HashSet<String> mySearchHosts;
	/** If this hosts searches the index */
	protected boolean mySearch;
	
	/** Database name, e.g. for entest.mainpart, it's entest */
	protected String dbname;
	/** The part after the dot in the name, e.g. for entest.mainpart, it's mainpart */
	protected String part;
	/** The string representation of IndexId, e.g. entest.mainpart */
	protected String dbrole;
	/** The sub-division part, e.g. sub1 in enwiki.mainpart.sub1 */
	protected String subpart;
	
	/** Names of split indexes, e.g. entest.part1, entest.part2 ... */
	protected String[] splitParts;
	/** The number of subindexes in split architecture */
	protected int splitFactor;
	
	/** If true, this machine is an indexer for this index */
	protected boolean myIndex;
	
	protected enum IndexType { SINGLE, MAINSPLIT, SPLIT, NSSPLIT, SPELL, LINKS, RELATED, 
		PREFIX, TITLE_NGRAM, SUBDIVIDED, TITLES_BY_SUFFIX, PRECURSOR };
		
	/** the index of this subdivided part */
	protected int subpartNum;
	/** total number of subdivided parts */
	protected int subFactor;
	/** if this index (e.g. enwiki.mainpart) is further subdivided */
	protected boolean furtherSubdivided;
	/** full dbroles of every subpart, e.g. enwiki.nspart1.sub1, enwiki.nspart1.sub2 ..  */
	protected String[] subParts = null;
	
	/** If this is the highlight index, containing the fulltext version of articles */
	protected boolean highlight = false; 
	
	/** Type of index, enumeration */
	protected IndexType type;
	/** Part number in split representation, e.g. 1..N */
	protected int partNum;
	
	/** Namespace -> part (for nssplit indexes) */
	protected Hashtable<String,String> nssplitMap;
	
	/** Set of namespaces for this nssplit part */
	protected HashSet<String> namespaceSet;
	
	/** All parameters as they appear in the global conf, e.g. merge factor, optimize, etc.. */
	protected Hashtable<String,String> params;
	
	/** Where the indexer writes the current version of index */
	protected String indexPath;
	/** Where the searcher stores the latest snapshot of index */
	protected String searchPath = null;
	/** Where the indexer places the snapshots */
	protected String snapshotPath;
	/** Path of index updates on searcher */
	protected String updatePath = null;
	/** Build path for indexes from xml import */
	protected String importPath;
	/** Path where status files are for incremental updater */
	protected String statusPath;
	/** Path where transaction data is stored */
	protected Hashtable<Transaction,String> transactionPath;
	/** Path to temporary index (e.g. for rebuilding spell-check words) */
	protected String tempPath;
	
	/** Index where titles for this index are */
	protected String titlesIndex;
	/** Suffix used to group titles by */
	protected String titlesSuffix; 
	/** For titles part (tspart) indexes, maps suffix -> iw */
	protected Hashtable<String,String> suffixIwMap = null;
	/** For titles parts (tspart) indexes, map suffix -> dbname */
	protected Hashtable<String,String> suffixToDbname = null;
	/** Dbname after suffix is deleted */
	protected String reducedDbname = null;
	
	/** url of OAI repository */
	protected String OAIRepository;
	
	protected String rsyncSnapshotPath = null;
	
	/** language code, e.g. "en" */
	protected String langCode = null;
	
	/** if this is index that doesn't capitalize first letters of titles */
	protected Boolean exactCase = null;
	
	/** Namespaces that are searched by default */
	protected NamespaceFilter defaultNs = null;
	
	/** Filter set to true for namespaces with subpages */
	protected NamespaceFilter nsWithSubpages = null;
	
	/** Namespaces with content (from initialise settings) */
	protected NamespaceFilter contentNamespaces = null;
	
	/** If we should be using additional global rank for scores */
	protected Boolean useAdditionalRank = null;
	
	/** on which index image are we doing transaction */
	public static enum Transaction {INDEX, IMPORT, TEMP}; 
	
	public static enum AgeScaling { WEAK, MEDIUM, STRONG, NONE };
	
	protected AgeScaling ageScaling = null;
	
	/** lock used in {@link SearcherCache} class */
	protected Object searcherCacheLock  = new Object();

	/** locks used to serialize transactions on different transaction paths */
	protected Hashtable<Transaction,Lock> transactionLocks = new Hashtable<Transaction,Lock>();
	
	/** Namespace boost mapping */
	protected ArticleNamespaceScaling namespaceScaling = null;

	/**
	 * Get index Id object given it's string representation, the actual object
	 * is pulled out of the GlobalConfigurations prepopulated pool of all possible
	 * index Ids
	 * 
	 * @param dbrole
	 * @return
	 */
	static public IndexId get(String dbrole){
		IndexId ret = GlobalConfiguration.getIndexId(dbrole);
		if(ret == null)
			throw new RuntimeException("Index "+dbrole+" doesn't exist");
		return ret;
	}
		
	/**
	 * Construct new IndexId given all the information that is to be 
	 * known about this index location
	 * 
	 * @param dbrole   string repesentation of IndexId, e.g. entest.mainpart
	 * @param type     type, e.g. mainsplit
	 * @param indexHost    where the indexer is
	 * @param indexRsyncPath    the rsync base of path
	 * @param typeParams    parameters of type, e.g. split factor
	 * @param params    parameters of this index, e.g. merge factor, optimize, .. 
	 * @param searchHosts    all hosts that search this index
	 * @param mySearchHosts   searcher hosts within this machines group
	 * @param localIndexPath   the path of local indexes  
	 * @param myIndex    if this machines is an indexer for this index
	 * @param mySearch   if this machine is a searcher for this index
	 */
	public IndexId(String dbrole, String type, String indexHost, String indexRsyncPath, 
			Hashtable<String, String> typeParams, Hashtable<String, String> params, 
			HashSet<String> searchHosts, HashSet<String> mySearchHosts, String localIndexPath, 
			boolean myIndex, boolean mySearch, String OAIRepository, boolean isSubdivided,
			String titlesIndex, String titlesSuffix, Hashtable<String,String> suffixToDbname) {
		final String sep = Configuration.PATH_SEP;
		this.indexHost = indexHost;
		if(!indexRsyncPath.endsWith("/"))
			indexRsyncPath += "/";
		if(!indexRsyncPath.startsWith("/"))
			indexRsyncPath = "/" + indexRsyncPath;
		if(localIndexPath!= null && !localIndexPath.endsWith(sep))
			localIndexPath += sep;
		this.indexRsyncPath = indexRsyncPath;
		this.typeString = type;
		this.typeParams = typeParams;
		this.searchHosts = searchHosts;
		this.mySearchHosts = mySearchHosts;
		this.myIndex = myIndex;
		this.mySearch = mySearch;
		this.dbrole = dbrole;
		this.params = params;
		this.OAIRepository = OAIRepository;
		this.furtherSubdivided = isSubdivided;
		this.titlesIndex = titlesIndex;
		this.titlesSuffix = titlesSuffix;		
		this.suffixToDbname = suffixToDbname;
		
		// types
		if(type.equals("single"))
			this.type = IndexType.SINGLE;
		else if(type.equals("mainsplit"))
			this.type = IndexType.MAINSPLIT;
		else if(type.equals("split"))
			this.type = IndexType.SPLIT;
		else if(type.equals("nssplit"))
			this.type = IndexType.NSSPLIT;
		else if(type.equals("spell"))
			this.type = IndexType.SPELL;
		else if(type.equals("links"))
			this.type = IndexType.LINKS;
		else if(type.equals("related"))
			this.type = IndexType.RELATED;
		else if(type.equals("prefix"))
			this.type = IndexType.PREFIX;
		else if(type.equals("title_ngram"))
			this.type = IndexType.TITLE_NGRAM;
		else if(type.equals("subdivided"))
			this.type = IndexType.SUBDIVIDED;
		else if(type.equals("titles_by_suffix"))
			this.type = IndexType.TITLES_BY_SUFFIX;
		else if(type.equals("precursor"))
			this.type = IndexType.PRECURSOR;
		
		// highlight index
		String suffix = "";
		if(dbrole.endsWith(".hl")){
			highlight = true;
			dbrole = dbrole.substring(0,dbrole.lastIndexOf('.'));
			suffix = ".hl";
		}
		if(dbrole.endsWith(".pre")){
			dbrole = dbrole.substring(0,dbrole.lastIndexOf('.'));
			suffix += ".pre";
		}
		
		// parts
		part = null;
		subpart = null;
		subpartNum = -1;
		String[] parts = dbrole.split("\\.");
		dbname = parts[0];		
		if(parts.length==2)
			part = parts[1];
		else if(parts.length==3 && this.type == IndexType.SUBDIVIDED){
			part = parts[1];
			subpart = parts[2];
			subpartNum = Integer.parseInt(subpart.substring(3));
		}
		
		if(titlesSuffix != null)
			reducedDbname = dbname.substring(0,dbname.indexOf(titlesSuffix));
		
		partNum = -1;
		splitParts = null;
		// split part names
		if(this.type == IndexType.MAINSPLIT){
			splitParts = new String[2];
			splitParts[0] = dbname+".mainpart"+suffix;
			splitParts[1] = dbname+".restpart"+suffix;
			
			if(part == null);
			else if(part.equalsIgnoreCase("mainpart"))
				partNum = 0;
			else if(part.equalsIgnoreCase("restpart"))
				partNum = 1;
		} else if(this.type == IndexType.SPLIT){
			splitFactor = Integer.parseInt(typeParams.get("number"));
			splitParts = new String[splitFactor];
			for(int i=0;i<splitFactor;i++)
				splitParts[i] = dbname+".part"+(i+1)+suffix;
			if(part != null)
				partNum = Integer.parseInt(part.substring(4));
			else
				partNum = 0;
		} else if(this.type == IndexType.NSSPLIT){
			splitFactor = Integer.parseInt(typeParams.get("number"));
			splitParts = new String[splitFactor];
			for(int i=0;i<splitFactor;i++)
				splitParts[i] = dbname+".nspart"+(i+1)+suffix;			
			if(part!=null){
				partNum = Integer.parseInt(part.substring(6));
				namespaceSet = new HashSet<String>();
				String[] nss = params.get("namespaces").split(",");
				for(String ns : nss)
					namespaceSet.add(ns.trim());	 
			} else
				partNum = 0;
		} else if(this.type == IndexType.TITLES_BY_SUFFIX){ // split by default
			splitFactor = Integer.parseInt(typeParams.get("number"));
			splitParts = new String[splitFactor];
			for(int i=0;i<splitFactor;i++)
				splitParts[i] = dbname+".tspart"+(i+1)+suffix;
			// additional params
			if(part!=null){				
				partNum = Integer.parseInt(part.substring(6));
				suffixIwMap = params;
			} else
				partNum = 0;
		}
		
		// handle subdivided indexes
		if(isSubdivided){
			subFactor = Integer.parseInt(params.get("subdivisions"));
			subParts = new String[subFactor];
			for(int i=1;i<=subFactor;i++)
				subParts[i-1] = dbname+"."+part+".sub"+i+suffix;
			if(this.type == IndexType.SUBDIVIDED)
				this.furtherSubdivided = false; // cannot futher subdivide
			else
				this.furtherSubdivided = true;
		}
		
		// for split/mainsplit the main iid is logical, it doesn't have local path
		/* if(myIndex 
				&& !(part == null && (this.type==IndexType.SPLIT || this.type==IndexType.MAINSPLIT || this.type==IndexType.NSSPLIT || this.type==IndexType.TITLES_BY_SUFFIX))
				&& !furtherSubdivided){ */
			indexPath = localIndexPath + "index" + sep + this.dbrole;
			importPath = localIndexPath + "import" + sep + this.dbrole;
			snapshotPath = localIndexPath + "snapshot" + sep + this.dbrole;
		/* } else{
			indexPath = null;
			importPath = null;
			snapshotPath = null;
		} */
		
		rsyncSnapshotPath = indexRsyncPath+"snapshot/" + this.dbrole;
		statusPath = localIndexPath + "status" + sep + this.dbrole;
		String transRoot = localIndexPath + "transaction" + sep + this.dbrole + sep; 
		transactionPath = new Hashtable<Transaction,String>();		
		transactionPath.put(Transaction.INDEX,transRoot+"index");
		transactionPath.put(Transaction.IMPORT,transRoot+"import");
		transactionPath.put(Transaction.TEMP,transRoot+"temp");
		transactionLocks.put(Transaction.INDEX,new ReentrantLock());
		transactionLocks.put(Transaction.IMPORT,new ReentrantLock());
		transactionLocks.put(Transaction.TEMP,new ReentrantLock());
		tempPath = localIndexPath + "temp" + sep + this.dbrole;

		//if(mySearch){
			searchPath = localIndexPath + "search" + sep + this.dbrole;
			updatePath = localIndexPath + "update" + sep + this.dbrole;
		/*} else{
			searchPath = null;
			updatePath = null;
		} */
		
	}
	
	/** If this is logical name referring to a set of split indexes */
	public boolean isLogical(){
		return (part == null && type != IndexType.SINGLE) || (subpart==null && furtherSubdivided);
	}	
	/** If type of this index is single */
	public boolean isSingle(){
		return type == IndexType.SINGLE;
	}
	/** If type of this index is mainsplit */
	public boolean isMainsplit(){
		return type == IndexType.MAINSPLIT;
	}
	/** If type of this index is split */
	public boolean isSplit(){
		return type == IndexType.SPLIT;
	}
	/** If type of this index is mainsplit */
	public boolean isNssplit(){
		return type == IndexType.NSSPLIT;
	}
	/** If this is the spell-check index */
	public boolean isSpell(){
		return type == IndexType.SPELL;
	}
	/** If this is the index storing pagelinks */
	public boolean isLinks(){
		return type == IndexType.LINKS;
	}
	/** If this is the index storing info about related articles */
	public boolean isRelated(){
		return type == IndexType.RELATED;
	}
	/** If this is the index storing article list for specific prefixes */
	public boolean isPrefix(){
		return type == IndexType.PREFIX;
	}
	/** If this index hold all titles ngrams */
	public boolean isTitleNgram(){
		return type == IndexType.TITLE_NGRAM;
	}	
	/** If this is index is subdivided part of a logical index */
	public boolean isSubdivided(){
		return type == IndexType.SUBDIVIDED;
	}
	/** If this is grouping titles by suffix */
	public boolean isTitlesBySuffix(){
		return type == IndexType.TITLES_BY_SUFFIX;
	}
	/** If this is a precursor index to the root index (e.g. enwiki.spell.pre for enwiki.spell) */
	public boolean isPrecursor(){
		return type == IndexType.PRECURSOR;
	}
	/** Is one of main article indexes, e.g. *not* spell, related, links etc.. */
	public boolean isArticleIndex(){
		return (isSingle() || isMainsplit() || isSplit() || isNssplit() || isSubdivided()) 
		&& !isHighlight() && !isTitlesBySuffix() && !isSpell() && !isPrefix() && !isPrecursor() && !isTitleNgram()
		&& !isLinks() && !isRelated();
	}
	
	/** If this is a split index, returns the current part number, e.g. for entest.part4 will return 4 */
	public int getPartNum() {
		if(type == IndexType.SPLIT || type == IndexType.NSSPLIT || type == IndexType.MAINSPLIT)
			return partNum;
		else{
			log.error("Called getPartNum() on non-split object! Probably a bug in the code.");
			return 0;
		}
	}
	/** Get parameters of index, e.g. "mergeFactor", "maxBufDocs", "optimize" */
	public String getParam(String id){
		return params.get(id);
	}
	/** Get an int parameters, similar to getParam, but assumes int return value */
	public int getIntParam(String id, int defaultValue){
		String num = params.get(id);
		if(num == null)
			return defaultValue;
		try{
			int n = Integer.parseInt(num);
			return n;
		} catch(Exception e){
			return defaultValue;
		}
	}
	/** Get an int parameters, similar to getParam, but assumes boolean return value */
	public boolean getBooleanParam(String id, boolean defaultValue){
		String num = params.get(id);
		if(num == null)
			return defaultValue;
		try{
			boolean b = Boolean.parseBoolean(num);
			return b;
		} catch(Exception e){
			return defaultValue;
		}
	}
	
	/** Get if this is mainpart of mainsplit index */
	public boolean isMainPart(){
		return type == IndexType.MAINSPLIT && partNum == 0;
	}
	
	/** Get if this is restpart of mainsplit index */
	public boolean isRestPart(){
		return type == IndexType.MAINSPLIT && partNum == 1;
	}

	
	@Override
	public String toString() {
		return dbrole;
	}

	/** If this is the index containing higlighing info */
	public boolean isHighlight(){
		return highlight;
	}
	/** If this index (e.g. mainpart) has been subdivided into smaller indexes */
	public boolean isFurtherSubdivided(){
		return furtherSubdivided;
	}	
	/** Get textual repesentation of subdivided part, e.g. sub1 */
	public String getSubpartString(){
		return subpart;
	}
	/** Get number of this index in array of subivisions, 1..subFactor */
	public int getSubpartNum(){
		return subpartNum;
	}
	/** Return the number of subdivided parts */
	public int getSubdivisionFactor(){
		return subFactor;
	}
	/** Get string representations of all subparts */
	public String[] getSubparts(){
		return subParts;
	}
	/** Get iid of subpart with index i */
	public IndexId getSubpart(int i){
		return get(subParts[i-1]);
	}
	
	/** Get IndexId for the mainpart of mainsplit index */
	public IndexId getMainPart(){
		if(type == IndexType.MAINSPLIT)
			return get(splitParts[0]);
		else{
			log.error("Called getMainPart() on non-mainsplit object! Probably a bug in the code.");
			return null;
		}
	}
	/** Get IndexId for the restpart of mainsplit index */
	public IndexId getRestPart(){
		if(type == IndexType.MAINSPLIT)
			return get(splitParts[1]);
		else{
			log.error("Called getRestPart() on non-mainsplit object! Probably a bug in the code.");
			return null;
		}
	}
	/** Get snapshot path in default rsync module "mwsearch" */
	public String getRsyncSnapshotPath() {
		return rsyncSnapshotPath;
	}
	
	public String getPath(Transaction type){
		switch(type){
		case INDEX: return getIndexPath();
		case IMPORT: return getImportPath();
		case TEMP: return getTempPath();
		}
		throw new RuntimeException("Unknown transaction type "+type);
	}

	/** Where the indexer writes the current version of index */
	public String getIndexPath() {
		if(!myIndex)
			throw new RuntimeException("Trying to retrieve index path for "+dbrole+", but index not indexed by this host");
		return indexPath;
	}
	/** Where the searcher stores the latest snapshot of index */
	public String getSearchPath() {
		if(!mySearch)
			throw new RuntimeException("Trying to retrieve search path for "+dbrole+", but index not searched by this host");
		return searchPath;
	}
	/** Where the indexer places the snapshots */
	public String getSnapshotPath() {
		if(!myIndex)
			throw new RuntimeException("Trying to retrieve snapshot path for "+dbrole+", but index not indexed by this host");
		return snapshotPath;
	}
	/** Where the searcher fetches the snapshot via rsync */
	public String getUpdatePath() {
		if(!mySearch)
			throw new RuntimeException("Trying to retrieve update path for "+dbrole+", but index not searched by this host");
		return updatePath;
	}
	/** Where indexes are made when built from XML importing */
	public String getImportPath() {
		if(!myIndex)
			throw new RuntimeException("Trying to retrieve import path for "+dbrole+", but index not indexed by this host");
		return importPath;
	}
	/** Where transaction data is stored */
	public String getTransactionPath(Transaction type) {
		return transactionPath.get(type);
	}
	/** Status file for incremental updater */ 
	public String getStatusPath() {
		return statusPath;
	}
	/** Path for temporary indexes */ 
	public String getTempPath() {
		return tempPath;
	}

	/** Get search path with resolved symlinks */
	public String getCanonicalSearchPath(){
		try {
			return new File(searchPath).getCanonicalPath();
		} catch (IOException e) {
			return searchPath;
		}
	}
	
	/** Get IndexId for part of the split index. Parts are indexed 1...N */
	public IndexId getPart(int index){
		return get(splitParts[index-1]);
	}
	
	/** Get database name, e.g. for entest.mainpart, it's entest */
	public String getDBname() {
		return dbname;
	}

	/** Where the indexer is */
	public String getIndexHost() {
		return indexHost;
	}

	/** If current host is an indexer for this index */
	public boolean isMyIndex() {
		return myIndex;
	}

	/** all hosts that search this index */
	public HashSet<String> getSearchHosts() {
		return searchHosts;
	}
	
	protected void addToHosts(HashSet<String> hosts, String[] splitParts){
		for(String splitpart : splitParts){
			if(get(splitpart)!=null)
				hosts.addAll(get(splitpart).getSearchHosts());
		}
	}
	
	/** get all hosts that search db this iid belongs to */
	public HashSet<String> getDBSearchHosts(){
		if(isSingle() || isSpell() || isLinks() || isRelated() || isPrefix() || isTitleNgram() || isTitlesBySuffix())
			return searchHosts;
		else{
			// add all hosts that search: dbname and all parts
			HashSet<String> hosts = new HashSet<String>();
			if(get(dbname)!=null)
				hosts.addAll(get(dbname).getSearchHosts());
			if(splitParts != null)
				addToHosts(hosts,splitParts);
			if(subParts != null)
				addToHosts(hosts,subParts);
			
			return hosts;
		}
	}
	
	/** searcher hosts within this search group */
	public HashSet<String> getMySearchHosts() {
		return mySearchHosts;
	}
	/** Number of subindexes in split architecture */
	public int getSplitFactor() {
		return splitFactor;
	}
	/** Get names of split parts, e.g. entest.part1, entest.part2 .. */
	public String[] getSplitParts() {
		return splitParts;
	}
	/** Get string representation of type, e.g. "single" */
	public String getType() {
		return typeString;
	}
	/** Get parameters associated with type, e.g. number of subindexes for split indexes */
	public Hashtable<String, String> getTypeParams() {
		return typeParams;
	}
	/** If this host is searching this index */
	public boolean isMySearch() {
		return mySearch;
	}
	/** For this iid to be searched at current host */
	public void forceMySearch(){
		mySearch = true;
	}
	/** Get base URL of OAI repository */
	public String getOAIRepository() {
		return OAIRepository;
	}
	
	/** 
	 * Get all indexes parts for this iid except for logical names.
	 * I.e. for db of kind mainsplit, it will return db.mainpart, db.restpart
	 */
	public HashSet<String> getPhysicalIndexes() {
		HashSet<String> ret = new HashSet<String>();
		if(isSingle() || isSpell() || isLinks() || isRelated() || isPrefix() || isTitleNgram())
			ret.add(dbrole);
		else if(isTitlesBySuffix()){
			if(part != null) // part
				ret.add(dbrole);
			else{ // main 
				for(String p : splitParts)
					ret.add(p);
			}
		} else if(isMainsplit() || isSplit() || isNssplit()){
			String[] parts = furtherSubdivided? subParts : splitParts;
			for(String p : parts){
				IndexId ip = IndexId.get(p);
				if(ip.isFurtherSubdivided())
					ret.addAll(ip.getPhysicalIndexes());
				else
					ret.add(p);
			}
		}
		
		return ret;
	}
	
	/**
	 * Wrapper for getPhysicalIndexes to get iid objects
	 */
	public ArrayList<IndexId> getPhysicalIndexIds(){
		HashSet<String> physical = getPhysicalIndexes();
		ArrayList<IndexId> parts = new ArrayList<IndexId>();
		for(String p : physical)
			parts.add(get(p));
		return parts;		
	}

	/** Rebuild namespace map from information, call only when sure that iid's for all parts are constructed.
	 *  Note: always call on main iid, not parts */
	public void rebuildNsMap(Hashtable<String,IndexId> pool) {
		if(isNssplit() && part==null){
			// rebuild
			nssplitMap = new Hashtable<String,String>();
			for(String part : splitParts){
				for(String ns : pool.get(part).namespaceSet){
					nssplitMap.put(ns,part);
				}
			}
			// set on all parts as well
			for(String part : splitParts){
				pool.get(part).nssplitMap = nssplitMap;
			}
		}		
	}	
	
	public IndexId getPartByNamespace(int ns){
		return getPartByNamespace(Integer.toString(ns));
	}
	
	/** If this is nssplit/mainsplit index, get part with certain namespace */
	public IndexId getPartByNamespace(String ns){
		if(isNssplit()){
			String dbrole = nssplitMap.get(ns);
			if(dbrole == null)
				dbrole = nssplitMap.get("<default>");
			return get(dbrole);
		} else if(isMainsplit()){
			if(ns.equals("0"))
				return getMainPart();
			else
				return getRestPart();
		} else
			return this;
	}

	/** Return the set of namespaces which are searched by this nssplit part */
	public HashSet<String> getNamespaceSet() {
		return namespaceSet;
	}
	
	/** Get iid for dbname of this index, i.e. enwiki.mainpart -> enwiki */
	public IndexId getDB(){
		return get(dbname);
	}

	/** Return true if the spell-check index exists */
	public boolean hasSpell(){
		if(FilterFactory.isCJKLanguage(getLangCode()))
			return false; // don't try to build spellchecks for CJK 
		return GlobalConfiguration.getIndexId(dbname+".spell") != null;
	}
	
	public boolean hasPrefix(){
		return GlobalConfiguration.getIndexId(dbname+".prefix") != null;
	}
	
	public boolean hasTitleNgram(){
		return GlobalConfiguration.getIndexId(dbname+".title_ngram") != null;
	}
	
	/** Get the coresponding spell words iid */
	public IndexId getSpell() {
		return get(dbname+".spell");
	}
	
	/** Get the pagelinks iid */
	public IndexId getLinks() {
		return get(dbname+".links");
	}
	
	/** Get the related-articles index iid */
	public IndexId getRelated() {
		return get(dbname+".related");
	}
	
	/** Get the prefix index iid */
	public IndexId getPrefix() {
		return get(dbname+".prefix");
	}
	
	/** Get the prefix titles index iid */
	public IndexId getPrefixTitles() {
		return get(dbname+".prefix_titles");
	}
	
	/** If this is a precursor index get the index it's precursor to, e.g. enwiki.spell for enwiki.spell.pre */
	public IndexId getPrecursorTarget(){
		if(!isPrecursor())
			throw new RuntimeException("Trying to fetch precursor target for non-precursor index "+dbrole);
		return get(dbrole.substring(0,dbrole.lastIndexOf('.')));
	}
	
	public IndexId getPrecursor(){
		return get(dbrole+".pre");
	}
	
	/** Get the higlight index for this iid */
	public IndexId getHighlight() {
		if(highlight)
			return this;
		else if(isTitlesBySuffix())			 
			// kinda ugly, all indexes have index+hl, only titles are all-in-one, this is mainly done
			// for performance, and since it's only a single (rather small) additional field
			return this;
		else
			return get(dbrole+".hl");
	}
	
	/** Get language code for this db, e.g. "en" */
	public String getLangCode(){
		if(langCode == null)
			langCode = GlobalConfiguration.getInstance().getLanguage(dbname);
		return langCode;
	}
	
	/** Get if this is index that doesn't capitalize first letters of articles */
	public boolean isExactCase(){
		if(exactCase == null)
			exactCase = GlobalConfiguration.getInstance().exactCaseIndex(dbname);
		return exactCase;
	}

	/** If this is a titles_by_suffix index, gets mapping: suffix -> iw */
	public String getInterwikiBySuffix(String suffix) {
		if(isTitlesBySuffix()){
			if( part == null ){ // this is the main index
				for(IndexId piid : getPhysicalIndexIds()){
					String iw = piid.getInterwikiBySuffix(suffix);
					if(iw != null)
						return iw;
				}
			} else // this is one of the parts
				return suffixIwMap.get(suffix);
		}
		throw new RuntimeException("Called getInterwikiBySuffix() on non-titles_by_suffix index");		
	}
	/** If index containing only titles is defined */
	public boolean hasTitlesIndex(){
		return titlesIndex != null;
	}
	/** Get iid where the titles for this index are */
	public IndexId getTitlesIndex() {
		if(titlesIndex == null)
			throw new RuntimeException(dbrole+" doesn't have titles index part");
		return get(titlesIndex);
	}
	/** Get suffix used to group titles */
	public String getTitlesSuffix() {
		return titlesSuffix;
	}
	/** Number of different dbname in this titles by suffix index */
	public int getTitlesBySuffixCount(){
		if(suffixIwMap == null)
			return 0;
		else
			return suffixIwMap.size();
	}
	/** Get namespaces of default search */
	public NamespaceFilter getDefaultNamespace(){
		if(defaultNs == null){
			defaultNs = GlobalConfiguration.getInstance().getDefaultNamespace(this);
		}		
		return defaultNs;		
	}

	/** Content namespaces */
	public NamespaceFilter getContentNamespaces(){
		if(contentNamespaces == null){
			contentNamespaces = GlobalConfiguration.getInstance().getContentNamespaces(this);
		}		
		return contentNamespaces;		
	}
	
	
	/** Get namespaces where subpages are enabled */
	public NamespaceFilter getNamespacesWithSubpages(){
		if(nsWithSubpages == null){
			nsWithSubpages = GlobalConfiguration.getInstance().getNamespacesWithSubpages(getDBname());
		}		
		return nsWithSubpages;		
	}
	
	/** If we should use article additional rank in scoring, useful for non-encyclopedias */
	public boolean useAdditionalRank(){
		if(useAdditionalRank == null)
			useAdditionalRank = GlobalConfiguration.getInstance().useAdditionalRank(getDBname());
		return useAdditionalRank;
	}
	
	/** For tspart indexes, mapping: suffix -> dbname */ 
	public Hashtable<String, String> getSuffixToDbname() {
		if(!isTitlesBySuffix())
			throw new RuntimeException("Trying to get suffix->dbname map for "+dbrole);
		if(part == null && suffixToDbname == null){
			// init for the main logical index
			suffixToDbname = new Hashtable<String,String>();
			for(IndexId part : getPhysicalIndexIds()){
				suffixToDbname.putAll(part.getSuffixToDbname());
			}
		}
		return suffixToDbname;
	}
	
	/** Get IndexId for a suffix in tspart (or main) indexes */
	public IndexId getIndexIdforSuffix(String suffix){
		return IndexId.get(getSuffixToDbname().get(suffix));
	}
	
	/** Return age scaling to be used on this iid */
	public AgeScaling getAgeScaling(){
		if(ageScaling == null)
			ageScaling = GlobalConfiguration.getInstance().getAgeScaling(getDBname());
		return ageScaling;
	}
	
	/** Get the related title_ngram index */
	public IndexId getTitleNgram(){
		return IndexId.get(dbname+".title_ngram");
	}
	
	/** If this iid is in chinese or japanese */
	public boolean isCJK(){
		return FilterFactory.isCJKLanguage(getLangCode());
	}

	public Object getSearcherCacheLock() {
		return searcherCacheLock;
	}
	
	/** Get transaction lock for a transaction type */
	public Lock getTransactionLock(Transaction trans) {
		return transactionLocks.get(trans);
	}
	
	/** Namespace boost for various namespaces */
	public ArticleNamespaceScaling getNamespaceScaling(){
		if(namespaceScaling == null)
			namespaceScaling = GlobalConfiguration.getInstance().getNamespaceScaling(getDBname());
		return namespaceScaling;
	}

}
