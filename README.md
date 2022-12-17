# CDAW

## Installation

#### Pré-requis

- php : v8.0
- node : v19.1
- npm : 8.19
- Laravel : 9.40

Clone the repo and run :
```
  composer update
```

Copy .env.example, rename it .env and fill it with your parameters, then run :
```
   npm install
```
```
   npm run dev
```
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
2. <del>Form pour login</del> (28/11/2022)
3. <del>Form pour créer un compte</del> (29/11/2022)
4. <del>Main Menu (fight) pour un user loggé basique permettant de lancer un combat</del>
5. <del>Habillage du main menu (fight)</del>
6. Création du mode de combat random
7. <del>Création du mode de combat draft</del>
8. Création du mode de combat ranked
9. <del>Implémentation des boutons de la toolbar et de leur page respective</del>

- Faire un shop pour les energy
- Affichage des golds
- Affichage de la draft
- Replays
- Changer l'affichage du pokedex
- Creer une fonction pour creer les statistiques des pokemons
- Animation des combats
- <del>Changer d'avatar</del>
- Requête ajax sur les pokemons
- Requête ajax sur les energy

