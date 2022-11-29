@extends('template')

@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection

<div class="container mt-4">
    <form method="POST" action = "/menu" enctype="multipart/form-data" id="form1">
        {{csrf_field()}}
        <div>
            <label for="mail">e-mail:</label>
            <input type="email" id="mail" name="user_mail" value={{$email}}>
        </div>
        <div>
            <label for="msg">Password:</label>
            <input id="msg" name="password" value={{$password}}>
        </div>
        <div>
            <p>You don't have an account ? <a href="http://127.0.0.1:8000/signup"> Sign up</a></p>
        </div>
        <div>
            <span id='error-message'>{{$state}}</span>
        </div>
        <div class="button">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

@section('script')
    <script>
        "use strict";

        $(document).ready(function() {
            $('input').on("change", function(e) {
                console.log(e.target.value);
            });

            $('#form1').on("submit", function(e) {
                console.log(e.target);
            });
        });
    </script>
@endsection
