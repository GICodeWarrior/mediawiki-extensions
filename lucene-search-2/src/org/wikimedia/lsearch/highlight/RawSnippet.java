package org.wikimedia.lsearch.highlight;

import java.util.ArrayList;
import java.util.Collections;
import java.util.HashSet;
import java.util.Set;

import org.apache.lucene.analysis.Token;
import org.wikimedia.lsearch.analyzers.Alttitles;
import org.wikimedia.lsearch.analyzers.CJKFilter;
import org.wikimedia.lsearch.analyzers.ExtToken;
import org.wikimedia.lsearch.analyzers.FastWikiTokenizerEngine;
import org.wikimedia.lsearch.analyzers.ExtToken.Position;
import org.wikimedia.lsearch.analyzers.ExtToken.Type;
import org.wikimedia.lsearch.highlight.Highlight.FragmentScore;
import org.wikimedia.lsearch.highlight.Snippet.Range;

/**
 * Building material for snippets of highlighted text.
 * 
 * @author rainman
 *
 */
public class RawSnippet {
	protected double score = 0;
	protected ArrayList<ExtToken> tokens = null;
	protected int bestStart = -1;
	protected int bestEnd = -1;
	protected Set<String> highlight;
	protected Set<String> newTerms;
	protected Alttitles.Info alttitle;
	
	protected FragmentScore next, section, cur;
	protected Position pos;
	protected HashSet<String> found;
	protected int sequenceNum;
	protected Set<String> stopWords;
	
	protected boolean highlightAllStop = false;
	protected boolean isCJK = false;

	// for custom scoring
	protected int textLength = 0;
	
	/** number of chars in [start,end) in tokens */
	protected int charLen(int start, int end){
		return charLen(tokens,start,end);
	}
	/** number of chars in any token array */
	protected int charLen(ArrayList<ExtToken> tokenArray, int start, int end){
		int len = 0;
		for(int i=start;i<end && i<tokenArray.size();i++){
			ExtToken t = tokenArray.get(i);
			if(t.getPositionIncrement() != 0)
				len += t.getText().length();
		}
		return len;
	}
	
	/** find the token size chars after from */
	protected int findLastWithin(int from, int size){
		int len = 0;
		for(int i=from;i<tokens.size();i++){
			ExtToken t = tokens.get(i);
			if(t.getPositionIncrement() != 0)
				len += t.getText().length();
			if(len > size)
				return i;
		}
		return tokens.size();
	}
	
	/** reverse of findLastWithin */
	protected int findFirstWithin(int from, int size){
		int len = 0;
		for(int i=from-1;i>=0;i--){
			ExtToken t = tokens.get(i);
			if(t.getPositionIncrement() != 0)
				len += t.getText().length();
			if(len > size)
				return i;
		}
		return 0;
	}
	
	/** scan a range o tokens for a minor break */
	protected int findMinorBreak(int from, int to){
		for(int i=from;i<to;i++){
			if(tokens.get(i).getType() == ExtToken.Type.MINOR_BREAK)
				return i;
		}
		return -1;
	}
	
	/** scan through tokens until all of the new terms have been collected,
	 *  starting from start, in direction inc (+/-1) */
	protected int collectNewTerms(HashSet<String> frame, ArrayList<ExtToken> frameTokens, ArrayList<Integer> frameIndex, int start, int inc){
		if(frame.size()>=newTerms.size())
			return start;
		int i = start;
		int last = start;
		for(;i>=0 && i<tokens.size();i+=inc){
			ExtToken t = tokens.get(i);
			if(newTerms.contains(t.termText()) && !frame.contains(t.termText())){
				last = i;
				frame.add(t.termText());
				// collect the tokens that will be used to display text
				if(t.getPositionIncrement() == 0 && i-1>=0){
					frameTokens.add(tokens.get(i-1));
					frameIndex.add(i-1);
				} else{
					frameTokens.add(t);
					frameIndex.add(i);
				}
				if(frame.size()>=newTerms.size())
					return last;
			}
		}
		return last;
	}
	
	protected static class Gap {
		int start, end;
		Gap(int start, int end){
			this.start = start;
			this.end = end;
		}
	}
	
	/** jump to end of gap if any */ 
	private int toGapEnd(ArrayList<Gap> gaps, int index){
		for(Gap g : gaps){
			if(g.start <= index && index < g.end)
				return g.end;
			if(g.start > index)
				return index;
		}
		return index;
	}
	
