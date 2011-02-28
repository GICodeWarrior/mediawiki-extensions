package org.wikimedia.lsearch.analyzers;

import org.apache.lucene.analysis.KStemmer;

/**
 * KStem-based singular-finding class for English
 * 
 * @author rainman
 *
 */
public class EnglishKStemSingular implements Singular {
	KStemmer kstemmer = new KStemmer(50);
	public String getSingular(String word) {
		String ret = kstemmer.singular(word);
		if(!word.equals(ret))
			return ret;
		else{
			// strip possessive suffix
			if(word.endsWith("'s"))
				return word.substring(0,word.length()-2);
			return null;
		}
	}

}
