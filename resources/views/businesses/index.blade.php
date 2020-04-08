@extends('layouts.default_tpl')

@section('content')
    <h2>{{ __('Directory Listing Title') }}</h2>

    @foreach ($businesses as $business)
           <div class="card w-full md:w-1/2 lg:w-2/3 mb-4">
               {{ $business->name }}
           </div>
    @endforeach
@endsection
