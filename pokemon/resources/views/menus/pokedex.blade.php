<x-app-layout>
@push('style')

<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

<style>
    /*<link rel="stylesheet" href="{{ URL::asset('css/menus/pokedex.css') }} " type="text/css">*/
    /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    .table-container{
        justify-content: center;
        display: flex;
        align-content: center;
        padding-bottom: 20px; 
    }
    #pokemon_wrapper{
        width: 66.66%;
        text-align: center;
        background: white;
        align-items: center;
        border: 1px solid black;
        padding: 10px;
        
    }
    .dataTables_wrapper .dataTables_length select{
        padding-right: 25px!important;
    }
</style>
@endpush

@push('script')
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/create_data_tables.js') }}"></script>
@endpush

@include('menus.header')
<br>
<div class="table-container">
<table id="pokemon" class="stripe cell-border"  style= "background: white" width = "100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Energy</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pkmn as $pokemon)
                <tr>
                    <td> {{ $pokemon->pokemon_id }} </td>
                    <td> {{ $pokemon->name }} </td>
                    <td align="center"> <img src={{ $pokemon->path }} alt='alternatetext'> </td>

                    <td align="center">
                        <table style="border-style: hidden!important" >
                            @foreach ($pokemon->energies as $energy)
                            <tr>
                                <td>
                                    <img src={{ $energy->path }} alt="{{ $energy->name }}" width="110" height="26">
                                    <span style="display:none;">{{ $energy->name }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>