<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateOwner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'owner:create 
                            {--email=jpmc4434@gmail.com : The owner email}
                            {--name=John Paul Caigas : The owner name}
                            {--password=password123 : The owner password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create or update owner account';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email');
        $name = $this->option('name');
        $password = $this->option('password');

        // Check if user exists
        $user = User::where('email', $email)->first();

        if ($user) {
            // Update existing user to owner
            $user->is_owner = true;
            $user->name = $name;
            $user->password = Hash::make($password);
            $user->email_verified_at = now();
            $user->save();

            $this->info("✅ Owner account updated!");
        } else {
            // Create new owner
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'is_owner' => true,
                'email_verified_at' => now(),
            ]);

            $this->info("✅ Owner account created!");
        }

        $this->info("Email: {$email}");
        $this->info("Password: {$password}");
        $this->warn("⚠️  Please change the password after first login!");
    }
}
