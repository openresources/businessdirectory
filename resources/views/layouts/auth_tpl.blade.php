@extends('layouts.scaffold')

@section('page')
<div class="h-full"
    style="background:url({{asset(config('app.ui.auth_image_url'))}}) no-repeat 50% 90%; background-size: cover;">
    <section class="h-full flex justify-center items-center">
        @yield('content')
    </section>
</div>
@endsection
