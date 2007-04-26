/*
 * Copyright 2005 Brion Vibber
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
 * $Id: NamespaceFilter.java 8398 2005-04-17 06:21:19Z vibber $
 */

package org.wikimedia.lsearch.search;

import java.io.Serializable;
import java.util.BitSet;
import java.util.Collection;

/** A bean-like class that contains information about what namespaces
 *  to filter  */
public class NamespaceFilter implements Serializable {
	private BitSet included;
	private boolean empty;
	
	protected void init(){
		empty = true;
		included = new BitSet(64);
	}
	
	public NamespaceFilter() {
		init();
	}
	
	public NamespaceFilter(Collection<Integer> namespaces){
		init();
		for(Integer namespace : namespaces){
			included.set(namespace.intValue());
		}
	}
	
	public NamespaceFilter(String namespaces) {
		init();
		if (namespaces != null) {
			String[] bits = namespaces.split(",");
			for (int i = 0; i < bits.length; i++) {
				empty = false;
				included.set(Integer.parseInt(bits[i]));
			}
		}
	}
	
	public boolean filter(String namespace) {
		return filter(Integer.parseInt(namespace));
	}
	
	public boolean filter(int namespace) {
		if (empty)
			return true;
		
		return included.get(namespace);
	}
	
	public boolean contains(int namespace){
		return included.get(namespace);
	}
	
	public int cardinality(){
		return included.cardinality();
	}
	
	public int getNamespace(){
		for(int i=0;i<included.size();i++){
			if(included.get(i))
				return i;
		}
		return Integer.MIN_VALUE;
	}
	
	@Override
	public String toString() {
		return included.toString();
	}

	@Override
	public int hashCode() {
		final int PRIME = 31;
		int result = 1;
		result = PRIME * result + (empty ? 1231 : 1237);
		result = PRIME * result + ((included == null) ? 0 : included.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (getClass() != obj.getClass())
			return false;
		final NamespaceFilter other = (NamespaceFilter) obj;
		if (empty != other.empty)
			return false;
		if (included == null) {
			if (other.included != null)
				return false;
		} else if (!included.equals(other.included))
			return false;
		return true;
	}
	
}
