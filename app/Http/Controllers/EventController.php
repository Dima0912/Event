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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterEventsService $filter, FilterEventRequest $request)
    {
        return $filter->filter_events($request);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $event = new Event();
        $event->title = $request->post('title');
        $event->date_start = $request->post('date_start');
        $event->date_end = $request->post('date_end');
        $event->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, int $id)
    {
        $event = Event::find($id);

        return $event;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, UpdateEventsService $updateEventsService, $id)
    {
        return $updateEventsService->update_events($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
        }
    }
}
