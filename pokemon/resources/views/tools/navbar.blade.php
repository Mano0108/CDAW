@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css/tools/navbar.css') }} " type="text/css">
@endpush

<form action="/menu/info" method="GET" id="form-info" display="hidden"></form>
<form action="/menu/fight" method="GET" id="form-fight" display="hidden"></form>
<form action="/menu/team" method="GET" id="form-team" display="hidden"></form>
<form action="/menu/pokedex" method="GET" id="form-pokedex" display="hidden"></form>
<form action="/menu/replays" method="GET" id="form-replays" display="hidden"></form>

<div class="navbar">
    <button class="navbtn navbtn-border {{$menu['info']}}" type="submit" form="form-info">
        <img class="navbar-icon" src="{{ URL::asset('/images/navbar/info-64.png') }}">
        <p>INFO</p>
    </button>
    <button class="navbtn navbtn-border {{$menu['fight']}}"  type="submit" form="form-fight">
        <img class="navbar-icon" src="{{ URL::asset('images/navbar/fight.png') }}">
        <p>FIGHT</p>
    </button>
    <button class="navbtn navbtn-border {{$menu['team']}}" type="submit" form="form-team">
        <img class="navbar-icon" src="{{ URL::asset('images/navbar/team.png') }}">
        <p>TEAM</p>
    </button>
    <button class="navbtn navbtn-border {{$menu['pokedex']}}" type="submit" form="form-pokedex">
        <img class="navbar-icon" src="{{ URL::asset('/images/navbar/pokedex.png') }}">
        <p>POKEDEX</p>
    </button>
    <button class="navbtn {{$menu['replays']}}" type="submit" form="form-replays">
        <img class="navbar-icon" src="{{ URL::asset('/images/navbar/replays.png') }}">
        <p>REPLAYS</p>
    </button>
</div>

@push('script')
@endpush
