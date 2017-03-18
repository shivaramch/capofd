<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusTableSeeder::class);
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

    }
}