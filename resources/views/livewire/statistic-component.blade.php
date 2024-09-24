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
                    {{ $doctor_appointments_count }}
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                    <dt class="pe-3 text-center">
                        <span class="text-sm font-semibold text-gray-800">{{ $last_month_appointments_count }}</span>
                        <span class="block text-sm text-gray-500">last month</span>
                    </dt>
                    <dd class="text-start ps-3">
                        <span class="text-sm font-semibold text-gray-800">{{ $last_week_appointments_count }}</span>
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
                    {{$doctor_upcoming_appointment_count}}
                </h3>
                </div>
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
                    {{ $doctor_completed_appointment_count }}
                </h3>
                </div>
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
                    {{ $users_count }}
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                <dt class="pe-3 text-center">
                    <span class="text-sm font-semibold text-gray-800">5</span>
                    <span class="block text-sm text-gray-500">last month</span>
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
                    {{ $doctors_count}}
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                    <dt class="pe-3 text-center">
                        <span class="text-sm font-semibold text-gray-800">5</span>
                        <span class="block text-sm text-gray-500">last month</span>
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
                <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                <span class="text-xs font-semibold uppercase text-gray-600">Patients</span>
                </div>
        
                <div class="text-center">
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                    {{ $patients_count }}
                </h3>
                </div>
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                    <dt class="pe-3 text-center">
                        <span class="text-sm font-semibold text-gray-800">5</span>
                        <span class="block text-sm text-gray-500">last month</span>
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
                <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                <span class="text-xs font-semibold uppercase text-gray-600">Appointments</span>
                </div>
        
                <div class="text-center">
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                    {{ $appointments_count }}
                </h3>
                </div>
        
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                    <dt class="pe-3 text-center">
                        <span class="text-sm font-semibold text-gray-800">5</span>
                        <span class="block text-sm text-gray-500">last month</span>
                    </dt>
                    <dd class="text-start ps-3">
                        <span class="text-sm font-semibold text-gray-800">5</span>
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