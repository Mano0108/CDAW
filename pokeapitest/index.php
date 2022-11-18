<html>
<h1> Exercice PokeAPI</h1>
<br>
<br>
<table>
    <thead>
        <tr>
            <td>id</td>
            <td>Name</td>
            <td>Image</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $file = file_get_contents("https://pokeapi.co/api/v2/pokemon/?limit=208&offset=0");
        $pokemons = json_decode($file, true);
        for ($i=0; $i < 20; $i++) {
            $name = $pokemons[$i]['name'];
            $pkmn = file_get_contents("https://pokeapi.co/api/v2/pokemon/$i");
            $image = $pkmn['sprites']['front_default'];

            echo "<tr>";
            echo "<td> $i </td>";
            echo "<td> $name </td>";
            echo "<td> <img src='$image' alt='alternatetext'> </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</html>