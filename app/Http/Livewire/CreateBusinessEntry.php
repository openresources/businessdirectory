<?php

namespace App\Http\Livewire;

use App\Business;
use Illuminate\Support\Arr;
use Livewire\Component;

class CreateBusinessEntry extends Component
{
    public $business_name;
    public $business_contact_name;
    public $business_contact_number;
    public $business_contact_email;
    public $business_website;
    public $address_1;
    public $address_2;
    public $area;
    public $city;
    public $country;
    public $business_profile;
    public $business_sectors;
    public $services;
    public $business_hours;
    public $business_establishment_date;
    public $geographical_area;
    public $search_keywords;

    protected $casts = [
        'business_establishment_date' => 'date',
    ];


    public function mount()
    {
        // $business = request()->user()->business;

        // $business_name = $business->business_name;
        // $business_name = $business->business_name;
        // $business_contact_name = $business->business_contact_name;
        // $business_contact_number = $business->business_contact_number;
        // $business_contact_email = $business->business_contact_email;
        // $business_website = $business->business_website;
        // $address_1 = $business->address_1;
        // $address_2 = $business->address_2;
        // $area = $business->area;
        // $city = $business->city;
        // $country = $business->country;
        // $business_profile = $business->business_profile;
        // $business_sectors = $business->business_sectors;
        // $services = $business->services;
        // $business_hours = $business->business_hours;
        // $business_establishment_date = $business->business_establishment_date;
        // $geographical_area = $business->geographical_area;
        // $search_keywords = $business->search_keywords;
    }

    public function render()
    {
        return view('livewire.create-business-entry');
    }

    public function create()
    {
        $validatedData = $this->validate([
            'business_name' => 'required',
            'business_contact_name' => 'required',
            'business_contact_number' => 'required',
            'business_contact_email' => 'required',
            'business_website' => 'sometimes|nullable|url',
            'address_1' => 'required',
            'address_2' => 'sometimes|nullable|string',
            'area' => 'sometimes|nullable|string',
            'city' => 'required',
            'country' => 'required',
            'business_profile' => 'sometimes|nullable|string',
            'business_establishment_date' => 'sometimes',
            'geographical_area' => 'sometimes',
        ]);

        $validatedData = $this->appendOptionalProperties($validatedData);
        $business = Business::create($validatedData);

        // dd($business);
    }

    public function appendOptionalProperties($validatedData)
    {
        if (filled($this->business_sectors)) {
            $validatedData = $this->appendProperty('business_sectors', $this->business_sectors, $validatedData);
        }
        
        if (filled($this->services)) {
            $validatedData = $this->appendProperty('services', $this->services, $validatedData);
        }
        
        if (filled($this->business_hours)) {
            $validatedData = $this->appendProperty('business_hours', $this->business_hours, $validatedData);
        }
        
        if (filled($this->search_keywords)) {
            $validatedData = $this->appendProperty('search_keywords', $this->search_keywords, $validatedData);
        }

        return $validatedData;
        
    }

    public function appendProperty($fieldName, $items, $validatedData)
    {
        $item = $fieldName;
        $$item = [];

        foreach ($items as $key => $value) {
            $$item["item-$key"] = $value;
        }

        return Arr::add($validatedData, $item, $$item);
    }

}
