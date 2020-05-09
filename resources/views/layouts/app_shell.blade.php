<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <livewire:styles />
</head>

<body class="bg-white h-screen antialiased leading-none">
    <div id="app">
        @yield('scaffold')
    </div>
    <!-- Scripts -->
    <livewire:scripts />
    <script src="{{ mix('js/app.js') }}"></script>

    @if (App::environment('local'))
    <script id="__bs_script__">
        //<![CDATA[
        document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace("HOST", location.hostname));
    //]]>
    </script>
    @endif
</body>
</html>
