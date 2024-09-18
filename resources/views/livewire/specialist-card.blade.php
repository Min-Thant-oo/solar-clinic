<!-- Card Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    
    <!-- Title -->
    <div class="max-w-2xl mx-auto mb-10 text-center lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Our Specialities</h2>
      </div>
      <!-- End Title -->

    <!-- Grid -->
    <div class="grid gap-3 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 sm:gap-6">
      <!-- Card -->
      @forelse ($specialities as $speciality)
        <a href="/filter-by-speciality/{{$speciality->id}}" wire:navigate class="flex flex-col transition bg-white border shadow-sm group rounded-xl hover:shadow-md focus:outline-none focus:shadow-md">
          <div class="p-4 md:p-5">
            <div class="flex items-center justify-between gap-x-3">
              <div class="grow">
                <h3 class="font-semibold text-gray-800 group-hover:text-blue-600">
                  {{ $speciality->speciality_name }}
                </h3>
                <p class="text-sm text-gray-500">
                  {{count($speciality->doctors)}} Doctors
                  {{-- 4 Doctors --}}
                </p>
              </div>
              <div>
                <svg class="text-gray-800 shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
              </div>
            </div>
          </div>
        </a> 
      @empty
        <div class="flex flex-col transition bg-white border shadow-sm group rounded-xl hover:shadow-md focus:outline-none focus:shadow-md">
          No speciality shown.
        </div>
      @endforelse

      <!-- End Card -->
    </div>
    <!-- End Grid -->
  </div>
  <!-- End Card Section -->