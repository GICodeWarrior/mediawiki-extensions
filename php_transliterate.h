/*
  +----------------------------------------------------------------------+
  | PHP Version 5                                                        |
  +----------------------------------------------------------------------+
  | Copyright (c) 1997-2007 The PHP Group                                |
  +----------------------------------------------------------------------+
  | This source file is subject to version 3.01 of the PHP license,      |
  | that is bundled with this package in the file LICENSE, and is        |
  | available through the world-wide-web at the following url:           |
  | http://www.php.net/license/3_01.txt                                  |
  | If you did not receive a copy of the PHP license and are unable to   |
  | obtain it through the world-wide-web, please send a note to          |
  | license@php.net so we can mail you a copy immediately.               |
  +----------------------------------------------------------------------+
  | Author:                                                              |
  +----------------------------------------------------------------------+
*/

/* $Id: header,v 1.16.2.1.2.1 2007/01/01 19:32:09 iliaa Exp $ */

#ifndef PHP_TRANSLITERATE_H
#define PHP_TRANSLITERATE_H

extern zend_module_entry transliterate_module_entry;
#define phpext_transliterate_ptr &transliterate_module_entry

#ifdef PHP_WIN32
#define PHP_TRANSLITERATE_API __declspec(dllexport)
#else
#define PHP_TRANSLITERATE_API
#endif

#ifdef ZTS
#include "TSRM.h"
#endif

PHP_MINIT_FUNCTION(transliterate);
PHP_MSHUTDOWN_FUNCTION(transliterate);
PHP_MINFO_FUNCTION(transliterate);

PHP_FUNCTION(transliterate_with_id);

#endif	/* PHP_TRANSLITERATE_H */


/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: noet sw=4 ts=4 fdm=marker
 * vim<600: noet sw=4 ts=4
 */
