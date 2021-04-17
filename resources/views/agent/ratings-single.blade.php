@extends('agent.layouts.master')

@section('content')

    <div class="container">
        <h3 class="mb-3">Ratings Summary</h3>
        <div class="row mb-3">
            <div class="col-md-3 bg-yellow-200 p-4 mx-1 rounded-lg text-dblue-900">
                <h5 class="mb-3">Total Ratings Number</h5>
                <p class="text-6xl font-black text-right">{{ $total_rating_no }}</p>
            </div>
            <div class="col-md-3 bg-yellow-200 p-4 mx-1 rounded-lg text-dblue-900">
                <h5 class="mb-3">Average Rating</h5>
                <p class="text-6xl font-black text-right">{{ $average_rating }}
                    @for($i = 0; $i < $rate->rate; $i++)
                        <i class="fa fa-star"></i>
                    @endfor
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="mb-3">Ratings</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover  text-sm">
                    <thead>
                    <tr class="table-primary">
                        <th scope="col" width="10">#</th>
                        <th scope="col" style="width: 20%">Event Name</th>
                        <th scope="col" style="width: 10%">Rating</th>
                        <th scope="col">Review</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rates as $rate)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $rate->event->name }}</td>
                            <td>
                                @for($i = 0; $i < $rate->rate; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </td>
                            <td>{{ $rate->review }}</td>
                            <td class="text-nowrap">
                                {{--                                    <a href="#" class="btn d-inline-block"><i class="fa fa-pencil"></i></a>--}}
                                {{--                                    <a href="#" class="btn text-danger d-inline-block"><i class="fa fa-trash"></i></a>--}}
                                {{--                                <a href="{{ route('agent.questions.create', $event->id) }}" class="btn text-danger d-inline-block" title="Create Event Review Questions"><i class="fa fa-comment-o"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--            {{ $events->onEachSide(5)->links() }}--}}
        </div>
    </div>
@endsection
