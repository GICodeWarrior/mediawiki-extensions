@ECHO off
REM Copyright (c) 2009 - 2011, RealDolmen
REM All rights reserved.

REM Assume php.exe is executable
SET PHP_BIN=php.exe
SET SCRIPT=%~dp0\..\library\Microsoft\SqlAzure\CommandLine\%~n0.php
"%PHP_BIN%" -d safe_mode=Off -f "%SCRIPT%" -- %*