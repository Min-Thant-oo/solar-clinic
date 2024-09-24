<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Livewire\AdminDashboard;
use App\Livewire\AllAppointments;
use App\Livewire\BookingComponent;
use App\Livewire\DoctorCreate;
use App\Livewire\DoctorBySpeciality;
use App\Livewire\DoctorDashboard;
use App\Livewire\DoctorListingComponent;
use App\Livewire\EditSpecialityForm;
use App\Livewire\FeaturedArticles;
use App\Livewire\FeaturedDoctors;
use App\Livewire\PatientArticlePage;
use App\Livewire\RecentAppointment;
use App\Livewire\SchedulesComponent;
use App\Livewire\SchedulesCreateForm;
use App\Livewire\SchedulesEditForm;
use App\Livewire\SpecialitiesComponent;
use App\Livewire\SpecialityForm;
use App\Livewire\StatisticComponent;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::get('/filter-by-speciality/{id}', DoctorBySpeciality::class);

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

// Patient routes
Route::group(['middleware' => 'patient'], function() {
    Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'patient'])
    ->name('dashboard');

    Route::get('/patient/appointments', AllAppointments::class)->name('patient.appointments.index');
    Route::get('/patient/booking/{id}', BookingComponent::class)->name('patient.appointments.book');

    Route::get('/articles', PatientArticlePage::class)->name('articles');
});


// Doctor Routes
Route::group(['middleware' => 'doctor'], function() {
    
    Route::get('/doctor/dashboard', DoctorDashboard::class)->name('doctor-dashboard');
    Route::get('/doctor/appointments', AllAppointments::class)->name('doctor-appointments');
    Route::get('/doctor/schedules', SchedulesComponent::class)->name('doctor-schedules');
    Route::get('/doctor/schedules/create', SchedulesCreateForm::class)->name('doctor-schedules-create');
    Route::get('/doctor/schedules/edit/{id}', SchedulesEditForm::class)->name('doctor-schedules-edit');
});


// Admin Routes
Route::group(['middleware' => 'admin'], function() {

    // Route::get('/admin/dashboard', [AdminController::class, 'loadAdminDashboard'])
    // ->name('admin-dashboard');

    // Route::get('/admin/doctors', [AdminController::class, 'loadDoctorListing'])
    // ->name('admin-doctors');

    // Route::get('/admin/create/doctor', [AdminController::class, 'loadDoctorForm']);

    // Route::get('/admin/specialities', [AdminController::class, 'loadAllSpecialities'])
    // ->name('admin-specialities');    
    
    // Route::get('/admin/create/specialites', [AdminController::class, 'loadSpecialitiesForm']);

    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin-dashboard');

    Route::get('/admin/doctors', DoctorListingComponent::class)->name('admin-doctors');
    Route::get('/admin/doctors/create', DoctorCreate::class)->name('admin-doctors-create');
    Route::get('/admin/doctors/edit/{id}', DoctorCreate::class)->name('admin-doctors-edit');

    Route::get('/admin/specialities', SpecialitiesComponent::class)->name('admin-specialities'); 
    Route::get('/admin/specialites/create', SpecialityForm::class)->name('admin-specialities-create');
    Route::get('/admin/specialities/edit/{id}', EditSpecialityForm::class)->name('admin-specialities-edit');

    Route::get('/admin/appointments', AllAppointments::class)->name('admin-appointments');
});

require __DIR__.'/auth.php';
