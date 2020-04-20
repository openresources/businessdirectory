@extends('layouts.default_tpl')

@section('content')



@if (session('status'))
    <x-alert class="mb-4" type="success" :message="session('status')"/>
@endif

<div class="flex items-center justify-between">
    <h2 class="text-2xl mb-4">{{ __('Sectors') }}</h2>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
    @foreach ($sectors as $sector)

    <a href="{{ route('sectors.show', $sector) }}">
        <div
            class="transition-all flex flex-col items-center justify-center bg-indigo-100 shadow hover:shadow-lg rounded h-56 p-6">
            <img src="{{filled($sector->icon)? asset('img/icons/' . $sector->icon) : asset('img/icons/real-estate.svg')}}"
                alt="icon" class="fill-current text-green-600 hover:opacity-75 hover:skew-y-6  h-20 w-20">
            <h3 class="text-lg font-semibold text-blue-700 sm:hover:text-pink-700 mt-4"> {{ "$sector->name ($sector->businesses_count)"}} </h3>
        </div>
    </a>

    @endforeach
</div>
@endsection
