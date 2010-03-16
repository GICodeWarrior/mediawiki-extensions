package org.wikimedia.lsearch.analyzers;

import java.io.IOException;
import java.io.StringReader;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashSet;

import junit.framework.TestCase;

import org.apache.lucene.analysis.Analyzer;
import org.apache.lucene.analysis.Token;
import org.apache.lucene.analysis.TokenStream;
import org.apache.lucene.analysis.cjk.CJKAnalyzer;
import org.apache.lucene.analysis.standard.StandardAnalyzer;
import org.apache.lucene.queryParser.ParseException;
import org.apache.lucene.queryParser.QueryParser;
import org.apache.lucene.search.Query;
import org.wikimedia.lsearch.analyzers.Aggregate;
import org.wikimedia.lsearch.analyzers.AggregateAnalyzer;
import org.wikimedia.lsearch.analyzers.Analyzers;
import org.wikimedia.lsearch.analyzers.ExtToken;
import org.wikimedia.lsearch.analyzers.FieldBuilder;
import org.wikimedia.lsearch.analyzers.FilterFactory;
import org.wikimedia.lsearch.analyzers.KeywordsAnalyzer;
import org.wikimedia.lsearch.analyzers.LanguageAnalyzer;
import org.wikimedia.lsearch.analyzers.ReusableLanguageAnalyzer;
import org.wikimedia.lsearch.analyzers.RelatedAnalyzer;
import org.wikimedia.lsearch.analyzers.SplitAnalyzer;
import org.wikimedia.lsearch.analyzers.Aggregate.Flags;
import org.wikimedia.lsearch.beans.Title;
import org.wikimedia.lsearch.config.Configuration;
import org.wikimedia.lsearch.config.GlobalConfiguration;
import org.wikimedia.lsearch.config.IndexId;
import org.wikimedia.lsearch.index.WikiIndexModifier;
import org.wikimedia.lsearch.ranks.StringList;
import org.wikimedia.lsearch.related.RelatedTitle;
import org.wikimedia.lsearch.test.WikiTestCase;
import org.wikimedia.lsearch.util.MathFunc;

public class AnalysisTest extends WikiTestCase {
	Analyzer a = null;
	Configuration config = null;

	protected void setUp() throws Exception {
		super.setUp();
		if(config == null){
			config = Configuration.open();
			GlobalConfiguration.getInstance();
		}
	}

	public void testCJKAnalyzer(){
		a = new CJKAnalyzer();
		assertEquals("[(いわ,0,2,type=double), (わさ,1,3,type=double), (さき,2,4,type=double), (ic,4,6,type=single), (カー,6,8,type=double), (ード,7,9,type=double)]",tokens("いわさきicカード"));
	}

	/** Common test for indexer and searcher analyzers */
	public void commonEnglish(){
		assertEquals("[(1,0,1), (st,1,3)]",tokens("1st"));
		assertEquals("[(good-,0,5,type=with_hyphen), (good,0,5,type=with_hyphen,posIncr=0), (goodthomas,0,11,posIncr=0), (thomas,5,11)]",tokens("Good-Thomas"));
		assertEquals("[(box,0,3)]",tokens("box"));
		assertEquals("[(boxes,0,5), (box,0,5,type=singular,posIncr=0)]",tokens("boxes"));
		assertEquals("[(abacus,0,6), (aries,7,12), (douglas,13,20), (adams,21,26)]",tokens("abacus aries douglas adams"));
		assertEquals("[(laziness,0,8), (lazy,0,8,type=stemmed,posIncr=0)]",tokens("laziness"));
		assertEquals("[(c++,0,3), (c,0,3,posIncr=0), (c#,4,6), (c,4,6,posIncr=0)]",tokens("c++ C#"));
		assertEquals("[(hitchhikers,0,11), (hitchhiker,0,11,type=singular,posIncr=0), (hitchhike,0,11,type=stemmed,posIncr=0)]",tokens("hitchhikers"));
		assertEquals("[(c'est,0,5), (cest,0,5,posIncr=0), (hitchhiker's,6,18), (hitchhiker,6,18,type=singular,posIncr=0), (hitchhikers,6,18,posIncr=0), (hitchhike,6,18,type=stemmed,posIncr=0)]",tokens("c'est hitchhiker's"));
		assertEquals("[(pokémons,0,8), (pokemons,0,8,posIncr=0), (pokemon,0,8,type=stemmed,posIncr=0)]",tokens("Pokémons"));
		assertEquals("[(1990,0,4), (s,4,5), (iv,6,8)]",tokens("1990s IV"));
	}

