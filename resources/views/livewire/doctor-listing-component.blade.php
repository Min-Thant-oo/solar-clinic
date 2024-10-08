<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

  @if (session()->has('message'))
      <div class="mb-4 bg-teal-500 text-sm text-white rounded-lg p-4" role="alert" tabindex="-1" aria-labelledby="hs-solid-color-success-label">
          <span id="hs-solid-color-success-label" class="font-bold">{{ session('message') }}</span>
      </div>
  @endif

    <!-- Card -->
    <div class="flex flex-col">
      <div class="-m-1.5">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
              <div>
                <h2 class="text-xl font-semibold text-gray-800">
                  Doctors
                </h2>
                <p class="text-sm text-gray-600">
                  Our Registered Doctors
                </p>
              </div>
  
              <div>
                <div class="inline-flex gap-x-2">
                  <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/admin/doctors/create" wire:navigate>
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
                      Name
                     </span>
                  </th>
                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Email
                     </span>
                  </th>
                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Bio
                     </span>
                  </th>
                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Speciality 
                     </span>
                  </th>
                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Hospital Name
                     </span>
                  </th>
                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Years of Experience
                     </span>
                  </th>
                  <th scope="col" class="px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Feature
                     </span>
                  </th>
                  <th scope="col" colspan="2" class=" px-6 py-3 text-start border-s border-gray-200">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Actions
                     </span>
                  </th>
                </tr>
              </thead>
  
              <tbody class="divide-y divide-gray-200">
                @forelse ($doctors as $doctor)
                  <tr wire:key="{{ $doctor->id }}">
                      <td class="h-px w-auto whitespace-nowrap">
                          <div class="px-6 py-2 flex items-center gap-x-3">
                            <span class="text-sm text-gray-600">{{ $loop->iteration }}</span>
                          </div>
                      </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-3">
                          <span class="text-sm text-gray-600">{{$doctor->doctorUser->name}}</span>
                        </div>
                      </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-3">
                          <span class="text-sm text-gray-600">{{$doctor->DoctorUser->email}}</span>
                        </div>
                      </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-3">
                          <span class="text-sm text-gray-600">{{$doctor->bio}}</span>
                        </div>
                      </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-3">
                          <span class="text-sm text-gray-600">{{$doctor->speciality->speciality_name}}</span>
                        </div>
                      </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-3">
                          <span class="text-sm text-gray-600">{{$doctor->hospital_name}}</span>
                        </div>
                      </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-3">
                          <span class="text-sm text-gray-600">{{$doctor->experience}}</span>
                        </div>
                      </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-3">
                          
                          <input 
                            wire:click="featured({{$doctor->id}})"
                            type="checkbox" 
                            {{ $doctor->is_featured ? 'checked' : '' }}
                            id="hs-basic-usage" 
                            class="relative w-[3.25rem] h-7 focus:outline-none p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200"
                          >
                          <label for="hs-basic-usage" class="sr-only">switch</label>
                        </div>
                      </td>
                      <td class="h-px w-auto whitespace-nowrap">
                        <div class="px-6 py-2 flex items-center gap-x-7">
                            <a href="/doctor/edit/{{$doctor->id}}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"  wire:navigate>
                                Edit
                            </a>
                            <button 
                              wire:click='delete({{ $doctor->id }})'     
                              wire:confirm.prompt="Are you sure?\n\nType {{ $doctor->doctor_name}} to confirm|{{ $doctor->doctor_name}}"
                              class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"  wire:navigate>
                                Delete
                            </button>
                        </div>
                      </td>
                  </tr>
                @empty
                  <tr>
                      <td colspan='8' class="text-center text-lg py-4">No data found!</td>
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