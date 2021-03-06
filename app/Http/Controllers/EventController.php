<?php

namespace App\Http\Controllers;

use App\Http\Request\CreateEventRequest;
use App\Http\Request\FilterEventRequest;
use App\Http\Request\UpdateEventRequest;
use App\Models\Event;
use App\Services\FilterEventsService;
use http\Client\Curl\User;


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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


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
        $event->date_aend = $request->post('date_end');
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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
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

        dd($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
    }
}
