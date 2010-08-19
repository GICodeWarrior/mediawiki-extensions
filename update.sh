#/bin/bash

PATH=$HOME/bin:$PATH

pushd $HOME/workspace/mediawiki
git svn rebase

find extensions -maxdepth 1 -type d \
 | sed 's%^extensions/%%' \
 | sort -f \
 | xargs -n1 -I@ git subtree push --prefix=extensions/@ mediawiki-extensions @

git gc --aggressive

popd
git fetch
git gc --aggressive
