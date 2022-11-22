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
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php   
            foreach($pkmn as $pokemon){
                echo "<tr>";
                echo "<td> $pokemon->id </td>";
                echo "<td> $pokemon->name </td>";
                echo "<td> <img src='$pokemon->path' alt='alternatetext'> </td>";
                //echo "<td> <img src='https://www.pokepedia.fr/images/1/1c/Miniature_Type_Combat_EB.png' alt='alternatetext'> </td>"; //Display an image of the type for best readability
                echo "<td> $pokemon->energy </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    
    </html>
@endsection