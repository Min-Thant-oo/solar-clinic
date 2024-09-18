<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <form wire:submit="register" class="p-5">
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input wire:model.live.debounce.500ms="name" id="name" class="block mt-1 w-full" type="text" name="name"  autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input wire:model.live.debounce.500ms="email" id="email" class="block mt-1 w-full" type="email" name="email"  autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Bio -->
                    <div class="mt-4">
                        <x-input-label for="bio" :value="__('Bio/About')" />
                        <x-text-input wire:model.live.debounce.500ms="bio" id="bio" class="block mt-1 w-full" type="text" name="bio"  autofocus autocomplete="bio" />
                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                    </div>

                    <!-- Hospital Name -->
                    <div class="mt-4">
                        <x-input-label for="hospital_name" :value="__('Hospital Name')" />
                        <x-text-input wire:model.live.debounce.500ms="hospital_name" id="hospital_name" class="block mt-1 w-full" type="text" name="hospital_name"  autofocus autocomplete="hospital_name" />
                        <x-input-error :messages="$errors->get('hospital_name')" class="mt-2" />
                    </div>

                    {{-- Speciality --}}
                    <div class="mt-4">
                        <x-input-label for="speciality" :value="__('Speciality')" />
                        <select wire:model="speciality_id" id="speciality" class="mt-1 font-medium text-sm text-gray-700 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm py-3 px-4 pe-9 block w-full text-sm disabled:opacity-50 disabled:pointer-events-none">
                            <option class="font-medium text-sm text-gray-700" selected="">Choose Speciality</option>
                            @foreach ($specialities as $speciality)
                                <option value="{{$speciality->id}}">{{$speciality->speciality_name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('speciality_id')" class="mt-2" />
                    </div>

                    {{-- experience --}}
                    <div class="mt-4">
                        <x-input-label for="experience" :value="__('Experience')" />
                        <x-text-input wire:model.live.debounce.500ms="experience" id="experience" class="block mt-1 w-full" type="number" name="experience"  autofocus autocomplete="experience" />
                        <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                    </div>
                    

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input wire:model.live.debounce.500ms="password" id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                         autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input wire:model.live.debounce.500ms="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation"  autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Social Links -->
                    {{-- Twitter --}}
                    <div class="mt-4">
                        <x-input-label for="twitter" :value="__('Twitter')" />
                        <x-text-input wire:model.live.debounce.500ms="twitter" id="twitter" class="block mt-1 w-full" type="text" name="twitter"  autofocus autocomplete="twitter" />
                        <x-input-error :messages="$errors->get('twitter')" class="mt-2" />
                    </div>
                    
                    {{-- Instagram --}}
                    <div class="mt-4">
                        <x-input-label for="instagram" :value="__('Instagram')" />
                        <x-text-input wire:model.live.debounce.500ms="instagram" id="instagram" class="block mt-1 w-full" type="text" name="instagram"  autofocus autocomplete="instagram" />
                        <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/admin/doctors" wire:navigate>
                            Cancel
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>