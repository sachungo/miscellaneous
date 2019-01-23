#! /usr/bin/env bash

greeting="Welcome back"
user=$(whoami)

# ${greeting} is using parameter expansion
# $user is a variable
echo "${greeting}oooo... $user! It's good to see you again :)"

# numerical operators are: -lt, -gt, -eq, -ne, -le, -ge
if [ $# -eq 0 ]
then
  echo "Please provide a whole number to get the arithmetic sum"
  echo "Usage of script is: $0 number"
  echo "E.g. '$0 2' will print 3 "
  exit 1
fi

number=$1
sum=0
iteration=0

while [ $iteration -le $number ]
do
  sum=`expr $sum + $iteration`
  iteration=`expr $iteration + 1`
done
  echo "The arithmetic sum of $1 is: $sum"
