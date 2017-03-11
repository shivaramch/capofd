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
            'roleid'   => '0',
        ]);
        \App\User::create([
            'name'     => 'varun',
            'username' => 'vhegde',
            'email'    => 'vhegde@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '0',
        ]);

        \App\User::create([
            'name'     => 'sriram',
            'username' => 'ssrinivas',
            'email'    => 'sriramsrinivas@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '1',
        ]);
        \App\User::create([
            'name'     => 'shivaram',
            'username' => 'schennapragada',
            'email'    => 'schennapragada@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '0',
        ]);
        \App\User::create([
            'name'     => 'anirudh',
            'username' => 'aprayagaramasubrah',
            'email'    => 'aprayagaramasubrah@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '0',
        ]);
        \App\User::create([
            'name'     => 'brian',
            'username' => 'bwilkins',
            'email'    => 'bwilkins@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '0',
        ]);
        \App\User::create([
            'name'     => 'sweta',
            'username' => 'spadvi',
            'email'    => 'spadvi@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '0',
        ]);
        \App\User::create([
            'name'     => 'surya',
            'username' => 'spmereddy',
            'email'    => 'spmereddy@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '1',
        ]);
        \App\User::create([
            'name'     => 'mahita',
            'username' => 'mahitagona',
            'email'    => 'mahitagona@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '0',
        ]);

        \App\User::create([
            'name'     => 'navya',
            'username' => 'nkaruturi',
            'email'    => 'nkaruturi@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '0',
        ]);

        \App\User::create([
            'name'     => 'kiran',
            'username' => 'vbadugu',
            'email'    => 'vbadugu@unomaha',
            'password' => bcrypt('tester'),
            'roleid'   => '0',
        ]);

        \App\User::create([
            'name'     => 'vineeth',
            'username' => 'vmaryada',
            'email'    => 'vmaryada@unomaha.edu',
            'password' => bcrypt('tester'),
            'roleid'   => '0',
        ]);

    }
}