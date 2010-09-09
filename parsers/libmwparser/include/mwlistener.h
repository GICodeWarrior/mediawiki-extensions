/*
 * Copyright 2010  Andreas Jonsson
 *
 * This file is part of libmwparser.
 *
 * Libmwparser is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

#ifndef MWLISTENER_H_
#define MWLISTENER_H_


/**
 * This interface should be implemented by the client application.
 *
 * A note on memory management:  All parameters of type pANTLR3_STRING
 * or pANTLR3_VECTOR have been allocated by the antlr runtime via
 * factory objects and will be reclaimed when the parser is reset or
 * free:d.
 */
typedef struct MWLISTENER_struct
{
    /**
     *  Pointer that may be used for storing data that is used by the
     *  implementing class.  
     */
    void *data;

    void * (*newData)(void);
    void   (*freeData)(void *);
    void   (*resetData)(void *);
    void * (*getResult)(struct MWLISTENER_struct * listener);


    void (*onWord)(struct MWLISTENER_struct * listener, pANTLR3_STRING word);
    void (*onSpecial)(struct MWLISTENER_struct * listener, pANTLR3_STRING special);
    void (*onSpace)(struct MWLISTENER_struct * listener, pANTLR3_STRING space);
    /**
     * Called when parsing <nowiki>-tags.
     * @param listener
     * @param nowiki The text in the body of the nowiki.  Note that it is the
     *               responsibility of the listener to escape the contents.
     */
    void (*onNowiki)(struct MWLISTENER_struct * listener, pANTLR3_STRING nowiki);
    void (*onNewline)(struct MWLISTENER_struct * listener);
    void (*onBr)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*onHTMLEntity)(struct MWLISTENER_struct * listener, pANTLR3_STRING entity);
    void (*onHorizontalRule)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*beginArticle)(struct MWLISTENER_struct * listener);
    void (*endArticle)(struct MWLISTENER_struct * listener);
    void (*beginParagraph)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endParagraph)(struct MWLISTENER_struct * listener);
    void (*beginItalic)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endItalic)(struct MWLISTENER_struct * listener);
    void (*beginBold)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endBold)(struct MWLISTENER_struct * listener);
    void (*beginPre)(struct MWLISTENER_struct * listener);
    void (*endPre)(struct MWLISTENER_struct * listener);
    void (*beginBulletList)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endBulletList)(struct MWLISTENER_struct * listener);
    void (*beginEnumerationList)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endEnumerationList)(struct MWLISTENER_struct * listener);
    void (*beginDefinitionList)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endDefinitionList)(struct MWLISTENER_struct * listener);
    void (*beginBulletListItem)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endBulletListItem)(struct MWLISTENER_struct * listener);
    void (*beginEnumerationItem)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endEnumerationItem)(struct MWLISTENER_struct * listener);
    void (*beginDefinedTermItem)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endDefinedTermItem)(struct MWLISTENER_struct * listener);
    void (*beginDefinitionItem)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endDefinitionItem)(struct MWLISTENER_struct * listener);
    void (*beginTable)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attributes);
    void (*endTable)(struct MWLISTENER_struct * listener);
    void (*beginTableRow)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attributes);
    void (*endTableRow)(struct MWLISTENER_struct * listener);
    void (*beginTableCell)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attributes);
    void (*beginTableHeading)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attributes);
    void (*endTableHeading)(struct MWLISTENER_struct * listener);
    void (*beginTableCaption)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attributes);
    void (*endTableCaption)(struct MWLISTENER_struct * listener);
    void (*endTableCell)(struct MWLISTENER_struct * listener);
    void (*beginTableBody)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attributes);
    void (*endTableBody)(struct MWLISTENER_struct * listener);
    void (*beginHeading)(struct MWLISTENER_struct * listener, int level, pANTLR3_STRING anchor, pANTLR3_VECTOR attributes);
    void (*endHeading)(struct MWLISTENER_struct * listener);
    void (*beginInternalLink)(struct MWLISTENER_struct * listener, pANTLR3_STRING linkTitle);
    void (*endInternalLink)(struct MWLISTENER_struct * listener);
    void (*onInternalLink)(struct MWLISTENER_struct * listener, pANTLR3_STRING linkUrl);
    void (*beginExternalLink)(struct MWLISTENER_struct * listener, pANTLR3_STRING linkUrl);
    void (*endExternalLink)(struct MWLISTENER_struct * listener);
    void (*onExternalLink)(struct MWLISTENER_struct * listener, pANTLR3_STRING linkUrl);
    void (*beginMediaLink)(struct MWLISTENER_struct * listener, pANTLR3_STRING linkUrl, pANTLR3_VECTOR attr);
    void (*endMediaLink)(struct MWLISTENER_struct * listener);
    void (*onMediaLink)(struct MWLISTENER_struct * listener, pANTLR3_STRING linkUrl, pANTLR3_VECTOR attr);
    void (*onTagExtension)(struct MWLISTENER_struct * listener, const char * name, pANTLR3_STRING body, pANTLR3_VECTOR attr);
    void (*beginTableOfContents)(struct MWLISTENER_struct * listener);
    void (*endTableOfContents)(struct MWLISTENER_struct * listener);
    void (*beginTableOfContentsItem)(struct MWLISTENER_struct * listener, int level, pANTLR3_STRING anchor);
    void (*endTableOfContentsItem)(struct MWLISTENER_struct * listener);
    void (*beginHtmlDiv)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlDiv)(struct MWLISTENER_struct * listener);
    void (*beginHtmlBlockquote)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlBlockquote)(struct MWLISTENER_struct * listener);
    void (*beginHtmlCenter)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlCenter)(struct MWLISTENER_struct * listener);
    void (*beginHtmlDel)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlDel)(struct MWLISTENER_struct * listener);
    void (*beginHtmlU)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlU)(struct MWLISTENER_struct * listener);
    void (*beginHtmlIns)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlIns)(struct MWLISTENER_struct * listener);
    void (*beginHtmlFont)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlFont)(struct MWLISTENER_struct * listener);
    void (*beginHtmlBig)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlBig)(struct MWLISTENER_struct * listener);
    void (*beginHtmlSmall)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlSmall)(struct MWLISTENER_struct * listener);
    void (*beginHtmlSub)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlSub)(struct MWLISTENER_struct * listener);
    void (*beginHtmlSup)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlSup)(struct MWLISTENER_struct * listener);
    void (*beginHtmlCite)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlCite)(struct MWLISTENER_struct * listener);
    void (*beginHtmlCode)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlCode)(struct MWLISTENER_struct * listener);
    void (*beginHtmlStrike)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlStrike)(struct MWLISTENER_struct * listener);
    void (*beginHtmlStrong)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlStrong)(struct MWLISTENER_struct * listener);
    void (*beginHtmlSpan)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlSpan)(struct MWLISTENER_struct * listener);
    void (*beginHtmlTt)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlTt)(struct MWLISTENER_struct * listener);
    void (*beginHtmlVar)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlVar)(struct MWLISTENER_struct * listener);
    void (*beginHtmlAbbr)(struct MWLISTENER_struct * listener, pANTLR3_VECTOR attr);
    void (*endHtmlAbbr)(struct MWLISTENER_struct * listener);
    void (*onHtmlPre)(struct MWLISTENER_struct * listener, pANTLR3_STRING nowiki, pANTLR3_VECTOR attr);
}
    MWLISTENER;

#endif

