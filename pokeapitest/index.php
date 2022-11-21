<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="//code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8"
        src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            console.log("start");
            $('pokemon').DataTable();
        });
    </script>
</head>

<body>
    <h1> Exercice PokeAPI</h1>
    <br>
    <br>
    <?php
    echo
        '<table id="pokemon">
    <thead>
        <tr>
            <th>id</td>
            <th>Name</td>
            <th>Image</td>
        </tr>
    </thead>
    <tbody>';
    for ($i = 1; $i < 20; $i++) {
        $file = file_get_contents("https://pokeapi.co/api/v2/pokemon/$i");
        $pkmn = json_decode($file, true);
        $name = $pkmn['name'];
        $image = $pkmn['sprites']['front_default'];

        echo
            "   <tr>
        <td> $i </td>
        <td> $name </td>
        <td> <img src='$image' alt='alternatetext'> </td>
    </tr>";
    }
    echo
        '   </tbody>
    </table>';
    ?>
</body>

</html>