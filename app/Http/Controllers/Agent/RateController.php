<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{

    public function index()
    {
        $rates = Rate::all();
        return view('agent.ratings', compact('rates'));
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

    public function show($id)
    {
        $rates = Rate::where('event_id', $id)->get();
        $event = Event::find($id);

        $total_rating_no = $event->rates->count();
        $sum = 0;
        foreach ($event->rates as $rate){
            $sum += $rate->rate;
        }
        $average_rating = $sum / $total_rating_no;

        return view('agent.ratings-single', compact('rates', 'event', 'total_rating_no', 'average_rating'));
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
