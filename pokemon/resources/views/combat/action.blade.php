<x-app-layout>

    @push('style')
        <link rel="stylesheet" href="{{ URL::asset('css/combat/action.css') }} " type="text/css">
    @endpush

    <div id="instruction-container">
        <p>LOBBY : {{ $data['lobby'] }}</p>
        <p>user 1 : {{ $data['users']['0']['name']}}</p>
        <p>user 2 : {{$data['users']['1']['name'] }}</p>
    </div>
    <div id="main-container">
        <div class="user-container">
            <div class="pkmn-free-space"></div>
            <div class="pkmn-hud"></div>
            <div class="pkmn-image">
                <img src="https://img.pokemondb.net/sprites/brilliant-diamond-shining-pearl/normal/{{$data['pokemon_user_2']['name']}}.png"
                    alt="">
            </div>
        </div>
        <div class="user-container">
            <div class="pkmn-image">
                <img id="current-user-pkmn"
                    src="https://img.pokemondb.net/sprites/brilliant-diamond-shining-pearl/normal/{{$data['pokemon_user_1']['name']}}.png">
            </div>
            <div class="pkmn-hud"></div>
            <div class="pkmn-free-space"></div>
        </div>
        <div id="hub-container">
            <div id="dialog-container">
                @if($data['current_turn'] == 0)
                    <p>What will {{$data['pokemon_user_1']['name']}} do ?</p>
                @else
                    <p>What will {{$data['pokemon_user_2']['name']}} do ?</p>
                @endif
            </div>
            <div id="user-option-container">
                <form class="fight-form" method="POST" action="/fight" x-data>
                    @csrf
                    <input type="hidden" name="data" value="{{json_encode($data)}}" readonly>
                    <table id="btn-container">
                        <tbody>
                            <tr>
                                <td><button class="fight-btn" name="action" value="1">ATTACK</button></td>
                                <td><button class="fight-btn" name="action" value="2">SP ATTACK</button></td>
                            </tr>
                            <tr>
                                <td><button class="fight-btn" name="action" value="3">DEFENSE</button></td>
                                <td><button id="quit-btn" class="fight-btn" name="action" value="logout">QUIT</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
