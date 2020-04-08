@extends('layouts.default_tpl')

@section('content')

<div class="w-full sm:w-full md:w-4/5 lg:w-2/3">
    
    <div class="heading heading-cols-2">
        <h2>{{ $sector->name }}</h2>
        <a class="no-underline" href="{{ route('sectors.index') }}">View all sectors <span
                class="text-xl">&#129042;</span></a>
    </div>
    
    <div class="listing">

        @forelse ($businesses as $business)
        <div class="transition-all flex items-start justify-start bg-white shadow hover:shadow-lg rounded h-auto p-6 mb-6">
            <div class="flex-auto">
                <h3> {{ $business->name }}</h3>
                <p>{{ $business->profile }}</p>
                <p>
                    <a class="btn mt-4"
                        href="{{ route('sectors.businesses.show',[$sector, $business]) }}">
                        {{ __('More') }}
                    </a>
                </p>
            </div>
        </div>
        @empty
            <div class="card">
                <p>The {{ $sector->name }} sector currently has no business listings.</p>
            </div>
        @endforelse

    </div>

</div>    

@endsection
