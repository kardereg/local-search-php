#!/bin/sh
dir=$0
dir="$(dirname $dir)"
perl $dir/searchInCacheFile.pl /tmp/search-y-drive/*.txt $1

