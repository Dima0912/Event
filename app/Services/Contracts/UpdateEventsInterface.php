<?php

namespace App\Services\Contracts;

use App\Http\Request\UpdateEventRequest;
use App\Models\Event;

interface UpdateEventsInterface
{
  public function updateEvents(UpdateEventRequest $request, $id);
}
