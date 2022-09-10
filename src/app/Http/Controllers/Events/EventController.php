<?php

declare(strict_types=1);

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventListRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Services\Events\EventFetcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class EventController extends Controller
{
    public function __construct(
        private readonly EventFetcher $fetcher
    ) {
    }

    public function list(EventListRequest $request): AnonymousResourceCollection
    {
        $events = $this->fetcher->getList($request);

        return EventResource::collection($events);
    }

    public function show(Event $event): JsonResponse
    {
        return response()->json([
            'message' => 'Event successfully fetched.',
            'data'    => EventResource::make($event),
        ]);
    }
}
