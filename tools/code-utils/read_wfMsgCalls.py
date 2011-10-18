# -*- coding: utf-8 -*-

#
# Two small tools to analyse the keys of the i18n messages of MediaWiki
# 1/ Get the current keys (and corresponding language and message) from their definition
# 2/ Get the calls of the wfMsg functions (and corresponding file, line, type (wfMsg, wfMsgForContent, etc.), message key (when possible))
# 
# 
# Some details:
# * this program calls a PHP interpreter, so you need it
# * the occurences of wfMsg functions in block comments are removed (about 30 occurences), I didn’t check for single-line comments
# * I assumed the key of the messages are '([a-zA-Z0-9_-]+?)', it seems quite correct after tests (anyway no wfMsg call is forgotten, even if the key is not recognized)
# * hence the key with a variable are never computed since you must have a deeper program analysis, the cases are wfMsg( $wgLogNames[$type] ) or (easier?) wfMessage( 'block-log-flags-' . $flag )
# * some calls are missed when called by call_user_func_array, but in these case you probably have no chance to get the associated message key because it is probably a variable)
# * the results are CSV
# * the format of the messageStrings file is: 1/ language code (from the name of the file when available); 2/ message key; 3/ content of the message
# * the format of the wfMsgCalls file is: 1/ path of the file; 2/ line number; 3/ wfMsg type (wfMsg, wfMessage, etc.); 4/ message key (when possible); 5/ complete call of the function
#


# # # # # # # #
# Parameters  #
# # # # # # # #

# BASE PARAMETERS

# Folder containing a tree of MediaWiki
baseFolder = "mediawiki/repo/phase3"

# Name of the CSV result file (in the current folder) containing the calls to the functions wfMsg* (specified thereafter in a parameter) obtained by analysing the code
wfMsgCallsResultFile = "wfMsgCalls.csv"

# Name of the CSV result file (in the current folder) containing the associations lang-msgkey-message by retrieving the content of the PHP $messages variable in the 'languages' and i18n folders
messageStringsResultFile = "messageStrings.csv"

# Save also the content of the messages (count 10Mio without and 30Mio with)
lightMessageStrings = False

# Name of the wfMsg functions to search in the code
messageFunctions = [ "wfMsg", "wfMessage", "wfMessageFallback", "wfMsgExt", "wfMsgForContent", "wfMsgNoTrans", "wfMsgForContentNoTrans", "wfMsgReal", "wfMsgHtml", "wfMsgWikiHtml", "wfEmptyMsg", "wfMsgReplaceArgs", "wfMsgGetKey" ]


# MESSAGES FOLDERS AND FILES

# Folders (let the # to include messagesIndividualFiles)
messagesFolders = { 'phase3': [ 'languages/messages' ], 'extensions': [  ], '#':'#' }

# Exclude these files
messagesExcludeFiles = []

# Include these files (must not be in the previous folders else it would be duplicated)
messagesIndividualFiles = []


# CODE FOLDERS AND FILES

# Folders (let the # to include codeIndividualFiles)
codeFolders = [ "includes", "extensions", "skins", "languages/classes", "#" ]

# Exclude these files
codeExcludeFiles = []

# Include these files (must not be in the previous folders else it would be duplicated)
codeIndividualFiles = [ "languages/Language.php", "languages/LanguageConverter.php", "languages/Names.php", "resources/Resources.php" ]




# # # # # # # # # # # #
# Read the i18n files #
# # # # # # # # # # # #

import os, os.path, re, csv, subprocess


currentFolder = os.getcwd()
os.chdir( baseFolder )

i18nMessages = []

# Iterate over folders and files
for messagesFolderType in messagesFolders:
	
	directories = []
	if messagesFolderType == 'extensions':
		for directory in messagesFolders[messagesFolderType]:
			l = os.walk( directory )
			for j in l:
				if '.svn' in j[0]:
					continue
				directories.append( j[0] )
		messagesFolders[messagesFolderType] = directories
	
	for messagesFolder in messagesFolders[messagesFolderType]:
		
		if messagesFolderType != '#':
			files = os.listdir( messagesFolder )
		else:
			files = messagesIndividualFiles
			messageFolder = ''
		
		for filename in files:
			
			if filename[-4:] != '.php':
				continue
			
			if messagesFolderType == 'extensions' and filename[-9:] != '.i18n.php':
				continue
			
			if filename in messagesExcludeFiles:
				continue
			
			if messagesFolderType == 'phase3' and filename[:8] == 'Messages':
				lang = filename[8:-4]
			
			# Read the PHP $messages variable
			p = subprocess.Popen( 'php', shell=True, stdin=subprocess.PIPE, stdout=subprocess.PIPE, close_fds=True )
			print >>p.stdin, '<?php'
			print >>p.stdin, "require( '"+os.path.join( 'includes', 'Defines.php' )+"' );"
			print >>p.stdin, "require( '"+os.path.join( messagesFolder, filename )+"' );"
			print >>p.stdin, """
				if( isset( $messages ) && is_array( $messages ) && count( $messages ) > 0 ) {
					if( is_array( current( $messages ) ) ) {
						foreach( $messages as $lang => $msgs )
							foreach( $msgs as $key => $msg )
								echo $lang.'|'.$key.' '.str_replace( array("\r\n", "\n", "\r"), "5197361546748612348916973", $msg )."\n";
					}
					else {
						foreach( $messages as $key => $msg )
							echo $key.' '.str_replace( array("\r\n", "\n", "\r"), "5197361546748612348916973", $msg )."\n";
						}
				}
			"""
			p.stdin.close()
			
			messages = str.splitlines( p.stdout.read() )
			
			if len(messages) == 0:
				if messagesFolderType == 'phase3' and filename[:8] == 'Messages':
					print 'Core language '+lang+' doesn’t have a $message variable in '+filename+' or is empty.'
				else:
					print 'File '+filename+' doesn’t have a $message variable or is empty.'
				continue
			
			# Retrieve the result and put it in a list of list
			for message in messages:
				
				msg = message.split( ' ', 1 )
				i18nMessage = []
				if '|' in msg[0]:
					sp = msg[0].split( '|' )
					i18nMessage.append( sp[0] )
					i18nMessage.append( sp[1] )
				else:
					i18nMessage.append( lang.lower() )
					i18nMessage.append( msg[0] )
				if not lightMessageStrings:
					i18nMessage.append( msg[1].replace( '5197361546748612348916973', '\n' ) )
				i18nMessages.append( i18nMessage )

