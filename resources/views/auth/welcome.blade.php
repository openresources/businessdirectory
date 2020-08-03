@extends('layouts.default_tpl')


@section('content')
<div class="card p-0">
    <div class=" flex flex-col items-center justify-center p-16">
        <img class="mb-6" src="{{ asset('img/logo.png') }}" />
        <p class="text-xl text-center text-gray-700 leading-normal">
            @lang('Welcome')
        </p>
    </div>

    <div class="grid grid-cols-2 flex-1">
        <div class="flex items-center justify-center bg-blue-700 text-white  p-20">
            <p class="text-center">
                <a class="btn btn-primary" href="{{ route('businesses.create') }}">Get a Free Listing Now !!!</a>
            </p>
        </div>
        <div class="flex items-center justify-center bg-gray-900 text-white p-20">
            <form class="flex" action="{{ route('search.index') }}">
                @csrf
                <input name="keyword" type="search" placeholder="Find a Service..."
                    class="rounded rounded-r-none active:border-none shadow text-xl text-gray-500 px-3 py-4">

                <button type="submit" class="btn btn-primary rounded rounded-l-none text-xl shadow">
                    Search
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
