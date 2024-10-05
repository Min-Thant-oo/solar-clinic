<!-- Team -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto mb-10 text-center lg:mb-14">
      <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Our Featured Doctors</h2>
      <p class="mt-1 text-gray-600">Specialists</p>
    </div>
    <!-- End Title -->

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @if (count($featuredDoctors) > 0)

        @forelse ($featuredDoctors as $doctor)
          <div wire:key="{{ $doctor->id }}" class="flex flex-col p-4 bg-white border border-gray-200 rounded-xl md:p-6">
            <div class="flex items-center gap-x-4">
              <livewire:profile-image :user_id="$doctor->doctorUser->id"/>
              <div class="grow">
                <h3 class="font-medium text-gray-800">
                    {{ $doctor->doctorUser->name }}
                </h3>
                <p class="text-xs text-gray-500 uppercase">
                  {{ $doctor->speciality->speciality_name }} / {{ $doctor->hospital_name }}
                </p>
              </div>
            </div>
      
            <p class="mt-3 text-gray-500">
              {{ $doctor->bio }}
            </p>
    
            <div class="flex items-center justify-between gap-5 mt-5">
                <!-- Social Brands -->
                <div class=" space-x-1">
                    <a class="inline-flex items-center justify-center text-sm font-semibold text-gray-500 border border-gray-200 rounded-lg size-8 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" href="{{ $doctor->twitter }}" target="_blank">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                    </a>
                    <a class="inline-flex items-center justify-center text-sm font-semibold text-gray-500 border border-gray-200 rounded-lg size-8 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" href="{{ $doctor->instagram }}" target="_blank">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                    </a>
                </div>
                <!-- End Social Brands -->
                  <a href="{{ auth()->check() ? '/patient/booking/' . $doctor->id : '/login' }}" wire:navigate class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Book Appointment
                  </a>
                
            </div>
      
            
          </div>
        @empty
          <div class="flex flex-col p-4 bg-white border border-gray-200 rounded-xl md:p-6">No doctors shown.</div>
        @endforelse

      @else
          
      @endif
      <a href="{{ route('patient-doctors-index') }}" wire:navigate class="flex flex-col justify-center p-4 text-center border border-gray-200 border-dashed col-span-full lg:col-span-1 group rounded-xl md:p-6 hover:shadow-sm focus:outline-none focus:shadow-sm">
        <h3 class="text-lg text-gray-800">
          Explore More!
        </h3>
        <div>
          <span class="inline-flex items-center text-blue-600 gap-x-2 group-hover:text-blue-700 group-focus:text-blue-700">
            See all our doctors
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </span>
        </div>
      </a>
    </div>
  
    <!-- Grid -->

    <!-- End Grid -->
</div>
  <!-- End Team -->