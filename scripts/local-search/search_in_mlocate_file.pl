#!/usr/local/bin/perl
use strict;
use File::Basename;

my $fileName = $ARGV[0];
my $regexpToFind =  $ARGV[1];

if ($regexpToFind =~ /^[\*\+]/) {
  print "Your regexp expression is not accepted:$regexpToFind. Please use perl based regexps only!";
  exit 1;
}

my $locate_cmd = "locate --basename --database $fileName --regex $regexpToFind --ignore-case";
my $locate_cmd_output = `$locate_cmd`;

for (split /\n/, $locate_cmd_output){
    my $line = $_;
    my $filename = basename($line);

    $line =~ s/\/mnt\/t/T:/;
    $line =~ s/\/mnt\/datastore\/ftp/ftp:/;
    $line =~ s/[\r\n]//g;
    print "<b><font color=\"blue\">$filename</font></b>&nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;&nbsp;$line\n";
}
    

