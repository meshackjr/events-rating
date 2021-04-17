@extends('agent.layouts.master')

@section('content')
    <div class="container">
        <h3 class="mb-3">New Event</h3>
        <div class="row">
            <div class="col-md-12">
                <livewire:questions :eventId="$event_id"></livewire:questions>
            </div>
        </div>
    </div>
@endsection
