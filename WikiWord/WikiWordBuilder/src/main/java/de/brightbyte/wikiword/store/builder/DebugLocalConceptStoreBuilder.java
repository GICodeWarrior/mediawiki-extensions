package de.brightbyte.wikiword.store.builder;

import java.io.PrintStream;
import java.util.Collections;
import java.util.Date;
import java.util.Map;
import java.util.logging.Level;

import de.brightbyte.application.Agenda;
import de.brightbyte.application.Agenda.Record;
import de.brightbyte.application.Agenda.State;
import de.brightbyte.data.cursor.DataSet;
import de.brightbyte.data.cursor.CursorProcessor;
import de.brightbyte.io.Output;
import de.brightbyte.util.PersistenceException;
import de.brightbyte.wikiword.ConceptType;
import de.brightbyte.wikiword.Corpus;
import de.brightbyte.wikiword.ExtractionRule;
import de.brightbyte.wikiword.ResourceType;
import de.brightbyte.wikiword.model.LocalConcept;
import de.brightbyte.wikiword.model.LocalConceptReference;
import de.brightbyte.wikiword.model.WikiWordConceptReference;
import de.brightbyte.wikiword.schema.AliasScope;
import de.brightbyte.wikiword.store.GroupNameTranslator;
import de.brightbyte.wikiword.store.WikiWordConceptStore;

/**
 * Dummy implementation of WikiStoreBuilder for testing and debugging
 */
public class DebugLocalConceptStoreBuilder implements LocalConceptStoreBuilder {

	public class DebugTextStoreBuilder implements TextStoreBuilder {

		public void storePlainText(int textId, String name, ResourceType ptype, String text) throws PersistenceException {
			log("* storePlainText("+textId+", "+name+", "+ptype+", "+ptype+") *");
		}

		public void storeRawText(int textId, String name, ResourceType ptype, String text) throws PersistenceException {
			log("* storeRawText("+textId+", "+name+", "+ptype+", "+ptype+") *");
		}

		public void checkConsistency() throws PersistenceException {
			log("* checkConsistency *");
		}

		public void close(boolean flush) throws PersistenceException {
			log("* close("+flush+") *");
		}

		public void deleteDataAfter(int lastId, boolean inclusive) throws PersistenceException {
			log("* deleteDataAfter("+lastId+", "+inclusive+") *");
		}

		public void deleteDataFrom(int lastId) throws PersistenceException {
			log("* deleteDataFrom *");
		}

		public void dumpTableStats(Output out) throws PersistenceException {
			log("* dumpTableStats *");
		}

		public void flush() throws PersistenceException {
			log("* flush *");
		}

		public Agenda getAgenda() throws PersistenceException {
			return null;
		}

		public int getNumberOfWarnings() throws PersistenceException {
			return 0;
		}

		public void open() throws PersistenceException {
			log("* open *");
		}

		public void optimize() throws PersistenceException {
			log("* optimize *");
		}

		public void prepare(boolean purge, boolean dropAll) throws PersistenceException {
			log("* prepare("+purge+", "+dropAll+") *");
		}

		public void setLogLevel(int loglevel) {
			//noop
		}

		public void storeWarning(int rcId, String problem, String details) throws PersistenceException {
			log("* storeWarning("+rcId+", "+problem+", "+details+") *");
		}

		public Map<String, ? extends Number> getTableStats() throws PersistenceException {
			log("* getTableStats *");
			return null;
		}

		public boolean isComplete() throws PersistenceException {
			return true;
		}
		
	}

	public class DebugPropertyStoreBuilder implements PropertyStoreBuilder {

		public void finishAliases() throws PersistenceException {
			log("* finishAliases *");
		}

		public void storeProperty(int resourceId, int conceptId, String concept, String property, String value) throws PersistenceException {
			log("* storeProperty("+resourceId+", "+conceptId+", "+concept+", "+property+", "+value+") *");
		}

		public void checkConsistency() throws PersistenceException {
			log("* checkConsistency *");
		}

		public void close(boolean flush) throws PersistenceException {
			log("* close *");
		}

		public void deleteDataAfter(int lastId, boolean inclusive) throws PersistenceException {
			log("* deleteDataAfter("+lastId+", "+inclusive+") *");
		}

		public void deleteDataFrom(int lastId) throws PersistenceException {
			log("* deleteDataFrom("+lastId+") *");
		}

		public void dumpTableStats(Output out) throws PersistenceException {
			log("* dumpTableStats *");
		}

		public void flush() throws PersistenceException {
			log("* flush *");
		}

		public Agenda getAgenda() throws PersistenceException {
			return null;
		}

		public int getNumberOfWarnings() throws PersistenceException {
			return 0;
		}

