package org.wikimedia.lsearch.interoperability;

import java.rmi.Remote;
import java.rmi.RemoteException;

import org.apache.lucene.search.Query;
import org.wikimedia.lsearch.beans.IndexReportCard;
import org.wikimedia.lsearch.beans.ResultSet;
import org.wikimedia.lsearch.beans.SearchResults;
import org.wikimedia.lsearch.index.IndexUpdateRecord;
import org.wikimedia.lsearch.search.NamespaceFilterWrapper;

/** Facilitates communication between both indexers and searcher */
public interface RMIMessenger extends Remote {
	/** 
	 * Call this method from a remote host to notify this
	 * host that the remote index has changed
	 * @param host  host name as in global configuration file
	 * @param dbrole  string representation of correspoing index id
	 * @throws RemoteException
	 */
	public void indexUpdated(String host, String dbrole) throws RemoteException;
	
	/** 
	 * Returns the timestamp of index (the one generated at indexer host)
	 * @param dbroles  string represenations of index id
	 * @return 
	 * @throws RemoteException
	 */
	public long[] getIndexTimestamp(String[] dbroles) throws RemoteException;
	
	/**
	 * Enqueue on local indexer an index update record. Used for distributed
	 * indexing of split indexes. 
	 * @param record
	 * @throws RemoteException
	 */
	public void enqueueUpdateRecords(IndexUpdateRecord[] records) throws RemoteException;
	
	/**
	 * RMI frontend for enqueue operation on indexer. For incremental updates. 
	 *  
	 * @param record
	 * @throws RemoteException
	 */
	public void enqueueFrontend(IndexUpdateRecord[] records) throws RemoteException;
	
	/**
	 * On split indexes, send back reports if addition/deletion of an 
	 * article on parts of the index succeeded 
	 * @param cards
	 * @throws RemoteException
	 */
	public void reportBack(IndexReportCard[] cards) throws RemoteException;
	
	/**
	 * For mainsplit indexes, sometimes only a part of index needs to be searched, 
	 * via this method the query is forwarded to mainpart/restpart of the index. 
	 * 
	 * @param dbrole
	 * @param query
	 * @param offset
	 * @param limit
	 * @throws RemoteException
	 */
	public SearchResults searchPart(String dbrole, String searchterm, Query query, NamespaceFilterWrapper filter, int offset, int limit, boolean explain) throws RemoteException;
	
	/**
	 * Returns index queue size. Needed for incremental updater, so it doesn't overload the indexer. 
	 * 
	 * @return
	 * @throws RemoteException
	 */
	public int getIndexerQueueSize() throws RemoteException;
	
	/** 
	 * Incremental updater tools. 
	 * Request that indexer flushes dbname, and enqueues notification if the
	 * flush was sucessful. Call function isSuccessfulFlush() to find out
	 * flush status.
	 * 
	 * @param dbname
	 * @return
	 * @throws RemoteException
	 */
	public boolean requestFlushAndNotify(String dbname) throws RemoteException;

	/**
	 * Incremental updater tools.
	 * Pair to function requestFlushAndNotify(). Will return null if flush status
	 * is unknown, and true/false if it's successful/failed
	 * 
	 * @param dbname
	 * @return
	 * @throws RemoteException
	 */
	public Boolean isSuccessfulFlush(String dbname) throws RemoteException;
}
