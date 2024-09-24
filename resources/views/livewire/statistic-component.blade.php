<!-- Card Section -->
<div class="max-w-[85rem] px-4 py-5 sm:px-6 lg:px-8 lg:py-7 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

        {{-- for doctor --}}
        @if (auth()->check() && auth()->user()->role == 1)
            <!-- Card -->
            <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                <div class="inline-flex justify-center items-center">
                <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                <span class="text-xs font-semibold uppercase text-gray-600">All Appointments</span>
                </div>
        
                <div class="text-center">
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                    150
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                <dt class="pe-3">
                    <span class="text-green-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg>
                    <span class="inline-block text-sm">
                        1.7%
                    </span>
                    </span>
                    <span class="block text-sm text-gray-500">change</span>
                </dt>
                <dd class="text-start ps-3">
                    <span class="text-sm font-semibold text-gray-800">5</span>
                    <span class="block text-sm text-gray-500">last week</span>
                </dd>
                </dl>
            </div>
            <!-- End Card -->
  
            <!-- Card -->
            <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                <div class="inline-flex justify-center items-center">
                <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
                <span class="text-xs font-semibold uppercase text-gray-600">Upcoming Appointments</span>
                </div>
        
                <div class="text-center">
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                    25
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                <dt class="pe-3">
                    <span class="text-green-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg>
                    <span class="inline-block text-sm">
                        5.6%
                    </span>
                    </span>
                    <span class="block text-sm text-gray-500">change</span>
                </dt>
                <dd class="text-start ps-3">
                    <span class="text-sm font-semibold text-gray-800">7</span>
                    <span class="block text-sm text-gray-500">last week</span>
                </dd>
                </dl>
            </div>
            <!-- End Card -->
        
            <!-- Card -->
            <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                <div class="inline-flex justify-center items-center">
                <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                <span class="text-xs font-semibold uppercase text-gray-600">Completed Appointments</span>
                </div>
        
                <div class="text-center">
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                    4
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                <dt class="pe-3">
                    <span class="text-red-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                    <span class="inline-block text-sm">
                        5.6%
                    </span>
                    </span>
                    <span class="block text-sm text-gray-500">change</span>
                </dt>
                <dd class="text-start ps-3">
                    <span class="text-sm font-semibold text-gray-800">7</span>
                    <span class="block text-sm text-gray-500">last week</span>
                </dd>
                </dl>
            </div>
            <!-- End Card -->
        @endif

        {{-- for admin --}}
        @if (auth()->check() && auth()->user()->role == 2)
            <!-- Card -->
            <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                <div class="inline-flex justify-center items-center">
                <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                <span class="text-xs font-semibold uppercase text-gray-600">Users</span>
                </div>
        
                <div class="text-center">
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                    150
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                <dt class="pe-3">
                    <span class="text-green-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg>
                    <span class="inline-block text-sm">
                        1.7%
                    </span>
                    </span>
                    <span class="block text-sm text-gray-500">change</span>
                </dt>
                <dd class="text-start ps-3">
                    <span class="text-sm font-semibold text-gray-800">5</span>
                    <span class="block text-sm text-gray-500">last week</span>
                </dd>
                </dl>
            </div>
            <!-- End Card -->
  
            <!-- Card -->
            <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                <div class="inline-flex justify-center items-center">
                <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
                <span class="text-xs font-semibold uppercase text-gray-600">Doctors</span>
                </div>
        
                <div class="text-center">
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                    25
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                <dt class="pe-3">
                    <span class="text-green-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg>
                    <span class="inline-block text-sm">
                        5.6%
                    </span>
                    </span>
                    <span class="block text-sm text-gray-500">change</span>
                </dt>
                <dd class="text-start ps-3">
                    <span class="text-sm font-semibold text-gray-800">7</span>
                    <span class="block text-sm text-gray-500">last week</span>
                </dd>
                </dl>
            </div>
            <!-- End Card -->
        
            <!-- Card -->
            <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                <div class="inline-flex justify-center items-center">
                <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                <span class="text-xs font-semibold uppercase text-gray-600">Patients</span>
                </div>
        
                <div class="text-center">
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                    4
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                <dt class="pe-3">
                    <span class="text-red-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                    <span class="inline-block text-sm">
                        5.6%
                    </span>
                    </span>
                    <span class="block text-sm text-gray-500">change</span>
                </dt>
                <dd class="text-start ps-3">
                    <span class="text-sm font-semibold text-gray-800">7</span>
                    <span class="block text-sm text-gray-500">last week</span>
                </dd>
                </dl>
            </div>
            <!-- End Card -->
        
            <!-- Card -->
            <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                <div class="inline-flex justify-center items-center">
                <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                <span class="text-xs font-semibold uppercase text-gray-600">Appointments</span>
                </div>
        
                <div class="text-center">
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                    4
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                <dt class="pe-3">
                    <span class="text-red-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                    <span class="inline-block text-sm">
                        5.6%
                    </span>
                    </span>
                    <span class="block text-sm text-gray-500">change</span>
                </dt>
                <dd class="text-start ps-3">
                    <span class="text-sm font-semibold text-gray-800">7</span>
                    <span class="block text-sm text-gray-500">last week</span>
                </dd>
                </dl>
            </div>
            <!-- End Card -->
        @endif
    </div>
    <!-- End Grid -->
  </div>
  <!-- End Card Section -->