<p align="center">
<a href="https://bitbucket.org/dealerinspire/php-contact-form/src/master/">Dealer Inspire Code Challenge</a></p>

## About Laravel

### After cloning repository

``` cli
cp .env.example .env
```
- Create a database within your RDBMS
- Change the following for the database you wish to use
  - ``DB_CONNECTION=mysql``
  - ``DB_HOST=127.0.0.1``
  - ``DB_PORT=3306``
  - ``DB_DATABASE=dealer_inspire``
  - ``DB_USERNAME=root``
  - ``DB_PASSWORD=``
- Run the following commands
``` cli
composer install
npm i
npm run dev
php artisan migrate
php artisan key:generate
php artisan serve
```
