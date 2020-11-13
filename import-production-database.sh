#!/usr/bin/env bash

PRODUCTION_DB_USERNAME=$(grep PRODUCTION_DB_USERNAME .env | cut -d '=' -f 2-)
PRODUCTION_DB_PASSWORD=$(grep PRODUCTION_DB_PASSWORD .env | cut -d '=' -f 2-)
PRODUCTION_DB_DATABASE=$(grep PRODUCTION_DB_DATABASE .env | cut -d '=' -f 2-)
PRODUCTION_DB_HOST=$(grep PRODUCTION_DB_HOST .env | cut -d '=' -f 2-)


MY_VAR=$(grep MY_VAR .env | xargs)
IFS='=' read -ra MY_VAR <<< "$MY_VAR"
MY_VAR=${MY_VAR[1]}

lando db-export
mysqldump -u $PRODUCTION_DB_USERNAME -h $PRODUCTION_DB_HOST -p$PRODUCTION_DB_PASSWORD --set-gtid-purged=off $PRODUCTION_DB_DATABASE > production-database.sql
lando db-import production-database.sql
lando mysql laravel -e 'DELETE from auth_tokens where type = "salesforce";'
rm production-database.sql
