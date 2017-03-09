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
            'name'     => 'test',
            'username' => 'test',
            'email'    => 'test@unomaha.edu',
            'password' => bcrypt('tester'),
            'role' => 0
        ]);

        \App\User::create([
            'name'     => 'admin',
            'username' => 'admin',
            'email'    => 'test@unomaha.edu',
            'password' => bcrypt('tester'),
            'role' => 1
        ]);
    }
}
