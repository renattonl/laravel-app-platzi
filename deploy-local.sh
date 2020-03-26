#!/bin/bash
docker exec -it curso_laravel bash -c "composer install --ignore-platform-reqs --no-scripts"

docker exec -it curso_laravel bash -c "php artisan down"
docker exec -it curso_laravel bash -c "php artisan migrate --force"
docker exec -it curso_laravel bash -c "php artisan cache:clear"
docker exec -it curso_laravel bash -c "php artisan route:clear"
docker exec -it curso_laravel bash -c "php artisan config:clear"
docker exec -it curso_laravel bash -c "php artisan up"
