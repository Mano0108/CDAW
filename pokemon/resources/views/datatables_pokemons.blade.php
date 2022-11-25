@extends('data_template')

@section('style')
@endsection


@section('content')
    <h1> Exercice PokeAPI</h1>
    <br>
    <br>
    <table id="pokemon">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Energy</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // foreach ($pkmn as $pokemon) {
            //     echo '<tr>';
            //     echo "<td> $pokemon->pokemon_id </td>";
            //     echo "<td> $pokemon->name </td>";
            //     echo "<td> <img src='$pokemon->path' alt='alternatetext'> </td>";
            //     echo '</tr>';
            // }
            ?>
            @foreach ($pkmn as $pokemon)
                <tr>
                    <td> {{ $pokemon->pokemon_id }} </td>
                    <td> {{ $pokemon->name }} </td>
                    <td> <img src={{ $pokemon->path }} alt='alternatetext'> </td>

                    <td>
                        <table>
                            @foreach ($pokemon->energies as $energy)
                                <td>
                                    <img src={{ $energy->path }} alt="{{ $energy->name }}" width="110" height="26">
                                    <span style="display:none;">{{ $energy->name }}</span>
                                </td>
                            @endforeach
                        </table>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/create_data_tables.js') }}"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            //$.get("http://127.0.0.1:8000/api/pokemon/test2/1", function(data){
            //    console.log(data)
            //})
            //$('img').on("mouseover", function(e) {
            //    console.log(e.target.src);
            //    let response = fetch("http://127.0.0.1:8000/api/pokemon/id/1")
            //    .then(response => response.json())
            //    .then(data => console.log(data['id']));
            //    
            //});
        });
    </script>
@endsection