	public void testEnglishSearch(){
		a = Analyzers.getSearcherAnalyzer(IndexId.get("enwiki"));
		commonEnglish();
		// acronyms don't get split
		assertEquals("[(a.k.a,0,5), (aka,0,5,posIncr=0), (www,6,9), (google,10,16), (com,17,20)]",tokens("a.k.a www.google.com"));
	}

	public void testEnglishIndex(){
		a = Analyzers.getIndexerAnalyzer(new FieldBuilder(IndexId.get("enwiki")));
		commonEnglish();
		// acronyms are always split
		assertEquals("[(a.k.a,0,5), (aka,0,5,posIncr=0), (a,0,5,posIncr=0), (k,2,7,posIncr=0), (a,4,9,posIncr=0), (www,6,9), (google,10,16), (com,17,20)]",tokens("a.k.a www.google.com"));
	}

	public void commonSerbian(){
		assertEquals("[(нешто,0,5), (nesto,0,5,type=alias,posIncr=0), (на,6,8), (na,6,8,type=alias,posIncr=0), (ћирилици,9,17), (cirilici,9,17,type=alias,posIncr=0)]",tokens("Нешто на ћирилици"));
	}

	public void testSerbianSearch(){
		a = Analyzers.getSearcherAnalyzer(IndexId.get("srwiki"));
		commonSerbian();
	}

	public void testSerbianIndex(){
		a = Analyzers.getIndexerAnalyzer(new FieldBuilder(IndexId.get("srwiki")));
		commonSerbian();
	}

	public String tokens(String text){
		try{
			return Arrays.toString(tokensFromAnalysis(a,text,"contents"));
		} catch(IOException e){
			fail(e.getMessage());
			return null;
		}
	}

	public static Token[] tokensFromAnalysis(Analyzer analyzer, String text, String field) throws IOException {
		TokenStream stream = analyzer.tokenStream(field, text);
		ArrayList tokenList = new ArrayList();
		while (true) {
			Token token = stream.next();
			if (token == null) break;
			tokenList.add(token);
		}
		return (Token[]) tokenList.toArray(new Token[0]);
	}

	public static void displayTokens(Analyzer analyzer, String text) throws IOException {
		Token[] tokens = tokensFromAnalysis(analyzer, text, "contents");
		System.out.println(text);
		System.out.print(">> ");
		print(tokens);
		System.out.println();
	}

	protected static void print(Token[] tokens){
		for (int i = 0, j =0; i < tokens.length; i++, j++) {
			Token token = tokens[i];
			//System.out.print(token.getPositionIncrement()+" [" + token.termText() + "]("+token.startOffset()+","+token.endOffset()+") ");
			if(token instanceof ExtToken)
				System.out.print(" "+token);
			else
				System.out.print(" "+token.getPositionIncrement()+" [" + token.termText() + ",type=" + token.type() + "]");
			if(j > 50){
				System.out.println();
				j=0;
			}

		}
	}

	public static void displayTokens2(Analyzer analyzer, String text) throws IOException {
		Token[] tokens = tokensFromAnalysis(analyzer, text, "contents");
		System.out.println(text);
		System.out.print("contents >> ");
		print(tokens);
		System.out.println();
		tokens = tokensFromAnalysis(analyzer, text, "stemmed");
		System.out.print("stemmed >> ");
		print(tokens);
		System.out.println();
		for(int i=1;i<=KeywordsAnalyzer.KEYWORD_LEVELS;i++){
			tokens = tokensFromAnalysis(analyzer, text, "redirect"+i);
			System.out.print("redirect"+i+" >> ");
			print(tokens);
			System.out.println();
		}
		for(int i=1;i<=RelatedAnalyzer.RELATED_GROUPS;i++){
			tokens = tokensFromAnalysis(analyzer, text, "related"+i);
			System.out.print("related"+i+" >> ");
			print(tokens);
			System.out.println();
		}
	}

