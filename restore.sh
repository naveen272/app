#!/bin/bash
#title          :mysql-db.sh
#description    :This script will Script to restore multiple DB to mysql from .sql files;
#usage          :./mysql-r.sh


# Config Variables:
USER='root'
PASS='Root@123'
HOST='localhost'
DB_PATH='/var/www/app/backups'
DATABASE_NAME='demo1'
TODAY=$(date +%Y%m%d)
OUTFILE='output'
touch $OUTFILE_$TODAY.txt;

#Look for database in mysql shell
if [ "$(mysql -u $USER -h $HOST  -p$PASS -Bse "show databases")" ]
then
        echo " $DATABASE_NAME is selected is of old version" >>$OUTFILE_$TODAY.txt;
        echo " Intiated new database" >>$OUTFILE_$TODAY.txt;
        $(mysql -u $USER -h $HOST -p$PASS -e "DROP  DATABASE $DATABASE_NAME")
#Create Database "admin" else drop the exisiting and create new database
        $(mysql -u $USER -h $HOST -p$PASS -e "CREATE  DATABASE $DATABASE_NAME")
        echo " $DATABASE_NAME is being created" >>$OUTFILE_$TODAY.txt;
fi
if [ "$(mysql -u $USER -h $HOST  -p$PASS -Bse "show databases")" ]
then
  $(mysql -u $USER -h $HOST -p$PASS -e "USE  $DATABASE_NAME")
  $(mysql -u $USER -h $HOST -p$PASS   $DATABASE_NAME <  $DB_PATH/demo_$TODAY.sql)
  echo " restoring complete" >> $OUTFILE_$TODAY.txt;
fi

#path="/var/www/app/backups"
#timestamp=$(date +%Y%m%d)    
#filename=log_$timestamp.txt    
#log=$OUTFILE_$TODAY.txt
#days=7

#START_TIME=$(date +%s)

#find $DB_PATH -maxdepth 1 -name "*.sql"  -type f -mtime +$days -print -delete >> $log;

#echo "Backup:: Script Start -- $(date +%Y%m%d)" >> $log;

#END_TIME=$(date +%s)

#ELAPSED_TIME=$(( $END_TIME - $START_TIME ))

#echo "Backup :: Script End -- $(date +%Y%m%d)" >> $log;
