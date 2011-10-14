VER=2.2.2
SUBDIR=openid-php-openid-782224d
SHELL = /bin/sh

# how to make that one predictable easily?

# http://www.mediawiki.org/wiki/Extension:OpenID
#
# This makefile automates the installation of a prerequisite for the MediaWiki OpenID extension.
#
# MediaWiki OpenID extensions depends on the 
# OpenIDEnabled.com PHP library for OpenID which in turn depends on the 
# OpenIDEnabled.com PHP library for YADIS.
#
# STEP 1: 
# Get the extension by method (a) or (b) or (c).
#
# (a) First download the MediaWiki OpenID extension which includes this makefile from
#    http://www.mediawiki.org/wiki/Special:ExtensionDistributor/OpenID
#
# or by checking out from SVN as explained in (b) or (c)
#
# (b) anonymous users checkout using this command:
#    cd $IP/extensions
#    svn checkout svn://svn.wikimedia.org/svnroot/mediawiki/trunk/extensions/OpenID OpenID
#
# (c) developers however checkout using this command:
#    cd $IP/extensions
#    svn checkout svn+ssh://USERNAME@svn.wikimedia.org/svnroot/mediawiki/trunk/extensions/OpenID OpenID
#
# STEP 2
# The makefile downloads the openid-php library from http://www.openidenabled.com/php-openid/
# and applies a patch to avoid PHP errors because Call-time pass-by-reference is deprecated
# since PHP 5.3.x see https://github.com/openid/php-openid/issues#issue/8  and
# the patch and fork of user kost https://github.com/openid/php-openid/pull/44/files
#
# Go to the extensions/OpenID subdirectors and start the installation 
# which also downloads and patches the pre-requisites:
#
#    cd $IP/extensions/OpenID
#    make
#
# initially written by Brion Vibber
# 20110203 T. Gries 
# 20111014 added a test whether "patch" (program) exists before starting it blindly

install: check-if-patch-exists Auth

# test if "patch" program is installed 
# some distributions don't have it installed by default
# alternative rule: patch-exists: ; patch --version >/dev/null
# http://www.gnu.org/s/hello/manual/make/Standard-Targets.html

check-if-patch-exists:
	@if $(SHELL) -c 'which patch' >/dev/null 2>&1; then \
		# echo "...The 'patch' program exists." ; \
		true; \
	else \
		echo "...The 'patch' program does not exist on your system. Please install it before running make."; \
		false; \
	fi

Auth:	php-openid-$(VER).tar.gz
	tar -xzf php-openid-$(VER).tar.gz $(SUBDIR)/Auth
	rm -f php-openid-$(VER).tar.gz
	mv $(SUBDIR)/Auth ./
	patch -p1 -d Auth < patches/php-openid-$(VER).patch
	rmdir $(SUBDIR)

php-openid-$(VER).tar.gz:
	wget --no-check-certificate https://github.com/openid/php-openid/tarball/$(VER) -O php-openid-$(VER).tar.gz

# before starting a fresh installation or update,
# you could use "make clean" to clean up, then "make" again
clean:
	rm -rf Auth php-openid-$(VER).tar.gz
