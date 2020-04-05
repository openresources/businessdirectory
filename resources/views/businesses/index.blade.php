@extends('layouts.app')

@section('content')
    <h2>{{ __('Directory Listing Title') }}</h2>

    @foreach ($businesses as $business)
           <div>
               {{ $business->name }}
           </div>
    @endforeach
@endsection
