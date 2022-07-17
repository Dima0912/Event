<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'title' => 'New Year',
                'date_start' => '2022.12.23:00',
                'date_end' => '2023.01.7:00',
            ],

            [
                'title' => 'Year',
                'date_start' => '2023.10.13:00',
                'date_end' => '2024.11.17:00',
            ],

        ]);
    }
}
