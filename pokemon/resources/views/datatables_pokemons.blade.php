@extends('data_template')
@section('content')
    <script>
        "use strict";

        $(document).ready(function() {
            $('img').on("mouseover", function(e) {
                console.log(e.target.src);
                let response = fetch("http://127.0.0.1:8000/api/pokemon/id/1")
                .then(response => response.json())
                .then(data => console.log(data['id']));
                
            });
        });
    </script>
    <html>
    <h1> Exercice PokeAPI</h1>
    <br>
    <br>
    <table id="pokemon">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pkmn as $pokemon) {
                echo '<tr>';
                echo "<td> $pokemon->pokemon_id </td>";
                echo "<td> $pokemon->name </td>";
                echo "<td> <img src='$pokemon->path' alt='alternatetext'> </td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    </html>
@endsection
