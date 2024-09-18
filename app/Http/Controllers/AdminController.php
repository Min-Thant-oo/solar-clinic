<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loadAdmindashboard() {
        return view('admin.dashboard');
    }
    
    public function loadDoctorListing() {
        return view('admin.doctor-listing');
    }

    public function loadDoctorForm(){
        return view('admin.doctor-form');
    }

    public function loadAllSpecialities() {
        return view('admin.specialities');
    }

    public function loadSpecialitiesForm() {
        return view('admin.speciality-form');
    }

}
