@extends('layouts.scaffold')

@section('scaffold')
<div class="min-h-screen">
    <section class="bg-indigo-900 py-6">
        <div class="container mx-auto">
            <form action="" method="GET">
                <input class="w-full h-10 px-3 rounded focus:outline-none focus:shadow-outline text-xl px-8 shadow-lg"
                    name="keyword" type="search" placeholder="Enter search key (e.g. company name, town, service type or sector)">
            </form>
        </div>
    </section>
    
    <section class="bg-gray-300">
        <div class="container mx-auto pt-16">
            <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <a class="bg-white inline-block border-l border-t border-r rounded-t py-3 px-8 text-xl text-gray-700 no-underline hover:underline font-semibold"
                        href="#">Find a Business</a>
                </li>
                <li class="mr-1">
                    <a class="inline-block border-l border-t border-r rounded-t py-2 px-8 text-xl text-gray-700 no-underline hover:underline font-semibold" href="#">Add your Business</a>
                </li>
            </ul>
        </div>
    </section>


        <div class="container mx-auto py-16">
            @yield('content')
        </div>

</div>
@endsection
