<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Inspector',
                'email' => 'inspector@example.com',
                'password' => Hash::make('password'),
            ],
        ];
        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']],
                $user
            );
        }

        $admin = User::where('email', 'admin@example.com')->first();
        if ($admin && !$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        $inspector = User::where('email', 'inspector@example.com')->first();
        if ($inspector && !$inspector->hasRole('inspector')) {
            $inspector->assignRole('inspector');
        }
    }
}
