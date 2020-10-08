<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Syafrial Zulmi',
            'username' => 'syafrialzulmi',
            'password' => bcrypt('12345678'),
            'email' => 'syafrialzulmi@gmail.com',
        ]);
    }
}
