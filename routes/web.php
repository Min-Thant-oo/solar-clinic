<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Livewire\DoctorCreate;
use App\Livewire\DoctorBySpeciality;
use App\Livewire\DoctorListingComponent;
use App\Livewire\EditSpecialityForm;
use App\Livewire\FeaturedArticles;
use App\Livewire\FeaturedDoctors;
use App\Livewire\PatientArticlePage;
use App\Livewire\RecentAppointment;
use App\Livewire\SpecialitiesComponent;
use App\Livewire\SpecialityForm;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');



Route::group(['middleware' => 'patient'], function() {
    Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'patient'])
    ->name('dashboard');

    Route::get('/patient/my-appointment', )->name('my-appointment');

    Route::get('/articles', PatientArticlePage::class)->name('articles');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/doctor/dashboard', [DoctorController::class, 'loadDoctorDashboard'])
    ->middleware('doctor')
    ->name('doctor-dashboard');

Route::get('/filter-by-speciality/{id}', DoctorBySpeciality::class);


Route::group(['middleware' => 'admin'], function() {

    // Route::get('/admin/dashboard', [AdminController::class, 'loadAdminDashboard'])
    // ->name('admin-dashboard');

    // Route::get('/admin/doctors', [AdminController::class, 'loadDoctorListing'])
    // ->name('admin-doctors');

    // Route::get('/admin/create/doctor', [AdminController::class, 'loadDoctorForm']);

    // Route::get('/admin/specialities', [AdminController::class, 'loadAllSpecialities'])
    // ->name('admin-specialities');    
    
    // Route::get('/admin/create/specialites', [AdminController::class, 'loadSpecialitiesForm']);





    Route::get('/admin/dashboard', RecentAppointment::class)->name('admin-dashboard');

    Route::get('/admin/doctors', DoctorListingComponent::class)->name('admin-doctors');
    Route::get('/admin/doctors/create', DoctorCreate::class)->name('admin-doctors-create');
    Route::get('/admin/doctors/edit/{id}', DoctorCreate::class)->name('admin-doctors-edit');

    Route::get('/admin/specialities', SpecialitiesComponent::class)->name('admin-specialities'); 
    Route::get('/admin/specialites/create', SpecialityForm::class)->name('admin-specialities-create');
    Route::get('/admin/specialities/edit/{id}', EditSpecialityForm::class)->name('admin-specialities-edit');

});

require __DIR__.'/auth.php';
