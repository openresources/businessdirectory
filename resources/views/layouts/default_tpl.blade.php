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

    <section class="bg-gray-300">
        @php
            use Illuminate\Support\Str;
            $highlightAddBusinessTab = Str::of(url()->current())->contains(route('businesses.create')) ;
            $highlightFindBusinessTab = ! Str::of(url()->current())->contains(route('businesses.create'));
            $activeTabClass  = "bg-white py-3";
            $inactiveTabClass = "pt-3 pb-2";
        @endphp

        <div class="container mx-auto pt-16">
            <ul class="flex border-b">
                <li class="{{ $highlightFindBusinessTab? '-mb-px' : ''}} mr-1">
                    <a class="{{$highlightFindBusinessTab? $activeTabClass :  $inactiveTabClass }} inline-block border-l border-t border-r rounded-t px-8 text-xl text-gray-700 no-underline hover:underline font-semibold"
                href="{{route('sectors.index')}}">Find a Business</a>
                </li>
                <li class="{{ $highlightAddBusinessTab? '-mb-px' : ''}} mr-1">
                    <a class="{{$highlightAddBusinessTab? $activeTabClass :  $inactiveTabClass }} inline-block border-l border-t border-r rounded-t px-8 text-xl text-gray-700 no-underline hover:underline font-semibold"
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
