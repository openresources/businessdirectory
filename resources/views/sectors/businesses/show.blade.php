@extends('layouts.default_tpl')

@section('content')
<div class="bg-blue-900 px-20 py-16">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-gray-300"><a class="hover:text-white"
                href="route('sectors.show', $sector)">{{ $sector->name }}</a></h3>
        <h2 class="text-white text-3xl py-2">{{ $business->name }}</h2>
    </div>
</div>
<div class="py-16  mb-16">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="details card">
            <h3 class="h4">Business Profile</h3>
            <p>
                {{ $business->profile }}
            </p>

            <h4 class="h4">Address</h4>
            <address>
                {{ "{$business->address_1},"}} {{$business->address_2 ?? ''}} 

                {{ filled($business->area) ? "{$business->area} ," : "" }}
                {{ $business->city }}
                {{ $business->country }}

            </address>
        </div>

    </div>
</div>
@endsection
