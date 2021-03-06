<!doctype html>
<html lang="{{ app()->getLocale() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'} </script>

        <title>Megasoft | Calculator</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        <div id="app">
            <applayout>
                <calculator></calculator>
            </applayout>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>