<?php

namespace App\Services\Contracts;

use App\Http\Request\FilterEventRequest;
use App\Models\Event;
use App\Models\User;

interface FilterEventsInterface
{
    public function filterEvents(FilterEventRequest $request);
}
