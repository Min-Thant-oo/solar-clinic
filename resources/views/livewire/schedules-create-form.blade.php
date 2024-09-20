<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <form wire:submit="save" x-data x-init="$refs.name.focus()" class="p-5">
                    <!-- Name -->
                    <div>
                        <x-input-label for="available_day" :value="__('Available Date')" />
                        <select wire:model.live="available_day" id="available_day" class="mt-1 font-medium text-sm text-gray-700 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm py-3 px-4 pe-9 block w-full text-sm disabled:opacity-50 disabled:pointer-events-none">
                            <option class="font-medium text-sm text-gray-700" selected="">Choose Available Days</option>
                            @foreach ($daysOfWeek as $key=>$days)
                                <option value="{{$key}}">{{$days}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('available_day')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="from" :value="__('Available From')" />
                        <input wire:model.live='from' type="time" id="from" class="mt-1 font-medium text-sm text-gray-700 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm py-3 px-4 pe-9 block w-full text-sm disabled:opacity-50 disabled:pointer-events-none">
                        <x-input-error :messages="$errors->get('from')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="to" :value="__('Available To')" />
                        <input wire:model.live='to' type="time" id="to"  class="mt-1 font-medium text-sm text-gray-700 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm py-3 px-4 pe-9 block w-full text-sm disabled:opacity-50 disabled:pointer-events-none">
                        <x-input-error :messages="$errors->get('to')" class="mt-2" />
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <a  href="{{ route('doctor-schedules') }}" wire:navigate class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Cancel
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>