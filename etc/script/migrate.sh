#!/usr/bin/env bash

echo "----------------------------------------"
echo "++++++++++++ UPDATE PROJECT ++++++++++++"

echo ">> install dependency"
docker-compose exec fpm ./composer.phar install

echo ">> install migration"
docker-compose exec fpm php artisan migrate
