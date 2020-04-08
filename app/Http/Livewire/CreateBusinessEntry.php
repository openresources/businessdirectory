<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;
use App\Sector;
use App\Common\Enums\Sectors;
use App\Business;

class CreateBusinessEntry extends Component
{
    public $name;
    public $contact_name;
    public $phone;
    public $email;
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

    public function mount()
    {
        $this->name = "";
    }

    public function render()
    {
        $sectors = Sectors::toSelectArray();

        return view('livewire.create-business-entry', compact('sectors'));
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'contact_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => 'sometimes|nullable|url',
            'address_1' => 'required',
            'address_2' => 'sometimes|nullable|string',
            'area' => 'sometimes|nullable|string',
            'city' => 'required',
            'country' => 'required',
            'profile' => 'sometimes|nullable|string',
            'sector_id' => 'required|numeric',
            'establishment_date' => 'sometimes',
            'geographical_area' => 'sometimes',
        ]);

        $validatedData = $this->appendOptionalProperties($validatedData);

        $business = Business::create($validatedData);

        $business->services()->syncWithoutDetaching($this->services);

        $sector = Sector::find($validatedData['sector_id']);

        return redirect()->to(route('sectors.show', $sector));
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
