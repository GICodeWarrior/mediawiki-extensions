#ifndef MWLEXERCONTEXT_H_
#define MWLEXERCONTEXT_H_

#include <stdbool.h>
#include <glib.h>
#include <antlr3defs.h>
#include <iconv.h>
#include <mwtagext.h>
#include <mwlinkcollection.h>

typedef struct MWLEXERCONTEXT_BACKUP_struct {
#include "mwlexerpredicatedefs.inc"
    pANTLR3_VECTOR blockContextStack;
    
}
    MWLEXERCONTEXT_BACKUP;

typedef struct MWLEXERSPECULATION_struct {
    bool active;
    MWLEXERCONTEXT_BACKUP contextBackup;
    MWLINKCOLLECTION_MARK lcMark;
    ANTLR3_MARKER istreamMark;
    ANTLR3_MARKER failurePoint;
    ANTLR3_TOKEN_STREAM_MARKER tstreamMark;
    int istreamIndex;
}
    MWLEXERSPECULATION;

typedef struct MWLEXERCONTEXT_struct
{
    pANTLR3_LEXER lexer;
    /*
     * Lexer predicates.
     */

#include "mwlexerpredicatedefs.inc"

    /*
     * Lexer state.
     */
    pANTLR3_STACK blockContextStack;
    int headingLevel;
    ANTLR3_MARKER headingTextBegin;
    pANTLR3_COMMON_TOKEN headingBeginToken;
    
    GRegex * legalTitleRegexp;
    GRegex * mediaLinkTitle;
    //    regex_t legalTitleRegexp;
    //    regex_t mediaLinkTitle;

    /*
     * State for speculative execution.
     */
    MWLEXERSPECULATION indentSpeculation;
    MWLEXERSPECULATION headingSpeculation;
    MWLEXERSPECULATION internalLinkSpeculation;
    MWLEXERSPECULATION externalLinkSpeculation;
    MWLEXERSPECULATION mediaLinkSpeculation[2];
    int istreamIndex;

    /*
     * Character conversion.
     */

    iconv_t conversionState;

    /** Method for deallocating this instance. */
    void (*free)(void * context);
    /** Reset instance */
    bool (*reset)(struct MWLEXERCONTEXT_struct * context);

    /*
     * Tag extension support.
     */
    pANTLR3_HASH_TABLE tagExtensionTable;

    bool              (*registerTagExtension)(struct MWLEXERCONTEXT_struct * context, const MWPARSER_TAGEXT *tagExt);
    MWPARSER_TAGEXT * (*getTagExtension)(struct MWLEXERCONTEXT_struct * context, pANTLR3_STRING name);

    /*
     * Utility.
     */
    pANTLR3_VECTOR_FACTORY vectorFactory;
    pANTLR3_STRING_FACTORY stringFactory;
    pANTLR3_STRING_FACTORY asciiStringFactory;
    MWLINKCOLLECTION *linkCollection;
    bool (*isLegalTitle)(struct MWLEXERCONTEXT_struct * context, pANTLR3_STRING text);
    bool (*isMediaLinkTitle)(struct MWLEXERCONTEXT_struct * context, pANTLR3_STRING text);
    bool (*setLegalTitleRegexp)(struct MWLEXERCONTEXT_struct *context, const char *perlRegexp);
    bool (*setMediaLinkTitleRegexp)(struct MWLEXERCONTEXT_struct *context, const char *perlRegexp);
}
    MWLEXERCONTEXT;

MWLEXERCONTEXT *MWLexerContextNew(pANTLR3_LEXER);

#endif
