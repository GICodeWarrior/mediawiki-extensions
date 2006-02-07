/*
 * MediaWiki import/export processing tools
 * Copyright 2005 by Brion Vibber
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

// Doesn't actually work yet...

package org.mediawiki.importer;

import java.io.IOException;

public class SqlWriter15 extends SqlWriter {
	private Page currentPage;
	private Revision lastRevision;
	
	public SqlWriter15(SqlStream output) {
		super(output);
	}
	
	public SqlWriter15(SqlStream output, String prefix) {
		super(output, prefix);
	}
	
	public void writeEndWiki() throws IOException {
		flushInsertBuffers();
		super.writeEndWiki();
	}
	
	public void writeStartPage(Page page) {
		currentPage = page;
		lastRevision = null;
	}
	
	public void writeEndPage() throws IOException {
		if (lastRevision != null) {
			updatePage(currentPage, lastRevision);
		}
		currentPage = null;
		lastRevision = null;
	}
	
	public void writeRevision(Revision revision) throws IOException {
		bufferInsertRow("text", new Object[][] {
				{"old_id", new Integer(revision.Id)},
				{"old_text", revision.Text},
				{"old_flags", "utf-8"}});

		bufferInsertRow("revision", new Object[][] {
				{"rev_id", new Integer(revision.Id)},
				{"rev_page", new Integer(currentPage.Id)},
				{"rev_text_id", new Integer(revision.Id)},
				{"rev_comment", revision.Comment},
				{"rev_user", new Integer(revision.Contributor.Id)},
				{"rev_user_text", revision.Contributor.Username},
				{"rev_timestamp", timestampFormat(revision.Timestamp)},
				{"rev_minor_edit", revision.Minor ? ONE : ZERO},
				{"rev_deleted", ZERO}});
		
		lastRevision = revision;
	}
	
	private static int lengthUtf8(String s) {
		final int slen = s.length();
		final char[] buf = Buffer.get(slen);
		s.getChars(0, slen, buf, 0);
		int len = 0;
		for (int i = 0; i < slen; i++) {
			char c = buf[i];
			if (c < 0x80)
				len++;
			else if (c < 0x800)
				len+=2;
			else if (c < 0xD800 || c >= 0xE000)
				len+=3;
			else {
				// Surrogate pairs are assumed to be valid.
				len+=4;
				i++;
			}
		}
		return len;
	}
	
	private void updatePage(Page page, Revision revision) throws IOException {
		bufferInsertRow("page", new Object[][] {
				{"page_id", new Integer(page.Id)},
				{"page_namespace", page.Title.Namespace},
				{"page_title", titleFormat(page.Title.Text)},
				{"page_restrictions", page.Restrictions},
				{"page_counter", ZERO},
				{"page_is_redirect", revision.isRedirect() ? ONE : ZERO},
				{"page_is_new", ZERO},
				{"page_random", RANDOM},
				{"page_touched", TOUCHED},
				{"page_latest", new Integer(revision.Id)},
				{"page_len", new Integer(lengthUtf8(revision.Text))}});
		checkpoint();
	}

}
