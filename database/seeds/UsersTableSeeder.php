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
class StatusTableSeeder extends Seeder
{


    public function run()
    {
        DB::table('status')->insert(['statustype' => 'Draft', ]);
        DB::table('status')->insert(['statustype' => 'Application under Captain',]);
        DB::table('status')->insert(['statustype' => 'Application under Batallion Chief',]);
        DB::table('status')->insert(['statustype' =>'Application under Assistant Chief',]);
        DB::table('status')->insert(['statustype' =>'Rejected',]);
        DB::table('status')->insert(['statustype' =>'Approved',]);
        DB::table('status')->insert(['statustype' =>'Application under Primary IDCO',]);

    }
}

class AssignmentsTableSeeder extends Seeder

{
    public function run()
    {
        DB::table('assignments')->insert(['assignment' => 'B1', ]);
        DB::table('assignments')->insert(['assignment' => 'B2', ]);
        DB::table('assignments')->insert(['assignment' => 'B3', ]);
        DB::table('assignments')->insert(['assignment' => 'B4', ]);
        DB::table('assignments')->insert(['assignment' => 'B5', ]);
        DB::table('assignments')->insert(['assignment' => 'B6', ]);
        DB::table('assignments')->insert(['assignment' => 'B7', ]);
        DB::table('assignments')->insert(['assignment' => 'E1', ]);
        DB::table('assignments')->insert(['assignment' => 'E21', ]);
        DB::table('assignments')->insert(['assignment' => 'E22', ]);
        DB::table('assignments')->insert(['assignment' => 'E23', ]);
        DB::table('assignments')->insert(['assignment' => 'E3', ]);
        DB::table('assignments')->insert(['assignment' => 'E30', ]);
        DB::table('assignments')->insert(['assignment' => 'E31', ]);
        DB::table('assignments')->insert(['assignment' => 'E33', ]);
        DB::table('assignments')->insert(['assignment' => 'E34', ]);
        DB::table('assignments')->insert(['assignment' => 'E41', ]);
        DB::table('assignments')->insert(['assignment' => 'E42', ]);
        DB::table('assignments')->insert(['assignment' => 'E43', ]);
        DB::table('assignments')->insert(['assignment' => 'E5', ]);
        DB::table('assignments')->insert(['assignment' => 'E52', ]);
        DB::table('assignments')->insert(['assignment' => 'E53', ]);
        DB::table('assignments')->insert(['assignment' => 'E56', ]);
        DB::table('assignments')->insert(['assignment' => 'E60', ]);
        DB::table('assignments')->insert(['assignment' => 'E61', ]);
        DB::table('assignments')->insert(['assignment' => 'E63', ]);
        DB::table('assignments')->insert(['assignment' => 'E71', ]);
        DB::table('assignments')->insert(['assignment' => 'E77', ]);
        DB::table('assignments')->insert(['assignment' => 'E78', ]);
        DB::table('assignments')->insert(['assignment' => 'EMSD', ]);
        DB::table('assignments')->insert(['assignment' => 'FC2A', ]);
        DB::table('assignments')->insert(['assignment' => 'FC2B', ]);
        DB::table('assignments')->insert(['assignment' => 'FIU', ]);
        DB::table('assignments')->insert(['assignment' => 'FPD', ]);
        DB::table('assignments')->insert(['assignment' => 'IA', ]);
        DB::table('assignments')->insert(['assignment' => 'M1', ]);
        DB::table('assignments')->insert(['assignment' => 'M21', ]);
        DB::table('assignments')->insert(['assignment' => 'M24', ]);
        DB::table('assignments')->insert(['assignment' => 'M3', ]);
        DB::table('assignments')->insert(['assignment' => 'M31', ]);
        DB::table('assignments')->insert(['assignment' => 'M34', ]);
        DB::table('assignments')->insert(['assignment' => 'M41', ]);
        DB::table('assignments')->insert(['assignment' => 'M42', ]);
        DB::table('assignments')->insert(['assignment' => 'M5', ]);
        DB::table('assignments')->insert(['assignment' => 'M52', ]);
        DB::table('assignments')->insert(['assignment' => 'M56', ]);
        DB::table('assignments')->insert(['assignment' => 'M61', ]);
        DB::table('assignments')->insert(['assignment' => 'M65', ]);
        DB::table('assignments')->insert(['assignment' => 'M71', ]);
        DB::table('assignments')->insert(['assignment' => 'M77', ]);
        DB::table('assignments')->insert(['assignment' => 'R1', ]);
        DB::table('assignments')->insert(['assignment' => 'R2', ]);
        DB::table('assignments')->insert(['assignment' => 'R30', ]);
        DB::table('assignments')->insert(['assignment' => 'R33', ]);
        DB::table('assignments')->insert(['assignment' => 'R51', ]);
        DB::table('assignments')->insert(['assignment' => 'SUPV1', ]);
        DB::table('assignments')->insert(['assignment' => 'SWD', ]);
        DB::table('assignments')->insert(['assignment' => 'TR1', ]);
        DB::table('assignments')->insert(['assignment' => 'TR21', ]);
        DB::table('assignments')->insert(['assignment' => 'TR31', ]);
        DB::table('assignments')->insert(['assignment' => 'TR34', ]);
        DB::table('assignments')->insert(['assignment' => 'TR41', ]);
        DB::table('assignments')->insert(['assignment' => 'TR53', ]);
        DB::table('assignments')->insert(['assignment' => 'TR61', ]);
        DB::table('assignments')->insert(['assignment' => 'TR63', ]);
        DB::table('assignments')->insert(['assignment' => 'TR78', ]);
        DB::table('assignments')->insert(['assignment' => 'TRNG', ]);
        DB::table('assignments')->insert(['assignment' => 'TSD', ]);
        DB::table('assignments')->insert(['assignment' => 'WT77', ]);

    }
}


