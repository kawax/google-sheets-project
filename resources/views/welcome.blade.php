<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', '') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div class="container">
    <a href="https://github.com/kawax/google-sheets-project">GitHub</a>

    <h1>Google Sheets for Laravel Demo</h1>

    <a href="{{ route('login') }}" class="btn btn-primary">Login with Google</a>

</div>
</body>
</html>
