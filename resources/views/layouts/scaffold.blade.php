@extends(config('email-login.app_shell_template'))

@section('scaffold')

@include('partials.menus.site_nav')

<div class="min-h-screen">
@yield('page')
</div>

<div class="py-5 bg-gray-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-gray-300">
            <p>&copy; Unity Hill Chapel {{ now()->year }} </p>
        </div>
    </div>
</div>
@endsection
