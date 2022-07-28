<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $with = ['users'];

    public function users(){

        return $this->belongsToMany(User::class, 'users_events', 'user_id', 'event_id');

    }
}