	public static void main(String args[]) throws IOException, ParseException{
		Configuration.open();

		//serializeTest(Analyzers.getHighlightAnalyzer(IndexId.get("enwiki")));
		//testAnalyzer(Analyzers.getHighlightAnalyzer(IndexId.get("enwiki")),"Aaliyah");

		Analyzer aa = Analyzers.getSearcherAnalyzer(IndexId.get("wikilucene"));
		displayTokens(aa,"boxes france");

		HashSet<String> stopWords = new HashSet<String>();
		stopWords.add("the"); stopWords.add("of"); stopWords.add("is"); stopWords.add("in"); stopWords.add("and"); stopWords.add("he") ;
		//Analyzer analyzer = Analyzers.getSpellCheckAnalyzer(IndexId.get("enwiki"),stopWords);
		//Analyzer analyzer = Analyzers.getSearcherAnalyzer(IndexId.get("wikilucene"));
		//Analyzer analyzer = Analyzers.getHighlightAnalyzer(IndexId.get("enwiki"));
		Analyzer analyzer = Analyzers.getIndexerAnalyzer(new FieldBuilder(IndexId.get("wikilucene")));
		String text = "1st Good-Thomas goode thomas Peridots c'est WHAT [http://somewhere.com anchor] African on-line laziness Pokémons a-b compatibly compatible Gödel; The who is a band. The who is Pascal's earliest work was in the natural and applied sciences where he made important contributions to the construction of mechanical calculators, the study of fluids, and clarified the concepts of pressure and vacuum by generalizing the work of Evangelista Torricelli. Pascal also wrote powerfully in defense of the scientific method.";
		displayTokens(analyzer,text);
		text = "a.k.a www.google.com Google's Pokémons links abacus something aries douglas adams boxes bands working s and Frame semantics (linguistics)";
		displayTokens(analyzer,text);
		text = "a8n sli compatible compatibly Thomas c# c++ good-thomas Good-Thomas rats RATS Frame semantics (linguistics) 16th century sixteenth .fr web.fr other";
		displayTokens(analyzer,text);
		displayTokens(Analyzers.getSearcherAnalyzer(IndexId.get("zhwiki")),"末朝以來藩鎮割據and some plain english 和宦官亂政的現象 as well");
		displayTokens(analyzer,"Thomas Goode school");
		displayTokens(analyzer,"Agreement reply readily Gödel;");
		displayTokens(analyzer,"''' This is title ''' <i> italic</i>");
		displayTokens(analyzer,"{| border = 1\n| foo bar \n|}>");
		displayTokens(analyzer,"<math> x^2 = \\sin{2x-1}</math>");
		displayTokens(analyzer,"200000, 200.00, 20cm X2, b10, 10.b10");
		displayTokens(analyzer,"#REDIRECT [[Blahblah]]");
		displayTokens(analyzer,"Nešto šđčćžš, itd.. Ћирилично писмо");
		displayTokens(analyzer,"ضصثقفغعهخحشسيب لاتنمئءؤرﻻى");
		displayTokens(analyzer,"[[Image:Lawrence_Brainerd.jpg]], [[Image:Lawrence_Brainerd.jpg|thumb|300px|Lawrence Brainerd]]");
		displayTokens(analyzer,"{{Otheruses4|the Irish rock band|other uses|U2 (disambiguation)}}");
		displayTokens(analyzer,"{{Otheruses4|the Irish rock band|other uses|U2<ref>U2-ref</ref> (disambiguation)}} Let's see<ref>Seeing is...</ref> if template extraction works.\n==Some heading==\n And after that some text..\n\nAnd now? Not now. Then when?  ");

		ArrayList<String> l = new ArrayList<String>();
		l.add("0:Douglas Adams|0:Someone");
		l.add("0:Someone");
		l.add("0:Douglas Adams");
		l.add("");
		l.add("0:Heu");
		displayTokens(new SplitAnalyzer(10,true),new StringList(l).toString());

		analyzer = Analyzers.getSearcherAnalyzer(IndexId.get("viwiki"));
		displayTokens(analyzer,"ä, ö, ü; Đ đViệt Nam Đ/đ ↔ D/d lastone");

		analyzer = Analyzers.getSearcherAnalyzer(IndexId.get("dewiki"));
		displayTokens(analyzer,"Gunzen ä, ö, ü; for instance, Ø ÓóÒò Goedel for Gödel; čakšire");

		analyzer = Analyzers.getSearcherAnalyzer(IndexId.get("enwiki"));
		displayTokens(analyzer," ä, ö, ü; for instance, Ø ÓóÒò Goedel for Gödel; čakšire");

		analyzer = Analyzers.getSearcherAnalyzer(IndexId.get("srwiki"));
		displayTokens(analyzer," ä, ö, ü; for instance, Ø ÓóÒò Goedel for Gödel; čakšire");

		analyzer = Analyzers.getSearcherAnalyzer(IndexId.get("eswiki"));
		displayTokens(analyzer,"lógico y matemático");

		analyzer = Analyzers.getSearcherAnalyzer(IndexId.get("mlwiki"));
		displayTokens(analyzer,"കൊറിയ,“കൊറിയ”");

		printCodePoints("“കൊറിയ”");

		QueryParser parser = new QueryParser("contents",new CJKAnalyzer());
		Query q = parser.parse("いわさきicカード プロサッカークラブをつくろう");
		System.out.println("Japanese in standard analyzer: "+q);
		displayTokens(new CJKAnalyzer(),"は、工学者、大学教授、工学博士。『パンツぱんくろう』というタイトルは、阪本牙城の漫画『タンクタンクロー』が元ネタになっているといわれる。ただし、このアニメと『タンクタンクロー』に内容的な直接の関係は全く無い。");
		displayTokens(Analyzers.getHighlightAnalyzer(IndexId.get("jawiki"),false),"鈴木 孝治（すずき こうじ、1954年 - ）『パンツぱんくろう』というタイトルは、阪本牙城の漫画『タンクタンクロー』が元ネタになっているといわれる。ただし、このアニメと『タンクタンクロー』に内容的な直接の関係は全く無い。");
		displayTokens(Analyzers.getSearcherAnalyzer(IndexId.get("jawiki")),"『パンツぱんくろう』というタjavaイトルはbalaton");
		displayTokens(Analyzers.getSearcherAnalyzer(IndexId.get("jawiki")),"パ ン");

		ArrayList<Aggregate> items = new ArrayList<Aggregate>();
		analyzer = Analyzers.getSearcherAnalyzer(IndexId.get("enwiki"));
		items.add(new Aggregate("douglas adams",10,IndexId.get("enwiki"),analyzer,"related",stopWords,Flags.ALTTITLE));
		items.add(new Aggregate("{{something|alpha|beta}} the selected works...",2.1f,IndexId.get("enwiki"),analyzer,"related",stopWords,Flags.NONE));
		items.add(new Aggregate("hurricane",3.22f,IndexId.get("enwiki"),analyzer,"related",stopWords,Flags.ANCHOR));
		items.add(new Aggregate("and some other stuff",3.2f,IndexId.get("enwiki"),analyzer,"related",stopWords,Flags.NONE));
		displayTokens(new AggregateAnalyzer(items),"AGGREGATE TEST");

		// redirects?
		FieldBuilder builder = new FieldBuilder(IndexId.get("enwiki"));
		ArrayList<String> list = new ArrayList<String>();
		list.add("WikiWiki");
		list.add("What Is Wiki");
		list.add("A very long redirect indeed and dead");
		list.add("Short");
		list.add("Short is short");
		list.add("one two three four five");
		list.add("foo bar");
		/*analyzer = (Analyzer) Analyzers.getIndexerAnalyzer("Agreement reply readily",builder,list,null,null,null,null,null,null)[0];
		displayTokens2(analyzer,"");
		// related
		ArrayList<RelatedTitle> related = new ArrayList<RelatedTitle>();
		related.add(new RelatedTitle(new Title("0:Douglas Adams"),0.52));
		related.add(new RelatedTitle(new Title("0:March 8"),0.12));
		int p[] = MathFunc.partitionList(new double[] {0.52,0.12},5);
		analyzer = (Analyzer) Analyzers.getIndexerAnalyzer("Agreement reply readily",builder,null,null,related,p,null,null,null)[0];
		displayTokens2(analyzer,"");

		analyzer = (Analyzer) Analyzers.getIndexerAnalyzer("Pascal's earliest work was in the natural and applied sciences where he made important contributions to the construction of mechanical calculators, the study of fluids, and clarified the concepts of pressure and vacuum by generalizing the work of Evangelista Torricelli. Pascal also wrote powerfully in defense of the scientific method.",builder,null,null,null,null,null,null,null)[0];
		displayTokens2(analyzer,"");
		analyzer = (Analyzer) Analyzers.getIndexerAnalyzer("1,039/Smoothed Out Slappy Hours",new FieldBuilder(IndexId.get("itwiki")),null,null,null,null,null,null,null)[0];
		displayTokens2(analyzer,"");
		displayTokens(Analyzers.getSearcherAnalyzer(IndexId.get("itwiki")),"1,039/Smoothed Out Slappy Hours");

		ArrayList<Aggregate> items = new ArrayList<Aggregate>();
		items.add(new Aggregate("douglas adams",10,IndexId.get("enwiki"),false));
		items.add(new Aggregate("the selected works...",2.1f,IndexId.get("enwiki"),false));
		items.add(new Aggregate("hurricane",3.22f,IndexId.get("enwiki"),false));
		items.add(new Aggregate("and some other stuff",3.2f,IndexId.get("enwiki"),false));
		displayTokens(new AggregateAnalyzer(items),"AGGREGATE TEST"); */

		IndexId wl = IndexId.get("wikilucene");
		Analyzer an = Analyzers.getSearcherAnalyzer(wl);
		Aggregate a1 = new Aggregate("Redheugh Bridges",1,wl,an,"alttitle",Flags.ALTTITLE);
		Aggregate a2 = new Aggregate("Redheugh Bridge First Crossing",1,wl,an,"alttitle",Flags.ALTTITLE);
		ArrayList<Aggregate> al = new ArrayList<Aggregate>();
		al.add(a1); al.add(a2);
		displayTokens(new AggregateAnalyzer(al),"AGGREGATE TEST");

		displayTokens(Analyzers.getSpellCheckAnalyzer(IndexId.get("enwiki"),new HashSet<String>()),
				"Agreement boxes reply readily Gödel, Gödel; a/b");


		if(true)
			return;

		//testAnalyzer(new EnglishAnalyzer());
		testAnalyzer(Analyzers.getSearcherAnalyzer(IndexId.get("enwiki")));
		testAnalyzer(Analyzers.getSearcherAnalyzer(IndexId.get("dewiki")));
		testAnalyzer(Analyzers.getSearcherAnalyzer(IndexId.get("frwiki")));
		testAnalyzer(Analyzers.getSearcherAnalyzer(IndexId.get("srwiki")));
		testAnalyzer(Analyzers.getSearcherAnalyzer(IndexId.get("eswiki")));


	}

