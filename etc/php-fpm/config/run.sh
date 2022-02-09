#!/usr/bin/env bash
set -eu

#echo "+ Set user owner"
#chown www-data.www-data /var/www/storage/oauth*

echo "+ Ensure storage Permission"
chmod -R 777 /var/www/storage

echo "+ Ensure Cache Permission"
chmod -R 777 /var/www/bootstrap/cache

echo "+ Run Cron Job"
service cron start

echo "run fpm"
php-fpm7.1

