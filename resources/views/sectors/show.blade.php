@extends('layouts.default_tpl')

@section('content')

<div class="py-20 bg-gray-300">

    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-2xl mb-4">{{ $sector->name }}</h2>

        @foreach ($businesses as $business)
        <a href="{{ route('sectors.businesses.show',[$sector, $business]) }}">
            <div class="transition-all flex items-start justify-start bg-white shadow hover:shadow-lg rounded h-auto p-6 mb-6">
                <div class="flex-auto">
                    <h3 class="text-lg text-blue-700 font-semibold mb-2"> {{ $business->name }}</h3>
                    <p class="w-3/4 sm:w-full md:w-3/4">{{ $business->profile }}</p>
                    <p>
                        <a class="button button-primary bg-blue-700 hover:bg-blue-900 text-white inline-block rounded shadow mt-4 px-6 py-2" href="{{ route('sectors.businesses.show',[$sector, $business]) }}">
                        {{ __('More') }}
                        </a>
                    </p>
                </div>
    
                <div class="flex-initial">
                    
                </div>
            </div>
        </a>
        @endforeach

    </div>
</div>

@endsection
