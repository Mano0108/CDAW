<x-app-layout>
    <p>LOBBY : {{$object->lobby}}</p>
    <br>
    <p>user 1 : {{$object->user1}}</p>
    <p>user 2 : {{$object->user2}}</p>
    <br>
    <form class="fight-form" method="POST" action="/fight" x-data>
        @csrf
        <input type="hidden" name="user1" value="user1_name" readonly>
        <input type="hidden" name="user2" value="user2_name" readonly>
        <input type="hidden" name="lobby" value="{{$object->lobby}}" readonly>
        <input type="hidden" name="user1_pokemon" value="{{$object->user1_pokemon}}" readonly>
        <button class="fight-btn" name="action" value="1">Attack</button>
    </form>
    <form class="fight-form" method="POST" action="/fight" x-data>
        @csrf
        <input type="hidden" name="user1" value="user1_name" readonly>
        <input type="hidden" name="user2" value="user2_name" readonly>
        <input type="hidden" name="lobby" value="{{$object->lobby}}" readonly>
        <input type="hidden" name="user1_pokemon" value="{{$object->user1_pokemon}}" readonly>
        <button class="fight-btn" name="action" value="2">Attack</button>
    </form>
    <form class="fight-form" method="POST" action="/fight" x-data>
        @csrf
        <input type="hidden" name="user1" value="user1_name" readonly>
        <input type="hidden" name="user2" value="user2_name" readonly>
        <input type="hidden" name="lobby" value="{{$object->lobby}}" readonly>
        <input type="hidden" name="user1_pokemon" value="{{$object->user1_pokemon}}" readonly>
        <button class="fight-btn" name="action" value="2">Attack</button>
    </form>
    
</x-app-layout>