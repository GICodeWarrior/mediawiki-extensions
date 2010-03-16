package org.wikimedia.lsearch.oai;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.Hashtable;
import java.util.Iterator;
import java.util.Map.Entry;

import org.apache.log4j.Logger;
import org.mediawiki.importer.DumpWriter;
import org.mediawiki.importer.Page;
import org.mediawiki.importer.Revision;
import org.mediawiki.importer.Siteinfo;
import org.mediawiki.importer.Title;
import org.wikimedia.lsearch.beans.Article;
import org.wikimedia.lsearch.beans.Redirect;
import org.wikimedia.lsearch.config.GlobalConfiguration;
import org.wikimedia.lsearch.config.IndexId;
import org.wikimedia.lsearch.importer.DumpImporter;
import org.wikimedia.lsearch.index.IndexUpdateRecord;
import org.wikimedia.lsearch.interoperability.RMIMessengerClient;
import org.wikimedia.lsearch.ranks.LinksBuilder;
import org.wikimedia.lsearch.related.Related;
import org.wikimedia.lsearch.related.RelatedTitle;
import org.wikimedia.lsearch.util.Localization;

public class IndexUpdatesCollector implements DumpWriter {
	Logger log = Logger.getLogger(DumpWriter.class);
	protected Page page;
	protected Revision revision;
	protected ArrayList<IndexUpdateRecord> records = new ArrayList<IndexUpdateRecord>();
	protected IndexId iid;
	protected int references = 0;
	protected ArrayList<Redirect> redirects = new ArrayList<Redirect>();
	protected Siteinfo info = null;
	protected String langCode;
	
	public IndexUpdatesCollector(IndexId iid){
		this.iid = iid;
		this.langCode = iid.getLangCode();
	}
	
	public void addRedirect(String redirectTitle, int references) {
		Title t = new Title(redirectTitle,info.Namespaces);
		redirects.add(new Redirect(t.Namespace,t.Text,references));
	}
	
	public int getReferences() {
		return references;
	}

	public void addReferences(int references) {
		this.references += references;
	}
	
	public void addDeletion(long pageId){
		// pageId is enough for page deletion
		Article article = new Article(pageId,-1,"","",null,1,0,0);
		records.add(new IndexUpdateRecord(iid,article,IndexUpdateRecord.Action.DELETE));
		log.debug(iid+": Deletion for "+pageId);
	}
	
	public ArrayList<IndexUpdateRecord> getRecords() {
		return records;
	}

	public void writeRevision(Revision revision) throws IOException {
		this.revision = revision;		
	}
	public void writeStartPage(Page page) throws IOException {
		this.page = page;
	}
	public void writeEndPage() throws IOException {
		Date date = new Date(revision.Timestamp.getTimeInMillis());
		org.wikimedia.lsearch.beans.Title redirect = Localization.getRedirectTitle(revision.Text,iid);
		String redirectTo = null;
		if(redirect != null)
			redirectTo = redirect.getKey();
		
		// references and related titles are set correctly later (in incremental updater)
		Article article = new Article(page.Id, page.Title.Namespace, page.Title.Text,
					revision.Text, redirectTo, references, 0, 0,
					redirects, new ArrayList<RelatedTitle>(),
					new Hashtable<String,Integer>(), date,
					DumpImporter.processLiquidThreadInfo(page.DiscussionThreadingInfo) );
		log.debug("Collected "+article+" with rank "+references+" and "+redirects.size()+" redirects: "+redirects);
		records.add(new IndexUpdateRecord(iid,article,IndexUpdateRecord.Action.UPDATE));
		log.debug(iid+": Update for "+article);
		references = 0;
		redirects = new ArrayList<Redirect>();
	}
	
	public void writeSiteinfo(Siteinfo info) throws IOException {
		this.info = info;
		RMIMessengerClient messenger = new RMIMessengerClient(true);
		// write to localization
		HashMap<Integer,String> map = new HashMap<Integer,String>();
		Iterator it = info.Namespaces.orderedEntries();
		while(it.hasNext()){
			Entry<Integer,String> pair = (Entry<Integer,String>)it.next();
			map.put(pair.getKey(),pair.getValue());			
		}
		messenger.addLocalizationCustomMapping(iid.getIndexHost(),map,iid.getDBname());
	}
		
	public void close() throws IOException {
	}

	public void writeEndWiki() throws IOException {
	}
	

	public void writeStartWiki() throws IOException {
	}





	
	
}
