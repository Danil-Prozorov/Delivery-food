<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class testsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert(
            [
                'user_id' => 1,
                'total_price' => 1500,
                'address' => 'st Semenko, house №32',
                'status' => 'In proccess'
            ]
        );
    }
}
