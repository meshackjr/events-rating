<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body class="antialiased">
@include('layouts.nav')
<div class="bg-indigo-100">
    <div class="container mx-auto">
        @include('messages')
        <div class="container">
            <div class="row align-items-stretch py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                         style="background-image: url({{ $event->getImage() }}); background-position: center; background-size: contain;">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-32 mt-5 mb-4 display-6 lh-1 fw-bold">{{ $event->name }}</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto bg-white p-3">
                                    <img src="{{ asset('otapp_logo.png') }}" alt="Bootstrap"
                                         style="height: 32px; width: auto;"
                                         class="rounded-sm bg-white border border-white">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <i class="fa fa-map-marker mx-2"></i>
                                    <small>{{ $event->location }}</small>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="fa fa-calendar mx-2"></i>
                                    <small>{{ $event->getDate() }}</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="container">
            <div class="row py-5">
                <div class="col-md-12">
                    <h3 class="display-6 font-bold text-dblue-900"><i class="fa fa-sticky-note mr-3"></i> About this event!</h3>
                    <p class="my-4">{{ $event->description }}</p>
                </div>

                <div class="col-md-5">
                    <table>
                        <tr>
                            <td class="w-1/2 font-bold py-2">Location</td>
                            <td>{{ $event->location }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Date</td>
                            <td>{{ \Carbon\Carbon::make($event->date)->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Event Type</td>
                            <td>{{ $event->category->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Event Organizer</td>
                            <td>{{ $event->agent->name }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-4">
                    <h5 class="display-6 text-xl font-bold text-dblue-900"><i class="fa fa-share-alt mr-3"></i> Share This Event
                    </h5>

                    <div class="mt-2">
                        <button class="bg-yellow-200 rounded-full px-4 py-2  mx-auto mt-2" onclick="qrcode.downloadImage('qrcode')">
                            <i class="fa fa-share"></i> Share QR!
                        </button>
                        <a href="https://wa.me/?text={{ urlencode($event->name) }}" target="_blank" class="bg-yellow-200 rounded-full px-4 py-3  mx-auto mt-2">
                            <i class="fa fa-whatsapp"></i> Whatsapp
                        </a>

                    </div>

                </div>
                <div class="col-md-3">
                    <canvas id="canvas"></canvas>
                </div>

                <div class="col-md-12">
                    <h3 class="display-6 font-bold mt-12 text-center text-dblue-900"><i class="fa fa-commenting mr-1"></i> Rate our event!</h3>
{{--                    <p class="my-4">Help us improve on our future events. Let us know how wa this event experience to--}}
{{--                        you!</p>--}}
                    <form method="POST" action="{{ route('event.review', $event->id) }}">
                        @csrf
                    <div class="form-group">
                        <div class="rating">


                            <input style=" display: none !important;" type="radio" name="rating" value="5" id="5" required><label
                                for="5">☆</label>
                            <input style=" display: none !important;" type="radio" name="rating" value="4" id="4"><label
                                for="4">☆</label>
                            <input style=" display: none !important;" type="radio" name="rating" value="3" id="3"><label
                                for="3">☆</label>
                            <input style=" display: none !important;" type="radio" name="rating" value="2" id="2"><label
                                for="2">☆</label>
                            <input style=" display: none !important;" type="radio" name="rating" value="1" id="1"><label
                                for="1">☆</label>



                        </div>
                    </div>
                    <div class=" md:mx-32 my-2">
                        <h5 class="text-center">Write your review!</h5><br>
                        <textarea name="review" class="form-control" rows="7" placeholder="I was impressed by the...." required></textarea>
                    </div>

                    <p class="my-4 text-center">Help us improve on our future events by taking telling us about your experience on this event!</p>

                    @if($event->questions->count())
                        @foreach($event->questions as $question)
                            <div class=" md:mx-32 my-4">
                                <h5 class=" font-bold">{{ $loop->iteration }}. {{ $question->question }}</h5><br>
                                @if($question->type == 'short')
                                    <input type="text" name="{{ $question->id }}" class="form-control" required>
                                @elseif($question->type == 'long')
                                    <textarea required name="{{ $question->id }}" class="form-control" rows="7" placeholder="I was impressed by the...."></textarea>
                                @elseif($question->type == 'options')
{{--                                    {{ $question->options }}--}}
                                    @php($options = explode(';', $question->options))
                                    <select name="{{ $question->id }}" class="form-control" required>
                                        @foreach($options as $option)
                                            <option>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        @endforeach
                    @endif
                    <div class="md:mx-32 my-4">
                        <button class="ot-btn">Submit Review!</button>
                    </div>
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <h3 class="text-center font-bold my-12 text-3xl">Other events like this!</h3>
                    {{--                    <div class="h-auto grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 grid-flow-row gap-4 justify-center items-center">--}}
                    @foreach($otherEvents as $event)
                        <div class="col-md-4 my-4">
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
                        </div>
                    @endforeach
                    {{--                    </div>--}}
                </div>
            </div>

            <div class="md:flex md:flex-wrap md:-mx-4 p-12 pb-32 md:mt-12">

                @include('layouts.footer')

            </div>

        </div>
    </div>
</div>
{{--<script type="text/javascript" src="{{ asset('qrious-master/dist/qrious.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('qrcode-with-logos-master/doc/qrcode-with-logo.min.js') }}"></script>
<script type="text/javascript">
    {{--var qr = new QRious({--}}
    {{--    element: document.querySelector('canvas'),--}}
    {{--    value: '{{ route('event', $event->id) }}'--}}
    {{--});--}}
    window.qrcode = new QrCodeWithLogo({
        canvas: document.getElementById("canvas"),
        content: "http:{{ route('event', $event->id) }}",
        width: 180,
        download: true,
        // image: document.getElementById("image"),
        logo: {
            src: "{{ asset('images/otapp_logo_1.png') }}"
        }
    });
    qrcode.toCanvas().then(() => {
        // qrcode.toImage().then(() => {
        //     qrcode.downloadImage("hello world");
        // });
    });
</script>
</body>
</html>
