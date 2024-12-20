#!/bin/bash
if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    cp .env.example .env
else
    echo "env file exists"
fi

php artisan migrate --seed
php artisan key:generate
exec php-fpm