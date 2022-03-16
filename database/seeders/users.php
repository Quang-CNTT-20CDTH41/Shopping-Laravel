<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin 1',
                'email' => 'admin1@gmail.com',
                'phone' => '0372643522',
                'admin' => true,
                'password' => bcrypt(11111111),
            ],
        );
    }
}
