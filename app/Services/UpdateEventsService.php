<?php

namespace App\Services;

use App\Http\Request\UpdateEventRequest;
use App\Models\Event;
use App\Services\Contracts\UpdateEventsInterface;

class UpdateEventsService implements UpdateEventsInterface
{

    public function update_events(UpdateEventRequest $request, $id)
    {
        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->date_start = $request->input('date_start');
        $event->date_end = $request->input('date_end');
        $event->save();
        if ($request->get('users')) {
            $event->users()->detach();
            foreach ($request->get('users') as $userId) {
                $event->users()->attach($userId);
            }
        }
    }
}