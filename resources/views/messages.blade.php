@if(session()->has('success'))
    <div class="alert alert-success my-2">
        {{ session()->get('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger my-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session()->has('error'))
    <div class="alert alert-danger my-2">
        {{ session()->get('error') }}
    </div>
@endif
