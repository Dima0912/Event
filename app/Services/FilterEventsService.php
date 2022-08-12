<?php

namespace App\Services;

use App\Http\Request\FilterEventRequest;
use App\Models\Event;
use App\Models\User;
use App\Services\Contracts\FilterEventsInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilterEventsService implements FilterEventsInterface
{

    public function filterEvents(FilterEventRequest $request)
    {
        $data = $request->validated();
        $query = Event::query()->with('users')
            ->leftJoin('users_events', 'id', '=', 'event_id')
            ->where('event_id', '=', Auth::id());

        if (isset($data['date_start'])) {
            $query->where('date_start', $data['date_start']);
        }
        if (isset($data['date_end'])) {
            $query->where('date_end', $data['date_end']);
        }

        $post = $query->get();

        return $post;

    }
}
