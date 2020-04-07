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
</head>

<body class="bg-gray-300 h-screen antialiased leading-none">
    <div id="app">
        <nav class="bg-gray-900 shadow py-6">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center justify-center">
                    <div class="mr-6">
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div class="flex-1 text-right">
                        @guest
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3"
                            href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                        @else
                        <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}" class="no-underline hover:underline text-gray-300 text-sm p-3"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @yield('scaffold')

        <div class="py-5 bg-gray-800">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center text-gray-300">
                    <p>&copy; Unity Hill Chapel {{ now()->year }} </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
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
