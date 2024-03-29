<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // create admin
        User::create([
            'name'     => 'Super Admin',
            'email'    => 'super_admin@gmail.com',
            'password' => Hash::make(12345678),
        ]);
    }
}
