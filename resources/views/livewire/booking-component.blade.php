<div>
    {{-- {{$doctor->doctorUser->name}} --}}
    <x-slot name="header">
        <h2 class="text-xl font-medium leading-tight text-gray-800">
            {{ __('You are now making an appointment with') }} <span class="font-semibold">Dr {{ $doctor_details->doctorUser->name }}</span>
        </h2>
    </x-slot>

    <div>
        {{-- <div wire:loading>
          <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
          </div>
          Processing..
        </div> --}}
        
        <!-- Card Blog -->
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-10 bg-white border my-2  shadow-md">
                <!-- Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-12">
                <div class="text-center">
                    {{-- <livewire:profile-image :user_id="$doctor_details->doctorUser->id"/> --}}
                    <div class="mt-2 sm:mt-4">
                    <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg dark:text-neutral-200">
                        {{$doctor_details->doctorUser->name}}
                    </h3>
                    <p class="text-xs text-gray-600 sm:text-sm lg:text-base dark:text-neutral-400">
                        {{$doctor_details->speciality->speciality_name}} / {{$doctor_details->hospital_name}}
                    </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                        <h3>Select an Available Date</h3>
                <input 
                    placeholder="Select Available date"
                    type="text" 
                    id="datepicker" 
                    autocomplete="off" 
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-gray-100"
                >
                @if($selectedDate)
                    <div>
                        <h4>Selected Date: {{ $selectedDate }}</h4>
                    </div>
                @endif
                <div>
                    <h2 class="text-xl font-bold mb-2">Available Time Slots</h2>
                    <div class="flex flex-wrap">
                        @foreach ($timeSlots as $slot)
                            <button 
                                class="m-2 p-2 bg-blue-500 text-white rounded hover:bg-blue-700"
                                type="button"
                                wire:click="bookAppointment('{{ $slot }}')"
                                wire:confirm="Book appointment on {{ $selectedDate }}, {{ $slot }} ?"
                            >
                                {{ date('H:i',strtotime($slot)) }}                 
                            </button>
                        @endforeach
                    </div>
                </div>
                </div>
                <!-- End Col -->
                </div>
                <!-- End Grid -->
            </div>
        <!-- End Card Blog -->


        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ensure Livewire can trigger when a date is selected
                var availableDates = @json($availableDates);
                var picker = new Pikaday({
                    field: document.getElementById('datepicker'),
                    format: 'YYYY-MM-DD',
                    onSelect: function(date) {
                        var selectedDate = picker.toString();
                        console.log(selectedDate)
                        @this.call('selectDate', selectedDate);
                    },
                    disableDayFn: function(date) {
                        var formattedDate = moment(date).format('YYYY-MM-DD');
                        return !availableDates.includes(formattedDate);
                    }
                });
            });

        </script>

    </div>
</div>
