#!/usr/bin/env bash

./etc/script/getEnv.sh

docker-compose up -d --build

./etc/script/migrate.sh

docker-compose exec fpm php artisan db:seed --class=UserSeeder
docker-compose exec fpm php artisan db:seed --class=OauthClientTableSeeder
