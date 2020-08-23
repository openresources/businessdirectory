@extends('layouts.default_tpl')

@section('content')

<div class="container mx-auto">

    <h2 class="mb-6">Search Results - {{ $results->count() }} {{ $records }} found.</h2>
    <div class="sm:w-full md:w-4/5 lg:w-2/3">
        @forelse ($results as $business)
        <div class="card mb-4 bg-indigo-100">
            <h3>
                <a href="{{ route('sectors.businesses.show', [$business->sector, $business]) }}">
                    {{$business->name}}
                </a>
            </h3>
            <p class="leading-snug">{{ $business->profile }}</p>
        </div>
        @empty
        <div class="card mb-4 bg-indigo-100">
            <p>
                No results matched your search query
            </p>
        </div>
        @endforelse
    </div>
</div>
@endsection
