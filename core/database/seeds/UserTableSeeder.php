<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ]);
    }
}