		public void open() throws PersistenceException {
			log("* open *");
		}

		public void optimize() throws PersistenceException {
			log("* optimize *");
		}

		public void prepare(boolean purge, boolean dropAll) throws PersistenceException {
			log("* prepare *");
		}

		public void setLogLevel(int loglevel) {
			// noop
		}

		public void storeWarning(int rcId, String problem, String details) throws PersistenceException {
			log("+ warning: rcId = "+rcId+", problem = "+problem+", details = "+details);
		}

		public Map<String, ? extends Number> getTableStats() throws PersistenceException {
			return null;
		}

		public boolean isComplete() throws PersistenceException {
			return false;
		}

		public Corpus getCorpus() {
			return null;
		}
		
	}
	
	public class DebugStatisticsStoreBuilder implements StatisticsStoreBuilder {

		public void buildStatistics() throws PersistenceException {
			log("* buildStatistics *");
		}

		public void clear() throws PersistenceException {
			log("* clearStatistics *");
		}

		public void checkConsistency() throws PersistenceException {
			log("* checkConsistency *");
		}

		public void close(boolean flush) throws PersistenceException {
			log("* close *");
		}

		public void deleteDataAfter(int lastId, boolean inclusive)
				throws PersistenceException {
			log("* deleteDataAfter("+lastId+", "+inclusive+") *");
		}

		public void deleteDataFrom(int lastId) throws PersistenceException {
			log("* deleteDataFrom("+lastId);
		}

		public void dumpTableStats(Output out) throws PersistenceException {
			log("* no table stats *");
		}

		public void flush() throws PersistenceException {
			log("* flush *");
		}

		public Agenda getAgenda() throws PersistenceException {
			return agenda;
		}

		public int getNumberOfWarnings() throws PersistenceException {
			return 0;
		}

		public void open() throws PersistenceException {
			log("* open *");
		}

		public void optimize() throws PersistenceException {
			log("* optimize *");
		}

		public void prepare(boolean purge, boolean dropAll) throws PersistenceException {
			log("* prepare *");
		}

		public void setLogLevel(int loglevel) {
			//noop
		}

		public void storeWarning(int rcId, String problem, String details) throws PersistenceException {
			log("+ warning: rcId = "+rcId+", problem = "+problem+", details = "+details);
		}


		public Map<String, ? extends Number> getTableStats() throws PersistenceException {
			return Collections.emptyMap(); //TODO: counters
		}

		public boolean isComplete() throws PersistenceException {
			return true;
		}
	}

	public class DebugConceptInfoStoreBuilder implements
			ConceptInfoStoreBuilder<LocalConcept> {

		public void buildConceptInfo() throws PersistenceException {
			log("* buildConceptInfo *");
		}

		public void checkConsistency() throws PersistenceException {
			log("* checkConsistency *");
		}

		public void close(boolean flush) throws PersistenceException {
			log("* close *");
		}

		public void deleteDataAfter(int lastId, boolean inclusive)
				throws PersistenceException {
			log("* deleteDataAfter("+lastId+", "+inclusive+") *");
		}

		public void deleteDataFrom(int lastId) throws PersistenceException {
			log("* deleteDataFrom("+lastId);
		}

		public void dumpTableStats(Output out) throws PersistenceException {
			log("* no table stats *");
		}

		public void flush() throws PersistenceException {
			log("* flush *");
		}

		public Agenda getAgenda() throws PersistenceException {
			return agenda;
		}

		public int getNumberOfWarnings() throws PersistenceException {
			return 0;
		}

		public void open() throws PersistenceException {
			log("* open *");
		}

		public void optimize() throws PersistenceException {
			log("* optimize *");
		}

		public void prepare(boolean purge, boolean dropAll) throws PersistenceException {
			log("* prepare *");
		}

		public void setLogLevel(int loglevel) {
			//noop
		}

		public void storeWarning(int rcId, String problem, String details) throws PersistenceException {
			log("+ warning: rcId = "+rcId+", problem = "+problem+", details = "+details);
		}

		public Map<String, ? extends Number> getTableStats() throws PersistenceException {
			return Collections.emptyMap(); //TODO: counters
		}

		public boolean isComplete() throws PersistenceException {
			return true;
		}

	}

	public class DebugAgendaPersistor extends Agenda.TransientPersistor {

		protected int id = 0;
		protected Agenda.Record record;
		
		@Override
		public Record logStart(int level, String context, String task, Map<String, Object> parameters, boolean complex) {
			Record rec = super.logStart(level, context, task, parameters, complex);
			trace("+ logStart: level = "+level+", task = "+task+", parameters = "+parameters+", complex = "+complex);
			return rec;
		}

