<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body class="antialiased">
@include('layouts.nav')
<div class="bg-indigo-100 py-6 md:py-12">
        <div class="container px-4 mx-auto">

            <div class="text-center max-w-2xl mx-auto">
                <h1 class="text-3xl md:text-4xl font-medium mb-4">Ottap {{ $categoryname }} Events!.</h1>
{{--                <p class="text-gray-600 py-6">Rate from wide category of our events and stand a chance to get a discount up to 20% on your next ticket with ottap!</p>--}}
                {{--                <button class="bg-indigo-600 text-white py-2 px-6 rounded-full text-xl mt-6">Get Started</button>--}}
            </div>

            <div class="container">
                <div class="row">
                    <div class="h-auto grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 grid-flow-row gap-2 justify-center items-center">
                        @foreach($events as $event)
                            <div class="m-4 hover:bg-dblue-100 flex justify-center items-center font-semibold h-32 border rounded-md bg-indigo-200">
                                <a href="{{ route('event', $event->id) }}"
                                   class="capitalize px-2 py-12 text-lg text-dblue-900 font-semibold">
                                    {{ $event->name }}
                                </a>
                            </div>
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
