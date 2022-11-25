<!DOCTYPE html>
<html>

<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">-->

    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script>
    "use strict";

    $(document).ready(function () {
        $('input').on("change", function (e) {
            console.log(e.target);
        });
        
        $('#form1').on("submit", function (e) {
            fetch('https://api.github.com/repos/ceri-num/uv-cdaw/commits');
        });
    });</script>
</head>

<body>
    <form id="form1">
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="user_name">
        </div>
        <div>
            <label for="mail">e-mail&nbsp;:</label>
            <input type="email" id="mail" name="user_mail">
        </div>
        <div>
            <label for="msg">Password&nbsp;:</label>
            <input id="msg" name="user_message">
        </div>
        <div class="button">
            <input type="submit">
        </div>
    </form>
</body>

</html>