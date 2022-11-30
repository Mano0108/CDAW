<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Hello</title>
</head>

<body>
    <h1> Hello World 1 <h1>
            <br>
<?php 

    use App\Models\Energy;

   //foreach ($pkmn as $pokemon) {
   //    echo "$pokemon->id <br>" ;
   //}
    echo "<p> yo </p> <br>";
    $energy = Energy::where('name', "water")->get();
    
        $test = $energy->energy_id;
        echo "<p> $test</p> ";
    
?>
</body>

</html>
