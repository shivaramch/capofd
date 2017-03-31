<?php

use Illuminate\Database\Seeder;

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
