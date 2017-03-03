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
            'name'     => 'OFDEMP',
            'username' => 'OFDEMP',
            'email'    => 'aorgodol@unomaha.edu',
            'password' => bcrypt('devcap')
        ]);
    }
}
