# @task   Place this script in the folder you have initialized a github repository in. Run this script any time to add all recent edits with a commit message if you wish to do so.

# @author Michael Harootoonyan

#!/bin/bash

function isEmpty() {
    if [ -z "$1" ] ; then
      echo "0" # bash treats zero as true
    else
      echo "1"
    fi
}

function addGit() {
    git add .
    case $(isEmpty "$1") in
    "0") 
        git commit -m "message n/a";; # commit without message
    "1") 
        git commit -m "$1" ;; #commit with message
    *) #default case
        echo "error with commit" ;; 
    esac
    git push origin master
}



function main() {
   echo "Enter a message if you'd like with your git commit"
   read message 
   addGit "$message" #important to wrap in string because if you type testing addAllRecentEdits.sh script it will drop everything after testing
}

#run main
main $1