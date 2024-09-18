<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

    @if (session()->has('message'))
        <div class="mb-4 bg-teal-500 text-sm text-white rounded-lg p-4" role="alert" tabindex="-1" aria-labelledby="hs-solid-color-success-label">
            <span id="hs-solid-color-success-label" class="font-bold">{{ session('message') }}</span>
        </div>
    @endif

    <!-- Card -->
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
              <div>
                <h2 class="text-xl font-semibold text-gray-800">
                  Specialities
                </h2>
                <p class="text-sm text-gray-600">
                  Registered Specialites
                </p>
              </div>
  
              <div>
                <div class="inline-flex gap-x-2">
                  <a href="/admin/specialites/create" wire:navigate class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Create
                  </a>
                </div>
              </div>
            </div>
            <!-- End Header -->
  
            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50 divide-y divide-gray-200">
                <tr>
                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      ID
                    </span>
                  </th>
                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Speciality Name
                     </span>
                  </th>
                  <th scope="col" colspan="2" class="px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs text-center font-semibold uppercase tracking-wide text-gray-800">
                      Actions
                     </span>
                  </th>
                </tr>
              </thead>
  
              <tbody class="divide-y divide-gray-200">
                @forelse ($specialities as $speciality)
                  <tr wire:key="{{ $speciality->id }}">
                      <td class="h-px w-auto whitespace-nowrap">
                          <div class="px-6 py-2 flex items-center gap-x-3">
                            <span class="text-sm text-gray-600">{{ $loop->iteration }}</span>
                          </div>
                        </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-3">
                          <span class="text-sm text-gray-600">{{$speciality->speciality_name}}</span>
                        </div>
                      </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-7">
                            <a href="/admin/specialities/edit/{{$speciality->id}}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"  wire:navigate>
                                Edit
                            </a>
                            <button 
                              wire:click='delete({{ $speciality->id }})'     
                              wire:confirm.prompt="Are you sure?\n\nType {{ $speciality->speciality_name}} to confirm|{{ $speciality->speciality_name}}"
                              class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"  wire:navigate>
                                Delete
                            </button>
                        </div>
                      </td>
                  </tr>
                @empty
                  <tr>
                      <td colspan="3" class="text-center text-lg py-4">No data found!</td>
                  </tr>
                @endforelse
                
              </tbody>
            </table>
            <!-- End Table -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
</div>
  <!-- End Table Section -->