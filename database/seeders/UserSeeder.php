<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Patient',
            'email' => 'test@example.com',
            'role' => 0
        ]);

        User::factory()->create([
            'name' => 'Doctor',
            'email' => 'mr.gentleboy22@gmail.com',
            'role' => 1
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'minthantoo.ardil@gmail.com',
            'role' => 2
        ]);
    }
}
