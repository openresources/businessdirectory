<?php

namespace App\Http\Livewire;

use App\Business;
use App\Common\Enums\Sectors;
use App\Sector;
use App\Service;
use Illuminate\Support\Arr;
use Livewire\Component;

class CreateBusinessEntry extends Component
{
    public $action;
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
    public $services = [];
    protected $service_ids = [];
    public $business_hours;
    public $establishment_date;
    public $geographical_area;
    public $search_keywords;

    public $business_id;
    protected $casts = [
        'establishment_date' => 'date',
    ];

    public function mount($action = "create", $business = null)
    {
        $this->action = $action;
        $this->name = "";

        if ($business) {
            $this->fillProperties($business);
        }
    }

    protected function fillProperties($business)
    {

        $this->business_id = $business->id;
        $this->name = $business->name;
        $this->contact_name = $business->contact_name;
        $this->phone = $business->phone;
        $this->email = $business->email;
        $this->website = $business->website;
        $this->address_1 = $business->address_1;
        $this->address_2 = $business->address_2;
        $this->area = $business->area;
        $this->city = $business->city;
        $this->country = $business->country;
        $this->profile = $business->profile;
        $this->sector_id = $business->sector_id;
        $this->services = $business->services->pluck('name', 'id')->toArray();
        $this->business_hours = $business->business_hours;
        $this->establishment_date = $business->establishment_date;
        $this->geographical_area = $business->geographical_area;
        $this->search_keywords = $business->search_keywords;
    }

    public function render()
    {
        $sectors = Sectors::toSelectArray();
        $servicesList = Service::get()->pluck('name', 'id')->toArray();

        return view('livewire.create-business-entry', compact('sectors', 'servicesList'));
    }

    public function create()
    {

        $validatedData = $this->runValidation();

        $business = Business::create($validatedData);

        $business->services()->syncWithoutDetaching($this->services);

        $sector = Sector::find($validatedData['sector_id']);

        return redirect()->to(route('sectors.show', $sector));
    }

    protected function runValidation()
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

        return $this->appendOptionalProperties($validatedData);
    }

    protected function appendOptionalProperties($validatedData)
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

    protected function appendProperty($fieldName, $items, $validatedData)
    {
        $item = $fieldName;
        $$item = [];

        foreach ($items as $key => $value) {
            $$item["item-$key"] = $value;
        }

        return Arr::add($validatedData, $item, $$item);
    }

    public function update()
    {
        $validatedData = $this->runValidation();

        $service_ids = collect($this->services)->filter(function($value, $key){
            return $value != false;
        })->keys()->toArray();

        $business = Business::find($this->business_id);

        $business->update($validatedData);

        $business->services()->sync($service_ids);

        $sector = Sector::find($validatedData['sector_id']);

        return redirect()->to(route('sectors.businesses.show', [$sector, $business]));
    }
}
