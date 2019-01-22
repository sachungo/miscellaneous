#!/usr/bin/awk -f

BEGIN {
	print "An Awk script that counts the amount of times a word has been used in a file\n"
	print"If the scripts executes successfully, then the result will be printed in the terminal"
}

if (!ARGV[1]) {
	print "Please provide an input file to the script"
	exit 1
}

line=tolower($0)
for(i=0; i < NF; i++)
	printf "Line: %s \t %dn", $line $i

# Printing logic
