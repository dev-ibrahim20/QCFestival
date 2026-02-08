<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'test@test.com'],
            [
                'name' => 'Test Admin',
                'email' => 'test@test.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
            ]
        );

        // Assign admin role
        $admin->assignRole('Admin');

        $this->command->info('✓ Test admin user created successfully!');
        $this->command->info('Email: test@test.com');
        $this->command->info('Password: test1234');
    }
}
