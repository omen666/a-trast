# a-trast

После того как контенеры будут созданы нужно зайти в контейнер docker exec -it php_trast bash 
Выполнить команды:
cd /var/www/html/blog 
composer update
cp .env.example .env
php artisan key:generate

Приложение должно стать доступно по адрессу http://localhost:8080/