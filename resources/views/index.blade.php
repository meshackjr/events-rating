<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body class="antialiased">
@include('layouts.nav')
<div class="bg-indigo-100 py-6 md:py-12">
        <div class="container px-4 mx-auto">

            <div class="text-center max-w-2xl mx-auto">
                <h1 class="text-3xl md:text-4xl font-medium mb-2">Ottap Events Rating!.</h1>
                <p class="text-gray-600 py-3">Rate from wide category of our events and stand a chance to get a discount up to 20% on your next ticket with ottap!</p>
{{--                <button class="bg-indigo-600 text-white py-2 px-6 rounded-full text-xl mt-6">Get Started</button>--}}
            </div>

            <div class="container">
                <div class="row">
{{--                    <h5 class="text-center font-bold my-4">Our Events Categories</h5>--}}
                    <div class="h-auto justify-center items-center my-6 flex">
                        @foreach($categories as $category)
                            <a href="{{ route('events', $category->id) }}"
                               class="capitalize px-6 py-3 mx-3 text-lg rounded-full font-semibold bg-yellow-200 hover:text-white hover:bg-dblue-900">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <h3 class="text-center font-bold my-12 text-3xl">Latest Events</h3>
                    <div class="h-auto grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 grid-flow-row gap-4 justify-center items-center">
                        @foreach($events as $event)
                            <a href="{{ route('event', $event->id) }}">
                                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url({{ $event->getImage() }}); background-size: cover; background-position: center;">
                                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                        <h2 class="pt-32 mt-5 mb-4 lh-1 fw-bold">{{ $event->name }}</h2>
                                        <ul class="d-flex list-unstyled mt-auto">
                                            {{--                                        <li class="me-auto bg-white p-3">--}}
                                            {{--                                            <img src="{{ asset('otapp_logo.png') }}" alt="Bootstrap" style="height: 32px; width: auto;" class="rounded-sm bg-white border border-white">--}}
                                            {{--                                        </li>--}}
                                            <li class="d-flex align-items-center me-3">
                                                <i class="fa fa-map-marker mx-2"></i>
                                                <small>{{ $event->location }}</small>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <i class="fa fa-calendar mx-2"></i>
                                                <small>{{ \Carbon\Carbon::make($event->date)->diffForHumans() }}</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="md:flex md:flex-wrap md:-mx-4 mt-6 md:mt-12">

                <div class="md:w-1/3 md:px-4 xl:px-6 mt-8 md:mt-0 text-center">
                    <span class="w-20 border-t-2 border-solid border-indigo-200 inline-block mb-3"></span>
                    <h5 class="text-xl font-medium uppercase mb-4">Fresh Design</h5>
                    <p class="text-gray-600">FWR blocks bring in an air of fresh design with their creative layouts and blocks, which are easily customizable</p>
                </div>

                <div class="md:w-1/3 md:px-4 xl:px-6 mt-8 md:mt-0 text-center">
                    <span class="w-20 border-t-2 border-solid border-indigo-200 inline-block mb-3"></span>
                    <h5 class="text-xl font-medium uppercase mb-4">Clean Code</h5>
                    <p class="text-gray-600">FWR blocks are the cleanest pieces of HTML blocks, which are built with utmost care to quality and usability.</p>
                </div>

                <div class="md:w-1/3 md:px-4 xl:px-6 mt-8 md:mt-0 text-center">
                    <span class="w-20 border-t-2 border-solid border-indigo-200 inline-block mb-3"></span>
                    <h5 class="text-xl font-medium uppercase mb-4">Perfect Tool</h5>
                    <p class="text-gray-600">FWR blocks is a perfect tool for designers, developers and agencies looking to create stunning websites in no time.</p>
                </div>

            </div>

        </div>
    </div>


</body>
</html>
