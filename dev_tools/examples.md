# Examples of commands to execute
Note that you should replace the *directories' name and the file extensions* to fit your use case

## xargs
`xargs` is a command line tool that executes arguments passed to it as a command.

In case  a command is not supplied to it as an argument, it executes the default `echo` command

```bash
# find and move all php files from the current directory to `miscellaneous` directory
find . -name "*.php" | xargs -I {} mv {} ../miscellaneous

# delete all script files in the current directory
find . -name "*.sh" | xargs -I {} rm {}


# list all the directories in the current directory, with 2 columns per row
ls | xargs -n 2
```

## expr
`expr` evaluates expressions and writes the results in the standard output (STDOUT)

Example commands are:

```bash
# increment the value of a variable
# the backticks denotes arithmetic expansion which would be performed by expr
a=15
total=`expr $a + 12`
echo $total

# multiply a number by a factor of 3
b=17
res=`expr $b \* 3`
echo $res

# find the modulus of a number
c=5
mod=`expr $c % 10`
echo $mod
```

## sed
`sed` is a stream editor which is used to perform basic text transformations on an input stream.

For example:

#### 1. Substitute
```bash
# substitute the first e in each line with capital letter
sed 's/e/E/' myfile.txt

# globally substitute e with E
sed 's/e/E/g' myfile.txt

# substitute the 2nd line
sed '2s/[A-z]/oooooo/g' myfile.txt

# substitute from 2nd line to the end of the file
sed '2,$s/[A-z]/**/g' myfile.txt

# substitute from 3rd to the 6th line
sed '3,6s/[A-z]/**/g' myfile.txt
```

#### 2. Delete
```bash
# delete the 3rd line from the file
sed '3d' myfile.txt

# delete a range of lines
sed '2,4d' myfile.txt

# delete from specific line to the end of file
sed '2,$d' myfile.txt

# delete the last line of file
sed '$d' myfile.txt

# delete all except the range of lines
sed '5,7!d' myfile.txt

# delete all lines between 'coding' and 'theory' inclusive
sed '/coding/,/theory/d' myfile.txt

# delete all lines matching 'coding'
sed '/coding/d' myfile.txt
```

#### 3. Insert, append and modify
Insert uses the `i` flag

Append uses the `a` flag

Modify used the `c` flag

Looking at the man page for sed, insert, append and modify are used in the format of:
```bash
[addr]i/
text
```

For example:
```bash
# Append the text after 3rd line.
sed '3a\
> Testing appending text' myfile.txt
```
#### 4. More examples
```bash
# Add space to the left of the text at the beginning of the line
sed 's/^/ /' myfile.txt

# Delete the spaces at the beginning of each line
sed 's/^[ \s]*//' myfile.txt

# Add a blank line after every line
sed G myfile.txt

# Counts the number of lines in myfile.txt
sed -n '$=' myfile.txt

# print only lines 5 to 10
# -n ensures the command only prints the needed lines instead of the whole line
sed -n 5,10p myfile.txt

# use the -e option to run multiple sed commands
sed -e 's/this/THAT/g; s/long/LONG/g' myfile
```


## awk
`awk` is a pattern-directed scanning and processing language

OR

`awk` is a programming language that is used for processing text-based data, either in files or data streams, or using shell pipes

OR

`awk` is a pattern scanning and processing language, which is mostly used as a command line filter to reformat the output of other commands

```bash
# print the first word of each line
awk '{print $1}' myfile.txt

# print the fifth column of each line using the separator specified
awk -F ":" '{print $5}' /etc/passwd

# print only elements from column 2 that match pattern using stdin
awk ' /'coding'/ {print $2} ' myfile.txt

# print whatever is entered on the command line. Terminate the program by ctrl + D
awk '{ print }'

# print every line that is longer than 70 characters
awk 'length($0) > 70' myfile.txt

# print the even-numbered lines in a file. NR stands for 'Number of Rows'
awk 'NR % 2 == 0' myfile.txt

```
