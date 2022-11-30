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
        for ($i=1; $i < 20; $i++) {
            $file = file_get_contents("https://pokeapi.co/api/v2/pokemon/$i");
            $pkmn = json_decode($file, true);
            $name = $pkmn['name'];
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