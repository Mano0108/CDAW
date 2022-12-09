@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css/tools/drop-button.css') }} " type="text/css">
@endpush

<div class="dropdown">
            
    <button class="dropbtn">
        <img id ="connected" src="{{URL::asset('/images/navbar/status.png')}}" >
        {{ $user->name }}
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