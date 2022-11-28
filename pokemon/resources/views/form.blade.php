@extends('template')

@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection

<div class="container mt-4">
    <form method="POST" action = "/log" enctype="multipart/form-data" id="form1">
        {{csrf_field()}}
        <div>
            <label for="mail">e-mail:</label>
            <input type="textfiels" id="mail" name="user_mail">
        </div>
        <div>
            <label for="msg">Password:</label>
            <input id="msg" name="password">
        </div>
        <div class="button">
            <input type="button" class="button_active" onclick="location.href='1.html';" />
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
