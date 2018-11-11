#!/usr/local/bin/perl

my $fileName = $ARGV[0];
my $regexpToFind =  $ARGV[1];
my $containerDirectory = "---";

if ($regexpToFind =~ /^[\*\+]/) {
  print "Your regexp expression is not accepted:$regexpToFind. Please use perl based regexps only!";
  exit 1;
}

open(FILE1, $fileName);
while (<FILE1>) {
    $line = $_;
    #printf("line %2d: %s", $c++, $line);
    #$ref=$1 if /^Referer: (.*)/;
    if ($line =~ /(.*):$/) {
      $containerDirectory = $1;
    } elsif ($line =~ /$regexpToFind/i) {
      $containerDirectory =~ s/\/mnt\/smb/Y:/;
      $line =~ s/[\r\n]//g;
      print "<b><font color=\"blue\">$line</font></b>&nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;&nbsp;$containerDirectory/$line\n";
    }
    
}
