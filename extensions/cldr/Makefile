.PHONY: help all clean

CORE=http://www.unicode.org/Public/cldr/2.0.1/core.zip

help:
	@echo "'make all' to download CLDR data and rebuild files."
	@echo "'make clean' to delete the generated LanguageNames*.php files."
	@echo "'make distclean' to delete the CLDR data."

all: LanguageNames.php

distclean:
	rm -f core.zip
	rm -rf core

clean:
	rm -f LanguageNames[A-Z]*.php

LanguageNames.php: core/
	php rebuild.php

core/: core.zip
	unzip core.zip -d core

core.zip:
	curl -C - -O $(CORE) || wget $(CORE) || fetch $(CORE)
