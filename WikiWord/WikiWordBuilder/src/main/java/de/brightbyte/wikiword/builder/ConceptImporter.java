package de.brightbyte.wikiword.builder;

import java.util.Date;
import java.util.List;
import java.util.Map;
import java.util.Set;

import de.brightbyte.application.Arguments;
import de.brightbyte.data.MultiMap;
import de.brightbyte.data.cursor.CursorProcessor;
import de.brightbyte.data.cursor.DataCursor;
import de.brightbyte.util.PersistenceException;
import de.brightbyte.util.StringUtils;
import de.brightbyte.wikiword.ConceptType;
import de.brightbyte.wikiword.ExtractionRule;
import de.brightbyte.wikiword.Namespace;
import de.brightbyte.wikiword.ResourceType;
import de.brightbyte.wikiword.TweakSet;
import de.brightbyte.wikiword.analyzer.WikiPage;
import de.brightbyte.wikiword.analyzer.WikiTextAnalyzer;
import de.brightbyte.wikiword.model.LocalConceptReference;
import de.brightbyte.wikiword.processor.ImportProgressTracker;
import de.brightbyte.wikiword.schema.AliasScope;
import de.brightbyte.wikiword.store.builder.IncrementalStoreBuilder;
import de.brightbyte.wikiword.store.builder.LocalConceptStoreBuilder;
import de.brightbyte.wikiword.store.builder.PropertyStoreBuilder;
import de.brightbyte.wikiword.store.builder.TextStoreBuilder;

public class ConceptImporter extends AbstractImporter {
	private boolean storeDefinitions = true;
	private boolean storeProperties = true;
	private boolean storeFlatText = true;
	private boolean storeRawText = true;
	
	protected ImportProgressTracker conceptTracker;
	protected ImportProgressTracker linkTracker;
	protected ImportProgressTracker propertyTracker;
	
	protected LocalConceptStoreBuilder store;
	protected PropertyStoreBuilder propertyStore;
	protected TextStoreBuilder textStore;
	
	public ConceptImporter(WikiTextAnalyzer analyzer, LocalConceptStoreBuilder store, TweakSet tweaks) throws PersistenceException {
		super(analyzer, store, tweaks);
		
		this.store = store;
		this.propertyStore = store.getPropertyStoreBuilder();
		this.textStore = store.getTextStoreBuilder();
	}
	
	@Override
	public void prepare() throws PersistenceException {
		store.prepareImport();
		if (storeProperties) propertyStore.prepareImport();
		if (storeFlatText || storeRawText) textStore.prepareImport();
	}
	
	@Override
	public void finish() throws PersistenceException {
		if (beginTask("ConceptImporter.finish", "finishImport")) {
			store.finalizeImport();
			endTask("ConceptImporter.finish", "finishImport");
		}
		
		if (beginTask("ConceptImporter.finish", "finishBadLinks")) {
			store.finishBadLinks();
			endTask("ConceptImporter.finish", "finishBadLinks");
		}
		
		if (beginTask("ConceptImporter.finish", "finishSections")) {
			store.finishSections(); //XXX: does this after id-links? copy ids directly? building narrow from narrow_name would no longer be needed.
			endTask("ConceptImporter.finish", "finishSections");
		}
				
		if (beginTask("ConceptImporter.finish", "finishMissingConcpets")) {
			store.finishMissingConcepts();
			endTask("ConceptImporter.finish", "finishMissingConcpets");
		}
		
		//XXX: maybe run finishMissingConcpets AGAIN: buildTermsForMissingConcepts
		//     may created unresolved pointers in broader.boroader field.
		
		if (beginTask("ConceptImporter.finish", "finishIdReferences")) {
			store.finishIdReferences();
			endTask("ConceptImporter.finish", "finishIdReferences");
		}
		
		if (beginTask("ConceptImporter.finish", "finishAliases")) {
			store.finishAliases();
			endTask("ConceptImporter.finish", "finishAliases");
		}
		
		//TODO: finish aliases for textStore!
		
		if (beginTask("ConceptImporter.finish", "finishRelations")) {
			store.finishRelations();
			endTask("ConceptImporter.finish", "finishRelations");
		}
				
		if (beginTask("ConceptImporter.finish", "buildTermsForMissingConcepts")) {
			if (getAgenda().isTaskDirty()) resetTermsForMissingConcepts();
			buildTermsForMissingConcepts();
			endTask("ConceptImporter.finish", "buildTermsForMissingConcepts");
		}
		
		if (beginTask("ConceptImporter.finish", "finishMeanings")) {
			store.finishMeanings();
			endTask("ConceptImporter.finish", "finishMeanings");
		}
		
		/*
		if (beginTask("ConceptImporter.finish", "finishConceptInfo")) {
			store.finishConceptInfo();
			endTask("ConceptImporter.finish", "finishConceptInfo");
		}
		*/
		
		if (beginTask("ConceptImporter.finish", "finishFinish")) {
			store.finishFinish();
			endTask("ConceptImporter.finish", "finishFinish");
		}
		
		store.flush();
	}
	
