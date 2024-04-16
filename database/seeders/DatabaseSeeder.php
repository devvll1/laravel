<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        //\App\Models\User::factory()->create([
        //      'name' => 'Test User',
        //      'email' => 'test@example.com',
        //  ]);

        // \App\Models\Gender::factory()->create([
        //     'gender' => 'Male'
        //  ]);

        //  \App\Models\Gender::factory()->create([
        //     'gender' => 'Female'
        //  ]);

        //  \App\Models\User::factory(100)->create();

         User::create([
            'first_name' => 'John',
            'middle_name' => 'Doe',
            'last_name' => 'Smith',
            'suffix_name' => 'Jr.',
            'birth_date' => '1990-01-01',
            'gender_id' => 1,  // Assuming the gender_id for male is 1
            'address' => '123 Main St, City, Country',
            'contact_number' => '1234567890',
            'email' => 'john.doe@example.com',
            'username' => 'admin',
            'password' => Hash::make('1234'),
        ]);
    }
}
