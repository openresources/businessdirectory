@extends('layouts.default_tpl')

@section('content')
    <h2> @lang('Create Business Entry') </h2>
    <p class="py-2 text-lg text-gray-600 w-full md:w-1/2 lg:w-2/3 leading-snug">Provide details about your business. The more information you provide, the easier the easier it is to find your business.</p>
    <livewire:create-business-entry />
@endsection