	protected void deleteDataAfter(int delAfter) throws PersistenceException {
		((IncrementalStoreBuilder)store).deleteDataAfter(delAfter, false); //FIXME: make sure we are not off by one!
		if (propertyStore!=null && storeProperties) ((IncrementalStoreBuilder)propertyStore).deleteDataAfter(delAfter, false); //FIXME: make sure we are not off by one!
	}
	
	protected void storeSuffixInfo(WikiPage analyzerPage, int rcId, int conceptId, String conceptName) throws PersistenceException {
		CharSequence sfx = analyzerPage.getTitleSuffix();
		if (sfx!=null) {
			String qualifier = analyzer.normalizeTitle(sfx).toString();
			
			if (analyzer.useSuffixAsCategory())
				storeConceptBroader(rcId, conceptId, conceptName, qualifier, ExtractionRule.BROADER_FROM_SUFFIX);
			
			if (storeProperties)
				storeProperty(rcId, conceptId, conceptName, "qualifier", qualifier);
		}
	}
	
	protected void buildTermsForMissingConcepts() throws PersistenceException {
		if (!analyzer.isInitialized()) { //XXX: ugly hack!
			analyzer.initialize(Namespace.canonicalNamespaces, true);
		}
		
		CursorProcessor<LocalConceptReference> p = new CursorProcessor<LocalConceptReference>() {
		
			public void process(DataCursor<LocalConceptReference> c) throws Exception {
				
				LocalConceptReference r;
				while ((r = c.next())!=null) {
					WikiPage analyzerPage = analyzer.makePage(0, r.getName(), "", false); //XXX: bypass analyzer page? 
					storePageTerms(-1, r.getId(), analyzerPage); //FIXME: skip sections, foo#bar is not a good term!
		
					ConceptImporter.this.storeSuffixInfo(analyzerPage, -1, r.getId(), r.getName());
					
					//NOTE: covered by DatabaseLocalConceptStoreBuilder.buildSectionBroader
					//CharSequence pfx = analyzerPage.getTitlePrefix();
					//if (pfx!=null) storeConceptBroader(-1, r.getId(), r.getName(), analyzer.normalizeTitle(pfx).toString(), ExtractionRule.BROADER_FROM_SUFFIX); 			
				}
				
				store.flush();
			}
		
		};
		
		store.processUnknownConcepts(p);
	}

	protected void resetTermsForMissingConcepts() throws PersistenceException {
		store.resetTermsForUnknownConcepts();
	}

	@Override
	public void reset() {
		super.reset();
		conceptTracker = new ImportProgressTracker("concepts");
		linkTracker = new ImportProgressTracker("links");
		propertyTracker = new ImportProgressTracker("properties");
	}
	
