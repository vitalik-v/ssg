<?php

declare(strict_types=1);

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Actions\Events\GetEvents;
use App\Models\Event;
use App\Models\EventStatuses;
use App\Models\Office;
use App\Models\Picture;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\EventRequest;

final class EventController extends Controller
{
    public function add(GetEvents $repository)
    {
        $offices = Office::all();
        $topics = Topic::all();
        return view('events.add', compact('offices', 'topics'));
    }

    public function addEvent(EventRequest $request)
    {
        $event = new Event();
        $event->title = $request->input('eventTitle');
        $event->body = $request->input('eventTitle');
        $event->user_id = Auth::user()->id;
        $event->office_id = $request->input('eventOffice');
        $event->topic_id = $request->input('eventCategory');
        $event->slug = Str::slug($request->input('eventTitle'));
        $event->event_status_id = EventStatuses::where('code', 'unpublished')->first()->id;
        $event->like = 0;
        $event_id = $event->save();

        return redirect()->route('add.event');
    }

    public function list(GetEvents $repository)
    {
        $lists = $repository->list();
        return view('events.list', compact('lists'));
    }

    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('events.detail', compact('event'));
    }

    public function assessment(GetEvents $repository)
    {
        $user = Auth::user()->id;
        $lists = $repository->assessment($user);
        return view('events.assessment', compact('lists'));
    }
}
