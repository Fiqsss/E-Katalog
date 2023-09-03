<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'level' => 'admin',
            'password' => '$2y$10$9.95cxswYFr1wbzCALpuxeQySNcXxQ52JqjDTC6hAzi5Y2EW2027G',
        ]);
    }
}