<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'General User',
            'username' => 'user',
            'email' => 'user@user.com',
            'phone' => '01303040637',
            'address' => 'Uttara, Dhaka',
            'city' => 'Dhaka',
            'postcode' => '1230',
            'slug' => Str::slug('user'),
            'password' => Hash::make('user'),
        ]);
    }
}
