#!/bin/sh
dir=$0
dir="$(dirname $dir)"

#ls /tmp/search-t-drive/ | grep -o ....-..-..

echo "ftp - " & date -r /tmp/local-search/ftp*.mlocate.db +%Y-%m-%d

