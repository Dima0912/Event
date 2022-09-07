<?php

namespace App\Http\Controllers;

use App\Http\Request\CreateEventRequest;
use App\Http\Request\FilterEventRequest;
use App\Http\Request\UpdateEventRequest;
use App\Models\Event;
use App\Services\FilterEventsService;
use App\Services\UpdateEventsService;


class EventController extends Controller
{
    protected $user;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterEventsService $filter, FilterEventRequest $request)
    {
        return $filter->filterEvents($request);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $this->event->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $event = $this->event->find($id);

        return $event;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, UpdateEventsService $updateEventsService, int $id)
    {
        return $updateEventsService->updateEvents($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $event = $this->event->find($id);
        if ($event) {
            $event->delete();
        } else {
            abort(404);
        }
    }
}
