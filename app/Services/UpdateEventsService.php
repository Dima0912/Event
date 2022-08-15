<?php

namespace App\Services;

use App\Http\Request\UpdateEventRequest;
use App\Models\Event;
use App\Services\Contracts\UpdateEventsInterface;

class UpdateEventsService implements UpdateEventsInterface
{

    public function updateEvents(UpdateEventRequest $request, $id)
    {
        $event = Event::find($id);
        if (empty($event)){
            abort(404);
        }
        $event->update($request->validated());
        if ($request->get('users')) {
            $event->users()->detach();
            foreach ($request->get('users') as $userId) {
                $event->users()->attach($userId);
            }
        }

    }
}
