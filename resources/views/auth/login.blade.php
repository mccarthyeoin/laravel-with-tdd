@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg mx-auto">
        @csrf

        <h1 class="text-3xl mb-5 text-center font-thin tracking-wide">
            {{ __('Login') }}
        </h1>

        <div class="flex flex-col">
            <div>
                <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('Email') }}" name="email" required autofocus>

                @error('email')
                    <span class="text-red-500 text-sm inline-block mt-2 font-thin" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-5">
                <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" type="password" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="text-red-500 text-sm inline-block mt-2 font-thin" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-3">
                <label class="block text-sm font-bold" for="remember">
                    <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="font-normal cursor-pointer">{{ __('Remember Me') }}</span>
                </label>
            </div>

            <div class="mt-5">
                <button class="button w-full">{{ __('Login') }}</button>
            </div>

            @if (Route::has('password.request'))
                <div class="mt-3 text-center">
                    <a href="{{ route('password.request') }}" class="hover:text-blue-500 font-thin text-sm">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            @endif
        </div>
    </form>

    <div class="max-w-lg mx-auto text-center">
        Don't have an account? <a href="{{ route('register') }}" class="underline">Create one now</a>
    </div>
@endsection