		@Override
		public void logTerminated(int start, int end, long duration, State state, String result) {
			super.logTerminated(start, end, duration, state, result);
			trace("+ logStart: start = "+start+", end = "+end+", duration = "+duration+", state = "+state+", result = "+result);
		}

	}

	protected Output out;
	protected int logLevel = Level.INFO.intValue();
	
	protected int conceptCounter = 0;
	protected int conceptBroaderCounter = 0;
	protected int conceptEquivalentCounter  = 0;
	protected int conceptReferenceCounter  = 0;
	protected int rawTextCounter = 0;
	protected int plainTextCounter = 0;
	protected int definitionCounter = 0;
	protected int resourceCounter = 0;
	protected int languageLinkCounter = 0;
	protected int linkCounter = 0;
	protected int sectionCounter = 0;
	
	private Agenda agenda;
	
	public DebugLocalConceptStoreBuilder(Output out) {
		super();
		this.out = out;
		
		try {
			this.agenda = new Agenda( new DebugAgendaPersistor() );
		} catch (PersistenceException e) {
			throw new Error("unexpected exception", e);
		}
	}
	
	protected void trace(String s) {
		if (logLevel<=Level.FINER.intValue()) 
			out.println(s);
	}

	protected void log(String s) {
		if (logLevel<=Level.INFO.intValue()) 
			out.println(s);
	}
	
	public void setLogLevel(int logLevel) {
		this.logLevel = logLevel;
	}

	public void close(boolean flush)  {
		log("* close *");
	}

	public void prepare(boolean purge, boolean dropAll) {
		log("* prepare *");
	}

	public void dumpTableStats(Output out)  {
		log("* no table stats *"); //TODO: counters!
	}

	public void dumpStatistics(Output out)  {
		dumpTableStats(out);
	}

	public Map<String, ? extends Number> getTableStats()  {
		return Collections.emptyMap(); //TODO: counters!
	}

	public Map<String, ? extends Number>  getStatistics()  {
		return getTableStats();
	}

	public void open()  {
		log("* open *");
	}

	public void prepare()  {
		log("* prepare *");
	}

	public int storeConcept(int rcId, String name, ConceptType ctype)  {
		conceptCounter++;
		trace("+ storeConcept: rc = "+rcId+", name = "+name+", type = "+ctype);
		return conceptCounter;
	}
	
	public int storeResource(String name, ResourceType ptype, Date time)  {
		resourceCounter++;
		trace("+ resourceCounter: id = "+resourceCounter+", name = "+name+", type = "+ptype+", timestamp = "+time);
		return resourceCounter;
	}

	public int storeResourceAbout(String name, ResourceType ptype, Date time, int conceptId, String conceptName)  {
		int resourceId = storeResource(name, ptype, time);
		storeAbout(resourceId, conceptId, conceptName);
		return resourceId;
	}


	public void storeDefinition(int rcId, int conceptId, String definition)  {
		definitionCounter++;
		trace("+ storeDefinition: conceptId = "+conceptId+": "+definition);
	}

	public int storePlainText(int rcId, String text)  {
		plainTextCounter++;
		trace("+ storePlainText: resource = "+rcId+": ");
		trace("---------------------------------");
		trace(text);
		trace("\n---------------------------------");
		return plainTextCounter;
	}

	public int storeRawText(int rcId, String text)  {
		rawTextCounter++;
		trace("+ storeRawText: resource = "+rcId+": ");
		trace("---------------------------------");
		trace(text);
		trace("\n---------------------------------");
		return rawTextCounter;
	}


	public void storeConceptBroader(int rcId, int narrowId, String narrowName, String broadName, ExtractionRule rule)  {
		conceptBroaderCounter++;
		trace("+ storeConceptBroader: rc = "+rcId+", narrow ("+narrowId+") =  "+narrowName+", broad = "+broadName+", rule = "+rule);
	}

	public void storeConceptBroader(int rcId, String narrowName, String broadName, ExtractionRule rule)  {
		conceptBroaderCounter++;
		trace("+ storeConceptBroader: rc = "+rcId+", narrow =  "+narrowName+", broad = "+broadName+", rule = "+rule);
	}

	public void storeConceptAlias(int rcId, int left, String leftName, int right, String rightName, AliasScope scope)  {
		conceptEquivalentCounter++;
		trace("+ storeConceptEquivalent: rc = "+rcId+", left ("+left+") =  "+leftName+", right ("+right+") = "+rightName+", scope = "+scope);
	}

	public void storeConceptReference(int rcId, int source, String sourceName, String target)  {
		conceptReferenceCounter++;
		trace("+ storeConceptReference: rc = "+rcId+", source ("+source+") =  "+sourceName+", target = "+target+"");
	}

