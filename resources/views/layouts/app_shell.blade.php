<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Laravel')}} @hasSection ('title') - @yield('title') @endif</title>

    <!-- Styles -->
    @stack('styles')
    @stack('vendor-assets')

    <style>
        /* always hidden */
        [x-cloak=""] {
            display: none;
        }

        /* hidden on mobile/smaller screens */
        @media screen and (max-width: 768px) {
            [x-cloak="mobile"] {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-100 antialiased leading-none">
    <div id="app">
        <header>
            @yield('navbar-main')
            @sectionMissing('navbar-main')
            <nav class="bg-blue-900 shadow py-3" aria-labelledby="site-navigation">
                @include('user-manager::partials.menus.navbar_main')
            </nav>
            @endif
        </header>
        <main>
            <div id="scaffold">
                <div>
                    @stack('sidebar') {{-- a container, ideally <nav>xyz</nav> --}}
                </div>

                @yield('scaffold')
            </div>
        </main>
        <footer>
            @yield('footer')
        </footer>
    </div>

    <template x-cloak>
        @stack('partials')
    </template>
    <!-- Scripts -->
    @stack('scripts')
</body>

</html>
