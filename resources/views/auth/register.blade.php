@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg mx-auto">
        @csrf

        <h1 class="text-3xl mb-5 text-center font-thin tracking-wide">
            {{ __('Register') }}
        </h1>

        <div class="flex flex-col">
            <div>
                <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" type="text" value="{{ old('name') }}" autocomplete="name" placeholder="{{ __('Name') }}" name="name" required autofocus>

                @error('name')
                    <span class="text-red-500 text-sm inline-block mt-2 font-thin" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-5">
                <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('E-Mail Address') }}" name="email" required autofocus>

                @error('email')
                    <span class="text-red-500 text-sm inline-block mt-2 font-thin" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-5">
                <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" type="password" value="{{ old('password') }}" autocomplete="new-password" placeholder="{{ __('Password') }}" name="password" required autofocus>

                @error('password')
                    <span class="text-red-500 text-sm inline-block mt-2 font-thin" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-5">
                <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" type="password" value="{{ old('password') }}" autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autofocus>

                @error('password')
                    <span class="text-red-500 text-sm inline-block mt-2 font-thin" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-5">
                <button class="button w-full">{{ __('Register') }}</button>
            </div>
        </div>
    </form>

    <div class="max-w-lg mx-auto text-center">
        Already have an account? <a href="{{ route('login') }}" class="underline">Login</a>
    </div>
@endsection
