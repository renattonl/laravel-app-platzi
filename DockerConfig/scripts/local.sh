# service web
docker exec -it -d quality_api bash -c "php artisan queue:work --sleep=3 --tries=3"