os.chdir( currentFolder )
writer = csv.writer( open( messageStringsResultFile, 'w' ) )
writer.writerows( i18nMessages )


# # # # # # # # # # # #
# Read the code files #
# # # # # # # # # # # #

os.chdir( baseFolder )

wfMsgCalls = []

msgFunctions = "(" + '|'.join( messageFunctions ) + ")( *\(.*?\))"
msgFunctionsSoft = "(" + '|'.join( messageFunctions ) + ")"
msgFunctionsMaxLength = max( [ len(f) for f in messageFunctions ] )

# Iterate over folders and files
for folder in codeFolders:
	
	if folder != '#':
		directories = os.walk( folder )
	else:
		directories = [ '.' ]
	
	for directory in directories:
		
		if folder != '#':
			if '.svn' in directory[0]:
				continue
			fileset = directory[2]
			direct = directory[0]
		else:
			fileset = codeIndividualFiles
			direct = ''
		
		for filename in fileset:
			
			if filename[-4:] != ".php":
				continue
			
			if filename in codeExcludeFiles:
				continue
			
			fyle = open( os.path.join( direct, filename ), 'r' )
			
			content = fyle.read()
			
			# Remove the false positive in block comments (some could remain if in single-line comments)
			incomment = False
			for c in range(len(content)-1):
				if c == len(content):
					break
				if content[c] == '/' and content[c+1] == '*':
					incomment = True
				if content[c] == '*' and content[c+1] == '/':
					incomment = False
				if content[c] == 'w' and incomment:
					f = re.search( '^'+msgFunctionsSoft, content[c:c+msgFunctionsMaxLength] )
					if f != None:
						content = content[:c] + content[c+f.end():]
			
			# Get the indexes of the beginning of lines (to compute after the line number)
			indexOfBeginningOfLines = [0]
			for m in re.finditer( '(?:\n|\r|\n\r|\r\n)', content ):
				indexOfBeginningOfLines.append( m.end() )
				
			if indexOfBeginningOfLines[-1] != len(content):
				indexOfBeginningOfLines.append( len(content) )
			
			# Iterate to find the wfMsg functions
			for m in re.finditer( msgFunctions, content, re.S ):
				
				i = -1
				while m.start()-indexOfBeginningOfLines[i] < 0:
					i = i - 1
				
				# Search the key once we recognized the message
				key = ''
				k = re.search( "^\(\s*'([a-zA-Z0-9_-]+?)'\s*(?:,|\))", m.group(2) )
				if k != None:
					key = k.group(1)
				else:
					k = re.search( '^\(\s*"([a-zA-Z0-9_-]+?)"\s*(?:,|\))', m.group(2) )
					if k != None:
						key = k.group(1)
				
				wfMsgCall = [ os.path.join( directory[0], filename ), len(indexOfBeginningOfLines)+i+1, m.group(1), key, m.group(0) ]
				
				# You must have the same number of opening and closing parenthesis
				if m.group(0).count( '(' ) > 1:
					
					recursion = 0
					pos = m.end()
					
					while wfMsgCall[4].count( '(' ) != wfMsgCall[4].count( ')' ):
						
						endparenthesis = ''
						for nbparenthesis in range( wfMsgCall[4].count( '(' ) - wfMsgCall[4].count( ')' ) ):
							endparenthesis = endparenthesis + '.*?\)'
						res = re.search( endparenthesis, content[pos:], re.S )
						
						pos = pos + res.end()
						
						if res != None:
							wfMsgCall[4] = wfMsgCall[4] + res.group(0)
						else:
							raise Exception( 'parenthesis expected' )
						recursion = recursion + 1
						
						if recursion == 10:
							raise Exception( 'recursion' )
				
				wfMsgCalls.append( wfMsgCall )

os.chdir( currentFolder )
writer = csv.writer( open( wfMsgCallsResultFile, 'w' ) )
writer.writerows( wfMsgCalls )