	/** Make a text snippet */
	public Snippet makeSnippet(int context){
		return makeSnippet(context,false);
	}
	/** 
	 * Construct a snippet of predefined length
	 * 
	 * @param context - max number of chars for the snippet
	 * @return
	 */ 
	public Snippet makeSnippet(int context, boolean showAllGlue){		
		int showBegin, showEnd;
		
		// unstub the whole snippet
		for(ExtToken t : tokens)
			t.unstub();
		
		// find frame with all the new terms in it
		HashSet<String> frameStr = new HashSet<String>();
		ArrayList<ExtToken> frameTokens = new ArrayList<ExtToken>(); 
		ArrayList<Integer> frameIndex = new ArrayList<Integer>();
		int frameStart = Math.min(bestStart,collectNewTerms(frameStr,frameTokens,frameIndex,bestEnd,-1));
		int frameEnd = Math.max(bestEnd,collectNewTerms(frameStr,frameTokens,frameIndex,bestStart,1)+1);
		
		
		// check if beginning of the sentence is in context range
		int before = charLen(0,frameStart);
		int after = charLen(frameEnd,tokens.size());
		int frame = charLen(frameStart,frameEnd);
		int frameLen = charLen(frameTokens,0,frameTokens.size());
		ArrayList<Gap> gaps = new ArrayList<Gap>();
		
		if(frame > context){
			// more tokens than we can show
			showBegin = frameStart;
			showEnd = findLastWithin(showBegin,context);
			if(frameLen < context && frameTokens.size()>1){
				showEnd = frameEnd;
				Collections.sort(frameIndex);
				ArrayList<Integer> intervals = new ArrayList<Integer>();
				int sum = 0; // sum of intervals 
				for(int i=0;i<frameIndex.size()-1;i++){
					int s = charLen(frameIndex.get(i)+1,frameIndex.get(i+1));
					intervals.add(s);
					sum += s;
				}
				int rest = context - frameLen; // how much of the intervals should we leave
				int gapcount = 0;
				for(Integer i : intervals){
					if(i>2)
						gapcount++;
				}
				if(gapcount > 0){
					int pergap = rest / (2*(gapcount+1));
					int showBeginNew = findFirstWithin(showBegin+1,pergap);
					rest -= charLen(showBeginNew,showBegin);
					showBegin = showBeginNew;
					int showEndNew = findLastWithin(showEnd,pergap);
					rest -= charLen(showEnd,showEndNew);
					showEnd = showEndNew;
					// after adjusting begin/end, recalculate 
					pergap = rest / (2*gapcount);
					for(int i=0;i<intervals.size();i++){
						int interval = intervals.get(i);
						if(interval <= 2)
							continue;
						int gapStart = findLastWithin(frameIndex.get(i)+1,pergap);
						int gapEnd = findFirstWithin(frameIndex.get(i+1),pergap);
						if(gapStart < gapEnd)
							gaps.add(new Gap(gapStart,gapEnd));
					}
				}
			}
		} else if(before + frame + after < context){
			// we can show everything!
			showBegin = 0;
			showEnd = tokens.size();
		} else if(before + frame < context){
			// show from begin
			showBegin = 0;
			showEnd = findLastWithin(showBegin,context);
		} else if(after < before && after + frame < context){
			// show till end
			showEnd = tokens.size();
			showBegin = findFirstWithin(showEnd,context);
		} else{
			// show some before/after, start at minor word break if any is near
			int radix = (context - frame) / 2;
			int scanFrom = findFirstWithin(frameStart,radix);
			int minor = findMinorBreak(scanFrom,frameStart);
			if(minor != -1)
				showBegin = minor;
			else
				showBegin = scanFrom;
			showEnd = findLastWithin(showBegin,context);			
		}
		
		// make snippet in range showBegin,showEnd
		Snippet s = new Snippet();
		StringBuilder sb = new StringBuilder();
		int start=0, end=0, mid=0; // range 
		if(showBegin > 0 && tokens.get(showBegin).getType() == ExtToken.Type.TEXT)
			showBegin--; // always start with nontext token to catch " and (
		if(showEnd == tokens.size())
			s.setShowsEnd(true);
		if(showBegin == 0 && showEnd == tokens.size())
			s.setShowsAll(true);
		// don't show the final space if any
		if(s.isShowsEnd() && tokens.size()>1 && tokens.get(tokens.size()-1).getText().equals(" ")){
			tokens.remove(tokens.size()-1);
			showEnd--;
		}
		ExtToken mainToken = null;
		for(int i=showBegin;i<showEnd;i++){			
			int inext = toGapEnd(gaps,i);
			// split points 
			if(i != inext){
				s.addSplitPoint(getLength(sb));
				sb.append(" ");
				i = inext-1;
				continue;
			}
			ExtToken t = tokens.get(i);
			if(i == showBegin && t.getType() != ExtToken.Type.TEXT && !showAllGlue){
				// catch only specific nontext beginings
				//if(t.getText().contains("|") && (i+1<showEnd && tokens.get(i+1).getPosition() == Position.TABLE))
				//	sb.append("| ");
				if(t.getText().endsWith("\""))
					sb.append("\""); // hack to include initial " 
				else if(t.getText().endsWith("("))
					sb.append("("); // hack to include initial (
				continue;
			}
			if(i == showEnd-1 && t.getType() != ExtToken.Type.TEXT && !showAllGlue){
				// exlude some final delimiters
				if(t.getText().contains("(") || t.getText().contains("[") || t.getText().contains("{"))
					continue;
			}
			if(t.getPositionIncrement() != 0){
				if(isCJK && t.getType() == Type.TEXT && t.type().equals("cjk")){
					boolean lastOnly = false;
					// reconstruct CJK tokens from stream C1C2 C2C3 C3C4 -> C1C2C3C4					
					if(mainToken != null && mainToken.getType()==Type.TEXT && mainToken.type().equals("cjk") && mid!=start){
						start = mid; // C2C3 token, start of this token is "in the middle of last added token"
						lastOnly = true;
					} else
						start = getLength(sb); // C1C2 token
					
					// add current
					mid = start;
					String tt = t.getText();
					int len = tt.length();
					if(len>=2 && CJKFilter.isCJKChar(tt.codePointAt(0))){ 
						// not terminal, calculate new midpoint
						int point = len-1;
						if(Character.isSurrogatePair(tt.charAt(len-2),tt.charAt(len-1)))
							point = len-2;
						
						if(!lastOnly)
							sb.append(tt.substring(0,point));
						mid = getLength(sb);
						sb.append(tt.substring(point));
					} else
						sb.append(tt);

					end = getLength(sb);
				} else{
					start = getLength(sb);
					sb.append(t.getText());
					end = getLength(sb);
				}
				mainToken = t;
			}
			if(highlight.contains(t.termText()) && !isolatedStopWords(t.termText(),i)){
				// highlight part of the text
				if(mainToken != null && mainToken!=t && (mainToken.termText().contains(".") || mainToken.termText().contains("'"))){
					Snippet.Range range = findSubRange(mainToken,t,start);
					if(range != null)
						s.addRange(range);
				} else
					s.addRange(new Snippet.Range(start,end));
			}
		}
		s.setText(sb.toString());
		if(alttitle != null)
			s.setOriginalText(alttitle.getTitle());
		
		s.simplifyRanges();
		return s;
	}
	
