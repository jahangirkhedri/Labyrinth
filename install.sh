echo "docker build & up"
docker-compose down || true;
docker-compose up --build -d;
echo "docker is up"

echo "copy .env app"
touch .env
cp -r .env.example .env

echo "install app"
docker exec app composer install

echo  "clear cache"
docker exec app php artisan cache:clear
docker exec app php artisan key:generate

echo "run migrations and seeder"
docker exec app php artisan migrate --seed

docker exec app php artisan optimize:clear
docker-compose exec app chown -R www-data:www-data storage/
docker-compose exec app chmod -R 775 /var/www/bootstrap/cache
docker-compose exec app chown -R www-data:www-data /var/www/bootstrap/cache


