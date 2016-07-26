# Laravel Backend Starter for Quasar-Framework

## Installation

Clone this repo

Fill the options on .env file

Run the following commands:
```
composer install
php artisan migrate --seed
php artisan key:generate
php artisan jwt:generate
php artisan serve
```

Run the following commands to publish the config-files to change implementations to suits you.
```
php artisan vendor:publish --provider="Dingo\Api\Provider\LaravelServiceProvider"
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\JWTAuthServiceProvider"
php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"
php artisan vendor:publish --provider="Cyvelnet\Laravel5Fractal\Laravel5FractalServiceProvider"
```