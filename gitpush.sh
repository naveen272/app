#!/bin/bash
#title          :gitpush.sh
#description    :This script will Script to update all files to git;
#usage          :./gitpush.sh

git status >> /var/www/html/logs.txt
git add . >> /var/www/html/logs.txt
git status >> /var/www/html/logs.txt
git commit -m "new db backup and docs" >> /var/www/html/logs.txt
git push origin master >> /var/www/html/logs.txt

