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
## Workflow

1. <del>pokedex avec data Tables</del>
2. Form pour login
3. Form pour créer un compte
4. Main Menu (fight) pour un user loggé basique permettant de lancer un combat
5. Habillage du main menu (fight)
6. Création du mode de combat random
7. Création du mode de combat draft
8. Création du mode de combat ranked
9. Implémentation des boutons de la toolbar et de leur page respective
