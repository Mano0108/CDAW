<x-app-layout>

    @push('style')
        <link rel="stylesheet" href="{{ URL::asset('css/combat/draw.css') }} " type="text/css">
    @endpush
    
    @push('script')
    <script type="text/javascript" src="{{ URL::asset('js/menus/navigate.js') }}"></script>
    @endpush

    @include('combat.header')

    @php
        if($data['winner_id'] = $data['users'][0]['id']){
            $winner_index = 0;
            $loser_index = 1;
        }
        else{
            $winner_index = 1;
            $loser_index = 0;
        }
    @endphp

    <div id="main-container" onclick="goToFight()">
        <div id="result">
            <p>WINNER : {{$data['users']["$winner_index"]["name"]}}</p>
        </div>
        <div id="rewards">
            <div class="user-rewards-container">
                <div class="user-name"> <p>{{$data['users']["$winner_index"]["name"]}}</p></div>
                <div class="user-reward"> <p>lvl : {{$data['users']["$winner_index"]["level"]}} + 0.5 ->  {{$data['users']["$winner_index"]["level"] + 0.1}}</p></div>
                <div class="user-reward"> <p>golds : {{$data['users'][$winner_index]['gold']}} + 50 ->  {{$data['users']["$winner_index"]["gold"] + 50}}</p></div>
            </div>
                <div class="vr"></div>
            <div class="user-rewards-container">
                <div class="user-name"> <p>{{$data['users'][1]['name']}}</p></div>
                <div class="user-reward"> <p>lvl : {{$data['users']["$loser_index"]["level"]}} + 0.1 ->  {{$data['users']["$loser_index"]["level"] + 0.1}}</p></div>
                <div class="user-reward"> <p>golds : {{$data['users']["$loser_index"]["gold"]}} + 1 ->  {{$data['users']["$loser_index"]["gold"] + 1}}</p></div>
            </div>
        </div>
        <p id="indication">click to continue</p>
    </div>
</x-app-layout>
