# Demo library

## General facts

This is a project made with Laravel and Vue.js, so you need to have PHP and
composer to install Laravel, and for Vue you need to have Node.js.
Also in this project we use Docker, so you need to install docker and
Docker compose to be able to run this project.

## Init project
*Maybe for some point you have to use root permissions*
1. Download the project
2. Copy the fiel _.env.eexample_ into the root folder as _.env_
3. Install composer dependencies with the command "composer install"
4. Install npm dependencies with _npm install_
5. Generate key with the command _php artisan key:generate_
6. Build and start the docker container with tne next command _docker-compose up
-d_, maybe you can have trouble the first time, starting the container, so you
will need to run the next command _docker-compose down_ and the previous command,
What happened to me is the db container wasn't up.
7. Enter to the app container to run the migrations and seeders with _docker-compose exec main bash_
8. Run the migrations _php artisan migrate_
9. Run seeders to have some entries on the app with _php artisan db:seed_
10. Log in with the user _user@test.com_ password: _secret_ or create a new user.
11. Navigate through the app, on the next url [http://localhost:8000/](http://localhost:8000/)