	@Override
	public void trackerChunk() {
		super.trackerChunk();
		conceptTracker.chunk();
		linkTracker.chunk();
		propertyTracker.chunk();
		
		out.info("- "+conceptTracker);
		out.info("- "+linkTracker);
		out.info("- "+propertyTracker);
	}
	
	
	protected void storeProperty(int rcId, int cid, String concept, String property, String value) throws PersistenceException {
		if (checkTerm(rcId, value, "value - SKIPED", cid)) return; 
		if (checkSmellsLikeWiki(rcId, value, "value - SKIPED", cid)) return;
		
		propertyTracker.step();
		propertyStore.storeProperty(rcId, cid, concept, property, value);
	}

	protected void storeReferences(int rcId, List<WikiTextAnalyzer.WikiLink> links) throws PersistenceException {
		for (WikiTextAnalyzer.WikiLink link : links) {
			WikiTextAnalyzer.LinkMagic m = link.getMagic();
			
			if (m==WikiTextAnalyzer.LinkMagic.NONE) {
				if (link.getNamespace()!=Namespace.MAIN) continue;
				if (link.getInterwiki()!=null) continue;
			
				storeReference(rcId, link.getText().toString(), -1, link.getTarget().toString(), ExtractionRule.TERM_FROM_LINK);
				if (link.getSection()!=null) storeSection(rcId, link.getTarget().toString(), link.getPage().toString());
			}
		}
	}
	
	protected void storeLinks(int rcId, int conceptId, String conceptName, List<WikiTextAnalyzer.WikiLink> links) throws PersistenceException {
		for (WikiTextAnalyzer.WikiLink link : links) {
			WikiTextAnalyzer.LinkMagic m = link.getMagic();
			
			if (m==WikiTextAnalyzer.LinkMagic.NONE) {
				if (link.getNamespace()!=Namespace.MAIN) continue;
				if (link.getInterwiki()!=null) continue;
			
				storeLink(rcId, conceptId, conceptName, link.getText().toString(), link.getTarget().toString(), ExtractionRule.TERM_FROM_LINK);
				if (link.getSection()!=null) storeSection(rcId, link.getTarget().toString(), link.getPage().toString());
			}
		}
	}
	
	protected void storePageTerms(int rcId, int conceptId, WikiPage analyzerPage) throws PersistenceException {
		storePageTerms(rcId, analyzerPage.getTitleTerms(), conceptId, analyzerPage.getName().toString(), ExtractionRule.TERM_FROM_TITLE);
		storePageTerms(rcId, analyzerPage.getPageTerms(), conceptId, analyzerPage.getName().toString(), ExtractionRule.TERM_FROM_IDENTIFIER);
		
		CharSequence defaultSortKey = analyzerPage.getDefaultSortKey();
		if (defaultSortKey!=null && defaultSortKey.length()>0) {
			storeReference(rcId, defaultSortKey.toString(), conceptId, analyzerPage.getName().toString(), ExtractionRule.TERM_FROM_SORTKEY);
		}
	}
	
	protected void storePageTerms(int rcId, Set<? extends CharSequence> terms, int targetId, String targetName, ExtractionRule rule) throws PersistenceException {
		for (CharSequence term : terms) {
			storeReference(rcId, term.toString(), targetId, targetName, rule);
		}
	}
	
