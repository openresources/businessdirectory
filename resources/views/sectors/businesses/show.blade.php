@extends('layouts.detail_tpl')

@section('content')
<div class="bg-blue-900 px-20 py-16">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <h3>
                <a class="text-blue-200 hover:text-white" href="{{route('sectors.show', $sector)}}">{{ $sector->name }}</a>
            </h3>
                    
            @can('update', $business)
                <a class="text-blue-100 font-normal" href="{{ route('sectors.businesses.edit', [$sector, $business]) }}">Edit Business Information</a>
            @endcan
        </div>
            
            <h2 class="text-white text-3xl py-2">{{ $business->name }}</h2>
        
        <h3 class="text-gray-300"> {{__('Established:')}} {{ formatDate($business->establishment_date) }}</h3>
        <h3 class="text-white text-xl italic py-2"> {{ Str::plural('Service',$business->services_count) }} </h3>
        <p class="text-gray-300 italic"> @foreach ($business->servicesList() as $service) {{ $service }} @if ($loop->remaining), @endif @endforeach </p>
    </div>
</div>

<div class="py-16  mb-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full sm:w-full md:w-4/5 lg:w-2/3">   
            <div class="flex items-center justify-between mb-2">
                <div>&nbsp;</div>
                <a class="no-underline" href="{{ route('sectors.show', $sector) }}">Back to {{ $sector->name }} <span class="text-xl">&#129042;</span></a>
            </div>

            <div class="details card bg-gray-100">
                <h3 class="h4">Business Profile</h3>
                <p>
                    {{ $business->profile }}
                </p>

                <h4>{{ __('Business Hours') }}</h4>
                <p>
                    @if (filled($business->business_hours))
                        {{ filled($business->business_hours)?  militaryTime($business->business_hours['start']) : "N/A" }} -
                        {{ filled($business->business_hours)?  militaryTime($business->business_hours['end']) : "N/A" }}
                    @else
                        Not provided
                    @endif
                </p>
                
                <h4 class="h4">Address</h4>
                <address>
                    {{ "{$business->address_1},"}}
                    {{ filled($business->address_2) ? "{$business->address_2} ," : "" }}
                    {{ filled($business->area) ? "{$business->area} ," : "" }}
                    {{ filled($business->city) ? "{$business->city} ," : "" }}
                    {{ filled($business->city) ? "{$business->city}" : "" }}
                </address>
    
                @if (filled($business->website))
                <h4>Website</h4>
                <address>{{ $business->website }}</address>
                @endif
    
                <h4>Email</h4>
                <address>{{ $business->email }}</address>
    
                <h4>Contact Person</h4>
                <address>{{ $business->contact_name }}, {{ "tel - $business->phone" }}</address>
    
            </div>
        </div>
    </div>
</div>
@endsection
