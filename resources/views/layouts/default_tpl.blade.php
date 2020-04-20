@extends('layouts.scaffold')

@section('scaffold')
<div class="min-h-screen">
    <section class="bg-indigo-900 py-6">
        <div class="container mx-auto">
            <form action="{{ route('search.index') }}" method="GET">
                <input class="bg-indigo-100 w-full h-10 px-3 rounded focus:outline-none focus:shadow-outline text-xl px-8 shadow-lg"
                    name="keyword" type="search"
                    placeholder="Enter search key (e.g. company name, town, service type or sector)">
            </form>
        </div>
    </section>

    <section class="bg-gray-300 bg-center bg-no-repeat" style="background:url({{config('app.ui.tab_image_url')}});">
        @php
            use Illuminate\Support\Str;
            $highlightAddBusinessTab = Str::of(url()->current())->contains(route('businesses.create')) ;
            $highlightFindBusinessTab = ! Str::of(url()->current())->contains(route('businesses.create'));
            $activeTabClass  = "bg-white text-gray-700";
            $inactiveTabClass = "bg-gray-700 text-gray-100 opacity-75 border-gray-700";
        @endphp

        <div class="container mx-auto pt-16">
            <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <a class="{{$highlightFindBusinessTab? $activeTabClass :  $inactiveTabClass }} py-3 inline-block border-l border-t border-r rounded-t px-8 text-xl no-underline hover:underline font-semibold"
                href="{{route('sectors.index')}}">Find a Business</a>
                </li>
                <li class="-mb-px mr-1">
                    <a class="{{$highlightAddBusinessTab? $activeTabClass :  $inactiveTabClass }} py-3 inline-block border-l border-t border-r rounded-t px-8 text-xl no-underline hover:underline font-semibold"
                        href="{{ route('businesses.create') }}">Add your Business</a>
                </li>
            </ul>
        </div>
    </section>


    <div class="container mx-auto py-16">
        @yield('content')
    </div>

</div>
@endsection
