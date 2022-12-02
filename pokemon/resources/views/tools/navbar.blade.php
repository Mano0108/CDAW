@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css/gradient.css') }} " type="text/css">
@endpush

<header class="header-container">
    <div class="separator left">
    </div>
    <div class="separator middle">
        <div class="navbar">
            <div class="navbtn navbtn-border">
                <img class="navbar-icon" src="{{URL::asset('/images/navbar/pokedex.png')}}">
                <a href="/menu/pokedex">POKEDEX</a>
            </div>
            <div class="navbtn navbtn-border">
                <img class="navbar-icon" src="{{URL::asset('/images/navbar/replays.png')}}">
                <a href="/menu/replays">REPLAYS</a>
            </div>
            <div class="navbtn navbtn-border">
                <img class="navbar-icon" src="{{URL::asset('images/navbar/fight.png')}}">
                <a href="/menu/fight">FIGHT</a>
            </div>
            <div class="navbtn navbtn-border">
                <img class="navbar-icon" src="{{URL::asset('images/navbar/team.png')}}">
                <a href="/menu/team">TEAM</a>
            </div>
            <div class="navbtn">
                <img class="navbar-icon" src="{{URL::asset('/images/navbar/info-64.png')}}">
                <a href="/menu">INFO</a>
            </div>
        </div>
    </div>
    <div class="separator right">
        <div class="dropdown">
            <button class="dropbtn">{{ $user->name }}
            </button>
            <div class="dropdown-content">
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>
                <!-- unable to send post request with x-jet-responsive-nav-link so i tricoted this logout form-->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <input id="logout" type="submit" value="Log out">
                </form>
            </div>
        </div>
    </div>
</header>

@push('script')
@endpush