	@Override
	public int importPage(WikiPage analyzerPage, Date timestamp) throws PersistenceException {
		ResourceType rcType = analyzerPage.getResourceType();
		String name = analyzerPage.getConceptName();
		String rcName = analyzerPage.getResourceName();
		String text = analyzerPage.getText().toString();
		//int namespace = analyzerPage.getNamespace();
		//String title = analyzerPage.getTitle().toString();
		
		//TODO: check if page is stored. if up to date, skip. if older, update. if missing, create. optionally force update.
		int rcId = storeResource(rcName, rcType, timestamp);
				
		if (storeRawText) {  
			textStore.storeRawText(rcId, rcName, text);
		}
		
		if (rcType == ResourceType.CATEGORY) {
			WikiTextAnalyzer.WikiLink redir = analyzerPage.getRedirect();
			
			if (redir!=null) {
				out.info("storing category redirect "+rcName+" -> "+redir);
				storeAlias(analyzerPage, rcId);
			} else {
				int conceptId = store.storeAbout(rcId, name);

				List<WikiTextAnalyzer.WikiLink> links = analyzerPage.getLinks();
				linkTracker.step(links.size());
				
				for (WikiTextAnalyzer.WikiLink link : links) {
					WikiTextAnalyzer.LinkMagic m = link.getMagic();
					
					if (m==WikiTextAnalyzer.LinkMagic.CATEGORY) {
						//FIXME: store this also as a reference to the categorie's concept under it's original title!
						storeConceptBroader(rcId, name, link.getPage().toString(), ExtractionRule.BROADER_FROM_CAT);
					}
					
					if (m==WikiTextAnalyzer.LinkMagic.LANGUAGE) {
						//FIXME: language links point to *resource* names. resolve accordingly.
						storeLanguageLink(rcId, conceptId, name, link.getInterwiki().toString(), link.getTarget().toString());
					}
				}
				
				
				//TODO: langlinks from category!
				//      need resolve-ids on langling, then!
				//      beware aliased categories!
			}
		}
		else if (rcType == ResourceType.ARTICLE || rcType == ResourceType.SUPPLEMENT) {
			conceptTracker.step();
			
			//TODO: handle "other meanings" header (mini-disambig!)
			//TODO: handle "merge" header? 
			
			ConceptType ctype = analyzerPage.getConceptType();
			int conceptId = storeConcept(rcId, name, ctype);
			
			storePageTerms(rcId, conceptId, analyzerPage);
			
			//XXX: store interwiki-set inline for clustering ?
			
			storeSuffixInfo(analyzerPage, rcId, conceptId, name);
			
			//NOTE: can't really happen here (only applicable for sections)
			//CharSequence pfx = analyzerPage.getTitlePrefix();
			//if (pfx!=null) storeConceptBroader(rcId, conceptId, name, analyzer.normalizeTitle(pfx).toString(), ExtractionRule.BROADER_FROM_SUFFIX); 			
			
			//TODO: get all bold stuff from first sentence -> terms for page!
			
			if (storeFlatText && analyzer.flatTextSupported()) {  
				CharSequence plain = analyzerPage.getPlainText(false);
				textStore.storePlainText(rcId, rcName, plain.toString());
			}
			
			if (storeDefinitions && analyzer.definitionsSupported()) {
				String definition = analyzerPage.getFirstSentence().toString();
				if (definition!=null && definition.length()>0) {
					storeDefinition(rcId, conceptId, definition);
				}
			}

			if (storeProperties) {
				MultiMap<String, CharSequence, Set<CharSequence>> properties = analyzerPage.getProperties();
				for (Map.Entry<String, Set<CharSequence>> e: properties.entrySet()) {
					String property = e.getKey();
					
					for (CharSequence v: e.getValue()) {
						storeProperty(rcId, conceptId, name, property, v.toString());
					}
				}
				
				storeProperty(rcId, conceptId, name, "is-a", ctype.getName());
			}
			
			storeSupplements(rcId, conceptId, analyzerPage);
			
			List<WikiTextAnalyzer.WikiLink> links = analyzerPage.getLinks();
			linkTracker.step(links.size());
			
			storeLinks(rcId, conceptId, name, links);
			
			for (WikiTextAnalyzer.WikiLink link : links) {
				WikiTextAnalyzer.LinkMagic m = link.getMagic();
				
				if (m==WikiTextAnalyzer.LinkMagic.NONE) {
					if (link.getNamespace()!=Namespace.MAIN) continue;
					if (link.getInterwiki()!=null) continue;
				
					//if (storeLinks) storeConceptReference(rcId, conceptId, name, link.getTarget());
				}
				else if (m==WikiTextAnalyzer.LinkMagic.CATEGORY) {
					//XXX: convert plural->singlular. XXX: do this later, and only if the plural lemma doesn't have an article!
					//      so... kep list of candidates, strip all that already have a matching concept *with* associated resource
					CharSequence sk = link.isTextImplied() ? null : link.getText();
					String sortKey = sk==null ? null : sk.toString();
					boolean categorize = true;
					
					if ( sortKey!=null && analyzer.isMainArticleMarker(sortKey) ) {
						if (analyzer.useCategoryAliases()) {
							//XXX: if there's more than one "main article", this breaks.
							String cat = link.getPage().toString();
							
							if (!cat.equals(name) &&  analyzer.mayBeFormOf(link.getLenientPage(), analyzerPage.getTitleBaseName())) {
								Set<CharSequence> terms = analyzer.determineTitleTerms(link.getPage());
								storePageTerms(rcId, terms, conceptId, name, ExtractionRule.TERM_FROM_CAT_NAME);
								
								//NOTE: the alias is preliminary: if a article with the name of the category 
								//      exists, the alias will be ignored. See DatabaseLocalConceptBuilder.finishBadLinks
								
								storeConceptAlias(rcId, -1, cat, conceptId, name, AliasScope.CATEGORY);  
								categorize = false;
							}
						}
						
						sortKey = null;
					}
					
					if (categorize) {
						if ( sortKey!=null && sortKey.length()>0 && !link.isTextImplied() ) {
							//XXX: if {{DEFAULTSORT}} is handled for PageTerms, apply for each category again? 
							storeReference(rcId, sortKey, conceptId, name, ExtractionRule.TERM_FROM_SORTKEY); //sort key is a name for this page
						}

						if ( !link.getPage().toString().equals(name) ) { //NOTE: need the toString, CharSequences doen't "equal" strings :(
							storeConceptBroader(rcId, conceptId, name, link.getPage().toString(), ExtractionRule.BROADER_FROM_CAT);
						}
					}
				}
				else if (m==WikiTextAnalyzer.LinkMagic.LANGUAGE) {
					storeLanguageLink(rcId, conceptId, name, link.getInterwiki().toString(), link.getPage().toString()); //XXX: consider target? consider both??
				}				
			}
			
			//FIXME: store supplement links
		}
		else if (rcType == ResourceType.DISAMBIG) {
			//storeConcept(rcId, name, ConceptType.NONE); 

			Set<CharSequence> terms = analyzerPage.getTitleTerms();

			List<WikiTextAnalyzer.WikiLink> links = analyzerPage.getLinks();
			linkTracker.step(links.size());

			storeReferences(rcId, links); //just word/target rel

			List<WikiTextAnalyzer.WikiLink> dlinks = analyzerPage.getDisambigLinks();
			for (WikiTextAnalyzer.WikiLink link : dlinks) {
				WikiTextAnalyzer.LinkMagic m = link.getMagic();
				
				if (m==WikiTextAnalyzer.LinkMagic.NONE) {
					if (link.getNamespace()!=Namespace.MAIN) continue;
					if (link.getInterwiki()!=null) continue;
				
					for (CharSequence term : terms) {
						storeReference(rcId, term.toString(), -1, link.getPage().toString(), ExtractionRule.TERM_FROM_DISAMBIG);
					}
				}
			}
		}
		else if (rcType == ResourceType.LIST) {
			//storeConcept(rcId, name, ConceptType.NONE);

			//FIXME: extract fewer links... use disambig-logic?
			List<WikiTextAnalyzer.WikiLink> links = analyzerPage.getLinks();
			linkTracker.step(links.size());

			storeReferences(rcId, links); //just word/target rel
			
			//TODO: extract concept name from "List of..." ?
			//FIXME: category-like interpretation!
		}
		else if (rcType == ResourceType.REDIRECT) {
			storeAlias(analyzerPage, rcId);
		}
		else if (rcType == ResourceType.BAD) {
			out.info("skipped BAD page "+rcName);
		}
		else {
			out.warn("skipped page "+rcName+" ["+rcType+"]");
		}
		
		return rcId;
	}
	
