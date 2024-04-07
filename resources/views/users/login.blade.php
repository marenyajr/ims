@extends('layout')
@section('content')

<div class="p-10 rounded max-w-lg mx-auto mt-6">
    <header class="text-center">
       
            
            <div class="w-16 rounded-full p-2 bg-laravel mx-auto text-center">
                <img class="md:block w-full" src='{{asset("storage/product_images/logo.png")}}' alt="" />
            </div>

        <p class="font-bold tracking-wider mt-3 text-xl">Welcome to <span class="text-laravel">Weisang IMS!</span></p>

        <p class="my-3">Your gateway to seamless Inventory Control and Precision Management. Login to empower your business.</p>
    </header>

    <form action="/authenticate" method="POST">
        @csrf

        <div class="mb-4">
            <label for="email" class="inline-block text-lg mb-2"></label>
            <input type="email" class="border border-gray-500 rounded p-4 w-full bg-transparent" name="email" value="{{old('email')}}" placeholder="Email Address*" />
            <!-- Error Example -->
            @error('email')
            <div class="text-red-500 text-xs mt-1">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-8">
            <label for="password" class="inline-block text-lg mb-2">
            </label>
            <input type="password" class="border border-gray-500 rounded p-4 w-full bg-transparent" name="password" placeholder="Password*" />
            @error('password')
            <div class="text-red-500 text-xs mt-1">{{$message}}</div>
            @enderror
        </div>



        <div class="mb-20">
            <button type="submit" class="w-full text-xl tracking-wider mx-auto bg-laravel text-white rounded py-4 px-4 hover:shadow-2xl transition-transform transform hover:scale-101 font-semibold">
                Sign in
            </button>
        </div>

        
    </form>
</div>

@endsection