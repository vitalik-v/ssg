<?php

namespace App\Actions\Events;

use App\Models\Event;
use App\Models\EventStatuses;
use Illuminate\Database\Eloquent\Collection;

class GetEvents
{
    /**
     * Список опубликованных ивентов
     *
     * @return \App\Models\Event[]
     */
    public function list(): Collection
    {
        $statusId = EventStatuses::where('code', 'published')->first()->id;
        return Event::where('event_status_id', $statusId)->get();
    }

    /**
     * Список не опубликованных ивентов
     *
     * @return \App\Models\Event[]
     */
    public function assessment(int $user_id): Collection
    {
        $statusId = EventStatuses::where('code', 'unpublished')->first()->id;
        $events = Event::where('event_status_id', $statusId)->whereHas('points', function($query) use ($user_id) {
            $query->where('user_id', '!=', $user_id);
        })->get();
        return $events;
    }
}
