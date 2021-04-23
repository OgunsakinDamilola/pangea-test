# Soapbox Backend API Challenge

## Installation

### General Requirements
- PHP 7.4
- Composer
- Laravel 8

### General Installation
- Run `composer install`;
- Copy `.env.example` to `.env`;
- Run `php artisan key:generate`.
- Run `php artisan optimize:clear`

Update the following environment variable to use the database connection of your choice
```dotenv
DB_CONNECTION=****
DB_HOST=****
DB_PORT=****
DB_DATABASE=****
DB_USERNAME=****
DB_PASSWORD=****
```
- Run `php artisan migrate --seed`.

### Starting the application

To start this application, please run the command below at the root folder of the app.
```bash
php artisan serve
```
or
```bash
php -S locahost:8000 -t public/
```

Then open another bash terminal and navigate to the root of the app and run the command below to start the queue:worker

```bash
php artisan queue:work
```

### API Documentation
The API documentation can be found at [https://documenter.getpostman.com/view/3172372/TzJx8buz](https://documenter.getpostman.com/view/3172372/TzJx8buz)
