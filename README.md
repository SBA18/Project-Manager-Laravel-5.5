Project Manager

A support ticket application built using the Laravel framework.
Getting Started

Clone the project repository by running the command below if you use SSH

git clone https://github.com/acericonia/Project-Manager-Laravel-5.5.git

If you use https, use this instead

git clone https://github.com/acericonia/Project-Manager-Laravel-5.5.git

Run the command below to install Laravel dependencies

composer install

Copy env file :

cp .env.example .env

Generate Key :

php artisan key:generate

Setup your database and cd into the project directory then run:

php artisan migrate
php artisan db:seed to run demo data.

Once the database is settup and migrations are up, run

php artisan serve

and visit http://localhost:8000/ to see the application in action.
