@extends('layouts.scaffold')

@section('scaffold')
<div class="w-full">
    <div class="flex bg-blue-900" style="height:500px;">
        <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
            <div>
                <h2 class="text-3xl font-semibold text-gray-100 md:text-4xl">Your search starts<span
                        class="text-indigo-600"> here...</span></h2>
                <p class="mt-2 text-sm text-gray-500 md:text-base">Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. Blanditiis commodi cum cupiditate ducimus!</p>
                <div>
                    <form class="flex flex-col mt-6" action="">
                        @csrf

                        <input name="keyword" type="text" placeholder="Which service are you searching for?"
                            class="rounded shadow text-gray-500 w-2/3 p-3 mb-4">
                        <select name="sector" class="rounded shadow text-gray-500 w-2/3 p-3 mb-4">
                            <option value="">{{ __('All sectors') }}</option>
                        </select>
                        <button type="submit" class="rounded shadow bg-yellow-600 font-bold text-white w-2/3 p-4 mb-4">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
            <div class="h-full object-cover"
                style="background-image: url(https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80)">
                <div class="h-full bg-black opacity-25"></div>
            </div>
        </div>
    </div>
</div>

@yield('content')



@endsection
