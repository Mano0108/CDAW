@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css/tools/status.css') }} " type="text/css">
@endpush

<div class="dropdown">
            
    <div class="dropbtn">
        <img id ="connected" src="{{URL::asset('/images/navbar/status.png')}}" >
        <p>{{ auth()->user()->name}}</p>
    </div>
</div>