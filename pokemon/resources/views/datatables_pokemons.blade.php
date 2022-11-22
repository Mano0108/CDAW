@extends('data_template')
@section('content')
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
            foreach($pkmn as $pokemon){
                echo "<tr>";
                echo "<td> $pokemon->pokemon_id </td>";
                echo "<td> $pokemon->name </td>";
                echo "<td> <img src='$pokemon->path' alt='alternatetext'> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    
    </html>
@endsection