@extends('layouts.scaffold')

@section('scaffold')
<div class="min-h-screen"
    style="background:url({{config('app.ui.auth_image_url')}}) no-repeat 50% 90%; background-size: cover;">
    <section>
        <div class="container mx-auto py-16">
            @yield('content')
        </div>
    </section>
</div>
@endsection
