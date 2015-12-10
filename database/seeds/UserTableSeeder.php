<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \CodeCommerce\User::truncate();

        \CodeCommerce\User::create([
            'name' => 'Wesley',
            'email' => 'wesley@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make(123456),
            'is_admin' => 0,
        ]);

        \CodeCommerce\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make(123456),
            'is_admin' => 1,
        ]);

        factory('CodeCommerce\User', 5)->create();

    }
}
