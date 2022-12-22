@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css/tools/gold-count.css') }} " type="text/css">
@endpush

<div class="gold">
    <div class="gold-img">
        <img src="{{URL::asset('/images/navbar/gold-icon.png')}}" width="25" height="25">
        </div>
        <div class="gold-count"><p>{{$user->gold}}</p>
        </div>
</div>

