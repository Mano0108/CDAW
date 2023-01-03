<x-app-layout>
    @push('style')
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/menus/replays.css') }} " type="text/css">

        <style>
            /*<link rel="stylesheet" href="{{ URL::asset('css/menus/pokedex.css') }} " type="text/css">*/
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            .table-container {
                justify-content: center;
                display: flex;
                align-content: center;
                padding-bottom: 20px;
            }

            #pokemon_wrapper {
                width: 66.66%;
                text-align: center;
                background: white;
                align-items: center;
                border: 1px solid black;
                padding: 10px;

            }

            .dataTables_wrapper .dataTables_length select {
                padding-right: 25px !important;
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
        <table id="pokemon" class="stripe cell-border" style="background: white" width="100%">
            <thead>
                <tr>
                    <th>User 1</th>
                    <th>VS</th>
                    <th>User 2</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['combats'] as $combat)
                    <tr id="combat-{{ $combat['combat_id'] }}">
                        <td class="name">
                            @if ($combat['winner_id'] == $combat['user1_id']['id'])
                                <p class="winner">W</p>
                            @elseif($combat['winner_id'] === null)
                                <p class="draw">D</p>
                            @else
                                <p></p>
                            @endif
                            {{ $combat['user1_id']['name'] }}
                        </td>
                        <td>
                            <p class="versus"> VS </p>
                        </td>
                        <td class="name">
                            <p>{{ $combat['user2_id']['name'] }}</p>
                            @if ($combat['winner_id'] == $combat['user2_id']['id'])
                                <p class="winner">W</p>
                            @elseif($combat['winner_id'] === null)
                                <p class="draw">D</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</x-app-layout>
