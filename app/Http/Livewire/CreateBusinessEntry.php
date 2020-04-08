<?php

namespace App\Http\Livewire;

use App\Business;
use Illuminate\Support\Arr;
use Livewire\Component;

class CreateBusinessEntry extends Component
{
    public $name;
    public $contact_name;
    public $contact_number;
    public $contact_email;
    public $website;
    public $address_1;
    public $address_2;
    public $area;
    public $city;
    public $country;
    public $profile;
    public $sector_id;
    public $services;
    public $business_hours;
    public $establishment_date;
    public $geographical_area;
    public $search_keywords;

    protected $casts = [
        'establishment_date' => 'date',
    ];

    public function render()
    {
        return view('livewire.create-business-entry');
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'contact_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'website' => 'sometimes|nullable|url',
            'address_1' => 'required',
            'address_2' => 'sometimes|nullable|string',
            'area' => 'sometimes|nullable|string',
            'city' => 'required',
            'country' => 'required',
            'profile' => 'sometimes|nullable|string',
            'establishment_date' => 'sometimes',
            'geographical_area' => 'sometimes',
        ]);

        $validatedData = $this->appendOptionalProperties($validatedData);
        
        $business = Business::create($validatedData);

        $business->services()->syncWithoutDetaching($this->services);

        return redirect()->to(route('businesses.index'));
    }

    public function appendOptionalProperties($validatedData)
    {
        if (filled($this->sector_id)) {
            $validatedData = Arr::add($validatedData, 'sector_id', $this->sector_id);
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
