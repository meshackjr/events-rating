<div class="header-2">
    <nav class="bg-white py-2 md:py-4">
        <div class="container px-4 mx-auto md:flex md:items-center">

            <div class="flex justify-between items-center">
                <img src="{{ asset('images/otapp_logo_1.png') }}" class="h-12 mr-2"><a href="{{ route('home') }}" class="font-bold text-xl text-dblue-900 no-underline">Ottap Events Rating</a>
                <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" id="navbar-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 mb-3 md:mt-0" id="navbar-collapse">
                <a href="{{ route('agent.events.create') }}" class="ot-btn"><i class="fa fa-plus-circle mr-2"></i> Create Event</a>

{{--            @if (Route::has('login'))--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/dashboard') }}" class="ot-btn">Dashboard</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('agent.login') }}" class="ot-btn">Log in</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" class="ot-btn">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                @endif--}}
            </div>
        </div>
    </nav>
</div>
