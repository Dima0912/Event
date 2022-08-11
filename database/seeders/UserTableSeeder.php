<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Dima',
                'surname' => 'Mirny',
                'phone' => '+380933323827',
                'email' => 'mirnydimas@gmail.com',
                'password' => bcrypt('secret'),
            ],

            [
                'name' => 'Alex',
                'surname' => 'sde',
                'phone' => '+380932334888',
                'email' => 'mirnydmisds@gmail.com',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}
