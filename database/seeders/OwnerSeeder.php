<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if owner already exists
        $ownerExists = User::where('is_owner', true)->exists();

        if (!$ownerExists) {
            User::create([
                'name' => 'John Paul Caigas',
                'email' => 'jpmc4434@gmail.com',
                'password' => Hash::make('password123'), // Change this to a secure password
                'is_owner' => true,
                'email_verified_at' => now(),
            ]);

            $this->command->info('Owner account created successfully!');
            $this->command->info('Email: jpmc4434@gmail.com');
            $this->command->info('Password: password123');
            $this->command->warn('⚠️  Please change the password after first login!');
        } else {
            $this->command->info('Owner account already exists.');
        }
    }
}
