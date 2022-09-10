<?php

declare(strict_types=1);

namespace App\Services\Events;

use App\Http\Requests\EventListRequest;
use App\Models\Event;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class EventFetcher
{
    public function getList(EventListRequest $request): LengthAwarePaginator
    {
        return QueryBuilder::for(Event::class, $request)
            ->allowedFilters([
                AllowedFilter::exact('status', 'event_status_id'),
                AllowedFilter::exact('organization', 'organization_id')
            ])
            ->with([
                'user'
            ])
            ->defaultSort('-id')
            ->paginate();
    }
}
