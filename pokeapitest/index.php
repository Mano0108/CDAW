<html>
    <h1> Exercice PokeAPI</h1>
    <br>
    <br>
    <table>
    <thead>
        <tr>
            <th>pokemon</th>
        </tr>
    </thead>
    <tbody>
        <?php
            for($i=1; $i<10; $i++){
                $file = file_get_contents("https://pokeapi.co/api/v2/pokemon/$i");
                $json = json_decode($file, true);
                
                $name = $json['name'];
                $image = $json['sprites']['front_default'];

                echo "<tr><td> $i </td><td> $name </td><td> <img src='$image' alt='alternatetext'> </td> </tr>";
            }
            ?>
        <tr>
        </tr>
    </tbody>
</table> 
</html>