	public void storeLanguageLink(int rcId, int concept, String conceptName, String lang, String target)  {
		languageLinkCounter++;
		trace("+ storeLanguageLink: rc = "+rcId+", concept ("+concept+") =  "+conceptName+", language = "+lang+", target = "+target+"");
	}

	public void storeLink(int rcId, int anchorId, String anchorName, 
			String term, String targetName, ExtractionRule rule)  {
		linkCounter++;
		trace("+ storeTermUse: rc = "+rcId+", anchor ("+anchorId+") =  "+anchorName+", term = "+term+", target =  "+targetName+", rule = "+rule+"");
	}

	public void storeReference(int rcId, String term, int targetId, String targetName, 
			ExtractionRule rule)  {
		linkCounter++;
		trace("+ storeTermUse: rc = "+rcId+", target ("+targetId+") =  "+targetName+", term = "+term+", rule = "+rule+"");
	}

	public void storeSection(int rcId, String name, String page)  {
		sectionCounter++;
		trace("+ section: rc = "+rcId+", name ("+name+") =  "+page);
	}

	public void checkConsistency()  {
		trace("* checkConsistency *");
	}

	public void flush()  {
		trace("* flush *");
	}

	public void deleteDataFrom(int rcId)  {
		trace("- delete data from resource "+rcId);
	}

	public void deleteDataAfter(int rcId, boolean inclusive)  {
		trace("- delete data after resource "+rcId);
	}

	public Agenda getAgenda() {
		return agenda;
	}

	public void optimize() {
		trace("- optimize");
	}

	public void dumpTableStats(PrintStream out, String table)  {
		log("* no stats *");
	}

	public void dumpTableStats(PrintStream out, String table, String groupby, GroupNameTranslator translator)  {
		log("* no stats *");
	}

	public Corpus getCorpus() {
		return null;
	}

	public void buildStatistics() {
		trace("- build stats");
	}
	public void clearStatistics() {
		trace("- clear stats");
	}

	public int getNumberOfWarnings()  {
		return 0; //TODO: counter
	}

	public boolean isComplete() throws PersistenceException {
		return true;
	}

	public void finishAliases() throws PersistenceException {
		log("* finishAliases *");
	}

	public void finishFinish() throws PersistenceException {
		log("* finishFinish *");
	}

	public void finishIdReferences() throws PersistenceException {
		log("* finishIdReferences *");
	}

	public void finishImport() throws PersistenceException {
		log("* finishImport *");
	}

	public void finishRelations() throws PersistenceException {
		log("* finishRelations *");
	}

	public void finishMeanings() throws PersistenceException {
		log("* finishMeanings *");
	}

	public void buildConceptInfo() throws PersistenceException {
		log("* finishConceptInfo *");
	}

	public void finishBadLinks() throws PersistenceException {
		log("* finishBadLinks *");
	}

	public void finishMissingConcepts() throws PersistenceException {
		log("* finishMissingConcpets *");
	}

	public void finishSections() throws PersistenceException {
		log("* finishSections *");
	}

	public ConceptInfoStoreBuilder<LocalConcept> getConceptInfoStoreBuilder() {
		return new DebugConceptInfoStoreBuilder();
	}

	public StatisticsStoreBuilder getStatisticsStoreBuilder() {
		return new DebugStatisticsStoreBuilder();
	}

	public TextStoreBuilder getTextStoreBuilder() {
		return new DebugTextStoreBuilder();
	}

	public PropertyStoreBuilder getPropertyStoreBuilder() {
		return new DebugPropertyStoreBuilder();
	}

	public void storeWarning(int rcId, String problem, String details) throws PersistenceException {
		log("+ storeWarning: rcId="+rcId+", problem="+problem+", details="+details);
	}

	public WikiWordConceptStore<LocalConcept, WikiWordConceptReference<LocalConcept>> getConceptStore() throws PersistenceException {
		return null; //XXX...
	}

	public DataSet<LocalConceptReference> listUnknownConcepts() throws PersistenceException {
		return null; //XXX...
	}

	public void resetTermsForUnknownConcepts() throws PersistenceException {
		//noop
	}

	public int processUnknownConcepts(CursorProcessor<LocalConceptReference> processor) throws PersistenceException {
		//noop
		return 0;
	}

	public void storeAbout(int resource, String conceptName)  {
		trace("+ storeAbout: resource = "+resource+", conceptName =  "+conceptName);
	}

	public void storeAbout(int resource, int concept, String conceptName) {
		trace("+ storeAbout: resource = "+resource+", concept =  "+concept+", conceptName =  "+conceptName);
	}
	
}