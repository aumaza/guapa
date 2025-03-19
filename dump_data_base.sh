#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="sqls/dumps/guapa-$fecha.sql"
#mysqldump --user=root --password=slack142 --host=slackzone.ddns.net guapa > $archivo
mysqldump --user=root --password=slack142 --host=localhost guapa > $archivo
chmod 777 $archivo



