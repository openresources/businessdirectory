@extends('layouts.detail_tpl')

@section('content')
<div class="bg-blue-900 px-20 py-16">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-gray-300"><a class="hover:text-white"
                href="{{route('sectors.show', $sector)}}">{{ $sector->name }}</a></h3>
        <h2 class="text-white text-3xl py-2">{{ $business->name }}</h2>
        <h3 class="text-gray-300"> {{__('Established:')}} {{ formatDate($business->establishment_date) }}</h3>
    </div>
</div>

<div class="py-16  mb-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full sm:w-full md:w-4/5 lg:w-2/3">   
            <div class="flex items-center justify-between mb-2">
                <div>&nbsp;</div>
                <a class="text-blue-900 hover:text-pink-900" href="{{ route('sectors.show', $sector) }}">Back to {{ $sector->name }} <span class="text-xl">&#129042;</span></a>
            </div>
            <div class="details card">
                <h3 class="h4">Business Profile</h3>
                <p>
                    {{ $business->profile }}
                </p>

                <h4>{{ __('Business Hours') }}</h4>
                <p>
                    {{ militaryTime($business->business_hours['start']) }} -
                    {{ militaryTime($business->business_hours['end']) }}
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
                <address>{{ $business->contact_email }}</address>
    
                <h4>Contact Person</h4>
                <address>{{ $business->contact_name }}, {{ "tel - $business->contact_number" }}</address>
    
            </div>
        </div>
    </div>
</div>
@endsection
