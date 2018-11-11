#!/bin/sh
dir=$0
dir="$(dirname $dir)"
perl $dir/searchInCacheFile.pl /tmp/search-y-drive/*.txt $1
perl $dir/search_in_mlocate_file.pl /tmp/local-search/ftp*.db $1

