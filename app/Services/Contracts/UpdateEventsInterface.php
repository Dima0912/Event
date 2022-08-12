<?php

namespace App\Services\Contracts;

use App\Http\Request\UpdateEventRequest;

interface UpdateEventsInterface
{
  public function updateEvents(UpdateEventRequest $request, $id);
}
