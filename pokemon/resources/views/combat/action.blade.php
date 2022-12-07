<x-app-layout>

    @push('style')
        <link rel="stylesheet" href="{{ URL::asset('css/combat/action.css') }} " type="text/css">
    @endpush

    <div id="instruction-container">
        <p>LOBBY : {{ $object->lobby }}</p>
        <p>user 1 : {{ $object->user1 }}</p>
        <p>user 2 : {{ $object->user2 }}</p>
    </div>
    <div id="main-container">
        <div class="user-container">
            <div class="pkmn-free-space"></div>
            <div class="pkmn-hud"></div>
            <div class="pkmn-image">
                <img src="https://img.pokemondb.net/sprites/brilliant-diamond-shining-pearl/normal/charizard.png"
                    alt="">
            </div>
        </div>
        <div class="user-container">
            <div class="pkmn-image">
                <img id="current-user-pkmn"
                    src="https://img.pokemondb.net/sprites/brilliant-diamond-shining-pearl/normal/pikachu.png">
            </div>
            <div class="pkmn-hud"></div>
            <div class="pkmn-free-space"></div>
        </div>
        <div id="hub-container">
            <div id="dialog-container">
                <p>What will CHARMELEON do ?</p>
            </div>
            <div id="user-option-container">
                <form class="fight-form" method="POST" action="/fight" x-data>
                    @csrf
                    <input type="hidden" name="user1" value="user1_name" readonly>
                    <input type="hidden" name="user2" value="user2_name" readonly>
                    <input type="hidden" name="lobby" value="{{ $object->lobby }}" readonly>
                    <input type="hidden" name="user1_pokemon" value="{{ $object->user1_pokemon }}" readonly>
                    <table id="btn-container">
                        <tbody>
                            <tr>
                                <td><button class="fight-btn" name="action" value="1">ATTACK</button></td>
                                <td><button class="fight-btn" name="action" value="2">SP ATTACK</button></td>
                            </tr>
                            <tr>
                                <td><button class="fight-btn" name="action" value="3">DEFENSE</button></td>
                                <td><button class="fight-btn" name="action" value="logout">QUIT</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
