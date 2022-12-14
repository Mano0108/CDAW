<x-app-layout>

    @push('style')
        <link rel="stylesheet" href="{{ URL::asset('css/combat/draw.css') }} " type="text/css">
    @endpush
    
    @push('script')
    <script type="text/javascript" src="{{ URL::asset('js/menus/navigate.js') }}"></script>
    @endpush

    @include('combat.header')

    <div id="main-container" onclick="goToFight()">
        <div id="result">
            <p>DRAW</p>
        </div>
        <div id="rewards">
            <div class="user-rewards-container">
                <div class="user-name"> <p>{{$data['users'][0]['name']}}</p></div>
                <div class="user-reward"> <p>lvl : {{$data['users'][0]['level']}} + 0.1 ->  {{$data['users'][0]['level'] + 0.1}}</p></div>
                <div class="user-reward"> <p>golds : {{$data['users'][0]['gold']}} + 10 ->  {{$data['users'][0]['gold'] + 10}}</p></div>
            </div>
                <div class="vr"></div>
            <div class="user-rewards-container">
                <div class="user-name"> <p>{{$data['users'][1]['name']}}</p></div>
                <div class="user-reward"> <p>lvl : {{$data['users'][1]['level']}} + 0.1 ->  {{$data['users'][1]['level'] + 0.1}}</p></div>
                <div class="user-reward"> <p>golds : {{$data['users'][1]['gold']}} + 10 ->  {{$data['users'][1]['gold'] + 10}}</p></div>
            </div>
        </div>
    </div>
</x-app-layout>
