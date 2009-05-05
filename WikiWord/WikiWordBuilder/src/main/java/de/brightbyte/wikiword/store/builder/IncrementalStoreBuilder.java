package de.brightbyte.wikiword.store.builder;

import de.brightbyte.util.PersistenceException;

public interface IncrementalStoreBuilder extends WikiWordStoreBuilder {

	public void deleteDataAfter(int delAfter, boolean inclusive) throws PersistenceException;

}
