<div>

    <div class="card bg-indigo-100 w-full md:w-1/2 lg:w-2/3">
        <form wire:submit.prevent="create">

            <div class="flex flex-col form-row">
                <label for="name">Name</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="name"
                    wire:model="name" placeholder="Registered business name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="sector">Sector</label>
                <select wire:model="sector_id" class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl">
                    <option value="null" placeholder="ook">---</option>
                    @foreach ($sectors as $key=>$value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('sector_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="contact_name">Contact Person</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="contact_name"
                    wire:model="contact_name" placeholder="Name of prefered representative">
                @error('contact_name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="phone">Contact Number</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="phone"
                    wire:model="phone" placeholder="Preferred contact number">
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="email">Email</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="email"
                    wire:model="email" placeholder="Company contact email address">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="website">Website</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="website"
                    wire:model="website" placeholder="Company website address">
                @error('website') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="address_1">Address 1</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="address_1"
                    wire:model="address_1" placeholder="Address line 1">
                @error('address_1') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="address_2">Address 2</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="address_2"
                    wire:model="address_2" placeholder="Address line 2 (optional)">
                @error('address_2') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="area">Area\Town</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="area"
                    wire:model="area" placeholder="Area\Town (optional)">
                @error('area') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="city">City</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="city"
                    wire:model="city" placeholder="Name of city">
                @error('city') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="country">Country</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="country"
                    wire:model="country" placeholder="Name of country">
                @error('country') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="profile">Company Profile</label>
                <textarea class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text" id="profile"
                    wire:model="profile"
                    placeholder="Write a short paragraph about your business (optional)"></textarea>
                @error('profile') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row">
                <label for="establishment_date">Establishment Date</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text"
                    id="establishment_date" wire:model="establishment_date"
                    placeholder="Date business was registered (optional)">
                @error('establishment_date') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col form-row mb-10">
                <label for="geographical_area">Geographical Area</label>
                <input class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" type="text"
                    id="geographical_area" wire:model="geographical_area"
                    placeholder="Geographical area of operation (optional)">
                @error('geographical_area') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button class="btn" type="submit">Save Contact</button>
        </form>
    </div>

</div>
