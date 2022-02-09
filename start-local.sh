#!/usr/bin/env bash
export XDEBUG_CONFIG="idekey=IDEA_DEBUG_ZURAGAN_ADMIN"
DB_HOST=127.0.0.1 DB_PORT=33063 php artisan serv --port=9898