	private Range findSubRange(ExtToken mainToken, ExtToken t, int offset) {
		ArrayList<String> parts = new ArrayList<String>();
		ArrayList<Integer> starts = new ArrayList<Integer>();
		ArrayList<Integer> ends = new ArrayList<Integer>();
		int start=-1;
		// split the main token around apostrophes and dots, find the matching part
		char[] text = mainToken.termText().toCharArray();
		for(int i=0;i<text.length+1;i++){
			boolean sp = i==text.length || text[i]=='\'' || text[i]=='.';
			if(!sp && start==-1){
				start = i;
			} else if(sp && start!=-1){
				parts.add(FastWikiTokenizerEngine.decompose(new String(text, start, i-start)));
				starts.add(start);
				ends.add(i);
				start = -1;
			}
		}
		// find the right part
		for(int i=0;i<parts.size();i++){
			if(t.termText().equals(parts.get(i))){
				return new Snippet.Range(offset+starts.get(i),offset+ends.get(i));
			}
		}
		
		return null;
	}
	
	/** If this is a stop words without any highlighted words before or after */
	final private boolean isolatedStopWords(String text, int index) {
		if(stopWords == null || stopWords.size()==0 || !stopWords.contains(text) || highlightAllStop)
			return false;
		// look before the word
		for(int prev=index-1;prev>=0;prev--){
			ExtToken t = tokens.get(prev);
			if(highlight.contains(t.termText()))
				return false;
			if(t.getPositionIncrement() != 0 && t.getType() == ExtToken.Type.TEXT)
				break;
		}
		// look after
		boolean firstfull = false;
		for(int next=index+1;next<tokens.size();next++){
			ExtToken t = tokens.get(next);			
			if(t.getPositionIncrement() != 0 && t.getType() == ExtToken.Type.TEXT){
				if(!firstfull)
					firstfull = true;
				else
					break;
			}
			if(highlight.contains(t.termText()))
				return false;
		}
		return true;
	}
	/** Current length of the stringbuilder (in utf-8 bytes) */
	protected int getLength(StringBuilder sb){
		try{
			// would be nice if this would be more efficient 
			return sb.toString().getBytes("utf-8").length;
		} catch(Exception e){
			e.printStackTrace();
			return sb.length();
		}
	}
	
