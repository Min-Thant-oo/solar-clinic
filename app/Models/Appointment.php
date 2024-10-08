<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'appointment_date',
        'appointment_time',
    ];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function patient() {
        // appointments table mr shi tae 'patient_id' nae User Model nae chate tae. 
        return $this->belongsTo(User::class, 'patient_id');
    }   

    public function scopeSearch($query, $value) {
        return $query->whereHas('doctor.doctorUser', function($q) use ($value) {
                $q->where('name', 'like', "%{$value}%")
                  ->orWhere('email', 'like', "%{$value}%");
            })
            ->orWhereHas('patient', function($q) use ($value) {
                $q->where('name', 'like', "%{$value}%")
                  ->orWhere('email', 'like', "%{$value}%");
            });
    }
    
}
