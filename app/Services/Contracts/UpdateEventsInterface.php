<?php

namespace App\Services\Contracts;

use App\Http\Request\UpdateEventRequest;

interface UpdateEventsInterface
{
  public function update_events(UpdateEventRequest $request, $id);
}
