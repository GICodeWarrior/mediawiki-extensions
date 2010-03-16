package org.wikimedia.lsearch.analyzers;

/**
 * Generate field names for the index. 
 * 
 * @author rainman
 *
 */
public class FieldNameFactory {
	public static final boolean EXACT_CASE = true;
	protected boolean exactCase;

	public FieldNameFactory(){
		this.exactCase = false;
	}
	
	public FieldNameFactory(boolean exactCase){
		this.exactCase = exactCase;
	}

	public String contents(){
		if(exactCase)
			return "contents_exact";
		else
			return "contents"; 
	}
	
	public String title(){
		if(exactCase)
			return "title_exact";
		else
			return "title"; 
	}
	
	public String stemtitle(){
		if(exactCase)
			return "stemtitle_exact";
		else
			return "stemtitle"; 
	}
	
	public String alttitle(){
		if(exactCase)
			return "alttitle_exact";
		else
			return "alttitle"; 
	}
	
	public String keyword(){
		if(exactCase)
			return "keyword_exact";
		else
			return "keyword";
	}
	
	public String related(){
		if(exactCase)
			return "related_exact";
		else
			return "related";
	}
	
	public String context(){
		if(exactCase)
			return "context_exact";
		else
			return "context";
	}
	
	public String anchor(){
		if(exactCase)
			return "anchor_exact";
		else
			return "anchor";
	}
	
	public String wholetitle(){
		if(exactCase)
			return "wholetitle_exact";
		else
			return "wholetitle";
	}
	
	public String reverse_title(){
		if(exactCase)
			return "reverse_title_exact";
		else
			return "reverse_title";
	}

	public String sections(){
		if(exactCase)
			return "sections_exact";
		else
			return "sections";
	}
	
	public boolean isExactCase() {
		return exactCase;
	}

	public String spellcheck_context() {
		return "spellcheck_context";
	}
	
	public String hl_text(){
		if(exactCase)
			return "text_exact";
		else
			return "text";
	}
	
	public String hl_alttitle(){
		if(exactCase)
			return "alttitle_exact";
		else
			return "alttitle";
	}

	public String begin() {
		if(exactCase)
			return "begin_exact";
		else
			return "begin";
	}


}
