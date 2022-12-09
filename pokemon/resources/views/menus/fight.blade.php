<x-app-layout>

    @push('style')
        <link rel="stylesheet" href="{{ URL::asset('css/menus/fight.css') }} " type="text/css">
    @endpush

    @include('menus.header')


    <div id="main-container">
        <div class="mode-container">
            <div class="mode-img"></div>
            <div class="mode-desc">
                <p>Select your team of three pokemons, and fight against your opponent for fun. (No classement)</p>
            </div>
            <div class="fight-btn-container">
                <form class="fight-form" method="POST" action="/fighting" x-data>
                    @csrf
                    <button class="fight-btn" name="mode" value="skirmish">RANDOM</button>
                </form>
                <form class="fight-form" method="POST" action="/friends-selection" x-data>
                    @csrf
                    <button class="fight-btn" name="mode" value="skirmish">FRIENDS</button>
                </form>
            </div>
        </div>
        <div class="vr"></div>
        <div class="mode-container">
            <div class="mode-img"></div>
            <div class="mode-desc">
                <p>Competitive mode of pok’IMT. Select your team of three pokemons, and fight against a random opponent
                    for LPs.</p>
            </div>
            <div class="fight-btn-container">
                <form class="fight-form" method="POST" action="/friends-selection" x-data>
                    @csrf
                    <button class="fight-btn" name="mode" value="skirmish">RANDOM</button>
                </form>
            </div>
        </div>
        <div class="vr"></div>
        <div class="mode-container">
            <div class="mode-img"></div>
            <div class="mode-desc">
                <p>A funny gamemode where pokemons are selected beyond any pokemon available in the game. (Not only the
                    one you unlocked)</p>
            </div>
            <div class="fight-btn-container">
                <form class="fight-form" method="POST" action="/fighting" x-data>
                    @csrf
                    <button class="fight-btn" name="mode" value="blind">RANDOM</button>
                </form>
                <form class="fight-form" method="POST" action="/friends-selection" x-data>
                    @csrf
                    <button class="fight-btn" name="mode" value="blind">FRIENDS</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
