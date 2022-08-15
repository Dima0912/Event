<?php

namespace App\Services;

use App\Http\Request\UpdateEventRequest;
use App\Models\Event;
use App\Services\Contracts\UpdateEventsInterface;

class UpdateEventsService implements UpdateEventsInterface
{

    public function updateEvents(UpdateEventRequest $request, $id): void
    {
        $event = Event::find($id);
        if (isset($event)) {
            $event->update($request->validated());
        } else {
            abort(404);
        }

        if ($request->get('users')) {
            $event->users()->detach();
            foreach ($request->get('users') as $userId) {
                $event->users()->attach($userId);
            }
        }

    }
}