	protected int storeAlias(WikiPage analyzerPage, int rcId) throws PersistenceException {
		String name = analyzerPage.getConceptName();
		String rcName = analyzerPage.getResourceName();
		String text = analyzerPage.getText().toString();

		WikiTextAnalyzer.WikiLink link = analyzerPage.getRedirect();
		
		int conceptId = 0;
		
		if (link==null) {
			warn(rcId, "bad redirect (no link)", "Text: "+StringUtils.clipString(text, 256, "..."), null);
		}
		else if (link.getInterwiki()!=null ) {
			//redirects to other wikis or into another namespace are handeled as BAD page.
			out.info("skipped interwiki redirect "+rcName+" -> "+link);
		}
		else if (link.getNamespace()!=analyzerPage.getNamespace()) {
			if (link.getNamespace()==Namespace.CATEGORY && analyzerPage.getNamespace()==Namespace.MAIN) {
				if ( StringUtils.equals(link.getPage(), analyzerPage.getTitle()) ) {
						out.debug("ignored redundant category redirect "+rcName+" -> "+link);
				} else {
						out.debug("processing redirect to category "+rcName+" -> "+link);
						storePageTerms(rcId, analyzerPage.getTitleTerms(), -1, link.getPage().toString(), ExtractionRule.TERM_FROM_REDIRECT );
						String tgtConcept = link.getPage().toString();
						
						if (!name.equals(tgtConcept)) {
							conceptId = store.storeAbout(rcId, name);
							storeConceptAlias(rcId, conceptId, name, -1, tgtConcept, AliasScope.REDIRECT);
						} else {
							out.debug("skipping redirect to category with the same name");
						}
				}
			} else {
					out.info("skipped inter-namespace redirect "+rcName+" -> "+link);
			}
		}
		else if (name.equals(link.getPage().toString())) {
			warn(rcId, "bad redirect (self-link)", "page "+name, null);
		}
		else {
			conceptId = store.storeAbout(rcId, name); 
			storePageTerms(rcId, analyzerPage.getTitleTerms(), -1, link.getPage().toString(), ExtractionRule.TERM_FROM_REDIRECT );
			storeConceptAlias(rcId, conceptId, name, -1, link.getPage().toString(), AliasScope.REDIRECT); 
			
			//FIXME: redir to section!
		}
		
		return conceptId;
	}
	
