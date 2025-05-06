#!/bin/bash

echo "Initializing Docker setup"
docker compose down -v
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

echo "cp .env.example .env"
cp .env.example .env

echo "Booting up Laravel Sail"
./vendor/bin/sail up -d && echo && echo "Just wait 10 seconds before starting migrations to make sure container is running. If it still fails just rerun this installer... :)" && sleep 10
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate:fresh

