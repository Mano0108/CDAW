@extends('template')

@section('style')
<link rel="stylesheet" href="{{ URL::asset('css/gradient.css') }} " type="text/css">
@endsection
@section('content')

<header id="nav-bar">
    <nav>
        <form action="/menu" method="post">
            <input type="submit" name="upvote" value="{{$user->name}}" />
        </form>
    </nav>
</header>
<p>Welcome {{$user->name}}</p>

@endsection

@section('script')
@endsection
