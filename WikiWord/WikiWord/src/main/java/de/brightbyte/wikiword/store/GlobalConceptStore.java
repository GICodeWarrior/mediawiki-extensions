package de.brightbyte.wikiword.store;

import java.util.List;

import de.brightbyte.data.cursor.DataSet;
import de.brightbyte.util.PersistenceException;
import de.brightbyte.wikiword.Corpus;
import de.brightbyte.wikiword.model.GlobalConcept;
import de.brightbyte.wikiword.model.LocalConcept;


/**
 * Base interface for a store containing wiki information 
 */
public interface GlobalConceptStore extends WikiWordConceptStore<GlobalConcept> {

	public DataSet<GlobalConcept> getAllConcepts() throws PersistenceException;

	//TODO: relevance limit? order?
	public DataSet<GlobalConcept> getMeanings(String lang, String term) throws PersistenceException;
	
	//public abstract ResultSet queryTermRefersTo() throws PersistenceException;
	
	/*
	public abstract DataSet<ConceptReference> getBroaderConcepts() throws PersistenceException;
	public abstract DataSet<ConceptReference> getNarrowerConcepts() throws PersistenceException;
	*/

	public LocalConceptStore getLocalConceptStore(Corpus corpus) throws PersistenceException;
	
	public List<LocalConcept> getLocalConcepts(int id) throws PersistenceException;

	public Corpus[] getLanguages() throws PersistenceException;
}
