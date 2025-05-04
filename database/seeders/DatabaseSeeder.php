<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional: create multiple fake users using factory
        // User::factory(10)->create();

        // Create a specific user with required fields
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '09171234567',
            'store_name' => 'Test Store',
            'password' => Hash::make('password'),
            'account_status_id' => 1, // Make sure this exists in your DB
            'tiers_id' => 1,          // Also make sure this exists
        ]);
    }
}
