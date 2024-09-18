<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = ['doctors_id']; 

    public function speciality() {
        return $this->belongsTo(Specialities::class, 'speciality_id');
    }

    public function doctorUser() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
