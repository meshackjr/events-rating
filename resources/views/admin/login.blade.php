@extends('layouts.app')

@section('name', 'Agent Login')

@section('content')
    <main class="py-4 flex flex-col justify-center items-center">
        <form class='w-96 h-96  flex flex-col justify-center items-center'
        action="{{ route('admin.login') }}"
          method="POST"
    >
        @csrf
        <p class='text-3xl text-extrabold text-black '>Otapp Admin Login</p>
            @if ($errors->any())
                <div class="text-red-600 bg-red-200 px-6 py-2 my-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input
                type='text'
                class=' mt-6 py-2 px-5 bg-gray-100 focus:bg-white text-gray-900 focus:text-black rounded-sm'
                placeholder='enter your username'
                name="email"/>
            @error('email')
            <small class="text-red-600 mt-2">{{ $message }}</small>
            @enderror

            <input
                type='password'
                class=' mt-4 py-2 px-5 bg-gray-100 focus:bg-white text-gray-900 focus:text-black rounded-sm'
                placeholder='enter your password'
                name="password"/>
            @error('password')
            <small class="text-red-600 mt-2">{{ $message }}</small>
            @enderror
            <button
                type='submit'
                class='mt-3 bg-blue-700 rounded-md px-3 py-0 h-10 w-24 hover:bg-blue-900 text-white'>
                Login
            </button>

        <div class='mt-8 border-t border-gray-500 flex flex-row '>
            <p class=''>don't have account? </p>
            <span class='font-semibold text-blue-700'>
			<a href='#' class=''>
				Sign Up Here
			</a>
		</span>
        </div>
    </form>
    </main>
@endsection
