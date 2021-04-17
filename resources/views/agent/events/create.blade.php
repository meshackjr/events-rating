@extends('agent.layouts.master')

@section('content')
    <div class="container">
        <h3 class="mb-3">New Event</h3>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('agent.events.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-4">
                        <div class="form-group col-md-6">
                            <label>Title</label>
                            <input class="form-control" name="title" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Categories</label>
                            <select name="event_category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="row my-4">
                        <div class="form-group col-md-6">
                            <label>Location</label>
                            <input class="form-control" name="location" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date</label>
                            <input type="datetime-local" class="form-control" name="date">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="form-group col-md-6">
                            <label>Banner Image</label>
                            <input class="form-control-file" type="file" name="banner">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus-circle"></i> Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
