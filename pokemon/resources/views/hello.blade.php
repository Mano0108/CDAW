<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Hello</title>
</head>

<body>
    <h1> Hello World <h1>
            <br>
<?php 
    foreach ($pkmn as $pokemon) {
        echo "$pokemon->id <br>" ;
    } ?>
</body>

</html>
