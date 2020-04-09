@extends('layouts.default_tpl')

@section('content')

<div class="container mx-auto">

    <h2>Search Results - {{ $results->count() }} {{ $records }} found.</h2>
    <div class="sm:w-full md:w-4/5 lg:w-2/3">
        @forelse ($results as $business)
        <div class="card mb-4">
            <h3>
                {{$business->name}}
            </h3>
            <p class="leading-snug">{{ $business->profile }}</p>
        </div>
        @empty
        <div class="card mb-4">
            <p>
                No results matched your search query
            </p>
        </div>
        @endforelse
    </div>
</div>
@endsection
