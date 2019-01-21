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
`sed` is a stream editor which is used to perform basic text transformations on an input string.

For example:
```bash

