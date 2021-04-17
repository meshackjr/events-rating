@extends('agent.layouts.master')

@section('content')
    <div class="container">
        <h3 class="mb-3">Events</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover  text-sm">
                    <thead>
                    <tr class="table-primary">
                        <th scope="col" width="10">#</th>
                        <th scope="col" style="width: 20%">Event Name</th>
                        <th scope="col" style="width: 20%">Date</th>
                        <th scope="col">Organizer</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->description }}</td>
                                <td class="text-nowrap">
{{--                                    <a href="#" class="btn d-inline-block"><i class="fa fa-pencil"></i></a>--}}
{{--                                    <a href="#" class="btn text-danger d-inline-block"><i class="fa fa-trash"></i></a>--}}
                                    <a href="{{ route('agent.questions.create', $event->id) }}" class="btn text-danger d-inline-block" title="Create Event Review Questions"><i class="fa fa-comment-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $events->onEachSide(5)->links() }}
        </div>
    </div>
@endsection
