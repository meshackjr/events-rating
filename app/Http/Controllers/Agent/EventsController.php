<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth('agent')->user()->id;
        $events = Event::where('agent_id', $id)->latest()->paginate(10);

        return view('agent.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories  = EventCategory::paginate();
        return view('agent.events.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $banner = $request->file('banner')->store('banners');
        $id = auth('agent')->user()->id;

        Event::create([
            'event_category_id' => $request->event_category_id,
            'agent_id' => $id,
            'name' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'banner' => $banner
        ]);

        return redirect()->route('agent.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
