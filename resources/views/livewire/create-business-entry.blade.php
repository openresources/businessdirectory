<div>

    <div wire:loading>
        Updating entry...
    </div>


    <div class="bg-gray-300 shadow rounded p-2 w-full sm:w-full md:w-1/2 lg:w-2/3">

        <div class="card card-default m-0">
            <form class="bg-white" wire:submit.prevent="{{$action}}">
    
                <div class="form-row">
                    <label for="name">Name</label>
                    <input class="form-input" type="text" id="name"
                        wire:model.lazy="name" placeholder="Registered business name">
                    @error('name') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="sector">Sector</label>
                    <select wire:model="sector_id" class="form-input">
                        <option value="null">---</option>
                        @foreach ($sectors as $key=>$value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('sector_id') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="sector">Services</label>
                    <div class="overflow-y-auto h-64 border-t-2 border-b-2 my-2 pb-2">
                        @foreach ($servicesList as $key=>$value)
                        <p class="m-4">
                            <label class="flex items-center">
                                <input class="leading-tight inline-block h-5 w-5 mr-2" wire:model="services.{{$key}}" type="checkbox" value="{{ $key }}">
                                <span class="text-lg">{{ $value }}</span>
                            </label>
                        </p>
                        @endforeach
                    </div>
                    @error('services') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="tags">Keywords <br><span class="text-sm"></span></label>
                    @if (filled($tags))
                    <div class="mb-1 py-3">
                        @foreach ($tags as $tag)
                            <span class="mr-1 px-2 py-1 bg-indigo-100 text-gray-700 rounded">{{ $tag }}</span>
                        @endforeach
                    </div>
                    @endif
                    <input class="form-input" type="text" id="tags"
                        list="tagsList"
                        wire:keydown.tab.prevent="updateTags"
                        wire:model.debounce.1000ms="tag" placeholder="Click tab to add each keyword">
                        <datalist id="tagList">
                            @foreach ($tagList as $tag)
                                <option value="{{ $tag }}">
                            @endforeach
                        </datalist>
                    
                    @error('tags') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="contact_name">Contact Person</label>
                    <input class="form-input" type="text" id="contact_name"
                        wire:model.lazy="contact_name" placeholder="Name of prefered representative">
                    @error('contact_name') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="phone">Contact Number</label>
                    <input class="form-input" type="text" id="phone"
                        wire:model.lazy="phone" placeholder="Preferred contact number">
                    @error('phone') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="email">Email</label>
                    <input class="form-input" type="text" id="email"
                        wire:model.lazy="email" placeholder="Company contact email address">
                    @error('email') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="website">Website</label>
                    <input class="form-input" type="text" id="website"
                        wire:model.lazy="website" placeholder="Company website address">
                    @error('website') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="address_1">Address 1</label>
                    <input class="form-input" type="text" id="address_1"
                        wire:model.lazy="address_1" placeholder="Address line 1">
                    @error('address_1') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="address_2">Address 2 (optional)</label>
                    <input class="form-input" type="text" id="address_2"
                        wire:model.lazy="address_2" placeholder="Address line 2">
                    @error('address_2') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="area">Area\Town (optional)</label>
                    <input class="form-input" type="text" id="area"
                        wire:model.lazy="area" placeholder="Area\Town">
                    @error('area') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="city">City</label>
                    <input class="form-input" type="text" id="city"
                        wire:model.lazy="city" placeholder="Name of city">
                    @error('city') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="country">Country</label>
                    <input class="form-input" type="text" id="country"
                        wire:model.lazy="country" placeholder="Name of country">
                    @error('country') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="profile">Company Profile (optional)</label>
                    <textarea class="form-input" type="text" id="profile"
                        wire:model.lazy="profile"
                        placeholder="Write a short paragraph about your business"></textarea>
                    @error('profile') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row">
                    <label for="establishment_date">Establishment Date (optional)</label>
                    <input class="form-input" type="text"
                        id="establishment_date" wire:model="establishment_date"
                        placeholder="Date business was registered">
                    @error('establishment_date') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-row mb-10">
                    <label for="geographical_area">Geographical Area (optional)</label>
                    <input class="form-input" type="text"
                        id="geographical_area" wire:model="geographical_area"
                        placeholder="Geographical area of operation">
                    @error('geographical_area') <span class="error text-sm text-red-700 italic">{{ $message }}</span> @enderror
                </div>
    
                <button class="btn btn-primary" type="submit">Submit Listing</button>
            </form>
        </div>

    </div>

</div>
