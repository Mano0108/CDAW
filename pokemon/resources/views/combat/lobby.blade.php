<x-app-layout>
    <p>LOBBY : {{$lobby_id}}</p>
    <br>
    <p>mode {{$mode}}</p>

    <form class="fight-form" method="POST" action="/fight" x-data>
        @csrf
        <input type="hidden" name="user1" value="user1_name" readonly>
        <input type="hidden" name="user2" value="user2_name" readonly>
        <input type="hidden" name="user1_pokemon" value="{[user2_name]}" readonly>
        <button class="fight-btn" name="lobby" value="{{$lobby_id}}">START-GAME</button>
    </form>
</x-app-layout>