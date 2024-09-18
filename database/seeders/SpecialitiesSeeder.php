<?php

namespace Database\Seeders;

use App\Models\Specialities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialities = [
            'Dermatology',
            'Gynecology',
            'Cardiology',
            'Neurology',
            'Psychiatry'
        ];

        foreach ($specialities as $speciality) {
            Specialities::factory()->create([
                'name' => $speciality
            ]);
        }
    }
}
