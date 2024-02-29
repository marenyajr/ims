@extends('layout')
@section('content')

@php
    $email = "test@test"
@endphp

<div class="p-4 max-w-lg mx-auto mt-2"
                >
                    <header class="text-center mb-8">
                        <h1 class="text-3xl font-extrabold uppercase text-gray-800">
                    Tech-<span class="text-laravel">Trend</span>
                </h1>
                <p class="font-bold tracking-wider mt-3 text-xl leading-3">Create your account</p>
                        
                        <p class="my-3 tracking-wide leading-3">Let's get started by creating your account.</p>
                        </header>

                    <form action="/users" method="POST">
                        @csrf

                        <div class="mb-8">
                            
                            <input
                                type="email"
                                class="border border-gray-500 rounded w-full p-3 bg-transparent "
                                name="email"
                                value="{{old('email')}}"
                                placeholder="Email Address"
                            />
                            <!-- Error Example -->
                            @error('email')
                                <div class="text-red-500 text-xs mt-0">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-8">
                            
                            <input
                                type="text"
                                class="border border-gray-500 rounded w-full p-3 bg-transparent"
                                name="name"
                                value="{{old('name')}}"
                                placeholder="Full Name"
                            />
                            
                            @error('name')
                                <div class="text-red-500 text-xs tracking-wide mt-0">{{$message}}</div>
                            @enderror
                        </div>


                        

                        <div class="mb-8">
                            
                            <input
                                type="password"
                                class="border border-gray-500 rounded p-3 bg-transparent w-full"
                                name="password"
                                placeholder="Password"
                            />
                            @error('password')
                                <div class="text-red-500 text-xs mt-0">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-1">
                            
                            <input
                                type="password"
                                class="border border-gray-500 rounded p-3 bg-transparent w-full"
                                name="password_confirmation"
                                placeholder="Confirm Password"
                            />
                            @error('password_confirmation')
                                <div class="text-red-500 text-xs mt-0">{{$message}}</div>
                            @enderror
                        </div>
                        <p class="text-sm tracking-wider mb-6 mx-auto w-5/6">
                            By clicking Create Account, you acknowledge you have you have read and consented to the 
                            <span class="underline text-laravel">Terms</span> and 
                            <span class="underline text-laravel">Conditions.</span>
                        </p>
                        <div class="mb-6 w-3/4 mx-auto">
                            <button
                                type="submit"
                                class="w-full text-lg tracking-wide mx-auto bg-laravel text-white rounded py-3 px-4 hover:shadow-2xl transition-transform transform hover:scale-105 font-semibold"
                            >
                                Create Account
                            </button>
                        </div>

                        
                    </form>
                </div>
    
@endsection