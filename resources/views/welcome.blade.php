@extends('layouts.welcome_tpl')

@section('content')
<div class="py-20 bg-gray-300">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between">
            <h2 class="text-4xl font-medium text-gray-700 mb-6">{{ __('Top Sectors') }}</h2>
            <a class="text-blue-900 hover:text-pink-900" href="{{ route('sectors.index') }}">View all <span class="text-xl">&#129042;</span></a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($sectors as $sector)

            <a href="{{ route('sectors.show', $sector) }}">
                <div class="transition-all flex flex-col items-center justify-center bg-white shadow hover:shadow-lg rounded h-56 p-6">
                    <img src="{{filled($sector->icon)? asset('img/icons/' . $sector->icon) : asset('img/icons/real-estate.svg')}}"
                        alt="icon" class="fill-current text-green-600 hover:opacity-75 hover:skew-y-6  h-20 w-20">
                    <h3 class="text-lg font-semibold text-blue-700 sm:hover:text-pink-700 mt-4"> {{ $sector->name }} </h3>
                </div>                
            </a>

            @endforeach
        </div>
    </div>
</div>

<div class="py-20 bg-white">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <h5 class="text-3xl py-4">
            Do you own a business?
        </h5>
        <p class="py-3">Get a free business listing today by filling in a few details about your business.</p>
        <p class="py-3"><a href="#" class="inline-block rounded shadow py-3 px-6 bg-blue-700 hover:bg-blue-900 text-white">Get Free Listing</a></p>
    </div>
</div>
@endsection
