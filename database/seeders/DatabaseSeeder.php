<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
               'name' => 'JC',
               'id' => '1',
               'email' => 'jlunardini@me.com',
               'password' => bcrypt('eminem94'),
           ]);

        DB::table('threads')->insert([
            'id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Naked & Famous',
            'size' => '28',
            'style' => 'Cobra Black',
            'purchased' => '2020',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'jeans',
        ]);

        DB::table('threads')->insert([
                'id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'brand' => 'Gliden',
                'size' => 'S',
                'style' => 'Black V-Neck',
                'purchased' => '2021',
                'worn' => '0',
                'washed' => '0',
                'user_id' => '1',
                'category' => 'tops',
            ]);
    }
}
