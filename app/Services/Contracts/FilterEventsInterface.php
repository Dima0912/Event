<?php

namespace App\Services\Contracts;

use App\Http\Request\FilterEventRequest;
use App\Models\Event;

interface FilterEventsInterface
{
    public function filter_events(FilterEventRequest $request);
}
