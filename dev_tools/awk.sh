#!/usr/bin/awk -f

BEGIN {
	print "An Awk script that counts the amount of times a word has been used in a file\n"
	print "If the scripts executes successfully, then the result will be printed in the terminal\n"
}

{
	# If file input is not provided to the script, exit the program
	if (FILENAME == "") {
		print "Please provide an input file to the script"
		print "Usage of the script is as: ./path/to/awk.sh myfile"
		exit 1
	}

	# convert all characters to lowercase
	$0=tolower($0)

	# remove all punctuation marks
	# gsub(regex, replacement, string) globally substitutes the regex match with the replacement string
	gsub(/[^a-z0-9_ \s]/, "", $0)

	# loop through the fields of each input and count the words,
	# saving the count in an associative array with the word as key
	for(i=1; i <= NF; i++)
	  words[$i]++
}

END {
	print "The count of each word is listed in the format: word => count\n"
	for (word in words)
	  printf "%s => %d\n", word, words[word]
}
