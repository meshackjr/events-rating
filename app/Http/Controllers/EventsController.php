<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\EventCategory;
use App\Models\Rate;
use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $category)
    {
        $events = Event::where('event_category_id', $category)->orderBy('date')->paginate(9);
        $categoryname = EventCategory::find($category)->first()->name;

        return view('events', compact('events', 'categoryname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($eventId)
    {
        $event = Event::find($eventId);
        $otherEvents = Event::where('event_category_id', $event->event_category_id)->take(3)->get();

        return view('event', compact('event', 'otherEvents'));
    }

    public function storeReview(Request $request, $eventId){
        $event = Event::find($eventId);
        $agent = $event->agent;

        Rate::create([
            'rate' => $request->rating,
            'review' => $request->review,
            'event_id' => $eventId,
            'agent_id' => $agent->id,
        ]);

        foreach ($event->questions as $question){
            Answer::create([
                'question_id' => $question->id,
                'event_id' => $eventId,
                'answer' => $request->get($question->id),
                'agent_id' => $agent->id,
            ]);
        }

        session()->flash('success', 'Thank you for submitting your review!');
        return redirect()->route('event', $eventId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
