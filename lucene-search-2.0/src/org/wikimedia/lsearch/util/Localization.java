package org.wikimedia.lsearch.util;

import java.io.BufferedReader;
import java.io.FileReader;
import java.net.URL;
import java.text.MessageFormat;
import java.util.Collection;
import java.util.Hashtable;
import java.util.HashSet;
import java.util.Map.Entry;

import org.apache.log4j.Logger;
import org.wikimedia.lsearch.beans.Title;
import org.wikimedia.lsearch.config.Configuration;

/** 
 * Provides localization for namespace names, and provides interwiki map. 
 * Localization is read from MediaWiki Message files by some simple php
 * parsing (which might be a problem if the format changes significantly) 
 */
public class Localization {
	static org.apache.log4j.Logger log = Logger.getLogger(Localization.class);
	/** langCode -> name -> ns_id */ 
	protected static Hashtable<String,Hashtable<String,Integer>> namespaces = new Hashtable<String,Hashtable<String,Integer>>();
	/** langCode -> redirect magic wods */
	protected static Hashtable<String,HashSet<String>> redirects = new Hashtable<String,HashSet<String>>();
	protected static Object lock = new Object();
	/** Languages for which loading of localization failed */
	protected static HashSet<String> badLocalizations = new HashSet<String>();
	protected static HashSet<String> interwiki = null;
	/** lowecased canonical names of namespaces */
	protected static Hashtable<String,Integer> canonicalNamespaces = new Hashtable<String,Integer>();		
	static{
		canonicalNamespaces.put("media",-2);
		canonicalNamespaces.put("special",-1);
		canonicalNamespaces.put("talk",1);
		canonicalNamespaces.put("user",2);
		canonicalNamespaces.put("user_talk",3);
		canonicalNamespaces.put("project",4);
		canonicalNamespaces.put("project_talk",5);
		canonicalNamespaces.put("image",6);
		canonicalNamespaces.put("image_talk",7);
		canonicalNamespaces.put("mediawiki",8);
		canonicalNamespaces.put("mediawiki_talk",9);
		canonicalNamespaces.put("template",10);
		canonicalNamespaces.put("template_talk",11);
		canonicalNamespaces.put("help",12);
		canonicalNamespaces.put("help_talk",13);
		canonicalNamespaces.put("category",14);
		canonicalNamespaces.put("category_talk",15);
	}
	
	/** Add custom mapping not found in localization files from other source, e.g. project name, etc.. */
	public static void addCustomMapping(String namespace, int index, String langCode){
		synchronized(lock){
			Hashtable<String,Integer> map = namespaces.get(langCode);
			if(map == null){
				map = new Hashtable<String,Integer>();
				namespaces.put(langCode,map);
			}
			map.put(namespace.toLowerCase(),index);
		}
	}
	
	public static HashSet<String> getLocalizedImage(String langCode){
		return getLocalizedNamespace(langCode,6);
	}
	
	public static HashSet<String> getLocalizedCategory(String langCode){
		return getLocalizedNamespace(langCode,14);
	}
	
	public static HashSet<String> getLocalizedNamespace(String langCode, int nsId){
		synchronized (lock){
			langCode = langCode.toLowerCase();
			if(namespaces.get(langCode)==null){
				if(badLocalizations.contains(langCode) || !readLocalization(langCode))
					return new HashSet<String>();
			}
			return collect(namespaces.get(langCode),nsId);
		}
	}
	
	/** Pre-load a number localizations for languages */
	public static void readLocalizations(Collection<String> langCodes){
		for(String langCode : langCodes){
			readLocalization(langCode);
		}
	}
	
	/** Collect all the names with some certain namespace id */
	protected static HashSet<String> collect(Hashtable<String,Integer> ns, int nsid) {
		HashSet<String> ret = new HashSet<String>();
		for(Entry<String,Integer> e : ns.entrySet()){
			if(e.getValue().intValue() == nsid)
				ret.add(e.getKey());
		}
		return ret;
	}

	/** Reads localization for language, return true if success */
	public static boolean readLocalization(String langCode){
		langCode = langCode.toLowerCase();
		return readLocalization(langCode,0);
	}
	
