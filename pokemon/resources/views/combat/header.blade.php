@extends('tools.template')

@section('left')
@endsection

@section('middle')
<p>LOBBY : {{ $data['lobby'] }}    user 1 : {{ $data['users']['0']['name']}} VS user 2 : {{$data['users']['1']['name'] }}</p>
@endsection

@section('right')
    @include('tools.status')
@endsection