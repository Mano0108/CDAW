<x-app-layout>

    @push('style')
        <link rel="stylesheet" href="{{ URL::asset('css/menus/info.css') }} " type="text/css">
    @endpush

    @include('menus.header')

    <div id="main-container">
        <div id='energy-container'>
            <table>
                <tbody>
                    <tr>
                        @for ($i = 0; $i < count($user->energies); $i++)
                            <td><img src="{{ $user->energies[$i]->icon }}"> <span
                                    style="display:none;">{{ $user->energies[$i]->name }}</span></td>
                            @if ($i == 17)
                    </tr>
                @elseif($i % 3 == 2)
                    </tr>
                    <tr>
                        @endif
                        @endfor
                        @for ($i = count($user->energies); $i < 18; $i++)
                            <td><img src="{{ URL::asset('/images/blocked_energy.png') }}"></td>
                            @if ($i == 18)
                    </tr>
                @elseif($i % 3 == 2)
                    </tr>
                    <tr>
                        @endif
                        @endfor
                </tbody>
            </table>
            <form action="/menu/shop" method="GET">
                <button type="submit">Unlock</button>
            </form>
        </div>
        <div id='avatar-container'>
            <p id="level-number">Level : {{$user->level}}</p>
            <img src="{{ URL::asset('/images/avatar/1.png') }}">
        </div>
        <div id='statistics-container'>
            <p>Played : 0</p> <br>
            <p>Victories : 0</p> <br>
            <p>Ratio : 0.00%</p> <br>

            <p id="favorite-pokemon">Favorite Pokemon</p>
            <img id="favorite-pokemon-img" src="{{$stats["favorite_pokemon"]}}">
        </div>
        <div id='replays-container'>

        </div>
    </div>
</x-app-layout>
