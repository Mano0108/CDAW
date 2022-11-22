<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src='Exo1_cor.js'></script>
    </head>
    <body>
        <?php
            $file = file_get_contents("https://pokeapi.co/api/v2/pokemon/4");
            $pkmn = json_decode($file, true);
            foreach($pkmn['types'] as $type){
                $a = $type['type']['name'];
                echo "$a <br>";
            }
        ?>
    </body>
</html>