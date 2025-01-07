#!/bin/bash
#title          :mysql-db.sh
#description    :This script will Script to restore multiple DB to mysql from .sql files;
#usage          :./mysql-db.sh



# Config Variables:
USER='root'
HOST='localhost'
PASS='admin1234'
export PATH=/bin:/usr/bin:/usr/local/bin
DB_PATH='/var/www/html/backups'
DATABASE_NAME='demo'
TODAY=$(date +%Y%m%d)
OUTFILE='output'
touch $OUTFILE.txt;

# Get all database list first

DBS="$(mysql -u $USER -h $HOST -p$PASS -Bse 'show databases')"
echo "These are the current existing Databases:"
echo $DBS >> $OUTFILE.txt;


#make directory at /backup/dbackup/${TODAY}

echo "Backup started for database - ${DATABASE_NAME}"

#backup and zip file is taken for database naming along with date

mysqldump -h ${HOST}   -u  ${USER}  -p${PASS}  ${DATABASE_NAME}  >> ${DB_PATH}/demo_$TODAY.sql
if [ $? -eq 0 ]; then
 echo "moved  demo.sql to the backup folder successfully" >> $OUTFILE.txt;
else
  echo "Error found during backup" >> $OUTFILE.txt;
  exit 1
fi

path="/var/www/html/backups"
timestamp=$(date +%Y%m%d)    
filename=log_$timestamp.txt    
log=$OUTFILE.txt
days=2

START_TIME=$(date +%s)

find $path -maxdepth 1 -name "*.sql"  -type f -mtime +$days  -print -delete >> $log

echo "Backup:: Script Start -- $(date +%Y%m%d)" >> $log

END_TIME=$(date +%s)

ELAPSED_TIME=$(( $END_TIME - $START_TIME ))


echo "Backup :: Script End -- $(date +%Y%m%d)" >> $log
#echo "Elapsed Time ::  $(date -d 00:00:$ELAPSED_TIME +%Hh:%Mm:%Ss) "  >> $log

#Move the backup database from current server to other server
#scp -r -i /var/www/app/demo.pem /root/mysqlbackups/demo_$TODAY.sql  ec2-user@13.127.87.98:/home/ec2-user 
#cp -r /root/mysqlbackups/demo_$TODAY.sql /var/www/app/backups