	private static void printCodePoints(String string) {
		char[] str = string.toCharArray();
		for(int i=0;i<str.length;i++){
			System.out.println(str[i]+"\t"+Integer.toHexString(Character.codePointAt(str,i)));
		}
	}

	public static void serializeTest(Analyzer analyzer) throws IOException{
		ArticlesParser ap = new ArticlesParser("./test-data/indexing-articles.test");
		ArrayList<TestArticle> articles = ap.getArticles();
		long start = System.currentTimeMillis();
		int total = 1000;
		double count=0;
		int size =0, size2 = 0;
		for(int i = 0 ; i<total; i++ ){
			for(TestArticle article : articles){
				count++;
				byte[] b = ExtToken.serialize(analyzer.tokenStream("",article.content));
				if(i == 0)
					size += b.length;
				else
					size2 += b.length;
				tokensFromAnalysis(analyzer, article.content,"contents");
			}
		}
		long delta = System.currentTimeMillis() - start;
		System.out.println(delta+"ms ["+delta/count+"ms/ar] elapsed for analyzer "+analyzer+", size="+size+", size2="+size2);
	}

	public static void testAnalyzer(Analyzer analyzer) throws IOException{
		ArticlesParser ap = new ArticlesParser("./test-data/indexing-articles.test");
		ArrayList<TestArticle> articles = ap.getArticles();
		long start = System.currentTimeMillis();
		int total = 5000;
		double count=0;
		for(int i = 0 ; i<total; i++ ){
			for(TestArticle article : articles){
				count++;
				tokensFromAnalysis(analyzer, article.content,"contents");
			}
		}
		long delta = System.currentTimeMillis() - start;
		System.out.println(delta+"ms ["+delta/count+"ms/ar] elapsed for analyzer "+analyzer);
	}

	public static void testAnalyzer(Analyzer analyzer, String name) throws IOException{
		ArticlesParser ap = new ArticlesParser("./test-data/indexing-articles.test");
		ArrayList<TestArticle> articles = ap.getArticles();
		TestArticle article = null;
		for(TestArticle a : articles){
			if(a.title.equals(name)){
				article = a;
				break;
			}
		}
		long start = System.currentTimeMillis();
		int total = 5000;
		double count=0;
		int size =0;
		for(int i = 0 ; i<total; i++ ){
			count++;
			size += tokensFromAnalysis(analyzer, article.content,"contents").length;
		}
		long delta = System.currentTimeMillis() - start;
		System.out.println(delta+"ms ["+delta/count+"ms/ar] elapsed for analyzer "+analyzer+", size="+size/count);
	}
}
