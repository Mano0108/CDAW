<x-app-layout>

    @push('style')
        <link rel="stylesheet" href="{{ URL::asset('css/combat/action.css') }} " type="text/css">
    @endpush
    
    @include('combat.header')

    <div id="main-container">
        <div class="user-container">
            <div class="pkmn-free-space"></div>
            <div class="pkmn-hud">
                <p>{{$data['pokemon_user']['1']['name']}}</p><br>
                <p>HP : {{$data['users_hp']['1']}} / {{$data['pokemon_user']['1']['pv_max']}}</p>
            </div>
            <div class="pkmn-image">
                <img src="https://img.pokemondb.net/sprites/brilliant-diamond-shining-pearl/normal/{{$data['pokemon_user']['1']['name']}}.png"
                    alt="">
            </div>
        </div>
        <div class="user-container">
            <div class="pkmn-image">
                <img id="current-user-pkmn"
                    src="https://img.pokemondb.net/sprites/brilliant-diamond-shining-pearl/normal/{{$data['pokemon_user']['0']['name']}}.png">
            </div>
            <div class="pkmn-hud">
                <p>{{$data['pokemon_user']['0']['name']}}</p><br>
                <p>HP : {{$data['users_hp']['0']}} / {{$data['pokemon_user']['0']['pv_max']}}</p>
            </div>
            <div class="pkmn-free-space"></div>
        </div>
        <div id="hub-container">
            <div id="dialog-container">
                <div id="dialog-text">
                    <span >What will {{strtoupper($data['pokemon_user'][$data['current_turn']]['name'])}} do ?</span>
                </div>
            </div>
            <div id="user-option-container">
                <form class="fight-form" method="POST" action="/fight" x-data>
                    @csrf
                    <input type="hidden" name="data" value="{{json_encode($data)}}" readonly>
                    <table id="btn-container">
                        <tbody>
                            <tr>
                                <td><button class="fight-btn" name="action" value="1" style="display: none;">ATTACK</button></td>
                                <td><button class="fight-btn" name="action" value="2" style="display: none;">SP ATTACK</button></td>
                            </tr>
                            <tr>
                                <td><button class="fight-btn" name="action" value="3" style="display: none;">DEFENSE</button></td>
                                <td><button id="quit-btn" class="fight-btn" name="action" value="logout" style="display: none;">QUIT</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        var text = "{{json_encode($data['animations'])}}";
        var data = JSON.parse(text.replace(/&quot;/g,'"'));
        var count = {{count($data['animations'])}};
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/combat/animation.js') }}"></script>
    @endpush
</x-app-layout>
