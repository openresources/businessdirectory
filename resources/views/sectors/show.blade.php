@extends('layouts.default_tpl')

@section('content')

<div class="w-full sm:w-full md:w-4/5 lg:w-2/3">
    
    <header class="heading flex justify-between items-center mb-6">
        <h2 class="text-2xl flex-1">{{ $sector->name }}</h2>
        <a class="no-underline block" href="{{ route('sectors.index') }}">View all sectors <span
                class="text-xl">&#129042;</span></a>
    </header>
    
    <div class="listing">

        @forelse ($businesses as $business)
        <div class="transition-all flex items-start justify-start bg-white shadow hover:shadow-lg rounded h-auto p-6 mb-6">
            <div class="flex-auto">
            <header>
                <a  href="{{ route('sectors.businesses.show',[$sector, $business]) }}">
                    <h3 class="text-lg font-bold leading-normal text-blue-800"> {{ $business->name }}</h3>
                </a>
            </header>
            <div>
                <h4 class="font-semibold leading-snug text-blue-600">{{ Str::plural('Service', $business->services_count) }}</h4>
                <p class="mb-2 italic"> @foreach ($business->servicesList() as $service) {{ $service }} @if ($loop->remaining), @endif @endforeach</p>
                <p>{{ $business->profile }}</p>
            </div>
            <footer class="pt-6">
                <a class="btn btn-primary py-1 px-5"
                    href="{{ route('sectors.businesses.show',[$sector, $business]) }}">
                    {{ __('View Details') }}
                </a>
            </footer>
            </div>
        </div>
        @empty
            <div class="card bg-white">
                <p>The {{ $sector->name }} sector currently has no business listings. <a class="text-gray-700 hover:underline" href="{{ url()->previous() }}">Return to the previous page.</a></p>
            </div>
        @endforelse

    </div>

</div>    

@endsection
