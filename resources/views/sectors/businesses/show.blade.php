@extends('layouts.detail_tpl')

@section('content')
<header class="bg-blue-800 px-20 py-10">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h3>
                <a class="text-blue-200 hover:text-white"
                    href="{{route('sectors.show', $sector)}}">{{ $sector->name }}</a>
            </h3>

            @can('update', $business)
            <a class="text-blue-100 font-normal"
                href="{{ route('sectors.businesses.edit', [$sector, $business]) }}">Edit Business Information</a>
            @endcan
        </div>

        <h2 class="text-white text-3xl py-2">{{ $business->name }}</h2>

        <h3 class="text-gray-300"> {{__('Established:')}} {{ formatDate($business->establishment_date) }}</h3>
        <h3 class="text-white text-xl italic py-2"> {{ Str::plural('Service',$business->services_count) }} </h3>
        <p class="text-gray-300 italic">
            @foreach($business->servicesList() as $service)
            <span class="rounded bg-indigo-300 text-indigo-900 py-1 px-2 mr-2 inline-block lowercase">{{ $service }}</span>
            @if($loop->remaining), @endif
            @endforeach
        </p>
        <p class="mt-6 italic">
            @foreach ($business->tags as $tag)
            <span class="bg-indigo-100 mr-1 py-2 px-3 rounded shadow text-sm text-gray-700">{{ $tag->name }}</span>
            @endforeach
        </p>
    </div>
</header>

<div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="w-full sm:w-full md:w-4/5 lg:w-2/3">
        <div class="flex items-center justify-end mb-6">
            <a class="no-underline" href="{{ route('sectors.show', $sector) }}">Back to {{ $sector->name }} <span
                    class="text-xl">&#129042;</span></a>
        </div>

        <div class="details card bg-indigo-100">
            <header>
                <h3 class="text-lg font-bold leading-normal text-blue-800">Business Profile</h3>
            </header>
            <p>
                {{ $business->profile }}
            </p>

            <h3 class="text-lg font-bold leading-normal mt-2 text-blue-800">{{ __('Business Hours') }}</h3>
            <p>
                @if (filled($business->business_hours))
                {{ filled($business->business_hours)?  militaryTime($business->business_hours['start']) : "N/A" }} -
                {{ filled($business->business_hours)?  militaryTime($business->business_hours['end']) : "N/A" }}
                @else
                Not provided
                @endif
            </p>

            <h3 class="text-lg font-bold leading-normal mt-2 text-blue-800">Address</h3>
            <address>
                {{ "{$business->address_1},"}}
                {{ filled($business->address_2) ? "{$business->address_2} ," : "" }}
                {{ filled($business->area) ? "{$business->area} ," : "" }}
                {{ filled($business->city) ? "{$business->city} ," : "" }}
                {{ filled($business->city) ? "{$business->city}" : "" }}
            </address>

            @if (filled($business->website))
            <h3 class="text-lg font-bold leading-normal mt-2 text-blue-800">Website</h3>
            <address>{{ $business->website }}</address>
            @endif

            <h3 class="text-lg font-bold leading-normal mt-2 text-blue-800">Email</h3>
            <address>{{ $business->email }}</address>

            <h3 class="text-lg font-bold leading-normal mt-2 text-blue-800">Contact Person</h3>
            <address>{{ $business->contact_name }}, {{ "tel - $business->phone" }}</address>
        </div>
    </div>
</div>

@endsection
