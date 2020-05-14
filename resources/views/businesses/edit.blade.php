@extends('layouts.default_tpl')

@section('content')
    <h2> @lang('Edit Business Entry') </h2>
    <p class="py-2 text-lg text-gray-600 w-full md:w-1/2 lg:w-2/3 leading-snug">Update your business information.</p>
    <livewire:create-business-entry :business="$business" :action="'update'"/>
@endsection
