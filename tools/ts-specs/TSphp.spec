%include Solaris.inc

%define _prefix /opt/php

Name:                TSphp
Summary:             PHP web scripting language
Version:             5.2.8
Release:             2
Source:              http://uk.php.net/distributions/php-%{version}.tar.bz2

SUNW_BaseDir:        /opt/php
BuildRoot:           %{_tmppath}/%{name}-%{version}-build
%include default-depend.inc

BuildRequires: TSpcre-devel
BuildRequires: TScurl-devel
BuildRequires: TSlibmcrypt-devel
Buildrequires: TSmysql-devel

Requires: TSpcre
Requires: TScurl
Requires: TSlibmcrypt
Requires: TSmysql

%package root
Summary:                 %{summary} - / filesystem
SUNW_BaseDir:            /
%include default-depend.inc

%prep
%setup -q -n php-%version

%build

CPUS=`/usr/sbin/psrinfo | grep on-line | wc -l | tr -d ' '`
if test "x$CPUS" = "x" -o $CPUS = 0; then
     CPUS=1
fi

export CC="cc"
export CXX="CC"
export CFLAGS="%optflags -L/opt/TSmysql/lib/mysql -R/opt/TSmysql/lib/mysql"
export LDFLAGS="%{_ldflags}"

export PATH=/opt/TSmysql/bin:/opt/ts/bin:$PATH
export EXTRA_LDFLAGS_PROGRAM='-L/opt/TSmysql/lib/mysql -R/opt/TSmysql/lib/mysql -L/opt/ts/lib -R/opt/ts/lib'
export LIBS='-L/opt/TSmysql/lib/mysql -R/opt/TSmysql/lib/mysql'
export CPPFLAGS='-I/opt/ts/include -I/opt/TSmysql/include'

./configure  --prefix=%{_prefix} \
	--with-xmlrpc \
	--enable-sockets \
	--enable-soap \
	--with-pgsql=/usr/postgres/8.2 \
	--enable-mbstring \
	--enable-fastcgi \
	--enable-pcntl \
	--with-openssl \
	--with-curl=/opt/ts \
	--sysconfdir=/etc/opt/php \
	--with-config-file-path=/etc/opt/php \
	--with-mysql=/opt/TSmysql \
	--disable-path-info-check \
	--with-pcre-regex=/opt/ts \
        --with-zlib \
        --with-bz2 \
        --enable-exif \
        --enable-ftp \
        --with-mysqli=/opt/TSmysql/bin/mysql_config \
	--with-mcrypt=/opt/ts


gmake -j$CPUS

%install
rm -rf $RPM_BUILD_ROOT

make install INSTALL_ROOT=$RPM_BUILD_ROOT
for x in .registry .channels .filemap .lock .depdblock .depdb; do
	#mv $RPM_BUILD_ROOT/$x $RPM_BUILD_ROOT/opt/php/lib/php/
	rm -rf $RPM_BUILD_ROOT/$x
done

%clean
rm -rf $RPM_BUILD_ROOT

%files
%defattr (-, root, bin)
%dir %attr (0755, root, bin) %{_prefix}/bin
%dir %attr (0755, root, sys) %{_prefix}/lib
%dir %attr (0755, root, sys) %{_prefix}/man
%dir %attr (0755, root, sys) %{_prefix}/include
%{_prefix}/bin/*
%{_prefix}/lib/*
%{_prefix}/man/*
%{_prefix}/include/*

%files root
%defattr (-, root, bin)
%dir %attr (0755, root, sys) /etc
%dir %attr (0755, root, sys) /etc/opt
%dir %attr (0755, root, sys) /etc/opt/php
/etc/opt/php/pear.conf

%changelog
* Sat Feb 21 2009 - river@loreley.flyingparchment.org.uk
- use TSmysql
* Sun Dec 14 2008 - river@wikimedia.org
- 5.2.8
* Sun Dec  7 2008 - river@wikimedia.org
- 5.2.7
* Sun Oct  5 2008 - river@wikimedia.org
- add build option: --with-mcrypt
* Thu Oct  2 2008 - river@wikimedia.org
- add build options: --with-zlib --with-bz2 --enable-exif --enable-ftp --with-mysqli
* Sun Jul  6 2008 - river@wikimedia.org
- build with external pcre 
* Sat Jun 21 2008 - river@wikimedia.org
- initial spec
