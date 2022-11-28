# CDAW

## Installation

In order to set up the database on your server :

1. Do the database migrations by running the following command:


        php artisan migrate
      
2. Seed the database by running both commands in this order:
  ```
  php artisan db:seed --class=EnergySeeder
  ```
  ```
  php artisan db:seed --class=PokemonSeeder
  ```
3.
