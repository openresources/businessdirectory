@extends('layouts.welcome_tpl')

@section('content')
<div class="py-20 bg-gray-300">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-4xl font-medium text-gray-700 mb-6">{{ __('Top Sectors') }}</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($sectors as $sector)

            <a href="{{ route('sectors.show', $sector) }}">
                <div class="transition-all flex flex-col items-center justify-center bg-white shadow hover:shadow-lg rounded h-56 p-6">
                    <img src="{{filled($sector->icon)? asset('img/icons' . $sector->icon) : asset('img/icons/photo.svg')}}"
                        alt="icon" class="fill-current text-green-600 opacity-75 hover:opacity-100 h-24 w-24">
                    <h3 class="text-lg font-semibold text-blue-700 sm:hover:text-pink-700 my-2"> {{ $sector->name }} </h3>
                </div>                
            </a>

            @endforeach
        </div>
    </div>
</div>

<div class="py-20 bg-white">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <h5>
            are you a business owner?
        </h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos rem impedit, vitae facere voluptate dolores ad
            omnis et excepturi voluptatibus qui officia velit quo unde. Neque veniam dicta eum aut?</p>
    </div>
</div>
@endsection
