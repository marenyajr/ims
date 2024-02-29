@extends('layout')
@section('content')

<div class="p-10 rounded max-w-lg mx-auto mt-6"
                >
                    <header class="text-center">
                        <h1 class="text-3xl font-extrabold uppercase text-gray-800">
                    Tech-<span class="text-laravel">Trend</span>
                </h1>
                <p class="font-bold tracking-wider mt-3 text-xl">Welcome!</p>
                        
                        <p class="my-3">Type your e-mail to log in or create a Tech Trend account.</p>
                    </header>

                    <form action="/authenticate" method="POST">
                        @csrf
                      
                        <div class="mb-4">
                            <label for="email" class="inline-block text-lg mb-2"
                                ></label
                            >
                            <input
                                type="email"
                                class="border border-gray-500 rounded p-4 w-full bg-transparent"
                                name="email"
                                value="{{old('email')}}"
                                placeholder="Email Address*"
                            />
                            <!-- Error Example -->
                            @error('email')
                                <div class="text-red-500 text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-8">
                            <label
                                for="password"
                                class="inline-block text-lg mb-2"
                            >
                            </label>
                            <input
                                type="password"
                                class="border border-gray-500 rounded p-4 w-full bg-transparent"
                                name="password"
                                placeholder="Password*"
                            />
                            @error('password')
                                <div class="text-red-500 text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>

                        

                        <div class="mb-6 ">
                            <button
                                type="submit"
                                class="w-full text-xl tracking-wider mx-auto bg-laravel text-white rounded py-4 px-4 hover:shadow-2xl transition-transform transform hover:scale-105 font-semibold"
                            >
                                Login
                            </button>
                        </div>

                        <div class="mt-8 text-center">
                            <p>
                                Don't have an account?
                                <a href="/register" class="text-laravel"
                                    >Register</a
                                >
                            </p>
                        </div>
                    </form>
                </div>
    
@endsection