	public static void declareOptions(Arguments args) {
		AbstractImporter.declareOptions(args);
		
		args.declare("nodef", null, true, String.class, "do not extract and store definitions (improves speed)");
		args.declare("noprop", null, true, String.class, "do not extract and store properties (improves speed)");
		args.declare("dotext", null, true, String.class, "do strip and store flat text (degrades speed)");
	}

	@Override
	public void configure(Arguments args) throws Exception {
		super.configure(args);
		
		this.storeDefinitions = !args.isSet("nodef");
		this.storeProperties = !args.isSet("noprop");
		this.storeFlatText = args.isSet("dotext");
		this.storeRawText = args.isSet("dotext");
	}

	//-----------------------------------------------------------------------------
	
	protected int storeConcept(int rcId, String name, ConceptType ctype) throws PersistenceException {
		//NOTE: trust concept name, no need to sniff it 
		return store.storeConcept(rcId, name, ctype);
	}

	protected void storeConceptAlias(int rcId, int source, String sourceName, int target, String targetName, AliasScope scope) throws PersistenceException {
		if (checkName(rcId, sourceName, "concept name (resource #{0}) - SKIPED", rcId)) return;
		if (checkName(rcId, targetName, "concept name (resource #{0}) - SKIPED", rcId)) return;
		store.storeConceptAlias(rcId, source, sourceName, target, targetName, scope);
	}

	protected void storeConceptBroader(int rcId, int narrowId, String narrowName, String broadName, ExtractionRule rule) throws PersistenceException {
		if (checkName(rcId, narrowName, "concept name (resource #{0}) - SKIPED", rcId)) return;
		if (checkName(rcId, broadName,  "concept name (resource #{0}) - SKIPED", rcId)) return;
		store.storeConceptBroader(rcId, narrowId, narrowName, broadName, rule);
	}

