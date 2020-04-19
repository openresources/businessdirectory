@extends('layouts.scaffold')

@section('scaffold')
<div class="w-full">
    <div class="flex bg-blue-900" style="height:500px;">
        <div class="hidden lg:block lg:w-1/2" style="clip-path: polygon(0 0, 100% 0%, 75% 100%, 0% 100%);">
            <div class="h-full object-cover"
                style="background-image: url(https://images.unsplash.com/photo-1444653389962-8149286c578a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1645&q=80)">
                <div class="h-full bg-black opacity-25"></div>
            </div>
        </div>
        <div class="flex items-center text-center lg:text-left px-20 lg:w-1/2">
            <div>
                <h2 class="text-3xl font-semibold text-gray-100 md:text-4xl">Your search starts<span
                        class="text-indigo-600"> here...</span></h2>
                <p class="mt-2 text-sm text-gray-500 md:text-base">Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. Blanditiis commodi cum cupiditate ducimus!</p>
                <div>
                    <form class="flex flex-col mt-6" action="{{ route('search.index') }}">
                        @csrf

                        <input name="keyword" type="text" placeholder="Which service are you searching for?"
                            class="rounded shadow text-gray-500 w-4/5 p-3 mb-4">
                        <button type="submit" class="rounded shadow bg-yellow-600 font-bold text-white w-4/5 p-4 mb-4">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('content')



@endsection
