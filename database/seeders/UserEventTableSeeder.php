<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserEventTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users_events')->insert([
            [
                "user_id" => User::whereNotNull('id')->first()->id,
                "event_id" => Event::whereNotNull('id')->first()->id,
            ],
        ]);
    }
}
