<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'test_user';
        $user->email = 'test_user@gmail.com';
        $user->email_verified_at = null;
        $user->password = Hash::make('admin1234');
        $user->remember_token = null;
        $user->save();

        // Factories
        // User::factory(5)->create();
    }
}
