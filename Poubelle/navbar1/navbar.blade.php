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
<header>
    <div class="navbar">
        <a href="#home">Home</a>
        <a href="#news">News</a>

    </div>

    <div class="dropdown">
        <button class="dropbtn">Dropdown {{ $user->name }}
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
</header>


@push('script')
@endpush
