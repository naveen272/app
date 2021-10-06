#!/bin/bash
#title          :gitpush.sh
#description    :This script will Script to update all files to git;
#usage          :./gitpush.sh

git status >> /home/ubuntu/gitlogs.txt
git add . >> /home/ubuntu/gitlogs.txt
git status >> /home/ubuntu/gitlogs.txt
git commit -m "new db backup and docs" >> /home/ubuntu/gitlogs.txt
git push origin master >> /home/ubuntu/gitlogs.txt

