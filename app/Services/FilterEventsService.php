<?php

namespace App\Services;

use App\Http\Request\FilterEventRequest;
use App\Models\Event;
use App\Services\Contracts\FilterEventsInterface;
use Illuminate\Support\Facades\Auth;

class FilterEventsService implements FilterEventsInterface
{

    public function filter_events(FilterEventRequest $request)
    {
        $data = $request->validated();
        $query = Event::query();
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
