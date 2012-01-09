#!/bin/bash
#
# Copyright (c) 2009 - 2011, RealDolmen
# All rights reserved.

# Assume php.exe is executable
PHP_BIN="php"
CMD_ROOT=$(cd $(dirname "$0"); pwd)
CMD_NAME="Certificate" # $(basename $0 .sh)
SCRIPT_ROOT=$(cd "${CMD_ROOT}/../library/Microsoft/WindowsAzure/CommandLine/"; pwd)
SCRIPT="${SCRIPT_ROOT}/${CMD_NAME}.php"

"$PHP_BIN" -d safe_mode=Off -f $SCRIPT -- "$@"