	protected void storeConceptBroader(int rcId, String narrowName, String broadName, ExtractionRule rule) throws PersistenceException {
		if (checkName(rcId, narrowName, "concept name (resource #{0}) - SKIPED", rcId)) return;
		if (checkName(rcId, broadName,  "concept name (resource #{0}) - SKIPED", rcId)) return;
		store.storeConceptBroader(rcId, narrowName, broadName, rule);
	}

	protected void storeDefinition(int rcId, int conceptId, String definition) throws PersistenceException {
		checkSmellsLikeWiki(rcId, definition, "definition of concept #{0} (storing anyway)", conceptId);
		store.storeDefinition(rcId, conceptId, definition);
	}

	protected void storeLanguageLink(int rcId, int concept, String conceptName, String lang, String target) throws PersistenceException {
		if (checkName(rcId, conceptName, "concept name (resource #{0}) - SKIPED", rcId)) return;
		if (checkName(rcId, target, "external concept name (resource #{0}) - SKIPED", rcId)) return;
		store.storeLanguageLink(rcId, concept, conceptName, lang, target);
	}

	protected void storeLink(int rcId, int anchorId, String anchorName, String term, String targetName, ExtractionRule rule) throws PersistenceException {
		if (checkTerm(rcId, term, "SKIPED", -1)) return; 
		if (checkSmellsLikeWiki(rcId, term, "term - SKIPED", -1)) return;
		if (checkName(rcId, anchorName, "concept name (anchor ~ resource #{0}) - SKIPED", rcId)) return;
		if (checkName(rcId, targetName, "concept name (target in resource #{0}) - SKIPED", rcId)) return;
		store.storeLink(rcId, anchorId, anchorName, term, targetName, rule);
	}

	protected void storeReference(int rcId, String term, int targetId, String targetName, ExtractionRule rule) throws PersistenceException {
		if (checkTerm(rcId, term, "SKIPED", -1)) return; 
		if (checkSmellsLikeWiki(rcId, term, "term - SKIPED", -1)) return;
		if (checkName(rcId, targetName, "concept name (target in resource #{0}) - SKIPED", rcId)) return;
		store.storeReference(rcId, term, targetId, targetName, rule);
	}

	protected int storeResource(String name, ResourceType ptype, Date time) throws PersistenceException {
		//NOTE: trust name. no need to check
		return store.storeResource(name, ptype, time);
	}

	protected void storeSection(int rcId, String name, String page) throws PersistenceException {
		if (checkName(rcId, name, "section name (from section link in resource #{0}) - SKIPED", rcId)) return;
		if (checkName(rcId, page, "concept name (from section link in resource #{0}) - SKIPED", rcId)) return;
		store.storeSection(rcId, name, page);
	}

	protected void storeSupplements(int rcId, int cid, WikiPage analyzerPage) throws PersistenceException {
		CharSequence supplemented = analyzerPage.getSupplementedConcept();
		
		String name = analyzerPage.getConceptName();
		
		if (supplemented!=null) {
			storeConceptAlias(rcId, cid, name, -1, supplemented.toString(), AliasScope.SUPPLEMENT);
		}
		
		Set<CharSequence> supplementLinks = analyzerPage.getSupplementLinks();
		for (CharSequence supp: supplementLinks) {
			storeConceptAlias(rcId, -1, supp.toString(), cid, name, AliasScope.SUPPLEMENT);
		}
	}

	public boolean isStoreDefinitions() {
		return storeDefinitions;
	}

	public void setStoreDefinitions(boolean storeDefinitions) {
		this.storeDefinitions = storeDefinitions;
	}

	public boolean isStoreFlatText() {
		return storeFlatText;
	}

	public void setStoreFlatText(boolean storeFlatText) {
		this.storeFlatText = storeFlatText;
	}

	public boolean isStoreProperties() {
		return storeProperties;
	}

	public void setStoreProperties(boolean storeProperties) {
		this.storeProperties = storeProperties;
	}

	public boolean isStoreRawText() {
		return storeRawText;
	}

	public void setStoreRawText(boolean storeRawText) {
		this.storeRawText = storeRawText;
	}
	
}
