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
            'password' => bcrypt('tester')
        ]);
    }
}
