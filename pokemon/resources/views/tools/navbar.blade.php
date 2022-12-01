@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css/gradient.css') }} " type="text/css">
@endpush

<header id="header">
    <nav>
        <form action="/menu/pokedex" method="get">
            @csrf
            <input type="submit" name="upvote" value="pokedex" />
        </form>
    </nav>
</header>

<header class="header-container">
    <div class="separator left">
    </div>
    <div class="separator middle">
        <div class="navbar">
            <div class="navbtn"><a href="/menu/pokedex">Pokedex</a></div>
            <div class="navbtn"><a href="#news">News</a></div>
            <div class="navbtn"><a href="#fight">Fight</a></div>
            <div class="navbtn"><a href="#team">Team</a></div>
            <div class="navbtn"><a href="#shop">Shop</a></div>
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
