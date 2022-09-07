<?php

namespace App\Services;

use App\Http\Request\UpdateEventRequest;
use App\Models\Event;
use App\Services\Contracts\UpdateEventsInterface;

class UpdateEventsService implements UpdateEventsInterface
{
    protected $event;

    public function __construct(Event $event)
    {
       $this->event = $event;
    }

    public function updateEvents(UpdateEventRequest $request, $id): void
    {
       $event = $this->event->find($id);
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
