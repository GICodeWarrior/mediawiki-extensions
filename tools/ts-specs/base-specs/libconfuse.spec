Name:		TSlibconfuse
Version:	2.6
Source:		http://bzero.se/confuse/confuse-%{version}.tar.gz
SUNW_BaseDir:	%{_basedir}
BuildRoot:	%{_tmppath}/%{name}-%{version}-build

%prep
rm -rf %name-%version
%setup -q -n confuse-%version

%build

./configure --prefix=%{_prefix}			\
	    --bindir=%{_bindir}			\
	    --includedir=%{_includedir}		\
	    --mandir=%{_mandir}			\
            --libdir=%{_libdir}			\
		--disable-nls			\
		--disable-static		\
	    --enable-shared

gmake -j$CPUS all

%install
gmake DESTDIR=${RPM_BUILD_ROOT} install
rm -f $RPM_BUILD_ROOT%{_libdir}/*.la

%clean
rm -rf $RPM_BUILD_ROOT
