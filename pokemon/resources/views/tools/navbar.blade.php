@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css/tools/navbar.css') }} " type="text/css">
@endpush

<div class="navbar">
    <div class="navbtn navbtn-border">
        <img class="navbar-icon" src="{{ URL::asset('/images/navbar/pokedex.png') }}">
        <a href="/menu/pokedex">POKEDEX</a>
    </div>
    <div class="navbtn navbtn-border">
        <img class="navbar-icon" src="{{ URL::asset('/images/navbar/replays.png') }}">
        <a href="/menu/replays">REPLAYS</a>
    </div>
    <div class="navbtn navbtn-border">
        <img class="navbar-icon" src="{{ URL::asset('images/navbar/fight.png') }}">
        <a href="/menu/fight">FIGHT</a>
    </div>
    <div class="navbtn navbtn-border">
        <img class="navbar-icon" src="{{ URL::asset('images/navbar/team.png') }}">
        <a href="/menu/team">TEAM</a>
    </div>
    <div class="navbtn">
        <img class="navbar-icon" src="{{ URL::asset('/images/navbar/info-64.png') }}">
        <a href="/menu/info">INFO</a>
    </div>
</div>

@push('script')
@endpush
