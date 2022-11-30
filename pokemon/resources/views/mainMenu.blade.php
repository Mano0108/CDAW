@extends('template')

@section('style')
<link rel="stylesheet" href="{{ URL::asset('css/gradient.css') }} " type="text/css">
@endsection
@section('content')

<p>Welcome {{$user->name}}</p>

@endsection

@section('script')
@endsection
