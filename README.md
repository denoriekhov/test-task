## To run the project locally you should do the following:

Before proceeding, make sure that your environment meets requirements listed here: https://laravel.com/docs/8.x/installation#server-requirements

Copy .env.example > .env and configure your MySQL DB connection

Run the following commands:
```
composer install
npm i
php artisan db:migrate --seed
```

Open terminal #1 and run `php artisan serve`;
Open terminal #2 and run `npm run watch`;

Open your preferable browser and go to `localhost:3000` (or your custom port)
