/*
 * Copyright 2004 Kate Turner
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy 
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights 
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell 
 * copies of the Software, and to permit persons to whom the Software is 
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in 
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * 
 * $Id$
 */
package org.wikimedia.lsearch;

import java.io.IOException;
import java.net.ServerSocket;
import java.util.ArrayList;
import java.util.List;

/**
 * @author Kate Turner
 *
 */
public class MWDaemon {
	/** Logger */
	static java.util.logging.Logger log = java.util.logging.Logger.getLogger("MWDaemon");
	
	static int port = 8123;
	static ServerSocket sock;
	public static String indexPath;
	public static String dburl, dbhost;
	public static String[] dbnames;
	public static final int
	 MW_NEW = 1
	,MW_OLD = 2;
	public static int mw_version = MW_NEW;
	private static Configuration config;
	public static int numthreads;
	
	public static void main(String[] args) {
		System.out.println(
				"MediaWiki Lucene search indexer - runtime search daemon.\n" +
				"Version 20050408, copyright 2004 Kate Turner.\n"
				);
		int i = 0;
		while (i < args.length - 1) {
			if (args[i].equals("-port")) {
				port = Integer.valueOf(args[++i]).intValue();
			} else if (args[i].equals("-configfile")) {
				Configuration.setConfigFile(args[++i]);
			} else if (args[i].equals("-mwversion")) {
				String vers = args[++i];
				if (vers.equals("old")) {
					mw_version = MW_OLD;
				} else if (vers.equals("new")) {
					mw_version = MW_NEW;
				} else {
					log.severe("Unknown MediaWiki version " + vers);
					return;
				}
			} else break;
			++i;
		}
		config = Configuration.open();
		
		dbhost = config.getString("mwsearch.database.host");
		dbnames = config.getString("mwsearch.databases").split(" ");
		log.fine("Using database on " + dbhost);
		
		indexPath = config.getString("mwsearch.indexpath");
		log.info("Binding server to port " + port);
		
		try {
			sock = new ServerSocket(port);
		} catch (IOException e) {
			log.severe("Error: bind error: " + e.getMessage());
			return;
		}
		numthreads = 0;
		//List<SearchClientReader> threads = new ArrayList<SearchClientReader>();
		List threads = new ArrayList();
		for (int j = 0; j < 50; ++j) {
			++numthreads;
			SearchClientReader c = new SearchClientReader(j);
			c.start();
			threads.add(c);
		}

	}
}
