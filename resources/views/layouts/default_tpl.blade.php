@extends('layouts.scaffold')

@section('scaffold')
<div class="min-h-screen">
    <div class="container mx-auto py-20">
        @yield('content')
    </div>
</div>
@endsection