	/** Level is recursion level (to detect infinite recursion if language
	 * defines itself as a fallback) */
	protected static boolean readLocalization(String langCode, int level){
		Configuration config = Configuration.open();
		if(langCode == null || langCode.equals(""))
			return false;
		if(level == 5) // max 5 recursions in depth
			return false;
		log.info("Reading localization for "+langCode);
		// make title case
		langCode = langCode.substring(0,1).toUpperCase()+langCode.substring(1).toLowerCase();
		if(badLocalizations.contains(langCode.toLowerCase())){
			log.debug("Localization for "+langCode.toLowerCase()+" previously failed");
			return false;
		}		
		String loc = config.getString("Localization","url");
		if(loc == null){
			log.warn("Property Localization.url not set in config file. Localization disabled.");
			return false;
		}
		URL url;
		try {
			url = new URL(MessageFormat.format(loc,langCode));
			
			PHPParser parser = new PHPParser();
			String text = parser.readURL(url);
			if(text!=null && text.length()!=0){
				Hashtable<String,Integer> ns = parser.getNamespaces(text);
				HashSet<String> redirect = parser.getRedirectMagic(text);
				if(redirect != null)
					redirects.put(langCode.toLowerCase(),redirect);
				else
					redirects.put(langCode.toLowerCase(),new HashSet<String>());
				if(ns!=null && ns.size()!=0){
					namespaces.put(langCode.toLowerCase(),ns);					
					log.debug("Succesfully loaded localization for "+langCode.toLowerCase());
					return true;
				} else{ // maybe a fallback language is defines instead
					String fallback = parser.getFallBack(text);
					if(fallback!=null && !fallback.equals("")){
						fallback = fallback.replace('-','_');
						boolean succ = readLocalization(fallback,level+1);
						if(succ){
							namespaces.put(langCode.toLowerCase(),namespaces.get(fallback.toLowerCase()));
							redirects.put(langCode.toLowerCase(),redirects.get(fallback.toLowerCase()));
						}
						return succ;
					}
				}
			}
		} catch (Exception e) {
			log.warn("Error processing message file at "+MessageFormat.format(loc,langCode));
		}
		log.warn("Could not load localization for "+langCode);
		badLocalizations.add(langCode.toLowerCase());
		return false;
	}
	
	/** Returns redirect taget if this is redirect, otherwise returns null */
	public static String getRedirectTarget(String text, String lang){
		// quick check
		if(text.length()==0 || text.charAt(0)!='#')
			return null;
		int linesep = text.indexOf('\n');
		String line; // fetch first line
		if(linesep == -1)
			line = text.toLowerCase();
		else
			line = text.substring(0,linesep).toLowerCase();
		
		if(lang != null){
			lang = lang.toLowerCase();
			if(redirects.get(lang)==null){
				synchronized (lock){			
					readLocalization(lang);
				}
			}
		}
		boolean isRed = false;
		if(line.startsWith("#redirect"))
			isRed = true;
		else if(lang != null && redirects.get(lang)!=null){
			for(String magic : redirects.get(lang)){
				if(line.startsWith(magic)){
					isRed = true;
					break;
				}
			}
		}
		if(isRed){ // it's redirect now find target
			int begin = line.indexOf("[[");
			int end = line.indexOf("]]");
			if(begin != -1 && end != -1 && end > begin){
				String redirectText = text.substring(begin+2,end);
				int fragment = redirectText.lastIndexOf('#');
				if(fragment != -1)
					redirectText = redirectText.substring(0,fragment);
				return redirectText;
			}
		}
		return null;
	}
	
	/** If text redirects to some page, get that page's title object */
	public static Title getRedirectTitle(String text, String lang){
		String full = getRedirectTarget(text,lang);
		if(full == null)
			return null;
		if(full.startsWith(":"))
			full = full.substring(1);
		String[] parts = full.split(":",2);
		if(parts.length == 2){
			String ns = parts[0].toLowerCase();
			// check canonical
			if(canonicalNamespaces.containsKey(ns))
				return new Title(canonicalNamespaces.get(ns),parts[1]);
			// check lang namespaces
			Hashtable<String,Integer> map = namespaces.get(lang);
			if(map.containsKey(ns))
				return new Title(map.get(ns),parts[1]);
		}
		// not recognized namespace, using main
		return new Title(0,full);		
	}
	
	/** Loads interwiki from default location lib/interwiki.map */
	public static void loadInterwiki(){
		if(interwiki != null)
			return;
		interwiki = new HashSet<String>();
		String lib = Configuration.open().getString("MWConfig","lib","./lib");
		String path = lib+"/interwiki.map";
		try{
			BufferedReader r = new BufferedReader(new FileReader(path));
			String line;
			while((line = r.readLine()) != null){
				interwiki.add(line.trim());
			}
			log.debug("Read interwiki map from "+path);
			r.close();
		} catch(Exception e){
			log.warn("Cannot read interwiki map from "+path);
		}
	}
	
	public static HashSet<String> getInterwiki(){
		if(interwiki == null)
			loadInterwiki();
		return interwiki;
	}
}
