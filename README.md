# Quasar starter app with JWT Auth

Quasar Frontend URL: https://github.com/XristMisyris/quasar-starter-frontend

## Getting Started

Clone the repository and setup Laravel:

```
$ chmod -R a+rwX bootstrap/cache storage
$ cp .env.example .env

# With Docker Compose (php-fpm + nginx + MySQL)
$ docker-compose up -d
$ docker-compose run composer install
$ docker-compose run php php artisan key:generate
$ docker-compose run php php artisan migrate
$ docker-compose run php php artisan db:seed

# Native
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve
```

Configure the frontend to use your new Laravel backend URL.
