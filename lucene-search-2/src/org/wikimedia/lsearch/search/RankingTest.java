package org.wikimedia.lsearch.search;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLDecoder;
import java.util.ArrayList;

import org.wikimedia.lsearch.beans.ResultSet;

/** 
 * Test cases for search result ranking. 
 * 
 * @author rainman
 *
 */
public class RankingTest {
	static String db = "enwiki";
	static String host = "localhost";
	static int port = 8123;
	
	public static ArrayList<ResultSet> getResults(String query) throws IOException{
		query = query.replace(" ","%20"); 
		String urlString = "http://"+host+":"+port+"/search/"+db+"/"+query+"?case=ignore&limit=20&namespaces=0&offset=0";
		URL url = new URL(urlString);
		BufferedReader br = new BufferedReader(new InputStreamReader(url.openStream()));
		String line;
		int lineNum = 0;
		ArrayList<ResultSet> results = new ArrayList<ResultSet>();
		boolean seenResults = false;
		while ( (line = br.readLine()) != null ) {
			if(lineNum > 1){
				if(line.startsWith("#results")){
					seenResults = true;
					continue;
				}
				if(!seenResults || line.startsWith("#"))
					continue;
				String[] parts = line.split(" ",3);
				String title = URLDecoder.decode(parts[2],"utf-8").replace("_"," ");
				results.add(new ResultSet(Double.parseDouble(parts[0]),parts[1],title));
			}
			lineNum ++ ;
		}
		br.close();
		return results;
	}

	public static void printResults(ArrayList<ResultSet> res, int pointer){
		String gap;
		for(int i=0;i<10 && i<res.size();i++){
			if(i == pointer)
				gap = " -> ";
			else
				gap = "    ";
			System.out.println(gap+res.get(i));
		}
	}
	
	public static void assertHit(int index, String key, ArrayList<ResultSet> res, String query){
		String info = "hit=["+index+"] key=["+key+"] on ["+query+"]";
		if(res.size() > index){
			if(key.equals(res.get(index).getKey())){
				System.out.println("PASSED "+info);
				printResults(res,index);
				return;
			} else{
				System.out.println("FAILED "+info+" : ");
				printResults(res,index);
			}
		} else{
			System.out.println("FAILED "+info+" : NO RESULT");
			printResults(res,index);
		}		
	}
	
	public static void assertHits(String query, String[] hits) throws IOException {
		ArrayList<ResultSet> res = getResults(query);
		for(int i=0;i<hits.length;i++){
			assertHit(i,hits[i],res,query);
		}
	}
	
	public static void main(String[] args) throws IOException{
		
		assertHits("douglas adams",new String[] {
				"0:Douglas Adams",
				"0:The Hitchhiker's Guide to the Galaxy",
		});
		
		assertHits("douglas adams book",new String[] {
				"0:The Hitchhiker's Guide to the Galaxy",
		});
		
		assertHits("call me ishmael",new String[]{
				"0:Moby-Dick"
		});
		
		assertHits("moon radius",new String[]{
				"0:Moon"
		});
		
		assertHits("radius of the moon",new String[]{
				"0:Moon"
		});
		
		assertHits("http",new String[]{
				"0:Hypertext Transfer Protocol"
		});
		
		assertHits("argentina climate",new String[]{
				"0:Geography of Argentina"
		});
		
		assertHits("good thomas",new String[]{
				"0:Prime-factor FFT algorithm"
		});
		
		assertHits("3.14",new String[]{
				"0:Pi"
		});
		
		assertHits("middle east conflict",new String[]{
				"0:List of conflicts in the Middle East"
		});
		
		assertHits("houston we have a problem",new String[]{
				"0:Apollo 13 (film)"
		});
		
		assertHits("balkan music",new String[]{
				"0:Music of Southeastern Europe"
		});
		
		assertHits("music of balkan",new String[]{
				"0:Music of Southeastern Europe"
		});
		
		assertHits("balkan brass",new String[]{
				"0:Balkan Brass Band"
		});
		
		assertHits("clinton scandal",new String[]{
				"0:Lewinsky scandal"
		});
		
		assertHits("french revolution", new String[]{
				"0:French Revolution"
		});		
		
		assertHits("singapore fruit", new String[]{
				"0:Durian"
		});
		
		assertHits("List of female porn stars", new String[]{
				"0:List of female porn stars"
		});
		
		assertHits("last name mac", new String[]{
				"0:Family name"
		});
		
		assertHits("frames linguistics", new String[]{
				"0:Frame semantics (linguistics)"
		});
		
		assertHits("french revolution timeline", new String[]{
				"0:Timeline of the French Revolution"
		});
		
		assertHits("braga portugal", new String[]{
				"0:Braga"
		});
		
		assertHits("why is moon in zenith smaller that on horizon", new String[]{
				"0:Moon illusion"
		});
		
		assertHits("who is president of u.s.", new String[]{
				"0:President of the United States"
		});
		
		assertHits("los angles", new String[]{
				"0:Los Angeles, California"
		});
		
		assertHits("france", new String[]{
				"0:France"
		});
		
		assertHits("people", new String[]{
				"0:People"
		});
	
		assertHits("list of countries in Africa by population", new String[]{
				"0:List of African countries by population"	
		});
		
		assertHits("tanzania somalia", new String[]{
				"0:Kenya"	
		});
		
		assertHits("bethlehem jesus", new String[]{
				"0:Bethlehem"	
		});
		
		assertHits("san francisco ferry building", new String[]{
				"0:Ferry Building"	
		});
		
		assertHits("*stan", new String[]{
				"0:Kazakhstan"	
		});

		
	}
	
}