	public RawSnippet(ArrayList<ExtToken> tokens, FragmentScore f, 
			Set<String> highlight, Set<String> newTerms, Set<String> stopWords,
			boolean isCJK){
		this.tokens = new ArrayList<ExtToken>();
		// include initial nontext token 
		if(f.start > 0 && f.start < tokens.size() && tokens.get(f.start).getType()==ExtToken.Type.TEXT)
			f.start--;
		for(int i=f.start;i<f.end;i++)
			this.tokens.add(tokens.get(i));
		this.highlight = highlight;
		this.newTerms = newTerms;
		this.score = f.score;
		this.bestStart = f.bestStart - f.start;
		if(bestStart < 0)
			bestStart = 0;
		this.bestEnd = f.bestEnd - f.start;
		if(bestEnd < 0)
			bestEnd = 0;
		this.pos = f.pos;
		this.found = f.found;
		this.next = f.next;
		this.section = f.section;
		this.cur = f;
		this.sequenceNum = f.sequenceNum;
		this.stopWords = stopWords;
		this.isCJK = isCJK;
		this.textLength = noAliasLength();
		if(stopWords!=null && stopWords.size()>0){
			highlightAllStop = true;
			for(String s : highlight){
				if(!stopWords.contains(s)){
					highlightAllStop = false;
					break;
				}
			}
		}
	}
	
	public int noAliasLength(){
		int len = 0;
		for(ExtToken t : tokens){
			if(t.getType() == ExtToken.Type.TEXT && t.getPositionIncrement() != 0)
				len++;
		}
		return len;
	}
	
	/** count number of positions where highlighted words are found */
	public int countPositions(){
		HashSet<Integer> pos = new HashSet<Integer>();
		int count = 0;
		for(int i=0;i<tokens.size();i++){
			ExtToken t = tokens.get(i);
			if(t.getType()!=Type.TEXT)
				continue;
			if(t.getPositionIncrement() != 0)
				count++;
			if(found.contains(t.termText()))
				pos.add(count);
		}
		return pos.size();
	}

	public int getBestEnd() {
		return bestEnd;
	}

	public void setBestEnd(int bestEnd) {
		this.bestEnd = bestEnd;
	}

	public int getBestStart() {
		return bestStart;
	}

	public void setBestStart(int bestStart) {
		this.bestStart = bestStart;
	}

	public Set<String> getHighlight() {
		return highlight;
	}

	public void setHighlight(Set<String> highlight) {
		this.highlight = highlight;
	}

	public double getScore() {
		return score;
	}

	public void setScore(double score) {
		this.score = score;
	}

	public ArrayList<ExtToken> getTokens() {
		return tokens;
	}

	public void setTokens(ArrayList<ExtToken> tokens) {
		this.tokens = tokens;
	}

	public Alttitles.Info getAlttitle() {
		return alttitle;
	}

	public void setAlttitle(Alttitles.Info alttitle) {
		this.alttitle = alttitle;
	}

	public FragmentScore getNext() {
		return next;
	}

	public void setNext(FragmentScore next) {
		this.next = next;
	}

	public Position getPos() {
		return pos;
	}

	public void setPos(Position pos) {
		this.pos = pos;
	}

	public FragmentScore getSection() {
		return section;
	}

	public void setSection(FragmentScore section) {
		this.section = section;
	}
	
	public FragmentScore getCur() {
		return cur;
	}

	public void setCur(FragmentScore cur) {
		this.cur = cur;
	}

	public HashSet<String> getFound() {
		return found;
	}

	public void setFound(HashSet<String> found) {
		this.found = found;
	}

	public int getSequenceNum() {
		return sequenceNum;
	}

	public void setSequenceNum(int sequenceNum) {
		this.sequenceNum = sequenceNum;
	}

	@Override
	public int hashCode() {
		final int PRIME = 31;
		int result = 1;
		result = PRIME * result + ((cur == null) ? 0 : cur.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		final RawSnippet other = (RawSnippet) obj;
		if (cur == null) {
			if (other.cur != null)
				return false;
		} else if (!cur.equals(other.cur))
			return false;
		return true;
	}
	
	public String toString(){
		return "first="+Boolean.toString(cur.isFirstSentence)+", sequence="+sequenceNum+", score="+score+", bestStart="+bestStart+", bestEnd="+bestEnd+", next=["+next+"], tokens="+tokens;
	}
	
	
}
